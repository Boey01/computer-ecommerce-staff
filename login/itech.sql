-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 14, 2021 at 07:07 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itech`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `account_type` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `username`, `password`, `email`, `account_type`) VALUES
(1, 'zoyfinale', '12345', 'zoyfinale@gmail.com', 'admin'),
(2, 'jasonyas', '67890', 'jasonyas@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `contact_number` int NOT NULL,
  `gender` varchar(6) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_id`, `admin_name`, `contact_number`, `gender`) VALUES
(1, '00001', 'Zoy Finale', 11665748, 'Male'),
(2, '00002', 'Jason Yas', 1243217, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

DROP TABLE IF EXISTS `computer`;
CREATE TABLE IF NOT EXISTS `computer` (
  `computer_id` int NOT NULL AUTO_INCREMENT,
  `computer_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `comp_category` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `screen_size` int NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  PRIMARY KEY (`computer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_id`, `customer_name`, `contact_number`, `address`) VALUES
(10, '00100', 'Leo Das', '0134522', 'Asia Pacific University'),
(20, '00200', 'Catlin Miow', '0146321', 'Kondo Utama 3, Jalan Utama 3, 53300, Kuala Lumpur');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) NOT NULL,
  `computer_id` varchar(50) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipment_status` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

DROP TABLE IF EXISTS `receipt`;
CREATE TABLE IF NOT EXISTS `receipt` (
  `receipt_id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) NOT NULL,
  `card_number` int NOT NULL,
  `card_fullname` text NOT NULL,
  `payment_date` varchar(50) NOT NULL,
  PRIMARY KEY (`receipt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `request_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `budget` decimal(10,2) NOT NULL,
  `request_description` text NOT NULL,
  `replied_by` varchar(10) NOT NULL,
  `computer_id` varchar(10) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

DROP TABLE IF EXISTS `specification`;
CREATE TABLE IF NOT EXISTS `specification` (
  `spec_id` int NOT NULL AUTO_INCREMENT,
  `spec_name` varchar(255) NOT NULL,
  `spec_category` varchar(50) NOT NULL,
  PRIMARY KEY (`spec_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specification_detail`
--

DROP TABLE IF EXISTS `specification_detail`;
CREATE TABLE IF NOT EXISTS `specification_detail` (
  `spec_detail_id` int NOT NULL AUTO_INCREMENT,
  `computer_id` varchar(50) NOT NULL,
  `spec_id` varchar(50) NOT NULL,
  PRIMARY KEY (`spec_detail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `contact_number` int NOT NULL,
  `gender` varchar(6) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=MyISAM AUTO_INCREMENT=201 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `user_id`, `staff_name`, `contact_number`, `gender`) VALUES
(100, '01000', 'Mason Hope', 189994, 'Male'),
(200, '02000', 'Geo Pendela', 196543, 'Female');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
