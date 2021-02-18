-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 01:08 PM
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
(17, 'Tidak ada', 0),
(18, 'Tahun Baru', 2000),
(19, 'Januari', 1000),
(20, 'coba use case', 1000);

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
(1, 'Matic', 10000),
(2, 'Bebek', 13000),
(3, 'NMax', 16000),
(7, 'coba use case', 100);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengeluaran`
--

CREATE TABLE `jenis_pengeluaran` (
  `id` int(11) NOT NULL,
  `nama_pengeluaran` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pengeluaran`
--

INSERT INTO `jenis_pengeluaran` (`id`, `nama_pengeluaran`) VALUES
(1, 'air mineral'),
(2, 'listrik'),
(6, 'top up ovo'),
(7, 'coba use case1');

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
(1, 'Biasa', 10),
(2, 'Steam', 3000),
(4, 'cuci bersih sekali', 4000),
(6, 'tes', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `kode` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `jns_pengeluaran_id` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `detail` text NOT NULL,
  `foto` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `kode`, `tanggal`, `jns_pengeluaran_id`, `biaya`, `detail`, `foto`, `user_id`) VALUES
(19, '1234', '2021-01-06', 1, 200, 'halo', '', 1),
(20, '9876', '2021-01-14', 6, 3000, 'asdf', '', 2),
(21, '123', '2021-01-20', 2, 5000, 'halo\r\n', '', 2);

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
(55, 'CS2101190002', 'leo', 1, 1, 0, 17, 0, '2021-01-19 11:26:28', 3),
(56, 'CS2101190003', 'halo', 1, 2, 0, 19, 3000, '2021-01-19 11:30:07', 3),
(57, 'CS2101190004', 'hlao', 3, 1, 0, 19, 0, '2021-01-19 12:07:22', 3),
(59, 'CS2101190006', 'coba lagi', 1, 1, 0, 19, 0, '2021-01-19 12:20:48', 2),
(60, 'CS2101200001', 'uta', 2, 6, 0, 18, 12000, '2021-01-20 10:23:20', 2);

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
(1, 'Diah', 'diadisana', 'rokhmahv@student.ub.ac.id', '1059c5ae65326e7f02ba9a9552889c6a', 'halohalo', '258', 'kedondong', '', 1),
(2, 'gina', 'ginaginul', 'halo@gmail.com', '57f842286171094855e51fc3a541c1e2', 'halo', '08991303148', 'jakarta', 'IMG_4391-removebg-preview.png', 2),
(3, 'Rokhmah Vira', 'vira', 'rokhmahv@gmail.com', 'd7324ebb4425f29915ecda12cb35333c', 'halo1', '089617271499', 'pasuruan', 'profil.jpg', 1),
(4, 'tes', 'tes', 'tes@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '087897897897', 'disini', 'brain1.png', 2);

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
(4, 'rokhmahv@student.ub.ac.id', 'YJxVbq5bVKr4e8cYq1Rkg4Qxp8W37uikhBaV3taEVf8=');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
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
  ADD KEY `jns_pengeluaran_id` (`jns_pengeluaran_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
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
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `metode_mencuci`
--
ALTER TABLE `metode_mencuci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`jns_pengeluaran_id`) REFERENCES `jenis_pengeluaran` (`id`);

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
