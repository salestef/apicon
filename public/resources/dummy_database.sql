-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dummy_database
CREATE DATABASE IF NOT EXISTS `dummy_database` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `dummy_database`;

-- Dumping structure for table dummy_database.analytics
CREATE TABLE IF NOT EXISTS `analytics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users` int(11) unsigned DEFAULT NULL,
  `bounce_rate` float unsigned DEFAULT NULL,
  `sessions` int(11) unsigned DEFAULT NULL,
  `average_session_duration` int(11) unsigned DEFAULT NULL,
  `percentage_new_sessions` int(11) unsigned DEFAULT NULL,
  `pages_per_session` int(11) unsigned DEFAULT NULL,
  `goal_completions` int(11) unsigned DEFAULT NULL,
  `page_views` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table dummy_database.analytics: 1 rows
DELETE FROM `analytics`;
/*!40000 ALTER TABLE `analytics` DISABLE KEYS */;
INSERT INTO `analytics` (`id`, `users`, `bounce_rate`, `sessions`, `average_session_duration`, `percentage_new_sessions`, `pages_per_session`, `goal_completions`, `page_views`) VALUES
	(1, 4001, 41.7, 45, 16, 77, 7, 67, 435);
/*!40000 ALTER TABLE `analytics` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
