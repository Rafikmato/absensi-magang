-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2023 at 04:50 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi-magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id_pesan` int NOT NULL,
  `id_pegawai` int NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pesan` text NOT NULL,
  `longitude` varchar(125) NOT NULL,
  `latitude` varchar(125) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id_pesan`, `id_pegawai`, `tanggal`, `pesan`, `longitude`, `latitude`, `gambar`) VALUES
(8, 1, '2022-04-14 13:46:30', 'masih ada rapat', '123.1500891', '0.5312215', '625825b6b06a5.png'),
(9, 1, '2022-04-14 13:47:22', 'lokasi skarang', '123.1469263', '0.5344648', '625825ea4d0c6.png'),
(10, 2, '2022-04-15 02:24:19', 'test', '123.1461003', '0.5327005', '6258d7507b88f.png'),
(11, 2, '2022-04-15 02:25:02', 'laporan sekarang di lapangan', '123.1461003', '0.5327005', '6258d77e000fc.png'),
(12, 2, '2022-04-25 15:12:54', 'Im Here', '112.7520883', '-7.2574719', '6266ba76d51ee.png'),
(13, 1, '2022-05-07 13:44:53', 'aku di sini beb', '123.1462234', '0.5314929', '627677d5d872f.png'),
(14, 1, '2022-05-07 13:45:13', 'woyyy disni qt', '123.1483234', '0.5317271', '627677e963d53.png'),
(15, 1, '2022-05-08 10:23:04', 'Jancokkkkkkk', '123.1462234', '0.5327329', '62779a0870e4e.png'),
(16, 1, '2022-05-08 10:23:52', 'cekkk in', '123.1462234', '0.5327329', '62779a381f1c6.png'),
(17, 1, '2022-05-08 10:24:43', 'Baguss cek sini', '123.1462234', '0.5327329', '62779a6bc4437.png'),
(18, 4, '2022-05-12 04:17:03', 'lagi dikampus', '123.13278144768488', '0.5558317760969297', '627c8a3f76763.png'),
(19, 9, '2023-09-20 15:02:59', 'lagi bokerr', '123.078474', '0.6026799', '650b09a30990f.png');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int NOT NULL,
  `ket_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `ket_jabatan`) VALUES
