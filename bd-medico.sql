CREATE DATABASE  IF NOT EXISTS `medico` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `medico`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: medico
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.8-MariaDB

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
-- Table structure for table `especialidade`
--

DROP TABLE IF EXISTS `especialidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidade` (
  `idEspecialidade` int(11) NOT NULL AUTO_INCREMENT,
  `nomeEspecialidade` varchar(100) NOT NULL,
  PRIMARY KEY (`idEspecialidade`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidade`
--

LOCK TABLES `especialidade` WRITE;
/*!40000 ALTER TABLE `especialidade` DISABLE KEYS */;
INSERT INTO `especialidade` VALUES (1,'CIRURGÍA VASCULAR'),(2,'CLINICA MEDICA'),(4,'ALERGOLOGIA'),(5,'ANGIOLOGIA'),(6,'BUCO MAXILO'),(8,'CARDIOLOGIA INFANTIL'),(9,'CIRURGIA CABEÇA E PESCOÇO'),(10,'CIRURGIA CARDÍACA'),(11,'CIRURGIA DE CABEÇA/PESCOÇO'),(12,'CIRURGIA DE TORAX'),(13,'CIRURGIA GERAL'),(14,'CIRURGIA PEDIÁTRICA'),(15,'CIRURGIA PLÁSTICA'),(16,'CIRURGIA TORÁCICA');
/*!40000 ALTER TABLE `especialidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medico` (
  `idMedico` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `crm` varchar(100) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `especialidade1` int(11) NOT NULL,
  `especialidade2` int(11) NOT NULL,
  PRIMARY KEY (`idMedico`),
  KEY `esp1_idx` (`especialidade1`),
  KEY `esp2_idx` (`especialidade2`),
  CONSTRAINT `esp1` FOREIGN KEY (`especialidade1`) REFERENCES `especialidade` (`idEspecialidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `esp2` FOREIGN KEY (`especialidade2`) REFERENCES `especialidade` (`idEspecialidade`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico`
--

LOCK TABLES `medico` WRITE;
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
INSERT INTO `medico` VALUES (2,'Pablo Gomes','96587412','(65) 99999-1111',12,13),(8,'Marcio','789654','456321',8,10),(9,'Damián Agustín Nieva','987596636','9876541255',1,1),(10,'Roberto Silva','996655887','65132999552',6,14);
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-21 23:05:14
