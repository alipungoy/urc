-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 01:59 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research_center_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_code`
--

CREATE TABLE `access_code` (
  `access_ID` int(50) NOT NULL,
  `accesscode` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `facultyID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_code`
--

INSERT INTO `access_code` (`access_ID`, `accesscode`, `status`, `facultyID`) VALUES
(12, '54f3e', 1, 21),
(14, '09876hgfx', 1, 17),
(20, 'RCS-LJDg-O3G', 1, 27),
(23, 'RCS-vBHw-aLJ', 0, 30),
(24, 'RCS-ri2B-KLs', 0, 31),
(25, 'RCS-ue2f-mf5', 0, 32),
(26, '865ydcirn-v', 1, 16),
(27, 'jyhtgrefed673', 1, 28),
(34, 'RCS-vHM7-Kp9', 1, 39),
(35, 'RCS-h5Nl-m8C', 1, 40),
(37, 'RCS-0aFk-dr1', 0, 42),
(42, 'ebcb-Dz7u-3Mn', 1, 65),
(57, 'rwdwd-ye5-321', 1, 41),
(60, '93a937-pLH9-nut9', 0, 83);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleInitial` varchar(10) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `login_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `firstName`, `middleInitial`, `lastName`, `suffix`, `login_ID`) VALUES
(1, 'Admin', 'A.', 'Administrator', '', 1),
(8, 'URC', 'U.', 'Director', '', 25),
(11, '', '', '', ' ', 28);

-- --------------------------------------------------------

--
-- Table structure for table `approved_proposals`
--

CREATE TABLE `approved_proposals` (
  `approvedID` int(50) NOT NULL,
  `proposalID` int(50) NOT NULL,
  `title` varchar(250) NOT NULL,
  `classification` varchar(50) NOT NULL,
  `approval_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `added` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approved_proposals`
--

INSERT INTO `approved_proposals` (`approvedID`, `proposalID`, `title`, `classification`, `approval_date`, `status`, `added`) VALUES
(14, 142, 'Reflective Learning and Prospective Teachers\' Conceptual Understanding, Critical Thinking, Problem Solving, and Mathematical Communications Skills', 'Externally Funded Research', '2020-06-16', 'Ongoing', 0),
(15, 144, 'Potential and Demand for Energy from Biomass by Thermo-Chemical Conversion in the Province of Antique, Philippines Part 1, Biomass Availability Analysis', 'Externally Funded Research', '2019-07-10', 'Ongoing', 1),
(29, 282, 'Test Research Title Example 1', 'Externally Funded Research', '2021-05-07', 'Ongoing', 0),
(30, 295, 'Test Research Title', 'Internally Funded Research', '2021-05-26', 'Ongoing', 0),
(31, 303, 'Test Research Title ', 'Internally Funded Research', '2021-06-05', 'Ongoing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignedreviewer`
--

CREATE TABLE `assignedreviewer` (
  `userID` int(100) NOT NULL,
  `proposalID` int(100) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignedreviewer`
--

INSERT INTO `assignedreviewer` (`userID`, `proposalID`, `id`) VALUES
(88, 303, 196),
(88, 304, 197),
(88, 305, 198),
(90, 305, 199);

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `authID` int(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userID` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`authID`, `password`, `userID`) VALUES
(13, '$2y$10$DiLEhp1P46Ni/1RJx7ySrul9IvJ4CNI3SQCYuo4msmzsBID617MD2', 39),
(62, '$2y$10$yOXhTN/lty2gRtbxAxwEpuQQktxnGdxmgtcOYKuBU8tpmvEA4ahpS', 88),
(63, '$2y$10$uMH6u2fxP3j1Ccu3gqGeqOY1q/iDqfJqXlp.9m.tmOcDGBxuBdEwa', 89),
(64, '$2y$10$42RiF2HN/kb7J2BwtSjRo.AlVT9N1ziCi7sGeSuJxnRyklwWTEDgy', 90),
(65, '$2y$10$/9htYzfMtNrvP2AUTOmmjeh3clk29Fc/P1MspMKw6AS00NGyPYzkO', 91);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authorID` int(50) NOT NULL,
  `fullName` varchar(250) NOT NULL,
  `ordinal` int(50) NOT NULL,
  `proposalID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorID`, `fullName`, `ordinal`, `proposalID`) VALUES
(54, 'Edgar A. Eriman', 1, 14),
(55, 'Rey M. Importenta', 1, 15),
(56, 'Aron F. Dizon', 2, 15),
(57, 'Michael C. Bulaong', 3, 15),
(92, 'Mikel Reynce Faulan', 1, 29),
(93, 'Benjie J. Ne Felongco-Gallinero', 2, 29),
(95, 'Mikel Reynce Faulan', 1, 30),
(96, 'Jennifer D. Dogoldogol', 2, 30),
(97, 'Evelyn  T. Ybarzabal', 3, 30),
(98, 'Duane Jasper F. Hilamon', 4, 30),
(102, 'Mikel Reynce Faulan', 1, 31),
(103, 'Edgar A. Eriman', 2, 31);

-- --------------------------------------------------------

--
-- Table structure for table `budget_releases`
--

CREATE TABLE `budget_releases` (
  `budget_releaseID` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `date_released` date NOT NULL,
  `researchID` int(50) NOT NULL,
  `stageID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budget_releases`
--

INSERT INTO `budget_releases` (`budget_releaseID`, `amount`, `date_released`, `researchID`, `stageID`) VALUES
(1, 17500, '2019-09-18', 3, 1),
(2, 17500, '2020-03-12', 3, 2),
(3, 7500, '2020-08-12', 3, 3),
(4, 7500, '2020-09-16', 3, 4),
(5, 17500, '2020-02-01', 5, 1),
(6, 17500, '2020-02-26', 2, 1),
(7, 17500, '2020-04-15', 2, 2),
(8, 7500, '2020-07-18', 2, 3),
(9, 17500, '2009-05-16', 28, 1),
(10, 17500, '2009-11-02', 28, 2),
(12, 17500, '2003-10-26', 8, 1),
(13, 17500, '2003-12-11', 8, 2),
(14, 7500, '2004-11-23', 8, 3),
(15, 7500, '2005-03-16', 8, 4),
(23, 17500, '2020-03-16', 5, 2),
(33, 7500, '2020-04-05', 5, 3),
(34, 7500, '2020-05-08', 5, 4),
(35, 17500, '2001-04-01', 10, 1),
(36, 17500, '2001-05-01', 10, 2),
(37, 7500, '2002-07-26', 10, 3),
(38, 7500, '2002-08-17', 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `budget_stage`
--

CREATE TABLE `budget_stage` (
  `stageID` int(50) NOT NULL,
  `budget_proportion` decimal(2,2) NOT NULL,
  `stage` varchar(250) NOT NULL,
  `stage_requirement` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budget_stage`
--

INSERT INTO `budget_stage` (`stageID`, `budget_proportion`, `stage`, `stage_requirement`) VALUES
(1, '0.35', 'First Release', 'Data preparations'),
(2, '0.35', 'Second Release', 'Data Analysis'),
(3, '0.15', 'Third Release', 'Draft Presentation'),
(4, '0.15', 'Fourth Release', 'Presentation of Final report');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catTypeID` int(50) NOT NULL,
  `researchID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catTypeID`, `researchID`) VALUES
(1, 10),
(5, 2),
(5, 6),
(5, 28),
(5, 35),
(5, 36),
(9, 3),
(9, 5),
(9, 6),
(9, 28),
(9, 29),
(9, 31),
(9, 35),
(9, 37);

-- --------------------------------------------------------

--
-- Table structure for table `category_type`
--

CREATE TABLE `category_type` (
  `catTypeID` int(50) NOT NULL,
  `categoryType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_type`
--

INSERT INTO `category_type` (`catTypeID`, `categoryType`) VALUES
(1, 'Technology'),
(5, 'Environment'),
(9, 'Health'),
(10, 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `check_if_notified`
--

CREATE TABLE `check_if_notified` (
  `checkID` int(50) NOT NULL,
  `currentdate` date NOT NULL,
  `run` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `check_if_notified`
--

INSERT INTO `check_if_notified` (`checkID`, `currentdate`, `run`) VALUES
(1, '2021-05-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `collegeID` int(50) NOT NULL,
  `college_name` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`collegeID`, `college_name`) VALUES
(6, 'College of Computer Studies'),
(7, 'College of Engineering'),
(15, 'College of Arts And Science'),
(16, 'Junior High School'),
(17, 'Senior High School Department'),
(18, 'College of Agriculture, Resources and Environmental Sciences'),
(19, 'College of Business and Accountancy'),
(20, 'College of Hospitality Management'),
(21, 'College of Medical Laboratory Science'),
(22, 'College of Education'),
(23, 'College of Nursing'),
(24, 'College of Pharmacy'),
(25, 'College of Theology'),
(26, 'College of Law'),
(27, 'College of Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `conference_division`
--

CREATE TABLE `conference_division` (
  `divisionID` int(50) NOT NULL,
  `division` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conference_division`
--

INSERT INTO `conference_division` (`divisionID`, `division`) VALUES
(1, 'Local'),
(2, 'National'),
(3, 'International'),
(4, 'Regional');

-- --------------------------------------------------------

