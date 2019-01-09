-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 01:37 PM
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
  `gedung_sewa` int(11) NOT NULL,
  `gedung_kapasitas` int(11) NOT NULL,
  `gedung_parkir` int(11) NOT NULL,
  `gedung_jenis` enum('pendidikan','instansi','ballroom','serbaguna') NOT NULL,
  `gedung_fasilitas` varchar(100) NOT NULL,
  `gedung_deskripsi` text NOT NULL,
  `gedung_header` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`gedung_kode`, `gedung_nama`, `gedung_lat`, `gedung_long`, `gedung_alamat`, `gedung_sewa`, `gedung_kapasitas`, `gedung_parkir`, `gedung_jenis`, `gedung_fasilitas`, `gedung_deskripsi`, `gedung_header`) VALUES
('ALT1', 'Gedung A', 0, 0, '', 0, 0, 0, 'pendidikan', '', '', ''),
('ALT2', 'Gedung B', 0, 0, '', 0, 0, 0, 'pendidikan', '', '', ''),
('ALT3', 'Gedung C', 0, 0, '', 0, 0, 0, 'pendidikan', '', '', ''),
('ALT4', 'Gedung D', 0, 0, '', 0, 0, 0, 'pendidikan', '', '', ''),
('ALT5', 'Gedung E', 0, 0, '', 0, 0, 0, 'pendidikan', '', '', ''),
('ALT6', 'Gedung F', 0, 0, '', 0, 0, 0, 'pendidikan', '', '', ''),
('ALT7', 'Gedung G', 0, 0, '', 0, 0, 0, 'pendidikan', '', '', ''),
('GD1909015270', 'Gedung Azhar', -3.28366, 105.009, 'Pampangan, Kabupaten Ogan Komering Ilir, Sumatera Selatan, Indonesia', 100000000, 754, 830, 'serbaguna', '1, 2, 5, 7, 10', 'asds', '48ebb81655d4ed565ece050898d245f0.jpg'),
('GD1909015944', 'Gedug Alma', -2.97607, 104.775, 'Palembang, Kota Palembang, Sumatera Selatan, Indonesia', 250000, 50, 425, 'serbaguna', '1, 2, 3, 4, 5, 6, 8, 10, 12, 14, 15, 17, 19, 20, 21, 23, 24, 25, 27, 29, 30', ' asdsad', 'book_fair_2010_flyer_copy.jpg'),
('GD1909016627', 'gedug asdsje', -3.16233, 105.065, 'Unnamed Road, Tj. Kemang, Pangkalan Lapam, Kabupaten Ogan Komering Ilir, Sumatera Selatan 30654, Indonesia', 2412456, 343, 356, 'ballroom', '1, 2, 3, 4, 5, 7', 'asda', 'index.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_kode` varchar(5) NOT NULL,
  `kriteria_nama` varchar(50) NOT NULL,
  `kriteria_bobot` float NOT NULL,
  `kriteria_attribute` enum('cost','benefit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(124, 'ALT7', 'C6', 1),
(125, 'GD1909015270', 'C', 4),
(126, 'GD1909015270', 'C', 4),
(127, 'GD1909015270', 'C', 5),
(128, 'GD1909015270', 'C', 1),
(129, 'GD1909015270', 'C', 2),
(130, 'GD1909015270', 'C', NULL),
(131, 'GD1909015944', 'C2', 1),
(132, 'GD1909015944', 'C3', 1),
(133, 'GD1909015944', 'C4', 5),
(134, 'GD1909015944', 'C5', 4),
(135, 'GD1909015944', 'C6', 2),
(136, 'GD1909015944', NULL, NULL),
(137, 'GD1909016627', 'C1', 5),
(138, 'GD1909016627', 'C2', 2),
(139, 'GD1909016627', 'C3', 1),
(140, 'GD1909016627', 'C4', 4),
(141, 'GD1909016627', 'C5', 1),
(142, 'GD1909016627', 'C6', 2),
(143, 'GD1909016627', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `sk_id` int(11) NOT NULL,
  `kriteria_kode` varchar(15) NOT NULL,
  `sk_klasifikasi` varchar(50) NOT NULL,
  `sk_range` varchar(30) NOT NULL,
  `sk_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`sk_id`, `kriteria_kode`, `sk_klasifikasi`, `sk_range`, `sk_nilai`) VALUES
(1, 'C1', 'Murah', '<=20000000', 5),
(2, 'C1', 'Cukup Murah', '>20000000 && <=50000000', 4),
(3, 'C1', 'Mahal', '>50.000.000 && <=100.000.000', 2),
(4, 'C1', 'Sangat Mahal', '>100.000.000', 1),
(5, 'C2', 'Sedikit', '<=300', 1),
(6, 'C2', 'Cukup', '>300 kursi && <=600 kursi', 2),
(7, 'C2', 'Banyak', '>600 && <=1200', 4),
(8, 'C2', 'Sangat Banyak', '>1200', 5),
(9, 'C3', 'Kecil', ' <=500', 1),
(10, 'C3', 'Cukup', '>500 && <=800', 2),
(11, 'C3', 'Luas', '>800 && <=1200', 4),
(12, 'C3', 'Sangat Luas', '>1200', 5),
(13, 'C4', 'Gedung Pendidikan', 'Gedung Pendidikan', 1),
(14, 'C4', 'Gedung Instansi / Pemerintah', 'Gedung Instansi / Pemerintah', 2),
(15, 'C4', 'Ballroom Hotel', 'Ballroom Hotel', 4),
(16, 'C4', 'Gedung Serbaguna', 'Gedung Serbaguna', 5),
(17, 'C5', 'Sedikit', '<=0.4', 1),
(18, 'C5', 'Cukup', '>0.4  && <=0.6', 2),
(19, 'C5', 'Lengkap', '>0.60 &&  <=0.8', 4),
(20, 'C5', 'Sangat Lengkap', '>0.80  && <=1', 5),
(21, 'C6', 'Sangat Jauh', '>10', 1),
(22, 'C6', 'Jauh', '>6 && <=10', 2),
(23, 'C6', 'Cukup', '>2  && <=6', 4),
(24, 'C6', 'Dekat', '? 2', 5);

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
  ADD PRIMARY KEY (`sk_id`),
  ADD KEY `kriteria_kode` (`kriteria_kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto_gedung`
--
ALTER TABLE `foto_gedung`
  MODIFY `fg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `sk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`kriteria_kode`) REFERENCES `kriteria` (`kriteria_kode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
