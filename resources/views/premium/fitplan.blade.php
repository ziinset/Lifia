<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitPlan - LIFIA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 font-inter">
    @include('components.navbar2')
    @include('components.fitplan-header')

    <main class="max-w-5xl mx-auto px-4 py-10">
        <!-- Pilih Tujuan -->
        <section class="text-center mb-12">
            <h2 class="text-2xl font-bold text-gray-800">Pilih Tujuan Olahraga</h2>
            <p class="text-gray-500 mt-1">Sesuaikan latihanmu dengan tujuan utama.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mt-10">

                <!-- Turun Berat Badan -->
                <div class="rounded-2xl p-8 flex flex-col items-center shadow-lg hover:shadow-xl transition"
                    style="background:linear-gradient(180deg,#8BAC65 0%,#728B56 100%);">
                    <span class="iconify text-5xl text-white mb-5" data-icon="mdi:scale-bathroom"></span>
                    <h3 class="text-white font-semibold text-lg mb-4 leading-tight text-center">
                        Turun<br>Berat Badan
                    </h3>
                    <button onclick="window.location.href='{{ route('program-turun-berat-badan') }}'"
                        class="bg-white text-[#728B56] font-semibold px-6 py-2 rounded-full hover:opacity-90">
                        Mulai
                    </button>

                </div>

                <!-- Bentuk Otot -->
                <div class="rounded-2xl p-8 flex flex-col items-center shadow-lg hover:shadow-xl transition"
                    style="background:linear-gradient(180deg,#FF9800 0%,#B2751C 100%);">
                    <span class="iconify text-5xl text-white mb-5" data-icon="mdi:dumbbell"></span>
                    <h3 class="text-white font-semibold text-lg mb-4 leading-tight text-center">
                        Bentuk Otot<br><br>
                    </h3>
                    <button class="bg-white text-[#B2751C] font-semibold px-6 py-2 rounded-full hover:opacity-90">
                        Mulai
                    </button>
                </div>

                <!-- Stamina & Energi -->
                <div class="rounded-2xl p-8 flex flex-col items-center shadow-lg hover:shadow-xl transition"
                    style="background:linear-gradient(180deg,#8D5D51 0%,#4E342E 100%);">
                    <span class="iconify text-5xl text-white mb-5" data-icon="mdi:flash"></span>
                    <h3 class="text-white font-semibold text-lg mb-4 leading-tight text-center">
                        Stamina &amp;<br>Energi
                    </h3>
                    <button class="bg-white text-[#4E342E] font-semibold px-6 py-2 rounded-full hover:opacity-90">
                        Mulai
                    </button>
                </div>

                <!-- Tubuh Lebih Lentur -->
                <div class="rounded-2xl p-8 flex flex-col items-center shadow-lg hover:shadow-xl transition"
                    style="background:linear-gradient(180deg,#B4D678 0%,#5E703F 100%);">
                    <span class="iconify text-5xl text-white mb-5" data-icon="mdi:yoga"></span>
                    <h3 class="text-white font-semibold text-lg mb-4 leading-tight text-center">
                        Tubuh Lebih<br>Lentur
                    </h3>
                    <button class="bg-white text-[#5E703F] font-semibold px-6 py-2 rounded-full hover:opacity-90">
                        Mulai
                    </button>
                </div>

            </div>
        </section>


        <!-- Statistik Laporan -->
        <section class="mb-12">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800">Statistik Laporan Minggu Ini</h2>
            <p class="text-gray-500 mt-1">Pantau perkembangan olahragamu dari jumlah hari, kalori terbakar, hingga total
                menit latihan.</p>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-6">
                <div class="bg-white rounded-xl p-6 shadow flex flex-col items-center">
                    <h3 class="text-4xl font-bold text-gray-800">5</h3>
                    <p class="text-gray-500 mt-1">Hari Olahraga</p>
                    <span class="iconify text-green-500 text-3xl mt-2" data-icon="mdi:check-circle"></span>
                </div>
                <div class="bg-white rounded-xl p-6 shadow flex flex-col items-center">
                    <h3 class="text-4xl font-bold text-gray-800">1.250</h3>
                    <p class="text-gray-500 mt-1">Kalori Terbakar (kcal)</p>
                    <span class="iconify text-green-600 text-3xl mt-2" data-icon="mdi:fire"></span>
                </div>
                <div class="bg-white rounded-xl p-6 shadow flex flex-col items-center">
                    <h3 class="text-4xl font-bold text-gray-800">320</h3>
                    <p class="text-gray-500 mt-1">Total Menit</p>
                    <span class="iconify text-green-600 text-3xl mt-2" data-icon="mdi:clock-outline"></span>
                </div>
            </div>
        </section>

        <!-- Progress Chart -->
        <section>
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Progres Chart</h2>
            <div class="flex flex-col md:flex-row items-center gap-8">
                <!-- Donut Chart -->
                <div class="relative w-48 h-48">
                    <svg viewBox="0 0 36 36" class="w-full h-full">
                        <circle class="text-gray-200" stroke-width="3.5" fill="none" cx="18" cy="18"
                            r="15.915"></circle>
                        <circle class="text-yellow-400" stroke-width="3.5" stroke-dasharray="55, 100"
                            stroke-linecap="round" fill="none" cx="18" cy="18" r="15.915"></circle>
                        <circle class="text-green-400" stroke-width="3.5" stroke-dasharray="40, 100"
                            stroke-dashoffset="-55" stroke-linecap="round" fill="none" cx="18" cy="18"
                            r="15.915"></circle>
                        <circle class="text-green-700" stroke-width="3.5" stroke-dasharray="5, 100"
                            stroke-dashoffset="-95" stroke-linecap="round" fill="none" cx="18" cy="18"
                            r="15.915"></circle>
                    </svg>
                </div>
                <!-- Legend -->
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <span class="w-4 h-4 rounded-full bg-yellow-400"></span>
                        <p class="text-gray-700">Bentuk Otot <span class="font-semibold">55%</span></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-4 h-4 rounded-full bg-green-400"></span>
                        <p class="text-gray-700">Turun Berat Badan <span class="font-semibold">40%</span></p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-4 h-4 rounded-full bg-green-700"></span>
                        <p class="text-gray-700">Tubuh Lentur <span class="font-semibold">5%</span></p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('components.footer')
</body>

</html>
