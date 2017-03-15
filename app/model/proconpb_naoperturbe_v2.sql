CREATE DATABASE  IF NOT EXISTS `proconpb_naoperturbe_v2`;
USE `proconpb_naoperturbe_v2`;

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nome` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(6) CHARACTER SET utf8 NOT NULL,
  `cep` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `pessoa_fisica`;
CREATE TABLE `pessoa_fisica` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `rg` varchar(10) CHARACTER SET utf8 NOT NULL,
  `data_expedicao` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `orgao_expedidor` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  KEY `pk_pessoa_fisica` (`id`),
  CONSTRAINT `fk_pessoa_fisica` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `pessoa_juridica`;
CREATE TABLE `pessoa_juridica` (
  `usuario_id_usuario` int(11) NOT NULL,
  `cnpj` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `status_telemarketing` int(1) NOT NULL,
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`),
  KEY `fk_pessoa_juridica_1_idx` (`usuario_id_usuario`),
  CONSTRAINT `fk_pessoa_juridica_1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `telefone`;
CREATE TABLE `telefone` (
  `id_telefone` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id_usuario` int(11) NOT NULL,
  `status_bloqueio` int(1) NOT NULL,
  `telefone_numero` varchar(15) CHARACTER SET utf8 NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_telefone`),
  UNIQUE KEY `telefone_numero_UNIQUE` (`telefone_numero`),
  UNIQUE KEY `id_telefone_UNIQUE` (`id_telefone`),
  KEY `fk_telefone_1_idx` (`usuario_id_usuario`),
  CONSTRAINT `fk_telefone_1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
