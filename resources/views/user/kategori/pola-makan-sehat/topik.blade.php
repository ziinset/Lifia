{{-- Topik Populer Section --}}
<<<<<<< HEAD
=======
<meta name="csrf-token" content="{{ csrf_token() }}">
>>>>>>> jonathan
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
<<<<<<< HEAD
=======
            color: #fff;
        }

        .heart-icon svg path[fill="red"] {
            fill: red !important;
            stroke: red !important;
        }

        .heart-icon.favorited {
            color: #B4D678 !important;
        }

        .heart-icon.favorited svg {
            stroke: #B4D678 !important;
        }

        .heart-icon.favorited svg path {
            fill: #B4D678 !important;
            stroke: #B4D678 !important;
>>>>>>> jonathan
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
<<<<<<< HEAD
=======
            color: #fff;
        }

        .small-heart svg path[fill="red"] {
            fill: red !important;
            stroke: red !important;
        }

        .small-heart.favorited {
            color: #B4D678 !important;
        }

        .small-heart.favorited svg {
            stroke: #B4D678 !important;
        }

        .small-heart.favorited svg path {
            fill: #B4D678 !important;
            stroke: #B4D678 !important;
>>>>>>> jonathan
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
<<<<<<< HEAD
                        <div class="heart-icon">
=======
                        <div class="heart-icon" onclick="toggleFavorite(this, 'makanan-sehat-pemula', 'Makanan Sehat untuk Pemula: Panduan 7 Hari Awal', 'pola-makan-sehat', 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&h=400&fit=crop&crop=center', 'Tips dan menu sederhana untuk mulai hidup sehat tanpa ribet. Cocok buat kamu yang baru mulai jaga pola makan.', 'Graciella Yeriza N', '#')">
>>>>>>> jonathan
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
<<<<<<< HEAD
                        <div class="heart-icon">
=======
                        <div class="heart-icon" onclick="toggleFavorite(this, 'sarapan-sehat-cepat', 'Sarapan Sehat: Pilihan Cepat dan Bergizi untuk Setiap Hari', 'pola-makan-sehat', 'https://images.unsplash.com/photo-1515543237350-b3eea1ec8082?w=600&h=400&fit=crop&crop=center', 'Ide sarapan anti-bosan dan praktis yang bantu kamu tetap semangat sepanjang hari.', 'Graciella Yeriza N', '#')">
>>>>>>> jonathan
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
<<<<<<< HEAD
                        <div class="small-heart">
=======
                        <div class="small-heart" onclick="toggleFavorite(this, 'mengatur-porsi-makan', 'Cara Mengatur Porsi Makan Agar Tetap Kenyang Tanpa Kalori Berlebih', 'pola-makan-sehat', 'https://images.unsplash.com/photo-1544025162-d76694265947?w=300&h=300&fit=crop&crop=center', 'Panduan visual & trik makan agar tetap puas tapi tidak berlebihan kalori.', 'Graciella Yeriza Natalie', '#')">
>>>>>>> jonathan
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
<<<<<<< HEAD
                        <div class="small-heart">
=======
                        <div class="small-heart" onclick="toggleFavorite(this, 'bahaya-makan-tengah-malam', 'Bahaya Makan Tengah Malam & Tips Menghindarinya', 'pola-makan-sehat', 'https://images.unsplash.com/photo-1574484284002-952d92456975?w=300&h=300&fit=crop&crop=center', 'Panduan visual & trik makan agar tetap puas tapi tidak berlebihan kalori.', 'Graciella Yeriza Natalie', '#')">
>>>>>>> jonathan
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
<<<<<<< HEAD
                        <div class="small-heart">
=======
                        <div class="small-heart" onclick="toggleFavorite(this, 'snack-sehat-camilan', 'Snack Sehat: Camilan Enak yang Nggak Bikin Berat Badan Naik', 'pola-makan-sehat', 'https://images.unsplash.com/photo-1607532941433-304659e8198a?w=300&h=300&fit=crop&crop=center', 'Ganti keripik dan gorengan dengan camilan sehat yang tetap lezat dan mudah dibuat.', 'Graciella Yeriza Natalie', '#')">
>>>>>>> jonathan
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
<<<<<<< HEAD
                        <div class="small-heart">
=======
                        <div class="small-heart" onclick="toggleFavorite(this, 'minuman-sehat-rendah-kalori', 'Minum yang Bikin Sehat: Pilihan Minuman Rendah Kalori yang Menyegarkan', 'pola-makan-sehat', 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=300&h=300&fit=crop&crop=center', 'Ganti minuman manis dengan pilihan sehat yang tetap segar dan nikmat sepanjang hari.', 'Graciella Yeriza Natalie', '#')">
>>>>>>> jonathan
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
<<<<<<< HEAD
    </div>
=======
    </div>

<script>
// CSRF Token will be available from bagianartikel.blade.php via window.csrfToken

// Toggle favorite function
async function toggleFavorite(button, articleId, title, category, image, description, author, url) {
    // Check if user is authenticated
    @guest
        // Arahkan langsung ke halaman login jika belum login
        window.location.href = '{{ route('login') }}';
        return;
    @endguest

    // Prevent multiple clicks
    if (button.dataset.processing === 'true') {
        return;
    }
    button.dataset.processing = 'true';

    // Check if currently favorited by looking at the class
    const isCurrentlyFavorited = button.classList.contains('favorited');
    console.log('Heart icon clicked - currently favorited:', isCurrentlyFavorited);

    try {
        if (isCurrentlyFavorited) {
            // Remove from favorites
            const response = await fetch('/favorites', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    article_id: articleId
                })
            });

            const data = await response.json();

            if (data.success) {
                // Update heart icon appearance
                updateHeartIcon(button, false);
                showNotification('Artikel berhasil dihapus dari favorit', 'success');
            } else {
                showNotification(data.message || 'Gagal menghapus dari favorit', 'error');
            }
        } else {
            // Add to favorites
            const response = await fetch('/favorites', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    article_id: articleId,
                    article_title: title,
                    article_category: category,
                    article_image: image,
                    article_description: description,
                    article_author: author,
                    article_url: url
                })
            });

            const data = await response.json();

            if (data.success) {
                // Update heart icon appearance
                updateHeartIcon(button, true);
                showNotification('Artikel berhasil disimpan ke favorit', 'success');
            } else if (response.status === 409) {
                // Handle duplicate - article already favorited, so remove it instead
                console.log('Article already favorited, removing instead');
                const deleteResponse = await fetch('/favorites', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': window.csrfToken,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        article_id: articleId
                    })
                });
                
                const deleteData = await deleteResponse.json();
                if (deleteData.success) {
                    updateHeartIcon(button, false);
                    showNotification('Artikel berhasil dihapus dari favorit', 'success');
                } else {
                    showNotification('Gagal menghapus dari favorit', 'error');
                }
            } else {
                showNotification(data.message || 'Gagal menyimpan ke favorit', 'error');
            }
        }
    } catch (error) {
        console.error('Error toggling favorite:', error);
        showNotification('Terjadi kesalahan. Silakan coba lagi.', 'error');
    } finally {
        button.dataset.processing = 'false';
    }
}

