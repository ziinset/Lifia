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
    @include('components.navbar2')

    <!-- Hero Section -->
    <section class="pt-24 pb-16 bg-gradient-to-br from-green-600 to-green-800">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    FitPlan
                </h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    Rencana latihan personal yang disesuaikan dengan kebutuhan dan tujuan kesehatan Anda
                </p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-6">
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">
                        Coming Soon
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        FitPlan akan segera hadir dengan fitur-fitur canggih untuk membantu Anda mencapai tujuan kesehatan dan kebugaran.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center p-6 bg-gray-50 rounded-xl">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Rencana Personal</h3>
                        <p class="text-gray-600">Program latihan yang disesuaikan dengan kondisi fisik dan tujuan Anda</p>
                    </div>

                    <div class="text-center p-6 bg-gray-50 rounded-xl">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Progress Tracking</h3>
                        <p class="text-gray-600">Pantau kemajuan latihan dan pencapaian target kesehatan Anda</p>
                    </div>

                    <div class="text-center p-6 bg-gray-50 rounded-xl">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Jadwal Fleksibel</h3>
                        <p class="text-gray-600">Atur jadwal latihan sesuai dengan waktu luang dan rutinitas harian</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
</body>
</html>


