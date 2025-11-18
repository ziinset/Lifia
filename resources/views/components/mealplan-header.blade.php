<!-- Main Header Banner -->
<div class="mealplan-header" style="background-image: url('{{ asset('images/meal.svg') }}');">
    <div class="header-overlay"></div>

    <!-- Back Button removed -->

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

/* Back Button styles removed */

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

    /* Back button styles removed */
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

/* Back button animation removed */
</style>
