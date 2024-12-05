-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: allodonkeycine
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `film`
--

DROP TABLE IF EXISTS `film`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `film` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(45) NOT NULL,
  `duree` time NOT NULL COMMENT 'In minutes',
  `description` text,
  `picture` varchar(255) DEFAULT NULL COMMENT 'URL to movie picture',
  `diffusion` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `film`
--

LOCK TABLES `film` WRITE;
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` VALUES (1,'Ip man','02:00:00','Un film d\'art martiaux passionant.','ip_man.jpg',0,NULL),(2,'Platoon','01:35:00','Le film sur la guerre d\'Indochinne qui à marqué les esprits..','platoon.jpg',0,NULL),(3,'Jujutsu Kaizen 0','01:50:00','Là où tout a commencé dans le lore de Jujutsu Kaisen.','Jujutsu_kaisen_zero.jpg',0,NULL),(4,'Princesse Mononoke','01:48:00','Princesse Mononoké est un film d\'animation historique et de fantasy japonais de Hayao Miyazaki, sorti le 12 juillet 1997 et produit par le studio Ghibli.','princesse_mononoke.jpg',1,NULL),(5,'Shrek','02:01:00','Shrek est un film d\'animation américain en images de synthèse réalisé par Andrew Adamson et Vicky Jenson et sorti en 2001.','shrek.jpg',1,NULL),(6,'Spider Man','01:40:00','En tout cas mon Spider Man préféré.','spiderman.jpg',0,NULL),(7,'Troie','02:49:00','Troie est un film américain réalisé par Wolfgang Petersen et sorti en 2004. Il s\'agit d\'une adaptation libre et romancée des poèmes épiques du cycle troyen, singulièrement de l\'Iliade d\'Homère.','troie.jpg',0,NULL),(8,'Dragon Ball Z L\'Attaque du Dragon','02:08:00','Un des seuls OAV Dragon Ball regardé entièrement.','Dragon-Ball-Z-movie-attaque_du_dragon.jpg',0,NULL),(9,'Equilibrium','02:12:00','Equilibrium is a 2002 American science fiction film written and directed by Kurt Wimmer, and starring Christian Bale, Emily Watson, and Taye Diggs.','equilibrium.jpg',0,NULL);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-27 21:19:28
