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
  `inscricao_estadual` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `segmento` varchar(100) NOT NULL,
  `produtos_servicos` text,
  `email_contato` varchar(255) NOT NULL,
  `nome_usuario_sistema` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `senha_hash` varchar(255) NOT NULL,
  `data_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cnpj`),
  UNIQUE KEY `razao_social` (`razao_social`),
  UNIQUE KEY `email_contato` (`email_contato`),
  UNIQUE KEY `nome_usuario_sistema` (`nome_usuario_sistema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela mcheck.empresas: ~2 rows (aproximadamente)
INSERT INTO `empresas` (`cnpj`, `razao_social`, `nome_fantasia`, `inscricao_estadual`, `segmento`, `produtos_servicos`, `email_contato`, `nome_usuario_sistema`, `senha_hash`, `data_registro`) VALUES
	('12.345.678/0001-90', 'ABC Indústria e Comércio de Eletrônicos S.A.', 'Mundo Pet Feliz', '123456789102', 'Comércio Varejista - Artigos e Alimentos para Animais de Estimação', 'Rações, brinquedos, acessórios (coleiras, guias, camas), medicamentos, produtos de higiene, serviços de banho e tosa.', 'contato@mundopetfeliz.com.br', NULL, '$2y$10$XZuZq58ZAqnaIS5k4VZYpOlL28mJ3xhsBS.xunYISuKdVYzCaQ81O', '2025-07-03 15:51:23'),
	('98.765.432/0001-21', 'Tech Solutions Inovação Digital Ltda.', 'InovaTech', '123456789112', 'Tecnologia da Informação', 'Desenvolvimento de Software, Consultoria em TI, Soluções em Nuvem', 'contato@inovatech.com', NULL, '$2y$10$Wh6zxU9wGwSI0sScHD.JhOKJrErDTh7XKbT/7WKlaOBOA1tpUQnc2', '2025-07-22 14:39:08');

-- Copiando estrutura para tabela mcheck.equipamentos
DROP TABLE IF EXISTS `equipamentos`;
CREATE TABLE IF NOT EXISTS `equipamentos` (
  `equipamento_id` int NOT NULL AUTO_INCREMENT,
  `nome_equipamento` varchar(255) NOT NULL,
  `tipo_equipamento` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `fabricante` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `numero_modelo` varchar(100) DEFAULT NULL,
  `numero_serie` varchar(100) DEFAULT NULL,
  `criticidade` varchar(50) DEFAULT NULL,
  `departamento` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `atribuido_a` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_instalacao` date NOT NULL,
  `data_compra` date NOT NULL,
  `custo_compra` decimal(10,2) NOT NULL,
  `data_termino_garantia` date NOT NULL,
  `especificacoes` text,
  `dados_uso` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `notas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `data_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `patrimonio` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  PRIMARY KEY (`equipamento_id`),
  UNIQUE KEY `numero_serie` (`numero_serie`),
  KEY `FK_equipamentos_empresas` (`cnpj`),
  CONSTRAINT `FK_equipamentos_empresas` FOREIGN KEY (`cnpj`) REFERENCES `empresas` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela mcheck.equipamentos: ~1 rows (aproximadamente)
INSERT INTO `equipamentos` (`equipamento_id`, `nome_equipamento`, `tipo_equipamento`, `status`, `localizacao`, `fabricante`, `numero_modelo`, `numero_serie`, `criticidade`, `departamento`, `atribuido_a`, `data_instalacao`, `data_compra`, `custo_compra`, `data_termino_garantia`, `especificacoes`, `dados_uso`, `notas`, `data_registro`, `ultima_atualizacao`, `patrimonio`, `cnpj`) VALUES
	(1, 'Servidor Web Principal', 'Servidor', 'Em manutenção', 'Rack 3, Sala de Servidores, Prédio B', 'HP Enterprise', 'ProLiant DL380 Gen10', 'BRW001234567', 'alta', 'Tecnologia da Informação (TI)', 'Equipe de Infraestrutura de Redes', '2025-07-07', '2025-05-06', 1850000.00, '2029-06-12', 'Processador Intel Xeon Gold, 128GB RAM, 4x SSD NVMe de 1TB, Debian Linux 12.', 'Hospeda aplicações críticas e banco de dados. Carga média de CPU: 40%, utilização de RAM: 60%. Monitoramento 24/7.', 'Necessita de revisão de segurança trimestral. Backup diário configurado para nuvem.', '2025-07-29 15:32:55', '2025-07-29 15:32:55', '11223344000155', '98.765.432/0001-21');

-- Copiando estrutura para tabela mcheck.funcionarios
DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `funcionario_id` int NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha_hash` varchar(255) NOT NULL,
  `telefone_celular` varchar(20) DEFAULT NULL,
  `tipo_usuario` enum('Administrador','Diretor','Gerente','Supervisor','Funcionario') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`funcionario_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela mcheck.funcionarios: ~4 rows (aproximadamente)
INSERT INTO `funcionarios` (`funcionario_id`, `nome_completo`, `email`, `cpf`, `senha_hash`, `telefone_celular`, `tipo_usuario`, `data_cadastro`, `ativo`) VALUES
	(1, 'Guilherme Melo de Menezes', 'guilherme.m.meneses@aluno.senai.br', '12543369406', '$2y$10$T2HNWXj61YixJOEqp4CXJ.DOZf/5SiyEvSj6R/wSuTUm0QgI0pKua', NULL, 'Administrador', '2025-07-03 17:05:49', 1),
	(2, 'Ana Silva', 'ana.silva@inovatech.com', '12345678900', '$2y$10$gpF3C79wsk4O2.Xr2IZ00uAvwuW8Cj3nw1momyE/Amh1gnbGLey82', NULL, 'Gerente', '2025-07-22 14:43:01', 1),
	(4, 'Pedro Costa', 'pedro.costa@inovatech.com', '09876543210', '$2y$10$cPAugcN/gK4/2OC1aRinjeV6V9lv09sf6fCeza6Kz7rBx4x9CPZ96', NULL, 'Supervisor', '2025-07-22 14:44:01', 1),
	(6, 'Fernanda Lima', 'fernanda.lima@inovatech.com', '23456789011', '$2y$10$6Pm5myU2nNfutriS9K3GGeUf0.m5B.NNulfU105Wb.qdIA0t6oS/u', NULL, 'Administrador', '2025-07-22 14:48:43', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
