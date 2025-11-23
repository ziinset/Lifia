<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class ProfileController extends Controller
{
    // Tampilkan profil
    public function show()
    {
        $user = Auth::user();
        // Tampilkan profil dengan layout custom milik user
        return view('user.profil-user.profil', compact('user'));
    }

    // Update profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'lokasi'        => 'nullable|string|max:255',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'nomor'         => 'nullable|string|max:20',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'nullable|date',
            'hobi'          => 'nullable|string|max:255',
            'bio'           => 'nullable|string',
            'instagram'     => 'nullable|string|max:255',
            'tiktok'        => 'nullable|string|max:255',
            'facebook'      => 'nullable|string|max:255',
        ]);

        // ========== Update ke tabel users ==========
        // Update field yang ada di database
        $user->lokasi = $request->lokasi ?? $user->lokasi;
        
        // Upload foto profil
        if ($request->hasFile('foto')) {
            try {
                // Hapus foto lama jika ada
                if (!empty($user->foto) && Storage::disk('public')->exists($user->foto)) {
                    Storage::disk('public')->delete($user->foto);
                }
                // Simpan foto baru
                $path = $request->file('foto')->store('foto_profil', 'public');
                $user->foto = $path; // simpan relative path di disk 'public'
            } catch (\Throwable $e) {
                // Jika gagal upload, jangan hentikan update field lain
                // Anda bisa menambahkan logging bila diperlukan
            }
        }

        // Update field lain dengan cara manual (bypass fillable)
        if ($request->has('nomor')) {
            $user->setAttribute('nomor', $request->nomor);
        }
        if ($request->has('jenis_kelamin')) {
            $user->setAttribute('jenis_kelamin', $request->jenis_kelamin);
        }
        if ($request->has('tanggal_lahir')) {
            $user->setAttribute('tanggal_lahir', $request->tanggal_lahir);
        }
        if ($request->has('hobi')) {
            $user->setAttribute('hobi', $request->hobi);
        }
        if ($request->has('bio')) {
            $user->setAttribute('bio', $request->bio);
        }
        if ($request->has('instagram')) {
            $user->setAttribute('instagram', $request->instagram);
        }
        if ($request->has('tiktok')) {
            $user->setAttribute('tiktok', $request->tiktok);
        }
        if ($request->has('facebook')) {
            $user->setAttribute('facebook', $request->facebook);
        }

        $user->save();

        return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui!');
    }
}
