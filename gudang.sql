-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Jan 2017 pada 15.20
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jml_normal` int(20) NOT NULL,
  `jml_diperbaiki` int(20) NOT NULL,
  `jml_rusak` int(20) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `id_rak` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jml_normal`, `jml_diperbaiki`, `jml_rusak`, `id_kategori`, `id_rak`) VALUES
('BR001', 'Resistor', 100, 20, 10, 'KB001', 'RK01'),
('BR002', 'Transistor', 50, 20, 5, 'KB001', 'RK02'),
('BR003', 'Kapasitor', 150, 50, 10, 'KB001', 'RK01'),
('BR004', 'Dioda', 300, 0, 15, 'KB001', 'RK01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inden_barang`
--

CREATE TABLE `inden_barang` (
  `id_inden` varchar(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tgl_inden` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`) VALUES
(11001, 'Aksesoris'),
(11002, 'Komponen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_report`
--

CREATE TABLE `kategori_report` (
  `id_kategori_report` varchar(10) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penampungan`
--

CREATE TABLE `penampungan` (
  `id_penampungan` varchar(10) NOT NULL,
  `id_suplier` varchar(10) NOT NULL,
  `jumlah_unit` int(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `id_rak` varchar(10) NOT NULL,
  `nama_rak` varchar(100) NOT NULL,
  `jumlah_tampung` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`id_rak`, `nama_rak`, `jumlah_tampung`, `id_user`) VALUES
('RK01', 'Rak 1', 200, 'U01'),
('RK02', 'Rak 2', 250, 'U01'),
('RK03', 'Rak 3', 150, 'U01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE `report` (
  `id_report` varchar(10) NOT NULL,
  `nama_report` varchar(100) NOT NULL,
  `id_kategori_report` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `isi_report` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_tlp`) VALUES
('SUP001', 'Hadi', 'Singosari', 934039474),
('SUP002', 'Buana', 'Surabaya', 343472397),
('SUP003', 'Fardi', 'Kediri', 293729378),
('SUP004', 'Yolanda', 'Jombang', 495494374);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `jkel` varchar(20) NOT NULL,
  `alamat` text,
  `no_tlp` int(11) DEFAULT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `jkel`, `alamat`, `no_tlp`, `level`) VALUES
('U01', 'imam nawawi', 'imam', 'admin', 'Laki laki', 'asdfghkl;', 34567890, 'admin'),
('U02', 'yolo', 'yolo', 'user', 'laki', 'dfghjkl;', 3456789, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `inden_barang`
--
ALTER TABLE `inden_barang`
  ADD PRIMARY KEY (`id_inden`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_report`
--
ALTER TABLE `kategori_report`
  ADD PRIMARY KEY (`id_kategori_report`);

--
-- Indexes for table `penampungan`
--
ALTER TABLE `penampungan`
  ADD PRIMARY KEY (`id_penampungan`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id_report`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11003;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
