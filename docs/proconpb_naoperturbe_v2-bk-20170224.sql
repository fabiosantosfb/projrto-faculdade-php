CREATE DATABASE  IF NOT EXISTS `proconpb_naoperturbe_v2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `proconpb_naoperturbe_v2`;
-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: proconpb_naoperturbe_v2
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
-- Table structure for table `pessoa_fisica`
--

DROP TABLE IF EXISTS `pessoa_fisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_fisica` (
  `usuario_id_usuario` int(11) NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `rg` varchar(10) CHARACTER SET utf8 NOT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `data_expedicao` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `orgao_expedidor` varchar(10) CHARACTER SET utf8 NOT NULL,
  UNIQUE KEY `usuario_id_usuario_UNIQUE` (`usuario_id_usuario`),
  CONSTRAINT `fk_pessoa_fisica_1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_fisica`
--

LOCK TABLES `pessoa_fisica` WRITE;
/*!40000 ALTER TABLE `pessoa_fisica` DISABLE KEYS */;
INSERT INTO `pessoa_fisica` VALUES (11,'111.111.111-21','1.111.101','pb','ssp','01/12/97');
/*!40000 ALTER TABLE `pessoa_fisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa_juridica`
--

DROP TABLE IF EXISTS `pessoa_juridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_juridica` (
  `usuario_id_usuario` int(11) NOT NULL,
  `cnpj` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `status_telemarketing` int(1) NOT NULL,
  UNIQUE KEY `usuario_id_usuario_UNIQUE` (`usuario_id_usuario`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`),
  CONSTRAINT `fk_pessoa_juridica_1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_juridica`
--

LOCK TABLES `pessoa_juridica` WRITE;
/*!40000 ALTER TABLE `pessoa_juridica` DISABLE KEYS */;
INSERT INTO `pessoa_juridica` VALUES (10,'42.318.949/0001-84',0),(12,'42.318.949/0001-81',0),(15,'42.318.949/0001-88',0);
/*!40000 ALTER TABLE `pessoa_juridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefone`
--

DROP TABLE IF EXISTS `telefone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefone` (
  `id_telefone` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id_usuario` int(11) NOT NULL,
  `status_bloqueio` int(1) NOT NULL,
  `telefone_numero` varchar(14) CHARACTER SET utf8 NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_telefone`),
  UNIQUE KEY `telefone_numero_UNIQUE` (`telefone_numero`),
  UNIQUE KEY `id_telefone_UNIQUE` (`id_telefone`),
  KEY `fk_telefone_1_idx` (`usuario_id_usuario`),
  CONSTRAINT `fk_telefone_1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefone`
--

LOCK TABLES `telefone` WRITE;
/*!40000 ALTER TABLE `telefone` DISABLE KEYS */;
INSERT INTO `telefone` VALUES (4,10,0,'(00)11111-1113','2017-02-24 12:55:35','2017-02-24 12:58:52'),(5,11,0,'(00)11111-1111','2017-02-24 12:57:18','2017-02-24 12:57:18'),(6,10,0,'(00)11111-1112','2017-02-24 13:08:27','2017-02-24 13:08:27'),(7,12,0,'(00)11111-3311','2017-02-24 13:10:31','2017-02-24 13:11:40'),(10,12,0,'(00)11111-3333','2017-02-24 13:12:15','2017-02-24 13:12:15'),(11,15,0,'(00)11111-1181','2017-02-24 13:22:07','2017-02-24 13:22:54'),(12,15,0,'(00)11111-1188','2017-02-24 13:23:13','2017-02-24 13:23:13');
/*!40000 ALTER TABLE `telefone` ENABLE KEYS */;
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
  `senha` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nome` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(6) CHARACTER SET utf8 NOT NULL,
  `cep` varchar(10) CHARACTER SET utf8 NOT NULL,
  `rua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cidade` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (10,'pj1@pj.com','$2a$08$MTI0Mjg0MTA0MTU4YjA1NuSIwvHRUgQ4zDySLUNbJFRYPZWoTO4IO','teste 1 pj','pj','12345-111','minha rua','bairro','cidade','','','2017-02-24 12:55:35','2017-02-24 12:55:35'),(11,'pf1@pf.com','$2a$08$MTQzODcwOTMxMDU4YjA1NuPUQrcfNltyRBWv0rbbKQBF0/rKRNhJS','teste 1 pf','pf','12345-111','minha rua','bairro','cidade','','','2017-02-24 12:57:18','2017-02-24 12:57:18'),(12,'pj2@pj.com','$2a$08$MjA0MzU1ODI5NjU4YjA1YOxfcAhiupqLC0mLIqsNRd6BOL0U3eFfW','teste 2 pj','pj','12345-678','minha rua','bairro','cidade','','','2017-02-24 13:10:30','2017-02-24 13:10:30'),(15,'pj9@pj.com','$2a$08$NjYyNjI5MjYxNThiMDVkYOcu49I33uiTdy0KDX21GbDw6yMG56mTi','teste 3 pj','pj','12345-111','minha rua','bairro','cidade','','','2017-02-24 13:22:07','2017-02-24 13:22:07');
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

-- Dump completed on 2017-02-24 13:52:10