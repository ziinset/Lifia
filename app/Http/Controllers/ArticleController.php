<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Landing/legacy article index
    public function index()
    {
        return view('user.kategori.pola-makan-sehat.bagianartikel');
    }

    // Pola Makan Sehat
    public function kategoriPolaMakanSehat()
    {
        return view('user.kategori.pola-makan-sehat.artikel-makanan');
    }

    public function sarapanSeimbang()
    {
        return view('user.kategori.pola-makan-sehat.artikel.artikel');
    }

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

    // Aktivitas Fisik
    public function aktivitasFisik()
    {
        return view('user.kategori.aktivitas-fisik.artikel-fisik');
    }

    public function aktivitasFisikPanduan()
    {
        return view('user.kategori.aktivitas-fisik.panduan');
    }

    public function aktivitasFisikTopik()
    {
        return view('user.kategori.aktivitas-fisik.topik');
    }

    public function aktivitasFisikBanner()
    {
        return view('user.kategori.aktivitas-fisik.banner');
    }

    public function aktivitasFisikBagianArtikel()
    {
        return view('user.kategori.aktivitas-fisik.bagianartikel');
    }

    public function aktivitasFisikArtikel()
    {
        return view('user.kategori.aktivitas-fisik.artikel.artikel');
    }

    // Kesehatan Mental
    public function kesehatanMental()
    {
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

    public function kesehatanMentalArtikel()
    {
        return view('user.kategori.kesehatan-mental.artikel.artikel');
    }

    // Eco / Gaya Hidup Ramah Lingkungan
    public function eco()
    {
        return view('user.kategori.eco.artikel-eco');
    }

    public function ecoPanduan()
    {
        return view('user.kategori.eco.panduan');
    }

    public function ecoTopik()
    {
        return view('user.kategori.eco.topik');
    }

    public function ecoBanner()
    {
        return view('user.kategori.eco.banner');
    }

    public function ecoBagianArtikel()
    {
        return view('user.kategori.eco.bagianartikel');
    }

    public function ecoArtikel()
    {
        return view('user.kategori.eco.artikel.artikel');
    }

    // Perawatan Diri / Self-care
    public function perawatanDiri()
    {
        return view('user.kategori.perawatan-diri.artikel-perawatan');
    }

    public function perawatanDiriPanduan()
    {
        return view('user.kategori.perawatan-diri.panduan');
    }

    public function perawatanDiriTopik()
    {
        return view('user.kategori.perawatan-diri.topik');
    }

    public function perawatanDiriBanner()
    {
        return view('user.kategori.perawatan-diri.banner');
    }

    public function perawatanDiriBagianArtikel()
    {
        return view('user.kategori.perawatan-diri.bagianartikel');
    }

    public function perawatanArtikel()
    {
        return view('user.kategori.perawatan-diri.artikel.artikel');
    }

    // Vegan / Vegetarian
    public function vegan()
    {
        return view('user.kategori.vegan.artikel-vegan');
    }

    public function veganPanduan()
    {
        return view('user.kategori.vegan.panduan');
    }

    public function veganTopik()
    {
        return view('user.kategori.vegan.topik');
    }

    public function veganBanner()
    {
        return view('user.kategori.vegan.banner');
    }

    public function veganBagianArtikel()
    {
        return view('user.kategori.vegan.bagianartikel');
    }

    public function veganArtikel()
    {
        return view('user.kategori.vegan.artikel.artikel');
    }

    // Backend dynamic routes
    public function showCategory($category)
    {
        $categoryViews = [
            'pola-makan-sehat' => 'user.kategori.pola-makan-sehat.bagianartikel',
            'aktivitas-fisik' => 'user.kategori.aktivitas-fisik.bagianartikel',
            'kesehatan-mental' => 'user.kategori.kesehatan-mental.bagianartikel',
            'perawatan-diri' => 'user.kategori.perawatan-diri.bagianartikel',
            'vegan' => 'user.kategori.vegan.bagianartikel',
            'eco' => 'user.kategori.eco.bagianartikel',
            'eco-living' => 'user.kategori.eco.bagianartikel',
        ];

        if (!array_key_exists($category, $categoryViews)) {
            abort(404, 'Kategori tidak ditemukan');
        }

        $viewPath = $categoryViews[$category];
        if (!view()->exists($viewPath)) {
            abort(404, 'Kategori tidak ditemukan');
        }

        return view($viewPath, ['category' => $category]);
    }

    public function showArticle($category, $article)
    {
        $articleViews = [
            'pola-makan-sehat' => [
                'artikel-makanan' => 'user.kategori.pola-makan-sehat.artikel-makanan',
                'sarapan-seimbang' => 'user.kategori.pola-makan-sehat.sarapan-seimbang',
            ],
            'aktivitas-fisik' => [
                'olahraga-aman-bumil' => 'user.kategori.aktivitas-fisik.olahraga-aman-bumil',
                'listolahraga' => 'user.kategori.aktivitas-fisik.listolahraga',
                'artikel-fisik' => 'user.kategori.aktivitas-fisik.artikel-fisik',
            ],
            'kesehatan-mental' => [
                'artikel-mental' => 'user.kategori.kesehatan-mental.artikel-mental',
                'meredakan-stres' => 'user.kategori.kesehatan-mental.meredakan-stres',
            ],
            'perawatan-diri' => [
                'artikel-perawatan' => 'user.kategori.perawatan-diri.artikel-perawatan',
                'kulit-malam' => 'user.kategori.perawatan-diri.kulit-malam',
            ],
            'vegan' => [
                'artikel-vegan' => 'user.kategori.vegan.artikel-vegan',
                'tips-pemula' => 'user.kategori.vegan.tips-pemula',
            ],
            'eco' => [
                'artikel-eco' => 'user.kategori.eco.artikel-eco',
                'mengurangi-sampah' => 'user.kategori.eco.mengurangi-sampah',
            ],
            'eco-living' => [
                'artikel-eco' => 'user.kategori.eco.artikel-eco',
                'mengurangi-sampah' => 'user.kategori.eco.mengurangi-sampah',
            ],
        ];

        if (!isset($articleViews[$category][$article])) {
            abort(404, 'Artikel tidak ditemukan');
        }

        $viewPath = $articleViews[$category][$article];
        if (!view()->exists($viewPath)) {
            abort(404, 'Artikel tidak ditemukan');
        }

        return view($viewPath, [
            'category' => $category,
            'article' => $article,
        ]);
    }
}
