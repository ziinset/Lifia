-- Create favorites table if it doesn't exist
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `article_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `favorites_user_id_article_id_unique` (`user_id`,`article_id`),
  KEY `favorites_user_id_foreign` (`user_id`),
  CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
