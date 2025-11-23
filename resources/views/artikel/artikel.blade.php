{{-- Halaman Artikel (hanya untuk kategori default) --}}
@if(!isset($categoryModel))
<div style="margin-bottom: 10px;">
    @include('artikel.bagianartikel')
</div>
@endif

{{-- Navbar untuk kategori dinamis --}}
@if(isset($categoryModel))
    @includeIf('components.navbar2')
@endif

{{-- Halaman Banner --}}
@if(isset($categoryModel))
    {{-- Banner dinamis (Hero 2 style) untuk kategori baru/dinamis --}}
    <style>
        .hero2-wrapper{background:#f6f4ef;position:relative;overflow:hidden;min-height:70vh}
        .hero2-container{max-width:1200px;margin:0 auto;padding:60px 20px 32px 20px;position:relative;z-index:2}
        .hero2-section{display:grid;grid-template-columns:1.05fr .95fr;align-items:center;gap:30px;margin-top:18px;position:relative}
        .hero2-title{font-family:'Poppins',sans-serif;font-weight:800;color:#3a2f2b;font-size:42px;line-height:1.22;margin-bottom:14px}
        .hero2-title .accent{color:#7ea861}
        .hero2-desc{font-family:'Montserrat',sans-serif;color:#6a6a6a;font-size:16px;line-height:1.8;margin-bottom:18px;max-width:520px}
        .hero2-badge{display:inline-block;font-family:'Montserrat',sans-serif;font-weight:600;background:#eaf4e2;color:#7ea861;border:1px solid #d6e8c9;padding:8px 14px;border-radius:999px;margin-bottom:18px;font-size:14px}
        .hero2-search{display:flex;align-items:center;gap:10px;background:#fff;border:1px solid #dce8d2;border-radius:999px;padding:12px 16px;max-width:480px;box-shadow:0 8px 22px rgba(44,85,48,.08);margin-bottom:18px}
        .hero2-input{border:none;outline:none;flex:1;font-family:'Montserrat',sans-serif;font-size:16px;color:#333}
        .hero2-input::placeholder{color:#98a59a}
        .hero2-img-wrap{position:relative;display:flex;align-items:center;justify-content:center;z-index:1}
        .hero2-circle{width:480px;height:480px;background:transparent;position:relative;overflow:hidden;border:none}
        .hero2-food{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;padding:20px}
        .hero2-food img{width:100%;height:100%;object-fit:contain;transform:translateY(8px)}
        .hero2-float{position:absolute;top:160px;background:rgba(234,244,226,.95);border:1px solid #d6e8c9;padding:12px 16px;border-radius:16px;box-shadow:0 8px 24px rgba(44,85,48,.12);font-family:'Montserrat',sans-serif;backdrop-filter:blur(10px);z-index:2}
        .hero2-float-title{font-weight:700;color:#3a2f2b;font-size:14px;margin-bottom:2px}
        .hero2-float-sub{color:#7ea861;font-size:12px;font-weight:600}
        .hero2-badges{display:flex;align-items:center;gap:10px;margin-top:12px;flex-wrap:wrap}
        .hero2-small-badge{font-family:'Montserrat',sans-serif;font-weight:600;font-size:12px;color:#2c5530;background:#f2f8ed;border:1px solid #dfeed4;border-radius:999px;padding:7px 12px}
        @media(max-width:1024px){.hero2-section{grid-template-columns:1fr;text-align:center}.hero2-img-wrap{order:-1}.hero2-circle{width:360px;height:360px;margin:0 auto}.hero2-float{top:120px}}
        @media(max-width:640px){.hero2-title{font-size:26px}.hero2-container{padding:56px 16px 20px}.hero2-search{max-width:100%}.hero2-circle{width:300px;height:300px}.hero2-float{top:90px}}
    </style>
    <div class="hero2-wrapper">
        <div class="hero2-container">
            <section class="hero2-section">
                <div>
                    <div class="hero2-badge">{{ $categoryModel->name }}</div>
                    <h1 class="hero2-title">
                        {{ $categoryModel->name }}
                    </h1>
                    @if(!empty($categoryModel->banner_description))
                        <p class="hero2-desc">{{ $categoryModel->banner_description }}</p>
                    @endif
                    <div class="hero2-search">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7ea861" stroke-width="2">
                            <circle cx="11" cy="11" r="7"/>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                        <input class="hero2-input" type="text" placeholder="Telusuri..."/>
                    </div>
                    <div class="hero2-badges">
                        <span class="hero2-small-badge">{{ $categoryModel->name }}</span>
                        <span class="hero2-small-badge">Terbaru</span>
                    </div>
                </div>
                <div class="hero2-img-wrap">
                    <div class="hero2-circle">
                        <div class="hero2-food">
                            @if(!empty($categoryModel->banner_image))
                                <img src="{{ asset('storage/'.$categoryModel->banner_image) }}" alt="{{ $categoryModel->name }}"/>
                            @else
                                <img src="{{ asset('img/bowl-hero2.svg') }}" alt="Hero"/>
                            @endif
                        </div>
                        <div class="hero2-float">
                            <div class="hero2-float-title">{{ $categoryModel->name }}</div>
                            <div class="hero2-float-sub">Kategori</div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">


    {{-- Pesan bila belum ada artikel di kategori ini --}}
    @if(isset($hasArticles) && !$hasArticles)
        <div style="max-width:1200px; margin:24px auto 40px; padding:0 16px;">
            <div style="background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:16px 20px; color:#4E342E; font-family:'Poppins',sans-serif;">
                Artikel akan segera tayang.
            </div>
        </div>
    @endif

    
    {{-- Grid artikel untuk kategori dinamis (jika ada artikel) --}}
    @if(isset($hasArticles) && $hasArticles)
        @php
            $items = ($articles ?? collect());
            $featured = $items->first();
            $sidebar = $items->skip(1)->take(3);
            $categorySlug = $categoryModel->slug ?? ($category ?? '');
        @endphp
        <style>
            .la-container{max-width:1200px;margin:28px auto 60px;padding:0 16px}
            .la-title{color:#4E342E;font-family:'Poppins',sans-serif;font-size:24px;font-weight:700;margin:0 0 16px}
            .la-grid{display:grid;grid-template-columns:1fr 1fr;gap:40px;align-items:start}
            .la-main{display:flex;flex-direction:column}
            .la-main-img{width:100%;height:260px;border-radius:16px;overflow:hidden;margin-bottom:16px;position:relative;flex-shrink:0;transition:transform .3s ease, box-shadow .3s ease}
            .la-main-img:hover{transform:translateY(-5px);box-shadow:0 15px 35px rgba(0,0,0,.1)}
            .la-main-img img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .3s ease}
            .la-main-img:hover img{transform:scale(1.05)}
            .la-main-tag{display:inline-flex;align-items:center;background:#e8f5e8;color:#8BAC65;padding:6px 14px;border-radius:20px;font-family:'Poppins',sans-serif;font-size:13px;font-weight:700;margin-bottom:12px;width:fit-content;transition:all .3s ease}
            .la-main-tag:hover{background:#8BAC65;color:#fff;transform:translateY(-2px)}
            .la-main-icon{display:inline-flex;align-items:center;justify-content:center;margin-right:8px;color:#8BAC65;font-size:18px}
            .la-main h2{font-family:'Poppins',sans-serif;font-size:22px;font-weight:700;line-height:1.3;margin:0 0 12px;color:#4E342E;transition:color .3s ease}
            .la-main h2:hover{color:#8BAC65}
            .la-desc{font-family:'Montserrat',sans-serif;font-size:15px;line-height:1.5;color:#4E342E;font-weight:500;margin:0 0 20px}
            .la-meta{display:flex;justify-content:space-between;align-items:center;font-family:'Montserrat',sans-serif;font-size:12px;color:#999;font-weight:600}
            .la-meta .author{font-weight:600;color:#666}
            .la-actions{display:flex;align-items:center;gap:12px}
            .la-btn{background:#B4D678;color:#fff;border:none;padding:12px 24px;border-radius:25px;font-family:'Poppins',sans-serif;font-size:14px;font-weight:500;cursor:pointer;transition:all .3s ease;position:relative;overflow:hidden}
            .la-btn::before{content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;background:linear-gradient(90deg,transparent,rgba(255,255,255,.3),transparent);transition:left .6s}
            .la-btn:hover::before{left:100%}
            .la-btn:hover{background:#A5C866;transform:translateY(-2px);box-shadow:0 8px 20px rgba(180,214,120,.4)}
            .la-bmk{background:transparent;border:none;color:#666;padding:8px;border-radius:8px;cursor:pointer;width:36px;height:36px;display:flex;align-items:center;justify-content:center;transition:all .3s ease;font-size:18px}
            .la-bmk:hover{background:rgba(180,214,120,.1);color:#B4D678;transform:scale(1.1)}
            .la-bmk svg{width:24px;height:24px}
            .la-side{display:flex;flex-direction:column;gap:18px}
            .la-item{display:flex;gap:16px;align-items:flex-start;height:158px;flex-shrink:0;opacity:1;transition:all .3s ease}
            .la-item:hover{transform:translateX(10px)}
            .la-item-img{width:140px;height:120px;flex-shrink:0;border-radius:15px;overflow:hidden;background:#f0f0f0;margin-top:2px;transition:transform .3s ease}
            .la-item:hover .la-item-img{transform:scale(1.05)}
            .la-item-img img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .3s ease}
            .la-item:hover .la-item-img img{transform:scale(1.1)}
            .la-item-body{flex:1;display:flex;flex-direction:column;height:120px;justify-content:space-between;padding-top:2px}
            .la-cat{display:inline-flex;align-items:center;background:transparent;color:#8BAC65;padding:0;font-family:'Poppins',sans-serif;font-size:12px;font-weight:700;margin-bottom:8px;width:fit-content;transition:color .3s ease}
            .la-cat:hover{color:#4E342E}
            .la-cat-icon{display:inline-flex;align-items:center;justify-content:center;margin-right:6px;color:#8BAC65;font-size:16px}
            .la-item h3{font-family:'Poppins',sans-serif;font-size:15px;font-weight:700;color:#4E342E;line-height:1.2;margin:0 0 6px;transition:color .3s ease}
            .la-item:hover h3{color:#8BAC65}
            .la-item-desc{font-family:'Montserrat',sans-serif;font-size:12px;color:#4E342E;font-weight:500;line-height:1.3;margin:0 0 6px;flex-grow:1;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
            .la-foot{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-top:auto}
            .la-author{font-family:'Montserrat',sans-serif;font-size:12px;color:#999;font-weight:600;flex:1}
            .la-author .author{font-weight:600;color:#666}
            .la-sidebtn{background:#B4D678;color:#fff;border:none;padding:8px 16px;border-radius:20px;font-family:'Poppins',sans-serif;font-size:12px;font-weight:500;cursor:pointer;transition:all .3s ease;position:relative;overflow:hidden}
            .la-sidebtn::before{content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;background:linear-gradient(90deg,transparent,rgba(255,255,255,.3),transparent);transition:left .6s}
            .la-sidebtn:hover::before{left:100%}
            .la-sidebtn:hover{background:#A5C866;transform:translateY(-1px);box-shadow:0 5px 15px rgba(180,214,120,.4)}
            @media(max-width:768px){.la-grid{grid-template-columns:1fr;gap:30px}.la-title{font-size:24px;margin-bottom:20px}.la-main-img{height:250px}.la-item{height:120px}.la-item-img{width:120px;height:90px}.la-meta{flex-direction:column;gap:15px;align-items:flex-start}.la-actions{width:100%;justify-content:flex-start}}
        </style>
        <section class="la-container">
            <h2 class="la-title">Artikel Terbaru</h2>
            <div class="la-grid">
                <div class="la-main">
                    @php
                        $fImg = $featured?->image ? asset('storage/'.$featured->image) : null;
                        $fLink = $featured?->file_path ? url($featured->file_path) : 'javascript:void(0)';
                        $fDesc = $featured?->description ?: '';
                    @endphp
                    @if($featured)
                    <a href="{{ $fLink }}" class="la-main-img" aria-label="Baca: {{ $featured->title }}">
                        @if($fImg)
                            <img src="{{ $fImg }}" alt="{{ $featured->title }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?q=80&w=1200&auto=format&fit=crop" alt="{{ $featured->title }}">
                        @endif
                    </a>
                    <div class="la-main">
                        <div class="la-main-tag">
                            @if(!empty($categoryModel->icon))
                                <i class="la-main-icon {{ $categoryModel->icon }}"></i>
                            @else
                                <i class="la-main-icon fas fa-leaf"></i>
                            @endif
                            {{ $categoryModel->name ?? ucfirst(str_replace('-', ' ', $categorySlug)) }}
                        </div>
                        <h2>{{ $featured->title }}</h2>
                        @if($fDesc)
                            <p class="la-desc">{{ $fDesc }}</p>
                        @endif
                        <div class="la-meta">
                            <span>Ditinjau: <span class="author">{{ $featured->author ?? '-' }}</span> <span class="la-clock"><i class="fas fa-clock"></i> {{ optional($featured->created_at)->diffForHumans() }}</span></span>
                            <div class="la-actions">
                                <button class="la-btn" onclick="window.location.href='{{ $fLink }}'">Selengkapnya</button>
                                <button class="la-bmk" onclick='saveFavOnly({
                                    article_id: "db-{{ $featured->id }}",
                                    article_title: @json($featured->title),
                                    article_category: @json($categorySlug),
                                    article_image: @json($fImg),
                                    article_description: @json($fDesc),
                                    article_author: @json($featured->author),
                                    article_url: @json($fLink)
                                }, this)'
                                    data-article-id="db-{{ $featured->id }}"
                                    data-article-title="{{ $featured->title }}"
                                    data-article-category="{{ $categorySlug }}"
                                    data-article-image="{{ $fImg }}"
                                    data-article-url="{{ $fLink }}">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="la-side">
                    @foreach($sidebar as $s)
                        @php
                            $sImg = $s->image ? asset('storage/'.$s->image) : null;
                            $sLink = $s->file_path ? url($s->file_path) : 'javascript:void(0)';
                        @endphp
                        <div class="la-item">
                            <a href="{{ $sLink }}" class="la-item-img" aria-label="Baca: {{ $s->title }}">
                                @if($sImg)
                                    <img src="{{ $sImg }}" alt="{{ $s->title }}">
                                @else
                                    <img src="https://images.unsplash.com/photo-1576045057995-568f588f82fb?q=80&w=1200&auto=format&fit=crop" alt="{{ $s->title }}">
                                @endif
                            </a>
                            <div class="la-item-body">
                                <div class="la-cat">
                                    @if(!empty($categoryModel->icon))
                                        <i class="la-cat-icon {{ $categoryModel->icon }}"></i>
                                    @else
                                        <i class="la-cat-icon fas fa-leaf"></i>
                                    @endif
                                    {{ $categoryModel->name ?? ucfirst(str_replace('-', ' ', $categorySlug)) }}
                                </div>
                                <h3>{{ $s->title }}</h3>
                                @if(!empty($s->description))
                                    <p class="la-item-desc">{{ $s->description }}</p>
                                @endif
                                <div class="la-foot">
                                    <div class="la-author">Penulis: <span class="author">{{ $s->author ?? '-' }}</span></div>
                                    <div class="la-actions">
                                        <button class="la-sidebtn" onclick="window.location.href='{{ $sLink }}'">selengkapnya</button>
                                        <button class="la-bmk" onclick='saveFavOnly({
                                            article_id: "db-{{ $s->id }}",
                                            article_title: @json($s->title),
                                            article_category: @json($categorySlug),
                                            article_image: @json($sImg),
                                            article_description: @json($s->description),
                                            article_author: @json($s->author),
                                            article_url: @json($sLink)
                                        }, this)'
                                            data-article-id="db-{{ $s->id }}"
                                            data-article-title="{{ $s->title }}"
                                            data-article-category="{{ $categorySlug }}"
                                            data-article-image="{{ $sImg }}"
                                            data-article-url="{{ $sLink }}">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @endif

    

    @if(isset($banners) && $banners->count() > 0)
        <style>
            .dyn-banner-wrap{max-width:1200px;margin:24px auto 8px;padding:0 16px}
            .dyn-banner{position:relative;width:100%;height:360px;border-radius:18px;overflow:hidden;box-shadow:0 20px 50px rgba(0,0,0,.08)}
            .dyn-banner-slides{position:relative;width:100%;height:100%}
            .dyn-banner-slide{position:absolute;inset:0;opacity:0;transition:opacity .6s ease}
            .dyn-banner-slide.active{opacity:1}
            .dyn-banner-slide img{width:100%;height:100%;object-fit:cover;display:block}
            .dyn-banner-overlay{position:absolute;inset:0;background:linear-gradient(90deg, rgba(0,0,0,.55) 0%, rgba(0,0,0,.35) 55%, rgba(0,0,0,.15) 100%);display:flex;align-items:center}
            .dyn-banner-content{color:#fff;padding:0 28px 0 44px;max-width:560px}
            .dyn-banner-content h3{font-family:'Poppins',sans-serif;font-size:28px;font-weight:700;line-height:1.25;margin:0 0 10px;text-shadow:0 2px 4px rgba(0,0,0,.4)}
            .dyn-banner-content p{font-family:'Poppins',sans-serif;font-size:15px;line-height:1.6;margin:0 0 14px;opacity:.95}
            .dyn-banner-btn{display:inline-block;background:rgba(255,255,255,.25);color:#fff;border:1px solid rgba(255,255,255,.35);padding:10px 22px;border-radius:22px;font-size:13px;font-weight:600;text-decoration:none;backdrop-filter:blur(10px);transition:all .2s}
            .dyn-banner-btn:hover{transform:translateY(-2px);background:rgba(255,255,255,.35)}
            .dyn-nav{position:absolute;inset:0;display:flex;justify-content:space-between;align-items:center;padding:0 12px;pointer-events:none}
            .dyn-nav button{pointer-events:all;background:transparent;border:none;color:#fff;width:48px;height:48px;font-size:28px;cursor:pointer;transition:transform .2s, opacity .2s;text-shadow:0 2px 4px rgba(0,0,0,.5)}
            .dyn-nav button:hover{transform:scale(1.15)}
            .dyn-indicators{position:absolute;left:50%;bottom:16px;transform:translateX(-50%);display:flex;gap:8px}
            .dyn-indicator{width:10px;height:10px;border-radius:50%;background:rgba(255,255,255,.45);border:1px solid rgba(255,255,255,.35);transition:transform .2s, background .2s}
            .dyn-indicator.active{background:#fff;transform:scale(1.2);box-shadow:0 2px 8px rgba(255,255,255,.5)}
            @media(max-width:768px){.dyn-banner{height:280px}.dyn-banner-content{padding:0 18px}.dyn-banner-content h3{font-size:22px}.dyn-banner-btn{padding:8px 16px;font-size:12px}}
        </style>
        <div class="dyn-banner-wrap">
            <div class="dyn-banner">
                <div class="dyn-banner-slides">
                    @foreach($banners as $i => $b)
                        @php
                            $img = !empty($b->image) ? asset('storage/'.$b->image) : null;
                            $title = $b->title ?? '';
                            $desc = $b->description ?? '';
                            $url = $b->file_path ?? '';
                        @endphp
                        <div class="dyn-banner-slide {{ $i === 0 ? 'active' : '' }}">
                            @if($img)
                                <img src="{{ $img }}" alt="{{ $title }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1498837167922-ddd27525d352?q=80&w=1920&auto=format&fit=crop" alt="{{ $title }}">
                            @endif
                            <div class="dyn-banner-overlay">
                                <div class="dyn-banner-content">
                                    @if($title)
                                        <h3>{{ $title }}</h3>
                                    @endif
                                    @if($desc)
                                        <p>{{ $desc }}</p>
                                    @endif
                                    @if($url)
                                        <a class="dyn-banner-btn" href="{{ url($url) }}">Baca Selengkapnya</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="dyn-nav">
                    <button type="button" aria-label="Prev" onclick="dynPrev()">‹</button>
                    <button type="button" aria-label="Next" onclick="dynNext()">›</button>
                </div>
                <div class="dyn-indicators">
                    @foreach($banners as $i => $b)
                        <span class="dyn-indicator {{ $i===0 ? 'active' : '' }}" onclick="dynGo({{ $i }})"></span>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            let dynIdx = 0;
            const dynSlides = document.querySelectorAll('.dyn-banner-slide');
            const dynDots = document.querySelectorAll('.dyn-indicator');
            let dynTimer;
            function dynShow(i){
                if(!dynSlides.length) return;
                dynSlides.forEach(s=>s.classList.remove('active'));
                dynDots.forEach(d=>d.classList.remove('active'));
                dynIdx = (i+dynSlides.length)%dynSlides.length;
                dynSlides[dynIdx].classList.add('active');
                dynDots[dynIdx].classList.add('active');
            }

  // Save favorite only, with visual success state on the clicked bookmark button
  async function saveFavOnly(payload, btn){
    try{
      const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
      const alreadySaved = btn?.dataset?.saved === '1';
      if (btn) btn.disabled = true;
      if (alreadySaved){
        // remove from favorites
        const resDel = await fetch('/favorites', {
          method: 'DELETE',
          headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json', 'Content-Type':'application/x-www-form-urlencoded' },
          body: new URLSearchParams({ article_id: payload.article_id })
        });
        if (resDel && resDel.ok){ if (btn){ unsetBookmarkSaved(btn); } }
        else if (resDel && resDel.status === 401){ showLoginNotice(); }
        else { showSmallNotice('Gagal menghapus favorit'); }
      } else {
        // add to favorites
        const res = await fetch('/favorites', {
          method: 'POST',
          headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json', 'Content-Type':'application/json' },
          body: JSON.stringify(payload)
        });
        if (res && (res.status===200 || res.status===201 || res.status===409)){
          if (btn){ setBookmarkSaved(btn); }
        }
        else if (res && res.status === 401){ showLoginNotice(); }
        else { showSmallNotice('Gagal menyimpan ke favorit'); }
      }
    }catch(e){ /* ignore */ }
    finally { if (btn) btn.disabled = false; }
  }

  // Apply saved style to bookmark button
  function setBookmarkSaved(btn){
    try{
      if (btn.classList.contains('tp-fav') || btn.classList.contains('tpl-fav')){
        // Heart style when saved (red)
        btn.style.background = '#fee2e2';
        btn.style.borderColor = '#ef4444';
        btn.style.color = '#ef4444';
        btn.innerHTML = '<svg viewBox="0 0 24 24" fill="#ef4444" stroke="#ef4444" stroke-width="2" width="18" height="18"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8z"/></svg>';
      } else if (btn.classList.contains('la-bmk')) {
        // Minimal bookmark saved state for Latest Articles icon (no large gradient)
        btn.style.background = 'transparent';
        btn.style.borderColor = 'transparent';
        btn.style.color = '#8BAC65';
        btn.style.boxShadow = 'none';
        btn.style.borderRadius = '8px';
        btn.style.padding = '8px';
        btn.innerHTML = '<svg viewBox="0 0 24 24" fill="#8BAC65" width="20" height="20"><path d="M5 3a2 2 0 0 0-2 2v16l9-5 9 5V5a2 2 0 0 0-2-2H5z"/></svg>';
      } else {
        // default minimal style
        btn.style.background = 'transparent';
        btn.style.borderColor = 'transparent';
        btn.style.color = '#666';
        btn.style.boxShadow = 'none';
        btn.style.borderRadius = '8px';
        btn.style.padding = '8px';
        btn.innerHTML = '<svg viewBox="0 0 24 24" fill="#8BAC65" width="20" height="20"><path d="M5 3a2 2 0 0 0-2 2v16l9-5 9 5V5a2 2 0 0 0-2-2H5z"/></svg>';
      }
      btn.dataset.saved = '1';
    }catch(e){}
  }

  function unsetBookmarkSaved(btn){
    try{
      btn.disabled = false;
      if (btn.classList.contains('tp-fav') || btn.classList.contains('tpl-fav')){
        // revert heart to outline green
        btn.style.background = '#fff';
        btn.style.borderColor = '#e5e7eb';
        btn.style.color = '#8BAC65';
        btn.style.boxShadow = '0 4px 10px rgba(0,0,0,.08)';
        btn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8z"/></svg>';
      } else if (btn.classList.contains('la-bmk')) {
        // revert to outline style for Latest Articles bookmark icon
        btn.style.background = 'transparent';
        btn.style.borderColor = 'transparent';
        btn.style.color = '#666';
        btn.style.boxShadow = 'none';
        btn.style.borderRadius = '8px';
        btn.style.padding = '8px';
        btn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/></svg>';
      } else {
        // default outline style
        btn.style.background = 'transparent';
        btn.style.borderColor = 'transparent';
        btn.style.color = '#666';
        btn.style.boxShadow = 'none';
        btn.style.borderRadius = '8px';
        btn.style.padding = '8px';
        btn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/></svg>';
      }
      btn.dataset.saved = '0';
    }catch(e){}
  }

  // On load, fetch favorites and mark bookmark buttons as saved
  document.addEventListener('DOMContentLoaded', async ()=>{
    try{
      const res = await fetch('/favorites', { headers: { 'Accept':'application/json' } });
      if (!res.ok) return; // not logged in or error, ignore
      const data = await res.json();
      const favs = data?.favorites || [];
      const favIds = new Set(favs.map(f=> String(f.article_id)));
      document.querySelectorAll('.la-bmk, .tp-fav, .tpl-fav').forEach(btn=>{
        const id = btn.getAttribute('data-article-id');
        if (id && favIds.has(String(id))){ setBookmarkSaved(btn); } else { unsetBookmarkSaved(btn); }
      });
    }catch(e){ /* ignore */ }
  });

  function showLoginNotice(){
    showSmallNotice('Silakan login untuk menyimpan ke favorit');
  }
  function showSmallNotice(msg){
    try{
      const n = document.createElement('div');
      n.textContent = msg;
      n.style.cssText = 'position:fixed;top:20px;right:20px;background:#4B5C3B;color:#fff;padding:10px 14px;border-radius:8px;z-index:9999;box-shadow:0 4px 16px rgba(0,0,0,.15);font-family:Poppins, sans-serif;font-size:13px;';
      document.body.appendChild(n);
      setTimeout(()=>{ n.style.opacity='0'; n.style.transition='opacity .3s'; setTimeout(()=>{ n.remove(); },300); }, 1800);
    }catch(e){}
  }
            function dynNext(){ dynShow(dynIdx+1); dynReset(); }
            function dynPrev(){ dynShow(dynIdx-1); dynReset(); }
            function dynGo(i){ dynShow(i); dynReset(); }
            function dynAuto(){ dynTimer = setInterval(()=>{ dynShow(dynIdx+1); }, 8000); }
            function dynReset(){ clearInterval(dynTimer); dynAuto(); }
        </script>
    @endif

    {{-- Topik Populer untuk kategori dinamis (posisi: setelah banner) --}}
    @if(isset($popularTopics) && $popularTopics->count() > 0)
        @php
            $featuredTopics = $popularTopics->where('is_featured', 1)->take(2);
            if ($featuredTopics->count() < 2) {
                $featuredTopics = $popularTopics->take(2);
            }
            $featuredIds = $featuredTopics->pluck('id')->all();
            $listTopics = $popularTopics->filter(fn($t)=> !in_array($t->id, $featuredIds))->values()->take(4);
        @endphp
        <style>
            .tp-wrap{max-width:1200px;margin:40px auto 60px;padding:0 16px}
            .tp-title{font-family:'Poppins',sans-serif;font-weight:700;font-size:28px;color:#4E342E;margin:0 0 20px}
            .tp-featured{margin-bottom:26px}
            .tp-grid{display:grid;grid-template-columns:1fr 1fr;gap:26px}
            .tp-card{position:relative;border-radius:20px;overflow:hidden;background:#fff;border:1px solid #e5e7eb}
            .tp-wrap a{ color: inherit; text-decoration: none; }
            .tp-wrap a:hover{ text-decoration: none; }
            .tp-img{width:100%;height:220px;object-fit:cover;display:block}
            .tp-body{padding:14px}
            .tp-tag{display:inline-block;background:#e8f5e8;color:#4A7C59;font-family:'Montserrat',sans-serif;font-size:10px;font-weight:700;padding:4px 8px;border-radius:12px;text-transform:uppercase;letter-spacing:.5px;margin-bottom:8px}
            .tp-h{font-family:'Poppins',sans-serif;font-weight:700;font-size:20px;color:#4E342E;line-height:1.3;margin:0 0 8px}
            .tp-d{font-family:'Montserrat',sans-serif;font-size:14px;font-weight:500;color:#4E342E;line-height:1.4;margin:0 0 8px}
            .tp-rate{color:#ffd700;font-size:16px}
            .tp-list{margin-top:22px}
            .tp-listgrid{display:grid;grid-template-columns:1fr 1fr;gap:18px}
            .tpl-item{display:flex;gap:14px;position:relative}
            .tpl-img{width:160px;height:120px;object-fit:cover;border-radius:12px;flex-shrink:0}
            .tpl-body{flex:1;display:flex;flex-direction:column}
            .tpl-h{font-family:'Poppins',sans-serif;font-weight:600;font-size:14px;color:#4E342E;line-height:1.3;margin:0 0 6px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
            .tpl-d{font-family:'Montserrat',sans-serif;font-size:12px;font-weight:500;color:#4E342E;line-height:1.3;margin:0 0 8px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
            .tpl-meta{display:flex;align-items:center;gap:6px}
            .tpl-rate{color:#ffd700;font-size:14px}
            .tpl-author{font-family:'Montserrat',sans-serif;font-size:10px;color:#888;font-weight:600}
            .tp-fav, .tpl-fav{position:absolute;right:12px;top:12px;width:36px;height:36px;border-radius:12px;background:#fff;border:1px solid #e5e7eb;display:flex;align-items:center;justify-content:center;color:#8BAC65;box-shadow:0 4px 10px rgba(0,0,0,.08)}
            .tp-card:hover .tp-fav{transform:translateY(-2px)}
            .tpl-item:hover .tpl-fav{transform:translateY(-2px)}
            .tp-fav svg, .tpl-fav svg{width:18px;height:18px}
            @media(max-width:768px){.tp-grid{grid-template-columns:1fr}.tp-img{height:200px}.tp-listgrid{grid-template-columns:1fr}.tpl-img{width:100%;height:180px}}
        </style>
        <section class="tp-wrap">
            <h2 class="tp-title">Topik Populer</h2>
            <div class="tp-featured">
                <div class="tp-grid">
                    @foreach($featuredTopics as $ft)
                        @php
                            $fImg = !empty($ft->image) ? asset('storage/'.$ft->image) : 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&h=400&fit=crop&crop=center';
                            $fUrl = !empty($ft->article_url) ? url($ft->article_url) : 'javascript:void(0)';
                            $fRating = (int)($ft->rating ?? 0);
                        @endphp
                        <a class="tp-card" href="{{ $fUrl }}" aria-label="Baca: {{ $ft->title }}">
                            <img class="tp-img" src="{{ $fImg }}" alt="{{ $ft->title }}">
                            <button type="button" class="tp-fav" title="Simpan ke Koleksi"
                                onclick='event.preventDefault(); event.stopPropagation(); saveFavOnly({
                                  article_id: "popular-{{ $ft->id }}",
                                  article_title: @json($ft->title),
                                  article_category: @json($categoryModel->slug ?? ($category ?? "")),
                                  article_image: @json($fImg),
                                  article_description: @json($ft->description ?? ""),
                                  article_author: @json($ft->author ?? ""),
                                  article_url: @json($fUrl)
                                }, this)'
                                data-article-id="popular-{{ $ft->id }}" data-saved="0">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8z"/></svg>
                            </button>
                            <div class="tp-body">
                                <span class="tp-tag">{{ $categoryModel->name ?? ucfirst(str_replace('-', ' ', $category ?? '')) }}</span>
                                <div class="tp-h">{{ $ft->title }}</div>
                                @if(!empty($ft->description))
                                    <div class="tp-d">{{ $ft->description }}</div>
                                @endif
                                <div class="tp-rate">
                                    @for($i=0;$i<5;$i++){!! $i < $fRating ? '★' : '☆' !!}@endfor
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @if($listTopics->count() > 0)
            <div class="tp-list">
                <div class="tp-listgrid">
                    @foreach($listTopics as $lt)
                        @php
                            $lImg = !empty($lt->image) ? asset('storage/'.$lt->image) : 'https://images.unsplash.com/photo-1515543237350-b3eea1ec8082?w=600&h=400&fit=crop&crop=center';
                            $lUrl = !empty($lt->article_url) ? url($lt->article_url) : 'javascript:void(0)';
                            $lRating = (int)($lt->rating ?? 0);
                        @endphp
                        <a class="tpl-item" href="{{ $lUrl }}" aria-label="Baca: {{ $lt->title }}">
                            <img class="tpl-img" src="{{ $lImg }}" alt="{{ $lt->title }}">
                            <button type="button" class="tpl-fav" title="Simpan ke Koleksi"
                                onclick='event.preventDefault(); event.stopPropagation(); saveFavOnly({
                                  article_id: "popular-{{ $lt->id }}",
                                  article_title: @json($lt->title),
                                  article_category: @json($categoryModel->slug ?? ($category ?? "")),
                                  article_image: @json($lImg),
                                  article_description: @json($lt->description ?? ""),
                                  article_author: @json($lt->author ?? ""),
                                  article_url: @json($lUrl)
                                }, this)'
                                data-article-id="popular-{{ $lt->id }}" data-saved="0">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8z"/></svg>
                            </button>
                            <div class="tpl-body">
                                <div class="tpl-h">{{ $lt->title }}</div>
                                @if(!empty($lt->description))
                                    <div class="tpl-d">{{ $lt->description }}</div>
                                @endif
                                <div class="tpl-meta">
                                    <span class="tpl-rate">
                                        @for($i=0;$i<5;$i++){!! $i < $lRating ? '★' : '☆' !!}@endfor
                                    </span>
                                    @if(!empty($lt->author))
                                        <span class="tpl-author">Penulis: {{ $lt->author }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif
        </section>
    @endif

    {{-- Halaman image (untuk kategori dinamis) --}}
    @if(isset($categoryModel))
    <div style="margin-top: 100px;">
        <img src="{{ asset('image/Rectangle 159.png') }}" 
             alt="Eat Organic" 
             style="width: 100%; height: auto; display: block;">
    </div>
    @endif

    {{-- Footer untuk kategori dinamis --}}
    @if(isset($categoryModel))
        @if(isset($guides) && $guides->count() > 0)
        <style>
            .panduan-section{font-family:'Montserrat',sans-serif;background:#fafafa;line-height:1.6;padding:40px 0}
            .pd-container{max-width:1200px;margin:0 auto;padding:0 20px}
            .pd-grid{display:grid;grid-template-columns:1fr 360px;gap:40px}
            .pd-list{display:flex;flex-direction:column}
            .pd-item{display:flex;gap:24px;margin-bottom:32px;padding-bottom:24px;border-bottom:1px solid #e8e8e8;align-items:flex-start;position:relative}
            .pd-img{width:200px;height:150px;border-radius:12px;object-fit:cover;flex-shrink:0;box-shadow:0 2px 8px rgba(0,0,0,.08)}
            .pd-body{flex:1;display:flex;flex-direction:column;gap:10px;min-height:150px}
            .pd-tag{display:inline-flex;align-items:center;gap:8px}
            .pd-tag-text{color:#8BAC65;font-size:13px;font-weight:500;font-family:'Montserrat',sans-serif}
            .pd-title{font-family:'Poppins',sans-serif;font-weight:600;font-size:20px;color:#4E342E;line-height:1.4;margin:0}
            .pd-desc{font-family:'Montserrat',sans-serif;font-weight:400;font-size:15px;color:#666;line-height:1.6}
            .pd-meta{display:flex;justify-content:space-between;align-items:center;gap:16px;font-size:13px;color:#888;margin-top:auto}
            .pd-meta-left{display:flex;align-items:center;gap:16px;flex-wrap:wrap}
            .pd-author{display:flex;align-items:center;gap:6px}
            .sb-section{background:#fff;border-radius:16px;box-shadow:0 4px 20px rgba(0,0,0,.08);overflow:hidden}
            .sb-banner{padding:20px}
            .sb-banner img{width:100%;height:340px;object-fit:cover;border-radius:16px}
            .sb-cats{background:linear-gradient(135deg, rgba(122, 159, 126, 0.6), rgba(138, 175, 142, 0.7));backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.2);padding:24px}
            .sb-title{font-family:'Poppins',sans-serif;font-weight:700;font-size:18px;color:#fff;margin:0 0 20px;position:relative;padding-bottom:10px}
            .sb-title:after{content:'';position:absolute;left:0;bottom:0;width:40px;height:3px;background:linear-gradient(135deg,#6b9640,#7ba955);border-radius:2px}
            .cat-list{display:flex;flex-direction:column;gap:12px}
            .cat-item{display:flex;align-items:center;gap:16px;padding:14px;background:#fff;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,.08);text-decoration:none;color:#4E342E;transition:all .2s}
            .cat-item:hover{transform:translateY(-2px);box-shadow:0 6px 18px rgba(0,0,0,.12);background:linear-gradient(135deg,#f8fbf4,#f0f7e8)}
            .cat-img{width:48px;height:48px;border-radius:10px;object-fit:cover;flex-shrink:0;background:linear-gradient(135deg,#f0f7e8,#e8f5dc);padding:6px}
            .cat-text{font-family:'Montserrat',sans-serif;font-weight:600;font-size:13px;color:#4E342E;line-height:1.25}
            @media(max-width:992px){.pd-grid{grid-template-columns:1fr}.sb-banner img{height:240px}}
            @media(max-width:768px){.pd-item{flex-direction:column}.pd-img{width:100%;height:200px}}
        </style>
        <section class="panduan-section">
            <div class="pd-container">
                <div class="pd-grid">
                    <div>
                        <div class="pd-list">
                    @foreach($guides as $g)
                        @php
                            $gImg = !empty($g->image) ? asset('storage/'.$g->image) : 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&h=400&fit=crop&crop=center';
                            $gUrl = !empty($g->file_path) ? url($g->file_path) : 'javascript:void(0)';
                            $gTime = '';
                            try { if (!empty($g->created_at)) { $gTime = \Carbon\Carbon::parse($g->created_at)->diffForHumans(); } } catch (\Throwable $e) { $gTime = ''; }
                        @endphp
                        <article class="pd-item">
                            <a href="{{ $gUrl }}" aria-label="Baca: {{ $g->title }}">
                                <img class="pd-img" src="{{ $gImg }}" alt="{{ $g->title }}">
                            </a>
                            <div class="pd-body">
                                <div class="pd-tag">
                                    @if(!empty($categoryModel->icon))
                                        <i class="{{ $categoryModel->icon }}" style="font-size:18px;color:#8BAC65"></i>
                                    @else
                                        <i class="fas fa-leaf" style="font-size:18px;color:#8BAC65"></i>
                                    @endif
                                    <span class="pd-tag-text">{{ $categoryModel->name }}</span>
                                </div>
                                <h2 class="pd-title">{{ $g->title }}</h2>
                                @if(!empty($g->description))
                                    <p class="pd-desc">{{ $g->description }}</p>
                                @endif
                                <div class="pd-meta">
                                    <div class="pd-meta-left">
                                        @if(!empty($g->author))
                                        <div class="pd-author">
                                            <img src="{{ asset('image/uil_pen.png') }}" alt="Pen" style="width:16px;height:16px">
                                            <span>Ditinjau: {{ $g->author }}</span>
                                        </div>
                                        @endif
                                        @if($gTime)
                                        <div class="pd-time" style="display:flex;align-items:center;gap:6px">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12,6 12,12 16,14"/></svg>
                                            <span>{{ $gTime }}</span>
                                        </div>
                                        @endif
                                    </div>
                                    <button type="button" class="bookmark-section la-bmk" style="display:flex;align-items:center;gap:8px;color:#8BAC65;background:transparent;border:none;cursor:pointer"
                                        onclick='saveFavOnly({
                                            article_id: "guide-{{ $g->id }}",
                                            article_title: @json($g->title),
                                            article_category: @json($categoryModel->slug ?? ($category ?? "")),
                                            article_image: @json($gImg),
                                            article_description: @json($g->description ?? ""),
                                            article_author: @json($g->author ?? ""),
                                            article_url: @json($gUrl)
                                        }, this)'
                                        data-article-id="guide-{{ $g->id }}" data-saved="0">
                                        <span>Simpan Artikel</span>
                                        <svg class="bookmark-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/></svg>
                                    </button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                        </div>
                        @if(method_exists($guides,'hasPages') && $guides->hasPages())
                        <style>
                            .pd-pagination{display:flex;justify-content:center;align-items:center;margin-top:28px}
                            .pd-pagination .pagination{display:flex;gap:12px;list-style:none;margin:0;padding:0}
                            .pd-pagination .page-item .page-link{
                                min-width:50px;height:50px;display:flex;align-items:center;justify-content:center;
                                border:1px solid #e2e8f0;background:#fff;color:#4E342E;font-family:'Montserrat',sans-serif;font-weight:700;
                                border-radius:14px;text-decoration:none;
                            }
                            .pd-pagination .page-item .page-link:hover{background:#f7fafc}
                            .pd-pagination .page-item.active .page-link{background:#8BAC65;color:#fff;border-color:#8BAC65}
                            .pd-pagination .page-item.disabled .page-link{background:#fff;color:#9aa3af;border-color:#e5e7eb}
                            .pd-pagination .page-item.disabled .page-link:hover{background:#fff}
                            .pd-pagination .page-item .page-link:focus{box-shadow:none}
                        </style>
                        <div class="pd-pagination">
                            {{ $guides->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                        @endif
                    </div>
                    @if(isset($globalCategories) && $globalCategories->count() > 0)
                    <aside>
                        <div class="sb-section sb-banner">
                            <img src="{{ asset('image/Rectangle 167.png') }}" alt="Banner Samping">
                        </div>
                        <div class="sb-section sb-cats" style="margin-top:24px">
                            <h3 class="sb-title">Jelajahi Kategori Lain</h3>
                            <div class="cat-list">
                                @php $imgs = ['Rectangle 220.png','Rectangle 222.png','Rectangle 224.png','Rectangle 226.png','Rectangle 228.png','Rectangle 230.png']; @endphp
                                @foreach($globalCategories->where('slug','!=',$categoryModel->slug)->take(6) as $i => $gc)
                                    <a class="cat-item" href="{{ url('/kategori/'.$gc->slug) }}" aria-label="Kategori {{ $gc->name }}">
                                        <img class="cat-img" src="{{ asset('image/'.($imgs[$i % count($imgs)])) }}" alt="{{ $gc->name }}">
                                        <span class="cat-text">{{ $gc->name }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                    @endif
                </div>
            </div>
        </section>
        @endif
        @includeIf('components.footer')
    @endif
@endif

<script>
  // Helper: save to favorites then navigate. Works even if not logged in (silently continues)
  async function saveFavThenGo(payload, btn){
    try{
      const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
      const res = await fetch('/favorites', {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json', 'Content-Type':'application/json' },
        body: JSON.stringify(payload)
      });
      // success if 200/201 or 409 (already favorited)
      if (res && (res.status===200 || res.status===201 || res.status===409)){
        if (btn){
          try{
            btn.disabled = true;
            btn.style.background = '#16a34a'; // green
            btn.style.borderColor = '#16a34a';
            btn.style.color = '#fff';
            btn.textContent = 'Tersimpan';
          }catch(e){}
        }
        // brief delay to show visual feedback
        await new Promise(r=>setTimeout(r, 250));
      }
    }catch(e){ /* ignore */ }
    finally{
      if (payload?.article_url) { window.location.href = payload.article_url; }
    }
  }
</script>

{{-- Halaman Topik (hanya untuk kategori default) --}}
@if(!isset($categoryModel))
<div style="margin-top: 50px;">
    @include('artikel.topik')
</div>
@endif

{{-- Halaman Panduan (hanya untuk kategori default) --}}
@if(!isset($categoryModel))
<div style="margin-top: 50px;">
    @include('artikel.panduan')
</div>
@endif