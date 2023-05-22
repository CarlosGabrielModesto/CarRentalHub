-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.5.25 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para patioautomoveis_db
CREATE DATABASE IF NOT EXISTS `patioautomoveis_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `patioautomoveis_db`;

-- Copiando estrutura para tabela patioautomoveis_db.alocacao
CREATE TABLE IF NOT EXISTS `alocacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` int(11) NOT NULL,
  `automovel` int(11) NOT NULL,
  `concessionaria` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__automoveis` (`automovel`),
  KEY `FK__concessionarias` (`concessionaria`),
  CONSTRAINT `FK__automoveis` FOREIGN KEY (`automovel`) REFERENCES `automoveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__concessionarias` FOREIGN KEY (`concessionaria`) REFERENCES `concessionarias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela patioautomoveis_db.alocacao: ~40 rows (aproximadamente)
INSERT IGNORE INTO `alocacao` (`id`, `area`, `automovel`, `concessionaria`, `quantidade`) VALUES
	(1, 1, 1, 1, 8),
	(2, 2, 2, 2, 1),
	(3, 4, 3, 3, 4),
	(4, 7, 4, 4, 6),
	(5, 8, 5, 5, 4),
	(6, 9, 6, 1, 4),
	(7, 10, 7, 2, 1),
	(8, 1, 8, 2, 7),
	(9, 2, 9, 3, 2),
	(10, 4, 10, 4, 6),
	(11, 7, 11, 5, 3),
	(12, 8, 12, 1, 9),
	(13, 9, 13, 2, 9),
	(14, 10, 14, 3, 6),
	(15, 1, 15, 3, 4),
	(16, 2, 16, 4, 1),
	(17, 4, 17, 5, 8),
	(18, 7, 18, 1, 4),
	(19, 8, 19, 2, 10),
	(20, 9, 20, 3, 10),
	(21, 10, 21, 4, 7),
	(22, 1, 22, 4, 3),
	(23, 2, 23, 5, 5),
	(24, 4, 24, 1, 4),
	(25, 7, 25, 2, 3),
	(26, 8, 26, 3, 3),
	(27, 9, 27, 4, 10),
	(28, 10, 28, 5, 4),
	(29, 1, 29, 1, 2),
	(30, 2, 30, 2, 3),
	(31, 4, 31, 3, 4),
	(32, 7, 32, 4, 2),
	(33, 8, 33, 5, 3),
	(34, 9, 34, 1, 4),
	(35, 10, 35, 2, 3),
	(36, 1, 36, 3, 2),
	(37, 2, 37, 4, 3),
	(38, 4, 38, 5, 3),
	(39, 7, 39, 1, 2),
	(40, 8, 40, 2, 1);

-- Copiando estrutura para tabela patioautomoveis_db.automoveis
CREATE TABLE IF NOT EXISTS `automoveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(250) COLLATE utf8_bin NOT NULL,
  `fabricante` varchar(250) COLLATE utf8_bin NOT NULL,
  `ano` year(4) NOT NULL,
  `preco` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela patioautomoveis_db.automoveis: ~40 rows (aproximadamente)
