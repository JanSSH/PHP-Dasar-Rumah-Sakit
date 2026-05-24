-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for data_rs
CREATE DATABASE IF NOT EXISTS `data_rs` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `data_rs`;

-- Dumping structure for table data_rs.dokter
CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` int NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(100) DEFAULT NULL,
  `id_poli` int DEFAULT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table data_rs.dokter: ~0 rows (approximately)
DELETE FROM `dokter`;
INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `id_poli`) VALUES
	(1, 'Dr. William Sudarsono', 1),
	(5, 'Dr. Tirta Bengawan', 2),
	(6, 'Dr. Gia Putra', 2),
	(7, 'Dr. Oen Boeng', 1),
	(8, 'Dr. Julius Caesar', 2),
	(9, 'Dr. Susi Susanti', 1),
	(11, 'Dr. Mustika', 1),
	(12, 'Dr. Lolierta', 4);

-- Dumping structure for table data_rs.pasien
CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat_pasien` varchar(200) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table data_rs.pasien: ~0 rows (approximately)
DELETE FROM `pasien`;
INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `alamat_pasien`, `tgl_lahir`) VALUES
	(1, 'Stevina Sophia Chrisnanda', 'Perempuan', 'Jl. Sondakan ARS No.1', '2005-04-07'),
	(2, 'Januar Dwi Putra', 'Laki-laki', 'Jl. Tipes SI No.1', '2026-05-19'),
	(4, 'Satria Kurnia', 'Laki-laki', 'Jl. Sana', '2026-05-09');

-- Dumping structure for table data_rs.pendaftaran
CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id_pendaftaran` int NOT NULL AUTO_INCREMENT,
  `tgl_pendaftaran` date DEFAULT NULL,
  `id_pasien` int DEFAULT NULL,
  `id_poli` int DEFAULT NULL,
  `id_dokter` int DEFAULT NULL,
  PRIMARY KEY (`id_pendaftaran`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table data_rs.pendaftaran: ~0 rows (approximately)
DELETE FROM `pendaftaran`;
INSERT INTO `pendaftaran` (`id_pendaftaran`, `tgl_pendaftaran`, `id_pasien`, `id_poli`, `id_dokter`) VALUES
	(1, '2026-05-26', 1, 1, 1);

-- Dumping structure for table data_rs.poli
CREATE TABLE IF NOT EXISTS `poli` (
  `id_poli` int NOT NULL AUTO_INCREMENT,
  `nama_poli` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_poli`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table data_rs.poli: ~0 rows (approximately)
DELETE FROM `poli`;
INSERT INTO `poli` (`id_poli`, `nama_poli`) VALUES
	(1, 'Umum'),
	(2, 'Gigi'),
	(4, 'Jiwa');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
