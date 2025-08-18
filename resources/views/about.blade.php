<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaya Hidup Sehat & Seimbang - LIFIA</title>
    <link rel="stylesheet" href="{{ asset('css/articlemakansehat.css') }}">
</head>
<body>
    {{-- Header --}}
    <header class="header">
        <div class="container">
            <div class="nav-wrapper">
                <div class="logo">
                    <div class="logo-icon"></div>
                    <span class="logo-text">LIFIA</span>
                </div>
                <nav class="nav-menu">
                    <a href="#" class="nav-link">Beranda</a>
                    <a href="#" class="nav-link dropdown">
                        Artikel
                        <span class="dropdown-arrow">▼</span>
                    </a>
                    <a href="#" class="nav-link">Cek Sehat</a>
                    <a href="#" class="nav-link active">Tentang Kami</a>
                    <a href="#" class="nav-link login">Login</a>
                </nav>
            </div>
        </div>
    </header>

    {{-- Hero Section --}}
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Gaya Hidup <span class="highlight">Sehat & Seimbang</span><br>untuk Masa Depan Lebih Baik</h1>
                    <p>Kami berkomitmen untuk membantu memandumu menjalani hidup yang lebih sehat secara fisik, mental, dan emosional demi masa depan yang lebih berkualitas.</p>

                    <div class="hero-tags">
                        <span class="tag">Pola Makan Sehat</span>
                        <span class="tag">Olahraga & Aktivitas Fisik</span>
                        <span class="tag">Kesehatan Mental</span>
                        <span class="tag">Pemeriksaan dan...</span>
                    </div>
                </div>

                <div class="hero-image">
                    <img src="/images/hero-family.jpg" alt="Keluarga sehat">
                </div>
            </div>

            {{-- Stats Cards --}}
            <div class="stats-grid">
                <div class="stat-card green">
                    <div class="stat-icon">📋</div>
                    <div class="stat-number">2.500+</div>
                    <div class="stat-label">Konten<br>Online Bukan</div>
                </div>

                <div class="stat-card green">
                    <div class="stat-icon">👥</div>
                    <div class="stat-number">1.800+</div>
                    <div class="stat-label">Komunitas<br>Mengikuti Kelas Kita</div>
                </div>

                <div class="stat-card green">
                    <div class="stat-icon">☀️</div>
                    <div class="stat-number">100+</div>
                    <div class="stat-label">Tips Hidup<br>Sehat Harian</div>
                </div>

                <div class="stat-card green">
                    <div class="stat-icon">⚡</div>
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Artikel Self<br>Care</div>
                </div>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section class="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h3 class="section-subtitle">TENTANG KAMI</h3>
                    <h2>Mengapa Kami Ada?</h2>
                    <p>Website Gaya Hidup Sehat ini hadir untuk menemani kamu menjalani hidup yang lebih seimbang, bahagia, dan sehat secara fisik, mental, dan emosional.</p>
                    <p>Di tengah kesibukan dan banjir informasi, kami ingin menghadirkan konten ringkas, mudah dipahami, dan relevan.</p>
                    <p>Karena kami percaya orang berhak mendapatkan informasi kesehatan yang positif, akurat, dan membangun tanpa ribet.</p>

                    <div class="features-grid">
                        <div class="feature-item">
                            <div class="feature-icon green-check">✓</div>
                            <span>Ringkas & Relevan</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon green-check">✓</div>
                            <span>Akses Tanpa Ribet</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon green-check">✓</div>
                            <span>Pendekatan Holistik</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon green-check">✓</div>
                            <span>Akurat & Positif</span>
                        </div>
                    </div>
                </div>

                <div class="about-image">
                    <img src="{{ asset('img/temansehat.svg') }}" alt="Tentang kami">
                </div>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="services">
        <div class="container">
            <h2 class="services-title">Layanan yang Kami Sediakan</h2>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">📖</div>
                    <h3>Informasi Gaya Hidup Sehat</h3>
                    <p>Artikel yang memberikan berbagai informasi seputar kesehatan, olahraga, perbahai, dan kebijakan sehat lainnya.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">💬</div>
                    <h3>Fitur Cek BMI</h3>
                    <p>Alat praktis untuk membantu Anda mengetahui status Berat Badan dan Massa Tubuh (BMI) dan memperbaiki sistem gaya hidup berkelanjutan healthya.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">💪</div>
                    <h3>Fitur FitPlan</h3>
                    <p>Panduan olahraga harian untuk membantu Anda mencapai target kebugaran dengan aspek workout, tubuh ideal, atau pungguna kuat, semuanya disesuaikan dengan kebutuhan.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="team">
        <div class="container">
            <h2 class="team-title">Tim <span class="highlight">Kami</span></h2>
            <p class="team-subtitle">Kami adalah tim pelajar kreatif dengan peran berbeda, namun satu tujuan: menghadirkan platform yang mendukung gaya hidup sehat.</p>

            <div class="team-grid">
                <div class="team-member">
                    <div class="member-image">
                        <img src="/images/team1.jpg" alt="Graciella Veriza.N">
                    </div>
                    <div class="member-info">
                        <h4>Graciella Veriza.N</h4>
                        <p>Frontend Developer</p>
                        <div class="social-links">
                            <a href="#" class="social-link">📧</a>
                            <a href="#" class="social-link">👤</a>
                            <a href="#" class="social-link">❌</a>
                        </div>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-image">
                        <img src="/images/team2.jpg" alt="Goldi Banguin.A">
                    </div>
                    <div class="member-info">
                        <h4>Goldi Banguin.A</h4>
                        <p>Backend Developer</p>
                        <div class="social-links">
                            <a href="#" class="social-link">📧</a>
                            <a href="#" class="social-link">👤</a>
                            <a href="#" class="social-link">❌</a>
                        </div>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-image">
                        <img src="/images/team3.jpg" alt="Jonathan Arya.P">
                    </div>
                    <div class="member-info">
                        <h4>Jonathan Arya.P</h4>
                        <p>Backend Developer</p>
                        <div class="social-links">
                            <a href="#" class="social-link">📧</a>
                            <a href="#" class="social-link">👤</a>
                            <a href="#" class="social-link">❌</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    @include('components.footer')
</body>
</html>