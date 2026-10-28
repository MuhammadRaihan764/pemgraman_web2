-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 28, 2026 at 12:52 PM
-- Server version: 8.0.42
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calon_mhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_mhs`
--

CREATE TABLE `calon_mhs` (
  `id` int UNSIGNED NOT NULL,
  `kode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ortu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matematika` decimal(5,2) NOT NULL,
  `inggris` decimal(5,2) NOT NULL,
  `umum` decimal(5,2) NOT NULL,
  `rata_rata` decimal(5,2) NOT NULL,
  `keterangan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calon_mhs`
--

INSERT INTO `calon_mhs` (`id`, `kode`, `nama`, `jenis_kelamin`, `ttl`, `asal_sekolah`, `pekerjaan_ortu`, `matematika`, `inggris`, `umum`, `rata_rata`, `keterangan`, `created_at`) VALUES
(1, 'A5', 'Muhammad Raihan', 'Laki-Laki', 'Tangerang, 2005-06-23', 'SMK BISTEK', 'Warung Sembako', '77.00', '79.00', '75.00', '77.00', 'Lulus', '2026-10-28 12:36:41'),
(2, 'A4', 'Cacacay', 'Perempuan', 'Batam, 2010-09-27', 'SMKN 1 BATAM', 'Penjual Ikan Bandeng', '86.00', '80.00', '89.00', '85.00', 'Lulus', '2026-10-28 12:44:49'),
(5, 'A6', 'Amesha Alridwan', 'Laki-Laki', 'Tangerang, 2005-05-22', 'SMK Fadilah', 'Penjual Ikan Teri', '77.00', '67.00', '71.00', '71.67', 'Lulus', '2026-10-28 12:48:39'),
(6, 'A7', 'Rapi Afrian', 'Laki-Laki', 'Tangerang, 2005-09-17', 'SMK 3 CISAUK', 'Penjual Bakso Wagyu', '50.00', '23.00', '34.00', '35.67', 'Tidak Lulus', '2026-10-28 12:51:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_mhs`
--
ALTER TABLE `calon_mhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_mhs`
--
ALTER TABLE `calon_mhs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
