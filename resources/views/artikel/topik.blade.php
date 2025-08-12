<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topik Populer</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Montserrat:wght@500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #ffffff;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .main-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 28px;
            color: #4E342E;
            margin-bottom: 30px;
        }

        .recipe-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .recipe-card {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(78, 52, 46, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: white;
        }

        .recipe-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(78, 52, 46, 0.12);
        }

        .recipe-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .recipe-card:hover .recipe-image {
            transform: scale(1.05);
        }

        .heart-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .heart-icon:hover {
            background: rgba(139, 172, 101, 0.2);
            transform: scale(1.1);
        }

        .heart-icon svg {
            width: 20px;
            height: 20px;
            fill: none;
            stroke: #4E342E;
            stroke-width: 2;
        }

        .recipe-content {
            padding: 25px;
        }

        .recipe-category {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 12px;
            color: #8BAC65;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .recipe-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 20px;
            color: #4E342E;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .recipe-description {
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: 14px;
            color: #666;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .recipe-rating {
            display: flex;
            gap: 3px;
            margin-bottom: 15px;
        }

        .star {
            width: 16px;
            height: 16px;
        }

        .star.filled {
            color: #FFD700;
        }

        .star.empty {
            color: #ddd;
        }

        .small-cards-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .small-recipe-card {
            display: flex;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(78, 52, 46, 0.1);
            transition: all 0.3s ease;
            position: relative;
            min-height: 180px;
            height: auto;
        }

        .small-recipe-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 52, 46, 0.12);
        }

        .small-recipe-image {
            width: 140px;
            min-height: 180px;
            object-fit: cover;
            flex-shrink: 0;
            border-radius: 15px 0 0 15px;
        }

        .small-recipe-content {
            padding: 18px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            gap: 8px;
        }

        .small-recipe-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 13px;
            color: #4E342E;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex-shrink: 0;
        }

        .small-recipe-description {
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: 11px;
            color: #666;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .small-recipe-meta {
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: 10px;
            color: #999;
            margin-top: auto;
        }

        .small-recipe-author {
            font-size: 10px;
            color: #999;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .time-info {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .clock-icon {
            width: 12px;
            height: 12px;
            fill: #999;
        }

        .small-recipe-rating {
            display: flex;
            gap: 2px;
            font-size: 12px;
        }

        .small-heart-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .small-heart-icon:hover {
            background: rgba(139, 172, 101, 0.2);
            transform: scale(1.1);
        }

        .small-heart-icon svg {
            width: 16px;
            height: 16px;
            fill: none;
            stroke: #4E342E;
            stroke-width: 2;
        }

        @media (max-width: 768px) {
            .recipe-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .small-cards-grid {
                grid-template-columns: 1fr;
            }
            
            .small-recipe-card {
                min-height: 160px;
            }
            
            .small-recipe-image {
                width: 120px;
                min-height: 160px;
            }
            
            .small-recipe-content {
                padding: 15px;
            }
            
            .small-recipe-title {
                font-size: 12px;
                -webkit-line-clamp: 2;
            }
        }

        @media (max-width: 480px) {
            .small-recipe-card {
                flex-direction: column;
                min-height: auto;
            }
            
            .small-recipe-image {
                width: 100%;
                min-height: 150px;
                border-radius: 15px 15px 0 0;
            }
            
            .small-recipe-title {
                -webkit-line-clamp: 2;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="main-title">Topik Populer</h1>
        
        <!-- Main Recipe Cards -->
        <div class="recipe-grid">
            <!-- Grilled Chicken Salad -->
            <div class="recipe-card">
                <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=500&h=300&fit=crop" alt="Grilled Chicken Salad" class="recipe-image">
                <div class="heart-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </div>
                <div class="recipe-content">
                    <div class="recipe-category">HEALTHY GRILLED CHICKEN SALAD RECIPE (Greek Style)</div>
                    <h2 class="recipe-title">Makanan Sehat untuk Pemula: Panduan 7 Hari Awal</h2>
                    <p class="recipe-description">Tips dan menu sederhana untuk mulai hidup sehat tanpa ribet. Cocok buat kamu yang baru mulai jaga pola makan.</p>
                    <div class="recipe-rating">
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star empty">☆</span>
                    </div>
                </div>
            </div>
            
            <!-- Plant-Based Power Bowl -->
            <div class="recipe-card">
                <img src="https://images.unsplash.com/photo-1515543237350-b3eea1ec8082?w=500&h=300&fit=crop" alt="Plant-Based Power Bowl" class="recipe-image">
                <div class="heart-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </div>
                <div class="recipe-content">
                    <div class="recipe-category">PLANT - BASED POWER BOWL</div>
                    <h2 class="recipe-title">Sarapan Sehat: Pilihan Cepat dan Bergizi untuk Setiap Hari</h2>
                    <p class="recipe-description">Ide sarapan anti-bosan dan praktis yang bantu kamu tetap semangat sepanjang hari.</p>
                    <div class="recipe-rating">
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star empty">☆</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Small Recipe Cards -->
        <div class="small-cards-grid">
            <!-- Cara Mengatur Porsi Makan -->
            <div class="small-recipe-card">
                <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=200&h=150&fit=crop" alt="Mengatur Porsi Makan" class="small-recipe-image">
                <div class="small-heart-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </div>
                <div class="small-recipe-content">
                    <h3 class="small-recipe-title">Cara Mengatur Porsi Makan Agar Tetap Kenyang Tanpa Kalori Berlebih</h3>
                    <p class="small-recipe-description">Panduan visual & trik makan agar tetap puas tapi tidak berlebihan kalori.</p>
                    <div class="small-recipe-meta">
                        <div class="small-recipe-rating">
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star empty">☆</span>
                            <span class="star empty">☆</span>
                        </div>
                        <div class="small-recipe-author">
                            <span>Ditulis oleh: Graciella Yeriza Natalie</span>
                            <div class="time-info">
                                <i class="far fa-clock"></i>
                                <span>6 jam lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bahaya Makan Tengah Malam -->
            <div class="small-recipe-card">
                <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307?w=200&h=150&fit=crop" alt="Makan Tengah Malam" class="small-recipe-image">
                <div class="small-heart-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </div>
                <div class="small-recipe-content">
                    <h3 class="small-recipe-title">Bahaya Makan Tengah Malam & Tips Menghindarinya</h3>
                    <p class="small-recipe-description">Panduan visual & trik makan agar tetap puas tapi tidak berlebihan kalori.</p>
                    <div class="small-recipe-meta">
                        <div class="small-recipe-rating">
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star empty">☆</span>
                            <span class="star empty">☆</span>
                        </div>
                        <div class="small-recipe-author">
                            <span>Penulis: Graciella Yeriza Natalie</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Snack Sehat Camilan -->
            <div class="small-recipe-card">
                <img src="https://images.unsplash.com/photo-1559181567-c3190ca9959b?w=200&h=150&fit=crop" alt="Snack Sehat" class="small-recipe-image">
                <div class="small-heart-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </div>
                <div class="small-recipe-content">
                    <h3 class="small-recipe-title">Snack Sehat: Camilan Enak yang Nggak Bikin Berat Badan Naik</h3>
                    <p class="small-recipe-description">Ganti keripik dan gorengan dengan camilan sehat yang tetap lezat dan mudah dibuat.</p>
                    <div class="small-recipe-meta">
                        <div class="small-recipe-rating">
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star empty">☆</span>
                            <span class="star empty">☆</span>
                        </div>
                        <div class="small-recipe-author">
                            <span>Penulis: Graciella Yeriza Natalie</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Minuman Rendah Kalori -->
            <div class="small-recipe-card">
                <img src="https://images.unsplash.com/photo-1544145945-f90425340c7e?w=200&h=150&fit=crop" alt="Minuman Sehat" class="small-recipe-image">
                <div class="small-heart-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </div>
                <div class="small-recipe-content">
                    <h3 class="small-recipe-title">Minum yang Bikin Sehat: Pilihan Minuman Rendah Kalori yang Menyegarkan</h3>
                    <p class="small-recipe-description">Ganti keripik dan gorengan dengan camilan sehat yang tetap lezat dan mudah dibuat.</p>
                    <div class="small-recipe-meta">
                        <div class="small-recipe-rating">
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star empty">☆</span>
                            <span class="star empty">☆</span>
                        </div>
                        <div class="small-recipe-author">
                            <span>Penulis: Graciella Yeriza Natalie</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>