-- Script sederhana untuk tambah admin baru
-- Jalankan ini setelah cek struktur tabel

-- Tambah Jojo Admin
INSERT INTO users (email, password, is_admin, is_premium) VALUES 
('jojo@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1);

-- Tambah Goldi Admin  
INSERT INTO users (email, password, is_admin, is_premium) VALUES 
('goldi@admin.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1);

-- Tambah Grace Admin
INSERT INTO users (email, password, is_admin, is_premium) VALUES 
('grace@admin.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1);

-- Verifikasi hasil
SELECT id, email, is_admin, is_premium FROM users WHERE is_admin = 1;
