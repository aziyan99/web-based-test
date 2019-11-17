-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2019 at 07:30 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.3.7-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rt`
--

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
(5, 'Pengaturan', 'fa fa-gear', 'pengaturan', 1),
(6, 'Hak Akses', 'fa fa-shield', 'role', 1),
(7, 'Hak Akses Menu', 'fa fa-th-list', 'access', 1),
(13, 'Data Penduduk', 'fa fa-circle-o', 'penduduk', 1);

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
(1, 'SIM-RT');

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
(2, 'Petugas');

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
(4, 1, 'admin', 'admin@admin.com', '$2y$10$wKPD3q3p4zhQrISUcHfRTeSLPQY9VyvQxilWMTxEG9MzzessAFK9O', 'images.png', 1562505744),
(8, 2, 'petugas', 'petugas@petugas.com', '$2y$10$oAdBYej2nXsqqoI8aEXL/OWlsguZCf0Cuh7tV.OMTXUV/QCAMfdAa', 'default.png', 1563071177);

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
(21, 1, 13),
(22, 2, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
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
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
