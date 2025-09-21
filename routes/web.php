<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Profile
Route::get('/profil', [ProfileController::class, 'index'])->name('profil.index');
Route::put('/profil/update', [ProfileController::class, 'update'])->name('profil.update');

// Kategori Pola Makan Sehat
Route::get('/kategori/pola-makan-sehat', [ArticleController::class, 'index'])->name('kategori.pola-makan-sehat');
Route::get('/kategori/pola-makan-sehat/artikel-makanan', [ArticleController::class, 'index'])->name('kategori.pola-makan-sehat.artikel');
Route::get('/kategori/pola-makan-sehat/sarapan-seimbang', [ArticleController::class, 'sarapanSeimbang'])->name('kategori.pola-makan-sehat.sarapan-seimbang');
Route::get('/kategori/pola-makan-sehat/panduan', [ArticleController::class, 'polaMakanSehatPanduan'])->name('kategori.pola-makan-sehat.panduan');
Route::get('/kategori/pola-makan-sehat/topik', [ArticleController::class, 'polaMakanSehatTopik'])->name('kategori.pola-makan-sehat.topik');
Route::get('/kategori/pola-makan-sehat/banner', [ArticleController::class, 'polaMakanSehatBanner'])->name('kategori.pola-makan-sehat.banner');
Route::get('/kategori/pola-makan-sehat/bagian-artikel', [ArticleController::class, 'polaMakanSehatBagianArtikel'])->name('kategori.pola-makan-sehat.bagian-artikel');

// Kategori Aktivitas Fisik
Route::get('/kategori/aktivitas-fisik', [ArticleController::class, 'aktivitasFisik'])->name('kategori.aktivitas-fisik');
Route::get('/kategori/aktivitas-fisik/panduan', [ArticleController::class, 'aktivitasFisikPanduan'])->name('kategori.aktivitas-fisik.panduan');
Route::get('/kategori/aktivitas-fisik/topik', [ArticleController::class, 'aktivitasFisikTopik'])->name('kategori.aktivitas-fisik.topik');
Route::get('/kategori/aktivitas-fisik/banner', [ArticleController::class, 'aktivitasFisikBanner'])->name('kategori.aktivitas-fisik.banner');
Route::get('/kategori/aktivitas-fisik/bagian-artikel', [ArticleController::class, 'aktivitasFisikBagian'])->name('kategori.aktivitas-fisik.bagian-artikel');
Route::get('/kategori/aktivitas-fisik/olahraga-aman-bumil', [ArticleController::class, 'olahragaAmanBumil'])->name('kategori.aktivitas-fisik.olahraga-aman-bumil');

// Kategori Kesehatan Mental
Route::get('/kategori/kesehatan-mental', action: [ArticleController::class, 'kesehatanMental'])->name('kategori.kesehatan-mental');
Route::get('/kategori/kesehatan-mental/panduan', [ArticleController::class, 'kesehatanMentalPanduan'])->name('kategori.kesehatan-mental.panduan');
Route::get('/kategori/kesehatan-mental/topik', [ArticleController::class, 'kesehatanMentalTopik'])->name('kategori.kesehatan-mental.topik');
Route::get('/kategori/kesehatan-mental/banner', [ArticleController::class, 'kesehatanMentalBanner'])->name('kategori.kesehatan-mental.banner');
Route::get('/kategori/kesehatan-mental/bagian-artikel', [ArticleController::class, 'kesehatanMentalBagianArtikel'])->name('kategori.kesehatan-mental.bagian-artikel');
Route::get('/kategori/kesehatan-mental/sarapan-seimbang', [ArticleController::class, 'kesehatanMentalSarapanSeimbang'])->name('kategori.kesehatan-mental.sarapan-seimbang');

