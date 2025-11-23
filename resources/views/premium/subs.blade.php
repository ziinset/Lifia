<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Langganan FitPlan - Lifia</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    :root { --brown:#4E342E; --green:#5D7538; --accent:#B4D678; }
    body { font-family: 'Inter',sans-serif; background: #F7F6F3; }
    .hero-bg {
      background-image: url("{{ asset('img/subs-bg.svg') }}");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center top;
    }
    .toggle-pill { box-shadow: 0 6px 18px rgba(0,0,0,0.08); }
    .card { box-shadow: 0 10px 30px rgba(0,0,0,0.12); }
    .card:hover { transform: translateY(-4px); box-shadow: 0 16px 36px rgba(0,0,0,0.16); }
    .btn-primary { background: linear-gradient(135deg,#8BAC65,#6D8A49); }
    .btn-primary:hover { filter: brightness(1.05); }
    .btn-brown { background: #4E342E; }
    .btn-brown:hover{ filter: brightness(1.05); }
  </style>
</head>
<body class="min-h-screen hero-bg">
  @include('components.navbar2')

  <main class="max-w-7xl mx-auto px-6 lg:px-10 pt-36 pb-20">
    <section class="text-center max-w-3xl mx-auto">
      <h1 class="font-['Poppins'] text-3xl md:text-5xl font-extrabold text-[var(--brown)]">Paket Latihan yang Fleksibel</h1>
      <p class="mt-3 text-gray-700">Pilih paket latihan yang sesuai dengan tujuanmu. Dapatkan panduan, latihan, dan dukungan sesuai kebutuhanmu.</p>

      <div class="mt-6 inline-flex items-center bg-white/80 rounded-full p-1 toggle-pill border border-gray-200">
        <button id="btnWeekly" class="px-5 py-2 rounded-full text-sm font-semibold text-white bg-gradient-to-r from-[#70A05A] to-[#6D8A49]">Mingguan</button>
        <button id="btnMonthly" class="px-5 py-2 rounded-full text-sm font-semibold text-gray-700">Bulanan</button>
      </div>
    </section>

    <section class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
      <!-- Gratis -->
      <article class="card bg-white rounded-2xl p-6 md:p-7 border border-gray-200 transition">
        <h3 class="font-['Poppins'] text-2xl font-bold text-[var(--brown)]">Gratis</h3>
        <p id="priceFree" class="text-gray-600 mt-1">Rp 0 / minggu</p>
        <ul class="mt-6 space-y-3 text-[15px] text-[var(--brown)]">
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> 2 rencana latihan mingguan</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Video tutorial dasar</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Pelacakan progres sederhana</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Dukungan via email</li>
        </ul>
        <button disabled class="mt-6 w-full rounded-full py-3 bg-gray-100 text-gray-500 font-semibold cursor-not-allowed">Mulai Gratis</button>
      </article>

      <!-- Standar -->
      <article class="card bg-white rounded-2xl p-6 md:p-7 border-2 border-[#8BAC65] transition">
        <h3 class="font-['Poppins'] text-2xl font-bold text-[#5E7A3E]">Standar</h3>
        <p id="priceStd" class="text-gray-700 mt-1">Rp 20.000 / minggu</p>
        <ul class="mt-6 space-y-3 text-[15px] text-[var(--brown)]">
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Semua rencana latihan</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Video tutorial premium</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Pelacakan progres + nutrisi</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Dukungan via chat</li>
        </ul>
        <a href="{{ route('register') }}" class="mt-6 w-full inline-flex items-center justify-center rounded-full py-3 text-white font-semibold btn-primary">Mulai Standar</a>
      </article>

      <!-- Pelajar -->
      <article class="card bg-white rounded-2xl p-6 md:p-7 border border-gray-200 transition">
        <h3 class="font-['Poppins'] text-2xl font-bold text-[var(--brown)]">Pelajar</h3>
        <p id="priceStu" class="text-gray-700 mt-1">Rp 15.000 / minggu</p>
        <ul class="mt-6 space-y-3 text-[15px] text-[var(--brown)]">
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[var(--brown)] mt-1"></i> Semua fitur Standar</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[var(--brown)] mt-1"></i> Diskon khusus pelajar</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[var(--brown)] mt-1"></i> Grup komunitas pelajar</li>
        </ul>
        <a href="{{ route('register') }}" class="mt-6 w-full inline-flex items-center justify-center rounded-full py-3 text-white font-semibold btn-brown">Mulai Pelajar</a>
      </article>
    </section>
  </main>

  @include('components.footer')

  <script>
    const free = document.getElementById('priceFree');
    const std = document.getElementById('priceStd');
    const stu = document.getElementById('priceStu');
    const btnW = document.getElementById('btnWeekly');
    const btnM = document.getElementById('btnMonthly');

    function setWeekly(){
      btnW.className = 'px-5 py-2 rounded-full text-sm font-semibold text-white bg-gradient-to-r from-[#70A05A] to-[#6D8A49]';
      btnM.className = 'px-5 py-2 rounded-full text-sm font-semibold text-gray-700';
      free.textContent = 'Rp 0 / minggu';
      std.textContent = 'Rp 20.000 / minggu';
      stu.textContent = 'Rp 15.000 / minggu';
    }
    function setMonthly(){
      btnM.className = 'px-5 py-2 rounded-full text-sm font-semibold text-white bg-gradient-to-r from-[#70A05A] to-[#6D8A49]';
      btnW.className = 'px-5 py-2 rounded-full text-sm font-semibold text-gray-700';
      free.textContent = 'Rp 0 / bulan';
      std.textContent = 'Rp 75.000 / bulan';
      stu.textContent = 'Rp 50.000 / bulan';
    }
    btnW.addEventListener('click', setWeekly);
    btnM.addEventListener('click', setMonthly);
  </script>
</body>
</html>
