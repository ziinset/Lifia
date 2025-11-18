@extends('layouts.app')

@section('title', 'vegan')

@section('content')

{{-- header/hero --}}
<div style="margin-bottom: 40px;">
    @include('components.hero-vegan')
</div>

<div style="margin-bottom: 40px;">
    @includeIf('user.kategori.vegan.bagianartikel')
</div>

{{-- Halaman Banner --}}
<div style="margin-top: 40px; margin-bottom: 60px;">
    @includeIf('user.kategori.vegan.banner')
</div>

{{-- Halaman Topik --}}
<div style="margin-top: 50px;">
    @includeIf('user.kategori.vegan.topik')
</div>

{{-- Halaman image --}}
<div style="margin-top: 100px;">
    <img src="{{ asset('image/Rectangle 159.png') }}"
        alt="Eat Organic"
        style="width: 100%; height: auto; display: block;">
</div>

{{-- Halaman Panduan --}}
<div style="margin-top: 50px;">
    @includeIf('user.kategori.vegan.panduan')
</div>
@endsection

