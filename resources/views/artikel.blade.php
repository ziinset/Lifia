<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Terbaru</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f8f9fa;
            padding: 40px 20px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .page-title {
            color: #4E342E;
            font-family: 'Poppins', sans-serif;
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 40px;
        }

        .articles-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            align-items: start;
        }

        /* Main Article - Left Side */
        .main-article {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            height: 500px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .main-article-image {
            width: 100%;
            height: 100%;
            background-color: #d0d0d0;
            border: 2px dashed #999;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            position: relative;
        }

        .main-article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .main-article-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.85));
            padding: 40px 30px 30px;
            color: white;
            min-height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .main-category-tag {
            display: inline-flex;
            align-items: center;
            background-color: rgba(232, 245, 232, 0.95);
            color: #4a7c59;
            padding: 8px 16px;
            border-radius: 25px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 20px;
            width: fit-content;
        }

        .main-category-icon {
            width: 16px;
            height: 16px;
            background-image: url('image/fluent_food-fish-20-filled.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            margin-right: 10px;
        }

        .main-article h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 32px;
            font-weight: 600;
            line-height: 1.3;
            margin-bottom: 16px;
        }

        .main-article-desc {
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            line-height: 1.6;
            opacity: 0.95;
            margin-bottom: 25px;
        }

        .main-article-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            margin-top: auto;
        }

        .main-article-meta .author {
            font-weight: 600;
        }

        .main-article-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .main-action-btn {
            background-color: #90EE90;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
            position: relative;
            box-shadow: 0 2px 10px rgba(144, 238, 144, 0.3);
        }

        .main-action-btn:hover {
            background-color: #7FDD7F;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(144, 238, 144, 0.4);
        }

        .main-bookmark-btn {
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .main-bookmark-btn:hover {
            background: rgba(255,255,255,0.3);
            border-color: rgba(255,255,255,0.5);
        }

        .main-bookmark-btn img {
            width: 16px;
            height: 16px;
            filter: brightness(0) invert(1);
        }

        /* Sidebar Articles - Right Side */
        .sidebar-articles {
            display: flex;
            flex-direction: column;
            gap: 15px;
            height: 500px;
        }

        .sidebar-article {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            flex: 1;
            display: flex;
            flex-direction: row;
        }

        .sidebar-article:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(0,0,0,0.15);
        }

        .sidebar-article-image {
            width: 120px;
            height: 100%;
            min-height: 140px;
            background-color: #e5e5e5;
            border: 2px dashed #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
            font-family: 'Montserrat', sans-serif;
            font-size: 10px;
            flex-shrink: 0;
            text-align: center;
            padding: 5px;
            position: relative;
        }

        .sidebar-article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .sidebar-article-content {
            padding: 14px;
            display: flex;
            flex-direction: column;
            flex: 1;
            justify-content: space-between;
            min-height: 140px;
        }

        .sidebar-content-top {
            flex: 1;
        }

        .sidebar-category-tag {
            display: inline-flex;
            align-items: center;
            background-color: #e8f5e8;
            color: #4a7c59;
            padding: 4px 10px;
            border-radius: 15px;
            font-family: 'Poppins', sans-serif;
            font-size: 10px;
            font-weight: 500;
            margin-bottom: 10px;
            width: fit-content;
        }

        .sidebar-category-icon {
            width: 10px;
            height: 10px;
            background-image: url('image/fluent_food-fish-20-filled.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            margin-right: 6px;
        }

        .sidebar-article h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 600;
            color: #333;
            line-height: 1.2;
            margin-bottom: 6px;
        }

        .sidebar-article-desc {
            font-family: 'Montserrat', sans-serif;
            font-size: 11px;
            color: #666;
            line-height: 1.3;
            margin-bottom: 10px;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .sidebar-article-footer {
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-family: 'Montserrat', sans-serif;
            font-size: 9px;
            color: #999;
            margin-top: auto;
            flex-shrink: 0;
        }

        .sidebar-author-info {
            font-size: 9px;
        }

        .sidebar-article-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 6px;
        }

        .sidebar-article-footer .author {
            font-weight: 600;
        }

        .sidebar-action-btn {
            background-color: #90EE90;
            color: white;
            border: none;
            padding: 4px 8px;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-size: 9px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            z-index: 10;
            position: relative;
        }

        .sidebar-action-btn:hover {
            background-color: #7FDD7F;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(144, 238, 144, 0.3);
        }

        .sidebar-bookmark-btn {
            background: none;
            border: 1px solid #ddd;
            padding: 3px 4px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .sidebar-bookmark-btn img {
            width: 10px;
            height: 10px;
        }

        .sidebar-bookmark-btn:hover {
            border-color: #90EE90;
            background-color: rgba(144, 238, 144, 0.1);
        }

        /* Banner Section Styles */
        .banner-section {
            margin-top: 50px;
        }

        .banner-container {
            position: relative;
            width: 100%;
            height: 400px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .banner-slides {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .banner-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
        }

        .banner-slide.active {
            opacity: 1;
        }

        .banner-image {
            width: 100%;
            height: 100%;
            background-color: #e0e0e0;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888;
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            border: 2px dashed #bbb;
            position: relative;
        }

        .banner-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .banner-slide:nth-child(2) .banner-image {
            background-color: #e0e0e0;
        }

        .banner-slide:nth-child(3) .banner-image {
            background-color: #e0e0e0;
        }

        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.7));
            padding: 80px 40px 40px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .banner-content h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .banner-content p {
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            font-weight: 500;
            line-height: 1.6;
            margin-bottom: 25px;
            opacity: 0.95;
        }

        .banner-btn {
            background-color: #90EE90;
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 25px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(144, 238, 144, 0.3);
            width: fit-content;
            margin-left: 80px;
        }

        .banner-btn:hover {
            background-color: #7FDD7F;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(144, 238, 144, 0.4);
        }

        .banner-navigation {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            pointer-events: none;
        }

        .nav-prev,
        .nav-next {
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            pointer-events: all;
        }

        .nav-prev:hover,
        .nav-next:hover {
            background: rgba(255,255,255,0.3);
            border-color: rgba(255,255,255,0.5);
            transform: scale(1.1);
        }

        .banner-indicators {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255,255,255,0.4);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .indicator.active {
            background: white;
            transform: scale(1.2);
        }

        .indicator:hover {
            background: rgba(255,255,255,0.7);
        }

        @media (max-width: 1024px) {
            .articles-layout {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .page-title {
                font-size: 28px;
            }
            
            .main-article {
                height: 400px;
            }
            
            .main-article h2 {
                font-size: 24px;
            }

            .main-article-overlay {
                min-height: 200px;
            }

            .banner-container {
                height: 320px;
            }

            .banner-content h3 {
                font-size: 24px;
                font-weight: 700;
            }

            .banner-content p {
                font-size: 14px;
                font-weight: 500;
            }

            .banner-overlay {
                padding: 60px 30px 30px;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }
            
            .page-title {
                font-size: 24px;
                margin-bottom: 25px;
            }
            
            .main-article {
                height: 350px;
            }
            
            .main-article-overlay {
                padding: 25px 20px 20px;
                min-height: 180px;
            }
            
            .main-article h2 {
                font-size: 20px;
            }

            .main-article-meta {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .main-article-actions {
                width: 100%;
                justify-content: space-between;
            }

            .banner-container {
                height: 280px;
            }

            .banner-content h3 {
                font-size: 20px;
            }

            .banner-content p {
                font-size: 14px;
                margin-bottom: 20px;
            }

            .banner-overlay {
                padding: 50px 20px 20px;
            }

            .banner-btn {
                padding: 8px 20px;
                font-size: 12px;
                margin-left: 60px;
            }

            .nav-prev,
            .nav-next {
                width: 40px;
                height: 40px;
                font-size: 20px;
            }

            .banner-navigation {
                padding: 0 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="page-title">Artikel Terbaru</h1>
        
        <div class="articles-layout">
            <!-- Main Article - Left Side -->
            <div class="main-article">
                <div class="main-article-image">
                    <img src="image/Rectangle 127.png" alt="Mulai Hari dengan Sarapan Seimbang">
                </div>
                <div class="main-article-overlay">
                    <div class="main-category-tag">
                        <div class="main-category-icon"></div>
                        Pola Makan Sehat
                    </div>
                    <h2>Mulai Hari dengan Sarapan Seimbang</h2>
                    <p class="main-article-desc">Sarapan bukan cuma soal kenyang. Artikel ini membahas kombinasi karbohidrat kompleks, protein, dan serat untuk energi maksimal seharian.</p>
                    <div class="main-article-meta">
                        <span>Ditinjau: <span class="author">Graciella Yeriza Natalie</span> • 12 jam lalu</span>
                        <div class="main-article-actions">
                            <button class="main-action-btn">Selengkapnya</button>
                            <button class="main-bookmark-btn">
                                <img src="image/material-symbols_bookmark-outline-rounded.png" alt="Bookmark">
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Articles - Right Side -->
            <div class="sidebar-articles">
                <!-- Article 1 -->
                <div class="sidebar-article">
                    <div class="sidebar-article-image">
                        <img src="image/Rectangle 128.png" alt="Buah Lokal, Gizi Maksimal">
                    </div>
                    <div class="sidebar-article-content">
                        <div class="sidebar-content-top">
                            <div class="sidebar-category-tag">
                                <div class="sidebar-category-icon"></div>
                                Pola Makan Sehat
                            </div>
                            <h3>Buah Lokal, Gizi Maksimal</h3>
                            <p class="sidebar-article-desc">Mengapa apel malang atau pisang kepok lebih baik dari buah impor? Kenali manfaat buah lokal yang sering diremehan.</p>
                        </div>
                        <div class="sidebar-article-footer">
                            <div class="sidebar-author-info">
                                <span>By: <span class="author">Graciella Yeriza Natalie</span></span>
                            </div>
                            <div class="sidebar-article-actions">
                                <button class="sidebar-action-btn">Selengkapnya</button>
                                <button class="sidebar-bookmark-btn">
                                    <img src="image/material-symbols_bookmark-outline-rounded.png" alt="Bookmark">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article 2 -->
                <div class="sidebar-article">
                    <div class="sidebar-article-image">
                        <img src="image/Rectangle 129.png" alt="Sayuran Hijau: Sumber Serat dan Antioksidan">
                    </div>
                    <div class="sidebar-article-content">
                        <div class="sidebar-content-top">
                            <div class="sidebar-category-tag">
                                <div class="sidebar-category-icon"></div>
                                Pola Makan Sehat
                            </div>
                            <h3>Sayuran Hijau: Sumber Serat dan Antioksidan</h3>
                            <p class="sidebar-article-desc">Tak suka sayur? Coba trik mudah ini agar sayuran jadi lebih nikmat dan tetap kaya nutrisi.</p>
                        </div>
                        <div class="sidebar-article-footer">
                            <div class="sidebar-author-info">
                                <span>Penulis: <span class="author">Graciella Yeriza N</span></span>
                            </div>
                            <div class="sidebar-article-actions">
                                <button class="sidebar-action-btn">Selengkapnya</button>
                                <button class="sidebar-bookmark-btn">
                                    <img src="image/material-symbols_bookmark-outline-rounded.png" alt="Bookmark">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article 3 -->
                <div class="sidebar-article">
                    <div class="sidebar-article-image">
                        <img src="image/Rectangle 134.png" alt="Hidrasi: Minum Air dengan Cara yang Benar">
                    </div>
                    <div class="sidebar-article-content">
                        <div class="sidebar-content-top">
                            <div class="sidebar-category-tag">
                                <div class="sidebar-category-icon"></div>
                                Pola Makan Sehat
                            </div>
                            <h3>Hidrasi: Minum Air dengan Cara yang Benar</h3>
                            <p class="sidebar-article-desc">Ternyata minum air terlalu cepat juga bisa berdampak kurang baik. Simak tips minum air dengan benar di sini.</p>
                        </div>
                        <div class="sidebar-article-footer">
                            <div class="sidebar-author-info">
                                <span>Penulis: <span class="author">Graciella Yeriza N</span></span>
                            </div>
                            <div class="sidebar-article-actions">
                                <button class="sidebar-action-btn">Selengkapnya</button>
                                <button class="sidebar-bookmark-btn">
                                    <img src="image/material-symbols_bookmark-outline-rounded.png" alt="Bookmark">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner Section -->
        <div class="banner-section">
            <div class="banner-container">
                <div class="banner-slides">
                    <div class="banner-slide active">
                        <div class="banner-image">
                            <img src="image/Rectangle 136.png" alt="Tips Sehat Setiap Hari">
                        </div>
                        <div class="banner-overlay">
                            <div class="banner-content">
                                <h3>Tips Sehat Setiap Hari</h3>
                                <p>Kebiasaan kecil bisa berdampak besar untuk kesehatanmu. Yuk mulai hari ini dengan tips sederhana yang bisa langsung kamu praktikkan!</p>
                                <button class="banner-btn">Baca Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="banner-slide">
                        <div class="banner-image">
                            <img src="" alt="Resep Makanan Bergizi">
                        </div>
                        <div class="banner-overlay">
                            <div class="banner-content">
                                <h3>Resep Makanan Bergizi</h3>
                                <p>Temukan berbagai resep makanan sehat yang mudah dibuat dan kaya nutrisi. Cocok untuk menu harian keluarga Indonesia.</p>
                                <button class="banner-btn">Baca Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="banner-slide">
                        <div class="banner-image">
                            <img src="" alt="Olahraga di Rumah">
                        </div>
                        <div class="banner-overlay">
                            <div class="banner-content">
                                <h3>Olahraga di Rumah</h3>
                                <p>Tidak perlu ke gym untuk tetap sehat! Ikuti panduan olahraga mudah yang bisa dilakukan di rumah dengan peralatan sederhana.</p>
                                <button class="banner-btn">Baca Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="banner-navigation">
                    <button class="nav-prev" onclick="prevSlide()">‹</button>
                    <button class="nav-next" onclick="nextSlide()">›</button>
                </div>
                
                <div class="banner-indicators">
                    <span class="indicator active" onclick="currentSlide(1)"></span>
                    <span class="indicator" onclick="currentSlide(2)"></span>
                    <span class="indicator" onclick="currentSlide(3)"></span>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentSlideIndex = 0;
        const slides = document.querySelectorAll('.banner-slide');
        const indicators = document.querySelectorAll('.indicator');
        let autoSlideInterval;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(indicator => indicator.classList.remove('active'));
            
            slides[index].classList.add('active');
            indicators[index].classList.add('active');
        }

        function nextSlide() {
            currentSlideIndex = (currentSlideIndex + 1) % slides.length;
            showSlide(currentSlideIndex);
            resetAutoSlide();
        }

        function prevSlide() {
            currentSlideIndex = (currentSlideIndex - 1 + slides.length) % slides.length;
            showSlide(currentSlideIndex);
            resetAutoSlide();
        }

        function currentSlide(index) {
            currentSlideIndex = index - 1;
            showSlide(currentSlideIndex);
            resetAutoSlide();
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(() => {
                currentSlideIndex = (currentSlideIndex + 1) % slides.length;
                showSlide(currentSlideIndex);
            }, 5000);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        // Start auto-slide when page loads
        document.addEventListener('DOMContentLoaded', function() {
            startAutoSlide();
        });

        // Pause auto-slide when hovering over banner
        const bannerContainer = document.querySelector('.banner-container');
        bannerContainer.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });

        bannerContainer.addEventListener('mouseleave', () => {
            startAutoSlide();
        });
    </script>
</body>
</html>