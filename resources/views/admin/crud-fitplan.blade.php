<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kelola FitPlan Premium - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            margin-left: 260px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content-wrapper {
            padding: 32px;
            flex: 1;
        }

        /* Page Header */
        .page-header {
            margin-bottom: 32px;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInDown 0.6s ease forwards;
        }

        @keyframes fadeInDown {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #000000;
            margin-bottom: 8px;
            font-family: 'Poppins', sans-serif;
        }

        .page-subtitle {
            font-size: 14px;
            color: #6b7280;
            font-family: 'Poppins', sans-serif;
        }

        /* Section Cards */
        .section-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border: 1px solid #e5e7eb;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
            position: relative;
        }

        /* Artikel Terbaru section - contain form within card */
        .section-card.article-section {
            overflow: visible;
        }

        .section-card:nth-child(1) { animation-delay: 0.1s; }
        .section-card:nth-child(2) { animation-delay: 0.2s; }
        .section-card:nth-child(3) { animation-delay: 0.3s; }
        .section-card:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #000000;
            margin-bottom: 4px;
            font-family: 'Poppins', sans-serif;
        }

        .section-description {
            font-size: 13px;
            color: #6b7280;
            font-family: 'Poppins', sans-serif;
        }

        .section-actions {
            display: flex;
            gap: 12px;
        }

        .btn-primary {
            background: #556B2F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary:hover {
            background: #4a5f29;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(85, 107, 47, 0.3);
        }

        .btn-primary i {
            font-size: 14px;
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
            margin-top: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f7fafc;
        }

        th {
            padding: 12px 16px;
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
        }

        tbody tr:hover {
            background: #f0f9f4;
        }

        td {
            padding: 12px 16px;
            font-size: 13px;
            font-weight: 500;
            color: #4B5C3B;
            font-family: 'Poppins', sans-serif;
            vertical-align: middle;
        }

        .article-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
        }

        .btn-action {
            background: #556B2F;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: all 0.3s ease;
            margin-right: 4px;
            font-family: 'Poppins', sans-serif;
        }

        .btn-action:hover {
            background: #4a5f29;
            transform: translateY(-1px);
        }

        .btn-action i {
            font-size: 12px;
        }

        .btn-status {
            background: #e5e7eb;
            color: #6b7280;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-right: 4px;
            font-family: 'Poppins', sans-serif;
        }

        .btn-status.active {
            background: #556B2F;
            color: white;
        }

        .btn-status:hover:not(.active) {
            background: #d1d5db;
        }

        .btn-status.active:hover {
            background: #4a5f29;
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #6b7280;
        }

        .empty-state i {
            font-size: 48px;
            color: #ccc;
            margin-bottom: 16px;
        }

        /* Article Content Area */
        .article-content-area {
            position: relative;
            margin-top: 20px;
        }

        /* Article Form Styles */
        .article-form-container {
            display: none;
            background: white;
            padding: 24px;
            border-radius: 8px;
            animation: slideDown 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 0;
        }

        .article-form-container.show {
            display: block;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Table Container */
        .article-content-area .table-container {
            transition: opacity 0.3s ease, visibility 0.3s ease, max-height 0.3s ease;
            opacity: 1;
            visibility: visible;
            position: relative;
            max-height: 10000px;
            overflow: visible;
        }

        .article-content-area .table-container.hidden {
            opacity: 0;
            visibility: hidden;
            max-height: 0;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .btn-close-form {
            background: #556B2F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .btn-close-form:hover {
            background: #4a5f29;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(85, 107, 47, 0.3);
        }

        .article-form {
            background: #f9fafb;
            padding: 24px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            font-family: 'Poppins', sans-serif;
        }

        .form-input,
        .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #556B2F;
            box-shadow: 0 0 0 3px rgba(85, 107, 47, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* File Input Styles */
        .file-input-wrapper {
            position: relative;
        }

        .file-input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .file-label {
            display: flex;
            align-items: center;
            gap: 20px;
            cursor: pointer;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
            min-height: 48px;
        }

        .file-button {
            background: #f3f4f6;
            color: #4E342E;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            white-space: nowrap;
            border: 1px solid #9ca3af;
            cursor: pointer;
        }

        .file-label:hover .file-button {
            background: #e5e7eb;
            border-color: #6b7280;
        }

        .file-name {
            font-size: 14px;
            color: #4E342E;
            font-family: 'Poppins', sans-serif;
            flex: 1;
            margin-left: 8px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .btn-submit {
            background: #556B2F;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .btn-submit:hover {
            background: #4a5f29;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(85, 107, 47, 0.3);
        }

        .btn-submit i {
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            .content-wrapper {
                padding: 16px;
            }

            .section-header {
                flex-direction: column;
                gap: 16px;
            }

            .table-container {
                overflow-x: auto;
            }

            table {
                min-width: 800px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-actions {
                justify-content: center;
            }

            .btn-submit {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
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
                    <h1 class="page-title">Kelola Artikel FitPlan Premium</h1>
                    <p class="page-subtitle">Kelola konten premium untuk kategori FitPlan</p>
                </div>

                <!-- Pengaturan Kategori Section -->
                <div class="section-card">
                    <div class="section-header">
                        <div>
                            <h2 class="section-title">Pengaturan Kategori</h2>
                            <p class="section-description">Atur banner dan deskripsi untuk kategori panduan olahraga</p>
                        </div>
                        <div class="section-actions">
                            <button class="btn-primary" onclick="openCategorySettings()">
                                <i class="fas fa-cog"></i>
                                Ubah Pengaturan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Artikel Terbaru Section -->
                <div class="section-card article-section">
                    <div class="section-header">
                        <div>
                            <h2 class="section-title">Artikel Terbaru</h2>
                            <p class="section-description">Kelola 4 artikel terbaru yang tampil di halaman kategori</p>
                        </div>
                        <div class="section-actions">
                            <button class="btn-primary" id="btnTambahArtikel" onclick="toggleArticleForm()">
                                <i class="fas fa-plus"></i>
                                Tambah Artikel
                            </button>
                            <button class="btn-close-form" id="btnTutupForm" onclick="toggleArticleForm()" style="display: none;">
                                <i class="fas fa-times"></i>
                                Tutup Form
                            </button>
                        </div>
                    </div>

                    <!-- Content Area: Form or Table -->
                    <div class="article-content-area">
                        <!-- Form Tambah Artikel -->
                        <div class="article-form-container" id="articleFormContainer" style="display: none;">
                            <form id="articleForm" class="article-form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="article_id" name="article_id" value="">
                                <input type="hidden" id="article_category" name="category" value="{{ $category ?? 'turun-berat-badan' }}">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="judul_artikel">Judul Artikel</label>
                                        <input type="text" id="judul_artikel" name="judul_artikel" class="form-input" placeholder="Masukkan judul artikel">
                                    </div>
                                    <div class="form-group">
                                        <label for="penulis">Penulis</label>
                                        <input type="text" id="penulis" name="penulis" class="form-input" placeholder="Masukkan nama penulis">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi_singkat">Deskripsi Singkat</label>
                                    <textarea id="deskripsi_singkat" name="deskripsi_singkat" class="form-textarea" rows="4" placeholder="Masukkan deskripsi singkat artikel"></textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="gambar_artikel">Gambar Artikel</label>
                                        <div class="file-input-wrapper">
                                            <input type="file" id="gambar_artikel" name="gambar_artikel" class="file-input" accept="image/*" onchange="updateFileName(this)">
                                            <label for="gambar_artikel" class="file-label">
                                                <span class="file-button">Choose File</span>
                                                <span class="file-name" id="fileName">No File Choosen</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tautan_halaman">Tautan Halaman</label>
                                        <input type="text" id="tautan_halaman" name="tautan_halaman" class="form-input" placeholder="Masukkan tautan halaman">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn-submit" id="submitArticleBtn" onclick="submitArticle()">
                                        <i class="fas fa-plus"></i>
                                        <span id="submitBtnText">Tambah Artikel Terbaru</span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Table Container -->
                        <div class="table-container" id="articleTableContainer">
                        <table>
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA ARTIKEL</th>
                                    <th>TANGGAL</th>
                                    <th>PENULIS</th>
                                    <th>UTAMA</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="articlesTableBody">
                                <!-- Articles will be loaded here via AJAX -->
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

                <!-- Banner Slider Section -->
                <div class="section-card">
                    <div class="section-header">
                        <div>
                            <h2 class="section-title">Banner Slider</h2>
                            <p class="section-description">Kelola gambar slider di halaman kategori</p>
                        </div>
                        <div class="section-actions">
                            <button class="btn-primary" onclick="openAddBanner()">
                                <i class="fas fa-plus"></i>
                                Tambah Banner
                            </button>
                        </div>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>GAMBAR</th>
                                    <th>JUDUL</th>
                                    <th>TAUTAN</th>
                                    <th>URUTAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="https://placehold.co/80x60/556B2F/white?text=Squat" alt="Banner" class="article-image">
                                    </td>
                                    <td>Orang Squat</td>
                                    <td>-</td>
                                    <td>0</td>
                                    <td>
                                        <button class="btn-action" onclick="editBanner(1)">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </button>
                                        <button class="btn-action" onclick="deleteBanner(1)">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Topik Populer Section -->
                <div class="section-card">
                    <div class="section-header">
                        <div>
                            <h2 class="section-title">Topik Populer</h2>
                            <p class="section-description">Kelola topik populer yang ditampilkan di halaman kategori</p>
                        </div>
                        <div class="section-actions">
                            <button class="btn-primary" onclick="openAddTopic()">
                                <i class="fas fa-plus"></i>
                                Tambah Topik Populer
                            </button>
                        </div>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>GAMBAR</th>
                                    <th>JUDUL</th>
                                    <th>UTAMA</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="https://placehold.co/80x60/556B2F/white?text=Squat" alt="Topic" class="article-image">
                                    </td>
                                    <td>Orang Squat</td>
                                    <td>
                                        <button class="btn-status active">Utama</button>
                                        <button class="btn-status">Jadikan Biasa</button>
                                    </td>
                                    <td>
                                        <button class="btn-action" onclick="editTopic(1)">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </button>
                                        <button class="btn-action" onclick="deleteTopic(1)">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
        const currentCategory = '{{ $category ?? "turun-berat-badan" }}';
        let currentEditId = null;

        // Load articles on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadArticles();
        });

        // Load articles from database
        async function loadArticles() {
            try {
                const response = await fetch(`/admin/fitplan/articles?category=${currentCategory}`, {
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();
                if (data.success) {
                    renderArticles(data.articles);
                }
            } catch (error) {
                console.error('Error loading articles:', error);
            }
        }

        // Render articles to table
        function renderArticles(articles) {
            const tbody = document.getElementById('articlesTableBody');
            tbody.innerHTML = '';

            if (articles.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" style="text-align: center; padding: 40px; color: #6b7280;">Belum ada artikel. Klik "Tambah Artikel" untuk menambahkan.</td></tr>';
                return;
            }

            articles.forEach((article, index) => {
                const row = document.createElement('tr');
                const date = new Date(article.created_at);
                const formattedDate = date.toLocaleString('id-ID', {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });

                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${article.title}</td>
                    <td>${formattedDate}</td>
                    <td>${article.author}</td>
                    <td>
                        <button class="btn-status ${article.is_featured ? '' : 'active'}" onclick="toggleFeatured(${article.id}, false)">Biasa</button>
                        <button class="btn-status ${article.is_featured ? 'active' : ''}" onclick="toggleFeatured(${article.id}, true)">Jadikan Utama</button>
                    </td>
                    <td>
                        <button class="btn-action" onclick="editArticle(${article.id})">
                            <i class="fas fa-edit"></i>
                            Edit
                        </button>
                        <button class="btn-action" onclick="deleteArticle(${article.id})">
                            <i class="fas fa-trash"></i>
                            Hapus
                        </button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }

        // Placeholder functions for actions
        function openCategorySettings() {
            alert('Fitur Ubah Pengaturan akan segera tersedia');
        }

        // Toggle Article Form
        function toggleArticleForm() {
            const formContainer = document.getElementById('articleFormContainer');
            const tableContainer = document.getElementById('articleTableContainer');
            const btnTambah = document.getElementById('btnTambahArtikel');
            const btnTutup = document.getElementById('btnTutupForm');

            if (!formContainer.classList.contains('show')) {
                // Show form, hide table
                formContainer.classList.add('show');
                formContainer.style.display = 'block';
                tableContainer.classList.add('hidden');
                btnTambah.style.display = 'none';
                btnTutup.style.display = 'flex';

                // Smooth scroll to form if needed
                setTimeout(() => {
                    formContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            } else {
                // Hide form, show table
                formContainer.classList.remove('show');
                formContainer.style.display = 'none';
                tableContainer.classList.remove('hidden');
                btnTambah.style.display = 'flex';
                btnTutup.style.display = 'none';

                // Reset form
                resetForm();
            }
        }

        // Reset form
        function resetForm() {
            document.getElementById('articleForm').reset();
            document.getElementById('article_id').value = '';
            document.getElementById('fileName').textContent = 'No File Choosen';
            document.getElementById('submitBtnText').textContent = 'Tambah Artikel Terbaru';
            currentEditId = null;
        }

        // Update file name display
        function updateFileName(input) {
            const fileName = input.files[0] ? input.files[0].name : 'No File Choosen';
            document.getElementById('fileName').textContent = fileName;
        }

        // Submit article form
        async function submitArticle() {
            const form = document.getElementById('articleForm');
            const formData = new FormData(form);

            // Validation
            const judul = document.getElementById('judul_artikel').value.trim();
            const penulis = document.getElementById('penulis').value.trim();
            const deskripsi = document.getElementById('deskripsi_singkat').value.trim();

            if (!judul) {
                alert('Judul artikel harus diisi!');
                return;
            }
            if (!penulis) {
                alert('Penulis harus diisi!');
                return;
            }
            if (!deskripsi) {
                alert('Deskripsi singkat harus diisi!');
                return;
            }

            // Add category
            formData.append('category', currentCategory);
            // Use form field names directly
            formData.append('judul_artikel', judul);
            formData.append('penulis', penulis);
            formData.append('deskripsi_singkat', deskripsi);
            formData.append('tautan_halaman', document.getElementById('tautan_halaman').value);

            const articleId = document.getElementById('article_id').value;
            const url = articleId
                ? `/admin/fitplan/articles/${articleId}`
                : '/admin/fitplan/articles';
            const method = articleId ? 'PUT' : 'POST';

            try {
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    alert(data.message || 'Artikel berhasil disimpan!');
                    resetForm();
                    toggleArticleForm();
                    loadArticles();
                } else {
                    alert(data.message || 'Gagal menyimpan artikel');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan artikel');
            }
        }

        function openAddArticle() {
            resetForm();
            toggleArticleForm();
        }

        // Edit article
        async function editArticle(id) {
            try {
                const response = await fetch(`/admin/fitplan/articles?category=${currentCategory}`, {
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();
                if (data.success) {
                    const article = data.articles.find(a => a.id == id);
                    if (article) {
                        document.getElementById('article_id').value = article.id;
                        document.getElementById('judul_artikel').value = article.title;
                        document.getElementById('penulis').value = article.author;
                        document.getElementById('deskripsi_singkat').value = article.description;
                        document.getElementById('tautan_halaman').value = article.link || '';
                        document.getElementById('submitBtnText').textContent = 'Update Artikel';
                        currentEditId = article.id;

                        toggleArticleForm();
                    }
                }
            } catch (error) {
                console.error('Error loading article:', error);
                alert('Gagal memuat data artikel');
            }
        }

        // Delete article
        async function deleteArticle(id) {
            if (!confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
                return;
            }

            try {
                const response = await fetch(`/admin/fitplan/articles/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    alert('Artikel berhasil dihapus');
                    loadArticles();
                } else {
                    alert('Gagal menghapus artikel');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus artikel');
            }
        }

        // Toggle featured status
        async function toggleFeatured(id, isFeatured) {
            try {
                const response = await fetch(`/admin/fitplan/articles/${id}/toggle-featured`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    loadArticles();
                } else {
                    alert('Gagal mengubah status utama');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengubah status');
            }
        }

        function openAddBanner() {
            alert('Fitur Tambah Banner akan segera tersedia');
        }

        function editBanner(id) {
            alert('Edit banner ID: ' + id);
        }

        function deleteBanner(id) {
            if (confirm('Apakah Anda yakin ingin menghapus banner ini?')) {
                alert('Banner berhasil dihapus');
            }
        }

        function openAddTopic() {
            alert('Fitur Tambah Topik Populer akan segera tersedia');
        }

        function editTopic(id) {
            alert('Edit topik ID: ' + id);
        }

        function deleteTopic(id) {
            if (confirm('Apakah Anda yakin ingin menghapus topik ini?')) {
                alert('Topik berhasil dihapus');
            }
        }
    </script>
</body>
</html>

