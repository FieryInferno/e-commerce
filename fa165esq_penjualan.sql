-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2022 at 09:52 AM
-- Server version: 5.7.38
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fa165esq_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint(11) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$7lEIrIT.Wui91v.rDO7TiOVs6kESSitOnWEmvYLCizNsOtBfNd8e6');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) NOT NULL,
  `nama_kategori` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'T-SHIRTS'),
(2, 'SWEATSHIRTS'),
(3, 'JACKETS'),
(4, 'SHORT PANTS');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` bigint(20) NOT NULL,
  `produk_id` varchar(191) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `warna` varchar(191) NOT NULL,
  `ukuran` enum('xs','s','m','l','xl') NOT NULL,
  `kuantitas` int(191) NOT NULL,
  `id_order` varchar(191) DEFAULT NULL,
  `status` enum('pending','success') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `produk_id`, `user_id`, `warna`, `ukuran`, `kuantitas`, `id_order`, `status`) VALUES
(3, '1', 1, 'tosca', 'm', 2, NULL, NULL),
(7, '1', 2, 'orange', 'm', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(191) NOT NULL,
  `nama_produk` varchar(191) NOT NULL,
  `harga` int(191) NOT NULL,
  `diskon` int(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `diskon`, `image`, `deskripsi`, `kategori_id`, `created_at`) VALUES
('1', 'BLEED', 189000, 0, 'WhatsApp_Image_2022-06-09_at_22_07_01.jpeg', '                  <p>[OFFICIAL STORE VEARST]\r\n</p><p>MODEL SIZE LARGE</p>\r\n<p>Pemesanan sebelum jam 15.00 akan dikirimkan di hari yang sama dan \r\npemesanan diatas jam 15.00 akan dikirimkan di hari berikutnya, \r\npengiriman dilakukan di hari kerja.<br>\r\nUntuk size chart / detail ukuran bisa di cek pada foto produk halaman terakhir!</p>\r\n<p>Deskripsi produk :<br>\r\nLongsleeve Basic Tees<br>\r\n– 100% Cotton 20’S<br>\r\n– Screen printed graphic on front &amp; back</p>                ', 1, '2022-06-09 15:12:09'),
('4', 'HOMIGHT', 398000, 0, 'WhatsApp_Image_2022-06-09_at_22_07_01_(1).jpeg', '                                  ', 3, '2022-06-09 15:13:36'),
('6288463b65dfe', 'ZETY WHITE', 189000, 0, 'WhatsApp_Image_2022-06-09_at_22_07_01_(2).jpeg', '                                  ', 1, '2022-06-09 15:14:52'),
('62886b9a534ad', 'DENAO', 189000, 0, 'WhatsApp_Image_2022-06-09_at_22_07_01_(3).jpeg', '                                  ', 1, '2022-06-09 15:15:52'),
('62886d8f1a2e1', 'INEER DEMON', 189000, 0, 'WhatsApp_Image_2022-06-09_at_22_07_01_(4).jpeg', '                                  ', 1, '2022-06-09 15:16:50'),
('62886dbb14781', 'ZETY BLACK', 189000, 0, 'WhatsApp_Image_2022-06-09_at_22_07_01_(5).jpeg', '                                  ', 1, '2022-06-09 15:17:42'),
('62888c59850410', 'PSYCHO', 189000, 0, 'WhatsApp_Image_2022-06-09_at_22_07_01_(6).jpeg', '                                  ', 1, '2022-06-09 15:18:31'),
('62888c5985047', 'LEGA BLACK', 189000, 0, 'WhatsApp_Image_2022-06-09_at_22_07_01_(7).jpeg', '                                  ', 1, '2022-06-09 15:19:14'),
('62888c5985048', '600D', 189000, 0, 'WhatsApp_Image_2022-06-09_at_22_07_01_(8).jpeg', '                                                                    ', 3, '2022-06-09 15:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_produk`
--

CREATE TABLE `ukuran_produk` (
  `id_ukuran_produk` bigint(20) NOT NULL,
  `produk_id` varchar(191) NOT NULL,
  `ukuran` enum('xs','s','m','l','xl') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran_produk`
--

INSERT INTO `ukuran_produk` (`id_ukuran_produk`, `produk_id`, `ukuran`) VALUES
(18, '1', 's'),
(19, '1', 'm'),
(20, '1', 'l'),
(21, '1', 'xl'),
(22, '4', 's'),
(23, '4', 'm'),
(24, '4', 'l'),
(25, '4', 'xl'),
(26, '6288463b65dfe', 's'),
(27, '6288463b65dfe', 'm'),
(28, '6288463b65dfe', 'l'),
(29, '6288463b65dfe', 'xl'),
(30, '62886b9a534ad', 'm'),
(31, '62886b9a534ad', 'l'),
(32, '62886b9a534ad', 'xl'),
(33, '62886d8f1a2e1', 's'),
(34, '62886d8f1a2e1', 'm'),
(35, '62886d8f1a2e1', 'l'),
(36, '62886d8f1a2e1', 'xl'),
(37, '62886dbb14781', 's'),
(38, '62886dbb14781', 'm'),
(39, '62886dbb14781', 'l'),
(40, '62886dbb14781', 'xl'),
(41, '62888c59850410', 's'),
(42, '62888c59850410', 'm'),
(43, '62888c59850410', 'l'),
(44, '62888c59850410', 'xl'),
(45, '62888c5985047', 's'),
(46, '62888c5985047', 'm'),
(47, '62888c5985047', 'l'),
(48, '62888c5985047', 'xl'),
(53, '62888c5985048', 's'),
(54, '62888c5985048', 'm'),
(55, '62888c5985048', 'l'),
(56, '62888c5985048', 'xl');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `alamat`) VALUES
(1, 'M. Bagas Setia', 'bagassetia271@gmail.com', 'bagassetia', '$2y$10$SqlCiatMj/y9mmC0rwyR0ue66dH7l0S/Ztw3g/sIMHDIDJo7JpVDy', ''),
(2, 'devi', 'devi@gmail.com', 'devi', '$2y$10$W9WPzVVyuEN/9m9MYLvyxuL0/GMRdGhsLLd6tp7tSz1iuh/.9WUpm', '');

-- --------------------------------------------------------

--
-- Table structure for table `warna_produk`
--

CREATE TABLE `warna_produk` (
  `id_warna_produk` bigint(20) NOT NULL,
  `produk_id` varchar(191) NOT NULL,
  `warna` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warna_produk`
--

INSERT INTO `warna_produk` (`id_warna_produk`, `produk_id`, `warna`) VALUES
(23, '1', 'white'),
(24, '4', 'black'),
(25, '6288463b65dfe', 'white '),
(26, '62886b9a534ad', 'hitam'),
(27, '62886d8f1a2e1', 'white'),
(28, '62886dbb14781', 'black'),
(29, '62888c5985047', 'white'),
(31, '62888c5985048', 'black');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  ADD PRIMARY KEY (`id_ukuran_produk`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `warna_produk`
--
ALTER TABLE `warna_produk`
  ADD PRIMARY KEY (`id_warna_produk`),
  ADD KEY `produk_id` (`produk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  MODIFY `id_ukuran_produk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warna_produk`
--
ALTER TABLE `warna_produk`
  MODIFY `id_warna_produk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  ADD CONSTRAINT `ukuran_produk_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warna_produk`
--
ALTER TABLE `warna_produk`
  ADD CONSTRAINT `warna_produk_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
