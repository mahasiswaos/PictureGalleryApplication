CREATE DATABASE  IF NOT EXISTS `picture` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `picture`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: picture
-- ------------------------------------------------------
-- Server version	5.5.37

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
-- Table structure for table `gambar`
--

DROP TABLE IF EXISTS `gambar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gambar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(45) NOT NULL,
  `tgl` date NOT NULL,
  `judul` varchar(45) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kategori` varchar(45) NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gambar_users_idx1` (`users_id`),
  KEY `fk_gambar_lokasi1_idx` (`lokasi_id`),
  CONSTRAINT `fk_gambar_lokasi1` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_gambar_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gambar`
--

LOCK TABLES `gambar` WRITE;
/*!40000 ALTER TABLE `gambar` DISABLE KEYS */;
INSERT INTO `gambar` VALUES (6,'img/Bali Island copy.jpg','2014-07-06','Bali Panorama','Pemandangan Alam di sekitaran danau di daeah Bedugul Bali.','Panorama',2,2),(8,'img/IMG_0165New.jpg','2014-07-11','Indahnya Kebersamaan','Asiknya foto-foto bareng firends di sekitaran pantai Nipah, Lombok Barat','Black & White',2,1),(9,'img/IMG_0123 copy.jpg','2014-07-15','Indahnya Sunset','Indahnya Sunset di sekitaran pantai nipah, membuat tangn ini tak henti-hentinya menekan tombol shutter untuk mengabadikan momen yg dinanti - Sunset','Sunset',1,1),(11,'img/Tree of light.jpg','2014-07-16','The Light','Cahaya indah dibalik pohon','Sunset',2,6);
/*!40000 ALTER TABLE `gambar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lokasi`
--

DROP TABLE IF EXISTS `lokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(45) DEFAULT NULL,
  `tempat` varchar(45) DEFAULT NULL,
  `kabupaten` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokasi`
--

LOCK TABLES `lokasi` WRITE;
/*!40000 ALTER TABLE `lokasi` DISABLE KEYS */;
INSERT INTO `lokasi` VALUES (1,'Pantai Nipah','Nipahe','Lombok Barat'),(2,'Pantai Senggigi','Senggigi','Lombok Barat'),(3,'Pantai Malimbu','Malimbu','Lombok Barat'),(4,'Labu Api','Labu Api','Lombok Barat'),(5,'Ampenan','Ampenan','Lombok Barat'),(6,'Pante Selong Belanak',NULL,'Lombok Tengah'),(7,'Pantai Gili Air','Gili Air','Lombok Utara');
/*!40000 ALTER TABLE `lokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_user` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com','eyJpdiI6IktGbVNsdDllekVXb2JsdGQ3OGhtbzMxbER4ZzhvbEZzRjUzRndCcURNT3M9IiwidmFsdWUiOiJremlaZkpJRlhiZ2ZDOVdwS2dVU0RnTlkwYlNIZXhNdTFobGRcL21KM0xlcz0iLCJtYWMiOiIwOGU4OTVlYWQyYjYyYTk2ZjhmMzY2N2Y2ZjU4NzI4MGMwNjkzYTg3YjUwN2Y1MjZhOWQ1NTlhMzg5YmVmYWU1In0=','7qX3u3v4uehhgKIaXjiLyaR4w3zPx3JI5VeP5jpEzKwXuP0LHNWkZoHBts59',NULL,NULL,'Admin','admin'),(2,'ayat','ayat@gmail.com','eyJpdiI6IldaRm1IU2RFQ2wwTk42Zmkrb3hueDYxM3BEancwRnA0Snd4WGx3bzJGRXM9IiwidmFsdWUiOiJPRVhnelwvNjVpc2ZlOTBsbGxiNG80TXFsQnpoZUQ2d3VmK3RzSHJLbHNpTT0iLCJtYWMiOiJkOWQ2NjMwNDIzYjUzNTE3NmFjM2Q5YTcyNjcwZjU3MGRkNjhiN2Q2MzU4MWQxYzIwODUzMjY3NzI3ZDhkODU1In0=','z3hvpxoVCXak7U7bKIZhSArPaVYWF1PJ0khjTVKsEeeAkMOkvx2VwxUQE1EL',NULL,NULL,'Rahmat Hidayat','user'),(7,'admin2','coba2@gmail.com','eyJpdiI6IllRWHdDejY1b2ZpNU9wYTlUZGxPSm1iTThSNXVNVEd1U01NS0xTSXo2d1E9IiwidmFsdWUiOiIzbnZncmRpNmtQZEt6a0ZVanRlUFFJZWR4VWtaT01xYk1XY0dlOHlwZHh3PSIsIm1hYyI6ImZiZjViZTc1ZGU3MTFiM2VjY2NkZjcxOGE2OWNlNWU0MmRmZGI1YzVmMGM4MDZmMmM3NGE2YWQzZDlkOGJlM2EifQ==','QkEF12evTwDiqFwAtzcZ7J0HsHs6CIgMr4rLOcCb4DEZcwlevdTLLl8oJMwB',NULL,NULL,'Editor','admin'),(9,'admin4','admin4@gmail.com','eyJpdiI6ImRDV0ZxcjBmc1QwbFh1TEdSWXB0b0w5WGpXVWFsK2lkVkpVZ3cwcGxIU3M9IiwidmFsdWUiOiJEVTdRdCtmVytXZ0NjY3hwQXRHN0tVTHhIVGlabGtIWEc4aFJxRGUyU2lFPSIsIm1hYyI6ImE4MTdmMjMwMzRjN2FhZDU0ODU1MGIwZDQ2ZDFlOTdjNzcwNmI1YzJlMzdmNjI5ZWViNTBjMGRiMDY2ODQzY2EifQ==','pYVkCb7Gn5jpD1I7Rraz7dArpJqaCPAEvjxGZB0WDpxC3pU6dT9gvmc29a1T',NULL,NULL,'admin4','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-18 11:45:09
