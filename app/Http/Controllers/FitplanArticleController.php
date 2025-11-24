<?php

namespace App\Http\Controllers;

use App\Models\FitplanArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FitplanArticleController extends Controller
{
    /**
     * Get articles by category
     */
    public function index(Request $request)
    {
        $category = $request->get('category', 'turun-berat-badan');

        $articles = FitplanArticle::byCategory($category)
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'articles' => $articles
        ]);
    }

    /**
     * Store a new article
     */
    public function store(Request $request)
    {
        // Get form data - handle both form field names and direct field names
        $title = $request->input('title') ?: $request->input('judul_artikel');
        $author = $request->input('author') ?: $request->input('penulis');
        $description = $request->input('description') ?: $request->input('deskripsi_singkat');
        $link = $request->input('link') ?: $request->input('tautan_halaman');

        $validator = Validator::make([
            'category' => $request->input('category'),
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'link' => $link,
        ], [
            'category' => 'required|in:turun-berat-badan,bentuk-otot,stamina-energi,tubuh-lentur',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|url|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = [
            'category' => $request->input('category'),
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'link' => $link,
        ];

        // Handle image upload
        if ($request->hasFile('image') || $request->hasFile('gambar_artikel')) {
            $image = $request->hasFile('image') ? $request->file('image') : $request->file('gambar_artikel');

            // Validate image
            $imageValidator = Validator::make(['image' => $image], [
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($imageValidator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gambar tidak valid. Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 2MB.',
                    'errors' => $imageValidator->errors()
                ], 422);
            }

            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('fitplan_articles', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        // Get the next order number for this category
        $maxOrder = FitplanArticle::byCategory($data['category'])->max('order') ?? 0;
        $data['order'] = $maxOrder + 1;

        // Limit to 4 articles per category
        $articleCount = FitplanArticle::byCategory($data['category'])->count();
        if ($articleCount >= 4) {
            // Remove the oldest article (highest order)
            $oldestArticle = FitplanArticle::byCategory($data['category'])
                ->orderBy('order', 'desc')
                ->first();
            if ($oldestArticle) {
                if ($oldestArticle->image) {
                    Storage::disk('public')->delete($oldestArticle->image);
                }
                $oldestArticle->delete();
            }
        }

        $article = FitplanArticle::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Artikel berhasil ditambahkan',
            'article' => $article
        ]);
    }

    /**
     * Update an article
     */
    public function update(Request $request, $id)
    {
        $article = FitplanArticle::findOrFail($id);

        // Get form data - handle both form field names and direct field names
        $title = $request->input('title') ?: $request->input('judul_artikel');
        $author = $request->input('author') ?: $request->input('penulis');
        $description = $request->input('description') ?: $request->input('deskripsi_singkat');
        $link = $request->input('link') ?: $request->input('tautan_halaman');

        $validator = Validator::make([
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'link' => $link,
        ], [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|url|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = [
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'link' => $link,
        ];

        // Handle image upload
        if ($request->hasFile('image') || $request->hasFile('gambar_artikel')) {
            $image = $request->hasFile('image') ? $request->file('image') : $request->file('gambar_artikel');

            // Validate image
            $imageValidator = Validator::make(['image' => $image], [
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($imageValidator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gambar tidak valid. Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 2MB.',
                    'errors' => $imageValidator->errors()
                ], 422);
            }

            // Delete old image
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('fitplan_articles', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        $article->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Artikel berhasil diperbarui',
            'article' => $article
        ]);
    }

    /**
     * Delete an article
     */
    public function destroy($id)
    {
        $article = FitplanArticle::findOrFail($id);

        // Delete image if exists
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return response()->json([
            'success' => true,
            'message' => 'Artikel berhasil dihapus'
        ]);
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured($id)
    {
        $article = FitplanArticle::findOrFail($id);

        // If setting to featured, unfeature others in the same category
        if (!$article->is_featured) {
            FitplanArticle::byCategory($article->category)
                ->where('id', '!=', $id)
                ->update(['is_featured' => false]);
        }

        $article->is_featured = !$article->is_featured;
        $article->save();

        return response()->json([
            'success' => true,
            'message' => 'Status utama berhasil diubah',
            'article' => $article
        ]);
    }

    /**
     * Get latest articles for display (1 main + 3 sidebar)
     */
    public function getLatestArticles($category)
    {
        $articles = FitplanArticle::byCategory($category)
            ->latestLimited(4)
            ->get();

        $mainArticle = $articles->where('is_featured', true)->first()
                    ?? $articles->first();

        $mainId = $mainArticle?->id;

        $sidebarArticles = $articles->where('id', '!=', $mainId)
            ->take(3)
            ->values();

        return response()->json([
            'success' => true,
            'main_article' => $mainArticle,
            'sidebar_articles' => $sidebarArticles
        ]);
    }
}
