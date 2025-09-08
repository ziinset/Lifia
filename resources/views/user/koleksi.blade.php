<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Favorit</title>
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
        }

        .page-title {
            font-size: 32px;
            font-weight: 500;
            color: #4E342E;
            margin-bottom: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            opacity: 0;
            animation: slideInLeft 0.8s ease-out 0.2s forwards;
        }

        /* Keyframe Animations */
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

        /* Loading skeleton effect */
        .article-card.loading {
            animation: pulse 1.5s ease-in-out infinite;
        }

        .filter-btn {
            background: linear-gradient(135deg, #B4D678 0%, #A3BE74 50%, #99AD75 100%);
            border: none;
            padding: 12px 20px;
            border-radius: 12px;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .filter-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #A3BE74 0%, #99AD75 50%, #8BA066 100%);
            transition: left 0.4s ease;
            z-index: -1;
        }

        .filter-btn:hover::before {
            left: 0;
        }

        .filter-btn:hover {
            transform: translateY(-3px) rotate(5deg);
            box-shadow: 0 10px 30px rgba(180, 214, 120, 0.3);
        }

        .filter-btn i {
            transition: transform 0.3s ease;
        }

        .filter-btn:hover i {
            transform: rotate(180deg);
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 20px;
        }

        .article-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            transform: translateY(0);
            opacity: 1;
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .article-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(180, 214, 120, 0.05) 0%, rgba(163, 190, 116, 0.05) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .article-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        }

        .article-card:hover::before {
            opacity: 1;
        }

        .article-card:nth-child(1) { animation-delay: 0.1s; }
        .article-card:nth-child(2) { animation-delay: 0.2s; }
        .article-card:nth-child(3) { animation-delay: 0.3s; }
        .article-card:nth-child(4) { animation-delay: 0.4s; }
        .article-card:nth-child(5) { animation-delay: 0.5s; }
        .article-card:nth-child(6) { animation-delay: 0.6s; }

        .article-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .article-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.6s ease;
            z-index: 1;
        }

        .article-card:hover .article-image::before {
            left: 100%;
        }

        .article-content {
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        .article-title {
            font-size: 16px;
            font-weight: 500;
            color: #4E342E;
            margin-bottom: 8px;
            line-height: 1.4;
            transition: color 0.3s ease;
        }

        .article-card:hover .article-title {
            color: #99AD75;
        }

        .article-time {
            font-size: 12px;
            color: #999;
            margin-bottom: 16px;
            transition: color 0.3s ease;
        }

        .article-card:hover .article-time {
            color: #777;
        }

        .read-btn {
            background: linear-gradient(135deg, #B4D678 0%, #A3BE74 50%, #99AD75 100%);
            border: none;
            padding: 10px 16px;
            border-radius: 10px;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            width: fit-content;
            position: relative;
            overflow: hidden;
            z-index: 2;
        }

        .read-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #A3BE74 0%, #99AD75 50%, #8BA066 100%);
            transition: left 0.4s ease;
            z-index: -1;
        }

        .read-btn:hover::before {
            left: 0;
        }

        .read-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(180, 214, 120, 0.4);
        }

        .read-btn:active {
            transform: translateY(-1px);
        }

        .read-btn i {
            font-size: 14px;
            transition: transform 0.3s ease;
        }

        .read-btn:hover i {
            transform: scale(1.2);
        }

        /* Responsive Design - Same as dashboard */
        @media (max-width: 1024px) {
            .main { margin-left: 14rem; }
            .articles-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .main { margin-left: 0; }
            .articles-grid {
                grid-template-columns: 1fr;
            }
        }

        .article-1 { background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 180"><rect width="300" height="180" fill="%23e8f4f8"/><text x="150" y="90" text-anchor="middle" dy=".3em" fill="%23666" font-family="Arial" font-size="14">Woman with phone</text></svg>'); }
        .article-2 { background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 180"><rect width="300" height="180" fill="%2385c1cc"/><text x="150" y="90" text-anchor="middle" dy=".3em" fill="%23fff" font-family="Arial" font-size="14">Pregnant woman</text></svg>'); }
        .article-3 { background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 180"><rect width="300" height="180" fill="%23f0f0f0"/><text x="150" y="90" text-anchor="middle" dy=".3em" fill="%23666" font-family="Arial" font-size="14">Woman exercising</text></svg>'); }
        .article-4 { background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 180"><rect width="300" height="180" fill="%234a90e2"/><text x="150" y="90" text-anchor="middle" dy=".3em" fill="%23fff" font-family="Arial" font-size="14">Solar panels</text></svg>'); }
        .article-5 { background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 180"><rect width="300" height="180" fill="%23e8f4f8"/><text x="150" y="90" text-anchor="middle" dy=".3em" fill="%23666" font-family="Arial" font-size="14">Vegan food</text></svg>'); }
        .article-6 { background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 180"><rect width="300" height="180" fill="%23f5f5f5"/><text x="150" y="90" text-anchor="middle" dy=".3em" fill="%23666" font-family="Arial" font-size="14">Woman eating</text></svg>'); }
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
                <div class="page-title">
                    Artikel Favorit
                    <button class="filter-btn">
                        <i class="fas fa-sliders-h"></i>
                    </button>
                </div>

                <div class="articles-grid">
                    <!-- Article 1 -->
                    <div class="article-card">
                        <img src="image/Rectangle 342.png" alt="Menghadapi Komentar Negatif Saat Menjadi Vegan" class="article-image">
                        <div class="article-content">
                            <h3 class="article-title">Menghadapi Komentar Negatif Saat Menjadi Vegan</h3>
                            <p class="article-time">Disimpan 2 menit yang lalu</p>
                            <button class="read-btn">
                                Baca Sekarang
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Article 2 -->
                    <div class="article-card">
                        <img src="image/Rectangle 347.png" alt="Mengelola Emosi Selama Kehamilan" class="article-image">
                        <div class="article-content">
                            <h3 class="article-title">Mengelola Emosi Selama Kehamilan</h3>
                            <p class="article-time">Disimpan 10 menit yang lalu</p>
                            <button class="read-btn">
                                Baca Sekarang
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Article 3 -->
                    <div class="article-card">
                        <img src="image/Rectangle 350.png" alt="5 Rekomendasi Aplikasi Olahraga Gratis" class="article-image">
                        <div class="article-content">
                            <h3 class="article-title">5 Rekomendasi Aplikasi Olahraga Gratis</h3>
                            <p class="article-time">Disimpan 1 jam yang lalu</p>
                            <button class="read-btn">
                                Baca Sekarang
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Article 4 -->
                    <div class="article-card">
                        <img src="image/Rectangle 353.png" alt="5 Rekomendasi Aplikasi Olahraga Gratis" class="article-image">
                        <div class="article-content">
                            <h3 class="article-title">5 Rekomendasi Aplikasi Olahraga Gratis</h3>
                            <p class="article-time">Disimpan 1 hari yang lalu</p>
                            <button class="read-btn">
                                Baca Sekarang
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Article 5 -->
                    <div class="article-card">
                        <img src="image/Rectangle 356.png" alt="Mulai Vegan dari Rumah: Tips Mudah Bagi Pemula" class="article-image">
                        <div class="article-content">
                            <h3 class="article-title">Mulai Vegan dari Rumah: Tips Mudah Bagi Pemula</h3>
                            <p class="article-time">Disimpan 1 hari yang lalu</p>
                            <button class="read-btn">
                                Baca Sekarang
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Article 6 -->
                    <div class="article-card">
                        <img src="image/Rectangle 359.png" alt="Mitos vs Fakta Tentang Makanan Diet" class="article-image">
                        <div class="article-content">
                            <h3 class="article-title">Mitos vs Fakta Tentang Makanan Diet</h3>
                            <p class="article-time">Disimpan 2 hari yang lalu</p>
                            <button class="read-btn">
                                Baca Sekarang
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>