-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Sep 2019 pada 05.55
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malangsatudata2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alatangkutd`
--

CREATE TABLE `alatangkutd` (
  `id` int(11) NOT NULL,
  `periode` year(4) NOT NULL,
  `alatangkut` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alatangkutd`
--

INSERT INTO `alatangkutd` (`id`, `periode`, `alatangkut`, `jumlah`, `penginput`, `waktu`, `status`) VALUES
(1, 2018, 1, 40, 'admin', '2019-08-29 16:34:51', 0),
(2, 2018, 2, 577, 'admin', '2019-08-29 16:41:21', 0),
(4, 2018, 3, 68, 'admin', '2019-08-29 16:50:43', 0),
(5, 2018, 4, 4, 'admin', '2019-08-29 17:18:40', 0),
(6, 2018, 5, 4, 'admin', '2019-08-29 17:27:50', 0),
(7, 2018, 6, 3, 'admin', '2019-08-29 17:28:00', 0),
(8, 2018, 8, 2, 'admin', '2019-08-29 17:28:08', 0),
(9, 2019, 1, 2, 'admin', '2019-09-04 22:51:50', 1),
(10, 2019, 2, 578, 'admin', '2019-09-04 22:51:45', 1),
(12, 2017, 1, 29, 'admin', '2019-09-04 22:41:55', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `apl_terselesaikan`
--

CREATE TABLE `apl_terselesaikan` (
  `id` int(11) NOT NULL,
  `nama_apl` varchar(100) NOT NULL,
  `stts` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `apl_terselesaikan`
--

INSERT INTO `apl_terselesaikan` (`id`, `nama_apl`, `stts`, `tahun`, `penginput`, `status`, `date`) VALUES
(1, 'e', 'Selesai', 2016, 'admin', 1, '2019-08-21 02:44:28'),
(2, 'e', 'Selesai', 2016, 'admin', 1, '2019-08-21 02:50:05'),
(3, 'e', 'Selesai', 2016, 'admin', 1, '2019-08-21 02:50:37'),
(4, 'e', 'Selesai', 2016, 'admin', 1, '2019-08-21 02:52:41'),
(5, 'e', 'Selesai', 2016, 'admin', 1, '2019-08-21 02:52:50'),
(6, 'e', 'Selesai', 2016, 'admin', 1, '2019-08-21 02:55:36'),
(7, 'e', 'Selesai', 2016, 'admin', 1, '2019-08-21 02:55:45'),
(8, 'ghj', 'Belum Selesai', 2016, 'admin', 1, '2019-08-21 02:58:02'),
(9, 'erttt', 'Belum Selesai', 2013, 'admin', 1, '2019-08-21 02:58:41'),
(10, 'ghjk', 'Selesai', 2018, 'admin', 1, '2019-08-21 02:59:46'),
(11, 'cuk', 'Selesai', 2014, 'admin', 1, '2019-08-21 03:03:42'),
(12, 'j', 'Belum Selesai', 2014, 'admin', 1, '2019-08-21 03:03:50'),
(13, 'MailTrack', 'Selesai', 2018, 'admin', 0, '2019-08-27 12:36:19'),
(14, 'Attendance', 'Selesai', 2018, 'admin', 0, '2019-08-27 12:36:38'),
(15, 'Damis', 'Selesai', 2018, 'admin', 0, '2019-08-27 12:36:48'),
(16, 'Damis', 'Selesai', 2017, 'admin', 0, '2019-08-27 12:37:12'),
(17, 'E-Harga', 'Belum Selesai', 2017, 'admin', 0, '2019-08-27 12:37:31'),
(18, 'Stimata', 'Selesai', 2019, 'admin', 1, '2019-09-04 06:41:14'),
(19, 'Kasembon fc', 'Belum Selesai', 2009, 'admin', 1, '2019-09-04 13:42:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banding_kembang_realisasi_ekspor`
--

CREATE TABLE `banding_kembang_realisasi_ekspor` (
  `id` int(11) NOT NULL,
  `komoditi` varchar(100) NOT NULL,
  `volum` decimal(15,2) NOT NULL,
  `nilai` decimal(15,2) NOT NULL,
  `total_ekspor` decimal(15,2) NOT NULL,
  `naik_turun` decimal(15,2) NOT NULL,
  `naik_turun_nilai` decimal(15,2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banding_kembang_realisasi_ekspor`
--

INSERT INTO `banding_kembang_realisasi_ekspor` (`id`, `komoditi`, `volum`, `nilai`, `total_ekspor`, `naik_turun`, `naik_turun_nilai`, `tahun`, `penginput`, `timestamp`, `status`) VALUES
(1, 'Kulit', '8672481.00', '13971692.00', '0.00', '3965030.00', '0.00', 2018, 'admin', '2019-08-26 01:13:32', 0),
(2, 'Kulit', '8672481.88', '13971692.57', '0.03', '3965030.46', '0.40', 2018, 'admin', '2019-08-26 01:14:08', 0),
(3, 'Kerajinan Kayu', '12.00', '34.00', '55.00', '66.00', '77.00', 2019, 'admin', '2019-08-26 01:43:22', 0),
(4, 'Kerajinan Rotan', '1.00', '1.00', '1.00', '1.00', '1.00', 2019, 'admin', '2019-08-26 01:44:21', 0),
(5, 'Kerajinan Alumunium', '1.00', '1.00', '1.00', '1.00', '1.00', 2019, 'admin', '2019-08-26 16:59:03', 0),
(7, 'Kertas Linier', '1.00', '1.00', '1.00', '1.00', '1.00', 2019, 'admin', '2019-08-26 18:14:40', 0),
(8, 'Sayur', '1.00', '1.00', '1.00', '1.00', '1.00', 2019, 'admin', '2019-08-26 18:17:57', 1),
(9, 'Plaster Obat', '1.00', '1.00', '1.00', '1.00', '1.00', 2019, 'admin', '2019-08-26 18:21:11', 0),
(10, 'Botol Kemasan', '1.00', '1.00', '1.00', '1.00', '1.00', 2019, 'admin', '2019-08-26 18:22:35', 0),
(11, 'Audio dan TV Kabinet', '1.00', '1.00', '1.00', '1.00', '1.00', 2019, 'admin', '2019-08-26 18:25:57', 0),
(12, 'Sepatu', '1.00', '1.00', '1.00', '1.00', '1.00', 2019, 'admin', '2019-08-27 03:44:23', 0),
(13, 'Bantalan Kursi Busa', '1.00', '0.00', '1.00', '1.00', '1.00', 2019, 'admin', '2019-08-27 05:48:35', 0),
(14, 'Cairan Obat', '2.00', '2.00', '3.00', '4.00', '5.00', 2019, 'admin', '2019-08-27 05:57:53', 0),
(15, 'Sayur', '2.00', '2.00', '2.00', '33.00', '4.00', 2019, 'admin', '2019-08-27 05:59:26', 1),
(16, 'Kulit', '1.00', '1.00', '1.00', '1.00', '1.00', 2017, 'admin', '2019-09-04 07:07:02', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `banyak_bencana`
--

CREATE TABLE `banyak_bencana` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(32) NOT NULL,
  `jumlah_bencana` int(11) NOT NULL,
  `mati` int(11) NOT NULL,
  `luka` int(11) NOT NULL,
  `menderita` int(11) NOT NULL,
  `hancur` int(11) NOT NULL,
  `rusak` int(11) NOT NULL,
  `kerugian` int(100) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banyak_bencana`
--

INSERT INTO `banyak_bencana` (`id`, `kecamatan`, `jumlah_bencana`, `mati`, `luka`, `menderita`, `hancur`, `rusak`, `kerugian`, `periode`, `penginput`, `status`, `time`) VALUES
(1, '2', 15, 5, 5, 11, 14, 10, 20000, 2018, 'admin', 1, '2019-08-22 13:51:40'),
(2, '4', 13, 10, 5, 5, 5, 15, 1000, 2018, 'admin', 1, '2019-08-22 15:38:04'),
(3, '2', 2, 2, 2, 2, 2, 2, 1000000, 2019, 'admin', 1, '2019-08-22 15:33:32'),
(4, '2', 0, 0, 1, 0, 0, 0, 0, 2019, 'admin', 1, '2019-08-16 17:48:03'),
(5, '2', 0, 0, 0, 1, 0, 0, 0, 2018, 'admin', 1, '2019-08-22 13:51:59'),
(6, '20', 0, 0, 0, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 17:50:22'),
(7, '6', 0, 0, 0, 0, 0, 0, 1000, 2018, 'admin', 0, '2019-08-22 13:45:49'),
(8, '10', 0, 0, 0, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 17:51:06'),
(9, '27', 0, 0, 0, 0, 0, 0, 100000000, 2018, 'admin', 0, '2019-08-16 17:52:00'),
(10, '8', 0, 0, 0, 0, 0, 0, 1000, 2018, 'admin', 0, '2019-08-22 13:48:01'),
(11, '30', 0, 0, 0, 0, 0, 8, 0, 2018, 'admin', 0, '2019-08-16 17:55:43'),
(12, '5', 0, 0, 0, 0, 0, 10, 5700000, 2018, 'admin', 0, '2019-08-16 17:56:31'),
(13, '24', 0, 0, 0, 0, 0, 7, 5000000, 2018, 'admin', 0, '2019-08-16 17:57:05'),
(14, '35', 1, 0, 0, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 17:57:45'),
(15, '33', 1, 0, 0, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 17:59:18'),
(16, '7', 2, 0, 0, 0, 0, 11, 10000, 2018, 'admin', 0, '2019-08-22 13:46:09'),
(17, '11', 3, 0, 0, 0, 0, 5, 0, 2018, 'admin', 0, '2019-08-16 18:00:15'),
(18, '21', 0, 0, 0, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 18:00:34'),
(19, '15', 0, 0, 0, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 18:01:18'),
(20, '28', 0, 0, 0, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 18:01:52'),
(21, '16', 0, 0, 0, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 18:02:15'),
(22, '18', 0, 0, 0, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 18:02:39'),
(23, '36', 2, 0, 0, 0, 0, 8, 61700000, 2018, 'admin', 0, '2019-08-16 18:03:15'),
(24, '34', 2, 0, 2, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 18:03:56'),
(25, '23', 0, 0, 0, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 18:04:12'),
(26, '29', 1, 0, 0, 0, 0, 12, 0, 2018, 'admin', 0, '2019-08-16 18:04:46'),
(27, '31', 2, 0, 0, 0, 0, 23, 0, 2018, 'admin', 0, '2019-08-16 18:05:47'),
(28, '22', 4, 0, 1, 0, 0, 112, 0, 2018, 'admin', 0, '2019-08-16 18:06:52'),
(29, '12', 5, 0, 0, 0, 0, 4, 0, 2018, 'admin', 0, '2019-08-16 18:07:14'),
(30, '17', 1, 0, 0, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 18:07:51'),
(31, '26', 4, 0, 0, 0, 0, 0, 5000000, 2018, 'admin', 0, '2019-08-16 18:08:20'),
(32, '13', 1, 0, 0, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 18:08:47'),
(33, '9', 0, 0, 0, 0, 0, 0, 1000, 2018, 'admin', 0, '2019-08-22 15:39:09'),
(34, '25', 4, 0, 0, 0, 0, 5, 0, 2018, 'admin', 0, '2019-08-16 18:09:37'),
(35, '19', 5, 0, 0, 0, 0, 0, 0, 2018, 'admin', 0, '2019-08-16 18:10:08'),
(36, '14', 4, 0, 0, 0, 0, 1, 0, 2018, 'admin', 0, '2019-08-16 18:11:00'),
(38, '4', 3, 3, 2, 2, 2, 2, 0, 2018, 'admin', 1, '2019-08-22 15:40:49'),
(39, '2', 1, 0, 0, 0, 0, 0, 1000000, 2019, 'admin', 1, '2019-08-17 08:23:24'),
(40, '2', 1, 0, 0, 0, 0, 0, 0, 2018, 'admin', 1, '2019-08-22 15:06:55'),
(41, '2', 2, 0, 0, 0, 0, 0, 1000000, 2019, 'admin', 1, '2019-08-17 08:39:55'),
(43, '4', 1, 1, 1, 1, 1, 1, 100, 2018, 'admin', 1, '2019-08-22 15:41:02'),
(44, '2', 1, 1, 1, 1, 1, 1, 100, 2019, 'admin', 1, '2019-08-22 15:36:18'),
(45, '2', 1, 1, 1, 1, 1, 1, 10000, 2018, 'admin', 0, '2019-08-29 07:53:44'),
(46, '4', 1, 1, 1, 1, 1, 1, 1000, 2018, 'admin', 0, '2019-08-22 15:41:33'),
(47, '2', 1, 1, 1, 1, 1, 1, 2000, 2019, 'admin', 0, '2019-08-27 14:25:43'),
(48, '4', 1, 1, 1, 1, 1, 1, 1000, 2019, 'admin', 0, '2019-08-27 14:25:57'),
(49, '2', 1, 1, 1, 1, 1, 1, 1000, 2017, 'admin', 0, '2019-08-27 14:26:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banyak_kebakaran`
--

CREATE TABLE `banyak_kebakaran` (
  `id` int(11) NOT NULL,
  `kecamatan` int(100) NOT NULL,
  `kebakaran` int(11) NOT NULL,
  `korban_manusia` int(11) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banyak_kebakaran`
--

INSERT INTO `banyak_kebakaran` (`id`, `kecamatan`, `kebakaran`, `korban_manusia`, `periode`, `penginput`, `status`, `time`) VALUES
(1, 1, 1, 1, 2019, 'admin', 0, '2019-09-05 14:01:49'),
(2, 4, 1, 0, 2018, 'admin', 0, '2019-08-13 05:08:32'),
(3, 2, 2, 0, 2018, 'admin', 1, '2019-08-16 17:37:46'),
(4, 2, 1, 1, 2019, 'admin', 1, '2019-08-22 13:30:24'),
(5, 5, 0, 0, 2019, 'admin', 1, '2019-08-22 04:51:03'),
(6, 6, 3, 0, 2018, 'admin', 0, '2019-08-14 00:29:25'),
(7, 8, 0, 0, 2018, 'admin', 0, '2019-08-14 00:29:42'),
(8, 6, 0, 0, 2019, 'admin', 1, '2019-08-22 04:50:55'),
(9, 9, 3, 0, 2018, 'admin', 0, '2019-08-14 00:32:56'),
(10, 6, 2, 0, 2019, 'admin', 1, '2019-08-22 04:50:43'),
(11, 2, 1, 0, 2017, 'admin', 1, '2019-08-22 13:33:12'),
(12, 4, 1, 0, 2017, 'admin', 1, '2019-08-22 13:33:20'),
(13, 2, 1, 0, 2017, 'admin', 1, '2019-08-22 04:50:49'),
(14, 7, 1, 0, 2019, 'admin', 1, '2019-08-22 04:50:37'),
(15, 4, 1, 1, 2016, 'admin', 1, '2019-08-22 13:30:47'),
(16, 5, 0, 0, 2016, 'admin', 0, '2019-08-22 13:31:03'),
(17, 6, 3, 2, 2016, 'admin', 0, '2019-08-22 13:31:18'),
(18, 7, 2, 0, 2016, 'admin', 0, '2019-08-22 13:32:10'),
(19, 9, 3, 2, 2016, 'admin', 0, '2019-08-22 13:32:33'),
(20, 2, 0, 0, 2016, 'admin', 0, '2019-08-22 13:32:49'),
(21, 10, 0, 0, 2016, 'admin', 0, '2019-08-22 13:33:55'),
(22, 11, 1, 0, 2016, 'admin', 0, '2019-08-22 13:34:21'),
(23, 12, 1, 0, 2016, 'admin', 0, '2019-08-22 13:34:46'),
(24, 4, 1, 0, 2016, 'admin', 0, '2019-08-22 13:35:04'),
(25, 13, 1, 0, 2016, 'admin', 1, '2019-08-28 01:58:38'),
(26, 5, 0, 0, 2017, 'admin', 0, '2019-08-22 13:36:01'),
(27, 6, 3, 2, 2017, 'admin', 0, '2019-08-22 13:36:15'),
(28, 7, 0, 0, 2018, 'admin', 0, '2019-08-22 13:38:08'),
(29, 8, 0, 0, 2017, 'admin', 0, '2019-08-22 13:37:15'),
(30, 9, 1, 0, 2017, 'admin', 0, '2019-08-22 13:37:33'),
(31, 10, 0, 0, 2017, 'admin', 0, '2019-08-22 13:37:52'),
(32, 2, 0, 0, 2018, 'admin', 0, '2019-08-22 13:39:45'),
(33, 15, 1, 1, 2017, 'admin', 0, '2019-08-28 01:50:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banyak_kendaraan`
--

CREATE TABLE `banyak_kendaraan` (
  `id_kendaraan` int(32) NOT NULL,
  `bulan` varchar(32) NOT NULL,
  `jenis` varchar(32) NOT NULL,
  `mpu` int(11) NOT NULL,
  `bus` int(11) NOT NULL,
  `mobil` int(11) NOT NULL,
  `gandeng` int(11) NOT NULL,
  `tempel` int(11) NOT NULL,
  `khusus` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banyak_kendaraan`
--

INSERT INTO `banyak_kendaraan` (`id_kendaraan`, `bulan`, `jenis`, `mpu`, `bus`, `mobil`, `gandeng`, `tempel`, `khusus`, `jumlah`, `periode`, `penginput`, `status`, `time`) VALUES
(1, '1', 'Umum', 1, 1, 1, 1, 1, 1, 0, 2018, 'admin', 1, '2019-09-04 10:16:30'),
(2, '3', '', 0, 0, 0, 0, 0, 0, 0, 2018, 'admin', 1, '2019-09-04 17:50:48'),
(5, '3', 'Umum', 1, 1, 1, 1, 1, 1, 6, 2018, 'admin', 0, '2019-09-04 10:29:00'),
(6, '2', 'Bukan', 1, 1, 1, 1, 1, 1, 6, 2018, 'admin', 0, '2019-09-04 10:29:12'),
(7, '1', 'Umum', 1, 1, 1, 1, 1, 1, 6, 2019, 'admin', 0, '2019-09-04 13:03:47'),
(8, '4', 'Bukan', 1, 1, 1, 1, 1, 1, 6, 2019, 'admin', 0, '2019-09-04 14:28:46'),
(9, '1', 'Umum', 1, 1, 1, 1, 1, 1, 6, 2018, 'admin', 0, '2019-09-04 16:02:08'),
(10, '4', 'Bukan', 2, 1, 1, 1, 1, 1, 7, 2018, 'admin', 0, '2019-09-04 17:51:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bencana`
--

CREATE TABLE `bencana` (
  `id` int(11) NOT NULL,
  `bencana` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bencana`
--

INSERT INTO `bencana` (`id`, `bencana`, `time`) VALUES
(1, 'Banjir', '2019-07-30 16:06:55'),
(2, 'Tanah Longsor', '2019-08-08 05:07:44'),
(3, 'Gempa Bumi', '2019-08-08 05:07:53'),
(4, 'Angin Topan', '2019-07-30 16:06:55'),
(5, 'Kekeringan', '2019-07-30 16:06:55'),
(6, 'Tsunami', '2019-08-29 04:58:43'),
(7, 'Kebakaran', '2019-08-29 04:59:08'),
(8, 'Angin Puting Beliung', '2019-08-29 04:59:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang_olahraga`
--

CREATE TABLE `cabang_olahraga` (
  `id` int(100) NOT NULL,
  `cabang_olahraga` text NOT NULL,
  `prestasi` int(100) NOT NULL,
  `dibina` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `Waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cabang_olahraga`
--

INSERT INTO `cabang_olahraga` (`id`, `cabang_olahraga`, `prestasi`, `dibina`, `jumlah`, `tahun`, `Waktu`, `penginput`, `status`) VALUES
(24, 'Atletik', 6, 4, 10, 2017, '2019-08-01 13:08:38', '', 1),
(25, 'Tenis Lapangan', 3, 4, 7, 2017, '2019-08-01 13:09:14', '', 1),
(26, 'Senam', 6, 7, 13, 2017, '2019-08-01 13:09:34', '', 1),
(27, 'Panahan', 8, 14, 22, 2017, '2019-08-01 13:10:13', '', 1),
(28, 'Silat', 5, 12, 17, 2018, '2019-08-01 13:12:12', '', 1),
(29, 'Bulu Tangkis', 2, 12, 14, 2018, '2019-08-01 13:12:35', '', 1),
(31, 'Tenis Meja', 80, 34, 114, 2014, '2019-08-04 14:42:40', 'admin', 1),
(32, 'Atletik', 6, 14, 20, 2017, '2019-08-05 05:33:20', 'admin', 0),
(33, 'Tenis Lapangan', 3, 4, 7, 2018, '2019-08-05 05:33:33', 'admin', 0),
(34, 'Senam', 6, 7, 13, 2017, '2019-08-05 05:33:48', 'admin', 0),
(35, 'Panahan', 8, 14, 22, 2017, '2019-08-05 05:34:08', 'admin', 0),
(36, 'Tenis Meja', 1, 6, 7, 2017, '2019-08-05 05:34:27', 'admin', 0),
(37, 'Catur', 0, 6, 6, 2017, '2019-08-05 05:34:57', 'admin', 0),
(38, 'Sepak Takraw', 0, 4, 4, 2017, '2019-08-05 05:35:20', 'admin', 0),
(39, 'Silat', 0, 5, 5, 2017, '2019-08-05 05:35:43', 'admin', 0),
(40, 'Renang', 0, 10, 10, 2017, '2019-08-05 05:36:04', 'admin', 0),
(41, 'Bola Voli Mini', 0, 12, 12, 2017, '2019-08-05 05:36:24', 'admin', 0),
(42, 'Bulu Tangkis', 0, 6, 6, 2017, '2019-08-05 05:36:41', 'admin', 0),
(43, 'Silat', 5, 12, 17, 2018, '2019-08-05 05:37:14', 'admin', 0),
(44, 'Bulu Tangkis', 2, 12, 14, 2018, '2019-08-05 05:38:11', 'admin', 0),
(45, 'Tenis Meja', 2, 10, 12, 2018, '2019-08-05 05:38:31', 'admin', 0),
(46, 'Tenis Lapangan', 2, 4, 6, 2018, '2019-08-05 05:38:52', 'admin', 0),
(47, 'Basket', 0, 24, 24, 2018, '2019-08-05 05:41:37', 'admin', 0),
(48, 'Bola Voly', 0, 25, 25, 2018, '2019-08-05 05:42:19', 'admin', 0),
(49, 'Sepak Takraw', 0, 6, 6, 2018, '2019-08-05 05:42:39', 'admin', 0),
(50, 'Catur', 23, 23, 46, 2016, '2019-08-10 01:26:20', 'admin', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa_wisata`
--

CREATE TABLE `desa_wisata` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kelembagaan` varchar(100) NOT NULL,
  `penginput` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `desa_wisata`
--

INSERT INTO `desa_wisata` (`id`, `kecamatan`, `desa`, `kelembagaan`, `penginput`, `timestamp`, `status`) VALUES
(1, 'Turen', 'Sanankerto', 'Ekowisata', 'admin', '2019-08-13 14:47:20', 0),
(2, 'malang', 'gubuk', 'Ecowisata', 'admin', '2019-08-16 05:58:59', 1),
(3, 'Kalipare', 'Kalimantan', 'Pokdarwis', 'admin', '2019-08-17 03:43:55', 1),
(4, 'Donomulyo', 'kokokl', 'woi', 'admin', '2019-08-17 04:53:27', 1),
(5, 'Donomulyo', 'jajan', 'asu', 'admin', '2019-08-17 17:17:49', 1),
(6, 'Donomulyo', 'Donomulyo', 'Pokdarwis', 'admin', '2019-08-27 11:36:43', 0),
(7, 'Tumpang', 'Jeru', 'Pokdarwis', 'admin', '2019-08-27 11:37:17', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_wisatawan`
--

CREATE TABLE `detail_wisatawan` (
  `id` int(10) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `domestik` int(20) NOT NULL,
  `mancanegara` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(20) NOT NULL,
  `jenis_wisatawan` varchar(40) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_wisatawan`
--

INSERT INTO `detail_wisatawan` (`id`, `bulan`, `tahun`, `domestik`, `mancanegara`, `jumlah`, `timestamp`, `penginput`, `jenis_wisatawan`, `status`) VALUES
(11, 'Februari', '2017', 767211, 232671, 999882, '2019-08-10 04:43:18', 'admin', 'wisatawan_menginap', 0),
(12, 'Januari', '2016', 1001, 1001, 2002, '2019-08-10 04:44:44', 'admin', 'wisatawan_menginap', 0),
(13, 'Januari', '2017', 600000, 550000, 1150000, '2019-08-10 04:46:53', 'admin', 'wisatawan_menginap', 0),
(14, 'Januari', '2018', 1120, 754, 1874, '2019-08-10 04:49:41', 'admin', 'wisatawan_menginap', 0),
(17, 'Februari', '2018', 12111, 12221, 24332, '2019-08-10 05:05:10', 'admin', 'wisatawan_menginap', 0),
(19, 'April', '2017', 650000, 700000, 1350000, '2019-08-10 05:23:04', 'admin', 'wisatawan_menginap', 0),
(21, 'Januari', '2019', 9898, 9899, 19797, '2019-08-10 05:57:04', 'admin', 'wisatawan_menginap', 0),
(22, 'Februari', '2019', 1212, 1212, 2424, '2019-08-10 06:01:00', 'admin', 'wisatawan_menginap', 0),
(23, 'Februari', '2016', 789, 987, 1776, '2019-08-10 06:22:58', 'admin', 'wisatawan_menginap', 0),
(25, 'Januari', '2019', 10, 10, 20, '2019-08-13 13:46:50', 'admin', 'wisatawan_datang', 0),
(26, 'Januari', '2018', 1, 1, 2, '2019-08-21 16:54:10', 'admin', 'wisatawan_datang', 0),
(27, 'Februari', '2018', 22, 20, 42, '2019-08-21 16:54:28', 'admin', 'wisatawan_datang', 0),
(28, 'Januari', '2017', 12, 12, 24, '2019-08-26 15:24:19', 'admin', 'wisatawan_datang', 1),
(29, 'Januari', '2015', 1, 1, 2, '2019-08-26 15:33:28', 'admin', 'wisatawan_menginap', 1),
(30, 'Januari', '2014', 9, 9, 18, '2019-08-26 15:39:18', 'admin', 'wisatawan_datang', 1),
(31, 'Januari', '2014', 12, 12, 24, '2019-08-26 15:40:19', 'admin', 'wisatawan_menginap', 1),
(32, 'April', '2018', 12, 12, 24, '2019-09-04 15:06:59', 'admin', 'wisatawan_datang', 0),
(33, 'Januari', '2015', 123, 123, 246, '2019-09-04 15:18:29', 'admin', 'wisatawan_menginap', 0),
(34, 'Januari', '2018', 1, 1, 2, '2019-09-05 16:51:13', '', 'wisatawan_datang', 0),
(35, 'Januari', '2018', 1, 1, 2, '2019-09-05 16:51:26', '', 'wisatawan_datang', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distribusibibit`
--

CREATE TABLE `distribusibibit` (
  `id` int(11) NOT NULL,
  `jenis_bibit` int(32) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `distribusibibit`
--

INSERT INTO `distribusibibit` (`id`, `jenis_bibit`, `jumlah`, `periode`, `penginput`, `status`, `time`) VALUES
(1, 1, 10, 2018, 'admin', 0, '2019-08-31 03:23:47'),
(2, 2, 0, 2018, 'admin', 1, '2019-09-01 06:16:12'),
(3, 1, 10, 2019, 'admin', 0, '2019-09-01 06:09:17'),
(4, 2, 0, 2019, 'admin', 1, '2019-09-01 06:16:19'),
(5, 2, 1, 2019, 'admin', 0, '2019-09-01 06:32:13'),
(6, 5, 10, 2019, 'admin', 0, '2019-09-01 16:12:20'),
(7, 0, 0, 2018, 'admin', 0, '2019-09-02 02:37:56'),
(8, 5, 1, 2018, 'admin', 0, '2019-09-04 01:54:19'),
(9, 5, 9, 2015, 'admin', 0, '2019-09-05 15:13:23'),
(10, 1, 1, 2016, 'admin', 0, '2019-09-05 15:13:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekspor_impor_negara_tujuan_asal`
--

CREATE TABLE `ekspor_impor_negara_tujuan_asal` (
  `id` int(11) NOT NULL,
  `nama_negara_ekspor_impor` varchar(50) NOT NULL,
  `volume_ekspor_impor` decimal(15,2) NOT NULL,
  `nilai_ekspor_impor` decimal(15,2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ekspor_impor_negara_tujuan_asal`
--

INSERT INTO `ekspor_impor_negara_tujuan_asal` (`id`, `nama_negara_ekspor_impor`, `volume_ekspor_impor`, `nilai_ekspor_impor`, `tahun`, `penginput`, `timestamp`, `status`, `kategori`) VALUES
(1, 'Amerika', '268800.00', '513516.00', 2018, 'admin', '2019-08-04 14:51:53', 0, 'Ekspor Menurut Negara Tujuan'),
(2, 'Amerika Latin', '0.00', '0.00', 2018, 'admin', '2019-08-04 15:12:51', 0, 'Impor Menurut Negara Asal'),
(3, 'Amerika Latin', '0.00', '0.00', 2018, 'admin', '2019-08-04 15:32:33', 0, 'Ekspor Menurut Negara Tujuan'),
(7, 'Eropa', '3655646.64', '19219075.78', 2018, 'admin', '2019-08-06 02:26:14', 0, 'Impor Menurut Negara Asal'),
(8, 'Amerika', '0.00', '0.00', 2018, 'admin', '2019-08-06 02:35:35', 0, 'Impor Menurut Negara Asal'),
(9, 'Afrika', '0.00', '0.00', 2018, 'admin', '2019-08-06 03:14:58', 0, 'Impor Menurut Negara Asal'),
(10, 'Asia Barat', '0.00', '0.00', 2018, 'admin', '2019-08-06 03:15:16', 0, 'Impor Menurut Negara Asal'),
(11, 'Asia Timur', '4810725.30', '27187434.43', 2018, 'admin', '2019-08-06 03:31:13', 0, 'Impor Menurut Negara Asal'),
(12, 'Asia Tenggara', '6747952.23', '16641251.52', 2018, 'admin', '2019-08-06 03:33:16', 0, 'Impor Menurut Negara Asal'),
(13, 'Asia Selatan', '6005227.84', '12199215.33', 2018, 'admin', '2019-08-06 03:34:30', 0, 'Impor Menurut Negara Asal'),
(14, 'Asia Tengah', '0.00', '0.00', 2018, 'admin', '2019-08-06 03:35:37', 0, 'Impor Menurut Negara Asal'),
(15, 'Australia dan New Zealand', '5189153.10', '8941462.74', 2018, 'admin', '2019-08-06 03:36:13', 0, 'Impor Menurut Negara Asal'),
(16, 'Eropa', '15657590.00', '24177625.04', 2018, 'admin', '2019-08-06 04:10:51', 0, 'Ekspor Menurut Negara Tujuan'),
(17, 'Afrika', '48000.00', '332935.00', 2018, 'admin', '2019-08-06 04:19:56', 0, 'Ekspor Menurut Negara Tujuan'),
(18, 'Asia Barat', '165600.00', '994875.00', 2018, 'admin', '2019-08-06 04:20:48', 0, 'Ekspor Menurut Negara Tujuan'),
(19, 'Asia Timur', '5333430.00', '13790287.33', 2018, 'admin', '2019-08-06 04:21:38', 0, 'Ekspor Menurut Negara Tujuan'),
(20, 'Asia Tenggara', '28546440.20', '1597006984.25', 2018, 'admin', '2019-08-06 04:23:23', 0, 'Ekspor Menurut Negara Tujuan'),
(21, 'Asia Tengah', '0.00', '0.00', 2018, 'admin', '2019-08-06 04:23:35', 0, 'Ekspor Menurut Negara Tujuan'),
(22, 'Australia dan New Zealand', '10000.00', '79625.00', 2018, 'admin', '2019-08-06 04:23:57', 0, 'Ekspor Menurut Negara Tujuan'),
(23, 'Amerika Latin', '121111123.89', '123876.98', 2019, 'admin', '2019-08-27 14:40:02', 0, 'Ekspor Menurut Negara Tujuan'),
(24, 'Amerika', '111111.00', '23212.00', 2019, 'admin', '2019-08-27 15:15:49', 0, 'Impor Menurut Negara Asal'),
(25, 'Afrika', '345234.89', '456765.89', 2019, 'admin', '2019-09-03 00:13:13', 0, 'Ekspor Menurut Negara Tujuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekspor_komoditi`
--

CREATE TABLE `ekspor_komoditi` (
  `id` int(11) NOT NULL,
  `jenis_komoditi` varchar(50) NOT NULL,
  `volume_ekspor` decimal(15,2) NOT NULL,
  `nilai_ekspor` decimal(15,2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ekspor_komoditi`
--

INSERT INTO `ekspor_komoditi` (`id`, `jenis_komoditi`, `volume_ekspor`, `nilai_ekspor`, `tahun`, `penginput`, `timestamp`, `status`) VALUES
(27, 'Perkebunan', '72487174.00', '138423451.83', 2018, 'admin', '2019-07-31 00:11:27', 0),
(31, 'Perikanan dan Kelautan', '16037537.34', '20055302.86', 2018, 'admin', '2019-07-31 00:15:03', 0),
(32, 'Hutan', '38522215.16', '36487593.38', 2018, 'admin', '2019-07-31 00:15:37', 0),
(39, 'Pertanian', '0.00', '0.00', 2018, 'admin', '2019-08-04 11:14:18', 0),
(40, 'Peternakan', '0.00', '0.00', 2018, 'admin', '2019-08-04 11:14:46', 0),
(41, 'Tambang', '0.00', '0.00', 2018, 'admin', '2019-08-04 11:16:00', 0),
(42, 'Industri', '155902274.32', '207659022.56', 2018, 'admin', '2019-08-04 11:16:43', 0),
(43, 'Pertanian', '111111111.23', '3333.55', 2017, 'admin', '2019-08-08 14:13:52', 0),
(44, 'Pertanian', '123212111.89', '55.00', 2019, 'admin', '2019-08-16 06:56:43', 0),
(46, 'Perkebunan', '1.00', '1.00', 2019, 'admin', '2019-09-04 05:58:08', 0),
(47, 'Tambang', '1.00', '1.00', 2019, 'admin', '2019-09-04 05:58:24', 0),
(48, 'Industri', '1.00', '1.00', 2019, 'admin', '2019-09-04 05:58:58', 0),
(49, 'Perikanan dan Kelautan', '1.00', '1.00', 2019, 'admin', '2019-09-04 06:00:30', 0),
(50, 'Perkebunan', '1.00', '1.00', 2017, 'admin', '2019-09-04 06:02:05', 0),
(51, 'Hutan', '1.00', '1.00', 2019, 'admin', '2019-09-04 06:04:39', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `industri_kecil_rumah_tangga`
--

CREATE TABLE `industri_kecil_rumah_tangga` (
  `id` int(11) NOT NULL,
  `jenis_industri` varchar(50) NOT NULL,
  `jumlah_unit_produksi` int(11) NOT NULL,
  `jumlah_tenaga_kerja` int(11) NOT NULL,
  `jumlah_produksi` varchar(100) NOT NULL,
  `nilai_produksi` int(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `industri_kecil_rumah_tangga`
--

INSERT INTO `industri_kecil_rumah_tangga` (`id`, `jenis_industri`, `jumlah_unit_produksi`, `jumlah_tenaga_kerja`, `jumlah_produksi`, `nilai_produksi`, `tahun`, `penginput`, `timestamp`, `status`, `kategori`) VALUES
(2, 'Pengolahan Pangan', 12, 59, '1.008 KG', 2147483647, 2018, 'admin', '2019-08-11 15:04:12', 0, 'Industri Kecil'),
(4, 'Tekstil', 7, 43, '7.106 Buah', 1541900000, 2018, 'admin', '2019-08-12 01:53:03', 0, 'Industri Kecil'),
(5, 'Pengolahan Kayu', 11, 48, '90.251 Buah', 2147483647, 2018, 'admin', '2019-08-12 01:54:15', 0, 'Industri Kecil'),
(6, 'Pengolahan Pangan', 136, 377, '331.551 KG', 2147483647, 2018, 'admin', '2019-08-12 02:28:35', 0, 'Industri Rumah Tangga'),
(7, 'Tekstil', 38, 65, '103.620 Buah', 2147483647, 2018, 'admin', '2019-08-12 02:31:22', 0, 'Industri Rumah Tangga'),
(8, 'Pengolahan Kertas', 1, 12, '90.000 Buah', 60000000, 2018, 'admin', '2019-08-13 01:54:42', 0, 'Industri Kecil'),
(9, 'Barang Kulit', 4, 7, '13.540 Buah', 674700, 2018, 'admin', '2019-08-13 02:01:15', 0, 'Industri Rumah Tangga'),
(10, 'Galian Bukan Logam', 12, 17, '100 Buah', 111111111, 2019, 'admin', '2019-08-27 16:40:42', 0, 'Industri Kecil'),
(11, 'Pengolahan Kayu', 45, 54, '456 KG', 435678346, 2019, 'admin', '2019-08-29 01:05:16', 0, 'Industri Rumah Tangga'),
(12, 'Logam', 12, 34, '300 Buah', 342567432, 2018, 'admin', '2019-09-03 13:54:06', 0, 'Industri Kecil'),
(13, 'Kimia Farmasi', 34, 455, '100 KG', 342123456, 2019, 'admin', '2019-09-03 13:55:13', 0, 'Industri Rumah Tangga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inputbibit`
--

CREATE TABLE `inputbibit` (
  `id_bibit` int(11) NOT NULL,
  `bibit` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inputbibit`
--

INSERT INTO `inputbibit` (`id_bibit`, `bibit`) VALUES
(1, 'Pohon Pelindung'),
(5, 'Semak Hias');

-- --------------------------------------------------------

--
-- Struktur dari tabel `investasi_pmdn`
--

CREATE TABLE `investasi_pmdn` (
  `id` int(11) NOT NULL,
  `nama_bidang` varchar(50) NOT NULL,
  `unit_usaha` int(11) NOT NULL,
  `realisasi_investasi` decimal(15,2) NOT NULL,
  `tenaga_kerja_indonesia` int(50) NOT NULL,
  `sumber_data` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `investasi_pmdn`
--

INSERT INTO `investasi_pmdn` (`id`, `nama_bidang`, `unit_usaha`, `realisasi_investasi`, `tenaga_kerja_indonesia`, `sumber_data`, `tahun`, `penginput`, `timestamp`, `status`) VALUES
(1, 'Tanaman Pangan dan Perkebunan', 3, '22500000000.00', 800, 'DPMPTSP', 2018, 'admin', '2019-08-13 16:12:59', 0),
(2, 'Industri Makanan', 6, '111546773000.00', 1668, 'DPMPTSP', 2018, 'admin', '2019-08-13 16:19:12', 0),
(3, 'Industri Kayu', 1, '1.00', 1, 'AAA', 2019, 'admin', '2019-08-26 17:57:14', 1),
(4, 'Industri Rokok atau Tembakau', 1, '1.00', 1, 'dd', 2019, 'admin', '2019-08-26 18:01:51', 1),
(5, 'Industri Barang dari Kulit dan Alas Kaki', 3, '456786234.00', 234, 'DPMPTSP', 2019, 'admin', '2019-08-29 01:13:46', 0),
(6, 'Industri Kayu', 5, '361570346.00', 819, 'DPMPTSP', 2019, 'admin', '2019-09-03 04:43:45', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_korban`
--

CREATE TABLE `jenis_korban` (
  `id` int(20) NOT NULL,
  `jeniskorban` varchar(32) NOT NULL,
  `nol` int(11) NOT NULL,
  `sepuluh` int(11) NOT NULL,
  `duapuluh` int(11) NOT NULL,
  `tigalima` int(11) NOT NULL,
  `periode` year(4) NOT NULL,
  `status` int(11) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_korban`
--

INSERT INTO `jenis_korban` (`id`, `jeniskorban`, `nol`, `sepuluh`, `duapuluh`, `tigalima`, `periode`, `status`, `penginput`, `time`) VALUES
(1, 'Mati', 0, 0, 0, 0, 2018, 0, 'admin', '2019-08-12 07:06:10'),
(2, 'Luka', 1, 1, 1, 1, 2018, 0, 'admin', '2019-08-27 18:04:25'),
(3, 'Menderita', 0, 0, 0, 0, 2018, 0, 'admin', '2019-08-12 08:39:01'),
(4, 'Mati', 1, 0, 0, 0, 2018, 1, 'admin', '2019-08-12 12:41:14'),
(5, 'Mati', 0, 0, 0, 1, 2019, 0, 'admin', '2019-08-27 18:33:39'),
(6, 'Luka', 1, 1, 1, 1, 2019, 1, 'admin', '2019-08-12 12:40:45'),
(7, 'Mati', 1, 0, 0, 0, 2019, 1, 'admin', '2019-08-12 12:40:41'),
(8, 'Mati', 1, 0, 0, 1, 2019, 1, 'admin', '2019-08-12 12:40:37'),
(9, 'Mati', 1, 1, 0, 1, 2019, 1, 'admin', '2019-08-12 12:40:33'),
(10, 'Mati', 1, 1, 0, 1, 2018, 1, 'admin', '2019-08-12 12:41:06'),
(11, 'Mati', 1, 1, 0, 1, 2018, 1, 'admin', '2019-08-12 12:40:58'),
(12, 'Luka', 1, 1, 0, 1, 2019, 1, 'admin', '2019-08-12 12:40:29'),
(13, 'mati', 0, 0, 0, 0, 2018, 1, 'admin', '2019-08-12 12:50:08'),
(14, 'mati', 0, 0, 0, 0, 2018, 1, 'admin', '2019-08-12 13:01:51'),
(15, 'Mati', 1, 1, 1, 1, 2019, 1, 'admin', '2019-08-12 12:59:56'),
(16, 'Mati', 1, 1, 0, 1, 2019, 1, 'admin', '2019-08-12 12:59:52'),
(17, 'Mati', 1, 1, 1, 1, 2019, 1, 'admin', '2019-08-12 12:59:45'),
(18, 'Luka', 0, 0, 1, 1, 2019, 0, 'admin', '2019-08-12 15:12:16'),
(19, 'Menderita', 1, 1, 1, 1, 2019, 1, 'admin', '2019-08-18 12:15:22'),
(20, 'Menderita', 1, 1, 0, 0, 2019, 0, 'admin', '2019-08-18 12:21:29'),
(21, 'Mati', 1, 1, 1, 1, 2017, 0, 'admin', '2019-08-18 12:21:15'),
(22, 'Mati', 0, 0, 0, 0, 2019, 1, 'admin', '2019-08-26 09:30:37'),
(23, 'Luka', 1, 1, 1, 1, 2017, 0, 'admin', '2019-08-27 17:42:48'),
(24, 'Menderita', 1, 1, 1, 1, 2017, 0, 'admin', '2019-08-27 17:43:04'),
(25, 'Mati', 1, 1, 1, 1, 2015, 0, 'admin', '2019-09-05 15:06:07'),
(26, 'Luka', 1, 1, 1, 1, 2016, 0, 'admin', '2019-09-05 15:08:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_sampah`
--

CREATE TABLE `jenis_sampah` (
  `id` int(11) NOT NULL,
  `penginput` text NOT NULL,
  `periode` year(4) NOT NULL,
  `hasilsrt` int(11) NOT NULL,
  `sejenissrt` int(11) NOT NULL,
  `tertangani` int(11) NOT NULL,
  `beracun` float NOT NULL,
  `beracunterolah` float NOT NULL,
  `limbah` float NOT NULL,
  `limbahterolah` float NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_sampah`
--

INSERT INTO `jenis_sampah` (`id`, `penginput`, `periode`, `hasilsrt`, `sejenissrt`, `tertangani`, `beracun`, `beracunterolah`, `limbah`, `limbahterolah`, `waktu`, `status`) VALUES
(1, 'admin', 2018, 5573, 5573, 5461, 0, 0, 0, 278840, '2019-08-24 01:24:25', 0),
(2, 'admin', 2017, 5574, 5574, 600, 0, 0, 0, 280931, '2019-08-15 23:09:11', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_koleksi_buku`
--

CREATE TABLE `jumlah_koleksi_buku` (
  `id` int(100) NOT NULL,
  `tajuk_buku` varchar(100) NOT NULL,
  `judul` int(100) NOT NULL,
  `exemplar` int(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` int(2) NOT NULL,
  `Waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jumlah_koleksi_buku`
--

INSERT INTO `jumlah_koleksi_buku` (`id`, `tajuk_buku`, `judul`, `exemplar`, `tahun`, `status`, `Waktu`, `penginput`) VALUES
(1, 'Karya Umum', 3112, 1221, 2121, 1, '2019-08-03 15:08:13', ''),
(2, 'Karya Umum', 34, 42, 2020, 1, '2019-08-03 15:11:25', ''),
(3, 'Karya Umum', 22323, 23323, 0000, 1, '2019-08-03 15:13:46', ''),
(26, 'Sejarah dan Geografi', 15, 5, 2019, 1, '2019-08-28 04:53:09', ''),
(27, 'Ilmu-Ilmu Sosial', 56, 34, 2017, 1, '2019-09-04 17:16:05', 'admin'),
(28, 'Karya Umum', 23, 445, 2017, 1, '2019-09-04 17:19:14', 'admin'),
(29, 'Karya Umum', 252, 15, 2019, 1, '2019-09-05 03:35:36', 'admin'),
(30, 'Karya Umum', 337237, 2147483647, 2019, 1, '2019-09-05 03:48:06', 'admin'),
(31, 'Agama', 11, 2, 2019, 0, '2019-09-05 17:13:08', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_korban`
--

CREATE TABLE `jumlah_korban` (
  `id` int(11) NOT NULL,
  `bencana_alam` varchar(100) NOT NULL,
  `banyak_bencana` int(30) NOT NULL,
  `meninggal` int(30) NOT NULL,
  `luka` int(30) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `timee` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kecamatan` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jumlah_korban`
--

INSERT INTO `jumlah_korban` (`id`, `bencana_alam`, `banyak_bencana`, `meninggal`, `luka`, `periode`, `penginput`, `status`, `timee`, `kecamatan`, `desa`) VALUES
(1, '1', 1, 1, 1, 2019, 'admin', '0', '2019-08-08 05:22:03', '4', '8'),
(2, '1', 2, 1, 1, 2019, 'admin', '1', '2019-08-22 14:54:17', '2', '5'),
(3, '2', 1, 1, 1, 2018, 'admin', '0', '2019-08-08 05:50:48', '4', '8'),
(4, '1', 1, 1, 1, 2018, 'admin', '0', '2019-08-08 05:52:29', '2', '6'),
(5, '3', 1, 1, 1, 2018, 'admin', '0', '2019-08-08 05:52:54', '4', '8'),
(6, '4', 1, 1, 1, 2018, 'admin', '0', '2019-08-08 05:53:21', '2', '6'),
(7, '5', 1, 1, 1, 2018, 'admin', '0', '2019-08-08 05:53:42', '4', '7'),
(8, '1', 1, 1, 1, 2018, 'admin', '0', '2019-08-14 16:40:55', '4', '7'),
(9, '2', 1, 1, 1, 2019, 'admin', '0', '2019-08-22 14:50:57', '2', '6'),
(12, '1', 20, 1, 1, 2019, 'admin', '1', '2019-08-23 08:25:42', '2', '5'),
(13, '3', 0, 0, 0, 2019, 'admin', '0', '2019-08-22 15:44:16', '2', '6'),
(14, '4', 20, 0, 1, 2019, 'admin', '0', '2019-08-22 15:44:42', '4', '7'),
(15, '5', 0, 0, 0, 2019, 'admin', '0', '2019-08-22 15:45:11', '2', '5'),
(19, '1', 4, 1, 1, 2019, 'admin', '0', '2019-08-28 01:47:28', '2', '5'),
(21, '1', 2, 1, 1, 2019, 'admin', '0', '2019-08-28 01:47:14', '4', '8'),
(31, '5', 1, 1, 1, 2019, 'admin', '0', '2019-09-05 11:00:18', '2', '43'),
(32, '1', 1, 1, 1, 2017, 'admin', '0', '2019-09-05 14:42:14', '2', '43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_laporan_kekerasan`
--

CREATE TABLE `jumlah_laporan_kekerasan` (
  `id` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `periode` year(4) NOT NULL,
  `lfisik` int(11) NOT NULL,
  `pfisik` int(11) NOT NULL,
  `lpsikis` int(11) NOT NULL,
  `ppsikis` int(11) NOT NULL,
  `lseksual` int(11) NOT NULL,
  `pseksual` int(11) NOT NULL,
  `leksploitasi` int(11) NOT NULL,
  `peksploitasi` int(11) NOT NULL,
  `lpenelantaran` int(11) NOT NULL,
  `ppenelantaran` int(11) NOT NULL,
  `llainnya` int(11) NOT NULL,
  `plainnya` int(11) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jumlah_laporan_kekerasan`
--

INSERT INTO `jumlah_laporan_kekerasan` (`id`, `bulan`, `periode`, `lfisik`, `pfisik`, `lpsikis`, `ppsikis`, `lseksual`, `pseksual`, `leksploitasi`, `peksploitasi`, `lpenelantaran`, `ppenelantaran`, `llainnya`, `plainnya`, `penginput`, `timestamp`, `status`) VALUES
(1, 1, 2018, 0, 3, 0, 6, 1, 13, 0, 0, 0, 0, 4, 0, 'admin', '2019-08-10 09:20:24', 0),
(2, 2, 2018, 1, 0, 4, 0, 4, 7, 0, 0, 0, 0, 0, 0, 'admin', '2019-08-10 10:29:04', 0),
(4, 3, 2018, 1, 1, 1, 3, 3, 8, 0, 0, 0, 0, 5, 0, 'admin', '2019-08-10 11:07:05', 0),
(5, 1, 2017, 2, 3, 4, 12, 7, 19, 1, 2, 0, 0, 7, 0, 'admin', '2019-08-27 12:06:46', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_laporan_pengaduan_anak`
--

CREATE TABLE `jumlah_laporan_pengaduan_anak` (
  `id` int(11) NOT NULL,
  `bulan` text NOT NULL,
  `periode` year(4) NOT NULL,
  `jumlah_kasus` int(11) NOT NULL,
  `l` int(11) NOT NULL,
  `p` int(11) NOT NULL,
  `l06` int(11) NOT NULL,
  `p06` int(11) NOT NULL,
  `l712` int(11) NOT NULL,
  `p712` int(11) NOT NULL,
  `l1315` int(11) NOT NULL,
  `p1315` int(11) NOT NULL,
  `l1618` int(11) NOT NULL,
  `p1618` int(11) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jumlah_laporan_pengaduan_anak`
--

INSERT INTO `jumlah_laporan_pengaduan_anak` (`id`, `bulan`, `periode`, `jumlah_kasus`, `l`, `p`, `l06`, `p06`, `l712`, `p712`, `l1315`, `p1315`, `l1618`, `p1618`, `penginput`, `timestamp`, `status`) VALUES
(1, '1', 2018, 23, 5, 18, 2, 4, 0, 5, 1, 6, 2, 4, 'admin', '2019-08-08 11:03:12', 0),
(2, '2', 2018, 11, 4, 7, 0, 0, 1, 1, 3, 2, 0, 4, 'admin', '2019-08-08 13:39:09', 0),
(3, '3', 2018, 23, 10, 13, 0, 2, 6, 3, 1, 2, 3, 6, 'admin', '2019-08-08 17:28:27', 0),
(4, '4', 2018, 16, 3, 13, 0, 0, 1, 10, 1, 0, 1, 3, 'admin', '2019-08-08 17:29:36', 0),
(5, '5', 2018, 15, 3, 12, 1, 2, 0, 5, 2, 4, 0, 1, 'admin', '2019-08-08 17:31:34', 0),
(6, '6', 2018, 32, 4, 28, 1, 1, 0, 2, 1, 13, 2, 12, 'admin', '2019-08-08 17:33:10', 0),
(7, '1', 2019, 106, 20, 86, 0, 9, 8, 26, 8, 27, 4, 24, 'admin', '2019-09-05 13:26:03', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_laporan_pengaduan_perempuan`
--

CREATE TABLE `jumlah_laporan_pengaduan_perempuan` (
  `id` int(11) NOT NULL,
  `bulan` text NOT NULL,
  `periode` year(4) NOT NULL,
  `jumlah_kasus` int(11) NOT NULL,
  `muda` int(11) NOT NULL,
  `sedang` int(11) NOT NULL,
  `tua` int(11) NOT NULL,
  `kdrt` int(11) NOT NULL,
  `psikis` int(11) NOT NULL,
  `seksual` int(11) NOT NULL,
  `eksploitasi` int(11) NOT NULL,
  `penelantaran` int(11) NOT NULL,
  `lainnya` int(11) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jumlah_laporan_pengaduan_perempuan`
--

INSERT INTO `jumlah_laporan_pengaduan_perempuan` (`id`, `bulan`, `periode`, `jumlah_kasus`, `muda`, `sedang`, `tua`, `kdrt`, `psikis`, `seksual`, `eksploitasi`, `penelantaran`, `lainnya`, `penginput`, `timestamp`, `status`) VALUES
(1, '1', 2018, 11, 1, 9, 1, 4, 6, 1, 0, 5, 2, 'admin', '2019-08-07 14:40:01', 0),
(4, '2', 2018, 8, 2, 5, 1, 3, 2, 1, 0, 1, 1, 'admin', '2019-08-07 14:40:16', 0),
(5, '3', 2018, 8, 1, 7, 0, 6, 1, 1, 0, 0, 0, 'admin', '2019-08-07 14:41:40', 0),
(6, '4', 2018, 11, 1, 7, 3, 4, 2, 1, 0, 1, 1, 'admin', '2019-08-07 14:45:58', 0),
(7, '5', 2018, 10, 2, 7, 1, 2, 4, 1, 0, 3, 1, 'admin', '2019-08-07 14:47:13', 0),
(8, '6', 2018, 8, 3, 5, 0, 4, 2, 1, 0, 1, 1, 'admin', '2019-08-07 14:48:26', 0),
(9, '1', 2017, 51, 9, 35, 7, 13, 2, 2, 3, 4, 5, 'admin', '2019-08-27 11:38:57', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_pencari_menurut_pendidikan_ditamatkan`
--

CREATE TABLE `jumlah_pencari_menurut_pendidikan_ditamatkan` (
  `id` int(11) NOT NULL,
  `pendidikan` int(11) NOT NULL,
  `l` int(11) NOT NULL,
  `p` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jumlah_pencari_menurut_pendidikan_ditamatkan`
--

INSERT INTO `jumlah_pencari_menurut_pendidikan_ditamatkan` (`id`, `pendidikan`, `l`, `p`, `jumlah`, `periode`, `penginput`, `timestamp`, `status`) VALUES
(1, 1, 0, 0, 0, 2018, 'admin', '2019-08-24 04:32:50', 0),
(2, 2, 0, 4, 4, 2018, 'admin', '2019-08-25 11:51:48', 0),
(4, 3, 503, 226, 729, 2018, 'admin', '2019-08-25 11:28:46', 0),
(5, 4, 21599, 7127, 28726, 2018, 'admin', '2019-08-25 11:52:03', 0),
(6, 5, 1816, 2834, 4650, 2018, 'admin', '2019-08-25 11:37:07', 0),
(7, 6, 8097, 5175, 13272, 2018, 'admin', '2019-08-25 11:52:28', 0),
(8, 1, 30213, 14152, 44365, 2017, 'admin', '2019-08-27 12:27:36', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_perempuan_sebagai_kepala_keluarga`
--

CREATE TABLE `jumlah_perempuan_sebagai_kepala_keluarga` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(32) NOT NULL,
  `pekka_jumlah` int(11) NOT NULL,
  `usiapro_jumlah` int(11) NOT NULL,
  `pekka_rentan` int(11) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jumlah_perempuan_sebagai_kepala_keluarga`
--

INSERT INTO `jumlah_perempuan_sebagai_kepala_keluarga` (`id`, `kecamatan`, `pekka_jumlah`, `usiapro_jumlah`, `pekka_rentan`, `periode`, `penginput`, `timestamp`, `status`) VALUES
(1, '20', 1543, 523, 1020, 2018, 'admin', '2019-08-06 13:33:36', 0),
(2, '29', 1730, 379, 1351, 2018, 'admin', '2019-08-06 13:33:33', 0),
(3, '10', 1137, 571, 566, 2018, 'admin', '2019-08-06 13:33:29', 0),
(4, '1', 1710, 727, 983, 2018, 'admin', '2019-08-06 13:05:25', 0),
(5, '11', 1110, 521, 589, 2018, 'admin', '2019-08-29 17:17:45', 0),
(6, '23', 2052, 852, 1200, 2018, 'admin', '2019-08-06 13:33:18', 0),
(7, '30', 2562, 1110, 1352, 2018, 'admin', '2019-08-06 13:30:36', 0),
(8, '20', 1570, 530, 1040, 2019, 'admin', '2019-08-06 13:34:52', 0),
(9, '17', 1316, 529, 787, 2018, 'admin', '2019-08-06 13:39:19', 0),
(10, '5', 1015, 450, 565, 2018, 'admin', '2019-08-06 13:40:07', 0),
(11, '31', 2283, 975, 1308, 2018, 'admin', '2019-08-18 18:56:20', 0),
(12, '8', 1877, 853, 1024, 2018, 'admin', '2019-08-18 19:03:00', 0),
(13, '19', 2230, 939, 1291, 2018, 'admin', '2019-08-18 19:07:25', 0),
(14, '6', 1653, 794, 859, 2018, 'admin', '2019-08-18 19:10:37', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_phk`
--

CREATE TABLE `jumlah_phk` (
  `id` int(11) NOT NULL,
  `kasus` int(11) NOT NULL,
  `pekerja` int(11) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jumlah_phk`
--

INSERT INTO `jumlah_phk` (`id`, `kasus`, `pekerja`, `periode`, `penginput`, `timestamp`, `status`) VALUES
(1, 16, 16, 2017, 'admin', '2019-08-13 13:37:03', 0),
(2, 10, 8, 2018, 'admin', '2019-09-04 07:23:35', 0),
(3, 15, 14, 2016, 'admin', '2019-08-24 02:43:43', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kec_struktur_pemerintahan`
--

CREATE TABLE `kec_struktur_pemerintahan` (
  `id` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `desa` int(11) NOT NULL,
  `dusun` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `rt` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kec_struktur_pemerintahan`
--

INSERT INTO `kec_struktur_pemerintahan` (`id`, `kecamatan`, `desa`, `dusun`, `rw`, `rt`, `periode`, `penginput`, `waktu`, `status`) VALUES
(1, 20, 13, 39, 97, 317, 2018, 'admin', '2019-09-03 07:25:18', 0),
(4, 20, 13, 39, 97, 317, 2017, 'admin', '2019-09-03 07:34:03', 0),
(6, 29, 1, 2, 3, 4, 2019, 'admin', '2019-09-03 07:50:40', 0),
(7, 10, 1, 2, 3, 4, 2018, 'admin', '2019-09-03 13:04:15', 0),
(8, 20, 9, 3, 4, 9, 2019, 'admin', '2019-09-04 07:25:37', 1),
(9, 20, 4, 4, 4, 4, 2019, 'admin', '2019-09-04 13:05:01', 1),
(10, 24, 12, 23, 13, 41, 2018, 'admin', '2019-09-04 11:58:05', 0),
(11, 20, 1, 1, 1, 1, 2019, 'admin', '2019-09-04 13:05:12', 1),
(12, 20, 2, 2, 2, 2, 2019, 'admin', '2019-09-04 13:05:30', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok_ekonomi`
--

CREATE TABLE `kelompok_ekonomi` (
  `id_lembaga` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `jumlah` int(32) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok_ekonomi`
--

INSERT INTO `kelompok_ekonomi` (`id_lembaga`, `kecamatan`, `desa`, `jumlah`, `periode`, `penginput`, `status`, `time`) VALUES
(1, '23', '9', 2, 2018, 'admin', 0, '2019-09-03 07:10:27'),
(2, '23', '2', 1, 2019, 'admin', 0, '2019-09-03 06:47:31'),
(3, '23', '9', 1, 2019, 'admin', 0, '2019-09-03 06:49:57'),
(4, '26', '12', 2, 2018, 'admin', 0, '2019-09-03 07:10:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerjasama_media`
--

CREATE TABLE `kerjasama_media` (
  `id` int(11) NOT NULL,
  `nm_media` varchar(100) NOT NULL,
  `jumlah_krjsm` int(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kerjasama_media`
--

INSERT INTO `kerjasama_media` (`id`, `nm_media`, `jumlah_krjsm`, `kategori`, `tahun`, `penginput`, `status`, `date`) VALUES
(16, 'Bidik Nasional', 20, 'Tayang Cetak', 0000, '2017', 1, '2019-08-30 08:33:51'),
(17, 'Baratha Post', 6, 'Tayang Cetak', 2018, 'admin', 0, '2019-09-04 11:49:20'),
(18, 'Berita Pagi - SUARA MANDIRI', 2, 'Tayang Online', 2018, 'admin', 0, '2019-09-04 11:49:43'),
(19, 'BERITA lima.com', 3, 'Tayang Online', 2019, 'admin', 0, '2019-09-04 11:51:19'),
(20, 'JTV Malang', 5, 'Tayang TV', 2017, 'admin', 0, '2019-09-04 13:19:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembaga_masyarakat`
--

CREATE TABLE `lembaga_masyarakat` (
  `id_lembaga` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `jumlah` int(32) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lembaga_masyarakat`
--

INSERT INTO `lembaga_masyarakat` (`id_lembaga`, `kecamatan`, `desa`, `jumlah`, `periode`, `penginput`, `status`, `time`) VALUES
(1, '23', '1', 2, 2018, 'admin', 1, '2019-09-02 11:29:21'),
(2, '23', '2', 1, 2018, 'admin', 0, '2019-09-02 12:26:53'),
(3, '26', '11', 2, 2018, 'admin', 0, '2019-09-02 10:28:15'),
(4, '26', '12', 3, 2019, 'admin', 0, '2019-09-02 12:26:59'),
(5, '26', '1', 4, 2019, 'admin', 1, '2019-09-04 04:29:05'),
(6, '23', '4', 5, 2017, 'admin', 0, '2019-09-02 12:27:12'),
(7, '23', '9', 2, 2019, 'admin', 0, '2019-09-02 14:26:37'),
(8, '23', '2', 1, 2017, 'admin', 0, '2019-09-02 15:40:04'),
(9, '23', '9', 2, 2017, 'admin', 0, '2019-09-02 15:40:36'),
(10, '26', '11', 1, 2017, 'admin', 0, '2019-09-02 15:44:04'),
(11, '23', '7', 1, 2018, 'admin', 1, '2019-09-02 15:57:33'),
(12, '23', '5', 2, 2018, 'admin', 0, '2019-09-02 15:55:11'),
(13, '23', '1', 1, 2019, 'admin', 0, '2019-09-04 04:29:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasipemadam`
--

CREATE TABLE `lokasipemadam` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasipemadam`
--

INSERT INTO `lokasipemadam` (`id`, `lokasi`) VALUES
(1, 'Kepanjen'),
(2, 'Pendopo Malang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_pencemaran`
--

CREATE TABLE `lokasi_pencemaran` (
  `id` int(11) NOT NULL,
  `tingkat_pencemaran` varchar(100) NOT NULL,
  `jumlah_pencemaran_tanah` int(11) NOT NULL,
  `jumlah_pencemaran_air` int(11) NOT NULL,
  `jumlah_pencemaran_udara` int(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi_pencemaran`
--

INSERT INTO `lokasi_pencemaran` (`id`, `tingkat_pencemaran`, `jumlah_pencemaran_tanah`, `jumlah_pencemaran_air`, `jumlah_pencemaran_udara`, `jumlah`, `tahun`, `penginput`, `timestamp`, `status`) VALUES
(1, 'Ringan', 0, 30, 0, 30, 2018, 'admin', '2019-09-02 08:16:17', 0),
(2, 'Kronis', 333, 0, 0, 333, 2018, 'admin', '2019-09-02 08:50:06', 0),
(3, 'Ringan', 3, 4, 5, 12, 2019, 'admin', '2019-09-02 09:07:22', 0),
(4, 'Akut', 1, 1, 1, 3, 2018, 'admin', '2019-09-05 00:29:51', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_terminal`
--

CREATE TABLE `lokasi_terminal` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi_terminal` varchar(1000) NOT NULL,
  `type` varchar(11) NOT NULL,
  `luas_tanah` int(32) NOT NULL,
  `bangunan` int(32) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi_terminal`
--

INSERT INTO `lokasi_terminal` (`id_lokasi`, `lokasi_terminal`, `type`, `luas_tanah`, `bangunan`, `keterangan`, `periode`, `penginput`, `status`, `time`) VALUES
(1, '1', 'C', 5557, 0, '1', 2018, 'admin', 1, '2019-09-02 05:46:56'),
(2, '3', 'A', 5557, 0, 'Areal Parkir Kendaraan', 2018, 'admin', 0, '2019-09-02 05:42:03'),
(3, '4', 'B', 63785, 0, 'Areal Parkir Kendaraan', 2018, 'admin', 0, '2019-09-02 05:22:30'),
(4, '5', '', 1, 1, '1', 2018, 'admin', 1, '2019-09-04 02:14:07'),
(5, '5', 'C', 1, 1, 'Areal Parkir Kendaraan', 2018, 'admin', 0, '2019-09-04 02:14:53'),
(6, '3', 'A', 1, 1, 'Areal Parkir Kendaraan', 2019, 'admin', 0, '2019-09-04 02:19:08'),
(7, '1', 'B', 1, 1, 'Satu Area dengan Pasar', 2019, 'admin', 0, '2019-09-04 02:19:21'),
(8, '4', 'C', 1, 1, 'Areal Parkir Kendaraan', 2019, 'admin', 0, '2019-09-04 02:19:38'),
(9, '3', 'B', 1, 1, 'Satu Area dengan Pasar', 2019, 'admin', 0, '2019-09-05 12:54:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `luas_sawah_menurut_jenis_perairan`
--

CREATE TABLE `luas_sawah_menurut_jenis_perairan` (
  `id` int(11) NOT NULL,
  `kecamatan` text NOT NULL,
  `periode` year(4) NOT NULL,
  `irigasi` int(11) NOT NULL,
  `tadah` int(11) NOT NULL,
  `rawa_pasang` int(11) NOT NULL,
  `rawa_lebak` int(11) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `luas_sawah_menurut_jenis_perairan`
--

INSERT INTO `luas_sawah_menurut_jenis_perairan` (`id`, `kecamatan`, `periode`, `irigasi`, `tadah`, `rawa_pasang`, `rawa_lebak`, `penginput`, `timestamp`, `status`) VALUES
(1, '23', 2018, 2017, 0, 0, 0, 'admin', '2019-09-01 09:09:52', 0),
(4, '31', 2018, 1635, 1272, 0, 0, 'admin', '2019-09-01 07:08:13', 0),
(5, '26', 2018, 470, 60, 0, 0, 'admin', '2019-09-01 10:16:40', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_alatangkut`
--

CREATE TABLE `master_alatangkut` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_alatangkut`
--

INSERT INTO `master_alatangkut` (`id`, `keterangan`) VALUES
(1, 'Truk'),
(2, 'Gerobak'),
(3, 'Motor'),
(4, 'Pickup'),
(5, 'Ekskavator'),
(6, 'Buldozer'),
(8, 'Wheel Loader');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_bidang_usaha`
--

CREATE TABLE `master_bidang_usaha` (
  `id` int(11) NOT NULL,
  `sektor` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_bidang_usaha`
--

INSERT INTO `master_bidang_usaha` (`id`, `sektor`, `keterangan`) VALUES
(1, 'Tanaman Pangan', 'Sektor Primer'),
(2, 'Peternakan', 'Sektor Primer'),
(3, 'Kehutanan', 'Sektor Primer'),
(4, 'Perikanan', 'Sektor Primer'),
(5, 'Pertambangan', 'Sektor Primer'),
(6, 'Industri Makanan', 'Sektor Sekunder'),
(7, 'Industri Tekstil', 'Sektor Sekunder'),
(8, 'Industri Barang dari Kulit dan Alas Kaki', 'Sektor Sekunder'),
(9, 'Industri Kayu', 'Sektor Sekunder'),
(10, 'Industri Kertas dan Percetakan', 'Sektor Sekunder'),
(11, 'Industri Kimia dan Farmasi', 'Sektor Sekunder'),
(12, 'Industri Karet dan Plastik', 'Sektor Sekunder'),
(13, 'Industri Mineral Non Logam', 'Sektor Sekunder'),
(14, 'Industri Logam, Mesin dan Elektronik', 'Sektor Sekunder'),
(15, 'Industri Instru. Kedokteran, Presisi, Optik dan Jam', 'Sektor Sekunder'),
(16, 'Industri Kendaraan Bermotor dan Alat Transportasi Lain', 'Sektor Sekunder'),
(17, 'Industri Lainnya', 'Sektor Sekunder'),
(18, 'Listrik, Gas dan Air', 'Sektor Tersier'),
(19, 'Konstruksi', 'Sektor Tersier'),
(20, 'Perdagangan dan Reparasi', 'Sektor Tersier'),
(21, 'Hotel dan Restoran', 'Sektor Tersier'),
(22, 'Transportasi Gudang dan Komunikasi', 'Sektor Tersier'),
(23, 'Perumahan, Kawasan Ind dan Perkantoran', 'Sektor Tersier'),
(24, 'Jasa Lainnya', 'Sektor Tersier');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_bulan`
--

CREATE TABLE `master_bulan` (
  `kode` int(11) NOT NULL,
  `keterangan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_bulan`
--

INSERT INTO `master_bulan` (`kode`, `keterangan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_cabangolahraga`
--

CREATE TABLE `master_cabangolahraga` (
  `id` int(100) NOT NULL,
  `cabang_olahraga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_cabangolahraga`
--

INSERT INTO `master_cabangolahraga` (`id`, `cabang_olahraga`) VALUES
(1, 'Atletik'),
(2, 'Tenis Lapangan'),
(3, 'Senam'),
(4, 'Panahan'),
(5, 'Tenis Meja'),
(6, 'Catur'),
(7, 'Sepak Takraw'),
(8, 'Silat'),
(9, 'Renang'),
(10, 'Bola Voli Mini'),
(11, 'Bulu Tangkis'),
(12, 'Basket'),
(13, 'Bola Voly');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_daging`
--

CREATE TABLE `master_daging` (
  `id` int(11) NOT NULL,
  `daging_hewan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_daging`
--

INSERT INTO `master_daging` (`id`, `daging_hewan`) VALUES
(1, 'Sapi perah'),
(2, 'Sapi Potong'),
(3, 'Kerbau'),
(4, 'Kuda'),
(5, 'Kambing'),
(6, 'Domba'),
(7, 'Kelinci'),
(8, 'Babi'),
(9, 'Ayam Kampung'),
(10, 'Ayam Petelor'),
(11, 'Ayam Daging'),
(12, 'Itik'),
(13, 'Itik Manila'),
(14, 'Burung Puyuh'),
(15, 'Burung Dara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_desa`
--

CREATE TABLE `master_desa` (
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_desa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_desa`
--

INSERT INTO `master_desa` (`id_desa`, `id_kecamatan`, `nama_desa`) VALUES
(1, 23, 'Tulungrejo'),
(2, 23, 'Banjarejo'),
(3, 23, 'Kedungsalam'),
(4, 23, 'Tlogosari'),
(5, 23, 'Tempursari'),
(6, 23, 'Donomulyo'),
(7, 23, 'Purworejo'),
(8, 23, 'Sumberoto'),
(9, 23, 'Mentaraman'),
(10, 23, 'Purwodadi'),
(11, 26, 'Sumbermanjing Kulon'),
(12, 26, 'Pandanrejo'),
(13, 26, 'Sempol'),
(14, 26, 'Pagak'),
(15, 26, 'Tlogorejo'),
(16, 26, 'Gampingan'),
(17, 26, 'Sumberrejo'),
(18, 29, 'Bantur'),
(19, 26, 'Wonokerto'),
(20, 22, 'Sumbermanjing Wetan'),
(21, 1, 'Lebakharjo'),
(22, 20, 'Tirtomoyo'),
(23, 21, 'Argosuko'),
(24, 16, 'Wajak'),
(25, 7, 'Jeru'),
(26, 17, 'Putukrejo'),
(27, 31, 'Kalipare'),
(28, 31, 'Tumpakrejo'),
(29, 13, 'Ngebruk'),
(30, 6, 'Sukoharjo'),
(31, 10, 'Bululawang'),
(32, 27, 'Tajinan'),
(33, 14, 'Tumpang'),
(34, 5, 'Jabung'),
(35, 4, 'Mangliawan'),
(36, 12, 'Karangduren'),
(37, 24, 'Banjarsari'),
(38, 28, 'Petungsewu'),
(39, 11, 'Selorejo'),
(40, 8, 'Ampeldento'),
(41, 9, 'Watugede'),
(42, 3, 'Wonorejo'),
(43, 2, 'Pujon Lor'),
(44, 33, 'Kaumrejo'),
(45, 19, 'Kasembon'),
(46, 30, 'Gedangan'),
(47, 15, 'Sukosari'),
(48, 32, 'Kromengan'),
(49, 25, 'Wonosari'),
(50, 18, 'Pagelaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_hewan_ternak`
--

CREATE TABLE `master_hewan_ternak` (
  `id` int(5) NOT NULL,
  `hewan_ternak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_hewan_ternak`
--

INSERT INTO `master_hewan_ternak` (`id`, `hewan_ternak`) VALUES
(1, 'Sapi Perah'),
(2, 'Sapi Potong'),
(3, 'Kerbau'),
(4, 'Kuda'),
(5, 'Kambing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jenis_industri`
--

CREATE TABLE `master_jenis_industri` (
  `id` int(11) NOT NULL,
  `nama_industri` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_jenis_industri`
--

INSERT INTO `master_jenis_industri` (`id`, `nama_industri`) VALUES
(1, 'Pengolahan Pangan'),
(2, 'Tekstil'),
(3, 'Pengolahan Kayu'),
(4, 'Pengolahan Kertas'),
(5, 'Kimia Farmasi'),
(6, 'Pengolahan Karet'),
(7, 'Galian Bukan Logam'),
(8, 'Baja/Pengolahan'),
(9, 'Logam'),
(10, 'Peralatan'),
(11, 'Pertambangan'),
(12, 'Pariwisata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jenis_kelamin`
--

CREATE TABLE `master_jenis_kelamin` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_jenis_kelamin`
--

INSERT INTO `master_jenis_kelamin` (`id`, `keterangan`) VALUES
(1, 'Laki - laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jenis_sektor`
--

CREATE TABLE `master_jenis_sektor` (
  `id` int(11) NOT NULL,
  `jenis_sektor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_jenis_sektor`
--

INSERT INTO `master_jenis_sektor` (`id`, `jenis_sektor`) VALUES
(1, 'Sektor Primer'),
(2, 'Sektor Sekunder'),
(3, 'Sektor Tersier');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kecamatan`
--

CREATE TABLE `master_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_kecamatan`
--

INSERT INTO `master_kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Dampit'),
(2, 'Pujon'),
(3, 'Lawang'),
(4, 'Pakis'),
(5, 'Jabung'),
(6, 'Kepanjen'),
(7, 'Turen'),
(8, 'Karangploso'),
(9, 'Singosari'),
(10, 'Bululawang'),
(11, 'Dau'),
(12, 'Pakisaji'),
(13, 'Sumberpucung'),
(14, 'Tumpang'),
(15, 'Tirtoyudo'),
(16, 'Wajak'),
(17, 'Gondanglegi'),
(18, 'Pagelaran'),
(19, 'Kasembon'),
(20, 'Ampel Gading'),
(21, 'Poncokusumo'),
(22, 'Sumber Manjing'),
(23, 'Donomulyo'),
(24, 'Ngajum'),
(25, 'Wonosari'),
(26, 'Pagak'),
(27, 'Tajinan'),
(28, 'Wagir'),
(29, 'Bantur'),
(30, 'Gedangan'),
(31, 'Kalipare'),
(32, 'Kromengan'),
(33, 'Ngantang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kerjasama`
--

CREATE TABLE `master_kerjasama` (
  `id` int(11) NOT NULL,
  `nama_media` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_kerjasama`
--

INSERT INTO `master_kerjasama` (`id`, `nama_media`) VALUES
(1, 'Baratha Post'),
(2, 'Berita Pagi - SUARA MANDIRI'),
(3, 'BERITA lima.com'),
(4, 'Bhirawa'),
(5, 'Bidik Nasional'),
(6, 'Bisnis Surabaya'),
(7, 'Detik Kasus'),
(8, 'Global Post'),
(9, 'Harian Bangsa'),
(10, 'Ijen Pos'),
(11, 'Indonesia News'),
(12, 'Investigasi'),
(13, 'Jagad Pos'),
(14, 'Jatim Pos'),
(15, 'Jawa Pos Radar Malang'),
(16, 'JTV Malang'),
(17, 'Kabar Desa'),
(18, 'Kabar Jawa Timur'),
(19, 'Karya Rakyat'),
(20, 'Kombes Pagi'),
(21, 'Koran Door'),
(22, 'Koran Rakyat'),
(23, 'Laras Pos'),
(24, 'Lensa Barometer Indonesia'),
(25, 'Lintas Nusantara'),
(26, 'Malang News'),
(27, 'Malang Post'),
(28, 'Malang Times.com'),
(29, 'Malang TV'),
(30, 'Malangvoice.com'),
(31, 'Mata Media'),
(32, 'Mega Pos'),
(33, 'Memo Ex'),
(34, 'Memorandum Arema'),
(35, 'Metro Jatim'),
(36, 'Mitratoday.com'),
(37, 'Montera News'),
(38, 'Optimis'),
(39, 'Panji Nasional'),
(40, 'Pelita - RAKYAT.com'),
(41, 'Poros Nasional'),
(42, 'Praja Pos'),
(43, 'Radar Nasional'),
(44, 'Radar Nusantara'),
(45, 'Radar Timur'),
(46, 'Republik News'),
(47, 'Sidik Nusantara'),
(48, 'SIGAP 88.com'),
(49, 'Sorot News'),
(50, 'Suara Republik News'),
(51, 'Surya'),
(52, 'Tabloid Jawa Timur'),
(53, 'Times Indonesia'),
(54, 'Malang TV/berita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_keterangan_terminal`
--

CREATE TABLE `master_keterangan_terminal` (
  `id_keterangan` int(11) NOT NULL,
  `nama_keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_keterangan_terminal`
--

INSERT INTO `master_keterangan_terminal` (`id_keterangan`, `nama_keterangan`) VALUES
(1, 'Satu Area dengan Pasar Singosari'),
(2, 'Area Parkir Kendaraan (APK)'),
(3, 'Satu Area dengan Pasar Karangploso');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_klasifikasi`
--

CREATE TABLE `master_klasifikasi` (
  `id` int(11) NOT NULL,
  `nama_klasifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_klasifikasi`
--

INSERT INTO `master_klasifikasi` (`id`, `nama_klasifikasi`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Pengolahan Tembakau'),
(4, 'Tekstil'),
(5, 'Pakaian Jadi'),
(6, 'Kulit, Barang dari Kulit dan Alas Kaki'),
(7, 'Kayu, Barang dari Kayu dan Gabus  (Tidak Termasuk Furnitur) dan Barang Anyaman dari Bambu, Rotan dan'),
(8, 'Kertas dan Barang dari Kertas'),
(9, 'Percetakan dan Reproduksi Media Rekaman'),
(10, 'Produk dari Batu Bara dan Pengilangan Minyak Bumi'),
(11, 'Bahan Kimia dan Barang dari Bahan Kimia'),
(12, 'Farmasi, Produk Obat Kimia dan Obat Tradisional'),
(13, 'Karet, Barang dari Karet dan Plastik'),
(14, 'Barang Galian Bukan Logam'),
(15, 'Barang Logam, Bukan Mesin dan Peralatannya'),
(16, 'Kendaraan Bermotor, Trailer dan Semi Trailer'),
(17, 'Alat Angkutan Lainnya'),
(18, 'Furnitur'),
(19, 'Pengolahan Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_komoditi`
--

CREATE TABLE `master_komoditi` (
  `id` int(11) NOT NULL,
  `nama_komoditi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_komoditi`
--

INSERT INTO `master_komoditi` (`id`, `nama_komoditi`) VALUES
(1, 'Kulit'),
(2, 'Kerajinan Kayu'),
(3, 'Kerajinan Rotan'),
(4, 'Kerajinan Alumunium'),
(5, 'Mebeller'),
(6, 'Tekstil'),
(7, 'Kopi'),
(8, 'Kakao'),
(9, 'Sepatu'),
(10, 'Kertas Linier'),
(11, 'Audio dan TV Kabinet'),
(12, 'Kampas Rem'),
(13, 'Bantalan Kursi Busa'),
(14, 'Plaster Obat'),
(15, 'Sayur'),
(16, 'Kayu'),
(17, 'Makanan Olahan'),
(18, 'Cairan Obat'),
(19, 'Botol Kemasan'),
(20, 'Rokok'),
(21, 'Udang'),
(22, 'Kendang / Perkusi'),
(23, 'Cairan Infus'),
(24, 'Garmen'),
(25, 'Floring'),
(26, 'Kerajinan Besi'),
(27, 'Cengkeh'),
(28, 'Obat Gell'),
(29, 'Selai Buah'),
(30, 'Kerajinan Besi'),
(31, 'Cengkeh'),
(32, 'Obat Gell'),
(33, 'Selai Buah'),
(34, 'Home Decoration'),
(35, 'Benang'),
(36, 'Kerajinan'),
(37, 'Daun / Bunga Kering'),
(38, 'Gift Box'),
(39, 'Jelly Alga'),
(40, 'Garden Furniture'),
(41, 'Kayu Moulding'),
(42, 'Rumput Laut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_level`
--

CREATE TABLE `master_level` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_level`
--

INSERT INTO `master_level` (`id`, `kode`, `keterangan`) VALUES
(3, '1', 'Administrator'),
(5, '2', 'Audit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_negara`
--

CREATE TABLE `master_negara` (
  `id` int(11) NOT NULL,
  `nama_negara` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_negara`
--

INSERT INTO `master_negara` (`id`, `nama_negara`) VALUES
(1, 'Amerika'),
(2, 'Amerika Latin'),
(3, 'Eropa'),
(4, 'Afrika'),
(5, 'Asia Barat'),
(6, 'Asia Timur'),
(7, 'Asia Tenggara'),
(8, 'Asia Selatan'),
(9, 'Asia Tengah'),
(10, 'Australia dan New Zealand'),
(11, 'Indonesia'),
(12, 'USA'),
(13, 'Singapura'),
(14, 'Korea Selatan'),
(15, 'Malaysia'),
(16, 'Jerman'),
(17, 'Hongkong'),
(18, 'India'),
(19, 'China'),
(20, 'Perancis'),
(21, 'UK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pekerjaan`
--

CREATE TABLE `master_pekerjaan` (
  `id` int(11) NOT NULL,
  `nama_pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_pekerjaan`
--

INSERT INTO `master_pekerjaan` (`id`, `nama_pekerjaan`) VALUES
(1, 'Belum/Tidak Bekerja'),
(2, 'Mengurus Rumah Tangga'),
(3, 'Pelajar/Mahasiswa'),
(4, 'Pensiunan'),
(5, 'Pegawai Negeri Sipil'),
(6, 'Tentara Negara Indonesia'),
(7, 'Kepolisian RI'),
(8, 'Perdagangan'),
(9, 'Petani/Pekebun'),
(10, 'Peternak'),
(11, 'Nelayan/Perikanan'),
(12, 'Industri'),
(13, 'Konnstruksi'),
(14, 'Transportasi'),
(15, 'Karyawan Swasta'),
(16, 'Kayawan BUMN'),
(17, 'Karyawan BUMD'),
(18, 'Karyawan Honorer'),
(19, 'Buruh Harian lepas'),
(20, 'Buruh Tani/Perkebunan'),
(21, 'Buruh Nelayan/Perikanan'),
(22, 'Buruh Peternakan'),
(23, 'Pembantu Rumah Tangga'),
(24, 'Tukang Cukur'),
(25, 'Tukang Listrik'),
(26, 'Tukang Batu'),
(27, 'Tukang Kayu'),
(28, 'Tukang Sol Sepatu'),
(29, 'Tukang Las/Pandai Besi'),
(30, 'Tukang Jahit'),
(31, 'Tukang Gigi'),
(32, 'Penata Rias'),
(33, 'Penata Busana'),
(34, 'Penata Rambut'),
(35, 'Mekanik'),
(36, 'Seniman'),
(37, 'Tabib'),
(38, 'Paraji'),
(39, 'Perancang Busana'),
(40, 'Penerjemah'),
(41, 'Imam Mesjid'),
(42, 'Pendeta'),
(43, 'Pastor'),
(44, 'Wartawan'),
(45, 'Ustadz/Mubaligh'),
(46, 'Juru Masak'),
(47, 'Promotor Acara'),
(48, 'Anggota DPR-RI'),
(49, 'Anggota DPD'),
(50, 'Anggota BPK'),
(51, 'Presiden'),
(52, 'Wakil Presiden'),
(53, 'Anggota Mahkamah Konstitusi'),
(54, 'Anggota Kabinet/Kementrian'),
(55, 'Duta Besar'),
(56, 'Gubernur'),
(57, 'Wakil Gubernur'),
(58, 'Bupati'),
(59, 'Wakil Bupati'),
(60, 'Walikota'),
(61, 'Wakil Walikota'),
(62, 'Anggota DPRD Provinsi'),
(63, 'Anggota DPRD Kabupaten/Kota'),
(64, 'Dosen'),
(65, 'Guru'),
(66, 'Pilot'),
(67, 'Pengacara'),
(68, 'Notaris'),
(69, 'Arsitek'),
(70, 'Akuntan'),
(71, 'Konsultan'),
(72, 'Dokter'),
(73, 'Bidan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pendidikan`
--

CREATE TABLE `master_pendidikan` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_pendidikan`
--

INSERT INTO `master_pendidikan` (`id`, `keterangan`) VALUES
(1, 'Tidak/Belum Pernah Sekolah'),
(2, 'Tidak/Belum Tamat SD'),
(3, 'Tamat SD'),
(4, 'SMA'),
(5, 'Diploma'),
(6, 'Sarjana'),
(7, 'Master'),
(8, 'Doktor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pendidikan_2`
--

CREATE TABLE `master_pendidikan_2` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_pendidikan_2`
--

INSERT INTO `master_pendidikan_2` (`id`, `keterangan`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'D1-D4'),
(5, 'S1'),
(6, 'S2'),
(7, 'S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_perda`
--

CREATE TABLE `master_perda` (
  `id` int(11) NOT NULL,
  `nm_perda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_perda`
--

INSERT INTO `master_perda` (`id`, `nm_perda`) VALUES
(1, 'Sekretariat DPRD Kabupaten Malang'),
(2, 'Inspektorat Daerah Kabupaten Malang'),
(3, 'Dinas Pendidikan'),
(4, 'Dinas Kesehatan'),
(5, 'Dinas Perumahan, Kawasan Pemukiman Dan Cipta Karya'),
(6, 'Dinas Pekerjaan Umum Bina Marga'),
(7, 'Dinas Pekerjaan Umum Sumber Daya Air'),
(8, 'Dinas Sosial'),
(9, 'Dinas Tenaga Kerja'),
(10, 'Dinas Pemberdayaan Perempuan Dan Perlindungan Anak'),
(11, 'Dinas Ketahanan Pangan'),
(12, 'Dinas Lingkungan Hidup'),
(13, 'Dinas Kependudukan dan Pencatatan Sipil'),
(14, 'Dinas Pemberdayaan Masyarakat dan Desa'),
(15, 'Dinas Pengendalian Penduduk dan Keluarga Berencana'),
(16, 'Dinas Perhubungan'),
(17, 'Dinas Komunikasi Dan Informatika'),
(18, 'Dinas Koperasi Dan Usaha Mikro '),
(19, 'Dinas Penanaman Modal Dan Pelayanan Terpadu Satu Pintu'),
(20, 'Dinas Pemuda Dan Olahraga'),
(21, 'Dinas Perpustakaan Dan Arsip'),
(22, 'Dinas Pertahanan'),
(23, 'Dinas Perikanan '),
(24, 'Dinas Pariwisata dan Kebudayaan'),
(25, 'Dinas Tanaman Pangan, Hortikultura Dan Perkebunan'),
(26, 'Dinas Perindustrian Dan Perdagangan'),
(27, 'Dinas Peternakan Dan Kesehatan Hewan'),
(28, 'Badan Perencanaan Pembangunan Daerah'),
(29, 'Badan Penelitian dan Pengembangan Daerah'),
(30, 'Badan Pengelolaan Uang dan Aset Daerah'),
(31, 'Badan Pendapatan Daerah'),
(32, 'Badan Penanggulangan Bencana Daerah'),
(33, 'Bagian Administrasi Tata Pemerintahan'),
(34, 'Bagian Administrasi Kesejahteraan Rakyat '),
(35, 'Bagian Hukum'),
(36, 'Bagian Administrasi Kemasyarakatan Dan Pembinaan Mental'),
(37, 'Bagian Administrasi Perekonomian'),
(38, 'Bagian Administrasi Kerjasama '),
(39, 'Bagian Administrasi Pembangunan'),
(40, 'Bagian Administrasi Sumber Daya Alam'),
(41, 'Bagian Tata Usaha'),
(42, 'Bagian Umum'),
(43, 'Bagian Hubungan Masyarakat dan Protokol'),
(44, 'Bagian Organisasi'),
(45, 'Rumah Sakit Umum Daerah Kanjuruhan'),
(46, 'Rumah Sakit Umum Daerah Lawang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_provider`
--

CREATE TABLE `master_provider` (
  `id` int(11) NOT NULL,
  `operator_penyedia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_provider`
--

INSERT INTO `master_provider` (`id`, `operator_penyedia`) VALUES
(1, 'Jaringan Pemkab (Dinas Kominfo)'),
(2, 'Telkom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_provinsi`
--

CREATE TABLE `master_provinsi` (
  `id` int(11) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_provinsi`
--

INSERT INTO `master_provinsi` (`id`, `nama_provinsi`) VALUES
(1, 'DI Aceh'),
(2, 'Sumatra Utara'),
(3, 'Sumatra Barat'),
(4, 'Riau'),
(5, 'Jambi'),
(6, 'Sumatra Selatan'),
(7, 'Bengkulu'),
(8, 'Lampung'),
(9, 'Kalimantan Barat'),
(10, 'Kalimantan Tengah'),
(11, 'Kalimantan Selatan'),
(12, 'Kalimantan Utara'),
(13, 'Sulawesi Utara'),
(14, 'Sulawesi Tengah'),
(15, 'Sulawesi Selatan'),
(16, 'Sulawesi Tenggara'),
(17, 'Maluku/Maluku Tengah'),
(18, 'Nusa Tenggara Timur'),
(19, 'Nusa Tenggara Barat'),
(20, 'Irian Jaya'),
(21, 'Gorontalo'),
(22, 'Jawa Barat'),
(23, 'Kepulauan Riau'),
(24, 'Kepulauan Bangka Belitung'),
(25, 'Banten'),
(27, 'DKI Jakarta'),
(28, 'Jawa Tengah'),
(29, 'DI Yogyakarta'),
(30, 'Jawa Timur'),
(31, 'Bali'),
(32, 'Kalimantan Timur'),
(33, 'Sulawesi Barat'),
(34, 'Maluku Utara'),
(35, 'Papua Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_semua_ikan`
--

CREATE TABLE `master_semua_ikan` (
  `id` int(100) NOT NULL,
  `jenis_ikan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_semua_ikan`
--

INSERT INTO `master_semua_ikan` (`id`, `jenis_ikan`, `keterangan`) VALUES
(1, 'Mas', 'Air Tawar'),
(2, 'Nila', 'Air Tawar'),
(3, 'Gurame', 'Air Tawar'),
(4, 'Lele', 'Air Tawar '),
(5, 'Patin', 'Air Tawar'),
(6, 'Tuna', 'Air Laut'),
(7, 'BKK/BKB(Baby Tuna)', 'Air Laut'),
(8, 'Tongkol', 'Air Laut'),
(9, 'Albakora', 'Air Laut'),
(10, 'Bawal', 'Air Laut'),
(11, 'Kurisi', 'Air Laut'),
(12, 'Ekor Merah', 'Air Laut'),
(13, 'Salem', 'Air Laut'),
(14, 'Layur', 'Air Laut'),
(15, 'Layang', 'Air Laut'),
(16, 'Layang Kecil/Rck', 'Air Laut'),
(17, 'Tompek', 'Air Laut'),
(18, 'Lauro', 'Air Laut'),
(19, 'Teri/Ssk/Rck', 'Air Laut'),
(20, 'Gurita', 'Air Laut'),
(21, 'Marlin/Tumbuk', 'Air Laut'),
(22, 'Tengiri', 'Air Laut'),
(23, 'Kembung', 'Air Laut'),
(24, 'Lobster', 'Air Laut'),
(25, 'Kuwe(GT)', 'Air Laut'),
(26, 'Pari', 'Air Laut'),
(27, 'Kakap Merah', 'Air Laut'),
(28, 'Kerapu', 'Air Laut'),
(31, 'lainnya', 'Air Tawar'),
(32, 'lain-lain', 'Air Laut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_susu`
--

CREATE TABLE `master_susu` (
  `id` int(11) NOT NULL,
  `susu_hewan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_susu`
--

INSERT INTO `master_susu` (`id`, `susu_hewan`) VALUES
(1, 'Sapi Perah'),
(2, 'Kambing'),
(3, 'Kuda'),
(4, 'Domba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_tajuk_buku`
--

CREATE TABLE `master_tajuk_buku` (
  `id` int(100) NOT NULL,
  `tajuk_buku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_tajuk_buku`
--

INSERT INTO `master_tajuk_buku` (`id`, `tajuk_buku`) VALUES
(1, 'Karya Umum'),
(2, 'Agama'),
(3, 'Ilmu-Ilmu Sosial'),
(4, 'ilmu-Ilmu Murni'),
(5, 'Ilmu-Ilmu Terapan'),
(6, 'Kesusasteraan'),
(7, 'Sejarah dan Geografi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_terminal`
--

CREATE TABLE `master_terminal` (
  `id_terminal` int(11) NOT NULL,
  `nama_terminal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_terminal`
--

INSERT INTO `master_terminal` (`id_terminal`, `nama_terminal`) VALUES
(1, 'Tulungagung'),
(3, 'Kepanjen'),
(4, 'Dampit'),
(5, 'Singosari'),
(6, 'Turen'),
(7, 'Belakang Pasar Turen'),
(8, 'Wonosari'),
(9, 'Gondanglegi'),
(10, 'Karangploso'),
(11, 'Lawang'),
(12, 'Tumpang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_unggas`
--

CREATE TABLE `master_unggas` (
  `id` int(5) NOT NULL,
  `nama_unggas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_unggas`
--

INSERT INTO `master_unggas` (`id`, `nama_unggas`) VALUES
(1, 'Ayam Kampung'),
(2, 'Ayam Petelor'),
(3, 'Ayam Pedaging'),
(4, 'Itik'),
(5, 'Itik Manila'),
(6, 'Burung Puyuh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_unjukrasa`
--

CREATE TABLE `master_unjukrasa` (
  `id_unjukrasa` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_unjukrasa`
--

INSERT INTO `master_unjukrasa` (`id_unjukrasa`, `nama_jenis`) VALUES
(1, 'Bidang Politik'),
(3, 'Bidang Agama'),
(4, 'Bidang Lainnya'),
(5, 'Korban Meninggal'),
(6, 'Korban Luka'),
(7, 'Jumlah Pengungsi'),
(8, 'Kerugian Material'),
(10, 'Bidang Ekonomi\r\n'),
(11, 'Bidang Ekonomi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_warisan_budaya`
--

CREATE TABLE `master_warisan_budaya` (
  `id` int(5) NOT NULL,
  `warisan_budaya` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_warisan_budaya`
--

INSERT INTO `master_warisan_budaya` (`id`, `warisan_budaya`) VALUES
(1, 'Cagar Budaya'),
(2, 'Museum'),
(3, 'Arsitektur Tradisional'),
(4, 'Bahasa Daerah'),
(5, 'Kain Tradisional'),
(6, 'Kearifan Lokal'),
(7, 'Kerajinan Tradisional'),
(8, 'Kuliner Tradisional'),
(9, 'Naska Kuno'),
(10, 'Pakaian Adat'),
(11, 'Permainan Tradisional'),
(12, 'Seni Tradisional'),
(13, 'Senjata Tradisional'),
(14, 'Teknologi Tradisional'),
(15, 'Tradisi Lisan'),
(16, 'Upacara'),
(17, 'Belum Terklarifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pamongpraja`
--

CREATE TABLE `pamongpraja` (
  `id` int(11) NOT NULL,
  `jeniskelamin` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pamongpraja`
--

INSERT INTO `pamongpraja` (`id`, `jeniskelamin`, `jumlah`, `periode`, `penginput`, `status`, `time`) VALUES
(1, 'Laki-laki', 161, 2017, 'admin', 0, '2019-08-08 13:00:27'),
(2, 'Perempuan', 8, 2017, 'admin', 0, '2019-08-08 13:00:03'),
(3, 'Laki-laki', 161, 2018, 'admin', 0, '2019-08-15 04:02:40'),
(4, 'Perempuan', 9, 2018, 'admin', 1, '2019-08-12 12:11:01'),
(5, 'Laki-laki', 1, 2019, 'admin', 1, '2019-08-08 13:15:33'),
(6, 'Perempuan', 10, 2018, 'admin', 0, '2019-08-27 04:52:26'),
(7, 'Laki-laki', 161, 2019, 'admin', 1, '2019-08-28 02:19:07'),
(8, 'Perempuan', 11, 2019, 'admin', 0, '2019-08-27 04:52:49'),
(9, 'Laki-laki', 10, 2019, 'admin', 0, '2019-08-29 08:58:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasar_modern`
--

CREATE TABLE `pasar_modern` (
  `id` int(3) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `indomart` int(4) NOT NULL,
  `alfamart` int(4) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasar_modern`
--

INSERT INTO `pasar_modern` (`id`, `kecamatan`, `indomart`, `alfamart`, `jumlah`, `tahun`, `penginput`, `timestamp`, `status`) VALUES
(1, 'Dampit', 5, 3, 8, 2018, 'admin', '2019-07-29 13:25:55', 0),
(2, 'Pujon', 5, 2, 7, 2018, 'admin', '2019-07-29 13:25:55', 0),
(3, 'Lawang', 11, 8, 19, 2018, 'admin', '2019-07-29 13:25:55', 0),
(4, 'Pakis', 12, 5, 17, 2018, 'admin', '2019-07-29 13:25:55', 0),
(5, 'Jabung', 1, 1, 2, 2018, 'admin', '2019-07-29 13:25:55', 0),
(6, 'Kepanjen', 14, 5, 19, 2018, 'admin', '2019-07-29 13:25:55', 0),
(7, 'Turen', 10, 2, 12, 2018, 'admin', '2019-07-29 13:25:55', 0),
(8, 'Karangploso', 8, 5, 13, 2018, 'admin', '2019-07-29 13:25:55', 0),
(9, 'Singosari', 22, 13, 35, 2018, 'admin', '2019-07-29 13:25:55', 0),
(10, 'Bululawang', 5, 3, 8, 2018, 'admin', '2019-07-29 13:25:55', 0),
(11, 'Dau', 2, 3, 5, 2018, '', '2019-07-29 13:25:55', 0),
(12, 'Pakisaji', 7, 6, 13, 2018, '', '2019-07-29 13:25:55', 0),
(13, 'Sumberpucung', 5, 1, 6, 2018, '', '2019-07-29 13:25:55', 0),
(14, 'Tumpang', 3, 3, 6, 2018, '', '2019-07-29 13:25:55', 0),
(15, 'Tirtoyudo', 2, 0, 2, 2018, '', '2019-07-29 13:25:55', 0),
(16, 'Wajak', 3, 1, 4, 2018, '', '2019-07-29 13:25:55', 0),
(17, 'Gondanglegi', 5, 2, 7, 2018, '', '2019-07-29 13:25:55', 0),
(18, 'Pagelaran', 3, 2, 5, 2018, '', '2019-07-29 13:25:55', 0),
(19, 'Ngantang', 4, 2, 6, 2018, '', '2019-07-29 13:25:55', 0),
(20, 'Kasembon', 2, 2, 4, 2018, '', '2019-07-29 13:25:55', 0),
(21, 'Ampelgading', 2, 1, 3, 2018, 'admin', '2019-07-29 13:25:55', 0),
(22, 'Poncokusumo', 4, 0, 4, 2018, '', '2019-07-29 13:25:55', 0),
(23, 'Sumbermanjing', 3, 0, 3, 2018, '', '2019-07-29 13:25:55', 0),
(24, 'Donomulyo', 1, 0, 1, 2018, '', '2019-07-29 13:25:55', 0),
(25, 'Ngajum', 2, 0, 2, 2018, '', '2019-07-29 13:25:55', 0),
(26, 'Wonosari', 1, 0, 1, 2018, '', '2019-07-29 13:25:55', 0),
(27, 'Pagak', 2, 0, 2, 2018, '', '2019-07-29 13:25:55', 0),
(28, 'Pajinan', 2, 0, 2, 2018, '', '2019-07-29 13:25:55', 0),
(29, 'Wagir', 1, 0, 1, 2018, '', '2019-07-29 13:25:55', 0),
(30, 'Bantur', 1, 0, 1, 2018, '', '2019-07-29 13:25:55', 0),
(31, 'aaa', 1, 1, 2, 2019, 'admin', '2019-08-01 05:03:14', 1),
(32, 'Lawang', 1, 1, 2, 2020, 'admin', '2019-08-02 01:07:28', 0),
(33, 'Dampit', 2, 1, 3, 2017, 'admin', '2019-08-04 09:29:55', 1),
(34, 'Dampit', 5, 3, 8, 2018, 'admin', '2019-08-28 12:46:10', 1),
(35, 'Kepanjen', 2, 2, 4, 2019, 'admin', '2019-09-04 08:59:36', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasar_tradisional`
--

CREATE TABLE `pasar_tradisional` (
  `No` int(100) NOT NULL,
  `Nama_Pasar` varchar(100) NOT NULL,
  `Alamat_Lengkap` varchar(100) NOT NULL,
  `Luas_Lahan` int(100) NOT NULL,
  `Luas_Bangunan` int(100) NOT NULL,
  `Pengelola` varchar(100) NOT NULL,
  `Nama_Pengelola` varchar(100) NOT NULL,
  `Tahun_Berdiri` varchar(100) NOT NULL,
  `Tahun_Terakhir` varchar(100) NOT NULL,
  `Kondisi_Fisik` varchar(100) NOT NULL,
  `Tahun` year(4) NOT NULL,
  `Penginput` varchar(100) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasar_tradisional`
--

INSERT INTO `pasar_tradisional` (`No`, `Nama_Pasar`, `Alamat_Lengkap`, `Luas_Lahan`, `Luas_Bangunan`, `Pengelola`, `Nama_Pengelola`, `Tahun_Berdiri`, `Tahun_Terakhir`, `Kondisi_Fisik`, `Tahun`, `Penginput`, `Timestamp`, `Status`) VALUES
(10, 'Lawang', 'Jl. Raya Thamrin Lawang', 11650, 9100, 'Dikelola Pemerintah', 'UPPD Lawang', '1992', '2016', 'Layak Pakai', 2018, 'admin', '2019-07-29 13:23:37', 0),
(13, 'Kepanjen', 'Jl. Achmad Yani Lepanjen', 15403, 14453, 'Dikelola Pemerintah', 'UPPD Kepanjen', '', '1995', 'Kurang Baik', 2018, 'admin', '2019-07-29 13:23:37', 0),
(14, 'Singosari', 'Jl. Raya Singosari Singosari', 0, 0, 'Dikelola Pemerintah', '', '', '', '', 2018, 'admin', '2019-07-29 13:23:37', 0),
(15, 'Gondanglegi', 'Jl. Hayamwuruk No. 01 Gondanglegi', 0, 0, 'Dikelola Pemerintah', '', '', '', '', 2018, 'admin', '2019-07-29 13:23:37', 0),
(16, 'Dampit', 'Jln. Pasar Baru No. 01 Kel. Dampit Kec. Dampit', 6300, 0, 'Dikelola Pemerintah', 'UPPD Dampit', '1992', 'Unit 1 dan 2', 'Kurang Baik', 2018, 'admin', '2019-07-29 13:23:37', 0),
(17, 'Tumpang', 'Jl. Kudusan No. 250 ', 0, 0, 'Dikelola Pemerintah', '', '', '', '', 2018, 'admin', '2019-07-29 13:23:37', 0),
(18, 'aaa', 'aaa', 11, 111, 'Dikelola Masyarakat', 'aa', '1111', '111', '11', 2019, 'admin', '2019-08-01 05:02:17', 0),
(19, 'aaa', 'aaaa', 11, 11, 'Dikelola Swasta', 'aaa', '22', '33', 'aaaa', 2018, 'admin', '2019-08-02 00:27:09', 0),
(25, 'aa', 'yy', 777, 777, 'Dikelola Pemerintah', 'h', '55', '55', 'ff', 2019, 'admin', '2019-08-04 09:12:08', 0),
(27, 'nn', 'nn', 66, 77, 'Dikelola Pemerintah', 'oo', '99', '99', 'jj', 2016, 'admin', '2019-08-08 10:03:45', 0),
(29, 'lll', 'kkk', 777, 66, 'Dikelola Masyarakat', 'ghg', '111', '333', 'yy', 2015, 'admin', '2019-08-08 13:42:20', 0),
(31, 'cc', 'aa', 23, 44, 'Dikelola Masyarakat', 'ds', '1234', '2345', 'fd', 2019, 'admin', '2019-08-29 17:56:52', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan_penduduk`
--

CREATE TABLE `pekerjaan_penduduk` (
  `id` int(11) NOT NULL,
  `nama_pekerjaan` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerjaan_penduduk`
--

INSERT INTO `pekerjaan_penduduk` (`id`, `nama_pekerjaan`, `jumlah`, `tahun`, `penginput`, `timestamp`, `status`) VALUES
(1, 'Belum/Tidak Bekerja', 500980, 2018, 'admin', '2019-09-04 09:59:58', 0),
(2, 'Mengurus Rumah Tangga', 406500, 2018, 'admin', '2019-09-04 10:14:56', 0),
(3, 'Belum/Tidak Bekerja', 12345, 2019, 'admin', '2019-09-04 10:15:15', 0),
(4, 'Pelajar/Mahasiswa', 474510, 2018, 'admin', '2019-09-04 10:29:32', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemadam`
--

CREATE TABLE `pemadam` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `layak` int(11) NOT NULL,
  `tidak` int(11) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemadam`
--

INSERT INTO `pemadam` (`id`, `lokasi`, `layak`, `tidak`, `periode`, `penginput`, `status`, `time`) VALUES
(1, 'Kepanjen', 1, 1, 2016, 'admin', 0, '2019-08-28 02:03:30'),
(3, 'Pendopo Malang', 3, 2, 2016, 'admin', 0, '2019-08-07 02:28:46'),
(4, 'Kepanjen', 1, 0, 2017, 'admin', 0, '2019-08-23 12:34:20'),
(5, 'Pendopo Malang', 3, 2, 2017, 'admin', 0, '2019-08-23 12:35:43'),
(7, 'Pendopo Malang', 3, 2, 2018, 'admin', 0, '2019-08-23 12:36:23'),
(8, 'Kepanjen', 1, 1, 2018, 'admin', 0, '2019-08-23 15:12:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjungperpus_jkel`
--

CREATE TABLE `pengunjungperpus_jkel` (
  `id` int(100) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `laki_laki` int(100) NOT NULL,
  `perempuan` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` int(2) NOT NULL,
  `penginput` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunjungperpus_jkel`
--

INSERT INTO `pengunjungperpus_jkel` (`id`, `bulan`, `laki_laki`, `perempuan`, `jumlah`, `tahun`, `status`, `penginput`) VALUES
(29, 'Januari', 343, 343, 686, 2019, 1, ''),
(30, 'Februari', 24, 35, 59, 2019, 1, ''),
(31, 'Februari', 67, 34, 101, 2019, 0, 'admin'),
(32, 'Januari', 0, 0, 0, 2017, 1, 'admin'),
(33, 'Januari', 0, 0, 0, 2019, 1, 'admin'),
(34, 'Januari', 245, 266, 511, 2018, 0, 'admin'),
(35, 'Januari', 23, 34, 57, 2018, 0, 'admin'),
(36, 'Februari', 23, 45, 68, 2019, 0, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjungperpus_status_pekerjaan`
--

CREATE TABLE `pengunjungperpus_status_pekerjaan` (
  `id` int(100) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tidak_bekerja` int(100) NOT NULL,
  `pelajar` int(100) NOT NULL,
  `karyawan` int(100) NOT NULL,
  `jumlah` int(110) NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` int(2) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunjungperpus_status_pekerjaan`
--

INSERT INTO `pengunjungperpus_status_pekerjaan` (`id`, `bulan`, `tidak_bekerja`, `pelajar`, `karyawan`, `jumlah`, `tahun`, `status`, `waktu`, `penginput`) VALUES
(6, 'Maret', 23, 23, 25, 71, 2017, 1, '2019-08-28 15:06:44', ''),
(8, 'Januari', 2, 1, 3, 6, 2019, 1, '2019-08-28 15:15:38', ''),
(9, 'Januari', 3, 2, 1, 6, 2019, 1, '2019-08-28 15:18:09', ''),
(10, 'Maret', 23, 7, 6, 36, 2017, 1, '2019-09-05 00:59:46', 'admin'),
(11, 'Februari', 1, 1, 1, 3, 2019, 0, '2019-09-05 01:22:13', 'admin'),
(12, 'Januari', 23, 121, 12, 156, 2016, 0, '2019-09-05 02:14:44', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjungperpus_tingkatpend`
--

CREATE TABLE `pengunjungperpus_tingkatpend` (
  `id` int(100) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `smp` int(100) NOT NULL,
  `sma` int(100) NOT NULL,
  `perguruan_tinggi` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` int(2) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunjungperpus_tingkatpend`
--

INSERT INTO `pengunjungperpus_tingkatpend` (`id`, `bulan`, `smp`, `sma`, `perguruan_tinggi`, `jumlah`, `tahun`, `status`, `waktu`, `penginput`) VALUES
(1, 'Januari', 66565, 5645, 6556, 5, 2021, 1, '2019-08-02 09:27:43', ''),
(2, 'Januari', 67677, 7, 76, 767, 0000, 1, '2019-08-02 09:38:26', ''),
(3, 'Januari', 5656556, 56, 67, 65, 2010, 1, '2019-08-02 09:38:46', ''),
(4, 'Januari', 2332, 67676, 76767, 67676, 2021, 1, '2019-08-02 09:39:00', ''),
(5, 'Januari', 23, 23, 23, 0, 2012, 1, '2019-08-02 14:42:21', ''),
(6, 'Januari', 47, 24, 30, 101, 2010, 1, '2019-08-02 14:43:46', ''),
(7, 'Januari', 32, 232, 23, 287, 2019, 1, '2019-08-03 15:43:51', ''),
(8, 'Januari', 136, 7, 8, 151, 2019, 1, '2019-08-09 17:00:21', ''),
(9, 'Januari', 23, 23, 12, 58, 2019, 1, '2019-08-09 17:06:54', ''),
(10, 'Januari', 3, 2, 2, 7, 2019, 1, '2019-08-27 22:01:34', ''),
(11, 'Maret', 5, 5, 5, 15, 2017, 1, '2019-08-27 22:01:55', ''),
(12, 'Januari', 25, 37, 44, 106, 2010, 1, '2019-08-27 22:06:22', ''),
(13, 'Januari', 56, 8, 3, 67, 2019, 1, '2019-09-04 19:14:51', ''),
(14, 'Januari', 234, 2, 2, 238, 2019, 1, '2019-09-04 19:22:02', ''),
(15, 'Januari', 341, 7, 7, 355, 2019, 1, '2019-09-04 19:25:42', 'admin'),
(16, 'Januari', 434, 22, 11, 467, 2019, 0, '2019-09-05 01:57:16', 'admin'),
(17, 'Januari', 773, 8, 8, 789, 2019, 0, '2019-09-05 01:58:04', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung_negara`
--

CREATE TABLE `pengunjung_negara` (
  `id` int(11) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `persentase` float NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunjung_negara`
--

INSERT INTO `pengunjung_negara` (`id`, `negara`, `total`, `persentase`, `tahun`, `penginput`, `status`, `date`) VALUES
(1, 'malang', '11200', 0, 2016, 'admin', 1, '2019-08-21 04:15:13'),
(2, 'Indonesia', '11200', 0, 2016, 'admin', 1, '2019-08-21 04:38:27'),
(3, 'Mdsgjh', '12200111', 0, 2018, 'admin', 1, '2019-08-21 04:38:51'),
(4, 'Myanmar', '12', 0, 2019, 'admin', 1, '2019-08-26 07:36:11'),
(5, 'Indonesia', '110617', 0, 2018, 'admin', 0, '2019-09-03 03:37:23'),
(6, 'USA', '1814', 0, 2018, 'admin', 0, '2019-09-03 04:48:43'),
(7, 'Eropa', '1020', 0, 2018, 'admin', 0, '2019-09-03 05:31:45'),
(8, 'Asia Selatan', '583', 0, 2018, 'admin', 0, '2019-09-03 05:32:35'),
(9, 'Singapura', '289', 0, 2018, 'admin', 0, '2019-09-03 05:32:53'),
(10, 'Korea Selatan', '197', 0, 2018, 'admin', 0, '2019-09-03 05:33:15'),
(11, 'Malaysia', '187', 0, 2018, 'admin', 0, '2019-09-03 07:35:40'),
(12, 'Jerman', '150', 0, 2018, 'admin', 0, '2019-09-03 07:36:00'),
(13, 'Hongkong', '134', 0, 2018, 'admin', 0, '2019-09-03 07:36:15'),
(14, 'India', '98', 0, 2018, 'admin', 0, '2019-09-03 07:36:36'),
(15, 'Indonesia', '219669', 0, 2019, 'admin', 0, '2019-09-03 07:39:30'),
(16, 'USA', '2903', 0, 2019, 'admin', 0, '2019-09-03 07:40:18'),
(17, 'UK', '1602', 0, 2019, 'admin', 0, '2019-09-03 07:40:35'),
(18, 'Eropa', '925', 0, 2019, 'admin', 0, '2019-09-03 07:41:03'),
(19, 'Singapura', '645', 0, 2019, 'admin', 0, '2019-09-03 07:41:18'),
(20, 'China', '516', 0, 2019, 'admin', 0, '2019-09-03 07:41:35'),
(21, 'Perancis', '355', 0, 2019, 'admin', 0, '2019-09-03 07:41:55'),
(22, 'Malaysia', '274', 0, 2019, 'admin', 0, '2019-09-03 07:42:13'),
(23, 'Korea Selatan', '273', 0, 2019, 'admin', 0, '2019-09-03 07:42:57'),
(24, 'Jerman', '260', 0, 2019, 'admin', 0, '2019-09-03 07:43:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang_angkutan`
--

CREATE TABLE `penumpang_angkutan` (
  `id_penumpang` int(11) NOT NULL,
  `bulan` varchar(32) NOT NULL,
  `lawang` int(32) NOT NULL,
  `singosari` int(32) NOT NULL,
  `kepanjen` int(32) NOT NULL,
  `ngebruk` int(32) NOT NULL,
  `sumberpucung` int(32) NOT NULL,
  `jumlah` int(32) NOT NULL,
  `periode` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penumpang_angkutan`
--

INSERT INTO `penumpang_angkutan` (`id_penumpang`, `bulan`, `lawang`, `singosari`, `kepanjen`, `ngebruk`, `sumberpucung`, `jumlah`, `periode`, `penginput`, `status`, `time`) VALUES
(1, '1', 9349, 4578, 17597, 2423, 4512, 38099, 2018, 'admin', 0, '2019-09-04 14:55:21'),
(2, '2', 100, 100, 1001, 100, 100, 1401, 2019, 'admin', 0, '2019-09-04 16:22:37'),
(3, '2', 100, 100, 100, 100, 100, 500, 2018, 'admin', 1, '2019-09-04 16:29:00'),
(4, '2', 1, 1, 1, 1, 1, 5, 2018, 'admin', 0, '2019-09-04 16:35:46'),
(5, '3', 1, 1, 1, 1, 1, 5, 2018, 'admin', 0, '2019-09-04 16:35:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perangkat_daerah`
--

CREATE TABLE `perangkat_daerah` (
  `id` int(11) NOT NULL,
  `nama_perda` varchar(100) NOT NULL,
  `terhubung` varchar(100) NOT NULL,
  `akses` varchar(100) NOT NULL,
  `operator` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perangkat_daerah`
--

INSERT INTO `perangkat_daerah` (`id`, `nama_perda`, `terhubung`, `akses`, `operator`, `tahun`, `penginput`, `status`, `date`) VALUES
(1, 'sekretariat DPRD', 'ya', '10 mbps', 'Telkom', 2018, 'admin', 1, '2019-08-15 13:31:01'),
(2, 'Inspektorat Daerah Kabupaten Malang', 'Ya', '15 Mbps', 'Telkom', 2018, 'admin', 1, '2019-08-16 05:41:14'),
(3, 'Dinas Pendidikan', 'tidak', '10 Mbps', 'Jaringan Pemkab (Dinas Kominfo)', 2018, 'admin', 1, '2019-08-16 05:56:54'),
(4, 'Dinas Kesehatan', 'tidak', '30', 'Jaringan Pemkab (Dinas Kominfo)', 2017, 'admin', 1, '2019-08-16 07:56:05'),
(5, 'Dinas Sosial', 'tidak', '25', 'Jaringan Pemkab (Dinas Kominfo)', 2018, 'admin', 1, '2019-08-16 07:57:21'),
(6, 'Dinas Tenaga Kerja', 'tidak', '10', 'Telkom', 2018, 'admin', 1, '2019-08-16 07:58:48'),
(7, 'Dinas Lingkungan Hidup', 'tidak', '10', 'Telkom', 2017, 'admin', 1, '2019-08-16 08:00:45'),
(8, 'Inspektorat Daerah Kabupaten Malang', 'ya', '10', 'Jaringan Pemkab (Dinas Kominfo)', 2018, 'admin', 1, '2019-08-16 08:01:27'),
(9, 'Dinas Tenaga Kerja', 'Ya', '20', 'Telkom', 2017, 'admin', 1, '2019-08-16 08:03:51'),
(10, 'Inspektorat Daerah Kabupaten Malang', 'Tidak', '5 Mbps', 'Jaringan Pemkab (Dinas Kominfo)', 2018, 'admin', 0, '2019-08-16 08:04:51'),
(11, 'Dinas Pendidikan', 'Ya', '10 Mbps', 'Telkom', 2018, 'admin', 0, '2019-08-16 08:18:27'),
(12, 'Dinas Pendidikan', 'Tidak', '20 Mbps', 'Telkom', 2017, 'admin', 0, '2019-08-16 08:23:21'),
(13, 'Dinas Kesehatan', 'Ya', '20 Mbps', 'Telkom', 2018, 'admin', 0, '2019-08-26 12:48:38'),
(14, 'Dinas Perumahan, Kawasan Pemukiman Dan Cipta Karya', 'Ya', '10 Mbps', 'Jaringan Pemkab (Dinas Kominfo)', 2018, 'admin', 0, '2019-08-26 12:50:22'),
(15, 'Dinas Pekerjaan Umum Bina Marga', 'Ya', '10 Mbps', 'Jaringan Pemkab (Dinas Kominfo)', 2019, 'admin', 0, '2019-08-26 12:50:45'),
(16, 'Dinas Pekerjaan Umum Bina Marga', 'Ya', '10 Mbps', 'Jaringan Pemkab (Dinas Kominfo)', 2019, 'admin', 0, '2019-08-26 12:51:16'),
(17, 'Dinas Pekerjaan Umum Sumber Daya Air', 'Ya', '10 Mbps', 'Jaringan Pemkab (Dinas Kominfo)', 2019, 'admin', 0, '2019-08-26 12:53:04'),
(18, 'Dinas Sosial', 'Ya', '10 Mbps', 'Jaringan Pemkab (Dinas Kominfo)', 2019, 'admin', 0, '2019-08-26 12:53:20'),
(19, 'Dinas Tenaga Kerja', 'Ya', '20 Mbps', 'Telkom', 2019, 'admin', 1, '2019-08-26 12:53:49'),
(20, 'Dinas Pendidikan', 'Tidak', '20 Mbps', 'Telkom', 2018, 'admin', 0, '2019-09-05 17:14:21'),
(21, 'Dinas Pendidikan', 'Ya', '10 Mbps', 'Telkom', 2018, 'admin', 0, '2019-09-05 17:14:50'),
(22, 'Dinas Kesehatan', 'Tidak', '15 Mbps', 'Telkom', 2015, 'admin', 0, '2019-09-05 17:15:18'),
(23, 'Dinas Kesehatan', 'Ya', '10 Mbps', 'Jaringan Pemkab (Dinas Kominfo)', 2016, 'admin', 0, '2019-09-05 17:15:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan_klasifikasi`
--

CREATE TABLE `perusahaan_klasifikasi` (
  `id` int(11) NOT NULL,
  `nama_klasifikasi` varchar(50) NOT NULL,
  `jumlah_perusahaan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan_klasifikasi`
--

INSERT INTO `perusahaan_klasifikasi` (`id`, `nama_klasifikasi`, `jumlah_perusahaan`, `tahun`, `penginput`, `timestamp`, `status`) VALUES
(1, 'Makanan', 15, 2018, 'admin', '2019-08-27 17:13:59', 0),
(2, 'Minuman', 7, 2019, 'admin', '2019-08-27 17:13:59', 0),
(3, 'Minuman', 12, 2018, 'admin', '2019-08-27 17:23:50', 0),
(4, 'Pengolahan Tembakau', 34, 2018, 'admin', '2019-08-27 17:48:41', 0),
(5, 'Pakaian Jadi', 32, 2019, 'admin', '2019-08-27 17:48:49', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan_limbah`
--

CREATE TABLE `perusahaan_limbah` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `memiliki_limbah` int(11) NOT NULL,
  `tidak_memiliki_limbah` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan_limbah`
--

INSERT INTO `perusahaan_limbah` (`id`, `kecamatan`, `memiliki_limbah`, `tidak_memiliki_limbah`, `jumlah`, `tahun`, `penginput`, `timestamp`, `status`) VALUES
(1, 'Wagir', 3, 9, 12, 2018, 'admin', '2019-09-03 08:14:50', 0),
(2, 'Dampit', 1, 2, 3, 2019, 'admin', '2019-09-03 09:29:05', 0),
(3, 'Dampit', 1, 1, 2, 2017, 'admin', '2019-09-03 16:26:00', 0),
(4, 'Pujon', 1, 1, 2, 2017, 'admin', '2019-09-03 16:34:31', 1),
(5, 'Lawang', 1, 1, 2, 2019, 'admin', '2019-09-03 16:49:52', 0),
(6, 'Karangploso', 1, 1, 2, 2019, 'admin', '2019-09-03 16:50:17', 0),
(7, 'Pujon', 1, 1, 2, 2017, 'admin', '2019-09-03 17:19:11', 0),
(8, 'Lawang', 1, 1, 2, 2019, 'admin', '2019-09-03 17:19:21', 0),
(9, 'Pakis', 1, 1, 2, 2017, 'admin', '2019-09-03 17:19:37', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `potensi_unggulan`
--

CREATE TABLE `potensi_unggulan` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kelembagaan` varchar(100) NOT NULL,
  `potensi_unggulan` varchar(100) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(20) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potensi_unggulan`
--

INSERT INTO `potensi_unggulan` (`id`, `kecamatan`, `desa`, `kelembagaan`, `potensi_unggulan`, `keterangan`, `timestamp`, `penginput`, `status`) VALUES
(11, 'Dampit', 'Dampit', '78', 'jj1', 'Berkembang', '2019-07-30 12:22:12', 'admin', 0),
(12, 'Pujon', 'malang', '12', '21', 'Berkembang', '2019-07-30 15:09:41', 'admin', 1),
(13, 'Dampit', 'saya', 'jjah', 'gunung', 'Maju', '2019-08-13 13:49:06', 'admin', 0),
(14, 'Pakis', 'jajan', 'iisu', 'kali', 'Berpotensi', '2019-08-13 14:07:42', 'admin', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prasarana_olahraga`
--

CREATE TABLE `prasarana_olahraga` (
  `id` int(11) NOT NULL,
  `kcmtn` varchar(100) NOT NULL,
  `stadion` int(100) NOT NULL,
  `sb` int(100) NOT NULL,
  `bv` int(100) NOT NULL,
  `bb` int(100) NOT NULL,
  `tenis` int(100) NOT NULL,
  `bt` int(100) NOT NULL,
  `futsal` int(100) NOT NULL,
  `gor` int(100) NOT NULL,
  `aula` int(100) NOT NULL,
  `kr` int(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prasarana_olahraga`
--

INSERT INTO `prasarana_olahraga` (`id`, `kcmtn`, `stadion`, `sb`, `bv`, `bb`, `tenis`, `bt`, `futsal`, `gor`, `aula`, `kr`, `tahun`, `jumlah`, `penginput`, `status`, `date`) VALUES
(2, 'Tumpang', 2, 8, 7, 8, 9, 0, 9, 8, 6, 6, 2017, 63, '', 1, '2019-07-31 13:02:14'),
(3, 'Kalipare', 199, 7, 8, 9, 0, 0, 0, 0, 0, 0, 2018, 223, 'admin', 1, '2019-07-31 13:34:27'),
(4, 'Gedangan', 0, 78, 0, 0, 7, 7, 7, 7, 8, 8, 2018, 0, '', 1, '2019-07-31 14:07:11'),
(5, 'Jabung', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2018, 0, '', 1, '2019-07-31 14:15:06'),
(6, 'Ampelgading', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2018, 0, '', 1, '2019-08-01 04:54:53'),
(7, 'Donomulyo', 7, 8, 9, 0, 8, 7, 6, 5, 4, 5, 0000, 0, '', 1, '2019-08-01 05:07:20'),
(8, 'Gedangan', 5, 6, 7, 8, 9, 0, 0, 9, 8, 7, 2017, 59, '', 1, '2019-08-01 06:18:53'),
(9, 'Dampit', 5, 2, 0, 7, 9, 9, 8, 7, 6, 5, 0000, 58, '', 1, '2019-08-04 12:06:23'),
(10, 'Poncokusumo', 0, 1, 0, 9, 8, 7, 6, 6, 7, 7, 2017, 51, '', 1, '2019-08-04 12:15:46'),
(11, 'Kasembon', 4, 4, 5, 6, 7, 8, 9, 6, 4, 3, 2019, 56, 'admin', 1, '2019-08-04 12:59:31'),
(12, 'Jabung', 2, 2, 3, 2, 4, 1, 2, 3, 1, 26, 2017, 46, 'admin', 1, '2019-08-04 14:39:56'),
(13, 'Pujon', 0, 14, 10, 2, 0, 5, 2, 0, 15, 2, 2018, 50, '', 0, '2019-08-05 05:23:57'),
(14, 'Ngantang', 0, 4, 14, 3, 1, 2, 1, 0, 5, 23, 2019, 53, '', 0, '2019-08-05 05:25:48'),
(15, 'Kasembon', 0, 4, 23, 3, 2, 2, 2, 0, 0, 2, 2018, 38, 'admin', 0, '2019-08-05 05:26:38'),
(16, 'Singosari', 2, 23, 38, 26, 6, 20, 7, 0, 29, 2, 2018, 153, 'admin', 0, '2019-08-05 05:27:28'),
(17, 'Lawang', 1, 6, 3, 2, 1, 2, 2, 0, 8, 1, 2018, 26, 'admin', 0, '2019-08-05 05:28:12'),
(18, 'Karangploso', 0, 8, 9, 1, 1, 5, 3, 1, 6, 10, 2018, 44, 'admin', 0, '2019-08-05 05:29:14'),
(19, 'Dau', 1, 6, 7, 1, 2, 4, 4, 0, 6, 2, 2018, 33, 'admin', 0, '2019-08-05 05:30:06'),
(20, 'Tumpang', 1, 16, 22, 1, 1, 9, 3, 0, 9, 1, 2018, 63, 'admin', 0, '2019-08-05 07:11:31'),
(21, 'Pakis', 0, 10, 5, 4, 0, 4, 2, 0, 5, 1, 2018, 31, 'admin', 0, '2019-08-05 07:12:19'),
(22, 'Jabung', 0, 10, 4, 1, 0, 1, 2, 0, 5, 0, 2018, 23, 'admin', 1, '2019-08-05 07:14:39'),
(23, 'Dampit', 6, 5, 8, 9, 0, 8, 0, 6, 7, 6, 2018, 0, 'admin', 0, '2019-08-07 13:56:59'),
(24, 'Bantur', 6, 8, 3, 8, 8, 8, 8, 8, 1, 8, 2018, 66, '', 0, '2019-08-07 13:59:38'),
(25, 'Dau', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 2018, 0, 'admin', 0, '2019-08-07 14:01:41'),
(26, 'Dampit', 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 2019, 0, 'admin', 0, '2019-08-07 14:02:23'),
(27, 'Donomulyo', 3, 43, 4, 3, 4, 3, 4, 3, 4, 3, 2019, 0, 'admin', 0, '2019-08-08 04:56:02'),
(28, 'Bululawang', 2, 4, 5, 6, 7, 8, 8, 7, 6, 5, 2017, 58, 'admin', 1, '2019-08-08 05:11:48'),
(29, 'Bululawang', 6, 7, 6, 7, 6, 7, 6, 7, 6, 7, 2017, 65, 'admin', 1, '2019-08-08 11:07:55'),
(30, 'Dau', 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 2017, 80, 'admin', 1, '2019-08-08 11:10:07'),
(31, 'Kasembon', 6, 7, 6, 7, 6, 7, 6, 6, 6, 6, 2016, 63, 'admin', 1, '2019-08-10 01:49:25'),
(32, 'Kasembon', 6, 6, 6, 7, 6, 7, 7, 9, 9, 8, 2016, 71, 'admin', 1, '2019-08-10 01:51:01'),
(33, 'Kasembon', 8, 8, 7, 8, 76, 5, 4, 3, 4, 3, 2016, 126, 'admin', 1, '2019-08-10 01:54:01'),
(34, 'Kasembon', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2016, 10, 'admin', 1, '2019-08-10 01:55:37'),
(35, 'Kasembon', 8, 7, 7, 8, 9, 8, 9, 8, 9, 8, 2019, 81, 'admin', 1, '2019-08-10 01:57:19'),
(36, 'Kasembon', 3, 2, 3, 2, 3, 2, 3, 2, 2, 2, 2016, 24, 'admin', 1, '2019-08-10 02:00:00'),
(37, 'Kasembon', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 2016, 30, 'admin', 1, '2019-08-10 02:01:26'),
(38, 'Kasembon', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2016, 10, 'admin', 1, '2019-08-10 02:05:07'),
(39, 'Kasembon', 2, 3, 3, 2, 4, 3, 4, 3, 4, 3, 2016, 31, 'admin', 1, '2019-08-10 02:12:46'),
(40, 'Kasembon', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2016, 10, 'admin', 1, '2019-08-10 02:13:41'),
(41, 'Kasembon', 2, 2, 2, 2, 2, 2, 22, 2, 2, 2, 2016, 40, 'admin', 1, '2019-08-10 02:16:36'),
(42, 'Kasembon', 3, 4, 3, 4, 5, 7, 8, 9, 7, 6, 2016, 56, 'admin', 1, '2019-08-10 02:21:00'),
(43, 'Kasembon', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2016, 20, 'admin', 1, '2019-08-10 02:23:58'),
(44, 'Kasembon', 1, 21, 1, 2, 1, 2, 1, 2, 1, 2, 2016, 34, 'admin', 1, '2019-08-10 02:24:49'),
(45, 'Kalipare', 5, 5, 5, 5, 55, 5, 5, 5, 5, 5, 2017, 100, 'admin', 1, '2019-08-10 02:25:22'),
(46, 'Kasembon', 5, 4, 5, 4, 5, 4, 4, 5, 4, 5, 2016, 45, 'admin', 1, '2019-08-10 02:32:00'),
(47, 'Kasembon', 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 2017, 45, 'admin', 1, '2019-08-10 02:47:00'),
(48, 'Kasembon', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2019, 10, 'admin', 0, '2019-08-27 03:50:11'),
(49, 'Gedangan', 1, 2, 3, 1, 2, 1, 2, 1, 2, 1, 2019, 0, 'admin', 0, '2019-08-27 05:54:01'),
(50, 'Kasembon', 2, 3, 2, 3, 2, 3, 2, 3, 2, 3, 2014, 0, 'admin', 1, '2019-08-27 05:54:56'),
(51, 'Kasembon', 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 2016, 0, 'admin', 1, '2019-08-27 05:56:55'),
(52, 'Dampit', 88, 2, 3, 2, 3, 2, 2, 3, 3, 2, 2013, 110, '', 0, '2019-08-31 14:13:10'),
(53, 'Ampelgading', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2013, 10, '', 0, '2019-09-04 15:36:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi_daging`
--

CREATE TABLE `produksi_daging` (
  `id` int(11) NOT NULL,
  `jenis_daging` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `total_produksi` decimal(15,2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produksi_daging`
--

INSERT INTO `produksi_daging` (`id`, `jenis_daging`, `satuan`, `total_produksi`, `tahun`, `penginput`, `timestamp`, `status`) VALUES
(1, 'Sapi Perah', 'kg', '1201200.00', 2018, 'admin', '2019-08-28 11:45:31', 0),
(2, 'Sapi Potong', '', '134231.00', 2018, 'admin', '2019-08-28 11:54:32', 1),
(3, 'Kerbau', 'kg', '234567.70', 2018, 'admin', '2019-08-28 11:55:27', 0),
(4, 'Sapi Potong', 'kg', '123432132.00', 2019, 'admin', '2019-08-29 07:57:47', 0),
(5, 'Kuda', 'kg', '123123123.00', 2019, 'admin', '2019-08-29 07:58:01', 0),
(6, 'Kambing', 'kg', '4562314.00', 2018, 'admin', '2019-08-29 07:58:33', 1),
(7, 'Itik', 'kg', '1987654.00', 2017, 'admin', '2019-09-03 15:02:18', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi_ikan`
--

CREATE TABLE `produksi_ikan` (
  `id` int(100) NOT NULL,
  `jenis_ikan` varchar(100) NOT NULL,
  `jenis_air` varchar(100) NOT NULL,
  `produksi` float NOT NULL,
  `nilai_produksi` float NOT NULL,
  `tahun` year(4) NOT NULL,
  `Waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL,
  `penginput` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produksi_ikan`
--

INSERT INTO `produksi_ikan` (`id`, `jenis_ikan`, `jenis_air`, `produksi`, `nilai_produksi`, `tahun`, `Waktu`, `status`, `penginput`) VALUES
(20, 'Mas', 'Air Tawar', 3432, 2323, 2018, '2019-08-09 13:35:56', 1, ''),
(21, 'Tuna', 'Air Laut', 445, 4556, 2019, '2019-08-09 13:49:57', 1, ''),
(22, 'Mas', 'Air Tawar', 3445, 4343, 2015, '2019-08-09 14:02:17', 1, ''),
(23, 'Lele', 'Air Tawar ', 22, 33, 2019, '2019-08-09 17:09:05', 0, ''),
(24, 'Tuna', 'Air Laut', 15, 10000, 2019, '2019-08-28 05:05:01', 0, ''),
(25, 'Gurame', 'Air Tawar', 23444, 12334, 2017, '2019-09-03 16:12:14', 0, ''),
(26, 'Mas', 'Air Tawar', 1332, 1233, 2019, '2019-09-04 13:27:13', 0, ''),
(28, 'Mas', 'Air Tawar', 24, 23, 2019, '2019-09-04 13:35:07', 0, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi_perikanan`
--

CREATE TABLE `produksi_perikanan` (
  `id` int(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `perikanan_laut` float NOT NULL,
  `perikanan_umum` float NOT NULL,
  `tahun` year(4) NOT NULL,
  `Waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL,
  `penginput` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produksi_perikanan`
--

INSERT INTO `produksi_perikanan` (`id`, `kecamatan`, `perikanan_laut`, `perikanan_umum`, `tahun`, `Waktu`, `status`, `penginput`) VALUES
(31, 'Donomulyo', 3232, 23, 2019, '2019-09-04 05:56:11', 0, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi_susu`
--

CREATE TABLE `produksi_susu` (
  `id` int(11) NOT NULL,
  `jenis_susu_hewan` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `total_produksi` decimal(15,2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produksi_susu`
--

INSERT INTO `produksi_susu` (`id`, `jenis_susu_hewan`, `satuan`, `total_produksi`, `tahun`, `penginput`, `timestamp`, `status`) VALUES
(1, 'Sapi Perah', 'liter', '196332000.00', 2018, 'admin', '2019-09-02 10:36:58', 0),
(2, 'Kambing', 'liter', '156763456.00', 2018, 'admin', '2019-09-02 10:46:14', 0),
(3, 'Kuda', 'liter', '231456432.00', 2019, 'admin', '2019-09-02 10:46:34', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi_telur`
--

CREATE TABLE `produksi_telur` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `hewan` varchar(30) NOT NULL,
  `tahun` int(4) NOT NULL,
  `per_butir` int(20) NOT NULL,
  `per_kg` int(20) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `penginput` varchar(30) NOT NULL,
  `status` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produksi_telur`
--

INSERT INTO `produksi_telur` (`id`, `kecamatan`, `hewan`, `tahun`, `per_butir`, `per_kg`, `jumlah`, `penginput`, `status`, `timestamp`) VALUES
(1, 'Donomulyo', 'Itik', 2016, 100, 75, 175, 'admin', 0, '2019-09-03 07:49:44'),
(2, 'Bantur', 'Itik Manila', 2017, 101, 101, 202, 'admin', 1, '2019-09-03 09:26:12'),
(3, 'Donomulyo', 'Burung Puyuh', 2018, 10000, 10000, 20000, 'admin', 0, '2019-09-03 10:21:08'),
(4, 'Ampelgading', 'Ayam Pedaging', 2019, 121, 212, 333, 'admin', 0, '2019-09-03 12:57:19'),
(5, 'Bantur', 'Ayam Kampung', 2017, 313, 212, 525, 'admin', 0, '2019-09-03 13:35:00'),
(6, 'Bantur', 'Burung Puyuh', 2017, 222, 333, 555, 'admin', 0, '2019-09-03 13:36:57'),
(7, 'Bantur', 'Ayam Kampung', 2017, 321, 123, 444, 'admin', 0, '2019-09-03 13:37:29'),
(8, 'Donomulyo', 'Burung Puyuh', 2017, 121, 120, 241, 'admin', 0, '2019-09-03 16:26:27'),
(9, 'Donomulyo', 'Itik', 2017, 987, 987, 1974, 'admin', 0, '2019-09-04 05:37:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sarana`
--

CREATE TABLE `sarana` (
  `id` int(11) NOT NULL,
  `aparatpp` int(11) NOT NULL,
  `aparat_linmas` int(11) NOT NULL,
  `petugas_satpol` int(11) NOT NULL,
  `petugas_pp` int(11) NOT NULL,
  `pos_keamanan` int(11) NOT NULL,
  `pos_kamling` int(11) NOT NULL,
  `roda2` int(11) NOT NULL,
  `roda4` int(11) NOT NULL,
  `periode` year(4) NOT NULL,
  `status` int(11) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sarana`
--

INSERT INTO `sarana` (`id`, `aparatpp`, `aparat_linmas`, `petugas_satpol`, `petugas_pp`, `pos_keamanan`, `pos_kamling`, `roda2`, `roda4`, `periode`, `status`, `penginput`, `time`) VALUES
(1, 160, 0, 0, 0, 0, 0, 0, 0, 2018, 0, 'admin', '2019-08-28 11:47:17'),
(5, 161, 0, 0, 0, 0, 0, 0, 0, 2019, 0, 'admin', '2019-08-28 12:44:40'),
(6, 162, 0, 0, 0, 0, 0, 0, 0, 2017, 1, 'admin', '2019-08-28 12:45:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sarana_perdagangan`
--

CREATE TABLE `sarana_perdagangan` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `pasar_umum` int(11) NOT NULL,
  `toko` int(11) NOT NULL,
  `rumah_makan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sarana_perdagangan`
--

INSERT INTO `sarana_perdagangan` (`id`, `kecamatan`, `pasar_umum`, `toko`, `rumah_makan`, `tahun`, `penginput`, `timestamp`, `status`) VALUES
(1, 'Ampelgading', 1, 1, 0, 2018, 'admin', '2019-07-29 13:29:30', 0),
(4, 'Dampit', 1, 0, 0, 2018, 'admin', '2019-07-29 13:29:30', 0),
(5, 'Pujon', 1, 1, 0, 2018, '', '2019-07-29 13:29:30', 0),
(6, 'Lawang', 1, 1, 0, 2018, '', '2019-07-29 13:29:30', 0),
(7, 'Pakis', 1, 3, 0, 2018, '', '2019-07-29 13:29:30', 0),
(8, 'Jabung', 1, 0, 0, 2018, 'admin', '2019-07-29 13:29:30', 0),
(9, 'Kepanjen', 2, 4, 0, 2018, '', '2019-07-29 13:29:30', 0),
(10, 'Turen', 2, 3, 0, 2018, '', '2019-07-29 13:29:30', 0),
(11, 'Karangploso', 2, 2, 0, 2018, 'admin', '2019-07-29 13:29:30', 0),
(12, 'Singosari', 1, 3, 0, 2018, '', '2019-07-29 13:29:30', 0),
(13, 'Bululawang', 2, 1, 0, 2018, 'admin', '2019-07-29 13:29:30', 0),
(14, 'Dau', 0, 3, 0, 2018, 'admin', '2019-07-29 13:29:30', 0),
(15, 'Pakisaji', 1, 2, 0, 2018, '', '2019-07-29 13:29:30', 0),
(16, 'Sumberpucung', 2, 0, 0, 2018, '', '2019-07-29 13:29:30', 0),
(17, 'Tumpang', 2, 3, 0, 2018, '', '2019-07-29 13:29:30', 0),
(18, 'Tirtoyudo', 1, 0, 0, 2018, '', '2019-07-29 13:29:30', 0),
(19, 'Wajak', 1, 4, 0, 2018, '', '2019-07-29 13:29:30', 0),
(20, 'Gondanglegi', 1, 2, 0, 2018, 'admin', '2019-07-29 13:29:30', 0),
(21, 'Pagelaran', 0, 0, 0, 2018, '', '2019-07-29 13:29:30', 0),
(22, 'Kasembon', 0, 0, 0, 2018, 'admin', '2019-07-29 13:29:30', 0),
(23, 'Poncokusumo', 1, 1, 0, 2018, '', '2019-07-29 13:29:30', 0),
(24, 'Sumbermanjing', 1, 1, 0, 2018, '', '2019-07-29 13:29:30', 0),
(25, 'Donomulyo', 2, 1, 0, 2018, 'admin', '2019-07-29 13:29:30', 0),
(26, 'Ngajum', 0, 0, 0, 2018, '', '2019-07-29 13:29:30', 0),
(27, 'Wonosari', 0, 0, 0, 2018, '', '0000-00-00 00:00:00', 0),
(28, 'Pagak', 2, 0, 0, 2018, '', '2019-07-29 13:29:30', 0),
(29, 'Tajinan', 1, 2, 0, 2018, '', '2019-07-29 13:29:30', 0),
(30, 'Wagir', 0, 2, 0, 2018, '', '2019-07-29 13:29:30', 0),
(31, 'Bantur', 2, 0, 0, 2018, 'admin', '2019-07-29 13:29:30', 0),
(32, 'Gedangan', 0, 0, 0, 2018, 'admin', '2019-07-29 13:29:30', 0),
(33, 'Kalipare', 1, 0, 0, 2018, 'admin', '2019-07-29 13:29:30', 0),
(34, 'Kromengan', 0, 0, 0, 2018, '', '2019-07-29 13:29:30', 0),
(35, 'Ngantang', 1, 1, 0, 2018, '', '2019-07-29 13:29:30', 0),
(36, 'Pujon', 2, 2, 2, 2019, 'admin', '2019-08-08 14:04:55', 0),
(37, 'Singosari', 1, 1, 1, 2016, 'admin', '2019-08-16 06:55:32', 0),
(38, 'Dampit', 9, 9, 9, 2017, 'admin', '2019-08-16 07:04:16', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sektor_penanaman_modal`
--

CREATE TABLE `sektor_penanaman_modal` (
  `id` int(100) NOT NULL,
  `sektor` varchar(100) NOT NULL,
  `jenis_sektor` varchar(100) NOT NULL,
  `nilai_pma` decimal(15,2) NOT NULL,
  `unit_pma` varchar(100) NOT NULL,
  `nilai_pmdn` decimal(15,2) NOT NULL,
  `unit_pmdn` varchar(100) NOT NULL,
  `nilai_non` decimal(15,2) NOT NULL,
  `unit_non` varchar(100) NOT NULL,
  `tenaga_kerja` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sektor_penanaman_modal`
--

INSERT INTO `sektor_penanaman_modal` (`id`, `sektor`, `jenis_sektor`, `nilai_pma`, `unit_pma`, `nilai_pmdn`, `unit_pmdn`, `nilai_non`, `unit_non`, `tenaga_kerja`, `tahun`, `penginput`, `status`, `date`) VALUES
(23, 'Tanaman', 'P', '9.00', '9', '9.00', '9', '9.00', '9', '9', 2009, '', 1, '2019-09-02 12:16:19'),
(24, 'Industri Makanan', 'Sektor Sekunder', '189157701953.00', '4', '1211628101033.00', '5', '111546773000.00', '6', '1668', 2017, 'admin', 0, '2019-09-02 12:44:02'),
(25, 'Industri Tekstil', 'Sektor Sekunder', '0.00', '0', '648264762008.00', '2', '5909500000.00', '2', '240', 2017, 'admin', 0, '2019-09-02 12:45:38'),
(26, 'Listrik, Gas dan Air', 'Sektor Tersier', '36820646070.00', '2', '21308000000.00', '4', '0.00', '21990990', '0', 2018, 'admin', 0, '2019-09-02 12:48:01'),
(27, 'Perdagangan dan Reparasi', 'Sektor Tersier', '11.00', '12', '13.00', '14', '15.00', '9', '1700', 2013, 'admin', 0, '2019-09-05 04:00:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak_dipotong`
--

CREATE TABLE `ternak_dipotong` (
  `id` int(5) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `nama_ternak` varchar(40) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `status` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ternak_dipotong`
--

INSERT INTO `ternak_dipotong` (`id`, `kecamatan`, `nama_ternak`, `jumlah`, `tahun`, `status`, `timestamp`, `penginput`) VALUES
(1, 'Donomulyo', 'Kerbau', 10, '2018', 0, '2019-08-25 12:06:54', 'admin'),
(2, 'Kalipare', 'Kuda', 5, '2018', 0, '2019-08-25 12:11:07', 'admin'),
(3, 'Pagak', 'Kambing', 15, '2019', 0, '2019-08-25 12:45:19', 'admin'),
(4, 'Donomulyo', 'Kerbau', 20, '2017', 1, '2019-08-25 13:17:54', 'admin'),
(5, 'Kalipare', 'Kuda', 25, '2017', 0, '2019-08-25 13:38:53', 'admin'),
(6, 'Ampelgading', 'Kambing', 5, '2017', 1, '2019-08-25 13:40:44', 'admin'),
(7, 'Donomulyo', 'Kuda', 10, '2017', 1, '2019-08-29 11:10:42', 'admin'),
(8, 'Ampelgading', 'Kambing', 10, '2019', 1, '2019-08-30 08:35:28', 'admin'),
(9, 'Donomulyo', 'Kambing', 2015, '2017', 0, '2019-08-30 09:05:22', 'admin'),
(10, 'Donomulyo', 'Sapi Perah', 111, '2017', 0, '2019-08-30 09:05:36', 'admin'),
(11, 'Donomulyo', 'Sapi Potong', 1000, '2019', 0, '2019-08-30 09:09:12', 'admin'),
(12, 'Ampelgading', 'Sapi Potong', 122, '2019', 0, '2019-08-30 15:11:17', 'admin'),
(13, 'Ampelgading', 'Kerbau', 12, '2019', 0, '2019-08-30 15:11:23', 'admin'),
(14, 'Ampelgading', 'Kuda', 32, '2019', 0, '2019-08-30 15:11:36', 'admin'),
(15, 'Donomulyo', 'Kerbau', 11212, '2017', 0, '2019-08-31 15:33:39', 'admin'),
(16, 'Donomulyo', 'Sapi Potong', 111, '2017', 0, '2019-08-31 15:33:49', 'admin'),
(17, 'Donomulyo', 'Kerbau', 321, '2017', 0, '2019-09-04 16:21:24', 'admin'),
(18, 'Donomulyo', 'Sapi Potong', 1, '2017', 0, '2019-09-05 17:09:18', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tower`
--

CREATE TABLE `tower` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `jml_tower` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tower`
--

INSERT INTO `tower` (`id`, `kecamatan`, `jml_tower`, `tahun`, `penginput`, `status`, `date`) VALUES
(1, 'Ampelgading', 10, 2018, 'admin', 1, '2019-08-20 07:30:32'),
(2, 'Ampelgading', 10, 2017, 'admin', 0, '2019-08-20 07:33:29'),
(3, 'Bantur', 19, 2017, 'admin', 0, '2019-08-20 07:33:46'),
(4, 'Bululawang', 15, 2017, 'admin', 0, '2019-08-20 07:34:17'),
(5, 'Dampit', 26, 2017, 'admin', 0, '2019-08-20 07:34:31'),
(6, 'Dau', 24, 2017, 'admin', 0, '2019-08-20 07:34:53'),
(7, 'Donomulyo', 13, 2017, 'admin', 0, '2019-08-20 07:35:08'),
(8, 'Gedangan', 6, 2017, 'admin', 0, '2019-08-20 07:36:09'),
(9, 'Gondanglegi', 21, 2017, 'admin', 0, '2019-08-20 07:36:23'),
(10, 'Jabung', 9, 2017, 'admin', 0, '2019-08-20 07:36:39'),
(11, 'Kalipare', 14, 2017, 'admin', 0, '2019-08-20 07:36:54'),
(12, 'Ampelgading', 10, 2018, 'admin', 0, '2019-08-20 07:37:30'),
(13, 'Bantur', 19, 2018, 'admin', 0, '2019-08-20 07:37:43'),
(14, 'Bululawang', 15, 2018, 'admin', 0, '2019-08-20 07:38:01'),
(15, 'Dampit', 26, 2018, 'admin', 0, '2019-08-20 07:38:24'),
(16, 'Dau', 24, 2018, 'admin', 0, '2019-08-20 07:38:37'),
(17, 'Donomulyo', 13, 2018, 'admin', 0, '2019-08-20 07:38:52'),
(18, 'Gedangan', 6, 2018, 'admin', 0, '2019-08-20 07:39:07'),
(19, 'Gondanglegi', 21, 2018, 'admin', 0, '2019-08-20 07:39:24'),
(20, 'Jabung', 10, 2018, 'admin', 0, '2019-08-20 07:39:38'),
(21, 'Kalipare', 15, 2018, 'admin', 1, '2019-08-20 07:40:01'),
(22, 'Gedangan', 20, 2015, '', 0, '2019-08-27 15:14:12'),
(23, 'Bantur', 25, 2015, 'admin', 0, '2019-08-27 15:15:26'),
(24, 'Kasembon', 6, 2009, '', 1, '2019-09-04 13:16:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tps`
--

CREATE TABLE `tps` (
  `id` int(11) NOT NULL,
  `penginput` text NOT NULL,
  `periode` year(4) NOT NULL,
  `TPS` int(11) NOT NULL,
  `TPST` int(11) NOT NULL,
  `TPAlokal` int(11) NOT NULL,
  `TPAregional` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tps`
--

INSERT INTO `tps` (`id`, `penginput`, `periode`, `TPS`, `TPST`, `TPAlokal`, `TPAregional`, `waktu`, `status`) VALUES
(1, 'admin', 2018, 212, 45, 3, 0, '2019-08-04 08:33:59', 0),
(2, 'admin', 2019, 0, 0, 0, 0, '2019-08-04 08:33:42', 1),
(3, 'admin', 2009, 214, 123, 123, 234, '2019-08-04 09:20:07', 1),
(4, 'admin', 2017, 210, 42, 2, 0, '2019-08-04 09:20:24', 0),
(5, 'admin', 2019, 212, 45, 3, 2, '2019-09-04 22:52:56', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transmigrasi`
--

CREATE TABLE `transmigrasi` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `laki_laki` int(11) NOT NULL,
  `perempuan` int(11) NOT NULL,
  `rumah_tangga` int(11) NOT NULL,
  `jiwa` int(11) NOT NULL,
  `penginput` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transmigrasi`
--

INSERT INTO `transmigrasi` (`id`, `kecamatan`, `provinsi`, `bulan`, `tahun`, `laki_laki`, `perempuan`, `rumah_tangga`, `jiwa`, `penginput`, `timestamp`, `status`) VALUES
(1, 'Ampelgading', 'Jawa Barat', 'Juli', 2018, 1, 2, 1, 3, 'admin', '2019-09-01 10:53:48', 0),
(2, 'Pagak', 'Riau', 'Januari', 2019, 2, 3, 1, 5, 'admin', '2019-09-01 12:02:50', 0),
(3, 'Dampit', 'DI Aceh', 'Januari', 2019, 2, 2, 2, 4, 'admin', '2019-09-01 04:54:52', 0),
(4, 'Lawang', 'Jawa Barat', 'Januari', 2018, 1, 1, 1, 2, 'admin', '2019-09-01 12:58:53', 0),
(5, 'Dampit', 'Riau', 'Februari', 2019, 2, 2, 1, 4, 'admin', '2019-09-01 13:02:29', 0),
(6, 'Pakis', 'Jawa Barat', 'Maret', 2019, 2, 3, 1, 5, 'admin', '2019-09-03 01:11:43', 0),
(7, 'Bululawang', 'Jambi', 'April', 2018, 1, 2, 1, 3, '', '2019-09-04 16:23:59', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unjukrasa`
--

CREATE TABLE `unjukrasa` (
  `id` int(11) NOT NULL,
  `unjukrasa` varchar(100) NOT NULL,
  `jumlah` int(32) NOT NULL,
  `periode` year(4) NOT NULL,
  `status` int(11) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unjukrasa`
--

INSERT INTO `unjukrasa` (`id`, `unjukrasa`, `jumlah`, `periode`, `status`, `penginput`, `time`) VALUES
(33, 'Bidang Politik', 1, 2019, 0, 'admin', '2019-09-05 14:56:02'),
(34, 'Bidang Ekonomi', 1, 2019, 0, 'admin', '2019-09-05 14:56:02'),
(35, 'Bidang Agama', 1, 2019, 0, 'admin', '2019-09-05 14:56:02'),
(36, 'Bidang Lainnya', 1, 2019, 0, 'admin', '2019-09-05 14:56:02'),
(37, 'Korban Meninggal', 1, 2019, 0, 'admin', '2019-09-05 14:56:02'),
(38, 'Korban Luka', 1, 2019, 0, 'admin', '2019-09-05 14:56:02'),
(39, 'Jumlah Pengungsi', 1, 2019, 0, 'admin', '2019-09-05 14:56:02'),
(40, 'Kerugian Material', 1, 2019, 0, 'admin', '2019-09-05 14:56:02'),
(49, 'Bidang Politik', 1, 2018, 0, 'admin', '2019-09-05 15:05:41'),
(50, 'Bidang Ekonomi', 1, 2018, 0, 'admin', '2019-09-05 15:05:41'),
(51, 'Bidang Agama', 1, 2018, 0, 'admin', '2019-09-05 15:05:41'),
(52, 'Bidang Lainnya', 1, 2018, 0, 'admin', '2019-09-05 15:05:41'),
(53, 'Korban Meninggal', 1, 2018, 0, 'admin', '2019-09-05 15:05:41'),
(54, 'Korban Luka', 1, 2018, 0, 'admin', '2019-09-05 15:05:41'),
(55, 'Jumlah Pengungsi', 1, 2018, 0, 'admin', '2019-09-05 15:05:41'),
(56, 'Kerugian Material', 1, 2018, 0, 'admin', '2019-09-05 15:05:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usaha_peternakan`
--

CREATE TABLE `usaha_peternakan` (
  `id` int(5) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `hewan_besar` varchar(20) NOT NULL,
  `hewan_kecil` varchar(20) NOT NULL,
  `unggas` varchar(20) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `tahun` int(4) NOT NULL,
  `status` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usaha_peternakan`
--

INSERT INTO `usaha_peternakan` (`id`, `kecamatan`, `hewan_besar`, `hewan_kecil`, `unggas`, `jumlah`, `tahun`, `status`, `timestamp`, `penginput`) VALUES
(1, 'Donomulyo', '10', '10', '10', 0, 2016, 1, '2019-08-30 16:13:55', 'admin'),
(2, 'Kalipare', '100', '121', '211', 432, 2017, 0, '2019-08-31 09:03:18', 'admin'),
(3, 'Ampelgading', '99', '32', '212', 343, 2017, 0, '2019-08-31 09:35:46', 'admin'),
(4, 'Bululawang', '87', '65', '100', 252, 2017, 0, '2019-08-31 09:36:21', 'admin'),
(5, 'Bantur', '66', '90', '56', 212, 2017, 0, '2019-08-31 09:37:21', 'admin'),
(6, 'Kalipare', '5911', '9912', '7913', 23736, 2016, 0, '2019-08-31 09:56:24', 'admin'),
(7, 'Bantur', '6767', '9786', '478633', 495186, 2016, 0, '2019-08-31 13:05:57', 'admin'),
(8, 'Bululawang', '5678', '8765', '7689', 22132, 2016, 0, '2019-08-31 13:06:12', 'admin'),
(9, 'Kepanjen', '10', '10', '10', 30, 2018, 0, '2019-08-31 13:38:05', 'admin'),
(10, 'Donomulyo', '12', '12', '19', 43, 2009, 1, '2019-09-04 07:19:02', 'admin'),
(11, 'Lawang', '1', '1', '2', 4, 2009, 0, '2019-09-05 17:11:20', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(5) NOT NULL,
  `penginput` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `penginput`, `timestamp`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 'admin', '2019-07-30 10:04:34', 0),
(9, 'deni', '43f41d127a81c54d4c8f5f93daeb7118', '1', 'admin', '2019-08-04 09:03:43', 1),
(10, 'test', '098f6bcd4621d373cade4e832627b4f6', '2', 'admin', '2019-07-30 10:16:51', 0),
(12, 'tester', 'f5d1278e8109edd94e1e4197e04873b9', '1', 'admin', '2019-07-30 10:27:26', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vaksinasi_avian`
--

CREATE TABLE `vaksinasi_avian` (
  `id` int(5) NOT NULL,
  `kecamatan` varchar(40) NOT NULL,
  `nama_ternak` varchar(40) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `status` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vaksinasi_avian`
--

INSERT INTO `vaksinasi_avian` (`id`, `kecamatan`, `nama_ternak`, `jumlah`, `tahun`, `status`, `timestamp`, `penginput`) VALUES
(1, 'Donomulyo', 'Kuda', 20, '2016', 1, '2019-09-01 12:30:40', 'admin'),
(2, 'Kalipare', 'Sapi Perah', 12, '2017', 0, '2019-09-01 13:10:43', 'admin'),
(3, 'Donomulyo', 'Kambing', 10011, '2016', 0, '2019-09-01 13:17:15', 'admin'),
(4, 'Kalipare', 'Sapi Perah', 12, '2017', 0, '2019-09-04 07:15:53', 'admin'),
(5, 'Kalipare', 'Sapi Perah', 2, '2017', 0, '2019-09-04 07:16:19', 'admin'),
(6, 'Kalipare', 'Sapi Perah', 10, '2018', 0, '2019-09-04 07:16:40', 'admin'),
(7, 'Donomulyo', 'Sapi Perah', 10, '2016', 0, '2019-09-04 13:56:33', 'admin'),
(8, 'Donomulyo', 'Kerbau', 100, '2017', 0, '2019-09-04 13:58:05', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisatawan`
--

CREATE TABLE `wisatawan` (
  `id` int(5) NOT NULL,
  `tahun` year(4) NOT NULL,
  `domestik` int(20) NOT NULL,
  `mancanegara` int(20) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisatawan`
--

INSERT INTO `wisatawan` (`id`, `tahun`, `domestik`, `mancanegara`, `jumlah`, `timestamp`, `penginput`) VALUES
(1, 2016, 222, 226, 448, '2019-07-30 12:30:12', ''),
(2, 2017, 664, 100, 764, '2019-07-31 06:07:31', ''),
(3, 2018, 670, 200, 870, '2019-07-31 06:07:31', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata_alam`
--

CREATE TABLE `wisata_alam` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `pengelola` varchar(100) NOT NULL,
  `publikasi` varchar(100) NOT NULL,
  `aksesibilitas` varchar(100) NOT NULL,
  `tenaga_kerja` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(20) NOT NULL,
  `status` int(2) NOT NULL,
  `jenis_warisan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata_alam`
--

INSERT INTO `wisata_alam` (`id`, `nama`, `kecamatan`, `desa`, `fasilitas`, `pengelola`, `publikasi`, `aksesibilitas`, `tenaga_kerja`, `waktu`, `penginput`, `status`, `jenis_warisan`) VALUES
(1, 'Pantai Licin', 'Ampelgading', 'lebakharjo', 'Mushola, Parkir, Mck', 'desa', 'Web, Poster', 'Madakam, Kendaraan roda 2 dan 4', 4, '2019-08-21 13:02:43', 'admin', 0, '1'),
(2, 'pinus', 'Donomulyo', 'Donomulyo', 'Mushola, Parkir', 'Desa', 'Web, CD', 'Aspal', 10, '2019-08-21 15:35:31', 'admin', 1, '1'),
(3, 'Pinus', 'Donomulyo', 'kjh', 'Kulkas, TV, AC', 'Dese', 'Poster, Brosur, CD, Web', 'Asphalt', 10, '2019-08-21 15:47:16', 'admin', 0, '3'),
(4, 'Coban Talun', 'Pujon', 'Pujon', 'Mck, Mushola', 'Desa', 'Poster, Brosur, Web', 'Asphal', 0, '2019-08-27 11:40:02', 'admin', 0, '3'),
(6, 'Pantai Satu', 'Dau', 'Dau', 'Mck', 'Desa', 'Poster, Brosur', 'Aspal', 1, '2019-08-28 10:07:03', 'admin', 0, '2'),
(7, 'a', 'Bantur', 'a', 'a', 'a', 'Poster, Brosur', 'a', 1, '2019-08-29 09:38:12', 'admin', 0, '1'),
(8, 'a', 'Jabung', 'a', 'a', 'a', 'Poster, Brosur', 'a', 11, '2019-08-29 09:49:43', 'admin', 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata_buatan`
--

CREATE TABLE `wisata_buatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `pengelola` varchar(100) NOT NULL,
  `publikasi` varchar(100) NOT NULL,
  `aksesibilitas` varchar(100) NOT NULL,
  `tenaga_kerja` varchar(100) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(30) NOT NULL,
  `status` int(2) NOT NULL,
  `jenis_warisan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata_buatan`
--

INSERT INTO `wisata_buatan` (`id`, `nama`, `kecamatan`, `desa`, `fasilitas`, `deskripsi`, `pengelola`, `publikasi`, `aksesibilitas`, `tenaga_kerja`, `waktu`, `penginput`, `status`, `jenis_warisan`) VALUES
(1, 'Pemandian', 'Bantur', 'Srigonco', 'Mck', '', 'Perorangan', 'Poster', 'Aspal', '', '2019-08-17 16:29:05', '', 0, ''),
(2, 'Pemandian Air Mendidih', 'Pujon', 'Ngroto', 'Mck', '', 'Pd. Jasa Yasa', 'Brosur, CD', 'Aspal', '', '2019-08-17 16:54:08', 'admin', 0, '13'),
(14, 'Pemandian Malang', 'Donomulyo', 'w', 'Pemandian, Mck, Parkir, Telaga, Musholla, Sumber Air', '', 'Desa', 'Brosur, Web', 'Aspal', '12', '2019-08-21 04:27:48', 'admin', 0, ''),
(15, 'popop', 'Donomulyo', 'iuiiu', 'Pemandian, Mck, Parkir, Telaga, Musholla', 'j', 'j', 'Brosur, CD, Web', 'hh', 'j', '2019-08-21 06:11:17', 'admin', 1, ''),
(16, 'The Onsen', 'Gedangan', 'Gedang Goreng', 'Pemandian, Mck, Parkir', '', 'Desa', 'Brosur, CD', 'Aspal', '1', '2019-08-28 10:20:16', 'admin', 0, '6'),
(17, 'Candi jawar', 'Ampelgading', 'Mulyosari', '', '', 'Desa', 'Poster, Brosur, Web', 'Madakam', '', '2019-08-28 12:32:26', 'admin', 1, '1'),
(18, 'aselole', 'Jabung', 'a', 'Mck, Parkir', 'a', 'a', 'Poster', 'a', '1', '2019-08-29 09:31:56', 'admin', 1, '12'),
(19, 'b', 'Bululawang', 'b', 'Pemandian, Mck', 'b', 'b', 'CD, Web', 'b', 'b', '2019-08-29 09:32:41', 'admin', 1, '14'),
(20, 'c', 'Bululawang', 'c', 'Pemandian, Mck, Parkir, Telaga, Musholla, Sumber air', 'c', 'c', 'Poster, CD', 'c', 'c', '2019-08-29 09:35:53', 'admin', 1, '3'),
(21, 'd', 'Kasembon', 'd', 'Mck, Parkir', 'd', 'd', 'Brosur, CD', 'd', 'd', '2019-08-29 09:36:28', 'admin', 0, '9'),
(22, 'a', 'Kalipare', 'a', '', 'a', 'a', 'Poster, Brosur', 'a', '', '2019-08-29 09:43:00', 'admin', 0, '15'),
(23, 'budaya', 'Gondanglegi', 'da', '', 'da', 'ad', 'Poster, Brosur', 'ad', '', '2019-08-29 09:44:06', 'admin', 0, '8'),
(24, 'mendit1', 'Gedangan', 'mendit', 'Pemandian, Mck, Parkir, Telaga', 'sumber', 'pp', 'Poster, Brosur', 'angkot', '30', '2019-09-04 07:06:19', 'admin', 1, '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata_budaya`
--

CREATE TABLE `wisata_budaya` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `pengelola` varchar(100) NOT NULL,
  `publikasi` varchar(100) NOT NULL,
  `aksesibilitas` varchar(100) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jenis_warisan` varchar(50) NOT NULL,
  `penginput` varchar(30) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata_budaya`
--

INSERT INTO `wisata_budaya` (`id`, `nama`, `kecamatan`, `desa`, `fasilitas`, `deskripsi`, `pengelola`, `publikasi`, `aksesibilitas`, `waktu`, `jenis_warisan`, `penginput`, `status`) VALUES
(1, 'Candi Borobudur', 'Ampelgading', 'Mulyosari', 'Mck, Parkir, Mushola', 'aa', 'Desaas', 'Poster, Brosur, Web', 'Madakam, aspal', '2019-08-28 12:57:13', '1', 'admin', 0),
(2, 'Candi Tikus', 'Bantur', 'Bantur', 'Bar', 'Tidak Ada', 'Swasta', 'Poster, Brosur', 'Aspal', '2019-08-28 15:16:34', '3', 'admin', 0),
(3, 'as', 'Kromengan', 'as', 'as', 'as', 'as', 'CD, Web', 'asa', '2019-08-29 09:45:39', '10', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alatangkutd`
--
ALTER TABLE `alatangkutd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apl_terselesaikan`
--
ALTER TABLE `apl_terselesaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banding_kembang_realisasi_ekspor`
--
ALTER TABLE `banding_kembang_realisasi_ekspor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banyak_bencana`
--
ALTER TABLE `banyak_bencana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banyak_kebakaran`
--
ALTER TABLE `banyak_kebakaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banyak_kendaraan`
--
ALTER TABLE `banyak_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `bencana`
--
ALTER TABLE `bencana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabang_olahraga`
--
ALTER TABLE `cabang_olahraga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desa_wisata`
--
ALTER TABLE `desa_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_wisatawan`
--
ALTER TABLE `detail_wisatawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribusibibit`
--
ALTER TABLE `distribusibibit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekspor_impor_negara_tujuan_asal`
--
ALTER TABLE `ekspor_impor_negara_tujuan_asal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekspor_komoditi`
--
ALTER TABLE `ekspor_komoditi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industri_kecil_rumah_tangga`
--
ALTER TABLE `industri_kecil_rumah_tangga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inputbibit`
--
ALTER TABLE `inputbibit`
  ADD PRIMARY KEY (`id_bibit`);

--
-- Indexes for table `investasi_pmdn`
--
ALTER TABLE `investasi_pmdn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_korban`
--
ALTER TABLE `jenis_korban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_sampah`
--
ALTER TABLE `jenis_sampah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jumlah_koleksi_buku`
--
ALTER TABLE `jumlah_koleksi_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jumlah_korban`
--
ALTER TABLE `jumlah_korban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jumlah_laporan_kekerasan`
--
ALTER TABLE `jumlah_laporan_kekerasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jumlah_laporan_pengaduan_anak`
--
ALTER TABLE `jumlah_laporan_pengaduan_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jumlah_laporan_pengaduan_perempuan`
--
ALTER TABLE `jumlah_laporan_pengaduan_perempuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jumlah_pencari_menurut_pendidikan_ditamatkan`
--
ALTER TABLE `jumlah_pencari_menurut_pendidikan_ditamatkan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jumlah_perempuan_sebagai_kepala_keluarga`
--
ALTER TABLE `jumlah_perempuan_sebagai_kepala_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jumlah_phk`
--
ALTER TABLE `jumlah_phk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kec_struktur_pemerintahan`
--
ALTER TABLE `kec_struktur_pemerintahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_ekonomi`
--
ALTER TABLE `kelompok_ekonomi`
  ADD PRIMARY KEY (`id_lembaga`);

--
-- Indexes for table `kerjasama_media`
--
ALTER TABLE `kerjasama_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lembaga_masyarakat`
--
ALTER TABLE `lembaga_masyarakat`
  ADD PRIMARY KEY (`id_lembaga`);

--
-- Indexes for table `lokasipemadam`
--
ALTER TABLE `lokasipemadam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_pencemaran`
--
ALTER TABLE `lokasi_pencemaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_terminal`
--
ALTER TABLE `lokasi_terminal`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `luas_sawah_menurut_jenis_perairan`
--
ALTER TABLE `luas_sawah_menurut_jenis_perairan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_alatangkut`
--
ALTER TABLE `master_alatangkut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_bidang_usaha`
--
ALTER TABLE `master_bidang_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_bulan`
--
ALTER TABLE `master_bulan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `master_cabangolahraga`
--
ALTER TABLE `master_cabangolahraga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_daging`
--
ALTER TABLE `master_daging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_desa`
--
ALTER TABLE `master_desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `master_hewan_ternak`
--
ALTER TABLE `master_hewan_ternak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_jenis_industri`
--
ALTER TABLE `master_jenis_industri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_jenis_kelamin`
--
ALTER TABLE `master_jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_jenis_sektor`
--
ALTER TABLE `master_jenis_sektor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_kecamatan`
--
ALTER TABLE `master_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `master_kerjasama`
--
ALTER TABLE `master_kerjasama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_keterangan_terminal`
--
ALTER TABLE `master_keterangan_terminal`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indexes for table `master_klasifikasi`
--
ALTER TABLE `master_klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_komoditi`
--
ALTER TABLE `master_komoditi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_level`
--
ALTER TABLE `master_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_negara`
--
ALTER TABLE `master_negara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pekerjaan`
--
ALTER TABLE `master_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pendidikan`
--
ALTER TABLE `master_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pendidikan_2`
--
ALTER TABLE `master_pendidikan_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_perda`
--
ALTER TABLE `master_perda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_provider`
--
ALTER TABLE `master_provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_provinsi`
--
ALTER TABLE `master_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_semua_ikan`
--
ALTER TABLE `master_semua_ikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_susu`
--
ALTER TABLE `master_susu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_tajuk_buku`
--
ALTER TABLE `master_tajuk_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_terminal`
--
ALTER TABLE `master_terminal`
  ADD PRIMARY KEY (`id_terminal`);

--
-- Indexes for table `master_unggas`
--
ALTER TABLE `master_unggas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_unjukrasa`
--
ALTER TABLE `master_unjukrasa`
  ADD PRIMARY KEY (`id_unjukrasa`);

--
-- Indexes for table `master_warisan_budaya`
--
ALTER TABLE `master_warisan_budaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pamongpraja`
--
ALTER TABLE `pamongpraja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasar_modern`
--
ALTER TABLE `pasar_modern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasar_tradisional`
--
ALTER TABLE `pasar_tradisional`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `pekerjaan_penduduk`
--
ALTER TABLE `pekerjaan_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemadam`
--
ALTER TABLE `pemadam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjungperpus_jkel`
--
ALTER TABLE `pengunjungperpus_jkel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjungperpus_status_pekerjaan`
--
ALTER TABLE `pengunjungperpus_status_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjungperpus_tingkatpend`
--
ALTER TABLE `pengunjungperpus_tingkatpend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjung_negara`
--
ALTER TABLE `pengunjung_negara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penumpang_angkutan`
--
ALTER TABLE `penumpang_angkutan`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indexes for table `perangkat_daerah`
--
ALTER TABLE `perangkat_daerah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaan_klasifikasi`
--
ALTER TABLE `perusahaan_klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaan_limbah`
--
ALTER TABLE `perusahaan_limbah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potensi_unggulan`
--
ALTER TABLE `potensi_unggulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prasarana_olahraga`
--
ALTER TABLE `prasarana_olahraga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_daging`
--
ALTER TABLE `produksi_daging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_ikan`
--
ALTER TABLE `produksi_ikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_perikanan`
--
ALTER TABLE `produksi_perikanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_susu`
--
ALTER TABLE `produksi_susu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_telur`
--
ALTER TABLE `produksi_telur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sarana`
--
ALTER TABLE `sarana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sarana_perdagangan`
--
ALTER TABLE `sarana_perdagangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sektor_penanaman_modal`
--
ALTER TABLE `sektor_penanaman_modal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ternak_dipotong`
--
ALTER TABLE `ternak_dipotong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tower`
--
ALTER TABLE `tower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tps`
--
ALTER TABLE `tps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transmigrasi`
--
ALTER TABLE `transmigrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unjukrasa`
--
ALTER TABLE `unjukrasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usaha_peternakan`
--
ALTER TABLE `usaha_peternakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaksinasi_avian`
--
ALTER TABLE `vaksinasi_avian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisatawan`
--
ALTER TABLE `wisatawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata_alam`
--
ALTER TABLE `wisata_alam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata_buatan`
--
ALTER TABLE `wisata_buatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata_budaya`
--
ALTER TABLE `wisata_budaya`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alatangkutd`
--
ALTER TABLE `alatangkutd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `apl_terselesaikan`
--
ALTER TABLE `apl_terselesaikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `banding_kembang_realisasi_ekspor`
--
ALTER TABLE `banding_kembang_realisasi_ekspor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `banyak_bencana`
--
ALTER TABLE `banyak_bencana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `banyak_kebakaran`
--
ALTER TABLE `banyak_kebakaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `banyak_kendaraan`
--
ALTER TABLE `banyak_kendaraan`
  MODIFY `id_kendaraan` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `bencana`
--
ALTER TABLE `bencana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `desa_wisata`
--
ALTER TABLE `desa_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detail_wisatawan`
--
ALTER TABLE `detail_wisatawan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `distribusibibit`
--
ALTER TABLE `distribusibibit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ekspor_impor_negara_tujuan_asal`
--
ALTER TABLE `ekspor_impor_negara_tujuan_asal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `ekspor_komoditi`
--
ALTER TABLE `ekspor_komoditi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `industri_kecil_rumah_tangga`
--
ALTER TABLE `industri_kecil_rumah_tangga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `inputbibit`
--
ALTER TABLE `inputbibit`
  MODIFY `id_bibit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `investasi_pmdn`
--
ALTER TABLE `investasi_pmdn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jenis_korban`
--
ALTER TABLE `jenis_korban`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `jenis_sampah`
--
ALTER TABLE `jenis_sampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jumlah_koleksi_buku`
--
ALTER TABLE `jumlah_koleksi_buku`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `jumlah_korban`
--
ALTER TABLE `jumlah_korban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `jumlah_laporan_kekerasan`
--
ALTER TABLE `jumlah_laporan_kekerasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jumlah_laporan_pengaduan_anak`
--
ALTER TABLE `jumlah_laporan_pengaduan_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jumlah_laporan_pengaduan_perempuan`
--
ALTER TABLE `jumlah_laporan_pengaduan_perempuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jumlah_pencari_menurut_pendidikan_ditamatkan`
--
ALTER TABLE `jumlah_pencari_menurut_pendidikan_ditamatkan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jumlah_perempuan_sebagai_kepala_keluarga`
--
ALTER TABLE `jumlah_perempuan_sebagai_kepala_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `jumlah_phk`
--
ALTER TABLE `jumlah_phk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kec_struktur_pemerintahan`
--
ALTER TABLE `kec_struktur_pemerintahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kelompok_ekonomi`
--
ALTER TABLE `kelompok_ekonomi`
  MODIFY `id_lembaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kerjasama_media`
--
ALTER TABLE `kerjasama_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `lembaga_masyarakat`
--
ALTER TABLE `lembaga_masyarakat`
  MODIFY `id_lembaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `lokasipemadam`
--
ALTER TABLE `lokasipemadam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lokasi_pencemaran`
--
ALTER TABLE `lokasi_pencemaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lokasi_terminal`
--
ALTER TABLE `lokasi_terminal`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `luas_sawah_menurut_jenis_perairan`
--
ALTER TABLE `luas_sawah_menurut_jenis_perairan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_alatangkut`
--
ALTER TABLE `master_alatangkut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `master_bidang_usaha`
--
ALTER TABLE `master_bidang_usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `master_bulan`
--
ALTER TABLE `master_bulan`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `master_cabangolahraga`
--
ALTER TABLE `master_cabangolahraga`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `master_daging`
--
ALTER TABLE `master_daging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `master_desa`
--
ALTER TABLE `master_desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `master_hewan_ternak`
--
ALTER TABLE `master_hewan_ternak`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_jenis_industri`
--
ALTER TABLE `master_jenis_industri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `master_jenis_kelamin`
--
ALTER TABLE `master_jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_jenis_sektor`
--
ALTER TABLE `master_jenis_sektor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_kecamatan`
--
ALTER TABLE `master_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `master_kerjasama`
--
ALTER TABLE `master_kerjasama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `master_keterangan_terminal`
--
ALTER TABLE `master_keterangan_terminal`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_klasifikasi`
--
ALTER TABLE `master_klasifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `master_komoditi`
--
ALTER TABLE `master_komoditi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `master_level`
--
ALTER TABLE `master_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_negara`
--
ALTER TABLE `master_negara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `master_pekerjaan`
--
ALTER TABLE `master_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `master_pendidikan`
--
ALTER TABLE `master_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `master_pendidikan_2`
--
ALTER TABLE `master_pendidikan_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `master_perda`
--
ALTER TABLE `master_perda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `master_provider`
--
ALTER TABLE `master_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_provinsi`
--
ALTER TABLE `master_provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `master_semua_ikan`
--
ALTER TABLE `master_semua_ikan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `master_susu`
--
ALTER TABLE `master_susu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_tajuk_buku`
--
ALTER TABLE `master_tajuk_buku`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `master_terminal`
--
ALTER TABLE `master_terminal`
  MODIFY `id_terminal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `master_unggas`
--
ALTER TABLE `master_unggas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `master_unjukrasa`
--
ALTER TABLE `master_unjukrasa`
  MODIFY `id_unjukrasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `master_warisan_budaya`
--
ALTER TABLE `master_warisan_budaya`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pamongpraja`
--
ALTER TABLE `pamongpraja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pasar_modern`
--
ALTER TABLE `pasar_modern`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `pasar_tradisional`
--
ALTER TABLE `pasar_tradisional`
  MODIFY `No` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `pekerjaan_penduduk`
--
ALTER TABLE `pekerjaan_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pemadam`
--
ALTER TABLE `pemadam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pengunjungperpus_jkel`
--
ALTER TABLE `pengunjungperpus_jkel`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `pengunjungperpus_status_pekerjaan`
--
ALTER TABLE `pengunjungperpus_status_pekerjaan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pengunjungperpus_tingkatpend`
--
ALTER TABLE `pengunjungperpus_tingkatpend`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pengunjung_negara`
--
ALTER TABLE `pengunjung_negara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `penumpang_angkutan`
--
ALTER TABLE `penumpang_angkutan`
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `perangkat_daerah`
--
ALTER TABLE `perangkat_daerah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `perusahaan_klasifikasi`
--
ALTER TABLE `perusahaan_klasifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `perusahaan_limbah`
--
ALTER TABLE `perusahaan_limbah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `potensi_unggulan`
--
ALTER TABLE `potensi_unggulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `prasarana_olahraga`
--
ALTER TABLE `prasarana_olahraga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `produksi_daging`
--
ALTER TABLE `produksi_daging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `produksi_ikan`
--
ALTER TABLE `produksi_ikan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `produksi_perikanan`
--
ALTER TABLE `produksi_perikanan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `produksi_susu`
--
ALTER TABLE `produksi_susu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produksi_telur`
--
ALTER TABLE `produksi_telur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sarana`
--
ALTER TABLE `sarana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sarana_perdagangan`
--
ALTER TABLE `sarana_perdagangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `sektor_penanaman_modal`
--
ALTER TABLE `sektor_penanaman_modal`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `ternak_dipotong`
--
ALTER TABLE `ternak_dipotong`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tower`
--
ALTER TABLE `tower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tps`
--
ALTER TABLE `tps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transmigrasi`
--
ALTER TABLE `transmigrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `unjukrasa`
--
ALTER TABLE `unjukrasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `usaha_peternakan`
--
ALTER TABLE `usaha_peternakan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vaksinasi_avian`
--
ALTER TABLE `vaksinasi_avian`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `wisatawan`
--
ALTER TABLE `wisatawan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wisata_alam`
--
ALTER TABLE `wisata_alam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `wisata_buatan`
--
ALTER TABLE `wisata_buatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `wisata_budaya`
--
ALTER TABLE `wisata_budaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
