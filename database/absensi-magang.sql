-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2023 at 03:26 PM
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
(13, '23434', 'Faisal Djukiro', '43c2a5745cd71241f50207cbfa266fd3', 'faisal@gmail.com', '1', 'L', 'profile.png', 2, '8', 'staf'),
(14, '2678217398', 'Yulianti', '202cb962ac59075b964b07152d234b70', 'tia@gmail.com', '1', 'P', 'profile.png', 2, '4', 'staf'),
(15, '1234567891011', 'Mohamad Rafiq Mato', '202cb962ac59075b964b07152d234b70', 'superman@gmail.com', '1', 'L', 'profile.png', 2, '3', 'kontrak');

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
  `role` enum('1','2','3') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
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
  `gambar_in` varchar(125) NOT NULL,
  `gambar_out` varchar(125) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_pegawai`, `jam_masuk`, `jam_keluar`, `tgl_presensi`, `keterangan`, `gambar_in`, `gambar_out`) VALUES
(21, 2, '09:11:48', '00:00:00', '2022-05-12', 'hadir', '627c5ed48c345.png', 'default.png'),
(22, 5, '12:11:01', '00:00:00', '2022-06-12', 'terlambat', '627c88d4d4c8a.png', 'default.png'),
(24, 1, '00:00:00', '00:00:00', '2022-10-08', 'izin', 'bb110ac872aca6dfe79c5eff7952ac60.pdf', 'default.png'),
(26, 1, '00:00:00', '00:00:00', '2022-10-09', 'izin', 'af17cb81af8f59d115e23a54d3c7c875.pdf', 'default.png'),
(27, 6, '00:00:00', '00:00:00', '2022-10-09', 'sakit', '116a22182de741b13c557692f2f3734e.jpg', 'default.png'),
(28, 9, '21:59:25', '00:00:00', '2023-09-20', 'hadir', '650afabdde221.png', 'default.png'),
(29, 9, '21:06:40', '00:00:00', '2023-09-21', 'alpa', '650c3fe0e4ccf.png', 'default.png'),
(30, 9, '08:57:33', '14:07:33', '2023-10-23', 'hadir', '6535c4fd43589.png', '65360da555201.png'),
(31, 11, '09:07:03', '00:00:00', '2023-10-23', 'hadir', '6535c737af945.png', 'default.png'),
(32, 12, '12:50:02', '00:00:00', '2023-10-23', 'alpa', '6535fb7a11b18.png', 'default.png'),
(33, 13, '14:57:50', '00:00:00', '2023-10-23', 'alpa', '6536196e33c93.png', 'default.png'),
(34, 9, '10:44:19', '00:00:00', '2023-10-25', 'terlambat', '65388103e2805.png', 'default.png'),
(35, 9, '09:43:53', '15:40:50', '2023-10-26', 'alpa', '6539c459ae381.png', '653a18026b6b8.png'),
(36, 11, '16:23:57', '00:00:00', '2023-10-26', 'alpa', '653a221d75272.png', 'default.png'),
(37, 9, '15:24:08', '00:00:00', '2023-10-27', 'alpa', '653b65985af4e.png', 'default.png'),
(38, 11, '17:16:41', '00:00:00', '2023-10-27', 'alpa', '653b7ff9d5ceb.png', 'default.png'),
(39, 9, '09:45:10', '00:00:00', '2023-10-30', 'terlambat', '653f0aa6db90c.png', 'default.png'),
(40, 9, '11:02:54', '15:53:08', '2023-11-06', 'alpa', '6548575e7f7c9.png', '65489b64a0396.png'),
(41, 9, '09:43:55', '14:31:24', '2023-11-20', 'terlambat', '655ab9db328e3.png', '655afd3c57c51.png'),
(42, 11, '19:28:21', '00:00:00', '2023-11-20', 'alpa', '655b42d592c17.png', 'default.png'),
(43, 12, '19:38:30', '19:40:20', '2023-11-20', 'Alpa', '655b453625f86.png', '655b45a45364e.png'),
(44, 14, '19:47:13', '00:00:00', '2023-11-20', 'Alpa', '655b474128efe.png', 'default.png'),
(45, 9, '15:21:51', '00:00:00', '2023-11-21', 'hadir', '655c5a8f31fba.png', 'default.png'),
(46, 12, '15:22:35', '00:00:00', '2023-11-21', 'Alpa', '655c5abb3ce1a.png', 'default.png'),
(47, 11, '16:36:23', '00:00:00', '2023-11-21', 'Alpa', '655c6c07e4864.png', 'default.png'),
(48, 9, '14:02:33', '00:00:00', '2023-11-22', 'Alpa', '655d9979951c8.png', 'default.png'),
(49, 9, '09:50:46', '14:01:02', '2023-11-23', 'Terlambat', '655eaff64f408.png', '655eea9ea89fd.png'),
(50, 11, '13:30:43', '14:01:17', '2023-11-23', 'Alpa', '655ee383ddacd.png', '655eeaade8f44.png'),
(51, 12, '14:04:03', '14:04:07', '2023-11-23', 'Alpa', '655eeb5301b09.png', '655eeb577b354.png'),
(52, 15, '14:06:24', '14:06:27', '2023-11-23', 'Alpa', '655eebe0d60ee.png', '655eebe376053.png'),
(53, 11, '22:56:07', '00:00:00', '2023-11-27', 'Alpa', '6564ae073fa61.png', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `update_presensi`
--

CREATE TABLE `update_presensi` (
  `id` int NOT NULL,
  `id_presensi` int NOT NULL,
  `id_pegawai` int NOT NULL,
  `when` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `before` varchar(100) NOT NULL,
  `after` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `update_presensi`
--

INSERT INTO `update_presensi` (`id`, `id_presensi`, `id_pegawai`, `when`, `before`, `after`) VALUES
(1, 45, 9, '2023-11-21', '', ''),
(2, 45, 9, '2023-11-21', '', ''),
(3, 28, 9, '2023-11-21', 'alpa', 'alpa'),
(4, 28, 9, '2023-11-21', 'alpa', 'hadir');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `update_presensi`
--
ALTER TABLE `update_presensi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ketentuan`
--
ALTER TABLE `ketentuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `update_presensi`
--
ALTER TABLE `update_presensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
