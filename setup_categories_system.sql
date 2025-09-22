-- =====================================================
-- SETUP CATEGORIES SYSTEM FOR LIFIA LARAVEL APPLICATION
-- =====================================================
-- This script creates the categories table and inserts sample data
-- Run this script manually in your MySQL database

-- Create categories table
CREATE TABLE IF NOT EXISTS `categories` (
    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL COMMENT 'Nama kategori (Pola Makan Sehat)',
    `slug` varchar(255) NOT NULL UNIQUE COMMENT 'URL slug (pola-makan-sehat)',
    `description` text NULL COMMENT 'Deskripsi kategori',
    `icon` varchar(255) NULL COMMENT 'Icon untuk kategori (Font Awesome)',
    `color` varchar(7) NOT NULL DEFAULT '#4E342E' COMMENT 'Warna tema kategori',
    `is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Status aktif/nonaktif',
    `sort_order` int(11) NOT NULL DEFAULT 0 COMMENT 'Urutan tampil di navbar',
    `header_type` enum('header','header1','hero-mental','hero-olga') NOT NULL DEFAULT 'header' COMMENT 'Tipe header',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `categories_slug_unique` (`slug`),
    KEY `categories_is_active_index` (`is_active`),
    KEY `categories_sort_order_index` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample categories data
INSERT INTO `categories` (`name`, `slug`, `description`, `icon`, `color`, `is_active`, `sort_order`, `header_type`, `created_at`, `updated_at`) VALUES
('Pola Makan Sehat', 'pola-makan-sehat', 'Panduan lengkap untuk pola makan sehat dan bergizi seimbang', 'fas fa-utensils', '#7BA05B', 1, 1, 'header', NOW(), NOW()),
('Aktivitas Fisik', 'aktivitas-fisik', 'Tips dan panduan olahraga untuk hidup yang lebih sehat', 'fas fa-dumbbell', '#8BAC65', 1, 2, 'hero-olga', NOW(), NOW()),
('Kesehatan Mental', 'kesehatan-mental', 'Menjaga kesehatan mental dan kesejahteraan psikologis', 'fas fa-brain', '#6B8E23', 1, 3, 'hero-mental', NOW(), NOW()),
('Perawatan Diri', 'perawatan-diri', 'Tips perawatan diri untuk kesehatan dan kecantikan', 'fas fa-spa', '#9ACD32', 1, 4, 'header1', NOW(), NOW()),
('Gaya Hidup Vegan', 'gaya-hidup-vegan', 'Panduan lengkap menjalani gaya hidup vegan yang sehat', 'fas fa-leaf', '#556B2F', 1, 5, 'header', NOW(), NOW()),
('Eco Living', 'eco-living', 'Tips hidup ramah lingkungan dan berkelanjutan', 'fas fa-globe-americas', '#228B22', 1, 6, 'header', NOW(), NOW());

-- =====================================================
-- VERIFICATION QUERIES
-- =====================================================
-- Run these queries to verify the setup

-- Check if categories table exists and has data
SELECT 'Categories table created successfully' as status;
SELECT COUNT(*) as total_categories FROM categories;

-- Display all categories
SELECT 
    id,
    name,
    slug,
    icon,
    color,
    header_type,
    is_active,
    sort_order,
    created_at
FROM categories 
ORDER BY sort_order ASC;

-- =====================================================
-- NOTES FOR IMPLEMENTATION
-- =====================================================
/*
1. NAVBAR INTEGRATION:
   - Both navbar.blade.php and navbar2.blade.php now use dynamic data
   - Categories will automatically appear in dropdown menus
   - Only active categories (is_active = 1) will be shown

2. ADMIN PANEL:
   - Access: /admin/kategori
   - Full CRUD functionality available
   - Can add, edit, delete, and toggle status of categories
   - Drag & drop ordering (sort_order field)

3. HEADER TYPES:
   - 'header': Default header component
   - 'header1': Hero header component  
   - 'hero-mental': Mental health specific header
   - 'hero-olga': Sports/exercise specific header

4. ROUTING:
   - /kategori/{slug} will automatically work for all categories
   - ArticleController.php updated to check database for valid categories
   - 404 error for inactive or non-existent categories

5. CUSTOMIZATION:
   - Icons: Use Font Awesome classes (e.g., 'fas fa-heart')
   - Colors: Hex color codes for theme customization
   - Sort Order: Controls display order in navbar dropdown

6. MIGRATION ALTERNATIVE:
   If you prefer Laravel migrations, run:
   php artisan migrate
   
   Then manually insert the sample data or use seeders.
*/

-- =====================================================
-- TROUBLESHOOTING
-- =====================================================
/*
COMMON ISSUES:

1. If navbar doesn't show categories:
   - Check if CategoryServiceProvider is registered
   - Verify database connection
   - Ensure categories table has data

2. If admin panel doesn't work:
   - Check routes in web.php
   - Verify CategoryController exists
   - Check CSRF token in blade template

3. If category pages show 404:
   - Verify ArticleController.php is updated
   - Check route definition for /kategori/{category}
   - Ensure category is active in database

4. JavaScript errors in admin:
   - Check CSRF meta tag in head section
   - Verify all JavaScript functions are defined
   - Check browser console for specific errors
*/
