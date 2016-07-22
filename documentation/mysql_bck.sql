-- MySQL dump 10.13  Distrib 5.7.13, for Linux (x86_64)
--
-- Host: localhost    Database: cadastro_escolar
-- ------------------------------------------------------
-- Server version	5.7.13-0ubuntu0.16.04.2

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
-- Table structure for table `disciplinas`
--

DROP TABLE IF EXISTS `disciplinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplinas` (
  `nome` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplinas`
--

LOCK TABLES `disciplinas` WRITE;
/*!40000 ALTER TABLE `disciplinas` DISABLE KEYS */;
INSERT INTO `disciplinas` VALUES ('Matemática'),('Português');
/*!40000 ALTER TABLE `disciplinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professores`
--

DROP TABLE IF EXISTS `professores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professores` (
  `cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idade` int(11) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professores`
--

LOCK TABLES `professores` WRITE;
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` VALUES ('13616513165','João Teste',11),('22222222222','João Brugas',28),('33333333333','Teste 1',22),('44444444444','Teste 2',55);
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professores_disciplinas`
--

DROP TABLE IF EXISTS `professores_disciplinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professores_disciplinas` (
  `professor_cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `disciplina_nome` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`professor_cpf`,`disciplina_nome`),
  KEY `disciplina_nome` (`disciplina_nome`),
  CONSTRAINT `professores_disciplinas_ibfk_1` FOREIGN KEY (`professor_cpf`) REFERENCES `professores` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `professores_disciplinas_ibfk_2` FOREIGN KEY (`disciplina_nome`) REFERENCES `disciplinas` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professores_disciplinas`
--

LOCK TABLES `professores_disciplinas` WRITE;
/*!40000 ALTER TABLE `professores_disciplinas` DISABLE KEYS */;
INSERT INTO `professores_disciplinas` VALUES ('22222222222','Matemática'),('33333333333','Matemática'),('13616513165','Português'),('44444444444','Português');
/*!40000 ALTER TABLE `professores_disciplinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professores_turmas`
--

DROP TABLE IF EXISTS `professores_turmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professores_turmas` (
  `professor_cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `turma_nome` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`professor_cpf`,`turma_nome`),
  KEY `turma_nome` (`turma_nome`),
  CONSTRAINT `professores_turmas_ibfk_1` FOREIGN KEY (`professor_cpf`) REFERENCES `professores` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `professores_turmas_ibfk_2` FOREIGN KEY (`turma_nome`) REFERENCES `turmas` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professores_turmas`
--

LOCK TABLES `professores_turmas` WRITE;
/*!40000 ALTER TABLE `professores_turmas` DISABLE KEYS */;
INSERT INTO `professores_turmas` VALUES ('13616513165','IN114'),('22222222222','IN114'),('33333333333','IN114'),('44444444444','MA420');
/*!40000 ALTER TABLE `professores_turmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provas`
--

DROP TABLE IF EXISTS `provas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `disciplina_nome` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`professor_cpf`),
  KEY `disciplina_nome` (`disciplina_nome`),
  KEY `professor_cpf` (`professor_cpf`),
  CONSTRAINT `provas_ibfk_1` FOREIGN KEY (`professor_cpf`) REFERENCES `professores` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `provas_ibfk_2` FOREIGN KEY (`disciplina_nome`) REFERENCES `disciplinas` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provas`
--

LOCK TABLES `provas` WRITE;
/*!40000 ALTER TABLE `provas` DISABLE KEYS */;
/*!40000 ALTER TABLE `provas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provas_questoes`
--

DROP TABLE IF EXISTS `provas_questoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provas_questoes` (
  `prova_id` int(11) NOT NULL,
  `questao_nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`prova_id`,`questao_nome`),
  KEY `provas_questoes_ibfk_1_idx` (`questao_nome`),
  CONSTRAINT `provas_questoes_ibfk_1` FOREIGN KEY (`questao_nome`) REFERENCES `questoes` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `provas_questoes_ibfk_2` FOREIGN KEY (`prova_id`) REFERENCES `provas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provas_questoes`
--

LOCK TABLES `provas_questoes` WRITE;
/*!40000 ALTER TABLE `provas_questoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `provas_questoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questoes`
--

DROP TABLE IF EXISTS `questoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questoes` (
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `disciplina_nome` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `corpo` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`nome`),
  KEY `disciplina_nome` (`disciplina_nome`),
  CONSTRAINT `questoes_ibfk_1` FOREIGN KEY (`disciplina_nome`) REFERENCES `disciplinas` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questoes`
--

LOCK TABLES `questoes` WRITE;
/*!40000 ALTER TABLE `questoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `questoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turmas`
--

DROP TABLE IF EXISTS `turmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turmas` (
  `nome` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turmas`
--

LOCK TABLES `turmas` WRITE;
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` VALUES ('IN114'),('MA420');
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-22 16:15:03
