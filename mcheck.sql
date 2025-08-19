-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.34 - MySQL Community Server - GPL
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
  `foto_emp` varchar(50) DEFAULT NULL,
  `inscricao_estadual` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `segmento` varchar(100) NOT NULL,
  `produtos_servicos` text,
  `email_contato` varchar(255) NOT NULL,
  `senha_hash` varchar(255) NOT NULL,
  `data_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cnpj`),
  UNIQUE KEY `razao_social` (`razao_social`),
  UNIQUE KEY `email_contato` (`email_contato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela mcheck.empresas: ~0 rows (aproximadamente)
INSERT INTO `empresas` (`cnpj`, `razao_social`, `nome_fantasia`, `foto_emp`, `inscricao_estadual`, `segmento`, `produtos_servicos`, `email_contato`, `senha_hash`, `data_registro`) VALUES
	('12.345.678/0001-90', 'TECNOLOGIA INOVADORA LTDA.', 'Tech Inova', NULL, '987.654.321.123', 'Tecnologia da Informação', 'Desenvolvimento de software, consultoria em TI, suporte técnico e hospedagem de sites.', 'contato@techinova.com.br', '$2y$10$fkZ0CoeAyiePYqmaHG9V0e5bxKbrpFLIsiYH89X4K4ytm3NGAbTDO', '2025-08-14 17:11:37');

-- Copiando estrutura para tabela mcheck.equipamentos
DROP TABLE IF EXISTS `equipamentos`;
CREATE TABLE IF NOT EXISTS `equipamentos` (
  `equipamento_id` int NOT NULL AUTO_INCREMENT,
  `nome_equipamento` varchar(255) NOT NULL,
  `tipo_equipamento` varchar(100) NOT NULL,
  `status` enum('Em manutenção','Precisa de reparo','Operacional') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `fabricante` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `numero_modelo` varchar(100) DEFAULT NULL,
  `numero_serie` varchar(100) DEFAULT NULL,
  `criticidade` enum('alta','media','baixa') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `departamento` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `atribuido_a` enum('Tecnologia da Informação','Saúde e Bem-Estar','Serviços Financeiros','Varejo e Comércio','Educação','Construção Civil','Indústria Manufatureira','Mídia e Entretenimento','Governo e Setor Público','Turismo e Hotelaria','Serviços Imobiliários','Biotecnologia','Sustentabilidade e Meio Ambiente','Marketing e Publicidade','Indústria Alimentícia','Consultoria','Setor Agrícola','Energia','Transporte e Logística','Recursos Humanos') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
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
  `cnpj_empresa` varchar(18) NOT NULL,
  PRIMARY KEY (`equipamento_id`),
  UNIQUE KEY `numero_serie` (`numero_serie`),
  KEY `FK_equipamentos_empresas` (`cnpj_empresa`),
  KEY `FK_equipamentos_setores` (`atribuido_a`),
  CONSTRAINT `FK_equipamentos_empresas` FOREIGN KEY (`cnpj_empresa`) REFERENCES `empresas` (`cnpj`),
  CONSTRAINT `FK_equipamentos_setores` FOREIGN KEY (`atribuido_a`) REFERENCES `setores` (`setores`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela mcheck.equipamentos: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela mcheck.funcionarios
DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `funcionario_id` int NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto_func` varchar(50) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha_hash` varchar(255) NOT NULL,
  `telefone_celular` varchar(20) DEFAULT NULL,
  `cargo` enum('Administrador','Diretor','Gerente','Supervisor','Funcionario','Tecnico') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo_usuario` enum('Master','Lider','Comum') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `setor` enum('Tecnologia da Informação','Saúde e Bem-Estar','Serviços Financeiros','Varejo e Comércio','Educação','Construção Civil','Indústria Manufatureira','Mídia e Entretenimento','Governo e Setor Público','Turismo e Hotelaria','Serviços Imobiliários','Biotecnologia','Sustentabilidade e Meio Ambiente','Marketing e Publicidade','Indústria Alimentícia','Consultoria','Setor Agrícola','Energia','Transporte e Logística','Recursos Humanos') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endereco` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `bairro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `cep` int DEFAULT NULL,
  PRIMARY KEY (`funcionario_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `FK_funcionarios_setores` (`setor`),
  CONSTRAINT `FK_funcionarios_setores` FOREIGN KEY (`setor`) REFERENCES `setores` (`setores`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela mcheck.funcionarios: ~6 rows (aproximadamente)
INSERT INTO `funcionarios` (`funcionario_id`, `nome_completo`, `email`, `foto_func`, `cpf`, `senha_hash`, `telefone_celular`, `cargo`, `tipo_usuario`, `setor`, `data_cadastro`, `endereco`, `bairro`, `cep`) VALUES
	(1, 'Guilherme Melo de Menezes', 'guilherme.m.meneses@aluno.senai.br', 'images', '12543369406', '$2y$10$T2HNWXj61YixJOEqp4CXJ.DOZf/5SiyEvSj6R/wSuTUm0QgI0pKua', '(11) 98765-4321', 'Administrador', 'Master', 'Tecnologia da Informação', '2025-07-03 17:05:49', NULL, NULL, NULL),
	(2, 'Ana Silva', 'ana.silva@inovatech.com', 'download (1)', '12345678900', '$2y$10$gpF3C79wsk4O2.Xr2IZ00uAvwuW8Cj3nw1momyE/Amh1gnbGLey82', '(31) 95555-0000', 'Gerente', 'Master', 'Educação', '2025-07-22 14:43:01', NULL, NULL, NULL),
	(4, 'Pedro Costa', 'pedro.costa@inovatech.com', '05-12-21-happy-people', '09876543210', '$2y$10$cPAugcN/gK4/2OC1aRinjeV6V9lv09sf6fCeza6Kz7rBx4x9CPZ96', '(41) 90909-1111', 'Supervisor', 'Master', 'Governo e Setor Público', '2025-07-22 14:44:01', NULL, NULL, NULL),
	(9, 'Alisson Mikael de Melo dos Santos', 'Alisson@gmail.com', NULL, '321.432.434-56', '$2y$10$rYO3BUdJM76SE6.H6szkZ.Dx2nJ/Fqo/YFVvvTdEKYisHrT1zulsu', '82987321595', 'Administrador', 'Master', 'Tecnologia da Informação', '2025-08-14 16:59:12', 'Rua do apavoro', 'Baixada Norte', 242424242),
	(10, 'teste', 'teste@gmail.com', NULL, '13323233324', 'senhateste', NULL, 'Administrador', 'Master', 'Consultoria', '2025-08-15 15:06:33', '', '', NULL),
	(11, 'Cláudia', 'claudia@gmail.com', NULL, '234234242442', '$2y$10$aIOU3REEQW5G1mo3xGo1hOxML.cAM.3fLqkPB0yVM/k/tDLOLEKO.', '242423424', 'Administrador', 'Master', 'Saúde e Bem-Estar', '2025-08-15 15:15:32', 'tanto faz', 'seila', 2342422);

-- Copiando estrutura para tabela mcheck.setores
DROP TABLE IF EXISTS `setores`;
CREATE TABLE IF NOT EXISTS `setores` (
  `id_setor` int NOT NULL AUTO_INCREMENT,
  `setores` enum('Tecnologia da Informação','Saúde e Bem-Estar','Serviços Financeiros','Varejo e Comércio','Educação','Construção Civil','Indústria Manufatureira','Mídia e Entretenimento','Governo e Setor Público','Turismo e Hotelaria','Serviços Imobiliários','Biotecnologia','Sustentabilidade e Meio Ambiente','Marketing e Publicidade','Indústria Alimentícia','Consultoria','Setor Agrícola','Energia','Transporte e Logística','Recursos Humanos') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_setor`),
  UNIQUE KEY `setores` (`setores`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela mcheck.setores: ~20 rows (aproximadamente)
INSERT INTO `setores` (`id_setor`, `setores`) VALUES
	(1, 'Tecnologia da Informação'),
	(2, 'Saúde e Bem-Estar'),
	(3, 'Serviços Financeiros'),
	(4, 'Varejo e Comércio'),
	(5, 'Educação'),
	(6, 'Construção Civil'),
	(7, 'Indústria Manufatureira'),
	(8, 'Mídia e Entretenimento'),
	(9, 'Governo e Setor Público'),
	(10, 'Turismo e Hotelaria'),
	(11, 'Serviços Imobiliários'),
	(12, 'Biotecnologia'),
	(13, 'Sustentabilidade e Meio Ambiente'),
	(14, 'Marketing e Publicidade'),
	(15, 'Indústria Alimentícia'),
	(16, 'Consultoria'),
	(17, 'Setor Agrícola'),
	(18, 'Energia'),
	(19, 'Transporte e Logística'),
	(20, 'Recursos Humanos');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
