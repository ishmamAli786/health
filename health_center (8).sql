-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2019 at 10:47 AM
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
  `REPORT` text NOT NULL,
  `APPOINT_DATE` date DEFAULT NULL,
  `STATUS` int(1) NOT NULL DEFAULT '0',
  `med` text NOT NULL,
  `tests` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`CODE`, `HOSPITALS_SCHEDULE_CODE`, `PATIENTS_CODE`, `PROBLEM`, `REMARKS`, `REPORT`, `APPOINT_DATE`, `STATUS`, `med`, `tests`) VALUES
(11, 5, 3, 'i am sick.', 'zzzzz', '4ba222bb745942811d026058c2bcee05.png', '0000-00-00', 2, '', ''),
(12, 5, 3, 'ggggg', 'hhhhhh', '515c849c759d7b2f5cb1acce4d8907cf.jpg', '2019-03-22', 2, '', ''),
(13, 5, 3, 'nnnnnnnnnnnnnnnnnnnn', 'soft', '8f637159b1669a06ba57ad67138e50c8.png', '2019-03-23', 2, '', ''),
(14, 5, 3, 'zzzzzzzzzzzzzzz', 'mm', '4f5ee660bf4ff0d9427e5c2a0a0f6fca.jpg', '2019-03-26', 2, '', ''),
(15, 5, 3, 'sssssssssssssssssss', 'g', '00fc2aa1ddcddaa922a71ce1d157b8f0.jpg', '2019-04-19', 2, '', ''),
(16, 5, 3, 'ggggggggggggggggggg', 'scscfascsac', '', '2019-03-23', 2, '', ''),
(17, 5, 3, 'ggggggggggggggggggg', '', '6459dd91cd098421f878fe5857798c4d.webp', '2019-04-29', 2, '', ''),
(18, 5, 3, 'rrrrrrrrrrrrrrrr', 'software', '', '2019-03-22', 2, '', ''),
(19, 5, 3, 'rrrrrrrrrrrrrrrr', 'software', '', '2019-03-22', 2, '', ''),
(20, 5, 3, 'ttttttttttttttttttttttttttt', '8', '', '2019-03-24', 2, '8', '8'),
(21, 5, 3, 'ttttttttttttttttttttttttttt', 'sdsd', '', '2019-03-24', 2, 'sdsa', 'sdsd'),
(22, 5, 3, 'zzzzzzzzzzz', 'm', '', '2019-03-26', 2, 'm', 'm'),
(23, 5, 3, 'zzzzzzzzzzz', 'ggggggggggg', '', '2019-03-26', 2, '', ''),
(24, 5, 3, 'hhhhhhhh', 'm', '', '2019-03-27', 2, 'm', 'm'),
(25, 5, 3, 'hhhhhhhh', 'df', '', '2019-03-27', 2, 'df', 'df'),
(26, 5, 3, 'hhhhhhhh', '', '', '2019-03-27', 0, '', ''),
(27, 5, 3, 'HHHHHHHHHHHHHHH', '', '', '2019-03-27', 0, '', ''),
(28, 5, 3, 'nnn', 'nnnnnnnnnnnnn', '', '2019-03-30', 2, '', ''),
(29, 5, 3, 'jjjjjjjjjjjjjjj', '', '', '2019-04-19', 0, '', ''),
(30, 5, 3, 'nnnnnn', '', '', '2019-04-19', 0, '', ''),
(31, 5, 3, 'chchchchchch', 'chchchhchchchchch', '0a3a3581c726717e6be2170f12942121.png', '2019-04-19', 2, '', ''),
(32, 5, 3, 'foot pain', '', '', '2019-04-19', 0, '', ''),
(33, 5, 3, 'leg pain', 'water', 'd5d93c045385a50fb869fef4e28e6570.webp', '2019-04-29', 2, 'water', 'yes'),
(34, 5, 3, 'leg pain 2', '2', 'd4e172250992da25b5dd49899355f5e0.ico', '2019-04-29', 2, '2', '2'),
(35, 5, 3, 'b', 'df', '', '2019-05-08', 2, 'df', 'df'),
(36, 5, 3, 'sore throat', '', '', '2019-05-30', 0, '', ''),
(37, 5, 3, 'sore throat', '', '', '2019-05-30', 0, '', ''),
(38, 5, 3, 'sore throat', '', '', '2019-05-30', 0, '', ''),
(39, 5, 3, 'thelmus', 'take two time medicines daily', 'b88a88db2a9c575931e1f7100c7c17f0.png', '2019-05-30', 2, 'nujghh,djjdjdjdj,undeddgdgdh', 'no need to tests'),
(40, 5, 3, 'mmm', '', '', '2019-05-30', 0, '', ''),
(41, 5, 3, 'llllllllllllllllll', '', '', '2019-05-31', 0, '', ''),
(42, 5, 3, 'uuuuuuuuuuuuuu', '', '', '2019-05-31', 0, '', ''),
(43, 5, 3, 'nnnnnnnnnnnnnnnnnnn', '', '', '2019-05-31', 0, '', ''),
(44, 5, 3, 'jjjjjj', '', '', '2019-06-01', 0, '', ''),
(45, 5, 3, 'iiiiiiiiiiiiiiiiiiii', '', '', '2019-06-10', 0, '', '');

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
,`NO_OF_APP` int(11)
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
,`REPORT` text
,`APP_STATUS` int(1)
,`med` text
,`tests` text
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
(3, 5, 1, 'MBBS ', 'Audio', '2015-ag-5566', 0);

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
(4, 'National Hospital  ', 'Gulberg', '112233', 'ali@gmail.com'),
(7, 'Faisal', 'peoples colony', '11223344', 'faisalhospital@gmail.com'),
(8, 'Allied', 'sargodha road', '332251', 'alliedhospital@gmail'),
(9, 'SOCIAL SECURITY', 'MADINA TOWN ', '03022261924', 'zeeshan@gmail.com');

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
,`NO_OF_APP` int(11)
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
  `FEE` int(11) NOT NULL,
  `NO_OF_APP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_schedule`
