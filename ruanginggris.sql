/*
 Navicat Premium Data Transfer

 Source Server         : konek
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : ruanginggris

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 04/09/2020 19:59:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for materi
-- ----------------------------
DROP TABLE IF EXISTS `materi`;
CREATE TABLE `materi`  (
  `id_materi` int(11) NOT NULL AUTO_INCREMENT,
  `id_paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_materi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `konten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_publikasi` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_materi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materi
-- ----------------------------
INSERT INTO `materi` VALUES (2, '2', 'gramer', 'penjelasan non', '1362712562.mp4', '2020-09-01 14:50:38');
INSERT INTO `materi` VALUES (3, '1', 'gramer', 'penjelasan non', '131353734.mp4', '2020-09-01 15:19:28');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);

-- ----------------------------
-- Table structure for paket
-- ----------------------------
DROP TABLE IF EXISTS `paket`;
CREATE TABLE `paket`  (
  `id_paket` int(11) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_paket`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of paket
-- ----------------------------
INSERT INTO `paket` VALUES (1, 'PAKET 4 BUKU JAGO ENGLISH', 'Gramar');
INSERT INTO `paket` VALUES (2, 'PAKET BUNDLING 2', 'Speaking');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` int(11) NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password_asli` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `telp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  `level` enum('peserta','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `start_login` date NULL DEFAULT NULL,
  `expired_login` date NULL DEFAULT NULL,
  `status_login` enum('login','nologin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3176 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'fauzin', 'fauzin', 'fauzin@gmail.com', '2020-09-04 19:47:14', '$2y$10$jjzJkeQO8JHay6hTayINbOA3FMw/BzzKXFWgjnNlD6Hpqmek5IMSK', 'fauzin123', 'sambirejo', 'kediri', '085855042212', '1598215693_profil.png', 'PNd7HMDxtAHJbRd2an8LO5bPuE5V4sPpt7PWiHUkXqVk8G4NCUy7VMa4C2s6', '2020-08-18', '2020-08-23', 'admin', NULL, '', '2020-11-25', '2020-09-04', 'login');
INSERT INTO `users` VALUES (2, 'haris', 'haris', 'haris@gmail.com', '2020-09-04 19:58:39', '$2y$10$UFnR5/W4Zwf3YhXjC5JwKO0VMStIKeZZheBdQtXPCqxZ5gvGTsw1W', 'haris123', 'pare', 'kediri', '085855042212', '1598215712_profil.png', 'FJqGgJVqkyeh68Cxsp3BcetFRXeB3mJFoh55Yq4NxMeYMhXfWrxLJpIO5qSY', '2020-08-18', '2020-08-23', 'admin', NULL, '', '2020-11-25', '2020-09-18', NULL);
INSERT INTO `users` VALUES (3, 'irhas', 'irhas', 'irhas@gmail.com', '2020-09-04 19:58:39', '$2y$10$xvD..JvjZ2xGzc31XVAeDuIG9udl3m/MnH2zwVXwqfFV3whqU83XC', 'irhas123', 'sambirejo', 'kediri', '085855042212', '1598215667_profil.png', 'ot8XMjKoHEq7qNttxrnAQsAszFWxKbvhIQk53VochTrRDOIHaPAIiqCrv6G1', '2020-08-18', '2020-08-23', 'admin', NULL, '', '2020-11-25', '2020-09-18', NULL);
INSERT INTO `users` VALUES (3157, 'Agus Eko Setyono', 'Agus Eko Setyono', 'AgusEkoSetyono@gamil.com', '2020-09-04 19:58:39', '$2y$10$vP6Lnlzlhg2kRzCETico8uTB3OVnGHlTdsNZvDmvagnu6aDglKDn2', 'yourpassword', 'Kab. Grobogan', NULL, '6285325108027', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '18522416', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3158, 'Gilang ramadhan setiadi', 'Gilang ramadhan setiadi', NULL, '2020-09-04 19:58:39', '$2y$10$rAo9DGWUB.sciALmFmiwje9mxANUepDoJ9xFtqsuD3wCfPa.b24La', 'yourpassword', 'Kota Samarinda', NULL, '6283141786960', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '17706078', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3159, 'Yanti Kurniasari', 'Yanti Kurniasari', NULL, '2020-09-04 19:58:39', '$2y$10$b.pifpHK795/M5u.Yaakr.FC.6ak4G1Lnb.GNyvKfyAnAAArBzIWq', 'yourpassword', 'Kota Samarinda', NULL, '6282290329215', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '17518532', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3160, 'Agus setiawan', 'Agus setiawan', NULL, '2020-09-04 19:58:39', '$2y$10$DLhNUGArKNMTm7iezT72p.wU2ECdB8QG592wmG8UTxa9Ykyu3b4E2', 'yourpassword', 'Kota Jakarta Barat', NULL, '6289503349431', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '17163294', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3161, 'Esty rina tokoro', 'Esty rina tokoro', NULL, '2020-09-04 19:58:40', '$2y$10$EhL.UpaqK4cvkMITqZO6eOo2Leabf96x/RrhFRs8z3m/R1tNSSF/K', 'yourpassword', 'Kota Jayapura', NULL, '6282197831987', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '15087257', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3162, 'Felix ferdin Bakker', 'Felix ferdin Bakker', NULL, '2020-09-04 19:58:40', '$2y$10$K0rTsF53gUBsQyOvXewRA.zIAuOotmLY9PimbqoXVgVXv2GuEISMO', 'yourpassword', 'Kab. Sidoarjo', NULL, '6281358810391', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '15070736', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3163, 'ARITHA CHINTYA DEWO', 'ARITHA CHINTYA DEWO', NULL, '2020-09-04 19:58:40', '$2y$10$E8Qa1FyssEMLlPGraXWGfudSfrmZHAbdfoLnLoi/qt6KjOL8eMpGO', 'yourpassword', 'Kota Palangka Raya', NULL, '6285249247056', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '15068616', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3164, 'Magfira hs', 'Magfira hs', NULL, '2020-09-04 19:58:40', '$2y$10$woEaxNi0M6nDpvgNZnpPcOnYg5PDS5a4TqXtCeJiTWXk04zroN1RC', 'yourpassword', 'Kab. Pangkajene Kepulauan', NULL, '6282187708481', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '14992535', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3165, 'Magfira hs', 'Magfira hs', NULL, '2020-09-04 19:58:40', '$2y$10$5EwzHs/rCgrh02IEfEhCDO/q11jnvSPVCMYZiTu3Itpbhzm3c69..', 'yourpassword', 'Kab. Pangkajene Kepulauan', NULL, '6282187708481', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '14992107', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3166, 'Anton SM', 'Anton SM', NULL, '2020-09-04 19:58:40', '$2y$10$8jzUnuVJ3jy8D/bXzSl42uLj8kigv0CZdtUPIfxAIfE0f7NXGnokC', 'yourpassword', 'Kab. Cianjur', NULL, '6285959036311', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '14971012', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3167, 'Filhasnetti Algoumar', 'Filhasnetti Algoumar', NULL, '2020-09-04 19:58:40', '$2y$10$kerSSubWSP4Sqf9JqXYDf.6AzpT/IQqxPZ9OK.F1a3lycbkIXgSO2', 'yourpassword', 'Kota Bekasi', NULL, '6281384377970', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '14963714', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3168, 'Aom jembar', 'Aom jembar', NULL, '2020-09-04 19:58:40', '$2y$10$BUuaKc5arjqoA.T17SJwNe.mGhouTSkIFjH2e/iKRXQsypOHVyjj6', 'yourpassword', 'Kab. Subang', NULL, '6282319733434', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '14961193', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3169, 'Hamsir', 'Hamsir', NULL, '2020-09-04 19:58:40', '$2y$10$l4R5Jmp47SQBY01JvcrSZ.ZqxI0ULnrVNHE7ZVQbzs4cE7mWlT0ue', 'yourpassword', 'Kab. Bogor', NULL, '6281244089969', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '14960980', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3170, 'YOFI', 'YOFI', NULL, '2020-09-04 19:58:40', '$2y$10$61paOISauoxxFDABzgNnRuQjl4s0LF3JvvqeCEPlyomHDXTMAr7q2', 'yourpassword', 'Kab. Bogor', NULL, '628127585410', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '14958158', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3171, 'Agustinus Bere', 'Agustinus Bere', NULL, '2020-09-04 19:58:40', '$2y$10$/e2SqTLmjMWMvD6UDXt1oOsWMGObJ5R86dszB/e3JchKdPS5kPyEe', 'yourpassword', 'Kota Surabaya', NULL, '6281216723242', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '14956922', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3172, 'Boby irawan', 'Boby irawan', NULL, '2020-09-04 19:58:40', '$2y$10$Bfsh6ELugrFWjt9iJzE9kuizmgkbNvqVZ.N/SchVpUrVrIi6neO1u', 'yourpassword', 'Kota Banda Aceh', NULL, '6282215854237', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '14953781', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3173, 'ErfinButon', 'ErfinButon', NULL, '2020-09-04 19:58:40', '$2y$10$tR12yOlMUrINzgQupOUc8OtidaoUqhmomqsgBKTfvpU75auD0ngZm', 'yourpassword', 'Kab. Bogor', NULL, '6281382825301', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '14953207', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3174, 'Muhammad Alfi Syahrin', 'Muhammad Alfi Syahrin', NULL, '2020-09-04 19:58:40', '$2y$10$zOWIJXl0w6oEd7IdxunTuOprOqntGRDtbP18EoK4ucIevZl9nYhOq', 'yourpassword', 'Kota Bekasi', NULL, '6281213185356', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '14950497', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);
INSERT INTO `users` VALUES (3175, 'Emmy', 'Emmy', NULL, '2020-09-04 19:58:40', '$2y$10$NtI4TK9uJDTxaivgJUBhF.xoO9kcsKKFkGHSCjQFEkPSgNa9j7eei', 'yourpassword', 'Kota Pematang Siantar', NULL, '6281290248870', 'foto.jpg', NULL, '2020-08-18', '2020-08-18', 'peserta', '14947631', 'PAKET 4 BUKU JAGO ENGLISH', '2020-11-25', '2020-10-18', NULL);

SET FOREIGN_KEY_CHECKS = 1;
