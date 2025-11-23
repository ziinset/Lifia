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

    public function kategori()
    {
        $categories = \App\Models\Category::orderBy('sort_order', 'asc')->get();
        return view('admin.kategori', compact('categories'));
    }

    public function polaMakanSehat()
    {
        return view('admin.crud-pola-makan');
    }

    public function aktivitasFisik()
    {
        return view('admin.crud-aktivitas-fisik');
    }

    public function kesehatanMental()
    {
        return view('admin.crud-kesehatan-mental');
    }

    public function perawatanDiri()
    {
        return view('admin.crud-perawatan-diri');
    }

    public function gayaHidupVegan()
    {
        return view('admin.crud-gaya-hidup-vegan');
    }

    public function ecoLiving()
    {
        return view('admin.crud-eco-living');
    }

    /**
     * Handle dynamic category routes for new categories added via CRUD
     */
    public function dynamicCategory($category)
    {
        // Check if category exists in database
        $categoryModel = \App\Models\Category::where('slug', $category)->first();
        
        if (!$categoryModel) {
            abort(404, 'Kategori tidak ditemukan');
        }
        
        // Try to find existing CRUD view for this category
        $viewName = 'admin.crud-' . $category;
        
        if (view()->exists($viewName)) {
            return view($viewName);
        }
        
        // If no specific view exists, use generic CRUD view
        return view('admin.crud-generic', compact('categoryModel'));
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
