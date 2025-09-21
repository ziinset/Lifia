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
    <style>
        .hero-section * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

       

        .hero-section .hero-container {
            background: linear-gradient(to bottom, #7BA05B 0%, #8BAC65 50%, #A8C373 100%);
            padding-bottom: 1px;
            min-height: 100vh;
        }

        /* Navigation - scoped */
        .hero-section .hero-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 60px;
            position: relative;
        }

        .hero-section .hero-navbar .hero-logo img {
            height: 35px;
            width: auto;
        }

        .hero-section .hero-nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .hero-section .hero-nav-links a {
            text-decoration: none;
            padding: 7px 20px;
            height: 35px;
            line-height: 35px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: #fff;
            background-color: transparent;
            border: 1.4px solid #fff;
        }

        .hero-section .hero-nav-links a::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background-color: white;
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .hero-section .hero-nav-links a:hover::after {
            width: 50px;
        }

        .hero-section .hero-nav-links a.hero-active {
            background: linear-gradient(135deg, #F5F3EF, #EDE7DD, #E6DACB);
            color: #4E342E;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
        }

        .hero-section .hero-nav-links a:not(.hero-active):hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        /* Khusus Fitplan - scoped */
        .hero-section .hero-nav-links a.hero-fitplan {
            background: linear-gradient(135deg, #F5F3EF, #EDE7DD, #E6DACB);
            color: #4E342E;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
        }

        /* Dropdown Styles - scoped */
        .hero-section .hero-dropdown {
            position: relative;
            display: inline-block;
        }

        .hero-section .hero-dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background: linear-gradient(to bottom, #ffffff, #f8f8f8);
            backdrop-filter: blur(8px);
            min-width: 240px;
            border-radius: 16px;
            padding: 12px 0;
            z-index: 99;
            margin-top: 8px;
            opacity: 0;
            visibility: hidden;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15),
                        inset 0 1px 0 rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .hero-section .hero-dropdown-menu::before {
            content: "";
            position: absolute;
            top: -6px;
            left: 50%;
            transform: translateX(-50%);
            width: 12px;
            height: 12px;
            background: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-bottom: none;
            border-right: none;
            rotate: 45deg;
        }

        .hero-section .hero-dropdown-menu a {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            margin: 2px 8px;
            color: #333;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.25s ease;
            border: none !important;
            background: transparent;
            height: auto !important;
            line-height: 1.4 !important;
        }

        .hero-section .hero-dropdown-menu a::after {
            display: none !important;
        }

        .hero-section .hero-dropdown-menu a:hover {
            background: linear-gradient(135deg, #7BA05B, #8BAC65);
            color: white;
            transform: translateX(6px);
            box-shadow: 0 4px 12px rgba(123, 160, 91, 0.3);
        }

        .hero-section .hero-dropdown.hero-show .hero-dropdown-menu {
            display: block;
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .hero-section .hero-dropdown.hero-show .hero-dropdown-menu a {
            animation: heroFadeSlideIn 0.4s ease forwards;
            opacity: 0;
        }

        .hero-section .hero-dropdown.hero-show .hero-dropdown-menu a:nth-child(1) { animation-delay: 0.05s; }
        .hero-section .hero-dropdown.hero-show .hero-dropdown-menu a:nth-child(2) { animation-delay: 0.1s; }
        .hero-section .hero-dropdown.hero-show .hero-dropdown-menu a:nth-child(3) { animation-delay: 0.15s; }
        .hero-section .hero-dropdown.hero-show .hero-dropdown-menu a:nth-child(4) { animation-delay: 0.2s; }
        .hero-section .hero-dropdown.hero-show .hero-dropdown-menu a:nth-child(5) { animation-delay: 0.20s; }

        @keyframes heroFadeSlideIn {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hero Section - scoped */
        .hero-section .hero-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            padding: 40px 60px 0;
            gap: 80px;
        }

        .hero-section .hero-text {
            flex: 1;
            max-width: 600px;
            padding-bottom: 100px;
        }

        .hero-section .hero-text h1 {
            font-size: 42px;
            font-weight: 800;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 24px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .hero-section .hero-text h1 span {
            color: #FFE066;
            text-shadow: 0 2px 8px rgba(255, 224, 102, 0.3);
        }

        .hero-section .hero-text p {
            font-family: 'Montserrat', sans-serif;
            font-size: 18px;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 32px;
            max-width: 520px;
        }

        .hero-section .hero-search-container {
            position: relative;
            max-width: 520px;
            width: 100%;
        }

        .hero-section .hero-search-box {
            display: flex;
            align-items: center;
            background: linear-gradient(to right, #FFFFFF, #F9F9F9, #CFCFCF);
            border-radius: 40px;
            padding: 15px 20px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .hero-section .hero-search-box:focus-within {
            transform: translateY(-2px);
            box-shadow: 0 10px 32px rgba(0, 0, 0, 0.18);
        }

        .hero-section .hero-search-icon {
            margin-right: 12px;
            color: #4E342E;
            font-size: 25px;
        }

        .hero-section .hero-search-box input {
            border: none;
            outline: none;
            flex: 1;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            color: #333;
            background: transparent;
        }

        .hero-section .hero-search-box input::placeholder {
            color: #999;
            font-weight: 400;
        }

        .hero-section .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }

        .hero-section .hero-image-container {
            background: transparent;
            border: none;
            box-shadow: none;
            padding: 0;
            margin: 0;
            border-radius: 0;
        }

        .hero-section .hero-image-container img {
            width: 100%;
            max-width: 500px;
            height: auto;
            object-fit: contain;
            margin-top: -20px;
            box-shadow: none;
            filter: none;
            border: none;
            outline: none;
        }

        /* Mobile Menu Toggle - scoped */
        .hero-section .hero-menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 21px;
            cursor: pointer;
            z-index: 100;
            background: transparent;
            border: none;
            padding: 0;
        }

        .hero-section .hero-menu-toggle span {
            display: block;
            height: 3px;
            width: 100%;
            background-color: white;
            border-radius: 3px;
            transition: all 0.3s ease;
            transform-origin: center;
        }

        .hero-section .hero-menu-toggle.hero-active span:nth-child(1) {
            transform: translateY(9px) rotate(45deg);
        }

        .hero-section .hero-menu-toggle.hero-active span:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }

        .hero-section .hero-menu-toggle.hero-active span:nth-child(3) {
            transform: translateY(-9px) rotate(-45deg);
        }

        /* Responsive Design - scoped */
        @media (max-width: 1024px) {
            .hero-section .hero-navbar {
                padding: 20px 40px;
            }

            .hero-section .hero-content {
                padding: 30px 40px 0;
                gap: 60px;
            }

            .hero-section .hero-text h1 {
                font-size: 38px;
            }

            .hero-section .hero-text p {
                font-size: 16px;
            }

            .hero-section .hero-image-container {
                background: transparent;
                border: none;
                box-shadow: none;
                padding: 0;
                margin: 0;
                border-radius: 0;
            }

            .hero-section .hero-image-container img {
                max-width: 400px;
                box-shadow: none;
                filter: none;
                border: none;
                outline: none;
            }
        }

        @media (max-width: 768px) {
            .hero-section .hero-container {
                padding-bottom: 40px;
            }

            .hero-section .hero-navbar {
                padding: 15px 20px;
            }

            .hero-section .hero-menu-toggle {
                display: flex;
            }

            .hero-section .hero-nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                max-width: 300px;
                height: 100vh;
                background: linear-gradient(to bottom, #7BA05B, #8BAC65);
                flex-direction: column;
                justify-content: flex-start;
                padding-top: 80px;
                gap: 15px;
                transition: right 0.3s ease;
                z-index: 99;
                box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
                overflow-y: auto;
            }

            .hero-section .hero-nav-links.hero-active {
                right: 0;
            }

            .hero-section .hero-nav-links a {
                width: 80%;
                padding: 12px;
                font-size: 16px;
                border: 1.4px solid rgba(255, 255, 255, 0.5);
                margin: 0 auto;
            }

            .hero-section .hero-dropdown {
                width: 80%;
                margin: 0 auto;
                position: relative;
            }

            .hero-section .hero-dropdown-menu {
                position: static;
                transform: none;
                width: 100%;
                margin: 10px auto;
                background: rgba(255, 255, 255, 0.95);
                max-height: 300px;
                overflow-y: auto;
                border-radius: 12px;
                padding: 8px 0;
                box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }

            .hero-section .hero-dropdown-menu::before {
                display: none;
            }

            .hero-section .hero-dropdown-menu a {
                display: block;
                width: 90%;
                margin: 4px auto;
                padding: 10px 16px;
                font-size: 14px;
                color: #333;
                background: transparent;
                border: none;
                border-radius: 8px;
                text-align: left;
                transition: all 0.2s ease;
                height: auto !important;
                line-height: 1.4 !important;
            }

            .hero-section .hero-dropdown-menu a:hover {
                background: rgba(123, 160, 91, 0.1);
                color: #4E342E;
                transform: none;
                box-shadow: none;
            }

            .hero-section .hero-dropdown-menu a::after {
                display: none !important;
            }

            .hero-section .hero-content {
                flex-direction: column;
                text-align: center;
                padding: 30px 20px 0;
                gap: 40px;
            }

            .hero-section .hero-text {
                padding-bottom: 0;
                margin: 0 auto;
            }

            .hero-section .hero-text h1 {
                font-size: 32px;
            }

            .hero-section .hero-text p {
                font-size: 16px;
                margin-left: auto;
                margin-right: auto;
            }

            .hero-section .hero-search-container {
                margin: 0 auto;
            }

            .hero-section .hero-image-container {
                background: transparent;
                border: none;
                box-shadow: none;
                padding: 0;
                margin: 0;
                border-radius: 0;
            }

            .hero-section .hero-image-container img {
                width: 280px;
                margin-top: 0;
                box-shadow: none;
                filter: none;
                border: none;
                outline: none;
            }
        }

        @media (max-width: 480px) {
            .hero-section .hero-navbar {
                padding: 12px 15px;
            }

            .hero-section .hero-content {
                padding: 20px 15px 0;
            }

            .hero-section .hero-text h1 {
                font-size: 28px;
                margin-bottom: 16px;
            }

            .hero-section .hero-text p {
                font-size: 15px;
                margin-bottom: 24px;
            }

            .hero-section .hero-search-box {
                padding: 12px 16px;
            }

            .hero-section .hero-search-icon {
                font-size: 20px;
            }

            .hero-section .hero-search-box input {
                font-size: 14px;
            }

            .hero-section .hero-image-container {
                background: transparent;
                border: none;
                box-shadow: none;
                padding: 0;
                margin: 0;
                border-radius: 0;
            }

            .hero-section .hero-image-container img {
                width: 240px;
                box-shadow: none;
                filter: none;
                border: none;
                outline: none;
            }

            .hero-section .hero-nav-links {
                width: 90%;
                max-width: 280px;
            }

            .hero-section .hero-nav-links a {
                width: 90%;
                font-size: 15px;
            }

            .hero-section .hero-dropdown {
                width: 90%;
            }

            .hero-section .hero-dropdown-menu {
                width: 100%;
                margin: 8px auto;
                padding: 6px 0;
            }

            .hero-section .hero-dropdown-menu a {
                width: 95%;
                padding: 8px 14px;
                font-size: 13px;
                margin: 2px auto;
            }
        }

        /* Very small screens - scoped */
        @media (max-width: 360px) {
            .hero-section .hero-text h1 {
                font-size: 24px;
            }

            .hero-section .hero-text p {
                font-size: 14px;
            }

            .hero-section .hero-nav-links a {
                font-size: 14px;
            }

            .hero-section .hero-image-container {
                background: transparent;
                border: none;
                box-shadow: none;
                padding: 0;
                margin: 0;
                border-radius: 0;
            }

            .hero-section .hero-image-container img {
                width: 200px;
                box-shadow: none;
                filter: none;
                border: none;
                outline: none;
            }

            .hero-section .hero-nav-links {
                width: 95%;
                max-width: 250px;
            }
        }

        /* Navbar override for hero section */
        .hero-section .navbar {
            position: relative;
            top: auto;
            left: auto;
            width: 100%;
            z-index: auto;
            background: transparent;
        }

        .hero-section .navbar-container {
            background: transparent;
            position: relative;
        }

        .hero-section .navbar-links {
            background: transparent;
        }

        .hero-section .navbar-links a {
            color: #fff;
            border: 1.4px solid #fff;
            background-color: transparent;
        }

        .hero-section .navbar-links a::after {
            background-color: white;
        }

        .hero-section .navbar-links a:hover::after {
            width: 50px;
        }

        .hero-section .navbar-links a.navbar-active {
            background: linear-gradient(135deg, #F5F3EF, #EDE7DD, #E6DACB);
            color: #4E342E;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
        }

        .hero-section .navbar-links a:not(.navbar-active):hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .hero-section .navbar-links a.navbar-fitplan {
            background: linear-gradient(135deg, #F5F3EF, #EDE7DD, #E6DACB);
            color: #4E342E;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
        }

        .hero-section .navbar-dropdown-menu {
            background: linear-gradient(to bottom, #ffffff, #f8f8f8);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-section .navbar-dropdown-menu::before {
            background: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-section .navbar-dropdown-menu a:hover {
            background: linear-gradient(135deg, #7BA05B, #8BAC65);
            color: white;
        }

        .hero-section .navbar-menu-toggle span {
            background-color: white;
        }

        .hero-section .navbar-links.navbar-active {
            background: linear-gradient(to bottom, #7BA05B, #8BAC65);
            right: 0;
        }

        .hero-section .navbar-links a.navbar-fitplan:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

    </style>
</head>
<body>
    <div class="hero-section">
        <div class="hero-container">
            <!-- Navigation -->
            @include('components.navbar')
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
                        <img src="{{asset('images/mod.png')}}"
                             alt="Happy couple exercising - Model Sehat"
                             style="background: transparent; border-radius: 0;">
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const artikelToggle = document.getElementById("navbarArtikelToggle");
            const dropdown = artikelToggle.closest(".navbar-dropdown");
            const menuToggle = document.getElementById("navbarMenuToggle");
            const navLinks = document.querySelector(".navbar-links");

            // State management dengan switch case
            let currentNavState = "beranda";

            // Fungsi untuk mengubah status navbar menggunakan switch case
            function setNavbarState(state) {
                // Hapus kelas aktif dari semua link
                document.querySelectorAll('.navbar-links a').forEach(link => {
                    link.classList.remove('navbar-active');
                });

                // Gunakan switch case untuk mengatur status navbar
                switch(state) {
                    case 'beranda':
                        document.querySelector('[data-nav="beranda"]').classList.add('navbar-active');
                        console.log("Status navigasi: Beranda");
                        break;
                    case 'pola-makan':
                        document.querySelector('[data-nav="pola-makan"]').classList.add('navbar-active');
                        console.log("Status navigasi: Pola Makan Sehat");
                        break;
                    case 'aktivitas-fisik':
                        document.querySelector('[data-nav="aktivitas-fisik"]').classList.add('navbar-active');
                        console.log("Status navigasi: Aktivitas Fisik");
                        break;
                    case 'kesehatan-mental':
                        document.querySelector('[data-nav="kesehatan-mental"]').classList.add('navbar-active');
                        console.log("Status navigasi: Kesehatan Mental");
                        break;
                    case 'perawatan-diri':
                        document.querySelector('[data-nav="perawatan-diri"]').classList.add('navbar-active');
                        console.log("Status navigasi: Perawatan Diri");
                        break;
                    case 'vegan':
                        document.querySelector('[data-nav="vegan"]').classList.add('navbar-active');
                        console.log("Status navigasi: Vegan");
                        break;
                    case 'eco-living':
                        document.querySelector('[data-nav="eco-living"]').classList.add('navbar-active');
                        console.log("Status navigasi: Eco Living");
                        break;
                    case 'cek-sehat':
                        document.querySelector('[data-nav="cek-sehat"]').classList.add('navbar-active');
                        console.log("Status navigasi: Cek Sehat");
                        break;
                    case 'tentang-kami':
                        document.querySelector('[data-nav="tentang-kami"]').classList.add('navbar-active');
                        console.log("Status navigasi: Tentang Kami");
                        break;
                    case 'fitplan':
                        document.querySelector('[data-nav="fitplan"]').classList.add('navbar-active');
                        console.log("Status navigasi: FitPlan");
                        break;
                    case 'login':
                        document.querySelector('[data-nav="login"]').classList.add('navbar-active');
                        console.log("Status navigasi: Login");
                        break;
                    default:
                        document.querySelector('[data-nav="beranda"]').classList.add('navbar-active');
                        console.log("Status navigasi: Default (Beranda)");
                }

                currentNavState = state;

                // Tutup menu mobile jika terbuka
                if (navLinks.classList.contains('navbar-active')) {
                    menuToggle.classList.remove('navbar-active');
                    navLinks.classList.remove('navbar-active');
                }
            }

            // Event listeners untuk link navbar
            document.querySelectorAll('.navbar-links a').forEach(link => {
                link.addEventListener('click', function(e) {
                    // Biarkan navigasi default untuk link yang bukan '#'
                    if (this.getAttribute('href') && this.getAttribute('href') !== '#') {
                        return;
                    }
                    e.preventDefault();
                    const navItem = this.getAttribute('data-nav');
                    if (navItem) {
                        setNavbarState(navItem);
                    }
                });
            });

            // Dropdown functionality
            if (artikelToggle) {
                artikelToggle.addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dropdown.classList.toggle("navbar-show");
                });

                // Close dropdown if clicked outside
                document.addEventListener("click", function(e) {
                    if (!dropdown.contains(e.target)) {
                        dropdown.classList.remove("navbar-show");
                    }
                });
            }

            // Mobile menu toggle
            if (menuToggle) {
                menuToggle.addEventListener("click", function() {
                    menuToggle.classList.toggle("navbar-active");
                    navLinks.classList.toggle("navbar-active");
                });
            }

            // Inisialisasi status awal
            setNavbarState('beranda');
        });
    </script>
</body>
</html>