-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Des 2021 pada 01.15
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_jurnal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'alifrmdn@gmail.com', '$2y$10$6Y3VE8U.ehQxtmyVIIaJD.fiMcK3SrZTVEAqx.vPBpEG2KmpquedC', NULL, '2021-12-04 03:15:17', '2021-12-04 03:15:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` bigint(18) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_guru` varchar(100) DEFAULT NULL,
  `status_guru` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `username`, `nama_guru`, `password`, `foto_guru`, `status_guru`, `created_at`, `updated_at`) VALUES
(1, 123456789123456789, 'maulana@smakensa', 'Maulana Malik', '$2y$10$dtbUAAt5KKIiyBPktcX1AezCkI9jPwy/oRR7tTYTpnW2zSq.XEooW', '1.jpg', 'aktif', '2021-12-06 05:14:34', '2021-12-06 05:14:34'),
(2, 9112345678912345678, 'alif@smakensa', 'Alif Ramadhan', '$2y$10$.LOx25q2KtQExKmK/5MwveokDhCX41rm5miBf2aC1.xbVlm8Dlk0K', '2.jpg', 'aktif', '2021-12-06 05:16:34', '2021-12-06 05:16:34'),
(3, 891234567891234567, 'arsi@smakensa', 'Arsi Dwi', '$2y$10$5ombM5SNBUGir8FaQ21Ct.AkxlctZnraEL.93YSe8KNOQI18k4Sh.', '3.jpg', 'aktif', '2021-12-06 05:16:34', '2021-12-06 05:16:34'),
(4, 789123456789123456, 'iqbal@smakensa', 'Iqbal Roni', '$2y$10$NaXk31jFV2.sb.mYTnGnS.s0rdOYSQObq305td/xUarvlvZ/hC1S.', '4.jpg', 'aktif', '2021-12-06 05:16:34', '2021-12-06 01:21:19'),
(5, 678912345678912345, 'ilham@smakensa', 'Ilham Nur', '$2y$10$MKdyVYkcGakPWOSV5Zmfv.9CmqRpqx.LhVrrKe0VkcreM41F8vIj2', '5.jpg', 'aktif', '2021-12-06 05:16:34', '2021-12-06 05:16:34'),
(6, 567891234567891234, 'rayasya@smakensa', 'Rayasya Dziki', '$2y$10$4UAQXZBJwpUVGXAJwMLaKeeXKf7FfyyesaA0nVPPxV8dfrLBLoUQK', '6.jpg', 'aktif', '2021-12-06 05:16:35', '2021-12-06 05:16:35'),
(7, 456789123456789123, 'sebrina@smakensa', 'Sebrina Ami', '$2y$10$HTmuRZjawyI5pWOxGkrXfOcw.LZnqekkfr3a6OK0Jp.W91Z/KCAci', '7.jpg', 'aktif', '2021-12-06 05:16:35', '2021-12-06 05:16:35'),
(8, 234567891234567891, 'sevri@smakensa', 'Sevri Vendrian', '$2y$10$Ab74qqE.JAFVvOFSK5syo.ZkPu9vBxHdMZxQZmZeTK09r4CCgrxeS', '8.jpg', 'aktif', '2021-12-06 05:16:35', '2021-12-11 06:46:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kode_guru_id` int(11) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `kelas` int(3) DEFAULT NULL,
  `no_kelas` int(3) DEFAULT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `status_jadwal` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `kode_guru_id`, `hari`, `jam_mulai`, `jam_selesai`, `kelas`, `no_kelas`, `jurusan_id`, `status_jadwal`, `created_at`, `updated_at`) VALUES
