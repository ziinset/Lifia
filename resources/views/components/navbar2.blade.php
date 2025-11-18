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
            padding: 24px 60px !important;
            background: transparent;
            position: relative;
        }

        .navbar-logo img {
            height: 35px;
            width: auto;
        }

        .navbar-links {
            display: flex;
            gap: 20px !important;
            align-items: center;
        }

        .navbar-links a {
            text-decoration: none;
            padding: 7px 20px !important;
            height: 35px !important;
            line-height: 35px !important;
            border-radius: 30px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: #698648;
            background-color: transparent;
            border: 1.4px solid #698648;
        }

        .navbar-links a::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background-color: #698648;
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .navbar-links a:hover::after {
            width: 50px;
        }

        .navbar-links a.navbar-active {
            background: linear-gradient(135deg, #8BAC65, #7BA05B, #698648);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
        }

        .navbar-links a:not(.navbar-active):hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }
        
        /* Dropdown item hover */
        .dropdown-item:hover {
            color: white !important;
        }

        /* Khusus Fitplan */
        .navbar-links a.navbar-fitplan {
            background: linear-gradient(135deg, #8BAC65, #7BA05B, #698648);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
        }

        /* Modern Grid Dropdown */
        .navbar-dropdown {
            position: relative;
            display: inline-block;
        }
        
        /* Ensure dropdown container has proper z-index */
        .navbar-dropdown {
            z-index: 1000;
        }

        .navbar-dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(12px);
            background: #ffffff;
            border-radius: 12px;
            padding: 12px;
            z-index: 1001;
            margin-top: 12px;
            opacity: 0;
            visibility: hidden;
            box-shadow: 0 20px 50px -10px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            transform-origin: top center;
            min-width: 200px;
            width: auto;
        }

        .dropdown-grid {
            display: flex;
            flex-direction: column;
            gap: 8px;
            width: 100%;
        }

        /* Dropdown item active state */
        .dropdown-item.active {
            background: linear-gradient(135deg, #8BAC65, #7BA05B, #698648) !important;
            color: white !important;
            border-color: #5a7a3d !important;
        }
        
        .dropdown-item.active i,
        .dropdown-item.active .dropdown-arrow i {
            color: white !important;
        }
        
        /* Removed dropdown header styles */

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            border-radius: 12px;
            transition: all 0.25s ease;
            text-decoration: none;
            color: #4A5568;
            background: #F8FAFC;
            border: 1px solid #EDF2F7;
            white-space: nowrap;
            min-width: 0;
        }
        
        .dropdown-item {
            position: relative;
            overflow: hidden;
            z-index: 1;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: #F8FAFC;
            border: 1px solid #EDF2F7;
            border-left: 3px solid transparent;
        }


        .dropdown-item:hover {
            transform: translateX(4px);
            box-shadow: 0 2px 12px rgba(180, 214, 120, 0.3);
            border-left-color: #B4D678;
            background: linear-gradient(135deg, #8BAC65, #7BA05B, #698648);
            color: white;
        }


        .dropdown-item i {
            font-size: 16px;
            margin-right: 8px;
            color: #B4D678;
            flex-shrink: 0;
            margin-top: 2px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 1;
        }

        .dropdown-item:hover i {
            color: #B4D678;
            transform: translateX(4px);
            text-shadow: 0 0 8px rgba(180, 214, 120, 0.3);
        }

        .dropdown-item-content {
            flex-grow: 1;
        }

        .dropdown-item-content {
            flex: 1;
            min-width: 0;
        }

        .dropdown-item-content h4 {
            font-size: 14px;
            font-weight: 500;
            margin: 0;
            color: inherit;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .dropdown-arrow {
            margin-left: 12px;
            opacity: 0.5;
            transition: all 0.2s ease;
            font-size: 12px;
        }

        .dropdown-arrow {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: #A0AEC0;
        }

        .dropdown-item:hover .dropdown-arrow {
            transform: translateX(4px);
            opacity: 1;
            color: #B4D678;
        }

        .navbar-dropdown-menu::before {
            content: '';
            position: absolute;
            top: -6px;
            left: 50%;
            transform: translateX(-50%) rotate(45deg);
            width: 14px;
            height: 14px;
            background: white;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            border-left: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: -2px -2px 6px rgba(0, 0, 0, 0.03);
            z-index: -1;
        }

        .navbar-dropdown-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            margin: 4px 0;
            color: #2D3748;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-radius: 12px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            background: transparent;
            position: relative;
            overflow: hidden;
            height: auto !important;
            line-height: 1.4 !important;
            border: none !important;
        }

        .navbar-dropdown-menu a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #7BA05B, #8BAC65);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 8px;
        }

        .navbar-dropdown-menu a:hover {
            color: #698648;
            transform: translateX(8px) scale(1.02);
            box-shadow: 0 4px 20px rgba(123, 160, 91, 0.25);
        }

        .navbar-dropdown-menu a:hover::before {
            opacity: 1;
        }

        .navbar-dropdown-menu a i {
            width: 20px;
            text-align: center;
            font-size: 16px;
            transition: transform 0.3s ease;
        }

        .navbar-dropdown-menu a:hover i {
            transform: scale(1.2);
        }

        .navbar-dropdown.navbar-show .navbar-dropdown-menu {
            display: block;
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(8px);
            animation: dropdownFadeIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        
        /* Ensure dropdown works even when Artikel link is active */
        .navbar-dropdown.navbar-show .navbar-artikel.navbar-active + .navbar-dropdown-menu {
            transform: translateX(-50%) translateY(8px);
        }

        @keyframes dropdownFadeIn {
            from {
                opacity: 0;
                transform: translateX(-50%) translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateX(-50%) translateY(5px);
            }
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
            background-color: #698648;
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
                padding: 20px 40px !important;
            }
        }

        @media (max-width: 768px) {
            .navbar-container {
                padding: 15px 20px !important;
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
                width: 80% !important;
                padding: 12px !important;
                font-size: 16px !important;
                border: 1.4px solid rgba(105, 134, 72, 0.7);
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
                padding: 12px 15px !important;
            }
        }

        @media (max-width: 360px) {
            .navbar-links a {
                font-size: 14px !important;
            }
        }
    </style>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
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
                        <i class="fas fa-chevron-down" style="font-size: 12px; margin-left: 6px; transition: transform 0.3s ease;"></i>
                    </a>
                    <div class="navbar-dropdown-menu" id="navbarArtikelMenu">
                        <div class="dropdown-grid">
                            <a href="{{ route('kategori.pola-makan-sehat') }}" class="dropdown-item" data-nav="pola-makan">
                                <i class="fas fa-utensils"></i>
                                <div class="dropdown-item-content">
                                    <h4>Pola Makan Sehat</h4>
                                </div>
                                <span class="dropdown-arrow">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            </a>
                            <a href="{{ route('kategori.aktivitas-fisik') }}" class="dropdown-item" data-nav="aktivitas-fisik">
                                <i class="fas fa-dumbbell"></i>
                                <div class="dropdown-item-content">
                                    <h4>Aktivitas Fisik</h4>
                                </div>
                                <span class="dropdown-arrow">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            </a>
                            <a href="{{ route('kategori.kesehatan-mental') }}" class="dropdown-item" data-nav="kesehatan-mental">
                                <i class="fas fa-brain"></i>
                                <div class="dropdown-item-content">
                                    <h4>Kesehatan Mental</h4>
                                </div>
                                <span class="dropdown-arrow">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            </a>
                            <a href="{{ route('kategori.perawatan-diri') }}" class="dropdown-item" data-nav="perawatan-diri">
                                <i class="fas fa-spa"></i>
                                <div class="dropdown-item-content">
                                    <h4>Perawatan Diri</h4>
                                </div>
                                <span class="dropdown-arrow">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            </a>
                            <a href="{{ route('kategori.vegan') }}" class="dropdown-item" data-nav="vegan">
                                <i class="fas fa-leaf"></i>
                                <div class="dropdown-item-content">
                                    <h4>Gaya Hidup Vegan</h4>
                                </div>
                                <span class="dropdown-arrow">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            </a>
                            <a href="{{ route('kategori.eco') }}" class="dropdown-item" data-nav="eco-living">
                                <i class="fas fa-recycle"></i>
                                <div class="dropdown-item-content">
                                    <h4>Eco Living</h4>
                                </div>
                                <span class="dropdown-arrow">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('cek-bmi') }}" data-nav="cek-sehat">
                    Cek Sehat
                </a>

                <a href="{{ route('tentang-kami') }}" data-nav="tentang-kami">
                    Tentang Kami
                </a>

                <a href="{{ route('fitplan') }}" data-nav="fitplan">
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Set active state based on current route
            @php
                $routeName = request()->route()->getName();
                $activeNav = 'beranda'; // Default
                $isArticlePage = false;

                // Mapping nama route (substring) ke data-nav navbar
                $articleRoutes = [
                    'pola-makan-sehat' => 'pola-makan',
                    'aktivitas-fisik' => 'aktivitas-fisik',
                    'kesehatan-mental' => 'kesehatan-mental',
                    'perawatan-diri' => 'perawatan-diri',
                    'vegan' => 'vegan',
                    'eco' => 'eco-living',
                ];
                
                foreach ($articleRoutes as $routeKey => $navKey) {
                    if (str_contains($routeName, $routeKey)) {
                        $activeNav = $navKey;
                        $isArticlePage = true;
                        break;
                    }
                }
                
                if (!$isArticlePage) {
                    if (str_contains($routeName, 'tentang-kami') || str_contains($routeName, 'about')) {
                        $activeNav = 'tentang-kami';
                    } elseif (str_contains($routeName, 'fitplan')) {
                        $activeNav = 'fitplan';
                    } elseif (str_contains($routeName, 'login')) {
                        $activeNav = 'login';
                    } elseif (str_contains($routeName, 'cek-bmi') || str_contains($routeName, 'cek-sehat')) {
                        $activeNav = 'cek-sehat';
                    }
                }
            @endphp
            
            // Get DOM elements
            const artikelToggle = document.getElementById("navbarArtikelToggle");
            const dropdown = document.querySelector(".navbar-dropdown");
            const menuToggle = document.getElementById("navbarMenuToggle");
            const navLinks = document.querySelector(".navbar-links");
            const artikelMenu = document.getElementById("navbarArtikelMenu");
            
            // Set the active nav item on page load
            setNavbarState('{{ $activeNav }}');

            // Check if we're on an article page
            const isArticlePage = {{ $isArticlePage ? 'true' : 'false' }};
            
            // Set active state for Artikel button if on article page
            if (isArticlePage && artikelToggle) {
                artikelToggle.classList.add('navbar-active');
            }
            
            // Dropdown functionality - toggle on click, close when clicking outside
            if (artikelToggle && dropdown) {
                artikelToggle.addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dropdown.classList.toggle("navbar-show");

                    const icon = artikelToggle.querySelector('.fa-chevron-down');
                    if (icon) {
                        if (dropdown.classList.contains('navbar-show')) {
                            icon.style.transform = 'rotate(180deg)';
                        } else {
                            icon.style.transform = 'rotate(0deg)';
                        }
                    }
                });

                document.addEventListener("click", function(e) {
                    if (!dropdown.contains(e.target)) {
                        dropdown.classList.remove("navbar-show");

                        const icon = artikelToggle.querySelector('.fa-chevron-down');
                        if (icon) {
                            icon.style.transform = 'rotate(0deg)';
                        }
                    }
                });
            }
            
            // State management dengan switch case
            var currentNavState = "beranda";
            
            // Fungsi untuk mengubah status navbar menggunakan switch case
            function setNavbarState(state) {
                // Hapus kelas aktif dari semua link
                document.querySelectorAll('.navbar-links a').forEach(link => {
                    link.classList.remove('navbar-active');
                });
                
                // Hapus active class dari semua dropdown items
                document.querySelectorAll('.dropdown-item').forEach(item => {
                    item.classList.remove('active');
                });
                
                // Gunakan switch case untuk mengatur status navbar
                switch(state) {
                    case 'beranda': {
                        const link = document.querySelector('[data-nav="beranda"]');
                        if (link) {
                            link.classList.add('navbar-active');
                        }
                        console.log("Status navigasi: Beranda");
                        break;
                    }
                    case 'pola-makan': {
                        if (artikelToggle) {
                            artikelToggle.classList.add('navbar-active');
                        }
                        const item = document.querySelector('[data-nav="pola-makan"]');
                        if (item) {
                            item.classList.add('active');
                        }
                        console.log("Status navigasi: Pola Makan Sehat");
                        break;
                    }
                    case 'aktivitas-fisik': {
                        if (artikelToggle) {
                            artikelToggle.classList.add('navbar-active');
                        }
                        const item = document.querySelector('[data-nav="aktivitas-fisik"]');
                        if (item) {
                            item.classList.add('active');
                        }
                        console.log("Status navigasi: Aktivitas Fisik");
                        break;
                    }
                    case 'kesehatan-mental': {
                        if (artikelToggle) {
                            artikelToggle.classList.add('navbar-active');
                        }
                        const item = document.querySelector('[data-nav="kesehatan-mental"]');
                        if (item) {
                            item.classList.add('active');
                        }
                        console.log("Status navigasi: Kesehatan Mental");
                        break;
                    }
                    case 'perawatan-diri': {
                        if (artikelToggle) {
                            artikelToggle.classList.add('navbar-active');
                        }
                        const item = document.querySelector('[data-nav="perawatan-diri"]');
                        if (item) {
                            item.classList.add('active');
                        }
                        console.log("Status navigasi: Perawatan Diri");
                        break;
                    }
                    case 'vegan': {
                        if (artikelToggle) {
                            artikelToggle.classList.add('navbar-active');
                        }
                        const item = document.querySelector('[data-nav="vegan"]');
                        if (item) {
                            item.classList.add('active');
                        }
                        console.log("Status navigasi: Vegan");
                        break;
                    }
                    case 'eco-living': {
                        if (artikelToggle) {
                            artikelToggle.classList.add('navbar-active');
                        }
                        const item = document.querySelector('[data-nav="eco-living"]');
                        if (item) {
                            item.classList.add('active');
                        }
                        console.log("Status navigasi: Eco Living");
                        break;
                    }
                    case 'cek-sehat': {
                        const link = document.querySelector('[data-nav="cek-sehat"]');
                        if (link) {
                            link.classList.add('navbar-active');
                        }
                        console.log("Status navigasi: Cek Sehat");
                        break;
                    }
                    case 'tentang-kami': {
                        const link = document.querySelector('[data-nav="tentang-kami"]');
                        if (link) {
                            link.classList.add('navbar-active');
                        }
                        console.log("Status navigasi: Tentang Kami");
                        break;
                    }
                    case 'fitplan': {
                        const link = document.querySelector('[data-nav="fitplan"]');
                        if (link) {
                            link.classList.add('navbar-active');
                        }
                        console.log("Status navigasi: FitPlan");
                        break;
                    }
                    case 'login': {
                        const link = document.querySelector('[data-nav="login"]');
                        if (link) {
                            link.classList.add('navbar-active');
                        }
                        console.log("Status navigasi: Login");
                        break;
                    }
                    default: {
                        const link = document.querySelector('[data-nav="beranda"]');
                        if (link) {
                            link.classList.add('navbar-active');
                        }
                        console.log("Status navigasi: Default (Beranda)");
                    }
                }
                
                currentNavState = state;
                
                // Tutup menu mobile jika terbuka
                if (navLinks.classList.contains('navbar-active')) {
                    menuToggle.classList.remove('navbar-active');
                    navLinks.classList.remove('navbar-active');
                }
            }

            // Mobile menu toggle
            if (menuToggle) {
                menuToggle.addEventListener("click", function() {
                    menuToggle.classList.toggle("navbar-active");
                    navLinks.classList.toggle("navbar-active");
                });
            }
            
            // Inisialisasi status awal dengan state dari PHP
            setNavbarState('{{ $activeNav }}');
        });
    </script>
</body>
</html>