--
-- Table structure for table `conference_presented`
--

CREATE TABLE `conference_presented` (
  `presentedID` int(11) NOT NULL,
  `researchID` int(11) NOT NULL,
  `divisionID` int(50) NOT NULL,
  `presented` varchar(256) NOT NULL,
  `date_presented` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conference_presented`
--

INSERT INTO `conference_presented` (`presentedID`, `researchID`, `divisionID`, `presented`, `date_presented`) VALUES
(1, 8, 1, 'Paper presented at the Commission of Higher Education (CHED) personnel August 22, 2013 at the La Azotea, College of Hospitality Management, Central Philippine University', '2013-08-23'),
(2, 4, 1, 'Presented in CPU at September 14, 2020', '2020-09-14'),
(3, 8, 2, 'Presented Venue in CPU EMC on September 17, 2013', '2020-11-17'),
(4, 10, 1, 'Presented at Central Philippine University EMC,', '2016-04-14'),
(5, 3, 1, 'Presented in CPU EMC', '2018-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `conference_presenter`
--

CREATE TABLE `conference_presenter` (
  `presentedID` int(50) NOT NULL,
  `facultyID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conference_presenter`
--

INSERT INTO `conference_presenter` (`presentedID`, `facultyID`) VALUES
(1, 31),
(2, 27),
(3, 31),
(3, 32),
(4, 30),
(5, 21);

-- --------------------------------------------------------

--
-- Table structure for table `cover_photo`
--

CREATE TABLE `cover_photo` (
  `id` int(255) NOT NULL,
  `journal_id` int(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cover_photo`
--

INSERT INTO `cover_photo` (`id`, `journal_id`, `path`) VALUES
(3, 6, '../journals/coverphoto3de3e180569a4793d166f90285ba1f3b1c3cb8c4.jpeg'),
(4, 7, '../journals/coverphotodownload.jpg'),
(5, 8, '../journals/coverphotounnamed.jpg'),
(6, 9, '../journals/coverphoto13189.jpg'),
(7, 10, '../journals/coverphotoqrcode.png');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptID` int(50) NOT NULL,
  `deptName` varchar(50) NOT NULL,
  `collegeID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptID`, `deptName`, `collegeID`) VALUES
(5, 'Department of Agriculture', 18),
(6, 'Department of Agricultural and Biosystems Engineer', 18),
(7, 'Department of Environmental Management', 18),
(8, 'Department of Biology', 15),
(9, 'Department of Chemistry', 15),
(10, 'Department of Psychology', 15),
(11, 'Department of Social Work', 15),
(12, 'Department of Accountancy', 19),
(13, 'Department of Advertising', 19),
(18, 'Department of Computer Science', 6),
(19, 'Department of Digital Media and Interactive Arts', 6),
(20, 'Department of Information Technology', 6),
(21, 'Department of English', 22),
(22, 'Department of Filipino', 22),
(23, 'Department of Mathematics', 22),
(24, 'Department of Science', 22),
(25, 'Department of Chemical Engineering', 7),
(26, 'Department of Civil Engineering', 7),
(27, 'Department of Electrical Engineering', 7),
(28, 'Department of Electronics Engineering', 7),
(29, 'Department of Mechanical Engineering', 7),
(30, 'Department of Packaging Engineering', 7),
(31, 'Department of Software Engineering', 7),
(32, 'Department of Hospitality Management', 20),
(34, 'Department of Medical Laboratory Sciences', 21),
(35, 'Department of Nursing', 23),
(36, 'Department of Pharmacy', 24),
(37, 'Department of Law', 24),
(38, 'Department of Health, Fitness and Lifestyle Manage', 27),
(39, 'Department of Respiratory Therapy', 27),
(40, 'Department of Doctor of Medicine', 27),
(41, 'Department of Theology', 25);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `documentID` int(50) NOT NULL,
  `uploadedDate` date NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `size` int(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `researchID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`documentID`, `uploadedDate`, `file_name`, `size`, `status`, `researchID`) VALUES
