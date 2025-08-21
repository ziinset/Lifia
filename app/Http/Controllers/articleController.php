<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('user.artikel-makanan.artikel-makanan');
    }

    public function sarapanSeimbang()
    {
        return view('user.artikel-makanan.sarapan-seimbang');
    }

    public function olahragaAmanBumil()
    {
        return view('user.artikel-fisik.olahraga-aman-bumil');
    }

    // Manual methods per article can be added below as needed
}