-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2018 at 08:36 AM
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
-- Table structure for table `tabel_detail_pemesan`
--

CREATE TABLE `tabel_detail_pemesan` (
  `id_pesan` varchar(10) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `tgl_ambil` date NOT NULL,
  `jam_ambil` time NOT NULL,
  `alamat_antar` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_detail_pemesan`
--

INSERT INTO `tabel_detail_pemesan` (`id_pesan`, `nama_pemesan`, `tgl_ambil`, `jam_ambil`, `alamat_antar`, `no_telp`) VALUES
('TP0005', 'arif k', '2018-11-11', '11:11:00', 'dfkhg', ''),
('TP0006', 'arif', '2018-11-22', '09:25:25', 'jember', '0811234567890');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
