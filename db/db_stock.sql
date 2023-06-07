-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2023 pada 04.40
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stock`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `name_customer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `name_customer`, `created_at`, `updated_at`) VALUES
(2, 'AHM', '2023-05-08 22:52:23', '2023-05-08 22:52:23'),
(3, 'HPM', '2023-05-09 02:57:03', '2023-05-09 02:57:03'),
(4, 'ADM', '2023-05-09 23:55:14', '2023-05-09 23:55:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fg_performance`
--

CREATE TABLE `fg_performance` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cust` varchar(255) NOT NULL,
  `part_no` varchar(255) NOT NULL,
  `part_name` varchar(255) NOT NULL,
  `line_proces` varchar(255) NOT NULL,
  `box_type` varchar(255) NOT NULL,
  `qty_kanban` int(11) NOT NULL,
  `min_stock` int(11) NOT NULL,
  `max_stock` int(11) NOT NULL,
  `act_stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fg_performance`
--

INSERT INTO `fg_performance` (`id`, `status`, `cust`, `part_no`, `part_name`, `line_proces`, `box_type`, `qty_kanban`, `min_stock`, `max_stock`, `act_stock`, `created_at`, `updated_at`) VALUES
(8, 2, 'AHM', '23432-43634', 'XXAPL', 'PLANT 1', 'PAL B', 200, 300, 600, 100, '2023-05-07 23:00:30', '2023-05-07 23:00:30'),
(9, 1, 'ADM', '23432-43635', 'ZZZZMMM', 'PLANT 1', 'PAL B', 100, 200, 300, 100, '2023-05-07 23:03:16', '2023-05-07 23:03:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `line`
--

CREATE TABLE `line` (
  `id` int(11) UNSIGNED NOT NULL,
  `name_line` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `line`
--

INSERT INTO `line` (`id`, `name_line`, `created_at`, `updated_at`) VALUES
(1, 'LINE C', '2023-05-08 23:10:37', '2023-05-08 23:11:44'),
(2, 'LINE A', '2023-05-09 02:56:31', '2023-05-09 02:56:31'),
(3, 'LINE D', '2023-05-09 23:54:06', '2023-05-09 23:54:06'),
(4, 'LINE E', '2023-05-10 02:53:33', '2023-05-10 02:53:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_04_051913_barang', 2),
(7, '2023_05_09_033453_rm_performance', 3),
(8, '2023_05_09_044737_vendor', 4),
(9, '2023_05_09_044753_customer', 4),
(10, '2023_05_09_044809_line', 4),
(11, '2023_05_09_044818_rak', 4),
(12, '2014_10_12_000000_create_users_table', 5),
(13, '2023_05_10_044502_summery', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `id` int(11) NOT NULL,
  `name_rak` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`id`, `name_rak`, `created_at`, `updated_at`) VALUES
(2, 'C.1.A', '2023-05-08 23:24:54', '2023-05-08 23:24:54'),
(3, 'C.1.B', '2023-05-09 23:54:43', '2023-05-09 23:54:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rm_performance`
--

CREATE TABLE `rm_performance` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `part_no_kbn` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `bq` varchar(255) NOT NULL,
  `spece_size_mateial` varchar(255) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `line_id` int(11) NOT NULL,
  `rak_id` int(11) DEFAULT NULL,
  `std_pck_pcs` varchar(255) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `act_kbn` int(11) NOT NULL,
  `act_pcs` int(11) NOT NULL,
  `status_moving` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rm_performance`
--

INSERT INTO `rm_performance` (`id`, `status`, `customer_id`, `model`, `part_no_kbn`, `jenis`, `bq`, `spece_size_mateial`, `vendor_id`, `line_id`, `rak_id`, `std_pck_pcs`, `min`, `max`, `act_kbn`, `act_pcs`, `status_moving`, `created_at`, `updated_at`) VALUES
(1, 0, 2, NULL, '32322-43434', 'jenis tes', '1', 'space tes', NULL, 1, NULL, '200', 234, 433, 600, 535, 1, '2023-05-09 00:03:32', '2023-05-09 00:03:32'),
(2, 3, 3, NULL, '73737-7737', 'Plat baja', '1', 'Space 200', 3, 2, 2, '200', 100, 200, 600, 150, 2, '2023-05-09 23:18:07', '2023-05-09 23:18:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `summery`
--

CREATE TABLE `summery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rm_performance_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nik` int(11) NOT NULL,
  `gander` int(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `levels` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `nik`, `gander`, `password`, `levels`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1234, 1, '$2y$10$m4MkbFCyAjouWqJSGeJrc.PC.pNwA6i5OBFggQ3XB/i96VoggIkFK', 1, 1, '2023-05-09 11:38:46', '2023-05-16 09:17:53'),
(2, 'Hairul', 12345, 1, '$2y$10$m4MkbFCyAjouWqJSGeJrc.PC.pNwA6i5OBFggQ3XB/i96VoggIkFK', 2, 1, '2023-05-09 12:39:33', '2023-05-16 09:18:43'),
(3, 'Ahmad Haidar', 1212, 1, '$2y$10$VxHSXTgKALS1gG1/n3.Y7edEw1H6mPVIldWs13V8G7aK.LmrXM7Py', 2, 1, '2023-05-10 01:08:15', '2023-05-10 02:29:19'),
(4, 'user A', 12345678, 1, '$2y$10$5/VLnbARjA2N.UOTBOlZoeb/.03l/4M06x0Yctzu4cokAlgnC.jnW', 2, 1, '2023-05-11 21:29:09', '2023-06-05 20:53:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name_vendor` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id`, `name_vendor`, `created_at`, `updated_at`) VALUES
(3, 'ORDER BY ME7', '2023-05-10 02:58:22', '2023-05-10 02:58:22'),
(4, 'ORDER BY ME7', '2023-05-10 02:59:02', '2023-05-10 02:59:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fg_performance`
--
ALTER TABLE `fg_performance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `part_no` (`part_no`);

--
-- Indeks untuk tabel `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rm_performance`
--
ALTER TABLE `rm_performance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_id` (`vendor_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `line` (`line_id`),
  ADD KEY `rak_id` (`rak_id`);

--
-- Indeks untuk tabel `summery`
--
ALTER TABLE `summery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rm_performance_id` (`rm_performance_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fg_performance`
--
ALTER TABLE `fg_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rak`
--
ALTER TABLE `rak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rm_performance`
--
ALTER TABLE `rm_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `summery`
--
ALTER TABLE `summery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