(11, '2020-10-05', 'myw3schoolsimage (1).jpg', 4377, 0, 5),
(13, '2020-10-06', 'Extended Reality vs Virtual Reality (DOGOLDOGOL).pdf', 3188499, 0, 5),
(14, '2020-11-18', 'Extended Reality.pdf', 3188499, 1, 5),
(15, '2020-12-02', 'searchpng.com-balloons-background-png-image-free-download-2.png', 175877, 1, 5),
(21, '2021-02-15', 'Ex1.pdf', 3188499, 1, 2),
(22, '2021-02-15', 'Ex2.pdf', 3188499, 1, 2),
(24, '2021-02-18', 'ed1.pdf', 3188499, 0, 5),
(26, '2021-03-29', 'Ex1(1).pdf', 3188499, 0, 2),
(28, '2021-03-29', 'Ex1(2).pdf', 3188499, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `draft_submitted`
--

CREATE TABLE `draft_submitted` (
  `researchID` int(50) NOT NULL,
  `facultyID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `draft_submitted`
--

INSERT INTO `draft_submitted` (`researchID`, `facultyID`) VALUES
(2, 16),
(3, 21),
(4, 27),
(5, 21),
(6, 17),
(8, 31),
(10, 30),
(31, 40);

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `employmentID` int(10) NOT NULL,
  `employmentTypeID` int(50) NOT NULL,
  `facultyID` int(50) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`employmentID`, `employmentTypeID`, `facultyID`, `fromDate`, `toDate`) VALUES
(27, 1, 16, '2020-09-23', NULL),
(28, 2, 16, '2020-01-01', '2020-06-01'),
(30, 2, 17, '2018-03-02', NULL),
(32, 4, 16, '2010-01-01', '2019-12-31'),
(33, 4, 21, '2019-01-01', '2019-06-01'),
(38, 2, 40, '2014-08-02', NULL),
(39, 1, 40, '2019-01-19', '2021-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `employment_type`
--

CREATE TABLE `employment_type` (
  `employmentTypeID` int(50) NOT NULL,
  `employmentType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employment_type`
--

INSERT INTO `employment_type` (`employmentTypeID`, `employmentType`) VALUES
(1, 'Retired'),
(2, 'Full-Time'),
(4, 'Probationary');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_from_time` datetime NOT NULL,
  `event_to_time` datetime NOT NULL,
  `register_possible` tinytext NOT NULL,
  `events_information` varchar(500) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `event_from_time`, `event_to_time`, `register_possible`, `events_information`, `color`) VALUES
(51, 'asfdghjkl;', '2021-05-24 23:05:00', '2021-05-24 23:05:00', 'on', 'dawfafawfawfaw', 'blue'),
(52, 'TEST EVENT', '2021-04-21 19:04:00', '2021-04-21 19:04:00', 'on', 'wafwafwafwafawfwaf', 'green'),
(53, 'wdfsdbgnvhbmjnk', '2021-04-18 19:19:00', '2021-04-18 21:19:00', 'off', 'Test Title', 'yellow'),
(54, 'Test Event TItle', '2021-05-25 23:05:00', '2021-05-25 23:05:00', 'on', 'fafawfawfawfa', 'red'),
(55, 'Lorem Ipsum 5', '2021-04-19 19:00:00', '2021-04-20 07:00:00', 'on', 'Sample Event Title', 'orange'),
(56, 'Test Event TItle', '2021-04-22 13:04:00', '2021-04-22 13:04:00', 'on', 'Test Details', ''),
(57, 'Test Event Title 2', '2021-06-15 23:06:00', '2021-06-15 23:06:00', 'on', 'Test details', ''),
(58, 'This Is A Test Event Title', '2021-06-10 13:06:00', '2021-06-10 13:06:00', 'off', 'The Quick Brown Fox Jump Over The Lazy Dog Near The Bank Of The River', ''),
(59, 'Test Event Title 10', '2021-06-18 13:00:00', '2021-06-19 13:00:00', 'on', 'The Quick Brown Fox Jump Over The Lazy Dog Near The Bank Of The River', ''),
(60, 'TEST EVENT', '2021-06-05 12:06:00', '2021-06-05 12:06:00', 'on', 'The Quick Brown Fox Jump Over The Lazy Dog Near The Bank Of The River', 'orange');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `facultyID` int(50) NOT NULL,
  `ID_number` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleInitial` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) NOT NULL,
  `suffix` varchar(50) DEFAULT NULL,
  `sex` varchar(50) NOT NULL,
  `deptID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyID`, `ID_number`, `firstName`, `middleInitial`, `lastName`, `suffix`, `sex`, `deptID`) VALUES
(16, '15-4538-89', 'Jaime', 'D.', 'Cabarles', 'Jr.', 'Male', 5),
(17, '12-6436-56', 'Benjie', 'J.', 'Ne Felongco-Gallinero', NULL, 'Male', 9),
(21, '11-6574-75', 'Edgar', 'A.', 'Eriman', NULL, 'Male', 22),
(27, '11-9783-12', 'Rey', 'M.', 'Importenta', NULL, 'Male', 22),
(28, '15-6492-87', 'Del Maria', 'E.', 'Cansada', NULL, 'Female', 13),
(30, '11-5432-43', 'Evelyn ', 'T.', 'Ybarzabal', NULL, 'Female', 5),
(31, '15-5222-14', 'Reynaldo', 'N.', 'Dusaran', NULL, 'Male', 32),
(32, '11-5426-34', 'Randy Anthony ', 'V. ', 'Pabulayan', NULL, 'Male', 6),
(39, '12-1111-89', 'Jennifer', 'D.', 'Dogoldogol', '', 'Female', 28),
(40, '32-1111-32', 'Michael', 'C. ', 'Bulaong', '', 'Male', 7),
(41, '12-8765-34', 'Duane Jasper', 'F.', 'Hilamon', NULL, 'Male', 10),
(42, '11-4556-32', 'Lennon', 'D.', 'Pajar', NULL, 'Male', 18),
(65, '12-7643-98', 'Aron', 'F.', 'Dizon', NULL, 'Male', 36),
(83, '12-3663-98', 'Mikel Reynce', 'J', 'Faulan', NULL, 'Male', 24);

-- --------------------------------------------------------

--
-- Table structure for table `funders`
--

CREATE TABLE `funders` (
  `funderID` int(50) NOT NULL,
  `funderName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funders`
--

INSERT INTO `funders` (`funderID`, `funderName`) VALUES
(1, 'University Research Center(URC)'),
(2, 'Department of Agriculture (DA) Regional Office 6'),
(6, 'Department of Health');

-- --------------------------------------------------------

--
-- Table structure for table `funding_details`
--

CREATE TABLE `funding_details` (
  `funderID` int(50) NOT NULL,
  `researchID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funding_details`
--

INSERT INTO `funding_details` (`funderID`, `researchID`) VALUES
(1, 3),
(1, 5),
(1, 6),
(1, 8),
(1, 29),
(1, 31),
(1, 35),
(1, 36),
(2, 2),
(2, 8),
(2, 10),
(2, 35),
(6, 28),
(6, 37);

-- --------------------------------------------------------

--
-- Table structure for table `incentives`
--

CREATE TABLE `incentives` (
  `incentivesID` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `dateReleased` date DEFAULT NULL,
  `released` tinyint(1) NOT NULL,
  `incentive_requirementID` int(50) NOT NULL,
  `researchID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incentives`
--

INSERT INTO `incentives` (`incentivesID`, `amount`, `dateReleased`, `released`, `incentive_requirementID`, `researchID`) VALUES
(2, 33000, '2020-10-19', 1, 1, 3),
(3, 30000, '2020-06-17', 1, 1, 5),
(4, 34000, '2018-03-19', 1, 1, 8),
(5, 31000, '2019-09-11', 0, 1, 6),
(6, 34000, '2020-12-15', 0, 1, 2),
(7, 31000, NULL, 0, 1, 28),
(8, 35000, '2018-10-16', 1, 1, 4),
(9, 31345, NULL, 0, 1, 10),
(10, 33000, NULL, 0, 1, 27),
(18, 33000, NULL, 0, 1, 31),
(22, 34000, NULL, 0, 1, 35),
(23, 33000, NULL, 0, 1, 36),
(24, 31265, NULL, 0, 1, 29),
(25, 33000, NULL, 0, 1, 37);

-- --------------------------------------------------------

--
-- Table structure for table `incentives_requirement`
--

CREATE TABLE `incentives_requirement` (
  `incentive_requirementID` int(50) NOT NULL,
  `stage` varchar(250) NOT NULL,
  `requirement` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incentives_requirement`
--

INSERT INTO `incentives_requirement` (`incentive_requirementID`, `stage`, `requirement`) VALUES
(1, 'Last Release', 'Completion of Final Reports');

-- --------------------------------------------------------

--
-- Table structure for table `ip`
--

CREATE TABLE `ip` (
  `ipID` int(50) NOT NULL,
  `ip_typeID` int(50) NOT NULL,
  `owner` varchar(250) NOT NULL,
  `researchID` int(50) NOT NULL,
  `description` text NOT NULL,
  `application_number` varchar(50) NOT NULL,
  `application_date` date NOT NULL,
  `registrationNumber` varchar(50) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `incentive` int(50) DEFAULT NULL,
  `releasedIncentive` tinyint(1) NOT NULL,
  `incentive_dateReleased` date DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ip`
--

INSERT INTO `ip` (`ipID`, `ip_typeID`, `owner`, `researchID`, `description`, `application_number`, `application_date`, `registrationNumber`, `registration_date`, `incentive`, `releasedIncentive`, `incentive_dateReleased`, `status`) VALUES
(2, 1, 'Central Philippine University', 8, 'Desc', 'jhyk-2010-btrve', '2010-01-01', '1/2003/79534te', '2003-01-01', 30000, 1, '2019-01-01', 'Granted'),
(3, 3, 'Central Philippine University', 8, 'Description', '2019/tgevfwe', '2019-08-22', '', NULL, 32000, 0, NULL, 'Applying'),
(11, 2, 'Central Philippine University', 10, 'Desc ex', '2017-htef/r42', '2017-05-16', 'h46v5yerc697-65cgs', '2018-01-01', 16000, 0, NULL, 'Applying'),
(14, 5, 'Central Philippine University', 10, 'Description', 'brgvfd-2011-gy', '2011-06-01', '1/2003/79534te', '2010-06-01', 34000, 1, '2010-05-13', 'Granted'),
(15, 2, 'Central Philippine University', 27, 'Central Philippine University Research Center', '2017-tewfgb', '2017-03-12', '1/2015/7iitdvesaete', '2015-01-01', 30000, 1, '2015-09-22', 'Granted'),
(16, 3, 'Central Philippine University', 3, 'description', 'wryyuuuu', '2018-09-12', '', NULL, 35000, 0, NULL, 'Applying'),
(17, 4, 'Central Philippine University', 6, 'Desc', '134567hrew3', '2018-01-01', '', NULL, 33000, 0, NULL, 'Applying'),
(18, 3, 'Central Philippine University', 10, 'Desc', '246feqd32', '2017-11-19', '', NULL, 33000, 0, NULL, 'Applying'),
(20, 3, 'Central Philippine University', 5, 'Description example', '2021-04-05-ehhJBBWIRD', '2021-04-05', '', NULL, 33000, 0, NULL, 'Applying');

-- --------------------------------------------------------

--
-- Table structure for table `ip_type`
--

CREATE TABLE `ip_type` (
  `ip_typeID` int(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ip_type`
--

INSERT INTO `ip_type` (`ip_typeID`, `type`) VALUES
(1, 'Patent'),
(2, 'Trade Secret'),
(3, 'Copyright'),
(4, 'Industrial Design'),
(5, 'Utility Model');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` int(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `publication_date` date NOT NULL,
  `volume` int(255) NOT NULL,
  `journal_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `type`, `publication_date`, `volume`, `journal_name`) VALUES
(6, 'Patubas', '2021-04-23', 1, '5.1.3.6 Lab - Discover Your Own Risky Online Behavior.pdf'),
(7, 'Patubas', '2021-04-23', 2, '5.1.1.2 Lab - Types of Data.pdf'),
(8, 'Patubas', '2021-05-13', 3, '5.1.3.6 Lab-Discover-Your-Own-Risky-Online-Behavior.pdf'),
(9, 'Patubas', '2021-05-31', 6, 'dummy.pdf'),
(10, 'Patubas', '2021-06-16', 7, 'dummy (14).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `journal_entries`
--

CREATE TABLE `journal_entries` (
  `publishedID` int(50) NOT NULL,
  `researchID` int(50) NOT NULL,
  `abstract` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal_entries`
--

INSERT INTO `journal_entries` (`publishedID`, `researchID`, `abstract`) VALUES
(1, 3, 'Two studies were conducted at CPU campus, Iloilo City from October 2009 to April 2010. The first one compared the effects of IMO-5, commercial compost, leaf green manures and inorganic fertilizer. Plants without fertilizer served as basis for comparison. The second study evaluated the growth and yield of pechay and lettuce in pots with residual fertilizer. Pechay was used instead of cabbage because of its shorter growth period than cabbage. The treatments consisted of acacia (Albizia saman (Jacq.) Merr.) (T1), ipil-ipil (Leucaena leucocephala (Lam.) de Wit) (T2), and madre de cacao (Gliricidia sepium) (Jacq.) Walp.) (T3) leaf manures, IMO-5 (T4), and commercial compost (T5). The inorganic fertilized (T6) and unfertilized (T7) plants served as positive and negative controls, respectively. These were laid out in randomized complete block design with three replications. Results from the first study showed significantly most leaves from fertilized lettuce except those added with madre de cacao. Likewise in cabbage, the fertilized plants were significantly taller and produced significantly more leaves than the unfertilized. Lettuce and cabbage with inorganic fertilizer, however, recorded the highest return on investment (ROI) of 89% and 125%, respectively. 2 Results from the second study revealed that lettuce grown in soil with residues of green manures and commercial organic fertilizers had more leaves, were taller, and out yielded the unfertilized plants and those previously applied with inorganic fertilizer. Results further showed that pechay with different manures had statistically similar leaf count and height but had significantly outperformed those with inorganic fertilizer (T6) and without fertilizer (T7). However, lettuce and pechay with residues of compost (T5) showed the highest ROI of 411% and 318%, respectively. Based on the results of the first study, it is concluded that it is profitable to use inorganic fertilizer (T6) in lettuce and cabbage production. However, it was the residue from commercial compost (T5) that sustained soil productivity and profitability of the second crop.'),
(1, 6, 'The United States Agency for International Development (USAID) through its Strengthening Urban Resilience for Growth with Equity (SURGE) Project has been providing direct technical assistance to six selected cities under the Cities Development Initiative (CDI) program. Three of these are the cities of Puerto Princesa, Tagbilaran, and Zamboanga which are in the second batch of the CDI.\r\n\r\nBuilding on the business permitting reforms started by another USAID-funded project- Investment Enabling Environment (INVEST) from 2011 to 2014 in the first three CDI cities namely Batangas, Iloilo, and Cagayan de Oro, SURGE will provide assistance in helping the three cities move towards a fullyautomated BPLS and Building and Occupancy Permits system. In the second batch of CDI cities (Puerto Princesa, Tagbilaran, and Zamboanga), the project will help the cities streamline their business permitting processes, construction permitting and set up of Business One-Stop Shops.'),
(1, 8, 'This is a description\n\n\n'),
(2, 3, 'This is it\'s abstract.\r\n\r\nThis is it\'s abstract.'),
(2, 6, 'This is it\'s abstract.\r\nThis is it\'s abstract.\r\nThis is it\'s abstract.'),
(3, 6, 'description');

-- --------------------------------------------------------

--
-- Table structure for table `journal_published`
--

CREATE TABLE `journal_published` (
  `publishedID` int(50) NOT NULL,
  `volume_no` varchar(250) NOT NULL,
  `year` date NOT NULL,
  `journalTypeID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal_published`
--

INSERT INTO `journal_published` (`publishedID`, `volume_no`, `year`, `journalTypeID`) VALUES
(1, 'Volume 16 no. 1', '2017-12-01', 1),
(2, 'Volume 11 no. 1', '2019-11-02', 1),
(3, 'Volume 1 no. 3', '2019-03-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `journal_type`
--

CREATE TABLE `journal_type` (
  `journalTypeID` int(50) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal_type`
--

INSERT INTO `journal_type` (`journalTypeID`, `type`) VALUES
(1, 'Patubas'),
(2, 'Scientia Et Fides');

-- --------------------------------------------------------

--
-- Table structure for table `login_img`
--

CREATE TABLE `login_img` (
  `img_ID` int(50) NOT NULL,
  `login_ID` int(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_img`
--

INSERT INTO `login_img` (`img_ID`, `login_ID`, `status`, `image_name`) VALUES
(1, 25, 1, 'profile25.jpg'),
(3, 1, 1, 'profile1.png'),
(4, 19, 1, 'profile19.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `log_in`
--

CREATE TABLE `log_in` (
  `login_ID` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `accountType` varchar(50) NOT NULL,
  `vkey` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `createdDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `facultyID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_in`
--

INSERT INTO `log_in` (`login_ID`, `username`, `password`, `email`, `accountType`, `vkey`, `verified`, `createdDate`, `facultyID`) VALUES
(1, 'CPU Research Center', '21232f297a57a5a743894a0e4a801fc3', 'cpurc@gmail.com', 'admin', '1235246576879809aesrytuyjhv54y3ck87nb5ewv', 1, '2020-10-19 11:36:26.653221', NULL),
(19, 'Edgar', '1403bfef98cb9a19a98d30830ba83657', 'cpuresearchcenter@gmail.com', 'user', '345ngi9876rty456', 1, '2021-05-02 10:51:28.376122', 21),
(20, 'Benjie', '86ac945386a69dd3dac9e848bf43ed9b', 'benjie@sample.com', 'user', '45678jhgfdbyjnhqx9864831bhb1c2nkjweqc', 0, '2020-12-02 03:17:41.744300', 17),
(23, 'maria', '263bce650e68ab4e23f28263760b9fa5', 'maria@sample.com', 'user', '51e99a53ed5d491fbb5ec891148cc298', 0, '2020-09-26 10:59:48.177159', 28),
(25, 'URC Director', '3d4e992d8d8a7d848724aa26ed7f4176', 'director@gmail.com', 'URC', 'c3e7e54a004b1ff6467bae07aa138bd0', 1, '2020-10-07 02:59:45.555222', NULL),
(28, 'URC Secretary', '889b2b111b4bc3adb722f0fcff480901', 'secretary@gmail.com', 'URC', '53e678c2808e7f635e7dada958b805a2', 1, '2021-03-17 11:36:48.618316', NULL),
(29, 'rey', 'd2b3ea2dfddc40efdc6941359436c847', 'reys@gmail.com', 'user', '99830b0f2b735ddd699cf7f8a2ad240b', 0, '2020-12-02 08:08:46.831289', 27),
(45, 'Jaime', 'fde2fdb1dbf604aede0ffee76d26e4ce', 'Jaime@sample.com', 'user', '15b1b7e7600019bdd09f0f9162bc3f8f', 1, '2020-12-12 04:35:51.871725', 16),
(48, 'michael', '0acf4539a14b3aa27deeb4cbdf6e989f', 'michael@sample.com', 'user', 'fc15b0d6422e69bb88111e0e86cef2a2', 1, '2020-12-02 03:18:23.517971', 40),
(49, 'jennifer', '718fb45f43799f41a1b6513c46d13daf', 'Jennifer@sample.com', 'user', '1fe88cb683fac25b129a8c0c52435acc', 1, '2020-12-18 08:26:50.612052', 39),
(51, 'duane', '86b4017f9a00830468b86b24743e344e', 'duane@sample.com', 'user', '52236499dacb09cf149430c9458e7aaa', 0, '2021-01-03 16:54:06.662807', 41);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationID` int(50) NOT NULL,
  `fromNotify` int(50) NOT NULL,
  `message` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL,
  `toNotify` int(50) NOT NULL,
  `notifyDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notiftype`
--

CREATE TABLE `notiftype` (
  `notifTypeID` int(100) NOT NULL,
  `type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notiftype`
--

INSERT INTO `notiftype` (`notifTypeID`, `type`) VALUES
(1, 'upload'),
(7, 'rev_assigned'),
(8, 'resApprvd');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `pwdResetID` int(50) NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetEmail` varchar(50) NOT NULL,
  `pwdToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`pwdResetID`, `pwdResetSelector`, `pwdResetEmail`, `pwdToken`, `pwdResetExpires`) VALUES
(11, '4db77bb0bcab31c9', 'cpuresearchcenter@gmail.com', '917a580ecc970763dbc9b3fbf9e731b4', '1620116976');

-- --------------------------------------------------------

--
-- Table structure for table `presentation_schedule`
--

CREATE TABLE `presentation_schedule` (
  `id` int(11) NOT NULL,
  `proposal_id` int(100) NOT NULL,
  `presentation_date` date DEFAULT NULL,
  `presentation_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presentation_schedule`
--

INSERT INTO `presentation_schedule` (`id`, `proposal_id`, `presentation_date`, `presentation_time`) VALUES
(11, 303, '2021-06-20', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `imgId` int(50) NOT NULL,
  `imgType` varchar(25) NOT NULL,
  `imgData` longblob NOT NULL,
  `userID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `progress_report`
--

CREATE TABLE `progress_report` (
  `progressID` int(50) NOT NULL,
  `uploadedDate` date NOT NULL,
  `presentStage` varchar(250) NOT NULL,
  `workPercentage` int(50) NOT NULL,
  `toSubmit` date NOT NULL,
  `problem` varchar(250) DEFAULT NULL,
  `assistance` varchar(250) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `researchID` int(50) NOT NULL,
  `facultyID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progress_report`
--

INSERT INTO `progress_report` (`progressID`, `uploadedDate`, `presentStage`, `workPercentage`, `toSubmit`, `problem`, `assistance`, `status`, `researchID`, `facultyID`) VALUES
(5, '2018-09-18', 'medieval stage', 0, '2018-11-16', 'na', 'na', 0, 5, 21),
(6, '2020-04-19', 'final stage', 0, '2020-05-15', 'na', 'na', 0, 5, 21),
(8, '2019-06-11', 'final stage', 75, '2019-10-16', 'na', 'na', 0, 3, 21),
(13, '2019-01-04', 'medieval stage', 50, '2020-08-15', 'none', 'not in need of assistance', 1, 2, 16),
(16, '2020-01-05', 'final', 75, '2020-12-01', 'none', 'none', 1, 2, 16),
(18, '2020-11-12', 'Final Evaluation', 75, '2020-11-11', 'none', 'none', 1, 5, 21),
(19, '2020-11-04', 'Mid Evaluation', 50, '2020-11-18', 'None', 'None', 0, 6, 41),
(20, '2021-03-17', 'Final Stage', 75, '2021-10-15', 'NA', 'NA', 0, 5, 21),
(21, '2021-03-17', 'final', 75, '2021-10-15', 'none', 'none', 0, 5, 21),
(22, '2021-03-17', 'Final Stage', 75, '2020-10-15', 'None', 'None', 0, 5, 21),
(23, '2021-03-22', 'Final Stage', 75, '2021-12-05', 'None', 'None', 0, 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `proposalID` int(100) NOT NULL,
  `userID` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `funding` tinytext NOT NULL,
  `approvalDate` date DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`proposalID`, `userID`, `title`, `funding`, `approvalDate`, `status`, `approved`) VALUES
(301, 88, 'Test Research Title', 'Internally Funded Research', NULL, 'Reviewed For Presentation', 0),
(302, 88, 'Test Research Title 2', 'Internally Funded Research', NULL, 'Reviewed W/Revisions', 0),
(303, 89, 'Test Research Title ', 'Internally Funded Research', '2021-06-05', 'Research Approved', 1),
(304, 89, 'Test Research Title 2', 'Internally Funded Research', NULL, 'Reviewed W/Revisions', 0),
(305, 89, 'Test Research Title 3', 'Internally Funded Research', NULL, 'Reviewed For Presentation', 0);

-- --------------------------------------------------------

--
-- Table structure for table `proposal_authors`
--

CREATE TABLE `proposal_authors` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `ordinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal_authors`
--

INSERT INTO `proposal_authors` (`id`, `fullname`, `proposal_id`, `ordinal`) VALUES
(271, 'Mikel Reynce Faulan', 301, 1),
(272, 'Jennifer D. Dogoldogol', 301, 2),
(273, 'Mikel Reynce Faulan', 302, 1),
(274, 'Mikel Reynce Faulan', 303, 1),
(275, 'Edgar A. Eriman', 303, 2),
(276, 'Mikel Reynce Faulan', 304, 1),
(277, 'Mikel Reynce Faulan', 305, 1);

-- --------------------------------------------------------

--
-- Table structure for table `researcher_researches`
--

CREATE TABLE `researcher_researches` (
  `researchID` int(50) NOT NULL,
  `facultyID` int(50) NOT NULL,
  `order_authors` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `researcher_researches`
--

INSERT INTO `researcher_researches` (`researchID`, `facultyID`, `order_authors`) VALUES
(2, 16, '1'),
(3, 21, '1'),
(4, 27, '1'),
(5, 21, '1'),
(6, 17, '1'),
(6, 40, '3'),
(6, 41, '2'),
(8, 31, '1'),
(8, 32, '2'),
(10, 30, '1'),
(27, 40, '1'),
(28, 41, '1'),
(29, 65, '1'),
(31, 40, '1'),
(35, 39, '1'),
(36, 39, '2'),
(36, 40, '1'),
(37, 27, '1'),
(37, 40, '3'),
(37, 65, '2');

-- --------------------------------------------------------

--
-- Table structure for table `research_paper`
--

CREATE TABLE `research_paper` (
  `researchID` int(50) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `classification` varchar(50) NOT NULL,
  `researchStatus` varchar(50) NOT NULL,
  `total_budget` int(50) NOT NULL,
  `approvalDate` date DEFAULT NULL,
  `completedDate` date DEFAULT NULL,
  `budgetDateApproved` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `research_paper`
--

INSERT INTO `research_paper` (`researchID`, `title`, `classification`, `researchStatus`, `total_budget`, `approvalDate`, `completedDate`, `budgetDateApproved`) VALUES
(2, 'Identification, Collection, Propagation, and Processing of Herbal Plants for Organic Native Chicken Flock Health Management', 'Externally Funded Research', 'Ongoing', 50000, '2019-04-19', NULL, '2020-02-11'),
(3, 'Mga akdang pampanitikan hilig na mga mag-aaral sa asignaturang Filipino at ang impluwensya ng mga ito sa akademikong perpormans', 'Internally Funded Research', 'Ongoing', 50000, '2020-01-05', '2020-06-22', '2020-01-02'),
(4, 'Hello World', 'Externally Funded Research', 'Complete', 50000, '2020-01-01', '2020-10-16', '2020-01-01'),
(5, 'Tracer Study for CPU College of Education Graduates from 2000 to 2005', 'Internally Funded Research', 'Complete', 50000, '2018-05-01', '2019-11-19', '2020-01-01'),
(6, 'The effect of cooperative learning approach on the performance of students in college algebra', 'Externally Funded Research', 'Complete', 50000, '2020-01-23', '2021-04-23', '2000-07-15'),
(8, 'A Study on the CutFlower and Cutfoliage Industry in the Province of Capiz', 'Externally Funded Research', 'Complete', 50000, '2019-03-15', '2020-08-01', '2003-02-11'),
(10, 'Formulation and Acceptability of Various Batuan(Garcinia Morella) Based Sauces', 'Internally Funded Research', 'Ongoing', 50000, '2000-06-26', '2002-08-01', '2000-11-23'),
(27, 'Production Potential of Native Chickens', 'Internally Funded Research', 'Proposal', 50000, NULL, NULL, '2018-01-01'),
(28, 'Issue', 'Externally Funded Research', 'Ongoing', 50000, '2019-04-19', NULL, '2020-04-19'),
(29, 'Field Work Performance of the CPU College of Theology Students in Selected Churches of CPBC in Iloilo', 'Internally Funded Research', 'Proposal', 0, '2020-04-29', NULL, '0000-00-00'),
(31, 'Example', 'Internally Funded Research', 'Ongoing', 50000, '2020-01-01', NULL, '2020-01-01'),
(35, 'Example2 for Inserting', 'Internally Funded Research', 'Ongoing', 0, '2020-12-05', NULL, NULL),
(36, 'Test Research Title For Online Demo 2', 'Internally Funded Research', 'Ongoing', 0, '2021-04-27', NULL, NULL),
(37, 'Potential and Demand for Energy from Biomass by Thermo-Chemical Conversion in the Province of Antique, Philippines Part 1, Biomass Availability Analysis', 'Externally Funded Research', 'Ongoing', 0, '2019-07-10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `revisions`
--

CREATE TABLE `revisions` (
  `id` int(100) NOT NULL,
  `proposalID` int(100) NOT NULL,
  `revisions_title` varchar(255) NOT NULL,
  `rev_number` int(100) NOT NULL,
  `sub_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revisions`
--

INSERT INTO `revisions` (`id`, `proposalID`, `revisions_title`, `rev_number`, `sub_date`) VALUES
(38, 302, 'Test Research Title 2', 1, '2021-06-03'),
(39, 302, 'Test Research Title 2', 2, '2021-06-03'),
(40, 302, 'Test Research Title 2', 3, '2021-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `revision_documents`
--

CREATE TABLE `revision_documents` (
  `id` int(100) NOT NULL,
  `revisionsId` int(100) NOT NULL,
  `rev_filename` varchar(255) NOT NULL,
  `rev_sub_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revision_documents`
--

INSERT INTO `revision_documents` (`id`, `revisionsId`, `rev_filename`, `rev_sub_date`) VALUES
(36, 38, 'Faulan-Faulan-dummy (1) (5).pdf', '2021-06-03'),
(37, 39, 'Faulan-Faulan-dummy (1) (4).pdf', '2021-06-03'),
(38, 40, 'Faulan-Faulan-Faulan-dummy (1) (5).pdf', '2021-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

CREATE TABLE `screening` (
  `screeningID` int(50) NOT NULL,
  `screening` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `screening`
--

INSERT INTO `screening` (`screeningID`, `screening`) VALUES
(1, 'TD Screening Committee'),
(2, 'For Recommending Approval');

-- --------------------------------------------------------

--
-- Table structure for table `screening_details`
--

CREATE TABLE `screening_details` (
  `detailsID` int(50) NOT NULL,
  `researchID` int(50) NOT NULL,
  `screeningID` int(50) NOT NULL,
  `dateApproval` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `screening_details`
--

INSERT INTO `screening_details` (`detailsID`, `researchID`, `screeningID`, `dateApproval`) VALUES
(1, 3, 1, '2019-09-11'),
(2, 3, 2, '2020-03-12'),
(3, 2, 2, '2019-06-27'),
(5, 4, 2, '2020-02-01'),
(6, 4, 1, '2020-02-15'),
(7, 5, 2, '2018-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semID` int(50) NOT NULL,
  `facultyID` int(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `facultyStatus` varchar(50) NOT NULL,
  `yearID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semID`, `facultyID`, `semester`, `facultyStatus`, `yearID`) VALUES
(44, 16, '1st SEM', 'Active ', 1),
(45, 16, '2nd SEM', 'Inactive', 1),
(46, 16, 'Summer', 'Active', 1),
(47, 16, '1st SEM', 'Active', 2),
(48, 16, '2nd SEM', 'Inactive', 2),
(49, 16, 'Summer', 'Active', 2),
(55, 17, '1st SEM', 'Inactive', 1),
(56, 17, '2nd SEM', 'Inactive', 1),
(57, 17, 'Summer', 'Active', 1),
(58, 17, '1st SEM', 'Active', 2),
(59, 17, '2nd SEM', 'Active', 2),
(60, 17, 'Summer', 'Inactive', 2),
(61, 21, '1st SEM', 'Inactive', 1),
(62, 21, '2nd SEM', 'Inactive', 1),
(63, 21, 'Summer', 'Active', 1),
(65, 21, '2nd SEM', 'Inactive', 2),
(66, 21, '1st SEM', 'Inactive', 2),
(67, 21, 'Summer', 'Active', 2),
(69, 30, '2nd SEM', 'Active', 2),
(106, 16, '1st SEM', 'Active ', 22),
(107, 17, '1st SEM', 'Inactive', 22),
(108, 21, '1st SEM', 'Inactive', 22),
(109, 27, '1st SEM', 'Active', 22),
(110, 28, '1st SEM', 'Active', 22),
(111, 16, '2nd SEM', 'Active', 22),
(112, 17, '2nd SEM', 'Active', 22),
(113, 21, '2nd SEM', 'Inactive', 22),
(114, 27, '2nd SEM', 'Active', 22),
(115, 28, '2nd SEM', 'Inactive', 22),
(116, 30, '2nd SEM', 'Active', 22),
(117, 16, 'Summer', 'Inactive', 22),
(118, 17, 'Summer', 'Active', 22),
(119, 21, 'Summer', 'Active', 22),
(120, 27, 'Summer', 'Active', 22),
(123, 28, 'Summer', 'Active', 22),
(124, 30, 'Summer', 'Inactive', 22),
(125, 31, 'Summer', 'Active', 22),
(126, 27, '1st SEM', 'Active', 1),
(127, 28, '1st SEM', 'Inactive', 1),
(128, 30, '1st SEM', 'Active', 1),
(129, 31, '1st SEM', 'Inactive', 1),
(130, 27, '2nd SEM', 'Active', 1),
(131, 28, '2nd SEM', 'Active', 1),
(132, 30, '2nd SEM', 'Active', 1),
(133, 31, '2nd SEM', 'Active', 1),
(134, 32, '2nd SEM', 'Active', 1),
(135, 27, 'Summer', 'Active', 1),
(136, 28, 'Summer', 'Active', 1),
(137, 30, 'Summer', 'Inactive', 1),
(138, 31, 'Summer', 'Active', 1),
(139, 32, 'Summer', 'Active', 1),
(140, 27, '1st SEM', 'Active', 2),
(141, 28, '1st SEM', 'Active', 2),
(142, 30, '1st SEM', 'Inactive', 2),
(143, 31, '1st SEM', 'Active', 2),
(144, 32, '1st SEM', 'Active', 2),
(145, 39, '1st SEM', 'Active', 2),
(146, 27, '2nd SEM', 'Active', 2),
(147, 28, '2nd SEM', 'Active', 2),
(148, 31, '2nd SEM', 'Active', 2),
(149, 32, '2nd SEM', 'Active', 2),
(150, 39, '2nd SEM', 'Active', 2),
(151, 40, '2nd SEM', 'Inactive', 2),
(152, 27, 'Summer', 'Active', 2),
(153, 28, 'Summer', 'Active', 2),
(154, 30, 'Summer', 'Inactive', 2),
(155, 31, 'Summer', 'Active', 2),
(156, 32, 'Summer', 'Active', 2),
(157, 39, 'Summer', 'Active', 2),
(158, 40, 'Summer', 'Active', 2),
(159, 41, 'Summer', 'Active', 2),
(160, 42, 'Summer', 'Active', 2),
(179, 16, '1st SEM', 'Active', 20),
(180, 17, '1st SEM', 'Inactive', 20);

-- --------------------------------------------------------

--
-- Table structure for table `semester_year`
--

CREATE TABLE `semester_year` (
  `yearID` int(50) NOT NULL,
  `fromYear` int(50) NOT NULL,
  `toYear` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester_year`
--

INSERT INTO `semester_year` (`yearID`, `fromYear`, `toYear`) VALUES
(1, 2019, 2020),
(2, 2020, 2021),
(20, 2000, 2001),
(21, 2001, 2002),
(22, 2018, 2019),
(26, 2017, 2018),
(27, 2016, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `urc_authors`
--

CREATE TABLE `urc_authors` (
  `authorID` int(50) NOT NULL,
  `fullname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urc_authors`
--

INSERT INTO `urc_authors` (`authorID`, `fullname`) VALUES
(27, 'Jennifer D. Dogoldogol '),
(28, 'Reynaldo N. Dusaran '),
(29, 'Edgar A. Eriman '),
(30, 'Duane Jasper F. Hilamon '),
(31, 'Rey M. Importenta '),
(32, 'Benjie J. Ne Felongco-Gallinero '),
(33, 'Randy Anthony  V.  Pabulayan '),
(34, 'Lennon D. Pajar '),
(35, 'Evelyn  T. Ybarzabal ');

-- --------------------------------------------------------

--
-- Table structure for table `urc_documents`
--

CREATE TABLE `urc_documents` (
  `docID` int(100) NOT NULL,
  `proposalID` int(100) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `subDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urc_documents`
--

INSERT INTO `urc_documents` (`docID`, `proposalID`, `filename`, `subDate`) VALUES
(252, 301, 'Faulan-dummy.pdf', '2021-06-01'),
(253, 302, 'Faulan-dummy (1).pdf', '2021-06-01'),
(254, 303, 'Faulan-Faulan-dummy (1) (5).pdf', '2021-06-03'),
(255, 304, 'Faulan-Faulan-dummy (1) (3).pdf', '2021-06-03'),
(256, 305, 'Faulan-dummy (11).pdf', '2021-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `urc_notification`
--

CREATE TABLE `urc_notification` (
  `notifID` int(100) NOT NULL,
  `fromUser` int(100) NOT NULL,
  `toUser` int(100) NOT NULL,
  `notifMsg` varchar(255) NOT NULL,
  `notifDate` datetime NOT NULL,
  `status` bit(1) NOT NULL,
  `notifTypeID` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urc_notification`
--

INSERT INTO `urc_notification` (`notifID`, `fromUser`, `toUser`, `notifMsg`, `notifDate`, `status`, `notifTypeID`) VALUES
(303, 89, 39, 'Has uploaded A proposal for review', '2021-06-03 00:00:00', b'1', 1),
(304, 39, 88, 'A Research Have Been Assigned For You To Review', '2021-06-03 08:03:36', b'1', 7),
(305, 88, 39, 'A Research Has Been Approved For Presentation And Is Ready To Be Scheduled', '2021-06-03 14:04:24', b'1', 8),
(306, 89, 39, 'Has uploaded A proposal for review', '2021-06-03 00:00:00', b'1', 1),
(307, 39, 88, 'A Research Have Been Assigned For You To Review', '2021-06-03 08:05:35', b'1', 7),
(308, 88, 89, 'Your Research Proposal Has Been Reviewed And Is Subject For Revisions', '2021-06-03 14:05:57', b'1', 8),
(309, 89, 39, 'Has uploaded A proposal for review', '2021-06-03 00:00:00', b'1', 1),
(310, 39, 88, 'A Research Have Been Assigned For You To Review', '2021-06-03 08:27:29', b'1', 7),
(311, 39, 90, 'A Research Have Been Assigned For You To Review', '2021-06-03 08:27:29', b'1', 7),
(312, 88, 39, 'A Research Has Been Approved For Presentation And Is Ready To Be Scheduled', '2021-06-03 14:28:50', b'1', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `dateCreated` date NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `suffix` tinytext NOT NULL DEFAULT '\' \'',
  `user_type` tinytext NOT NULL,
  `classification` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `first_name`, `last_name`, `email`, `token`, `dateCreated`, `verified`, `suffix`, `user_type`, `classification`) VALUES
(39, 'Admin', 'Admin', '', 'mfaulan@gmail.com', '19afa46def070bc2937875b0f795c1aa3671cfc4eaf9b1d5b3d1f0adcaeae18d0997f8adf24e0330cdb8df248b1d9ee3da09', '2021-03-22', 0, '', 'Admin', ''),
(88, 'mfaulan12', 'Mikel Reynce', 'Faulan', 'mfawlan@gmail.com', '25f973d09e7481263ec8ef3ed14f6087ddf896f267fc63c890e17d695ae85f04af4c4419c465eb326f4868d07b6d882c386b', '2021-06-01', 1, 'J', 'Reviewer', 'faculty'),
(89, 'mikelfaulan', 'Mikel Reynce', 'Faulan', 'mikelreynce.faulan-99@cpu.edu.ph', '0adcc94b04169aef8ab207992a4cf0140faa4fc0a8301e65776085858f0af60a317939de4727d1bdeb8da3749b1c2fdedf84', '2021-06-03', 1, 'J', 'user', 'faculty'),
(90, 'test1', 'test', 'test', 'test1235@gmail.com', 'e6e5b76a4b2d91b89ea7bf4f04ba79a7b548c125e4887858906b84c143dc0e6bfdf8c521223e63a29fd5a80604f7f0cb2aa3', '2021-06-03', 0, 'T', 'Reviewer', 'staff'),
(91, 'hgujhuj', ',hujuj', 'ujijuuj', 'johannevilleza776@gmail.com', '7a0e0e5ebb16648e7f2658cf289e1cf1b78ebb74e3002f0c57e059ba14c12de499dcb0b9be2dfd36da839f9ad88d5e1a58ee', '2021-06-16', 0, 'J', 'user', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `userson`
--

CREATE TABLE `userson` (
  `uvon` varchar(32) NOT NULL,
  `dt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userson`
--

INSERT INTO `userson` (`uvon`, `dt`) VALUES
('Admin', 1637023563);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_code`
--
ALTER TABLE `access_code`
  ADD PRIMARY KEY (`access_ID`),
  ADD KEY `facultyID` (`facultyID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`),
  ADD KEY `login_ID` (`login_ID`);

--
-- Indexes for table `approved_proposals`
--
ALTER TABLE `approved_proposals`
  ADD PRIMARY KEY (`approvedID`);

--
-- Indexes for table `assignedreviewer`
--
ALTER TABLE `assignedreviewer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `proposalID` (`proposalID`);

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`authID`),
  ADD KEY `authentication_ibfk_1` (`userID`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorID`),
  ADD UNIQUE KEY `ordinal` (`ordinal`,`proposalID`),
  ADD KEY `proposalID` (`proposalID`);

--
-- Indexes for table `budget_releases`
--
ALTER TABLE `budget_releases`
  ADD PRIMARY KEY (`budget_releaseID`),
  ADD UNIQUE KEY `researchID` (`researchID`,`stageID`),
  ADD KEY `budget_releases_ibfk_1` (`researchID`),
  ADD KEY `budget_releases_ibfk_2` (`stageID`);

--
-- Indexes for table `budget_stage`
--
ALTER TABLE `budget_stage`
  ADD PRIMARY KEY (`stageID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catTypeID`,`researchID`),
  ADD KEY `researchID` (`researchID`);

--
-- Indexes for table `category_type`
--
ALTER TABLE `category_type`
  ADD PRIMARY KEY (`catTypeID`);

--
-- Indexes for table `check_if_notified`
--
ALTER TABLE `check_if_notified`
  ADD PRIMARY KEY (`checkID`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`collegeID`);

--
-- Indexes for table `conference_division`
--
ALTER TABLE `conference_division`
  ADD PRIMARY KEY (`divisionID`);

--
-- Indexes for table `conference_presented`
--
ALTER TABLE `conference_presented`
  ADD PRIMARY KEY (`presentedID`),
  ADD KEY `researchID` (`researchID`),
  ADD KEY `conference_presented_ibfk_2` (`divisionID`);

--
-- Indexes for table `conference_presenter`
--
ALTER TABLE `conference_presenter`
  ADD PRIMARY KEY (`presentedID`,`facultyID`),
  ADD KEY `conference_presenter_ibfk_1` (`presentedID`),
  ADD KEY `conference_presenter_ibfk_2` (`facultyID`);

--
-- Indexes for table `cover_photo`
--
ALTER TABLE `cover_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journal_id` (`journal_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptID`),
  ADD KEY `collegeID` (`collegeID`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`documentID`),
  ADD KEY `researchID` (`researchID`);

--
-- Indexes for table `draft_submitted`
--
ALTER TABLE `draft_submitted`
  ADD PRIMARY KEY (`researchID`,`facultyID`),
  ADD KEY `facultyID` (`facultyID`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`employmentID`),
  ADD KEY `facultyID` (`facultyID`),
  ADD KEY `employmentTypeID` (`employmentTypeID`);

--
-- Indexes for table `employment_type`
--
ALTER TABLE `employment_type`
  ADD PRIMARY KEY (`employmentTypeID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyID`),
  ADD KEY `deptID` (`deptID`);

--
-- Indexes for table `funders`
--
ALTER TABLE `funders`
  ADD PRIMARY KEY (`funderID`);

--
-- Indexes for table `funding_details`
--
ALTER TABLE `funding_details`
  ADD PRIMARY KEY (`funderID`,`researchID`),
  ADD KEY `funding_details_ibfk_1` (`researchID`);

--
-- Indexes for table `incentives`
--
ALTER TABLE `incentives`
  ADD PRIMARY KEY (`incentivesID`),
  ADD KEY `incentives_ibfk_1` (`incentive_requirementID`),
  ADD KEY `incentives_ibfk_2` (`researchID`);

--
-- Indexes for table `incentives_requirement`
--
ALTER TABLE `incentives_requirement`
  ADD PRIMARY KEY (`incentive_requirementID`);

--
-- Indexes for table `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`ipID`),
  ADD KEY `researchID` (`researchID`),
  ADD KEY `ip_typeID` (`ip_typeID`);

--
-- Indexes for table `ip_type`
--
ALTER TABLE `ip_type`
  ADD PRIMARY KEY (`ip_typeID`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD PRIMARY KEY (`publishedID`,`researchID`),
  ADD KEY `journal_entries_ibfk_2` (`researchID`);

--
-- Indexes for table `journal_published`
--
ALTER TABLE `journal_published`
  ADD PRIMARY KEY (`publishedID`),
  ADD KEY `journalTypeID` (`journalTypeID`);

--
-- Indexes for table `journal_type`
--
ALTER TABLE `journal_type`
  ADD PRIMARY KEY (`journalTypeID`);

--
-- Indexes for table `login_img`
--
ALTER TABLE `login_img`
  ADD PRIMARY KEY (`img_ID`),
  ADD KEY `login_ID` (`login_ID`);

--
-- Indexes for table `log_in`
--
ALTER TABLE `log_in`
  ADD PRIMARY KEY (`login_ID`),
  ADD UNIQUE KEY `facultyID` (`facultyID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationID`),
  ADD KEY `notified_loginID` (`message`),
  ADD KEY `toNotify` (`toNotify`),
  ADD KEY `notification_ibfk_1` (`fromNotify`);

--
-- Indexes for table `notiftype`
--
ALTER TABLE `notiftype`
  ADD PRIMARY KEY (`notifTypeID`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`pwdResetID`);

--
-- Indexes for table `presentation_schedule`
--
ALTER TABLE `presentation_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_id` (`proposal_id`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `progress_report`
--
ALTER TABLE `progress_report`
  ADD PRIMARY KEY (`progressID`),
  ADD KEY `researchID` (`researchID`),
  ADD KEY `facultyID` (`facultyID`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`proposalID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `proposal_authors`
--
ALTER TABLE `proposal_authors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_id` (`proposal_id`);

--
-- Indexes for table `researcher_researches`
--
ALTER TABLE `researcher_researches`
  ADD PRIMARY KEY (`researchID`,`facultyID`) USING BTREE,
  ADD KEY `facultyID` (`facultyID`);

--
-- Indexes for table `research_paper`
--
ALTER TABLE `research_paper`
  ADD PRIMARY KEY (`researchID`);

--
-- Indexes for table `revisions`
--
ALTER TABLE `revisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposalID` (`proposalID`);

--
-- Indexes for table `revision_documents`
--
ALTER TABLE `revision_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revisionsId` (`revisionsId`);

--
-- Indexes for table `screening`
--
ALTER TABLE `screening`
  ADD PRIMARY KEY (`screeningID`);

--
-- Indexes for table `screening_details`
--
ALTER TABLE `screening_details`
  ADD PRIMARY KEY (`detailsID`),
  ADD UNIQUE KEY `researchID_2` (`researchID`,`screeningID`),
  ADD KEY `researchID` (`researchID`),
  ADD KEY `screeningID` (`screeningID`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semID`),
  ADD KEY `faculty_ID` (`facultyID`),
  ADD KEY `yearID` (`yearID`);

--
-- Indexes for table `semester_year`
--
ALTER TABLE `semester_year`
  ADD PRIMARY KEY (`yearID`);

--
-- Indexes for table `urc_authors`
--
ALTER TABLE `urc_authors`
  ADD PRIMARY KEY (`authorID`);

--
-- Indexes for table `urc_documents`
--
ALTER TABLE `urc_documents`
  ADD PRIMARY KEY (`docID`),
  ADD KEY `documents_ibfk_1` (`proposalID`);

--
-- Indexes for table `urc_notification`
--
ALTER TABLE `urc_notification`
  ADD PRIMARY KEY (`notifID`),
  ADD KEY `fromUser` (`fromUser`),
  ADD KEY `toUser` (`toUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userson`
--
ALTER TABLE `userson`
  ADD PRIMARY KEY (`uvon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_code`
--
ALTER TABLE `access_code`
  MODIFY `access_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `approved_proposals`
--
ALTER TABLE `approved_proposals`
  MODIFY `approvedID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `assignedreviewer`
--
ALTER TABLE `assignedreviewer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `authID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `budget_releases`
--
ALTER TABLE `budget_releases`
  MODIFY `budget_releaseID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `budget_stage`
--
ALTER TABLE `budget_stage`
  MODIFY `stageID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_type`
--
ALTER TABLE `category_type`
  MODIFY `catTypeID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `check_if_notified`
--
ALTER TABLE `check_if_notified`
  MODIFY `checkID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `collegeID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `conference_division`
--
ALTER TABLE `conference_division`
  MODIFY `divisionID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `conference_presented`
--
ALTER TABLE `conference_presented`
  MODIFY `presentedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cover_photo`
--
ALTER TABLE `cover_photo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deptID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `documentID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `employmentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `employment_type`
--
ALTER TABLE `employment_type`
  MODIFY `employmentTypeID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `facultyID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `funders`
--
ALTER TABLE `funders`
  MODIFY `funderID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `incentives`
--
ALTER TABLE `incentives`
  MODIFY `incentivesID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `incentives_requirement`
--
ALTER TABLE `incentives_requirement`
  MODIFY `incentive_requirementID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ip`
--
ALTER TABLE `ip`
  MODIFY `ipID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ip_type`
--
ALTER TABLE `ip_type`
  MODIFY `ip_typeID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `journal_published`
--
ALTER TABLE `journal_published`
  MODIFY `publishedID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `journal_type`
--
ALTER TABLE `journal_type`
  MODIFY `journalTypeID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_img`
--
ALTER TABLE `login_img`
  MODIFY `img_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_in`
--
ALTER TABLE `log_in`
  MODIFY `login_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `notiftype`
--
ALTER TABLE `notiftype`
  MODIFY `notifTypeID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `pwdResetID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `presentation_schedule`
--
ALTER TABLE `presentation_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `imgId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `progress_report`
--
ALTER TABLE `progress_report`
  MODIFY `progressID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `proposalID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `proposal_authors`
--
ALTER TABLE `proposal_authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `research_paper`
--
ALTER TABLE `research_paper`
  MODIFY `researchID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `revisions`
--
ALTER TABLE `revisions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `revision_documents`
--
ALTER TABLE `revision_documents`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `screeningID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `screening_details`
--
ALTER TABLE `screening_details`
  MODIFY `detailsID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `semester_year`
--
ALTER TABLE `semester_year`
  MODIFY `yearID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `urc_authors`
--
ALTER TABLE `urc_authors`
  MODIFY `authorID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `urc_documents`
--
ALTER TABLE `urc_documents`
  MODIFY `docID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `urc_notification`
--
ALTER TABLE `urc_notification`
  MODIFY `notifID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_code`
--
ALTER TABLE `access_code`
  ADD CONSTRAINT `access_code_ibfk_1` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`);

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`login_ID`) REFERENCES `log_in` (`login_ID`);

--
-- Constraints for table `assignedreviewer`
--
ALTER TABLE `assignedreviewer`
  ADD CONSTRAINT `assignedreviewer_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `assignedreviewer_ibfk_2` FOREIGN KEY (`proposalID`) REFERENCES `proposal` (`proposalID`);

--
-- Constraints for table `authentication`
--
ALTER TABLE `authentication`
  ADD CONSTRAINT `authentication_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authors`
--
ALTER TABLE `authors`
  ADD CONSTRAINT `authors_ibfk_1` FOREIGN KEY (`proposalID`) REFERENCES `approved_proposals` (`approvedID`);

--
-- Constraints for table `budget_releases`
--
ALTER TABLE `budget_releases`
  ADD CONSTRAINT `budget_releases_ibfk_1` FOREIGN KEY (`researchID`) REFERENCES `research_paper` (`researchID`),
  ADD CONSTRAINT `budget_releases_ibfk_2` FOREIGN KEY (`stageID`) REFERENCES `budget_stage` (`stageID`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`researchID`) REFERENCES `research_paper` (`researchID`),
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`catTypeID`) REFERENCES `category_type` (`catTypeID`);

--
-- Constraints for table `conference_presented`
--
ALTER TABLE `conference_presented`
  ADD CONSTRAINT `conference_presented_ibfk_1` FOREIGN KEY (`researchID`) REFERENCES `research_paper` (`researchID`),
  ADD CONSTRAINT `conference_presented_ibfk_2` FOREIGN KEY (`divisionID`) REFERENCES `conference_division` (`divisionID`);

--
-- Constraints for table `conference_presenter`
--
ALTER TABLE `conference_presenter`
  ADD CONSTRAINT `conference_presenter_ibfk_1` FOREIGN KEY (`presentedID`) REFERENCES `conference_presented` (`presentedID`),
  ADD CONSTRAINT `conference_presenter_ibfk_2` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`);

--
-- Constraints for table `cover_photo`
--
ALTER TABLE `cover_photo`
  ADD CONSTRAINT `cover_photo_ibfk_1` FOREIGN KEY (`journal_id`) REFERENCES `journals` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`collegeID`) REFERENCES `college` (`collegeID`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`researchID`) REFERENCES `research_paper` (`researchID`);

--
-- Constraints for table `draft_submitted`
--
ALTER TABLE `draft_submitted`
  ADD CONSTRAINT `draft_submitted_ibfk_1` FOREIGN KEY (`researchID`) REFERENCES `research_paper` (`researchID`),
  ADD CONSTRAINT `draft_submitted_ibfk_2` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`);

--
-- Constraints for table `employment`
--
ALTER TABLE `employment`
  ADD CONSTRAINT `employment_ibfk_1` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`),
  ADD CONSTRAINT `employment_ibfk_2` FOREIGN KEY (`employmentTypeID`) REFERENCES `employment_type` (`employmentTypeID`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`deptID`) REFERENCES `department` (`deptID`);

--
-- Constraints for table `funding_details`
--
ALTER TABLE `funding_details`
  ADD CONSTRAINT `funding_details_ibfk_1` FOREIGN KEY (`researchID`) REFERENCES `research_paper` (`researchID`) ON DELETE CASCADE,
  ADD CONSTRAINT `funding_details_ibfk_2` FOREIGN KEY (`funderID`) REFERENCES `funders` (`funderID`) ON DELETE CASCADE;

--
-- Constraints for table `incentives`
--
ALTER TABLE `incentives`
  ADD CONSTRAINT `incentives_ibfk_1` FOREIGN KEY (`incentive_requirementID`) REFERENCES `incentives_requirement` (`incentive_requirementID`),
  ADD CONSTRAINT `incentives_ibfk_2` FOREIGN KEY (`researchID`) REFERENCES `research_paper` (`researchID`);

--
-- Constraints for table `ip`
--
ALTER TABLE `ip`
  ADD CONSTRAINT `ip_ibfk_1` FOREIGN KEY (`researchID`) REFERENCES `research_paper` (`researchID`),
  ADD CONSTRAINT `ip_ibfk_2` FOREIGN KEY (`ip_typeID`) REFERENCES `ip_type` (`ip_typeID`);

--
-- Constraints for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD CONSTRAINT `journal_entries_ibfk_1` FOREIGN KEY (`publishedID`) REFERENCES `journal_published` (`publishedID`),
  ADD CONSTRAINT `journal_entries_ibfk_2` FOREIGN KEY (`researchID`) REFERENCES `research_paper` (`researchID`);

--
-- Constraints for table `journal_published`
--
ALTER TABLE `journal_published`
  ADD CONSTRAINT `journal_published_ibfk_1` FOREIGN KEY (`journalTypeID`) REFERENCES `journal_type` (`journalTypeID`);

--
-- Constraints for table `login_img`
--
ALTER TABLE `login_img`
  ADD CONSTRAINT `login_img_ibfk_1` FOREIGN KEY (`login_ID`) REFERENCES `log_in` (`login_ID`);

--
-- Constraints for table `log_in`
--
ALTER TABLE `log_in`
  ADD CONSTRAINT `log_in_ibfk_1` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`fromNotify`) REFERENCES `log_in` (`login_ID`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`toNotify`) REFERENCES `log_in` (`login_ID`);

--
-- Constraints for table `presentation_schedule`
--
ALTER TABLE `presentation_schedule`
  ADD CONSTRAINT `presentation_schedule_ibfk_1` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`proposalID`);

--
-- Constraints for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD CONSTRAINT `profileimg_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `progress_report`
--
ALTER TABLE `progress_report`
  ADD CONSTRAINT `progress_report_ibfk_1` FOREIGN KEY (`researchID`) REFERENCES `research_paper` (`researchID`),
  ADD CONSTRAINT `progress_report_ibfk_2` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`);

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `proposal_authors`
--
ALTER TABLE `proposal_authors`
  ADD CONSTRAINT `proposal_authors_ibfk_1` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`proposalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `researcher_researches`
--
ALTER TABLE `researcher_researches`
  ADD CONSTRAINT `researcher_researches_ibfk_1` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`),
  ADD CONSTRAINT `researcher_researches_ibfk_2` FOREIGN KEY (`researchID`) REFERENCES `research_paper` (`researchID`);

--
-- Constraints for table `revisions`
--
ALTER TABLE `revisions`
  ADD CONSTRAINT `revisions_ibfk_1` FOREIGN KEY (`proposalID`) REFERENCES `proposal` (`proposalID`) ON DELETE CASCADE;

--
-- Constraints for table `revision_documents`
--
ALTER TABLE `revision_documents`
  ADD CONSTRAINT `revision_documents_ibfk_1` FOREIGN KEY (`revisionsId`) REFERENCES `revisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `screening_details`
--
ALTER TABLE `screening_details`
  ADD CONSTRAINT `screening_details_ibfk_1` FOREIGN KEY (`researchID`) REFERENCES `research_paper` (`researchID`),
  ADD CONSTRAINT `screening_details_ibfk_2` FOREIGN KEY (`screeningID`) REFERENCES `screening` (`screeningID`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`),
  ADD CONSTRAINT `semester_ibfk_2` FOREIGN KEY (`yearID`) REFERENCES `semester_year` (`yearID`);

--
-- Constraints for table `urc_documents`
--
ALTER TABLE `urc_documents`
  ADD CONSTRAINT `urc_documents_ibfk_1` FOREIGN KEY (`proposalID`) REFERENCES `proposal` (`proposalID`) ON DELETE CASCADE;

--
-- Constraints for table `urc_notification`
--
ALTER TABLE `urc_notification`
  ADD CONSTRAINT `urc_notification_ibfk_1` FOREIGN KEY (`fromUser`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `urc_notification_ibfk_2` FOREIGN KEY (`toUser`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
