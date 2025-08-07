<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIFIA Footer</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            font-family: 'Montserrat', sans-serif;
        }
        
        .main-content {
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            margin-bottom: -1px;
        }
        
        .main-content h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 3rem;
            color: #333;
            animation: fadeInUp 1s ease-out;
        }

        /* Animasi keyframes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-5px);
            }
            60% {
                transform: translateY(-3px);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes wave {
            0%, 100% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-3px);
            }
            75% {
                transform: translateX(3px);
            }
        }

        /* Animasi untuk footer curve */
        .footer-curve {
            animation: slideInUp 1.2s ease-out;
        }

        /* Animasi untuk konten footer */
        .footer-content > div:nth-child(1) {
            animation: slideInLeft 1s ease-out 0.2s both;
        }

        .footer-content > div:nth-child(2) {
            animation: slideInUp 1s ease-out 0.4s both;
        }

        .footer-content > div:nth-child(3) {
            animation: slideInUp 1s ease-out 0.6s both;
        }

        .footer-content > div:nth-child(4) {
            animation: slideInRight 1s ease-out 0.8s both;
        }

        /* Animasi untuk simbol > */
        .arrow-symbol {
            animation: wave 2s ease-in-out infinite;
        }

        /* Animasi hover untuk social media icons */
        .social-icon {
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: translateY(-3px) scale(1.1);
            background-color: rgba(255,255,255,0.3) !important;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Animasi untuk contact icons */
        .contact-icon {
            transition: all 0.3s ease;
        }

        .contact-icon:hover {
            transform: scale(1.1);
            background-color: #7cb342 !important;
        }

        /* Animasi untuk links */
        .footer-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .footer-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #8bc34a;
            transition: width 0.3s ease;
        }

        .footer-link:hover::after {
            width: 100%;
        }

        .footer-link:hover {
            color: white !important;
            transform: translateX(5px);
        }



        /* Animasi untuk copyright */
        .copyright {
            animation: fadeInUp 1s ease-out 1s both;
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr !important;
                gap: 30px !important;
                text-align: left;
            }
            
            .footer-curve {
                height: 100px !important;
                top: -60px !important;
            }
            
            .footer-container {
                padding: 80px 20px 30px 20px !important;
            }
        }
        
        @media (max-width: 480px) {
            .main-content h1 {
                font-size: 2rem;
            }
            
            .footer-content {
                gap: 25px !important;
            }
        }
    </style>
