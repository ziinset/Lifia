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
    @include('components.sidebar-profil')

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