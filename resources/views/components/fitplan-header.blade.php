<style>
    /* FitPlan Hero Styles */
    .fitplan-hero {
        position: relative;
        background: #5e7844;
        padding: 120px 0 60px;
        overflow: hidden;
    }

    .fitplan-hero .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: 1.1fr .9fr;
        align-items: center;
        gap: 36px;
    }

    .fitplan-logo {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #ffffff;
        font-size: 32px;
        margin-bottom: 16px;
        letter-spacing: 1px;
    }

    .fitplan-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        color: #ffffff;
        font-size: 40px;
        line-height: 1.3;
        margin: 0 0 12px;
    }

    .fitplan-desc {
        font-family: 'Montserrat', sans-serif;
        color: #e7e7e7;
        line-height: 1.8;
        font-size: 15px;
        max-width: 520px;
        margin-bottom: 28px;
        padding-left: 12px;
        border-left: 2px solid rgba(255, 255, 255, 0.3);
    }

    .fitplan-metrics {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 14px;
        margin-bottom: 28px;
        max-width: 480px;
    }

    .fitplan-metric {
        background: #f5f5f0;
        border-radius: 14px;
        padding: 18px 16px;
        text-align: center;
        box-shadow: 0 6px 18px rgba(0, 0, 0, .12);
    }

    .fitplan-metric strong {
        display: block;
        color: #2f4b1e;
        font-size: 20px;
        margin-bottom: 4px;
    }

    .fitplan-metric span {
        color: #666;
        font-size: 13px;
        font-weight: 600;
    }

    .fitplan-cta {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: linear-gradient(135deg, #EDE7DD 0%, #BBA17E 100%);
        color: #2f4b1e;
        border: none;
        padding: 14px 26px;
        border-radius: 20px;
        font-weight: 700;
        font-family: 'Montserrat', sans-serif;
        cursor: pointer;
        text-decoration: none;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .15);
    }

    .fitplan-cta:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, .2);
    }

    /* Right visual */
    .fitplan-visual {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .fitplan-circle {
        width: 480px;
        height: 480px;
        border-radius: 50%;
        background: #fff;
        position: relative;
        z-index: 1;
        box-shadow: 0 18px 40px rgba(0, 0, 0, .2);
    }

    .fitplan-people {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: auto;
        max-width: 389px;
        height: auto;
        z-index: 2;
    }

    /* Golden sparkle stars */
    .fitplan-sparkle {
        position: absolute;
        color: #ffd700;
        z-index: 3;
        animation: sparkle 2s ease-in-out infinite;
    }

    .fitplan-sparkle.sparkle1 {
        top: 15%;
        left: 20%;
        font-size: 24px;
        animation-delay: 0s;
    }

    .fitplan-sparkle.sparkle2 {
        top: 12%;
        left: 25%;
        font-size: 20px;
        animation-delay: 0.5s;
    }

    @keyframes sparkle {
        0%, 100% {
            opacity: 1;
            transform: scale(1) rotate(0deg);
        }
        50% {
            opacity: 0.7;
            transform: scale(1.2) rotate(180deg);
        }
    }

    /* Feature icons on the right side */
    .fitplan-features {
        position: absolute;
        right: -20px;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 16px;
        z-index: 4;
    }

    .fitplan-feature-icon {
        border-radius: 12px;
        padding: 14px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 64px;
        height: 64px;
        animation: fpfloat 6s ease-in-out infinite;
    }

    .fitplan-feature-icon:nth-child(1) {
        background: #dff1d6;
        animation-delay: 0s;
    }

    .fitplan-feature-icon:nth-child(2) {
        background: #fff9c4;
        animation-delay: 2s;
    }

    .fitplan-feature-icon:nth-child(3) {
        background: #dff1d6;
        animation-delay: 1s;
    }

    .fitplan-feature-icon iconify-icon {
        font-size: 32px;
        color: #ffffff;
    }

    @keyframes fpfloat {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    @media (max-width: 1024px) {
        .fitplan-hero {
            padding: 100px 0 40px;
        }

        .fitplan-hero .container {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .fitplan-desc {
            padding-left: 0;
            border-left: none;
            border-top: 2px solid rgba(255, 255, 255, 0.3);
            padding-top: 12px;
            margin: 0 auto 28px;
        }

        .fitplan-circle {
            width: 380px;
            height: 380px;
        }

        .fitplan-features {
            right: 10px;
        }
    }

    @media (max-width: 520px) {
        .fitplan-logo {
            font-size: 24px;
        }

        .fitplan-title {
            font-size: 28px;
        }

        .fitplan-circle {
            width: 300px;
            height: 300px;
        }

        .fitplan-features {
            right: 5px;
        }

        .fitplan-feature-icon {
            width: 48px;
            height: 48px;
            padding: 10px;
        }

        .fitplan-feature-icon iconify-icon {
            font-size: 24px;
        }
    }

    @media (max-width: 768px) {
        .fitplan-people {
            max-width: 280px;
        }
    }

@media (max-width: 520px) {
    .fitplan-people {
        max-width: 220px;
        right: 0;
    }
}
<<<<<<< HEAD
=======

>>>>>>> goldi
</style>

<section class="fitplan-hero">
    <div class="container">
        <div class="fitplan-left">
            {{-- <div class="fitplan-logo">Lifia</div> --}}
            <h1 class="fitplan-title">Panduan Olahraga<br>Sehat & Konsisten</h1>
            <p class="fitplan-desc">Pilih tujuanmu, ikuti panduan harian, dan lihat progresmu berkembang.</p>

            <div class="fitplan-metrics">
                <div class="fitplan-metric">
                    <strong>500+</strong>
                    <span>Pengguna aktif</span>
                </div>
                <div class="fitplan-metric">
                    <strong>100+</strong>
                    <span>Video workout</span>
                </div>
                <div class="fitplan-metric">
                    <strong>60+</strong>
                    <span>Resep kesehatan</span>
                </div>
            </div>

            <a href="#rencana" class="fitplan-cta">Mulai Sekarang</a>
        </div>
        <div class="fitplan-visual">
            <div class="fitplan-circle">
                <!-- Golden sparkle stars -->
                <iconify-icon icon="mdi:star" class="fitplan-sparkle sparkle1"></iconify-icon>
                <iconify-icon icon="mdi:star" class="fitplan-sparkle sparkle2"></iconify-icon>
            </div>

            <img class="fitplan-people" src="{{ asset('img/fitplan-people.png') }}" alt="Athlete" />

            <!-- Feature icons on the right side -->
            <div class="fitplan-features">
                <div class="fitplan-feature-icon">
                    <iconify-icon icon="mdi:weight-lifter"></iconify-icon>
                </div>
                <div class="fitplan-feature-icon">
                    <iconify-icon icon="mdi:food-apple"></iconify-icon>
                </div>
                <div class="fitplan-feature-icon">
                    <iconify-icon icon="mdi:gymnastics"></iconify-icon>
                </div>
            </div>
        </div>
    </div>
</section>