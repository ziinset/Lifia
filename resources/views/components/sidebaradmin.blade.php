<!-- Sidebar Admin Component -->
<div class="sidebar-admin" style="width: 260px; height: 100vh; background-color: #ffffff; border-right: 1px solid #e5e7eb; font-family: 'Poppins', sans-serif; font-weight: 500; position: fixed; left: 0; top: 0; z-index: 1000;">
    <!-- Logo Section -->
    <div style="padding: 32px 24px 48px 24px; text-align: center;">
        <img src="{{ asset('images/logo2-lifia.svg') }}" alt="Lifia" style="height: 40px; width: auto;">
    </div>

    <!-- Navigation Menu -->
    <nav style="padding: 0 24px;">
        <!-- Dashboard Menu Item -->
        <a href="{{ route('admin.dashboard') }}" class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" style="display: flex; align-items: center; padding: 14px 20px; text-decoration: none; color: {{ request()->routeIs('admin.dashboard') ? 'white' : '#6b7280' }}; background-color: {{ request()->routeIs('admin.dashboard') ? '#556B2F' : 'transparent' }}; border-radius: 25px; margin-bottom: 12px; transition: all 0.3s ease; font-weight: 500;">
            <svg style="width: 24px; height: 24px; margin-right: 16px; fill: currentColor;" viewBox="0 0 24 24">
                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
            </svg>
            <span style="font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; letter-spacing: -0.01em;">Dashboard</span>
        </a>

        <!-- Kategori Menu Item -->
        <a href="#" class="menu-item" style="display: flex; align-items: center; padding: 14px 20px; text-decoration: none; color: #6b7280; border-radius: 25px; margin-bottom: 12px; transition: all 0.3s ease; font-weight: 500;">
            <svg style="width: 24px; height: 24px; margin-right: 16px; fill: currentColor;" viewBox="0 0 24 24">
                <path d="M10 4H4c-1.11 0-2 .89-2 2v12c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2h-8l-2-2z"/>
            </svg>
            <span style="font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; letter-spacing: -0.01em;">Kategori</span>
        </a>

        <!-- Artikel Menu Item -->
        <a href="#" class="menu-item" style="display: flex; align-items: center; padding: 14px 20px; text-decoration: none; color: #6b7280; border-radius: 25px; margin-bottom: 12px; transition: all 0.3s ease; font-weight: 500;">
            <svg style="width: 24px; height: 24px; margin-right: 16px; fill: currentColor;" viewBox="0 0 24 24">
                <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
            </svg>
            <span style="font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; letter-spacing: -0.01em;">Artikel</span>
            <svg style="width: 16px; height: 16px; margin-left: auto; fill: currentColor; stroke: currentColor; stroke-width: 2;" viewBox="0 0 24 24">
                <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
            </svg>
        </a>

        <!-- Fitplan Menu Item -->
        <a href="#" class="menu-item" style="display: flex; align-items: center; padding: 14px 20px; text-decoration: none; color: #6b7280; border-radius: 25px; margin-bottom: 12px; transition: all 0.3s ease; font-weight: 500;">
            <svg style="width: 24px; height: 24px; margin-right: 16px; fill: currentColor;" viewBox="0 0 24 24">
                <rect x="1" y="7" width="5" height="10" rx="2"/>
                <rect x="6" y="10" width="12" height="4" rx="1"/>
                <rect x="18" y="7" width="5" height="10" rx="2"/>
            </svg>
            <span style="font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; letter-spacing: -0.01em;">Fitplan</span>
        </a>

        <!-- Langganan Menu Item -->
        <a href="{{ route('admin.langganan') }}" class="menu-item {{ request()->routeIs('admin.langganan') ? 'active' : '' }}" style="display: flex; align-items: center; padding: 14px 20px; text-decoration: none; color: {{ request()->routeIs('admin.langganan') ? 'white' : '#6b7280' }}; background-color: {{ request()->routeIs('admin.langganan') ? '#556B2F' : 'transparent' }}; border-radius: 25px; margin-bottom: 12px; transition: all 0.3s ease; font-weight: 500;">
            <svg style="width: 24px; height: 24px; margin-right: 16px; fill: currentColor;" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z"/>
            </svg>
            <span style="font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; letter-spacing: -0.01em;">Langganan</span>
        </a>

        <!-- Log out Menu Item -->
        <form action="{{ route('logout') }}" method="POST" style="margin: 0; padding: 0;">
            @csrf
            <button type="submit" class="menu-item" style="display: flex; align-items: center; padding: 14px 20px; text-decoration: none; color: #6b7280; border-radius: 25px; margin-bottom: 12px; transition: all 0.3s ease; font-weight: 500; background: none; border: none; width: 100%; cursor: pointer; font-family: 'Poppins', sans-serif; text-align: left;">
                <i class="fas fa-door-open" style="width: 24px; height: 24px; margin-right: 16px; font-size: 20px; display: flex; align-items: center; justify-content: center;"></i>
                <span style="font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; letter-spacing: -0.01em;">Log out</span>
            </button>
        </form>
    </nav>
</div>

<!-- Add hover effects with CSS -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    
    .sidebar-admin .menu-item:hover:not(.active) {
        background-color: #f3f4f6 !important;
        color: #374151 !important;
    }
    
    .sidebar-admin .menu-item.active {
        background-color: #556B2F !important;
        color: white !important;
    }
    
    .sidebar-admin .menu-item {
        position: relative;
    }
    
    .sidebar-admin .menu-item svg {
        flex-shrink: 0;
    }
    
    .sidebar-admin {
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
    }
</style>