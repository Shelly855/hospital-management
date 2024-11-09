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
-- Database: `staff_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `surname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `job_role` text NOT NULL,
  `hire_date` date NOT NULL,
  `department_name` text NOT NULL,
  `salary` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `surname`, `email`, `username`, `password`, `date_of_birth`, `job_role`, `hire_date`, `department_name`, `salary`) VALUES
(1, 'Kristen', 'Johnson', 'kristen.johnson@hospital.com', 'KJohnson1535', 'Dn27cP10#', '1989-09-05', 'admin', '2010-02-04', 'Administration', 24120.00),
(2, 'Noah', 'Hart', 'noah.hart@hospital.com', 'NHart3525', 'nd$84BP4', '1980-03-04', 'doctor', '2015-05-02', 'Cardiology', 51017.00),
(3, 'Tara', 'Black', 'tara.black@hospital.com', 'TBlack8790', 'fi7g89YE&', '1998-12-14', 'lab technician', '2020-09-07', 'Pathology', 40000.00),
(4, 'Emma', 'Powell', 'emma.powell@hospital.com', 'EPowell9297', 'Ko56S£rt9', '1979-11-19', 'pharmacist', '2005-05-20', 'Pharmacy', 41250.00),
(5, 'Chris', 'Longfield', 'chris.longfield@hospital.com', 'CLongfield0586', 'Y70af#q15', '1980-09-21', 'lab technician', '2000-08-23', 'Pathology', 40000.00),
(6, 'Fulgur', 'Doren', 'fulgur.doren@hospital.com', 'FDoren1509', 'F348a#qb', '1989-04-23', 'lab technician', '2015-05-04', 'Pathology', 35000.00),
(7, 'Norine', 'Christino', 'norine.christino@hospital.com', 'NChristino1512', '&U1uh&R8', '2001-07-03', 'pharmacist', '2023-12-07', 'Pharmacy', 34000.00),
(8, 'Florene', 'Rauner', 'florene.rauner@hospital.com', 'FRauner6723', 'r_1yA)2b', '1986-08-09', 'doctor', '2010-03-22', 'ENT', 58000.00),
(9, 'Darwin', 'Drzymala', 'darwin.drzymala@hospital.com', 'DDrzymala0663', 'A6w}ws;P', '1990-01-29', 'doctor', '2019-05-13', 'Gastroenterology', 50000.00),
(10, 'Alfonzo', 'Werthmann', 'alfonzo.werthmann@hospital.com', 'AWerthmann4837', 's>4K8ncq', '1991-11-07', 'doctor', '2018-09-09', 'Haematology', 51000.00),
(11, 'Wilma', 'Chapel', 'wilma.chapel@hospital.com', 'WChapel5953', 'K*iE1:wp', '1988-06-15', 'doctor', '2017-09-17', 'Gynaecology', 51000.00),
(12, 'Angie', 'Lohse', 'angie.lohse@hospital.com', 'ALohse0706', 'ADS`u9]Q', '1993-01-22', 'admin', '2016-07-08', 'Administration', 23000.00),
(13, 'Vivian', 'Straw', 'vivian.straw@hospital.com', 'VStraw6736', '6eLx+\'A4', '2001-07-06', 'lab technician', '2022-02-01', 'Pathology', 39000.00),
(14, 'Cameron', 'Well', 'cameron.well@hospital.com', 'CWell8492', 'lRS:0Iot', '2001-08-29', 'pharmacist', '2022-06-05', 'Pharmacy', 34000.00),
(15, 'Elsie', 'Farrell', 'elsie.farrell@hospital.com', 'EFarrell9140', 'm5G%;/v>', '1992-06-17', 'doctor', '2021-09-09', 'Cardiology', 47000.00),
(16, 'Angela', 'Holt', 'angela.holt@hospital.com', 'AHolt3858', 'j6T@\"39z', '1989-03-02', 'doctor', '2020-08-22', 'Haematology', 51500.00),
(17, 'Neil', 'Clarke', 'neil.clarke@hospital.com', 'NClarke2859', 'd7Vk2E}n', '1986-03-04', 'doctor', '2014-12-11', 'Gastroenterology', 51000.00),
(18, 'Jeremy', 'Mays', 'jeremy.mays@hospital.com', 'JMays1931', 'cM4`yY@Q', '1987-07-19', 'doctor', '2018-11-20', 'ENT', 58000.00),
(19, 'Billy', 'Collier', 'billy.collier@hospital.com', 'BCollier7264', 'e$Jga2Ub', '1995-11-09', 'doctor', '2020-08-07', 'Gynaecology', 50500.00),
(20, 'Jolene', 'Boyle', 'joylene.boyle@hospital.com', 'JBoyle5166', 'v&Uj7?fN', '1991-08-08', 'doctor', '2017-10-07', 'Anaesthetics', 70000.00),
(21, 'Sophie', 'Cain', 'sophie.cain@hospital.com', 'SCain9385', 'd9T(zS7)', '1993-03-02', 'doctor', '2017-07-18', 'A&E', 35000.00),
(22, 'Megan', 'Coffey', 'megan.coffey@hospital.com', 'MCoffey3868', 'J3b?g9,h', '1989-11-02', 'doctor', '2017-08-09', 'A&E', 35000.00),
(23, 'Daniel', 'Watson', 'david.watson@hospital.com', 'DWatson2276', 'p^4~V\'aL', '1987-01-13', 'doctor', '2014-04-04', 'A&E', 35000.00),
(24, 'Mary', 'Johnson', 'mary.johnson@hospital.com', 'MJohnson6166', 'uM><7h]5', '1985-02-14', 'doctor', '2011-04-28', 'A&E', 35000.00),
(25, 'Chelsea', 'Friedman', 'chelsea.friedman@hospital.com', 'CFriedman3858', 'a<XBv3/x', '1991-09-02', 'doctor', '2016-08-24', 'Nephrology', 90000.00),
(26, 'Elias', 'Swann', 'elias.swann@hospital.com', 'ESwann3515', 'mE&\"54>~', '1990-08-05', 'doctor', '2012-04-21', 'Nephrology', 90000.00),
(27, 'Tracey', 'Robertson', 'tracey.robertson@hospital.com', 'TRobertson8585', 'K_r7GYAh', '1988-12-06', 'doctor', '2010-12-14', 'Neurology', 88000.00),
(28, 'Kai', 'Parks', 'kai.parks@hospital.com', 'KParks3736', 's&:>c8CM', '1989-06-11', 'doctor', '2011-12-15', 'Neurology', 88000.00),
(29, 'Dawn', 'Thornton', 'dawn.thornton@hospital.com', 'DThornton1772', 'H4U@#kKN', '1990-07-06', 'doctor', '2016-12-16', 'Oncology', 90000.00),
(30, 'Ryan', 'Brown', 'ryan.brown@hospital.com', 'RBrown3616', 'p%RUy4s^', '1992-09-26', 'doctor', '2017-06-11', 'Oncology', 90000.00),
(31, 'Jean', 'Conley', 'jean.conley@hospital.com', 'JConley2692', 'K\"]w9B:r', '1985-02-26', 'doctor', '2009-10-15', 'Ophthalmology', 110000.00),
(32, 'Ursula', 'Meyer', 'ursula.meyer@hospital.com', 'UMeyer1553', 'M6$DWu?<', '1984-02-26', 'doctor', '2011-12-16', 'Ophthalmology', 110000.00),
(33, 'Cornelia', 'Saxton', 'cornelia.saxton@hospital.com', 'CSaxton7358', 'B+H!v73x', '1997-02-26', 'doctor', '2022-01-15', 'Orthopaedics', 60000.00),
(34, 'Evan', 'Bailey', 'evan.bailey@hospital.com', 'EBailey3515', 'F-K(z2w$', '1996-11-15', 'doctor', '2022-12-15', 'Radiotherapy', 45000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
