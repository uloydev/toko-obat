-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2021 pada 15.13
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_obat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_obat`
--

CREATE TABLE `data_obat` (
  `kode_obat` varchar(20) NOT NULL,
  `nama_obat` char(20) NOT NULL,
  `bentuk_obat` char(10) NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `harga` varchar(30) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_obat`
--

INSERT INTO `data_obat` (`kode_obat`, `nama_obat`, `bentuk_obat`, `tanggal_produksi`, `tanggal_kadaluarsa`, `harga`, `id_obat`) VALUES
('KPRNS1723', 'RHINNOS', 'KAPLET', '2017-02-02', '2023-01-31', 'Rp.45.000', 4),
('SLMNZ1520', 'MICONAZOLE', 'SALEP', '2015-09-15', '2020-12-09', 'Rp.18.000', 1),
('SRSCF1723', 'SUCRALFATE', 'SYRUP', '2017-03-23', '2023-03-20', 'Rp.62.500', 2),
('SRZNP1723', 'ZINCPRO', 'SYRUP', '2017-02-02', '2023-01-31', 'Rp.15.000', 3),
('TBALD1723', 'AMLODIPINE', 'TABLET', '2017-02-02', '2023-01-31', 'Rp.51.000', 5);

--
-- Trigger `data_obat`
--
DELIMITER $$
CREATE TRIGGER `update_harga` BEFORE UPDATE ON `data_obat` FOR EACH ROW BEGIN
    INSERT INTO log_harga
    set kode_obat = OLD.kode_obat,
    harga_baru=new.harga,
    harga_lama=old.harga,
    waktu_perubahan = NOW(); 
END
$$
DELIMITER ;


-- --------------------------------------------------------

--
-- Struktur dari tabel `log_harga`
--

CREATE TABLE `log_harga` (
  `log_id` int(11) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `harga_lama` varchar(30) NOT NULL,
  `harga_baru` varchar(30) NOT NULL,
  `waktu_perubahan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_stok_obat`
--

CREATE TABLE `log_stok_obat` (
  `log_id` int(11) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `jumlah_lama` varchar(100) NOT NULL,
  `jumlah_baru` varchar(100) NOT NULL,
  `waktu_perubahan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_obat`
--

CREATE TABLE `stok_obat` (
  `id_obat` int(11) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Trigger `stok`
--
DELIMITER $$
CREATE TRIGGER `update_stok` BEFORE UPDATE ON `stok_obat` FOR EACH ROW BEGIN
    INSERT INTO log_stok_obat
    set kode_obat = OLD.kode_obat,
    jumlah_baru=new.jumlah,
    jumlah_lama=old.jumlah,
    waktu_perubahan = NOW(); 
END
$$
DELIMITER ;


--
-- Dumping data untuk tabel `stok_obat`
--

INSERT INTO `stok_obat` (`id_obat`, `kode_obat`, `jumlah`) VALUES
(1, 'SLMNZ1520', '100'),
(2, 'SRSCF1723', '100'),
(3, 'SRZNP1723', '100'),
(4, 'KPRNS1723', '100'),
(5, 'TBALD1723', '100');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `log_harga`
--
ALTER TABLE `log_harga`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `log_stok_obat`
--
ALTER TABLE `log_stok_obat`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `stok_obat`
--
ALTER TABLE `stok_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_harga`
--
ALTER TABLE `log_harga`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_stok_obat`
--
ALTER TABLE `log_stok_obat`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stok_obat`
--
ALTER TABLE `stok_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