INSERT IGNORE INTO `automoveis` (`id`, `modelo`, `fabricante`, `ano`, `preco`) VALUES
	(1, 'Fiat Strada', 'Fiat', '2014', 'R$ 43.115,00'),
	(2, 'Fiat Argo', 'Fiat', '2017', 'R$ 47.660,00'),
	(3, 'Fiat Mobi', 'Fiat', '2015', 'R$ 32.102,00'),
	(4, 'Jeep Compass', 'Jeep', '2019', 'R$ 34.950,00'),
	(5, 'Hyundai HB20', 'Hyundai', '2015', 'R$ 49.302,00'),
	(6, 'Jeep Renegade', 'Jeep', '2020', 'R$ 36.661,00'),
	(7, 'Volkswagen T-Cross', 'Volkswagen', '2013', 'R$ 38.182,00'),
	(8, 'Fiat Toro', 'Fiat', '2020', 'R$ 57.733,00'),
	(9, 'Hyundai Creta', 'Hyundai', '2016', 'R$ 55.998,00'),
	(10, 'Chevrolet S10', 'Chevrolet', '2014', 'R$ 51.035,00'),
	(11, 'Toyota Corolla Cross', 'Toyota', '2018', 'R$ 34.544,00'),
	(12, 'Toyota Hilux', 'Toyota', '2016', 'R$ 53.937,00'),
	(13, 'Toyota Corolla', 'Toyota', '2015', 'R$ 55.022,00'),
	(14, 'Volkswagen Gol', 'Volkswagen', '2021', 'R$ 48.253,00'),
	(15, 'Honda HR-V', 'Honda', '2020', 'R$ 53.438,00'),
	(16, 'Renault Kwid', 'Renault', '2020', 'R$ 31.810,00'),
	(17, 'Volkswagen Nivus', 'Volkswagen', '2020', 'R$ 35.104,00'),
	(18, 'Hyundai HB20S', 'Hyundai', '2015', 'R$ 31.855,00'),
	(19, 'Ford Ranger', 'Ford', '2019', 'R$ 48.927,00'),
	(20, 'Fiat Uno', 'Fiat', '2016', 'R$ 38.111,00'),
	(21, 'Fiat Cronos', 'Fiat', '2019', 'R$ 36.515,00'),
	(22, 'Citro', 'Citro', '2015', 'R$ 53.654,00'),
	(23, 'Toyota Yaris Hatchback', 'Toyota', '2016', 'R$ 55.869,00'),
	(24, 'Volkswagen Voyage', 'Volkswagen', '2020', 'R$ 30.954,00'),
	(25, 'Honda Civic', 'Honda', '2014', 'R$ 30.871,00'),
	(26, 'Volkswagen Saveiro', 'Volkswagen', '2015', 'R$ 32.306,00'),
	(27, 'Caoa Chery Tiggo 5x', 'Caoa', '2017', 'R$ 30.069,00'),
	(28, 'Volkswagen Virtus', 'Volkswagen', '2019', 'R$ 40.689,00'),
	(29, 'Fiat Grand Siena', 'Fiat', '2018', 'R$ 33.469,00'),
	(30, 'Caoa Chery Tiggo 8', 'Caoa', '2019', 'R$ 48.481,00'),
	(31, 'Chevrolet Tracker', 'Chevrolet', '2013', 'R$ 30.648,00'),
	(32, 'Peugeot 208', 'Peugeot', '2017', 'R$ 46.934,00'),
	(33, 'Toyota SW4', 'Toyota', '2015', 'R$ 54.252,00'),
	(34, 'Nissan Frontier', 'Nissan', '2015', 'R$ 32.596,00'),
	(35, 'Honda WR-V', 'Honda', '2018', 'R$ 35.139,00'),
	(36, 'Volkswagen Taos', 'Volkswagen', '2016', 'R$ 47.546,00'),
	(37, 'Mitsubishi L200', 'Mitsubishi', '2019', 'R$ 57.049,00'),
	(38, 'Renault Oroch', 'Renault', '2014', 'R$ 48.756,00'),
	(39, 'Toyota Yaris Sedan', 'Toyota', '2020', 'R$ 43.077,00'),
	(40, 'Renault Duster', 'Renault', '2014', 'R$ 52.641,00');

-- Copiando estrutura para tabela patioautomoveis_db.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela patioautomoveis_db.clientes: ~30 rows (aproximadamente)
INSERT IGNORE INTO `clientes` (`id`, `nome`) VALUES
	(1, 'Adalberto Martins da Silva'),
	(2, 'Adan Roger Guimarães Dias'),
	(3, 'Adão Walter Gomes de Sousa'),
	(4, 'Adelson Fernandes Sena'),
	(5, 'Ademir Augusto Simões'),
	(6, 'Ademir Borges dos Santos'),
	(7, 'Adilio José da Silva Santos'),
	(8, 'Adriana Ferreira de Lima Teodoro'),
	(9, 'Adriano Bezerra Apolinario'),
	(10, 'Adriano Heleno Basso'),
	(11, 'Adriano Lourenço do Rego'),
	(12, 'Adriano Matos Santos'),
	(13, 'Adriano Pires Caetano'),
	(14, 'Adriano Prada de Campos'),
	(15, 'Adriel Alberto dos Santos'),
	(16, 'Agner Vinicius Marques de Camargo'),
	(17, 'Agrinaldo Ferreira Soares'),
	(18, 'Alan Jhonnes Banlian da Silva e Sá'),
	(19, 'Alberto Ramos Rodrigues'),
	(20, 'Alcides José Ramos'),
	(21, 'Aldemir SantAna dos Santos'),
	(22, 'Aleksandro Marcelo da Silva'),
	(23, 'Alessandro Martins Silva'),
	(24, 'Alessandro Sanches'),
	(25, 'Alex dos Reis de Jesus'),
	(26, 'Alex Ferreira Soares'),
	(27, 'Alex Sandro Oliveira'),
	(28, 'Alex Souza Farias'),
	(29, 'Alexandra de Lima Silva'),
	(30, 'Alexandre Clemente da Costa');

-- Copiando estrutura para tabela patioautomoveis_db.concessionarias
CREATE TABLE IF NOT EXISTS `concessionarias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concessionaria` varchar(250) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela patioautomoveis_db.concessionarias: ~5 rows (aproximadamente)
INSERT IGNORE INTO `concessionarias` (`id`, `concessionaria`) VALUES
	(1, 'Atena concession'),
	(2, 'Dem'),
	(3, 'Hera concession'),
	(4, 'Estia concession'),
	(5, 'Pers');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
