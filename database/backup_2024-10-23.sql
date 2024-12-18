-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para sgrif
CREATE DATABASE IF NOT EXISTS `sgrif` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `sgrif`;

-- Copiando estrutura para tabela sgrif.equipamento
CREATE TABLE IF NOT EXISTS `equipamento` (
  `idEquipamento` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `config` varchar(255) NOT NULL,
  PRIMARY KEY (`idEquipamento`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sgrif.equipamento: ~4 rows (aproximadamente)
INSERT INTO `equipamento` (`idEquipamento`, `marca`, `tipo`, `config`) VALUES
	(5, 'Daten', 'Computador', 'Ryzen 5 2500; gtx 710; 8GB Ram.'),
	(6, 'HP', 'Computador', 'Intel i5 3400h'),
	(7, '-', 'Lousa de vidro', '-'),
	(9, '-', 'Projetor', '-');

-- Copiando estrutura para tabela sgrif.equipamento_sala
CREATE TABLE IF NOT EXISTS `equipamento_sala` (
  `idSala` int(11) NOT NULL AUTO_INCREMENT,
  `idEquipamento` int(11) NOT NULL,
  `qtdeTotal` int(11) NOT NULL,
  `qtdeOperavel` int(11) NOT NULL,
  PRIMARY KEY (`idSala`,`idEquipamento`),
  KEY `fk_sala_has_equipamento_equipamento1_idx` (`idEquipamento`),
  KEY `fk_sala_has_equipamento_sala1_idx` (`idSala`),
  CONSTRAINT `fk_sala_has_equipamento_equipamento1` FOREIGN KEY (`idEquipamento`) REFERENCES `equipamento` (`idEquipamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sala_has_equipamento_sala1` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sgrif.equipamento_sala: ~3 rows (aproximadamente)
INSERT INTO `equipamento_sala` (`idSala`, `idEquipamento`, `qtdeTotal`, `qtdeOperavel`) VALUES
	(3, 5, 10, 10),
	(3, 7, 1, 1),
	(3, 9, 1, 1);

-- Copiando estrutura para tabela sgrif.ocorrencia
CREATE TABLE IF NOT EXISTS `ocorrencia` (
  `idOcorrencia` int(11) NOT NULL AUTO_INCREMENT,
  `idReserva` int(11) NOT NULL,
  `dia` date NOT NULL,
  `inicio` time NOT NULL,
  `fim` time NOT NULL,
  PRIMARY KEY (`idOcorrencia`),
  KEY `fk_ocorrencia_reserva1_idx` (`idReserva`),
  CONSTRAINT `fk_ocorrencia_reserva1` FOREIGN KEY (`idReserva`) REFERENCES `reserva` (`idReserva`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sgrif.ocorrencia: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sgrif.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `idReserva` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idSala` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `dataReserva` date NOT NULL,
  `inicioReserva` date NOT NULL,
  `fimReserva` date NOT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `Usuario_idUsuario` (`idUsuario`),
  KEY `fk_reserva_sala1_idx` (`idSala`),
  CONSTRAINT `fk_reserva_sala1` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sgrif.reserva: ~3 rows (aproximadamente)
INSERT INTO `reserva` (`idReserva`, `idUsuario`, `idSala`, `tipo`, `dataReserva`, `inicioReserva`, `fimReserva`) VALUES
	(11, 2, 5, 'Recorrente', '2024-12-18', '2025-02-01', '2025-08-01'),
	(13, 4, 6, 'Recorrente', '2024-12-14', '2025-02-01', '2026-02-01'),
	(40, 12, 6, 'Recorrente', '2024-12-18', '2025-02-01', '2025-08-01');

-- Copiando estrutura para tabela sgrif.sala
CREATE TABLE IF NOT EXISTS `sala` (
  `idSala` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `capacidade` int(11) NOT NULL,
  PRIMARY KEY (`idSala`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sgrif.sala: ~19 rows (aproximadamente)
INSERT INTO `sala` (`idSala`, `nome`, `localizacao`, `capacidade`) VALUES
	(3, 'Laboratório 02', 'Bloco 02', 27),
	(5, 'Laboratório 03', 'Bloco 02', 27),
	(6, 'Laboratório 04', 'Bloco 02', 27),
	(7, 'Laboratório de Redes', 'Bloco 02', 27),
	(8, 'Laboratório Sensorial', 'Bloco 03', 15),
	(9, 'Laboratório de Química ', 'Bloco 02', 20),
	(10, 'Laboratório de Física', 'Bloco 02', 20),
	(11, 'Sala 01', 'Bloco 02', 30),
	(12, 'Sala 02', 'Bloco 02', 30),
	(13, 'Sala 03', 'Bloco 02', 30),
	(14, 'Sala 04', 'Bloco 02', 30),
	(15, 'Sala 05', 'Bloco 02', 30),
	(16, 'Sala 06', 'Bloco 02', 30),
	(17, 'Sala 07', 'Bloco 02', 30),
	(18, 'Sala 08', 'Bloco 02', 30),
	(19, 'Sala 09', 'Bloco 02', 30),
	(20, 'Sala EAD', 'Bloco 02', 30),
	(22, 'Quadra de Esportes', 'Ginásio', 40),
	(24, 'Laboratório 01', 'Bloco 02', 27);

-- Copiando estrutura para tabela sgrif.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sgrif.usuario: ~8 rows (aproximadamente)
INSERT INTO `usuario` (`idUsuario`, `nome`, `tipo`, `email`, `senha`) VALUES
	(2, 'Heber Renato Fadel de Morais ', 'Professor', 'heber.moraes@ifpr.edu.br', ''),
	(4, 'Estevan Costa', 'Professor', 'estevan.costa@ifpr.edu.br', ''),
	(7, 'Elismar Vicente dos Reis', 'Professor', 'elismar.reis@ifpr.edu.br', ''),
	(8, 'Arlindo Luis Marcon Junio', 'Professor', 'arlindo.junior@ifpr.edu.br', ''),
	(9, 'Bruno Guaringue Trindade', 'Professor', 'bruno.trindade@ifpr.edu.br', ''),
	(11, 'Fabricio Baptista	', 'Professor', 'fabricio.baptista@ifpr.edu.br', ''),
	(12, 'Luís Henrique Pupo Maron', 'Professor', 'luis.maron@ifpr.edu.br', ''),
	(13, 'Marcia Cristina dos Reis', 'Professora', 'marcia.reis@ifpr.edu.br', '');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
