/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE IF NOT EXISTS `options` (
  `name` varchar(32) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `options` (`name`, `value`) VALUES
	('plugins', 'a:0:{}'),
	('rewrite', '0'),
	('routingTable', 'a:2:{i:0;a:3:{s:4:"regx";s:9:"/^[\\/]?$/";s:6:"widget";s:19:"\\Itell\\Widget\\Index";s:6:"action";s:6:"render";}i:1;a:3:{s:4:"regx";s:35:"/^\\/action\\/([_0-9a-zA-Z-]+)[\\/]?$/";s:6:"widget";s:20:"\\Itell\\Widget\\Action";s:6:"params";a:1:{i:0;s:6:"action";}}}'),
	('theme', 'a:2:{s:9:"activated";s:7:"default";s:6:"config";a:2:{s:4:"val1";s:11:"默认值11";s:4:"val2";s:11:"默认值22";}}');

CREATE TABLE IF NOT EXISTS `users` (
  `uid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `token` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `token`) VALUES
	(0, 'admin', '08j7wat389qmb2hxkeg15j7rwm6etzctf6296dff40a8c2ad5130a27581821044', 'admin@admin.com', 'iudkfgs6aha7gkd8g36fjkvp5c6g3hws');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
