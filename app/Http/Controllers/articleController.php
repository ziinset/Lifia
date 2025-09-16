<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('user.kategori.pola-makan-sehat.artikel-makanan');
    }

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
        return view('user.kategori.aktivitas-fisik.listolahraga');
    }

    public function aktivitasFisikPanduan()
    {
        return view('user.kategori.aktivitas-fisik.panduan');
    }

    public function olahragaAmanBumil()
    {
        return view('user.kategori.aktivitas-fisik.olahraga-aman-bumil');
    }

    public function aktivitasFisikTopik()
    {
        return view('user.kategori.aktivitas-fisik.topik');
    }

    public function aktivitasFisikBanner()
    {
        return view('user.kategori.aktivitas-fisik.banner');
    }

    public function aktivitasFisikBagian()
    {
        return view('user.kategori.aktivitas-fisik.bagian');
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

    public function ecoMengurangiSampah()
    {
        return view('user.kategori.eco.mengurangi-sampah');
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

    public function perawatanDiriKulitMalam()
    {
        return view('user.kategori.perawatan-diri.kulit-malam');
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

    public function veganTipsPemula()
    {
        return view('user.kategori.vegan.tips-pemula');
    }
}