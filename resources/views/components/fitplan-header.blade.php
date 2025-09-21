<style>
    /* FitPlan Hero Styles */
    .fitplan-hero {
        position: relative;
        background: #5e7844; /* hijau seperti gambar pertama */
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
    }

    .fitplan-metrics {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 14px;
        margin-bottom: 28px;
        max-width: 480px;
    }

    .fitplan-metric {
        background: #fff;
        border-radius: 14px;
        padding: 18px 16px;
        text-align: center;
        box-shadow: 0 6px 18px rgba(0,0,0,.12);
    }

    .fitplan-metric strong {
        color: #2f4b1e;
        font-size: 20px;
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
        background: linear-gradient(135deg, #9e8262, #c8b39b);
        color: #fff;
        border: none;
        padding: 14px 26px;
        border-radius: 20px;
        font-weight: 700;
        font-family: 'Montserrat', sans-serif;
        cursor: pointer;
        text-decoration: none;
        transition: transform 0.25s ease;
    }

    .fitplan-cta:hover {
        transform: translateY(-2px);
    }

    /* Right visual */
    .fitplan-visual {
    position: relative;
    display: grid;
    place-items: center;
}

.fitplan-circle {
    width: 480px;
    height: 480px;
    border-radius: 50%;
    background: #fff;
    position: relative;
    z-index: 1;
    box-shadow: 0 18px 40px rgba(0,0,0,.2);
}

.fitplan-people {
    position: absolute;
    bottom: 0;
    right: 94px; /* geser dikit ke kanan */
    width: auto;
    max-width: 389px; /* atur sesuai selera */
    height: auto;
    z-index: 2;
}

    .fitplan-float {
        position: absolute;
        background: #dff1d6;
        border-radius: 16px;
        padding: 10px 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,.12);
        animation: fpfloat 6s ease-in-out infinite;
    }

    .fitplan-float.fp1 { top: 20%; right: -16px; animation-delay: 0s; }
    .fitplan-float.fp2 { bottom: 15%; left: -14px; animation-delay: 2s; }
    .fitplan-float fp3 { top: 45%; left: -12px; animation-delay: 1s; }

    @keyframes fpfloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @media (max-width: 1024px) {
        .fitplan-hero { padding: 100px 0 40px; }
        .fitplan-hero .container { grid-template-columns: 1fr; text-align: center; }
        .fitplan-circle { width: 380px; height: 380px; }
    }

    @media (max-width: 520px) {
        .fitplan-title { font-size: 28px; }
        .fitplan-circle { width: 300px; height: 300px; }
    }
    @media (max-width: 768px) {
    .fitplan-people {
        max-width: 280px;
        right: 0;
    }
}

@media (max-width: 520px) {
    .fitplan-people {
        max-width: 220px;
        right: 0;
    }
}
</style>

<section class="fitplan-hero">
    <div class="container">
        <div class="fitplan-left">
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
            <div class="fitplan-circle"></div>

            <img class="fitplan-people" src="{{ asset('img/fitplan-people.png') }}" alt="Athlete" />

            <div class="fitplan-float fp1">
                <iconify-icon icon="mdi:weight-lifter"></iconify-icon>
            </div>
            <div class="fitplan-float fp2">
                <iconify-icon icon="mdi:food-apple"></iconify-icon>
            </div>
            <div class="fitplan-float fp3">
                <iconify-icon icon="mdi:run"></iconify-icon>
            </div>
        </div>
    </div>
</section>