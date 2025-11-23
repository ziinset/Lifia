<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories for admin
     */
    public function index()
    {
        $categories = Category::ordered()->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'icon' => $request->icon,
            'color' => '#4E342E', // Default color
            'header_type' => $request->input('header_type', 'header'),
            'sort_order' => 0, // Default sort order
            'is_active' => true
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil ditambahkan!'
        ]);
    }

    /**
     * Show the form for editing the specified category
     */
    public function edit(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified category
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'banner_description' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            // header_type dihapus dari validasi karena field sudah tidak ada di modal
        ]);

        $payload = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'icon' => $request->icon,
        ];

        if (Schema::hasColumn('categories', 'banner_description') && $request->filled('banner_description')) {
            $payload['banner_description'] = $request->banner_description;
        }

        if (Schema::hasColumn('categories', 'banner_image') && $request->hasFile('banner_image')) {
            $path = $request->file('banner_image')->store('category_banners', 'public');
            $payload['banner_image'] = $path;
        }

        $category->update($payload);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil diperbarui!',
            'category' => $category->fresh()
        ]);
    }

    /**
     * Remove the specified category (cascade delete related articles)
     */
    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();

            $deletedArticles = 0;
            if (class_exists('\\App\\Models\\Article')) {
                $deletedArticles = \App\Models\Article::where('category', $category->slug)->delete();
            }

            $categoryName = $category->name;
            $category->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => "Kategori '{$categoryName}' berhasil dihapus" . ($deletedArticles ? " (beserta {$deletedArticles} artikel)" : '') . "!"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus kategori: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Toggle category status
     */
    public function toggleStatus(Category $category)
    {
        $category->update(['is_active' => !$category->is_active]);
        
        $status = $category->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return response()->json([
            'success' => true,
            'message' => "Kategori berhasil {$status}!",
            'is_active' => $category->is_active
        ]);
    }

    /**
     * Update sort order
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'categories' => 'required|array',
            'categories.*.id' => 'required|exists:categories,id',
            'categories.*.sort_order' => 'required|integer|min:0'
        ]);

        foreach ($request->categories as $categoryData) {
            Category::where('id', $categoryData['id'])
                ->update(['sort_order' => $categoryData['sort_order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Urutan kategori berhasil diperbarui!'
        ]);
    }
}
