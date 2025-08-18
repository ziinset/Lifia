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
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
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
            background-color: #B4D678;
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
            box-shadow: 0 2px 10px rgba(180, 214, 120, 0.3);
        }

        .main-action-btn:hover {
            background-color: #A5C866;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(180, 214, 120, 0.4);
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
            gap: 6px;
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
            min-height: 162px;
        }

        .sidebar-article:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(0,0,0,0.15);
        }

        .sidebar-article-image {
            width: 120px;
            flex-shrink: 0;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-family: 'Montserrat', sans-serif;
            font-size: 10px;
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
            padding: 10px 12px 10px 12px;
            display: flex;
            flex-direction: column;
            flex: 1;
            justify-content: space-between;
        }

        .sidebar-content-top {
            flex-grow: 1;
            margin-bottom: 4px;
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
            margin-bottom: 8px;
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
            margin-bottom: 2px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .sidebar-article-footer {
            margin-top: auto;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 6px;
            min-height: 36px;
            padding-top: 2px;
        }

        .sidebar-author-info {
            font-family: 'Montserrat', sans-serif;
            font-size: 9px;
            color: #999;
            flex: 1;
            display: flex;
            align-items: center;
        }

        .sidebar-author-info .author {
            font-weight: 600;
            color: #666;
        }

        .sidebar-article-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
        }

        .sidebar-action-btn {
            background: linear-gradient(135deg, #B4D678 0%, #A5C866 100%);
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 20px;
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            box-shadow: 0 3px 12px rgba(180, 214, 120, 0.4);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            min-height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-action-btn:hover {
            background: linear-gradient(135deg, #A5C866 0%, #96BA54 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(180, 214, 120, 0.6);
        }

        .sidebar-bookmark-btn {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 1px solid #dee2e6;
            padding: 7px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .sidebar-bookmark-btn img {
            width: 14px;
            height: 14px;
        }

        .sidebar-bookmark-btn:hover {
            border-color: #B4D678;
            background: linear-gradient(135deg, rgba(180, 214, 120, 0.1) 0%, rgba(180, 214, 120, 0.2) 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(180, 214, 120, 0.3);
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

            .sidebar-articles {
                height: auto;
                gap: 15px;
            }

            .sidebar-article {
                min-height: 130px;
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

            .sidebar-article {
                flex-direction: column;
                min-height: auto;
            }

            .sidebar-article-image {
                width: 100%;
                height: 120px;
            }

            .sidebar-article-content {
                padding: 12px;
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
    </div>
</body>
</html>