(1, 5, 'senin', '07:00:00', '09:00:00', 10, 1, 5, 'aktif', '2021-12-06 08:20:07', '2021-12-06 01:21:19'),
(2, 1, 'senin', '09:00:00', '09:00:00', 10, 1, 1, 'aktif', '2021-12-11 19:02:38', '2021-12-11 19:02:38'),
(3, 1, 'selasa', '07:00:00', '08:00:00', 10, 1, 5, 'aktif', '2021-12-11 23:43:56', '2021-12-11 23:43:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` bigint(20) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `status_jurnal` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Otomatisasi Tata Kelola Perkantoran', '2021-12-06 06:17:45', '2021-12-06 06:17:45'),
(2, 'Akuntansi dan Keuangan Lembaga', '2021-10-10 14:00:00', '2021-10-10 13:00:00'),
(3, 'Multimedia', '2021-10-10 14:00:00', '2021-10-10 13:00:00'),
(4, 'Perbankan dan Keuangan Mikro', '2021-10-10 14:00:00', '2021-10-10 13:00:00'),
(5, 'Rekayasa Perangkat Lunak', '2021-10-10 14:00:00', '2021-10-10 13:00:00'),
(6, 'Bisnis Daring dan Pemasaran', '2021-10-10 14:00:00', '2021-10-10 13:00:00'),
(7, 'Teknik Komputer Jaringan', '2021-10-10 14:00:00', '2021-10-10 13:00:00'),
(8, 'Teknik Produksi Penyiaran Radio dan Pertelevisian', '2021-10-10 14:00:00', '2021-10-10 13:00:00'),
(9, 'Perfilman', '2021-10-10 14:00:00', '2021-10-10 13:00:00'),
(10, 'Tenik Informasi', '2021-10-10 14:00:00', '2021-10-10 13:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_guru`
--

CREATE TABLE `kode_guru` (
  `id_kode_guru` int(11) NOT NULL,
  `kode_guru` varchar(10) DEFAULT NULL,
  `guru_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `status_kode` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kode_guru`
--

INSERT INTO `kode_guru` (`id_kode_guru`, `kode_guru`, `guru_id`, `mapel_id`, `status_kode`, `created_at`, `updated_at`) VALUES
(1, '1.1', 1, 2, 'aktif', '2021-12-05 22:54:00', '2021-12-05 23:07:38'),
(4, '1.2', 1, 3, 'aktif', '2021-12-05 22:58:38', '2021-12-05 23:07:27'),
(5, '2.1', 4, 4, 'aktif', '2021-12-05 22:59:09', '2021-12-06 01:21:19'),
(6, '3.1', 6, 5, 'aktif', '2021-12-05 22:59:36', '2021-12-05 23:09:00'),
(7, '5.1', 3, 1, 'aktif', '2021-12-05 23:00:38', '2021-12-05 23:09:49'),
(8, '6.1', 5, 6, 'aktif', '2021-12-05 23:01:04', '2021-12-05 23:10:26'),
(9, '6.2', 5, 12, 'aktif', '2021-12-05 23:01:39', '2021-12-05 23:10:19'),
(10, '7.1', 7, 8, 'aktif', '2021-12-05 23:02:06', '2021-12-05 23:02:06'),
(11, '7.2', 7, 9, 'aktif', '2021-12-05 23:02:19', '2021-12-05 23:02:19'),
(12, '8.1', 8, 11, 'nonaktif', '2021-12-05 23:04:42', '2021-12-11 06:46:23'),
(13, '8.2', 8, 10, 'nonaktif', '2021-12-05 23:05:00', '2021-12-11 06:46:23'),
(14, '4.1', 2, 7, 'aktif', '2021-12-05 23:07:03', '2021-12-05 23:07:03'),
(15, '4.2', 2, 15, 'aktif', '2021-12-05 23:08:09', '2021-12-05 23:08:09'),
(16, '3.2', 6, 14, 'aktif', '2021-12-05 23:08:49', '2021-12-05 23:08:49'),
(17, '5.2', 3, 13, 'aktif', '2021-12-05 23:09:39', '2021-12-05 23:09:39'),
(18, '2.2', 4, 16, 'aktif', '2021-12-05 23:11:46', '2021-12-06 01:21:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `created_at`, `updated_at`) VALUES
(1, 'Pemograman Berorientasi Objek', '2021-12-06 05:47:13', '2021-12-05 23:00:21'),
(2, 'Pemograman Dasar', '2021-12-06 05:47:13', '2021-12-06 05:47:13'),
(3, 'Basis data', '2021-12-06 05:47:13', '2021-12-06 05:47:13'),
(4, 'Pemograman web dan perangkat bergerak', '2021-12-06 05:47:13', '2021-12-06 05:47:13'),
(5, 'Permodelan Perangkat Lunak', '2021-12-06 05:47:13', '2021-12-06 05:47:13'),
(6, 'Pendidikan Agama Islam', '2021-12-06 05:47:13', '2021-12-06 05:47:13'),
(7, 'Matematika', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Fisika', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Kimia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Bahasa Indonesia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Bahasa Ingris', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Bahasa Daerah', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Penjaskes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Pendidikan Kewarganegaraan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Produk Kreatif dan Kewirausahaan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Bimbingan Konseling', '2021-12-05 23:11:17', '2021-12-05 23:11:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `email` (`username`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `kode_guru_id` (`kode_guru_id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `jadwal_id` (`jadwal_id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kode_guru`
--
ALTER TABLE `kode_guru`
  ADD PRIMARY KEY (`id_kode_guru`),
  ADD UNIQUE KEY `kode_guru` (`kode_guru`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kode_guru`
--
ALTER TABLE `kode_guru`
  MODIFY `id_kode_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_guru_id`) REFERENCES `kode_guru` (`id_kode_guru`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id_jadwal`);

--
-- Ketidakleluasaan untuk tabel `kode_guru`
--
ALTER TABLE `kode_guru`
  ADD CONSTRAINT `kode_guru_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `kode_guru_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id_mapel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
