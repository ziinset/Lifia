{{-- Panduan Section --}}
<style>
    .panduan-section {
        font-family: 'Montserrat', sans-serif;
        background-color: #fafafa;
        line-height: 1.6;
        padding: 40px 0;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
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
        align-self: flex-start;
        display: flex;
        flex-direction: column;
    }

    .article-card {
        background: white;
        border-radius: 16px;
        margin-bottom: 32px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        display: flex;
        gap: 24px;
        padding: 24px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .article-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    .article-image {
        width: 200px;
        height: 150px;
        border-radius: 12px;
        object-fit: cover;
        flex-shrink: 0;
        align-self: flex-start;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .article-item {
        display: flex;
        gap: 24px;
        margin-bottom: 32px;
        padding-bottom: 32px;
        border-bottom: 1px solid #e8e8e8;
        align-items: flex-start;
        transition: opacity 0.2s ease;
    }

    .article-item:hover {
        opacity: 0.95;
    }

    .article-item:last-of-type {
        margin-bottom: 20px;
        border-bottom: none;
        padding-bottom: 0;
    }

    .article-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 12px;
        min-height: 150px;
        justify-content: space-between;
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
        line-height: 1.4;
        margin-bottom: 8px;
    }

    .article-description {
        font-family: 'Montserrat', sans-serif;
        font-weight: 400;
        font-size: 15px;
        color: #666;
        line-height: 1.6;
        flex-grow: 1;
    }

    .article-meta {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        font-size: 13px;
        color: #888;
        margin-top: auto;
    }

    .meta-top {
        display: flex;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
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
        padding: 8px 16px;
        border-radius: 8px;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .bookmark-section:hover {
        background-color: #f8fbf4;
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
        background: #f5f5f5;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 24px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        border: 1px solid #e8e8e8;
    }

    .sidebar-section:last-child {
        flex-grow: 1;
        margin-bottom: 0;
        display: flex;
        flex-direction: column;
    }

    .categories-content {
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .granola-banner {
        text-align: center;
        padding: 0;
        border-radius: 16px;
        overflow: hidden;
        background: transparent;
    }

    .granola-image {
        width: 100%;
        height: auto;
        max-height: 480px;
        border-radius: 16px;
        object-fit: cover;
        object-position: center;
    }

    .categories-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 22px;
        color: #2c5530;
        margin-bottom: 20px;
        text-align: center;
    }

    .category-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 14px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        cursor: pointer;
        margin-bottom: 12px;
    }

    .category-item:last-child {
        margin-bottom: 0;
    }

    .category-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    }

    .category-item:active {
        transform: translateY(0);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .category-icon {
        width: 70px;
        height: 70px;
        border-radius: 10px;
        object-fit: cover;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .category-item:hover .category-icon {
        transform: scale(1.05);
    }

    .category-text {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 15px;
        color: #4E342E;
        line-height: 1.5;
        transition: color 0.3s ease;
    }

    .category-item:hover .category-text {
        color: #2c5530;
    }

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        margin-top: 40px;
        padding: 20px 0;
    }

    .page-btn,
    .nav-btn {
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

    .page-btn:hover,
    .nav-btn:hover {
        border-color: #8BAC65;
        background: #f8fbf4;
        color: #8BAC65;
    }

    .page-btn.active {
        background: #8BAC65;
        border-color: #8BAC65;
        color: white;
        font-weight: 600;
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

        .article-content {
            min-height: auto;
        }

        .article-meta {
            flex-direction: column;
            align-items: flex-start;
        }

        .pagination {
            gap: 8px;
            padding: 16px 0;
        }

        .page-btn,
        .nav-btn {
            min-width: 40px;
            height: 40px;
            font-size: 14px;
        }
    }
</style>

<div class="panduan-section">
    <div class="container">
        <div class="content-wrapper">
            <main class="main-content">
                <!-- Article 1 -->
                <article class="article-item">
                    <img src="{{ asset('img/bumil-nyemil.png') }}" alt="Pregnant woman" class="article-image">
                    <div class="article-content">
                        <div class="article-tag">
                            <img src="{{ asset('image/material-symbols_self-improvement-rounded.png') }}" alt="Rawat icon"
                                class="tag-fish-icon">
                            <span class="tag-text">Kesehatan Mental</span>
                        </div>
                        <h2 class="article-title">Panduan Pola Makan Sehat untuk Ibu Hamil</h2>
                        <p class="article-description">Tips memilih makanan bergizi seimbang selama kehamilan, lengkap
                            dengan daftar nutrisi penting.</p>
                        <div class="article-meta">
                            <div class="meta-top">
                                <div class="author-info">
                                    <img src="{{ asset('image/uil_pen.png') }}" alt="Pen icon" class="author-icon"
                                        style="width: 16px; height: 16px;">
                                    <span>Ditinjau: Graciella Yeriza Natalie</span>
                                </div>
                                <div class="time-info">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#888"
                                        stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12,6 12,12 16,14" />
                                    </svg>
                                    <span>2 jam lalu</span>
                                </div>
                            </div>
                            <div class="bookmark-section">
                                <span>Simpan Artikel</span>
                                <svg class="bookmark-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Article 2 -->
                <article class="article-item">
                    <img src="{{ asset('img/Rectangle 160.png') }}" alt="Lemon water" class="article-image">
                    <div class="article-content">
                        <div class="article-tag">
                            <img src="{{ asset('image/material-symbols_self-improvement-rounded.png') }}" alt="Rawat icon"
                                class="tag-fish-icon">
                            <span class="tag-text">Kesehatan Mental</span>
                        </div>
                        <h2 class="article-title">Apakah Minum Air Lemon di Pagi Hari Efektif?</h2>
                        <p class="article-description">Fakta ilmiah tentang manfaat dan mitos dari kebiasaan minum air
                            lemon untuk detoks dan kesehatan.</p>
                        <div class="article-meta">
                            <div class="meta-top">
                                <div class="author-info">
                                    <img src="{{ asset('image/uil_pen.png') }}" alt="Pen icon" class="author-icon"
                                        style="width: 16px; height: 16px;">
                                    <span>Ditinjau: Graciella Yeriza Natalie</span>
                                </div>
                                <div class="time-info">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#888"
                                        stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12,6 12,12 16,14" />
                                    </svg>
                                    <span>5 hari lalu</span>
                                </div>
                            </div>
                            <div class="bookmark-section">
                                <span>Simpan Artikel</span>
                                <svg class="bookmark-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Article 3 -->
                <article class="article-item">
                    <img src="{{ asset('img/Rectangle 161.png') }}" alt="Woman eating" class="article-image">
                    <div class="article-content">
                        <div class="article-tag">
                            <img src="{{ asset('image/material-symbols_self-improvement-rounded.png') }}" alt="Rawat icon"
                                class="tag-fish-icon">
                            <span class="tag-text">Kesehatan Mental</span>
                        </div>
                        <h2 class="article-title">Cara Mengenali Sinyal Lapar dan Kenyang dari Tubuh</h2>
                        <p class="article-description">Latihan mindful eating: membedakan lapar fisik vs lapar emosional
                            agar tidak makan berlebihan.</p>
                        <div class="article-meta">
                            <div class="meta-top">
                                <div class="author-info">
                                    <img src="{{ asset('image/uil_pen.png') }}" alt="Pen icon" class="author-icon"
                                        style="width: 16px; height: 16px;">
                                    <span>Ditinjau: Graciella Yeriza Natalie</span>
                                </div>
                                <div class="time-info">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#888"
                                        stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12,6 12,12 16,14" />
                                    </svg>
                                    <span>10 jam lalu</span>
                                </div>
                            </div>
                            <div class="bookmark-section">
                                <span>Simpan Artikel</span>
                                <svg class="bookmark-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Article 4 -->
                <article class="article-item">
                    <img src="{{ asset('img/Rectangle 163.png') }}" alt="Pregnant woman eating"
                        class="article-image">
                    <div class="article-content">
                        <div class="article-tag">
                            <img src="{{ asset('image/material-symbols_self-improvement-rounded.png') }}" alt="Rawat icon"
                                class="tag-fish-icon">
                            <span class="tag-text">Kesehatan Mental</span>
                        </div>
                        <h2 class="article-title">Makanan yang Harus Dihindari Saat Hamil</h2>
                        <p class="article-description">Daftar makanan berisiko tinggi untuk janin, lengkap dengan
                            alasannya.</p>
                        <div class="article-meta">
                            <div class="meta-top">
                                <div class="author-info">
                                    <img src="{{ asset('image/uil_pen.png') }}" alt="Pen icon" class="author-icon"
                                        style="width: 16px; height: 16px;">
                                    <span>Ditinjau: Graciella Yeriza Natalie</span>
                                </div>
                            </div>
                            <div class="bookmark-section">
                                <span>Simpan Artikel</span>
                                <svg class="bookmark-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Article 5 -->
                <article class="article-item">
                    <img src="{{ asset('img/Rectangle 164.png') }}" alt="Diet food" class="article-image">
                    <div class="article-content">
                        <div class="article-tag">
                            <img src="{{ asset('image/material-symbols_self-improvement-rounded.png') }}" alt="Rawat icon"
                                class="tag-fish-icon">
                            <span class="tag-text">Kesehatan Mental</span>
                        </div>
                        <h2 class="article-title">Mitos vs Fakta Tentang Makanan Diet</h2>
                        <p class="article-description">Meluruskan mitos seputar roti gandum, buah malam hari,
                            karbohidrat, dan diet tanpa nasi.</p>
                        <div class="article-meta">
                            <div class="meta-top">
                                <div class="author-info">
                                    <img src="{{ asset('image/uil_pen.png') }}" alt="Pen icon" class="author-icon"
                                        style="width: 16px; height: 16px;">
                                    <span>Ditinjau: Penulis Graciella Yeriza Natalie</span>
                                </div>
                            </div>
                            <div class="bookmark-section">
                                <span>Simpan Artikel</span>
                                <svg class="bookmark-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Pagination -->
                <div class="pagination">
                    <button class="nav-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="m15 18-6-6 6-6" />
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
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>
                </div>
            </main>

            <aside class="sidebar">
                <!-- Burger Banner -->
                <div class="sidebar-section granola-banner">
                    <img src="{{ asset('img/granola.png') }}" alt="Delicious Burger" class="granola-image">
                </div>

                <!-- Categories -->
                <div class="sidebar-section">
                    <h3 class="categories-title">Jelajahi Kategori Lain</h3>

                    <div class="categories-content">
                        <div class="category-item">
                            <img src="{{ asset('img/makan-aksicepat.svg') }}" alt="Pola Makan Sehat"
                                class="category-icon">
                            <span class="category-text">Pola Makan Sehat</span>
                        </div>

                        <div class="category-item">
                            <img src="{{ asset('img/fisik-aksicepat.svg') }}" alt="Aktivitas Fisik"
                                class="category-icon">
                            <span class="category-text">Olahraga dan<br>Aktivitas Fisik</span>
                        </div>

                        <div class="category-item">
                            <img src="{{ asset('img/mental-aksicepat.svg') }}" alt="Kesehatan Mental"
                                class="category-icon">
                            <span class="category-text">Kesehatan Mental</span>
                        </div>

                        <div class="category-item">
                            <img src="{{ asset('img/selfcare-aksicepat.svg') }}" alt="Perawatan Diri"
                                class="category-icon">
                            <span class="category-text">Perawatan Diri<br>Self-Care</span>
                        </div>

                        <div class="category-item">
                            <img src="{{ asset('img/vegan-aksicepat.png') }}" alt="Gaya Hidup Vegan"
                                class="category-icon">
                            <span class="category-text">Gaya Hidup Vegan/<br>Vegetarian</span>
                        </div>

                        <div class="category-item">
                            <img src="{{ asset('img/ecoliving-aksicepat.svg') }}" alt="Lingkungan"
                                class="category-icon">
                            <span class="category-text">Lingkungan<br>Lingkungan & Eco Living</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
