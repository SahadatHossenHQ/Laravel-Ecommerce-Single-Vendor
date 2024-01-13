-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2024 at 09:43 AM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lems`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `category_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(3, 6, 'Ram & Rom', 'ram-rom', '2022-03-11 12:02:06', '2022-04-04 11:55:42'),
(13, 19, 'Size', 'size-8151', '2022-04-17 14:51:38', '2023-08-24 03:02:19'),
(15, 2, 'Size', 'size-6064', '2022-04-17 14:54:54', '2022-04-17 14:55:41'),
(16, 6, 'bond', 'bond-5023', '2022-05-07 12:32:20', '2022-05-07 12:32:20'),
(17, 7, 'Furniture', 'furniture-8053', '2023-04-05 10:26:32', '2023-04-05 10:26:32'),
(18, 1, 'Size', 'size-5619', '2023-05-07 10:09:17', '2023-05-07 10:09:17'),
(25, 18, 'Service Type', 'service-type-4987', '2023-08-24 03:19:26', '2023-08-24 03:20:55'),
(26, 18, 'Android Version', 'android-version-6738', '2023-08-24 03:26:07', '2023-08-24 03:26:07'),
(27, 21, 'Quantity', 'quantity-2797', '2023-08-26 11:23:27', '2023-08-26 11:23:27'),
(30, 21, 'Duration', 'duration-1807', '2023-08-30 04:54:22', '2023-08-30 04:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_product`
--

CREATE TABLE `attribute_product` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_value_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `qnty` bigint DEFAULT NULL,
  `price` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_product`
--

INSERT INTO `attribute_product` (`id`, `attribute_value_id`, `product_id`, `qnty`, `price`, `created_at`, `updated_at`) VALUES
(74, 86, 686, NULL, NULL, NULL, NULL),
(75, 87, 686, 0, 0, NULL, NULL),
(76, 88, 686, NULL, NULL, NULL, NULL),
(77, 89, 686, 100, NULL, NULL, NULL),
(78, 90, 686, 200, NULL, NULL, NULL),
(80, 86, 689, 10, 90, NULL, NULL),
(81, 87, 689, 1, 1, NULL, NULL),
(82, 91, 693, NULL, 90, NULL, NULL),
(83, 92, 693, NULL, 240, NULL, NULL),
(84, 93, 693, NULL, 490, NULL, NULL),
(93, 86, 701, NULL, NULL, NULL, NULL),
(94, 87, 701, NULL, NULL, NULL, NULL),
(95, 108, 701, NULL, NULL, NULL, NULL),
(96, 109, 685, NULL, NULL, NULL, NULL),
(98, 112, 685, NULL, 300, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint UNSIGNED NOT NULL,
  `attributes_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attributes_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(7, 3, '2GB-16GB', '2gb-16gb', '2022-03-11 12:03:02', '2022-04-04 11:56:33'),
(8, 3, '2GB-32GB', '2gb-32gb', '2022-03-11 12:03:41', '2022-04-04 11:57:00'),
(9, 3, '3GB-16GB', '3gb-16gb', '2022-03-11 12:03:48', '2022-04-04 12:01:31'),
(10, 3, '3GB-32GB', '3gb-32gb', '2022-03-11 12:03:58', '2022-04-04 12:02:03'),
(11, 3, '3GB-64GB', '3gb-64gb', '2022-03-11 12:04:06', '2022-04-04 12:02:26'),
(12, 3, '4GB-32GB', '4gb-32gb', '2022-03-11 12:04:22', '2022-04-04 12:02:52'),
(13, 3, '4GB-64GB', '4gb-64gb', '2022-04-04 12:03:20', '2022-04-04 12:03:20'),
(14, 3, '4GB-128GB', '4gb-128gb', '2022-04-04 12:03:51', '2022-04-04 12:03:51'),
(15, 3, '6Gb-64Gb', '6gb-64gb', '2022-04-04 12:04:17', '2022-04-04 12:04:17'),
(16, 3, '6Gb-128Gb', '6gb-128gb', '2022-04-04 12:04:59', '2022-04-04 12:04:59'),
(17, 3, '6Gb-256Gb', '6gb-256gb', '2022-04-04 12:05:25', '2022-04-04 12:05:25'),
(18, 3, '8Gb-64Gb', '8gb-64gb', '2022-04-04 12:05:56', '2022-04-04 12:05:56'),
(19, 3, '8Gb-128Gb', '8gb-128gb', '2022-04-04 12:06:09', '2022-04-04 12:06:09'),
(20, 3, '8Gb-256Gb', '8gb-256gb', '2022-04-04 12:06:21', '2022-04-04 12:06:21'),
(21, 3, '512Mb', '512mb', '2022-04-04 12:20:17', '2022-04-04 12:20:17'),
(22, 3, '1Gb', '1gb', '2022-04-04 12:20:22', '2022-04-04 12:20:22'),
(23, 3, '2Gb', '2gb', '2022-04-04 12:20:41', '2022-04-04 12:20:41'),
(24, 3, '3Gb', '3gb', '2022-04-04 12:20:48', '2022-04-04 12:20:48'),
(25, 3, '4Gb', '4gb', '2022-04-04 12:20:54', '2022-04-04 12:20:54'),
(26, 3, '6Gb', '6gb', '2022-04-04 12:21:00', '2022-04-04 12:21:00'),
(36, 13, 'L', 'l', '2022-04-17 14:57:19', '2022-04-17 14:57:19'),
(37, 13, 'M', 'm', '2022-04-17 14:57:28', '2022-04-17 14:57:28'),
(38, 13, 'Xl', 'xl', '2022-04-17 14:57:38', '2022-04-17 14:57:38'),
(39, 13, 'XXL', 'xxl', '2022-04-17 14:57:44', '2022-04-17 14:57:44'),
(40, 16, '12', '12-7833', '2022-05-07 12:32:47', '2022-05-07 12:32:47'),
(41, 13, 'S', 's-6548', '2023-04-27 10:39:44', '2023-04-27 10:39:44'),
(42, 13, '36', '36_2064', '2023-05-07 06:55:50', '2023-05-07 06:55:50'),
(43, 13, '38', '38-4556', '2023-05-07 06:55:54', '2023-05-07 06:55:54'),
(44, 13, '40', '40-3788', '2023-05-07 06:55:58', '2023-05-07 06:55:58'),
(45, 13, '42', '42-1158', '2023-05-07 06:56:04', '2023-05-07 06:56:04'),
(46, 13, '44', '44-1085', '2023-05-07 06:56:08', '2023-05-07 06:56:08'),
(47, 18, '38', '38-4067', '2023-05-07 10:10:03', '2023-05-07 10:10:03'),
(48, 18, '40', '40-8408', '2023-05-07 10:10:08', '2023-05-07 10:10:08'),
(49, 18, '42', '42-4001', '2023-05-07 10:10:13', '2023-05-07 10:10:13'),
(50, 18, '44', '44-5051', '2023-05-07 10:10:16', '2023-05-07 10:10:16'),
(51, 18, 'S', 's-6388', '2023-05-07 10:10:20', '2023-05-07 10:10:20'),
(53, 15, '32', '32-6576', '2023-05-08 05:56:54', '2023-05-08 05:56:54'),
(54, 15, '34', '34-9797', '2023-05-08 05:56:58', '2023-05-08 05:56:58'),
(55, 15, '36', '36-3807', '2023-05-08 05:57:02', '2023-05-08 05:57:02'),
(56, 15, '38', '38-1511', '2023-05-08 05:57:08', '2023-05-08 05:57:08'),
(57, 15, '40', '40-5178', '2023-05-08 05:57:14', '2023-05-08 05:57:14'),
(58, 15, '42', '42-2901', '2023-05-08 05:57:20', '2023-05-08 05:57:20'),
(59, 15, '44', '44-9244', '2023-05-08 05:57:25', '2023-05-08 05:57:25'),
(60, 15, 'S', 's-8907', '2023-05-08 05:57:31', '2023-05-08 05:57:31'),
(62, 18, 'M', 'm-9086', '2023-05-11 18:21:53', '2023-05-11 18:21:53'),
(63, 18, 'L', 'l-4296', '2023-05-11 18:22:04', '2023-05-11 18:22:04'),
(64, 18, 'XL', 'xl-4349', '2023-05-11 18:22:11', '2023-05-11 18:22:11'),
(65, 18, 'XXL', 'xxl-8243', '2023-05-11 18:22:17', '2023-05-11 18:22:17'),
(66, 18, '3XL', '3xl-8154', '2023-05-11 18:22:25', '2023-05-11 18:22:25'),
(67, 15, 'L', 'l-2697', '2023-05-11 18:23:03', '2023-05-11 18:23:03'),
(68, 15, 'M', 'm-4613', '2023-05-11 18:23:19', '2023-05-11 18:23:19'),
(69, 15, 'XL', 'xl-7850', '2023-05-11 18:23:28', '2023-05-11 18:23:28'),
(71, 15, 'XXL', 'xxl-1417', '2023-05-11 18:23:57', '2023-05-11 18:23:57'),
(72, 15, '3XL', '3xl-3647', '2023-05-11 18:24:12', '2023-05-11 18:24:12'),
(86, 25, 'Root', 'root-3247', '2023-08-24 03:21:09', '2023-08-24 03:21:09'),
(87, 25, 'Flash', 'flash-6216', '2023-08-24 03:21:13', '2023-08-24 03:21:13'),
(88, 26, '10', '10-3562', '2023-08-24 03:27:11', '2023-08-24 03:27:11'),
(89, 26, '11', '11-3233', '2023-08-24 03:27:14', '2023-08-24 03:27:14'),
(90, 26, '12', '12-7384', '2023-08-24 03:27:17', '2023-08-24 03:27:17'),
(91, 27, '10', '10-3854', '2023-08-26 11:23:40', '2023-08-26 11:23:40'),
(92, 27, '25', '25-2293', '2023-08-26 11:23:46', '2023-08-26 11:23:46'),
(93, 27, '50', '50-9118', '2023-08-26 11:23:50', '2023-08-26 11:23:50'),
(108, 26, '9', '9-6242', '2023-08-29 04:09:38', '2023-08-29 04:09:38'),
(109, 30, '1 Month', '1-month-6456', '2023-08-30 04:54:35', '2023-08-30 04:54:35'),
(110, 30, '2 Month', '2-month', '2023-08-30 04:54:42', '2023-08-30 05:16:56'),
(111, 30, '3 Month', '3-month-1396', '2023-08-30 05:17:02', '2023-08-30 05:17:02'),
(112, 30, '4 Month', '4-month-2114', '2023-08-30 05:17:09', '2023-08-30 05:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bloods`
--

CREATE TABLE `bloods` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `description`, `cover_photo`, `created_at`, `updated_at`) VALUES
(41, 'IFAD', 'ifad', 1, NULL, '2022-04-14-62581b5ae553a.png', '2021-06-23 06:16:04', '2022-04-14 07:02:18'),
(42, 'TEER', 'teer', 1, NULL, '2022-04-14-62581b89961a0.png', '2021-06-23 06:16:17', '2022-04-14 07:03:05'),
(43, 'ACI', 'aci', 1, NULL, '2022-04-14-62581bb8edad3.png', '2021-06-23 06:17:13', '2022-04-14 07:03:52'),
(44, 'Rupchanda', 'rupchanda', 1, NULL, '2022-04-14-62581bcab1585.jpg', '2021-06-23 06:18:04', '2022-04-14 07:04:10'),
(45, 'Fresh', 'fresh', 1, NULL, '2022-04-14-62581bdc59684.png', '2021-06-23 06:18:39', '2022-04-14 07:04:28'),
(46, 'Radhuni', 'radhuni', 1, NULL, '2022-04-14-62581bfe2327b.jpg', '2021-06-23 06:19:15', '2022-04-14 07:05:02'),
(47, 'TANIN BESTWARE', 'tanin-bestware', 1, NULL, '2022-04-14-62581c0d2f3d0.png', '2021-06-23 06:22:58', '2022-04-17 13:06:53'),
(48, 'Royel', 'royel', 0, NULL, 'default.png', '2021-06-23 06:23:45', '2022-04-20 05:10:30'),
(49, 'Canon', 'Canon-K9NPX', 1, '', 'default.png', '2021-06-23 06:24:11', '2021-06-23 06:24:11'),
(50, 'Bata', 'Bata-msumK', 1, '', 'default.png', '2021-06-23 06:25:25', '2021-06-23 06:25:25'),
(51, 'Square', 'Square-2KijL', 1, '', 'default.png', '2021-06-23 06:26:06', '2021-06-23 06:26:06'),
(52, 'Sajeeb', 'Sajeeb-bEQSE', 1, '', 'default.png', '2021-06-23 06:27:04', '2021-06-23 06:27:04'),
(53, 'Oppo', 'Oppo-L2dtU', 1, '', 'default.png', '2021-06-23 06:27:29', '2021-06-23 06:27:29'),
(54, 'Nestle 4', 'nestle-4un1b', 1, '', 'default.png', '2021-06-23 06:28:00', '2021-07-08 13:08:59'),
(55, 'Miyako', 'Miyako-w1NnB', 1, '', 'default.png', '2021-06-23 06:28:29', '2021-06-23 06:28:29'),
(56, 'Walton', 'Walton-lokVl', 1, '', 'default.png', '2021-06-23 06:29:03', '2021-06-23 06:29:03'),
(57, 'Pran', 'Pran-W5rpV', 1, '', 'default.png', '2021-06-23 06:29:36', '2021-06-23 06:29:36'),
(58, 'Unilever', 'Unilever-ZiyJ4', 1, '', 'default.png', '2021-06-23 06:30:01', '2021-06-23 06:30:01'),
(59, 'Vivo', 'Vivo-z1fPr', 1, '', 'default.png', '2021-06-23 06:30:35', '2021-06-23 06:30:35'),
(61, 'Nokia', 'nokia', 1, NULL, 'default.png', '2021-06-23 06:32:03', '2022-04-17 13:05:22'),
(63, 'Xiaomi', 'Xiaomi-AFa0c', 1, '', 'default.png', '2021-06-23 06:33:05', '2021-06-23 06:33:05'),
(64, 'Apple', 'Apple-1EWDB', 1, '', 'default.png', '2021-06-23 06:33:36', '2021-06-23 06:33:36'),
(67, 'Similac', 'Similac-fxOsm', 1, '', 'default.png', '2021-07-05 01:57:23', '2021-07-05 01:57:23'),
(68, 'GSK', 'GSK-94L7R', 1, '', 'default.png', '2021-07-05 01:58:10', '2021-07-05 01:58:10'),
(69, 'Complan', 'Complan-roC2O', 1, '', 'default.png', '2021-07-05 01:58:56', '2021-07-05 01:58:56'),
(70, 'Johnson Baby', 'Johnson-Baby-Ntj32', 1, '', 'default.png', '2021-07-05 01:59:31', '2021-07-05 01:59:31'),
(71, 'Rikang', 'Rikang-pwwJY', 1, '', 'default.png', '2021-07-05 02:00:14', '2021-07-05 02:00:14'),
(72, 'Cow & Gate', 'Cow--Gate-IFbCL', 1, '', 'default.png', '2021-07-05 02:00:54', '2021-07-05 02:00:54'),
(73, 'Smart Care', 'Smart-Care-w7OKE', 1, '', 'default.png', '2021-07-05 02:01:23', '2021-07-05 02:01:23'),
(74, 'Molfix', 'Molfix-BvJTv', 1, '', 'default.png', '2021-07-05 02:01:52', '2021-07-05 02:01:52'),
(75, 'SMA Pro', 'SMA-Pro-zzLeD', 1, '', 'default.png', '2021-07-05 02:02:27', '2021-07-05 02:02:27'),
(76, 'Pur', 'Pur-zfCVe', 1, '', 'default.png', '2021-07-05 02:03:05', '2021-07-05 02:03:05'),
(78, 'Dano', 'Dano-yIa5G', 1, '', 'default.png', '2021-07-05 02:04:25', '2021-07-05 02:04:25'),
(79, 'Pampers', 'Pampers-ImdOx', 1, '', 'default.png', '2021-07-05 02:04:54', '2021-07-05 02:04:54'),
(80, 'MamyPoko', 'MamyPoko-tXbaB', 1, '', 'default.png', '2021-07-05 02:05:31', '2021-07-05 02:05:31'),
(81, 'Cadbury', 'Cadbury-Fphhe', 1, '', 'default.png', '2021-07-05 02:06:32', '2021-07-05 02:06:32'),
(82, 'Linco', 'Linco-MRq9g', 1, '', 'default.png', '2021-07-05 02:07:05', '2021-07-05 02:07:05'),
(83, 'Mother Care', 'Mother-Care-DCJSj', 1, '', 'default.png', '2021-07-05 02:07:34', '2021-07-05 02:07:34'),
(84, 'Baby Nutrition', 'Baby-Nutrition-yIkkX', 1, '', 'default.png', '2021-07-05 02:08:32', '2021-07-05 02:08:32'),
(85, 'Farlin', 'Farlin-SbcMB', 1, '', 'default.png', '2021-07-05 02:09:01', '2021-07-05 02:09:01'),
(86, 'Kodomo', 'Kodomo-sbcHd', 1, '', 'default.png', '2021-07-05 02:09:33', '2021-07-05 02:09:33'),
(87, 'avent', 'avent-6ctGv', 1, '', 'default.png', '2021-07-05 02:09:56', '2021-07-05 02:09:56'),
(88, 'Cowhead', 'Cowhead-6Mlyt', 1, '', 'default.png', '2021-07-05 02:10:29', '2021-07-05 02:10:29'),
(89, 'Huggies', 'Huggies-Y1UBC', 1, '', 'default.png', '2021-07-05 02:10:56', '2021-07-05 02:10:56'),
(90, 'Fasska', 'Fasska-VkKVC', 1, '', 'default.png', '2021-07-05 02:11:29', '2021-07-05 02:11:29'),
(91, 'Mother\'s Smile', 'Mothers-Smile-KfnA5', 1, '', 'default.png', '2021-07-05 02:12:04', '2021-07-05 02:12:04'),
(92, 'Neocare', 'Neocare-faigC', 1, '', 'default.png', '2021-07-05 02:12:39', '2021-07-05 02:12:39'),
(93, 'Pedia Sure', 'Pedia-Sure-1SHkA', 1, '', 'default.png', '2021-07-05 02:13:07', '2021-07-05 02:13:07'),
(94, 'Angle', 'Angle-Al2Ed', 1, '', 'default.png', '2021-07-05 02:13:48', '2021-07-05 02:13:48'),
(95, 'Aptamil', 'Aptamil-9raiI', 1, '', 'default.png', '2021-07-05 02:14:13', '2021-07-05 02:14:13'),
(97, 'Aveeno', 'Aveeno-lA4fS', 1, '', 'default.png', '2021-07-05 02:15:00', '2021-07-05 02:15:00'),
(98, 'Garnier', 'Garnier-yqCLW', 1, '', 'default.png', '2021-07-06 03:15:09', '2021-07-06 03:15:09'),
(99, 'Lifebuoy', 'Lifebuoy-kGPXp', 1, '', 'default.png', '2021-07-06 03:16:20', '2021-07-06 03:16:20'),
(101, 'Keya', 'Keya-GIpFo', 1, '', 'default.png', '2021-07-06 03:17:27', '2021-07-06 03:17:27'),
(102, 'Marico', 'Marico-sAUcg', 1, '', 'default.png', '2021-07-06 03:18:32', '2021-07-06 03:18:32'),
(103, 'NARS', 'NARS-24llj', 1, '', 'default.png', '2021-07-06 03:20:09', '2021-07-06 03:20:09'),
(104, 'Romania', 'Romania-7g7LM', 1, '', 'default.png', '2021-07-06 03:20:57', '2021-07-06 03:20:57'),
(105, 'Olympic', 'Olympic-Cs6IW', 1, '', 'default.png', '2021-07-06 03:21:21', '2021-07-06 03:21:21'),
(107, 'Lux', 'Lux-hatVa', 1, '', 'default.png', '2021-07-06 03:22:21', '2021-07-06 03:22:21'),
(108, 'Lenovo', 'Lenovo-FMNLU', 1, '', 'default.png', '2021-07-06 03:22:52', '2021-07-06 03:22:52'),
(109, 'Vim', 'Vim-FcTFA', 1, '', 'default.png', '2021-07-06 03:23:15', '2021-07-06 03:23:15'),
(110, 'Lacoste', 'Lacoste-yGAha', 1, '', 'default.png', '2021-07-06 03:24:15', '2021-07-06 03:24:15'),
(111, 'Wheel', 'Wheel-KQ5IM', 1, '', 'default.png', '2021-07-06 03:24:48', '2021-07-06 03:24:48'),
(112, 'Mgi', 'Mgi-La7g4', 1, '', 'default.png', '2021-07-06 03:25:20', '2021-07-06 03:25:20'),
(113, 'CocaCola', 'CocaCola-5ESRI', 1, '', 'default.png', '2021-07-06 03:25:46', '2021-07-06 03:25:46'),
(115, 'Uniliver', 'Uniliver-khwbs', 1, '', 'default.png', '2021-07-06 03:26:47', '2021-07-06 03:26:47'),
(116, 'Jamuna', 'Jamuna-vOYGQ', 1, '', 'default.png', '2021-07-06 03:27:13', '2021-07-06 03:27:13'),
(117, 'Basundhara Group', 'Basundhara-Group-yBBRJ', 1, '', 'default.png', '2021-07-06 03:28:20', '2021-07-06 03:28:20'),
(118, 'Saqure', 'Saqure-SO4tF', 1, '', 'default.png', '2021-07-06 03:28:47', '2021-07-06 03:28:47'),
(119, 'Loreal', 'Loreal-4Iwjz', 1, '', 'default.png', '2021-07-06 03:29:17', '2021-07-06 03:29:17'),
(120, 'Maximus', 'Maximus-O2GN8', 1, '', 'default.png', '2021-07-06 03:29:52', '2021-07-06 03:29:52'),
(121, 'Marcel', 'Marcel-9RDPC', 1, '', 'default.png', '2021-07-06 03:30:35', '2021-07-06 03:30:35'),
(125, 'Pepsi', 'Pepsi-w00mF', 1, '', 'default.png', '2021-07-06 03:32:31', '2021-07-06 03:32:31'),
(126, 'Apex', 'Apex-X8Vsy', 1, '', 'default.png', '2021-07-06 03:32:50', '2021-07-06 03:32:50'),
(128, 'UiiSii', 'UiiSii-OrJy6', 1, '', 'default.png', '2021-07-06 03:34:06', '2021-07-06 03:34:06'),
(129, 'Dove', 'Dove-xf2EM', 1, '', 'default.png', '2021-07-06 03:34:30', '2021-07-06 03:34:30'),
(130, 'Danish', 'Danish-zqPaZ', 1, '', 'default.png', '2021-07-06 03:34:51', '2021-07-06 03:34:51'),
(131, 'MAC', 'MAC-SzjYZ', 1, '', 'default.png', '2021-07-06 03:35:26', '2021-07-06 03:35:26'),
(133, 'Intel', 'Intel-2Ykhb', 1, '', 'default.png', '2021-07-06 03:36:24', '2021-07-06 03:36:24'),
(134, 'Chasi', 'Chasi-nLsj8', 1, '', 'default.png', '2021-07-06 03:36:44', '2021-07-06 03:36:44'),
(135, 'Asus', 'Asus-w1atg', 1, '', 'default.png', '2021-07-06 03:37:08', '2021-07-06 03:37:08'),
(136, 'Sailor', 'Sailor-A2I4f', 1, '', 'default.png', '2021-07-06 03:38:12', '2021-07-06 03:38:12'),
(137, 'RFL', 'RFL-b6Zil', 1, '', 'default.png', '2021-07-06 03:38:37', '2021-07-06 03:38:37'),
(139, 'Samsung', 'Samsung-wMEaD', 1, '', 'default.png', '2021-07-06 03:39:27', '2021-07-06 03:39:27'),
(140, 'BD Food', 'BD-Food-1ttQq', 1, '', 'default.png', '2021-07-06 03:39:54', '2021-07-06 03:39:54'),
(141, 'Berger', 'Berger-zzYDU', 1, '', 'default.png', '2021-07-06 03:40:20', '2021-07-06 03:40:20'),
(142, 'CAT', 'CAT-hPDIY', 1, '', 'default.png', '2021-07-06 03:40:48', '2021-07-06 03:40:48'),
(143, 'Biomil', 'Biomil-t9Tp1', 1, '', 'default.png', '2021-07-06 03:41:21', '2021-07-06 03:41:21'),
(144, 'Aranya', 'Aranya-Fj0vd', 1, '', 'default.png', '2021-07-06 03:41:53', '2021-07-06 03:41:53'),
(145, 'Aarong', 'Aarong-1WMXR', 1, '', 'default.png', '2021-07-06 03:42:27', '2021-07-06 03:42:27'),
(146, 'Realme', 'Realme-IPksy', 1, '', 'default.png', '2021-07-06 03:42:48', '2021-07-06 03:42:48'),
(147, 'Sun', 'Sun-xVyhI', 1, '', 'default.png', '2021-07-06 03:43:05', '2021-07-06 03:43:05'),
(148, 'En-Lac', 'En-Lac-3P1z1', 1, '', 'default.png', '2021-07-06 03:43:30', '2021-07-06 03:43:30'),
(150, 'D-nee', 'D-nee-QeLxX', 1, '', 'default.png', '2021-07-10 09:24:49', '2021-07-10 09:24:49'),
(151, 'Close Up', 'Close-Up-7O5ab', 1, '', 'default.png', '2021-07-11 00:30:42', '2021-07-11 00:30:42'),
(152, 'Colgate', 'Colgate-EPvYY', 1, '', 'default.png', '2021-07-11 00:31:58', '2021-07-11 00:31:58'),
(153, 'Dabur', 'Dabur-SPzMJ', 1, '', 'default.png', '2021-07-11 00:34:01', '2021-07-11 00:34:01'),
(154, 'Listerine', 'Listerine-JP2qP', 1, '', 'default.png', '2021-07-11 00:36:06', '2021-07-11 00:36:06'),
(155, 'Anfords', 'Anfords-SSHpe', 1, '', 'default.png', '2021-07-11 00:38:07', '2021-07-11 00:38:07'),
(156, 'Sensodyne', 'sensodyne', 1, NULL, 'default.png', '2021-07-11 00:41:03', '2022-04-17 13:05:13'),
(157, 'Knorr', 'Knorr-SMThB', 1, '', 'default.png', '2021-07-14 07:24:26', '2021-07-14 07:24:26'),
(158, 'Symphony', 'Symphony-kUDoT', 1, '', 'default.png', '2021-07-17 12:48:08', '2021-07-17 12:48:08'),
(159, 'Tecno', 'Tecno-u7PrB', 1, '', 'default.png', '2021-07-17 12:48:35', '2021-07-17 12:48:35'),
(160, 'Infinix', 'Infinix-qo7Do', 1, '', 'default.png', '2021-07-17 12:49:07', '2021-07-17 12:49:07'),
(161, 'Motorola', 'Motorola-1UW46', 1, '', 'default.png', '2021-07-17 12:49:53', '2021-07-17 12:49:53'),
(162, 'Huawei', 'Huawei-Uuoh3', 1, '', 'default.png', '2021-07-17 12:50:31', '2021-07-17 12:50:31'),
(163, 'ADATA', 'ADATA-rnuvy', 1, '', 'default.png', '2021-07-17 13:29:14', '2021-07-17 13:29:14'),
(164, 'Amazfit', 'Amazfit-BReFj', 1, '', 'default.png', '2021-07-17 13:29:53', '2021-07-17 13:29:53'),
(165, 'Anker', 'Anker-tiuGV', 1, '', 'default.png', '2021-07-17 13:30:22', '2021-07-17 13:30:22'),
(166, 'Anobik', 'Anobik-bqvH9', 1, '', 'default.png', '2021-07-17 13:31:40', '2021-07-17 13:31:40'),
(167, 'Apacer', 'Apacer-rJa5r', 1, '', 'default.png', '2021-07-17 13:34:36', '2021-07-17 13:34:36'),
(168, 'AWEI', 'AWEI-goGYk', 1, '', 'default.png', '2021-07-17 13:35:12', '2021-07-17 13:35:12'),
(169, 'Baseus', 'Baseus-yzJ6C', 1, '', 'default.png', '2021-07-17 13:35:48', '2021-07-17 13:35:48'),
(170, 'Beats', 'Beats-GUFhM', 1, '', 'default.png', '2021-07-17 13:36:11', '2021-07-17 13:36:11'),
(171, 'Bose', 'Bose-iJwQ9', 1, '', 'default.png', '2021-07-17 13:37:07', '2021-07-17 13:37:07'),
(172, 'Boya', 'Boya-T3YHj', 1, '', 'default.png', '2021-07-17 13:38:16', '2021-07-17 13:38:16'),
(173, 'Fossil', 'Fossil-2lsdh', 1, '', 'default.png', '2021-07-17 13:39:06', '2021-07-17 13:39:06'),
(174, 'Havit', 'Havit-prlWd', 1, '', 'default.png', '2021-07-17 13:40:26', '2021-07-17 13:40:26'),
(175, 'Haylou', 'Haylou-ISyn3', 1, '', 'default.png', '2021-07-17 13:40:48', '2021-07-17 13:40:48'),
(176, 'Hoco', 'Hoco-Ivs20', 1, '', 'default.png', '2021-07-17 13:41:40', '2021-07-17 13:41:40'),
(177, 'Honor', 'Honor-vipQN', 1, '', 'default.png', '2021-07-17 13:42:00', '2021-07-17 13:42:00'),
(178, 'JBL', 'JBL-iz3tG', 1, '', 'default.png', '2021-07-17 13:42:15', '2021-07-17 13:42:15'),
(179, 'OnePlus', 'OnePlus-0ciK0', 1, '', 'default.png', '2021-07-17 13:43:00', '2021-07-17 13:43:00'),
(180, 'Redmi', 'Redmi-EhmDo', 1, '', 'default.png', '2021-07-17 13:43:28', '2021-07-17 13:43:28'),
(181, 'Remax', 'rimax-5cfm8', 1, '', 'default.png', '2021-07-17 13:43:51', '2021-07-17 13:50:40'),
(182, 'Rock', 'Rock-DOzXG', 1, '', 'default.png', '2021-07-17 13:44:16', '2021-07-17 13:44:16'),
(183, 'SanDisk', 'SanDisk-FWGwa', 1, '', 'default.png', '2021-07-17 13:45:10', '2021-07-17 13:45:10'),
(184, 'Sony', 'Sony-66nSd', 1, '', 'default.png', '2021-07-17 13:45:27', '2021-07-17 13:45:27'),
(185, 'Transcend', 'Transcend-WkSvY', 1, '', 'default.png', '2021-07-17 13:46:18', '2021-07-17 13:46:18'),
(186, 'Ultimate Ears', 'Ultimate-Ears-lQhOB', 1, '', 'default.png', '2021-07-17 13:47:02', '2021-07-17 13:47:02'),
(187, 'Wavefun', 'Wavefun-u9QDn', 1, '', 'default.png', '2021-07-17 13:47:28', '2021-07-17 13:47:28'),
(189, 'Canon', 'Canon-tFHi5', 1, '', 'default.png', '2021-07-17 13:52:03', '2021-07-17 13:52:03'),
(190, 'Sharp', 'Sharp-4qvfr', 1, '', 'default.png', '2021-07-17 13:52:21', '2021-07-17 13:52:21'),
(191, 'Singer', 'Singer-Nb940', 1, '', 'default.png', '2021-07-17 13:52:41', '2021-07-17 13:52:41'),
(192, 'Epson', 'Epson-KQiaq', 1, '', 'default.png', '2021-07-17 13:53:12', '2021-07-17 13:53:12'),
(193, 'Gigabyte', 'Gigabyte-BVZAR', 1, '', 'default.png', '2021-07-17 13:54:08', '2021-07-17 13:54:08'),
(194, 'MSI', 'MSI-JXwo2', 1, '', 'default.png', '2021-07-17 13:54:33', '2021-07-17 13:54:33'),
(195, 'Esonic', 'Esonic-BVOyS', 1, '', 'default.png', '2021-07-17 13:54:54', '2021-07-17 13:54:54'),
(196, 'Intel', 'Intel-4tV8F', 1, '', 'default.png', '2021-07-17 13:55:08', '2021-07-17 13:55:08'),
(197, 'Benq', 'Benq-BN0MZ', 1, '', 'default.png', '2021-07-17 13:55:40', '2021-07-17 13:55:40'),
(198, 'TP-Link', 'TP-Link-mSOmA', 1, '', 'default.png', '2021-07-17 13:56:04', '2021-07-17 13:56:04'),
(199, 'D-Link', 'D-Link-vJQcc', 1, '', 'default.png', '2021-07-17 13:56:57', '2021-07-17 13:56:57'),
(200, 'Tenda', 'Tenda-Hbm2M', 1, '', 'default.png', '2021-07-17 13:57:39', '2021-07-17 13:57:39'),
(201, 'Vision', 'Vision-8Tfu0', 1, '', 'default.png', '2021-07-17 13:58:02', '2021-07-17 13:58:02'),
(202, 'Kiam', 'Kiam-GOcFb', 1, '', 'default.png', '2021-07-17 13:58:18', '2021-07-17 13:58:18'),
(203, 'Nova', 'Nova-hWzO9', 1, '', 'default.png', '2021-07-17 13:58:49', '2021-07-17 13:58:49'),
(204, 'Dettol', 'Dettol-jcIUn', 1, '', 'default.png', '2021-07-17 13:59:12', '2021-07-17 13:59:12'),
(205, 'Emami', 'Emami-bUzMa', 1, '', 'default.png', '2021-07-17 13:59:27', '2021-07-17 13:59:27'),
(206, 'Ponds', 'Ponds-SCRww', 1, '', 'default.png', '2021-07-17 13:59:45', '2021-07-17 13:59:45'),
(207, 'Acer', 'Acer-bTKoX', 1, '', 'default.png', '2021-07-17 14:00:03', '2021-07-17 14:00:03'),
(208, 'HP', 'HP-xnCzS', 1, '', 'default.png', '2021-07-17 14:01:39', '2021-07-17 14:01:39'),
(209, 'Dell', 'Dell-ZyEKF', 1, '', 'default.png', '2021-07-17 14:02:20', '2021-07-17 14:02:20'),
(210, 'Asus', 'Asus-iaxi3', 1, '', 'default.png', '2021-07-17 14:02:38', '2021-07-17 14:02:38'),
(211, 'BOSCH', 'BOSCH-N0bVq', 1, '', 'default.png', '2021-07-17 14:03:54', '2021-07-17 14:03:54'),
(212, 'Deli', 'Deli-8hf3E', 1, '', 'default.png', '2021-07-17 14:04:10', '2021-07-17 14:04:10'),
(213, 'Gree', 'Gree-Ydlnd', 1, '', 'default.png', '2021-07-17 14:04:24', '2021-07-17 14:04:24'),
(214, 'LG', 'LG-uSJ9P', 1, '', 'default.png', '2021-07-17 14:04:38', '2021-07-17 14:04:38'),
(215, 'Midea', 'Midea-ABhmj', 1, '', 'default.png', '2021-07-17 14:04:56', '2021-07-17 14:04:56'),
(216, 'Logitech', 'Logitech-KMKbA', 1, '', 'default.png', '2021-07-17 14:06:22', '2021-07-17 14:06:22'),
(217, 'Norton', 'Norton-inS7u', 1, '', 'default.png', '2021-07-17 14:07:00', '2021-07-17 14:07:00'),
(218, 'A4Tech', 'A4Tech-LZqrw', 1, '', 'default.png', '2021-07-17 14:07:27', '2021-07-17 14:07:27'),
(219, 'Calvin Klein', 'Calvin-Klein-kcZks', 1, '', 'default.png', '2021-07-17 14:09:31', '2021-07-17 14:09:31'),
(220, 'Casio', 'Casio-kjSiR', 1, '', 'default.png', '2021-07-17 14:09:51', '2021-07-17 14:09:51'),
(221, 'Fastrack', 'Fastrack-SZy7I', 1, '', 'default.png', '2021-07-17 14:10:50', '2021-07-17 14:10:50'),
(222, 'Polo', 'Polo-CK8tb', 1, '', 'default.png', '2021-07-17 14:11:40', '2021-07-17 14:11:40'),
(223, 'Revlon', 'Revlon-aZEQq', 1, '', 'default.png', '2021-07-17 14:12:26', '2021-07-17 14:12:26'),
(224, 'Titan', 'Titan-nhurF', 1, '', 'default.png', '2021-07-17 14:12:51', '2021-07-17 14:12:51'),
(225, 'Zara', 'Zara-Qhcym', 1, '', 'default.png', '2021-07-17 14:13:05', '2021-07-17 14:13:05'),
(226, 'Yuwell', 'Yuwell-J4Cln', 1, '', 'default.png', '2021-07-17 14:13:27', '2021-07-17 14:13:27'),
(227, 'Tresemme', 'Tresemme-vLsco', 1, '', 'default.png', '2021-07-22 05:45:51', '2021-07-22 05:45:51'),
(228, 'L\' Oreal', 'L-Oreal-tYXIV', 1, '', 'default.png', '2021-07-22 05:46:24', '2021-07-22 05:46:24'),
(229, 'Herbal Essence', 'Herbal-Essence-bK4CI', 1, '', 'default.png', '2021-07-22 05:46:49', '2021-07-22 05:46:49'),
(230, 'Dove', 'Dove-jwwpM', 1, '', 'default.png', '2021-07-22 05:47:03', '2021-07-22 05:47:03'),
(231, 'Head & shoulder', 'Head--shoulder-Hcw3a', 1, '', 'default.png', '2021-07-22 05:47:35', '2021-07-22 05:47:35'),
(232, 'OGX', 'OGX-9fGyc', 1, '', 'default.png', '2021-07-22 05:47:53', '2021-07-22 05:47:53'),
(233, 'Sunsilk', 'Sunsilk-9Fa1l', 1, '', 'default.png', '2021-07-22 05:48:48', '2021-07-22 05:48:48'),
(234, 'Himalaya', 'Himalaya-RS9GX', 1, '', 'default.png', '2021-07-22 05:49:36', '2021-07-22 05:49:36'),
(235, 'Pantene', 'Pantene-MPTDw', 1, '', 'default.png', '2021-07-22 05:49:56', '2021-07-22 05:49:56'),
(236, 'Parachute', 'Parachute-BdaZN', 1, '', 'default.png', '2021-07-22 05:50:47', '2021-07-22 05:50:47'),
(237, 'WOW', 'WOW-yX1Bu', 1, '', 'default.png', '2021-07-22 05:51:03', '2021-07-22 05:51:03'),
(238, 'Deep Fresh', 'Deep-Fresh-SALiz', 1, '', 'default.png', '2021-07-22 05:51:21', '2021-07-22 05:51:21'),
(239, 'Xpel', 'Xpel-p4OiL', 1, '', 'default.png', '2021-07-22 05:51:44', '2021-07-22 05:51:44'),
(240, 'Follow me', 'Follow-me-vU3IZ', 1, '', 'default.png', '2021-07-22 05:52:00', '2021-07-22 05:52:00'),
(241, 'Dabur', 'Dabur-6JYQW', 1, '', 'default.png', '2021-07-22 05:56:06', '2021-07-22 05:56:06'),
(242, 'Alpecin', 'Alpecin-nGNel', 1, '', 'default.png', '2021-07-22 05:56:28', '2021-07-22 05:56:28'),
(243, 'Clear', 'Clear-EuHR3', 1, '', 'default.png', '2021-07-22 05:56:49', '2021-07-22 05:56:49'),
(244, 'Dandex', 'Dandex-capOW', 1, '', 'default.png', '2021-07-22 05:57:14', '2021-07-22 05:57:14'),
(245, 'Biotique', 'Biotique-Faz8x', 1, '', 'default.png', '2021-07-22 05:57:40', '2021-07-22 05:57:40'),
(246, 'Neutrogena', 'Neutrogena-ipASs', 1, '', 'default.png', '2021-07-22 05:58:14', '2021-07-22 05:58:14'),
(247, 'Revlon', 'Revlon-CJVS0', 1, '', 'default.png', '2021-07-22 05:58:36', '2021-07-22 05:58:36'),
(248, 'Ayush', 'Ayush-8jQJJ', 1, '', 'default.png', '2021-07-22 05:59:42', '2021-07-22 05:59:42'),
(249, 'BEAUA', 'BEAUA-OjlJY', 1, '', 'default.png', '2021-07-22 06:00:26', '2021-07-22 06:00:26'),
(250, 'Clinic Plus', 'Clinic-Plus-MEV4R', 1, '', 'default.png', '2021-07-22 06:00:48', '2021-07-22 06:00:48'),
(251, 'Kumarika', 'Kumarika-rzmWZ', 1, '', 'default.png', '2021-07-22 06:01:10', '2021-07-22 06:01:10'),
(252, 'Crevil', 'Crevil-tgMIP', 1, '', 'default.png', '2021-07-22 06:02:04', '2021-07-22 06:02:04'),
(253, 'Emami', 'Emami-uRbAr', 1, '', 'default.png', '2021-07-22 06:02:25', '2021-07-22 06:02:25'),
(254, 'Guerniss', 'Guerniss-uWQSg', 1, '', 'default.png', '2021-07-22 06:03:07', '2021-07-22 06:03:07'),
(255, 'Revive', 'Revive-HAzZI', 1, '', 'default.png', '2021-07-22 06:03:33', '2021-07-22 06:03:33'),
(263, 'V&G', 'VG-LsEns', 1, '', 'default.png', '2021-07-22 06:09:23', '2021-07-22 06:09:23'),
(264, 'Godrej Expert', 'Godrej-Expert-HNN9s', 1, '', 'default.png', '2021-07-22 06:10:08', '2021-07-22 06:10:08'),
(265, 'Liangjie', 'Liangjie-yeePm', 1, '', 'default.png', '2021-07-22 06:10:38', '2021-07-22 06:10:38'),
(266, 'Nihar', 'Nihar-XCMlw', 1, '', 'default.png', '2021-07-22 06:10:55', '2021-07-22 06:10:55'),
(292, 'JOYROOM', 'joyroom', 1, NULL, '2023-08-23-64e5c0967d96a.PNG', '2023-08-23 02:17:26', '2023-08-28 11:05:01'),
(293, 'Unknown', 'unknown', 1, NULL, '2023-08-23-64e5c270ad828.jpeg', '2023-08-23 02:25:20', '2023-08-23 02:25:20'),
(294, 'YouTube', 'youtube', 1, NULL, '2023-08-23-64e5d5f460bf4.jpg', '2023-08-23 03:48:36', '2023-08-23 03:48:36'),
(295, 'Samsung', 'samsung', 1, NULL, '2023-08-23-64e5dbedc4dfa.PNG', '2023-08-23 04:14:05', '2023-08-23 04:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `is_flash` int NOT NULL DEFAULT '0',
  `end` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `slug`, `name`, `cover_photo`, `is_flash`, `end`, `status`, `created_at`, `updated_at`) VALUES
(1, '64ff0d9ae3aeb', 'Flash', '2023-09-11-64ff0d9ae3694.jpg', 0, NULL, 1, '2023-09-11 06:52:42', '2024-01-11 04:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `campaing_comments`
--

CREATE TABLE `campaing_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `campaign_id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaing_products`
--

CREATE TABLE `campaing_products` (
  `id` bigint UNSIGNED NOT NULL,
  `campaign_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaing_products`
--

INSERT INTO `campaing_products` (`id`, `campaign_id`, `product_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 710, 100, '2023-09-11 06:53:59', '2023-09-11 06:54:39'),
(3, 1, 703, 100, '2023-09-11 06:55:04', '2023-09-11 06:58:41'),
(8, 1, 707, 85, '2023-09-11 06:58:25', '2023-09-11 06:58:41'),
(9, 1, 684, 2000, '2023-09-11 07:02:01', '2023-09-11 07:02:06'),
(10, 1, 683, 1300, '2023-09-11 07:02:12', '2023-09-11 07:02:34'),
(11, 1, 706, 0, '2023-09-11 07:03:28', '2023-09-11 07:03:28'),
(12, 1, 697, 100, '2023-09-11 07:05:11', '2023-09-11 07:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `cart_infos`
--

CREATE TABLE `cart_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `ser` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `vendor` int DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_feature` int NOT NULL DEFAULT '0',
  `pos` int DEFAULT NULL,
  `poss` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `is_feature`, `pos`, `poss`, `description`, `cover_photo`, `created_at`, `updated_at`) VALUES
(4, 'Electronics Accessories', 'electronics-accessories', 1, 1, 40, 10, NULL, '2023-05-07-64576098bce17.png', NULL, '2023-09-05 14:13:02'),
(6, 'Electronic Devices', 'electronic-devices', 1, 1, 8, 8, NULL, '2023-03-10-640b87e16cea1.png', NULL, '2023-03-10 13:41:21'),
(11, 'Services', 'services', 1, 1, 11, NULL, NULL, '2023-03-10-640b86eea9526.png', NULL, '2023-03-10 13:37:18'),
(18, 'Men Fashion', 'men-fashion', 1, 1, 1, NULL, NULL, '2023-09-05-64f77272874dd.png', '2023-08-12 20:14:09', '2023-09-05 12:24:50'),
(19, 'Women Fashion', 'women-fashion', 1, 1, 2, NULL, NULL, '2023-09-05-64f77294261cb.png', '2023-08-22 23:25:13', '2023-09-05 12:25:24'),
(21, 'Groceries', 'groceries', 1, 1, 4, NULL, NULL, '2023-09-05-64f78a50392bd.png', '2023-08-23 03:13:44', '2023-09-05 14:13:09'),
(22, 'Health & Beauty', 'health-beauty', 1, 1, 7, NULL, NULL, '2023-09-05-64f78c1b6d388.png', '2023-08-23 09:04:59', '2023-09-05 14:14:19'),
(23, 'Home Appliance', 'home-appliance', 1, 1, 9, NULL, NULL, '2023-09-05-64f78aa544cac.png', '2023-08-28 10:19:22', '2023-09-05 14:09:37'),
(24, 'Jewelry', 'jewelry', 1, 1, 3, NULL, NULL, '2023-09-05-64f78b12d1d30.png', '2023-09-05 14:09:54', '2023-09-05 14:12:47'),
(25, 'Books', 'books', 1, 1, 12, NULL, NULL, '2023-09-06-64f860c1ebce1.png', '2023-09-05 14:11:36', '2023-09-06 05:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `category_collection`
--

CREATE TABLE `category_collection` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `collection_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_collection`
--

INSERT INTO `category_collection` (`id`, `category_id`, `collection_id`, `created_at`, `updated_at`) VALUES
(6, 4, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(690, 4, 684, NULL, NULL),
(692, 18, 686, NULL, NULL),
(695, 18, 689, NULL, NULL),
(706, 23, 700, NULL, NULL),
(707, 18, 701, NULL, NULL),
(709, 4, 702, NULL, NULL),
(710, 4, 699, NULL, NULL),
(711, 4, 698, NULL, NULL),
(712, 4, 697, NULL, NULL),
(713, 4, 693, NULL, NULL),
(714, 19, 691, NULL, NULL),
(715, 18, 690, NULL, NULL),
(716, 18, 688, NULL, NULL),
(717, 18, 687, NULL, NULL),
(718, 18, 685, NULL, NULL),
(719, 19, 703, NULL, NULL),
(720, 19, 704, NULL, NULL),
(721, 4, 683, NULL, NULL),
(722, 19, 705, NULL, NULL),
(723, 19, 706, NULL, NULL),
(724, 19, 707, NULL, NULL),
(725, 21, 708, NULL, NULL),
(726, 21, 709, NULL, NULL),
(727, 21, 710, NULL, NULL),
(728, 21, 711, NULL, NULL),
(729, 21, 712, NULL, NULL),
(730, 21, 713, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `send_id` bigint UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_status` tinyint(1) NOT NULL DEFAULT '0',
  `user_status` tinyint(1) NOT NULL DEFAULT '0',
  `admin_message_log` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_message_log` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `slug`, `status`, `cover_photo`, `created_at`, `updated_at`) VALUES
(1, 'Baby Care', 'baby-care', 1, '2022-04-20-6260808b3fb9b.JPG', '2022-03-11 12:59:30', '2022-04-21 11:10:45'),
(2, 'All Electronics', 'all-electronics', 1, '2022-04-20-62608116b6315.JPG', '2022-03-11 13:00:15', '2023-05-10 07:43:00'),
(5, 'Daily Bazar', 'daily-bazar', 1, '2022-05-09-6279406556ade.jpg', '2022-03-26 08:12:02', '2022-05-09 10:25:09'),
(6, 'Regular Fashion', 'regular-fashion', 1, '2022-05-09-627940e88543c.jpg', '2022-03-26 08:12:49', '2023-09-05 15:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `slug`, `code`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Black', 'black', '#000000', 1, NULL, '2022-03-11 12:07:03', '2022-03-11 12:07:03'),
(2, 'Red', 'red', '#fb0007', 1, NULL, '2022-03-11 12:07:35', '2022-03-11 12:07:35'),
(3, 'Blue', 'blue', '#0000ff', 1, NULL, '2022-03-11 12:07:49', '2022-04-04 12:12:08'),
(4, 'White', 'white', '#ffffff', 1, NULL, '2022-03-11 12:08:10', '2022-03-11 12:08:10'),
(5, 'Pink', 'pink', '#f200fe', 1, NULL, '2022-03-11 12:08:23', '2022-04-04 11:50:23'),
(6, 'Green', 'green', '#038104', 1, NULL, '2022-03-11 12:09:01', '2022-04-04 11:50:11'),
(7, 'Yellow', 'yellow', '#ffff00', 1, NULL, '2022-03-11 12:09:26', '2022-04-04 12:18:09'),
(8, 'Gray', 'gray', '#808080', 1, NULL, '2022-04-04 12:08:10', '2022-04-04 12:08:10'),
(9, 'Silver', 'silver', '#c0c0c0', 1, NULL, '2022-04-04 12:08:42', '2022-04-04 12:08:42'),
(10, 'Orange', 'orange', '#ffa500', 1, NULL, '2022-04-04 12:09:13', '2022-04-04 12:09:13'),
(11, 'Purple', 'purple', '#800080', 1, NULL, '2022-04-04 12:09:39', '2022-04-04 12:09:39'),
(12, 'Maroon', 'maroon', '#800000', 1, NULL, '2022-04-04 12:10:19', '2022-04-04 12:10:19'),
(13, 'Olive', 'olive', '#808000', 1, NULL, '2022-04-04 12:10:45', '2022-04-04 12:10:45'),
(15, 'Cream', 'cream', '#ffffcc', 1, NULL, '2022-04-04 12:13:08', '2022-04-04 12:13:08'),
(16, 'Gold', 'gold', '#ffd700', 1, NULL, '2022-04-04 12:13:50', '2022-04-04 12:13:50'),
(17, 'Nutmeg', 'nutmeg', '#7f2e2e', 1, 'null', '2022-04-07 07:51:21', '2022-04-07 07:51:21'),
(18, 'Cowboy', 'cowboy', '#532929', 1, 'null', '2022-04-17 03:42:26', '2022-04-17 03:42:26'),
(19, 'Sky Blue', 'sky-blue', '#32b4e6', 1, 'Sky Blue', '2023-05-13 02:18:42', '2023-05-13 02:18:42'),
(20, 'Off White', 'off-white', '#faf9f6', 1, 'Off-white is the replacement of White', '2023-05-13 03:59:11', '2023-05-13 03:59:11'),
(21, 'Paste', 'paste', '#cdf6d4', 1, 'Paste', '2023-05-13 04:13:22', '2023-05-13 04:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `qnty` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_product`
--

INSERT INTO `color_product` (`id`, `color_id`, `product_id`, `qnty`, `price`, `created_at`, `updated_at`) VALUES
(37, 10, 683, NULL, 50, NULL, NULL),
(38, 1, 683, NULL, NULL, NULL, NULL),
(40, 1, 698, NULL, NULL, NULL, NULL),
(41, 4, 699, NULL, NULL, NULL, NULL),
(42, 1, 699, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `parent_id`, `body`, `created_at`, `updated_at`) VALUES
(7, 1, 685, 4, 'জি। অবশ্যই বাংলাদেশী মেইল হতে হবে।', '2023-08-26 11:29:01', '2023-08-26 11:29:01'),
(8, 1, 685, 6, 'শুধু মেইল দিলেই হবে।', '2023-08-26 11:29:20', '2023-08-26 11:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `user_id`, `order_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 200, 1, '98.00', 0, '2023-05-07 09:27:25', '2023-05-07 09:27:25'),
(2, 201, 2, '45.50', 0, '2023-05-11 12:05:54', '2023-05-11 12:05:54'),
(3, 199, 3, '59.50', 0, '2023-05-12 10:48:45', '2023-05-12 10:48:45'),
(4, 199, 4, '59.50', 0, '2023-05-12 10:51:47', '2023-05-12 10:51:47'),
(5, 200, 5, '35.00', 0, '2023-05-12 11:38:01', '2023-05-12 11:38:01'),
(6, 225, 13, '22.30', 0, '2023-06-22 01:03:59', '2023-06-22 01:03:59'),
(7, 225, 14, '22.30', 0, '2023-06-22 01:04:05', '2023-06-22 01:04:05'),
(8, 225, 15, '22.30', 0, '2023-06-22 01:06:16', '2023-06-22 01:06:16'),
(9, 225, 16, '22.30', 0, '2023-06-22 01:07:24', '2023-06-22 01:07:24'),
(10, 225, 17, '22.30', 0, '2023-06-22 01:07:46', '2023-06-22 01:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `limit_per_user` int NOT NULL,
  `total_use_limit` int NOT NULL,
  `available_limit` int NOT NULL,
  `expire_date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `description`, `discount_type`, `discount`, `limit_per_user`, `total_use_limit`, `available_limit`, `expire_date`, `status`, `created_at`, `updated_at`) VALUES
(3, '@professor_pubg', 'YT Premium 4 Month', 'amount', '50.00', 1, 1, 0, '2023-08-30', 1, '2023-08-30 05:22:59', '2023-08-30 05:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_user`
--

CREATE TABLE `coupon_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `coupon_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_infos`
--

CREATE TABLE `customer_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distric` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_infos`
--

INSERT INTO `customer_infos` (`id`, `user_id`, `country`, `city`, `distric`, `thana`, `street`, `post_code`, `created_at`, `updated_at`) VALUES
(255, 286, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-11 07:44:02', '2023-09-11 07:44:02'),
(256, 287, 'BD', 'Mirpur', NULL, NULL, 'Dhaka', '1201', '2023-09-11 07:46:51', '2023-09-11 07:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `device_ids`
--

CREATE TABLE `device_ids` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `device_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `device_ids`
--

INSERT INTO `device_ids` (`id`, `user_id`, `device_id`, `created_at`, `updated_at`) VALUES
(1, 176, 'fwXl-WKwEyerVNDyB_f9xF:APA91bEkiHafMufEhlQxQKn0tWWv6Zzl8ZtAxLpz05qlOfNgCWAVV8O4E1nOPgXD9cVZi4mdahFtzqHTtybHMVWi3EJW8Y6lPaCL4mfwan2FNE1CgEomDmLRsbeP36SJFLZTimFLamPZ', '2023-04-14 09:07:03', '2023-04-14 09:07:03'),
(2, 178, 'eqSX5yJbnet46brhZ8juhH:APA91bEsOiweU6ip6DcouoPeDeoe8VN91VtDgfbOBzx33PluZfqSsWuQJrTi2Ug4BRcGfscwpmeiyEd6jmUOCYv2Da6ggCaYd7eJkHAW56HRIfCtNDLN79BunuyIFxN7FM37AoIDkuT0', '2023-04-14 09:13:37', '2023-04-14 09:13:37'),
(3, NULL, 'fwXl-WKwEyerVNDyB_f9xF:APA91bEkiHafMufEhlQxQKn0tWWv6Zzl8ZtAxLpz05qlOfNgCWAVV8O4E1nOPgXD9cVZi4mdahFtzqHTtybHMVWi3EJW8Y6lPaCL4mfwan2FNE1CgEomDmLRsbeP36SJFLZTimFLamPZ', '2023-04-14 15:08:14', '2023-04-14 15:08:14'),
(4, 1, 'fwXl-WKwEyerVNDyB_f9xF:APA91bEkiHafMufEhlQxQKn0tWWv6Zzl8ZtAxLpz05qlOfNgCWAVV8O4E1nOPgXD9cVZi4mdahFtzqHTtybHMVWi3EJW8Y6lPaCL4mfwan2FNE1CgEomDmLRsbeP36SJFLZTimFLamPZ', '2023-04-14 17:11:06', '2023-04-14 17:11:06'),
(5, NULL, 'eqSX5yJbnet46brhZ8juhH:APA91bEsOiweU6ip6DcouoPeDeoe8VN91VtDgfbOBzx33PluZfqSsWuQJrTi2Ug4BRcGfscwpmeiyEd6jmUOCYv2Da6ggCaYd7eJkHAW56HRIfCtNDLN79BunuyIFxN7FM37AoIDkuT0', '2023-04-15 03:30:45', '2023-04-15 03:30:45'),
(6, 1, 'eqSX5yJbnet46brhZ8juhH:APA91bEsOiweU6ip6DcouoPeDeoe8VN91VtDgfbOBzx33PluZfqSsWuQJrTi2Ug4BRcGfscwpmeiyEd6jmUOCYv2Da6ggCaYd7eJkHAW56HRIfCtNDLN79BunuyIFxN7FM37AoIDkuT0', '2023-04-15 04:06:21', '2023-04-15 04:06:21'),
(7, NULL, 'eNAr2xICsickPEDbuMllUw:APA91bFRC0tLZg9vH75ccE578ftdgepZ3adx1wv4SWpbemVvXMV9gdWQGXbX_8fFSJWkbWcRgQ-j4xO3FP1LHz7sx7ger_FyFuA17ssQ2DXNWb4Y6v6lvdlTovxQUGKZoMkmwWLc8u0f', '2023-04-15 07:39:01', '2023-04-15 07:39:01'),
(8, 178, 'fwXl-WKwEyerVNDyB_f9xF:APA91bEkiHafMufEhlQxQKn0tWWv6Zzl8ZtAxLpz05qlOfNgCWAVV8O4E1nOPgXD9cVZi4mdahFtzqHTtybHMVWi3EJW8Y6lPaCL4mfwan2FNE1CgEomDmLRsbeP36SJFLZTimFLamPZ', '2023-04-16 04:24:29', '2023-04-16 04:24:29'),
(9, NULL, 'fbpwV6be03vt1wZd-W6FjS:APA91bGuNpSfpsF1AeIEGLoKEQS5i7KzAoSeod9haNbFccdSzmCDlxCvqCrRxhGX_3X9fvy4uRU4TInONQHVPwvvxpGqbzTTrYnWBw2B7OTb414svDfEnxKSFAZHZltAwKIsbVha1CuY', '2023-04-16 18:41:36', '2023-04-16 18:41:36'),
(10, 178, 'eNAr2xICsickPEDbuMllUw:APA91bFRC0tLZg9vH75ccE578ftdgepZ3adx1wv4SWpbemVvXMV9gdWQGXbX_8fFSJWkbWcRgQ-j4xO3FP1LHz7sx7ger_FyFuA17ssQ2DXNWb4Y6v6lvdlTovxQUGKZoMkmwWLc8u0f', '2023-04-17 03:30:21', '2023-04-17 03:30:21'),
(11, 176, 'fbpwV6be03vt1wZd-W6FjS:APA91bGuNpSfpsF1AeIEGLoKEQS5i7KzAoSeod9haNbFccdSzmCDlxCvqCrRxhGX_3X9fvy4uRU4TInONQHVPwvvxpGqbzTTrYnWBw2B7OTb414svDfEnxKSFAZHZltAwKIsbVha1CuY', '2023-04-17 04:05:20', '2023-04-17 04:05:20'),
(12, 177, 'fbpwV6be03vt1wZd-W6FjS:APA91bGuNpSfpsF1AeIEGLoKEQS5i7KzAoSeod9haNbFccdSzmCDlxCvqCrRxhGX_3X9fvy4uRU4TInONQHVPwvvxpGqbzTTrYnWBw2B7OTb414svDfEnxKSFAZHZltAwKIsbVha1CuY', '2023-04-17 04:06:39', '2023-04-17 04:06:39'),
(13, 178, 'fbpwV6be03vt1wZd-W6FjS:APA91bGuNpSfpsF1AeIEGLoKEQS5i7KzAoSeod9haNbFccdSzmCDlxCvqCrRxhGX_3X9fvy4uRU4TInONQHVPwvvxpGqbzTTrYnWBw2B7OTb414svDfEnxKSFAZHZltAwKIsbVha1CuY', '2023-04-18 02:05:37', '2023-04-18 02:05:37'),
(14, 182, 'eNAr2xICsickPEDbuMllUw:APA91bFRC0tLZg9vH75ccE578ftdgepZ3adx1wv4SWpbemVvXMV9gdWQGXbX_8fFSJWkbWcRgQ-j4xO3FP1LHz7sx7ger_FyFuA17ssQ2DXNWb4Y6v6lvdlTovxQUGKZoMkmwWLc8u0f', '2023-04-18 04:01:23', '2023-04-18 04:01:23'),
(15, NULL, 'ef9yjfkwpQZV5p-Z_oZE88:APA91bEZQp4A5JxXLNafLdHBiIReNegmiXshF3yGSMwJFlH74fQ_UBLqsl7PVUN0G0GGqrBA5ZL3rm31NeoCP9d7-acXI4ppkDSAQK8NlfUymmwNQjDmumVoNCf2sLfGJWLD87JACKc8', '2023-04-19 03:41:06', '2023-04-19 03:41:06'),
(16, 182, 'ef9yjfkwpQZV5p-Z_oZE88:APA91bEZQp4A5JxXLNafLdHBiIReNegmiXshF3yGSMwJFlH74fQ_UBLqsl7PVUN0G0GGqrBA5ZL3rm31NeoCP9d7-acXI4ppkDSAQK8NlfUymmwNQjDmumVoNCf2sLfGJWLD87JACKc8', '2023-04-19 03:41:41', '2023-04-19 03:41:41'),
(17, NULL, 'dILHPRV3M8XU9SGagbQ8An:APA91bEWdJP8FWn9yAioC5wDSSRv4k6Dm50j5sm40p1vCM4XOydj5J-6Rw5waUkKWE8oHl8PS86YVRvp-1TJWzZQ2mDIEhEBuUHLr0DgZSi9rOr8dWGH7VZfGkULjvYqSd2tUR7iZfN8', '2023-04-19 18:24:08', '2023-04-19 18:24:08'),
(18, 182, 'dILHPRV3M8XU9SGagbQ8An:APA91bEWdJP8FWn9yAioC5wDSSRv4k6Dm50j5sm40p1vCM4XOydj5J-6Rw5waUkKWE8oHl8PS86YVRvp-1TJWzZQ2mDIEhEBuUHLr0DgZSi9rOr8dWGH7VZfGkULjvYqSd2tUR7iZfN8', '2023-04-19 18:28:12', '2023-04-19 18:28:12'),
(19, NULL, 'd7aSd2JVJTEGjOr4fdX-xe:APA91bEIJZxb-pXYp72rLDSrvvYFNwdVm9BsyEJIpXYaw-9vgAZUn35ozDSMS7CGAQo6BsoILlVAtI-bghyOpM7ITl3QmiQAXbzVKusdRGMAJf1x2-vs7N7uQ8O-GX3IYLcxzi8Oaoh6', '2023-04-19 18:54:30', '2023-04-19 18:54:30'),
(20, NULL, 'fPw2gI90OGJaczE_ZzLsNr:APA91bFaDXEDQqaMIBgSAsfcwfjNvrP6-VnowjhHSdA5wjw7q8s7nnxANjmoRr4qp4s8bAef61pDCldHG5CoLaAf1w3iJhhL7l7HM2U6hiUnLHEdXt7a9aAN5p593EGbU7BokfvfDx6W', '2023-04-20 17:45:52', '2023-04-20 17:45:52'),
(21, 184, 'd7aSd2JVJTEGjOr4fdX-xe:APA91bEIJZxb-pXYp72rLDSrvvYFNwdVm9BsyEJIpXYaw-9vgAZUn35ozDSMS7CGAQo6BsoILlVAtI-bghyOpM7ITl3QmiQAXbzVKusdRGMAJf1x2-vs7N7uQ8O-GX3IYLcxzi8Oaoh6', '2023-04-20 19:01:59', '2023-04-20 19:01:59'),
(22, 164, 'd7aSd2JVJTEGjOr4fdX-xe:APA91bEIJZxb-pXYp72rLDSrvvYFNwdVm9BsyEJIpXYaw-9vgAZUn35ozDSMS7CGAQo6BsoILlVAtI-bghyOpM7ITl3QmiQAXbzVKusdRGMAJf1x2-vs7N7uQ8O-GX3IYLcxzi8Oaoh6', '2023-04-20 19:05:25', '2023-04-20 19:05:25'),
(23, 185, 'd7aSd2JVJTEGjOr4fdX-xe:APA91bEIJZxb-pXYp72rLDSrvvYFNwdVm9BsyEJIpXYaw-9vgAZUn35ozDSMS7CGAQo6BsoILlVAtI-bghyOpM7ITl3QmiQAXbzVKusdRGMAJf1x2-vs7N7uQ8O-GX3IYLcxzi8Oaoh6', '2023-04-21 07:50:46', '2023-04-21 07:50:46'),
(24, 183, 'eNAr2xICsickPEDbuMllUw:APA91bFRC0tLZg9vH75ccE578ftdgepZ3adx1wv4SWpbemVvXMV9gdWQGXbX_8fFSJWkbWcRgQ-j4xO3FP1LHz7sx7ger_FyFuA17ssQ2DXNWb4Y6v6lvdlTovxQUGKZoMkmwWLc8u0f', '2023-04-22 06:51:36', '2023-04-22 06:51:36'),
(25, 183, 'eqSX5yJbnet46brhZ8juhH:APA91bEsOiweU6ip6DcouoPeDeoe8VN91VtDgfbOBzx33PluZfqSsWuQJrTi2Ug4BRcGfscwpmeiyEd6jmUOCYv2Da6ggCaYd7eJkHAW56HRIfCtNDLN79BunuyIFxN7FM37AoIDkuT0', '2023-04-22 08:00:06', '2023-04-22 08:00:06'),
(26, 1, 'eNAr2xICsickPEDbuMllUw:APA91bFRC0tLZg9vH75ccE578ftdgepZ3adx1wv4SWpbemVvXMV9gdWQGXbX_8fFSJWkbWcRgQ-j4xO3FP1LHz7sx7ger_FyFuA17ssQ2DXNWb4Y6v6lvdlTovxQUGKZoMkmwWLc8u0f', '2023-04-24 11:11:17', '2023-04-24 11:11:17'),
(27, NULL, 'f6Ct_bouRdoRNijh3SlFgO:APA91bGF9mmL_fsHE8MGYE6-pTfhx0yH91RSsOHZMixGeL0_AUPuMm6oBHSp5ZBhoAznXE8TqXfJuHCXjJkbnrdG1x2ORIwYtbQ5oupVqo5bkTt3VEuMK9rKc8LfPPsIWyATM4XDyp_9', '2023-04-28 11:06:24', '2023-04-28 11:06:24'),
(28, 183, 'f6Ct_bouRdoRNijh3SlFgO:APA91bGF9mmL_fsHE8MGYE6-pTfhx0yH91RSsOHZMixGeL0_AUPuMm6oBHSp5ZBhoAznXE8TqXfJuHCXjJkbnrdG1x2ORIwYtbQ5oupVqo5bkTt3VEuMK9rKc8LfPPsIWyATM4XDyp_9', '2023-04-28 11:10:58', '2023-04-28 11:10:58'),
(29, 183, 'fJDWT94CYko5rspOGy9gzO:APA91bFg_InBukPVt1ghUTOJ-IrXbxi7fQQcX3eR_fHq9DI5yFG1uymwHDkIRM2Mi7eD5754re_0z6zWl7SkyxAnq2CWNLdiVc9r_NBoq5RMzNw7q6FPCguW8fTwECPNaAQ6Do5jHeqY', '2023-04-28 13:32:27', '2023-04-28 13:32:27'),
(30, NULL, 'fJDWT94CYko5rspOGy9gzO:APA91bFg_InBukPVt1ghUTOJ-IrXbxi7fQQcX3eR_fHq9DI5yFG1uymwHDkIRM2Mi7eD5754re_0z6zWl7SkyxAnq2CWNLdiVc9r_NBoq5RMzNw7q6FPCguW8fTwECPNaAQ6Do5jHeqY', '2023-04-28 13:34:47', '2023-04-28 13:34:47'),
(31, NULL, 'fliPzw3zVONWkc3JcMmL4w:APA91bFuQ7ML684wKvv2oNAxDbDq0BVNUdE3kl6DpFfvSHg_PjOTyK1QOiR-DAzhPVLqtxcLhUFnDsLm-PROwKFBNoDtndIIdtcrmbmA3Ltnhd5ciuSqNb-sRaErgt2hNSdv4mmbMqRY', '2023-04-29 01:42:52', '2023-04-29 01:42:52'),
(32, 164, 'f6Ct_bouRdoRNijh3SlFgO:APA91bGF9mmL_fsHE8MGYE6-pTfhx0yH91RSsOHZMixGeL0_AUPuMm6oBHSp5ZBhoAznXE8TqXfJuHCXjJkbnrdG1x2ORIwYtbQ5oupVqo5bkTt3VEuMK9rKc8LfPPsIWyATM4XDyp_9', '2023-04-29 02:32:32', '2023-04-29 02:32:32'),
(33, 181, 'f6Ct_bouRdoRNijh3SlFgO:APA91bGF9mmL_fsHE8MGYE6-pTfhx0yH91RSsOHZMixGeL0_AUPuMm6oBHSp5ZBhoAznXE8TqXfJuHCXjJkbnrdG1x2ORIwYtbQ5oupVqo5bkTt3VEuMK9rKc8LfPPsIWyATM4XDyp_9', '2023-04-29 10:16:35', '2023-04-29 10:16:35'),
(34, 1, 'fPw2gI90OGJaczE_ZzLsNr:APA91bFaDXEDQqaMIBgSAsfcwfjNvrP6-VnowjhHSdA5wjw7q8s7nnxANjmoRr4qp4s8bAef61pDCldHG5CoLaAf1w3iJhhL7l7HM2U6hiUnLHEdXt7a9aAN5p593EGbU7BokfvfDx6W', '2023-04-29 12:50:55', '2023-04-29 12:50:55'),
(35, 1, 'f6Ct_bouRdoRNijh3SlFgO:APA91bGF9mmL_fsHE8MGYE6-pTfhx0yH91RSsOHZMixGeL0_AUPuMm6oBHSp5ZBhoAznXE8TqXfJuHCXjJkbnrdG1x2ORIwYtbQ5oupVqo5bkTt3VEuMK9rKc8LfPPsIWyATM4XDyp_9', '2023-04-30 02:32:06', '2023-04-30 02:32:06'),
(36, NULL, 'faxWDgyyFv0Rl90k8O4Or-:APA91bHpGyMbQuET95qyRP81NNNjHhhrh2H5gcnv0vTmRJsVZl_Rqjqzo7uClFbYZDwDZW8mJwG6xD1yi6WBRRHMmpA7SUSptYwqYQlttFZnwvK7m8IH-clbjC1ZXiJ89NUS0gmivR_K', '2023-04-30 03:35:45', '2023-04-30 03:35:45'),
(37, 185, 'fJDWT94CYko5rspOGy9gzO:APA91bFg_InBukPVt1ghUTOJ-IrXbxi7fQQcX3eR_fHq9DI5yFG1uymwHDkIRM2Mi7eD5754re_0z6zWl7SkyxAnq2CWNLdiVc9r_NBoq5RMzNw7q6FPCguW8fTwECPNaAQ6Do5jHeqY', '2023-05-01 04:41:40', '2023-05-01 04:41:40'),
(38, 183, 'ebp2SVxV48YGDLMOFlrWsV:APA91bHqdwltjGKcmQ6gRSb_uFaahCdODg1LJjPn2wracvrXEiDb-oDS3PQlxDH1r1ZuF80sYpDnc25g3z86y4XVdgwnerBWIJELDGmrz5na9h5ByzZUgPyvGG84N-QjLiT8xhwOQ4pi', '2023-05-02 05:46:05', '2023-05-02 05:46:05'),
(39, NULL, 'ebp2SVxV48YGDLMOFlrWsV:APA91bHqdwltjGKcmQ6gRSb_uFaahCdODg1LJjPn2wracvrXEiDb-oDS3PQlxDH1r1ZuF80sYpDnc25g3z86y4XVdgwnerBWIJELDGmrz5na9h5ByzZUgPyvGG84N-QjLiT8xhwOQ4pi', '2023-05-02 05:55:58', '2023-05-02 05:55:58'),
(40, 181, 'ebp2SVxV48YGDLMOFlrWsV:APA91bHqdwltjGKcmQ6gRSb_uFaahCdODg1LJjPn2wracvrXEiDb-oDS3PQlxDH1r1ZuF80sYpDnc25g3z86y4XVdgwnerBWIJELDGmrz5na9h5ByzZUgPyvGG84N-QjLiT8xhwOQ4pi', '2023-05-02 05:56:10', '2023-05-02 05:56:10'),
(41, 181, 'fBD9o7WUhk-f7mS875JFzl:APA91bHqS5Dgfw7A_Bv7EbB2N6MgDl8hv1-YR6K7baFeJDw9FO-hJE9BzW0CvvFCmB7pKEn-2Y0F893Rba1HmLRVU-isWejNi2KVGKYKwUPiuktWcNe4FhhbMcV_3SN0VP41KJMXFvml', '2023-05-02 11:56:59', '2023-05-02 11:56:59'),
(42, NULL, 'fBD9o7WUhk-f7mS875JFzl:APA91bHqS5Dgfw7A_Bv7EbB2N6MgDl8hv1-YR6K7baFeJDw9FO-hJE9BzW0CvvFCmB7pKEn-2Y0F893Rba1HmLRVU-isWejNi2KVGKYKwUPiuktWcNe4FhhbMcV_3SN0VP41KJMXFvml', '2023-05-02 12:02:16', '2023-05-02 12:02:16'),
(43, 183, 'fBD9o7WUhk-f7mS875JFzl:APA91bHqS5Dgfw7A_Bv7EbB2N6MgDl8hv1-YR6K7baFeJDw9FO-hJE9BzW0CvvFCmB7pKEn-2Y0F893Rba1HmLRVU-isWejNi2KVGKYKwUPiuktWcNe4FhhbMcV_3SN0VP41KJMXFvml', '2023-05-02 12:02:31', '2023-05-02 12:02:31'),
(44, NULL, 'dkNMSB9KhthGnBGNsuXyDA:APA91bE5f9J7KucZK_JwdNxES5FNx1tHmtz3eEKAxOi2NrHzN5_zY0Yn5wL_BpMfxVN2DObW1W_51jg0nJkoA8Ijd7D61t7KSKUR56kQvZOZ2j3PLa_DcepcIM9N_ObVGQNzPj6ljZPT', '2023-05-02 12:13:03', '2023-05-02 12:13:03'),
(45, 183, 'dkNMSB9KhthGnBGNsuXyDA:APA91bE5f9J7KucZK_JwdNxES5FNx1tHmtz3eEKAxOi2NrHzN5_zY0Yn5wL_BpMfxVN2DObW1W_51jg0nJkoA8Ijd7D61t7KSKUR56kQvZOZ2j3PLa_DcepcIM9N_ObVGQNzPj6ljZPT', '2023-05-02 12:13:24', '2023-05-02 12:13:24'),
(46, 183, 'c_BcCIv96Eyw-sbfD7-_dh:APA91bFEB_Q0pqkp2kvsC9faEWosWFVXpUwoZn7dpTdI86MlL1vNUOoTzbd7D4RDj1HCHGJTzoFtyroVDkpH4taazsxJZW7nbwAGBbO0tdXEbUptyxl47ECkC0EjCMTLNMbjxRzuvaVP', '2023-05-03 02:13:03', '2023-05-03 02:13:03'),
(47, NULL, 'c_BcCIv96Eyw-sbfD7-_dh:APA91bFEB_Q0pqkp2kvsC9faEWosWFVXpUwoZn7dpTdI86MlL1vNUOoTzbd7D4RDj1HCHGJTzoFtyroVDkpH4taazsxJZW7nbwAGBbO0tdXEbUptyxl47ECkC0EjCMTLNMbjxRzuvaVP', '2023-05-03 02:13:27', '2023-05-03 02:13:27'),
(48, 1, 'cskArNxdeW4qb94ZzIN7pF:APA91bHznw2524rs8jPeKcE3tAxPK_zSHyR0bUZ83zIqA1YlNRv3Nol1MXCIpWtOJgyIBeo7GuSkj5O8_NqYwvJ8Q_2G7f_tfFI5UGi7S3p6ahlWxcc8wu94XgNUqb2ORNolj_UAa_27', '2023-05-03 11:45:40', '2023-05-03 11:45:40'),
(49, NULL, 'fMxqHqU1w6rxOXdVqdus6B:APA91bHuqfPn-QWZ9w3cjsIdkuDHxwwDLjudN8JDEJrcqZN2eYZHvvaAbfT6j-AgsNCbVn6S1fHOlNaDgaguDHO7ig6diRT05C9ST4ivbmI2KnOebpto04shUZnZk4xU4ymyMe2jcjmi', '2023-05-04 08:49:48', '2023-05-04 08:49:48'),
(50, NULL, 'furOr3pfp44cpkHkaH-BqM:APA91bF2vZi2zEBbzmzoHW845rHfqvXlw8lUBTolWxPzVluQV33vtNjoEPGvZqzz_toPFkBltieSMd6LmeAtLZxctR63uj7tFbI21_LCkVCOhfi3RHjfEdU1WQpJYlf0pPZie9_Z8FJk', '2023-05-04 14:37:13', '2023-05-04 14:37:13'),
(51, 183, 'fozA4TByGdeKK5XEGAK-R0:APA91bFszmbrZueMmTP7Wb96icV3ayx3n4VlTZEh6HqZ21_Mmrn6aewSBMdjCkp649ZQaG5bBRtJAcnbp1Q9drG3KEDNGH0OjBpygeOh4PfSOArD1ZKk9SGSYVtgrrITUPySquV48qF7', '2023-05-06 10:47:49', '2023-05-06 10:47:49'),
(52, NULL, 'd1Hhf-zdcqtGK-tOh0CE1m:APA91bEanC0EdS0Na-SxECsrsuEqS1qbAK1YJmK4wXgdg4DFGMj1B9MXGo6CQXCTf3gM7VsS5QZFqHyUfhWj7qBrltD3tog7q1LDHkvLMG2pqrOInV6l2WJHBJt-ve8vfJOsqxk0GvNH', '2023-05-06 10:49:25', '2023-05-06 10:49:25'),
(53, 183, 'cq7AMFJUDoIO0CcZtRYV_D:APA91bHdXzkL3SjXnsnNTmjtMwQ_qzHWbX-VRsnqR-18lRxrEtntyzima7zCi4JLBBa28LSAF9dMDE1PAMctf-39dKGU87nzQ0H4K54srLJAaeAKZchPEseQwcj2jXcYJoYNEEsXOKD2', '2023-05-06 10:52:11', '2023-05-06 10:52:11'),
(54, 183, 'd1Hhf-zdcqtGK-tOh0CE1m:APA91bEanC0EdS0Na-SxECsrsuEqS1qbAK1YJmK4wXgdg4DFGMj1B9MXGo6CQXCTf3gM7VsS5QZFqHyUfhWj7qBrltD3tog7q1LDHkvLMG2pqrOInV6l2WJHBJt-ve8vfJOsqxk0GvNH', '2023-05-06 10:55:39', '2023-05-06 10:55:39'),
(55, NULL, 'cq7AMFJUDoIO0CcZtRYV_D:APA91bHdXzkL3SjXnsnNTmjtMwQ_qzHWbX-VRsnqR-18lRxrEtntyzima7zCi4JLBBa28LSAF9dMDE1PAMctf-39dKGU87nzQ0H4K54srLJAaeAKZchPEseQwcj2jXcYJoYNEEsXOKD2', '2023-05-06 11:35:22', '2023-05-06 11:35:22'),
(56, 164, 'cq7AMFJUDoIO0CcZtRYV_D:APA91bHdXzkL3SjXnsnNTmjtMwQ_qzHWbX-VRsnqR-18lRxrEtntyzima7zCi4JLBBa28LSAF9dMDE1PAMctf-39dKGU87nzQ0H4K54srLJAaeAKZchPEseQwcj2jXcYJoYNEEsXOKD2', '2023-05-06 11:35:40', '2023-05-06 11:35:40'),
(57, NULL, 'cyDNj4OCnq2nBUkD3z2L_S:APA91bFa97es-bY6THN1a5gjbErGYCA-lq5MQr1TS1M9p4ZdvL2x-aU7dodTIpy8kgPBS2FkqdbPdBVrdoovB3-uXte-Xl7YXsRUljCwCbNeUO1il_0CdN0n52JOQFCT5J0Q0xD8S8h3', '2023-05-06 15:38:01', '2023-05-06 15:38:01'),
(58, 198, 'd1Hhf-zdcqtGK-tOh0CE1m:APA91bEanC0EdS0Na-SxECsrsuEqS1qbAK1YJmK4wXgdg4DFGMj1B9MXGo6CQXCTf3gM7VsS5QZFqHyUfhWj7qBrltD3tog7q1LDHkvLMG2pqrOInV6l2WJHBJt-ve8vfJOsqxk0GvNH', '2023-05-07 00:07:04', '2023-05-07 00:07:04'),
(59, NULL, 'crJEchStWaPU7ufxXmCAGc:APA91bH3fkeLZVV7OOC4uSBuR4mMjjEw2jyiQTdTVZk0D4pBRJi4ndusu9nIk32zGdj57S6ZRovxq46R6PLYz_axCZSWlU2D_I93u5zo6vJ6r5VvC6aFB0NvESPxth3cMZF4glpmxYLT', '2023-05-09 03:57:28', '2023-05-09 03:57:28'),
(60, NULL, 'em7mIxmq0AF-NbmnLKGiuN:APA91bH-d29A8oPAMdXXKr8h3aAFMcxXWD-J--XQ4UKfwrlSHHiggGq_ScvLmY1PNqzJQQbRe2mXKNfIZHRbt8Z8mcnTsPTTGua6JBfQ8WHCqPR2ymf2OjvSxr0P_r4clZOnPPtstpHL', '2023-05-10 07:46:42', '2023-05-10 07:46:42'),
(61, NULL, 'c9q64IX_7m3VTOQ9qLT27p:APA91bFTICSHEX0pfaOpup5vNGeJndAFNogbKpwGunMhevV4FMU5iKaRPTv-WqxLAqZmARKbZWL1hlWAkcMQTskzx--jlERclSS0nzyQKHH-Gxo36PVYsJBpzcnnbdtAUIPAaW5NZRj3', '2023-05-10 12:19:20', '2023-05-10 12:19:20'),
(62, NULL, 'e-iYPKlSzQmhvjiqHSyVLB:APA91bHCoP5i_2YvZLwVS3zc4ZoOTLA7PS84d-OcBlACop1m55x4J8ESepAWkW3rk45WIc92TQZ4lZNkIO5-EjAyF4p_rBGHeD_N7Mw295BK2ROEw0S7hMixTI2XcbctBLfCaz5QZxg7', '2023-05-11 09:57:33', '2023-05-11 09:57:33'),
(63, 198, 'em7mIxmq0AF-NbmnLKGiuN:APA91bH-d29A8oPAMdXXKr8h3aAFMcxXWD-J--XQ4UKfwrlSHHiggGq_ScvLmY1PNqzJQQbRe2mXKNfIZHRbt8Z8mcnTsPTTGua6JBfQ8WHCqPR2ymf2OjvSxr0P_r4clZOnPPtstpHL', '2023-05-11 18:19:14', '2023-05-11 18:19:14'),
(64, NULL, 'eT1dNdZFgZYic6mo1kNol_:APA91bErtyzg3wSIuD3uoxf8HtKklANgps1fmoYidMww2QobN4tyRah4gDdWrvlHYcz5sC98TQlh7z9CNYktXJXuSMzoyEJ-NYiOGYLU4s6XZ_wQks5PYeLSSAhd6Z2KecsSgCiKk-Oz', '2023-05-12 07:21:22', '2023-05-12 07:21:22'),
(65, NULL, 'fvcfdiBe11f18W0cgqJQ65:APA91bE4gRHJKxbkNtaD8hlaLh9FaCvvCrn-mrYcria339eI_6N7Y6N7ScTpXyw4rFkmgHv--lRifANgd-p0_lRhYycY7G3AWzeJXljZtQZNel7kyXFi74f7kD5n40qe37elZRoywkho', '2023-05-12 10:46:33', '2023-05-12 10:46:33'),
(66, 164, 'fvcfdiBe11f18W0cgqJQ65:APA91bE4gRHJKxbkNtaD8hlaLh9FaCvvCrn-mrYcria339eI_6N7Y6N7ScTpXyw4rFkmgHv--lRifANgd-p0_lRhYycY7G3AWzeJXljZtQZNel7kyXFi74f7kD5n40qe37elZRoywkho', '2023-05-13 06:18:34', '2023-05-13 06:18:34'),
(67, 206, 'fvcfdiBe11f18W0cgqJQ65:APA91bE4gRHJKxbkNtaD8hlaLh9FaCvvCrn-mrYcria339eI_6N7Y6N7ScTpXyw4rFkmgHv--lRifANgd-p0_lRhYycY7G3AWzeJXljZtQZNel7kyXFi74f7kD5n40qe37elZRoywkho', '2023-05-13 06:53:10', '2023-05-13 06:53:10'),
(68, 207, 'fvcfdiBe11f18W0cgqJQ65:APA91bE4gRHJKxbkNtaD8hlaLh9FaCvvCrn-mrYcria339eI_6N7Y6N7ScTpXyw4rFkmgHv--lRifANgd-p0_lRhYycY7G3AWzeJXljZtQZNel7kyXFi74f7kD5n40qe37elZRoywkho', '2023-05-13 07:07:19', '2023-05-13 07:07:19'),
(69, 1, 'dB9vlDl5vZNazhvPDYduJ9:APA91bEkwYu6D4eQCzhkqb7jPz-3LZb3bo2WjEbySsCR0GAHsw36z9FAXbcQHXtFi0iGEhbSvfEY5sudEvGKixZjzxl7QuvErfKNSeaTPwuWF0Jchz2gpQ-kpMA3FYlSzE78rYeedD7Y', '2023-05-13 10:52:13', '2023-05-13 10:52:13'),
(70, NULL, 'e59wEbWKdNxUB8V9Gh6tnU:APA91bGsddHZz6v6v9qV_kWsoNWy9pJ4heUMr-b6_JEqKoOfv8AsJSkfzg1pQCJoAGBqrcvwsKnHvxkEA3s7xb0g6UPmsHDKO-uPc27vrvsIIjIBgQrytnQB3zZhV52yDgf3Xf_vgWsf', '2023-05-14 02:19:58', '2023-05-14 02:19:58'),
(71, NULL, 'dB9vlDl5vZNazhvPDYduJ9:APA91bEkwYu6D4eQCzhkqb7jPz-3LZb3bo2WjEbySsCR0GAHsw36z9FAXbcQHXtFi0iGEhbSvfEY5sudEvGKixZjzxl7QuvErfKNSeaTPwuWF0Jchz2gpQ-kpMA3FYlSzE78rYeedD7Y', '2023-05-14 08:38:18', '2023-05-14 08:38:18'),
(72, NULL, 'cIPJWaswoD_rvOsJw2Y1UI:APA91bHbI4v4hxWz-Rbs7g104vv31co4u7QgzMnK_FLRmTT-bGNwqymb18ovQEciyaCEkZgRJjCDEdb6XJC-1hyBzH8jKRtd-qYPsGWFi9guEqxygqaAFE8jQ6kZPDOZFVTimP9Q9ZG5', '2023-05-18 01:24:08', '2023-05-18 01:24:08'),
(73, NULL, 'fhMoN-rGL66DhJNAGEkYsV:APA91bFJyabCzmek6QrpD_Lh_sJiDYOkdtsNWlgOn5WfBWxwBrVIGg19UuFYkQz3McC4P0dr1XKmlPVFKC02vJuXYEKlNcCCLuR7050vM8kchYbV06P5wjltsBF6qFPXXRHzzpptr0Li', '2023-05-20 05:47:57', '2023-05-20 05:47:57'),
(74, NULL, 'egpjBRZ25kq8Fgdhcu8CMf:APA91bFv5DsI-KQ3-amXcvcwsDnNCI_-K3xPpJ7vvly84eiQu2NM3eEfBEAlW3gSJmhVAA7FlaGn2-Nnu50TlL3F26Mo4Gl7Fg_qBg9--G-0ianu21WRV8_-sRwms-INIUQzMQBGfWIc', '2023-05-21 18:26:00', '2023-05-21 18:26:00'),
(75, NULL, 'fIHT1U5BG-hd05ncChQp9E:APA91bH8MpEkai4H-LJe2Lj1NLULw8litbmksw2pvRdqP_YXZCNw6emq0Ouui5xcmJLJtC7ZkQTrWJ97-lDnAtvjMEx0xhWf6wdN3f5nqzSeOtTdkPcBNRCUhPqIr7CeYYXq9njz2TSS', '2023-05-23 09:23:20', '2023-05-23 09:23:20'),
(76, 211, 'cOLHYPw8Cird7vcI94nD5u:APA91bExRgLz7pUCvt46izmN_aCjq0nij1XuHkVf8ZGBQaIRs3xk6-Ur7aGMg_WIjAxuOX9ynmWkg0ZFePSkA5OAVTU4Jo2M7P3WtOTdSil5w3tGd9A6bqLc3lw2SiJdFfCMXnBAiYU4', '2023-05-26 19:34:56', '2023-05-26 19:34:56'),
(77, NULL, 'fatNnWvyUEL5X0GALf8UQC:APA91bEzII_HhelvrbEUWuuY_FdqEU4TWz0KfSDxCvzoJUwRlza8vtcTZIQf1WoYt7sma57_AtGFgFCc5PnHBaldHXMpNTD9TaOEhXjSYmyFH2nh8q3_99G2kypSNCFc3spboYnWjy73', '2023-05-27 11:40:22', '2023-05-27 11:40:22'),
(78, 1, 'fatNnWvyUEL5X0GALf8UQC:APA91bEzII_HhelvrbEUWuuY_FdqEU4TWz0KfSDxCvzoJUwRlza8vtcTZIQf1WoYt7sma57_AtGFgFCc5PnHBaldHXMpNTD9TaOEhXjSYmyFH2nh8q3_99G2kypSNCFc3spboYnWjy73', '2023-05-27 11:50:39', '2023-05-27 11:50:39'),
(79, 212, 'dSf9FXTtE1D24ek7LO7LG4:APA91bEnY1CO3pDkQ0OAxghzB04M_5hX_3PEOhpU9YY8PEglfRFXgQVh5WGRUTnKu1OF49hTvk08vIp31HGv0436qen_jGpDbW3tDMN-b7egber1MsNQjK78ryImkbuChHu-1XOUJjr1', '2023-05-31 06:57:14', '2023-05-31 06:57:14'),
(80, NULL, 'dSf9FXTtE1D24ek7LO7LG4:APA91bEnY1CO3pDkQ0OAxghzB04M_5hX_3PEOhpU9YY8PEglfRFXgQVh5WGRUTnKu1OF49hTvk08vIp31HGv0436qen_jGpDbW3tDMN-b7egber1MsNQjK78ryImkbuChHu-1XOUJjr1', '2023-05-31 06:59:42', '2023-05-31 06:59:42'),
(81, NULL, 'doJ8ouPsjyxAmR4b552oXP:APA91bEjztPCL43FiBYVvboFWmumiZx3Q14xbXSUJKiURnVm1DdlBNtruSOyUgBz5lb7yvixa5SDiDFItJ01wKs3tYlLwNad242-hbpszNn8NnHrNRCf_mzmWWD-gWAEcnmaLjlQOHX0', '2023-06-05 11:44:45', '2023-06-05 11:44:45'),
(82, 214, 'eWqEIsry7q6O4acUU7mz-c:APA91bHPYwexmuz_npdnHmNIVVzcjjrfx1hnHuqQ3WKGNdM5qA2BNard91ylrOt1pxcFKwFEXKbANLf3DBrhKz3Z4t1zPPOx_sf1ZOvxmTdeKb8h9IRoRR0Im2CP44zRh7B3oT0G4-fQ', '2023-06-10 13:58:58', '2023-06-10 13:58:58'),
(83, NULL, 'eWqEIsry7q6O4acUU7mz-c:APA91bHPYwexmuz_npdnHmNIVVzcjjrfx1hnHuqQ3WKGNdM5qA2BNard91ylrOt1pxcFKwFEXKbANLf3DBrhKz3Z4t1zPPOx_sf1ZOvxmTdeKb8h9IRoRR0Im2CP44zRh7B3oT0G4-fQ', '2023-06-10 14:01:09', '2023-06-10 14:01:09'),
(84, 215, 'eWqEIsry7q6O4acUU7mz-c:APA91bHPYwexmuz_npdnHmNIVVzcjjrfx1hnHuqQ3WKGNdM5qA2BNard91ylrOt1pxcFKwFEXKbANLf3DBrhKz3Z4t1zPPOx_sf1ZOvxmTdeKb8h9IRoRR0Im2CP44zRh7B3oT0G4-fQ', '2023-06-10 14:02:01', '2023-06-10 14:02:01'),
(85, NULL, 'cDL_Y_eIIY1hNTPgEn4PYp:APA91bHOJsoQfTATetryF-_KES7YAThGvMn26WIulwIQoNky_AqrVgsolinXyRyt5Djz4ft75e6x5F2bL4ESbFSxArKVoTvjvkfjqp6At7d6ptGfW8jpR82ztbngjL6mGgQRk9ZmMf5_', '2023-06-18 20:54:56', '2023-06-18 20:54:56'),
(86, NULL, 'eqAssfvuVU7Mmh1L_MGdxl:APA91bH_jHCdbJ7h31x1YKVEyixwc_wQV523Do8SGqTvGRCUhxwj5NZ1QOgPzYhp2_g_x-glrH2CHbW2JJQ4sWSvrVPr29Rm1opqOXe9TK8PTtNcm_j-mi-Va_kRqFdLOTb-35oKp2Nd', '2023-06-22 13:10:20', '2023-06-22 13:10:20'),
(87, 1, 'cDL_Y_eIIY1hNTPgEn4PYp:APA91bHOJsoQfTATetryF-_KES7YAThGvMn26WIulwIQoNky_AqrVgsolinXyRyt5Djz4ft75e6x5F2bL4ESbFSxArKVoTvjvkfjqp6At7d6ptGfW8jpR82ztbngjL6mGgQRk9ZmMf5_', '2023-06-22 20:13:49', '2023-06-22 20:13:49'),
(88, NULL, 'dlJR98aHE1t5wZE4Ypah5k:APA91bG4s0VOo6FgtF0RwEg1YeSA7ak1dmm1tjsFfzY885_5ZzMWJbmIzxdGIKAUbC-FtwqPDs2exrzR1A3zoijbxiI3dZEo1VCMJVh7pHcUFiT7fkCs6nT3f_r8hhRyetIJE49Nvcny', '2023-06-23 22:51:17', '2023-06-23 22:51:17'),
(89, NULL, 'cRVFOtEE_jzr95CC1_YxUy:APA91bELHPaxa3NlhUh1IE0leZOc8mvWhfgLhflo9EenQJJChq_WD0_p9m7wPKaZwCASp2_z3VSgyLwC1zdyD6uLaXOcQrT4xRGc5NIitkQNIHX5t52L7DIwpk3hJDkYLaYMyeMk14NI', '2023-06-30 01:48:24', '2023-06-30 01:48:24'),
(90, NULL, 'dL7qgk6zvhauQsi_DgND_E:APA91bHZLRlxjoJGZsfwaIXUwg0EGVkowVLxo4_8l0-CEg5jfkEtRaRqbtaRDC26_Ggngv_onslunxmNBUvwfUGhMXzjs1bjqR7v3LC4NKZEWpYfY8MjfJpZCMcc7a85s0O9898xl3YN', '2023-07-01 06:24:14', '2023-07-01 06:24:14'),
(91, 227, 'dL7qgk6zvhauQsi_DgND_E:APA91bHZLRlxjoJGZsfwaIXUwg0EGVkowVLxo4_8l0-CEg5jfkEtRaRqbtaRDC26_Ggngv_onslunxmNBUvwfUGhMXzjs1bjqR7v3LC4NKZEWpYfY8MjfJpZCMcc7a85s0O9898xl3YN', '2023-07-01 15:09:10', '2023-07-01 15:09:10'),
(92, NULL, 'fz7sMQEGtanmjsSxIWmuwm:APA91bFwc-vIQBHFxgmSiyj91nXa1_yv_NmfgtKu3HqQqxSkHeCOCbUyOQpzSbmhtRyYaJrOE8bVQiMY0TlolhhdmVCdw8OiZGmrlRGeZFf31ykAZyNxXFLv_V7I7zd65BGhBi-myhhF', '2023-07-02 00:18:47', '2023-07-02 00:18:47'),
(93, NULL, 'doN5pTZPZ6MuFxOOC2oUSM:APA91bGI3umvnt1rtrNtDNWnmTIUciznKeCpwIhNt_JF8yayeYJ5YsnxB9hWQ_171oUxEbAzy4W1OF0-CwN7PDwkLiishM1LMEtPBhe8Z1Y9mB2PTFDMtraPgXg5GzVFId396zg4zANI', '2023-07-03 09:57:25', '2023-07-03 09:57:25'),
(94, NULL, 'dEK8Be_j0DwqmCsie54BL2:APA91bHAq5ag4oLP4JXJ6fWtFTNDZa2CpG5a3e5KhZR5Zqco2lAede8W7NOZRURifYhgZLlNVaELGJlAvfq7UALnWKRSEFkYCvyhkqTmA14750bGnoFEr8NJl5wc9NwQYZf6WJhliLjy', '2023-07-07 23:11:16', '2023-07-07 23:11:16'),
(95, NULL, 'czuEAyIU9tMFNjBnv8olkO:APA91bGMLik2LdXfJyNit0NBIhA-omouxi3YSLDhSPVn-Wx7qu3ZxA2ug9BiL2hshS1FVWp36t_AXRjSBwEv1fGQ1Rf94X31aimp4Rq7_s2qP_d0cmZVk95E9VQYo9i4JloFSJAiWLXq', '2023-07-08 05:05:34', '2023-07-08 05:05:34'),
(96, NULL, 'csVkWAeNu6aa5xLrmP53Xy:APA91bGVJi2xvwkvWXNsKZpVt8lsICrRzsXNlO2pLcCV7SAo-_OTekaKFsKhlMp_MXumVb-YA-Dn5lNWGQlsWFwV405vhZeYYQ4sz2HI1qXxon-MmTFw_0Rmr3X-jYUGVZR0sSDSOoGS', '2023-07-08 07:22:10', '2023-07-08 07:22:10'),
(97, NULL, 'fzJI0ACH5VRE3W04jA72fr:APA91bH2eXGNH55vuDnVwoP2KCqjyvP8Dal7VBj6ibNo0-o0X6g60nkCtOunvlWTFaWEE208DnT6Pk_M2T_hN0v1P8y4vq9hie2ffevoDjJ6ciiYbxuKkCF7BOM_TTnBBjbQDXen1ngd', '2023-07-11 13:42:00', '2023-07-11 13:42:00'),
(98, NULL, 'dRfdA0QcHyMdG25ASSkdSJ:APA91bFfpwI3cIL26EvBYyM3uIsUjARtHx7CEo9YAbFlLtgoSqlugkdZIwm9MWYlixc4h1V8rWMvPNHfoLgcvB0mU3khqB6WcyPdcEgIhQfiEyKhcGY2-eoBmI7hB7lx2tNMhhvv8kwt', '2023-07-12 02:25:08', '2023-07-12 02:25:08'),
(99, 233, 'dRfdA0QcHyMdG25ASSkdSJ:APA91bFfpwI3cIL26EvBYyM3uIsUjARtHx7CEo9YAbFlLtgoSqlugkdZIwm9MWYlixc4h1V8rWMvPNHfoLgcvB0mU3khqB6WcyPdcEgIhQfiEyKhcGY2-eoBmI7hB7lx2tNMhhvv8kwt', '2023-07-12 03:03:02', '2023-07-12 03:03:02'),
(100, NULL, 'e5iJlI3SYGQR4hr7CaRs5F:APA91bEW1bGUZprT_2qDK-MDw6tzsU5V7m1xdf5DeWX0tdPnLEw--TZK8T6gH-DGt4MnLkgSqc4vuXjlbytrD2JtJYuVhaImqTCSld38FlMDZmq-vREHN0ph1FlTqkYE9N9OoqTXUk-9', '2023-07-13 07:28:17', '2023-07-13 07:28:17'),
(101, 1, 'eNYV1WjLN6hBPJlWVXGg-w:APA91bFHHO6VpyXKvsq_WjdkOx6TIl4-iA2eEC39EhEVuBomxUPBey-fuBe1mjWg9ukXtyPTdvJCP6009subIY6p3-GZfEHXuQz-s-uIS-GOF_HkCnFLcI9TRJ8xUsTstiHgvftjlZ9d', '2023-07-14 04:49:42', '2023-07-14 04:49:42'),
(102, NULL, 'eNYV1WjLN6hBPJlWVXGg-w:APA91bFHHO6VpyXKvsq_WjdkOx6TIl4-iA2eEC39EhEVuBomxUPBey-fuBe1mjWg9ukXtyPTdvJCP6009subIY6p3-GZfEHXuQz-s-uIS-GOF_HkCnFLcI9TRJ8xUsTstiHgvftjlZ9d', '2023-07-14 04:59:47', '2023-07-14 04:59:47'),
(103, NULL, 'c4uTfMOab7cmgAJIL2bh2a:APA91bHKxTffQF4jU88kcjk4h27PWPyB2YiT9B5oN8whJqyq0E2JqJQT13yLD0nwpzvkb33YW1fJXo7xZ2lO0LnpqY6_sellSLShf2wM7VkWZswymegXKaNRLfDwwiwgsH7-38GvmIL2', '2023-07-27 07:37:04', '2023-07-27 07:37:04'),
(104, NULL, 'dC8NhueOvBSj-H0T3NbUFd:APA91bG_J38vdYfeUBs6dRP5SiU90nt0sGj9vpdDiPyGfx9qwifoKwE31qagcF8ArLDIy8lUWkDLwhAwIayAMuhw6pWIbsvkGB345lzd3tMfSfzQFBZSvZP3hBXXkGDqkOUSF4PJUJ0S', '2023-07-29 11:31:12', '2023-07-29 11:31:12'),
(105, NULL, 'c8xoMS6txtzrNXlAEh7_eY:APA91bEvfYBAVcu6uMSgCKulXbd37Cy_3uFT2-dEXixiRoAr_S0IYdKMaz4QAkku8K8ZWXBI1uhi06Vd3vc2eXNRfh7OFtvayx6R3-Svw8kKD5Ho0iAV_lK4p4OiAhnKeT1v8NjNv9hp', '2023-08-04 14:01:24', '2023-08-04 14:01:24'),
(106, NULL, 'd_VKCPYtcJ9bZwPlg51Gu-:APA91bFQFso1tRWLZWkqjD9rDMekvd-jw71EOZN-EouOXvbY7Yn-2WJNzo76wLoeoMo7PgtlC8ormpffvx0k96eQvUizcy9sH2S5VGQ8JpUgXEJz7ij85Ptsm3MKNkCEqYvnpPv7QA8s', '2023-08-07 01:02:43', '2023-08-07 01:02:43'),
(107, NULL, 'fAEsbtN102Jkn6VPctn5ZI:APA91bGLzl6APQtSvTaw3NSk08gWYuDANP_1aFrXkiZCE4pvg5Wilu_Tk0jgMmMxy2B6xrzv_sxQ7TNc-O4bH7Mwb58QDwbg7c5DJKsH3KRNUR83u2ftfu_WEEHyIb0ueVv4HYnTg2gz', '2023-08-15 14:57:05', '2023-08-15 14:57:05'),
(108, NULL, 'fCi4cd5obulftwLxNe1LUm:APA91bHvgJiB517LtZph2_c_JFlNKqg-26Nf2rdHcZuP4KvZzfxvvUSYIu3pSWTTKesY8nRNtU4UIGHbE3YePSClxMrWndByol2DsPHyUcogYtEN7NSO5OXqzwzTjDrppoyY6qv-SRgp', '2023-08-19 04:37:14', '2023-08-19 04:37:14'),
(109, NULL, 'dGbffmsXu4AD3-xRQwysSC:APA91bEeUEbfHVEKepN_YXACB7-Jy9-6kuCnRIvN5VUCVAqSiW0Ff23piD8APn5hK_3HMAD0tf2YqkHob0Cc4MbVnNPsO7eyTPWB1g9iFkfTdDDw99TykK-SFwSXpwshruTwlIfZPCKS', '2023-08-22 22:12:20', '2023-08-22 22:12:20'),
(110, 1, 'dGbffmsXu4AD3-xRQwysSC:APA91bEeUEbfHVEKepN_YXACB7-Jy9-6kuCnRIvN5VUCVAqSiW0Ff23piD8APn5hK_3HMAD0tf2YqkHob0Cc4MbVnNPsO7eyTPWB1g9iFkfTdDDw99TykK-SFwSXpwshruTwlIfZPCKS', '2023-08-22 22:35:57', '2023-08-22 22:35:57'),
(111, NULL, 'cc84NG_dlCRSm5m_iCbpKt:APA91bF0QPYxs_bI0Byx7peXZmyMeNMno7b-Nar3JAiGLRUEZ9rp_NylQtQaI0qYDfj9wYmqgLmMmQLc_9cF-5SMINvdfQC1hEYgn_fxL7hepGwGn6QtpNFPjr7eWhApV2ghuXNE-flh', '2023-08-22 22:52:52', '2023-08-22 22:52:52'),
(112, 1, 'cc84NG_dlCRSm5m_iCbpKt:APA91bF0QPYxs_bI0Byx7peXZmyMeNMno7b-Nar3JAiGLRUEZ9rp_NylQtQaI0qYDfj9wYmqgLmMmQLc_9cF-5SMINvdfQC1hEYgn_fxL7hepGwGn6QtpNFPjr7eWhApV2ghuXNE-flh', '2023-08-22 23:07:29', '2023-08-22 23:07:29'),
(113, NULL, 'fmuuI6mFdY8ktJ3g-Isa28:APA91bGLY2c84NFiBifXz6mlrliN_VZRkmU0eXTCjmEhtCUN02eWjLuaY5jgwWonfGkZWgT43hXpQqeXKd79PSLG5uML8tdR788Poi6Kt61HJPwzS7r2fdEB4QL8-hsUHTDYgvIw2GyQ', '2023-08-23 04:02:34', '2023-08-23 04:02:34'),
(114, 249, 'ezLotw35tDKs30-TE7s19O:APA91bGjUrJNw1xZ2axcdn3z1VAhRTqEQYq9oWY2rdqL7MY5q4hlJ5_hUKY-MtJzJ099xIIgfCYGmFnHC47hpES5RXST1RDbbyGZxbPlT_CNURJkCnYfqIN9NPmy75sa7ChuimCGlmT2', '2023-08-23 05:57:09', '2023-08-23 05:57:09'),
(115, NULL, 'f4LzB4R-nieYDlfsjoarDJ:APA91bE-wB619c8yPVNz6CXB4ZyumoVXIUmI2J-PKthwQb_J1XpVhnwnzs9wOVoV5pKsDoWoSbqH2UvGIxk-ho33KdC2IptCde5Ku3bdlMDQ3vhA99qBgVhg7VjH6mxUhJR5oIrkjzeu', '2023-08-24 00:40:30', '2023-08-24 00:40:30'),
(116, 1, 'f4LzB4R-nieYDlfsjoarDJ:APA91bE-wB619c8yPVNz6CXB4ZyumoVXIUmI2J-PKthwQb_J1XpVhnwnzs9wOVoV5pKsDoWoSbqH2UvGIxk-ho33KdC2IptCde5Ku3bdlMDQ3vhA99qBgVhg7VjH6mxUhJR5oIrkjzeu', '2023-08-24 00:45:35', '2023-08-24 00:45:35'),
(117, 252, 'f4LzB4R-nieYDlfsjoarDJ:APA91bE-wB619c8yPVNz6CXB4ZyumoVXIUmI2J-PKthwQb_J1XpVhnwnzs9wOVoV5pKsDoWoSbqH2UvGIxk-ho33KdC2IptCde5Ku3bdlMDQ3vhA99qBgVhg7VjH6mxUhJR5oIrkjzeu', '2023-08-24 01:10:15', '2023-08-24 01:10:15'),
(118, NULL, 'dq8SqidP3HS5LG0woa4Yxk:APA91bFJnl1g_TK4CGxS49iHa0hjqeimTdStAg1ZMykULG6BghD2_TwJSlap1-GDQkpcv_dfZ5qf3bneA2v-_-Ut__w78rwOVkE1HCQDPY2_0ydrqx7aPUNFpH18pmOtkBmdA6RwU34j', '2023-08-24 01:14:11', '2023-08-24 01:14:11'),
(119, 252, 'dq8SqidP3HS5LG0woa4Yxk:APA91bFJnl1g_TK4CGxS49iHa0hjqeimTdStAg1ZMykULG6BghD2_TwJSlap1-GDQkpcv_dfZ5qf3bneA2v-_-Ut__w78rwOVkE1HCQDPY2_0ydrqx7aPUNFpH18pmOtkBmdA6RwU34j', '2023-08-24 01:17:32', '2023-08-24 01:17:32'),
(120, 1, 'dq8SqidP3HS5LG0woa4Yxk:APA91bFJnl1g_TK4CGxS49iHa0hjqeimTdStAg1ZMykULG6BghD2_TwJSlap1-GDQkpcv_dfZ5qf3bneA2v-_-Ut__w78rwOVkE1HCQDPY2_0ydrqx7aPUNFpH18pmOtkBmdA6RwU34j', '2023-08-24 02:51:42', '2023-08-24 02:51:42'),
(121, 1, 'fHFHe7SyfZM0tPpLMycs8r:APA91bH_wuDh4BWOH2s8nWsHfy_6SdPzYlNT3lasOnZMm-RaUDmuNHmarh9TLLep4uUoEvXLNYHLEJlmHNPAmpHydulc2vHSVc9eyAAjgb_i_WjMJInqAtgJJoOKKFKZFpQ76LK7g5l0', '2023-08-25 11:48:08', '2023-08-25 11:48:08'),
(122, NULL, 'fHFHe7SyfZM0tPpLMycs8r:APA91bH_wuDh4BWOH2s8nWsHfy_6SdPzYlNT3lasOnZMm-RaUDmuNHmarh9TLLep4uUoEvXLNYHLEJlmHNPAmpHydulc2vHSVc9eyAAjgb_i_WjMJInqAtgJJoOKKFKZFpQ76LK7g5l0', '2023-08-25 11:51:53', '2023-08-25 11:51:53'),
(123, 256, 'fHFHe7SyfZM0tPpLMycs8r:APA91bH_wuDh4BWOH2s8nWsHfy_6SdPzYlNT3lasOnZMm-RaUDmuNHmarh9TLLep4uUoEvXLNYHLEJlmHNPAmpHydulc2vHSVc9eyAAjgb_i_WjMJInqAtgJJoOKKFKZFpQ76LK7g5l0', '2023-08-25 11:52:03', '2023-08-25 11:52:03'),
(124, NULL, 'cyhIoESX-OFaNC6421BgL8:APA91bFV64jspBd75xipVY7ZqAr8Fj5qb_P9mtYGHkLppCJWl0KHFJpjr0xoN4W1cplxyEACine3vbx4qrOFmPft-X5iT613dmWrU_DFyB3oygUe8EhisUtouwNmQZ50Do2VeAqYqvx1', '2023-08-25 19:21:31', '2023-08-25 19:21:31'),
(125, NULL, 'cluyefzZ8QrxXRmvKsY97g:APA91bHWlbWqp4e7MbC1nAMr8bW3l6An9_MAEI2pLX3h3I7VV-SW4T8a1E61fII84ORQdWpWV4VsfehBhTLqcnSH87xBgbYG46teDm1lXBiRcSYSr-Et8ZuhVLjaeno5HrlgCibe51zq', '2023-08-26 04:26:16', '2023-08-26 04:26:16'),
(126, 1, 'fo7Ke6b2c9tojakmg9Jw6K:APA91bGFN-qvXu4bUpwdO4jDt-l-DZVelpT8Y23d9-E7chgqfaeLWFhUbN2DouYaKCsr_Q8aI_sFX40uDCr626sXZYDUSHf9NFWK2dzFZk1llkqlBHgvxGWSpYsvbvWVQ9Mx1mmYsvLW', '2023-08-26 05:49:59', '2023-08-26 05:49:59'),
(127, NULL, 'fo7Ke6b2c9tojakmg9Jw6K:APA91bGFN-qvXu4bUpwdO4jDt-l-DZVelpT8Y23d9-E7chgqfaeLWFhUbN2DouYaKCsr_Q8aI_sFX40uDCr626sXZYDUSHf9NFWK2dzFZk1llkqlBHgvxGWSpYsvbvWVQ9Mx1mmYsvLW', '2023-08-26 07:08:13', '2023-08-26 07:08:13'),
(128, NULL, 'eMtOcCt79wp3hVZDtOL9Y0:APA91bGP8fH7avgJAUgGotHbvV8s7MlHAV2FEDe3Bt6fvQxZ1TfckX_RJDTxIBXnHxpR5IBr9761ptP_3v6PTM4B7ikbTwJNx9HXwUGhhEw4Nj1Mfz_jcevJ8BFhDv91oeNES17Y48fU', '2023-08-26 10:54:11', '2023-08-26 10:54:11'),
(129, 253, 'eMtOcCt79wp3hVZDtOL9Y0:APA91bGP8fH7avgJAUgGotHbvV8s7MlHAV2FEDe3Bt6fvQxZ1TfckX_RJDTxIBXnHxpR5IBr9761ptP_3v6PTM4B7ikbTwJNx9HXwUGhhEw4Nj1Mfz_jcevJ8BFhDv91oeNES17Y48fU', '2023-08-26 10:54:20', '2023-08-26 10:54:20'),
(130, NULL, 'fqHg-3fw3bKo6wtzyuOZmH:APA91bH044ZuimDSeQZQ085Bu7QhStFysJrCTytUg5bYpz41K0IvJGOuFEfS7Vnm0jX2OXTAkrE5mT7pcsxzbMATJMlmIO1UcAhi81B0hMRbrfrfgJbacpZ8SfXlACKksxpzjjb81KPY', '2023-08-26 12:30:15', '2023-08-26 12:30:15'),
(131, 252, 'fqHg-3fw3bKo6wtzyuOZmH:APA91bH044ZuimDSeQZQ085Bu7QhStFysJrCTytUg5bYpz41K0IvJGOuFEfS7Vnm0jX2OXTAkrE5mT7pcsxzbMATJMlmIO1UcAhi81B0hMRbrfrfgJbacpZ8SfXlACKksxpzjjb81KPY', '2023-08-26 12:30:31', '2023-08-26 12:30:31'),
(132, 264, 'cxuuwpKVqd2gtnEBk9p6od:APA91bF2_tg3BoMSSMuaFvdQltpq4yg0JTscD7AMDkCGdGmW5174NTTZRtnZzC93NQfv1gvQ82wtWh3c4tELwhdOyUohtuZePdzRfusHVk80I-QANtmdZ4bGGipy8pj45uePxDPN3NMq', '2023-08-27 02:12:24', '2023-08-27 02:12:24'),
(133, NULL, 'cxuuwpKVqd2gtnEBk9p6od:APA91bF2_tg3BoMSSMuaFvdQltpq4yg0JTscD7AMDkCGdGmW5174NTTZRtnZzC93NQfv1gvQ82wtWh3c4tELwhdOyUohtuZePdzRfusHVk80I-QANtmdZ4bGGipy8pj45uePxDPN3NMq', '2023-08-27 02:20:28', '2023-08-27 02:20:28'),
(134, 265, 'cxuuwpKVqd2gtnEBk9p6od:APA91bF2_tg3BoMSSMuaFvdQltpq4yg0JTscD7AMDkCGdGmW5174NTTZRtnZzC93NQfv1gvQ82wtWh3c4tELwhdOyUohtuZePdzRfusHVk80I-QANtmdZ4bGGipy8pj45uePxDPN3NMq', '2023-08-27 02:20:40', '2023-08-27 02:20:40'),
(135, 266, 'fqHg-3fw3bKo6wtzyuOZmH:APA91bH044ZuimDSeQZQ085Bu7QhStFysJrCTytUg5bYpz41K0IvJGOuFEfS7Vnm0jX2OXTAkrE5mT7pcsxzbMATJMlmIO1UcAhi81B0hMRbrfrfgJbacpZ8SfXlACKksxpzjjb81KPY', '2023-08-27 02:31:50', '2023-08-27 02:31:50'),
(136, 268, 'fqHg-3fw3bKo6wtzyuOZmH:APA91bH044ZuimDSeQZQ085Bu7QhStFysJrCTytUg5bYpz41K0IvJGOuFEfS7Vnm0jX2OXTAkrE5mT7pcsxzbMATJMlmIO1UcAhi81B0hMRbrfrfgJbacpZ8SfXlACKksxpzjjb81KPY', '2023-08-27 02:34:06', '2023-08-27 02:34:06'),
(137, NULL, 'fTP7ZYefFF6xUdKdxBes6n:APA91bGhhN-e0xMADxy7xH5yhR5agZ8kLKW63yiZt6WW-vtJ8S0TcDUawRBc2OTC5KcM8exBKPmibqfh8Xs4nqh7jE1iml3G9ODZHv8MNbcaTKAIAusUzUDe8W5p2jJlx-Nin01TqeYG', '2023-08-27 02:36:05', '2023-08-27 02:36:05'),
(138, 269, 'fqHg-3fw3bKo6wtzyuOZmH:APA91bH044ZuimDSeQZQ085Bu7QhStFysJrCTytUg5bYpz41K0IvJGOuFEfS7Vnm0jX2OXTAkrE5mT7pcsxzbMATJMlmIO1UcAhi81B0hMRbrfrfgJbacpZ8SfXlACKksxpzjjb81KPY', '2023-08-27 02:38:19', '2023-08-27 02:38:19'),
(139, 256, 'fqHg-3fw3bKo6wtzyuOZmH:APA91bH044ZuimDSeQZQ085Bu7QhStFysJrCTytUg5bYpz41K0IvJGOuFEfS7Vnm0jX2OXTAkrE5mT7pcsxzbMATJMlmIO1UcAhi81B0hMRbrfrfgJbacpZ8SfXlACKksxpzjjb81KPY', '2023-08-27 02:55:05', '2023-08-27 02:55:05'),
(140, 272, 'cxuuwpKVqd2gtnEBk9p6od:APA91bF2_tg3BoMSSMuaFvdQltpq4yg0JTscD7AMDkCGdGmW5174NTTZRtnZzC93NQfv1gvQ82wtWh3c4tELwhdOyUohtuZePdzRfusHVk80I-QANtmdZ4bGGipy8pj45uePxDPN3NMq', '2023-08-27 03:02:20', '2023-08-27 03:02:20'),
(141, 273, 'cxuuwpKVqd2gtnEBk9p6od:APA91bF2_tg3BoMSSMuaFvdQltpq4yg0JTscD7AMDkCGdGmW5174NTTZRtnZzC93NQfv1gvQ82wtWh3c4tELwhdOyUohtuZePdzRfusHVk80I-QANtmdZ4bGGipy8pj45uePxDPN3NMq', '2023-08-27 04:01:13', '2023-08-27 04:01:13'),
(142, 274, 'cxuuwpKVqd2gtnEBk9p6od:APA91bF2_tg3BoMSSMuaFvdQltpq4yg0JTscD7AMDkCGdGmW5174NTTZRtnZzC93NQfv1gvQ82wtWh3c4tELwhdOyUohtuZePdzRfusHVk80I-QANtmdZ4bGGipy8pj45uePxDPN3NMq', '2023-08-27 04:49:00', '2023-08-27 04:49:00'),
(143, 1, 'fqHg-3fw3bKo6wtzyuOZmH:APA91bH044ZuimDSeQZQ085Bu7QhStFysJrCTytUg5bYpz41K0IvJGOuFEfS7Vnm0jX2OXTAkrE5mT7pcsxzbMATJMlmIO1UcAhi81B0hMRbrfrfgJbacpZ8SfXlACKksxpzjjb81KPY', '2023-08-27 05:15:44', '2023-08-27 05:15:44'),
(144, NULL, 'flD2vhILd5ObPKvnSNpfOl:APA91bFwGLmGYVF8rrSxeoxJa60JPGIZWjHU-tTuJTX8mbaaaGGomJUWi7jnfk45I1kSAu5ZJow1Ou8FfS2STUJtRhOiBGGOYzktoFpS0shGtxJiZnjSr15F4ECVQerIdvPHIAIxPUOz', '2023-08-27 09:37:38', '2023-08-27 09:37:38'),
(145, 275, 'cxuuwpKVqd2gtnEBk9p6od:APA91bF2_tg3BoMSSMuaFvdQltpq4yg0JTscD7AMDkCGdGmW5174NTTZRtnZzC93NQfv1gvQ82wtWh3c4tELwhdOyUohtuZePdzRfusHVk80I-QANtmdZ4bGGipy8pj45uePxDPN3NMq', '2023-08-27 10:03:29', '2023-08-27 10:03:29'),
(146, 279, 'cxuuwpKVqd2gtnEBk9p6od:APA91bF2_tg3BoMSSMuaFvdQltpq4yg0JTscD7AMDkCGdGmW5174NTTZRtnZzC93NQfv1gvQ82wtWh3c4tELwhdOyUohtuZePdzRfusHVk80I-QANtmdZ4bGGipy8pj45uePxDPN3NMq', '2023-08-27 10:43:28', '2023-08-27 10:43:28'),
(147, NULL, 'fQW7pvR4gkwTrM0KKtybg8:APA91bGCw4mx8sxxaw3MeN2NRWdWDS0rT-2iXG8djpkPRkrbnfmlF4E62XMPywPMRM3-fQoU2x0RWymAlGBsiMw9eym27MJvJWaAXG6EXmvUmKe-ZYaIn0Zbe5lQjjH9ut1LDFcQDmwS', '2023-08-27 21:03:58', '2023-08-27 21:03:58'),
(148, 1, 'fQW7pvR4gkwTrM0KKtybg8:APA91bGCw4mx8sxxaw3MeN2NRWdWDS0rT-2iXG8djpkPRkrbnfmlF4E62XMPywPMRM3-fQoU2x0RWymAlGBsiMw9eym27MJvJWaAXG6EXmvUmKe-ZYaIn0Zbe5lQjjH9ut1LDFcQDmwS', '2023-08-27 21:06:22', '2023-08-27 21:06:22'),
(149, NULL, 'eZ-7LHfsXdEHIV3nXfCSFq:APA91bFohRX4AfEtmbJ_Hqbx3WtXTQ7fi72sWxbFOu3xJ2GLUrX1VXVbxuBj_s82M10bIIbasCYlvmH00Ae_azVD1lafSh5LyWZkihWroFQCa5i8HACJZvLXJvjE9XD3Xg_HEtiGLh8Z', '2023-09-10 07:14:51', '2023-09-10 07:14:51'),
(150, NULL, 'cm-ntW2yKvRBLCXVQqNtiB:APA91bHdr8SNFvNhi-vrejr4x-WZkSmzlxReKzvXleSyvZgM7sRE0aeenq-zy4Pg__2otckUgfInIadPy5TzIZH2Ydcpupn3OFI-xuhEz2-c4STFLZ7nyNHiCQIUAZNrs6lpk17TVXRn', '2023-09-10 21:41:50', '2023-09-10 21:41:50'),
(151, NULL, 'fy3LuRUeHfzwUQtNwu-NTD:APA91bGvgRRRWNVOr8hJ4ogcp08w7GKAOgzyZxZeG3RehMJeG_f-4iuCkYW1lEPHsHm9QRUb0AWqtJZN-ixHfJ1bhasUdCsrpEiOy8JmvHaSkU9qaFPfWRAyZwD8tSgxzIIcOtVqaa9F', '2023-09-11 07:44:21', '2023-09-11 07:44:21'),
(152, 287, 'dB9vlDl5vZNazhvPDYduJ9:APA91bEkwYu6D4eQCzhkqb7jPz-3LZb3bo2WjEbySsCR0GAHsw36z9FAXbcQHXtFi0iGEhbSvfEY5sudEvGKixZjzxl7QuvErfKNSeaTPwuWF0Jchz2gpQ-kpMA3FYlSzE78rYeedD7Y', '2023-09-11 07:47:08', '2023-09-11 07:47:08'),
(153, NULL, 'fcbPuBUkhgsueoqI1mXgjv:APA91bEO1tIlgNODpu9OjMXfjQ4hGCn5xD18H5le-x2gW4kxD3WDBYV8T3LFqOY9OUCpupor5mrdSze3-PeudxD89rKejMdS_lwkYrUEpTZObMahnjrN65DR_F5L6rJc3bCXhoJc_-6V', '2024-01-11 04:30:20', '2024-01-11 04:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `download_products`
--

CREATE TABLE `download_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `download_users`
--

CREATE TABLE `download_users` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `download_user_products`
--

CREATE TABLE `download_user_products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `download_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extra_mini_categories`
--

CREATE TABLE `extra_mini_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `mini_category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_feature` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extra_mini_categories`
--

INSERT INTO `extra_mini_categories` (`id`, `mini_category_id`, `name`, `slug`, `cover_photo`, `status`, `is_feature`, `created_at`, `updated_at`) VALUES
(51, 193, 'M1', 'm1', 'default.png', 1, 1, '2023-07-14 05:22:04', '2023-07-14 05:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `extra_mini_category_product`
--

CREATE TABLE `extra_mini_category_product` (
  `id` bigint UNSIGNED NOT NULL,
  `extra_mini_category_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2021_04_26_083352_create_roles_table', 1),
(5, '2021_04_26_090110_create_shop_infos_table', 1),
(6, '2021_04_26_094146_create_settings_table', 1),
(7, '2021_04_26_103452_create_categories_table', 1),
(8, '2021_04_27_041822_create_brands_table', 1),
(9, '2021_04_27_060049_create_colors_table', 1),
(10, '2021_04_27_074706_create_sizes_table', 1),
(11, '2021_04_27_083844_create_tags_table', 1),
(12, '2021_04_27_090113_create_coupons_table', 1),
(13, '2021_04_27_103134_create_products_table', 1),
(14, '2021_04_27_105130_create_product_images_table', 1),
(15, '2021_04_27_105229_create_color_product_table', 1),
(16, '2021_04_27_105500_create_category_product_table', 1),
(17, '2021_04_27_105537_create_product_size_table', 1),
(18, '2021_04_27_105553_create_product_tag_table', 1),
(19, '2021_04_29_081243_create_customer_infos_table', 1),
(20, '2021_04_30_130910_create_sliders_table', 2),
(21, '2021_05_01_045759_create_sub_categories_table', 3),
(22, '2021_05_01_050839_create_product_sub_category_table', 3),
(23, '2021_05_01_080942_create_download_products_table', 4),
(24, '2021_05_06_053040_create_product_reviews_table', 5),
(25, '2021_05_06_082332_create_collections_table', 5),
(26, '2021_05_08_174823_create_coupon_user_table', 6),
(27, '2021_05_08_190847_create_orders_table', 7),
(28, '2021_05_08_191930_create_order_details_table', 7),
(29, '2021_05_10_064750_create_vendor_accounts_table', 8),
(30, '2021_05_10_161230_create_category_collection_table', 9),
(31, '2021_05_11_070555_create_comments_table', 10),
(32, '2021_05_11_144526_create_reviews_table', 11),
(33, '2021_05_11_175121_create_download_users_table', 12),
(34, '2021_05_11_175522_create_download_user_products_table', 13),
(35, '2021_05_13_105137_create_product_user_table', 14),
(36, '2021_05_13_131154_create_commissions_table', 15),
(37, '2021_10_14_151726_create_subscriptions_table', 16),
(38, '2021_12_30_171921_create_wishlists_table', 17),
(39, '2021_12_31_082346_create_tickets_table', 18),
(40, '2021_12_31_103443_create_pages_table', 19),
(42, '2022_01_05_112513_create_mini_categories_table', 20),
(44, '2022_01_26_051820_create_bloods_table', 22),
(45, '2022_01_31_111628_create_mini_category_product', 22),
(46, '2022_01_31_114053_create_contacts_table', 23),
(47, '2022_02_03_172827_create_campaigns_table', 24),
(48, '2022_02_03_173019_create_campaing_products_table', 24),
(49, '2022_02_08_171958_create_campaing_comments_table', 25),
(50, '2022_02_08_174642_create_blogs_table', 26),
(51, '2022_02_09_134634_create_chats_table', 27),
(52, '2022_02_22_155141_create_extra_mini_categories_table', 28),
(53, '2022_02_22_155506_create_extra_mini_categories_product', 29),
(54, '2022_02_22_170629_create_extra_mini_category_product', 30),
(55, '2022_02_23_031956_create_attributes_table', 31),
(56, '2022_02_23_032033_create_attribute_values_table', 31),
(57, '2022_02_23_064159_create_attribute_product_table', 32),
(58, '2022_03_13_100532_create_unproducts_table', 33),
(59, '2022_03_23_133735_create_blog_comments_table', 34),
(60, '2022_03_23_153622_create_partial_payments', 35),
(61, '2022_03_23_182215_create_device_ids_table', 36),
(62, '2022_03_30_062751_create_withdraws_table', 37),
(63, '2022_04_21_173335_create_cart_infos_table', 38),
(64, '2023_03_03_074535_create_authors_table', 39);

-- --------------------------------------------------------

--
-- Table structure for table `mini_categories`
--

CREATE TABLE `mini_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_feature` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mini_categories`
--

INSERT INTO `mini_categories` (`id`, `category_id`, `name`, `slug`, `cover_photo`, `status`, `is_feature`, `created_at`, `updated_at`) VALUES
(191, 95, 'Dress', 'dress', '2023-05-07-64576be33923e.png', 1, 0, '2023-05-07 03:14:11', '2023-05-18 12:54:37'),
(192, 97, 'Bagpack', 'bagpack', '2023-05-07-645784fc5d001.png', 1, 0, '2023-05-07 04:42:07', '2023-05-18 12:54:37'),
(193, 105, 'Neckband', 'neckband', '2023-05-10-645b97d8a1096.png', 1, 0, '2023-05-10 07:10:48', '2023-09-05 14:13:02'),
(194, 105, 'TWS Earbuds', 'tws-earbuds', '2023-05-10-645bbf6263488.png', 1, 0, '2023-05-10 09:59:30', '2023-09-05 14:13:02'),
(195, 105, 'Wired Earphone', 'wired-earphone', '2023-05-10-645be0add62f7.png', 1, 0, '2023-05-10 12:21:33', '2023-09-05 14:13:02'),
(196, 107, 'Neck Fan', 'neck-fan', '2023-05-13-645f5e0427d0d.jpg', 1, 0, '2023-05-13 03:53:08', '2023-05-13 03:53:08'),
(197, 107, 'Mini  Fan', 'mini-fan', '2023-05-13-645f6989edf08.png', 1, 0, '2023-05-13 04:42:17', '2023-05-13 04:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `mini_category_product`
--

CREATE TABLE `mini_category_product` (
  `id` bigint UNSIGNED NOT NULL,
  `mini_category_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mini_category_product`
--

INSERT INTO `mini_category_product` (`id`, `mini_category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(346, 194, 684, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `multi_order`
--

CREATE TABLE `multi_order` (
  `id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `order_id` int NOT NULL,
  `partial_pay` int NOT NULL,
  `total` int NOT NULL,
  `discount` int NOT NULL DEFAULT '0',
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multi_order`
--

INSERT INTO `multi_order` (`id`, `vendor_id`, `order_id`, `partial_pay`, `total`, `discount`, `status`) VALUES
(1, 200, 1, 0, 1100, 0, 2),
(2, 201, 2, 0, 575, 0, 2),
(3, 199, 3, 0, 715, 0, 0),
(4, 199, 4, 0, 715, 0, 2),
(5, 200, 5, 0, 470, 0, 2),
(6, 1, 6, 0, 790, 0, 3),
(7, 1, 7, 0, 14620, 0, 0),
(8, 1, 8, 0, 550, 0, 0),
(9, 1, 9, 0, 550, 0, 0),
(10, 1, 10, 0, 550, 0, 0),
(11, 1, 11, 0, 825, 0, 0),
(12, 1, 12, 0, 450, 0, 0),
(13, 225, 13, 0, 566, 0, 0),
(14, 225, 14, 0, 566, 0, 0),
(15, 225, 15, 0, 566, 0, 0),
(16, 225, 16, 0, 566, 0, 1),
(17, 225, 17, 0, 566, 0, 5),
(18, 1, 18, 0, 1080, 0, 0),
(19, 1, 19, 0, 1080, 0, 1),
(20, 1, 20, 0, 815, 0, 0),
(21, 1, 21, 0, 815, 0, 0),
(22, 1, 22, 0, 825, 0, 0),
(23, 1, 23, 0, 825, 0, 0),
(24, 1, 24, 0, 845, 0, 0),
(25, 1, 25, 0, 1080, 0, 0),
(26, 1, 26, 0, 692, 0, 0),
(27, 1, 27, 0, 692, 0, 0),
(28, 1, 28, 0, 380, 0, 0),
(29, 1, 29, 0, 816, 0, 4),
(30, 1, 30, 250, 1100, 0, 0),
(31, 1, 31, 845, 845, 0, 2),
(32, 1, 32, 0, 712, 0, 5),
(33, 1, 33, 0, 1600, 0, 3),
(34, 1, 34, 0, 1100, 0, 0),
(35, 1, 35, 0, 570, 0, 3),
(36, 1, 36, 0, 230, 0, 3),
(37, 1, 37, 0, 330, 0, 3),
(38, 1, 38, 0, 1630, 0, 0),
(39, 1, 39, 0, 2680, 0, 0),
(40, 1, 40, 0, 1930, 0, 3),
(41, 1, 41, 0, 2680, 2050, 3),
(42, 1, 42, 0, 680, 180, 3),
(43, 1, 43, 0, 152, 0, 3),
(44, 1, 44, 0, 1680, 0, 0),
(45, 1, 45, 0, 2680, 0, 3),
(46, 1, 46, 0, 1580, 0, 0),
(47, 1, 47, 0, 1580, 0, 3),
(48, 1, 48, 0, 230, 0, 0),
(49, 1, 49, 0, 230, 0, 0),
(50, 1, 50, 0, 230, 0, 0),
(51, 1, 51, 0, 100, 0, 0),
(52, 1, 52, 0, 100, 0, 0),
(53, 1, 53, 0, 10, 0, 0),
(54, 1, 54, 0, 100, 0, 0),
(55, 1, 55, 0, 160, 0, 0),
(56, 1, 56, 0, 160, 0, 0),
(57, 1, 57, 0, 250, 0, 0),
(58, 1, 58, 0, 100, 0, 0),
(59, 1, 59, 0, 2680, 0, 0),
(60, 1, 60, 0, 100, 0, 3),
(61, 1, 61, 0, 100, 0, 4),
(62, 1, 62, 0, 250, 0, 0),
(63, 1, 63, 0, 100, 0, 0),
(64, 1, 64, 0, 100, 0, 0),
(65, 1, 65, 0, 500, 0, 0),
(66, 1, 66, 0, 2680, 0, 0),
(67, 1, 67, 0, 160, 0, 0),
(68, 1, 68, 0, 1630, 0, 0),
(69, 1, 69, 0, 1580, 0, 0),
(70, 1, 70, 0, 1630, 0, 0),
(71, 1, 71, 0, 10, 0, 0),
(72, 1, 72, 0, 2380, 0, 3),
(73, 1, 73, 0, 1500, 0, 3),
(74, 1, 74, 0, 1500, 0, 0),
(75, 1, 75, 0, 1500, 0, 0),
(76, 1, 76, 0, 400, 50, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thana` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet_time` text COLLATE utf8mb4_unicode_ci,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` decimal(20,2) NOT NULL,
  `single_charge` int NOT NULL DEFAULT '0',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_staus` int DEFAULT NULL,
  `pay_date` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `routing_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` decimal(20,2) NOT NULL,
  `discount` decimal(20,2) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `point` int NOT NULL DEFAULT '0',
  `is_pre` int DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `refer_bonus` int NOT NULL DEFAULT '0',
  `refer_id` int DEFAULT NULL,
  `cart_type` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `seller_id` int NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `total_price` decimal(20,2) NOT NULL,
  `g_total` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `seller_id`, `product_id`, `title`, `color`, `size`, `qty`, `price`, `total_price`, `g_total`, `created_at`, `updated_at`) VALUES
(36, 36, 1, 685, 'YouTube Premium Subscription - ইউটিউব প্রিমিয়াম সাবস্ক্রিপশন', 'blank', '{\"duration-8546\":\"82\"}', 1, '100.00', '230.00', '100.00', '2023-08-23 04:21:12', '2023-08-23 04:21:12'),
(37, 37, 1, 685, 'YouTube Premium Subscription - ইউটিউব প্রিমিয়াম সাবস্ক্রিপশন', 'blank', '{\"duration-8546\":\"82\"}', 2, '100.00', '330.00', '200.00', '2023-08-23 04:22:46', '2023-08-23 04:22:46'),
(40, 40, 1, 686, 'Samsung Galaxy M31 Root', 'blank', '{\"android-version-1651\":\"74\",\"service-type-9233\":\"80\"}', 1, '1800.00', '1930.00', '1800.00', '2023-08-23 06:02:18', '2023-08-23 06:02:18'),
(41, 41, 1, 687, 'Unlimited Gmail Create Without Number Method', 'blank', '[]', 1, '2550.00', '630.00', '2550.00', '2023-08-23 10:03:02', '2023-08-23 10:03:02'),
(42, 42, 1, 688, 'VPN Unlimited 7 Days Trail Method - ভিপিএন আনলিমিটেড ৭ দিনের জন্য ফ্রী তে যত বার খুশি ততো বার', 'blank', '[]', 1, '550.00', '500.00', '550.00', '2023-08-23 11:10:34', '2023-08-23 11:10:34'),
(45, 45, 1, 684, 'JOYROOM JR-T03S Pro ANC Bluetooth Earbuds', 'blank', '[]', 1, '2550.00', '2680.00', '2550.00', '2023-08-26 00:36:16', '2023-08-26 00:36:16'),
(47, 47, 1, 683, 'T800 Ultra Smartwatch Series 8 with Wireless Charging', 'black', '[]', 1, '1450.00', '1580.00', '1450.00', '2023-08-26 06:03:39', '2023-08-26 06:03:39'),
(60, 60, 1, 693, 'Fresh Gmail Accounts', 'blank', '{\"quantity-2797\":\"91\"}', 1, '100.00', '100.00', '100.00', '2023-08-26 12:58:27', '2023-08-26 12:58:27'),
(72, 72, 1, 698, 'HW9 Pro Max Smart Watch (3 Straps In 1)', 'black', '[]', 1, '2250.00', '2380.00', '2250.00', '2023-08-28 11:00:06', '2023-08-28 11:00:06'),
(73, 73, 1, 701, 'Huawei Y5 (2019) Software Development', 'blank', '{\"service-type-4987\":\"86\",\"android-version-6738\":\"108\"}', 1, '1500.00', '1500.00', '1500.00', '2023-08-29 07:24:52', '2023-08-29 07:24:52'),
(76, 76, 1, 685, 'YouTube Premium Subscription - ইউটিউব প্রিমিয়াম সাবস্ক্রিপশন', 'blank', '{\"duration-1807\":\"112\"}', 1, '400.00', '350.00', '400.00', '2023-08-30 06:01:06', '2023-08-30 06:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `body`, `position`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Return & Refund Policy', 'Return & Refund Policy', '<font color=\"#000000\" style=\"background-color: rgb(255, 255, 255);\"><b>Eligibility for Returns</b></font><br>To be eligible for a return, the item must be unused, in the same condition as you received it, and in its original packaging. Items that are not eligible for return include [list any specific non-returnable items, such as perishable goods, personalized items, etc]. Returns must be requested within 7 days of receiving your order.', 1, 1, '2022-03-12 14:18:41', '2023-09-05 12:29:18'),
(6, 'Support & Policy', 'Support & Policy', '<p><b>Support &amp; Policy</b><br></p><p>At Demo Shop, we\'re committed to your satisfaction and transparency. Our customer support team is readily available via email, phone, and live chat to assist you with any queries. We prioritize your privacy and security, as detailed in our Privacy Policy. Please review our Terms of Service for website usage guidelines. For shipping, delivery, returns, and refunds, consult our dedicated policies. Many of our products come with warranties, and you can find cancellation information in our Order Cancellation Policy. We value your feedback, and any policy updates will be promptly posted on our website.</p>', 1, 1, '2022-03-12 14:18:58', '2023-09-05 14:36:07'),
(7, 'Terms & Condition', 'Terms & Conditions', '<b>Terms and Conditions</b><br>By using the Demo Shop website (\"Website\"), you agree to be bound by the following terms and conditions:<br><br>1. Use of the Website<br>By accessing and using this Website, you confirm that you are of legal age and agree to use it in compliance with all applicable laws and regulations.<br><br>2. User Accounts<br>When you create an account on our Website, you are responsible for maintaining the confidentiality of your account information and for all activities conducted under your account.<br><br>3. Product Information<br>We strive to provide accurate product information, but we do not warrant that product descriptions, prices, or other content on our Website are error-free.<br><br>4. Purchases<br>By making a purchase on our Website, you agree to pay the specified price for the product and any applicable taxes and shipping fees.<br><br>5. Shipping and Returns<br>Shipping and return policies are outlined in our Shipping &amp; Delivery and Return &amp; Refund policies.<br><br>6. Privacy<br>Your privacy is important to us. Please refer to our Privacy Policy for details on how we collect, use, and protect your personal information.<br><br>7. Intellectual Property<br>All content on this Website, including text, graphics, logos, and images, is protected by copyright and other intellectual property laws. You may not use our content without permission.<br><br>8. Termination<br>We reserve the right to terminate your account or access to our Website if you violate these Terms.<br><br>9. Changes to Terms<br>Demo Shop may update these Terms at any time. Any changes will be effective immediately upon posting on our Website.<br><br><br>', 1, 1, '2022-03-12 14:19:16', '2023-09-05 14:37:46'),
(8, 'Privacy & Policy', 'Privacy & Policy', '<b>Privacy Policy</b><br>At Demo Shop, we value your privacy and are committed to protecting your personal information. This Privacy Policy outlines how we collect, use, disclose, and safeguard your data when you use our website or services.<br><br>1. Information We Collect<br>1.1 Personal Information: We may collect personal information, such as your name, email address, shipping address, and payment details when you make a purchase or create an account.<br><br>1.2 Usage Data: We may gather information about how you interact with our website, including your IP address, browser type, pages visited, and the time and date of your visits.<br><br>2. How We Use Your Information<br>2.1 We use your personal information to process orders, provide customer support, and send you updates or promotional offers if you opt-in.<br><br>2.2 Usage data helps us improve our website\'s functionality and content, personalize your experience, and monitor the effectiveness of our marketing efforts.<br><br>3. Information Sharing<br>3.1 We do not sell, trade, or rent your personal information to third parties. Your data is only shared with trusted service providers who assist us in operating our website and conducting our business.<br><br>4. Security<br>4.1 We implement security measures to protect your personal information from unauthorized access, disclosure, alteration, or destruction.<br><br>5. Your Choices<br>5.1 You have the right to access, correct, or delete your personal information. You can also opt-out of promotional communications at any time.<br><br>6. Cookies and Tracking Technologies<br>6.1 Our website uses cookies and similar technologies to enhance your browsing experience. You can manage cookie preferences through your browser settings.<br><br>7. Changes to Privacy Policy<br>7.1 We may update our Privacy Policy periodically. Any changes will be posted on this page with an updated effective date.<br><br>8. Contact Us<br>8.1 If you have any questions or concerns regarding our Privacy Policy, please contact us at demo@lems.com', 1, 1, '2022-03-12 14:19:33', '2023-09-05 14:40:34'),
(11, 'About Us', 'About Us', '<h5><b>About Us</b></h5>Welcome to Demo Shop, your one-stop destination for high-quality products and exceptional service. We are passionate about delivering a unique shopping experience that combines the latest trends with timeless classics.<br><br>Our Mission<br>At Demo Shop, our mission is to provide our customers with a curated selection of products that meet their needs and exceed their expectations. We are committed to offering top-notch customer service, secure shopping, and a seamless online shopping journey.<br><br>What Sets Us Apart<br><br>Quality Assurance: We handpick each product in our collection, ensuring they meet our strict quality standards.<br><br>Customer-Centric Approach: Your satisfaction is our top priority. We\'re here to assist you at every step of your shopping journey.<br><br>Secure Shopping: We employ advanced security measures to protect your data and ensure safe transactions.<br><br>Innovation: We stay updated with the latest trends and technologies to provide you with the best products and shopping experience.<br><br>Our Team<br>Our dedicated team at Demo Shop is comprised of experts who are passionate about what they do. We work tirelessly to bring you a diverse range of products that cater to various tastes and preferences.<br><br>Contact Us<br>We love hearing from our customers. If you have any questions, feedback, or need assistance, please don\'t hesitate to get in touch with us at demo@lems.com<br><br>Thank you for choosing Demo Shop. We look forward to serving you and making your shopping experience memorable.', 1, 1, '2022-03-12 14:45:27', '2023-09-05 14:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `partial_payments`
--

CREATE TABLE `partial_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partial_payments`
--

INSERT INTO `partial_payments` (`id`, `order_id`, `payment_method`, `transaction_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 25, 'bk', 'Fhgsdh', '100', 0, '2023-07-12 03:12:05', '2023-07-12 03:12:05'),
(2, 27, 'bk', 'Dhdhff', '600', 0, '2023-07-12 03:31:45', '2023-07-12 03:31:45');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `author_id` int DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `full_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec` longtext COLLATE utf8mb4_unicode_ci,
  `regular_price` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whole_price` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_price` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dis_type` int DEFAULT NULL,
  `discount_price` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `shipping_charge` tinyint(1) NOT NULL,
  `point` int NOT NULL DEFAULT '0',
  `reach` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `is_aproved` int DEFAULT '0',
  `type` int DEFAULT '0',
  `download_able` tinyint(1) NOT NULL DEFAULT '0',
  `download_limit` int DEFAULT NULL,
  `download_expire` date DEFAULT NULL,
  `sheba` int DEFAULT NULL,
  `book` int DEFAULT NULL,
  `isbn` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refer` int NOT NULL DEFAULT '0',
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yvideo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `author_id`, `user_id`, `brand_id`, `slug`, `title`, `short_description`, `full_description`, `spec`, `regular_price`, `whole_price`, `buying_price`, `dis_type`, `discount_price`, `quantity`, `unit`, `image`, `shipping_charge`, `point`, `reach`, `status`, `is_aproved`, `type`, `download_able`, `download_limit`, `download_expire`, `sheba`, `book`, `isbn`, `edition`, `pages`, `country`, `language`, `book_file`, `refer`, `video`, `video_thumb`, `yvideo`, `created_at`, `updated_at`) VALUES
(683, NULL, 1, 293, '289786578223185', 'T800 Ultra Smartwatch Series 8 with Wireless Charging', '<p><br></p>', '<h3 style=\"margin-bottom: 20px; color: rgb(74, 167, 9); font-size: 1.618em; font-weight: 700; font-family: &quot;IBM Plex Sans&quot;;\">T800 Ultra Series 8 Smartwatch Series 8 with Wireless Charging</h3><ul style=\"margin-bottom: 1.41575em; margin-left: 20px; list-style-type: disc; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\"><li style=\"margin-bottom: 3px;\">Please charge it for an hour after receiving the product before connecting it to the phone</li><li style=\"margin-bottom: 3px;\">Bluetooth products will be strictly inspected before shipment</li><li style=\"margin-bottom: 3px;\">But products may run out of power during transportation.</li></ul><p style=\"margin-bottom: 1.41575em; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\">&nbsp;</p><p style=\"margin-bottom: 1.41575em; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\">More functions:</p><p style=\"margin-bottom: 1.41575em; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\">Custom components are multi-lingual, Custom watch face, Breathing exercise, message reminder, and call rejection. time alarm, mobile phone</p><p style=\"margin-bottom: 1.41575em; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\">Rotate Button, music control, remote control camera, stopwatch, countdown, waterproof， find mobile phone, weather forecast, etc.</p><p style=\"margin-bottom: 1.41575em; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\"><strong>How to use Bluetooth calling:</strong></p><ul style=\"margin-bottom: 1.41575em; margin-left: 20px; list-style-type: disc; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\"><li style=\"margin-bottom: 3px;\">The Bluetooth call function requires dual Bluetooth signal support, so you need to connect twice according to the instructions:</li><li style=\"margin-bottom: 3px;\">Scan the QR code on the manual through the mobile phone browser, download the dedicated app, and turn on the mobile phone BT. Find and connect the Ola esporte device in the app. Confirm binding</li><li style=\"margin-bottom: 3px;\">Find the device in the Bluetooth of the mobile phone (check the device name in the watch to check the device information), and select the connection and pairing</li></ul><p style=\"margin-bottom: 1.41575em; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\"><strong>Support Bluetooth call：</strong></p><ul style=\"margin-bottom: 1.41575em; margin-left: 20px; list-style-type: disc; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\"><li style=\"margin-bottom: 3px;\">Mobile phone synchronization of frequently used contacts.<br>So you can just use the watch to make call and answer.</li></ul>', NULL, '1750', '1150', '1000', 1, '1450', 12, NULL, '2023-08-23-64e5bd9b4a19a.png', 1, 0, 141, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-08-23 00:21:12', '2023-09-11 06:26:47'),
(684, NULL, 1, 295, '286171364167663', 'Tempered Glass 9D Full Glue Cover Edge-Edge Anti-Scratch', '<p><span style=\"color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; background-color: rgb(247, 247, 248); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">9D Full Glue Tempered Glass Screen Protector: Ultimate Protection and Clarity</span></p>', 'Experience unbeatable screen protection with our Tempered Glass 9D Full Glue Cover. Designed to perfection, this screen protector offers edge-to-edge coverage, ensuring your device\'s display stays safe from scratches, impacts, and fingerprints. The 9D technology delivers unparalleled clarity, and the full glue coverage ensures a seamless, bubble-free installation. Keep your screen looking pristine and enjoy a crystal-clear viewing experience with this anti-scratch, anti-fingerprint tempered glass screen protector.', NULL, '2750', '2300', '2200', 1, '2550', 7, NULL, '2023-09-05-64f796a299edc.png', 1, 0, 100, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-08-23 02:21:33', '2023-09-11 06:30:47'),
(685, NULL, 1, 294, '656947398903097', 'Printed jersey T shirt for Man: Buy Online at Best Prices in Bangladesh', '<p>Elevate Your Style with our Printed Jersey T-shirt for Men - Available Online at the Best Prices in Bangladesh<br><br>Discover the perfect blend of comfort and fashion with our printed jersey T-shirt designed exclusively for men. Crafted with the utmost care and attention to detail, these T-shirts are a true representation of style and quality.<br></p>', '<p><br></p>', NULL, '180', '160', '120', 1, '130', 95, NULL, '2023-09-11-64ff01ab09092.jpg', 1, 0, 140, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-08-26-64ea0ae7a7ae9.png', NULL, '2023-08-23 03:50:41', '2023-09-11 06:01:47'),
(686, NULL, 1, 293, '55709109113320', 'Buy T-shirts for Men Online In BD | JACK&JONES Jack & Jones', '<p>Buy T-shirts for Men Online In BD | JACK&amp;JONES Jack &amp; Jones<br></p>', '<div class=\"html-content pdp-product-highlights\"><ul class=\"\"><li class=\"\">Best Quality Sublimation (no glue) Print.</li><li class=\"\">Life time Print guarantee.</li><li class=\"\">Febric high quality Jersey Febric (thailand)</li><li class=\"\">150+ GSM</li><li class=\"\">Round Nack</li><li class=\"\">Print Only on font side.</li><li class=\"\">Size</li><li class=\"\">M cest 36 length 27</li><li class=\"\">L cest 38 length 28</li><li class=\"\">XL cest 40 length 29</li><li class=\"\">#TshirtForMan</li><li class=\"\">#BTSTShirt</li><li class=\"\">#Genji</li><li class=\"\" data-spm-anchor-id=\"a2a0e.pdp.product_detail.i0.49e05b50V8TVeM\">#TshirtForMen</li></ul></div>', NULL, '100', '70', '50', 1, NULL, 13, NULL, '2023-09-11-64ff06904cab0.jpg', 1, 0, 70, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-08-23 05:49:21', '2023-09-11 06:22:40'),
(687, NULL, 1, 293, '154394430748925', 'Stylish semi long Panjabi for men-8', '<p>পুরুষদের জন্য স্টাইলিশ সেমি লং পাঞ্জাবি-8<br></p>', '<p><a rel=\"noopener\" target=\"_blank\" href=\"https://www.daraz.com.bd/products/leewear-mens-punjabi-mens-kurta-pajama-manyavar-kurta-panjabi-pajama-best-panjabi-punjabi-design-for-man-design-for-man-latest-punjabi-design-for-man-black-punjabi-design-for-man-punjabi-embroidery-design-for-man-pn21108-i182266993.html\" data-ved=\"0CBIQjhxqFwoTCLCcm9DJooEDFQAAAAAdAAAAABAE\" class=\"gQtke indIKd\"></a></p><h3 class=\"MCLffc cS4Vcb-pGL6qe-fwJd0c\"><a rel=\"noopener\" target=\"_blank\" href=\"https://earifin.com/product/stylish-semi-long-panjabi-for-men-8\" data-ved=\"0CBIQjhxqFwoTCLCcm9DJooEDFQAAAAAdAAAAABAZ\" class=\"gQtke indIKd\"><h3 class=\"MCLffc cS4Vcb-pGL6qe-fwJd0c\">Stylish semi long Panjabi for men-8</h3></a></h3><p></p>', NULL, '150', '120', '100', 1, NULL, 14, NULL, '2023-09-11-64ff0afd4d908.jpg', 1, 0, 32, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-08-23 09:49:45', '2023-09-11 06:41:41'),
(688, NULL, 1, 293, '167906728482814', 'Stylish A to Z Alphabet Unisex T-Shirts in White and Ash Colors – Perfect for Men', '<p>Stylish A to Z Alphabet Unisex T-Shirts in White and Ash Colors – Perfect for Men<br></p>', '<p>Stylish A to Z Alphabet Unisex T-Shirts in White and Ash Colors – Perfect for Men<br></p>', NULL, '152', '120', '100', 1, NULL, 14, NULL, '2023-09-11-64ff01f671b1f.jpg', 1, 0, 25, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-08-23 10:10:18', '2023-09-11 06:03:02'),
(689, NULL, 1, 293, '406500169724211', 'Stylish A To Z Alphabets Unisex White And Ash Color Tshirts - Tshirt For Men', '<p>Elevate your style with our A to Z Alphabet Unisex T-Shirts in White and Ash, perfect for men<br></p>', 'Introducing our Stylish A to Z Alphabets Unisex White and Ash Color T-Shirts, specially crafted for men who seek both fashion and comfort. These versatile t-shirts are a must-have addition to your wardrobe. Made from high-quality materials, they are soft, durable, and designed to keep you looking effortlessly stylish. Whether you\'re dressing up for a special occasion or keeping it casual, our alphabet-themed t-shirts are the perfect choice to showcase your unique style. Elevate your fashion game with these trendy and comfortable t-shirts.<br>', NULL, '250', '200', '150', 1, NULL, 15, NULL, '2023-09-11-64fed145efe78.jpg', 1, 0, 45, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-08-23 10:45:09', '2023-09-11 06:30:25'),
(690, NULL, 1, 293, '490453418307275', 'Stylish 100% Cotton Panjabi for Men\'s', '<p><a rel=\"noopener\" target=\"_blank\" href=\"https://gmarket.com.bd/product/blue-100-cotton-panjabi-for-mens-ruez0\" data-ved=\"0CBIQjhxqFwoTCLCcm9DJooEDFQAAAAAdAAAAABAR\" class=\"gQtke indIKd\"><h3 class=\"MCLffc cS4Vcb-pGL6qe-fwJd0c\">Stylish 100% Cotton Panjabi for Men\'s</h3></a></p>', '<p><a rel=\"noopener\" target=\"_blank\" href=\"https://gmarket.com.bd/product/blue-100-cotton-panjabi-for-mens-ruez0\" data-ved=\"0CBIQjhxqFwoTCLCcm9DJooEDFQAAAAAdAAAAABAR\" class=\"gQtke indIKd\"><h3 class=\"MCLffc cS4Vcb-pGL6qe-fwJd0c\">Stylish 100% Cotton Panjabi for Men\'s</h3></a></p>', NULL, '150', '130', '120', 1, NULL, 15, NULL, '2023-09-11-64ff0ab2da9c8.jpg', 1, 0, 32, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-08-23 11:13:17', '2023-09-11 06:40:42'),
(691, NULL, 1, 293, '890439024104036', 'White Cotton Tie Front Short Sleeve T-Shirt | New Look', '<p>সাদা সুতির টাই সামনের ছোট হাতা টি-শার্ট | নতুন চেহারা<br></p>', '<p>This beautifully crafted saree comes paired with a perfectly coordinated blouse, making it an ideal choice for any occasion. The saree features exquisite detailing and a range of vibrant colors to choose from, ensuring you look stunning and ready for any event. Upgrade your traditional wardrobe with this convenient and stylish saree with a ready blouse, designed to make you stand out with grace and sophistication.<br></p>', NULL, '220', '210', '200', 1, '200', 13, NULL, '2023-09-11-64ff08ad63543.jpg', 1, 0, 35, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-08-23 12:06:53', '2023-09-11 06:31:56'),
(693, NULL, 1, 295, '581008678797236', 'POWR Back Cover | Case for Samsung Galaxy F23 5G / Samsung F23 5G', '<p>POWER ব্যাক কভার | Samsung Galaxy F23 5G / Samsung F23 5G এর জন্য কেস | স্ক্র্যাচ প্রুফ | নমনীয় | ম্যাট<br></p>', '<p>POWER ব্যাক কভার | Samsung Galaxy F23 5G / Samsung F23 5G এর জন্য কেস | স্ক্র্যাচ প্রুফ | নমনীয় | ম্যাট<br></p>', NULL, '60', '55', '50', 1, '55', 91, NULL, '2023-09-05-64f79b96d5952.jpg', 1, 0, 109, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-08-26 12:09:48', '2023-09-11 02:36:04'),
(697, NULL, 1, 293, '867809476905612', 'Hard Case Tempered Glass TPU Mirror Hybrid Shockproof Full Body Protective Cover', '<p>হার্ড কেস টেম্পারড গ্লাস টিপিইউ মিরর হাইব্রিড শকপ্রুফ ফুল বডি প্রোটেক্টিভ কভার<br></p>', '<p>হার্ড কেস টেম্পারড গ্লাস টিপিইউ মিরর হাইব্রিড শকপ্রুফ ফুল বডি প্রোটেক্টিভ কভার<br></p>', NULL, '150', '130', '110', 1, '130', 100, NULL, '2023-09-05-64f79ae3185b2.png', 1, 0, 11, 1, 1, 0, 1, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-08-28 02:29:09', '2023-09-10 15:52:38'),
(698, NULL, 1, 64, '627222140613580', 'For Xiaomi Redmi Note 8 - Premium Silicone Case Crystal Clear Soft TPU Ultra-Thin', '<p>For Xiaomi Redmi Note 8 - Premium Silicone Case Crystal Clear Soft TPU Ultra-Thin&nbsp; Transparent Flexible Protective Mobile Phone Back Cover<br></p>', '<p>For Xiaomi Redmi Note 8 - Premium Silicone Case Crystal Clear Soft \r\nTPU Ultra-Thin&nbsp; Transparent Flexible Protective Mobile Phone Back Cover<br></p>', NULL, '2500', '2150', '2050', 1, '2250', 99, NULL, '2023-09-05-64f79a917e091.png', 1, 0, 84, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-08-28 04:26:53', '2023-09-11 06:27:32'),
(699, NULL, 1, 295, '542950154366012', 'Full Cover Glass HD Clear Scratchproof Tempered Glass Screen Protector', '<p>Protect your valuable device with our Full Cover Glass HD Clear Tempered Glass Screen Protector. <br></p>', 'Protect your valuable device with our Full Cover Glass HD Clear Tempered Glass Screen Protector. Engineered for perfect fit and maximum clarity, this scratchproof protector shields your screen against daily wear and tear while maintaining the vibrant display you love. Precision-cut for your device, it offers edge-to-edge coverage and effortless installation. Say goodbye to scratches, smudges, and glare, and say hello to a crystal-clear viewing experience with our premium screen protector.<br>', NULL, '2500', '100', '2000', 1, '2250', 100, NULL, '2023-09-05-64f7963051358.png', 1, 0, 30, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-08-28 10:26:34', '2023-09-10 16:42:31');
INSERT INTO `products` (`id`, `author_id`, `user_id`, `brand_id`, `slug`, `title`, `short_description`, `full_description`, `spec`, `regular_price`, `whole_price`, `buying_price`, `dis_type`, `discount_price`, `quantity`, `unit`, `image`, `shipping_charge`, `point`, `reach`, `status`, `is_aproved`, `type`, `download_able`, `download_limit`, `download_expire`, `sheba`, `book`, `isbn`, `edition`, `pages`, `country`, `language`, `book_file`, `refer`, `video`, `video_thumb`, `yvideo`, `created_at`, `updated_at`) VALUES
(700, NULL, 1, 296, '613415574046317', 'Baseus Adaman 22.5w 20000mAh Quick Charge Power Bank', NULL, '<h2 style=\"margin-bottom: 20px; color: rgb(34, 34, 34); line-height: 1.25; font-size: 30px; font-family: &quot;IBM Plex Sans&quot;; font-weight: 600; letter-spacing: -0.5px;\">Baseus Adaman 22.5w 20000mAh Quick Charge Power Bank in Bangladesh</h2><p style=\"margin-bottom: 1.41575em; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\"><strong>Looking for a high-capacity power bank that can quickly charge your devices?</strong></p><p style=\"margin-bottom: 1.41575em; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\">Look no further than our Baseus Power Bank Adaman. This device has a large capacity of 20000mAh and can quick-charge your devices at speeds up to 22.5W. Plus, it features a digital display that shows you the remaining power so you always know how much juice is left.</p><p style=\"margin-bottom: 1.41575em; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\">The Baseus&nbsp;<a href=\"https://www.bdshop.com/catalogsearch/result/?q=power+bank\" target=\"_blank\" rel=\"noopener\" style=\"color: rgb(30, 104, 196); text-decoration-line: underline; transition: color 0.2s ease 0s; touch-action: manipulation;\">Power Bank</a>&nbsp;Adaman 22.5w 20000Mah Digital Display Quick Charge Power is a reliable and efficient power bank that can charge your devices quickly and safely. It has a digital display that shows you the remaining power and the charging status of your devices, so you can always keep track of your power usage. The quick charge feature allows you to charge your devices faster, so you can get back to using them sooner. The power bank also has a built-in overcharge protection system that keeps your devices safe from overcharging.</p><h3 class=\"wp-block-heading\" style=\"margin-top: 1.29068em; margin-bottom: 20px; color: rgb(74, 167, 9); font-size: 1.618em; font-weight: 700; font-family: &quot;IBM Plex Sans&quot;;\"><strong>Features</strong>:</h3><ul style=\"margin-bottom: 1.41575em; margin-left: 20px; list-style-type: disc; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\"><li style=\"margin-bottom: 3px;\">Large capacity High power Two-way quick charge Smart digital display<br>20000mAh 22.5W QC3.0 PD3.0 Current Voltage</li><li style=\"margin-bottom: 3px;\">Metal Shell Shows the Sense of Light Luxury<br>The all-metal shell, without the traditional sense of cheapness of plastic, feels luxurious.</li><li style=\"margin-bottom: 3px;\">Multiple-Layer Plating for Perfection<br>As the alloy shell is plated in multiple layers the color is evenly plated on the surface with fine metallic luster.</li><li style=\"margin-bottom: 3px;\">SCP 22.5W Light-Speed Quick Charge with Upper Limit Power<br>It supports HUAWEI 5A SCP quick-charging protocol)</li><li style=\"margin-bottom: 3px;\">20000mAh<br>Charging Several Times When Traveling<br>The newly-upgraded large capacity One is enough for your business trip.</li><li style=\"margin-bottom: 3px;\">4~5 Hours<br>Full of Power Bank<br>It supports PD3.0+QC3.0 two-way quick charge Self-charging is also very fast</li><li style=\"margin-bottom: 3px;\">Compatible with Various Mobile Phones<br>Compatible with QC3.0, PD3.0, FCP, AFC, and other quick-charging protocols, it can quickly charge for IP, Mi, Huawei, Samsung, and other mobile phones.</li><li style=\"margin-bottom: 3px;\">Charge or Storage with One Line<br>When traveling, you only need one line for its three input interfaces and three output interfaces, trouble-free and effort-saving.</li><li><img src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wgARCAU1AyADAREAAhEBAxEB/8QAHQABAQEAAgMBAQAAAAAAAAAAAAECBQYDBAcICf/EABsBAQEBAQEBAQEAAAAAAAAAAAABAgMEBQYH/9oADAMBAAIQAxAAAADqP9A+lCghQIlGrKACCRJBACVCkagIGblFlRSQiiJCZhAM1BWSECQiCQiJIiZJWREIkiRCEBDLMiRCSZMwFZiRCVJJJEiQkslyAkXOc5zmWxfon0/aKgihkCkKIkCgELkqgQMxoQJARERlBpEIyURM2wlQEIkQQZQkyMmagGUiEMIICEJnMM1mEDCUkZMkgmSCTKRTMMzUgDMmZmZSsrlPov0/aBCgklWTSiyDJYFICAoAJkAJmCSEogMs1qVCVAQJCJCQJESSUzWSEEMsgwgEJEMyDKQGYiQgyyQykQuUSRZJLJLCSiGZnMgkRcWQ+hfS9tInbPDn7v8AD8/XfRr4B+h9Wcxs5lN1zKWSUC2QAAzMwAkqJQsuQzDOhqAiAQiCEJiDNEkZoQRIhDMkKQkQkQwyBDMmaQMmciZBlCxJITJmasZBCZmZIzGsksyMvoP1PaLJ3r5uPqXyfPzfKfOvodO8+Ocb1dm82PQ6a6h6r2ryzr3eyu4ebPH5nn1r4T93v1P2aAhCQWEGbRplCDLQMwLAkESBCTOSmCUICEJmSICAkQTOTJASImREqRkkkWMwiiTMIkzcrCkMzMzIRI1kzZBJF+gfT9wR3z5vH7b8Xz7zOoevr5pnunjz1j060va/LjqPpvNeXPW/fvufmz829Gu2cZ8E+96Ou+zViAGcqubYCAJEAEICDIDNJnJIlQhCAEzMghYhkgyyRmEBmQZAjJmBkjMC5mREhnNKIZzkSImUiwhmoJB376PrC3vPzc/of8/5eL63577+vZ/Pj3eec6169nQvd1+i/O5fLvpdvqPzePq7cXu89xfBfv8Afrfo3LIQAAgBAASBDIQRIQkQEIQAkkyaSEQGYlTOc6CRIEkwIEshnKJGoRlC3OcrMyyWAETMTMhCHa/PjzRDrHe8fu2ZhMu+/T9YNRC1akhSRaAEQkrUmasAAEBSEJAEIzASpAkQRKhACDKWZVIyVCEMpCZk0ZSIkBDMDKQREy0IiZkuUglhCRTMzIhkzZI7PweaInXOs9PaRmEd7+p6wC0AAEQ0ASRaRJQIQoIZQAShEggQEiAEIIgSGYCBCGaSZQSJEBJIQETJEkSWJIXSSESJIhJQJJmSRkEM1EhkgmbGcoQh3v6nrEWoBQCANIERAkFCgkgsyKAgWESkgQCIQEjBUkIAhCETIJIMwgRMgEMsoyRZAytMzJIZyLCFISTOZCRKhlJUISRCyZSIQyd8+n6woSAqiIWXJbGaWJNIiAoIEqACDKUCEBCCMkIQFyhASpEZgJEiEkixIARnJJSSUZAZRlcspYuYoMTKWCTJCJKhkgJIkmUIQGSZvefq+kKAZAVULI0kaMpqxCpIAKQkBQTJAQCMkqCAIMgISZhNJFiGQSJEDMWEQTMgXKRYkKRMxJE1AZKJMJM2EIzLIsMimRMwzMghCAzm94+t6QiwgAACEoWB2nzZ7r4562pRGaRakK1EqZssCJZFqZlqS0gzkFZEZFZBIlDKZLLAmYLEiCQJUqQgZGZCUqZKQImRKGc+5HQu7qHp1kCDMhGSEIDOdZRHd/r+kMlCFKAZAKSB9V+Xz4ns4brclEsRUVkSUVZJZTKp5y5ns4ePbyYbs3lqNLoSeWPBpgxL47PGeLTxV656leCvDbgJCRgtgkkiLCJmUgEiEiJIEIIh2HlnsfB8g+holiZkIQgJJGsyxmRI7z9f0hAgFAAoELEPp/zefWfQ4ftvvvzs9F917z48+XLiel4T0X6d8zn8m+nvvvinP8c/LPfr6N4c+aTp/pvJYvS/ZryR9R+Zz47peR5Om+u/SfDnwWeI80vH7czznzn36+g+Gcb0dA9euL3OI3eP29a2XMzZq7y+z/M5+jdcV0nzT2224iphKZimSte/zz9Y+fjqvo32zz5670vzL237b8zPU+9+d+srKRef5Tu3knyn3IIhkGQSJEWSDMRO8fV9MAAAChUEAD6b87n1v0OI7b+y/ExwvVrU8scJ1vXPRr6H87nxvfftcs89xz5o+fet2/hr5v8AQvdPFPnn0L5Y+l/Nx6nRy3K8H0vvydf7X6J48eBfGe7l8+92u0+WcPpxXR0L067pwz2jzTp/pnavNrrva9i4Y6l6tejq9E9evtPy+fsZfLva+l+F1D0zvnldZ7XtXnz0X1Ow+d0f3a6P6Nds82ff53r3a9z82Pl3uv2X5ufAeDTt/nnUPRfkXv1z/Kd182PlXs1IlQhAZlkREZkEId2+t6BYAiiFAIAgi/T/AJvPrXp1w/W/Tflc/mv0t/S/Dnl/M8Wpwna+/wAc8vi8Z1vW+7618zPxr6u+x8p030a7r5MfP/drzZz9K+fOH9N9/jOW5Xl+OfX6XyydL9W/SrnvPn4Z9Xp3ryzt/lzw3VnK6chicfb3nyZ+Y+/Xu4fNPfr7H83nxW9XLr/ovePJn3OGes+m9d73sHBz3OcPqcpynyz6G+E6X9B/Jx8H+nr778vPwj6V2do4Ox8s+fL1LfWs+L/QvPc3dvPn5T69yyEgQzNREZkqZBCHdPregACAAChIqkkn1P5mOuejXC9Xmy8NvnkR5o8dnq6158zC+PTzYz47eT5Z9bbGr7UebN7R5ccV01y/LPr7vJ81s4muk+rfBdJ2bg6r6de9yjM9DreX5Z5LDnfPPnH0N+9zz6ttr1q9/m9akZ1MRynJx3R45nmOd+w/Oz8K+jr214bo2nMcJx+3v8no9XiTUuNTxx6y+eT165/m7n558m9llCZ1CEmciWJEAzEO6fY7lAAYygqpYAJNE+qfOx72LxPaiIIQsSBnREhQhqT2MzdupNrqZ8sROJuuM62QQsRBQgSJUhEshJREBmRFVJLllSBEiVkUgIyRWSznuU9avkfs1JYSSEkESEWSDIB3P7HbK2UCADKFoJkpYeXGew8ZZqhkQGVRbFQkKVJCxFkpLBAkEkSCpJNSwWISJViQSEBMyIJRUIlZkSyFTKVZJSISISXNWMydV7XxrCCZhEyAQkQEgdx+v0olEUAQACkWhJAQAAQEBFlATUAGZmzUuRJUkaRIRmBJQlhCJIBjJEEyElRJJSXJlRAklrMiEiEgZEsiCCYiAiCCMkgCFzIdv+z1RQQpJQoUEFQAhLbEQAAAZsW2SIsgCkVIJAsiRIQhGZaZBM0maIiJIEBJZlJMxlRFDMEkyCEiAgJLmSBZJIEIkJAhZITNREh3D7PUASLbJIW0CI0UlC2IABApmMgCAqRQsuhFlCxkJcxISZxpllqWZlokhmFM0kWQjJIyqTMSRBYTMkDIBIkJZUWSRMhBMoCRCCJCEEyZQdx+z2EAiKULmFWaglJai5qwiVIAsQoELRBdZBLpbNGrlYIMsy5XGbnFzLkksiELAkIlTKEzBnOouYiIkCZSMwBMlSFQkZllkggGchDMEhM0XCVlmEgdx+z3VlC/W/muC6T597LT7N8x0r2zp3rUIIqDKimUv3742viP18cd0qykLRBLLZbFVNWb1jy6z5GPNWqyeOXwzXizrw5v2z4fo+n+HfrW/nn6/HpnpmTNDMZ5v1n8Lr+TPu8prUGIj9M/F6fmT62FZM5SWS/YfBftfl3iPz77MfNPXn9P/L1+XfoZuoMqMoGQzARAZgkzWJDOpCZADtv2urOiF+/fIdX6T5P9NT9HfEfNPpT577pSgzqpmqqahJX6v/L7/Mv6LlxPeyyhNaJLpWGrdTTOtzy3PtXn7Wsci487y58953GdZ1z0a4u9fTnX6R8P0fS/l9vy1+j48nxv7E/J+v8AEv63zeDespCY1JPZ531NCpYSP2l+X6/iv9FxyuSZSa7v5L+mflX8YfYx7Eftr43T8YfVx+wvlb/EH2saMghICJkSJLcwzZTLLMiEyAkIh237XWKUfoP4uOrdr8l+pR+lPhZ+YfSerp98+PLmfFPsvmX0n6Z/NvfXleefzB+ifpb8/Ny9m8z8dfr88T6YS6zuz7J8XX1j5OuC9WfzX+s4fS/la+1fB6cL7ef53/YeD6J8fX0z5Gu0+DfB+35/YPF1798n63q9OXwT9b+b6D9qcD7O/wBy/Hfb+S/ax88+jnw89fqL8b7vgf3OX1f5G/zl+izV/Q35rf51/Qz9Dfmr+d/0c+m/L392+O4/b8wfen7A/Mb/ABL+ox9A8Wu4eN8L+oh99+TrjE+IfQWOxcXHafs/4V+fd53HlPz39C/LfY/TPynbOL0NPyp9R33zvrPkdv5vk3pcFqfevFemdbwGp+cfoz9HfOfQ+DofZ+afakQEO1/a61ED9C/Fz9l+Y4DvEdy8r8jfp9cLu9e7Z8G7+1fyefxN+u1+/fx2fwt+rTd++/Gz0b135h9Z+8fxU/D369xHopB3TxT9AfEv5N/UZ7p5HX/RP2D+V1+MP2fP6t8i9z8843c7Bwn55/Vebn+ef1N+N9f5k/a/N7P4Ov0343p/Mn6/z+tjr+m/x3p+Ifbx0P3XM1+ofy2/i/1c/pr89r8S/rs2v2n+Q6fir9bz/aP4/f4//V4/Yv5bX4v/AFWeyedw/afsf8n0/JP6OfrL89fxh+lnpaucP0V8V1frfjHvuYiSP3h+dfjj7Lr3V+7PgvwP969987oHon3DwOX5Xi+jv/ln5J+s5blf3L8ifgj7D6x5p958N/N/0H2PxPyh9N+rPnPlXd8o9JEIdr+z0Elp+hfjc+qd78i+hofpj4ePl/0tepX2v5k8Z9R+fj8Ffsen7Y/K5/FX6vRf11+Z5/lr9DeJ639e/mp+WPvv0f8AHdo886t6L1H0zhuz5H9NbO3+N9r+VPzN+kclyn6o/NX579CcN6J8n+zjtHkfsX8fv5r9KZjleV/JP6/nia/T35Tfxn7DoHtezh+oPzl+FfWn6g+DfxJ+sl0/av5LX4q/VY/aX5HX51+9n6V4350/QZstZ/bn4zrT5z7J+YP0ecZePF/Qfxd9f1Piv0bIxDL9x/np+GPv61Z+6Pz78KfbfpT5t53k7NyfPvQ631eOX4f7pyvJ+uvlT8WfYvJ85+wvlX5j6H1fyuq6nPS/KfQ/PntIhDtf2OkhaP0F8jn1frfkv0dk/SPxeXzL37/RHx8fjn9D09e39o/m+P4t/Tdv2n+b5fi/9L1J+o/h4+E/S11L1X9ofm+P5F+/14fvdSW36t87PZeOfgX2dNTmuD9MfCx+T/0++1eSfefk56h6XDd8/J/qa5Hk/VX5vP5F/UXBUVLfu3w3jt+FfWn7G/L3tHDP4f8A1ev2J+bn4p/U1X7e/JT8R/rc/sv8lfzD+kn6C+M/MP6nj7MeXWf2d+I7/kz9Vz/SX5zf5r+66R6nixr6p8y/RfFfy99nWMv2B8Gfmz6b9W/Hn4e+9un7i+FPy19B9m8c/LP1d/UvHn6Bwdc6MS/D/VdZfuD5OPwz9ffdeE/TXhz8a769vM+C+rQzWoyJIdp+x0ggfffnc+s6vyj6G0fov5PP5t7t/SPFy7Bl659I8mfwn+i9P7I+J5/xz93uO7ePH6b+dz6p0fTvJPxD+g78T1tIeTM/WXxeXGdJ2TlPyN97t+k/jcvY1Ow8Z+Y/tdPofmnD9Z8q+jav6N+Fz5nE80fLfbv5F9dJn2M39Y/nM+puc7ynvYflH9Jv6R8/P0zwTi967z5+f4m/ZZ/XP5Df5X/Z+f8AS/5p5efXsnmnTfp+X6N8j1/mf9j8zHPr+gfy/t/In6/j6eOng5a/UP53p7XC+eOld7+bfrX9m/Av4r+1av7V+Jn8dfT6fsn5fLo3S9z4z5h3117esR8U77yz+qPn47LY5X1dT8hert+zvHy6t0naed/JXo6dX2IIdo+x1EKeXMzm+PS15sTx24093i8WpK8Gr58T1+tFy82J5JPFp4talStAichzz6fS46RXv856vW423nKvHosV7XNivB2kLqEWclyet1ntYea5471Pd5YnXPl3h3xyFx59eflM+ftXhz3j5e/oHx/dmz519r53Rvq44Pt6uF7743n6PT49fBx35PH08DXp61jN8vC+pLJfLxnrXbD3uTj9VlnKZeJcyZl82Lzuc/only/J+++Y5KOPrNkiIB2f7HVCqIZKEBYhAoQRQgWCwBSBLFNLIsVKBFQFN9YjxlSkhSqLLZUVrUu27nysebePcuPd3n2mR6UvpZ36vPr6+NeHlrx89eLNxNZyzlIxmomUJnWJZMsoTLOVjOb+lePHhO0+hTH54x6OiNkggEgB2b6/UIAhYUAhli0CwEZoKEiFRUARpUltmZSgBKFJYzbpCFsFQSrLLLoZtVNG7nVm9Z3CMV4868Wd4xc5mMsTWYzCXOUykSESMy5kDLIykSa0nbec63q8eVEQiggkQ7N9foABkktQ1KShFhMiUIACEAKAQJCpBoQoREWqsQWKsUUM2IWQopM21FLoiJJMyyaxlIzEiYIySIQmUlkiITIuJEslEIkpmIEAJEJA7N9jpEQBEilNMrI1rMyhQEBRkAIQoEQiAsqpkAIVZBKFiqgyC0JBm1CwtiADMCRnNJImUJlIyGsQGVSZkjIJLFRIjIVmAgCRCQBDsn2OgZACQAABCAubBAtSApAgIQABIQAgKgSGlmVrKpVzSSkQUiQiaARJIiRcs0JNSJGYsRIshMwmUI1MoAyBIgABnIQAzEOyfY0asQQBAABEyFIohSWSAqyiIIQ8mX2Hwvi/tfSvPPm3poAgCfWvG5TE+Ne1620VJYyLRIWCxDn+Lr/Z3Lg8J1XpPrflvx/1B7uXkjjNh3ryuj9Xj0zBJkiBcgRIhEpEgyUAjAgAYgAdk+toQBULcwgQQAAABLAlAEAyh5o/Ynw8/lH6t+r+d1rT3Y4bo8JwG72Xk+deqfcPA+N++e9zfUvK6v0c1hyOXxv2PsHjdD9Ls3F449fbn+T5/wB32rxPzP8ATfVfO7z5XS/Q7X5nzz1Oz8nV9uwc3A9HN4eOPkvpngrMILIAEJEuaQEgASISABIzACB2L6+gBIsKkRQFJQAMhKSBFAhIAHmy+x/PzzPO+h2c7wdc6uO09/k7RifHPdrpvWfcfE+Me29x4PPnPYuLynT+7s2HT+jpfd+l/luo9XsafEPU+xeZ58viXtfV/M53m9zm9A5bLr+3Vu1zXP8AKd/4vn/R8l9TwASxBCJCogQEAMwJAAzEBIFiA7F9bQgLAAgAIAsAJJTMQKChEBDyZd9884Dpezc8+7zWPmnpv0fzvej4965mPrvkcjL8c9j7D4p1foxXA9HiPpnldH9LtPB6Gnaub0T5h6Xf/O+Qet3bm65t6p33zLXO4fKO76DxchhzmXyn0Pdy6T2IEMoKkEQAAkQkACRkAgyAgOxfV1AAAAAQkUQJUJAQqARCkIArMhSAhIqpFSBAIgGU0CJX0LzPnXoaMwJTJAkBEEQUJJAAgkQAAkQkACRkAZCEAIDsX1dQAAAgEQzFIAABEABCFEQRADIJAsBUgBAQJDSRCQJEhAAhIQFCQIzABAGQACGcgEDJACZUGQADOQ7B9gE0AABkZCULAEBBEBAABGYAEKIQBABEAJAkDJCyIkKkoAkIEJYEkAgAZAAM5QARAQgGQhAAQmVIQ577FoQFCJkWkAAIIhAUgiFAEZAiAQAAEFiDMIERBBkmRQUQCAISZAgAiAEBIEJClTAQggBlKECkkSUkBDMdh+zYEFlEyBQTJZDUAAABICMlESgyEqxAIERAi2MQSBJEpCKFgiCkJAURIASAIASBmBQQkZAAiQiaIAhmNRCEJEhHYPtBAJUACFSCUBEtoJEgQCQSBKoygBEgCyGUS1IgWEksAIEAiFBAQAgiQoAZgSAEQyCFJCBAAQhMgBCRATIc/wDYAABAEAAEIyCrIgEQgCCFJAQIQRVEiIEQKEimQRBULEAIAQRBAUM5CAAzFrMCEBYRADIGUBADMIkCA7B9ggBAgAECAgAJlCAAAkQCABMgIKRIQ0ZUkBAgABmkAQEEAAIzAhQQgMwIQAZUgMhCJqRAZGQkQFJYOe+vUUggIAhCghMwoEABASAJFJEjQIDIpCEKQEIgBCBCypTIIAAAGYkUgIQEgZAGQAySQAZzZSABMoAjSCBzf1rUsqkQsWJQkSBSAEAECARAIRKEAhAAEEoZgEIAADIEAAACRmAICRASIABAGSSUQXIMwBIsZAFiFSmSuc+tCoRUiyLSWCIQACAAJkAICCFAIUAiCGQRCAAAwUCABmBQSIQAgiEAJAsSkZAkhZYQyiUIghUgNQIRKUJHO/UBEhQRACKLAhBAQBAWJUAAgsCICswhAkKUEUkZEC1kSiFJIJALBIFsJIJAi1EIzYJAkVckEIUiEFiBBQQFCRDnfqIIRAAAECUTIAIGQFUhQCBzvC/cvE4jLg4589iBKhCCJUJGSVDBkyZIZMmTEZMmTJkykMNQkmTNDEejp16z26ldJ7pQhkQEKiIgABBQhCkLhI5v6oACxICgyyUCAAIIiqAAgyH0Xx39R/OvRDpx2498hCAhCEPGQhkyYIYMGTxkMGTB4zJDJgyYMmTJDBxWnTdOaPPl8j9+fHQAWQRAAAQAhBADBA5r6wABkgAAQQAIIEgolWQQFgfRPJr9RfNvRa6cduPfIQgIZMmSGSGTBkyZMmDBkwZMGTBkwZMmDJDJkwcVp085g2fJ/fnNBYMwAAICApkAYWJAA5v62ZKzQAAIIEAAiElAAgZDICH0bx6/Ufg10Q6cdvPeICGSGTJCGSGDJkyZMGDJk8Zghk8ZgyYMmTJkyQwcUdP05mPIfJvfzzuwQEACVMrpAQDJFhEAAOZ+nItBQSIACQAAgCEBAXMAgrJ9H8Wv1J4NdDOmnbz3zIMkIQyZBkhgwZMmTBgwZMGTBDjz3j24hKEIYPXOBPVOn1zNbj5R7+eNUBAEoASIBAZIAAEDPM/TFAAQIAQRZQMlJIEkJaFsAID6P4b+pfBroUdNrt57wMkIZIQyQhkwZMmDBkwZPGZMnAHunbQeOMVg8deI8J651o42PbOn1zJ5D5T78Y1BFmVpQkCCLlIpAAARkAcz9OkALBIAIDK2VmBSIkUsFCARYyU+jeO/qXwa6HHTK7ee6DJCGQZMkMA8ZDJgyZMGDB4zp52Q9k8x5TyliVKkeE6HXxk+oRzR085o8lfKffjGgEyaWM0gXKZAAACJCoBDl/pqIgAAABnOqylESC2AoQRqQzKRYfR/Jf1N8/XQjpddvPdBDJAZMkMmCEMGTBkwQwZOinKnkPMeU8x5TzHkNHjPmFfIbfXr69mdhjqBzZ5T5P7s56QQYTZAuUgIABIRKAJYSWHM/VyECAAEJnUAZKBAsGQAgigA+jeK/qbw66EdLrtp7wIQhCGSGTJkyZMmDJgwYOsnCnsHmPMeQ8x5DzHkMHyk+b144V9STtsdQXnTyHyf3c5uwlIQhkABCkDIARCTULrI5f6QQAyIALJQQJYAICSEVCgICx9G8l/U/g10I6VXb492kQGQZM1kyZIZMmDJkyeIjHyxfI15LPLL5U8k15dPMnmy9S35XHUdSWMrb9PZ7cdQmudPIfKfbjGygHMAAIgIAJNQRAXWZKOX+nATJM0FBCwFZjSAAiCBBGbaIAp9F8l/VHg10E6VXbj3oEIQhDJDJkyZMGTBkwZOGvH5e7cjx+h7mPV6vf5Xu8/X7Ge/N+T73r9vm9V935zq/wA/9V5vD+n4L3/mOM9HxvNn0cP6fjfUd8u2ZdRz1508p8o9uM7MkAAQJCoABDM0LciEzqA5f6mUQCUFESoQAIkAZmqVIFmaABEi/R/Jf1P4ddBOk13CPdICGSGSGTJDJgyZMmDBlnpu+fz7Pb3/AD/U97n7p083nx15Ph9Tr30fyfI/N/ZfHvq/iO1/E/f9J+t+F7z8n9/1n6P4/wBnHp4H1/D+pdPP2rGuozpzp5z5R7cZpABBAEAAyAASWElAHLfTJBCoSKKgmQASwpCKCBmlMxqASE+ieXf6q8Gvn50qu3HvEBkhDJCGTJgyQwZMGDLPQt8/nOe3mx29idfbz2x083u+f6Xk8f6Hofp+L176H57svzP1fL+b7XWvd+X4/wBHy83Hi3x+pa49ozvqM3z55j5R7cQUiBkAAQgABM6hAACs8p9LQIKyBIQgoEBABmGiA1CASJFE+h+Tf6q8XToCdJO2nvkIQyDJDBCGDJkwZMGTCdF1j5U3374P9P8AJZxXq+JxPs/Pe98z9j82+t+H7v8AJ/cdD+x+A778T+i9H+x+D7p8v9pwft/O855vsdH+p+L+tXnzy9Tl54858o93PNISAAQgAAJnUIAgqAU5H6SlzAICKhCgBAMjQEBCEBUSVkv0Pzb/AFX8/p8/s6OdvPdAMEIQhkyZIZMGTJ4zJg6/c/BWvNO3llzefFaz5PL9bs/zf13TPr/hPW6ebnfF+h5zyff6T9X8HqvPnt4Onk+2Hnjqlc8eePk/u5kAEIAAAZzoQAFZAA0cl9CCAgEoAgIqCAFSwyEAGpmQlgPovm1+qvB06BqdHO2nvEgQhklZIZMmTBkyYMGTBlPzocbbTjj1yRRQCCAvNH3U4g6qc8exHyf38yQgAAEsJKIAlQAADQOR+hIAJQAIQCVBQTKwFkIQJZUgqSn0Xza/VPg6fP7OjHb490GQZBmpGTFQyYMmTJk8Zk8Z8/r40eseMAAQoAeyfWTtBxZ1U589iPlHv55QASUJYARASgKQAUoNHve8AIQAAZGhkiFICyZQAALAgPovk3+qfFr5+dGO3nukBCGTJDJDBkh4yViMnjMGTFfCq6MAAAADyn0I+knrnFnVTsB7B8o9vOUEQkoIBCoAAAKCg0WX3foQCEAzQsEmoCFRJFgsRYACIQpMh9F82/1T4tfPzox2490gIZIQyQyZIeMhisRgwYMnjrwHw06ZQAAFORO/nfo8RDiTq1dgPZPk/t5wCCRQCAAAACgoNFl2vsfQ5mmaCCKIoJDUzFGQWAECAAmUAa+i+V+qvHv58dFO3HvEIQwQhDJDBkh4zJgyZMGDBgh8+PlpxYBTznPH007AeuQ8ZxZ1Y7Ae1b8n9fLOlCCAAAAAApClNNaNRs8vu5RosCAojQsyEmVUEWAICAEzSiET6L5b+q/Hv56dFO3HuFMkMgyDBDJkyYMGTBk8ZDxmTxnjKddOAPWPbOaObPUBghk4o6uc+eyfKvZzzqAAAAAAQoBSmyzWzZ5THuzBbSQBBIIQFGVABBAk0IACBPovl1+qvHr5+dCO3HuggMmQZMmTJkwZMmDBgh4zJg8Zg8ZgyYrJkyZMmayYjjDrEdg09nL5T7ecsAAAAAyAaKUsaXS7PInkTyter7pUiiQAIggLlQACEJmgogBBUs+i+PX6t8evnp0M7Ye8DIMgwQyQwZMmTJ4zJk8ZgwYMGDxmTBgyQyYMGSGDjTrB2E9k+U+vnNwAAAZI0KaZFKVdxTyHkPKnma9o4f2wECBAQFKIEMgAkJSiUhShJNH0Tya/Vfj189Ognbj3QQgMmTJDJghkwYMGTxkPGYMGDBgweMhkwZMmCEPGcadZOwnsnyv1887AkUQgCk0lBoppdRtdJ5U8see32peSjqXvyBASKAIAEIQSgqIhVKQmbEIU+h+bf6s8evnp0E7ce4CAyQyZIYMmTJkyeMyZPGZPGYMmDJ4jBkwZIYIYIYOMOsnYj2j5V6+eNhAoBC1NIKUpqXa6TyL5U8p5z3ZOVmu0x8g+hmAFyFBkyFIEqUCUBKSWSiIAAfQ/Lv8AVnk189OgHbj3QZIQyZIQyZMGTBkwZMGTBg8Z4zBgyeMyYMkMGCA8Zxp1k7Ge1Hyn288aFAAM7AKaKujUvkPInkXzJ7Ue9mc5q9wxf01x1/PP6vMAACGSAShKBKUAzmwIAMgB9C8+/wBW+TXzw6AdtPdBDIMAyZMmTBDBkweMyZPEYPGQweM8ZDBghkwQyZMnGnWDsh7UfKfbzzoUAaZoKU0tjR5Da+Q8qeZfak5SOwL9Mxf1Pw12+P5G/Y5AADAEJSgDJdBEZDUgkAIgAPoXn3+rfJr54dAO2HuggMEIZMmTJkyYMGTBgyeMwZPGYMniMmSGDJkyZMmDjTrR2Q9k+VevnnYFppkUppbGl0bTyL5GfMexNe9M8uvZ5r7zxv6J5vdUfyL+xxACIqpDJqpVBMiXRGZUCUIEJViAH0Py7/Vvm188Pn52s90AyZIQyZMmSGDBkwZMGDxmTB4zxmDJkwZMmDJDJkwccdbOxntHyr1887UqUpSlNS02vlNp5jzR7JyUnPtd9xf05yv0zFAH8ivscQgSKZLMrpaumYkpABACBAQABUfQ/Pr9W+XXzs+fnaz3iGQZIQyZIYMmDBDxmTxmDxmTBgwYMGDJkyYIQyZMnGnWzsh7R8r9fNuCgpqWml2bNp5TzHsHuxy8dlmvuHJ+jOWuVAAP5FfX4oEUgSKi2aFSAAQECAgAAgo+g+fX6u8uvnZ8+O2HuFIZIQh4zIPGQwZMGDJk8Z4yHiMmDxmDJgyZMAwQyYOPOuHYj3T5X6+c3KU0WXUat2nkPIeVPOvtZckc+v0Dm/S/LX0vNAAA/kV9bjGlJCCBdQBABkABCAAAZozqj6H5r+rfLr54fPTtZ7oIZIZMkMmTJkwYMmTxkMGDxnjMGDBgyZMmCGTJDJg4464dkPcPlvr5tSmlsbrZtfIeWZ8x7Me+vMr2jL73zv3zlr3wAAAfyJ+tyii2JI0koABBkABCAAECgZUfQ/M/V3l189X52drPdIQEMmAZMmDBDJgwYMnjMniMGTxmTxmTJkwQyQyZMnHHXTsZ7p8w9fNq6NJuN2+Q8p5Tz5z7xykdjl+qY1+kebt+NBQAAA/kP9bia0plEAAiAQBAAAQRGpQEhQ+iea/q3y6+dnz07Ue8QGTJDJkhDBgyYMnjMmTxmDBk8ZgweMyZMkMmTJDBk4468diPePmnr5600eRNm5rzHsSe0cmdgze+Zv6L5X6pm0AAAAA/kR9XkAWIEABAgAAJAKJbCAFhSPofnv6s8uvnh87O1nukMgyQyZIZMEMGDJ4zJk8Zk8Zk8Z4yHjMGTJkhgyDBk486+djPcPnXr5602eRfNnPsHsnJLzh3HF+/cdfaM32wAAAAAD+RP1eQhIAQAIAAASFqJUUQsSkKsJn6Dw3+rvLr50fPTs57xkhCEMmTJDBkh4zBkwYMnjMniMmDBgyYIZMmTJDJDjjr52M91eherl5K8teeT2jkF5s7XjX3XnfuPO8mAAAAAAAfyI+pyEAgACAAAEVEtlJIoFiULCZh9C4b/Vvl187PnR2g90gIQwQyZIYMmTxmTJgwYMHjIeM8Zk8ZkhkyQyZIZMnHnAHYz3Tpnq5+ez2jkJrmjtOb9y5vuGNczAAAAAAAAH8iPp8hAACAABSSWVZcioACyLYJkIkfQeGv1d5t/OT56dnPdIQyQhkyZBgyZPGZPGZMGTxnjMnjMGDJgyQwQhkyZIcecCdkPcOA9OOSrnE7XnX3Dm+289csAAAAAAAAAfyI+lxBYKEABCFymrJZVIAIpEmYAALH0Dz6/VfDfzs+dHaT3SEMgwQhkyYMEMGTxkMHjMGTxmDBk8ZgwQyZIYIZIegcGdjPcOR7475L9xzfsGHISgAAAAAAAAAfyK+lxhTJErUpEiKRWSkVakEEkgAAIogd/wCGv1Xw387PnR2k9whCGSEMGTJkhkweMyYMGDBg8ZkwYMGDBCGDJDAMnonAnZT20/Y2n2TN8wAAAAAAAAAAB/I36XGEICEWEVYylGoKskIRCpABICLAHfuGv1Vw387PnZ2g9opCEMmTJkyQwZMmDBk8ZgwYMGDxmTxmTJkyZIYMgweicGdlPaP6GR2agAAAAAAAAAAB/JL6OM1lEZIkUkliLUCEQEEJLLSKuViEAId+4a/VPDfzo+dnaD3AZMghghkyQyeMwZMGDBgweMwYMmTxmTJkyZMmCEMnpHBnZD2z+hh2YAAAAAAAAAAA8J/J76PLF1JImRJnVJnKKEQyACAkFIIACAHfOG/1Nw388T50dmPcIDJDJDIMGDJghgwYMGDB4zJk8ZgwZMmDJkhkhDJ6JwZ2Y9s/oYdmAAAAAAAAAAB0Wz80dZ+c/XjJiMmUyQhkgWRJchMgpCEWEi0lgAQneuW/1J59fOz52dmPcMkIQhkyZMmSHjMmDJ4zJgwZPGZPEYMmTBkhkyZIQwemcGdlPdP6GHZgAAAAAAAABHD1+e+k+GdM9ZOH758Z4zxmTxkMkjJmpEWGUgKQhFgSSlAgKnduOv1Dw187PnR2U9whkhCGSGTJkwZMGTJgweMyYMnjPGZMGTJkyQwQhkyekcIdlPeP6GHZgAAAAAAAAeA+LbfnnrnpunA3HHneNPRX1D1rfXPCz41wmDBmIubIRckBJcggQRItSNAnc+Ov03w187PnZ2Q9whAZIQwZMmTJgyZMGTB4zJgweMwZMGTJkyQwZIQyekcKdmPdP6GnZgAAAAAABGa+X6n5065+fades4yz1D1z9+8N9K1Oj7dU1PQT0br1GfUX1zwHirxHjXBlMmSGc2C5hIXWSyLDUsq9t4v0pw387Pnh2Q9sAyQwQyZIYMmCGDxmTBgyeMwYMmDJghghkwQhDJ6Rwp2Y94/oadmAAAAAAAPn+n546Z+X7nXq4g9Nn168NviP63ePoB6R1bTqtz1TTqenV9Trp6up6p656x4Tw14jxZeOsGTJEhlSQFB2Tjr9Dct/PD54diPcIQhDJDJkyZMmDJg8ZgyYMmDBk8ZkwZMEMmSGQQyekcMdlPeP6HHZgAAAABCuj6n5/wB5+S9HXbOIPSr1Tw6eM8R41/rr4tgABAV6tcEnAVwenCHCaxw1cRbxNcUvop69mQmDMRYCmj2Od+yct/PT52djPcMkMkMkMmTJkyZPGZMmDBkwYMGTB4zJkwQyZIQhDB6hw52Q98/oadnAAAABDo2nwPpn5N0z11eHufRt9Y8FeI8ZgwYX+vPi2AAAAAAAAB4z1K9SPVs9c8RghSnkPj0vFHzw+eHYj3DIMgyQwYIZMmDJgyZMGDJ4zBk8ZkwZMmTJCEIZMnpnEHZD3z+h52YAAAGT53qfB+k+Wbz1/U4g9FfWTwaeI8a+NcnjMpD+vni6AAAAAAAAAAAAAAD4IdUPnZ89OwHtghAZMmTJkyZMGTJgwZMGDBgyYMGDJghDJCGSGT1DiDsp75/Q87MAADwHyrU+F9J853OB1nil9JPWPCeHVwvjMGEi+MyQ/sB4tgAAAAAAAAAAAAAD4GdSPnh89OwntAgMGQYIZMmTJgwZMGDBkweMyZMGDBCGSGTIMmT1TiDshyJ/Q87MBCuGPjnSfEeuenXPB1xZ6a+seGvFc+NrC4MGUyYUZB/YHxbAAAAAAAAAAAAAAHwI6gfPT58c+e2DIMkIYIYIYMmDJk8ZkwZMGDJ4zBkyQhkwQhCEPTOKOyHvn9ETsxg6DZ8Z6T5Fudes4dONr1K8FeG3xnjXBgymV8ZkhAQH9gvFsAAAAAAAAAAAAAAfATqB89Pnxzx7hkhCGSGTJkyZMmDJkwZMGDBgwZMGTJkhkhggIQ9I4w7GcgfvOzpWnxneek7zwdcWeieuvg08NYTxtYMGTJgyQyAQgP7B+LYAAAAAAAAAAAAAA+AHTT58fPznz2QQyZBghDJDBkyYMmDBkwYMGTBkyZMmCEIZBkyeocWdkOUrsHfPHazxEnH16levXhPGuDx1hcs4ahgyQyAQgAP7B+LYAAAAAAAAAAAAAA/P500+enz8549oGSEMEIQyYIYMmTBkwYMmTxmTBkyYIQwQhCEMHqnGHYzlZeJ9fL1rPXXwni1PG1g8aYMrkymTCwgBCAAA/sH4tgAAAAAAAAAAAAAD8/nSj5+fPznT2QYKZIQwQhkwQwYMmDJgwQwZMGTBkyZMkIZBkyescWdjOWl6l6+WK8aePVwuDJEyZMEWGQCEAAAB/YPxbAAAAAAAAAAAAAAH5/OjnQD5+c4e2QyQhCGTJghkyZMEMGDJkwYMEMGDBDJCEIZMEPXOLOyHLHSfXzxphcGSGUyuCEIAQgAAAAZ/sH4uoAAAAAAAAAAAAAA/Ph0k+fHQTmz2QQGSGTJDJkyZMmTJgwZMnjIYMmDBkhkhkhghCHrHGnYzljofr540ysMmUyuQQEBAAAAAAf2D8WwAAAAAAAAAAAAAB+fDo58+OhHNHsggMmQZMmCGTJkyYMmDBDxmTJkwYMkIZIZMkMkPAcWdkOWPn/r551cmTIMgEBAAAAAAAfpblO65dvzrtWb2leyZciUAAAAAAAAAAA/PZ0Y+fHQjmz2SEIQwDJDJkyZMGDJkyYMmDJkyYMEIZMgyZIQh6xxh2Q5c+d+vnjVhCAEIAAAAAAAAfQsZ9qvaj3D3V9qOdjs0dlzrsOXPrzeXMnLryMeZCgAQoAAAPz3HQq6AdCOaPZBkhCGSEMmTJgwQwZMGCGTBkwZMkMmTAIQyCHqnHHYzlz5z6sY2hSEAAAAAAAAAB2WZ3HkPIeU8x5jzx7EewexXs5eevOvsnJLy2LypyJ757uXtJ7J518h5AFyYPmeXlw6Bb0M5k9khCEIZIZMmTBDJkyZMGDBDJgyZMGSGTIIQyZIeucediOXPnXqx49oAAAAAAAAAAAcxM6uqaNSbTcuk0bNnkNxs2eSvLGzyGjZs0la0AgEPNy19f5a6AvRTmD2SEIQyQyZIQwZMmCGDJghkwYMkMGTJCEMAyQh65x52I5c+c+vGNAAAAAAAAAAAByJYtUqVKuirpmrTWZopSlKbKQ0CqCAQ5rlr7px10JeiHMHsAyDJDJCGTBkhkyZMGTJkwZMmTJgyQhDJCGAQ9c487CcwfOfXjOgAAAAAAAAAAA9tKVRSlBpKDRQUpVCNJKoii2FQDJ2Lhr75xdDXoi8uewCGSGSEMmTJDJkhgyZMmDJghkwZMAGTJCGTJDwHoHYTmD5z6+edUAAAAAAAAAAAeZNBRUpVoQVaUAoAjaKhI2WooJAdj4a+/wDF0NejLyp5wDJDJCEMmSGTJDBDxkMmDJkyYMkIQhkyZIDJ4D0DsJy5879fPOqAAAAAAAAAAANFKCgqCqKUqCqKRKABAsjVRCkOzcr+geGugnSF5Y84IQyCGTJCGTJkyZMmTBkyZMGTJkhCGTBCEIQ8B6Jz5y5899fPOqAAAAAAAAAAAKUAApCgoCCqBUAKLILI1UAkXs/K/oLhroZ0heUPZMkIAQyQyDJgwZMmTBgyQyZMGSGSGTJkEMgh656Rz5zB889fOaoAAAAAAAAAAAAAoBSAoAABQAACgAA7Rwv6A4uhr0teUPMCEAOUPbqGYGDgDwmDBkwZIQwYMmSGTBCGSAyCHrnpnPHMHz3185qgAAAAAAAAAAAAAAAAUAAAAAFAAAOzcL+geLoa9MXlDylIQEOwnIAhDynLnykyZPGZMmSGDBDJkyQyQyDJAZPAemc8cyfPvXzzqgAAAAAAAAAAAAAAAAAAAAAAAAAU7Lwff+N6IvT15I8wIQFPcPOZIZNn0A+RGTB4yGSGDBkyQwZIZBkEIQyeE9M545c6B6+edUAAAAAAAAAAAAAAAAAAAAAAAAAAdl4PvvG9FXp68meYgBCnZTkzIMnnOQPk5DxmCGTJgyQyZPGQhCEIZBDJ4D1DnjmDoHr551QAAAAAAAAAAAAAAAAAAAAAAAAAB2Xg+88b0ZeoryR5wDIBkhkhk8h9ST5KuDJgyZMmTJkhgyZMghCEMkIeE9Q505iOg+vnndAAAAAAAAAAAAAAAAAAAAAAAAAAHZOD7txvR16kvJnmBAQHeTnWckXJ4jph1pcGCEPGZMkMmTBkhCGSmSGSEPCeoc6cxHQvXzzugAAAAAAAAAAAAAAAAAAAAAAAAADsfF90896Rb1NeSPMQEBoyZMkIZB4zBkyQyYIZMmDJkyCEIZIQhk8Z6hzpy8dD9fPO6AAAAAAAAAAAAAAAAAAAAAAAAAAOxcX3Hz3pVvVF5I8pkoIU945AhDJ65wJkhkyYIZIYB4zJkyQpkhDJCEPGeoc4cvHRPXzzugAAAAAAAQoAAAAAAAAAAAAAAAAAOw8Z9u8+ulW9XXkjR9cZ+atceZOaO8s8euTBg9leIOjEMmTBCGTJk8ZCGAQyQgMgh4j1DnTlo6L6+ed0AAAAAAAE+ic7yx811nj7pQAAAAAAAAAAAAAAAHYOM+2efXS7esLyRT6sz049NYdmTiWuqAwZPeO9HzQhkyZMkMmDBDJDJDJCEBAZPEeoc6ctHRfXzm6AAAAAAAEE0mZVqgAAAAAAAAAAAAAAAOwcX2nz3plvWV5E2fSk2mCGDqbXAkMA8id2OhLkyYIQyZPGZIQyZBkhDJCkIeI9Q5w5eOi+vnN0AAAAAAAAICgAAAAAAAAAAAAAAABz/F9m896Zb11ffPKZZjVMA0ZMkBk8ZSEMGSGDJkwQhDIMAyQAhDwnqHOnLR0b185ugAAAAAABJ2bDnpejdHqUAAAAAAAAAAAAAAAAOe4T7Jx105euLyB5SmQZAMkIQ2d1OhmAYIZIeMwQhDJDBCEBCAh4T1TnDljpHr551QAAAAAAAk5/LsOb0Xo8NAAAAAAAAAAAAAAAADneE+x8ddMXgF988oAMkIZBDJT2T0jJkyQyZMGSGSGQeMgIZABk8R6pzhyx0j1886oAAAAAAAACFAAAAAAAAAAAAAAAADnOD7BxvT16+vInlPMcseQETwHDL4jJDR2NOqrDJDJDJgwQhkyZMkAMgAweE9Y5w5eOkevnndAAAAAAAA9zLnDq+gAAAAAAAAAAAAAAAAHN8H1/jenrwK++eQ7Kz4D11hU909o4s4FqG07gnRmoZIZMmDJkhDJDBCEIAQEPAesc4ctHSfXzzugAAAAAAAnecOdzPnXRx10AAAAAAAAAAAAAAAAOa4vrvC9QXgV5E8x2ln0jNcTm+tWTkTmT2K488MnLHRmsmSGTJghkyQhgyQEIAZBDwnrHOHLR0j185ugAAAAAAABIFoAAAAAAAAAAAAAAAA5ni+t8L1BeEXkDyHJs+cVxeb61sAOQs9o1YOtZ1CGTJgyQhkhgyZIQAgICHhPWObOWjpPr5zdAAAAAAAACAoAAIChrOc3QCgAAgKACFAAAczxfWOF6ivCryJpKkKsMqBkyQhkyQhghgyQyQhgyQhACEBAeE9U5w5aTpXrxndAAAAAAABO787z0vzvpnjrQAAsgX2MvuWHzWun7yChQAAAAmahYWQFU5nk+r8L1JeIX3zyJ7acweQoPXa4U9MyZNHbjphkyQwZIDBDBCGCAEIADB4j1TnDlpnpXrzN2BKQFAKQBQAPezOek6nouqSBz/s5WtXNW1qu8cXRuk3pqzVDzS8nyvv5vu4e7jXtYe1jXsYvsZ1548snmzdxdLKIZOlnhmepLxC8geRO0px56xAe6ckegdfa9Y8qdzTorWCEMGSGSEMGTJCAEICEMnjPVOcOWTg/qcVgzGbZlCSQzLlRIksiLkkTLOqiTIkZjsX0cWSamijV9/m5nneW565bjeTxrlOeva52WFRQJViFAAAAdJj1NZ6pLxK++eZO2J65F4I9RYeyzzp7x6h4z3jojWTJDxghkhDxmSEICEAIQyeI9Y5w5W54X6vOMwGM2xCJDMYWKjMiaksMxzmXPS9G08LLKEOw/R5ebnrsHO89yvN8d87y17mbIFAAAAAAAAAAOknpM9UXi1982nunsETjl8AWET2z2zQOBXJDBkhkhCGTBDIBCAgMkPGeqc4cozxH1uMrMklksWSRISMEahnMSyI1JOx41zMdK09LRnMyV+iue+c525qoWAAAAAAAAAAABDpJ6DPVV4xffPMnMHomUyvgTkF9c9VfaTxmDRx6wyZMmSEIZMEMkBCEAMAHjPWObOUZ4j63GWSWZZtyXMhkzGSNQmZJZKXMmWoSM0zmQj9TebqAAAAAAAAAAAAAAOknGs9XXjF95fOzzieMhk489o9NRyCAekcW1DJkyQhkhkwZIAZBADBCHjPXOaOXZ4j63GamYmbCTSMswyQxLFmUEsmoz45ozM6mkkZkP1H5esKAAAAAAAAAAANJldBo6RlxrPV141eQNgEIZBDIIQhDJkyQhDJDBghAQgICGSEPGeuc0cszxP1+MsyTFGc6lSZhgpiXKssiE1le84z2ia+M6zLYsxlH6h83UUDQAAAAhQiFoAAAVI0QdKy4xnrC8cvvnkMpAFhkAiQhDC5IZBkhDBDJCEIQEBgEIeM9c5o5VOK+txazkzikzN5pnIyQzGZqGYQmovM4c1HR9pErOcyP1F5+oAA8x4TyniABUigUgAAACkA6ScZnPWF9BfePIZQRSRRARMhcmTJDIMkMmCGSEICAyDJCEMHrnMnKpxn1+MuI1nKJJrMJIZIZjM1CRISy2RiBmWVM5kfqDz9QAPYO+HXTkjhznjjT1zznqnBgEqFAKRKFAHSJOLzOsr6C+8eQEIQEBCEIQ8ZCEIQh4zJDJACEIZICGSGT1zmTlU4z6/CXOSZ1IhJUmSEMS5IsygzZdZzmNZIQmcyP095+oAVz5yceE5Q9A2cYc8eicUzwoUKAABAUAdLjiJOsS+ivvp5CAiiVkRCGQzlqGTJAZMkMGSEBCRNMxAZBCGT1zmjlU4v6/G3GDONZplm25mSGBGFizKDNzXcsa7jh8g29aoTOUfpvh0BQCEoAAAAAKAAAAAdJvo+T9+HjNWeZKIVItQyACARAZoJYKhEgzVKgiCICVC0MmTR5b25T1eWsYMyyJLBJkhkR41iyEZlS8/J6udcLpCEzmR+meGwIVSAAUAAFAKAAAAUh0y9/mXSetYk2UkWFACWwAoBAUQAAAFQoAAJJmqQyeU5fPX6FvzdG9XPhOmM5sJLCSQhDEZWLIkJZLIwsIQmco/SnDYApzR4jll4GOQs9E9s9k92Ou1o96vVy8deyvMWeocZL4DdnIR6NvgjxWS34/h4MOEt8R7EaJVFTKAEKAQoAABC1ACxCAAAAGBXuGT63pzdnWe3P596ZxFk1JNSSJDJmMtSJEhNQ5uTm5rpVeAhM5kfpThsADsp2A8y8XCzlzq5o8hzNviZ9XbitPLZ1vrndezl7+p78vVtzktGHK18d9nOx0n5Xo9zz74U8R5zYABCgyaICAAgAAAAAIAQGiEMFPbMH1nTm7kRep+jHz30Y4/S5RMkMxlqRIkZmlc5ic3nXRNoQmcyP0hw2AFexHgr2a5Gzhtx0nXO2fT3PF0xxnR9K8+vlnrzzJ4E9beeUzrjLnkV57lrr/AEz49z3ca9yOm+jA6/8AD9nL+LfCHhPYNAAAAAAAAEIACmQAAAAAQ8ZT3DB9W1OasGQZro/fHRO2fDqQhmXKyMwiLIkZWSyoZxkfo3hsUV623D9c8T258V3cZvGNqW51uWXVWtFolArSWwtWixbTr/w/Xy/i3wh4D2TQAAAAAAABCFKAQgBAAAADxg9syfUtzmUpkCkepqfPfVnqXTLLNZWRIsuVkmYi5lVllhk/QuNcH0nCd8cJ6J6Os6s1pqKUGtLc2qaNaC1pKQtCpUXVqg6/8P1cz4+nBngPZNAhQAQpACgAAEKCEBQZAAAAPGD2yH0/pnmIAAgIcH0fNvRji9Yi5gszSyTCxYQmcyBz/v57sW0us6KarQKUu86qGzVUuhNFJQqUqKXVOA+H6uZ8fTgzwHslPOYKDJTANlKeIAAAyDRCEBswAAACGAe4YPpvTPMQBkAhBUro/WdE7YwiWSxZJlYQizOcwOw/QxRc0ulqybLWgUpdS2WtGqGhpUpTJapQzTgfi+3mfHvgzwHsmjZAQh5DJkpCggAABCEAAAAAAB4we4YPpW88rtYRCkECAW8ZufNeuOI2ksTM1khCSIzJF7B9DnorKtCtWU1WilBS7zapo1VLQtlAoAU4H4vr5vx74M8B7Bs0eQHiIAQ8h5CGTxkIACAAAAEAAAB4we6YPo/XPLUoQQJkiABc3PSe06N0klwsIQkiMyZXsHu5aW2WllNatssmq0UoBbLZqrVKapSqmgKhTgvievm/JvgzwHnPIe0eMHiIQ2ewU8QNnrAAGSAAAAEKCFIAYIe4YPovbPK6AQAmUGQRCDTi6+a9XG7iIZhMyMrDn/dzqWtVUuiLbbNCzRooLYLZapatWLWgWyVYpwPxvXznk3wh4Dzmz2AeMA8hs8J4QaPOeqAAQAApAAQpAUgIZB7hg+hds8rQzAmgEGTJEAB4q6B2nVNkSZkSpKOb9nLWlTS6ttyKK1V1LFLpqKAWtMthYpapQNKnC/G9fM+TfDHrnnNg8pQDJ4gCGjyHgBSAAAAAEAKQAAwU9swfQOueU2hACAAxlckCEAOtdHz7efEgy0Bzfr4ltmtSmrrVzRQtWrVktaKUFFUtyFUtAVOG+R6+a8m+GPXPOaKQgAAAAABCgEAAABACgEIQh7Zhe/dccpvMAaGSAkKmTJAAyU47c+b7nH2gZOc9fIUamrNF1rRWVDQLpWatqmihKFAGtZAus8N8j2c15N8OeA85o0eUh4SAGD2ClIeuaBkoAABCApAAAAQh7Zg730zyXSQgLLKgAEOaEAIAeDT5p1nGCsn/xAA/EAAABQMABgkEAAMIAwEBAQAAAQMEBQIGEQcQEhQgMRMVFjAyMzRAQSE1NlAiIzcXJCYnQlFgYUNFcSVSRP/aAAgBAQABCAEZ159lkZGRniyM95kZGe8MZ7zPuT4sjOvIzqyMjOvIyMjIz7fPf5GeIz7jPcZ9zkZ/Q59oWrIz3Oe4z7fOq0Gjd/cjNm6XsGFM/wCGU0fUE2OuNqpOio6a/j9aff59xnvNH/5lHDSTEykhINa2GjthKRce762tthGzNzSMi8d3dBsZLqtO9bVaKuWS7GUcw9mR6BIrdnrshKlxYFttlUFZeXa3bbr98UXU8t6iGvWMVa6Wm6CCccaNgNW1VmoK1WpExsVbfXz6JuWEuKtRi9uyOQi5lRBp3mRnus8WRn2uf0Oj78yjhfNzvIF43RbWjOFdTN4zkICzGSk/JUPOurFSXwhpFrXpt9OtrTd8e4Y0oXM+teAnYY38Fa9bUrEbm4KZsI8bMjNs5GQiUENMPkxo0e/g7cWpc7qLjdzlGDWy7m6VBpccVVCy6rCr3Ge9zx5GeDP6OwKipvGPOqZXs94sVUmVw2lBs6yjbTvGlvLPa5WktH7NfrJO8rij1IhNaMVmrUuZgnRKPrngYGHNhA2JdRRO2ykUa7CYu+tkbiu1d/PNnrVxMWlc7FKiTlLpg4aE6tgbQuuMqhChpxg6sm3Oldsrlla5mXVfVZ9rn35+1bW3OOW9DhDsrcI7K3CH7RywdVtXfGfvMl7rI+vu88aFwzbdChBHtNPjtNPh46cPXNTl13+RkZGePPDkZGRn3ORnvD/W5Gfe5GRn/gue5yM9xngzwZ/VZ9nkZGRn3GRnjz7M+9z+xgIopCutRWuMg0+e5wY3SDG6QY3ODG5wY3ODG5wY3ODG5QY3OCG5wY3ODG5wY3ODG5wY3ODG5QY3ODG5wY3KDG5QY3KEG5Qg3KEG5Qg3KEG5Qg3KDG5wY3ODG5wY3OCG5wY3SCG6QY3SCG6QQ3SDG6QQ3WCG6wI3WBG7QI3aBG6wA3WAG6wA3aAG6wA3WAG6wA3WAG6wA3W3xutvjdbfG62+N1t8brb43W3xutvjdbeG628N1t4brbwTjLfX+hXJEdVq0Vpe/tqrYgTMPXNW2N5qG81DeahvNQ3mobzUN5qG8mN5MbyY3kxvJjeahvNQ3moE5ME4qHTmEenW2+i6aoEqYJQxtgqjG0YzqVTVRUNNbIyYMzB1GNowdZg1DFS5Fzqe0lyN8fwbyob3UN6qBu6hvVQ3qob2Y3oxvRjeqhvVQ3qob1UN6qG9VDeqhvRjezG9GN7Mb3UN6qG9VDeqhvdQ3uob3UI53VtELsr27aQP9BA/jwfeM9VDNr2DUfinxEL8ZtWE10DS9mLRipGk0s9sg8uZi1cytFKUo7STsSDYP49y5knKKjdwogreDFoiziZBhY8A2k4ORcOo1rW8km7In7OMq0jIxqErJ28xknLMTMlFvG1NDKUZNUrQhniZao2s2dgvXKFtxzKti8l5NOVt5Wvo3C1CVbytNk9ShYCqlkquxjpWJXkYq0WzRap+o86zg6vpVPxqDTdnbG6v7zDwz9XZBNoyHjGrh86dwLtoqR14p5rO0KAo/wA+CtxXVz5j6a06TUrpoTk0rctTYjnDuOh56BdS0HbDBm6te4XS+S1ZLOrJaslqz9dUc1rev0GdEm9tSDf1xSd7RDWNetVo2U7OWtWlFq3fFx1EbGz8OYSrgYi0Id68mJuCdx6iDLnwRniIXJ+LpfoIH8eD/wAeqDbM3ej1VJ9TCW5tENJ/5H9NIvnRAsH8xjRL5ObfUldq9cMlDQ7W/wBBM5NCXbZ3/RoYVe9Qo2sxETGUNNJT2pS2HFbu9WTtWeiIBWaeKLTTVizc0UMJn8CgBTqT/pxWLckWSLN3FSlFvxjqvYjmDRZncrRo5u363M/CZ1U52bJS6XrRIFblf+q4nDatJnHsp0v8MQYq2aSPPXVvSjJs0k38Kq4ZrOYDR2RO3UrvVsU013DF0Vv0US0oVIC6LjRg7hdsIm/WLJJePko2WVrtQ0IqKu9k2Xgo+4m1L1lEaP4R+Ouzm5+H6XSH9b0khTXXQVWxo6VbIW5cizy2p5C4ZNKDlm9TSHuFQn8VcLyRlGrGQqj0GGkQoyi6LkQg7ldsou0EI+QlZedkLQuNCeuVqwloyHRl7/WjqzuWuh7uwveITg7lcsUMi1YRaek93K95hCWk0k2MHGO5qVSj2l9SLTYZ25FiiegErQimzl+2h560nkzG3qmg8tqBn28pCMqNHe40QSKDDR5MS64jPEQuT8WS7jPuIH8eD/xHqT/piqKPMpGk38jIS7Ra54SOkIu0YZ1Evynpmzm5St370rI3WwdPVV1XbpC4rJX3fRqabp2/hV76dk9ud2dMi9RqsM50rO/K4wXFbs6vOvlkZCGlY9Eln0z+BQAp1JFnRyoIiEdSbRZVmytqaWckmLnfpKXSTttccSu+eVS0YUSlGwy7iWtIv5UsCIg6eNm5fzLvka07Qt5RFdwst9VVLQlzj0HzCxoiQg39c/L6M10Tn3bRS2LUnkLmY70//qzUL7tiZXup04YaRTpadSwwut9dDutCXtu6u1SbBqVwT/8ATa2gxXNq9QdFesC8mH/aGBK30IS2nb+47N/C7qGjv80jRaqSCmkGYzALaQnNwtk3kv8A1arGkH8zlBo3NNz1xB1WBakyyuxs8krbkUI3Sauq5ff2lIytbJO6esym10phi1WevUWbafgpiLg6LbgZWKkotRNORVgJm3bY3GGlISWikqFJCSg5COjGUi6ptet/azOVhGzBxbdgTFUto3bI3BCO7cdR1x0OtKCzxXSSnRENIi10RG+Mhcn4ul7zIyM6rf8Arbof0ntDZMdKv0HQDBhdVdevbXQVXbqdIg7dPHdRVO0VXCJVkjshFVdEq+hQUWQVJVA9ozMzNZfoN3NOpRJQlEus5YOHb5zRsOCUXqToRrpoMFRUIuScMmTtmSXSJ1lWnW8kFqNhWigNVnLc8t66lFKukWXlqGe1Sm7k3a30p/i2to7jmXU25SUW2TDN09Z1HUzeO3rw8vCI/heTlV6KKFrbrVUupgsvd0jItLslqWVW3VUdVTN4/Z53RZRddU1V61HFaFCFeyYZPH7EzNk4UcOVelcJLOUklEkka1kFaVUDqWNXpjWlJdemmlatVzUvvFS1ayytSq0FFqyr8mqVvRcxESyc3dL9Wp2+cOjSkpZJvu6ezUEjWSUpUS62mg6cPXVRVOut5oOnkg7IqXaq7tZFNFZk5eslelZvF3bxbpnbdZ02rOtsVJlycKOXKpquNkxGUHtkLmLFro/oLQVoVjlWYdsdox1cY6vMdXmOrzHV5jq8x1eY6vMdXGOrzHV5jq8x1eY6vqHV5ilgZAmlQJtUOgrBI1gk6yBU1iqqsuS6bpb6H1aY6tMdWmOrTHVlQ6sqHVlQ6sqHVlQ6tqHVtQ6tqHVhjqyodWVDqyodWVDqwx1YY6sMdWGOrDHVhjqwx1WYqja6sHV1XUOrDHVlQ6sqHVhjqsx1WY6rMdVmOqzHVZjqox1UY6rMdV1CPjDKohfKySUe2j/0CSiiShKJFPzBEO0MyO0MyO0EyO0EyO0MyO0MwO0EyO0EyO0MyO0MyO0MyO0MyO0EyO0EyO0EyO0EwO0EwO0EyO0EyO0EwO0EyO0EwO0EwO0EwO0EwO0EyO0MyO0MyO0MyO0MyO0UyO0UyO0UyO0UyO0M0O0UyO0U0O0U0O0UyO0U0O0c0O0c0O0c0O0c0O0c0O0c0O0c0O0c0O0c0O0c0O0c0O0k2O0k2O0s2O0k4O0k4O0k2O0k4O0s2O0s2O0s4O0s2O0s4O0s2O0s4DuScMsBVStVQ1Ff+I5Gf2Oe4z7XGvP7LP6QuLGvH/AMjIyM+7wMDAwNkYGP3eS1aM4eOmHj6iQv+PaRdyVtGOdWjGEjZnrLrC9WTaOul6yad3o1t6ImIddeQk06EZJyinwlx4BECpBUDox0QNMHQDpGyDFq2Au/RoeS1VuWXHfy3LqybZk0NthdNuP7fc7Dnhq8JiUs+BQtN0+T4Y61oNWwClK9R8FmWK7nESfPeydlRVGHill2fLInuN5We+t0+n1WbasG/stOQdUeEj97oW+5SQ0r/mSuvQn/AO4Gkj85k+80L/jrsTX3h73WARDZMFQKUxQjkJNTMN4xRTlTbzkyyHMOqnzWaHQK0DBpDRtCpyVwba+k65HMdsxTCojqM6qomQexTul0wZVM7zs/+cuioiuogqMDGs3Dg6dk+GGL/KYuKxYeibuZsyW0mXHXbsai0j1lFF1TVWYO3LB1S5Z2dKt7wtZWh/OMFIqZdxqujsv8t0hR4S7s/ZaEfukkNLX5otr0Hc5kaSvzqUFoWy+uN2dCPYe0YpIutU7MsuUI+rb0tB5buFwZ/QL2AwUteh5HsNH8HHNqFJ11o+tt80NSNoi3C831Sxi9G8O1bEpLK2NaUjQdEZo6g3cCwfMncz94ecH+nIs2xHUwjS+fnZ1lNP5Dmc0bt60DWg101G69aC9mWe8ny3qvsbZ7H+U8mdHbVRDpoRdNVs4UbuLAiWc5KLNXfYYqppShNtAWtnd6LhjGELQmuVrdA+oOuhVdm3/hVcNWrpA6qJpy3bOVG6rl6gfJVymY0Q/x0Sag0gr7d4yIOsgdRDQsttw79AXtQSV3StBRdmQ7myKZlTP01R9mRC9hlN1kHVmRCej6meIWXZz64zNcdhLNjqdl/J6NYV41NaGmI15Ev1GT6F/pGQIWNbK9ySnRjSFBWtbqJNWmrQcltXI9UGmlTbvIqNcJPTEJ0vVUrIvJR7U9kNGtBqaN0qaIDRkxbx9Du5uwNlSKRkwvyzXdsKULAiM/oVqaLjXaUO5+u2NGiNe7qy+i2McNeng5Bm5j3yzF5o2g2Vw3FVHv19FlC1xVItm1jWIR7oNJNjsLeZUv2NgWOvcuXjiuwrFYUdE9ntF7U6E3kBpOsqHtyBSfR4snRkrJNE3832R0bdLuAvLReoyaVvoHudB33aSE9b1sSElU5lOyNjDshYwteHg4reOptJf53KC27hkoBzUqxeunD11W6doqKIrUrI1L9odFqzhc/AKH9EXZKchXKP3cm9Uevmb94zQXQa6EGBVuZCSr0mzi8pcThmEFK0FqFkbDl65u2W7xaZ+8PRkhkhkWTFUzNzNGSmle414pBGHjeZmdUBdEvBoLIMW1C8lJpJVX1J9lbSSQjlK61ValVdG1wuYucbMa9NEfSi7Zyiehc/8AEboaXJ5dJ1RCNqFNk8kpIPZFyn09xPKbTtFFFrVJrV1HVXa1yLxkskY0usi3JtK0VqipQzGhL6sZMX+f+M5QZGRoM9LLDSD+bSot/wDpQmKeWqG/pEQLkJD+jKYi2lb+RbMk76laLRtVBlGLqKOFq117anpGAedOwknzuSeKPHsJ/SIhbMG8n5ShiznpOMsG2kmLF64Xeu1XbrVoJ+8yQ0y/nCgPg0UVknYDWuq65t3PzCzx2ycLsndDppWrTdmjJRZekz+lRSd3zkhBIw7n6YGhmWcs7qTjadO7ShK4mLunQf8Am1Y023E6amhBMyIhIyD+R6LfblddjNHewzcKKOFq119FE+vEXM2ZDTx+IthoziaJi8WiCum25nKLmi3WWCxgaEbmcquq7deaV4pOIvRzQh3Gg/7tJDS7jtssNmgbNI0E/SuaGkz87lBaNsP7jcVUtzsG1I/BSfZKwBQ1YMrDcNYz/QLn/pUpr0I47NPTEzWdcw9rqGhKsztl2RzX3l6LTkLHStxlRI9aaORdkhY6ttvk4zQrRSdyuaz0uVZvVYZ1WTSVd3xJHpzrP/8AHo1RdR0yjSotNn40zGhX8kdjS2f+NFgVQtXClyR1FV5R0LJN29E12YsUdmLEGkiTiXNoKoNjqGRoOU/u0smNIhbF7SpDIVbuEkEl1dBtGI2SWF/Vbd6yot7+k9ALlqhv6Q0guQf/ANGkxo0oKu+Yza05Hl9FUjAwNkWygo60YINEYhvC2NEtWzjTJb1dezcDcyGNWgxTE+/SGmenF7HrMyLmWDL6aN/6ZUCjwlq0ff0vSCf1ppIrc0XVrtCdz3YzR3R/AdsW1ZLGcQdRWn37lEDQf+bVjTb+aaoYirmWFJ6efxNpqhDOmaYVFp5/EWw0CUF2lfqi7LbsuRn13cx2N0bi34OwYOWRk2Wm97Hv5mOWY8OdehL7nJjS1+Zq69CB465Gkv8AO5QWKe46OE3DZwus6WrcOBbadSGi2hOv/SLmq/yvVLXoSdF1ZJNReTStjdckhWNEratraKJ1zP3h7waKnpM7wRor0ysK05ZvKEC/6gHNLSeYO69MzI14Nq+TFos1H9zxzejTW7Lq6OZjQwf+InY0tfmSoyIxzuki2djS00N/bCbxHUf0GdWhmQpQmnbGrTBEqozBTNFNWKiMQj+Fve2zjnNoxKNsQFbZWTdm/knT47Q/vmjVBslsnT/CYbt62WjPdFS5B/8A0hoIWk8KPuWPeVaY49R1HM5BIk8ihEzPBUomLTcUsrFZr13HJvJySrfO9Hs1RNwCkY/vCCrgplRoDIGQ0Uv6WF4Ikppph1Vt2m0AY0RQO4wyj99ekilK3Q/eIaOT/wAt0iFHgLVYB/5ZoENGjdJzecXQtpzkXVBR0dRghooTOu+2Gzp4PL+IGhL8zVGmv8xLUmoaSlCtGldt1xYlblqLEYVyN3xjejTmebSbjQs8oa3r0Vem2OqQuiiTL6AiyeCLudDB/wB/lBpX/MK9ehflMDSQf+N5MaMbpaoM+pJCQ0eRLpc1mjaxICM/vkoo/bSNquXjP/SLjq/y1W12VO9QTVLquXh4O7WqToNtH0IzU3h7b0uxlUlKo2Z+8PdWdSalaSlKqcBc0Tc8Z1bLL6N4qtXaRQb2xZsaqar9RBZ6sq2si7WT+Mph5l3o7iF1zVQZNbdsplWtXdU0tOzFb1TQ8eJ54NKp/wCL69dg3ez6tohph/o/hnavTMo6yIGKr3t/pJm4iWeJUR2psus2cJuG9vXhFTzLcpZ5o9gl69tCHt6Atn+/BvKQl1Mnscjc8C6gpHdltGVzIxe3FSM7ZcNNODfUMrStu3auspF6+okrRcvUiRqwHn9LSoFDavkLOuJNywpi5d3YsQssaiEJARcH/eaJC3usZFVyyRZqN7Z3A3MQtQIat7DSqL9G6YxG5oEugUaK0mdNVTesdFWR5K0b1avmhMZuRsC331fSoRllW5Dnva9/3wmu2VioXYGj4/8AL5AUF/AQwLEP/LtuIV6rGSLWQQV7PX3DUD+y1jkW6ytq2H9EYz04/V5EDQx+XrDTL+W0a9Gd5surU4SXfaPbaerGuigralj4as9Nn4mkQZuVmbtJ23i5+3r3h9wkVtFUbUrlGNiLUsZHf17pfMJKdcPI7uE1FE89HXXXWea9Saiieejqqqqq2qwi7eI07KS666/1XpWWpT2CBrLHRsHrRWWQM6kF3TpcsLprLJlhPOefDQ+e0U7NCldalZ1qaknrxKjZSrrrUr21MihWug8p1KV1nmvIyMhF26Qp2UFnC6/n5GRkZGQ3euki2aFVlVqtpWOfOY94m8Zykk6k3tbx4VQQeuUKdlFRworXtrUulNjYBKil5XsbATdEQRfEQYziiOCTYXLVTXmprdiGP5ju7UNn+XIXF0uQ6lSqFcnURYpVd5yYqcEKlgaoReuUCwgu6WX8/bG0CcL007FORkUuFqadinIorqTrKtPrGQMsCmuqmvbpUVUU8xNStOraTUUrrq2lNdCyqdGxRarWt5csa2T0zO6OzzZHXTISFNOyVddSle2p7rOrIzxZGeHIyM6yMGeszGRkZGRkZGRtDaG0CrBVilQULYFLowT6oG+qFboxUsDVMHWY2gdQ2hkZGRkZGeA+MxaUNa0xbG5pLaOi6X+TAQERarVR+pe0/wBoJXpUvY57jIz3+RnhyM6sjPFniyMjIyNobY6QbY2xtjbG0NobQyM+yTrrTUJRNO6rlTo2CfPXj5Xpn3cZ7rPus95nuM6sjIyMjaG0NoZGRnVkZ157vOrPe548/pMjIz3uRkZGRkZGRkZGRkZ4cjPcZ9pkZ97kZGfb5GeLPBngzx54s+9zwZ1ZGe7SLaVppGkazezvQu2FdWKDMaQ4Fpb00myZ8cRarJKFonLma29ak+Zt7ddoLNXSrZx3eRMxD2JJqb0WVFITdxoRzq7oeuBn3McdFNSldKdF92ohbcVGKlqYNlXz1Fm3lWLiNkFmDvVYUO2nrnQjHahbKtdOrOvP7XOtv56YuCWbdt3dsy90xDmDlHUa501/lSAhrfjE4GmeuRzb8HJwrqTtiJgmkhZklLJ2FAJ3DPbo5uOOqiJ55GC94JlAVR7VGn61EQ0wmacpFMyj3a7F8i9bTEg6m5et8u4t61oDo29y3VbzeOYtpeJtm1ouTtNebfx0FZk6qbCFVauE31TKpxAWpAbDe47nj4dkbdWFYwEMwhW0rdEvb0StAKztt2Bbja5F36C7WLsBZyUYJWJThblri5fSKVt7nEb6NE/52yF80FcVtKSyejFgirLLTT3Sa+Vk7OtuRVtaAbP2DqYl2tv2vP0Lo23o+KP7VsykdJvUHXkj0EEwtfqfrGcVtyAlYV7I2xoc/P2QX9Qr7PP6PIyM8Lf1CY0zfm1Yq/x3ZNRDTb+Uoi5Dt6i1bZ61gZ+0IRVwqy0UuUin1YldBFW2bAlFK3UcVyT1qTdN7yXW11yD2mk8VEY0xFtykS8Jg1WevkWbdjGrRF+R0c90k9L24lOka5/sad9Ix/o4+Gj383iQnsf2wfzL66btpMdP9Pm/TtilaK62Yz9qxkTKNI3RLt4uHom2ekT2NMn5UiNKnkW2MjRJ+eMhaUoizv8Ak457e6KdqWmjayF6/wBN7RDHqgtEbI5aCmLLhpdCTaQS6TrSG0coaR/zmWCEDBRluMZa4rDqtuprO9SaGfz5kF/UK+xz+iPukqipUpqF/wA41uC4KpFnbcu4g5hCRbaQp9pcU0m8ZwVyx3UXUNxvJWz2sa4QhmDlVk+bvEdIlzt7jeNtytG8aIW2X0WrqhrrZVwlEHcrS5bVgcr244dLrvK3irm5LXnaEl7muy40JJm2iYptOtU7CcwB2vIJRVxMZJeckCeXC7lGrq5LWnaE17luqSiH1bdKGjrlh3sGhEXVLytq0Q6rCC0PLm1VnnRNJmwEnZSYuOVXnJlzJuV7jgpaAatJ4hZEu2grlbybqUc0upV07ScuHDpbpnVxT7SRtOCiEbSuRCMZuoiUolrEjtteOYu1Gcgi+QvCZt6corkEGdxwL+3mURc0RddqQzKQZxdpzCkBOtpNO6XVuO66VoLv88Of2Oe+syeawicsTmnl+sz/AMmz/wAUz+gz+gyM+5yM+3z7nPeZGf3h+9z3Gf0uRn3Gf+Q5/wCRZ/4Uf6bP7vPsc8ee/wAayGf22Rn/AJZj9/BRlUq96ANbDiSSyrIWxEtfCjCR1VX1RtqJqHZeIHZeIHZiIHZeIHZiJHZeIHZiJHZiJHZiJHZmJHZmJHZqKHZqKHZqKHZqLHZqLHZqLHZuMHZuMHZyNHZyMHZyNHZ2NHZ2OHZ6OHZ6PHZ+PHZ9gOz7AdQMB1AwHULAdQsR1EwHULIdRMQvDs6S+ijNCg8BpFIOOcnB0tkzro/b2F69QI+UJz5Dfxhty7gwYPuf99Zgwer51mfB8A9Rh14TDjxCK5icP+RUK/Ef7ew/XqBHyhO8wh4w25e//wBxnWQM/oHPhDjxiKE55Bivxn+2yLD9eoEPJE6G5/xhty93yMGYMGPjhMOvD9XHiEUJzyTFXiP9rnVYXr1Ah5QneYb+MNuXF8d6er5B6/qfJR4zTr2K0UnK3kdXy3x1fMDcJYbhKjq+VHV8sOrpgHHTQQcJuOk6N1yMOPEIkTnkmK/Ef7ewvXqBDyRPczDfxhty78+EwermFH/SK1IRycf0/wDFKNVt1T6NnWqop9a9RkQMiBkQOkhVSH75FseA0Xrcz75Wt14TDnmIoTvkGK/Ef7ewvXqBHyBPfIb+MNuI/YVnTTTVVWdastyQ6NFKlFEqwVYKsbY2hnXWZEX1nJlNtSdFDh4o4X267cPMo4MOj+gceIRQnPJMV+I/dZ7zIyM94QPVYXr1Aj5Anwh4w25d4f8Av3JZMPFylHBpFtgqwVYKsU1gqwVY2xtBRUqKdqqfnioI0kV1q1qzqrIWlUVT5xUHXIOPEIoTvkmKvEf7ewvXqBDyRPfIQ8YbctZ+wPVPuaqEKGaKR0Jp0p0FWCrBVglBSoNsFWCrCzqhGjarnZ01MppV11V1ZPVY5/znAdcg48QiBOeSYq8R+/yM+3sL19YQ8gTwb+MNuXscg9RF9Qs43p8u8BVgqwVYKsFWCUIEoCrDp7Q3T2qpWWUcVYozk/rrsnxOA68Jhx4hECd8kxVzP3Gff2F9wrCHkCfDfzA2P6cWe5PWeqaX3eJcqlR/BQVIb09LQtUFEOjrdEaW2pWVFDtM2zjoKmiKiyKqydEq1wW0rtOUlXYev6EKDFVbitsUqXXUdgSCCirXrNVo3pVRWWUbsalKVKahZX/+gw65BfxCJE55JirxH+3sL7hWEPJE8G/jDfl7I9V214jkKAVYbOKU6F6alH1NZvCEXXSUihtSyxKSa1VEWtQnFvTMlMEHkikja5kThxWrVk+lTptTYGDE2ql1KySoZrp0ILIqtnx0FWoof+4srwOTDrGAv4hEfAnfJMVeI/aZ/R2H9yrCPkif+Q38wNuWs+/zqvQz3ZkCqFNQo26j/haoKuXJN6VCqTVrSNNBQ2Vb4ObnSo/gpftVza0yNYSaqskG8isrOo1p10lIsVWVKRqpJKqZ6Po6+jNTVZXkuw65BfmIgTvkg/F+3sP7nWEPJE/8hv4w25az7s+AzGRetOYxBQFUGVR0s2Zhcz6wapC21SOVoqVdrFvS9QXd002p0YOmvmcupQdvsyoITdZFEsmxFRUR5O7a6a1W/RxrhYsNU5BGt10aCHyLNp2GTuoOeQceIxECd8kH4j/YZ47D+5VhDyRP/IQ8Yb+Hu/jgPV8a7gR3iFc0ERgq6tnZBLKbe0NsqfqF3B1CPd0tl+kU7Rn8rq9JXVsiMkCZqVKVKT/SpmmpVUdXNJStOvboTcrp0bNCNO2oRC3qOih9oOfCF/EIj4E55Bg/F+1zqsP7jWEPIE/8hv5gb8uD47g+P4H0x9ZVtUykVmxkYOvAVUMz7uOSqP8AipNImydDSlzyDjmIgTnkmD8R/ss8Nh/cKwj5IuD5DfzA25d2Zg+5vNhvDal8nkVVGfdtkal1iTothqVKhvxyIOeQX5iHE75Jirxft7D+41hHyRcAb+MNuXEfH88J6/gyqueJqYL9Il3SSdaqlKacVF1qK7ggfR0JpoNzDnkF/EIcTvkmD8X6TPs7D+41hDyBcHyEPMDfw92fcmDC6Sa6FSC8/BLR1fSUdwxZrvFdhGIYHXVU1ikk27NpubIGHIX5iHE55Aq8XtiBAuPIz7exPuFYQ8kT/wAhDxht4e7MZ1Z4TPWYMy2aqTlrZRcmake9YO2SppOOBNJSs/oxj6a1Soqbw1RUFRJ1KF0FLdA9RhxyC3MQ/wACd8kxV4j9qQIECL39ifcKwh5IuH5CHmBty9qeo9R1bSfRKOYWIcfWpS1mR+V2VpCdstKPMRiYhAUKmimabXkWoz1GHPIL8xECd8kxV4vbECIEXFkZ9xYnr6gh5IuH5CHmBty918g+D/5qPUYc8gv4hEfAnfIMVeLvM9yRAiBAi9pnu7E+4VBv5AuDmYb+MNuXeHw/GvOoxkHwnwHrMOORhbmIj4E75Jirxe0IgRAiFNIpo9/Yn3GoN/IFwhDzA25ewPUes+6+OEw5C3yIgTvkGKvFw54scZAiBECIU0hOkIpGfv7E+4VBv5AuHmEPMDbw8J6j7k/nUfAfcfPG45BXmIgTvkGK/EMjPeFqIECIEQIhTSKE8hBDIaNM+/sT7jUG/kC4uYQ8wN/D3x6z1nwnqMH3BhwFvEIgTvkGK/EfsCIEQIhSQooCaWQ2bGZiOj61VaEkrTs1JpsO5P31i/cKw38gXD8hDxhsf01f76j7j418+Az1HrPWfAXCYccgt4xEfAnPJMVcz4sdyRAiBEKaRRQEkchq1yLbt53KOOibW7AMoVL+T7+xPuFYb+SLh5mEPGG/Lizr58JmDBgwYPnxHxnqMHqceELeIRHwJ3yKhV4u8IhgEQIhSQppCaYboZDRnkWrZazrZcyLRsg0QpQbcJe7sT7jUG/ki4vkIeMNuXF8d4YPgMGD+Qfdr8gt4hD/AAJzyDFXiPuyIYBECIFSKKAkiZhs0yYg4Z0+cEg1ti0mkXhdz+isX7jUG/kELi+Qj4w35dznhz3B8efp3C4V5iH+BOeQYq8R8ZayIEQKkFSKaAmlkIN8hqz+Ra9mOXuwu7jGDSNbE3Z/o7F+41hDyRcXyEPMDfkPpwfAz35gwZgwYPujDjkFfEIgTvkmKufCWrAIgRAiBUimgUJhFEzDVoZiCg3cit0LO27SZRmFnP6WxfuFQQ8gXF8hLzA25cXxwnqPg+ncHwHqzwmFwr4hECd8gwfMYGBjURAiBECIFSKaRRQEkQ3bGGbE6jIitqxlFNleUZNGzJAkGv6axfuNQQ8gXEEfMDflrLV8A+HOo/8AYZ1ZHxrPgPlqzqPWfEvyCviER8Cc8gwfi14BEMAiBUimkU0BNLIQbZDZnkW1aj2UwpRA2/HQ9GUP1Fi/cagh5IuII+YG/fGYMGYPiPWZ90YX5BXxCH+BOeQYx9RgEQwCIEQppFNAoTMItzMNmZmIOBeyKvRs7fsxix2VXpfqrF+4VBv6cXH8hHxhuf04M68j54PnUfcHqPuPpwGFuQV8QhxOeSYwMAiBECpFFAoTCSBmG7MzEXEOHa5ItoCxKE8KyzZBFsiSKH6uxvuFQb+SLj+Qj4w35as8H+/GerPDnXnVnuzCwV8QhxOeQYwCpBUimgJphJAzDdpkR8YostSijAWHWeFZSPYs2CHQs/1tjfcKg38kXGEvMCHh7g+H51nr/wCuI9X/AM7gwtyCviEQJzyDFNP0IU0ChLISQMN2mQwjFFlaUkYCw1q8KSkZGsYxHomX6zOuxvuFQb+SLi+Qj5gb/UuE+POoxngPWYPXnXngzwLcgp4hECc8gwinmggk3MwgzMxGxK7pUkm8HYSn0UlI2OZRyPRM/wBOXdWP9wMIeQQuIJeMN9edZ8Ge5PuD7pY/oFeYhxN+nMMGe2gmYhoF5IV7LOFsJFPCkoyZtWSPQtP0OPZWR9xMN/IFxhLzA34T1/HHnUfAYPgPWfAfAtyCoiPgTvpqzFmWjFlDMXbtJOhJMk0/b4GPbY47J+4GG/kC4/kJeMN+XFnjPgMHwGDGQfAYPlxH8hXkFeYiBP8ApKxan4xF+6wMDGvAwMDHc44MdxZP3Aw38gXH8hLzA35A+4+NefqDPWfAYz3B8Zhb5CvMRAn/AElYtT8Yi/cKqJop1KK7IxqwMDAwMDGvAx7Ky/uBhv5AuP5CPjCHIZ1Z4fjhz3Zgwfdq8jCnMRAn/SVi1PxiL9vcNzx8RlM7juR7KqHvOyNkYGBgYGBgYGBgYGNWBgYGBgYGNWBgYGOGzPXmG/kC4gl5gQ4M6vrr+eD4B6zGQYzqMHwGD486leQU8QiBP+krFqfjEX7WUkmUYh0z25b4cutpFg6ecwu5MzBpmDoGwNkbI2RsjA2RsjZGyMDAwMDGrGrAwMDAwMcNn+vCHkC4gl5gbnw/QZ1Z4MjOr/cHzBg+I9R9z8algpzEQJ/0lYtT8Yi/ZrrJIJVKrXFfSaWUYmUll3S9S7hy7M8hVYzFdYrZGK2hipsYNAGiOjB0A6BsDZGyMDZGBgYGyNkbIwNkbI2RsjZGyMDAwNkWmX9+DfyBcXyEuYQ5ez/61mD1n3aoU8QiPgT3o6xan4xF+xzghP3nHsCrSZz1wvpKvaeOXmQsuZitQ8iqsHUHlgNK/SvLClKPJe21Kts9MowweDrYmK2RitoYqamDbmDQwDSMGkOjHRmNgbA2BsDYGyNkbA2RsjZGyMDZGyNkWuWHpBDyBcYT8YQ5cX/zhzqyP+uM++MLchXzER8Ce9JWLU/GIz2E7dcZF7SZXFdT+T2qFXLz/ZZyZitXIqrB1AzGeBw1bOCwu6tWCcc3Ngx1fkOtHrz/AMDmyZpIOrekEPNVYbPM2P8AtUxFTIGzMG0MG1MG2MbuY3cx0BjoDHQDoR0I6EdCY6Ex0JjoTHRGICjYeUBv5AuMJeIId5nvD7wwryFfMRHwJ70agtT8Yi++nLni4rNFc/eMjIbSYcPf9l3OQoqKqwdQOoGYM+7UboKlhVeAhV/MXsuBV8K9gRx+Svo8q/8ACtYEkXgWseaoCtoTNHNS3JKjxKRK9HjqY457nQNyIbgNwG4DcRuA3AxuBjcAg3NBduYb+SLi5mEvGEMggYyD1ZHPgyP/ALqPlx51H3hhXkK+YifgT3o1Baf4vF95N3RFReaDuC85F/lOlw+54XdGYUWMxVWDqFVQyMjPtjooq8VbJnX4ziYqrxVQMJVzO2oAdl4AdlbfHZS3x2Vt8dloAFbEANJsawjup9yb+QLh+Qn4wjrPXnX8av8AruDGdZ96YV5CvmIj4E96NQWn+MRfcmeCE1d8VH7VCU/d8lIZoC734JZ1kKLZFVYqqB1AzGQZ6jMZGff6X/8A0gbeQLiCfjCHIfAzxnx54j5A9Z6/juFeQr5iI+BPejrFp/jEXxrKpIpmotM3zHNcpsJ26JCSyTld6FnWQotkVKZFVQOoZGQZjOrIz+h0wf8ApA38kXCE/EED+mv4Ge5zrzw/HsFRVzER8Ce9GoLT/F4vhk5RhGp7b2av/GaIyXnHb6vbdrvMhVyZitYVVmDrB1DIMxkZGRkZ/R6Yf/SBv5GBcXyE/MCHLhyM8Oe9MH3ivyKuYiPgTvo1Baf4xF6jMqSMzlruh2GaaZm+ZNzmhu6kK66zrqWeGYVcGYrVB1g6gZjIyMjP6jTD/wCkCHkC4fkJ+MIchnVkc9XxqzryPnuPgHwH3R6lRVzER8Cd9FWIiYjYy1ovfZW/6SzTHTNxPpH1i70ws6MwouYqUB1jaB1AzBmM8Gf0+mLlCBDyCFwhM/4wjy1fGrn3JjPtvgKcgfMRHwJr0tQSe4aIhZ5kKOTMVrGDrFVQOoZGRkZ/W6Y/DCBv5AuHmYT8YR5cX/zXniMHxn3hhTkD5iJ+BM+lqBLH0dJCpQHWKqxtDIMxkZ15B/q9MfhhAh5IuAJ+II8vZmfBnWYPuqxVzET8CY9MY2/oQ2htDIyM68jIz+t0ycoMIH/IE+KPEEuXFniPiP2agr5iJ+BMemMGYyMjPBkZ/X6ZfBBhDyRcHMUeMI8uM9f/AF7tQVcxFcyEz6aoVGMjIyM6s/sdM3hgwh5AuAJ+MI688B9wYPgzqPUfe1irmIoTHpqgerPt2c28benZ3vMpBppDcf8AnbX9F1+e2uuAX5IP2S5fyfcaZvBBhA/5AuDmKPGEeQzqzw51GPnV892fe18jFQiuYl/TVCo/r7knBih0YoeGKHpih8eBQ9DabeI+U2vGaS5N7/l6PG20iV/+dC/42rzUb0glOaVywSvJKTjlfLoUTr8Hf6Z/BBhDyBP8zFHiCPHnhz3Rg++r5CoRIl/TGKufudoFWOkBKglhSuCcClyYpdmQpeCl6KXxgnwJ8KH+z4UZl1R4ErnlqeSV5TdHKi+ZwhRf0wXOnSFJfNGkN78lpEX+f7RDH9oY/tDpH9odA/tDoH9oZD+0QXxcnX3VhBDyBP8AMU8wkf8AD3WdR8J+zMV8hVzESJf01Qr5+5yMjaG0NoFUNobYJQdICVBKglh0xjpzBOATkE5ME6Mb0YJ2YJ2Y3wxvhjfDG+GN8Mb4Y3wxvhhBfpV0Ah5BCeFHiCPcnx54j7+v5FQiuYl/SmKufucjIyMjIyMjaG0NobQ2htDaG0NsbY2wVY2x0g6QdIOkHSDpB0g6QdIOkERVl0mEPIE/4jFHiCR6s68+9PXWKuYi+Yl/SmKvF7nIyM8GRkZGRkZGQRjIyMjIyNoZGQVQ2htDaG0NoZG0II/73SEPIE9zFHiCXIZHxqM/p7H59hWKuYi+Yl/TVCrn7nIyMjIyMjPDkZGRkZGRkZGRkZ1ZGRtDaG0MjIgPV0hHyRO8xR4gn3Hz3h8B9yXBWDEWJb0pivxe9zryMjIyMjIzqz3GRnVnVnVb/qyCHkCdP6ijmE+WvOrPcHxnrMH3tQPmIv4Er6YxV4v0ueHIyMjIyCGRkZLX9BkW96ogh5InPEKfEEuXvT7isHzEYJX0xirxft7d9UQQ8gTniMU+IJ8uNrHuHSXSJ9Tux1O7HU7sdTvAcM+x/CrRUkpUmqD4z7+oHzEXzISvpjFXP9vbvqiCHkibP6mKfEKOXHHyVLVv0NXXaY67THXaY68SCM02rr2VJBpQ9Q2DB6j4c8R9wYMGIwSvpTFXP9vb3qwj5Im+ZinxBPlxoNXK9G0j1c/HVz8dXPwcbICiLf114qbJ0NG1NA55B8gfdH3ZgxGCU9PUKuf7e3/VBHyRNczFPiCfHGyKTZr0SnXLUddNR101HXTUISzNVQqDkW29s60PbmKgYjOZCV9MYq5/t7f9UEfJEzzFPMJ8eRkhkhkhkgklWvX0STOg27ahNT/fuj7rOurkDEbzISnpjFXP9vAeqCPkCYFHMJ8cGsimwwe8ojeURvSI3pEVvG9NP1lJLeKTQR4T9lVy1RvMhKemMVc/28D6ogl5QmfEYp5ijufoMEMFqz7M+GrlqjfgSnpjFXP9vB+oIJH/ACRMcxTzFHLVngyGzR05LKPVDsdTux1O6HU7oKxb6gslnuz7g+GrkPkRolPTGKuf7eE9QQS8oS/i+tPMUCrwmEKjpQTKmR+kg4xqiGpLrHWoZg3zSk8Df2g35oN+ahNShQttOXbkujU4o9vVyBiN5iU9KYq5+ytuuMQgJFzJxUEsnJJO4uTTbpSTpJp+ihPUEEvJEt4hSExV4TFB/wAqgPY96q8WUo6sfjqx+I1Gtu12FJ1WsujQLgj1aknaZ0l4tZ8R8Z9xVyBiN5iU9NUKufssnjApqqpI8fo4X1BBLyRLn/EKeYoFXhMJLJGjQY6VIdKkOlTHSJiaUorXT2OBA8LpmfTJkeTP59vVyBiN5iU9LUKuf7eF9QQS8oS3iFPMJ6sENkhikYIYIfHF/D7irkD5iN5kJT0tQq5+yhI1u7ScO36cdaa6lKKDxuqzeLNV/wBFDeoIJeUJXmYIUcu8S+qtGSrzVgz+e4Pv6gfMRvMSfpjB+yhpVWM6YiouZNIyUQWVrXWrWV/RQ/nkEz/kiU5inmKBni+OEvoeRvTjUfAfsjB8xG8xJ+mqB8/28P55BM/5IlPEKOYo1IJVrVbKdDNAvM3VmN1ZjdGgrYFV5CqaiNewrrpLarppG4tD+gPhPUfCfdGDBiOEn6UxVz9kyaunq5IM1Ldn00zUr/RxHnkEz/lCT8Qo5inkMhKjo0ioCrihM9kb4Q30gT2kJLJq/Snayn0VazAqvq0qI6ajpqCPn0CjxED5n3h92YMR3MSfpjFXP2VsOkKWchHqMEEmbxF2rJr0OpJ06S/RRHnkKPKEl4hRzFPIU+Msg2SBnUY3FAOEySWOgtSLuqn6KJ10KU5orMlKCoXrYtqvrRSwTpqKoqfEQPmftzBiO5kJP01Qq5/t4nzyFB/yRJcxQKdSLrFOypvaQ3tIOK+kWOstZGdNW1TQ9Up8ZPUf9W+oAnyBfUj+p+3MHzEdzISfpjFXP39FNVZ4p9vE+eQo8oSPiFAp5fpTB8xHfAk/SmKufsraaNKmb+RdM3EY8dpNKpNvQ0k3LVPuW6KrhehBCwbXuFjclC711a1xsmdbp2M9xkuDIyQ2iG0Q2iG0Q2qRtUjaIRJl05CnyhI+IUcxRqat6lsilu0oIdG1HRtR0TQVsmtfgdNlm5bSmtMtpSmk93ZHVgfJl7YxUDEd8CT9KYq5+yYvHjBfeGNdy3HXQdFfDgFw2Kq3bXDQs4opLZLg+gTSUU8tOMka/DRBSJ86Lec/6qbd/wD7pt9sXipgmHyUPGkCi44gTFiXImzYuRJJENmgYIfQfQYpGzQLppopoYnTT5QkPEKOYp5aqKdhOmgLutio6aN8UG+KDfFAi7Tr+h0VVUHmldkgr9UnCKzc9lcIefQKfEQPxH3R96fLVHcyEn6WoF4S9+i1dLeUlByVYSttX/ypW6zp8acRHUBNBBPyyMy9ldnlsRT5QkOYoFHIUniojP5G7szMzG7Mw8ooTc1UJ6kHCqP0JFwkr4aaqqaTpFbdnXzJo0pPapo8RA+Z+1PUeqO+BJ+lqBF/CXcn3BiIi15I1TootnpKyoQWTrRVrSV4UU1VjwihByKoQto//OhAxqfiRatkfKyfuLt8tiKfLD/mKBRqQdVp07B78N+CyhqqHWeswm6Xo5FIH89YDrHHLuj7s9R6o74En6WoF4S9lCyDVsi5ZSKTq0m6tK6T1wq8eLO1uBvERqH1op/hLBe8u3ymApP+UH/iFHMUCn610kardEiVIJNVlaCqpQbKrF/Ai3VVyOjUJboaqaWJqdAdDRWs6xWnUmv0SnQp9ZdAEGqy5fy0Gyq2cJNF1Kqy7s+9PkD5iO+BJ+lqBeEv292+WwFJ/wAsPvEKOYoFJ4rpybhKiutQmqyCaCQaroUJVFU2XR6Kqg1Vtp2a9Ne49JvFKihVt6yqeKFW7rUoqUaEvvdLBdJNtsqNnCHQVUGuvQqk41H7Y+WqOEn6aoF4S9kZ4GSP9GQu3y2ILyg+8Qp5ij9KeqPEn6aoF4S9laZThm46luzrWm0kSnP0d2+UxBeUH3iFAp9t89+YMR/MSfpqgXhIH3R8cUlFKdJ1nKO4pKC6qi+7rSUooorrCqaiNewr7W7fKYgvLD3xCjmKP0GeE9TDmJP0xgvCQPuj9m3SrcLpoJy9aTxm7bIUNGSbFFZ9O0Nev1CdP2reiPJ8zWiI6iXriKdxYrJuaGrNGLUpSoVbxiRVyRPXzRvSzSes+/u3y2ILyw88QoFH6UwYYcyEl6aoF4SB90fs4NyizdVu1I2YpJ2VLqrcnbBskrW/ZHMO1EZV3QpC7pUs/bVXicgUa5RRXe1VpPUuiZmi6etq6pw6TXS6hTa+wusqqm7Wsi8oPPEKRR78+IwYYcyEnndjBeEvZWi4SKXbxzlK2Y2Z3lSMcp9A4UR48+8uFZRLOxU8UIzwbus+ZPKiHWCg6xUHWKg6xUHWCg6wUHWCg6wUHWCg6wUHWCg3+sb/AFjfqxvtY32sb5WN8rG+VjfKhvdQ3uob2Y3oxvJjeTG8DeBvA3gbwOnHTjpx046cdOOmyOkIdKZeFNSqqr6ly9geqFla4mqtVCWlJKVW6WS4cjIyM68jIyMjIyMjIyM9/cZIbGVjaJmeSqRQp5ki3MbugN2QG7txuzcbsgN2bjdm43ZuN2bjd243duN3bjd243dAbsgN3QG7oDd0BuyA3dAbugN3QG7oDd0Bu6A3dEbugN3QG7oDd0B0CA3dAbugN3QG7oDd0ATdAdAgOhRFLZOrkwQQTWIlHMM0cpkdL+Mds8nXwnwHwn30E3SdzDZsvJM1GckozFyRyMYq1RTXauUKKa15GNXZINlq1WbtFEllXTdJOJYOKYNBqtU6rdpIxcjQsmzV6PdEDpUZvEqdpRq1J2sxbJLs3Kb2poVbdZFxQi5mEE2sq5bJJ0RjeJbOXL1s03du+Z1o1rPlEmlTdzQt0NSrZwilSorJtqENyJFw0dNyI1+jUJboQeSMyMXSZ9fmKPLDjxigEPqMai/RoCQ8gxBHmIb5D+GaOc1pv490y+q3GfHFREnK9J1d2OugOEVEF60Fu5tb8hZBg6a1MkpFwzwrJQHT763JB8lW/pXc9RoJsakq3kkib78diBBeTJC2CMnizk4oiNC3irjXD2vrsnDZ0jQdqhJ2kb2Ycm7lGVdtMV0rtlUkblkExJyuza8SqVMgsjbEaaz+fobTM8zdQq7ntHBOUoeXlXLKf39VaRdS0Ag1Qk6VrenDQRfLVt07qr63emZmfWzwSq9biUNVSjyw48YpBd/j3CQf+QYgvtDfVkf9B/Btl81tnjRy0r2XHCfHEt4xfpOsZVeJbwJRUd3TddVuvSsgK3C9ZJEbiVkF0DSXUmOja0tVHF5LVU1UjtOvS0qaItbllGipqs31yzz5LonRPnS5N27lzL1No1/S6qdOakm6RlOy+/78JGXkpFEkXj+Qev8Aozex9wTTBsTVk8kHz13vbttOSrdwuulb82rVdbB/Lu5qVfMiau05aTTQQQoeT8u7bqN15B20Rt5CIY6nnrhR5Yc+MUgvaZGBj2BBEP8AyDEF9pb6s666aa6DorkIGmrNbFZJRFQ01tZ9/kZ1KuEEfNVmWVHhVnVP/CpKP1BWoop5nAXsXnrjFHlhz4xSKfaY4Md8QSD/AMgxCH/+U343TdB0nsLyMIuhlRr7BZVJGnaWWmWdH0oWnFz8lZ67X8325a3frhR5Yc+MUin3H174gkJDyDEL9qQ7mRjGz3+I5Bi4ZVfzu+P61bR6y1l3Bai1F3bv1wo8sOfGKRSDGyeCBbOyCIsmMEWTFRfx7IzTyB8jBl/EdI+hmZCkiwWaKSxSQ/0lx5GfYkEg/wDJMQv2pDuMjIq2aqDpqkYPOVGNZVUVHRX7YuIu+deuFHlhz4xSKdWaclUKaqqeRGZciMyP6f8AYzTnaBGZci5kYLnkZPZwMnjAyeMe5IJB95JiH+1oasjOrPFkPmTZ7RhaQj3DI816z7kveuvWhPyw58YpFOqmk6h0dI6MgZYPHBn64IqKvnoyHRkKqCKkz15GRkF7RIP/ACTEP9sQ4cjPBkZ1H9SMjkYXOVWJkdNR01aj91kF3Tr1phPyg58YpBaqPCRA68HgbZAzyeddNBnzpIiL6HgvFtkCryeBX4D90jzD/wAkxEfbEOLOrOrIyM65Big9L+N8zXZqbKvelxZ4S4cjPBkZ1ufWmE/LDnxikU6qD/hFREY2BsDYFNJFy+Pqan/86qPGQr8Jgvcoh/5JiJ+2o6sjOrIyM68jOvIyFKaFUzTUk4itHKrYvaZ7vIzwufWBPyg58QpBai+h5HSf79JSNukbdI6T/Y/9z10nirIqrLH09wQRD/yTET9uR77IyMjIk4uhxtKoKUVJKGmp3GQXCXCXGXcuPWBPyw48QpBfpTBBEPvKMRX25EZGeDIyMjIyM6sjIzqzqfNEXieyo9aLNK9lXuS70u8X9WE/LDjxCkFqopIyyezSMUg/pVwGeB0ZFz2aRikGRbJ+4MEEg+8oxF/b0faK0UKpVJqSbYmjs0qdf//EAFUQAAECAwEHDgoFCQgCAwEAAAECAwAEERIFEyExQVHREBQiMkBQUlNhcYGRo7EgIzBCVHKSobLBBjNik+EVJENVYGOiwvA0c4KDlLPD0oDxRGTyoP/aAAgBAQAJPwH/AML0W2XSsKHMhR+UOzLf+MaInFl0YkO4ldMApUk0IOQ/tDwl/wC2uJZ11KWiFFB5Yq00VAtoWvaUxnkhxvWYmFqQhaqXwlRpEhbZSbC3Gwmx0DLATLa4fSy6E7XD50XPtqcNlNKVPOqAzKTJqEldlK0K+YhKFNNkhtB2uxxqMSNGFmwhbiE2CflA/Mpp2zYVhsmmFPNDDbdS5WymmaJdkr8YbRQCduYZv7ymTMKVS0UpxgCJFLOxtC/2aEc+Qw6HZdQttkKrgzfsrwl/7a4YYdDjdo3yueJJvYgWwmthST/6ir0tKO2GkcKotCvQRFyUOEK2Cky4w9cBd/Ew2UBAqa1zRch5peZbFUK5qwAy5Q2CmtkkeaRkhu2whg35Fm1ix4IkGq5KScNTaHNfJVV6XUjBQ544Tnyj978aoubNOyKdo8GjsUnPkIiUDb1LRspLSueF2wMKFZ0n9lTQAuYf8tcTNzXnECyKugkdUKYNcN7lk7c88YGp1y+WxhvZ0UpDzBUg20tJWTh5ExdGVdmWX23Uot4cEOpl3E4bLhslB5DFh5zDZsbUHhE5YtLlHDatYy2cvQYflr7tkJBJsnkRCb2xJrtMoV53Pzw8GHEYQHDYKD60G/LCClFjaorlJjYpSi9BZwpWjMc0TSHHlppsF3xVM3JCLANAhOZI/Yq561tOJCkKviMIPTFzF/eo0xcxf3qNMNXp5FKpqDjwjF+0N0XkNtpCUJFMAEXVf92iLqv+7RDpdeVSqzloP/KVRQwjGU4yc0ShPO8vTEj2y9MSPbL0xI9svTEj2y9MSPbL0xIdsvTEh2y9MSHbL0xI9svTEh2y9MSHbL0xIdsvTEj2y9MSPbL0xI9svTEj2y9MSHbL0xIdsvTEh2y9MSHbL0xIdsvTEh269MSHbr0xIduvTEh269MSHbL0xIduvTFz+3Xpi5/br0xc/t16Yuf269MXO7ZemLn9uvTFz+3Xpi5/br0xc/t16Yuf269MXP7demLn9uvTFz+3XpiQ7demJDt16Yuf269MSHbr0xc/t16Yuf269MXP7demLnduvTFz+3Xpi5/br0xc/t16Yuf269MXO7dzTFzu3Xpi53buaYud27mmLndu5pi53br0xc7t3NMXO7dzTFzu3c0xc3t3NMXN7dzTFze3c0xc7t3NMSJTyh9emFlyXd2pVjBzHeDj1dwgwYMGDBgwYMGDqGDB8FtxdhNpdkVsjOeTyLa21jGlQofIKg11TBgwYMGDBgwYMGDBgwYMGDBgwYMGDBgx6Wn4F7wceruGqyNcifvd8y2bIwRnhkMt3hCqDPDIavskhxdMqs8NhxlxarSTl2JMCiEPrSkZgFGAPHL1tKk8OlaiBRxpZQocoNDDKGWZuX2QTwxjhsKdX4qVrkUE1wf1kjAp51LfNU4YlEJlEvIaW3kODDH0TYcvLhRa1yRX3RcJu57gVUrS8VVGbFDIEw+t0Or4VDq7F6YmgwteWxTFFtUpKUF6RjcWcQ7o+jaGWj57Lxtpi+LbK7LVvbHNWJH8pztkF5S10QjkEMGUflcL8vatApziJVMwliWLoQo0wiPo2gA5UzBr3QtZlJpNtq1tkkZI/tDjSkLVwqU1JPX03NJtpbK7KEJi5a5F8J8WphdQo8sECF1PJCekwvwdkpRAHPFy/wAs3SsBUwpxyy21XIIlFSE3I7KZlLdpJRnTDCXHpZlJZWfM1T4B1DqEJU84EAnEKx9HE3TEubDsy6/RS1ZaQpRkboMCYlwvGkHJFxEXYnb2lcy869RIJ81MIWzJT9pJYUa3pwYxXr6tT6Os3RfnL7aWXijan8Y+irMi+ravpmSqz0U8L0xPwL3g49XcNWfEi1+Ua3wotYbIwR9LWv8ASnTGH82RH6uR844avgVAqTNOAe2YPjJBAmHP70mun2oH5vdJlL49amGNvcybHsK//UGln86mP8Zp81Rgl5S3NVyAKFR3xt3py+K5zH0obZcU8SpvWxNk5scXSF0GyipWEWaHNHGPd51f1iPhhDmspqirbe2QoZY+kDDrh2rbqLB5oRZdbm2gof4hHGfIQpQrjoYKU25Mpqo4BF1bmgZ79C76xJoIvnCJxxwXPlBpzxOLlJqWRYQ+lNpJTyxdaTuklpNpbaBR2mekJD1mQWRbFaGAFJVNtAg5RaENIvWv0ixTBTBki4tyi0hfjlPM2lOKxnLgGSGbxL3Slw9esiFZouMxMPhoLm5l+WLttZyDkiR1guYWWJqXSmiQsV2QGSsXKk5qfWt0NLfRVI2asJzxc6QlnETKLa5duzfNkI4z5QtSbQoaGlRDF/YQylS2uHjwRcS5QlXwUIMswUKbOQ1rEmmfYlnVoLSlUCqYjH0ZucuQmXUtKCJEpsBRpUHkgW2G55KAFYdjUYIuFcu9JX48vNVU4ctMwiQa1pIsqmdaNjYVyJi4dyglRJYUyzQoUBXDhwikbCW1w4pyxwE1NI+iUn+RguxedZKvl7z2uFB8RgcarkSrJqLvLCBbmXz+jRlMIsXPkmhLyvKkZYFp1zKcSU5SYNuRuWCL7xrp2x/rl1JD8pz0rfKMuKKW0WjjOeLnJuZPXPWkTDLS6trQcvJ+EMttX1ky8xYTTxiP6MNj8rycui6L2DZWVHCDzJ7oZQt6bdTJy1sDBnI9/s6vpifgXvBx6u4av6z/AJRGcR6MiAH5iVYDEywDs00ywgyMpKBSvG4FLVQigECjKFLm3eQVr3mPozIPqUr6xZwqzRItSjly3LaWWsIvZx/OD4qelv4k/wDv3R9U2byjmTgg/nc3JoklnlBIV849IEXLmFtreUUqGURIusIJshS88cY93nVyXQFfZhbK3Wj/AGe1RZGeJJ5jDhcXsQnlijoly3sh55RhhBm5aZorxeEpNMVIb/OXdjKs2tkPtGkehK1FiubLGC/IcOyzYIdUrkrCW7pMOotEyxrYOYiGjISUu0qt+wKdJGKkLDRnpZbTZOc5IkHGG5eZQtx1e0ok5DlrH6xTEi7NsTK7SFtYQDlBzUMOJW9c+TSH7OReCJqbfudMtJ2EqLd6XlBGOJtZQ8baGHFptgjKQI41/wCNUY2nAvqMNflCSnAFG84VNqphBEMUnH02JGWt7MK4ZpHo6fnHG/KEMuTiL+qSQ7iLtcEG6TbAmEGYLrVhuxXZYaUODNH6xR8o46HkNO3Rkyhi1lXhwRKazYlydktY2aqEBKc8OXplx91or4NcUPXTe2RvbrYF7UM9rEOmJoTU21sFLCwruhNp55YQgcpi5ky+hyi5+cSPr1cEcgiTdlluCqAvLFzn37qT4/PJpv8AQo4tJi570qhZspK8phCBLzqbTBC6kilcUJenZi0UTrKcJbOSghvW0zdVTbLDC9vRNcNOkwcDUy1NoH2a0WOqF2pGeWqSOYtHYp99DC6okm1Ou085azg93xavpifgXvBx6u4arrt5tWr3aNmuemfUdddVSlpaio06YddZXwkKKT7omX3yMV8WVUh55sLFF2FlNoctMeo861bTZXYWRaGY5xDi2nE4loUUkdIjCTjMPOlkGobtmyDzYoWptacKVJNCOmLqT/8AqV6YnJl5OOjjylD3w84ppG0QVmynmGTUENodZmkWSleIHhCFKQoYlJNCInJlaMynSRqPutVx2FkVha1q4SzUw6u0oUUls4xyx4pOYaYTaNcNcsNoZbYbDbLLe1QNSaflycd6cKa9UTUxMUxX1wqp1xji6U44lBBSFPqwEYjDilrM0gqWtVScOUmJ+ZYbW+ahp0gHqiqlE1JJwkxNzMvXHe3CmvVDrrzhxrcUVHrMPOqZb2jZWbKa5hiECJuYlirHenCmvPSHnXnOG4sqPWYedbbcFHEpWQF84yw4tpxO1WhVkjpELXfK2rdo2q56xdOdcCKFNp9RpTFlh50v1tXwrNqueuOFrdcVtlrUVE9JiZl5ZyhUhTy7IJGQcsTpak5AKWlLs5fVOKoQAgVMJpfnFLpzmLpTqGeAl9QHfAhS0LSapUk0IPPF17pf6tzTEzMTBTtS66V064uvdL/Vr0xOzUwlJqA68pdOuJh9xpoUbQtwlKOYZImX5deUtLKe6Jh59zhOLKj74feYWRQqbWUmnRGCmKHnX3DjW4sqUek6vpifgXvB9Yly3TOD/wCtQQmBAgQIECBAgQBAgQIECBA1BqCFEDMIECBAgQITCYTCYEJgQIECBCYECBAhMJhMVVTFWBAgQIGoIECBCYEJhMJgR9Zfb8oZgAR894FqQsYlJNCInj92jRE72SNETvZI0RO9kjRE72KNETvYo0RO9kjRE72KNETvYo0RO9ijRE72KNETvYo0RO9ijRE72KNETvYo0RO9kjRE72KNETvYo0RO9ijRE72SNETvZI0RO9kjRE72KNETvYo0ROdijRE92KNET3Yo/wCsTvYo0RO9i3oid7FvRE72LeiJ3sW9ETvYo0RO9i3oid7FvRE72LeiJ3sW9ET3Yt6Inexb/wCsTvYt6InexRoie7FvRE92LeiJ7sW9ET3Yo0RPdi3oie7FGiJ7sUaInuxRoie7FvRE92LeiJ7sW9ET/Yt/9Yn+xb/6xP8AYt6In+xb0RP9i3oif7FvRE/2LeiJ/sW9ET/Yt6In+xb0RP8AYt6Inuxb0RP9i3/1if7Fv/rE+ehpA+ULUtajUqUak/8AlIxfg00kowkZYavTIaQqzWuEjVlr9eb1Y2RFK2690N2GGiiwnnQD8/KSt+cTNFsG2RgsJPzgUQh1SUjkB3GPBcXKsq2jKPrFDlzQzJJV+/fw98eJ+3LO2gOiKOsL+qfRiVoPhyFH0SCnkrtq217r4UnWb1gt63bO2APhumSkDtDTxjvNmHLDUtXPNP4e+EIR9uUfxdEL11IKOxeAxcihk1JK3MFDhK7ZyV3dxCPijiG+7V/cf8kcJv8A2k+U9OPwIjj19+4BCTDJhuBAOoi2xKpvpBxE5IXe33UW3nRjSnMIqScZMPqZcByYlchGWEBGuElKxxToyjv5oFHG1FCxmIwHwph4ppSl8Phfqtz4T4Qqxhce9UZIsom5nA2eKQMohxbrhxrWakw+4w8nCFoNDDSC59RONjEftDNXvg1VLOlFeEMh6RQxxT3zjNu3iEfFHEt92r+4/wCSOEj/AGkR4qXb+tfUMA5BnMTv+KYmQ2DE4FEejTYXph3XMks0S7ShScx1BNuT7jKFIQXRZtHoi6Ft05L6Gm4fWzg2LqHr4iFInHr7e0qaOxVy80TLj6xt9nYbETlh2n6GZDnuih/PLbax56bCMMcev4j4B6IcMpKK2gps3NAh5N9/fTlFRNG3jDbpqlXMYbW262bK0KFCDC9bSINLdMK/Vh7Z/v5qyYmSF4wh02kq6YbLTrarK0KGEGLdlDNsWDTDUQtbNz0BOyVRSlnLSHmnXv78WoWgpWqgaXtuiJFu9pwWznh1hrMFKAhplwnEa4PdEolpxBoRAHVFOqBlbT8UeatKepA1fMfCutP4Rg/OVHrwwZrXBlVO4HNjUV5NUzWudaKe+s2NRXk1DNa6Mi2/9ZsbRAObUOtpFBoXiNucyYf2X7+asaInFsrO02d8bMNFp5HUeUckfqxz4TqVbk2sL7v8o5TC5x66TmEILwo2M6sGr5snTrWIxNyiB71HVnlSt9pfKISqtPWBh+/zC6Wl2QmtOYQKkodAHXE9e10wtJWEJRzqhzF50vN29MOa5kXTZQ9TCDmVAJJxAQ+4xbFdbtbZPrGJ+SDuZV0gFdVYn1oXjQHVW21dMNFqYZVZWkxfr1rZbnizQ1BTph56WuU22mrjmyWteYQ8H3+Wd2fUIn9gpdnW752Z9WHTK3PSaWxtnDmELsrzvzlk/KJpbzNsW2SsGqK4bCoM2XVzIa8a5UUork5NR12UZcwtsI+sIznNE9K66xWfyiL5XmrD7syhGFUu5t6fZOXyXEI+KL1rkpANX7ODJgi8f6v8YvH+r/GLHjbN9su28Vad5jho/wBpEO7FYotpeFBzGHVPPrNVLVjhxTbqDVK0mhEULrsismvGIrh9pOphDEkldM+xh5TzyzWpycg5ImXGW302XUoNAoQPqwllvpwq+UOnWUou9IRkKhtj1wstuINULSaFJ5DH14q276wyxx6/iPgDxNb496if6pC7w68iri0eYjMIwk4znh/xTiaBC8IQc6eWFqcfmngm0o4SpRjYOrpLsfZwYVe6FlxxRqpSjUnnh0mRmnA0W8iVKxEdMJ+uq07zjF7o9F/mEOFCL3fH6edXEmMGaH1vvYGkFZ6o+uoGkH7WVUOKUo4yTjhZLDiwh1HIcsY0qvSzyHFq8ajujjvkNXht9xjjv5RHoC/nq/q9fz1P1Sz8CY2z7qWx0mPFvL8RL/YAGFX9Z4Wp11ZqtazUk88O7E7dpW0XziHlPPOHCo/1ij9WOfCYHK44cTac5hAVMqFGG8qjxi4cU686q0tasp1fR0/FHo7fz8HEm2T1mHSpFo3lvzUJyUEOqZfbNUrQaEQjZzEoVHkcTl6xBibJYb2yvOdGZRy6izrSbCrTeQKAqFCBsn5Yhf8AhP4x6E58SIdLIdRfZhScZGIJgRNPTKmm723bVWic0UvzLSGGfXPnd5hxTrqzVS1mpUeeHTrKdcDK28lo4j1x6cj4Fwi0w1490cifxpDqmkXq+TJRlriR7oEOlxF6vkqVna0xogBDMygTKAMlqoP8QPkeIR8UcS33QBAEfuP+SOGj/aRBDLDf1j68Q0mLtvh2nnvob91KxdtX+sRoh6/SiJR69rt2q4FZefU9Cb+Wr6cf9tEHCZhZPtHU82dIHsIjj1/EY/J2uw3422zVVeqPyV9x+EG52uy34qwzRVeqMaZbB1iMjLer6Ug9WGMRvx+DUxh9BHtCPTh/tuR6J/MI4lvu1MRmUd8TmtkIWS340IqYu0f9WnRF21f6tOiJ+XfWlSLIS6CcB1ci2j1g6I40HrSDqMuIaeqWllOBdMdI855A6h+McfT3CPQF/PV/Vy/nqfqln4Exw1nqQqMQad70+B9Y9IKbRXOaiH0h6ZcSlbuVxef1RFTZo3MjkyK+XgZZWvUsaYyyrZ+LVMGscW984zano7vzjCcFBE+qTBFq8tUtAcqjgHVF3lkj/wC6jRF1r/OIre0a6SquDNHEu96Y9Bc+JEejI1MRmmh/GI9PT8C9TGJpoj2xHpyfgXHmydOtY0RdcsTirNtvXSU2diKYOaLun/Wo0Rd0X9mtm3OIIwinziaYmfzdSVlpdfOweR4hHxRxDfdq/wD1/wDkjhN/7SIT4y8Ov86xXQIdU664bS1qwknUxmQeX0KtqHuMZo9Bb+WrjQ+l32k0/kgfpytPqq2Q9x1BQzLqnejEO6OPX8R8A0Ey2pnpxjuhPin270pX2xk6tSpyxtWZltauYKEC1rV6i+RC8vWBqJr+cJWv1EmqvcIxqeU97Ip/NHon8yY4hvu1P0LqVnmBjZ62cDuDgEY9XBqmmumqo9ZP/swjxEykJcVwVjBh5xSADQ4jiMMNsvNJFthOAtZlt8kTAVRa33nslP8A8gQKGYeW7TNaNaRtlSjjXThgUIwHUwLRc01GbY11P1Qz8CYNEtvi0fsnAfdAta0WpLnqqph6x79QEk4hAipSzKFZA5KweRDeRtOYR419hF7cCv0jZxH5RhYVs2FnzkadU0RMoLHXhHvEIqGkXl/kFdifedVgX2dIvaXE7VsZemKXguWWaDBZTgHXjji3vnGbU4h35xtQu3TlAqIcKGHgtxwDzyKag2ltR5rEcS73pj0Fz4kR6KjU2yFBQrnEeMvBbnEUypy/wqrqYg+l1fIlBtHuj05PwLj/AOVLLZHPgV/LCPEzjKdl9tGA+6zAHVCanMB5LiEfFHo7Xdq//X/5Izt/7SIeDNFEy617Q18wnJD78olXmIAWjoieW40jI+Q2jpiutnZR691RZwAKTi6IzR6C38tUFUutN7fSODDt9NmjcxLq2VMx0GJuZeZRhKXSlCOkxhl5d+8AgUBoEnByYY9IX8R8BRStCgpKhkIxGLyJlYo4y7gS79pBz++JyfaQfMwK99IsC+Jo5fdm6/8AZs/0IY1uytZLbVqtgZqwtCHgi9Au7R9ObniZnJdB8xFFCHb2tYwrWbTznIkQLCNo0jgoEeifzJj0dvVdQ3YFhp13aLRwVQ+/Kg+a3RaOiHlzNjD+ckIbEMhxbWBc2MFv7Izjl1XC262oKQsYwYvDEysWXGXfq3ubRC5yW5GyFD3wuw6BTXE07SnND63G9o6MKFU4Q5IIcbVsmXR56dMLvcutdtl3IhWUHkMLdYccwqXL0KV8tImVu3rZJ1xSg/wjbGAoNvybikhePEdT9Usj+BEIMCi0ovYW4Ng6nMrMYcmZcHzEUUmAVOj9M9jHMIk7w2rzc/LyQnZCUUj3GGjDS9gaKTwknGIwugX2VXy8HphtQINCKQmKgjCCMkLQzM0sF1z6t8cuYxf5S1xC6p98Avlvz5tYsjoxQ7fA5sX5kYqcFOnU4t75xm1OId+cfWS6wsDPyQu3Z2VlKrLzCub+gYurO0/uhDtu6c5sSVG05QYcORIjine9MegufGiPRUar6GHGdgw65tHE8EnIYD8tb81hzYR4yfmlpbs27bpqfO4KYyT6PgXC7DzKwtCsxEBlL5+slXDZIVwmzF055CM1hJ98PgP0+vmDVzmQkfKJLWcs4cDfz5K5vIuLRXgqpCio5ya6ri0Vx2VEQoqOcnUm5ltOZDpEPOu04ayrvh5yzwQs01HnCnNbNPAecaJyoWUxMvvDM44Vd8OuIGZKiIw+FOzSRmS8ofOFKWo41KNTqzkw2nMl1QELUtRxlRqdRakHOk0hZUc5NfAmX2hmQ4U90Puu+usq7/CnJlpOQNuEQ6tw51qJh0tPNmoIhy26vqAzDUmX2h9hwiHFuqzrUTDrlnNbNNRxyzmtmmoPfC1pGYLMWVH7WGEp6ISnphLfVA98LWkcizFeuB79WYfaH2HCnuh91311lXfqvOJTmCzTVecCcwWaailIUMSkmhifm6f36tMKIVnBww6tdMVpVYWpBzpNIWpZzqNfAdcSnMFkCPOmkE8gBqo9VY2705bH+FJ/7as/NhOa/q0wtS1cJRqf2BMGDB8A7lRf5uluZXimG18n2PdF20Xr94wbXuiY2dLK5x/YgDgoH9GAUSjKbDCVY6cI8/7QrUhaTVKkmhHTF3J6n2nbR6zhibmJpzIp50rI6/8AxVyqAguOyK9gu3jQv8YyCFurbUyF+MOWvkLomQk3vqGmxV12LrzLE/SqGJxGBzphstvNLKFpOQjyqUJ10yHmrK67Hl1FuBpwKJKMeAVipbTsmVHzkHFAtLUaJGcw66uZfqH67WoAxaoBeeWEIqaYTAAfZVZWEmorz6qnENOJWSUY8ArGRRG/vDHfGG510WEAV/RuZOuMbe0Xw05FR6KO8xOvy8o6uxLMy9L68c+HJE5NqckxbflJqlqznFIef19ILFpqosFvPSlc+WHXWpVtpTry26A0xDHykRVV4csorjUMkPvuzbssHZq2RZSeQAc8ZTH1LNz0WB0nQIVZeZWFoPKIbb1zMEAhpNATiGCLozzt0FoqtmTpZa58GOJ0ztypo2ULWNmhWZUXSfkrxMWXFYCixgyUraw54undNifsks66CbLvuhs64S5erA4VaRdGeeuiUBTjEpSy1XPgi6pnZd9Fqy4PGNetE3No13hlpSVAtqTnJMTsy/LsKszLEzS+NcuDJD7zKmGLbRQQBa+1UHBF2LqGZJsa6okNFXVihTxYaX4xbFApSDhBTWF3WDn5O/M71YpSgpbqO7U4LnwwPz25E05LTIzt2sCu6P7FclsvrrlXTY6eqBs5kuOd0Tq5K5UqbC1oFVuL4KYn59q6LTZWhics0eAzECNeJcDyLwGqfW2vPrkhd0vyrf8AZhdi8ctMFffF1Zq+lywmTlALfTURPTxekk3x6VmwmtnkIEcW78EcM9+/vDHfHEIjZ3fuU2ed9v8Ar3x6KO8wzPrRrQ3nWq0gZLVaxJXYK32FMqvriCKHoj+zXUl1y6x0f+42E9PzesUH7CCbR74FUTqAma9dnH/X2YNWy5Ya9ROxHdGQx9S/c9NhXMTpEC088sIQOUwpkuNT8vfb2qo26THG4Oagj9bC9dSK/OP1kPlHpAja/lQxW3rtfs12P8NI6YYuos/k5u8mWcSEWOkY4lLq2p5gtG/uIIrkjb/k42efDGOopG2/J7Vvn2cfqxPcnU4LnwmKGQum+7LPJViqVGmiHbb828X5pedAOwB90cBfcIanFsa+ct61UAbdo0rXkiUu5f2CbNt5FMIIzcsIsNPXSDiUnJVdY4+H51bs+LbEvKUGwzkmGbpIc1gb5rpaSKclBHFO/BHDPfv7kUDDbzbV7SijtK4OYmMbZ2SOGnKIafaQhkN0dArj5KxIPTcihVthxg0dZPJFw5l599Ni/T5Hi/VAJj61h1LqOdJrDDrEswg7FwCttRwnB0Qw648oqVJrTTxZUmhrm1bmquhJtfUOINHWouLNrn8SHp5Q8XzAEw6pT613xTlcNqtaxcue/KCE2VvSRHjeepESWsblSlS22TVSzwlQ09rl2bDwXgsUwQlampd22oIxxfGg7MF5qu2ThwRcqfF0UJCFvyJT42mU1Ii5OsZeXRZtK+sd9aLnzEyiU/s0zLEX1IzYYuI/fHsc1OkFaPVoYAJZkL4AeSpi4V09dA3wMW0lgL6/lAot47UeaBiEXPnDPSLF5l35ZYorBsbXu1EOuNNhVQ1S1hFItJS6+pxNcYqaiJh592lLbqypXWYbfS9c8EOqWBZNc2GJHX1yps2nGwaKQrhD3RcK6E7MlJCBPqTe09RMUS4y6HEDJUGLnTsrdh4pLuzBZ5eWJCcXrAWZeYlCLVnMQYuVdFImmCi/ulJWo5K4cAhu+3nAUVxgihiSnpVxayp9L6gU/wCHD+yjL7mvZQsIvdMBNcdSP/4mXQ0gbZWM8wh6adPrUhgnnWYY98NGGVQyYZVDSoaMNGGzDSobMNGGjDaoQYbVDZhswgwgwhUIMIMJMJMBUJV7oCuoQFdQivUIr1CK9QivUIr1CO4RXqEWvdFqAeqECNhzf+4ftdG/HJ8/2kzj57yZ/wBgOT57hP7J5x892isTjNvgIqtXUmsXJu4/yokrA/jIj6NXX6VMj+aPozdT75nTH0Zur9+zpj6MXV+/Z0x9GLq/6hnTH0Yup9+zpj6M3U+/Z0x9Grq9C2ln3GAtJbVZWhabKkHlG/nJ892M67dTtjWjaOcw+uZPEtktsjqwq64S1KI4LDYR3Q6tXOo+QVh5DCrRdlkrUTjJBG/mcdx3UoISkVUTiAgrYudyYFv6Ew2lttOJKRg8kdlCjjj0A948DNvxnT8/L4vJ/wBgZV9+sfyjyRoIMHU9AX3jfzOO47pVZemcZ4DeU/KAEoSKAZvImDg8D0JfxDfzOn57owR5xsN8iE4tPhHVVCtj4PoivjG/mdPz3RtrFhPOcEZBSDS9oCufDSFGjKSUnhbKzAqpWACFVUEgqpnOSCKs7KycsXPRXLSkIQyw3gQAMZg4YsOIbWQptYyYq++LnD3QEN31QCG0JwUhZSlsACgqVKOIRbQ6E1Qkp29MY1PR/wDkG/mcfPdHnzA9wOpXxiAkU9YH5RWw9avfJVYVh6oIAtYawaioFeaFpCiKDDyUgw4m+KcpSuHHBhYtLVSzlx1gGHEqNK4ItUXRSFJxpUMXRClrdAIazAnGdTiR8e/nJ890cavu1M9IQs8yYwLy2skUqhRSaRYLTShUHLFzmv66IvaUPKNEJyfhqNocbKvqyYuc1VQphpogp8YK4MkNlWGmAQg2QaE8upxafj385PnujzH6dY1FEJEugk5PrxCli0+9aCVEVFrkheFSVAFRxmMrqu+CAt1exGfDjhJhQUDTrAw9+orZ0tFPJkgGDVFiqaYscNXy24lQGWoh5uxaX/jXjJ+XRqfu095385PnugYUi2OjUUqzmrDi7QxG1Bgwyl+g2IViESTBrjgWEFVQiuAajCXl0okrO1iRZUlWMQcWLkhRSrOIcUkYffj1P0rpPQMA38zp+cZtzjY4iI8w4ObywqpRsoGcwa63QG65zlPX4GbfjOnuO6Rs2tivlTkPlcuXMM8DxUvsGK5V5/5urf3OnuO6RaBFCDlGaKqlnNoc3IfJpKlqwACCm+HZTT/mtpHyHvOCElLDQo2DjOdR5Tj39zp7j5MeQw+Gi20vGPmMxjxsso7FdPceXyKfWUcSeeKLWB+cTq8CG08hyd5gG9Vq46rbPqznMMw3+zjuO60hSFCikqFQocsKvS+KWe4wwtChkI8FMBx9w4mmhUmF60ZH/wANg+MPrHJDSWJZO0Zbxc5OU8p8LPvznHcYzbsSh1rgOAKHREutg521V9xifKf7xo/KJ+W/i0RdEf5bKj3w2/MH7a7KeoQhuVbPmsps15zjMDyGbfjOO47159+c6e4+TH7M5x3HeE+Tzb8Zx3Hdp8vm34zjuOpXy/u3Vn3QIbU44s0SlIwmAHHsaWfNRz5zu/OO4+B1bopvMIa2I27p2qP6zQL4+rbvKxnmzDeDOO4+D379jUqxLZEeevQIaS00nElO8Ocdx3jO6xqMl1z3DnOSKTM3n81HNp3jzjuMZt4Ojdg1KystzbNfRkhhLSOTLynPvJnHcd/BDF8VlOJKecxZmpoZSNijmG83CT3Hwx5XB4I8t37kSVKOAADCYqw1xI26uc5IZQ02MiRvPwk9x34ECG7zL8c5l5s8N23/ADnl7Y6N6c47jvZm8mIly5wlYkp5zFJt8ZD9WOjLvXwh3GM3kDq4d6mFvOZkiF2v3DeLpVDSWm04kpFBvZnHcYzb4iBDK3HDiSgVMOXocU3tukxLoZR9ne7hDuMHcGfdeaM2qIEMrdcOJKBUmF3hPFIwq68kS6GhlIxq5zl3w4Q7jvZmjMIECGVvOcFArD16HEtYT0q0RLoaGWmM853y4Se472ZoGNAiVW7nV5o6Yft/umsA6TjhhtlGZA304Q7j5Lu3izGBrta2ELoraYs0IShAxJSKAb7cIdx3s4Jj0Rv4Rvvwh3GM3kD5Ybl4Jj0Rr4RuhYQhIqVKwAbv4Q7j5Wp8ni3JmMeiNfCNzqv8zxSDi5zkh3xXmsp2g07v4Q7jvZwY9Ea+EblfS0nJnVzDLFZRjhfpDogwd38Idx8tk3dwY9Ea+EbjcS2hONSjQQm+Hj17XoGWHluunzlGDqiBAgbr4Y7jvZwTHojXwjcVJx8ZjsB0xMFY81sYEJ5hB8Gddb5Fi1Bln+ZVk++LmzIGcItD3RgOYwIEDcA1BqDwOGO4xm3r4MeiNfCNwL1zMD9G2cXOckPXtjiW8XTng+Sl2nfXQDEilB/dmzE3MNc9FRPSzvrpKNMSQc/u3AYkJlH+WYFOfUECBAgaggQIHgiBAgQIyuDuO9nBMeiNfCPLO398fomsJ6c0O61Y4to4+cwcEHcLLa/WTWLmS3QindDDrPqOmJ2bRz2VfKLooPrtfjD0ovpI+USza/VdEXNe6KGLmzY/yjEs8nnbMCnPBT1xSBAgQIECEwIG2d/lPgY/DMHcdfK8Ex6I18I8o7f3x+jaw9eaF61YPmNY+lWod2pB5xEowrnbEXMkj/kJ0RcmR+4TFyZT7uLlsRcxr36YuY11nTFzG/aOmLmM++LlS3VEo0xbmVWrApXYGM3gV3mzxwTHojXwjyTmu3hkaxDnVD+t2eLZNOs4zGAQd6vSl/AfKV3g4Jj0Rr4R4biG0DGpRoIQZtzhbVvryxM+K4tGxT+O93pS/gMZt6+CY9Eb+EeDMttclcJ6Il6fvXvkmJpbx+0cA6IOod7fSl/Ad7OCY9Ea+EahoBD2uneCzh9+KFJk2/sYV9ZhalKONSjUnpg74+lL+Axm3Qdx8ExNttHWjWxxq2oyCJX/ADH9ETa3E8DEnqgwYO+XpS/gMZt680cWke7UO+vpS/gMY6b15o4I339KX8BjNvXmjNvv6Uv4DvZmjNvv6Uv4DvZm349KX8BjNvXm3VOvteq4Ymw7/eIESTDnqLKYlZtroCh3xdBCD+8BT3xNsOeqsHdPpS/gO9mbdRgwYMHUnH0eq6Yui4r1wFRrR7nbI7jFzUH1HtIiTmW+aiofdb9ZsxdJketgifllczohaVcx3B6Uv4DvZm3eYMGDBgwYOobPMaROzKPVeUPnF1Zz70nvi6jh50IPyicaPOymDKq/y/xhiTPXpiTlfaMXPZ+8MXNR99+EXNH334Rc3toub2sXN7aLm9tFzR99EsGbzMKO3tV2B8DFvRm3lPgHUMGDBgwYMGDqmDGR3+Uxm3rzb8cZ8jGbevNvxwx3HezNvxwx3HezNvxwx3GOvevNvxwx3HezNvxwx3HyZbCa02SqQWPbhTHtwpj24Ux7cXlXIHNMIUhacaVChH7J8Mdx8mwteEmqVCJV32xEq77YiUd9sRKPe2mGnGQfOJBHTFA6B4pzNyH7MY/2S4Y7j5NhxxNaVAiTe6oknuqJJ72YknuqJYtjhOYAIcJS2MKlRn3Vm344Y7j5NDhNonY0yw091CGnvdDT3UIae6hFtquIrxQopVjThwVGQ8n7J8Mdx3AguKVkEO27AwqO682/HDHcfJutJVbNa0h9jrEPs9Yh9nrEPs9YiZaA5FCKpa845V/huvNvxwx3GM3hHwRqCBA3Zm344Y7jGbyTJKeGTZT1mFy33v4Q5K/efhDkt95+EOyv3n4Q0l0DHel2qdGPdmbfjhjuPg5owCwMAHJApszqirbeThGMnuiYb64mG4mURMohYUM4MD84bwn94nLXlG68247nicb1wy0aGy4gKC8KDnwCGJa7tyntgpTgpe0nHfB+jUM8Lvkuh1QaVnTXBvHwx3HwuAO6GapUuoNsQx/GIY/jGmE2V2iSK1g0SoWlcvg4lGyoZxHNuvNuM4IUoA46HHvJwx3HwnW6WR54h1v2xDrftiHG/bEOt+2IUFWUYaHl8HEFisOI9oRn3Vm344Y7j4QEJHVCfdCfdCR1eHTdebcc6ZORlrIWtLV8WpSsSUjPgMXfugh1w2UF6QFivLRcCjrKyhdM43j4Y7jGby/CEJaIOS9J0Rn3Vm3HLys2w+AHZeZRabXTFiIOCPox9HmXU4UOBh0lJz4XCIUVuLUVLUcpO8fDHcdwu+4brzb8cMdx8IAnGSTQDnMPOOH7AoPfGuPaGiBMe0NEa49oaImAfsOiyevFDakKzEeBlNIVMjlqN15txy7sw6cSGkFRi4l0EoSKklhWDeThjuPhc6uUxsjmGSGldcNK64bVBw5jCUuN8BeL8IWT+6cOy6DlhJSoYwRQjU4QjPGfdWbcc/8Ak12aCL3NYabEmqFUwgH5R9OJawysLIYU+pZpmBTSG70h11S0o4IJxbx8Mdx8HFXUmnMJr9V+MTK/uvxhVoZDSmrsxnywbQhCX0DFaxjmVjEOPN8hAVE0TQ1pe6V98Z4z7qzb8cMdx8IE084Rb9mLfVGLF4BIOcQAv3QlwdEXz2Yt+zuvNvACo5gN0cMdx3szbjkV3R1pYsyqVlNbR26qYbI+cfQiyHlhFWXnrYrlFYcvqGXVIC+EAcfkkFx1xVlCBjUc0XGm2Wbw8m0tGUoNIuNOMsNJqtakYAPLmCIIgiCIMEQRB88dx8I2UDGqGVOcq1ke4RJt+0vTEm17S9MSbftr0wpxg/a2adMDYZHEmqfAyqESiehxVe/debcc09LO4rbSyk9Yi7t01JOMGZV4Q8AQIdaYbvDwtrUEjCg54A8CkMrX6qKxIvdKad8NNI51iH2BzVMTnU3D7x6BF9VzqiXrzrMSbXSIkpf7sRKsfdiGWfuxDbfsCEI9kQlPsiEp9kQlHsiG2/YEIQmr52qaeb4XmiE1pjJhKISiEoMbA8sHHjzHnzxSXXm/R/hDZRXEciuY5dThDvjPGfdWaMw3fLOr5kQylv8AvFiJxtPqIJ74dfc6hEsk+sSYYaTzIEHcXHn4fBxV1GXcJ478IYc+/wDwitnARXHh1dkngmDRXBOOKFJxpIqD0RLUP7twp0wh6owjxv4RnjPurNGYbidl5dllILz8wuw2iuLDH0huA86rAhtE0qqjmFUwgocQSlSTkI8JpbnqprDIbH21Uic6G0fMw046f3i9ES7SOZMHdHHn4YzeCLaRizw1/FDP8UCngrqMyoZHQqGD7UM4fW3XmjMNxSrkzJTNkrDTlhxCk7VSSajKcYi5l23nGzbQh+casEjhWW60ihceWVrpnJ8GUQpXCc2R98YBmGDdvHn4fBymGZtqwDRxzaH3Reha2oU4ElXNF7FTRIW4ElR5IvaKGnjFhOHNhhNldqyQchi/hVbN9qMfNmgspsLsKK3AkAwKEKsqEWr3bs48NIvQw0SFOBJUeTPF6Rhp4xYRhzYcsBCC2bK74sJsndeaMw3348/D4OQxNuvAggMlOxw5IcQCNsLzaUf8WQQ6nblRQtq2FjkzGFoZ2ZUm21fMByc8V21QFQ8vHavNjDXnzRt1PW6RhFRSH1ldbV6sZefNDqRRZUttxq2FermMLQzZWVJvjV8qk5OQxWq3ElIVjoN15ozDcZ3k9IV8O9maMw3E3LrxXy+oaPxw3KNzK5+rF5abBUgNqtVKMxKd5OPPw72ZozDcU7NS3AvLN8rz4RD03M25oTLjr7YRZogpspFTwu7yjakocFUEjArm1EKQqgNFCmPc3Hn4d7M0Zhu4bNxQSOmNrcxaUs8rY2Kvfhh99Kpmt7S0gGykYLRrD7iWQ03hbRUr2ApTNC3y3bLakPABQNK5McTsxrm3ZQsti91zHDWJl8vy6Cs22wEOAY7OGoiYm785gJbaFlupy1OGH1NiRIBLaa29lTBDrq2XFlBS6AFIUObHuDj1fDvZmjMN3HxjTZLIpjXkiVk25d0Ft4tS4SqyrHiieDK5W03hQdmitaikP3sOS6W2HyjaEAZOiLoqnX79brhoBTJWF/m+uAu1yQqgcYcQjnOKLqmSaabSHGEg1KhjODHWF/2paSzy7OsK8aJkrI5LNNwDYtv7M5qim9ubcUhJzktOzDTLgfbwpqqlUqGFJwwifuUhlagXJvZyuA8bgp74WhywoptoNUq5RvGcYig5oAhCOqGmuqGmeqGmeqGmfZhpnqhprqhprqhprqhprqhprqhprqhprqhpqGm4ab6oab6obbhtvqhtvqhtvqhtuG0Q23DaIbRDaIQiEIhtENohtENphtMNohCYQmEJhCYbEYOaMO45SUdmMBbefbtlqmVIOCvLE8/NKyXxdQOYYhvI8luuIHLBWR6kFfswtXsw4fZhw+zDh9mHD7MOH2YdPsw6fZh0+zDp9mHD7MOH2YcPsw4fZh0+zDp9mHT7MOn2YdPsw6fZh0+zDp9mHT7MOH2YcPsw6fZhz+GHT7EOH2IcPsQ6fZh3+CHT7EOn2IdPsQ6fYh0+xDp9iFn2YUfZgn2YeCK8IR4lym2RiPOIRbb4xGEfhu2t6cXRdDTBGzIXRB4YO1MKtKLNXDXzq0MS7rSVYitBAMIdo80Fqq2RYNTsYlX0NnEpTZAit8fLtvDwSKQ2txDLBcspXZqa54YflZltpTqAp22ldnCRzww4lZtWnDtV80Sj6UkVqWzihh5C3VWXHKVCtltgOQQw8pwKISL2aqGekMuNFRGBaSDSsVvbbhSmuaJN59x5SxsXrOLogPXhxwtrZWaqSoZK8oiVf2xstUKlJHLEu6HeAUGvVEu62he1UpBAMJVV6VQ6oY6qNYlnmgcVtBFYbXfK0sWTarmpAoRj1MjSab28HUGt3eEjEecQirfGJwp/Dy8k7M3vb2MkXDmvdphBQ42SlaTkPkuM+RhxGu7mpKG0KOF3i/Z+UG1VgnDlVaXT3w/PzJeRs0upwBVdtjwQ4Qp2XQASfOtnDE9OzTmtnr6HE7BVMuPPHCf+IR6Ie8Qk3piWdUtWQbAgRi1y7j5xDrpTrdRdtnEbXLEw2Lb9Bs8fjwIui+w1KWg+WgSuinLNnrhc4+gXSLSFvooRsAaDkhlZKXjDFba3vO5RDAQuaunbbQrKgJAtdcIfaaXNkB+XxiijgPPE4ualJouJbvySFospVgxwqqG5O+LtjAl++Js9O2iZRLLXctpy+2MKaWySInpyZLbTa/zhkWQb6BXGcMFF7ZkjbwY5oeLSPeFQtBJxmxF79mKVsJxb28HVxR+brzDaHoyQ0U1xKxpPT5W6TklSliyxfLUTcxPKVNiYU6tq9pRRBTZThy1w8w8msocQapUMmo4rxIo39kVrgiaWUHbYha5zlifAZQq0lFrankyxOvrtYF2GwLdc8IcvCjUoWvBC0S6iKVSK4OmLqPrbx2cAHuifeDDSyUnHe64zQY4+kibrqmWbyw02FYK+euoGGmTDDyrEtW8ji6mpp0xPOGYsXsrNNknMc8TSnGkqtpRQBKTiwARMrfLabKCvIIui6wyMIQKRNOvvilFrOKkTq7Uwq2/WhDis5EThvbNRaOJAsHEBE4441gKk4BaIyqzxOupbl122RwDyROqvLg8YhKQAvDXDSJpczae1zMrsFKbVKJSK5sOrwRvbwfBSFIONJGAwqyeLWcHQYQpCxkO5n20c5grc9VMSyB66qw/Y9QUha186tzcEb28Hw2g4Mmccxgl9vN5w07hdQ2PtGkW3T9kUhptHPhMTLhGYGg926+CN7eD5EXp7jE5efPCNgdqsbU+XwnOd3cEeE2izTCTGU5U1rASMNKkV6hFBhpsk1jB8oQLPvgedGeEJHNAGLFSpPTFNlyGvXHLuzg+STVJxgjAY+6J7jCSlQxgjFvXwR4SMOe1BIgmCRqI2XPghREZ9QmmaCaQcGbdnB8onZDarTthGzayOJxdObergjwjQQVdcV8HCeSDSCqCrrgq692cHytCDjBjB+6J+HRAKVDGCMW9HBHhp98J9/gbEe/UNOSEnrgbt4Pl9i4Nq4MY0wnAdqsYlbz8EeFk1FmFmFK1DSMG8HB3AkLQcYMVcayp85OkbzcEeGnqgKgKgKgAeEDuzg7io29lHmr0GElKxjB3k4I3tzbjFFDarGMfhAwHarGJW8eYeGIHhGsAQkQBuzg7kSFIOMGFFSaBQrk8D/8QAJhEAAAYCAgMBAQEBAQEAAAAAAAECAxESBBMQUCBAYDAUBYBwkP/aAAgBAgEBAgH/ANPj599RZScwhImRPhPyuUMVzIUtRMMZCCIZD5spewzfNx1TTCvlMoY7DrS8ijANhLzooTeEHw4ypTK/jC8yGSSC1O4waZoll/HMN42tDLuOaWW/idmzYR/QG3r1kX/UjjlrTMzM2taZmZtM2m1rWtaZmZmZmZniZ4mRPEiZ5kTMzIshXvuAiiIiIiIiIiBEQf4kflERERWsREREREREREREREQZI6BwFwa1BpTCnjQb7qTZW86aiUlKEIVwoOLpJAlOnRCmuJJIgijwkjJTiiP8TOG1kGlgwlAngwnoHAQILM3ccYwyAkNljqFVKcShxs2+TDiNqlNAyeG1skca0uvBZkbbTK0hpRFqYEPktAU3Zttw1tmujSgtbSFKaSNctmS1GDCegcCeVBgIU446aWElkhhJIeDTqXG+TCnFOtkhd3eIaIhvdW8S3Uhp5kIJoNBRNObHQ+FgwgMB4nXlJINgzSsl3Ssl7DN4G2xwYT0DgTxAIjJKTIQZCI1JTHC0RQGkUJIbQFISgUcJpANJERA0kRkfFCIiWpSklQGNZFrJMGkiMgXBhPQOES7Wte1rXta1rWtaZnwIXve973ve9rWve973ve1rWte973ve973ve1jUjoDLXq1atWrVq1atWrVq1atWrVq16tWvVr16tWvXr169evXr169evXr10166a9evXr169evXr10prpTX/wBSPrYXw+tk/wA33G/2iIiBEcOZNyebd8TBPF4m54mFvWuhwLUXu5QxucoY/wCcZQbKIiIita1rSlKxbcTgpXMXjMa1MKCREREUiIiFiPB1TSCI0rJBuAvdyxjc5Yxg69/R/QzkT/UrKTlbVZhZL7rXhL+Z/U1npXkZn9jP+ihzOyC/0DyWHsg4JbBJQRf6Z4QtOeMVS8qZVkAskPZH9KcpC1cPOsK4yjxuVISl0G/uadC39iXyN1RP7W3XHNqXm3At26XfxzAhe7a4rGDjSUGXBkhs0ZqsZqHkNCZl9zFZC2DNhBFls/57ueeCyEk0gkZTP+e7a3+geKdpzxim4C4UCCAtTKCQ4whCw44hKUcZYxvF4IQpPBMw+jHN8MoiEiHUMh1TSA6ho/wyxi85Yxw6/wD0bZCecsN8ZYbDpUaLMGJzkDBErGEM4YXD6mV79+MiZzhjGCXmjHDgTwoEEDJGCXLoUeI5HGYWN4uguHQQVkbFKxw+GOFBnhQZD4SqxmyX4ZQxuckMBwJSF8J5yUsmHwjwyCxVFw6WKZB9WGWYMQSsYp+OYjEchaHFNpcCfBBPIxFcQ6lpl9plzjJRjK4eW0l0i4cJwMIh4MB4McGEAgs2ydDQj8nyx+XwyHWydNyARcOoSZuGSPAyU3uMJJxonzNlvKGLy8wl9TuMjhSF45PqVRleRjpdNxKCQhOt/FTkuOtvmpC3Wm1E2bZtO4pOGtrGq6RFDhGki2qDROhrlaCMwkGIsYT+MRxBcUJNRHJpJMF5ULmpEDBcSDSRWmZBpIlEgrVTwSyE1VjrxFYScJvGQ1rk13NZkQtYxMwDFRBgvAyMQIrHWySpmZmZmZmbWta972va97WtaZmZmZnzmK9zM+EyJmZmbTaZmeJmZ/asdtPM/wDqE+E/BmbTpm0rzNzYSvzklhakKM218GZK4cUR94YQklMhThLNbi0qbWYZBkQsha12tdBmsluKsRt8Ohs3DZC12cNkKOz4LvTDAMMBINDpCWiMMAzUbPBh3hoGECjoMNGzw6FJQG+DSZNi6w8C70w0laWkqbqom0LbLhTdIqhFFElNEEaEk8IQkkhZJ4QlSKmSCNFFJQXya0FxP/1wj/iRatu3Zs2bNmzZs2bNl73ve99mzZs2Xve9732Xve973vexKLt3vpHvpHvpHvpHusLuHusLuHutLt3etLt3einiPMu3d9paicM0KWvSRhbn87azUay8i7d32lpJp4mCdIjgVlhKiNBAu8d9qbKWlSnNCHAayxm3DMjBd457SggPE2IsykMptiE4ls+9d9qCKAtH8qUhxosYuK9679I79I51pdu51pdu51hAu3c60u3c+kc60u3c60u3c60u3c60vXkz95zrS9aZ99zrS9Uz6FfWl6cmfROdaXpT0jnWl6Bielc60v3np3OtL9Z6lzuJ6tfbz1i+0meuX2c9gvsJnsl9fPaL+kX9Ir6RXwkR7yvg46BXwJFHQq7+I8bWn21d7BF+c2m0+qru4IvTmZm1rT+h9zBF0MzMzMz28R9BBF9BEfPxEfPx9EX/AMDYisRH0kRERH1ERERFaxFa1rH0avpFfSK+kV9Ir6RX0h/SH9If0h/SH9If0ivpFfSK+kV9IrrS7dXWl6Uz0au/iOjV9Ir4CejV8CXRq60u3V1pdur4wwX6xEczPCvgI/NSYEc327t27bsvaZ7Mvfsbu7bst35e1Ozabk/Cp9m8/Ep+kL6QvpC9IwXyKfpC+kL0jE9GQrSlKUpStKUpSlKVrWta0pSlKUpSlKUpSlKUoC7i9r3ve973ve973ve973ve973ve973ve973ve8pWS+wLxPryWSulqSdaGia1k1Q26U16dLqewJZH7URQmtJNE3Wlakgk1JNFISg0kgi4f60vGSV60E0TVK+q/2hGSvQjWTZJ9p/tiUR9Y/3BK6t7uSOepe60v2I+oe60v3I+ne60vRI+ld60vSI+kd60vTLpHetL2f/8QALhEAAgIABQMEAgICAgMAAAAAAAECEQMQEiEiIzFREyBBYDBQMkBCgGGgBJDA/9oACAECAQM/Af8AS9whaJnn7F0yEVyIylxJ4eGooxJR1WONpksd9zEwpDe0TEUdRqwnY7Y/VJSekxMPdDnHf6r0xYh6T2HoRjNXYtW40+DJ4cqkN4hjUNJs3Z1RSdxMXD7inH6rwMWP8TFm9x6VpMdrSS1bmJhPiTnO5F7xMZrSyo0zFwnsTnK5EoyuJi4mzNEfpSEIv8K/Nf0pCEV/tLWxMn5J+Sfkn5J+Sfkn5J+Sfkn5J+Sfkn5J+Sfkn5J+Sfkn5J+Sfkn5J+Sfkn5J+Sfkn5J+Sfkn5J+SXkn5J+Sfkn5J+SZMn5J+SZMmTJkyZMmTJ+SfkmTJkyZMkSJkyZIv9Bcv7lF/p+X6DlnL1aNi47jldjjHYdDi6RaG20xxkqKVkvS1GJJXZJd2Nzed4qQ70on5KVslibji6Z2J+S9mcmspTdImvYvYhUTxHa7EsOVSGpL8dIxJK7LW5Oe47p5SlOiV7v3cv0HLNrFJ1/E4nc4HA13Jm1GnFNepmrDKwiVdhy7nUefWH/JEvlGqFnER2y+Wc3lOLtG9SKRwOiOcbbHumepu2PVpY5zascYvc4ZW0OC1JmqJpWzG8OxzjdkorSOMbsrDNrs1RLFBFdxQR/k8nqslCVMptM5mqdZ8v0HPPrGxxPSk7FNaYmmFIfk9KZ/kionU0nBkNNMT7HUefVNL3I1scDSqY5y2O2dzZQr3FPZHEi4bHRIqFF2yC2mQ+DqSNhQWljnLY5I4D9NGHp2OmcB/yE40XhmEKtjSrYnLUxPsKcrYpdjU6NMqZrmqNLsrDLt57/oOWa7llCfcS7CeSffPc+GQEvYnvksrEuxeenJMUexZE47C0blCkJFb5J9xLsITyibZUKSqKKRFiE1RESRESEhMii++VZ7/AKDcQskL6/YiJEQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCK/wBpGqobjvm01Q5Q3/JJSOP9j4RNk4ixPfLV7nq99bEmSiasuX97scc90cPyczj/AEUiBB+zRE9Tk8lPuPCmX7o+7qe7SjWyjUaGakcjb+7sjhnujpoWGjEl2MWL3FibZSU9ycv4mJF7nHUycnxMVdz1HZx9iFDaJjsknzE1aFhbIx32JRfMjJWPCScR+n/yY/cnjOhxdWSZKLHONoeXJFYCz5nSRP1dOc1i6cpvEosWGYsuxNfyNcbR1clCJiTf/GextmpdxR7HIf8AiTNWXwjEJLuX2NK2NiY3saSY/kbe5seCZvv+OaWxiGISfc4IWIKImaMXY2LnRGKIyOyEo2RaNEqOPs0wNb1PKE+4oQPWxLkRWxGULR3iXFCfJiojhJ0evi2yKIzgaXpzuSOks90dNHWz6+XWNMbPWxLYkRmKCpHVPTiPHmKKr2cfbyFFCZomWhJ3ktJ8Gxe+SRrnlaNykXl8lr8PY4Z7o6aNBiS7GMNy3y6udzOOXM2MbVsY5jazidPPps3eWx1DZHTy4E4Pgf8AkGOTWJbz5I6ayTN0cEdbPr5dY6Z39lYpPGZXH2bHD288+ZSH2RiE63y2NstjllxOWUl2JkmNfh7HDPdHA1TEsuZsdTPkXDK5HHOi4nxncaKllpgcsunlqRpnTyXs2s205SwpjxJWaY0ViWbZXi3l1jVhmmVey8Ro0RPTlZ6kc7iVtnbKic8+ZwFeXHLY2zqWWxuXmvxdjjncjib2holLPnnqHAlIfycPZaHBkkTxDamNO0SiTxDRE7FRzp2iUScice+dolhk0SxO5ODto9RDfJE4bGJibIanRxOrk4O4k0qJYgsOFMTnZFojiRHhSLHlKO6JRJSG92Meo2y5lqh4bGOW+W3taGzfKhllfhvuV2zsrJfJXYj7kxIXusiVkhCysr2JiXui/giuwpKmKHbKD7iXYV3lAQiDykSKKICXsiyKzWayTIlbFF+6jfNfX5Fd/wDbrUbFr8F7RJruX+W8qRqWWrOi1npX7+lqRqibDukNOpFTNK2LVjeXcTRpiTl/E+GNOkTXc+SUv4jfck+w1szST7lxsleXEp0fBUj4RJfyHQyd7Ek9zb9/semzYlbonLubGuVGm0Usu5RcNjY6h1BaTgccpfBJvc7GxsO8uJxs1uzkx69iTOJxG3SJfJt++2NMS0aUO7iTvctGktm2VbxJy7mxKPYrdnKy40bUTXYfyNPYne+U+xSGu2VoqNFIp2XuTeTQ07Q3uyx/VNRX4n/0jqyYxjGMYxjGMYxjGMYxjGMYxjGMYxjGMYxj/d7fZNv/AGdVlp3NW4kS8mh6ctT0E/JvoGv3+39q2UjgVDcuaEP1byfr2IfqNm95V+92/tIRpVmpWK9JLyK9OUZ3BElvYp9hL6zyNjpnBD9UR1XlU3Jioauz5K7/AFhCNstR/wA56tjS++V7MX/Qm2+ybf8A0Qy9iIERZsYx/VULJkhj+soWTH9ff+u+32Tb7Jt9k2/coQhCFmhCEIQvYhZoQhCEIXvQhCEL7Pf2Wi/1Oxyy2NhERWK6IkSpfsaL/uslkhe1CEJCaNthCFdm958vpTGIQv63L9pX9RC/t8vsnL7Jy+ycvsnL97f6fl9k5fZOX2Tl9G//xAAnEQACAAUEAgMAAwEAAAAAAAABEQACAxJgBBAgUDBABROAFZCgsP/aAAgBAwEBAgH8XzRffD5PZ4rPEpO1omgQSrpIMXIHFJ4lBFwiWEzsBJE0Jg4pNsjLChGWAEiIA7of10CBuTAJ4DyjsR7YgQdxwMDwjgPCIEDcQfGOzGzhQYGxgF+B+IcBu4PAYEhyXlHpPs22/SbbbxNeNbJJJJfn5vIG2224YlhHmvIISUDtG223dddcZ/s+y6+8T304qTu6G/RJ6MegOQFtqtsMhElP6PorUKAianPIJBJpxPACpwlwWy8D6gewIIliaFaYMlOJ5RJbLCSHM8H1ZgbmB7ZhIxbbsu7MDeaJYPgO74GB0LYNzht+UcXsPMYl3mgRNDY4mG0OT2IcCDxb8LbdzNQVIZMGpLWf2X3XNtw+F0CDA4OJd7mPZXNbrzLZJK21Gn9aBlrmuYFMSWCSwSpLZcF4ZcCSVttllolSSXok/YSBgyShbJekl/uwS/qeGSDJB762ELAB7VGjPo6cmpoafTS6+rJFDT/zGqoUqNPSqaB3Y9gbaerU1nx5+RqaGcyuPus+RrUK1PVEzQO7HsDYUxRoaetJS0o+U1GkiTTVPmdXpJKX1wYHdj2Btp5q8fHT6sif6dfVEfIVRT+cqaSvqpCIHdj2hPfc9LqT87VqRo9bV+bmmknFbvRkgyQZIPxYMkGSDJBkgyQZIMkGSDJB+LBkgyQZIP3oMkGSDJBkg/DiX+X1vKxkg/Fg/wCEE91CttttWLK221Y2kljy/rZGzfTNywe3l6xkZKl07ubbbbuvlw9t3NuG4bhtveXs16zbfrS4M237UmSSdwurlySXJJcklySXJJcklwb/xAAvEQACAQIEBAQGAgMAAAAAAAAAAQIRIQMQEmAEMUFQEyAwUQUUIkCAkDJhcLDQ/9oACAEDAQM/AfyTtlUedRp5MtlfJra1ipQsPL2KFxlsr5NbXY8nlTN5NDY0N/siv6du2V7bfzV81sr9pp3Sn3NtyW/UbftVSIn61vQXUWdvvr9pqUy9jV6tvPTy270hdBlRVIM0civQjEjJWGsmUPq2vTy6nc0oqOL8lC+3aiF/i6/kp2RZxExIryLFGRKiF9zTKvfHkxjJIkh9R+xKQx78b5f65x51GU214if9Dg2PEelDwZaWSnFzXQwUqOI8eDxeSylDCXEnDU/gTnD5h9TVFyfQ1J+5R7XWGpL3FJsSx02KeNYjDh515jILgaVvlBfDNC5kiHykIISg4SNNW+ZV7XbRN9CeLPQhwlpZPw/F6GElTQTWH43R5T4aMceSsYc4aVAngUcupKfIavtheELWkhLiblcaRGPw/T1ZNdCL4HDSLifDQwo8ySdWiM9Gka+hI8W0CltryJO4065LBdZKpVU0Gt2yXDy1NVFiw06BscHVEkv+CdV7yhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhL8ALbktuS25LbktuS25LbktuS25Lbktsb//xAAqEAEAAgECBQMEAwEBAAAAAAABABEhEDEgQVFhcYGRoTCx0fBAwfHhUP/aAAgBAQABPxC4RcvRcuXLl8brZLJZHQtouXrZoYuXLl63oaWRi02S9L0vW9Ll3FWm5ejLiy9b1LBl6XUWWy4sXGiyzW5cdL4Ua3Ll6ly5SUlkpqWy2WlpaCluO5cuXL0vS5fDcvRbFZcuXL4Liy5cuOEtLl63xHXVhY3petymlxYsuXFYy4sXgWWuq63oMOAvS+C5cuXL+pfDc9dSz1YsuDq6XL4rddjq2cVzMXHAupejwr0eG+FZerjXEYxM+TTS6TJnCGW/t933g1yrSeyDaNdAXSDSPrAuxt1hDO3xO2mxel95cut/EWkuy+ssrhxpelzGty453hRLmNLlzGt6LLrS9NpbFremOsupcvidFwNLJfAMWXpcdLnfRZelTbQt8C6MGuHNRv8AIgyvI98oDfyDiDKmdKSwpisxqE2py+wI3+EdUugOSR2+Pts3WlgFEQeC0U7sWTl06R0Wf72DF2HlLK6RUbm5ujJEvRmfLN09ssIIqkUBeY0CTtdSr7sUjINQlUscquZOYiS5cuLL4PMxBJZqLLl8DpepZcZZKaLly9Lly2Ziy2XLiyzS6ituo6GWaLFly5cvW9Fly+Bdb0t1vgt0TLls2USnJIJrVSrX1E7pUXdKmHZOkCGVxTlyRjY7Xy7Fc0bYN0tOZyJYL80b4uAyk+RJqjeO26wMr8Q9sOHRfSSY/rYn4cBoQN+EbWNzhi5Fxsm1awzHg9euUX7MuXwXLIsuXLly5fBely5fAuXpcWXiXw3PAg63ox0Fl6r4Fl6PEsuLL0dp6vBcubseO4U10rAEr1pEj6Uo/wBure7/AGWXDXsXlwrdpEx/sVm8iDwbG4slRv8A+f2x5KMSemDZXuuF0PwRZ6OcHOXNj/nymMtD39Dlq8mI0XbuoU1sRjIucZ5xu7asRcfLVcFWUGIpuWM+6vIKG8pffd+UP7dC6XL1WXL4Fl63LIMHRdut6Xwugy9blxZet6XpzdccC9L0s0vGiy9WLo6LAMjQAVjSWMJsJqUAnYAMiTZOcdVlkslkolIJ3mKxxWcQ6X9G9LlmpcWWy2Yl6LLl8Vy4szDS5cXRcX1l6iyyW6rTFKmOJvlLNL4bqU1vRdCOsRU1AYj/AMiT/wAiRm9FW6Abdg0uXwkuXLly5fECwZZLlxdFy5cXjC5ety4vEsuDFicC/SFi4hOU2IpelxZet6rCXqulwdb1uC6rrepwXLlkU4S5cvjWXw3wXrcvS9BiA0C0rS+BajCXF4FqLeq6Yi6Xw3iXq8C63otRZfE8F8Cy9Lgy9aJZKQbipLdb1KSkuXqS5ZoqMvRcuXKRb2j30HRdblkt1XXaLLi6CRStb42XouIOtS2PCZfFety+MLOnD6E9CX2NL0WXLl8dkvQQuWXLiyzrcsjFvBcvSyXrcuXLIsvVZL1XW9CLB0DGDB4GGly5cvS566X9C5cvS9LlwZcuXLly5cuXLg6YjIZD0mdIDVLz/oQ6O+uvrrporqaauukorrr+66O+EFOHWQQRp1a6qOH7oqqp4epmqun6JVTWWRRUVT9Ao8+c88894FR5ZTgFHFFeEWWWX066puyeLRFsmzbberF1Fly4fRePEsgn0Lgyn92CZRZcdxwEXueCvd/O+zHDpJZznWyhvO7ECFZnq70bdzCDeehE89BZLdZbCQAKZCWYepFRkI3lTePXnUQnObLHlm9PhGbJ1ct553k6lO8nfzutN38es1kxx3k6+id/O6071U7uPXTrOPW6HuZ3kdNfO4Er0s1sl9NbiyzS5mXLJfDniBjAm/p8IxtNPKsQxJ5g+YS8qzGWA1uoctqE2Q25Jhkk7sID2JQbnvo2giDGO5O+QlhEL2sUvR1Xes3quybdEVOgF6FsHFwt3Kex1Rd3q8HNNu9oiG2yO5ULhgTHzTd6hl76mlKhZyLfdDThpYHrkLgkUdACtYMWwewpxiXQEqo0tq7P6Mep0gKXuTG3vUg6kN+p76LxZE5VzZh0WMNXXbcjWrtiVzPbtLVERYzuy3vsjcTZh1f6mzYPIxFcluKN0ISzqYhfUbOaaIqUq6YLDBge8urr09CW9rstN2kEdxly5UL6XLCJmUiwfYMuUwpfS9MDue7FW+JfLr8/lggDPJtzrb6kZwyJLbAMKutn3oHMY0Sd9DSJ9m7Io+5ZNXqMHquWbRSdZ9nMuDa5cXW4svgGX/A3Z+5pcJy3xV0EhKt4YiFXUEfRn7nroXF1C3qtBKxvd91H29MVwextFfsvdY3Ln7QV7h9IpF6p9L8Tr7KG32KF5s8zsKrFPe9Tb2i8NL5uTFW8A3PfwtkDThz1W3fEHsQJu5PsW5vpLecvk3/URGXQ9MhSaKvFneKwaFUuatZvuZ6WiLhJWVeFHbEv7H3oLRgMuwhgR1HtgEZu9wQ3DYPDBzPWBgsefsa8SDs8bJmw5JfxU0mUiAK6FMr5/nf7iJ33FBu8oDC3OX34K2AYT8D428RF1gtg/NxjLvCtBG+B+yHg+T+ya3IJFqVCoz1spKrMeoJS7tIuJEfNNMbN3yEF15hj+d3vSC64aido798sIQLYKYGeUpvNI7B4WKw9++gShgm0uPI3CkQVtdVGAyoWoafmbRY7Te3ILc6yRo2Y8Md9O9HuLi+kph2+f9vHEJtzC3XQgbWqt7Ho/wBsXA1tNb6tfaARUs3tjk5vzjT86ZURUOqTSzq8l/e3/slWFSp57/nS+Wall+keDEKly5cvvL1tlvArL7zd09XPg5v9LmTKON+z4mwC7MGXPweK3PONj332CofQm9+10jCcdJQ8ZhDcnumU62eicjrTZ2Z0JsFs9ZX76yQjTsHOWlM+YCn4ADurfT9iQmLi3PYgr23T0eOKj/olHT7uddol4bfhwkfOIfe9vThQzDDh26rzBSmGIvEw78hyvTeC8MI3U31FXmIWB6bQv8x75+8s50QPX5RUAd82ydPmYjHH7wQvRWwrSBvmUW09fF3ghbsYIWI9GGqwKNGGlvqWEMkaNM/IoOdDGKA4w2kcx9/2dEPlvToHh+7dGJ42z3B29u1igQBCBpz91/QgjQfiCUhoS9NvqxbKwhKfoCaJdjMJiUlXK4fSRFXWz7RkL2VeyCQsCWNClEIXI2W7MslKmLBI0pTNlV9K7oJX3qwFC0UwpOyyBN8mGG3L2Wue6lRvizi1xcdu9u8wfVCdbrML9mkxosrYjd7gYvUvsaWaXF4L0WXoMtlstlstnqy3vL7y3vL09XgVwLVPscM7DCyblmV29Hyq4d4e0ofYqwNi04hE5wHPrlN1Lj0xbj0lJV8B0rMOzLVswsAYLH6D6DLFeZshGshhSFbUKjavNiTYDe5C+Xeo02LO/qDI6MAA20MnrSS4+CVWK75Kt21MU/6/fJ9wnOEOfCTJMZupZDuLn1ihVRMj/sFW8YpO6W9XMLzexOxRquzL271GDvobvq6zFt6g+9d1j0IyHLdu72L9YXSq8ndrNekG3gGxNx6xJU2FywzuOR3I6zDTubIYt6NfKM0pb9lbkZVXdia3wDvIVMxaBZPlFiiIVpetuciuxDrp/QcCUs+seKRSonSxZQBkZuhNDzM0CEl9shGCTuVj3l94x5gWxWu4Sx3IpbinGNsuXe4ieLSPq5GMd29ew1bnaDrw0yUZvRfZVjUpHgAWhyAwOxO4lpVx+vAyMJhFWVLRu6FtQjOo5hwuoNplUVAcqqZoV0j5rKVE6Ns+sWUnVcHS1g7Ri4WaW4qGu0q6q5DVeJWePFJtaKztzakaZr1Zet6XwXpcuXLly5cuXLl6XLly5foFHnEGPEKqFxHl4N+8K4yJjptM7LUNK5BAYDgRtOaISB51hC59iWwdfDTvttD1NQFW0K2qVnefVRJObfUUw3InYsLVrQnB7ffyY9fGU4n4VjSqQeixzJPfnXfBcvVmOB24cSyWaiSyWS9VYrfvAlePUZ936U8++MteOMN4Uww443SdN/g5xnrz55lpxRw4kotsurNLJwQ0MlvCCCCmiwMiZwp4444PDwzLDiawqougKLo6oSR2zHrfuFJZZwlHdZnS4svgsi8F63FgxeI0zCXL0OO4vDcvit4b0Eiy9MzOjLCOlxZelnFcdS+G5cvjdL4c6Xh+iS9Mcd6MGXovS5cuXL0XqvBf0r0onlK1XwP0biwZyjL4bl8N6rjW5fFfDWq+GzW5feX3l95ZLJZLJfBd6XrelkGXLl/RVGKlaK0StV0xLNGZ1ZbpetxeCibcV62Gq/UJtFizGlxYPBbCKaDRety/oXF4AlSpUrQlQ0CXSvGGJomjqaX2lmqzlrjV0uXovBZL4K1X6Y6LL4BuLpKMqPpsVWOzK9i1tMjLPGXAKV2fxe8ZUqlYtW+XutDW5cuWy5cubZ5zR5JOamVVeXSA416HARbEYzvCbVsRCFraPFQ1lwTJxsFdcko+iyoIuu/OHdz5Gd3SkHg0gHxo56oxOFUxyGMb28Iou/WXHgud3Uexq6hHhbTqS4dS47m5Qldfv6IjKkHNvnZPchc4HXr989UdMfr884pZRzB1X6K8a6PBbwG/3Mp7eMYZJv8AGftYJpcWUQNbjCG+zPP7XPqEpYGlQJT0ZaLCDR62Y0c7e0YBXpKPUhLcek5thVg2cMDnoXu3RfXMsH2k3KHQWXUta7XysPF5eS9EHnLwPvu4voNDqpQzsW7SHuMTUqVE7BY6U6VdVK1qVwHtRNGMmg6531bQfTnlTgh8EewNsu7rGnr+iHw4lHZOKVMBuBk6R0J2fm1931Jf2vuz8NF42XqvgXEvhvW5bLZbMv3MtZyZ+PT+VmvLh6Ic2Lvy+LhiD+977+XDJCjnSAxBvQl8NtTXfJiHO3ruOguWM911XqXf3i1sVsreflzrD+/bPy1esKYeL6gtZb922NyB6iMccsgwYBYnp1TP4ocbqDhIzgXQ9uyH81r/AGsX3tobbiS5pu+7m4PuymEvzD0yyK6uTvZhLIza1AFyY0N9WLC5jyYV1PGnyMAA6sFyyBe/Q/Ewo3bfq03DnGZjWZp6A5soXrzP94I6L3h8xfJc9zo53EyMSa/gxpo9uVJxrPgTCuOx9gMdznVE/wAI6klqe9zvqsve8hFLkgKFvaWQNpoAlbkhYzLN74nP2OS3Tm2z95g8+7AFy+ZewGMiqUmdY45Nx5JzXJILnuyU6NnRnLqyGQA7dPHPyJWjctb1wvuZ8865l8g3crGwtjXABXAUWEbAbRN/X/VlvbF7XbbsMpu+49RYM2OivJlERwUC1egROeJqB7sQ7X59ijXhK+llkaxnl7/YlI8xGL4CFOuzKPJxrcThrfCQe9tos/OfaVTRG6vVm9Q+rvER7xIhba//ACIzzO04rDmES2mBvs7DnPmF1Exz9lZN4P3/AOfSD4Nz/eEJ877cF8P6bqnO/a+mNwneg7nuQk84P3rtaFQvyu4TVIdRyMsuyG1+DoQlWLW+om0c27eIlT5kdruQ5/OSCj1YjE6fB6HIcgnik+6Sf3vymWK/6NvgJP8Aa9njVObmHaAUsz64GSZZ/IVp9RTpsOoTvEB1lj+8OuRPVqEMbJSODprF3lrTL5TMU2U/lcoZqDciS19ZgcxwbRPoHuZlVSc+qcs3imzWrpsy5TfT3Wd+tpb5c1k8K6QkTt1lZlGaYphyuLrouh7sxjLpdF953Y53bv1d2XT+vZSqdEhRQJ1RL7WLoC/db45PecYzhvxcf2fSVj4l5n7/AKTsaXdyrN5JFwTQfqh30+8XEzU68rLMCnMzMuJk+KByHI0O1TLrbu5/qObErfRTz/YjwTMWpwafr+mkOjMV/p4lQg1Yt9psHd3YG/N8B3OXbZhaAd71B6aSkwOETCSzF4SnL8sJQpQEafD33BGwws53yca+mm/Zfq9PX7tYNKBTZRUWYidmWwglRe+TjY/LC97FZYuLYe3GZsNw08i+uI2do9WInrnHJaeKksBwK6VAt9ZrefA2Tbqz/cXhd6WQY6/Wygcf/gQ/40r4v36Sjv7Ai28ggU8toXka+ToYXefcIquADky/hobcuE9acbBTp30Nvf1u0UMSc06WS7sd32oYLr1sk2Y3d+euS9OY1bffuVSDOr53KkHMdWlzuQ9ucPkJ0TjQc/49jFuLIuZTuN40/P4uZutbjgmk3mZpqz/ztGDemhBKrOdMflXvLFpOv2FP0/SdvxOc/Y9JtXxPazT3aepUR9/cPLprwUp+SR0UlGr+fcYez4yUHMdN2H92gwkHpnIq/wDbESJNpDyxWAHZn6rrPx32jmfteslFqUAtXoS2VcffivuIVd26/wBco8S1u1DgTPTMvsaZl2pOojq/U+njoimj1vNV/EMNNmugCrFLo6HHOcfme7KOUVFw+kqwZct0vSzqq/fyjvv6u+4+4kGSvrUrJCSUbLK3MU4h50U8CPUIucYrGssn479/ZisKecS32IxW/nVo3qS55jX3/OWvdaxT6DoNn1Qss3SgtRdHWYtfNRMze6huStDrzeygGfUj/wCr1T98r8qSvvaJkpDw4LCoQp3oYvDO8s8iqGkppyProXEPnV7yr9oovS/sOnoYxTQab7D2gzZ6KDH6NbMNH7Vd7sFqNaujuVHoGpd7Yj24rbTQ6Jh0aXWm3SqOgrlXwK839gYm09j4T7Ay3IwO8KAtWK54Um8mpfN4XhPa/wBzusrz8C+7vVM3C9cv6OGdnQPq3L1p7oQtXHO95XsIxJhaxz61ldsh254IZxrEQx6H1ynrfvz8F9tK+p+/OSuuXN8NsnX6QDKDYj1tu3C0+WHan5abXVjFiyz7QV6BPTovRZWzEDxX/piPZw0/hpfhtOMftnl2r2yCgp7w0WF8StY2dLl41uDLlMk7mbhGnn+ybJYAV4zDu2Cva4w+7qyE9x7/AGaY+7s2R4cOU6S7cXxty4i7rcVo2HUQYW6NPo6bOy7FjAe1HaOkRwOvd+H0zxGTS9FxjbC0usO4gxYB966bbA5qEETbRAEeFCtgzUNzPQ9KOqUrcVXdrN6mGZL+XEu1cU7zZ1PU/ClwDlKfR5Xv0KiPaTd8oeW1Z63Ss/dwwcxhl6++fZnBRgvCR0j7G90/MrRK7W+aYv1YcH6qo5Dy+qXjRi/k0LZIwLae95uDyR6R2Zc+3dWLuW6Clw0wFyt32ivFOe36+pHRPdh6ichskEz/AD3/AKPrcmUHPcfesJb2gEI7GHOh30CmV+/YqUl1zZVYl3sxB99k4hUzLds7HHk3meO9noLJdjtCpv3qMKdC2JcLsBVudNrdCKXC87s7OLdjiWMZ/JFllyOSMp5cj3CWkXDIYVS0r7uEKUZEesMevHZm4Q3HDEpvnRemBgfL8K77hDHjuLv36o7MWCU/rZlTwoxX+7ma/FmNFd15LIz1p1CnuK/DBXEO+Z/zItzXc5PbmxPaRnUJd6uYyVrSdtoGxdCQvorRvoEamGpucagrYtHi1sjuasYVG40Lnm/c5kbdZ/tYaH7A79ebPZBH3J/LNlupg1vguEQSGCpb2iNvxbXuy3pCcmc3T5ryx8j7qV9WOTaU3rYuegxcS7Fg8WlA+qUFHlV1pjwtXSni6l67gDnD6jMjwujHomI0ptCL1xFJUp3Xd09JcuKO9MLcuyB6EboEhTysG9K9rsZegxRuaVPV0t0wpSk9IxZ+aXu6DQ7Rr98iciBswHuhqCGxXKVPkwv7DDA/s9Peff4EYTZHmO8v8TxyQcggzsWk/wBhqd1GVPVgawrVQp0rbTWUwK5RyKuZD+4+bpC6ZCPaB36w2mPf3xgGdq5w1f0CS+o+inauhAl9lK25xi5QSf8AZiZ2TWV8py+8mM90RHtnbbmey6hbRyK9Uey60b9UhD1Mxvb1qlz2jL37vlvO8p1nBNX3mCE1ZVeSYETVlV5ZcWbxK97+2Azdcb9F9KFFP5D7WdKD6ZnL/lTPaGzPulvV+ia3LiwZfGS5bLqUl6ly5ZLlsIFLlsuXLagy5TLZcGdCKl5bUIK855S3WEtHjkXnQvRCFXiCl1E3mM3mIHMZD3aLN+s8ow665cuKXL1vRYYewT6n+16rnF+lhH3JLh6ed/cPN9VHPnZ5tb3FLol63wO0uXLly5cuXKS5cuXLhL4QeCtLly4MxBNDFy5cuUhF6ly5elzwlwZcuXoIKEJEQpCBy8XbFdY98YYYYvvLly5cuXpcWLwX20uD+8nf1BkYZePNvmYo5mAo6CmjsaH0VkuXLl6FS9FsvialkxLZcvgs47l6sTGl8NkGtAy5ely5cIGeHATt1WWHdL1Ll5dF4l1LJcWXwWS0vgXHP0FltDRZcGA4bIaD3lstlsXrLJfGaXLly5fDely+AXLlkHS5ZLJZFlks4DXrK9Z5za54A6Vy4sHQxcsg6EuW6Ll639FZbwXqXLly5f0jguXwkXS/oiyXwsGDLlksl6rLeE9dL0Dpei5cvgX2i42ly4xel6Xwr4eTL4bdbNbly5cuXLl6rgpGL0MrBZbL7yyXwXAb2Y9WoFx1bPlrQMckQ+siRLc1NbLS5fD81vLlUwXgdSq6RuZvHdSe+lwdR0uXBlxoMG7VEu6Rps5JcaY2oG8RyXDf89vfce4x6YZd0aD3jQ3MxDTsHdly4N6fqLUW8pg86TbsaLIwkqQu4hkthHo1F0XLjgwZcXWyXrcvhs4l4KlcLtpcuXLfpHeXLly5ei2XEfv7JjA/+fER+shMjRLyHGrz8Ok9rPiULcIQMpN5dnryYPWL+sk7qvmAWi5QIQigEIXvCb8NbvLxWUTkQXlM9ewSgpvWUZ2Anp8simvqS6Am0svPZ2e0s1bfVlVnLRCzaFEXaylh53QoLpgcnkQpI+Libc5NCE2u+zGUQPwkV4Ssi7A9YcerY3QJSsao7H1O1AM+CUpW1ltzWiA3GNlbWAMH75d7UNy8ah3puO1IvN7+sJz7DKwVLRI9qGy389udr0e9+5lk877kz72YymvaSp6Z8yKSbY6WUILoYdTOcS6TcYHeA1vFAjB1b1fgAKXzqmEPit72D54GV1i5Dm2w9q8yx1v59ZXR6z9l1T9z1RvguXwWw0eKkeBlpFvhuXLl/XJetzwnhwKZcX6/JGnbnX9N37rpf2xe2bemMIc5u+2CZX+pVWnxLXdHKUl2akcfa1mt3SD8Z7AnuloDewLHzHo8qE9CXS32ilW9A3XoMFe7h90ro5M9D/jpT1/odt6yk/dxLqMzGVCut75PbFaPJ9kZ0Z7vtFMwxfX66N6AhZbePvjWc/f25U9L931HGUa5rGRxZUZ+nd/1FabDOnoD8lWnJEk0il2ogOULf3ipxGfsdiZ882zcHu4jBQO6V51hT9N1T9z1cbw3xFs4bi6bynrCXpcuXLly5cvhsly+CyXKa2cDqj9mK7NxeOIYv2QZAKt1D7sceUPuJ54ea689AsnV5xzv0mnrkkcOlTsBfbGY+0GnqxnPSDxY7Ra8t9Qg7szbbbzXnGZU3j+ItX7wJ5C3FucA2n+8XuOTcHPOXhNkxJIZa67oRG0TlJBS3d46Q8exxYDgtCLbgIm4tSlkDak0HYMxr3Cg3N2yWmZCy92IEiLCDVk8iVGp92daww3h6VhLehgaOPaw1H4AIhz50ZWhTpad7nnDN3mStG6EJTZ3mtlO+eTHyEElBsWrUAm/m4N4l9QjUjy5IHlogu7quk3RTA55QxYDxLJ0Q/WGZyfEcurXfaMkTp8X0QDEeyw9qSqmML8QLCNfeQqkl8NfRXLLcLwtpZL4Lly5cuXxXL1Vvid+K+K9Ll6r1uXp40qVwI2afdY3tGZQp0l41eC5f0L+mst4VjwVw0ly+O+G5ctlsvW4suDLJcWXB0uXrcuXwXL+pet8N/xL4bOkuXpcM8braDLlkslkslkWXLl8VyzW/o2aWzeV3hpZxWSyLLJZoutweC4PC62fTsjw3LS+G+C4sOC5cvhvhsly4ui+FuZly9GXx28F8FnASmi2XL0JfBcuXh1vhvhpKReC5cXU1vhV0qZiykt4SUzPXiuX9FdVw4PXS9L1Ll6Zl1LlxZ6s9WXxZmdb+lfDcvgrW+G5fDy4VLxw3L4Lly5fFcHS5fBei4suXBly9Cy5cuXLlwly9a4iXLlfQuXoarRLS3C641rhWWzfhXhXMTHG1Ma3wO8NLXgvguXBJehL1HrMSgjUuX9J4bl8F8dsXhvR0vjWoOHgzLJSL9OtL4rl8Vy+J+lcuXpWtcNy5eqwdb+i7s9XQjL4d+FcQYsXhWvoK1xwWdZZ1ly5cvQlkWXLly+K+C4Oty7Pp3Fl63Ll6Og/Rs4l/TuXwXLl8K8ZoNTymXTEGXL1vhvXOl8A/wAt+hcpFs4L4w7cNJbK1WXKcN/Q5aWlRKirRely5cuXxXLly+J24TiuXwXx28dweEuXosvS5fEtReC9NovBcviOG5cGLfDcvgrR4mXrejwjLgy5cuXBeku9bly9Liy+/G8WJjQIkrRRPWepDS5cWMHDoMucq4b+gcF6XLgx+hcx9BIHAcJUUdr3Ng6tO8IeMYlkd7no6V5/mbrr5ry9Ame6j+utzf75Hl68C/4c/TJ+6R/4xOj8cf8ADnR9sn+WT94jnfghnzODowPRmSvH7u07H7u0el+7tHv/ALdp2v1dpT/x+Ef8BE9l8I8Cef8AZvjyC/EYK7k0/MRFHc31a2m38BdaxwGl6Z4bJ6cd/RvT5f2zkfE3w69eWfY0WLL0dtEkUROUU0e8dki6Md4dnetPKYEVd7iy4uOPVm5THmxcOfSLhM43WKQs/wBy/Wsy/LwdjTb58R1bvHfFF70uX3/8O5cuXL4KlfR/e9J2ztN6OMr8q4rl49ai5m0vGmOc+9RcPSO1aOCKRXnWnrHa49sxfHXS1t3dmo7LbLE784xjzRR43Tf8suzkTIoq2ei5R5TeiBJtu0+b9YeE4rPo2SyWcFks1uXooSyCzPC+f9srrdpgs5RvvBd9BqLPzGLhzjksuvapcvEvvej2Zdb9l63l5xYqHPfMdL7s9vWKS/UIsuWeA2qJ+YnOK9d4ty7xFX8IqJmqMTtUXfFeZ1sc8oqtfWNuat8DTWTDxWcFkviW+GzW/o39F1rgWtX63pP2ZvRj09pmfGixhic9o7qTHOcvXM5qzlGLOpHR2Ytr8S52z3mRzSXFqF/nSXoG9RVM672cpmBXnPdi57Zp5k/14N22GzwjPjypQ2X9IVaw4rft/UyMzk6jkrrpfk8Ky+G9afo39O5fEqQ4FlstlvDc+V9s/Zmyn35sRf8AsI8yXFyzOty4sFYs66L+XaXMWzNb8sTsLxcXc9I1ynZX29Zbqiso+zfbftDp9qqKL3wdopnGKT7i31WL2vq7+5ff5id5+h07p0kDLBKZei0YyHK7FbXm0xKvpovbDQzBJ8vW+E4r43jslkvisly2C8FktlvDZwGdEu145zfC3W4ixmXC5e/broMWdLl8/jTl07xXvF5Zi6LvzjF3PeO8X16Re8tb0uhc2Z944vX63AlLqOB+9d9Lv6ZGUoxeWiBVBvANsX0Ltlg9Oa/EclxfKb0aBPz3KK+Csgxqngrjsl8Vy9Fy/o2SkpKS5b9EYr1fuuk/ahyzr9ZZ5aJfT0nOPnG/3IPfR7zm6L9p2OuZ4uMiysvGIxc+nKLFjto8xl+jK7RLRqtbbzy3vC7y6HY0+9pjp9+F4SmCGdKS9VvqxUkV36DN9Lm5NvtPgz5nAHAcd/ReG5cuXw3pcuX9HHFt2fE3gnzsFmYg3oJ86vg0H/l6Lovec7qLhixiOs9LvlEYAQdw2+7sgIxn5DT787+sE9/TcFAidXltGT2uqKMfF7emjyV1J8fGsfqPE6P0L1LeO9L4LOKyWafrukr4y+cYmHVOhOum/WVDdevWcoxwXL3JffT1i+sWLGO7OfiLmsXlyllfdOj1b4w9W+EW9/TO9MK3HgxrmxsyFK2vgwfoHvoxELHro/nfxMytLJTVvlM/QzpmZ46JWpcYEo0939qc6CmJuZivMq9Ol1Oa/MJcYdtd+7tO+5FxHLPtNk2i/rH2gxcfXqGkYHsXsh233wNPmPgJk2h+5jsdqXNYgA7tgFo6h1lgBlHBpX2rZj7hTM0vtiM2FxbNs987ywpUnNNTYKOHNO2J0O103+0WgQIECl7beuWCJ4MwKz0VeQdUG7VlaOQd5kam/oVvzHfm9p+NNp3+gwZ14rlQ1WXwLxMOO9bg/RvT970kdSddJ7r2nLw4iy+kvnXm9L+Ytg3L3JeO1QdLl5ZeYty+867s7faL7XnlLjm1vvDvvWibjeiSZHopV/pPOFdn3RjH3TwQr5hDhoDXqRDyQcm2MeWDszEsXXTvUXHimP3pcxd31ODVY8BOuXpAvca7ts2dmyEEAyKzcOatHpY5qk35T5Riyxl0kZC59SPKOPhT5HHfG8N6HgK4DSiUfx8S7/bDsRZXoR8kWIdIJmpnnEy+7FxFi9/eXiemecvEGLpyZd1H35baO6NHfrBdOz1rK3e4rVW3Rjd6QMHc4Z7O3eECNfJqb3+IrvNkLMNTBaJ/aOOmQhPJa3K/4gEbNCqqY8GGZjS+3RyU7/1mX1gGY+BFnryK/BhqLArHLdHlpiaKfVwK0POGUTFukyzm/wBFnK95k/E3vp2cSy3irhPpX9A470Vs1nE3zu+esVnpF05p1Om+rpyqb3d+2IuA/rRd/vObv3uP39iPSs940mfmbDXuxycZ6TCfPPliFxR2LGDJuGMg5FWrqyEj3g78rebEKdx8perH1QbR0xHvvoxqwB6mCelMb5aUZFuIyfdhIcvdGLAun3hW3tDBmLXYHGPMpQGrLQBbrngRSI53Utbn9ybzGJPJOXzFn3HSLUu/rW8BKlaEuDwY4Lly5cuXLl9pcuXL0WeHHu/3iLTd5dsTHf8A7CFpsS+lxeXPmwZyzHBHEdt6ljqWmO+rm7zaB87/ABLr3lXiU+7t+F012+Z112hxcsyrL3zEmQTJTG0H3XdgK4Q9s61FbqMA3klydwybel6MN4SNO0MJqmsggImAuwdoaErBKSymAShQDVICnSwCJ3a2WrvA9x+9cfJy3mKZs8ifE3m99Z+icN8dks4rJZFK47IstLn6LpOEL3K5c5waa95vHd7txapFL0dL/f8AkdvW8zrTLdZ3m7tfmLh5Zl9WPP8AE2OZzjvX5ltFyFXMSn4WbWanduH2TRA3cwJqVK4KhwDrTvR1HqhK/dAcv715vdXebs5L6nDmv6FnCcZD+AtQeEi1LJZoNDUzt+JTNZzTGdph6YsH1ezqYMnZuXP753Flm99sR2/ufgnRF6Ee7cWLZ6Tt8VKi31Y5L9o2H8E3/oFSLOcV+nuTbltzF2CJaignfMeQNuizmjltN9Juzk69dPv8Ny+C9T6AfQv6HJl/SuVKhLly9BJ2b45TBa3bgr13me7Uubu5oTwT9do95yrtyht9ouenieY9sYi3bqxY7/MatW/CVF3SKdS8HWde0QQK2zth9UdmgvN6+8fJTNvpN2SmtWEa9sZ3o+52BL5P87m+58umDlpfRMl5mwvqT4U3uC/4AaEOcNWW8aty0t0JUZcuEqVKlaW8Fx1CbAy7R574flHydIu/vLxc7wcX8S8vnMuLW/hmXZ+MaXh0Le0WzMWli+eaL/yKp3Gpkub47c3RsaywJ5q5/ZORyYkvoD5uhy7JtLZbLekt6S3pLekJl3DOEXVcp7tgdByH4CHkETaJsHJ9HdtYuAm9qPH20VtHaezNzzLl6B/ANQ0XwXCUjFsvhZbofReD302yeeMTFp0j7d+UXXWizOax1g3Fjt1PiO1rGb45xWLHao4bARZheYP4qWmysvx6xf3/ALNx9a6xWL885lTdMZ4FhqDn/XKHXXfDXo/2ZvGnSPAW4LZTG9ZuXX9/TE3fBBPxnrt7Q+QbYq+o6+bwTZ+CoNffMdHg95vzf8xeRTgwD64dZibmgIIOEzpnQ4XZ4DgfoXLmMN2YpUIt2mG7zNvxUaCMwcyDo1/efvF9PEfRY46xfFdI+LYy8+NpZ1m+/TZZYHO9F3q7jWdu7G/8vlH1794isZzyi4+8URjYJfLb0lm0b1/6d5bvQj7ppD84Qz3gqe6CfAd/s95jfw3H7DLAKgnjbvLr1zLDpG0qLDUy3zB+Y8Hk0bc+ssGzUnKECCNxVy0tLl8QsuXL+hcvhesrYuOUtcY/CerNh7svefoR7RdV3l21Ot1btGbfdvmxemKl7nXnUX1lVXXpUWo71N27CP8AUVPxHb42ixd69Uj29941hv2CLf7S+sHtGzf77xwJlLK5dJbVddyJcHLpuxSPlFbIrU29kYD2ZvfRslkuWlrA1CBAga0da4ss0xqy/prly5ety5bLilKHRsJPPO+anJwD05xz/wB5zYx7RrTwvUnrcLz8z47acy+8ZdTOS886nr3m3QzAbReu6ykVbwy3PeuUy9+ehLjz9oYtrARinN7Rd/aXzyxI1t5jVJn+4eNop+JN+buq5hf0m5xjcuo6hcCtKhAgQNSuiM7UuXwXpetcCxb+saHVg9DesTc837RD/a46m4vXbT2GDvPMedp46z1vlPXGi1O+b6xYudki4+xyIo1zwc5l0vvF3+Y7OWnERmP3x5jzLmPCnrGu3WLXeo4895tdBiLV4er+8op6XRNhv1IRb9XzbGKsQcpsZvjk85nv43+C9C8bfQgQIOG8Viu3DetSptLJZLIsviuXwesrhe7fiIvUYeWVixiwfY5zpljvqwN/iLjscjS92Mx3Ri82LkL8x5v22i6nDuzyU7VFjoRY9MY3i1Nt7+Iqifd2ji457JfPY56DcVeveLlGpfdcRcuz4zUuri4l4dsxlsx5zkjYlnLS3GGoQINDBwVszpIy2ji65aZmdDgX6WeAlEo0zwndjAYxKKFhrjza7RaLl0b+8X0uLW/uzDHTnsviDeUOuJt963g8+fzOuWN1WU8usoubxf8AZtFU2EczI39paM3OT0Lu+8v8zvd4x3i7E2trF4m/7EwHlei9OnpHs52nvnrOV1f2nzWmxqbGYObzqifB+gAWUakIEqBwlN0ZbaHjhhbF6BAg/W7br/mPoOz9F4CV9HPvTT0cpyy+cdlPieSQRWo9x2xFXbMuh39pynz5lza52fKzC74OhMYbxr++kd+tzZXXBLvMtC9+UX/ksd773vFvv2l49Ory3m45lBy91xSmc9gn/G067f1FzeLeccXyV83oO2ORo4P6ucnFc9sXo38eulvHefGnyuI1BKlSoEDhTXWM8EVyX8Hpd3m9BmLcKoZ4vsDisln0L4iWSzislks0WqyaZNX4qPu8EzBU7lE2nXHtCk5s3i02q2Xr3rO8A5xRYcr9opsYL2Tl/cvl8Ra287Rxzue/eJY1jo3M9N855xaeb+Y3273L8vxFvE2Xz33uXSm/jRu6PWLN6ZRm06zYdpvcIVpWgQIGgcA1YtlEWD0sA7wwzqdv97zD7zRqDW5cWLWyXBly3WpWp9C+Jbt53Ju7IuXJfKbJK2x/VxeWjgm3X8scfAonoaPe3njm6duvuxpx1xHr1i96DtGMc/7ynN7Zdo8+uJ1pxH4j4XpMft+dCxTH2mBUv84jDOcO8XLQekWruNjHi2LF8vaXux9B7TN/HXQ+RJyvSfM0C4ENAgQIEDQMeB612dMMGGbrOJsPXYEwemzPb/2+lcOGpUv6LB+hdTJg4Ry76/iWjfOoM5R7bdt9LZgPll8veUzSddou5LM0mcQQeU93vccDlP2tpcW3t1uO9dt+UVc5az0jZd8o7O851z40bi1zNnP9xQKqLn0j2JufdHnvXePxyn9bY0dGbXTVC7k+BD70CbQIEqBBAgaXblmkzEW0SsYblBzYePfl1Lstj1YNb5eZ9Tdd36DL460v6N/RFw3aKzU3b8RN/PWd42lrlttDG7pYHjMd32jbabHzLl4eTL6xbG02livTrUXaLnnXSNIlRmwjvcd+hzm5vHa/Qnlt2jwzoelz7MbRYfiYvxHfEfXHX7y963TpF7bsXKdJd7decvnylxcL3iiyn35y+SK/HN3QgQIIDDiB0qzkkRIEpLtnrtB8vInPtBm3e+79czK/iLLdDLP8VN8N98WFZqOl1t7GL5vlL54vkEWuo/HON5IVeHvhnY5YqXF/yN5vC9Iqi3u+ai1/w2i9osX3eU6covPn/Us+JbsQ47R8vWM+6L3M5idnav8Ak/WusWiHF3UdszmxZ6e+g8Oly+Z8CZuEFIQH0ASRHkxVYiv5y5OgGWWf3hMO0cWoeXq/xb0uXLlxZcuXLlmlsNLlxwlndiPefdzMydpa3svbpL9cbRep1HebX81OY9WK/wARjeZ9/MuzDMNm/XaUmP8AgEWWnKI7dKuZqdV1cvL2rrLVjTvl6T0VUXfmXzZRvzeSYispZ+/Ijv06x5tsZ7xu2zYi740aCbJdLCX885gj6veb9ae2jznwGb0ogQ0Bp+xotyiLa4jjmgEOO6I14d5EX4rL8HI9j6hwYly5cviuDw3ossl8R37eWc8VrpeesRXVqN88zkxOvLEGvTN8579XG0Xx1zL7PWeisxnatvzOvjnG65dIu9VHAhKIt7ncmxyS6x2iqNbf1F9ieN+s8M6nFY6zZ2ycovqso5958HPzObt+CLZ9ozYnu89tHtL+ME6Ir6Sbk3KYSOWGgNaXRIoiBZESoAtxr5c4PG8NdWoWXsvkwAUFB/Av6Fy+O+M4M591tDe85qVemX+IpTa+YpmYPjMXFZfHrBu/ttUwOkXutL3/AKjRvVHrFrG0vAOXNl9CvvOvaXdfMejFnN33qLstudVit/zFFe+0Xt0uX69+ssuL95cXvzi3iLL9EvmsuD055m2bx2i5puHo7wV4mboaV3lF0LOTKwpjGzGGTr0Oq7B3YUa9zb/M+CGaiqo/k3x3retca1Xv2jfstIq7bnyy2s7s3Le0845wfTxFD+47Rv09Jd36bM9B5y8X7Ra3cx9HreivwVHcSwX/AGpZW7jO/wDUWY8kYWiLce6sRSvbaO79vS4uJ+OkudcX1zF9tGY23/EW8rTo5J5JzG1Q0zdJZLZtkLHe0PqenTvB3+vCu2yekFH/ACGXuu693+Bf0b+helxb4L4btZ7aLgDdUtl8yp8DTdnBMXDnTt22i5Z2Pvv4Je2f1l4bi739p2dulxbHuZZz5N7Vz8RaGotZ/wDE55rPSLh59LzNiPxyIuHLF9Ol9Ziui/EW92+0evUuYJ5v8xV31POhLizrF36E8vmXtoXHj+5vaGIRe8j+g0kG1x8Kp3sB76YghvXT1dvouXhvaW3VM/wlRPrnGcK4b6NW8+5UNGTTvFlhyxUdt+sZ2p/qFeTlLvpd9J3Hpc9jlcPD13nKLR1694sW1/cTDds6dYqRDZLdOe0J4vy/aLR37xA3nEXMW+/9sXryjac3HbvF9Zaldrl57decX7R7u0dsy5YzC4vx0i9iLjcit6XJF54dtb/am9Kc4Tlk5ZevT1jg3qv9IR1c+H94/wAZrgzwL9LKP0CYduSw8XOb0uevyqIq2ukPv0xLjZUrtLmaxXmLkpe2Ytrv4xLrpfWWpzoMxXTljO7LaZb+Y1Hfb8zdevNi4zs6b8zwafEXwBHzz3raL28R2hy6wccgi71mfvmL7XFxvcvMvE5vyx3ZfeMzNHCvJPmp1HH4h7kAMeR4hTD/AH3L0qGgnoffr/HqVKlQNWUQ08pWp9M4Krvqai3itcsxY2zL3TxiXLaHHhl97n3vvLrHgxaXv5l8npPGwzcXlcX42jvk2xF3toe83evpcRW55eftHE2diWXzxveKl+lxb5eM4IrfGa2mzrmK26qO37vHQy7JcUuneXiXMXctbFXq2jrpGqKx2exZfP1gShokHQD+Q6Fa0cFSojKZToRJTrUqVoplMB6TPB9+3OrOpzbir9baXjFdtLTFz1nZHumjttF6dMTIFK5mwxbnwf3F6fgIu4NXv1mevmsxTD0Jyd3qxYv25c2LcCeB17ToypFNyOmDmL0RmTGfGj2nWJr+0xc/6xbdnafsOn8qMmhgwYlRNRnylapiVA0p0UaVLQJWmesIypjPcRfOBunP7zur3mBWO8Wb+ucE2tm+1uUv0CX05EvvX9EdnO5yVb6miLfefYnOL08YiM1F7W6O2ebzEZ+Odx2aMXnF++e0udYuHsT4dIvbM956xrPOtMSnK5s0PJ5/lG1XlLJQ6rqVGESmoxUSGhUxMTEqVKlSpWlQInBcgu33Im1t0FmDN6jwM1U92JfO3HVmArYV7yw51941V1g9dBsK8y8ukz3P33ileNqluarpHH36xwy+kX3ekWjcx8RcVv2u51x7MWjkZmPNHWLv7u0tErepyxFX8R59N4ms6XseJZXxL3r11z29Ys3HRO8cMpbjnmbfp/ItQZ/JJfxpWKw3i/l93Qwytl9DxgK0MHAbFcIVKlSphJb7ukTmumP7lUc8xYxz5zecl9pdc2d1FZj1r/kHmO+ZcvnbF2N4cxcf0covL7TF16EulbMOsX7xwbTsi9jx2irYz/cbc2PfrtUzltuXYjHN/j5j/cwM36xWxezGYi2sdmXELFx2I2+ly89sTu93bl/G1PeVty3QMqB3th5XyYnZF8292O46KPGGWXRZeJt0SK0VGK8OVKlQJgpu3tt6zez2LmCLZvg785ZyefrLfXn1mcv2ZfR5iC1375i1KVcVOuI88QP2jXQtJ26RcbHpiLkTfeookMfgj26eI+V6TqxdyvEXDFcWPvopO+8uXTDMWcnQx4dHYeT7z57+JqBlVkgd1lH+y7b5/Jom4TC2nY5B2JQIUczuwiwCSwhCHKOOzOzENDCpeKI9kC8pWU6aKccBwPaMecXI9z3juMPXpblYrtBg9XHLuzZhsf1zg/8AUj6b+kvGel1tP99e8vf0xUb545Q3OUt+PEWdd6emLiv5inXblG7XdItD0YjzNotG1xCoZpio5RoljFLzOT8T2l32l1tv3l7xTrVGqx4ZuTM/hiYkIqAbrGIuy6378/gjMjb/AE06tsa8WmYxRJdLp6GM/wBMz5vR/aFfMcoLf59cjMdG4U+zBSORTc2YZ2Y3JOiiRcZXngy5wmxaLdJaPCEns1/KIjK9I3OCyM6yV/tmcucb7++ZeeZHfmRcdfEOwoJdOOcs3Vl3Li9qjZzPnxzjzEefyi5dt9iLhOV5l5i0fEXcqKVOb3lz1zF5vyxS4vvsS8vaL+Is68wbzmWZi71FJZMibk3Ztir53fl/BJV370SP247eWiPy39cdsqB2NiWFrESrLLl6zux4D087/wBiSwevn+xmZ7ORgFqOQt8RfNLr8e0xCu+LHuYlhHZuGvvLNgxsys9anXoLnhzZj10euj10eoipfoxfRlujwFI0NSybAJZ2ztvcW+imvmDmOzvXmptzCZPXEuL28S2klvT15TrotDWPEUHQihy6E+8W78xYpU36Z5Retddtp6x0uKPOMXTk+MxdOdcCNzS35tjH9LH19QTeyq9Vt6mEh3HEdN1+JiSjoiti/my94cBfpMA7uD903ydyfvSfHZ/us+HWH2M3nbFPkU/Xn942SWbhvP7LPuSH2Je92r/1D+2E+8f+Giu1/E7IXN4XFv8AE/aQpi8qyhQekEV3wbSjB7jriYqwrlFucn1uK8pNm99I+b6RcPmsRFJ61PsQdsq8Qc9M8jM8buhc3F3e/eKe+cR31kXPXvFj3lr92Xm8eal27xhYq6+sWPPaX3i5cvNm/AuY7RxZTfm2zzJ9gez9QVcAL5yEeW0FF89tz3n0om0VW3Fki4tY7eWd/RYYYWL/ABPaHBnyBX+p88M37uPaM/qBH8OJP9fSbE1H/e/Ofk0nNsbvk3onywxMWbzXn02/M/XWKHKLnLy1nlvsTfOVzLZN+U5sXm2veG7GNou/XbebpgvvPRjHPV+YpGo+uIOaxKB+Y+TUWiO+0wut9GLFp5nad2LW25rjRl86myPKbs+wmPco9vpKgRUA3WHiYq4t02IYy6tsdJm8vYI1rUbmnflvOdydyOlXQf8AwDbJrdviV27T9yIp022l5b3GL3i/fBP65waO/iXuyzoq9pk7+CcvPSLiviNbG3WKTt94veu5Ocwb89Ld48+feMWe5HH74ixSyXHOodL61fSXrbs+5M+/9j6CoVo2GHqwgj45R8s+ghTh/rQz6mXlDRyjNzEbmMt5bpN46RlYw5Mv/wADZB7UY2Mxc62oNXF74MdyDaxXWmG7xH03lvXtLwz7bsWrnL13nKWLnMdzvF6c+s3jzdZt1qpf2nPHWeI4VRd45yxj+9jS5cXTKEvS9GbWb83RhxcOShNx28QywCf0f1H9sTdF/YhgihuXcNxkb1KsjpWWGGGF/wDC2SeAXTpNnhHdue0Th/UWL/25ZzYtylY3ZbHXk/3Bvvi7/uXX9RWmvSKee28eRzLxe3SLe/rmKTc28Rcr8wfXzLG5vFisXlcxTFz9r13Liy4suXF0ZgRuzf5z4xfpqqMsC1dghrxdID32oY3uXztr0CZBzo+csznGWGYiuZ3mXXosssMLFiy+C5f8/bNYijfC486JCZYJeHFY5zZv8S+a5aefP9zbQ5fiXRO3vOrHWORzlrPWPN3nxW5cu9o6OFNzui6J1zoY5OBcPBs02M3Zuh3XJox23vSuZ6b/AOD/AGyyLfedfpwykhhy6E6piFuL7zpN9BdBlZcWML/4/d3VDczM+5G5wYtLt0Ivf8RvKLjrzTlOr0zcuXnBtL71mXFyvpUfFdolj3Fxd+bcUBrrFmIvXeLHdjGNTaXOsuKXLxWtxdF3aLym7ymXlxCXkY88CKmljCWibzH6y3QZdBlYsuLL/wDJZKvAi9COpd7pe8XrvcvF38c5Z9/Glj1c95Zt6dJvZvfSXTeCYYM+dPPsRq9+8eZFaXBXPpNjpa/TlL5+uMxb5xX0NF7/ANary3HfqTFMtd9b1YuU3u2lv8puHnGRtg+Irz0Elo6Rlhe8uU6xS+G//G9NwuoeWO9pM4vxLA325S/WL1m/TE5adjMfXxF/J5ixaIu+/Wc2OOjjW75RHmxjF9Lj0XGfmIJ6yLuzfzpcuXn0m8XfTbN+b/KY+VCngfaMvdGUSkuXHQYWXL1v/wAhfiJuEee20dOedvaX3HtLO5L7Z9gnt5imbds5nlHv0i+hL5xehMdfWpt0Yxd2LWh+Bl3F37dYu/SLfeMuLy94zlFl63F4Ru8p81MB4faMssXLl5m5lpegxdL/APKlZVq8R1G/F113l7xbl1uzbz0qeiTPdOkWWL9vWLnlZOYPMXvXmct7ixYTz0i3GOIMfMVQuMWXPXRYsuLL4LmFzemOR3iugnL6EdBhi4xcuW6Wf+ZhKmHJ1dZQXp8ekVQsd+/KWhFh3xejLxL+MZiX/Y7b++i9J1+7FE694sXlNl6F7xYv4jSXctLiw4l63jRuXhi3d8Czne035uPOgP7EWMLosvgv69ZRnIx7XU3M/R3yUwFHXVn2RhxY9vhrfEoTpz7OCXf91N4IlmTQ/j7kDuqTKdzMU9XfaXj0w/vKHczk6L/yLmukwjKRSy/8j/Q3FIzHBFjF5RYsYsWOLwutx202juDyzMeYmD4EWXMcD/CJASAbRXg0CGyh6mJUY/YAfeZPt5fyXNs+afeOy7u58Q/dreSe3TMZfbk/fPb7/JnxL79HH0B6N3TloMdlRQvaLhg75ti40HRsRYt97yy8z+mYscRmdb5ehNosUUUizeXF1XS9Vm/N+jnZ/q4Llv8AEKm8U5wcfrGDeJLkiNFUGE0q8370y57r+po7I+6/+6n61T1jdpd877PtH9Xpcx/Ef6lkc+Adcz9I/E/YfxP0idP4vxHo9X/mMl2W7gIww6VcecctldR7xcPiXidgti3fOLn+ukXeKr33ix6tu8XeGXGNS9FtdIsYbS2Lv99XPeXGDsasuLL6xYZuTem710z7Bpf8cMJIO+E9+HfDSD6sTrFDdE6sCh1qiS3WC2jqEOrnUYfnh1E7yHVzvp32dxj1ErN8Qy8yDWRqzc8xe9S+vzF6+0XeO1YMxbGUl+ail77suYOZ7suPb31vlHRvmOizZF05MWLHfVgjMbxQdHZm2NzKbk3mAkb/APJJJNM74d0KwggkWggk0hdWW0SbddA5aDl+svHvnnPKP2xliYUM1ME9SPNL7Uk6/MoMGXGbLGzO0XLNjeX0xGZ2lkdV6sefzGMWyeIseBddzo7M2s3JsdbJ8lP6v5JqBgy5aEGmaBpGstBkvLy0HLzuab6raGkavSU0PLEvebsRg3O57diLa+Iv264nUbQcnOZvq9Ju79o+3So872Nus2zF5QZcvRfWXN+/Qi4i9iNMLL1WMXRY6rouu2PJEdo5pv8A8k1BHlrXLgy9Q0PKeXB/OZyyHDhmsV9iY+jYqb8wUeOTB6+Je8545S4uW2YceuZuck5xIv0dOXBy39OkuM/Qjkoin25Ri1FF/wCx4WYzovfpOe2rfFSPeZ7O6bn8myXoMIuXDQJO3UIvQJLlyyWSyXDQvRei48vSY6PiosdaLkeu+8s/q5zS7zibGZjs+cRel+I6MWCLdy7YsWK7S6iixYoh0dF0vvF5aXXBz6W7y0/e/k3pmZmZcuXPWeuly0vSyXDhApSA0LJZL0HckZVpoMdY7VaQIvRd/NRaXEP2jEd4x7bxNuervOuI3GXF3em8vnFb0WXFi6MuLmKLDTMzNouJkOhyeZ83Nz+bcuXx3Lly/oDLly5cvQJRD0Jz0xUVeiKbS4NS4LL7+0Y3B3pT02n+l/E/1H4nR/Z4jm3/AC/EJvZygvjA+YkVqeV4jo9b7x9I6uq99GMWXerwOu+ROv5P/iJLly5cslkslkslks+iq7UD4C66S5p5MMc3L0uXNllpaEIEezz0ZY7XmKzAPjQGfoyHeGl6qOxOa+NyW7JQw+YsRiKK2m8uXLxGLjouil6CaOqnPN03k2vZ/wDXCOoB+qsF/eJJfe0TV25zf20aHVmFfSMfXssumizLNvgX3fBHPf7+Ru9joRbLe0/Ohl6Ol63F0XRZj58/Qcxm1jzN55/9nDae7BWN+tcorkKhWV8QYaXvDQ+UARRPV2h+2fef4H5T+3P+kf377y0GVCC/RRx6xLK6dosgHNfemPr3vrNxjt66Mv08xes6vPXbR0vU4GObHR8yfB/9h2oi6sVHnkczNxlY6QSXFxHb+peiDmYi5uYm9ECVf3RUCYdH93IOqxZrp2xX9EXNXdc+sYsuPSMdsauhQl54LhL1Ojy0fM/9i83mxAR4B6Tezd+ZgacljR1mxPEO/wATbmXYe28/tOD/AG23bzhuPaIBbuldjt90uh/rlLYsvRRekuOixeN4d+MJ1Mky/wDXQb6AFRhQecx9pvv1ny3tHylwdGlyEQrZK6CY9sp5Jjeh4I4XF0Wc49o6ui6rhhxuTpvx3mL5H/sEEdd6BdW+yK31XWrLN+kr1z0h2T00Gd0691EHsD6XBjJ9svtH+th/6+EcfJhvnYiY6/gI7jo1HS8/aP35xjuujPXSmt6sGKGi403fEY3HmfJz7Z/6xGk4R7dpuaPbE+qiL1iAowhBELqCg0uczdng5I9ubEQtwKOQP6I1d50h/wCtP9mP/VlZOcbZ/qH8ovDY9zevmDL/AN02N7ix0YrUWorxLB0eF5RZmA0P7Z/CQjcvmHlStkp2ZeFTLeN+IupIzFHeUhf+Eb6IFXj0ZvTBYMXdR+2yv9XCXI8pNnvO1/XvpVn36M8MnaGJqUdDQeN2bShlXbRojFF5JI8B2cu44ZVWchQjo5auj0dHiLx8WPJpv2D+EWCrNpeGBJrRQPLr/wCGb6YFXoKOcsdzOWVMj7JA26rewR/RPvGAPJkds/TrCK2DKBcIFml6A2BlPLMwoBlYb+hVaOY6rOxGLGOhz0XV1dN6byKh6T5CfYP/AFjfRFgeeP2os9dcHyv3qHJgqdsJuyHlewgUjabKEyyp3mJ2+sq4tE5xKGMYxEGK+OmlnCR31dXgv5BPlJ9g/hXbguSpegqy1ACF9yVF7XZDuDDGA5WCU0/+EbzCuQq6vZHzrm/TWGMQdVly46gALEE6lkewlS6E6RgjkLRVm+nroxVo8FVHjZs09j0nzc3+n8J9+LdxbQBWyIxbZgMewGE7k3p4kOVX1/8ACN9MGAb40cI2MeyDoOIxZzaOqRLSNlcmK2KvsT9py4Dof4Fxzam16aZ9r/1jeYSBAV0zN+K52Y0WkBgz68iD9yV+/l8TJtEeVDC9Pea2XuVu8C34Uj3tml7nU7kdOszxt2rqwXWy0X/Wq+LgpTopiP0B1UY/RbZu9JvJ96n9H8ISvqgQ3wR9WBoB6f8Aif06Bd+PETHRz50iKn3o+4vjaP3Y7/dTL/Rh/wAROZE62Map9WJ9oNOiZY8c13Eiqx6WntHxZ92tDA0f6/M0R++++lxlxe8vTaLo7zZHjuMdmbWbvSbWnf0fwk1p6Gbi73Y2DkxcMDLK6KS90h8R82QT/wAQgePLAx3OcuorbyN+8d4zbFWPOLN/bxV/6c4iWWcnTd+2aSV93s/5lCHN7eSbOIdzxle5Xael1774Y36Laqcrj4SfPffVYx1Y6LF0vR4lqbWbvTSfKT7B/wCvjAsS+kU75tnXvFOnKMl+Sdn9vMOjMyCUAO9BL1KDeyUwqhuu6O3Hwf7j14vUNMg0jVequjtLjF4HRdyP09vBBvsH8/CfbtL7EMn8iAgOY7euoeB4Xf7aL0jpcdHRdFi6sfoOm3Q3RjN9k/hM9wSq0KHYhRuiEpUyrVW2LO5CW9Q8A4wy5ZCf0JtOAd4R3MxQMTG5x/rmWaBlnWWSyWSyWTuEElnWWRBzJ2/vP9eH/Xn+tDn+9O1h/wBKf60QYHJvBM7s3Js0TQXU4tdg5vb5JXLPfns/dho969b04SXt1f0g+ZQKtq4XpfJ7NMbI6DZKA08rgczLqx+d80SukUzwPA6OvXgdSPAN0Z+REPoNLlml8Xrx1ksRWbuWXUF6KORPeVWlStPBB2IQ9PYmOj2hTintD5xNojC8LXAQNG0cswOxAgdiXJKku59hAbpdSP2T9GN2uP8Aj39E/EHPjlCB2/o8ic9eQm1v5Gbe4fvH9psRePxwL9z4gO36Xafv/FP1/gip+17Rfd/P448EtoNz3ojud2PT7nfaETtR5eb6spWapGB6Ef8AjMp/CwNyT1IkXvtyvr+YqWUo7j0Gw8wNR3Pavu/Mh3e5sl1DHodTP1e8+T+7wXZwVw36K3pu+gz8iU/W2j4J6ETSokSBHhSVPWIEdtE1s4CECWSkzey1e+038PUXwWxOe3M+9J9y0fgm397/AHsx8cFYQdDE33zKh9fH9/OfKRW2PNxwWzBWdWHn5iyoouWbj/bRsoY3YpdLzzzi6ZAp532eUxPpj/16S8Oxd5SxMp4oPZg6E+SxZtZHwk+W+7HR0OFs0Y6ut6bNNsd5ujDyI3623BUDV4DCOlaK3dlyqtRbXAArEZtqrlqMt7pN2oMrKR4dhXBBaF632QoVrmXw3lbEdbTDLcxKp7UIFXj+/feWm7+Rh+/nKhYec3MdjoPFgXaB0vnBft+Jb9PxCaJAroG02NaXCaDzPzvDm88R9oH9P9TnMDa7F+03t5sdEw72aOrwV4r1XLTbHebo9RhP03SMeJ4a0d4R2lJ0537TrCpEEYf4e5XBQ71JFFT4UZDXDVl22C+z4nI/TaexLJZCXLJZLJZLJZLJZLJZLJZLJZLJZLJZLJZLJZLJc/R9cT26KWKgwlioRrpcPbUcp7Fo35VHF+w4zvL+nUoDcC5hDE8s16XVFBA0umyqZlsNxHJy83eBYVAofPJ6yw8+wNZLzt6wVulv5KXlWMsLcLugydGe86ECXQrvJhvxF6aLRpy05ujFqLR1eHzvw1uj5CfpukdXeMCMdtXUjvDRMxNHeH/g/u+uUeJHl6ak1bBXsTHjEGBWSuDwSzMHezvc/wCyG/B0lM7WQKMgGFtnMHXZlKahctoqrZkp30vvrOsvWVtvpCsxIc4troP7IWcsmiVp317LlspUJ+VjvS5UGU0XS8htezNjeXnumEVMWPE7sZufSdN7xGbjTCfvbcNcNE5akSG0YSyh5htg+HRhrj+bsn6zrmY1rZqBKm8212i6V3lRi8Dpy0d2ddF+i6bHxGbyfOT9904nVhOXAa3VVe3NVfiA6xpnysqqbg5fw7dLJZLJZLJZLikslksn6frn2vWZWmTOmMolif10hcuXHR0dHRjq7xjHgPA8LptfGjE6J++6auWiau2u7V2hpyjFJKw+7lVClFY2lh3LK9uBy+gn6CcAaVcy44I9D7FVCxz1M/RPqr9fnnd5YqbsRr7cbHV21dWEWLn6DFlNVlzYxm3EA90/bdNHJ1dpzlTlru1doR0Zz4DguXLl1byWqhsjQm4Bu+MK9zIAZKLL5ETTBrmKQWrdWKNJBHQ2qCeI3rsXq2dY2shcn4yIYlReL3lh7Dy9AZHKtVAy1LaXUKb8swvgOQhq0gRuz6JK4v1XXHhMFN8eI6VvwDHgWO0caLo7av0nfV2jps1b00ftumh215P0TtCOjHR30OC5feX3htFf3Hx7LX0lXW72qV5dGO83lwZjqsuGXtdmUyvMKIsyQiCNM2nSz3lmdYl5d63jN05W74R4b39jEiu8suZ7CcS7xiOJt+84tf8AAc+seSVC9rxCtgXHIxL7owZyRuZdCBGXwLL0dHRjGNPPR4HS4s3a3HTa6DchRrKUHWGrdwD7Sr4OTxJqnAqhRyRXQCbhjIhPmUMK3qjsl4YdzmOppcvQPBcuXLlyyWS5cuXL+pttMpPs0H2m73zNrbyvzAPy/wAx/wC9/Mt/N/M/3n5h/wBz+Yf9n+Z/o/zH/qfzP9T+Z/sfzP8AT/mB/l/mW/gfzP8ABfzP9l+Z/svzP8h/Mf8AsPzP9B+Y/wDWfmf4z+ZufbfzP8Z/M/xX8wqfsv5n+G/mX5/N+Zf/AG/Mv/p+Y/qfzLf7fmX5/L+Zf/X8x/Y/mH638w/Wx/WxH/VP0WEyuyadczMvC7cTs8TlFr1KWq9kWpsKQUZc5+vcBqw08Z46l9oM8NQ4gCLly9MaYmNMTEJcthi9KbzwDLH3Xi39xhBP76z9wfeD/n/mf6+f7fQ/+tn+hn+hn+hn+xn+zn+zn+zh/wBvD/u/zP8AcT/d/mf7v8wb8n8wH8n8z/V/mf6v8z/Yz/a/mf7/APM6fu/zL9n7/wAzqe4/M/1n5n+s/M/0P5nee78z/Qfmf6D8z/Ufmf6j8z/Qfmf9Y/MR2f8AfeP67+5++3zFuyosB9dpfWxrN3dh9Kn7b62b+qWOTV21O3EdoTZq7ujoR2dbIVoAq3BMFwwz3RY6gPInrEJh58bgOwlT72W8RlhLAaoWetFzMDdY+qQ06HfBpUOWFgIHN4AIExoIo5ESg1BYeBt5SjHlzgGpmOd11LleyjNcDZs5lLgAhFKbqauDRaWJUsuH6RBWg7x1ThUgysWmP82ao0AWJjFzv60zbYXZzWXn7YJ+KWz451UakWUZ8JYa9jE3H+xfCyLyOu/sHMvtLMEUEpHpLiMrg9l3Dcil5mEcvQTDMCVAuVK0qJCpj+DXBWrAmDFfhjpStvvBmfFzR+72qW/S3yn5cDwbtXaGq4xvY37XaR8rLe19CeEdTS5cuXL7z3UC0Adu5DmJbrYi027/ADbzyWsU6qDpwiysOL71DFfe0IzyIrKDROHZaq2a5f1/gWEsAvqqUQ972e1cd+sApij1sr5HeDS1q+agIq0F3VAMYxvkBAClQMqyc/zcpX+WwJZ3SA7Kg2XaqL3surYYPuarfFlBPI2jH1arXKKKvZGHztAqARS4yMdwXFsIBlaKAhbvlBNLzApFOxzW3HqoFYutBaw51/13haFhjRj6WYVrWdElEqU6KZX1KIRqYlcJOWfAjqS9F4dy3HI+kerPyMn6bSlx2Xsdnpvq67tVhq/SDY3cukqpWbt8aoUrW8CNosuXLly5zlvBUHnFHvP3KepubWg9ejgfVNrXSuW7pYznHOMerWpAptRcS2GMWetBj0Yut7umGfNFPuwEs39dzxOhWBq/Eej2nwi6eAJk4r/030Mz1eYF32iLs9UPJNsT105AKxiP4hUL0bq3Y3i+ZRWC5dxhPdiVssrkV0IWq8DbFtlLGa1q9ugHBabEMWlwo2EC2dW5XfkU863N3F1FqBFJwCAW2DcN+NyPcVWjZql13f42m7QZ4aCHH1nRyT4+iXouXOZ/2vQlYnnn7Hhm51Q6f++nGeDlpevLSzULdi/EMXtJ37Tcf8B7sV6KovYohjdDyE/mK2p3mBWwQ0NFamlaENR0JmHDvOyB/BdmBZwEvRWalB9Nm+cs+PKii3tLZcslkuV/Xc4+UICRefb8fcQd+zT2i63DPA8fgSHb0ianhI9WXYL1v+KBIu3+LUgZvQhtDHAOgtamg3rcGXqtc1PPUdmty+C9+0NByn0AqZgaN8pUUyrMyvpM3zlnwdatl6XLZbLZe9sHw/6hczFZfZvk9mXqc4urvHiy1eqWvrDaXxhoQ4WzgkYOl6mt7XDQalKLRZ1esO4Bht/QTaAdAZG3tAy+qiyvaiVIb2oBcW1DXuuCsx2YL6QnaDTHSWRBmkZKgKndqPuuiAQNFtst89FQMldyGIcY7NFi39QjN03E+PFFcuXLly4ugigwtXwdyZmB3d95vsxSG1TPojDQ0d9XhNCGhDiDDR6Gl0Qg6mlwdN+e1rdjEE3gOZJVlXtLjKb01cfaS9GPm83pmz1b3L8E3XtPWpf+kNTHeVarip9ie8D93MQNklyvEArXwQ4TSyLj67N03k+PHUF6lmiyWSyXL0YwC5L8p2Y+Es654c0uEduA8I8Alw0GiDwGg6DiHBcNcy5cGb/AlWmfehrd0B3/AHy7FocBag9CH7Xjlge7+pBeXIouOtoRQlJSIiCX9GyWSyWSyWSyXobzeRe3HBet6l3peosoLAoFj5IbIPd+8cvKNNmq5XRNFi4xuEHiGGIMJcuEIMGDoUuXN5cJepova8cEpAHSFQEsa8Z1nNzStFrf/rOZ+hzfiU4AR7b7j++Yk49SCHHfO+KUR3/gX2hGGl8OOoblksly5SXGL4hcTSoPoPR2nrb5LzyeznR4b0GDLxL1XLgy9DUS4oMuDBhBovUQMs0ht8FWS6nP7JzWnqSv+MrEP+Uy+7q5YoWodXd8ESk9a8sGXF832lWSa1JboSyXL4L1vjYTdPhxVEOqJwZYMNC5epjlyOxhdWZXP6nmKy48Q1NyCVoMHhvMuDoG9b1zBg6EEWQ0HEWcNrxouOFc4mgom1QHe6qr9J/rEP8AtEf+8RW3fHLFaoq83gMEWHKJYF7premePOty5el6ZmdHRuIvYikvpFly5cuXLlxZcvvLjqCjdtwbm5seT7nvMMvd0S/oEKDBhquDB0UGDoMuXwLl6jBm7qNvm2XpZLOsOJeJ4L+jcPoG4nx4q1JcuXxmXwAdFzHUP2+exhcr+0tntwLwmk0OEhoZm2o34TgJv6z75t03FdDlO1h0sIgFBwe5ahuK/pANpf5EOwT20NX+Kcs+NqCy4MuPG8BweNU8MVLIeXfzq7z/xAAoEQADAAEEAwADAQACAwEAAAAAAREQICEwMUBBUFFgYXGBsZGhwXD/2gAIAQIBAT8Q13NKUpS64QhNU5YTlhMUpfl3CGQnh0uaXXCcNLrvkXwtmV+iYSF56E4bpmmj10um+BS6LwqJxjyPv7jk4g9VJw1QkeJKJplQ2kJH710pS+NddLhaaXTS+LePtGRBCR7wCwBPuYMr2Gx9oaIt1Bqj7oeJZtyHOCxOpW9jrTCeDdKITSuCl46XmWpcHaIW6OU2FWLtirtgrOuo0F33KEG/c9h1OsbvKM3NxYSmtjp+RNCXDCcNL5b4CVsc3SFGxrFXPxCiPMkE9wFvRdwnrBb7WJg8/VJ2kG1s9eFCExeRPjpfGuVhpG8XDyJ7MiHXQm0T2LbCU3xFDdwad3H+ERnQ7yKUpczFLx3D8Kl1sWmlLoQxsnp5S+HS5pcwhCakQnHS8l5rml8Gl5aUpfHpfBpc0T10vmPXS66XjgtNLw0vLeSl0rRS6r4sxNUJw0uaUpdbF8NcN1TwXxQmWLBvVMWBF4MkkAEkkEgWYA9AAFguOSCYAQX8i/kLAF/Iv5H9D+hfyP6F/Iv5H9C/lkD/AEX8i/kf0L+R/Q/qf1P6H9C/kR9lUE4srF4qXC45jqi2JSRmBKTjOKUkSkEkWiSmRQiJpYRoQSEhhcLznxv4692i5Wql10pS8N0OCm/sM0Xso/3YaWHgi+jsRc9b4kv+QsarM98ZXdsJlvYuYKp2saVUE5LvhxF/1D1CPag9X2o2Ee43LYkOe6hNw2COz3tiRsJr2WIQodmQLu8mRbpiXthtIVYmhCf9NmVHscxi6m/heXZF7TZDTessGaRwXuiKvRCZVHdA9F4qXlpdbadF2ldhhkO1suz+SqHaH9cN6/aL/kzdGKl2MYhdUinbSCXL0DrXahpCojKaoq3HSo/GD037R0VfoppqZCCDQaJOOh4DGEz0JTkEGdTZIQ+yCYHLo1LDw7tOCK7osQYJKPdjcoff2Jl75NbGoNoLcct7MeKXvYyQbXRwVFqeJD3foalOloHrz2wLZju/+Dldy/0mujO4DZO7mKqKRqa+xGkvQM3fY5W6Q5JqwdtObWlwymilLoXKN0n7N85BqEx3CdE7YmkRLUhXLYS+0mrg+ptzcgpt2K9t2W0bl22pQVZHRVoatPsbDRUOiExV/IXtEiCjSdIh3YxcNpUh+EWA7NFdY3liQ+jC2D+VEuehS1ID9ls0uWtC4aXMIQnCh4WKbgbCipaQ3VDdGIbGwQ9oKJREuvY0aB/gG2yEqbZsUbL2GjSTPwIu0EbmJIiCNKIobuezs7NHRBpbGT9EHSD6QKdDembAuhLCnVhKGWmyCMik9C6IJUEFCGtVHdozYxuVIkRCUBM9G3h/gNzSFvkd2KdhSIduehEsQhhytC8tyoUxTwR1cH6sdKXDEagLQC5uzdqxJhAkGmgRkgjSJWNzNLy0pSlLppcpXc2+EvpVwqKrLl3TKX0T+FUBV6wQAAAFPo0kLcXjpcXF4pmE5IQnmwmVqpddLzrRS8twxaIQhCEIQhOWaJphNU1vkpfBWU/CXizEJmEw8QmIQhCcc5ZpXG8zwl4cJiEIQhCEGicM0zXMvyKJELx2HJQLD0FrXewxwapiE1QhCEFhTkCMmVqDSRNv/wA416mNYxV+GSaehsF9m5EINYtoVmZkhp7H7oiL2PsQ9MNVw0up8uwb87RXOhLMxCCZF0bQWlqKwLHZWCbFz2PtEveISTNxvQ6a7Z/MCn1sKoVi/AkJjnRmUp9G16Aw0df0qIhBkL5uj6FFfYbh1t5tTTeSE5JfTFHe8egb27LthuCbDyuzZaKB0GUSI2zo1XWxNuq7CFqNtLsUolKMadzFvF/0QQ7OIXdzI71/wglpF3sdlIklVLjqr/gtPr2WzcLe7snG2heYe8JRt/8ApJHtEgqllECrXsKkMMPqVNFj6o52NuXY9wHuwSR3f6JNpE0uyoYgjYCaZCNHHVEI9nXY3ENooHBWtDLBnbsfaPaOuuyghsZ8dURcwrwLddKNsiazdudhd8K4kLWmif8AMFUGv/okUjcmhKiK7rdjeKF9B9pEIxW9rsUwUkukOKg9fwogplDArdDEm48nZOoZCsHP6BREjZyjQ17jddFzGnpZseLbv+4Dc/8Ao2yx2f6XD/uY95uCpiQhjwk7/wDRamysfRIOhrHRY4TKV0LiNlhNpCTKEC2jlE0xtC3oaE7aE7BL6FBfc6E7rNuhS26+uVCoRfgiEJgQPWn8jce1QntnTGHpLcDtrCr64FkbG2LRPgS3HePA9J4E9hiYdGP5DapBYRj+BuBxN9mwJ7j7QsJN/wDp0xsf/TYmf97HaYojPWWo2OTXoS9D9iENgbcqumyQ7xdh9YW3RwE4dBe8almxs3Zg9BAES+M7TXcbxsyWkm0dtoh2Q4t2hK7X5RSnbO0f5JhYPVj7IJYq3F9kkyw2iuK6fsSlAm7EqQsC2C1QhwbYKPdY/pRVEK49lKa4YgBajcG4j/3RLY/9x/8A0sIsN7JVRpCpD/7gmSHRdM/0EQg6y9CXbkGoOmvQxVN6LsQ3o8aDjUldIhPRZRaUxWpiyEJOSKwQlGRShfzXCDqEeSRNiIY4BXGLIik417RdkMVCxJh0gsmNiIuUyKhC29LifunrabMOPyJkI2hQ+sP9GIoxLEVGJSUTJjirr8iGUbew1UDN49jqJ3r/AM4kUnW9G7mPaL+v/wCnVI7pL/oom4qjf/BedY9/2jsQ9IoX/wAiUokOajWw7jse6FfZtSbURVGpDaMo3dgl+xtwhybgjiixHvDLUe0xNqMX0J2P6CMK04WqBIgWGoRbDaFOgjcKO4Sp0pcegOuQ3ejYpp27H8BF0Nx/gX7Qp0phEsZO1FFSvsqm5uTRv6QmWKQQTp2g2hBj6TbxuY9ygixepuIQyPrcqxsN9KoY6Ktx6Rs7VPzIWItcHdoXpQw46EsSp4tzpToMn6NgSPsIk3ESLjYReiUNqLDrAkWu6ZpTLl4RSi5KJlKUpS5jKyVpwiyiitPFhjFhhl8c8Hg2UujoLdu4R6J77m8F1J6HiEHrWaUpSlKUomUpSlKUuKXQUpS4IXQ0VjetdS6gpc0uLmlP+CGL04aXmvi0pSlKXFKIXQpcUpSlKUpSlKUpSlKUpcLFxdL0XF10uul1LE46XTS8VytNLopSlKUpSlKUpdFLhYuaXmpeJPwlrRMd61TYsLoTKUpSlLjoQpRsbwpdz2XF03F82i8Ja4ps3yZB2NfdaW1Y9h9GS1aG9dGFGm/m+mw2NZrM1FUzvBSFLm8V1UvNedcTbMYIi5dIdj6PzcHqS6N57YlYG2Z3EUxFJHd6DX+TDR70pGqL4E20awuBaiaGgbM7LPCm5kb86ZNT7EoiD9mO6job/iUEEsWL0zS66UpdNLovDcXwUUpS6fcWyy2L0xozLkk0Rr8HQFM4x1Z3C1rKzDM9nbsHY7lap1aFp2O0OiMYbg3BVTcxRU7RVXo3qHuJju2OT0faNoKUlh9PBpeG6qXnpddLlayHsoo9kYpYLfMbIX1m5myC+mOYe4+wlUIe26jH9g9gXhK51XF+5eudpF2Q3r8BEht+AqlsPgIBLYGvF8di2A1rKkKweoj3rpddL5d5KXSi+s7m7IPcTwqzbHRGJIp0N10XZ2qJ1Cf5HRMHToxWUpaXFFBRdC3UY6zvTS66Xy7m+PS8ywmXzqXnhOOl8ul4kPK4V4VL8Gl0whS6aXTSl4qXXMUpS8tLqui+HS+DS+BeGE00pfApdV8WlKXjpeGlzeW4hMXRS+HS6L4dG+OlKXyaUpdVLpvOuOeDS8tKUvlzTc0vyboubpXkUvLSl+ZSl5l5VLwNEITBDZRvjTL5dLruvoWVoubil8daKUeX4FKXXS8dLrpcTS9hbi4KXkXJNFZSkIQhCcNZubm5vwV6IQ3Nys300uaXRdD0sXLSlLpTKUvEiPRJA/OVAxr/AIAAAIlpgpAtALZpdUyvCpdd1MWijFhfKELCFpvPSl8Wl0LUsC+QhYQvEuml4LrpeXovmIRdTFwXnpS6KUpeWEOi+BeJYQtU1XFL8CE19Fhefc0umlOwutEFoWH5lKXRCaqJjZ0WF501zT2F1oupsvgUvHCEJy9FhfDWtcGjLyUvweqwvhrWsWLNKJ8lLx0pS6aUpdC4KdULsWFilKUpdK4kSY7ZV7KvRvHHlUnaKdmxi7F0IeV2dRYvNS6aXnhCE0LTSlx1QuxclKLRSlLmtFEiITlxH7LWBaKrO0Jb1YrtvYJUvQ9SXsibkJDyuzqMvPCcNLyUpeXowvFWXqY5AxskPkGuLrAonoeyn4DYlKIh7RCzgnTB5XYui+FS89KUuJy3HRheKhCNzsZLqEIQ/t2O1DT+yHLR72R7QqL0Hqol7CdWLyuxdYnwLzXX1R78ZZVsVY9whYhlL9Ir7GJ7G3GO6YNsJ74TX7j94Vl1L6E0TPRHvxkLG/YJqQaOGbSIekTgpdCFiWHB9EFSGkgO1etfGpSlLy9FqpSl8W66UulC4aXwaXwaXh6LFLx0pSlKUpS8L5ELTS/LpdPVeHNS8P2dM0vl0pS6qUuaUpdNKdUe/CupFLx0pS59nQpfh0uml4+qPfy+x18Wl+D1R7+Wuzr82l4eqPfn0pSlLmlz7F15tKUvNOHqj38v2dPJpcrTSl4Lw0p1R7+X7OnwKXgpdM4OqPfy/Z08i+HCYuLr6vmezpy0vC4KeLeLq+Z7OnjOB1xXUs3TS6+iPfy/Z08R8JS8K1UvD1XzPZ010vG9Rmq5ReCl4qdEe/l+zpppeNsevc3RMUuql5IdEe/l+zpilLxoYfKXi3R0R7+X7OnDS6Gxm8y8WaOiPfy/Z05WG+Wl1UpeGiYxaVjoj38v2LrTS6KMN+HSl47hcPVHv5fsXXC2PwlKXkuJpv0nsXRRPSw/B0peea5ovzns9YWKNj+DuVquvr8z2ei4Yfj6XhTxMpZYi8HQ9/L9nouN8ql1LKyuFaOnzEX4NKtTFqnB0/SEPNLrTG9NL+v6XUs0v6PQQpcLWuW/pNIRmlFKUvPP0qoLUvMr7yCCWlYEKXFLy0pS4pS6K+4sHrTCaqCKCUqL4N+8WAiE8CiFl4rQNKUpSlKXTf2FgzCITzaK0CiivsIopfsC/YTKIowmhfrSCKySxP1pIQSJiEEv1xCE0Qn677F1+x+xdfsfsXX7H7F1+x+xdeat/oz2LrzFwvRkf3fYuvMWZphsbERFz/mbj5ns9ebCePCfNez1+x/Z6/Y/sXX7H9i6+mtNfL9i6+otFfL9i6/Q9L5/sXX7H9i6+xXy/YuvsV8v2Lr7FfL9i6+xXy/YuvsF8v2Lr7BfL9i6+wXy/YuvDomL4ZfL9i68KERRfDL5fs6fYL5fs6eE8C/T3sXXhPCv097F14Swl8NvmexdeE2IW/DX5nsXXhNE+KrlhPN9nT7FctL5vs6edeeZmaXRXy/YuvCeFrhCEGGITEIQhCEITSqUggpcV8v2LrxCzSkIREWIIfoSL0QQRfgiHPZLA0+h/wAn+B8DvUpSl+YuxNsTTCEJphMTTSaVhy7EWNB+sbBt9lCNxiIjY2J9ZdnQmVzNlE9Mg1jWN/SGy5f1c0QS0s95Tf8A/M1friOnAuJiYvFhP0aWpBMLxoQhCEIQhCE+iNC4FrmF8J/M9aJ4ZNN8CE4YQhCE5WThhPg+tE8UWmalggtS81DcsC0gRAl4AqiCSc1Il4QVVgggggjXVRIzeitHehcaGhLWvNswSkEEE4pSSSSSSSSSSSSSSRKSTr/kkkkkkkkkkkjGAjSXLea8CxsiIS9M/wALC3FHTFGqREQ3oWYTTCEIQhCEIQhCEIMWYQhCEIQhCE1NCB/g+RjLzTVMJsNttDGzEUmxLXGbFjhhGEEyiKEHnIbUe/m9YTZ72B1xsYlxb5oVieewhfk8NEhLoVPoSDUUFBvwTAYpCHY0JAz6ukyxpp9H+8C5IJwwICSJItsJieLRbaVlN5grb9BWpDOhbvF1LhTsVCQkTgWUUv2lcMBD5HmIpVxLK10v1FcSbWK8T4lrX3dCGQnBAViXDS8C1rVS/W0EiEJwpzh14SzS8N+94iaHR3xrNzS6Fml4Z9H3XCalUU5qXStVKLRSlKUv6DxMeqi8JaKX9F7F4F+j61FqfCsLP//EACMRAAMAAgIDAQEBAQEBAAAAAAABERAgMEAhMVBgQVFhcNH/2gAIAQMBAT8Q5qXScTEsTZsuLw0utL06XhpN5h7Qm9LpMzjQ8UpcUuF16Xp0vHSi2uLmi0Swlma0pSlL0aXa8NLvS8lGLCeYTW8LxFCFIEUpSlwTGxCl5UPelKXWl4aXp0uJyziFK0deg3EKlHI8ueiH0/sKpGHDawnqHPdEJpN6X4qykLFLw3FLm6Txg86lngfoEmi/6XQnaMdsepLKeYxK3W1+cxdWlLjzQkhbB4icjCZssj1guRn8osRIEi9Ol470KXNJi5eT3pcrFLxe8einkSSGkxTH9pVcqzyJNl+DN6XjhdXzrM4qUpSl1pSl4aUpeel4rxrR4maXEJw0vZhCE1peelKUpeGlLzQmEsUuZz0vw73qXRZWFi9W8F4aUpcripSl+DS7NixOa7XhnRpTyeSM860pWXNZcJlEUpSlKUpRa3NxOKca6lL0kiMjPJGTa7QmFmEx40WszCbrSC4lshlLy0pSlKUuFuxCGwxxqPwLySEqqUcH8jfgTYVh7F8lw/ZRoRaJwZBPwew/AnSYmE8NiF4x7E4NwtyxaXDwhBMWFi8yc6KUpSl0Ybx8RxOISoeKEjzSRQQgxMfsnkpRiUZRRez2JQoxiYl4yOKskzNUfgWYQmWGhoRQsLKHlcEJml6F0RcNYpwdZILBYhLzhDBaNlELC5WGyjG/GDCFhBicPLHplYP2N5RSlKLFFm5XJS9CYuEISEI9kghEo/KhZoQS0aEIXEyliEGTwMIImaRM9aTCxBEwpCYTxBIhCduE3gil3ClKXNKUpSlKUTKXcylKUpcLhuKXlpcLNL2Fl4pd4QhMzCEITKxCCQxCcQAuFLEIQhCcMITal40xspSlKUpSlKUYuSYo2JjYmXWb0ulKUu0JmEyxcSKXnhOjCZhCEITSl2mtKUpSlzSl0nFS5vGuWlzS7LNLmlKXFFhMpcUuiRNqXCwt7il3Q3m7UvDS4uaUvFS8CITWEEhlxSizcTSl2uTFKUpRa0vLS892ml45hC8heLleSwpcURdUJFFvMUpS4vUyKCePvMaQXrCtbxskFqhKRH+I4H5E8j+FL16XCF4C83KcPebh6UuE8UpdRWORiCCRI0GLzpIgyc9ISpUUsJxghRMpRNiZS5TC1WgTqwn5D9cdLzXLGFii4phsPMwQMMqxf3xizLfI3f8AAnpRHkF+LDhGzwYNJBz8TE8oVsNhZ4IflilhIQwhIQmE9kGLFKJi3W952Jnk8j0TgSyswoqRkpYNUgIonnwPHENUxgMoIY3kSYW/JDyJRfIdlYFg/ZcQ/mSwnjRE3WiFmlyulOJrlMWEsPCHst2LIpYiyRsmCz7F41/ghiGylKJ0TmaXNKUvCsLCFlZu90cfLYexPApBvyfwvnFxQxhZgo2V6E/Ihi0lFmYuEMsE7rcMTGXLBDpioYshC0QtFlhsWGLBjDKTWl1UTKYq6J0hO0L5wlktEwTsdYPLGiyvInRWxMILDKKLmjYmWi8Fg0Ys5k1QlDX9E8Ac/gVryEh/sEq+GIkwSiQTl4LBClP4Uobb2jQnH5HxBRQ8OGCUy1j2REREf0nnKHGJCbQgUzAosTSERFmYmEmPLO2GDLcMDJek8cgohB4Ds9YS4sahhQmwSFhCCQoQJLdRj8Z+GJJCiH2YQhNLpNYQhN5mEIQhCYPgUiCKKCEREQhCZhNFo9CRfzRxS9mEzS6TN6F2hCExCEJoEthGRkJrNFovA0mS/aFHro3EJ14TaCxCbwmYQm8J2KXlQ9Eil6sJvcLSE5Jwrim87t7q2WF2KUvxoQnRfAt1hEJ1biE3pfjLkRC91aQnx6Upd6XC5EUmrF8Ol+LSlLrS8t2pe/S/n6Upf/M6UpeGl+HCZpSl+PS/VpcwhCaXt0vPSlL8+lKUpc0pS8NKUpSlKUuk+pcTu0pSkJyX6NLiE6q/SL83Sl+JS/GuUXhpeOfiKXEylwUvTpSl0vSWLvS60pSlLmlKUpRYpSlzS8tL3b0IQgliEIQhCEIQhCEIQhCEJkhCEITaEIQhCfMXCvmIXzkUu6+YhdmE/FP9I+zMUuaUpSl3ukJuvmvtXlpdJxr5r6dL04TMIQmsJ8lS4Wj56XWE6LEMX1i0feuaLN4V8E2Q8e2VMSqK4Rog7CMUbglRE36Gm3/S/wAPAvPsbhbo+Ol44TNLiZgi6UpSlLhFL339EW7/AMCAfpCb7GIfuwhPfWRXD0OLzSa6l7QvBXmNK4vRCnyeB5J6ev8Ao2gMPo+Gl55lYul1hCE2WtL2Dzfz3BUfQxeIcW3grjyK7BPU8g5IeSvL/wCiW02mMvaz+uk8j0b/AOBjHsvW4peOE2mEXFLiZhOFbTsnn4ohrEPSxjf7EOv/ACFlwiN4/gL3EWrN/BzTTYtdKptbBrtl4GKLo9Z3IThRBi1eL2Cwo/aEfJoZXi80d289lgJDP/gew3gxe+6J4DnbHlCe0lT/ABeDPzKeM6IsYepi6VLvS884XidctElE/BYnflHiT8jZ+WLPjvSE3LC/EX+FrQ8VxkZYz+6f0ARCZW3XsxdyE44TKKUuYTtoTqPhhOjCdG4hMT6R6wmtL21908zWlL1YTgpS/aPS5vSuIQhCl1vQSwvnUvZhOGcq0ovxUJ+FfzqJ8VKUvLCfVTx0oQW1L07w35q+NYQmEuG49HshenCZm1LifNTxpNEuKY9knSn3y5FpdoL8WhBcUILSaQmq3nDS/ZJcK44TVb3e4hPrv5l8CysQnSS/Av5vNoLEIQnFNIL8E/m9zSlyuOEw8zqrK+gsQmy53rOksLK+guFcqy/xRcMJ8GE+wW6RPgwhfrP5il2XwYTM+sQ+2uSE518xZnaXFOivmLvrZZXQXzGLtwnAumvw00mJpSlKLWE/ILhlKUpeBa38evdn58vx5bQmFmEITViyvwa7wnEudaL712hNoQmZwXK4V964Q83khNCEITC2hCEF9u5hBEzOxCEIQhCfYpS8cJ+Upcz89S6reE/J0pd1+auqGXE/NXZDJi/mP5yQn5f+aImtL+bWl/QLWft6Upf0tKUpSlKX9LS6UpcEKUpSlKUv4m7Qn51NqX9GhCEITVi1miwvxFL1oJEFhfioTiuVqs3Ji/KzRaLRLK/RLC/RLC/RLC/RLC/RLC57+TWFyUuJ+TWF+iWF+iWFxQhCfPYvirC2pfqzK+Glhc1L+TTwuaE+axfFWF9xiL8RYX3p8RYXBS/BXrpr4qwvlL1018VYW6IQhPpwnw1hbr8NOqsLdfWXDS5SHilKUutLxrC+hSlKUpS8t2Q3hSsjKIyytAjCExCbrdfD/g8UWKXsrQEpERZvRW64F31iE6dZGLGu5LSExCZhCd56LiWFs8pDwLC7i0pcUpS4pe89FxIgls/hrihPgPC4V85fLeFwrRC1XRvTWUUovifwfvCytlotKXpTprKIQfAu5/B+8LK2WixSkJ3aXW4Xy3pBYut7tKUpSl4JhYpSl+L/ADWixNLut6XuqoNx5KUpSlKUpSlKUpSlKUpSlKUpSlKUpSlKXJKE3VbrgXw2ULQ+wBn/AIQTog+CSkFPyTRbrdcq3XBMIWk+g8i4kQQuZasQylKIvVyCDKzHqF9CEFwoohc1KiNdVHgXB4KB0JiDCwUhPpzGJotFpeZqeSEzIe8QSx7xMUuJ9ehCEFqszvdPuEILKwsLgnYn3R5LCwhi/PyHssX83LdYmKQvVhPpT7MxSawnRhCE+dPs38ZUvXX4uZS4XPCdNbrgfzZD7P8A/9k=\" style=\"width: 754.722px;\" data-filename=\"695Jv7WNxa.jpg\"></li></ul><h3 class=\"wp-block-heading\" style=\"margin-top: 1.29068em; margin-bottom: 20px; color: rgb(74, 167, 9); font-size: 1.618em; font-weight: 700; font-family: &quot;IBM Plex Sans&quot;;\">Specifications:</h3><ul style=\"margin-bottom: 1.41575em; margin-left: 20px; list-style-type: disc; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\"><li style=\"margin-bottom: 3px;\">Brand: Baseus</li><li style=\"margin-bottom: 3px;\">Name: Power Bank</li><li style=\"margin-bottom: 3px;\">Model: PPADMA</li><li style=\"margin-bottom: 3px;\">Battery capacity: 20000mAh/3.7V 74Wh</li><li style=\"margin-bottom: 3px;\">Rated capacity: 12000mAh</li><li style=\"margin-bottom: 3px;\">Energy conversion rate: ≥ 75%</li><li style=\"margin-bottom: 3px;\">Input<br>iP: 5V 2A,9V 2A Max.<br>Micro: 5V 2A,9V 2A Max.<br>Type-C: 5V/3A 5.5V/3A（SCP） 9V/2A Max.</li><li style=\"margin-bottom: 3px;\">Output</li><li style=\"margin-bottom: 3px;\">USB1: 4.5V 5A,5V 4.5A,5V 3A,9V 2A,12V 1.5A Max.</li><li style=\"margin-bottom: 3px;\">USB2: 4.5V 5A,5V 4.5A,5V 3A,9V 2A,12V 1.5A Max.</li><li style=\"margin-bottom: 3px;\">Type-C: 5V 3A,9V 2A,12V 1.5A Max.</li><li style=\"margin-bottom: 3px;\">USB1+USB2: 5V 3A Max.</li><li style=\"margin-bottom: 3px;\">USB1+Type-C: 5V 3A Max.</li><li style=\"margin-bottom: 3px;\">USB2+Type-C: 5V 3A Max.</li><li style=\"margin-bottom: 3px;\">Type-C+USB1+USB2 Total output power：5V 3A Max.</li><li style=\"margin-bottom: 3px;\"><img src=\"data:image/jpeg;base64,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\" style=\"width: 754.722px;\" data-filename=\"G8DE7STjLf.jpg\"></li></ul><p style=\"margin-bottom: 1.41575em; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\">Not only does this power bank have a large capacity, but it also comes with a smart digital display that shows you the remaining power in real-time! This way, you’ll always know how much juice is left in your bank.</p><p style=\"margin-bottom: 1.41575em; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\">The all-metal shell on this power bank feels luxurious in your hand and gives it a sense of style. It also comes in multiple colors to match your personal taste. And with its upper limit power output, you can be sure that this power bank will quickly charge any device you have.</p><p style=\"margin-bottom: 1.41575em; color: rgb(68, 68, 68); font-family: &quot;IBM Plex Sans&quot;; font-size: 17px;\"><img src=\"data:image/jpeg;base64,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\" style=\"width: 754.722px;\" data-filename=\"acX2JyotwR.jpg\"><br></p>', NULL, '2650', '250', '2050', 1, '2450', 100, NULL, '2023-08-28-64ecdc3888c8a.png', 1, 0, 30, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-08-28 11:41:12', '2023-09-10 17:51:27');
INSERT INTO `products` (`id`, `author_id`, `user_id`, `brand_id`, `slug`, `title`, `short_description`, `full_description`, `spec`, `regular_price`, `whole_price`, `buying_price`, `dis_type`, `discount_price`, `quantity`, `unit`, `image`, `shipping_charge`, `point`, `reach`, `status`, `is_aproved`, `type`, `download_able`, `download_limit`, `download_expire`, `sheba`, `book`, `isbn`, `edition`, `pages`, `country`, `language`, `book_file`, `refer`, `video`, `video_thumb`, `yvideo`, `created_at`, `updated_at`) VALUES
(701, NULL, 1, 293, '69706159778058', 'Huawei Y5 (2019) Software Development', NULL, '<p>Huawei Y5 (2019) Software Development&nbsp;<br></p>', NULL, '1750', '1500', '0', 1, '1500', 95, NULL, '2023-08-29-64edc286323c3.png', 1, 0, 35, 1, 1, 0, 1, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-08-29 04:03:50', '2023-09-10 12:01:56'),
(702, NULL, 1, 295, '848962218007945', 'Samsung Galaxy J7 Back Part - Phone Back Cover', '<p><span style=\"color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; background-color: rgb(247, 247, 248); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Enhance the protection and style of your Samsung Galaxy J7 with our premium Back Part Phone Back Cover. Crafted with precision to fit your device perfectly.<br></span></p>', '<p>Enhance the protection and style of your Samsung Galaxy J7 with our premium Back Part Phone Back Cover. Crafted with precision to fit your device perfectly, this sleek and durable cover shields your phone from scratches, bumps, and everyday wear. Its slim design maintains the phone\'s slim profile while offering full access to ports and buttons. Express your personal style with a range of colors and textures. Elevate your Galaxy J7\'s look and safeguard it in style with our Back Part Phone Back Cover.<br></p>', NULL, '110', '105', '100', 1, NULL, 10, NULL, '2023-09-05-64f793e4da9af.jpg', 1, 0, 15, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-09-05-64f794ac2a0b8.png', NULL, '2023-09-05 14:47:33', '2023-09-11 06:30:11'),
(703, NULL, 1, 293, '116571807278252', 'Cotton Short Sleeve T-Shirt for Women', '<div id=\"module_product_title_1\" class=\"pdp-block module\"><div class=\"pdp-product-title\"><div class=\"pdp-mod-product-badge-wrapper\">মহিলাদের জন্য সুতির ছোট হাতা টি-শার্ট</div></div></div><p></p>', '<div class=\"html-content pdp-product-highlights\" data-spm-anchor-id=\"a2a0e.pdp.product_detail.i0.6db67ac0xWamX9\"><ul class=\"\"><li class=\"\">Product Type: Stylish Half Sleeve T-Shirt For Women</li><li class=\"\">Colour: Pink</li><li class=\"\">Material: Cotton</li><li class=\"\">Gender: Women</li><li class=\"\">Stylish Design</li><li class=\"\">High Quality Cotton Fabric</li><li class=\"\">Fabric: 100% Cotton</li><li class=\"\">Fabrication: 120+ GSM</li></ul></div><p></p>', NULL, '130', '120', '100', 1, NULL, 10, NULL, '2023-09-11-64ff038a46ac3.jpg', 1, 0, 1, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-09-11 06:09:46', '2023-09-11 06:12:23'),
(704, NULL, 1, 293, '524389047792841', 'New Arrivals Women White T Shirt Fashion Belle Bubble Gum', '<p>নতুন আগত মহিলাদের সাদা টি শার্ট ফ্যাশন বেলে বাবল গাম<br></p>', '<p>New Arrivals Women White T Shirt Fashion Belle Bubble Gum<br></p>', NULL, '170', '160', '150', 1, NULL, 10, NULL, '2023-09-11-64ff06f43c8af.jpg', 1, 1700, 1, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-09-11 06:24:20', '2023-09-11 06:31:06'),
(705, NULL, 1, 293, '70314329941904', 'Cotton Short-Sleeved T-Shirt Women′ S Summer Round Neck Loose Large Size Bottoming Shirt', '<p>সুতির খাটো-হাতা টি-শার্ট মহিলাদের গ্রীষ্মকালীন গোল গলা ঢিলেঢালা বড় সাইজের নিচের শার্ট<br></p>', '<p>Cotton Short-Sleeved T-Shirt Women′ S Summer Round Neck Loose Large Size Bottoming Shirt <br></p>', NULL, '530', '520', '500', 1, NULL, 10, NULL, '2023-09-11-64ff08384e9eb.jpg', 1, 0, 2, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-09-11 06:29:44', '2024-01-13 00:08:41'),
(706, NULL, 1, 293, '695440100617689', 'Factory Customized Supply Logo Design Soft Girls High Quality Cheap Unisex T Shirt', '<p>ফ্যাক্টরি কাস্টমাইজড সাপ্লাই লোগো ডিজাইন নরম মেয়েদের উচ্চ মানের সস্তা ইউনিসেক্স টি শার্ট<br></p>', '<p>Factory Customized Supply Logo Design Soft Girls High Quality Cheap Unisex T Shirt<br></p>', NULL, '220', '210', '200', 1, NULL, 10, NULL, '2023-09-11-64ff091550232.jpg', 1, 0, 0, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-09-11 06:33:25', '2023-09-11 06:33:25'),
(707, NULL, 1, 293, '231289214664771', 'SMILE statement t-shirt/shirt tees printed TSHIRT FOR WOMEN', '<p>স্মাইল স্টেটমেন্ট টি-শার্ট/শার্ট টিস প্রিন্ট করা টিশার্ট মহিলাদের জন্য<br></p>', '<p><a rel=\"noopener\" target=\"_blank\" href=\"https://www.lazada.com.ph/products/smile-statement-t-shirtshirt-tees-printed-tshirt-for-women-i3678169125.html\" data-ved=\"0CBIQjhxqFwoTCNjinKnIooEDFQAAAAAdAAAAABAJ\" class=\"gQtke indIKd\"><h3 class=\"MCLffc cS4Vcb-pGL6qe-fwJd0c\">SMILE statement t-shirt/shirt tees printed TSHIRT FOR WOMEN </h3></a></p>', NULL, '140', '130', '120', 1, NULL, 10, NULL, '2023-09-11-64ff096d84850.jpg', 1, 0, 0, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-09-11 06:34:53', '2023-09-11 06:34:53'),
(708, NULL, 1, 293, '630512530465001', 'Zealcafe Instant Tea (Lemon) -500gm', '<p>জিলক্যাফে ইনস্ট্যান্ট চা (লেবু)-500 গ্রাম<br></p>', '<p>Zealcafe Instant Tea (Lemon) -500gm<br></p>', NULL, '135', '130', '125', 1, NULL, 10, NULL, '2023-09-11-64ff0bc522100.png', 1, 0, 1, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-09-11 06:44:53', '2023-09-11 06:45:01'),
(709, NULL, 1, 293, '336811718673058', 'Twinings Pure Camomile Tea Bags 80 Pack-Australia', '<p>টুইনিংস পিওর ক্যামোমাইল টি ব্যাগ 80 প্যাক-অস্ট্রেলিয়া<br></p>', '<p>Twinings Pure Camomile Tea Bags 80 Pack-Australia<br></p>', NULL, '130', '120', '110', 1, NULL, 20, NULL, '2023-09-11-64ff0c11ea3d6.png', 1, 0, 0, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-09-11 06:46:10', '2023-09-11 06:46:10'),
(710, NULL, 1, 293, '137215454653210', 'The Spicy For Red Tea By Arafah -50Gm', '<p>আরাফাহ - ৫০ গ্রাম লাল চায়ের জন্য মশলাদার<br></p>', '<p>The Spicy For Red Tea By Arafah -50Gm<br></p>', NULL, '120', '110', '100', 1, NULL, 10, NULL, '2023-09-11-64ff0c44a1184.png', 1, 0, 0, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-09-11 06:47:00', '2023-09-11 06:47:00'),
(711, NULL, 1, 293, '971506338628169', 'BadgeMilk Tea 15gm- 12PCS ( 4 in 1 Tea- Refresh Cafe )', '<p>ব্যাজ মিল্ক চা 15 গ্রাম- 12 পিসিএস ( 1 টি চা- রিফ্রেশ ক্যাফে )<br></p>', '<p>BadgeMilk Tea 15gm- 12PCS ( 4 in 1 Tea- Refresh Cafe )<br></p>', NULL, '16', '12', '10', 1, NULL, 10, NULL, '2023-09-11-64ff0c76eb4d6.png', 1, 0, 4, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-09-11 06:47:51', '2024-01-12 04:45:51'),
(712, NULL, 1, 293, '755110922357103', 'COFFEE-MATE Coffee Creamer - 1kg', '<p>কফি-মেট কফি ক্রিমার - 1 কেজি<br></p>', '<p>COFFEE-MATE Coffee Creamer - 1kg<br></p>', NULL, '65', '55', '50', 1, NULL, 20, NULL, '2023-09-11-64ff0ca991149.png', 1, 0, 0, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-09-11 06:48:41', '2023-09-11 06:48:41'),
(713, NULL, 1, 293, '364474460397951', 'Mustard Flower Honey 1 kg (Glass Jar) Maag Honey', '<p>সরিষা ফুলের মধু 1 কেজি (গ্লাস জার) মাগ মধু<br></p>', '<p>Mustard Flower Honey 1 kg (Glass Jar) Maag Honey<br></p>', NULL, '35', '30', '25', 1, NULL, 10, NULL, '2023-09-11-64ff0cd658940.png', 1, 0, 0, 1, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-09-11 06:49:26', '2023-09-11 06:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_attri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `color_attri`, `name`, `created_at`, `updated_at`) VALUES
(259, 683, NULL, '2023-08-23-64e5bd9b93943.png', '2023-08-23 02:04:43', '2023-08-23 02:04:43'),
(263, 684, NULL, '2023-08-23-64e5c18e054d3.png', '2023-08-23 02:21:34', '2023-08-23 02:21:34'),
(285, 697, NULL, '2023-08-28-64ec5ad5a8b98.png', '2023-08-28 02:29:09', '2023-08-28 02:29:09'),
(286, 698, NULL, '2023-08-28-64ec766d41a04.png', '2023-08-28 04:26:53', '2023-08-28 04:26:53'),
(287, 698, NULL, '2023-08-28-64ec766d4878b.png', '2023-08-28 04:26:53', '2023-08-28 04:26:53'),
(288, 698, NULL, '2023-08-28-64ec766d4c42f.png', '2023-08-28 04:26:53', '2023-08-28 04:26:53'),
(289, 698, 'black', '2023-08-28-64ec766d4e719.png', '2023-08-28 04:26:53', '2023-08-28 04:26:53'),
(290, 683, NULL, '2023-08-28-64ec8515a97f8.png', '2023-08-28 05:29:25', '2023-08-28 05:29:25'),
(291, 683, NULL, '2023-08-28-64ec8515af75a.png', '2023-08-28 05:29:25', '2023-08-28 05:29:25'),
(292, 683, NULL, '2023-08-28-64ec8515b07d1.png', '2023-08-28 05:29:25', '2023-08-28 05:29:25'),
(293, 683, NULL, '2023-08-28-64ec8515b38a1.png', '2023-08-28 05:29:25', '2023-08-28 05:29:25'),
(297, 683, NULL, '2023-08-28-64ec8590b4464.png', '2023-08-28 05:31:28', '2023-08-28 05:31:28'),
(301, 683, 'orange', '2023-08-28-64ec867d87db6.png', '2023-08-28 05:35:25', '2023-08-28 05:35:25'),
(302, 683, 'black', '2023-08-28-64ec867d8b7c0.png', '2023-08-28 05:35:25', '2023-08-28 05:35:25'),
(310, 684, NULL, '2023-08-28-64ec8a6eeee49.png', '2023-08-28 05:52:14', '2023-08-28 05:52:14'),
(311, 684, NULL, '2023-08-28-64ec8a6ef18a2.png', '2023-08-28 05:52:14', '2023-08-28 05:52:14'),
(312, 684, NULL, '2023-08-28-64ec8a6ef3f98.png', '2023-08-28 05:52:15', '2023-08-28 05:52:15'),
(313, 684, NULL, '2023-08-28-64ec8a6f00cf8.png', '2023-08-28 05:52:15', '2023-08-28 05:52:15'),
(314, 684, NULL, '2023-08-28-64ec8a6f01c01.png', '2023-08-28 05:52:15', '2023-08-28 05:52:15'),
(315, 684, NULL, '2023-08-28-64ec8a6f029a5.png', '2023-08-28 05:52:15', '2023-08-28 05:52:15'),
(316, 684, NULL, '2023-08-28-64ec8a6f03832.png', '2023-08-28 05:52:15', '2023-08-28 05:52:15'),
(327, 700, NULL, '2023-08-28-64ecdc395513d.png', '2023-08-28 11:41:13', '2023-08-28 11:41:13'),
(328, 700, NULL, '2023-08-28-64ecdc39569fb.png', '2023-08-28 11:41:13', '2023-08-28 11:41:13'),
(329, 700, NULL, '2023-08-28-64ecdc3957ddb.png', '2023-08-28 11:41:13', '2023-08-28 11:41:13'),
(330, 700, NULL, '2023-08-28-64ecdc39591d8.png', '2023-08-28 11:41:13', '2023-08-28 11:41:13'),
(331, 700, NULL, '2023-08-28-64ecdc395ec96.png', '2023-08-28 11:41:13', '2023-08-28 11:41:13'),
(332, 700, NULL, '2023-08-28-64ecdc39636dd.png', '2023-08-28 11:41:13', '2023-08-28 11:41:13'),
(333, 700, NULL, '2023-08-28-64ecdc3967182.png', '2023-08-28 11:41:13', '2023-08-28 11:41:13'),
(334, 700, NULL, '2023-08-28-64ecdc396a475.png', '2023-08-28 11:41:13', '2023-08-28 11:41:13'),
(343, 699, NULL, '2023-08-28-64ecdf5334d13.png', '2023-08-28 11:54:27', '2023-08-28 11:54:27'),
(344, 699, NULL, '2023-08-28-64ecdf533a6e2.png', '2023-08-28 11:54:27', '2023-08-28 11:54:27'),
(345, 699, NULL, '2023-08-28-64ecdf533bcbc.png', '2023-08-28 11:54:27', '2023-08-28 11:54:27'),
(346, 699, NULL, '2023-08-28-64ecdf533cbc3.png', '2023-08-28 11:54:27', '2023-08-28 11:54:27'),
(347, 699, NULL, '2023-08-28-64ecdf533db32.png', '2023-08-28 11:54:27', '2023-08-28 11:54:27'),
(348, 699, 'white', '2023-08-28-64ecdf533eac2.png', '2023-08-28 11:54:27', '2023-08-28 11:54:27'),
(349, 699, 'black', '2023-08-28-64ecdf534076f.png', '2023-08-28 11:54:27', '2023-08-28 11:54:27'),
(350, 701, NULL, '2023-08-29-64edc2877ea43.png', '2023-08-29 04:03:51', '2023-08-29 04:03:51'),
(351, 702, 'nutmeg', '2023-09-05-64f793e5101ba.jpg', '2023-09-05 14:47:33', '2023-09-05 14:47:33'),
(352, 702, 'olive', '2023-09-05-64f793e512525.jpg', '2023-09-05 14:47:33', '2023-09-05 14:47:33'),
(353, 697, NULL, '2023-09-05-64f79ae32d338.png', '2023-09-05 15:17:23', '2023-09-05 15:17:23'),
(354, 693, NULL, '2023-09-05-64f79b96ebab8.jpg', '2023-09-05 15:20:22', '2023-09-05 15:20:22'),
(357, 689, NULL, '2023-09-11-64fed15c58a37.jpg', '2023-09-11 02:35:40', '2023-09-11 02:35:40'),
(358, 688, NULL, '2023-09-11-64fed1db8f896.jpg', '2023-09-11 02:37:47', '2023-09-11 02:37:47'),
(359, 687, NULL, '2023-09-11-64feecf9eb8a6.jpg', '2023-09-11 04:33:29', '2023-09-11 04:33:29'),
(360, 686, NULL, '2023-09-11-64fef1f8782de.jpg', '2023-09-11 04:54:48', '2023-09-11 04:54:48'),
(361, 685, NULL, '2023-09-11-64fef4d063216.jpg', '2023-09-11 05:06:56', '2023-09-11 05:06:56'),
(362, 685, NULL, '2023-09-11-64ff01ab11866.jpg', '2023-09-11 06:01:47', '2023-09-11 06:01:47'),
(363, 703, NULL, '2023-09-11-64ff038a683ae.jpg', '2023-09-11 06:09:46', '2023-09-11 06:09:46'),
(364, 704, NULL, '2023-09-11-64ff06f449632.jpg', '2023-09-11 06:24:20', '2023-09-11 06:24:20'),
(365, 705, NULL, '2023-09-11-64ff0838630d2.jpg', '2023-09-11 06:29:44', '2023-09-11 06:29:44'),
(366, 691, NULL, '2023-09-11-64ff08bc53228.jpg', '2023-09-11 06:31:56', '2023-09-11 06:31:56'),
(367, 706, NULL, '2023-09-11-64ff09155f1fb.jpg', '2023-09-11 06:33:25', '2023-09-11 06:33:25'),
(368, 707, NULL, '2023-09-11-64ff096d916a8.jpg', '2023-09-11 06:34:53', '2023-09-11 06:34:53'),
(369, 690, NULL, '2023-09-11-64ff0acae73ee.jpg', '2023-09-11 06:40:42', '2023-09-11 06:40:42'),
(370, 687, NULL, '2023-09-11-64ff0b0582899.jpg', '2023-09-11 06:41:41', '2023-09-11 06:41:41'),
(371, 708, NULL, '2023-09-11-64ff0bc53ab13.png', '2023-09-11 06:44:53', '2023-09-11 06:44:53'),
(372, 709, NULL, '2023-09-11-64ff0c12f3f68.png', '2023-09-11 06:46:11', '2023-09-11 06:46:11'),
(373, 710, NULL, '2023-09-11-64ff0c44b36f7.png', '2023-09-11 06:47:00', '2023-09-11 06:47:00'),
(374, 711, NULL, '2023-09-11-64ff0c77101db.png', '2023-09-11 06:47:51', '2023-09-11 06:47:51'),
(375, 712, NULL, '2023-09-11-64ff0ca9aa51e.png', '2023-09-11 06:48:41', '2023-09-11 06:48:41'),
(376, 713, NULL, '2023-09-11-64ff0cd672b91.png', '2023-09-11 06:49:26', '2023-09-11 06:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_category`
--

CREATE TABLE `product_sub_category` (
  `id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_category`
--

INSERT INTO `product_sub_category` (`id`, `sub_category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(297, 55, 330, NULL, NULL),
(298, 55, 331, NULL, NULL),
(299, 55, 332, NULL, NULL),
(300, 55, 333, NULL, NULL),
(301, 55, 334, NULL, NULL),
(302, 55, 335, NULL, NULL),
(303, 55, 336, NULL, NULL),
(304, 55, 337, NULL, NULL),
(305, 55, 338, NULL, NULL),
(306, 55, 339, NULL, NULL),
(307, 55, 340, NULL, NULL),
(308, 55, 341, NULL, NULL),
(309, 55, 342, NULL, NULL),
(310, 55, 343, NULL, NULL),
(311, 55, 344, NULL, NULL),
(312, 55, 345, NULL, NULL),
(313, 55, 346, NULL, NULL),
(314, 55, 347, NULL, NULL),
(315, 55, 348, NULL, NULL),
(316, 55, 349, NULL, NULL),
(317, 55, 350, NULL, NULL),
(318, 55, 351, NULL, NULL),
(319, 55, 352, NULL, NULL),
(320, 55, 353, NULL, NULL),
(321, 55, 354, NULL, NULL),
(322, 55, 355, NULL, NULL),
(323, 55, 356, NULL, NULL),
(324, 55, 357, NULL, NULL),
(325, 55, 358, NULL, NULL),
(326, 55, 359, NULL, NULL),
(327, 75, 360, NULL, NULL),
(328, 75, 361, NULL, NULL),
(329, 75, 362, NULL, NULL),
(330, 75, 363, NULL, NULL),
(331, 75, 364, NULL, NULL),
(332, 75, 365, NULL, NULL),
(333, 75, 366, NULL, NULL),
(334, 75, 367, NULL, NULL),
(335, 75, 368, NULL, NULL),
(336, 75, 369, NULL, NULL),
(337, 75, 370, NULL, NULL),
(338, 75, 371, NULL, NULL),
(339, 75, 372, NULL, NULL),
(340, 75, 373, NULL, NULL),
(341, 75, 374, NULL, NULL),
(342, 75, 375, NULL, NULL),
(343, 75, 376, NULL, NULL),
(344, 75, 377, NULL, NULL),
(345, 75, 378, NULL, NULL),
(346, 75, 379, NULL, NULL),
(347, 75, 380, NULL, NULL),
(348, 75, 381, NULL, NULL),
(349, 75, 382, NULL, NULL),
(350, 75, 383, NULL, NULL),
(351, 75, 384, NULL, NULL),
(352, 75, 385, NULL, NULL),
(353, 75, 386, NULL, NULL),
(354, 75, 387, NULL, NULL),
(355, 75, 388, NULL, NULL),
(356, 75, 389, NULL, NULL),
(357, 75, 390, NULL, NULL),
(358, 75, 391, NULL, NULL),
(359, 75, 392, NULL, NULL),
(360, 75, 393, NULL, NULL),
(361, 75, 394, NULL, NULL),
(362, 75, 395, NULL, NULL),
(363, 75, 396, NULL, NULL),
(364, 75, 397, NULL, NULL),
(365, 75, 398, NULL, NULL),
(366, 75, 399, NULL, NULL),
(428, 24, 476, NULL, NULL),
(429, 24, 477, NULL, NULL),
(430, 24, 478, NULL, NULL),
(431, 24, 479, NULL, NULL),
(432, 24, 480, NULL, NULL),
(433, 24, 481, NULL, NULL),
(434, 24, 482, NULL, NULL),
(435, 24, 483, NULL, NULL),
(436, 24, 484, NULL, NULL),
(437, 24, 485, NULL, NULL),
(438, 24, 486, NULL, NULL),
(439, 24, 487, NULL, NULL),
(440, 24, 488, NULL, NULL),
(441, 24, 489, NULL, NULL),
(442, 24, 490, NULL, NULL),
(443, 24, 491, NULL, NULL),
(444, 24, 492, NULL, NULL),
(445, 24, 493, NULL, NULL),
(446, 24, 494, NULL, NULL),
(447, 24, 495, NULL, NULL),
(448, 24, 496, NULL, NULL),
(449, 24, 497, NULL, NULL),
(450, 24, 498, NULL, NULL),
(451, 24, 499, NULL, NULL),
(545, 24, 594, NULL, NULL),
(546, 24, 595, NULL, NULL),
(547, 24, 596, NULL, NULL),
(548, 24, 597, NULL, NULL),
(549, 24, 598, NULL, NULL),
(550, 24, 599, NULL, NULL),
(808, 71, 1056, NULL, NULL),
(809, 24, 600, NULL, NULL),
(810, 9, 601, NULL, NULL),
(811, 9, 602, NULL, NULL),
(812, 9, 603, NULL, NULL),
(813, 9, 604, NULL, NULL),
(814, 9, 605, NULL, NULL),
(815, 9, 607, NULL, NULL),
(816, 9, 608, NULL, NULL),
(818, 55, 610, NULL, NULL),
(819, 72, 611, NULL, NULL),
(823, 24, 612, NULL, NULL),
(824, 24, 614, NULL, NULL),
(825, 24, 616, NULL, NULL),
(827, 9, 609, NULL, NULL),
(828, 9, 617, NULL, NULL),
(829, 9, 618, NULL, NULL),
(830, 97, 620, NULL, NULL),
(831, 98, 621, NULL, NULL),
(833, 99, 622, NULL, NULL),
(835, 98, 623, NULL, NULL),
(837, 15, 624, NULL, NULL),
(838, 15, 625, NULL, NULL),
(839, 15, 627, NULL, NULL),
(840, 15, 628, NULL, NULL),
(841, 15, 629, NULL, NULL),
(842, 3, 630, NULL, NULL),
(847, 98, 634, NULL, NULL),
(849, 98, 633, NULL, NULL),
(850, 98, 632, NULL, NULL),
(851, 98, 631, NULL, NULL),
(852, 102, 635, NULL, NULL),
(854, 103, 636, NULL, NULL),
(855, 104, 637, NULL, NULL),
(857, 105, 638, NULL, NULL),
(858, 105, 639, NULL, NULL),
(859, 105, 640, NULL, NULL),
(860, 105, 641, NULL, NULL),
(861, 106, 642, NULL, NULL),
(862, 106, 643, NULL, NULL),
(863, 105, 644, NULL, NULL),
(864, 105, 645, NULL, NULL),
(865, 105, 646, NULL, NULL),
(866, 105, 647, NULL, NULL),
(867, 105, 648, NULL, NULL),
(868, 105, 649, NULL, NULL),
(869, 105, 650, NULL, NULL),
(870, 102, 651, NULL, NULL),
(871, 102, 652, NULL, NULL),
(872, 102, 653, NULL, NULL),
(882, 105, 663, NULL, NULL),
(883, 2, 662, NULL, NULL),
(884, 2, 661, NULL, NULL),
(885, 3, 660, NULL, NULL),
(887, 2, 658, NULL, NULL),
(888, 2, 657, NULL, NULL),
(889, 14, 656, NULL, NULL),
(890, 14, 655, NULL, NULL),
(891, 11, 654, NULL, NULL),
(892, 107, 672, NULL, NULL),
(893, 107, 673, NULL, NULL),
(894, 109, 659, NULL, NULL),
(895, 2, 674, NULL, NULL),
(896, 113, 682, NULL, NULL),
(897, 113, 683, NULL, NULL),
(898, 105, 684, NULL, NULL),
(899, 114, 686, NULL, NULL),
(900, 113, 698, NULL, NULL),
(901, 115, 699, NULL, NULL),
(902, 115, 700, NULL, NULL),
(904, 116, 702, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`id`, `tag_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 4, 815, NULL, NULL),
(2, 6, 821, NULL, NULL),
(3, 6, 823, NULL, NULL),
(4, 6, 824, NULL, NULL),
(5, 7, 952, NULL, NULL),
(6, 7, 953, NULL, NULL),
(7, 7, 958, NULL, NULL),
(8, 3, 614, NULL, NULL),
(9, 3, 615, NULL, NULL),
(10, 8, 365, NULL, NULL),
(11, 8, 619, NULL, NULL),
(12, 10, 620, NULL, NULL),
(13, 11, 621, NULL, NULL),
(14, 12, 621, NULL, NULL),
(15, 12, 622, NULL, NULL),
(16, 12, 623, NULL, NULL),
(17, 11, 623, NULL, NULL),
(18, 13, 623, NULL, NULL),
(19, 14, 624, NULL, NULL),
(20, 15, 624, NULL, NULL),
(21, 15, 625, NULL, NULL),
(22, 14, 625, NULL, NULL),
(23, 15, 626, NULL, NULL),
(24, 14, 626, NULL, NULL),
(25, 15, 627, NULL, NULL),
(26, 14, 627, NULL, NULL),
(27, 15, 628, NULL, NULL),
(28, 14, 628, NULL, NULL),
(29, 15, 629, NULL, NULL),
(30, 14, 629, NULL, NULL),
(31, 16, 630, NULL, NULL),
(32, 17, 630, NULL, NULL),
(33, 13, 631, NULL, NULL),
(34, 12, 631, NULL, NULL),
(35, 11, 631, NULL, NULL),
(36, 13, 632, NULL, NULL),
(37, 12, 632, NULL, NULL),
(38, 11, 632, NULL, NULL),
(39, 13, 633, NULL, NULL),
(40, 12, 633, NULL, NULL),
(41, 11, 633, NULL, NULL),
(42, 13, 634, NULL, NULL),
(43, 12, 634, NULL, NULL),
(44, 11, 634, NULL, NULL),
(45, 13, 621, NULL, NULL),
(46, 18, 635, NULL, NULL),
(47, 19, 635, NULL, NULL),
(74, 43, 642, NULL, NULL),
(75, 44, 642, NULL, NULL),
(76, 45, 642, NULL, NULL),
(77, 46, 642, NULL, NULL),
(78, 47, 642, NULL, NULL),
(79, 46, 643, NULL, NULL),
(80, 48, 643, NULL, NULL),
(81, 49, 643, NULL, NULL),
(82, 50, 643, NULL, NULL),
(83, 51, 643, NULL, NULL),
(84, 29, 644, NULL, NULL),
(85, 28, 644, NULL, NULL),
(86, 52, 644, NULL, NULL),
(87, 53, 644, NULL, NULL),
(88, 53, 645, NULL, NULL),
(89, 52, 645, NULL, NULL),
(90, 29, 645, NULL, NULL),
(91, 28, 645, NULL, NULL),
(92, 38, 646, NULL, NULL),
(93, 37, 646, NULL, NULL),
(94, 54, 646, NULL, NULL),
(95, 55, 646, NULL, NULL),
(96, 38, 647, NULL, NULL),
(97, 37, 647, NULL, NULL),
(98, 56, 647, NULL, NULL),
(99, 57, 647, NULL, NULL),
(100, 58, 647, NULL, NULL),
(101, 59, 647, NULL, NULL),
(102, 38, 648, NULL, NULL),
(103, 37, 648, NULL, NULL),
(104, 60, 648, NULL, NULL),
(105, 61, 648, NULL, NULL),
(106, 62, 648, NULL, NULL),
(107, 38, 649, NULL, NULL),
(108, 37, 649, NULL, NULL),
(109, 63, 649, NULL, NULL),
(110, 64, 649, NULL, NULL),
(111, 38, 650, NULL, NULL),
(112, 37, 650, NULL, NULL),
(113, 65, 650, NULL, NULL),
(114, 66, 650, NULL, NULL),
(197, 102, 663, NULL, NULL),
(198, 101, 663, NULL, NULL),
(199, 100, 663, NULL, NULL),
(200, 99, 663, NULL, NULL),
(201, 98, 663, NULL, NULL),
(202, 36, 663, NULL, NULL),
(203, 29, 663, NULL, NULL),
(204, 28, 663, NULL, NULL),
(205, 103, 663, NULL, NULL),
(206, 60, 659, NULL, NULL),
(207, 103, 682, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_user`
--

CREATE TABLE `product_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `order_id` int DEFAULT NULL,
  `rating` int NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(25, 'copy_right_text', '© Lems', '2021-04-30 05:44:50', '2023-09-05 15:05:39'),
(26, 'logo', 'logo.png', '2021-04-30 05:44:50', '2023-09-05 14:16:50'),
(27, 'auth_logo', 'auth_logo.jpg', '2021-04-30 05:44:50', '2023-09-05 11:36:28'),
(28, 'favicon', 'favicon.jpg', '2021-04-30 05:44:50', '2023-09-05 11:36:29'),
(31, 'email', 'contact@finvasoft.com', NULL, '2023-09-05 11:43:45'),
(32, 'shop_commission', '0', NULL, '2023-08-22 22:35:33'),
(33, 'bkash', '01925015919', NULL, '2023-09-05 11:43:45'),
(34, 'nagad', '01925015919', NULL, '2023-09-05 11:43:45'),
(35, 'rocket', '01925015919', NULL, '2023-09-05 11:43:45'),
(36, 'bank_name', 'Brac Bank', NULL, '2023-08-22 22:35:33'),
(37, 'holder_name', 'Finva Soft', NULL, '2023-09-05 11:43:45'),
(38, 'bank_account', '101010', NULL, '2023-09-05 11:43:45'),
(39, 'branch_name', 'Mirpur 6, Dhaka', NULL, '2023-09-05 11:43:45'),
(40, 'routing', '060820738', NULL, '2023-08-22 22:35:33'),
(41, 'footer_description', 'In today\'s digital landscape, multivendor ecommerce platforms are transforming the way we shop and do business. Let\'s delve into LEMS, an innovative solution that\'s reshaping the ecommerce game.', NULL, '2023-09-05 11:43:45'),
(42, 'facebook', 'https://www.facebook.com/finvasoft', NULL, '2023-09-05 11:43:45'),
(43, 'whatsapp', '01925015919', NULL, '2023-09-05 11:43:45'),
(44, 'twitter', NULL, NULL, '2023-05-13 11:15:19'),
(45, 'linkedin', NULL, NULL, '2023-05-13 11:15:19'),
(46, 'instagram', NULL, NULL, '2023-05-13 11:15:19'),
(47, 'messanger', NULL, NULL, '2022-04-20 00:48:50'),
(48, 'youtube', NULL, NULL, '2023-09-05 11:43:45'),
(49, 'shipping_charge', '130', NULL, '2023-08-22 22:35:33'),
(50, 'shipping_charge_out_of_range', '130', NULL, '2023-08-22 22:35:33'),
(51, 'is_point', '0', NULL, '2023-08-22 22:35:33'),
(52, 'Default_Point', '10', NULL, '2023-04-14 10:10:15'),
(53, 'Point_rate', '.1', NULL, '2023-04-12 12:58:13'),
(54, 'fb_pixel', 'dc', NULL, '2023-03-01 00:18:30'),
(59, 'mega_cat', '[\"4\",\"18\",\"19\",\"21\"]', NULL, '2023-09-11 07:31:41'),
(60, 'sub_cat', '[\"102\",\"103\"]', NULL, '2023-09-05 15:23:03'),
(61, 'mini_cat', '[\"193\"]', NULL, '2023-09-11 06:43:09'),
(62, 'extra_cat', '[\"51\"]', NULL, '2023-09-05 15:23:03'),
(64, 'meta_img', 'dd', NULL, NULL),
(65, 'g_bkash', 'true', '2023-02-28 11:00:52', '2023-02-28 11:00:52'),
(66, 'g_nagad', 'true', '2023-02-28 11:00:52', '2023-02-28 11:14:16'),
(67, 'g_rocket', 'true', '2023-02-28 11:00:52', '2023-02-28 11:14:16'),
(68, 'g_bank', 'true', '2023-02-28 11:00:52', '2023-02-28 11:00:52'),
(69, 'g_wallate', 'false', '2023-02-28 11:00:52', '2023-05-14 12:49:31'),
(70, 'g_cod', 'false', '2023-02-28 11:00:52', '2023-08-28 22:04:37'),
(71, 'g_aamar', 'false', '2023-02-28 11:00:52', '2023-02-28 11:14:16'),
(72, 'g_uddok', 'false', '2023-02-28 11:00:52', '2023-08-28 22:04:37'),
(73, 'uapi', '982d381360a69d419689740d9f2e26ce36fb7a50', '2023-02-28 11:09:19', '2023-06-22 13:55:23'),
(74, 'astore', 'aamarpaytest', '2023-02-28 11:09:19', '2023-02-28 11:11:09'),
(75, 'akey', 'dbb74894e82415a2f7ff0ec3a97e4183', '2023-02-28 11:09:19', '2023-02-28 11:11:09'),
(76, 'amode', '1', '2023-02-28 11:23:07', '2023-02-28 11:23:49'),
(77, 'umode', '1', '2023-02-28 11:23:07', '2023-06-22 13:55:23'),
(78, 'placeholder_one', 'Search by product name', NULL, '2023-03-10 04:38:56'),
(79, 'placeholder_two', 'Search by Vendor', NULL, '2023-03-10 04:38:56'),
(80, 'placeholder_three', 'Search by category', NULL, '2023-03-10 04:38:56'),
(81, 'placeholder_four', 'Search by product', NULL, '2023-03-10 04:38:56'),
(82, 'ubase', 'sandbox.uddoktapay.com', '2023-03-10 04:36:30', '2023-06-22 13:56:45'),
(83, 'min_rec', '50', NULL, '2023-04-13 07:53:07'),
(84, 'min_with', '100', NULL, '2023-04-13 07:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `shop_infos`
--

CREATE TABLE `shop_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `is_admin` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selfi` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `routing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` decimal(10,0) DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nidback` text COLLATE utf8mb4_unicode_ci,
  `trade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nogod` int DEFAULT NULL,
  `rocket` int DEFAULT NULL,
  `bkash` int DEFAULT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_infos`
--

INSERT INTO `shop_infos` (`id`, `user_id`, `is_admin`, `name`, `gmail`, `selfi`, `slug`, `address`, `url`, `bank_account`, `bank_name`, `holder_name`, `branch_name`, `routing`, `profile`, `cover_photo`, `description`, `commission`, `nid`, `nidback`, `trade`, `nogod`, `rocket`, `bkash`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Finva Soft', '', NULL, '192792713879207', 'Mirpur 6, Dhaka', 'http://finvasoft.com/', '0', 'Brac Bank', 'Finva Soft', 'Mirpur 6, Dhaka', '01548', '2023-09-05-64f771292c2e1.jpg', '2023-09-05-64f771292c37b.jpg', 'এখানে ডেসক্রিপশন আপডেট করতে হবে', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2022-02-02 08:32:44', '2023-09-05 12:19:21'),
(20, 286, 0, 'Vendor shop', 'vendor@gmail.com', NULL, '331182978833678', 'Mirpur 6, Dhaka', 'facebook.com/vendor', 'Vendor', 'DBL', 'Vendor', 'Mirpur 6, Dhaka', '1245', '2023-09-11-64ff19a2486c7.png', '2023-09-11-64ff19a248796.jpg', 'Vendor', NULL, '2023-09-11-64ff19a24885e.jpg', NULL, '2023-09-11-64ff19a2487ff.jpg', NULL, NULL, NULL, NULL, '2023-09-11 07:44:02', '2023-09-11 07:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_feature` int NOT NULL DEFAULT '0',
  `is_pop` int NOT NULL DEFAULT '0',
  `is_sub` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `url`, `status`, `is_feature`, `is_pop`, `is_sub`, `created_at`, `updated_at`) VALUES
(10, '2023-05-13-645fc89eb6465.jpg', 'https://ecommerce.finvasoft.com', 1, 1, 0, 0, '2022-03-11 13:06:15', '2023-09-05 15:01:59'),
(11, '2023-05-13-645fc895c3f78.jpg', 'https://ecommerce.finvasoft.com', 1, 1, 0, 0, '2022-03-11 13:07:31', '2023-09-05 15:01:56'),
(12, '2023-05-13-645fc88a89bda.jpg', 'https://ecommerce.finvasoft.com', 1, 1, 0, 0, '2022-04-14 07:23:19', '2023-09-05 15:01:52'),
(14, '2023-03-27-64212fa727226.jpg', 'https://ecommerce.finvasoft.com', 0, 0, 0, 0, '2022-04-14 08:29:15', '2023-09-05 15:01:49'),
(16, '2023-03-27-64212e1710415.jpg', 'https://ecommerce.finvasoft.com', 0, 0, 0, 0, '2022-04-20 04:20:20', '2023-09-05 15:01:46'),
(20, '2023-03-27-6421303ae5c9b.jpg', 'https://ecommerce.finvasoft.com', 0, 0, 0, 0, '2023-02-24 14:15:43', '2023-09-05 15:01:42'),
(21, '2023-05-18-64668b854ed7b.jpg', 'https://ecommerce.finvasoft.com', 1, 0, 0, 1, '2023-03-15 01:58:16', '2023-09-05 15:01:39'),
(23, '2023-05-18-64668dc463aee.png', 'https://ecommerce.finvasoft.com', 1, 0, 0, 1, '2023-03-15 01:58:33', '2023-09-05 15:01:37'),
(24, '2023-06-22-6494aadd0939a.jpg', 'https://ecommerce.finvasoft.com', 1, 0, 0, 1, '2023-03-15 01:58:43', '2023-09-05 15:01:33'),
(25, '2023-05-18-64668a4cc1eac.jpg', 'https://ecommerce.finvasoft.com', 1, 0, 0, 1, '2023-03-15 01:58:53', '2023-09-05 15:01:30'),
(26, '2023-05-18-64668a470d64a.jpg', 'https://ecommerce.finvasoft.com', 1, 1, 0, 1, '2023-05-05 10:18:42', '2023-09-05 15:01:13'),
(33, '2023-05-13-645fc1d421e52.jpg', 'https://ecommerce.finvasoft.com', 1, 0, 0, 0, '2023-05-07 00:37:44', '2023-09-05 15:00:17'),
(34, '2023-05-13-645fc1c8c09c2.jpg', 'https://ecommerce.finvasoft.com', 1, 0, 0, 0, '2023-05-07 00:38:48', '2023-09-05 15:00:11'),
(35, '2023-05-13-645fc1ad01df8.jpg', 'https://ecommerce.finvasoft.com', 1, 0, 0, 0, '2023-05-07 00:39:12', '2023-09-05 15:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'sohel@finvasoft.com', '2023-09-05 15:20:46', '2023-09-05 15:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_feature` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `cover_photo`, `status`, `is_feature`, `created_at`, `updated_at`) VALUES
(102, 4, 'Bluetooth Speaker', 'bluetooth-speaker', '2023-05-09-645a48125ed74.png', 1, 1, '2023-05-09 07:18:10', '2023-09-05 14:15:32'),
(103, 4, 'Microphone', 'microphone', '2023-05-09-645a950a90d2e.png', 1, 1, '2023-05-09 12:46:34', '2023-09-05 14:15:19'),
(104, 4, 'Chargers', 'chargers', '2023-05-10-645b7384e7ca0.png', 1, 0, '2023-05-10 04:35:48', '2023-09-05 14:13:02'),
(105, 4, 'Headphone', 'headphone', '2023-05-10-645b97902b399.png', 1, 1, '2023-05-10 07:09:36', '2023-09-05 14:15:12'),
(106, 4, 'Mobile/Tablet Stand', 'mobiletablet-stand', '2023-05-10-645bd451c76d5.png', 1, 0, '2023-05-10 11:28:49', '2023-09-05 14:13:02'),
(107, 6, 'Fan', 'fan', '2023-05-13-645f5ddf74fd9.png', 1, 0, '2023-05-13 01:57:44', '2023-05-13 03:52:31'),
(113, 19, 'Apple  Watch Clone', 'apple-watch-clone', '2023-08-23-64e59b5c47b10.png', 1, 1, '2023-08-22 23:38:36', '2023-09-05 14:15:55'),
(116, 4, 'Phone Back Cover', 'phone-back-cover', 'default.png', 1, 0, '2023-09-05 14:52:20', '2023-09-05 14:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `status`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Dettol', 'dettol', 1, 'null', '2022-04-17 12:28:08', '2022-04-17 12:28:08'),
(4, 'RFL', 'rfl', 1, 'null', '2022-04-18 03:24:08', '2022-04-18 03:24:08'),
(5, 'Pepsodent', 'pepsodent', 1, 'null', '2022-04-18 03:31:43', '2022-04-18 03:31:43'),
(6, 'Books', 'books', 1, 'null', '2022-04-18 03:55:45', '2022-04-18 03:55:45'),
(7, '19 April', '19-april', 1, 'null', '2022-04-18 13:47:39', '2022-04-18 13:49:09'),
(8, 'Best', 'best', 1, 's', '2022-05-07 12:35:01', '2022-05-07 12:35:01'),
(9, 'home', 'home', 1, 'null', '2023-04-05 06:08:44', '2023-04-05 06:08:44'),
(10, 'school bag', 'school-bag', 1, 'null', '2023-05-07 04:42:28', '2023-05-07 04:42:28'),
(11, 'Sharee', 'sharee', 1, 'null', '2023-05-07 06:47:34', '2023-05-07 06:47:34'),
(12, 'Panjabi', 'panjabi', 1, 'null', '2023-05-07 06:47:50', '2023-05-07 06:47:50'),
(13, 'Couple Dress', 'couple-dress', 1, 'null', '2023-05-07 11:58:43', '2023-05-07 11:58:43'),
(14, 'Women fashion', 'women-fashion', 1, 'null', '2023-05-07 12:27:17', '2023-05-07 12:27:17'),
(15, 'Kaftan', 'kaftan', 1, 'null', '2023-05-07 12:27:24', '2023-05-07 12:27:24'),
(16, 'Men\'s Fashion', 'mens-fashion', 1, 'null', '2023-05-08 05:40:13', '2023-05-08 05:40:13'),
(17, 'polo Shirt', 'polo-shirt', 1, 'null', '2023-05-08 05:40:27', '2023-05-08 05:40:27'),
(18, 'Bluetooth Speaker', 'bluetooth-speaker', 1, 'null', '2023-05-09 11:36:06', '2023-05-09 11:36:06'),
(19, 'Speaker', 'speaker', 1, 'null', '2023-05-09 11:36:18', '2023-05-09 11:36:18'),
(20, 'microphone', 'microphone', 1, 'null', '2023-05-09 12:13:20', '2023-05-09 12:13:20'),
(21, 'K8 Price in Bangladesh', 'k8-price-in-bangladesh', 1, 'null', '2023-05-09 12:13:43', '2023-05-09 12:13:43'),
(22, 'k8 wireless microphone', 'k8-wireless-microphone', 1, 'null', '2023-05-09 12:14:11', '2023-05-09 12:14:11'),
(23, 'wireless microphone price in bangladesh', 'wireless-microphone-price-in-bangladesh', 1, 'null', '2023-05-09 12:14:31', '2023-05-09 12:14:31'),
(24, 'oneplus charger price in bangladesh', 'oneplus-charger-price-in-bangladesh', 1, 'null', '2023-05-10 05:10:32', '2023-05-10 05:10:32'),
(25, 'mobile charger', 'mobile-charger', 1, 'null', '2023-05-10 05:11:04', '2023-05-10 05:11:04'),
(26, 'oneplus 65w charger price in bangladesh', 'oneplus-65w-charger-price-in-bangladesh', 1, 'null', '2023-05-10 05:11:33', '2023-05-10 05:11:33'),
(27, 'oneplus 30w charger price in bangladesh', 'oneplus-30w-charger-price-in-bangladesh', 1, 'null', '2023-05-10 05:11:56', '2023-05-10 05:11:56'),
(28, 'neckband', 'neckband', 1, 'null', '2023-05-10 07:18:22', '2023-05-10 07:18:22'),
(29, 'Neckband price in Bangladesh', 'neckband-price-in-bangladesh', 1, 'null', '2023-05-10 07:18:42', '2023-05-10 07:18:42'),
(30, 'Realme neckband price in Bangladesh', 'realme-neckband-price-in-bangladesh', 1, 'null', '2023-05-10 07:19:17', '2023-05-10 07:19:17'),
(31, 'Realme neckband price', 'realme-neckband-price', 1, 'null', '2023-05-10 07:19:20', '2023-05-10 07:19:20'),
(32, 'Oneplus neckband', 'oneplus-neckband', 1, 'null', '2023-05-10 07:30:29', '2023-05-10 07:30:29'),
(33, 'Oneplus neckband price', 'oneplus-neckband-price', 1, 'null', '2023-05-10 07:30:39', '2023-05-10 07:30:39'),
(34, 'Oneplus neckband price in bangladesh', 'oneplus-neckband-price-in-bangladesh', 1, 'null', '2023-05-10 07:30:52', '2023-05-10 07:30:52'),
(35, 'headphone', 'headphone', 1, 'null', '2023-05-10 09:25:59', '2023-05-10 09:25:59'),
(36, 'Bluetooth headphone', 'bluetooth-headphone', 1, 'null', '2023-05-10 09:26:11', '2023-05-10 09:26:11'),
(37, 'tws', 'tws', 1, 'null', '2023-05-10 09:26:17', '2023-05-10 09:26:17'),
(38, 'tws price in bangladesh', 'tws-price-in-bangladesh', 1, 'null', '2023-05-10 09:26:28', '2023-05-10 09:26:28'),
(39, 'm10 tws', 'm10-tws', 1, 'null', '2023-05-10 09:26:36', '2023-05-10 09:26:36'),
(40, 'remax 595 earphone price', 'remax-595-earphone-price', 1, 'null', '2023-05-10 10:17:16', '2023-05-10 10:17:16'),
(41, 'Remax earphone', 'remax-earphone', 1, 'null', '2023-05-10 10:17:27', '2023-05-10 10:17:27'),
(42, 'Remax earphone price in Bangladesh', 'remax-earphone-price-in-bangladesh', 1, 'null', '2023-05-10 10:17:42', '2023-05-10 10:17:42'),
(43, 'mobile stand', 'mobile-stand', 1, 'null', '2023-05-10 11:16:46', '2023-05-10 11:16:46'),
(44, 'mobile stand price in bangladesh', 'mobile-stand-price-in-bangladesh', 1, 'null', '2023-05-10 11:16:59', '2023-05-10 11:16:59'),
(45, 'tablet stand', 'tablet-stand', 1, 'null', '2023-05-10 11:17:08', '2023-05-10 11:17:08'),
(46, 'good mobile stand', 'good-mobile-stand', 1, 'null', '2023-05-10 11:17:34', '2023-05-10 11:17:34'),
(47, 'best tablet stand price', 'best-tablet-stand-price', 1, 'null', '2023-05-10 11:18:05', '2023-05-10 11:18:05'),
(48, 'portable cell phone stand', 'portable-cell-phone-stand', 1, 'null', '2023-05-10 12:43:09', '2023-05-10 12:43:09'),
(49, 'adjustable phone holder', 'adjustable-phone-holder', 1, 'null', '2023-05-10 12:43:33', '2023-05-10 12:43:33'),
(50, 'moblie stand price', 'moblie-stand-price', 1, 'null', '2023-05-10 12:45:01', '2023-05-10 12:45:01'),
(51, 'mobile phone stand price in bangladesh', 'mobile-phone-stand-price-in-bangladesh', 1, 'null', '2023-05-10 12:45:22', '2023-05-10 12:45:22'),
(52, 'Lenovo Neckband price', 'lenovo-neckband-price', 1, 'null', '2023-05-11 03:01:53', '2023-05-11 03:01:53'),
(53, 'Lenovo Neckband price  in bangladesh', 'lenovo-neckband-price-in-bangladesh', 1, 'null', '2023-05-11 03:02:02', '2023-05-11 03:02:02'),
(54, 'M20 TWS Wireless Earbuds', 'm20-tws-wireless-earbuds', 1, 'null', '2023-05-11 05:07:25', '2023-05-11 05:07:25'),
(55, 'M20 TWS Wireless Earbuds price in Bangladesh', 'm20-tws-wireless-earbuds-price-in-bangladesh', 1, 'null', '2023-05-11 05:07:44', '2023-05-11 05:07:44'),
(56, 'M27 tws price', 'm27-tws-price', 1, 'null', '2023-05-11 05:48:39', '2023-05-11 05:48:39'),
(57, 'm27 headphone price', 'm27-headphone-price', 1, 'null', '2023-05-11 05:48:50', '2023-05-11 05:48:50'),
(58, 'M27 tws price in bangladesh', 'm27-tws-price-in-bangladesh', 1, 'null', '2023-05-11 05:48:58', '2023-05-11 05:48:58'),
(59, 'M27 headphone price in bangladesh', 'm27-headphone-price-in-bangladesh', 1, 'null', '2023-05-11 05:49:15', '2023-05-11 05:49:15'),
(60, 'M32 Mini Bluetooth 5.1 Earphone TWS Wireless Headphones', 'm32-mini-bluetooth-51-earphone-tws-wireless-headphones', 1, 'null', '2023-05-11 07:34:35', '2023-05-11 07:34:35'),
(61, 'TWS Wireless Headphones', 'tws-wireless-headphones', 1, 'null', '2023-05-11 07:34:49', '2023-05-11 07:34:49'),
(62, 'M32 Mini Bluetooth price', 'm32-mini-bluetooth-price', 1, 'null', '2023-05-11 07:35:02', '2023-05-11 07:35:02'),
(63, 'M35 TWS Bluetooth', 'm35-tws-bluetooth', 1, 'null', '2023-05-11 08:13:05', '2023-05-11 08:13:05'),
(64, 'M35 TWS Bluetooth price in bangladesh', 'm35-tws-bluetooth-price-in-bangladesh', 1, 'null', '2023-05-11 08:13:15', '2023-05-11 08:13:15'),
(65, 'M19 TWS Wireless Bluetooth', 'm19-tws-wireless-bluetooth', 1, 'null', '2023-05-11 08:58:17', '2023-05-11 08:58:17'),
(66, 'M19 TWS Wireless Bluetooth price in bangladesh', 'm19-tws-wireless-bluetooth-price-in-bangladesh', 1, 'null', '2023-05-11 08:58:27', '2023-05-11 08:58:27'),
(67, 'JBL Bluetooth speaker', 'jbl-bluetooth-speaker', 1, 'null', '2023-05-11 10:25:02', '2023-05-11 10:25:02'),
(68, 'JBL M3 mini Bluetooth speaker', 'jbl-m3-mini-bluetooth-speaker', 1, 'null', '2023-05-11 10:25:14', '2023-05-11 10:25:14'),
(69, 'WS887BluetoothSpeaker', 'ws887bluetoothspeaker', 1, 'null', '2023-05-11 11:54:47', '2023-05-11 11:54:47'),
(70, 'PortableSpeaker', 'portablespeaker', 1, 'null', '2023-05-11 11:55:05', '2023-05-11 11:55:05'),
(71, 'WirelessSpeaker', 'wirelessspeaker', 1, 'null', '2023-05-11 11:55:18', '2023-05-11 11:55:18'),
(72, 'BluetoothEarphones', 'bluetoothearphones', 1, 'null', '2023-05-12 08:34:18', '2023-05-12 08:34:18'),
(73, 'JBLM10PRO', 'jblm10pro', 1, 'null', '2023-05-12 08:34:35', '2023-05-12 08:34:35'),
(74, 'TWSEarbuds', 'twsearbuds', 1, 'null', '2023-05-12 08:34:53', '2023-05-12 08:34:53'),
(75, 'Portable speaker', 'portable-speaker', 1, 'null', '2023-05-12 08:59:00', '2023-05-12 08:59:00'),
(76, 'Rechargeable speaker', 'rechargeable-speaker', 1, 'null', '2023-05-12 08:59:26', '2023-05-12 08:59:26'),
(77, 'Party speaker', 'party-speaker', 1, 'null', '2023-05-12 08:59:42', '2023-05-12 08:59:42'),
(78, 'Home speaker', 'home-speaker', 1, 'null', '2023-05-12 08:59:55', '2023-05-12 08:59:55'),
(79, 'Neck fan', 'neck-fan', 1, 'null', '2023-05-13 01:58:33', '2023-05-13 01:58:33'),
(80, 'Hands-free fan', 'hands-free-fan', 1, 'null', '2023-05-13 01:58:45', '2023-05-13 01:58:45'),
(81, 'Portable fan', 'portable-fan', 1, 'null', '2023-05-13 01:58:56', '2023-05-13 01:58:56'),
(82, 'USB fan', 'usb-fan', 1, 'null', '2023-05-13 01:59:07', '2023-05-13 01:59:07'),
(83, 'Rechargeable fan', 'rechargeable-fan', 1, 'null', '2023-05-13 01:59:17', '2023-05-13 01:59:17'),
(84, 'Mini fan', 'mini-fan', 1, 'null', '2023-05-13 01:59:27', '2023-05-13 01:59:27'),
(85, 'Personal fan', 'personal-fan', 1, 'null', '2023-05-13 01:59:37', '2023-05-13 01:59:37'),
(86, 'Wearable fan', 'wearable-fan', 1, 'null', '2023-05-13 01:59:51', '2023-05-13 01:59:51'),
(87, 'Battery fan', 'battery-fan', 1, 'null', '2023-05-13 02:00:08', '2023-05-13 02:00:08'),
(88, 'Office fan', 'office-fan', 1, 'null', '2023-05-13 02:00:21', '2023-05-13 02:00:21'),
(89, 'Kitchen fan', 'kitchen-fan', 1, 'null', '2023-05-13 02:01:37', '2023-05-13 02:01:37'),
(90, 'PortableFan', 'portablefan', 1, 'null', '2023-05-13 04:24:37', '2023-05-13 04:24:37'),
(91, 'RechargeableFan', 'rechargeablefan', 1, 'null', '2023-05-13 04:24:51', '2023-05-13 04:24:51'),
(92, 'USBFan', 'usbfan', 1, 'null', '2023-05-13 04:25:03', '2023-05-13 04:25:03'),
(93, 'HandheldFan', 'handheldfan', 1, 'null', '2023-05-13 04:25:14', '2023-05-13 04:25:14'),
(94, '#MiniFan', 'minifan', 1, 'null', '2023-05-13 04:25:25', '2023-05-13 04:25:25'),
(95, '#MakeupFan', 'makeupfan', 1, 'null', '2023-05-13 04:25:37', '2023-05-13 04:25:37'),
(96, '#BabyFan', 'babyfan', 1, 'null', '2023-05-13 04:25:51', '2023-05-13 04:25:51'),
(97, 'Bone conduction earphone', 'bone-conduction-earphone', 1, 'null', '2023-05-13 07:51:17', '2023-05-13 07:51:17'),
(98, 'Wireless Bluetooth headphones', 'wireless-bluetooth-headphones', 1, 'null', '2023-05-13 07:51:29', '2023-05-13 07:51:29'),
(99, 'Neckband earphone', 'neckband-earphone', 1, 'null', '2023-05-13 07:51:41', '2023-05-13 07:51:41'),
(100, 'Bluetooth V5.1', 'bluetooth-v51', 1, 'null', '2023-05-13 07:51:54', '2023-05-13 07:51:54'),
(101, 'Copper ring speaker', 'copper-ring-speaker', 1, 'null', '2023-05-13 07:52:13', '2023-05-13 07:52:13'),
(102, 'Portable earphone', 'portable-earphone', 1, 'null', '2023-05-13 07:52:56', '2023-05-13 07:52:56'),
(103, 'Bone conduction earphones', 'bone-conduction-earphones', 1, 'null', '2023-05-13 09:38:38', '2023-05-13 09:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `sub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `reply` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unproducts`
--

CREATE TABLE `unproducts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer` int NOT NULL DEFAULT '2',
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oauth_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oauth_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `cancel_attempt` int NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `point` int NOT NULL DEFAULT '0',
  `pen_point` int DEFAULT NULL,
  `joining_date` date NOT NULL,
  `joining_month` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_year` year NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desig` int DEFAULT NULL,
  `wallate` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `refer`, `username`, `email`, `phone`, `password`, `oauth_id`, `oauth_type`, `is_approved`, `status`, `cancel_attempt`, `avatar`, `point`, `pen_point`, `joining_date`, `joining_month`, `joining_year`, `email_verified_at`, `remember_token`, `desig`, `wallate`, `created_at`, `updated_at`) VALUES
(1, 1, 'Finva Soft', 2, 'admin', 'asifulmamun@gmail.com', '01721600688', '$2y$10$zayBOfViYMB65kxVCJLGQuw9nBHkxyIVlVkHl1zjoWuMEWGHT2GOO', NULL, NULL, 1, 1, 0, '2023-09-05-64f771292bc07.jpg', 0, 0, '2021-04-30', 'April', 2021, '2021-04-30 05:44:48', 'EenySqpCYl3mcerjyPXJn57emVHgvxoYOeXwnsoZZaSPTFdkwia5YaizzUzP', 1, 0, '2021-04-30 05:44:48', '2024-01-11 06:23:15'),
(286, 2, 'Vendor', 2, 'vendor', 'vendor@gmail.com', '01710101010', '$2y$10$FLOyXNLc4jx98h/b81PRd.3F8mzm6KDGc4vFypqA0.eX1h/JHgUmm', NULL, NULL, 1, 1, 0, 'default.png', 0, NULL, '2023-09-11', 'September', 2023, NULL, NULL, NULL, 0, '2023-09-11 07:44:02', '2023-09-11 07:44:02'),
(287, 3, 'customer', 2, 'customer', 'customer@gmail.com', '01710101011', '$2y$10$T6IcgAqSIihFIfFQXoxyL.3lXrL1O3B1UY08ejdYD4Hg.JUb7Z8OG', NULL, NULL, 1, 1, 0, 'default.png', 0, NULL, '2023-09-11', 'September', 2023, NULL, NULL, NULL, 0, '2023-09-11 07:46:51', '2023-09-11 07:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_accounts`
--

CREATE TABLE `vendor_accounts` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pending_amount` decimal(20,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_accounts`
--

INSERT INTO `vendor_accounts` (`id`, `vendor_id`, `amount`, `pending_amount`, `created_at`, `updated_at`) VALUES
(1, 1, '0.00', '0.00', NULL, '2023-08-31 07:03:44'),
(20, 286, '0.00', NULL, '2023-09-11 07:44:02', '2023-09-11 07:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 227, 656, '2023-07-02 10:03:25', '2023-07-02 10:03:25'),
(4, 247, 683, '2023-08-23 04:31:22', '2023-08-23 04:31:22'),
(5, 247, 684, '2023-08-23 04:31:25', '2023-08-23 04:31:25'),
(6, 274, 683, '2023-08-27 04:56:38', '2023-08-27 04:56:38'),
(7, 274, 684, '2023-08-27 04:57:28', '2023-08-27 04:57:28'),
(11, 256, 693, '2023-08-27 05:35:06', '2023-08-27 05:35:06'),
(12, 275, 683, '2023-08-27 08:27:42', '2023-08-27 08:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint UNSIGNED NOT NULL,
  `user_type` int DEFAULT NULL,
  `number` int DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_product_attribute_value_id_foreign` (`attribute_value_id`),
  ADD KEY `attribute_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_values_slug_unique` (`slug`),
  ADD KEY `attribute_values_attributes_id_foreign` (`attributes_id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `bloods`
--
ALTER TABLE `bloods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaing_comments`
--
ALTER TABLE `campaing_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaing_comments_campaign_id_foreign` (`campaign_id`);

--
-- Indexes for table `campaing_products`
--
ALTER TABLE `campaing_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaing_products_campain_id_foreign` (`campaign_id`),
  ADD KEY `campaing_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `cart_infos`
--
ALTER TABLE `cart_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `category_collection`
--
ALTER TABLE `category_collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_collection_category_id_foreign` (`category_id`),
  ADD KEY `category_collection_collection_id_foreign` (`collection_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_user_id_foreign` (`user_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `collections_name_unique` (`name`),
  ADD UNIQUE KEY `collections_slug_unique` (`slug`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_name_unique` (`name`),
  ADD UNIQUE KEY `colors_slug_unique` (`slug`),
  ADD UNIQUE KEY `colors_code_unique` (`code`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_product_color_id_foreign` (`color_id`),
  ADD KEY `color_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_user`
--
ALTER TABLE `coupon_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_user_user_id_foreign` (`user_id`),
  ADD KEY `coupon_user_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `customer_infos`
--
ALTER TABLE `customer_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `device_ids`
--
ALTER TABLE `device_ids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download_products`
--
ALTER TABLE `download_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `download_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `download_users`
--
ALTER TABLE `download_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `download_users_user_id_foreign` (`user_id`),
  ADD KEY `download_users_product_id_foreign` (`product_id`);

--
-- Indexes for table `download_user_products`
--
ALTER TABLE `download_user_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `download_user_products_user_id_foreign` (`user_id`),
  ADD KEY `download_user_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `extra_mini_categories`
--
ALTER TABLE `extra_mini_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `extra_mini_categories_name_unique` (`name`),
  ADD UNIQUE KEY `extra_mini_categories_slug_unique` (`slug`),
  ADD KEY `extra_mini_categories_mini_category_id_foreign` (`mini_category_id`);

--
-- Indexes for table `extra_mini_category_product`
--
ALTER TABLE `extra_mini_category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extra_mini_category_product_extra_mini_categories_id_foreign` (`extra_mini_category_id`),
  ADD KEY `extra_mini_category_product_product_id_foreign` (`product_id`);

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
-- Indexes for table `mini_categories`
--
ALTER TABLE `mini_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mini_categories_name_unique` (`name`),
  ADD UNIQUE KEY `mini_categories_slug_unique` (`slug`),
  ADD KEY `mini_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `mini_category_product`
--
ALTER TABLE `mini_category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mini_category_product_product_id_foreign` (`product_id`),
  ADD KEY `mini_category_product_mini_category_id_foreign` (`mini_category_id`);

--
-- Indexes for table `multi_order`
--
ALTER TABLE `multi_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partial_payments`
--
ALTER TABLE `partial_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_size_size_id_foreign` (`size_id`),
  ADD KEY `product_size_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sub_category_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `product_sub_category_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tag_tag_id_foreign` (`tag_id`),
  ADD KEY `product_tag_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_user`
--
ALTER TABLE `product_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_user_user_id_foreign` (`user_id`),
  ADD KEY `product_user_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_infos`
--
ALTER TABLE `shop_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_name_unique` (`name`),
  ADD UNIQUE KEY `sizes_slug_unique` (`slug`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_name_unique` (`name`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`);

--
-- Indexes for table `unproducts`
--
ALTER TABLE `unproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unproducts_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `vendor_accounts`
--
ALTER TABLE `vendor_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_accounts_vendor_id_foreign` (`vendor_id`) USING BTREE;

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `attribute_product`
--
ALTER TABLE `attribute_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bloods`
--
ALTER TABLE `bloods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campaing_comments`
--
ALTER TABLE `campaing_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campaing_products`
--
ALTER TABLE `campaing_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart_infos`
--
ALTER TABLE `cart_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category_collection`
--
ALTER TABLE `category_collection`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=731;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupon_user`
--
ALTER TABLE `coupon_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_infos`
--
ALTER TABLE `customer_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `device_ids`
--
ALTER TABLE `device_ids`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `download_products`
--
ALTER TABLE `download_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `download_users`
--
ALTER TABLE `download_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `download_user_products`
--
ALTER TABLE `download_user_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extra_mini_categories`
--
ALTER TABLE `extra_mini_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `extra_mini_category_product`
--
ALTER TABLE `extra_mini_category_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `mini_categories`
--
ALTER TABLE `mini_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `mini_category_product`
--
ALTER TABLE `mini_category_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `multi_order`
--
ALTER TABLE `multi_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `partial_payments`
--
ALTER TABLE `partial_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=714;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=905;

--
-- AUTO_INCREMENT for table `product_tag`
--
ALTER TABLE `product_tag`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `product_user`
--
ALTER TABLE `product_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `shop_infos`
--
ALTER TABLE `shop_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `unproducts`
--
ALTER TABLE `unproducts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `vendor_accounts`
--
ALTER TABLE `vendor_accounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD CONSTRAINT `attribute_product_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_values` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attributes_id_foreign` FOREIGN KEY (`attributes_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `campaing_comments`
--
ALTER TABLE `campaing_comments`
  ADD CONSTRAINT `campaing_comments_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `campaing_products`
--
ALTER TABLE `campaing_products`
  ADD CONSTRAINT `campaing_products_campain_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `campaing_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_collection`
--
ALTER TABLE `category_collection`
  ADD CONSTRAINT `category_collection_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_collection_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `color_product`
--
ALTER TABLE `color_product`
  ADD CONSTRAINT `color_product_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `color_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupon_user`
--
ALTER TABLE `coupon_user`
  ADD CONSTRAINT `coupon_user_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_infos`
--
ALTER TABLE `customer_infos`
  ADD CONSTRAINT `customer_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `download_products`
--
ALTER TABLE `download_products`
  ADD CONSTRAINT `download_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `download_users`
--
ALTER TABLE `download_users`
  ADD CONSTRAINT `download_users_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `download_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `download_user_products`
--
ALTER TABLE `download_user_products`
  ADD CONSTRAINT `download_user_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `download_user_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `extra_mini_categories`
--
ALTER TABLE `extra_mini_categories`
  ADD CONSTRAINT `extra_mini_categories_mini_category_id_foreign` FOREIGN KEY (`mini_category_id`) REFERENCES `mini_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `extra_mini_category_product`
--
ALTER TABLE `extra_mini_category_product`
  ADD CONSTRAINT `extra_mini_category_product_extra_mini_categories_id_foreign` FOREIGN KEY (`extra_mini_category_id`) REFERENCES `extra_mini_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `extra_mini_category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mini_category_product`
--
ALTER TABLE `mini_category_product`
  ADD CONSTRAINT `mini_category_product_mini_category_id_foreign` FOREIGN KEY (`mini_category_id`) REFERENCES `mini_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mini_category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unproducts`
--
ALTER TABLE `unproducts`
  ADD CONSTRAINT `unproducts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
