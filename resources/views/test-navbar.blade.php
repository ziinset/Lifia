<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Navbar Dropdown - LIFIA</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Iconify for icons -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #7BA05B 0%, #8BAC65 50%, #A8C373 100%);
            min-height: 100vh;
        }

        .test-container {
            padding: 100px 20px 20px;
            text-align: center;
            color: white;
        }

        .test-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 20px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .test-desc {
            font-size: 18px;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        .test-button {
            background: white;
            color: #7BA05B;
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .test-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    {{-- Include Navbar2 with Hero1 compatibility --}}
    @include('components.navbar2')

    <div class="test-container">
        <h1 class="test-title">Test Navbar Dropdown</h1>
        <p class="test-desc">Klik tombol "Artikel" di navbar untuk test dropdown functionality</p>
        <p class="test-desc">Dropdown seharusnya muncul dengan 6 menu kategori</p>

        <button class="test-button" onclick="location.reload()">
            Refresh Halaman
        </button>
    </div>

    <script>
        // Debug script untuk test dropdown
        document.addEventListener("DOMContentLoaded", function() {
            console.log('Test page loaded successfully');

            const artikelToggle = document.getElementById("navbarArtikelToggle");
            if (artikelToggle) {
                console.log('✅ Navbar dropdown button found');
                console.log('📍 Button text:', artikelToggle.textContent.trim());

                artikelToggle.addEventListener("click", function() {
                    console.log('🎯 Dropdown button clicked!');
                });
            } else {
                console.error('❌ Navbar dropdown button NOT found');
            }
        });
    </script>

</body>
</html>
