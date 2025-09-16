<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class FavoriteController extends Controller
{
    private static $tableExists = null;

    /**
     * Ensure favorites table exists (cached check)
     */
    private function ensureTableExists()
    {
        if (self::$tableExists === null) {
            if (!Schema::hasTable('favorites')) {
                \DB::statement("
                    CREATE TABLE IF NOT EXISTS `favorites` (
                        `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                        `user_id` bigint(20) unsigned NOT NULL,
                        `article_id` varchar(255) NOT NULL,
                        `article_title` varchar(255) NOT NULL,
                        `article_category` varchar(255) NOT NULL,
                        `article_image` varchar(500) DEFAULT NULL,
                        `article_description` text DEFAULT NULL,
                        `article_author` varchar(255) DEFAULT NULL,
                        `article_url` varchar(500) DEFAULT NULL,
                        `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                        `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                        PRIMARY KEY (`id`),
                        UNIQUE KEY `favorites_user_article_unique` (`user_id`,`article_id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
                ");
            }
            self::$tableExists = true;
        }
    }
    /**
     * Add article to favorites
     */
    public function store(Request $request)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu'
            ], 401);
        }

        $request->validate([
            'article_id' => 'required|string',
            'article_title' => 'required|string',
            'article_category' => 'required|string',
            'article_image' => 'nullable|string',
            'article_description' => 'nullable|string',
            'article_author' => 'nullable|string',
            'article_url' => 'nullable|string',
        ]);

        try {
            // Ensure table exists (cached check)
            $this->ensureTableExists();

            $favorite = Favorite::create([
                'user_id' => Auth::id(),
                'article_id' => $request->article_id,
                'article_title' => $request->article_title,
                'article_category' => $request->article_category,
                'article_image' => $request->article_image,
                'article_description' => $request->article_description,
                'article_author' => $request->article_author,
                'article_url' => $request->article_url,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Artikel berhasil disimpan ke favorit',
                'favorite' => $favorite
            ]);
        } catch (\Exception $e) {
            // Log the actual error for debugging
            \Log::error('Favorite save error: ' . $e->getMessage());
            
            // Handle duplicate entry (unique constraint violation)
            if (str_contains($e->getMessage(), 'Duplicate entry') || str_contains($e->getMessage(), 'UNIQUE constraint failed')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Artikel sudah ada di favorit'
                ], 409);
            }

            // Return more specific error information
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan artikel',
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => basename($e->getFile())
            ], 500);
        }
    }

    /**
     * Remove article from favorites
     */
    public function destroy(Request $request)
    {
        try {
            // Check if user is authenticated
            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $articleId = $request->get('article_id') ?: $request->input('article_id');
            if (!$articleId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Article ID is required'
                ], 400);
            }

            // Ensure table exists (cached check)
            $this->ensureTableExists();

            $favorite = Favorite::where('user_id', Auth::id())
                              ->where('article_id', $articleId)
                              ->first();

            if (!$favorite) {
                return response()->json([
                    'success' => false,
                    'message' => 'Artikel tidak ditemukan di favorit'
                ], 404);
            }

            $favorite->delete();

            return response()->json([
                'success' => true,
                'message' => 'Artikel berhasil dihapus dari favorit'
            ]);
        } catch (\Exception $e) {
            \Log::error('Favorite destroy error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error removing favorite',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get user's favorite articles
     */
    public function index(Request $request)
    {
        try {
            // Check if user is authenticated
            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated',
                    'favorites' => []
                ], 401);
            }

            // Ensure table exists (cached check)
            $this->ensureTableExists();

            $category = $request->get('category', 'all');
            
            $query = Favorite::where('user_id', Auth::id())
                            ->orderBy('created_at', 'desc');

            if ($category !== 'all') {
                $query->where('article_category', $category);
            }

            $favorites = $query->get();

            return response()->json([
                'success' => true,
                'favorites' => $favorites
            ]);
        } catch (\Exception $e) {
            \Log::error('Favorite index error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error loading favorites',
                'favorites' => [],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Check if article is favorited by user
     */
    public function check(Request $request)
    {
        try {
            // Check if user is authenticated
            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated',
                    'is_favorited' => false
                ], 401);
            }

            $articleId = $request->get('article_id');
            if (!$articleId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Article ID is required',
                    'is_favorited' => false
                ], 400);
            }

            // Only create table if it doesn't exist (check first)
            $this->ensureTableExists();

            $isFavorited = Favorite::where('user_id', Auth::id())
                                 ->where('article_id', $articleId)
                                 ->exists();

            return response()->json([
                'success' => true,
                'is_favorited' => $isFavorited
            ]);
        } catch (\Exception $e) {
            \Log::error('Favorite check error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error checking favorite status',
                'is_favorited' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the collection page
     */
    public function showCollection()
    {
        return view('user.koleksi');
    }
}
