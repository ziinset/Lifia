-- SQL command to add status column to users table
-- Run this command in your MySQL database if you haven't run the full add_profile_columns.sql

-- Add status column (will be used only by admin users)
ALTER TABLE users 
ADD COLUMN status VARCHAR(255) NULL AFTER facebook;

-- Set default status ONLY for existing admin users
UPDATE users 
SET status = 'Admin kocak dan ramah' 
WHERE role = 'admin' AND status IS NULL;

-- Note: Regular users will have status = NULL (which is fine)
