-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2022 pada 09.02
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kejuruan`
--

CREATE TABLE `kejuruan` (
  `id` int(11) NOT NULL,
  `nama_kejuruan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kejuruan`
--

INSERT INTO `kejuruan` (`id`, `nama_kejuruan`) VALUES
(1, 'PEMROGRAMAN WEB'),
(2, 'BAHASA INGGRIS'),
(3, 'DESAIN GRAFIS'),
(4, 'MENJAHIT PAKAIAN'),
(5, 'FURNITURE KAYU'),
(6, 'INSTALASI LISTRIK PENERANGAN'),
(7, 'OPERATOR KOMPUTER (PRACTICAL OFFICE ADVANCE)'),
(8, 'PEMBUATAN ROTI & KUE / TATA BOGA'),
(9, 'PENGELASAN POSISI SMAW 3G'),
(10, 'PENGGAMBARAN MODEL 3D DENGAN CAD / AUTO CAD'),
(11, 'SERVICE SEPEDA MOTOR / TEKNISI SEPEDA MOTOR'),
(12, 'TATA KECANTIKAN RAMBUT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `tanggalpendaftaran` date NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tanggallahir` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `asalsekolah` varchar(100) NOT NULL,
  `kejuruan_id` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `tanggalpendaftaran`, `namalengkap`, `tempat`, `tanggallahir`, `alamat`, `nohp`, `jeniskelamin`, `asalsekolah`, `kejuruan_id`, `username`, `password`) VALUES
(19, '2022-04-06', 'qq', 'qq', '2022-03-27', 'qq', '089651517860', 'laki-laki', 'qq', 1, 'qq', '$2y$10$j9Y3XoleMke/c6WPL9UXkuQh/8AxRAfV9fKheQUFzuu1J5CW2SCIa'),
(20, '2022-04-07', 'aa', 'aa', '2022-03-29', 'aa', '08922223345566', 'laki-laki', 'aa', 3, 'aa', '$2y$10$df6WpJR2.1CFVFESqwwbH.mnhowhw4HpfASw6CB8/835ywQkfAwVm'),
(21, '2022-04-07', 'zz', 'zz', '2022-03-28', 'zz', '0943465734', 'perempuan', 'zz', 4, 'zz', '$2y$10$cK9NuD4uYQIHwez1Wld46eJ/45nhE75TQz1DpU2qMAId4Ss8b06lu'),
(22, '2022-04-07', 'xx', 'xx', '2022-04-25', 'xx', '08663464654', 'laki-laki', 'xx', 2, 'xx', '$2y$10$xSHZPZS3hZ3dfyMFqD5zwe9smcciskW76mp4yLYareODVWqKP1Lay');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kejuruan`
--
ALTER TABLE `kejuruan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kejuruan_id` (`kejuruan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kejuruan`
--
ALTER TABLE `kejuruan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`kejuruan_id`) REFERENCES `kejuruan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
