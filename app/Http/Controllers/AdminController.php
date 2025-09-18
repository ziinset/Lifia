<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function langganan()
    {
        return view('admin.langganan');
    }

    // Update admin profile (foto, nama, dan status)
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Pastikan hanya admin yang bisa mengakses
        if ($user->role !== 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak. Hanya admin yang dapat mengupdate profil ini.');
        }

        $request->validate([
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama_lengkap' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        $updated = false;

        // Upload foto profil
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_profil', 'public');
            $user->foto = $path;
            $updated = true;
        }

        // Update nama lengkap
        if ($request->filled('nama_lengkap')) {
            $user->nama_lengkap = $request->nama_lengkap;
            $updated = true;
        }

        // Update status (hanya untuk admin)
        if ($request->filled('status')) {
            $user->status = $request->status;
            $updated = true;
        }

        if ($updated) {
            $user->save();
            return redirect()->route('admin.dashboard')->with('success', 'Profil berhasil diperbarui!');
        }

        return redirect()->route('admin.dashboard')->with('info', 'Tidak ada perubahan yang disimpan.');
    }
}
