<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CekSehatController;
use App\Http\Controllers\FitPlanController;
use App\Http\Controllers\AuthController;

// ----------------- Halaman Utama -----------------
Route::get('/', [HomeController::class, 'index'])->name('home');

// ----------------- Artikel -----------------
Route::get('/artikel/pola-makan', fn() => view('artikel.pola-makan'))->name('artikel.pola-makan');
Route::get('/artikel/aktivitas', fn() => view('artikel.aktivitas'))->name('artikel.aktivitas');
Route::get('/artikel/mental', fn() => view('artikel.mental'))->name('artikel.mental');
Route::get('/artikel/perawatan', fn() => view('artikel.perawatan'))->name('artikel.perawatan');
Route::get('/artikel/vegan', fn() => view('artikel.vegan'))->name('artikel.vegan');
Route::get('/artikel/eco', fn() => view('artikel.eco'))->name('artikel.eco');

// ----------------- Halaman Informasi -----------------
Route::get('/cek-sehat', [CekSehatController::class, 'index'])->name('cek-sehat');
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');
Route::get('/fitplan', [FitPlanController::class, 'index'])->name('fitplan');

// ----------------- Profil -----------------
Route::get('/profil', [ProfileController::class, 'index'])->name('profil.index');

// ----------------- Auth (Login/Register/Logout) -----------------
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/hero-olga', function() { return view('components.hero-olga'); }); 
Route::get('/hero-mental', function() { return view('components.hero-mental'); }); 
Route::get('/hero-skin', function() { return view('components.hero-skin'); }); 
Route::get('/hero-vegan', function() { return view('components.hero-vegan'); }); 
Route::get('/hero-eco', function() { return view('components.hero-eco'); }); 