<style>
    /* FitPlan Header Styles */
    .fitplan-hero {
        position: relative;
        background: #f6f4ef;
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

    .fitplan-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #ffffff;
        background: #5e7844;
        padding: 8px 14px;
        border-radius: 999px;
        box-shadow: 0 4px 14px rgba(94,120,68,.3);
    }

    .fitplan-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        color: #27341b;
        font-size: 46px;
        line-height: 1.2;
        margin: 14px 0 10px;
    }

    .fitplan-desc {
        font-family: 'Montserrat', sans-serif;
        color: #5b5b5b;
        line-height: 1.8;
        font-size: 15px;
        max-width: 560px;
        margin-bottom: 18px;
    }

    .fitplan-metrics {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
        margin: 18px 0 22px;
        max-width: 520px;
    }

    .fitplan-metric {
        background: #ffffff;
        border: 1px solid #e1ead8;
        border-radius: 14px;
        padding: 14px 16px;
        display: grid;
        gap: 2px;
        box-shadow: 0 6px 16px rgba(0,0,0,.05);
    }

    .fitplan-metric strong { color: #2f4b1e; font-size: 18px; }
    .fitplan-metric span { color: #7c8b73; font-size: 12px; font-weight: 600; }

    .fitplan-cta {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #7ea861, #6e9754);
        color: #fff;
        border: none;
        padding: 14px 20px;
        border-radius: 14px;
        font-weight: 700;
        font-family: 'Montserrat', sans-serif;
        box-shadow: 0 10px 24px rgba(110,151,84,.25);
        cursor: pointer;
        text-decoration: none;
    }

    /* Right visual */
    .fitplan-visual {
        position: relative;
        display: grid;
        place-items: center;
    }

    .fitplan-circle {
        width: 520px;
        height: 520px;
        border-radius: 50%;
        background: radial-gradient(circle at 40% 40%, #88a36f, #5e7844 70%);
        position: relative;
        display: grid;
        place-items: center;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(94,120,68,.45);
    }

    .fitplan-people {
        width: 92%;
        height: auto;
        object-fit: contain;
        transform: translateY(8px);
    }

    .fitplan-float {
        position: absolute;
        background: rgba(255,255,255,.95);
        border: 1px solid #e1ead8;
        border-radius: 16px;
        padding: 10px 12px;
        color: #2f4b1e;
        font-family: 'Montserrat', sans-serif;
        font-size: 13px;
        font-weight: 700;
        box-shadow: 0 10px 30px rgba(0,0,0,.12);
        animation: fpfloat 6s ease-in-out infinite;
    }

    .fitplan-float.fp1 { top: 18%; right: -16px; animation-delay: 0s; }
    .fitplan-float.fp2 { bottom: 14%; left: -10px; animation-delay: 2s; }

    @keyframes fpfloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @media (max-width: 1024px) {
        .fitplan-hero { padding: 100px 0 40px; }
        .fitplan-hero .container { grid-template-columns: 1fr; text-align: center; }
        .fitplan-desc, .fitplan-metrics { margin-left: auto; margin-right: auto; }
        .fitplan-circle { width: 420px; height: 420px; }
    }

    @media (max-width: 520px) {
        .fitplan-title { font-size: 32px; }
        .fitplan-circle { width: 340px; height: 340px; }
    }
</style>

<section class="fitplan-hero">
    <div class="container">
        <div class="fitplan-left">
            <div class="fitplan-eyebrow">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
                Panduan Olahraga
            </div>
            <h1 class="fitplan-title">Sehat & Konsisten</h1>
            <p class="fitplan-desc">FitPlan siap bantu kamu, dari pemula sampai pro, menyusun latihan harian yang terstruktur dan menyenangkan.</p>

            <div class="fitplan-metrics">
                <div class="fitplan-metric">
                    <strong>500+</strong>
                    <span>Latihan</span>
                </div>
                <div class="fitplan-metric">
                    <strong>100+</strong>
                    <span>Program</span>
                </div>
                <div class="fitplan-metric">
                    <strong>60+</strong>
                    <span>Instruktur</span>
                </div>
            </div>

            <a href="#rencana" class="fitplan-cta">Mulai Sekarang</a>
        </div>

        <div class="fitplan-visual">
            <div class="fitplan-circle">
                <!-- Replace with real asset if available -->
                <img class="fitplan-people" src="{{ asset('img/fitplan-people.png') }}" alt="Athlete" onerror="this.src='data:image/svg+xml;utf8,\
                <svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 300 380\'>\
                <rect width=\'100%\' height=\'100%\' fill=\'%237ea861\'/>\
                <text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-family=\'Poppins, sans-serif\' font-size=\'22\' fill=\'white\'>Gambar Atlet</text>\
                </svg>'"/>

                <div class="fitplan-float fp1">Target Harian ✓</div>
                <div class="fitplan-float fp2">Konsisten 7 hari</div>
            </div>
        </div>
    </div>
</section>
