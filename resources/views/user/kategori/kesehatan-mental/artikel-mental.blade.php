@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'Kesehatan Mental')
=======
@section('title', 'Pola Makan Sehat')
>>>>>>> jonathan

{{-- header/hero --}}
<div style="margin-bottom: 40px;">
    @include('components.hero-mental')
</div>

@section('content')

<div style="margin-bottom: 40px;">
<<<<<<< HEAD
    @includeIf('user.kategori.kesehatan-mental.bagianartikel')
=======
    @includeIf('user.kategori.pola-makan-sehat.bagianartikel')
>>>>>>> jonathan
</div>

{{-- Halaman Banner --}}
<div style="margin-top: 40px; margin-bottom: 60px;">
<<<<<<< HEAD
    @includeIf('user.kategori.kesehatan-mental.banner')
=======
    @includeIf('user.kategori.pola-makan-sehat.banner')
>>>>>>> jonathan
</div>

{{-- Halaman Topik --}}
<div style="margin-top: 50px;">
<<<<<<< HEAD
    @includeIf('user.kategori.kesehatan-mental.topik')
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
    @includeIf('user.kategori.kesehatan-mental.panduan')
=======
    @includeIf('user.kategori.pola-makan-sehat.panduan')
>>>>>>> jonathan
</div>
@endsection

