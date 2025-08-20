<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIFIA - Gaya Hidup Sehat & Seimbang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            color: #2d3748;
            line-height: 1.6;
            padding: 0;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        /* Header Styles */
        .header {
            text-align: center;
            margin-bottom: 2.5rem;
            padding-top: 1.5rem;
        }
        
        .header h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #2b6cb0;
            margin-bottom: 0.5rem;
            letter-spacing: 1px;
        }
        
        .header p {
            font-size: 1.2rem;
            color: #4a5568;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
        }
        
        /* Divider */
        .divider {
            height: 2px;
            background: linear-gradient(to right, transparent, #cbd5e0, transparent);
            margin: 2rem 0;
            width: 100%;
        }
        
        /* Content Sections */
        .content-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .left-column, .right-column {
            background: white;
            border-radius: 12px;
            padding: 1.8rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        
        .section-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #2b6cb0;
            margin-bottom: 1.2rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e2e8f0;
        }
        
        .feature-list {
            list-style: none;
        }
        
        .feature-list li {
            padding: 0.8rem 0;
            border-bottom: 1px solid #edf2f7;
            display: flex;
            align-items: center;
            font-weight: 500;
        }
        
        .feature-list li:last-child {
            border-bottom: none;
        }
        
        .feature-list li::before {
            content: "•";
            color: #4299e1;
            font-weight: bold;
            display: inline-block;
            width: 1.2em;
            margin-right: 0.5rem;
            font-size: 1.2rem;
        }
        
        .highlight-box {
            background: linear-gradient(135deg, #ebf4ff 0%, #e6fffa 100%);
            border-left: 4px solid #4299e1;
            padding: 1.2rem;
            border-radius: 8px;
            margin-top: 1.5rem;
        }
        
        .highlight-box p {
            margin: 0.5rem 0;
            font-weight: 500;
        }
        
        .stats-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.8rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            text-align: center;
        }
        
        .stat-number {
            font-size: 2.2rem;
            font-weight: 700;
            color: #2b6cb0;
            margin-bottom: 0.5rem;
        }
        
        .stat-desc {
            font-size: 1rem;
            color: #4a5568;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            margin-top: 3rem;
            padding: 1.5rem;
            color: #718096;
            font-size: 0.9rem;
            border-top: 1px solid #e2e8f0;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .content-section, .stats-section {
                grid-template-columns: 1fr;
            }
            
            .header h1 {
                font-size: 2.2rem;
            }
            
            .header p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>LIFIA</h1>
            <p>Gaya hidup Sehat & Seimbang untuk Masa Depan lebih Baik</p>
            <p>Kami hadir untuk menginspirasi dan memandumu menjalani hidup yang lebih sehat secara fisik, mental, dan emocional demi masa depan yang lebih berkualitas.</p>
        </header>
        
        <div class="divider"></div>
        
        <div class="content-section">
            <div class="left-column">
                <h2 class="section-title">Pola Makan Sehat</h2>
                <p><strong>Olahraga & Aktivitas Fisik</strong></p>
                
                <ul class="feature-list">
                    <li>Kesehatan Mental</li>
                    <li>Perawatan Diri</li>
                    <li>Cek BMI</li>
                </ul>
            </div>
            
            <div class="right-column">
                <h2 class="section-title">Tips Hidup Seimbang</h2>
                <p><strong>60+ Artikel Self Care</strong></p>
                
                <div class="highlight-box">
                    <p>2.500+ Pembaca setiap Bulan</p>
                    <p><strong>1.800+ Pengguna Mengakses Kalkulator BMI</strong></p>
                </div>
            </div>
        </div>
        
        <div class="stats-section">
            <div class="stat-card">
                <div class="stat-number">2.500+</div>
                <div class="stat-desc">Pembaca setiap Bulan</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">1.800+</div>
                <div class="stat-desc">Pengguna Mengakses Kalkulator BMI</div>
            </div>
        </div>
    </div>
    
    <footer class="footer">
        &copy; 2025 LIFIA - Gaya Hidup Sehat & Seimbang
    </footer>
</body>
</html>