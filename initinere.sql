-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: initinere
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

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
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itinerario`
--

DROP TABLE IF EXISTS `itinerario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itinerario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origen_id` int(11) DEFAULT NULL,
  `destino_id` int(11) DEFAULT NULL,
  `horasalida` time NOT NULL,
  `horavuelta` time NOT NULL,
  `diasemana` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_11ECF40493529ECD` (`origen_id`),
  KEY `IDX_11ECF404E4360615` (`destino_id`),
  CONSTRAINT `FK_11ECF40493529ECD` FOREIGN KEY (`origen_id`) REFERENCES `ciudad` (`id`),
  CONSTRAINT `FK_11ECF404E4360615` FOREIGN KEY (`destino_id`) REFERENCES `ciudad` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itinerario`
--

LOCK TABLES `itinerario` WRITE;
/*!40000 ALTER TABLE `itinerario` DISABLE KEYS */;
/*!40000 ALTER TABLE `itinerario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itinerario_puntosintermedios`
--

DROP TABLE IF EXISTS `itinerario_puntosintermedios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itinerario_puntosintermedios` (
  `itinerario_id` int(11) NOT NULL,
  `puntosintermedios_id` int(11) NOT NULL,
  PRIMARY KEY (`itinerario_id`,`puntosintermedios_id`),
  KEY `IDX_EC109A1EB824E717` (`itinerario_id`),
  KEY `IDX_EC109A1E73A3FB63` (`puntosintermedios_id`),
  CONSTRAINT `FK_EC109A1E73A3FB63` FOREIGN KEY (`puntosintermedios_id`) REFERENCES `puntosintermedios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_EC109A1EB824E717` FOREIGN KEY (`itinerario_id`) REFERENCES `itinerario` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itinerario_puntosintermedios`
--

LOCK TABLES `itinerario_puntosintermedios` WRITE;
/*!40000 ALTER TABLE `itinerario_puntosintermedios` DISABLE KEYS */;
/*!40000 ALTER TABLE `itinerario_puntosintermedios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puntosintermedios`
--

DROP TABLE IF EXISTS `puntosintermedios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puntosintermedios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puntosintermedios`
--

LOCK TABLES `puntosintermedios` WRITE;
/*!40000 ALTER TABLE `puntosintermedios` DISABLE KEYS */;
/*!40000 ALTER TABLE `puntosintermedios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puntosintermedios_ciudad`
--

DROP TABLE IF EXISTS `puntosintermedios_ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puntosintermedios_ciudad` (
  `puntosintermedios_id` int(11) NOT NULL,
  `ciudad_id` int(11) NOT NULL,
  PRIMARY KEY (`puntosintermedios_id`,`ciudad_id`),
  KEY `IDX_816DFF4E73A3FB63` (`puntosintermedios_id`),
  KEY `IDX_816DFF4EE8608214` (`ciudad_id`),
  CONSTRAINT `FK_816DFF4E73A3FB63` FOREIGN KEY (`puntosintermedios_id`) REFERENCES `puntosintermedios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_816DFF4EE8608214` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudad` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puntosintermedios_ciudad`
--

LOCK TABLES `puntosintermedios_ciudad` WRITE;
/*!40000 ALTER TABLE `puntosintermedios_ciudad` DISABLE KEYS */;
/*!40000 ALTER TABLE `puntosintermedios_ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehiculo_id` int(11) DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contraseña` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2265B05D25F7D575` (`vehiculo_id`),
  CONSTRAINT `FK_2265B05D25F7D575` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_itinerario`
--

DROP TABLE IF EXISTS `usuario_itinerario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_itinerario` (
  `usuario_id` int(11) NOT NULL,
  `itinerario_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`itinerario_id`),
  KEY `IDX_E2DCBEA6DB38439E` (`usuario_id`),
  KEY `IDX_E2DCBEA6B824E717` (`itinerario_id`),
  CONSTRAINT `FK_E2DCBEA6B824E717` FOREIGN KEY (`itinerario_id`) REFERENCES `itinerario` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_E2DCBEA6DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_itinerario`
--

LOCK TABLES `usuario_itinerario` WRITE;
/*!40000 ALTER TABLE `usuario_itinerario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_itinerario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numplazas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-18 10:14:43
