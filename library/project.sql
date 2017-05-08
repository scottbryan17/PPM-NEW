-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2015 at 06:08 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` varchar(30) NOT NULL DEFAULT '',
  `AdminName` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Position` varchar(30) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `Password`, `Position`) VALUES
('AID1001', 'Raja', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin'),
('AID1002', 'Leon', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `BookID` varchar(30) NOT NULL DEFAULT '',
  `BookName` varchar(50) NOT NULL,
  `AuthorName` varchar(30) NOT NULL,
  `PublisherName` varchar(50) NOT NULL,
  `Cost` varchar(30) NOT NULL,
  `NoAvailable` int(11) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `BookName`, `AuthorName`, `PublisherName`, `Cost`, `NoAvailable`, `Type`) VALUES
('BID1001', 'morning tale', 'leon', 'leon''s bookstore', '40', 4, 'tale'),
('BID1002', 'php coding', 'TC', 'the sun', '60', 1, 'programming'),
('BID1003', 'C++ core', 'Athon', 'the moon', '60', 7, 'programming'),
('BID1004', 'English Core Learning', 'Jinny', 'morning sunset', '30', 7, 'language'),
('BID1005', 'dragon', 'Leon', 'blah', '2.982', 2, 'art'),
('BID1006', 'Something', 'Jack', 'blah', '19.99', 2, 'art');

-- --------------------------------------------------------

--
-- Table structure for table `borrowhistory`
--

CREATE TABLE IF NOT EXISTS `borrowhistory` (
`BorrowID` int(11) NOT NULL,
  `ReserveID` int(11) NOT NULL,
  `StudentID` varchar(30) NOT NULL DEFAULT '-',
  `TeacherID` varchar(30) NOT NULL DEFAULT '-',
  `BookID` varchar(30) NOT NULL DEFAULT '-',
  `DateOfBorrow` text NOT NULL,
  `DateOfExpired` varchar(30) NOT NULL,
  `DateOfReturn` text NOT NULL,
  `Fine` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowhistory`
--

INSERT INTO `borrowhistory` (`BorrowID`, `ReserveID`, `StudentID`, `TeacherID`, `BookID`, `DateOfBorrow`, `DateOfExpired`, `DateOfReturn`, `Fine`) VALUES
(60, 35, 'SID1001', '-', 'BID1001', '15-03-30 08:58:40am', '15-04-06 08:58:40am', '15-04-27 07:26:07pm', '0.00'),
(61, 36, 'SID1001', '-', 'BID1001', '15-04-08 01:03:43pm', '15-04-15 01:03:43pm', '15-04-08 01:10:16pm', '0.00'),
(62, 37, 'SID1001', '-', 'BID1002', '15-04-01 03:29:13pm', '15-04-08 03:29:13pm', '', '22.20'),
(63, 38, '-', 'TID1002', 'BID1004', '15-04-06 11:35:21pm', '15-04-13 11:35:21pm', '', '15.00'),
(64, 39, '-', 'TID1001', 'BID1003', '15-04-06 11:35:23pm', '15-04-13 11:35:23pm', '15-04-27 07:29:09pm', '0.00'),
(70, 0, '-', 'TID1002', 'BID1001', '15-04-08 10:42:02pm', '', '', '0.00'),
(71, 0, 'SID1002', '-', 'BID1002', '15-04-08 10:46:11pm', '', '', '0.00'),
(77, 0, '-', 'TID1002', 'BID1003', '15-04-09 11:05:08am', '', '', '0.00'),
(82, 48, 'SID1002', '-', 'BID1001', '15-04-27 10:48:51pm', '15-05-04 10:48:51pm', '', '0.00'),
(84, 50, '-', 'TID1002', 'BID1005', '15-04-27 07:37:41pm', '15-05-04 07:37:41pm', '', '0.00'),
(91, 0, 'SID1002', '-', 'BID1003', '15-04-27 11:11:56pm', '15-05-04 11:11:56pm', '', '0.00'),
(92, 0, '-', 'TID1002', 'BID1001', '15-04-27 11:16:00pm', '15-05-04 11:16:00pm', '', '0.00'),
(93, 0, '-', 'TID1002', 'BID1001', '15-04-27 11:16:01pm', '15-05-04 11:16:01pm', '', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `latestid`
--

CREATE TABLE IF NOT EXISTS `latestid` (
  `AdminID` varchar(30) NOT NULL DEFAULT '',
  `TeacherID` varchar(30) NOT NULL DEFAULT '',
  `StudentID` varchar(30) NOT NULL DEFAULT '',
  `BookID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latestid`
--

INSERT INTO `latestid` (`AdminID`, `TeacherID`, `StudentID`, `BookID`) VALUES
('AID1002', 'TID1004', 'SID1006', 'BID1008');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE IF NOT EXISTS `reserve` (
`ReserveID` int(11) NOT NULL,
  `BookID` varchar(30) NOT NULL,
  `StudentID` varchar(30) NOT NULL DEFAULT '-',
  `TeacherID` varchar(30) NOT NULL DEFAULT '-',
  `Date` text NOT NULL,
  `Reserve` varchar(10) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`ReserveID`, `BookID`, `StudentID`, `TeacherID`, `Date`, `Reserve`) VALUES
(35, 'BID1001', 'SID1001', '-', '30/03/15 08:57:48am', 'Yes'),
(36, 'BID1001', 'SID1001', '-', '30/03/15 08:57:48am', 'Yes'),
(37, 'BID1002', 'SID1001', '-', '01/04/15 03:28:12pm', 'Yes'),
(38, 'BID1004', '-', 'TID1002', '06/04/15 11:49:17am', 'Yes'),
(39, 'BID1003', '-', 'TID1001', '06/04/15 11:04:01pm', 'Yes'),
(40, 'BID1007', 'SID1002', '-', '06/04/15 11:05:15pm', 'Reject'),
(41, 'BID1003', '-', 'TID1001', '09/04/15 10:04:20am', 'Reject'),
(42, 'BID1005', '-', 'TID1001', '09/04/15 10:04:25am', 'Reject'),
(43, 'BID1003', '-', 'TID1001', '09/04/15 10:47:38am', 'Cancel'),
(44, 'BID1001', 'SID1002', '-', '27/04/15 07:00:45pm', 'Cancel'),
(45, 'BID1001', 'SID1002', '-', '27/04/15 07:03:11pm', 'Cancel'),
(46, 'BID1001', 'SID1002', '-', '27/04/15 07:03:11pm', 'Cancel'),
(47, 'BID1002', '-', 'TID1001', '27/04/15 07:03:55pm', 'Cancel'),
(48, 'BID1001', 'SID1002', '-', '27/04/15 07:19:26pm', 'Yes'),
(49, 'BID1002', '-', 'TID1001', '27/04/15 07:20:45pm', 'No'),
(50, 'BID1005', '-', 'TID1002', '27/04/15 07:37:20pm', 'Yes'),
(51, 'BID1002', '-', 'TID1002', '15-04-27 10:23:18pm', 'No'),
(52, 'BID1002', '-', 'TID1002', '15-04-27 10:23:18pm', 'Cancel'),
(53, 'BID1003', '-', 'TID1002', '15-04-27 10:23:26pm', 'Cancel'),
(54, 'BID1006', 'SID1001', '-', '15-04-27 10:24:22pm', 'Cancel'),
(55, 'BID1006', 'SID1001', '-', '15-04-27 10:24:32pm', 'Cancel'),
(56, 'BID1002', 'SID1001', '-', '15-04-27 10:36:25pm', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `StudentID` varchar(30) NOT NULL DEFAULT '',
  `StudentName` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `YearOfCourse` varchar(30) NOT NULL,
  `Course` varchar(60) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `PhoneNo` varchar(30) NOT NULL,
  `Blacklist` varchar(3) NOT NULL DEFAULT 'No',
  `NoOfBorrow` int(11) NOT NULL,
  `MaxOfBorrow` int(11) NOT NULL DEFAULT '3',
  `Position` varchar(30) NOT NULL DEFAULT 'Student',
  `IdentificationNumber` varchar(12) NOT NULL,
  `LibraryMember` varchar(3) NOT NULL DEFAULT 'No',
  `Reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `StudentName`, `Password`, `YearOfCourse`, `Course`, `Gender`, `Address`, `Email`, `PhoneNo`, `Blacklist`, `NoOfBorrow`, `MaxOfBorrow`, `Position`, `IdentificationNumber`, `LibraryMember`, `Reason`) VALUES
('SID1001', 'Ali', '81dc9bdb52d04dc20036dbd8313ed055', 'January 2014', 'Diploma in Engineering', 'male', '1-12k, Jalan Kuala Selangr, 47000, Shah Alam', 'Ali@kbu.edu.my', '0123334059', 'No', 2, 3, 'Student', '920130010000', 'Yes', ''),
('SID1002', 'Wang', '81dc9bdb52d04dc20036dbd8313ed055', 'January 2013', 'Diploma in Information Technology', 'male', '1-12k, Jalan Kuala Selangor, 47000, Shah Alam', 'Wang@kbu.edu.my', '0145679999', 'No', 2, 3, 'Student', '930314000000', 'Yes', ''),
('SID1003', 'Kai Mun', '', 'April 2013', 'Diploma in Information Technology', 'male', '1-12k, Jalan Kuala Selangor, 47000, Shah Alam', 'kaimun@kbu.edu.my', '0111112222', 'No', 0, 3, 'Student', '950126001010', 'No', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `TeacherID` varchar(30) NOT NULL DEFAULT '',
  `Blacklist` varchar(3) NOT NULL DEFAULT 'No',
  `TeacherName` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Departments` varchar(60) NOT NULL,
  `NoOfBorrow` int(11) NOT NULL,
  `MaxOfBorrow` int(11) NOT NULL DEFAULT '5',
  `PhoneNo` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Position` varchar(30) NOT NULL DEFAULT 'Teacher',
  `IdentificationNumber` varchar(12) NOT NULL,
  `LibraryMember` varchar(3) NOT NULL DEFAULT 'No',
  `Reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TeacherID`, `Blacklist`, `TeacherName`, `Password`, `Gender`, `Departments`, `NoOfBorrow`, `MaxOfBorrow`, `PhoneNo`, `Email`, `Address`, `Position`, `IdentificationNumber`, `LibraryMember`, `Reason`) VALUES
('TID1001', 'No', 'Lisa', '81dc9bdb52d04dc20036dbd8313ed055', 'female', 'School of Computing', 1, 5, '0133445567', 'Lisa@kbu.edu.my', 'Jalan Wangsa Delima 2a Pusat Bandar Wangsa Maju, 53300 Kuala Lumpur', 'Teacher', '840811001111', 'Yes', ''),
('TID1002', 'No', 'Nick', '81dc9bdb52d04dc20036dbd8313ed055', 'male', 'School of Tourist', 5, 5, '0125239873', 'Nick@kbu.edu.my', ' Jalan Tropika Kemensah 2 Tropika Kemensah, 68000 Ampang', 'Teacher', '720524001010', 'Yes', ''),
('TID1003', 'No', 'Ashey', '', 'female', 'School of Hospitality and Tourism', 0, 5, '0110001111', 'ashey@kbu.edu.my', '1-12k, Jalan Kuala Selangor, 47000, Shah Alam', 'Teacher', '870123007890', 'No', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `borrowhistory`
--
ALTER TABLE `borrowhistory`
 ADD PRIMARY KEY (`BorrowID`);

--
-- Indexes for table `latestid`
--
ALTER TABLE `latestid`
 ADD PRIMARY KEY (`AdminID`,`TeacherID`,`StudentID`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
 ADD PRIMARY KEY (`ReserveID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`TeacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowhistory`
--
ALTER TABLE `borrowhistory`
MODIFY `BorrowID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
MODIFY `ReserveID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
