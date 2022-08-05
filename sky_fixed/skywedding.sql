-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 02:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skywedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `id_history` int(15) NOT NULL,
  `pemesan` varchar(50) NOT NULL,
  `pasangan` varchar(50) NOT NULL,
  `id_lokasi` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`id_history`, `pemesan`, `pasangan`, `id_lokasi`) VALUES
(1, 'Sky66702', 'Sky66701', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_online`
--

CREATE TABLE `tb_online` (
  `dating_code` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_online`
--

INSERT INTO `tb_online` (`dating_code`, `nama`) VALUES
('Sky66701', 'bewok'),
('Sky66702', 'pacar bewok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_place`
--

CREATE TABLE `tb_place` (
  `id_lokasi` int(15) NOT NULL,
  `id_kota` int(5) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `harga` int(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_place`
--

INSERT INTO `tb_place` (`id_lokasi`, `id_kota`, `nama_lokasi`, `alamat`, `harga`, `gambar`) VALUES
(1, 1, 'jakarta 01', 'alamat jakarta 01', 15000, 'jakarta1.jpg'),
(2, 1, 'jakarta 02', 'alamat jakarta 02', 20000, 'jakarta2.jpg'),
(3, 1, 'jakarta 03', 'alamat jakarta 03', 25000, 'jakarta3.jpg'),
(4, 2, 'singapore 01', 'alamat singapore 01', 30000, 'singapore1.jpg'),
(5, 2, 'singapore 02', 'alamat singapore 02', 35000, 'singapore2.jpg'),
(6, 2, 'singapore 03', 'alamat singapore 03', 40000, 'singapore3.jpg'),
(7, 3, 'tangerang 01', 'alamat tangerang 01', 45000, 'tangerang1.jpg'),
(8, 3, 'tangerang 02', 'alamat tangerang 02', 50000, 'tangerang2.png'),
(9, 3, 'tangerang 03', 'alamat tangerang 03', 55000, 'tangerang3.jpg'),
(10, 2, 'singapore 04', 'alamat singapore 04', 500000, '1638838441135.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_request`
--

CREATE TABLE `tb_request` (
  `request_id` int(11) NOT NULL,
  `sender_id` varchar(11) NOT NULL,
  `sender_name` varchar(50) NOT NULL,
  `receiver_id` varchar(11) DEFAULT NULL,
  `receiver_name` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_request`
--

INSERT INTO `tb_request` (`request_id`, `sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `status`) VALUES
(26, 'Sky66701', 'bewok', 'Sky78702', 'kiki', 'true'),
(27, 'Sky78702', 'kiki', 'Sky66701', 'bewok', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_session`
--

CREATE TABLE `tb_session` (
  `session_id` int(11) NOT NULL,
  `ply1` varchar(50) NOT NULL,
  `ply2` varchar(50) NOT NULL,
  `box1` int(11) NOT NULL,
  `box2` int(11) NOT NULL,
  `box3` int(11) NOT NULL,
  `box4` int(11) NOT NULL,
  `box5` int(11) NOT NULL,
  `box6` int(11) NOT NULL,
  `box7` int(11) NOT NULL,
  `box8` int(11) NOT NULL,
  `box9` int(11) NOT NULL,
  `ply1scr` int(11) NOT NULL,
  `ply2scr` int(11) NOT NULL,
  `turn` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_session`
--

INSERT INTO `tb_session` (`session_id`, `ply1`, `ply2`, `box1`, `box2`, `box3`, `box4`, `box5`, `box6`, `box7`, `box8`, `box9`, `ply1scr`, `ply2scr`, `turn`, `count`) VALUES
(19, 'Sky78702', 'Sky66701', 0, 1, 0, 2, 2, 2, 1, 1, 0, 0, 0, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `dating_code` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` int(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`dating_code`, `nama_lengkap`, `tanggal_lahir`, `gender`, `email`, `phone`, `photo`, `password`, `status`) VALUES
('Sky00102', 'feriza', '2002-08-08', 'Wanita', 'user2@gmail.com', 2147483647, 'Array', 123, 'active'),
('Sky12301', 'feriz', '2012-05-05', 'Pria', 'user@gmail.com', 2147483647, 'Array', 123, 'active'),
('Sky66701', 'bewok', '2022-07-07', 'Pria', 'bewok@gmail.com', 2147483647, 'Array', 123, 'active'),
('Sky66702', 'pacar bewok', '2001-05-04', 'Wanita', 'pbewok@gmail.com', 2147483647, 'Array', 123, 'active'),
('Sky78702', 'kiki', '2022-06-29', 'Wanita', 'kiki@gmail.com', 2147483647, 'Array', 123, 'active'),
('Sky88702', 'pacar gorbon', '2000-01-02', 'Wanita', 'pgorbon@gmail.com', 2147483647, 'telur1.jpg', 123, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `tb_online`
--
ALTER TABLE `tb_online`
  ADD PRIMARY KEY (`dating_code`);

--
-- Indexes for table `tb_place`
--
ALTER TABLE `tb_place`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_request`
--
ALTER TABLE `tb_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tb_session`
--
ALTER TABLE `tb_session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`dating_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `id_history` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_place`
--
ALTER TABLE `tb_place`
  MODIFY `id_lokasi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_request`
--
ALTER TABLE `tb_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_session`
--
ALTER TABLE `tb_session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
