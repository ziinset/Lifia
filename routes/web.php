<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
});

Route::get('/artikel', function () {
    return view('artikel.artikel');
});

Route::get('/list-olahraga', function () {
    return view('listolahraga.listolahraga');
});
