-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para mcheck
DROP DATABASE IF EXISTS `mcheck`;
CREATE DATABASE IF NOT EXISTS `mcheck` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mcheck`;

-- Copiando estrutura para tabela mcheck.empresas
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `cnpj` varchar(18) NOT NULL,
  `razao_social` varchar(255) NOT NULL,
  `nome_fantasia` varchar(255) NOT NULL,
  `inscricao_estadual` varchar(20) DEFAULT NULL,
  `segmento` varchar(100) NOT NULL,
  `produtos_servicos` text,
  `email_contato` varchar(255) NOT NULL,
  `nome_usuario_sistema` varchar(100) NOT NULL,
  `senha_hash` varchar(255) NOT NULL,
  `data_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cnpj`),
  UNIQUE KEY `razao_social` (`razao_social`),
  UNIQUE KEY `email_contato` (`email_contato`),
  UNIQUE KEY `nome_usuario_sistema` (`nome_usuario_sistema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela mcheck.equipamentos
DROP TABLE IF EXISTS `equipamentos`;
CREATE TABLE IF NOT EXISTS `equipamentos` (
  `equipamento_id` int NOT NULL AUTO_INCREMENT,
  `nome_equipamento` varchar(255) NOT NULL,
  `tipo_equipamento` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `id_identificador` varchar(50) NOT NULL,
  `fabricacao` varchar(100) DEFAULT NULL,
  `numero_modelo` varchar(100) DEFAULT NULL,
  `numero_serie` varchar(100) DEFAULT NULL,
  `criticidade` varchar(50) DEFAULT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `atribuido_a` varchar(255) DEFAULT NULL,
  `data_instalacao` date DEFAULT NULL,
  `data_compra` date DEFAULT NULL,
  `custo_compra` decimal(10,2) DEFAULT NULL,
  `data_termino_garantia` date DEFAULT NULL,
  `especificacoes` text,
  `dados_uso` text,
  `notas` text,
  `data_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cnpj_empresa` varchar(18) NOT NULL,
  PRIMARY KEY (`equipamento_id`),
  UNIQUE KEY `id_identificador` (`id_identificador`),
  UNIQUE KEY `numero_serie` (`numero_serie`),
  KEY `fk_equipamentos_empresa` (`cnpj_empresa`),
  CONSTRAINT `fk_equipamentos_empresa` FOREIGN KEY (`cnpj_empresa`) REFERENCES `empresas` (`cnpj`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela mcheck.funcionarios
DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `funcionario_id` int NOT NULL AUTO_INCREMENT,
  `cnpj_empresa` varchar(18) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha_hash` varchar(255) NOT NULL,
  `telefone_celular` varchar(20) DEFAULT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`funcionario_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `cnpj_empresa` (`cnpj_empresa`),
  CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`cnpj_empresa`) REFERENCES `empresas` (`cnpj`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
