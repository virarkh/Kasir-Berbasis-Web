-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 08:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_cuci_motor`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengeluaran`
--

CREATE TABLE `detail_pengeluaran` (
  `id` int(11) NOT NULL,
  `id_pengeluaran` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pengeluaran`
--

INSERT INTO `detail_pengeluaran` (`id`, `id_pengeluaran`, `item`, `harga`) VALUES
(12, 52, 'Bimbim', 12000),
(13, 52, 'Halo', 12345),
(14, 53, 'kjh', 545);

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id` int(11) NOT NULL,
  `nama_diskon` varchar(45) NOT NULL,
  `potongan_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id`, `nama_diskon`, `potongan_harga`) VALUES
(23, 'Tidak Ada', 0),
(24, 'Ramadhan', 500),
(25, 'Eid', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `id` int(11) NOT NULL,
  `nama_kendaraan` varchar(45) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id`, `nama_kendaraan`, `tarif`) VALUES
(9, 'Matic', 10000),
(10, 'Bebek', 10000),
(11, 'Kopling', 15000),
(12, 'Sport', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `metode_mencuci`
--

CREATE TABLE `metode_mencuci` (
  `id` int(11) NOT NULL,
  `nama_metode` varchar(45) NOT NULL,
  `tarif_tambahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode_mencuci`
--

INSERT INTO `metode_mencuci` (`id`, `nama_metode`, `tarif_tambahan`) VALUES
(8, 'Biasa', 500),
(9, 'Steam', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `kode` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `biaya` int(11) NOT NULL,
  `foto` text NOT NULL,
  `detail` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_suppliers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `kode`, `tanggal`, `biaya`, `foto`, `detail`, `user_id`, `id_suppliers`) VALUES
(1, '12345', '2021-04-30', 4562, 'qw', 'sds', 11, 2),
(52, '789', '2021-04-30', 56, 'clock1.png', '', 3, 1),
(53, '56', '2021-05-01', 56, 'color-wheel1.png', '', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`) VALUES
(1, 'Pegawai'),
(2, 'Pemilik');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `nama_suppliers` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama_suppliers`) VALUES
(1, 'PT. Maju Mundur'),
(2, 'PT. Compas');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `invoice` varchar(15) NOT NULL,
  `nama_customer` varchar(45) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `metode_id` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `diskon_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `invoice`, `nama_customer`, `jenis_id`, `metode_id`, `sub_total`, `diskon_id`, `total`, `tanggal`, `user_id`) VALUES
