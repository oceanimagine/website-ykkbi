-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 08, 2021 at 12:52 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_ykkbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nomor_karyawan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nama_lengkap`, `nomor_karyawan`, `username`, `password`, `timestamp`) VALUES
(1, 'Ikhsan Bahar', '768', 'ikhsan', 'ikhsan', '2021-12-08 09:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `isi_artikel` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel_kategori`
--

CREATE TABLE `tbl_artikel_kategori` (
  `id` int(11) NOT NULL,
  `judul_kategori` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel_label`
--

CREATE TABLE `tbl_artikel_label` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `nama_label` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel_tag`
--

CREATE TABLE `tbl_artikel_tag` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `nama_tag` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hubungi_kami`
--

CREATE TABLE `tbl_hubungi_kami` (
  `id` int(11) NOT NULL,
  `nama_lengkap_pengirim` varchar(200) NOT NULL,
  `email_pengirim` varchar(200) NOT NULL,
  `isi_pesan_pengirim` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `module` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `nama_menu`, `parent_id`, `module`) VALUES
(1, 'Pengguna', 0, '#'),
(2, 'Admin Web', 1, 'user_admin_web'),
(3, 'Pengguna Web', 1, 'user_pengguna_web'),
(4, 'Konten', 0, '#'),
(5, 'Artikel', 4, '#'),
(6, 'Video', 4, '#'),
(7, 'Kategori', 5, 'artikel_kategori'),
(8, 'List Artikel', 5, 'artikel_list'),
(9, 'Kategori', 6, 'video_kategori'),
(10, 'List Video', 6, 'video_list'),
(11, 'Tentang', 0, '#'),
(12, 'List Tentang', 11, 'tentang_list'),
(13, 'Usaha Penunjang', 11, 'tentang_usaha_penunjang'),
(14, 'Program', 0, '#'),
(15, 'Kategori', 14, 'program_kategori_induk'),
(16, 'Kategori Sub', 14, 'program_kategori_sub'),
(17, 'Daftar Isi', 14, 'program_daftar_isi'),
(18, 'Detail Isi', 14, 'program_detail_isi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_privilege`
--

CREATE TABLE `tbl_menu_privilege` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program_daftar_isi`
--

CREATE TABLE `tbl_program_daftar_isi` (
  `id` int(11) NOT NULL,
  `id_kategori_sub` int(11) NOT NULL,
  `judul_daftar_isi` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program_detail_isi`
--

CREATE TABLE `tbl_program_detail_isi` (
  `id` int(11) NOT NULL,
  `id_daftar_isi` int(11) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program_kategori_induk`
--

CREATE TABLE `tbl_program_kategori_induk` (
  `id` int(11) NOT NULL,
  `judul_kategori` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program_kategori_sub`
--

CREATE TABLE `tbl_program_kategori_sub` (
  `id` int(11) NOT NULL,
  `id_kategori_induk` int(11) NOT NULL,
  `judul_kategori_sub` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tentang`
--

CREATE TABLE `tbl_tentang` (
  `id` int(11) NOT NULL,
  `kategori_tentang` enum('kegiatan','pengertian umum') NOT NULL,
  `judul_tentang` varchar(100) NOT NULL,
  `isi_tentang` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tentang_usaha_penunjang`
--

CREATE TABLE `tbl_tentang_usaha_penunjang` (
  `id` int(11) NOT NULL,
  `nama_usaha` varchar(100) NOT NULL,
  `link_usaha` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_link_youtube` varchar(20) NOT NULL,
  `judul_video` varchar(100) NOT NULL,
  `deskripsi_singkat` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video_kategori`
--

CREATE TABLE `tbl_video_kategori` (
  `id` int(11) NOT NULL,
  `judul_kategori` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video_label`
--

CREATE TABLE `tbl_video_label` (
  `id` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `nama_label` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video_tag`
--

CREATE TABLE `tbl_video_tag` (
  `id` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `nama_tag` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_artikel_kategori`
--
ALTER TABLE `tbl_artikel_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_artikel_label`
--
ALTER TABLE `tbl_artikel_label`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_artikel_tag`
--
ALTER TABLE `tbl_artikel_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hubungi_kami`
--
ALTER TABLE `tbl_hubungi_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_privilege`
--
ALTER TABLE `tbl_menu_privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_program_detail_isi`
--
ALTER TABLE `tbl_program_detail_isi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_program_kategori_induk`
--
ALTER TABLE `tbl_program_kategori_induk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_program_kategori_sub`
--
ALTER TABLE `tbl_program_kategori_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tentang`
--
ALTER TABLE `tbl_tentang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tentang_usaha_penunjang`
--
ALTER TABLE `tbl_tentang_usaha_penunjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video_kategori`
--
ALTER TABLE `tbl_video_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video_label`
--
ALTER TABLE `tbl_video_label`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video_tag`
--
ALTER TABLE `tbl_video_tag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_artikel_kategori`
--
ALTER TABLE `tbl_artikel_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_artikel_label`
--
ALTER TABLE `tbl_artikel_label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_artikel_tag`
--
ALTER TABLE `tbl_artikel_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_hubungi_kami`
--
ALTER TABLE `tbl_hubungi_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_menu_privilege`
--
ALTER TABLE `tbl_menu_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_program_detail_isi`
--
ALTER TABLE `tbl_program_detail_isi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_program_kategori_induk`
--
ALTER TABLE `tbl_program_kategori_induk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_program_kategori_sub`
--
ALTER TABLE `tbl_program_kategori_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tentang`
--
ALTER TABLE `tbl_tentang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tentang_usaha_penunjang`
--
ALTER TABLE `tbl_tentang_usaha_penunjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_video_kategori`
--
ALTER TABLE `tbl_video_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_video_label`
--
ALTER TABLE `tbl_video_label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_video_tag`
--
ALTER TABLE `tbl_video_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
