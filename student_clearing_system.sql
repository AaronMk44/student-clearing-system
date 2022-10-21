-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: student_clearing_system
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrators` (
  `admin_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `admin_role` enum('super','hod','accountant','librarian','hostel_representative') NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrators`
--

LOCK TABLES `administrators` WRITE;
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT INTO `administrators` VALUES (1,'Sam','Mukuka','male','hod','sam@gmail.com','$2y$10$H0j4Hx/kHFpaBfDU9xMij.GmP9FwHhZDh9loqkUAw5xFiTnhStGCC','2022-09-25 10:06:32','2022-09-25 10:06:32',NULL),(4,'John','Doe','male','accountant','john@gmail.com','$2y$10$99Bg6805b/mzRC09tSZYuezxLtoeOzI4GCsVEF6ep4F2p2BIl9Nwa','2022-09-25 10:08:11','2022-09-25 10:08:11',NULL),(5,'Mary','Doe','female','hostel_representative','mary@doe.com','$2y$10$VVH8lugRDO3laxpVypdqh.SMtplMiw9iIR8qQeef5Q3X1Adj.LJ8.','2022-09-25 10:08:40','2022-09-25 10:08:40',NULL),(6,'Jack','Doe','male','librarian','jack@doe.com','$2y$10$WlKHZczfv.kq6Gf//A0il.wC1ieXchiW4y7XYsXDBKjX1DrOJkJgS','2022-09-25 10:08:58','2022-09-25 10:08:58',NULL),(7,'James','Bond','male','super','james@gmail.com','$2y$10$gLflI6LIVGk.dYMqG49XQeD2FYFp7b0cQgsoKhRbEui5DnSQ1ggW.','2022-10-06 11:00:19','2022-10-06 11:00:19',NULL),(8,'Jane','Mumba','female','hod','jane@gmail.com','$2y$10$ShDZoBJbHRcCOFhj8kLInOhpO29T5SxDN6Ac34B53EQG9wBm15OyG','2022-10-06 14:40:58','2022-10-06 14:40:58',NULL);
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clearance_forms`
--

DROP TABLE IF EXISTS `clearance_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clearance_forms` (
  `form_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(8) NOT NULL,
  `student_year_of_study` tinyint(1) NOT NULL,
  `student_room_no` int(4) NOT NULL,
  `clear_for_term` enum('term one','term two','term three','semester one','semester two') NOT NULL,
  `hostel_rep_name` varchar(50) NOT NULL,
  `hostel_rep_approval_status` enum('approved','pending') NOT NULL DEFAULT 'pending',
  `hostel_items_due` text DEFAULT NULL,
  `hostel_rep_approval_date` datetime DEFAULT current_timestamp(),
  `hod_name` varchar(50) NOT NULL,
  `hod_approval_status` enum('approved','pending') NOT NULL DEFAULT 'pending',
  `hod_approval_date` datetime DEFAULT current_timestamp(),
  `librarian_name` varchar(50) NOT NULL,
  `librarian_approval_status` enum('approved','pending') NOT NULL DEFAULT 'pending',
  `library_items_due` text DEFAULT NULL,
  `librarian_approval_date` datetime DEFAULT current_timestamp(),
  `accountant_name` varchar(50) NOT NULL,
  `accountant_approval_status` enum('approved','pending') NOT NULL DEFAULT 'pending',
  `accountant_approval_date` datetime DEFAULT current_timestamp(),
  `student_running_balance` float(10,2) NOT NULL,
  `date_form_created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clearance_forms`
--

LOCK TABLES `clearance_forms` WRITE;
/*!40000 ALTER TABLE `clearance_forms` DISABLE KEYS */;
INSERT INTO `clearance_forms` VALUES (1,2010534,4,102,'term three','Mary Doe','pending','','2022-09-27 21:34:23','Sam Mukuka','approved','2022-10-06 00:00:00','Jack Doe','pending','','2022-09-27 21:34:23','John Doe','approved','2022-10-10 00:00:00',300.00,'2022-09-25 12:20:49'),(2,2010534,3,103,'term three','Mary Doe','pending','','2022-09-27 21:34:23','Sam Mukuka','approved','2022-10-06 00:00:00','Jack Doe','pending','','2022-09-27 21:34:23','John Doe','pending','0000-00-00 00:00:00',0.00,'2022-09-25 12:22:41'),(3,2010534,3,104,'term three','Mary Doe','approved','Broke window, has not paid for damage','2022-10-10 00:00:00','Sam Mukuka','approved','2022-10-06 00:00:00','Jack Doe','pending','','2022-09-27 21:34:23','John Doe','pending','0000-00-00 00:00:00',0.00,'2022-09-25 12:29:21'),(4,2010534,1,111,'term one','Mary Doe','approved','Some items in the room were missing','2022-10-06 00:00:00','Sam Mukuka','approved','2022-10-06 00:00:00','Jack Doe','approved','','2022-10-06 00:00:00','John Doe','approved','2022-10-06 00:00:00',3000.00,'2022-10-04 09:42:44');
/*!40000 ALTER TABLE `clearance_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `student_id` varchar(8) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `nrc` varchar(20) NOT NULL,
  `residential_address` varchar(100) NOT NULL,
  `postal_address` varchar(100) NOT NULL,
  `program_of_study` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `student_id` (`student_id`),
  UNIQUE KEY `nrc` (`nrc`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES ('2010534','Aaron','Mkandawire','male','5789631/25/1','7A Mungule, Northrise','','BSE','aaron@gmail.com','$2y$10$7G9MCHmuofbVsAfLzSpNo.4CNcBXpikpgo1wMsLAC7JsYvEiW4wQS','2022-09-23 13:58:41','2022-09-23 13:58:41',NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-21  6:23:44
