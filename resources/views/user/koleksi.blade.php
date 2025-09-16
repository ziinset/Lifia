<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            max-width: 100vw;
        }
        
        html {
            overflow-x: hidden;
            max-width: 100vw;
        }

        .profil-container {
            display: flex;
            height: 100vh;
            overflow-x: hidden;
            max-width: 100vw;
        }
        
        /* Main Content - Same spacing as dashboard */
        .main {
            flex: 1;
            margin-left: 16rem;
            padding: 0;
            overflow-y: auto;
            overflow-x: hidden;
            background: #FCFAF6;
            position: relative;
            height: 100vh;
            z-index: 1;
            max-width: calc(100vw - 16rem);
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
            position: relative;
            z-index: 998;
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

        /* Loading spinner animation */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 8px 25px rgba(180, 214, 120, 0.4);
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
            position: relative;
            z-index: 1;
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
            z-index: 1;
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
            display: flex;
            flex-direction: column;
            height: 180px;
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

        /* Simple Filter Styles */
        .filter-container {
            position: relative;
            display: inline-block;
            z-index: 998;
        }

        .filter-dropdown {
            position: fixed;
            background: white;
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15), 0 4px 20px rgba(0, 0, 0, 0.1);
            min-width: 240px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20px);
            transition: all 0.3s ease-out;
            z-index: 998;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transform-origin: top center;
        }

        .filter-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .filter-option {
            padding: 16px 20px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 500;
            color: #4E342E;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-bottom: 1px solid rgba(229, 231, 235, 0.3);
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            overflow: hidden;
        }

        .filter-option::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(135deg, #B4D678 0%, #A3BE74 100%);
            transition: width 0.3s ease;
            z-index: -1;
        }

        .filter-option:first-child {
            border-radius: 16px 16px 0 0;
        }

        .filter-option:last-child {
            border-bottom: none;
            border-radius: 0 0 16px 16px;
        }

        .filter-option:hover {
            background: linear-gradient(135deg, rgba(180, 214, 120, 0.1) 0%, rgba(163, 190, 116, 0.1) 100%);
            color: #799549;
        }

        .filter-option:hover::before {
            width: 4px;
        }

        .filter-option.active {
            background: linear-gradient(135deg, #B4D678 0%, #A3BE74 100%);
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(180, 214, 120, 0.3);
        }

        .filter-option.active::before {
            width: 100%;
        }

        .filter-option i {
            font-size: 16px;
            width: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .filter-option:hover i {
            transform: scale(1.1);
        }

        .filter-icon-category {
            width: 16px;
            height: 16px;
            border-radius: 50%;
        }

        .icon-all { background-color: #6c757d; }
        .icon-pola-makan { background-color: #4a7c59; }
        .icon-aktivitas { background-color: #ff6b6b; }
        .icon-mental { background-color: #4ecdc4; }
        .icon-perawatan { background-color: #ffe66d; }
        .icon-vegan { background-color: #95e1d3; }
        .icon-eco { background-color: #a8e6cf; }

        /* Article category data attributes for filtering */
        .article-card[data-category="pola-makan-sehat"] { display: block; }
        .article-card[data-category="aktivitas-fisik"] { display: block; }
        .article-card[data-category="kesehatan-mental"] { display: block; }
        .article-card[data-category="perawatan-diri"] { display: block; }
        .article-card[data-category="vegan"] { display: block; }
        .article-card[data-category="eco-living"] { display: block; }

        .article-card.hidden {
            display: none !important;
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
                    <div class="filter-container">
                        <button class="filter-btn" onclick="toggleFilterDropdown()">
                            <i class="fas fa-sliders-h"></i>
                            Filter
                        </button>
                        <div class="filter-dropdown" id="filterDropdown">
                            <div class="filter-option active" onclick="filterArticles('all')">
                                <i class="fas fa-th-large"></i>
                                Tunjukkan Semua
                            </div>
                            <div class="filter-option" onclick="filterArticles('pola-makan-sehat')">
                                <i class="fas fa-apple-alt"></i>
                                Pola Makan Sehat
                            </div>
                            <div class="filter-option" onclick="filterArticles('aktivitas-fisik')">
                                <i class="fas fa-dumbbell"></i>
                                Aktivitas Fisik
                            </div>
                            <div class="filter-option" onclick="filterArticles('kesehatan-mental')">
                                <i class="fas fa-brain"></i>
                                Kesehatan Mental
                            </div>
                            <div class="filter-option" onclick="filterArticles('perawatan-diri')">
                                <i class="fas fa-spa"></i>
                                Perawatan Diri
                            </div>
                            <div class="filter-option" onclick="filterArticles('vegan')">
                                <i class="fas fa-leaf"></i>
                                Vegan
                            </div>
                            <div class="filter-option" onclick="filterArticles('eco-living')">
                                <i class="fas fa-globe-americas"></i>
                                Eco Living
                            </div>
                        </div>
                    </div>
                </div>

                <div class="articles-grid" id="articlesGrid">
                    <!-- Articles will be loaded dynamically via JavaScript -->
                    <div id="noArticles" class="no-articles" style="display: none; text-align: center; padding: 60px 20px; grid-column: 1 / -1;">
                        <i class="fas fa-bookmark" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
                        <h3 style="color: #666; font-size: 20px; margin-bottom: 10px;">Belum Ada Artikel Favorit</h3>
                        <p style="color: #999; font-size: 14px;">Mulai simpan artikel favorit Anda dengan mengklik ikon bookmark pada artikel yang Anda sukai.</p>
                    </div>
                    
                    <div id="loadingArticles" class="loading-articles" style="display: block; text-align: center; padding: 60px 20px; grid-column: 1 / -1;">
                        <div style="display: inline-block; width: 40px; height: 40px; border: 4px solid #f3f3f3; border-top: 4px solid #B4D678; border-radius: 50%; animation: spin 1s linear infinite;"></div>
                        <p style="color: #666; margin-top: 20px;">Memuat artikel favorit...</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Global variables
        let allFavorites = [];
        let currentFilter = 'all';
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

        // Load favorites on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadFavorites();
        });

        // Load favorites from server
        async function loadFavorites() {
            try {
                const response = await fetch('/favorites', {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                    }
                });

                const data = await response.json();
                
                if (data.success) {
                    allFavorites = data.favorites;
                    displayFavorites(allFavorites);
                } else {
                    showNoArticles();
                }
            } catch (error) {
                console.error('Error loading favorites:', error);
                showNoArticles();
            }
            
            // Hide loading spinner
            document.getElementById('loadingArticles').style.display = 'none';
        }

        // Display favorites
        function displayFavorites(favorites) {
            const articlesGrid = document.getElementById('articlesGrid');
            const noArticles = document.getElementById('noArticles');
            const loadingArticles = document.getElementById('loadingArticles');

            // Clear existing articles (except loading and no-articles divs)
            const existingArticles = articlesGrid.querySelectorAll('.article-card');
            existingArticles.forEach(article => article.remove());

            if (favorites.length === 0) {
                showNoArticles();
                return;
            }

            noArticles.style.display = 'none';
            loadingArticles.style.display = 'none';

            favorites.forEach((favorite, index) => {
                const articleCard = createArticleCard(favorite, index);
                articlesGrid.appendChild(articleCard);
            });
        }

        // Create article card element
        function createArticleCard(favorite, index) {
            const card = document.createElement('div');
            card.className = 'article-card';
            card.setAttribute('data-category', favorite.article_category);
            card.style.animationDelay = `${(index % 6) * 0.1}s`;

            const timeAgo = getTimeAgo(favorite.created_at);
            const imageUrl = favorite.article_image || 'image/default-article.png';

            card.innerHTML = `
                <img src="${imageUrl}" alt="${favorite.article_title}" class="article-image" onerror="this.src='image/default-article.png'">
                <div class="article-content">
                    <h3 class="article-title">${favorite.article_title}</h3>
                    <div style="margin-top: auto;">
                        <p class="article-time" style="margin: 0 0 8px 0; font-size: 12px; color: #888;">Disimpan ${timeAgo}</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <button class="read-btn" onclick="window.open('${favorite.article_url || '#'}', '_blank')">
                                Baca Sekarang
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="remove-favorite-btn" onclick="removeFavorite('${favorite.article_id}')" title="Hapus dari favorit" style="background: transparent; border: none; color: #ff6b6b; padding: 8px; border-radius: 6px; cursor: pointer; transition: all 0.3s ease;">
                                <i class="fas fa-trash" style="font-size: 14px;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;

            return card;
        }

        // Remove favorite
        async function removeFavorite(articleId) {
            if (!confirm('Hapus artikel dari favorit?')) {
                return;
            }

            try {
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
                    // Remove from allFavorites array
                    allFavorites = allFavorites.filter(fav => fav.article_id !== articleId);
                    
                    // Re-display filtered favorites
                    const filteredFavorites = currentFilter === 'all' 
                        ? allFavorites 
                        : allFavorites.filter(fav => fav.article_category === currentFilter);
                    
                    displayFavorites(filteredFavorites);
                    
                    showNotification(data.message, 'success');
                } else {
                    showNotification(data.message || 'Gagal menghapus artikel', 'error');
                }
            } catch (error) {
                console.error('Error removing favorite:', error);
                showNotification('Terjadi kesalahan saat menghapus artikel', 'error');
            }
        }

        // Show no articles message
        function showNoArticles() {
            const noArticles = document.getElementById('noArticles');
            const loadingArticles = document.getElementById('loadingArticles');
            
            // Clear existing articles
            const articlesGrid = document.getElementById('articlesGrid');
            const existingArticles = articlesGrid.querySelectorAll('.article-card');
            existingArticles.forEach(article => article.remove());
            
            noArticles.style.display = 'block';
            loadingArticles.style.display = 'none';
        }

        // Get time ago string
        function getTimeAgo(dateString) {
            const now = new Date();
            const date = new Date(dateString);
            const diffInSeconds = Math.floor((now - date) / 1000);

            if (diffInSeconds < 60) return 'baru saja';
            if (diffInSeconds < 3600) return `${Math.floor(diffInSeconds / 60)} menit yang lalu`;
            if (diffInSeconds < 86400) return `${Math.floor(diffInSeconds / 3600)} jam yang lalu`;
            if (diffInSeconds < 2592000) return `${Math.floor(diffInSeconds / 86400)} hari yang lalu`;
            return `${Math.floor(diffInSeconds / 2592000)} bulan yang lalu`;
        }

        // Show notification
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

        // Filter dropdown functions
        function toggleFilterDropdown() {
            const dropdown = document.getElementById('filterDropdown');
            const button = event.target.closest('.filter-btn');
            const rect = button.getBoundingClientRect();
            
            dropdown.style.setProperty('top', '65px', 'important');
            dropdown.style.setProperty('right', (window.innerWidth - rect.right - 120) + 'px', 'important');
            dropdown.style.setProperty('left', 'auto', 'important');
            
            // Prevent horizontal scrolling - ensure dropdown stays within viewport
            const dropdownWidth = 240;
            const rightEdge = rect.right - 30 + dropdownWidth;
            const leftEdge = rect.right - 30 - dropdownWidth;
            
            if (rightEdge > window.innerWidth) {
                // If dropdown would overflow right, position it from right edge
                dropdown.style.setProperty('right', '10px', 'important');
                dropdown.style.setProperty('left', 'auto', 'important');
            } else if (leftEdge < 0) {
                // If dropdown would overflow left, position it from left edge
                dropdown.style.setProperty('left', '10px', 'important');
                dropdown.style.setProperty('right', 'auto', 'important');
            }
            
            dropdown.classList.toggle('show');
        }

        function filterArticles(category) {
            currentFilter = category;
            
            const filterOptions = document.querySelectorAll('.filter-option');
            const dropdown = document.getElementById('filterDropdown');
            
            // Remove active class from all options
            filterOptions.forEach(option => option.classList.remove('active'));
            
            // Add active class to clicked option
            event.target.classList.add('active');
            
            // Filter favorites
            const filteredFavorites = category === 'all' 
                ? allFavorites 
                : allFavorites.filter(fav => fav.article_category === category);
            
            displayFavorites(filteredFavorites);
            
            // Close dropdown
            dropdown.classList.remove('show');
            // Don't reset positioning immediately - let animation finish first
            setTimeout(() => {
                dropdown.style.top = '';
                dropdown.style.left = '';
                dropdown.style.right = '';
            }, 300); // Match transition duration
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const filterContainer = document.querySelector('.filter-container');
            const dropdown = document.getElementById('filterDropdown');
            
            if (!filterContainer.contains(event.target)) {
                dropdown.classList.remove('show');
                // Don't reset positioning immediately - let animation finish first
                setTimeout(() => {
                    dropdown.style.top = '';
                    dropdown.style.left = '';
                    dropdown.style.right = '';
                }, 300); // Match transition duration
            }
        });
    </script>
</body>
</html>