-- SQL commands to add missing profile columns to users table
-- Run these commands in your MySQL database

ALTER TABLE users 
ADD COLUMN lokasi VARCHAR(255) NULL AFTER role,
ADD COLUMN foto VARCHAR(255) NULL AFTER lokasi,
ADD COLUMN nomor VARCHAR(255) NULL AFTER foto,
ADD COLUMN jenis_kelamin ENUM('Laki-laki', 'Perempuan') NULL AFTER nomor,
ADD COLUMN tanggal_lahir DATE NULL AFTER jenis_kelamin,
ADD COLUMN hobi VARCHAR(255) NULL AFTER tanggal_lahir,
ADD COLUMN bio TEXT NULL AFTER hobi,
ADD COLUMN instagram VARCHAR(255) NULL AFTER bio,
ADD COLUMN tiktok VARCHAR(255) NULL AFTER instagram,
ADD COLUMN facebook VARCHAR(255) NULL AFTER tiktok,
ADD COLUMN status VARCHAR(255) NULL AFTER facebook;
