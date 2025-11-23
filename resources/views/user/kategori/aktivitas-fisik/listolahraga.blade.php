@extends('layouts.app')

@section('title', 'Aktivitas Fisik')

@section('content')

{{-- header/hero --}}
<div style="margin-bottom: 40px;">
    @include('components.hero-olga')
</div>

{{-- bagian --}}
<div style="margin-bottom: 40px;">
    @includeIf('user.kategori.aktivitas-fisik.bagian')
</div>

{{-- banner --}}
<div style="margin-bottom: 40px;">
    @includeIf('user.kategori.aktivitas-fisik.banner')
</div>

{{-- topik --}}
<div style="margin-bottom: 40px;">
    @includeIf('user.kategori.aktivitas-fisik.topik4')
</div>

@endsection
