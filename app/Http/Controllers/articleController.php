<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function kategoriPolaMakanSehat()
    {
        return view('user.kategori.pola-makan-sehat.artikel-makanan');
    }

    public function sarapanSeimbang()
    {
        return view('user.kategori.pola-makan-sehat.artikel.artikel');
    }

    // Kesehatan Mental Methods
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

    // Eco/Gaya Hidup Ramah Lingkungan Methods
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

    // Perawatan Diri/Self-care Methods
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

    // Vegan/Vegetarian Methods
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

    // =============================
    // Navigasi umum (dipanggil rute)
    // =============================

    public function showCategory($category)
    {
        $slug = $category;

        // Mapping kategori default (selalu pakai view spesifik, tanpa Coming Soon)
        $categoryViews = [
            'pola-makan-sehat'  => 'user.kategori.pola-makan-sehat.artikel-makanan',
            'aktivitas-fisik'   => 'user.kategori.aktivitas-fisik.listolahraga',
            'kesehatan-mental'  => 'user.kategori.kesehatan-mental.artikel-mental',
            'perawatan-diri'    => 'user.kategori.perawatan-diri.artikel-perawatan',
            'vegan'             => 'user.kategori.vegan.artikel-vegan',
            'gaya-hidup-vegan'  => 'user.kategori.vegan.artikel-vegan', // alias slug
            'eco-living'        => 'user.kategori.eco.artikel-eco',
        ];

        if (isset($categoryViews[$slug])) {
            $viewPath = $categoryViews[$slug];
            if (!view()->exists($viewPath)) {
                $viewPath = 'artikel.artikel';
            }
            return view($viewPath, ['category' => $slug]);
        }

        // Kategori dinamis (baru ditambahkan): cek DB dan tampilkan Coming Soon jika belum ada artikel
        $categoryModel = Category::where('slug', $slug)->first();
        if (!$categoryModel) {
            abort(404, 'Kategori tidak ditemukan');
        }

        $hasArticles = class_exists(Article::class)
            ? Article::where('category', $slug)->exists()
            : false;

        if (!$hasArticles) {
            return view('user.kategori.coming-soon', compact('slug', 'categoryModel'));
        }

        // Jika sudah ada artikel untuk kategori dinamis, arahkan ke halaman generik
        $fallbackView = 'artikel.artikel';
        if (!view()->exists($fallbackView)) {
            abort(404);
        }
        return view($fallbackView, ['category' => $slug]);
    }

    public function showArticle($category, $article)
    {
        $articleViews = [
            'pola-makan-sehat' => [
                'artikel-makanan'   => 'user.kategori.pola-makan-sehat.artikel-makanan',
                'sarapan-seimbang'  => 'user.kategori.pola-makan-sehat.sarapan-seimbang',
            ],
            'aktivitas-fisik' => [
                'listolahraga'      => 'user.kategori.aktivitas-fisik.listolahraga',
            ],
            'kesehatan-mental' => [
                'artikel-mental'    => 'user.kategori.kesehatan-mental.artikel-mental',
                'artikel'           => 'user.kategori.kesehatan-mental.artikel.artikel',
            ],
            'perawatan-diri' => [
                'artikel-perawatan' => 'user.kategori.perawatan-diri.artikel-perawatan',
                'artikel'           => 'user.kategori.perawatan-diri.artikel.artikel',
            ],
            'vegan' => [
                'artikel-vegan'     => 'user.kategori.vegan.artikel-vegan',
                'artikel'           => 'user.kategori.vegan.artikel.artikel',
            ],
            'eco-living' => [
                'artikel-eco'       => 'user.kategori.eco.artikel-eco',
                'artikel'           => 'user.kategori.eco.artikel.artikel',
            ],
        ];

        if (!isset($articleViews[$category][$article])) {
            abort(404, 'Artikel tidak ditemukan');
        }

        $viewPath = $articleViews[$category][$article];
        if (!view()->exists($viewPath)) {
            abort(404, 'Artikel tidak ditemukan');
        }

        return view($viewPath, compact('category', 'article'));
    }
}