(80, 'CS2103240001', 'Tama', 9, 8, 10500, 24, 10000, '2021-03-24 13:05:14', 10),
(81, 'CS2103240002', 'Cici', 12, 9, 27000, 23, 27000, '2021-03-24 13:15:51', 10),
(82, 'CS2103240003', 'Jeje', 11, 8, 15500, 25, 13500, '2021-03-24 14:03:56', 10),
(83, 'CS2103240004', 'Mima', 11, 8, 15500, 24, 15000, '2021-03-24 15:39:01', 3),
(84, 'CS2104080001', 'tama', 11, 8, 15500, 25, 13500, '2021-04-08 22:07:39', 10),
(85, 'CS2104180001', 'asd', 9, 8, 10500, 23, 10500, '2021-04-18 13:11:12', 10),
(86, 'CS2104190001', 'Rimar', 10, 8, 10500, 23, 10500, '2021-04-19 14:15:11', 10),
(87, 'CS2104190002', 'Tiara', 10, 9, 12000, 24, 11500, '2021-04-19 14:15:31', 10),
(88, '12224', 'sf', 10, 8, 214, 24, 12324, '0000-00-00 00:00:00', 11),
(89, '12', 'sdf', 12, 9, 12, 24, 123, '2021-04-19 16:10:03', 11),
(90, '1234', 'lili', 10, 8, 12000, 23, 12000, '2021-04-19 18:53:07', 3),
(91, 'CS2104190003', 'nia', 11, 9, 17000, 24, 16500, '2021-04-19 19:42:46', 3),
(92, 'CS2104190004', 'virarkh', 12, 9, 27000, 25, 25000, '2021-04-19 19:43:13', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `view_password` varchar(45) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `foto_profil` text NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `username`, `email`, `password`, `view_password`, `no_hp`, `alamat`, `foto_profil`, `role_id`) VALUES
(3, 'Rokhmah Vira Santi', 'vira', 'rokhmahv@gmail.com', '37d153a06c79e99e4de5889dbe2e7c57', 'april', '089617271499', 'Pandaan, Pasuruan', 'Desain_tanpa_judul.png', 1),
(10, 'Owner', 'owner', 'rokhmahviras@gmail.com', 'd314592962db67e0a52d5e4c341203c7', 'melow', '089617271499', 'Indonesia', 'student.png', 2),
(11, 'Han Ji Pyeong', 'Second', 'hanhan@gmail.com', '8887e36756eec0b46946a9beeaee6bfa', 'hanhan', '08947374', 'korea selatan', 'photo_2020-11-29_17-02-421.jpg', 1),
(12, 'ITB', 'itb', 'itb@itb.ac.id', '57f842286171094855e51fc3a541c1e2', 'halo', '098643', 'bandung', 'UB1.png', 2),
(13, 'Nam Do San', 'Nam Do San', 'san@gmail.com', 'dfc8098f211944e472bf113f2205c563', 'samsamtech', '123456789', 'korea', 'profile_(1).png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`) VALUES
(1, 'rokhmahv@student.ub.ac.id', 'trICZMwIXtVv9CEw1qoejFBWmdfYF6b+7YOaoBkDBJI='),
(2, 'rokhmahv@student.ub.ac.id', 'dpMv0bnqckSSTfGGXEg6LX90dBJm9WxcOUuW9Sm6MSI='),
(3, 'rokhmahv@student.ub.ac.id', 'J0OYV+UYYsR1/5/suh1bwNqyfk6ZmUDc7qIkSsEcdXw='),
(4, 'rokhmahv@student.ub.ac.id', 'YJxVbq5bVKr4e8cYq1Rkg4Qxp8W37uikhBaV3taEVf8='),
(5, 'rokhmahv@gmail.com', 'DkqSbBBfqgx3nXHpuKjSsMGNb97kxn04nMz3OXU8T4k='),
(6, 'rokhmahv@gmail.com', 'BtHE1wuDvuoC0C3blapnKaAdhWzAQGbXGuKj4Xv4FDc='),
(7, 'rokhmahv@gmail.com', 'x7SlY5OFutrVOtdkd1/loBK8TEYQEsksxFSx6/pzugM='),
(8, 'rokhmahv@gmail.com', '+Q32ZPuJ34quk7S6zip7bcHVhmJC4Tdj3NeSEFnDv5Y='),
(9, 'rokhmahv@gmail.com', 'qkLtLHrRK2+NfS8WkSqT+P9CwyW4Q0EcLPVNQKnz0wY='),
(10, 'rokhmahv@gmail.com', 'K8Ju6yGJwGJSAa11gtl1kAlkiHxhRWDmt3dHSCK2DHY='),
(11, 'rokhmahv@gmail.com', 'V9enotgEnYgE44lLptrSfQd9htsLzOXjsWpvBxJ1yj0='),
(12, 'rokhmahv@gmail.com', '1UBu8StXxiuURXF1yFvZ9gPbwrVirOxyi91koGi6lXg='),
(13, 'rokhmahv@gmail.com', 'qq04942Q01F5YcAK4OBMAXY4mXbf1TgjQkwxsmzzmbM='),
(14, 'rokhmahv@gmail.com', '4qeLJZBBRGnMH5kBFzpzWsojzyeGdd2FfNBbCBzsOZ0='),
(15, 'rokhmahv@gmail.com', 'u+9D/4w4bDkt+f42nVOpQq/MAydzjBSwqAJYVHcvjgA='),
(16, 'rokhmahv@gmail.com', 'YhmbjTrjtIBZAgZf5UyW6w4EtCAMDuTFqy6sypdANZA=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pengeluaran`
--
ALTER TABLE `detail_pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengeluaran` (`id_pengeluaran`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_mencuci`
--
ALTER TABLE `metode_mencuci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_suppliers` (`id_suppliers`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_id` (`jenis_id`,`metode_id`,`diskon_id`,`user_id`),
  ADD KEY `diskon_id` (`diskon_id`),
  ADD KEY `metode_id` (`metode_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pengeluaran`
--
ALTER TABLE `detail_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `metode_mencuci`
--
ALTER TABLE `metode_mencuci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pengeluaran`
--
ALTER TABLE `detail_pengeluaran`
  ADD CONSTRAINT `detail_pengeluaran_ibfk_1` FOREIGN KEY (`id_pengeluaran`) REFERENCES `pengeluaran` (`id`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pengeluaran_ibfk_3` FOREIGN KEY (`id_suppliers`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`metode_id`) REFERENCES `metode_mencuci` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_kendaraan` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`diskon_id`) REFERENCES `diskon` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
