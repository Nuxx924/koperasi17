-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 06:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `idakun` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`idakun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(2, 'aimek', 'aca', 'rafi@gmail.com', '$2y$10$SldCxEOPoVs1DEjg66abp.H/gcpx4.6HOHDlnLp2BkcVbuHuUxGVy', '3'),
(3, 'nurmn', 'nurmn', 'nurmn@gmail.com', '$2y$10$WmDcRYdR6Illn8Q06XlB4eBTDeEbv0FOooGdlC4dM23Qy44ZSzgv.', '1'),
(4, 'sania cantik love fahri ganteng imut manja', 'saya', 'epep88@gmail.com', '$2y$10$uTeStNU.17oyugEzG6hqBe34QfhCzWqFNgRvCMaO8AMyO5zFcZhb.', '2');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` int(11) NOT NULL,
  `namalengkap` varchar(200) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tanggallahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `namalengkap`, `jk`, `alamat`, `tanggallahir`) VALUES
(1, 'farel', 'Perempuan', 'tomang kok kebanjiran mulu njirrr', '2024-08-22'),
(2, 'farel ngentod', 'Perempuan', 'jalan karmila 6 Blok F9 No 2B, jatiwaringin, Pondok Gede,Kota bekasi', '2024-08-21'),
(3, 'Toko Mudah Membangun Bersama', 'Perempuan', 'jalan karmila 6 Blok F9 No 2B, jatiwaringin, Pondok Gede,Kota bekasi', '2024-08-21'),
(5, 'nurman', 'laki laki', 'rawa bellong', '2024-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` text NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idakun`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpegawai`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `idakun` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idpegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
