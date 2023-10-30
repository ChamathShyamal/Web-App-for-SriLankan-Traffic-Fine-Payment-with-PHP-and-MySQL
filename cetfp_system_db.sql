-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2022 at 06:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cetfp_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `Fine_Id` int(11) NOT NULL,
  `Fine_Name` varchar(250) NOT NULL,
  `Fine_Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`Fine_Id`, `Fine_Name`, `Fine_Amount`) VALUES
(1, 'Identification Plates', 1000),
(2, 'Not Carrying RL', 1000),
(3, 'Contravening RL Provisions', 1000),
(4, 'Driving Public Vehicles without DL', 1000),
(5, 'Not Carrying DL', 1000),
(6, 'Not having an instructors license', 2000),
(7, 'Contravening Speed Limits', 3000),
(8, 'Disobeying Road rules', 2000),
(9, 'Signals by driver', 1000),
(10, 'Reversing for a long Distance', 1000),
(11, 'Sound or Light warnings', 1000),
(12, 'Excessive emmission of smoke', 1000),
(13, 'Riding on running boards', 500),
(14, 'No of persons in front seat', 1000),
(15, 'No use of seat belts', 1000),
(16, 'Not wearing helmets', 1000),
(17, 'Distributing advertisements ', 1000),
(18, 'Excessive use of noice', 1000),
(19, 'Disobeying directions/ officers/signals ', 1000),
(20, 'Compliance with traffic signals', 1000),
(21, 'Halting or Parking', 1000),
(23, 'Non Use of Precautions when Parking', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `License_Id` int(11) NOT NULL,
  `License_No` int(11) NOT NULL,
  `Received_Date` date NOT NULL,
  `Handout_Date` date NOT NULL,
  `Competent_to_Drive` varchar(50) NOT NULL,
  `Offender_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`License_Id`, `License_No`, `Received_Date`, `Handout_Date`, `Competent_to_Drive`, `Offender_ID`) VALUES
(2, 2000235465, '2022-02-16', '2022-02-19', 'A', 4),
(3, 2147483647, '2022-02-16', '2022-02-16', 'C', 8),
(4, 1234567899, '2022-02-17', '2022-02-16', 'A', 10),
(5, 1234567899, '2022-02-17', '2022-02-16', 'A', 14),
(6, 2147483647, '2022-02-17', '2022-02-17', 'A', 15);

-- --------------------------------------------------------

--
-- Table structure for table `offenders`
--

