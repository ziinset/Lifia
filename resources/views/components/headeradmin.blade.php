<!-- Admin Header Component -->
<div class="top-header">
    <div class="user-info">
        <div class="user-details">
            <h2>{{ Auth::user()->nama_lengkap ?? 'Admin' }}</h2>
            <p class="user-status">{{ Auth::user()->status ?? 'Admin' }}</p>
        </div>
        @php
            $foto = Auth::user()->foto ?? null;
            $initial = strtoupper(substr(Auth::user()->nama_lengkap ?? 'A', 0, 1));
        @endphp
        <div class="user-avatar" onclick="openProfileModal(event)">
            <img src="{{ $foto ? asset('storage/' . $foto) : 'https://placehold.co/48x48/8BAC65/white?text=' . $initial }}" 
                 alt="{{ Auth::user()->nama_lengkap ?? 'Admin' }}"
                 class="header-avatar-image">
        </div>
    </div>
</div>

<!-- Profile Modal -->
<div class="modal-overlay" id="profileModal">
    <div class="profile-modal">
        <div class="modal-header">
            <button class="modal-back-btn" onclick="closeProfileModal()">
                <i class="fas fa-arrow-left"></i>
            </button>
            <div class="modal-title">Akun Saya</div>
        </div>
        <div class="modal-body">
            <form id="profileForm" class="profile-form" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="file" id="avatarInput" name="foto" accept="image/*" style="display:none">
            </form>
            
            <div class="profile-avatar-section">
                @php
                    $foto = Auth::user()->foto ?? null;
                    $initial = strtoupper(substr(Auth::user()->nama_lengkap ?? 'A', 0, 1));
                @endphp
                <div class="avatar-container">
                    <div class="profile-avatar-large">
                        <img id="modalAvatarPreview" src="{{ $foto ? asset('storage/' . $foto) : 'https://placehold.co/80x80/8BAC65/white?text=' . $initial }}" 
                             alt="{{ Auth::user()->nama_lengkap ?? 'Admin' }}"
                             class="avatar-image">
                    </div>
                    <div class="edit-avatar-btn" onclick="changeProfileImage()">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                </div>
            </div>

            <div class="profile-field">
                <div class="profile-label">Nama</div>
                <input type="text" name="nama_lengkap" class="profile-input" value="{{ Auth::user()->nama_lengkap ?? 'Admin' }}" form="profileForm">
            </div>

            <div class="profile-field">
                <div class="profile-label">Status</div>
                <input type="text" name="status" class="profile-input" value="{{ Auth::user()->status ?? 'Admin kocak dan ramah' }}" form="profileForm">
            </div>

            <div class="profile-field">
                <div class="profile-label">Email</div>
                <input type="email" class="profile-input" value="{{ Auth::user()->email ?? 'admin@gmail.com' }}" readonly>
            </div>

            <div class="profile-field">
                <div class="profile-label">Password</div>
                <input type="password" class="profile-input password" value="admin123" readonly>
            </div>

            <button type="button" class="update-profile-btn" onclick="submitProfileForm()">Update Profil</button>
        </div>
    </div>
</div>

