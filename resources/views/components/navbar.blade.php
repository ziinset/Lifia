<nav class="navbar">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <div class="nav-container">
        <input type="checkbox" id="nav-toggle" class="nav-toggle" aria-hidden="true">
        <label for="nav-toggle" class="mobile-menu-button" aria-label="Buka menu navigasi">
            <iconify-icon class="icon-menu" icon="mdi:menu"></iconify-icon>
            <iconify-icon class="icon-close" icon="mdi:close"></iconify-icon>
        </label>
        <div class="nav-left">
            <a href="/">
                <img src="{{ asset('img/logo-lifia-nav.svg') }}" alt="Lifia">
            </a>
        </div>
        <div class="nav-center">
            <a class="nav-link" href="/">Beranda</a>
            
            <!-- Artikel with dropdown -->
            <div class="nav-dropdown">
                <a class="nav-link active" href="{{ route('artikel') }}" id="navArtikelToggle">
                    Artikel<iconify-icon class="caret" icon="mingcute:down-line"></iconify-icon>
                </a>
                <div class="nav-dropdown-menu" id="navArtikelMenu">
                    <a href="{{ route('artikel') }}">Pola Makan Sehat</a>
                    <a href="#">Aktivitas Fisik</a>
                    <a href="#">Kesehatan Mental</a>
                    <a href="#">Perawatan Diri</a>
                    <a href="#">Vegan</a>
                    <a href="#">Eco Living</a>
                </div>
            </div>
            
            <a class="nav-link" href="#">Cek Sehat<iconify-icon class="caret" icon="mingcute:down-line"></iconify-icon></a>
            <a class="nav-link" href="#">Tentang Kami</a>
            <a class="login-link" href="#">Login</a>
        </div>
        <div class="nav-right">
            <a class="search-btn" href="#" aria-label="Cari">
                <iconify-icon icon="iconamoon:search" width="26" height="26"></iconify-icon>
            </a>
        </div>
        <div class="mobile-menu" role="dialog" aria-modal="false" aria-label="Menu navigasi">
            <a class="nav-link" href="/">Beranda</a>
            <a class="nav-link" href="#">Artikel</a>
            <a class="nav-link" href="#">Cek Sehat</a>
            <a class="nav-link" href="#">Tentang Kami</a>
            <div class="mobile-divider"></div>
            <a class="login-link" href="#">Login</a>
        </div>
    </div>
</nav>

<style>
/* Dropdown Styles for Navbar */
.nav-dropdown {
    position: relative;
    display: inline-block;
}

.nav-dropdown-menu {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%) translateY(10px);
    background: linear-gradient(to bottom, #ffffff, #f8f8f8);
    backdrop-filter: blur(8px);
    min-width: 240px;
    border-radius: 16px;
    padding: 12px 0;
    z-index: 1000;
    margin-top: 8px;
    opacity: 0;
    visibility: hidden;
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(255, 255, 255, 0.3);
    transition: all 0.3s ease;
}

.nav-dropdown-menu::before {
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

.nav-dropdown-menu a {
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

.nav-dropdown-menu a::after {
    display: none !important;
}

.nav-dropdown-menu a:hover {
    background: linear-gradient(135deg, #8BAC65, #7BA05B);
    color: white;
    transform: translateX(6px);
    box-shadow: 0 4px 12px rgba(139, 172, 101, 0.3);
}

.nav-dropdown.nav-show .nav-dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0);
}

.nav-dropdown.nav-show .nav-dropdown-menu a {
    animation: navFadeSlideIn 0.4s ease forwards;
    opacity: 0;
}

.nav-dropdown.nav-show .nav-dropdown-menu a:nth-child(1) { animation-delay: 0.05s; }
.nav-dropdown.nav-show .nav-dropdown-menu a:nth-child(2) { animation-delay: 0.1s; }
.nav-dropdown.nav-show .nav-dropdown-menu a:nth-child(3) { animation-delay: 0.15s; }
.nav-dropdown.nav-show .nav-dropdown-menu a:nth-child(4) { animation-delay: 0.2s; }
.nav-dropdown.nav-show .nav-dropdown-menu a:nth-child(5) { animation-delay: 0.25s; }
.nav-dropdown.nav-show .nav-dropdown-menu a:nth-child(6) { animation-delay: 0.3s; }

@keyframes navFadeSlideIn {
    from {
        opacity: 0;
        transform: translateY(-8px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Mobile responsive */
@media (max-width: 960px) {
    .nav-dropdown {
        display: block;
        width: 100%;
    }
    
    .nav-dropdown-menu {
        position: static;
        transform: none;
        width: 100%;
        margin: 10px 0;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        padding: 8px 0;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    
    .nav-dropdown-menu::before {
        display: none;
    }
    
    .nav-dropdown-menu a {
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
    
    .nav-dropdown-menu a:hover {
        background: rgba(139, 172, 101, 0.1);
        color: #556B2F;
        transform: none;
        box-shadow: none;
    }
}
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const artikelToggle = document.getElementById("navArtikelToggle");
        const dropdown = artikelToggle.closest(".nav-dropdown");

        // Artikel dropdown toggle
        artikelToggle.addEventListener("click", function(e) {
            e.preventDefault();
            dropdown.classList.toggle("nav-show");
        });

        // Close dropdown if clicked outside
        document.addEventListener("click", function(e) {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove("nav-show");
            }
        });
    });
</script>


