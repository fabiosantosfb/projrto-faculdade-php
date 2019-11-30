CREATE DATABASE  IF NOT EXISTS `registro_database`;
USE `registro_database`;
-- USUARIO ROOT SENHA 123
-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: registro_database
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.16.04.1

--
-- Table structure for table `pessoa_fisica`
--

DROP TABLE IF EXISTS `pessoa_fisica`;

CREATE TABLE `pessoa_fisica` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `pessoa_juridica`
--

DROP TABLE IF EXISTS `pessoa_juridica`;

CREATE TABLE `pessoa_juridica` (
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

--
-- Table structure for table `telefone`
--

DROP TABLE IF EXISTS `telefone`;

CREATE TABLE `telefone` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

