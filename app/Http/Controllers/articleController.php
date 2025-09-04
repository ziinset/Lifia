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

    public function olahragaAmanBumil()
    {
        return view('user.kategori.aktivitas-fisik.olahraga-aman-bumil');
    }

    // Kesehatan Mental Methods
    public function kesehatanMental()
    {
        return view('user.kategori.kesehatan-mental.kesehatan-mental');
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
        return view('user.kategori.kesehatan-mental.sarapan-seimbang');
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

    public function listOlahraga()
    {
        return view('user.kategori.aktivitas-fisik.listolahraga');
    }

    public function aktivitasFisikTopik()
    {
        return view('user.kategori.aktivitas-fisik.topik4');
    }

    public function aktivitasFisikBanner()
    {
        return view('user.kategori.aktivitas-fisik.banner4');
    }

    public function aktivitasFisikBagian()
    {
        return view('user.kategori.aktivitas-fisik.bagian');
    }
}