-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Feb 2022 pada 08.11
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `jobname` varchar(30) NOT NULL,
  `jobdesc` text NOT NULL,
  `jobstart` date NOT NULL,
  `jobend` date NOT NULL,
  `registerend` date NOT NULL,
  `jobadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jobloc` text NOT NULL,
  `workingtype` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `job`
--

INSERT INTO `job` (`id`, `jobname`, `jobdesc`, `jobstart`, `jobend`, `registerend`, `jobadded`, `jobloc`, `workingtype`) VALUES
(1, 'BARISTA ', 'Peserta: 30 Orang\r\nUsia: 17-35 tahun', '2022-01-06', '2022-01-30', '2022-12-25', '2020-10-26 05:25:56', 'Jl. Mayjend Sungkono Kelurahan Arjowinangun Kecamatan Kedungkandang Kota Malang', 'WFH'),
(3, 'Tata Boga (Olahan Pangan) ', 'Peserta: 60 Orang\r\nUsia: 17-35 Tahun', '2022-01-06', '2022-03-13', '2022-02-28', '2020-10-26 18:58:24', 'Jl. Mayjend Sungkono Kelurahan Arjowinangun Kecamatan Kedungkandang Kota Malang', 'WFH'),
(4, 'Tata Kecantikan (MUA', 'Peserta: 60 orang\r\nBatasan Usia: 17-35 Tahun', '2022-01-06', '2022-06-30', '2022-01-30', '2022-01-06 07:36:11', 'Jl. Mayjend Sungkono Kelurahan Arjowinangun Kecamatan Kedungkandang Kota Malang', 'WFO'),
(5, 'Digital Marketing', 'Peserta: 30 Orang\r\nUsia: 17-35 Tahun', '2022-01-06', '2022-02-03', '2022-01-29', '2022-01-06 08:16:10', 'Jl. Mayjend Sungkono Kelurahan Arjowinangun Kecamatan Kedungkandang Kota Malang', 'WFH'),
(6, 'Design Grafis Berbasis Lokal ', 'Peserta: 60 Orang', '2022-01-06', '2022-02-05', '2022-02-06', '2022-01-06 08:20:05', 'Jl. Mayjend Sungkono Kelurahan Arjowinangun Kecamatan Kedungkandang Kota Malang', 'WFH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `idPengumuman` int(11) NOT NULL,
  `filePengumuman` varchar(20000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`idPengumuman`, `filePengumuman`) VALUES
(1, '220130084648.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persyaratan`
--

CREATE TABLE `persyaratan` (
  `idPersyaratan` int(11) NOT NULL,
  `tataCara` varchar(20000) NOT NULL,
  `persyaratan` varchar(20000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `persyaratan`
--

INSERT INTO `persyaratan` (`idPersyaratan`, `tataCara`, `persyaratan`) VALUES
(3, '220130022722.pdf', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrant`
--

CREATE TABLE `registrant` (
  `idreg` int(11) NOT NULL,
  `idjob` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `alamat` text NOT NULL,
  `nik` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `motivational` varchar(10000) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `ktp` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `registrant`
--

INSERT INTO `registrant` (`idreg`, `idjob`, `name`, `gender`, `dob`, `alamat`, `nik`, `telepon`, `motivational`, `foto`, `ktp`, `date`, `status`) VALUES
(40, 6, 'kai', 'Laki-laki', '2006-01-04', 'mjk', '12345', '628888', 'haloo', '220129061432.jpg', '220129061432.jpg', '2022-01-29 11:14:32', 'Tidak Lulus'),
(41, 6, 'Neli', 'Perempuan', '2006-01-31', 'malang', '12345', '628888', 'haloo', '220201025654.jpg', '220201025654.jpg', '2022-02-01 07:56:54', 'belum dicek'),
(42, 1, 'Daffa', 'Laki-laki', '2006-01-31', 'malang', '12345', '621234', 'WKWKW', '220201082021.jpg', '220201082021.jpg', '2022-02-01 13:20:21', 'belum dicek'),
(43, 1, 'kai', 'Laki-laki', '2006-01-29', 'malang', '12345', '621234', 'haloo', '220201085547.png', '220201085547.png', '2022-02-01 13:55:47', 'belum dicek'),
(44, 1, 'j', '1', '2006-02-04', 'h', 'j', '62kkkkkkkkkkkkk', '', '220204034053.png', '220204034053.png', '2022-02-03 20:40:53', 'belum dicek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`idPengumuman`);

--
-- Indexes for table `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`idPersyaratan`);

--
-- Indexes for table `registrant`
--
ALTER TABLE `registrant`
  ADD PRIMARY KEY (`idreg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `idPengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `idPersyaratan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `registrant`
--
ALTER TABLE `registrant`
  MODIFY `idreg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
