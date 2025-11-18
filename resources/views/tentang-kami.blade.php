<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Kami - Lifia</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Iconify -->
  <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .hero-subtitle {
      color: #6BA84F;
    }
    .tag-button {
      background: white;
      border: 1px solid #ccc;
      padding: 6px 16px;
      border-radius: 25px;
      font-size: 14px;
      color: #4B3F2A;
      font-weight: 500;
      transition: all 0.3s ease;
      display: inline-block;
      white-space: nowrap;
      opacity: 0;
      transform: translateY(20px);
      animation: slideInUp 0.6s ease forwards;
    }
    .tag-button:hover {
      background: #f9f9f9;
      transform: translateY(-2px) scale(1.05);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border-color: #6BA84F;
    }
    .stats-card {
      background: #8BAC65;
      border-radius: 12px;
      padding: 20px;
      color: white;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      opacity: 0;
      transform: translateY(30px) scale(0.95);
      transition: all 0.4s ease;
      animation: fadeInScale 0.8s ease forwards;
    }
    .stats-card:hover {
      transform: translateY(-5px) scale(1.02);
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      background: #9CB970;
    }
    .stats-number {
      font-size: 22px;
      font-weight: 800;
      display: flex;
      align-items: baseline;
      gap: 2px;
    }
    .stats-label {
      font-size: 14px;
      line-height: 1.4;
      margin-top: 2px;
    }
    .hero-title {
      opacity: 0;
      transform: translateY(-30px);
      animation: slideInDown 1s ease forwards;
    }
    .hero-description {
      opacity: 0;
      transform: translateX(-30px);
      animation: slideInLeft 0.8s ease forwards 0.3s;
    }
    .green-line {
      opacity: 0;
      transform: scaleY(0);
      animation: growHeight 0.8s ease forwards 0.6s;
    }
    .hero-image {
      opacity: 0;
      transform: scale(0.9) rotateY(-10deg);
      animation: zoomInRotate 1s ease forwards 0.5s;
    }
    .hero-image:hover {
      transform: scale(1.02) rotateY(0deg);
      transition: all 0.4s ease;
    }
    .decorative-element {
      opacity: 0.7;
    }
    .stats-icon {
      animation: pulse 2s infinite;
    }
    .stats-card:hover .stats-icon {
      animation: bounce 0.6s ease;
    }
    .counter {
      transition: all 0.3s ease;
    }
    @keyframes slideInDown {
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideInLeft {
      to { opacity: 1; transform: translateX(0); }
    }
    @keyframes slideInUp {
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInScale {
      to { opacity: 1; transform: translateY(0) scale(1); }
    }
    @keyframes growHeight {
      to { opacity: 1; transform: scaleY(1); }
    }
    @keyframes zoomInRotate {
      to { opacity: 1; transform: scale(1) rotateY(0deg); }
    }
    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }
    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% { transform: translateY(0) scale(1); }
      40% { transform: translateY(-10px) scale(1.1); }
      60% { transform: translateY(-5px) scale(1.05); }
    }
    .tag-button:nth-child(1) { animation-delay: 0.8s; }
    .tag-button:nth-child(2) { animation-delay: 0.9s; }
    .tag-button:nth-child(3) { animation-delay: 1.0s; }
    .tag-button:nth-child(4) { animation-delay: 1.1s; }
    .tag-button:nth-child(5) { animation-delay: 1.2s; }
    .stats-card:nth-child(1) { animation-delay: 0.7s; }
    .stats-card:nth-child(2) { animation-delay: 0.8s; }
    .stats-card:nth-child(3) { animation-delay: 0.9s; }
    .stats-card:nth-child(4) { animation-delay: 1.0s; }
    .hero-subtitle {
      transition: all 0.3s ease;
      display: inline-block;
    }
    .hero-subtitle:hover {
      transform: scale(1.05);
      text-shadow: 0 2px 8px rgba(107, 168, 79, 0.3);
    }
    .page-container {
      opacity: 0;
      animation: pageLoad 0.5s ease forwards;
    }
    @keyframes pageLoad {
      to { opacity: 1; }
    }
  </style>
</head>
<body class="bg-[#F9F9F7] page-container">
  @include('components.navbar2')

