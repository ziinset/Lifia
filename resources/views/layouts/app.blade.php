<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lifia - Kesehatan dan Gaya Hidup')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Iconify -->
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

    <!-- Global Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .main-content {
            min-height: 100vh;
            padding-top: 83px;
        }

        html,
        body {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        html::-webkit-scrollbar,
        body::-webkit-scrollbar {
            display: none;
            width: 0;
            height: 0;
        }

        @media (max-width: 1024px) {
            .main-content {
                padding-top: 75px;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding-top: 65px;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding-top: 59px;
            }
        }
    </style>

    @yield('styles')
</head>

<body>
    @include('components.navbar2')
    <div class="main-content">
        @yield('content')
    </div>
    @include('components.footer')
    @yield('scripts')
</body>

</html>