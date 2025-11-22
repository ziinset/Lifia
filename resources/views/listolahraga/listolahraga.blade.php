@extends('layouts.app')

@section('title', 'List Olahraga - Lifia')

@section('content')
{{-- Halaman Artikel --}}

{{-- bagian --}}
<div style="margin-bottom: 40px;">
    @include('listolahraga.bagian')
</div>

{{-- banner --}}
<div style="margin-bottom: 40px;">
    @include('listolahraga.banner4')
</div>

{{-- topik4 --}}
<div style="margin-bottom: 40px;">
    @include('listolahraga.topik4')
</div>
@endsection
