-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 07:15 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `Nama` char(200) NOT NULL,
  `Alamat` text NOT NULL,
  `Username` char(200) NOT NULL,
  `Password` char(200) NOT NULL,
  `Level` char(1) NOT NULL,
  `Tipe` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `Nama`, `Alamat`, `Username`, `Password`, `Level`, `Tipe`) VALUES
(2, 'HRD', 'JL.Medan', 'HRD', '827ccb0eea8a706c4c34a16891f84e7b', '1', ''),
(3, 'Manager', 'Jl.Medan', 'MANAGER', '827ccb0eea8a706c4c34a16891f84e7b', '2', '');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ps`
--
ALTER TABLE `ps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
