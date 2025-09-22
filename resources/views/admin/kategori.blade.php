<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <button class="add-btn" onclick="openAddModal()">
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
                                    <th>Slug</th>
                                    <th>Header Type</th>
                                    <th>Status</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories ?? [] as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="category-name">
                                        @if($category->icon)
                                            <i class="{{ $category->icon }}" style="margin-right: 8px;"></i>
                                        @endif
                                        {{ $category->name }}
                                    </td>
                                    <td class="slug">{{ $category->slug }}</td>
                                    <td class="header-type">
                                        <span class="badge badge-{{ $category->header_type }}">{{ ucfirst($category->header_type) }}</span>
                                    </td>
                                    <td>
                                        <span class="status-badge {{ $category->is_active ? 'active' : 'inactive' }}">
                                            {{ $category->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td class="timestamp">{{ $category->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-edit" onclick="editCategory({{ $category->id }})">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-toggle" onclick="toggleStatus({{ $category->id }})">
                                                <i class="fas fa-{{ $category->is_active ? 'eye-slash' : 'eye' }}"></i>
                                                {{ $category->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                            </button>
                                            <button class="btn btn-delete" onclick="deleteCategory({{ $category->id }})">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <div class="empty-state">
                                            <i class="fas fa-folder-open" style="font-size: 48px; color: #ccc; margin-bottom: 16px;"></i>
                                            <p>Belum ada kategori. <a href="#" onclick="openAddModal()">Tambah kategori pertama</a></p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
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

    <!-- Modal untuk Tambah/Edit Kategori -->
    <div id="categoryModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle">Tambah Kategori</h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <form id="categoryForm">
                @csrf
                <input type="hidden" id="categoryId" name="id">
                
                <div class="form-group">
                    <label for="name">Nama Kategori *</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" rows="2"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="icon">Icon (Font Awesome)</label>
                    <input type="text" id="icon" name="icon" placeholder="fas fa-heart">
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="header_type">Tipe Header *</label>
                        <select id="header_type" name="header_type" required>
                            <option value="header">Header Default</option>
                            <option value="header1">Header Hero</option>
                            <option value="hero-mental">Hero Mental</option>
                            <option value="hero-olga">Hero Olahraga</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" id="is_active" name="is_active" checked>
                            <span class="checkmark"></span>
                            Aktif
                        </label>
                    </div>
                </div>
                
                <div class="modal-actions">
                    <button type="button" class="btn btn-cancel" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn btn-save">Simpan</button>
                </div>
            </form>
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
            overflow: visible;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        thead {
            background: #f7fafc;
        }

        th {
            padding: 12px 16px;
            text-align: left;
            font-weight: 500;
            color: #4E342E;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid #e2e8f0;
            font-family: 'Poppins', sans-serif;
        }
        
        /* Specific column widths */
        th:nth-child(1) { width: 4%; }   /* No */
        th:nth-child(2) { width: 22%; }  /* Nama Kategori */
        th:nth-child(3) { width: 14%; }  /* Slug */
        th:nth-child(4) { width: 12%; }  /* Header Type */
        th:nth-child(5) { width: 8%; }   /* Status */
        th:nth-child(6) { width: 6%; }   /* Urutan */
        th:nth-child(7) { width: 12%; }  /* Dibuat */
        th:nth-child(8) { width: 22%; }  /* Aksi */

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
            padding: 12px 16px;
            font-size: 13px;
            font-weight: 500;
            color: #4B5C3B;
            font-family: 'Poppins', sans-serif;
            vertical-align: middle;
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
            gap: 4px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 4px;
            transition: all 0.3s ease;
            min-width: 70px;
            justify-content: center;
            position: relative;
            overflow: hidden;
            white-space: nowrap;
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

        /* Status Badges */
        .status-badge {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-badge.active {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status-badge.inactive {
            background: #f3f4f6;
            color: #6b7280;
        }
        
        .badge {
            padding: 2px 6px;
            border-radius: 8px;
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        
        .badge-header { background: #dbeafe; color: #1e40af; }
        .badge-header1 { background: #fef3c7; color: #d97706; }
        .badge-hero-mental { background: #e0e7ff; color: #5b21b6; }
        .badge-hero-olga { background: #dcfce7; color: #166534; }
        
        .btn-toggle {
            background: #6b7280;
            color: white;
        }
        
        .btn-toggle:hover {
            background: #4b5563;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #6b7280;
        }
        
        .empty-state a {
            color: #4B5C3B;
            text-decoration: none;
            font-weight: 500;
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            backdrop-filter: blur(4px);
        }
        
        .modal-content {
            background-color: white;
            margin: 3% auto;
            padding: 0;
            border-radius: 12px;
            width: 95%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            animation: modalSlideIn 0.3s ease;
        }
        
        @keyframes modalSlideIn {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .modal-header {
            padding: 20px 24px 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 20px;
        }
        
        .modal-header h2 {
            font-size: 20px;
            font-weight: 600;
            color: #111827;
        }
        
        .close {
            color: #9ca3af;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .close:hover {
            color: #374151;
        }
        
        .form-group {
            margin-bottom: 16px;
            padding: 0 24px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            padding: 0 24px;
            margin-bottom: 16px;
        }
        
        
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #374151;
            font-size: 14px;
        }
        
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }
        
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #4B5C3B;
            box-shadow: 0 0 0 3px rgba(75, 92, 59, 0.1);
        }
        
        .checkbox-label {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-weight: 500;
            color: #374151;
        }
        
        .checkbox-label input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
        }
        
        .modal-actions {
            padding: 20px 24px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }
        
        .btn-cancel {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
        }
        
        .btn-cancel:hover {
            background: #e5e7eb;
        }
        
        .btn-save {
            background: #4B5C3B;
            color: white;
        }
        
        .btn-save:hover {
            background: #3a4a2b;
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
                overflow-x: auto;
            }
            
            .table-container {
                overflow-x: auto;
            }
            
            table {
                min-width: 800px;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 4px;
            }
            
            .btn {
                min-width: 60px;
                font-size: 11px;
                padding: 6px 10px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .modal-content {
                margin: 5% auto;
                width: 98%;
                max-width: none;
            }
            
            /* Hide less important columns on mobile */
            th:nth-child(3), td:nth-child(3), /* Slug */
            th:nth-child(6), td:nth-child(6)  /* Dibuat */ {
                display: none;
            }
            
            /* Adjust remaining column widths for mobile */
            th:nth-child(1) { width: 8%; }   /* No */
            th:nth-child(2) { width: 30%; }  /* Nama Kategori */
            th:nth-child(4) { width: 15%; }  /* Header Type */
            th:nth-child(5) { width: 12%; }  /* Status */
            th:nth-child(7) { width: 35%; }  /* Aksi */
        }
    </style>

    <script>
        // CSRF Token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
        
        // Modal Functions
        function openAddModal() {
            document.getElementById('modalTitle').textContent = 'Tambah Kategori';
            document.getElementById('categoryForm').reset();
            document.getElementById('categoryId').value = '';
            document.getElementById('is_active').checked = true;
            document.getElementById('categoryModal').style.display = 'block';
        }
        
        function closeModal() {
            document.getElementById('categoryModal').style.display = 'none';
        }
        
        // Edit Category
        async function editCategory(id) {
            try {
                const response = await fetch(`/admin/categories/${id}/edit`);
                const category = await response.json();
                
                document.getElementById('modalTitle').textContent = 'Edit Kategori';
                document.getElementById('categoryId').value = category.id;
                document.getElementById('name').value = category.name;
                document.getElementById('description').value = category.description || '';
                document.getElementById('icon').value = category.icon || '';
                document.getElementById('header_type').value = category.header_type;
                document.getElementById('is_active').checked = category.is_active;
                
                document.getElementById('categoryModal').style.display = 'block';
            } catch (error) {
                console.error('Error:', error);
                alert('Gagal memuat data kategori');
            }
        }
        
        // Toggle Status
        async function toggleStatus(id) {
            try {
                const response = await fetch(`/admin/categories/${id}/toggle`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                
                const result = await response.json();
                
                if (result.success) {
                    location.reload();
                } else {
                    alert('Gagal mengubah status kategori');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Gagal mengubah status kategori');
            }
        }
        
        // Delete Category
        async function deleteCategory(id) {
            if (!confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
                return;
            }
            
            try {
                const response = await fetch(`/admin/categories/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                });
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const result = await response.json();
                
                if (result.success) {
                    alert(result.message || 'Kategori berhasil dihapus!');
                    location.reload();
                } else {
                    alert(result.message || 'Gagal menghapus kategori');
                }
            } catch (error) {
                console.error('Error deleting category:', error);
                alert('Gagal menghapus kategori: ' + error.message);
            }
        }
        
        // Form Submit
        document.getElementById('categoryForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const categoryId = document.getElementById('categoryId').value;
            
            // Convert FormData to JSON
            const data = {};
            for (let [key, value] of formData.entries()) {
                if (key === 'is_active') {
                    data[key] = document.getElementById('is_active').checked;
                } else {
                    data[key] = value;
                }
            }
            
            try {
                const url = categoryId ? `/admin/categories/${categoryId}` : '/admin/categories';
                const method = categoryId ? 'PUT' : 'POST';
                
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(data)
                });
                
                const result = await response.json();
                
                if (result.success) {
                    closeModal();
                    location.reload();
                } else {
                    alert(result.message || 'Gagal menyimpan kategori');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Gagal menyimpan kategori');
            }
        });
        
        // Search functionality
        document.querySelector('.search-input').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const categoryName = row.querySelector('.category-name')?.textContent.toLowerCase();
                if (categoryName && categoryName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        
        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('categoryModal');
            if (event.target === modal) {
                closeModal();
            }
        });
    </script>
</body>
</html>
