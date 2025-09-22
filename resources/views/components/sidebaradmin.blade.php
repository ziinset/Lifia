<!-- Sidebar Admin Component -->
<div class="sidebar-admin initial-load" id="sidebar-admin" style="width: 260px; height: 100vh; background-color: #ffffff; border-right: 1px solid #e5e7eb; font-family: 'Poppins', sans-serif; font-weight: 500; position: fixed; left: 0; top: 0; z-index: 1000; overflow-y: hidden;">
    <!-- Logo Section -->
    <div class="logo-section" style="padding: 32px 24px 48px 24px; text-align: center;">
        <img src="{{ asset('images/logo2-lifia.svg') }}" alt="Lifia" style="height: 40px; width: auto;">
    </div>

    <!-- Navigation Menu -->
    <nav style="padding: 0 24px;">
        <!-- Dashboard Menu Item -->
        <a href="{{ route('admin.dashboard') }}" class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" style="display: flex; align-items: center; padding: 14px 20px; text-decoration: none; color: {{ request()->routeIs('admin.dashboard') ? 'white' : '#6b7280' }}; background-color: {{ request()->routeIs('admin.dashboard') ? '#556B2F' : 'transparent' }}; border-radius: 25px; margin-bottom: 12px; transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-weight: 500; position: relative; overflow: hidden;">
            <div class="icon-container" style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center;">
                <svg style="width: 24px; height: 24px; margin-right: 16px; fill: currentColor; transition: transform 0.3s ease; flex-shrink: 0;" viewBox="0 0 24 24">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                </svg>
            </div>
            <span style="font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; letter-spacing: -0.01em; position: relative; z-index: 2; line-height: 1; display: flex; align-items: center;">Dashboard</span>
            @if(request()->routeIs('admin.dashboard'))
                <div class="menu-item-shine" style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: left 0.6s ease;"></div>
            @else
                <div class="menu-item-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, #f3f4f6, #e5e7eb); border-radius: 25px; transform: scale(0); transition: transform 0.3s ease; opacity: 0;"></div>
            @endif
        </a>

        <!-- Kategori Menu Item -->
        <a href="{{ route('admin.kategori') }}" class="menu-item {{ request()->routeIs('admin.kategori') ? 'active' : '' }}" style="display: flex; align-items: center; padding: 14px 20px; text-decoration: none; color: {{ request()->routeIs('admin.kategori') ? 'white' : '#6b7280' }}; background-color: {{ request()->routeIs('admin.kategori') ? '#556B2F' : 'transparent' }}; border-radius: 25px; margin-bottom: 12px; transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-weight: 500; position: relative; overflow: hidden;">
            <div class="icon-container" style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center;">
                <svg style="width: 24px; height: 24px; margin-right: 16px; fill: currentColor; transition: transform 0.3s ease; flex-shrink: 0;" viewBox="0 0 24 24">
                    <path d="M10 4H4c-1.11 0-2 .89-2 2v12c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2h-8l-2-2z"/>
                </svg>
            </div>
            <span style="font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; letter-spacing: -0.01em; position: relative; z-index: 2; line-height: 1; display: flex; align-items: center;">Kategori</span>
            @if(request()->routeIs('admin.kategori'))
                <div class="menu-item-shine" style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: left 0.6s ease;"></div>
            @else
                <div class="menu-item-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, #f3f4f6, #e5e7eb); border-radius: 25px; transform: scale(0); transition: transform 0.3s ease; opacity: 0;"></div>
            @endif
        </a>

        <!-- Artikel Menu Item with Dropdown -->
        @php
            // Get categories for dynamic routing
            $adminCategories = isset($globalCategories) ? $globalCategories : collect();
            
            // Debug: Check if categories exist
            // dd('Categories count: ' . $adminCategories->count(), $adminCategories->toArray());
            
            // Create dynamic route checking for all categories
            $isOnArticlePage = false;
            
            
            if ($adminCategories->count() > 0) {
                foreach ($adminCategories as $category) {
                    $specificRouteName = 'admin.' . $category->slug;
                    $routeExists = \Illuminate\Support\Facades\Route::has($specificRouteName);
                    
                    if ($routeExists && request()->routeIs($specificRouteName)) {
                        $isOnArticlePage = true;
                        break;
                    } elseif (!$routeExists && request()->is('admin/' . $category->slug)) {
                        $isOnArticlePage = true;
                        break;
                    }
                }
            } else {
                // Fallback for backward compatibility
                $isOnArticlePage = request()->routeIs('admin.pola-makan-sehat') || 
                                  request()->routeIs('admin.aktivitas-fisik') || 
                                  request()->routeIs('admin.kesehatan-mental') || 
                                  request()->routeIs('admin.perawatan-diri') || 
                                  request()->routeIs('admin.gaya-hidup-vegan') || 
                                  request()->routeIs('admin.eco-living');
            }
            
            // Also check for category management pages
            $isOnArticlePage = $isOnArticlePage || request()->is('admin/kategori/*');
        @endphp
        <div class="artikel-dropdown" style="margin-bottom: 12px;">
            <a href="#" class="menu-item artikel-toggle {{ $isOnArticlePage ? 'page-active' : '' }}" onclick="toggleArtikelDropdown()" style="display: flex; align-items: center; padding: 14px 20px; text-decoration: none; color: {{ $isOnArticlePage ? 'white' : '#6b7280' }}; background-color: {{ $isOnArticlePage ? '#556B2F' : 'transparent' }}; border-radius: 25px; transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-weight: 500; position: relative; overflow: hidden;">
                <div class="icon-container" style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center;">
                    <svg style="width: 24px; height: 24px; margin-right: 16px; fill: currentColor; transition: transform 0.3s ease; flex-shrink: 0;" viewBox="0 0 24 24">
                        <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                    </svg>
                </div>
                <span style="font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; letter-spacing: -0.01em; position: relative; z-index: 2; line-height: 1; display: flex; align-items: center;">Artikel</span>
                <svg id="artikel-arrow" style="width: 16px; height: 16px; margin-left: auto; fill: currentColor; stroke: currentColor; stroke-width: 2; transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94); position: relative; z-index: 2; flex-shrink: 0;" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
                @if($isOnArticlePage)
                    <div class="menu-item-shine" style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: left 0.6s ease;"></div>
                @else
                    <div class="menu-item-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, #f3f4f6, #e5e7eb); border-radius: 25px; transform: scale(0); transition: transform 0.3s ease; opacity: 0;"></div>
                @endif
            </a>
            
            <!-- Dynamic Dropdown Submenu -->
            <div id="artikel-submenu" style="display: none; margin-left: 20px; margin-top: 8px; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border-radius: 16px; padding: 8px 0; border-left: 3px solid #556B2F; box-shadow: 0 4px 20px rgba(0,0,0,0.08); backdrop-filter: blur(10px);">
                @if($adminCategories && $adminCategories->count() > 0)
                    @foreach($adminCategories as $category)
                        @php
                            // Check if specific route exists, otherwise use dynamic route
                            $specificRouteName = 'admin.' . $category->slug;
                            $routeExists = \Illuminate\Support\Facades\Route::has($specificRouteName);
                            
                            if ($routeExists) {
                                $routeName = $specificRouteName;
                                $routeUrl = route($specificRouteName);
                                $isActive = request()->routeIs($specificRouteName);
                            } else {
                                // Use dynamic route for new categories
                                $routeName = 'admin.dynamic-category';
                                $routeUrl = route('admin.dynamic-category', $category->slug);
                                $isActive = request()->is('admin/' . $category->slug);
                            }
                        @endphp
                        <a href="{{ $routeUrl }}" class="submenu-item {{ $isActive ? 'active' : '' }}" style="display: flex; align-items: center; padding: 12px 20px; text-decoration: none; color: {{ $isActive ? '#556B2F' : '#6b7280' }}; background-color: {{ $isActive ? 'rgba(85, 107, 47, 0.1)' : 'transparent' }}; transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-size: 13px; font-family: 'Poppins', sans-serif; font-weight: 400; position: relative; border-radius: 12px; margin: 2px 8px;">
                            @if($category->icon)
                                <i class="{{ $category->icon }}" style="width: 6px; height: 6px; margin-right: 12px; font-size: 10px; color: #556B2F; transform: {{ $isActive ? 'scale(1)' : 'scale(0.8)' }}; transition: transform 0.3s ease;"></i>
                            @else
                                <div class="submenu-indicator" style="width: 6px; height: 6px; border-radius: 50%; background: #556B2F; margin-right: 12px; transform: {{ $isActive ? 'scale(1)' : 'scale(0)' }}; transition: transform 0.3s ease;"></div>
                            @endif
                            <span style="margin-left: 8px; transition: transform 0.3s ease;">{{ $category->name }}</span>
                        </a>
                    @endforeach
                @else
                    <!-- Fallback untuk kategori default -->
                    <a href="{{ route('admin.pola-makan-sehat') }}" class="submenu-item {{ request()->routeIs('admin.pola-makan-sehat') ? 'active' : '' }}" style="display: flex; align-items: center; padding: 12px 20px; text-decoration: none; color: {{ request()->routeIs('admin.pola-makan-sehat') ? '#556B2F' : '#6b7280' }}; background-color: {{ request()->routeIs('admin.pola-makan-sehat') ? 'rgba(85, 107, 47, 0.1)' : 'transparent' }}; transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-size: 13px; font-family: 'Poppins', sans-serif; font-weight: 400; position: relative; border-radius: 12px; margin: 2px 8px;">
                        <div class="submenu-indicator" style="width: 6px; height: 6px; border-radius: 50%; background: #556B2F; margin-right: 12px; transform: {{ request()->routeIs('admin.pola-makan-sehat') ? 'scale(1)' : 'scale(0)' }}; transition: transform 0.3s ease;"></div>
                        <span style="margin-left: 8px; transition: transform 0.3s ease;">Pola Makan Sehat</span>
                    </a>
                <a href="{{ route('admin.aktivitas-fisik') }}" class="submenu-item {{ request()->routeIs('admin.aktivitas-fisik') ? 'active' : '' }}" style="display: flex; align-items: center; padding: 12px 20px; text-decoration: none; color: {{ request()->routeIs('admin.aktivitas-fisik') ? '#556B2F' : '#6b7280' }}; background-color: {{ request()->routeIs('admin.aktivitas-fisik') ? 'rgba(85, 107, 47, 0.1)' : 'transparent' }}; transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-size: 13px; font-family: 'Poppins', sans-serif; font-weight: 400; position: relative; border-radius: 12px; margin: 2px 8px;">
                    <div class="submenu-indicator" style="width: 6px; height: 6px; border-radius: 50%; background: #556B2F; margin-right: 12px; transform: {{ request()->routeIs('admin.aktivitas-fisik') ? 'scale(1)' : 'scale(0)' }}; transition: transform 0.3s ease;"></div>
                    <span style="margin-left: 8px; transition: transform 0.3s ease;">Aktivitas Fisik</span>
                </a>
                <a href="{{ route('admin.kesehatan-mental') }}" class="submenu-item {{ request()->routeIs('admin.kesehatan-mental') ? 'active' : '' }}" style="display: flex; align-items: center; padding: 12px 20px; text-decoration: none; color: {{ request()->routeIs('admin.kesehatan-mental') ? '#556B2F' : '#6b7280' }}; background-color: {{ request()->routeIs('admin.kesehatan-mental') ? 'rgba(85, 107, 47, 0.1)' : 'transparent' }}; transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-size: 13px; font-family: 'Poppins', sans-serif; font-weight: 400; position: relative; border-radius: 12px; margin: 2px 8px;">
                    <div class="submenu-indicator" style="width: 6px; height: 6px; border-radius: 50%; background: #556B2F; margin-right: 12px; transform: {{ request()->routeIs('admin.kesehatan-mental') ? 'scale(1)' : 'scale(0)' }}; transition: transform 0.3s ease;"></div>
                    <span style="margin-left: 8px; transition: transform 0.3s ease;">Kesehatan Mental</span>
                </a>
                <a href="{{ route('admin.perawatan-diri') }}" class="submenu-item {{ request()->routeIs('admin.perawatan-diri') ? 'active' : '' }}" style="display: flex; align-items: center; padding: 12px 20px; text-decoration: none; color: {{ request()->routeIs('admin.perawatan-diri') ? '#556B2F' : '#6b7280' }}; background-color: {{ request()->routeIs('admin.perawatan-diri') ? 'rgba(85, 107, 47, 0.1)' : 'transparent' }}; transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-size: 13px; font-family: 'Poppins', sans-serif; font-weight: 400; position: relative; border-radius: 12px; margin: 2px 8px;">
                    <div class="submenu-indicator" style="width: 6px; height: 6px; border-radius: 50%; background: #556B2F; margin-right: 12px; transform: {{ request()->routeIs('admin.perawatan-diri') ? 'scale(1)' : 'scale(0)' }}; transition: transform 0.3s ease;"></div>
                        <span style="margin-left: 8px; transition: transform 0.3s ease;">Perawatan Diri</span>
                    </a>
                    <a href="{{ route('admin.gaya-hidup-vegan') }}" class="submenu-item {{ request()->routeIs('admin.gaya-hidup-vegan') ? 'active' : '' }}" style="display: flex; align-items: center; padding: 12px 20px; text-decoration: none; color: {{ request()->routeIs('admin.gaya-hidup-vegan') ? '#556B2F' : '#6b7280' }}; background-color: {{ request()->routeIs('admin.gaya-hidup-vegan') ? 'rgba(85, 107, 47, 0.1)' : 'transparent' }}; transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-size: 13px; font-family: 'Poppins', sans-serif; font-weight: 400; position: relative; border-radius: 12px; margin: 2px 8px;">
                        <div class="submenu-indicator" style="width: 6px; height: 6px; border-radius: 50%; background: #556B2F; margin-right: 12px; transform: {{ request()->routeIs('admin.gaya-hidup-vegan') ? 'scale(1)' : 'scale(0)' }}; transition: transform 0.3s ease;"></div>
                        <span style="margin-left: 8px; transition: transform 0.3s ease;">Gaya Hidup Vegan</span>
                    </a>
                    <a href="{{ route('admin.eco-living') }}" class="submenu-item {{ request()->routeIs('admin.eco-living') ? 'active' : '' }}" style="display: flex; align-items: center; padding: 12px 20px; text-decoration: none; color: {{ request()->routeIs('admin.eco-living') ? '#556B2F' : '#6b7280' }}; background-color: {{ request()->routeIs('admin.eco-living') ? 'rgba(85, 107, 47, 0.1)' : 'transparent' }}; transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-size: 13px; font-family: 'Poppins', sans-serif; font-weight: 400; position: relative; border-radius: 12px; margin: 2px 8px;">
                        <div class="submenu-indicator" style="width: 6px; height: 6px; border-radius: 50%; background: #556B2F; margin-right: 12px; transform: {{ request()->routeIs('admin.eco-living') ? 'scale(1)' : 'scale(0)' }}; transition: transform 0.3s ease;"></div>
                        <span style="margin-left: 8px; transition: transform 0.3s ease;">Eco Living</span>
                    </a>
                @endif
            </div>
            
        </div>

        <!-- Fitplan Menu Item -->
        <a href="#" class="menu-item" style="display: flex; align-items: center; padding: 14px 20px; text-decoration: none; color: #6b7280; border-radius: 25px; margin-bottom: 12px; transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-weight: 500; position: relative; overflow: hidden;">
            <div class="icon-container" style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center;">
                <svg style="width: 24px; height: 24px; margin-right: 16px; fill: currentColor; transition: transform 0.3s ease; flex-shrink: 0;" viewBox="0 0 24 24">
                    <rect x="1" y="7" width="5" height="10" rx="2"/>
                    <rect x="6" y="10" width="12" height="4" rx="1"/>
                    <rect x="18" y="7" width="5" height="10" rx="2"/>
                </svg>
            </div>
            <span style="font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; letter-spacing: -0.01em; position: relative; z-index: 2; line-height: 1; display: flex; align-items: center;">Fitplan</span>
            <div class="menu-item-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, #f3f4f6, #e5e7eb); border-radius: 25px; transform: scale(0); transition: transform 0.3s ease; opacity: 0;"></div>
        </a>

        <!-- Langganan Menu Item -->
        <a href="{{ route('admin.langganan') }}" class="menu-item {{ request()->routeIs('admin.langganan') ? 'active' : '' }}" style="display: flex; align-items: center; padding: 14px 20px; text-decoration: none; color: {{ request()->routeIs('admin.langganan') ? 'white' : '#6b7280' }}; background-color: {{ request()->routeIs('admin.langganan') ? '#556B2F' : 'transparent' }}; border-radius: 25px; margin-bottom: 12px; transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-weight: 500; position: relative; overflow: hidden;">
            <div class="icon-container" style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center;">
                <svg style="width: 24px; height: 24px; margin-right: 16px; fill: currentColor; transition: transform 0.3s ease; flex-shrink: 0;" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z"/>
                </svg>
            </div>
            <span style="font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; letter-spacing: -0.01em; position: relative; z-index: 2; line-height: 1; display: flex; align-items: center;">Langganan</span>
            @if(request()->routeIs('admin.langganan'))
                <div class="menu-item-shine" style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: left 0.6s ease;"></div>
            @else
                <div class="menu-item-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, #f3f4f6, #e5e7eb); border-radius: 25px; transform: scale(0); transition: transform 0.3s ease; opacity: 0;"></div>
            @endif
        </a>

        <!-- Log out Menu Item -->
        <form action="{{ route('logout') }}" method="POST" style="margin: 0; padding: 0;">
            @csrf
            <button type="submit" class="menu-item logout-btn" style="display: flex; align-items: center; padding: 14px 20px; text-decoration: none; color: #6b7280; border-radius: 25px; margin-bottom: 12px; transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94); font-weight: 500; background: none; border: none; width: 100%; cursor: pointer; font-family: 'Poppins', sans-serif; text-align: left; position: relative; overflow: hidden;">
                <div class="icon-container" style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-door-open" style="width: 24px; height: 24px; margin-right: 16px; font-size: 20px; display: flex; align-items: center; justify-content: center; transition: transform 0.3s ease; flex-shrink: 0;"></i>
                </div>
                <span style="font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; letter-spacing: -0.01em; position: relative; z-index: 2; line-height: 1; display: flex; align-items: center;">Log out</span>
                <div class="logout-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: transparent; border-radius: 25px; transform: scale(0); transition: transform 0.3s ease; opacity: 0;"></div>
            </button>
        </form>
    </nav>
