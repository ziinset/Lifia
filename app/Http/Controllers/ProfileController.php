<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileController extends Controller
{
    // Tampilkan profil
    public function show()
    {
        $user = Auth::user();
        $profile = $user->profile;

        // kalau belum ada profil, buat kosong biar bisa diisi
        if (!$profile) {
            $profile = Profile::create([
                'user_id' => $user->id,
            ]);
        }

        return view('user.profil', compact('user', 'profile'));
    }

    // Update profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nomor' => 'nullable|string|max:20',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'nullable|date',
            'hobi' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
        ]);

        $profile = $user->profile;
        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }

        $profile->nomor = $request->nomor;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->tanggal_lahir = $request->tanggal_lahir;
        $profile->hobi = $request->hobi;
        $profile->bio = $request->bio;
        $profile->instagram = $request->instagram;
        $profile->tiktok = $request->tiktok;
        $profile->facebook = $request->facebook;

        $profile->save();

        return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui!');
    }
}
