<!-- Main Header Banner -->
<div class="mealplan-header" style="background-image: url('{{ asset('images/Rectangle 597 (1).png') }}');">
    <div class="header-overlay"></div>
    
    <!-- Back Button -->
    <div class="back-button">
        <a href="{{ url()->previous() }}" class="back-link">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M19 12H5M12 19L5 12L12 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Keluar</span>
        </a>
    </div>

    <!-- Content positioned left -->
    <div class="header-content">
        <h1 class="main-title">Meal Plan</h1>
        <p class="main-description">
            Dengan panduan ini, Anda akan mendapatkan menu harian yang dilengkapi informasi kalori, protein, karbohidrat, dan lemak untuk membantu mencapai target kesehatan dan kebugaran Anda.
        </p>
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@800&family=Montserrat:wght@500&display=swap');

/* Main Header */
.mealplan-header {
    position: relative;
    height: 500px; /* Lebih panjang dari 400px */
    background-size: cover;
    background-position: center top; /* Fokus ke bagian atas gambar */
    background-repeat: no-repeat;
    background-attachment: scroll;
    border-radius: 16px;
    margin-bottom: 2rem;
    overflow: hidden;
    display: flex;
    align-items: center;
    /* Untuk kualitas HD */
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
}

.header-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    z-index: 1;
}

/* Content positioned to left */
.header-content {
    position: relative;
    z-index: 2;
    padding: 3rem;
    color: white;
    max-width: 600px;
}

/* Back Button */
.back-button {
    position: absolute;
    top: 2rem;
    left: 2rem;
    z-index: 3;
}

.back-link {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: white;
    text-decoration: none;
    font-weight: 500;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.1);
    padding: 0.75rem 1rem;
    border-radius: 25px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.back-link:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateX(-5px);
    color: white;
}

.back-link svg {
    transition: transform 0.3s ease;
}

.back-link:hover svg {
    transform: translateX(-3px);
}

/* Title and Description */
.main-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 800; /* Extra Bold */
    font-size: 3.5rem;
    margin-bottom: 1.5rem;
    color: white;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    line-height: 1.2;
}

.main-description {
    font-family: 'Montserrat', sans-serif;
    font-weight: 500; /* Medium */
    font-size: 1.125rem;
    line-height: 1.7;
    color: white;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    margin: 0;
}

/* Responsive Design */
@media (max-width: 768px) {
    .mealplan-header {
        height: 450px; /* Lebih panjang untuk tablet */
    }
    
    .header-content {
        padding: 2rem 1.5rem;
    }
    
    .back-button {
        top: 1.5rem;
        left: 1rem;
    }
    
    .back-link {
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
    }
    
    .main-title {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    
    .main-description {
        font-size: 1rem;
        line-height: 1.6;
    }
}

@media (max-width: 480px) {
    .mealplan-header {
        height: 400px; /* Tetap panjang untuk mobile */
    }
    
    .main-title {
        font-size: 2rem;
    }
    
    .main-description {
        font-size: 0.9rem;
    }
    
    .back-link span {
        display: none;
    }
    
    .back-link {
        width: 40px;
        height: 40px;
        padding: 0;
        justify-content: center;
        border-radius: 50%;
    }
}

/* Animation */
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

.header-text {
    animation: fadeInUp 0.8s ease-out;
}

.back-button {
    animation: fadeInUp 0.8s ease-out 0.2s both;
}
</style>
