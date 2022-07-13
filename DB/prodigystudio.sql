-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for prodigystudio
CREATE DATABASE IF NOT EXISTS `prodigystudio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `prodigystudio`;

-- Dumping structure for table prodigystudio.administrator
CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table prodigystudio.administrator: ~0 rows (approximately)
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` (`id`, `username`, `password`, `email`) VALUES
	(1, 'admin', 'admin', 'admin@email.com');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;

-- Dumping structure for table prodigystudio.organizer
CREATE TABLE IF NOT EXISTS `organizer` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table prodigystudio.organizer: ~0 rows (approximately)
/*!40000 ALTER TABLE `organizer` DISABLE KEYS */;
INSERT INTO `organizer` (`id`, `username`, `email`, `password`) VALUES
	(1, 'haha', '123', '123');
/*!40000 ALTER TABLE `organizer` ENABLE KEYS */;

-- Dumping structure for table prodigystudio.ticketbuyer
CREATE TABLE IF NOT EXISTS `ticketbuyer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Dumping data for table prodigystudio.ticketbuyer: ~6 rows (approximately)
/*!40000 ALTER TABLE `ticketbuyer` DISABLE KEYS */;
INSERT INTO `ticketbuyer` (`id`, `username`, `email`, `password`) VALUES
	(38, '123', '123', '123'),
	(39, 'asd', 'asd', 'asd'),
	(40, '', '', ''),
	(41, '', '', ''),
	(42, 'ihsan', 'hasan', ''),
	(43, 'aa', 'aa', '');
/*!40000 ALTER TABLE `ticketbuyer` ENABLE KEYS */;

-- Dumping structure for table prodigystudio.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usertype` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table prodigystudio.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `usertype`) VALUES
	(19, 'ihsan', '202cb962ac59075b964b07152d234b70', 'ihsan@gmail.com', 3),
	(20, 'hasan', '456', 'hasanahana', 3),
	(21, 'hesan', '827ccb0eea8a706c4c34a16891f84e7b', 'hesan@email.com', 3),
	(22, 'Mehi', '40a78dc900fbadea32700af153de125a', 'mehi@gmail.com', 3);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