CREATE TABLE `offenders` (
  `Offender_ID` int(11) NOT NULL,
  `Offender_NIC` varchar(250) NOT NULL,
  `First_Name` varchar(250) NOT NULL,
  `Last_Name` varchar(250) NOT NULL,
  `Street_Number` int(11) NOT NULL,
  `Street_Name` varchar(200) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Telephone` int(11) NOT NULL,
  `Vehicle_Number` varchar(150) NOT NULL,
  `Date_of_Offense` date NOT NULL,
  `Due_Court_Date` date NOT NULL,
  `Offender_Time` time NOT NULL,
  `Place` varchar(250) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Fine_Id` int(11) NOT NULL,
  `Officer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offenders`
--

INSERT INTO `offenders` (`Offender_ID`, `Offender_NIC`, `First_Name`, `Last_Name`, `Street_Number`, `Street_Name`, `City`, `Email`, `Telephone`, `Vehicle_Number`, `Date_of_Offense`, `Due_Court_Date`, `Offender_Time`, `Place`, `Gender`, `Fine_Id`, `Officer_ID`) VALUES
(4, '200011456395', 'Hasaranga', 'Fernando', 12, 'Church road', 'Negombo', 'hasarangafernando@gmail.com', 712365989, 'LLK 2354', '2022-02-16', '2022-03-02', '13:49:00', 'Nagashandiya', 'male', 5, 1),
(8, '19801236565V', 'Upul', 'Nandana', 36, 'Malegoda Road', 'Kalutara', 'upulnandana555@gmail.com', 776753222, 'AAX 7440', '2022-02-16', '2022-03-02', '14:27:00', 'Payagala', 'male', 1, 1),
(10, '200410500069', 'Rajeew', 'Uvindu', 316, 'Suboothi Mawatha Kuda Waskaduwa', 'Kalutara', 'rajeewhesoyamuvinduaezakmi@gmail.com', 768009916, 'ABC 7440', '2022-02-17', '2022-03-03', '01:32:00', 'Nagashandiya', 'male', 7, 1),
(14, '200410500069', 'Rajeew', 'Uvindu', 316, 'Kuda Waskaduwa, Waskaduwa', 'Kaluthara', 'rajeewhesoyamuvinduaezakmi@gmail.com', 768009916, 'ABC 7440', '2022-02-17', '2022-03-03', '03:50:00', 'Payagala', 'male', 5, 1),
(15, '199654123565', 'Banuka', 'Sandeepa', 115, 'Poojarama Road, Pothupitiya', 'Kalutara', 'banuka@gmail.com', 342569871, 'LLL 8525', '2022-02-17', '2022-03-03', '19:09:00', 'Wadiyamankada', 'male', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `Officer_ID` int(11) NOT NULL,
  `Police_Station` varchar(200) NOT NULL,
  `Officer_First_Name` varchar(200) NOT NULL,
  `Officer_Last_Name` varchar(200) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Time_of_Work` time NOT NULL,
  `Telephone` int(11) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Post` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`Officer_ID`, `Police_Station`, `Officer_First_Name`, `Officer_Last_Name`, `Username`, `Password`, `Time_of_Work`, `Telephone`, `Email`, `Gender`, `Post`) VALUES
(1, 'Kalutara North', 'Indika', 'Maduwantha', 'indika', 'indika123', '15:56:00', 754123654, 'indika@gmail.com', 'male', 'Traffic Police Officer'),
(2, 'North Kalutara', 'Chamuditha', 'Lakshan', 'lakshan', 'lakshan123', '16:00:00', 789654113, 'lakshanchamuditha@gmail.com', 'male', 'Traffic OIC'),
(3, 'Kalutara North', 'Nayana', 'Pramuditha', 'nayana', 'nayana123', '14:01:00', 723647855, 'nayana@gmail.com', 'male', 'Traffic OIC');

-- --------------------------------------------------------

--
-- Table structure for table `officer_fine`
--

CREATE TABLE `officer_fine` (
  `Officer_ID` int(11) NOT NULL,
  `Fine_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officer_fine`
--

INSERT INTO `officer_fine` (`Officer_ID`, `Fine_Id`) VALUES
(1, 5),
(1, 7),
(1, 9),
(1, 5),
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `Payment_ID` int(11) NOT NULL,
  `Payment_Method` varchar(100) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Offender_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`Payment_ID`, `Payment_Method`, `Amount`, `Offender_ID`) VALUES
(3, 'Visa', 1000, 4),
(4, 'Visa', 1000, 8),
(5, 'Visa', 3000, 10),
(9, 'visa', 1000, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`Fine_Id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`License_Id`),
  ADD KEY `offenderid_FK` (`Offender_ID`);

--
-- Indexes for table `offenders`
--
ALTER TABLE `offenders`
  ADD PRIMARY KEY (`Offender_ID`),
  ADD KEY `fineID_Fk` (`Fine_Id`),
  ADD KEY `officeridFK` (`Officer_ID`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`Officer_ID`);

--
-- Indexes for table `officer_fine`
--
ALTER TABLE `officer_fine`
  ADD KEY `fineIDFK` (`Fine_Id`),
  ADD KEY `Officer_id_fk` (`Officer_ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `fk_Offender_ID` (`Offender_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fine`
--
ALTER TABLE `fine`
  MODIFY `Fine_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `License_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offenders`
--
ALTER TABLE `offenders`
  MODIFY `Offender_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `license`
--
ALTER TABLE `license`
  ADD CONSTRAINT `offenderid_FK` FOREIGN KEY (`Offender_ID`) REFERENCES `offenders` (`Offender_ID`);

--
-- Constraints for table `offenders`
--
ALTER TABLE `offenders`
  ADD CONSTRAINT `fineID_Fk` FOREIGN KEY (`Fine_Id`) REFERENCES `fine` (`Fine_Id`),
  ADD CONSTRAINT `officeridFK` FOREIGN KEY (`Officer_ID`) REFERENCES `officers` (`Officer_ID`);

--
-- Constraints for table `officer_fine`
--
ALTER TABLE `officer_fine`
  ADD CONSTRAINT `Officer_id_fk` FOREIGN KEY (`Officer_ID`) REFERENCES `officers` (`Officer_ID`),
  ADD CONSTRAINT `fineIDFK` FOREIGN KEY (`Fine_Id`) REFERENCES `fine` (`Fine_Id`),
  ADD CONSTRAINT `officerId_Fk` FOREIGN KEY (`Officer_ID`) REFERENCES `officers` (`Officer_ID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_Offender_ID` FOREIGN KEY (`Offender_ID`) REFERENCES `offenders` (`Offender_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
