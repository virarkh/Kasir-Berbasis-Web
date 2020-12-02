-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 08:18 AM
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
(2, 'Lebaran idul fitri 2021', 15000),
(4, 'Tahun Baru', 3000),
(5, 'Weekend', 1000),
(6, 'Weekday', 500),
(9, 'Tahun Baru', 3000),
(10, 'Ramadhan', 1000),
(11, 'Maulid', 500),
(12, 'Tahun Ajaran Baru', 500),
(13, 'Natal', 2500),
(14, 'Hari Pahlawan', 2500);

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
(6, 'becak motor', 8000);

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
(6, 'top up ovo');

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
(1, 'Biasa', 0),
(2, 'Steam', 3000),
(4, 'cuci bersih sekali', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
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

INSERT INTO `pengeluaran` (`id`, `tanggal`, `jns_pengeluaran_id`, `biaya`, `detail`, `foto`, `user_id`) VALUES
(13, '2020-11-19', 6, 21000, 'top up ovo', '', 0),
(14, '2020-11-20', 2, 4000, '', '', 0),
(15, '2020-11-21', 1, 1200, '', '', 0),
(16, '2020-11-21', 2, 2500, 'yuk', '', 0),
(17, '2020-11-20', 2, 1000000, 'bayar listrik\r\n', '', 0),
(18, '2020-08-05', 2, 60000, 'lorem\r\n', '', 0);

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
  `nama_customer` varchar(45) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `metode_id` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `diskon_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama_customer`, `jenis_id`, `metode_id`, `sub_total`, `diskon_id`, `total`, `bayar`, `kembalian`, `tanggal`, `user_id`) VALUES
(2, 'vira', 2, 1, 15000, 14, 12000, 15000, 3000, '2020-11-17 13:53:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `no.hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `username`, `password`, `no.hp`, `alamat`, `foto`, `role_id`) VALUES
(1, 'Diah', 'diadisana', 'diah123', '258', 'kedondong', '', 1),
(2, 'gina', 'ginaginul', '6561b48b67ac11a03bb406f1f98149e1', '08991303148', 'jakarta', '', 2);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `metode_mencuci`
--
ALTER TABLE `metode_mencuci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_kendaraan` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`diskon_id`) REFERENCES `diskon` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`metode_id`) REFERENCES `metode_mencuci` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
