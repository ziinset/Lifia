<style scoped>
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

    /* 🔹 Default link */
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
        color: #556B2F; /* teks hijau army */
        background-color: transparent;
        border: 1.4px solid #556B2F; /* garis hijau army */
    }

    .navbar-links a::after {
        content: "";
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 3px;
        background-color: #556B2F;
        border-radius: 2px;
        transition: width 0.3s ease;
    }

    .navbar-links a:hover::after {
        width: 50px;
    }

    /* 🔹 Aktif */
    .navbar-links a.navbar-active,
    .navbar-links a.navbar-fitplan {
        background: linear-gradient(90deg, #8BAC65 0%, #82A35E 50%, #698648 100%);
        color: #fff; /* teks putih */
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .navbar-links a:not(.navbar-active):hover {
        background-color: rgba(85, 107, 47, 0.1);
        transform: translateY(-1px);
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
    .navbar-dropdown.navbar-show .navbar-dropdown-menu a:nth-child(5) { animation-delay: 0.25s; }

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
        background-color: #556B2F;
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
            border: 1.4px solid #556B2F;
            color: #556B2F;
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
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-logo">
                <img src="{{ asset('images/logo2-lifia.svg') }}" alt="Lifia Logo" width="150">
            </div>

            <div class="navbar-links" id="navbarLinks">
                <a href="{{ route('home') }}" data-nav="beranda">
                    Beranda
                </a>

                <!-- Artikel with dropdown -->
                <div class="navbar-dropdown">
                    <a href="#" class="navbar-artikel" id="navbarArtikelToggle">
                        Artikel
                        <span class="iconify" data-icon="mingcute:down-line" style="vertical-align: middle; margin-left: 4px;"></span>
                    </a>
                    <div class="navbar-dropdown-menu" id="navbarArtikelMenu">
                        <a href="{{ route('kategori.pola-makan-sehat') }}" data-nav="pola-makan">Pola Makan Sehat</a>
                        <a href="{{ route('kategori.aktivitas-fisik') }}" data-nav="aktivitas-fisik">Aktivitas Fisik</a>
                        <a href="{{ route('kategori.kesehatan-mental') }}" data-nav="kesehatan-mental">Kesehatan Mental</a>
                        <a href="{{ route('kategori.perawatan-diri') }}" data-nav="perawatan-diri">Perawatan Diri</a>
                        <a href="{{ route('kategori.vegan') }}" data-nav="vegan">Vegan</a>
                        <a href="{{ route('kategori.eco') }}" data-nav="eco-living">Eco Living</a>
                    </div>
                </div>

                <a href="{{ route('cek-bmi') }}" data-nav="cek-sehat">
                    Cek Sehat
                </a>

                <a href="{{ route('tentang-kami') }}" data-nav="tentang-kami">
                    Tentang Kami
                </a>

                <a href="{{ route('fitplan') }}" class="navbar-fitplan" data-nav="fitplan">
                    FitPlan
                </a>

                <a href="{{ route('login') }}" class="navbar-login" data-nav="login">
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

    @php
        // Deteksi halaman aktif berdasarkan route name
        $currentRoute = request()->route()->getName();
        $activeNav = 'beranda'; // default

        // Mapping route ke navbar state
        switch($currentRoute) {
            case 'home':
                $activeNav = 'beranda';
                break;
            case 'kategori.pola-makan-sehat':
            case 'kategori.pola-makan-sehat.artikel':
            case 'kategori.pola-makan-sehat.sarapan-seimbang':
            case 'kategori.pola-makan-sehat.panduan':
            case 'kategori.pola-makan-sehat.topik':
            case 'kategori.pola-makan-sehat.banner':
            case 'kategori.pola-makan-sehat.bagian-artikel':
                $activeNav = 'pola-makan';
                break;
            case 'kategori.aktivitas-fisik':
            case 'kategori.aktivitas-fisik.panduan':
            case 'kategori.aktivitas-fisik.topik':
            case 'kategori.aktivitas-fisik.banner':
            case 'kategori.aktivitas-fisik.bagian-artikel':
            case 'kategori.aktivitas-fisik.olahraga-aman-bumil':
                $activeNav = 'aktivitas-fisik';
                break;
            case 'kategori.kesehatan-mental':
            case 'kategori.kesehatan-mental.panduan':
            case 'kategori.kesehatan-mental.topik':
            case 'kategori.kesehatan-mental.banner':
            case 'kategori.kesehatan-mental.bagian-artikel':
            case 'kategori.kesehatan-mental.sarapan-seimbang':
                $activeNav = 'kesehatan-mental';
                break;
            case 'kategori.perawatan-diri':
            case 'kategori.perawatan-diri.panduan':
            case 'kategori.perawatan-diri.topik':
            case 'kategori.perawatan-diri.banner':
            case 'kategori.perawatan-diri.bagian-artikel':
            case 'kategori.perawatan-diri.kulit-malam':
                $activeNav = 'perawatan-diri';
                break;
            case 'kategori.vegan':
            case 'kategori.vegan.panduan':
            case 'kategori.vegan.topik':
            case 'kategori.vegan.banner':
            case 'kategori.vegan.bagian-artikel':
            case 'kategori.vegan.tips-pemula':
                $activeNav = 'vegan';
                break;
            case 'kategori.eco':
            case 'kategori.eco.panduan':
            case 'kategori.eco.topik':
            case 'kategori.eco.banner':
            case 'kategori.eco.bagian-artikel':
            case 'kategori.eco.mengurangi-sampah':
                $activeNav = 'eco-living';
                break;
            case 'cek-bmi':
                $activeNav = 'cek-sehat';
                break;
            case 'tentang-kami':
            case 'about':
                $activeNav = 'tentang-kami';
                break;
            case 'fitplan':
            case 'program-turun-berat-badan':
            case 'premium.panduan-bakar-lemak':
                $activeNav = 'fitplan';
                break;
            case 'login':
            case 'register':
                $activeNav = 'login';
                break;
            default:
                $activeNav = 'beranda';
        }
    @endphp

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const artikelToggle = document.getElementById("navbarArtikelToggle");
            const dropdown = artikelToggle.closest(".navbar-dropdown");
            const menuToggle = document.getElementById("navbarMenuToggle");
            const navLinks = document.querySelector(".navbar-links");

            // Set navbar state berdasarkan PHP
            const activeNav = '{{ $activeNav }}';

            // Hapus kelas aktif dari semua link
            document.querySelectorAll('.navbar-links a').forEach(link => {
                link.classList.remove('navbar-active');
            });

            // Set active berdasarkan halaman saat ini
            const activeElement = document.querySelector(`[data-nav="${activeNav}"]`);
            if (activeElement) {
                activeElement.classList.add('navbar-active');
            }

            // Event listeners untuk link navbar - hanya untuk visual feedback
            document.querySelectorAll('.navbar-links a[data-nav]').forEach(link => {
                link.addEventListener('click', function(e) {
                    const navItem = this.getAttribute('data-nav');
                    const href = this.getAttribute('href');

                    // Hanya set state untuk visual feedback, biarkan navigasi normal
                    if (navItem && href && href !== '#') {
                        // Hapus kelas aktif dari semua link
                        document.querySelectorAll('.navbar-links a').forEach(link => {
                            link.classList.remove('navbar-active');
                        });

                        // Set active pada link yang diklik
                        this.classList.add('navbar-active');
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
        });
    </script>
