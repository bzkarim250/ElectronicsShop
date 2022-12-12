-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2022 at 08:06 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ElectronicsShop`
--

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
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2022_10_27_204541_create_suppliers_table', 1),
(13, '2022_11_10_112017_create_permission_tables', 1),
(14, '2022_11_10_160010_create_users_table', 1),
(15, '2022_11_10_171307_create_products_table', 1),
(16, '2022_11_19_091957_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(4, 'App\\Models\\User', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `client_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'approve supplier', 'web', '2022-12-05 09:32:25', '2022-12-05 09:32:25'),
(2, 'reject supplier', 'web', '2022-12-05 09:32:25', '2022-12-05 09:32:25'),
(3, 'delete supplier', 'web', '2022-12-05 09:32:25', '2022-12-05 09:32:25'),
(4, 'create supplier', 'web', '2022-12-05 09:32:25', '2022-12-05 09:32:25'),
(5, 'create product', 'web', '2022-12-05 09:32:25', '2022-12-05 09:32:25'),
(6, 'update product', 'web', '2022-12-05 09:32:25', '2022-12-05 09:32:25'),
(7, 'edit product', 'web', '2022-12-05 09:32:26', '2022-12-05 09:32:26'),
(8, 'delete product', 'web', '2022-12-05 09:32:26', '2022-12-05 09:32:26');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`image`)),
  `color` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`color`)),
  `size` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`size`)),
  `categories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`categories`)),
  `price` decimal(13,2) NOT NULL,
  `inStock` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `color`, `size`, `categories`, `price`, `inStock`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'Lenovo', 'Brand New Lenovo i9, 500GB ssd, processor 3ghz and free delivery', '[\"https:\\/\\/res.cloudinary.com\\/dzg8uxfxl\\/image\\/upload\\/v1670260433\\/vnobqvchayk1gzkljady.png\"]', '\"black\"', '\"500 GB SSd\"', '\"laptop\"', '800.00', 1, 11, '2022-12-05 15:13:54', '2022-12-05 15:13:54'),
(7, 'HP Elite Book', 'Brand New HP  i9,\r\n256GB ssd, processor 3ghz and free delivery', '[\"https:\\/\\/res.cloudinary.com\\/dzg8uxfxl\\/image\\/upload\\/v1670260804\\/ikwkqa6qpxc1lih1vjex.png\"]', '\"black\"', '\"128\"', '\"laptop\"', '500.00', 1, 11, '2022-12-05 15:20:05', '2022-12-05 15:20:05'),
(8, 'Samsung S7', 'light phone with 8gb Ram and the internal storage of 128gb,64gb,32gb and with the lower price tho the first 10 clients', '[\"https:\\/\\/res.cloudinary.com\\/dzg8uxfxl\\/image\\/upload\\/v1670261424\\/o5vkzffcfuagof7itqo4.png\"]', '\"white\"', '\"128\"', '\"phone\"', '200.00', 1, 11, '2022-12-05 15:30:26', '2022-12-05 15:30:26'),
(9, 'Nikon 23', 'Nikon Camera with high quality images and the resolution and with the flash light during darkness with low price and the promotion', '[\"https:\\/\\/res.cloudinary.com\\/dzg8uxfxl\\/image\\/upload\\/v1670261577\\/bjnokcvajv1hpql6ragj.png\"]', '\"white\"', '\"5\"', '\"camera\"', '300.00', 1, 11, '2022-12-05 15:32:57', '2022-12-05 15:32:57'),
(10, 'Head Phones', 'Best qualty headphones with equalized sound system and warmth when hearing, they flexible and portable every place you go', '[\"https:\\/\\/res.cloudinary.com\\/dzg8uxfxl\\/image\\/upload\\/v1670261745\\/heuixlhxutrcf6rjddps.png\"]', '\"black\"', '\"12\"', '\"head phones\"', '80.00', 1, 11, '2022-12-05 15:35:45', '2022-12-05 15:35:45'),
(11, 'Msi laptop', 'the most Gaming machine you ever heard, high processing power , small size and flexible and good sound system', '[\"https:\\/\\/res.cloudinary.com\\/dzg8uxfxl\\/image\\/upload\\/v1670262049\\/rlz1u6cigddyeedxjnpc.png\"]', '\"black\"', '\"500\"', '\"laptop\"', '800.00', 1, 11, '2022-12-05 15:40:50', '2022-12-05 15:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2022-12-05 09:32:26', '2022-12-05 09:32:26'),
(2, 'admin', 'web', '2022-12-05 09:32:26', '2022-12-05 09:32:26'),
(3, 'supplier', 'web', '2022-12-05 09:32:27', '2022-12-05 09:32:27'),
(4, 'customer', 'web', '2022-12-05 09:32:27', '2022-12-05 09:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` bigint(20) NOT NULL,
  `id_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_card` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `password`, `phone`, `description`, `id_number`, `id_image`, `profile_image`, `payment_card`, `created_at`, `updated_at`) VALUES
