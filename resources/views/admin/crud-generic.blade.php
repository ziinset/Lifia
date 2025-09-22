@extends('layouts.admin')

@section('title', 'Kelola ' . $categoryModel->name)

@section('content')
<div class="admin-content">
    <div class="admin-header">
        <h1>Kelola {{ $categoryModel->name }}</h1>
        <p>Kelola artikel untuk kategori {{ $categoryModel->name }}</p>
    </div>

    <div class="admin-body">
        <div class="crud-container">
            <div class="crud-header">
                <div class="crud-title">
                    <h2>Daftar Artikel {{ $categoryModel->name }}</h2>
                    <p>Total: <span id="total-articles">0</span> artikel</p>
                </div>
                <div class="crud-actions">
                    <button class="btn-primary" onclick="openAddModal()">
                        <i class="fas fa-plus"></i>
                        Tambah Artikel
                    </button>
                </div>
            </div>

            <div class="crud-filters">
                <div class="search-box">
                    <input type="text" id="search-input" placeholder="Cari artikel..." onkeyup="searchArticles()">
                    <i class="fas fa-search"></i>
                </div>
                <div class="filter-options">
                    <select id="status-filter" onchange="filterArticles()">
                        <option value="">Semua Status</option>
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>

            <div class="crud-table-container">
                <table class="crud-table" id="articles-table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="articles-tbody">
                        <!-- Articles will be loaded here via AJAX -->
                    </tbody>
                </table>
            </div>

            <div class="crud-pagination" id="pagination-container">
                <!-- Pagination will be loaded here -->
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Modal -->
<div id="article-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modal-title">Tambah Artikel</h3>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <div class="modal-body">
            <form id="article-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="article-id" name="id">
                <input type="hidden" name="category" value="{{ $categoryModel->slug }}">
                
                <div class="form-group">
                    <label for="title">Judul Artikel *</label>
                    <input type="text" id="title" name="title" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Deskripsi Singkat</label>
                    <textarea id="description" name="description" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="content">Konten Artikel *</label>
                    <textarea id="content" name="content" rows="10" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="author">Penulis</label>
                    <input type="text" id="author" name="author" value="{{ Auth::user()->nama_lengkap ?? Auth::user()->email }}">
                </div>
                
                <div class="form-group">
                    <label for="keywords">Keywords (pisahkan dengan koma)</label>
                    <input type="text" id="keywords" name="keywords" placeholder="keyword1, keyword2, keyword3">
                </div>
                
                <div class="form-group">
                    <label for="image">Gambar Artikel</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <div id="image-preview" style="display: none;">
                        <img id="preview-img" src="" alt="Preview" style="max-width: 200px; margin-top: 10px;">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="is_published">Status</label>
                    <select id="is_published" name="is_published">
                        <option value="1">Published</option>
                        <option value="0">Draft</option>
                    </select>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn-secondary" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Add your CRUD styles here */
.admin-content {
    padding: 20px;
}

.admin-header h1 {
    color: #4E342E;
    margin-bottom: 5px;
}

.crud-container {
    background: white;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.crud-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.crud-title h2 {
    color: #4E342E;
    margin-bottom: 5px;
}

.btn-primary {
    background: #556B2F;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-primary:hover {
    background: #4a5f29;
}

.crud-filters {
    display: flex;
    gap: 16px;
    margin-bottom: 24px;
}

.search-box {
    position: relative;
    flex: 1;
}

.search-box input {
    width: 100%;
    padding: 12px 40px 12px 16px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.search-box i {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #666;
}

.crud-table {
    width: 100%;
    border-collapse: collapse;
}

.crud-table th,
.crud-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

.crud-table th {
    background: #f8f9fa;
    font-weight: 600;
    color: #4E342E;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
}

.modal-content {
    background-color: white;
    margin: 5% auto;
    padding: 0;
    border-radius: 12px;
    width: 80%;
    max-width: 600px;
    max-height: 90vh;
    overflow-y: auto;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    border-bottom: 1px solid #eee;
}

.modal-body {
    padding: 24px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #4E342E;
}

.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
}

.form-actions {
    display: flex;
    gap: 12px;
    justify-content: flex-end;
    margin-top: 24px;
}

.btn-secondary {
    background: #6c757d;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    cursor: pointer;
}

.close {
    font-size: 24px;
    cursor: pointer;
    color: #666;
}

.close:hover {
    color: #000;
}
</style>

<script>
// Add your CRUD JavaScript here
function openAddModal() {
    document.getElementById('modal-title').textContent = 'Tambah Artikel';
    document.getElementById('article-form').reset();
    document.getElementById('article-id').value = '';
    document.getElementById('article-modal').style.display = 'block';
}

function closeModal() {
    document.getElementById('article-modal').style.display = 'none';
}

function searchArticles() {
    // Implement search functionality
    console.log('Search articles');
}

function filterArticles() {
    // Implement filter functionality
    console.log('Filter articles');
}

// Load articles on page load
document.addEventListener('DOMContentLoaded', function() {
    loadArticles();
});

function loadArticles() {
    // Implement AJAX loading of articles
    console.log('Loading articles for category: {{ $categoryModel->slug }}');
}
</script>
@endsection
