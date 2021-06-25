/*
 Navicat Premium Data Transfer

 Source Server         : Mysql
 Source Server Type    : MySQL
 Source Server Version : 100119
 Source Host           : localhost:3306
 Source Schema         : db_sikf1f8

 Target Server Type    : MySQL
 Target Server Version : 100119
 File Encoding         : 65001

 Date: 08/11/2019 09:07:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ms_blok
-- ----------------------------
DROP TABLE IF EXISTS `ms_blok`;
CREATE TABLE `ms_blok`  (
  `id_blok` int(5) NOT NULL AUTO_INCREMENT,
  `nama_blok` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updated_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_blok`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ms_blok
-- ----------------------------
INSERT INTO `ms_blok` VALUES (1, 'F1', '2019-10-20 09:45:57', NULL, '1', NULL, '1');
INSERT INTO `ms_blok` VALUES (2, 'F2', '2019-10-20 09:45:57', '2019-10-20 12:09:04', '1', '1', '1');
INSERT INTO `ms_blok` VALUES (3, 'F3', '2019-10-20 09:45:57', '2019-10-20 10:59:33', '1', NULL, '1');
INSERT INTO `ms_blok` VALUES (4, 'F4', '2019-10-20 09:45:57', '2019-10-20 10:59:36', '1', NULL, '1');
INSERT INTO `ms_blok` VALUES (5, 'F5', '2019-10-20 09:45:57', '2019-11-08 08:59:34', '1', '1', '1');
INSERT INTO `ms_blok` VALUES (6, 'F6', '2019-10-20 09:45:57', '2019-10-20 10:59:41', '1', NULL, '1');
INSERT INTO `ms_blok` VALUES (7, 'F7', '2019-10-20 09:45:57', '2019-10-20 10:59:42', '1', NULL, '1');
INSERT INTO `ms_blok` VALUES (8, 'F8', '2019-10-20 09:45:57', '2019-10-20 10:59:44', '1', NULL, '1');

-- ----------------------------
-- Table structure for ms_no_rumah
-- ----------------------------
DROP TABLE IF EXISTS `ms_no_rumah`;
CREATE TABLE `ms_no_rumah`  (
  `id_no_rumah` int(5) NOT NULL AUTO_INCREMENT,
  `id_blok` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_rumah` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updated_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_no_rumah`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ms_no_rumah
-- ----------------------------
INSERT INTO `ms_no_rumah` VALUES (1, '1', 'No. 1', '2019-10-20 09:46:14', '2019-10-20 10:02:47', '1', NULL, '1');
INSERT INTO `ms_no_rumah` VALUES (2, '1', 'No. 2', '2019-10-20 09:46:14', '2019-10-20 10:02:41', '1', NULL, '1');
INSERT INTO `ms_no_rumah` VALUES (3, '1', 'No. 3', '2019-10-20 09:46:14', '2019-10-20 11:43:05', '1', NULL, '1');
INSERT INTO `ms_no_rumah` VALUES (4, '1', 'No. 4', '2019-10-20 11:55:17', NULL, '1', NULL, '1');

-- ----------------------------
-- Table structure for tbl_keluarga
-- ----------------------------
DROP TABLE IF EXISTS `tbl_keluarga`;
CREATE TABLE `tbl_keluarga`  (
  `id_keluarga` int(7) NOT NULL AUTO_INCREMENT,
  `id_warga` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nik` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_lahir` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jk` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gol_darah` char(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `agama` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_perkawinan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_hubungan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updated_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_keluarga`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_keluarga
-- ----------------------------
INSERT INTO `tbl_keluarga` VALUES (4, '13', '3277010802950046', 'MARIA JUANA', 'MEDAN', '1994-10-02', 'P', 'A-', 'ISLAM', 'BELUM KAWIN', 'PEKERJA SWASTA', 'KAKAK KANDUNG', '2019-10-20 21:49:55', '2019-10-20 23:38:32', '1', '1', '1', '64d7475146c18762bd7439d3533a1af3.JPG');
INSERT INTO `tbl_keluarga` VALUES (6, '12', '3277010802950042', 'ALDO PRATAMA PUTRA', 'TANGERANG', '1991-08-30', 'L', 'A-', 'ISLAM', 'KAWIN', 'TEKNISI JARINGAN', 'KAKAK KANDUNG', '2019-10-20 23:16:37', '2019-10-20 23:21:37', '1', '1', '1', '0cbb54a0ab281be0016fca05c73d4a00.jpg');

-- ----------------------------
-- Table structure for tbl_pengurus
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pengurus`;
CREATE TABLE `tbl_pengurus`  (
  `id_pengurus` int(5) NOT NULL AUTO_INCREMENT,
  `id_warga` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updated_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pengurus`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_warga` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `role_user` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updated_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'ountaarab', '202cb962ac59075b964b07152d234b70', '1000', 'Super Admin', '9', '2019-10-18 20:35:32', '2019-11-01 11:03:30', '1', NULL, '1');

-- ----------------------------
-- Table structure for tbl_warga
-- ----------------------------
DROP TABLE IF EXISTS `tbl_warga`;
CREATE TABLE `tbl_warga`  (
  `id_warga` int(10) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_lahir` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kontak` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jk` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gol_darah` char(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `agama` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_perkawinan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updated_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_warga`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 101 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_warga
-- ----------------------------
INSERT INTO `tbl_warga` VALUES (1, '-', 'RONO', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (2, '-', 'SULIS', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (3, '-', 'RAMSES', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (4, '-', 'AZIS', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (5, '-', 'BHAKTI Y.R.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (6, '-', 'DENI P.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (7, '-', 'EMAN S.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (8, '-', 'RIAN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (9, '-', 'ILHAM', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (10, '-', 'HENDRIK S.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (11, '-', 'CECEP', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (12, '-', 'KIKI', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (13, '-', 'FIDENTYA P.N.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (14, '-', 'KRIS', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (15, '-', 'DIAN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (16, '-', 'DEFRI', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (17, '-', 'PRIS FAJAR', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (18, '-', 'FAISAL AMIR', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (19, '-', 'AGUS H', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (20, '-', 'RENO H', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (21, '-', 'DEDI T', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (22, '-', 'EKO P', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (23, '-', 'NANANG S.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (24, '-', 'NURDIN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (25, '-', 'PENDI S.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (26, '-', 'MAMAT R.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (27, '-', 'ASEP ITO', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (28, '-', 'RIDWANSYAH', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (29, '-', 'JHONY', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (30, '-', 'ANTON', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (31, '-', 'ARI ARFAN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (32, '-', 'LINDA', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (33, '-', 'DWILANA L.W', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (34, '-', 'SEPTI', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (35, '-', 'SUBHAN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (36, '-', 'AGUNG S.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (37, '-', 'ARIF  A.R.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (38, '-', 'MAMAN R.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (39, '-', 'SAEFUL H.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (40, '-', 'KHANANG E.P.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (41, '-', 'ARIS', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (42, '-', 'CUCU C.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (43, '-', 'MUMU SYAMSUDIN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (44, '-', 'GUSTOPAL A.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (45, '-', 'DINDIN F', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (46, '-', 'WAHYU HIDAYAT', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (47, '-', 'ARIF LUBIS', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (48, '-', 'RIO RIMBO', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (49, '-', 'WAGIMAN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (50, '-', 'ARIS RH', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (51, '-', 'ARIF', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (52, '-', 'JAKA P', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (53, '-', 'JOKO P', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (54, '-', 'KHOERURODZIKIN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (55, '-', 'MAHMUD S.W', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (56, '-', 'SAEPUDIN S.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (57, '-', 'RASIM', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (58, '-', 'WAHYU D.W.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (59, '-', 'ARDI', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (60, '-', 'RUDI', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (61, '-', 'SARIPUDIN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (62, '-', 'ARIF', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (63, '-', 'AZIS', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (64, '-', 'YUDI ', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (65, '-', 'DANAR', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (66, '-', 'HERI', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (67, '-', 'IWAN K.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (68, '-', 'BAGUS', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (69, '-', 'RIAN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (70, '-', 'SUGENG', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (71, '-', 'DIDIN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (72, '-', 'AJI A.S.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (73, '-', 'ARIF B', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (74, '-', 'AGUS R', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (75, '-', 'SISWANDI', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (76, '-', 'FAHMI', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (77, '-', 'HADI S.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (78, '-', 'DEDE Y', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (79, '-', 'ANDI S.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (80, '-', 'SUKIMAN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (81, '-', 'NURDIN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (82, '-', 'RIYANTO', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (83, '-', 'RIZKY A.R', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (84, '-', 'DONI', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (85, '-', 'JOKO A.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (86, '-', 'NUNU', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (87, '-', 'CAHYA ', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (88, '-', 'EEP S.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (89, '-', 'FEZI', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (90, '-', 'SUPRIYANTO', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (91, '-', 'ROMLI', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (92, '-', 'BAYU A.', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (93, '-', 'A. HUSEIN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (94, '-', 'WAHYUDI', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (95, '-', 'WASITO', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (96, '-', 'TATANG', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (97, '-', 'KARTIWA', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (98, '-', 'AMIRUL', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (99, '-', 'ASMIRAN', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tbl_warga` VALUES (100, '-', 'KUSNADI', '-', '10/15/1990', '', '', 'L', '', '', '', '', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1');

-- ----------------------------
-- Table structure for tr_rumah
-- ----------------------------
DROP TABLE IF EXISTS `tr_rumah`;
CREATE TABLE `tr_rumah`  (
  `id_rumah` int(10) NOT NULL AUTO_INCREMENT,
  `id_blok` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_rumah` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_warga` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_menempati` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_rumah` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updated_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_rumah`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 101 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tr_rumah
-- ----------------------------
INSERT INTO `tr_rumah` VALUES (1, '1', '1', '1', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (2, '1', '2', '2', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (3, '1', '3', '3', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (4, '1', '4', '4', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (5, '1', '5', '5', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (6, '1', '6', '6', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (7, '1', '7', '7', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (8, '1', '8', '8', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (9, '2', '1', '9', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (10, '3', '1', '10', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (11, '3', '2', '11', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (12, '3', '3', '12', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (13, '3', '4', '13', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (14, '3', '5', '14', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (15, '3', '6', '15', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (16, '3', '7', '16', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (17, '3', '8', '17', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (18, '3', '10', '18', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (19, '3', '11', '19', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (20, '3', '12', '20', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (21, '4', '2', '21', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (22, '4', '3', '22', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (23, '4', '4', '23', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (24, '4', '6', '24', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (25, '4', '7', '25', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (26, '4', '8', '26', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (27, '4', '10', '27', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (28, '4', '11', '28', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (29, '4', '12', '29', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (30, '4', '14', '30', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (31, '4', '15', '31', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (32, '4', '16', '32', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (33, '4', '19', '33', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (34, '4', '20', '34', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (35, '5', '1', '35', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (36, '5', '2', '36', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (37, '5', '3', '37', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (38, '5', '5', '38', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (39, '5', '6', '39', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (40, '5', '7', '40', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (41, '5', '8', '41', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (42, '5', '9', '42', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (43, '5', '10', '43', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (44, '5', '11', '44', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (45, '5', '12', '45', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (46, '5', '12A', '46', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (47, '5', '14', '47', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (48, '5', '15', '48', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (49, '5', '16', '49', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (50, '5', '17', '50', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (51, '5', '18', '51', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (52, '5', '19', '52', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (53, '5', '20', '53', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (54, '5', '21', '54', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (55, '5', '22', '55', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (56, '6', '1', '56', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (57, '6', '2', '57', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (58, '6', '3', '58', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (59, '6', '4', '59', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (60, '6', '5', '60', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (61, '6', '7', '61', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (62, '6', '8', '62', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (63, '6', '9', '63', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (64, '6', '10', '64', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (65, '6', '11', '65', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (66, '6', '12', '66', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (67, '6', '12A', '67', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (68, '6', '14', '68', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (69, '6', '15', '69', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (70, '6', '16', '70', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (71, '6', '17', '71', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (72, '6', '18', '72', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (73, '6', '19', '73', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (74, '6', '20', '74', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (75, '6', '22', '75', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (76, '7', '1', '76', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (77, '7', '2', '77', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (78, '7', '3', '78', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (79, '7', '4', '79', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (80, '7', '5', '80', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (81, '7', '7', '81', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (82, '7', '8', '82', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (83, '7', '9', '83', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (84, '7', '11', '84', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (85, '7', '12A', '85', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (86, '7', '14', '86', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (87, '7', '15', '87', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (88, '7', '16', '88', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (89, '7', '17', '89', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (90, '7', '18', '90', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (91, '8', '15', '91', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (92, '8', '16', '92', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (93, '8', '17', '93', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (94, '8', '18', '94', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (95, '8', '19', '95', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (96, '8', '20', '96', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (97, '8', '21', '97', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (98, '8', '22', '98', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (99, '8', '23', '99', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');
INSERT INTO `tr_rumah` VALUES (100, '8', '26', '100', 'HAK MILIK', 'ADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '1');

SET FOREIGN_KEY_CHECKS = 1;
