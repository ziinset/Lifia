-- Cek struktur tabel users terlebih dahulu
SHOW COLUMNS FROM users;

-- Cek data admin yang sudah ada
SELECT * FROM users WHERE email = 'admin@gmail.com' LIMIT 1;
