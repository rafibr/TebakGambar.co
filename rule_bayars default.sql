-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 08:06 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tebak_gambar`
--

-- --------------------------------------------------------

--
-- Table structure for table `rule_bayars`
--

CREATE TABLE `rule_bayars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_rule` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jlh_bayar` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rule_bayars`
--

INSERT INTO `rule_bayars` (`id`, `kode_rule`, `nama_rule`, `jlh_bayar`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '1nwb', 'Newbie', 0, 'Status Newbie', NULL, '2021-12-10 10:17:06'),
(2, '2ntv', 'Newbie => Verified', 0, 'Status naik tingkat newbie => verified', NULL, '2021-12-10 10:16:59'),
(3, '3vtv_almos', 'Verified < 100%', 0, 'Status verified di bawah 100%', NULL, NULL),
(4, '4vtv_perfe', 'Verified 100%', 0, 'Status verified 100%', NULL, NULL),
(5, '5hth_almos', 'Human < 100%', 0, 'Status human di bawah 100%', NULL, NULL),
(6, '6hth_perfe', 'Human 100%', 0, 'Status human 100%', NULL, NULL),
(7, '7fail', 'Gagal', 0, 'Status gagal validasi', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rule_bayars`
--
ALTER TABLE `rule_bayars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rule_bayars`
--
ALTER TABLE `rule_bayars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
