-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 06:37 PM
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
-- Database: `ticketsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ID` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `Shortdescription` varchar(254) NOT NULL,
  `Longdescription` text NOT NULL,
  `Solved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ID`, `User`, `Shortdescription`, `Longdescription`, `Solved`) VALUES
(1, 9, 'test', 'test', 1),
(2, 9, 'test', 'asdfasfdasfasfdasdfasdfasdfasfasfasfdafasfdasfdasfdsafasfdasfdasdfasdfasfdasfjklasdflkjadflkjasdflkjaklvjnalkdfgjalksjvlk,sanflkjlkvmalkfjnhlkajvljakf.,af', 1),
(3, 9, 'test', 'test', 1),
(4, 9, 'test', 'test', 1),
(5, 9, 'Dennis schlagen', 'Baseballschlaeger besorgen und Dennis in eine Falle locken', 1),
(7, 9, 'David zeigen', '', 1),
(8, 10, 'test', 'test', 1),
(9, 11, 'test', 'test', 1),
(16, 11, 'test', 'test', 1),
(23, 11, 'test', 'test', 1),
(24, 11, 'test', 'test', 1),
(25, 11, 'test', 'test', 1),
(26, 11, 'test', 'test', 1),
(27, 11, 'test', 'test', 1),
(28, 11, 'test', 'test', 1),
(29, 12, 'test', 'test', 1),
(30, 12, 'test', 'test', 1),
(31, 12, 'test', 'test', 1),
(32, 12, 'test', 'test', 1),
(33, 12, 'test', 'test', 1),
(37, 12, 'test', 'test', 1),
(38, 12, 'test', 'test', 1),
(39, 12, 'test', 'test', 1),
(40, 12, 'test', 'test', 1),
(41, 12, 'test', 'test', 1),
(42, 12, 'test', 'test', 1),
(43, 12, 'test', 'asfdafasdfafavasgfdsavzxcfdsavzxdasfavzfdsafvzfdafasfdafasdfafavasgfdsavzxcfdsavzxdasfavzfdsafvzfdaf', 1),
(44, 12, 'test', 'asfdafasdfafavasgfdsavzxcfdsavzxdasfavzfdsafvzfdafasfdafasdfafavasgfdsavzxcfdsavzxdasfavzfdsafvzfdaf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Email` varchar(254) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Password` varchar(254) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `UserRole` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Email`, `Password`, `UserRole`) VALUES
(9, 'hetzermarvin@dv-schulen.de', '$2y$10$fdFhaCGsiw3loxCGr/0p0.pYyutkEsLe9WySghXysbE7fcBCvOTVa', 1),
(10, 'a@gmail.com', '$2y$10$2GRFL06WI0hrSgciP/oK3.KFeyjpq64TanrmAVG1pgJBCQ8Toosjy', 2),
(11, 'b@gmail.com', '$2y$10$kFvUTs7estUtByxeXkqdi.68hIAgraGuGxmvnWuw0eth.D.nSnvLu', 0),
(12, 'chi3ffan@gmail.com', '$2y$10$Ej1jloTqQR/3TOSZ7CRfjOf4J6MJ8ERvAybCMxWM.kniGIlTp4.vG', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_fk` (`User`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`User`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
