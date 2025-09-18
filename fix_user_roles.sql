-- Fix user roles and passwords for admin
-- Run this SQL in your database to fix the role issue

-- Set all users to 'user' role first (reset semua)
UPDATE users 
SET role = 'user';

-- Set specific admin users-- Update existing users to admin role and reset password
UPDATE users 
SET role = 'admin', 
    password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
WHERE email IN (
    'admin@gmail.com',
    'jojo@gmail.com',
    'goldi@gmail.com', 
    'grace@gmail.com'
);

-- Update nama lengkap untuk admin users
UPDATE users 
SET nama_lengkap = CASE 
    WHEN email = 'jojo@gmail.com' THEN 'Jonathan Arya P.A'
    WHEN email = 'goldi@gmail.com' THEN 'Goldi Bangun A'
    WHEN email = 'grace@gmail.com' THEN 'Graciella Yeriza N'
    WHEN email = 'admin@gmail.com' THEN 'Admin'
    ELSE nama_lengkap
END
WHERE email IN ('admin@gmail.com', 'jojo@gmail.com', 'goldi@gmail.com', 'grace@gmail.com');

-- Jika akun admin belum ada, buat akun baru
INSERT IGNORE INTO users (email, nama_lengkap, password, role, created_at, updated_at) 
VALUES 
    ('admin@gmail.com', 'Admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NOW(), NOW()),
    ('jojo@gmail.com', 'Jonathan Arya P.A', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NOW(), NOW()),
    ('goldi@gmail.com', 'Goldi Bangun A', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NOW(), NOW()),
    ('grace@gmail.com', 'Graciella Yeriza N', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NOW(), NOW());

-- Check final results
SELECT email, role, nama_lengkap, 'admin123' as password_hint
FROM users 
WHERE role = 'admin'
ORDER BY email;
