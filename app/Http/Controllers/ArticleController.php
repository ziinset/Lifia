<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Show the main articles page
     */
    public function index()
    {
        return view('artikel.artikel');
    }

    /**
     * Show articles by category
     */
    public function showCategory($category)
    {
        // Check if category exists in database
        $categoryModel = \App\Models\Category::where('slug', $category)->where('is_active', true)->first();
        
        if (!$categoryModel) {
            abort(404, 'Kategori tidak ditemukan');
        }

        // Map category slugs to view paths (fallback untuk kategori lama)
        $categoryViews = [
            'pola-makan-sehat' => 'user.kategori.pola-makan-sehat.bagianartikel',
            'aktivitas-fisik' => 'user.kategori.aktivitas-fisik.bagian',
            'kesehatan-mental' => 'user.kategori.kesehatan-mental.bagianartikel',
            'perawatan-diri' => 'user.kategori.perawatan-diri.artikel-perawatan',
            'vegan' => 'user.kategori.vegan.artikel-vegan',
            'eco-living' => 'user.kategori.eco-living.artikel-eco',
        ];

        $viewPath = $categoryViews[$category] ?? 'artikel.artikel';
        
        // Check if view file exists
        if (!view()->exists($viewPath)) {
            // Fallback to main artikel page
            $viewPath = 'artikel.artikel';
        }

        return view($viewPath, [
            'category' => $category,
            'categoryModel' => $categoryModel
        ]);
    }

    /**
     * Show specific article within a category
     */
    public function showArticle($category, $article)
    {
        // Map specific articles to their views
        $articleViews = [
            'pola-makan-sehat' => [
                'artikel-makanan' => 'user.kategori.pola-makan-sehat.artikel-makanan',
                'sarapan-seimbang' => 'user.kategori.pola-makan-sehat.sarapan-seimbang',
            ],
            'aktivitas-fisik' => [
                'olahraga-aman-bumil' => 'user.kategori.aktivitas-fisik.olahraga-aman-bumil',
                'listolahraga' => 'user.kategori.aktivitas-fisik.listolahraga',
            ],
            'kesehatan-mental' => [
                'artikel-mental' => 'user.kategori.kesehatan-mental.artikel-mental',
                'kesehatan-mental' => 'user.kategori.kesehatan-mental.kesehatan-mental',
                'meredakan-stres' => 'user.kategori.kesehatan-mental.meredakan-stres',
                'sarapan-seimbang' => 'user.kategori.kesehatan-mental.sarapan-seimbang',
            ],
            'perawatan-diri' => [
                'artikel-perawatan' => 'user.kategori.perawatan-diri.artikel-perawatan',
                'kulit-malam' => 'user.kategori.perawatan-diri.kulit-malam',
            ],
            'vegan' => [
                'artikel-vegan' => 'user.kategori.vegan.artikel-vegan',
                'tips-pemula' => 'user.kategori.vegan.tips-pemula',
            ],
            'eco-living' => [
                'artikel-eco' => 'user.kategori.eco.artikel-eco',
                'mengurangi-sampah' => 'user.kategori.eco.mengurangi-sampah',
            ],
        ];

        // Check if category and article exist
        if (!isset($articleViews[$category][$article])) {
            abort(404, 'Artikel tidak ditemukan');
        }

        $viewPath = $articleViews[$category][$article];
        
        // Check if view file exists
        if (!view()->exists($viewPath)) {
            abort(404, 'Artikel tidak ditemukan');
        }

        return view($viewPath, [
            'category' => $category,
            'article' => $article
        ]);
    }

    /**
     * Show sarapan seimbang article
     */
    public function sarapanSeimbang()
    {
        return view('user.kategori.pola-makan-sehat.sarapan-seimbang');
    }
}
