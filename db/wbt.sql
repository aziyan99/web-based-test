-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2019 at 03:28 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `wbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` bigint(11) NOT NULL,
  `id_soal` bigint(11) NOT NULL,
  `id_user` bigint(11) NOT NULL,
  `id_kelas` bigint(20) NOT NULL,
  `id_mata_pelajaran` bigint(20) NOT NULL,
  `jawaban` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `id_soal`, `id_user`, `id_kelas`, `id_mata_pelajaran`, `jawaban`) VALUES
(1, 1575357371, 11, 1, 1, 'b'),
(2, 1575357451, 11, 1, 1, 'b'),
(3, 1575357507, 11, 1, 1, 'c'),
(4, 1575357585, 11, 1, 1, 'd'),
(5, 1575357643, 11, 1, 1, 'a'),
(6, 1575357706, 11, 1, 1, 'b'),
(7, 1575357764, 11, 1, 1, 'b'),
(8, 1575357845, 11, 1, 1, 'a'),
(9, 1575357936, 11, 1, 1, 'c'),
(10, 1575357996, 11, 1, 1, 'b'),
(11, 1575358067, 11, 1, 1, 'c'),
(12, 1575358154, 11, 1, 1, 'c'),
(13, 1575358217, 11, 1, 1, 'b');

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
(2, 'XI IPA'),
(3, 'XII IPA'),
(1575910765, 'XI IPS'),
(1575910773, 'XII IPS');

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
(1575183071, 'PPKN'),
(1575910835, 'Sosiologi'),
(1575910852, 'Geografi');

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
(17, 'Pengaturan Sekolah', 'fa fa-gears', 'pengaturan_sekolah', 1),
(18, 'Profile', 'fa fa-address-card', 'data_diri', 1),
(19, 'Keluar', 'fa fa-sign-out', 'auth/logout', 1);

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
(3, 1575357371, '&lt;p&gt;ini pembahasan&lt;/p&gt;'),
(4, 1575357451, '&lt;p&gt;ini pembahasan&lt;/p&gt;'),
(5, 1575357507, '&lt;p&gt;ini pembahasan&lt;/p&gt;'),
(6, 1575357585, ''),
(7, 1575357643, ''),
(8, 1575357706, ''),
(9, 1575357764, ''),
(10, 1575357845, ''),
(11, 1575357936, ''),
(12, 1575357996, ''),
(13, 1575358067, ''),
(14, 1575358154, ''),
(15, 1575358217, ''),
(16, 1575489362, ''),
(17, 1575490669, '');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama_sistem` varchar(255) NOT NULL,
  `nama_sekolah` varchar(180) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_sistem`, `nama_sekolah`, `alamat`) VALUES
