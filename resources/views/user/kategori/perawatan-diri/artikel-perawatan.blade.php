@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'Perawatan Diri')
=======
@section('title', 'Pola Makan Sehat')
>>>>>>> jonathan

{{-- header/hero --}}
<div style="margin-bottom: 40px;">
    @include('components.hero-skin')
</div>

@section('content')
<<<<<<< HEAD

<div style="margin-bottom: 40px;">
    @includeIf('user.kategori.perawatan-diri.bagianartikel')
=======
{{-- Halaman Artikel --}}
@includeIf('components.hero2')

<div style="margin-bottom: 40px;">
    @includeIf('user.kategori.pola-makan-sehat.bagianartikel')
>>>>>>> jonathan
</div>

{{-- Halaman Banner --}}
<div style="margin-top: 40px; margin-bottom: 60px;">
<<<<<<< HEAD
    @includeIf('user.kategori.perawatan-diri.banner')
=======
    @includeIf('user.kategori.pola-makan-sehat.banner')
>>>>>>> jonathan
</div>

{{-- Halaman Topik --}}
<div style="margin-top: 50px;">
<<<<<<< HEAD
    @includeIf('user.kategori.perawatan-diri.topik')
=======
    @includeIf('user.kategori.pola-makan-sehat.topik')
>>>>>>> jonathan
</div>

{{-- Halaman image --}}
<div style="margin-top: 100px;">
    <img src="{{ asset('image/Rectangle 159.png') }}"
        alt="Eat Organic"
        style="width: 100%; height: auto; display: block;">
</div>

{{-- Halaman Panduan --}}
<div style="margin-top: 50px;">
<<<<<<< HEAD
    @includeIf('user.kategori.perawatan-diri.panduan')
=======
    @includeIf('user.kategori.pola-makan-sehat.panduan')
>>>>>>> jonathan
</div>
@endsection

