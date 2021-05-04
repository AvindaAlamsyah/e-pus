-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 10:42 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_pus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `level`) VALUES
(1, 'Super User', 'supersu', '$argon2i$v=19$m=65536,t=4,p=1$SXFDbHdXTjZ1by5NNUhVVg$fJTsH1PafLecFOYgMlk2260IM9BCiKwxvGSUWIHBbIM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_type`
--

CREATE TABLE `book_type` (
  `id_book_type` int(11) NOT NULL,
  `book_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_type`
--

INSERT INTO `book_type` (`id_book_type`, `book_type_name`) VALUES
(1, 'E-book'),
(2, 'Link'),
(3, 'Audio'),
(4, 'Video'),
(5, 'Book');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis` varchar(155) NOT NULL,
  `penerbit` varchar(155) NOT NULL,
  `tahun_terbit` char(4) NOT NULL,
  `level_buku` tinyint(1) NOT NULL,
  `stok` int(11) NOT NULL,
  `cover` text DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`, `level_buku`, `stok`, `cover`, `deleted_at`) VALUES
(8, 'GAMBAR TEKNIK MESIN', 'Z. Furqon, S. T.', 'ANDI', '2017', 1, 0, NULL, NULL),
(9, 'SISTEM KONTROL ELEKTROMEKANIK DAN ELEKTRONIK', 'BSE Manohi', 'BSE Mahoni', '2015', 2, 0, NULL, NULL),
(10, 'VIRUS VIRUS TERUS MENGGERUS', 'Weinata Sairin', 'Gramedia', '2020', 3, 0, NULL, NULL),
(12, 'BUKU PANDUAN EPSON L120', 'Epson', 'Epson', '2014', 1, 0, NULL, NULL),
(13, 'GAMBAR TEKNIK', 'Kemendikbud', 'Kemendikbud', '2014', 2, 0, NULL, NULL),
(14, 'BIOLOGI KELAS XII', 'Faidah Rachmawati', 'BSE', '2009', 3, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `buku_id_buku` int(11) NOT NULL,
  `user_nim` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `id_resource` bigint(11) NOT NULL,
  `resource_id_buku` int(11) NOT NULL,
  `resource_id_tipe` int(11) NOT NULL,
  `source` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nisn` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(155) NOT NULL,
  `kelas` tinytext NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `ttd` text DEFAULT NULL,
  `level` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nisn`, `password`, `nama_lengkap`, `kelas`, `jurusan`, `tanda_tangan`, `level`, `status`) VALUES
('0012345680', '$argon2i$v=19$m=65536,t=4,p=1$R3hFNVhKRnFYaXVFUWRZRQ$K+pK6syG1iuTtua8q+mBsBE1qNMVOa/plHrO5JkSiJ4', 'SARI PUJIWATI', 'X', 'Adm. Perkantoran', NULL, 1, 1),
('0012345681', '$argon2i$v=19$m=65536,t=4,p=1$c3ZSRkJFV3FPU2NYR210Vw$C8M3REJm1hVr5Z5Ox8sUbKe3j5UX261MYx/X7OyC5ek', 'ADAM AJI ASMORO', 'XI', 'Teknik Sepeda Motor', NULL, 2, 1),
('0084604092', '$argon2i$v=19$m=65536,t=4,p=1$UUh5SEVKb1F1RHVFcVRYZg$Om+6v8uoFfxOwR4Of8iwxeg3UhHgcK5vmWoKmEWRDHA', 'JULIANTI ISTIQOMAH', 'XII', 'Akuntansi', NULL, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `book_type`
--
ALTER TABLE `book_type`
  ADD PRIMARY KEY (`id_book_type`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_peminjaman_buku_idx` (`buku_id_buku`),
  ADD KEY `fk_peminjaman_user1_idx` (`user_nim`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`id_resource`),
  ADD KEY `resource_id_buku` (`resource_id_buku`),
  ADD KEY `resource_id_tipe` (`resource_id_tipe`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_type`
--
ALTER TABLE `book_type`
  MODIFY `id_book_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `id_resource` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_buku` FOREIGN KEY (`buku_id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `resource`
--
ALTER TABLE `resource`
  ADD CONSTRAINT `resource_ibfk_1` FOREIGN KEY (`resource_id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resource_ibfk_2` FOREIGN KEY (`resource_id_tipe`) REFERENCES `book_type` (`id_book_type`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
