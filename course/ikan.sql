-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 12:36 PM
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
-- Database: `ikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `ik_cart`
--

CREATE TABLE `ik_cart` (
  `id` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nbarang_cart` varchar(255) NOT NULL,
  `hbarang_cart` int(255) NOT NULL,
  `quantity_cart` int(255) NOT NULL,
  `hbarang_total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ik_cart`
--

INSERT INTO `ik_cart` (`id`, `email`, `nbarang_cart`, `hbarang_cart`, `quantity_cart`, `hbarang_total`) VALUES
(1, '0', 'ikan 1', 20000, 22, 440000);

-- --------------------------------------------------------

--
-- Table structure for table `ik_item`
--

CREATE TABLE `ik_item` (
  `id` int(50) NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `img_item` varchar(255) NOT NULL,
  `harga_item` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ik_item`
--

INSERT INTO `ik_item` (`id`, `nama_item`, `img_item`, `harga_item`) VALUES
(1, 'ikan 1', 'ikan 1.png', 20000),
(2, 'ikan2', 'Array', 30000),
(3, 'ikan 3', 'unknown.png', 28500);

-- --------------------------------------------------------

--
-- Table structure for table `ik_payment_history`
--

CREATE TABLE `ik_payment_history` (
  `id` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total_pembelian` int(50) NOT NULL,
  `jml_bayar` int(50) NOT NULL,
  `metode_bayar` varchar(255) NOT NULL,
  `shipment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ik_payment_history`
--

INSERT INTO `ik_payment_history` (`id`, `email`, `total_pembelian`, `jml_bayar`, `metode_bayar`, `shipment`) VALUES
(1, 'admin@gmail.com', 240000, 300000, 'debit', 'jne'),
(2, 'admin@gmail.com', 240000, 240000, 'debit', 'j&t');

-- --------------------------------------------------------

--
-- Table structure for table `ik_user`
--

CREATE TABLE `ik_user` (
  `id` int(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ik_user`
--

INSERT INTO `ik_user` (`id`, `nama`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '12345'),
(2, 'hesti', 'heti@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ik_cart`
--
ALTER TABLE `ik_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ik_item`
--
ALTER TABLE `ik_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ik_payment_history`
--
ALTER TABLE `ik_payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ik_user`
--
ALTER TABLE `ik_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ik_cart`
--
ALTER TABLE `ik_cart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ik_item`
--
ALTER TABLE `ik_item`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ik_payment_history`
--
ALTER TABLE `ik_payment_history`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ik_user`
--
ALTER TABLE `ik_user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
