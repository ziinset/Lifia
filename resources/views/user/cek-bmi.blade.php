{{-- resources/views/bmi-calculator.blade.php --}}
@extends('layouts.app')

@section('title', 'Kalkulator BMI - Cek Indeks Massa Tubuh Anda')

@section('content')
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f5f7fa;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    .bmi-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .bmi-header {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
        padding: 0 10px;
    }

    .bmi-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #90c695, #6ba76f);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        color: white;
        font-size: 28px;
        box-shadow: 0 8px 25px rgba(107, 167, 111, 0.3);
    }

    .bmi-title h1 {
        font-size: 32px;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
        letter-spacing: -0.5px;
    }

    .bmi-subtitle {
        color: #718096;
        font-size: 16px;
        margin: 5px 0 0 0;
        font-weight: 500;
    }

    .bmi-description {
        background: white;
        padding: 25px;
        border-radius: 16px;
        margin-bottom: 30px;
        color: #4a5568;
        line-height: 1.7;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid #e2e8f0;
    }

    .calculator-form {
        background: linear-gradient(135deg, #90c695 0%, #a8d5a8 50%, #b8e6b8 100%);
        border-radius: 24px;
        padding: 40px;
        margin-bottom: 30px;
        box-shadow: 0 12px 40px rgba(144, 198, 149, 0.25);
        position: relative;
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 40px;
        align-items: center;
    }

    @media (max-width: 992px) {
        .calculator-form {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }

    .calculator-form::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(135deg, #90c695, #6ba76f);
        border-radius: 26px;
        z-index: -1;
        opacity: 0.7;
    }

    .form-section-title {
        color: #2d3748;
        margin-bottom: 25px;
        font-size: 22px;
        font-weight: 700;
        text-align: left;
    }

    .gender-options {
        display: flex;
        gap: 30px;
        margin-bottom: 35px;
        justify-content: center;
    }

    .gender-option {
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 15px;
        border-radius: 16px;
    }

    .gender-option:hover {
        transform: translateY(-2px);
    }

    .gender-circle {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .gender-circle img {
        width: 50px;
        height: 50px;
        object-fit: contain;
    }

    .gender-option.male .gender-circle {
        background: linear-gradient(135deg, #60a5fa, #3b82f6);
    }

    .gender-option.female .gender-circle {
        background: linear-gradient(135deg, #f472b6, #ec4899);
    }

    .gender-option input[type="radio"] {
        display: none;
    }

    .gender-option input[type="radio"]:checked + .gender-circle {
        transform: scale(1.1);
        box-shadow: 0 12px 35px rgba(0,0,0,0.2);
    }

    .gender-option input[type="radio"]:checked ~ .gender-label {
        color: #2d3748;
        font-weight: 700;
    }

    .gender-label {
        font-weight: 600;
        color: #4a5568;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .input-row {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 25px;
        margin-bottom: 35px;
    }

    @media (max-width: 768px) {
        .input-row {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .gender-options {
            gap: 20px;
        }
    }

    .input-group {
        position: relative;
    }

    .input-group label {
        display: block;
        margin-bottom: 10px;
        color: #2d3748;
        font-weight: 600;
        font-size: 16px;
    }

    .input-field {
        width: 100%;
        padding: 18px 20px;
        border: none;
        border-radius: 16px;
        font-size: 16px;
        background: white;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        font-weight: 500;
        border: 2px solid transparent;
    }

    .input-field:focus {
        outline: none;
        box-shadow: 0 8px 25px rgba(144, 198, 149, 0.3);
        transform: translateY(-2px);
        border-color: #90c695;
    }

    .input-field::placeholder {
        color: #a0aec0;
        font-weight: 400;
    }

    .calculate-btn {
        width: 100%;
        padding: 18px;
        background: linear-gradient(135deg, #38a169, #2f855a);
        color: white;
        border: none;
        border-radius: 16px;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(56, 161, 105, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .calculate-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(56, 161, 105, 0.5);
        background: linear-gradient(135deg, #2f855a, #276749);
    }

    .calculate-btn:active {
        transform: translateY(-1px);
    }

    .result-section {
        background: white;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 12px 40px rgba(0,0,0,0.1);
        display: none;
        border: 1px solid #e2e8f0;
    }

    .result-section.show {
        display: block;
        animation: fadeInUp 0.6s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .result-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .result-header h2 {
        color: #2d3748;
        font-size: 28px;
        margin-bottom: 15px;
        font-weight: 700;
    }

    .bmi-value {
        font-size: 56px;
        font-weight: 800;
        color: #2d3748;
        margin: 15px 0;
        letter-spacing: -2px;
    }

    .bmi-scale {
        height: 12px;
        background: linear-gradient(to right, #3b82f6, #10b981, #f59e0b, #ef4444);
        border-radius: 20px;
        margin: 25px 0;
        position: relative;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .bmi-indicator {
        position: absolute;
        top: -8px;
        width: 28px;
        height: 28px;
        background: white;
        border: 4px solid #2d3748;
        border-radius: 50%;
        transform: translateX(-50%);
        transition: all 0.6s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    .bmi-category {
        text-align: center;
        padding: 20px;
        border-radius: 16px;
        margin: 25px 0;
        font-weight: 700;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .bmi-category.underweight {
        background: linear-gradient(135deg, #dbeafe, #bfdbfe);
        color: #1e40af;
        border: 2px solid #93c5fd;
    }

    .bmi-category.normal {
        background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        color: #065f46;
        border: 2px solid #6ee7b7;
    }

    .bmi-category.overweight {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        color: #92400e;
        border: 2px solid #fbbf24;
    }

    .bmi-category.obese {
        background: linear-gradient(135deg, #fee2e2, #fecaca);
        color: #991b1b;
        border: 2px solid #f87171;
    }

    .bmi-advice {
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        padding: 25px;
        border-radius: 16px;
        margin-top: 25px;
        border: 1px solid #e2e8f0;
    }

    .bmi-advice h4 {
        color: #2d3748;
        margin-bottom: 12px;
        font-weight: 700;
        font-size: 18px;
    }

    .bmi-advice p {
        color: #4a5568;
        line-height: 1.7;
        margin: 0;
        font-weight: 500;
    }

    .character-illustration {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px 0;
    }

    .character-img {
        width: 180px;
        height: 180px;
        margin: 0 auto;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 80px;
        box-shadow: 0 12px 35px rgba(0,0,0,0.1);
        background: linear-gradient(135deg, #f0f9ff, #dbeafe);
        border: 4px solid white;
    }

    .try-fitplan {
        background: linear-gradient(135deg, #38a169, #2f855a);
        color: white;
        padding: 30px;
        border-radius: 20px;
        text-align: center;
        margin-top: 35px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: block;
        box-shadow: 0 12px 35px rgba(56, 161, 105, 0.3);
        border: 2px solid transparent;
    }

    .try-fitplan:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 45px rgba(56, 161, 105, 0.4);
        color: white;
        text-decoration: none;
        border-color: rgba(255,255,255,0.2);
    }

    .try-fitplan h3 {
        margin: 0 0 8px 0;
        font-size: 22px;
        font-weight: 700;
    }

    .try-fitplan p {
        margin: 0;
        opacity: 0.95;
        font-weight: 500;
        font-size: 16px;
    }

    .form-illustration {
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0.8;
    }

    @media (max-width: 992px) {
        .form-illustration {
            display: none;
        }
    }

    .form-wrapper {
        flex: 1;
    }

    .result-grid {
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 40px;
        align-items: start;
    }

    @media (max-width: 768px) {
        .result-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
    }

    .result-content {
        flex: 1;
    }

    .character-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }
</style>

<div class="bmi-container">
    <!-- Header Section -->
    <div class="bmi-header">
        <div class="bmi-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L12 12M12 12L22 12M12 12L12 22M12 12L2 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <circle cx="12" cy="12" r="3" fill="currentColor"/>
            </svg>
        </div>
        <div class="bmi-title">
            <h1>Kalkulator BMI</h1>
            <p class="bmi-subtitle">Cek Indeks Massa Tubuh Anda</p>
        </div>
    </div>

    <!-- Description -->
    <div class="bmi-description">
        Gunakan kalkulator ini untuk menghitung Indeks Massa Tubuh (BMI) Anda. BMI membantu memperkirakan apakah berat badan Anda berada pada kisaran sehat berdasarkan tinggi badan. Hasil hanya indikati untuk penilaian yang lebih lengkap, konsultasikan ke tenaga kesehatan.
    </div>

    <!-- Calculator Form -->
    <div class="calculator-form">
        <div class="form-wrapper">
            <h3 class="form-section-title">Jenis Kelamin</h3>
            <form id="bmiForm">
                <div class="gender-options">
                    <label class="gender-option male">
                        <input type="radio" name="gender" value="male" required>
                        <div class="gender-circle">
                            <img src="{{ asset('img/pria.png') }}" alt="Laki-laki" style="width: 50px; height: 50px; object-fit: contain;">
                        </div>
                        <div class="gender-label">Laki-laki</div>
                    </label>

                    <label class="gender-option female">
                        <input type="radio" name="gender" value="female" required>
                        <div class="gender-circle">
                            <img src="{{ asset('img/perempuan.png') }}" alt="Perempuan" style="width: 50px; height: 50px; object-fit: contain;">
                        </div>
                        <div class="gender-label">Perempuan</div>
                    </label>
                </div>

                <div class="input-row">
                    <div class="input-group">
                        <label for="weight">Berat Badan</label>
                        <input type="number" id="weight" class="input-field" placeholder="(kg)" step="0.1" min="1" max="500" required>
                    </div>

                    <div class="input-group">
                        <label for="height">Tinggi Badan</label>
                        <input type="number" id="height" class="input-field" placeholder="(cm)" step="0.1" min="50" max="300" required>
                    </div>

                    <div class="input-group">
                        <label for="age">Usia</label>
                        <input type="number" id="age" class="input-field" placeholder="(tahun)" min="1" max="150" required>
                    </div>
                </div>

                <button type="submit" class="calculate-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="4" width="16" height="16" rx="2" stroke="currentColor" stroke-width="2"/>
                        <rect x="9" y="9" width="6" height="6" stroke="currentColor" stroke-width="2"/>
                    </svg>
                    Hitung
                </button>
            </form>
        </div>

        <!-- Right side illustration -->
        <div class="form-illustration">
            <svg width="220" height="220" viewBox="0 0 220 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="110" cy="110" r="105" fill="#E8F5E8" opacity="0.6"/>
                <circle cx="130" cy="90" r="35" fill="#B8E6B8" opacity="0.7"/>
                <circle cx="90" cy="130" r="25" fill="#90C695" opacity="0.8"/>
                <circle cx="150" cy="150" r="18" fill="#6BA76F"/>
                <!-- Character illustration -->
                <circle cx="110" cy="80" r="15" fill="#FFC107"/>
                <ellipse cx="110" cy="120" rx="25" ry="40" fill="#FF9800"/>
                <circle cx="95" cy="160" r="8" fill="#795548"/>
                <circle cx="125" cy="160" r="8" fill="#795548"/>
            </svg>
        </div>
    </div>

    <!-- Result Section -->
    <div id="resultSection" class="result-section">
        <div class="result-grid">
            <div class="result-content">
                <div class="result-header">
                    <h2>Hasil BMI Anda</h2>
                    <div class="bmi-value" id="bmiValue">22,3</div>

                    <!-- BMI Scale -->
                    <div class="bmi-scale">
                        <div class="bmi-indicator" id="bmiIndicator"></div>
                    </div>
                </div>

                <!-- BMI Category -->
                <div id="bmiCategory" class="bmi-category normal">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    BMI Anda adalah <span id="bmiCategoryText">22,3 - Berat Sehat</span>
                </div>

                <!-- BMI Advice -->
                <div class="bmi-advice">
                    <h4 id="adviceTitle">Anda berada dalam kisaran berat badan yang dianggap ideal untuk kesehatan.</h4>
                    <p id="adviceText">Pertahankan pola makan bergizi seimbang, olahraga teratur, dan cukup tidur agar kesehatan tetap optimal.</p>
                </div>
            </div>

            <!-- Character Illustration -->
            <div class="character-section">
                <div class="character-illustration">
                    <div class="character-img" id="characterImg">
                        <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="30" r="15" fill="#FFC107"/>
                            <ellipse cx="50" cy="60" rx="20" ry="30" fill="#FF9800"/>
                            <circle cx="40" cy="85" r="6" fill="#795548"/>
                            <circle cx="60" cy="85" r="6" fill="#795548"/>
                            <circle cx="45" cy="28" r="2" fill="#333"/>
                            <circle cx="55" cy="28" r="2" fill="#333"/>
                            <path d="M45 35 Q50 40 55 35" stroke="#333" stroke-width="2" fill="none"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- FitPlan CTA -->
        <a href="#" class="try-fitplan">
            <h3>Coba FitPlan untuk menjaga berat sehat Anda</h3>
            <p>Dapatkan rencana diet dan olahraga yang disesuaikan dengan kebutuhan Anda</p>
        </a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('bmiForm');
    const resultSection = document.getElementById('resultSection');
    const bmiValue = document.getElementById('bmiValue');
    const bmiIndicator = document.getElementById('bmiIndicator');
    const bmiCategory = document.getElementById('bmiCategory');
    const bmiCategoryText = document.getElementById('bmiCategoryText');
    const characterImg = document.getElementById('characterImg');
    const adviceTitle = document.getElementById('adviceTitle');
    const adviceText = document.getElementById('adviceText');

    // Gender selection animation
    const genderOptions = document.querySelectorAll('.gender-option');
    genderOptions.forEach(option => {
        option.addEventListener('click', function() {
            genderOptions.forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const weight = parseFloat(document.getElementById('weight').value);
        const height = parseFloat(document.getElementById('height').value) / 100; // Convert cm to m
        const age = parseInt(document.getElementById('age').value);
        const gender = document.querySelector('input[name="gender"]:checked').value;

        if (!weight || !height || !age) {
            alert('Mohon isi semua field yang diperlukan');
            return;
        }

        // Calculate BMI
        const bmi = weight / (height * height);
        const bmiRounded = Math.round(bmi * 10) / 10;

        // Update BMI value
        bmiValue.textContent = bmiRounded.toString().replace('.', ',');

        // Determine category and update UI
        let category, categoryText, categoryClass, advice, adviceDesc, character, indicatorPosition;

        if (bmi < 18.5) {
            category = 'Berat Badan Kurang';
            categoryText = `${bmiRounded.toString().replace('.', ',')} - Berat Badan Kurang`;
            categoryClass = 'underweight';
            advice = 'Berat badan Anda kurang dari ideal.';
            adviceDesc = 'Konsultasikan dengan dokter atau ahli gizi untuk meningkatkan berat badan secara sehat dengan pola makan bergizi.';
            character = `
                <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="30" r="15" fill="#64B5F6"/>
                    <ellipse cx="50" cy="60" rx="18" ry="28" fill="#81C784"/>
                    <circle cx="40" cy="85" r="6" fill="#795548"/>
                    <circle cx="60" cy="85" r="6" fill="#795548"/>
                    <circle cx="45" cy="28" r="2" fill="#333"/>
                    <circle cx="55" cy="28" r="2" fill="#333"/>
                    <path d="M45 35 Q50 30 55 35" stroke="#333" stroke-width="2" fill="none"/>
                </svg>`;
            indicatorPosition = (bmi / 18.5) * 25; // 0-25% of scale
        } else if (bmi < 25) {
            category = 'Berat Sehat';
            categoryText = `${bmiRounded.toString().replace('.', ',')} - Berat Sehat`;
            categoryClass = 'normal';
            advice = 'Anda berada dalam kisaran berat badan yang dianggap ideal untuk kesehatan.';
            adviceDesc = 'Pertahankan pola makan bergizi seimbang, olahraga teratur, dan cukup tidur agar kesehatan tetap optimal.';
            character = `
                <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="30" r="15" fill="#FFC107"/>
                    <ellipse cx="50" cy="60" rx="20" ry="30" fill="#4CAF50"/>
                    <circle cx="40" cy="85" r="6" fill="#795548"/>
                    <circle cx="60" cy="85" r="6" fill="#795548"/>
                    <circle cx="45" cy="28" r="2" fill="#333"/>
                    <circle cx="55" cy="28" r="2" fill="#333"/>
                    <path d="M45 35 Q50 40 55 35" stroke="#333" stroke-width="2" fill="none"/>
                </svg>`;
            indicatorPosition = 25 + ((bmi - 18.5) / (25 - 18.5)) * 25; // 25-50% of scale
        } else if (bmi < 30) {
            category = 'Berat Badan Berlebih';
            categoryText = `${bmiRounded.toString().replace('.', ',')} - Berat Badan Berlebih`;
            categoryClass = 'overweight';
            advice = 'Berat badan Anda sedikit berlebih dari kisaran ideal.';
            adviceDesc = 'Pertimbangkan untuk menurunkan berat badan dengan pola makan sehat dan olahraga teratur. Konsultasi dengan ahli gizi direkomendasikan.';
            character = `
                <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="30" r="15" fill="#FF9800"/>
                    <ellipse cx="50" cy="60" rx="22" ry="32" fill="#FFB74D"/>
                    <circle cx="40" cy="85" r="6" fill="#795548"/>
                    <circle cx="60" cy="85" r="6" fill="#795548"/>
                    <circle cx="45" cy="28" r="2" fill="#333"/>
                    <circle cx="55" cy="28" r="2" fill="#333"/>
                    <line x1="45" y1="35" x2="55" y2="35" stroke="#333" stroke-width="2"/>
                </svg>`;
            indicatorPosition = 50 + ((bmi - 25) / (30 - 25)) * 25; // 50-75% of scale
        } else {
            category = 'Obesitas';
            categoryText = `${bmiRounded.toString().replace('.', ',')} - Obesitas`;
            categoryClass = 'obese';
            advice = 'Berat badan Anda berada dalam kategori obesitas.';
            adviceDesc = 'Sangat disarankan untuk berkonsultasi dengan dokter atau ahli gizi untuk program penurunan berat badan yang aman dan efektif.';
            character = `
                <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="30" r="15" fill="#F44336"/>
                    <ellipse cx="50" cy="60" rx="25" ry="35" fill="#E57373"/>
                    <circle cx="40" cy="85" r="6" fill="#795548"/>
                    <circle cx="60" cy="85" r="6" fill="#795548"/>
                    <circle cx="45" cy="28" r="2" fill="#333"/>
                    <circle cx="55" cy="28" r="2" fill="#333"/>
                    <path d="M45 38 Q50 33 55 38" stroke="#333" stroke-width="2" fill="none"/>
                </svg>`;
            indicatorPosition = 75 + Math.min(((bmi - 30) / 10) * 25, 25); // 75-100% of scale
        }

        // Update result UI
        bmiCategory.className = `bmi-category ${categoryClass}`;
        bmiCategoryText.textContent = categoryText;
        characterImg.innerHTML = character;
        adviceTitle.textContent = advice;
        adviceText.textContent = adviceDesc;

        // Update BMI indicator position
        bmiIndicator.style.left = `${Math.min(Math.max(indicatorPosition, 0), 100)}%`;

        // Show result section
        resultSection.classList.add('show');

        // Scroll to result
        resultSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
});
</script>

@endsection