// Show notification function
function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? '#B4D678' : '#ff6b6b'};
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 500;
        z-index: 9999;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        transform: translateX(100%);
        transition: transform 0.3s ease;
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);

    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (document.body.contains(notification)) {
                document.body.removeChild(notification);
            }
        }, 300);
    }, 3000);
}

// Check favorite status on page load
document.addEventListener('DOMContentLoaded', async function() {
    // Check for Laravel session flash messages
    @if(session('success'))
        showNotification('{{ session('success') }}', 'success');
    @endif
    
    @if(session('error'))
        showNotification('{{ session('error') }}', 'error');
    @endif
    
    // Check for success message in URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const successMessage = urlParams.get('success');
    const errorMessage = urlParams.get('error');
    
    if (successMessage) {
        showNotification(decodeURIComponent(successMessage), 'success');
        // Clean URL without refreshing page
        window.history.replaceState({}, document.title, window.location.pathname);
    }
    
    if (errorMessage) {
        showNotification(decodeURIComponent(errorMessage), 'error');
        // Clean URL without refreshing page
        window.history.replaceState({}, document.title, window.location.pathname);
    }
    
    @auth
        // Add small delay to ensure DOM is fully ready
        setTimeout(async () => {
            console.log('Starting to check favorite status for all heart icons...');
            const heartIcons = document.querySelectorAll('.heart-icon, .small-heart');
            console.log('Found', heartIcons.length, 'heart icons');
            
            for (const heartIcon of heartIcons) {
                const onclick = heartIcon.getAttribute('onclick');
                if (onclick) {
                    // Extract article ID from onclick attribute
                    const match = onclick.match(/toggleFavorite\(this,\s*'([^']+)'/);
                    if (match) {
                        const articleId = match[1];
                        console.log('Checking favorite status for article:', articleId);
                        await checkFavoriteStatus(heartIcon, articleId);
                        // Small delay between requests
                        await new Promise(resolve => setTimeout(resolve, 100));
                    }
                }
            }
            console.log('Finished checking all heart icons');
        }, 500);
    @endauth
});

// Update heart icon appearance (same as bagianartikel.blade.php)
function updateHeartIcon(heartIcon, isFavorited) {
    const svgEl = heartIcon.querySelector('svg');
    const path = heartIcon.querySelector('svg path');
    console.log('Updating heart icon for favorited:', isFavorited);
    if (!path) return;

    if (isFavorited) {
        // Favorited: fill green and set color so currentColor resolves correctly
        heartIcon.classList.add('favorited');
        if (svgEl) svgEl.style.color = '#B4D678';
        path.setAttribute('fill', 'currentColor');
        path.setAttribute('stroke', 'currentColor');
        heartIcon.title = 'Hapus dari favorit';
        console.log('Added favorited class and set fill to currentColor');
    } else {
        // Not favorited: remove fill and revert color to white
        heartIcon.classList.remove('favorited');
        if (svgEl) svgEl.style.color = '#fff';
        path.setAttribute('fill', 'none');
        path.setAttribute('stroke', 'currentColor');
        heartIcon.title = 'Simpan ke favorit';
        console.log('Removed favorited class and set fill to none');
    }
}

// Check if article is already favorited
async function checkFavoriteStatus(heartIcon, articleId) {
    try {
        console.log('Making API call to check favorite status for:', articleId);
        const response = await fetch(`/favorites/check?article_id=${articleId}`, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': window.csrfToken,
                'Content-Type': 'application/json',
            },
        });

        const data = await response.json();
        console.log('API response for', articleId, ':', data);
        
        if (data.success) {
            console.log('Article', articleId, 'is favorited:', data.is_favorited);
            updateHeartIcon(heartIcon, data.is_favorited);
        } else {
            console.log('API call failed for', articleId, ':', data.message);
        }
    } catch (error) {
        console.error('Error checking favorite status for', articleId, ':', error);
    }
}
</script>
>>>>>>> jonathan
