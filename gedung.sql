-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2019 at 01:46 AM
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

--
-- Dumping data for table `foto_gedung`
--

INSERT INTO `foto_gedung` (`fg_id`, `gedung_kode`, `fg_foto`) VALUES
(1, 'ALT1', 'book_fair_2010_flyer_copy4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `gedung_kode` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
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

INSERT INTO `gedung` (`gedung_kode`, `user_id`, `gedung_nama`, `gedung_lat`, `gedung_long`, `gedung_alamat`, `gedung_sewa`, `gedung_kapasitas`, `gedung_parkir`, `gedung_jenis`, `gedung_fasilitas`, `gedung_deskripsi`, `gedung_header`) VALUES
('ALT1', 4, 'Gedung Ab', -2.74613, 104.927, 'Palembang, Kota Palembang, Sumatera Selatan, Indonesia', 232, 232, 232, 'pendidikan', '4, 14, 24', 'asda\r\n\r\n', 'hqdefault3.jpg'),
('ALT3', 2, 'Gedung Ceeee', -2.96996, 104.754, 'Lorong Belimbing I No.80, Sekip Jaya, Kemuning, Kota Palembang, Sumatera Selatan 30114, Indonesia', 0, 0, 0, 'pendidikan', '', 'asdsda', 'book_fair_2010_flyer_copy2.jpg'),
('ALT6', 2, 'Gedung F', -2.99863, 104.746, '', 0, 0, 0, 'pendidikan', '', '', ''),
('ALT7', 2, 'Gedung G', -3.00309, 104.731, '', 0, 0, 0, 'pendidikan', '', '', ''),
('GD1910011053', 4, 'asdasd', -3.05993, 104.166, 'Unnamed Road, Muaraabab, Rantau Bayur, Kabupaten Banyu Asin, Sumatera Selatan 30968, Indonesia', 1233321, 21, 231, 'ballroom', '1, 2, 4, 5', '', 'index1.jpg'),
('GD1910016003', 4, 'Gedungccc', -2.97607, 104.775, 'Palembang, Kota Palembang, Sumatera Selatan, Indonesia', 10000, 200, 300, 'serbaguna', '1, 2, 3, 5, 6, 7, 9, 10, 11, 14, 15, 16', 'asdas', 'book_fair_2010_flyer_copy3.jpg'),
('GD1910016182', 2, 'Gedung Azhar', -3.17233, 105.048, 'Unnamed Road, Pampangan, Kabupaten Ogan Komering Ilir, Sumatera Selatan 30654, Indonesia', 100000000, 754, 830, 'ballroom', '1, 2, 4, 5, 6, 8, 10, 12, 13, 14, 16, 17, 19, 20, 23, 24, 26, 27', 'asdasd', 'hqdefault.jpg'),
('GD1910016687', 2, 'Gedung Rez', -2.93875, 103.926, 'Bailangu, Sekayu, Kabupaten Musi Banyuasin, Sumatera Selatan, Indonesia', 100000, 200, 400, 'pendidikan', '2, 4, 6, 7, 9, 10, 11, 12, 13, 14, 15, 17, 19', 'asdsad', '48ebb81655d4ed565ece050898d245f01.jpg'),
('GD1910017496', 2, 'G1SKaaa', -2.74613, 104.927, 'Upang, Makarti Jaya, Banyu Asin Regency, South Sumatra, Indonesia', 400000, 24, 53, 'ballroom', '4, 12, 17, 22, 29', 'asdsd', 'promo_buku_parcelbuku.gif'),
('GD1911011212', 2, 'gedunga asdksadk', -3.05981, 105.688, 'Simpang Tiga Sakti, Tulung Selapan, Ogan Komering Ilir Regency, South Sumatra, Indonesia', 23242, 2432, 34, 'pendidikan', '2, 3, 4, 6', 'asd', '48ebb81655d4ed565ece050898d245f03.jpg');

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
('C1', 'Hargaaa', 5, 'benefit'),
('C2', 'Kapasitas Gedung', 1, 'benefit'),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `gedung_kode`, `kriteria_kode`, `nilai_nilai`) VALUES
(83, 'ALT1', 'C6', 2),
(84, 'ALT1', 'C6', 2),
(85, 'ALT1', 'C6', 2),
(86, 'ALT1', 'C6', 2),
(87, 'ALT1', 'C6', 2),
(88, 'ALT1', 'C6', 2),
(95, 'ALT3', 'C6', 2),
(96, 'ALT3', 'C6', 2),
(97, 'ALT3', 'C6', 2),
(98, 'ALT3', 'C6', 2),
(99, 'ALT3', 'C6', 2),
(100, 'ALT3', 'C6', 2),
(113, 'ALT6', 'C1', 4),
(114, 'ALT6', 'C2', 4),
(115, 'ALT6', 'C3', 4),
(116, 'ALT6', 'C4', 4),
(117, 'ALT6', 'C5', 4),
(118, 'ALT6', 'C6', 4),
(119, 'ALT7', 'C1', 4),
(120, 'ALT7', 'C2', 4),
(121, 'ALT7', 'C3', 4),
(122, 'ALT7', 'C4', 4),
(123, 'ALT7', 'C5', 4),
(124, 'ALT7', 'C6', 4),
(144, 'GD1910016182', 'C1', 1),
(145, 'GD1910016182', 'C2', 1),
(146, 'GD1910016182', 'C3', 1),
(147, 'GD1910016182', 'C4', 1),
(148, 'GD1910016182', 'C5', 1),
(149, 'GD1910016182', 'C6', 1),
(151, 'GD1910016687', 'C2', 1),
(152, 'GD1910016687', 'C3', 1),
(153, 'GD1910016687', 'C4', 1),
(154, 'GD1910016687', 'C5', 1),
(155, 'GD1910016687', 'C6', 1),
(156, 'GD1910016687', 'C1', 1),
(157, 'GD1910017496', 'C5', 1),
(158, 'GD1910017496', 'C4', 4),
(159, 'GD1910017496', 'C3', 1),
(160, 'GD1910017496', 'C2', 1),
(161, 'GD1910017496', 'C1', 5),
(162, 'GD1910017496', 'C6', 2),
(163, 'GD1910016003', 'C1', 5),
(164, 'GD1910016003', 'C2', 1),
(165, 'GD1910016003', 'C3', 1),
(166, 'GD1910016003', 'C4', 5),
(167, 'GD1910016003', 'C5', 1),
(168, 'GD1910016003', 'C6', 2),
(169, 'GD1910011053', 'C1', 5),
(170, 'GD1910011053', 'C2', 1),
(171, 'GD1910011053', 'C3', 1),
(172, 'GD1910011053', 'C4', 4),
(173, 'GD1910011053', 'C5', 1),
(174, 'GD1910011053', 'C6', 2),
(175, 'GD1911011212', 'C1', 5),
(176, 'GD1911011212', 'C2', 5),
(177, 'GD1911011212', 'C3', 1),
(178, 'GD1911011212', 'C4', 1),
(179, 'GD1911011212', 'C5', 1),
(180, 'GD1911011212', 'C6', 2);

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
  `user_role` enum('pemilik','admin') NOT NULL,
  `user_foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_email`, `user_tel`, `user_alamat`, `user_jk`, `user_role`, `user_foto`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin', 'admin@aaa.com33', '082222333', 'jl.aaa44411', 'L', 'admin', ''),
