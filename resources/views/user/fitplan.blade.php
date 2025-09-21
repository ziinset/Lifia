<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitPlan - LIFIA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;600;700;800&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50">
    @include('components.navbar')

    @include('components.fitplan-header')

    <!-- Content Section -->
<!-- Content Section -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-6 space-y-16">

        <!-- Pilih Tujuan Olahraga -->
<!-- Pilih Tujuan Olahraga -->
<div>
    <div class="text-center mb-10">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">
            Pilih Tujuan Olahraga
        </h2>
        <p class="text-gray-600">
            Sesuaikan latihannya dengan tujuan utama.
        </p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <!-- Turun Berat Badan -->
        <div class="bg-gradient-to-b from-green-200 to-green-300 rounded-2xl shadow-lg p-6 text-center hover:scale-105 transition">
            <iconify-icon icon="mdi:scale-bathroom" class="text-5xl text-green-800 mx-auto mb-4"></iconify-icon>
            <h3 class="font-semibold text-gray-800 mb-3">Turun <br> Berat Badan</h3>
            <button class="bg-white text-green-800 font-medium px-5 py-1.5 rounded-full shadow hover:bg-green-50">
                Mulai
            </button>
        </div>

        <!-- Bentuk Otot -->
        <div class="bg-gradient-to-b from-yellow-200 to-yellow-300 rounded-2xl shadow-lg p-6 text-center hover:scale-105 transition">
            <iconify-icon icon="mdi:weight-lifter" class="text-5xl text-yellow-700 mx-auto mb-4"></iconify-icon>
            <h3 class="font-semibold text-gray-800 mb-3">Bentuk Otot</h3>
            <button class="bg-white text-yellow-700 font-medium px-5 py-1.5 rounded-full shadow hover:bg-yellow-50">
                Mulai
            </button>
        </div>

        <!-- Stamina & Energi -->
        <div class="bg-gradient-to-b from-red-200 to-red-300 rounded-2xl shadow-lg p-6 text-center hover:scale-105 transition">
            <iconify-icon icon="mdi:flash" class="text-5xl text-red-700 mx-auto mb-4"></iconify-icon>
            <h3 class="font-semibold text-gray-800 mb-3">Stamina & <br> Energi</h3>
            <button class="bg-white text-red-700 font-medium px-5 py-1.5 rounded-full shadow hover:bg-red-50">
                Mulai
            </button>
        </div>

        <!-- Tubuh Lebih Lentur -->
        <div class="bg-gradient-to-b from-green-300 to-green-400 rounded-2xl shadow-lg p-6 text-center hover:scale-105 transition">
            <iconify-icon icon="mdi:yoga" class="text-5xl text-green-900 mx-auto mb-4"></iconify-icon>
            <h3 class="font-semibold text-gray-800 mb-3">Tubuh Lebih <br> Lentur</h3>
            <button class="bg-white text-green-900 font-medium px-5 py-1.5 rounded-full shadow hover:bg-green-50">
                Mulai
            </button>
        </div>
    </div>
</div>


        <!-- Statistik Mingguan -->
        <div>
            <h3 class="text-xl font-bold text-gray-800 mb-4">Statistik Laporan Minggu Ini</h3>
            <p class="text-gray-600 mb-6">
                Pantau perkembangan olahraga mingguanmu dari jumlah hari, kalori terbakar, hingga total menit latihan.
            </p>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-gray-50 rounded-xl shadow p-6 text-center">
                    <p class="text-2xl font-bold text-gray-800">5</p>
                    <p class="text-gray-600">Hari Olahraga</p>
                    <iconify-icon icon="mdi:check-circle" class="text-green-600 text-2xl mt-2"></iconify-icon>
                </div>

                <div class="bg-gray-50 rounded-xl shadow p-6 text-center">
                    <p class="text-2xl font-bold text-gray-800">1.250</p>
                    <p class="text-gray-600">Kalori Terbakar</p>
                    <iconify-icon icon="mdi:fire" class="text-red-500 text-2xl mt-2"></iconify-icon>
                </div>

                <div class="bg-gray-50 rounded-xl shadow p-6 text-center">
                    <p class="text-2xl font-bold text-gray-800">320</p>
                    <p class="text-gray-600">Total Menit</p>
                    <iconify-icon icon="mdi:clock-outline" class="text-green-700 text-2xl mt-2"></iconify-icon>
                </div>
            </div>
        </div>

        <!-- Progress Chart -->
        <div>
            <h3 class="text-xl font-bold text-gray-800 mb-6">Progres Chart</h3>
            <div class="flex flex-col md:flex-row items-center gap-8">
                <!-- Chart Dummy -->
                <div class="w-48 h-48 rounded-full bg-gray-100 flex items-center justify-center">
                    <span class="text-gray-400 text-sm">[Chart]</span>
                </div>

                <!-- Legend -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <span class="w-4 h-4 rounded-full bg-yellow-400"></span>
                        <p class="text-gray-700">Bentuk Otot - <span class="font-medium">55%</span></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-4 h-4 rounded-full bg-green-400"></span>
                        <p class="text-gray-700">Turun Berat Badan - <span class="font-medium">40%</span></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-4 h-4 rounded-full bg-green-300"></span>
                        <p class="text-gray-700">Tubuh Lentur - <span class="font-medium">5%</span></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

    @include('components.footer')
</body>
</html>


