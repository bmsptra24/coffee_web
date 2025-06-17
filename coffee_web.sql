-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2025 at 05:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Bima Saputra', 'bimasaputra89@gmail.com', 'Saya mau bekerja sama sebagai pemasok kopi. Jika berminat hubungi 081732612378.', '2025-06-17 22:19:29', '2025-06-17 22:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`, `price`, `image`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Espresso Klasik', 'Espresso murni dari biji Arabika pilihan.', 25000.00, 'assets/img/menus/1750172765_31c8f9bc75ac3bb5d753.webp', 0, '2025-06-17 22:01:12', '2025-06-17 22:06:32'),
(2, 'Latte Art Spesial', 'Latte creamy dengan seni latte yang indah.', 35000.00, 'assets/img/menus/1750172720_de9792ea36675ef2a74b.webp', 1, '2025-06-17 22:01:12', '2025-06-17 22:05:20'),
(3, 'Cappuccino Favorit', 'Campuran sempurna espresso, susu, dan busa.', 32000.00, 'assets/img/menus/1750172787_f5cf720a8239d7697b43.jpg', 1, '2025-06-17 22:01:12', '2025-06-17 22:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(5, '2025-06-17-095708', 'App\\Database\\Migrations\\CreateTables', 'default', 'App', 1750172453, 1),
(6, '2025-06-17-135106', 'App\\Database\\Migrations\\AddStatusToReviews', 'default', 'App', 1750172453, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Promo Kopi Senin', 'Diskon 20% untuk semua jenis kopi setiap hari Senin!', 'assets/img/promos/1750172703_f1d098480e19dbd96bee.jpg', '2025-06-17 22:01:12', '2025-06-17 22:05:03'),
(2, 'Gratis Roti Bakar', 'Dapatkan gratis roti bakar setiap pembelian 2 minuman apapun.', 'assets/img/promos/1750172678_51208993b016a3abd995.jpg', '2025-06-17 22:01:12', '2025-06-17 22:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) UNSIGNED NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` enum('pending','approved') DEFAULT 'approved',
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `author`, `content`, `status`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 'Ani Susanti', 'Kopi di sini sangat enak dan tempatnya nyaman sekali! Sangat direkomendasikan.', 'pending', 1, '2025-06-17 22:01:12', '2025-06-17 22:38:13'),
(2, 'Budi Cahyono', 'Pelayanan ramah, suasana asik, dan menu makanan ringannya juga pas untuk teman ngopi.', 'approved', 1, '2025-06-17 22:01:12', '2025-06-17 22:38:36'),
(3, 'Citra Dewi', 'Sering nongkrong di sini, kopi favorit saya adalah Caramel Macchiato-nya. Mantap!', 'pending', 1, '2025-06-17 22:01:12', '2025-06-17 22:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'about_us', 'Selamat datang di Coffe Kita! Kami menawarkan kopi berkualitas tinggi dari biji pilihan.', '2025-06-17 22:01:12', '2025-06-17 22:09:59'),
(2, 'location_address', 'Jl. Demang Lebar Daun, No. 112', '2025-06-17 22:01:12', '2025-06-17 22:09:59'),
(3, 'location_map_embed', '<iframe \r\n  src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3970.7715026562045!2d104.72446826711882!3d-2.983268711083647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v<?= time() ?>\" \r\n  width=\"600\" \r\n  height=\"450\" \r\n  style=\"border:0;\" \r\n  allowfullscreen=\"\" \r\n  loading=\"lazy\" \r\n  referrerpolicy=\"no-referrer-when-downgrade\">\r\n</iframe>\r\n', '2025-06-17 22:01:12', '2025-06-17 22:09:59'),
(4, 'opening_hours', 'Senin - Jumat: 08:00 - 22:00, Sabtu - Minggu: 09:00 - 23:00', '2025-06-17 22:01:12', '2025-06-17 22:09:59'),
(5, 'hero_image', 'assets/img/hero/1750172840_67bc5da0d36aac6273f4.avif', '2025-06-17 22:04:12', '2025-06-17 22:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$ryFV2Qg04/mMp4al1soPYOqvZX.JEBF8wItDT9aU3m8aKUXslypLW', '2025-06-17 22:01:12', '2025-06-17 22:01:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
