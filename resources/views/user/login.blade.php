<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lifia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Hide scrollbars */
        html, body {
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none; /* Firefox */
        }
        html::-webkit-scrollbar, body::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
            width: 0;
            height: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background-image: url('/img/bg-loginregis.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .register-container {
            background: transparent;
            border-radius: 20px;
            padding: 3rem;
            width: 100%;
            max-width: 450px;
            margin-left: 644px;
        }

        .login-title {
            color: #ffffff;
            font-size: 2.5rem;
            font-weight: 700;
            text-align: left;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            color: #ffffff;
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            background-color: white;
            font-size: 1rem;
            color: #333;
            outline: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            transform: translateY(0);
        }

        .form-input:focus {
            border-color: #4a7c59;
            box-shadow: 0 0 0 3px rgba(74, 124, 89, 0.1), 
                        0 8px 25px rgba(74, 124, 89, 0.15);
            transform: translateY(-2px);
        }

        .form-input:focus + .input-glow {
            opacity: 1;
            transform: scale(1);
        }

        .form-input::placeholder {
            color: #999;
            transition: all 0.3s ease;
        }

        .form-input:focus::placeholder {
            color: #ccc;
            transform: translateX(5px);
        }

        /* Animasi glow effect untuk input */
        .input-glow {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 12px;
            background: linear-gradient(45deg, 
                rgba(74, 124, 89, 0.1), 
                rgba(180, 214, 120, 0.1));
            opacity: 0;
            transform: scale(0.95);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
            z-index: -1;
        }

        /* Animasi label saat focus */
        .form-group:focus-within .form-label {
            color: #B4D678;
            transform: translateY(-3px);
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 1.5rem;
        }

        .forgot-password a {
            color: #B4D678;
            text-decoration: underline;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .forgot-password a:hover {
            color: #ffffff;
            transform: translateY(-1px);
        }

        .login-button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, white 0%, #f8f9fa 100%);
            color: #333;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        /* Efek shimmer untuk button */
        .login-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(180, 214, 120, 0.4), 
                transparent);
            transition: left 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .login-button:hover::before {
            left: 100%;
        }

        .login-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15),
                        0 5px 15px rgba(74, 124, 89, 0.2);
            border-color: #4a7c59;
            background: linear-gradient(135deg, #ffffff 0%, #f1f8ff 100%);
        }

        .login-button:active {
            transform: translateY(-1px);
            transition: transform 0.1s ease;
        }

        /* Animasi loading untuk button */
        .login-button.loading {
            pointer-events: none;
            background: linear-gradient(135deg, #f0f0f0 0%, #e0e0e0 100%);
        }

        .login-button.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid #4a7c59;
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* Animasi pulse untuk input yang error */
        .form-input.error {
            animation: shake 0.5s ease-in-out;
            border-color: #dc3545;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        /* Animasi untuk floating label effect */
        .floating-label {
            position: absolute;
            top: 50%;
            left: 1.5rem;
            transform: translateY(-50%);
            color: #999;
            transition: all 0.3s ease;
            pointer-events: none;
            background: white;
            padding: 0 0.3rem;
            z-index: 2;
            border-radius: 4px;
        }

        .form-input:focus ~ .floating-label,
        .form-input:not(:placeholder-shown) ~ .floating-label {
            top: -8px;
            left: 1.2rem;
            font-size: 0.8rem;
            color: #4a7c59;
            transform: translateY(0);
        }

        .register-link {
            text-align: center;
            color: #ffffff;
            font-size: 0.9rem;
        }

        .register-link a {
            color: #B4D678;
            text-decoration: underline;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .register-link a:hover {
            color: #ffffff;
            transform: translateY(-2px);
            text-shadow: 0 2px 8px rgba(180, 214, 120, 0.5);
        }

        /* Success message styling */
        .success-message {
            background: rgba(180, 214, 120, 0.2);
            border: 1px solid #B4D678;
            color: #B4D678;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            animation: slideInDown 0.5s ease-out;
        }

        /* Error message styling */
        .error-messages {
            background: rgba(220, 53, 69, 0.2);
            border: 1px solid #dc3545;
            color: #ff6b7a;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            animation: slideInDown 0.5s ease-out;
        }

        .error-messages ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .error-messages li {
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .error-messages li:last-child {
            margin-bottom: 0;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .register-container {
                padding: 2rem;
                margin-left: 0;
            }

            .login-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1 class="login-title">Login</h1>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="redirect_to" value="{{ request('redirect_to') }}">
            
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" placeholder="Masukkan alamat email anda..." required>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="Masukkan kata sandi anda..." required>
            </div>

            <div class="forgot-password">
                <a href="{{ route('password.request') }}">Lupa Kata Sandi</a>
            </div>

            <button type="submit" class="login-button">Login</button>

            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
            </div>
        </form>
    </div>

    <script>
        // Animasi untuk form submission
        document.querySelector('form').addEventListener('submit', function() {
            const button = document.querySelector('.login-button');
            button.classList.add('loading');
            button.textContent = '';
        });

        // Efek focus yang lebih smooth untuk input
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });

        // Animasi untuk error validation
        function showError(inputElement) {
            inputElement.classList.add('error');
            setTimeout(() => {
                inputElement.classList.remove('error');
            }, 500);
        }
    </script>
</body>
</html>