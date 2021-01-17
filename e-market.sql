-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 11:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-market`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`) VALUES
(8, 'web', NULL, 'web', '2020-09-22 23:41:14', '2020-09-22 23:41:14'),
(9, 'Laravel', 8, 'php', '2020-09-22 23:41:21', '2021-01-17 03:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activate_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone_number`, `activate_token`, `status`, `created_at`, `updated_at`) VALUES
(8, 'test with email 3', 'indonesiakartun2@gmail.com', '$2y$10$XxzgvD9XrAKviR/YzfiGYOyNHQIrpbX6KTw8m8f5537hhGksfKEXG', '099999999996', NULL, 1, '2020-09-25 01:43:18', '2020-09-26 23:15:30'),
(12, 'mikrotik', 'ikimikrotik@gmail.com', '$2y$10$dF4xUAfZ4XNX8kCzG/yvpebgBON65qt00J5mNSDSM5xJq4KAUui/e', '089988887777', 'DXTMY8ZK0G5qrscV1PnT8C9mlQudEr', 0, '2021-01-17 02:05:39', '2021-01-17 02:05:39'),
(13, 'temp mail', 'cogeke3813@vy89.com', '$2y$10$N7IZCQGWwm87RRZ7GBUFdO3W.0APnF0zKFgFcZuQ6q5YtM5/lmQvq', '081233334444', 'ovzfKBbnRqu1NjHUN56cMM39RCJh7H', 0, '2021-01-17 02:11:13', '2021-01-17 02:11:13'),
(14, 'test', 'test@gmail.com', '$2y$10$ILX59oXuJJRqhO8qGTf3BOOYeMz8LKypkCnVa5NndtefFyebb6J6q', '099999999995', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_22_024945_create_categories_table', 1),
(5, '2020_09_22_025019_create_products_table', 1),
(6, '2020_09_22_025032_create_customers_table', 1),
(7, '2020_09_22_025124_create_orders_table', 1),
(8, '2020_09_22_025132_create_order_details_table', 1),
(9, '2020_09_22_060609_add_field_status_to_products_table', 2),
(10, '2020_09_22_143025_create_jobs_table', 3),
(11, '2020_09_24_071603_add_field_password_to_customers_table', 4),
(12, '2020_09_24_083620_drop_field_address_from_customers_table', 5),
(13, '2020_09_24_083758_drop_field_address_from_orders_table', 5),
(14, '2020_09_26_082524_add_field_status_to_orders_table', 6),
(15, '2020_09_26_151557_create_payments_table', 7),
(16, '2020_09_27_143942_drop_coloumnstatus_to_orders_table', 8),
(17, '2020_09_27_144135_add_field_status2_to_orders_table', 9),
(18, '2020_09_27_151324_add_field_ref_to_orders_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: new, 1: confirm, 2: done',
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice`, `customer_id`, `customer_name`, `customer_phone`, `subtotal`, `status`, `ref`, `ref_status`, `created_at`, `updated_at`) VALUES
(11, 'NDRN-1601217887', '8', 'test with email 3', '099999999996', 10000, '2', NULL, 0, '2020-09-27 07:44:47', '2020-09-27 07:47:13'),
(14, '6P8h-1601303607', '8', '', '', 38400, '0', NULL, 0, '2020-09-28 07:33:27', '2020-09-28 07:33:27'),
(15, 'iHdH-1601303754', '11', '', '', 89300, '0', NULL, 0, '2020-09-28 07:35:54', '2020-09-28 07:35:54'),
(16, 'tOK3-1601305220', '11', '', '', 38400, '2', '8-12', 0, '2020-09-28 08:00:20', '2020-09-28 08:04:27'),
(17, 'wQ3q-1610874339', '12', '', '', 38400, '0', NULL, 0, '2021-01-17 02:05:39', '2021-01-17 02:05:39'),
(18, 'IFnJ-1610874673', '13', '', '', 38400, '0', NULL, 0, '2021-01-17 02:11:13', '2021-01-17 02:11:13'),
(19, 'A6e1-1610878997', '14', '', '', 750000, '0', NULL, 0, '2021-01-17 03:23:17', '2021-01-17 03:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `created_at`, `updated_at`) VALUES
(17, 11, 13, 10000, '2020-09-27 07:44:47', '2020-09-27 07:44:47'),
(21, 14, 12, 38400, '2020-09-28 07:33:27', '2020-09-28 07:33:27'),
(22, 15, 11, 89300, '2020-09-28 07:35:54', '2020-09-28 07:35:54'),
(23, 16, 12, 38400, '2020-09-28 08:00:20', '2020-09-28 08:00:20'),
(24, 17, 12, 38400, '2021-01-17 02:05:39', '2021-01-17 02:05:39'),
(25, 18, 12, 38400, '2021-01-17 02:11:13', '2021-01-17 02:11:13'),
(26, 19, 11, 750000, '2021-01-17 03:23:17', '2021-01-17 03:23:17');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `name`, `transfer_to`, `transfer_date`, `amount`, `proof`, `status`, `created_at`, `updated_at`) VALUES
(2, 11, 'Hakim', 'Mandiri - 2345678', '2020-09-27', 10000, '1601217942.png', 1, '2020-09-27 07:45:42', '2020-09-27 07:47:13'),
(3, 16, 'Hakim', 'BCA - 1234567', '2020-09-28', 38400, '1601305393.png', 1, '2020-09-28 08:03:14', '2020-09-28 08:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `description`, `image`, `price`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Pemrograman Web dengan Laravel', 'original-treebread-jaket-pria-sweater-pria-jaket-hoodie', 9, 'Tool/Aplikasi :\r\n– Web Server & DBMS (XAMPP, MAMPP, WAMPP, dsb)\r\n– Text Editor (VS Code, Sublime, PHP Storm, Web Storm)\r\n– Composer\r\n– NodeJs\r\n\r\nPersyaratan :\r\n– Basic pemrograman Web Statis maupun Dinamis\r\n– Spesifikasi PC/Laptop Minimal 2GB RAM & =>1.6 GHz Processor\r\n\r\nOutput :\r\n– Peserta memahami konsep arsitektur Website menggunakan MVC\r\n– Mampu membuat wesite dinamis menggunakan Laravel\r\n\r\n* Stock barang unlimited\r\n\r\n\r\nGratis ongkir seluruh wilayah Indonesia dengan menggunakan kurir J&amp;amp;T expres (sesuai dengan ketentuan bukalapak)\r\n\r\nSyarat dan ketentuan :\r\n\r\nGratis ongkir max 15rb dengan minimal belanja 75rb pakai kode KIRIMJT\r\n\r\n\r\nGratis ongkir max 15rb dengan minimal belanja 40rb pakai kode ONGKIRDANA (khusus pembayaran menggunakan metode buka DANA)\r\n\r\n\r\nORIGINAL TREEBREAD Jaket Pria Sweater Pria Jaket Hoodie Jaket Premium\r\n\r\nBonus Gantungan treebeard dan stiker\r\n\r\nCek keterangan produk sebelum order.\r\n\r\n--&gt; Barang di jamin sesuai dengan contoh foto produk (real pict/foto asli)\r\n\r\n--&gt; Jaket pria premium terbuat dari bahan catton flecee (lembut tidak tidak cepat berbulu)\r\n\r\n--&gt; Pilihan ukuran : L dan XL\r\n\r\n*detail ukuran :\r\n\r\nSize L (Lebar 52cm - Panjang 62cm)\r\n\r\nSize XL (Lebar 54cm - Panjang 64cm)\r\n\r\n*Toleransi apabila ukuran berbeda skitar 2cm\r\n\r\n--&gt; Warna jaket pria polos : Navy full\r\n\r\nUntuk order pilihan ukuran cantumkan di catatan order ya :)\r\n\r\n*Cek kontak CS kami di profil toko.', '1610878264pemrograman-web-dengan-laravel.jpg', 750000, 1, '2020-09-23 00:39:23', '2021-01-17 03:11:04'),
(12, 'Laravel – Pengenalan Laravel untuk Pemula', 'sweater-pria-rajut-tribal-orlando-sweater-rajut-pria', 9, 'Kita sudah tidak asing lagi dengan framework, bagian sebagian developer web pasti sangat sering menggunakan framework. Salah satu framework yang kini sendang banyak digunakan yakni Laravel.\r\n\r\nLaravel merupakan sebuah framework atau kerangka kerja PHP website yang kini telah diminati oleh para developer web. Serupa dengan codeigniter, laravel memiliki tujuan yang sama, yakni memudahkan developer atau programmer dalam pembangunan sistem/aplikasi yang berukuran kecil bahkan hingga yang berskala besar.\r\n\r\nPada pelatihan ini, kita akan berkenalan dengan framework laravel. So, kalau kalian ingin mengikuti dan belajar bersama-sama, ayooo daftar.', '1610878437laravel-pengenalan-laravel-untuk-pemula.jpg', 180000, 1, '2020-09-23 00:39:24', '2021-01-17 03:13:57'),
(13, 'Membangun Aplikasi Website dengan Laravel', 'barang-1', 9, 'Overview materi yang akan diajarkan meliputi;\r\n\r\nPengenalan Laravel\r\nFundamental Laravel\r\nInsert Bootstrap pada Laravel\r\nInsert dan CRUD pada Laravel\r\nRelasi pada Laravel\r\nUpload image pada Laravel', '1610878572membangun-aplikasi-website-dengan-laravel.jpg', 50000, 1, '2020-09-25 07:43:15', '2021-01-17 03:16:12');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.id', NULL, '$2y$10$y4pNj54hBcBwoZpRq3Mr9uj04U92zbGbi92g.XvTbVY7HEiz0FBCS', NULL, '2020-09-21 20:51:48', '2020-09-21 20:51:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_invoice_unique` (`invoice`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
