-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for laravel_api
CREATE DATABASE IF NOT EXISTS `web_doc_truyen` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `web_doc_truyen`;

-- Dumping data for table laravel_api.blocked_stories: ~0 rows (approximately)

-- Dumping data for table laravel_api.chapters: ~0 rows (approximately)

-- Dumping data for table laravel_api.comments: ~0 rows (approximately)

-- Dumping data for table laravel_api.failed_jobs: ~0 rows (approximately)

-- Dumping data for table laravel_api.favorite_stories: ~0 rows (approximately)

-- Dumping data for table laravel_api.genres: ~6 rows (approximately)
INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Lãng mạn', '2025-02-27 16:20:00', '2025-02-27 16:20:01'),
	(2, 'Siêu anh hùng', '2025-02-27 16:20:18', '2025-02-27 16:20:19'),
	(3, 'Kinh dị', '2025-02-27 16:20:27', '2025-02-27 16:20:28'),
	(4, 'Phiêu lưu', '2025-02-27 16:20:51', '2025-02-27 16:20:51'),
	(5, 'Hành động', '2025-02-27 16:21:48', '2025-02-27 16:21:49'),
	(6, 'Hài hước', '2025-02-27 16:21:58', '2025-02-27 16:21:58'),
	(7, 'Trinh thám', '2025-02-27 16:22:05', '2025-02-27 16:22:06');

-- Dumping data for table laravel_api.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table laravel_api.personal_access_tokens: ~2 rows (approximately)
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\User', 1, 'admin-token', 'd53dd6f105cee8da8bb7574d3566a1e8e66730b48decec7b3c56d3b2c2c3b055', '["create","update","delete"]', NULL, NULL, '2025-02-25 07:27:18', '2025-02-25 07:27:18'),
	(2, 'App\\Models\\User', 1, 'update-token', '8282abc405b7bd41613e3d0742119f82d711ce2e25f1230c241a0625841d8b8b', '["create","update"]', '2025-02-27 06:46:31', NULL, '2025-02-25 07:27:18', '2025-02-27 06:46:31'),
	(3, 'App\\Models\\User', 1, 'basic-token', '35ed5c64303fc1facade48656afe7f111cdc7e5653e56867d6d3459ea5e46a74', '["none"]', '2025-02-25 07:30:49', NULL, '2025-02-25 07:27:18', '2025-02-25 07:30:49');

-- Dumping data for table laravel_api.ratings: ~0 rows (approximately)

-- Dumping data for table laravel_api.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', '2025-02-27 16:10:40', '2025-02-27 16:10:40'),
	(2, 'Writer', '2025-02-27 16:10:42', '2025-02-27 16:10:42'),
	(3, 'Reader', '2025-02-27 16:10:43', '2025-02-27 16:10:43');

-- Dumping data for table laravel_api.stories: ~0 rows (approximately)

-- Dumping data for table laravel_api.story_genre: ~0 rows (approximately)

-- Dumping data for table laravel_api.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar_path`, `is_password`, `role_id`) VALUES
	(1, '0740_Võ Nghĩa Kỳ', 'vonghiaky12a7777@gmail.com', NULL, '$2y$12$PsovTdwXpbnmx7Sr/GLoW.D2DgsCYnpuyqFucRdWZnpjawddBiBki', NULL, '2025-02-28 23:02:02', '2025-03-01 00:05:44', 'https://lh3.googleusercontent.com/a/ACg8ocLjUm2oqRrpbvoNunyoWQlUSUDPiUAbDFLRXIIW6mveQbQ8hjk', 0, 3),
	(5, '0740_Võ Nghĩa Kỳ', 'b@gmail.com', NULL, '$2y$12$slSY8tTkLzdqkF3jREaDRe8oD5COxQMMJ.hlEiPnxHXK4oq5iFMyW', NULL, '2025-03-01 00:15:21', '2025-03-01 00:15:52', 'https://lh3.googleusercontent.com/a/ACg8ocLjUm2oqRrpbvoNunyoWQlUSUDPiUAbDFLRXIIW6mveQbQ8hjk', 1, 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
