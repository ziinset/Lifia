{{-- Halaman Artikel --}}
<div style="margin-bottom: 10px;">
    @include('artikel.bagianartikel')
</div>

{{-- Halaman Banner --}}
<div style="margin-top: 10px; margin-bottom: 60px;">
    @include('artikel.banner')
</div>

{{-- Halaman Topik --}}
<div style="margin-top: 50px;">
    @include('artikel.topik')
</div>

{{-- Halaman image --}}
<div style="margin-top: 100px;">
    <img src="{{ asset('image/Rectangle 159.png') }}" 
         alt="Eat Organic" 
         style="width: 100%; height: auto; display: block;">
</div>

{{-- Halaman Panduan --}}
<div style="margin-top: 50px;">
    @include('artikel.panduan')
</div>