<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Latihan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            overflow-x: hidden;
        }

        .profil-container {
            display: flex;
            height: 100vh;
        }
        
        /* Main Content - Same spacing as dashboard */
        .main {
            flex: 1;
            margin-left: 16rem;
            padding: 0;
            overflow-y: auto;
            background: #FCFAF6;
            position: relative;
            height: 100vh;
        }

        /* Content Area */
        .content {
            padding: 1.5rem;
            flex: 1;
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-header {
            text-align: center;
            margin-bottom: 50px;
            opacity: 0;
            animation: slideInDown 0.8s ease-out 0.2s forwards;
        }

        .page-title {
            font-size: 32px;
            font-weight: 500;
            color: #4E342E;
            margin-bottom: 16px;
        }

        .page-subtitle {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.5;
        }

        .toggle-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 40px;
        }

        .toggle-wrapper {
            display: flex;
            background: #E8E8E8;
            border-radius: 25px;
            overflow: hidden;
        }

        .toggle-btn {
            border: none;
            padding: 12px 24px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            background: transparent;
            color: #666;
        }

        .toggle-btn.active {
            background: linear-gradient(135deg, #8BAC65 0%, #394629 100%);
            color: white;
        }

        .toggle-btn:hover:not(.active) {
            background: rgba(0, 0, 0, 0.05);
        }

        /* Keyframe Animations */
        @keyframes slideInDown {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 20px;
        }

        .pricing-card {
            background: white;
            border-radius: 20px;
            padding: 32px 24px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            transform: translateY(0);
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
            border: 2px solid transparent;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* Featured Card - White Background with Custom Colors */
        .pricing-card.featured {
            background: white !important;
            color: #556B2F !important;
            transform: scale(1.05);
            box-shadow: 0 12px 35px rgba(139, 172, 101, 0.3);
            border: 2px solid #8BAC65;
        }

        .pricing-card.featured .plan-name,
        .pricing-card.featured .plan-price,
        .pricing-card.featured .plan-period,
        .pricing-card.featured .feature-item {
            color: #556B2F !important;
            font-weight: 500 !important;
        }

        .pricing-card.featured .feature-item i {
            color: #8BAC65 !important;
        }

        /* Student Card - Permanent Border */
        .pricing-card.student {
            border: 2px solid #4E342E;
            box-shadow: 0 12px 35px rgba(78, 52, 46, 0.3);
        }

        .pricing-card:hover:not(.featured):not(.student) {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
            border-color: #B4D678;
        }

        .pricing-card.student:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 50px rgba(78, 52, 46, 0.25);
            border-color: #4E342E;
        }

        .pricing-card:nth-child(1) { animation-delay: 0.1s; }
        .pricing-card:nth-child(2) { animation-delay: 0.3s; }
        .pricing-card:nth-child(3) { animation-delay: 0.5s; }

        .plan-name {
            font-size: 24px;
            font-weight: 600;
            color: #4E342E;
            margin-bottom: 8px;
            text-align: center;
        }

        .plan-price-container {
            text-align: center;
            margin-bottom: 24px;
        }

        .plan-price {
            font-size: 16px;
            color: #666;
            margin-bottom: 4px;
            transition: all 0.3s ease;
        }

        .plan-period {
            font-size: 14px;
            color: #999;
        }

        .features-list {
            margin-bottom: 24px;
            flex-grow: 1;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            font-size: 14px;
            color: #4E342E;
            transition: all 0.3s ease;
        }

        .feature-item:last-child {
            margin-bottom: 0;
        }

        .feature-item i {
            color: #B4D678;
            font-size: 16px;
            width: 16px;
            flex-shrink: 0;
        }

        /* Student card feature icons */
        .pricing-card.student .feature-item i {
            color: #4E342E;
        }

        /* BUTTON STYLES - KONSISTEN UNTUK SEMUA CARD */
        .plan-btn {
            width: 100%;
            border: none;
            padding: 14px 20px;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            margin-top: auto;
        }

        /* Default button style untuk regular cards */
        .pricing-card:not(.featured):not(.free):not(.student) .plan-btn {
            background: linear-gradient(135deg, #B4D678 0%, #A3BE74 50%, #99AD75 100%);
            color: white;
        }

        /* Featured card button */
        .pricing-card.featured .plan-btn {
            background: #8BAC65 !important;
            color: white !important;
        }

        /* Free card button */
        .pricing-card.free .plan-btn {
            background: white;
            color: #99AD75;
        }

        /* Student card button - NEW: Base color #4E342E */
        .pricing-card.student .plan-btn {
            background: #4E342E;
            color: white;
        }

        /* HOVER EFFECTS - SAMA UNTUK SEMUA BUTTONS */
        .plan-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(180, 214, 120, 0.4);
        }

        .pricing-card.featured .plan-btn:hover {
            background: #7A9957 !important;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(139, 172, 101, 0.4);
        }

        .pricing-card.free .plan-btn:hover {
            background: #f8f8f8;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.4);
        }

        /* Student card button hover - NEW: Darker shade on hover */
        .pricing-card.student .plan-btn:hover {
            background: #3A2820 !important;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(78, 52, 46, 0.4);
        }

        .plan-btn:active {
            transform: translateY(-1px);
        }

        /* Special styling for free plan */
        .pricing-card.free {
            background: linear-gradient(135deg, #8BAC65 0%, #627947 67%, #394629 100%);
            color: white;
        }

        .pricing-card.free .plan-name,
        .pricing-card.free .plan-price,
        .pricing-card.free .plan-period,
        .pricing-card.free .feature-item {
            color: white;
        }

        .pricing-card.free .plan-name {
            font-weight: 700 !important;
        }

        .pricing-card.free .feature-item i {
            color: white;
        }

        /* Responsive Design - Same as dashboard */
        @media (max-width: 1024px) {
            .main { margin-left: 14rem; }
            .pricing-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .pricing-card.featured {
                transform: none;
                grid-column: 1 / -1;
                max-width: 400px;
                margin: 0 auto;
            }
        }

        @media (max-width: 768px) {
            .main { margin-left: 0; }
            .pricing-grid {
                grid-template-columns: 1fr;
            }
            .pricing-card.featured {
                transform: none;
                grid-column: auto;
                max-width: none;
            }
            .toggle-container {
                flex-direction: column;
                gap: 8px;
            }
            .toggle-wrapper {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="profil-container">
        <!-- Include Sidebar Component -->
        @include('components.sidebar')

        <!-- Main Content -->
        <main class="main">
            <!-- Include Header Component -->
            @include('components.header')

            <!-- Content Area -->
            <div class="content">
                <div class="page-header">
                    <h1 class="page-title">Paket Latihan yang <span style="color: #B4D678;">Fleksibel</span></h1>
                    <p class="page-subtitle">Pilih paket latihan yang sesuai dengan tujuanmu. Dapatkan panduan, latihan, dan dukungan sesuai kebutuhanmu.</p>
                    
                    <div class="toggle-container">
                        <div class="toggle-wrapper">
                            <button class="toggle-btn active" onclick="togglePricing('monthly')">Mingguan</button>
                            <button class="toggle-btn" onclick="togglePricing('yearly')">Bulanan</button>
                        </div>
                    </div>
                </div>

                <div class="pricing-grid">
                    <!-- Free Plan -->
                    <div class="pricing-card free">
                        <h2 class="plan-name">Gratis</h2>
                        <div class="plan-price-container">
                            <div class="plan-price">Rp 0 / minggu</div>
                        </div>
                        
                        <div class="features-list">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>2 rencana latihan mingguan</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Video tutorial dasar</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Pelacakan progres sederhana</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Dukungan via email</span>
                            </div>
                        </div>
                        
                        <button class="plan-btn" disabled style="background: white; color: #666; cursor: not-allowed; border: 1px solid #ddd;">
                            Sedang Aktif
                        </button>
                    </div>

                    <!-- Standard Plan -->
                    <div class="pricing-card featured">
                        <h2 class="plan-name">Standar</h2>
                        <div class="plan-price-container">
                            <div class="plan-price">Rp 20.000 / minggu</div>
                        </div>
                        
                        <div class="features-list">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Semua rencana latihan</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Video tutorial premium</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Pelacakan progres + nutrisi</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Dukungan via chat</span>
                            </div>
                        </div>
                        
                        <button class="plan-btn">
                            Mulai Sekarang
                        </button>
                    </div>

                    <!-- Student Plan -->
                    <div class="pricing-card student">
                        <h2 class="plan-name">Pelajar</h2>
                        <div class="plan-price-container">
                            <div class="plan-price">Rp 15.000 / minggu</div>
                        </div>
                        
                        <div class="features-list">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Semua fitur Standar</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Diskon khusus pelajar</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Grup komunitas pelajar</span>
                            </div>
                        </div>
                        
                        <button class="plan-btn">
                            Mulai Pelajar
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function togglePricing(period) {
            const buttons = document.querySelectorAll('.toggle-btn');
            const prices = {
                monthly: {
                    free: 'Rp 0 / minggu',
                    standard: 'Rp 20.000 / minggu',
                    student: 'Rp 15.000 / minggu'
                },
                yearly: {
                    free: 'Rp 0 / bulan',
                    standard: 'Rp 75.000 / bulan',
                    student: 'Rp 50.000 / bulan'
                }
            };

            // Update button states
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            // Update prices with animation
            const priceElements = document.querySelectorAll('.plan-price');
            priceElements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(-10px)';
                
                setTimeout(() => {
                    if (index === 0) element.textContent = prices[period].free;
                    if (index === 1) element.textContent = prices[period].standard;
                    if (index === 2) element.textContent = prices[period].student;
                    
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, 150);
            });
        }

        // Add smooth scroll behavior
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.pricing-card');
            
            cards.forEach((card, index) => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = this.classList.contains('featured') ? 
                        'scale(1.08) translateY(-8px)' : 
                        'translateY(-12px) scale(1.03)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = this.classList.contains('featured') ? 
                        'scale(1.05) translateY(0)' : 
                        'translateY(0) scale(1)';
                });
            });
        });
    </script>
</body>
</html>