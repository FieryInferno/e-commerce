-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 03:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `diskon`, `image`, `deskripsi`, `kategori_id`, `created_at`) VALUES
('1', 'Threat Black', 299000, 10, 'product-7.jpg', '<p>[OFFICIAL STORE VEARST]\r\n</p><p>MODEL SIZE LARGE</p>\r\n<p>Pemesanan sebelum jam 15.00 akan dikirimkan di hari yang sama dan \r\npemesanan diatas jam 15.00 akan dikirimkan di hari berikutnya, \r\npengiriman dilakukan di hari kerja.<br>\r\nUntuk size chart / detail ukuran bisa di cek pada foto produk halaman terakhir!</p>\r\n<p>Deskripsi produk :<br>\r\nLongsleeve Basic Tees<br>\r\n– 100% Cotton 24’S<br>\r\n– Screen printed graphic on front &amp; back</p>', 4, '2022-05-21 12:09:26'),
('4', 'Bird Crewneck Misty', 369000, 0, 'product-62.jpg', '', 2, '2022-05-21 01:58:18'),
('6288463b65dfe', 'Arnold Olive', 379000, 6, 'product-61.jpg', '', 3, '2022-05-21 01:54:03'),
('62886b9a534ad', 'Brick Black', 119400, 0, 'product-63.jpg', '', 1, '2022-05-21 04:33:30'),
('62886d8f1a2e1', 'Desk White', 119400, 0, 'product-64.jpg', '', 1, '2022-05-21 04:41:51'),
('62886dbb14781', 'Dread White', 119400, 0, 'product-65.jpg', '', 1, '2022-05-21 04:42:35'),
('62888c59850410', 'a', 1, 1, 'product-66.jpg', '', 1, '2022-05-21 06:53:13'),
('62888c5985047', 'a', 1, 1, 'product-66.jpg', '', 1, '2022-05-21 06:53:13'),
('62888c5985048', 'a', 1, 1, 'product-66.jpg', '', 1, '2022-05-21 06:53:13'),
('62888c5985049', 'a', 1, 1, 'product-66.jpg', '', 1, '2022-05-21 06:53:13'),
('6288cdf35c9af', 'Luke Crewneck Olive', 389000, 13, 'product-67.jpg', '<div class=\"accordion-inner\" style=\"display: block;\">\n<p>Model size L</p>\n[OFFICIAL STORE VEARST] Pemesanan sebelum jam 15.00 akan dikirimkan di \nhari yang sama dan pemesanan diatas jam 15.00 akan dikirimkan di hari \nberikutnya, pengiriman dilakukan di hari kerja. Untuk size chart / \ndetail ukuran bisa di cek pada foto produk halaman terakhir!\n<p>Deskripsi produk :</p>\n<ul><li>Cotton Fleece</li><li>Screen printed graphic on front</li><li>Ribbed cuffs and hem</li><li>Utility pocket on front &amp; zip closure</li><li>Snap button</li></ul>\n</div><p></p>', 2, '2022-05-21 11:33:22');

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
(6, '62886dbb14781', 'xs'),
(7, '62886dbb14781', 's'),
(8, '62886dbb14781', 'm'),
(9, '62886dbb14781', 'l'),
(10, '62886dbb14781', 'xl'),
(12, '4', 'l'),
(13, '4', 'xl'),
(14, '62888c5985047', 'xs'),
(15, '6288cdf35c9af', 'xs'),
(16, '6288cdf35c9af', 'm'),
(17, '1', 'm');

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
(1, '6288463b65dfe', 'hitam'),
(2, '6288463b65dfe', 'abu'),
(3, '6288463b65dfe', 'hijau'),
(12, '62886b9a534ad', 'hitam'),
(13, '62886d8f1a2e1', 'hijau'),
(17, '4', 'hitam'),
(18, '4', 'biru'),
(19, '62888c5985047', 'merah'),
(20, '6288cdf35c9af', 'putih'),
(21, '1', 'orange'),
(22, '1', 'tosca');

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
  MODIFY `id_ukuran_produk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warna_produk`
--
ALTER TABLE `warna_produk`
  MODIFY `id_warna_produk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
