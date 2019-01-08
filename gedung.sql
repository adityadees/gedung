-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 04:26 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gedung`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto_gedung`
--

CREATE TABLE `foto_gedung` (
  `fg_id` int(11) NOT NULL,
  `gedung_kode` varchar(20) NOT NULL,
  `fg_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `gedung_kode` varchar(20) NOT NULL,
  `gedung_nama` varchar(50) NOT NULL,
  `gedung_lat` float NOT NULL,
  `gedung_long` float NOT NULL,
  `gedung_alamat` text NOT NULL,
  `gedung_deskripsi` text NOT NULL,
  `gedung_header` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`gedung_kode`, `gedung_nama`, `gedung_lat`, `gedung_long`, `gedung_alamat`, `gedung_deskripsi`, `gedung_header`) VALUES
('ALT1', 'Gedung A', 0, 0, '', '', ''),
('ALT2', 'Gedung B', 0, 0, '', '', ''),
('ALT3', 'Gedung C', 0, 0, '', '', ''),
('ALT4', 'Gedung D', 0, 0, '', '', ''),
('ALT5', 'Gedung E', 0, 0, '', '', ''),
('ALT6', 'Gedung F', 0, 0, '', '', ''),
('ALT7', 'Gedung G', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gedung_detail`
--

CREATE TABLE `gedung_detail` (
  `gd_id` int(11) NOT NULL,
  `gedung_kode` varchar(15) NOT NULL,
  `kriteria_kode` varchar(15) NOT NULL,
  `gd_val` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_kode` varchar(5) NOT NULL,
  `kriteria_nama` varchar(100) DEFAULT NULL,
  `kriteria_bobot` float DEFAULT NULL,
  `kriteria_attribute` enum('cost','benefit') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_kode`, `kriteria_nama`, `kriteria_bobot`, `kriteria_attribute`) VALUES
('C1', 'Harga', 2, 'benefit'),
('C2', 'Kapasitas Gedung', 4, 'benefit'),
('C3', 'Luas Area Parkir', 1, 'benefit'),
('C4', 'Jenis Gedung', 1, 'benefit'),
('C5', 'Fasilitas Gedung', 1, 'benefit'),
('C6', 'Jarak Lokasi Gedung', 1, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` int(11) NOT NULL,
  `gedung_kode` varchar(20) DEFAULT NULL,
  `kriteria_kode` varchar(5) DEFAULT NULL,
  `nilai_nilai` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `gedung_kode`, `kriteria_kode`, `nilai_nilai`) VALUES
(83, 'ALT1', 'C1', 5),
(84, 'ALT1', 'C2', 1),
(85, 'ALT1', 'C3', 5),
(86, 'ALT1', 'C4', 2),
(87, 'ALT1', 'C5', 1),
(88, 'ALT1', 'C6', 5),
(89, 'ALT2', 'C1', 2),
(90, 'ALT2', 'C2', 4),
(91, 'ALT2', 'C3', 2),
(92, 'ALT2', 'C4', 5),
(93, 'ALT2', 'C5', 4),
(94, 'ALT2', 'C6', 4),
(95, 'ALT3', 'C1', 1),
(96, 'ALT3', 'C2', 4),
(97, 'ALT3', 'C3', 2),
(98, 'ALT3', 'C4', 5),
(99, 'ALT3', 'C5', 2),
(100, 'ALT3', 'C6', 4),
(101, 'ALT4', 'C1', 2),
(102, 'ALT4', 'C2', 4),
(103, 'ALT4', 'C3', 4),
(104, 'ALT4', 'C4', 5),
(105, 'ALT4', 'C5', 4),
(106, 'ALT4', 'C6', 2),
(107, 'ALT5', 'C1', 5),
(108, 'ALT5', 'C2', 4),
(109, 'ALT5', 'C3', 4),
(110, 'ALT5', 'C4', 1),
(111, 'ALT5', 'C5', 2),
(112, 'ALT5', 'C6', 4),
(113, 'ALT6', 'C1', 4),
(114, 'ALT6', 'C2', 4),
(115, 'ALT6', 'C3', 2),
(116, 'ALT6', 'C4', 5),
(117, 'ALT6', 'C5', 2),
(118, 'ALT6', 'C6', 4),
(119, 'ALT7', 'C1', 4),
(120, 'ALT7', 'C2', 2),
(121, 'ALT7', 'C3', 2),
(122, 'ALT7', 'C4', 5),
(123, 'ALT7', 'C5', 2),
(124, 'ALT7', 'C6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `sk_id` int(11) NOT NULL,
  `kriteria_kode` varchar(15) NOT NULL,
  `sk_klasifikasi` int(11) NOT NULL,
  `sk_range` varchar(30) NOT NULL,
  `sk_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(25) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_tel` char(12) NOT NULL,
  `user_alamat` text NOT NULL,
  `user_jk` enum('L','P') NOT NULL,
  `user_role` enum('pemilik','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_email`, `user_tel`, `user_alamat`, `user_jk`, `user_role`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin', 'admin@aaa.com33', '082222333', 'jl.aaa44411', 'L', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto_gedung`
--
ALTER TABLE `foto_gedung`
  ADD PRIMARY KEY (`fg_id`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`gedung_kode`);

--
-- Indexes for table `gedung_detail`
--
ALTER TABLE `gedung_detail`
  ADD PRIMARY KEY (`gd_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_kode`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`sk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto_gedung`
--
ALTER TABLE `foto_gedung`
  MODIFY `fg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gedung_detail`
--
ALTER TABLE `gedung_detail`
  MODIFY `gd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `sk_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
