<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// ==========================
// Halaman umum (tanpa login)
// ==========================
// Home Route - frontend dari combinerev
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Forgot Password Routes (backend dari jonathan)
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Reset Password dengan Kode Verifikasi (backend dari jonathan)
Route::post('/send-verification-code', [AuthController::class, 'sendVerificationCode'])->name('password.send-code');
Route::get('/verify-code', [AuthController::class, 'showVerifyCode'])->name('password.verify-code');
Route::post('/verify-code', [AuthController::class, 'verifyCodeAndReset'])->name('password.verify-code');

// Logout harus pakai POST
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Search Routes (backend dari jonathan)
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search/suggestions', [SearchController::class, 'suggestions'])->name('search.suggestions');
Route::get('/search/quick', [SearchController::class, 'quickSearch'])->name('search.quick');

// User Profile - gabungkan frontend dan backend
Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'show'])->name('profil');
    Route::post('/profil', [ProfileController::class, 'update'])->name('profil.update');

    // Halaman user lain (backend dari jonathan)
    Route::get('/aktivitas', fn() => view('user.aktivitas'))->name('aktivitas');
    Route::get('/koleksi', [FavoriteController::class, 'showCollection'])->name('koleksi');
    Route::get('/progres', fn() => view('user.progres'))->name('progres');

    // Premium routes with controller (backend dari jonathan)
    Route::get('/premium', [PremiumController::class, 'premium'])->name('premium');
    Route::get('/nonpremium', [PremiumController::class, 'nonpremium'])->name('nonpremium');

    // Favorite routes (backend dari jonathan)
    Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::get('/favorites/check', [FavoriteController::class, 'check'])->name('favorites.check');
});

// Kategori Pola Makan Sehat (frontend dari combinerev)
Route::get('/kategori/pola-makan-sehat', [ArticleController::class, 'kategoriPolaMakanSehat'])->name('kategori.pola-makan-sehat');
Route::get('/kategori/pola-makan-sehat/artikel-makanan', [ArticleController::class, 'kategoriPolaMakanSehat'])->name('kategori.pola-makan-sehat.artikel');
Route::get('/kategori/pola-makan-sehat/sarapan-seimbang', [ArticleController::class, 'sarapanSeimbang'])->name('kategori.pola-makan-sehat.sarapan-seimbang');
Route::get('/kategori/pola-makan-sehat/panduan', [ArticleController::class, 'polaMakanSehatPanduan'])->name('kategori.pola-makan-sehat.panduan');
Route::get('/kategori/pola-makan-sehat/topik', [ArticleController::class, 'polaMakanSehatTopik'])->name('kategori.pola-makan-sehat.topik');
Route::get('/kategori/pola-makan-sehat/banner', [ArticleController::class, 'polaMakanSehatBanner'])->name('kategori.pola-makan-sehat.banner');
Route::get('/kategori/pola-makan-sehat/bagian-artikel', [ArticleController::class, 'polaMakanSehatBagianArtikel'])->name('kategori.pola-makan-sehat.bagian-artikel');

// Kategori Aktivitas Fisik (frontend dari combinerev)
Route::get('/kategori/aktivitas-fisik', [ArticleController::class, 'aktivitasFisik'])->name('kategori.aktivitas-fisik');
Route::get('/kategori/aktivitas-fisik/panduan', [ArticleController::class, 'aktivitasFisikPanduan'])->name('kategori.aktivitas-fisik.panduan');
Route::get('/kategori/aktivitas-fisik/topik', [ArticleController::class, 'aktivitasFisikTopik'])->name('kategori.aktivitas-fisik.topik');
Route::get('/kategori/aktivitas-fisik/banner', [ArticleController::class, 'aktivitasFisikBanner'])->name('kategori.aktivitas-fisik.banner');
Route::get('/kategori/aktivitas-fisik/bagian-artikel', [ArticleController::class, 'aktivitasFisikBagian'])->name('kategori.aktivitas-fisik.bagian-artikel');

// Kategori Kesehatan Mental (frontend dari combinerev)
Route::get('/kategori/kesehatan-mental', [ArticleController::class, 'kesehatanMental'])->name('kategori.kesehatan-mental');
Route::get('/kategori/kesehatan-mental/panduan', [ArticleController::class, 'kesehatanMentalPanduan'])->name('kategori.kesehatan-mental.panduan');
Route::get('/kategori/kesehatan-mental/topik', [ArticleController::class, 'kesehatanMentalTopik'])->name('kategori.kesehatan-mental.topik');
Route::get('/kategori/kesehatan-mental/banner', [ArticleController::class, 'kesehatanMentalBanner'])->name('kategori.kesehatan-mental.banner');
Route::get('/kategori/kesehatan-mental/bagian-artikel', [ArticleController::class, 'kesehatanMentalBagianArtikel'])->name('kategori.kesehatan-mental.bagian-artikel');

