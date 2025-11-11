@extends('layouts.app')

@section('title', 'Pola Makan Sehat')

{{-- header/hero --}}
<div style="margin-bottom: 40px;">
    @include('components.hero-skin')
</div>

@section('content')

<div style="margin-bottom: 40px;">
    @includeIf('user.kategori.pola-makan-sehat.bagianartikel')
</div>

{{-- Halaman Banner --}}
<div style="margin-top: 40px; margin-bottom: 60px;">
    @includeIf('user.kategori.pola-makan-sehat.banner')
</div>

{{-- Halaman Topik --}}
<div style="margin-top: 50px;">
    @includeIf('user.kategori.pola-makan-sehat.topik')
</div>

{{-- Halaman image --}}
<div style="margin-top: 100px;">
    <img src="{{ asset('image/Rectangle 159.png') }}"
        alt="Eat Organic"
        style="width: 100%; height: auto; display: block;">
</div>

{{-- Halaman Panduan --}}
<div style="margin-top: 50px;">
    @includeIf('user.kategori.pola-makan-sehat.panduan')
</div>
@endsection

