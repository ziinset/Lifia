{{-- @extends('layouts.app') --}}
@include('components.navbar')
@section('title', 'Program Tubuh Lebih Lentur')

@section('content')

{{-- header/hero --}}
<div style="margin-bottom: 40px;">
    @include('components.program_tubuh_lentur')
</div>

<div style="margin-bottom: 40px;">
    @includeIf('premium.program-tubuh-lentur.bagianartikel')
</div>

{{-- Halaman Banner --}}
<div style="margin-top: 40px; margin-bottom: 60px;">
    @includeIf('premium.program-tubuh-lentur.banner')
</div>

{{-- Halaman Topik --}}
<div style="margin-top: 50px;">
    @includeIf('premium.program-tubuh-lentur.topik')
</div>

{{-- Halaman image --}}
<div style="margin-top: 100px;">
    <img src="{{ asset('image/Rectangle 159.png') }}"
        alt="Eat Organic"
        style="width: 100%; height: auto; display: block;">
</div>

{{-- Halaman Panduan --}}
<div style="margin-top: 50px;">
    @includeIf('premium.program-tubuh-lentur.panduan')
</div>
@include('components.footer')
{{-- @endsection --}}

