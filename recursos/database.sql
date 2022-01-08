-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versão:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for loja_api
CREATE DATABASE IF NOT EXISTS `loja_api` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `loja_api`;

-- Dumping structure for table loja_api.admin_users
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id_admin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `passwrd` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table loja_api.admin_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id_admin`, `username`, `passwrd`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin', '$2y$10$rbXjOpWBNF/bHpP6bEhB0OkmFJUSRezV7KNCyZEQSR7E9s/dUU9SS', '2021-12-18 15:52:24', '2021-12-18 15:52:24', NULL);
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

-- Dumping structure for table loja_api.authentication
CREATE TABLE IF NOT EXISTS `authentication` (
  `id_client` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `passwrd` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table loja_api.authentication: ~2 rows (approximately)
/*!40000 ALTER TABLE `authentication` DISABLE KEYS */;
INSERT INTO `authentication` (`id_client`, `client_name`, `username`, `passwrd`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Empresa Portugal', 'FmKVnk7V71alEfW6ShmbNJyWwiNaIKwf', '$2y$10$8jfyKkdE.wUOWkmCng74LuHw9kPwzOIsFzcySJYKjHU8RJA5rz/TG', '2021-12-11 17:00:22', '2021-12-11 17:00:23', NULL),
	(2, 'Empresa Brasil', '5NN43xo9KRtk1qLrcoZisqIs4NqNQj31', '$2y$10$yejr3Akvb4c4Kl6V2ol/eO.e2r/wAiioJQnP6r9Uie3fwOFxIDpGa', '2021-12-11 17:12:54', '2021-12-11 17:12:54', NULL),
	(3, 'Empresa Angola', 'X0uvlWxDd41CFCSPGJn3qJO2RN9q3HxX', '$2y$10$m9c.AIQwjg1q2bh0vI95Me5O5XUShXnx.lv/WjJFOwx6g2h4CLKjW', '2021-12-11 17:13:47', '2021-12-11 17:13:48', NULL),
	(4, 'Empresa Moçambique', '7oY8NJepY72MFOmWNTBq540FbNLKAOO5', '$2y$10$UVQWM7xBixFhTU/4rjKDt.GE.UeQ48xXQhvy16CqconZimUwJTaYq', '2021-12-30 15:26:45', '2021-12-30 15:26:45', NULL),
	(5, 'Empresa Cabo Verde', 'XPLnsTGwhDpKX4N7EkNgHjLroB7RsWj8', '$2y$10$7J3NoMmHCRyFYb1TbPeHtujDa6BHkVltK/8sIboZTqnRJy07A7wwy', '2021-12-30 15:30:31', '2021-12-30 15:30:31', NULL);
/*!40000 ALTER TABLE `authentication` ENABLE KEYS */;

-- Dumping structure for table loja_api.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table loja_api.clientes: ~4 rows (approximately)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id_cliente`, `nome`, `email`, `telefone`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'joao', 'joao@gmail.com', '111222', '2021-10-18 15:28:54', '2021-10-18 15:28:56', NULL),
	(2, 'ana', 'ana123@gmail.com', '222333', '2021-10-18 15:29:12', '2021-11-27 13:16:31', NULL),
	(3, 'carlos', 'carlos@gmail.com', '1238676', '2021-11-13 18:37:13', '2021-11-13 18:37:13', NULL),
	(4, 'joao antonio', 'joao_antonio@gmail.com', '123123', '2021-11-13 18:37:45', '2021-11-13 18:37:45', NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Dumping structure for table loja_api.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `produto` varchar(50) DEFAULT NULL,
  `quantidade` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table loja_api.produtos: ~3 rows (approximately)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id_produto`, `produto`, `quantidade`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'pregos alterado', 500, '2021-10-18 15:29:45', '2021-10-18 15:29:45', NULL),
	(2, 'parafusos', 250, '2021-10-18 15:29:54', '2021-10-18 15:29:55', NULL),
	(3, 'alfinetes', 300, '2021-10-18 15:30:13', '2021-10-18 15:30:13', NULL);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
