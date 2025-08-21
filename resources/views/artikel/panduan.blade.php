<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pola Makan Sehat Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f5f5f5;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .content-wrapper {
            display: flex;
            gap: 40px;
            align-items: flex-start;
        }

        .main-content {
            flex: 2;
        }

        .sidebar {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .article-card {
            background: white;
            border-radius: 16px;
            margin-bottom: 32px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            display: flex;
            gap: 24px;
            padding: 24px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .article-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }

        .article-image {
            width: 180px;
            height: 140px;
            border-radius: 12px;
            object-fit: cover;
            flex-shrink: 0;
            align-self: flex-start;
            transition: all 0.3s ease;
        }

        .article-item:hover .article-image {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .main-content .article-item {
            display: flex;
            gap: 24px;
            margin-bottom: 40px;
            padding-bottom: 32px;
            align-items: flex-start;
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
            border-bottom: 1px solid #f0f0f0;
        }

        .main-content .article-item:nth-child(1) { animation-delay: 0.1s; }
        .main-content .article-item:nth-child(2) { animation-delay: 0.2s; }
        .main-content .article-item:nth-child(3) { animation-delay: 0.3s; }
        .main-content .article-item:nth-child(4) { animation-delay: 0.4s; }
        .main-content .article-item:nth-child(5) { animation-delay: 0.5s; }

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

        .article-item:last-of-type {
            margin-bottom: 20px;
        }

        .article-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 12px;
            height: 140px;
            justify-content: space-between;
        }

        .article-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            align-self: flex-start;
        }

        .tag-fish-icon {
            width: 24px;
            height: 24px;
            transition: all 0.3s ease;
        }

        .tag-text {
            color: #8BAC65;
            font-size: 13px;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
        }

        .article-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 20px;
            color: #4E342E;
            line-height: 1.3;
            margin-bottom: 4px;
            transition: color 0.3s ease;
        }

        .article-item:hover .article-title {
            color: #8BAC65;
        }

        .article-description {
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: 15px;
            color: #4E342E;
            line-height: 1.5;
            flex-grow: 1;
        }

        .article-meta {
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-size: 13px;
            color: #888;
            margin-top: auto;
        }

        .meta-top {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .author-info {
            display: flex;
            align-items: center;
            gap: 6px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }

        .author-icon {
            width: 16px;
            height: 16px;
            stroke: #888;
        }

        .time-info {
            display: flex;
            align-items: center;
            gap: 6px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }

        .bookmark-section {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #8BAC65;
            cursor: pointer;
            align-self: flex-start;
            margin-top: 4px;
        }

        .bookmark-icon {
            width: 18px;
            height: 18px;
            stroke: #8BAC65;
            transition: stroke 0.2s ease;
        }

        .article-item:hover .tag-fish-icon {
            transform: scale(1.1);
        }

        .sidebar-section {
            background: white;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .sidebar-section.categories-section {
            background: linear-gradient(135deg, rgba(122, 159, 126, 0.6), rgba(138, 175, 142, 0.7));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-section:last-child {
            margin-bottom: 0;
            display: flex;
            flex-direction: column;
        }

        .categories-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .granola-banner {
            text-align: center;
            padding: 20px;
            border-radius: 16px;
            overflow: hidden;
        }

        .granola-image {
            width: 100%;
            height: 400px;
            border-radius: 16px;
            object-fit: cover;
            object-position: center;
        }

        .categories-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 18px;
            color: white;
            margin-bottom: 24px;
            position: relative;
            padding-bottom: 12px;
        }

        .categories-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(135deg, #6b9640, #7ba955);
            border-radius: 2px;
        }

        .category-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px;
            margin-bottom: 12px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            animation: slideInRight 0.5s ease-out;
            animation-fill-mode: both;
        }

        .category-item:nth-child(1) { animation-delay: 0.1s; }
        .category-item:nth-child(2) { animation-delay: 0.2s; }
        .category-item:nth-child(3) { animation-delay: 0.3s; }
        .category-item:nth-child(4) { animation-delay: 0.4s; }
        .category-item:nth-child(5) { animation-delay: 0.5s; }
        .category-item:nth-child(6) { animation-delay: 0.6s; }

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

        .category-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: linear-gradient(135deg, #8BAC65, #a4c470);
            transform: scaleY(0);
            transform-origin: bottom;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .category-item:hover {
            background: linear-gradient(135deg, #f8fbf4, #f0f7e8);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .category-item:hover::before {
            transform: scaleY(1);
        }

        .category-item:active {
            transform: translateY(-1px) scale(0.98);
        }

        .category-item:last-child {
            margin-bottom: 0;
        }

        .category-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            object-fit: cover;
            flex-shrink: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            background: linear-gradient(135deg, #f0f7e8, #e8f5dc);
            padding: 6px;
        }

        .category-item:hover .category-icon {
            transform: scale(1.05);
            box-shadow: 0 4px 16px rgba(139, 172, 101, 0.2);
        }

        .category-text {
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: 13px;
            color: #4E342E;
            line-height: 1.4;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .category-item:hover .category-text {
            color: #2c5530;
            font-weight: 600;
        }

        .bookmark-section:hover .bookmark-icon {
            stroke: #7a9b5a;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 40px;
            padding: 16px 24px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            animation: fadeInUp 0.8s ease-out 0.6s;
            animation-fill-mode: both;
        }

        .page-btn, .nav-btn {
            min-width: 50px;
            height: 50px;
            border: none;
            border-radius: 50%;
            background: transparent;
            color: #4E342E;
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .page-btn:hover, .nav-btn:hover {
            background: #f0f0f0;
            color: #4E342E;
        }

        .page-btn.active {
            background: #8BAC65;
            color: white;
            font-weight: 700;
        }

        .page-btn.active:hover {
            background: #7a9b5a;
        }

        .nav-btn {
            padding: 0;
        }

        .nav-btn svg {
            width: 20px;
            height: 20px;
        }

        .pagination-dots {
            color: #4E342E;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            padding: 0 6px;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .content-wrapper {
                flex-direction: column;
                gap: 30px;
            }

            .sidebar {
                position: static;
            }

            .article-card {
                flex-direction: column;
                gap: 16px;
            }

            .article-image {
                width: 100%;
                height: 200px;
            }

            .article-content {
                height: auto;
            }

            .pagination {
                gap: 8px;
            }

            .page-btn, .nav-btn {
                min-width: 44px;
                height: 44px;
                font-size: 15px;
                font-weight: 700;
            }

            .nav-btn svg {
                width: 18px;
                height: 18px;
            }

            .granola-image {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content-wrapper">
            <main class="main-content">
                <!-- Article 1 -->
                <article class="article-item">
                    <img src="image/Rectangle 165.png" alt="Pregnant woman" class="article-image">
                    <div class="article-content">
                        <div class="article-tag">
                            <img src="image/fluent_food-fish-20-filled.png" alt="Fish icon" class="tag-fish-icon">
                            <span class="tag-text">Pola Makan Sehat</span>
                        </div>
                        <h2 class="article-title">Panduan Pola Makan Sehat untuk Ibu Hamil</h2>
                        <p class="article-description">Tips memilih makanan bergizi seimbang selama kehamilan, lengkap dengan daftar nutrisi penting.</p>
                        <div class="article-meta">
                            <div class="meta-top">
                                <div class="author-info">
                                    <img src="image/uil_pen.png" alt="Pen icon" class="author-icon" style="width: 16px; height: 16px;">
                                    <span>Ditinjau: Graciella Yeriza Natalie</span>
                                </div>
                                <div class="time-info">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"/>
                                        <polyline points="12,6 12,12 16,14"/>
                                    </svg>
                                    <span>2 jam lalu</span>
                                </div>
                            </div>
                            <div class="bookmark-section">
                                <span>Simpan Artikel</span>
                                <svg class="bookmark-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Article 2 -->
                <article class="article-item">
                    <img src="image/Rectangle 160.png" alt="Lemon water" class="article-image">
                    <div class="article-content">
                        <div class="article-tag">
                            <img src="image/fluent_food-fish-20-filled.png" alt="Fish icon" class="tag-fish-icon">
                            <span class="tag-text">Pola Makan Sehat</span>
                        </div>
                        <h2 class="article-title">Apakah Minum Air Lemon di Pagi Hari Efektif?</h2>
                        <p class="article-description">Fakta ilmiah tentang manfaat dan mitos dari kebiasaan minum air lemon untuk detoks dan kesehatan.</p>
                        <div class="article-meta">
                            <div class="meta-top">
                                <div class="author-info">
                                    <img src="image/uil_pen.png" alt="Pen icon" class="author-icon" style="width: 16px; height: 16px;">
                                    <span>Ditinjau: Graciella Yeriza Natalie</span>
                                </div>
                                <div class="time-info">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"/>
                                        <polyline points="12,6 12,12 16,14"/>
                                    </svg>
                                    <span>5 hari lalu</span>
                                </div>
                            </div>
                            <div class="bookmark-section">
                                <span>Simpan Artikel</span>
                                <svg class="bookmark-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Article 3 -->
                <article class="article-item">
                    <img src="image/Rectangle 161.png" alt="Woman eating" class="article-image">
                    <div class="article-content">
                        <div class="article-tag">
                            <img src="image/fluent_food-fish-20-filled.png" alt="Fish icon" class="tag-fish-icon">
                            <span class="tag-text">Pola Makan Sehat</span>
                        </div>
                        <h2 class="article-title">Cara Mengenali Sinyal Lapar dan Kenyang dari Tubuh</h2>
                        <p class="article-description">Latihan mindful eating: membedakan lapar fisik vs lapar emosional agar tidak makan berlebihan.</p>
                        <div class="article-meta">
                            <div class="meta-top">
                                <div class="author-info">
                                    <img src="image/uil_pen.png" alt="Pen icon" class="author-icon" style="width: 16px; height: 16px;">
                                    <span>Ditinjau: Graciella Yeriza Natalie</span>
                                </div>
                                <div class="time-info">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"/>
                                        <polyline points="12,6 12,12 16,14"/>
                                    </svg>
                                    <span>10 jam lalu</span>
                                </div>
                            </div>
                            <div class="bookmark-section">
                                <span>Simpan Artikel</span>
                                <svg class="bookmark-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Article 4 -->
                <article class="article-item">
                    <img src="image/Rectangle 163.png" alt="Pregnant woman eating" class="article-image">
                    <div class="article-content">
                        <div class="article-tag">
                            <img src="image/fluent_food-fish-20-filled.png" alt="Fish icon" class="tag-fish-icon">
                            <span class="tag-text">Pola Makan Sehat</span>
                        </div>
                        <h2 class="article-title">Makanan yang Harus Dihindari Saat Hamil</h2>
                        <p class="article-description">Daftar makanan berisiko tinggi untuk janin, lengkap dengan alasannya.</p>
                        <div class="article-meta">
                            <div class="meta-top">
                                <div class="author-info">
                                    <img src="image/uil_pen.png" alt="Pen icon" class="author-icon" style="width: 16px; height: 16px;">
                                    <span>Ditinjau: Graciella Yeriza Natalie</span>
                                </div>
                                <div class="time-info">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"/>
                                        <polyline points="12,6 12,12 16,14"/>
                                    </svg>
                                    <span>1 hari lalu</span>
                                </div>
                            </div>
                            <div class="bookmark-section">
                                <span>Simpan Artikel</span>
                                <svg class="bookmark-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Article 5 -->
                <article class="article-item">
                    <img src="image/Rectangle 164.png" alt="Diet food" class="article-image">
                    <div class="article-content">
                        <div class="article-tag">
                            <img src="image/fluent_food-fish-20-filled.png" alt="Fish icon" class="tag-fish-icon">
                            <span class="tag-text">Pola Makan Sehat</span>
                        </div>
                        <h2 class="article-title">Mitos vs Fakta Tentang Makanan Diet</h2>
                        <p class="article-description">Meluruskan mitos seputar roti gandum, buah malam hari, karbohidrat, dan diet tanpa nasi.</p>
                        <div class="article-meta">
                            <div class="meta-top">
                                <div class="author-info">
                                    <img src="image/uil_pen.png" alt="Pen icon" class="author-icon" style="width: 16px; height: 16px;">
                                    <span>Ditinjau: Penulis Graciella Yeriza Natalie</span>
                                </div>
                            </div>
                            <div class="bookmark-section">
                                <span>Simpan Artikel</span>
                                <svg class="bookmark-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Pagination -->
                <div class="pagination">
                    <button class="nav-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m15 18-6-6 6-6"/>
                        </svg>
                    </button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn">4</button>
                    <button class="page-btn">5</button>
                    <span class="pagination-dots">...</span>
                    <button class="page-btn">60</button>
                    <button class="nav-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>
                    </button>
                </div>
            </main>

            <aside class="sidebar">
                <!-- Burger Banner -->
                <div class="sidebar-section granola-banner">
                    <img src="image/Rectangle 167.png" alt="Delicious Burger" class="granola-image">
                </div>

                <!-- Categories -->
                <div class="sidebar-section categories-section">
                    <h3 class="categories-title">Jelajahi Kategori Lain</h3>
                    
                    <div class="categories-content">
                        <div class="category-item">
                            <img src="image/Rectangle 220.png" alt="Pola Makan Sehat" class="category-icon">
                            <span class="category-text">Pola Makan Sehat</span>
                        </div>

                        <div class="category-item">
                            <img src="image/Rectangle 222.png" alt="Aktivitas Fisik" class="category-icon">
                            <span class="category-text">Olahraga dan<br>Aktivitas Fisik</span>
                        </div>

                        <div class="category-item">
                            <img src="image/Rectangle 224.png" alt="Kesehatan Mental" class="category-icon">
                            <span class="category-text">Kesehatan Mental</span>
                        </div>

                        <div class="category-item">
                            <img src="image/Rectangle 226.png" alt="Perawatan Diri" class="category-icon">
                            <span class="category-text">Perawatan Diri<br>Self-Care</span>
                        </div>

                        <div class="category-item">
                            <img src="image/Rectangle 228.png" alt="Gaya Hidup Vegan" class="category-icon">
                            <span class="category-text">Gaya Hidup Vegan/<br>Vegetarian</span>
                        </div>

                        <div class="category-item">
                            <img src="image/Rectangle 230.png" alt="Lingkungan" class="category-icon">
                            <span class="category-text">Lingkungan<br>Lingkungan & Eco Living</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</body>
</html>