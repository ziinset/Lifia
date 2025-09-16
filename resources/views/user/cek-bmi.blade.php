@extends('layouts.app')

@section('title', 'Kalkulator BMI - Lifia')

@section('styles')
    <style>
        .bmi-wrapper { max-width: 1200px; margin: 0 auto; padding: 32px 20px 80px 20px; font-family: 'Poppins', sans-serif; }
        .bmi-header { display: flex; align-items: center; gap: 14px; margin-bottom: 8px; }
        .bmi-header-icon { width: 42px; height: 42px; border-radius: 12px; display: grid; place-items: center; background: #e9f3df; color: #6c8c35; }
        .bmi-title { font-weight: 700; font-size: 28px; color: #26411c; }
        .bmi-subtitle { color: #6c8c35; font-weight: 600; font-size: 14px; margin-left: 56px; }
        .bmi-desc { color: #4a4a4a; font-size: 14px; line-height: 1.7; margin: 18px 0 28px 0; max-width: 900px; }

        .bmi-card { background: linear-gradient(90deg, #eaf4d7 0%, #e8f1d2 50%, #e3efce 100%); border-radius: 16px; padding: 28px; display: grid; grid-template-columns: 1.3fr 1fr; gap: 22px; align-items: center; min-height: 450px; }
        .bmi-form { display: flex; flex-direction: column; gap: 20px; }
        .bmi-field { background: #fff; border-radius: 12px; display: flex; align-items: center; padding: 10px 12px; border: 1px solid #e6ead9; }
        .bmi-field input { border: none; outline: none; flex: 1; font-family: inherit; font-size: 14px; color: #2e2e2e; }
        .bmi-field span { color: #8c8c8c; font-size: 13px; margin-left: 8px; }
        .bmi-label { font-weight: 600; color: #2f2f2f; font-size: 13px; margin: 6px 0 8px 2px; }

        .gender-group { display: flex; flex-direction: column; gap: 14px; margin-bottom: 20px; }
        .gender-card { background: #fff; border: 1px solid #e6ead9; border-radius: 14px; padding: 15px; display: flex; align-items: center; gap: 15px; cursor: pointer; transition: box-shadow .2s ease, border-color .2s ease; }
        .gender-card img { width: 60px; height: 60px; border-radius: 50%; object-fit: cover; }
        .gender-card span { font-weight: 600; color: #3a3a3a; font-size: 16px; }
        .gender-card.active { border-color: #b4d678; box-shadow: 0 0 0 4px rgba(180,214,120,.25); }

        .bmi-cta { display: flex; flex-direction: column; gap: 10px; align-items: flex-start; }
        .bmi-btn { background: #3f5f22; color: #fff; border: none; border-radius: 12px; padding: 12px 22px; font-weight: 600; cursor: pointer; transition: transform .15s ease, background .2s ease; display: flex; align-items: center; gap: 8px; }
        .bmi-btn:hover { background: #35531d; transform: translateY(-1px); }
        .bmi-mini-note { font-size: 12px; color: #6a6a6a; }

        .bmi-illustration { display: grid; place-items: center; }
        .bmi-illustration img { max-width: 260px; width: 100%; height: auto; }

        .result-card { background: #fff; border-radius: 16px; padding: 24px; border: 1px solid #ecefe3; display: grid; grid-template-columns: 1fr auto; gap: 16px; align-items: center; margin-top: 24px; }
        .result-left { max-width: 700px; }
        .result-title { font-weight: 700; color: #2f2f2f; font-size: 20px; margin-bottom: 10px; }
        .result-number { font-size: 32px; font-weight: 700; color: #2f4b1e; margin-bottom: 10px; }
        .result-scale { position: relative; height: 12px; width: 100%; background: #e6e6e6; border-radius: 999px; overflow: hidden; }
        .scale-track { position: absolute; inset: 0; display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; }
        .scale-under { background: #6aa6ff; }
        .scale-normal { background: #66c46a; }
        .scale-over { background: #ffb347; }
        .scale-obese { background: #ff6b6b; }
        .scale-indicator { position: absolute; top: -6px; width: 14px; height: 24px; background: #2f4b1e; border-radius: 7px; transform: translateX(-50%); transition: left .25s ease; }
        .legend { display: flex; gap: 8px; align-items: center; margin-top: 10px; font-size: 12px; color: #666; }
        .legend > span { display: inline-flex; align-items: center; gap: 6px; }
        .dot { width: 10px; height: 10px; border-radius: 50%; display: inline-block; }
        .dot-under { background: #6aa6ff; }
        .dot-normal { background: #66c46a; }
        .dot-over { background: #ffb347; }
        .dot-obese { background: #ff6b6b; }
        .result-badge { display: inline-flex; align-items: center; gap: 8px; background: #e9f3df; color: #2f4b1e; padding: 8px 12px; border-radius: 10px; font-weight: 600; font-size: 13px; margin: 12px 0 8px 0; }
        .result-desc { color: #555; font-size: 14px; line-height: 1.7; }
        .result-status { display: flex; align-items: center; gap: 8px; margin: 12px 0; }
        .result-status-text { font-weight: 600; color: #2f4b1e; font-size: 16px; }

        .fitplan-cta { margin-top: 22px; background: #b4d678; color: #23410f; border: none; padding: 16px 22px; width: 100%; border-radius: 14px; font-weight: 700; font-size: 16px; cursor: pointer; }
        .fitplan-cta:hover { filter: brightness(.96); }

        @media (max-width: 980px) {
            .bmi-card { grid-template-columns: 1fr; }
            .bmi-illustration { order: -1; }
        }

        @media (max-width: 720px) {
            .bmi-form { grid-template-columns: 1fr; }
            .bmi-title { font-size: 24px; }
            .result-card { grid-template-columns: 1fr; }
        }
    </style>
@endsection

@section('content')
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
            <div>
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

                <div class="bmi-form">
                    <div>
                        <div class="bmi-label">Berat Badan</div>
                        <div class="bmi-field">
                            <input id="weightInput" type="number" min="1" step="0.1" placeholder="Masukkan berat badan">
                            <span>(kg)</span>
                        </div>
                    </div>
                    <div>
                        <div class="bmi-label">Tinggi Badan</div>
                        <div class="bmi-field">
                            <input id="heightInput" type="number" min="1" step="0.1" placeholder="Masukkan tinggi badan">
                            <span>(cm)</span>
                        </div>
                    </div>
                    <div>
                        <div class="bmi-label">Usia</div>
                        <div class="bmi-field">
                            <input id="ageInput" type="number" min="1" step="1" placeholder="Masukkan usia">
                            <span>(tahun)</span>
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
            </div>
            <div class="bmi-illustration">
                <img src="{{ asset('img/ilustrasibmi.png') }}" alt="Ilustrasi BMI" style="max-width: 280px;">
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
                <div class="result-status" id="bmiStatus">
                    <span class="result-status-text" id="bmiStatusText">Berat Sehat</span>
                    <i class="fa-solid fa-circle-check" style="color:#6c8c35;"></i>
                </div>
                <div class="result-desc" id="bmiAdvice">Anda berada dalam kisaran berat badan yang dianggap ideal untuk kesehatan. Pertahankan pola makan bergizi seimbang, olahraga teratur, dan cukup tidur agar kesehatan tetap optimal.</div>
            </div>
            <div>
                <img src="{{ asset('img/ilustrasiobesitas.png') }}" alt="Dekorasi" style="width: 220px; height: auto;">
            </div>
        </div>

        <button class="fitplan-cta" onclick="window.location.href='{{ url('/fitplan') }}'">Coba FitPlan untuk menjaga berat sehat Anda</button>
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
                return (Math.round(n * 10) / 10).toLocaleString('id-ID', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
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
                        return 'BMI Anda berada di bawah normal. Pertimbangkan peningkatan asupan kalori bergizi dan konsultasikan dengan tenaga kesehatan.';
                    case 'normal':
                        return 'Anda berada dalam kisaran berat badan ideal. Pertahankan pola makan seimbang, olahraga teratur, dan cukup istirahat.';
                    case 'over':
                        return 'BMI Anda berada di kisaran kelebihan berat badan. Coba atur pola makan dan tingkatkan aktivitas fisik secara bertahap.';
                    default:
                        return 'BMI Anda berada pada kisaran obesitas. Konsultasikan rencana penurunan berat badan dengan profesional kesehatan.';
                }
            }

            function categoryLabel(category) {
                return { under: 'Berat Kurang', normal: 'Berat Sehat', over: 'Kelebihan Berat', obese: 'Obesitas' }[category];
            }

            function indicatorLeft(bmi) {
                // Map BMI 14..40 roughly across the 0..100% scale
                const min = 14, max = 40; // clamp bounds
                const clamped = Math.max(min, Math.min(max, bmi));
                return ((clamped - min) / (max - min)) * 100;
            }

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
                }

                const h = hCm / 100;
                const bmi = w / (h * h);
                const cat = bmiCategory(bmi);

                document.getElementById('bmiValue').textContent = formatNumber(bmi);
                document.getElementById('resultCard').style.display = 'grid';
                document.getElementById('scaleIndicator').style.left = indicatorLeft(bmi) + '%';
                document.getElementById('bmiStatusText').textContent = categoryLabel(cat);
                document.getElementById('bmiAdvice').textContent = adviceFor(cat);
            });
        })();
    </script>
@endsection


