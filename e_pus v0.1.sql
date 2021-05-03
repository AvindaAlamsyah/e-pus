-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2021 pada 08.25
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `level`) VALUES
(1, 'Super User', 'supersu', '$argon2i$v=19$m=65536,t=4,p=1$SXFDbHdXTjZ1by5NNUhVVg$fJTsH1PafLecFOYgMlk2260IM9BCiKwxvGSUWIHBbIM', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis` varchar(155) NOT NULL,
  `penerbit` varchar(155) NOT NULL,
  `tahun_terbit` char(4) NOT NULL,
  `level_buku` tinyint(1) NOT NULL,
  `tipe_buku` tinyint(1) NOT NULL,
  `link_buku` varchar(225) DEFAULT NULL,
  `nama_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`, `level_buku`, `tipe_buku`, `link_buku`, `nama_file`) VALUES
(8, 'GAMBAR TEKNIK MESIN', 'Z. Furqon, S. T.', 'ANDI', '2017', 1, 1, 'https://books.google.co.id/books?id=wPgoEAAAQBAJ&newbks=0&printsec=frontcover&dq=teknik+mesin&hl=en&source=newbks_fb&redir_esc=y#v=onepage&q&f=false', ''),
(9, 'SISTEM KONTROL ELEKTROMEKANIK DAN ELEKTRONIK', 'BSE Manohi', 'BSE Mahoni', '2015', 2, 1, 'https://bsd.pendidikan.id/data/2013/kelas_11smk/Kelas_11_SMK_Sistem_Kontrol_Elektro_Mekanik_Elektronik_1.pdf', ''),
(10, 'VIRUS VIRUS TERUS MENGGERUS', 'Weinata Sairin', 'Gramedia', '2020', 3, 1, 'https://ebooks.gramedia.com/books/virus-virus-terus-menggerus', ''),
(12, 'BUKU PANDUAN EPSON L120', 'Epson', 'Epson', '2014', 1, 0, '', 'a47cfbca12825da334c6f5e5153a.pdf'),
(13, 'GAMBAR TEKNIK', 'Kemendikbud', 'Kemendikbud', '2014', 2, 0, '', 'a343cd865d978e00f9e4b8378160.pdf'),
(14, 'BIOLOGI KELAS XII', 'Faidah Rachmawati', 'BSE', '2009', 3, 0, '', 'ae1177a4d886a7519b5eb52893a5.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nisn` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(155) NOT NULL,
  `kelas` tinytext NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nisn`, `password`, `nama_lengkap`, `kelas`, `jurusan`, `level`, `status`) VALUES
('0012345680', '$argon2i$v=19$m=65536,t=4,p=1$R3hFNVhKRnFYaXVFUWRZRQ$K+pK6syG1iuTtua8q+mBsBE1qNMVOa/plHrO5JkSiJ4', 'SARI PUJIWATI', 'X', 'Adm. Perkantoran', 1, 1),
('0012345681', '$argon2i$v=19$m=65536,t=4,p=1$c3ZSRkJFV3FPU2NYR210Vw$C8M3REJm1hVr5Z5Ox8sUbKe3j5UX261MYx/X7OyC5ek', 'ADAM AJI ASMORO', 'XI', 'Teknik Sepeda Motor', 2, 1),
('0084604092', '$argon2i$v=19$m=65536,t=4,p=1$UUh5SEVKb1F1RHVFcVRYZg$Om+6v8uoFfxOwR4Of8iwxeg3UhHgcK5vmWoKmEWRDHA', 'JULIANTI ISTIQOMAH', 'XII', 'Akuntansi', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_peminjaman_buku_idx` (`buku_id_buku`),
  ADD KEY `fk_peminjaman_user1_idx` (`user_nim`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_buku` FOREIGN KEY (`buku_id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
