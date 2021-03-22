-- MariaDB dump 10.18  Distrib 10.5.8-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: api_classroom
-- ------------------------------------------------------
-- Server version	10.5.8-MariaDB-3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `api_classroom`
--

/*!40000 DROP DATABASE IF EXISTS `api_classroom`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `api_classroom` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `api_classroom`;

--
-- Table structure for table `ClassDetails`
--

DROP TABLE IF EXISTS `ClassDetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ClassDetails` (
  `className` text NOT NULL,
  `faculty` text NOT NULL,
  `studentGroup` text NOT NULL,
  `startTime` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `duration` text NOT NULL,
  `classId` text NOT NULL,
  UNIQUE KEY `Class_Data` (`classId`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ClassDetails`
--

LOCK TABLES `ClassDetails` WRITE;
/*!40000 ALTER TABLE `ClassDetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `ClassDetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LoginDataTable`
--

DROP TABLE IF EXISTS `LoginDataTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LoginDataTable` (
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `name` text NOT NULL,
  `classGroup` text NOT NULL,
  `isFaculty` text NOT NULL,
  UNIQUE KEY `UC_Data` (`email`,`mobile`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LoginDataTable`
--

LOCK TABLES `LoginDataTable` WRITE;
/*!40000 ALTER TABLE `LoginDataTable` DISABLE KEYS */;
INSERT INTO `LoginDataTable` VALUES ('ajit.shukla@abes.ac.in','6392116379','VIb','New','true'),('ajit.shukla@abes.ac.in','6392119','VIbad','New','true'),('ajit.shukla@abes.ac.in','63911232119','VIbaadasdd','New','true'),('stEmail','6392119','VIbad','New','true'),('stEmaiadhbl','6392119','VIbad','New','true'),('stEmaiasfkjbkasadhbl','6392119','VIbad','New','true'),('stEmadsdjfjalhbl','6392119','VIbad','New','true'),('ajit.shukla@abes.ac.in','639211119','VIbad','New','false'),('ajit.shukla@gmail.in','639211119','VIbad','New','false');
/*!40000 ALTER TABLE `LoginDataTable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Problems`
--

DROP TABLE IF EXISTS `Problems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Problems` (
  `email` text NOT NULL,
  `classId` text NOT NULL,
  `probString` text NOT NULL,
  `probImage` text NOT NULL,
  `probTitle` text NOT NULL,
  `updatedAtDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  UNIQUE KEY `Problem_Data` (`email`,`classId`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Problems`
--

LOCK TABLES `Problems` WRITE;
/*!40000 ALTER TABLE `Problems` DISABLE KEYS */;
INSERT INTO `Problems` VALUES ('ajit.shukla@abes.ac.in','176a5a00148b23ee2d','Description of problem 4','base64prblempng','Some Problem','2021-03-20 18:27:26'),('ajit.shukla@abes.ac.in','2356','Description of problem 5','base64prblempng','Some Problem','2021-03-20 18:28:49');
/*!40000 ALTER TABLE `Problems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `StudentData`
--

DROP TABLE IF EXISTS `StudentData`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `StudentData` (
  `email` text NOT NULL,
  `classId` text NOT NULL,
  `probCode` text NOT NULL,
  `updatedAtDate` timestamp NOT NULL DEFAULT current_timestamp(),
  UNIQUE KEY `Student_Data` (`email`,`classId`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `StudentData`
--

LOCK TABLES `StudentData` WRITE;
/*!40000 ALTER TABLE `StudentData` DISABLE KEYS */;
INSERT INTO `StudentData` VALUES ('','73945jfs','program_code_in_base64_string','2021-03-20 16:31:30'),('','2h67','program_code_in_base64_string','2021-03-20 16:32:12'),('ajit.shukla@abes.ac.in','2h67','program_code_in_base64_string','2021-03-20 16:34:04'),('stEmail','classId','program_code_in_base64_string','2021-03-20 17:38:26'),('stEmaiadhbl','classId','program_code_in_base64_string','2021-03-20 17:38:30'),('stEmaiasfkjbkasadhbl','classId','program_code_in_base64_string','2021-03-20 17:38:32'),('stEmadhbl','classId','program_code_in_base64_string','2021-03-20 17:38:36'),('stEmadsdjfjalhbl','classId','program_code_in_base64_string','2021-03-20 17:38:40'),('stEmadshbl','classId','program_code_in_base64_string','2021-03-20 17:38:43'),('stEmadsdadfkasjl','classId','program_code_in_base64_string','2021-03-20 17:38:48'),('stEmsdafhdfkasjl','classId','program_code_in_base64_string','2021-03-20 17:38:53'),('ajit.shukla@abes.ac.in','2356','program_code_in_base64_string','2021-03-20 18:11:27'),('ajit.shukla@gmail.in','2356','program_code_in_base64_string','2021-03-20 18:16:31');
/*!40000 ALTER TABLE `StudentData` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'api_classroom'
--

--
-- Dumping routines for database 'api_classroom'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-22 12:39:53