<!-- Header Admin Styles -->
<style>
    .top-header {
        background: white;
        padding: 20px 32px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin-bottom: 0;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        cursor: pointer;
        overflow: hidden;
    }

    .header-avatar-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .user-avatar:hover {
        box-shadow: 0 4px 12px rgba(85, 107, 47, 0.3);
        transform: scale(1.05);
    }

    .user-avatar:hover .header-avatar-image {
        border-color: #556B2F;
    }

    .user-details h2 {
        font-size: 20px;
        font-weight: 600;
        color: #1f2937;
        margin: 0;
    }

    .user-details p {
        font-size: 14px;
        color: #6b7280;
        margin: 0;
    }

    /* Profile Modal Styles */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .modal-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .profile-modal {
        background: white;
        border-radius: 16px;
        width: 90%;
        max-width: 420px;
        padding: 0;
        position: relative;
        transform: scale(0.8);
        transition: transform 0.3s ease;
        overflow: hidden;
    }

    .modal-overlay.active .profile-modal {
        transform: scale(1);
    }

    .modal-header {
        background: linear-gradient(135deg, #556B2F 0%, #8BAC65 100%);
        color: white;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .modal-back-btn {
        background: none;
        border: none;
        color: white;
        font-size: 20px;
        cursor: pointer;
        padding: 5px;
        position: absolute;
        left: 20px;
    }

    .modal-title {
        font-size: 18px;
        font-weight: 600;
        font-family: 'Poppins', sans-serif;
    }

    .modal-body {
        padding: 24px;
        text-align: center;
    }

    .profile-avatar-section {
        display: flex;
        justify-content: center;
        margin-bottom: 24px;
        position: relative;
    }

    .avatar-container {
        position: relative;
        display: inline-block;
    }

    .profile-avatar-large {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 8px;
        overflow: hidden;
    }

    .avatar-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .edit-avatar-btn {
        position: absolute;
        bottom: -5px;
        right: -5px;
        width: 28px;
        height: 28px;
        background: #556B2F;
        border: 3px solid white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 12px;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .edit-avatar-btn:hover {
        background: #4B5C3B;
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
    }

    .profile-form {
        display: none;
    }

    .profile-field {
        margin-bottom: 16px;
        text-align: left;
    }

    .profile-label {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        font-family: 'Poppins', sans-serif;
    }

    .profile-input {
        width: 100%;
        padding: 10px 14px;
        border: none;
        background: #f5f5f5;
        border-radius: 10px;
        font-size: 13px;
        color: #666;
        font-family: 'Inter', sans-serif;
    }

    .profile-input[readonly] {
        cursor: not-allowed;
        background: #f3f4f6;
        color: #9ca3af;
    }

    .profile-input:not([readonly]) {
        background: #fff;
        border: 2px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .profile-input:not([readonly]):focus {
        outline: none;
        border-color: #556B2F;
        box-shadow: 0 0 0 3px rgba(85, 107, 47, 0.1);
    }

    .profile-input.password {
        letter-spacing: 3px;
    }

    .update-profile-btn {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #556B2F 0%, #8BAC65 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease;
    }

    .update-profile-btn:hover {
        background: linear-gradient(135deg, #4B5C3B 0%, #799549 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(85, 107, 47, 0.3);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .top-header {
            padding: 16px 20px;
        }
        
        .user-details h2 {
            font-size: 18px;
        }
        
        .user-details p {
            font-size: 13px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
        }
    }
</style>

<!-- Header Admin JavaScript -->
<script>
    function openProfileModal(event) {
        // Prevent any event bubbling that might cause accidental triggers
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }
        
        const modal = document.getElementById('profileModal');
        if (modal && !modal.classList.contains('active')) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            // Log for debugging (remove in production)
            console.log('Profile modal opened by user click');
        }
    }

    function closeProfileModal() {
        const modal = document.getElementById('profileModal');
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    }

    // Initialize modal state and event listeners when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('profileModal');
        
        // Always ensure modal is closed on page load/navigation
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
            
            // Clear any stored modal state
            sessionStorage.removeItem('profileModalOpen');
            
            // Close modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeProfileModal();
                }
            });
        }
        
        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeProfileModal();
            }
        });
        
        // Prevent any accidental modal opening on page load
        setTimeout(function() {
            if (modal && modal.classList.contains('active')) {
                console.warn('Modal was unexpectedly active, closing it');
                closeProfileModal();
            }
        }, 100);
    });

    // Profile image change functionality
    function changeProfileImage() {
        const avatarInput = document.getElementById('avatarInput');
        if (avatarInput) {
            avatarInput.click();
        }
    }

    // Submit profile form when Update Profil button is clicked
    function submitProfileForm() {
        const profileForm = document.getElementById('profileForm');
        const avatarInput = document.getElementById('avatarInput');
        const namaInput = document.querySelector('input[name="nama_lengkap"]');
        const statusInput = document.querySelector('input[name="status"]');
        
        // Check if there's any change (file, nama, or status)
        const hasFile = avatarInput && avatarInput.files && avatarInput.files[0];
        const hasNama = namaInput && namaInput.value.trim() !== '';
        const hasStatus = statusInput && statusInput.value.trim() !== '';
        
        if (hasFile || hasNama || hasStatus) {
            if (profileForm) {
                profileForm.submit();
            }
        } else {
            alert('Silakan isi nama, status, atau pilih gambar profil untuk diperbarui.');
        }
    }

    // Handle avatar input change, nama input change, and status input change
    document.addEventListener('DOMContentLoaded', function() {
        const avatarInput = document.getElementById('avatarInput');
        const modalAvatarPreview = document.getElementById('modalAvatarPreview');
        const headerAvatarImage = document.querySelector('.header-avatar-image');
        const namaInput = document.querySelector('input[name="nama_lengkap"]');
        const statusInput = document.querySelector('input[name="status"]');
        const headerNama = document.querySelector('.user-details h2');
        const headerStatus = document.querySelector('.user-status');

        // Handle avatar change
        if (avatarInput) {
            avatarInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const file = this.files[0];
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        // Update modal preview only (don't submit yet)
                        if (modalAvatarPreview) {
                            modalAvatarPreview.src = e.target.result;
                        }
                        // Update header avatar preview
                        if (headerAvatarImage) {
                            headerAvatarImage.src = e.target.result;
                        }
                    };
                    
                    reader.readAsDataURL(file);
                    
                    // Don't submit automatically - wait for Update Profil button click
                }
            });
        }

        // Handle nama input change - update header preview
        if (namaInput && headerNama) {
            namaInput.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    headerNama.textContent = this.value;
                }
            });
        }

        // Handle status input change - update header preview
        if (statusInput && headerStatus) {
            statusInput.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    headerStatus.textContent = this.value;
                }
            });
        }
    });
</script>
