-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 08:23 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `CODE` int(15) NOT NULL,
  `HOSPITALS_SCHEDULE_CODE` int(15) NOT NULL,
  `PATIENTS_CODE` int(15) NOT NULL,
  `PROBLEM` text NOT NULL,
  `REMARKS` text NOT NULL,
  `APPOINT_DATE` date DEFAULT NULL,
  `STATUS` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`CODE`, `HOSPITALS_SCHEDULE_CODE`, `PATIENTS_CODE`, `PROBLEM`, `REMARKS`, `APPOINT_DATE`, `STATUS`) VALUES
(1, 1, 2, 'throat problems are common. You\'ve probably had a sore throat. The cause is usually a viral infection, but other causes include allergies, infection with strep bacteria or the leaking of stomach acids back up into the esophagus.', 'Thanks!', '2018-05-23', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `app_view`
-- (See below for the actual view)
--
CREATE TABLE `app_view` (
`SCHEDULE_CODE` int(15)
,`DOCTORS_CODE` int(15)
,`TIME` varchar(50)
,`DAYS` varchar(50)
,`FEE` int(11)
,`HOSPITAL_CODE` int(15)
,`HOSPITAL` varchar(50)
,`AREA` varchar(60)
,`CONTACT_NUMBER` varchar(15)
,`EMAIL` varchar(50)
,`APP_CODE` int(15)
,`PATIENTS_CODE` int(15)
,`PROBLEM` text
,`REMARKS` text
,`APPOINT_DATE` date
,`APP_STATUS` int(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_detail`
--

CREATE TABLE `doctor_detail` (
  `CODE` int(15) NOT NULL,
  `DOCTORS_CODE` int(15) NOT NULL,
  `SPECIALIZATION_CODE` int(11) NOT NULL,
  `BACKGROUND` text NOT NULL,
  `CONSULT_TYPE` text NOT NULL,
  `REG_CODE` varchar(30) NOT NULL,
  `STATUS` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_detail`
--

INSERT INTO `doctor_detail` (`CODE`, `DOCTORS_CODE`, `SPECIALIZATION_CODE`, `BACKGROUND`, `CONSULT_TYPE`, `REG_CODE`, `STATUS`) VALUES
(1, 1, 4, 'Physicians trained in diagnosis and treatment of disorders of the ear, nose, throat and related structures of head and neck are called ENT specialists or otolaryngologists. They diagnose and manage diseases affecting ear, nose, sinuses, larynx, mouth, and throat as well as related structures of head and neck. Diseases they may deal with include hearing loss, ear infections, balance disorders, tinnitus, cranial nerve disorders, sinusitis, allergies, smell disorders, polyps and nasal obstructions. Voice and swallowing disorders are also addressed by otolaryngologists. They are also specifically trained to cure and manage infections, benign and malignant tumors, facial trauma and deformities. These are the ones who can perform cosmetic, plastic and reconstructive surgery. Here is a list of best ENT consultants in Faisalabad.', 'Audio,in Person', '323-434-fgh', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `doctor_view`
-- (See below for the actual view)
--
CREATE TABLE `doctor_view` (
`DTL_CODE` int(15)
,`BACKGROUND` text
,`CONSULT_TYPE` text
,`REG_CODE` varchar(30)
,`STATUS` int(1)
,`SP_NAME` varchar(50)
,`ABBREVATION` varchar(50)
,`BODY_PART` varchar(50)
,`DOCTOR_CODE` int(15)
,`NAME` varchar(50)
,`FATHER_NAME` varchar(50)
,`EMAIL` varchar(50)
,`IMG` text
,`CONTACT_NUMBER` varchar(15)
,`ADDRESS` text
);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `CODE` int(15) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `AREA` varchar(60) NOT NULL,
  `CONTACT_NUMBER` varchar(15) NOT NULL,
  `EMAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`CODE`, `NAME`, `AREA`, `CONTACT_NUMBER`, `EMAIL`) VALUES
(1, 'DHQ', 'madina town', '31121121', 'khadim@gmail.com'),
(4, 'National', 'Gulberg', '112233', 'ali@gmail.com'),
(7, 'Faisal', 'peoples colony', '11223344', 'faisalhospital@gmail.com'),
(8, 'Allied', 'sargodha road', '332251', 'alliedhospital@gmail'),
(9, 'SOCIAL SECURITY', 'MADINA TOWN ', '03217822075', 'socialsecurity@gmail.com');

-- --------------------------------------------------------

--
-- Stand-in structure for view `hospital_and_schedule`
-- (See below for the actual view)
--
CREATE TABLE `hospital_and_schedule` (
`SCHEDULE_CODE` int(15)
,`DOCTORS_CODE` int(15)
,`TIME` varchar(50)
,`DAYS` varchar(50)
,`FEE` int(11)
,`HOSPITAL_CODE` int(15)
,`HOSPITAL` varchar(50)
,`AREA` varchar(60)
,`CONTACT_NUMBER` varchar(15)
,`EMAIL` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_schedule`
--

CREATE TABLE `hospital_schedule` (
  `CODE` int(15) NOT NULL,
  `HOSPITALS_CODE` int(15) NOT NULL,
  `DOCTORS_CODE` int(15) NOT NULL,
  `TIME` varchar(50) NOT NULL,
  `DAYS` varchar(50) NOT NULL,
  `FEE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_schedule`
--

INSERT INTO `hospital_schedule` (`CODE`, `HOSPITALS_CODE`, `DOCTORS_CODE`, `TIME`, `DAYS`, `FEE`) VALUES
(1, 4, 1, '06:00 PM TO 09:00 PM', 'Monday TO Thursday', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `CODE` int(15) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `FATHER_NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(60) NOT NULL,
  `CNIC` varchar(15) NOT NULL,
  `CONTACT_NUMBER` varchar(15) NOT NULL,
  `ADDRESS` text NOT NULL,
  `IMG` text NOT NULL,
  `SECURITY_QUE` text NOT NULL,
  `SECURITY_ANS` text,
  `TYPE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`CODE`, `NAME`, `FATHER_NAME`, `EMAIL`, `PASSWORD`, `CNIC`, `CONTACT_NUMBER`, `ADDRESS`, `IMG`, `SECURITY_QUE`, `SECURITY_ANS`, `TYPE`) VALUES
(1, 'tehseen iqbal', 'M Iqbal', 'tehseeniqbal9090@gmail.com', '$2y$10$9FmMH10.7awu//1TizEe4eSS.7cvjw7bJZ3/EES3rJPIb8jKuVNPe', '33100-4567432-7', '03004567654', '52-p madina town', 'deaedb88bbf20469c5c529fd7047fd63.png', 'What was your childhood nickname?', 'shani', 'doctor'),
(2, 'Mohsin', 'Raza', 'mohsin@gmail.com', '$2y$10$EotPScke.WLJXLjasAplcOYA.d2aYspoHj0buWp.xFoUJUKax4s0i', '33100-8549854-4', '03217856432', 'Madina town', 'd7ff5923ad847538ad6409168e94281a.jpg', 'What was your childhood nickname?', NULL, 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `CODE` int(15) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ABBREVATION` varchar(50) NOT NULL,
  `BODY_PART` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`CODE`, `NAME`, `ABBREVATION`, `BODY_PART`) VALUES
(1, 'eye', 'ENT', 'throat'),
(2, 'Ear', 'ENT', 'ear'),
(3, 'Nose', 'ENT', 'nose'),
(4, 'Throat', 'ENT', 'throat'),
(5, 'Neurology', 'Neuro', 'mind'),
(7, 'skin', 'skin', 'skin'),
(9, 'choo mantar', 'shuummm', 'gaieb'),
(10, 'head', 'head', 'head');

-- --------------------------------------------------------

--
-- Structure for view `app_view`
--
DROP TABLE IF EXISTS `app_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `app_view`  AS  (select `s`.`CODE` AS `SCHEDULE_CODE`,`s`.`DOCTORS_CODE` AS `DOCTORS_CODE`,`s`.`TIME` AS `TIME`,`s`.`DAYS` AS `DAYS`,`s`.`FEE` AS `FEE`,`h`.`CODE` AS `HOSPITAL_CODE`,`h`.`NAME` AS `HOSPITAL`,`h`.`AREA` AS `AREA`,`h`.`CONTACT_NUMBER` AS `CONTACT_NUMBER`,`h`.`EMAIL` AS `EMAIL`,`a`.`CODE` AS `APP_CODE`,`a`.`PATIENTS_CODE` AS `PATIENTS_CODE`,`a`.`PROBLEM` AS `PROBLEM`,`a`.`REMARKS` AS `REMARKS`,`a`.`APPOINT_DATE` AS `APPOINT_DATE`,`a`.`STATUS` AS `APP_STATUS` from ((`hospital` `h` join `hospital_schedule` `s`) join `appointments` `a`) where ((`h`.`CODE` = `s`.`HOSPITALS_CODE`) and (`a`.`HOSPITALS_SCHEDULE_CODE` = `s`.`CODE`))) ;

-- --------------------------------------------------------

--
-- Structure for view `doctor_view`
--
DROP TABLE IF EXISTS `doctor_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doctor_view`  AS  (select `d`.`CODE` AS `DTL_CODE`,`d`.`BACKGROUND` AS `BACKGROUND`,`d`.`CONSULT_TYPE` AS `CONSULT_TYPE`,`d`.`REG_CODE` AS `REG_CODE`,`d`.`STATUS` AS `STATUS`,`s`.`NAME` AS `SP_NAME`,`s`.`ABBREVATION` AS `ABBREVATION`,`s`.`BODY_PART` AS `BODY_PART`,`l`.`CODE` AS `DOCTOR_CODE`,`l`.`NAME` AS `NAME`,`l`.`FATHER_NAME` AS `FATHER_NAME`,`l`.`EMAIL` AS `EMAIL`,`l`.`IMG` AS `IMG`,`l`.`CONTACT_NUMBER` AS `CONTACT_NUMBER`,`l`.`ADDRESS` AS `ADDRESS` from ((`doctor_detail` `d` join `login` `l`) join `specialization` `s`) where ((`d`.`DOCTORS_CODE` = `l`.`CODE`) and (`d`.`SPECIALIZATION_CODE` = `s`.`CODE`))) ;

-- --------------------------------------------------------

--
-- Structure for view `hospital_and_schedule`
--
DROP TABLE IF EXISTS `hospital_and_schedule`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hospital_and_schedule`  AS  (select `s`.`CODE` AS `SCHEDULE_CODE`,`s`.`DOCTORS_CODE` AS `DOCTORS_CODE`,`s`.`TIME` AS `TIME`,`s`.`DAYS` AS `DAYS`,`s`.`FEE` AS `FEE`,`h`.`CODE` AS `HOSPITAL_CODE`,`h`.`NAME` AS `HOSPITAL`,`h`.`AREA` AS `AREA`,`h`.`CONTACT_NUMBER` AS `CONTACT_NUMBER`,`h`.`EMAIL` AS `EMAIL` from (`hospital` `h` join `hospital_schedule` `s`) where (`h`.`CODE` = `s`.`HOSPITALS_CODE`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`CODE`);

--
-- Indexes for table `doctor_detail`
--
ALTER TABLE `doctor_detail`
  ADD PRIMARY KEY (`CODE`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`CODE`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `hospital_schedule`
--
ALTER TABLE `hospital_schedule`
  ADD PRIMARY KEY (`CODE`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`CODE`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`CODE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `CODE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_detail`
--
ALTER TABLE `doctor_detail`
  MODIFY `CODE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `CODE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hospital_schedule`
--
ALTER TABLE `hospital_schedule`
  MODIFY `CODE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `CODE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `CODE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
