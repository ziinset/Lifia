<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel');
Route::get('/cek-sehat', [CekSehatController::class, 'index'])->name('cek-sehat');
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');
Route::get('/fitplan', [FitPlanController::class, 'index'])->name('fitplan');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/artikel/sarapan-seimbang', [ArticleController::class, 'sarapanSeimbang'])->name('artikel.sarapan-seimbang');
Route::get('/profil', [ProfileController::class, 'index'])->name('profil.index');