--

INSERT INTO `hospital_schedule` (`CODE`, `HOSPITALS_CODE`, `DOCTORS_CODE`, `TIME`, `DAYS`, `FEE`, `NO_OF_APP`) VALUES
(5, 4, 5, '10:00 AM TO 06:00 PM', 'Monday TO Friday', 1000, 5);

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
(3, 'Zeeshan Aslam', 'Muhammad Aslam', 'zeeshanch160@gmail.com', '$2y$10$M8Fa92m31FU8nfPOD/rivebO3nAZTAzZu2tIpXhXUSLbozLLwvmAG', '36401-6876717-9', '03022261924', 'lahore', '8b4beadf8aa35382fba599b48e97afee.jpg', 'What was your childhood nickname?', 'Ali', 'patient'),
(5, 'Zeeshan Aslam', 'Muhammad Aslam', 'zeeshanch170@gmail.com', '$2y$10$W3woXD4XpuPC5HXeA9ngIO/UaA245d1ezTjjPdbTC.gVcY.G6X8Dm', '31205-6665455-3', '03022261924', 'Gulshan Town', '52bf7dca549f03c08fc3260b3101bfc4.png', 'What was your childhood nickname?', 'Ali', 'doctor');

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `app_view`  AS  (select `s`.`CODE` AS `SCHEDULE_CODE`,`s`.`DOCTORS_CODE` AS `DOCTORS_CODE`,`s`.`TIME` AS `TIME`,`s`.`DAYS` AS `DAYS`,`s`.`FEE` AS `FEE`,`s`.`NO_OF_APP` AS `NO_OF_APP`,`h`.`CODE` AS `HOSPITAL_CODE`,`h`.`NAME` AS `HOSPITAL`,`h`.`AREA` AS `AREA`,`h`.`CONTACT_NUMBER` AS `CONTACT_NUMBER`,`h`.`EMAIL` AS `EMAIL`,`a`.`CODE` AS `APP_CODE`,`a`.`PATIENTS_CODE` AS `PATIENTS_CODE`,`a`.`PROBLEM` AS `PROBLEM`,`a`.`REMARKS` AS `REMARKS`,`a`.`APPOINT_DATE` AS `APPOINT_DATE`,`a`.`REPORT` AS `REPORT`,`a`.`STATUS` AS `APP_STATUS`,`a`.`med` AS `med`,`a`.`tests` AS `tests` from ((`hospital` `h` join `hospital_schedule` `s`) join `appointments` `a`) where ((`h`.`CODE` = `s`.`HOSPITALS_CODE`) and (`a`.`HOSPITALS_SCHEDULE_CODE` = `s`.`CODE`))) ;

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hospital_and_schedule`  AS  (select `s`.`CODE` AS `SCHEDULE_CODE`,`s`.`DOCTORS_CODE` AS `DOCTORS_CODE`,`s`.`TIME` AS `TIME`,`s`.`DAYS` AS `DAYS`,`s`.`FEE` AS `FEE`,`s`.`NO_OF_APP` AS `NO_OF_APP`,`h`.`CODE` AS `HOSPITAL_CODE`,`h`.`NAME` AS `HOSPITAL`,`h`.`AREA` AS `AREA`,`h`.`CONTACT_NUMBER` AS `CONTACT_NUMBER`,`h`.`EMAIL` AS `EMAIL` from (`hospital` `h` join `hospital_schedule` `s`) where (`h`.`CODE` = `s`.`HOSPITALS_CODE`)) ;

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
  MODIFY `CODE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `doctor_detail`
--
ALTER TABLE `doctor_detail`
  MODIFY `CODE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `CODE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hospital_schedule`
--
ALTER TABLE `hospital_schedule`
  MODIFY `CODE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `CODE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `CODE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
