-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: feb. 18, 2023 la 12:32 PM
-- Versiune server: 10.4.18-MariaDB
-- Versiune PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `delivery`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comenzi`
--

CREATE TABLE `comenzi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descriere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sofer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `comenzi`
--

INSERT INTO `comenzi` (`id`, `descriere`, `status`, `sofer_id`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(1, 'test comanda 1', 'Comanda finalizata', 2, 1, '2021-12-28 13:01:03', '2021-12-28 17:36:44'),
(2, 'test comanda 2', 'Comanda finalizata', 2, 1, '2021-12-28 13:08:29', '2021-12-28 17:46:20'),
(3, 'test comanda 3', 'Comanda finalizata', 4, 1, '2021-12-28 13:14:33', '2022-02-13 16:38:21'),
(4, 'test comanda 3', 'Comanda finalizata', 4, 1, '2021-12-28 13:15:33', '2022-02-13 16:47:40'),
(5, 'test comanda 5', 'Comanda noua', NULL, 1, '2021-12-28 13:17:00', '2021-12-28 13:17:00'),
(6, 'test data1', 'Comanda noua', NULL, 1, '2022-01-02 17:26:15', '2022-01-02 17:26:15'),
(7, 'test refresh 1', 'Comanda finalizata', 2, 1, '2022-01-03 14:36:05', '2022-01-03 16:29:48'),
(8, 'test refresh 2', 'Comanda noua', NULL, 1, '2022-01-03 14:40:26', '2022-01-03 14:40:26'),
(9, 'test 3', 'Comanda noua', NULL, 1, '2022-01-03 14:45:19', '2022-01-03 14:45:19'),
(10, 'test4', 'Comanda noua', NULL, 1, '2022-01-03 15:03:10', '2022-01-03 15:03:10'),
(11, 'test5', 'Comanda noua', NULL, 1, '2022-01-03 15:09:10', '2022-01-03 15:09:10'),
(12, 'test6', 'Comanda noua', NULL, 1, '2022-01-03 15:10:54', '2022-01-03 15:10:54'),
(13, 'test 7', 'Comanda noua', NULL, 1, '2022-01-03 15:30:37', '2022-01-03 15:30:37'),
(14, 'test 8', 'Comanda noua', NULL, 1, '2022-01-03 15:31:22', '2022-01-03 15:31:22'),
(15, 'test 9', 'Comanda noua', NULL, 1, '2022-01-03 15:33:41', '2022-01-03 15:33:41'),
(16, 'test 10', 'Comanda finalizata', 2, 1, '2022-01-03 15:34:52', '2022-01-03 16:37:24'),
(17, 'test 11', 'Comanda preluata', 2, 1, '2022-01-03 15:54:01', '2022-01-03 16:39:23'),
(18, 'unu', 'Comanda noua', NULL, 1, '2022-01-10 20:02:58', '2022-01-10 20:02:58'),
(19, 'doi', 'Comanda noua', NULL, 1, '2022-01-10 20:03:15', '2022-01-10 20:03:15'),
(20, '20', 'Comanda noua', NULL, 1, '2022-01-11 14:22:25', '2022-01-11 14:22:25'),
(21, '21', 'Comanda noua', NULL, 1, '2022-01-11 14:23:05', '2022-01-11 14:23:05'),
(22, '22', 'Comanda noua', NULL, 1, '2022-01-11 15:03:30', '2022-01-11 15:03:30'),
(23, '23', 'Comanda noua', NULL, 1, '2022-01-11 15:04:24', '2022-01-11 15:04:24'),
(24, '24', 'Comanda noua', NULL, 1, '2022-01-11 16:05:01', '2022-01-11 16:05:01'),
(25, '25', 'Comanda noua', NULL, 1, '2022-01-11 16:07:01', '2022-01-11 16:07:01'),
(26, '26', 'Comanda noua', NULL, 1, '2022-01-11 16:08:04', '2022-01-11 16:08:04'),
(27, '27', 'Comanda noua', NULL, 1, '2022-01-11 16:09:27', '2022-01-11 16:09:27'),
(28, '28', 'Comanda noua', NULL, 1, '2022-01-11 16:13:52', '2022-01-11 16:13:52'),
(29, '29', 'Comanda noua', NULL, 1, '2022-01-11 17:41:35', '2022-01-11 17:41:35'),
(30, '30', 'Comanda noua', NULL, 1, '2022-01-11 17:48:27', '2022-01-11 17:48:27'),
(31, '31', 'Comanda noua', NULL, 1, '2022-01-11 19:34:21', '2022-01-11 19:34:21'),
(32, '32', 'Comanda noua', NULL, 1, '2022-01-11 19:37:04', '2022-01-11 19:37:04'),
(33, '33', 'Comanda noua', NULL, 1, '2022-01-11 19:41:30', '2022-01-11 19:41:30'),
(34, '34', 'Comanda noua', NULL, 1, '2022-01-11 19:43:59', '2022-01-11 19:43:59'),
(35, '35', 'Comanda noua', NULL, 1, '2022-01-11 19:45:29', '2022-01-11 19:45:29'),
(36, '36', 'Comanda noua', NULL, 1, '2022-01-12 10:53:18', '2022-01-12 10:53:18'),
(37, '37', 'Comanda noua', NULL, 1, '2022-01-12 11:00:36', '2022-01-12 11:00:36'),
(38, '38', 'Comanda noua', NULL, 1, '2022-01-12 11:09:40', '2022-01-12 11:09:40'),
(39, '39', 'Comanda noua', NULL, 1, '2022-01-12 11:15:32', '2022-01-12 11:15:32'),
(40, '40', 'Comanda noua', NULL, 1, '2022-01-12 11:18:45', '2022-01-12 11:18:45'),
(41, '41', 'Comanda noua', NULL, 1, '2022-01-12 11:38:19', '2022-01-12 11:38:19'),
(42, '42', 'Comanda noua', NULL, 1, '2022-01-12 11:46:07', '2022-01-12 11:46:07'),
(43, '43', 'Comanda noua', NULL, 1, '2022-01-12 11:49:06', '2022-01-12 11:49:06'),
(44, '44', 'Comanda noua', NULL, 1, '2022-01-12 11:51:53', '2022-01-12 11:51:53'),
(45, '45', 'Comanda noua', NULL, 1, '2022-01-12 11:56:32', '2022-01-12 11:56:32'),
(46, '46', 'Comanda noua', NULL, 1, '2022-01-12 12:00:44', '2022-01-12 12:00:44'),
(47, '47', 'Comanda noua', NULL, 1, '2022-01-12 12:03:16', '2022-01-12 12:03:16'),
(48, '48', 'Comanda noua', NULL, 1, '2022-01-12 12:12:08', '2022-01-12 12:12:08'),
(49, '49', 'Comanda noua', NULL, 1, '2022-01-12 12:12:58', '2022-01-12 12:12:58'),
(50, '50', 'Comanda noua', NULL, 1, '2022-01-12 14:08:34', '2022-01-12 14:08:34'),
(51, '51', 'Comanda noua', NULL, 1, '2022-01-12 14:08:50', '2022-01-12 14:08:50'),
(52, '52', 'Comanda noua', NULL, 20, '2022-01-12 14:10:58', '2022-01-12 14:10:58'),
(53, '53', 'Comanda noua', NULL, 1, '2022-01-12 14:25:07', '2022-01-12 14:25:07'),
(54, '23', 'Comanda noua', NULL, 22, '2022-01-12 15:33:26', '2022-01-12 15:33:26'),
(55, '24', 'Comanda noua', NULL, 22, '2022-01-12 15:33:30', '2022-01-12 15:33:30'),
(56, '25', 'Comanda noua', NULL, 22, '2022-01-12 15:33:36', '2022-01-12 15:33:36'),
(57, '17', 'Comanda noua', NULL, 25, '2022-01-12 15:34:25', '2022-01-12 15:34:25'),
(58, '18', 'Comanda noua', NULL, 25, '2022-01-12 15:34:32', '2022-01-12 15:34:32'),
(59, '26', 'Pe drum spre restaurant 1', 4, 22, '2022-01-12 15:37:22', '2022-02-14 13:50:18'),
(60, '19', 'Comanda finalizata', 24, 25, '2022-01-12 15:37:41', '2022-01-16 18:03:20'),
(61, '27', 'Comanda preluata', 23, 22, '2022-01-12 15:39:18', '2022-01-16 19:12:31'),
(62, '20', 'Comanda finalizata', 4, 25, '2022-01-12 15:40:21', '2022-02-13 16:39:55'),
(64, '29', 'Comanda finalizata', 23, 22, '2022-01-12 15:45:42', '2022-01-16 19:12:28'),
(65, '60', 'Comanda finalizata', 26, 27, '2022-01-12 15:57:44', '2022-01-12 16:01:17'),
(66, '61', 'Comanda finalizata', 24, 27, '2022-01-12 15:57:49', '2022-01-12 16:39:34'),
(67, '62', 'Comanda finalizata', 24, 27, '2022-01-12 15:57:54', '2022-01-16 18:04:04'),
(69, 'test comanda 14feb2022', 'Comanda noua', NULL, 1, '2022-02-14 18:12:52', '2022-02-14 18:12:52'),
(71, 'descr', 'status', 1, 1, NULL, NULL),
(72, 'Comanda noua 1. 17.02.2023.', 'Comanda preluata', 4, 1, '2023-02-17 18:59:14', '2023-02-17 19:02:12'),
(73, 'Comanda noua 2. 17.02.2023', 'Comanda finalizata', 4, 1, '2023-02-17 19:01:05', '2023-02-17 19:02:04');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2021_12_27_222151_create_user_roles_table', 1),
(24, '2021_12_28_081323_create_comandas_table', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('valary878@yahoo.com', '$2y$10$entcWSQcLqshCipjl5sskOFaHEtLiq4aug81nZowqK1b1x0GggHPm', '2022-01-17 15:51:42');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'restaurant', 'restaurant@test.com', NULL, '$2y$10$8l5AroU4eDKvqZ.fgb2JE.zWY3NsnUcolpRkKxCGTjfQWZ3nBIQBO', NULL, '2021-12-28 12:56:43', '2021-12-28 12:56:43'),
(2, 'sofer1', 'sofer1@test.com', NULL, '$2y$10$8a4xGewcscWEySuzxWe9repePSN1T.zpcfrRBTtaMhnz7SPmOuQrG', NULL, '2021-12-28 13:36:01', '2021-12-28 13:36:01'),
(3, 'admin', 'admin@test.com', NULL, '$2y$10$8l5AroU4eDKvqZ.fgb2JE.zWY3NsnUcolpRkKxCGTjfQWZ3nBIQBO', NULL, '2021-12-29 13:42:36', '2022-01-19 15:14:25'),
(4, 'sofer2', 'sofer2@test.com', NULL, '$2y$10$7IEJNltmeKXd5lb2kWt1YuYQkMPG/rLi4bcoRdCGVWkIU72IplB.2', NULL, '2021-12-29 14:57:07', '2021-12-29 14:57:07'),
(20, 'qqqq', 'qqqq@q.com', NULL, '$2y$10$GQrul2LDUXQQRdM9OQp1r.o/SNkvUiXTdfF/1I6hyC0hgC.OWSpES', 'hO4fkunFz9nKQkv5RY39f3J4VsQNY4pok1M65bAUHhCoeXOylS3dixDZ3Fh2', '2022-01-01 15:22:08', '2022-01-01 15:22:08'),
(21, 'test12', 'test12@test.com', NULL, '$2y$10$kT.osPQKw4aomKvMSUR2yeX6nlk8pzGtZxKet1ljN4yi5cgaNNGmC', NULL, '2022-01-01 16:12:55', '2022-01-01 16:12:55'),
(22, 'Restaurant Maria', 'rest@test.ro', NULL, '$2y$10$O.xNHorvQ9uX65gWDq6mXuknxkKvYgYXs56MWFNz0NgH09cICYwU2', NULL, '2022-01-12 15:25:25', '2022-01-12 15:25:25'),
(23, 'Popescu', 'popescu@test.com', NULL, '$2y$10$oh4M6NS0LQ9CpY8UoN.gGud6RFIPC3j.VfDvBIACrF8Cup7olzE3G', NULL, '2022-01-12 15:26:41', '2022-01-12 15:26:41'),
(24, 'Ionescu', 'ionescu@test.com', NULL, '$2y$10$doXCV8j8vW7aZvTHYIs7xOZPH6uUT2B1ewLAq/puj8kFJEzhMziKa', NULL, '2022-01-12 15:27:54', '2022-01-12 15:27:54'),
(25, 'Restaurant Olimpia', 'olimpia@test.com', NULL, '$2y$10$f0Vy6FAltrFS28O5fXXZr.ny/UzqOUZLfGO8TDNJtJMmsbyqto5Eq', NULL, '2022-01-12 15:29:36', '2022-01-12 15:29:36'),
(26, 'Stoica', 'stoica@test.com', NULL, '$2y$10$WyoZXtuZs154Vzq3Ezw4qO2u2d9gPRinZT51cCvTXgT3zXgBJxKLa', NULL, '2022-01-12 15:55:39', '2022-01-12 15:55:39'),
(27, 'Restaurant Royal', 'royal@test.com', NULL, '$2y$10$lvk9qbh8/Be4eCthK49Xg.zbj4TFNk04y92KGDeF6H4DMmu6clSY.', NULL, '2022-01-12 15:56:49', '2022-01-12 15:56:49'),
(29, 'testParola', 'testParola@test.ro', NULL, '$2y$10$dMop2kqjsGPuI/Z.65gMdemwjlmpLuHd.FMFXGxM.XY1o2Qi/X8tC', NULL, '2022-01-17 16:44:52', '2022-01-19 15:21:51'),
(30, 'sofer4', 'sofer4@test.com', NULL, '$2y$10$AwTBvmBfUu/7tc2G8P0KRu5RaWFYkHGOYQxlFKFmmdLCbnYubABXu', NULL, '2022-02-13 12:32:57', '2022-02-13 12:32:57');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'restaurant23', NULL, NULL),
(2, 'sofer23', NULL, NULL),
(3, 'admin23', NULL, NULL),
(4, 'sofer23', '2021-12-29 15:51:23', '2021-12-29 15:51:23'),
(20, 'restaurant23', '2022-01-01 15:22:58', '2022-01-01 15:22:58'),
(22, 'restaurant23', '2022-01-12 15:25:44', '2022-01-12 15:25:44'),
(23, 'sofer23', '2022-01-12 15:26:57', '2022-01-12 15:26:57'),
(24, 'sofer23', '2022-01-12 15:28:36', '2022-01-12 15:28:36'),
(25, 'restaurant23', '2022-01-12 15:29:51', '2022-01-12 15:29:51'),
(27, 'restaurant23', '2022-01-12 15:56:57', '2022-01-12 15:56:57'),
(26, 'sofer23', '2022-01-12 15:57:08', '2022-01-12 15:57:08'),
(29, 'restaurant23', '2022-01-17 17:11:53', '2022-01-17 17:11:53'),
(30, 'sofer23', '2022-02-13 12:33:38', '2022-02-13 12:33:38');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comenzi_sofer_id_foreign` (`sofer_id`),
  ADD KEY `comenzi_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexuri pentru tabele `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexuri pentru tabele `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexuri pentru tabele `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexuri pentru tabele `user_roles`
--
ALTER TABLE `user_roles`
  ADD KEY `user_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pentru tabele `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pentru tabele `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `comenzi`
--
ALTER TABLE `comenzi`
  ADD CONSTRAINT `comenzi_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comenzi_sofer_id_foreign` FOREIGN KEY (`sofer_id`) REFERENCES `users` (`id`);

--
-- Constrângeri pentru tabele `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