<!-- Hero Section -->
<section class="relative max-w-7xl mx-auto px-6 lg:px-12 pt-28 pb-20 rounded-2xl space-y-6 overflow-hidden bg-[#F8F6F2]">
  <div class="relative z-10">
    <h1 class="hero-title text-3xl lg:text-4xl font-extrabold leading-snug text-[#3D2914] text-center lg:text-left">
      Gaya Hidup <span class="hero-subtitle">Sehat & Seimbang</span><br>
      untuk Masa Depan Lebih Baik
    </h1>

    <div class="flex flex-col lg:flex-row gap-8 lg:items-center">
      <div class="flex-1 text-center lg:text-left">
        <p class="hero-description text-[#6B5B47] text-lg max-w-lg mx-auto lg:mx-0">
          Kami hadir untuk menginspirasi dan memandumu menjalani hidup yang lebih sehat secara fisik, mental,
          dan emosional demi masa depan yang lebih berkualitas.
        </p>
      </div>

      <div class="hidden lg:block w-1 h-24 rounded-md green-line" style="background-color: #B4D678;"></div>

      <div class="flex-1 flex flex-col gap-3 items-center lg:items-start">
        <div class="flex flex-wrap justify-center lg:justify-start gap-2">
          <span class="tag-button">Pola Makan Sehat</span>
          <span class="tag-button">Olahraga & Aktivitas Fisik</span>
        </div>
        <div class="flex flex-wrap justify-center lg:justify-start gap-2">
          <span class="tag-button">Kesehatan Mental</span>
          <span class="tag-button">Perawatan Diri</span>
          <span class="tag-button">Cek BMI</span>
        </div>
      </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-8 items-start lg:items-center mt-8">
      <div class="flex-1 w-full">
        <img src="images/happypeople.png"
             alt="Happy people celebrating healthy lifestyle"
             class="hero-image w-full h-[220px] sm:h-[280px] lg:h-[300px] object-cover rounded-2xl shadow-lg">
      </div>

      <div class="flex-1 w-full h-[220px] sm:h-[280px] lg:h-[300px]">
        <div class="grid grid-cols-2 gap-4 h-full">

          <!-- Card 1 -->
          <div class="stats-card flex items-center gap-4 h-full">
            <i class="fas fa-book-open text-3xl stats-icon"></i>
            <div class="text-left">
              <div class="stats-number">
                <span class="counter" data-target="2500">0</span><span>+</span>
              </div>
              <div class="stats-label">Pembaca<br>Setiap Bulan</div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="stats-card flex items-center gap-4 h-full">
            <i class="fas fa-user-friends text-3xl stats-icon"></i>
            <div class="text-left">
              <div class="stats-number">
                <span class="counter" data-target="1800">0</span><span>+</span>
              </div>
              <div class="stats-label">Pengguna<br>Mengakses<br>Kalkulator BMI</div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="stats-card flex items-center gap-4 h-full">
            <i class="fas fa-sun text-3xl stats-icon"></i>
            <div class="text-left">
              <div class="stats-number">
                <span class="counter" data-target="100">0</span><span>+</span>
              </div>
              <div class="stats-label">Tips Hidup<br>Seimbang</div>
            </div>
          </div>

          <!-- Card 4 -->
          <div class="stats-card flex items-center gap-4 h-full">
            <i class="fas fa-heart text-3xl stats-icon"></i>
            <div class="text-left">
              <div class="stats-number">
                <span class="counter" data-target="60">0</span><span>+</span>
              </div>
              <div class="stats-label">Artikel Self<br>Care</div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <img src="images/elemen.svg"
       alt="elemen dekoratif"
       class="decorative-element absolute bottom-0 left-0 w-full h-auto z-0 pointer-events-none select-none">
</section>

