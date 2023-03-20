-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.10.2-MariaDB-1:10.10.2+maria~ubu2204 - mariadb.org binary distribution
-- SO del servidor:              debian-linux-gnu
-- HeidiSQL Versión:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para database
CREATE DATABASE IF NOT EXISTS `database` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `database`;

-- Volcando estructura para tabla database.Productos
CREATE TABLE IF NOT EXISTS `Productos` (
  `Id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_prod` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Precio` int(11) DEFAULT 0,
  PRIMARY KEY (`Id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla database.Productos: ~6 rows (aproximadamente)
INSERT INTO `Productos` (`Id_prod`, `Nombre_prod`, `Descripcion`, `Precio`) VALUES
	(2, 'espada de doran', 'espada que tiene omnivampirismo', 450),
	(3, 'viento huracanado', 'item de critico que permite deslizarse', 3300),
	(4, 'arcoescudo inmortal', 'item de tirador que proporciona un escudo', 3400),
	(5, 'arcoescudo inmortal', 'item de tirador que proporciona un escudo', 3400),
	(6, 'guantelete de fuego escarchado', 'item de tanque para aguantar daño AD', 2900),
	(7, 'espada del rey arruinado', 'hoja del rey arruinado', 2900);

-- Volcando estructura para tabla database.Usuarios
CREATE TABLE IF NOT EXISTS `Usuarios` (
  `Nombreusu` varchar(50) DEFAULT NULL,
  `Contrasenia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla database.Usuarios: ~0 rows (aproximadamente)
INSERT INTO `Usuarios` (`Nombreusu`, `Contrasenia`) VALUES
	('nasus', 'nasus');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
