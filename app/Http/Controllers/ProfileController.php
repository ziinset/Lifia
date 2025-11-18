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

        return view('user.profil-user.profil', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'nohp' => 'required|string|max:15',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'lahir' => 'required|date',
            'bio' => 'nullable|string|max:500',
            'hobi' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
        ]);

        // Update user data (dummy implementation)
        // In real application, you would update the actual user model

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
