{{-- Artikel Section --}}
<style>
    .artikel-section {
        background-color: #f8f9fa;
        padding: 40px 20px;
        font-family: 'Poppins', sans-serif;
    }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-title {
            color: #4E342E;
            font-family: 'Poppins', sans-serif;
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .articles-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: start;
        }

        /* Main Article - Left Side */
        .main-article-container {
            display: flex;
            flex-direction: column;
            height: auto;
        }

        .main-article-image {
            width: 100%;
            height: 260px;
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 16px;
            position: relative;
            flex-shrink: 0;
        }

        .main-article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .main-article-content {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .main-category-tag {
            display: inline-flex;
            align-items: center;
            background-color: #e8f5e8;
            color: #4a7c59;
            padding: 6px 14px;
            border-radius: 20px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 12px;
            width: fit-content;
        }

        .main-category-icon {
            width: 20px;
            height: 20px;
            background-image: url('image/fluent_food-fish-20-filled.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            margin-right: 8px;
        }

        .main-article-content h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 22px;
            font-weight: 600;
            line-height: 1.3;
            margin-bottom: 12px;
            color: #333;
        }

        .main-article-desc {
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            line-height: 1.5;
            color: #666;
            margin-bottom: 20px;
        }

        .main-article-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            color: #999;
        }

        .main-article-meta .author {
            font-weight: 600;
            color: #666;
        }

        .time-info {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .clock-icon {
            width: 14px;
            height: 14px;
            color: #999;
            font-size: 12px;
        }

        .main-article-actions {
            display: flex;
            align-items: center;
            gap: 12px;
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
        }

        .main-action-btn:hover {
            background-color: #A5C866;
            transform: translateY(-1px);
        }

        .main-bookmark-btn {
            background: transparent;
            border: none;
            color: #666;
            padding: 8px;
            border-radius: 8px;
            cursor: pointer;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .main-bookmark-btn:hover {
            background: rgba(180, 214, 120, 0.1);
            color: #B4D678;
        }

        .main-bookmark-btn svg {
            width: 24px;
            height: 24px;
        }

<<<<<<< HEAD
=======
        /* Favorited state: apply consistent green immediately */
        .main-bookmark-btn.favorited,
        .sidebar-bookmark-btn.favorited {
            color: #B4D678;
        }

>>>>>>> jonathan
        /* Right Side Articles */
        .sidebar-articles {
            display: flex;
            flex-direction: column;
            gap: 18px;
            height: auto;
        }

        .sidebar-article {
            display: flex;
            gap: 16px;
            align-items: flex-start;
            height: 158px;
            flex-shrink: 0;
        }

        .sidebar-article-image {
            width: 140px;
            height: 120px;
            flex-shrink: 0;
            border-radius: 15px;
            overflow: hidden;
            background-color: #f0f0f0;
            margin-top: 2px;
        }

        .sidebar-article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sidebar-article-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 120px;
            justify-content: space-between;
            padding-top: 2px;
        }

        .sidebar-content-top {
            flex-grow: 1;
        }

        .sidebar-category-tag {
            display: inline-flex;
            align-items: center;
            background-color: transparent;
            color: #4a7c59;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 8px;
            width: fit-content;
        }

        .sidebar-category-icon {
            width: 18px;
            height: 18px;
            background-image: url('image/fluent_food-fish-20-filled.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            margin-right: 6px;
        }

        .sidebar-article h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            font-weight: 600;
            color: #333;
            line-height: 1.2;
            margin-bottom: 6px;
        }

        .sidebar-article-desc {
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            color: #666;
            line-height: 1.3;
            margin-bottom: 6px;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .sidebar-article-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: auto;
        }

        .sidebar-author-info {
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            color: #999;
            flex: 1;
        }

        .sidebar-author-info .author {
            font-weight: 600;
            color: #666;
        }

        .sidebar-article-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-action-btn {
            background-color: #B4D678;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .sidebar-action-btn:hover {
            background-color: #A5C866;
            transform: translateY(-1px);
        }

        .sidebar-bookmark-btn {
            background: transparent;
            border: none;
            padding: 6px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
        }

        .sidebar-bookmark-btn svg {
            width: 20px;
            height: 20px;
        }

        .sidebar-bookmark-btn:hover {
            background: rgba(180, 214, 120, 0.1);
            color: #B4D678;
        }

        @media (max-width: 768px) {
            .articles-layout {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .page-title {
                font-size: 24px;
                margin-bottom: 20px;
            }

            .main-article-container {
                height: auto;
            }

            .main-article-image {
                height: 250px;
            }

            .main-article-content h2 {
                font-size: 20px;
            }

            .sidebar-articles {
                gap: 20px;
                height: auto;
            }

            .sidebar-article {
                height: 120px;
            }

            .sidebar-article-image {
                width: 120px;
                height: 90px;
            }

            .sidebar-article h3 {
                font-size: 16px;
            }

            .main-article-meta {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .main-article-actions {
                width: 100%;
                justify-content: flex-start;
            }
        }
    </style>

    <div class="artikel-section">
        <div class="container">
        <h1 class="page-title">Artikel Terbaru</h1>

        <div class="articles-layout">
            <!-- Left Side - Main Article -->
            <div class="main-article-container">
                <div class="main-article-image">
                    <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2053&q=80" alt="Mulai Hari dengan Sarapan Seimbang">
                </div>
                <div class="main-article-content">
                    <div class="main-category-tag">
                        <div class="main-category-icon"></div>
                        Pola Makan Sehat
                    </div>
                    <h2>Mulai Hari dengan Sarapan Seimbang</h2>
                    <p class="main-article-desc">Sarapan bukan cuma soal kenyang. Artikel ini membahas kombinasi karbohidrat kompleks, protein, dan serat untuk energi maksimal seharian.</p>
                    <div class="main-article-meta">
                        <span>Ditinjau: <span class="author">Graciella Yeriza Natalie</span> <span class="time-info">
                            <i class="fas fa-clock clock-icon"></i>
                            12 jam lalu</span></span>
                        <div class="main-article-actions">
                            <button class="main-action-btn" onclick="window.location.href='{{ route('artikel.sarapan-seimbang') }}'">Selengkapnya</button>
<<<<<<< HEAD
                            <button class="main-bookmark-btn">
=======
                            <button class="main-bookmark-btn" onclick="toggleBookmark(this, 'sarapan-seimbang', 'Mulai Hari dengan Sarapan Seimbang', 'pola-makan-sehat', 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2053&q=80', 'Sarapan bukan cuma soal kenyang. Artikel ini membahas kombinasi karbohidrat kompleks, protein, dan serat untuk energi maksimal seharian.', 'Graciella Yeriza Natalie', '{{ route('artikel.sarapan-seimbang') }}')">
>>>>>>> jonathan
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Sidebar Articles -->
            <div class="sidebar-articles">
                <!-- Article 1 -->
                <div class="sidebar-article">
                    <div class="sidebar-article-image">
                        <img src="https://images.unsplash.com/photo-1619566636858-adf3ef46400b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Buah Lokal, Gizi Maksimal">
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
                                <span>Penulis: <span class="author">Graciella Yeriza N</span></span>
                            </div>
                            <div class="sidebar-article-actions">
                                <button class="sidebar-action-btn">selengkapnya</button>
<<<<<<< HEAD
                                <button class="sidebar-bookmark-btn">
=======
                                <button class="sidebar-bookmark-btn" onclick="toggleBookmark(this, 'buah-lokal-gizi', 'Buah Lokal, Gizi Maksimal', 'pola-makan-sehat', 'https://images.unsplash.com/photo-1619566636858-adf3ef46400b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80', 'Mengapa apel malang atau pisang kepok lebih baik dari buah impor? Kenali manfaat buah lokal yang sering diremehan.', 'Graciella Yeriza N', '#')">
>>>>>>> jonathan
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article 2 -->
                <div class="sidebar-article">
                    <div class="sidebar-article-image">
                        <img src="https://images.unsplash.com/photo-1576045057995-568f588f82fb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2080&q=80" alt="Sayuran Hijau: Sumber Serat dan Antioksidan">
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
                                <button class="sidebar-action-btn">selengkapnya</button>
<<<<<<< HEAD
                                <button class="sidebar-bookmark-btn">
=======
                                <button class="sidebar-bookmark-btn" onclick="toggleBookmark(this, 'sayuran-hijau-serat', 'Sayuran Hijau: Sumber Serat dan Antioksidan', 'pola-makan-sehat', 'https://images.unsplash.com/photo-1576045057995-568f588f82fb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2080&q=80', 'Tak suka sayur? Coba trik mudah ini agar sayuran jadi lebih nikmat dan tetap kaya nutrisi.', 'Graciella Yeriza N', '#')">
>>>>>>> jonathan
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article 3 -->
                <div class="sidebar-article">
                    <div class="sidebar-article-image">
                        <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Hidrasi: Minum Air dengan Cara yang Benar">
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
                                <button class="sidebar-action-btn">selengkapnya</button>
<<<<<<< HEAD
                                <button class="sidebar-bookmark-btn">
=======
                                <button class="sidebar-bookmark-btn" onclick="toggleBookmark(this, 'hidrasi-minum-air', 'Hidrasi: Minum Air dengan Cara yang Benar', 'pola-makan-sehat', 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80', 'Ternyata minum air terlalu cepat juga bisa berdampak kurang baik. Simak tips minum air dengan benar di sini.', 'Graciella Yeriza N', '#')">
>>>>>>> jonathan
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
            </div>
        </div>
    </div>
</div>
=======

            </div>
        </div>
    </div>
</div>

<script>
// CSRF Token for AJAX requests - set globally for all scripts
window.csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
const csrfToken = window.csrfToken;

// Provide guest flags globally so any component can use them
window.isGuest = {!! auth()->guard()->guest() ? 'true' : 'false' !!};
window.loginUrl = '{{ route('login') }}';

// Global guard: if guest clicks any save/love/bookmark element, redirect to login
document.addEventListener('click', function(e) {
    if (!window.isGuest) return;
    const clickable = e.target.closest('.main-bookmark-btn, .sidebar-bookmark-btn, .heart-icon, .small-heart');
    if (clickable) {
        e.preventDefault();
        // Native browser alert
        alert('Silakan login terlebih dahulu untuk menyimpan artikel');
        window.location.href = window.loginUrl;
    }
}, true);

// Toggle bookmark function (renamed to avoid collision with topik.blade.php)
async function toggleBookmark(button, articleId, title, category, image, description, author, url) {
    // Debug log
    console.log('=== TOGGLE FAVORITE CLICKED ===');
    console.log('Article ID:', articleId);
    console.log('Button element:', button);
    console.log('Button color:', button.style.color);
    
    // Check if user is authenticated
    @guest
        // Tampilkan peringatan lalu arahkan ke login
        alert('Silakan login terlebih dahulu untuk menyimpan artikel');
        window.location.href = '{{ route("login") }}';
        return;
    @endguest

    // Prevent multiple clicks
    if (button.dataset.processing === 'true') {
        console.log('Already processing, ignoring click');
        return;
    }
    button.dataset.processing = 'true';

    try {
        // Determine current state by class to avoid CSS/computed color issues
        const isCurrentlyFavorited = button.classList.contains('favorited');
        console.log('Bookmark button clicked - currently favorited:', isCurrentlyFavorited);

        let response;
        if (isCurrentlyFavorited) {
            // Remove from favorites
            console.log('REMOVING from favorites:', articleId);
            response = await fetch('/favorites', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    article_id: articleId
                })
            });
        } else {
            // Add to favorites
            console.log('ADDING to favorites:', articleId);
            response = await fetch('/favorites', {
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
        }

        const data = await response.json();
        console.log('Response status:', response.status);
        console.log('Response data:', data);

        if (data.success) {
            // Update button appearance - toggle the state
            updateBookmarkButton(button, !isCurrentlyFavorited);
            showNotification(data.message, 'success');
            console.log('Updated button to state:', !isCurrentlyFavorited);
        } else if (response.status === 409) {
            // Handle duplicate - treat as success
            updateBookmarkButton(button, true);
            showNotification('Artikel sudah ada di favorit', 'success');
        } else {
            showNotification(data.message || 'Terjadi kesalahan', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        console.error('Full error details:', error);
        console.error('Error stack:', error.stack);
        showNotification('Terjadi kesalahan saat menyimpan artikel', 'error');
    } finally {
        // Reset processing flag
        button.dataset.processing = 'false';
        console.log('=== TOGGLE FAVORITE FINISHED ===');
    }
}

// Update bookmark button appearance
function updateBookmarkButton(button, isFavorited) {
    const svg = button.querySelector('svg');
    const path = button.querySelector('svg path');
    if (!svg || !path) return;

    if (isFavorited) {
        // Apply green color consistently and fill the icon
        button.classList.add('favorited');
        svg.style.color = '#B4D678';
        path.setAttribute('fill', 'currentColor');
        path.setAttribute('stroke', 'currentColor');
        button.title = 'Hapus dari favorit';
    } else {
        // Revert to default grey outline
        button.classList.remove('favorited');
        svg.style.color = '#666';
        path.setAttribute('fill', 'none');
        path.setAttribute('stroke', 'currentColor');
        button.title = 'Simpan ke favorit';
    }
}

// Show notification
function showNotification(message, type) {
    // Create notification element
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

    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);

    // Remove after 3 seconds
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Initialize bookmark states on page load
document.addEventListener('DOMContentLoaded', async function() {
    @auth
        const bookmarkButtons = document.querySelectorAll('.main-bookmark-btn, .sidebar-bookmark-btn');
        
        for (const button of bookmarkButtons) {
            const onclick = button.getAttribute('onclick');
            if (onclick) {
                // Extract article ID from onclick attribute (supports both function names)
                const match = onclick.match(/toggle(?:Favorite|Bookmark)\(.*?'([^']+)'/);
                if (match) {
                    const articleId = match[1];
                    
                    try {
                        const response = await fetch(`/favorites/check?article_id=${articleId}`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Content-Type': 'application/json',
                            }
                        });
                        
                        const data = await response.json();
                        if (data.success) {
                            updateBookmarkButton(button, data.is_favorited);
                        }
                    } catch (error) {
                        console.error('Error checking favorite status:', error);
                    }
                }
            }
        }
    @endauth
});
</script>
>>>>>>> jonathan
