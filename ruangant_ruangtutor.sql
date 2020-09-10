-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2020 at 11:04 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruangant_ruangtutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_paket` varchar(255) DEFAULT NULL,
  `nama_materi` varchar(255) DEFAULT NULL,
  `konten` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `tanggal_publikasi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_paket`, `nama_materi`, `konten`, `video`, `tanggal_publikasi`) VALUES
(9, '4', 'Grammar - language', 'penjelasan non', 'Grammar-language.mp4', '2020-09-07 18:13:52'),
(10, '4', 'Grammar - word', 'penjelasan non', 'Grammar-word.mp4', '2020-09-07 18:13:52'),
(11, '4', 'contoh', 'penjelasan non', '1319863228.mp4', '2020-09-07 18:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(255) DEFAULT NULL,
  `buku` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `buku`) VALUES
(4, 'PAKET HEMAT 4', 'Easy Instant Grammar');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` int(11) NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_asli` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `level` enum('peserta','admin') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_login` date DEFAULT NULL,
  `expired_login` date DEFAULT NULL,
  `status_login` enum('login','nologin') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `email_verified_at`, `password`, `password_asli`, `alamat`, `kota`, `telp`, `foto`, `remember_token`, `created_at`, `updated_at`, `level`, `order_id`, `nama_paket`, `start_login`, `expired_login`, `status_login`) VALUES
(1, 'fauzin', 'fauzin', 'fauzin@gmail.com', '2020-09-09 14:47:10', '$2y$10$jjzJkeQO8JHay6hTayINbOA3FMw/BzzKXFWgjnNlD6Hpqmek5IMSK', 'fauzin123', 'sambirejo', 'kediri', '085855042212', '1598215693_profil.png', '0Poy5kUvUN9XFi6kdWTVlBgBq1vM3NOJCG1GtuQFpmQpbu6OaVWj5Lt4PL1F', '2020-08-18', '2020-08-23', 'admin', NULL, '', '2020-11-25', '2020-09-09', 'nologin'),
(2, 'haris', 'haris', 'haris@gmail.com', '2020-09-09 06:43:30', '$2y$10$UFnR5/W4Zwf3YhXjC5JwKO0VMStIKeZZheBdQtXPCqxZ5gvGTsw1W', 'haris123', 'pare', 'kediri', '085855042212', '1598215712_profil.png', 'EwNVDHfy6p8UBgJWrIKSreYQgEgNTZthKFfMNzWEIWNlvsTjoNTwA7ieDaYT', '2020-08-18', '2020-08-23', 'admin', NULL, '', '2020-11-25', '2020-09-09', 'login'),
(3, 'irhas', 'irhas', 'irhas@gmail.com', '2020-09-08 03:24:23', '$2y$10$xvD..JvjZ2xGzc31XVAeDuIG9udl3m/MnH2zwVXwqfFV3whqU83XC', 'irhas123', 'sambirejo', 'kediri', '085855042212', '1598215667_profil.png', 'IICMUzUGWGh9SIdD6vqGkXqwdz7sDzEPvaQVYpklbYTcyUyg96fLHvBzWi43', '2020-08-18', '2020-08-23', 'admin', NULL, '', '2020-11-25', '2020-09-08', 'nologin'),
(3230, 'Muhammad Nur Hasan', 'Muhammad Nur Hasan', NULL, '2020-09-09 13:30:00', '$2y$10$oG4fZzynUL51SFzXre0RZu6CCLaLezr.ib1fIc1CYv7zwCCzrFeHe', 'yourpassword', 'Kab. Bekasi', NULL, '6282140000000', 'foto.png', NULL, '2020-08-18', '2020-08-18', 'peserta', '21864694', 'PAKET HEMAT 4', '2020-09-05', '2020-09-09', 'login');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3231;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
