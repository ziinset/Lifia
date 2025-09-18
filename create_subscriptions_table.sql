-- SQL script to create subscriptions table for Lifia application
-- This table will store user subscription data

CREATE TABLE IF NOT EXISTS subscriptions (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    subscription_id VARCHAR(20) NOT NULL UNIQUE,
    package_type ENUM('trial', '1_month', '3_months', '6_months', '1_year') NOT NULL,
    package_name VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    status ENUM('active', 'expired', 'trial', 'cancelled') NOT NULL DEFAULT 'trial',
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Foreign key constraint
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    
    -- Indexes for better performance
    INDEX idx_user_id (user_id),
    INDEX idx_status (status),
    INDEX idx_end_date (end_date),
    INDEX idx_subscription_id (subscription_id)
);

-- Insert sample subscription data
INSERT INTO subscriptions (user_id, subscription_id, package_type, package_name, price, status, start_date, end_date) VALUES
-- Assuming user IDs exist, adjust these based on your actual user IDs
(1, '#10234', '1_month', '1 Bulan', 50000.00, 'active', '2025-09-01', '2025-10-01'),
(2, '#10235', '3_months', '3 Bulan', 120000.00, 'expired', '2025-06-01', '2025-09-01'),
(3, '#10236', '6_months', '6 Bulan', 250000.00, 'active', '2025-07-10', '2026-01-10'),
(4, '#10237', 'trial', '7 Hari', 0.00, 'trial', '2025-09-15', '2025-09-22'),
(5, '#10238', '1_year', '1 Tahun', 480000.00, 'cancelled', '2025-01-01', '2026-01-01'),
(6, '#10239', '1_month', '1 Bulan', 50000.00, 'active', '2025-09-01', '2025-10-01');

-- Update subscription status based on current date
UPDATE subscriptions 
SET status = 'expired' 
WHERE end_date < CURDATE() AND status = 'active';

-- Show the created table structure
DESCRIBE subscriptions;
