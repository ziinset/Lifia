<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Gaya Hidup Vegan - Admin Lifia</title>
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
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        .main-content {
            flex: 1;
            margin-left: 260px;
            background-color: #f8f9fa;
        }

        .content-wrapper {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Page Header */
        .page-header {
            background: transparent;
            padding: 2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            color: #000000;
            margin: 0;
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

        .search-input:focus {
            outline: none;
            border-color: #4B5C3B;
            background: transparent;
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(75, 92, 59, 0.15);
        }

        .search-input::placeholder {
            color: #4B5C3B;
            opacity: 0.7;
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
        }

        tbody tr {
            border-bottom: 1px solid #e2e8f0;
            border-left: 4px solid transparent;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        tbody tr:hover {
            background: linear-gradient(135deg, #f0f9f4 0%, #ecfdf5 100%);
            transform: translateX(4px);
            box-shadow: 0 4px 15px rgba(85, 107, 47, 0.12);
            border-left-color: #556B2F;
        }

        td {
            padding: 16px 20px;
            font-size: 14px;
            font-weight: 500;
            color: #4B5C3B;
        }

        .article-title {
            font-weight: 500;
            color: #4B5C3B;
        }

        .timestamp {
            color: #4B5C3B;
            font-size: 13px;
            font-weight: 500;
        }

        .author {
            color: #4B5C3B;
            font-weight: 500;
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
            width: 36px;
            height: 36px;
            border: 1px solid #e2e8f0;
            background: white;
            color: #4a5568;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .page-btn:hover {
            border-color: #556B2F;
            color: #556B2F;
        }

        .page-btn.active {
            background: #556B2F;
            color: white;
            border-color: #556B2F;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            .content-wrapper {
                padding: 1rem;
            }

            .page-header {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

            .header-actions {
                flex-direction: column;
            }

            .search-input {
                width: 100%;
            }

            .table-wrapper {
                font-size: 12px;
            }

            th, td {
                padding: 12px 8px;
            }
        }

        /* Content animations */
        .page-header {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease 0.2s forwards;
        }

        .table-container {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease 0.4s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Table row animations */
        tbody tr {
            opacity: 0;
            transform: translateX(-10px);
            animation: slideInLeft 0.4s ease forwards;
        }

        tbody tr:nth-child(1) { animation-delay: 0.6s; }
        tbody tr:nth-child(2) { animation-delay: 0.7s; }
        tbody tr:nth-child(3) { animation-delay: 0.8s; }
        tbody tr:nth-child(4) { animation-delay: 0.9s; }
        tbody tr:nth-child(5) { animation-delay: 1.0s; }
        tbody tr:nth-child(6) { animation-delay: 1.1s; }

        @keyframes slideInLeft {
            to {
                opacity: 1;
                transform: translateX(0);
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
                <!-- Page Header -->
                <div class="page-header">
                    <h1 class="page-title">Artikel Gaya Hidup Vegan</h1>
                    <div class="header-actions">
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="search-input" placeholder="Cari Artikel Disini">
                        </div>
                        <button class="add-btn">
                            <i class="fas fa-plus"></i>
                            Tambah Artikel
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
                                    <th>Nama Artikel</th>
                                    <th>Timestamp</th>
                                    <th>Penulis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="article-title">Panduan Memulai Gaya Hidup Vegan</td>
                                    <td class="timestamp">19:40:35</td>
                                    <td class="author">Admin</td>
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
                                    <td class="article-title">Resep Makanan Vegan yang Lezat</td>
                                    <td class="timestamp">17:17:30</td>
                                    <td class="author">Admin</td>
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
                                    <td class="article-title">Manfaat Kesehatan dari Diet Vegan</td>
                                    <td class="timestamp">03:20:16</td>
                                    <td class="author">Admin</td>
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

    <script>
        // Search functionality
        document.querySelector('.search-input').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const articleTitle = row.querySelector('.article-title').textContent.toLowerCase();
                const author = row.querySelector('.author').textContent.toLowerCase();
                
                if (articleTitle.includes(searchTerm) || author.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Delete confirmation
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
                    // Add delete functionality here
                    console.log('Delete article');
                }
            });
        });

        // Edit functionality
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', function() {
                // Add edit functionality here
                console.log('Edit article');
            });
        });

        // Add article functionality
        document.querySelector('.add-btn').addEventListener('click', function() {
            // Add create functionality here
            console.log('Add new article');
        });

        // Pagination functionality
        document.querySelectorAll('.page-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
