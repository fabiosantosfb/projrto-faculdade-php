CREATE DATABASE  IF NOT EXISTS `proconpb_naoperturbe` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `proconpb_naoperturbe`;
-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: proconpb_naoperturbe
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `cep` varchar(9) CHARACTER SET utf8 NOT NULL,
  `rua` varchar(100) CHARACTER SET utf8 NOT NULL,
  `bairro` varchar(45) CHARACTER SET utf8 NOT NULL,
  `cidade` varchar(45) CHARACTER SET utf8 NOT NULL,
  `numero` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `complemento` tinytext CHARACTER SET utf8,
  `usuario_id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  KEY `fk_endereco_usuario1_idx` (`usuario_id_usuario`),
  CONSTRAINT `fk_endereco_1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` (`cep`, `rua`, `bairro`, `cidade`, `numero`, `complemento`, `usuario_id_usuario`) VALUES ('123456','rua1','bairro1','cidade1','1','complemento1',4),('654321','rua2','bairro2','cidade2','','',5),('123123','rua1','bairro1','cidade1','2','',6),('123456','rua2','bairro1','cidade2','','',7),('123456','rua1','bairro1','cidade1','','',8),('123456','rua1','bairro1','cidade1','','',9),('123456','rua1','bairro1','cidade1',NULL,NULL,11),('654321','leleu','bibiu','lalau','','',12),('65432-166','rua joaquim gonÃ§alves ledos','manaira','joÃ£o pessoa','986','proximo berÃ§ario shalon',13),('58027-517','rua','mandcaru','cidade','','',23),('58027-517','rua','mandcaru','cidade','','',24),('58027-517','gh','mandcaru','cidade','','',25),('60328-000','AV BEZERRA DE MENEZES','FARIAS BRITO','FORTALEZA','100','SALA 301 A 314',26),('58027-517','AV BEZERRA DE MENEZES','mandcaru','FORTALEZA','100','',27);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa_fisica`
--

DROP TABLE IF EXISTS `pessoa_fisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_fisica` (
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cpf` varchar(14) CHARACTER SET utf8 NOT NULL,
  `rg` varchar(10) CHARACTER SET utf8 NOT NULL,
  `org` varchar(5) CHARACTER SET utf8 NOT NULL,
  `uf` varchar(2) CHARACTER SET utf8 NOT NULL,
  `data_expedicao` varchar(8) CHARACTER SET utf8 NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `rg_UNIQUE` (`rg`),
  UNIQUE KEY `usuario_id_usuario_UNIQUE` (`usuario_id_usuario`),
  CONSTRAINT `fk_pessoa_fisica_1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_fisica`
--

LOCK TABLES `pessoa_fisica` WRITE;
/*!40000 ALTER TABLE `pessoa_fisica` DISABLE KEYS */;
INSERT INTO `pessoa_fisica` (`nome`, `cpf`, `rg`, `org`, `uf`, `data_expedicao`, `usuario_id_usuario`) VALUES ('fabio-teste3','012.789.556-95','1.245.554','dt','td','12/12/12',25),('Fabio santos','062.205.294-44','2.698.500','aap','BA','01/09/16',13),('Fabiano santos2','122.333.334-44','1.223.334','ssp','pb','01/09/96',12),('Fabiano','1222334445','122345661','ssp','pb','29122016',11),('fabio1','123654','123654','ssp','pb','121216',8),('fabio2','123987','123987','ssp','pb','121216',9);
/*!40000 ALTER TABLE `pessoa_fisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa_juridica`
--

DROP TABLE IF EXISTS `pessoa_juridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_juridica` (
  `nome` varchar(35) CHARACTER SET utf8 NOT NULL,
  `cnpj` varchar(18) CHARACTER SET utf8 NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`),
  UNIQUE KEY `usuario_id_usuario_UNIQUE` (`usuario_id_usuario`),
  CONSTRAINT `fk_pessoa_juridica_1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_juridica`
--

