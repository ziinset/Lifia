<!-- Header Component -->
<div class="topbar-wrapper">
    <div class="topbar">
        <button class="mobile-menu-btn" onclick="toggleMobileSidebar()">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Search -->
        <div class="search-container">
            <div class="search-box">
                <input type="text" placeholder="Cari resep, artikel, atau tips kesehatan...">
                <button class="search-btn"><i class="fas fa-search"></i></button>
            </div>
        </div>

        <!-- User Section -->
        <div class="user-section">
            <button class="notification-btn">
                <i class="fas fa-bell"></i>
            </button>

            @auth
                <div class="user-info">
                    @php
                        $foto = Auth::user()->foto ?? null;
                        $initial = strtoupper(substr(Auth::user()->nama_lengkap ?? 'U', 0, 1));
                    @endphp
                    <img src="{{ $foto ? asset('storage/' . $foto) : 'https://placehold.co/40x40/8BAC65/white?text=' . $initial }}" 
                         alt="{{ Auth::user()->nama_lengkap }}">
                    <div class="user-details">
                        <h4>{{ Auth::user()->nama_lengkap }}</h4>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                </div>
            @else
                <div class="user-info">
                    <img src="https://placehold.co/40x40/8BAC65/white?text=?" alt="Guest">
                    <div class="user-details">
                        <h4>Tamu</h4>
                        <p>Belum login</p>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>

<style>
/* Header Styles */
.topbar-wrapper {
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    padding: 1rem 1.5rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    z-index: 999;
    border-bottom: 1px solid rgba(229, 231, 235, 0.5);
}

.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 100%;
}

.search-container {
    flex: 1;
    max-width: 450px;
    position: relative;
}

.search-box {
    position: relative;
    width: 100%;
}

.search-box input {
    width: 100%;
    padding: 0.875rem 3.5rem 0.875rem 1.25rem;
    border-radius: 1.5rem;
    border: 2px solid transparent;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    outline: none;
    font-size: 0.95rem;
    font-weight: 400;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
    color: #374151;
}

.search-box input::placeholder {
    color: #9ca3af;
    font-weight: 400;
}

.search-box input:focus {
    border-color: #799549;
    background: #ffffff;
    box-shadow: 0 8px 25px rgba(121, 149, 73, 0.15),
                0 0 0 4px rgba(121, 149, 73, 0.1);
    transform: translateY(-1px);
}

.search-box .search-btn {
    position: absolute;
    right: 0.5rem;
    top: 50%;
    transform: translateY(-50%);
    background: linear-gradient(135deg, #799549 0%, #8BAC65 100%);
    color: white;
    border: none;
    border-radius: 50%;
    width: 2.25rem;
    height: 2.25rem;
    cursor: pointer;
    font-size: 0.9rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(121, 149, 73, 0.3);
}

.search-box .search-btn:hover {
    background: linear-gradient(135deg, #435331 0%, #799549 100%);
    transform: translateY(-50%) scale(1.05);
    box-shadow: 0 4px 12px rgba(121, 149, 73, 0.4);
}

.user-section {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.notification-btn {
    position: relative;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border: 2px solid transparent;
    color: #6b7280;
    cursor: pointer;
    font-size: 1.1rem;
    width: 2.75rem;
    height: 2.75rem;
    border-radius: 50%;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
}

.notification-btn:hover {
    background: linear-gradient(135deg, #799549 0%, #8BAC65 100%);
    color: white;
    transform: translateY(-1px) scale(1.05);
    box-shadow: 0 8px 25px rgba(121, 149, 73, 0.25);
    border-color: rgba(255, 255, 255, 0.2);
}

.notification-btn::after {
    content: '';
    position: absolute;
    top: 0.25rem;
    right: 0.25rem;
    width: 0.5rem;
    height: 0.5rem;
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    border-radius: 50%;
    border: 2px solid white;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
}

.user-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.5rem 0.75rem;
    border-radius: 1.5rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border: 2px solid transparent;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
}

.user-info:hover {
    background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
    transform: translateY(-1px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    border-color: rgba(121, 149, 73, 0.2);
}

.user-info img {
    width: 2.25rem;
    height: 2.25rem;
    border-radius: 50%;
    border: 2px solid #e5e7eb;
    object-fit: cover;
    transition: all 0.3s ease;
}

.user-info:hover img {
    border-color: #799549;
    transform: scale(1.05);
}

.user-details h4 {
    font-size: 0.875rem;
    font-weight: 600;
    color: #4E342E;
    margin-bottom: 1px;
    transition: color 0.2s ease;
}

.user-details p {
    font-size: 0.75rem;
    color: #6b7280;
    transition: color 0.2s ease;
}

.user-info:hover .user-details h4 {
    color: #1f2937;
}

.user-info:hover .user-details p {
    color: #799549;
}

.mobile-menu-btn {
    display: none;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 0.5rem;
    padding: 0.5rem;
    cursor: pointer;
    color: #6b7280;
    font-size: 1.1rem;
    margin-right: 1rem;
}

.mobile-menu-btn:hover {
    background: #f9fafb;
    color: #799549;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .search-container { 
        max-width: 350px; 
    }
}

@media (max-width: 768px) {
    .mobile-menu-btn { 
        display: block; 
    }
    .topbar { 
        flex-wrap: wrap; 
        gap: 1rem; 
    }
    .search-container { 
        order: 2; 
        flex-basis: 100%; 
        max-width: none; 
    }
    .user-section { 
        order: 1; 
        margin-left: auto; 
    }
}
</style>

<script>
function toggleMobileSidebar() {
    const sidebar = document.querySelector('.sidebar');
    if (sidebar) {
        sidebar.classList.toggle('mobile-open');
    }
}
</script>