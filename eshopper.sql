-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 01:41 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshopper`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` varchar(11) NOT NULL,
  `item_id` varchar(11) NOT NULL,
  `qty` int(11) DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `item_id`, `qty`, `timestamp`) VALUES
('cu101', 'i_102', 1, '2018-03-27 11:40:00'),
('cu101', 'i_101', 3, '2018-03-27 11:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `cid` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text,
  `pincode` int(10) NOT NULL DEFAULT '0',
  `mobile_number` mediumint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`first_name`, `last_name`, `cid`, `email`, `address`, `pincode`, `mobile_number`) VALUES
('ISHA', 'SHETTY', 'cu101', '2015isha.shetty@ves.ac.in', 'omkar soc', 421202, 8388607),
('DIPSHI', 'SHETTY', 'cu102', '2015dipshi.shetty@ves.ac.in', NULL, 0, 0),
('isha', 'shetty', 'cu103', 'ishashetty4@gmail.com', 'gulmohar apt', 421202, 314324),
('sudha', 'shetty', 'cu104', 'sshetty197321@gmail.com', 'swastika park', 421202, 555544);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_name` varchar(100) NOT NULL,
  `item_id` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `images` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `is_stock` int(10) NOT NULL DEFAULT '1',
  `quantity` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_name`, `item_id`, `category`, `description`, `images`, `price`, `is_stock`, `quantity`, `rating`) VALUES
('Leather bag', 'i_101', 'bags', 'This bag is ideal for carrying things.It can be used for carrying files to office as well as your personal belongings.Made from leather(recycled leather).', 'leather_bag.jpg', 600, 1, 6, 4),
('Brown bag', 'i_102', 'bags', 'High grade raw material,brushed with advanced technologies of embroideries matches trends of today\'s generation and styling.', 'brown_handbag.jpg', 300, 1, 3, 0),
('Floor Mat', 'i_103', 'mats', 'This mat has been hand woven on a floor loom, tightly packed with cotton/nylon material.It is finished in an end warp then fringed in same warping with thread ,making it tough ,strong and durable.', 'floor_mat.jpg', 100, 1, 6, 4),
('Black Handbag', 'i_104', 'bags', 'Backed up by a team of experts having rich industry experience.This bag is handcrafted and good for daily use.', 'black_bag.jpg', 150, 0, 1, 0),
('Woollen Doll', 'i_105', 'toys', 'Good quality handmade knitted doll for children below 5 yrs of age.', 'chick.jpg', 400, 0, 0, 0),
('Dinousaur toy', 'i_106', 'toys', 'Keepsake memory soft toy dinosaur made from cotton cloth approximate 25cm safe for children.', 'dinosaur.jpg', 150, 0, 0, 0),
('Designer Purse', 'i_107', 'bags', 'Best quality handmade designer bag for every age groyp girl', 'designer_purse.jpg', 200, 1, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(10) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `address` varchar(30) NOT NULL,
  `totalcost` int(11) NOT NULL,
  `shippingCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `item_id`, `cid`, `qty`, `address`, `totalcost`, `shippingCost`) VALUES
(6, 'i_101', 'cu101', 4, '', 0, 0),
(7, 'i_103', 'cu101', 3, '', 0, 0),
(8, 'i_101', 'cu101', 4, '', 0, 0),
(9, 'i_103', 'cu101', 3, '', 0, 0),
(10, 'i_103', 'cu101', 2, '', 0, 0),
(11, 'i_101', 'cu101', 1, '', 0, 0),
(12, 'i_106', 'cu101', 1, '', 0, 0),
(13, 'i_102', 'cu101', 5, '', 0, 0),
(14, 'i_102', 'cu101', 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `pin_code` int(10) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `regionName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`pin_code`, `state_id`, `regionName`) VALUES
(322211, 2, 'vadodara'),
(421202, 1, 'kalyan-dombivli');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `item_id` varchar(10) NOT NULL,
  `review` text NOT NULL,
  `cid` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`item_id`, `review`, `cid`, `name`, `date`, `rating`) VALUES
('i_101', 'fknefnfnke', 'cu101', 'knknke', '2018-03-21 07:12:22', 3),
('i_103', 'rhtjumjyn', 'cu101', 'very nice mat', '2018-03-22 12:25:46', 5),
('i_101', 'This is good product', 'cu101', 'Abc', '2018-03-23 05:38:37', 4),
('i_101', 'very good service', 'cu101', 'xyz', '2018-03-25 15:40:12', 5),
('i_103', 'Good product', 'cu101', 'anonymous', '2018-03-27 09:31:07', 3),
('i_103', 'Good product', 'cu101', 'anonymous', '2018-03-27 09:36:43', 3);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `stateName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `stateName`) VALUES
(1, 'Maharashtra'),
(2, 'Gujarat'),
(3, 'Karnataka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `cid` (`cid`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`pin_code`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD KEY `item_id` (`item_id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
