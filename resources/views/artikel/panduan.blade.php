<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pola Makan Sehat Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Montserrat:wght@500&display=swap" rel="stylesheet">
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
            align-items: stretch;
        }

        .main-content {
            flex: 2;
        }

        .sidebar {
            flex: 1;
            align-self: stretch;
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
        }

        .article-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .article-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            align-self: flex-start;
        }

        .tag-fish-icon {
            width: 18px;
            height: 18px;
        }

        .tag-text {
            color: #8BAC65;
            font-size: 13px;
            font-weight: 500;
            font-family: 'Montserrat', sans-serif;
        }

        .article-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 20px;
            color: #4E342E;
            line-height: 1.3;
            margin-bottom: 4px;
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
            padding-top: 8px;
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
        }

        .bookmark-section {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #8BAC65;
            cursor: pointer;
            align-self: flex-start;
        }

        .bookmark-icon {
            width: 18px;
            height: 18px;
            stroke: #8BAC65;
            transition: stroke 0.2s ease;
        }

        .bookmark-section:hover .bookmark-icon {
            stroke: #7a9b5a;
        }

        .sidebar-section {
            background: white;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .sidebar-section:last-child {
            flex-grow: 1;
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
            height: 480px;
            border-radius: 16px;
            object-fit: cover;
            object-position: center;
        }

        .categories-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 18px;
            color: #4E342E;
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
            background: linear-gradient(135deg, #8BAC65, #a4c470);
            border-radius: 2px;
        }

        .category-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px 12px;
            border-bottom: 1px solid #f0f0f0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 12px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
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
            transform: translateX(8px);
            box-shadow: 0 4px 12px rgba(139, 172, 101, 0.15);
            border-color: transparent;
        }

        .category-item:hover::before {
            transform: scaleY(1);
        }

        .category-item:active {
            transform: translateX(6px) scale(0.98);
        }

        .category-item:last-child {
            border-bottom: none;
        }

        .category-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            object-fit: cover;
            flex-shrink: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            background: linear-gradient(135deg, #f0f7e8, #e8f5dc);
            padding: 8px;
        }

        .category-item:hover .category-icon {
            transform: rotate(5deg) scale(1.1);
            box-shadow: 0 6px 24px rgba(139, 172, 101, 0.3);
            background: linear-gradient(135deg, #e8f5dc, #daf0c7);
        }

        .category-text {
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: 14px;
            color: #4E342E;
            line-height: 1.4;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .category-item:hover .category-text {
            color: #2c5530;
            font-weight: 600;
            transform: translateX(4px);
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            margin-top: 40px;
            padding: 20px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .page-btn, .nav-btn {
            min-width: 44px;
            height: 44px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            background: white;
            color: #666;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .page-btn:hover, .nav-btn:hover {
            border-color: #8BAC65;
            background: #f8fbf4;
            color: #8BAC65;
        }

        .page-btn.active {
            background: #8BAC65;
            border-color: #8BAC65;
            color: white;
        }

        .page-btn.active:hover {
            background: #7a9b5a;
            border-color: #7a9b5a;
        }

        .pagination-dots {
            color: #999;
            font-weight: 500;
            padding: 0 8px;
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

            .pagination {
                gap: 8px;
            }

            .page-btn, .nav-btn {
                min-width: 40px;
                height: 40px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content-wrapper">
            <main class="main-content">
            <!-- Article 1 -->
            <article class="article-card">
                <img src="https://images.unsplash.com/photo-1559740336-2fde5982ec0d?w=200&h=150&fit=crop" alt="Pregnant woman" class="article-image">
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
                                <svg class="author-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m14.5 9.5-5 5"/>
                                    <path d="m9.5 9.5 5 5"/>
                                    <circle cx="12" cy="12" r="2"/>
                                    <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                    <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                                </svg>
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
            <article class="article-card">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=200&h=150&fit=crop" alt="Lemon water" class="article-image">
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
                                <svg class="author-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m14.5 9.5-5 5"/>
                                    <path d="m9.5 9.5 5 5"/>
                                    <circle cx="12" cy="12" r="2"/>
                                    <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                    <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                                </svg>
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
            <article class="article-card">
                <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=200&h=150&fit=crop" alt="Woman eating" class="article-image">
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
                                <svg class="author-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m14.5 9.5-5 5"/>
                                    <path d="m9.5 9.5 5 5"/>
                                    <circle cx="12" cy="12" r="2"/>
                                    <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                    <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                                </svg>
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
            <article class="article-card">
                <img src="https://images.unsplash.com/photo-1559840244-8a6ec64be3e3?w=200&h=150&fit=crop" alt="Pregnant woman eating" class="article-image">
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
                                <svg class="author-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m14.5 9.5-5 5"/>
                                    <path d="m9.5 9.5 5 5"/>
                                    <circle cx="12" cy="12" r="2"/>
                                    <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                    <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                                </svg>
                                <span>Ditinjau: Graciella Yeriza Natalie</span>
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
            <article class="article-card">
                <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=200&h=150&fit=crop" alt="Diet food" class="article-image">
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
                                <svg class="author-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m14.5 9.5-5 5"/>
                                    <path d="m9.5 9.5 5 5"/>
                                    <circle cx="12" cy="12" r="2"/>
                                    <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                    <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                                </svg>
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
                <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400&h=300&fit=crop" alt="Delicious Burger" class="granola-image">
            </div>

            <!-- Categories -->
            <div class="sidebar-section">
                <h3 class="categories-title">Jelajahi Kategori Lain</h3>
                
                <div class="categories-content">
                    <div class="category-item">
                        <img src="https://images.unsplash.com/photo-1559909114-f7cc42a5cd3e?w=40&h=40&fit=crop" alt="Pola Makan Sehat" class="category-icon">
                        <span class="category-text">Pola Makan Sehat</span>
                    </div>

                    <div class="category-item">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=40&h=40&fit=crop" alt="Aktivitas Fisik" class="category-icon">
                        <span class="category-text">Olahraga dan<br>Aktivitas Fisik</span>
                    </div>

                    <div class="category-item">
                        <img src="https://images.unsplash.com/photo-1559909114-67094fe42631?w=40&h=40&fit=crop" alt="Kesehatan Mental" class="category-icon">
                        <span class="category-text">Kesehatan Mental</span>
                    </div>

                    <div class="category-item">
                        <img src="https://images.unsplash.com/photo-1559847844-5315695dadae?w=40&h=40&fit=crop" alt="Perawatan Diri" class="category-icon">
                        <span class="category-text">Perawatan Diri<br>Self-Care</span>
                    </div>

                    <div class="category-item">
                        <img src="https://images.unsplash.com/photo-1559847844-d90b3d5b2686?w=40&h=40&fit=crop" alt="Gaya Hidup Vegan" class="category-icon">
                        <span class="category-text">Gaya Hidup Vegan/<br>Vegetarian</span>
                    </div>

                    <div class="category-item">
                        <img src="https://images.unsplash.com/photo-1574126154517-d1e0d89ef734?w=40&h=40&fit=crop" alt="Lingkungan" class="category-icon">
                        <span class="category-text">Lingkungan<br>Lingkungan & Eco Living</span>
                    </div>
                </div>
            </div>
                    </aside>
        </div>
    </div>
</body>
</html>