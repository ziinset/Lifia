@extends('layouts.app')

@section('title', 'Aktivitas Fisik')

@section('content')
{{-- Halaman Artikel --}}
@includeIf('components.hero-olga')

<div style="margin-bottom: 40px;">
    @includeIf('user.kategori.aktivitas-fisik.bagianartikel')
</div>

{{-- Halaman Banner --}}
<div style="margin-top: 40px; margin-bottom: 60px;">
    @includeIf('user.kategori.aktivitas-fisik.banner')
</div>

{{-- Halaman Topik --}}
<div style="margin-top: 50px;">
    @includeIf('user.kategori.aktivitas-fisik.topik')
</div>

{{-- Halaman image --}}
<div style="margin-top: 100px;">
    <img src="{{ asset('image/Rectangle 159.png') }}"
        alt="Aktivitas Fisik"
        style="width: 100%; height: auto; display: block;">
</div>

{{-- Halaman Panduan --}}
<div style="margin-top: 50px;">
    @includeIf('user.kategori.aktivitas-fisik.panduan')
</div>
@endsection

