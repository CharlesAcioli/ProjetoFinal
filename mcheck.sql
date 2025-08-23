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

-- Copiando dados para a tabela mcheck.empresas: ~5 rows (aproximadamente)
INSERT INTO `empresas` (`cnpj`, `razao_social`, `nome_fantasia`, `foto_emp`, `inscricao_estadual`, `segmento`, `produtos_servicos`, `email_contato`, `senha_hash`, `data_registro`) VALUES
	('11.222.333/0001-44', 'Brilho Máximo Serviços de Limpeza ME', 'Brilho Máximo', NULL, '321.654.987.000', 'Serviços de Limpeza', 'Limpeza comercial e residencial, limpeza pós-obra', 'suporte@brilhomaximo.com.br', '$2y$10$HbKRB1DYifG/UBCDpgodOOy40Rn/nn2sLVJYf8fStrHSKVyjViFXi', '2025-08-20 19:28:07'),
	('12.345.678/0001-90', 'TECNOLOGIA INOVADORA LTDA.', 'Tech Inova', NULL, '987.654.321.123', 'Tecnologia da Informação', 'Desenvolvimento de software, consultoria em TI, suporte técnico e hospedagem de sites.', 'contato@techinova.com.br', '$2y$10$fkZ0CoeAyiePYqmaHG9V0e5bxKbrpFLIsiYH89X4K4ytm3NGAbTDO', '2025-08-14 17:11:37'),
	('33.444.555/0001-77', 'Express Gourmet Alimentos Congelados LTDA', 'Express Gourmet', NULL, '789.456.123.009', 'Alimentação', 'Produção e entrega de alimentos congelados', 'pedidos@expressgourmet.com.br', '$2y$10$HdOE/6Dih1gkubc4qlyvdOf9MaC2RKLvF9vNJQnudMJnbIGaYGAHC', '2025-08-20 19:28:54'),
	('34.567.890/0001-12', 'Soluções Inteligentes LTDA', 'Smart Solutions', NULL, '123.456.789.000', 'Tecnologia da Informação', 'Desenvolvimento de softwares e consultoria em TI', 'contato@smartsolutions.com.br', '$2y$10$0TFswd.ivbnD8RDJ9pa59ehmDWfLnyGsTAKL5DTjcdSEcbYVyb3X2', '2025-08-20 19:22:38'),
	('98.765.432/0001-11', 'Agro Verde Comércio de Produtos Agrícolas EIRELI', 'Agro Verde', NULL, '456.789.123.001', 'Agricultura e Pecuária', 'Venda de fertilizantes, sementes e defensivos agrícolas', 'atendimento@agroverde.com.br', '$2y$10$SPGQPvb/IILxzlOSprw6f.p3/q1LmB91I2GEHrcuERmiD5MAdLipi', '2025-08-20 19:26:48');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela mcheck.equipamentos: ~6 rows (aproximadamente)
