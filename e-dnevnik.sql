-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 09:47 AM
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
  `ime` varchar(255) NOT NULL COMMENT 'Odlican, Vrlo Dobar, ',
  `opis` mediumtext NOT NULL COMMENT 'Opisite kako ste mu dali ocenu (test, odgovaranje ...)',
  `predmetID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ocena`
--

INSERT INTO `ocena` (`ocenaID`, `vrednost`, `ime`, `opis`, `predmetID`, `studentID`, `date`) VALUES
(14, 2, 'dovoljan', 'Glup', 5, 31, '2024-05-03 12:16:00'),
(15, 1, 'nedovoljan', 'Glup je ko kurac', 1, 32, '2024-05-03 17:36:26'),
(16, 5, 'odličan', 'Mnogo pametan momak', 1, 33, '2024-05-03 17:40:07'),
(17, 5, 'odličan', 'Pevao kad bi bio ranjen na casu sa drugaricom', 11, 33, '2024-05-03 17:40:22'),
(21, 5, 'odličan', 'Nastavnica ga gotivi', 1, 31, '2024-05-03 19:38:10'),
(22, 2, 'dovoljan', 'Nastavnica ga ne gotivi', 2, 31, '2024-05-03 19:38:27'),
(23, 5, 'odličan', 'Test', 4, 30, '2024-05-03 19:38:43'),
(24, 4, 'vrlodobar', 'Test', 7, 1, '2024-05-06 16:11:41'),
(25, 5, 'odličan', 'Test', 1, 1, '2024-05-20 09:37:58'),
(27, 2, 'dovoljan', 'Ne slusa na casu', 3, 1, '2024-05-20 09:45:37'),
(28, 3, 'dobar', 'Kontrolni', 6, 1, '2024-05-20 09:45:46'),
(29, 5, 'odličan', 'Odgovaranje', 4, 1, '2024-05-20 09:45:58'),
(30, 5, 'odličan', 'Popravio ocenu', 6, 1, '2024-05-20 09:46:08');

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
  `predmet_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `predmet`
--

INSERT INTO `predmet` (`predmetID`, `predmet_name`) VALUES
(1, 'Matematika'),
(2, 'Srpski'),
(3, 'Engleski'),
(4, 'Informatika'),
(5, 'Geografija'),
(6, 'Istorija'),
(7, 'Nemacki'),
(9, 'Hemija'),
(10, 'Fizika'),
(11, 'Muzicko'),
(12, 'Likovno');

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

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `name`, `surname`, `date_of_birth`, `adress`, `gender`, `email`, `parent_name`, `razredID`, `odeljenjeID`, `photo_path`) VALUES
(1, 'Viktor', 'Pešić', '2006-10-04', 'Bulevar Kralja Aleksandra 162', 'M', 'viktor.pesic@gmail.com', 'Milan', 1, 2, 'viktor_pesic.jpg'),
(30, 'Vladimir', 'Vrhovski', '2005-10-19', 'Stevana Jakovljevica 18', 'musko', 'vladimir@vrhovski.com', 'Mirjana', 2, 8, 'Vladimir_Vrhovski.jpeg'),
(31, 'Viktor', 'Rasic', '2005-12-23', 'Kursulina 54', 'musko', 'viktor@rasic.com', 'Igor', 2, 8, 'Viktor_Rasic.jpeg'),
(32, 'Zarko', 'Barlov', '2005-04-11', 'Anastasa Jovanovica 2', 'musko', 'zarko@barlov.com', 'Sladjana', 2, 8, 'Zarko_Barlov.jpeg'),
(33, 'Nemanja', 'Nikolic', '2005-06-19', 'Sumatovacka 29', 'musko', 'necasrbpvp90@gmail.com', 'Srboljub', 2, 8, 'Nemanja_Nikolic.jpeg');

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
  MODIFY `ocenaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `odeljenje`
--
ALTER TABLE `odeljenje`
  MODIFY `odeljenjeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `predmet`
--
ALTER TABLE `predmet`
  MODIFY `predmetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `razred`
--
ALTER TABLE `razred`
  MODIFY `razredID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
