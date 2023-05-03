-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 10:27 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deltamas`
--

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `KodeVendor` char(120) NOT NULL,
  `Tanggal` date NOT NULL,
  `Tipe` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `KodeVendor`, `Tanggal`, `Tipe`) VALUES
(1, 'vnd002', '2023-05-02', 'Z'),
(2, 'vnd003', '2023-05-03', 'Z'),
(3, 'vnd004', '2023-05-03', 'Z'),
(4, 'vnd005', '2023-05-03', 'Z'),
(5, 'vnd002', '2023-05-02', 'Z'),
(6, 'vnd003', '2023-05-03', 'Z'),
(7, 'vnd003', '2023-05-03', 'Z'),
(8, 'vnd004', '2023-05-03', 'Z'),
(9, 'vnd005', '2023-05-03', 'Z');

-- --------------------------------------------------------

--
-- Table structure for table `ps`
--

CREATE TABLE `ps` (
  `id` int(11) NOT NULL,
  `Kode` char(120) NOT NULL,
  `KodeVendor` char(120) NOT NULL,
  `Tanggal` date NOT NULL,
  `Status` char(1) NOT NULL,
  `Tipe` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ps`
--

INSERT INTO `ps` (`id`, `Kode`, `KodeVendor`, `Tanggal`, `Status`, `Tipe`) VALUES
(1, 'ps001', 'vnd002', '2023-05-02', 'B', ''),
(2, 'ps001', 'vnd003', '2023-05-03', 'B', ''),
(3, 'ps001', 'vnd004', '2023-05-03', 'B', ''),
(4, 'ps001', 'vnd005', '2023-05-03', 'B', 'Z'),
(5, 'ps002', 'vnd003', '2023-05-03', 'B', ''),
(6, 'ps002', 'vnd004', '2023-05-03', 'B', ''),
(7, 'ps002', 'vnd005', '2023-05-03', 'B', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `Kode` char(120) NOT NULL,
  `Nama` char(120) NOT NULL,
  `Barang` char(120) NOT NULL,
  `Harga` decimal(16,2) NOT NULL,
  `Jumlah` decimal(16,2) NOT NULL,
  `Keterangan` text NOT NULL,
  `Tanggal` date NOT NULL,
  `Status` char(1) NOT NULL,
  `Tipe` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `Kode`, `Nama`, `Barang`, `Harga`, `Jumlah`, `Keterangan`, `Tanggal`, `Status`, `Tipe`) VALUES
(1, 'vnd001', 'asda', 'dasd', '25345.00', '345345.00', '4', '2023-05-02', '', 'Z'),
(2, 'vnd001', 'Test', 'barang001', '120000.00', '2432.00', 'Oke', '2023-02-05', '', ''),
(3, 'vnd002', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-02-05', 'V', ''),
(4, 'vnd003', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-05-02', 'V', ''),
(5, 'vnd004', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-05-02', 'V', ''),
(6, 'vnd005', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-05-02', 'V', ''),
(7, 'vnd006', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-05-02', '', ''),
(8, 'vnd007', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-05-02', '', ''),
(9, 'vnd008', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-05-02', '', ''),
(10, 'vnd009', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-05-02', '', ''),
(11, 'vnd010', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-05-02', '', ''),
(12, 'vnd011', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-05-01', '', ''),
(13, 'vnd012', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-05-01', '', ''),
(14, 'vnd013', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-05-01', '', ''),
(15, 'vnd014', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-04-20', '', ''),
(16, 'vnd015', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-04-20', '', ''),
(17, 'vnd016', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-04-20', '', ''),
(18, 'vnd017', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-03-05', '', ''),
(19, 'vnd018', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-03-05', '', ''),
(20, 'vnd019', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-03-05', '', ''),
(21, 'vnd020', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-03-05', '', ''),
(22, 'vnd021', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-03-05', '', ''),
(23, 'vnd022', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-03-05', '', ''),
(24, 'vnd023', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-03-05', '', ''),
(25, 'vnd024', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-02-20', '', ''),
(26, 'vnd025', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-02-20', '', ''),
(27, 'vnd026', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-02-20', '', ''),
(28, 'vnd027', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-02-20', '', ''),
(29, 'vnd028', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-02-20', '', ''),
(30, 'vnd029', 'Test', 'barang0a', '12.00', '1222.00', 'Oke', '2023-02-20', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps`
--
ALTER TABLE `ps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ps`
--
ALTER TABLE `ps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
