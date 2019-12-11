-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: transmitter
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `txlogs`
--

DROP TABLE IF EXISTS `txlogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `txlogs` (
  `DATE` date DEFAULT NULL,
  `SITE_CODE` char(255) DEFAULT NULL,
  `CLASS` char(255) DEFAULT NULL,
  `REPORT_STATUS` char(255) DEFAULT NULL,
  `TIME_START` datetime DEFAULT NULL,
  `TIME_END` datetime DEFAULT NULL,
  `DURATION` time DEFAULT NULL,
  `DESCRIPTION` longtext,
  `TX_STATUS` char(255) DEFAULT NULL,
  `POWER_SOURCE` char(255) DEFAULT NULL,
  `DUTY_OE` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `txlogs`
--

LOCK TABLES `txlogs` WRITE;
/*!40000 ALTER TABLE `txlogs` DISABLE KEYS */;
INSERT INTO `txlogs` VALUES ('2019-06-04','MLA_23','FYI','BROADOUT',NULL,NULL,NULL,'LASD','COMM','SADAS','SDJSADJ'),('2019-06-04','MLA_23','NPO','BROADOUT','2019-12-11 01:02:48','2019-12-11 01:02:48','00:00:00','LASD','COMM','SADAS','SDJSAaDJ');
/*!40000 ALTER TABLE `txlogs` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER txlog
    BEFORE INSERT ON txlogs
    FOR EACH ROW BEGIN
    IF (NEW.CLASS = 'FYI') THEN
    SET 
	NEW.DURATION=NULL,
	NEW.TIME_START=NULL,
	NEW.TIME_END=NULL;

    ELSE
        SET NEW.DURATION = TIMEDIFF(NEW.TIME_END,NEW.TIME_START);
    END IF;
    END */;;
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

-- Dump completed on 2019-12-11  8:39:21