(2, 'adityads', '202cb962ac59075b964b07152d234b70', 'Aditya Dharmawan Saputra', 'adityads@ymail.com', '082371373347', 'asd', 'L', 'pemilik', 'hqdefault2.jpg'),
(4, 'rudi', '202cb962ac59075b964b07152d234b70', 'Rudi hartono', 'asdsa@aaa.com', '21323', 'asdasd', 'P', 'pemilik', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto_gedung`
--
ALTER TABLE `foto_gedung`
  ADD PRIMARY KEY (`fg_id`),
  ADD KEY `gedung_kode` (`gedung_kode`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`gedung_kode`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_kode`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`),
  ADD KEY `gedung_kode` (`gedung_kode`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`sk_id`),
  ADD KEY `kriteria_kode` (`kriteria_kode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto_gedung`
--
ALTER TABLE `foto_gedung`
  MODIFY `fg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `sk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_gedung`
--
ALTER TABLE `foto_gedung`
  ADD CONSTRAINT `foto_gedung_ibfk_1` FOREIGN KEY (`gedung_kode`) REFERENCES `gedung` (`gedung_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gedung`
--
ALTER TABLE `gedung`
  ADD CONSTRAINT `gedung_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`gedung_kode`) REFERENCES `gedung` (`gedung_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`kriteria_kode`) REFERENCES `kriteria` (`kriteria_kode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
