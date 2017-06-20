-- --------------------------------------------------------
-- Servidor:                     201.18.100.25
-- Versão do servidor:           5.6.16-log - MySQL Community Server (GPL)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para proconpb_naoperturbe_v2
CREATE DATABASE IF NOT EXISTS `proconpb_naoperturbe_v2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `proconpb_naoperturbe_v2`;


-- Copiando estrutura para tabela proconpb_naoperturbe_v2.pessoa_fisica
CREATE TABLE IF NOT EXISTS `pessoa_fisica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `rg` varchar(10) CHARACTER SET utf8 NOT NULL,
  `data_expedicao` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `orgao_expedidor` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_pessoa_fisica` (`id_usuario`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `pk_pessoa_fisica` (`id`),
  CONSTRAINT `fk_pessoa_fisica` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela proconpb_naoperturbe_v2.pessoa_fisica: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pessoa_fisica` DISABLE KEYS */;
INSERT INTO `pessoa_fisica` (`id`, `id_usuario`, `cpf`, `uf`, `rg`, `data_expedicao`, `orgao_expedidor`) VALUES
	(3, 2, '062.205.294-21', 'pb', '2.685.016', '05/06/99', 'ssp'),
	(4, 3, '016.646.017-67', 'pb', '1.425.691', '26/12/13', 'SSP');
/*!40000 ALTER TABLE `pessoa_fisica` ENABLE KEYS */;


-- Copiando estrutura para tabela proconpb_naoperturbe_v2.pessoa_juridica
CREATE TABLE IF NOT EXISTS `pessoa_juridica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `cnpj` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `status_telemarketing` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj_UNIQUE` (`id_usuario`),
  UNIQUE KEY `usuario_id_usuario_UNIQUE` (`id_usuario`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_pessoa_juridica_1_idx` (`id_usuario`),
  CONSTRAINT `fk_pessoa_juridica_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela proconpb_naoperturbe_v2.pessoa_juridica: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `pessoa_juridica` DISABLE KEYS */;
INSERT INTO `pessoa_juridica` (`id`, `id_usuario`, `cnpj`, `status_telemarketing`) VALUES
	(1, 1, '11.122.255/3366-22', 0),
	(2, 4, '14190549000109', 0);
/*!40000 ALTER TABLE `pessoa_juridica` ENABLE KEYS */;


-- Copiando estrutura para tabela proconpb_naoperturbe_v2.telefone
CREATE TABLE IF NOT EXISTS `telefone` (
  `id_telefone` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `status_bloqueio` int(1) NOT NULL,
  `telefone_numero` varchar(15) CHARACTER SET utf8 NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_telefone`),
  UNIQUE KEY `telefone_numero_UNIQUE` (`telefone_numero`),
  UNIQUE KEY `id_telefone_UNIQUE` (`id_telefone`),
  KEY `fk_telefone_1_idx` (`id_usuario`),
  CONSTRAINT `fk_telefone_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela proconpb_naoperturbe_v2.telefone: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `telefone` DISABLE KEYS */;
INSERT INTO `telefone` (`id_telefone`, `id_usuario`, `status_bloqueio`, `telefone_numero`, `data_cadastro`, `data_atualizacao`) VALUES
	(1, 1, 0, '(83) 32186959', '2017-05-31 10:43:56', '2017-05-31 10:43:56'),
	(2, 2, 0, '(83) 98618-1429', '2017-06-06 11:34:50', '2017-06-06 11:34:50'),
	(3, 3, 0, '(83) 99692-3678', '2017-06-06 11:44:50', '2017-06-06 11:44:50'),
	(4, 3, 0, '(83) 98744-2285', '2017-06-06 11:45:20', '2017-06-06 11:45:20'),
	(5, 4, 1, '(84) 40089010', '2017-06-06 13:03:16', '2017-06-06 13:03:16');
/*!40000 ALTER TABLE `telefone` ENABLE KEYS */;


-- Copiando estrutura para tabela proconpb_naoperturbe_v2.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nome` varchar(150) CHARACTER SET utf8 NOT NULL,
  `type` varchar(6) CHARACTER SET utf8 NOT NULL,
  `cep` varchar(9) CHARACTER SET utf8 NOT NULL,
  `rua` varchar(255) CHARACTER SET utf8 NOT NULL,
  `bairro` varchar(45) CHARACTER SET utf8 NOT NULL,
  `cidade` varchar(150) CHARACTER SET utf8 NOT NULL,
  `numero` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `complemento` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela proconpb_naoperturbe_v2.usuario: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `email`, `senha`, `nome`, `type`, `cep`, `rua`, `bairro`, `cidade`, `numero`, `complemento`, `data_cadastro`, `data_atualizacao`) VALUES
	(1, 'proconpb.ti@gmail.com', '$2a$08$Nzc4OTE4NDc0NTkyZWM4OOxDMrsFY3tCzjtDiG.PFI0RwM13uznnO', 'PROCON PB NTI', 'admin', '58013-130', 'PARQUE SOLON DE LUCENA', 'CENTRO', 'JOÃO PESSOA', '234', '', '2017-05-31 10:43:56', '2017-05-31 10:47:08'),
	(2, 'fabiosantos_fb@hotmail.com', '$2a$08$MTY2NzI3OTY3MTU5MzZiZ.zHbu/nhpbO.Lckf/Ay/vueZQP3HxKmK', 'Fabiano Santos', 'pf', '58027-517', 'Rua Joaquim gonÃ§alves ledos', 'mandacaru', 'joÃ£o pessoa', '986', '', '2017-06-06 11:34:50', '2017-06-06 11:34:50'),
	(3, 'emilianocarvalho.it@gmail.com', '$2a$08$MTI3ODQ1ODkwMzU5MzZiZef1ForGRHDNo9qBApokwrzmIOR3vFxWW', 'Emiliano Carvalho', 'pf', '58035-105', 'Rua JoÃ£o Cabral de Lucena', 'Bessa', 'JoÃ£o Pessoa', '964', 'Apto. 503', '2017-06-06 11:44:50', '2017-06-06 11:44:50'),
	(4, 'comercial@evolux.net.br', '$2a$08$MTAzMDY2NjYzMTU5MzZkMeyCsx210s.fLb17CVnhSXlOHEckbuube', 'Evolux Sistemas Ltda - EPP', 'tlm', '59056-240', 'Rua Coronel Luiz Julio', 'Lagoa Nova', 'Natal', '2018', '', '2017-06-06 13:03:16', '2017-06-06 13:03:16');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
