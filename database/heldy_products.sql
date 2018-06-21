-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 11:31 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heldy_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(18) NOT NULL COMMENT 'This is for the admin',
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `country` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `address` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(12) NOT NULL,
  `passport` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `aboutme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `country`, `city`, `address`, `dob`, `username`, `passport`, `email`, `password`, `phone`, `aboutme`) VALUES
('ADMIN/001', 'Emmanuel', 'Ikeogu', 'Nigeria', 'port Harcourt', 'Back of Genesis, Choba', '1992-06-27', 'Lucky Dera', 'ADMIN_001.png', 'ikeogu2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '08133627610', 'just testing my code.'),
('ADMIN/002', 'Odera Odesigo', 'Chidera', 'Nigeria', 'Port Harcourt', 'Back of Camo GRA', '1997-03-03', 'LuckyDera', 'ADMIN_002.png', 'ikeogu312@gmail.com', '', '08133627610', 'i am the Admin '),
('ADMIN/003', 'Odera Odesigo', 'Chidera', 'Nigeria', 'Port Harcourt', 'Back of Camo GRA', '1997-03-03', 'LuckyDera', 'ADMIN_003.png', 'ikeogu322@gmail.com', '12345', '08133627610', 'i am the Admin ');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `name`) VALUES
('CAT/001', 'Novel'),
('CAT/0010', 'poetry'),
('CAT/002', 'Article'),
('CAT/003', 'Text book'),
('CAT/004', 'Exam Materials'),
('CAT/005', 'Past Questions '),
('CAT/006', 'News Papers'),
('CAT/007', 'Science Books'),
('CAT/008', 'Law articles'),
('CAT/009', 'Lecture Notes');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `username`, `password`, `phone`, `email`) VALUES
('', 'edwin ', '8e6e509fba12de7be9ff1cb5333a69d2', '08133627610', 'edwi@gmail.com'),
('CUSTR/0009', 'Akanyenye', '31ddc655f9288e5502f3a36e83fb431f', '09087364512', 'erico@gmail.com'),
('CUSTR/001', 'lucky dera', '202cb962ac59075b964b07152d234b70', '0813627610', 'ikeogu123@gmail.com'),
('CUSTR/002', 'Gee', '202cb962ac59075b964b07152d234b70', '08133627610', 'nworah123@gmail.com'),
('CUSTR/003', 'Danico', 'c20ad4d76fe97759aa27a0c99bff6710', '08132763499', 'dan76@gmail.com'),
('CUSTR/004', 'luckydera', '81dc9bdb52d04dc20036dbd8313ed055', '08133627610', 'ikeogu322@gmail.com'),
('CUSTR/005', 'Lucker', '81dc9bdb52d04dc20036dbd8313ed055', '08133627610', 'lucky12@gmail.com'),
('CUSTR/006', 'lucky', '81dc9bdb52d04dc20036dbd8313ed055', '08136357890', 'chidera23@gmail.com'),
('CUSTR/007', 'ikeogu', '202cb962ac59075b964b07152d234b70', '08133627610', 'emma@gmail.com'),
('CUSTR/008', 'Danny', '81dc9bdb52d04dc20036dbd8313ed055', '09021805433', 'daniel12@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `downloader`
--

CREATE TABLE `downloader` (
  `id` int(11) NOT NULL,
  `secure_link` varchar(255) NOT NULL,
  `expiry` datetime NOT NULL,
  `downloaded` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downloader`
--

INSERT INTO `downloader` (`id`, `secure_link`, `expiry`, `downloaded`) VALUES
(0, '18e870bcbd3c77656571', '2018-06-14 02:55:13', 0),
(0, 'dd82c4c98d9bd0db7338', '2018-06-14 02:56:02', 0),
(0, '6d6856e3eb70eff7bbec', '2018-06-14 03:01:21', 0),
(0, 'cbd21f031e613cd30a7b', '2018-06-14 03:17:17', 0),
(0, '2e2eab8388b8262533d7', '2018-06-14 03:17:57', 0),
(0, 'adb518af68d0f277b044', '2018-06-14 03:19:08', 0),
(0, '274e3d0dbb99b7ba13cb', '2018-06-14 03:19:54', 0),
(0, 'a036dc87a6255cec1bbf', '2018-06-14 03:19:58', 0),
(0, '732e423840dd3b63111a', '2018-06-14 03:19:59', 0),
(0, 'b6918f07e2104eef9f55', '2018-06-14 03:20:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderdetails_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `customer_id` varchar(15) NOT NULL,
  `product_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderdetails_id`, `quantity`, `Total`, `customer_id`, `product_id`) VALUES
(0, 1, 40, 'erico@gmail.com', 'PROD/0012'),
(2, 5, 300, 'emma@gmail.com', 'PROD/002'),
(3, 3, 210, 'emma@gmail.com', 'PROD/003'),
(4, 7, 490, 'emma@gmail.com', 'PROD/004'),
(5, 29, 17400, 'emma@gmail.com', 'PROD/005'),
(6, 3, 1050, 'emma@gmail.com', 'PROD/006'),
(7, 3, 150, 'emma@gmail.com', 'PROD/0013'),
(15, 2, 140, 'daniel12@gmail.', 'PROD/003');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(15) NOT NULL COMMENT 'for my products',
  `title` varchar(20) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `size` varchar(4) NOT NULL,
  `price` int(11) NOT NULL,
  `descr` varchar(100) NOT NULL,
  `logo` varchar(30) NOT NULL,
  `dateout` date NOT NULL,
  `category` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `file` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `publisher`, `size`, `price`, `descr`, `logo`, `dateout`, `category`, `quantity`, `file`) VALUES
