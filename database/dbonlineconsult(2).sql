-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 09:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbonlineconsult`
--

-- --------------------------------------------------------

--
-- Table structure for table `posthealthdetails`
--

CREATE TABLE `posthealthdetails` (
  `phd` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Dname` varchar(255) NOT NULL,
  `Sname` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `fileNameRaw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posthealthdetails`
--

INSERT INTO `posthealthdetails` (`phd`, `Email`, `Dname`, `Sname`, `file`, `fileNameRaw`) VALUES
(27, 'a@gmail.com', 'blood pressure', 'headache', '', ''),
(37, 'nusrat@aptech.com', 'Migraine', 'Healtht', '', ''),
(75, 'nusrat@aptech.com', 'Headache', 'Disprine', '', ''),
(76, 'nusrat@aptech.com', 'Headach 3', 'Headach 3', '', ''),
(77, 'nusrat@aptech.com', 'Fixed HD', 'Fixed HD', '', ''),
(78, 'ah@gmail.com', 'Ali Disease', 'Ali Symtoms', '', ''),
(82, 'anraza@admin.com', 'Heart Issue', 'Pain', '600154aea2e1d1.06408399.pdf', 'lipid-profile.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tblpostoldtreatment`
--

CREATE TABLE `tblpostoldtreatment` (
  `MID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mname` varchar(255) NOT NULL,
  `Sname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpostoldtreatment`
--

INSERT INTO `tblpostoldtreatment` (`MID`, `Email`, `Mname`, `Sname`) VALUES
(1, 'a@gmail.com', 'kalaricid', 'fiver'),
(10, 'a@gmail.com', 'postan ford', 'pain killer'),
(26, 'a@gmail.com', 'softin', 'anti alergic'),
(27, 'a@gmail.com', 'softin', 'anti alergic'),
(40, 'nusrat@aptech.com', 'Panadol', 'Fever'),
(60, 'nusrat@aptech.com', 'medicine 2', 'Dizzy'),
(65, 'nusrat@aptech.com', 'Fixed', 'Fixed'),
(66, 'ah@gmail.com', 'Ali Medicines', 'Ali Symptoms'),
(67, 'anraza@admin.com', 'Headache', 'Dizzy'),
(70, 'anraza@admin.com', 'Panadol', 'Fever');

-- --------------------------------------------------------

--
-- Table structure for table `tblsuggestion`
--

CREATE TABLE `tblsuggestion` (
  `Email` varchar(30) DEFAULT NULL,
  `Suggestion` varchar(255) DEFAULT NULL,
  `Doctor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsuggestion`
--

INSERT INTO `tblsuggestion` (`Email`, `Suggestion`, `Doctor`) VALUES
('a@gmail.com', 'asdj. jf dgtiuij gjnfg nfg jnfj gnjnfnsjdksjfjdf kvn kfk', ''),
('a@gmail.com', 'Dear Ali,\r\n\r\nYou should consult with Doctor 1 who is a heart specialist.', ''),
('a@gmail.com', 'Dear Ali,\r\n\r\nYou should consult with Doctor 1 who is a heart specialist.', ''),
('a@gmail.com', 'selected ', ''),
('a@gmail.com', 'selected ', ''),
('a@gmail.com', 'selected ', ''),
('ah@gmail.com', 'Dear Ali,\r\n\r\nYou should consult with Doctor 2.', ''),
('nusrat@aptech.com', 'Dear Nusrat,\r\n\r\nPlease consult with Doctor 2.', ''),
('anraza@admin.com', 'you must do exercise daily', ''),
('anraza@admin.com', 'you must do exercise daily', ''),
('anraza@admin.com', 'you must do exercise daily', ''),
('anraza@admin.com', 'you must do exercise daily', 'Doctor 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbltreatment`
--

CREATE TABLE `tbltreatment` (
  `Email` varchar(20) DEFAULT NULL,
  `Treatment` varchar(255) DEFAULT NULL,
  `Doctor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltreatment`
--

INSERT INTO `tbltreatment` (`Email`, `Treatment`, `Doctor`) VALUES
('', 'asfafdf  gfhyrth fgjh', 'Doctor 1'),
('anraza@admin.com', 'aptech treatment center', 'Doctor 1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `Mname` varchar(255) DEFAULT NULL,
  `Dname` varchar(255) DEFAULT NULL,
  `symtoms` varchar(255) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Age` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Fname`, `Lname`, `Email`, `Password`, `role`, `Mname`, `Dname`, `symtoms`, `Gender`, `Age`) VALUES
(19, 'Ali', 'Haider', 'a@gmail.com', '1', 0, '', '', '', '', ''),
(24, 'Ahmed', 'Raza', 'anraza@admin.com', '12345', 0, NULL, NULL, NULL, 'Male', '22'),
(25, 'Nusrat', 'Raza', 'nusrat@aptech.com', '12', 0, NULL, NULL, NULL, 'Female', '40'),
(26, 'Ali', 'Haider', 'ah@gmail.com', '1', 0, NULL, NULL, NULL, 'Male', '33'),
(27, 'Admin', 'Consultant', 'admin@gmail.com', 'admin', 1, NULL, NULL, NULL, 'Male', '30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posthealthdetails`
--
ALTER TABLE `posthealthdetails`
  ADD PRIMARY KEY (`phd`);

--
-- Indexes for table `tblpostoldtreatment`
--
ALTER TABLE `tblpostoldtreatment`
  ADD PRIMARY KEY (`MID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posthealthdetails`
--
ALTER TABLE `posthealthdetails`
  MODIFY `phd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tblpostoldtreatment`
--
ALTER TABLE `tblpostoldtreatment`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
