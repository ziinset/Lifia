<style>
    .hero2-wrapper {
        background: #f6f4ef;
        position: relative;
        overflow: hidden;
        min-height: 70vh;
    }

    .hero2-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 20px 32px 20px;
        position: relative;
        z-index: 2;
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
        font-size: 42px;
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
        padding: 12px 16px;
        max-width: 480px;
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
        width: 480px;
        height: 480px;
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
        width: 100%;
        height: 100%;
        object-fit: contain;
        transform: translateY(8px);
    }

    .hero2-float {
        position: absolute;
        top: 160px;
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
        display: none !important;
        animation: none !important;
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
        .hero2-title { font-size: 36px; }
        .hero2-circle { width: 420px; height: 420px; }
        .hero2-float { top: 150px; }
    }

    @media (max-width: 1024px) {
        .hero2-section { grid-template-columns: 1fr; text-align: center; }
        .hero2-img-wrap { order: -1; }
        .hero2-circle { width: 360px; height: 360px; margin: 0 auto; }
        .hero2-vegetables { display: none; }
        .hero2-float { top: 120px; }
    }

    @media (max-width: 640px) {
        .hero2-title { font-size: 26px; }
        .hero2-container { padding: 56px 16px 20px; }
        .hero2-search { max-width: 100%; }
        .hero2-menu { gap: 8px; }
        .hero2-link { padding: 6px 12px; font-size: 14px; }
        .hero2-circle { width: 300px; height: 300px; }
        .hero2-float { top: 90px; }
    }

</style>

<div class="hero2-wrapper">


    <!-- Floating vegetables removed -->

    <div class="hero2-container">
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
