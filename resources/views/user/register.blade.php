<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Lifia</title>
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

        .register-title {
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
            transition: all 0.3s ease;
        }

        .form-input {
            width: 100%;
            padding: 1.2rem 1.5rem;
            border: 1.5px solid #e0e0e0;
            border-radius: 25px;
            background-color: white;
            font-size: 1rem;
            color: #333;
            outline: none;
            transition: all 0.3s ease;
            position: relative;
            transform: translateY(0);
        }

        .form-input:focus {
            border-color: #4a7c59;
            box-shadow: 0 0 0 4px rgba(74, 124, 89, 0.08);
            background-color: white;
            transform: translateY(0px);
        }

        .form-input::placeholder {
            color: #999;
            transition: all 0.3s ease;
        }

        .form-input:focus::placeholder {
            color: #ccc;
            transform: translateX(5px);
        }

        /* Animasi label saat focus */
        .form-group:focus-within .form-label {
            color: #B4D678;
            transform: translateY(-3px);
        }

        .register-button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            color: #333;
            border: 1.5px solid #e0e0e0;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s ease;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        /* Efek ripple saat hover */
        .register-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: radial-gradient(circle, rgba(74, 124, 89, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.4s ease, height 0.4s ease;
        }

        .register-button:hover::before {
            width: 300px;
            height: 300px;
        }

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(74, 124, 89, 0.15),
                        0 4px 15px rgba(0, 0, 0, 0.1);
            border-color: #4a7c59;
            background: linear-gradient(135deg, #ffffff 0%, #f1f8ff 100%);
            color: #2d5016;
        }

        .register-button:active {
            transform: translateY(0px);
            transition: transform 0.1s ease;
        }

        /* Animasi loading untuk button */
        .register-button.loading {
            pointer-events: none;
            background: linear-gradient(135deg, #f0f0f0 0%, #e0e0e0 100%);
        }

        .register-button.loading::after {
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

        .login-link {
            text-align: center;
            color: #ffffff;
            font-size: 0.9rem;
        }

        .login-link a {
            color: #B4D678;
            text-decoration: underline;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: #ffffff;
            transform: translateY(-1px);
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

            .register-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1 class="register-title">Register</h1>

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-input" placeholder="Masukkan nama lengkap anda..." required>
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" placeholder="Masukkan alamat email anda..." required>
            </div>

            <div class="form-group">
                <label class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-input" placeholder="Masukkan kata sandi anda..." required>
            </div>

            <div class="form-group">
                <label class="form-label">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" class="form-input" placeholder="Konfirmasi kata sandi anda..." required>
            </div>

            <button type="submit" class="register-button">Register</button>

            <div class="login-link">
                Sudah punya akun? <a href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>

    <script>
        // Animasi untuk form submission
        document.querySelector('form').addEventListener('submit', function() {
            const button = document.querySelector('.register-button');
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