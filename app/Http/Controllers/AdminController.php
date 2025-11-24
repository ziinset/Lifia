<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Favorite;
use Illuminate\Support\Str;
use App\Models\AdminActivity;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Return admin activities as JSON with optional filters
     */
    public function activities(Request $request)
    {
        $q = AdminActivity::query()->orderByDesc('created_at');
        if ($request->filled('entity_type')) $q->where('entity_type', $request->get('entity_type'));
        if ($request->filled('action')) $q->where('action', $request->get('action'));
        $total = (clone $q)->count();
        $perPage = (int)($request->get('limit', 5));
        $perPage = min(max($perPage, 1), 50);
        $page = (int)($request->get('page', 1));
        if ($page < 1) $page = 1;
        $offset = ($page - 1) * $perPage;
        $items = $q->skip($offset)->take($perPage)->get();
        return response()->json([
            'success' => true,
            'data' => $items,
            'total' => $total,
            'page' => $page,
            'per_page' => $perPage,
            'total_pages' => (int) ceil($total / max($perPage,1)),
        ]);
    }

    public function langganan()
    {
        return view('admin.langganan');
    }

    public function kategori()
    {
        $categories = \App\Models\Category::orderBy('sort_order', 'asc')->get();
        return view('admin.kategori', compact('categories'));
    }

    public function polaMakanSehat()
    {
        return view('admin.crud-pola-makan');
    }

    public function aktivitasFisik()
    {
        return view('admin.crud-aktivitas-fisik');
    }

    public function kesehatanMental()
    {
        return view('admin.crud-kesehatan-mental');
    }

    public function perawatanDiri()
    {
        return view('admin.crud-perawatan-diri');
    }

    public function gayaHidupVegan()
    {
        return view('admin.crud-gaya-hidup-vegan');
    }

    public function ecoLiving()
    {
        return view('admin.crud-eco-living');
    }

    /**
     * Handle dynamic category routes for new categories added via CRUD
     */
    public function dynamicCategory($category)
    {
        $categoryModel = \App\Models\Category::where('slug', $category)->first();
        if (!$categoryModel) abort(404, 'Kategori tidak ditemukan');

        $viewName = 'admin.crud-' . $category;
        if (view()->exists($viewName)) return view($viewName);

        return view('admin.crud-generic', compact('categoryModel'));
    }

    /**
     * List articles for a category (slug)
     */
    public function listArticles($category)
    {
        if (!class_exists('App\\Models\\Article')) {
            return response()->json(['success' => true, 'data' => [], 'total' => 0]);
        }
        // Include fields needed by the UI (image, description, file_path, article_type)
        $select = ['id','title','author','is_published','created_at'];
        if (\Illuminate\Support\Facades\Schema::hasColumn('articles','description')) $select[] = 'description';
        if (\Illuminate\Support\Facades\Schema::hasColumn('articles','image')) $select[] = 'image';
        if (\Illuminate\Support\Facades\Schema::hasColumn('articles','file_path')) $select[] = 'file_path';
        if (\Illuminate\Support\Facades\Schema::hasColumn('articles','article_type')) $select[] = 'article_type';
        if (\Illuminate\Support\Facades\Schema::hasColumn('articles','is_main_article')) $select[] = 'is_main_article';

        $items = \App\Models\Article::where('category', $category)
            ->orderByDesc('created_at')
            ->get($select);
        return response()->json([
            'success' => true,
            'data' => $items,
            'total' => $items->count(),
        ]);
    }

    /**
     * Store a new article in the category
     */
    public function storeArticle($category, Request $request)
    {
        if (!class_exists('App\\Models\\Article')) {
            return response()->json(['success' => false, 'message' => 'Model Article tidak tersedia'], 500);
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'keywords' => 'nullable|string|max:500',
            'is_published' => 'nullable|in:0,1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            // optional fields if exist in DB
            'slug' => 'nullable|string|max:255',
            'article_layout' => 'nullable|string|max:255',
            'is_main_article' => 'nullable|in:0,1',
            'display_order' => 'nullable|integer',
            'file_path' => 'nullable|string|max:1000',
            'article_type' => 'nullable|string|max:50',
        ]);

        $payload = [
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'content' => $data['content'] ?? '',
            'author' => $data['author'] ?? null,
            'keywords' => $data['keywords'] ?? null,
            'category' => $category,
            'is_published' => (int)($request->input('is_published', 1)),
        ];

        if (Schema::hasColumn('articles','article_type') && $request->filled('article_type')) {
            $payload['article_type'] = $request->input('article_type');
        }

        // Hard cap: maksimal 4 ARTIKEL TOTAL per kategori (blokir artikel ke-5)
        $totalCount = \App\Models\Article::where('category', $category)->count();
        if ($totalCount >= 4) {
            return response()->json([
                'success' => false,
                'message' => 'Maksimal 4 artikel dalam kategori ini. Hapus salah satu terlebih dahulu.'
            ], 400);
        }

        // Hard limit: maksimum 4 artikel terbaru per kategori
        if (($payload['article_type'] ?? null) === 'latest') {
            $latestCount = \App\Models\Article::where('category', $category)
                ->where('article_type','latest')
                ->count();
            if ($latestCount >= 4) {
                return response()->json([
                    'success' => false,
                    'message' => 'Maksimal 4 Artikel Terbaru per kategori. Hapus/ubah salah satu terlebih dahulu.'
                ], 400);
            }
        }

        if (Schema::hasColumn('articles', 'slug')) {
            $baseSlug = $data['slug'] ?? Str::slug($data['title']);
            $slug = $baseSlug;
            $i = 1;
            // Pastikan slug unik
            while (\App\Models\Article::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $i++;
            }
            $payload['slug'] = $slug;
        }
        if (Schema::hasColumn('articles', 'article_layout') && isset($data['article_layout'])) {
            $payload['article_layout'] = $data['article_layout'];
        }
        if (Schema::hasColumn('articles', 'is_main_article') && isset($data['is_main_article'])) {
            $payload['is_main_article'] = (int)$data['is_main_article'];
        }
        if (Schema::hasColumn('articles', 'display_order') && isset($data['display_order'])) {
            $payload['display_order'] = (int)$data['display_order'];
        }
        if (Schema::hasColumn('articles', 'file_path') && isset($data['file_path'])) {
            $payload['file_path'] = $data['file_path'];
        }
        if (Schema::hasColumn('articles', 'published_at') && (int)$payload['is_published'] === 1) {
            $payload['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('article_images', 'public');
            $payload['image'] = $path;
        }

        try {
            $article = \App\Models\Article::create($payload);
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi race-condition slug duplikat, coba generate slug baru sekali lagi
            if (Schema::hasColumn('articles', 'slug')) {
                $baseSlug = $payload['slug'] ?? Str::slug($data['title']);
                $i = 2;
                $newSlug = $baseSlug . '-' . $i;
                while (\App\Models\Article::where('slug', $newSlug)->exists()) {
                    $newSlug = $baseSlug . '-' . (++$i);
                }
                $payload['slug'] = $newSlug;
                $article = \App\Models\Article::create($payload);
            } else {
                throw $e;
            }
        }

        // Enforce max 4 latest per category
        if (Schema::hasColumn('articles','article_type') && (($payload['article_type'] ?? null) === 'latest')) {
            $latestIds = \App\Models\Article::where('category', $category)
                ->where('article_type','latest')
                ->orderByDesc('created_at')
                ->skip(4)
                ->pluck('id');
            if ($latestIds->count() > 0) {
                \App\Models\Article::whereIn('id', $latestIds)->update(['article_type' => null]);
            }
            // Auto-save to favorites for the authenticated user
            try {
                $favPayload = [
                    'user_id' => auth()->id(),
                    'article_id' => 'db-'.($article->id),
                    'article_title' => $article->title,
                    'article_category' => $article->category,
                    'article_image' => $article->image ?? null,
                    'article_description' => $article->description ?? null,
                    'article_author' => $article->author ?? null,
                    'article_url' => $article->file_path ?? null,
                ];
                if ($favPayload['user_id']) {
                    Favorite::firstOrCreate(
                        ['user_id' => $favPayload['user_id'], 'article_id' => $favPayload['article_id']],
                        $favPayload
                    );
                }
            } catch (\Throwable $fe) {
                // ignore favorite errors silently
            }
        }

        AdminActivity::log('create', 'article', $article->id, $article->title, [
            'category' => $category,
            'article_type' => $payload['article_type'] ?? null,
        ]);

        return response()->json(['success' => true, 'message' => 'Artikel dibuat', 'data' => $article]);
    }

    /**
     * Update an existing article
     */
    public function updateArticle($category, $id, Request $request)
    {
        if (!class_exists('App\\Models\\Article')) {
            return response()->json(['success' => false, 'message' => 'Model Article tidak tersedia'], 500);
        }
        $article = \App\Models\Article::where('id', $id)->where('category', $category)->firstOrFail();

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'keywords' => 'nullable|string|max:500',
            'is_published' => 'nullable|in:0,1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            // optional fields
            'slug' => 'nullable|string|max:255',
            'article_layout' => 'nullable|string|max:255',
            'is_main_article' => 'nullable|in:0,1',
            'display_order' => 'nullable|integer',
            'file_path' => 'nullable|string|max:1000',
            'article_type' => 'nullable|string|max:50',
        ]);

        $payload = [
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'content' => $data['content'] ?? '',
            'author' => $data['author'] ?? null,
            'keywords' => $data['keywords'] ?? null,
        ];

        if (Schema::hasColumn('articles','article_type') && $request->filled('article_type')) {
            $payload['article_type'] = $request->input('article_type');
        }

        // Hard limit: maksimum 4 artikel terbaru per kategori saat update
        if ((Schema::hasColumn('articles','article_type')) && (($payload['article_type'] ?? null) === 'latest')) {
            $latestCount = \App\Models\Article::where('category', $category)
                ->where('article_type','latest')
                ->where('id','!=',$article->id)
                ->count();
            if ($latestCount >= 4) {
                return response()->json([
                    'success' => false,
                    'message' => 'Maksimal 4 Artikel Terbaru per kategori. Hapus/ubah salah satu terlebih dahulu.'
                ], 400);
            }
        }

        if (Schema::hasColumn('articles', 'slug') && isset($data['slug'])) {
            $payload['slug'] = $data['slug'];
        }
        if (Schema::hasColumn('articles', 'article_layout') && isset($data['article_layout'])) {
            $payload['article_layout'] = $data['article_layout'];
        }
        if (Schema::hasColumn('articles', 'is_main_article') && isset($data['is_main_article'])) {
            $payload['is_main_article'] = (int)$data['is_main_article'];
        }
        if (Schema::hasColumn('articles', 'display_order') && isset($data['display_order'])) {
            $payload['display_order'] = (int)$data['display_order'];
        }
        if (Schema::hasColumn('articles', 'file_path') && isset($data['file_path'])) {
            $payload['file_path'] = $data['file_path'];
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('article_images', 'public');
            $payload['image'] = $path;
        }
        if ($request->filled('is_published')) {
            $payload['is_published'] = (int)$request->input('is_published');
            if (Schema::hasColumn('articles', 'published_at') && (int)$payload['is_published'] === 1) {
                $payload['published_at'] = now();
            }
        }

        $article->update($payload);

        // Enforce max 4 latest per category on update as well
        if (Schema::hasColumn('articles','article_type')) {
            $isNowLatest = $payload['article_type'] ?? $article->fresh()->article_type ?? null;
            if ($isNowLatest === 'latest') {
                $latestIds = \App\Models\Article::where('category', $category)
                    ->where('article_type','latest')
                    ->orderByDesc('created_at')
                    ->skip(4)
                    ->pluck('id');
                if ($latestIds->count() > 0) {
                    \App\Models\Article::whereIn('id', $latestIds)->update(['article_type' => null]);
                }
            }
        }

        AdminActivity::log('update', 'article', $article->id, $article->title, [
            'category' => $category,
            'article_type' => $payload['article_type'] ?? $article->fresh()->article_type ?? null,
        ]);

        return response()->json(['success' => true, 'message' => 'Artikel diperbarui', 'data' => $article->fresh()]);
    }

    /**
     * Delete an article
     */
    public function deleteArticle($category, $id)
    {
        if (!class_exists('App\\Models\\Article')) {
            return response()->json(['success' => false, 'message' => 'Model Article tidak tersedia'], 500);
        }
        $article = \App\Models\Article::where('id', $id)->where('category', $category)->firstOrFail();
        $title = $article->title;
        $article->delete();

        AdminActivity::log('delete', 'article', (string)$id, $title, [
            'category' => $category,
        ]);

        return response()->json(['success' => true, 'message' => 'Artikel dihapus']);
    }

    /**
     * Set one article as primary (is_main_article=1) and unset others in the same category
     */
    public function setPrimary($category, $id)
    {
        if (!class_exists('App\\Models\\Article')) {
            return response()->json(['success' => false, 'message' => 'Model Article tidak tersedia'], 500);
        }
        if (!\Illuminate\Support\Facades\Schema::hasColumn('articles','is_main_article')) {
            return response()->json(['success' => false, 'message' => 'Kolom is_main_article tidak tersedia pada tabel articles'], 400);
        }
        $target = \App\Models\Article::where('id', $id)->where('category', $category)->firstOrFail();
        \DB::transaction(function() use ($category, $id){
            \App\Models\Article::where('category', $category)->update(['is_main_article' => 0]);
            \App\Models\Article::where('id', $id)->where('category', $category)->update(['is_main_article' => 1]);
        });
        AdminActivity::log('set_primary', 'article', (string)$id, $target->title, [ 'category' => $category ]);
        return response()->json(['success' => true, 'message' => 'Artikel utama diperbarui']);
    }

    /**
     * Unset primary flag for a specific article (make it normal)
     */
    public function clearPrimary($category, $id)
    {
        if (!class_exists('App\\Models\\Article')) {
            return response()->json(['success' => false, 'message' => 'Model Article tidak tersedia'], 500);
        }
        if (!\Illuminate\Support\Facades\Schema::hasColumn('articles','is_main_article')) {
            return response()->json(['success' => false, 'message' => 'Kolom is_main_article tidak tersedia pada tabel articles'], 400);
        }
        $target = \App\Models\Article::where('id', $id)->where('category', $category)->firstOrFail();
        $target->update(['is_main_article' => 0]);
        AdminActivity::log('clear_primary', 'article', (string)$id, $target->title, [ 'category' => $category ]);
        return response()->json(['success' => true, 'message' => 'Artikel tidak lagi menjadi utama']);
    }
    public function listBanners($category)
    {
        $cat = \App\Models\Category::where('slug',$category)->firstOrFail();
        $query = DB::table('banners')->where('category_id', $cat->id)->where('is_active', 1);
        $query->orderBy('display_order','asc')->orderByDesc('created_at');
        $items = $query->get(['id','title','description','image','link as file_path','display_order','created_at']);
        return response()->json(['success'=>true,'data'=>$items,'total'=>$items->count()]);
    }

    /** Store a new banner item */
    public function storeBanner($category, Request $request)
    {
        $cat = \App\Models\Category::where('slug',$category)->firstOrFail();
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'nullable|string|max:1000',
            'display_order' => 'nullable|integer',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);
        $payload = [
            'category_id' => $cat->id,
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'link' => $data['file_path'] ?? null,
            // optional order
            
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('banner_images','public');
            $payload['image'] = $path;
        }
        $id = DB::table('banners')->insertGetId($payload);
        $item = DB::table('banners')->where('id',$id)->first();
        AdminActivity::log('create', 'banner', (string)$id, $item->title ?? null, ['category' => $category]);
        return response()->json(['success'=>true,'message'=>'Banner ditambahkan','data'=>$item]);
    }

    /** Update banner item */
    public function updateBanner($category, $id, Request $request)
    {
        $cat = \App\Models\Category::where('slug',$category)->firstOrFail();
        $exists = DB::table('banners')->where(['id'=>$id,'category_id'=>$cat->id])->exists();
        if (!$exists) return response()->json(['success'=>false,'message'=>'Banner tidak ditemukan'],404);
        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'nullable|string|max:1000',
            'display_order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);
        $payload = [];
        if ($request->has('title')) $payload['title'] = $data['title'];
        if ($request->has('description')) $payload['description'] = $data['description'] ?? null;
        if ($request->has('file_path')) $payload['link'] = $data['file_path'] ?? null;
        if ($request->has('display_order') && Schema::hasColumn('guides','display_order')) {
            $payload['display_order'] = (int)($data['display_order'] ?? 0);
        }
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('banner_images','public');
            $payload['image'] = $path;
        }
        if (!empty($payload)){
            $payload['updated_at'] = now();
            DB::table('banners')->where(['id'=>$id,'category_id'=>$cat->id])->update($payload);
        }
        $item = DB::table('banners')->where('id',$id)->first();
        AdminActivity::log('update', 'banner', (string)$id, $item->title ?? null, ['category' => $category]);
        return response()->json(['success'=>true,'message'=>'Banner diperbarui','data'=>$item]);
    }

    /** Delete banner item */
    public function deleteBanner($category, $id)
    {
        $cat = \App\Models\Category::where('slug',$category)->firstOrFail();
        $deleted = DB::table('banners')->where(['id'=>$id,'category_id'=>$cat->id])->delete();
        if (!$deleted) return response()->json(['success'=>false,'message'=>'Banner tidak ditemukan'],404);
        AdminActivity::log('delete', 'banner', (string)$id, null, ['category' => $category]);
        return response()->json(['success'=>true,'message'=>'Banner dihapus']);
    }

    /**
     * Panduan CRUD (gunakan tabel articles dengan article_type='panduan')
     */
    public function listGuides($category)
    {
        $q = DB::table('guides')->where('category_slug', $category);
        if (Schema::hasColumn('guides','display_order')) {
            $q->orderBy('display_order','asc');
        }
        $q->orderByDesc('created_at');
        $selects = ['id','title','description','author','image','file_path','created_at'];
        if (Schema::hasColumn('guides','display_order')) { $selects[] = 'display_order'; }
        $items = $q->get($selects);
        return response()->json(['success'=>true,'data'=>$items,'total'=>$items->count()]);
    }

    public function storeGuide($category, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'file_path' => 'nullable|string|max:1000',
            'display_order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);
        $payload = [
            'category_slug' => $category,
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'author' => $data['author'] ?? null,
            'file_path' => $data['file_path'] ?? null,
            'is_published' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('guide_images','public');
            $payload['image'] = $path;
        }
        if (Schema::hasColumn('guides','display_order')) {
            $payload['display_order'] = (int)($data['display_order'] ?? 0);
        }
        $id = DB::table('guides')->insertGetId($payload);
        $item = DB::table('guides')->where('id',$id)->first();
        AdminActivity::log('create', 'guide', (string)$id, $item->title ?? null, ['category' => $category]);
        return response()->json(['success'=>true,'message'=>'Panduan ditambahkan','data'=>$item]);
    }

    public function updateGuide($category, $id, Request $request)
    {
        $exists = DB::table('guides')->where(['id'=>$id,'category_slug'=>$category])->exists();
        if (!$exists) return response()->json(['success'=>false,'message'=>'Panduan tidak ditemukan'],404);
        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'file_path' => 'nullable|string|max:1000',
            'display_order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);
        $payload = [];
        foreach (['title','description','author','file_path'] as $f){ if ($request->has($f)) $payload[$f] = $data[$f] ?? null; }
        if ($request->has('display_order')) $payload['display_order'] = (int)($data['display_order'] ?? 0);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('guide_images','public');
            $payload['image'] = $path;
        }
        if (!empty($payload)){
            $payload['updated_at'] = now();
            DB::table('guides')->where(['id'=>$id,'category_slug'=>$category])->update($payload);
        }
        $item = DB::table('guides')->where('id',$id)->first();
        AdminActivity::log('update', 'guide', (string)$id, $item->title ?? null, ['category' => $category]);
        return response()->json(['success'=>true,'message'=>'Panduan diperbarui','data'=>$item]);
    }

    public function deleteGuide($category, $id)
    {
        $deleted = DB::table('guides')->where(['id'=>$id,'category_slug'=>$category])->delete();
        if (!$deleted) return response()->json(['success'=>false,'message'=>'Panduan tidak ditemukan'],404);
        AdminActivity::log('delete', 'guide', (string)$id, null, ['category' => $category]);
        return response()->json(['success'=>true,'message'=>'Panduan dihapus']);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Pastikan hanya admin yang bisa mengakses
        if ($user->role !== 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak. Hanya admin yang dapat mengupdate profil ini.');
        }

        $request->validate([
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama_lengkap' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        $updated = false;

        // Upload foto profil
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_profil', 'public');
            $user->foto = $path;
            $updated = true;
        }

        // Update nama lengkap
        if ($request->filled('nama_lengkap')) {
            $user->nama_lengkap = $request->nama_lengkap;
            $updated = true;
        }

        // Update status (hanya untuk admin)
        if ($request->filled('status')) {
            $user->status = $request->status;
            $updated = true;
        }

        if ($updated) {
            $user->save();
            return redirect()->route('admin.dashboard')->with('success', 'Profil berhasil diperbarui!');
        }

        return redirect()->route('admin.dashboard')->with('info', 'Tidak ada perubahan yang disimpan.');
    }
}
