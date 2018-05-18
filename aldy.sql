-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.29-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dbregistrasi
CREATE DATABASE IF NOT EXISTS `dbregistrasi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbregistrasi`;

-- Dumping structure for table dbregistrasi.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prodi_id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `no_tlp` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_mahasiswa_prodi` (`prodi_id`),
  CONSTRAINT `FK_mahasiswa_prodi` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table dbregistrasi.mahasiswa: ~2 rows (approximately)
DELETE FROM `mahasiswa`;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` (`id`, `prodi_id`, `nama`, `alamat`, `jenis_kelamin`, `no_tlp`, `tgl_lahir`, `tgl_masuk`) VALUES
	(1, 3, 'Aldy Himawan', 'Jl. Belimbing', 'Laki-laki', '087767564728', '1994-05-16', '2014-05-16'),
	(2, 1, 'Muhammad Alfian', 'Jl. Jawa', 'Laki-laki', '086675676567', '1996-04-06', '2014-05-16'),
	(7, 1, 'Nia', 'Jl. Ketumbar', 'Perempuan', '095645637', '1995-09-12', '2014-01-01');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;

-- Dumping structure for table dbregistrasi.prodi
CREATE TABLE IF NOT EXISTS `prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prodi` varchar(255) DEFAULT NULL,
  `fakultas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table dbregistrasi.prodi: ~6 rows (approximately)
DELETE FROM `prodi`;
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` (`id`, `prodi`, `fakultas`) VALUES
	(1, 'Teknik Informatika', 'Teknologi Informasi'),
	(2, 'Sistem Informasi', 'Teknologi Informasi'),
	(3, 'Komputerisasi Akuntansi', 'Teknologi Informasi'),
	(4, 'Manajemen Ekonomi', 'Ekonomi'),
	(5, 'Manajemen Pemasaran', 'Ekonomi'),
	(6, 'Manajemen Akuntansi', 'Ekonomi'),
	(8, 'Manajemen Bisnis', 'Ekonomi');
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
