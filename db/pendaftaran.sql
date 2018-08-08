-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: pendaftaran
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

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
-- Table structure for table `lembaga`
--

DROP TABLE IF EXISTS `lembaga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lembaga` (
  `id_lembaga` int(10) NOT NULL AUTO_INCREMENT,
  `id_peserta` int(10) NOT NULL,
  `sekema_lembaga` varchar(50) NOT NULL,
  `tempatuji_lembaga` varchar(50) NOT NULL,
  `tanggalterbit_lembaga` date NOT NULL,
  PRIMARY KEY (`id_lembaga`),
  KEY `id_peserta` (`id_peserta`),
  CONSTRAINT `lembaga_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lembaga`
--

LOCK TABLES `lembaga` WRITE;
/*!40000 ALTER TABLE `lembaga` DISABLE KEYS */;
INSERT INTO `lembaga` (`id_lembaga`, `id_peserta`, `sekema_lembaga`, `tempatuji_lembaga`, `tanggalterbit_lembaga`) VALUES (9,10,'kjfjafj','nn','2018-09-25');
/*!40000 ALTER TABLE `lembaga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peserta`
--

DROP TABLE IF EXISTS `peserta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peserta` (
  `id_peserta` int(10) NOT NULL AUTO_INCREMENT,
  `nama_peserta` varchar(50) NOT NULL,
  `nik_peserta` int(16) NOT NULL,
  `nohp_peserta` int(13) NOT NULL,
  `tanggallahir_peserta` date NOT NULL,
  `oraganisasi_peserta` varchar(50) NOT NULL,
  `email_peserta` varchar(50) NOT NULL,
  `rekomendasi_peserta` varchar(50) NOT NULL,
  PRIMARY KEY (`id_peserta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peserta`
--

LOCK TABLES `peserta` WRITE;
/*!40000 ALTER TABLE `peserta` DISABLE KEYS */;
INSERT INTO `peserta` (`id_peserta`, `nama_peserta`, `nik_peserta`, `nohp_peserta`, `tanggallahir_peserta`, `oraganisasi_peserta`, `email_peserta`, `rekomendasi_peserta`) VALUES (10,'Pras',9999999,2147483647,'1970-01-01','nnn','afsaf','Jambi');
/*!40000 ALTER TABLE `peserta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-08  9:55:09
