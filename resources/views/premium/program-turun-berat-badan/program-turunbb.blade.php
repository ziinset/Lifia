<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Turun Berat Badan - LIFIA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                        'montserrat': ['Montserrat', 'sans-serif'],
                    },
                    colors: {
                        'brand-brown': '#4E342E',
                        'brand-light': '#F8F6F2',
                        'brand-green-light': '#8BAC65',
                        'brand-green-dark': '#4B5C3B',
                    }
                }
            }
        }
    </script>
    <style>
        .shadow-custom {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .placeholder-img {
            background: linear-gradient(135deg, #f0f0f0 0%, #e0e0e0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 14px;
        }

        /* Slider custom */
        .guide-pagination .swiper-pagination-bullet {
            background: rgba(78, 52, 46, 0.4);
            opacity: 1;
        }

        .guide-pagination .swiper-pagination-bullet-active {
            background: #4E342E;
            width: 28px;
            border-radius: 9999px;
        }

        .guide-prev.swiper-button-disabled,
        .guide-next.swiper-button-disabled {
            opacity: 0.45;
        }

        .ch-prev.swiper-button-disabled,
        .ch-next.swiper-button-disabled {
            opacity: 0.45;
        }
    </style>
</head>

<body class="bg-white font-poppins">
    @include('components.navbar')
    <section class="relative min-h-screen overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/turun.svg') }}" alt="Program Turun Berat Badan Background"
                class="w-full h-full object-cover">
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 min-h-screen flex flex-col justify-center ml-8 md:ml-16">
            <h1 class="text-white text-3xl md:text-5xl font-black leading-tight mb-6">
                Program Turun<br>
                Berat Badan
            </h1>
            <p class="text-white/90 text-xl md:text-2xl font-medium leading-relaxed mb-8 max-w-2xl">
                Ikuti program penurunan berat badan yang dirancang dengan pola makan sehat, olahraga efektif, dan
                dukungan motivasi untuk hasil yang nyata.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <button
                    class="bg-white text-brand-green-dark px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition-colors">
                    Lihat Rencana Latihan
                </button>
                <button
                    class="border-2 border-white text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-brand-green-dark transition-colors">
                    Pelajari Dulu
                </button>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <div class="w-full aspect-[4/3] placeholder-img rounded-3xl mb-4">
                        <img src="{{ asset('img/main_pic_turunbb.png') }}" alt="Program Turun Berat Badan">
                    </div>
                    <div
                        class="absolute -bottom-8 -right-8 w-48 h-48 placeholder-img rounded-2xl border-4 border-white">
                        <img src="{{ asset('img/second_pic_turunbb.png') }}" alt="Program Turun Berat Badan">
                    </div>
                </div>
                <div>
                    <div
                        class="inline-flex items-center gap-2 bg-brand-green-light/20 text-brand-green-dark px-4 py-2 rounded-full font-semibold text-sm mb-6">
                        <span class="iconify" data-icon="mdi:leaf"></span>
                        Program Khusus
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 leading-tight mb-6">
                        Apa itu Program Turun Berat Badan?
                    </h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-8">
                        Program Turun Berat Badan adalah gambaran untuk membantu turun berat badan secara sehat.
                        Programnya berisi target latihan tiap punya. Makanan diet-ness-nya minimal tapi sudah dan yang
                        dibisakan. Dengan program olahraga + dietnya.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-4">
                            <span class="iconify text-brand-green-light text-2xl mt-1"
                                data-icon="mdi:check-circle"></span>
                            <span class="text-gray-700 text-lg leading-relaxed">Latihan bahan berisomedien untuk program
                                latihan personal, efektifitas, dan fungsional</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="iconify text-brand-green-light text-2xl mt-1"
                                data-icon="mdi:check-circle"></span>
                            <span class="text-gray-700 text-lg leading-relaxed">Latihan secara kontinu pada bulan dengan
                                agar, dengan yang dibisakan agar untuk</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="iconify text-brand-green-light text-2xl mt-1"
                                data-icon="mdi:check-circle"></span>
                            <span class="text-gray-700 text-lg leading-relaxed">Latihan Berapa Diet: tim dukungan
                                latihan untuk akar, yang dibisakan per alisan bersama</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Workout Guide Section -->
    <section class="py-20 bg-brand-light">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-4xl md:text-5xl font-black text-brand-brown mb-2">Pilih Panduan Workout</h2>
                <p class="text-brand-brown/70 text-lg">Sesuaikan latihan dengan kebutuhanmu untuk hasil yang maksimal
                    dan efektif</p>
            </div>

            <div class="relative max-w-6xl mx-auto">
                <button
                    class="guide-prev absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-10 w-10 h-10 md:w-12 md:h-12 rounded-full bg-white text-brand-brown flex items-center justify-center z-10"
                    aria-label="Sebelumnya">
                    <span class="iconify" data-icon="mdi:chevron-left" data-width="24" data-height="24"></span>
                </button>

                <div class="swiper guide-swiper pb-12">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div
                                class="bg-gradient-to-br from-brand-green-dark to-brand-green-light rounded-3xl p-8 md:p-10 text-white relative overflow-hidden h-[260px] md:h-[300px]">
                                <h3 class="text-3xl md:text-4xl font-extrabold leading-tight uppercase max-w-[60%]">
                                    BAKAR LEMAK DI PERUT
                                </h3>
                                <button
                                    class="absolute left-6 bottom-6 bg-white text-brand-brown px-6 md:px-8 py-3 rounded-full font-bold flex items-center gap-3 hover:bg-gray-100 transition">
                                    Mulai
                                    <span class="iconify" data-icon="mdi:arrow-right" data-width="20"
                                        data-height="20"></span>
                                </button>
                                <img src="{{ asset('img/bakar_lemak.png') }}" alt="Bakar Lemak"
                                    class="absolute -right-4 bottom-0 h-[140%] md:h-[150%] object-contain opacity-95 pointer-events-none">
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div
                                class="bg-gradient-to-br from-amber-600 to-amber-400 rounded-3xl p-8 md:p-10 text-white relative overflow-hidden h-[260px] md:h-[300px]">
                                <h3 class="text-3xl md:text-4xl font-extrabold leading-tight uppercase max-w-[60%]">
                                    CARDIO PEMBAKAR KALORI
                                </h3>
                                <button
                                    class="absolute left-6 bottom-6 bg-white text-brand-brown px-6 md:px-8 py-3 rounded-full font-bold flex items-center gap-3 hover:bg-gray-100 transition">
                                    Mulai
                                    <span class="iconify" data-icon="mdi:arrow-right" data-width="20"
                                        data-height="20"></span>
                                </button>
                                <img src="{{ asset('img/cardio_kalori.png') }}" alt="Cardio"
                                    class="absolute -right-4 bottom-0 h-[140%] md:h-[150%] object-contain opacity-95 pointer-events-none">
                            </div>
                        </div>
                    </div>
                    <div class="guide-pagination swiper-pagination !relative !bottom-0"></div>
                </div>

                <button
                    class="guide-next absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-10 w-10 h-10 md:w-12 md:h-12 rounded-full bg-white text-brand-brown flex items-center justify-center z-10"
                    aria-label="Berikutnya">
                    <span class="iconify" data-icon="mdi:chevron-right" data-width="24" data-height="24"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Challenges Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-black text-gray-900 mb-2">Tantangan</h2>
                <p class="text-brand-brown/80 text-lg max-w-3xl mx-auto">Gabung sekarang, mulai perjalananmu menuju
                    tubuh sehat dan lebih ringan</p>
            </div>

            <div class="relative max-w-6xl mx-auto">
                <button
                    class="ch-prev absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-10 w-10 h-10 md:w-12 md:h-12 rounded-full bg-white text-brand-brown flex items-center justify-center z-10"
                    aria-label="Sebelumnya">
                    <span class="iconify" data-icon="mdi:chevron-left" data-width="24" data-height="24"></span>
                </button>

                <div class="swiper challenges-swiper pb-2">
                    <div class="swiper-wrapper">
                        <!-- Slide 1: Cardio -->
                        <div class="swiper-slide">
                            <div
                                class="relative rounded-3xl overflow-hidden h-[240px] md:h-[280px] bg-gradient-to-br from-orange-500 to-orange-400 p-6 text-white">
                                <div class="max-w-[55%]">
                                    <p
                                        class="text-white/90 text-[12px] md:text-sm font-semibold uppercase tracking-wide">
                                        CARDIO 15 MENIT</p>
                                    <h3 class="text-[13px] md:text-[15px] font-medium leading-[1.6] mt-2">Latihan
                                        singkat tapi efektif untuk membakar kalori lebih cepat.</h3>
                                    <button
                                        class="mt-5 bg-brand-brown text-white px-6 py-2 rounded-full font-bold shadow-md hover:opacity-90 transition">Gabung</button>
                                </div>
                                <img src="{{ asset('img/figure_cardio.png') }}" alt="Cardio"
                                    class="absolute -right-2 bottom-0 h-[100%] md:h-[110%] object-contain pointer-events-none">
                            </div>
                        </div>

                        <!-- Slide 2: HIIT -->
                        <div class="swiper-slide">
                            <div
                                class="relative rounded-3xl overflow-hidden h-[240px] md:h-[280px] bg-gradient-to-br from-brand-green-dark to-brand-green-light p-6 text-white">
                                <div class="max-w-[55%]">
                                    <p
                                        class="text-white/90 text-[12px] md:text-sm font-semibold uppercase tracking-wide">
                                        HIIT 20 MENIT</p>
                                    <h3 class="text-[13px] md:text-[15px] font-medium leading-[1.6] mt-2">Gerakan
                                        intensitas tinggi yang tetap membakar lemak setelah latihan.</h3>
                                    <button
                                        class="mt-5 bg-brand-brown text-white px-6 py-2 rounded-full font-bold shadow-md hover:opacity-90 transition">Gabung</button>
                                </div>
                                <img src="{{ asset('img/figure_hiit.png') }}" alt="HIIT"
                                    class="absolute -right-2 bottom-0 h-[100%] md:h-[110%] object-contain pointer-events-none">
                            </div>
                        </div>

                        <!-- Slide 3: Full Body -->
                        <div class="swiper-slide">
                            <div
                                class="relative rounded-3xl overflow-hidden h-[240px] md:h-[280px] bg-gradient-to-br from-yellow-500 to-yellow-400 p-6 text-white">
                                <div class="max-w-[55%]">
                                    <p
                                        class="text-white/90 text-[12px] md:text-sm font-semibold uppercase tracking-wide">
                                        FULL BODY 25 MENIT</p>
                                    <h3 class="text-[13px] md:text-[15px] font-medium leading-[1.6] mt-2">Gerakan full
                                        body untuk stamina dan penurunan berat badan.</h3>
                                    <button
                                        class="mt-5 bg-brand-brown text-white px-6 py-2 rounded-full font-bold shadow-md hover:opacity-90 transition">Gabung</button>
                                </div>
                                <img src="{{ asset('img/figure_fullbody.png') }}" alt="Full Body"
                                    class="absolute -right-2 bottom-0 h-[100%] md:h-[110%] object-contain pointer-events-none">
                            </div>
                        </div>
                    </div>
                </div>

                <button
                    class="ch-next absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-10 w-10 h-10 md:w-12 md:h-12 rounded-full bg-white text-brand-brown flex items-center justify-center z-10"
                    aria-label="Berikutnya">
                    <span class="iconify" data-icon="mdi:chevron-right" data-width="24" data-height="24"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- For You Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-start justify-between mb-8">
                <div>
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-1">Untuk Anda</h2>
                    <p class="text-gray-600 text-base md:text-lg">Rekomendasi latihan pilihan sesuai kebutuhan Anda</p>
                </div>
                <button
                    class="bg-brand-brown text-white px-5 py-2.5 rounded-full font-semibold hover:opacity-90 transition">Lihat
                    Semua</button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left: list cards -->
                <div class="lg:col-span-2 space-y-5">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-2xl p-6 shadow-custom flex items-center gap-5">
                        <div class="w-36 h-28 md:w-40 md:h-32 rounded-xl overflow-hidden flex-shrink-0">
                            <img src="{{ asset('img/rectangle 517.png') }}" alt="Cardio Fat Burn Express"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <div
                                class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold mb-2">
                                <span class="iconify text-sm" data-icon="mdi:fire"></span> Trending Minggu Ini
                            </div>
                            <h3 class="text-xl md:text-2xl font-extrabold text-gray-900 mb-1">Cardio Fat Burn Express
                            </h3>
                            <p class="text-gray-600 text-sm md:text-base mb-2">Cocok buat yang sibuk tapi ingin cepat
                                bakar kalori.</p>
                            <div class="flex items-center gap-4 text-gray-500">
                                <span class="flex items-center gap-1 text-sm"><span class="iconify"
                                        data-icon="mdi:clock-outline"></span> 11 menit</span>
                                <span
                                    class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">110
                                    kkal</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <button
                                class="bg-green-500 text-white px-6 py-2.5 rounded-full font-bold hover:bg-green-600 transition whitespace-nowrap">Mulai</button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-2xl p-6 shadow-custom flex items-center gap-5">
                        <div class="w-36 h-28 md:w-40 md:h-32 rounded-xl overflow-hidden flex-shrink-0">
                            <img src="{{ asset('img/rectangle 521.png') }}" alt="HIIT Power Workout"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-xl md:text-2xl font-extrabold text-gray-900 mb-1">HIIT Power Workout</h3>
                            <p class="text-gray-600 text-sm md:text-base mb-2">Latihan intensitas tinggi untuk hasil
                                maksimal.</p>
                            <div class="flex items-center gap-4 text-gray-500">
                                <span class="flex items-center gap-1 text-sm"><span class="iconify"
                                        data-icon="mdi:clock-outline"></span> 20 menit</span>
                                <span
                                    class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">220
                                    kkal</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <button
                                class="border-2 border-green-500 text-green-500 px-6 py-2.5 rounded-full font-bold hover:bg-green-500 hover:text-white transition whitespace-nowrap">Lanjutkan</button>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-2xl p-6 shadow-custom flex items-center gap-5">
                        <div class="w-36 h-28 md:w-40 md:h-32 rounded-xl overflow-hidden flex-shrink-0">
                            <img src="{{ asset('img/Rectangle 524.png') }}" alt="Full Body Slim Training"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-xl md:text-2xl font-extrabold text-gray-900 mb-1">Full Body Slim Training
                            </h3>
                            <p class="text-gray-600 text-sm md:text-base mb-2">Gerakan seluruh tubuh percepat penurunan
                                berat badan.</p>
                            <div class="flex items-center gap-4 text-gray-500">
                                <span class="flex items-center gap-1 text-sm"><span class="iconify"
                                        data-icon="mdi:clock-outline"></span> 18 menit</span>
                                <span
                                    class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">180
                                    kkal</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0 w-32">
                            <div class="text-gray-600 text-sm mb-2 font-medium">Progress 40%</div>
                            <div class="w-full h-2 bg-gray-200 rounded-full">
                                <div class="w-2/5 h-2 bg-green-500 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: sidebar widgets -->
                <div class="space-y-5">
                    <!-- Trending Widget -->
                    <div class="rounded-2xl p-6 text-white"
                        style="background:linear-gradient(180deg,#B4D678 0%,#74894D 75%,#5E703F 100%);">
                        <div class="flex items-center gap-2 mb-5">
                            <span class="iconify text-orange-500" data-icon="mdi:fire" data-width="20"
                                data-height="20"></span>
                            <h4 class="text-base md:text-lg font-extrabold">Trending Minggu Ini</h4>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-3 flex-1 min-w-0">
                                    <span
                                        class="w-7 h-7 rounded-full bg-white text-gray-800 font-bold text-sm flex items-center justify-center flex-shrink-0">1</span>
                                    <span class="font-medium text-sm md:text-base text-green-100 truncate">Meal
                                        Plan</span>
                                </div>
                                <div class="flex items-center gap-2 flex-shrink-0">
                                    <span class="text-sm text-green-100">2.3k</span>
                                    <button
                                        class="px-3 py-1.5 rounded-full bg-white text-black text-xs font-semibold hover:bg-gray-600 whitespace-nowrap">Lihat</button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-3 flex-1 min-w-0">
                                    <span
                                        class="w-7 h-7 rounded-full bg-white text-gray-800 font-bold text-sm flex items-center justify-center flex-shrink-0">2</span>
                                    <span class="font-medium text-sm md:text-base text-green-100 truncate">Cardio Fat
                                        Burn Express</span>
                                </div>
                                <div class="flex items-center gap-2 flex-shrink-0">
                                    <span class="text-sm text-green-100">2.3k</span>
                                    <button
                                        class="px-3 py-1.5 rounded-full bg-white text-black text-xs font-semibold hover:bg-gray-600 whitespace-nowrap">Lihat</button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-3 flex-1 min-w-0">
                                    <span
                                        class="w-7 h-7 rounded-full bg-white text-gray-800 font-bold text-sm flex items-center justify-center flex-shrink-0">3</span>
                                    <span class="font-medium text-sm md:text-base text-green-100 truncate">Morning Yoga
                                        Flow</span>
                                </div>
                                <div class="flex items-center gap-2 flex-shrink-0">
                                    <span class="text-sm text-green-100">2.3k</span>
                                    <button
                                        class="px-3 py-1.5 rounded-full bg-white text-black text-xs font-semibold hover:bg-gray-600 whitespace-nowrap">Lihat</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Promo Meal Plan -->
                    <div class="relative rounded-2xl overflow-hidden h-56 md:h-64">
                        <img src="{{ asset('img/Rectangle 561.png') }}" alt="Meal Plan Promo"
                            class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-tr from-black/50 via-black/30 to-transparent"></div>
                        <div class="relative z-10 p-6 text-white h-full flex flex-col justify-between">
                            <p class="text-base md:text-lg font-extrabold max-w-[85%] leading-snug">
                                Latihan aja nggak cukup, butuh <span class="text-green-400">meal plan</span> biar energi
                                full & hasil maksimal!
                            </p>
                            <button onclick="window.location.href='{{ route('mealplan') }}'"
                                class="self-start bg-green-500 text-white px-5 py-2.5 rounded-full font-bold shadow-md hover:bg-green-600 transition">Meal
                                Plan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Meal Plan Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-start justify-between mb-12">
                <div>
                    <h2 class="text-4xl font-black text-brand-brown mb-2">Meal Plan</h2>
                    <p class="text-gray-600 text-base md:text-lg max-w-3xl">Dengan panduan ini, Anda akan mendapatkan
                        menu harian yang dilengkapi informasi kalori, protein, karbohidrat, dan lemak untuk membantu
                        mencapai target kesehatan dan kebugaran Anda.</p>
                </div>
                <button
                    class="bg-brand-brown text-white px-5 py-2.5 rounded-full font-semibold hover:opacity-90 transition whitespace-nowrap ml-4">Lihat
                    Semua</button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1: Energy Oat Bowl -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-custom">
                    <div class="w-full h-48 overflow-hidden">
                        <img src="{{ asset('img/Rectangle 530.png') }}" alt="Energy Oat Bowl"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-green-400 font-semibold text-sm">Sarapan</span>
                            <span class="text-gray-400 text-sm">07.00 – 08.00</span>
                        </div>
                        <h3 class="text-xl font-black text-brand-brown mb-3">Energy Oat Bowl</h3>
                        <div class="space-y-1 mb-4">
                            <p class="text-gray-700 text-sm font-semibold">350 kcal</p>
                            <p class="text-gray-600 text-sm">55g karbo, 12g protein, 6g lemak</p>
                        </div>
                        <button onclick="window.location.href='{{ route('mealplan') }}'"
                            class="w-full bg-green-400 text-white px-4 py-2.5 rounded-full font-semibold hover:bg-green-500 transition text-center">Lihat
                            Detail</button>
                    </div>
                </div>

                <!-- Card 2: Berry Yogurt Boost -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-custom">
                    <div class="w-full h-48 overflow-hidden">
                        <img src="{{ asset('img/Rectangle 561.png') }}" alt="Berry Yogurt Boost"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-green-400 font-semibold text-sm">Snack Pagi</span>
                            <span class="text-gray-400 text-sm">10.00</span>
                        </div>
                        <h3 class="text-xl font-black text-brand-brown mb-3">Berry Yogurt Boost</h3>
                        <div class="space-y-1 mb-4">
                            <p class="text-gray-700 text-sm font-semibold">180 kcal</p>
                            <p class="text-gray-600 text-sm">18g karbo, 10g protein, 4g lemak</p>
                        </div>
                        <button onclick="window.location.href='{{ route('mealplan') }}'"
                            class="w-full bg-green-400 text-white px-4 py-2.5 rounded-full font-semibold hover:bg-green-500 transition text-center">Lihat
                            Detail</button>
                    </div>
                </div>

                <!-- Card 3: Grilled Chicken Power Plate -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-custom">
                    <div class="w-full h-48 overflow-hidden">
                        <img src="{{ asset('img/Rectangle 562.png') }}" alt="Grilled Chicken Power Plate"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-green-400 font-semibold text-sm">Makan Siang</span>
                            <span class="text-gray-400 text-sm">13.00</span>
                        </div>
                        <h3 class="text-xl font-black text-brand-brown mb-3">Grilled Chicken Power Plate</h3>
                        <div class="space-y-1 mb-4">
                            <p class="text-gray-700 text-sm font-semibold">480 kcal</p>
                            <p class="text-gray-600 text-sm">60g karbo, 32g protein, 10g lemak</p>
                        </div>
                        <button onclick="window.location.href='{{ route('mealplan') }}'"
                            class="w-full bg-green-400 text-white px-4 py-2.5 rounded-full font-semibold hover:bg-green-500 transition text-center">Lihat
                            Detail</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.guide-swiper', {
                slidesPerView: 1.1,
                spaceBetween: 16,
                centeredSlides: true,
                pagination: { el: '.guide-pagination', clickable: true },
                navigation: { nextEl: '.guide-next', prevEl: '.guide-prev' },
                breakpoints: {
                    768: { slidesPerView: 2, centeredSlides: false, spaceBetween: 24 }
                }
            });

            new Swiper('.challenges-swiper', {
                slidesPerView: 1.1,
                spaceBetween: 16,
                navigation: { nextEl: '.ch-next', prevEl: '.ch-prev' },
                breakpoints: {
                    768: { slidesPerView: 2, spaceBetween: 20 },
                    1024: { slidesPerView: 3, spaceBetween: 24 }
                }
            });
        });
    </script>
</body>

</html>