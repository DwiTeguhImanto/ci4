-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2020 pada 03.40
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restorempat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblkategori`
--

CREATE TABLE `tblkategori` (
  `idkategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblkategori`
--

INSERT INTO `tblkategori` (`idkategori`, `kategori`, `keterangan`) VALUES
(28, 'makanan', 'seafood'),
(29, 'minuman', 'kaleng'),
(35, 'dessert', 'box'),
(36, 'camilan', ''),
(37, 'buah', 'manis'),
(39, 'elektronik', 'technologi ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmenu`
--

CREATE TABLE `tblmenu` (
  `idmenu` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblmenu`
--

INSERT INTO `tblmenu` (`idmenu`, `idkategori`, `menu`, `gambar`, `harga`) VALUES
(20, 28, 'fruits salad', 'sr4.jpg', 22000),
(21, 35, 'vanilla macaron', 'sr5.jpg', 12000),
(23, 29, 'ice tea', 'drink-6.jpg', 16000),
(24, 29, 'lime juice', 'drink-2.jpg', 18000),
(25, 35, 'pancake ', 'dessert-1.jpg', 25000),
(26, 35, 'ice cream strawberry', 'dessert-4.jpg', 13000),
(27, 35, 'lava cake', 'dessert-3.jpg', 16000),
(28, 28, 'soup ', 'dinner-2.jpg', 28500),
(29, 28, 'oatmeal milk', 'breakfast-8.jpg', 22000),
(30, 28, 'toast bread with egg', 'dinner-6.jpg', 12000),
(31, 29, 'plump juice', 'drink-1.jpg', 18000),
(32, 29, 'orange juice', 'drink-31.jpg', 18000),
(33, 29, 'ice cappucino', 'drink-4.jpg', 18000),
(34, 29, 'star fruit juice', 'drink-5.jpg', 18000),
(35, 29, 'pumkin juice ', 'drink-7.jpg', 18000),
(36, 28, 'tomyum', 'dinner-5.jpg', 25000),
(37, 28, 'ayam bakar', 'lunch-8.jpg', 35000),
(38, 35, 'coklat hitam ', 'hitam3.jpg', 14000),
(39, 28, 'bihun', 'cat-post-1.jpg', 1000),
(45, 49, 'jaket', 'jacket.jpg', 50000),
(46, 28, 'coba', 'usb.jpg', 5000),
(47, 36, 'tango', 'tango.jpg', 5000),
(48, 28, 'jagung bakar', 'tango.jpg', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblorder`
--

CREATE TABLE `tblorder` (
  `idorder` int(11) NOT NULL,
  `idpelanggan` int(11) NOT NULL,
  `tglorder` date NOT NULL,
  `total` float NOT NULL DEFAULT '0',
  `bayar` float NOT NULL DEFAULT '0',
  `kembali` float NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblorder`
--

INSERT INTO `tblorder` (`idorder`, `idpelanggan`, `tglorder`, `total`, `bayar`, `kembali`, `status`) VALUES
(8, 7, '2020-02-12', 22000, 50000, 28000, 1),
(9, 5, '2020-02-12', 28500, 30000, 1500, 1),
(10, 6, '2020-02-12', 25000, 500000, 475000, 1),
(11, 3, '2020-02-12', 12000, 15000, 3000, 1),
(12, 7, '2020-02-12', 36900, 40000, 3100, 1),
(13, 8, '2020-02-13', 74000, 80000, 6000, 1),
(14, 8, '2020-02-14', 13000, 13333300, 13320300, 1),
(15, 8, '2020-02-14', 22000, 50000, 28000, 1),
(16, 7, '2020-02-17', 18000, 20000, 2000, 1),
(17, 8, '2020-02-17', 18000, 0, 0, 0),
(18, 8, '2020-02-17', 36000, 50000, 14000, 1),
(19, 8, '2020-02-23', 18000, 20000, 2000, 1),
(20, 7, '2020-02-23', 28500, 0, 0, 0),
(21, 7, '2020-02-23', 100000, 150000, 50000, 1),
(22, 9, '2020-02-25', 18000, 0, 0, 0),
(23, 9, '2020-02-25', 28500, 0, 0, 0),
(36, 9, '2020-02-25', 66000, 70000, 4000, 1),
(37, 10, '2020-02-28', 22000, 50000, 28000, 1),
(38, 10, '2020-02-28', 24000, 0, 0, 0),
(39, 8, '2020-03-18', 36000, 40000, 4000, 1),
(40, 8, '2020-06-24', 16000, 100000, 84000, 1),
(41, 8, '2020-08-04', 18000, 0, 0, 0),
(42, 2, '2020-11-29', 34000, 35000, 1000, 1),
(43, 2, '2020-11-29', 5000, 0, 0, 0),
(44, 11, '2020-11-30', 22000, 0, 0, 0),
(45, 10, '2020-11-30', 16000, 0, 0, 0),
(46, 10, '2020-11-30', 12000, 0, 0, 0),
(47, 10, '2020-11-30', 18000, 0, 0, 0),
(48, 10, '2020-11-30', 12000, 0, 0, 0),
(49, 10, '2020-11-30', 16000, 0, 0, 0),
(50, 10, '2020-11-30', 13000, 0, 0, 0),
(51, 10, '2020-11-30', 28500, 0, 0, 0),
(52, 10, '2020-11-30', 12000, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblorderdetail`
--

CREATE TABLE `tblorderdetail` (
  `idorderdetail` int(11) NOT NULL,
  `idorder` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargajual` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblorderdetail`
--

INSERT INTO `tblorderdetail` (`idorderdetail`, `idorder`, `idmenu`, `jumlah`, `hargajual`) VALUES
(27, 8, 29, 1, 22000),
(28, 9, 28, 1, 28500),
(29, 10, 25, 1, 25000),
(30, 11, 21, 1, 12000),
(31, 12, 17, 1, 36900),
(32, 13, 20, 1, 22000),
(33, 13, 30, 1, 12000),
(34, 13, 34, 1, 18000),
(35, 13, 29, 1, 22000),
(36, 14, 26, 1, 13000),
(37, 15, 20, 1, 22000),
(38, 16, 32, 1, 18000),
(39, 17, 32, 1, 18000),
(40, 18, 35, 2, 18000),
(41, 19, 31, 1, 18000),
(42, 20, 18, 1, 28500),
(43, 21, 25, 4, 25000),
(44, 22, 35, 1, 18000),
(45, 23, 28, 1, 28500),
(46, 36, 20, 3, 22000),
(47, 37, 29, 1, 22000),
(48, 38, 21, 2, 12000),
(49, 40, 19, 2, 18000),
(50, 40, 23, 1, 16000),
(51, 41, 24, 1, 18000),
(52, 42, 20, 1, 22000),
(53, 42, 21, 1, 12000),
(54, 43, 47, 1, 5000),
(55, 44, 20, 1, 22000),
(56, 45, 23, 1, 16000),
(57, 46, 21, 1, 12000),
(58, 47, 24, 1, 18000),
(59, 48, 21, 1, 12000),
(60, 49, 23, 1, 16000),
(61, 50, 26, 1, 13000),
(62, 51, 28, 1, 28500),
(63, 52, 21, 1, 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpelanggan`
--

CREATE TABLE `tblpelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblpelanggan`
--

INSERT INTO `tblpelanggan` (`idpelanggan`, `pelanggan`, `alamat`, `telp`, `email`, `password`, `aktif`) VALUES
(2, 'tejo', 'sidoarjo', '123456789', 'tejo@gmail.com', '123', 1),
(3, 'juju', 'naga', '0987', 'naga@gmail.com', '12', 1),
(6, 'tini', 'malang ', '0987', 'tini@gmail.com', '123', 1),
(8, 'hyunjin', 'malang ', '4567', 'hyunjin@gmail.com', '90', 1),
(9, 'ryujin', 'singasari', '0987687', 'ryujin@gmail.com', 'ryujin', 1),
(10, 'coba', 'coba', '083906', 'coba@gmail.com', 'coba', 1),
(11, 'karin', 'malang ', '08961660', 'karin@gmail.com', 'karin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbluser`
--

CREATE TABLE `tbluser` (
  `iduser` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbluser`
--

INSERT INTO `tbluser` (`iduser`, `user`, `email`, `password`, `level`, `aktif`) VALUES
(22, 'kasir', 'kasir@gmail.com', '$2y$10$g2fHydQEIzNiic3Qy3/2kuph3ufMKYgpvqncNUJ49QOrQ9WS049Xi', 'Kasir', 1),
(23, 'chef', 'koki@gmail.com', '$2y$10$7B6GM0A1tMz3bmZCqiycXuOp3/7jlc4iFV5nA1wYkyuz5x4eYQvt6', 'Koki', 1),
(24, 'admin', 'admin@gmail.com', '$2y$10$edZIJqt4/8dOqGWj/ivyD..6QX/GXwRNqiDJBm.EJzxeZVxNgw9gG', 'Admin', 1),
(25, 'kasirr', 'kasirr@gmail.com', '$2y$10$IykX4LlCt4/hOUKtcsiaJufhTR7k.mwOX9aE./BYk8es1udvmsHuG', 'Kasir', 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vorder`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vorder` (
`idorder` int(11)
,`idpelanggan` int(11)
,`tglorder` date
,`total` float
,`bayar` float
,`kembali` float
,`status` int(11)
,`pelanggan` varchar(100)
,`alamat` varchar(200)
,`telp` varchar(100)
,`email` varchar(150)
,`password` varchar(255)
,`aktif` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vorderdetail`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vorderdetail` (
`idorderdetail` int(11)
,`idorder` int(11)
,`idmenu` int(11)
,`jumlah` int(11)
,`hargajual` float
,`idkategori` int(11)
,`menu` varchar(100)
,`gambar` varchar(200)
,`harga` float
,`kategori` varchar(100)
,`idpelanggan` int(11)
,`tglorder` date
,`total` float
,`bayar` float
,`kembali` float
,`status` int(11)
,`pelanggan` varchar(100)
,`alamat` varchar(200)
,`telp` varchar(100)
,`email` varchar(150)
,`password` varchar(255)
,`aktif` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vorder`
--
DROP TABLE IF EXISTS `vorder`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vorder`  AS  select `tblorder`.`idorder` AS `idorder`,`tblorder`.`idpelanggan` AS `idpelanggan`,`tblorder`.`tglorder` AS `tglorder`,`tblorder`.`total` AS `total`,`tblorder`.`bayar` AS `bayar`,`tblorder`.`kembali` AS `kembali`,`tblorder`.`status` AS `status`,`tblpelanggan`.`pelanggan` AS `pelanggan`,`tblpelanggan`.`alamat` AS `alamat`,`tblpelanggan`.`telp` AS `telp`,`tblpelanggan`.`email` AS `email`,`tblpelanggan`.`password` AS `password`,`tblpelanggan`.`aktif` AS `aktif` from (`tblpelanggan` join `tblorder` on((`tblpelanggan`.`idpelanggan` = `tblorder`.`idpelanggan`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vorderdetail`
--
DROP TABLE IF EXISTS `vorderdetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vorderdetail`  AS  select `tblorderdetail`.`idorderdetail` AS `idorderdetail`,`tblorderdetail`.`idorder` AS `idorder`,`tblorderdetail`.`idmenu` AS `idmenu`,`tblorderdetail`.`jumlah` AS `jumlah`,`tblorderdetail`.`hargajual` AS `hargajual`,`tblmenu`.`idkategori` AS `idkategori`,`tblmenu`.`menu` AS `menu`,`tblmenu`.`gambar` AS `gambar`,`tblmenu`.`harga` AS `harga`,`tblkategori`.`kategori` AS `kategori`,`tblorder`.`idpelanggan` AS `idpelanggan`,`tblorder`.`tglorder` AS `tglorder`,`tblorder`.`total` AS `total`,`tblorder`.`bayar` AS `bayar`,`tblorder`.`kembali` AS `kembali`,`tblorder`.`status` AS `status`,`tblpelanggan`.`pelanggan` AS `pelanggan`,`tblpelanggan`.`alamat` AS `alamat`,`tblpelanggan`.`telp` AS `telp`,`tblpelanggan`.`email` AS `email`,`tblpelanggan`.`password` AS `password`,`tblpelanggan`.`aktif` AS `aktif` from ((((`tblorderdetail` join `tblorder` on((`tblorderdetail`.`idorder` = `tblorder`.`idorder`))) join `tblpelanggan` on((`tblorder`.`idpelanggan` = `tblpelanggan`.`idpelanggan`))) join `tblmenu` on((`tblorderdetail`.`idmenu` = `tblmenu`.`idmenu`))) join `tblkategori` on((`tblmenu`.`idkategori` = `tblkategori`.`idkategori`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblkategori`
--
ALTER TABLE `tblkategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indeks untuk tabel `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`idorder`);

--
-- Indeks untuk tabel `tblorderdetail`
--
ALTER TABLE `tblorderdetail`
  ADD PRIMARY KEY (`idorderdetail`);

--
-- Indeks untuk tabel `tblpelanggan`
--
ALTER TABLE `tblpelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indeks untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblkategori`
--
ALTER TABLE `tblkategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tblorderdetail`
--
ALTER TABLE `tblorderdetail`
  MODIFY `idorderdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tblpelanggan`
--
ALTER TABLE `tblpelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