(3, 'Kepala Dinas'),
(4, 'Pegawai Tetap'),
(7, 'Bajak Laut'),
(8, 'sekdis');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int NOT NULL,
  `nik` varchar(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(75) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'profile.png',
  `jabatan` int NOT NULL DEFAULT '2',
  `id_jabatan` varchar(75) NOT NULL,
  `lingkup` enum('staf','lapangan','kontrak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `username`, `password`, `email`, `status`, `jenis_kelamin`, `profile`, `jabatan`, `id_jabatan`, `lingkup`) VALUES
(9, '7503161701020001', 'Namira', '827ccb0eea8a706c4c34a16891f84e7b', 'namira@gmail.com', '1', 'P', 'profile.png', 2, '4', 'staf'),
(10, '132456778', 'sapi', '827ccb0eea8a706c4c34a16891f84e7b', 'sapi@gmail.com', '1', 'L', 'profile.png', 2, '3', 'staf'),
(11, '123132132123', 'okta', '202cb962ac59075b964b07152d234b70', 'okta@gmail.com', '1', 'L', 'profile.png', 2, '8', 'staf'),
(12, '1232315', 'ISAL', '202cb962ac59075b964b07152d234b70', 'isal@gmail.com', '1', 'L', 'profile.png', 2, '3', 'staf'),
(13, '23434', 'Faisal Djukiro', '43c2a5745cd71241f50207cbfa266fd3', 'faisal@gmail.com', '1', 'L', 'profile.png', 2, '8', 'staf');

-- --------------------------------------------------------

--
-- Table structure for table `ketentuan`
--

CREATE TABLE `ketentuan` (
  `id` int NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `ketentuan_alpa` time NOT NULL,
  `ketentuan_terlambat` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ketentuan`
--

INSERT INTO `ketentuan` (`id`, `jam_masuk`, `jam_keluar`, `ketentuan_alpa`, `ketentuan_terlambat`) VALUES
(1, '08:00:00', '14:00:00', '12:00:00', '09:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id` int NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(125) NOT NULL,
  `email` varchar(75) NOT NULL,
  `role` enum('1','2') NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `username`, `password`, `email`, `role`, `profile`) VALUES
(9, 'Rafik Mato', '827ccb0eea8a706c4c34a16891f84e7b', 'rafikmato@gmail.com', '1', 'profile.png'),
(11, 'Rafik2', '202cb962ac59075b964b07152d234b70', 'rafikmato21@gmail.com', '1', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int NOT NULL,
  `id_pegawai` int NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `tgl_presensi` date NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `longitude` varchar(126) NOT NULL,
  `latidude` varchar(125) NOT NULL,
  `gambar_in` varchar(125) NOT NULL,
  `gambar_out` varchar(125) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_pegawai`, `jam_masuk`, `jam_keluar`, `tgl_presensi`, `keterangan`, `longitude`, `latidude`, `gambar_in`, `gambar_out`) VALUES
(21, 2, '09:11:48', '00:00:00', '2022-05-12', 'hadir', '123.1463818', '0.5325143', '627c5ed48c345.png', 'default.png'),
(22, 5, '12:11:01', '00:00:00', '2022-06-12', 'terlambat', '123.13278123656482', '0.5558306466386053', '627c88d4d4c8a.png', 'default.png'),
(24, 1, '00:00:00', '00:00:00', '2022-10-08', 'izin', '-', '-', 'bb110ac872aca6dfe79c5eff7952ac60.pdf', 'default.png'),
(26, 1, '00:00:00', '00:00:00', '2022-10-09', 'izin', '-', '-', 'af17cb81af8f59d115e23a54d3c7c875.pdf', 'default.png'),
(27, 6, '00:00:00', '00:00:00', '2022-10-09', 'sakit', '-', '-', '116a22182de741b13c557692f2f3734e.jpg', 'default.png'),
(28, 9, '21:59:25', '00:00:00', '2023-09-20', 'alpa', '123.078474', '0.6026799', '650afabdde221.png', 'default.png'),
(29, 9, '21:06:40', '00:00:00', '2023-09-21', 'alpa', '123.0784772', '0.6026782', '650c3fe0e4ccf.png', 'default.png'),
(30, 9, '08:57:33', '14:07:33', '2023-10-23', 'hadir', '123.0567693', '0.5435442', '6535c4fd43589.png', '65360da555201.png'),
(31, 11, '09:07:03', '00:00:00', '2023-10-23', 'hadir', '123.0839985', '0.5554946', '6535c737af945.png', 'default.png'),
(32, 12, '12:50:02', '00:00:00', '2023-10-23', 'alpa', '123.0567693', '0.5435442', '6535fb7a11b18.png', 'default.png'),
(33, 13, '14:57:50', '00:00:00', '2023-10-23', 'alpa', '123.0567693', '0.5435442', '6536196e33c93.png', 'default.png'),
(34, 9, '10:44:19', '00:00:00', '2023-10-25', 'terlambat', '123.0567693', '0.5435442', '65388103e2805.png', 'default.png'),
(35, 9, '09:43:53', '15:40:50', '2023-10-26', 'terlambat', '123.0567693', '0.5435442', '6539c459ae381.png', '653a18026b6b8.png'),
(36, 11, '16:23:57', '00:00:00', '2023-10-26', 'alpa', '123.1328361', '0.5563049', '653a221d75272.png', 'default.png'),
(37, 9, '15:24:08', '00:00:00', '2023-10-27', 'alpa', '123.1323136', '0.557056', '653b65985af4e.png', 'default.png'),
(38, 11, '17:16:41', '00:00:00', '2023-10-27', 'alpa', '123.1328313', '0.5562953', '653b7ff9d5ceb.png', 'default.png'),
(39, 9, '09:45:10', '00:00:00', '2023-10-30', 'terlambat', '123.0567693', '0.5435442', '653f0aa6db90c.png', 'default.png'),
(40, 9, '11:02:54', '15:53:08', '2023-11-06', 'alpa', '123.0693504', '0.5416478', '6548575e7f7c9.png', '65489b64a0396.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `ketentuan`
--
ALTER TABLE `ketentuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id_pesan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ketentuan`
--
ALTER TABLE `ketentuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
