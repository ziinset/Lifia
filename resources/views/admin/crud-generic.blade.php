<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel {{ $categoryModel->name }} - Admin Lifia</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family:'Poppins',sans-serif; font-weight:500; background:#f8f9fa; color:#4B5C3B; }
        .admin-container { display:flex; min-height:100vh }
        .main-content { flex:1; margin-left:260px; background:#f8f9fa }
        .content-wrapper { padding:0 2rem 2rem; max-width:1200px; margin:0 auto }
        /* Page Header */
        .page-header { background:transparent; padding:2rem; margin-bottom:2rem; display:flex; justify-content:space-between; align-items:center }
        .page-title { font-size:24px; font-weight:700; color:#000; margin:0 }
        .header-actions { display:flex; gap:1rem; align-items:center }
        .search-box { position:relative }
        .search-input { padding:10px 16px 10px 40px; border:2px solid #4B5C3B; border-radius:25px; font-size:14px; width:300px; background:transparent; color:#4B5C3B; font-weight:500; transition:all .3s }
        .search-input:focus { outline:none; border-color:#4B5C3B; background:transparent }
        .search-icon { position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#4B5C3B }
        .add-btn { background:#4B5C3B; color:#fff; padding:10px 20px; border:none; border-radius:25px; font-size:14px; font-weight:500; cursor:pointer; display:flex; align-items:center; gap:8px; transition:all .3s }
        .add-btn:hover { background:#3a4a2b; transform:translateY(-1px) }
        /* Table */
        .table-container { background:#fff; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.05); overflow:hidden; border-top:4px solid #556B2F }
        .table-wrapper { overflow-x:auto }
        table { width:100%; border-collapse:collapse }
        thead { background:#f7fafc }
        th { padding:16px 20px; text-align:left; font-weight:500; color:#4E342E; font-size:12px; text-transform:uppercase; letter-spacing:.05em; border-bottom:1px solid #e2e8f0 }
        tbody tr { border-bottom:1px solid #e2e8f0; border-left:4px solid transparent; transition:all .4s cubic-bezier(0.25,0.46,0.45,0.94) }
        tbody tr:hover { background:linear-gradient(135deg,#f0f9f4 0%,#ecfdf5 100%); transform:translateX(4px); box-shadow:0 4px 15px rgba(85,107,47,.12); border-left-color:#556B2F }
        td { padding:16px 20px; font-size:14px; font-weight:500; color:#4B5C3B }
        .article-title { font-weight:500; color:#4B5C3B }
        .timestamp { color:#4B5C3B; font-size:13px; font-weight:500 }
        .author { color:#4B5C3B; font-weight:500 }
        /* Actions */
        .action-buttons { display:flex; gap:8px }
        .btn { padding:10px 16px; border:none; border-radius:8px; font-size:13px; font-weight:500; cursor:pointer; display:flex; align-items:center; gap:6px; transition:all .2s; min-width:80px; justify-content:center }
        .btn-edit { background:#4B5C3B; color:#fff }
        .btn-edit:hover { background:#3a4a2b }
        .btn-delete { background:#4B5C3B; color:#fff }
        .btn-delete:hover { background:#3a4a2b }
        /* Pagination */
        .pagination-container { padding:20px; display:flex; justify-content:center; background:#fff; border-top:1px solid #e2e8f0 }
        .pagination { display:flex; gap:8px }
        .page-btn { width:36px; height:36px; border:1px solid #e2e8f0; background:#fff; color:#4a5568; border-radius:6px; cursor:pointer; display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:500; transition:all .2s }
        .page-btn:hover { border-color:#4B5C3B; color:#4B5C3B }
        .page-btn.active { background:#4B5C3B; color:#fff; border-color:#4B5C3B }
        /* Responsive */
        @media (max-width:768px){ .main-content{ margin-left:0 } .content-wrapper{ padding:1rem } .page-header{ flex-direction:column; gap:1rem; align-items:stretch } .header-actions{ flex-direction:column } .search-input{ width:100% } th,td{ padding:12px 8px } }
        /* Animations */
        .page-header{ opacity:0; transform:translateY(20px); animation:fadeInUp .6s ease .2s forwards }
        .table-container{ opacity:0; transform:translateY(30px); animation:fadeInUp .8s ease .4s forwards }
        @keyframes fadeInUp{ to{ opacity:1; transform:translateY(0) } }
        tbody tr{ opacity:0; transform:translateX(-10px); animation:slideInLeft .4s ease forwards }
        tbody tr:nth-child(1){ animation-delay:.6s } tbody tr:nth-child(2){ animation-delay:.7s } tbody tr:nth-child(3){ animation-delay:.8s } tbody tr:nth-child(4){ animation-delay:.9s } tbody tr:nth-child(5){ animation-delay:1.0s } tbody tr:nth-child(6){ animation-delay:1.1s }
        @keyframes slideInLeft{ to{ opacity:1; transform:translateX(0) } }
    </style>
</head>
<body>
<div class="admin-container">
    @include('components.sidebaradmin')
    <div class="main-content">
        @include('components.headeradmin')
        <div style="height:96px"></div>
        <div class="content-wrapper">
            <div class="admin-content">
                <div class="admin-header">
                    <h1>Kelola {{ $categoryModel->name }}</h1>
                    <p>Kelola artikel untuk kategori {{ $categoryModel->name }}</p>
                </div>

                <div class="admin-body">
                    <div class="crud-container">
                        <!-- Header removed per request: hide list title, total count, and add button -->

                        <!-- Category Settings (CRUD) -->
                        <div class="settings-card">
                            <h2 class="settings-title">Pengaturan Kategori</h2>
                            <p class="settings-subtitle">Atur banner dan deskripsi untuk kategori {{ $categoryModel->name }}</p>

                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                                <div></div>
                                <button type="button" id="toggle-category-form" class="btn-primary"><i class="fas fa-sliders-h"></i> Ubah Pengaturan</button>
                            </div>

                        

                        

                        

                        

                            <div id="category-settings-wrap" style="display:none;">
                            <form id="category-settings-form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT" />
                                <input type="hidden" id="category-id" value="{{ $categoryModel->id }}" />

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>Nama Kategori</label>
                                        <input type="text" name="name" value="{{ $categoryModel->name }}" required />
                                    </div>
                                    <div class="form-group col">
                                        <label>Icon (Font Awesome)</label>
                                        <input type="text" name="icon" value="{{ $categoryModel->icon }}" placeholder="fas fa-leaf" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="description" rows="3">{{ $categoryModel->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Banner Description</label>
                                    <textarea name="banner_description" rows="4" placeholder="Tulis deskripsi banner...">{{ $categoryModel->banner_description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Banner Image</label>
                                    <input type="file" name="banner_image" accept="image/*" />
                                    @if(!empty($categoryModel->banner_image))
                                        <div class="current-banner">
                                            <p style="margin:8px 0 6px; color:#6b7280">Banner saat ini:</p>
                                            <img src="{{ asset('storage/'.$categoryModel->banner_image) }}" alt="Banner" style="max-width:420px; border-radius:10px; border:1px solid #e5e7eb" />
                                        </div>
                                    @endif
                                </div>

                                <div class="form-actions" style="margin-top:16px">
                                    <button type="submit" class="btn-primary">
                                        <i class="fas fa-save"></i>
                                        Simpan Pengaturan
                                    </button>
                                </div>
                            </form>
                            </div>
                            </div>
                        </div>

                        <!-- Artikel Terbaru (4) -->
                        <div class="settings-card" id="latest-articles-card" style="margin-top:24px">
                            <h2 class="settings-title">Artikel Terbaru</h2>
                            <p class="settings-subtitle">Kelola 4 artikel terbaru yang tampil di halaman kategori ini</p>

                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                                <div></div>
                                <button type="button" id="toggle-latest-form" class="btn-primary"><i class="fas fa-plus"></i> Tambah Artikel Terbaru</button>
                            </div>

                            <div id="latest-form-wrap" style="display:none;">
                            <form id="latest-inline-form" enctype="multipart/form-data" style="margin-bottom:16px">
                                @csrf
                                <input type="hidden" name="category" value="{{ $categoryModel->slug }}" />
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>Judul Artikel *</label>
                                        <input type="text" id="inline-title" name="title" required />
                                    </div>
                                    <div class="form-group col">
                                        <label>Penulis</label>
                                        <input type="text" id="inline-author" name="author" value="{{ Auth::user()->nama_lengkap ?? Auth::user()->email }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Singkat</label>
                                    <textarea id="inline-description" name="description" rows="3" placeholder="Ringkasan artikel..."></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>Gambar Artikel</label>
                                        <input type="file" id="inline-image" name="image" accept="image/*" />
                                        <div id="inline-image-preview" style="display:none; margin-top:8px">
                                            <img id="inline-preview-img" src="" alt="Preview" style="max-width:220px; border-radius:8px; border:1px solid #e5e7eb" />
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        <label>Tautan Halaman (opsional)</label>
                                        <input type="text" id="inline-url" name="file_path" placeholder="/kategori/{{ $categoryModel->slug }}/artikel/slug-artikel" />
                                        <small style="display:block; color:#6b7280; margin-top:6px">Biarkan kosong untuk menggunakan halaman default</small>
                                    </div>
                                </div>
                                <div class="form-actions" style="margin-top:12px">
                                    <button type="submit" class="btn-primary"><i class="fas fa-plus"></i> Tambah ke Artikel Terbaru</button>
                                </div>
                            </form>
                            </div>

                        <!-- Articles Table (moved inside Artikel Terbaru card) -->
                        <div class="table-container" style="margin-top:20px">
                            <div class="table-wrapper">
                                <table id="articles-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width:60px">No</th>
                                            <th>Nama Artikel</th>
                                            <th>Tanggal</th>
                                            <th>Penulis</th>
                                            <th>Utama</th>
                                            <th style="width:220px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="articles-tbody">
                                        <tr><td colspan="6" style="text-align:center; padding:24px; color:#6b7280">Memuat data...</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination-container" id="pagination-container" style="display:none"></div>
                        </div>
                        </div>

                        <!-- Banner Slider (CRUD) -->
                        <div class="settings-card" id="banner-slider-card" style="margin-top:24px">
                            <h2 class="settings-title">Banner Slider</h2>
                            <p class="settings-subtitle">Kelola gambar slider di halaman kategori ini</p>

                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                                <div></div>
                                <button type="button" id="toggle-banner-form" class="btn-primary"><i class="fas fa-plus"></i> Tambah Banner</button>
                            </div>

                            <div id="banner-form-wrap" style="display:none;">
                            <form id="banner-create-form" enctype="multipart/form-data" style="margin-bottom:16px">
                                @csrf
                                <input type="hidden" name="category" value="{{ $categoryModel->slug }}" />
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>Judul</label>
                                        <input type="text" name="title" placeholder="Judul banner" required />
                                    </div>
                                    <div class="form-group col">
                                        <label>Urutan (opsional)</label>
                                        <input type="number" name="display_order" min="0" step="1" placeholder="0" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="description" rows="2" placeholder="Deskripsi singkat..."></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>Gambar Banner *</label>
                                        <input type="file" name="image" accept="image/*" required />
                                    </div>
                                    <div class="form-group col">
                                        <label>Tautan (opsional)</label>
                                        <input type="text" name="file_path" placeholder="/kategori/{{ $categoryModel->slug }}/artikel-apa" />
                                    </div>
                                </div>
                                <div class="form-actions" style="margin-top:12px">
                                    <button type="submit" class="btn-primary"><i class="fas fa-plus"></i> Tambah Banner</button>
                                </div>
                            </form>
                            </div>

                            <div class="table-container" style="margin-top:12px">
                                <div class="table-wrapper">
                                    <table style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:70px">Gambar</th>
                                                <th>Judul</th>
                                                <th>Tautan</th>
                                                <th style="width:90px">Urutan</th>
                                                <th style="width:200px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="banners-tbody">
                                            <tr><td colspan="5" style="text-align:center; padding:24px; color:#6b7280">Memuat data...</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Topik Populer (CRUD) -->
                        <div class="settings-card" id="popular-topics-card" style="margin-top:24px">
                            <h2 class="settings-title">Topik Populer</h2>
                            <p class="settings-subtitle">Kelola topik populer yang tampil di halaman kategori ini</p>

                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                                <div></div>
                                <button type="button" id="toggle-popular-form" class="btn-primary"><i class="fas fa-plus"></i> Tambah Topik Populer</button>
                            </div>

                            <div id="popular-form-wrap" style="display:none;">
                                <form id="popular-create-form" enctype="multipart/form-data" style="margin-bottom:16px">
                                    @csrf
                                    <input type="hidden" name="category" value="{{ $categoryModel->slug }}" />
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label>Judul *</label>
                                            <input type="text" name="title" required />
                                        </div>
                                        <div class="form-group col">
                                            <label>Penulis</label>
                                            <input type="text" name="author" autocomplete="off" value="{{ Auth::user()->username ?? Auth::user()->name ?? Auth::user()->nama_lengkap ?? Auth::user()->email }}" data-default-author="{{ Auth::user()->username ?? Auth::user()->name ?? Auth::user()->nama_lengkap ?? Auth::user()->email }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="description" rows="3" placeholder="Ringkasan topik..."></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label>Gambar</label>
                                            <input type="file" name="image" accept="image/*" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tautan (opsional)</label>
                                        <input type="text" name="article_url" placeholder="/kategori/{{ $categoryModel->slug }}/artikel-apa" />
                                    </div>
                                    <div class="form-actions" style="margin-top:12px">
                                        <button type="submit" class="btn-primary"><i class="fas fa-plus"></i> Tambah Topik</button>
                                    </div>
                                </form>
                            </div>

                            <div class="table-container" style="margin-top:12px">
                                <div class="table-wrapper">
                                    <table style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:70px">Gambar</th>
                                                <th>Judul</th>
                                                <th style="width:140px">Utama</th>
                                                <th style="width:200px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="popular-topics-tbody">
                                            <tr><td colspan="4" style="text-align:center; padding:24px; color:#6b7280">Memuat data...</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Panduan (CRUD) -->
                        <div class="settings-card" id="guides-card" style="margin-top:24px">
                            <h2 class="settings-title">Panduan</h2>
                            <p class="settings-subtitle">Kelola daftar panduan untuk kategori ini. Tampilan mengikuti style Pola Makan Sehat.</p>

                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                                <div></div>
                                <button type="button" id="toggle-guides-form" class="btn-primary"><i class="fas fa-plus"></i> Tambah Panduan</button>
                            </div>

                            <div id="guides-form-wrap" style="display:none;">
                                <form id="guides-create-form" enctype="multipart/form-data" style="margin-bottom:16px">
                                    @csrf
                                    <input type="hidden" name="category" value="{{ $categoryModel->slug }}" />
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label>Judul *</label>
                                            <input type="text" name="title" required />
                                        </div>
                                        <div class="form-group col">
                                            <label>Penulis</label>
                                            <input type="text" name="author" value="{{ Auth::user()->nama_lengkap ?? Auth::user()->email }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="description" rows="3" placeholder="Ringkasan panduan..."></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label>Gambar</label>
                                            <input type="file" name="image" accept="image/*" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tautan (opsional)</label>
                                        <input type="text" name="file_path" placeholder="/kategori/{{ $categoryModel->slug }}/artikel-apa" />
                                    </div>
                                    <div class="form-actions" style="margin-top:12px">
                                        <button type="submit" class="btn-primary"><i class="fas fa-plus"></i> Tambah Panduan</button>
                                    </div>
                                </form>
                            </div>

                            <div class="table-container" style="margin-top:12px">
                                <div class="table-wrapper">
                                    <table style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:70px">Gambar</th>
                                                <th>Judul</th>
                                                <th>Penulis</th>
                                                <th style="width:200px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="guides-tbody">
                                            <tr><td colspan="4" style="text-align:center; padding:24px; color:#6b7280">Memuat data...</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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

            <!-- Banner Edit Modal -->
            <div id="banner-modal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 id="banner-modal-title">Edit Banner</h3>
                        <span class="close" onclick="closeBannerModal()">&times;</span>
                    </div>
                    <div class="modal-body">
                        <form id="banner-form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="banner-id" name="id">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" id="banner-title" name="title" required />
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea id="banner-description" name="description" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tautan</label>
                                <input type="text" id="banner-file-path" name="file_path" />
                            </div>
                            <div class="form-group">
                                <label>Urutan</label>
                                <input type="number" id="banner-display-order" name="display_order" min="0" step="1" />
                            </div>
                            <div class="form-group">
                                <label>Gambar Banner (opsional)</label>
                                <input type="file" id="banner-image" name="image" accept="image/*" />
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn-secondary" onclick="closeBannerModal()">Batal</button>
                                <button type="submit" class="btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <style>
                .settings-card{ background:#fff; border-radius:12px; padding:24px; box-shadow:0 2px 10px rgba(0,0,0,.05); border-top:4px solid #556B2F; margin-top:8px }
                .main-content{ padding-top:0 }
                .content-wrapper > .admin-content:first-child, .content-wrapper > *:first-child{ margin-top:0 }
                .settings-title{ color:#4E342E; margin:0 0 4px; font-size:20px; font-weight:700 }
                .settings-subtitle{ color:#6b7280; margin:0 0 18px; font-size:14px }
                .form-row{ display:flex; gap:16px }
                .form-row .col{ flex:1 }
                .form-group{ margin-bottom:14px }
                .form-group input, .form-group textarea{ width:100%; padding:12px; border:1px solid #ddd; border-radius:8px; font-size:14px }
                .current-banner img{ display:block }
            
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

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const CATEGORY_SLUG = @json($categoryModel->slug);

// Toggle category settings form
const toggleCatBtn = document.getElementById('toggle-category-form');
if (toggleCatBtn){
  toggleCatBtn.addEventListener('click', ()=>{
    const wrap = document.getElementById('category-settings-wrap');
    if (!wrap) return;
    const showing = wrap.style.display !== 'none' && wrap.style.display !== '';
    wrap.style.display = showing ? 'none' : 'block';
    toggleCatBtn.innerHTML = showing ? '<i class="fas fa-sliders-h"></i> Ubah Pengaturan' : '<i class="fas fa-times"></i> Tutup Form';
    if (!showing){
      try { document.querySelector('#category-settings-wrap input[name="name"]').focus(); } catch(e){}
    }
  });
}

// Toggle latest articles inline form
const toggleLatestBtn = document.getElementById('toggle-latest-form');
if (toggleLatestBtn){
  toggleLatestBtn.addEventListener('click', ()=>{
    const wrap = document.getElementById('latest-form-wrap');
    if (!wrap) return;
    const showing = wrap.style.display !== 'none' && wrap.style.display !== '';
    wrap.style.display = showing ? 'none' : 'block';
    toggleLatestBtn.innerHTML = showing ? '<i class="fas fa-plus"></i> Tambah Artikel Terbaru' : '<i class="fas fa-times"></i> Tutup Form';
    if (!showing){
      try { document.getElementById('inline-title')?.focus(); } catch(e){}
    }
  });
}

// Toggle banner create form
const toggleBtn = document.getElementById('toggle-banner-form');
if (toggleBtn){
  toggleBtn.addEventListener('click', ()=>{
    const wrap = document.getElementById('banner-form-wrap');
    if (!wrap) return;
    const showing = wrap.style.display !== 'none' && wrap.style.display !== '';
    wrap.style.display = showing ? 'none' : 'block';
    toggleBtn.innerHTML = showing ? '<i class="fas fa-plus"></i> Tambah Banner' : '<i class="fas fa-times"></i> Tutup Form';
    if (!showing){
      try { document.querySelector('#banner-form-wrap input[name="title"]').focus(); } catch(e){}
    }
  });
}

// Submit Category Settings (multipart)
document.getElementById('category-settings-form')?.addEventListener('submit', async (e)=>{
  e.preventDefault();
  const id = document.getElementById('category-id').value;
  const form = e.currentTarget;
  const formData = new FormData(form);
  formData.append('_method', 'PUT');
  try {
    const res = await fetch(`/admin/categories/${id}`, { method: 'POST', headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }, body: formData });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data?.success) throw new Error(data?.message || `HTTP ${res.status}`);
    alert('Pengaturan kategori berhasil disimpan');
  } catch(err){
    console.error('Gagal menyimpan kategori:', err);
    alert('Gagal menyimpan: ' + (err.message||'Unknown error'));
  }
});

// Image preview in Article modal
document.getElementById('image')?.addEventListener('change', function(){
  const file = this.files?.[0];
  const prev = document.getElementById('image-preview');
  const img = document.getElementById('preview-img');
  if (file){ img.src = URL.createObjectURL(file); prev.style.display='block'; } else { prev.style.display='none'; img.src=''; }
});

// Image preview in inline form
document.getElementById('inline-image')?.addEventListener('change', function(){
  const file = this.files?.[0];
  const prev = document.getElementById('inline-image-preview');
  const img = document.getElementById('inline-preview-img');
  if (file){ img.src = URL.createObjectURL(file); prev.style.display='block'; } else { prev.style.display='none'; img.src=''; }
});

// Submit Inline Article form
document.getElementById('latest-inline-form')?.addEventListener('submit', async (e)=>{
  e.preventDefault();
  const form = e.currentTarget;
  const fd = new FormData(form);
  try{
    const res = await fetch(`/admin/${CATEGORY_SLUG}/articles`, { method: 'POST', headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' }, body: fd });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data?.success) throw new Error(data?.message||`HTTP ${res.status}`);
    form.reset();
    document.getElementById('inline-image-preview').style.display='none';
    // visual feedback on submit button
    const submitBtn = form.querySelector('button[type="submit"]');
    if (submitBtn){
      const prevText = submitBtn.innerHTML;
      submitBtn.disabled = true;
      submitBtn.style.background = '#16a34a'; // green
      submitBtn.style.borderColor = '#16a34a';
      submitBtn.innerHTML = '<i class="fas fa-check"></i> Tersimpan';
      setTimeout(()=>{
        submitBtn.disabled = false;
        submitBtn.style.background = '';
        submitBtn.style.borderColor = '';
        submitBtn.innerHTML = prevText;
      }, 1200);
    }
    fetchArticles();
  }catch(err){
    alert('Gagal menyimpan artikel: '+(err.message||'Unknown error'));
  }
});

// Articles CRUD
async function fetchArticles(){
  const tbody = document.getElementById('articles-tbody');
  tbody.innerHTML = `<tr><td colspan="6" style="text-align:center; padding:24px; color:#6b7280">Memuat data...</td></tr>`;
  try{
    const res = await fetch(`/admin/${CATEGORY_SLUG}/articles`, { headers: { 'Accept':'application/json' } });
    const data = await res.json();
    if (!res.ok || !data.success) throw new Error(data.message||'Load gagal');
    renderArticles(data.data||[]);
  }catch(err){
    tbody.innerHTML = `<tr><td colspan="6" style="text-align:center; padding:24px; color:#dc2626">Gagal memuat: ${err.message}</td></tr>`;
  }
}

function renderArticles(items){
  const tbody = document.getElementById('articles-tbody');
  if (!items.length){
    tbody.innerHTML = `<tr><td colspan="6" style="text-align:center; padding:24px; color:#6b7280">Belum ada artikel</td></tr>`;
    return;
  }
  tbody.innerHTML = items.map((it, idx)=>{
    const date = (it.created_at||'').replace('T',' ').substring(0,19);
    const isPrimary = Number(it.is_main_article||0) === 1;
    return `<tr>
      <td>${idx+1}</td>
      <td class="article-title">${escapeHtml(it.title||'')}</td>
      <td class="timestamp">${date}</td>
      <td class="author">${escapeHtml(it.author||'-')}</td>
      <td>
        <div style="display:flex; align-items:center; gap:8px;">
          <span class="badge" style="padding:6px 10px; border-radius:999px; font-size:12px; ${isPrimary?'background:#eaf4e2; color:#2c5530; border:1px solid #d6e8c9':'background:#f3f4f6; color:#6b7280; border:1px solid #e5e7eb'}">${isPrimary?'Utama':'Biasa'}</span>
          ${isPrimary 
            ? `<button class="btn" style="min-width:120px;" onclick="clearPrimary(${it.id})">Jadikan Biasa</button>`
            : `<button class="btn" style="min-width:120px;" onclick="setPrimary(${it.id})">Jadikan Utama</button>`
          }
        </div>
      </td>
      <td>
        <div class="action-buttons">
          <button class="btn btn-edit" onclick="openEdit(${it.id})">Edit <i class=\"fas fa-edit\"></i></button>
          <button class="btn btn-delete" onclick="deleteArticle(${it.id})">Hapus <i class=\"fas fa-trash\"></i></button>
        </div>
      </td>
    </tr>`;
  }).join('');
}

function escapeHtml(s){ return String(s).replace(/[&<>"']/g,(c)=>({"&":"&amp;","<":"&lt;",">":"&gt;","\"":"&quot;","'":"&#39;"}[c])); }

function openAddModal(){
  document.getElementById('modal-title').textContent='Tambah Artikel';
  document.getElementById('article-form').reset();
  document.getElementById('article-id').value='';
  document.getElementById('image-preview').style.display='none';
  document.getElementById('article-modal').style.display='block';
}

async function openEdit(id){
  // Fetch single from list already loaded (optional: could GET detail endpoint)
  const row = [...document.querySelectorAll('#articles-tbody tr')].find(r=> r.querySelector('button.btn-edit')?.getAttribute('onclick')===`openEdit(${id})`);
  document.getElementById('modal-title').textContent='Edit Artikel';
  document.getElementById('article-id').value=id;
  // For simplicity, user can refill fields; to prefill, we need detail. We'll set title from cell.
  const cells = row?.children;
  if (cells){
    document.getElementById('title').value = cells[1]?.textContent?.trim()||'';
    document.getElementById('author').value = cells[3]?.textContent?.trim()||'';
  }
  document.getElementById('article-modal').style.display='block';
}

function closeModal(){ document.getElementById('article-modal').style.display='none'; }

// Submit Article create/update with guard against double submit
let isSavingArticle = false;
document.getElementById('article-form')?.addEventListener('submit', async (e)=>{
  e.preventDefault();
  if (isSavingArticle) return; // prevent double submit
  isSavingArticle = true;
  const id = document.getElementById('article-id').value;
  const form = e.currentTarget;
  const fd = new FormData(form);
  const submitBtn = form.querySelector('button[type="submit"]');
  if (submitBtn) submitBtn.disabled = true;
  try{
    // Pre-check: total artikel di kategori maksimal 4 (blokir artikel ke-5)
    if (!id) { // create only
      const checkRes = await fetch(`/admin/${CATEGORY_SLUG}/articles`, { headers: { 'Accept':'application/json' } });
      const checkData = await parseJSONSafe(checkRes);
      if (checkData?.success) {
        const total = (checkData.data||[]).length;
        if (total >= 4) {
          alert('Maksimal 4 artikel dalam kategori ini. Hapus salah satu terlebih dahulu.');
          return;
        }
        // Pre-check: limit maksimal 4 untuk artikel terbaru
        const isLatest = (fd.get('article_type') === 'latest');
        if (isLatest) {
          const latestCount = (checkData.data||[]).filter(a=>a.article_type==='latest').length;
          if (latestCount >= 4) {
            alert('Maksimal 4 Artikel Terbaru per kategori. Hapus/ubah salah satu terlebih dahulu.');
            return;
          }
        }
      }
    }

    const url = id ? `/admin/${CATEGORY_SLUG}/articles/${id}` : `/admin/${CATEGORY_SLUG}/articles`;
    if (id) fd.append('_method','PUT');
    const res = await fetch(url, { method: 'POST', headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' }, body: fd });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data.success) throw new Error(data.message||`HTTP ${res.status}`);
    closeModal();
    fetchArticles();
  }catch(err){
    alert('Gagal menyimpan artikel: '+(err.message||'Unknown error'));
  } finally {
    isSavingArticle = false;
    if (submitBtn) submitBtn.disabled = false;
  }
});

async function deleteArticle(id){
  if (!confirm('Hapus artikel ini?')) return;
  try{
    const res = await fetch(`/admin/${CATEGORY_SLUG}/articles/${id}`, { method: 'POST', headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' }, body: new URLSearchParams({ _method:'DELETE' }) });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data.success) throw new Error(data.message||`HTTP ${res.status}`);
    fetchArticles();
  }catch(err){
    alert('Gagal menghapus: ' + (err.message||'Unknown error'));
  }
}

// Init
document.addEventListener('DOMContentLoaded', fetchArticles);

async function setPrimary(id){
  if(!confirm('Jadikan artikel ini sebagai utama? Artikel utama lain di kategori ini akan dinonaktifkan.')) return;
  try{
    const res = await fetch(`/admin/${CATEGORY_SLUG}/articles/${id}/primary`, { method:'POST', headers:{ 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' } });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data?.success) throw new Error(data?.message||`HTTP ${res.status}`);
    fetchArticles();
  }catch(err){
    alert('Gagal set artikel utama: '+(err.message||'Unknown error'));
  }
}

async function clearPrimary(id){
  if(!confirm('Hapus status utama dari artikel ini?')) return;
  try{
    const res = await fetch(`/admin/${CATEGORY_SLUG}/articles/${id}/primary/clear`, { method:'POST', headers:{ 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' } });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data?.success) throw new Error(data?.message||`HTTP ${res.status}`);
    fetchArticles();
  }catch(err){
    alert('Gagal menghapus status utama: '+(err.message||'Unknown error'));
  }
}

// Helpers for "Artikel Terbaru" di-nonaktifkan: tidak ada kartu, hanya tabel

// fetchLatestArticles dinonaktifkan

// renderLatestArticles dihapus

// openLatestEdit dinonaktifkan

// latest-inline-form disabled to prevent duplicate submissions
// document.getElementById('latest-inline-form')?.addEventListener('submit', async (e)=>{
//   e.preventDefault();
//   const fd = new FormData(e.currentTarget);
//   try{
//     const res = await fetch(`/admin/${CATEGORY_SLUG}/articles`, { method:'POST', headers:{ 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' }, body: fd });
//     const data = await parseJSONSafe(res);
//     if (!res.ok || !data?.success) throw new Error(data?.message||`HTTP ${res.status}`);
//     const latestForm = document.getElementById('latest-inline-form');
//     if (latestForm && typeof latestForm.reset === 'function') latestForm.reset();
//     const prev = document.getElementById('inline-image-preview');
//     if (prev) prev.style.display = 'none';
//     fetchArticles();
//   }catch(err){
//     alert('Gagal menyimpan artikel terbaru: '+(err.message||'Unknown error'));
//   }
// });

// Styles for latest cards (similar to Pola Makan layout)
// Styles untuk latest cards dihapus

// Init
document.addEventListener('DOMContentLoaded', ()=>{ fetchArticles(); fetchBanners(); });

// Banners CRUD
async function fetchBanners(){
  const tbody = document.getElementById('banners-tbody');
  if (!tbody) return;
  tbody.innerHTML = `<tr><td colspan="5" style="text-align:center; padding:24px; color:#6b7280">Memuat data...</td></tr>`;
  try{
    const res = await fetch(`/admin/${CATEGORY_SLUG}/banners`, { headers:{ 'Accept':'application/json' } });
    const data = await parseJSONSafe(res) || {};
    if (!res.ok || data.success!==true) throw new Error(data.message||`HTTP ${res.status}`);
    renderBanners(data.data||[]);
  }catch(err){
    tbody.innerHTML = `<tr><td colspan="5" style="text-align:center; padding:24px; color:#dc2626">Gagal memuat: ${err.message}</td></tr>`;
  }
}

function renderBanners(items){
  const tbody = document.getElementById('banners-tbody');
  if (!tbody) return;
  if (!items.length){
    tbody.innerHTML = `<tr><td colspan="5" style="text-align:center; padding:24px; color:#6b7280">Belum ada banner</td></tr>`;
    return;
  }
  tbody.innerHTML = items.map(it=>{
    const img = it.image ? `${location.origin}/storage/${it.image}` : '';
    const link = it.file_path || '';
    const ord = (typeof it.display_order!=='undefined' && it.display_order!==null) ? it.display_order : '';
    return `<tr>
      <td>${img?`<img src="${img}" alt="${escapeHtml(it.title||'')}" style="width:64px; height:48px; object-fit:cover; border-radius:6px;">`:''}</td>
      <td>${escapeHtml(it.title||'')}</td>
      <td>${escapeHtml(link)}</td>
      <td style="text-align:center;">${escapeHtml(String(ord))}</td>
      <td>
        <div class="action-buttons">
          <button class="btn btn-edit" onclick='openBannerEdit(${JSON.stringify(it.id)},{title:${JSON.stringify(it.title||'')},description:${JSON.stringify(it.description||'')},file_path:${JSON.stringify(it.file_path||'')},display_order:${JSON.stringify(it.display_order??'')}})'>Edit <i class="fas fa-edit"></i></button>
          <button class="btn btn-delete" onclick="deleteBanner(${it.id})">Hapus <i class=\"fas fa-trash\"></i></button>
        </div>
      </td>
    </tr>`;
  }).join('');
}

// Create banner
document.getElementById('banner-create-form')?.addEventListener('submit', async (e)=>{
  e.preventDefault();
  const formEl = document.getElementById('banner-create-form');
  const fd = new FormData(formEl);
  try{
    const res = await fetch(`/admin/${CATEGORY_SLUG}/banners`, { method:'POST', headers:{ 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' }, body: fd });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data?.success) throw new Error(data?.message||`HTTP ${res.status}`);
    if (formEl && typeof formEl.reset === 'function') formEl.reset();
    fetchBanners();
  }catch(err){ alert('Gagal menambah banner: '+(err.message||'Unknown error')); }
});

function openBannerEdit(id, preset){
  document.getElementById('banner-id').value = id;
  document.getElementById('banner-title').value = preset.title||'';
  document.getElementById('banner-description').value = preset.description||'';
  document.getElementById('banner-file-path').value = preset.file_path||'';
  document.getElementById('banner-display-order').value = (preset.display_order??'');
  document.getElementById('banner-modal').style.display='block';
}
function closeBannerModal(){ document.getElementById('banner-modal').style.display='none'; }

document.getElementById('banner-form')?.addEventListener('submit', async (e)=>{
  e.preventDefault();
  const id = document.getElementById('banner-id').value;
  const fd = new FormData(e.currentTarget);
  try{
    const res = await fetch(`/admin/${CATEGORY_SLUG}/banners/${id}`, { method:'POST', headers:{ 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' }, body: (()=>{ fd.append('_method','PUT'); return fd; })() });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data?.success) throw new Error(data?.message||`HTTP ${res.status}`);
    closeBannerModal();
    fetchBanners();
  }catch(err){ alert('Gagal menyimpan banner: '+(err.message||'Unknown error')); }
});

async function deleteBanner(id){
  if(!confirm('Hapus banner ini?')) return;
  try{
    const res = await fetch(`/admin/${CATEGORY_SLUG}/banners/${id}`, { method:'POST', headers:{ 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' }, body: new URLSearchParams({ _method:'DELETE' }) });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data?.success) throw new Error(data?.message||`HTTP ${res.status}`);
    fetchBanners();
  }catch(err){ alert('Gagal menghapus banner: '+(err.message||'Unknown error')); }
}

// Topik Populer: toggle form
const togglePopularBtn = document.getElementById('toggle-popular-form');
if (togglePopularBtn){
  togglePopularBtn.addEventListener('click', ()=>{
    const wrap = document.getElementById('popular-form-wrap');
    if (!wrap) return;
    const showing = wrap.style.display !== 'none' && wrap.style.display !== '';
    wrap.style.display = showing ? 'none' : 'block';
    togglePopularBtn.innerHTML = showing ? '<i class="fas fa-plus"></i> Tambah Topik Populer' : '<i class="fas fa-times"></i> Tutup Form';
  });
}

// Topik Populer: load list
async function loadPopularTopics(){
  const tbody = document.getElementById('popular-topics-tbody');
  if (!tbody) return;
  tbody.innerHTML = `<tr><td colspan="3" style="text-align:center; padding:24px; color:#6b7280">Memuat data...</td></tr>`;
  try{
    const res = await fetch(`/admin/${CATEGORY_SLUG}/popular-topics`, { headers: { 'Accept':'application/json' } });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data?.success) throw new Error(data?.message||`HTTP ${res.status}`);
    const items = data.data||[];
    if (!items.length){
      tbody.innerHTML = `<tr><td colspan="3" style="text-align:center; padding:24px; color:#6b7280">Belum ada data</td></tr>`;
      return;
    }
    tbody.innerHTML = items.map(item=>{
      const img = item.image ? `${location.origin}/storage/${item.image}` : 'https://via.placeholder.com/64x64?text=IMG';
      const isPrimary = Number(item.is_featured||0)===1;
      return `
        <tr data-id="${item.id}">
          <td><img src="${img}" alt="" style="width:64px;height:64px;object-fit:cover;border-radius:8px;border:1px solid #e5e7eb"/></td>
          <td>${escapeHtml(item.title||'')}</td>
          <td>
            <div style="display:flex; align-items:center; gap:8px; justify-content:center;">
              <span class="badge" style="padding:6px 10px; border-radius:999px; font-size:12px; ${isPrimary?'background:#eaf4e2; color:#2c5530; border:1px solid #d6e8c9':'background:#f3f4f6; color:#6b7280; border:1px solid #e5e7eb'}">${isPrimary?'Utama':'Biasa'}</span>
              ${isPrimary 
                ? `<button class="btn" style="min-width:120px;" onclick="clearPopularPrimary(${item.id})">Jadikan Biasa</button>`
                : `<button class="btn" style="min-width:120px;" onclick="setPopularPrimary(${item.id})">Jadikan Utama</button>`}
            </div>
          </td>
          <td>
            <div class="action-buttons">
              <button class="btn btn-edit" onclick="editPopularTopic(${item.id})"><i class="fas fa-pen"></i> Edit</button>
              <button class="btn btn-delete" onclick="deletePopularTopic(${item.id})"><i class="fas fa-trash"></i> Hapus</button>
            </div>
          </td>
        </tr>`;
    }).join('');
  }catch(err){
    tbody.innerHTML = `<tr><td colspan="4" style="text-align:center; padding:24px; color:#dc2626">Gagal memuat: ${escapeHtml(err.message||'Unknown error')}</td></tr>`;
  }
}

// Topik Populer: create
document.getElementById('popular-create-form')?.addEventListener('submit', async (e)=>{
  e.preventDefault();
  const formEl = e.currentTarget;
  const fd = new FormData(formEl);
  try{
    const res = await fetch(`/admin/${CATEGORY_SLUG}/popular-topics`, { method:'POST', headers:{ 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' }, body: fd });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data?.success) throw new Error(data?.message||`HTTP ${res.status}`);
    if (formEl && typeof formEl.reset === 'function') formEl.reset();
    // Hard clear all text inputs and textareas to avoid leftover values
    formEl.querySelectorAll('input[type="text"], textarea').forEach(el=>{ el.value=''; });
    // Clear file input
    const fileEl = formEl.querySelector('input[type="file"]');
    if (fileEl) fileEl.value = '';
    loadPopularTopics();
    // Optional feedback
    try{
      const submitBtn = formEl.querySelector('button[type="submit"]');
      if (submitBtn){
        const prev = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.style.background = '#16a34a';
        submitBtn.style.borderColor = '#16a34a';
        submitBtn.innerHTML = '<i class="fas fa-check"></i> Tersimpan';
        setTimeout(()=>{ submitBtn.disabled=false; submitBtn.style.background=''; submitBtn.style.borderColor=''; submitBtn.innerHTML=prev; }, 1000);
      }
    }catch(_){ }
  }catch(err){ alert('Gagal menambah: '+(err.message||'Unknown error')); }
});

// Popular Topics: toggle primary (is_featured)
async function setPopularPrimary(id){
  try{
    const fd = new FormData();
    fd.append('_method','PUT');
    fd.append('is_featured','1');
    const res = await fetch(`/admin/${CATEGORY_SLUG}/popular-topics/${id}`, { method:'POST', headers:{ 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' }, body: fd });
    const data = await parseJSONSafe(res);
    if (res.status === 422){ alert(data?.message||'Maksimal 2 topik utama'); return; }
    if (!res.ok || !data?.success) throw new Error(data?.message||`HTTP ${res.status}`);
    loadPopularTopics();
  }catch(err){ alert('Gagal set sebagai utama: '+(err.message||'Unknown error')); }
}

async function clearPopularPrimary(id){
  try{
    const fd = new FormData();
    fd.append('_method','PUT');
    fd.append('is_featured','0');
    const res = await fetch(`/admin/${CATEGORY_SLUG}/popular-topics/${id}`, { method:'POST', headers:{ 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' }, body: fd });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data?.success) throw new Error(data?.message||`HTTP ${res.status}`);
    loadPopularTopics();
  }catch(err){ alert('Gagal ubah ke biasa: '+(err.message||'Unknown error')); }
}

// Topik Populer: edit cepat via prompt judul
async function editPopularTopic(id){
  const row = document.querySelector(`#popular-topics-tbody tr[data-id="${id}"]`);
  const currentTitle = row?.children?.[1]?.textContent?.trim() || '';
  const newTitle = prompt('Ubah judul', currentTitle);
  if (newTitle===null) return;
  const fd = new FormData();
  fd.append('_method','PUT');
  fd.append('title', newTitle);
  try{
    const res = await fetch(`/admin/${CATEGORY_SLUG}/popular-topics/${id}`, { method:'POST', headers:{ 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' }, body: fd });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data?.success) throw new Error(data?.message||`HTTP ${res.status}`);
    loadPopularTopics();
  }catch(err){ alert('Gagal mengubah: '+(err.message||'Unknown error')); }
}

// Topik Populer: delete
async function deletePopularTopic(id){
  if (!confirm('Hapus topik ini?')) return;
  try{
    const res = await fetch(`/admin/${CATEGORY_SLUG}/popular-topics/${id}`, { method:'DELETE', headers:{ 'X-CSRF-TOKEN': csrfToken, 'Accept':'application/json' } });
    const data = await parseJSONSafe(res);
    if (!res.ok || !data?.success) throw new Error(data?.message||`HTTP ${res.status}`);
    loadPopularTopics();
  }catch(err){ alert('Gagal menghapus: '+(err.message||'Unknown error')); }
}

// Load on start
document.addEventListener('DOMContentLoaded', ()=>{ loadPopularTopics(); });

// Safe JSON parser to handle unexpected HTML error pages
async function parseJSONSafe(res){
  const ct = res.headers.get('content-type') || '';
  if (ct.includes('application/json')){
    try{ return await res.json(); }catch(e){ return null; }
  }
  const text = await res.text();
  throw new Error(`${res.status} ${res.statusText}: ${text.substring(0,200)}`);
}

// === Panduan (Guides) CRUD ===
(function(){
  const CATEGORY = @json($categoryModel->slug);
  const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const guidesTbody = document.getElementById('guides-tbody');
  const toggleGuidesBtn = document.getElementById('toggle-guides-form');
  const guidesFormWrap = document.getElementById('guides-form-wrap');
  const guidesCreateForm = document.getElementById('guides-create-form');

  function imgCell(src){
    const url = src ? (src.startsWith('http')?src:(window.location.origin + '/storage/' + src)) : '';
    return url ? `<img src="${url}" alt="guide" style="width:56px;height:42px;object-fit:cover;border-radius:6px;border:1px solid #e5e7eb"/>` : '<div style="width:56px;height:42px;border:1px dashed #ddd;border-radius:6px"></div>';
  }

  async function loadGuides(){
    try{
      guidesTbody.innerHTML = `<tr><td colspan="5" style="text-align:center; padding:24px; color:#6b7280">Memuat data...</td></tr>`;
      const res = await fetch(`/admin/${CATEGORY}/guides`, { headers: { 'Accept':'application/json' } });
      const data = await res.json();
      const items = data?.data || [];
      if (!items.length){
        guidesTbody.innerHTML = `<tr><td colspan="5" style="text-align:center; padding:24px; color:#6b7280">Belum ada panduan</td></tr>`;
        return;
      }
      guidesTbody.innerHTML = items.map(g=>`
        <tr>
          <td>${imgCell(g.image)}</td>
          <td>${g.title || '-'}</td>
          <td>${g.author || '-'}</td>
          <td class="action-buttons">
            <button class="btn btn-edit" onclick="editGuide(${g.id})"><i class="fas fa-edit"></i> Edit</button>
            <button class="btn btn-delete" onclick="deleteGuide(${g.id})"><i class="fas fa-trash"></i> Hapus</button>
          </td>
        </tr>
      `).join('');
    }catch(e){ guidesTbody.innerHTML = `<tr><td colspan=5 style="text-align:center;padding:24px;color:#b91c1c">Gagal memuat panduan</td></tr>`; }
  }

  toggleGuidesBtn?.addEventListener('click', ()=>{
    const show = guidesFormWrap.style.display === 'none' || guidesFormWrap.style.display === '';
    guidesFormWrap.style.display = show ? 'block' : 'none';
  });

  guidesCreateForm?.addEventListener('submit', async (e)=>{
    e.preventDefault();
    const formData = new FormData(guidesCreateForm);
    try{
      const res = await fetch(`/admin/${CATEGORY}/guides`, { method:'POST', headers: { 'X-CSRF-TOKEN': csrf, 'Accept':'application/json' }, body: formData });
      let data = null;
      try{ data = await res.json(); }catch(_){ data = null; }
      if (!res.ok){
        const msg = data?.message || (data?.errors ? Object.values(data.errors)[0]?.[0] : '') || `HTTP ${res.status}`;
        alert(`Gagal menambah panduan: ${msg}`);
        return;
      }
      guidesCreateForm.reset();
      guidesFormWrap.style.display = 'none';
      loadGuides();
    }catch(err){ alert('Terjadi kesalahan: '+(err?.message||'unknown')); }
  });

  window.deleteGuide = async function(id){
    if (!confirm('Hapus panduan ini?')) return;
    try{
      const res = await fetch(`/admin/${CATEGORY}/guides/${id}`, { method:'DELETE', headers: { 'X-CSRF-TOKEN': csrf } });
      if (!res.ok){ alert('Gagal menghapus'); return; }
      loadGuides();
    }catch(e){ alert('Terjadi kesalahan'); }
  }

  window.editGuide = function(id){ alert('Edit inline belum diimplementasi. Silakan hapus dan tambah ulang untuk sementara.'); }

  // init
  loadGuides();
})();
</script>
        </div>
    </div>
</div>
</body>
</html>
