<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Lifia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tambah Google Fonts Poppins -->
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
        }

        .profil-container {
            display: flex;
            height: 100vh;
            background-color: #f9fafb;
        }

        /* Sidebar */
        .sidebar {
            width: 16rem;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
        }
        
        .sidebar .brand {
            padding: 1.5rem 1.5rem 1rem 1.5rem;
            border-bottom: 1px solid #f3f4f6;
            display: flex;
            justify-content: center; 
            align-items: center;     
        }

        .sidebar .brand img.logo {
            width: 90px;  
            height: auto;  
            display: block;
        }
        
        .sidebar nav {
            padding: 1.5rem;
            flex: 1;
            position: relative;
        }

        .sidebar nav a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.25rem;
            margin-bottom: 0.75rem;
            border-radius: 12px;
            color: #6b7280;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid transparent;
        }

        .sidebar nav a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(107, 114, 128, 0.1), transparent);
            opacity: 0;
            transition: all 0.6s ease;
            z-index: -1;
        }

        .sidebar nav a::after {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 3px;
            height: 0;
            background: linear-gradient(to bottom, #799549, #b2d476ff);
            border-radius: 0 3px 3px 0;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            transform: translateY(-50%);
            opacity: 0;
        }

        .sidebar nav a.active {
            background: linear-gradient(90deg, 
                #799549 0%, 
                #b2d476ff 50%, 
                #edf8eeff 100%);
            color: white;
            font-weight: 600;
            box-shadow: 0 8px 25px rgba(121, 149, 73, 0.3),
                        0 3px 10px rgba(121, 149, 73, 0.2);
            transform: translateY(-1px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            margin-left: 0;
            margin-right: 0;
            padding-left: 1.25rem;
            padding-right: 1.25rem;
        }

        .sidebar nav a.active::before {
            opacity: 0;
            background: transparent;
        }

        .sidebar nav a.active::after {
            height: 100%;
            opacity: 1;
            background: rgba(255, 255, 255, 0.3);
            width: 2px;
        }

        .sidebar nav a:hover:not(.active) {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            color: #374151;
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08),
                        0 3px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(107, 114, 128, 0.1);
        }

        .sidebar nav a:hover:not(.active)::before {
            opacity: 1;
            left: 0;
        }

        .sidebar nav a:hover:not(.active)::after {
            height: 60%;
            opacity: 1;
            background: linear-gradient(to bottom, #799549, #b2d476ff);
        }

        .sidebar nav a i {
            width: 18px;
            height: 18px;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
        }

        .sidebar nav a.active i {
            transform: scale(1.1);
            filter: drop-shadow(0 1px 3px rgba(0, 0, 0, 0.2));
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .sidebar nav a:hover:not(.active) i {
            transform: scale(1.15) rotate(5deg);
            color: #799549;
        }

        .sidebar nav a span {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            letter-spacing: 0.025em;
        }

        .sidebar nav a:hover:not(.active) span {
            transform: translateX(3px);
        }

        .sidebar nav a.active span {
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* Tambahan efek untuk interaksi yang lebih smooth */
        .sidebar nav a:active:not(.active) {
            transform: translateY(0) scale(0.98);
            transition: transform 0.1s ease;
        }

        /* Efek glow pada hover */
        .sidebar nav a:hover:not(.active) {
            position: relative;
        }

        .sidebar nav a:hover:not(.active):before {
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .sidebar nav {
                padding: 1rem;
            }
            
            .sidebar nav a {
                padding: 0.875rem 1rem;
                margin-bottom: 0.5rem;
                border-radius: 10px;
            }
            
            .sidebar nav a i {
                width: 16px;
                height: 16px;
                font-size: 14px;
            }
        }

        /* Main Content */
        .main {
            flex: 1;
            padding: 1.5rem;
            overflow-y: auto;
            background: #FCFAF6;
            position: relative;
        }

        .topbar-wrapper {
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            background: white;
            padding: 0.75rem 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            z-index: 100;
            margin: 0 -1.5rem 1.5rem -1.5rem; 
        }
        
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 100%;
        }
        
        .search-container {
            flex: 1;
            max-width: 400px;
        }
        
        .search-box {
            position: relative;
            width: 100%;
        }
        
        .search-box input {
            width: 100%;
            padding: 0.6rem 2.5rem 0.6rem 1rem;
            border-radius: 50px;
            border: 1px solid #d1d5db;
            background: #f9fafb;
            outline: none;
            font-size: 0.9rem;
            transition: all 0.2s;
        }
        
        .search-box input:focus {
            border-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
            background: white;
        }
        
        .search-box button {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .notification-btn {
            background: none;
            border: none;
            color: #6b7280;
            cursor: pointer;
            font-size: 1.1rem;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.2s;
        }
        
        .notification-btn:hover {
            background: #f3f4f6;
            color: #374151;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.2s;
        }
        
        .user-info:hover {
            background: #f9fafb;
        }
        
        .user-info img {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            border: 2px solid #e5e7eb;
            object-fit: cover;
        }
        
        .user-details h4 {
            font-size: 0.875rem;
            font-weight: 600;
            color: #4E342E;
            margin-bottom: 1px;
        }
        
        .user-details p {
            font-size: 0.75rem;
            color: #6b7280;
        }

        /* Profile Header */
        .profil-header {
            position: relative;
            background: linear-gradient(135deg, #a7f3d0 0%, #fef3c7 50%, #fed7aa 100%);
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
            padding: 2rem;
            overflow: hidden;
            height: 180px;
        }
        
        /* Decorative elements */
        .profil-header::before {
            content: '';
            position: absolute;
            top: 1.5rem;
            right: 5rem;
            width: 8px;
            height: 8px;
            background: rgba(255,255,255,0.7);
            border-radius: 50%;
            box-shadow: 
                1.5rem 0.5rem 0 -1px rgba(255,255,255,0.5),
                -1rem 2rem 0 -2px rgba(255,255,255,0.4),
                3rem -0.5rem 0 -2px rgba(255,255,255,0.6),
                0.5rem 1.5rem 0 -3px rgba(255,255,255,0.3);
        }
        
        /* Tombol Edit di Pojok Kanan Atas Header */
        .header-edit-btn {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 2rem;
            padding: 0.6rem 0.8rem;
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: #4b5563;
            font-weight: 500;
            z-index: 20;
        }
        
        .header-edit-btn:hover {
            background: #f9fafb;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .profile-content-wrapper {
            display: flex;
            align-items: flex-end;
            margin-top: -70px;
            position: relative;
            z-index: 10;
        }
        
        .avatar-container {
            position: relative;
            margin-right: 1.5rem;
        }
        
        .avatar-container img {
            width: 11rem;
            height: 11rem;
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            object-fit: cover;
            background: #e5e7eb;
        }
        
        .edit-avatar-btn {
            position: absolute;
            right: 0;
            bottom: 0;
            background: #4A3F35;
            border: 2px solid #fff;
            border-radius: 50%;
            padding: 0.5rem;
            cursor: pointer;
            color: white;
            font-size: 0.8rem;
            transition: all 0.2s;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .edit-avatar-btn:hover {
            background: #1f2937;
            transform: scale(1.05);
        }
        
        .profile-info {
            flex: 1;
            padding-bottom: 1rem;
        }
        
        .profile-info h2 {
            font-size: 1.75rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .profile-email {
            flex-basis: 100%; /* paksa email ambil baris penuh */
        }
        
        .profile-meta {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 0.5rem;
            flex-wrap: wrap;
        }
        
        .profile-meta .dot {
            width: 4px;
            height: 4px;
            background: #9ca3af;
            border-radius: 50%;
        }
        
        .profile-meta .premium {
            color: #8BAC65;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        .profile-meta .premium i {
            font-size: 0.9rem;
        }
        
        .profile-email {
            font-size: 0.875rem;
            color: #6b7280;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .profile-email i {
            font-size: 0.9rem;
        }
        
        .edit-profile-btn {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 0.6rem 1rem;
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: #4b5563;
            font-weight: 500;
            margin-bottom: 1rem;
        }
        
        .edit-profile-btn:hover {
            background: #f9fafb;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        /* Detail Card */
        .detail-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            padding: 1.5rem;
            border: 1px solid #f3f4f6;
            margin-top: 2rem;
        }
        
        .detail-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f3f4f6;
        }
        
        .detail-card h3 {
            font-size: 1.25rem;
            font-weight: bold;
            color: #1f2937;
            margin: 0;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .social-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            transition: transform 0.2s;
            padding: 0.5rem;
            border-radius: 0.5rem;
            background: #f9fafb;
        }
        
        .social-link:hover {
            transform: scale(1.05);
            background: #f3f4f6;
        }
        
        .social-link i {
            font-size: 1.1rem;
        }
        
        .social-link .handle {
            font-size: 0.8rem;
            color: #6b7280;
            font-weight: 500;
        }
        
        .social-link.instagram i { color: #e91e63; }
        .social-link.tiktok i { color: #000; }
        .social-link.facebook i { color: #1877f2; }
        
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
            margin-bottom: 1.5rem;
        }
        
        .field-group {
            margin-bottom: 0.5rem;
        }
        
        .field-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #374151;
            font-size: 0.9rem;
            display: block;
        }
        
        .field-value {
            background: #f9fafb;
            padding: 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            color: #4b5563;
            font-size: 0.9rem;
            min-height: 1.25rem;
            line-height: 1.4;
        }
        
        .actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 1.5rem;
        }
        
        .edit-btn {
            background: #8BAC65;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 1.5rem;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
            box-shadow: 0 1px 3px rgba(34, 197, 94, 0.3);
        }
        
        .edit-btn:hover {
            background: #435331ff;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(42, 79, 56, 0.4);
        }

        /* Additional decorative elements */
        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
        }
        
        .circle-1 {
            width: 60px;
            height: 60px;
            top: -20px;
            right: 100px;
        }
        
        .circle-2 {
            width: 40px;
            height: 40px;
            bottom: -10px;
            left: 80px;
        }
        
        .circle-3 {
            width: 30px;
            height: 30px;
            top: 40px;
            right: 40px;
        }
    </style>
</head>
<body>

<div class="profil-container">
    {{-- Sidebar --}}
    <aside class="sidebar">
        <div class="brand">
            <img src="{{ asset('images/logo2-lifia.svg') }}" alt="Lifia Logo" class="logo">
        </div>
        <nav>
            <a href="#" class="active">
                <i class="fas fa-user"></i> Profil Saya
            </a>
            <a href="#">
                <i class="fas fa-chart-line"></i> Aktivitas Saya
            </a>
            <a href="#">
                <i class="fas fa-heart"></i> Koleksi Favorit
            </a>
            <a href="#">
                <i class="fas fa-skull"></i> Progres Kesehatan
            </a>
            <a href="#">
                <i class="fas fa-crown"></i> Premium
            </a>
            <a href="#">
                <i class="fas fa-door-open"></i> Logout
            </a>
        </nav>
    </aside>

    {{-- Main Content --}}
    <main class="main">
        {{-- Top Bar dengan Wrapper Putih Full Width --}}
        <div class="topbar-wrapper">
            <div class="topbar">
                <div class="search-container">
                    <div class="search-box">
                        <input type="text" placeholder="Telusuri...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="user-section">
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                    </button>
                    <div class="user-info">
                        <img src="https://placehold.co/40x40/8BAC65/white?text=M" alt="User">
                        <div class="user-details">
                            <h4>Maki Zenin</h4>
                            <p>makimakizen</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Profile Header --}}
        <div class="profil-header">
            <!-- Tombol Edit di Pojok Kanan Atas Header -->
            <button class="header-edit-btn">
                <i class="fas fa-pen"></i> 
            </button>
            
            <div class="decorative-circle circle-1"></div>
            <div class="decorative-circle circle-2"></div>
            <div class="decorative-circle circle-3"></div>
        </div>

        {{-- Profile Content --}}
        <div class="profile-content-wrapper">
            <div class="avatar-container">
                <img src="https://placehold.co/176x176/8BAC65/white?text=Maki" alt="Profile">
                <button class="edit-avatar-btn">
                    <i class="fas fa-pen"></i>
                </button>
            </div>
            <div class="profile-info">
                <h2>Maki Zenin</h2>
                <div class="profile-meta">
                    <span>Malang, Jawa Timur</span>
                    <div class="dot"></div>
                    <span class="premium">
                        <i class="fas fa-crown"></i> Pengguna Premium
                    </span>
    
                    <span class="profile-email">
                        <i class="fas fa-envelope"></i> makimakizen@gmail.com
                    </span>
                </div>
            </div>
        </div>

        {{-- Detail Card --}}
        <div class="detail-card">
            <div class="detail-header">
                <h3>Detail Lainnya</h3>
                <div class="social-links">
                    <a href="#" class="social-link instagram">
                        <i class="fab fa-instagram"></i>
                        <span class="handle">@uzenni</span>
                    </a>
                    <a href="#" class="social-link tiktok">
                        <i class="fab fa-tiktok"></i>
                        <span class="handle">@fulmilesz</span>
                    </a>
                    <a href="#" class="social-link facebook">
                        <i class="fab fa-facebook"></i>
                        <span class="handle">Zen Zen</span>
                    </a>
                </div>
            </div>
            
            <div class="detail-grid">
                <div class="field-group">
                    <label class="field-label">Nama Lengkap</label>
                    <div class="field-value">Maki Zenin Sukochi</div>
                </div>
                <div class="field-group">
                    <label class="field-label">Hobi & Minat</label>
                    <div class="field-value">Yoga, Jogging</div>
                </div>
                <div class="field-group">
                    <label class="field-label">Email</label>
                    <div class="field-value">makimakizenin@gmail.com</div>
                </div>
                <div class="field-group">
                    <label class="field-label">Tanggal Lahir</label>
                    <div class="field-value">12-10-2000</div>
                </div>
                <div class="field-group">
                    <label class="field-label">Username</label>
                    <div class="field-value">makimakizenin</div>
                </div>
                <div class="field-group">
                    <label class="field-label">Bio</label>
                    <div class="field-value">Pecinta hidup sehat dan...</div>
                </div>
                <div class="field-group">
                    <label class="field-label">Nomor</label>
                    <div class="field-value">082133334444</div>
                </div>
                <div class="field-group">
                    <label class="field-label">Jenis Kelamin</label>
                    <div class="field-value">Perempuan</div>
                </div>
            </div>
            
            <div class="actions">
                <button class="edit-btn">
                    <i class="fas fa-edit"></i>
                    Edit Profil
                </button>
            </div>
        </div>
    </main>
</div>

</body>
</html>