-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for schoolboard
CREATE DATABASE IF NOT EXISTS `schoolboard` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `schoolboard`;

-- Dumping structure for table schoolboard.boards
CREATE TABLE IF NOT EXISTS `boards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolboard.boards: ~2 rows (approximately)
/*!40000 ALTER TABLE `boards` DISABLE KEYS */;
INSERT INTO `boards` (`id`, `name`) VALUES
	(1, 'CSM'),
	(2, 'CSMB');
/*!40000 ALTER TABLE `boards` ENABLE KEYS */;

-- Dumping structure for table schoolboard.grades
CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `grade` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `grades_student_id_foreign` (`student_id`),
  CONSTRAINT `grades_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolboard.grades: ~9 rows (approximately)
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` (`id`, `student_id`, `grade`) VALUES
	(1, 1, '4'),
	(2, 1, '9'),
	(3, 1, '6'),
	(4, 1, '8'),
	(5, 2, '6'),
	(6, 2, '7'),
	(7, 2, '8'),
	(8, 3, '8'),
	(9, 3, '4'),
	(10, 4, '9'),
	(11, 4, '5'),
	(12, 4, '4'),
	(13, 4, '7'),
	(14, 5, '7'),
	(18, 5, '6'),
	(19, 5, '8'),
	(20, 5, '5');
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;

-- Dumping structure for table schoolboard.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `board_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `students_board_id_foreign` (`board_id`),
  CONSTRAINT `students_board_id_foreign` FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolboard.students: ~0 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `board_id`, `name`) VALUES
	(1, 1, 'Andrija Sagi'),
	(2, 2, 'Petar Petrovic'),
	(3, 2, 'Jovan Jovanovic'),
	(4, 2, 'Goran Goranic'),
	(5, 1, 'Ivan Ivanovic');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
