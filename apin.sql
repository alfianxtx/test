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


-- Dumping database structure for dbapotek
CREATE DATABASE IF NOT EXISTS `dbapotek` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbapotek`;

-- Dumping structure for table dbapotek.obat
CREATE TABLE IF NOT EXISTS `obat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan_id` int(11) DEFAULT NULL,
  `nama_obat` varchar(255) DEFAULT NULL,
  `produser_obat` varchar(50) DEFAULT NULL,
  `exp_obat` date DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `stok_obat` decimal(10,0) DEFAULT NULL,
  `jenis_obat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_obat_satuan` (`satuan_id`),
  CONSTRAINT `FK_obat_satuan` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dbapotek.obat: ~1 rows (approximately)
DELETE FROM `obat`;
/*!40000 ALTER TABLE `obat` DISABLE KEYS */;
INSERT INTO `obat` (`id`, `satuan_id`, `nama_obat`, `produser_obat`, `exp_obat`, `harga_beli`, `harga_jual`, `stok_obat`, `jenis_obat`) VALUES
	(1, 2, 'Panadol', 'Konimex', '2019-03-18', 5000, 7000, 30, 'Bebas Terbatas'),
	(2, 1, 'asd', 'asd', '1996-09-02', 12000, 14000, 20, 'Bebas Terbatas');
/*!40000 ALTER TABLE `obat` ENABLE KEYS */;

-- Dumping structure for table dbapotek.satuan
CREATE TABLE IF NOT EXISTS `satuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table dbapotek.satuan: ~5 rows (approximately)
DELETE FROM `satuan`;
/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
INSERT INTO `satuan` (`id`, `nama_satuan`) VALUES
	(1, 'Kapsul'),
	(2, 'Tablet'),
	(3, 'ml'),
	(4, 'gr'),
	(5, 'Ampul');
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