// Kategori Eco/Gaya Hidup Ramah Lingkungan (frontend dari combinerev)
Route::get('/kategori/eco', [ArticleController::class, 'eco'])->name('kategori.eco');
Route::get('/kategori/eco/panduan', [ArticleController::class, 'ecoPanduan'])->name('kategori.eco.panduan');
Route::get('/kategori/eco/topik', [ArticleController::class, 'ecoTopik'])->name('kategori.eco.topik');
Route::get('/kategori/eco/banner', [ArticleController::class, 'ecoBanner'])->name('kategori.eco.banner');
Route::get('/kategori/eco/bagian-artikel', [ArticleController::class, 'ecoBagianArtikel'])->name('kategori.eco.bagian-artikel');
Route::get('/kategori/eco/artikel', [ArticleController::class, 'ecoArtikel'])->name('kategori.eco.artikel.artikel');

// Kategori Perawatan Diri/Self-care (frontend dari combinerev)
Route::get('/kategori/perawatan-diri', [ArticleController::class, 'perawatanDiri'])->name('kategori.perawatan-diri');
Route::get('/kategori/perawatan-diri/panduan', [ArticleController::class, 'perawatanDiriPanduan'])->name('kategori.perawatan-diri.panduan');
Route::get('/kategori/perawatan-diri/topik', [ArticleController::class, 'perawatanDiriTopik'])->name('kategori.perawatan-diri.topik');
Route::get('/kategori/perawatan-diri/banner', [ArticleController::class, 'perawatanDiriBanner'])->name('kategori.perawatan-diri.banner');
Route::get('/kategori/perawatan-diri/bagian-artikel', [ArticleController::class, 'perawatanDiriBagianArtikel'])->name('kategori.perawatan-diri.bagian-artikel');

// Kategori Vegan/Vegetarian (frontend dari combinerev)
Route::get('/kategori/vegan', [ArticleController::class, 'vegan'])->name('kategori.vegan');
Route::get('/kategori/vegan/panduan', [ArticleController::class, 'veganPanduan'])->name('kategori.vegan.panduan');
Route::get('/kategori/vegan/topik', [ArticleController::class, 'veganTopik'])->name('kategori.vegan.topik');
Route::get('/kategori/vegan/banner', [ArticleController::class, 'veganBanner'])->name('kategori.vegan.banner');
Route::get('/kategori/vegan/bagian-artikel', [ArticleController::class, 'veganBagianArtikel'])->name('kategori.vegan.bagian-artikel');

// Artikel Routes (Legacy/Alternative) - frontend dari combinerev
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel');
Route::get('/kategori/aktivitas-fisik/artikel', [ArticleController::class, 'aktivitasFisikArtikel'])->name('kategori.aktivitas-fisik.artikel.artikel');
Route::get('/kategori/kesehatan-mental/artikel', [ArticleController::class, 'kesehatanMentalArtikel'])->name('kategori.kesehatan-mental.artikel.artikel');
Route::get('/kategori/perawatan-diri/artikel', [ArticleController::class, 'perawatanArtikel'])->name('kategori.perawatan-diri.artikel.artikel');
Route::get('/kategori/vegan/artikel', [ArticleController::class, 'veganArtikel'])->name('kategori.vegan.artikel.artikel');

// Additional article routes from jonathan
Route::get('/kategori/{category}', [ArticleController::class, 'showCategory'])->name('kategori');
Route::get('/kategori/{category}/{article}', [ArticleController::class, 'showArticle'])->name('artikel.show');
Route::get('/artikel/sarapan-seimbang', [ArticleController::class, 'sarapanSeimbang'])->name('artikel.sarapan-seimbang');
Route::get('/list-olahraga', fn() => view('listolahraga.listolahraga'))->name('list-olahraga');

// Public Routes (Alternative URLs) - frontend dari combinerev
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
    return view('premium.program-turun-berat-badan.program_turunbb');
})->name('program-turun-berat-badan');

Route::get('/program-bentuk-otot', function () {
    return view('premium.program-bentuk-otot.program_bentuk_otot');
})->name('program-bentuk-otot');

Route::get('/program-stamina-energi', function () {
    return view('premium.program-stamina-energi.program_stamina_energi');
})->name('program-stamina-energi');

Route::get('/program-tubuh-lentur', function () {
    return view('premium.program-tubuh-lentur.program_tubuh_lentar');
})->name('program-tubuh-lentur');

// Premium: Meal Plan
Route::get('/mealplan', function () {
    return view('premium.mealplan');
})->name('mealplan');

// ==========================
// Admin Routes (backend dari jonathan)
// ==========================
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');
    Route::get('/admin/langganan', [AdminController::class, 'langganan'])
        ->name('admin.langganan');
    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])
        ->name('admin.profile.update');
});
