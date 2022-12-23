-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 02:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiket_kereta`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `pesanan_all`
-- (See below for the actual view)
--
CREATE TABLE `pesanan_all` (
`id_pesan` int(11)
,`id_user` int(11)
,`id_tiket` int(11)
,`user_username` varchar(255)
,`nama_pesan` varchar(255)
,`nik_pesan` varchar(255)
,`jumlah_penumpang` varchar(255)
,`kode_pesan` varchar(255)
,`nama_kereta` varchar(255)
,`jenis_kereta` varchar(255)
,`berangkat_lokasi` varchar(255)
,`berangkat_waktu` varchar(255)
,`tiba_lokasi` varchar(255)
,`tiba_waktu` varchar(255)
,`harga` varchar(255)
,`status_data` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_pesan`
--

CREATE TABLE `tb_log_pesan` (
  `id_log_pesan` int(11) NOT NULL,
  `id_pesan` int(11) DEFAULT NULL,
  `aksi` varchar(255) NOT NULL,
  `dibuat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_log_pesan`
--

INSERT INTO `tb_log_pesan` (`id_log_pesan`, `id_pesan`, `aksi`, `dibuat`) VALUES
(1, 1, 'INSERT', '2021-12-22 09:19:43'),
(2, 1, 'UPDATE', '2021-12-22 09:22:21'),
(3, 2, 'INSERT', '2021-12-22 10:55:44'),
(4, 2, 'UPDATE', '2021-12-22 10:56:02'),
(5, 3, 'INSERT', '2021-12-22 10:56:46'),
(6, 4, 'INSERT', '2021-12-22 11:00:08'),
(7, 5, 'INSERT', '2021-12-22 11:06:16'),
(8, 6, 'INSERT', '2021-12-22 12:21:30'),
(9, 6, 'UPDATE', '2021-12-22 12:33:39'),
(10, 6, 'UPDATE', '2021-12-22 12:33:42'),
(11, 6, 'UPDATE', '2021-12-22 12:33:45'),
(12, 6, 'UPDATE', '2021-12-22 12:33:47'),
(13, 7, 'INSERT', '2021-12-22 12:34:03'),
(14, 8, 'INSERT', '2021-12-22 12:34:12'),
(15, 9, 'INSERT', '2021-12-22 12:34:23'),
(16, 9, 'UPDATE', '2021-12-22 12:34:39'),
(17, 9, 'UPDATE', '2021-12-22 12:34:42'),
(18, 10, 'INSERT', '2021-12-22 12:34:52'),
(19, 11, 'INSERT', '2021-12-22 12:35:07'),
(20, 12, 'INSERT', '2021-12-22 13:45:13'),
(21, 13, 'INSERT', '2021-12-22 13:45:54'),
(22, 13, 'UPDATE', '2021-12-22 13:46:04'),
(23, 14, 'INSERT', '2021-12-22 15:24:45'),
(24, 14, 'UPDATE', '2021-12-22 15:27:57'),
(25, 15, 'INSERT', '2021-12-22 15:37:59'),
(26, 15, 'UPDATE', '2021-12-22 15:38:45'),
(27, 15, 'UPDATE', '2021-12-22 15:40:40'),
(28, 16, 'INSERT', '2022-12-23 13:14:25'),
(29, 16, 'UPDATE', '2022-12-23 13:14:55'),
(30, 17, 'INSERT', '2022-12-23 13:17:16'),
(31, 18, 'INSERT', '2022-12-23 13:17:53'),
(32, 19, 'INSERT', '2022-12-23 17:17:32'),
(33, 19, 'UPDATE', '2022-12-23 17:27:13'),
(34, 19, 'UPDATE', '2022-12-23 17:27:16'),
(35, 19, 'UPDATE', '2022-12-23 17:27:19'),
(36, 19, 'UPDATE', '2022-12-23 17:27:22'),
(37, 20, 'INSERT', '2022-12-23 17:28:19'),
(38, 21, 'INSERT', '2022-12-23 19:23:18'),
(39, 21, 'UPDATE', '2022-12-23 19:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_tiket`
--

CREATE TABLE `tb_log_tiket` (
  `id_log_tiket` int(11) NOT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `aksi` varchar(255) NOT NULL,
  `dibuat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_log_tiket`
--

INSERT INTO `tb_log_tiket` (`id_log_tiket`, `id_tiket`, `aksi`, `dibuat`) VALUES
(1, 6, 'INSERT', '2021-12-22 09:21:17'),
(2, 6, 'UPDATE', '2021-12-22 09:21:35'),
(3, 7, 'INSERT', '2022-12-07 01:52:51'),
(4, 7, 'UPDATE', '2022-12-07 01:53:25'),
(5, 8, 'INSERT', '2022-12-07 01:53:51'),
(6, 9, 'INSERT', '2022-12-07 01:53:53'),
(7, 10, 'INSERT', '2022-12-07 01:53:56'),
(8, 10, 'UPDATE', '2022-12-07 01:54:02'),
(9, 10, 'UPDATE', '2022-12-07 01:54:06'),
(10, 10, 'UPDATE', '2022-12-07 01:54:09'),
(11, 11, 'INSERT', '2022-12-23 13:21:54'),
(12, 12, 'INSERT', '2022-12-23 13:31:40'),
(13, 13, 'INSERT', '2022-12-23 13:57:31'),
(14, 14, 'INSERT', '2022-12-23 13:59:37'),
(15, 15, 'INSERT', '2022-12-23 14:04:59'),
(16, 15, 'UPDATE', '2022-12-23 14:05:49'),
(17, 15, 'UPDATE', '2022-12-23 14:05:52'),
(18, 15, 'UPDATE', '2022-12-23 14:05:55'),
(19, 15, 'UPDATE', '2022-12-23 14:06:02'),
(20, 15, 'UPDATE', '2022-12-23 14:06:07'),
(21, 16, 'INSERT', '2022-12-23 16:05:10'),
(22, 16, 'UPDATE', '2022-12-23 16:07:11'),
(23, 17, 'INSERT', '2022-12-23 16:12:14'),
(24, 17, 'UPDATE', '2022-12-23 16:12:22'),
(25, 17, 'UPDATE', '2022-12-23 16:12:34'),
(26, 18, 'INSERT', '2022-12-23 17:20:18'),
(27, 19, 'INSERT', '2022-12-23 17:22:03'),
(28, 20, 'INSERT', '2022-12-23 17:23:14'),
(29, 20, 'UPDATE', '2022-12-23 17:23:49'),
(30, 20, 'UPDATE', '2022-12-23 17:23:52'),
(31, 20, 'UPDATE', '2022-12-23 17:23:57'),
(32, 21, 'INSERT', '2022-12-23 17:25:21'),
(33, 22, 'INSERT', '2022-12-23 17:26:40'),
(34, 22, 'UPDATE', '2022-12-23 17:26:46'),
(35, 22, 'UPDATE', '2022-12-23 17:26:51'),
(36, 23, 'INSERT', '2022-12-23 17:46:40'),
(37, 24, 'INSERT', '2022-12-23 19:18:00'),
(38, 25, 'INSERT', '2022-12-23 19:20:51'),
(39, 25, 'UPDATE', '2022-12-23 19:21:06'),
(40, 25, 'UPDATE', '2022-12-23 19:21:10'),
(41, 25, 'UPDATE', '2022-12-23 19:21:14'),
(42, 26, 'INSERT', '2022-12-23 19:22:02'),
(43, 26, 'UPDATE', '2022-12-23 19:24:02'),
(44, 27, 'INSERT', '2022-12-23 19:30:24'),
(45, 28, 'INSERT', '2022-12-23 19:30:59'),
(46, 29, 'INSERT', '2022-12-23 19:31:28'),
(47, 30, 'INSERT', '2022-12-23 19:32:07'),
(48, 31, 'INSERT', '2022-12-23 19:33:00'),
(49, 31, 'UPDATE', '2022-12-23 19:33:06'),
(50, 31, 'UPDATE', '2022-12-23 19:33:09'),
(51, 31, 'UPDATE', '2022-12-23 19:33:13'),
(52, 31, 'UPDATE', '2022-12-23 19:33:16'),
(53, 31, 'UPDATE', '2022-12-23 19:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `nama_pesan` varchar(255) NOT NULL,
  `nik_pesan` varchar(255) NOT NULL,
  `jumlah_penumpang` varchar(255) NOT NULL,
  `kode_pesan` varchar(255) NOT NULL,
  `dibuat` datetime DEFAULT NULL,
  `diubah` datetime DEFAULT NULL,
  `status_data` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `id_user`, `id_tiket`, `nama_pesan`, `nik_pesan`, `jumlah_penumpang`, `kode_pesan`, `dibuat`, `diubah`, `status_data`) VALUES
(1, 2, 1, 'hehe', '1234', '4', 'a020958e-62cd-11ec-b560-a8a159055c2b', '2021-12-22 09:19:43', NULL, 'mati'),
(2, 2, 1, 'nama', '1233454', '5', '09c21c64-62db-11ec-b560-a8a159055c2b', '2021-12-22 10:55:44', NULL, 'mati'),
(3, 2, 1, 'sadfsadf', '1232131', '234', '2ecf09d3-62db-11ec-b560-a8a159055c2b', '2021-12-22 10:56:46', NULL, 'mati'),
(4, 2, 5, 'hehe', '3424234', '-3', 'a6f3ea53-62db-11ec-b560-a8a159055c2b', '2021-12-22 11:00:08', NULL, 'mati'),
(5, 2, 3, '324234', 'sfsdfg', '-3', '82a5337d-62dc-11ec-b560-a8a159055c2b', '2021-12-22 11:06:16', NULL, 'mati'),
(6, 2, 1, 'sfdsdf', '24234', '45', '05707371-62e7-11ec-b560-a8a159055c2b', '2021-12-22 12:21:30', NULL, 'mati'),
(7, 2, 1, 'Fatih', '423547561', '3', 'c5b61dd2-62e8-11ec-b560-a8a159055c2b', '2021-12-22 12:34:03', NULL, 'mati'),
(8, 2, 1, 'Ahmad', '6734736', '1', 'cb646b8e-62e8-11ec-b560-a8a159055c2b', '2021-12-22 12:34:12', NULL, 'mati'),
(9, 2, 1, 'Fadhlullah', '46784', '2', 'd210142c-62e8-11ec-b560-a8a159055c2b', '2021-12-22 12:34:23', NULL, 'mati'),
(10, 2, 4, 'Ahmad', '3425624', '2', 'e360c550-62e8-11ec-b560-a8a159055c2b', '2021-12-22 12:34:52', NULL, 'mati'),
(11, 2, 3, 'Fadhlullah', '647996', '1', 'ebfadf15-62e8-11ec-b560-a8a159055c2b', '2021-12-22 12:35:07', NULL, 'mati'),
(12, 4, 1, 'Annisah', '122220000', '2', 'b70fd3b3-62f2-11ec-b560-a8a159055c2b', '2021-12-22 13:45:13', NULL, 'mati'),
(13, 4, 1, 'Annisah', '122220000', '2', 'cf9ef9ef-62f2-11ec-b560-a8a159055c2b', '2021-12-22 13:45:54', NULL, 'mati'),
(14, 4, 1, 'adafa', '122220000', '3', '9e9c0984-6300-11ec-b560-a8a159055c2b', '2021-12-22 15:24:45', NULL, 'aktif'),
(15, 5, 1, 'Nisa', '214512222', '2', '77b4b8ef-6302-11ec-b560-a8a159055c2b', '2021-12-22 15:37:59', NULL, 'mati'),
(16, 7, 1, 'asfasdfsadf', '12312312', '5', '0dc2334b-8289-11ed-8122-a8a159055c2b', '2022-12-23 13:14:25', NULL, 'mati'),
(17, 7, 1, 'sadf asdf', '312', '1', '73d0bdf6-8289-11ed-8122-a8a159055c2b', '2022-12-23 13:17:16', NULL, 'aktif'),
(18, 7, 1, 'sdafasdf', '342', '12', '89c7260d-8289-11ed-8122-a8a159055c2b', '2022-12-23 13:17:53', NULL, 'aktif'),
(19, 2, 5, 'Fatih Ahmad Fadhlullah', '123123123', '9', '0414608b-82ab-11ed-8122-a8a159055c2b', '2022-12-23 17:17:32', NULL, 'mati'),
(20, 2, 18, 'Ini Adalah Nama Lengkap', '1234567890', '4', '863cf166-82ac-11ed-8122-a8a159055c2b', '2022-12-23 17:28:19', NULL, 'aktif'),
(21, 2, 26, '13123', '1213', '92187469238764918274691827469812746918274692184736', '96338e6f-82bc-11ed-8122-a8a159055c2b', '2022-12-23 19:23:18', NULL, 'mati');

--
-- Triggers `tb_pesan`
--
DELIMITER $$
CREATE TRIGGER `insert_tb_pesan` AFTER INSERT ON `tb_pesan` FOR EACH ROW begin 
			insert into tb_log_pesan (id_pesan, aksi, dibuat)
				values(
				(select id_pesan from tb_pesan where id_pesan=(SELECT max(id_pesan) FROM tb_pesan)),
				'INSERT',
				now()
				);
		end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_tb_pesan` AFTER UPDATE ON `tb_pesan` FOR EACH ROW begin 
			insert into tb_log_pesan (id_pesan, aksi, dibuat)
				values(
				(select id_pesan from tb_pesan where id_pesan=(SELECT max(id_pesan) FROM tb_pesan)),
				'UPDATE',
				now()
				);
		end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `id_tiket` int(11) NOT NULL,
  `nama_kereta` varchar(255) NOT NULL,
  `jenis_kereta` varchar(255) NOT NULL,
  `berangkat_lokasi` varchar(255) NOT NULL,
  `berangkat_waktu` varchar(255) NOT NULL,
  `tiba_lokasi` varchar(255) NOT NULL,
  `tiba_waktu` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `dibuat` datetime DEFAULT NULL,
  `diubah` datetime DEFAULT NULL,
  `status_data` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tiket`
--

INSERT INTO `tb_tiket` (`id_tiket`, `nama_kereta`, `jenis_kereta`, `berangkat_lokasi`, `berangkat_waktu`, `tiba_lokasi`, `tiba_waktu`, `harga`, `dibuat`, `diubah`, `status_data`) VALUES
(1, 'Argo Parahayangan', 'Ekonomi', 'Gambir', '22 Dec 2021 06:30', 'Bandung', '22 Dec 2021 11:00', '115000', '2021-12-22 09:18:55', NULL, 'mati'),
(2, 'Malabar', 'Eksekutif', 'Tangerang', '22 Dec 2021 08:00', 'Serpong', '22 Dec 2021 09:30', '280000', '2021-12-22 09:18:55', NULL, 'mati'),
(3, 'Argo Lawu', 'Bisnis', 'Gambir', '22 Dec 2021 09:30', 'Cilacap', '22 Dec 2021 13:50', '300000', '2021-12-22 09:18:55', NULL, 'mati'),
(4, 'Malabar', 'Ekonomi', 'Pasar Senen', '22 Dec 2021 17:15', 'Pasar Turi', '22 Dec 2021 18:30', '120000', '2021-12-22 09:18:55', NULL, 'mati'),
(5, 'Malabar', 'Bisnis', 'Pasar Senen', '22 Dec 2021 19:00', 'Tegal', '22 Dec 2021 20:00', '330000', '2021-12-22 09:18:55', NULL, 'mati'),
(18, 'Argo Parahayangan', 'Ekonomi', 'Gambir', 'Wednesday, 22 Dec 2021 06:30', 'Bandung', 'Wednesday, 22 Dec 2021 11:00', '115000', '2022-12-23 17:20:18', NULL, 'mati'),
(19, 'Malabar', 'Eksekutif', 'Tangerang', 'Wednesday, 22 Dec 2021 08:00', 'Serpong', 'Wednesday, 22 Dec 2021 09:30', '280000', '2022-12-23 17:22:03', NULL, 'mati'),
(20, 'Argo Lawu', 'Bisnis', 'Gambir', 'Wednesday, 22 Dec 2021 09:30', 'Cilacap', 'Wednesday, 22 Dec 2021 13:50', '300000', '2022-12-23 17:23:14', NULL, 'mati'),
(21, 'Malabar', 'Ekonomi', 'Pasar Senen', 'Wednesday, 22 Dec 2021 17:15', 'Pasar Turi', 'Wednesday, 22 Dec 2021 18:30', '120000', '2022-12-23 17:25:21', NULL, 'mati'),
(22, 'Malabar', 'Bisnis', 'Pasar Senen', 'Wednesday, 22 Dec 2021 19:00', 'Tegal', 'Wednesday, 22 Dec 2021 21:00', '330000', '2022-12-23 17:26:40', NULL, 'mati'),
(23, 'test', 'test', 'test', 'Friday, 23 Dec 2022 17:46', 'test', 'Friday, 23 Dec 2022 17:46', '123', '2022-12-23 17:46:40', NULL, 'mati'),
(27, 'Argo Parahayangan', 'Ekonomi', 'Gambir', '2022-12-23T19:30', 'Bandung', '2022-12-23T19:30', '150000', '2022-12-23 19:30:24', NULL, 'aktif'),
(28, 'Malabar', 'Eksekutif', 'Tangerang', '2022-12-23T19:30', 'Serpong', '2022-12-23T19:30', '280000', '2022-12-23 19:30:59', NULL, 'aktif'),
(29, 'Argo Lawu', 'Bisnis', 'Gambir', '2022-12-23T19:31', 'Cilacap', '2022-12-23T19:31', '300000', '2022-12-23 19:31:28', NULL, 'aktif'),
(30, 'Malabar', 'Ekonomi', 'Pasar Senen', '2022-12-23T19:31', 'Pasar Turi', '2022-12-23T19:31', '120000', '2022-12-23 19:32:07', NULL, 'aktif'),
(31, 'Malabar', 'Bisnis', 'Pasar Senen', '2022-12-23T19:32', 'Tegal', '2022-12-23T19:32', '330000', '2022-12-23 19:33:00', NULL, 'aktif');

--
-- Triggers `tb_tiket`
--
DELIMITER $$
CREATE TRIGGER `insert_tb_tiket` AFTER INSERT ON `tb_tiket` FOR EACH ROW begin 
			insert into tb_log_tiket (id_tiket, aksi, dibuat)
				values(
				(select id_tiket from tb_tiket where id_tiket=(SELECT max(id_tiket) FROM tb_tiket)),
				'INSERT',
				now()
				);
		end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_tb_tiket` AFTER UPDATE ON `tb_tiket` FOR EACH ROW begin 
			insert into tb_log_tiket (id_tiket, aksi, dibuat)
				values(
				(select id_tiket from tb_tiket where id_tiket=(SELECT max(id_tiket) FROM tb_tiket)),
				'UPDATE',
				now()
				);
		end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `dibuat` datetime DEFAULT NULL,
  `diubah` datetime DEFAULT NULL,
  `status_data` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `user_username`, `user_password`, `user_role`, `dibuat`, `diubah`, `status_data`) VALUES
(9, 'adminlol', '$2y$10$XNmJhDjA9RA6SATHKl3CVOVbkluuCE1b3444C1iYYh7DMixYtWAlu', 'admin', '2022-12-23 19:56:13', NULL, 'aktif'),
(10, 'user1', '$2y$10$dLtCmS/UKr7PfCcmtoa7IebSXuoaJrBP3BUExxX7HPXw1w7L9Dj8O', 'user', '2022-12-23 19:57:03', NULL, 'aktif');

-- --------------------------------------------------------

--
-- Structure for view `pesanan_all`
--
DROP TABLE IF EXISTS `pesanan_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pesanan_all`  AS SELECT `c`.`id_pesan` AS `id_pesan`, `a`.`id_user` AS `id_user`, `b`.`id_tiket` AS `id_tiket`, `a`.`user_username` AS `user_username`, `c`.`nama_pesan` AS `nama_pesan`, `c`.`nik_pesan` AS `nik_pesan`, `c`.`jumlah_penumpang` AS `jumlah_penumpang`, `c`.`kode_pesan` AS `kode_pesan`, `b`.`nama_kereta` AS `nama_kereta`, `b`.`jenis_kereta` AS `jenis_kereta`, `b`.`berangkat_lokasi` AS `berangkat_lokasi`, `b`.`berangkat_waktu` AS `berangkat_waktu`, `b`.`tiba_lokasi` AS `tiba_lokasi`, `b`.`tiba_waktu` AS `tiba_waktu`, `b`.`harga` AS `harga`, `c`.`status_data` AS `status_data` FROM ((`tb_user` `a` join `tb_tiket` `b`) join `tb_pesan` `c`) WHERE `a`.`id_user` = `c`.`id_user` AND `b`.`id_tiket` = `c`.`id_tiket` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_log_pesan`
--
ALTER TABLE `tb_log_pesan`
  ADD PRIMARY KEY (`id_log_pesan`);

--
-- Indexes for table `tb_log_tiket`
--
ALTER TABLE `tb_log_tiket`
  ADD PRIMARY KEY (`id_log_tiket`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_log_pesan`
--
ALTER TABLE `tb_log_pesan`
  MODIFY `id_log_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_log_tiket`
--
ALTER TABLE `tb_log_tiket`
  MODIFY `id_log_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
