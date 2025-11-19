<!-- Main Header Banner -->
<div class="mealplan-header" style="background-image: url('{{ asset('images/mealbg.png') }}');">
    <a href="{{ url()->previous() }}" class="back-link">
        <svg class="back-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 18L9 12L15 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span>Keluar</span>
    </a>

    <div class="header-content">
        <h1 class="main-title">Meal Plan</h1>
        <p class="main-description">
            Dengan panduan ini, Anda akan mendapatkan menu harian yang dilengkapi informasi kalori, protein, karbohidrat, dan lemak untuk membantu mencapai target kesehatan dan kebugaran Anda.
        </p>
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

.mealplan-header {
    position: relative;
    width: 100%;
    min-height: 100vh;
    padding: 0 56px;
    border-radius: 0;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    font-family: 'Poppins', sans-serif;
    margin: 0;
}

.mealplan-header::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(120deg, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.4) 55%, rgba(0, 0, 0, 0.1) 100%);
    z-index: 0;
}

.back-link {
    position: absolute;
    top: 32px;
    left: 32px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 10px;
    color: #fff;
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
    z-index: 2;
    transition: opacity 0.2s ease;
}

.back-link:hover {
    opacity: 0.85;
}

.back-icon {
    width: 22px;
    height: 22px;
}

.header-content {
    position: relative;
    z-index: 1;
    max-width: 520px;
    color: #fff;
    margin: 0;
    padding: 0;
}

.main-title {
    margin: 0 0 16px 0;
    font-size: 48px;
    font-weight: 700;
    line-height: 1.1;
    color: #fff;
    text-shadow: 0 10px 24px rgba(0, 0, 0, 0.55);
}

.main-description {
    margin: 0;
    font-size: 20px;
    font-weight: 400;
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.95);
    max-width: 600px;
}

@media (max-width: 768px) {
    .mealplan-header {
        padding: 32px 28px 40px;
        min-height: 100vh;
    }

    .back-link {
        top: 22px;
        left: 22px;
    }

    .main-title {
        font-size: 32px;
    }

    .main-description {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .mealplan-header {
        padding: 28px 20px 32px;
        min-height: 100vh;
    }

    .back-link {
        top: 18px;
        left: 18px;
    }

    .main-title {
        font-size: 26px;
    }

    .main-description {
        font-size: 15px;
    }
}
</style>
