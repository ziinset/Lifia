<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Langganan - Lifia Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
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

        /* Keep the animation for langganan page */
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

        .user-details p {
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #4E342E;
            margin: 0;
        }

        .content-wrapper {
            padding: 32px;
        }

        .page-header {
            margin-bottom: 32px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #4E342E;
            margin-bottom: 8px;
            font-family: 'Poppins', sans-serif;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .filters-section {
            display: flex;
            gap: 16px;
            margin-bottom: 24px;
            align-items: center;
            justify-content: space-between;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease 0.2s forwards;
        }

        .filters-left {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .filter-dropdown {
            position: relative;
        }

        .filter-btn {
            background: white;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #4E342E;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
            min-width: 120px;
        }

        .filter-btn:hover {
            border-color: #556B2F;
            box-shadow: 0 4px 12px rgba(85, 107, 47, 0.15);
            transform: translateY(-2px);
            background: #f8fffe;
        }

        .filter-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 6px rgba(85, 107, 47, 0.1);
        }

        .filter-btn i {
            font-size: 12px;
            color: #4E342E;
        }

        .subscription-table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease 0.4s forwards;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .table-wrapper {
            overflow-x: auto;
            overflow-y: visible;
            position: relative;
            -webkit-overflow-scrolling: touch;
        }

        .table-wrapper::-webkit-scrollbar {
            height: 8px;
        }

        .table-wrapper::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: #556B2F;
            border-radius: 4px;
        }

        .table-wrapper::-webkit-scrollbar-thumb:hover {
            background: #4a5a28;
        }

        .subscription-table:hover {
            box-shadow: 0 8px 25px rgba(85, 107, 47, 0.12);
            transform: translateY(-2px);
            border: 1px solid #8BAC65;
        }

        .table-header {
            background: linear-gradient(135deg, #f9fafb 0%, #f0f9f4 100%);
            padding: 16px 24px;
            border-bottom: 1px solid #e5e7eb;
            border-top: 3px solid #556B2F;
            position: sticky;
            top: 0;
            z-index: 10;
            min-width: fit-content;
        }

        .table-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #556B2F 0%, #8BAC65 50%, #556B2F 100%);
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .table-header-row {
            display: grid;
            grid-template-columns: 90px 160px 100px 180px 120px 130px 160px;
            gap: 18px;
            align-items: center;
            min-width: fit-content;
        }

        .table-header-cell {
            font-size: 12px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #4E342E;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            white-space: normal;
            word-wrap: break-word;
            overflow: visible;
            text-overflow: clip;
            transition: all 0.3s ease;
            position: relative;
            line-height: 1.4;
        }

        .table-header-cell:hover {
            color: #556B2F;
            transform: translateY(-1px);
        }

        .table-header-cell::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, #8BAC65 50%, transparent 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .table-header-cell:hover::after {
            opacity: 1;
        }

        .table-body {
            max-height: 600px;
            overflow-y: auto;
            overflow-x: visible;
            min-width: fit-content;
        }

        .table-row {
            display: grid;
            grid-template-columns: 90px 160px 100px 180px 120px 130px 160px;
            gap: 18px;
            align-items: center;
            padding: 16px 24px;
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            opacity: 0;
            transform: translateX(-20px);
            animation: slideInLeft 0.5s ease forwards;
            border-left: 4px solid transparent;
            border-right: 2px solid transparent;
            min-width: fit-content;
        }

        .table-row:nth-child(1) { animation-delay: 0.6s; }
        .table-row:nth-child(2) { animation-delay: 0.7s; }
        .table-row:nth-child(3) { animation-delay: 0.8s; }
        .table-row:nth-child(4) { animation-delay: 0.9s; }
        .table-row:nth-child(5) { animation-delay: 1.0s; }
        .table-row:nth-child(6) { animation-delay: 1.1s; }

        @keyframes slideInLeft {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .table-row:hover {
            background: linear-gradient(135deg, #f0f9f4 0%, #ecfdf5 100%);
            transform: translateX(4px);
            box-shadow: 0 4px 15px rgba(85, 107, 47, 0.12);
            border-left-color: #556B2F;
            border-right-color: #8BAC65;
        }

        .table-row:last-child {
            border-bottom: none;
        }

        .subscription-id {
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #4E342E;
            white-space: nowrap;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .table-row:hover .subscription-id {
            color: #556B2F;
            font-weight: 600;
            text-shadow: 0 1px 2px rgba(85, 107, 47, 0.1);
        }

        .user-info-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar-small {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .user-avatar-small:hover {
            transform: scale(1.1);
            border-color: #556B2F;
            box-shadow: 0 4px 12px rgba(85, 107, 47, 0.2);
        }

        .user-name {
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #4E342E;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .table-row:hover .user-name {
            color: #556B2F;
            font-weight: 600;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 16px;
            font-size: 12px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .status-badge:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .status-aktif {
            background: #dcfce7;
            color: #4E342E;
            position: relative;
        }

        .status-aktif::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #dcfce7, #bbf7d0);
            border-radius: 18px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .status-aktif:hover::before {
            opacity: 1;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .status-kedaluwarsa {
            background: #f3f4f6;
            color: #4E342E;
        }

        .status-trial {
            background: #fef3c7;
            color: #4E342E;
        }

        .status-dibatalkan {
            background: #fee2e2;
            color: #4E342E;
        }

        .package-cell {
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #4E342E;
            white-space: normal;
            word-wrap: break-word;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            line-height: 1.4;
        }

        .table-row:hover .package-cell {
            color: #556B2F;
            font-weight: 600;
        }

        .price-cell {
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #4E342E;
            white-space: nowrap;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .table-row:hover .price-cell {
            color: #556B2F;
            font-weight: 600;
        }

        .date-cell {
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #4E342E;
            white-space: nowrap;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .table-row:hover .date-cell {
            color: #556B2F;
            font-weight: 600;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 24px;
            padding: 20px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease 0.8s forwards;
        }

        .page-btn {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            background: white;
            color: #4E342E;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .page-btn:hover:not(.active) {
            border-color: #556B2F;
            color: #556B2F;
            background: rgba(85, 107, 47, 0.05);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(85, 107, 47, 0.15);
        }

        .page-btn.active {
            background: #556B2F;
            color: white;
            border-color: #556B2F;
        }


        @media (max-width: 1200px) {
            .table-header-row,
            .table-row {
                grid-template-columns: 80px 140px 90px 160px 110px 120px 150px;
                gap: 12px;
            }

            .table-header-cell,
            .subscription-id,
            .user-name,
            .package-cell,
            .price-cell,
            .date-cell {
                font-size: 11px;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            .content-wrapper {
                padding: 16px;
            }

            .filters-section {
                flex-direction: column;
                align-items: stretch;
            }

            .filters-left {
                flex-wrap: wrap;
            }

            .table-header-row,
            .table-row {
                grid-template-columns: 1fr;
                gap: 8px;
                text-align: left;
            }

            .table-header-cell {
                display: none;
            }

            .table-row {
                display: block;
                padding: 16px;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                margin-bottom: 8px;
            }
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
                <div class="page-header">
                    <h1 class="page-title">Daftar Langganan</h1>
                </div>

                <!-- Filters Section -->
                <div class="filters-section">
                    <div class="filters-left">
                        <div class="filter-dropdown">
                            <button class="filter-btn">
                                Status
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="filter-dropdown">
                            <button class="filter-btn">
                                Rentang Harga
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="filter-dropdown">
                        <button class="filter-btn">
                            Urutan Berdasarkan
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                </div>

                <!-- Subscription Table -->
                <div class="subscription-table">
                    <div class="table-wrapper">
                        <div class="table-header">
                            <div class="table-header-row">
                                <div class="table-header-cell">ID Langganan</div>
                                <div class="table-header-cell">Nama Pengguna</div>
                                <div class="table-header-cell">Status</div>
                                <div class="table-header-cell">Paket</div>
                                <div class="table-header-cell">Harga</div>
                                <div class="table-header-cell">Tanggal Aktif</div>
                                <div class="table-header-cell">Tanggal Kedaluwarsa</div>
                            </div>
                        </div>
                        <div class="table-body">
                        @forelse($subscriptions as $subscription)
                            @php
                                $user = $subscription->user;
                                $userInitial = strtoupper(substr($user->nama_lengkap ?? 'U', 0, 1));
                                $statusClass = match($subscription->status) {
                                    'active' => 'status-aktif',
                                    'expired' => 'status-kedaluwarsa',
                                    'trial' => 'status-trial',
                                    'cancelled', 'failed' => 'status-dibatalkan',
                                    default => 'status-kedaluwarsa'
                                };
                                $statusText = match($subscription->status) {
                                    'active' => 'Aktif',
                                    'expired' => 'Kedaluwarsa',
                                    'trial' => 'Trial',
                                    'cancelled' => 'Dibatalkan',
                                    'failed' => 'Gagal',
                                    'pending' => 'Menunggu',
                                    default => $subscription->status
                                };

                                // Check if expired
                                if ($subscription->status === 'active' && $subscription->end_date < now()->toDateString()) {
                                    $statusClass = 'status-kedaluwarsa';
                                    $statusText = 'Kedaluwarsa';
                                }
                            @endphp
                            <div class="table-row">
                                <div class="subscription-id">{{ $subscription->subscription_id }}</div>
                                <div class="user-info-cell">
                                    @if($user->foto)
                                        <img src="{{ asset('storage/' . $user->foto) }}" alt="{{ $user->nama_lengkap }}" class="user-avatar-small">
                                    @else
                                        <div style="width: 32px; height: 32px; border-radius: 50%; background: #556B2F; color: white; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 14px;">
                                            {{ $userInitial }}
                                        </div>
                                    @endif
                                    <span class="user-name">{{ $user->nama_lengkap ?? 'N/A' }}</span>
                                </div>
                                <div><span class="status-badge {{ $statusClass }}">{{ $statusText }}</span></div>
                                <div class="package-cell">{{ $subscription->package_name }}</div>
                                <div class="price-cell">Rp{{ number_format($subscription->price, 0, ',', '.') }}</div>
                                <div class="date-cell">{{ \Carbon\Carbon::parse($subscription->start_date)->format('d M Y') }}</div>
                                <div class="date-cell">
                                    @if($subscription->end_date)
                                        {{ \Carbon\Carbon::parse($subscription->end_date)->format('d M Y') }}
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="table-row" style="grid-template-columns: 1fr; text-align: center; padding: 40px;">
                                <div style="color: #4E342E; font-size: 16px;">Belum ada data langganan</div>
                            </div>
                        @endforelse
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                @if($subscriptions->hasPages())
                    <div class="pagination">
                        @if($subscriptions->onFirstPage())
                            <button class="page-btn" disabled>«</button>
                        @else
                            <a href="{{ $subscriptions->previousPageUrl() }}" class="page-btn">«</a>
                        @endif

                        @foreach(range(1, $subscriptions->lastPage()) as $page)
                            @if($page == $subscriptions->currentPage())
                                <button class="page-btn active">{{ $page }}</button>
                            @else
                                <a href="{{ $subscriptions->url($page) }}" class="page-btn">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if($subscriptions->hasMorePages())
                            <a href="{{ $subscriptions->nextPageUrl() }}" class="page-btn">»</a>
                        @else
                            <button class="page-btn" disabled>»</button>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Filter dropdown functionality (placeholder)
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                console.log('Filter clicked:', this.textContent.trim());
                // Add dropdown functionality here
            });
        });

        // Pagination functionality
        document.querySelectorAll('.page-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Table row hover effects
        document.querySelectorAll('.table-row').forEach(row => {
            row.addEventListener('click', function() {
                console.log('Row clicked:', this.querySelector('.subscription-id').textContent);
                // Add row click functionality here
            });
        });

        // Synchronize horizontal scroll - wrapper controls both header and body
        const tableWrapper = document.querySelector('.table-wrapper');
        const tableHeader = document.querySelector('.table-header');
        const tableBody = document.querySelector('.table-body');

        if (tableWrapper && tableHeader && tableBody) {
            // Ensure header and body have same width
            function syncWidths() {
                const headerRow = tableHeader.querySelector('.table-header-row');
                const firstBodyRow = tableBody.querySelector('.table-row');
                if (headerRow && firstBodyRow) {
                    const bodyWidth = firstBodyRow.offsetWidth;
                    headerRow.style.minWidth = bodyWidth + 'px';
                }
            }

            // Sync on load and resize
            syncWidths();
            window.addEventListener('resize', syncWidths);

            // The wrapper scroll will automatically move both header and body together
            // since they're both inside the same scrollable container
        }
    </script>
</body>
</html>
