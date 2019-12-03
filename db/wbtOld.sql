-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2019 at 07:04 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses_soal`
--

CREATE TABLE `akses_soal` (
  `id` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mata_pelajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_siswa`
--

CREATE TABLE `jawaban_siswa` (
  `id` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jawaban` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) NOT NULL,
  `nama_kelas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` bigint(20) NOT NULL,
  `nama_mapel` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `nama_mapel`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Matematika'),
(4, 'Agama Islam'),
(1575173205, 'Fisika'),
(1575173214, 'Kimia'),
(1575183071, 'PPKN');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `icon`, `url`, `is_active`) VALUES
(1, 'Dashboard', 'fa fa-tachometer', 'dashboard', 1),
(2, 'Pengguna', 'fa fa-users', 'users', 1),
(4, 'Menu', 'fa fa-navicon', 'menu', 1),
(5, 'Pengaturan Sistem', 'fa fa-gear', 'pengaturan', 1),
(6, 'Hak Akses', 'fa fa-shield', 'role', 1),
(7, 'Hak Akses Menu', 'fa fa-th-list', 'access', 1),
(14, 'Soal dan Pembahasan', 'fa fa-book', 'soal', 1),
(15, 'Hasil', 'fa fa-check', 'hasil', 1),
(16, 'Soal', 'fa fa-check', 'latihan', 1),
(17, 'Pengaturan Sekolah', 'fa fa-gears', 'pengaturan_sekolah', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembahasan`
--

CREATE TABLE `pembahasan` (
  `id` int(11) NOT NULL,
  `id_soal` bigint(20) NOT NULL,
  `pembahasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembahasan`
--

INSERT INTO `pembahasan` (`id`, `id_soal`, `pembahasan`) VALUES
(1, 1574656936, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed velit diam, semper ut gravida ut, luctus in est. In hac habitasse platea dictumst. Mauris nec molestie leo, non molestie mauris. Suspendisse eget quam urna. Sed non risus et leo commodo fringilla. Etiam id lacinia enim. In pharetra vel justo eget blandit. Vivamus eu tempor felis. Vestibulum commodo ligula viverra neque tempor, vitae accumsan dolor tristique. Mauris suscipit mi lacus, vel fermentum metus bibendum ullamcorper.&lt;/p&gt;'),
(2, 1574657081, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed velit diam, semper ut gravida ut, luctus in est. In hac habitasse platea dictumst. Mauris nec molestie leo, non molestie mauris. Suspendisse eget quam urna. Sed non risus et leo commodo fringilla. Etiam id lacinia enim. In pharetra vel justo eget blandit. Vivamus eu tempor felis. Vestibulum commodo ligula viverra neque tempor, vitae accumsan dolor tristique. Mauris suscipit mi lacus, vel fermentum metus bibendum ullamcorper.&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama_sistem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_sistem`) VALUES
(1, 'CI - WBT');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Tenaga pengajar'),
(5, 'Pelajar');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` bigint(20) NOT NULL,
  `soal` text NOT NULL,
  `jawaban_a` varchar(255) NOT NULL,
  `jawaban_b` varchar(255) NOT NULL,
  `jawaban_c` varchar(255) NOT NULL,
  `jawaban_d` varchar(255) NOT NULL,
  `jawaban_e` varchar(255) NOT NULL,
  `jawaban_yang_benar` varchar(2) NOT NULL,
  `id_mata_pelajaran` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `soal`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `jawaban_e`, `jawaban_yang_benar`, `id_mata_pelajaran`, `id_kelas`) VALUES
(1574656936, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed velit diam, semper ut gravida ut, luctus in est. In hac habitasse platea dictumst. Mauris nec molestie leo, non molestie mauris. Suspendisse eget quam urna. Sed non risus et leo commodo fringilla. Etiam id lacinia enim. In pharetra vel justo eget blandit. Vivamus eu tempor felis. Vestibulum commodo ligula viverra neque tempor, vitae accumsan dolor tristique. Mauris suscipit mi lacus, vel fermentum metus bibendum ullamcorper.&lt;/p&gt;', 'a', 's', 'bx', 's', 'tidak', 'b', 1575183071, 1),
(1574657081, '&lt;p&gt;soal lagi&lt;/p&gt;', 'asd', 'tidak', 'dsfsd', 'iyaa', 'semua benar', 'b', 1575173214, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `nama`, `email`, `password`, `img`, `date_created`) VALUES
(4, 1, 'Raja Azian', 'admin@admin.com', '$2y$10$wKPD3q3p4zhQrISUcHfRTeSLPQY9VyvQxilWMTxEG9MzzessAFK9O', 'images.png', 1562505744),
(8, 2, 'Lilis Riskha Agustini', 'petugas@petugas.com', '$2y$10$oAdBYej2nXsqqoI8aEXL/OWlsguZCf0Cuh7tV.OMTXUV/QCAMfdAa', '96628.jpg', 1563071177),
(10, 5, 'siswa', 'siswa@siswa.com', '$2y$10$Q/tSuSf3FRg75VXhHWAkl.P9RXei3p8M0c/RnxBD5q2vyvQZAqDgi', 'default.png', 1574666306);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 1, 4),
(4, 3, 1),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(11, 1, 2),
(20, 2, 1),
(23, 1, 14),
(24, 1, 15),
(25, 2, 14),
(26, 2, 15),
(27, 5, 1),
(28, 5, 16),
(29, 1, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses_soal`
--
ALTER TABLE `akses_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembahasan`
--
ALTER TABLE `pembahasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses_soal`
--
ALTER TABLE `akses_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pembahasan`
--
ALTER TABLE `pembahasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
