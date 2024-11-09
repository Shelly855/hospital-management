-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 02:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `surname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `postcode` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `first_name`, `surname`, `email`, `date_of_birth`, `address`, `city`, `postcode`) VALUES
(1, 'Sara', 'Brown', 'sarahbrown12@gmail.com', '1980-02-01', '60 Amber Way', 'Sheffield', 'S1 4NN'),
(2, 'Jenny', 'Ryder', 'jennyryder123@gmail.com', '2001-03-01', '1 Lincoln Road', 'Sheffield', 'S2 4KH'),
(3, 'Robin', 'Highfield', 'robinhighfield324@gmail.com', '1997-10-23', '4 Queen Street', 'Sheffield', 'S6 9FH'),
(4, 'Scarlett', 'Thorn', 'scarlettthorn653@gmail.com', '2004-04-23', '2 Appleton Road', 'Sheffield', 'S4 8DD'),
(5, 'Chris', 'Howe', 'chrishowe235@gmail.com', '1978-10-20', '87 Jasmine Place', 'Sheffield', 'S7 9SS'),
(6, 'James', 'White', 'jameswhite1412@gmail.com', '2004-09-18', '7 Durham Street', 'Sheffield', 'S2 3BP'),
(7, 'Ming', 'Yao', 'mingyao1341@gmail.com', '1983-09-09', '45 Hawthorne Road', 'Sheffield', 'S3 5FJ'),
(8, 'Amber', 'Green', 'ambergreen14124@gmail.com', '1999-03-24', '90 Rose Street', 'Sheffield', 'S1 5TH'),
(9, 'Remy', 'Sand', 'remysand22@gmail.com', '1999-01-14', '5 Lincoln Drive', 'Sheffield', 'S2 3RQ'),
(10, 'Takeshi', 'Sato', 'takeshisato32351@gmail.com', '1999-05-09', '100 Elizabeth Road', 'Sheffield', 'S1 2DR'),
(11, 'Alban', 'Lopez', 'albanlopez12@gmail.com', '1989-02-18', '77 Snowdrop Drive', 'Sheffield', 'S2 8PL'),
(12, 'Arthur', 'Grey', 'arthurgrey1@gmail.com', '1982-04-03', '40 Armor Road', 'Sheffield', 'S3 6YU'),
(13, 'Nina', 'May', 'nina52678@gmail.com', '1990-05-09', '5 Amber Way', 'Sheffield', 'S1 4NN'),
(14, 'Elira', 'Jane', 'elirajane34@gmail.com', '1995-12-19', '12 Rose Street', 'Sheffield', 'S1 5TH'),
(15, 'Eve', 'Brown', 'evebrown323@gmail.com', '2004-11-17', '9 Hill Road', 'Sheffield', 'S2 1ER'),
(16, 'Elise', 'Greystone', 'elisegreystone766@gmail.com', '2008-05-09', '20 Amber Way', 'Sheffield', 'S1 4NN'),
(17, 'Maria', 'Greystone', 'mariagreystone2006@gmail.com', '2006-09-09', '20 Amber Way', 'Sheffield', 'S1 4NN'),
(18, 'Luca', 'Howard', 'luca123howard@gmail.com', '2001-07-06', '2 Rose Street', 'Sheffield', 'S1 5TH'),
(19, 'Ray', 'McLough', 'raymclough135@gmail.com', '1985-02-08', '40 Snowdrop Drive', 'Sheffield', 'S2 8PL'),
(20, 'Rosa', 'Andrews', 'rosaandrews5453@gmail.com', '1976-02-19', '10 Bright Street', 'Sheffield', 'S3 6YY');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `prescription_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `prescription_quantity` int(11) NOT NULL,
  `date_issued` date NOT NULL,
  `date_collected` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`prescription_id`, `patient_id`, `medicine_id`, `prescription_quantity`, `date_issued`, `date_collected`) VALUES
(1, 3, 3, 2, '2024-02-18', '2024-02-20'),
(2, 2, 4, 2, '2020-09-15', '2020-09-17'),
(3, 13, 3, 1, '2023-12-28', '2024-01-03'),
(4, 2, 8, 1, '2020-09-01', '2020-09-09'),
(5, 17, 12, 2, '2023-12-07', '2023-12-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`prescription_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `medicine_id` (`medicine_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `prescriptions_ibfk_2` FOREIGN KEY (`medicine_id`) REFERENCES `medicine_supply_database`.`medicine` (`medicine_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
