-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 07:14 PM
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
-- Database: `e-dnevnik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT '"Username od max 50 karatkera"',
  `password` varchar(255) NOT NULL COMMENT 'Cuva HASHOVANI password',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$PNE.i5oIMMSl5fY7wZVSU.LcpO6ba9kAunJoyz6rwLb3jsIOc0AZq', '2023-12-08 11:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `ocena`
--

CREATE TABLE `ocena` (
  `ocenaID` int(11) NOT NULL,
  `vrednost` int(11) NOT NULL COMMENT '5,4,3,2,1',
  `ime` int(11) NOT NULL COMMENT 'Odlican, Vrlo Dobar, ',
  `opis` mediumtext NOT NULL COMMENT 'Opisite kako ste mu dali ocenu (test, odgovaranje ...)',
  `predmetID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `odeljenje`
--

CREATE TABLE `odeljenje` (
  `odeljenjeID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL COMMENT 'Osam, sedam, tri, deset...',
  `razredID` int(11) NOT NULL,
  `int_code` int(11) NOT NULL COMMENT '8,7,6,5,4...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `odeljenje`
--

INSERT INTO `odeljenje` (`odeljenjeID`, `name`, `razredID`, `int_code`) VALUES
(1, 'jedan', 1, 1),
(2, 'dva', 1, 2),
(3, 'tri', 1, 3),
(4, 'četiri', 1, 4),
(5, 'jedan', 2, 1),
(6, 'dva', 2, 2),
(7, 'tri', 2, 3),
(8, 'četiri', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `predmet`
--

CREATE TABLE `predmet` (
  `predmetID` int(11) NOT NULL,
  `predmet_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `razred`
--

CREATE TABLE `razred` (
  `razredID` int(11) NOT NULL,
  `code` char(4) NOT NULL COMMENT 'RIMSKI BROJEVI (I, II, III, IV...)',
  `ime` varchar(10) NOT NULL COMMENT 'Prvi, Drugi, Treci...',
  `atribut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `razred`
--

INSERT INTO `razred` (`razredID`, `code`, `ime`, `atribut`) VALUES
(1, 'I', 'Prvi', 'Prvo'),
(2, 'II', 'Drugi', 'Drugo');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `adress` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL COMMENT 'Moze samo u formatu "Musko" ili "Zensko"',
  `email` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `razredID` int(11) DEFAULT NULL,
  `odeljenjeID` int(11) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'Username od maks 50 karaktera',
  `password` varchar(255) NOT NULL COMMENT 'Cuva HASHOVANI password',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_studentID` int(11) NOT NULL COMMENT 'Student ID od usera koji se loginovao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `ocena`
--
ALTER TABLE `ocena`
  ADD PRIMARY KEY (`ocenaID`),
  ADD KEY `predmetID` (`predmetID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `odeljenje`
--
ALTER TABLE `odeljenje`
  ADD PRIMARY KEY (`odeljenjeID`),
  ADD KEY `razredID` (`razredID`);

--
-- Indexes for table `predmet`
--
ALTER TABLE `predmet`
  ADD PRIMARY KEY (`predmetID`);

--
-- Indexes for table `razred`
--
ALTER TABLE `razred`
  ADD PRIMARY KEY (`razredID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `odeljenjeID` (`odeljenjeID`),
  ADD KEY `student_ibfk_2` (`razredID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `user_studentID` (`user_studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ocena`
--
ALTER TABLE `ocena`
  MODIFY `ocenaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `odeljenje`
--
ALTER TABLE `odeljenje`
  MODIFY `odeljenjeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `predmet`
--
ALTER TABLE `predmet`
  MODIFY `predmetID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `razred`
--
ALTER TABLE `razred`
  MODIFY `razredID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ocena`
--
ALTER TABLE `ocena`
  ADD CONSTRAINT `ocena_ibfk_1` FOREIGN KEY (`predmetID`) REFERENCES `predmet` (`predmetID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ocena_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `odeljenje`
--
ALTER TABLE `odeljenje`
  ADD CONSTRAINT `odeljenje_ibfk_1` FOREIGN KEY (`razredID`) REFERENCES `razred` (`razredID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`odeljenjeID`) REFERENCES `odeljenje` (`odeljenjeID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`razredID`) REFERENCES `razred` (`razredID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_studentID`) REFERENCES `student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
