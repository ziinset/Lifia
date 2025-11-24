<section class="hero-program-section">
    <div class="hero-program-background">
        <img src="{{ asset('images/turun.svg') }}" alt="Program Turun Berat Badan Background" class="hero-bg-image">
        <div class="hero-overlay"></div>
    </div>
    <div class="hero-program-content">
        <h1 class="hero-program-title">Program Turun Berat Badan</h1>
        <p class="hero-program-description">
            Ikuti program penurunan berat badan yang dirancang dengan pola makan sehat, olahraga efektif, dan dukungan motivasi untuk hasil yang nyata.
        </p>
        <div class="hero-search-container">
            <div class="hero-search-box">
                <iconify-icon icon="iconamoon:search" class="hero-search-icon"></iconify-icon>
                <input type="text" placeholder="Telusuri...">
            </div>
        </div>
    </div>
</section>

<style>
.hero-program-section {
    position: relative;
    width: 100%;
    min-height: 100vh;
    overflow: hidden;
    display: flex;
    align-items: center;
}

.hero-program-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.hero-bg-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        to bottom right,
        rgba(0, 0, 0, 0.15) 0%,
        rgba(0, 0, 0, 0.1) 30%,
        rgba(0, 0, 0, 0.05) 60%,
        rgba(0, 0, 0, 0) 100%
    );
    z-index: 2;
}

.hero-program-content {
    position: relative;
    z-index: 10;
    max-width: 1200px;
    margin: 0;
    padding: 120px 60px 80px 80px;
    width: 100%;
}

.hero-program-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 36px;
    line-height: 1.2;
    color: #FFFFFF;
    margin-bottom: 20px;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.hero-program-description {
    font-family: 'Montserrat', sans-serif;
    font-weight: 500;
    font-size: 24px;
    line-height: 1.5;
    color: #FFFFFF;
    margin-bottom: 32px;
    max-width: 700px;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
}

.hero-search-container {
    position: relative;
    max-width: 600px;
    width: 100%;
}

.hero-search-box {
    display: flex;
    align-items: center;
    background: #FFFFFF;
    border-radius: 50px;
    padding: 18px 24px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.hero-search-box:focus-within {
    transform: translateY(-2px);
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.2);
}

.hero-search-icon {
    margin-right: 12px;
    color: #4E342E;
    font-size: 24px;
    flex-shrink: 0;
}

.hero-search-box input {
    border: none;
    outline: none;
    flex: 1;
    font-size: 16px;
    font-family: 'Poppins', sans-serif;
    color: #333;
    background: transparent;
}

.hero-search-box input::placeholder {
    color: #999;
    font-weight: 400;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .hero-program-content {
        padding: 100px 40px 60px 60px;
    }

    .hero-program-title {
        font-size: 32px;
    }

    .hero-program-description {
        font-size: 22px;
    }
}

@media (max-width: 768px) {
    .hero-program-content {
        padding: 80px 24px 40px 32px;
    }

    .hero-program-title {
        font-size: 28px;
        margin-bottom: 16px;
    }

    .hero-program-description {
        font-size: 18px;
        margin-bottom: 24px;
    }

    .hero-search-box {
        padding: 14px 20px;
    }

    .hero-search-icon {
        font-size: 20px;
    }

    .hero-search-box input {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .hero-program-title {
        font-size: 24px;
    }

    .hero-program-description {
        font-size: 16px;
    }
}
</style>

