<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lifia</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Iconify -->
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    /* Hover efek untuk input */
    .search-input:hover {
      transform: scale(1.02);
      transition: transform 0.3s ease;
    }
    .search-input:focus {
      transform: scale(1.02);
    }
  </style>
</head>
<body class="bg-[#F8F6F2]">
  @include('components.navbar2')

  <!-- Hero Section -->
  <section class="flex flex-col lg:flex-row items-center justify-between max-w-6xl mx-auto px-6 lg:px-10 py-14">

    <!-- Left Content -->
    <div class="lg:w-1/2 text-left mb-10 lg:mb-0">
      <h1 class="text-3xl lg:text-4xl font-extrabold text-[#3A2C29] leading-snug mb-5">
        Bergerak Lebih Banyak,<br> Hidup Lebih Kuat.
      </h1>
      <p class="text-[#5C4A3A] text-base leading-relaxed mb-8 max-w-md">
        Olahraga bukan soal membentuk tubuh semata, tapi tentang meningkatkan kualitas hidup.
        Mulailah dari aktivitas kecil yang konsisten, dan rasakan perubahan besar pada kesehatan fisik dan mentalmu.
      </p>

      <!-- Search -->
      <form action="{{ route('kategori.aktivitas-fisik') }}" method="GET" class="w-full max-w-md">
        <div class="relative">
          <iconify-icon icon="iconamoon:search"
            class="absolute left-3.5 top-1/2 -translate-y-1/2"
            style="color:#4E342E; font-size:20px;">
          </iconify-icon>
          <input type="text" name="search" placeholder="Telusuri..."
            class="search-input w-full pl-11 pr-4 py-3 rounded-lg shadow-md border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#6BA84F] text-base">
        </div>
      </form>
    </div>

    <!-- Right Image -->
    <div class="lg:w-1/2 flex justify-center -mt-6 lg:-mt-8">
      <img src="{{asset('images/fitnes.svg')}}" alt="Fitness" class="w-[340px] lg:w-[420px] object-contain">
    </div>
  </section>

</body>
</html>
