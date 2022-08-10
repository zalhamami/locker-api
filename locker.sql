-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 05:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locker`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_login`
--

CREATE TABLE `appointment_login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_login`
--

INSERT INTO `appointment_login` (`id`, `text`, `date_login`, `time_login`) VALUES
(26, 'adsd', '2022-08-02', '15:06:24'),
(27, 'adsd', '2022-08-02', '16:34:14'),
(28, 'adsd', '2022-08-02', '16:44:40'),
(29, 'adsd', '2022-08-02', '17:15:31'),
(30, 'adsd', '2022-08-02', '17:17:43'),
(31, 'adsd', '2022-08-02', '17:18:25'),
(32, 'admin', '2022-08-02', '17:29:49'),
(33, 'bbb', '2022-08-06', '04:49:19'),
(34, 'bbb', '2022-08-06', '04:51:52'),
(35, 'bbb', '2022-08-06', '04:54:31'),
(36, 'admin', '2022-08-06', '04:57:44'),
(37, 'admin', '2022-08-06', '05:03:18'),
(38, 'admin', '2022-08-06', '05:06:51'),
(39, 'admin', '2022-08-06', '05:20:10'),
(40, 'admin', '2022-08-06', '18:32:35'),
(41, 'admin', '2022-08-06', '18:32:36'),
(42, 'admin', '2022-08-06', '18:32:49'),
(43, 'admin', '2022-08-06', '18:40:48'),
(44, 'admin', '2022-08-06', '18:41:59'),
(45, 'admin', '2022-08-06', '18:50:52'),
(46, 'admin', '2022-08-06', '18:55:21'),
(47, 'admin', '2022-08-06', '18:58:14'),
(48, 'admin', '2022-08-06', '19:05:06'),
(49, 'admin', '2022-08-06', '19:12:16'),
(50, 'admin', '2022-08-06', '19:13:32'),
(51, 'admin', '2022-08-06', '19:14:19'),
(52, 'admin', '2022-08-06', '19:15:51'),
(53, 'admin', '2022-08-06', '19:18:34'),
(54, 'admin', '2022-08-06', '19:20:33'),
(55, 'admin', '2022-08-06', '19:20:47'),
(56, 'admin', '2022-08-06', '19:23:24'),
(57, 'bbb', '2022-08-07', '05:48:51'),
(58, 'bbb', '2022-08-07', '05:48:51'),
(59, 'bbb', '2022-08-07', '06:09:08'),
(60, 'bbb', '2022-08-07', '06:09:09'),
(61, 'admin', '2022-08-07', '06:25:56'),
(62, 'admin', '2022-08-07', '06:25:56'),
(63, 'admin', '2022-08-07', '06:27:47'),
(64, 'bbb', '2022-08-08', '01:24:59'),
(65, 'admin', '2022-08-08', '01:26:54'),
(66, 'bbb', '2022-08-08', '01:35:46'),
(67, 'admin', '2022-08-08', '01:35:52'),
(68, 'bbb', '2022-08-08', '01:42:04'),
(69, 'admin', '2022-08-08', '01:42:18'),
(70, 'admin', '2022-08-08', '01:42:42'),
(71, 'Firza Yulia Annisa', '2022-08-08', '01:45:58'),
(72, 'bbb', '2022-08-08', '01:46:50'),
(73, 'admin', '2022-08-08', '01:47:32'),
(74, 'admin', '2022-08-08', '01:54:03'),
(75, 'admin', '2022-08-08', '02:26:09'),
(76, 'admin', '2022-08-08', '02:26:09'),
(77, 'bbb', '2022-08-08', '04:14:50'),
(78, 'admin', '2022-08-08', '04:17:19'),
(79, 'bbb', '2022-08-08', '06:04:27'),
(80, 'bbb', '2022-08-08', '06:09:01'),
(81, 'admin', '2022-08-08', '06:12:37'),
(82, 'bbb', '2022-08-08', '06:16:48'),
(83, 'admin', '2022-08-08', '06:18:27'),
(84, 'admin', '2022-08-08', '06:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_loker`
--

CREATE TABLE `appointment_loker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_loker`
--

INSERT INTO `appointment_loker` (`id`, `text`, `loker`, `status_active`) VALUES
(12, NULL, NULL, '1'),
(18, 'adsd', '4', '0'),
(19, 'adsd', '4', '0'),
(20, 'adsd', '4', '0'),
(35, 'Firza Yulia Annisa', '1', '1'),
(36, 'Firza Yulia Annisa', '1', '0'),
(39, 'bbb', '1', '1'),
(40, 'bbb', '1', '0'),
(41, 'bbb', '1', '1'),
(42, 'bbb', '1', '0'),
(43, 'bbb', '2', '1'),
(44, 'bbb', '2', '0'),
(45, 'bbb', '3', '1'),
(46, 'bbb', '3', '0'),
(47, 'bbb', '1', '1'),
(48, 'bbb', '1', '0'),
(49, 'bbb', '2', '1'),
(50, 'bbb', '2', '0'),
(51, 'bbb', '2', '0'),
(52, 'bbb', '1', '1'),
(53, 'bbb', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_lokers`
--

CREATE TABLE `master_lokers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomer_loker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_loker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_loker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_lokers`
--

INSERT INTO `master_lokers` (`id`, `nomer_loker`, `nama_loker`, `status_loker`) VALUES
(1, '01', 'Loker 1', '1'),
(2, '02', 'Loker 2', '1'),
(3, '03', 'Loker 3', '1'),
(4, '04', 'Loker 4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_09_172626_create_model_lokers_table', 1),
(6, '2022_07_09_172815_create_model_app_lokers_table', 1),
(7, '2022_07_25_213514_create_model_app_logins_table', 1),
(8, '2022_07_31_005110_create_master_lokers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institusi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nim`, `nip`, `jurusan`, `program_studi`, `email`, `institusi`, `password`, `role_status`, `created_at`, `updated_at`) VALUES
(1, 'bbb', NULL, NULL, NULL, NULL, 'bbb@gmail.com', 'Bbb', '$2y$10$0BhwFhLuqXZVNO1YyoqJOOpwq.DKY9XoJWkK4lM9JCZKmvmg1dg6a', '4', NULL, NULL),
(2, 'admin', NULL, NULL, NULL, NULL, 'admin@gmail.com', 'Admin', '$2y$10$z0V2yfoYerLUbb5bcdfKSu6UHqgoxf5wVORVKEvU0sADLzKdLrlk2', '1', NULL, NULL),
(3, 'adsd', NULL, NULL, NULL, NULL, 'dasd', 'asda', '$2y$10$GS6aL.fcL/9QGSvtsN6Fu.vTUzMEwT58QO1Y1oAGySi2WFqiNUPuS', '4', NULL, NULL),
(5, 'Firza Yulia Annisa', NULL, NULL, NULL, NULL, 'aksesrara@gmail.com', '-', '$2y$10$Kszoe/fp2sYMsSX/HV5h.OcBhwgZ.Vd2MUHEeXVOCiDurTaZli/gC', '4', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_login`
--
ALTER TABLE `appointment_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_loker`
--
ALTER TABLE `appointment_loker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_lokers`
--
ALTER TABLE `master_lokers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_login`
--
ALTER TABLE `appointment_login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `appointment_loker`
--
ALTER TABLE `appointment_loker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_lokers`
--
ALTER TABLE `master_lokers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
