-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 01:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensirfid`
--

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `ID` int(11) NOT NULL,
  `No_Kartu` varchar(20) NOT NULL,
  `Tanggal` date NOT NULL,
  `Jam_Masuk` time NOT NULL,
  `Jam_Istirahat` time NOT NULL,
  `Jam_Kembali` time NOT NULL,
  `Jam_Pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`ID`, `No_Kartu`, `Tanggal`, `Jam_Masuk`, `Jam_Istirahat`, `Jam_Kembali`, `Jam_Pulang`) VALUES
(6, '8155', '2024-10-01', '19:01:07', '19:01:30', '19:01:41', '19:01:58'),
(7, '4976', '2024-10-01', '19:01:10', '19:01:24', '19:01:46', '19:02:03'),
(8, '8155', '2024-10-02', '15:25:17', '00:00:00', '00:00:00', '00:00:00'),
(9, '8155', '2024-10-04', '15:35:10', '15:38:39', '15:38:59', '00:00:00'),
(10, '4976', '2024-10-04', '15:38:17', '15:38:45', '15:39:03', '00:00:00'),
(11, '8155', '2024-10-06', '15:39:42', '00:00:00', '00:00:00', '00:00:00'),
(12, '4976', '2024-10-06', '15:39:47', '00:00:00', '00:00:00', '00:00:00'),
(13, 'Stress', '2024-10-06', '15:39:59', '00:00:00', '00:00:00', '00:00:00'),
(14, '11114613131', '2024-10-06', '21:55:01', '00:00:00', '00:00:00', '00:00:00'),
(15, '148184132176', '2024-10-06', '21:56:21', '00:00:00', '00:00:00', '00:00:00'),
(16, '22711913414', '2024-10-06', '22:04:30', '00:00:00', '00:00:00', '00:00:00'),
(17, '17931251246', '2024-10-06', '22:04:44', '00:00:00', '00:00:00', '23:30:06'),
(18, '21174231246', '2024-10-06', '22:04:48', '00:00:00', '00:00:00', '00:00:00'),
(19, '115150160250', '2024-10-06', '22:04:52', '00:00:00', '00:00:00', '23:30:33'),
(20, '6728254246', '2024-10-06', '22:04:56', '00:00:00', '00:00:00', '23:30:26'),
(21, '67179151250', '2024-10-06', '22:10:48', '00:00:00', '00:00:00', '23:30:21'),
(22, '115150160250', '2024-10-07', '06:28:20', '00:00:00', '00:00:00', '14:20:44'),
(23, '21174231246', '2024-10-07', '06:28:30', '00:00:00', '00:00:00', '21:09:00'),
(24, '22711913414', '2024-10-07', '08:30:52', '09:45:58', '00:00:00', '00:00:00'),
(25, '67179151250', '2024-10-07', '08:30:59', '09:45:19', '00:00:00', '00:00:00'),
(26, '389101247', '2024-10-07', '08:31:26', '00:00:00', '00:00:00', '20:56:10'),
(27, '148184132176', '2024-10-07', '08:31:39', '09:44:57', '00:00:00', '14:22:33'),
(28, '17931251246', '2024-10-07', '08:33:49', '09:41:45', '00:00:00', '14:20:55'),
(29, '148184132176', '2024-10-08', '12:46:19', '00:00:00', '00:00:00', '13:44:01'),
(30, '67179151250', '2024-10-08', '12:46:25', '00:00:00', '00:00:00', '13:44:18'),
(31, '115150160250', '2024-10-08', '12:47:12', '00:00:00', '00:00:00', '13:43:27'),
(32, '6728254246', '2024-10-08', '12:47:24', '00:00:00', '00:00:00', '00:00:00'),
(33, '17931251246', '2024-10-08', '13:44:51', '00:00:00', '00:00:00', '00:00:00'),
(34, '22711913414', '2024-10-08', '13:45:04', '00:00:00', '00:00:00', '13:45:07'),
(35, '17931251246', '2024-10-09', '11:04:51', '00:00:00', '00:00:00', '00:00:00'),
(36, '21174231246', '2024-10-09', '11:05:00', '00:00:00', '00:00:00', '00:00:00'),
(37, '22711913414', '2024-10-09', '11:08:31', '00:00:00', '00:00:00', '11:08:37'),
(38, '67179151250', '2024-10-09', '11:08:43', '00:00:00', '00:00:00', '14:01:26'),
(39, '115150160250', '2024-10-09', '13:12:20', '00:00:00', '00:00:00', '13:12:32'),
(40, '148184132176', '2024-10-09', '13:27:47', '00:00:00', '00:00:00', '00:00:00'),
(41, '243209151250', '2024-10-09', '14:03:12', '00:00:00', '00:00:00', '14:03:20'),
(42, '115150160250', '2024-10-20', '00:26:55', '00:00:00', '00:00:00', '00:28:36'),
(43, '67179151250', '2024-10-20', '00:27:04', '00:00:00', '00:00:00', '00:29:36'),
(44, '22711913414', '2024-10-20', '00:27:23', '00:00:00', '00:00:00', '00:27:28'),
(45, '67179151250', '2025-01-27', '18:19:32', '00:00:00', '00:00:00', '18:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `ID` int(11) NOT NULL,
  `NIS` int(20) NOT NULL,
  `No_Kartu` varchar(20) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`ID`, `NIS`, `No_Kartu`, `Nama_Lengkap`) VALUES
(5, 15958, '148184132176', 'Nur Ukhta Cahyani'),
(6, 15953, '21174231246', 'Nindie Claudia Vanya'),
(7, 16034, '115150160250', 'Aquene Aurora Panjaitan '),
(8, 15898, '6728254246', 'Jilan Arumi'),
(9, 15939, '22711913414', 'Nadhirra Muslimah'),
(10, 15966, '17931251246', 'Raihan Hudi Susilo'),
(11, 15815, '67179151250', 'Aditya Saputra'),
(12, 15908, '389101247', 'Lista Ariany');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`mode`) VALUES
(4);

-- --------------------------------------------------------

--
-- Table structure for table `testrfid`
--

CREATE TABLE `testrfid` (
  `No_Kartu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Miftah', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`mode`);

--
-- Indexes for table `testrfid`
--
ALTER TABLE `testrfid`
  ADD PRIMARY KEY (`No_Kartu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rekap`
--
ALTER TABLE `rekap`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
