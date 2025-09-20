# Setup Forgot Password Functionality

## 1. Database Setup
Jalankan SQL berikut di database Anda untuk membuat tabel password reset:

```sql
-- Create password reset tokens table
CREATE TABLE password_reset_tokens (
    email VARCHAR(255) PRIMARY KEY,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL
);
```

## 2. Environment Configuration
Tambahkan konfigurasi berikut ke file `.env` Anda:

```env
MAIL_MAILER=log
MAIL_FROM_ADDRESS="hello@lifia.com"
MAIL_FROM_NAME="Lifia"
```

## 3. Features yang Sudah Dibuat

### Routes:
- `GET /forgot-password` - Halaman lupa password
- `POST /forgot-password` - Kirim link reset password
- `GET /reset-password/{token}` - Halaman reset password
- `POST /reset-password` - Proses reset password

### Views:
- `resources/views/user/forgot-password.blade.php` - Form lupa password
- `resources/views/user/reset-password.blade.php` - Form reset password

### Controller Methods:
- `AuthController@showForgotPassword` - Tampilkan form lupa password
- `AuthController@sendResetLink` - Kirim email reset password
- `AuthController@showResetPassword` - Tampilkan form reset password
- `AuthController@resetPassword` - Proses reset password

## 4. Cara Kerja

1. User klik "Lupa Kata Sandi" di halaman login
2. User masukkan email di form lupa password
3. Sistem kirim email dengan link reset password (disimpan di log jika menggunakan mail driver 'log')
4. User klik link di email untuk ke halaman reset password
5. User masukkan password baru dan konfirmasi
6. Password berhasil direset dan user bisa login dengan password baru

## 5. Testing

Untuk testing, gunakan mail driver 'log' yang akan menyimpan email di `storage/logs/laravel.log` alih-alih mengirim email sungguhan.

## 6. Catatan

- Pastikan tabel `password_reset_tokens` sudah dibuat di database
- Email reset password akan expired setelah 60 menit (default Laravel)
- Token reset password akan dihapus otomatis setelah digunakan
