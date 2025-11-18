<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitPlan - LIFIA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-50 font-inter">
    @include('components.navbar')
    @include('components.fitplan-header')

    <main class="max-w-5xl mx-auto px-4 py-10">
        <!-- Pilih Tujuan -->
        <section class="mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Pilih Tujuan Olahraga</h2>
                <p class="text-gray-500 mt-1">Sesuaikan latihanmu dengan tujuan utama.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

                <!-- Turun Berat Badan -->
                <div class="rounded-2xl p-8 flex flex-col items-center shadow-lg hover:shadow-xl transition min-h-[280px]"
                    style="background:linear-gradient(180deg,#8BAC65 0%,#728B56 100%);">
                    <span class="iconify text-5xl text-white mb-5" data-icon="mdi:scale-bathroom"></span>
                    <h3 class="text-white font-semibold text-lg mb-4 leading-tight text-center flex-grow flex items-center">
                        Turun<br>Berat Badan
                    </h3>
                    <button onclick="window.location.href='{{ route('program-turun-berat-badan') }}'"
                        class="bg-white text-[#728B56] font-semibold px-6 py-2 rounded-full hover:opacity-90">
                        Mulai
                    </button>
                </div>

                <!-- Bentuk Otot -->
                <div class="rounded-2xl p-8 flex flex-col items-center shadow-lg hover:shadow-xl transition min-h-[280px]"
                    style="background:linear-gradient(180deg,#FF9800 0%,#B2751C 100%);">
                    <span class="iconify text-5xl text-white mb-5" data-icon="mdi:dumbbell"></span>
                    <h3 class="text-white font-semibold text-lg mb-4 leading-tight text-center flex-grow flex items-center">
                        Bentuk Otot
                    </h3>
                    <button class="bg-white text-[#B2751C] font-semibold px-6 py-2 rounded-full hover:opacity-90">
                        Mulai
                    </button>
                </div>

                <!-- Stamina & Energi -->
                <div class="rounded-2xl p-8 flex flex-col items-center shadow-lg hover:shadow-xl transition min-h-[280px]"
                    style="background:linear-gradient(180deg,#8D5D51 0%,#4E342E 100%);">
                    <span class="iconify text-5xl text-white mb-5" data-icon="mdi:flash"></span>
                    <h3 class="text-white font-semibold text-lg mb-4 leading-tight text-center flex-grow flex items-center">
                        Stamina &amp;<br>Energi
                    </h3>
                    <button class="bg-white text-[#4E342E] font-semibold px-6 py-2 rounded-full hover:opacity-90">
                        Mulai
                    </button>
                </div>

                <!-- Tubuh Lebih Lentur -->
                <div class="rounded-2xl p-8 flex flex-col items-center shadow-lg hover:shadow-xl transition min-h-[280px]"
                    style="background:linear-gradient(180deg,#B4D678 0%,#5E703F 100%);">
                    <span class="iconify text-5xl text-white mb-5" data-icon="mdi:yoga"></span>
                    <h3 class="text-white font-semibold text-lg mb-4 leading-tight text-center flex-grow flex items-center">
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
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-1">Statistik Laporan Minggu Ini</h2>
            <p class="text-gray-500 mb-6">Pantau perkembangan olahraga mingguanmu dari jumlah hari, kalori terbakar, hingga total menit latihan.</p>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl p-6 shadow flex flex-col items-center">
                    <p class="text-gray-600 text-sm font-medium mb-2">Hari Olahraga</p>
                    <h3 class="text-5xl font-bold text-gray-800 mb-2">5</h3>
                    <span class="iconify text-green-500 text-3xl" data-icon="mdi:check-circle"></span>
                </div>
                <div class="bg-white rounded-xl p-6 shadow flex flex-col items-center">
                    <p class="text-gray-600 text-sm font-medium mb-2">Kalori Terbakar</p>
                    <div class="flex items-baseline justify-center gap-1 mb-2">
                        <h3 class="text-5xl font-bold text-gray-800">1.250</h3>
                        <span class="text-gray-500 text-lg">kcal</span>
                    </div>
                    <span class="iconify text-green-500 text-3xl" data-icon="mdi:fire"></span>
                </div>
                <div class="bg-white rounded-xl p-6 shadow flex flex-col items-center">
                    <p class="text-gray-600 text-sm font-medium mb-2">Total Menit</p>
                    <div class="flex items-baseline justify-center gap-1 mb-2">
                        <h3 class="text-5xl font-bold text-gray-800">320</h3>
                        <span class="text-gray-500 text-lg">menit</span>
                    </div>
                    <span class="iconify text-green-500 text-3xl" data-icon="mdi:clock-outline"></span>
                </div>
            </div>
        </section>

        <!-- Progress Chart -->
        <section>
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Progres Chart</h2>
            <div class="bg-white rounded-xl p-6 shadow">
                <div class="flex flex-col lg:flex-row items-center gap-8">
                    <!-- Donut Chart -->
                    <div class="w-full lg:w-1/2 flex justify-center">
                        <div class="relative" style="width: 300px; height: 300px;">
                            <canvas id="fitnessPieChart" width="300" height="300"></canvas>
                        </div>
                    </div>
                    <!-- Legend -->
                    <div class="w-full lg:w-1/2 space-y-4 flex flex-col justify-center">
                        <div class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#FF9800]"></span>
                            <p class="text-gray-700">Bentuk Otot <span class="font-semibold">55%</span></p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#8BAC65]"></span>
                            <p class="text-gray-700">Turun Berat Badan <span class="font-semibold">40%</span></p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#B4D678]"></span>
                            <p class="text-gray-700">Tubuh Lentur <span class="font-semibold">5%</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('components.footer')

    <script>
        // Initialize Donut Chart
        const ctx = document.getElementById('fitnessPieChart').getContext('2d');
        const fitnessPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Bentuk Otot', 'Turun Berat Badan', 'Tubuh Lentur'],
                datasets: [{
                    data: [55, 40, 5],
                    backgroundColor: [
                        '#FF9800', // Orange for Bentuk Otot
                        '#8BAC65', // Green for Turun Berat Badan
                        '#B4D678'  // Light Green for Tubuh Lentur
                    ],
                    borderColor: '#FFFFFF',
                    borderWidth: 0,
                    hoverOffset: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                cutout: '60%',
                plugins: {
                    legend: {
                        display: false // Disable built-in legend
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed + '%';
                                return label;
                            }
                        }
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });
    </script>
</body>

</html>
