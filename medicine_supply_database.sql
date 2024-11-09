-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 02:58 PM
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
-- Database: `medicine_supply_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` text NOT NULL,
  `type` text NOT NULL,
  `quantity_in_stock` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `type`, `quantity_in_stock`, `unit`) VALUES
(1, 'Paracetamol', '500mg tablet', 40, 'boxes of 20'),
(2, 'Ibuprofen', '200mg tablet', 30, 'boxes of 20'),
(3, 'Amoxicillin', '250mg capsule', 20, 'boxes of 10'),
(4, 'Aveeno Cream', '500ml cream', 15, 'bottles'),
(5, 'Aspirin', '75mg tablet', 30, 'boxes of 20'),
(6, 'Tacni', '1mg capsule', 10, 'boxes of 15'),
(7, 'Tacrolimus', '5mg capsule', 15, 'boxes of 15'),
(8, 'Betamethasone', '75ml ointment', 19, 'tubes'),
(9, 'Prednisolone', '10mg tablet', 20, 'boxes of 20'),
(10, 'Methylprednisolone', '100mg tablet', 15, 'boxes of 10'),
(11, 'Pimecrolimus', '75ml cream', 13, 'tubes'),
(12, 'Chlorphenamine', '4mg tablet', 12, 'boxes of 20'),
(13, 'Brompheniramine', '12mg capsule', 18, 'boxes of 20'),
(14, 'example', 'tablet', 20, 'boxes of 10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
