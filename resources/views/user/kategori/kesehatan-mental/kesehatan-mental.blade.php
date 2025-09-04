@extends('layouts.app')

@section('title', 'Kesehatan Mental')

@section('content')
<style>
    .kesehatan-mental-page {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .page-title {
        color: #4E342E;
        font-size: 32px;
        font-weight: 600;
        margin: 40px 0 30px 0;
        text-align: center;
    }

    /* Latest Articles Section */
    .latest-articles {
        margin-bottom: 60px;
    }

    .section-title {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 30px;
    }

    .articles-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: start;
    }

    .main-article {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .main-article-image {
        width: 100%;
        height: 280px;
        position: relative;
    }

    .main-article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .main-article-content {
        padding: 24px;
    }

    .category-tag {
        display: inline-flex;
        align-items: center;
        background-color: #e8f5e8;
        color: #4a7c59;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
        margin-bottom: 12px;
    }

    .category-icon {
        width: 16px;
        height: 16px;
        background-color: #4a7c59;
        border-radius: 50%;
        margin-right: 8px;
    }

    .article-title {
        font-size: 20px;
        font-weight: 600;
        color: #333;
        margin-bottom: 12px;
        line-height: 1.3;
    }

    .article-description {
        font-size: 14px;
        color: #666;
        line-height: 1.5;
        margin-bottom: 16px;
    }

    .article-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 12px;
        color: #999;
    }

    .read-more-btn {
        background-color: #4a7c59;
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 500;
        transition: background-color 0.3s;
    }

    .read-more-btn:hover {
        background-color: #3d6b4a;
        color: white;
    }

    .bookmark-icon {
        width: 20px;
        height: 20px;
        background-color: #ddd;
        border-radius: 50%;
        cursor: pointer;
    }

    /* Side Articles */
    .side-articles {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .side-article {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        display: flex;
    }

    .side-article-image {
        width: 120px;
        height: 100px;
        flex-shrink: 0;
    }

    .side-article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .side-article-content {
        padding: 16px;
        flex: 1;
    }

    .side-article-title {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        line-height: 1.3;
    }

    .side-article-description {
        font-size: 13px;
        color: #666;
        line-height: 1.4;
        margin-bottom: 12px;
    }

    /* Morning Routine Section */
    .morning-routine {
        background: white;
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 60px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .routine-image {
        width: 200px;
        height: 150px;
        border-radius: 12px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .routine-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .routine-content {
        flex: 1;
    }

    .routine-title {
        font-size: 22px;
        font-weight: 600;
        color: #333;
        margin-bottom: 12px;
    }

    .routine-description {
        font-size: 15px;
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    /* Popular Topics Section */
    .popular-topics {
        margin-bottom: 60px;
    }

    .topics-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    .topic-article {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        position: relative;
    }

    .topic-article-image {
        width: 100%;
        height: 200px;
        position: relative;
    }

    .topic-article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .heart-icon {
        position: absolute;
        top: 12px;
        right: 12px;
        width: 24px;
        height: 24px;
        background-color: rgba(255,255,255,0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .topic-article-content {
        padding: 20px;
    }

    .topic-category {
        font-size: 12px;
        color: #999;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .topic-title {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
        line-height: 1.3;
    }

    .topic-description {
        font-size: 14px;
        color: #666;
        line-height: 1.5;
        margin-bottom: 12px;
    }

    .rating {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .star {
        color: #ffd700;
        font-size: 14px;
    }

    /* Additional Articles */
    .additional-articles {
        margin-bottom: 60px;
    }

    .article-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .list-article {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        display: flex;
    }

    .list-article-image {
        width: 150px;
        height: 120px;
        flex-shrink: 0;
    }

    .list-article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .list-article-content {
        padding: 20px;
        flex: 1;
    }

    .list-article-title {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        line-height: 1.3;
    }

    .list-article-description {
        font-size: 14px;
        color: #666;
        line-height: 1.5;
        margin-bottom: 12px;
    }

    .list-article-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 12px;
        color: #999;
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin: 40px 0;
    }

    .page-number {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
    }

    .page-number.active {
        background-color: #4a7c59;
        color: white;
    }

    .page-number:not(.active) {
        background-color: white;
        color: #666;
        border: 1px solid #ddd;
    }

    .page-number:not(.active):hover {
        background-color: #f5f5f5;
    }

    .page-arrow {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background-color: white;
        color: #666;
        border: 1px solid #ddd;
        cursor: pointer;
        transition: all 0.3s;
    }

    .page-arrow:hover {
        background-color: #f5f5f5;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .articles-grid {
            grid-template-columns: 1fr;
        }

        .topics-grid {
            grid-template-columns: 1fr;
        }

        .morning-routine {
            flex-direction: column;
            text-align: center;
        }

        .routine-image {
            width: 100%;
            max-width: 300px;
        }
    }
</style>

<div class="kesehatan-mental-page">
    <div class="container">
        <h1 class="page-title">Kesehatan Mental</h1>

        <!-- Latest Articles Section -->
        <section class="latest-articles">
            <h2 class="section-title">Artikel Terbaru</h2>
            <div class="articles-grid">
                <!-- Main Article -->
                <div class="main-article">
                    <div class="main-article-image">
                        <img src="{{ asset('image/meditation-woman.jpg') }}" alt="Wanita meditasi">
                    </div>
                    <div class="main-article-content">
                        <div class="category-tag">
                            <div class="category-icon"></div>
                            Kesehatan Mental
                        </div>
                        <h3 class="article-title">Latihan Sederhana untuk Meredakan Stres</h3>
                        <p class="article-description">Fokus pada napas dan momen sekarang lewat latihan mindfulness bisa membantu menenangkan pikiran, meredakan stres, dan meningkatkan kesadaran diri.</p>
                        <div class="article-meta">
                            <span>Ditulis oleh Graciela Verina Natalia</span>
                            <span>0 jam lalu</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 16px;">
                            <a href="#" class="read-more-btn">Selengkapnya</a>
                            <div class="bookmark-icon"></div>
                        </div>
                    </div>
                </div>

                <!-- Side Articles -->
                <div class="side-articles">
                    <div class="side-article">
                        <div class="side-article-image">
                            <img src="{{ asset('image/stress-sleep.jpg') }}" alt="Orang stres di tempat tidur">
                        </div>
                        <div class="side-article-content">
                            <div class="category-tag">
                                <div class="category-icon"></div>
                                Kesehatan Mental
                            </div>
                            <h4 class="side-article-title">Cara Mengatasi Overthinking Sebelum Tidur</h4>
                            <p class="side-article-description">Pikiran terus berputar di malam hari? Coba tips praktis ini untuk tidur lebih nyenyak.</p>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="font-size: 12px; color: #999;">Ditulis oleh Graciela Verina Natalia</span>
                                <div class="bookmark-icon"></div>
                            </div>
                        </div>
                    </div>

                    <div class="side-article">
                        <div class="side-article-image">
                            <img src="{{ asset('image/family-sunset.jpg') }}" alt="Keluarga di pantai">
                        </div>
                        <div class="side-article-content">
                            <div class="category-tag">
                                <div class="category-icon"></div>
                                Kesehatan Mental
                            </div>
                            <h4 class="side-article-title">Pentingnya 'Self-Compassion' untuk Kesehatan Mental</h4>
                            <p class="side-article-description">Belajar memaafkan dan menyayangi diri sendiri adalah langkah awal menuju pemulihan batin.</p>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="font-size: 12px; color: #999;">Ditulis oleh Graciela Verina Natalia</span>
                                <div class="bookmark-icon"></div>
                            </div>
                        </div>
                    </div>

                    <div class="side-article">
                        <div class="side-article-image">
                            <img src="{{ asset('image/teen-phone.jpg') }}" alt="Remaja dengan HP">
                        </div>
                        <div class="side-article-content">
                            <div class="category-tag">
                                <div class="category-icon"></div>
                                Kesehatan Mental
                            </div>
                            <h4 class="side-article-title">Efek Media Sosial terhadap Mood Remaja</h4>
                            <p class="side-article-description">Terlalu lama scroll bisa memicu cemas dan minder yuk, batasi waktu digitalmu!</p>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="font-size: 12px; color: #999;">Ditulis oleh Graciela Verina Natalia</span>
                                <div class="bookmark-icon"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Morning Routine Section -->
        <section class="morning-routine">
            <div class="routine-image">
                <img src="{{ asset('image/morning-routine.jpg') }}" alt="Rutinitas pagi">
            </div>
            <div class="routine-content">
                <h3 class="routine-title">Rutinitas Pagi untuk Menjaga Mental Tetap Stabil</h3>
                <p class="routine-description">Bangun dengan mindset positif bisa dimulai dari kebiasaan kecil di pagi hari, seperti bersyukur, mengatur napas, dan menetapkan niat baik untuk hari itu. Kebiasaan sederhana mampu membentuk pola pikir yang lebih optimis dan meningkatkan semangat sepanjang hari.</p>
                <a href="#" class="read-more-btn">Baca Selengkapnya</a>
            </div>
        </section>

        <!-- Popular Topics Section -->
        <section class="popular-topics">
            <h2 class="section-title">Topik Populer</h2>
            <div class="topics-grid">
                <div class="topic-article">
                    <div class="topic-article-image">
                        <img src="{{ asset('image/crying-person.jpg') }}" alt="Orang menangis">
                        <div class="heart-icon">♥</div>
                    </div>
                    <div class="topic-article-content">
                        <div class="topic-category">YOGA OR PILATES</div>
                        <h3 class="topic-title">Kenapa Menangis Itu Sehat?</h3>
                        <p class="topic-description">Menangis bukan tanda lemah justru cara alami tubuh melepas tekanan dan emosi yang terpendam. Dengan menangis, kita memberi ruang bagi diri untuk merasa lega dan memulihkan keseimbangan mental.</p>
                        <div class="rating">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">☆</span>
                            <span style="margin-left: 8px; font-size: 12px; color: #666;">3.5</span>
                        </div>
                    </div>
                </div>

                <div class="topic-article">
                    <div class="topic-article-image">
                        <img src="{{ asset('image/pregnant-woman.jpg') }}" alt="Wanita hamil">
                        <div class="heart-icon">♥</div>
                    </div>
                    <div class="topic-article-content">
                        <div class="topic-category">PLANT-BASED POWER BOWL</div>
                        <h3 class="topic-title">Mengelola Emosi Selama Kehamilan</h3>
                        <p class="topic-description">Perubahan hormon saat hamil bisa memicu stres, cemas, atau mood swing. Artikel ini membahas cara menjaga kesehatan mental bumil lewat istirahat cukup, dukungan pasangan, dan teknik relaksasi sederhana.</p>
                        <div class="rating">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">☆</span>
                            <span style="margin-left: 8px; font-size: 12px; color: #666;">3.5</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Additional Articles -->
        <section class="additional-articles">
            <div class="article-list">
                <div class="list-article">
                    <div class="list-article-image">
                        <img src="{{ asset('image/burnout-person.jpg') }}" alt="Orang burnout">
                    </div>
                    <div class="list-article-content">
                        <div class="category-tag">
                            <div class="category-icon"></div>
                            Kesehatan Mental
                        </div>
                        <h3 class="list-article-title">Mengenal Burnout dan Cara Menanganinya</h3>
                        <p class="list-article-description">Bukan sekedar lelah, burnout bisa memengaruhi fisik dan emosi jika dibiarkan.</p>
                        <div class="list-article-meta">
                            <span>Ditulis oleh Graciela Verina Natalia</span>
                            <span>3 jam lalu</span>
                            <div class="bookmark-icon"></div>
                        </div>
                    </div>
                </div>

                <div class="list-article">
                    <div class="list-article-image">
                        <img src="{{ asset('image/music-person.jpg') }}" alt="Orang dengan headphone">
                    </div>
                    <div class="list-article-content">
                        <div class="category-tag">
                            <div class="category-icon"></div>
                            Kesehatan Mental
                        </div>
                        <h3 class="list-article-title">Pengaruh Musik terhadap Kesehatan Emosi</h3>
                        <p class="list-article-description">Musik bisa jadi terapi sederhana untuk bantu redakan cemas dan stres.</p>
                        <div class="list-article-meta">
                            <span>Ditulis oleh Graciela Verina Natalia</span>
                            <span>2 jam lalu</span>
                            <div class="bookmark-icon"></div>
                        </div>
                    </div>
                </div>

                <div class="list-article">
                    <div class="list-article-image">
                        <img src="{{ asset('image/gardening-family.jpg') }}" alt="Keluarga berkebun">
                    </div>
                    <div class="list-article-content">
                        <div class="category-tag">
                            <div class="category-icon"></div>
                            Kesehatan Mental
                        </div>
                        <h3 class="list-article-title">Manfaat Berkebun untuk Kesehatan Mental</h3>
                        <p class="list-article-description">Aktivitas di alam terbuka terbukti bisa tingkatkan suasana hati secara alami.</p>
                        <div class="list-article-meta">
                            <span>Ditulis oleh Graciela Verina Natalia</span>
                            <span>12 jam lalu</span>
                            <div class="bookmark-icon"></div>
                        </div>
                    </div>
                </div>

                <div class="list-article">
                    <div class="list-article-image">
                        <img src="{{ asset('image/pregnant-hijab.jpg') }}" alt="Wanita hamil berhijab">
                    </div>
                    <div class="list-article-content">
                        <div class="category-tag">
                            <div class="category-icon"></div>
                            Kesehatan Mental
                        </div>
                        <h3 class="list-article-title">Pentingnya Dukungan Mental untuk Ibu Hamil</h3>
                        <p class="list-article-description">Perubahan emosi saat hamil itu wajar. Dukungan dari sekitar membantu ibu tetap sehat secara fisik dan mental.</p>
                        <div class="list-article-meta">
                            <span>Ditulis oleh Graciela Verina Natalia</span>
                            <div class="bookmark-icon"></div>
                        </div>
                    </div>
                </div>

                <div class="list-article">
                    <div class="list-article-image">
                        <img src="{{ asset('image/social-connection.jpg') }}" alt="Koneksi sosial">
                    </div>
                    <div class="list-article-content">
                        <div class="category-tag">
                            <div class="category-icon"></div>
                            Kesehatan Mental
                        </div>
                        <h3 class="list-article-title">Koneksi Sosial dan Kesehatan Mental</h3>
                        <p class="list-article-description">Percakapan hangat dengan orang terdekat bisa jadi obat terbaik untuk hati.</p>
                        <div class="list-article-meta">
                            <span>Ditulis oleh Graciela Verina Natalia</span>
                            <div class="bookmark-icon"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pagination -->
        <div class="pagination">
            <div class="page-arrow">‹</div>
            <div class="page-number active">1</div>
            <div class="page-number">2</div>
            <div class="page-number">3</div>
            <div class="page-number">4</div>
            <div class="page-number">5</div>
            <div class="page-number">...</div>
            <div class="page-number">60</div>
            <div class="page-arrow">›</div>
        </div>
    </div>
</div>
@endsection

