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

        <div class="articles-layout" id="articlesLayout">
            <!-- Articles will be loaded here via AJAX -->
            <div style="text-align: center; padding: 40px; color: #6b7280;">
                <i class="fas fa-spinner fa-spin" style="font-size: 24px; margin-bottom: 10px;"></i>
                <p>Memuat artikel...</p>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    const category = 'tubuh-lentur';
    const csrfToken = window.csrfToken || document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
    window.csrfToken = csrfToken;

    const categoryNames = {
        'turun-berat-badan': 'Turun Berat Badan',
        'bentuk-otot': 'Bentuk Otot',
        'stamina-energi': 'Stamina & Energi',
        'tubuh-lentur': 'Tubuh Lebih Lentur'
    };

    const categoryIcons = {
        'turun-berat-badan': '{{ asset("image/fluent_food-fish-20-filled.png") }}',
        'bentuk-otot': '{{ asset("image/fluent_food-fish-20-filled.png") }}',
        'stamina-energi': '{{ asset("image/fluent_food-fish-20-filled.png") }}',
        'tubuh-lentur': '{{ asset("image/fluent_food-fish-20-filled.png") }}'
    };

    async function loadArticles() {
        try {
            const response = await fetch(`/api/fitplan/articles/${category}`, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            if (data.success) {
                renderArticles(data.main_article, data.sidebar_articles);
            } else {
                showEmptyState();
            }
        } catch (error) {
            console.error('Error loading articles:', error);
            showEmptyState();
        }
    }

    function renderArticles(mainArticle, sidebarArticles) {
        const layout = document.getElementById('articlesLayout');

        if (!mainArticle && (!sidebarArticles || sidebarArticles.length === 0)) {
            showEmptyState();
            return;
        }

        let html = '';

        if (mainArticle) {
            const imageUrl = mainArticle.image
                ? `{{ asset('storage/') }}/${mainArticle.image}`
                : 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&auto=format&fit=crop&w=2053&q=80';

            const timeAgo = getTimeAgo(mainArticle.created_at);
            const linkUrl = mainArticle.link || '#';

            html += `
                <div class="main-article-container">
                    <div class="main-article-image">
                        <img src="${imageUrl}" alt="${mainArticle.title}">
                    </div>
                    <div class="main-article-content">
                        <div class="main-category-tag">
                            <div class="main-category-icon" style="background-image: url('${categoryIcons[category]}');"></div>
                            ${categoryNames[category]}
                        </div>
                        <h2>${mainArticle.title}</h2>
                        <p class="main-article-desc">${mainArticle.description}</p>
                        <div class="main-article-meta">
                            <span>Ditinjau: <span class="author">${mainArticle.author}</span> <span class="time-info">
                                <i class="fas fa-clock clock-icon"></i>
                                ${timeAgo}</span></span>
                            <div class="main-article-actions">
                                <button class="main-action-btn" onclick="window.location.href='${linkUrl}'">Selengkapnya</button>
                                <button class="main-bookmark-btn"
                                        data-article-id="fitplan-${category}-${mainArticle.id}"
                                        data-article-title="${mainArticle.title}"
                                        data-article-category="${category}"
                                        data-article-image="${imageUrl}"
                                        data-article-url="${linkUrl}">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        html += '<div class="sidebar-articles">';

        if (sidebarArticles && sidebarArticles.length > 0) {
            sidebarArticles.forEach(article => {
                const imageUrl = article.image
                    ? `{{ asset('storage/') }}/${article.image}`
                    : 'https://images.unsplash.com/photo-1619566636858-adf3ef46400b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80';

                const linkUrl = article.link || '#';

                html += `
                    <div class="sidebar-article">
                        <div class="sidebar-article-image">
                            <img src="${imageUrl}" alt="${article.title}">
                        </div>
                        <div class="sidebar-article-content">
                            <div class="sidebar-content-top">
                                <div class="sidebar-category-tag">
                                    <div class="sidebar-category-icon" style="background-image: url('${categoryIcons[category]}');"></div>
                                    ${categoryNames[category]}
                                </div>
                                <h3>${article.title}</h3>
                                <p class="sidebar-article-desc">${article.description}</p>
                            </div>
                            <div class="sidebar-article-footer">
                                <div class="sidebar-author-info">
                                    <span>Penulis: <span class="author">${article.author}</span></span>
                                </div>
                                <div class="sidebar-article-actions">
                                    <button class="sidebar-action-btn" onclick="window.location.href='${linkUrl}'">selengkapnya</button>
                                    <button class="sidebar-bookmark-btn"
                                            data-article-id="fitplan-${category}-${article.id}"
                                            data-article-title="${article.title}"
                                            data-article-category="${category}"
                                            data-article-image="${imageUrl}"
                                            data-article-url="${linkUrl}">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        html += '</div>';
        layout.innerHTML = html;
        initBookmarks();
    }

    function showEmptyState() {
        const layout = document.getElementById('articlesLayout');
        layout.innerHTML = `
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; color: #6b7280;">
                <i class="fas fa-newspaper" style="font-size: 48px; margin-bottom: 16px; opacity: 0.5;"></i>
                <p style="font-size: 16px;">Belum ada artikel tersedia</p>
            </div>
        `;
    }

    function getTimeAgo(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const diffInSeconds = Math.floor((now - date) / 1000);

        if (diffInSeconds < 60) return 'Baru saja';
        if (diffInSeconds < 3600) return `${Math.floor(diffInSeconds / 60)} menit lalu`;
        if (diffInSeconds < 86400) return `${Math.floor(diffInSeconds / 3600)} jam lalu`;
        if (diffInSeconds < 604800) return `${Math.floor(diffInSeconds / 86400)} hari lalu`;
        return date.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
    }

    function buttonToArticle(btn) {
        return {
            article_id: btn.dataset.articleId,
            article_title: btn.dataset.articleTitle,
            article_category: btn.dataset.articleCategory,
            article_image: btn.dataset.articleImage || '',
            article_description: '',
            article_author: '',
            article_url: btn.dataset.articleUrl || ''
        };
    }

    async function saveFavorite(article, btn) {
        try {
            const res = await fetch('/favorites', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(article)
            });

            if (res.status === 401) {
                window.location.href = '/login';
                return;
            }

            const data = await res.json();
            if (data.success) {
                markSaved(btn, true);
            } else if (res.status === 409) {
                markSaved(btn, true);
            }
        } catch (e) {
            console.error('Favorite error:', e);
        }
    }

    async function removeFavorite(articleId, btn) {
        try {
            const res = await fetch('/favorites', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ article_id: articleId })
            });

            if (res.status === 401) {
                window.location.href = '/login';
                return;
            }

            const data = await res.json();
            if (data.success) {
                markSaved(btn, false);
            }
        } catch (e) {
            console.error('Remove favorite error:', e);
        }
    }

    function markSaved(btn, saved) {
        if (saved) {
            btn.classList.add('saved');
            btn.style.color = '#8BAC65';
        } else {
            btn.classList.remove('saved');
            btn.style.color = '';
        }
    }

    function initBookmarks() {
        const buttons = document.querySelectorAll('.main-bookmark-btn, .sidebar-bookmark-btn');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const article = buttonToArticle(btn);
                if (!article.article_id) return;
                if (btn.classList.contains('saved')) {
                    removeFavorite(article.article_id, btn);
                } else {
                    saveFavorite(article, btn);
                }
            });
        });

        try {
            fetch('/favorites', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success && Array.isArray(data.favorites)) {
                    const savedIds = new Set(data.favorites.map(f => f.article_id));
                    buttons.forEach(btn => {
                        const id = btn.dataset.articleId;
                        if (id && savedIds.has(id)) {
                            markSaved(btn, true);
                        }
                    });
                }
            })
            .catch(e => console.warn('Could not load favorites:', e));
        } catch (e) {
            console.warn('Could not load favorites:', e);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', loadArticles);
    } else {
        loadArticles();
    }
})();
</script>