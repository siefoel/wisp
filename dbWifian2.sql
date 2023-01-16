-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dbwifian
CREATE DATABASE IF NOT EXISTS `dbwifian` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbwifian`;

-- Dumping structure for table dbwifian.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `id_mitra` varchar(12) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.admin: ~0 rows (approximately)

-- Dumping structure for table dbwifian.board
CREATE TABLE IF NOT EXISTS `board` (
  `id` int NOT NULL,
  `id_mitra` int NOT NULL,
  `nama_borad` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.board: ~0 rows (approximately)

-- Dumping structure for table dbwifian.desa
CREATE TABLE IF NOT EXISTS `desa` (
  `id` int NOT NULL,
  `id_kec` int NOT NULL,
  `nama_desa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.desa: ~1 rows (approximately)
INSERT INTO `desa` (`id`, `id_kec`, `nama_desa`) VALUES
	(2004, 22, 'Cibeber');

-- Dumping structure for table dbwifian.kecamatan
CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id` int NOT NULL,
  `id_kota` int NOT NULL,
  `nama_kec` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.kecamatan: ~1 rows (approximately)
INSERT INTO `kecamatan` (`id`, `id_kota`, `nama_kec`) VALUES
	(22, 6, 'Manonjaya');

-- Dumping structure for table dbwifian.kota
CREATE TABLE IF NOT EXISTS `kota` (
  `id` int NOT NULL,
  `id_prov` int NOT NULL,
  `nama_kota` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.kota: ~1 rows (approximately)
INSERT INTO `kota` (`id`, `id_prov`, `nama_kota`) VALUES
	(6, 32, 'Kab. Tasikmalaya');

-- Dumping structure for table dbwifian.level
CREATE TABLE IF NOT EXISTS `level` (
  `id` int NOT NULL,
  `nama_level` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.level: ~6 rows (approximately)
INSERT INTO `level` (`id`, `nama_level`) VALUES
	(1, 'Administrator'),
	(2, 'Wifian'),
	(3, 'Teknisi'),
	(4, 'Call Senter'),
	(5, 'User'),
	(6, 'Owner');

-- Dumping structure for table dbwifian.login
CREATE TABLE IF NOT EXISTS `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `id_level` int NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.login: ~3 rows (approximately)
INSERT INTO `login` (`id`, `id_user`, `email`, `password`, `id_level`, `status`) VALUES
	(1, 'URW0001', 'anwarisaepul@gmail.com', '$2y$10$1eLw9FGRshWTxtSLo8ko2uoY6XmXkSo7k1aimwNzHciu84bi/g1QW', 2, '1'),
	(2, 'URW0002', 'andi@gmail.com', '$2y$10$87SZ2u7IJ9Qe8RiZ/XsXNu6ScX/2Myu0tCUcFMDvajy7gMJLSbTIW', 2, '1'),
	(3, '', 'admin@admin.com', '$2y$10$0.Ej5BX35YutE4lNjE86l.c9X5XzY7spF4hAWJegvN66TxBoiCOky', 1, '1');

-- Dumping structure for table dbwifian.mitra
CREATE TABLE IF NOT EXISTS `mitra` (
  `id_mitra` varchar(12) NOT NULL,
  `kode_mitra` char(3) NOT NULL,
  `nama_mitra` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_prov` int NOT NULL,
  `id_kota` int NOT NULL,
  `id_kec` int NOT NULL,
  `id_desa` int NOT NULL,
  `lang` varchar(20) DEFAULT NULL,
  `long` varchar(20) DEFAULT NULL,
  `id_user` varchar(12) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_mitra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.mitra: ~0 rows (approximately)

-- Dumping structure for table dbwifian.noc
CREATE TABLE IF NOT EXISTS `noc` (
  `id` int NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `id_mitra` varchar(12) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.noc: ~0 rows (approximately)

-- Dumping structure for table dbwifian.owner
CREATE TABLE IF NOT EXISTS `owner` (
  `id` int NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `id_mitra` varchar(12) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.owner: ~0 rows (approximately)

-- Dumping structure for table dbwifian.paket
CREATE TABLE IF NOT EXISTS `paket` (
  `id` int NOT NULL,
  `id_mitra` int NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `bandhwit` int NOT NULL,
  `harga` int NOT NULL,
  `harga_jual` int NOT NULL,
  `id_board` int DEFAULT NULL,
  `ppp` varchar(10) DEFAULT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.paket: ~0 rows (approximately)

-- Dumping structure for table dbwifian.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` varchar(255) NOT NULL,
  `id_mitra` int NOT NULL,
  `id_board` int NOT NULL,
  `id_paket` int NOT NULL,
  `id_user` int NOT NULL,
  `user_ppp` varchar(255) DEFAULT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.pelanggan: ~0 rows (approximately)

-- Dumping structure for table dbwifian.provinsi
CREATE TABLE IF NOT EXISTS `provinsi` (
  `id` int NOT NULL,
  `nama_prov` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.provinsi: ~1 rows (approximately)
INSERT INTO `provinsi` (`id`, `nama_prov`) VALUES
	(32, 'Jawa Barat');

-- Dumping structure for table dbwifian.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.role_user: ~0 rows (approximately)

-- Dumping structure for table dbwifian.teknisi
CREATE TABLE IF NOT EXISTS `teknisi` (
  `id` int NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `id_mitra` varchar(12) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.teknisi: ~0 rows (approximately)

-- Dumping structure for table dbwifian.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(12) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` char(1) NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_prov` int NOT NULL,
  `id_kota` int NOT NULL,
  `id_kec` int NOT NULL,
  `id_desa` int NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbwifian.user: ~2 rows (approximately)
INSERT INTO `user` (`id`, `nik`, `nama_user`, `tmp_lahir`, `tgl_lahir`, `gender`, `alamat`, `id_prov`, `id_kota`, `id_kec`, `id_desa`, `no_hp`, `email`, `pekerjaan`, `status`) VALUES
	('URW0001', '3206221701940001', 'Saepul Anwari', 'Tasikmalaya', '1994-01-17', 'L', 'Kp. Sukasirna Rt 019/ Rw 005', 32, 6, 22, 2004, '082119305063', 'anwarisaepul@gmail.com', 'Guru', '1'),
	('URW0002', '3206221701940005', 'Andi Lesmana', 'Tasikmalaya', '1989-02-07', 'L', 'Indihiang', 32, 6, 22, 2004, '085235256635', 'andi@gmail.com', 'Owner Wifian', '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
