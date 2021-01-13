-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 05:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtelur`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbkontrol`
--

CREATE TABLE `tbkontrol` (
  `id` int(2) NOT NULL,
  `lampu1` int(2) NOT NULL,
  `lampu2` int(2) NOT NULL,
  `lampu3` int(2) NOT NULL,
  `lampu4` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbkontrol`
--

INSERT INTO `tbkontrol` (`id`, `lampu1`, `lampu2`, `lampu3`, `lampu4`) VALUES
(1, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbrekap`
--

CREATE TABLE `tbrekap` (
  `id` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `suhu` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbrekap`
--

INSERT INTO `tbrekap` (`id`, `waktu`, `suhu`) VALUES
(1, '2020-05-23 07:24:11', 31),
(2, '2020-05-23 07:24:21', 29),
(3, '2020-05-23 07:24:33', 32),
(43, '2020-06-02 20:52:28', 25),
(44, '2020-06-02 20:58:03', 27),
(45, '2020-06-07 11:43:23', 28),
(46, '2020-06-07 11:54:18', 29),
(47, '2020-06-07 12:01:14', 28),
(48, '2020-06-07 12:04:49', 29),
(49, '2020-06-07 12:11:07', 30),
(50, '2020-06-07 12:16:43', 31),
(51, '2020-06-07 12:20:28', 30),
(52, '2020-06-07 12:26:12', 29),
(53, '2020-06-07 12:31:32', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbtelur`
--

CREATE TABLE `tbtelur` (
  `id` int(2) NOT NULL,
  `waktu_awal` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_menetas` timestamp NULL DEFAULT current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtelur`
--

INSERT INTO `tbtelur` (`id`, `waktu_awal`, `waktu_menetas`, `keterangan`) VALUES
(1, '2020-06-07 12:36:47', '2020-06-07 12:36:50', 'Sudah ada yang menetas');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `created` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id`, `nama`, `email`, `password`, `foto`, `created`) VALUES
(1, 'Telur Pintar', 'telurpintar@gmail.com', '$2y$10$BpNKXjshdAt6.JrWz4TQT.eJDTLHftp8xhQDhZ6rEH77d7sa8X/7a', 'telur.jpg', 1586955454);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbkontrol`
--
ALTER TABLE `tbkontrol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbrekap`
--
ALTER TABLE `tbrekap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbtelur`
--
ALTER TABLE `tbtelur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unik` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbkontrol`
--
ALTER TABLE `tbkontrol`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbrekap`
--
ALTER TABLE `tbrekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbtelur`
--
ALTER TABLE `tbtelur`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
