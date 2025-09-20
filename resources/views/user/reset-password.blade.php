<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Kata Sandi - Lifia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        .reset-container {
            background: transparent;
            border-radius: 20px;
            padding: 3rem;
            width: 100%;
            max-width: 450px;
            margin-left: 644px;
        }

        .reset-title {
            color: #ffffff;
            font-size: 2.5rem;
            font-weight: 700;
            text-align: left;
            margin-bottom: 1rem;
        }

        .reset-subtitle {
            color: #B4D678;
            font-size: 1rem;
            font-weight: 400;
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
        }

        .form-input:focus {
            border-color: #4a7c59;
            box-shadow: 0 0 0 3px rgba(74, 124, 89, 0.1);
            transform: translateY(-2px);
        }

        .submit-button {
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
        }

        .submit-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            border-color: #4a7c59;
            background: linear-gradient(135deg, #ffffff 0%, #f1f8ff 100%);
        }

        .back-to-login {
            text-align: center;
            color: #ffffff;
            font-size: 0.9rem;
        }

        .back-to-login a {
            color: #B4D678;
            text-decoration: underline;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .back-to-login a:hover {
            color: #ffffff;
            transform: translateY(-2px);
        }

        .success-message {
            background: rgba(180, 214, 120, 0.2);
            border: 1px solid #B4D678;
            color: #B4D678;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .error-messages {
            background: rgba(220, 53, 69, 0.2);
            border: 1px solid #dc3545;
            color: #ff6b7a;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
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

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .reset-container {
                padding: 2rem;
                margin-left: 0;
            }

            .reset-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <h1 class="reset-title">Reset Kata Sandi</h1>
        <p class="reset-subtitle">Masukkan password baru untuk akun Anda</p>

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" value="{{ $email }}" readonly>
            </div>

            <div class="form-group">
                <label class="form-label">Password Baru</label>
                <input type="password" name="password" class="form-input" placeholder="Masukkan password baru..." required>
            </div>

            <div class="form-group">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-input" placeholder="Konfirmasi password baru..." required>
            </div>

            <button type="submit" class="submit-button">Reset Password</button>

            <div class="back-to-login">
                <a href="{{ route('login') }}">Kembali ke Login</a>
            </div>
        </form>
    </div>
</body>
</html>
