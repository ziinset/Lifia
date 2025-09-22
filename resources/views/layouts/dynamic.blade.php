<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @php
        $headerData = \App\Helpers\HeaderHelper::getHeaderData();
        $headerComponent = \App\Helpers\HeaderHelper::getHeaderComponent();
        $navbarType = \App\Helpers\HeaderHelper::getNavbarType();
    @endphp
    
    <title>{{ $headerData['title'] }} - Lifia</title>
    <meta name="description" content="{{ $headerData['description'] }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    
    <!-- Custom Styles -->
    @stack('styles')
    
    <style>
        /* Dynamic theme colors based on category */
        :root {
            --primary-color: {{ $headerData['color'] }};
            --primary-light: {{ $headerData['color'] }}20;
            --primary-dark: {{ $headerData['color'] }}dd;
        }
        
        /* Base styles */
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
        
        /* Dynamic header styles */
        .dynamic-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 2rem 0;
            text-align: center;
        }
        
        .dynamic-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .dynamic-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .dynamic-header .icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.8;
        }
        
        /* Content wrapper */
        .content-wrapper {
            min-height: calc(100vh - 200px);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .dynamic-header h1 {
                font-size: 2rem;
            }
            
            .dynamic-header p {
                font-size: 1rem;
                padding: 0 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Dynamic Navbar -->
    @if($navbarType === 'navbar2')
        @include('components.navbar2')
    @else
        @include('components.navbar')
    @endif
    
    <!-- Dynamic Header -->
    @if(\App\Helpers\HeaderHelper::shouldUseDynamicHeader())
        <div class="dynamic-header">
            <div class="container">
                @if($headerData['icon'])
                    <div class="icon">
                        <i class="{{ $headerData['icon'] }}"></i>
                    </div>
                @endif
                <h1>{{ $headerData['title'] }}</h1>
                @if($headerData['description'])
                    <p>{{ $headerData['description'] }}</p>
                @endif
            </div>
        </div>
    @else
        @include($headerComponent)
    @endif
    
    <!-- Main Content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    
    <!-- Footer -->
    @include('components.footer')
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('scripts')
    
    <script>
        // Global CSRF token for AJAX requests
        window.csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
        
        // Set up AJAX defaults
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': window.csrfToken
            }
        });
        
        // Dynamic theme application
        document.addEventListener('DOMContentLoaded', function() {
            // Apply dynamic colors to elements
            const primaryColor = '{{ $headerData["color"] }}';
            
            // Update CSS custom properties
            document.documentElement.style.setProperty('--primary-color', primaryColor);
            document.documentElement.style.setProperty('--primary-light', primaryColor + '20');
            document.documentElement.style.setProperty('--primary-dark', primaryColor + 'dd');
        });
    </script>
</body>
</html>
