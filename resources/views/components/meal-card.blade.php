@props([
    'title' => '',
    'calories' => '',
    'carbs' => '',
    'protein' => '',
    'fat' => '',
    'description' => '',
    'image' => 'meal-placeholder.jpg'
])

<div class="meal-card">
    <div class="meal-image">
        <img src="{{ asset('images/meals/' . $image) }}" alt="{{ $title }}">
    </div>
    
    <div class="meal-info">
        <h4 class="meal-title">{{ $title }}</h4>
        
        <div class="meal-nutrition">
            <span class="nutrition-item calories">{{ $calories }}</span>
            <span class="nutrition-item carbs">{{ $carbs }}</span>
            <span class="nutrition-item protein">{{ $protein }}</span>
            <span class="nutrition-item fat">{{ $fat }}</span>
        </div>
        
        <p class="meal-description">{{ $description }}</p>
    </div>
</div>

<style>
.meal-card {
    display: flex;
    gap: 1.5rem;
    background: #f8fafc;
    border-radius: 16px;
    padding: 1.5rem;
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
    width: 120px;
    height: 120px;
    border-radius: 12px;
    overflow: hidden;
    background: #e2e8f0;
}

.meal-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
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
    font-size: 1.25rem;
    font-weight: 600;
    color: #7BA05B;
    margin: 0;
    font-family: 'Poppins', sans-serif;
}

.meal-nutrition {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
}

.nutrition-item {
    background: white;
    padding: 0.375rem 0.75rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 500;
    border: 1px solid #e2e8f0;
    color: #64748b;
}

.nutrition-item.calories {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
    border-color: #fbbf24;
}

.nutrition-item.carbs {
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
    border-color: #3b82f6;
}

.nutrition-item.protein {
    background: linear-gradient(135deg, #fce7f3, #fbcfe8);
    color: #be185d;
    border-color: #ec4899;
}

.nutrition-item.fat {
    background: linear-gradient(135deg, #ecfdf5, #d1fae5);
    color: #065f46;
    border-color: #10b981;
}

.meal-description {
    color: #64748b;
    line-height: 1.6;
    margin: 0;
    font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 768px) {
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
    
    .meal-nutrition {
        justify-content: center;
    }
    
    .meal-title {
        text-align: center;
        font-size: 1.125rem;
    }
    
    .meal-description {
        text-align: center;
    }
}

@media (max-width: 480px) {
    .meal-card {
        padding: 0.75rem;
    }
    
    .meal-image {
        height: 150px;
    }
    
    .nutrition-item {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
    }
    
    .meal-nutrition {
        gap: 0.5rem;
    }
}

/* Animation */
@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.meal-card {
    animation: slideInUp 0.5s ease-out;
}
</style>
