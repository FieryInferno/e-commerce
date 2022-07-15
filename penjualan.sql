-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 01:26 PM
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
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `id_developer` bigint(20) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`id_developer`, `username`, `password`) VALUES
(1, 'developer', '$2y$10$WDf.kwbV4iFfIAJ161Vx9eDu//CrScxuZNz6CiEsx7/u8nxka/irm');

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
(53, '62ac8fd8370a5', '211.PNG'),
(64, '62bdac7448102', '12.PNG'),
(65, '62bdac7448102', '28.PNG'),
(66, '62bdac7448102', '32.PNG'),
(67, '62bdac7448102', '42.PNG'),
(68, '62bdac7448102', '52.PNG');

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
  `user_id` bigint(20) DEFAULT NULL,
  `warna` varchar(191) DEFAULT NULL,
  `ukuran` enum('xs','s','m','l','xl') DEFAULT NULL,
  `kuantitas` int(191) NOT NULL,
  `pemesanan_id` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `produk_id`, `user_id`, `warna`, `ukuran`, `kuantitas`, `pemesanan_id`) VALUES
(20, '62ac498d4c620', 2, '', 'm', 1, '62ce7db469488'),
(21, '62ac498d4c620', NULL, NULL, NULL, 1, '62cedce3a2d5c');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(191) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `metode_pengiriman` varchar(191) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `harga` int(191) NOT NULL,
  `status` enum('pending','sudah_dibayar','konfirmasi','dikirim','selesai') NOT NULL,
  `bukti_pembayaran` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `user_id`, `detail`, `metode_pengiriman`, `alamat`, `harga`, `status`, `bukti_pembayaran`) VALUES
('62ce7db469488', 2, '', 'JNE', 'Subang', 199000, 'selesai', '13.PNG'),
('62cedce3a2d5c', NULL, NULL, NULL, NULL, 199000, 'selesai', NULL);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `diskon`, `deskripsi`, `kategori_id`, `created_at`) VALUES
('62ac498d4c620', 'Brick Black', 199000, 3, '                                  [OFFICIAL STORE VEARST]\r\n<p>MODEL SIZE LARGE</p>\r\n<p>Pemesanan sebelum jam 15.00 akan dikirimkan di hari yang sama dan \r\npemesanan diatas jam 15.00 akan dikirimkan di hari berikutnya, \r\npengiriman dilakukan di hari kerja.<br>\r\nUntuk size chart / detail ukuran bisa di cek pada foto produk halaman terakhir!</p>\r\n<p>Deskripsi produk :<br>\r\nLongsleeve Basic Tees<br>\r\n– 100% Cotton 24’S<br>\r\n– Screen printed graphic on front &amp; back</p>', 1, '2022-06-17 09:29:49'),
('62ac8fd8370a5', 'Mick White', 199000, 0, '                                  [OFFICIAL STORE VEARST]\r\n<p>MODEL SIZE LARGE</p>\r\n<p>Pemesanan sebelum jam 15.00 akan dikirimkan di hari yang sama dan \r\npemesanan diatas jam 15.00 akan dikirimkan di hari berikutnya, \r\npengiriman dilakukan di hari kerja.<br>\r\nUntuk size chart / detail ukuran bisa di cek pada foto produk halaman terakhir!</p>\r\n<p>Deskripsi produk :<br>\r\nLongsleeve Basic Tees<br>\r\n– 100% Cotton 24’S<br>\r\n– Screen printed graphic on front &amp; back</p>', 1, '2022-06-17 14:29:44'),
('62bdac7448102', 'a', 199000, 1, '                                    1                                ', 1, '2022-06-30 14:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` bigint(20) NOT NULL,
  `produk_id` varchar(191) NOT NULL,
  `tipe` enum('barang_masuk','barang_keluar') NOT NULL,
  `jumlah` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `produk_id`, `tipe`, `jumlah`) VALUES
(1, '62ac498d4c620', 'barang_masuk', 10),
(2, '62ac498d4c620', 'barang_masuk', 1),
(3, '62ac498d4c620', 'barang_keluar', 1),
(4, '62ac8fd8370a5', 'barang_keluar', 1);

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
(88, '62ac8fd8370a5', 's'),
(99, '62bdac7448102', 'xs'),
(100, '62bdac7448102', 's'),
(101, '62bdac7448102', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`) VALUES
(1, 'M. Bagas Setia', 'bagassetia271@gmail.com', 'bagassetia', '$2y$10$SqlCiatMj/y9mmC0rwyR0ue66dH7l0S/Ztw3g/sIMHDIDJo7JpVDy'),
(2, 'devi', 'devi@gmail.com', 'devi', '$2y$10$W9WPzVVyuEN/9m9MYLvyxuL0/GMRdGhsLLd6tp7tSz1iuh/.9WUpm');

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
(49, '62ac8fd8370a5', 'white'),
(54, '62bdac7448102', 'hitam');

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
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`id_developer`);

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
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

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
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `id_developer` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  MODIFY `id_ukuran_produk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warna_produk`
--
ALTER TABLE `warna_produk`
  MODIFY `id_warna_produk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
