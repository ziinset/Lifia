<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('hero1'); // resources/views/hero1.blade.php
})->name('beranda');

Route::get('/artikel', function () {
    return view('artikel'); // resources/views/artikel.blade.php
})->name('artikel');

Route::get('/cek-sehat', function () {
    return view('cek-sehat'); // resources/views/cek-sehat.blade.php
})->name('cek-sehat');

Route::get('/tentang-kami', function () {
    return view('tentang-kami'); // resources/views/tentang-kami.blade.php
})->name('tentang-kami');

Route::get('/fitplan', function () {
    return view('fitplan'); // resources/views/fitplan.blade.php
})->name('fitplan');

Route::get('/login', function () {
    return view('login'); // resources/views/login.blade.php
})->name('login');


