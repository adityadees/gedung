-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2019 at 05:51 PM
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
(1, 'GD1912012062', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_6402.jpg'),
(2, 'GD1912012062', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_6402.jpg'),
(3, 'GD1912012062', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_640_-_Copy_(4)14.jpg'),
(4, 'GD1912012062', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_640_-_Copy_(5)10.jpg'),
(5, 'GD1912012062', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_640_-_Copy3.jpg'),
(6, 'GD191501451', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_640_-_Copy_(5)11.jpg'),
(7, 'GD191501451', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_640_-_Copy4.jpg'),
(8, 'GD191501451', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_6403.jpg'),
(9, 'ALT3', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_6404.jpg'),
(10, 'ALT3', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_640_-_Copy_(2)10.jpg'),
(11, 'ALT3', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_640_-_Copy_(3)18.jpg'),
(12, 'ALT3', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_640_-_Copy_(4)15.jpg'),
(13, 'ALT6', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_640_-_Copy_(3)19.jpg'),
(14, 'ALT7', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_6405.jpg'),
(15, 'GD1915019573', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_640_-_Copy_(2)11.jpg'),
(16, 'GD1915019573', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_6407.jpg'),
(17, 'GD1910017496', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_640_-_Copy_(2)12.jpg'),
(18, 'GD1910017496', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_640_-_Copy_(3)21.jpg'),
(19, 'GD1910017496', '0_04184b9a-7de0-46d0-9912-d0283c915547_640_640_-_Copy_(4)16.jpg');

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
  `gedung_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`gedung_kode`, `user_id`, `gedung_nama`, `gedung_lat`, `gedung_long`, `gedung_alamat`, `gedung_sewa`, `gedung_kapasitas`, `gedung_parkir`, `gedung_jenis`, `gedung_fasilitas`, `gedung_deskripsi`) VALUES
('ALT3', 2, 'Graha bungo Jeumpa', -1.64013, 101.889, 'Kabupaten Bungo, Jambi, Indonesia', 36000000, 1000, 8000, 'serbaguna', '2, 6, 8, 10, 11, 14, 15, 19, 20, 24, 25, 29, 30, 31', 'asdsad'),
('ALT6', 2, 'Tiara puspa paket Exsclusive ', -2.91111, 104.619, 'JL Talang Meranjat, No. 3, Amaraya, Pipa Jaya, Kemuning, Kota Palembang, Sumatera Selatan, Indonesia', 115000000, 1000, 1000, 'serbaguna', '1, 2, 3, 4, 5, 6, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 24, 25, 26, 30, 31', 'adssad1'),
('ALT7', 2, 'Graha 66 Paket Paket 2', -2.91111, 104.619, 'Jl. Supersemar, Kota Palembang, Sumatera Selatan, Indonesia', 90000000, 850, 800, 'serbaguna', '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 19, 20, 21, 22, 24, 25, 29, 30, 31', '111'),
('GD1910016687', 2, 'Grand Atyasa Paket Diamond', -2.91111, 104.619, 'Jl. Kapten Anwar Arsyad No.22, Siring Agung, Ilir Bar. I, Kota Palembang, Sumatera Selatan 30151, Indonesia', 165000000, 1000, 1000, 'serbaguna', '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 19, 20, 21, 22, 24, 25, 29, 30, 31', 'asdsad'),
('GD1910017496', 2, 'Grand Atyasa Lux Diamond', -2.97607, 104.775, 'Jl. Kapten Anwar Arsyad No.22, Siring Agung, Ilir Bar. I, Kota Palembang, Sumatera Selatan 30151, Indonesia', 228000000, 1000111, 10001, 'serbaguna', '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 19, 20, 21, 22, 24, 25, 29, 30, 31', ''),
('GD1911011212', 2, 'Grand Atyasa Paket Blue Diamond ', -2.96884, 104.726, 'Jl. Kapten Anwar Arsyad No.22, Siring Agung, Ilir Bar. I, Kota Palembang, Sumatera Selatan 30151, Indonesia', 195000000, 1000, 1000, 'serbaguna', '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 19, 20, 21, 29, 30, 31', 'Hubungi lebih lanjut'),
('GD1912012062', 2, 'gedung tanah', -2.89457, 104.617, 'Unnamed Road, Air Batu, Talang Klp., Kabupaten Banyu Asin, Sumatera Selatan 30961, Indonesia', 10000000, 1000, 1000, 'serbaguna', '1, 2, 4, 9, 10, 11, 16, 18, 20, 22, 27', 'asdfghj'),
('GD191501451', 2, 'Gedung Reks', -2.91111, 104.619, 'Palembang, Kota Palembang, Sumatera Selatan, Indonesia', 252222, 252, 253, 'ballroom', '1, 2, 4, 5', 'asdasdad'),
('GD1915019573', 2, 'gedung xxxa', -2.97607, 104.775, 'Palembang, Palembang City, South Sumatra, Indonesia', 123213, 2323, 2323, 'ballroom', '1, 2, 4, 5', 'asdsadasd');

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
('C1', 'Harga', 5, 'benefit'),
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
(95, 'ALT3', 'C1', 4),
(96, 'ALT3', 'C2', 4),
(97, 'ALT3', 'C3', 5),
(98, 'ALT3', 'C4', 5),
(99, 'ALT3', 'C5', 2),
(100, 'ALT3', 'C6', 1),
(113, 'ALT6', 'C6', 1),
(114, 'ALT6', 'C5', 4),
(115, 'ALT6', 'C4', 5),
(116, 'ALT6', 'C3', 4),
(117, 'ALT6', 'C2', 4),
(118, 'ALT6', 'C1', 1),
(119, 'ALT7', 'C1', 2),
(120, 'ALT7', 'C2', 4),
(121, 'ALT7', 'C3', 2),
(122, 'ALT7', 'C4', 5),
(123, 'ALT7', 'C5', 4),
(124, 'ALT7', 'C6', 1),
(151, 'GD1910016687', 'C1', 1),
(152, 'GD1910016687', 'C2', 4),
(153, 'GD1910016687', 'C3', 4),
(154, 'GD1910016687', 'C4', 5),
(155, 'GD1910016687', 'C5', 4),
(156, 'GD1910016687', 'C6', 1),
(157, 'GD1910017496', 'C6', 5),
(158, 'GD1910017496', 'C5', 4),
(159, 'GD1910017496', 'C4', 5),
(160, 'GD1910017496', 'C3', 5),
(161, 'GD1910017496', 'C2', 5),
(162, 'GD1910017496', 'C1', 1),
(175, 'GD1911011212', 'C1', 3),
(176, 'GD1911011212', 'C2', 4),
(177, 'GD1911011212', 'C3', 1),
(178, 'GD1911011212', 'C4', 2),
(179, 'GD1911011212', 'C5', 3),
(180, 'GD1911011212', 'C6', 4),
(181, 'GD1912012062', 'C1', 5),
(182, 'GD1912012062', 'C2', 4),
(183, 'GD1912012062', 'C3', 4),
(184, 'GD1912012062', 'C4', 5),
(185, 'GD1912012062', 'C5', 1),
(186, 'GD1912012062', 'C6', 1),
(187, 'GD191501451', 'C1', 5),
(188, 'GD191501451', 'C2', 1),
(189, 'GD191501451', 'C3', 1),
(190, 'GD191501451', 'C4', 4),
(191, 'GD191501451', 'C5', 1),
(192, 'GD191501451', 'C6', 1),
(193, 'GD1915019573', 'C1', 5),
(194, 'GD1915019573', 'C2', 5),
(195, 'GD1915019573', 'C3', 5),
(196, 'GD1915019573', 'C4', 4),
(197, 'GD1915019573', 'C5', 1),
(198, 'GD1915019573', 'C6', 5);

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
(1, 'C1', 'murah', 'Kurang dari 20.000.000', 5),
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
(2, 'adityads', '202cb962ac59075b964b07152d234b70', 'ADELYA DAMAYANTI', 'adelya@gmail.com', '082281070165', 'jl. kapten anwar sastro', 'P', 'pemilik', 'hqdefault2.jpg'),
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
  MODIFY `fg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

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
