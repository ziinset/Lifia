<?php

namespace App\Http\Controllers;

use App\Models\PopularTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PopularTopicController extends Controller
{
    public function index(Request $request, string $category)
    {
        $items = PopularTopic::forCategory($category)
            ->orderBy('is_featured', 'desc')
            ->orderBy('display_order', 'asc')
            ->orderByDesc('created_at')
            ->get();

        return response()->json(['success' => true, 'data' => $items]);
    }

    public function store(Request $request, string $category)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'rating' => 'nullable|integer|min:0|max:5',
            'is_featured' => 'nullable|boolean',
            'display_order' => 'nullable|integer',
            'article_url' => 'nullable|string|max:255',
            'is_published' => 'nullable|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['category_slug'] = $category;
        $data['is_featured'] = (bool)($data['is_featured'] ?? false);
        $data['is_published'] = (bool)($data['is_published'] ?? true);

        // Limits: max 6 topics per category, max 2 featured
        $total = PopularTopic::where('category_slug', $category)->count();
        if ($total >= 6) {
            return response()->json(['success'=>false,'message'=>'Maksimal 6 Topik Populer per kategori. Hapus salah satu terlebih dahulu.'], 422);
        }
        if (!empty($data['is_featured'])) {
            $featuredCount = PopularTopic::where('category_slug', $category)->where('is_featured', 1)->count();
            if ($featuredCount >= 2) {
                return response()->json(['success'=>false,'message'=>'Maksimal 2 Topik Utama per kategori. Ubah salah satu menjadi biasa terlebih dahulu.'], 422);
            }
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('popular-topics', 'public');
        }

        $item = PopularTopic::create($data);
        return response()->json(['success' => true, 'data' => $item]);
    }

    public function update(Request $request, string $category, PopularTopic $popularTopic)
    {
        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'rating' => 'nullable|integer|min:0|max:5',
            'is_featured' => 'nullable|boolean',
            'display_order' => 'nullable|integer',
            'article_url' => 'nullable|string|max:255',
            'is_published' => 'nullable|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        // If toggling to featured, enforce max 2
        if (array_key_exists('is_featured', $data) && (bool)$data['is_featured'] === true && !$popularTopic->is_featured) {
            $featuredCount = PopularTopic::where('category_slug', $category)->where('is_featured', 1)->count();
            if ($featuredCount >= 2) {
                return response()->json(['success'=>false,'message'=>'Maksimal 2 Topik Utama per kategori. Ubah salah satu menjadi biasa terlebih dahulu.'], 422);
            }
        }

        if ($request->hasFile('image')) {
            if ($popularTopic->image) {
                Storage::disk('public')->delete($popularTopic->image);
            }
            $data['image'] = $request->file('image')->store('popular-topics', 'public');
        }

        $popularTopic->update($data);
        return response()->json(['success' => true, 'data' => $popularTopic->fresh()]);
    }

    public function destroy(string $category, PopularTopic $popularTopic)
    {
        if ($popularTopic->image) {
            Storage::disk('public')->delete($popularTopic->image);
        }
        $popularTopic->delete();
        return response()->json(['success' => true]);
    }
}