</head>
<body>
    <!-- Konten utama untuk demo -->
    <div class="main-content">
        <h1>Selamat datang!</h1>
    </div>

    <!-- Footer dengan lekukan -->
    <footer style="background-color: #3B5C3F; color: white; padding: 0; margin: 0; position: relative; overflow: hidden;">
        <!-- Lekukan melengkung di bagian atas -->
        <div class="footer-curve" style="
            position: absolute; 
            top: -80px; 
            left: 0; 
            right: 0; 
            width: 100%; 
            height: 150px; 
            background: white; 
            border-radius: 0 0 100% 100%;
            z-index: 1;
        "></div>
        
        <!-- Konten footer -->
        <div class="footer-container" style="position: relative; z-index: 2; max-width: 1200px; margin: 0 auto; padding: 120px 20px 40px 20px;">
            <div class="footer-content" style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 40px; align-items: start;">
                
                <!-- LIFIA Section -->
                <div style="padding-right: 20px; position: relative;">
                    <!-- Simbol > -->
                    <div class="arrow-symbol" style="position: absolute; left: -40px; top: 0; font-size: 24px; color: #8bc34a; font-weight: bold;">></div>
                    
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 24px; font-weight: 700; margin-bottom: 20px; color: white; margin-top: 0;">LIFIA</h3>
                    <p style="font-family: 'Montserrat', sans-serif; font-size: 14px; line-height: 1.6; margin-bottom: 25px; color: #c8d8c8; font-weight: 400; max-width: 280px;">
                        Kami hadir untuk mendukungmu menjalani hidup yang lebih sehat, seimbang, dan bahagia melalui informasi terpercaya setiap hari.
                    </p>
                    <div style="display: flex; gap: 15px;">
                        <a href="#" class="social-icon" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: rgba(255,255,255,0.2); border-radius: 50%; text-decoration: none;">
                            <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-icon" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: rgba(255,255,255,0.2); border-radius: 50%; text-decoration: none;">
                            <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-icon" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: rgba(255,255,255,0.2); border-radius: 50%; text-decoration: none;">
                            <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Tentang Section -->
                <div>
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 18px; font-weight: 600; margin-bottom: 20px; color: white; margin-top: 0;">Tentang</h3>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 12px;">
                            <a href="#" class="footer-link" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; display: block;">Tentang Kami</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" class="footer-link" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; display: block;">Tim Penulis</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" class="footer-link" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; display: block;">Tim Penulis</a>
                        </li>
                    </ul>
                </div>

                <!-- Jelajahi Section -->
                <div>
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 18px; font-weight: 600; margin-bottom: 20px; color: white; margin-top: 0;">Jelajahi</h3>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 12px;">
                            <a href="#" class="footer-link" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; display: block;">Artikel Terbaru</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" class="footer-link" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; display: block;">Topik Popular</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" class="footer-link" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; display: block;">Perawatan Diri</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" class="footer-link" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; display: block;">Gaya Hidup Vegan</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" class="footer-link" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; display: block;">Kesehatan Mental</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" class="footer-link" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; display: block;">Pola Makan Sehat</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" class="footer-link" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; display: block;">Aktivitas Fisik</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" class="footer-link" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; display: block;">Eco Living</a>
                        </li>
                    </ul>
                </div>

                <!-- Kontak Section -->
                <div>
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 18px; font-weight: 600; margin-bottom: 20px; color: white; margin-top: 0;">Kontak</h3>
                    <div style="space-y: 15px;">
                        <div style="margin-bottom: 15px; display: flex; align-items: center; gap: 12px;">
                            <div class="contact-icon" style="width: 32px; height: 32px; background-color: #8bc34a; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                    <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/>
                                </svg>
                            </div>
                            <span style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; font-size: 14px; font-weight: 400;">0821-3333-4444</span>
                        </div>
                        <div style="margin-bottom: 15px; display: flex; align-items: center; gap: 12px;">
                            <div class="contact-icon" style="width: 32px; height: 32px; background-color: #8bc34a; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                            </div>
                            <span style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; font-size: 14px; font-weight: 400;">lifia@gmail.com</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div class="contact-icon" style="width: 32px; height: 32px; background-color: #8bc34a; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                            </div>
                            <span style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; font-size: 14px; font-weight: 400;">Malang, Indonesia</span>
                        </div>
                    </div>
                </div><ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 12px;">
                            <a href="#" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; transition: color 0.3s; display: block;">Artikel Terbaru</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; transition: color 0.3s; display: block;">Topik Popular</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; transition: color 0.3s; display: block;">Perawatan Diri</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; transition: color 0.3s; display: block;">Gaya Hidup Vegan</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; transition: color 0.3s; display: block;">Kesehatan Mental</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; transition: color 0.3s; display: block;">Pola Makan Sehat</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; transition: color 0.3s; display: block;">Aktivitas Fisik</a>
                        </li>
                        <li style="margin-bottom: 12px;">
                            <a href="#" style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; text-decoration: none; font-size: 14px; font-weight: 400; transition: color 0.3s; display: block;">Eco Living</a>
                        </li>
                    </ul>
                </div>

                <!-- Kontak Section -->
                <div>
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 18px; font-weight: 600; margin-bottom: 20px; color: white; margin-top: 0;">Kontak</h3>
                    <div style="space-y: 15px;">
                        <div style="margin-bottom: 15px; display: flex; align-items: center; gap: 12px;">
                            <div style="width: 32px; height: 32px; background-color: #8bc34a; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                    <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/>
                                </svg>
                            </div>
                            <span style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; font-size: 14px; font-weight: 400;">0821-3333-4444</span>
                        </div>
                        <div style="margin-bottom: 15px; display: flex; align-items: center; gap: 12px;">
                            <div style="width: 32px; height: 32px; background-color: #8bc34a; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                            </div>
                            <span style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; font-size: 14px; font-weight: 400;">lifia@gmail.com</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div style="width: 32px; height: 32px; background-color: #8bc34a; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                            </div>
                            <span style="font-family: 'Montserrat', sans-serif; color: #c8d8c8; font-size: 14px; font-weight: 400;">Malang, Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright Section -->
            <div style="border-top: 1px solid rgba(255,255,255,0.2); padding-top: 25px; text-align: center;">
                <p style="font-family: 'Montserrat', sans-serif; color: #9fb09f; font-size: 14px; font-weight: 400; margin: 0;">
                    © 2025 Hidup Sehat. Seluruh hak cipta dilindungi.
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Hover effects untuk social media icons
        document.querySelectorAll('footer a[style*="border-radius: 50%"]').forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                this.style.backgroundColor = 'rgba(255,255,255,0.3)';
            });
            icon.addEventListener('mouseleave', function() {
                this.style.backgroundColor = 'rgba(255,255,255,0.2)';
            });
        });

        // Hover effects untuk links
        document.querySelectorAll('footer ul a').forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.color = 'white';
            });
            link.addEventListener('mouseleave', function() {
                this.style.color = '#c8d8c8';
            });
        });
    </script>
</body>
</html>