<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lifia Sidebar</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/3.1.1/iconify.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #ffffff;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px 0;
        }

        .logo {
            text-align: center;
            padding: 0 20px 40px 20px;
            margin-bottom: 20px;
        }

        .logo h1 {
            color: #7a8b47;
            font-size: 2.2rem;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            margin: 0 15px 8px 15px;
            border-radius: 25px;
            color: #9ca3af;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .menu-item:hover {
            background-color: #f3f4f6;
            color: #374151;
            transform: translateX(2px);
        }

        .menu-item.active {
            background-color: #7a8b47;
            color: #ffffff;
        }

        .menu-item.active:hover {
            background-color: #6b7a3f;
            color: #ffffff;
            transform: translateX(2px);
        }

        .menu-icon {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .menu-text {
            flex: 1;
        }

        /* Main content area untuk demo */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
        }

        .content-demo {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h1>Lifia</h1>
        </div>

        <nav>
            <a href="#" class="menu-item active">
                <iconify-icon icon="material-symbols:home" class="menu-icon"></iconify-icon>
                <span class="menu-text">Dashboard</span>
            </a>

            <a href="#" class="menu-item">
                <iconify-icon icon="material-symbols:grid-view" class="menu-icon"></iconify-icon>
                <span class="menu-text">Kategori</span>
            </a>

            <a href="#" class="menu-item">
                <iconify-icon icon="material-symbols:article-outline" class="menu-icon"></iconify-icon>
                <span class="menu-text">Artikel</span>
            </a>

            <a href="#" class="menu-item">
                <iconify-icon icon="material-symbols:flag-outline" class="menu-icon"></iconify-icon>
                <span class="menu-text">Fitplan</span>
            </a>

            <a href="#" class="menu-item">
                <iconify-icon icon="material-symbols:settings-outline" class="menu-icon"></iconify-icon>
                <span class="menu-text">Pengaturan</span>
            </a>

            <a href="#" class="menu-item">
                <iconify-icon icon="material-symbols:logout" class="menu-icon"></iconify-icon>
                <span class="menu-text">Log out</span>
            </a>
        </nav>
    </div>

    <!-- Demo content area -->
    <div class="main-content">
        <div class="content-demo">
            <h2>Konten Utama</h2>
            <p>Ini adalah area konten utama. Sidebar sudah siap digunakan di Laravel Anda.</p>
        </div>
    </div>

    <script>
        // JavaScript untuk interaksi menu
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function(e) {
                // Remove active class from all items
                document.querySelectorAll('.menu-item').forEach(menu => {
                    menu.classList.remove('active');
                });

                // Add active class to clicked item
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>