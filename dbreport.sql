-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jun 2015 pada 18.33
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbreport`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailproker`
--

CREATE TABLE IF NOT EXISTS `detailproker` (
  `kdkeg` int(4) NOT NULL,
  `nmkeg` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `awalkeg` date NOT NULL,
  `ahirkeg` date NOT NULL,
  `photo` longblob NOT NULL,
  `status` int(20) DEFAULT NULL,
  `upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `detailproker`:
--   `kdkeg`
--       `proker` -> `kdkeg`
--

--
-- Dumping data untuk tabel `detailproker`
--

INSERT INTO `detailproker` (`kdkeg`, `nmkeg`, `deskripsi`, `awalkeg`, `ahirkeg`, `photo`, `status`, `upload`) VALUES
(1, '1', '1', '2015-06-23', '2015-06-07', 0x3133373334315f313430353131363137332e6a7067, 8, '2015-06-15'),
(563, '67', '796', '2013-06-05', '2015-06-04', 0x3133373333395f313335333230373035362e6a7067, 11, '2015-06-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proker`
--

CREATE TABLE IF NOT EXISTS `proker` (
  `kdkeg` int(10) NOT NULL,
  `nmkeg` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `awalkeg` date DEFAULT NULL,
  `ahirkeg` date NOT NULL,
  `photo` longblob,
  `status` char(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5679 DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `proker`:
--

--
-- Dumping data untuk tabel `proker`
--

INSERT INTO `proker` (`kdkeg`, `nmkeg`, `deskripsi`, `awalkeg`, `ahirkeg`, `photo`, `status`) VALUES
(1, '1', '1', '2015-06-23', '2015-06-07', NULL, ''),
(563, '67', '796', '2013-06-05', '2015-06-04', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prokeruser`
--

CREATE TABLE IF NOT EXISTS `prokeruser` (
  `kdkeg` int(10) NOT NULL,
  `nmkeg` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `awalkeg` date NOT NULL,
  `ahirkeg` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `prokeruser`:
--   `kdkeg`
--       `proker` -> `kdkeg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `users`:
--

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `nama`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', 'admin'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'EDITOR', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailproker`
--
ALTER TABLE `detailproker`
  ADD KEY `kdkeg` (`kdkeg`);

--
-- Indexes for table `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`kdkeg`), ADD KEY `kdkeg_2` (`kdkeg`), ADD KEY `kdkeg` (`kdkeg`);

--
-- Indexes for table `prokeruser`
--
ALTER TABLE `prokeruser`
  ADD KEY `kdkeg` (`kdkeg`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proker`
--
ALTER TABLE `proker`
  MODIFY `kdkeg` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5679;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
