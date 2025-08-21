@extends('layouts.app')

@section('title', 'Artikel - Lifia')

@section('content')
{{-- Halaman Artikel --}}
@includeIf('components.hero2')

<div style="margin-bottom: 40px;">
    @includeIf('user.artikel-makanan.bagianartikel')
</div>

{{-- Halaman Banner --}}
<div style="margin-top: 40px; margin-bottom: 60px;">
    @includeIf('user.artikel-makanan.banner')
</div>

{{-- Halaman Topik --}}
<div style="margin-top: 50px;">
    @includeIf('user.artikel-makanan.topik')
</div>

{{-- Halaman image --}}
<div style="margin-top: 100px;">
    <img src="{{ asset('image/Rectangle 159.png') }}"
         alt="Eat Organic"
         style="width: 100%; height: auto; display: block;">
</div>

{{-- Halaman Panduan --}}
<div style="margin-top: 50px;">
    @includeIf('user.artikel-makanan.panduan')
</div>
@endsection

