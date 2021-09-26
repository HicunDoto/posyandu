-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 02:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu_danang`
--

-- --------------------------------------------------------

--
-- Table structure for table `balita`
--

CREATE TABLE `balita` (
  `id_balita` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tl` date NOT NULL,
  `jenis` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anakke` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balita`
--

INSERT INTO `balita` (`id_balita`, `nama`, `id_user`, `tempat`, `tl`, `jenis`, `ayah`, `ibu`, `anakke`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Kaylar', 2, 'sidoarjor', '2020-12-02', '0', 'yonor', 'tianikr', 'pertamar', 'buduranr', NULL, '2021-03-11 05:22:19'),
(5, 'Julaikahr', 15, 'Surabaya', '2021-12-16', '0', 'kutai', 'violet', 'kedua', 'buduran', '2021-03-15 22:46:51', '2021-03-15 22:46:51'),
(7, 'Ahmad Rizqi Efendi', 17, 'Surabaya', '2020-11-24', '1', 'kutai', 'tianikr', 'pertama', 'kepanjenrt', '2021-03-23 22:43:15', '2021-05-23 19:47:26'),
(8, 'yanuar', 18, 'mojokerto', '2021-04-02', '1', 'tara', 'violetr', '1', 'BANJARBENDO, RT/RW:03/02', '2021-07-08 23:21:36', '2021-07-08 23:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `bidan`
--

CREATE TABLE `bidan` (
  `id_bidan` bigint(20) UNSIGNED NOT NULL,
  `nama_bidan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tl` date NOT NULL,
  `jenis` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidan`
--

INSERT INTO `bidan` (`id_bidan`, `nama_bidan`, `tempat`, `tl`, `jenis`, `status`, `no_telp`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'Muhammad Reza Pahlevi', 'Surabaya', '2001-05-07', '1', 'aktif', '084532423423', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', '2021-03-04 23:07:18', '2021-03-04 23:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `dt_imunisasi`
--

CREATE TABLE `dt_imunisasi` (
  `id_dtimun` bigint(20) UNSIGNED NOT NULL,
  `id_imun` bigint(20) UNSIGNED NOT NULL,
  `id_balita` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_imunisasi`
--

INSERT INTO `dt_imunisasi` (`id_dtimun`, `id_imun`, `id_balita`, `created_at`, `updated_at`) VALUES
(2, 2, 1, '2021-05-30 20:25:04', '2021-05-30 20:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `dt_vaksin`
--

CREATE TABLE `dt_vaksin` (
  `id_dtvaksin` bigint(20) UNSIGNED NOT NULL,
  `id_vaksin` bigint(20) UNSIGNED NOT NULL,
  `id_balita` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_vaksin`
--

INSERT INTO `dt_vaksin` (`id_dtvaksin`, `id_vaksin`, `id_balita`, `created_at`, `updated_at`) VALUES
(2, 2, 1, '2021-05-30 20:03:44', '2021-06-01 20:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id_imun` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `id_balita` bigint(20) UNSIGNED NOT NULL,
  `imunisasi` varchar(255) NOT NULL,
  `usia` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imunisasi`
--

INSERT INTO `imunisasi` (`id_imun`, `id_jadwal`, `id_balita`, `imunisasi`, `usia`, `created_at`, `updated_at`) VALUES
(2, 2, 8, 'B', '0 - 9 bulan', '2021-05-30 19:04:58', '2021-07-08 23:23:01'),
(6, 2, 0, 'c', '0 - 9 bulan', '2021-06-21 06:02:50', '2021-06-21 06:02:50'),
(7, 2, 1, 'a', '0 - 9 bulan', '2021-06-21 06:02:58', '2021-06-22 19:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tgl_kegiatan`, `nama_kegiatan`, `created_at`, `updated_at`) VALUES
(1, '2021-05-11', 'Kegiatan vaksinasi', NULL, '2021-06-01 18:08:45'),
(2, '2021-05-11', 'Kegiatan Imunisasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kader`
--

CREATE TABLE `kader` (
  `id_kader` bigint(20) UNSIGNED NOT NULL,
  `nama_kader` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tl` date NOT NULL,
  `jenis` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` enum('ketua','staff') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kader`
--

INSERT INTO `kader` (`id_kader`, `nama_kader`, `tempat`, `tempatl`, `tl`, `jenis`, `jabatan`, `no_telp`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'Kevin', 'asdasdasda', 'Surabaya', '2021-03-05', '1', 'ketua', '0856565633', 'asfasfasfasfasf', '2021-03-04 23:24:39', '2021-03-04 23:24:39'),
(7, 'Muhammad Reza Pahlevi', 'asafsasfasfafs', 'Surabaya', '2021-03-09', '0', 'ketua', '08888888', 'sdgsdg', '2021-03-04 23:35:05', '2021-03-04 23:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2021_03_03_151340_create_balita_table', 1),
(29, '2021_03_03_151606_create_kader_table', 1),
(30, '2021_03_03_152218_create_bidan_table', 1),
(31, '2021_03_03_154356_create_penimbangan_table', 1),
(32, '2021_03_03_154550_create_pelayanan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` bigint(20) UNSIGNED NOT NULL,
  `id_bidan` bigint(20) UNSIGNED NOT NULL,
  `id_balita` bigint(20) UNSIGNED NOT NULL,
  `id_kader` bigint(20) UNSIGNED NOT NULL,
  `id_penimbangan` bigint(20) UNSIGNED DEFAULT NULL,
  `tgl_layanan` date NOT NULL,
  `id_imun` bigint(20) UNSIGNED NOT NULL,
  `id_vaksin` bigint(20) UNSIGNED NOT NULL,
  `penyuluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelayanan`, `id_bidan`, `id_balita`, `id_kader`, `id_penimbangan`, `tgl_layanan`, `id_imun`, `id_vaksin`, `penyuluhan`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 7, 3, '2021-03-07', 2, 2, 'awawe', '2021-03-06 18:47:33', '2021-03-09 05:09:49'),
(11, 2, 8, 2, 10, '2021-07-09', 2, 2, 'oke', '2021-07-08 23:23:01', '2021-07-08 23:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `penimbangan`
--

CREATE TABLE `penimbangan` (
  `id_penimbangan` bigint(20) UNSIGNED NOT NULL,
  `id_bidan` bigint(20) UNSIGNED NOT NULL,
  `id_balita` bigint(20) UNSIGNED NOT NULL,
  `id_kader` bigint(20) UNSIGNED NOT NULL,
  `tgl_timbang` date NOT NULL,
  `bb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penimbangan`
--

INSERT INTO `penimbangan` (`id_penimbangan`, `id_bidan`, `id_balita`, `id_kader`, `tgl_timbang`, `bb`, `tb`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 2, '2021-03-07', '5', '22', '2021-03-05 01:42:17', '2021-03-07 09:35:20'),
(6, 2, 1, 2, '2021-04-10', '6', '25', '2021-03-08 09:12:38', '2021-03-08 09:12:38'),
(7, 2, 1, 2, '2021-05-10', '22.5', '22', '2021-03-08 09:15:31', '2021-03-08 09:15:31'),
(8, 2, 5, 7, '2021-03-07', '4', '50', '2021-03-15 22:50:48', '2021-03-15 22:50:48'),
(10, 2, 8, 2, '2021-07-09', '32', '43', '2021-07-08 23:22:22', '2021-07-08 23:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `posyandu`
--

CREATE TABLE `posyandu` (
  `id_posyandu` bigint(20) NOT NULL,
  `posyandu` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posyandu`
--

INSERT INTO `posyandu` (`id_posyandu`, `posyandu`, `created_at`, `updated_at`) VALUES
(1, 'Posyandu Kemuning I', '2021-06-12 01:59:43', '2021-06-21 04:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'danang@gmail.com', NULL, '$2y$10$QmNLQ3YW1blyUbfEWOh1oO3FkRJcNxI8rV2OL8aoTTZ4w9oAWe0oq', 'admin', 'vTWDG8xurssrenEkmVIPVRUnhnfk5cVISCPNyt5Sbv1ktAZ72vvcHjkpUfof', '2021-03-04 09:06:15', '2021-03-04 09:06:15'),
(2, 'danang10@gmail.com', NULL, '$2y$10$DU05RNg0l9L.n.WgUEXL8OVgBpDezrs5qGvilrXZvKQiOeNUnvunK', 'user', '4eZqy7KVolIbwTsR4RLxd5tHiGWPIecg6zUS33cjl92rAsv9nliD3LrdVeoS', '2021-03-04 09:20:31', '2021-03-11 05:22:19'),
(15, 'danang11@gmail.com', NULL, '$2y$10$9h7KM0gX/NbPZa1slOv3TuG7pj6Yerhn4VmIizukJ8zrcL.perrsy', 'user', 'ZVabDM5zV7PEMkem8bmL7vx4K30UiTJ9YTconujQQwzFgh4Zk2V5BuDVLQJJ', '2021-03-15 22:41:16', '2021-03-15 22:41:16'),
(17, 'hicun@gmail.com', NULL, '$2y$10$Xlt4kZ1xwssQWfloQ8kM0e39F9IHX.Rcicz.Q//dd2ge5H4GXCOVG', 'user', '1DNnULHCubz5Id9aaBSIE9rXFqAp619fnCgJaGI8eOQsymyg4ktBiQ3sf40t', '2021-03-23 22:42:41', '2021-05-23 19:47:26'),
(18, 'ngepet123@ab.cd', NULL, '$2y$10$LJ103rXfQVhEmVGnc22UWehBHCsiqMMBRGQeCNqtDl4A1zQbJoyke', 'user', '5Rqqm2hH4nOBm0VAbKkXOG6eXhFJJ8y1K4zRiPLtDpNnaIl4vQ54LHKeyWUy', '2021-07-08 23:20:47', '2021-07-08 23:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `vaksinasi`
--

CREATE TABLE `vaksinasi` (
  `id_vaksin` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `id_balita` bigint(20) UNSIGNED NOT NULL,
  `vaksin` varchar(255) NOT NULL,
  `usia` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaksinasi`
--

INSERT INTO `vaksinasi` (`id_vaksin`, `id_jadwal`, `id_balita`, `vaksin`, `usia`, `created_at`, `updated_at`) VALUES
(2, 1, 8, 'Vaksin Hepatitis B', '0 - 9 bulan', '2021-05-25 20:53:04', '2021-07-08 23:23:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balita`
--
ALTER TABLE `balita`
  ADD PRIMARY KEY (`id_balita`),
  ADD KEY `balita_id_user_foreign` (`id_user`);

--
-- Indexes for table `bidan`
--
ALTER TABLE `bidan`
  ADD PRIMARY KEY (`id_bidan`);

--
-- Indexes for table `dt_imunisasi`
--
ALTER TABLE `dt_imunisasi`
  ADD PRIMARY KEY (`id_dtimun`);

--
-- Indexes for table `dt_vaksin`
--
ALTER TABLE `dt_vaksin`
  ADD PRIMARY KEY (`id_dtvaksin`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`id_imun`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kader`
--
ALTER TABLE `kader`
  ADD PRIMARY KEY (`id_kader`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`),
  ADD KEY `pelayanan_id_bidan_foreign` (`id_bidan`),
  ADD KEY `pelayanan_id_balita_foreign` (`id_balita`),
  ADD KEY `pelayanan_id_kader_foreign` (`id_kader`);

--
-- Indexes for table `penimbangan`
--
ALTER TABLE `penimbangan`
  ADD PRIMARY KEY (`id_penimbangan`),
  ADD KEY `penimbangan_id_bidan_foreign` (`id_bidan`),
  ADD KEY `penimbangan_id_balita_foreign` (`id_balita`),
  ADD KEY `penimbangan_id_kader_foreign` (`id_kader`);

--
-- Indexes for table `posyandu`
--
ALTER TABLE `posyandu`
  ADD PRIMARY KEY (`id_posyandu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vaksinasi`
--
ALTER TABLE `vaksinasi`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balita`
--
ALTER TABLE `balita`
  MODIFY `id_balita` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bidan`
--
ALTER TABLE `bidan`
  MODIFY `id_bidan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dt_imunisasi`
--
ALTER TABLE `dt_imunisasi`
  MODIFY `id_dtimun` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dt_vaksin`
--
ALTER TABLE `dt_vaksin`
  MODIFY `id_dtvaksin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id_imun` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kader`
--
ALTER TABLE `kader`
  MODIFY `id_kader` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penimbangan`
--
ALTER TABLE `penimbangan`
  MODIFY `id_penimbangan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posyandu`
--
ALTER TABLE `posyandu`
  MODIFY `id_posyandu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vaksinasi`
--
ALTER TABLE `vaksinasi`
  MODIFY `id_vaksin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balita`
--
ALTER TABLE `balita`
  ADD CONSTRAINT `balita_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD CONSTRAINT `pelayanan_id_balita_foreign` FOREIGN KEY (`id_balita`) REFERENCES `balita` (`id_balita`) ON DELETE CASCADE,
  ADD CONSTRAINT `pelayanan_id_bidan_foreign` FOREIGN KEY (`id_bidan`) REFERENCES `bidan` (`id_bidan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pelayanan_id_kader_foreign` FOREIGN KEY (`id_kader`) REFERENCES `kader` (`id_kader`) ON DELETE CASCADE;

--
-- Constraints for table `penimbangan`
--
ALTER TABLE `penimbangan`
  ADD CONSTRAINT `penimbangan_id_balita_foreign` FOREIGN KEY (`id_balita`) REFERENCES `balita` (`id_balita`) ON DELETE CASCADE,
  ADD CONSTRAINT `penimbangan_id_bidan_foreign` FOREIGN KEY (`id_bidan`) REFERENCES `bidan` (`id_bidan`) ON DELETE CASCADE,
  ADD CONSTRAINT `penimbangan_id_kader_foreign` FOREIGN KEY (`id_kader`) REFERENCES `kader` (`id_kader`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
