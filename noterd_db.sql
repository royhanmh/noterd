-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table nyatat_db.notes
CREATE TABLE IF NOT EXISTS `notes` (
  `note_id` varchar(50) NOT NULL DEFAULT 'AUTO_INCREMENT',
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`note_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table nyatat_db.notes: ~2 rows (approximately)
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` (`note_id`, `user_id`, `title`, `content`, `created_at`) VALUES
	('65125c796efaf', 12, 'test', '<ul>\r\n<li>\r\n<p>I adjusted the column size to <code>col-lg-6</code> to make the card wider. You can further adjust the column size based on your layout requirements.</p>\r\n</li>\r\n<li>\r\n<p>I removed the <code>py-3</code> class from the card, which was adding padding to the top and bottom of the card. Removing it makes the card content more prominent.</p>\r\n</li>\r\n<li>\r\n<p>I adjusted the hierarchy of the card\'s content. The note content is now displayed in a larger <code>h5</code> element.</p>\r\n</li>\r\n<li>\r\n<p>I added an optional card footer where you can include additional information or actions related to the note.</p>\r\n</li>\r\n</ul>\r\n<p>This updated card layout should provide a more suitable and larger display for showing notes. You can further style and customize the card\'s appearance to match your design preferences.</p>', '2023-09-26 11:22:17'),
	('65140896bff5e', 11, 'TEST NOTE', '<p><strong>this is an example of note </strong><em>?</em></p>', '2023-09-27 17:48:54');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;

-- Dumping structure for table nyatat_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table nyatat_db.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
	(11, 'admin', 'admin@test.com', '$2y$10$PEFH4rOwoKoQUZx1l3OJiOZBQhO8RNtTlcvRMVmBAmrRLc8m/oeza', 0, '2023-09-25 12:58:46'),
	(12, 'user', 'test@gmail.com', '$2y$10$5MgNjyem5LyHLUlIZxDsTuG433sXLRg4zTCyTjeqVURal3FSA5G32', 1, '2023-09-25 16:27:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
