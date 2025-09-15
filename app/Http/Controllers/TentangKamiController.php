<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        // arahkan ke view tentang-kami.blade.php
        return view('tentang-kami');
    }
}