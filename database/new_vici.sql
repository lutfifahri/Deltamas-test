-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 05:34 AM
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
-- Database: `new_vici`
--

-- --------------------------------------------------------

--
-- Table structure for table `hem`
--

CREATE TABLE `hem` (
  `id` int(11) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `Tipe` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hem`
--

INSERT INTO `hem` (`id`, `harga`, `Tipe`) VALUES
(1, '897500', 'Z'),
(2, '890000', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `Kode` char(120) NOT NULL,
  `Nama` char(120) NOT NULL,
  `Alamat` text NOT NULL,
  `Telp` char(65) NOT NULL,
  `Tanggal` date NOT NULL,
  `Keterangan` text NOT NULL,
  `Tipe` char(1) NOT NULL,
  `User` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poproduksi`
--

CREATE TABLE `poproduksi` (
  `id` int(11) NOT NULL,
  `Kode` char(120) NOT NULL,
  `KodePelanggan` char(120) NOT NULL,
  `NamaSales` char(65) NOT NULL,
  `TanggalTerima` date NOT NULL,
  `TanggalEstimasiPenyelesaian` date NOT NULL,
  `KodeProduk` char(120) NOT NULL,
  `JenisProduksi` char(1) NOT NULL,
  `JenisPelanggan` char(1) NOT NULL,
  `Bahan` char(120) NOT NULL,
  `KadarLokal` decimal(16,2) NOT NULL,
  `Kuantitas` decimal(16,2) NOT NULL,
  `Ukuran` decimal(16,2) NOT NULL,
  `EstimasiBerat` decimal(16,2) NOT NULL,
  `RangeBeratEstimasi` decimal(16,2) NOT NULL,
  `Susut` decimal(16,2) NOT NULL,
  `DatangEmas` decimal(16,2) NOT NULL,
  `KadarDatangEmas` decimal(16,2) NOT NULL,
  `DatangBerlian` decimal(16,2) NOT NULL,
  `BeratDatangBerlian` decimal(16,2) NOT NULL,
  `UpahPasangBerlian` decimal(16,2) NOT NULL,
  `NamaBatuPermata` char(65) NOT NULL,
  `BeratBatuPermata` decimal(16,2) NOT NULL,
  `TipeIkatan` char(1) NOT NULL,
  `Metode` char(1) NOT NULL,
  `TipePelanggan` char(1) NOT NULL,
  `Keterangan` text NOT NULL,
  `Foto` char(120) NOT NULL,
  `KrumWarna` char(65) NOT NULL,
  `KeteranganKrum` text NOT NULL,
  `HargaKrum` decimal(16,2) NOT NULL,
  `Upah` decimal(16,2) NOT NULL,
  `Budget` decimal(16,2) NOT NULL,
  `Panjar` decimal(16,2) NOT NULL,
  `Tipe` char(1) NOT NULL,
  `Tanggal` date NOT NULL,
  `User` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poservice`
--

CREATE TABLE `poservice` (
  `id` int(11) NOT NULL,
  `Kode` char(120) NOT NULL,
  `KodePelanggan` char(120) NOT NULL,
  `NamaSales` char(65) NOT NULL,
  `TanggalTerima` date NOT NULL,
  `TanggalEstimasiPenyelesaian` date NOT NULL,
  `KodeProduk` char(120) NOT NULL,
  `JenisProduksi` char(125) NOT NULL,
  `JenisPelanggan` char(1) NOT NULL,
  `Bahan` char(120) NOT NULL,
  `KadarLokal` decimal(16,2) NOT NULL,
  `Kuantitas` decimal(16,2) NOT NULL,
  `Ukuran` decimal(16,2) NOT NULL,
  `EstimasiBerat` decimal(16,2) NOT NULL,
  `RangeBeratEstimasi` decimal(16,2) NOT NULL,
  `Susut` decimal(16,2) NOT NULL,
  `DatangBerlian` decimal(16,2) NOT NULL,
  `BeratDatangBerlian` decimal(16,2) NOT NULL,
  `UpahPasangBerlian` decimal(16,2) NOT NULL,
  `NamaBatuPermata` char(65) NOT NULL,
  `BeratBatuPermata` decimal(16,2) NOT NULL,
  `TipeIkatan` char(65) NOT NULL,
  `Metode` char(65) NOT NULL,
  `TipePelanggan` char(65) NOT NULL,
  `Keterangan` text NOT NULL,
  `Foto` char(120) NOT NULL,
  `KrumWarna` char(120) NOT NULL,
  `KeteranganKrum` text NOT NULL,
  `HargaKrum` decimal(16,2) NOT NULL,
  `Upah` decimal(16,2) NOT NULL,
  `Budget` decimal(16,2) NOT NULL,
  `Panjar` decimal(16,2) NOT NULL,
  `Tipe` char(1) NOT NULL,
  `Tanggal` date NOT NULL,
  `User` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `potempahan`
--

CREATE TABLE `potempahan` (
  `id` int(11) NOT NULL,
  `Kode` char(120) NOT NULL,
  `KodePelanggan` char(120) NOT NULL,
  `NamaSales` char(65) NOT NULL,
  `TanggalTerima` date NOT NULL,
  `TanggalEstimasiPenyelesaian` date NOT NULL,
  `KodeProduk` char(120) NOT NULL,
  `JenisProduksi` char(1) NOT NULL,
  `JenisPelanggan` char(1) NOT NULL,
  `Bahan` char(120) NOT NULL,
  `KadarLokal` decimal(16,2) NOT NULL,
  `Kuantitas` decimal(16,2) NOT NULL,
  `Ukuran` decimal(16,2) NOT NULL,
  `EstimasiBerat` decimal(16,2) NOT NULL,
  `RangeBeratEstimasi` decimal(16,2) NOT NULL,
  `Susut` decimal(16,2) NOT NULL,
  `DatangEmas` decimal(16,2) NOT NULL,
  `KadarDatangEmas` decimal(16,2) NOT NULL,
  `DatangBerlian` decimal(16,2) NOT NULL,
  `BeratDatangBerlian` decimal(16,2) NOT NULL,
  `UpahPasangBerlian` decimal(16,2) NOT NULL,
  `NamaBatuPermata` char(65) NOT NULL,
  `BeratBatuPermata` decimal(16,2) NOT NULL,
  `TipeIkatan` char(1) NOT NULL,
  `Metode` char(1) NOT NULL,
  `TipePelanggan` char(1) NOT NULL,
  `Keterangan` text NOT NULL,
  `Foto` char(120) NOT NULL,
  `KrumWarna` char(65) NOT NULL,
  `KeteranganKrum` text NOT NULL,
  `HargaKrum` decimal(16,2) NOT NULL,
  `Upah` decimal(16,2) NOT NULL,
  `Budget` decimal(16,2) NOT NULL,
  `Panjar` decimal(16,2) NOT NULL,
  `Tipe` char(1) NOT NULL,
  `Tanggal` date NOT NULL,
  `User` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `Kode` char(60) NOT NULL,
  `Nama` char(60) NOT NULL,
  `Alamat` char(60) NOT NULL,
  `Status` char(60) NOT NULL,
  `Username` char(60) NOT NULL,
  `password` char(50) NOT NULL,
  `Level` char(50) NOT NULL,
  `User` char(50) NOT NULL,
  `Tipe` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `Kode`, `Nama`, `Alamat`, `Status`, `Username`, `password`, `Level`, `User`, `Tipe`) VALUES
(1, 'USR001', 'ADU', 'Jl.Medan', '1', 'ADU', 'cf79ae6addba60ad018347359bd144d2', '1', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hem`
--
ALTER TABLE `hem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poproduksi`
--
ALTER TABLE `poproduksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poservice`
--
ALTER TABLE `poservice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potempahan`
--
ALTER TABLE `potempahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hem`
--
ALTER TABLE `hem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poproduksi`
--
ALTER TABLE `poproduksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poservice`
--
ALTER TABLE `poservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `potempahan`
--
ALTER TABLE `potempahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
