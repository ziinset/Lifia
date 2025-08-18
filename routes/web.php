<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/artikel/sarapan-seimbang', [ArticleController::class, 'sarapanSeimbang']
)->name('artikel.sarapan-seimbang');