</div>

<!-- Add enhanced animations and effects with CSS -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    
    /* Enhanced logo animation */
    .logo-section {
        transition: all 0.3s ease;
        position: relative;
    }
    
    .logo-section::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgba(85,107,47,0.1) 0%, transparent 70%);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: all 0.3s ease;
        z-index: 0;
    }
    
    .logo-section:hover::before {
        width: 120px;
        height: 120px;
    }
    
    .logo-section img {
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        position: relative;
        z-index: 1;
    }
    
    .logo-section:hover img {
        transform: scale(1.05);
    }
    
    /* Enhanced sidebar effects */
    .sidebar-admin {
        box-shadow: 2px 0 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        position: relative;
    }
    
    .sidebar-admin::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, #556B2F, #7d9c3b, #556B2F);
        background-size: 200% 100%;
        animation: shimmer 3s ease-in-out infinite;
    }
    
    @keyframes shimmer {
        0%, 100% { background-position: 200% 0; }
        50% { background-position: -200% 0; }
    }
    
    .sidebar-admin.scrollable {
        overflow-y: auto !important;
    }
    
    .sidebar-admin.scrollable::-webkit-scrollbar {
        width: 6px;
    }
    
    .sidebar-admin.scrollable::-webkit-scrollbar-track {
        background: rgba(241, 241, 241, 0.5);
        border-radius: 3px;
    }
    
    .sidebar-admin.scrollable::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #556B2F, #7d9c3b);
        border-radius: 3px;
        transition: all 0.3s ease;
    }
    
    .sidebar-admin.scrollable::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, #7d9c3b, #556B2F);
        transform: scale(1.2);
    }
    
    /* Enhanced menu item animations */
    .sidebar-admin .menu-item:hover:not(.active):not(.page-active) {
        color: #374151 !important;
        transform: scale(1.02);
        box-shadow: 0 2px 8px rgba(85,107,47,0.08);
    }

    .sidebar-admin .menu-item:hover:not(.active):not(.page-active) .icon-container svg {
        transform: scale(1.1);
        color: #556B2F;
    }

    /* Disable hover effects for active menu items */
    .sidebar-admin .menu-item.active:hover {
        color: white !important;
        background: linear-gradient(135deg, #556B2F 0%, #7d9c3b 100%) !important;
        transform: scale(1.02) !important;
        box-shadow: 0 10px 30px rgba(85,107,47,0.3) !important;
    }
    
    /* Active menu item enhancements */
    .sidebar-admin .menu-item.active {
        background: linear-gradient(135deg, #556B2F 0%, #7d9c3b 100%) !important;
        color: white !important;
        box-shadow: 0 10px 30px rgba(85,107,47,0.3);
        transform: scale(1.02);
    }
    
    .sidebar-admin .menu-item.active:hover .menu-item-shine {
        left: 100%;
    }
    
    .sidebar-admin .menu-item.active .icon-container svg {
        animation: activeIconPulse 2s ease-in-out infinite;
    }
    
    @keyframes activeIconPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }
    
    /* Floating effect for menu items */
    .sidebar-admin .menu-item {
        position: relative;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    .sidebar-admin .menu-item::after {
        content: '';
        position: absolute;
        right: -5px;
        top: 50%;
        width: 0;
        height: 50%;
        background: linear-gradient(to right, transparent, rgba(85,107,47,0.2));
        transform: translateY(-50%) scaleX(0);
        transition: all 0.3s ease;
        border-radius: 0 4px 4px 0;
    }
    
    .sidebar-admin .menu-item:hover::after {
        width: 4px;
        transform: translateY(-50%) scaleX(1);
    }
    
    /* Enhanced dropdown styles */
    .artikel-dropdown .artikel-toggle:hover:not(.page-active) {
        color: #374151 !important;
        transform: scale(1.02);
        box-shadow: 0 2px 8px rgba(85,107,47,0.08);
    }

    .artikel-dropdown .artikel-toggle.page-active {
        background: linear-gradient(135deg, #556B2F 0%, #7d9c3b 100%) !important;
        color: white !important;
        box-shadow: 0 10px 30px rgba(85,107,47,0.3);
        transform: scale(1.02);
    }

    /* Disable hover effects when page is active */
    .artikel-dropdown .artikel-toggle.page-active:hover {
        color: white !important;
        background: linear-gradient(135deg, #556B2F 0%, #7d9c3b 100%) !important;
        transform: scale(1.02) !important;
    }

    .artikel-dropdown .artikel-toggle.dropdown-open:not(.page-active) {
        color: #374151 !important;
        transform: scale(1.02);
        box-shadow: 0 2px 8px rgba(85,107,47,0.08);
    }  
    /* Enhanced submenu animations */
    #artikel-submenu {
        max-height: 0;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        transform: translateY(-10px);
        opacity: 0;
    }
    
    #artikel-submenu.show {
        max-height: 400px;
        display: block !important;
        transform: translateY(0);
        opacity: 1;
        animation: submenuSlideIn 0.5s ease-out;
    }
    
    @keyframes submenuSlideIn {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    
    /* Enhanced submenu items */
    .artikel-dropdown .submenu-item:hover {
        background: rgba(85,107,47,0.08) !important;
        color: #556B2F !important;
        border-radius: 12px !important;
        transform: scale(1.02);
    }
    
    .artikel-dropdown .submenu-item:hover .submenu-indicator {
        transform: scale(1.2);
        background: linear-gradient(45deg, #556B2F, #7d9c3b);
        box-shadow: 0 0 10px rgba(85,107,47,0.5);
        animation: indicatorPulse 1s ease-in-out infinite;
    }
    
    @keyframes indicatorPulse {
        0%, 100% { box-shadow: 0 0 10px rgba(85,107,47,0.5); }
        50% { box-shadow: 0 0 20px rgba(85,107,47,0.8); }
    }
    
    .artikel-dropdown .submenu-item:hover span {
        transform: scale(1.02);
        color: #556B2F;
        font-weight: 500;
    }
    
    /* Arrow rotation enhancement */
    #artikel-arrow {
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
    }
    
    #artikel-arrow.rotated {
        transform: rotate(180deg) scale(1.1);
        color: #556B2F;
    }
    
    /* Logout button special effects */
    .logout-btn:hover {
        color: #dc2626 !important;
        transform: scale(1.02);
        box-shadow: 0 2px 8px rgba(220,38,38,0.08);
    }
    
    .logout-btn:hover .icon-container i {
        transform: scale(1.1);
        color: #dc2626;
    }
    
    /* Stagger animation for menu items on initial load only */
    .sidebar-admin.initial-load .menu-item {
        animation: menuItemFadeIn 0.6s ease-out both;
    }
    
    .sidebar-admin.initial-load .menu-item:nth-child(1) { animation-delay: 0.1s; }
    .sidebar-admin.initial-load .menu-item:nth-child(2) { animation-delay: 0.2s; }
    .sidebar-admin.initial-load .menu-item:nth-child(3) { animation-delay: 0.3s; }
    .sidebar-admin.initial-load .menu-item:nth-child(4) { animation-delay: 0.4s; }
    .sidebar-admin.initial-load .menu-item:nth-child(5) { animation-delay: 0.5s; }
    
    @keyframes menuItemFadeIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    /* Enhanced focus states */
    .sidebar-admin .menu-item:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(85,107,47,0.3);
        transform: scale(1.02);
    }
    
    /* Menu item base styles */
    .menu-item {
        position: relative;
        overflow: hidden;
    }
    
    /* Magnetic hover effect */
    .sidebar-admin .menu-item {
        transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
    }
    
    /* Breathing animation for active items */
    .sidebar-admin .menu-item.active {
        animation: activeBreathing 3s ease-in-out infinite;
    }
    
    @keyframes activeBreathing {
        0%, 100% { box-shadow: 0 10px 30px rgba(85,107,47,0.3); }
        50% { box-shadow: 0 15px 40px rgba(85,107,47,0.4); }
    }
    
    /* Glow effect on hover */
    .sidebar-admin .menu-item:hover {
        position: relative;
    }
    
    .sidebar-admin .menu-item:hover::before {
        box-shadow: 0 0 20px rgba(85,107,47,0.3);
    }
    
    /* Enhanced transitions with spring effect */
    .sidebar-admin .menu-item {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    /* Particle effect simulation */
    .sidebar-admin::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(2px 2px at 20px 30px, rgba(85,107,47,0.1), transparent),
            radial-gradient(2px 2px at 40px 70px, rgba(125,156,59,0.1), transparent),
            radial-gradient(1px 1px at 90px 40px, rgba(85,107,47,0.1), transparent),
            radial-gradient(1px 1px at 130px 80px, rgba(125,156,59,0.1), transparent),
            radial-gradient(2px 2px at 160px 30px, rgba(85,107,47,0.1), transparent);
        background-repeat: repeat;
        background-size: 200px 100px;
        animation: particleFloat 20s linear infinite;
        pointer-events: none;
        z-index: 0;
    }
    
    @keyframes particleFloat {
        0% { transform: translateY(0px); }
        100% { transform: translateY(-200px); }
    }
    
    /* Menu item content z-index fix */
    .sidebar-admin .menu-item > * {
        position: relative;
        z-index: 2;
    }
    
    /* Enhanced submenu indicator animation */
    .submenu-indicator {
        position: relative;
    }
    
    .submenu-indicator::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: inherit;
        transform: scale(0);
        transition: transform 0.3s ease;
    }
    
    .submenu-item:hover .submenu-indicator::after {
        transform: scale(1.8);
        opacity: 0.3;
    }
    
    /* Loading animation on initial page load only */
    .sidebar-admin.initial-load {
        animation: sidebarSlideIn 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    /* Enhanced welcome animation when coming from login */
    .sidebar-admin.initial-load.from-login {
        animation: sidebarWelcomeIn 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    .sidebar-admin.initial-load.from-login .logo-section img {
        animation: logoWelcomeIn 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.3s both;
    }
    
    @keyframes sidebarSlideIn {
        from {
            transform: translateX(-100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes sidebarWelcomeIn {
        0% {
            transform: translateX(-100%) scale(0.9);
            opacity: 0;
        }
        50% {
            transform: translateX(0) scale(1.02);
            opacity: 0.8;
        }
        100% {
            transform: translateX(0) scale(1);
            opacity: 1;
        }
    }
    
    @keyframes logoWelcomeIn {
        0% {
            opacity: 0;
            transform: scale(0.5);
        }
        60% {
            opacity: 0.8;
            transform: scale(1.15);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    /* Smooth logo entrance on initial load only */
    .sidebar-admin.initial-load .logo-section img {
        animation: logoFadeIn 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.3s both;
    }
    
    @keyframes logoFadeIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    /* Enhanced dropdown arrow physics */
    #artikel-arrow {
        transform-origin: center;
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
    
    /* Micro-interactions for better UX */
    .menu-item:hover .icon-container svg {
        transition: transform 0.3s ease;
    }
    
    /* Glass morphism effect for submenu */
    #artikel-submenu {
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,0.2);
        position: relative;
    }
    
    #artikel-submenu::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, 
            rgba(255,255,255,0.1) 0%, 
            rgba(255,255,255,0.05) 50%, 
            rgba(255,255,255,0.1) 100%);
        border-radius: 16px;
        pointer-events: none;
    }
    
    /* Smooth scroll behavior */
    .sidebar-admin.scrollable {
        scroll-behavior: smooth;
    }
    
    /* Enhanced focus accessibility */
    .menu-item:focus-visible {
        outline: 2px solid #556B2F;
        outline-offset: 2px;
        border-radius: 25px;
    }
    
    /* Final touch: subtle gradient overlay */
    .sidebar-admin::before {
        background: linear-gradient(180deg, 
            rgba(85,107,47,0.05) 0%, 
            transparent 20%, 
            transparent 80%, 
            rgba(85,107,47,0.03) 100%);
    }
</style>

<script>
function toggleArtikelDropdown() {
    const submenu = document.getElementById('artikel-submenu');
    const arrow = document.getElementById('artikel-arrow');
    const toggle = document.querySelector('.artikel-toggle');
    const sidebar = document.getElementById('sidebar-admin');
    
    
    if (submenu.style.display === 'block') {
        // Close dropdown
        submenu.style.display = 'none';
        submenu.classList.remove('show');
        arrow.classList.remove('rotated');
        // Only remove dropdown-open, preserve page-active if it exists
        if (!toggle.classList.contains('page-active')) {
            toggle.classList.remove('dropdown-open');
        }
        sidebar.classList.remove('scrollable');
    } else {
        // Open dropdown
        submenu.style.display = 'block';
        submenu.classList.add('show');
        arrow.classList.add('rotated');
        // Add dropdown-open only if not already page-active
        if (!toggle.classList.contains('page-active')) {
            toggle.classList.add('dropdown-open');
        }
        sidebar.classList.add('scrollable');
    }
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const dropdown = document.querySelector('.artikel-dropdown');
    const submenu = document.getElementById('artikel-submenu');
    const arrow = document.getElementById('artikel-arrow');
    const toggle = document.querySelector('.artikel-toggle');
    const sidebar = document.getElementById('sidebar-admin');
    
    if (!dropdown.contains(event.target)) {
        submenu.style.display = 'none';
        submenu.classList.remove('show');
        arrow.classList.remove('rotated');
        // Only remove dropdown-open, preserve page-active if it exists
        if (!toggle.classList.contains('page-active')) {
            toggle.classList.remove('dropdown-open');
        }
        sidebar.classList.remove('scrollable');
    }
});

// Enhanced initialization with animations
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar-admin');
    const submenu = document.getElementById('artikel-submenu');
    const arrow = document.getElementById('artikel-arrow');
    const toggle = document.querySelector('.artikel-toggle');
    
    // Check if this is coming from outside admin area
    const referrer = document.referrer;
    const currentUrl = window.location.href;
    
    // More specific detection for admin navigation
    const isFromLogin = referrer.includes('/login') || referrer.includes('/masuk') || referrer.includes('/auth/');
    const isFromAdminArea = referrer.includes('/admin/');
    const isFromUserPages = referrer !== '' && !isFromAdminArea && !isFromLogin;
    const isDirectAccess = !referrer || referrer === '';
    const isFirstAdminVisit = !sessionStorage.getItem('adminVisited');
    
    // Show animations ONLY if:
    // 1. Coming from login/auth pages (successful login)
    // 2. Coming from user/front-end pages (switching to admin)
    // 3. Direct access (typing admin URL directly)
    // 4. First time visiting admin area in this session
    // DO NOT show if navigating within admin area
    const shouldShowAnimations = (isFromLogin || isFromUserPages || isDirectAccess || isFirstAdminVisit) && !isFromAdminArea;
    
    // Debug information (remove in production)
    console.log('Sidebar Animation Debug:', {
        referrer: referrer,
        isFromLogin: isFromLogin,
        isFromAdminArea: isFromAdminArea,
        isFromUserPages: isFromUserPages,
        isFirstAdminVisit: isFirstAdminVisit,
        isDirectAccess: isDirectAccess,
        shouldShowAnimations: shouldShowAnimations
    });
    
    if (!shouldShowAnimations) {
        // Remove initial-load class if navigating within admin area
        sidebar.classList.remove('initial-load');
    } else {
        // Mark that admin area has been visited
        sessionStorage.setItem('adminVisited', 'true');
        
        // Add special class if coming from login for enhanced welcome animation
        if (isFromLogin) {
            sidebar.classList.add('from-login');
        }
        
        // Remove initial-load class after animations complete
        setTimeout(() => {
            sidebar.classList.remove('initial-load');
            sidebar.classList.remove('from-login');
        }, 2000); // After all animations finish
    }
    
    // Initial state - no scrolling
    sidebar.style.overflowY = 'hidden';
    
    // Auto-open dropdown if we're on an article page
    if (toggle && toggle.classList.contains('page-active')) {
        submenu.style.display = 'block';
        submenu.classList.add('show');
        arrow.classList.add('rotated');
        sidebar.classList.add('scrollable');
    }
    
    // Add wheel event listener to prevent scrolling when dropdown is closed
    sidebar.addEventListener('wheel', function(e) {
        if (!sidebar.classList.contains('scrollable')) {
            e.preventDefault();
        }
    });
    
    // Get menu items for other effects
    const menuItems = document.querySelectorAll('.menu-item');
    
    // Add magnetic effect for menu items
    menuItems.forEach(item => {
        item.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            
            const distance = Math.sqrt(x * x + y * y);
            const maxDistance = Math.max(rect.width, rect.height);
            
            if (distance < maxDistance * 0.8) {
                const strength = (maxDistance * 0.8 - distance) / (maxDistance * 0.8);
                const moveX = (x / maxDistance) * 10 * strength;
                const moveY = (y / maxDistance) * 5 * strength;
                
                this.style.transform = `translate(${moveX}px, ${moveY}px) scale(1.02)`;
            }
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });
    
    // Stagger animation for menu items
    menuItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
    });
});

// Add smooth scrolling behavior
if (window.CSS && CSS.supports('scroll-behavior', 'smooth')) {
    document.documentElement.style.scrollBehavior = 'smooth';
}

// Performance optimization for animations
const preferReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
if (preferReducedMotion.matches) {
    // Disable or reduce animations for users who prefer reduced motion
    const style = document.createElement('style');
    style.textContent = `
        *, *::before, *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    `;
    document.head.appendChild(style);
}
</script>