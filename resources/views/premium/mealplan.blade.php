<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Plan Premium - Lifia</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background: #f8fafc;
        }

        .mealplan-container {
            min-height: 100vh;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        body::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        body {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
    @stack('styles')
</head>

<body class="has-mealplan-header">
    <div class="mealplan-container">
        <!-- Header Banner Component -->
        @include('components.mealplan-header')

        <!-- Main Content -->
        <div class="mealplan-content">
            <div class="container">
                <!-- Day Navigation Tabs -->
                <div class="day-tabs">
                    <button class="day-tab active" data-day="1">Hari 1</button>
                    <button class="day-tab" data-day="2">Hari 2</button>
                    <button class="day-tab" data-day="3">Hari 3</button>
                    <button class="day-tab" data-day="4">Hari 4</button>
                    <button class="day-tab" data-day="5">Hari 5</button>
                    <button class="day-tab" data-day="6">Hari 6</button>
                    <button class="day-tab" data-day="7">Hari 7</button>
                </div>

                <!-- Meal Categories -->
                <div class="meal-categories">
                    <!-- Sarapan -->
                    <div class="meal-category-section">
                        <div class="category-badge sarapan">Sarapan</div>
                        <div class="meal-card">
                            <div class="meal-image">
                                <img src="{{ asset('images/oat.svg') }}" alt="Energy Oat Bowl">
                            </div>

                            <div class="meal-info">
                                <h4 class="meal-title">Energy Oat Bowl</h4>
                                <div class="meal-nutrition-inline">
                                    <span>350 kcal</span>
                                    <span>55g karbo, 12g protein, 6g lemak</span>
                                </div>
                                <p class="meal-description">Oat dimasak dengan susu rendah lemak, topping pisang dan
                                    chia seeds. Memberi energi stabil sepanjang pagi.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Snack Pagi -->
                    <div class="meal-category-section">
                        <div class="category-badge snack-pagi">Snack Pagi</div>
                        <div class="meal-card">
                            <div class="meal-image">
                                <img src="{{ asset('images/bery.svg') }}" alt="Berry Yogurt Boost">
                            </div>

                            <div class="meal-info">
                                <h4 class="meal-title">Berry Yogurt Boost</h4>
                                <div class="meal-nutrition-inline">
                                    <span>180 kcal</span>
                                    <span>18g karbo, 10g protein, 4g lemak</span>
                                </div>
                                <p class="meal-description">Greek yogurt rendah lemak dengan campuran stroberi,
                                    blueberry, sedikit madu. Segar dan tinggi antioksidan.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Makan Siang -->
                    <div class="meal-category-section">
                        <div class="category-badge makan-siang">Makan Siang</div>
                        <div class="meal-card">
                            <div class="meal-image">
                                <img src="{{ asset('images/ayam.svg') }}" alt="Grilled Chicken Power Plate">
                            </div>

                            <div class="meal-info">
                                <h4 class="meal-title">Grilled Chicken Power Plate</h4>
                                <div class="meal-nutrition-inline">
                                    <span>480 kcal</span>
                                    <span>60g karbo, 32g protein, 10g lemak</span>
                                </div>
                                <p class="meal-description">Dada ayam panggang dengan nasi merah & sayuran kukus. Cocok
                                    untuk tenaga sore hari.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Makan Malam -->
                    <div class="meal-category-section">
                        <div class="category-badge makan-malam">Makan Malam</div>
                        <div class="meal-card">
                            <div class="meal-image">
                                <img src="{{ asset('images/salmon.jpeg') }}" alt="Salmon & Quinoa Bowl">
                            </div>

                            <div class="meal-info">
                                <h4 class="meal-title">Salmon & Quinoa Bowl</h4>
                                <div class="meal-nutrition-inline">
                                    <span>420 kcal</span>
                                    <span>45g karbo, 30g protein, 12g lemak</span>
                                </div>
                                <p class="meal-description">Salmon panggang, quinoa, brokoli, dan bayam. Kaya omega-3
                                    untuk pemulihan otot.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .mealplan-container {
            min-height: 100vh;
            background: #f8fafc;
        }

        .mealplan-content {
            padding: 2rem 0;
        }

        .container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 2.5rem;
        }

        .day-tabs {
            display: flex;
            justify-content: center;
            gap: 55px;
            /* jarak antar tombol diperbesar lagi */
            margin: 0 auto 40px;
            max-width: 100%;
            width: 100%;
            overflow-x: auto;
            padding: 0 0 16px;
            scroll-padding-left: 2.5rem;
            scroll-padding-right: 2.5rem;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .day-tabs-container {
            display: flex;
            justify-content: center;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .day-tabs::-webkit-scrollbar {
            display: none;
        }

        .day-tab {
            padding: 10px 24px;
            /* sedikit lebih lebar */
            border: none;
            border-radius: 10px;
            /* radius diperkecil */
            background: #D9D9D9;
            /* warna background tombol non-aktif */
            color: rgba(78, 52, 46, 0.4);
            /* teks #4E342E dengan 40% opacity */
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            flex-shrink: 0;
            min-width: 100px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .day-tab:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .day-tab.active {
            background: #10B981;
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        @media (max-width: 768px) {
            .day-tabs {
                justify-content: flex-start;
                gap: 1rem;
                /* sedikit lebih renggang di mobile */
                padding-left: 0;
                /* biarkan mengikuti padding container */
                padding-right: 0;
                scroll-padding-left: 20px;
                /* sesuaikan dengan kebutuhan mobile */
                scroll-padding-right: 20px;
            }

            .day-tab {
                padding: 12px 24px;
                font-size: 15px;
                min-width: 90px;
            }
        }

        /* Meal Categories */
        .meal-categories {
            display: flex;
            flex-direction: column;
            gap: 50px;
        }

        .meal-category-section {
            margin-bottom: 16px;
        }

        /* Meal Card */
        .meal-card {
            display: flex;
            gap: 16px;
            background: white;
            border-radius: 12px;
            padding: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #E2E8F0;
        }

        .meal-image {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .meal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .meal-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .meal-title {
            font-size: 16px;
            font-weight: 600;
            color: #10B981;
            margin: 0;
        }

        .meal-nutrition-inline {
            display: flex;
            gap: 12px;
            font-size: 12px;
            color: #64748B;
            margin: 2px 0;
        }

        .meal-nutrition-inline span:first-child {
            font-weight: 600;
            color: #1E293B;
        }

        .meal-description {
            font-size: 13px;
            color: #475569;
            line-height: 1.5;
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 16px;
            }

            .meal-card {
                flex-direction: column;
            }

            .meal-image {
                width: 100%;
                height: 160px;
            }
        }

        margin-bottom: 3rem;
        overflow-x: auto;
        padding-bottom: 0.5rem;
        }

        .day-tab {
            background: #D9D9D9;
            /* konsisten dengan style non-aktif di atas */
            border: none;
            padding: 1rem 2.5rem;
            /* sedikit lebih lebar */
            border-radius: 10px;
            /* radius diperkecil */
            font-weight: 500;
            color: rgba(78, 52, 46, 0.4);
            /* teks #4E342E dengan 40% opacity */
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
        }

        .day-tab.active {
            background: linear-gradient(135deg, #8BAC65, #4F6832);
            color: white;
            box-shadow: 0 4px 12px rgba(139, 172, 101, 0.4);
        }

        .day-tab:hover:not(.active) {
            background: #cbd5e1;
            transform: translateY(-1px);
        }

        /* Meal Categories */
        .meal-categories {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            max-width: 100%;
        }

        .meal-category-section {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        /* Category Badge */
        .category-badge {
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            align-self: flex-start;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .category-badge.sarapan {
            background: linear-gradient(135deg, #8BAC65 0%, #4F6832 100%);
        }

        .category-badge.snack-pagi {
            background: linear-gradient(135deg, #8BAC65 0%, #4F6832 100%);
        }

        .category-badge.makan-siang {
            background: linear-gradient(135deg, #8BAC65 0%, #4F6832 100%);
        }

        .category-badge.makan-malam {
            background: linear-gradient(135deg, #8BAC65 0%, #4F6832 100%);
        }

        /* Meal Card Styles */
        .meal-card {
            display: flex;
            gap: 2rem;
            background: #f8fafc;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .meal-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border-color: #7BA05B;
        }

        .meal-image {
            flex-shrink: 0;
            width: 180px;
            height: 180px;
            border-radius: 16px;
            overflow: hidden;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .meal-image::before {
            content: '🍽️';
            font-size: 2rem;
            opacity: 0.3;
            position: absolute;
            z-index: 1;
        }

        .meal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .meal-card:hover .meal-image img {
            transform: scale(1.05);
        }

        .meal-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .meal-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #7BA05B;
            margin: 0 0 0.75rem 0;
            font-family: 'Poppins', sans-serif;
        }

        .meal-nutrition-inline {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            margin-bottom: 0.75rem;
        }

        .meal-nutrition-inline span:first-child {
            font-weight: 600;
            color: #1e293b;
            font-size: 1.1rem;
        }

        .meal-nutrition-inline span:last-child {
            font-size: 1rem;
            color: #64748b;
            font-weight: 500;
        }

        .meal-description {
            color: #64748b;
            line-height: 1.6;
            margin: 0;
            font-size: 1rem;
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 1.5rem;
            }

            .day-tabs {
                gap: 0.5rem;
            }

            .day-tab {
                padding: 0.75rem 1.25rem;
                font-size: 0.9rem;
            }

            .meal-category {
                padding: 1rem;
            }

            .meal-categories {
                max-width: 100%;
            }

            .meal-card {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }

            .meal-image {
                width: 100%;
                height: 200px;
                align-self: center;
                max-width: 300px;
            }

            .category-badge {
                align-self: center;
            }

            .meal-title {
                text-align: center;
                font-size: 1rem;
            }

            .meal-nutrition-inline {
                text-align: center;
            }

            .meal-description {
                text-align: center;
                font-size: 0.85rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Day tab functionality
            const dayTabs = document.querySelectorAll('.day-tab');

            dayTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    dayTabs.forEach(t => t.classList.remove('active'));

                    // Add active class to clicked tab
                    this.classList.add('active');

                    // Load meal data for selected day
                    const day = this.dataset.day;
                    loadMealPlan(day);
                });
            });

            function loadMealPlan(day) {
                // This would typically load data via AJAX
                console.log(`Loading meal plan for day ${day}`);

                // For now, we'll just update the content
                // In a real implementation, you'd fetch data from the server
            }
        });
    </script>
</body>

</html>