('PROD/0010', 'testing', 'emmanuel', '9.9', 30, '', 'PROD_0010.vnd.openxmlformats-o', '2018-07-05', 'select category', 0, '.jpeg.vnd.openxmlformats-officedocument.wordprocessingml.document'),
('PROD/0011', 'banana maker', 'emma', '1.0', 30, 'dfteytryerheerthette', 'PROD_0011.pdf', '2018-11-29', 'Exam Materials', 2, '.png.pdf'),
('PROD/0012', 'hfjhkfjdhadd', 'dsadfaf', '1.7', 40, 'kjhfjhkhfioruhfjdkdhajkf', 'PROD_0012.vnd.openxmlformats-o', '2017-03-03', 'Science Books', 12, '.png.vnd.openxmlformats-officedocument.wordprocessingml.document'),
('PROD/0013', 'summary note', 'emma', '2.0', 50, 'just an article', 'PROD_0013.vnd.openxmlformats-o', '2018-11-29', 'Article', 4, '.png.vnd.openxmlformats-officedocument.wordprocessingml.document'),
('PROD/002', 'changing Life', 'heldy', '2.7', 60, 'mmotivational', 'PROD_002.gif', '2015-09-27', 'Law article', 30, ''),
('PROD/003', 'Ruby and Prolog', 'Amara', '1.5', 70, 'for full stack developer', 'PROD_003.png', '2011-11-29', 'Text Book', 20, ''),
('PROD/004', 'Ruby and Prolog', 'Amara', '3.2', 70, 'for beginners', 'PROD_004.png', '2011-11-29', 'text Book', 10, ''),
('PROD/005', 'Ruby and Prolog', 'Amara', '1.0', 600, 'made for you Beginner', 'PROD_005.png', '2011-11-29', 'Textbook', 50, ''),
('PROD/006', 'Home Sweet Home', 'Chidera', '1.2', 350, 'motivation, drama ', 'PROD_006.png', '2010-03-29', 'Novel', 30, ''),
('PROD/007', 'Smash Ges ', 'Heldy', '0.1', 200, 'exam preparation ', 'PROD_007.png', '2010-03-29', 'article', 10, ''),
('PROD/008', 'csc463', 'ugbara', '1.2', 59, 'lllghhhhhtuhthtuwhtuwthu4it', 'PROD_008.vnd.openxmlformats-of', '2018-11-30', 'Science Books', 22, 'PROD_008.vnd.openxmlformats-officedocument.presentationml.presentation'),
('PROD/009', 'testing', 'emmanuel', '9.9', 30, '', 'PROD_009.vnd.openxmlformats-of', '2018-07-05', 'select category', 0, '.jpeg.vnd.openxmlformats-officedocument.wordprocessingml.document'),
('PROD/010', 'testing', 'emmanuel', '9.9', 30, '', 'PROD_010.vnd.openxmlformats-of', '2018-07-05', 'select category', 0, '.jpeg.vnd.openxmlformats-officedocument.wordprocessingml.document'),
('PROD/011', 'testing', 'emmanuel', '9.9', 30, '', 'PROD_011.vnd.openxmlformats-of', '2018-07-05', 'select category', 0, '.jpeg.vnd.openxmlformats-officedocument.wordprocessingml.document'),
('PROD/012', 'emmn ', 'hmmm', '9.9', 30, 'just testing', 'PROD_012.pdf', '2017-11-26', 'Exam Materials', 4, 'PROD_012.pdf'),
('PROD/013', 'kjkdfjksjf', 'ffdjhfjsh', '9.9', 50, 'dfjrhjhjwhtjrehrtjwt', 'PROD_013.msword', '2018-11-29', 'poetry', 12, 'Generic Project Proposal Template.doc.msword');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transac_id` varchar(8) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `datetime` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `reference` varchar(9) NOT NULL,
  `unixtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  `message` varchar(40) NOT NULL,
  `hash` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transac_id`, `customer_id`, `product_id`, `datetime`, `amount`, `reference`, `unixtime`, `ip_address`, `created_at`, `status`, `message`, `hash`) VALUES
('TRANS/00', 'erico@gmail.com', '', '', '40', 'in7byleup', '2018-06-04 18:47:17', '105.112.35.139', '2018-06-04 18:38:09', 'success', 'Verification successful', '7b8bad575ea549f19859a63be4ef3216'),
('TRANS/1', 'erico@gmail.com', 'PROD/0012', '', '40', '35jgp7ccq', '0000-00-00 00:00:00', '197.210.55.92', '2018-06-04 19:36:13', 'success', 'Verification successful', '91797b567ae7b5b881e07385869e244d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderdetails_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transac_id`),
  ADD UNIQUE KEY `reference` (`reference`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
