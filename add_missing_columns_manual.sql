-- Manual script to add only missing columns
-- Run check_existing_columns.sql first to see which columns you need
-- Then uncomment and run only the lines for columns that don't exist

-- Uncomment the lines below ONLY for columns that don't exist in your table:

-- ALTER TABLE users ADD COLUMN lokasi VARCHAR(255) NULL;
-- ALTER TABLE users ADD COLUMN foto VARCHAR(255) NULL;
-- ALTER TABLE users ADD COLUMN nomor VARCHAR(255) NULL;
-- ALTER TABLE users ADD COLUMN jenis_kelamin ENUM('Laki-laki', 'Perempuan') NULL;
-- ALTER TABLE users ADD COLUMN tanggal_lahir DATE NULL;
-- ALTER TABLE users ADD COLUMN hobi VARCHAR(255) NULL;
-- ALTER TABLE users ADD COLUMN bio TEXT NULL;
-- ALTER TABLE users ADD COLUMN instagram VARCHAR(255) NULL;
-- ALTER TABLE users ADD COLUMN tiktok VARCHAR(255) NULL;
-- ALTER TABLE users ADD COLUMN facebook VARCHAR(255) NULL;
-- ALTER TABLE users ADD COLUMN status VARCHAR(255) NULL;

-- After adding missing columns, set default status for admin users:
-- UPDATE users SET status = 'Admin kocak dan ramah' WHERE role = 'admin' AND (status IS NULL OR status = '');
