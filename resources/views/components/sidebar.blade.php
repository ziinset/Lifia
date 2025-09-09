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
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background-color: #f9fafb; }

        /* Sidebar */
        .sidebar { width: 16rem; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            display: flex; flex-direction: column; position: fixed; height: 100vh; z-index: 1000; }
        .sidebar .brand { padding: 1.5rem; border-bottom: 1px solid #f3f4f6;
            display: flex; justify-content: center; align-items: center; }
        .sidebar .brand img.logo { width: 90px; height: auto; display: block; }
        .sidebar nav { padding: 1.5rem; flex: 1; position: relative; }

        .sidebar nav a, .sidebar nav button {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 1rem 1.25rem; margin-bottom: 0.75rem;
            border-radius: 12px; color: #6b7280; text-decoration: none;
            font-weight: 500; font-size: 0.9rem; transition: all 0.4s;
            position: relative; overflow: hidden; backdrop-filter: blur(10px);
            border: 1px solid transparent; background: none; cursor: pointer; width: 100%; text-align: left;
        }

        .sidebar nav a::before, .sidebar nav button::before {
            content: ''; position: absolute; top: 0; left: -100%; right: 0; bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(107, 114, 128, 0.1), transparent);
            opacity: 0; transition: all 0.6s ease; z-index: -1;
        }

        .sidebar nav a::after, .sidebar nav button::after {
            content: ''; position: absolute; left: 0; top: 50%; width: 3px; height: 0;
            background: linear-gradient(to bottom, #799549, #b2d476ff);
            border-radius: 0 3px 3px 0; transition: all 0.3s; transform: translateY(-50%); opacity: 0;
        }

        .sidebar nav a.active, .sidebar nav button.active {
            background: linear-gradient(90deg, #799549 0%, #b2d476ff 50%, #edf8eeff 100%);
            color: white; font-weight: 600; box-shadow: 0 8px 25px rgba(121, 149, 73, 0.3),
            0 3px 10px rgba(121, 149, 73, 0.2); transform: translateY(-1px);
            border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 12px;
        }

        .sidebar nav a:hover:not(.active), .sidebar nav button:hover:not(.active) {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            color: #374151; transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08), 0 3px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(107, 114, 128, 0.1);
        }

        .sidebar nav a i, .sidebar nav button i { width: 18px; height: 18px; font-size: 16px; display: flex; align-items: center; justify-content: center; }
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

        <!-- Logout pakai POST tapi styled seperti link -->
        <form action="{{ route('logout') }}" method="POST" style="margin:0; padding:0;">
            @csrf
            @php
                $redirectTo = request('redirect_to');
            @endphp
            @if($redirectTo)
                <input type="hidden" name="redirect_to" value="{{ $redirectTo }}">
            @endif
            
            <button type="submit" class="{{ request()->routeIs('logout') ? 'active' : '' }}">
                <i class="fas fa-door-open"></i> <span>Logout</span>
            </button>
        </form>
    </nav>
</aside>

</body>
</html>