// Kategori Eco/Gaya Hidup Ramah Lingkungan
Route::get('/kategori/eco', [ArticleController::class, 'eco'])->name('kategori.eco');
Route::get('/kategori/eco/panduan', [ArticleController::class, 'ecoPanduan'])->name('kategori.eco.panduan');
Route::get('/kategori/eco/topik', [ArticleController::class, 'ecoTopik'])->name('kategori.eco.topik');
Route::get('/kategori/eco/banner', [ArticleController::class, 'ecoBanner'])->name('kategori.eco.banner');
Route::get('/kategori/eco/bagian-artikel', [ArticleController::class, 'ecoBagianArtikel'])->name('kategori.eco.bagian-artikel');
Route::get('/kategori/eco/mengurangi-sampah', [ArticleController::class, 'ecoMengurangiSampah'])->name('kategori.eco.mengurangi-sampah');

// Kategori Perawatan Diri/Self-care
Route::get('/kategori/perawatan-diri', [ArticleController::class, 'perawatanDiri'])->name('kategori.perawatan-diri');
Route::get('/kategori/perawatan-diri/panduan', [ArticleController::class, 'perawatanDiriPanduan'])->name('kategori.perawatan-diri.panduan');
Route::get('/kategori/perawatan-diri/topik', [ArticleController::class, 'perawatanDiriTopik'])->name('kategori.perawatan-diri.topik');
Route::get('/kategori/perawatan-diri/banner', [ArticleController::class, 'perawatanDiriBanner'])->name('kategori.perawatan-diri.banner');
Route::get('/kategori/perawatan-diri/bagian-artikel', [ArticleController::class, 'perawatanDiriBagianArtikel'])->name('kategori.perawatan-diri.bagian-artikel');
Route::get('/kategori/perawatan-diri/kulit-malam', [ArticleController::class, 'perawatanDiriKulitMalam'])->name('kategori.perawatan-diri.kulit-malam');

// Kategori Vegan/Vegetarian
Route::get('/kategori/vegan', [ArticleController::class, 'vegan'])->name('kategori.vegan');
Route::get('/kategori/vegan/panduan', [ArticleController::class, 'veganPanduan'])->name('kategori.vegan.panduan');
Route::get('/kategori/vegan/topik', [ArticleController::class, 'veganTopik'])->name('kategori.vegan.topik');
Route::get('/kategori/vegan/banner', [ArticleController::class, 'veganBanner'])->name('kategori.vegan.banner');
Route::get('/kategori/vegan/bagian-artikel', [ArticleController::class, 'veganBagianArtikel'])->name('kategori.vegan.bagian-artikel');
Route::get('/kategori/vegan/tips-pemula', [ArticleController::class, 'veganTipsPemula'])->name('kategori.vegan.tips-pemula');

// Artikel Routes (Legacy/Alternative)
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel');
Route::get('/artikel/sarapan-seimbang', [ArticleController::class, 'sarapanSeimbang'])->name('artikel.sarapan-seimbang');
Route::get('/artikel/olahraga-aman-bumil', [ArticleController::class, 'olahragaAmanBumil'])->name('artikel.olahraga-aman-bumil');

// Public Routes (Alternative URLs)
Route::get('/pola-makan-sehat', [ArticleController::class, 'index'])->name('pola-makan-sehat');
Route::get('/aktivitas-fisik', [ArticleController::class, 'aktivitasFisik'])->name('aktivitas-fisik');
Route::get('/kesehatan-mental', [ArticleController::class, 'kesehatanMental'])->name('kesehatan-mental');
Route::get('/eco', [ArticleController::class, 'eco'])->name('eco');
Route::get('/perawatan-diri', [ArticleController::class, 'perawatanDiri'])->name('perawatan-diri');
Route::get('/vegan', [ArticleController::class, 'vegan'])->name('vegan');
Route::get('/tentang-kami', [\App\Http\Controllers\TentangKamiController::class, 'index'])->name('tentang-kami');

// About Route
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Test Route (for development)
Route::get('/test', function () {
    return view('test');
})->name('test');

// BMI Route
Route::get('/cek-bmi', [BmiController::class, 'index'])->name('cek-bmi');

// FitPlan Route (placeholder for now)
Route::get('/fitplan', function () {
    return view('premium.fitplan');
})->name('fitplan');

Route::get('/program-turun-berat-badan', function () {
    return view('premium.program-turunbb');
})->name('program-turun-berat-badan');
