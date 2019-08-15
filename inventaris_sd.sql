-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2019 pada 04.59
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_sd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_jenis_buku` int(11) NOT NULL,
  `id_sumber_dana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `tahun`, `id_jenis_buku`, `id_sumber_dana`) VALUES
(1, 'matematika', 2012, 1, 1),
(3, 'ips', 2019, 1, 3),
(4, 'dgere', 2011, 1, 3),
(5, 'ergerg kk', 2016, 4, 3),
(6, 'zxcvbnm', 2015, 1, 1),
(7, 'agama islam', 2018, 1, 3),
(11, 'IQBAL', 2012, 4, 3),
(12, 'qqqwerasd', 2015, 1, 3),
(13, 'efwfew', 2017, 1, 3),
(14, 'efewf', 2010, 1, 3),
(15, 'qwweq', 2010, 1, 3),
(16, 'ips kelas 5', 2012, 1, 3),
(17, 'mtk 2019', 2019, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_buku`
--

CREATE TABLE `jenis_buku` (
  `id_jenis_buku` int(11) NOT NULL,
  `nama_jenis_buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_buku`
--

INSERT INTO `jenis_buku` (`id_jenis_buku`, `nama_jenis_buku`) VALUES
(1, 'bantuan'),
(4, 'buku guru'),
(5, 'PANJI SANG PETUALANG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber_dana`
--

CREATE TABLE `sumber_dana` (
  `id_sumber_dana` int(11) NOT NULL,
  `nama_sumber_dana` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sumber_dana`
--

INSERT INTO `sumber_dana` (`id_sumber_dana`, `nama_sumber_dana`) VALUES
(1, 'bos'),
(3, '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `jenis_buku`
--
ALTER TABLE `jenis_buku`
  ADD PRIMARY KEY (`id_jenis_buku`);

--
-- Indeks untuk tabel `sumber_dana`
--
ALTER TABLE `sumber_dana`
  ADD PRIMARY KEY (`id_sumber_dana`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jenis_buku`
--
ALTER TABLE `jenis_buku`
  MODIFY `id_jenis_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sumber_dana`
--
ALTER TABLE `sumber_dana`
  MODIFY `id_sumber_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
