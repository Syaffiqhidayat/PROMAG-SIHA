-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2026 at 01:26 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-qrcode`
--

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
-- Table structure for table `hardwares`
--

CREATE TABLE `hardwares` (
  `id` bigint UNSIGNED NOT NULL,
  `kd_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_iventaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spek` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `unit_id` bigint UNSIGNED NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardwares`
--

INSERT INTO `hardwares` (`id`, `kd_barang`, `no_iventaris`, `nama_barang`, `jenis_barang`, `merek`, `tipe`, `spek`, `keterangan`, `unit_id`, `tanggal_masuk`, `created_at`, `updated_at`) VALUES
(1, 'BRG-001', '12341234', 'Lorem aliqua Velit', 'CPU/Komputer', 'lenovo', 'ThinkCentre M80t Gen 3 (Intel)', 'Esse nostrum accusa', 'Ut sequi asperiores', 4, '2026-03-13', '2026-03-15 21:10:29', '2026-03-15 21:10:29'),
(2, 'RGB-010', '2025asdasd', 'Consequatur Eveniet', 'Laptop', 'lenovo', 'ThinkPad X1 carbon', 'Sed qui et iste dolo', 'Nobis dolor aspernat', 11, '2025-03-16', '2026-03-15 21:14:34', '2026-03-17 07:17:28'),
(3, 'GRB-321', '2026jkljkl', 'Impedit sint eos vo', 'CPU/Komputer', 'Dell', 'Dell Latitude 3420', 'Intel i7 1165G7/RAM 8GB/SSD 512GB /Win 11 H', 'hehehehehehehehehehehehehe\r\nwkwkwkwkwkwkwkwkwkwkwkw\r\nhahahahahahahahahahahahaha', 9, '2026-02-10', '2026-03-15 21:19:11', '2026-03-18 04:26:25'),
(4, 'Laboris eum perferen', 'Rerum ut debitis sun', 'Accusantium aut quae', 'Scaner', 'Perspiciatis molest', 'Est sit tempora quo', 'Rerum voluptatem Ob', 'Sit exercitationem', 13, '2010-03-28', '2026-03-16 23:19:36', '2026-03-16 23:19:36'),
(6, 'ASD_123', '2026asd', 'laptop', 'Laptop', 'Acer', 'Swift Go AI SFG14', 'Intel Core Ultra 5 + NPU AI Boost\r\n16GB LPDDR5X\r\n512GB SSD\r\n14\" IPS 2.8K (2880×1800)\r\nIntel Iris Xe', 'tung tung tung sahur', 28, '2026-03-23', '2026-03-23 04:38:27', '2026-03-26 02:08:04'),
(7, 'QWE_213', '2026owei', 'laptop', 'Laptop', 'MSI', 'Modern 14 C11M', 'Intel Core i3-1115G4\r\n8GB DDR4\r\n512GB SSD\r\n14\" IPS FHD+ (1920×1200)\r\nIntel UHD', 'hidup jokiwiiiiiiiiiiiiiii', 16, '2021-03-23', '2026-03-23 04:48:12', '2026-03-29 23:56:48'),
(8, 'FGH_546', '2026lihol', 'laptop', 'Laptop', 'Lenovo', 'LOQ 15IAX9I', 'LOQ 15IAX9I\r\n8GB DDR5\r\n512GB SSD\r\n15.6\" FHD+ 120Hz\r\nNVIDIA RTX 3050', 'hei antek antek asinggggg', 6, '2026-03-23', '2026-03-23 05:00:18', '2026-03-30 02:12:27'),
(9, 'GES_113', '2026dsf', 'laptop', 'Laptop', 'Microsoft', 'Surface Laptop 5', 'Intel Core i7-1265U\r\n16GB LPDDR4x\r\n512GB SSD\r\n13.5\" PixelSense (2256×1504)\r\nIntel Iris Xe', 'ambatukam', 30, '2026-03-23', '2026-03-23 05:05:13', '2026-03-30 01:58:23'),
(10, 'CSA_127', '2026vgrv5', 'laptop', 'Laptop', 'ASUS', 'ROG Strix SCAR 18', 'Intel Core i9-14900HX\r\n32GB DDR5\r\n1TB SSD\r\n18\" QHD+ 240Hz\r\nNVIDIA RTX 4090', 'jdsfjdshj', 6, '2026-03-23', '2026-03-23 05:10:56', '2026-03-31 05:55:55'),
(11, 'SDF_541', '2026jjk', 'laptop', 'Laptop', 'HP', 'Omen 16', 'ntel Core i7-13700HX\r\n16GB DDR5\r\n1TB SSD\r\n16\" QHD 165Hz\r\nNVIDIA RTX 4060', 'SHIVA-shiva', 11, '2026-03-23', '2026-03-23 05:17:24', '2026-03-23 05:17:24'),
(12, 'DHG_521', '2026vxx', 'laptop', 'Laptop', 'Razer', 'Blade 15', 'Intel Core i9-12900H\r\n32GB DDR5\r\n1TB SSD\r\n15.6\" 4K OLED 144Hz\r\nNVIDIA RTX 3080 Ti', 'jokowi hidup', 6, '2026-03-23', '2026-03-23 05:22:18', '2026-03-23 05:22:18'),
(13, 'SPR_234', '2026gfd', 'laptop', 'Laptop', 'LG', 'Gram 16', 'Intel Core i7-1260P\r\n16GB LPDDR5\r\n1TB SSD\r\n16\" WQXGA (2560×1600)\r\nIntel Iris Xe', 'sahurrrrrrrrrrrrrrrrrrrr', 7, '2026-03-23', '2026-03-23 05:26:27', '2026-03-23 05:26:27'),
(14, 'DTA_745', '2026odgj', 'laptop', 'Laptop', 'Samsung', 'Galaxy Book4 Pro', 'Intel Core Ultra 7\r\n16GB LPDDR5X\r\n512GB SSD\r\n14\" AMOLED 3K\r\nIntel Arc', 'bombardilokrokodilo', 13, '2026-03-23', '2026-03-23 05:29:47', '2026-03-23 05:29:47'),
(15, 'VTR-231', '2018j;lkj', 'laptop', 'Laptop', 'lenovo', 'ThinkPad X1 Carbon (Gen 6)', 'Prosesor: Hingga Intel Core i7-8650U (4 Core, 8 Thread).\r\nLayar: 14\" FHD (1920x1080) IPS atau WQHD (2560x1440) dengan opsi HDR Dolby Vision (500 nits).\r\nRAM: Hingga 16GB LPDDR3 2133MHz (Soldered).\r\nPenyimpanan: Hingga 1TB PCIe NVMe SSD.\r\nFitur Spesial: Berat hanya 1,13 kg, keyboard legendaris ThinkPad, dan penutup webcam ThinkShutter.', 'kosjsjsodcnjskn', 22, '2018-12-02', '2026-03-26 00:31:00', '2026-03-26 00:31:00'),
(16, 'ZXC_250', '2026zxzx', 'laptop-farnap07', 'Laptop', 'Axio', 'premium ultra pro max', 'ada dehhhh pokoknya itulah', 'yups betul sekali', 4, '2026-03-29', '2026-03-29 00:01:56', '2026-03-29 00:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `ips`
--

CREATE TABLE `ips` (
  `id` bigint UNSIGNED NOT NULL,
  `subnet1` int NOT NULL,
  `subnet2` int NOT NULL,
  `subnet3` int NOT NULL,
  `subnet4` int NOT NULL,
  `hardware_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ips`
--

INSERT INTO `ips` (`id`, `subnet1`, `subnet2`, `subnet3`, `subnet4`, `hardware_id`, `created_at`, `updated_at`) VALUES
(1, 192, 168, 1, 1, 3, NULL, '2026-03-18 03:18:38'),
(2, 192, 168, 1, 2, 1, NULL, NULL),
(3, 192, 168, 1, 3, 1, NULL, NULL),
(4, 192, 168, 1, 4, 1, NULL, NULL),
(5, 192, 168, 1, 5, 1, NULL, NULL),
(6, 192, 168, 1, 6, 1, NULL, NULL),
(7, 192, 168, 1, 7, 1, NULL, NULL),
(8, 192, 168, 1, 8, 1, NULL, NULL),
(9, 192, 168, 1, 9, 1, NULL, NULL),
(10, 192, 168, 1, 10, 1, NULL, NULL),
(11, 192, 168, 1, 11, 1, NULL, NULL),
(12, 192, 168, 1, 12, 1, NULL, NULL),
(13, 192, 168, 1, 13, 1, NULL, NULL),
(14, 192, 168, 1, 14, 1, NULL, NULL),
(15, 192, 168, 1, 15, 1, NULL, NULL),
(16, 192, 168, 1, 16, 1, NULL, NULL),
(17, 192, 168, 1, 17, 1, NULL, NULL),
(18, 192, 168, 1, 18, 1, NULL, NULL),
(19, 192, 168, 1, 19, 1, NULL, NULL),
(20, 192, 168, 1, 20, 1, NULL, NULL),
(21, 192, 168, 1, 21, 1, NULL, NULL),
(22, 192, 168, 1, 22, 1, NULL, NULL),
(23, 192, 168, 1, 23, 1, NULL, NULL),
(24, 192, 168, 1, 24, 1, NULL, NULL),
(25, 192, 168, 1, 25, 1, NULL, NULL),
(26, 192, 168, 1, 26, 1, NULL, NULL),
(27, 192, 168, 1, 27, 1, NULL, NULL),
(28, 192, 168, 1, 28, 1, NULL, NULL),
(29, 192, 168, 1, 29, 1, NULL, NULL),
(30, 192, 168, 1, 30, 1, NULL, NULL),
(31, 192, 168, 1, 31, 1, NULL, NULL),
(32, 192, 168, 1, 32, 1, NULL, NULL),
(33, 192, 168, 1, 33, 1, NULL, NULL),
(34, 192, 168, 1, 34, 1, NULL, NULL),
(35, 192, 168, 1, 35, 1, NULL, NULL),
(36, 192, 168, 1, 36, 1, NULL, NULL),
(37, 192, 168, 1, 37, 1, NULL, NULL),
(38, 192, 168, 1, 38, 1, NULL, NULL),
(39, 192, 168, 1, 39, 1, NULL, NULL),
(40, 192, 168, 1, 40, 1, NULL, NULL),
(41, 192, 168, 1, 41, 1, NULL, NULL),
(42, 192, 168, 1, 42, 1, NULL, NULL),
(43, 192, 168, 1, 43, 1, NULL, NULL),
(44, 192, 168, 1, 44, 1, NULL, NULL),
(45, 192, 168, 1, 45, 1, NULL, NULL),
(46, 192, 168, 1, 46, 1, NULL, NULL),
(47, 192, 168, 1, 47, 1, NULL, NULL),
(48, 192, 168, 1, 48, 1, NULL, NULL),
(49, 192, 168, 1, 49, 1, NULL, NULL),
(50, 192, 168, 1, 50, 1, NULL, NULL),
(51, 192, 168, 1, 51, 1, NULL, NULL),
(52, 192, 168, 1, 52, 1, NULL, NULL),
(53, 192, 168, 1, 53, 1, NULL, NULL),
(54, 192, 168, 1, 54, 1, NULL, NULL),
(55, 192, 168, 1, 55, 1, NULL, NULL),
(56, 192, 168, 1, 56, 1, NULL, NULL),
(57, 192, 168, 1, 57, 1, NULL, NULL),
(58, 192, 168, 1, 58, 1, NULL, NULL),
(59, 192, 168, 1, 59, 1, NULL, NULL),
(60, 192, 168, 1, 60, 1, NULL, NULL),
(61, 192, 168, 1, 61, 1, NULL, NULL),
(62, 192, 168, 1, 62, 1, NULL, NULL),
(63, 192, 168, 1, 63, 1, NULL, NULL),
(64, 192, 168, 1, 64, 1, NULL, NULL),
(65, 192, 168, 1, 65, 1, NULL, NULL),
(66, 192, 168, 1, 66, 1, NULL, NULL),
(67, 192, 168, 1, 67, 1, NULL, NULL),
(68, 192, 168, 1, 68, 1, NULL, NULL),
(69, 192, 168, 1, 69, 1, NULL, NULL),
(70, 192, 168, 1, 70, 1, NULL, NULL),
(71, 192, 168, 1, 71, 1, NULL, NULL),
(72, 192, 168, 1, 72, 1, NULL, NULL),
(73, 192, 168, 1, 73, 1, NULL, NULL),
(74, 192, 168, 1, 74, 1, NULL, NULL),
(75, 192, 168, 1, 75, 1, NULL, NULL),
(76, 192, 168, 1, 76, 1, NULL, NULL),
(77, 192, 168, 1, 77, 1, NULL, NULL),
(78, 192, 168, 1, 78, 1, NULL, NULL),
(79, 192, 168, 1, 79, 1, NULL, NULL),
(80, 192, 168, 1, 80, 1, NULL, NULL),
(81, 192, 168, 1, 81, 1, NULL, NULL),
(82, 192, 168, 1, 82, 1, NULL, NULL),
(83, 192, 168, 1, 83, 1, NULL, NULL),
(84, 192, 168, 1, 84, 1, NULL, NULL),
(85, 192, 168, 1, 85, 1, NULL, NULL),
(86, 192, 168, 1, 86, 1, NULL, NULL),
(87, 192, 168, 1, 87, 1, NULL, NULL),
(88, 192, 168, 1, 88, 1, NULL, NULL),
(89, 192, 168, 1, 89, 1, NULL, NULL),
(90, 192, 168, 1, 90, 1, NULL, NULL),
(91, 192, 168, 1, 91, 1, NULL, NULL),
(92, 192, 168, 1, 92, 1, NULL, NULL),
(93, 192, 168, 1, 93, 1, NULL, NULL),
(94, 192, 168, 1, 94, 1, NULL, NULL),
(95, 192, 168, 1, 95, 1, NULL, NULL),
(96, 192, 168, 1, 96, 1, NULL, NULL),
(97, 192, 168, 1, 97, 1, NULL, NULL),
(98, 192, 168, 1, 98, 1, NULL, NULL),
(99, 192, 168, 1, 99, 1, NULL, NULL),
(100, 192, 168, 1, 100, 1, NULL, NULL),
(101, 192, 168, 1, 101, 1, NULL, NULL),
(102, 192, 168, 1, 102, 1, NULL, NULL),
(103, 192, 168, 1, 103, 1, NULL, NULL),
(104, 192, 168, 1, 104, 1, NULL, NULL),
(105, 192, 168, 1, 105, 1, NULL, NULL),
(106, 192, 168, 1, 106, 1, NULL, NULL),
(107, 192, 168, 1, 107, 1, NULL, NULL),
(108, 192, 168, 1, 108, 1, NULL, NULL),
(109, 192, 168, 1, 109, 1, NULL, NULL),
(110, 192, 168, 1, 110, 1, NULL, NULL),
(111, 192, 168, 1, 111, 1, NULL, NULL),
(112, 192, 168, 1, 112, 1, NULL, NULL),
(113, 192, 168, 1, 113, 1, NULL, NULL),
(114, 192, 168, 1, 114, 1, NULL, NULL),
(115, 192, 168, 1, 115, 1, NULL, NULL),
(116, 192, 168, 1, 116, 1, NULL, NULL),
(117, 192, 168, 1, 117, 1, NULL, NULL),
(118, 192, 168, 1, 118, 1, NULL, NULL),
(119, 192, 168, 1, 119, 1, NULL, NULL),
(120, 192, 168, 1, 120, 1, NULL, NULL),
(121, 192, 168, 1, 121, 1, NULL, NULL),
(122, 192, 168, 1, 122, 1, NULL, NULL),
(123, 192, 168, 1, 123, 1, NULL, NULL),
(124, 192, 168, 1, 124, 1, NULL, NULL),
(125, 192, 168, 1, 125, 1, NULL, NULL),
(126, 192, 168, 1, 126, 1, NULL, NULL),
(127, 192, 168, 1, 127, 1, NULL, NULL),
(128, 192, 168, 1, 128, 1, NULL, NULL),
(129, 192, 168, 1, 129, 1, NULL, NULL),
(130, 192, 168, 1, 130, 1, NULL, NULL),
(131, 192, 168, 1, 131, 1, NULL, NULL),
(132, 192, 168, 1, 132, 1, NULL, NULL),
(133, 192, 168, 1, 133, 1, NULL, NULL),
(134, 192, 168, 1, 134, 1, NULL, NULL),
(135, 192, 168, 1, 135, 1, NULL, NULL),
(136, 192, 168, 1, 136, 1, NULL, NULL),
(137, 192, 168, 1, 137, 1, NULL, NULL),
(138, 192, 168, 1, 138, 1, NULL, NULL),
(139, 192, 168, 1, 139, 1, NULL, NULL),
(140, 192, 168, 1, 140, 1, NULL, NULL),
(141, 192, 168, 1, 141, 1, NULL, NULL),
(142, 192, 168, 1, 142, 1, NULL, NULL),
(143, 192, 168, 1, 143, 1, NULL, NULL),
(144, 192, 168, 1, 144, 1, NULL, NULL),
(145, 192, 168, 1, 145, 1, NULL, NULL),
(146, 192, 168, 1, 146, 1, NULL, NULL),
(147, 192, 168, 1, 147, 1, NULL, NULL),
(148, 192, 168, 1, 148, 1, NULL, NULL),
(149, 192, 168, 1, 149, 1, NULL, NULL),
(150, 192, 168, 1, 150, 1, NULL, NULL),
(151, 192, 168, 1, 151, 1, NULL, NULL),
(152, 192, 168, 1, 152, 1, NULL, NULL),
(153, 192, 168, 1, 153, 1, NULL, NULL),
(154, 192, 168, 1, 154, 1, NULL, NULL),
(155, 192, 168, 1, 155, 1, NULL, NULL),
(156, 192, 168, 1, 156, 1, NULL, NULL),
(157, 192, 168, 1, 157, 1, NULL, NULL),
(158, 192, 168, 1, 158, 1, NULL, NULL),
(159, 192, 168, 1, 159, 1, NULL, NULL),
(160, 192, 168, 1, 160, 1, NULL, NULL),
(161, 192, 168, 1, 161, 1, NULL, NULL),
(162, 192, 168, 1, 162, 1, NULL, NULL),
(163, 192, 168, 1, 163, 1, NULL, NULL),
(164, 192, 168, 1, 164, 1, NULL, NULL),
(165, 192, 168, 1, 165, 1, NULL, NULL),
(166, 192, 168, 1, 166, 1, NULL, NULL),
(167, 192, 168, 1, 167, 1, NULL, NULL),
(168, 192, 168, 1, 168, 1, NULL, NULL),
(169, 192, 168, 1, 169, 1, NULL, NULL),
(170, 192, 168, 1, 170, 1, NULL, NULL),
(171, 192, 168, 1, 171, 1, NULL, NULL),
(172, 192, 168, 1, 172, 1, NULL, NULL),
(173, 192, 168, 1, 173, 1, NULL, NULL),
(174, 192, 168, 1, 174, 1, NULL, NULL),
(175, 192, 168, 1, 175, 1, NULL, NULL),
(176, 192, 168, 1, 176, 1, NULL, NULL),
(177, 192, 168, 1, 177, 1, NULL, NULL),
(178, 192, 168, 1, 178, 1, NULL, NULL),
(179, 192, 168, 1, 179, 1, NULL, NULL),
(180, 192, 168, 1, 180, 1, NULL, NULL),
(181, 192, 168, 1, 181, 1, NULL, NULL),
(182, 192, 168, 1, 182, 1, NULL, NULL),
(183, 192, 168, 1, 183, 1, NULL, NULL),
(184, 192, 168, 1, 184, 1, NULL, NULL),
(185, 192, 168, 1, 185, 1, NULL, NULL),
(186, 192, 168, 1, 186, 1, NULL, NULL),
(187, 192, 168, 1, 187, 1, NULL, NULL),
(188, 192, 168, 1, 188, 1, NULL, NULL),
(189, 192, 168, 1, 189, 1, NULL, NULL),
(190, 192, 168, 1, 190, 1, NULL, NULL),
(191, 192, 168, 1, 191, 1, NULL, NULL),
(192, 192, 168, 1, 192, 1, NULL, NULL),
(193, 192, 168, 1, 193, 1, NULL, NULL),
(194, 192, 168, 1, 194, 1, NULL, NULL),
(195, 192, 168, 1, 195, 1, NULL, NULL),
(196, 192, 168, 1, 196, 1, NULL, NULL),
(197, 192, 168, 1, 197, 1, NULL, NULL),
(198, 192, 168, 1, 198, 1, NULL, NULL),
(199, 192, 168, 1, 199, 1, NULL, NULL),
(200, 192, 168, 1, 200, 1, NULL, NULL),
(201, 192, 168, 1, 201, 1, NULL, NULL),
(202, 192, 168, 1, 202, 1, NULL, NULL),
(203, 192, 168, 1, 203, 1, NULL, NULL),
(204, 192, 168, 1, 204, 1, NULL, NULL),
(205, 192, 168, 1, 205, 1, NULL, NULL),
(206, 192, 168, 1, 206, 1, NULL, NULL),
(207, 192, 168, 1, 207, 1, NULL, NULL),
(208, 192, 168, 1, 208, 1, NULL, NULL),
(209, 192, 168, 1, 209, 1, NULL, NULL),
(210, 192, 168, 1, 210, 1, NULL, NULL),
(211, 192, 168, 1, 211, 1, NULL, NULL),
(212, 192, 168, 1, 212, 1, NULL, NULL),
(213, 192, 168, 1, 213, 1, NULL, NULL),
(214, 192, 168, 1, 214, 1, NULL, NULL),
(215, 192, 168, 1, 215, 1, NULL, NULL),
(216, 192, 168, 1, 216, 1, NULL, NULL),
(217, 192, 168, 1, 217, 1, NULL, NULL),
(218, 192, 168, 1, 218, 1, NULL, NULL),
(219, 192, 168, 1, 219, 1, NULL, NULL),
(220, 192, 168, 1, 220, 1, NULL, NULL),
(221, 192, 168, 1, 221, 1, NULL, NULL),
(222, 192, 168, 1, 222, 1, NULL, NULL),
(223, 192, 168, 1, 223, 1, NULL, NULL),
(224, 192, 168, 1, 224, 1, NULL, NULL),
(225, 192, 168, 1, 225, 1, NULL, NULL),
(226, 192, 168, 0, 15, 2, '2026-03-31 06:13:59', '2026-03-31 06:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `kerusakans`
--

CREATE TABLE `kerusakans` (
  `id` bigint UNSIGNED NOT NULL,
  `tgl_respon` date DEFAULT NULL,
  `tgl_requst` date NOT NULL,
  `waktu_respon` time DEFAULT NULL,
  `waktu_requst` time NOT NULL,
  `laporan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindakan` text COLLATE utf8mb4_unicode_ci,
  `hardware_id` bigint UNSIGNED NOT NULL,
  `unit_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kerusakans`
--

INSERT INTO `kerusakans` (`id`, `tgl_respon`, `tgl_requst`, `waktu_respon`, `waktu_requst`, `laporan`, `tindakan`, `hardware_id`, `unit_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2026-03-16', '2026-03-16', '04:30:00', '11:27:00', 'komputernya mengalam bluescreen secara tiba-tiba', 'melakukan instal ulang windows', 1, 4, 3, '2026-03-15 21:28:45', '2026-03-15 21:45:22'),
(2, '2026-03-29', '2026-03-17', '04:32:00', '13:54:00', 'we tolong becik no we', 'siap bosss', 3, 6, 3, '2026-03-16 23:55:35', '2026-03-28 21:34:03'),
(3, NULL, '2026-03-17', NULL, '13:54:00', 'we tolong becik no we\r\nsdfsdfs', NULL, 3, 6, 4, '2026-03-17 00:19:15', '2026-03-17 00:19:15'),
(6, '2026-03-18', '2026-03-18', '19:50:00', '19:37:00', 'mati sendiri', 'lalalalalalalalalalal', 2, 11, 1, '2026-03-18 05:38:46', '2026-03-18 05:38:46'),
(7, '2026-03-19', '2026-03-18', '09:06:00', '20:05:00', 'tidak bisa menyambung internet', 'ganti kabel lan', 2, 11, 3, '2026-03-18 06:06:07', '2026-03-18 06:06:07'),
(8, NULL, '2026-03-18', NULL, '20:57:00', 'asdasdasd', NULL, 3, 9, 1, '2026-03-18 06:58:02', '2026-03-18 06:58:02'),
(9, NULL, '2026-03-18', NULL, '20:57:00', 'asdasdasd', NULL, 3, 9, 1, '2026-03-18 06:58:02', '2026-03-18 06:58:02'),
(10, NULL, '2026-03-19', NULL, '20:15:00', 'tiba tiba mati sendiri', NULL, 3, 9, 1, '2026-03-19 06:16:06', '2026-03-19 06:16:06'),
(11, NULL, '2026-03-19', NULL, '20:15:00', 'tiba tiba mati sendiri', NULL, 3, 9, 1, '2026-03-19 06:21:52', '2026-03-19 06:21:52'),
(12, NULL, '2026-03-29', NULL, '14:27:00', 'testimoni', NULL, 9, 32, 1, '2026-03-29 00:28:12', '2026-03-29 00:28:12'),
(13, NULL, '2026-03-29', NULL, '00:40:00', 'habis terjatuh dan tidak bisa menyala abangkuhh', NULL, 10, 11, 1, '2026-03-29 10:40:56', '2026-03-29 10:40:56'),
(14, NULL, '2026-03-30', NULL, '15:01:00', 'tes', NULL, 8, 7, 4, '2026-03-30 01:01:33', '2026-03-30 01:01:33'),
(15, NULL, '2026-03-30', NULL, '15:28:00', 'habis terjauh dan tak bisa nyala lagi', NULL, 8, 7, 4, '2026-03-30 01:29:37', '2026-03-30 01:29:37'),
(16, NULL, '2026-03-30', NULL, '17:52:00', 'laptop tidak bisa masuk ke osnya', NULL, 2, 11, 5, '2026-03-30 03:56:18', '2026-03-30 03:56:18');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_09_062230_create_units_table', 1),
(6, '2026_03_01_220844_create_hardwares_table', 1),
(7, '2026_03_07_081703_create_permission_tables', 1),
(8, '2026_03_09_072932_create_mutasis_table', 1),
(9, '2026_03_11_090012_create_kerusakans_table', 1),
(10, '2026_03_11_093244_create_ips_table', 1),
(11, '2026_03_17_071651_create_notifications_table', 2);

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
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mutasis`
--

CREATE TABLE `mutasis` (
  `id` bigint UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_asal_id` bigint UNSIGNED NOT NULL,
  `unit_tujuan_id` bigint UNSIGNED NOT NULL,
  `hardware_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mutasis`
--

INSERT INTO `mutasis` (`id`, `keterangan`, `unit_asal_id`, `unit_tujuan_id`, `hardware_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'asdasdasd', 18, 14, 2, 1, '2026-03-17 06:19:20', '2026-03-17 06:19:20'),
(2, 'asdasdasd', 18, 14, 2, 1, '2026-03-17 06:20:24', '2026-03-17 06:20:24'),
(3, 'asdasdasd', 18, 14, 2, 1, '2026-03-17 06:23:14', '2026-03-17 06:23:14'),
(4, 'asdasdasd', 18, 14, 2, 1, '2026-03-17 06:23:34', '2026-03-17 06:23:34'),
(5, 'asdasdasd', 18, 14, 2, 1, '2026-03-17 06:23:54', '2026-03-17 06:23:54'),
(6, 'asdasdasd', 18, 14, 2, 1, '2026-03-17 06:26:46', '2026-03-17 06:26:46'),
(7, 'asdasdasd', 18, 14, 2, 1, '2026-03-17 06:26:55', '2026-03-17 06:26:55'),
(8, 'asdasdasd', 18, 14, 2, 1, '2026-03-17 06:28:07', '2026-03-17 06:28:07'),
(9, 'asdasdasd', 18, 14, 2, 1, '2026-03-17 06:30:37', '2026-03-17 06:30:37'),
(10, 'asdasdasd', 18, 14, 2, 1, '2026-03-17 06:31:14', '2026-03-17 06:31:14'),
(11, 'asdasdasd', 18, 14, 2, 1, '2026-03-17 06:33:05', '2026-03-17 06:33:05'),
(12, 'asdasdasd', 18, 14, 2, 1, '2026-03-17 06:37:30', '2026-03-17 06:37:30'),
(13, 'asdasdasd', 18, 14, 2, 1, '2026-03-17 06:37:38', '2026-03-17 06:37:38'),
(14, 'vnb', 18, 16, 2, 1, '2026-03-17 06:39:12', '2026-03-17 06:39:12'),
(15, 'vnb', 18, 16, 2, 1, '2026-03-17 06:41:03', '2026-03-17 06:41:03'),
(16, 'asdd', 18, 13, 2, 1, '2026-03-17 06:42:39', '2026-03-17 06:42:39'),
(17, 'coba mutasi dari keperawatan menuju igd', 18, 11, 2, 1, '2026-03-17 07:11:38', '2026-03-17 07:11:38'),
(18, 'coba mutasi dari keperawatan menuju igd', 18, 11, 2, 1, '2026-03-17 07:14:54', '2026-03-17 07:14:54'),
(19, 'coba mutasi dari keperawatan menuju igd', 18, 11, 2, 1, '2026-03-17 07:16:03', '2026-03-17 07:16:03'),
(20, 'coba mutasi dari keperawatan menuju igd', 18, 11, 2, 1, '2026-03-17 07:17:28', '2026-03-17 07:17:28'),
(21, 'mutasi dari GIZi menuju CSSD', 6, 5, 3, 1, '2026-03-17 07:24:04', '2026-03-17 07:24:04'),
(22, 'jgj', 5, 22, 3, 1, '2026-03-17 07:35:10', '2026-03-17 07:35:10'),
(23, 'hfhfh', 22, 9, 3, 1, '2026-03-17 07:37:33', '2026-03-17 07:37:33'),
(24, 'awdawdawdawd', 12, 28, 6, 1, '2026-03-26 02:08:04', '2026-03-26 02:08:04'),
(30, 'adaadaada', 11, 10, 10, 1, '2026-03-29 10:41:34', '2026-03-29 10:41:34'),
(31, 'xyzxzyzxy', 6, 30, 9, 1, '2026-03-30 01:58:23', '2026-03-30 01:58:23'),
(32, 'wewewewe', 7, 6, 8, 4, '2026-03-30 02:12:27', '2026-03-30 02:12:27'),
(33, 'xx x', 10, 6, 10, 1, '2026-03-31 05:55:55', '2026-03-31 05:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('5252976b-93a2-4d48-8811-6b62cfef5203', 'App\\Notifications\\KerusakanBaruNotification', 'App\\Models\\User', 3, '{\"kerusakan_id\":13,\"hardware\":\"-\",\"unit\":\"-\",\"laporan\":\"habis terjatuh dan tidak bisa menyala abangkuhh\",\"pelapor\":\"Super Admin\",\"tanggal\":\"29 Mar 2026\",\"tanggal_request\":\"29 Mar 2026\",\"waktu_request\":\"00:40\"}', NULL, '2026-03-29 10:40:59', '2026-03-29 10:40:59'),
('7f0163de-065b-4aba-8e74-c1e2a3b41d41', 'App\\Notifications\\KerusakanBaruNotification', 'App\\Models\\User', 3, '{\"kerusakan_id\":16,\"hardware\":\"-\",\"unit\":\"-\",\"laporan\":\"laptop tidak bisa masuk ke osnya\",\"pelapor\":\"staff farmasi\",\"tanggal\":\"30 Mar 2026\",\"tanggal_request\":\"30 Mar 2026\",\"waktu_request\":\"17:52\"}', NULL, '2026-03-30 03:56:22', '2026-03-30 03:56:22'),
('c24be551-65d6-439b-9e1e-a70e00d0bd67', 'App\\Notifications\\KerusakanBaruNotification', 'App\\Models\\User', 3, '{\"kerusakan_id\":12,\"hardware\":\"-\",\"unit\":\"-\",\"laporan\":\"testimoni\",\"pelapor\":\"Super Admin\",\"tanggal\":\"29 Mar 2026\",\"tanggal_request\":\"29 Mar 2026\",\"waktu_request\":\"14:27\"}', NULL, '2026-03-29 00:28:16', '2026-03-29 00:28:16'),
('c550950c-4b3c-4123-94cf-11b086f04864', 'App\\Notifications\\KerusakanBaruNotification', 'App\\Models\\User', 3, '{\"kerusakan_id\":14,\"hardware\":\"-\",\"unit\":\"-\",\"laporan\":\"tes\",\"pelapor\":\"User\",\"tanggal\":\"30 Mar 2026\",\"tanggal_request\":\"30 Mar 2026\",\"waktu_request\":\"15:01\"}', NULL, '2026-03-30 01:01:37', '2026-03-30 01:01:37'),
('d31fc712-6697-4d14-8d1b-71bdb3aaabde', 'App\\Notifications\\KerusakanBaruNotification', 'App\\Models\\User', 3, '{\"kerusakan_id\":15,\"hardware\":\"-\",\"unit\":\"-\",\"laporan\":\"habis terjauh dan tak bisa nyala lagi\",\"pelapor\":\"User\",\"tanggal\":\"30 Mar 2026\",\"tanggal_request\":\"30 Mar 2026\",\"waktu_request\":\"15:28\"}', NULL, '2026-03-30 01:29:37', '2026-03-30 01:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view role', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(2, 'create role', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(3, 'update role', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(4, 'delete role', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(5, 'view permission', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(6, 'create permission', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(7, 'update permission', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(8, 'delete permission', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(9, 'view user', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(10, 'create user', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(11, 'update user', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(12, 'delete user', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(13, 'view hardware', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(14, 'create hardware', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(15, 'update hardware', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(16, 'delete hardware', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(17, 'view kerusakan', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(18, 'create kerusakan', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(19, 'createid kerusakan', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(20, 'update kerusakan', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(21, 'delete kerusakan', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(22, 'view menu', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(23, 'view unit', 'web', '2026-03-15 22:15:44', '2026-03-15 22:15:44'),
(24, 'create unit', 'web', '2026-03-15 22:15:59', '2026-03-15 22:15:59'),
(25, 'update unit', 'web', '2026-03-15 22:16:12', '2026-03-15 22:16:12'),
(26, 'delete unit', 'web', '2026-03-15 22:16:30', '2026-03-15 22:16:30'),
(27, 'createid mutasi', 'web', '2026-03-17 02:17:44', '2026-03-17 02:17:44'),
(28, 'create mutasi', 'web', '2026-03-17 02:41:41', '2026-03-17 02:41:41'),
(29, 'view mutasi', 'web', '2026-03-17 02:41:56', '2026-03-17 02:41:56'),
(30, 'update mutasi', 'web', '2026-03-17 02:42:13', '2026-03-17 02:42:13'),
(31, 'delete mutasi', 'web', '2026-03-17 02:42:23', '2026-03-17 02:42:23'),
(32, 'view ip', 'web', '2026-03-18 01:06:03', '2026-03-18 01:06:03'),
(33, 'create ip', 'web', '2026-03-18 01:06:22', '2026-03-18 01:06:22'),
(34, 'update ip', 'web', '2026-03-18 01:06:38', '2026-03-18 01:06:38'),
(35, 'delete ip', 'web', '2026-03-18 01:07:21', '2026-03-18 01:07:21');

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
(1, 'super-admin', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(2, 'admin', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15'),
(3, 'staff it', 'web', '2026-03-15 21:03:15', '2026-03-17 01:05:19'),
(4, 'user', 'web', '2026-03-15 21:03:15', '2026-03-15 21:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(17, 2),
(23, 2),
(29, 2),
(32, 2),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(20, 3),
(21, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(13, 4),
(17, 4),
(19, 4),
(22, 4),
(27, 4),
(29, 4);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `kd_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `kd_unit`, `nama_unit`, `created_at`, `updated_at`) VALUES
(1, 'AJN', 'ANJUNGAN', NULL, NULL),
(2, 'AKD', 'AKREDITASI', NULL, NULL),
(3, 'FAR-RAJAL', 'FARMASI-RAWATJALAN', NULL, NULL),
(4, 'FAR-RANAP', 'FARMASI-RAWATINAP', NULL, NULL),
(5, 'CSSD', 'CSSD', NULL, NULL),
(6, 'GZ', 'GIZI', NULL, NULL),
(7, 'GPT', 'GPT', NULL, NULL),
(8, 'GBS/VK', 'GBS/VK', NULL, NULL),
(9, 'IBS', 'IBS', NULL, NULL),
(10, 'ICU', 'ICU', NULL, NULL),
(11, 'IGD', 'IGD', NULL, NULL),
(12, 'KA.CSMX', 'KA.CASEMIX', NULL, NULL),
(13, 'KA.KU', 'KA.KEUANGAN', NULL, NULL),
(14, 'KA.UM', 'KA.UMUM', NULL, NULL),
(15, 'KA.WADIR', 'KA.WADIR', NULL, NULL),
(16, 'KA.SPI', 'KA.SPI', NULL, NULL),
(17, 'KA.KOM', 'KA.KOMITE', NULL, NULL),
(18, 'KA.KEP', 'KA.KEPERAWATAN', NULL, NULL),
(19, 'KSR', 'KASIR', NULL, NULL),
(20, 'LAB', 'LABORATORIUM', NULL, NULL),
(21, 'LDRY', 'LAUNDRY', NULL, NULL),
(22, 'LOG-FAR', 'LOGISTIK-FARMASI', NULL, NULL),
(23, 'LOG-UM', 'LOGISTIK-UMUM', NULL, NULL),
(24, 'MLTZM', 'MULTAZAM', NULL, NULL),
(25, 'NNT', 'NEONATUS', NULL, NULL),
(26, 'NFS/GSP Lt3', 'NIFAS/GSP Lt3', NULL, NULL),
(27, 'RA', 'RA', NULL, NULL),
(28, 'RDLG', 'RADIOLOGI', NULL, NULL),
(29, 'RAJAL', 'RAWAT-JALAN', NULL, NULL),
(30, 'RDU', 'RDU', NULL, NULL),
(31, 'REKDIS', 'REKAM-MEDIS', NULL, NULL),
(32, 'STPM', 'SATPAM', NULL, NULL),
(33, 'TI', 'TI', NULL, NULL),
(34, 'TPPRJ/TPPRI', 'TPPRJ/TPPRI', NULL, NULL);

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
(1, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$12$n1kaKTUR0DwFF50mcNUyNuWneBWuiWfbM0uXwi3g0wZFmH1b4bUU6', NULL, '2026-03-15 21:03:16', '2026-03-15 21:03:16'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$12$G/zCiONn74NLpwh5dfKZue6P6kkIZyej9QN5ozR9LR3nNO3T/tH5e', NULL, '2026-03-15 21:03:16', '2026-03-15 21:03:16'),
(3, 'Staff IT', 'staff@gmail.com', NULL, '$2y$12$A4u0yon4WfDOMJ0vIBxJmeZ2bdeYyi/i1zIuk07bB7ppmT2joBUH2', NULL, '2026-03-15 21:03:17', '2026-03-15 21:03:17'),
(4, 'User', 'user@gmail.com', NULL, '$2y$12$I3SLGnoulneRUqhzHfukUeEarGUgbVOz70Q8yyhqBw064GmrhN2.C', NULL, '2026-03-15 21:03:17', '2026-03-15 21:03:17'),
(5, 'staff farmasi', 'stafffar@gmail.com', NULL, '$2y$12$KGnQggasBxAc0BN/izqfiea/VcblCBA3CslD05tGuaIMq0K8xDH1G', NULL, '2026-03-30 03:50:44', '2026-03-30 03:50:44');

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
-- Indexes for table `hardwares`
--
ALTER TABLE `hardwares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hardwares_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `ips`
--
ALTER TABLE `ips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ips_hardware_id_foreign` (`hardware_id`);

--
-- Indexes for table `kerusakans`
--
ALTER TABLE `kerusakans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kerusakans_hardware_id_foreign` (`hardware_id`),
  ADD KEY `kerusakans_unit_id_foreign` (`unit_id`),
  ADD KEY `kerusakans_user_id_foreign` (`user_id`);

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
-- Indexes for table `mutasis`
--
ALTER TABLE `mutasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mutasis_unit_asal_id_foreign` (`unit_asal_id`),
  ADD KEY `mutasis_unit_tujuan_id_foreign` (`unit_tujuan_id`),
  ADD KEY `mutasis_hardware_id_foreign` (`hardware_id`),
  ADD KEY `mutasis_user_id_foreign` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hardwares`
--
ALTER TABLE `hardwares`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ips`
--
ALTER TABLE `ips`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `kerusakans`
--
ALTER TABLE `kerusakans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mutasis`
--
ALTER TABLE `mutasis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hardwares`
--
ALTER TABLE `hardwares`
  ADD CONSTRAINT `hardwares_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ips`
--
ALTER TABLE `ips`
  ADD CONSTRAINT `ips_hardware_id_foreign` FOREIGN KEY (`hardware_id`) REFERENCES `hardwares` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kerusakans`
--
ALTER TABLE `kerusakans`
  ADD CONSTRAINT `kerusakans_hardware_id_foreign` FOREIGN KEY (`hardware_id`) REFERENCES `hardwares` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kerusakans_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kerusakans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `mutasis`
--
ALTER TABLE `mutasis`
  ADD CONSTRAINT `mutasis_hardware_id_foreign` FOREIGN KEY (`hardware_id`) REFERENCES `hardwares` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mutasis_unit_asal_id_foreign` FOREIGN KEY (`unit_asal_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mutasis_unit_tujuan_id_foreign` FOREIGN KEY (`unit_tujuan_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mutasis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