(5, 'Test User', 'test12345@gmail.com', '$2y$10$IGFSw1qNPltCB4hS5UcQje7ikxsUkjwVYs6cKG2jx/v4MtMp.eZHy', 123, 'iPhone Dealer', 1234, 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670242453/lj34ps9eoqymbacxzxue.png', 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670242458/nx7wvbwb6jzfxnxrs2wr.png', 1234, '2022-12-05 10:14:19', '2022-12-05 10:14:19'),
(6, 'Tro', 'troph@gmail.com', '$2y$10$uT2AB.emAGS8wI82x1OgzeRv5ZvM.hrxaozqhECQNUPSHmI4vIFAG', 123, 'iPhone Dealer', 1234, 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670242730/rcgtzmnwmptmsyy5g6xt.png', 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670242734/la81phsgrt16tny4u4td.png', 1234, '2022-12-05 10:18:54', '2022-12-05 10:18:54'),
(7, 'bz', 'bzkarim250@gmail.com', '$2y$10$0m3zN.WZJPxYOVWD4o8vbuxmmiG3y2XN1d9wOkilx/45D1GHDb8jm', 123, 'iPhone Dealer', 1234, 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670256520/umrwadvnkfnvtjqimi9v.png', 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670256529/gajzwwlnzpmdecm2lcjf.png', 1234, '2022-12-05 14:08:49', '2022-12-05 14:08:49'),
(8, 'Abdoulkalim Bazambanza', 'bzkarim250@gmail.com', '$2y$10$96h/AiowVbbkNbwFvMVtHOy7kn34d9mYYqdNF11a6Igx04QIhQR3u', 123, 'iPhone Dealer', 1234, 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670258648/itingtiamvzwofwxkcma.png', 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670258652/gzevnksv6m6uo6tkcerz.png', 1234, '2022-12-05 14:44:14', '2022-12-05 14:44:14'),
(9, 'superadmin', 'supper@gmail.com', '$2y$10$p6mRYqrEFoOPvERF2ejT1eowp5GmHxQGzrCkjFTVgSBUr1xke0UgW', 123, 'iPhone Dealer', 1234, 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670259024/yecmw4wg5ffgfxxh2i7t.png', 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670259030/pxkxgdqe4caggtxo18qm.png', 1234, '2022-12-05 14:50:31', '2022-12-05 14:50:31'),
(10, 'admin', 'admin@gmail.com', '$2y$10$F0ySGXGuaIyt11l4HFqPn.ZubYdCVE2MiuwO8BP13nZvxv1i5p/Rm', 123, 'iPhone Dealer', 1234, 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670259150/oaipit96dh7mhtymxz07.png', 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670259153/dlswdxhocui28wv4fkfn.png', 1234, '2022-12-05 14:52:34', '2022-12-05 14:52:34'),
(11, 'sostene', 'sostene@gmail.com', '$2y$10$EOtSYR0wZ98iMVyhSGhPG.oupzFzKRsFeoNKUM6no8eWqun7X1Us.', 12345, 'Brand New Samsung', 1234, 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670259258/qprugf0vmenimrvwd6bf.png', 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670259262/gqneofmrfst5jpn2opb8.png', 1234, '2022-12-05 14:54:24', '2022-12-05 14:54:24'),
(12, 'Supplier', 'supplier@gmail.com', '$2y$10$1Bkw8z8JoMgmT4WT/SqtWeJN8H3qsqjRrsKZuArurdooEdhSzCoLS', 123, 'iPhone Dealer', 1234, 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670259947/sbghqodaygpwkz7bedwr.png', 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670259952/mlm3qvqchgesxlso23g3.png', 1234, '2022-12-05 15:05:53', '2022-12-05 15:05:53'),
(13, 'supplier 2', 'supper2@gmail.com', '$2y$10$6amTSY9ffCCbMkuPOB9vQuBFJqXOBmo3hwZXrJ6D1dBUfTNfdWlLO', 123, 'iPhone Dealer', 1234, 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670260011/dqfsb5z8yexnwy7otk1k.png', 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670260013/ftygpo7x34jjpppkpxhe.png', 1234, '2022-12-05 15:06:54', '2022-12-05 15:06:54'),
(14, 'supplier 2', 'supplier2@gmail.com', '$2y$10$ASXK6qJSILqZnHr3G/1hBO49lk13qcqN/uFfGN8hDLD7e48wx1PZe', 123, 'df', 1234, 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670260086/f6clmdjhhxt9ozpalr93.png', 'https://res.cloudinary.com/dzg8uxfxl/image/upload/v1670260097/zfnbwxjblkldabg3q6lr.png', 1234, '2022-12-05 15:08:19', '2022-12-05 15:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(7, 'Abdoulkalim Bazambanza', 'bzkarim250@gmail.com', NULL, '$2y$10$96h/AiowVbbkNbwFvMVtHOy7kn34d9mYYqdNF11a6Igx04QIhQR3u', 1, '2022-12-05 14:48:31', '2022-12-05 14:48:31'),
(8, 'superadmin', 'supper@gmail.com', NULL, '$2y$10$p6mRYqrEFoOPvERF2ejT1eowp5GmHxQGzrCkjFTVgSBUr1xke0UgW', 1, '2022-12-05 14:51:04', '2022-12-05 14:51:04'),
(9, 'admin', 'admin@gmail.com', NULL, '$2y$10$F0ySGXGuaIyt11l4HFqPn.ZubYdCVE2MiuwO8BP13nZvxv1i5p/Rm', 2, '2022-12-05 14:53:02', '2022-12-05 14:53:02'),
(10, 'sostene', 'sostene@gmail.com', NULL, '$2y$10$EOtSYR0wZ98iMVyhSGhPG.oupzFzKRsFeoNKUM6no8eWqun7X1Us.', 2, '2022-12-05 14:54:55', '2022-12-05 14:54:55'),
(11, 'Supplier', 'supplier@gmail.com', NULL, '$2y$10$1Bkw8z8JoMgmT4WT/SqtWeJN8H3qsqjRrsKZuArurdooEdhSzCoLS', 3, '2022-12-05 15:09:06', '2022-12-05 15:09:06'),
(12, 'supplier 2', 'supper2@gmail.com', NULL, '$2y$10$6amTSY9ffCCbMkuPOB9vQuBFJqXOBmo3hwZXrJ6D1dBUfTNfdWlLO', 3, '2022-12-05 15:09:15', '2022-12-05 15:09:15'),
(13, 'Khaleb', 'khaleb@gmail.com', NULL, '$2y$10$.aeXg3ExLR8PzMbMELYTbuGEAQIjllL1AQRVpwSjNHKNFu6hLudBK', 1, '2022-12-05 15:58:05', '2022-12-05 15:58:05'),
(14, 'Client', 'client@gmail.com', NULL, '$2y$10$i6SmKRss5Wyf0QBoiF7nhOUloFTHI8lC8uGUAOO1cdu9dcz0KdBKu', 4, '2022-12-12 16:17:08', '2022-12-12 16:17:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_client_id_foreign` (`client_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

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
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
