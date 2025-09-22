<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MealPlanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================
// Halaman umum (tanpa login)
// ==========================
Route::get('/', fn() => view('landing'))->name('landing');
Route::get('/home', fn() => view('home'))->name('home');
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel');
Route::get('/kategori/{category}', [ArticleController::class, 'showCategory'])->name('artikel.category');
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
    
    // Category CRUD Routes
    Route::resource('admin/categories', CategoryController::class)->except(['show']);
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/admin/categories/{category}/toggle', [CategoryController::class, 'toggleStatus'])->name('admin.categories.toggle');
    Route::post('/admin/categories/update-order', [CategoryController::class, 'updateOrder'])->name('admin.categories.update-order');
    
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
    
    // Dynamic Category Routes - untuk kategori baru yang ditambahkan via CRUD
    Route::get('/admin/{category}', [AdminController::class, 'dynamicCategory'])
        ->name('admin.dynamic-category')
        ->where('category', '[a-z0-9\-]+');
        
    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])
        ->name('admin.profile.update');
});

// ==========================
// Premium Routes (requires login)
// ==========================
Route::middleware(['auth'])->group(function () {
    Route::get('/premium/mealplan', [MealPlanController::class, 'index'])->name('premium.mealplan');
    Route::get('/premium/mealplan/day/{day}', [MealPlanController::class, 'getMealPlan'])->name('premium.mealplan.day');
    Route::get('/premium/mealplan/weekly', [MealPlanController::class, 'getWeeklyOverview'])->name('premium.mealplan.weekly');
});
