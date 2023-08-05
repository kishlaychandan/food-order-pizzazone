-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 06:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'hii', 'hii', 'f057f5ccb87a310534b9dda3a69a72c4'),
(4, 'krish', 'krish00', '0d57dca2d8e0e017e963be8d42022ab3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(2, 'veg pizza', 'Food_Category_739.jpg', 'Yes', 'Yes'),
(3, 'Non veg pizza', 'Food_Category_727.jpg', 'Yes', 'Yes'),
(4, 'Pizza Mania', 'Food_Category_921.jpg', 'Yes', 'Yes'),
(5, 'Beverages', 'Food_Category_636.jpg', 'Yes', 'Yes'),
(6, 'Dessert', 'Food_Category_180.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(2, 'paneer pizza', 'This pizza is made of paneer butter.. and it is very delicious', '190', 'Food-name-9082.jpg', 2, 'Yes', 'Yes'),
(6, 'chicken pizza', 'American classic!Spicy,herbed chicken sasusage on pizza', '195', 'Food-name-8254.jpg', 3, 'Yes', 'Yes'),
(7, 'coca cola', 'Refresh the day...', '60', 'Food-name-4293.jpg', 5, 'Yes', 'Yes'),
(8, 'Choco Cake', 'choclate lovers delight!', '99', 'Food-name-9698.jpg', 6, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `odid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `odid`) VALUES
(1, 'hoho', '1', 1, '1', '2021-09-08 08:44:56', 'on delivery', 'dfdsaf', '657657', '1', 'fsdf', ''),
(2, 'paneer pizza', '190', 1, '190', '2021-09-09 12:03:01', 'Ordered', 'kishlay chandan', '9631252292', 'kishlaychanda00@gmail.com', 'jalahali cross banglore', ''),
(3, 'paneer pizza', '190', 2, '380', '2021-09-12 10:30:18', 'Ordered', 'Saui RAj', '3716925861', 'sai@aekb.com', 'bangalore', '137785564136'),
(4, 'chicken pizza', '195', 3, '585', '2021-09-12 10:32:27', 'Ordered', 'raj', '8754784587', 'Kishlaychandan00@gmail.com', 'Jalahali cross Bangalore', '765018226456'),
(5, 'chicken pizza', '195', 3, '585', '2021-09-12 10:34:14', 'Ordered', 'raj', '8754784587', 'Kishlaychandan00@gmail.com', 'Jalahali cross Bangalore', '258317097123'),
(6, 'chicken pizza', '195', 3, '585', '2021-09-12 10:37:06', 'Ordered', 'raj', '8754784587', 'Kishlaychandan00@gmail.com', 'Jalahali cross Bangalore', '864170378405'),
(7, 'coca cola', '60', 1, '60', '2021-09-12 10:49:24', 'Ordered', 'cYAdPK7sUS', '5276281584', 'p5au0@hdzq.com', '5RkiXcwUiL', '203161922884'),
(8, 'coca cola', '60', 1, '60', '2021-09-12 10:51:25', 'Ordered', 'cYAdPK7sUS', '5276281584', 'p5au0@hdzq.com', '5RkiXcwUiL', '192280961519'),
(9, 'coca cola', '60', 1, '60', '2021-09-12 10:52:06', 'Ordered', 'cYAdPK7sUS', '5276281584', 'p5au0@hdzq.com', '5RkiXcwUiL', '194513007463'),
(10, 'coca cola', '60', 1, '60', '2021-09-12 10:52:14', 'cancelled', 'cYAdPK7sUS', '5276281584', '10', '5RkiXcwUiL', '720587291072'),
(11, 'paneer pizza', '190', 1, '190', '2021-09-12 10:54:49', 'delivered', 'AItm8cUQEy', '9702424471', '11', 'wcYyBw7ZNW', '459391986629'),
(12, 'paneer pizza', '190', 1, '190', '2021-09-12 11:04:20', 'Ordered', 'AItm8cUQEy', '9702424471', '5x0th@xrgz.com', 'wcYyBw7ZNW', '832064154757'),
(13, 'chicken pizza', '195', 1, '195', '2021-09-12 11:06:32', 'Ordered', 'zIPci4bz4L', '9369503393', 'lgqqs@s0do.com', 'tbqK2IvdVG', '971294524771'),
(14, 'paneer pizza', '190', 2, '380', '2021-09-12 11:12:11', 'delivered', 'Hhhjrbst6N', '0602158986', '14', 'HIfuEWIGHC', '318852034548'),
(15, 'paneer pizza', '190', 3, '570', '2021-09-13 05:16:50', 'on delivery', 'kishlay chandan', '9631252292', '15', 'jalahali cross banglore', '372112188279'),
(16, 'paneer pizza', '190', 1, '190', '2021-09-13 05:41:34', 'Ordered', 'kishlay chandan', '9631252292', 'kishlaychanda00@gmail.com', 'jalahali cross banglore', '732798643026'),
(17, 'paneer pizza', '190', 2, '380', '2021-09-13 05:42:24', 'Ordered', 'jyeeuyrj', '5745647', 'kishlaychanda00@gmail.com', 'jalahali cross banglore', '479598703122'),
(18, 'paneer pizza', '190', 2, '380', '2021-09-13 12:35:57', 'Ordered', 'kishlay chandan', '9631252292', 'kishlaychanda00@gmail.com', 'jalahalli cross', '596866437487'),
(19, 'paneer pizza', '190', 1, '190', '2021-09-13 12:37:44', 'on delivery', 'kishlay chandan', '9631252292', '19', 'jalahali cross banglore', '942534866625');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
