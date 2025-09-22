<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================
// Halaman umum (tanpa login)
// ==========================
Route::get('/', fn() => view('home'))->name('home');
Route::get('/home', fn() => view('home'))->name('home');
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel');
Route::get('/kategori/{category}', [ArticleController::class, 'showCategory'])->name('kategori');
Route::get('/kategori/{category}/{article}', [ArticleController::class, 'showArticle'])->name('artikel.show');
Route::get('/artikel/sarapan-seimbang', [ArticleController::class, 'sarapanSeimbang'])->name('artikel.sarapan-seimbang');
Route::get('/list-olahraga', fn() => view('listolahraga.listolahraga'))->name('list-olahraga');

// Search Routes
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search/suggestions', [SearchController::class, 'suggestions'])->name('search.suggestions');
Route::get('/search/quick', [SearchController::class, 'quickSearch'])->name('search.quick');

// ==========================
// Auth Routes
// ==========================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Forgot Password Routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Reset Password dengan Kode Verifikasi
Route::post('/send-verification-code', [AuthController::class, 'sendVerificationCode'])->name('password.send-code');
Route::get('/verify-code', [AuthController::class, 'showVerifyCode'])->name('password.verify-code');
Route::post('/verify-code', [AuthController::class, 'verifyCodeAndReset'])->name('password.verify-code');

// Logout harus pakai POST
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================
// User Routes (hanya untuk user login)
// ==========================
Route::middleware('auth')->group(function () {
    // Profil (tampil + update)
    Route::get('/profil', [ProfileController::class, 'show'])->name('profil');
    Route::post('/profil', [ProfileController::class, 'update'])->name('profil.update');

    // Halaman user lain
    Route::get('/aktivitas', fn() => view('user.aktivitas'))->name('aktivitas');
    Route::get('/koleksi', [FavoriteController::class, 'showCollection'])->name('koleksi');
    Route::get('/progres', fn() => view('user.progres'))->name('progres');
    // Premium routes with controller
    Route::get('/premium', [PremiumController::class, 'premium'])->name('premium');
    Route::get('/nonpremium', [PremiumController::class, 'nonpremium'])->name('nonpremium');

    // Favorite routes
    Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::get('/favorites/check', [FavoriteController::class, 'check'])->name('favorites.check');
});

// ==========================
// Admin Routes (aksesnya sama dengan user login biasa)
// ==========================
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');
    Route::get('/admin/langganan', [AdminController::class, 'langganan'])
        ->name('admin.langganan');
    Route::get('/admin/kategori', [AdminController::class, 'kategori'])
        ->name('admin.kategori');

    // Admin Article Category Routes
    Route::get('/admin/pola-makan-sehat', [AdminController::class, 'polaMakanSehat'])
        ->name('admin.pola-makan-sehat');
    Route::get('/admin/aktivitas-fisik', [AdminController::class, 'aktivitasFisik'])
        ->name('admin.aktivitas-fisik');
    Route::get('/admin/kesehatan-mental', [AdminController::class, 'kesehatanMental'])
        ->name('admin.kesehatan-mental');
    Route::get('/admin/perawatan-diri', [AdminController::class, 'perawatanDiri'])
        ->name('admin.perawatan-diri');
    Route::get('/admin/gaya-hidup-vegan', [AdminController::class, 'gayaHidupVegan'])
        ->name('admin.gaya-hidup-vegan');
    Route::get('/admin/eco-living', [AdminController::class, 'ecoLiving'])
        ->name('admin.eco-living');

    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])
        ->name('admin.profile.update');
});
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
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');

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

// Premium: Panduan Bakar Lemak di Perut
Route::get('/panduan/bakar-lemak-di-perut', function () {
    return view('premium.panduan-bakar-lemak');
})->name('premium.panduan-bakar-lemak');
