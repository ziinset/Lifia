-- Setup Premium System for Lifia Application
-- Run this script to add premium functionality to existing users table

-- Step 1: Add is_premium column to users table
ALTER TABLE users ADD COLUMN is_premium BOOLEAN DEFAULT FALSE AFTER role;

-- Step 2: Update existing users with premium status
-- Set jonathanarya79@gmail.com as premium
UPDATE users SET is_premium = TRUE WHERE email = 'jonathanarya79@gmail.com';

-- Set goldi@gmail.com as non-premium (explicitly set to false)
UPDATE users SET is_premium = FALSE WHERE email = 'goldi@gmail.com';

-- Set random premium status for other existing users
UPDATE users SET is_premium = (RAND() > 0.5) 
WHERE email NOT IN ('jonathanarya79@gmail.com', 'goldi@gmail.com');

-- Step 3: Add migration record to migrations table
INSERT INTO migrations (migration, batch) 
VALUES ('2025_09_15_042340_add_is_premium_to_users_table', 
        (SELECT COALESCE(MAX(batch), 0) + 1 FROM migrations m));

-- Verify the changes
SELECT 
    id,
    nama_lengkap,
    email,
    role,
    is_premium,
    created_at
FROM users
ORDER BY created_at DESC;
