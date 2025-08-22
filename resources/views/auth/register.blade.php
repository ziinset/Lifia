<!DOCTYPE html>
<html lang="en">
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

        .login-container {
            background: transparent;
            border-radius: 20px;
            padding: 3rem;
            width: 100%;
            max-width: 450px;
            margin-left: 644px;
            margin-top: -50px;
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
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: #4a7c59;
            box-shadow: 0 0 0 3px rgba(74, 124, 89, 0.1);
        }

        .form-input::placeholder {
            color: #999;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 1.5rem;
        }

        .forgot-password a {
            color: #B4D678;
            text-decoration: underline;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #2d5016;
        }

        .login-button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #4a7c59 0%, #2d5016 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(45, 80, 22, 0.3);
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
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: #2d5016;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .login-container {
                padding: 2rem;
            }

            .login-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="login-title">Register</h1>

        <form>
            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-input" placeholder="Masukkan nama lengkap anda..." required>
            </div>

            <div class="form-group">
                    <label class="form-label">Email</label>
                <input type="email" class="form-input" placeholder="Masukkan email anda..." required>
            </div>

            <div class="form-group">
                <label class="form-label">Kata Sandi</label>
                <input type="password" class="form-input" placeholder="Masukkan kata sandi anda..." required>
            </div>

            <button type="submit" class="login-button">Daftar</button>

            <div class="register-link">
                Sudah punya akun? <a href="/login">Login</a>
            </div>
        </form>
    </div>
</body>
</html>
