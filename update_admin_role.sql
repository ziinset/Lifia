-- Update admin role for specific users
-- Run this SQL in your database to ensure admin users have the correct role

-- Update role for jonathanarya79@gmail.com to admin
UPDATE users 
SET role = 'admin' 
WHERE email = 'jonathanarya79@gmail.com';

-- If you have other admin emails, add them here
-- UPDATE users 
-- SET role = 'admin' 
-- WHERE email = 'admin@lifia.com';

-- Check current roles
SELECT email, role, nama_lengkap 
FROM users 
WHERE email IN ('jonathanarya79@gmail.com', 'admin@lifia.com');
