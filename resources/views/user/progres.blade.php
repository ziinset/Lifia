<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Lifia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
            overflow-x: hidden;
        }

        /* Fade in animation for page load */
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

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Removed float animation */

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.02);
            }
        }

        /* New animation for progress bars starting from 0 */
        @keyframes progressLoad {
            from {
                width: 0%;
            }
        }

        .dashboard-container {
            display: flex;
            height: 100vh;
            background-color: #f9fafb;
        }

        /* Main Content - Consistent with profile */
        .main {
            flex: 1;
            margin-left: 16rem;
            padding: 0;
            overflow-y: auto;
            background: #FCFAF6;
            position: relative;
            height: 100vh;
        }

        .main-content {
            padding: 1.5rem;
            animation: fadeInUp 0.8s ease-out;
        }

        /* Welcome Header */
        .welcome-header {
            margin-bottom: 1.5rem;
        }

        .welcome-title {
            font-size: 1.875rem;
            font-weight: 600;
            color: #4E342E;
            margin-bottom: 1.5rem;
            font-family: 'Poppins', sans-serif;
            animation: slideInRight 0.9s ease-out 0.2s both;
        }

        /* Progress Cards - Updated with New Design */
        .progress-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .progress-card {
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 2rem;
            position: relative;
            overflow: hidden;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            animation: scaleIn 0.7s ease-out 0.4s both;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .progress-card:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .progress-card:nth-child(1) {
            animation-delay: 0.4s;
        }

        .progress-card:nth-child(2) {
            animation-delay: 0.6s;
        }

        /* Welcome Card - Green Gradient */
        .progress-card.welcome {
            background: linear-gradient(135deg, rgba(85, 107, 47, 0.75) 0%, rgba(154, 205, 50, 0.75) 100%);
            color: white;
        }

        .progress-card.welcome::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 120px;
            height: 120px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .progress-card.welcome::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: -30px;
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        .welcome-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .welcome-content p {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
        }

        .progress-btn {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 2rem;
            cursor: pointer;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            align-self: flex-start;
        }

        .progress-btn i {
            background: white;
            color: #556B2F;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
        }

        .progress-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .welcome-icon {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 250px;
            height: 220px;
            z-index: 3;
            /* Removed float animation and hover zoom from image */
        }

        .welcome-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Progress Card - Light Green */
        .progress-card.stats {
            background: linear-gradient(135deg, rgba(180, 214, 120, 0.59) 0%, rgba(123, 160, 91, 0.59) 100%);
            color: #2d4a14;
        }

        .progress-card.stats h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d4a14;
            margin-bottom: 0.5rem;
            font-family: 'Poppins', sans-serif;
        }

        .progress-card.stats p {
            color: #3a5a1b;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
        }

        .stats-grid {
            display: flex;
            justify-content: space-between;
            margin: 1.5rem 0;
            gap: 1rem;
        }

        .stat-item {
            text-align: center;
            flex: 1;
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            line-height: 1;
            color: #2d4a14;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.75rem;
            color: #3a5a1b;
            font-weight: 500;
        }

        .progress-bars {
            margin-top: 1.5rem;
        }

        .progress-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .progress-item:last-child {
            margin-bottom: 0;
        }

        .progress-icon {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .progress-icon.weight { background: #556B2F; }
        .progress-icon.bmi { background: #7BA05B; }
        .progress-icon.target { background: #9EC978; }

        .progress-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex: 1;
            width: 100%;
        }

        .progress-label {
            font-size: 0.875rem;
            color: #3a5a1b;
            font-weight: 500;
            min-width: 80px;
        }

        .progress-bar {
            width: 120px;
            height: 10px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 5px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .progress-fill {
            height: 100%;
            border-radius: 5px;
            width: 0%; /* Start from 0 */
            transition: width 2s ease-out;
        }

        .progress-fill[data-width="85%"] {
            background: #556B2F;
        }

        .progress-fill[data-width="70%"] {
            background: #7BA05B;
        }

        .progress-fill[data-width="72%"] {
            background: #9EC978;
        }

        .progress-value {
            font-size: 0.875rem;
            font-weight: 600;
            color: #2d4a14;
            min-width: 50px;
            text-align: right;
            flex-shrink: 0;
        }

        /* Activities Section */
        .activities-section {
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #4E342E;
            margin-bottom: 1.5rem;
            font-family: 'Poppins', sans-serif;
            animation: slideInRight 1s ease-out 0.6s both;
        }

        .activity-cards {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .bottom-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .activity-card {
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            padding: 1.5rem;
            border: 1px solid #f3f4f6;
            position: relative;
            min-height: 140px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            animation: fadeInUp 0.7s ease-out both;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .activity-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .activity-cards .activity-card:nth-child(1) {
            animation-delay: 0.8s;
        }

        .bottom-cards .activity-card:nth-child(1) {
            animation-delay: 1s;
        }

        .bottom-cards .activity-card:nth-child(2) {
            animation-delay: 1.2s;
        }

        /* Updated Activity Card Colors */
        .activity-card.exercise {
            background: #EFE383;
            border-left: 4px solid #E6D84A;
        }

        .activity-card.nutrition {
            background: #A4BF7A;
            border-left: 4px solid #8BAC65;
            min-height: 180px;
        }

        .activity-card.sleep {
            background: #A87C72;
            border-left: 4px solid #8B6B61;
            min-height: 140px;
        }

        .activity-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
            font-family: 'Poppins', sans-serif;
        }

        .activity-card p {
            color: #4b5563;
            margin-bottom: 1.25rem;
            font-size: 0.95rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
        }

        /* Khusus untuk teks di card nutrisi dan tidur - warna putih */
        .activity-card.nutrition h3,
        .activity-card.sleep h3 {
            color: white !important;
        }

        .activity-card.nutrition p,
        .activity-card.sleep p {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        .activity-btn {
            background: white;
            color: #4E342E;
            font-weight: 600;
            padding: 0.625rem 1.25rem;
            border-radius: 1.25rem;
            border: none;
            cursor: pointer;
            font-size: 0.875rem;
            transition: all 0.2s;
            align-self: flex-start;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            font-family: 'Poppins', sans-serif;
        }

        .activity-btn:hover {
            background: #f8f9fa;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .activity-illustration {
            position: absolute;
            right: 1rem;
            top: 0.5rem;
            width: 350px;
            height: 160px;
            z-index: 2;
        }

        /* Khusus untuk gambar olahraga - dipindah lebih ke kiri */
        .activity-card.exercise .activity-illustration {
            right: 3rem;
            top: 0.5rem;
            width: 350px;
            height: 160px;
        }

        /* Khusus untuk gambar nutrisi - ukuran sedang */
        .activity-card.nutrition .activity-illustration {
            right: 0rem;
            top: 50%;
            transform: translateY(-50%);
            width: 250px;
            height: 170px;
        }

        /* Khusus untuk gambar tidur - dipindah ke kiri */
        .activity-card.sleep .activity-illustration {
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            width: 200px;
            height: 200px;
        }

        .activity-illustration img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Progress Table - Updated to Oval Cards */
        .progress-table {
            background: transparent;
            border-radius: 0;
            box-shadow: none;
            padding: 0;
            border: none;
            animation: fadeInUp 0.7s ease-out 1.4s both;
        }

        .table-header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: none;
        }

        .progress-table h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #4E342E;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .table-header {
            background: #E5E7EB;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            margin-bottom: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            display: grid;
            grid-template-columns: 2fr 1.2fr 1.5fr 1.3fr;
            gap: 1.5rem;
            align-items: center;
            animation: scaleIn 0.6s ease-out 1.6s both;
            transition: all 0.3s ease;
        }

        .table-header:hover {
            transform: scale(1.01);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
        }

        .table-header div {
            text-align: center;
            font-weight: 600;
            color: #374151;
            font-size: 0.875rem;
        }

        .oval-cards {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .oval-card {
            display: grid;
            grid-template-columns: 2fr 1.2fr 1.5fr 1.3fr;
            gap: 1.5rem;
            padding: 1.25rem 2rem;
            border-radius: 50px;
            align-items: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: 'Poppins', sans-serif;
            animation: slideInRight 0.6s ease-out both;
            cursor: pointer;
        }

        .oval-card:hover {
            transform: translateY(-3px) scale(1.01);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .oval-card:nth-child(1) {
            animation-delay: 1.8s;
        }

        .oval-card:nth-child(2) {
            animation-delay: 2s;
        }

        .oval-card:nth-child(3) {
            animation-delay: 2.2s;
        }

        /* Oval card colors */
        .oval-card.exercise {
            background: rgba(255, 152, 0, 0.46);
        }

        .oval-card.nutrition {
            background: rgba(255, 51, 0, 0.38);
        }

        .oval-card.sleep {
            background: #B4D678;
        }

        .oval-activity-name {
            font-weight: 600;
            font-size: 1rem;
            color: #2c3e50;
        }

        .oval-target {
            font-weight: 500;
            font-size: 0.95rem;
            color: #2c3e50;
        }

        .oval-progress {
            background: white;
            padding: 0.5rem 0.75rem;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.875rem;
            color: #2c3e50;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: inline-block;
            width: auto;
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }

        .oval-progress:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .oval-status {
            font-weight: 600;
            font-size: 0.875rem;
            color: #2c3e50;
        }

        /* Remove old table styles */
        .table-row {
            display: none;
        }

        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
        }
        
        .circle-1 { width: 60px; height: 60px; top: -20px; right: 100px; }
        .circle-2 { width: 40px; height: 40px; bottom: -10px; left: 80px; }
        .circle-3 { width: 30px; height: 30px; top: 40px; right: 40px; }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .main { margin-left: 14rem; }
        }

        @media (max-width: 768px) {
            .main { margin-left: 0; }
            .progress-cards,
            .bottom-cards {
                grid-template-columns: 1fr;
            }
            
            .table-header,
            .table-row {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }

            .progress-card {
                min-height: 180px;
                padding: 1.5rem;
            }
            
            .character-illustration {
                width: 60px;
                height: 60px;
                right: 1rem;
                top: 1rem;
            }
            
            .stats-grid {
                gap: 0.5rem;
            }
            
            .stat-value {
                font-size: 1.5rem;
            }
            
            .progress-bar {
                width: 80px;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 1rem;
            }
            
            .progress-card {
                padding: 1.25rem;
            }
            
            .welcome-content h3,
            .progress-card.stats h3 {
                font-size: 1.25rem;
            }
            
            .stat-value {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <!-- Include Sidebar Component -->
    @include('components.sidebar')

    <!-- Main Content -->
    <main class="main">
        <!-- Include Header Component -->
        @include('components.header')
        
        <div class="main-content">
            <!-- Welcome Header -->
            <div class="welcome-header">
                <h1 class="welcome-title">Halo, {{ Auth::user()->nama_lengkap ?? 'User' }}!</h1>
                
                <div class="progress-cards">
                    <!-- Welcome Card -->
                    <div class="progress-card welcome">
                        <div class="welcome-content">
                            <h3>Selamat datang...</h3>
                            <p>Semangat terus jaga<br>kesehatanmu! 💪</p>
                            <button class="progress-btn">
                                <i class="fas fa-plus"></i>
                                Tambah Progress
                            </button>
                        </div>
                        <div class="welcome-icon">
                            <img src="image/Rectangle 397.png" alt="Character" />
                        </div>
                    </div>
                    
                    <!-- Progress Card -->
                    <div class="progress-card stats">
                        <div>
                            <h3>Progress Terbaru</h3>
                            <p>Pantau perkembangan kesehatanmu setiap hari</p>
                            
                            <div class="progress-bars">
                                <div class="progress-item">
                                    <div class="progress-icon weight"></div>
                                    <div class="progress-info">
                                        <span class="progress-label">Berat Badan</span>
                                        <div class="progress-bar">
                                            <div class="progress-fill" data-width="85%"></div>
                                        </div>
                                        <span class="progress-value">65 kg</span>
                                    </div>
                                </div>
                                
                                <div class="progress-item">
                                    <div class="progress-icon bmi"></div>
                                    <div class="progress-info">
                                        <span class="progress-label">BMI</span>
                                        <div class="progress-bar">
                                            <div class="progress-fill" data-width="70%"></div>
                                        </div>
                                        <span class="progress-value">21.5</span>
                                    </div>
                                </div>
                                
                                <div class="progress-item">
                                    <div class="progress-icon target"></div>
                                    <div class="progress-info">
                                        <span class="progress-label">Target</span>
                                        <div class="progress-bar">
                                            <div class="progress-fill" data-width="72%"></div>
                                        </div>
                                        <span class="progress-value">72%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activities Section -->
            <div class="activities-section">
                <h2 class="section-title">Rencana Hari Ini</h2>
                
                <div class="activity-cards">
                    <div class="activity-card exercise">
                        <div>
                            <h3>Olahraga</h3>
                            <p>Cardio 30 menit</p>
                            <button class="activity-btn">Mulai</button>
                        </div>
                        <div class="activity-illustration">
                            <img src="image/Rectangle 406.png" alt="Exercise Illustration" />
                        </div>
                    </div>
                </div>

                <div class="bottom-cards">
                    <div class="activity-card nutrition">
                        <div>
                            <h3>Nutrisi</h3>
                            <p>Makan sehat 1000 kalori</p>
                            <button class="activity-btn">Mulai</button>
                        </div>
                        <div class="activity-illustration">
                            <img src="image/Rectangle 411.png" alt="Nutrition Illustration" />
                        </div>
                    </div>
                    
                    <div class="activity-card sleep">
                        <div>
                            <h3>Tidur</h3>
                            <p>Target 8 jam</p>
                            <button class="activity-btn">Mulai</button>
                        </div>
                        <div class="activity-illustration">
                            <img src="image/Rectangle 412.png" alt="Sleep Illustration" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progress Table -->
            <div class="progress-table">
                <div class="table-header-section">
                    <h2>Progress Aktivitas</h2>
                </div>
                
                <div class="table-header">
                    <div>Aktivitas</div>
                    <div>Target</div>
                    <div>Progress Sekarang</div>
                    <div>Status</div>
                </div>
                
                <div class="oval-cards">
                    <div class="oval-card exercise">
                        <div class="oval-activity-name">Olahraga</div>
                        <div class="oval-target">30 menit</div>
                        <div class="oval-progress">20 menit</div>
                        <div class="oval-status">Sedang Berjalan</div>
                    </div>
                    
                    <div class="oval-card nutrition">
                        <div class="oval-activity-name">Nutrisi</div>
                        <div class="oval-target">1200 kal</div>
                        <div class="oval-progress">800 kal</div>
                        <div class="oval-status">Butuh Perhatian</div>
                    </div>
                    
                    <div class="oval-card sleep">
                        <div class="oval-activity-name">Tidur</div>
                        <div class="oval-target">8 jam</div>
                        <div class="oval-progress">7 jam</div>
                        <div class="oval-status">Hampir Tercapai</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate progress bars from 0 to target width
        setTimeout(() => {
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const width = bar.getAttribute('data-width');
                bar.style.width = width;
            });
        }, 1000); // Start animation after 1 second

        // Activity buttons interaction
        const activityBtns = document.querySelectorAll('.activity-btn');
        activityBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check"></i> Dimulai';
                this.style.background = '#3E4D21';
                this.style.color = 'white';
                this.style.cursor = 'default';
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.style.background = 'white';
                    this.style.color = '#4E342E';
                    this.style.cursor = 'pointer';
                }, 3000);
            });
        });

        // Progress button interaction
        const progressBtn = document.querySelector('.progress-btn');
        if (progressBtn) {
            progressBtn.addEventListener('click', function() {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check"></i> Ditambahkan';
                this.style.background = 'rgba(255, 255, 255, 0.3)';
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.style.background = 'rgba(255, 255, 255, 0.15)';
                }, 2000);
            });
        }
    });
</script>

</body>
</html>