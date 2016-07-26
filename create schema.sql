CREATE DATABASE  IF NOT EXISTS `textbookdb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `textbookdb`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: textbookdb
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.10-MariaDB

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
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chats` (
  `chatID` int(11) NOT NULL AUTO_INCREMENT,
  `recipient` varchar(50) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(80) NOT NULL DEFAULT 'no title',
  UNIQUE KEY `chatID_UNIQUE` (`chatID`),
  KEY `from_idx` (`sender`),
  KEY `recipient` (`recipient`),
  CONSTRAINT `recipient` FOREIGN KEY (`recipient`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `sender` FOREIGN KEY (`sender`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` VALUES (1,'o@farmingdale.edu','o@farmingdale.edu','2016-04-23 17:54:52',''),(2,'o@farmingdale.edu','o@farmingdale.edu','2016-04-23 17:56:15',''),(3,'o@farmingdale.edu','e@farmingdale.edu','2016-04-23 18:53:38',''),(4,'e@farmingdale.edu','o@farmingdale.edu','2016-04-23 19:28:48',''),(5,'e@farmingdale.edu','o@farmingdale.edu','2016-04-23 19:29:05',''),(6,'e@farmingdale.edu','o@farmingdale.edu','2016-04-23 19:36:24',''),(7,'o@farmingdale.edu','o@farmingdale.edu','2016-04-23 19:37:18',''),(8,'e@farmingdale.edu','o@farmingdale.edu','2016-04-23 19:38:59',''),(9,'e@farmingdale.edu','o@farmingdale.edu','2016-04-23 19:39:21',''),(10,'o@farmingdale.edu','o@farmingdale.edu','2016-04-23 19:54:13',''),(15,'o@farmingdale.edu','o@farmingdale.edu','2016-04-24 13:14:50',''),(22,'o@farmingdale.edu','o@farmingdale.edu','2016-04-24 13:21:28',''),(23,'o@farmingdale.edu','o@farmingdale.edu','2016-04-24 13:21:47',''),(24,'o@farmingdale.edu','e@farmingdale.edu','2016-04-24 13:22:18',''),(25,'o@farmingdale.edu','o@farmingdale.edu','2016-04-24 15:52:02',''),(26,'o@farmingdale.edu','o@farmingdale.edu','2016-04-24 15:52:15',''),(27,'o@farmingdale.edu','o@farmingdale.edu','2016-04-24 15:53:57',''),(28,'e@farmingdale.edu','o@farmingdale.edu','2016-04-24 18:18:03',''),(29,'o@farmingdale.edu','o@farmingdale.edu','2016-04-26 16:15:21',''),(30,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:35:31','this is a chat'),(31,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:37:00','this is a chat'),(32,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:37:32','this is a chat'),(33,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:37:38','this is a chat'),(34,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:37:55','this is a chat'),(35,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:39:36','this is a chat'),(36,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:39:55','this is a chat'),(37,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:40:05','this is a chat'),(38,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:41:11','this is a chat'),(39,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:41:23','this is a chat'),(40,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:42:12','title title title'),(41,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:42:39','title title title'),(42,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:42:55','title title title'),(43,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:43:14','title title title'),(44,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:43:59','title title title'),(45,'e@farmingdale.edu','o@farmingdale.edu','2016-04-26 17:46:56','title title title'),(46,'e@farmingdale.edu','e@farmingdale.edu','2016-04-26 17:47:43','test2'),(47,'e@farmingdale.edu','e@farmingdale.edu','2016-04-26 17:55:57','test2'),(48,'e@farmingdale.edu','e@farmingdale.edu','2016-04-26 17:56:06','test2');
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `courseID` int(3) unsigned zerofill NOT NULL,
  `department` varchar(3) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`courseID`,`department`),
  KEY `department_idx` (`department`),
  CONSTRAINT `department` FOREIGN KEY (`department`) REFERENCES `departments` (`departmentID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (015,'DEN','Skills Refresher Course'),(015,'MTH','Elements of Algebra'),(094,'AVN','Flightline-Piper WarriorPA28'),(097,'EGL','Basic Writing Skills'),(100,'ANT','Introduction to Anthropology'),(100,'CRJ','Intro to Criminal Justice'),(100,'NUR','Health Assessment Lab'),(101,'AVN','Aviation Indust:A Hist.Persptv'),(101,'BUS','Accounting I'),(101,'CRJ','Law Enforce & Commun Relations'),(101,'EGL','Composition I: College Writing'),(101,'ENV','Energy Sustainability & Enviro'),(101,'FRE','French I (Elementary)'),(101,'FRX','The Freshman Experience'),(101,'HST','Current Issues in Health'),(101,'PSY','Introduction to Psychology'),(101,'VIS','Introduction to Drawing'),(102,'BCS','Computer Concepts & Appl'),(102,'BUS','Accounting II'),(102,'CRJ','Juvenile Delinquency'),(102,'DEN','Dental Matl & Expand Funct Lab'),(102,'EGL','Composition II: Wrt Literature'),(102,'FRE','French II (Elementary)'),(103,'FRX','Career Planning for Freshmen'),(103,'MTH','Sets, Probability & Logic'),(103,'VIS','Introduction to Watercolor'),(104,'AET','Combustion Engine Theory'),(104,'AVN','Private Pilot Ground'),(104,'EET','DC/AC Circuits Lab'),(104,'MET','Computer Aided Drftng&Design'),(104,'VIS','Introduction to Calligraphy'),(105,'AET','Fuel Systems-SI Engines Lab'),(105,'AVN','Private Pilot Flight To Solo'),(105,'CRJ','Corrections in America'),(105,'EET','Intro to Digital Electronics'),(105,'POL','Introduction to Politics'),(105,'VIS','Intro to Photography'),(106,'AVN','Private Pilot Flight to Cert.'),(106,'DEN','Oral Radiology I'),(106,'PHI','Phil: Modern and Contemporary'),(107,'AET','Mech Equp-Eng-Drivetrain Lab'),(107,'MTH','Intro to Mathematical Ideas'),(108,'DEN','Oral Histology & Embryology'),(109,'AET','Automotive Elect Principles'),(109,'BUS','Mgmt Theories & Practices'),(109,'MET','Computer Program & Applic'),(110,'ANT','Sociocultural Anthropology'),(110,'AVN','Introduction to Flight'),(110,'EET','Computer Applications'),(110,'MTH','Statistics'),(110,'NUR','Foundations of Nursing I'),(110,'PHY','Physical Sci: Physical Geology'),(110,'POL','Introduction to Legal Studies'),(110,'SMT','Introduction to Sport Mgmt'),(110,'VIS','Drawing I'),(111,'BUS','Introduction to Business'),(111,'EET','Electric Circuits I - Lab'),(111,'GER','German I (Elementary)'),(111,'HOR','Horticulture II Lab'),(111,'NUR','Foundations of Nursing II'),(112,'AVN','Pilot Proficiency'),(112,'GER','German II (Elementary)'),(112,'HOR','Soils The Foundation of Life'),(112,'VIS','Two-Dimensional Design'),(113,'EET','Electric Circuits II - Lab'),(114,'HIS','Western Civilization I'),(114,'NUR','Clinical&Theoretical Foundatio'),(114,'PHY','Physical Sci: Environment'),(114,'VIS','Principles of Color'),(115,'CRJ','Computer Forensics'),(115,'HIS','Western Civilization II'),(115,'PED','Introduction to Self Defense'),(115,'VIS','Three-Dimensional Design'),(116,'MTH','College Algebra'),(116,'PHY','Physical Sci: Meteorology'),(116,'VIS','Digital Media & Methods'),(117,'HIS','World Civilization I'),(117,'MET','Manufacturing Processes (Lab)'),(117,'MTH','Precal Modeling/Life & Soc Sci'),(118,'EET','Semiconductor Devices&Circuits'),(118,'HIS','World Civilization II'),(119,'PHY','Physical Sci: Technology'),(120,'ANT','Archaeology'),(120,'BCS','Foundations Computer Prog I'),(120,'BIO','General Biology Lab'),(120,'VIS','Drawing II'),(121,'BIO','Health, Heredity and Behavior'),(121,'CON','Graphics II'),(121,'HIS','U.S. History to Reconstruction'),(121,'ITA','Italian I (Elementary)'),(121,'PED','Intro Weight Train & Fitness'),(121,'PHY','Descriptive Classical Physics'),(122,'HIS','U.S. History since Reconstr'),(122,'ITA','Italian II (Elementary)'),(122,'SOC','Introductory Sociology'),(122,'VIS','Typography I'),(123,'BIO','Human Body/Hlth & Disease Lab'),(124,'CHM','Principles of Chemistry Lab'),(125,'BIO','Principles of Nutrition'),(125,'PED','Introduction to Racquetball'),(125,'PHY','Physical Sci. Laboratory I'),(126,'AVN','Aviation Security Management I'),(126,'DEN','Periodontology'),(126,'PHY','Physical Sci. Laboratory II'),(127,'MET','Adv Manufacturing ProcessesLab'),(129,'MTH','Precalculus with Applications'),(130,'ANT','North American Indians'),(130,'BCS','Website Development I'),(130,'BIO','Biological Principles I Lab'),(130,'MTH','Calculus I with Applications'),(130,'SPE','Public Speaking'),(131,'ARA','Arabic I (Elementary)'),(131,'ARC','Introduction to Graphics'),(131,'BIO','Biological Principles II Lab'),(131,'BUS','Marketing Principles'),(133,'HOR','Landscape Drafting II'),(135,'PED','Introduction to Volleyball'),(135,'PHY','College Physics I Laboratory'),(136,'PHY','College Physics II Laboratory'),(141,'BUS','Contemporary Bus Communication'),(141,'SPA','Spanish I (Elementary)'),(142,'SPA','Spanish II (Elementary)'),(144,'PHY','General Physics II (Calculus)'),(145,'SPA','Spanish for Medical Personnel'),(150,'AET','Automotive Computer App Lab'),(150,'MTH','Calculus I'),(151,'CHI','Chinese I'),(151,'MTH','Calculus II'),(152,'CHM','General Chem Principles I Lab'),(153,'CHM','General Chem Principles II Lab'),(156,'ECO','Prin of Economics (Macro)'),(157,'ECO','Prin of Economics (Micro)'),(160,'BCS','Computers,Society & Technology'),(161,'CON','Materials/Methods of Constr I'),(162,'CON','Materials/Methods of Constr II'),(166,'BIO','Prin Human Antomy & Physio Lab'),(170,'BIO','Human Anat & Physiology I Lab'),(171,'BIO','Human Anat & Physiology II Lab'),(192,'BIO','Botany Lab'),(197,'BIO','Human Biology'),(200,'ART','History of Graphic Design'),(200,'CRJ','Criminal Investigation-Writing'),(200,'SOC','Intro to Women\'s Studies'),(201,'ART','Srvy Art Hist: Prehis-Mid Ages'),(201,'AVN','Safety Ethics'),(201,'BUS','Corporate Finance'),(201,'CRJ','Criminalistics'),(201,'EGL','Eng Lit: Old English-18th Cent'),(201,'MET','Statics (Lab)'),(201,'STS','Thinking Critically about Tech'),(202,'ART','Srvy Art Hst:Early Ren-Present'),(202,'AVN','Aviation Meteorology'),(202,'BUS','Business Law I'),(202,'EGL','Eng Lit: 19th Century-Present'),(202,'SPE','Interpersonal Communications'),(203,'CRJ','Criminology'),(203,'PED','Intro: First Aid, AED & CPR'),(204,'CRJ','Criminal Law'),(204,'EGL','American Lit:1865 to Present'),(204,'HOR','Herbaceous Plants II Lab'),(205,'CRJ','Criminal Procedure Law'),(205,'MET','Material Science'),(205,'PHI','Ethics'),(206,'EGL','World Lit: Early Classics'),(206,'MET','Strength of Materials (Lab)'),(207,'CON','Elements Strength of Materials'),(207,'MET','Tool Design (Lab)'),(208,'AVN','Instrument Pilot Ground'),(208,'BCS','Introdution to Networks Lab'),(209,'AVN','Instrument Pilot Flight'),(209,'BCS','Routing & Switching Essentials'),(209,'EGL','Technical Communication'),(210,'ANT','Anthropology & Globalization'),(210,'BIO','Introduction to Bioscience'),(210,'EGL','Intro: Drama/Writing Intensive'),(211,'ANT','Caribbean Cultures'),(211,'AVN','Commercial Pilot Ground'),(211,'CRJ','Law Enforcement Administration'),(211,'GEO','The World and Its Peoples'),(211,'NUR','Clinical Pharmacology-Nursing'),(212,'AVN','Commercial Pilot Flight'),(212,'BIO','Bioscience LaboratoryPractices'),(212,'EGL','Intro to Fiction'),(212,'HIS','Modern World'),(212,'HOR','Woody Plants Lab'),(212,'MET','Applied Fluid Mechanics'),(214,'EGL','Introduction to Poetry'),(215,'AET','Diesel Engines'),(215,'BCS','UNIX Operating Systems'),(215,'NUR','Dev.Nurses\' Ways of Knowing'),(215,'SMT','Sport Information Management'),(216,'EGL','Creative Writing'),(216,'NUR','The Art of Nursing'),(217,'AET','Applied Mechanics'),(217,'CRJ','Computer Forensics II'),(217,'NUR','Care Indv/w Acute Health Hosp'),(218,'CRJ','Computer Forensics III'),(218,'HOR','Indoor Plants Lab'),(220,'BIO','Medical Microbiology Lab'),(220,'DEN','Preventive OralHealth ConcptII'),(220,'HOR','Landscape Plans II Lab'),(220,'SMT','Media and Sport'),(221,'GEO','Intro to Geographic Info Systm'),(222,'DEN','Community Oral Health II'),(222,'HIS','Women in U.S. History'),(222,'VIS','Graphic Design I'),(223,'EET','Digital Electronics - Lab'),(223,'HOR','Basics of Floral Design'),(223,'SOC','Social Issues & Institutions'),(224,'SOC','Urban Sociology'),(225,'DEN','Clinical Dental Hygiene II'),(225,'EET','Communications Electronics Lab'),(225,'SMT','Sport Marketing'),(225,'SOC','Sociology of the Family'),(225,'VIS','Photography I'),(226,'EGL','Journalism'),(226,'PCM','Journalism'),(226,'VIS','Design Production I'),(227,'MLT','Immunology and Serology Lab'),(228,'EGL','Classics & Myth in Pop Culture'),(228,'HOR','Current Horticultural Topics'),(228,'MLT','Immunohematology Lab'),(228,'SOC','Society & Health'),(228,'VIS','Four-Dimensional Design'),(229,'SOC','Race and Ethnic Relations'),(230,'BCS','Foundations ofComputer Prog II'),(230,'BUS','Environmental Law'),(230,'CRJ','Biometrics & Identity Theft'),(230,'MET','Electrical Principles (Lab)'),(230,'SET','Wireless Tech & Applications'),(230,'SMT','Social Media in Sport'),(231,'SOC','Multiculturalism'),(232,'PSY','Child Development'),(232,'VIS','Graphic Design II'),(234,'PSY','Social Psychology'),(234,'VIS','Design Production II'),(235,'BCS','JavaScript and jQuery'),(235,'DEN','Clinical Dental Hygiene III'),(236,'MLT','Histological Techniques'),(236,'MTH','Calculus II with Applications'),(236,'VIS','Typography II'),(238,'PSY','Psychology of Human Sexuality'),(238,'SOC','Youth Culture'),(238,'VIS','Illustration:Graphic Designers'),(240,'BCS','Website Development II'),(240,'BIO','Bioethics'),(240,'BUS','Business Statistics'),(240,'DEN','Den Prac Mgt: Ethics & Juris'),(240,'EGL','Themes Sci Fiction Film & Lit'),(240,'PSY','Health Psychology'),(240,'SOC','Women, Men & Social Change'),(242,'EGL','Film and Literature'),(242,'VIS','Publication Design II'),(244,'MLT','Clinical Practice Lab'),(244,'SPA','Spanish IV (Intermediate)'),(245,'DEN','Clinical Dental Hyg IV'),(245,'MTH','Linear Algebra'),(245,'SOC','Technology/Society/Soc Change'),(250,'ANT','Forensic Anthropology'),(250,'BUS','Consumer Behavior'),(250,'ECO','Quantitative Analysis for Eco'),(250,'EGL','Young Adult Literature'),(250,'VIS','Photography II'),(251,'EET','Microprocessors'),(252,'MET','Quality Control(Metrology)Lab'),(252,'MTH','Calculus III'),(253,'MTH','Differential Equations'),(255,'AET','Auto Electn & Comp Cntl Lab'),(255,'ARC','Architectural Design I'),(255,'PSY','Topics in Psychology'),(257,'AET','Automatic Transmissions Lab'),(257,'ARC','Architectural Design II'),(257,'BUS','Advertising Principles'),(257,'PSY','Teaching Psy/Writing Intensive'),(258,'MLT','Clinical Microbio. II Lab'),(259,'BUS','Public Relations'),(260,'BCS','Introduction to Database Sys'),(260,'CHM','Fundamentals of Organic CHEM'),(260,'PSY','Research Methods'),(260,'SOC','Sociological Theory'),(260,'VIS','Graphi Design for Non-Majors'),(262,'BCS','Data Communications'),(262,'POL','Global Politics'),(263,'ARC','Mech,Elec, Plumbing &Ener Syst'),(263,'POL','American Foreign Relations'),(265,'HOR','Horticulture Project'),(265,'POL','Comparative Politics'),(266,'BUS','Personnel Human Resource Mgmnt'),(266,'SOC','Sociological Research Methods'),(267,'BUS','Small Business Management'),(270,'AVN','Introduction to Airports/Mngmt'),(270,'CHM','Organic Chemistry I Lab'),(270,'ECO','Intermediate Macroeconomics'),(270,'PED','Theory &Techniques of Coaching'),(271,'AVN','Airport Cap/Delay/Airspc/Envir'),(271,'BIO','Anatomy & Physiology II-Lab'),(271,'BUS','Intermediate Accounting I'),(271,'CHM','Organic Chemistry II Lab'),(272,'BUS','Intermediate Accounting II'),(273,'BUS','Cost Accounting'),(275,'PED','Principles of Athletics in Edu'),(280,'AVN','Intro to Air Cargo Operations'),(280,'BUS','International Business'),(281,'MLT','Practicum in Immunohematology'),(282,'ARC','Construction Design'),(282,'MLT','Prac Clin Chemistry & Serology'),(282,'SOC','Introduction to LGBT Studies'),(283,'MLT','Practicum Hematology&Urinalysi'),(284,'MLT','Prac in Clin Microbiology'),(290,'AET','ProjectSeminar-Wrtng Intensive'),(299,'CON','Const/Architecture Internship'),(300,'AVN','Gov\'t / Aviation (Writing Int)'),(300,'BCS','Management Information Systems'),(300,'BUS','Operations Management'),(300,'MET','Computer Aided Engineering Lab'),(300,'MLG','International Cinema'),(300,'STS','SpecialTopics:Science,Tech,Soc'),(301,'BCS','Systems Analysis & Design'),(301,'EGL','Adv Grammar & Vocabulary'),(301,'HST','Health Care Organization'),(301,'MLG','Italian Cinema(In English)'),(301,'PCM','Advanced Grammar & Vocabulary'),(301,'PSY','Learning'),(302,'ART','Art History: American Art Srvy'),(302,'CON','Soils, Found,Earth Struc Lab'),(302,'ITA','Italian VI (Advanced)'),(302,'MLG','Spanish & Latin Amer Cinema'),(302,'NUR','Pathophysiology'),(303,'BCS','XML'),(303,'CON','Hydraulics (Laboratory)'),(304,'BUS','Business Law II'),(304,'ECO','Sports Economics'),(304,'SMT','Sport Finance'),(305,'BUS','Entrepreneurship'),(305,'HIS','Culture & Technology in Englan'),(305,'MET','Tooling for Composites Lab'),(305,'MLG','Hispanic &Latin Amer Cult &Civ'),(305,'NUR','Health Promotion & Patient Edu'),(305,'PCM','Media in Communications'),(305,'SPA','Hispanic &Latin Amer Cult &Civ'),(306,'BUS','Project & Contract Management'),(306,'MLG','Italian Culture & Civilization'),(306,'NUR','Care Indvls Chronic Health H'),(307,'CRJ','CRJ Data Base Operation'),(307,'HIS','Germany in the Modern Age'),(307,'MET','Electromechanical Control Sys'),(307,'MLG','French & Francphone Fic & Film'),(307,'NUR','Nursing Care of Child & Family'),(308,'CRJ','Forensic Technology'),(308,'EGL','The City;Lit,Art,Film&TheatrW'),(308,'IND','Occupational Safety'),(308,'MET','Machine & Product Design (Lab)'),(308,'MLG','Arabic Culture & Civilization'),(309,'AVN','Certified Flight InstrucGround'),(309,'EGL','Voices Black Amer:Poetry,Prose'),(309,'IND','Security/Fire Protection Sys'),(309,'MLG','Arabic Cinema'),(309,'SOC','Sport in Society: Sociological'),(310,'AVN','Certified Flight Instructor'),(310,'BUS','Principles of Taxation'),(310,'DEN','Teaching Strat. Health Care Ed'),(310,'EGL','Technical Writing'),(310,'POL','Intro to Political Theory'),(310,'SET','Software App for ERP Solutions'),(310,'SOC','Seminar in Sociology'),(311,'BUS','Organizational Behavior'),(311,'CRJ','Computer Security II'),(311,'HIS','China Since 1840'),(311,'MLG','Italian American Experiences'),(311,'PCM','Intro Writing Electronic Media'),(311,'PSY','Org\'al Behavior/Writ Intensive'),(311,'SMT','Sport Law'),(312,'CRJ','Computer Security III'),(312,'MLG','Contmp LatinAmer Short Stories'),(313,'PCM','Communication Theory'),(314,'CRJ','Security Law and Policy'),(314,'EGL','Major Authors in World Lit'),(314,'MET','Applied Thermodynamics'),(315,'IND','Facilities Planning'),(315,'MTH','History of Mathematics'),(315,'PCM','Research Techniques'),(315,'PSY','Abnormal Psychology'),(316,'BCS','PERL Programming'),(316,'EGL','Women in Modern Literature'),(316,'IND','Customer Relations & Quality'),(316,'MLG','French Fables and Folktales'),(317,'BCS','Enterprise Resource Planning'),(317,'BUS','Enterprise Resource Planning'),(317,'HIS','Irish History'),(317,'IND','Automotive Financing & Leasing'),(319,'EGL','Modern Drama'),(320,'BCS','Scaling Networks'),(320,'BUS','International Marketing'),(320,'HOR','Public Garden Management'),(320,'MLG','Latino Writers in the U.S.'),(320,'PCM','Communications in Business I'),(320,'SET','Software App/Supply Chain Mngt'),(320,'SMT','Athletic Administration'),(320,'TEL','Wireless Communications'),(321,'BCS','Connecting Networks'),(321,'BUS','International Law'),(321,'ECO','Engineering Economics'),(322,'AVN','Advanced Aircraft Systems'),(322,'BUS','International Management'),(322,'MTH','Advanced Mathematical Analysis'),(323,'CRJ','Network Defense'),(323,'EGL','Major Authors:British Literatu'),(323,'PHY','Electromagnetic Theory'),(324,'PCM','Report Writing & Tech Communic'),(325,'PCM','Writing in Health and Disease'),(325,'TEL','Optical Comm & Systems Lab'),(327,'BUS','Risk Management & Insurance'),(327,'EET','Automated Test/Signl Proc. Lab'),(328,'PCM','Advanced Writing & Editing'),(329,'PCM','Legal Writing and Analysis'),(330,'BIO','Principles of Ecology'),(330,'ECO','Modern Economic Thought'),(330,'EGL','Classical Greek Tragedy'),(330,'HOR','Weed Science & Management Lab'),(330,'PSY','Organization Training & Devel'),(330,'SPE','Professional &Technical Speech'),(331,'EGL','Death,Madness&Sex:Victorians'),(331,'PCM','Advanced Oral Communications'),(331,'PSY','Industrial/Org Psychology'),(331,'SPE','Advanced Oral Communications'),(332,'VIS','Graphic Design III'),(333,'PHY','Modern Physics'),(334,'VIS','Design Production III'),(335,'SMT','Special Topics in Sport'),(336,'VIS','Advertising I'),(340,'BIO','Biopharmaceutical Regulation'),(340,'SMT','Sport Facility Management'),(340,'VIS','Industry Preparation'),(341,'HIS','Terrorism and the Modern World'),(342,'ECO','Financial Economics'),(342,'HIS','The History of Television'),(342,'SOC','SOC:Deviance,Crime,Sex&Drugs'),(343,'BIO','Principles of Genetics'),(343,'PCM','Special Topics: PCM'),(344,'BIO','Principles of Genetics Labora'),(345,'BCS','JAVA Programming'),(345,'BIO','Introduction to Bioinformatics'),(346,'MTH','Continuous Time Finance'),(346,'PCM','Special Topics: PCM'),(346,'VIS','Advertising II'),(348,'BIO','Cell Biology'),(348,'PCM','Special Topics'),(349,'BIO','Cell Biology Laboratory'),(349,'PCM','Special Topics'),(350,'ARC','Arch Theory & Design Factors'),(350,'BCS','Web Database Development'),(350,'PCM','Special Topics'),(350,'SMT','International Sport Management'),(350,'SOC','Global Social Change'),(351,'MET','Comp Aided Manufacturing (CAM)'),(351,'PCM','Special Topics'),(351,'SOC','Global Hlth Sys:A Soc Approach'),(354,'MTH','Principles of Real Analysis'),(356,'VIS','Internship I'),(357,'CON','Quantity Surveying and Costing'),(357,'VIS','Internship II'),(360,'BCS','Programming in SQL'),(360,'BIO','Principals of Immunobiology'),(360,'BUS','Leadership Theories Practices'),(360,'ECO','Introduction: Experimental ECO'),(360,'MTH','Appl Probability & Statistics'),(361,'CON','Bldg/Environmental Codes-Regs'),(361,'SOC','Gender Theory'),(364,'ARC','Site Design and Construction'),(365,'BIO','Neurology of Pain'),(365,'MTH','Vector Calculus'),(366,'HOR','Special Topics in Horticulture'),(370,'BCS','Data Structures'),(370,'HOR','Landscape Professional Practic'),(370,'POL','International Relations'),(371,'AVN','Airport Planning'),(372,'HOR','Site Engineering I Lab'),(378,'BCS','Information Security'),(379,'BUS','Business Internship'),(380,'BIO','Pre-Professional Experience I'),(380,'CHM','Biochemistry'),(381,'BIO','Pre-Professional Experience II'),(381,'CHM','Advanced Biochemistry'),(390,'BCS','Database Admin & Security'),(390,'BUS','Selected Topics in Bus Mngmt'),(390,'GEO','Special Topics in Geography'),(390,'MTH','Methods in Operations Research'),(393,'POL','Politics& Popular Culture'),(399,'POL','NYS Legislative Intership'),(400,'AVN','Aviation Law'),(400,'BUS','Quality Techniques'),(400,'SET','Network Planning & Implementat'),(400,'STS','Senior SeminarScience,Tech,Soc'),(401,'AVN','Aviation Economics'),(401,'NUR','Modes Inquiry in Nursing'),(401,'STS','InternshipScience Tech Society'),(402,'CON','Civil Engineer Material Lab'),(402,'DEN','Gerontlgy/Special Need Patient'),(402,'IND','Facility Maintenance Mgmt'),(402,'NUR','Community & Mental Health NUR'),(402,'SET','SoftwareApp Stat Analysis Manu'),(402,'STS','InternshipScience Tech Society'),(403,'STS','Internship'),(404,'BUS','Financial Markets & Inst.'),(404,'NUR','Nurse as Advocate&Change Agent'),(404,'STS','Internship'),(405,'IND','HVAC Systems'),(405,'MET','Dynamics'),(405,'MTH','Seminar in Applied Mathematics'),(405,'NUR','Nursing Prac: Special Topics'),(406,'BUS','Business Organization Law'),(406,'CON','Advanced Project Planning&Sche'),(406,'CRJ','Crime Analysis & Mapping'),(406,'DEN','Proposals & Grant Mngmt Health'),(406,'IND','Energy Management'),(406,'MET','Electronic Packaging Applicati'),(406,'NUR','Senior Leadership Practicum'),(407,'CON','Building Commissioning'),(407,'CRJ','Crime Prevention Systems (Lab)'),(408,'IND','Automotive Business Management'),(409,'BUS','Strategic Management'),(409,'CON','Structural Design'),(409,'DEN','Dental Hygiene Practicum'),(409,'SMT','Strategic Sport Management'),(410,'AVN','Comm.Multi-Eng PilotRating'),(410,'CRJ','Senior Proj Writing Intensive'),(410,'MET','SeniorProject-WritingIntensive'),(410,'SET','Senior Project-Writing Intense'),(411,'AVN','Certified Flight-Instrumnt'),(411,'BUS','Financial Statement Analysis'),(411,'MET','Applied Heat Transfer'),(412,'AVN','Certified Flight-Multi Engine'),(412,'BUS','Business, Government & Society'),(414,'BIO','Microbiology'),(414,'PSY','Applied Personnel Psychology'),(414,'VIS','Interaction Design'),(415,'BIO','Human Virology'),(415,'MET','Robotics (Lab)'),(417,'AVN','Homeland Security in Aviation'),(418,'VIS','Portfolio'),(420,'PCM','Advanced Tech Comminucations'),(420,'SMT','Current Topics in Sport'),(421,'BCS','Android Mobile Application Dev'),(421,'CRJ','Physical Security II'),(422,'BCS','iOS Mobile Application Develop'),(424,'AVN','Adv. Avionics & Cockpit Autmtn'),(425,'AVN','Safety of Flight'),(425,'MLT','Labortary Research&Education'),(425,'PCM','Documentation Procedures'),(426,'EET','Digital Communications'),(426,'PCM','Culture and Communication'),(426,'VIS','Senior Project II'),(428,'MLT','Advanced Immunohematology'),(428,'PCM','Grant Writing'),(430,'BCS','Senior Project (Writing Int)'),(435,'ECO','Evironmental Economic & Policy'),(440,'AVN','Commuter Turboprop Training'),(440,'BCS','CPIS Internship'),(440,'EET','Data Communications & Network'),(440,'SMT','Sport Management Internship'),(441,'BIO','Molecular Biology Lab'),(443,'AVN','Specialty Flying'),(443,'MLT','Clinical Pathophysiology'),(443,'PSY','Applied PSY:Int Sr Pro II'),(447,'AVN','Capstone Prof Pilot Seminar'),(450,'PCM','Internship/Tech Communication'),(451,'BCS','Special Topics'),(452,'EET','Design Project (Writing Int)'),(452,'TEL','Telecomm Senior Project'),(455,'BIO','Validation&Regulatory Affairs'),(460,'BCS','Ind Study- Writing Intensive'),(460,'BUS','Leadership & Ethics'),(460,'PCM','Internship II'),(460,'TEL','Intro: Telecommunications Sys'),(470,'AVN','Airport Operations'),(470,'BUS','Advanced Accounting'),(470,'TEL','Telecomm Policy & Standards'),(471,'AVN','Aviation AdministrationSeminar'),(474,'HOR','Design Capstone Project'),(475,'HOR','Horticulture Practicum'),(476,'ARC','Architectural Design IV'),(476,'BIO','Bioscience Internship A1'),(476,'VIS','Agency II'),(478,'BIO','Bioscience Internship B1'),(479,'BIO','Bioscience Internship B2'),(479,'BUS','Business Internship II'),(480,'BIO','Bioscience Internship I'),(480,'PHY','Physics Research I'),(481,'BIO','Bioscience Internship II'),(481,'MLT','Advanced Pract Immunohematolog'),(481,'PHY','Physics Research II'),(482,'BIO','Bioscience Internship III'),(482,'MLT','Adv Prac in Clinical Chemistry'),(483,'BIO','Bioscience Internship IV'),(483,'BUS','Business Internship II'),(483,'MLT','Prac in Molecular Pathology'),(484,'BIO','Bioscience Internship V'),(484,'MLT','Adv Prac Clinical Microbiology'),(485,'SMT','Senior Seminar in Sport'),(486,'ARC','Architectural Design V'),(490,'AVN','Aviation Internship'),(490,'CRJ','Topics in Criminal Justice'),(491,'ECO','Applied Eco Analysis'),(493,'AET','Special Topics:Hybrid Elec Veh'),(494,'BUS','Seminar Global-Int\'l Bus Mngmt'),(496,'CON','Capstone Project');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `departmentID` varchar(3) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`departmentID`),
  UNIQUE KEY `idsubjects_UNIQUE` (`departmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES ('AET','Automotive Technology'),('ANT','Anthropology'),('ARA','Arabic'),('ARC','Architectural Technology'),('ART','Art History'),('AVN','Aviation'),('BCS','Computer Systems'),('BIO','Biology'),('BUS','Business Management'),('CHI','Chinese'),('CHM','Chemistry'),('CON','Construction/Architectural'),('CRJ','Criminal Justice'),('DEN','Dental Hygiene'),('ECO','Economics'),('EET','Electrical Engineering Technology'),('EGL','English'),('ENV','Environmental Studies'),('FRE','French'),('FRX','Freshman Experience'),('GEO','Geography'),('GER','German'),('GPH','Computing Graphics'),('HIS','History'),('HOR','Horticulture'),('HST','Health Studies'),('HUM','Humanities'),('IND','Industrial Technology'),('ITA','Italian'),('MET','Mechanical Engineering Technology'),('MLG','Modern Languages'),('MLT','Medical Laboratory Technology'),('MTH','Mathematics'),('MUS','Music'),('NUR','Nursing'),('PCM','Professional Communications'),('PED','Physical Education'),('PHI','Philosophy'),('PHY','Physics & Physical Science'),('POL','Politics'),('PSY','Psychology'),('SET','Software Technology'),('SMT','Sport Management'),('SOC','Sociology'),('SPA','Spanish'),('SPE','Speech'),('STS','Science, Technology and Society'),('TEL','Telecommunications'),('THE','Theatre'),('VIS','Visual Communications');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(50) NOT NULL,
  `chatID` int(11) NOT NULL,
  `body` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`messageID`),
  KEY `chat_idx` (`chatID`),
  CONSTRAINT `chat` FOREIGN KEY (`chatID`) REFERENCES `chats` (`chatID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (2,'o@farmingdale.edu',1,'sfasdfsdf','2016-04-26 17:41:36'),(3,'o@farmingdale.edu',1,'fgff','2016-04-26 17:41:46'),(4,'o@farmingdale.edu',1,'vvvvvvvvvvvvvvv','2016-04-26 17:41:51'),(5,'e@farmingdale.edu',48,'test23222222','2016-04-26 17:52:06'),(6,'e@farmingdale.edu',48,'test4','2016-04-26 17:55:51'),(7,'e@farmingdale.edu',47,'test5','2016-04-26 17:55:57'),(8,'e@farmingdale.edu',48,'test6','2016-04-26 17:56:06');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(50) NOT NULL,
  `topicID` varchar(20) DEFAULT NULL,
  `departmentID` varchar(3) NOT NULL,
  `title` varchar(45) NOT NULL,
  `body` longtext NOT NULL,
  `date` datetime NOT NULL,
  `textbook` bigint(13) DEFAULT NULL,
  `classNum` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`postID`),
  UNIQUE KEY `postID_UNIQUE` (`postID`),
  KEY `userID_idx` (`userID`),
  KEY `department_idx` (`departmentID`),
  CONSTRAINT `departmentID` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`departmentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'o@farmingdale.edu',NULL,'AET','dejsdjs','qdswkjwefsf','2016-04-16 12:37:48',1249821304,NULL),(2,'e@farmingdale.edu',NULL,'POL','search test','dsfedrgfsdthrtds hdfg hrstfg hfg hdsfg ','2016-04-24 13:54:22',2147483647,NULL),(3,'e@farmingdale.edu',NULL,'AET','11111','sdfsdfsdfsdf','2016-04-24 14:00:19',2147483647,NULL),(4,'e@farmingdale.edu',NULL,'AET','dsfsdf','gsfgsdfg','2016-04-24 14:01:23',2147483647,NULL),(5,'e@farmingdale.edu',NULL,'AET','testing sortware something something','regdsaf gsdf g adf gae rg','2016-04-24 14:07:43',521337860,NULL),(6,'o@farmingdale.edu',NULL,'PSY','asudaisjddhjoais','dsgfagadrgdfg','2016-04-24 15:49:30',9781467023030,NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `ratingID` int(11) NOT NULL AUTO_INCREMENT,
  `rater` varchar(50) NOT NULL,
  `ratee` varchar(50) NOT NULL,
  `rating` int(1) NOT NULL,
  `note` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ratingID`),
  KEY `rater_idx` (`rater`),
  KEY `ratee_idx` (`ratee`),
  CONSTRAINT `ratee` FOREIGN KEY (`ratee`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `rater` FOREIGN KEY (`rater`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (1,'o@farmingdale.edu','e@farmingdale.edu',5,'blah'),(2,'o@farmingdale.edu','e@farmingdale.edu',5,'blah'),(3,'o@farmingdale.edu','e@farmingdale.edu',2,'blnrtgsdfgah'),(4,'o@farmingdale.edu','e@farmingdale.edu',2,'blah'),(5,'o@farmingdale.edu','e@farmingdale.edu',1,'blagdfgh'),(6,'o@farmingdale.edu','e@farmingdale.edu',1,'bldfah'),(7,'o@farmingdale.edu','e@farmingdale.edu',5,'blah'),(8,'e@farmingdale.edu','o@farmingdale.edu',5,'blah'),(9,'e@farmingdale.edu','o@farmingdale.edu',2,'blah'),(10,'e@farmingdale.edu','o@farmingdale.edu',2,'blah'),(11,'e@farmingdale.edu','o@farmingdale.edu',4,'blah'),(12,'e@farmingdale.edu','o@farmingdale.edu',5,'blah'),(13,'e@farmingdale.edu','o@farmingdale.edu',1,'blah'),(14,'e@farmingdale.edu','o@farmingdale.edu',4,'blah'),(15,'e@farmingdale.edu','o@farmingdale.edu',4,'blah'),(16,'e@farmingdale.edu','o@farmingdale.edu',4,'blah'),(17,'e@farmingdale.edu','o@farmingdale.edu',5,'blah'),(18,'e@farmingdale.edu','o@farmingdale.edu',5,'blah'),(19,'e@farmingdale.edu','o@farmingdale.edu',3,'blah');
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `replies` (
  `replyID` int(11) NOT NULL AUTO_INCREMENT,
  `postID` int(11) NOT NULL,
  `body` longtext NOT NULL,
  `user` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`replyID`),
  KEY `postID_idx` (`postID`),
  KEY `user_idx` (`user`),
  CONSTRAINT `postID` FOREIGN KEY (`postID`) REFERENCES `posts` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user` FOREIGN KEY (`user`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `textbooks`
--

DROP TABLE IF EXISTS `textbooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `textbooks` (
  `ISBN` bigint(13) NOT NULL,
  `title` varchar(45) NOT NULL,
  `edition` int(11) DEFAULT NULL,
  `price_avg` varchar(45) DEFAULT NULL,
  `publishDate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ISBN`),
  UNIQUE KEY `ISBN_UNIQUE` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `textbooks`
--

LOCK TABLES `textbooks` WRITE;
/*!40000 ALTER TABLE `textbooks` DISABLE KEYS */;
/*!40000 ALTER TABLE `textbooks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `textcourse`
--

DROP TABLE IF EXISTS `textcourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `textcourse` (
  `ISBN` bigint(13) NOT NULL,
  `Course` int(3) unsigned zerofill NOT NULL,
  `Department` varchar(3) NOT NULL,
  `Notes` longtext,
  PRIMARY KEY (`ISBN`,`Course`,`Department`),
  KEY `tcDept_idx` (`Department`),
  KEY `tcCourse_idx` (`Course`),
  CONSTRAINT `tcCourse` FOREIGN KEY (`Course`) REFERENCES `courses` (`courseID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tcDept` FOREIGN KEY (`Department`) REFERENCES `courses` (`department`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tcISBN` FOREIGN KEY (`ISBN`) REFERENCES `textbooks` (`ISBN`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `textcourse`
--

LOCK TABLES `textcourse` WRITE;
/*!40000 ALTER TABLE `textcourse` DISABLE KEYS */;
/*!40000 ALTER TABLE `textcourse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userID` varchar(50) NOT NULL,
  `userPass` varchar(20) NOT NULL,
  `fName` varchar(20) DEFAULT NULL,
  `lName` varchar(20) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `teacher` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userID_UNIQUE` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('','','','',0,0,0),('$email','$pass','$fName','$lName',0,0,0),('$_POST[email]','$_POST[pass]','$_POST[fName]','$_POST[lName]',0,0,0),('aaaaa@farmingdale.edu','aaaaaaaa','aaaaa','aaaaaa',0,0,0),('asdasd@farmingdale.edu','sdofcjweoij','asdasd','asdasd',0,0,0),('DJIE@farMiNgDaLe.EDu','oooooooo','weifuh','iquweh',0,0,0),('e@farmingdale.edu','e1e1e1e1','e','e',0,1,0),('eargdsfg@farmingdale.edu','sivcunrewjfg','serggvdfv','evrtsvsdfv',0,1,0),('ed@farmingdale.edu','asdasdasd','erqgdfgqewg','rtegerqwgf',0,0,0),('ijnijnijn@farmingdale.edu','ijnijnijn','john','john',0,0,0),('john','john','john','john',0,0,0),('john1','john2','john3','john4',0,0,0),('o1@farmingdale.edu','oooooooo','o','o',0,0,0),('o2@farmingdale.edu','oooooooo','o','o',0,0,0),('o@farmingdale.edu','oooooooo','o','o',1,0,0),('p@farmingdale.edu','pppppppp','fdsgsdg','dsgdr',0,0,0),('poipoi@farmingdale.edu','poipoipoi','poi','poi',0,0,1),('qqqqq@farmingdale.edu','qqqqqqqq','iuydeoiwuh','ijnsadociuhe',0,0,0),('sdkjfnwe@farmingdale.edu','00000000','ewfnkjsdn','ijndsjf',0,0,0),('surf@farmingdale.edu','surfsurf','dwef','gtdsgdf',0,0,0),('t.testington@farmingdale.edu','workthistime','john','john',0,0,0),('t@FaRMINGDALE.Edu','tttttttt','cefds','ergsdfg',1,0,0),('test123','john','john','john',0,0,0),('test1234','test1233','john','john',0,0,1),('test12345','$_POST[pass]','john','john',0,0,0),('test@farmingdale.edu','test1234','test','testerson',0,0,0),('user123@farmingdale.edu','poipoipoi','akjhdk','kdsaflkjfd',0,0,0),('wahwah@farmingdale.edu','wahwahwah','wahwah','wahwah',0,0,0),('zzzzz@farmingdale.edu','zzzzzzzz','zzzzz','zzzzz',0,1,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'textbookdb'
--

--
-- Dumping routines for database 'textbookdb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-27 22:30:50
