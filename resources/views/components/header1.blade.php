<section class="hero-section">
    <div class="hero-container">
        <!-- Hero Content -->
        <section class="hero-content">
            <div class="hero-text">
                <h1>Tips & Trik <span>Gaya Hidup</span><br>Terbaik untuk Kamu</h1>
                <p>
                    Temukan berbagai inspirasi, panduan, 
                    dan solusi sederhana untuk menjalani 
                    hidup yang lebih sehat mulai dari 
                    pola makan, olahraga, skincare, 
                    hingga kesehatan mental.
                </p>
                <div class="hero-search-container">
                    <div class="hero-search-box">
                        <iconify-icon icon="iconamoon:search" class="hero-search-icon"></iconify-icon>
                        <input type="text" placeholder="Telusuri...">
                    </div>
                </div>
            </div>

            <div class="hero-image">
                <div class="hero-image-container">
                    <!-- Gambar model tanpa background shape -->
                    <img src="{{ asset('images/model.png') }}" alt="Model Sehat">
                </div>
            </div>
        </section>
    </div>
</section>

<style>
.hero-section * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.hero-section {
    font-family: 'Poppins', sans-serif;
    color: #333;
    background-color: #fff;
    overflow-x: hidden;
}

.hero-section .hero-container {
    background: linear-gradient(to bottom, #7BA05B 0%, #8BAC65 50%, #A8C373 100%);
    padding-top: 120px;
    padding-bottom: 1px;
    min-height: 100vh;
}

/* Hero Section */
.hero-section .hero-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    padding: 40px 60px 0;
    gap: 80px;
}

.hero-section .hero-text {
    flex: 1;
    max-width: 600px;
    padding-bottom: 100px;
}

.hero-section .hero-text h1 {
    font-size: 42px;
    font-weight: 800;
    color: #fff;
    line-height: 1.2;
    margin-bottom: 24px;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.hero-section .hero-text h1 span {
    color: #FFE066;
    text-shadow: 0 2px 8px rgba(255, 224, 102, 0.3);
}

.hero-section .hero-text p {
    font-family: 'Montserrat', sans-serif;
    font-size: 18px;
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.95);
    margin-bottom: 32px;
    max-width: 520px;
}

.hero-section .hero-search-container {
    position: relative;
    max-width: 520px;
    width: 100%;
}

.hero-section .hero-search-box {
    display: flex;
    align-items: center;
    background: linear-gradient(to right, #FFFFFF, #F9F9F9, #CFCFCF);
    border-radius: 40px;
    padding: 15px 20px;
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.hero-section .hero-search-box:focus-within {
    transform: translateY(-2px);
    box-shadow: 0 10px 32px rgba(0, 0, 0, 0.18);
}

.hero-section .hero-search-icon {
    margin-right: 12px;
    color: #4E342E;
    font-size: 25px;
}

.hero-section .hero-search-box input {
    border: none;
    outline: none;
    flex: 1;
    font-size: 15px;
    font-family: 'Poppins', sans-serif;
    color: #333;
    background: transparent;
}

.hero-section .hero-search-box input::placeholder {
    color: #999;
    font-weight: 400;
}

.hero-section .hero-image {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: flex-end;
}

.hero-section .hero-image-container img {
    width: 100%;
    max-width: 480px;   /* biar sedikit lebih rapih */
    height: auto;
    object-fit: contain;
    margin: 0;          /* hilangkan margin minus */
    display: block;     /* supaya tidak ada whitespace inline */
}

/* Responsive Design */
@media (max-width: 1024px) {
    .hero-section .hero-content {
        padding: 30px 40px 0;
        gap: 60px;
    }
    
    .hero-section .hero-text h1 {
        font-size: 38px;
    }
    
    .hero-section .hero-text p {
        font-size: 16px;
    }
    
    .hero-section .hero-image-container img {
        max-width: 400px;
    }
}

@media (max-width: 768px) {
    .hero-section .hero-container {
        padding-bottom: 40px;
    }
    
    .hero-section .hero-content {
        flex-direction: column;
        text-align: center;
        padding: 30px 20px 0;
        gap: 40px;
    }
    
    .hero-section .hero-text {
        padding-bottom: 0;
        margin: 0 auto;
    }
    
    .hero-section .hero-text h1 {
        font-size: 32px;
    }
    
    .hero-section .hero-text p {
        font-size: 16px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .hero-section .hero-search-container {
        margin: 0 auto;
    }
    
    .hero-section .hero-image-container img {
        width: 280px;
        margin-top: 0;
    }
}

@media (max-width: 480px) {
    .hero-section .hero-content {
        padding: 20px 15px 0;
    }
    
    .hero-section .hero-text h1 {
        font-size: 28px;
        margin-bottom: 16px;
    }
    
    .hero-section .hero-text p {
        font-size: 15px;
        margin-bottom: 24px;
    }
    
    .hero-section .hero-search-box {
        padding: 12px 16px;
    }
    
    .hero-section .hero-search-icon {
        font-size: 20px;
    }
    
    .hero-section .hero-search-box input {
        font-size: 14px;
    }
    
    .hero-section .hero-image-container img {
        width: 240px;
    }
}

/* Very small screens */
@media (max-width: 360px) {
    .hero-section .hero-text h1 {
        font-size: 24px;
    }
    
    .hero-section .hero-text p {
        font-size: 14px;
    }
    
    .hero-section .hero-image-container img {
        width: 200px;
    }
}
</style>