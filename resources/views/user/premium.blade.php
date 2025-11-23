<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium - Lifia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
            overflow-x: hidden;
        }

        /* Enhanced Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(80px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.85);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
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

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
        }

        @keyframes slideInFromLeft {
            from {
                opacity: 0;
                transform: translateX(-60px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                opacity: 1;
                transform: scale(1.1);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .premium-container {
            display: flex;
            height: 100vh;
            background-color: #f9fafb;
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

        .main-content {
            padding: 1.5rem;
            animation: fadeInUp 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Welcome Header */
        .welcome-header {
            margin-bottom: 1.5rem;
        }

        .welcome-title {
            font-size: 2rem;
            font-weight: 600;
            color: #4E342E;
            margin-bottom: 0.5rem;
            font-family: 'Poppins', sans-serif;
            animation: slideInFromLeft 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.3s both;
        }

        .premium-subtitle {
            font-size: 1.125rem;
            color: #8BA066;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            margin-bottom: 2rem;
            animation: slideInFromLeft 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.5s both;
        }

        /* Premium Card */
        .premium-card {
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            animation: scaleIn 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.7s both;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .premium-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        }

        .premium-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.8s ease;
        }

        .premium-card:hover::before {
            left: 100%;
        }

        .premium-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .premium-info h2 {
            font-size: 1.75rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            color: #4E342E;
            margin-bottom: 0.5rem;
        }

        .premium-date {
            font-size: 1.5rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            color: #8BA066;
            margin-bottom: 0.5rem;
        }

        .premium-description {
            font-size: 1.125rem;
            color: #6b7280;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            margin-bottom: 1.5rem;
        }

        .premium-btn {
            background: linear-gradient(135deg, #B4D678 0%, #A3BE74 100%);
            color: white;
            border: none;
            padding: 0.875rem 3rem;
            border-radius: 2rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 4px 15px rgba(180, 214, 120, 0.3);
            min-width: 200px;
            position: relative;
            overflow: hidden;
            animation: bounceIn 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) 1.2s both;
        }

        .premium-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.6s ease;
        }

        .premium-btn:hover::before {
            left: 100%;
        }

        .premium-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 30px rgba(180, 214, 120, 0.5);
            background: linear-gradient(135deg, #A3BE74 0%, #99AD75 100%);
        }

        .premium-btn:active {
            transform: translateY(0) scale(0.98);
        }

        .premium-illustration {
            width: 220px;
            height: 220px;
            flex-shrink: 0;
            margin-left: -30px;
        }

        .premium-illustration img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .premium-card:hover .premium-illustration img {
            transform: scale(1.1);
        }

        /* Feature Cards */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .feature-card {
            background: white;
            border-radius: 1.25rem;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
            cursor: pointer;
            min-height: 200px;
            display: flex;
            flex-direction: column;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.7s ease;
            z-index: 1;
        }

        .feature-card:hover::before {
            left: 100%;
        }

        .feature-card:hover {
            transform: translateY(-12px) scale(1.03);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .feature-card:nth-child(1) {
            animation-delay: 1s;
        }

        .feature-card:nth-child(2) {
            animation-delay: 1.2s;
        }

        .feature-card:nth-child(3) {
            animation-delay: 1.4s;
        }

        /* Workout Plan Card */
        .feature-card.workout {
            background: linear-gradient(135deg, rgba(139, 119, 95, 0.9) 0%, rgba(120, 103, 83, 0.9) 100%);
            color: white;
        }

        /* Diet Plan Card */
        .feature-card.diet {
            background: linear-gradient(135deg, rgba(180, 214, 120, 0.9) 0%, rgba(163, 190, 116, 0.9) 100%);
            color: white;
        }

        /* Progress Card */
        .feature-card.progress {
            background: linear-gradient(135deg, rgba(239, 227, 131, 0.9) 0%, rgba(230, 216, 74, 0.9) 100%);
            color: #4E342E;
        }

        .feature-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            flex-shrink: 0;
            transition: all 0.3s ease;
            animation: bounceIn 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1);
            background: rgba(255, 255, 255, 0.3);
        }

        .feature-icon img {
            width: 24px;
            height: 24px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .feature-card:hover .feature-icon img {
            transform: scale(1.1);
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-title {
            transform: translateX(5px);
        }

        .feature-description {
            font-size: 1rem;
            opacity: 0.9;
            line-height: 1.5;
            margin-right: 100px;
            padding-bottom: 20px;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-description {
            opacity: 1;
            transform: translateX(3px);
        }

        /* Extra margin for middle card (Diet Plan) */
        .feature-card.diet .feature-description {
            margin-right: 120px;
        }

        /* Updated Feature Illustration Styles */
        .feature-illustration {
            position: absolute;
            right: -20px;
            bottom: -20px;
            width: 180px;
            height: 180px;
            opacity: 0.85;
            z-index: 1;
            animation: float 8s ease-in-out infinite;
        }

        .feature-illustration img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1));
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .feature-card:hover .feature-illustration img {
            transform: scale(1.1);
            filter: drop-shadow(0 8px 16px rgba(0,0,0,0.2));
        }

        /* Make sure content stays above illustration */
        .feature-card .feature-header,
        .feature-card .feature-description {
            position: relative;
            z-index: 2;
        }

        .feature-header .feature-icon {
            flex-shrink: 0;
        }

        /* Staggered icon animations */
        .feature-card:nth-child(1) .feature-icon {
            animation-delay: 1.3s;
        }

        .feature-card:nth-child(2) .feature-icon {
            animation-delay: 1.5s;
        }

        .feature-card:nth-child(3) .feature-icon {
            animation-delay: 1.7s;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .main { margin-left: 14rem; }
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .feature-illustration {
                width: 160px;
                height: 160px;
                right: -15px;
                bottom: -15px;
            }
        }

        @media (max-width: 768px) {
            .main { margin-left: 0; }
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .premium-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 1rem;
            }
            
            .premium-illustration {
                width: 180px;
                height: 180px;
                margin-left: -20px;
            }
            
            .feature-illustration {
                width: 140px;
                height: 140px;
                right: -10px;
                bottom: -10px;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 1rem;
            }
            
            .premium-card {
                padding: 1.5rem;
            }
            
            .feature-illustration {
                width: 120px;
                height: 120px;
                right: -5px;
                bottom: -5px;
            }
        }
    </style>
