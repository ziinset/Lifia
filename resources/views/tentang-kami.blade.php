<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Lifia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }

        .diagonal-bg {
            background: linear-gradient(135deg, #F5F5F0 0%, #E8E8E0 50%, #8B7355 100%);
            position: relative;
            overflow: hidden;
        }

        .diagonal-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, transparent 0%, transparent 45%, rgba(139, 115, 85, 0.8) 100%);
            z-index: 1;
        }

        .content-wrapper {
            position: relative;
            z-index: 2;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: #8FBC8F;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }

        .logo-pattern {
            width: 30px;
            height: 30px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23ffffff'%3E%3Cpath d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z'/%3E%3C/svg%3E") no-repeat center;
            background-size: contain;
        }

        .nav-button {
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .nav-button.active {
            background: rgba(139, 115, 85, 0.1);
            border-color: rgba(139, 115, 85, 0.2);
        }

        .nav-button:hover {
            background: rgba(139, 115, 85, 0.1);
            transform: translateY(-1px);
        }

        .nav-button.login {
            background: #8FBC8F;
            color: white;
        }

        .nav-button.login:hover {
            background: #7AA67A;
            color: white;
        }

        .hero-title {
            font-weight: 800;
            font-size: 3.5rem;
            line-height: 1.1;
            color: #3D2914;
        }

        .hero-subtitle {
            color: #8FBC8F;
        }

        .hero-description {
            color: #6B5B47;
            font-size: 1.1rem;
            line-height: 1.7;
            max-width: 500px;
        }

        .tag-button {
            display: inline-block;
            background: rgba(255, 255, 255, 0.9);
            color: #6B5B47;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            margin: 4px;
            transition: all 0.3s ease;
            border: 1px solid rgba(139, 115, 85, 0.2);
        }

        .tag-button:hover {
            background: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .hero-image {
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .hero-image:hover {
            transform: scale(1.02);
        }

        .stats-card {
            background: rgba(143, 188, 143, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 24px;
            color: white;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 8px;
            display: block;
        }

        .stats-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .stats-label {
            font-size: 0.9rem;
            opacity: 0.9;
            font-weight: 500;
        }

        .animate-fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .green-line {
            width: 4px;
            height: 100px;
            background: linear-gradient(180deg, #8FBC8F, #7AA67A);
            border-radius: 2px;
            margin-right: 24px;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .stats-card {
                margin-bottom: 16px;
            }
            
            .green-line {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-gray-50 px-4 py-4 relative z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="logo-icon">
                    <div class="logo-pattern"></div>
                </div>
                <span class="text-2xl font-bold text-gray-800">LIFIA</span>
            </div>
            
            <!-- Navigation Menu -->
            <div class="hidden md:flex items-center space-x-2">
                <a href="{{ route('home') }}" class="nav-button text-gray-600 hover:text-gray-800">
                    Beranda
                </a>
                <div class="relative group">
                    <button class="nav-button text-gray-600 hover:text-gray-800 flex items-center">
                        Artikel
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <a href="{{ route('cek-sehat') }}" class="nav-button text-gray-600 hover:text-gray-800">
                    Cek Sehat
                </a>
                <a href="{{ route('tentang-kami') }}" class="nav-button active text-gray-800">
                    Tentang Kami
                </a>
                <a href="{{ route('fitplan') }}" class="nav-button text-gray-600 hover:text-gray-800">
                    FitPlan
                </a>
                <a href="{{ route('login') }}" class="nav-button login">
                    Login
                </a>
            </div>
            
            <!-- Mobile Menu Button -->
            <button class="md:hidden text-gray-800 p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="diagonal-bg min-h-screen py-16">
        <div class="content-wrapper max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="space-y-8">
                    <div>
                        <h1 class="hero-title mb-4">
                            Gaya Hidup <span class="hero-subtitle">Sehat & Seimbang</span><br>
                            untuk Masa Depan Lebih Baik
                        </h1>
                        
                        <div class="flex items-start mb-8">
                            <div class="green-line"></div>
                            <p class="hero-description">
                                Kami hadir untuk menginspirasi dan memandumu menjalani hidup yang lebih sehat secara fisik, mental, dan emosional demi masa depan yang lebih berkualitas.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Tags -->
                    <div class="flex flex-wrap">
                        <span class="tag-button">Pola Makan Sehat</span>
                        <span class="tag-button">Olahraga & Aktivitas Fisik</span>
                        <span class="tag-button">Kesehatan Mental</span>
                        <span class="tag-button">Perawatan Diri</span>
                        <span class="tag-button">Cek BMI</span>
                    </div>
                    
                    <!-- Hero Image -->
                    <div class="lg:hidden mt-12">
                        <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                             alt="Happy people celebrating healthy lifestyle" 
                             class="hero-image w-full h-80 object-cover">
                    </div>
                </div>
                
                <!-- Right Content -->
                <div class="space-y-8">
                    <!-- Hero Image for Desktop -->
                    <div class="hidden lg:block">
                        <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                             alt="Happy people celebrating healthy lifestyle" 
                             class="hero-image w-full h-96 object-cover">
                    </div>
                    
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Stats Card 1 -->
                        <div class="stats-card">
                            <div class="stats-icon">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <span class="stats-number">2.500+</span>
                            <div class="stats-label">
                                Pembaca<br>
                                Setiap Bulan
                            </div>
                        </div>
                        
                        <!-- Stats Card 2 -->
                        <div class="stats-card">
                            <div class="stats-icon">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <span class="stats-number">1.800+</span>
                            <div class="stats-label">
                                Pengguna<br>
                                Mengakses<br>
                                Kalkulator BMI
                            </div>
                        </div>
                        
                        <!-- Stats Card 3 -->
                        <div class="stats-card">
                            <div class="stats-icon">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <span class="stats-number">100+</span>
                            <div class="stats-label">
                                Tips Hidup<br>
                                Seimbang
                            </div>
                        </div>
                        
                        <!-- Stats Card 4 -->
                        <div class="stats-card">
                            <div class="stats-icon">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <span class="stats-number">60+</span>
                            <div class="stats-label">
                                Artikel Self<br>
                                Care
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission Section -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Visi & Misi Kami</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Berkomitmen untuk menjadi platform terpercaya dalam mendukung gaya hidup sehat masyarakat Indonesia
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Visi -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-8 rounded-2xl">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Visi</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed text-center">
                        Menjadi platform digital terdepan yang menginspirasi dan memfasilitasi masyarakat Indonesia untuk menjalani gaya hidup sehat, seimbang, dan berkelanjutan.
                    </p>
                </div>
                
                <!-- Misi -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Misi</h3>
                    </div>
                    <ul class="text-gray-700 space-y-3">
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 mt-2 flex-shrink-0"></span>
                            Menyediakan konten edukatif berkualitas tinggi tentang kesehatan dan gaya hidup
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 mt-2 flex-shrink-0"></span>
                            Mengembangkan tools praktis untuk monitoring kesehatan personal
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 mt-2 flex-shrink-0"></span>
                            Membangun komunitas yang supportif dan saling menginspirasi
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Tim Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Didukung oleh tim profesional yang berpengalaman di bidang kesehatan dan teknologi
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-24 h-24 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Dr. Sarah Wellness</h3>
                    <p class="text-green-600 font-medium mb-2">Medical Advisor</p>
                    <p class="text-gray-600 text-sm">Dokter spesialis gizi dengan pengalaman 10+ tahun dalam konsultasi kesehatan holistik</p>
                </div>
                
                <!-- Team Member 2 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-24 h-24 bg-blue-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Ahmad Tech</h3>
                    <p class="text-blue-600 font-medium mb-2">Lead Developer</p>
                    <p class="text-gray-600 text-sm">Full-stack developer dengan fokus pada pengembangan aplikasi kesehatan digital</p>
                </div>
                
                <!-- Team Member 3 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-24 h-24 bg-purple-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Maya Content</h3>
                    <p class="text-purple-600 font-medium mb-2">Content Strategist</p>
                    <p class="text-gray-600 text-sm">Ahli komunikasi kesehatan dengan spesialisasi dalam edukasi gaya hidup sehat</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('components.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate stats on scroll
            const observerOptions = {
                threshold: 0.3,
                rootMargin: '0px 0px -100px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                        
                        // Animate number counting
                        const numberElement = entry.target.querySelector('.stats-number');
                        if (numberElement) {
                            const finalNumber = numberElement.textContent;
                            const number = parseInt(finalNumber.replace(/\D/g, ''));
                            const suffix = finalNumber.replace(/[\d,]/g, '');
                            
                            let currentNumber = 0;
                            const increment = number / 50;
                            const timer = setInterval(() => {
                                currentNumber += increment;
                                if (currentNumber >= number) {
                                    numberElement.textContent = number.toLocaleString() + suffix;
                                    clearInterval(timer);
                                } else {
                                    numberElement.textContent = Math.floor(currentNumber).toLocaleString() + suffix;
                                }
                            }, 30);
                        }
                    }
                });
            }, observerOptions);
            
            // Observe all stats cards
            document.querySelectorAll('.stats-card').forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</body>
</html>