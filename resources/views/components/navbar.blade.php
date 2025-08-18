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
            <a class="nav-link active" href="#">Artikel<iconify-icon class="caret" icon="mingcute:down-line"></iconify-icon></a>
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


