-- MySQL dump 10.13  Distrib 5.7.13, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: nextvac
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `answersdb`
--

DROP TABLE IF EXISTS `answersdb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answersdb` (
  `secretkey` varchar(30) NOT NULL,
  `section` varchar(10) NOT NULL,
  `quescode` varchar(25) NOT NULL,
  `codeid` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `verdict` binary(1) NOT NULL,
  PRIMARY KEY (`secretkey`),
  UNIQUE KEY `secretkey_UNIQUE` (`secretkey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answersdb`
--

LOCK TABLES `answersdb` WRITE;
/*!40000 ALTER TABLE `answersdb` DISABLE KEYS */;
/*!40000 ALTER TABLE `answersdb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classallocate`
--

DROP TABLE IF EXISTS `classallocate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classallocate` (
  `id` varchar(45) NOT NULL,
  `secretkey` varchar(30) NOT NULL,
  `section` varchar(30) NOT NULL,
  `subject` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classallocate`
--

LOCK TABLES `classallocate` WRITE;
/*!40000 ALTER TABLE `classallocate` DISABLE KEYS */;
INSERT INTO `classallocate` VALUES ('1','teach001','K1611','CSE');
/*!40000 ALTER TABLE `classallocate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coderesults`
--

DROP TABLE IF EXISTS `coderesults`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coderesults` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secretkey` varchar(45) NOT NULL,
  `contestcode` varchar(45) NOT NULL,
  `problemcode` int(11) NOT NULL DEFAULT '1',
  `score` varchar(45) NOT NULL DEFAULT '0',
  `subtime` timestamp(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3) ON UPDATE CURRENT_TIMESTAMP(3),
  `starttime` timestamp(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coderesults`
--

LOCK TABLES `coderesults` WRITE;
/*!40000 ALTER TABLE `coderesults` DISABLE KEYS */;
INSERT INTO `coderesults` VALUES (1,'lkm','CODE7',1,'1000','2017-03-11 10:46:59.571',NULL),(2,'biss123','CODE7',3,'400','2017-03-09 11:32:44.000',NULL),(3,'kriss123','CODE7',1,'400','2017-03-11 17:08:47.692',NULL),(4,'kriss123','CODE7',2,'300','2017-03-11 17:08:47.692',NULL),(5,'biss123','CODE7',2,'100','2017-03-11 10:45:42.299',NULL),(6,'kriss123','CODE7',3,'300','2017-03-11 17:08:47.692',NULL),(11,'asda','asdasd',1,'12','2017-03-09 11:04:34.719',NULL),(12,'biss123','CODE7',1,'200','2017-03-11 15:29:57.000',NULL);
/*!40000 ALTER TABLE `coderesults` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `codingdb`
--

DROP TABLE IF EXISTS `codingdb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `codingdb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secretkey` varchar(30) NOT NULL,
  `section` varchar(45) NOT NULL,
  `contestcode` varchar(35) NOT NULL,
  `contestname` varchar(75) NOT NULL,
  `problemname` varchar(75) NOT NULL,
  `problemcode` int(11) NOT NULL DEFAULT '1',
  `problemstat` varchar(2000) NOT NULL,
  `inputstat` varchar(2000) NOT NULL,
  `outputstat` varchar(2000) NOT NULL,
  `totaltestcase` int(11) NOT NULL,
  `sample` varchar(75) NOT NULL,
  `explaination` varchar(700) DEFAULT NULL,
  `inpfolder` varchar(100) NOT NULL,
  `outfolder` varchar(100) NOT NULL,
  `duration` bigint(5) NOT NULL,
  `marks` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codingdb`
--

LOCK TABLES `codingdb` WRITE;
/*!40000 ALTER TABLE `codingdb` DISABLE KEYS */;
INSERT INTO `codingdb` VALUES (1,'teach','ac','vv','ss','aa',1,'Statement1','adsa','aadcs',1,'aas','asdsa','asdc','asa',10,0,0),(2,'teach001','K1611','CODE1','White spaces','jnujij',1,'What is the question?','hjbhjb hj','bhjbh',1,'../questions/cOZs6C8mDaHZPI22seWhhNSj5XdSLXBXLBpRdyeR','hjbhjb hjb','../questions/cOZs6C8mDaHZPI22seWhhNSj5XdSLXBXLBpRdyeR/IVQyESA67xnpkgIqdWiYTUWFwlwKTKBCGralkLrr','../questions/cOZs6C8mDaHZPI22seWhhNSj5XdSLXBXLBpRdyeR/iORC5A3ixlhrgd6MzDwto765zgqT2RlkGdWLN04k',61,0,0),(3,'teach001','K1611','CODE1','White spaces','bbhbhb',2,'jjkjn','jknjknj','jknnjnjk',2,'kjnn','kjnjnj','kjjkjnj','jkjkjnjnjj',21,0,0),(4,'teach001','K1611','CODE1','White spaces','What is the statement',3,'jjkjn','jknjknj','jknnjnjk',2,'kjnn','kjnjnj','kjjkjnj','jkjkjnjnjj',21,0,0),(5,'teach001','K1611','CODE1','White spaces','Whatisthetitle',4,'kjadknasasdkasslkasdkj','nkakskaknakask asnjasdkn','skja dasndkasndas dkjasndjasnd asjnd as',1,'../questions/dAVrVj6bWrKNWRs6j1rsVAZCUQBtIk','wiuqwjeiqew','../questions/dAVrVj6bWrKNWRs6j1rsVAZCUQBtIk/FWUBoQUu1RVLERD6XW7po2ZoFTehmX','../questions/dAVrVj6bWrKNWRs6j1rsVAZCUQBtIk/C2UxDinxMpoHb2zO8xLgWajWyZPNhc',60,0,0),(6,'teach001','K1611','CODE2','White spaces','Whatisthetitle',1,'kjadknasasdkasslkasdkj','nkakskaknakask asnjasdkn','skja dasndkasndas dkjasndjasnd asjnd as',1,'../questions/dAVrVj6bWrKNWRs6j1rsVAZCUQBtIk','wiuqwjeiqew','../questions/dAVrVj6bWrKNWRs6j1rsVAZCUQBtIk/FWUBoQUu1RVLERD6XW7po2ZoFTehmX','../questions/dAVrVj6bWrKNWRs6j1rsVAZCUQBtIk/C2UxDinxMpoHb2zO8xLgWajWyZPNhc',60,0,0),(7,'teach001','K1611','CODE3','White spaces','Whatisthetitle',1,'kjadknasasdkasslkasdkj','nkakskaknakask asnjasdkn','skja dasndkasndas dkjasndjasnd asjnd as',1,'../questions/dAVrVj6bWrKNWRs6j1rsVAZCUQBtIk','wiuqwjeiqew','../questions/dAVrVj6bWrKNWRs6j1rsVAZCUQBtIk/FWUBoQUu1RVLERD6XW7po2ZoFTehmX','../questions/dAVrVj6bWrKNWRs6j1rsVAZCUQBtIk/C2UxDinxMpoHb2zO8xLgWajWyZPNhc',60,0,0),(8,'teach001','K1611','CODE7','Big Problem','Simple Array Sum',1,'Given an array of N  integers can you find the sum of its elements','The first line contains an integer N  denoting the size of the array. The second line contains N spaceseparated integers representing the arrays elements.','Print the sum of the arrays elements as a single integer.',2,'../questions/xzjzuwrunN48Tgss1hOpDlPyLaoQqN','We print the sum of the arrays elements which is  1234101131','../questions/xzjzuwrunN48Tgss1hOpDlPyLaoQqN/8XnrxRXYllLqtFHV8IdW7QiXp48NUy','../questions/xzjzuwrunN48Tgss1hOpDlPyLaoQqN/B2vYu2Qr1cNMCgsjcA2qwagP7FTftN',72,200,1),(10,'teach001','K1611','CODE7','Big Problem','EFWEH',2,'LKDSJFLKSDJ','JDSJL','DSJFHSDLJ',1,'../questions/UCa7MLCjTROKMvyq8kurYE5aOHCsOw','KJSDSD','../questions/UCa7MLCjTROKMvyq8kurYE5aOHCsOw/II9SQVDsfwk3g6yPxHa188FdjuVVWJ','../questions/UCa7MLCjTROKMvyq8kurYE5aOHCsOw/sFsCxiybLNI5RZcqOJ7ZKg7purUpnQ',60,0,1),(11,'teach001','K1611','CODE7','Big Problem','Journey to the Moon',3,'The member states of the UN are planning to send 2 people to the Moon. But there is a problem. In line with their principles of global unity they want to pair astronauts of 2 different countries.There are N trained astronauts numbered from 0 to N1. But those in charge of the mission did not receive information about the citizenship of each astronaut. The only information they have is that some particular pairs of astronauts belong to the same country.Your task is to compute in how many ways they can pick a pair of astronauts belonging to different countries. Assume that you are provided enough pairs to let you identify the groups of astronauts even though you might not know their country directly. For instance if 12 and 3 are astronauts from the same country it is sufficient to mention that 12 and 23 are pairs of astronauts from the same country without providing information about a third pair 13. ','The first line contains two integers N and I separated by a single space. I lines follow. Each line contains 2 integers separated by a single space A and B such thatand  and  are astronauts from the same country.','An integer that denotes the number of permissible ways to choose a pair of astronauts.',1,'../questions/xt5xf7PmI3mEIszQUXoOGh1vyShjLc','Persons numbered 0 and 1 belong to same country and those numbered 2 and 3 belong to same country. So the UN can choose one person out of 0  1 and another person out of 2  3. So the number of ways of choosing a pair of astronauts is 4.','../questions/xt5xf7PmI3mEIszQUXoOGh1vyShjLc/miFrPVzFihIEWr6vh1tFQaXRFvKWPv','../questions/xt5xf7PmI3mEIszQUXoOGh1vyShjLc/9bOODDKcj2u1HqtNVKPpqGznxfTicJ',60,0,1),(12,'teach001','K1611','CODE1','bla','Titletest',5,'nsjdnasjnj','njnjknjknj','njlnjnj',2,'../questions/HijmBOue0RJBM9ryjQRDazYy4LCZSz','jnjnklnjknjknknj','../questions/HijmBOue0RJBM9ryjQRDazYy4LCZSz/jASCWtrrHriq35AuEUlwyw5w4aiH9a','../questions/HijmBOue0RJBM9ryjQRDazYy4LCZSz/gsK95HCw8kXrL1wlwagRGOoMltWDa6',62,121,0);
/*!40000 ALTER TABLE `codingdb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `globaldata`
--

DROP TABLE IF EXISTS `globaldata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `globaldata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `events` int(11) NOT NULL,
  `crank` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `globaldata`
--

LOCK TABLES `globaldata` WRITE;
/*!40000 ALTER TABLE `globaldata` DISABLE KEYS */;
INSERT INTO `globaldata` VALUES (1,'Lovely',22,11000);
/*!40000 ALTER TABLE `globaldata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ipconnect`
--

DROP TABLE IF EXISTS `ipconnect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ipconnect` (
  `id` int(11) NOT NULL,
  `roomno` varchar(45) NOT NULL,
  `ipaddress` varchar(45) NOT NULL,
  `ipkey` varchar(145) NOT NULL,
  `section` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ipconnect`
--

LOCK TABLES `ipconnect` WRITE;
/*!40000 ALTER TABLE `ipconnect` DISABLE KEYS */;
/*!40000 ALTER TABLE `ipconnect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `username` int(10) NOT NULL,
  `password` varchar(45) NOT NULL,
  `secretkey` varchar(30) NOT NULL,
  `sessionvar` varchar(60) DEFAULT 'invalid',
  `designation` varchar(15) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `idlogin_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (123,'bisso','biss123','7rt32bti4o1vvroo01g0a0q3o4','student'),(1160,'krisu','kriss123','invalid','student'),(1242,'masterpass','master006','agt62saftu9f5utic102c90kt1','master'),(1661,'teachpass','teach001','agt62saftu9f5utic102c90kt1','teacher');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `secretkey` varchar(30) NOT NULL,
  `propic` varchar(45) NOT NULL DEFAULT 'default.jpg',
  `status` varchar(100) NOT NULL DEFAULT 'I am new to NextVAC',
  `designation` varchar(45) NOT NULL,
  `incomming` int(11) NOT NULL DEFAULT '0',
  `messages` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `cover` varchar(45) NOT NULL DEFAULT 'defaultcover.jpg',
  `hostel` varchar(45) NOT NULL DEFAULT 'Day Scholar',
  `hometown` varchar(45) DEFAULT 'Not Given',
  `number` varchar(45) NOT NULL,
  `course` varchar(45) NOT NULL,
  `semester` int(11) NOT NULL,
  `organization` varchar(45) DEFAULT NULL,
  `gender` int(11) NOT NULL DEFAULT '3',
  `cgpa` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`secretkey`),
  UNIQUE KEY `secretkey_UNIQUE` (`secretkey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES ('biss123','smKMoFPZpKGHiAF35Mwa.jpg','I am the Lord n boss','student',12,11,'boss@bisso.com','Biswaru','Baneerjee','zAdefd07cCghITTRzIxA.jpg','BH4','Raniganj','95019222','Btech-CSE',2,'RISC',3,1),('kriss123','Fy8TzzrYb7rTOuJ1o0Tb.jpg','iityut','student',11,2,'krisu@gmail.com','Krishnendu','Brahnmachari','cover2.jpg','BH4','Asansol','81455','Btech-MECH',2,'ASME',3,8.5),('teach001','sebastian.jpg','I am sebastian','teacher',22,1,'asd@gmil.com','Sebastian','Thun','cover.jpg','Th4','Durgapur','13213','cdsss',1,'Cypher',3,0);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questiondb`
--

DROP TABLE IF EXISTS `questiondb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questiondb` (
  `id` int(11) NOT NULL,
  `secretkey` varchar(30) NOT NULL,
  `section` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `codeid` int(11) NOT NULL,
  `question` varchar(120) NOT NULL,
  `first` varchar(45) NOT NULL,
  `second` varchar(45) NOT NULL,
  `third` varchar(45) NOT NULL,
  `fourth` varchar(45) NOT NULL,
  `correct` smallint(5) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questiondb`
--

LOCK TABLES `questiondb` WRITE;
/*!40000 ALTER TABLE `questiondb` DISABLE KEYS */;
/*!40000 ALTER TABLE `questiondb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rankingtable`
--

DROP TABLE IF EXISTS `rankingtable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rankingtable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secretkey` varchar(50) NOT NULL,
  `contestcode` varchar(45) NOT NULL,
  `problemcode` varchar(35) NOT NULL,
  `mainscore` double NOT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rankingtable`
--

LOCK TABLES `rankingtable` WRITE;
/*!40000 ALTER TABLE `rankingtable` DISABLE KEYS */;
/*!40000 ALTER TABLE `rankingtable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratingtable`
--

DROP TABLE IF EXISTS `ratingtable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratingtable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secretkey` varchar(50) NOT NULL,
  `mainscore` bigint(20) NOT NULL DEFAULT '100',
  `elorating` bigint(20) NOT NULL DEFAULT '2000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratingtable`
--

LOCK TABLES `ratingtable` WRITE;
/*!40000 ALTER TABLE `ratingtable` DISABLE KEYS */;
/*!40000 ALTER TABLE `ratingtable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skilldb`
--

DROP TABLE IF EXISTS `skilldb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skilldb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secretkey` varchar(50) NOT NULL,
  `skillname` varchar(200) NOT NULL,
  `skillid` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `loggedate` timestamp(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3) ON UPDATE CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skilldb`
--

LOCK TABLES `skilldb` WRITE;
/*!40000 ALTER TABLE `skilldb` DISABLE KEYS */;
/*!40000 ALTER TABLE `skilldb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentinfo`
--

DROP TABLE IF EXISTS `studentinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentinfo` (
  `secretkey` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `section` varchar(50) NOT NULL,
  `regno` int(11) NOT NULL,
  `attendance` int(11) DEFAULT '0',
  `rank` int(11) DEFAULT '0',
  PRIMARY KEY (`secretkey`),
  UNIQUE KEY `secretkey_UNIQUE` (`secretkey`),
  UNIQUE KEY `regno_UNIQUE` (`regno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentinfo`
--

LOCK TABLES `studentinfo` WRITE;
/*!40000 ALTER TABLE `studentinfo` DISABLE KEYS */;
INSERT INTO `studentinfo` VALUES ('biss123','Bisso','K1611',1162227,127,11),('kriss123','Krisu','K1612',11601904,122,12);
/*!40000 ALTER TABLE `studentinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacherinfo`
--

DROP TABLE IF EXISTS `teacherinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacherinfo` (
  `secretkey` varchar(30) NOT NULL,
  `cabin` varchar(20) NOT NULL,
  `name` varchar(85) NOT NULL,
  `specialisation` varchar(55) NOT NULL,
  `honour` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`secretkey`),
  UNIQUE KEY `secretkey_UNIQUE` (`secretkey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacherinfo`
--

LOCK TABLES `teacherinfo` WRITE;
/*!40000 ALTER TABLE `teacherinfo` DISABLE KEYS */;
INSERT INTO `teacherinfo` VALUES ('teach001','35-292','Sebastian Thun','PHd','Stanford');
/*!40000 ALTER TABLE `teacherinfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-14 13:09:08
