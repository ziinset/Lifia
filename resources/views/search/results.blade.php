<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $query ? 'Hasil Pencarian: ' . $query : 'Pencarian' }} - Lifia</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8fdf4 0%, #e8f5e8 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .header h1 {
            color: #2d5016;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .search-info {
            background: white;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
            border-left: 4px solid #799549;
        }

        .search-info h2 {
            color: #2d5016;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .search-info p {
            color: #6b7280;
            font-size: 1rem;
        }

        .results-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .article-card {
            background: white;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(229, 231, 235, 0.5);
        }

        .article-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .article-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #799549 0%, #8BAC65 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            position: relative;
            overflow: hidden;
        }

        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .article-content {
            padding: 1.5rem;
        }

        .article-category {
            display: inline-block;
            background: linear-gradient(135deg, #799549 0%, #8BAC65 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .article-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .article-description {
            color: #6b7280;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .article-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb;
        }

        .article-author {
            color: #799549;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .read-more-btn {
            background: linear-gradient(135deg, #799549 0%, #8BAC65 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.75rem;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .read-more-btn:hover {
            background: linear-gradient(135deg, #435331 0%, #799549 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(121, 149, 73, 0.3);
        }

        .no-results {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .no-results i {
            font-size: 4rem;
            color: #d1d5db;
            margin-bottom: 1.5rem;
        }

        .no-results h3 {
            color: #2d5016;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .no-results p {
            color: #6b7280;
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        .suggested-terms {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            justify-content: center;
        }

        .suggested-term {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            color: #374151;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .suggested-term:hover {
            background: linear-gradient(135deg, #799549 0%, #8BAC65 100%);
            color: white;
            transform: translateY(-2px);
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #799549 0%, #8BAC65 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #435331 0%, #799549 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(121, 149, 73, 0.3);
        }

        .categories-section {
            background: white;
            padding: 2rem;
            border-radius: 1.5rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            margin-top: 2rem;
        }

        .categories-section h3 {
            color: #2d5016;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .category-link {
            background: linear-gradient(135deg, #f8fdf4 0%, #e8f5e8 100%);
            color: #2d5016;
            padding: 1rem;
            border-radius: 1rem;
            text-decoration: none;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .category-link:hover {
            background: linear-gradient(135deg, #799549 0%, #8BAC65 100%);
            color: white;
            transform: translateY(-2px);
            border-color: rgba(255, 255, 255, 0.2);
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .header h1 {
                font-size: 2rem;
            }

            .results-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .categories-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Beranda
        </a>

        <div class="header">
            <h1>
                <i class="fas fa-search"></i>
                {{ $query ? 'Hasil Pencarian' : 'Pencarian Artikel' }}
            </h1>
        </div>

        @if($query)
            <div class="search-info">
                <h2>Pencarian: "{{ $query }}"</h2>
                <p>Ditemukan {{ count($results) }} hasil yang relevan</p>
            </div>
        @endif

        @if(count($results) > 0)
            <div class="results-grid">
                @foreach($results as $article)
                    <div class="article-card">
                        <div class="article-image">
                            @if(isset($article['image']) && file_exists(public_path($article['image'])))
                                <img src="{{ asset($article['image']) }}" alt="{{ $article['title'] }}">
                            @else
                                <i class="fas fa-newspaper"></i>
                            @endif
                        </div>
                        <div class="article-content">
                            <span class="article-category">{{ $article['category_name'] }}</span>
                            <h3 class="article-title">{{ $article['title'] }}</h3>
                            <p class="article-description">{{ $article['description'] }}</p>
                            <div class="article-meta">
                                <span class="article-author">
                                    <i class="fas fa-user"></i>
                                    {{ $article['author'] }}
                                </span>
                                <a href="{{ $article['url'] }}" class="read-more-btn">
                                    Baca Selengkapnya
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif($query)
            <div class="no-results">
                <i class="fas fa-search"></i>
                <h3>Tidak ada hasil ditemukan</h3>
                <p>Maaf, tidak ada artikel yang cocok dengan pencarian "{{ $query }}". Coba kata kunci lain atau jelajahi kategori di bawah.</p>
                <div class="suggested-terms">
                    <a href="/search?q=makanan sehat" class="suggested-term">Makanan Sehat</a>
                    <a href="/search?q=olahraga" class="suggested-term">Olahraga</a>
                    <a href="/search?q=mental health" class="suggested-term">Kesehatan Mental</a>
                    <a href="/search?q=skincare" class="suggested-term">Perawatan Kulit</a>
                    <a href="/search?q=vegan" class="suggested-term">Vegan</a>
                    <a href="/search?q=eco living" class="suggested-term">Eco Living</a>
                </div>
            </div>
        @endif

        @if(!$query || count($results) == 0)
            <div class="categories-section">
                <h3>Jelajahi Kategori</h3>
                <div class="categories-grid">
                    @foreach($categories as $slug => $name)
                        <a href="/kategori/{{ $slug }}" class="category-link">{{ $name }}</a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</body>
</html>
