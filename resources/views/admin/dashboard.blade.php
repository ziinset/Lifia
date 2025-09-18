<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Lifia</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #FFFDF9;
            overflow-x: hidden;
        }

        .admin-container {
            display: flex;
            height: 100vh;
        }


        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 0;
            overflow-y: auto;
            background: #FFFDF9;
        }

        .top-header {
            background: white;
            padding: 20px 32px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 0;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
            overflow: hidden;
        }

        .header-avatar-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .user-avatar:hover {
            box-shadow: 0 4px 12px rgba(85, 107, 47, 0.3);
            transform: scale(1.05);
        }

        .user-avatar:hover .header-avatar-image {
            border-color: #556B2F;
        }

        .user-details h2 {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
            margin: 0;
        }

        .user-details p {
            font-size: 14px;
            color: #6b7280;
            margin: 0;
        }

        .greeting-section {
            margin-bottom: 32px;
        }

        .greeting-section h1 {
            font-size: 32px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .greeting-section p {
            font-size: 16px;
            color: #6b7280;
        }

        .content-wrapper {
            padding: 32px;
        }

        .dashboard-content {
            display: flex;
            flex-direction: column;
            gap: 32px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .bottom-section {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 32px;
        }

        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
        }

        .stat-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border-color: #556B2F;
            transform: translateY(-3px);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border-radius: 20px;
            background: linear-gradient(45deg, rgba(85, 107, 47, 0.1), rgba(85, 107, 47, 0.05));
            opacity: 0;
            transition: opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: -1;
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-title {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 8px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            min-height: 40px;
            display: flex;
            align-items: flex-start;
        }

        .stat-value {
            font-size: 28px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: #000000;
            margin-bottom: 4px;
        }

        .stat-subtitle {
            font-size: 14px;
            color: #556B2F;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }

        .activities-section {
            background: white;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }

        .section-header {
            font-size: 18px;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: #000000;
            margin-bottom: 20px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 16px 20px;
            border-bottom: none;
            background: white;
            border-radius: 50px;
            margin-bottom: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .activity-item:hover {
            background: #f8fafc;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-1px);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #4E342E;
            margin-bottom: 2px;
        }

        .activity-time {
            font-size: 14px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            color: #4E342E;
        }

        .activity-timestamp {
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #6E7172;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
        }

        .page-btn {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: 1px solid #979797;
            background: transparent;
            color: #979797;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .page-btn:hover:not(.active) {
            border-color: #556B2F;
            color: #556B2F;
            background: rgba(85, 107, 47, 0.05);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(85, 107, 47, 0.2);
        }

        .page-btn.active {
            background: #556B2F;
            color: white;
            border-color: #556B2F;
            box-shadow: 0 4px 12px rgba(85, 107, 47, 0.3);
        }

        .page-btn.active:hover {
            background: #4B5C3B;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(85, 107, 47, 0.4);
        }

        .notes-section {
            background: white;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 
                0 6px 16px rgba(0, 0, 0, 0.15), 
                0 3px 8px rgba(0, 0, 0, 0.1),
                inset 0 1px 3px rgba(0, 0, 0, 0.1),
                inset 0 -1px 2px rgba(0, 0, 0, 0.05);
            border: 3px solid #4B5C3B;
            height: fit-content;
            position: relative;
            min-height: 400px;
        }

        .notes-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .notes-title {
            font-size: 20px;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: #4B5C3B;
        }

        .view-all {
            font-size: 14px;
            color: #4B5C3B;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 4px 8px;
            border-radius: 6px;
        }

        .view-all:hover {
            background: rgba(75, 92, 59, 0.1);
            color: #556B2F;
        }

        .notes-content {
            padding-bottom: 80px; /* Space for the button */
        }

        .note-item {
            background: #f8fafc;
            padding: 16px;
            border-radius: 20px;
            margin-bottom: 12px;
            border: 3px solid #4B5C3B;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15), 0 3px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .note-item:hover {
            background: white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2), 0 4px 10px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
            border-color: #556B2F;
        }

        .note-item:last-child {
            margin-bottom: 0;
        }

        .note-title {
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #4B5C3B;
            margin-bottom: 4px;
        }

        .note-content {
            font-size: 14px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 300;
            color: #4B5C3B;
            margin-bottom: 8px;
        }

        .note-date {
            font-size: 13px;
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            color: #4B5C3B;
            text-align: right;
        }

        .add-note-btn {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: linear-gradient(135deg, #4B5C3B 0%, #8BAC65 100%);
            color: white;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            bottom: 24px;
            right: 24px;
            box-shadow: 0 4px 12px rgba(75, 92, 59, 0.3);
            font-size: 18px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .add-note-btn:hover {
            background: linear-gradient(135deg, #3A4A2E 0%, #799549 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(75, 92, 59, 0.4);
        }

        .add-note-btn:active {
            transform: translateY(0);
            box-shadow: 0 3px 8px rgba(75, 92, 59, 0.3);
        }

        .activities-section {
            background: transparent;
            padding: 0;
            border-radius: 0;
            box-shadow: none;
            border: none;
            height: fit-content;
        }

        @media (max-width: 1200px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 16px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .content-wrapper {
                padding: 16px;
            }

            .bottom-section {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .notes-section {
                padding: 20px;
            }

            .add-note-btn {
                bottom: 20px;
                right: 20px;
            }
        }

        /* Profile Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .profile-modal {
            background: white;
            border-radius: 16px;
            width: 90%;
            max-width: 420px;
            padding: 0;
            position: relative;
            transform: scale(0.8);
            transition: transform 0.3s ease;
            overflow: hidden;
        }

        .modal-overlay.active .profile-modal {
            transform: scale(1);
        }

        .modal-header {
            background: linear-gradient(135deg, #556B2F 0%, #8BAC65 100%);
            color: white;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .modal-back-btn {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 5px;
            position: absolute;
            left: 20px;
        }

        .modal-title {
            font-size: 18px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
        }

        .modal-body {
            padding: 24px;
            text-align: center;
        }

        .profile-avatar-section {
            display: flex;
            justify-content: center;
            margin-bottom: 24px;
            position: relative;
        }

        .avatar-container {
            position: relative;
            display: inline-block;
        }

        .profile-avatar-large {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
            overflow: hidden;
        }

        .avatar-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .edit-avatar-btn {
            position: absolute;
            bottom: -5px;
            right: -5px;
            width: 28px;
            height: 28px;
            background: #556B2F;
            border: 3px solid white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .edit-avatar-btn:hover {
            background: #4B5C3B;
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        }

        .profile-form {
            display: none;
        }

        .profile-field {
            margin-bottom: 16px;
            text-align: left;
        }

        .profile-label {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-family: 'Poppins', sans-serif;
        }

        .profile-input {
            width: 100%;
            padding: 10px 14px;
            border: none;
            background: #f5f5f5;
            border-radius: 10px;
            font-size: 13px;
            color: #666;
            font-family: 'Inter', sans-serif;
        }

        .profile-input[readonly] {
            cursor: not-allowed;
            background: #f3f4f6;
            color: #9ca3af;
        }

        .profile-input:not([readonly]) {
            background: #fff;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .profile-input:not([readonly]):focus {
            outline: none;
            border-color: #556B2F;
            box-shadow: 0 0 0 3px rgba(85, 107, 47, 0.1);
        }

        .profile-input.password {
            letter-spacing: 3px;
        }

        .update-profile-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #556B2F 0%, #8BAC65 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .update-profile-btn:hover {
            background: linear-gradient(135deg, #4B5C3B 0%, #799549 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(85, 107, 47, 0.3);
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Include Sidebar Admin Component -->
        @include('components.sidebaradmin')

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Header -->
            <div class="top-header">
                <div class="user-info">
                    <div class="user-details">
                        <h2>{{ Auth::user()->nama_lengkap ?? 'Admin' }}</h2>
                        <p class="user-status">{{ Auth::user()->status ?? 'Admin' }}</p>
                    </div>
                    @php
                        $foto = Auth::user()->foto ?? null;
                        $initial = strtoupper(substr(Auth::user()->nama_lengkap ?? 'A', 0, 1));
                    @endphp
                    <div class="user-avatar" onclick="openProfileModal()">
                        <img src="{{ $foto ? asset('storage/' . $foto) : 'https://placehold.co/48x48/8BAC65/white?text=' . $initial }}" 
                             alt="{{ Auth::user()->nama_lengkap ?? 'Admin' }}"
                             class="header-avatar-image">
                    </div>
                </div>
            </div>

            <div class="content-wrapper">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success" style="background: #d1fae5; border: 1px solid #a7f3d0; color: #065f46; padding: 1rem; border-radius: 0.75rem; margin-bottom: 1.5rem; font-size: 0.9rem; font-weight: 500; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Info Message -->
                @if (session('info'))
                    <div class="alert alert-info" style="background: #dbeafe; border: 1px solid #93c5fd; color: #1e40af; padding: 1rem; border-radius: 0.75rem; margin-bottom: 1.5rem; font-size: 0.9rem; font-weight: 500; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-info-circle"></i>
                        {{ session('info') }}
                    </div>
                @endif

                <!-- Error Message -->
                @if (session('error'))
                    <div class="alert alert-error" style="background: #fee2e2; border: 1px solid #fca5a5; color: #dc2626; padding: 1rem; border-radius: 0.75rem; margin-bottom: 1.5rem; font-size: 0.9rem; font-weight: 500; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <div class="greeting-section">
                    @php
                        // Set timezone to Indonesia (WIB)
                        date_default_timezone_set('Asia/Jakarta');
                        $hour = date('H');
                        $greeting = '';
                        
                        if ($hour >= 5 && $hour < 12) {
                            $greeting = 'Selamat Pagi';
                        } elseif ($hour >= 12 && $hour < 17) {
                            $greeting = 'Selamat Siang';
                        } elseif ($hour >= 17 && $hour < 21) {
                            $greeting = 'Selamat Sore';
                        } else {
                            $greeting = 'Selamat Malam';
                        }
                    @endphp
                    <h1>Halo {{ Auth::user()->nama_lengkap ?? 'Admin' }}, {{ $greeting }}!</h1>
                    <p>Konsistensi kecil setiap hari membawa perubahan besar</p>
                </div>
                
                <div class="dashboard-content">
                    <!-- Statistics Cards -->
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-title">Total Pemasukan</div>
                            <div class="stat-value">Rp. 3.000.000,00</div>
                            <div class="stat-subtitle">Kenaikan Bulan Ini 10,09%</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-title">Total Member Fitplan Baru</div>
                            <div class="stat-value">300 Member</div>
                            <div class="stat-subtitle">150 Member Baru Bulan Ini</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-title">Jumlah Member Fitplan Baru Harian</div>
                            <div class="stat-value">100 Member</div>
                            <div class="stat-subtitle">&nbsp;</div>
                        </div>
                    </div>

                    <!-- Bottom Section: Activities + Notes -->
                    <div class="bottom-section">
                        <!-- Activities Section -->
                        <div class="activities-section">
                            <h2 class="section-header">Riwayat Aktivitas</h2>
                            
                            <div class="activity-item">
                                <img src="https://via.placeholder.com/40x40/556B2F/ffffff?text=G" alt="Avatar" class="activity-avatar">
                                <div class="activity-content">
                                    <div class="activity-title">Graciella Yeriza N</div>
                                    <div class="activity-time">Menghapus artikel "Mulai Sarapan Seimbang"</div>
                                </div>
                                <div class="activity-timestamp">Baru saja</div>
                            </div>

                            <div class="activity-item">
                                <img src="https://via.placeholder.com/40x40/556B2F/ffffff?text=G" alt="Avatar" class="activity-avatar">
                                <div class="activity-content">
                                    <div class="activity-title">Graciella Yeriza N</div>
                                    <div class="activity-time">Menghapus artikel "Mulai Sarapan Seimbang"</div>
                                </div>
                                <div class="activity-timestamp">2 Hari Lalu</div>
                            </div>

                            <div class="activity-item">
                                <img src="https://via.placeholder.com/40x40/556B2F/ffffff?text=G" alt="Avatar" class="activity-avatar">
                                <div class="activity-content">
                                    <div class="activity-title">Graciella Yeriza N</div>
                                    <div class="activity-time">Menghapus artikel "Mulai Sarapan Seimbang"</div>
                                </div>
                                <div class="activity-timestamp">3 Hari Lalu</div>
                            </div>

                            <div class="activity-item">
                                <img src="https://via.placeholder.com/40x40/556B2F/ffffff?text=G" alt="Avatar" class="activity-avatar">
                                <div class="activity-content">
                                    <div class="activity-title">Graciella Yeriza N</div>
                                    <div class="activity-time">Menghapus artikel "Mulai Sarapan Seimbang"</div>
                                </div>
                                <div class="activity-timestamp">3 Hari Lalu</div>
                            </div>

                            <div class="pagination">
                                <button class="page-btn active">1</button>
                                <button class="page-btn">2</button>
                                <button class="page-btn">3</button>
                            </div>
                        </div>

                        <!-- Notes Section -->
                        <div class="notes-section">
                            <div class="notes-header">
                                <h3 class="notes-title">Notes</h3>
                                <a href="#" class="view-all">Lihat semua</a>
                            </div>

                            <div class="notes-content">
                                <div class="note-item">
                                    <div class="note-title">Pola Makan Enak</div>
                                    <div class="note-content">Jku suka jajabebat wu...</div>
                                    <div class="note-date">3 - 12</div>
                                </div>

                                <div class="note-item">
                                    <div class="note-title">Pola Makan Enak</div>
                                    <div class="note-content">Alhamdulillahhhhhh...</div>
                                    <div class="note-date">18 - 09</div>
                                </div>

                                <div class="note-item">
                                    <div class="note-title">Pola Makan Enak</div>
                                    <div class="note-content">bismillah yaayayayay...</div>
                                    <div class="note-date">8 - 05</div>
                                </div>
                            </div>

                            <button class="add-note-btn">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Modal -->
    <div class="modal-overlay" id="profileModal">
        <div class="profile-modal">
            <div class="modal-header">
                <button class="modal-back-btn" onclick="closeProfileModal()">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <div class="modal-title">Akun Saya</div>
            </div>
            <div class="modal-body">
                <form id="profileForm" class="profile-form" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="file" id="avatarInput" name="foto" accept="image/*" style="display:none">
                </form>
                
                <div class="profile-avatar-section">
                    @php
                        $foto = Auth::user()->foto ?? null;
                        $initial = strtoupper(substr(Auth::user()->nama_lengkap ?? 'A', 0, 1));
                    @endphp
                    <div class="avatar-container">
                        <div class="profile-avatar-large">
                            <img id="modalAvatarPreview" src="{{ $foto ? asset('storage/' . $foto) : 'https://placehold.co/80x80/8BAC65/white?text=' . $initial }}" 
                                 alt="{{ Auth::user()->nama_lengkap ?? 'Admin' }}"
                                 class="avatar-image">
                        </div>
                        <div class="edit-avatar-btn" onclick="changeProfileImage()">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="profile-field">
                    <div class="profile-label">Nama</div>
                    <input type="text" name="nama_lengkap" class="profile-input" value="{{ Auth::user()->nama_lengkap ?? 'Admin' }}" form="profileForm">
                </div>

                <div class="profile-field">
                    <div class="profile-label">Status</div>
                    <input type="text" name="status" class="profile-input" value="{{ Auth::user()->status ?? 'Admin kocak dan ramah' }}" form="profileForm">
                </div>

                <div class="profile-field">
                    <div class="profile-label">Email</div>
                    <input type="email" class="profile-input" value="{{ Auth::user()->email ?? 'admin@gmail.com' }}" readonly>
                </div>

                <div class="profile-field">
                    <div class="profile-label">Password</div>
                    <input type="password" class="profile-input password" value="admin123" readonly>
                </div>

                <button type="button" class="update-profile-btn" onclick="submitProfileForm()">Update Profil</button>
            </div>
        </div>
    </div>

    <script>
        function openProfileModal() {
            const modal = document.getElementById('profileModal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeProfileModal() {
            const modal = document.getElementById('profileModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('profileModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeProfileModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeProfileModal();
            }
        });

        // Profile image change functionality
        function changeProfileImage() {
            const avatarInput = document.getElementById('avatarInput');
            if (avatarInput) {
                avatarInput.click();
            }
        }

        // Submit profile form when Update Profil button is clicked
        function submitProfileForm() {
            const profileForm = document.getElementById('profileForm');
            const avatarInput = document.getElementById('avatarInput');
            const namaInput = document.querySelector('input[name="nama_lengkap"]');
            const statusInput = document.querySelector('input[name="status"]');
            
            // Check if there's any change (file, nama, or status)
            const hasFile = avatarInput && avatarInput.files && avatarInput.files[0];
            const hasNama = namaInput && namaInput.value.trim() !== '';
            const hasStatus = statusInput && statusInput.value.trim() !== '';
            
            if (hasFile || hasNama || hasStatus) {
                if (profileForm) {
                    profileForm.submit();
                }
            } else {
                alert('Silakan isi nama, status, atau pilih gambar profil untuk diperbarui.');
            }
        }

        // Handle avatar input change, nama input change, and status input change
        document.addEventListener('DOMContentLoaded', function() {
            const avatarInput = document.getElementById('avatarInput');
            const modalAvatarPreview = document.getElementById('modalAvatarPreview');
            const headerAvatarImage = document.querySelector('.header-avatar-image');
            const namaInput = document.querySelector('input[name="nama_lengkap"]');
            const statusInput = document.querySelector('input[name="status"]');
            const headerNama = document.querySelector('.user-details h2');
            const headerStatus = document.querySelector('.user-status');

            // Handle avatar change
            if (avatarInput) {
                avatarInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        const file = this.files[0];
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            // Update modal preview only (don't submit yet)
                            if (modalAvatarPreview) {
                                modalAvatarPreview.src = e.target.result;
                            }
                            // Update header avatar preview
                            if (headerAvatarImage) {
                                headerAvatarImage.src = e.target.result;
                            }
                        };
                        
                        reader.readAsDataURL(file);
                        
                        // Don't submit automatically - wait for Update Profil button click
                    }
                });
            }

            // Handle nama input change - update header preview
            if (namaInput && headerNama) {
                namaInput.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        headerNama.textContent = this.value;
                    }
                });
            }

            // Handle status input change - update header preview
            if (statusInput && headerStatus) {
                statusInput.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        headerStatus.textContent = this.value;
                    }
                });
            }

            // Auto-hide success, info, and error messages
            const successMsg = document.querySelector('.alert-success');
            const infoMsg = document.querySelector('.alert-info');
            const errorMsg = document.querySelector('.alert-error');
            
            if (successMsg) {
                setTimeout(() => {
                    successMsg.style.opacity = '0';
                    successMsg.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        successMsg.remove();
                    }, 300);
                }, 5000);
            }
            
            if (infoMsg) {
                setTimeout(() => {
                    infoMsg.style.opacity = '0';
                    infoMsg.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        infoMsg.remove();
                    }, 300);
                }, 5000);
            }
            
            if (errorMsg) {
                setTimeout(() => {
                    errorMsg.style.opacity = '0';
                    errorMsg.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        errorMsg.remove();
                    }, 300);
                }, 6000); // Error message stays longer (6 seconds)
            }
        });
    </script>
</body>
</html>