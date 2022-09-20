-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 04:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transcdn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_driver`
--

CREATE TABLE `tb_driver` (
  `nama_driver` varchar(50) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `no_ktp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_driver`
--

INSERT INTO `tb_driver` (`nama_driver`, `id_driver`, `alamat`, `no_hp`, `no_ktp`) VALUES
('Mordekhai Gerin', 10001, 'sangatta', '08123456789', '6464646464646464'),
('Lintang', 10002, 'surabaya', '08123456789', '6464646464646464'),
('Opang', 10003, 'surabaya', '08123456789', '6464646464646464');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `plat_nomor` varchar(50) NOT NULL,
  `nomor_rangka` varchar(50) NOT NULL,
  `nomor_mesin` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `jenis_kendaraan`, `plat_nomor`, `nomor_rangka`, `nomor_mesin`, `kelas`) VALUES
(17, 'Isuzu Elf', 'KT 1235 RB', 'MHKP3BA1JJK143388', 'L15A7-7742964', 'Eksekutif'),
(18, 'Toyota Hiace', 'KT 1233 RB', 'MHKP3BA1JJK143388', 'L15A7-7742964', 'Ekonomi'),
(19, 'Toyota Hiace', 'KT 1234 RB', 'MHKP3BA1JJK143388', 'L15A7-7742964', 'Ekonomi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `id_tiket` int(11) NOT NULL,
  `kelas_tiket` varchar(50) NOT NULL,
  `asal_tiket` varchar(50) NOT NULL,
  `tujuan_tiket` varchar(50) NOT NULL,
  `tanggal_tiket` date NOT NULL,
  `waktu_tiket` varchar(50) NOT NULL,
  `slot_kursi` int(11) NOT NULL,
  `harga_tiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tiket`
--

INSERT INTO `tb_tiket` (`id_tiket`, `kelas_tiket`, `asal_tiket`, `tujuan_tiket`, `tanggal_tiket`, `waktu_tiket`, `slot_kursi`, `harga_tiket`) VALUES
(7, 'Ekonomi', 'SGT', 'BPN', '2022-07-04', '17.00', 8, 250000),
(8, 'Eksekutif', 'SGT', 'BPN', '2022-07-04', '08.00', 12, 300000),
(9, 'Ekonomi', 'SGT', 'SMD', '2022-06-29', '17.00', 12, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `asal_tiket` varchar(50) NOT NULL,
  `tujuan_tiket` varchar(50) NOT NULL,
  `tanggal_tiket` date NOT NULL,
  `jumlah_penumpang` int(11) NOT NULL,
  `waktu_tiket` varchar(50) NOT NULL,
  `kelas_tiket` varchar(50) NOT NULL,
  `harga_tiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_tiket`, `asal_tiket`, `tujuan_tiket`, `tanggal_tiket`, `jumlah_penumpang`, `waktu_tiket`, `kelas_tiket`, `harga_tiket`) VALUES
(5, 0, 'SGT', 'BPN', '2022-07-04', 2, '17.00', '', 0),
(6, 0, 'SGT', 'BPN', '2022-07-04', 2, '17.00', '', 0),
(7, 7, 'SGT', 'BPN', '2022-07-04', 2, '17.00', 'Ekonomi', 500000),
(8, 0, '', '', '0000-00-00', 3, '', '', 0),
(9, 7, 'SGT', 'BPN', '2022-07-04', 2, '17.00', '', 0);

--
-- Triggers `tb_transaksi`
--
DELIMITER $$
CREATE TRIGGER `kursi_tersedia` AFTER INSERT ON `tb_transaksi` FOR EACH ROW BEGIN
	UPDATE tb_tiket SET slot_kursi = slot_kursi - NEW.jumlah_penumpang WHERE id_tiket = NEW.id_tiket;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(15) CHARACTER SET latin1 NOT NULL,
  `password` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 NOT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET latin1 NOT NULL,
  `no_telepon` varchar(15) CHARACTER SET latin1 NOT NULL,
  `alamat` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `jenis_kelamin`, `no_telepon`, `alamat`, `email`, `role`) VALUES
(7, 'admin', '123', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin'),
(8, 'user', 'user123', 'user', 'user', 'user', 'user', 'user', 'user'),
(9, 'gerin', 'gerin123', 'Mordekhai Gerine Lumangkun', 'laki laki', '081255', 'sangatta', 'mordekhaigerinlumangkun@gmail.', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_driver`
--
ALTER TABLE `tb_driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD UNIQUE KEY `plat_nomor` (`plat_nomor`);

--
-- Indexes for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `slot_kursi` (`slot_kursi`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_tiket` (`id_tiket`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