<!-- About Us Section -->
<section class="relative max-w-7xl mx-auto px-6 lg:px-12 py-20 flex flex-col lg:flex-row items-center gap-12 bg-[#FFFFFF]">
  <!-- Text Content -->
  <div class="flex-1 space-y-6">
    <p class="text-sm font-semibold tracking-wide text-[#4B5C3B] uppercase">Tentang Kami</p>
    <h2 class="text-3xl lg:text-4xl font-extrabold text-[#4B5C3B]">Mengapa Kami Ada?</h2>
    <p class="text-[#6B5B47] leading-relaxed">
      Website Gaya Hidup Sehat ini hadir untuk menemani kamu menjalani hidup yang lebih seimbang, bahagia,
      dan sehat secara fisik, mental, dan emosional. <br><br>
      Di tengah kesibukan dan banjir informasi, kami ingin menghadirkan konten ringkas, mudah dipahami, dan relevan.
      Karena semua orang berhak mendapatkan informasi kesehatan yang positif, akurat, dan membangun tanpa ribet.
    </p>

    <!-- Checklist -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
      <div class="flex items-center gap-3">
        <i class="fas fa-check-circle text-[#4B5C3B] text-xl"></i>
        <span class="text-[#3D2914] font-medium">Ringkas & Relevan</span>
      </div>
      <div class="flex items-center gap-3">
        <i class="fas fa-check-circle text-[#4B5C3B] text-xl"></i>
        <span class="text-[#3D2914] font-medium">Akses Tanpa Ribet</span>
      </div>
      <div class="flex items-center gap-3">
        <i class="fas fa-check-circle text-[#4B5C3B] text-xl"></i>
        <span class="text-[#3D2914] font-medium">Pendekatan Holistik</span>
      </div>
      <div class="flex items-center gap-3">
        <i class="fas fa-check-circle text-[#4B5C3B] text-xl"></i>
        <span class="text-[#3D2914] font-medium">Akurat & Positif</span>
      </div>
    </div>
  </div>

<!-- Image Content -->
<div class="flex-1 flex justify-center">
  <img src="images/round.svg"
       alt="People sitting together in park"
       class="max-w-sm h-auto">
</div>
</section>

<!-- Services Section -->
<section class="bg-[#F8F6F2] py-20 px-6 lg:px-12">
  <div class="max-w-7xl mx-auto text-center">
    <!-- Title -->
    <h2 class="text-2xl lg:text-3xl font-extrabold text-[#4E342E] mb-12">
      Layanan yang Kami Sediakan
    </h2>

    <!-- Cards Container -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

      <!-- Card 1 -->
      <div class="bg-white rounded-xl shadow-sm p-6 text-left border border-[#E6E3DC] hover:shadow-md transition">
        <div class="text-[#7BA05B] text-3xl mb-4">
          <i class="fas fa-book-open"></i>
        </div>
        <h3 class="text-lg font-bold text-[#3D2914] mb-2">Informasi Gaya Hidup Sehat</h3>
        <p class="text-[#6B5B47] text-sm leading-relaxed">
          Artikel yang membahas berbagai aspek penting seperti nutrisi, olahraga, istirahat, dan kebiasaan sehat lainnya.
        </p>
      </div>

      <!-- Card 2 -->
      <div class="bg-white rounded-xl shadow-sm p-6 text-left border border-[#E6E3DC] hover:shadow-md transition">
        <div class="text-[#7BA05B] text-3xl mb-4">
          <i class="fas fa-comments"></i>
        </div>
        <h3 class="text-lg font-bold text-[#3D2914] mb-2">Fitur Cek BMI</h3>
        <p class="text-[#6B5B47] text-sm leading-relaxed">
          Alat praktis untuk membantu Anda mengetahui Indeks Massa Tubuh (BMI) dan memperoleh saran gaya hidup berdasarkan hasilnya.
        </p>
      </div>

      <!-- Card 3 -->
      <div class="bg-white rounded-xl shadow-sm p-6 text-left border border-[#E6E3DC] hover:shadow-md transition">
        <div class="text-[#7BA05B] text-3xl mb-4">
          <i class="fas fa-dumbbell"></i>
        </div>
        <h3 class="text-lg font-bold text-[#3D2914] mb-2">Fitur FitPlan</h3>
        <p class="text-[#6B5B47] text-sm leading-relaxed">
          Panduan latihan harian untuk membantu Anda mencapai target kebugaran seperti stamina, tubuh ideal, atau penguatan otot, lengkap dengan jadwal latihan bertahap.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- Team Section -->
