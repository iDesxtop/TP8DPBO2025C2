/*
 Navicat Premium Data Transfer

 Source Server         : adsad
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : tp8dpbo2025c2

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 03/05/2025 18:18:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dosen
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dosen
-- ----------------------------
INSERT INTO `dosen` VALUES (1, 'Dr. Budi Santoso', 'Jl. Ahmad Yani No. 45, Bandung', '081234567890');
INSERT INTO `dosen` VALUES (2, 'Prof. Siti Rahayu', 'Jl. Diponegoro No. 78, Jakarta', '082345678901');
INSERT INTO `dosen` VALUES (3, 'Dr. Ahmad Hidayat', 'Jl. Sudirman No. 123, Surabaya', '083456789012');
INSERT INTO `dosen` VALUES (4, 'Dr. Dewi Lestari', 'Jl. Gatot Subroto No. 56, Bandung', '084567890123');
INSERT INTO `dosen` VALUES (5, 'Prof. Bambang Wijaya', 'Jl. Pahlawan No. 34, Yogyakarta', '085678901234');

-- ----------------------------
-- Table structure for prodi
-- ----------------------------
DROP TABLE IF EXISTS `prodi`;
CREATE TABLE `prodi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fakultas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of prodi
-- ----------------------------
INSERT INTO `prodi` VALUES (1, 'Teknik Informatika', 'Fakultas Ilmu Komputer');
INSERT INTO `prodi` VALUES (2, 'Sistem Informasi', 'Fakultas Ilmu Komputer');
INSERT INTO `prodi` VALUES (3, 'Ilmu Komunikasi', 'Fakultas Ilmu Komunikasi');
INSERT INTO `prodi` VALUES (4, 'Manajemen', 'Fakultas Ekonomi dan Bisnis');
INSERT INTO `prodi` VALUES (5, 'Pendidikan Matematika', 'Fakultas Pendidikan');

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_masuk` date NULL DEFAULT NULL,
  `dosen_pembimbing_id` int NULL DEFAULT NULL,
  `prodi_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idfk_students_1`(`dosen_pembimbing_id` ASC) USING BTREE,
  INDEX `idfk_students_2`(`prodi_id` ASC) USING BTREE,
  CONSTRAINT `idfk_students_1` FOREIGN KEY (`dosen_pembimbing_id`) REFERENCES `dosen` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `idfk_students_2` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (3, 'Andi Prasetyo', '2023101001', '087654321098', '2023-09-05', 1, 1);
INSERT INTO `students` VALUES (4, 'Sinta Dewi', '2023102002', '087654321097', '2023-09-05', 2, 2);
INSERT INTO `students` VALUES (5, 'Rudi Hartono', '2023103003', '087654321096', '2023-09-06', 3, 3);
INSERT INTO `students` VALUES (6, 'Nina Sari', '2023104004', '087654321095', '2023-09-06', 4, 4);
INSERT INTO `students` VALUES (7, 'Tono Sudarso', '2023105005', '087654321094', '2023-09-07', 5, 5);

SET FOREIGN_KEY_CHECKS = 1;