INSERT INTO `equipamentos` (`equipamento_id`, `nome_equipamento`, `tipo_equipamento`, `status`, `localizacao`, `fabricante`, `numero_modelo`, `numero_serie`, `criticidade`, `departamento`, `atribuido_a`, `data_instalacao`, `data_compra`, `custo_compra`, `data_termino_garantia`, `especificacoes`, `dados_uso`, `notas`, `data_registro`, `ultima_atualizacao`, `patrimonio`, `cnpj_empresa`) VALUES
	(8, 'Bomba Centrífuga Alta Pressão', 'Bomba Hidráulica', 'Operacional', 'Setor 01, Baia A', 'FlowServer', 'CS-5000', 'FSN-98765', 'alta', 'Sistema de Refrigeração', 'Tecnologia da Informação', '2024-06-20', '2023-01-12', 15.00, '2025-08-25', 'Capacidade: 500GPM, Altura: 20 Metros, Motor: 50 HP', 'Total de horas de operação: 1.200h', 'Em manutenção preventiva agendada trimestralmente.', '2025-08-20 19:37:28', '2025-08-20 19:55:42', '00012345', '33.444.555/0001-77'),
	(9, 'Unidade Condensadora XR', 'Sistema de Resfriamento', 'Operacional', 'Setor 02, Baia C', 'CoolTech Brasil', 'XCT-400', 'CTB-11234', 'media', 'Climatização Industrial', 'Tecnologia da Informação', '2022-02-20', '2023-05-16', 32.50, '2023-07-19', 'Capacidade: 7500 BTU/h, Voltagem: 220V, Gás: R-410A', 'Total de horas de operação: 600h', 'Vazamento detectado no compressor — aguardando peça de reposição.', '2025-08-20 19:43:39', '2025-08-21 19:38:28', '00056789', '12.345.678/0001-90'),
	(11, 'Empilhadeira Elétrica', 'Equipamento de Movimentação', 'Operacional', 'Armazém 01, Zona de Carga', 'Toyota Material Handling', '8FBE15U', 'TMH-202301', 'media', 'Logística e Armazenagem', 'Transporte e Logística', '2018-01-11', '2019-05-01', 85.00, '2025-08-28', 'Capacidade: 1,5 Toneladas, Altura: 3,5 m, Elétrica', 'Total de horas de operação: 500h', 'Revisão de bateria agendada para próxima semana.', '2025-08-20 19:46:38', '2025-08-20 19:46:38', '00104523', '11.222.333/0001-44'),
	(12, 'Caldeira a Vapor', 'Gerador de Vapor', 'Precisa de reparo', 'Setor Térmico, Sala de Caldeiras', 'Calderinox', 'CLDX-750', 'CLD-77543', 'alta', 'Manutenção Industrial', 'Indústria Alimentícia', '2021-04-29', '2021-06-09', 120.00, '2027-06-15', 'Pressão: 10 bar, Capacidade: 750 L/h, Combustível: GLP', 'Total de horas de operação: 4.500h', 'Inspeção de válvulas de segurança em andamento.', '2025-08-20 19:48:22', '2025-08-20 19:48:22', '00099887', '33.444.555/0001-77'),
	(13, 'Câmara Fria Vertical', 'Refrigeração Industrial', 'Em manutenção', 'Almoxarifado Térmico', 'FrioSystem', 'FRC-2000', 'FRS-22012', 'alta', 'Armazenamento de Insumos', 'Setor Agrícola', '2025-08-04', '2025-10-09', 65.00, '2030-10-22', 'Volume: 20m³, Faixa de temperatura: -20°C a 5°C', 'Total de horas de operação: 2.300h', 'Necessário ajuste nos sensores de temperatura.', '2025-08-20 19:50:30', '2025-08-20 19:50:30', '00044321', '98.765.432/0001-11'),
	(14, 'Esteira Transportadora Modular', 'Equipamento de Transporte', 'Precisa de reparo', 'Linha de Produção 2', 'Linha de Produção 2', 'FXM-300', 'FXM-00321', 'media', 'Produção', 'Turismo e Hotelaria', '2023-05-08', '2023-11-08', 38.50, '2025-10-23', 'Largura: 500mm, Velocidade: até 30 m/min, Modular', 'Total de horas de operação: 1.100h', 'Rolamentos desgastados — substituição em andamento.', '2025-08-20 19:53:10', '2025-08-20 19:53:10', '00066543', '12.345.678/0001-90');

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

-- Copiando dados para a tabela mcheck.funcionarios: ~5 rows (aproximadamente)
INSERT INTO `funcionarios` (`funcionario_id`, `nome_completo`, `email`, `foto_func`, `cpf`, `senha_hash`, `telefone_celular`, `cargo`, `tipo_usuario`, `setor`, `data_cadastro`, `endereco`, `bairro`, `cep`) VALUES
	(1, 'Guilherme Melo de Menezes', 'guilherme.m.meneses@aluno.senai.br', 'images', '12543369406', '$2y$10$T2HNWXj61YixJOEqp4CXJ.DOZf/5SiyEvSj6R/wSuTUm0QgI0pKua', '(11) 98765-4321', 'Administrador', 'Master', 'Tecnologia da Informação', '2025-07-03 17:05:49', NULL, NULL, NULL),
	(2, 'Ana Silva', 'ana.silva@inovatech.com', 'download (1)', '12345678900', '$2y$10$gpF3C79wsk4O2.Xr2IZ00uAvwuW8Cj3nw1momyE/Amh1gnbGLey82', '(31) 95555-0000', 'Gerente', 'Comum', 'Educação', '2025-07-22 14:43:01', NULL, NULL, NULL),
	(4, 'Pedro Costa', 'pedro.costa@inovatech.com', '05-12-21-happy-people', '09876543210', '$2y$10$cPAugcN/gK4/2OC1aRinjeV6V9lv09sf6fCeza6Kz7rBx4x9CPZ96', '(41) 90909-1111', 'Funcionario', 'Lider', 'Governo e Setor Público', '2025-07-22 14:44:01', NULL, NULL, NULL),
	(9, 'Alisson', 'Alisson@gmail.com', NULL, '321.432.434-56', '$2y$10$rYO3BUdJM76SE6.H6szkZ.Dx2nJ/Fqo/YFVvvTdEKYisHrT1zulsu', '82987321595', 'Supervisor', 'Master', 'Tecnologia da Informação', '2025-08-14 16:59:12', 'Rua do apavoro', 'Baixada Norte', 242424242),
	(11, 'Cláudia caroline', 'claudia@gmail.com', NULL, '11111111111', '$2y$10$aIOU3REEQW5G1mo3xGo1hOxML.cAM.3fLqkPB0yVM/k/tDLOLEKO.', '242423424', 'Administrador', 'Comum', 'Tecnologia da Informação', '2025-08-15 15:15:32', 'tanto faz', 'seila', 2342422);

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
