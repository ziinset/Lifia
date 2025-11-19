<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lifia - Hero Home</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Iconify -->
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

  <style>
    .hero-home * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .hero-home {
      font-family: 'Poppins', sans-serif;
      color: #333;
      background: linear-gradient(to top, #A8C373 0%, #8BAC65 50%, #7BA05B 100%);
      overflow: hidden;
      width: 100%;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      position: relative;
    }

    .hero-home .hero-wrapper {
      width: 100%;
      margin: 0 auto;
      padding: 0;
      flex: 1;
      display: flex;
      flex-direction: column;
      position: relative;
      z-index: 1;
    }

    /* Navbar */
    .hero-home .hero-navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 40px 5% 24px;
      max-width: 1400px;
      margin: 0 auto;
      width: 100%;
    }

    .hero-home .hero-logo img {
      height: 35px;
      width: auto;
    }

    .hero-home .hero-nav-links {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .hero-home .hero-nav-links a {
      text-decoration: none;
      padding: 7px 20px;
      height: 35px;
      line-height: 35px;
      border-radius: 30px;
      font-weight: 600;
      font-size: 14px;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      color: #fff;
      background-color: transparent;
      border: 1.4px solid #fff;
    }

    .hero-home .hero-nav-links a::after {
      content: "";
      position: absolute;
      bottom: -8px;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 3px;
      background-color: white;
      border-radius: 2px;
      transition: width 0.3s ease;
    }

    .hero-home .hero-nav-links a:hover::after {
      width: 48px;
    }

    .hero-home .hero-nav-links a.hero-active {
      background: linear-gradient(135deg, #F5F3EF, #EDE7DD, #E6DACB);
      color: #4E342E;
      border: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    }

    .hero-home .hero-nav-links a.hero-fitplan {
      background: linear-gradient(135deg, #F5F3EF, #EDE7DD, #E6DACB);
      color: #4E342E;
      border: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    }

    .hero-home .hero-nav-links a:not(.hero-active):hover {
      background-color: rgba(255,255,255,0.18);
      transform: translateY(-1px);
    }

    /* Content */
    .hero-home .hero-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 5%;
      gap: 60px;
      flex: 1;
      margin: auto 0;
      max-width: 1400px;
      width: 100%;
      margin: 0 auto;
    }

    .hero-home .hero-text {
      flex: 1;
      max-width: 560px;
      padding: 40px 0;
    }

    .hero-home .hero-text h1 {
      font-size: 42px;
      font-weight: 800;
      color: #fff;
      line-height: 1.2;
      margin-bottom: 24px;
      text-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }

    .hero-home .hero-text h1 span {
      color: #FFE066;
      text-shadow: 0 2px 8px rgba(255,224,102,0.35);
    }

    .hero-home .hero-text p {
      font-family: 'Montserrat', sans-serif;
      font-size: 16px;
      line-height: 1.7;
      color: rgba(255,255,255,0.95);
      margin-bottom: 32px;
      max-width: 480px;
    }

    .hero-home .hero-search-container {
      position: relative;
      max-width: 500px;
      width: 100%;
    }

    .hero-home .hero-search-box {
      display: flex;
      align-items: center;
      background: linear-gradient(to right, #FFFFFF, #F9F9F9, #E3E3E3);
      border-radius: 40px;
      padding: 14px 20px;
      box-shadow: 0 6px 24px rgba(0,0,0,0.18);
      transition: all 0.3s ease;
    }

    .hero-home .hero-search-box:focus-within {
      transform: translateY(-2px);
      box-shadow: 0 10px 32px rgba(0,0,0,0.25);
    }

    .hero-home .hero-search-icon {
      margin-right: 12px;
      color: #4E342E;
      font-size: 22px;
    }

    .hero-home .hero-search-box input {
      border: none;
      outline: none;
      flex: 1;
      font-size: 15px;
      font-family: 'Poppins', sans-serif;
      color: #333;
      background: transparent;
    }

    .hero-home .hero-search-box input::placeholder {
      color: #999;
      font-weight: 400;
    }

    /* Right visual */
    .hero-home .hero-visual {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: flex-end;
      position: relative;
      padding-bottom: 40px;
    }

    .hero-home .hero-model-wrapper {
      position: relative;
      z-index: 2;
    }

    .hero-home .hero-model-wrapper img {
      width: 100%;
      max-width: 600px;
      height: auto;
      object-fit: contain;
      display: block;
      transform: translateY(60px);
    }

    /* Mobile menu (optional basic) */
    .hero-home .hero-menu-toggle {
      display: none;
      flex-direction: column;
      justify-content: space-between;
      width: 30px;
      height: 21px;
      cursor: pointer;
      background: transparent;
      border: none;
    }

    .hero-home .hero-menu-toggle span {
      display: block;
      height: 3px;
      width: 100%;
      background-color: #fff;
      border-radius: 3px;
      transition: all 0.3s ease;
    }


    @media (max-width: 1024px) {
      .hero-home .hero-navbar {
        padding: 20px 32px;
      }
      
      .hero-home .hero-text h1 {
        font-size: 32px;
      }
      
      .hero-home .hero-model-wrapper img {
        max-width: 500px;
        transform: translateY(40px);
      }

      .hero-home .hero-content {
        padding: 32px 32px 0;
        gap: 48px;
      }

      .hero-home .hero-text h1 {
        font-size: 36px;
      }
    }

    @media (max-width: 768px) {
      .hero-home .hero-wrapper {
        padding-bottom: 32px;
      }

      .hero-home .hero-navbar {
        padding: 16px 20px;
      }

      .hero-home .hero-menu-toggle {
        display: flex;
      }

      .hero-home .hero-nav-links {
        position: fixed;
        top: 0;
        right: -100%;
        width: 80%;
        max-width: 280px;
        height: 100vh;
        background: linear-gradient(to bottom, #7BA05B, #8BAC65);
        flex-direction: column;
        padding-top: 80px;
        gap: 16px;
        transition: right 0.3s ease;
        z-index: 50;
      }

      .hero-home .hero-nav-links.hero-active {
        right: 0;
      }

      .hero-home .hero-nav-links a {
        width: 80%;
        margin: 0 auto;
      }

      .hero-home .hero-content {
        flex-direction: column;
        text-align: center;
        padding: 32px 20px 0;
      }

      .hero-home .hero-text {
        padding-bottom: 16px;
      }

      .hero-home .hero-text p {
        margin-left: auto;
        margin-right: auto;
      }

      .hero-home .hero-visual {
        margin-top: 8px;
      }
    }

    @media (max-width: 480px) {
      .hero-home .hero-text h1 {
        font-size: 28px;
      }

      .hero-home .hero-text p {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <div class="hero-home">
    <div class="hero-wrapper">
      @include('components.navbar')
      <!-- Navbar -->
      <!-- <nav class="hero-navbar">
        <div class="hero-logo">
          <img src="{{asset('images/logo-lifia.svg')}}" alt="Lifia Logo">
        </div>

        <button class="hero-menu-toggle" id="heroHomeMenuToggle">
          <span></span>
          <span></span>
          <span></span>
        </button>

        <div class="hero-nav-links" id="heroHomeNavLinks">
          <a href="{{ route('home') }}" class="hero-active">Beranda</a>
          <a href="{{ route('artikel') }}">Artikel</a>
          <a href="{{ route('cek-bmi') }}">Cek Sehat</a>
          <a href="{{ route('tentang-kami') }}">Tentang Kami</a>
          <a href="{{ route('fitplan') }}" class="hero-fitplan">FitPlan</a>
          <a href="{{ route('login') }}">Login</a>
        </div>
      </nav> -->

      <!-- Hero Content -->
      <section class="hero-content">
        <div class="hero-text">
          <h1>Tips & Trik <span>Gaya Hidup</span><br>Terbaik untuk Kamu</h1>
          <p>
            Temukan berbagai inspirasi, panduan, dan solusi sederhana
            untuk menjalani hidup yang lebih sehat mulai dari pola makan,
            olahraga, skincare, hingga kesehatan mental.
          </p>
          <div class="hero-search-container">
            <div class="hero-search-box">
              <iconify-icon icon="iconamoon:search" class="hero-search-icon"></iconify-icon>
              <input type="text" placeholder="Telusuri...">
            </div>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-model-wrapper">
            <img src="{{asset('images/model.png')}}" alt="Model Healthy Lifestyle">
          </div>
        </div>
      </section>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const menuToggle = document.getElementById('heroHomeMenuToggle');
      const navLinks = document.getElementById('heroHomeNavLinks');

      if (menuToggle && navLinks) {
        menuToggle.addEventListener('click', function () {
          navLinks.classList.toggle('hero-active');
        });
      }
    });
  </script>
</body>
</html>
