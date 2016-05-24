-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.49-0ubuntu0.14.04.1 - (Ubuntu)
-- ОС Сервера:                   debian-linux-gnu
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица sam.guestBook
CREATE TABLE IF NOT EXISTS `guestBook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы sam.guestBook: ~20 rows (приблизительно)
/*!40000 ALTER TABLE `guestBook` DISABLE KEYS */;
INSERT INTO `guestBook` (`id`, `userName`, `email`, `url`, `text`, `time`) VALUES
	(1, 'Sam', 'Sam@gmail.com', '', 'Hi, Smith!', '0000-00-00 00:00:00'),
	(2, 'Smith', 'Smith@gmail.com', '', 'Hi, Sam!', '0000-00-00 00:00:00'),
	(3, 'Samanta', 'Samanta@gmail.com', '', 'Hello, guys!', '0000-00-00 00:00:00'),
	(34, 'Zorro', 'Zorro@gmail.com', '', 'Z', '0000-00-00 00:00:00'),
	(44, 'Afanasiy', 'Afonya@gmail.com', 'http://afonasiy.tester.com', 'Afonyyyyyaaaaa', '2016-05-24 16:30:09'),
	(45, 'Lesya', 'Lesya@gmail.com', '', 'Hello', '2016-05-24 16:54:04'),
	(49, 'Carrot', 'Carrot@gmaiiiil.com', '', 'Hrum Hrum Hrum', '2016-05-24 19:29:56'),
	(52, 'Arnold', 'Arny@gmail.com', '', 'I`ll be back ^_^', '2016-05-24 21:40:32');
/*!40000 ALTER TABLE `guestBook` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
