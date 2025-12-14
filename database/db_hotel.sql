-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2025 at 10:33 AM
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
-- Database: `db_hotel`
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
(1, 'admin', 'testaa');

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
(12, 30, 'Group', 'group', '', 'fa fa-book fa-fw', 2),
(13, 30, 'User', 'users', '', 'fa fa-book fa-fw', 3),
(30, 0, 'Master', '#', '', 'fa fa-bars fa-fw', 1),
(82, 0, 'Komentar', 'data_comments', '', 'fa fa-comments fa-fw', 3),
(87, 0, 'Data Kamar', 'data_kamar', '', 'fa fa-hotel fa-fw', 5),
(88, 0, 'Data Gallery', 'data_gallery', '', 'fa fa-camera fa-fw', 5),
(89, 0, 'Data Blog', 'data_blog', '', 'fa fa-bullhorn fa-fw', 5),
(90, 0, 'More', '#', '', 'fa fa-server fa-fw', 6),
(91, 90, 'Data Banner', 'data_banner', '', 'fa fa-photo fa-fw', 6),
(92, 0, 'Data Gallery Kamar', 'data_gallery_kamar', '', 'fa fa-plus fa-fw', 5);

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
(3967, 1, 30, 1, 0, 0, 0, '2016-09-06 10:55:00', '2016-09-06 10:56:00', '2016-08-08 12:06:00', '2016-08-08 12:06:00'),
(3968, 1, 11, 1, 1, 1, 1, '2016-09-06 10:55:00', '2016-09-06 10:55:00', '2016-08-08 12:06:00', '2016-08-09 13:50:00'),
(3969, 1, 12, 1, 1, 1, 1, '2016-09-06 10:55:00', '2016-09-06 10:55:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3970, 1, 13, 1, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3971, 1, 80, 0, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3972, 1, 81, 0, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3973, 1, 82, 0, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3974, 1, 83, 0, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3975, 1, 84, 0, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3976, 1, 85, 0, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3977, 1, 86, 0, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3978, 1, 87, 1, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3979, 1, 88, 1, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3980, 1, 89, 1, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3981, 1, 90, 1, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3982, 1, 91, 1, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00'),
(3983, 1, 92, 1, 1, 1, 1, '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00');

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
(64, 'admins', 'admins', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+5Kixew57njDPeg==', '::1', '$2y$08$GgyrrdcJTxV0YIu5On5qoell7OztL8kp1tdlpkoWstcqKZNp1IaZS', 'xEfWFClsAdO4BnNm', '', NULL, 1764865143, '', 1469523580, 1765683447, 1, 'Super', 'Admin', '', '085697362948', 0, '1496118042.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'BAGIAN PERLENGKAPAN', 'BAGIAN PERLENGKAPAN', 'MTIzNDU2Nzg5MDEyMzQ1NsGuoJM/yqy8eAN68DTNdlID3W0pjA==', '::1', '$2y$08$JoKZ4fv6BkH5WTWLwW9IfulZAbwPRhawSu5/basXlOukNzemXJuqS', 'Ih49EoG2nF0Zt38O', NULL, NULL, NULL, NULL, 1542868077, 1550670091, 1, 'BAGIAN PERLENGKAPAN', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 1, NULL, NULL, NULL, NULL),
(66, 'DINAS PENDIDIKAN', 'DINAS PENDIDIKAN', 'MTIzNDU2Nzg5MDEyMzQ1Nv2quZ4/3a+0fSdy3TLJexUMnGM=', '::1', '$2y$08$VUKn/N/Oz3h/8IB7somj3ODzqJ3cGYVnLbUw/QESB9MVhCV.zeInG', 'Qoc9aAIiYkGjg9IZ', NULL, NULL, NULL, NULL, 1542868087, 1550991198, 1, 'DINAS PENDIDIKAN', '', NULL, '0', 0, 'avatar_default.png', NULL, 2, NULL, NULL, NULL, NULL),
(67, 'KECAMATAN KAYAN HULU', 'KECAMATAN KAYAN HULU', 'MTIzNDU2Nzg5MDEyMzQ1Nva5/Iwiy6i5IlBV1z7BfldBkGEr', '::1', '$2y$08$amSFXmE4w705SSYY562IM.wr5fvtERPp7sXIFyi04MgZVY2rEhMXS', 'rrptJbn3YVDGJGOF', NULL, NULL, NULL, NULL, 1542868107, 1549440969, 1, 'KECAMATAN KAYAN HULU', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 3, NULL, NULL, NULL, NULL),
(68, 'KECAMATAN MALINAU SELATAN HULU', 'KECAMATAN MALINAU SELATAN HULU', 'MTIzNDU2Nzg5MDEyMzQ1Nvqlppk5z7y8ckkjghPHeloGnyAljoA=', '::1', '$2y$08$54yXxiB4w4TpZrfS8E4k2.8h24NaIjW9txSJQJ5lTnpmT9b.Rbqpi', 'Ftr/Tmqyey/I30FI', NULL, NULL, NULL, NULL, 1542868115, 1551275597, 1, 'KECAMATAN MALINAU SELATAN HULU', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 4, NULL, NULL, NULL, NULL),
(69, 'KECAMATAN MALINAU KOTA', 'KECAMATAN MALINAU KOTA', 'MTIzNDU2Nzg5MDEyMzQ1Nvqlppk5z7y8cidy3TLJexUMnGM=', '::1', '$2y$08$El7EPObwt.3SXLXC/Ra/Pe038PDY5nrJWQJ0Ol8H9dwGC.rU45Ed6', '60TGEWENwJbU2E.t', NULL, NULL, NULL, NULL, 1542868123, 1549271960, 1, 'KECAMATAN MALINAU KOTA', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 5, NULL, NULL, NULL, NULL),
(70, 'BADAN PERENCANAAN PEMBANGUNAN DAERAH DAN LITBANG', 'BADAN PERENCANAAN PEMBANGUNAN DAERAH DAN LITBANG', 'MTIzNDU2Nzg5MDEyMzQ1Nvqlppk5z7y8ckkn8DTNdlID3W0pjA==', '::1', '$2y$08$rxv1uLfYNkY6rsWG1FUF0eO5ai0o0b/yahX1H1cgxKRmRyCVGkKJ6', 'nZnOhCQn1ho5dbWZ', NULL, NULL, NULL, NULL, 1542868130, NULL, 1, 'BADAN PERENCANAAN PEMBANGUNAN DAERAH DAN LITBANG', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 6, NULL, NULL, NULL, NULL),
(71, 'DINAS PERHUBUNGAN', 'DINAS PERHUBUNGAN', 'MTIzNDU2Nzg5MDEyMzQ1NuuqvJsjzb2wcRJn1T3gcFYOmmJogoKq', '::1', '$2y$08$/KMY9ZSiaLqSNvbQ60A.Gu.pNmuM.rQMm6y5Fa6pgGz2xTNi/6bUu', 'UHVMoXEIQ1Jdlkc/', NULL, NULL, NULL, NULL, 1542868139, NULL, 1, 'DINAS PERHUBUNGAN', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 7, NULL, NULL, NULL, NULL),
(72, 'BAGIAN PEMBANGUNAN', 'BAGIAN PEMBANGUNAN', 'MTIzNDU2Nzg5MDEyMzQ1NsGuoJM/yqy8eAN68DTNdlID3W0pjA==', '::1', '$2y$08$Drr9MvhHhfK.mbZoJpmHgOGT2V358Y/XYbadXbqBiTBXKHGOgb68i', 'lMsDc82.X6.iY6ni', NULL, NULL, NULL, NULL, 1542868147, NULL, 1, 'BAGIAN PEMBANGUNAN', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 8, NULL, NULL, NULL, NULL),
(73, 'SEKRETARIAT DPRD', 'SEKRETARIAT DPRD', 'MTIzNDU2Nzg5MDEyMzQ1NvGut4oj0buwfVYhg33KdXsOl3wnjIyuxGBuHcI=', '::1', '$2y$08$1HRiU7/MXyYi4HGQtRlsReLbmyYbmRJVQ6WBPNp1ZCLRGmWVBp.c6', 'V.h09FO10yyZpodC', NULL, NULL, NULL, NULL, 1542868153, NULL, 1, 'SEKRETARIAT DPRD', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 9, NULL, NULL, NULL, NULL),
(74, 'BAGIAN ORGANISASI', 'BAGIAN ORGANISASI', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnkJid40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$ZFbbTqozjtTDp0L4xJAPPen6cBfKf9F.0PSTjVLhM8a/.tNnpgX4q', 'SSH8uLPH3S1ocJ9x', NULL, NULL, NULL, NULL, 1542868160, 1549447873, 1, 'BAGIAN ORGANISASI', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 10, NULL, NULL, NULL, NULL),
(75, 'BAGIAN PENGADAAN BARANG DAN JASA', 'BAGIAN PENGADAAN BARANG DAN JASA', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnkJyd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$ROEnxItEW6Q/Qe4YAn6QuudF6PLNnTsAg5gjkgmQVNvaIs8cusRQG', 'E4/B7vlEUGSBt/9n', NULL, NULL, NULL, NULL, 1542868167, 1549440721, 1, 'BAGIAN PENGADAAN BARANG DAN JASA', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 11, NULL, NULL, NULL, NULL),
(76, 'BAGIAN PENGELOLAAN PERBATASAN NEGARA', 'BAGIAN PENGELOLAAN PERBATASAN NEGARA', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnkJCd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$gVBcpIGUsBXQXAop6ZbhnO0wkhm4grqUsikYbNzTubdRpsZsVml9i', 'ywaxdj2lO0vyjt5f', NULL, NULL, NULL, NULL, 1542868175, NULL, 1, 'BAGIAN PENGELOLAAN PERBATASAN NEGARA', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 12, NULL, NULL, NULL, NULL),
(79, 'DINAS PERIKANAN', 'DINAS PERIKANAN', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnkIyd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$0IY0nl2KkJMVOxNBo.rpTeTDMWI.7oN6XOp2gKqyZ.PG4EzBUMun2', 'ump1Cg244ldPc4np', NULL, NULL, NULL, NULL, 1542868195, NULL, 1, 'DINAS PERIKANAN', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 15, NULL, NULL, NULL, NULL),
(80, 'DINAS PERTANIAN', 'DINAS PERTANIAN', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnkICd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$DQHmsH7zE6xJtd29MauosunPBgqGN2fml8Kn0JMBxrUhSC9gODKSq', 'm/vUH.JoDbyuWmsX', NULL, NULL, NULL, NULL, 1542868201, NULL, 1, 'DINAS PERTANIAN', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 16, NULL, NULL, NULL, NULL),
(81, 'DINAS PERINDUSTRIAN DAN PERDAGANGAN', 'DINAS PERINDUSTRIAN DAN PERDAGANGAN', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnkISd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$AOnWtOtLE9C2kgvmIjZJJeAQPzsy6wUKYzZK14Vnvt7leqcuABjX2', 'KfwQDwpJFcsNEnHH', NULL, NULL, NULL, NULL, 1542868208, NULL, 1, 'DINAS PERINDUSTRIAN DAN PERDAGANGAN', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 17, NULL, NULL, NULL, NULL),
(82, 'DINAS KEBUDAYAAN DAN PARIWISATA', 'DINAS KEBUDAYAAN DAN PARIWISATA', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnkLid40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$ivq3p0FOZP4/vi6kxtYc4ebkKmx3ZPzZa2qzcAXxCF51FPA6wlIz6', 'Hk6r0krOfpMlJQww', NULL, NULL, NULL, NULL, 1542868214, NULL, 1, 'DINAS KEBUDAYAAN DAN PARIWISATA', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 18, NULL, NULL, NULL, NULL),
(83, 'DINAS KEPEMUDAAN DAN OLAHRAGA', 'DINAS KEPEMUDAAN DAN OLAHRAGA', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnkLyd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$R/fA./V3uYPh2xLWLAC0Zedo3Fr/SRSZZNxfW1shSdYvBWOjX5xrK', 'DMIbULsgw0Cd71wb', NULL, NULL, NULL, NULL, 1542868221, NULL, 1, 'DINAS KEPEMUDAAN DAN OLAHRAGA', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 19, NULL, NULL, NULL, NULL),
(84, 'BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN', 'BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnnJid40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$1sTxGiMpQ/0C1KkU3LHbl.frJhweq1zNzA4bRaEFNRRAWp0AVZ8FK', '00k2AC7bWZWFhzE6', NULL, NULL, NULL, NULL, 1542868234, NULL, 1, 'BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN', '', NULL, '0', 0, 'avatar_default.png', NULL, 20, NULL, NULL, NULL, 11),
(85, 'BAGIAN TATA PEMERINTAHAN', 'BAGIAN TATA PEMERINTAHAN', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnnJyd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$.BDVTDqvas.GZO.l2HLxY.qSUrLwqvYKhOsYdFxPN8fQx39TX2.a6', 'ul0s6PLnTxEx41E2', NULL, NULL, NULL, NULL, 1542868262, NULL, 1, 'BAGIAN TATA PEMERINTAHAN', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 21, NULL, NULL, NULL, NULL),
(86, 'DINAS PEKERJAAN UMUM, PENATAAN RUANG, PERUMAHAN DAN KAWASAN PEMUKIMAN', 'DINAS PEKERJAAN UMUM, PENATAAN RUANG, PERUMAHAN DA', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnnJCd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$BKgKiiPmmLn.DO4P.TyOrObIK1W6dvSFiU5NQfbw.zQ5SysDqp1Fy', 'flkveMiVlkIYUuGJ', NULL, NULL, NULL, NULL, 1542868271, NULL, 1, 'DINAS PEKERJAAN UMUM, PENATAAN RUANG, PERUMAHAN DA', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 22, NULL, NULL, NULL, NULL),
(87, 'BADAN SATUAN POLISI PAMONG PRAJA DAN PEMADAM KEBAKARAN', 'BADAN SATUAN POLISI PAMONG PRAJA DAN PEMADAM KEBAK', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnnJSd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$x.5JfLsBq1G/SBASCV4QROlZvvGJhCcRdJ9fZ4vAqov7eKln6iRk6', '9XDKlgf/4zdQTV1y', NULL, NULL, NULL, NULL, 1542868282, NULL, 1, 'BADAN SATUAN POLISI PAMONG PRAJA DAN PEMADAM KEBAK', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 23, NULL, NULL, NULL, NULL),
(88, 'BADAN KESATUAN BANGSA DAN POLITIK', 'BADAN KESATUAN BANGSA DAN POLITIK', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnnIid40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$VvC4T1V4iZbnc6qPviK94OXUk9eFX9XYMWHsfEEqkQcgApC6dYs0a', 'umkKYV4x1afVmu.8', NULL, NULL, NULL, NULL, 1542868343, NULL, 1, 'BADAN KESATUAN BANGSA DAN POLITIK', '', NULL, '0', 0, 'avatar_default.png', NULL, 24, NULL, NULL, NULL, NULL),
(89, 'DINAS KETAHANAN PANGAN', 'DINAS KETAHANAN PANGAN', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnnIyd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$bSzkJcLMD8wcD9WvDwcnR.y3gtV.tmVf6QzPOld.zxDqC1NHQvNx.', 'yXGdAECGARwCxUer', NULL, NULL, NULL, NULL, 1542868359, NULL, 1, 'DINAS KETAHANAN PANGAN', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 25, NULL, NULL, NULL, NULL),
(90, 'DINAS LINGKUNGAN HIDUP', 'DINAS LINGKUNGAN HIDUP', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnnICd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$zfF8fYPmWJWXOgl7o4Ng3.m3iSLK7DCHKFbCNci0kbShDMYljrQ7S', 'CQvIrGTk/.1hhglm', NULL, NULL, NULL, NULL, 1542868370, NULL, 1, 'DINAS LINGKUNGAN HIDUP', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 26, NULL, NULL, NULL, NULL),
(91, 'DINAS KOMUNIKASI DAN INFORMATIKA', 'DINAS KOMUNIKASI DAN INFORMATIKA', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnnISd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$wj1DM4xogVCf/mPzU5054uUxwBhjF9sByjY.gLEIhYo8RhAMEgvY2', 'oUe.j.CXcGZtxfhX', NULL, NULL, NULL, NULL, 1542868381, NULL, 1, 'DINAS KOMUNIKASI DAN INFORMATIKA', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 27, NULL, NULL, NULL, NULL),
(92, 'DINAS PEMBERDAYAAN PEREMPUAN, PERLINDUNGAN ANAK DAN SOSIAL', 'DINAS PEMBERDAYAAN PEREMPUAN, PERLINDUNGAN ANAK DA', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnnLid40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$O.BepJnMjdf34wthDVp3X.GkVXkzyWwOt8L3ZKHuDHPqYd7jCjWkm', 'Sg0zS/LEL1CHLTzd', NULL, NULL, NULL, NULL, 1542868391, NULL, 1, 'DINAS PEMBERDAYAAN PEREMPUAN, PERLINDUNGAN ANAK DA', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 28, NULL, NULL, NULL, NULL),
(93, 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA', 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnnLyd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$znw3goPM9pnMUmpxw/qP1OOgaKk4VC/yzFnBjYtIOY2WbNKmJud4y', '17N73VZ2I3Rn3.rd', NULL, NULL, NULL, NULL, 1542868409, NULL, 1, 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 29, NULL, NULL, NULL, NULL),
(94, 'DINAS PENANAMAN MODAL, PELAYANAN TERPADU SATU PINTU DAN TENAGA KERJA', 'DINAS PENANAMAN MODAL, PELAYANAN TERPADU SATU PINT', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnmJid40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$OythoUmfSuJtqq4wyQX6sOhTSgnz5xmIr9MMnwTyf8lA598MF.Exy', 'Wc01LUHcCerdrPyO', NULL, NULL, NULL, NULL, 1542868416, NULL, 1, 'DINAS PENANAMAN MODAL, PELAYANAN TERPADU SATU PINT', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 30, NULL, NULL, NULL, NULL),
(95, 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL', 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnmJyd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$NEM0qS9YsaVAKAkXhTQgfevwrXyNKndk08HZOOvCgd3orIaUXzNcW', 'h80dJ/KkQYQeH9CN', NULL, NULL, NULL, NULL, 1542868423, NULL, 1, 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 31, NULL, NULL, NULL, NULL),
(96, 'BAGIAN EKONOMI', 'BAGIAN EKONOMI', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnmJCd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$2jWtOqgBvOkuX2/OgC9Eo..jiJIrAE9ZvNNDmDIgjgO73Up0blPYS', 'TN0NGU98MIG8wno/', NULL, NULL, NULL, NULL, 1542868432, NULL, 1, 'BAGIAN EKONOMI', '', NULL, '0', 0, 'avatar_default.png', NULL, 32, NULL, NULL, NULL, 11),
(97, 'BAGIAN HUKUM', 'BAGIAN HUKUM', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnmJSd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$HJ.ljNJqV8BIxOkT3VylXO97.FOwzh6DWJ5ldDUR8ZZUX.fClZhf.', 'LCYj.c2Mya1PSnl5', NULL, NULL, NULL, NULL, 1542868440, NULL, 1, 'BAGIAN HUKUM', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 33, NULL, NULL, NULL, NULL),
(98, 'BAGIAN HUMAS DAN PROTOKOL', 'BAGIAN HUMAS DAN PROTOKOL', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnmIid40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$/1AvCTjQiRedBsTzc/aqBuVhIatGD2p13541Emx2CZoDXyP/r186u', 'AUWGK58J0Gjbr6KO', NULL, NULL, NULL, NULL, 1542868447, NULL, 1, 'BAGIAN HUMAS DAN PROTOKOL', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 34, NULL, NULL, NULL, NULL),
(99, 'INSPEKTORAT', 'INSPEKTORAT', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnmIyd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$WlqpnJ6EwAHs.PJ0q9deoOQa88T3pLVyqHoFZnoxPEYKuNEc6Vmay', 'pIYTiZ3kZYZ8h8hf', NULL, NULL, NULL, NULL, 1542868455, NULL, 1, 'INSPEKTORAT', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 35, NULL, NULL, NULL, NULL),
(100, 'SEKRETARIAT KORPRI', 'SEKRETARIAT KORPRI', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnmICd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$Aotlhss7LXzzizLSL4MoPuaX5PkO7NfMb3h4fzYHAJZXcU.0BUjZS', 'swwMvJxq5GGKALBC', NULL, NULL, NULL, NULL, 1542868463, NULL, 1, 'SEKRETARIAT KORPRI', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 36, NULL, NULL, NULL, NULL),
(101, 'DINAS PERPUSTAKAAN DAN KEARSIPAN DAERAH', 'DINAS PERPUSTAKAAN DAN KEARSIPAN DAERAH', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnmISd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$Jy9lXjAxawk6aUrrVtXjQelD9LHDDMCfAfK9ac5Kera2d5FK9hiLS', 'WYp8BxWd5OaKaYDy', NULL, NULL, NULL, NULL, 1542868469, 1551275562, 1, 'DINAS PERPUSTAKAAN DAN KEARSIPAN DAERAH', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 37, NULL, NULL, NULL, NULL),
(102, 'BADAN PENGELOLA KEUANGAN DAERAH', 'BADAN PENGELOLA KEUANGAN DAERAH', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnmLid40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$ZS6h33lajAZAOkY.DO5.TupwYP.TzxylIA6plz1Tts5zd1aJhZ2tm', '74VeV4Lv8XixiIHJ', NULL, NULL, NULL, NULL, 1542868476, NULL, 1, 'BADAN PENGELOLA KEUANGAN DAERAH', '', NULL, '0', 0, 'avatar_default.png', NULL, 38, NULL, NULL, NULL, NULL),
(104, 'DINAS KESEHATAN, PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA', 'DINAS KESEHATAN, PENGENDALIAN PENDUDUK DAN KELUARG', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnhJid40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$R/H2SKoGU.RC1DI5SjDvBOH82iWrv1yhuioerd1LmX39LhCQ2XlF6', '5K3KZUZQS.ym0VPj', NULL, NULL, NULL, NULL, 1542868525, NULL, 1, 'DINAS KESEHATAN, PENGENDALIAN PENDUDUK DAN KELUARG', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 39, NULL, NULL, NULL, NULL),
(105, 'BADAN PENANGGULANGAN BENCANA DAERAH', 'BADAN PENANGGULANGAN BENCANA DAERAH', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnhJyd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$KtxQ9aH0ZcBayXqIuBJfxuc6cBtSmgQJx8R6vk6pdtl2Jy8n..csm', 'SXX0oB7pWW5UoneL', NULL, NULL, NULL, NULL, 1542868531, NULL, 1, 'BADAN PENANGGULANGAN BENCANA DAERAH', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 40, NULL, NULL, NULL, NULL),
(106, 'BAGIAN UMUM', 'BAGIAN UMUM', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnhJCd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$IB9xLxRK8sK4woRk1EU0Y.kZLPcUPoGag40tmp3Qd8kSR4NQvLyTC', 'PVIY9d4vxslZlxfG', NULL, NULL, NULL, NULL, 1542868538, NULL, 1, 'BAGIAN UMUM', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 41, NULL, NULL, NULL, NULL),
(107, 'KECAMATAN MENTARANG', 'KECAMATAN MENTARANG', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnhJSd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$iW5Ns.EpVPu2v5x5oSBi3e1s4rpwaLk1.SzrYGaqzXgl5Qu1Jdlgq', 'eWYHreUlwLuY/UQa', NULL, NULL, NULL, NULL, 1542868549, NULL, 1, 'KECAMATAN MENTARANG', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 42, NULL, NULL, NULL, NULL),
(108, 'KECAMATAN MALINAU UTARA', 'KECAMATAN MALINAU UTARA', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnhIid40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$AWWhTSH7ooH2Iq07QkbJg.Q5SCCrcg/XwkpE7JYG9Gd65YTrWeLkW', 'dOHgt9xCDrpnnsyR', NULL, NULL, NULL, NULL, 1542868556, NULL, 1, 'KECAMATAN MALINAU UTARA', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 43, NULL, NULL, NULL, NULL),
(109, 'KECAMATAN SUNGAI BOH', 'KECAMATAN SUNGAI BOH', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnhIyd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$pfZT3o.nSaQt.9QwtuG8BuivORQ1FSz9zalR9abKgAejACm0B8TgK', 'kTlvINYpqur.6i5u', NULL, NULL, NULL, NULL, 1542868565, NULL, 1, 'KECAMATAN SUNGAI BOH', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 44, NULL, NULL, NULL, NULL),
(110, 'KECAMATAN BAHAU HULU', 'KECAMATAN BAHAU HULU', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnhICd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$IvXDeLYUz.LP5BB.OjmKk.IVoRZ6gD4deykrN0UoMsbPK6InGLk5C', 'sVkZXp038wloNSoU', NULL, NULL, NULL, NULL, 1542868583, NULL, 1, 'KECAMATAN BAHAU HULU', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 45, NULL, NULL, NULL, NULL),
(111, 'KECAMATAN MALINAU BARAT', 'KECAMATAN MALINAU BARAT', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnhISd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$ejeDvgtEHd9qhANiyaQQjuxdeM/iWr8xlbcS.7Yy52gV4OMGb/HTW', 'cSrBKWYww3v2iKFh', NULL, NULL, NULL, NULL, 1542868591, NULL, 1, 'KECAMATAN MALINAU BARAT', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 46, NULL, NULL, NULL, NULL),
(112, 'KECAMATAN MALINAU SELATAN', 'KECAMATAN MALINAU SELATAN', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnhLid40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$B/8SFxgjdcxSuAMyFVcY5.TXW6Fo8He.ebV7UPH2pYzWRQNxo/3xq', 'Kf7Uy0PttuWeiJCt', NULL, NULL, NULL, NULL, 1542868599, NULL, 1, 'KECAMATAN MALINAU SELATAN', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 47, NULL, NULL, NULL, NULL),
(113, 'KECAMATAN MENTARANG HULU', 'KECAMATAN MENTARANG HULU', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnhLyd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$RHAptJ3iHUpA2jZF42mMz.uE.8ESrJjm4U0osA90GreZCSyg//jVK', 'x9o48pPoBaYKvCfy', NULL, NULL, NULL, NULL, 1542868609, NULL, 1, 'KECAMATAN MENTARANG HULU', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 48, NULL, NULL, NULL, NULL),
(114, 'KECAMATAN PUJUNGAN', 'KECAMATAN PUJUNGAN', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPngJid40T/JeVoa3Wkpz4Sj', ' ', '$2y$08$GZ5ZLGrz8hD14lHfI1FCZe8mjNMK62qzYxNDCbkU1b/JLk7JvSebi', 't4J7xSm.XOc3AAPZ', NULL, NULL, NULL, NULL, 1542868617, NULL, 1, 'KECAMATAN PUJUNGAN', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 49, NULL, NULL, NULL, NULL),
(115, 'KECAMATAN KAYAN HILIR', 'KECAMATAN KAYAN HILIR', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPngJyd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$7a5zc37Kx0NWBi2FvfFMheQ8k1tquwmgtpLe8GjLZxBJ5EeF/Krme', 'jIHOJM2UcRmSEklK', NULL, NULL, NULL, NULL, 1542868625, NULL, 1, 'KECAMATAN KAYAN HILIR', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 50, NULL, NULL, NULL, NULL),
(116, 'KECAMATAN KAYAN SELATAN', 'KECAMATAN KAYAN SELATAN', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPngJCd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$yZk0.afzayg9f/p82OfdkOOV8pKXefAoQKKwstppRdLLUBg7ZK2Cm', 'A.rcO02QCognqnL3', NULL, NULL, NULL, NULL, 1542868633, NULL, 1, 'KECAMATAN KAYAN SELATAN', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 51, NULL, NULL, NULL, NULL),
(117, 'KECAMATAN SUNGAI TUBU', 'KECAMATAN SUNGAI TUBU', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPngJSd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$xnnKZRlHPnMFktMj6bS1N.zMVpi.b.9CZLdjKMFxgbJVPy9xZC7na', 'GqQ/ZSi/6l3u.lJP', NULL, NULL, NULL, NULL, 1542868640, NULL, 1, 'KECAMATAN SUNGAI TUBU', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 52, NULL, NULL, NULL, NULL),
(118, 'KECAMATAN MALINAU SELATAN HILIR', 'KECAMATAN MALINAU SELATAN HILIR', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPngIid40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$zfxrHhr9tfi0gULYJkdrIutoMjQ0FwBtiSXA7WzrcJOd6cvadkOs2', 'MnOjvwLzGdWzh8xU', NULL, NULL, NULL, NULL, 1542868647, NULL, 1, 'KECAMATAN MALINAU SELATAN HILIR', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 53, NULL, NULL, NULL, NULL),
(119, 'PERWAKILAN KECAMATAN LONG SULE', 'PERWAKILAN KECAMATAN LONG SULE', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPngIyd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$MBqguuIAnPi4o0QU.bQcruaRKwRNr7Y39P85ZeWGM6uVylz12rQTi', '.vziohki/5YWhznl', NULL, NULL, NULL, NULL, 1542868655, NULL, 1, 'PERWAKILAN KECAMATAN LONG SULE', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 54, NULL, NULL, NULL, NULL),
(120, 'KANTOR PERSIAPAN KECAMATAN MALINAU UTARA TIMUR', 'KANTOR PERSIAPAN KECAMATAN MALINAU UTARA TIMUR', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPngICd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$mnbbvXqcDt5Dd0acGTpZrOmT3r5CvVGIhNCmNTNHwVLdl4Rs4v0zW', 'QHQ4H.vyodnM/WlS', NULL, NULL, NULL, NULL, 1542868663, NULL, 1, 'KANTOR PERSIAPAN KECAMATAN MALINAU UTARA TIMUR', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 55, NULL, NULL, NULL, NULL),
(177, 'BAGIAN KESEJAHTERAAN RAKYAT', 'BAGIAN KESEJAHTERAAN RAKYAT', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnkJSd40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$xkLqzB427A/DorRTNQkvMuRP9pph.RV4M9iXco4gUaRXZcRjKyTym', 'jcBmBV2Nlp0J7tSu', NULL, NULL, NULL, NULL, 1542868183, NULL, 1, 'BAGIAN KESEJAHTERAAN RAKYAT', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 13, NULL, NULL, NULL, NULL),
(178, 'RSUD', 'RSUD', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+lPnkIid40T/JeVoa3Wkpz4Sj', '::1', '$2y$08$yL5qQDoWOVqva0R89cPeLeQStYmnzj7kTvtakYMmGdIWVtLdwOqZa', 'JThT5.B3NQRg7qqF', NULL, NULL, NULL, NULL, 1542868189, NULL, 1, 'RSUD', NULL, NULL, '0', 0, 'avatar_default.png', NULL, 14, NULL, NULL, NULL, NULL),
(179, 'htu', 'htu', 'MTIzNDU2Nzg5MDEyMzQ1NvO/p7wxwKS8eEl23z4=', '::1', '$2y$08$hQYzRWoWHwh2UHQK68LcHuENpf3FG2htzkGGLKnAHEtVqgpjrZpjS', 'XMlDVWwcEeqsu1Kc', NULL, NULL, NULL, NULL, 1549439229, 1549439242, 1, 'HTU', '', NULL, '1', 0, 'avatar_default.png', NULL, NULL, NULL, NULL, NULL, NULL),
(180, 'user', 'user', 'MTIzNDU2Nzg5MDEyMzQ1NvaksZcl1Im0cgp83n3DeFY=', '::1', '$2y$08$0E5bLiUXEQKs6Qygvhd.vuBPebbQ/Kw/7N8LcXxRqgNmSVjiLjWo2', 'EVgXZipBo2gr1mmO', NULL, NULL, NULL, NULL, 1565064724, 1565076816, 1, 'User', '', NULL, '1', 0, 'avatar_default.png', NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 64, 1);

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
-- Table structure for table `fitur`
--

CREATE TABLE `fitur` (
  `id` int(11) NOT NULL,
  `nama_fitur` varchar(100) NOT NULL,
  `ikon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fitur`
--

INSERT INTO `fitur` (`id`, `nama_fitur`, `ikon`) VALUES
(1, 'Free Wifi', 'ri-wifi-line'),
(2, 'Breakfast', 'ri-restaurant-2-line'),
(3, 'Swimming Pool', 'mdi mdi-pool');

-- --------------------------------------------------------

--
-- Table structure for table `fitur_kamar`
--

CREATE TABLE `fitur_kamar` (
  `id` int(11) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `id_fitur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fitur_kamar`
--

INSERT INTO `fitur_kamar` (`id`, `id_tipe_kamar`, `id_fitur`) VALUES
(3, 1, 1),
(4, 1, 2),
(5, 1, 3);

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
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `capacity` int(3) NOT NULL DEFAULT 1,
  `tipe_kasur` varchar(50) NOT NULL DEFAULT 'Single Bed',
  `main_image` varchar(255) DEFAULT NULL,
  `amenities` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id`, `name`, `price`, `capacity`, `tipe_kasur`, `main_image`, `amenities`, `deskripsi`, `is_active`, `created_at`) VALUES
(2, 'Suite Room', '1350000.00', 1, 'Single', 'ROOM_1765597626.jpeg', 'TV,AC,WiFi,Mini Bar,Bath Tub', 'Kamar mewah dengan ruang tamu.', 0, '2025-12-13 03:47:06'),
(3, 'Superior Room', '250000.00', 1, 'Single', 'ROOM_1765597306.jpeg', '', 'Kamar Superior', 0, '2025-12-13 03:41:46'),
(5, 'Standar Room', '165000.00', 2, 'Queen Bed', 'ROOM_1765596588.jpeg', 'Tempat tidur,   AC,  Smart/LED TV,  Wi-Fi cepat  Meja kerja  Air mineral harian  Lemari pakaian', 'Standar Room menawarkan kenyamanan modern dengan desain elegan dan fasilitas lengkap. Dilengkapi tempat tidur premium, AC, Smart TV, Wi-Fi cepat, serta area kerja nyaman. Kamar mandi bersih dengan shower air panas, handuk lembut, dan perlengkapan mandi lengkap.\r\n\r\nPilihan ideal untuk tamu bisnis maupun liburan yang mencari kamar nyaman, bersih, dan terjangkau.', 1, '2025-12-13 07:30:47');

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
-- Indexes for table `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reservasi` (`id_reservasi`),
  ADD KEY `fk_detail_tipe_kamar` (`id_tipe_kamar`);

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
-- Indexes for table `fitur`
--
ALTER TABLE `fitur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fitur_kamar`
--
ALTER TABLE `fitur_kamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipe_kamar` (`id_tipe_kamar`),
  ADD KEY `id_fitur` (`id_fitur`);

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
-- Indexes for table `menus`
--
ALTER TABLE `menus`
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
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
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
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `alus_gd`
--
ALTER TABLE `alus_gd`
  MODIFY `agd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `alus_la`
--
ALTER TABLE `alus_la`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `alus_mg`
--
ALTER TABLE `alus_mg`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `alus_mga`
--
ALTER TABLE `alus_mga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3984;

--
-- AUTO_INCREMENT for table `alus_u`
--
ALTER TABLE `alus_u`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `alus_ug`
--
ALTER TABLE `alus_ug`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
-- AUTO_INCREMENT for table `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `fitur`
--
ALTER TABLE `fitur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fitur_kamar`
--
ALTER TABLE `fitur_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD CONSTRAINT `detail_reservasi_ibfk_1` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_detail_tipe_kamar` FOREIGN KEY (`id_tipe_kamar`) REFERENCES `tipe_kamar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
