<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Lifia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

        /* Main Content - Adjusted for fixed sidebar */
        .main {
            flex: 1;
            margin-left: 16rem;
            padding: 0;
            overflow-y: auto;
            background: #FCFAF6;
            position: relative;
            height: 100vh;
        }

        .main-content {
            padding: 1.5rem;
        }

        /* Success Message */
        .success {
            background: #d1fae5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
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
        
        .profile-email {
            font-size: 0.875rem;
            color: #6b7280;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-basis: 100%;
        }


        /* Form Card */
        .form-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            padding: 2rem;
            border: 1px solid #f3f4f6;
            margin-top: 2rem;
        }
        
        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f3f4f6;
            position: relative;
            z-index: 1;
        }

        /* Social Media in Header */
        .social-header {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            margin-left: auto;
            position: relative;
            z-index: 1;
        }

        .social-link-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            background: #f9fafb;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            min-width: 140px;
            height: 40px;
        }

        .social-link-header .social-icon {
            font-size: 1.1rem;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 4px;
            padding: 2px;
            position: relative;
            z-index: 1;
        }

        .social-link-header .social-icon.instagram {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            color: white;
        }

        .social-link-header .social-icon.tiktok {
            background: #000;
            color: white;
        }

        .social-link-header .social-icon.facebook {
            background: #1877f2;
            color: white;
        }

        .social-link-header span {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .social-link-header .social-input {
            background: transparent;
            border: none;
            outline: none;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            width: 100%;
            padding: 0;
        }

        .social-link-header .social-input:focus {
            background: #fff;
            border: 1px solid #8BAC65;
            border-radius: 0.375rem;
            padding: 0.25rem 0.5rem;
        }
        
        .form-card h3 {
            font-size: 1.25rem;
            font-weight: bold;
            color: #1f2937;
            margin: 0;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .form-grid.full-width {
            grid-template-columns: 1fr;
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
        
        .field-input, .field-select, .field-textarea {
            width: 100%;
            background: #f9fafb;
            padding: 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            color: #4b5563;
            font-size: 0.9rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.2s;
            line-height: 1.4;
        }

        .field-input:focus, .field-select:focus, .field-textarea:focus {
            outline: none;
            border-color: #8BAC65;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(139, 172, 101, 0.1);
        }

        .field-input:disabled {
            background: #f3f4f6;
            color: #9ca3af;
            cursor: not-allowed;
        }

        .field-textarea {
            min-height: 6rem;
            resize: none;
            line-height: 1.6;
            padding: 1rem;
            border-radius: 0.75rem;
            font-size: 0.95rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .field-textarea:focus {
            min-height: 8rem;
            box-shadow: 0 0 0 3px rgba(139, 172, 101, 0.15);
            border-color: #8BAC65;
        }

        .field-textarea::placeholder {
            color: #9ca3af;
            font-style: italic;
        }

        /* Social Media Section */
        .social-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #f3f4f6;
        }

        .social-section h4 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .social-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .social-field {
            position: relative;
        }

        .social-field .field-input {
            padding-left: 2.5rem;
        }

        
        /* Radio Button Styles */
        .radio-group {
            display: flex;
            gap: 1.5rem;
            margin-top: 0.5rem;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .radio-option:hover {
            background-color: #f8f9fa;
            border-color: #e5e7eb;
        }

        .radio-option input[type="radio"] {
            display: none;
        }

        .radio-custom {
            width: 20px;
            height: 20px;
            border: 2px solid #d1d5db;
            border-radius: 50%;
            position: relative;
            transition: all 0.3s ease;
            background-color: white;
        }

        .radio-option input[type="radio"]:checked + .radio-custom {
            border-color: #8BAC65;
            background-color: #8BAC65;
        }

        .radio-option input[type="radio"]:checked + .radio-custom::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: white;
        }

        .radio-option input[type="radio"]:disabled + .radio-custom {
            background-color: #f9fafb;
            border-color: #e5e7eb;
            cursor: not-allowed;
        }

        .radio-option input[type="radio"]:disabled:checked + .radio-custom {
            background-color: #d1d5db;
            border-color: #9ca3af;
        }

        .radio-option input[type="radio"]:disabled:checked + .radio-custom::after {
            background-color: #6b7280;
        }

        .radio-label {
            font-weight: 500;
            color: #374151;
            transition: color 0.3s ease;
        }

        .radio-option input[type="radio"]:disabled ~ .radio-label {
            color: #9ca3af;
            cursor: not-allowed;
        }

        .radio-option input[type="radio"]:checked ~ .radio-label {
            color: #8BAC65;
            font-weight: 600;
        }
        
        .actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 2rem;
            gap: 1rem;
        }
        
        .save-btn {
            background: #8BAC65;
            color: white;
            font-weight: 600;
            padding: 0.875rem 2rem;
            border-radius: 1.5rem;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
            box-shadow: 0 1px 3px rgba(139, 172, 101, 0.3);
            font-family: 'Poppins', sans-serif;
        }
        
        .save-btn:hover {
            background: #435331;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(42, 79, 56, 0.4);
        }

        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
        }
        
        .circle-1 { width: 60px; height: 60px; top: -20px; right: 100px; }
        .circle-2 { width: 40px; height: 40px; bottom: -10px; left: 80px; }
        .circle-3 { width: 30px; height: 30px; top: 40px; right: 40px; }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .main { margin-left: 14rem; }
        }

        @media (max-width: 768px) {
            .main { margin-left: 0; }
            .profile-content-wrapper { 
                flex-direction: column; 
                align-items: center; 
                text-align: center; 
                margin-top: -40px; 
            }
            .avatar-container { 
                margin-right: 0; 
                margin-bottom: 1rem; 
            }
            .form-grid { 
                grid-template-columns: 1fr; 
            }
            .form-header { 
                flex-direction: column; 
                gap: 1rem; 
                align-items: flex-start; 
            }
            .social-header {
                flex-wrap: wrap;
                gap: 0.75rem;
            }
            .social-link-header {
                min-width: 120px;
                height: 36px;
                padding: 0.5rem 0.75rem;
            }
            .social-link-header .social-icon {
                width: 20px;
                height: 20px;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .social-header {
                flex-direction: column;
                width: 100%;
                gap: 0.5rem;
            }
            .social-link-header {
                width: 100%;
                justify-content: center;
                height: 40px;
                min-width: auto;
            }
            .social-link-header .social-icon {
                width: 22px;
                height: 22px;
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>

<div class="profil-container">
    <!-- Include Sidebar Component -->
    @include('components.sidebar')

    <!-- Main Content -->
    <main class="main">
        <!-- Include Header Component -->
        @include('components.header')

        <div class="main-content">
            <!-- Success Message -->
            @if (session('success'))
                <div class="success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Profile Header -->
            <div class="profil-header">
                <button class="header-edit-btn">
                    <i class="fas fa-pen"></i> 
                </button>
                
            </div>

            <!-- Profile Content -->
            <div class="profile-content-wrapper">
                <div class="avatar-container">
                    <img id="avatarPreview" src="{{ $user->foto ? asset('storage/' . $user->foto) : 'https://placehold.co/176x176/8BAC65/white?text=' . substr($user->nama_lengkap ?? 'User', 0, 1) }}" alt="Profile">
                    <button class="edit-avatar-btn">
                        <i class="fas fa-pen"></i>
                    </button>
                </div>
                <div class="profile-info">
                    <h2>{{ $user->nama_lengkap ?? 'Nama Pengguna' }}</h2>
                    <div class="profile-meta">
                        <span>{{ $user->lokasi ?? 'Lokasi tidak diatur' }}</span>
                        @if($user->is_premium)
                        <div class="dot"></div>
                        <span class="premium">
                            <i class="fas fa-crown"></i> Pengguna Premium
                        </span>
                        @endif
        
                        <span class="profile-email">
                            <i class="fas fa-envelope"></i> {{ $user->email ?? 'email@example.com' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Profile Form -->
            <div class="form-card">
                <form id="profilForm" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                    <div class="form-header">
                        <h3>Detail Lainnya</h3>
                        <!-- Social Media in Header -->
                        <div class="social-header">
                            <div class="social-link-header">
                                <i class="fab fa-instagram social-icon instagram"></i>
                                <span class="social-display">{{ $user->instagram ?? '@username' }}</span>
                                <input type="text" class="social-input toggle-edit" name="instagram" value="{{ $user->instagram ?? '' }}" placeholder="@username" disabled style="display: none;">
                            </div>
                            <div class="social-link-header">
                                <i class="fab fa-tiktok social-icon tiktok"></i>
                                <span class="social-display">{{ $user->tiktok ?? '@username' }}</span>
                                <input type="text" class="social-input toggle-edit" name="tiktok" value="{{ $user->tiktok ?? '' }}" placeholder="@username" disabled style="display: none;">
                            </div>
                            <div class="social-link-header">
                                <i class="fab fa-facebook social-icon facebook"></i>
                                <span class="social-display">{{ $user->facebook ?? 'Nama Lengkap' }}</span>
                                <input type="text" class="social-input toggle-edit" name="facebook" value="{{ $user->facebook ?? '' }}" placeholder="Nama Lengkap" disabled style="display: none;">
                            </div>
                        </div>
                    </div>
                    @csrf
                    @method('POST')
                    <input type="file" id="fotoInput" name="foto" accept="image/*" style="display:none">

                    <div class="form-grid">
                        <div class="field-group">
                            <label class="field-label">Nama Lengkap</label>
                            <input type="text" class="field-input" value="{{ $user->nama_lengkap }}" disabled>
                        </div>
                        <div class="field-group">
                            <label class="field-label">Email</label>
                            <input type="email" class="field-input" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="field-group">
                            <label class="field-label">Lokasi</label>
                            <input type="text" class="field-input toggle-edit" name="lokasi" value="{{ $user->lokasi ?? '' }}" placeholder="Masukkan lokasi/alamat" disabled>
                        </div>
                        <div class="field-group">
                            <label class="field-label">Nomor Telepon</label>
                            <input type="text" class="field-input toggle-edit" name="nomor" value="{{ $user->nomor ?? '' }}" placeholder="Masukkan nomor telepon" disabled>
                        </div>
                        <div class="field-group">
                            <label class="field-label">Jenis Kelamin</label>
                            <div class="radio-group toggle-edit" style="display: flex; gap: 1rem; margin-top: 0.5rem;">
                                <label class="radio-option">
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" {{ ($user->jenis_kelamin ?? '') == 'Laki-laki' ? 'checked' : '' }} disabled>
                                    <span class="radio-custom"></span>
                                    <span class="radio-label">Laki-laki</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" {{ ($user->jenis_kelamin ?? '') == 'Perempuan' ? 'checked' : '' }} disabled>
                                    <span class="radio-custom"></span>
                                    <span class="radio-label">Perempuan</span>
                                </label>
                            </div>
                        </div>
                        <div class="field-group">
                            <label class="field-label">Tanggal Lahir</label>
                            <input type="date" class="field-input toggle-edit" name="tanggal_lahir" value="{{ $user->tanggal_lahir ?? '' }}" disabled>
                        </div>
                        <div class="field-group">
                            <label class="field-label">Hobi & Minat</label>
                            <input type="text" class="field-input toggle-edit" name="hobi" value="{{ $user->hobi ?? '' }}" placeholder="Misal: Yoga, Jogging, Membaca" disabled>
                        </div>
                    </div>

                    <div class="form-grid full-width">
                        <div class="field-group">
                            <label class="field-label">Bio</label>
                            <textarea name="bio" class="field-textarea toggle-edit" placeholder="Ceritakan sedikit tentang diri Anda..." disabled>{{ $user->bio ?? '' }}</textarea>
                        </div>
                    </div>

                    
                    <div class="actions">
                        <button type="button" id="editToggleBtn" class="save-btn">
                            <i class="fas fa-edit"></i>
                            Edit Profil
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile sidebar functionality
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const mobileBtn = document.querySelector('.mobile-menu-btn');
            
            if (sidebar && !sidebar.contains(event.target) && !mobileBtn?.contains(event.target)) {
                sidebar.classList.remove('mobile-open');
            }
        });

        window.addEventListener('resize', function() {
            const sidebar = document.querySelector('.sidebar');
            if (window.innerWidth > 768 && sidebar) {
                sidebar.classList.remove('mobile-open');
            }
        });

        // Form enhancements
        const inputs = document.querySelectorAll('.field-input, .field-select, .field-textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });

        // Auto-hide success message
        const successMsg = document.querySelector('.success');
        if (successMsg) {
            setTimeout(() => {
                successMsg.style.opacity = '0';
                successMsg.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    successMsg.remove();
                }, 300);
            }, 5000);
        }

        // Avatar change via pencil icon
        const editAvatarBtn = document.querySelector('.edit-avatar-btn');
        const fotoInput = document.getElementById('fotoInput');
        const profilForm = document.getElementById('profilForm');
        const avatarPreview = document.getElementById('avatarPreview');

        if (editAvatarBtn && fotoInput) {
            editAvatarBtn.addEventListener('click', function(e) {
                e.preventDefault();
                fotoInput.click();
            });

            fotoInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const file = this.files[0];
                    const reader = new FileReader();
                    reader.onload = function(ev) {
                        if (avatarPreview) {
                            avatarPreview.src = ev.target.result;
                        }
                    };
                    reader.readAsDataURL(file);
                    if (profilForm) {
                        profilForm.submit();
                    }
                }
            });
        }

        // Toggle edit mode for profile fields
        const editToggleBtn = document.getElementById('editToggleBtn');
        const toggleFields = document.querySelectorAll('.toggle-edit');
        const radioButtons = document.querySelectorAll('input[name="jenis_kelamin"]');
        let isEditing = false;

        function setEditing(state) {
            isEditing = state;
            
            // Toggle input fields
            toggleFields.forEach(el => {
                el.disabled = !isEditing;
            });
            
            // Toggle radio buttons
            radioButtons.forEach(radio => {
                radio.disabled = !isEditing;
            });
            
            // Toggle social media display/input in header
            const socialDisplays = document.querySelectorAll('.social-display');
            const socialInputs = document.querySelectorAll('.social-input');
            
            socialDisplays.forEach(display => {
                display.style.display = isEditing ? 'none' : 'block';
            });
            
            socialInputs.forEach(input => {
                input.style.display = isEditing ? 'block' : 'none';
                input.disabled = !isEditing;
            });
            
            if (editToggleBtn) {
                if (isEditing) {
                    editToggleBtn.innerHTML = '<i class="fas fa-save"></i> Simpan Perubahan';
                    editToggleBtn.type = 'submit';
                } else {
                    editToggleBtn.innerHTML = '<i class="fas fa-edit"></i> Edit Profil';
                    editToggleBtn.type = 'button';
                }
            }
        }

        if (editToggleBtn) {
            editToggleBtn.addEventListener('click', function(e) {
                if (!isEditing) {
                    e.preventDefault();
                    setEditing(true);
                }
                // if editing=true, button is submit and form will post
            });
        }

        // Update social media display when input changes
        const socialInputs = document.querySelectorAll('.social-input');
        const socialDisplays = document.querySelectorAll('.social-display');
        
        socialInputs.forEach((input, index) => {
            input.addEventListener('input', function() {
                if (socialDisplays[index]) {
                    socialDisplays[index].textContent = this.value || this.placeholder;
                }
            });
        });

        // start in view mode
        setEditing(false);
    });
</script>

</body>
</html>