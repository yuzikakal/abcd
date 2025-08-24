-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 07:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `etmin`
--

CREATE TABLE `etmin` (
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etmin`
--

INSERT INTO `etmin` (`password`) VALUES
('admin123');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `ID` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal` varchar(150) NOT NULL,
  `tempat` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `jk` varchar(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor` varchar(150) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nisn` int(50) NOT NULL,
  `bid_study` varchar(150) NOT NULL,
  `tgl_daftar` date NOT NULL DEFAULT current_timestamp(),
  `setatus` varchar(50) NOT NULL,
  `pembaharuan` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`ID`, `nama`, `asal`, `tempat`, `tanggal`, `jk`, `alamat`, `nomor`, `agama`, `email`, `nisn`, `bid_study`, `tgl_daftar`, `setatus`, `pembaharuan`) VALUES
(1, 'vincn', 'smk14', 'brayan', '2024-12-04', 'Laki Laki', 'kolong jembatan', '085234567890', 'Budha', 'vincent@gmail.com', 1111, 'TITL', '2024-12-24', 'ditolak', '2024-12-24 06:08:49'),
(2, 'ff', 'mk', 'g', '2024-12-03', 'Laki Laki', '34', '09876543', 'Kristen', 'a@gmail.com', 12312, 'RPL', '2024-12-24', 'diterima', '2024-12-24 06:08:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etmin`
--
ALTER TABLE `etmin`
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`,`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
