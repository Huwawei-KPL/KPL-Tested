-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2021 pada 06.31
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eoffice`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` int(6) NOT NULL,
  `departemen` varchar(255) DEFAULT NULL,
  `id_perusahaan` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `departemen`, `id_perusahaan`) VALUES
(1, NULL, 1),
(5, NULL, 1),
(6, NULL, 1),
(7, 'Informatika', 1),
(8, 'Olahraga', 1),
(9, NULL, 1),
(10, 'Manajemen', 1),
(11, 'Trading', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `frekuensipemakaian`
--

CREATE TABLE `frekuensipemakaian` (
  `id_frekuensi` bigint(20) NOT NULL,
  `id_ruang` int(6) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  `menit` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `frekuensipemakaian`
--

INSERT INTO `frekuensipemakaian` (`id_frekuensi`, `id_ruang`, `waktu`, `tanggal`, `menit`) VALUES
(1, 7, '00:00:00', '2021-05-29', 60),
(2, 4, '00:00:00', '2021-05-31', 120),
(5, 7, '07:00:00', '2021-05-30', 30),
(6, 7, '07:30:00', '2021-05-30', 30),
(7, 7, '08:00:00', '2021-06-08', 30),
(8, 2, '07:00:00', '2021-06-09', 30),
(9, 2, '08:30:00', '2021-06-26', 763),
(10, 2, '16:14:00', '2021-07-01', 180);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` int(6) NOT NULL,
  `gedung` varchar(20) NOT NULL,
  `jml_lantai` int(2) NOT NULL,
  `jml_ruangan` int(3) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `id_perusahaan` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `gedung`, `jml_lantai`, `jml_ruangan`, `lokasi`, `id_perusahaan`) VALUES
(1, 'Antapani', 52, 202, 'Jl Pancaasf', 1),
(7, 'Rumahkita', 20, 32, 'Jl Merdeka utama', 1),
(9, 'naget', 2, 42, 'Bandung', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalkonsumsi`
--

CREATE TABLE `jadwalkonsumsi` (
  `id_jadwalkonsum` int(6) NOT NULL,
  `id_peminjaman` int(6) NOT NULL,
  `pesanan` varchar(255) NOT NULL,
  `waktu` time NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwalkonsumsi`
--

INSERT INTO `jadwalkonsumsi` (`id_jadwalkonsum`, `id_peminjaman`, `pesanan`, `waktu`, `harga`) VALUES
(12, 51, '3 Nasi Kucing, 3 Aqua Gelas, 3 Gary Choco', '19:33:00', 25500),
(13, 52, '4 Nasi Kucing, 4 Aqua Gelas, 4 Gary Choco', '17:46:00', 34000),
(17, 74, '5 Aqua Gelas, 5 Gary Choco', '15:00:00', 17500),
(18, 78, '8 Nasi Kucing, 5 Aqua Gelas, 5 Gary Choco', '10:30:00', 57500),
(19, 80, '10 Nasi Kucing, 1 Aqua Gelas, 10 Gary Choco', '10:00:00', 80500),
(20, 81, '3 Nasi Kucing, 3 Aqua Gelas, 3 Gary Choco', '17:11:00', 25500),
(21, 83, '15 Nasi Kucing, 3 Aqua Gelas, 3 Aqua Gelas', '15:39:00', 78000),
(22, 84, '3 Nasi Kucing, 3 Nasi Uduk', '16:14:00', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumsi`
--

CREATE TABLE `konsumsi` (
  `id_konsumsi` int(6) NOT NULL,
  `konsumsi` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `id_perusahaan` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konsumsi`
--

INSERT INTO `konsumsi` (`id_konsumsi`, `konsumsi`, `jenis`, `harga`, `id_perusahaan`) VALUES
(2, 'Nasi Kucing', 'Makanan', 5000, 1),
(3, 'Aqua Gelas', 'Minuman', 500, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user@mail.com', '$2y$10$Fj4wufF2U0iYAEIw/gGbGeltRAF0Ag4Wx/6ZIATpN3fjWWTxKJUKu', '2021-02-15 20:51:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(6) NOT NULL,
  `id_ruangan` int(6) NOT NULL,
  `id_users` int(6) NOT NULL,
  `tanggal` date NOT NULL,
  `waktupinjam` time NOT NULL,
  `waktuselesai` time NOT NULL,
  `keperluan` varchar(255) DEFAULT NULL,
  `approval` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_ruangan`, `id_users`, `tanggal`, `waktupinjam`, `waktuselesai`, `keperluan`, `approval`) VALUES
(34, 10, 22, '2021-03-17', '16:07:00', '16:07:00', NULL, 1),
(63, 2, 22, '2021-05-03', '06:00:00', '06:30:00', 'Meeting keuangan', 0),
(64, 11, 22, '2021-05-05', '06:00:00', '06:30:00', 'Meeting Tim marketing', 0),
(65, 2, 22, '2021-05-30', '17:54:00', '19:54:00', 'Izin Ditolak', 2),
(80, 2, 22, '2021-06-23', '10:00:00', '10:30:00', 'Demo Program', 0),
(81, 4, 22, '2021-06-26', '17:11:00', '19:11:00', 'Izin Ditolak', 2),
(82, 2, 22, '2021-06-26', '08:30:00', '21:13:00', 'Test', 1),
(83, 10, 22, '2021-06-30', '15:39:00', '17:39:00', 'Meeting bersama tim IT', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(6) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `lokasi`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Pt Inovasi Cipta Digital', 'Bandung', 'Perusahaan yang bekerja di bidang ....', NULL, '2021-02-09 17:00:00'),
(3, 'PT Indofood', 'Jl Merdeka utama', 'Software house', '2021-01-31 01:52:01', '2021-02-09 17:00:00'),
(10, 'PT Swimpro', 'Semarang', 'Trading bot', '2021-06-24 21:56:09', '2021-06-24 21:56:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesankonsumsi`
--

CREATE TABLE `pesankonsumsi` (
  `id_pesanan` bigint(20) NOT NULL,
  `id_konsumsi` bigint(20) NOT NULL,
  `id_ruang` bigint(20) NOT NULL,
  `jumlahpesanan` bigint(20) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesankonsumsi`
--

INSERT INTO `pesankonsumsi` (`id_pesanan`, `id_konsumsi`, `id_ruang`, `jumlahpesanan`, `tanggal`, `waktu`) VALUES
(1, 2, 0, 3, '2021-03-20', '09:42:00'),
(2, 4, 0, 4, '2021-03-20', '09:42:00'),
(41, 2, 10, 1, '2021-03-17', '16:07:00'),
(42, 3, 10, 2, '2021-03-17', '16:07:00'),
(55, 2, 2, 1, '2021-03-25', '16:28:00'),
(56, 3, 2, 1, '2021-03-25', '16:28:00'),
(57, 4, 2, 1, '2021-03-25', '16:28:00'),
(58, 2, 11, 1, '2021-03-05', '20:03:00'),
(59, 3, 11, 1, '2021-03-05', '20:03:00'),
(60, 2, 11, 1, '2021-03-05', '20:03:00'),
(61, 3, 11, 1, '2021-03-05', '20:03:00'),
(62, 2, 2, 1, '2021-03-18', '10:53:00'),
(63, 3, 2, 1, '2021-03-18', '10:53:00'),
(64, 4, 2, 1, '2021-03-18', '10:53:00'),
(65, 2, 10, 5, '2021-03-24', '13:32:00'),
(66, 3, 10, 5, '2021-03-24', '13:32:00'),
(67, 4, 10, 5, '2021-03-24', '13:32:00'),
(68, 2, 2, 4, '2021-04-04', '16:41:00'),
(69, 3, 2, 4, '2021-04-04', '16:41:00'),
(70, 4, 2, 4, '2021-04-04', '16:41:00'),
(71, 2, 11, 5, '2021-03-27', '01:18:00'),
(72, 2, 4, 5, '2021-03-30', '17:01:00'),
(73, 4, 4, 5, '2021-03-30', '17:01:00'),
(74, 2, 4, 1, '2021-04-16', '16:20:00'),
(75, 3, 4, 1, '2021-04-16', '16:20:00'),
(76, 4, 4, 1, '2021-04-16', '16:20:00'),
(77, 2, 10, 1, '2021-04-15', '17:11:00'),
(78, 3, 10, 1, '2021-04-15', '17:11:00'),
(79, 4, 10, 20, '2021-04-15', '17:11:00'),
(80, 2, 10, 2, '2021-04-14', '20:13:00'),
(81, 3, 10, 4, '2021-04-14', '20:13:00'),
(82, 4, 10, 3, '2021-04-14', '20:13:00'),
(83, 2, 10, 2, '2021-04-14', '20:13:00'),
(84, 3, 10, 4, '2021-04-14', '20:13:00'),
(85, 4, 10, 3, '2021-04-14', '20:13:00'),
(86, 2, 10, 3, '2021-04-16', '19:33:00'),
(87, 3, 10, 3, '2021-04-16', '19:33:00'),
(88, 4, 10, 3, '2021-04-16', '19:33:00'),
(89, 2, 4, 4, '2021-04-16', '17:46:00'),
(90, 3, 4, 4, '2021-04-16', '17:46:00'),
(91, 4, 4, 4, '2021-04-16', '17:46:00'),
(101, 3, 7, 5, '2021-06-02', '15:00:00'),
(102, 4, 7, 5, '2021-06-02', '15:00:00'),
(103, 2, 7, 8, '2021-07-09', '10:30:00'),
(104, 3, 7, 5, '2021-07-09', '10:30:00'),
(105, 4, 7, 5, '2021-07-09', '10:30:00'),
(106, 2, 2, 10, '2021-06-23', '10:00:00'),
(107, 3, 2, 1, '2021-06-23', '10:00:00'),
(108, 4, 2, 10, '2021-06-23', '10:00:00'),
(109, 2, 4, 3, '2021-06-26', '17:11:00'),
(110, 3, 4, 3, '2021-06-26', '17:11:00'),
(111, 4, 4, 3, '2021-06-26', '17:11:00'),
(112, 2, 10, 15, '2021-06-30', '15:39:00'),
(113, 3, 10, 3, '2021-06-30', '15:39:00'),
(114, 6, 10, 5, '2021-06-30', '15:39:00'),
(115, 2, 2, 3, '2021-07-01', '16:14:00'),
(116, 6, 2, 3, '2021-07-01', '16:14:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruang` int(6) NOT NULL,
  `nama_ruang` varchar(255) NOT NULL,
  `lantai` int(2) NOT NULL,
  `kapasitas` int(3) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_gedung` int(6) NOT NULL,
  `ac` int(1) DEFAULT 0,
  `infocus` int(1) NOT NULL DEFAULT 0,
  `whiteboard` int(1) NOT NULL DEFAULT 0,
  `luas` int(3) NOT NULL,
  `fasilitas` varchar(255) DEFAULT NULL,
  `approve` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruang`, `nama_ruang`, `lantai`, `kapasitas`, `foto`, `id_gedung`, `ac`, `infocus`, `whiteboard`, `luas`, `fasilitas`, `approve`) VALUES
(2, 'Ruang Utama', 41, 20, 'calicadoo-jrwMaf2-YjY-unsplash.jpg', 1, 0, 0, 0, 41, 'Dispenser air', 1),
(4, 'Ruang auditorium', 13, 23, 'boxed-water-is-better-6aZp4_KfXT8-unsplash.jpg', 1, 1, 1, 1, 42, NULL, 1),
(7, 'Ruang baru', 23, 41, NULL, 1, 0, 0, 0, 11, NULL, 0),
(8, 'Ruangan Foto', 5, 40, 'christopher-campbell-rDEOVtE7vOs-unsplash.jpg', 7, 0, 1, 1, 23, NULL, 0),
(9, 'A301', 17, 2, 'jonathan-borba-Yf1SegAI84o-unsplash.jpg', 7, 0, 1, 0, 3, NULL, 0),
(10, 'E101', 7, 42, NULL, 7, 0, 0, 0, 44, NULL, 0),
(11, 'B113', 19, 41, NULL, 1, 0, 0, 0, 90, NULL, 1),
(12, 'Auditorium', 2, 100, 'chung-yee-tsang-wqxCKM0R6R8-unsplash.jpg', 9, 1, 1, 0, 250, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` int(1) NOT NULL,
  `id_perusahaan` int(6) DEFAULT NULL,
  `id_departemen` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_user`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`, `id_perusahaan`, `id_departemen`) VALUES
(1, 'Master Admin E-office', 'admin@mail.com', '2021-01-10 20:15:41', '$2y$10$Hr4V.MkJPQYJ40aPadYI..FJiSTKeGlaLiDwswx9M/u7EqtvV7xC6', NULL, '2021-01-10 20:15:41', '2021-02-07 02:32:20', 3, NULL, NULL),
(7, 'Made', 'made@gmail.com', NULL, '$2y$10$5iugkdKPjsDb8YZeVLVr/enLQDUM/ulDpZRlw2NUAqRRRkKM2s0nG', NULL, NULL, NULL, 0, 1, 10),
(8, 'Kafie', 'mkafied@gmail.com', NULL, '1234', NULL, NULL, NULL, 2, 1, NULL),
(9, 'Master user', 'masteruser@mail.com', NULL, '1w2e123', NULL, NULL, NULL, 2, 1, NULL),
(10, 'Master user', 'msu@mail.com', NULL, '$2y$10$ZzseobJUuUsoTwP9oQE12On/k2VIlHvFImv4geNCofDNAwvid00qW', NULL, NULL, '2021-06-22 09:27:12', 2, 1, NULL),
(11, 'Master Ruangan Pt ICD', 'msr@mail.com', NULL, '$2y$10$UpKLyoAeVCzmXe4o4L2M2e.Swf7yfpMPDpbSS4wa37vNAKmX5nF46', NULL, NULL, NULL, 1, 1, NULL),
(18, 'Master konsumsi', 'msk@mail.com', NULL, '$2y$10$CFnLT4Pj090yZ797Z94Ym.LdjiT2VlSlrgkPc.i.YdDq8NdHG07h2', NULL, NULL, NULL, 4, 1, NULL),
(22, 'Maulana Kafie', 'us@mail.com', NULL, '$2y$10$X9Jy8zNfgIJmWUtK0kxcyuCibRWNMZ534XhAYEXwjs9Yfm.u0h0oK', NULL, NULL, '2021-06-25 00:15:39', 0, 1, 7),
(24, 'Admin Ruang indofood', 'msri@mail.com', NULL, '$2y$10$kDH2rPccS71mVJ4qyVV7oOsA0.Q7BQSlzB4E.YE8SMMBwkrq8mCjC', NULL, NULL, NULL, 1, 3, NULL),
(26, 'Rizky', 'kkk@gmail.com', NULL, '$2y$10$FYvRPqRXadF3DEp0PpDTmePzlM9rrczxydVBQCw/bGL7el9ZRAJDu', NULL, NULL, NULL, 0, 1, 8),
(29, 'Dandi', 'dandi@gmail.com', NULL, '$2y$10$cMhnF9C0TQCSaFGgwesUYOybC1MGbhzcdvZtln6y3Ue4H0/7rY0JW', NULL, NULL, NULL, 2, 10, NULL),
(31, 'Sherly', 'sherly@mail.com', NULL, '$2y$10$uOoZJ50FR33L/h4L4XptEOQ...uCfSB0BuLEg5v85OA9eour2atfG', NULL, NULL, NULL, 2, 10, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `frekuensipemakaian`
--
ALTER TABLE `frekuensipemakaian`
  ADD PRIMARY KEY (`id_frekuensi`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `tanggal` (`tanggal`),
  ADD KEY `menit` (`menit`);

--
-- Indeks untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`),
  ADD KEY `id_user` (`id_perusahaan`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indeks untuk tabel `jadwalkonsumsi`
--
ALTER TABLE `jadwalkonsumsi`
  ADD PRIMARY KEY (`id_jadwalkonsum`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indeks untuk tabel `konsumsi`
--
ALTER TABLE `konsumsi`
  ADD PRIMARY KEY (`id_konsumsi`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_ruangan` (`id_ruangan`,`id_users`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `pesankonsumsi`
--
ALTER TABLE `pesankonsumsi`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_konsumsi` (`id_konsumsi`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `tanggal` (`tanggal`),
  ADD KEY `waktu` (`waktu`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `id_gedung` (`id_gedung`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_perusahaan` (`id_perusahaan`),
  ADD KEY `id_departemen` (`id_departemen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `frekuensipemakaian`
--
ALTER TABLE `frekuensipemakaian`
  MODIFY `id_frekuensi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jadwalkonsumsi`
--
ALTER TABLE `jadwalkonsumsi`
  MODIFY `id_jadwalkonsum` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `konsumsi`
--
ALTER TABLE `konsumsi`
  MODIFY `id_konsumsi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pesankonsumsi`
--
ALTER TABLE `pesankonsumsi`
  MODIFY `id_pesanan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruang` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `ruangan_ibfk_1` FOREIGN KEY (`id_gedung`) REFERENCES `gedung` (`id_gedung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
