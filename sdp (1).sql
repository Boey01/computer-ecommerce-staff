-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 10:02 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdp`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `account_type` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `username`, `password`, `email`, `account_type`) VALUES
(1, 'test', 'pass', 'yonghuajun2001@gmail.com', 'customer'),
(2, 'testadmin', 'pass', 'test@gmai.com', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `computer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `computer_id`) VALUES
(48, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

CREATE TABLE `computer` (
  `computer_id` int(11) NOT NULL,
  `computer_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `comp_category` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `screen_size` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `computer`
--

INSERT INTO `computer` (`computer_id`, `computer_name`, `price`, `comp_category`, `description`, `screen_size`, `thumbnail`) VALUES
(1, 'Asus ROG Strix Scar III', '7599.00', 'Asus', '', 0, './assets/products/product1.jpg'),
(2, 'Lenovo Legion 5', '5299.00', 'Lenovo', '', 0, './assets/products/product2.jpg'),
(3, 'Acer Nitro 7', '4499.00', 'Acer', '', 0, './assets/products/product3.jpg'),
(4, 'Asus TUF Gaming Laptop', '3799.00', 'Asus ', '', 0, './assets/products/product4.jpg'),
(5, 'Asus ROG Zephyrus G14', '7699.00', 'Asus', '', 0, './assets/products/product5.jpg'),
(6, 'Asus TUF A15', '4699.00', 'Asus', '', 0, './assets/products/product6.jpg'),
(7, 'HP Omen 15', '6399.00', 'HP', '', 0, './assets/products/product7.jpg'),
(8, 'Asus ROG Strix G', '3799.00', 'Asus', '', 0, './assets/products/product8.jpg'),
(9, 'Acer Predator Triton 300', '3899.00', 'Acer', '', 0, './assets/products/product9.jpg'),
(10, 'HP Envy X360 Laptop ', '4099.00', 'HP', '', 0, './assets/products/product10.jpg'),
(11, 'Lenovo Yoga C640-13IML', '4399.00', 'Lenovo', '', 0, './assets/products/product11.jpg'),
(12, 'Apple Macbook Pro', '5599.00', 'Apple', '', 0, './assets/products/product12.jpg'),
(13, 'Apple Macbook Air', '3099.00', 'Apple', '', 0, './assets/products/product13.jpg'),
(14, 'Asus Zenbook 13', '3999.00', 'Asus', '', 0, './assets/products/product14.jpg'),
(15, 'Apple Macbook Air', '4399.00', 'Apple', '', 0, './assets/products/product15.jpg'),
(16, 'Lenovo IdeaPad 3', '1999.00', 'Lenovo', '', 0, './assets/products/newproduct1.jpg'),
(17, 'Lenovo Gaming 3', '3599.00', 'Lenovo', '', 0, './assets/products/newproduct2.jpg'),
(18, 'Lenovo Flex 5', '2899.00', 'Lenovo', '', 0, './assets/products/newproduct3.jpg'),
(19, 'Asus ZenBook UX425E-ABM091TS Laptop', '4699.00', 'Asus', '', 0, './assets/products/newproduct4.jpg'),
(20, 'Asus Gaming Laptop TUF FX505D-THN528T', '3199.00', 'Asus', '', 0, './assets/products/newproduct5.jpg'),
(21, 'Asus M415D-ABV119T', '2099.00', 'Asus', '', 0, './assets/products/newproduct6.jpg'),
(22, 'Asus A416J-PEK008TS', '2999.00', 'Asus', '', 0, './assets/products/newproduct7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_id`, `customer_name`, `contact_number`, `address`) VALUES
(1, '1', 'Jun', '0126108228', '12A, Jalan Wira Height 1, Bandar Sungai Long');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `computer_id` varchar(50) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipment_status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `computer_id`, `price`, `shipping_address`, `shipment_status`) VALUES
(38, '1', '2', '5299.00', '', 'shipping');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `card_number` int(50) NOT NULL,
  `card_fullname` text NOT NULL,
  `payment_date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `budget` decimal(10,2) NOT NULL,
  `request_description` text NOT NULL,
  `replied_by` varchar(10) NOT NULL,
  `computer_id` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `customer_id`, `budget`, `request_description`, `replied_by`, `computer_id`) VALUES
(1, 1, '3000.00', 'for gaming', '', ''),
(2, 1, '0.00', 'for gaming', '', ''),
(3, 1, '5000.00', 'for gaming', '', ''),
(4, 1, '5000.00', 'for uni', '', ''),
(5, 1, '5000.00', 'for gaming', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE `specification` (
  `spec_id` int(11) NOT NULL,
  `spec_name` varchar(255) NOT NULL,
  `spec_category` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`spec_id`, `spec_name`, `spec_category`) VALUES
(1, '16GB RAM ', 'RAM');

-- --------------------------------------------------------

--
-- Table structure for table `specification_detail`
--

CREATE TABLE `specification_detail` (
  `spec_detail_id` int(11) NOT NULL,
  `computer_id` varchar(50) NOT NULL,
  `spec_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`computer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `specification`
--
ALTER TABLE `specification`
  ADD PRIMARY KEY (`spec_id`);

--
-- Indexes for table `specification_detail`
--
ALTER TABLE `specification_detail`
  ADD PRIMARY KEY (`spec_detail_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `computer`
--
ALTER TABLE `computer`
  MODIFY `computer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
  MODIFY `spec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specification_detail`
--
ALTER TABLE `specification_detail`
  MODIFY `spec_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
