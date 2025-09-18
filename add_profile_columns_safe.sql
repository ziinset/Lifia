-- SQL commands to safely add missing profile columns to users table
-- This script will only add columns that don't exist yet
-- Run these commands in your MySQL database

-- Add lokasi column if it doesn't exist
SET @sql = (SELECT IF(
    (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
     WHERE table_name = 'users' 
     AND table_schema = DATABASE() 
     AND column_name = 'lokasi') > 0,
    'SELECT "Column lokasi already exists" as message',
    'ALTER TABLE users ADD COLUMN lokasi VARCHAR(255) NULL AFTER role'
));
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Add foto column if it doesn't exist
SET @sql = (SELECT IF(
    (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
     WHERE table_name = 'users' 
     AND table_schema = DATABASE() 
     AND column_name = 'foto') > 0,
    'SELECT "Column foto already exists" as message',
    'ALTER TABLE users ADD COLUMN foto VARCHAR(255) NULL AFTER lokasi'
));
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Add nomor column if it doesn't exist
SET @sql = (SELECT IF(
    (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
     WHERE table_name = 'users' 
     AND table_schema = DATABASE() 
     AND column_name = 'nomor') > 0,
    'SELECT "Column nomor already exists" as message',
    'ALTER TABLE users ADD COLUMN nomor VARCHAR(255) NULL AFTER foto'
));
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Add jenis_kelamin column if it doesn't exist
SET @sql = (SELECT IF(
    (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
     WHERE table_name = 'users' 
     AND table_schema = DATABASE() 
     AND column_name = 'jenis_kelamin') > 0,
    'SELECT "Column jenis_kelamin already exists" as message',
    'ALTER TABLE users ADD COLUMN jenis_kelamin ENUM(\'Laki-laki\', \'Perempuan\') NULL AFTER nomor'
));
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Add tanggal_lahir column if it doesn't exist
SET @sql = (SELECT IF(
    (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
     WHERE table_name = 'users' 
     AND table_schema = DATABASE() 
     AND column_name = 'tanggal_lahir') > 0,
    'SELECT "Column tanggal_lahir already exists" as message',
    'ALTER TABLE users ADD COLUMN tanggal_lahir DATE NULL AFTER jenis_kelamin'
));
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Add hobi column if it doesn't exist
SET @sql = (SELECT IF(
    (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
     WHERE table_name = 'users' 
     AND table_schema = DATABASE() 
     AND column_name = 'hobi') > 0,
    'SELECT "Column hobi already exists" as message',
    'ALTER TABLE users ADD COLUMN hobi VARCHAR(255) NULL AFTER tanggal_lahir'
));
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Add bio column if it doesn't exist
SET @sql = (SELECT IF(
    (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
     WHERE table_name = 'users' 
     AND table_schema = DATABASE() 
     AND column_name = 'bio') > 0,
    'SELECT "Column bio already exists" as message',
    'ALTER TABLE users ADD COLUMN bio TEXT NULL AFTER hobi'
));
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Add instagram column if it doesn't exist
SET @sql = (SELECT IF(
    (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
     WHERE table_name = 'users' 
     AND table_schema = DATABASE() 
     AND column_name = 'instagram') > 0,
    'SELECT "Column instagram already exists" as message',
    'ALTER TABLE users ADD COLUMN instagram VARCHAR(255) NULL AFTER bio'
));
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Add tiktok column if it doesn't exist
SET @sql = (SELECT IF(
    (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
     WHERE table_name = 'users' 
     AND table_schema = DATABASE() 
     AND column_name = 'tiktok') > 0,
    'SELECT "Column tiktok already exists" as message',
    'ALTER TABLE users ADD COLUMN tiktok VARCHAR(255) NULL AFTER instagram'
));
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Add facebook column if it doesn't exist
SET @sql = (SELECT IF(
    (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
     WHERE table_name = 'users' 
     AND table_schema = DATABASE() 
     AND column_name = 'facebook') > 0,
    'SELECT "Column facebook already exists" as message',
    'ALTER TABLE users ADD COLUMN facebook VARCHAR(255) NULL AFTER tiktok'
));
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Add status column if it doesn't exist
SET @sql = (SELECT IF(
    (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
     WHERE table_name = 'users' 
     AND table_schema = DATABASE() 
     AND column_name = 'status') > 0,
    'SELECT "Column status already exists" as message',
    'ALTER TABLE users ADD COLUMN status VARCHAR(255) NULL AFTER facebook'
));
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Set default status for existing admin users (only if they don't have status yet)
UPDATE users 
SET status = 'Admin kocak dan ramah' 
WHERE role = 'admin' AND (status IS NULL OR status = '');

-- Show final table structure
DESCRIBE users;
