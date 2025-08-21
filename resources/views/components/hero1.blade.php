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
    <link rel="stylesheet" href="{{asset('css/hero1.css')}}">
</head>
<body>
    <div class="hero-section">
        <div class="hero-container">
            <!-- Navigation -->
            <nav class="hero-navbar">
                <div class="hero-logo">
                    <img src="{{asset('images/logo-lifia.svg')}}" alt="Lifia Logo">
                </div>

                <!-- Mobile Menu Toggle -->
                <div class="hero-menu-toggle" id="heroMenuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <div class="hero-nav-links" id="heroNavLinks">
                    <a href="#" class="hero-active">
                        Beranda
                    </a>

                    <!-- Artikel with dropdown -->
                    <div class="hero-dropdown">
                        <a href="#" class="hero-artikel" id="heroArtikelToggle">
                            Artikel
                            <iconify-icon icon="mingcute:down-line" style="vertical-align: middle; margin-left: 4px;"></iconify-icon>
                        </a>
                        <div class="hero-dropdown-menu" id="heroArtikelMenu">
                            <a href="{{ route('artikel') }}">Pola Makan Sehat</a>
                            <a href="#">Aktivitas Fisik</a>
                            <a href="#">Kesehatan Mental</a>
                            <a href="#">Perawatan Diri</a>
                            <a href="#">Vegan</a>
                            <a href="#">Eco Living</a>
                        </div>
                    </div>

                    <a href="#">
                        Cek Sehat
                    </a>

                    <a href="#">
                        Tentang Kami
                    </a>

                    <a href="#" class="hero-fitplan">
                        FitPlan
                    </a>

                    <a href="#" class="hero-login">
                        Login
                    </a>
                </div>
            </nav>

            <!-- Hero Section -->
            <section class="hero-content">
                <div class="hero-text">
                    <h1>Tips & Trik <span>Gaya Hidup</span><br>Terbaik untuk Kamu</h1>
                    <p>
                        Temukan berbagai inspirasi, panduan,
                        dan solusi sederhana untuk menjalani
                        hidup yang lebih sehat mulai dari
                        pola makan, olahraga, skincare,
                        hingga kesehatan mental.
                    </p>
                    <div class="hero-search-container">
                        <div class="hero-search-box">
                            <iconify-icon icon="iconamoon:search" class="hero-search-icon"></iconify-icon>
                            <input type="text" placeholder="Telusuri...">
                        </div>
                    </div>
                </div>

                <div class="hero-image">
                    <div class="hero-image-container">
                        <!-- Gambar model tanpa background shape -->
                        <img src="{{asset('images/model.svg')}}"
                             alt="Happy couple exercising - Model Sehat"
                             style="background: transparent; border-radius: 0;">
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const artikelToggle = document.getElementById("heroArtikelToggle");
            const dropdown = artikelToggle.closest(".hero-dropdown");
            const menuToggle = document.getElementById("heroMenuToggle");
            const navLinks = document.getElementById("heroNavLinks");

            // Artikel dropdown toggle
            artikelToggle.addEventListener("click", function(e) {
                e.preventDefault();
                dropdown.classList.toggle("hero-show");
            });

            // Mobile menu toggle
            menuToggle.addEventListener("click", function() {
                menuToggle.classList.toggle("hero-active");
                navLinks.classList.toggle("hero-active");
            });

            // Close dropdown if clicked outside
            document.addEventListener("click", function(e) {
                if (!dropdown.contains(e.target)) {
                    dropdown.classList.remove("hero-show");
                }
            });

            // Close mobile menu when clicking on a link
            navLinks.addEventListener("click", function(e) {
                if (e.target.tagName === "A" && !e.target.classList.contains("hero-artikel")) {
                    menuToggle.classList.remove("hero-active");
                    navLinks.classList.remove("hero-active");
                }
            });

            // Close mobile menu when clicking outside
            document.addEventListener("click", function(e) {
                if (!menuToggle.contains(e.target) && !navLinks.contains(e.target)) {
                    menuToggle.classList.remove("hero-active");
                    navLinks.classList.remove("hero-active");
                }
            });
        });
    </script>
</body>
</html>