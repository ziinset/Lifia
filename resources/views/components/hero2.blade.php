<style>
    .hero2-wrapper {
        background: #f6f4ef;
        position: relative;
        overflow: hidden;
        min-height: 100vh;
    }

    .hero2-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 28px 20px 48px 20px;
        position: relative;
        z-index: 2;
    }



    .hero2-nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 8px;
    }

    .hero2-brand {
        display: flex;
        align-items: center;
        gap: 10px;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #2c5530;
        font-size: 28px;
    }

    .hero2-brand img {
        height: 28px;
        width: auto;
    }

    .hero2-menu {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .hero2-link {
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        color: #2c5530;
        text-decoration: none;
        background: #ffffff;
        border: 1px solid #d8e4d0;
        padding: 8px 14px;
        border-radius: 28px;
        transition: all .2s ease;
        box-shadow: 0 1px 0 rgba(0,0,0,.03);
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .hero2-link:hover {
        background: #f6fbf2;
        transform: translateY(-1px);
    }

    .hero2-link.active {
        background: #7ea861;
        color: #fff;
        border-color: #6e9754;
    }

    .hero2-link.active {
        position: relative;
    }

    .hero2-link.active::after {
        content: "";
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: -10px;
        width: 48px;
        height: 4px;
        background: #7ea861;
        border-radius: 4px;
    }

    .hero2-login {
        background: white;
        border: 1px solid #d9e6cf;
        padding: 8px 16px;
        border-radius: 28px;
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        color: #2c5530;
        text-decoration: none;
        box-shadow: 0 2px 8px rgba(44,85,48,.08);
    }

    .hero2-section {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        align-items: center;
        gap: 30px;
        margin-top: 18px;
        position: relative;
    }

    .hero2-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        color: #3a2f2b;
        font-size: 54px;
        line-height: 1.22;
        margin-bottom: 14px;
    }

    .hero2-title .accent {
        color: #7ea861;
    }

    .hero2-desc {
        font-family: 'Montserrat', sans-serif;
        color: #6a6a6a;
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 18px;
        max-width: 520px;
    }

    .hero2-badge {
        display: inline-block;
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        background: #eaf4e2;
        color: #7ea861;
        border: 1px solid #d6e8c9;
        padding: 8px 14px;
        border-radius: 999px;
        margin-bottom: 18px;
        font-size: 14px;
    }

    .hero2-search {
        display: flex;
        align-items: center;
        gap: 10px;
        background: white;
        border: 1px solid #dce8d2;
        border-radius: 999px;
        padding: 14px 18px;
        max-width: 540px;
        box-shadow: 0 8px 22px rgba(44,85,48,.08);
        margin-bottom: 18px;
    }

    .hero2-input {
        border: none;
        outline: none;
        flex: 1;
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        color: #333;
    }

    .hero2-input::placeholder {
        color: #98a59a;
    }

    .hero2-img-wrap {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }



    .hero2-circle {
        width: 600px;
        height: 600px;
        background: transparent;
        position: relative;
        overflow: hidden;
        border: none;
    }

    .hero2-food {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .hero2-food img {
        width: 120%;
        height: 120%;
        object-fit: contain;
        transform: translateY(8px);
    }

    .hero2-float {
        position: absolute;
        top: 220px;
        background: rgba(234,244,226,.95);
        border: 1px solid #d6e8c9;
        padding: 12px 16px;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(44,85,48,.12);
        font-family: 'Montserrat', sans-serif;
        backdrop-filter: blur(10px);
        z-index: 2;
    }

    .hero2-float-title {
        font-weight: 700;
        color: #3a2f2b;
        font-size: 14px;
        margin-bottom: 2px;
    }

    .hero2-float-sub {
        color: #7ea861;
        font-size: 12px;
        font-weight: 600;
    }

    .hero2-badges {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 12px;
        flex-wrap: wrap;
    }

    .hero2-small-badge {
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        font-size: 12px;
        color: #2c5530;
        background: #f2f8ed;
        border: 1px solid #dfeed4;
        border-radius: 999px;
        padding: 7px 12px;
    }

    /* Floating vegetables animation */
    .hero2-vegetables {
        position: absolute;
        animation: float 6s ease-in-out infinite;
        z-index: 1;
    }

    .hero2-vegetables.veggie-1 {
        top: 80px;
        right: 200px;
        animation-delay: 0s;
    }

    .hero2-vegetables.veggie-2 {
        top: 450px;
        right: 150px;
        animation-delay: 2s;
    }

    .hero2-vegetables.veggie-3 {
        top: 200px;
        left: 50px;
        animation-delay: 4s;
    }

    .hero2-vegetables.veggie-4 {
        bottom: 100px;
        right: 80px;
        animation-delay: 1s;
    }

    .hero2-vegetables.veggie-5 {
        bottom: 150px;
        right: 300px;
        animation-delay: 3s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }

    @media (max-width: 1200px) {
        .hero2-title { font-size: 44px; }
        .hero2-circle { width: 520px; height: 520px; }
        .hero2-float { top: 200px; }
    }

    @media (max-width: 1024px) {
        .hero2-section { grid-template-columns: 1fr; text-align: center; }
        .hero2-img-wrap { order: -1; }
        .hero2-circle { width: 460px; height: 460px; margin: 0 auto; }
        .hero2-vegetables { display: none; }
        .hero2-float { top: 160px; }
    }

    @media (max-width: 640px) {
        .hero2-title { font-size: 30px; }
        .hero2-container { padding: 20px 16px 28px; }
        .hero2-search { max-width: 100%; }
        .hero2-menu { gap: 8px; }
        .hero2-link { padding: 6px 12px; font-size: 14px; }
        .hero2-circle { width: 380px; height: 380px; }
        .hero2-float { top: 120px; }
    }
</style>

<div class="hero2-wrapper">


    <!-- Floating vegetables -->
    <div class="hero2-vegetables veggie-1">
        <svg width="40" height="40" viewBox="0 0 48 48" fill="none">
            <path d="M24 4C18.5 4 14 8.5 14 14V34C14 39.5 18.5 44 24 44C29.5 44 34 39.5 34 34V14C34 8.5 29.5 4 24 4Z" fill="#4CAF50"/>
            <path d="M20 12H28V36H20Z" fill="#66BB6A"/>
        </svg>
    </div>

    <div class="hero2-vegetables veggie-2">
        <svg width="35" height="35" viewBox="0 0 48 48" fill="none">
            <circle cx="24" cy="24" r="18" fill="#F44336"/>
            <circle cx="24" cy="24" r="12" fill="#FF5722"/>
            <path d="M20 20L28 28M28 20L20 28" stroke="#fff" stroke-width="2"/>
        </svg>
    </div>

    <div class="hero2-vegetables veggie-3">
        <svg width="30" height="30" viewBox="0 0 48 48" fill="none">
            <path d="M24 6L30 18H18L24 6Z" fill="#4CAF50"/>
            <circle cx="24" cy="30" r="12" fill="#4CAF50"/>
        </svg>
    </div>

    <div class="hero2-vegetables veggie-4">
        <svg width="32" height="32" viewBox="0 0 48 48" fill="none">
            <circle cx="24" cy="24" r="16" fill="#FF9800"/>
            <path d="M16 24C16 18 20 14 24 14C28 14 32 18 32 24" stroke="#fff" stroke-width="2"/>
        </svg>
    </div>

    <div class="hero2-vegetables veggie-5">
        <svg width="28" height="28" viewBox="0 0 48 48" fill="none">
            <circle cx="24" cy="24" r="14" fill="#8BC34A"/>
            <path d="M18 20H30V28H18Z" fill="#9CCC65"/>
        </svg>
    </div>

    <div class="hero2-container">
        <!-- Navigation -->
        <nav class="hero2-nav">
            <div class="hero2-brand">
                <img src="{{ asset('img/logo-lifia-nav.svg') }}" alt="Lifia">
            </div>
            <div class="hero2-menu">
                <a class="hero2-link" href="{{ route('home') }}">Beranda</a>
                <a class="hero2-link active" href="{{ route('artikel') }}">
                    Artikel
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </a>
                <a class="hero2-link" href="#">Cek Sehat</a>
                <a class="hero2-link" href="#">Tentang Kami</a>
                <a class="hero2-login" href="#">Login</a>
            </div>
        </nav>

        <!-- Main Hero Section -->
        <section class="hero2-section">
            <div>
                <div class="hero2-badge">
                    Tubuh yang <span class="accent">sehat</span> dimulai
                </div>

                <h1 class="hero2-title">
                    Tubuh yang <span class="accent">sehat</span> dimulai<br/>
                    dari apa yang kamu<br/>
                    konsumsi setiap hari.
                </h1>

                <p class="hero2-desc">
                    Pelajari cara memilih makanan bergizi, seimbang, dan menyenangkan untuk gaya hidup lebih sehat.
                </p>

                <div class="hero2-search">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7ea861" stroke-width="2">
                        <circle cx="11" cy="11" r="7"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <input class="hero2-input" type="text" placeholder="Telusuri..."/>
                </div>

                <div class="hero2-badges">
                    <span class="hero2-small-badge">Salmon Power Bowl</span>
                    <span class="hero2-small-badge">Salad Sehat Tinggi Protein</span>
                </div>
            </div>

            <!-- Food Image Section -->
            <div class="hero2-img-wrap">
                <div class="hero2-circle">
                    <div class="hero2-food">
                        <img src="{{ asset('img/bowl-hero2.svg') }}" alt="Healthy Salmon Bowl"/>
                    </div>
                    <div class="hero2-float">
                        <div class="hero2-float-title">Salmon Power Bowl</div>
                        <div class="hero2-float-sub">Salad Sehat Tinggi Protein</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">