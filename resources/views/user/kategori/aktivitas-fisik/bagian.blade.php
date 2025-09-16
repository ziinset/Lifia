<div class="section-title-container">
    <h2 class="section-title">Aktivitas Fisik</h2>
    <p class="section-subtitle">Temukan berbagai macam aktivitas fisik yang bisa Anda lakukan untuk menjaga kesehatan tubuh</p>
</div>

<div class="article-grid">
    @php
        $articles = [
            [
                'title' => 'Olahraga Kardio untuk Pemula',
                'excerpt' => 'Pelajari olahraga kardio sederhana yang bisa dilakukan di rumah',
                'image' => asset('images/cardio.jpg'),
                'link' => route('aktivitas-fisik.artikel', ['slug' => 'olahraga-kardio-untuk-pemula'])
            ],
            [
                'title' => 'Latihan Kekuatan Dasar',
                'excerpt' => 'Mulai latihan kekuatan dengan gerakan-gerakan dasar',
                'image' => asset('images/strength.jpg'),
                'link' => route('aktivitas-fisik.artikel', ['slug' => 'latihan-kekuatan-dasar'])
            ],
            [
                'title' => 'Yoga untuk Pemula',
                'excerpt' => 'Kenali gerakan yoga dasar untuk pemula',
                'image' => asset('images/yoga.jpg'),
                'link' => route('aktivitas-fisik.artikel', ['slug' => 'yoga-untuk-pemula'])
            ]
        ];
    @endphp

    @foreach($articles as $article)
        <a href="{{ $article['link'] }}" class="article-card">
            <div class="article-image">
                <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}">
            </div>
            <div class="article-content">
                <h3>{{ $article['title'] }}</h3>
                <p>{{ $article['excerpt'] }}</p>
                <span class="read-more">Baca Selengkapnya</span>
            </div>
        </a>
    @endforeach
</div>

<style>
    .section-title-container {
        margin-bottom: 2rem;
        text-align: center;
    }
    
    .section-title {
        font-size: 2rem;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }
    
    .section-subtitle {
        color: #7f8c8d;
        font-size: 1.1rem;
    }
    
    .article-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }
    
    .article-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none;
        color: inherit;
    }
    
    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .article-image {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }
    
    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .article-card:hover .article-image img {
        transform: scale(1.05);
    }
    
    .article-content {
        padding: 1.5rem;
    }
    
    .article-content h3 {
        margin: 0 0 0.75rem 0;
        color: #2c3e50;
        font-size: 1.25rem;
    }
    
    .article-content p {
        color: #7f8c8d;
        margin-bottom: 1rem;
        line-height: 1.5;
    }
    
    .read-more {
        color: #27ae60;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        transition: color 0.3s ease;
    }
    
    .article-card:hover .read-more {
        color: #219653;
    }
    
    .read-more::after {
        content: '→';
        margin-left: 0.5rem;
        transition: transform 0.3s ease;
    }
    
    .article-card:hover .read-more::after {
        transform: translateX(5px);
    }
    
    @media (max-width: 768px) {
        .article-grid {
            grid-template-columns: 1fr;
        }
        
        .section-title {
            font-size: 1.75rem;
        }
    }
</style>
