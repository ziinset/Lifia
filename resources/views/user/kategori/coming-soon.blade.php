<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $categoryModel->name ?? ucfirst(str_replace('-', ' ', $slug)) }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body style="margin:0; font-family: Poppins, sans-serif; background:#f8fafc; color:#2d3748;">
    @include('components.navbar2')

    {{-- Banner/Hero Section jika tersedia --}}
    @if(!empty($categoryModel->banner_image) || !empty($categoryModel->banner_description))
        <style>
            .hero2-wrapper{background:#f6f4ef;position:relative;overflow:hidden;min-height:70vh}
            .hero2-container{max-width:1200px;margin:0 auto;padding:60px 20px 32px 20px;position:relative;z-index:2}
            .hero2-section{display:grid;grid-template-columns:1.05fr .95fr;align-items:center;gap:30px;margin-top:18px;position:relative}
            .hero2-title{font-family:'Poppins',sans-serif;font-weight:800;color:#3a2f2b;font-size:42px;line-height:1.22;margin-bottom:14px}
            .hero2-title .accent{color:#7ea861}
            .hero2-desc{font-family:'Montserrat',sans-serif;color:#6a6a6a;font-size:16px;line-height:1.8;margin-bottom:18px;max-width:520px}
            .hero2-badge{display:inline-block;font-family:'Montserrat',sans-serif;font-weight:600;background:#eaf4e2;color:#7ea861;border:1px solid #d6e8c9;padding:8px 14px;border-radius:999px;margin-bottom:18px;font-size:14px}
            .hero2-img-wrap{position:relative;display:flex;align-items:center;justify-content:center;z-index:1}
            .hero2-circle{width:480px;height:480px;background:transparent;position:relative;overflow:hidden;border:none}
            .hero2-food{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;padding:20px}
            .hero2-food img{width:100%;height:100%;object-fit:cover;border-radius:16px}
            @media (max-width:1024px){.hero2-section{grid-template-columns:1fr;text-align:center}.hero2-img-wrap{order:-1}.hero2-circle{width:360px;height:360px;margin:0 auto}}
            @media (max-width:640px){.hero2-title{font-size:26px}.hero2-container{padding:56px 16px 20px}.hero2-circle{width:300px;height:300px}}
        </style>
        <div class="hero2-wrapper" style="padding-top:80px">
            <div class="hero2-container">
                <section class="hero2-section">
                    <div>
                        <div class="hero2-badge">{{ $categoryModel->name ?? ucfirst(str_replace('-', ' ', $slug)) }}</div>
                        <h1 class="hero2-title">
                            {{ $categoryModel->name ?? ucfirst(str_replace('-', ' ', $slug)) }}
                        </h1>
                        @if(!empty($categoryModel->banner_description))
                            <p class="hero2-desc">{{ $categoryModel->banner_description }}</p>
                        @endif
                    </div>
                    <div class="hero2-img-wrap">
                        <div class="hero2-circle">
                            <div class="hero2-food">
                                @if(!empty($categoryModel->banner_image))
                                    <img src="{{ asset('storage/' . $categoryModel->banner_image) }}" alt="{{ $categoryModel->name }}"/>
                                @else
                                    <img src="{{ asset('img/bowl-hero2.svg') }}" alt="Hero"/>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    @endif

    @if(isset($latestArticles) && $latestArticles->count() > 0)
        <section style="padding: 20px 20px 10px;">
            <div style="max-width: 1100px; margin:0 auto;">
                <h2 style="font-family:Poppins, sans-serif; font-weight:800; font-size:24px; color:#3a2f2b; margin: 0 0 14px;">Artikel Terbaru</h2>
                <div style="display:grid; grid-template-columns: repeat(4, minmax(0,1fr)); gap:16px;">
                    @foreach($latestArticles as $article)
                        <div style="background:#fff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden; box-shadow:0 8px 20px rgba(0,0,0,.04);">
                            <div style="width:100%; height:140px; background:#f3f4f6;">
                                @if(!empty($article->image))
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width:100%; height:100%; object-fit:cover; display:block;"/>
                                @else
                                    <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:#9ca3af; font-family:Montserrat, sans-serif; font-size:13px;">Tidak ada gambar</div>
                                @endif
                            </div>
                            <div style="padding:12px 12px 14px;">
                                <div style="font-family:Poppins, sans-serif; font-weight:700; color:#111827; font-size:16px; line-height:1.35; margin-bottom:6px; overflow:hidden; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical;">
                                    {{ $article->title }}
                                </div>
                                @if(!empty($article->description))
                                    <div style="font-family:Montserrat, sans-serif; color:#6b7280; font-size:13px; line-height:1.6; overflow:hidden; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical;">
                                        {{ $article->description }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Placeholder Coming Soon jika tidak ada banner --}}
    @if(empty($categoryModel->banner_image) && empty($categoryModel->banner_description))
        <main style="min-height: 60vh; display:flex; align-items:center; justify-content:center; padding: 120px 20px 60px;">
            <div style="max-width: 820px; width:100%; text-align:center;">
                <div style="margin-bottom:24px;">
                    <i class="fas fa-clock" style="font-size:48px; color:#8BAC65;"></i>
                </div>
                <h1 style="font-size:28px; margin:0 0 10px; color:#111827; font-weight:700;">
                    {{ $categoryModel->name ?? ucfirst(str_replace('-', ' ', $slug)) }}
                </h1>
                <p style="font-size:16px; color:#4B5563; margin:0 0 24px;">
                    Artikel untuk kategori ini akan segera tayang. Silakan kembali lagi nanti ya!
                </p>
                <a href="{{ url('/') }}" style="display:inline-flex; align-items:center; gap:8px; padding:10px 16px; border-radius:10px; border:1px solid #d1d5db; color:#374151; text-decoration:none; background:#fff;">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </main>
    @else
        {{-- Jika ada banner namun belum ada artikel, boleh tampilkan pesan singkat --}}
        @if(isset($hasArticles) && !$hasArticles)
            <div style="max-width: 1100px; margin: 0 auto 24px; padding: 0 20px;">
                <div style="background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:14px 16px; color:#4B5563;">
                    Artikel untuk kategori ini akan segera tayang.
                </div>
            </div>
        @endif
    @endif

    @include('components.footer')
</body>
</html>