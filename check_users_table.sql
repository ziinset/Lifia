-- Script untuk cek struktur tabel users
SHOW COLUMNS FROM users;

-- Cek admin yang sudah ada
SELECT * FROM users WHERE email LIKE '%admin%' OR is_admin = 1;
