<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero - LIFIA</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Iconify for icons -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/hero1.css') }}">
</head>
<body>
    <div class="container">
        <!-- Navigation -->
<nav class="navbar">
    <div class="logo">
        <img src="{{ asset('images/logo-lifia.svg') }}" alt="Lifia Logo">
    </div>

    <div class="nav-links">
        <a href="{{ route('beranda') }}" 
        class="{{ request()->routeIs('beranda') ? 'active' : '' }}">
            Beranda
        </a>

        <!-- Artikel with dropdown -->
        <div class="dropdown">
            <a href="{{ route('artikel') }}" 
               class="artikel {{ request()->routeIs('artikel') ? 'active' : '' }}" 
               id="artikelToggle">
                Artikel
                <iconify-icon icon="mingcute:down-line" style="vertical-align: middle; margin-left: 4px;"></iconify-icon>
            </a>
            <div class="dropdown-menu" id="artikelMenu">
                <a href="{{ route('artikel', 'pola-makan-sehat') }}">Pola Makan Sehat</a>
                <a href="{{ route('artikel', 'olahraga-aktivitas') }}">Aktivitas Fisik</a>
                <a href="{{ route('artikel', 'kesehatan-mental') }}">Kesehatan Mental</a>
                <a href="{{ route('artikel', 'perawatan-diri') }}">Perawatan Diri</a>
                <a href="{{ route('artikel', 'vegan') }}">Vegan</a>
                <a href="{{ route('artikel', 'eco-living') }}">Eco Living</a>
            </div>
        </div>

        <a href="{{ route('cek-sehat') }}" 
        class="{{ request()->routeIs('cek-sehat') ? 'active' : '' }}">
            Cek Sehat
        </a>

        <a href="{{ route('tentang-kami') }}" 
        class="{{ request()->routeIs('tentang-kami') ? 'active' : '' }}">
            Tentang Kami
        </a>

        <a href="{{ route('fitplan') }}" 
        class="fitplan {{ request()->routeIs('fitplan') ? 'active' : '' }}">
            FitPlan
        </a>

        <a href="{{ route('login') }}" 
        class="login {{ request()->routeIs('login') ? 'active' : '' }}">
            Login
        </a>
    </div>
</nav>


        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-text">
                <h1>Tips & Trik <span>Gaya Hidup</span><br>Terbaik untuk Kamu</h1>
                <p>
                    Temukan berbagai inspirasi, panduan, 
                    dan solusi sederhana untuk menjalani 
                    hidup yang lebih sehat mulai dari 
                    pola makan, olahraga, skincare, 
                    hingga kesehatan mental.
                </p>
                <div class="search-container">
                    <div class="search-box">
                        <iconify-icon icon="iconamoon:search" class="search-icon"></iconify-icon>
                        <input type="text" placeholder="Telusuri...">
                    </div>
                </div>
            </div>

            <div class="hero-image">
                <div class="image-container">
                    <img src="{{ asset('images/model.svg') }}" alt="Model Sehat">
                </div>
            </div>
        </section>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const artikelToggle = document.getElementById("artikelToggle");
        const dropdown = artikelToggle.closest(".dropdown");

        artikelToggle.addEventListener("click", function(e) {
            e.preventDefault();
            dropdown.classList.toggle("show");
        });

        // Close dropdown if clicked outside
        document.addEventListener("click", function(e) {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove("show");
            }
        });
    });
</script>

</body>
</html>