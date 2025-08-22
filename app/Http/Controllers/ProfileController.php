<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
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
