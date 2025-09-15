    <style>
        .navbar * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .navbar {
            background-color: transparent;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 24px 60px;
            background: transparent;
            position: relative;
        }

        .navbar-logo img {
            height: 35px;
            width: auto;
        }

        .navbar-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .navbar-links a {
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

        .navbar-links a::after {
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

        .navbar-links a:hover::after {
            width: 50px;
        }

        .navbar-links a.navbar-active {
            background: linear-gradient(135deg, #F5F3EF, #EDE7DD, #E6DACB);
            color: #4E342E;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
        }

        .navbar-links a:not(.navbar-active):hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        /* Khusus Fitplan */
        .navbar-links a.navbar-fitplan {
            background: linear-gradient(135deg, #F5F3EF, #EDE7DD, #E6DACB);
            color: #4E342E;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
        }

        /* Dropdown Styles */
        .navbar-dropdown {
            position: relative;
            display: inline-block;
        }

        .navbar-dropdown-menu {
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

        .navbar-dropdown-menu::before {
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

        .navbar-dropdown-menu a {
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

        .navbar-dropdown-menu a::after {
            display: none !important;
        }

        .navbar-dropdown-menu a:hover {
            background: linear-gradient(135deg, #7BA05B, #8BAC65);
            color: white;
            transform: translateX(6px);
            box-shadow: 0 4px 12px rgba(123, 160, 91, 0.3);
        }

        .navbar-dropdown.navbar-show .navbar-dropdown-menu {
            display: block;
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .navbar-dropdown.navbar-show .navbar-dropdown-menu a {
            animation: navbarFadeSlideIn 0.4s ease forwards;
            opacity: 0;
        }

        .navbar-dropdown.navbar-show .navbar-dropdown-menu a:nth-child(1) { animation-delay: 0.05s; }
        .navbar-dropdown.navbar-show .navbar-dropdown-menu a:nth-child(2) { animation-delay: 0.1s; }
        .navbar-dropdown.navbar-show .navbar-dropdown-menu a:nth-child(3) { animation-delay: 0.15s; }
        .navbar-dropdown.navbar-show .navbar-dropdown-menu a:nth-child(4) { animation-delay: 0.2s; }
        .navbar-dropdown.navbar-show .navbar-dropdown-menu a:nth-child(5) { animation-delay: 0.20s; }

        @keyframes navbarFadeSlideIn {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile Menu Toggle */
        .navbar-menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 21px;
            cursor: pointer;
            z-index: 100;
        }

        .navbar-menu-toggle span {
            display: block;
            height: 3px;
            width: 100%;
            background-color: white;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .navbar-menu-toggle.navbar-active span:nth-child(1) {
            transform: translateY(9px) rotate(45deg);
        }

        .navbar-menu-toggle.navbar-active span:nth-child(2) {
            opacity: 0;
        }

        .navbar-menu-toggle.navbar-active span:nth-child(3) {
            transform: translateY(-9px) rotate(-45deg);
        }

        /* Hover Fitplan */
        .navbar-links a.navbar-fitplan:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .navbar-container {
                padding: 20px 40px;
            }
        }

        @media (max-width: 768px) {
            .navbar-container {
                padding: 15px 20px;
            }
            
            .navbar-menu-toggle {
                display: flex;
            }
            
            .navbar-links {
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
            }
            
            .navbar-links.navbar-active {
                right: 0;
            }
            
            .navbar-links a {
                width: 80%;
                padding: 12px;
                font-size: 16px;
                border: 1.4px solid rgba(255, 255, 255, 0.5);
            }
            
            .navbar-dropdown-menu {
                position: static;
                transform: none;
                width: 80%;
                margin: 10px auto;
                background: rgba(255, 255, 255, 0.9);
            }
            
            .navbar-dropdown-menu::before {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .navbar-container {
                padding: 12px 15px;
            }
        }

        @media (max-width: 360px) {
            .navbar-links a {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-logo">
                <img src="{{ asset('images/logo-lifia.svg') }}" alt="Lifia Logo" width="150">
            </div>

            <div class="navbar-links" id="navbarLinks">
                <a href="#" data-nav="beranda">
                    Beranda
                </a>

                <!-- Artikel with dropdown -->
                <div class="navbar-dropdown">
                    <a href="#" class="navbar-artikel" id="navbarArtikelToggle">
                        Artikel
                        <iconify-icon icon="mingcute:down-line" style="vertical-align: middle; margin-left: 4px;"></iconify-icon>
                    </a>
                    <div class="navbar-dropdown-menu" id="navbarArtikelMenu">
                        <a href="#" data-nav="pola-makan">Pola Makan Sehat</a>
                        <a href="#" data-nav="aktivitas-fisik">Aktivitas Fisik</a>
                        <a href="#" data-nav="kesehatan-mental">Kesehatan Mental</a>
                        <a href="#" data-nav="perawatan-diri">Perawatan Diri</a>
                        <a href="#" data-nav="vegan">Vegan</a>
                        <a href="#" data-nav="eco-living">Eco Living</a>
                    </div>
                </div>

                <a href="#" data-nav="cek-sehat">
                    Cek Sehat
                </a>

                <a href="#" data-nav="tentang-kami">
                    Tentang Kami
                </a>

                <a href="#" class="navbar-fitplan" data-nav="fitplan">
                    FitPlan
                </a>

                <a href="#" class="navbar-login" data-nav="login">
                    Login
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="navbar-menu-toggle" id="navbarMenuToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

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
