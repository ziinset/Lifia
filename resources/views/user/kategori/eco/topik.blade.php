{{-- Topik Populer Section --}}
<style>
    .topik-section {
        font-family: 'Inter', sans-serif;
        background: #f8f9fa;
        line-height: 1.5;
        color: #333;
        padding: 30px 20px;
    }

        .main-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 32px;
            color: #4E342E;
            margin-bottom: 30px;
        }

        /* Featured Section */
        .featured-section {
            margin-bottom: 40px;
        }

        .featured-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .featured-item {
            position: relative;
        }

        .featured-image-container {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .featured-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .heart-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .heart-icon:hover {
            transform: scale(1.1);
        }

        .heart-icon svg {
            width: 24px;
            height: 24px;
            fill: none;
            stroke: #fff;
            stroke-width: 2;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        }

        .category-tag {
            display: inline-block;
            background: #e8f5e8;
            color: #4A7C59;
            font-family: 'Montserrat', sans-serif;
            font-size: 10px;
            font-weight: 700;
            padding: 4px 8px;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .featured-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 22px;
            color: #4E342E;
            line-height: 1.3;
            margin-bottom: 8px;
        }

        .featured-description {
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            font-weight: 500;
            color: #4E342E;
            line-height: 1.4;
            margin-bottom: 12px;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 2px;
        }

        .star {
            color: #ffd700;
            font-size: 18px;
        }

        .star.empty {
            color: #ddd;
        }

        /* Articles Section */
        .articles-section {
            margin-top: 40px;
        }

        .articles-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .article-item {
            display: flex;
            gap: 15px;
            position: relative;
            transition: transform 0.2s ease;
        }

        .article-item:hover {
            transform: translateX(5px);
        }

        .article-image-container {
            position: relative;
            flex-shrink: 0;
        }

        .article-image {
            width: 80px;
            height: 135px;
            object-fit: cover;
            border-radius: 12px;
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
            font-size: 14px !important;
            color: #4E342E !important;
            line-height: 1.3 !important;
            margin-bottom: 6px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .articles-section .article-description {
            font-family: 'Montserrat', sans-serif !important;
            font-size: 12px !important;
            font-weight: 500 !important;
            color: #4E342E !important;
            line-height: 1.3 !important;
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-rating {
            display: flex;
            align-items: center;
            gap: 1px;
            margin-bottom: 6px;
        }

        .article-rating .star {
            font-size: 16px;
        }

        .article-author {
            font-family: 'Montserrat', sans-serif;
            font-size: 10px;
            color: #888;
            font-weight: 600;
        }

        .small-heart {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .small-heart:hover {
            transform: scale(1.1);
        }

        .small-heart svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: #fff;
            stroke-width: 2;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 20px 15px;
            }

            .main-title {
                font-size: 28px;
                margin-bottom: 20px;
            }

            .featured-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .articles-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .article-item {
                padding: 0;
            }

            .article-image {
                width: 70px;
                height: 120px;
            }
        }

        @media (max-width: 480px) {
            .article-item {
                flex-direction: column;
            }

            .article-image {
                width: 100%;
                height: 120px;
            }
        }
    </style>

    <div class="topik-section">
        <div class="container">
        <h1 class="main-title">Topik Populer</h1>

        <!-- Featured Articles -->
        <section class="featured-section">
            <div class="featured-grid">
                <article class="featured-item">
                    <div class="featured-image-container">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&h=400&fit=crop&crop=center" alt="Healthy Grilled Chicken Salad" class="featured-image">
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
                        <img src="https://images.unsplash.com/photo-1515543237350-b3eea1ec8082?w=600&h=400&fit=crop&crop=center" alt="Plant-Based Power Bowl" class="featured-image">
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
                        <img src="https://images.unsplash.com/photo-1544025162-d76694265947?w=300&h=300&fit=crop&crop=center" alt="Mengatur Porsi Makan" class="article-image">
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
                        <img src="https://images.unsplash.com/photo-1574484284002-952d92456975?w=300&h=300&fit=crop&crop=center" alt="Makan Tengah Malam" class="article-image">
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
                        <img src="https://images.unsplash.com/photo-1607532941433-304659e8198a?w=300&h=300&fit=crop&crop=center" alt="Snack Sehat" class="article-image">
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
                        <img src="https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=300&h=300&fit=crop&crop=center" alt="Minuman Sehat" class="article-image">
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
    </div>