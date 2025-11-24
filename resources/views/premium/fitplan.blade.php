<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitPlan - LIFIA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@500;600;700&family=Poppins:wght@700;800&display=swap" rel="stylesheet">
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-gray-50 font-inter">
    @include('components.navbar')
    @include('components.fitplan-header')

    <main class="max-w-5xl mx-auto px-4 py-10">
        <!-- Pilih Tujuan -->
        <section class="mb-16">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#4E342E]">Pilih Tujuan Olahraga</h2>
                <p class="text-gray-500 mt-2">Sesuaikan latihanmu dengan tujuan utama.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

                <!-- Turun Berat Badan -->
                <div class="rounded-[28px] p-8 flex flex-col items-center min-h-[300px] shadow-2xl hover:shadow-[0_18px_40px_rgba(0,0,0,0.25)] transition duration-300 ease-out hover:-translate-y-1"
                    style="background:linear-gradient(180deg,#8BAC65 0%, #728B56 100%);">
                    <img src="{{ asset('images/fitplan/icon-weight.svg') }}" alt="Ikon Turun Berat Badan" class="w-16 h-16 mb-6" />
                    <h3 class="text-white font-semibold text-lg mb-6 leading-tight text-center flex-grow flex items-center">
                        Turun<br>Berat Badan
                    </h3>
                    <button onclick="window.location.href='{{ route('program-turun-berat-badan') }}'"
                        class="bg-white text-[#728B56] font-semibold px-7 py-2 rounded-full shadow hover:opacity-95">
                        Mulai
                    </button>
                </div>

                <!-- Bentuk Otot -->
                <div class="rounded-[28px] p-8 flex flex-col items-center min-h-[300px] shadow-2xl hover:shadow-[0_18px_40px_rgba(0,0,0,0.25)] transition duration-300 ease-out hover:-translate-y-1"
                    style="background:linear-gradient(180deg,#FFB84D 0%, #B2751C 100%);">
                    <img src="{{ asset('images/fitplan/icon-dumbbell.svg') }}" alt="Ikon Bentuk Otot" class="w-16 h-16 mb-6" />
                    <h3 class="text-white font-semibold text-lg mb-6 leading-tight text-center flex-grow flex items-center">
                        Bentuk Otot
                    </h3>
                    <button onclick="window.location.href='{{ route('program-bentuk-otot') }}'"
                    class="bg-white text-[#B2751C] font-semibold px-7 py-2 rounded-full shadow hover:opacity-95">
                        Mulai
                    </button>
                </div>

                <!-- Stamina & Energi -->
                <div class="rounded-[28px] p-8 flex flex-col items-center min-h-[300px] shadow-2xl hover:shadow-[0_18px_40px_rgba(0,0,0,0.25)] transition duration-300 ease-out hover:-translate-y-1"
                    style="background:linear-gradient(180deg,#8D5D51 0%, #4E342E 100%);">
                    <img src="{{ asset('images/fitplan/icon-bolt.svg') }}" alt="Ikon Stamina & Energi" class="w-16 h-16 mb-6" />
                    <h3 class="text-white font-semibold text-lg mb-6 leading-tight text-center flex-grow flex items-center">
                        Stamina &amp;<br>Energi
                    </h3>
                    <button onclick="window.location.href='{{ route('program-stamina-energi') }}'"
                    class="bg-white text-[#4E342E] font-semibold px-7 py-2 rounded-full shadow hover:opacity-95">
                        Mulai
                    </button>
                </div>

                <!-- Tubuh Lebih Lentur -->
                <div class="rounded-[28px] p-8 flex flex-col items-center min-h-[300px] shadow-2xl hover:shadow-[0_18px_40px_rgba(0,0,0,0.25)] transition duration-300 ease-out hover:-translate-y-1"
                    style="background:linear-gradient(180deg,#B4D678 0%, #5E703F 100%);">
                    <img src="{{ asset('images/fitplan/icon-yoga.svg') }}" alt="Ikon Tubuh Lebih Lentur" class="w-16 h-16 mb-6" />
                    <h3 class="text-white font-semibold text-lg mb-6 leading-tight text-center flex-grow flex items-center">
                        Tubuh Lebih<br>Lentur
                    </h3>
                    <button onclick="window.location.href='{{ route('program-tubuh-lentur') }}'"
                    class="bg-white text-[#5E703F] font-semibold px-7 py-2 rounded-full shadow hover:opacity-95">
                        Mulai
                    </button>
                </div>

            </div>
        </section>

        <!-- Artikel Carousel -->
        <section class="mb-16">
            <div class="py-10 sm:py-16 px-4 sm:px-10 rounded-none sm:rounded-[20px] relative left-1/2 -translate-x-1/2 w-screen" style="background-image: linear-gradient(120deg, #A2CC5A 0%, #CAE49E 100%);">
                <div class="max-w-6xl mx-auto">
                    <div id="articleCarousel" class="overflow-hidden rounded-[32px]">
                        <div class="flex transition-transform duration-500 ease-out cursor-grab" data-carousel-track>
                                <article class="min-w-full" data-carousel-slide>
                                    <div class="relative h-[320px] md:h-[360px] rounded-[32px] overflow-hidden shadow-[0_26px_60px_rgba(0,0,0,0.45)]">
                                        <img src="https://images.unsplash.com/photo-1534367610401-9f5ed68180aa?auto=format&fit=crop&w=1200&q=80" alt="Latihan kekuatan pemula" class="absolute inset-0 h-full w-full object-cover">
                                        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
                                        <div class="relative z-10 h-full flex flex-col justify-center gap-4 px-10 lg:px-16 text-white max-w-xl">
                                            <div>
                                                <p class="uppercase text-xs tracking-[0.3em] font-semibold text-white/70">fitplan picks</p>
                                                <h3 class="text-3xl md:text-[34px] font-extrabold leading-snug">Latihan Kekuatan untuk Pemula</h3>
                                            </div>
                                            <p class="text-base text-white/90">Bangun otot dan postur tubuh yang ideal dengan panduan latihan dasar yang mudah diikuti namun tetap efektif.</p>
                                            <button class="inline-flex items-center justify-center border border-white/80 text-white font-semibold rounded-full px-6 py-2 hover:bg-white hover:text-[#36451F] transition">
                                                Baca Artikel
                                            </button>
                                        </div>
                                    </div>
                                </article>

                                <article class="min-w-full" data-carousel-slide>
                                    <div class="relative h-[320px] md:h-[360px] rounded-[32px] overflow-hidden shadow-[0_26px_60px_rgba(0,0,0,0.45)]">
                                        <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=1200&q=80" alt="HIIT untuk stamina" class="absolute inset-0 h-full w-full object-cover">
                                        <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/50 to-transparent"></div>
                                        <div class="relative z-10 h-full flex flex-col justify-center gap-4 px-10 lg:px-16 text-white max-w-xl">
                                            <div>
                                                <p class="uppercase text-xs tracking-[0.3em] font-semibold text-white/70">energi boost</p>
                                                <h3 class="text-3xl md:text-[34px] font-extrabold leading-snug">HIIT Dinamis untuk Stamina</h3>
                                            </div>
                                            <p class="text-base text-white/90">Pelajari pola interval intensitas tinggi selama 20 menit yang dapat meningkatkan VO2 max dan membakar kalori lebih lama.</p>
                                            <button class="inline-flex items-center justify-center border border-white/80 text-white font-semibold rounded-full px-6 py-2 hover:bg-white hover:text-[#36451F] transition">
                                                Lihat Rencana
                                            </button>
                                        </div>
                                    </div>
                                </article>

                                <article class="min-w-full" data-carousel-slide>
                                    <div class="relative h-[320px] md:h-[360px] rounded-[32px] overflow-hidden shadow-[0_26px_60px_rgba(0,0,0,0.45)]">
                                        <img src="https://images.unsplash.com/photo-1549576490-b0b4831ef60a?auto=format&fit=crop&w=1200&q=80" alt="Mobilitas dan fleksibilitas" class="absolute inset-0 h-full w-full object-cover">
                                        <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/50 to-transparent"></div>
                                        <div class="relative z-10 h-full flex flex-col justify-center gap-4 px-10 lg:px-16 text-white max-w-xl">
                                            <div>
                                                <p class="uppercase text-xs tracking-[0.3em] font-semibold text-white/70">mobility reset</p>
                                                <h3 class="text-3xl md:text-[34px] font-extrabold leading-snug">Rangkaian Mobilitas 360°</h3>
                                            </div>
                                            <p class="text-base text-white/90">Serangkaian pose yoga modern dan drill mobilitas sendi yang membantu tubuh lebih lentur tanpa kehilangan kekuatan inti.</p>
                                            <button class="inline-flex items-center justify-center border border-white/80 text-white font-semibold rounded-full px-6 py-2 hover:bg-white hover:text-[#36451F] transition">
                                                Coba Sekarang
                                            </button>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>

                        <div class="flex items-center justify-center gap-3 mt-8">
                            <button class="h-2 rounded-full bg-white/80 w-10 transition-all" data-carousel-indicator></button>
                            <button class="h-2 rounded-full bg-white/50 w-10 transition-all" data-carousel-indicator></button>
                            <button class="h-2 rounded-full bg-white/50 w-10 transition-all" data-carousel-indicator></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Weekly Recommendation Carousel -->
        <section class="mb-24">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-[40px] font-['Poppins'] font-extrabold text-[#5A7738]">Rekomendasi Minggu Ini</h2>
                <p class="mt-3 text-gray-500 font-['Inter']">Pilihan artikel terbaik untuk menginspirasi latihanmu minggu ini.</p>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-16">
                <button type="button"
                    class="hidden md:flex absolute left-0 md:-left-4 lg:-left-6 top-1/2 -translate-y-1/2 h-12 w-12 rounded-full bg-white border border-[#5D7538] text-[#5D7538] items-center justify-center hover:bg-gray-50 transition z-10 shadow-lg"
                    data-weekly-prev aria-label="Artikel sebelumnya">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                        <path d="M15.41 7.41 14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
                    </svg>
                </button>
                <button type="button"
                    class="hidden md:flex absolute right-0 md:-right-4 lg:-right-6 top-1/2 -translate-y-1/2 h-12 w-12 rounded-full bg-white border border-[#5D7538] text-[#5D7538] items-center justify-center hover:bg-gray-50 transition z-10 shadow-lg"
                    data-weekly-next aria-label="Artikel selanjutnya">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                        <path d="m10 6-1.41 1.41L12.17 11H6v2h6.17l-3.58 3.59L10 18l6-6z" />
                    </svg>
                </button>

                <div class="overflow-x-auto overflow-y-hidden scrollbar-hide" data-weekly-scroll-wrapper>
                    <div class="flex gap-6 sm:gap-8 items-stretch" data-weekly-scroll style="width: max-content;">
                        <!-- Card 1 -->
                        <article class="w-[260px] sm:w-[300px] md:w-[320px] flex-shrink-0 bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col"
                            data-weekly-card>
                            <div class="h-56 sm:h-64 flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?auto=format&fit=crop&w=800&q=80"
                                    alt="Latihan kekuatan" class="w-full h-full object-cover rounded-t-2xl">
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <p class="uppercase text-xs tracking-wider text-[#9AA884] font-semibold mb-2">LATIHAN KEKUATAN</p>
                                <h3 class="text-xl sm:text-[22px] leading-tight font-['Poppins'] font-extrabold text-[#5D7538] mb-3">
                                    Latihan Kekuatan
                                </h3>
                                <p class="text-sm font-['Montserrat'] font-medium text-gray-600 leading-relaxed mb-5 flex-grow">
                                    Latihan kekuatan membantu membentuk otot, meningkatkan metabolisme, dan membuat tubuh lebih stabil.
                                </p>
                                <button
                                    class="w-full bg-[#A2CC5A] text-white font-semibold font-['Inter'] rounded-lg py-2.5 hover:bg-[#96BC64] transition">
                                    Baca Artikel
                                </button>
                            </div>
                        </article>

                        <!-- Card 2 -->
                        <article class="w-[260px] sm:w-[300px] md:w-[320px] flex-shrink-0 bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col"
                            data-weekly-card>
                            <div class="h-56 sm:h-64 flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?auto=format&fit=crop&w=800&q=80"
                                    alt="Cardio" class="w-full h-full object-cover rounded-t-2xl">
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <p class="uppercase text-xs tracking-wider text-[#9AA884] font-semibold mb-2">CARDIO BOOST</p>
                                <h3 class="text-xl sm:text-[22px] leading-tight font-['Poppins'] font-extrabold text-[#5D7538] mb-3">
                                    Cardio
                                </h3>
                                <p class="text-sm font-['Montserrat'] font-medium text-gray-600 leading-relaxed mb-5 flex-grow">
                                    Cardio bermanfaat untuk membakar kalori, meningkatkan stamina, dan menjaga kesehatan jantung.
                                </p>
                                <button
                                    class="w-full bg-[#A2CC5A] text-white font-semibold font-['Inter'] rounded-lg py-2.5 hover:bg-[#96BC64] transition">
                                    Baca Artikel
                                </button>
                            </div>
                        </article>

                        <!-- Card 3 -->
                        <article class="w-[260px] sm:w-[300px] md:w-[320px] flex-shrink-0 bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col"
                            data-weekly-card>
                            <div class="h-56 sm:h-64 flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1483729558449-99ef09a8c325?auto=format&fit=crop&w=800&q=80"
                                    alt="Stretching" class="w-full h-full object-cover rounded-t-2xl">
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <p class="uppercase text-xs tracking-wider text-[#9AA884] font-semibold mb-2">MOBILITY RESET</p>
                                <h3 class="text-xl sm:text-[22px] leading-tight font-['Poppins'] font-extrabold text-[#5D7538] mb-3">
                                    Stretching / Mobilitas
                                </h3>
                                <p class="text-sm font-['Montserrat'] font-medium text-gray-600 leading-relaxed mb-5 flex-grow">
                                    Stretching membantu mengurangi pegal, memperbaiki postur, dan meningkatkan fleksibilitas.
                                </p>
                                <button
                                    class="w-full bg-[#A2CC5A] text-white font-semibold font-['Inter'] rounded-lg py-2.5 hover:bg-[#96BC64] transition">
                                    Baca Artikel
                                </button>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('components.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.querySelector('[data-carousel-track]');
            const carousel = document.getElementById('articleCarousel');
            if (!track || !carousel) return;

            const slides = track.querySelectorAll('[data-carousel-slide]');
            const indicators = document.querySelectorAll('[data-carousel-indicator]');
            let activeIndex = 0;
            let autoPlayTimer;

            const goToSlide = (index) => {
                activeIndex = (index + slides.length) % slides.length;
                track.style.transition = 'transform 500ms ease-out';
                track.style.transform = `translateX(-${activeIndex * 100}%)`;

                indicators.forEach((indicator, indicatorIndex) => {
                    if (indicatorIndex === activeIndex) {
                        indicator.classList.add('bg-white');
                        indicator.classList.remove('bg-white/50', 'bg-white/80');
                    } else {
                        indicator.classList.remove('bg-white');
                        indicator.classList.add(indicatorIndex === 0 ? 'bg-white/80' : 'bg-white/50');
                    }
                });
            };

            const resetAutoPlay = () => {
                clearInterval(autoPlayTimer);
                autoPlayTimer = setInterval(() => goToSlide(activeIndex + 1), 7000);
            };

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    goToSlide(index);
                    resetAutoPlay();
                });
            });

            // Drag & swipe support
            let isPointerDown = false;
            let startX = 0;
            let currentX = 0;

            const pointerDown = (clientX) => {
                isPointerDown = true;
                startX = clientX;
                currentX = clientX;
                clearInterval(autoPlayTimer);
                track.style.transition = 'none';
                carousel.classList.add('cursor-grabbing');
            };

            const pointerMove = (clientX) => {
                if (!isPointerDown) return;
                currentX = clientX;
                const deltaX = currentX - startX;
                const percentOffset = (deltaX / carousel.offsetWidth) * 100;
                track.style.transform = `translateX(calc(-${activeIndex * 100}% + ${percentOffset}%))`;
            };

            const pointerUp = () => {
                if (!isPointerDown) return;
                isPointerDown = false;
                carousel.classList.remove('cursor-grabbing');
                const deltaX = currentX - startX;
                const threshold = carousel.offsetWidth * 0.15;

                if (deltaX < -threshold) {
                    goToSlide(activeIndex + 1);
                } else if (deltaX > threshold) {
                    goToSlide(activeIndex - 1);
                } else {
                    goToSlide(activeIndex);
                }

                resetAutoPlay();
            };

            carousel.addEventListener('mousedown', (e) => pointerDown(e.clientX));
            window.addEventListener('mousemove', (e) => pointerMove(e.clientX));
            window.addEventListener('mouseup', pointerUp);

            carousel.addEventListener('touchstart', (e) => {
                if (e.touches.length > 1) return;
                pointerDown(e.touches[0].clientX);
            }, { passive: true });

            carousel.addEventListener('touchmove', (e) => {
                if (!isPointerDown || e.touches.length > 1) return;
                pointerMove(e.touches[0].clientX);
            }, { passive: true });

            carousel.addEventListener('touchend', pointerUp);
            carousel.addEventListener('touchcancel', pointerUp);

            goToSlide(0);
            resetAutoPlay();

            // Weekly recommendation carousel
            const weeklyScroll = document.querySelector('[data-weekly-scroll]');
            const weeklyScrollWrapper = document.querySelector('[data-weekly-scroll-wrapper]');
            const weeklyPrev = document.querySelector('[data-weekly-prev]');
            const weeklyNext = document.querySelector('[data-weekly-next]');

            if (weeklyScroll && weeklyScrollWrapper) {
                const cards = weeklyScroll.querySelectorAll('[data-weekly-card]');

                const adjustContainerWidth = () => {
                    // On medium screens and above, ensure all cards are visible if they fit
                    if (window.innerWidth >= 768 && cards.length <= 3) {
                        let totalWidth = 0;
                        cards.forEach(card => {
                            totalWidth += card.offsetWidth;
                        });
                        const style = window.getComputedStyle(weeklyScroll);
                        const gapValue = parseFloat(style.gap) || 24;
                        totalWidth += gapValue * (cards.length - 1);

                        // Add a small buffer
                        totalWidth += 10;

                        // Only adjust if content fits
                        if (totalWidth <= weeklyScrollWrapper.parentElement.offsetWidth - 32) {
                            weeklyScrollWrapper.style.width = totalWidth + 'px';
                            weeklyScrollWrapper.style.margin = '0 auto';
                            weeklyScrollWrapper.style.maxWidth = '100%';
                        } else {
                            weeklyScrollWrapper.style.width = '';
                            weeklyScrollWrapper.style.margin = '';
                            weeklyScrollWrapper.style.maxWidth = '';
                        }
                    } else {
                        weeklyScrollWrapper.style.width = '';
                        weeklyScrollWrapper.style.margin = '';
                        weeklyScrollWrapper.style.maxWidth = '';
                    }
                };

                const updateArrowVisibility = () => {
                    const canScrollLeft = weeklyScrollWrapper.scrollLeft > 1;
                    const canScrollRight = weeklyScrollWrapper.scrollLeft < (weeklyScrollWrapper.scrollWidth - weeklyScrollWrapper.clientWidth - 1);

                    if (weeklyPrev) {
                        weeklyPrev.style.opacity = canScrollLeft ? '1' : '0.5';
                        weeklyPrev.style.pointerEvents = canScrollLeft ? 'auto' : 'none';
                    }
                    if (weeklyNext) {
                        weeklyNext.style.opacity = canScrollRight ? '1' : '0.5';
                        weeklyNext.style.pointerEvents = canScrollRight ? 'auto' : 'none';
                    }
                };

                const getScrollAmount = () => {
                    const card = cards[0];
                    const style = window.getComputedStyle(weeklyScroll);
                    const gapValue = parseFloat(style.gap) || 24;
                    if (!card) {
                        return (weeklyScrollWrapper.clientWidth || window.innerWidth) * 0.9;
                    }
                    return card.offsetWidth + gapValue;
                };

                const scrollByDirection = (direction) => {
                    const scrollAmount = getScrollAmount();
                    weeklyScrollWrapper.scrollBy({
                        left: direction * scrollAmount,
                        behavior: 'smooth'
                    });
                    setTimeout(updateArrowVisibility, 300);
                };

                weeklyPrev?.addEventListener('click', () => scrollByDirection(-1));
                weeklyNext?.addEventListener('click', () => scrollByDirection(1));

                weeklyScrollWrapper.addEventListener('scroll', updateArrowVisibility);

                // Initial setup
                adjustContainerWidth();
                updateArrowVisibility();

                // Update on resize
                let resizeTimer;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(() => {
                        adjustContainerWidth();
                        updateArrowVisibility();
                    }, 150);
                });
            }
        });
    </script>
</body>

</html>
