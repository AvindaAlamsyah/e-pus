-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 05:07 AM
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
(1, 'Super User', 'supersu', '$argon2i$v=19$m=65536,t=4,p=1$SXFDbHdXTjZ1by5NNUhVVg$fJTsH1PafLecFOYgMlk2260IM9BCiKwxvGSUWIHBbIM', 0),
(2, '2', '2', '$argon2i$v=19$m=65536,t=4,p=1$WWJRWmVudUxZMnFOWG45dQ$4AV+gNhLR+gR/iwxRg/LZp/iUSU58z1oEeWFYHC63H0', 1);

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
  `kategori_id_kategori` int(11) NOT NULL,
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

INSERT INTO `buku` (`id_buku`, `kategori_id_kategori`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`, `level_buku`, `stok`, `cover`, `deleted_at`) VALUES
(60, 1, 'GAMBAR TEKNIK MESIN', 'Z. Furqon, S. T.', 'ANDI', '2017', 1, 10, 'fc7c8d91a0971cc249e52c92d34b.png', NULL),
(62, 1, 'ebook', 'Z. Furqon, S. T.', 'ANDI', '2017', 1, 10, '8298c182941d39d22b9a9a7bed90.jpg', NULL),
(63, 1, 'buku', 'Z. Furqon, S. T.', 'ANDI', '2017', 1, 10, '02fee466fa00c55dc16834116718.jpg', NULL),
(64, 1, 'ebook-audio', 'Z. Furqon, S. T.', 'ANDI', '2017', 1, 10, '0ea1480dc153ffcd12b73244b5fe.jpg', NULL),
(65, 1, 'audio', 'Z. Furqon, S. T.', 'ANDI', '2017', 1, 10, 'cf085f63419b5d8328e16c8a2a65.jpg', NULL),
(66, 1, 'video', 'Z. Furqon, S. T.', 'ANDI', '2017', 1, 10, 'a3a5fc45d9dde2f76d1ab54da76b.jpg', NULL),
(67, 1, 'link', 'Z. Furqon, S. T.', 'ANDI', '2017', 1, 10, '9fb8f3d5fe9a42a627817e2115de.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` bigint(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `batas_tanggal_kembali` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `metode` varchar(11) NOT NULL,
  `buku_id_buku` int(11) NOT NULL,
  `user_nisn` varchar(10) NOT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_pinjam`, `batas_tanggal_kembali`, `tanggal_kembali`, `metode`, `buku_id_buku`, `user_nisn`, `id_petugas`) VALUES
(1, '2021-04-08', '2021-05-06', '2021-05-19', 'online', 62, '0012345680', NULL),
(2, '2021-05-03', '2021-05-15', '2021-05-11', 'offline', 63, '0012345681', NULL),
(3, '2021-03-04', '2021-05-15', '2021-05-27', 'online', 64, '0084604092', NULL),
(4, '2021-01-08', '2021-05-15', '2021-05-27', 'online', 65, '0084604092', NULL),
(5, '2020-12-08', '2021-05-15', '2021-05-27', 'online', 66, '0084604092', NULL),
(6, '2020-11-08', '2021-05-15', '2021-05-27', 'online', 67, '0084604092', NULL),
(9, '2020-10-11', '2021-05-18', '2021-05-27', 'online', 64, '0084604092', NULL),
(10, '2020-09-11', '2021-05-18', '2021-05-11', 'offline', 63, '0084604092', NULL),
(11, '2020-08-11', '2021-05-18', '2021-05-27', 'online', 65, '0084604092', NULL),
(12, '2020-07-11', '2021-05-18', '2021-05-27', 'online', 66, '0084604092', NULL),
(13, '2020-06-11', '2021-05-18', '2021-05-27', 'online', 67, '0084604092', NULL),
(14, '2020-05-11', '2021-05-18', '2021-05-27', 'online', 60, '0084604092', NULL),
(15, '2021-05-08', '2021-05-10', '2021-05-11', 'offline', 63, '0084604092', NULL),
(16, '2021-05-11', '2021-05-18', '2021-05-27', 'online', 62, '0084604092', NULL),
(17, '2021-05-25', '2021-06-01', '2021-05-25', 'online', 60, '0012345680', NULL),
(18, '2021-05-25', '2021-06-01', '2021-05-25', 'online', 63, '0012345680', NULL),
(19, '2021-05-25', '2021-06-01', '2021-06-01', 'online', 62, '0012345680', NULL),
(20, '2021-05-25', '2021-06-01', NULL, 'online', 64, '0012345680', NULL),
(21, '2021-05-25', '2021-06-01', NULL, 'online', 65, '0012345680', NULL),
(22, '2021-05-25', '2021-06-01', '2021-05-25', 'online', 66, '0012345680', NULL),
(23, '2021-05-25', '2021-06-01', NULL, 'online', 67, '0012345680', NULL),
(24, '2021-05-25', '2021-06-01', NULL, 'online', 66, '0012345680', NULL),
(25, '2021-06-01', '2021-06-08', NULL, 'online', 63, '0012345680', NULL);

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

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`id_resource`, `resource_id_buku`, `resource_id_tipe`, `source`) VALUES
(59, 60, 1, '230341ab54c909a3eccf8f8bdcaa.pdf'),
(60, 60, 3, 'e3ba9b2c66168c2ca984fc459e5b.mp3'),
(69, 62, 1, 'd6c3ce4161cdabd9020f9187381b.pdf'),
(70, 63, 5, 'f76734fc79dc2502f44cf5cb5df2.pdf'),
(71, 64, 1, 'dd01231d65ff727ef099308dbbae.pdf'),
(72, 64, 3, '0a81019dab95e8efb22380a39221.mp3'),
(73, 65, 3, '5ccd6baa94dbb73777c9a8272b67.mp3'),
(74, 66, 4, '0006f437549d5ecb957b158e3e13.mp4'),
(75, 67, 2, 'https://stackoverflow.com/questions/2184513/change-the-maximum-upload-file-size');

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

INSERT INTO `user` (`nisn`, `password`, `nama_lengkap`, `kelas`, `jurusan`, `ttd`, `level`, `status`) VALUES
('0012345680', '$argon2i$v=19$m=65536,t=4,p=1$R3hFNVhKRnFYaXVFUWRZRQ$K+pK6syG1iuTtua8q+mBsBE1qNMVOa/plHrO5JkSiJ4', 'SARI PUJIWATI', 'X', 'Adm. Perkantoran', '0012345680.png', 1, 1),
('0012345681', '$argon2i$v=19$m=65536,t=4,p=1$c3ZSRkJFV3FPU2NYR210Vw$C8M3REJm1hVr5Z5Ox8sUbKe3j5UX261MYx/X7OyC5ek', 'ADAM AJI ASMORO', 'XI', 'Teknik Sepeda Motor', NULL, 2, 1),
('0012345682', '$argon2i$v=19$m=65536,t=4,p=1$SFM1elBvZVZtd3JWclcuNQ$+ul8imJ6+BLQqH8BxIg1Guv8Um+BNGIQWH/yo8BBlZU', 'SARI PUJIWATI', 'X', 'Adm. Perkantoran', NULL, 1, 1),
('0012345683', '$argon2i$v=19$m=65536,t=4,p=1$VUhZbWxqOUNXOHVDTlVPZw$TiK1lU/ugNJ0h5v5RueCHq4Xt5lTRt0aGa5cnUBE7+4', 'SARI PUJIWATI', 'X', 'Adm. Perkantoran', NULL, 1, 1),
('0012345684', '$argon2i$v=19$m=65536,t=4,p=1$THJzTWo4Y08zMUZrSUxoOA$hRNi97wv3quT5m0DjZV1nnmE00o2592qSUzwdDaZxlA', 'SARI PUJIWATI', 'X', 'Adm. Perkantoran', NULL, 1, 1),
('0012345685', '$argon2i$v=19$m=65536,t=4,p=1$NDhacTlnRi8yNFM0R2Fseg$Ty+n0YF85d9m0/jBY/EK7nuBolMj9B/kPKfxQs68utA', 'SARI PUJIWATI', 'X', 'Adm. Perkantoran', NULL, 1, 1),
('0012345686', '$argon2i$v=19$m=65536,t=4,p=1$aEtlWkpGWno1VE9lQzluSg$g+AKPBYR7w6Np8/nB8LJ9LlWy3jBKufOvQrkZqoVzWU', 'SARI PUJIWATI', 'XI', 'Adm. Perkantoran', NULL, 2, 1),
('0012345687', '$argon2i$v=19$m=65536,t=4,p=1$RU1ETmczR2Q4TUpuOUxwbw$r2Vt53iY0Nf0SSUhJ8NilNSKRa49ckW/oa7/2QA2xnI', 'SARI PUJIWATI', 'XI', 'Adm. Perkantoran', NULL, 2, 1),
('0012345688', '$argon2i$v=19$m=65536,t=4,p=1$R0ROeElDREl3RTFxNnpDeg$ohC3WllRnjodMztq72XxzMSFZEPZln/oESlmTwkXIG0', 'SARI PUJIWATI', 'XI', 'Adm. Perkantoran', NULL, 2, 1),
('0012345689', '$argon2i$v=19$m=65536,t=4,p=1$bDVHY0FubUw2YWVSbzBSRg$D16rFiYbQQcplz5r22x2YS/S0KBU4DVJkMb5v2D8ghE', 'SARI PUJIWATI', 'XI', 'Adm. Perkantoran', NULL, 2, 1),
('0012345690', '$argon2i$v=19$m=65536,t=4,p=1$ZVlDZElyTi5hRTBVUmdSSA$hk0Z6AzwdDcbRdY1+0Hv/WaBHaaEtYvjUPF4NXqdgEE', 'SARI PUJIWATI', 'XI', 'Adm. Perkantoran', NULL, 2, 1),
('0012345691', '$argon2i$v=19$m=65536,t=4,p=1$VUFzc2FRVklsSEd4OTlxSA$aKC1CStWILl0/qduphKNU2Hsac+HfiIt0BuXwW31kVQ', 'SARI PUJIWATI', 'XI', 'Adm. Perkantoran', NULL, 2, 1),
('0012345692', '$argon2i$v=19$m=65536,t=4,p=1$WlF4OUJJdTRhOUFQeHNrbw$HAHZDlx2xE6GgIE7GlfxbYNN0YqEcGXUvnmIE5sqFZ8', 'SARI PUJIWATI', 'XI', 'Adm. Perkantoran', NULL, 2, 1),
('0012345693', '$argon2i$v=19$m=65536,t=4,p=1$cWt1M2pyTjhvSTNBamx5TQ$tM6bSd3tWRJcs30Q2McxhwK3rPBlybNDOfQ5EXVHfvM', 'SARI PUJIWATI', 'XII', 'Adm. Perkantoran', NULL, 3, 1),
('0012345694', '$argon2i$v=19$m=65536,t=4,p=1$Zk5iSm0zTGVUNDFyc2JXZg$SyKwtE9A1lrD3OQy5T7gzSLEEc8YyGXrci2SQ8QdwGE', 'SARI PUJIWATI', 'XII', 'Adm. Perkantoran', NULL, 3, 1),
('0012345695', '$argon2i$v=19$m=65536,t=4,p=1$bDhVcWUxdDJJdGVNZGdQdQ$allnUnCYkDsMRa78x69bzvNimKUGVDoElP9bQgsN5F0', 'SARI PUJIWATI', 'XII', 'Adm. Perkantoran', NULL, 3, 1),
('0012345696', '$argon2i$v=19$m=65536,t=4,p=1$dHJwR2lMNzBLbm54VmpTUA$mUmooAoRqq72f9mzhLzstwxpBkx6ZsOufFkCOl+efpw', 'SARI PUJIWATI', 'XII', 'Adm. Perkantoran', NULL, 3, 1),
('0012345697', '$argon2i$v=19$m=65536,t=4,p=1$R0I4WmI1ZXFoWXVGeGZZWQ$vElhijTAdkj6ZueiHYWO1lk+6IHDxCf2B6NtnkRnOHg', 'SARI PUJIWATI', 'XII', 'Adm. Perkantoran', NULL, 3, 1),
('0012345698', '$argon2i$v=19$m=65536,t=4,p=1$Ynp3c3NlUFlkMDNuVnhPQw$jSyxMTxNnJN7HE9CEyvh1fZRuLMfFsu+D0h+UJaviDU', 'SARI PUJIWATI', 'XII', 'Adm. Perkantoran', NULL, 3, 1),
('0012345699', '$argon2i$v=19$m=65536,t=4,p=1$ei53V1FPQWNSelV5RHFJMg$rYJE6v7swk0JDQu3X6wtpMjyx+t9kHbvpPXVEMsxpbU', 'SARI PUJIWATI', 'XII', 'Adm. Perkantoran', NULL, 3, 1),
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
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `kategori_id_kategori` (`kategori_id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_peminjaman_buku_idx` (`buku_id_buku`),
  ADD KEY `user_nisn` (`user_nisn`),
  ADD KEY `id_petugas` (`id_petugas`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_type`
--
ALTER TABLE `book_type`
  MODIFY `id_book_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `id_resource` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori_id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_buku` FOREIGN KEY (`buku_id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`user_nisn`) REFERENCES `user` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

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
