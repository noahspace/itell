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
	('plugins', 'a:2:{s:11:"HelloWorld1";a:3:{s:10:"class_name";s:34:"Content\\Plugins\\HelloWorld1\\Plugin";s:6:"config";a:0:{}s:7:"handles";a:2:{s:22:"admin/header.php:brief";a:1:{i:0;s:42:"Content\\Plugins\\HelloWorld1\\Plugin::render";}s:14:"index.php:main";a:1:{i:0;s:40:"Content\\Plugins\\HelloWorld1\\Plugin::main";}}}s:10:"HelloWorld";a:3:{s:10:"class_name";s:33:"Content\\Plugins\\HelloWorld\\Plugin";s:6:"config";a:1:{s:5:"value";s:12:"Hello World!";}s:7:"handles";a:2:{s:22:"admin/header.php:brief";a:1:{i:0;s:41:"Content\\Plugins\\HelloWorld\\Plugin::render";}s:14:"index.php:main";a:1:{i:0;s:39:"Content\\Plugins\\HelloWorld\\Plugin::main";}}}}'),
	('rewrite', '0'),
	('routingTable', 'a:2:{i:0;a:3:{s:4:"regx";s:9:"/^[\\/]?$/";s:6:"widget";s:19:"\\Itell\\Widget\\Index";s:6:"action";s:6:"render";}i:1;a:3:{s:4:"regx";s:35:"/^\\/action\\/([_0-9a-zA-Z-]+)[\\/]?$/";s:6:"widget";s:20:"\\Itell\\Widget\\Action";s:6:"params";a:1:{i:0;s:6:"action";}}}'),
	('theme', 'a:2:{s:9:"activated";s:5:"itell";s:6:"config";a:0:{}}');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
