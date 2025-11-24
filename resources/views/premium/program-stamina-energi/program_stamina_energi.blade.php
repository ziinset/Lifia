{{-- @extends('layouts.app') --}}
@include('components.navbar')
@section('title', 'Program Stamina & Energi')

@section('content')

{{-- header/hero --}}
<div style="margin-bottom: 40px;">
    @include('components.program_stamina_energi')
</div>

<div style="margin-bottom: 40px;">
    @includeIf('premium.program-stamina-energi.bagianartikel')
</div>

{{-- Halaman Banner --}}
<div style="margin-top: 40px; margin-bottom: 60px;">
    @includeIf('premium.program-stamina-energi.banner')
</div>

{{-- Halaman Topik --}}
<div style="margin-top: 50px;">
    @includeIf('premium.program-stamina-energi.topik')
</div>

{{-- Halaman image --}}
<div style="margin-top: 100px;">
    <img src="{{ asset('image/Rectangle 159.png') }}"
        alt="Eat Organic"
        style="width: 100%; height: auto; display: block;">
</div>

{{-- Halaman Panduan --}}
<div style="margin-top: 50px;">
    @includeIf('premium.program-stamina-energi.panduan')
</div>
@include('components.footer')
{{-- @endsection --}}

