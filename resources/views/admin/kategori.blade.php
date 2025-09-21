<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        @include('components.sidebaradmin')
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            @include('components.headeradmin')
            
            <!-- Content -->
            <div class="content-wrapper">
                <!-- Page Header -->
                <div class="page-header">
                    <h1 class="page-title">Kategori</h1>
                    <div class="header-actions">
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="search-input" placeholder="Cari Kategori Disini">
                        </div>
                        <button class="add-btn">
                            <i class="fas fa-plus"></i>
                            Tambah Kategori
                        </button>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="table-container">
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Timestamp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="category-name">Pola Makan Sehat</td>
                                    <td class="timestamp">19:40:35</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-edit">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-delete">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="category-name">Aktivitas Fisik</td>
                                    <td class="timestamp">17:17:30</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-edit">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-delete">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="category-name">Ecoliving</td>
                                    <td class="timestamp">03:20:16</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-edit">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-delete">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="category-name">Kesehatan Mental</td>
                                    <td class="timestamp">23:59:35</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-edit">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-delete">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="category-name">Perawatan Diri</td>
                                    <td class="timestamp">21:45:25</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-edit">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-delete">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td class="category-name">Vegan</td>
                                    <td class="timestamp">21:45:25</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-edit">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-delete">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-container">
                        <div class="pagination">
                            <button class="page-btn active">1</button>
                            <button class="page-btn">2</button>
                            <button class="page-btn">3</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f8fafc;
            color: #2d3748;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        .main-content {
            flex: 1;
            margin-left: 280px;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            padding: 2rem;
            flex: 1;
        }

        /* Page Header */
        .page-header {
            background: transparent;
            padding: 2rem 0;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInDown 0.6s ease forwards;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            color: #000000;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .search-box {
            position: relative;
        }

        .search-input {
            padding: 10px 16px 10px 40px;
            border: 2px solid #4B5C3B;
            border-radius: 25px;
            font-size: 14px;
            width: 300px;
            background: transparent;
            color: #4B5C3B;
            font-weight: 500;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .search-input::placeholder {
            color: #4B5C3B;
            opacity: 0.7;
        }

        .search-input:focus {
            outline: none;
            border-color: #4B5C3B;
            background: transparent;
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(75, 92, 59, 0.15);
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #4B5C3B;
            transition: all 0.3s ease;
        }

        .search-box:hover .search-icon {
            transform: translateY(-50%) scale(1.1);
            color: #556B2F;
        }

        .add-btn {
            background: #4B5C3B;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .add-btn:hover {
            background: #3a4a2b;
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 25px rgba(75, 92, 59, 0.3);
        }

        .add-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s ease;
        }

        .add-btn:hover::before {
            left: 100%;
        }

        /* Table Container */
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            overflow: hidden;
            border-top: 4px solid #556B2F;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
            animation-delay: 0.2s;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f7fafc;
        }

        th {
            padding: 16px 20px;
            text-align: left;
            font-weight: 500;
            color: #4E342E;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid #e2e8f0;
            font-family: 'Poppins', sans-serif;
        }

        tbody tr {
            border-bottom: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateX(-20px);
            animation: slideInLeft 0.5s ease forwards;
        }

        tbody tr:nth-child(1) { animation-delay: 0.4s; }
        tbody tr:nth-child(2) { animation-delay: 0.5s; }
        tbody tr:nth-child(3) { animation-delay: 0.6s; }
        tbody tr:nth-child(4) { animation-delay: 0.7s; }
        tbody tr:nth-child(5) { animation-delay: 0.8s; }
        tbody tr:nth-child(6) { animation-delay: 0.9s; }

        tbody tr:hover {
            background: linear-gradient(135deg, #f0f9f4 0%, #ecfdf5 100%);
        }

        td {
            padding: 16px 20px;
            font-size: 14px;
            font-weight: 500;
            color: #4B5C3B;
            font-family: 'Poppins', sans-serif;
        }

        .category-name {
            font-weight: 500;
            color: #4B5C3B;
            font-family: 'Poppins', sans-serif;
        }

        .timestamp {
            color: #4B5C3B;
            font-size: 13px;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn {
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            min-width: 80px;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .btn-edit {
            background: #4B5C3B;
            color: white;
        }

        .btn-edit:hover {
            background: #3a4a2b;
            transform: translateY(-1px) scale(1.05);
            box-shadow: 0 4px 12px rgba(75, 92, 59, 0.3);
        }

        .btn-delete {
            background: #4B5C3B;
            color: white;
        }

        .btn-delete:hover {
            background: #3a4a2b;
            transform: translateY(-1px) scale(1.05);
            box-shadow: 0 4px 12px rgba(75, 92, 59, 0.3);
        }

        /* Pagination */
        .pagination-container {
            padding: 20px;
            display: flex;
            justify-content: center;
            background: white;
            border-top: 1px solid #e2e8f0;
        }

        .pagination {
            display: flex;
            gap: 8px;
        }

        .page-btn {
            width: 40px;
            height: 40px;
            border: 1px solid #e2e8f0;
            background: white;
            color: #4B5C3B;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .page-btn:hover {
            background: #f0f9f4;
            border-color: #4B5C3B;
        }

        .page-btn.active {
            background: #4B5C3B;
            color: white;
            border-color: #4B5C3B;
        }

        /* Animations */
        @keyframes fadeInDown {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }
            
            .page-header {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }
            
            .header-actions {
                flex-direction: column;
                gap: 1rem;
            }
            
            .search-input {
                width: 100%;
            }
            
            .table-wrapper {
                overflow-x: scroll;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 4px;
            }
            
            .btn {
                min-width: 60px;
                font-size: 12px;
                padding: 8px 12px;
            }
        }
    </style>
</body>
</html>
