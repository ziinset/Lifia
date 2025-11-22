<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topik Populer</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8f9fa;
            line-height: 1.5;
            color: #333;
            padding: 30px 20px;
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards;
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

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .main-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 40px;
            color: #4E342E;
            margin-bottom: 40px;
            animation: slideInLeft 0.8s ease 0.2s both;
            position: relative;
            overflow: hidden;
        }

        .main-title::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: shimmer 2s ease-in-out 1s;
        }

        /* Featured Section */
        .featured-section {
            margin-bottom: 50px;
        }

        .featured-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .featured-item {
            position: relative;
            animation: scaleIn 0.6s ease forwards;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .featured-item:nth-child(1) {
            animation-delay: 0.3s;
        }

        .featured-item:nth-child(2) {
            animation-delay: 0.4s;
        }

        .featured-item:hover {
            transform: translateY(-8px);
            filter: brightness(1.05);
        }

        .featured-image-container {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .featured-item:hover .featured-image-container {
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .featured-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .featured-item:hover .featured-image {
            transform: scale(1.05);
        }

        .heart-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            opacity: 0.8;
        }

        .heart-icon:hover {
            transform: scale(1.2);
            opacity: 1;
        }

        .heart-icon:active {
            transform: scale(0.9);
        }

        .heart-icon svg {
            width: 28px;
            height: 28px;
            fill: none;
            stroke: #fff;
            stroke-width: 2;
            filter: drop-shadow(0 2px 8px rgba(0,0,0,0.4));
        }

        .category-tag {
            display: inline-block;
            background: #e8f5e8;
            color: #4A7C59;
            font-family: 'Montserrat', sans-serif;
            font-size: 11px;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
            transition: all 0.3s ease;
        }

        .featured-item:hover .category-tag {
            transform: translateX(5px);
            background: #d4f1d4;
        }

        .featured-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 26px;
            color: #4E342E;
            line-height: 1.3;
            margin-bottom: 12px;
            transition: color 0.3s ease;
        }

        .featured-item:hover .featured-title {
            color: #3d261f;
        }

        .featured-description {
            font-family: 'Montserrat', sans-serif;
            font-size: 18px;
            font-weight: 500;
            color: #4E342E;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .star {
            color: #ffd700;
            font-size: 22px;
            transition: all 0.2s ease;
        }

        .star.empty {
            color: #ddd;
        }

        .featured-item:hover .star {
            transform: scale(1.1);
        }

        /* Articles Section */
        .articles-section {
            margin-top: 50px;
        }

        .articles-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .article-item {
            display: flex;
            gap: 18px;
            position: relative;
            transition: all 0.3s ease;
            padding: 10px;
            border-radius: 12px;
            opacity: 0;
            animation: slideInRight 0.6s ease forwards;
        }

        .article-item:nth-child(1) { animation-delay: 0.5s; }
        .article-item:nth-child(2) { animation-delay: 0.6s; }
        .article-item:nth-child(3) { animation-delay: 0.7s; }
        .article-item:nth-child(4) { animation-delay: 0.8s; }

        .article-item:hover {
            transform: translateX(8px);
        }

        .article-image-container {
            position: relative;
            flex-shrink: 0;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .article-item:hover .article-image-container {
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .article-image {
            width: 90px;
            height: 140px;
            object-fit: cover;
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .article-item:hover .article-image {
            transform: scale(1.03);
        }

        .article-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .articles-section .article-title {
            font-family: 'Poppins', sans-serif !important;
            font-weight: 600 !important;
            font-size: 16px !important;
            color: #4E342E !important;
            line-height: 1.4 !important;
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.3s ease;
        }

        .article-item:hover .article-title {
            color: #3d261f;
        }

        .articles-section .article-description {
            font-family: 'Montserrat', sans-serif !important;
            font-size: 14px !important;
            font-weight: 500 !important;
            color: #4E342E !important;
            line-height: 1.4 !important;
            margin-bottom: 12px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-rating {
            display: flex;
            align-items: center;
            gap: 2px;
            margin-bottom: 8px;
        }

        .article-rating .star {
            font-size: 18px;
            transition: all 0.2s ease;
        }

        .article-item:hover .article-rating .star {
            transform: scale(1.05);
        }

        .article-author {
            font-family: 'Montserrat', sans-serif;
            font-size: 11px;
            color: #888;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        /* Fixed hover selector for article author */
        .article-item:hover .article-author {
            color: #666;
        }

        .small-heart {
            position: absolute;
            top: 8px;
            right: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            opacity: 0.9;
        }

        .small-heart:hover {
            transform: scale(1.15);
            opacity: 1;
        }

        .small-heart:active {
            transform: scale(0.85);
        }

        .small-heart svg {
            width: 20px;
            height: 20px;
            fill: none;
            stroke: #fff;
            stroke-width: 2;
            filter: drop-shadow(0 2px 6px rgba(0,0,0,0.4));
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 20px 15px;
            }

            .main-title {
                font-size: 32px;
                margin-bottom: 30px;
            }

            .featured-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .featured-title {
                font-size: 22px;
            }

            .featured-description {
                font-size: 16px;
            }

            .articles-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .article-item {
                padding: 8px;
            }

            .article-image {
                width: 80px;
                height: 120px;
            }

            .articles-section .article-title {
                font-size: 15px !important;
            }

            .articles-section .article-description {
                font-size: 13px !important;
            }
        }

        @media (max-width: 480px) {
            .main-title {
                font-size: 28px;
            }

            .featured-title {
                font-size: 20px;
            }

            .featured-description {
                font-size: 15px;
            }

            .article-item {
                flex-direction: column;
            }

            .article-image {
                width: 100%;
                height: 120px;
            }

            .articles-section .article-title {
                font-size: 14px !important;
            }
        }

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Loading state for images */
        .featured-image, .article-image {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="main-title">Topik Populer</h1>
        
        <!-- Featured Articles -->
        <section class="featured-section">
            <div class="featured-grid">
                <article class="featured-item">
                    <div class="featured-image-container">
                        <img src="image/Rectangle 147.png" alt="Healthy Grilled Chicken Salad" class="featured-image">
                        <div class="heart-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="featured-content">
                        <span class="category-tag">HEALTHY GRILLED CHICKEN SALAD RECIPE (Greek Style)</span>
                        <h2 class="featured-title">Makanan Sehat untuk Pemula: Panduan 7 Hari Awal</h2>
                        <p class="featured-description">Tips dan menu sederhana untuk mulai hidup sehat tanpa ribet. Cocok buat kamu yang baru mulai jaga pola makan.</p>
                        <div class="rating">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star empty">☆</span>
                        </div>
                    </div>
                </article>

                <article class="featured-item">
                    <div class="featured-image-container">
                        <img src="image/Rectangle 148.png" alt="Plant-Based Power Bowl" class="featured-image">
                        <div class="heart-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="featured-content">
                        <span class="category-tag">PLANT - BASED POWER BOWL</span>
                        <h2 class="featured-title">Sarapan Sehat: Pilihan Cepat dan Bergizi untuk Setiap Hari</h2>
                        <p class="featured-description">Ide sarapan anti-bosan dan praktis yang bantu kamu tetap semangat sepanjang hari.</p>
                        <div class="rating">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star empty">☆</span>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <!-- Article List -->
        <section class="articles-section">
            <div class="articles-grid">
                <article class="article-item">
                    <div class="article-image-container">
                        <img src="image/Rectangle 151.png" alt="Mengatur Porsi Makan" class="article-image">
                        <div class="small-heart">
                            <svg viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="article-content">
                        <div>
                            <h3 class="article-title">Cara Mengatur Porsi Makan Agar Tetap Kenyang Tanpa Kalori Berlebih</h3>
                            <p class="article-description">Panduan visual & trik makan agar tetap puas tapi tidak berlebihan kalori.</p>
                        </div>
                        <div class="article-meta">
                            <div class="article-rating">
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star empty">★</span>
                                <span class="star empty">★</span>
                            </div>
                            <div class="article-author">Ditulis: Graciella Yeriza Natalie</div>
                        </div>
                    </div>
                </article>

                <article class="article-item">
                    <div class="article-image-container">
                        <img src="image/Rectangle 155.png" alt="Makan Tengah Malam" class="article-image">
                        <div class="small-heart">
                            <svg viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="article-content">
                        <div>
                            <h3 class="article-title">Bahaya Makan Tengah Malam & Tips Menghindarinya</h3>
                            <p class="article-description">Panduan visual & trik makan agar tetap puas tapi tidak berlebihan kalori.</p>
                        </div>
                        <div class="article-meta">
                            <div class="article-rating">
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star empty">★</span>
                                <span class="star empty">★</span>
                            </div>
                            <div class="article-author">Penulis: Graciella Yeriza Natalie</div>
                        </div>
                    </div>
                </article>

                <article class="article-item">
                    <div class="article-image-container">
                        <img src="image/Rectangle 152 (1).png" alt="Snack Sehat" class="article-image">
                        <div class="small-heart">
                            <svg viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="article-content">
                        <div>
                            <h3 class="article-title">Snack Sehat: Camilan Enak yang Nggak Bikin Berat Badan Naik</h3>
                            <p class="article-description">Ganti keripik dan gorengan dengan camilan sehat yang tetap lezat dan mudah dibuat.</p>
                        </div>
                        <div class="article-meta">
                            <div class="article-rating">
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star empty">★</span>
                                <span class="star empty">★</span>
                            </div>
                            <div class="article-author">Penulis: Graciella Yeriza Natalie</div>
                        </div>
                    </div>
                </article>

                <article class="article-item">
                    <div class="article-image-container">
                        <img src="image/Rectangle 158.png" alt="Minuman Sehat" class="article-image">
                        <div class="small-heart">
                            <svg viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="article-content">
                        <div>
                            <h3 class="article-title">Minum yang Bikin Sehat: Pilihan Minuman Rendah Kalori yang Menyegarkan</h3>
                            <p class="article-description">Ganti minuman manis dengan pilihan sehat yang tetap segar dan nikmat sepanjang hari.</p>
                        </div>
                        <div class="article-meta">
                            <div class="article-rating">
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star empty">★</span>
                                <span class="star empty">★</span>
                            </div>
                            <div class="article-author">Penulis: Graciella Yeriza Natalie</div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </div>
</body>
</html>