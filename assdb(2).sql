-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2020 at 10:33 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pwd` varchar(30) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`adminID`, `adminname`, `pwd`) VALUES
(1, 'shital', 'shital123'),
(2, 'abhi', 'abhi123');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE IF NOT EXISTS `tblcategory` (
  `catID` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(30) NOT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`catID`, `catName`) VALUES
(1, 'Mobile'),
(2, 'Laptop'),
(3, 'Man Shoes'),
(13, 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `img` varchar(300) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`pid`, `pname`, `quantity`, `price`, `catID`, `img`) VALUES
(1, 'HP-LP', 5, 60000, 2, '../image/HP-LP.jpg'),
(2, 'Dell-LP', 10, 62000, 2, '../image/Dell-LP.jpg'),
(24, 'M-Shoes', 3, 2500, 3, '../image/M-Shoes.jpg'),
(26, 'MOB-Vivo-V9', 10, 24000, 1, '../image/Vivo-V9.jpg'),
(27, 'COM-HP', 8, 63000, 13, '../image/HP-COM.jpg'),
(25, 'MOB-SAM-A7', 5, 17000, 1, '../image/SAM-A7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct_img`
--

DROP TABLE IF EXISTS `tblproduct_img`;
CREATE TABLE IF NOT EXISTS `tblproduct_img` (
  `imgid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `img` varchar(300) NOT NULL,
  PRIMARY KEY (`imgid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblproduct_img`
--

INSERT INTO `tblproduct_img` (`imgid`, `pid`, `img`) VALUES
(1, 1, '../image/HP-LP1.jpg'),
(2, 1, '../image/HP-LP.jpg'),
(4, 24, '../image/M-Shoes1.jpg'),
(5, 24, '../image/M-Shoes2.jpg'),
(6, 25, '../image/SAM-A7-1.jpg'),
(7, 25, '../image/SAM-A7-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `contactNo` varchar(11) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userID`, `name`, `email`, `pwd`, `contactNo`) VALUES
(1, 'fenil', 'fenil11@gmail.com', 'fenil123', '8796456423'),
(2, 'abhishek', 'abhi12@gmail.com', 'abhi234', '9987567543'),
(3, 'shital', 'shital@gmail.com', 'shital123', '8765487634'),
(4, 'yogi', 'yogi@gmail.com', 'yogi123', '9876543765');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
