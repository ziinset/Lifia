@extends('layouts.app')

@section('title', 'Kalkulator BMI - Lifia')

@section('styles')
    <style>
        /* Reset untuk BMI Calculator saja */
        .bmi-container * {
            box-sizing: border-box;
        }

        /* Main BMI Container - tidak mengganggu navbar */
        .bmi-container {
            padding-top: 120px; /* Space untuk navbar yang position absolute */
            background-color: #f8fbf4;
            min-height: calc(100vh - 80px); /* Beri ruang untuk footer */
            position: relative;
        }

        .bmi-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 60px 20px;
            font-family: 'Poppins', sans-serif;
        }

        .bmi-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 8px;
        }

        .bmi-header-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: #e9f3df;
            color: #6c8c35;
        }

        .bmi-title {
            font-weight: 700;
            font-size: 28px;
            color: #26411c;
            margin: 0;
        }

        .bmi-subtitle {
            color: #6c8c35;
            font-weight: 600;
            font-size: 14px;
            margin-left: 56px;
            margin-bottom: 16px;
        }

        .bmi-desc {
            color: #4a4a4a;
            font-size: 14px;
            line-height: 1.7;
            margin: 18px 0 28px 0;
            max-width: 900px;
        }

        .bmi-card {
            background: linear-gradient(135deg, #eaf4d7 0%, #e8f1d2 50%, #e3efce 100%);
            border-radius: 20px;
            padding: 32px;
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 40px;
            align-items: start;
            min-height: 500px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .bmi-left-content {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .gender-section {
            margin-bottom: 8px;
        }

        .gender-label {
            font-weight: 600;
            color: #2f2f2f;
            font-size: 16px;
            margin-bottom: 16px;
            display: block;
        }

        .gender-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .gender-card {
            background: #fff;
            border: 2px solid #e6ead9;
            border-radius: 16px;
            padding: 20px 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all .2s ease;
            text-align: center;
        }

        .gender-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        .gender-card span {
            font-weight: 600;
            color: #3a3a3a;
            font-size: 14px;
        }

        .gender-card.active {
            border-color: #b4d678;
            background: #f8fdf2;
            box-shadow: 0 0 0 3px rgba(180,214,120,.2);
        }

        .bmi-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .bmi-form-group {
            display: flex;
            flex-direction: column;
        }

        .bmi-form-group.full-width {
            grid-column: 1 / -1;
        }

        .bmi-field {
            background: #fff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            padding: 14px 16px;
            border: 2px solid #e6ead9;
            transition: border-color 0.2s ease;
        }

        .bmi-field:focus-within {
            border-color: #b4d678;
        }

        .bmi-field input {
            border: none;
            outline: none;
            flex: 1;
            font-family: inherit;
            font-size: 14px;
            color: #2e2e2e;
            background: transparent;
        }

        .bmi-field input::placeholder {
            color: #999;
        }

        .bmi-field span {
            color: #8c8c8c;
            font-size: 13px;
            margin-left: 8px;
            font-weight: 500;
        }

        .bmi-label {
            font-weight: 600;
            color: #2f2f2f;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .bmi-cta {
            display: flex;
            flex-direction: column;
            gap: 12px;
            align-items: flex-start;
            margin-top: 8px;
        }

        .bmi-btn {
            background: linear-gradient(135deg, #4a6b2a, #3f5f22);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 14px 28px;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
            box-shadow: 0 4px 12px rgba(63, 95, 34, 0.3);
        }

        .bmi-btn:hover {
            background: linear-gradient(135deg, #3f5f22, #35531d);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(63, 95, 34, 0.4);
        }

        .bmi-mini-note {
            font-size: 12px;
            color: #6a6a6a;
        }

        .bmi-illustration {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .bmi-illustration img {
            max-width: 100%;
            width: 280px;
            height: auto;
            object-fit: contain;
        }

        .result-card {
            background: #fff;
            border-radius: 20px;
            padding: 32px;
            border: 1px solid #ecefe3;
            display: grid;
            grid-template-columns: 1fr 200px;
            gap: 32px;
            align-items: center;
            margin-top: 32px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .result-left {
            max-width: none;
        }

        .result-title {
            font-weight: 700;
            color: #2f2f2f;
            font-size: 22px;
            margin-bottom: 12px;
        }

        .result-number {
            font-size: 36px;
            font-weight: 700;
            color: #2f4b1e;
            margin-bottom: 16px;
        }

        .result-scale {
            position: relative;
            height: 14px;
            width: 100%;
            background: #e6e6e6;
            border-radius: 999px;
            overflow: hidden;
            margin-bottom: 12px;
        }

        .scale-track {
            position: absolute;
            inset: 0;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
        }

        .scale-under { background: #6aa6ff; }
        .scale-normal { background: #66c46a; }
        .scale-over { background: #ffb347; }
        .scale-obese { background: #ff6b6b; }

        .scale-indicator {
            position: absolute;
            top: -4px;
            width: 14px;
            height: 22px;
            background: #2f4b1e;
            border-radius: 7px;
            transform: translateX(-50%);
            transition: left .3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

        .legend {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-top: 12px;
            font-size: 12px;
            color: #666;
            flex-wrap: wrap;
        }

        .legend > span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
        }

        .dot-under { background: #6aa6ff; }
        .dot-normal { background: #66c46a; }
        .dot-over { background: #ffb347; }
        .dot-obese { background: #ff6b6b; }

        .result-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #e9f3df;
            color: #2f4b1e;
            padding: 10px 16px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            margin: 16px 0 12px 0;
        }

        .result-desc {
            color: #555;
            font-size: 14px;
            line-height: 1.7;
        }

        .result-illustration img {
            max-width: 100%;
            width: 180px;
            height: auto;
        }

        .fitplan-cta {
            margin-top: 32px;
            background: linear-gradient(135deg, #b4d678, #a8cc6a);
            color: #23410f;
            border: none;
            padding: 18px 24px;
            width: 100%;
            border-radius: 16px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(180, 214, 120, 0.3);
        }

        .fitplan-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(180, 214, 120, 0.4);
        }

        /* Responsive breakpoints */
        @media (max-width: 980px) {
            .bmi-container {
                padding-top: 100px;
            }

            .bmi-card {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .bmi-illustration {
                order: -1;
            }

            .gender-group {
                grid-template-columns: 1fr;
                max-width: 300px;
            }

            .gender-card {
                flex-direction: row;
                text-align: left;
                padding: 16px;
            }

            .gender-card img {
                width: 60px;
                height: 60px;
            }
        }

        @media (max-width: 720px) {
            .bmi-container {
                padding-top: 80px;
            }

            .bmi-form {
                grid-template-columns: 1fr;
            }

            .bmi-title {
                font-size: 24px;
            }

            .result-card {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .bmi-card {
                padding: 24px;
            }

            .result-card {
                padding: 24px;
            }
        }

        @media (max-width: 480px) {
            .bmi-wrapper {
                padding: 0 15px 40px 15px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="bmi-container">
        <div class="bmi-wrapper">
            <div class="bmi-header">
                <div class="bmi-header-icon">
                    <i class="fa-solid fa-scale-balanced"></i>
                </div>
                <div class="bmi-title">Kalkulator BMI</div>
            </div>
            <div class="bmi-subtitle">Cek Indeks Massa Tubuh Anda</div>
            <p class="bmi-desc">Gunakan kalkulator ini untuk menghitung Indeks Massa Tubuh (BMI) Anda. BMI membantu memperkirakan apakah berat badan Anda berada pada kisaran sehat berdasarkan tinggi badan. Hasil hanya indikatif untuk penilaian yang lebih lengkap, konsultasikan ke tenaga kesehatan.</p>

            <div class="bmi-card">
                <div class="bmi-left-content">
                    <div class="gender-section">
                        <span class="gender-label">Jenis Kelamin</span>
                        <div class="gender-group" id="genderGroup">
                            <div class="gender-card active" data-value="male">
                                <img src="{{ asset('img/pria.png') }}" alt="Laki-laki">
                                <span>Laki-laki</span>
                            </div>
                            <div class="gender-card" data-value="female">
                                <img src="{{ asset('img/perempuan.png') }}" alt="Perempuan">
                                <span>Perempuan</span>
                            </div>
                        </div>
                    </div>

                    <div class="bmi-form">
                        <div class="bmi-form-group">
                            <div class="bmi-label">Berat Badan</div>
                            <div class="bmi-field">
                                <input id="weightInput" type="number" min="1" step="0.1" placeholder="Masukkan berat badan">
                                <span>(kg)</span>
                            </div>
                        </div>
                        <div class="bmi-form-group">
                            <div class="bmi-label">Tinggi Badan</div>
                            <div class="bmi-field">
                                <input id="heightInput" type="number" min="1" step="0.1" placeholder="Masukkan tinggi badan">
                                <span>(cm)</span>
                            </div>
                        </div>
                        <div class="bmi-form-group full-width">
                            <div class="bmi-label">Usia</div>
                            <div class="bmi-field">
                                <input id="ageInput" type="number" min="1" step="1" placeholder="Masukkan usia">
                                <span>(tahun)</span>
                            </div>
                        </div>
                    </div>

                    <div class="bmi-cta">
                        <button class="bmi-btn" id="calcBtn">
                            <i class="fa-solid fa-calculator"></i>
                            Hitung
                        </button>
                        <span class="bmi-mini-note">BMI untuk dewasa (≥ 18 tahun)</span>
                    </div>
                </div>

                <div class="bmi-illustration">
                    <img src="{{ asset('img/ilustrasibmi.png') }}" alt="Ilustrasi BMI">
                </div>
            </div>

            <div class="result-card" id="resultCard" style="display:none;">
                <div class="result-left">
                    <div class="result-title">Hasil BMI Anda</div>
                    <div class="result-number" id="bmiValue">0</div>
                    <div class="result-scale">
                        <div class="scale-track">
                            <div class="scale-under"></div>
                            <div class="scale-normal"></div>
                            <div class="scale-over"></div>
                            <div class="scale-obese"></div>
                        </div>
                        <div class="scale-indicator" id="scaleIndicator" style="left: 0%;"></div>
                    </div>
                    <div class="legend">
                        <span><i class="dot dot-under"></i> Kurus</span>
                        <span><i class="dot dot-normal"></i> Sehat</span>
                        <span><i class="dot dot-over"></i> Kelebihan</span>
                        <span><i class="dot dot-obese"></i> Obesitas</span>
                    </div>
                    <div class="result-badge">
                        <span id="bmiStatusText">Berat Sehat</span>
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div class="result-desc" id="bmiAdvice">Anda berada dalam kisaran berat badan yang dianggap ideal untuk kesehatan. Pertahankan pola makan bergizi seimbang, olahraga teratur, dan cukup tidur agar kesehatan tetap optimal.</div>
                </div>
                <div class="result-illustration">
                    <img src="{{ asset('img/ilustrasiobesitas.png') }}" alt="Ilustrasi Hasil BMI">
                </div>
            </div>

            <button class="fitplan-cta" onclick="window.location.href='{{ url('/fitplan') }}'">
                Coba FitPlan untuk menjaga berat sehat Anda
            </button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function() {
            const genderCards = document.querySelectorAll('.gender-card');
            let gender = 'male';

            genderCards.forEach(card => {
                card.addEventListener('click', () => {
                    genderCards.forEach(c => c.classList.remove('active'));
                    card.classList.add('active');
                    gender = card.dataset.value;
                });
            });

            function formatNumber(n) {
                return (Math.round(n * 10) / 10).toLocaleString('id-ID', {
                    minimumFractionDigits: 1,
                    maximumFractionDigits: 1
                });
            }

            function bmiCategory(bmi) {
                if (bmi < 18.5) return 'under';
                if (bmi < 25) return 'normal';
                if (bmi < 30) return 'over';
                return 'obese';
            }

            function adviceFor(category) {
                switch (category) {
                    case 'under':
                        return 'BMI Anda berada di bawah normal. Pertimbangkan peningkatan asupan kalori bergizi dan konsultasikan dengan tenaga kesehatan untuk rencana penambahan berat badan yang sehat.';
                    case 'normal':
                        return 'Anda berada dalam kisaran berat badan yang dianggap ideal untuk kesehatan. Pertahankan pola makan bergizi seimbang, olahraga teratur, dan cukup istirahat.';
                    case 'over':
                        return 'BMI Anda berada di kisaran kelebihan berat badan. Coba atur pola makan dan tingkatkan aktivitas fisik secara bertahap. Konsultasikan dengan tenaga kesehatan untuk rencana yang tepat.';
                    default:
                        return 'BMI Anda berada pada kisaran obesitas. Disarankan untuk konsultasikan rencana penurunan berat badan dengan profesional kesehatan untuk pendekatan yang aman dan efektif.';
                }
            }

            function categoryLabel(category) {
                return {
                    under: 'Berat Kurang',
                    normal: 'Berat Sehat',
                    over: 'Kelebihan Berat',
                    obese: 'Obesitas'
                }[category];
            }

            function indicatorLeft(bmi) {
                const min = 14, max = 40;
                const clamped = Math.max(min, Math.min(max, bmi));
                return ((clamped - min) / (max - min)) * 100;
            }

            // Set navbar state ke 'cek-sehat' untuk halaman ini
            document.addEventListener('DOMContentLoaded', function() {
                if (window.setNavbarState && typeof window.setNavbarState === 'function') {
                    window.setNavbarState('cek-sehat');
                }
            });

            document.getElementById('calcBtn').addEventListener('click', function() {
                const w = parseFloat(document.getElementById('weightInput').value);
                const hCm = parseFloat(document.getElementById('heightInput').value);
                const age = parseInt(document.getElementById('ageInput').value, 10);

                if (!w || !hCm || hCm <= 0) {
                    alert('Mohon masukkan berat dan tinggi badan yang valid.');
                    return;
                }

                if (!age || age < 5) {
                    alert('Usia tampaknya tidak valid. Kalkulator ini direkomendasikan untuk ≥ 18 tahun.');
                    return;
                }

                const h = hCm / 100;
                const bmi = w / (h * h);
                const cat = bmiCategory(bmi);

                document.getElementById('bmiValue').textContent = formatNumber(bmi);
                document.getElementById('resultCard').style.display = 'grid';
                document.getElementById('scaleIndicator').style.left = indicatorLeft(bmi) + '%';
                document.getElementById('bmiStatusText').textContent = categoryLabel(cat);
                document.getElementById('bmiAdvice').textContent = adviceFor(cat);

                // Smooth scroll to result
                document.getElementById('resultCard').scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            });
        })();
    </script>
@endsection