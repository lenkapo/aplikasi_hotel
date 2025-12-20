-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2025 at 12:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aplikasi_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `alus_g`
--

CREATE TABLE `alus_g` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `alus_g`
--

INSERT INTO `alus_g` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Penguasa Website'),
(20, 'resepsionist', 'Front Office / Operasional Harian');

-- --------------------------------------------------------

--
-- Table structure for table `alus_gd`
--

CREATE TABLE `alus_gd` (
  `agd_id` int(11) NOT NULL,
  `ag_id` int(11) DEFAULT NULL,
  `enabled` int(11) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `table_is_filter` int(11) DEFAULT NULL,
  `table_where` varchar(50) DEFAULT NULL,
  `table_filter` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `alus_gd`
--

INSERT INTO `alus_gd` (`agd_id`, `ag_id`, `enabled`, `table_name`, `table_is_filter`, `table_where`, `table_filter`) VALUES
(1, 1, 1, 'Test Maul', NULL, NULL, '+1++2++3++5++7+'),
(2, 2, 1, 'tesst', NULL, NULL, '+24+'),
(4, 14, 1, 'teest', NULL, NULL, '+1+'),
(5, 15, 1, 'teest', NULL, NULL, NULL),
(6, 28, 1, 'teest', NULL, NULL, NULL),
(7, 17, 1, 'teest', NULL, NULL, NULL),
(8, 16, 1, 'teest', NULL, NULL, NULL),
(9, 27, 1, 'teest', NULL, NULL, NULL),
(10, 30, 1, 'teest', NULL, NULL, NULL),
(11, 29, 1, 'teest', NULL, NULL, NULL),
(12, 21, 1, 'Ma', NULL, NULL, '+2++10+'),
(13, 20, 1, 'teest', NULL, NULL, NULL),
(14, 22, 1, 'teest', NULL, NULL, NULL),
(15, 31, 1, 'teest', NULL, NULL, NULL),
(17, 24, 1, 'teest', NULL, NULL, '+49++50++51+'),
(18, 25, 1, 'teest', NULL, NULL, NULL),
(19, 26, 1, 'teest', NULL, NULL, '+5+'),
(20, 18, 1, 'teest', NULL, NULL, '+3+'),
(21, 23, 1, 'teest', NULL, NULL, '+234+'),
(22, 33, 1, 'teest', NULL, NULL, NULL),
(23, 34, 1, 'teest', NULL, NULL, NULL),
(25, 88, 1, 'Tables', NULL, NULL, '+1++5++49++50+'),
(26, 89, 1, 'Tables', NULL, NULL, '+5+'),
(27, 86, 1, 'maulanaaaaa', NULL, NULL, '+1+');

-- --------------------------------------------------------

--
-- Table structure for table `alus_la`
--

CREATE TABLE `alus_la` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `alus_la`
--

INSERT INTO `alus_la` (`id`, `ip_address`, `login`, `time`) VALUES
(7, '::1', 'MTIzNDU2Nzg5MDEyMzQ1Nv+ivJgxxby5eg508DTNdlID3W0pjA==', 1766208436),
(8, '::1', 'MTIzNDU2Nzg5MDEyMzQ1Nv+ivJgxxby5eg508DTNdlID3W0pjA==', 1766208444);

-- --------------------------------------------------------

--
-- Table structure for table `alus_mg`
--

CREATE TABLE `alus_mg` (
  `menu_id` int(11) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_nama` varchar(255) NOT NULL,
  `menu_uri` varchar(255) NOT NULL,
  `menu_target` varchar(255) DEFAULT NULL,
  `menu_icon` varchar(25) DEFAULT NULL,
  `order_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `alus_mg`
--

INSERT INTO `alus_mg` (`menu_id`, `menu_parent`, `menu_nama`, `menu_uri`, `menu_target`, `menu_icon`, `order_num`) VALUES
(11, 30, 'Menus', 'menus', '', 'fa fa-bars fa-fw', 1),
(12, 30, 'Group', 'group', '', 'fa fa-lock fa-fw', 2),
(13, 30, 'User', 'users', '', 'fa fa-book fa-fw', 3),
(30, 0, 'Master', '#', '', 'fa fa-bars fa-fw', 1),
(93, 0, 'Services', '#', '', 'fa fa-cogs fa-fw', 5),
(94, 0, 'Booking', '#', '', 'fa fa-address-book fa-fw', 4),
(95, 94, 'Daftar Booking', 'daftar_booking', '', 'fa fa-circle-o fa-fw', 4),
(96, 94, 'Check In', 'check_in_booking', '', 'fa fa-circle-o fa-fw', 4),
(97, 94, 'Check Out', 'check_out_booking', '', 'fa fa-circle-o fa-fw', 4);

-- --------------------------------------------------------

--
-- Table structure for table `alus_mga`
--

CREATE TABLE `alus_mga` (
  `id` int(11) NOT NULL,
  `id_group` mediumint(8) UNSIGNED NOT NULL,
  `id_menu` int(11) NOT NULL,
  `can_view` int(11) DEFAULT NULL,
  `can_edit` int(11) NOT NULL DEFAULT 0,
  `can_add` int(11) NOT NULL DEFAULT 0,
  `can_delete` int(11) NOT NULL DEFAULT 0,
  `psv` datetime DEFAULT NULL,
  `pev` datetime DEFAULT NULL,
  `psed` datetime DEFAULT NULL,
  `peed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `alus_mga`
--

INSERT INTO `alus_mga` (`id`, `id_group`, `id_menu`, `can_view`, `can_edit`, `can_add`, `can_delete`, `psv`, `pev`, `psed`, `peed`) VALUES
(3357, 10, 11, 0, 0, 0, 0, '1970-01-01 12:00:00', '1970-01-01 12:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(3358, 10, 12, 0, 0, 0, 0, '1970-01-01 12:00:00', '1970-01-01 12:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(3359, 10, 13, 0, 0, 0, 0, '1970-01-01 12:00:00', '1970-01-01 12:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(3366, 10, 30, 0, 0, 0, 0, '1970-01-01 12:00:00', '1970-01-01 12:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(3685, 9, 11, 0, 0, 0, 0, '1970-01-01 12:00:00', '1970-01-01 12:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(3686, 9, 30, 1, 0, 0, 0, '1970-01-01 12:00:00', '1970-01-01 12:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(3687, 9, 12, 1, 0, 0, 0, '1970-01-01 12:00:00', '1970-01-01 12:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(3688, 9, 13, 1, 0, 0, 0, '1970-01-01 12:00:00', '1970-01-01 12:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(4101, 20, 30, 0, 0, 0, 0, '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL),
(4102, 20, 11, 0, 0, 0, 0, '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL),
(4103, 20, 12, 0, 0, 0, 0, '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL),
(4104, 20, 13, 0, 0, 0, 0, '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL),
(4105, 20, 93, 0, 0, 0, 0, '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL),
(4106, 20, 94, 1, 0, 0, 0, '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL),
(4107, 20, 95, 1, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL),
(4108, 20, 96, 1, 0, 0, 0, '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL),
(4109, 20, 97, 1, 0, 0, 0, '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL),
(4137, 1, 30, 1, 0, 0, 0, '2016-09-06 10:55:00', '2016-09-06 10:56:00', '2016-08-08 12:06:00', '2016-08-08 12:06:00'),
(4138, 1, 11, 1, 1, 1, 1, '2016-09-06 10:55:00', '2016-09-06 10:55:00', '2016-08-08 12:06:00', '2016-08-09 13:50:00'),
(4139, 1, 12, 1, 1, 1, 1, '2016-09-06 10:55:00', '2016-09-06 10:55:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(4140, 1, 13, 1, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(4141, 1, 93, 1, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(4142, 1, 94, 1, 0, 0, 0, '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL),
(4143, 1, 95, 1, 1, 1, 0, '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL),
(4144, 1, 96, 1, 0, 0, 0, '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL),
(4145, 1, 97, 1, 0, 0, 0, '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alus_u`
--

CREATE TABLE `alus_u` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `abc` varchar(100) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `ghi` varchar(255) NOT NULL,
  `def` varchar(255) DEFAULT NULL,
  `mno` varchar(40) DEFAULT NULL,
  `jkl` varchar(40) DEFAULT NULL,
  `stu` int(10) UNSIGNED DEFAULT NULL,
  `pqr` varchar(40) DEFAULT NULL,
  `created_on` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `ht` int(11) DEFAULT 0,
  `picture` varchar(255) DEFAULT NULL,
  `mdo_id` int(11) DEFAULT NULL,
  `mos_id` int(11) DEFAULT NULL,
  `grup_type` int(11) DEFAULT NULL,
  `bpd_id` int(11) DEFAULT NULL,
  `bpd_id_2` int(11) DEFAULT NULL,
  `staff_pmk_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `alus_u`
--

INSERT INTO `alus_u` (`id`, `username`, `job_title`, `abc`, `ip_address`, `ghi`, `def`, `mno`, `jkl`, `stu`, `pqr`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `ht`, `picture`, `mdo_id`, `mos_id`, `grup_type`, `bpd_id`, `bpd_id_2`, `staff_pmk_id`) VALUES
(64, 'super admin', 'Super Admin', 'MTIzNDU2Nzg5MDEyMzQ1Nui+opkixa24fwlV0TfNflVBkGEr', '::1', '$2y$08$GgyrrdcJTxV0YIu5On5qoell7OztL8kp1tdlpkoWstcqKZNp1IaZS', 'xEfWFClsAdO4BnNm', '', NULL, 1764865143, '', 1469523580, 1766226909, 1, 'Super', 'Admin', '', '085697362948', 0, '1496118042.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(181, 'admin', 'Admin', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lom0cgp83n3DeFY=', '::1', '$2y$08$Izeqd/DlG62/uoxSNgcKUOiw1ZJFthEY7YpvfgHhpI0xWWi/5SSxK', 'f2sOH32PAw1vJ/pw', NULL, NULL, NULL, NULL, 1766160408, NULL, 1, 'Admin', '', NULL, '0', 1, 'avatar_default.png', NULL, NULL, NULL, NULL, NULL, NULL),
(182, 'Dinda Aulia', 'Resepsionist', 'MTIzNDU2Nzg5MDEyMzQ1Nv+ivJgxxby5fwZV1z7BfldBkGEr', '::1', '$2y$08$u93XRbQ6bKa2hDSOHMimqOQGH7l7Fu5nH/in4nhRQTumfvzYZWeIW', '3OLwHJhpfRkuikFv', NULL, NULL, NULL, NULL, 1766201793, 1766218405, 1, 'Dinda', 'Aulia', NULL, '0', 0, 'avatar_default.png', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alus_ug`
--

CREATE TABLE `alus_ug` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `alus_ug`
--

INSERT INTO `alus_ug` (`id`, `user_id`, `group_id`) VALUES
(69, 64, 1),
(68, 181, 1),
(70, 182, 20);

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `nama_amenity` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `id_hotel`, `nama_amenity`, `deskripsi`, `image`) VALUES
(1, 1, 'Kolam Renang', 'Kolam renang outdoor dengan view laut.', 'pool.jpg'),
(2, 1, 'Gym Center', 'Dilengkapi alat modern dan instruktur profesional.', 'gym.jpg'),
(3, 1, 'Spa & Massage', 'Tempat relaksasi dengan aroma terapi.', 'spa.jpg'),
(4, 1, 'Ruang Meeting', 'Kapasitas hingga 100 orang.', 'meeting.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `is_active`, `created_at`) VALUES
(1, 'Banner Halaman Utama Slide 1', 'Banner_1765086683.png', 1, '2025-12-07 06:51:23'),
(3, 'Banner Halaman Utama Slide 3', 'Banner_1765089645.png', 1, '2025-12-07 07:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `adults` int(11) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `nights` int(11) DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `price_per_night` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `invoice_number` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `full_name`, `email`, `phone`, `mobile`, `city`, `country`, `adults`, `children`, `arrival_date`, `departure_date`, `nights`, `status`, `price_per_night`, `total_price`, `message`, `created_at`, `invoice_number`) VALUES
(1, 1, 'ujeng', 'youngsta446@gmail.com', '085697362948', '085697362948', 'bogor', 'indonesia', 2, 1, '0000-00-00', '0000-00-00', NULL, 'pending', NULL, NULL, 'nginep', '2025-12-16 04:08:58', NULL),
(3, 2, 'likeu', 'likeu@gmail.com', '123', '123', 'bogor', 'indonesia', 1, 0, '2025-12-16', '2025-12-17', 1, 'pending', NULL, NULL, 'test', '2025-12-16 04:37:04', NULL),
(4, 2, 'test', 'test@gmail.com', 'test', 'test', 'test', 'test', 2, 2, '2025-12-16', '2025-12-17', 1, 'pending', NULL, NULL, 'test', '2025-12-16 04:38:50', NULL),
(5, 1, 'LUQMAN ALY RAZAK', 'luqmanaly666@gmail.com', '085697362948', '085697362948', 'bogor', 'indonesia', 2, 0, '2025-12-16', '2025-12-17', 1, 'pending', 150000, 150000, 'mau nginep', '2025-12-16 05:22:57', NULL),
(6, 1, 'LUQMAN ALY RAZAK', 'luqmanaly666@gmail.com', '085697362948', '085697362948', 'bogor', 'indonesia', 2, 0, '2025-12-16', '2025-12-17', 1, 'pending', 150000, 150000, 'mau nginep', '2025-12-16 05:33:16', 'INV-20251216-7152D'),
(7, 1, 'LUQMAN ALY RAZAK', 'luqmanaly666@gmail.com', '085697362948', '085697362948', 'bogor', 'indonesia', 2, 0, '2025-12-16', '2025-12-17', 1, 'pending', 150000, 150000, 'mau nginep', '2025-12-16 05:33:22', 'INV-20251216-25600'),
(8, 1, 'LUQMAN ALY RAZAK', 'luqmanaly666@gmail.com', '085697362948', '085697362948', 'bogor', 'indonesia', 2, 0, '2025-12-16', '2025-12-17', 1, 'pending', 150000, 150000, 'mau nginep', '2025-12-16 05:33:26', 'INV-20251216-66EC9'),
(9, 1, 'LUQMAN ALY RAZAK', 'luqmanaly666@gmail.com', '085697362948', '085697362948', 'bogor', 'indonesia', 2, 0, '2025-12-16', '2025-12-17', 1, 'pending', 150000, 150000, 'mau nginep', '2025-12-16 05:33:58', 'INV-20251216-0DD52'),
(11, 2, 'LUQMAN ALY RAZAK', 'luqmanaly666@gmail.com', '085697362948', '085697362948', 'bogor', 'indonesia', 2, 0, '2025-12-16', '2025-12-17', 1, 'pending', 4000, 4000, 'mau nginep', '2025-12-16 06:06:21', 'INV-20251216-510FD'),
(12, 2, 'LUQMAN ALY RAZAK', 'luqmanaly666@gmail.com', '085697362948', '085697362948', 'bogor', 'indonesia', 2, 0, '2025-12-16', '2025-12-17', 1, 'pending', 4000, 4000, 'mau nginep', '2025-12-16 06:06:22', 'INV-20251216-D0457'),
(13, 2, 'LUQMAN ALY RAZAK', 'luqmanaly666@gmail.com', '085697362948', '085697362948', 'bogor', 'indonesia', 2, 0, '2025-12-16', '2025-12-17', 1, 'pending', 4000, 4000, 'mau nginep', '2025-12-16 06:06:26', 'INV-20251216-EAB32'),
(14, 2, 'LUQMAN ALY RAZAK', 'luqmanaly666@gmail.com', '085697362948', '085697362948', 'bogor', 'indonesia', 2, 0, '2025-12-16', '2025-12-17', 1, 'pending', 4000, 4000, 'mau nginep', '2025-12-16 06:09:37', 'INV-20251216-A3425'),
(15, 2, 'LUQMAN ALY RAZAK', 'luqmanaly666@gmail.com', '085697362948', '085697362948', 'bogor', 'indonesia', 2, 0, '2025-12-16', '2025-12-17', 1, 'pending', 4000, 4000, 'mau nginep', '2025-12-16 06:11:29', 'INV-20251216-9A9BA'),
(16, 2, 'LUQMAN ALY RAZAK', 'luqmanaly666@gmail.com', '085697362948', '085697362948', 'bogor', 'indonesia', 2, 0, '2025-12-16', '2025-12-17', 1, 'pending', 4000, 4000, 'mau nginep', '2025-12-16 06:11:39', 'INV-20251216-4978E'),
(17, 2, 'binzzu', 'binzzugt123@gmail.com', '085697362948', '085697362948', 'BOGOR', 'INDONESIA', 1, 0, '2025-12-16', '2025-12-17', 1, 'pending', 4000, 4000, 'BOOKING', '2025-12-16 07:12:33', 'INV-20251216-97A0A'),
(18, 2, 'binzzu', 'binzzugt123@gmail.com', '085697362948', '085697362948', 'BOGOR', 'INDONESIA', 1, 0, '2025-12-16', '2025-12-17', 1, 'pending', 4000, 4000, 'BOOKING', '2025-12-16 07:19:15', 'INV-20251216-ED72C'),
(19, 2, 'binzzu', 'binzzugt123@gmail.com', '085697362948', '085697362948', 'BOGOR', 'INDONESIA', 1, 0, '2025-12-16', '2025-12-17', 1, 'pending', 4000, 4000, 'BOOKING', '2025-12-16 07:20:43', 'INV-20251216-02117'),
(20, 2, 'binzzu', 'binzzugt123@gmail.com', '085697362948', '085697362948', 'BOGOR', 'INDONESIA', 1, 0, '2025-12-16', '2025-12-17', 1, 'pending', 4000, 4000, 'BOOKING', '2025-12-16 07:22:49', 'INV-20251216-329A3'),
(21, 2, 'binzzu', 'binzzugt123@gmail.com', '085697362948', '085697362948', 'BOGOR', 'INDONESIA', 1, 0, '2025-12-16', '2025-12-17', 1, 'pending', 4000, 4000, 'BOOKING', '2025-12-16 07:22:52', 'INV-20251216-8A277'),
(22, 2, 'binzzu', 'binzzugt123@gmail.com', '085697362948', '085697362948', 'BOGOR', 'INDONESIA', 1, 0, '2025-12-16', '2025-12-17', 1, 'pending', 4000, 4000, 'BOOKING', '2025-12-16 07:23:53', 'INV-20251216-35317'),
(23, 2, 'binzzu', 'binzzugt123@gmail.com', '085697362948', '085697362948', 'BOGOR', 'INDONESIA', 1, 0, '2025-12-16', '2025-12-17', 1, 'pending', 4000, 4000, 'BOOKING', '2025-12-16 07:24:56', 'INV-20251216-A37EC'),
(24, 2, 'Dewi', 'binzzugt123@gmail.com', '085697362948', '085697362948', 'bogor', 'indonesia', 1, 0, '2025-12-18', '2025-12-19', 1, 'pending', 4000, 4000, 'bebas rokok', '2025-12-17 04:23:01', 'INV-20251217-78F41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Management', 'management'),
(2, 'Facilities', 'facilities'),
(3, 'Events', 'events'),
(4, 'Restaurant', 'restaurant'),
(5, 'Hotel Design', 'hotel-design');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `name`, `email`, `comment`, `created_at`) VALUES
(1, 1, NULL, 'John Doe', 'john@gmail.com', 'Artikel yang sangat informatif!', '2025-12-02 02:43:08'),
(2, 1, NULL, 'Rina Putri', 'rina@example.com', 'Saya suka artikel ini.', '2025-12-02 02:43:08'),
(3, 2, NULL, 'Michael', 'michael@yahoo.com', 'Terima kasih informasinya.', '2025-12-02 02:43:08'),
(4, 3, NULL, 'Sarah', 'sarah@mail.com', 'Tulisan yang menarik!', '2025-12-02 02:43:08'),
(9, 1, 1, 'Andi S', 'andi@example.com', 'Artikel ini sangat bermanfaat!', '2025-12-02 15:44:51'),
(10, 1, 2, 'Budi P', 'budi@example.com', 'Terima kasih, penjelasannya lengkap.', '2025-12-02 15:44:51'),
(11, 2, NULL, 'Guest User', 'guest@mail.com', 'Saya sangat suka kontennya.', '2025-12-02 15:44:51'),
(12, 3, 3, 'Citra A', 'citra@example.com', 'Tulisan yang sangat informatif!', '2025-12-02 15:44:51'),
(13, 1, NULL, 'Ujengs', 'youngsta446@gmail.com', 'Sangat Bagus dan Rapi', '2025-12-02 13:27:49'),
(14, 3, NULL, 'Ujengs', 'youngsta446@gmail.com', 'Bagus', '2025-12-03 11:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'ujeng', 'youngsta446@gmail.com', 'test', 'test', '2025-12-14 10:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_hotel`
--

CREATE TABLE `daftar_hotel` (
  `id` int(11) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_hotel`
--

INSERT INTO `daftar_hotel` (`id`, `country`, `city`, `address`, `image`, `is_featured`, `created_at`) VALUES
(1, 'United States', 'Farmington Hills', '28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A', '1.jpg', 1, '2025-12-15 13:12:07'),
(2, 'United Kingdom', 'London', 'Farmington Hills, London', '2.jpg', 0, '2025-12-15 13:12:07'),
(3, 'Australia', 'Melbourne', 'Farmington Hills, Melbourne', '3.jpg', 0, '2025-12-15 13:12:07'),
(4, 'Germany', 'Germany', 'Farmington Hills, Germany', '4.jpg', 0, '2025-12-15 13:12:07'),
(5, 'India', 'Chennai', 'Farmington Hills, Chennai', '5.jpg', 0, '2025-12-15 13:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `detail_reservasi`
--

CREATE TABLE `detail_reservasi` (
  `id` int(11) NOT NULL,
  `id_reservasi` int(11) NOT NULL,
  `no_kamar` varchar(20) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `jumlah_dewasa` int(3) DEFAULT 1,
  `jumlah_anak` int(3) DEFAULT 0,
  `harga_saat_reservasi` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `slug` varchar(160) NOT NULL,
  `description` text NOT NULL,
  `event_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `quota` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `description`, `event_date`, `end_date`, `quota`, `image`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Food factory', 'food-factory', 'Many desktop publishing packages and web page editors now use Lorem Ipsum.', '2017-12-09', NULL, 10, '2.jpg', 'Jakarta', 'active', '2025-12-18 20:44:22', '2025-12-18 21:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `event_registrations`
--

CREATE TABLE `event_registrations` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_registrations`
--

INSERT INTO `event_registrations` (`id`, `event_id`, `name`, `email`, `phone`, `created_at`) VALUES
(1, 1, 'test', 'luqmanaly666@gmail.com', '085697362948', '2025-12-18 21:29:35'),
(3, 1, 'Ujeng', 'youngsta446@gmail.com', '085697362948', '2025-12-18 21:36:09'),
(4, 1, 'Likeu Garlita', 'pusatgadailikeu@gmail.com', '08118562134', '2025-12-18 23:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `extra_services`
--

CREATE TABLE `extra_services` (
  `id` int(11) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `extra_services`
--

INSERT INTO `extra_services` (`id`, `nama_layanan`, `harga`, `gambar`) VALUES
(1, 'Standard Room', 50, '1.jpg'),
(2, 'Deluxe Room', 75, '2.jpg'),
(3, 'Premium Suite', 99, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `extra_service_features`
--

CREATE TABLE `extra_service_features` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `fitur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `extra_service_features`
--

INSERT INTO `extra_service_features` (`id`, `service_id`, `fitur`) VALUES
(1, 1, 'Bed & Breakfast'),
(2, 1, 'Home Made Food'),
(3, 1, 'Tour Guide'),
(4, 1, 'Safety & Security'),
(5, 1, 'Local Heritage'),
(6, 2, 'Bed & Breakfast'),
(7, 2, 'Home Made Food'),
(8, 2, 'Airport Pickup'),
(9, 2, 'Free Massage'),
(10, 2, 'Private Balcony'),
(11, 3, 'King Size Bed'),
(12, 3, 'VIP Lounge Access'),
(13, 3, 'Personal Butler'),
(14, 3, 'Free Spa'),
(15, 3, 'Executive Workspace');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `nama_fitur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `nama_fitur`) VALUES
(1, 'Ironing facilities'),
(2, 'Tea/Coffee maker'),
(3, 'Air conditioning'),
(4, 'Flat-screen TV'),
(5, 'Wake-up service'),
(6, 'WIFI');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `tipe_kamar_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `image`, `tipe_kamar_id`, `is_active`, `created_at`) VALUES
(1, 'Suite Room View', 'Pemandangan kamar suite', 'gallery-1.jpg', 1, 0, '2025-12-01 06:48:57'),
(2, 'Deluxe Room', 'Kamar deluxe dengan balkon', 'gallery-2.jpg', 1, 0, '2025-12-01 06:48:57'),
(3, 'Standard Room', 'Kamar standard nyaman', 'gallery-3.jpg', 1, 0, '2025-12-01 06:48:57'),
(4, 'Hotel Lobby', 'Lobi hotel modern', 'gallery-4.jpg', 1, 0, '2025-12-01 06:48:57'),
(5, 'Swimming Pool', 'Kolam renang hotel', 'gallery-5.jpg', 1, 0, '2025-12-01 06:48:57'),
(6, 'Kamar Mandi', 'reborn', '176552933779.jpg', 1, 1, '2025-12-12 02:48:57'),
(7, 'Kamar Mandi', 'kamar mandi', '176552951656.jpg', 1, 1, '2025-12-12 02:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_kamar`
--

CREATE TABLE `gallery_kamar` (
  `id` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_kamar`
--

INSERT INTO `gallery_kamar` (`id`, `id_kamar`, `image_path`, `caption`, `is_active`) VALUES
(1, 5, '176560717656.jpeg', 'Standar Room', 1),
(4, 5, '176560494952.jpeg', 'Kamar Mandi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_kategori`, `nama_menu`, `deskripsi`, `harga`, `gambar`, `is_active`) VALUES
(1, 1, 'Grilled Salmon Steak', 'Ayam panggang saus teriyaki, nasi hangat, dan salad Jepang.', 50000, '1.jpg', 1),
(2, 1, 'Chicken Teriyaki Bowl', 'Ayam panggang saus teriyaki, nasi hangat, dan salad Jepang.', 38000, '2.jpg', 1),
(3, 1, 'Beef Tenderloin Steak', 'Daging sapi premium dengan saus lada hitam dan kentang goreng.', 60000, '3.jpg', 1),
(4, 1, 'Seafood Platter', 'Udang, cumi, dan ikan goreng tepung dengan saus tartar.', 55000, '4.jpg', 1),
(5, 2, 'Paneer Butter Masala', 'Potongan paneer lembut dalam saus tomat krim berbumbu.', 30000, '9.jpg', 1),
(6, 2, 'Vegetable Biryani', 'Nasi rempah dengan sayuran segar dan yoghurt mint.', 28000, '10.jpg', 1),
(7, 2, 'Greek Salad', 'Salad segar dengan keju feta, tomat, zaitun, dan dressing lemon.', 20000, '12.jpg', 1),
(8, 2, 'Mushroom Soup', 'Sup jamur creamy dengan roti panggang renyah.', 18000, '11.jpg', 1),
(9, 3, 'Fresh Orange Juice', 'Jus jeruk segar tanpa gula tambahan.', 8000, 'drink1.jpg', 1),
(10, 3, 'Iced Coffee Latte', 'Kopi arabika premium dengan susu segar dan es batu.', 10000, 'drink2.jpg', 1),
(11, 3, 'Chocolate Lava Cake', 'Kue cokelat hangat dengan lelehan cokelat di dalamnya.', 12000, 'dessert1.jpg', 1),
(12, 3, 'Cheesecake Blueberry', 'Kue lembut dengan topping blueberry segar.', 15000, 'dessert2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `category`, `name`, `description`, `price`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Breakfast', 'Mustrd Chicken with', 'This is the dolor sit amet consectetur adipisicing elit. Quae vel nobis tempora, nam non.', '60.00', 'mustrd_chicken.jpg', 1, '2025-11-30 00:41:28', NULL),
(2, 'Breakfast', 'Pan Con Berenjina Frita', 'Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', '30.00', 'pan_berenjina.jpg', 1, '2025-11-30 00:41:28', NULL),
(3, 'Breakfast', 'Salmon Tataki Capaccio', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', '45.00', 'salmon_tataki.jpg', 1, '2025-11-30 00:41:28', NULL),
(4, 'Lunch', 'Lubina Marinada', 'Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.', '15.00', 'lubina_marinada.jpg', 1, '2025-11-30 00:41:28', NULL),
(5, 'Lunch', 'Nashville Hot Chicken', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.', '30.00', 'nashville_hot.jpg', 1, '2025-11-30 00:41:28', NULL),
(6, 'Lunch', 'Biscuits and Gravy', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.', '55.00', 'biscuits_gravy.jpg', 1, '2025-11-30 00:41:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE `menu_category` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`id`, `nama_kategori`) VALUES
(1, 'Non Veg'),
(2, 'Veg'),
(3, 'Drinks & Desserts');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(150) NOT NULL,
  `price` varchar(50) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `room` varchar(50) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `note` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `published_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `published_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `slug`, `thumbnail`, `content`, `published_date`, `created_at`, `published_at`, `updated_at`, `status`) VALUES
(1, 1, 2, 'Most Expensive Hotel Rooms In New York', 'most-expensive-hotel-rooms-in-new-york', '2.jpg', 'Menginap di hotel modern menawarkan pengalaman yang lebih dari sekadar tidur dan istirahat. Dengan fasilitas lengkap, teknologi canggih, serta pelayanan profesional, hotel menjadi pilihan ideal baik untuk liburan keluarga, perjalanan bisnis, maupun staycation santai.\n\nJika Anda sedang merencanakan perjalanan dalam waktu dekat, memilih hotel berkualitas adalah langkah tepat untuk memastikan pengalaman yang menyenangkan.', NULL, '2025-12-02 02:42:56', NULL, '2025-12-14 06:03:05', 1),
(2, 1, 1, 'The Best Hotels For Business Vacations', 'the-best-hotels-for-business-vacations', '3.jpg', 'Artikel tentang hotel terbaik untuk perjalanan bisnis...', NULL, '2025-12-02 02:42:56', NULL, '2025-12-14 06:03:08', 1),
(3, 1, 4, 'Guests Offers Exclusive Facilities to Services', 'guests-offer-exclusive-facilities', '4.jpg', 'Artikel mengenai penawaran fasilitas eksklusif hotel...', NULL, '2025-12-02 02:42:56', NULL, '2025-12-14 06:03:14', 1),
(49, 1, 1, '123', '123-1765699478', 'Blog_1765699478.jpeg', '123', '2025-12-14', '2025-12-14 02:04:38', '2025-12-14 09:04:38', '2025-12-14 08:04:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`) VALUES
(25, 1, 1),
(26, 1, 2),
(27, 1, 7),
(28, 2, 3),
(29, 2, 10),
(30, 3, 4),
(31, 3, 12),
(32, 4, 6),
(33, 4, 7),
(34, 4, 11),
(35, 5, 2),
(36, 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `post_topics`
--

CREATE TABLE `post_topics` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_topics`
--

INSERT INTO `post_topics` (`id`, `post_id`, `topic_id`) VALUES
(1, 2, 56),
(2, 1, 5),
(3, 1, 10),
(4, 3, 60),
(5, 1, 57),
(6, 3, 59),
(7, 1, 46),
(8, 1, 58),
(9, 3, 31),
(10, 1, 81),
(11, 2, 14),
(12, 3, 7),
(13, 1, 69),
(14, 1, 83),
(15, 3, 78),
(16, 2, 84),
(17, 2, 38),
(18, 2, 46),
(19, 3, 37),
(20, 3, 39),
(21, 3, 30),
(22, 1, 63),
(23, 3, 23),
(24, 3, 83),
(25, 2, 24),
(26, 2, 93),
(27, 2, 65),
(28, 2, 74),
(29, 2, 3),
(30, 2, 82),
(31, 3, 76),
(32, 3, 25),
(33, 1, 1),
(34, 3, 66),
(35, 1, 16),
(36, 3, 9),
(37, 3, 89),
(38, 3, 68),
(39, 1, 54),
(40, 3, 2),
(41, 3, 61),
(42, 3, 69),
(43, 2, 8),
(44, 3, 71),
(45, 3, 13),
(46, 3, 53),
(47, 2, 92),
(48, 1, 70),
(49, 1, 36),
(50, 1, 65),
(51, 3, 44),
(52, 1, 93),
(53, 2, 54),
(54, 3, 86),
(55, 2, 40),
(56, 1, 89),
(57, 3, 80),
(58, 1, 76),
(59, 2, 47),
(60, 1, 91),
(61, 3, 88),
(62, 3, 57),
(63, 1, 45),
(64, 3, 90),
(65, 2, 29),
(66, 2, 48),
(67, 3, 91),
(68, 3, 95),
(69, 1, 79),
(70, 2, 53),
(71, 2, 37),
(72, 3, 94),
(73, 2, 62),
(74, 3, 74),
(75, 3, 46),
(76, 2, 64),
(77, 2, 17),
(78, 2, 96),
(79, 3, 42),
(80, 2, 27),
(81, 2, 2),
(82, 1, 85),
(83, 1, 23),
(84, 1, 24),
(85, 1, 94),
(86, 1, 34),
(87, 1, 60),
(88, 1, 43),
(89, 2, 33),
(90, 2, 39),
(91, 2, 77),
(92, 3, 14),
(93, 1, 95),
(94, 3, 50),
(95, 1, 14),
(96, 1, 6),
(97, 2, 55),
(98, 1, 13),
(99, 1, 28),
(100, 2, 63);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `quote` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quote`, `name`, `posisi`) VALUES
(1, '\"Berakit-rakit ke hulu berenang-renang ketepian, bersakit-sakit dahulu bersenang-senang kemudian\"', 'Luqman Aly Razak', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) NOT NULL,
  `id_tamu` int(11) NOT NULL,
  `kode_reservasi` varchar(20) NOT NULL,
  `tgl_reservasi` datetime NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `total_biaya` decimal(12,2) NOT NULL,
  `status_reservasi` enum('Pending','Confirmed','Cancelled') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_menu`
--

CREATE TABLE `restaurant_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant_menu`
--

INSERT INTO `restaurant_menu` (`id`, `nama_menu`, `harga`, `deskripsi`, `image`) VALUES
(1, 'Nasi Goreng Spesial', '45000.00', 'Nasi goreng khas hotel dengan topping ayam dan udang.', 'nasgor.jpg'),
(2, 'Beef Steak', '95000.00', 'Steak daging sapi premium dengan saus lada hitam.', 'steak.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_room` int(11) DEFAULT 1,
  `old_price` decimal(10,2) DEFAULT NULL,
  `max_adult` int(3) NOT NULL,
  `max_child` int(3) NOT NULL,
  `rating` decimal(3,1) DEFAULT 0.0,
  `main_image` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `tag` varchar(50) DEFAULT NULL,
  `promo_start` date DEFAULT NULL,
  `promo_end` date DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `price`, `total_room`, `old_price`, `max_adult`, `max_child`, `rating`, `main_image`, `deskripsi`, `status`, `tag`, `promo_start`, `promo_end`, `is_active`) VALUES
(1, 'Master Suite', '150000.00', 5, '165000.00', 3, 1, '4.5', '1.jpg', 'Kamar mewah dengan fasilitas lengkap', 6, 'Featured', '2025-12-14', '2025-12-14', 1),
(2, 'Mini Suite', '4000.00', 20, '4500.00', 2, 1, '4.2', '2.jpg', 'Kamar nyaman untuk keluarga kecil', 1, 'special', '2025-12-15', '2025-12-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`id`, `room_id`, `feature_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 1),
(7, 2, 2),
(8, 2, 3),
(9, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cta` varchar(255) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `slug`, `short_description`, `description`, `cta`, `icon`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Restaurant Service', 'restaurant-service', '\"Kehangatan Rumah di Setiap Hidangan yang Kami Sajikan\"', 'Mencari tempat makan yang nyaman setelah lelah beraktivitas seharian? Masuklah ke restoran kami dan biarkan kami memanjakan Anda. Layanan hotel kami hadir dengan satu filosofi sederhana: memperlakukan setiap tamu seperti keluarga sendiri.\n\nMenu kami adalah perpaduan antara kelezatan tradisional dan sentuhan modern, dimasak dengan cinta untuk menghadirkan rasa yang akrab namun tetap istimewa. Ruangan kami yang luas dan nyaman sangat cocok untuk Anda yang ingin bersantai tanpa gangguan, ditemani oleh staf ramah yang selalu siap membantu dengan senyuman.\n\nKami mengundang Anda untuk duduk, rileks, dan menikmati sajian terbaik yang kami siapkan khusus untuk Anda hari ini. Karena bagi kami, kepuasan Anda adalah kebanggaan terbesar kami.', 'Butuh bantuan atau ingin memesan tempat? Klik \"Tanya Lebih Lanjut\" sekarang, kami siap membantu Anda!', 'fa fa-cutlery', 'le-gran-cafe_standard.jpg', 'active', '2025-12-16 23:59:02', '2025-12-17 22:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `status`, `created_at`) VALUES
(1, 'youngsta446@gmail.com', 'active', '2025-12-16 05:24:03'),
(2, 'binzzugt123@gmail.com', 'active', '2025-12-16 05:25:00'),
(3, 'youngsta466@gmail.com', 'active', '2025-12-16 05:30:25'),
(4, 'ujeng@gmail.com', 'active', '2025-12-16 05:32:14'),
(5, 'binzzugt1233@gmail.com', 'active', '2025-12-16 05:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `sys_codes`
--

CREATE TABLE `sys_codes` (
  `srn_id` int(11) NOT NULL,
  `srn_code` varchar(50) DEFAULT NULL,
  `srn_value` int(11) DEFAULT 0,
  `srn_length` int(11) DEFAULT 1,
  `srn_format` varchar(50) DEFAULT NULL,
  `srn_year` int(11) DEFAULT NULL,
  `srn_month` int(11) DEFAULT NULL,
  `srn_reset_by` varchar(20) DEFAULT 'NONE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sys_codes`
--

INSERT INTO `sys_codes` (`srn_id`, `srn_code`, `srn_value`, `srn_length`, `srn_format`, `srn_year`, `srn_month`, `srn_reset_by`) VALUES
(1, 'SN-KLASIFIKASI-SURAT', 5, 5, 'SNKS-{VALUE}', 2017, 1, 'YEAR'),
(9, 'SN-KLASIFIKASI-FILE', 2, 5, 'SNKF-{MONTH}/{YEAR}-{VALUE}', NULL, NULL, 'NONE'),
(10, 'SN-SARANA-MEDIA', 5, 5, 'SSN-{MONTH}/{YEAR}-{VALUE}', NULL, NULL, 'NONE'),
(11, 'SN-TICKET', 76, 6, 'T{VALUE}', NULL, NULL, 'NONE'),
(13, '071.25', 3, 1, '{VALUE}', 2019, NULL, 'NONE'),
(14, '072', 3, 1, '{VALUE}', NULL, NULL, 'NONE'),
(15, '073.6', 0, 1, '{VALUE}', NULL, NULL, 'NONE'),
(16, '076.4', 1, 1, '{VALUE}', NULL, NULL, 'NONE'),
(17, '077.1', 1, 1, '{VALUE}', NULL, NULL, 'NONE'),
(18, '999.99', 38, 1, '{VALUE}', NULL, NULL, 'NONE'),
(19, '999.99', 38, 1, '{VALUE}', 2019, NULL, 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`) VALUES
(1, 'Hotel', 'hotel'),
(2, 'Travel', 'travel'),
(3, 'Lifestyle', 'lifestyle'),
(4, 'Food', 'food'),
(5, 'Tips', 'tips'),
(6, 'Promotion', 'promotion'),
(7, 'Vacation', 'vacation'),
(8, 'Holiday', 'holiday'),
(9, 'Luxury', 'luxury'),
(10, 'Booking', 'booking'),
(11, 'Review', 'review'),
(12, 'Family', 'family');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id` int(11) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `pesan` text NOT NULL,
  `rating` int(11) DEFAULT 5,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `nama`, `asal`, `foto`, `pesan`, `rating`, `created_at`) VALUES
(1, 'Luqman Aly Razak', 'Bogor, Indonesia', 'testi-1.jpg', '\"Bagus\"', 5, '2025-12-01 08:34:57'),
(2, 'Michael Nova', 'California, USA', 'testi-1.jpg', '\"Sangat puas menginap di hotel ini, pelayanannya luar biasa...\"', 5, '2025-12-01 08:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`) VALUES
(1, 'Adventure Travel', 'adventure-travel'),
(2, 'Healthy Living', 'healthy-living'),
(3, 'Food Trends', 'food-trends'),
(4, 'Digital Marketing', 'digital-marketing'),
(5, 'Artificial Intelligence', 'artificial-intelligence'),
(6, 'Personal Finance', 'personal-finance'),
(7, 'Mobile Technology', 'mobile-technology'),
(8, 'Gourmet Recipes', 'gourmet-recipes'),
(9, 'Smart Home', 'smart-home'),
(10, 'Sports Insights', 'sports-insights'),
(11, 'Online Business', 'online-business'),
(12, 'Outdoor Lifestyle', 'outdoor-lifestyle'),
(13, 'Sustainable Living', 'sustainable-living'),
(14, 'Tech Innovations', 'tech-innovations'),
(15, 'Product Reviews', 'product-reviews'),
(16, 'Travel Tips', 'travel-tips'),
(17, 'Healthy Recipes', 'healthy-recipes'),
(18, 'Photography Tips', 'photography-tips'),
(19, 'Gaming News', 'gaming-news'),
(20, 'Fitness Training', 'fitness-training'),
(21, 'Car Technology', 'car-technology'),
(22, 'Hotel Reviews', 'hotel-reviews'),
(23, 'Family Travel', 'family-travel'),
(24, 'Career Growth', 'career-growth'),
(25, 'Remote Working', 'remote-working'),
(26, 'Self Improvement', 'self-improvement'),
(27, 'Eco Tourism', 'eco-tourism'),
(28, 'Digital Nomad', 'digital-nomad'),
(29, 'Daily Motivation', 'daily-motivation'),
(30, 'Skin Care', 'skin-care'),
(31, 'Makeup Tips', 'makeup-tips'),
(32, 'Productivity Hacks', 'productivity-hacks'),
(33, 'Entrepreneurship', 'entrepreneurship'),
(34, 'Startup Advice', 'startup-advice'),
(35, 'Science Updates', 'science-updates'),
(36, 'Space Exploration', 'space-exploration'),
(37, 'Cyber Security', 'cyber-security'),
(38, 'Healthy Habits', 'healthy-habits'),
(39, 'Food Reviews', 'food-reviews'),
(40, 'Learning Skills', 'learning-skills'),
(41, 'Parenting Tips', 'parenting-tips'),
(42, 'Home Design', 'home-design'),
(43, 'Interior Ideas', 'interior-ideas'),
(44, 'Pet Care', 'pet-care'),
(45, 'Investment Tips', 'investment-tips'),
(46, 'Stock Market', 'stock-market'),
(47, 'Travel Photography', 'travel-photography'),
(48, 'World Culture', 'world-culture'),
(49, 'Language Learning', 'language-learning'),
(50, 'Tech Reviews', 'tech-reviews'),
(51, 'Gadget Updates', 'gadget-updates'),
(52, 'Business Strategy', 'business-strategy'),
(53, 'Marketing Tips', 'marketing-tips'),
(54, 'Branding Ideas', 'branding-ideas'),
(55, 'Healthy Mindset', 'healthy-mindset'),
(56, 'Life Coaching', 'life-coaching'),
(57, 'Mindfulness', 'mindfulness'),
(58, 'Creative Writing', 'creative-writing'),
(59, 'Book Reviews', 'book-reviews'),
(60, 'Movie Talk', 'movie-talk'),
(61, 'Music Trends', 'music-trends'),
(62, 'Art Inspiration', 'art-inspiration'),
(63, 'Fitness Motivation', 'fitness-motivation'),
(64, 'Yoga & Meditation', 'yoga-and-meditation'),
(65, 'Food Photography', 'food-photography'),
(66, 'Coding Tutorials', 'coding-tutorials'),
(67, 'Web Development', 'web-development'),
(68, 'Programming Tips', 'programming-tips'),
(69, 'Mobile Apps', 'mobile-apps'),
(70, 'Artificial Trends', 'artificial-trends'),
(71, 'Blockchain News', 'blockchain-news'),
(72, 'Crypto Updates', 'crypto-updates'),
(73, 'Business Finance', 'business-finance'),
(74, 'Tax Planning', 'tax-planning'),
(75, 'Travel Deals', 'travel-deals'),
(76, 'Hotel Industry', 'hotel-industry'),
(77, 'Culinary Ideas', 'culinary-ideas'),
(78, 'Vegan Lifestyle', 'vegan-lifestyle'),
(79, 'Green Technology', 'green-technology'),
(80, 'Interior Trends', 'interior-trends'),
(81, 'Food Culture', 'food-culture'),
(82, 'Remote Lifestyle', 'remote-lifestyle'),
(83, 'Minimalism Living', 'minimalism-living'),
(84, 'Mental Health', 'mental-health'),
(85, 'Healthy Food', 'healthy-food'),
(86, 'Cooking Basics', 'cooking-basics'),
(87, 'Sports Training', 'sports-training'),
(88, 'Football News', 'football-news'),
(89, 'Basketball Talk', 'basketball-talk'),
(90, 'Luxury Travel', 'luxury-travel'),
(91, 'Travel Guides', 'travel-guides'),
(92, 'Science Facts', 'science-facts'),
(93, 'AI Tools', 'ai-tools'),
(94, 'Tech Hacks', 'tech-hacks'),
(95, 'Business Tools', 'business-tools'),
(96, 'Entrepreneur Life', 'entrepreneur-life');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `bio`, `avatar`, `created_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$4iSyQ5d7HbUSYfN3H6ihxOHZ2IuS5uO/HMxG4JpkHmg6lAsqUbtRu', 'Saya adalah admin sekaligus penulis utama blog hotel.', 'default_admin.jpg', '2025-12-02 09:42:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alus_g`
--
ALTER TABLE `alus_g`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `alus_gd`
--
ALTER TABLE `alus_gd`
  ADD PRIMARY KEY (`agd_id`) USING BTREE;

--
-- Indexes for table `alus_la`
--
ALTER TABLE `alus_la`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `alus_mg`
--
ALTER TABLE `alus_mg`
  ADD PRIMARY KEY (`menu_id`) USING BTREE;

--
-- Indexes for table `alus_mga`
--
ALTER TABLE `alus_mga`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_groups_deleted` (`id_group`) USING BTREE,
  ADD KEY `fk_menu_deleted` (`id_menu`) USING BTREE;

--
-- Indexes for table `alus_u`
--
ALTER TABLE `alus_u`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `sys_users_idx1` (`id`) USING BTREE,
  ADD KEY `sys_users_idx2` (`id`) USING BTREE;

--
-- Indexes for table `alus_ug`
--
ALTER TABLE `alus_ug`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`) USING BTREE,
  ADD KEY `fk_users_groups_users1_idx` (`user_id`) USING BTREE,
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`) USING BTREE;

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `fk_comment_user` (`user_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_hotel`
--
ALTER TABLE `daftar_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reservasi` (`id_reservasi`),
  ADD KEY `fk_detail_tipe_kamar` (`id_tipe_kamar`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_slug` (`slug`);

--
-- Indexes for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_event_email` (`event_id`,`email`);

--
-- Indexes for table `extra_services`
--
ALTER TABLE `extra_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_service_features`
--
ALTER TABLE `extra_service_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipe_kamar_id` (`tipe_kamar_id`);

--
-- Indexes for table `gallery_kamar`
--
ALTER TABLE `gallery_kamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_post_category` (`category_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `post_topics`
--
ALTER TABLE `post_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tamu` (`id_tamu`);

--
-- Indexes for table `restaurant_menu`
--
ALTER TABLE `restaurant_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `feature_id` (`feature_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sys_codes`
--
ALTER TABLE `sys_codes`
  ADD PRIMARY KEY (`srn_id`) USING BTREE;

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `alus_g`
--
ALTER TABLE `alus_g`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `alus_gd`
--
ALTER TABLE `alus_gd`
  MODIFY `agd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `alus_la`
--
ALTER TABLE `alus_la`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `alus_mg`
--
ALTER TABLE `alus_mg`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `alus_mga`
--
ALTER TABLE `alus_mga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4146;

--
-- AUTO_INCREMENT for table `alus_u`
--
ALTER TABLE `alus_u`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `alus_ug`
--
ALTER TABLE `alus_ug`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_hotel`
--
ALTER TABLE `daftar_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `extra_services`
--
ALTER TABLE `extra_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `extra_service_features`
--
ALTER TABLE `extra_service_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery_kamar`
--
ALTER TABLE `gallery_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `post_topics`
--
ALTER TABLE `post_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_menu`
--
ALTER TABLE `restaurant_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sys_codes`
--
ALTER TABLE `sys_codes`
  MODIFY `srn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alus_ug`
--
ALTER TABLE `alus_ug`
  ADD CONSTRAINT `alus_ug_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `alus_g` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `alus_ug_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `alus_u` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD CONSTRAINT `event_registrations_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `menu_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `room_features_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_features_ibfk_2` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
