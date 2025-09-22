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
        // Map category slugs to view paths
        $categoryViews = [
            'pola-makan-sehat' => 'user.kategori.pola-makan-sehat.bagianartikel',
            'aktivitas-fisik' => 'user.kategori.aktivitas-fisik.bagian',
            'kesehatan-mental' => 'user.kategori.kesehatan-mental.bagianartikel',
            'perawatan-diri' => 'artikel.artikel', // fallback to main artikel
            'vegan' => 'artikel.artikel', // fallback to main artikel
            'eco-living' => 'artikel.artikel', // fallback to main artikel
        ];

        // Check if category exists
        if (!array_key_exists($category, $categoryViews)) {
            abort(404, 'Kategori tidak ditemukan');
        }

        $viewPath = $categoryViews[$category];

        // Check if view file exists
        if (!view()->exists($viewPath)) {
            // Fallback to main artikel page
            $viewPath = 'artikel.artikel';
        }

        return view($viewPath, ['category' => $category]);
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

    // Kesehatan Mental Methods
    public function kesehatanMental()
    {
        // Use the existing view file as the main page for Kesehatan Mental
        return view('user.kategori.kesehatan-mental.artikel-mental');
    }

    public function kesehatanMentalPanduan()
    {
        return view('user.kategori.kesehatan-mental.panduan');
    }

    public function kesehatanMentalTopik()
    {
        return view('user.kategori.kesehatan-mental.topik');
    }

    public function kesehatanMentalBanner()
    {
        return view('user.kategori.kesehatan-mental.banner');
    }

    public function kesehatanMentalBagianArtikel()
    {
        return view('user.kategori.kesehatan-mental.bagianartikel');
    }

    public function kesehatanMentalSarapanSeimbang()
    {
        return view('user.kategori.kesehatan-mental.meredakan-stres');
    }

    // Pola Makan Sehat Methods
    public function polaMakanSehatPanduan()
    {
        return view('user.kategori.pola-makan-sehat.panduan');
    }

    public function polaMakanSehatTopik()
    {
        return view('user.kategori.pola-makan-sehat.topik');
    }

    public function polaMakanSehatBanner()
    {
        return view('user.kategori.pola-makan-sehat.banner');
    }

    public function polaMakanSehatBagianArtikel()
    {
        return view('user.kategori.pola-makan-sehat.bagianartikel');
    }

// Aktivitas Fisik Methods
public function aktivitasFisik()
{
    return view('user.kategori.aktivitas-fisik.artikel-fisik');
}