(1, 'CI - WBT', 'SMA N 4 KUNDUR', 'Jalan Besar Pendidikan Layang Kobel KM 34 Kundur Barat');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` bigint(20) NOT NULL,
  `pengumuman` text NOT NULL,
  `tujuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profile_siswa`
--

CREATE TABLE `profile_siswa` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nis` bigint(20) NOT NULL,
  `id_kelas` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_siswa`
--

INSERT INTO `profile_siswa` (`id`, `id_user`, `nis`, `id_kelas`) VALUES
(2, 11, 12345, 1),
(3, 12, 12344, 1);

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
  `id_mata_pelajaran` bigint(20) NOT NULL,
  `id_kelas` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `soal`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `jawaban_e`, `jawaban_yang_benar`, `id_mata_pelajaran`, `id_kelas`) VALUES
(1575357371, '&lt;p&gt;Jenis pengembangan teks eksposisi yang rinciannya tergolong dalam suatu objek ke dalam bagian-bagian itu disebut jenis pengembangan &amp;hellip;.&lt;/p&gt;', 'definisi', 'verifikasi', 'klasifikasi', 'aktualisasi', 'analisis', 'c', 1, 1),
(1575357451, '&lt;p&gt;Sebuah karangan yang mengandung informasi atau pengetahuan disebut &amp;hellip;.&lt;/p&gt;', 'karangan teks eksposisi', 'karangan teks ilmiah', 'karangan teks skripsi', 'karangan teks penelitian', 'x', 'a', 1, 1),
(1575357507, '&lt;p&gt;Sebuah kata ganti orang yang dapat digunakan terutama pada saat pernyataan pendapat pribadi diungkapkan disebut &amp;hellip;.&lt;/p&gt;', 'leksial', 'klasikal', 'konjugsi', 'pronomina', 'pertamina', 'd', 1, 1),
(1575357585, '&lt;p&gt;Dalam jenis karangan teks eksposisi, terdapat jenis yang memiliki pengertian sebagai pemapar atau penjelas dari defini suatu topik tertentu disebut &amp;hellip;.&lt;/p&gt;', 'teks eksposisi proses', 'teks eksposisi definisi', 'teks eksposisi laporan', 'teks eksposisi ilustrasi', 'teks terserah (cewe)', 'b', 1, 1),
(1575357643, '&lt;p&gt;Berikut ini adalah struktur lain yang ada dalam teks laporan observasi, kecuali &amp;hellip;&lt;/p&gt;', 'definisi pembuka', 'definisi umum', 'definisi penutup', 'definisi bagian', 'definisi sifat kamu :v', 'a', 1, 1),
(1575357706, '&lt;p&gt;Tujuan dari teks laporan obeservasi adalah &amp;hellip;&lt;/p&gt;', 'Menemukan teknik atau cara terbaru', 'sebagai bahan penelitian ilmiah', 'mencari sampel masalah', 'jawaban a, b dan c benar semua', 'tidak ada jawaban benar karena soal salah', 'a', 1, 1),
(1575357764, '&lt;p&gt;Jenis-jenis kalimat yang biasa digunakan dalam pembuatan teks laporan hasil observasi, kecuali&amp;hellip;.&lt;/p&gt;', 'kalimat deskripsi', 'kalimat simple', 'kalimat kompleks', 'kalimat tanya', 'kalimat \"TERSERAH\"', 'd', 1, 1),
(1575357845, '&lt;p&gt;Bacalah teks berikut dengan cermat!&lt;/p&gt;\r\n\r\n&lt;p&gt;Air yang berasal dari laut dan tumbuhan dapat diuapkan oleh sinar matahari. Setelah diuapkan, hasil uapan tersebut akan naik keatas sehingga terjadinya penggumpalan uap air yang biasa disebut awan. Kemudia awan akan menurunkan air hujan dengan bantuan angin. Air yang turun kemudian akan diresap oleh tanah, sehingga sebagian ada yang menjadi cadangan dalam tanah dan sebagian lagi menuju permukaan laut. Kondisi ini terjadi berulang-ulang terus dengan cara yang sama.&lt;/p&gt;\r\n\r\n&lt;p&gt;Teks diatas adalah merupakan contoh dari teks &amp;hellip;.&lt;/p&gt;', 'teks deskripsi', 'teks laporan ilmiah', 'teks laporan observasi', 'teks laporan eksposisi', 'teks skripsi', 'd', 1, 1),
(1575357936, '&lt;p&gt;Salah satu fungsi dari hasil teks laporan obeservasi adalah &amp;hellip;.&lt;/p&gt;', 'merupakan pembukaan awal untuk mencari informasi', 'bukan sumber informasi utama', 'merupakan bahan untuk pendokumentasian', 'merupakan hasil analisis dari teks laporan', 'supaya keren dan cool', 'c', 1, 1),
(1575357996, '&lt;p&gt;Informasi yang dihadirkan dari hasil observasi dan analisis secara sistematis adalah &amp;hellip;.&lt;/p&gt;', 'teks observasi', 'teks definisi', 'teks kesimpulan', 'teks hasil laporan', 'cara memahami wanita ceunahh', 'd', 1, 1),
(1575358067, '&lt;p&gt;Dalam pembuatan teks laporan, kita harus memperhatikan salah satunya tentang aspek kebahasaan, seperti dalam penggunaan &amp;hellip;.&lt;/p&gt;', 'kelas kata', 'kalimat', 'hubungan antarkalimat', 'hubungan antarparagraf', 'bahasa tanpa kata \"TERSERAH\"', 'a', 1, 1),
(1575358154, '&lt;p&gt;Salah satu tujuan seorang penulis menggunakan tabel dalam tulisannya yaitu &amp;hellip;.&lt;/p&gt;', 'sebagai penerang bahwa kejadian benar-benar ada', 'sebagai penguat atas bukti bahwa peristiwa benar-benar terjadi', 'sebagai bahan untuk bisa meyakinkan suatu pendapat', 'sebagai gambaran suatu keadaan sebagaimana yang benar-benar terjadi', 'menghindari kalimat \"TERSERAH\" wanita', 'd', 1, 1),
(1575358217, '&lt;p&gt;Teks eksposisi dapat kita jumpai pada media-media salah satunya yaitu &amp;hellip;.&lt;/p&gt;', 'televisi', 'koran', 'radio', 'handphone', 'buaya darat yang selalu bilang, cuma ada kamu kok', 'b', 1, 1);

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
(11, 5, 'Raja Aizin', 'aizin@ezstore.com', '$2y$10$lpeTV95Sh3u26eTdbddoMO6Ci2T0Z0nXHyA05UYFEfx1m3a2IKEGO', 'default.png', 1575905213),
(12, 5, 'Raja wildhaatul Asthila', 'wildha@ezstore.com', '$2y$10$m7gduHl/08TB.kRMPArtn.l4uhduf2CzIxEiu7BbW5QtaUzMH7BeW', 'default.png', 1575911585);

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
(25, 2, 14),
(26, 2, 15),
(27, 5, 1),
(28, 5, 16),
(29, 1, 17),
(30, 5, 18),
(31, 1, 15),
(32, 2, 19),
(33, 5, 19),
(34, 1, 19),
(35, 2, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
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
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_siswa`
--
ALTER TABLE `profile_siswa`
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
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pembahasan`
--
ALTER TABLE `pembahasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_siswa`
--
ALTER TABLE `profile_siswa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;