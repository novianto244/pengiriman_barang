-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 22, 2022 at 05:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drc`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_pengiriman`
--

CREATE TABLE `t_pengiriman` (
  `pengiriman_id` int(11) NOT NULL,
  `bbk_id` int(11) DEFAULT NULL,
  `kendaraan_id` varchar(15) DEFAULT NULL,
  `nik` varchar(15) DEFAULT NULL,
  `nama_surat_jalan` varchar(25) DEFAULT NULL,
  `tanggal_surat_jalan` date DEFAULT NULL,
  `project_id` varchar(25) DEFAULT NULL,
  `status_delete` tinyint(4) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pengiriman`
--

INSERT INTO `t_pengiriman` (`pengiriman_id`, `bbk_id`, `kendaraan_id`, `nik`, `nama_surat_jalan`, `tanggal_surat_jalan`, `project_id`, `status_delete`, `created_date`, `created_by`, `updated_date`, `updated_by`, `deleted_date`, `deleted_by`) VALUES
(1, 250858, 'B9891PAB', '90067', 'G503161', '2022-06-15', 'P 122006', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(2, 250862, 'B9585 MS', '200007', 'G503165', '2022-06-15', 'P 121012', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(3, 250863, 'B9585 MS', '200007', 'G503166', '2022-06-15', 'P 121012', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(4, 250870, 'B9894pdb', '211001', 'G503173', '2022-06-15', 'P 122004', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(5, 250871, 'B9894pdb', '211001', 'G503174', '2022-06-15', 'P 121015', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(6, 250872, 'B9894pdb', '211001', 'G503175', '2022-06-14', 'P 122002', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(7, 250873, 'B9894pdb', '211001', 'G503176', '2022-06-14', 'P 122002', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(8, 250907, 'B9585 MS', '200007', 'G503202', '2022-06-15', 'P 119017', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(9, 250913, 'B9585 MS', '200007', 'G503206', '2022-06-15', 'P 119017', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(10, 250915, 'B9894pdb', '211001', 'G503208', '2022-06-15', 'P 122004', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(11, 250921, 'B9891PAB', '90067', 'G503209', '2022-06-15', 'P 120009', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(12, 250922, 'B9891PAB', '90067', 'G503210', '2022-06-15', 'P 120009', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(13, 250962, 'B9568UP', '90067', 'G503248', '2022-06-16', 'P 121002', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(14, 250963, 'B9745UP', '900182', 'G503249', '2022-06-16', 'P 121015', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(15, 250964, 'B9568UP', '90067', 'G503250', '2022-06-16', 'P 120016', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(16, 250967, 'B9745UP', '900182', 'G503253', '2022-06-16', 'P 122006', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(17, 250986, 'B9568UP', '900182', 'G503272', '2022-06-16', 'P 121015', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(18, 250990, 'B9568UP', '90067', 'G503276', '2022-06-16', 'P 121017', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(19, 250991, 'B9647PDA', '110704', 'G503277', '2022-06-15', 'P 121017', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(20, 250992, 'B9647PDA', '110704', 'G503278', '2022-06-15', 'P 121017', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(21, 251000, 'B9568UP', '90067', 'G503286', '2022-06-16', 'P 121017', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(22, 251011, 'B9745UP', '900182', 'G503297', '2022-06-16', 'P 121015', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(23, 251019, 'B9894pdb', '211001', 'G503305', '2022-06-16', 'P 122002', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(24, 251021, 'B9894pdb', '211001', 'G503307', '2022-06-16', 'P 122002', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(25, 251028, 'B9745UP', '900182', 'G503314', '2022-06-16', 'P 121015', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(26, 251097, 'B9894pdb', '211001', 'G503381', '2022-06-16', 'P 122002', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(27, 251107, 'B9894pdb', '211001', 'G503391', '2022-06-16', 'P 122002', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(28, 251108, 'B9894pdb', '211001', 'G503392', '2022-06-16', 'P 122002', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(29, 251110, 'B9894pdb', '211001', 'G503394', '2022-06-17', 'P 121017', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(30, 251111, 'B9894pdb', '211001', 'G503395', '2022-06-17', 'P 121017', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(31, 251112, 'B9894pdb', '211001', 'G503396', '2022-06-17', 'P 121017', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(32, 251115, 'B9894pdb', '211001', 'G503399', '2022-06-17', 'P 121017', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(33, 251116, 'B9894pdb', '211001', 'G503400', '2022-06-17', 'P 121017', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(34, 251118, 'B9894pdb', '211001', 'G503402', '2022-06-17', 'P 121017', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(35, 251121, 'B9894pdb', '211001', 'G503405', '2022-06-17', 'P 121017', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(36, 251122, 'B9891PAB', '90067', 'G503406', '2022-06-17', 'P 122004', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(37, 251126, 'B9891PAB', '90067', 'G503410', '2022-06-17', 'P 122004', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(38, 251128, 'B9891PAB', '90067', 'G503412', '2022-06-17', 'P 122004', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(39, 251129, 'B9891PAB', '90067', 'G503413', '2022-06-17', 'P 122004', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(40, 251134, 'B9891PAB', '90067', 'G503418', '2022-06-17', 'P 122004', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(41, 251135, 'B9745UP', '900182', 'G503419', '2022-06-17', 'P 120016', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(42, 251136, 'B9745UP', '900182', 'G503420', '2022-06-17', 'P 120016', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(43, 251137, 'B9745UP', '900182', 'G503421', '2022-06-17', 'P 120016', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(44, 251141, 'B9745UP', '900182', 'G503425', '2022-06-17', 'P 121012', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(45, 251158, 'B9891PAB', '90067', 'G503442', '2022-06-16', 'P 120009', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(46, 251159, 'B9891PAB', '90067', 'G503443', '2022-06-17', 'P 120009', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(47, 251160, 'B9891PAB', '90067', 'G503444', '2022-06-17', 'P 122006', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(48, 251166, 'B9745UP', '900182', 'G503450', '2022-06-17', 'P 120016', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(49, 251167, 'B9745UP', '900182', 'G503451', '2022-06-17', 'P 120016', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL),
(50, 251177, 'B9891PAB', '90067', 'G503461', '2022-06-17', 'P 122004', 0, '2022-06-22 02:32:54', 'novianto', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_pengiriman_detail`
--

CREATE TABLE `t_pengiriman_detail` (
  `pengiriman_detail_id` int(11) NOT NULL,
  `pengiriman_id` int(11) DEFAULT NULL,
  `status_pengiriman` varchar(50) DEFAULT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL,
  `tanda_tangan_penerima` varchar(200) DEFAULT NULL,
  `tanda_tangan_pengirim` varchar(200) DEFAULT NULL,
  `foto_barang_penerima` varchar(200) DEFAULT NULL,
  `foto_barang2` varchar(200) DEFAULT NULL,
  `foto_surat_jalan` varchar(200) DEFAULT NULL,
  `gps` text DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `status_delete` tinyint(4) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pengiriman_detail`
--

INSERT INTO `t_pengiriman_detail` (`pengiriman_detail_id`, `pengiriman_id`, `status_pengiriman`, `nama_penerima`, `tanda_tangan_penerima`, `tanda_tangan_pengirim`, `foto_barang_penerima`, `foto_barang2`, `foto_surat_jalan`, `gps`, `note`, `status_delete`, `created_date`, `created_by`) VALUES
(1, 50, 'PENGIRIMAN BARU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-06-22 02:35:41', 'novianto_it'),
(2, 49, 'PENGIRIMAN BARU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-06-20 02:37:10', 'novianto_it'),
(3, 48, 'PENGIRIMAN BARU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-06-22 02:38:27', 'novianto_it'),
(4, 47, 'PENGIRIMAN BARU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-06-22 02:40:01', 'novianto_it'),
(5, 46, 'PENGIRIMAN BARU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-06-22 02:42:55', 'novianto_it'),
(6, 50, 'BERANGKAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-06-22 02:45:20', 'novianto_it'),
(7, 48, 'BERANGKAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-06-22 02:46:10', 'novianto_it'),
(8, 47, 'BERANGKAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-06-22 02:47:30', 'novianto_it'),
(9, 50, 'TERKIRIM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-06-22 02:52:49', 'novianto_it'),
(10, 48, 'TERKIRIM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-06-22 02:54:00', 'novianto_it'),
(11, 46, 'BATAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-06-22 02:54:54', 'novianto_it');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_pengiriman`
--
ALTER TABLE `t_pengiriman`
  ADD PRIMARY KEY (`pengiriman_id`);

--
-- Indexes for table `t_pengiriman_detail`
--
ALTER TABLE `t_pengiriman_detail`
  ADD PRIMARY KEY (`pengiriman_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_pengiriman`
--
ALTER TABLE `t_pengiriman`
  MODIFY `pengiriman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `t_pengiriman_detail`
--
ALTER TABLE `t_pengiriman_detail`
  MODIFY `pengiriman_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
