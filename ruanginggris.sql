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

 Date: 17/08/2020 20:44:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for materi
-- ----------------------------
DROP TABLE IF EXISTS `materi`;
CREATE TABLE `materi`  (
  `id_materi` int(11) NOT NULL AUTO_INCREMENT,
  `id_paket` int(255) NULL DEFAULT NULL,
  `nama_materi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `konten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_publikasi` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_materi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materi
-- ----------------------------
INSERT INTO `materi` VALUES (1, 1, 'Vocabulary', 'Vocabulary', 'demicinta.mp4', '2020-08-16 23:13:20');

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
  `id_user` int(255) NULL DEFAULT NULL,
  `nama_paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_paket`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of paket
-- ----------------------------
INSERT INTO `paket` VALUES (1, 2, 'Vocabulary', 80000);

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
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password_asli` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `telp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `level` enum('peserta','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'fauzin', NULL, 'fauzin@gmail.com', NULL, '$2y$10$YogCCBcCikQjJwzqFL0UY.jDuEDDU8X3/vyKqCK1irepYEwaYzzme', 'fauzin123', NULL, NULL, NULL, 'lLCsmAbxZXEBSeLVtBs2TjU1aBUqeg1qATpl6uNz6MGwJS9QS8yzoL7NzFnD', '2020-08-16 14:14:22', '2020-08-16 14:14:22', 'admin');
INSERT INTO `users` VALUES (2, 'haris', NULL, 'haris@gmail.com', NULL, '$2y$10$9UxiDZL6PUbnc.zh1jGKcer043I21bfTQb.xZNsKKChE8Uy7jMqMe', 'haris123', NULL, '085855042212', NULL, 'F9c97lDWTNy2G9s7BEexY05UlugUgbOOnZLybL3Q89a3Zb3JH0mPBtMNVopx', '2020-08-16 14:48:19', '2020-08-16 14:48:19', 'peserta');
INSERT INTO `users` VALUES (10, 'irhas', NULL, 'irhas@gmail.com', NULL, '$2y$10$lOx3e4YCI3Q2yKqq48Gto.6v6b/d8UAHeAA3pskO3eNCVUv9FWo3m', 'irhas123', NULL, NULL, NULL, 'c4PU2TsKOR7s6yfOIOQ14srllhPPn5hEHHwqAURaLocAP80myibfzmNTzFyY', '2020-08-16 15:07:29', '2020-08-16 15:07:29', 'peserta');
INSERT INTO `users` VALUES (23, 'nama', 'username', 'email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-17 13:14:39', '2020-08-17 13:14:39', NULL);
INSERT INTO `users` VALUES (24, 'fauzin1', NULL, 'fauzin1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-17 13:14:39', '2020-08-17 13:14:39', NULL);
INSERT INTO `users` VALUES (25, 'haris1', NULL, 'haris1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-17 13:14:39', '2020-08-17 13:14:39', NULL);
INSERT INTO `users` VALUES (26, 'irhas1', NULL, 'irhas1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-17 13:14:39', '2020-08-17 13:14:39', NULL);

SET FOREIGN_KEY_CHECKS = 1;
