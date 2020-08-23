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

 Date: 19/08/2020 21:30:55
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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materi
-- ----------------------------
INSERT INTO `materi` VALUES (1, '1', 'Vocabulary', 'Vocabulary', 'demicinta.mp4', '2020-08-16 23:13:20');

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
  `harga` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_paket`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of paket
-- ----------------------------
INSERT INTO `paket` VALUES (1, 'PAKET 4 BUKU JAGO ENGLISH', 80000);

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
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `level` enum('peserta','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `start_login` date NULL DEFAULT NULL,
  `expired_login` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2107 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'fauzin', 'fauzin', 'fauzin@gmail.com', '2020-08-18 23:34:11', '$2y$10$YogCCBcCikQjJwzqFL0UY.jDuEDDU8X3/vyKqCK1irepYEwaYzzme', 'fauzin123', NULL, NULL, NULL, NULL, 'ooJ66v0LS0zQVCiJem2NAPa9y5EfWFxRmywG89dT3QIBFhx1hi2NEXgymzja', '2020-08-18 23:34:11', '2020-08-18 23:34:11', 'admin', NULL, 'Paket 4', '2020-08-18', '2020-09-18');
INSERT INTO `users` VALUES (2, 'haris', 'haris', 'haris@gmail.com', '2020-08-18 23:26:03', '$2y$10$9UxiDZL6PUbnc.zh1jGKcer043I21bfTQb.xZNsKKChE8Uy7jMqMe', 'haris123', NULL, NULL, '085855042212', NULL, 'FJqGgJVqkyeh68Cxsp3BcetFRXeB3mJFoh55Yq4NxMeYMhXfWrxLJpIO5qSY', '2020-08-18 23:26:03', '2020-08-18 23:26:03', 'peserta', NULL, 'Paket 4', '2020-08-18', '2020-09-18');
INSERT INTO `users` VALUES (3, 'irhas', 'irhas', 'irhas@gmail.com', '2020-08-18 23:29:28', '$2y$10$lOx3e4YCI3Q2yKqq48Gto.6v6b/d8UAHeAA3pskO3eNCVUv9FWo3m', 'irhas123', NULL, NULL, NULL, NULL, 'wsGYAvV9RgiMIZZJb3YYylql4v6Pq68plOyreUnu5eC7tuFNPmvkKpisk1pp', '2020-08-18 23:29:28', '2020-08-18 23:29:28', 'peserta', NULL, 'Paket 4', '2020-08-18', '2020-09-18');
INSERT INTO `users` VALUES (2098, 'Agus Eko Setyono', 'Agus Eko Setyono', NULL, NULL, '$2y$10$X9HkwBEfiACjwkICDbwDUuOC/1NM01icOpFv8/nFHS.UcxQbBj/sa', 'yourpassword', 'Kab. Grobogan', NULL, '6285325108027', 'foto.jpg', NULL, NULL, NULL, 'peserta', '18522416', 'PAKET 4 BUKU JAGO ENGLISH', '2020-08-18', '2020-10-18');
INSERT INTO `users` VALUES (2099, 'Gilang ramadhan setiadi', 'Gilang ramadhan setiadi', NULL, NULL, '$2y$10$w37qOab/J1QnRhd5MvXQNuKi3ALUrBq3wDCYYK06E4avn4Ajix0xC', 'yourpassword', 'Kota Samarinda', NULL, '6283141786960', 'foto.jpg', NULL, NULL, NULL, 'peserta', '17706078', 'PAKET 4 BUKU JAGO ENGLISH', '2020-08-18', '2020-10-18');
INSERT INTO `users` VALUES (2100, 'Yanti Kurniasari', 'Yanti Kurniasari', NULL, NULL, '$2y$10$ehO/TfqclyBO5kLbG0V5aeMJ7f9hOMGMIr3AK95UFVHAZ5c9elx0q', 'yourpassword', 'Kota Samarinda', NULL, '6282290329215', 'foto.jpg', NULL, NULL, NULL, 'peserta', '17518532', 'PAKET 4 BUKU JAGO ENGLISH', '2020-08-18', '2020-10-18');
INSERT INTO `users` VALUES (2101, 'Agus setiawan', 'Agus setiawan', NULL, NULL, '$2y$10$ZfV2.0u4E/ilqrSEnD4wyeyM1lFDsGnNPC4NTud7yCE8J1MRlMLQS', 'yourpassword', 'Kota Jakarta Barat', NULL, '6289503349431', 'foto.jpg', NULL, NULL, NULL, 'peserta', '17163294', 'PAKET 4 BUKU JAGO ENGLISH', '2020-08-18', '2020-10-18');
INSERT INTO `users` VALUES (2102, 'Esty rina tokoro', 'Esty rina tokoro', NULL, NULL, '$2y$10$PTOl7yjF3R6sCUGgrj5Al.A7hU9YQHivVbDByHpfqixfLz2Ubj52.', 'yourpassword', 'Kota Jayapura', NULL, '6282197831987', 'foto.jpg', NULL, NULL, NULL, 'peserta', '15087257', 'PAKET 4 BUKU JAGO ENGLISH', '2020-08-18', '2020-10-18');
INSERT INTO `users` VALUES (2103, 'Felix ferdin Bakker', 'Felix ferdin Bakker', NULL, NULL, '$2y$10$e2bcpNHW76PUjy1Lq19z9eG8eZAQIJvjvawywz0C.LvJu3Ndbl.xq', 'yourpassword', 'Kab. Sidoarjo', NULL, '6281358810391', 'foto.jpg', NULL, NULL, NULL, 'peserta', '15070736', 'PAKET 4 BUKU JAGO ENGLISH', '2020-08-18', '2020-10-18');
INSERT INTO `users` VALUES (2104, 'ARITHA CHINTYA DEWO', 'ARITHA CHINTYA DEWO', NULL, NULL, '$2y$10$alARr4TgN33EOnybzH1QTuhmQr4tMvIghOAhV3JZnl6WqVK92DZnG', 'yourpassword', 'Kota Palangka Raya', NULL, '6285249247056', 'foto.jpg', NULL, NULL, NULL, 'peserta', '15068616', 'PAKET 4 BUKU JAGO ENGLISH', '2020-08-18', '2020-10-18');
INSERT INTO `users` VALUES (2105, 'Magfira hs', 'Magfira hs', NULL, NULL, '$2y$10$xXzS1FLAvN8BP.bBt3QzKubd3wqwTf8D1EMPm2POqlKNrpBWqbyNC', 'yourpassword', 'Kab. Pangkajene Kepulauan', NULL, '6282187708481', 'foto.jpg', NULL, NULL, NULL, 'peserta', '14992535', 'PAKET 4 BUKU JAGO ENGLISH', '2020-08-18', '2020-10-18');
INSERT INTO `users` VALUES (2106, 'Magfira hs', 'Magfira hs', NULL, NULL, '$2y$10$CiIFr5B9T9SwCtBBo3HjC.acdgc17vF8FJTe0J/3vKKntjIGg9frC', 'yourpassword', 'Kab. Pangkajene Kepulauan', NULL, '6282187708481', 'foto.jpg', NULL, NULL, NULL, 'peserta', '14992107', 'PAKET 4 BUKU JAGO ENGLISH', '2020-08-18', '2020-10-18');

SET FOREIGN_KEY_CHECKS = 1;
