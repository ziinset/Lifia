<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Lifia Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }

        .profil-container {
            display: flex;
            min-height: 100vh;
        }

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

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.02);
            }
        }

        @keyframes progressGlow {
            0%, 100% {
                box-shadow: 0 0 5px rgba(139, 172, 101, 0.3);
            }
            50% {
                box-shadow: 0 0 20px rgba(139, 172, 101, 0.6), 0 0 30px rgba(139, 172, 101, 0.4);
            }
        }

        @keyframes progressGrow {
            from {
                width: 0%;
                opacity: 0.7;
            }
            to {
                width: 53%;
                opacity: 1;
            }
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0.3);
                opacity: 0;
            }
            50% {
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes floatUpDown {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .header {
            margin-bottom: 30px;
            animation: slideInLeft 0.6s ease-out;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 2px solid #e0e0e0;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .user-avatar:hover {
            transform: scale(1.1);
        }

        .user-info h4 {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 2px;
        }

        .user-info span {
            font-size: 12px;
            color: #999;
        }

        .dashboard-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            align-items: stretch;
        }

        .left-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
            animation: slideInLeft 0.8s ease-out;
            height: fit-content;
        }

        .activity-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            display: flex;
            align-items: center;
            gap: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.6s ease-out;
            animation-delay: calc(var(--delay) * 0.1s);
            min-height: 140px;
        }

        .activity-card:nth-child(1) { --delay: 1; }
        .activity-card:nth-child(2) { --delay: 2; }
        .activity-card:nth-child(3) { --delay: 3; }
        .activity-card:nth-child(4) { --delay: 4; }

        .activity-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .activity-card.bmi {
            background: #B4D678;
            color: white;
        }

        .activity-card.favorite {
            background: #FFB3B3;
            color: white;
        }

        .activity-card.fitness {
            background: #97CFF0;
            color: white;
        }

        .activity-card.article {
            background: #FBD3A3;
            color: white;
        }

        .activity-card.bmi .activity-icon {
            width: 70px;
            height: 70px;
            background: #CFE8C7;
            border: none;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            position: relative;
        }

        .activity-card.bmi .activity-icon::before {
            content: '';
            position: absolute;
            width: 45px;
            height: 45px;
            background: #CFE8C7;
            border-radius: 10px;
            z-index: 0;
        }

        .activity-card.favorite .activity-icon {
            width: 70px;
            height: 70px;
            background: #F7D4D4;
            border: none;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            position: relative;
        }

        .activity-card.favorite .activity-icon::before {
            content: '';
            position: absolute;
            width: 45px;
            height: 45px;
            background: #F7D4D4;
            border-radius: 10px;
            z-index: 0;
        }

        .activity-card.fitness .activity-icon {
            width: 70px;
            height: 70px;
            background: #D0E4F5;
            border: none;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            position: relative;
        }

        .activity-card.fitness .activity-icon::before {
            content: '';
            position: absolute;
            width: 45px;
            height: 45px;
            background: #D0E4F5;
            border-radius: 10px;
            z-index: 0;
        }

        .activity-card.article .activity-icon {
            width: 70px;
            height: 70px;
            background: #F3E3CF;
            border: none;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            position: relative;
        }

        .activity-card.article .activity-icon::before {
            content: '';
            position: absolute;
            width: 45px;
            height: 45px;
            background: #F3E3CF;
            border-radius: 10px;
            z-index: 0;
        }

        .activity-icon img {
            width: 35px;
            height: 35px;
            position: relative;
            z-index: 1;
        }

        .activity-info {
            flex: 1;
        }

        .activity-info h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
            transition: transform 0.3s ease;
        }

        .activity-card:hover .activity-info h3 {
            transform: translateX(5px);
        }

        .activity-info .date {
            font-size: 13px;
            opacity: 0.9;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .activity-info .description {
            font-size: 15px;
            opacity: 0.95;
            font-weight: 500;
        }

        .arrow-container {
            width: 40px;
            height: 40px;
            background: white;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .activity-card:hover .arrow-container {
            transform: translateX(5px) scale(1.1);
            background: white;
            border-color: rgba(255,255,255,0.5);
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .arrow-icon {
            width: 20px;
            height: 20px;
            opacity: 0.6;
            transition: opacity 0.3s ease;
        }

        .activity-card:hover .arrow-icon {
            opacity: 0.8;
        }

        .right-section {
            display: flex;
            flex-direction: column;
            gap: 25px;
            animation: slideInRight 0.8s ease-out;
            height: 100%;
        }

        .calendar-widget {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .calendar-widget:hover {
            transform: translateY(-2px);
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .calendar-header h3 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .nav-arrow {
            background: none;
            border: none;
            font-size: 20px;
            color: #666;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-arrow:hover {
            background-color: #f0f0f0;
            transform: scale(1.2);
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            text-align: center;
        }

        .calendar-day-header {
            font-size: 12px;
            color: #666;
            font-weight: 600;
            padding: 8px 0;
        }

        .calendar-day {
            padding: 10px 0;
            font-size: 14px;
            color: #333;
            cursor: pointer;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .calendar-day:hover {
            background-color: #f0f0f0;
            transform: scale(1.1);
        }

        .calendar-day.active {
            background-color: #8BAC65;
            color: white;
            animation: pulse 2s infinite;
        }

        .progress-widget {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            flex: 1;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .progress-widget:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .progress-widget::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(139, 172, 101, 0.1) 0%, transparent 70%);
            animation: floatUpDown 6s ease-in-out infinite;
            z-index: 0;
        }

        .progress-widget > * {
            position: relative;
            z-index: 1;
        }

        .progress-widget h3 {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 25px;
            animation: bounceIn 1s ease-out 0.5s both;
        }

        .progress-bar {
            width: 100%;
            height: 14px;
            background-color: #e0e0e0;
            border-radius: 10px;
            margin-bottom: 12px;
            overflow: hidden;
            position: relative;
            animation: bounceIn 1s ease-out 0.7s both;
        }

        .progress-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 3s infinite;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #8BAC65 0%, #7A9A56 50%, #8BAC65 100%);
            width: 53%;
            border-radius: 10px;
            animation: progressGrow 2.5s ease-out, progressGlow 4s ease-in-out infinite 2.5s;
            position: relative;
            overflow: hidden;
        }

        .progress-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.6), transparent);
            animation: shimmer 2s infinite 2.5s;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }
            100% {
                left: 100%;
            }
        }

        .progress-text {
            font-size: 15px;
            color: #666;
            margin-bottom: 25px;
            animation: bounceIn 1s ease-out 0.9s both;
        }

        .progress-btn {
            background: linear-gradient(135deg, #8BAC65 0%, #7A9A56 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            margin-bottom: 25px;
            transition: all 0.3s ease;
            animation: bounceIn 1s ease-out 1.1s both;
            position: relative;
            overflow: hidden;
        }

        .progress-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.5s;
        }

        .progress-btn:hover {
            background: linear-gradient(135deg, #7A9A56 0%, #6A8A46 100%);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(139, 172, 101, 0.4);
        }

        .progress-btn:hover::before {
            left: 100%;
        }

        .illustration {
            width: 100%;
            flex: 1;
            background: white;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            transition: all 0.3s ease;
            min-height: 200px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border: 1px solid #f0f0f0;
            animation: bounceIn 1s ease-out 1.3s both;
            position: relative;
            overflow: hidden;
        }

        .illustration::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(139, 172, 101, 0.05) 0%, transparent 70%);
            animation: floatUpDown 8s ease-in-out infinite reverse;
        }

        .illustration:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 20px rgba(139, 172, 101, 0.2);
        }

        .illustration img {
            max-width: 85%;
            max-height: 85%;
            object-fit: contain;
            transition: transform 0.3s ease;
            animation: floatUpDown 5s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        .illustration:hover img {
            transform: scale(1.05);
            animation-play-state: paused;
        }

        @media (max-width: 1024px) {
            .main {
                margin-left: 14rem;
            }

            .dashboard-content {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .main {
                margin-left: 0;
                padding: 15px;
            }

            .activity-card {
                padding: 20px;
                gap: 15px;
            }

            .activity-icon {
                width: 60px;
                height: 60px;
            }

            .arrow-container {
                width: 35px;
                height: 35px;
            }

            .arrow-icon {
                width: 18px;
                height: 18px;
            }

            .activity-info h3 {
                font-size: 18px;
                font-weight: 700;
            }

            .calendar-grid {
                gap: 3px;
            }

            .calendar-day {
                padding: 8px 0;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="profil-container">
        <!-- Include Sidebar Component -->
        @include('components.sidebar')

        <!-- Main Content -->
        <main class="main">
            <!-- Include Header Component -->
            @include('components.header')

            <div class="main-content">
                <!-- Dashboard Content -->
                <div class="dashboard-content">
                <!-- Left Section -->
                <div class="left-section">
                    <!-- BMI Card -->
                    <div class="activity-card bmi">
                        <div class="activity-icon">
                            <img src="image/famicons_scale.png" alt="BMI Icon">
                        </div>
                        <div class="activity-info">
                            <h3>Menghitung BMI</h3>
                            <div class="date">12 Juli 2025, 10.30</div>
                            <div class="description">Tinggi: 170 cm, Berat: 60 kg, BMI: 20.8</div>
                        </div>
                        <div class="arrow-container">
                            <svg class="arrow-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.91003 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.91003 4.08" stroke="#666" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Favorite Card -->
                    <div class="activity-card favorite">
                        <div class="activity-icon">
                            <img src="image/solar_heart-bold.png" alt="Heart Icon">
                        </div>
                        <div class="activity-info">
                            <h3>Menyimpan Artikel Favorit</h3>
                            <div class="date">10 Juli 2025, 10.45</div>
                            <div class="description">Tips Pola Makan Sehat</div>
                        </div>
                        <div class="arrow-container">
                            <svg class="arrow-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.91003 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.91003 4.08" stroke="#666" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Fitness Card -->
                    <div class="activity-card fitness">
                        <div class="activity-icon">
                            <img src="image/famicons_barbell.png" alt="Fitness Icon">
                        </div>
                        <div class="activity-info">
                            <h3>Membuat FitPlan Baru</h3>
                            <div class="date">5 Juli 2025, 15.35</div>
                            <div class="description">Target: 55kg dalam 1 minggu</div>
                        </div>
                        <div class="arrow-container">
                            <svg class="arrow-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.91003 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.91003 4.08" stroke="#666" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Article Card -->
                    <div class="activity-card article">
                        <div class="activity-icon">
                            <img src="image/mingcute_paper-fill.png" alt="Article Icon">
                        </div>
                        <div class="activity-info">
                            <h3>Membaca Artikel</h3>
                            <div class="date">2 Juli 2025, 15.35</div>
                            <div class="description">Kategori: Kesehatan Mental</div>
                        </div>
                        <div class="arrow-container">
                            <svg class="arrow-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.91003 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.91003 4.08" stroke="#666" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="right-section">
                    <!-- Calendar Widget -->
                    <div class="calendar-widget">
                        <div class="calendar-header">
                            <button class="nav-arrow">‹</button>
                            <h3>Agustus</h3>
                            <button class="nav-arrow">›</button>
                        </div>
                        <div class="calendar-grid">
                            <div class="calendar-day-header">SUN</div>
                            <div class="calendar-day-header">MON</div>
                            <div class="calendar-day-header">TUE</div>
                            <div class="calendar-day-header">WED</div>
                            <div class="calendar-day-header">THU</div>
                            <div class="calendar-day-header">FRI</div>
                            <div class="calendar-day-header">SAT</div>
                            
                            <div class="calendar-day"></div>
                            <div class="calendar-day"></div>
                            <div class="calendar-day"></div>
                            <div class="calendar-day"></div>
                            <div class="calendar-day">1</div>
                            <div class="calendar-day">2</div>
                            <div class="calendar-day">3</div>
                            
                            <div class="calendar-day">4</div>
                            <div class="calendar-day">5</div>
                            <div class="calendar-day">6</div>
                            <div class="calendar-day">7</div>
                            <div class="calendar-day">8</div>
                            <div class="calendar-day">9</div>
                            <div class="calendar-day">10</div>
                            
                            <div class="calendar-day">11</div>
                            <div class="calendar-day">12</div>
                            <div class="calendar-day active">13</div>
                            <div class="calendar-day">14</div>
                            <div class="calendar-day">15</div>
                            <div class="calendar-day">16</div>
                            <div class="calendar-day">17</div>
                            
                            <div class="calendar-day">18</div>
                            <div class="calendar-day">19</div>
                            <div class="calendar-day">20</div>
                            <div class="calendar-day">21</div>
                            <div class="calendar-day">22</div>
                            <div class="calendar-day">23</div>
                            <div class="calendar-day">24</div>
                            
                            <div class="calendar-day">25</div>
                            <div class="calendar-day">26</div>
                            <div class="calendar-day">27</div>
                            <div class="calendar-day">28</div>
                            <div class="calendar-day">29</div>
                            <div class="calendar-day">30</div>
                            <div class="calendar-day">31</div>
                        </div>
                    </div>

                    <!-- Progress Widget -->
                    <div class="progress-widget">
                        <h3>Progres Kesehatan</h3>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                        </div>
                        <div class="progress-text">53% dari target</div>
                        <button class="progress-btn">Lihat Progres Mingguan</button>
                        <div class="illustration">
                            <img src="image/Rectangle 339.png" alt="Health Illustration">
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>