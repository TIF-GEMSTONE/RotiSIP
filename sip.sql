-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 03:07 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_detail_pesan`
--

CREATE TABLE `tabel_detail_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_roti` int(11) NOT NULL,
  `jumlah_roti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_detail_pesan`
--

INSERT INTO `tabel_detail_pesan` (`id_pesan`, `id_roti`, `jumlah_roti`) VALUES
(32, 70002, 45),
(33, 70001, 23),
(34, 70004, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_detail_sip`
--

CREATE TABLE `tabel_detail_sip` (
  `no_transaksi` varchar(7) NOT NULL,
  `id_roti` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_detail_sip`
--

INSERT INTO `tabel_detail_sip` (`no_transaksi`, `id_roti`, `harga`, `jumlah`, `total`) VALUES
('TR0001', 70005, 9000, 10, 90000),
('TR0001', 70001, 3000, 43, 129000),
('TR0001', 70003, 3500, 12, 42000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pegawai`
--

CREATE TABLE `tabel_pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pegawai`
--

INSERT INTO `tabel_pegawai` (`id_pegawai`, `nama_pegawai`, `username`, `password`, `level`) VALUES
(40001, 'Mukriono', 'admin', 'admin', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pesanan`
--

CREATE TABLE `tabel_pesanan` (
  `id_pesan` int(10) NOT NULL,
  `id_roti` int(11) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `jumlah_roti` int(11) NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_ambil` date NOT NULL,
  `jam_ambil` time NOT NULL,
  `alamat_antar` varchar(100) DEFAULT NULL,
  `selesai` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pesanan`
--

INSERT INTO `tabel_pesanan` (`id_pesan`, `id_roti`, `nama_pemesan`, `no_telp`, `jumlah_roti`, `tgl_pesan`, `tgl_ambil`, `jam_ambil`, `alamat_antar`, `selesai`) VALUES
(32, 70002, 'Safira', '08123456789', 45, '2018-06-05 21:46:18', '2018-06-09', '09:00:00', NULL, NULL),
(33, 70001, 'lala', '23423442', 23, '2018-06-06 01:02:38', '2018-06-06', '00:03:00', NULL, NULL),
(34, 70003, 'Gigi', '086532164325', 56, '2018-06-06 01:22:13', '2018-06-13', '00:00:00', 'Kaliurang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_roti`
--

CREATE TABLE `tabel_roti` (
  `id_roti` int(10) NOT NULL,
  `nama_roti` varchar(30) NOT NULL,
  `harga` int(6) NOT NULL,
  `tgl_produksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_kadaluarsa` date NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_roti`
--

INSERT INTO `tabel_roti` (`id_roti`, `nama_roti`, `harga`, `tgl_produksi`, `tgl_kadaluarsa`, `gambar`) VALUES
(70001, 'Roti Pisang', 3000, '2018-10-17 06:07:01', '2018-06-30', 'https://raw.githubusercontent.com/TIF-GEMSTONE/RotiSip/master/images/rotipisang.jpg'),
(70002, 'Roti Keju', 3500, '2018-10-17 06:09:12', '2018-06-30', 'https://raw.githubusercontent.com/TIF-GEMSTONE/RotiSip/master/images/rotikeju.jpg'),
(70003, 'Roti Coklat', 3500, '2018-10-17 06:09:12', '2018-06-30', 'https://raw.githubusercontent.com/TIF-GEMSTONE/RotiSip/master/images/roticoklat.jpg'),
(70004, 'Roti Sisir', 8000, '2018-10-17 06:09:13', '2018-06-30', 'https://raw.githubusercontent.com/TIF-GEMSTONE/RotiSip/master/images/rotisisir.jpg'),
(70005, 'Roti Kenong', 9000, '2018-10-17 06:09:13', '2018-06-30', 'https://raw.githubusercontent.com/TIF-GEMSTONE/RotiSip/master/images/rotikenong.jpg'),
(70006, 'Roti Sobek', 8500, '2018-10-17 06:09:13', '2018-06-30', 'https://raw.githubusercontent.com/TIF-GEMSTONE/RotiSip/master/images/rotisobek.jpg'),
(70007, 'Roti Tawar', 10000, '2018-10-17 06:09:13', '2018-06-30', 'https://raw.githubusercontent.com/TIF-GEMSTONE/RotiSip/master/images/rotitawar.jpg'),
(70009, 'Roti Strawberry', 2000, '2018-10-17 06:09:13', '2018-06-30', 'https://raw.githubusercontent.com/TIF-GEMSTONE/RotiSip/master/images/rotistrw.jpg'),
(70010, 'asd', 123, '2018-10-25 10:02:12', '0000-00-00', '7.png');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi_sip`
--

CREATE TABLE `tabel_transaksi_sip` (
  `no_transaksi` varchar(8) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_jual` double NOT NULL,
  `uang` double NOT NULL,
  `kembalian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_detail_pesan`
--
ALTER TABLE `tabel_detail_pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_roti` (`id_roti`);

--
-- Indexes for table `tabel_detail_sip`
--
ALTER TABLE `tabel_detail_sip`
  ADD KEY `id_roti` (`id_roti`),
  ADD KEY `no_transaksi` (`no_transaksi`);

--
-- Indexes for table `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tabel_pesanan`
--
ALTER TABLE `tabel_pesanan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_roti` (`id_roti`);

--
-- Indexes for table `tabel_roti`
--
ALTER TABLE `tabel_roti`
  ADD PRIMARY KEY (`id_roti`);

--
-- Indexes for table `tabel_transaksi_sip`
--
ALTER TABLE `tabel_transaksi_sip`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_detail_pesan`
--
ALTER TABLE `tabel_detail_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40002;
--
-- AUTO_INCREMENT for table `tabel_pesanan`
--
ALTER TABLE `tabel_pesanan`
  MODIFY `id_pesan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tabel_roti`
--
ALTER TABLE `tabel_roti`
  MODIFY `id_roti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70011;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_detail_pesan`
--
ALTER TABLE `tabel_detail_pesan`
  ADD CONSTRAINT `tabel_detail_pesan_ibfk_2` FOREIGN KEY (`id_roti`) REFERENCES `tabel_roti` (`id_roti`),
  ADD CONSTRAINT `tabel_detail_pesan_ibfk_3` FOREIGN KEY (`id_pesan`) REFERENCES `tabel_pesanan` (`id_pesan`);

--
-- Constraints for table `tabel_detail_sip`
--
ALTER TABLE `tabel_detail_sip`
  ADD CONSTRAINT `tabel_detail_sip_ibfk_1` FOREIGN KEY (`id_roti`) REFERENCES `tabel_roti` (`id_roti`);

--
-- Constraints for table `tabel_pesanan`
--
ALTER TABLE `tabel_pesanan`
  ADD CONSTRAINT `tabel_pesanan_ibfk_1` FOREIGN KEY (`id_roti`) REFERENCES `tabel_roti` (`id_roti`);

--
-- Constraints for table `tabel_transaksi_sip`
--
ALTER TABLE `tabel_transaksi_sip`
  ADD CONSTRAINT `tabel_transaksi_sip_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tabel_pegawai` (`id_pegawai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