<section class="bg-[#FFFFFF] py-20 px-4 lg:px-6">
  <div class="max-w-4xl mx-auto text-center">
    <!-- Title -->
    <h2 class="text-2xl lg:text-3xl font-extrabold text-[#4E342E] mb-4">
      <span class="text-[#6BA84F]">Tim</span> Kami
    </h2>
    <p class="text-[#6B5B47] max-w-2xl mx-auto mb-12">
      Kami adalah tim pelajar kreatif dengan peran berbeda, namun satu tujuan: menghadirkan platform yang mendukung gaya hidup sehat.
    </p>

    <!-- Team Members -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <!-- Member 1 -->
      <div class="bg-white rounded-2xl shadow-sm p-6 text-center border border-[#E6E3DC] hover:shadow-md transition">
        <img src="images/grace.svg" alt="Graciella Yeriza.N"
             class="w-32 md:w-40 h-auto object-contain rounded-lg mx-auto mb-4">
        <h3 class="font-bold text-[#4B5C3B]">Graciella Yeriza.N</h3>
        <p class="text-sm text-[#6B5B47] mb-4">Desain & Konten</p>
        <div class="flex justify-center gap-3 text-[#FFFFFF] text-sm">
          <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-[#4A3F35] hover:bg-[#6BA84F] transition">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-[#4A3F35] hover:bg-[#6BA84F] transition">
            <i class="fab fa-github"></i>
          </a>
          <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-[#4A3F35] hover:bg-[#6BA84F] transition">
            <i class="fab fa-x-twitter"></i>
          </a>
        </div>
      </div>

      <!-- Member 2 -->
      <div class="bg-white rounded-2xl shadow-sm p-6 text-center border border-[#E6E3DC] hover:shadow-md transition">
        <img src="images/goldi.svg" alt="Goldi Bangun.A"
             class="w-32 md:w-40 h-auto object-contain rounded-lg mx-auto mb-4">
        <h3 class="font-bold text-[#4B5C3B]">Goldi Bangun.A</h3>
        <p class="text-sm text-[#6B5B47] mb-4">Frontend Developer</p>
        <div class="flex justify-center gap-3 text-[#FFFFFF] text-sm">
          <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-[#4A3F35] hover:bg-[#6BA84F] transition">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-[#4A3F35] hover:bg-[#6BA84F] transition">
            <i class="fab fa-github"></i>
          </a>
          <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-[#4A3F35] hover:bg-[#6BA84F] transition">
            <i class="fab fa-x-twitter"></i>
          </a>
        </div>
      </div>

      <!-- Member 3 -->
      <div class="bg-white rounded-2xl shadow-sm p-6 text-center border border-[#E6E3DC] hover:shadow-md transition">
        <img src="images/jojo.svg" alt="Jonathan Arya.P"
             class="w-32 md:w-40 h-auto object-contain rounded-lg mx-auto mb-4">
        <h3 class="font-bold text-[#4B5C3B]">Jonathan Arya.P</h3>
        <p class="text-sm text-[#6B5B47] mb-4">Backend Developer</p>
        <div class="flex justify-center gap-3 text-[#FFFFFF] text-sm">
          <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-[#4A3F35] hover:bg-[#6BA84F] transition">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-[#4A3F35] hover:bg-[#6BA84F] transition">
            <i class="fab fa-github"></i>
          </a>
          <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-[#4A3F35] hover:bg-[#6BA84F] transition">
            <i class="fab fa-x-twitter"></i>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>


<script>
function animateCounters() {
  const counters = document.querySelectorAll('.counter');
  counters.forEach((counter, index) => {
    const target = parseInt(counter.getAttribute('data-target'));
    const duration = 2000;
    const startDelay = (index * 200) + 1200;
    setTimeout(() => {
      let start = 0;
      const increment = target / (duration / 16);
      const timer = setInterval(() => {
        start += increment;
        if (start >= target) {
          counter.textContent = target.toLocaleString();
          clearInterval(timer);
        } else {
          counter.textContent = Math.floor(start).toLocaleString();
        }
      }, 16);
    }, startDelay);
  });
}
document.addEventListener('DOMContentLoaded', animateCounters);
</script>
</body>
</html>