LOCK TABLES `pessoa_juridica` WRITE;
/*!40000 ALTER TABLE `pessoa_juridica` DISABLE KEYS */;
INSERT INTO `pessoa_juridica` (`nome`, `cnpj`, `usuario_id_usuario`) VALUES ('FORTBRASIL ADMINISTRADORA','02.732.968/0001-38',26),('fabio-teste2','12.312.312/3121-11',24),('fabio-teste','12.312.312/3123-11',23),('FABIUANO ADMINISTRADORA','12.312.312/3123-22',27),('telemarketing1','123123',6),('telemarketing2','123321',7),('pessoa juridica 1','123456',4),('pessoa juridica 2','654321',5);
/*!40000 ALTER TABLE `pessoa_juridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefone`
--

DROP TABLE IF EXISTS `telefone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefone` (
  `status_bloqueio` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `telefone_numero` varchar(45) CHARACTER SET utf8 NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `id_telefone` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_telefone`),
  UNIQUE KEY `telefone_numero_UNIQUE` (`telefone_numero`),
  UNIQUE KEY `id_telefone_UNIQUE` (`id_telefone`),
  KEY `fk_telefone_1_idx` (`usuario_id_usuario`),
  CONSTRAINT `fk_telefone_1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefone`
--

LOCK TABLES `telefone` WRITE;
/*!40000 ALTER TABLE `telefone` DISABLE KEYS */;
INSERT INTO `telefone` (`status_bloqueio`, `data_cadastro`, `data_atualizacao`, `telefone_numero`, `usuario_id_usuario`, `id_telefone`) VALUES (0,'2016-12-29 16:48:24','2017-02-01 15:34:09','(22)22266-1112',12,1),(0,'2017-01-26 16:20:47','2017-01-26 16:20:47','(77) 7112-2111',25,2),(0,'2017-01-26 16:18:17','2017-01-26 16:18:17','(77) 7772-1112',24,3),(0,'2017-01-30 13:58:55','2017-01-30 13:58:55','(77) 7772-2111',27,4),(0,'2017-01-26 16:16:18','2017-01-26 16:16:18','(77) 7772-2222',23,5),(0,'2016-12-30 09:57:04','2017-01-30 16:22:57','(83) 12121-1111',13,6),(0,'2017-02-01 11:46:52','2017-02-01 15:34:17','(83)99977-8875',12,7),(0,'2017-01-30 10:18:01','2017-01-30 10:18:01','(85) 3923-5300',26,8),(1,'2016-12-12 10:05:39','2017-01-17 09:34:18','123123',6,9),(1,'2016-12-12 10:06:46','2017-01-17 09:34:18','123321',7,10),(0,'2016-12-12 10:02:14','2016-12-12 10:02:14','123456',4,11),(0,'2016-12-12 10:10:24','2016-12-12 10:10:24','123789',8,12),(0,'2016-12-12 10:11:29','2016-12-12 10:11:29','123987',9,13),(0,'2016-12-29 16:42:28','2016-12-29 16:42:28','222266635',11,14),(0,'2016-12-12 10:03:45','2016-12-12 10:03:45','654321',5,15);
/*!40000 ALTER TABLE `telefone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telemarketing`
--

DROP TABLE IF EXISTS `telemarketing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telemarketing` (
  `status_ativo` int(11) NOT NULL,
  `pessoa_juridica_usuario_id_usuario` int(11) NOT NULL,
  KEY `fk_telemarketing_1_idx` (`pessoa_juridica_usuario_id_usuario`),
  CONSTRAINT `fk_telemarketing_1` FOREIGN KEY (`pessoa_juridica_usuario_id_usuario`) REFERENCES `pessoa_juridica` (`usuario_id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telemarketing`
--

LOCK TABLES `telemarketing` WRITE;
/*!40000 ALTER TABLE `telemarketing` DISABLE KEYS */;
INSERT INTO `telemarketing` (`status_ativo`, `pessoa_juridica_usuario_id_usuario`) VALUES (0,6),(0,7),(0,26);
/*!40000 ALTER TABLE `telemarketing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(60) CHARACTER SET utf8 NOT NULL,
  `type` varchar(6) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `email`, `senha`, `type`) VALUES (4,'fabio1@fabio.com','123','pj'),(5,'fabio2@fabio.com','123','pj'),(6,'telemarketing1@fabio.com','123','tlm'),(7,'telemarketing2@fabio.com','123','tlm'),(8,'fabio3@fabio.com','123','pf'),(9,'fabio4@fabio.com','123','pf'),(10,'admin@fabio.com','admin','admin'),(11,'fabio5@fabio.com','123','pf'),(12,'fabio6@fabio.com','123','pf'),(13,'fabio7@fabio.com','111','pf'),(14,'fabio10@fabio.com','123','pj'),(23,'fabio8@fabio.com','123','pj'),(24,'fabio9@fabio.com','123','pj'),(25,'fabio11@fabio.com','123','pf'),(26,'marcia@fortbrasil.com','marcia','pj'),(27,'gui@fabio.com','123','pj');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-02 10:59:02
