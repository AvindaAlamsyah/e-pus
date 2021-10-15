-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Oct 15, 2021 at 03:55 AM
-- Server version: 8.0.25
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-pus_kosong`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id_book_type` int NOT NULL,
  `book_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id_buku` int NOT NULL,
  `kategori_id_kategori` int NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis` varchar(155) NOT NULL,
  `penerbit` varchar(155) NOT NULL,
  `tahun_terbit` char(4) NOT NULL,
  `level_buku` tinyint(1) NOT NULL,
  `stok` int NOT NULL,
  `cover` text,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nipd` varchar(50) DEFAULT NULL,
  `nama_guru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL COMMENT '0=tidak aktif, 1=aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `username`, `password`, `nipd`, `nama_guru`, `status`) VALUES
(1, 'demoguru', '$argon2i$v=19$m=65536,t=4,p=1$bTRuZk44OFU0by56dHRiNQ$OQnJA2wL7JH5NyyA/RAJOoRZxmEJt2TMSXGBN5ekfMA', NULL, 'Demo Guru', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guru_pinjam`
--

CREATE TABLE `guru_pinjam` (
  `guru_id_guru` int NOT NULL,
  `buku_id_buku` int NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pendidikan Agama'),
(2, 'Pendidikan Pancasila dan Kewarganegaraan'),
(3, 'Bahasa Indonesia'),
(4, 'Matematika'),
(5, 'Sejarah Indonesia'),
(6, 'Bahasa Inggris'),
(7, 'Seni Budaya'),
(8, 'Prakarya'),
(9, 'Pendidikan Jasmani dan Kesehatan'),
(10, 'Muatan Lokal Bahasa Jawa.'),
(11, 'TBSM'),
(12, 'TKJ'),
(13, 'AKL'),
(14, 'OTKP'),
(15, 'PBS'),
(16, 'Khusus');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` bigint NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `batas_tanggal_kembali` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `metode` varchar(11) NOT NULL,
  `buku_id_buku` int NOT NULL,
  `user_nisn` varchar(10) NOT NULL,
  `id_petugas` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `id_resource` bigint NOT NULL,
  `resource_id_buku` int NOT NULL,
  `resource_id_tipe` int NOT NULL,
  `source` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `ttd` text,
  `level` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nisn`, `password`, `nama_lengkap`, `kelas`, `jurusan`, `ttd`, `level`, `status`) VALUES
('demosiswa', '$argon2i$v=19$m=65536,t=4,p=1$UU9RUklSOWx5WGJnY3kxaQ$mfTA2NNojmhhFYY4XCI51lCdwoAKglFWrnMRbyJAwWE', 'Demo Siswa', 'X', 'TKR', 'tes', 1, 1);

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
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `guru_pinjam`
--
ALTER TABLE `guru_pinjam`
  ADD KEY `FK_GURU_BUKU` (`guru_id_guru`),
  ADD KEY `FK_GURU_BUKU2` (`buku_id_buku`);

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
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_type`
--
ALTER TABLE `book_type`
  MODIFY `id_book_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `id_resource` bigint NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori_id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru_pinjam`
--
ALTER TABLE `guru_pinjam`
  ADD CONSTRAINT `FK_GURU_BUKU` FOREIGN KEY (`guru_id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `FK_GURU_BUKU2` FOREIGN KEY (`buku_id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_buku` FOREIGN KEY (`buku_id_buku`) REFERENCES `buku` (`id_buku`),
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
