<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/artikel', function () {
    return view('artikel.artikel');
})->name('artikel');

Route::get('/list-olahraga', function () {
    return view('listolahraga.listolahraga');
})->name('list-olahraga');

Route::get('/profil', function () {
    return view('user.profil');
})->name('profil');

Route::get('/aktivitas', function () {
    return view('user.aktivitas');
})->name('aktivitas');

// Tambahan route untuk Koleksi, Progres, Premium
Route::get('/koleksi', function () {
    return view('user.koleksi');
})->name('koleksi');

Route::get('/progres', function () {
    return view('user.progres');
})->name('progres');

Route::get('/premium', function () {
    return view('user.premium');
})->name('premium');
