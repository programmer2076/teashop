-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2022 at 01:11 PM
-- Server version: 8.0.30-0ubuntu0.20.04.2
-- PHP Version: 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'seafood', '2022-10-10 03:00:48', '2022-10-10 03:00:48'),
(2, 'drink', '2022-10-10 03:01:29', '2022-10-10 03:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `log` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `user_id`, `amount`, `status`, `log`, `created_at`, `updated_at`) VALUES
(1, 2, '5000.00', 1, 'a:2:{i:0;a:3:{s:5:\"price\";s:7:\"2000.00\";s:4:\"item\";s:5:\"Pazun\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 11:15:32.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:1;a:3:{s:5:\"price\";s:7:\"3000.00\";s:4:\"item\";s:10:\"Ganan Chet\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 11:15:32.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}}', '2022-10-13 05:01:19', '2022-10-13 05:01:19'),
(2, 2, '5000.00', 1, 'a:2:{i:0;a:3:{s:5:\"price\";s:7:\"2000.00\";s:4:\"item\";s:5:\"Pazun\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 11:38:30.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:1;a:3:{s:5:\"price\";s:7:\"3000.00\";s:4:\"item\";s:10:\"Ganan Chet\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 11:38:30.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}}', '2022-10-13 05:08:37', '2022-10-13 05:08:37'),
(3, 2, '8000.00', 1, 'a:4:{i:0;a:4:{s:2:\"id\";i:1;s:5:\"price\";s:7:\"2000.00\";s:4:\"item\";s:5:\"Pazun\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:04:55.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:1;a:4:{s:2:\"id\";i:2;s:5:\"price\";s:7:\"3000.00\";s:4:\"item\";s:10:\"Ganan Chet\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:04:55.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:2;a:4:{s:2:\"id\";i:3;s:5:\"price\";s:7:\"1000.00\";s:4:\"item\";s:4:\"Coca\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:04:55.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:3;a:4:{s:2:\"id\";i:4;s:5:\"price\";s:7:\"2000.00\";s:4:\"item\";s:4:\"Milk\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:04:55.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}}', '2022-10-13 05:35:01', '2022-10-13 05:35:01'),
(4, 2, '8000.00', 1, 'a:4:{i:0;a:4:{s:2:\"id\";i:1;s:5:\"price\";s:7:\"2000.00\";s:4:\"item\";s:5:\"Pazun\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:54:03.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:1;a:4:{s:2:\"id\";i:2;s:5:\"price\";s:7:\"3000.00\";s:4:\"item\";s:10:\"Ganan Chet\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:54:03.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:2;a:4:{s:2:\"id\";i:3;s:5:\"price\";s:7:\"1000.00\";s:4:\"item\";s:4:\"Coca\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:54:03.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:3;a:4:{s:2:\"id\";i:4;s:5:\"price\";s:7:\"2000.00\";s:4:\"item\";s:4:\"Milk\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:54:03.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}}', '2022-10-13 06:24:09', '2022-10-13 06:24:09'),
(5, 2, '8000.00', 1, 'a:4:{i:0;a:4:{s:2:\"id\";i:1;s:5:\"price\";s:7:\"2000.00\";s:4:\"item\";s:5:\"Pazun\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:57:31.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:1;a:4:{s:2:\"id\";i:2;s:5:\"price\";s:7:\"3000.00\";s:4:\"item\";s:10:\"Ganan Chet\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:57:31.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:2;a:4:{s:2:\"id\";i:3;s:5:\"price\";s:7:\"1000.00\";s:4:\"item\";s:4:\"Coca\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:57:31.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:3;a:4:{s:2:\"id\";i:4;s:5:\"price\";s:7:\"2000.00\";s:4:\"item\";s:4:\"Milk\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:57:31.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}}', '2022-10-13 06:27:41', '2022-10-13 06:27:41'),
(6, 2, '8000.00', 1, 'a:4:{i:0;a:4:{s:2:\"id\";i:1;s:5:\"price\";s:7:\"2000.00\";s:4:\"item\";s:5:\"Pazun\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:58:49.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:1;a:4:{s:2:\"id\";i:2;s:5:\"price\";s:7:\"3000.00\";s:4:\"item\";s:10:\"Ganan Chet\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:58:49.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:2;a:4:{s:2:\"id\";i:3;s:5:\"price\";s:7:\"1000.00\";s:4:\"item\";s:4:\"Coca\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:58:49.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}i:3;a:4:{s:2:\"id\";i:4;s:5:\"price\";s:7:\"2000.00\";s:4:\"item\";s:4:\"Milk\";s:4:\"date\";O:25:\"Illuminate\\Support\\Carbon\":3:{s:4:\"date\";s:26:\"2022-10-13 12:58:49.000000\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:3:\"UTC\";}}}', '2022-10-13 06:28:55', '2022-10-13 06:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `desks`
--

CREATE TABLE `desks` (
  `id` bigint UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `desks`
--

INSERT INTO `desks` (`id`, `tag`, `image`, `created_at`, `updated_at`) VALUES
(1, 'I\'m Table 1', '1665410530cGhwUWpRNjZZ', '2022-10-10 01:01:41', '2022-10-10 07:32:10'),
(2, NULL, '1665387233cGhwUHBXck9Y', '2022-10-10 01:03:53', '2022-10-10 01:03:53'),
(3, NULL, '1665387274cGhwdzJwbjlx', '2022-10-10 01:04:34', '2022-10-10 01:04:34'),
(4, 'sample table', '1665390464cGhweEsxQWwy', '2022-10-10 01:32:21', '2022-10-10 01:57:44'),
(5, NULL, '1665390818cGhwMG5EdXhJ', '2022-10-10 02:03:38', '2022-10-10 02:03:38'),
(6, NULL, '1665390823cGhwNG5Ja3ZW', '2022-10-10 02:03:43', '2022-10-10 02:03:43'),
(7, NULL, '1665390840cGhwaXF4UXEw', '2022-10-10 02:04:00', '2022-10-10 02:04:00'),
(8, NULL, '1665390861cGhwYlFObnFV', '2022-10-10 02:04:21', '2022-10-10 02:04:21'),
(9, NULL, '1665390865cGhwTUs1TzhV', '2022-10-10 02:04:25', '2022-10-10 02:04:25'),
(10, NULL, '1665390868cGhwQUFZZVRW', '2022-10-10 02:04:28', '2022-10-10 02:04:28'),
(11, NULL, '1665390900cGhwc0F5SFYw', '2022-10-10 02:05:00', '2022-10-10 02:05:00'),
(12, NULL, '1665390905cGhwbHdzdmdP', '2022-10-10 02:05:05', '2022-10-10 02:05:05'),
(13, 'sample', '1665410743cGhwcDVkY2ZC', '2022-10-10 07:35:43', '2022-10-10 07:35:43'),
(14, NULL, '1665410779cGhwU2RvcmM0', '2022-10-10 07:36:19', '2022-10-10 07:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `promote` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` decimal(15,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `category_id`, `promote`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(3, 2, 0, 'Coke', NULL, '1000.00', '1665401339cGhwWHRJNUcz', '2022-10-10 04:58:59', '2022-10-10 04:58:59'),
(4, 2, 0, 'Milk', NULL, '2000.00', '1665401374cGhwOUhQMHIz', '2022-10-10 04:59:34', '2022-10-10 04:59:34'),
(5, 1, 1, 'Ganan Chet', 'way of my cooking', '3000.00', '1665509666cGhwZlNrV0Vz', '2022-10-11 11:04:26', '2022-10-11 11:04:26'),
(6, 2, 0, 'Coca', 'Drinking', '1000.00', '1665509707cGhwampDVVpQ', '2022-10-11 11:05:07', '2022-10-11 11:05:07'),
(7, 1, 0, 'Pazun', NULL, '2000.00', '1665509785cGhweGtVOVU0', '2022-10-11 11:06:25', '2022-10-11 11:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `menu_stacks`
--

CREATE TABLE `menu_stacks` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `stack_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_10_033206_create_permission_tables', 1),
(6, '2022_10_10_033911_create_desks_table', 2),
(7, '2022_10_10_090132_create_categories_table', 3),
(9, '2022_10_10_090322_create_menus_table', 4),
(16, '2022_10_10_091515_create_stacks_table', 5),
(19, '2022_10_11_085134_create_menu_stacks_table', 6),
(21, '2022_10_13_083854_create_checkouts_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Desk', 2, 'table', '871660034a0921bbb85e871ffcda6aa9b401126474da2a79473e317055501944', '[\"*\"]', NULL, NULL, '2022-10-10 19:58:06', '2022-10-10 19:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-10-10 22:25:27', '2022-10-10 22:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stacks`
--

CREATE TABLE `stacks` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `desk_id` bigint UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stacks`
--

INSERT INTO `stacks` (`id`, `user_id`, `desk_id`, `token`, `state`, `created_at`, `updated_at`) VALUES
(78, 2, 2, 'f23723', 1, '2022-10-13 06:31:00', '2022-10-13 06:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Su Su', 'susu@gmail.com', NULL, '$2y$10$hpC9zYQCqohoymxgY5CDAO/HCF1nwZCtIM2oP3NAkDXzZZTI6kI6e', NULL, '2022-10-09 21:48:23', '2022-10-09 21:48:23'),
(2, 'Zaw Zaw', 'zawzaw@gmail.com', NULL, '$2y$10$cbwHxZq5GzwGQMnuCAB0HeSvVoOvG9iyexMk.g7U74VKBNlhAK2bW', NULL, '2022-10-10 21:51:17', '2022-10-10 21:51:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desks`
--
ALTER TABLE `desks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_category_id_foreign` (`category_id`);

--
-- Indexes for table `menu_stacks`
--
ALTER TABLE `menu_stacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_stacks_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `stacks`
--
ALTER TABLE `stacks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stacks_desk_id_unique` (`desk_id`),
  ADD KEY `stacks_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `desks`
--
ALTER TABLE `desks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu_stacks`
--
ALTER TABLE `menu_stacks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stacks`
--
ALTER TABLE `stacks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `menu_stacks`
--
ALTER TABLE `menu_stacks`
  ADD CONSTRAINT `menu_stacks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stacks`
--
ALTER TABLE `stacks`
  ADD CONSTRAINT `stacks_desk_id_foreign` FOREIGN KEY (`desk_id`) REFERENCES `desks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stacks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
