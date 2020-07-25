-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: treeViewSymfony
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20200725081548','2020-07-25 10:16:00',3439);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tree_entry`
--

DROP TABLE IF EXISTS `tree_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tree_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9323BB15727ACA70` (`parent_id`),
  CONSTRAINT `FK_9323BB15727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `tree_entry` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tree_entry`
--

LOCK TABLES `tree_entry` WRITE;
/*!40000 ALTER TABLE `tree_entry` DISABLE KEYS */;
INSERT INTO `tree_entry` VALUES (1,NULL),(2,NULL),(3,NULL),(9,1),(10,1),(14,2),(13,3),(7,5),(8,5),(18,5),(4,9),(5,9),(6,9),(11,10),(12,11),(15,13),(17,13),(19,13);
/*!40000 ALTER TABLE `tree_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tree_entry_lang`
--

DROP TABLE IF EXISTS `tree_entry_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tree_entry_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) DEFAULT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6E380470BA364942` (`entry_id`),
  CONSTRAINT `FK_6E380470BA364942` FOREIGN KEY (`entry_id`) REFERENCES `tree_entry` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tree_entry_lang`
--

LOCK TABLES `tree_entry_lang` WRITE;
/*!40000 ALTER TABLE `tree_entry_lang` DISABLE KEYS */;
INSERT INTO `tree_entry_lang` VALUES (1,1,'eng','Prio 1 Tasks'),(2,2,'eng','Prio 2 Tasks'),(3,3,'eng','Prio 3 Tasks'),(4,1,'ger','Prio 1 Aufgaben'),(5,2,'ger','Prio 2 Aufgaben'),(6,3,'ger','Prio 3 Aufgaben'),(7,4,'ger','Punkt ABC123'),(8,5,'ger','Punkt BCD123'),(9,6,'ger','Punkt UARGH123'),(10,4,'eng','Point ABC123'),(11,5,'eng','Point BCD123'),(12,6,'eng','Point UARGH123'),(13,7,'eng','Task 22222'),(14,8,'eng','Task 566'),(15,9,'eng','Supplier'),(16,10,'eng','Customer'),(17,11,'eng','204. Task'),(18,12,'eng','209. Task'),(19,13,'eng','123. Task'),(20,14,'eng','asdasd. Task'),(21,15,'eng','nomnom. Task'),(22,19,'eng','mimimi. Task'),(23,17,'eng','Gedöns Task'),(24,18,'eng','ZOMG Task');
/*!40000 ALTER TABLE `tree_entry_lang` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-25 17:16:48
