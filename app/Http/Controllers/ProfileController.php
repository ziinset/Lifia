<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // contoh data user dummy
        $user = [
            'nama' => 'Maki Zenin Sukochi',
            'username' => 'makimakizenin',
            'email' => 'makimakizenin@gmail.com',
            'nohp' => '082133334444',
            'gender' => 'Perempuan',
            'lahir' => '12-10-2000',
            'bio' => 'Pecinta hidup sehat dan...',
            'hobi' => 'Yoga, Jogging',
            'lokasi' => 'Malang, Jawa Timur',
            'status' => 'Pengguna Premium',
        ];

        return view('user.profil', compact('user'));
    }
}
