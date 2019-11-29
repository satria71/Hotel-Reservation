-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2019 at 06:48 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `coba`
--

CREATE TABLE `coba` (
  `kode_kamar2` varchar(25) NOT NULL,
  `nama_kamar` varchar(25) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `tarif` int(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coba`
--

INSERT INTO `coba` (`kode_kamar2`, `nama_kamar`, `kelas`, `tarif`, `status`) VALUES
('', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_batal`
--

CREATE TABLE `tb_batal` (
  `id_batal` int(25) NOT NULL,
  `id_reservasi` int(25) NOT NULL,
  `nama_tamu` varchar(25) NOT NULL,
  `kode_kamar` varchar(25) NOT NULL,
  `id_fasilitas` varchar(25) NOT NULL,
  `tgl_check_in` date NOT NULL,
  `tgl_check_out` date NOT NULL,
  `lama_inap` int(25) NOT NULL,
  `total_biaya` int(25) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_batal`
--

INSERT INTO `tb_batal` (`id_batal`, `id_reservasi`, `nama_tamu`, `kode_kamar`, `id_fasilitas`, `tgl_check_in`, `tgl_check_out`, `lama_inap`, `total_biaya`, `status`) VALUES
(1, 30, 'sopi', 'K002', 'F001', '2019-05-07', '2019-05-13', 4, 492, 'Batal'),
(2, 30, 'sopi', 'K002', 'F001', '2019-05-07', '2019-05-13', 4, 492, 'Batal'),
(3, 31, 'sopi', 'K002', 'F001', '2019-05-12', '2019-05-11', 7, 861, 'Batal'),
(4, 36, 'Anik Sriwulan', 'K001', 'F001', '2019-05-11', '2019-05-13', 2, 400000, 'Batal'),
(5, 37, 'Sabana', 'K002', 'F001', '2019-05-02', '2019-05-09', 12, 4200000, 'Batal'),
(6, 39, 'Denatan Bagus Firman Syah', 'K001', 'F001', '2019-05-13', '2019-05-15', 3, 600000, 'Batal'),
(7, 39, 'Denatan Bagus Firman Syah', 'K001', 'F001', '2019-05-13', '2019-05-15', 3, 600000, 'Batal'),
(8, 40, 'Denatan Bagus Firman Syah', 'K001', 'F001', '2019-05-14', '2019-05-15', 1, 200000, 'Batal'),
(9, 43, 'Anik Sriwulan', 'K001', 'F002', '2019-05-01', '2019-05-02', 1, 200000, 'Batal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas`
--

CREATE TABLE `tb_fasilitas` (
  `id_fasilitas` varchar(25) NOT NULL,
  `tipe_fasilitas` varchar(25) NOT NULL,
  `fasilitas` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id_fasilitas`, `tipe_fasilitas`, `fasilitas`, `status`, `flag`) VALUES
('F001', 'Mewah', 'Bantal, Guling', 'Ready', 0),
('F002', 'Biasa', 'Bantal, Guling', 'Ready', 1),
('F003', 'Pertamax', 'Bantal, Guling', 'Ready', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id` int(25) NOT NULL,
  `kode_kamar` varchar(25) NOT NULL,
  `gambar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `kode_kamar` varchar(25) NOT NULL,
  `nama_kamar` varchar(25) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `gambar` varchar(25) NOT NULL,
  `tarif` int(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`kode_kamar`, `nama_kamar`, `kelas`, `gambar`, `tarif`, `status`, `flag`) VALUES
('K001', 'Deluxe 1', 'Deluxe', 'kmr2.jpg', 200000, 'Ready', 1),
('K002', 'Exclussive 1', 'Exclussive', 'kmr7.jpg', 200000, 'Ready', 1),
('K003', 'Premium 1', 'Premium', 'kmr6.jpg', 300000, 'Ready', 1),
('K004', 'Ellite 1', 'Ellite', 'kmr0.jpg', 400000, 'Ready', 1),
('K005', 'Gold 1', 'Gold', 'kmr22.jpg', 500000, 'Ready', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `nip` int(25) NOT NULL,
  `nama_karyawan` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `no_tlp` varchar(25) NOT NULL,
  `level` int(25) NOT NULL DEFAULT '1',
  `flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`nip`, `nama_karyawan`, `username`, `password`, `jabatan`, `alamat`, `no_tlp`, `level`, `flag`) VALUES
(9, 'Shofi rahayu', 'l', 'l', 'Manajer', 'Surabaya', '0909', 1, 1),
(12, 'a', 'a', 'a', 'a', 'a', '1', 1, 0),
(1212, 'Satria', 'admin', 'admin', 'Admisitrator', 'Pakis', '090909', 1, 1),
(1234, 'Yaya', 'a', 'a', 'Admin', 'Malang', '9087', 1, 1),
(11111, 'Lilin Intan Sahara', 'lilin', 'lilin', 'Admin', 'Pakis', '08989898', 1, 1),
(121212, 'Anik Sriwulan', 'anik', '1234', 'Admin', 'Pakis', '098098', 0, 0),
(123123, 'Satria Putra Sabana', 's', 's', 'Admin', 'Malang', '098098', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Sabana', 'y', 'y', 0),
(2, 'Yaya', 'a', 'a', 1),
(3, 'Lilin Intan Sahara', 'lilin', 'lilin', 0),
(4, 'Anik Sriwulan', 'anik', '1234', 0),
(5, 'a', 'a', 'a', 1),
(6, 'j', 'j', 'j', 1),
(7, 'z', 'z', 'z', 0),
(8, 'jkl', 'l', 'l', 1),
(9, 'Satria', 'admin', 'admin', 1),
(10, 'Satria Putra Sabana', 'yaya', '', 0),
(11, 'Lilin Intan', 'lilin', 'lilin', 0),
(12, 'sopi', 'shofi', 'shofi', 0),
(13, 'Denatan Bagus Firman Syah', 'd', 'd', 0),
(14, '', '', '', 0),
(15, 'Putra', 'yaya', '1234', 0),
(16, 'Sad', 'sad', 'sad', 0),
(17, 'Sad', 'Sad', 'd', 0),
(18, 'good', 'good', 'g', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(25) NOT NULL,
  `id_reservasi` varchar(25) NOT NULL,
  `nama_tamu` varchar(25) NOT NULL,
  `kode_kamar` varchar(25) NOT NULL,
  `id_fasilitas` varchar(25) NOT NULL,
  `total_bayar` int(25) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_reservasi`, `nama_tamu`, `kode_kamar`, `id_fasilitas`, `total_bayar`, `status`) VALUES
(3, '36', 'Anik Sriwulan', 'K001', 'F001', 400000, 'Terbayar'),
(4, '37', 'Sabana', 'K002', 'F001', 4200000, 'Terbayar'),
(5, '38', 'Sabana', 'K002', 'F001', 200000, 'Pending'),
(6, '39', 'Denatan Bagus Firman Syah', 'K001', 'F001', 600000, 'Pending'),
(7, '42', 'Denatan Bagus Firman Syah', 'K001', 'F001', 200000, 'Pending'),
(8, '43', 'Anik Sriwulan', 'K001', 'F002', 200000, 'Terbayar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `id_reservasi` int(25) NOT NULL,
  `nama_tamu` varchar(25) NOT NULL,
  `kode_kamar` varchar(25) NOT NULL,
  `id_fasilitas` varchar(25) NOT NULL,
  `tanggal_check_in` date NOT NULL,
  `tanggal_check_out` date NOT NULL,
  `lama_inap` int(25) NOT NULL,
  `total_biaya` int(25) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '1',
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`id_reservasi`, `nama_tamu`, `kode_kamar`, `id_fasilitas`, `tanggal_check_in`, `tanggal_check_out`, `lama_inap`, `total_biaya`, `flag`, `alamat`) VALUES
(38, 'Sabana', 'K002', 'F001', '2019-05-12', '2019-05-13', 1, 200000, 1, 'Jl Ahaha1998'),
(39, 'Denatan Bagus Firman Syah', 'K001', 'F001', '2019-05-13', '2019-05-15', 3, 600000, 0, 'Jl Sadness'),
(40, 'Denatan Bagus Firman Syah', 'K001', 'F001', '2019-05-14', '2019-05-15', 1, 200000, 0, 'Jl Wumbo'),
(41, 'Sabana', 'K002', 'F001', '2019-05-01', '2019-05-02', 1, 200000, 1, 'Jl Testimoni'),
(42, 'Denatan Bagus Firman Syah', 'K001', 'F001', '2019-05-13', '2019-05-14', 1, 200000, 1, 'Jl BajolKuda'),
(43, 'Anik Sriwulan', 'K001', 'F002', '2019-05-01', '2019-05-02', 1, 200000, 0, 'Jl Wow'),
(44, 'Denatan Bagus', 'K001', 'F002', '2019-05-24', '2019-05-27', 3, 600000, 1, ''),
(45, 'Andreas', 'K001', 'F001', '2019-05-11', '2019-05-18', 7, 1400000, 1, ''),
(46, 'Daffa Wahyu', 'K001', 'F001', '2019-05-17', '2019-05-27', 10, 2000000, 1, ''),
(47, 'Daffa Wahyu', 'K001', 'F001', '2019-05-24', '2019-05-27', 3, 600000, 1, ''),
(48, 'jjj', 'K001', 'F001', '2019-05-24', '2019-05-27', 3, 600000, 1, ''),
(49, 'Daffa Wahyu', 'K001', 'F001', '2019-05-24', '2019-05-29', 5, 1000000, 1, ''),
(50, 'Daffa Wahyu', 'K001', 'F001', '2019-05-24', '2019-05-29', 5, 1000000, 1, ''),
(51, 'sad', 'K001', 'F001', '2019-05-10', '2019-05-24', 14, 2800000, 1, 'a rest in peace death'),
(52, 'Daffa Wahyu', 'K002', 'F001', '2019-05-24', '2019-05-28', 4, 800000, 1, 'kjhgfghjk'),
(53, 'asdasd', 'K001', 'F002', '2019-05-31', '2019-06-26', 26, 5200000, 1, 'asdasdas'),
(54, 'Denatan Bagus', 'K001', 'F002', '2019-05-30', '2019-05-31', 1, 200000, 1, 'Bojonegoro'),
(55, 'Denatan Bagus', 'K001', 'F002', '2019-05-30', '2019-05-31', 1, 200000, 1, 'Bojonegoro');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `id_tamu` int(25) NOT NULL,
  `level` int(25) NOT NULL DEFAULT '0',
  `nama_tamu` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `no_tlp` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `flag` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tamu`
--

INSERT INTO `tb_tamu` (`id_tamu`, `level`, `nama_tamu`, `username`, `password`, `jk`, `alamat`, `no_tlp`, `email`, `flag`) VALUES
(2, 0, 'Sabana', 'y', 'y', 'L', 'Pakis', '0098098', 'lkasjdf', 1),
(3, 0, 'j', 'j', 'j', 'l', 'j', '9', 'a', 0),
(4, 0, 'zaza', 'z', 'z', 'P', 'Pakis', '7890987', 'asdf', 0),
(5, 0, 'Satria Putra Sabana', 'yaya', '', 'on', 'Malang', '090909', 'satrialkasjdf', 1),
(6, 0, 'Lilin Intan', 'lilin', 'lilin', 'P', 'Pakis', '00909', 'asdf', 1),
(7, 0, 'sopi', 'shofi', 'shofi', 'P', 'Pakis', '987', 'asdf', 1),
(8, 0, 'Denatan Bagus Firman Syah', 'd', 'd', 'L', 'Jalan Haha', 'qq', 'a@dd', 1),
(9, 0, '', '', '', '', '', '', '', 1),
(10, 0, 'Putra', 'yaya', '1234', 'L', 'Malang', '123466', 'yaya@gmail.com', 1),
(11, 0, 'Sad', 'sad', 'sad', 'L', 'sad', '123', 'sad@gmail.com', 1),
(12, 0, 'Sad', 'Sad', 'd', 'L', 'Jl. Undang', '09865', 'sad@gmail.com', 1),
(13, 0, 'good', 'good', 'g', 'L', 'good', '098', 'good@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coba`
--
ALTER TABLE `coba`
  ADD PRIMARY KEY (`kode_kamar2`);

--
-- Indexes for table `tb_batal`
--
ALTER TABLE `tb_batal`
  ADD PRIMARY KEY (`id_batal`);

--
-- Indexes for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_kamar` (`kode_kamar`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`kode_kamar`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_tamu` (`nama_tamu`),
  ADD KEY `kode_kamar` (`kode_kamar`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- Indexes for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_batal`
--
ALTER TABLE `tb_batal`
  MODIFY `id_batal` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  MODIFY `id_reservasi` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  MODIFY `id_tamu` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD CONSTRAINT `tb_gallery_ibfk_1` FOREIGN KEY (`kode_kamar`) REFERENCES `tb_kamar` (`kode_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD CONSTRAINT `tb_reservasi_ibfk_2` FOREIGN KEY (`kode_kamar`) REFERENCES `tb_kamar` (`kode_kamar`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_reservasi_ibfk_3` FOREIGN KEY (`id_fasilitas`) REFERENCES `tb_fasilitas` (`id_fasilitas`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
