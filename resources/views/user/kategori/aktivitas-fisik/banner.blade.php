{{-- Banner Section --}}
<style>
    .banner-section {
        margin-top: 50px;
    }

        /* Banner Section Styles */
        .banner-section {
            margin-top: 50px;
        }

        .banner-container {
            position: relative;
            width: 100%;
            height: 350px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        }

        .banner-slides {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .banner-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
        }

        .banner-slide.active {
            opacity: 1;
        }

        .banner-image {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .banner-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.4) 60%, rgba(0,0,0,0.2) 100%);
            padding: 60px 60px 60px 100px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Left Shadow Effect */
        .banner-overlay::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, rgba(68, 68, 68, 0.3) 0%, rgba(68, 68, 68, 0.1) 50%, transparent 100%);
            pointer-events: none;
        }

        .banner-content {
            position: relative;
            z-index: 2;
            max-width: 500px;
        }

        .banner-content h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 16px;
            line-height: 1.2;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .banner-content p {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 400;
            line-height: 1.6;
            margin-bottom: 24px;
            opacity: 0.95;
            text-shadow: 0 1px 2px rgba(0,0,0,0.5);
        }

        .banner-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 12px 28px;
            border-radius: 25px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            width: fit-content;
            text-decoration: none;
            display: inline-block;
        }

        .banner-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .banner-navigation {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 30px;
            pointer-events: none;
        }

        .nav-prev,
        .nav-next {
            background: transparent;
            border: none;
            color: white;
            width: 50px;
            height: 50px;
            font-size: 32px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: all;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .nav-prev:hover,
        .nav-next:hover {
            color: #ffffff;
            transform: scale(1.2);
            text-shadow: 0 4px 8px rgba(0,0,0,0.7);
        }

        .banner-indicators {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255,255,255,0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.2);
        }

        .indicator.active {
            background: white;
            transform: scale(1.3);
            box-shadow: 0 2px 8px rgba(255,255,255,0.5);
        }

        .indicator:hover {
            background: rgba(255,255,255,0.7);
            transform: scale(1.1);
        }

        @media (max-width: 1024px) {
            .banner-container {
                height: 300px;
            }

            .banner-content h3 {
                font-size: 28px;
            }

            .banner-content p {
                font-size: 15px;
            }

            .banner-overlay {
                padding: 50px 40px 40px 70px;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }

            .banner-container {
                height: 280px;
                border-radius: 16px;
            }

            .banner-content h3 {
                font-size: 24px;
            }

            .banner-content p {
                font-size: 14px;
                margin-bottom: 20px;
            }

            .banner-overlay {
                padding: 40px 30px;
            }

            .banner-btn {
                padding: 10px 24px;
                font-size: 13px;
            }

            .nav-prev,
            .nav-next {
                width: 45px;
                height: 45px;
                font-size: 28px;
            }

            .banner-navigation {
                padding: 0 20px;
            }
        }

        @media (max-width: 480px) {
            .banner-container {
                height: 250px;
            }

            .banner-overlay {
                padding: 30px 20px;
            }

            .banner-content h3 {
                font-size: 20px;
            }

            .banner-content p {
                font-size: 13px;
            }

            .nav-prev,
            .nav-next {
                width: 40px;
                height: 40px;
                font-size: 24px;
            }
        }
    </style>

    <div class="container">
        <!-- Banner Section -->
        <div class="banner-section">
            <div class="banner-container">
                <div class="banner-slides">
                    <div class="banner-slide active">
                        <div class="banner-image">
                            <img src="image/Rectangle 136.png" alt="Tips Sehat Setiap Hari">
                        </div>
                        <div class="banner-overlay">
                            <div class="banner-content">
                                <h3>Tips Sehat Setiap Hari</h3>
                                <p>Kebiasaan kecil bisa berdampak besar untuk kesehatanmu. Yuk mulai hari ini dengan tips sederhana yang bisa langsung kamu praktikkan!</p>
                                <button class="banner-btn">Baca Selengkapnya</button>
                            </div>
                        </div>
                    </div>

                    <div class="banner-slide">
                        <div class="banner-image">
                            <img src="https://images.unsplash.com/photo-1498837167922-ddd27525d352?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Resep Makanan Bergizi">
                        </div>
                        <div class="banner-overlay">
                            <div class="banner-content">
                                <h3>Resep Makanan Bergizi</h3>
                                <p>Temukan berbagai resep makanan sehat yang mudah dibuat dan kaya nutrisi. Cocok untuk menu harian keluarga Indonesia.</p>
                                <button class="banner-btn">Baca Selengkapnya</button>
                            </div>
                        </div>
                    </div>

                    <div class="banner-slide">
                        <div class="banner-image">
                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Olahraga di Rumah">
                        </div>
                        <div class="banner-overlay">
                            <div class="banner-content">
                                <h3>Olahraga di Rumah</h3>
                                <p>Tidak perlu ke gym untuk tetap sehat! Ikuti panduan olahraga mudah yang bisa dilakukan di rumah dengan peralatan sederhana.</p>
                                <button class="banner-btn">Baca Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="banner-navigation">
                    <button class="nav-prev" onclick="prevSlide()">‹</button>
                    <button class="nav-next" onclick="nextSlide()">›</button>
                </div>

                <div class="banner-indicators">
                    <span class="indicator active" onclick="currentSlide(1)"></span>
                    <span class="indicator" onclick="currentSlide(2)"></span>
                    <span class="indicator" onclick="currentSlide(3)"></span>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentSlideIndex = 0;
        const slides = document.querySelectorAll('.banner-slide');
        const indicators = document.querySelectorAll('.indicator');
        let autoSlideInterval;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(indicator => indicator.classList.remove('active'));

            slides[index].classList.add('active');
            indicators[index].classList.add('active');
        }

        function nextSlide() {
            currentSlideIndex = (currentSlideIndex + 1) % slides.length;
            showSlide(currentSlideIndex);
            resetAutoSlide();
        }

        function prevSlide() {
            currentSlideIndex = (currentSlideIndex - 1 + slides.length) % slides.length;
            showSlide(currentSlideIndex);
            resetAutoSlide();
        }

        function currentSlide(index) {
            currentSlideIndex = index - 1;
            showSlide(currentSlideIndex);
            resetAutoSlide();
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(() => {
                currentSlideIndex = (currentSlideIndex + 1) % slides.length;
                showSlide(currentSlideIndex);
            }, 8000); // Changed from 5000 to 8000 (8 seconds)
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        // Start auto-slide when page loads
        document.addEventListener('DOMContentLoaded', function() {
            startAutoSlide();
        });

        // Pause auto-slide when hovering over banner
        const bannerContainer = document.querySelector('.banner-container');
        bannerContainer.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });

        bannerContainer.addEventListener('mouseleave', () => {
            startAutoSlide();
        });

        // Touch/swipe support for mobile
        let startX = 0;
        let endX = 0;

        bannerContainer.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });

        bannerContainer.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            handleSwipe();
        });

        function handleSwipe() {
            const threshold = 50;
            const diff = startX - endX;

            if (Math.abs(diff) > threshold) {
                if (diff > 0) {
                    nextSlide(); // Swipe left - next slide
                } else {
                    prevSlide(); // Swipe right - previous slide
                }
            }
        }
    </script>