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

-- Dumping structure for table ccs_laravel_new.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ccs_laravel_new.cache: ~0 rows (approximately)

-- Dumping structure for table ccs_laravel_new.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ccs_laravel_new.cache_locks: ~0 rows (approximately)

-- Dumping structure for table ccs_laravel_new.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ccs_laravel_new.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table ccs_laravel_new.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ccs_laravel_new.jobs: ~0 rows (approximately)

-- Dumping structure for table ccs_laravel_new.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ccs_laravel_new.job_batches: ~0 rows (approximately)

-- Dumping structure for table ccs_laravel_new.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ccs_laravel_new.migrations: ~1 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1);

-- Dumping structure for table ccs_laravel_new.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ccs_laravel_new.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table ccs_laravel_new.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ccs_laravel_new.sessions: ~0 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('7hU7k7Hoi3VP6oKcPOd3Q8nkNYLEiIMYAwGOYkZU', 180, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY0xUdzEyZjEyNmdDVmNvU05mZXQ1RGtlQWJkWjlRYUVKV0ZyNFc0cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTgwO30=', 1750932036),
	('z4cMm5zgNU1SZIvUv5tgCRGjQevwlnq5Jt2RAhPX', 180, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicnloT29URmJQS1phRlR1WHRja1dybDUyZWRscWxsOE1KR1pya1U4MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE4MDt9', 1750932145);

-- Dumping structure for table ccs_laravel_new.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` bigint unsigned NOT NULL AUTO_INCREMENT,
  `divisi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_user` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_registrasi` date DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ccs_laravel_new.users: ~0 rows (approximately)
INSERT INTO `users` (`id_user`, `divisi`, `nama_user`, `username`, `password`, `role`, `active`, `tgl_registrasi`, `last_login`) VALUES
	(47, 'Supervisor 2', 'Aling', 'aling', '$2y$10$3fmu3UaUBtwMUn/ibOqgwO0h36GrfFrAwjP/GAHxYZfIPJOJPYdgC', '9', 'Y', '2024-05-31', '2025-04-21 08:12:34'),
	(48, 'Helpdesk', 'Ajeng Amanda', 'ajeng', '$2y$10$yMDEbxjjlh4oNXdZJw1om.SmuYMqFSzqLe3vycjiXnVFnZVXh7Fli', '2', 'Y', '2024-05-31', '2025-04-21 06:55:01'),
	(50, 'Helpdesk', 'Ayu', 'ayu', '$2y$10$B5GxkfNn7sZ3nZ8TZ0Kjb.I48l.xHvSAKUUE8FgNNbKQ.rFbDWa0K', '2', 'Y', '2024-05-31', '2025-03-13 06:56:45'),
	(52, 'Helpdesk', 'Eva Rosiana', 'epa', '$2y$10$R8oQzXHI8pnwusrmXCTX3e9FWIjfvqgXFekk1yqJNhXIAkFDTY.n.', '2', 'Y', '2024-05-31', '2025-04-17 10:08:19'),
	(54, 'Helpdesk', 'Nita', 'nita', '$2y$10$lGRwZfprphMBSECfyzb/SOLIyxsTw2THLpKO5WYjUeq41XBy0Nnz.', '2', 'N', '2024-05-31', '2024-10-25 08:41:03'),
	(55, 'Helpdesk', 'Luthfi', 'luthfi', '$2y$10$JEjAMFVKUPfcwhAh5mNlAOzSOKQmSmXL/2iVnTWN6NS4BRzke6wMu', '2', 'Y', '2024-05-31', '2025-04-17 08:05:09'),
	(57, 'Supervisor 1', 'Khabibah', 'khabibah', '$2y$10$B2CATYduaY1k14AaFRVyP.m/rV5.yI4mj0.WXWt.Ud8P5oZMF1rQy', 'supervisor1', 'Y', '2024-05-31', '2025-05-19 16:21:22'),
	(58, 'Klien', 'PT BPR BKK Banjarharjo (Perseroda)', 'banjarharjo', '$2y$10$qruhkWYy5yfJg2vGwtz.pexELMTc6HVkaFrp3ZYEAerKEs0H4tYBi', 'klien', 'Y', '2024-05-31', '2025-04-17 17:20:24'),
	(59, 'Klien', 'PT BPR BKK Karangmalang (Perseroda)', 'karangmalang', '$2y$10$QNYfJEq8VLi6JCCBdywKjumU8rGIQnu9LU5AIcCobSyvXzauc6EWm', 'klien', 'Y', '2024-05-31', '2025-05-19 15:03:28'),
	(60, 'Klien', 'PT BPR BKK Purwokerto (Perseroda)', 'purwokerto', '$2y$10$WniGIEgNUJA9Z/aNxOh3TO9oUtB9BAi9q3U8FYeqHHbTXTaV9Eywe', 'klien', 'Y', '2024-05-31', '2025-05-19 15:45:43'),
	(61, 'Klien', 'PT BPR BKK Kab.Pekalongan (Perseroda)', 'pekalongan', '$2y$10$BS4Kv4vDYwqiSORW84/jc.NC2eBo9CR.iaJ7N6m3QbECXM4AXnJze', 'klien', 'Y', '2024-05-31', '2025-04-12 09:02:06'),
	(62, 'Implementator', 'Diki', 'diki', '$2y$10$vAfqKnPDv/ymAIPib1NF2uhLZbnqWuJ6JN87f6T/Fq0A9n0axAoA2', '4', 'Y', '2024-05-31', '2025-04-12 09:27:50'),
	(66, 'Klien', 'PT BPR BKK Kebumen (Perseroda)', 'kebumen', '$2y$10$8U34fAsqjj5IvjEe7CZgpeR.1.otC4xVr1F/cDHpSRCowoEUU4ffm', 'klien', 'Y', '2024-05-31', '2025-04-19 14:09:21'),
	(68, 'Superadmin', 'Indri', 'indri', '$2y$10$tDJeFvFcChAeZWacIUOTxuSJp9HbObg3pagd3zZiHSj9EkGou79Iy', 'superadmin', 'Y', '2024-05-31', '2025-04-08 09:07:57'),
	(78, 'Implementator', 'Indra', 'indra', '$2y$10$8etE1d5OKw9.Gbyz58eyjuGIfU.O0MyFH0r6XZ8oY4bQek.ujQChK', '4', 'N', '2024-06-28', '2025-04-15 10:14:52'),
	(79, 'Implementator', 'Arif P', 'arif', '$2y$10$Vbg7uz5gPOgYBEcSJUt2Jef5ox//0yFYSCtS60mPzC2irwkmbSPzW', '4', 'Y', '2024-07-01', '2025-04-15 09:40:30'),
	(80, 'Helpdesk', 'Zelly', 'zelly', '$2y$10$w3ERUHDBVufTAMNPzcYdou5vlkWRrUykQxsVwJqCQkzOVIOYc2iZm', '2', 'Y', '2024-07-27', '2025-04-14 11:41:13'),
	(81, 'Helpdesk', 'Sandy', 'sandy', '$2y$10$rL5AZzoyO6rtAgWClQov7euzNspS5sP3UQydqwWDPLnBIR5cDZZcu', '2', 'Y', '2024-07-27', '2025-04-19 09:32:44'),
	(82, 'Helpdesk', 'Bachtiar', 'bachtiar', '$2y$10$YUjsywxMapJMpjKbhRBFmeAFAHMK/RkkFE2z4.ALkcUgy33e3/.Wa', '2', 'Y', '2024-07-27', '2025-04-17 10:47:10'),
	(83, 'Helpdesk', 'Ratna', 'ratna', '$2y$10$LVJvul7rFMEbi5eI6VQW2ula76hh2N4EMJWsRfiRMKCnjGt3DLuNe', '2', 'Y', '2024-07-27', '2025-04-21 07:02:23'),
	(84, 'Helpdesk', 'Tiwi', 'tiwi', '$2y$10$yQJeyW.RDO6Kn7jVKR8JAeeXsbPrsuD.Z4iECH2JGwd88D0Z0MAaW', '2', 'Y', '2024-07-27', '2025-04-21 08:49:36'),
	(85, 'Helpdesk', 'Herda', 'herda', '$2y$10$UWx/hvX6PZW29q2WhLCOGuVRu9uIDJGMTpr16Hgpmv/h1hatjP4Zy', '2', 'Y', '2024-07-27', '2025-04-21 09:11:59'),
	(86, 'Implementator', 'Isna', 'isna', '$2y$10$RwDEjUmYW.auaIC6Db2YGuPVXXSoM2RqLLii7cZENEhUkAKUsMxNa', '4', 'Y', '2024-07-27', '2025-04-19 08:10:09'),
	(87, 'Helpdesk', 'Zida', 'zida', '$2y$10$PN9tJOUeKlb0hqcP.xeN.OHHzlQqttVXA7FYhdrKr8t8qqASR2tbS', '2', 'N', '2024-07-27', '2024-12-20 09:12:01'),
	(88, 'Helpdesk', 'Norma', 'norma', '$2y$10$sm5kMLxhTaw9BYfF1pkn1eel00qOiMPixy7AK.ScIcEVErhjjbKPm', '2', 'Y', '2024-07-27', '2024-07-27 10:41:33'),
	(89, 'Helpdesk', 'Dettia', 'dettia', '$2y$10$HApXZCz.1SBLh228GLzzneTVnKOOAKPXkPd8dl8Fz9jA..AWJkMiS', '2', 'Y', '2024-07-27', '2025-04-14 10:27:14'),
	(90, 'Implementator', 'Mumu', 'mumu', '$2y$10$a10JPBaZBcEyfmecbyKNt.2zb2PiBV2be8gDLY7/7.NgiRkAyngZu', '4', 'Y', '2024-07-27', '2025-02-28 08:45:07'),
	(91, 'Implementator', 'wasis dn', 'wasis', '$2y$10$BgNRkRD/zdzTYOSn49CAlu7F1.mH3X65/0slBywf2SiTiUnvNkT2i', '4', 'Y', '2024-07-27', '2025-03-13 10:05:36'),
	(92, 'Implementator', 'Dwi', 'dwi', '$2y$10$hP325C8eu.Fxj4AxK2xMCubwTiPM1raY2pwAwwe8Wz2GwLmfNM9/C', '4', 'Y', '2024-07-27', '2025-03-18 14:54:46'),
	(93, 'Implementator', 'Rijal Amri Majid', 'rijal', '$2y$10$pXM4mb2Kg3iS7jY4pd3oX.u17tpNZ707DkqVdFnfaFaW0QswKiiz6', '4', 'Y', '2024-07-27', '2025-03-17 14:47:01'),
	(94, 'Implementator', 'Kiky', 'kiky', '$2y$10$MaB54/lHgfpG5NB4PGoqreskhl1H4TchyI7GHWoVzb4DRLTbU9G.S', '4', 'Y', '2024-07-27', '2024-07-27 11:02:44'),
	(95, 'Implementator', 'Jaman', 'jaman', '$2y$10$mfg4t7FeWCFn.xcZwxbYa.9HAYT.tJr8L6ts633Ld4Bds3IalkX5C', '4', 'Y', '2024-07-27', '2024-07-27 10:57:05'),
	(96, 'Supervisor 1', 'Dettia', 'dettiaspv', '$2y$10$EzfEeeAW7c9ecyuyhGKLDOfqn9bK1E7T0g8QeoL.sWwYOJR4Zs8o.', 'supervisor1', 'Y', '2024-07-27', '2024-07-27 11:03:33'),
	(97, 'Supervisor 1', 'Norma', 'normaspv', '$2y$10$K.YfvCf/L/aaWGHfzeKiC.TLhT4KTYbSCp2Y5QJG7ZMWk/1Q1wSM2', 'supervisor1', 'Y', '2024-07-27', '2024-08-19 14:31:00'),
	(98, 'Helpdesk', 'Novi', 'novi', '$2y$10$IKnzaZCdkEVutG/LqmNaneC4Q.u0fm18kGCFBYuYzyntceR6pB3xW', '2', 'Y', '2024-07-27', '2025-02-13 10:18:30'),
	(99, 'Superadmin', 'Muti', 'muti', '$2y$10$TjmDQQw/JYMs.fRUA.6bsefuXIfIGzh.3dtTwG5efkfhrW/LTVF/y', 'superadmin', 'Y', '2024-07-27', '2025-03-07 10:21:47'),
	(101, 'Klien', 'PT. BPR Arta Utama', 'artautama', '$2y$10$XMrlQAnltxMD0LPZB40XO.VeCPaAMfRuGao.qN0smAtfw1frh6tDy', 'klien', 'Y', '2024-08-02', '2025-04-19 11:03:31'),
	(102, 'Klien', 'PT. BPR Mentari Terang', 'mentariterang', '$2y$10$AUlBIJ2KbdUgXuIoTE71MOKaVfh/HxHbBZo0DL4uxAIpGJ/BbgtTy', 'klien', 'Y', '2024-08-02', '2025-04-14 11:15:06'),
	(103, 'Klien', 'PT. BPR Sinar Garuda Prima', 'sinargarudaprima', '$2y$10$PHOrGjejFr0jdXzQZlkB0ObsDdO16s/G3soLdAntKzt9ek8AAmdPy', 'klien', 'Y', '2024-08-02', '2025-04-21 07:54:17'),
	(104, 'Klien', 'PT. BPR Wirosari Ijo', 'wirosariijo', '$2y$10$ASETsHREHofM4vjrVF0H4.O8hGu2GeodxFJ4O09zT38yyEO9gXy06', 'klien', 'Y', '2024-08-02', '2025-04-14 10:56:19'),
	(105, 'Klien', 'PT BPR BKK Blora (Perseroda)', 'blora', '$2y$10$hOpF.ArXNQJPAEX.LjZMT.G5qxi4684vDrv6PyQwFt8NYOx4Eg12m', 'klien', 'Y', '2024-08-02', '2025-04-16 10:52:51'),
	(106, 'Klien', 'Kospin Sekartama', 'sekartama', '$2y$10$jgQlX0GNz0/cqXaeZjATxO/MTNBRhlvdZl82ksogu7rvYN5l1ASuu', 'klien', 'Y', '2024-08-02', '2025-04-14 16:17:29'),
	(107, 'Klien', 'PT BPR BKK Jepara (Perseroda)', 'jepara', '$2y$10$MqnibtwmduWuDg63c9pUt.htUXpCBo/XXSg2M6UyyVruarVuFiUga', 'klien', 'Y', '2024-08-02', '2025-04-15 15:58:29'),
	(108, 'Klien', 'PT. BPR Kusuma Sumbing', 'kusumasumbing', '$2y$10$PsRo6ECqNTPuVWV8qAnIJ.o7glngrf9UIAIorVMat8nYOeJBreKIO', 'klien', 'Y', '2024-08-02', '2025-04-16 10:00:38'),
	(109, 'Klien', 'PT BPR BKK Grogol (Perseroda)', 'grogol', '$2y$10$C1Si1w.4W4dEWP.tMuAgoOjtrwxOMN3RL8bL1i9c6gWmyz1cyPudi', 'klien', 'Y', '2024-08-02', '2025-04-17 09:46:20'),
	(112, 'Klien', 'PT. BPR Artha Guna Mandiri', 'agm', '$2y$10$nd6nh8D2biftGHUX9JOgP.m2ouEjWDecUjSzDPMdPtfcWunAs3TWS', 'klien', 'Y', '2024-08-13', '2025-04-21 08:46:29'),
	(114, 'Klien', 'PT. BPR Mitradana Madani', 'mitradana', '$2y$10$HYJr1xITPxAupaPdgxSqru5.vsaEVfruxn4c0fMwwrV4vjUIosjL6', 'klien', 'Y', '2024-08-13', '2025-04-19 09:24:52'),
	(115, 'Klien', 'PT. BPR Mitra Rakyat Riau', 'mitrarakyatriau', '$2y$10$iWRtQIlNtEH2.SvvyVeXXeeKJZai.wmX5xE6cozMsoYuFQ9adhRQa', 'klien', 'Y', '2024-08-13', '2025-04-10 15:26:11'),
	(116, 'Klien', 'PT. BPR Sejahtera Artha Sembada', 'arthasembada', '$2y$10$sX3cxLXu84zxtZ0ASfxxEe4//JRBtEM3QGpnet0KS2g4hC9T1sLPG', 'klien', 'Y', '2024-08-13', '2025-04-16 15:46:34'),
	(117, 'Klien', 'PT BPR BKK Purbalingga (Perseroda)', 'purbalingga', '$2y$10$pgVpwN.wBhJBKoSemeRmruEUy7xsHOptH.dD2LyyrDabd0JPK7TvG', 'klien', 'Y', '2024-08-13', '2025-04-11 08:45:21'),
	(118, 'Klien', 'PT BPR Bank Sukoharjo (Perseroda)', 'banksukoharjo', '$2y$10$d.2qW13ehNxttLhfjP1f..C3kdgcxqI5mZtYh7Op3DTJBTxiozSq.', 'klien', 'Y', '2024-08-13', '2025-04-21 08:23:28'),
	(119, 'Klien', 'PT. BPR DP Taspen', 'dptaspen', '$2y$10$YvV7u0RgmgGETskM2t8jTuCMuK4YiDXF1/zsKI9gn1BifcRjrfPpW', 'klien', 'Y', '2024-08-13', '2025-04-17 16:49:30'),
	(120, 'Klien', 'PT BPR Artha Tanah Mas', 'arthatanahmas', '$2y$10$d3dPNZt7Eb2Gzsjn.yHtvepHiGflGO83zLfygxl51xcr6W99L0Ucq', 'klien', 'Y', '2024-08-13', '2025-04-15 08:51:43'),
	(121, 'Klien', 'PT. BPR Gunung Kinibalu', 'gunungkinibalu', '$2y$10$lu.682eVvWqOwdD72j2k3.NWb0WIr2NeXgRIcfgLyS/trkv2DD1Ie', 'klien', 'Y', '2024-08-13', '2025-04-16 11:16:11'),
	(122, 'Klien', 'PERUMDA BPR Bank Brebes', 'bankbrebes', '$2y$10$WkSUoKTPQZpHey/9S4.hpuUJITC2QDCOZQS/prAnhjOcDVyN6NHLi', 'klien', 'Y', '2024-08-13', '2025-04-17 14:20:12'),
	(123, 'Klien', 'PT. BPR Artha Puspa Mega', 'arthapuspamega', '$2y$10$wVzgc4YbxAuulD3Lqbesc.AuUxx1NZHEmo2bHurATolq1UV60eE0.', 'klien', 'Y', '2024-08-13', '2025-04-15 11:28:18'),
	(124, 'Klien', 'PT BPR Binalanggeng', 'binalanggeng', '$2y$10$wLuh0yGyR8MQTOqK1tzNi.GwYzF78j9MbGxQVpajL10AosAXWnhua', 'klien', 'Y', '2024-08-13', '2025-04-14 15:22:46'),
	(125, 'Klien', 'PT. BPR Pedungan', 'pedungan', '$2y$10$1VnDAqxgy46ruRPYonjjXuKu6Xa3N24tFQM8s4DFV/LScvUEec.Ym', 'klien', 'Y', '2024-08-13', '2025-04-10 15:54:13'),
	(126, 'Klien', 'PT BPR Bank Pekalongan (Perseroda)', 'bankpekalongan', '$2y$10$dQtDnO5NMJ5p8zhnUsxxROI7YD78YseV4RwxGqBMP5ZE/8qOsTBKu', 'klien', 'Y', '2024-08-13', '2025-04-21 09:33:16'),
	(127, 'Klien', 'PT BPR BKK Kab. Tegal (Perseroda)', 'kabtegal', '$2y$10$btKvHp52liRMaoW0OrFOIOFwwlrOPi7vYup8h0ssW38m8zXYaM3fW', 'klien', 'Y', '2024-08-13', '2025-04-17 14:51:35'),
	(128, 'Klien', 'PT BPR Bank Purwa Artha (Perseroda)', 'purwaartha', '$2y$10$QhOX5jMkii8p7KIaKPKVYuAqWH/.KPo7goJGMHE3e1jVIpOX.igby', 'klien', 'Y', '2024-08-13', '2025-04-17 14:50:32'),
	(129, 'Klien', 'PT. BPR Usaha Rakyat', 'usaharakyat', '$2y$10$lYnJrJQpIOIOJ91hqsu7PeoW7ZXdVtA66opS0VjrhkAbcFyi8Gpve', 'klien', 'Y', '2024-08-13', '2025-04-14 13:13:29'),
	(130, 'Klien', 'PT BPR BKK Kota Tegal (Perseroda)', 'kotategal', '$2y$10$1nfemXm6wYL9TgWPwryN9ecwCAHI.EeBy4FtjGVt1R1z/Dttx1PRO', 'klien', 'Y', '2024-08-13', '2025-04-16 12:35:21'),
	(131, 'Klien', 'PT. BPR DP Taspen Jateng', 'dptaspenjateng', '$2y$10$/HLrNQNqsWNtylN7bewflOKpXnAwBaTG5uFAvEJGHSddQzt0e6FkG', 'klien', 'Y', '2024-08-13', '2025-04-21 08:53:21'),
	(132, 'Klien', 'PT.BPR Arthama Cerah', 'arthamacerah', '$2y$10$uz0vXkMzEWhWRO8Z0sHRP.HFLWD0VWuXbdpEzJX2/WpNRF6hnJxmq', 'klien', 'Y', '2024-08-13', '2025-04-15 13:06:25'),
	(133, 'Klien', 'Kospin Surya Artha', 'suryaartha', '$2y$10$2nITxuXbT/jP.zwdh0sOXOr0nKWmtZkFSMzfQ8R5BAdXuUK.jerNy', 'klien', 'Y', '2024-08-13', '2025-03-01 08:28:11'),
	(134, 'Klien', 'PT. BPR Sumber Arta', 'sumberarta', '$2y$10$Q1b3ppGcPCRKStQCFRS3iutqZ57QOTm/CLuJ27uPWjvqL3keTjLte', 'klien', 'Y', '2024-08-13', '2025-04-10 15:41:37'),
	(135, 'Klien', 'PT BPR Bank Pasar Kota Tegal', 'pasarkotategal', '$2y$10$vdzYkIzuD7Ai9bBCvE0HOukGGo1oCt3uwTwoUCcETSQEL4cQKjfyO', 'klien', 'Y', '2024-08-13', '2025-04-16 16:12:51'),
	(136, 'Klien', 'PD BPR Bank Pemalang', 'bankpemalang', '$2y$10$IiTkBHiuyBut8mTYZppw7eFc9Db2l1yhK87RogI9EweF1jkRkLtue', 'klien', 'Y', '2024-08-13', '2025-04-15 10:26:23'),
	(137, 'Klien', 'PT BPR Bank Tegal Gotong Royong (Perseroda)', 'banktegal', '$2y$10$skD/gnkYbNbp1HX6KqECSuLqslReHf.gmN0A7wX1lNuEP9akxfkHq', 'klien', 'Y', '2024-08-13', '2025-04-19 08:11:08'),
	(138, 'Klien', 'PT. BPR Enggal Makmur Adi Santoso', 'enggalmakmur', '$2y$10$lzl4I8WRshS3Y1VKO7p8Au.bnNiJykbR1kv2Crp2DaEpg7yUWg5m2', 'klien', 'Y', '2024-08-13', '2025-04-17 15:19:14'),
	(139, 'Klien', 'Kospin Jujur Artha Mandiri', 'arthamandiri', '$2y$10$RsV8kNuDe2gBDyoIwQHu5uYldVY9nDJzb.HifkbltODRsMRfAtcka', 'klien', 'Y', '2024-08-13', '2025-03-27 14:29:58'),
	(140, 'Klien', 'PT. BPR Bina Maju Usaha', 'binamajuusaha', '$2y$10$wVgMqcpkEGSAw8A5sSYe6.DuaPMue5GD6dzLT/nmK4YaUxYoaLgza', 'klien', 'Y', '2024-08-13', '2025-04-15 10:48:40'),
	(141, 'Klien', 'PT.BPR Muhadi Setia Budi', 'muhadi', '$2y$10$mBt3J8hZ9J8wsyjBsjalRu/4bVeadeXeZ89cSB0UKy1AdeAtOWRsm', 'klien', 'Y', '2024-08-13', '2025-04-16 14:50:58'),
	(142, 'Klien', 'Kospin Rejo Agung Sukses', 'rejoagung', '$2y$10$bNzIBuVJwG3mj5thNFR6OeGl60jPLhNe4h81MgJ4WFVernVC1rJc2', 'klien', 'Y', '2024-08-13', '2025-04-07 08:42:25'),
	(143, 'Klien', 'SMK 2 Pekalongan', 'smk2pekalongan', '$2y$10$2LQnTTrqTVCPigTEkXwYy.h4dWdWZTF7o6W4y4AQd5A47tk8PisPi', 'klien', 'Y', '2024-08-13', '2024-09-21 09:42:31'),
	(144, 'Klien', 'PT.BPR Dana Rakyat Sentosa', 'drs', '$2y$10$XBtxnfBo5vQHRGzRofZjNe2Tnld09ZJl96Dlc4Rujx19Y68uS44Ee', 'klien', 'Y', '2024-08-13', '2025-04-16 10:48:09'),
	(145, 'Klien', 'PT.BPR Dana Mitra Sentosa', 'dms', '$2y$10$dE8L5398nZajXe28tZNY7eX/M3Re1i6enmB5QqLyMH2D73Vlbo..2', 'klien', 'Y', '2024-08-13', '2025-04-10 14:56:45'),
	(146, 'Klien', 'PT. BPR Surya Kusuma Kranggan', 'suryakusuma', '$2y$10$eN75b9kY9jSNV5GbbmTuGus345yxU8Esw26J8YmAOy2kA2nY3oqq6', 'klien', 'Y', '2024-08-13', '2025-04-15 09:29:57'),
	(147, 'Klien', 'PT. BPR Milala', 'milala', '$2y$10$olLUeWudKckMfuw9LkK9deL0ATAKE7O/JPgWFWtje7zO/xj5zdw4O', 'klien', 'Y', '2024-08-13', '2025-04-11 14:48:21'),
	(148, 'Klien', 'PT. BPR Guna Rakyat', 'gunarakyat', '$2y$10$MxD0wT4KHhxH.mPthZRfxexN4o5lsSe18hO4dmhM8vVum19Uv6L9a', 'klien', 'Y', '2024-08-13', '2025-04-14 16:33:11'),
	(150, 'Klien', 'Koperasi Tri Capital Investama 1', 'tci1', '$2y$10$Qv2w5N9bd3G54vv0raBRiOiGlSf9GuCw8GvwWpHkpmJx3OWCcX16y', 'klien', 'Y', '2024-08-13', '2025-04-17 13:28:42'),
	(151, 'Klien', 'PT. BPR Duta Pasundan', 'dutapasundan', '$2y$10$HxFtex/psOKpGuOSrPeuQOQ.kVHxtXaGuhhTJn7OdYOOgMsE7B7P2', 'klien', 'Y', '2024-08-13', '2024-09-30 14:34:56'),
	(152, 'Klien', 'PT. BPR Mitratama Arthabuana', 'arthabuana', '$2y$10$uP1od3gPLs98OWgYrOl1Meg1OB0FLuxb3tSRmpSfMui2IqvD4oPK6', 'klien', 'Y', '2024-08-13', '2025-04-17 11:12:27'),
	(153, 'Klien', 'PT BPR BKK Kota Semarang (Perseroda)', 'kotasemarang', '$2y$10$oB3LWrCzzcyLVGcQuDuhCea8sYJePBwZb/imi5qCoqd7FPP7EUXS2', 'klien', 'Y', '2024-08-13', '2025-04-19 11:20:44'),
	(154, 'Klien', 'Koperasi Tri Capital Investama 2', 'tci2', '$2y$10$UlJp1jIFE.qTsvgM2dat/O1bFxyu2jAblIPn4a37HpTHqPAWXOf0e', 'klien', 'Y', '2024-08-13', '2024-10-01 11:06:59'),
	(155, 'Klien', 'PT BPR BKK Ungaran (Perseroda)', 'ungaran', '$2y$10$QmEmWrRsgFOeLgKrqI6VluOhm6y3h2.BlRkyTn2QJUMKm4snrqVMe', 'klien', 'Y', '2024-08-13', '2025-04-16 15:28:35'),
	(156, 'Klien', 'PT BPR BKK Wonosobo (Perseroda)', 'wonosobo', '$2y$10$2AWICFoRUSXoXHD.5diH0OriW0M.efeyb2xtV2McE9a57c0iM04hu', 'klien', 'Y', '2024-08-13', '2025-04-15 15:32:05'),
	(157, 'Klien', 'Perumda BPR Artha Perwira', 'arthaperwira', '$2y$10$WkK8R2jM5Q1KNRXrLUJZJesm7HfiMx1War/cNKigaLl3AeFnZtYPm', 'klien', 'Y', '2024-08-13', '2025-04-17 09:13:33'),
	(158, 'Klien', 'PT. BPR Delanggu Raya', 'delangguraya', '$2y$10$2A9G6EwyKSCte6.hynO3UuEm0eDNlshdDOZtHipNtWtY.9lzKfAlS', 'klien', 'Y', '2024-08-13', '2025-04-16 15:06:01'),
	(159, 'Klien', 'Koperasi Jembar Maju Bersama', 'jembarmajubersama', '$2y$10$/fs5QKDhUIcAJazPfxPK9.CmNPN3c13mB5cvNgZpQO1DgqTBmNjKi', 'klien', 'Y', '2024-08-13', '2025-04-11 10:45:13'),
	(160, 'Klien', 'PT.  BPR BKK Tulung (Perseroda)', 'tulung', '$2y$10$yti8zJ1YDVv54QnkOE8L1e5Tx2lQNvsN0Xderfo8CCtlqIYdPoDYK', 'klien', 'Y', '2024-08-13', '2025-04-17 11:47:52'),
	(161, 'Klien', 'PERUMDA BPR Marunting Sejahtera', 'marunting', '$2y$10$CmLXMa/hKNq.K0/hiaB7QeN79jJFW3YBGTMs/3eDdsZ2/.7u2PHRu', 'klien', 'Y', '2024-08-13', '2025-04-10 14:51:00'),
	(162, 'Klien', 'PT. BPT Kurnia Sewon', 'sewon', '$2y$10$m6v5V1a2ewEr7Bw31CA0juriwgSCzFEawL6L/xpObbu1TOBt6OIPO', 'klien', 'Y', '2024-08-13', '2025-04-17 15:23:56'),
	(163, 'Klien', 'PT. BPR Cipatujah Jabar Perseroda', 'cipatujah', '$2y$10$kXi73/XiBRfI1qIUnEf.ouk.nFwk.NhyNOJH4TLYtN.UnnQkGMVrC', 'klien', 'Y', '2024-08-13', '2025-04-21 08:41:26'),
	(164, 'Klien', 'KSP Bougenvill', 'bougenvill', '$2y$10$WkgnCx8bTB2oYDhFIiq87ec5b6twTgqQ1/lhJhBBsk8IjhrQaq2lm', 'klien', 'Y', '2024-08-13', '2025-04-14 14:18:21'),
	(165, 'Klien', 'PT BPR TCI', 'tci', '$2y$10$UkLG4vvcz.uYvYRObwZEN.yKSMVdIix7Vd/Kg5JLX9zHJ99yPP3sK', 'klien', 'Y', '2024-08-13', '2025-04-15 15:27:01'),
	(166, 'Klien', 'PT. BPR BKK Kota Magelang (Perseroda)', 'kotamagelang', '$2y$10$iyQCR9LTXi3JEZWZjcwWYeuwEzR2s5Pr4FJmmgUGavhkP4Uz5pJZi', 'klien', 'Y', '2024-08-13', '2025-04-08 08:57:46'),
	(167, 'Klien', 'PT. BPR Shinta Daya', 'shintadaya', '$2y$10$1kHi5s7g0be3QivP7UeXu.dh4RwVuloyLagVmcLYrfZiPAFmRPrd6', 'klien', 'Y', '2024-08-13', '2025-04-17 10:57:35'),
	(168, 'Klien', 'Kospin Wijaya Kusuma', 'wijayakusuma', '$2y$10$Iq3bQhYDltY217sI1fnGUOI9m8NM9TDMzl8SrZntdWR.lIaFI7DfS', 'klien', 'Y', '2024-08-13', '2025-02-06 15:24:57'),
	(169, 'Klien', 'PT BPR Eleska Artha', 'eleska', '$2y$10$.DRU1xSnJlNBl3qo4JUPV.a.lQGmJQVFAX7rgMaqJE93J3mNpMG5y', 'klien', 'Y', '2024-08-13', '2025-04-17 11:39:43'),
	(170, 'Klien', 'PT. BPR Arta Mas Surakarta', 'artamassurakarta', '$2y$10$u4ayEQsyCJaxa.KBGk0RJO97B.QXdpbgHF9QAZesUlObbi9NeoSiS', 'klien', 'Y', '2024-08-13', '2025-04-21 09:04:28'),
	(171, 'Klien', 'PT. BPR BKK Batang', 'batang', '$2y$10$AaMSsDGF2KyN3K1vLSIPROHwPmlQaS/vEzqmo8cKM4j1vZTRCdE8u', 'klien', 'Y', '2024-08-13', '2025-04-14 09:42:07'),
	(172, 'Klien', 'PT. BPR BKK GALUH', 'galuh', '$2y$10$W5o/x1PCp6jFsK2EkXALPOth9GpPbjjeH5K/R58lT6TUGrVxEDd6S', 'klien', 'Y', '2024-08-13', '2025-04-21 07:23:08'),
	(174, 'Klien', 'PT BPR XYZ', 'adminbprxyz', '$2y$10$1E9gLHJmdR990WihZtAj6edGNj7IZr3pPPR6Z4FSUxNeX0M3rQDty', 'klien', 'Y', '2024-08-22', '2025-04-14 09:37:17'),
	(175, 'Helpdesk', 'hd test', 'testhd', '$2y$10$sIWzD.SYPCFhiDe//kVDUusiA40d8E8z0MN61tuFgYyWbfLq8pU7K', '2', 'Y', '2024-09-06', '2025-04-16 08:35:27'),
	(176, 'Implementator', 'Nida', 'nida', '$2y$10$/LTmIooLMp5xN9VEFdNQtuOo9PtwE71hVmEuOxo/UayoBF2Msgq7e', '4', 'Y', '2024-08-16', '2025-03-07 10:20:59'),
	(177, 'Klien', 'PT. BPR Sendang Harta Sejahtera', 'sendanghartha', '$2y$10$eQEHfzS/PKELwIPiFSJ./OLniEJ5XTX6q7yGJz8yYiK3hMxTP.zQ2', 'klien', 'Y', '2024-09-17', '2025-04-21 08:52:14'),
	(178, 'Klien', 'PT BPR Sukdana', 'sukadana', '$2y$10$kZXh7pj3vs7cpCIZ7RwuQOpyPq.Ingeyh7.HunycQKQzwAJqtTz6q', 'klien', 'Y', '2024-09-17', '2025-04-17 13:35:23'),
	(179, 'Klien', 'PT. BPR Sukadyarindang', 'sukadyarindang', '$2y$10$4i8C6urbWeRXZhyZrqA3uuzp2by7eRLQaD9bpl/L/fhnt3/3UotTu', 'klien', 'Y', '2024-09-17', '2025-04-15 16:07:16'),
	(180, 'Superadmin', 'superadmin', 'superadmin', '$2y$12$vO3dcviHxeLZjyxrjJFDs.SARYbaWpTww0euY.FMWsggxz94X4M9O', 'superadmin', 'Y', '2024-03-18', '2025-06-26 12:52:03'),
	(181, 'Klien', 'PT. BPR BKK Kota Pekalongan (Perseroda)', 'kotapekalongan', '$2y$10$vK1ZFKBVl9gxIs4u79OmNeP2rTCr1sjQ18Jiw5EbQwmS6KYoPenZ.', 'klien', 'Y', '2024-09-18', '2025-04-17 11:14:14'),
	(182, 'Klien', 'PT BPR UKABIMA', 'ukabima', '$2y$10$8Lt5pCNLGlTKNbvSlZ9YEexX55grR/V9WsGaBKpwqOccFqOk0rcrS', 'klien', 'Y', '2024-09-18', '2025-04-14 14:18:12'),
	(184, 'Implementator', 'alingwi', 'alingwi', '$2y$10$tXZyYGoPbY4wefZZdR0icOY4rXdz6l0aIXrO4T4FPW4RyHzhXHmLe', '4', 'Y', '2024-09-25', '2025-04-16 09:14:22'),
	(186, 'Helpdesk', 'MIGRASI', 'MIGRASI', '$2y$10$20.a9GBr0WDRMiS5GDx7peyd4vPEu6bnQAAubkwjsk8RBeOhcdq6a', '2', 'Y', '2024-09-26', '2024-09-30 16:35:00'),
	(187, 'Klien', 'KSU BMT Amananh', 'bmtamanah', '$2y$10$3qDv5C/XjM3J7mj7LHI3zOxcGHQ6v63UGE/KiS8EO1RprGxdWy.Y6', 'klien', 'Y', '2024-09-30', '2024-09-30 14:39:48'),
	(188, 'Klien', 'PD. BKK Susukan', 'susukan', '$2y$10$mhO0fh0QiJ4xXsPVuWkQ6.5k7M4CcJ.HoHOs54V8ACH0gIaXXb0iq', 'klien', 'Y', '2024-09-30', NULL),
	(189, 'Klien', 'PT BPR BKK Demak (Perseroda)', 'demak', '$2y$10$clSgSIeZLqB0mcqA8Biaj.h0v2FVzEkwllBsB/8zBH.7ZcbkuSrEK', 'klien', 'Y', '2025-01-15', '2025-04-17 10:36:15'),
	(190, 'Implementator', 'Wahyu', 'Wahyu', '$2y$10$ZvXKg4tq8EnjvESszJ0x/ez65jME2snbhaRSolOLQqW6cFmwx3ygy', '4', 'Y', '2025-03-06', '2025-03-07 15:53:53'),
	(191, 'Superadmin', 'hanifan', 'hanifan', '$2y$10$09VaqmKT47PztQZ8.U9deezh5zl/59Rj8GJnfkvT4ZlprmrE3Usuy', 'superadmin', 'Y', '2025-03-21', '2025-03-21 13:23:37'),
	(192, 'Superadmin', 'ycaesar', 'ycaesar', '$2y$10$YiQUDQtcU2uOGoY1ctWNvesJU8tVO9/f9H0bxiBAIRbcfed86QMFm', 'superadmin', 'Y', '2025-03-21', '2025-03-21 13:30:53');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
