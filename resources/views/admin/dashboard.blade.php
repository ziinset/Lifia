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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            border: 2px solid #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .activity-item:hover .activity-avatar {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
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

        /* Add the same animation as langganan page */
        .user-info {
            opacity: 0;
            transform: translateX(20px);
            animation: slideInRight 0.6s ease 0.3s forwards;
        }

        @keyframes slideInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Content animations for dashboard */
        .greeting-section {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease 0.5s forwards;
        }

        .stats-grid {
            opacity: 0;
            transform: translateY(40px);
            animation: fadeInUp 0.8s ease 0.7s forwards;
        }

        .stat-card {
            opacity: 0;
            transform: translateY(20px) scale(0.95);
            animation: cardFadeIn 0.6s ease forwards;
        }

        .stat-card:nth-child(1) {
            animation-delay: 0.9s;
        }

        .stat-card:nth-child(2) {
            animation-delay: 1.1s;
        }

        .stat-card:nth-child(3) {
            animation-delay: 1.3s;
        }

        .bottom-section {
            opacity: 0;
            transform: translateY(40px);
            animation: fadeInUp 0.8s ease 1.5s forwards;
        }

        .activity-item {
            opacity: 0;
            transform: translateX(-20px);
            animation: slideInLeft 0.5s ease forwards;
        }

        .activity-item:nth-child(1) {
            animation-delay: 1.7s;
        }

        .activity-item:nth-child(2) {
            animation-delay: 1.9s;
        }

        .activity-item:nth-child(3) {
            animation-delay: 2.1s;
        }

        .notes-section {
            opacity: 0;
            transform: translateX(20px);
            animation: slideInRight 0.6s ease 1.8s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes cardFadeIn {
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes slideInLeft {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Notes Section Only - Modal CSS Removed */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            backdrop-filter: blur(4px);
            align-items: center;
            justify-content: center;
        }
        /* Show the modal overlay when active */
        .modal-overlay.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 16px;
            padding: 24px;
            width: 90%;
            max-width: 500px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }

        .modal-overlay.active .modal-content {
            transform: scale(1);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f3f4f6;
        }

        .modal-title {
            font-size: 20px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: #ffffff;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            color: #6b7280;
            cursor: pointer;
            padding: 4px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .modal-close:hover {
            color: #dc2626;
            background: #fee2e2;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
            font-family: 'Poppins', sans-serif;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.2s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #4B5C3B;
            box-shadow: 0 0 0 3px rgba(75, 92, 59, 0.1);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .color-picker-group {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        .color-option {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .color-option:hover {
            transform: scale(1.1);
            border-color: #374151;
        }

        .color-option.selected {
            border-color: #4B5C3B;
            box-shadow: 0 0 0 2px rgba(75, 92, 59, 0.3);
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 24px;
            padding-top: 16px;
            border-top: 1px solid #f3f4f6;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: 'Poppins', sans-serif;
        }

        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }

        .btn-primary {
            background: #4B5C3B;
            color: white;
            border: 1px solid #4B5C3B;
        }

        .btn-primary:hover {
            background: #3A4A2E;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
            border: 1px solid #dc2626;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        /* Note item enhancements */
        .note-item {
            position: relative;
        }

        .note-actions {
            position: absolute;
            top: 12px;
            right: 12px;
            display: flex;
            gap: 8px;
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .note-item:hover .note-actions {
            opacity: 1;
        }

        .note-action-btn {
            width: 28px;
            height: 28px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: all 0.2s ease;
        }

        .note-pin-btn {
            background: rgba(75, 92, 59, 0.1);
            color: #4B5C3B;
        }

        .note-pin-btn:hover {
            background: rgba(75, 92, 59, 0.2);
        }

        .note-pin-btn.pinned {
            background: #4B5C3B;
            color: white;
        }

        .note-edit-btn {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }

        .note-edit-btn:hover {
            background: rgba(59, 130, 246, 0.2);
        }

        .note-delete-btn {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .note-delete-btn:hover {
            background: rgba(239, 68, 68, 0.2);
        }

        .note-pinned {
            border-color: #f59e0b !important;
            background: #fef3c7 !important;
        }

        .note-pinned .note-title::before {
            content: "📌 ";
        }

        .loading-spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid #f3f4f6;
            border-radius: 50%;
            border-top-color: #4B5C3B;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .empty-notes {
            text-align: center;
            padding: 40px 20px;
            color: #6b7280;
        }

        .empty-notes i {
            font-size: 48px;
            margin-bottom: 16px;
            color: #d1d5db;
        }

    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Include Sidebar Admin Component -->
        @include('components.sidebaradmin')

        <!-- Main Content -->
        <div class="main-content">
            <!-- Include Header Admin Component -->
            @include('components.headeradmin')

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
                                <img src="{{ asset('images/avatars/graciella.jpg') }}" alt="Graciella Avatar" class="activity-avatar" onerror="this.src='https://ui-avatars.com/api/?name=Graciella+Yeriza&background=7BA05B&color=ffffff&size=40'">
                                <div class="activity-content">
                                    <div class="activity-title">Graciella Yeriza N</div>
                                    <div class="activity-time">Menambahkan artikel "Tips Sarapan Sehat"</div>
                                </div>
                                <div class="activity-timestamp">Baru saja</div>
                            </div>

                            <div class="activity-item">
                                <img src="{{ asset('images/avatars/jojo.jpg') }}" alt="Jojo Avatar" class="activity-avatar" onerror="this.src='https://ui-avatars.com/api/?name=Jojo+Admin&background=8BAC65&color=ffffff&size=40'">
                                <div class="activity-content">
                                    <div class="activity-title">Jojo Admin</div>
                                    <div class="activity-time">Memperbarui kategori "Pola Makan Sehat"</div>
                                </div>
                                <div class="activity-timestamp">2 Hari Lalu</div>
                            </div>

                            <div class="activity-item">
                                <img src="{{ asset('images/avatars/goldi.jpg') }}" alt="Goldi Avatar" class="activity-avatar" onerror="this.src='https://ui-avatars.com/api/?name=Goldi+Admin&background=9FBD75&color=ffffff&size=40'">
                                <div class="activity-content">
                                    <div class="activity-title">Goldi Admin</div>
                                    <div class="activity-time">Menghapus artikel "Menu Diet Ekstrem"</div>
                                </div>
                                <div class="activity-timestamp">3 Hari Lalu</div>
                            </div>

                            <div class="activity-item">
                                <img src="{{ asset('images/avatars/grace.jpg') }}" alt="Grace Avatar" class="activity-avatar" onerror="this.src='https://ui-avatars.com/api/?name=Grace+Admin&background=A8C678&color=ffffff&size=40'">
                                <div class="activity-content">
                                    <div class="activity-title">Grace Admin</div>
                                    <div class="activity-time">Menambahkan meal plan "Vegetarian Week"</div>
                                </div>
                                <div class="activity-timestamp">4 Hari Lalu</div>
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
                            </div>

                            <div class="notes-content">
                                <div id="notesList"></div>
                                <div id="notesEmptyState" class="empty-notes" style="display:none;">
                                    <i class="fas fa-note-sticky"></i>
                                    <div>Belum ada catatan. Klik tombol + untuk menambah catatan.</div>
                                </div>
                            </div>

                            <button class="add-note-btn" id="addNoteBtn" title="Tambah Catatan">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-hide success, info, and error messages
        document.addEventListener('DOMContentLoaded', function() {
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
                    }, 5000);
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

            // Notes/To-Do functionality (preserve existing styles)
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const notesList = document.getElementById('notesList');
            const notesEmpty = document.getElementById('notesEmptyState');
            const addNoteBtn = document.getElementById('addNoteBtn');

            // Modal elements
            const modal = document.getElementById('noteModal');
            const modalTitle = document.getElementById('noteModalTitle');
            const modalClose = document.getElementById('noteModalClose');
            const inputTitle = document.getElementById('noteTitle');
            const inputContent = document.getElementById('noteContent');
            const saveBtn = document.getElementById('noteSaveBtn');
            const cancelBtn = document.getElementById('noteCancelBtn');
            const deleteBtn = document.getElementById('noteDeleteBtn');
            const form = document.getElementById('noteForm');

            let editingId = null;

            function openModal(note = null) {
                modal.classList.add('active');
                editingId = note ? note.id : null;
                modalTitle.textContent = editingId ? 'Edit Catatan' : 'Tambah Catatan';
                inputTitle.value = note ? note.title : '';
                inputContent.value = note ? note.content : '';
                deleteBtn.style.display = editingId ? 'inline-flex' : 'none';
            }

            function closeModal() {
                modal.classList.remove('active');
                form.reset();
                editingId = null;
            }

            function setEmptyState(show) {
                if (!notesEmpty) return;
                notesEmpty.style.display = show ? 'block' : 'none';
            }

            function renderNotes(notes) {
                notesList.innerHTML = '';
                if (!notes || notes.length === 0) {
                    setEmptyState(true);
                    return;
                }
                setEmptyState(false);
                notes.forEach(note => {
                    const item = document.createElement('div');
                    item.className = 'note-item' + (note.is_pinned ? ' note-pinned' : '');

                    const title = document.createElement('div');
                    title.className = 'note-title';
                    title.textContent = note.title;

                    const content = document.createElement('div');
                    content.className = 'note-content';
                    content.textContent = note.content_preview || note.content || '';

                    const date = document.createElement('div');
                    date.className = 'note-date';
                    date.textContent = note.time_ago || note.formatted_updated_at || '';

                    const actions = document.createElement('div');
                    actions.className = 'note-actions';

                    // Pin button
                    const pinBtn = document.createElement('button');
                    pinBtn.className = 'note-action-btn note-pin-btn' + (note.is_pinned ? ' pinned' : '');
                    pinBtn.title = note.is_pinned ? 'Lepas Pin' : 'Sematkan';
                    pinBtn.innerHTML = '<i class="fas fa-thumbtack"></i>';
                    pinBtn.addEventListener('click', async (e) => {
                        e.stopPropagation();
                        await togglePin(note.id, item, pinBtn);
                    });

                    // Edit button
                    const editBtn = document.createElement('button');
                    editBtn.className = 'note-action-btn note-edit-btn';
                    editBtn.title = 'Edit';
                    editBtn.innerHTML = '<i class="fas fa-pen"></i>';
                    editBtn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        openModal(note);
                    });

                    // Delete button
                    const delBtn = document.createElement('button');
                    delBtn.className = 'note-action-btn note-delete-btn';
                    delBtn.title = 'Hapus';
                    delBtn.innerHTML = '<i class="fas fa-trash"></i>';
                    delBtn.addEventListener('click', async (e) => {
                        e.stopPropagation();
                        await deleteNote(note.id);
                    });

                    actions.appendChild(pinBtn);
                    actions.appendChild(editBtn);
                    actions.appendChild(delBtn);

                    item.appendChild(actions);
                    item.appendChild(title);
                    item.appendChild(content);
                    item.appendChild(date);

                    // Click to edit
                    item.addEventListener('click', () => openModal(note));

                    notesList.appendChild(item);
                });
            }

            async function fetchNotes() {
                try {
                    const res = await fetch('{{ route('notes.index') }}', {
                        headers: { 'Accept': 'application/json' }
                    });
                    const data = await res.json();
                    if (data.success) {
                        renderNotes(data.notes || []);
                    }
                } catch (err) {
                    console.error('Failed to fetch notes', err);
                }
            }

            async function saveNote(e) {
                e.preventDefault();
                const payload = {
                    title: inputTitle.value.trim(),
                    content: inputContent.value.trim()
                };
                if (!payload.title || !payload.content) return;

                const method = editingId ? 'PUT' : 'POST';
                const url = editingId 
                    ? '{{ url('/notes') }}/' + editingId 
                    : '{{ route('notes.store') }}';

                try {
                    const res = await fetch(url, {
                        method,
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(payload)
                    });
                    const data = await res.json();
                    if (data.success) {
                        closeModal();
                        await fetchNotes();
                    }
                } catch (err) {
                    console.error('Failed to save note', err);
                }
            }

            async function deleteNote(id) {
                if (!confirm('Hapus catatan ini?')) return;
                try {
                    const res = await fetch('{{ url('/notes') }}/' + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    });
                    const data = await res.json();
                    if (data.success) {
                        await fetchNotes();
                    }
                } catch (err) {
                    console.error('Failed to delete note', err);
                }
            }

            async function togglePin(id, itemEl, pinBtn) {
                try {
                    const res = await fetch('{{ url('/notes') }}/' + id + '/toggle-pin', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    });
                    const data = await res.json();
                    if (data.success) {
                        // Re-fetch to reorder by pinned
                        await fetchNotes();
                    }
                } catch (err) {
                    console.error('Failed to toggle pin', err);
                }
            }

            // No color picker (warna dihilangkan sesuai permintaan)

            // Events
            addNoteBtn && addNoteBtn.addEventListener('click', () => openModal());
            // X close icon removed; use Batal button or click-outside to close
            cancelBtn && cancelBtn.addEventListener('click', closeModal);
            // Delete from modal (only when editing)
            deleteBtn && deleteBtn.addEventListener('click', async () => {
                if (!editingId) return;
                await deleteNote(editingId);
                closeModal();
            });
            // Click outside modal content to close
            modal && modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });
            form && form.addEventListener('submit', saveNote);

            // Initial load
            fetchNotes();
        });
    </script>
    <!-- Notes Modal -->
    <div id="noteModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="noteModalTitle">Tambah Catatan</div>
            </div>
            <form id="noteForm">
                <div class="form-group">
                    <label class="form-label" for="noteTitle">Judul</label>
                    <input type="text" id="noteTitle" class="form-input" placeholder="Judul catatan" required />
                </div>
                <div class="form-group">
                    <label class="form-label" for="noteContent">Isi Catatan</label>
                    <textarea id="noteContent" class="form-input form-textarea" placeholder="Tulis catatan kamu di sini..." required></textarea>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn btn-secondary" id="noteCancelBtn">Batal</button>
                    <button type="button" class="btn btn-danger" id="noteDeleteBtn" style="display:none;">Hapus</button>
                    <button type="submit" class="btn btn-primary" id="noteSaveBtn">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>