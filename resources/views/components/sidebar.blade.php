<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar - Lifia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tambah Google Fonts Poppins -->
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

        /* Sidebar */
        .sidebar {
            width: 16rem;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 1000;
        }
        
        .sidebar .brand {
            padding: 1.5rem 1.5rem 1rem 1.5rem;
            border-bottom: 1px solid #f3f4f6;
            display: flex;
            justify-content: center; 
            align-items: center;     
        }

        .sidebar .brand img.logo {
            width: 90px;  
            height: auto;  
            display: block;
        }
        
        .sidebar nav {
            padding: 1.5rem;
            flex: 1;
            position: relative;
        }

        .sidebar nav a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.25rem;
            margin-bottom: 0.75rem;
            border-radius: 12px;
            color: #6b7280;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid transparent;
        }

        .sidebar nav a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(107, 114, 128, 0.1), transparent);
            opacity: 0;
            transition: all 0.6s ease;
            z-index: -1;
        }

        .sidebar nav a::after {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 3px;
            height: 0;
            background: linear-gradient(to bottom, #799549, #b2d476ff);
            border-radius: 0 3px 3px 0;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            transform: translateY(-50%);
            opacity: 0;
        }

        .sidebar nav a.active {
            background: linear-gradient(90deg, 
                #799549 0%, 
                #b2d476ff 50%, 
                #edf8eeff 100%);
            color: white;
            font-weight: 600;
            box-shadow: 0 8px 25px rgba(121, 149, 73, 0.3),
                        0 3px 10px rgba(121, 149, 73, 0.2);
            transform: translateY(-1px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            margin-left: 0;
            margin-right: 0;
            padding-left: 1.25rem;
            padding-right: 1.25rem;
        }

        .sidebar nav a.active::before {
            opacity: 0;
            background: transparent;
        }

        .sidebar nav a.active::after {
            height: 100%;
            opacity: 1;
            background: rgba(255, 255, 255, 0.3);
            width: 2px;
        }

        .sidebar nav a:hover:not(.active) {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            color: #374151;
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08),
                        0 3px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(107, 114, 128, 0.1);
        }

        .sidebar nav a:hover:not(.active)::before {
            opacity: 1;
            left: 0;
        }

        .sidebar nav a:hover:not(.active)::after {
            height: 60%;
            opacity: 1;
            background: linear-gradient(to bottom, #799549, #b2d476ff);
        }

        .sidebar nav a i {
            width: 18px;
            height: 18px;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
        }

        .sidebar nav a.active i {
            transform: scale(1.1);
            filter: drop-shadow(0 1px 3px rgba(0, 0, 0, 0.2));
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .sidebar nav a:hover:not(.active) i {
            transform: scale(1.15) rotate(5deg);
            color: #799549;
        }

        .sidebar nav a span {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            letter-spacing: 0.025em;
        }

        .sidebar nav a:hover:not(.active) span {
            transform: translateX(3px);
        }

        .sidebar nav a.active span {
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* Tambahan efek untuk interaksi yang lebih smooth */
        .sidebar nav a:active:not(.active) {
            transform: translateY(0) scale(0.98);
            transition: transform 0.1s ease;
        }

        /* Efek glow pada hover */
        .sidebar nav a:hover:not(.active) {
            position: relative;
        }

        .sidebar nav a:hover:not(.active):before {
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .sidebar nav {
                padding: 1rem;
            }
            
            .sidebar nav a {
                padding: 0.875rem 1rem;
                margin-bottom: 0.5rem;
                border-radius: 10px;
            }
            
            .sidebar nav a i {
                width: 16px;
                height: 16px;
                font-size: 14px;
            }
        }

        @media (max-width: 1024px) {
            .sidebar {
                width: 14rem;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.mobile-open {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>

<!-- Sidebar Component -->
<aside class="sidebar">
    <div class="brand">
        <img src="{{ asset('img/logo-lifia-nav.svg') }}" alt="Lifia Logo" class="logo">
    </div>
    <nav>
        <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">
            <i class="fas fa-user"></i> <span>Profil Saya</span>
        </a>
        <a href="{{ route('aktivitas') }}" class="{{ request()->routeIs('aktivitas') ? 'active' : '' }}">
            <i class="fas fa-chart-line"></i> <span>Aktivitas Saya</span>
        </a>
        <a href="{{ route('koleksi') }}" class="{{ request()->routeIs('koleksi') ? 'active' : '' }}">
            <i class="fas fa-heart"></i> <span>Koleksi Favorit</span>
        </a>
        <a href="{{ route('progres') }}" class="{{ request()->routeIs('progres') ? 'active' : '' }}">
            <i class="fas fa-skull"></i> <span>Progres Kesehatan</span>
        </a>
        <a href="{{ route('premium') }}" class="{{ request()->routeIs('premium') ? 'active' : '' }}">
            <i class="fas fa-crown"></i> <span>Premium</span>
        </a>
        <a href="#">
            <i class="fas fa-door-open"></i> <span>Logout</span>
        </a>
    </nav>
</aside>

</body>
</html>
