-- MySQL dump 10.13  Distrib 5.7.36, for Win64 (x86_64)
--
-- Host: localhost    Database: rh_admon
-- ------------------------------------------------------
-- Server version	5.7.36

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
-- Table structure for table `_position`
--

DROP TABLE IF EXISTS `_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_position` (
  `positionId` int(11) NOT NULL AUTO_INCREMENT,
  `positionName` varchar(100) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`positionId`),
  KEY `fk_sectionId` (`sectionId`),
  CONSTRAINT `fk_sectionId` FOREIGN KEY (`sectionId`) REFERENCES `section` (`sectionId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_position`
--

LOCK TABLES `_position` WRITE;
/*!40000 ALTER TABLE `_position` DISABLE KEYS */;
INSERT INTO `_position` VALUES (1,'Analista programador',2,'2024-01-16 11:35:44','2024-01-16 11:35:44');
/*!40000 ALTER TABLE `_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `activityId` int(11) NOT NULL AUTO_INCREMENT,
  `activityName` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`activityId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `areaId` int(11) NOT NULL AUTO_INCREMENT,
  `areaName` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`areaId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Administración','2024-01-05 12:44:00','2024-01-05 12:44:00'),(2,'Comercial','2024-01-05 12:44:00','2024-01-05 12:44:00'),(3,'Operaciones','2024-01-05 12:44:00','2024-01-05 12:44:00'),(4,'Prueba','2024-01-05 13:04:36','2024-01-05 13:04:36');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authorization`
--

DROP TABLE IF EXISTS `authorization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authorization` (
  `authorizationId` int(11) NOT NULL AUTO_INCREMENT,
  `authorizationName` varchar(100) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`authorizationId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authorization`
--

LOCK TABLES `authorization` WRITE;
/*!40000 ALTER TABLE `authorization` DISABLE KEYS */;
INSERT INTO `authorization` VALUES (1,'Indicadores','2024-01-12 15:29:42','2024-01-12 15:29:42'),(2,'Reglas de bono','2024-01-12 15:29:42','2024-01-12 15:29:42'),(3,'Empleados','2024-01-12 15:29:42','2024-01-12 15:29:42'),(4,'Scorecard mensual','2024-01-12 15:29:42','2024-01-12 15:29:42'),(5,'Pagos','2024-01-12 15:29:42','2024-01-12 15:29:42'),(6,'Objetivos','2024-01-12 15:29:42','2024-01-12 15:29:42'),(8,'Prueba','2024-01-19 10:28:02','2024-01-19 10:28:02'),(9,'Prueba','2024-01-19 11:43:48','2024-01-19 11:43:48');
/*!40000 ALTER TABLE `authorization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bonusrule`
--

DROP TABLE IF EXISTS `bonusrule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bonusrule` (
  `bonusRuleId` int(11) NOT NULL AUTO_INCREMENT,
  `minPer` varchar(100) NOT NULL,
  `maxPer` varchar(100) NOT NULL,
  `bonusPer` varchar(100) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bonusRuleId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bonusrule`
--

LOCK TABLES `bonusrule` WRITE;
/*!40000 ALTER TABLE `bonusrule` DISABLE KEYS */;
INSERT INTO `bonusrule` VALUES (1,'40','80','50','2024-01-19 16:40:20','2024-01-19 16:40:20'),(2,'45','80','50','2024-01-19 16:50:51','2024-01-19 16:51:34');
/*!40000 ALTER TABLE `bonusrule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicator`
--

DROP TABLE IF EXISTS `indicator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicator` (
  `indicatorId` int(11) NOT NULL AUTO_INCREMENT,
  `indicatorName` varchar(100) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`indicatorId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicator`
--

LOCK TABLES `indicator` WRITE;
/*!40000 ALTER TABLE `indicator` DISABLE KEYS */;
INSERT INTO `indicator` VALUES (1,'VENTA TOTAL GRUPO $','','2024-01-19 16:01:56','2024-01-19 16:01:56'),(2,'UTILIDAD BRUTA %','','2024-01-19 16:16:03','2024-01-19 16:16:03');
/*!40000 ALTER TABLE `indicator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicatorbonusrule`
--

DROP TABLE IF EXISTS `indicatorbonusrule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicatorbonusrule` (
  `indicatorBonusRuleId` int(11) NOT NULL AUTO_INCREMENT,
  `indicatorId` int(11) NOT NULL,
  `bonusRuleId` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`indicatorBonusRuleId`),
  KEY `fk_indicatorId` (`indicatorId`),
  KEY `fk_bonusRuleId` (`bonusRuleId`),
  CONSTRAINT `fk_bonusRuleId` FOREIGN KEY (`bonusRuleId`) REFERENCES `bonusrule` (`bonusRuleId`),
  CONSTRAINT `fk_indicatorId` FOREIGN KEY (`indicatorId`) REFERENCES `indicator` (`indicatorId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicatorbonusrule`
--

LOCK TABLES `indicatorbonusrule` WRITE;
/*!40000 ALTER TABLE `indicatorbonusrule` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicatorbonusrule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `level` (
  `levelId` int(11) NOT NULL,
  `levelName` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`levelId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `level`
--

LOCK TABLES `level` WRITE;
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` VALUES (0,'Administrador','2024-01-05 17:06:01','2024-01-05 17:06:01'),(1,'Director','2024-01-05 17:06:01','2024-01-05 17:06:01'),(2,'Gerente','2024-01-05 17:06:01','2024-01-05 17:06:01'),(3,'Lider','2024-01-05 17:06:01','2024-01-05 17:06:01'),(4,'Staff','2024-01-05 17:06:01','2024-01-05 17:06:01');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `result` (
  `resultId` int(11) NOT NULL AUTO_INCREMENT,
  `userActivityId` int(11) NOT NULL,
  `resJan` varchar(100) DEFAULT NULL,
  `resFeb` varchar(100) DEFAULT NULL,
  `resMar` varchar(100) DEFAULT NULL,
  `resApr` varchar(100) DEFAULT NULL,
  `resMay` varchar(100) DEFAULT NULL,
  `resJun` varchar(100) DEFAULT NULL,
  `resJul` varchar(100) DEFAULT NULL,
  `resAgo` varchar(100) DEFAULT NULL,
  `resSep` varchar(100) DEFAULT NULL,
  `resOct` varchar(100) DEFAULT NULL,
  `resNov` varchar(100) DEFAULT NULL,
  `resDic` varchar(100) DEFAULT NULL,
  `resYear` varchar(100) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`resultId`),
  KEY `fk_userActivityId` (`userActivityId`),
  CONSTRAINT `fk_userActivityId` FOREIGN KEY (`userActivityId`) REFERENCES `useractivity` (`userActivityId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result`
--

LOCK TABLES `result` WRITE;
/*!40000 ALTER TABLE `result` DISABLE KEYS */;
/*!40000 ALTER TABLE `result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `sectionId` int(11) NOT NULL AUTO_INCREMENT,
  `areaId` int(11) NOT NULL,
  `sectionName` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sectionId`),
  KEY `fk_areaId` (`areaId`),
  CONSTRAINT `fk_areaId` FOREIGN KEY (`areaId`) REFERENCES `area` (`areaId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (1,4,'Depto de prueba','2024-01-05 12:45:49','2024-01-05 15:55:51'),(2,1,'Sistemas','2024-01-16 11:33:12','2024-01-16 11:33:12');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useractivity`
--

DROP TABLE IF EXISTS `useractivity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `useractivity` (
  `userActivityId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `activityId` int(11) NOT NULL,
  `lowVal` varchar(100) NOT NULL DEFAULT '70',
  `medVal` varchar(100) NOT NULL DEFAULT '90',
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userActivityId`),
  KEY `fk_userId` (`userId`),
  KEY `fk_activityId` (`activityId`),
  CONSTRAINT `fk_activityId` FOREIGN KEY (`activityId`) REFERENCES `activity` (`activityId`),
  CONSTRAINT `fk_userId` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useractivity`
--

LOCK TABLES `useractivity` WRITE;
/*!40000 ALTER TABLE `useractivity` DISABLE KEYS */;
/*!40000 ALTER TABLE `useractivity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userauthorization`
--

DROP TABLE IF EXISTS `userauthorization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userauthorization` (
  `userAuthorizationId` int(11) NOT NULL AUTO_INCREMENT,
  `authorizationId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userAuthorizationId`),
  UNIQUE KEY `u_authorizationId_userId` (`authorizationId`,`userId`),
  KEY `fk_userId2` (`userId`),
  CONSTRAINT `fk_authorizationId` FOREIGN KEY (`authorizationId`) REFERENCES `authorization` (`authorizationId`),
  CONSTRAINT `fk_userId2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userauthorization`
--

LOCK TABLES `userauthorization` WRITE;
/*!40000 ALTER TABLE `userauthorization` DISABLE KEYS */;
INSERT INTO `userauthorization` VALUES (1,3,2,'2024-01-19 10:47:19','2024-01-19 10:47:19'),(3,4,6,'2024-01-19 11:46:36','2024-01-19 11:46:36');
/*!40000 ALTER TABLE `userauthorization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userindicator`
--

DROP TABLE IF EXISTS `userindicator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userindicator` (
  `userIndicatorId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `indicatorId` int(11) NOT NULL,
  `paymentPer` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userIndicatorId`),
  KEY `fk_userId` (`userId`),
  KEY `fk_indicatorId` (`indicatorId`),
  CONSTRAINT `userindicator_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  CONSTRAINT `userindicator_ibfk_2` FOREIGN KEY (`indicatorId`) REFERENCES `indicator` (`indicatorId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userindicator`
--

LOCK TABLES `userindicator` WRITE;
/*!40000 ALTER TABLE `userindicator` DISABLE KEYS */;
/*!40000 ALTER TABLE `userindicator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `levelId` int(11) NOT NULL,
  `empNum` varchar(100) NOT NULL,
  `positionId` int(11) NOT NULL,
  `paymentVar` decimal(19,2) DEFAULT '0.00',
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `recDate` datetime NOT NULL,
  `isRestricted` tinyint(4) NOT NULL DEFAULT '0',
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`),
  KEY `fk_positionId` (`positionId`),
  KEY `fk_levelId` (`levelId`),
  CONSTRAINT `fk_levelId` FOREIGN KEY (`levelId`) REFERENCES `level` (`levelId`),
  CONSTRAINT `fk_positionId` FOREIGN KEY (`positionId`) REFERENCES `_position` (`positionId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Roberto Reyes','aux2.sistemas@empacados.com','$2y$04$dLjfxJc9CZu6MYgZPMUxwOxWd0fGerC3g5SEN2Zw8mhZvsI9DoLPm',4,'411203',1,995.50,1,'2022-09-01 00:00:00',0,'2024-01-16 16:04:11','2024-01-18 16:46:32'),(2,'Eren Jaeger','aux2.sistemas@empacados.com','$2y$04$U8hOBMnsUhGzGkRrXLIIOOpiCOGXW4ugQbT4jKy65xxImatU8Icu2',4,'411204',1,1000.00,1,'2023-11-01 00:00:00',0,'2024-01-17 15:55:21','2024-01-17 15:55:21'),(3,'Mikasa Ackerman','aux2.sistemas@empacados.com','$2y$04$oqOSgpIqo5nTeTAAPunhyeY90nlYB6sNKocykm1xkUU8Iyk5dHBq2',4,'411205',1,1000.00,1,'2023-11-02 00:00:00',0,'2024-01-17 16:12:07','2024-01-17 16:12:07'),(4,'Armin Arlert','aux2.sistemas@empacados.com','$2y$04$o9ogaiBuATf/dgs7kuCK4.B0torHqTFv0umPq1rxT1Mb10XEz28H2',4,'411206',1,993.50,1,'2023-11-06 00:00:00',0,'2024-01-17 16:14:36','2024-01-18 17:45:32'),(5,'Sasha Braus','aux2.sistemas@empacados.com','$2y$04$ktsgpxhYQYzYMYWTiOcSAOL6bXX5.lAx6VEh8mu36nPJ5LzPNqVXG',4,'411207',1,1000.00,1,'2023-11-04 00:00:00',0,'2024-01-17 16:21:03','2024-01-17 16:21:03'),(6,'Connie Springer','aux2.sistemas@empacados.com','$2y$04$Xlh9nJhFuCPjYKfGk4.sG.oMzDAoL27M8F4AJllyfTGnG0P/zt4UC',4,'411208',1,1040.00,1,'2023-11-05 00:00:00',0,'2024-01-17 16:23:42','2024-01-18 17:03:01'),(7,'Kimberly White','aux2.sistemas@empacados.com','$2y$04$LFgZrhiAqZieYp1cURmXpeC4X76F6LkYwFfuHEx7Hzj6YRoJ/BLse',4,'411209',1,960.00,1,'2023-11-06 00:00:00',0,'2024-01-18 17:07:04','2024-01-18 17:07:04'),(8,'Jean Kirstein','aux2.sistemas@empacados.com','$2y$04$dLjfxJc9CZu6MYgZPMUxwOxWd0fGerC3g5SEN2Zw8mhZvsI9DoLPm',4,'411210',1,950.00,1,'2023-11-08 00:00:00',0,'2024-01-18 17:23:35','2024-01-18 17:23:35'),(10,'Levi Ackerman','aux2.sistemas@empacados.com','$2y$04$Yvj88QkqVkFRuBjnOzVIcOcx58PS.Ega0NCD8guTqE/D31hSy54Wy',4,'411211',1,970.00,1,'2023-11-06 00:00:00',0,'2024-01-18 17:41:46','2024-01-18 17:41:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valuepermonth`
--

DROP TABLE IF EXISTS `valuepermonth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valuepermonth` (
  `valuePerMonth` int(11) NOT NULL AUTO_INCREMENT,
  `indicatorId` int(11) NOT NULL,
  `realValue` varchar(100) NOT NULL,
  `targetValue` varchar(100) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `valueTypeId` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`valuePerMonth`),
  KEY `fk_indicatorId` (`indicatorId`),
  KEY `fk_valueTypeId` (`valueTypeId`),
  CONSTRAINT `fk_valueTypeId` FOREIGN KEY (`valueTypeId`) REFERENCES `valuetype` (`valueTypeId`),
  CONSTRAINT `valuepermonth_ibfk_1` FOREIGN KEY (`indicatorId`) REFERENCES `indicator` (`indicatorId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valuepermonth`
--

LOCK TABLES `valuepermonth` WRITE;
/*!40000 ALTER TABLE `valuepermonth` DISABLE KEYS */;
INSERT INTO `valuepermonth` VALUES (1,1,'56800521','60000000',1,2024,3,'2024-01-19 16:01:56','2024-01-19 16:01:56'),(2,2,'32228081','25590791',1,2024,3,'2024-01-19 16:16:03','2024-01-19 16:16:03');
/*!40000 ALTER TABLE `valuepermonth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valuetype`
--

DROP TABLE IF EXISTS `valuetype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valuetype` (
  `valueTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `valueTypeName` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`valueTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valuetype`
--

LOCK TABLES `valuetype` WRITE;
/*!40000 ALTER TABLE `valuetype` DISABLE KEYS */;
INSERT INTO `valuetype` VALUES (1,'Numerico','2024-01-19 15:51:29','2024-01-19 15:51:29'),(2,'Porcentaje','2024-01-19 15:51:38','2024-01-19 15:51:38'),(3,'Moneda','2024-01-19 15:58:48','2024-01-19 15:58:48');
/*!40000 ALTER TABLE `valuetype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'rh_admon'
--
/*!50003 DROP PROCEDURE IF EXISTS `insert_authorization` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_authorization`(
	in authorization_name varchar(100)
)
BEGIN 
	INSERT INTO authorization (authorizationName) values (authorization_name);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_bonus_rule` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_bonus_rule`(
	in min_per varchar(100),
    in max_per varchar(100),
    in bonus_per varchar(100)
)
BEGIN 
	-- la letra T en los campos de los valores indica: si es todo lo minimo, todo lo maximo y si es proporcional el porcentaje
	insert into bonusrule (minPer, maxPer, bonusPer) values (min_per, max_per, bonus_per);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_indicator_per_month` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_indicator_per_month`(
	in indicator_name varchar(100),
    in comments_ varchar(255),
    in value_type_id int(11),
    in real_value varchar(100),
    in target_value varchar(100),
    out ind_last_id int(11),
    out vpm_last_id int(11)
)
BEGIN 
	insert into indicator (indicatorName, comments) values (indicator_name, comments_);
    
    SET ind_last_id = LAST_INSERT_ID();
    
    insert into valuepermonth (indicatorId, realValue, targetValue, month, year, valueTypeId) 
    values (ind_last_id, real_value, target_value, MONTH(CURRENT_DATE()), YEAR(CURRENT_DATE()), value_type_id);
    
    SET vpm_last_id = LAST_INSERT_ID();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_user`(IN full_name varchar(100),
							 IN email Varchar(100), 
                             IN _password Varchar(255), 
                             IN level_id int, 
                             IN emp_num Varchar(100), 
                             IN position_id int, 
                             IN payment_var decimal(19,2),
                             IN rec_date datetime,
                             OUT LID int(11))
BEGIN
	insert into users(fullName, email, password, levelId, empNum, positionId, paymentVar, recDate) values (full_name, email, _password, level_id, emp_num, position_id, payment_var, rec_date);

	set LID = last_insert_id();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_user_authorization` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_user_authorization`(
	in user_id int(11),
    in authorization_id int(11)
)
BEGIN 
	INSERT INTO userauthorization (userId, authorizationId) values (user_id, authorization_id);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_value_type` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_value_type`(
	in value_type_name varchar(100)
)
BEGIN 
	INSERT INTO valuetype (valueTypeName) values (value_type_name);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `select_bonus_rule` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_bonus_rule`()
BEGIN 
	select bonusRuleId as 'id',
		   minPer as 'minimo',
           maxPer as 'maximo',
           bonusPer as 'bonus'
           from bonusrule;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `select_one_bonus_rule` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_one_bonus_rule`(in bonus_rule_id int)
BEGIN 
	select bonusRuleId as 'id',
		   minPer as 'minimo',
           maxPer as 'maximo',
           bonusPer as 'bonus'
           from bonusrule
           where bonusRuleId = bonus_rule_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `select_one_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_one_user`(in user_id int)
BEGIN 
    select 
	   userId as 'usuarioId',   
       empNum as 'numEmpleado', 
	   fullName as 'nombreCompleto', 
       levelId as 'nivel',  
       recDate as 'fechaIngreso', 
       email as 'correo', 
       paymentVar as 'variable' 
	from users
    where userId = user_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `select_one_user_position` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_one_user_position`(in bonus_rule_id int)
BEGIN 
	select bonusRuleId as 'id',
		   minPer as 'minimo',
           maxPer as 'maximo',
           bonusPer as 'bonus'
           from bonusrule
           where bonusRuleId = bonus_rule_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `select_user_position` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_user_position`()
BEGIN 
    select 
	   u.userId as 'usuarioId',
	   p.positionId as 'puestoId',       
       u.empNum as 'numEmpleado', 
	   u.fullName as 'nombreCompleto', 
       u.levelId as 'nivel', 
       p.positionName as 'puesto', 
       u.recDate as 'fechaIngreso', 
       u.email as 'correo', 
       u.paymentVar as 'variable' 
	from users u inner join _position p on u.positionId=p.positionId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_bonus_rule` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_bonus_rule`(
	in bonus_rule_id int,
	in min_per varchar(100),
    in max_per varchar(100),
    in bonus_per varchar(100)
)
BEGIN 
	-- la letra T en los campos de los valores indica: si es todo lo minimo, todo lo maximo y si es proporcional el porcentaje
	UPDATE bonusrule SET minPer = min_per, maxPer = max_per, bonusPer = bonus_per WHERE bonusRuleId = bonus_rule_id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_user`(
    IN user_id INT,
    IN full_name VARCHAR(100),
    IN email VARCHAR(100),
    IN level_id INT,
    IN emp_num VARCHAR(100),
    IN position_id INT,
    IN payment_var DECIMAL(19,2),
    IN rec_date DATETIME
)
BEGIN 
    UPDATE users SET fullName = full_name, email = email, levelId = level_id, empNum = emp_num, positionId = position_id, paymentVar = payment_var, recDate = rec_date WHERE userId = user_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_user_pass` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_user_pass`(
    IN user_id INT,
	IN _password VARCHAR(255)
)
BEGIN 
    UPDATE users SET password = _password WHERE userId = user_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_user_var` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_user_var`(
    IN user_id INT,
	IN payment_var DECIMAL(19,2)
)
BEGIN 
    UPDATE users SET paymentVar = payment_var WHERE userId = user_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-19 18:23:35
