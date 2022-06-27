-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2022 at 11:55 PM
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
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` bigint(20) NOT NULL,
  `produk_id` varchar(191) NOT NULL,
  `gambar` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `produk_id`, `gambar`) VALUES
(41, '62ac498d4c620', '1.jpg'),
(42, '62ac498d4c620', '21.PNG'),
(43, '62ac498d4c620', '22.PNG'),
(44, '62ac498d4c620', '23.PNG'),
(45, '62ac498d4c620', '24.PNG'),
(46, '62ac498d4c620', '25.PNG'),
(51, '62ac498d4c620', '26.PNG'),
(52, '62ac8fd8370a5', '11.jpg'),
(53, '62ac8fd8370a5', '211.PNG');

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
  `pemesanan_id` varchar(191) DEFAULT NULL,
  `status` enum('pending','settlement','deny','expire','cancel') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `produk_id`, `user_id`, `warna`, `ukuran`, `kuantitas`, `pemesanan_id`, `status`) VALUES
(16, '62ac498d4c620', 2, 'hitam', 's', 1, '62b9e09e4ef19', 'settlement');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(191) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `user_id`, `detail`) VALUES
('62b9e09e4ef19', 2, '{\"status_code\":\"201\",\"status_message\":\"Success, transaction is found\",\"transaction_id\":\"74231443-34f3-4cae-86b7-be16107dd66a\",\"order_id\":\"62b9e09e4ef19\",\"gross_amount\":\"199000.00\",\"payment_type\":\"bank_transfer\",\"transaction_time\":\"2022-06-27 23:53:54\",\"transaction_status\":\"pending\",\"va_numbers\":[{\"bank\":\"bri\",\"va_number\":\"088781317584362825\"}],\"fraud_status\":\"accept\",\"pdf_url\":\"https://app.sandbox.midtrans.com/snap/v1/transactions/6f929a37-a97b-4ae9-9a07-566a145786ac/pdf\",\"finish_redirect_url\":\"http://example.com?order_id=62b9e09e4ef19&status_code=201&transaction_status=pending\"}');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(191) NOT NULL,
  `nama_produk` varchar(191) NOT NULL,
  `harga` int(191) NOT NULL,
  `diskon` int(191) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `diskon`, `deskripsi`, `kategori_id`, `created_at`) VALUES
('62ac498d4c620', 'Brick Black', 199000, 3, '                                  [OFFICIAL STORE VEARST]\r\n<p>MODEL SIZE LARGE</p>\r\n<p>Pemesanan sebelum jam 15.00 akan dikirimkan di hari yang sama dan \r\npemesanan diatas jam 15.00 akan dikirimkan di hari berikutnya, \r\npengiriman dilakukan di hari kerja.<br>\r\nUntuk size chart / detail ukuran bisa di cek pada foto produk halaman terakhir!</p>\r\n<p>Deskripsi produk :<br>\r\nLongsleeve Basic Tees<br>\r\n– 100% Cotton 24’S<br>\r\n– Screen printed graphic on front &amp; back</p>', 1, '2022-06-17 09:29:49'),
('62ac8fd8370a5', 'Mick White', 199000, 0, '                                  [OFFICIAL STORE VEARST]\r\n<p>MODEL SIZE LARGE</p>\r\n<p>Pemesanan sebelum jam 15.00 akan dikirimkan di hari yang sama dan \r\npemesanan diatas jam 15.00 akan dikirimkan di hari berikutnya, \r\npengiriman dilakukan di hari kerja.<br>\r\nUntuk size chart / detail ukuran bisa di cek pada foto produk halaman terakhir!</p>\r\n<p>Deskripsi produk :<br>\r\nLongsleeve Basic Tees<br>\r\n– 100% Cotton 24’S<br>\r\n– Screen printed graphic on front &amp; back</p>', 1, '2022-06-17 14:29:44');

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
(86, '62ac498d4c620', 's'),
(87, '62ac498d4c620', 'm'),
(88, '62ac8fd8370a5', 's');

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
(48, '62ac498d4c620', 'hitam'),
(49, '62ac8fd8370a5', 'white');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `produk_id` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `gambar_ibfk_1` (`produk_id`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pemesanan_id` (`pemesanan_id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
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
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_produk` (`produk_id`),
  ADD KEY `id_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  MODIFY `id_ukuran_produk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warna_produk`
--
ALTER TABLE `warna_produk`
  MODIFY `id_warna_produk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_3` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
