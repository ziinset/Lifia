@extends('layouts.app')

@section('title', 'Meal Plan Premium - Lifia')

@section('content')
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
                            <img src="{{ asset('images/meals/oat-bowl.jpg') }}" alt="Energy Oat Bowl">
                        </div>
                        
                        <div class="meal-info">
                            <h4 class="meal-title">Energy Oat Bowl</h4>
                            <div class="meal-nutrition-inline">
                                <span>350 kcal</span>
                                <span>55g karbo, 12g protein, 6g lemak</span>
                            </div>
                            <p class="meal-description">Oat dimasak dengan susu rendah lemak, topping pisang dan chia seeds. Memberi energi stabil sepanjang pagi.</p>
                        </div>
                    </div>
                </div>

                <!-- Snack Pagi -->
                <div class="meal-category-section">
                    <div class="category-badge snack-pagi">Snack Pagi</div>
                    <div class="meal-card">
                        <div class="meal-image">
                            <img src="{{ asset('images/meals/yogurt-berry.jpg') }}" alt="Berry Yogurt Boost">
                        </div>
                        
                        <div class="meal-info">
                            <h4 class="meal-title">Berry Yogurt Boost</h4>
                            <div class="meal-nutrition-inline">
                                <span>180 kcal</span>
                                <span>18g karbo, 10g protein, 4g lemak</span>
                            </div>
                            <p class="meal-description">Greek yogurt rendah lemak dengan campuran stroberi, blueberry, sedikit madu. Segar dan tinggi antioksidan.</p>
                        </div>
                    </div>
                </div>

                <!-- Makan Siang -->
                <div class="meal-category-section">
                    <div class="category-badge makan-siang">Makan Siang</div>
                    <div class="meal-card">
                        <div class="meal-image">
                            <img src="{{ asset('images/meals/chicken-salad.jpg') }}" alt="Grilled Chicken Power Plate">
                        </div>
                        
                        <div class="meal-info">
                            <h4 class="meal-title">Grilled Chicken Power Plate</h4>
                            <div class="meal-nutrition-inline">
                                <span>480 kcal</span>
                                <span>60g karbo, 32g protein, 10g lemak</span>
                            </div>
                            <p class="meal-description">Dada ayam panggang dengan nasi merah & sayuran kukus. Cocok untuk tenaga sore hari.</p>
                        </div>
                    </div>
                </div>

                <!-- Makan Malam -->
                <div class="meal-category-section">
                    <div class="category-badge makan-malam">Makan Malam</div>
                    <div class="meal-card">
                        <div class="meal-image">
                            <img src="{{ asset('images/meals/salmon-bowl.jpg') }}" alt="Salmon & Quinoa Bowl">
                        </div>
                        
                        <div class="meal-info">
                            <h4 class="meal-title">Salmon & Quinoa Bowl</h4>
                            <div class="meal-nutrition-inline">
                                <span>420 kcal</span>
                                <span>45g karbo, 30g protein, 12g lemak</span>
                            </div>
                            <p class="meal-description">Salmon panggang, quinoa, brokoli, dan bayam. Kaya omega-3 untuk pemulihan otot.</p>
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
    max-width: 100%;
    margin: 0 auto;
    padding: 0 3rem;
}

/* Day Navigation Tabs */
.day-tabs {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
    overflow-x: auto;
    padding-bottom: 0.5rem;
}

.day-tab {
    background: #e2e8f0;
    border: none;
    padding: 1rem 2rem;
    border-radius: 25px;
    font-weight: 500;
    color: #64748b;
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
@endsection