</head>
<body>

<div class="premium-container">
    <!-- Include Sidebar Component -->
    @include('components.sidebar')

    <!-- Main Content -->
    <main class="main">
        <!-- Include Header Component -->
        @include('components.header')
        
        <div class="main-content">
            <!-- Welcome Header -->
            <div class="welcome-header">
                <h1 class="welcome-title">Halo, {{ Auth::user()->nama_lengkap ?? 'User' }}!</h1>
                <p class="premium-subtitle">Premium Anda Aktif 🎉</p>
                
                <!-- Premium Status Card -->
                <div class="premium-card">
                    <div class="premium-header">
                        <div class="premium-info">
                            <h2>Premium Anda aktif hingga</h2>
                            <div class="premium-date">19 September 2025</div>
                            <p class="premium-description">Nikmati akses penuh ke FitPlan & Progres Kesehatan</p>
                            <button class="premium-btn">Perpanjang Premium</button>
                        </div>
                        <div class="premium-illustration">
                            <img src="image/Rectangle 383.png" alt="Premium Character" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="features-grid">
                <!-- Workout Plan Card -->
                <div class="feature-card workout">
                    <div class="feature-header">
                        <div class="feature-icon">
                            <img src="image/mdi_barbell.png" alt="Workout Icon" />
                        </div>
                        <h3 class="feature-title">Workout Plan</h3>
                    </div>
                    <p class="feature-description">Lihat jadwal latihan & mingguan.</p>
                    <div class="feature-illustration">
                        <img src="image/Rectangle 387.png" alt="Workout Illustration" />
                    </div>
                </div>
                
                <!-- Diet Plan Card -->
                <div class="feature-card diet">
                    <div class="feature-header">
                        <div class="feature-icon">
                            <img src="image/streamline-flex_salad-vegetable-diet-remix.png" alt="Diet Icon" />
                        </div>
                        <h3 class="feature-title">Diet Plan</h3>
                    </div>
                    <p class="feature-description">Cek menu makanan sehat sesuai targetmu.</p>
                    <div class="feature-illustration">
                        <img src="image/Rectangle 388.png" alt="Diet Illustration" />
                    </div>
                </div>
                
                <!-- Progress Card -->
                <div class="feature-card progress">
                    <div class="feature-header">
                        <div class="feature-icon">
                            <img src="image/mdi_barbell (1).png" alt="Progress Icon" />
                        </div>
                        <h3 class="feature-title">Progress</h3>
                    </div>
                    <p class="feature-description">Pantau pencapaian targetmu</p>
                    <div class="feature-illustration">
                        <img src="image/Rectangle 389.png" alt="Progress Illustration" />
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Premium button interaction
        const premiumBtn = document.querySelector('.premium-btn');
        if (premiumBtn) {
            premiumBtn.addEventListener('click', function() {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check"></i> Berhasil Diperpanjang';
                this.style.background = 'linear-gradient(135deg, #99AD75 0%, #8BA066 100%)';
                this.style.cursor = 'default';
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.style.background = 'linear-gradient(135deg, #B4D678 0%, #A3BE74 100%)';
                    this.style.cursor = 'pointer';
                }, 3000);
            });
        }

        // Feature cards hover effects
        const featureCards = document.querySelectorAll('.feature-card');
        featureCards.forEach(card => {
            card.addEventListener('click', function() {
                // Add click animation
                this.style.transform = 'translateY(-8px) scale(0.98)';
                setTimeout(() => {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                }, 150);
            });
        });
    });
</script>

</body>
</html>