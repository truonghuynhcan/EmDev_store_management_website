-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2024 at 04:10 PM
-- Server version: 5.7.40-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fifqrvy41ga2_emdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Food', NULL, NULL),
(2, 'Drink', NULL, NULL),
(3, 'combo', NULL, NULL);

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_07_11_041158_create_orders_table', 1),
(4, '2024_07_11_041918_create_categories_table', 1),
(5, '2024_07_11_042008_create_products_table', 1),
(6, '2024_07_11_042032_create_order_details_table', 1),
(7, '2024_07_20_141313_create_stock_entries_table', 2),
(8, '2024_07_20_141911_create_stock_items_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` set('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: nam, 1: nữ',
  `total_money` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('cart','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cart',
  `payment` enum('cash','bank_transfer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `lucky` enum('no','yes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `gift` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_admin`, `name_user`, `gender`, `total_money`, `quantity`, `status`, `payment`, `lucky`, `gift`, `created_at`, `updated_at`) VALUES
(27, 1, NULL, '0', '89000', '5', 'paid', 'cash', 'yes', 'Móc khóa', '2024-07-14 06:17:19', '2024-07-15 00:16:58'),
(28, 2, NULL, '0', '25000', '1', 'paid', 'cash', 'yes', 'Stiker', '2024-07-15 00:32:55', '2024-07-15 00:34:08'),
(29, 4, NULL, '0', '25000', '2', 'paid', 'cash', 'yes', 'May mắn lần sau', '2024-07-15 00:52:31', '2024-07-15 00:53:24'),
(30, 5, NULL, '0', '17000', '1', 'paid', 'cash', 'no', NULL, '2024-07-15 00:53:25', '2024-07-15 00:53:40'),
(31, 6, NULL, '0', '24000', '2', 'paid', 'cash', 'yes', 'Stiker', '2024-07-15 01:05:20', '2024-07-15 01:06:17'),
(32, 7, 'Đơn 31', '0', '7000', '1', 'paid', 'cash', 'no', NULL, '2024-07-15 01:06:28', '2024-07-15 01:06:45'),
(33, 8, NULL, '0', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-15 01:07:18', '2024-07-15 01:07:23'),
(34, 1, 'Gv', '1', '25000', '1', 'paid', 'cash', 'yes', 'Gấu bông', '2024-07-15 01:08:56', '2024-07-15 01:09:14'),
(35, 2, NULL, '0', '35000', '2', 'paid', 'cash', 'yes', 'Stiker', '2024-07-15 01:13:48', '2024-07-15 01:16:27'),
(36, 4, 'Giang', '0', '30000', '2', 'paid', 'cash', 'yes', 'Stiker', '2024-07-15 02:39:54', '2024-07-15 02:41:31'),
(37, 5, NULL, '0', '14000', '2', 'paid', 'cash', 'no', NULL, '2024-07-15 02:41:35', '2024-07-15 02:41:44'),
(38, 6, NULL, '0', '30000', '2', 'paid', 'cash', 'yes', 'Móc khóa', '2024-07-15 02:42:37', '2024-07-15 02:42:53'),
(45, 6, NULL, '0', '15000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 00:58:16', '2024-07-16 00:58:46'),
(46, 7, NULL, '0', '30000', '3', 'paid', 'cash', 'yes', NULL, '2024-07-16 00:58:56', '2024-07-16 00:59:57'),
(47, 8, NULL, '0', '10000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 01:00:12', '2024-07-16 01:00:37'),
(48, 4, NULL, '0', '10000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 01:00:47', '2024-07-16 01:00:56'),
(49, 1, NULL, '1', '10000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 01:01:01', '2024-07-16 01:01:11'),
(50, 1, NULL, '1', '17000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 01:01:18', '2024-07-16 01:02:35'),
(51, 2, NULL, '1', '20000', '2', 'paid', 'cash', 'no', NULL, '2024-07-16 01:02:51', '2024-07-16 01:03:12'),
(52, 2, NULL, '1', '30000', '3', 'paid', 'cash', 'yes', NULL, '2024-07-16 01:23:04', '2024-07-16 01:23:44'),
(53, 1, NULL, '0', '40000', '4', 'paid', 'cash', 'yes', NULL, '2024-07-16 01:24:07', '2024-07-16 01:24:17'),
(54, 1, NULL, '0', '25000', '1', 'paid', 'cash', 'yes', NULL, '2024-07-16 01:24:26', '2024-07-16 01:24:29'),
(55, 8, NULL, '0', '20000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 01:24:35', '2024-07-16 01:24:50'),
(56, 6, NULL, '0', '60000', '6', 'paid', 'cash', 'yes', NULL, '2024-07-16 01:24:59', '2024-07-16 01:25:21'),
(57, 8, NULL, '0', '14000', '2', 'paid', 'cash', 'no', NULL, '2024-07-16 01:25:29', '2024-07-16 01:25:35'),
(58, 1, 'Khách hành lang', '0', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 02:34:38', '2024-07-16 02:34:50'),
(59, 2, NULL, '0', '15000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 03:31:44', '2024-07-16 03:32:04'),
(60, 4, NULL, '0', '25000', '1', 'paid', 'cash', 'yes', NULL, '2024-07-16 03:32:05', '2024-07-16 03:32:11'),
(61, 5, NULL, '0', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 03:32:18', '2024-07-16 03:32:24'),
(62, 6, NULL, '0', '25000', '1', 'paid', 'cash', 'yes', NULL, '2024-07-16 03:32:27', '2024-07-16 03:32:35'),
(63, 7, NULL, '0', '17000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 03:32:40', '2024-07-16 03:32:49'),
(64, 8, NULL, '0', '14000', '2', 'paid', 'cash', 'no', NULL, '2024-07-16 03:32:55', '2024-07-16 03:50:08'),
(65, 2, NULL, '0', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 03:50:13', '2024-07-16 03:50:23'),
(66, 1, NULL, '1', '7000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 03:50:35', '2024-07-16 03:50:42'),
(67, 4, NULL, '1', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 03:50:46', '2024-07-16 04:12:58'),
(68, 1, NULL, '0', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 04:13:00', '2024-07-16 04:13:05'),
(69, 1, NULL, '1', '25000', '1', 'paid', 'cash', 'yes', NULL, '2024-07-16 04:13:08', '2024-07-16 04:13:13'),
(70, 5, NULL, '1', '20000', '2', 'paid', 'cash', 'no', NULL, '2024-07-16 04:13:28', '2024-07-16 04:13:39'),
(71, 6, NULL, '1', '7000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 04:13:41', '2024-07-16 04:13:45'),
(72, 7, NULL, '0', '30000', '2', 'paid', 'cash', 'yes', NULL, '2024-07-16 04:13:47', '2024-07-16 04:13:58'),
(73, 8, NULL, '0', '60000', '3', 'paid', 'cash', 'yes', NULL, '2024-07-16 04:14:16', '2024-07-16 04:14:21'),
(74, 1, NULL, '0', '15000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 04:14:30', '2024-07-16 04:14:34'),
(75, 2, NULL, '0', '21000', '3', 'paid', 'cash', 'no', NULL, '2024-07-16 04:14:43', '2024-07-16 04:15:05'),
(76, 4, NULL, '0', '45000', '3', 'paid', 'cash', 'yes', NULL, '2024-07-16 04:15:12', '2024-07-16 04:15:26'),
(77, 8, 'Bạn Tú', '0', '22000', '2', 'paid', 'cash', 'no', NULL, '2024-07-16 23:05:49', '2024-07-16 23:06:03'),
(78, 8, 'Bạn Tú', '0', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-16 23:26:02', '2024-07-16 23:26:09'),
(79, 7, NULL, '0', '25000', '1', 'paid', 'cash', 'yes', 'May mắn lần sau', '2024-07-16 23:54:28', '2024-07-16 23:55:05'),
(80, 8, 'T305', '1', '14000', '2', 'paid', 'cash', 'no', NULL, '2024-07-17 00:02:06', '2024-07-17 00:02:35'),
(81, 4, 'T305', '0', '15000', '1', 'paid', 'cash', 'no', NULL, '2024-07-17 00:02:40', '2024-07-17 00:02:51'),
(82, 4, 'T305', '0', '10000', '1', 'paid', 'cash', 'no', NULL, '2024-07-17 00:02:53', '2024-07-17 00:03:05'),
(83, 5, 'T305', '0', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-17 00:03:57', '2024-07-17 00:04:08'),
(85, 2, 'T305', '1', '10000', '1', 'paid', 'cash', 'no', NULL, '2024-07-17 00:05:51', '2024-07-17 00:05:57'),
(86, 1, NULL, '0', '32000', '3', 'paid', 'cash', 'yes', 'Móc khóa', '2024-07-17 00:30:31', '2024-07-17 00:32:03'),
(87, 2, NULL, '0', '50000', '5', 'paid', 'cash', 'yes', 'Stiker', '2024-07-17 00:32:44', '2024-07-17 00:33:38'),
(88, 8, NULL, '1', '24000', '2', 'paid', 'cash', 'yes', 'Móc khóa', '2024-07-17 00:40:26', '2024-07-17 00:40:59'),
(89, 8, NULL, '0', '24000', '2', 'paid', 'cash', 'yes', 'Móc khóa', '2024-07-17 00:41:09', '2024-07-17 00:41:32'),
(90, 6, NULL, '0', '25000', '1', 'paid', 'cash', 'yes', 'May mắn lần sau', '2024-07-17 00:42:06', '2024-07-17 00:43:55'),
(91, 5, 'T320', '0', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-17 00:46:38', '2024-07-17 00:46:59'),
(92, 2, NULL, '0', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-17 00:48:35', '2024-07-17 00:48:41'),
(93, 4, NULL, '1', '30000', '2', 'paid', 'cash', 'yes', 'Stiker', '2024-07-17 01:01:16', '2024-07-17 01:01:48'),
(94, 2, NULL, '0', '25000', '1', 'paid', 'cash', 'yes', 'Móc khóa', '2024-07-17 01:01:49', '2024-07-17 01:03:17'),
(95, 2, NULL, '0', '32000', '2', 'paid', 'cash', 'yes', 'Stiker', '2024-07-17 01:03:41', '2024-07-17 01:04:32'),
(96, 8, NULL, '0', '24000', '2', 'paid', 'cash', 'yes', 'Móc khóa', '2024-07-17 01:05:32', '2024-07-17 01:06:32'),
(98, 4, 'T302', '0', '54000', '4', 'paid', 'cash', 'yes', NULL, '2024-07-17 01:19:36', '2024-07-17 01:20:11'),
(99, 8, 'Phòng T301', '0', '77000', '8', 'paid', 'cash', 'yes', NULL, '2024-07-17 01:50:27', '2024-07-17 01:51:29'),
(100, 5, NULL, '0', '25000', '1', 'paid', 'cash', 'yes', 'Gấu bông', '2024-07-17 23:44:54', '2024-07-17 23:45:36'),
(101, 8, NULL, '0', '25000', '1', 'paid', 'cash', 'yes', NULL, '2024-07-17 23:45:42', '2024-07-17 23:46:57'),
(102, 2, 'Bạn Tú', '1', '22000', '2', 'paid', 'cash', 'no', NULL, '2024-07-17 23:59:49', '2024-07-18 00:00:05'),
(103, 7, 'T1014', '0', '25000', '1', 'paid', 'cash', 'yes', NULL, '2024-07-18 00:00:09', '2024-07-18 00:00:41'),
(104, 1, 'T1004', '0', '15000', '1', 'paid', 'cash', 'no', NULL, '2024-07-18 00:01:01', '2024-07-18 00:01:12'),
(105, 6, 'T1004', '0', '14000', '2', 'paid', 'cash', 'no', NULL, '2024-07-18 00:01:14', '2024-07-18 00:01:36'),
(107, 4, 'T1004', '0', '14000', '2', 'paid', 'cash', 'no', NULL, '2024-07-18 00:05:46', '2024-07-18 00:05:56'),
(108, 1, NULL, '0', '25000', '1', 'paid', 'cash', 'yes', 'Móc khóa', '2024-07-18 00:50:09', '2024-07-18 00:51:04'),
(109, 1, NULL, '0', '25000', '1', 'paid', 'cash', 'yes', 'May mắn lần sau', '2024-07-18 00:51:06', '2024-07-18 00:51:35'),
(111, 1, NULL, '0', '25000', '1', 'paid', 'cash', 'yes', 'May mắn lần sau', '2024-07-18 01:00:42', '2024-07-18 01:01:03'),
(112, 1, NULL, '1', '25000', '1', 'paid', 'cash', 'yes', 'Móc khóa', '2024-07-18 01:12:35', '2024-07-18 01:13:32'),
(113, 5, NULL, '0', '30000', '2', 'paid', 'cash', 'yes', 'Móc khóa', '2024-07-18 01:24:13', '2024-07-18 01:24:58'),
(114, 1, NULL, '0', '30000', '3', 'paid', 'cash', 'yes', 'Móc khóa', '2024-07-18 01:25:11', '2024-07-18 01:26:43'),
(115, 8, 'F206', '0', '25000', '1', 'paid', 'cash', 'yes', 'May mắn lần sau', '2024-07-18 03:25:04', '2024-07-18 03:25:33'),
(116, 1, 'F206', '1', '25000', '1', 'paid', 'cash', 'yes', 'May mắn lần sau', '2024-07-18 03:25:35', '2024-07-18 03:25:55'),
(117, 4, 'F206', '0', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-18 03:28:17', '2024-07-18 03:28:28'),
(118, 2, 'F206', '0', '27000', '3', 'paid', 'cash', 'yes', NULL, '2024-07-18 03:29:15', '2024-07-18 03:29:29'),
(119, 1, 'T1004', '0', '20000', '1', 'paid', 'cash', 'no', NULL, '2024-07-18 04:11:22', '2024-07-19 02:38:07'),
(120, 1, 'T803', '0', '59000', '7', 'paid', 'cash', 'yes', NULL, '2024-07-19 02:38:08', '2024-07-19 02:38:49'),
(121, 1, 'T807', '0', '32000', '3', 'paid', 'cash', 'yes', NULL, '2024-07-19 02:38:53', '2024-07-19 02:39:17'),
(122, 4, 'T808', '0', '14000', '2', 'paid', 'cash', 'no', NULL, '2024-07-19 02:39:24', '2024-07-19 02:39:46'),
(123, 5, 'F209', '1', '41000', '5', 'paid', 'cash', 'yes', NULL, '2024-07-19 02:39:48', '2024-07-19 02:40:25'),
(124, 6, 'F306', '0', '55000', '4', 'paid', 'cash', 'yes', NULL, '2024-07-19 02:40:28', '2024-07-19 02:41:05'),
(125, 7, 'F207', '0', '99000', '6', 'paid', 'cash', 'yes', NULL, '2024-07-19 02:41:13', '2024-07-19 02:41:39'),
(126, 6, 'trong lớp', '0', '35000', '5', 'paid', 'cash', 'yes', NULL, '2024-07-19 02:41:42', '2024-07-19 02:42:14'),
(127, 5, 'T301', '0', '77000', '8', 'paid', 'cash', 'yes', NULL, '2024-07-19 02:43:19', '2024-07-19 02:43:54'),
(128, 4, 'thêm đơn hàng thiếu', '0', '814000', '56', 'paid', 'cash', 'yes', NULL, '2024-07-18 03:03:29', '2024-07-19 03:06:39'),
(129, 2, NULL, '1', '34000', '2', 'paid', 'cash', 'yes', 'Stiker', '2024-07-20 00:36:43', '2024-07-20 00:37:26'),
(130, 4, NULL, '0', '24000', '2', 'paid', 'cash', 'yes', 'Bánh miếng cay', '2024-07-20 00:38:39', '2024-07-20 00:39:19'),
(131, 4, NULL, '0', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-20 00:40:15', '2024-07-20 00:40:22'),
(132, 6, 'T1011', '0', '29000', '2', 'paid', 'cash', 'yes', NULL, '2024-07-20 00:49:12', '2024-07-20 00:49:29'),
(133, 7, 'Triết', '0', '34000', '2', 'paid', 'cash', 'yes', NULL, '2024-07-20 04:11:11', '2024-07-20 04:15:32'),
(134, 2, 'T1007', '0', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-20 04:16:06', '2024-07-20 04:16:23'),
(135, 4, 'T207', '0', '28000', '4', 'paid', 'cash', 'yes', NULL, '2024-07-20 04:16:29', '2024-07-20 04:16:56'),
(136, 5, 'F211', '0', '17000', '1', 'paid', 'cash', 'no', NULL, '2024-07-20 04:17:10', '2024-07-20 04:17:42'),
(137, 2, 'F211', '0', '17000', '1', 'paid', 'cash', 'no', NULL, '2024-07-20 04:17:44', '2024-07-20 04:17:55'),
(138, 6, 'F211', '0', '75000', '5', 'paid', 'cash', 'yes', NULL, '2024-07-20 04:17:57', '2024-07-20 04:18:18'),
(140, 1, 'Vốn dự phòng', '0', '12000', '1', 'paid', 'cash', 'no', NULL, '2024-07-20 08:26:44', '2024-07-20 08:26:56'),
(141, 1, 'T1011', '0', '104000', '7', 'paid', 'cash', 'yes', NULL, '2024-07-20 08:30:11', '2024-07-20 08:30:33'),
(143, 1, NULL, '0', NULL, NULL, 'cart', 'cash', 'no', NULL, '2024-08-09 08:15:21', '2024-08-09 08:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `quantity` double UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `id_product`, `id_order`, `name`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(24, 14, 27, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-15 00:16:38', '2024-07-15 00:16:38'),
(25, 15, 27, 'Combo 2 - Bánh tráng, Trà tắc', 20000, 2, '2024-07-15 00:16:38', '2024-07-15 00:16:38'),
(26, 16, 27, 'Combo 3 - Bánh miếng cay, Trà tắc', 17000, 1, '2024-07-15 00:16:38', '2024-07-15 00:16:38'),
(27, 2, 27, 'Snack hương bò thơm cay', 7000, 1, '2024-07-15 00:16:38', '2024-07-15 00:16:38'),
(28, 14, 28, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-15 00:33:02', '2024-07-15 00:33:02'),
(29, 17, 29, 'Combo 4 - Bánh miếng cay, Bánh tráng', 15000, 1, '2024-07-15 00:52:49', '2024-07-15 00:52:49'),
(30, 13, 29, 'Bánh tráng Hồng Hạnh', 10000, 1, '2024-07-15 00:52:49', '2024-07-15 00:52:49'),
(31, 16, 30, 'Combo 3 - Bánh miếng cay, Trà tắc', 17000, 1, '2024-07-15 00:53:40', '2024-07-15 00:53:40'),
(32, 16, 31, 'Combo 3 - Bánh miếng cay, Trà tắc', 17000, 1, '2024-07-15 01:05:54', '2024-07-15 01:05:54'),
(33, 2, 31, 'Snack hương bò thơm cay', 7000, 1, '2024-07-15 01:05:54', '2024-07-15 01:05:54'),
(34, 2, 32, 'Snack hương bò thơm cay', 7000, 1, '2024-07-15 01:06:45', '2024-07-15 01:06:45'),
(35, 1, 33, 'Trà tắc', 12000, 1, '2024-07-15 01:07:23', '2024-07-15 01:07:23'),
(36, 14, 34, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-15 01:09:03', '2024-07-15 01:09:03'),
(37, 14, 35, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-15 01:14:49', '2024-07-15 01:14:49'),
(38, 13, 35, 'Bánh tráng Hồng Hạnh', 10000, 1, '2024-07-15 01:14:49', '2024-07-15 01:14:49'),
(39, 17, 36, 'Combo 4 - Bánh miếng cay, Bánh tráng', 15000, 2, '2024-07-15 02:41:18', '2024-07-15 02:41:18'),
(40, 2, 37, 'Snack hương bò thơm cay', 7000, 2, '2024-07-15 02:41:44', '2024-07-15 02:41:44'),
(41, 17, 38, 'Combo 4 - Bánh miếng cay, Bánh tráng', 15000, 2, '2024-07-15 02:42:43', '2024-07-15 02:42:43'),
(47, 17, 45, 'Combo 4 - Bánh miếng cay, Bánh tráng', 15000, 1, '2024-07-16 00:58:46', '2024-07-16 00:58:46'),
(48, 13, 46, 'Bánh tráng Hồng Hạnh', 10000, 3, '2024-07-16 00:59:57', '2024-07-16 00:59:57'),
(49, 13, 47, 'Bánh tráng Hồng Hạnh', 10000, 1, '2024-07-16 01:00:37', '2024-07-16 01:00:37'),
(50, 13, 48, 'Bánh tráng Hồng Hạnh', 10000, 1, '2024-07-16 01:00:56', '2024-07-16 01:00:56'),
(51, 13, 49, 'Bánh tráng Hồng Hạnh', 10000, 1, '2024-07-16 01:01:11', '2024-07-16 01:01:11'),
(52, 16, 50, 'Combo 3 - Bánh miếng cay, Trà tắc', 17000, 1, '2024-07-16 01:02:35', '2024-07-16 01:02:35'),
(53, 13, 51, 'Bánh tráng Hồng Hạnh', 10000, 2, '2024-07-16 01:03:12', '2024-07-16 01:03:12'),
(54, 13, 52, 'Bánh tráng Hồng Hạnh', 10000, 3, '2024-07-16 01:23:44', '2024-07-16 01:23:44'),
(55, 13, 53, 'Bánh tráng Hồng Hạnh', 10000, 4, '2024-07-16 01:24:17', '2024-07-16 01:24:17'),
(56, 14, 54, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-16 01:24:29', '2024-07-16 01:24:29'),
(57, 15, 55, 'Combo 2 - Bánh tráng, Trà tắc', 20000, 1, '2024-07-16 01:24:50', '2024-07-16 01:24:50'),
(58, 13, 56, 'Bánh tráng Hồng Hạnh', 10000, 6, '2024-07-16 01:25:21', '2024-07-16 01:25:21'),
(59, 2, 57, 'Snack hương bò thơm cay', 7000, 2, '2024-07-16 01:25:35', '2024-07-16 01:25:35'),
(60, 1, 58, 'Trà tắc', 12000, 1, '2024-07-16 02:34:50', '2024-07-16 02:34:50'),
(61, 17, 59, 'Combo 4 - Bánh miếng cay, Bánh tráng', 15000, 1, '2024-07-16 03:32:04', '2024-07-16 03:32:04'),
(62, 14, 60, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-16 03:32:11', '2024-07-16 03:32:11'),
(63, 1, 61, 'Trà tắc', 12000, 1, '2024-07-16 03:32:24', '2024-07-16 03:32:24'),
(64, 14, 62, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-16 03:32:35', '2024-07-16 03:32:35'),
(65, 16, 63, 'Combo 3 - Bánh miếng cay, Trà tắc', 17000, 1, '2024-07-16 03:32:49', '2024-07-16 03:32:49'),
(66, 2, 64, 'Snack hương bò thơm cay', 7000, 2, '2024-07-16 03:50:08', '2024-07-16 03:50:08'),
(67, 1, 65, 'Trà tắc', 12000, 1, '2024-07-16 03:50:23', '2024-07-16 03:50:23'),
(68, 2, 66, 'Snack hương bò thơm cay', 7000, 1, '2024-07-16 03:50:42', '2024-07-16 03:50:42'),
(69, 1, 67, 'Trà tắc', 12000, 1, '2024-07-16 04:12:58', '2024-07-16 04:12:58'),
(70, 1, 68, 'Trà tắc', 12000, 1, '2024-07-16 04:13:05', '2024-07-16 04:13:05'),
(71, 14, 69, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-16 04:13:13', '2024-07-16 04:13:13'),
(72, 13, 70, 'Bánh tráng Hồng Hạnh', 10000, 2, '2024-07-16 04:13:39', '2024-07-16 04:13:39'),
(73, 2, 71, 'Snack hương bò thơm cay', 7000, 1, '2024-07-16 04:13:45', '2024-07-16 04:13:45'),
(74, 17, 72, 'Combo 4 - Bánh miếng cay, Bánh tráng', 15000, 2, '2024-07-16 04:13:59', '2024-07-16 04:13:59'),
(75, 15, 73, 'Combo 2 - Bánh tráng, Trà tắc', 20000, 3, '2024-07-16 04:14:21', '2024-07-16 04:14:21'),
(76, 17, 74, 'Combo 4 - Bánh miếng cay, Bánh tráng', 15000, 1, '2024-07-16 04:14:34', '2024-07-16 04:14:34'),
(77, 2, 75, 'Snack hương bò thơm cay', 7000, 3, '2024-07-16 04:15:05', '2024-07-16 04:15:05'),
(78, 17, 76, 'Combo 4 - Bánh miếng cay, Bánh tráng', 15000, 3, '2024-07-16 04:15:26', '2024-07-16 04:15:26'),
(79, 13, 77, 'Bánh tráng Hồng Hạnh', 10000, 1, '2024-07-16 23:06:03', '2024-07-16 23:06:03'),
(80, 1, 77, 'Trà tắc', 12000, 1, '2024-07-16 23:06:03', '2024-07-16 23:06:03'),
(81, 1, 78, 'Trà tắc', 12000, 1, '2024-07-16 23:26:09', '2024-07-16 23:26:09'),
(82, 14, 79, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-16 23:54:45', '2024-07-16 23:54:45'),
(83, 2, 80, 'Snack hương bò thơm cay', 7000, 2, '2024-07-17 00:02:35', '2024-07-17 00:02:35'),
(84, 17, 81, 'Combo 4 - Bánh miếng cay, Bánh tráng', 15000, 1, '2024-07-17 00:02:51', '2024-07-17 00:02:51'),
(85, 13, 82, 'Bánh tráng Hồng Hạnh', 10000, 1, '2024-07-17 00:03:05', '2024-07-17 00:03:05'),
(86, 1, 83, 'Trà tắc', 12000, 1, '2024-07-17 00:04:08', '2024-07-17 00:04:08'),
(88, 13, 85, 'Bánh tráng Hồng Hạnh', 10000, 1, '2024-07-17 00:05:57', '2024-07-17 00:05:57'),
(89, 13, 86, 'Bánh tráng Hồng Hạnh', 10000, 2, '2024-07-17 00:31:18', '2024-07-17 00:31:18'),
(90, 1, 86, 'Trà tắc', 12000, 1, '2024-07-17 00:31:18', '2024-07-17 00:31:18'),
(91, 13, 87, 'Bánh tráng Hồng Hạnh', 10000, 5, '2024-07-17 00:32:51', '2024-07-17 00:32:51'),
(92, 1, 88, 'Trà tắc', 12000, 2, '2024-07-17 00:40:35', '2024-07-17 00:40:35'),
(93, 1, 89, 'Trà tắc', 12000, 2, '2024-07-17 00:41:13', '2024-07-17 00:41:13'),
(94, 14, 90, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-17 00:43:35', '2024-07-17 00:43:35'),
(95, 1, 91, 'Trà tắc', 12000, 1, '2024-07-17 00:46:59', '2024-07-17 00:46:59'),
(96, 1, 92, 'Trà tắc', 12000, 1, '2024-07-17 00:48:41', '2024-07-17 00:48:41'),
(97, 15, 93, 'Combo 2 - Bánh tráng, Trà tắc', 20000, 1, '2024-07-17 01:01:25', '2024-07-17 01:01:25'),
(98, 13, 93, 'Bánh tráng Hồng Hạnh', 10000, 1, '2024-07-17 01:01:25', '2024-07-17 01:01:25'),
(99, 14, 94, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-17 01:01:52', '2024-07-17 01:01:52'),
(100, 15, 95, 'Combo 2 - Bánh tráng, Trà tắc', 20000, 1, '2024-07-17 01:03:56', '2024-07-17 01:03:56'),
(101, 1, 95, 'Trà tắc', 12000, 1, '2024-07-17 01:03:56', '2024-07-17 01:03:56'),
(102, 1, 96, 'Trà tắc', 12000, 2, '2024-07-17 01:06:01', '2024-07-17 01:06:01'),
(106, 15, 98, 'Combo 2 - Bánh tráng, Trà tắc', 20000, 1, '2024-07-17 01:20:11', '2024-07-17 01:20:11'),
(107, 13, 98, 'Bánh tráng Hồng Hạnh', 10000, 1, '2024-07-17 01:20:11', '2024-07-17 01:20:11'),
(108, 1, 98, 'Trà tắc', 12000, 2, '2024-07-17 01:20:11', '2024-07-17 01:20:11'),
(109, 17, 99, 'Combo 4 - Bánh miếng cay, Bánh tráng', 15000, 2, '2024-07-17 01:51:29', '2024-07-17 01:51:29'),
(110, 2, 99, 'Snack hương bò thơm cay', 7000, 5, '2024-07-17 01:51:29', '2024-07-17 01:51:29'),
(111, 1, 99, 'Trà tắc', 12000, 1, '2024-07-17 01:51:29', '2024-07-17 01:51:29'),
(112, 14, 100, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-17 23:44:59', '2024-07-17 23:44:59'),
(113, 14, 101, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-17 23:46:57', '2024-07-17 23:46:57'),
(114, 13, 102, 'Bánh tráng Hồng Hạnh', 10000, 1, '2024-07-18 00:00:05', '2024-07-18 00:00:05'),
(115, 1, 102, 'Trà tắc', 12000, 1, '2024-07-18 00:00:05', '2024-07-18 00:00:05'),
(116, 14, 103, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-18 00:00:41', '2024-07-18 00:00:41'),
(117, 17, 104, 'Combo 4 - Bánh miếng cay, Bánh tráng', 15000, 1, '2024-07-18 00:01:12', '2024-07-18 00:01:12'),
(118, 2, 105, 'Snack hương bò thơm cay', 7000, 2, '2024-07-18 00:01:36', '2024-07-18 00:01:36'),
(120, 2, 107, 'Snack hương bò thơm cay', 7000, 2, '2024-07-18 00:05:56', '2024-07-18 00:05:56'),
(121, 14, 108, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-18 00:50:43', '2024-07-18 00:50:43'),
(122, 14, 109, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-18 00:51:10', '2024-07-18 00:51:10'),
(124, 14, 111, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-18 01:00:46', '2024-07-18 01:00:46'),
(125, 14, 112, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-18 01:13:04', '2024-07-18 01:13:04'),
(126, 15, 113, 'Combo 2 - Bánh tráng, Trà tắc', 20000, 1, '2024-07-18 01:24:24', '2024-07-18 01:24:24'),
(127, 13, 113, 'Bánh tráng Hồng Hạnh', 10000, 1, '2024-07-18 01:24:24', '2024-07-18 01:24:24'),
(128, 13, 114, 'Bánh tráng Hồng Hạnh', 10000, 3, '2024-07-18 01:25:51', '2024-07-18 01:25:51'),
(129, 14, 115, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-18 03:25:15', '2024-07-18 03:25:15'),
(130, 14, 116, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-18 03:25:41', '2024-07-18 03:25:41'),
(131, 1, 117, 'Trà tắc', 12000, 1, '2024-07-18 03:28:28', '2024-07-18 03:28:28'),
(132, 2, 118, 'Snack hương bò thơm cay', 7000, 1, '2024-07-18 03:29:29', '2024-07-18 03:29:29'),
(133, 13, 118, 'Bánh tráng Hồng Hạnh', 10000, 2, '2024-07-18 03:29:29', '2024-07-18 03:29:29'),
(134, 15, 119, 'Combo 2 - Bánh tráng, Trà tắc', 20000, 1, '2024-07-19 02:38:07', '2024-07-19 02:38:07'),
(135, 2, 120, 'Snack hương bò thơm cay', 7000, 5, '2024-07-19 02:38:49', '2024-07-19 02:38:49'),
(136, 1, 120, 'Trà tắc', 12000, 2, '2024-07-19 02:38:49', '2024-07-19 02:38:49'),
(137, 13, 121, 'Bánh tráng Hồng Hạnh', 10000, 2, '2024-07-19 02:39:17', '2024-07-19 02:39:17'),
(138, 1, 121, 'Trà tắc', 12000, 1, '2024-07-19 02:39:17', '2024-07-19 02:39:17'),
(139, 2, 122, 'Snack hương bò thơm cay', 7000, 2, '2024-07-19 02:39:46', '2024-07-19 02:39:46'),
(140, 2, 123, 'Snack hương bò thơm cay', 7000, 3, '2024-07-19 02:40:25', '2024-07-19 02:40:25'),
(141, 13, 123, 'Bánh tráng Hồng Hạnh', 10000, 2, '2024-07-19 02:40:25', '2024-07-19 02:40:25'),
(142, 14, 124, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-19 02:41:05', '2024-07-19 02:41:05'),
(143, 13, 124, 'Bánh tráng Hồng Hạnh', 10000, 3, '2024-07-19 02:41:05', '2024-07-19 02:41:05'),
(144, 14, 125, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 1, '2024-07-19 02:41:39', '2024-07-19 02:41:39'),
(145, 15, 125, 'Combo 2 - Bánh tráng, Trà tắc', 20000, 1, '2024-07-19 02:41:39', '2024-07-19 02:41:39'),
(146, 16, 125, 'Combo 3 - Bánh miếng cay, Trà tắc', 17000, 2, '2024-07-19 02:41:40', '2024-07-19 02:41:40'),
(147, 13, 125, 'Bánh tráng Hồng Hạnh', 10000, 2, '2024-07-19 02:41:40', '2024-07-19 02:41:40'),
(148, 2, 126, 'Snack hương bò thơm cay', 7000, 5, '2024-07-19 02:42:14', '2024-07-19 02:42:14'),
(149, 17, 127, 'Combo 4 - Bánh miếng cay, Bánh tráng', 15000, 2, '2024-07-19 02:43:54', '2024-07-19 02:43:54'),
(150, 2, 127, 'Snack hương bò thơm cay', 7000, 5, '2024-07-19 02:43:54', '2024-07-19 02:43:54'),
(151, 1, 127, 'Trà tắc', 12000, 1, '2024-07-19 02:43:54', '2024-07-19 02:43:54'),
(152, 14, 128, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 25000, 7, '2024-07-19 03:06:39', '2024-07-19 03:06:39'),
(153, 17, 128, 'Combo 4 - Bánh miếng cay, Bánh tráng', 15000, 37, '2024-07-19 03:06:39', '2024-07-19 03:06:39'),
(154, 2, 128, 'Snack hương bò thơm cay', 7000, 12, '2024-07-19 03:06:39', '2024-07-19 03:06:39'),
(155, 16, 129, 'Combo 3 - Bánh miếng cay, Trà tắc', 17000, 2, '2024-07-20 00:37:11', '2024-07-20 00:37:11'),
(156, 1, 130, 'Trà tắc', 12000, 2, '2024-07-20 00:38:50', '2024-07-20 00:38:50'),
(157, 1, 131, 'Trà tắc', 12000, 1, '2024-07-20 00:40:22', '2024-07-20 00:40:22'),
(158, 16, 132, 'Combo 3 - Bánh miếng cay, Trà tắc', 17000, 1, '2024-07-20 00:49:29', '2024-07-20 00:49:29'),
(159, 1, 132, 'Trà tắc', 12000, 1, '2024-07-20 00:49:29', '2024-07-20 00:49:29'),
(160, 16, 133, 'Combo 3 - Bánh miếng cay, Trà tắc', 17000, 2, '2024-07-20 04:15:32', '2024-07-20 04:15:32'),
(161, 1, 134, 'Trà tắc', 12000, 1, '2024-07-20 04:16:23', '2024-07-20 04:16:23'),
(162, 2, 135, 'Snack hương bò thơm cay', 7000, 4, '2024-07-20 04:16:56', '2024-07-20 04:16:56'),
(163, 16, 136, 'Combo 3 - Bánh miếng cay, Trà tắc', 17000, 1, '2024-07-20 04:17:42', '2024-07-20 04:17:42'),
(164, 16, 137, 'Combo 3 - Bánh miếng cay, Trà tắc', 17000, 1, '2024-07-20 04:17:55', '2024-07-20 04:17:55'),
(165, 16, 138, 'Combo 3 - Bánh miếng cay, Trà tắc', 17000, 4, '2024-07-20 04:18:18', '2024-07-20 04:18:18'),
(166, 2, 138, 'Snack hương bò thơm cay', 7000, 1, '2024-07-20 04:18:18', '2024-07-20 04:18:18'),
(169, 1, 140, 'Trà tắc', 12000, 1, '2024-07-20 08:26:56', '2024-07-20 08:26:56'),
(170, 16, 141, 'Combo 3 - Bánh miếng cay, Trà tắc', 17000, 4, '2024-07-20 08:30:33', '2024-07-20 08:30:33'),
(171, 1, 141, 'Trà tắc', 12000, 3, '2024-07-20 08:30:33', '2024-07-20 08:30:33');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `sale_price` double DEFAULT NULL,
  `instock` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sold` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_category`, `name`, `image`, `price`, `sale_price`, `instock`, `sold`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Trà tắc', 'tra-tac.jpg', 13000, 12000, 100, 37, '1', '2024-07-10 23:31:24', '2024-07-20 08:30:33'),
(2, 1, 'Snack hương bò thơm cay', 'sanck-huong-bo-thom-cay.jpg', 9000, 7000, 100, 63, '1', '2024-07-10 23:31:24', '2024-07-20 04:18:18'),
(13, 1, 'Bánh tráng Hồng Hạnh', 'btt.jpg', 13000, 10000, 100, 53, '1', '2024-07-11 00:21:58', '2024-07-19 02:41:40'),
(14, 3, 'Combo 1 - Snack hương bò thơm cay, Bánh tráng trộn, Trà tắc', 'combo1.jpg', 29000, 25000, 100, 29, '1', '2024-07-12 00:57:57', '2024-07-19 03:06:39'),
(15, 3, 'Combo 2 - Bánh tráng, Trà tắc', 'combo2.jpg', 22000, 20000, 100, 12, '1', '2024-07-12 06:27:09', '2024-07-19 02:41:40'),
(16, 3, 'Combo 3 - Bánh miếng cay, Trà tắc', 'combo3.jpg', 19000, 17000, 100, 22, '1', '2024-07-12 06:27:09', '2024-07-20 08:30:33'),
(17, 3, 'Combo 4 - Bánh miếng cay, Bánh\r\ntráng', 'combo4.jpg', 17000, 15000, 100, 56, '1', '2024-07-12 06:30:17', '2024-07-19 03:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `stock_entries`
--

CREATE TABLE `stock_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double UNSIGNED DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_entries`
--

INSERT INTO `stock_entries` (`id`, `id_user`, `name`, `price`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nhập hàng lần 1', 772000, NULL, '2024-07-12 15:34:25', '2024-07-12 15:34:25'),
(2, 1, 'Nhập hàng lần 2', 719000, NULL, '2024-07-15 15:45:08', '2024-07-15 15:45:08'),
(3, 1, 'Nhập hàng lần 3', 78000, NULL, '2024-07-18 15:55:45', '2024-07-18 15:55:45'),
(4, 2, 'Nhập hàng lần 4', 75000, 'Nhập hàng quà tặng', '2024-07-16 05:22:14', '2024-07-16 05:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `stock_items`
--

CREATE TABLE `stock_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_stock_entry` bigint(20) UNSIGNED NOT NULL,
  `material_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double UNSIGNED NOT NULL,
  `unit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_items`
--

INSERT INTO `stock_items` (`id`, `id_stock_entry`, `material_product`, `name_product`, `quantity`, `unit`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Bánh Tráng', 50, 'bịch', 5500, '2024-07-12 15:37:03', '2024-07-12 15:37:03'),
(2, 1, NULL, 'Que Cay', 100, 'bịch', 1900, '2024-07-12 15:37:03', '2024-07-12 15:37:03'),
(4, 1, 'Trà', 'Trà tắc', 1, 'Hộp', 142000, '2024-07-12 15:37:03', '2024-07-12 15:37:03'),
(5, 1, 'Tắc', 'Trà tắc', 1, 'Bịch', 2000, '2024-07-12 15:37:03', '2024-07-12 15:37:03'),
(6, 1, 'Túi, ống hút', 'Trà tắc', 100, 'cái', 1290, '2024-07-12 15:37:03', '2024-07-12 15:37:03'),
(7, 1, 'Đường', 'Trà tắc', 1, 'Kg', 27000, '2024-07-12 15:37:03', '2024-07-12 15:37:03'),
(8, 1, 'Đá', 'Trà tắc', 1, 'Bịch', 7000, '2024-07-12 15:37:03', '2024-07-12 15:37:03'),
(9, 2, NULL, 'Bánh Tráng', 100, 'Bịch', 5000, '2024-07-15 15:45:08', '2024-07-15 15:45:08'),
(10, 2, NULL, 'Snack hương bò thơm cay', 100, 'Bịch', 19000, '2024-07-15 15:45:08', '2024-07-15 15:45:08'),
(11, 2, 'Tắc', 'Trà tắc', 2, 'Kg', 10000, '2024-07-15 15:45:08', '2024-07-15 15:45:08'),
(12, 2, 'Đường', 'Trà tắc', 1, 'Kg', 26000, '2024-07-15 15:45:08', '2024-07-15 15:45:08'),
(13, 2, 'Đá', 'Trà tắc', 2, 'Bịch', 5000, '2024-07-15 15:45:08', '2024-07-15 15:45:08'),
(14, 2, NULL, 'Túi đựng', 1, 'Kg', 30000, '2024-07-15 15:45:08', '2024-07-15 15:45:08'),
(15, 3, 'Tắc', 'Trà tắc', 3, 'Bịch', 5000, '2024-07-18 15:55:45', '2024-07-18 15:55:45'),
(16, 3, 'Đường', 'Trà tắc', 1, 'Kg', 28000, '2024-07-18 15:55:45', '2024-07-18 15:55:45'),
(17, 3, 'Đá', 'Trà tắc', 4, 'Bịch', 5000, '2024-07-18 15:55:45', '2024-07-18 15:55:45'),
(18, 3, 'Đường', 'Trà tắc', 1, 'Bịch', 15000, '2024-07-18 15:55:45', '2024-07-18 15:55:45'),
(19, 4, 'Quà tặng', 'Sticker Mẫu 19 - panda', 2, '6 tấm', 13600, '2024-07-16 05:21:10', '2024-07-16 05:21:42'),
(20, 4, 'Quà tặng', 'Sticker Mẫu 27 - mèo xinh', 2, '6 tấm', 13600, '2024-07-16 05:22:14', '2024-07-16 05:22:18'),
(24, 4, 'Quà tặng', 'Sticker Mẫu 31 - noel', 2, '6 tấm', 13600, '2024-07-16 05:22:14', '2024-07-16 05:22:14'),
(25, 4, 'Quà tặng', 'Móc khóa hoạt hình ', 5, 'cái', 14950, '2024-07-16 05:22:14', '2024-07-16 05:22:14'),
(26, 4, 'Quà tặng', 'Móc khóa', 5, 'cái', 19000, '2024-07-16 05:22:14', '2024-07-16 05:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Can Trương', 'truonghuynhcan@gmail.com', '$2y$12$p5xb9Aec5Bq7MZg0eHdqaO2yVPfQ5bYajR583xdhG0rTs31dcLLwW', '2024-07-10 23:07:07', '2024-07-10 23:07:07'),
(2, 'Nguyễn Ngọc Quỳnh Nhi', 'nnqn15@gmail.com', '$2y$12$lGwSLFy4SGnOxEjIEWbE7O5DpU4cXxbdNTBJmbYd5hdUeVn9bvcIK', '2024-07-12 21:27:05', '2024-08-14 03:24:00'),
(4, 'Nguyễn Phượng Xuân Mai', 'xuanmai@gmail.com', '$2y$12$yFLbWB9YW/rgYueTLxqGxeGOiRdP4HOsxfGleBlosxyfEqdrneRJK', '2024-07-25 12:19:39', '2024-07-25 12:19:39'),
(5, 'Nguyễn Hồng Triết', 'hongtriet@gmail.com', '$2y$12$/7s4KJGCUGaGmcU.83e/L.DUvwtLI9cp.SzsMFXLxxzim5Y5AXGWS', '2024-07-25 12:20:55', '2024-07-25 12:20:55'),
(6, 'Nguyễn Hoàng Dương', 'hoangduong@gmail.com', '$2y$12$5wLEfnSQ7RUhxxOfZDgVXegtAw0kZ.4oroD5tVxATcv.3RR2HXdjy', '2024-07-25 12:21:35', '2024-07-25 12:21:35'),
(7, 'Nguyễn Hoàng Gia Huy', 'giahuy@gmail.com', '$2y$12$FV14eL1SMPW5KadzxBDlYuxvuRmDqEfDwLWPrbSX0WlfovnaiNIQe', '2024-07-25 12:22:19', '2024-07-25 12:22:19'),
(8, 'Nguyễn Thái Tú', 'thaitu@gmail.com', '$2y$12$irjjFiDRLqDAYJt89yBhkuLrtGRWjjrNa/4xViKh0W8obfKQWbXhi', '2024-07-25 12:23:02', '2024-07-25 12:23:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `orders_id_admin_foreign` (`id_admin`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_id_product_foreign` (`id_product`),
  ADD KEY `order_details_id_order_foreign` (`id_order`);

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
  ADD KEY `products_id_category_foreign` (`id_category`);

--
-- Indexes for table `stock_entries`
--
ALTER TABLE `stock_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_entries_id_user_foreign` (`id_user`);

--
-- Indexes for table `stock_items`
--
ALTER TABLE `stock_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_items_id_stock_entry_foreign` (`id_stock_entry`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stock_entries`
--
ALTER TABLE `stock_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock_items`
--
ALTER TABLE `stock_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_entries`
--
ALTER TABLE `stock_entries`
  ADD CONSTRAINT `stock_entries_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_items`
--
ALTER TABLE `stock_items`
  ADD CONSTRAINT `stock_items_id_stock_entry_foreign` FOREIGN KEY (`id_stock_entry`) REFERENCES `stock_entries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
