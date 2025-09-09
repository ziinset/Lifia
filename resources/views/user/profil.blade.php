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
            min-height: 4rem;
            resize: vertical;
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

        .social-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
            z-index: 5;
        }

        .social-icon.instagram { color: #e91e63; }
        .social-icon.tiktok { color: #000; }
        .social-icon.facebook { color: #1877f2; }
        
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
            .social-grid {
                grid-template-columns: 1fr;
            }
            .form-header { 
                flex-direction: column; 
                gap: 1rem; 
                align-items: flex-start; 
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
                
                <div class="decorative-circle circle-1"></div>
                <div class="decorative-circle circle-2"></div>
                <div class="decorative-circle circle-3"></div>
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
                        <span>{{ $profile->alamat ?? 'Lokasi tidak diatur' }}</span>
                        <div class="dot"></div>
                        <span class="premium">
                            <i class="fas fa-crown"></i> Pengguna Premium
                        </span>
        
                        <span class="profile-email">
                            <i class="fas fa-envelope"></i> {{ $user->email ?? 'email@example.com' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Profile Form -->
            <div class="form-card">
                <div class="form-header">
                    <h3>Edit Profil</h3>
                </div>
                
                <form id="profilForm" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
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
                            <label class="field-label">Nomor Telepon</label>
                            <input type="text" class="field-input toggle-edit" name="nomor" value="{{ $profile->nomor ?? '' }}" placeholder="Masukkan nomor telepon" disabled>
                        </div>
                        <div class="field-group">
                            <label class="field-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="field-select toggle-edit" disabled>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ ($profile->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ ($profile->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="field-group">
                            <label class="field-label">Tanggal Lahir</label>
                            <input type="date" class="field-input toggle-edit" name="tanggal_lahir" value="{{ $profile->tanggal_lahir ?? '' }}" disabled>
                        </div>
                        <div class="field-group">
                            <label class="field-label">Hobi & Minat</label>
                            <input type="text" class="field-input toggle-edit" name="hobi" value="{{ $profile->hobi ?? '' }}" placeholder="Misal: Yoga, Jogging, Membaca" disabled>
                        </div>
                    </div>

                    <div class="form-grid full-width">
                        <div class="field-group">
                            <label class="field-label">Bio</label>
                            <textarea name="bio" class="field-textarea toggle-edit" placeholder="Ceritakan sedikit tentang diri Anda..." disabled>{{ $profile->bio ?? '' }}</textarea>
                        </div>
                    </div>

                    <!-- Social Media Section -->
                    <div class="social-section">
                        <h4>
                            <i class="fas fa-share-alt"></i>
                            Media Sosial
                        </h4>
                        <div class="social-grid">
                            <div class="field-group">
                                <label class="field-label">Instagram</label>
                                <div class="social-field">
                                    <i class="fab fa-instagram social-icon instagram"></i>
                                    <input type="text" class="field-input toggle-edit" name="instagram" value="{{ $profile->instagram ?? '' }}" placeholder="@username" disabled>
                                </div>
                            </div>
                            <div class="field-group">
                                <label class="field-label">TikTok</label>
                                <div class="social-field">
                                    <i class="fab fa-tiktok social-icon tiktok"></i>
                                    <input type="text" class="field-input toggle-edit" name="tiktok" value="{{ $profile->tiktok ?? '' }}" placeholder="@username" disabled>
                                </div>
                            </div>
                            <div class="field-group">
                                <label class="field-label">Facebook</label>
                                <div class="social-field">
                                    <i class="fab fa-facebook social-icon facebook"></i>
                                    <input type="text" class="field-input toggle-edit" name="facebook" value="{{ $profile->facebook ?? '' }}" placeholder="Nama Lengkap" disabled>
                                </div>
                            </div>
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
        let isEditing = false;

        function setEditing(state) {
            isEditing = state;
            toggleFields.forEach(el => {
                el.disabled = !isEditing;
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

        // start in view mode
        setEditing(false);
    });
</script>

</body>
</html>