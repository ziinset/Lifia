<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lifia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body class="bg-white">

    {{-- @include('components.navbar') --}}
    @include('components.hero1')

    <!-- Categories Section -->
    <section class="py-20 px-4 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-12">
                <div>
                    <h2 class="category-title">Kategori Unggulan</h2>
                    <p class="category-subtitle max-w-2xl">
                        Topik hidup sehat, mulai dari pola makan hingga kesehatan mental—ringan, relevan, dan mudah dipraktikkan.
                    </p>
                </div>
                <a href="#" class="category-button mt-4 lg:mt-0">
                    Selengkapnya
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Pola Makan Sehat -->
                <div class="category-card">
                    <img src="{{ asset('img/makansehat.png') }}" alt="Pola Makan Sehat" class="w-full">
                    <div class="category-card-content">
                        <h3>Pola Makan Sehat</h3>
                        <p>Resep bergizi & praktis untuk mendukung aktivitas harian yang aktif.</p>
                    </div>
                </div>

                <!-- Olahraga Ringan -->
                <div class="category-card">
                    <img src="{{ asset('img/oringan.png') }}" alt="Olahraga Ringan" class="w-full">
                    <div class="category-card-content">
                        <h3>Olahraga Ringan</h3>
                        <p>Latihan simpel tanpa alat, cocok untuk di rumah maupun kantor.</p>
                    </div>
                </div>

                <!-- Skincare & Self-care -->
                <div class="category-card">
                    <img src="{{ asset('img/shampo.png') }}" alt="Skincare & Self-care" class="w-full">
                    <div class="category-card-content">
                        <h3>Skincare & Self-care</h3>
                        <p>Tips perawatan diri & skincare pemula.</p>
                    </div>
                </div>

                <!-- Kesehatan Mental -->
                <div class="category-card">
                    <img src="{{ asset('img/mental.png') }}" alt="Kesehatan Mental" class="w-full">
                    <div class="category-card-content">
                        <h3>Kesehatan Mental</h3>
                        <p>Cara mudah kelola stres & jaga kesehatan pikiran.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-gradient-green py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                <div class="lg:w-1/2 text-white">
                    <div class="cta-badge">
                        KESEHATAN DIMULAI DARI HAL KECIL
                    </div>
                    <h2 class="cta-title">
                        Kami bantu kamu<br>
                        mulai hidup<br>
                        <span class="cta-highlight">sehat.</span>
                    </h2>
                    <p class="text-lg lg:text-xl opacity-95 leading-relaxed">
                        Kebiasaan baik seperti olahraga ringan<br>
                        dan hidrasi rutin bantu tingkatkan<br>
                        kualitas hidup.
                    </p>
                </div>
                <div class="lg:w-1/2 flex justify-center lg:justify-end">
                    <div class="cta-card">
                        <img src="{{ asset('img/orgminum.png') }}" alt="Healthy drink" class="w-full">
                        <div class="cta-card-content">
                            <h3>Tips Pola Makan Sehat</h3>
                            <p>
                                Simak langkah mudah makanan dan<br>
                                minuman sehat untuk pemula.
                            </p>
                        </div>
                        <button class="cta-arrow-button">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="py-20 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="info-card">
                <div class="flex flex-col lg:flex-row items-center">
                    <div class="lg:w-1/3 mb-8 lg:mb-0">
                        <img src="{{ asset('img/bmiberanda.png') }}" alt="Body weight scale" class="info-image w-full max-w-sm mx-auto lg:mx-0">
                    </div>
                    <div class="lg:w-2/3 lg:pl-12">
                        <h3 class="info-title">
                            Ingin Tahu Seberapa Sehat Tubuhmu?
                        </h3>
                        <p class="info-text">
                            Dengan mengetahui BMI, kamu bisa memahami apakah tubuhmu berada dalam kategori yang sehat atau belum. BMI adalah indikator sederhana namun efektif yang dapat membantu kamu mengambil langkah yang tepat untuk menjaga pola makan dan gaya hidup yang lebih sehat. Yuk, mulai dari tahu angkanya!
                        </p>
                        <button class="info-button">
                            Cek Sekarang
                        </button>
                    </div>
                </div>
            </div>

            <!-- Steps Section -->
            <div class="text-center mb-16">
                <h2 class="steps-title">
                    Langkah Mudah Memulai Gaya Hidup Sehat
                </h2>
                <p class="steps-subtitle max-w-3xl mx-auto">
                    Mulai dari kebiasaan kecil untuk tubuh bugar dan hidup lebih seimbang.
                </p>
            </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="step-icon step-icon-1">
                    <img src="{{ asset('img/salad.png') }}" alt="Salad" class="w-12 h-12 object-contain">
                    </div>
                    <h3 class="step-title">Pola Makan Seimbang</h3>
                    <p class="step-text">
                        Perbanyak asupan sayur dan buah, batasi makanan olahan, serta konsumsi air putih yang cukup untuk hidrasi optimal.
                    </p>
                </div>

                 <!-- Step 2 -->
                 <div class="text-center">
                     <div class="step-icon step-icon-2">
                         <img src="{{ asset('img/walking.png') }}" alt="Walking" class="w-12 h-12 object-contain">
                     </div>
                     <h3 class="step-title">Aktif Bergerak Setiap Hari</h3>
                     <p class="step-text">
                         Rutin olahraga ringan seperti jalan kaki, yoga, atau stretching selama 30 menit untuk tubuh bugar.
                     </p>
                 </div>

                 <!-- Step 3 -->
                 <div class="text-center">
                     <div class="step-icon step-icon-3">
                         <img src="{{ asset('img/sleepy.png') }}" alt="Sleepy" class="w-12 h-12 object-contain">
                     </div>
                     <h3 class="step-title">Istirahat yang Cukup</h3>
                     <p class="step-text">
                         Tidur 7-8 jam sehari, kelola stres dengan baik, dan luangkan waktu untuk relaksasi dan me-time.
                     </p>
                 </div>
             </div>
        </div>
    </section>

    <!-- Footer akan di-include di sini -->
    @include('components.footer')
</body>
</html>
