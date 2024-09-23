-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2018 at 05:55 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping`
--

-- ------------------------------------------------------

--
-- Table structure for table `acct_no`
--

CREATE TABLE `acct_no` (
  `id` int(4) NOT NULL auto_increment,
  `acct` varchar(20) NOT NULL default '',
  `used` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `acct` (`acct`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `acct_no`
--

INSERT INTO `acct_no` (`id`, `acct`, `used`) VALUES
(5, '25112233', 'yes'),
(4, '24112233', 'yes'),
(3, '23112233', 'yes'),
(2, '22112233', 'yes'),
(1, '21112233', 'yes'),
(6, '26112233', 'yes'),
(7, '27112233', 'no'),
(8, '28112233', 'no'),
(9, '29112233', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `adfrom` varchar(20) NOT NULL,
  `models` varchar(30) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `star1` int(11) NOT NULL,
  `star2` int(11) NOT NULL,
  `star3` int(11) NOT NULL,
  `star4` int(11) NOT NULL,
  `star5` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `pcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `catid`, `product`, `adfrom`, `models`, `product_image`, `price`, `quantity`, `description`, `star1`, `star2`, `star3`, `star4`, `star5`, `rating`, `pcount`) VALUES
(1, 2, 'Samsung', '', 'Galexy J7', 'Samsung Galaxy J7.jpg', 14664, 97, '5.5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 0, 1, 5, 2),
(2, 2, 'Samsung', '', 'Galaxy J2', 'Samsung Galaxy J2.jpg', 8215, 100, '4.7 inch Screen\r\nDual SIM\r\n5 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1 GB RAM', 0, 0, 1, 0, 0, 3, 0),
(3, 2, 'Samsung', '', 'Galaxy On7', 'Samsung Galaxy On7.jpg', 10990, 100, '5.5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 1, 0, 4, 0),
(4, 2, 'Samsung', '', 'Galaxy J5', 'Samsung Galaxy J5.jpg', 11766, 100, '5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 1, 0, 4, 0),
(5, 2, 'Nokia', '', 'C2', 'Nokia C2.jpg', 999, 100, '1.8 inch Screen\r\nDual SIM\r\n0.3 MP Camera\r\nOther OS', 0, 0, 1, 1, 0, 4, 0),
(6, 2, 'Nokia', '', '130 Dual SIM', 'Nokia 130 Dual SIM.jpg', 1499, 98, '1.8 inch Screen\r\nDual SIM\r\nOther OS', 0, 0, 0, 0, 2, 5, 0),
(7, 2, 'Nokia', '', 'Lumia 730', 'Nokia Lumina 730.jpg', 15590, 100, '4.7 inch Screen\r\nDual SIM\r\n6.7 MP Camera\r\nWindows Phone 8.1 OS\r\n1 GB RAM', 0, 0, 0, 0, 0, 0, 0),
(8, 2, 'Nokia', '', '225 Dual Sim', 'Nokia 225 Dual Sim.jpg', 3149, 100, '2.8 inch Screen\r\nDual SIM\r\n2 MP Camera\r\nOther OS', 0, 0, 0, 0, 0, 0, 0),
(9, 2, 'Sony', '', 'Xperia M4 Aqua Dual', 'Sony Xperia M4 Aqua Dual.jpg', 16549, 96, '5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 1, 1, 5, 2),
(10, 2, 'Sony', '', 'Xperia C5 Ultra Dual', 'Sony Xperia C5 Ultra Dual.jpg', 13990, 95, '5 inch Screen\r\nSingle SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 1, 0, 4, 4),
(11, 2, 'Sony', '', 'Xperia T2 Ultra Dual', 'Sony Xperia T2 Ultra Dual.jpg', 13884, 100, '6 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 4.3 Jelly Bean OS\r\n1 GB RAM', 0, 0, 0, 0, 0, 0, 0),
(12, 2, 'Sony', '', 'Xperia M4 Aqua', 'Sony Xperia M4 Aqua.jpg', 13990, 98, '5 inch Screen\r\nSingle SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `amazon`
--

CREATE TABLE `amazon` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `adfrom` varchar(50) NOT NULL,
  `models` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `star1` int(11) NOT NULL,
  `star2` int(11) NOT NULL,
  `star3` int(11) NOT NULL,
  `star4` int(11) NOT NULL,
  `star5` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `pcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amazon`
--

INSERT INTO `amazon` (`id`, `catid`, `product`, `adfrom`, `models`, `product_image`, `price`, `quantity`, `description`, `star1`, `star2`, `star3`, `star4`, `star5`, `rating`, `pcount`) VALUES
(1, 2, 'Lenovo', '', 'L1', 'Chrysanthemum.jpg', 8000, 20, 'regtrht', 0, 0, 0, 0, 0, 0, 0),
(1, 2, 'Samsung', '', 'Galexy J7', 'Samsung Galaxy J7.jpg', 14664, 97, '5.5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 0, 1, 5, 2),
(2, 2, 'Samsung', '', 'Galaxy J2', 'Samsung Galaxy J2.jpg', 8215, 100, '4.7 inch Screen\r\nDual SIM\r\n5 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1 GB RAM', 0, 0, 1, 0, 0, 3, 0),
(3, 2, 'Samsung', '', 'Galaxy On7', 'Samsung Galaxy On7.jpg', 10990, 100, '5.5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 1, 0, 4, 0),
(4, 2, 'Samsung', '', 'Galaxy J5', 'Samsung Galaxy J5.jpg', 11766, 100, '5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 1, 0, 4, 0),
(5, 2, 'Nokia', '', 'C2', 'Nokia C2.jpg', 999, 100, '1.8 inch Screen\r\nDual SIM\r\n0.3 MP Camera\r\nOther OS', 0, 0, 1, 1, 0, 4, 0),
(6, 2, 'Nokia', '', '130 Dual SIM', 'Nokia 130 Dual SIM.jpg', 1499, 98, '1.8 inch Screen\r\nDual SIM\r\nOther OS', 0, 0, 0, 0, 2, 5, 0),
(7, 2, 'Nokia', '', 'Lumia 730', 'Nokia Lumina 730.jpg', 15590, 100, '4.7 inch Screen\r\nDual SIM\r\n6.7 MP Camera\r\nWindows Phone 8.1 OS\r\n1 GB RAM', 0, 0, 0, 0, 0, 0, 0),
(8, 2, 'Nokia', '', '225 Dual Sim', 'Nokia 225 Dual Sim.jpg', 3149, 100, '2.8 inch Screen\r\nDual SIM\r\n2 MP Camera\r\nOther OS', 0, 0, 0, 0, 0, 0, 0),
(9, 2, 'Sony', '', 'Xperia M4 Aqua Dual', 'Sony Xperia M4 Aqua Dual.jpg', 16549, 96, '5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 1, 1, 5, 2),
(10, 2, 'Sony', '', 'Xperia C5 Ultra Dual', 'Sony Xperia C5 Ultra Dual.jpg', 13990, 95, '5 inch Screen\r\nSingle SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 1, 0, 4, 4),
(11, 2, 'Sony', '', 'Xperia T2 Ultra Dual', 'Sony Xperia T2 Ultra Dual.jpg', 13884, 100, '6 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 4.3 Jelly Bean OS\r\n1 GB RAM', 0, 0, 0, 0, 0, 0, 0),
(12, 2, 'Sony', '', 'Xperia M4 Aqua', 'Sony Xperia M4 Aqua.jpg', 13990, 98, '5 inch Screen\r\nSingle SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Laptop'),
(2, 'Mobile'),
(3, 'LCD TV'),
(5, 'camera'),
(6, 'Air Conditioner');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `pincode` int(11) NOT NULL,
  `uname` varchar(40) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `delivery`
--


-- --------------------------------------------------------

--
-- Table structure for table `epay`
--

CREATE TABLE `epay` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `adfrom` varchar(50) NOT NULL,
  `models` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `star1` int(11) NOT NULL,
  `star2` int(11) NOT NULL,
  `star3` int(11) NOT NULL,
  `star4` int(11) NOT NULL,
  `star5` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `pcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `epay`
--

INSERT INTO `epay` (`id`, `catid`, `product`, `adfrom`, `models`, `product_image`, `price`, `quantity`, `description`, `star1`, `star2`, `star3`, `star4`, `star5`, `rating`, `pcount`) VALUES
(1, 2, 'Lenovo', '', 'L1', 'Chrysanthemum.jpg', 8000, 20, 'regtrht', 0, 0, 0, 0, 0, 0, 0),
(1, 2, 'Samsung', '', 'Galexy J7', 'Samsung Galaxy J7.jpg', 14664, 97, '5.5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 0, 1, 5, 2),
(2, 2, 'Samsung', '', 'Galaxy J2', 'Samsung Galaxy J2.jpg', 8215, 100, '4.7 inch Screen\r\nDual SIM\r\n5 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1 GB RAM', 0, 0, 1, 0, 0, 3, 0),
(3, 2, 'Samsung', '', 'Galaxy On7', 'Samsung Galaxy On7.jpg', 10990, 100, '5.5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 1, 0, 4, 0),
(4, 2, 'Samsung', '', 'Galaxy J5', 'Samsung Galaxy J5.jpg', 11766, 100, '5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 1, 0, 4, 0),
(5, 2, 'Nokia', '', 'C2', 'Nokia C2.jpg', 999, 100, '1.8 inch Screen\r\nDual SIM\r\n0.3 MP Camera\r\nOther OS', 0, 0, 1, 1, 0, 4, 0),
(6, 2, 'Nokia', '', '130 Dual SIM', 'Nokia 130 Dual SIM.jpg', 1499, 98, '1.8 inch Screen\r\nDual SIM\r\nOther OS', 0, 0, 0, 0, 2, 5, 0),
(7, 2, 'Nokia', '', 'Lumia 730', 'Nokia Lumina 730.jpg', 15590, 100, '4.7 inch Screen\r\nDual SIM\r\n6.7 MP Camera\r\nWindows Phone 8.1 OS\r\n1 GB RAM', 0, 0, 0, 0, 0, 0, 0),
(8, 2, 'Nokia', '', '225 Dual Sim', 'Nokia 225 Dual Sim.jpg', 3149, 100, '2.8 inch Screen\r\nDual SIM\r\n2 MP Camera\r\nOther OS', 0, 0, 0, 0, 0, 0, 0),
(9, 2, 'Sony', '', 'Xperia M4 Aqua Dual', 'Sony Xperia M4 Aqua Dual.jpg', 16549, 96, '5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 1, 1, 5, 2),
(10, 2, 'Sony', '', 'Xperia C5 Ultra Dual', 'Sony Xperia C5 Ultra Dual.jpg', 13990, 95, '5 inch Screen\r\nSingle SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 1, 0, 4, 4),
(11, 2, 'Sony', '', 'Xperia T2 Ultra Dual', 'Sony Xperia T2 Ultra Dual.jpg', 13884, 100, '6 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 4.3 Jelly Bean OS\r\n1 GB RAM', 0, 0, 0, 0, 0, 0, 0),
(12, 2, 'Sony', '', 'Xperia M4 Aqua', 'Sony Xperia M4 Aqua.jpg', 13990, 98, '5 inch Screen\r\nSingle SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(4) NOT NULL auto_increment,
  `acct` varchar(20) NOT NULL default '',
  `depo` int(15) NOT NULL default '0',
  `event` varchar(20) NOT NULL default '',
  `time` varchar(30) NOT NULL default '',
  `day` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event`
--


-- --------------------------------------------------------

--
-- Table structure for table `flipkart`
--

CREATE TABLE `flipkart` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `adfrom` varchar(50) NOT NULL,
  `models` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `star1` int(11) NOT NULL,
  `star2` int(11) NOT NULL,
  `star3` int(11) NOT NULL,
  `star4` int(11) NOT NULL,
  `star5` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `pcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flipkart`
--

INSERT INTO `flipkart` (`id`, `catid`, `product`, `adfrom`, `models`, `product_image`, `price`, `quantity`, `description`, `star1`, `star2`, `star3`, `star4`, `star5`, `rating`, `pcount`) VALUES
(1, 2, 'Lenovo', '', 'L1', 'Chrysanthemum.jpg', 8000, 20, 'regtrht', 0, 0, 0, 0, 0, 0, 0),
(1, 2, 'Samsung', '', 'Galexy J7', 'Samsung Galaxy J7.jpg', 14664, 97, '5.5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 0, 1, 5, 2),
(2, 2, 'Samsung', '', 'Galaxy J2', 'Samsung Galaxy J2.jpg', 8215, 100, '4.7 inch Screen\r\nDual SIM\r\n5 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1 GB RAM', 0, 0, 1, 0, 0, 3, 0),
(3, 2, 'Samsung', '', 'Galaxy On7', 'Samsung Galaxy On7.jpg', 10990, 100, '5.5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 1, 0, 4, 0),
(4, 2, 'Samsung', '', 'Galaxy J5', 'Samsung Galaxy J5.jpg', 11766, 100, '5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 1, 0, 4, 0),
(5, 2, 'Nokia', '', 'C2', 'Nokia C2.jpg', 999, 100, '1.8 inch Screen\r\nDual SIM\r\n0.3 MP Camera\r\nOther OS', 0, 0, 1, 1, 0, 4, 0),
(6, 2, 'Nokia', '', '130 Dual SIM', 'Nokia 130 Dual SIM.jpg', 1499, 98, '1.8 inch Screen\r\nDual SIM\r\nOther OS', 0, 0, 0, 0, 2, 5, 0),
(7, 2, 'Nokia', '', 'Lumia 730', 'Nokia Lumina 730.jpg', 15590, 100, '4.7 inch Screen\r\nDual SIM\r\n6.7 MP Camera\r\nWindows Phone 8.1 OS\r\n1 GB RAM', 0, 0, 0, 0, 0, 0, 0),
(8, 2, 'Nokia', '', '225 Dual Sim', 'Nokia 225 Dual Sim.jpg', 3149, 100, '2.8 inch Screen\r\nDual SIM\r\n2 MP Camera\r\nOther OS', 0, 0, 0, 0, 0, 0, 0),
(9, 2, 'Sony', '', 'Xperia M4 Aqua Dual', 'Sony Xperia M4 Aqua Dual.jpg', 16549, 96, '5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 1, 1, 5, 2),
(10, 2, 'Sony', '', 'Xperia C5 Ultra Dual', 'Sony Xperia C5 Ultra Dual.jpg', 13990, 95, '5 inch Screen\r\nSingle SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 1, 0, 4, 4),
(11, 2, 'Sony', '', 'Xperia T2 Ultra Dual', 'Sony Xperia T2 Ultra Dual.jpg', 13884, 100, '6 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 4.3 Jelly Bean OS\r\n1 GB RAM', 0, 0, 0, 0, 0, 0, 0),
(12, 2, 'Sony', '', 'Xperia M4 Aqua', 'Sony Xperia M4 Aqua.jpg', 13990, 98, '5 inch Screen\r\nSingle SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ipdetails`
--

CREATE TABLE `ipdetails` (
  `id` int(11) NOT NULL,
  `ipaddress` varchar(30) NOT NULL,
  `hostname` varchar(30) NOT NULL,
  `visit` bigint(20) NOT NULL,
  `rdate` varchar(15) NOT NULL,
  `sess_id` int(11) NOT NULL,
  `stime` varchar(30) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `access_page` text NOT NULL,
  `os_det` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `screen_size` varchar(50) NOT NULL,
  `dtime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `acc_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `email`, `acc_no`) VALUES
('admin', 'admin', 'admin@gmail.com', '21112233'),
('flipkart', 'flipkart', '', ''),
('amazon', 'amazon', '', ''),
('epay', 'epay', '', ''),
('snapdeal', 'snapdeal', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `myacct`
--

CREATE TABLE `myacct` (
  `id` int(4) NOT NULL auto_increment,
  `acct` varchar(20) NOT NULL default '',
  `card` varchar(30) NOT NULL default '',
  `name` varchar(30) NOT NULL default '',
  `depo` int(15) NOT NULL default '0',
  `day` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `acct` (`acct`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `myacct`
--

INSERT INTO `myacct` (`id`, `acct`, `card`, `name`, `depo`, `day`) VALUES
(1, '21112233', '', 'admin', 55000, '2017-09-03'),
(2, '224466', '', 'Gopi', 45000, '2017-09-19'),
(3, '24123421', '', 'John', 45000, '2017-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `service` varchar(50) NOT NULL,
  `orderid` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pid` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `review` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_review`
--


-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `acc_no` varchar(30) NOT NULL,
  `credit` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `secret_code` varchar(50) NOT NULL,
  `macaddress` varchar(50) NOT NULL,
  `rdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `gender`, `address`, `pincode`, `contact`, `email`, `bank_name`, `acc_no`, `credit`, `username`, `password`, `secret_code`, `macaddress`, `rdate`) VALUES
(1, 'Siva', 'Male', 'ddd', 620002, 9976570006, 'siva@gmail.com', '', '', 12345, 'siva', '123456', '', '', '2017-09-17'),
(2, 'Suresh', 'Male', '44,vv', 620002, 9976570006, 'sanjeevi@oculusit.in', '', '', 4567, 'suresh', '123456', '', '', '2017-09-17'),
(3, 'Kumar', 'Male', 'ss', 6444040, 9911442277, 'a@gmail.com', '', '', 12345, 'kumar', '123456', '', '02-E6-20-10-0B-57', '2017-10-06'),
(4, 'Samm', 'Male', 'aa', 64344545, 8807607975, 'sam@gmail.com', '', '', 123456, 'sam', '123456', '', '02-E6-20-0A-20-59', '2017-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `snapdeal`
--

CREATE TABLE `snapdeal` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `adfrom` varchar(50) NOT NULL,
  `models` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `star1` int(11) NOT NULL,
  `star2` int(11) NOT NULL,
  `star3` int(11) NOT NULL,
  `star4` int(11) NOT NULL,
  `star5` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `pcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `snapdeal`
--

INSERT INTO `snapdeal` (`id`, `catid`, `product`, `adfrom`, `models`, `product_image`, `price`, `quantity`, `description`, `star1`, `star2`, `star3`, `star4`, `star5`, `rating`, `pcount`) VALUES
(1, 2, 'Lenovo', '', 'L1', 'Chrysanthemum.jpg', 8000, 20, 'regtrht', 0, 0, 0, 0, 0, 0, 0),
(1, 2, 'Samsung', '', 'Galexy J7', 'Samsung Galaxy J7.jpg', 14664, 97, '5.5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 0, 1, 5, 2),
(2, 2, 'Samsung', '', 'Galaxy J2', 'Samsung Galaxy J2.jpg', 8215, 100, '4.7 inch Screen\r\nDual SIM\r\n5 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1 GB RAM', 0, 0, 1, 0, 0, 3, 0),
(3, 2, 'Samsung', '', 'Galaxy On7', 'Samsung Galaxy On7.jpg', 10990, 100, '5.5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 1, 0, 4, 0),
(4, 2, 'Samsung', '', 'Galaxy J5', 'Samsung Galaxy J5.jpg', 11766, 100, '5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.1.1 Lollipop OS\r\n1.5 GB RAM', 0, 0, 0, 1, 0, 4, 0),
(5, 2, 'Nokia', '', 'C2', 'Nokia C2.jpg', 999, 100, '1.8 inch Screen\r\nDual SIM\r\n0.3 MP Camera\r\nOther OS', 0, 0, 1, 1, 0, 4, 0),
(6, 2, 'Nokia', '', '130 Dual SIM', 'Nokia 130 Dual SIM.jpg', 1499, 98, '1.8 inch Screen\r\nDual SIM\r\nOther OS', 0, 0, 0, 0, 2, 5, 0),
(7, 2, 'Nokia', '', 'Lumia 730', 'Nokia Lumina 730.jpg', 15590, 100, '4.7 inch Screen\r\nDual SIM\r\n6.7 MP Camera\r\nWindows Phone 8.1 OS\r\n1 GB RAM', 0, 0, 0, 0, 0, 0, 0),
(8, 2, 'Nokia', '', '225 Dual Sim', 'Nokia 225 Dual Sim.jpg', 3149, 100, '2.8 inch Screen\r\nDual SIM\r\n2 MP Camera\r\nOther OS', 0, 0, 0, 0, 0, 0, 0),
(9, 2, 'Sony', '', 'Xperia M4 Aqua Dual', 'Sony Xperia M4 Aqua Dual.jpg', 16549, 96, '5 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 1, 1, 5, 2),
(10, 2, 'Sony', '', 'Xperia C5 Ultra Dual', 'Sony Xperia C5 Ultra Dual.jpg', 13990, 95, '5 inch Screen\r\nSingle SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 1, 0, 4, 4),
(11, 2, 'Sony', '', 'Xperia T2 Ultra Dual', 'Sony Xperia T2 Ultra Dual.jpg', 13884, 100, '6 inch Screen\r\nDual SIM\r\n13 MP Camera\r\nAndroid 4.3 Jelly Bean OS\r\n1 GB RAM', 0, 0, 0, 0, 0, 0, 0),
(12, 2, 'Sony', '', 'Xperia M4 Aqua', 'Sony Xperia M4 Aqua.jpg', 13990, 98, '5 inch Screen\r\nSingle SIM\r\n13 MP Camera\r\nAndroid 5.0 Lollipop OS\r\n2 GB RAM', 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_purchase`
--

CREATE TABLE `user_purchase` (
  `id` int(11) NOT NULL auto_increment,
  `catergory` varchar(25) NOT NULL,
  `pname` varchar(25) NOT NULL,
  `price` int(55) NOT NULL,
  `uqut` int(55) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `pid` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cod_status` int(11) NOT NULL,
  `delivery_status` int(11) NOT NULL,
  `day1` int(11) NOT NULL,
  `month1` varchar(20) NOT NULL,
  `year1` int(11) NOT NULL,
  `rdate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_purchase`
--

INSERT INTO `user_purchase` (`id`, `catergory`, `pname`, `price`, `uqut`, `uname`, `pid`, `nid`, `status`, `cod_status`, `delivery_status`, `day1`, `month1`, `year1`, `rdate`) VALUES
(1, '2', 'Samsung', 14664, 1, 'siva', 1, 1, 1, 0, 1, 20, 'Aug', 2017, '2017-10-06 14:09:42'),
(2, '2', 'Sony', 16549, 1, 'siva', 1, 9, 1, 0, 0, 20, 'Aug', 2017, '2017-10-06 14:09:42'),
(3, '2', 'Sony', 13990, 2, 'siva', 2, 10, 1, 1, 1, 15, 'Sep', 2017, '2017-10-06 14:09:43'),
(4, '2', 'Sony', 13990, 2, 'suresh', 3, 10, 1, 0, 0, 17, 'Sep', 2017, '2017-10-06 14:09:43');
