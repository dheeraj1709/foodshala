-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql200.epizy.com
-- Generation Time: Jul 07, 2020 at 05:09 AM
-- Server version: 5.6.47-87.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_26128910_foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `restaurant_unique_id` varchar(100) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `item_unique_id` varchar(100) DEFAULT NULL,
  `customer_unique_id` varchar(100) DEFAULT NULL,
  `orderedYN` varchar(10) DEFAULT NULL,
  `cart_item_unique_id` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `restaurant_unique_id`, `updated_on`, `item_unique_id`, `customer_unique_id`, `orderedYN`, `cart_item_unique_id`) VALUES
(8, '5ef3a88101ae7', '2020-06-25 21:44:33', '5ef50da14b429', 'ew', 'Y', '5ef513151f97b'),
(9, '5ef3a88101ae7', '2020-06-25 21:44:33', '5ef50da14b429', 'ew', 'Y', '5ef51332b6b84'),
(10, '', '2020-06-26 18:04:37', '', '', 'Y', '5ef62c3d169e9'),
(11, '5ef3a88101ae7', '2020-06-26 17:29:30', '5ef50d7d87fcc', 'ew', 'Y', '5ef63043ea422'),
(12, '5ef3a88101ae7', '2020-06-26 17:29:30', '5ef50da14b429', 'ew', 'Y', '5ef63048f3f3d'),
(13, '5ef3a88101ae7', '2020-06-26 17:31:24', '5ef50d7d87fcc', 'ew', 'Y', '5ef630d0eeebd'),
(14, '5ef3a88101ae7', '2020-06-26 17:31:24', '5ef50d8ca73a3', 'ew', 'Y', '5ef630d50d4ef'),
(15, '5ef3a88101ae7', '2020-06-26 17:31:24', '5ef50da14b429', 'ew', 'Y', '5ef630d8d7989'),
(16, '5ef3a88101ae7', '2020-06-26 17:34:47', '5ef50da14b429', 'ew', 'Y', '5ef631a8af2a0'),
(17, '5ef3a88101ae7', '2020-06-26 18:06:19', '5ef50d8ca73a3', 'ew', 'Y', '5ef631ac7c6dc'),
(18, '5ef3a88101ae7', '2020-06-26 18:06:19', '5ef50d8ca73a3', 'ew', 'Y', '5ef632fe99be6'),
(19, '5ef3a88101ae7', '2020-06-26 18:06:19', '5ef50da14b429', 'ew', 'Y', '5ef63304e529f'),
(20, '5ef3a88101ae7', '2020-06-26 18:07:40', '5ef50da14b429', 'ew', 'Y', '5ef6393d77933'),
(21, '5ef3a88101ae7', '2020-06-26 18:07:40', '5ef50d8ca73a3', 'ew', 'Y', '5ef63945179eb'),
(22, '5ef3a88101ae7', '2020-06-26 18:07:40', '5ef50da14b429', 'ew', 'Y', '5ef6394a4573d'),
(23, '5ef3a88101ae7', '2020-06-26 18:10:01', '5ef50da14b429', 'ew', 'Y', '5ef639c976393'),
(24, '5ef3a88101ae7', '2020-06-26 18:10:01', '5ef50d8ca73a3', 'ew', 'Y', '5ef639d0905fb'),
(25, '5ef3a88101ae7', '2020-06-27 12:09:23', '5ef50d7d87fcc', 'ew', 'Y', '5ef72f849df81'),
(26, '5ef3a88101ae7', '2020-06-27 12:09:23', '5ef50d8ca73a3', 'ew', 'Y', '5ef72fd3e8803'),
(27, '5ef3a88101ae7', '2020-06-27 12:56:56', '5ef50da14b429', 'ew', 'Y', '5ef7389a58fff'),
(28, '5ef3a88101ae7', '2020-06-27 12:56:56', '5ef50da14b429', 'ew', 'Y', '5ef74205702e9'),
(29, '5ef3a88101ae7', '2020-06-27 21:14:03', '5ef50d7d87fcc', 'ew', 'Y', '5ef7a45f35b31'),
(30, '5ef3a88101ae7', '2020-06-27 20:45:47', '5ef50d8ca73a3', 'ew', 'Y', '5ef7ae7f14e17'),
(31, '5ef3a88101ae7', '2020-06-27 22:07:01', '5ef50da14b429', 'ew', 'Y', '5ef7c2fd5e585'),
(32, '5ef3a88101ae7', '2020-06-27 22:09:18', '5ef50d8ca73a3', 'ew', 'Y', '5ef7c362aa7f2'),
(33, '5ef3a88101ae7', '2020-06-28 12:58:49', '5ef8274320841', 'ew', 'Y', '5ef8276061bd4'),
(34, '5ef3a88101ae7', '2020-06-28 12:58:49', '5ef50d8ca73a3', 'ew', 'Y', '5ef82762939ee'),
(35, '5ef826d6150b0', '2020-06-28 12:58:49', '5ef8274320841', 'ew', 'Y', '5ef83389153e7'),
(36, '5ef826d6150b0', '2020-06-28 12:39:30', '5ef8274320841', '', 'N', '5ef88f821fc6b'),
(37, '5ef3a88101ae7', '2020-06-28 12:39:43', '5ef50d8ca73a3', '', 'N', '5ef88f8f2c753'),
(38, '5ef3a88101ae7', '2020-06-28 12:44:26', '5ef50d8ca73a3', '', 'N', '5ef890aa40c14'),
(39, '5ef826d6150b0', '2020-06-28 12:44:39', '5ef8274320841', '', 'N', '5ef890b706e37'),
(40, '5ef3a88101ae7', '2020-06-28 12:45:04', '5ef50d8ca73a3', '', 'N', '5ef890d0dcf35'),
(41, '5ef3a88101ae7', '2020-06-28 12:45:47', '5ef50d8ca73a3', '', 'N', '5ef890fb2d110'),
(42, '5ef826d6150b0', '2020-06-28 14:17:02', '5ef8274320841', 'ew', 'Y', '5ef89cc3a5f95'),
(43, '5ef826d6150b0', '2020-06-28 18:36:02', '5ef8274320841', 'ew', 'Y', '5ef8e2d589aba'),
(44, '5ef3a88101ae7', '2020-06-28 18:36:02', '5ef50da14b429', 'ew', 'Y', '5ef8e2df79eb2'),
(45, '5ef3a88101ae7', '2020-06-29 02:56:24', '5ef50d8ca73a3', 'ew', 'Y', '5ef901496b1f7'),
(46, '5ef3a88101ae7', '2020-06-30 14:46:47', '5ef50d7d87fcc', 'ew', 'Y', '5efb4fed1d408'),
(48, '5ef826d6150b0', '2020-07-06 11:57:21', '5ef8274320841', 'ew', 'Y', '5f01d10e8c69b'),
(49, '5ef3a88101ae7', '2020-07-06 12:01:18', '5ef50d7d87fcc', 'ew', 'Y', '5f03125c5986f'),
(50, '5ef3a88101ae7', '2020-07-07 04:24:22', '5f03183235dec', 'ew', 'N', '5f03f8cdc1b9f'),
(51, '5ef3a88101ae7', '2020-07-07 08:22:11', '5f03183235dec', '5f03fa1f2fb69', 'Y', '5f04307bc8640');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_unique_id` varchar(100) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_unique_id`, `updated_on`) VALUES
(1, 'Shawarma', '5ecfgabty21', '2020-06-24 21:27:06'),
(2, 'Dosa', '5tewdsamne', '2020-06-24 21:27:06'),
(3, 'Biryani', '5rebredfw', '2020-06-24 21:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `restaurant_unique_id` varchar(200) DEFAULT NULL,
  `coupon_code` varchar(15) DEFAULT NULL,
  `coupon_unique_id` varchar(50) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `item_category_id` varchar(100) DEFAULT NULL,
  `byRestaurantYN` varchar(100) DEFAULT NULL,
  `percentage` varchar(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `restaurant_unique_id`, `coupon_code`, `coupon_unique_id`, `start_date`, `end_date`, `item_category_id`, `byRestaurantYN`, `percentage`) VALUES
(1, NULL, '20', 'hwevfhevh', '2020-06-27 19:58:47', '0000-00-00 00:00:00', NULL, 'N', '25');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `customer_unique_id` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `profile_image` varchar(200) DEFAULT NULL,
  `food_pref` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `mobile`, `password`, `address`, `customer_unique_id`, `email`, `profile_image`, `food_pref`) VALUES
(1, 're', 'ew', '79a628b2d968cfe1a7f9c5e398f6b96a', 'ew', 'ew', 'eqwe', 'eweq', 'eeqw'),
(3, 'dr', '9090', 'dr', 'nal', '5ef3ab8291be2', 'd@d.d', '', 'V'),
(4, 'kumar', '9505062168', '79cfac6387e0d582f83a29a04d0bcdc4', '4-11', '5f03f8f8515b2', 'kumar@gmail.com', '', 'V'),
(5, 'w', 'w', 'f1290186a5d0b1ceab27f4e77c0c5d68', 'w', '5f03fa1f2fb69', 'w', '', 'V'),
(6, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', '5f042d4b8eacc', 'a', '', 'V');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_person`
--

CREATE TABLE `delivery_person` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` int(10) DEFAULT NULL,
  `unique_id` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `rating` float(2,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `vegYN` varchar(10) DEFAULT NULL,
  `item_category_id` varchar(100) DEFAULT NULL,
  `item_unique_id` varchar(100) NOT NULL,
  `restaurant_unique_id` varchar(100) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` int(5) DEFAULT NULL,
  `item_image` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `vegYN`, `item_category_id`, `item_unique_id`, `restaurant_unique_id`, `updated_on`, `price`, `item_image`) VALUES
(9, 'Dal Tadka', 'Veg', '5rebredfw', '5ef50d7d87fcc', '5ef3a88101ae7', '2020-07-06 11:23:36', 100, '5ef50d8c9e51a-5ef50d8c9e51c.png'),
(10, 'Chilly paneer', 'Veg', '5tewdsamne', '5ef50d8ca73a3', '5ef3a88101ae7', '2020-07-06 11:23:46', 200, '5ef50d8c9e51a-5ef50d8c9e51c.png'),
(11, 'Dog\'s Pedigree', 'Veg', '5ecfgabty21', '5ef50da14b429', '5ef3a88101ae7', '2020-07-06 11:24:14', 300, '5ef50d8c9e51a-5ef50d8c9e51c.png'),
(12, 'Spinach', 'Veg', '5tewdsamne', '5ef8274320841', '5ef826d6150b0', '2020-07-06 11:09:14', 150, '5ef50d8c9e51a-5ef50d8c9e51c.png'),
(13, 'Kitchen Kulfi', 'Veg', '5tewdsamne', '5f03183235dec', '5ef3a88101ae7', '2020-07-06 12:26:03', 150, '5f031831eb251-5f031831eb254.png');

-- --------------------------------------------------------

--
-- Table structure for table `jokes`
--

CREATE TABLE `jokes` (
  `id` int(11) NOT NULL,
  `joke` varchar(500) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jokes`
--

INSERT INTO `jokes` (`id`, `joke`, `updated_on`) VALUES
(1, 'Q: Why do hamburgers go to the gym A: To get better buns!', '2020-06-27 10:22:12'),
(2, 'Just burned 2,000 calories. Thats the last time I leave brownies in the oven while I nap', '2020-06-27 10:22:12'),
(3, 'The dinner I was cooking for my family was going to be a surprise but the fire trucks ruined it.', '2020-06-27 10:22:12'),
(4, 'I would request a last meal of soda and pop rocks so I could die on my own terms.', '2020-06-27 10:22:12'),
(5, 'Turning vegan is a big missed steak.', '2020-06-27 10:22:13'),
(6, 'Why do the French eat snails? They dont like fast food.', '2020-06-27 10:22:13'),
(7, 'Now whats on the menu? Me-n-u', '2020-06-27 10:22:13'),
(8, 'Turning vegan is a big missed steak.', '2020-06-27 10:22:13'),
(9, 'Spoiler alert! The milk has been in the fridge for three weeks.', '2020-06-27 10:22:13'),
(10, 'I eat my tacos over a Tortilla. That way when stuff falls out, BOOM, another taco.', '2020-06-27 10:22:13'),
(11, ' Ive just written a song about tortillas - actually, its more of a rap', '2020-06-27 10:22:13'),
(12, 'Diet Day #1 - I removed all the fattening food from my house. It was delicious.', '2020-06-27 10:22:13'),
(13, 'One day youre the best thing since sliced bread. The next, youre toast.', '2020-06-27 10:22:13'),
(14, 'Excuse me? Do you work at Little Ceasars? Cuz Ur Hot And Im Ready.', '2020-06-27 10:22:13'),
(15, 'Sorry I just saw your text from last night, are you guys still at the restaurant', '2020-06-27 10:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_reference` varchar(100) NOT NULL,
  `item_unique_id` varchar(100) DEFAULT NULL,
  `restaurant_unique_id` varchar(100) DEFAULT NULL,
  `customer_unique_id` varchar(50) DEFAULT NULL,
  `delivery_person_unique_id` varchar(100) DEFAULT NULL,
  `coupon_applied_YN` varchar(10) DEFAULT NULL,
  `coupon_code` varchar(100) DEFAULT NULL,
  `rating` float(2,2) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` int(10) DEFAULT NULL,
  `delivered` varchar(10) DEFAULT NULL,
  `packed` varchar(20) DEFAULT NULL,
  `delivery_code` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_reference`, `item_unique_id`, `restaurant_unique_id`, `customer_unique_id`, `delivery_person_unique_id`, `coupon_applied_YN`, `coupon_code`, `rating`, `updated_on`, `price`, `delivered`, `packed`, `delivery_code`) VALUES
(28, '5ef74218ada85', '5ef50da14b429', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-07-07 05:16:35', 300, 'Y', 'Y', NULL),
(29, '5ef7a75c41fa4', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-07-07 05:53:16', 100, 'Y', 'Y', NULL),
(30, '5ef7a7d06649a', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-07-07 05:58:19', 100, 'Y', 'Y', NULL),
(31, '5ef7a81fbd8fa', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-07-07 09:06:41', 100, 'N', 'N', '6942'),
(32, '5ef7a8b71293c', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-06-30 14:51:39', 100, 'N', 'Y', '5272'),
(33, '5ef7a92d344fc', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-06-30 14:51:33', 100, 'N', 'Y', '4685'),
(34, '5ef7a95bebf03', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-06-30 14:51:32', 100, 'N', 'Y', '7569'),
(35, '5ef7aa8087f7e', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-06-30 14:51:31', 100, 'N', 'Y', '3003'),
(36, '5ef7aad865df5', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-06-30 14:51:30', 78, 'N', 'Y', '1454'),
(38, '5ef7ab9dedcdf', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-06-30 14:51:27', 75, 'N', 'Y', '9380'),
(39, '5ef7abd2d1885', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-06-30 14:51:29', 75, 'N', 'Y', '9292'),
(40, '5ef7ac3505bba', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-06-30 14:51:09', 78, 'N', 'Y', '1873'),
(42, '5ef7add488d3e', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-06-30 14:51:07', 78, 'N', 'Y', '3649'),
(45, '5ef7b69b9f2e0', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-06-30 14:51:21', 75, 'N', 'Y', '2406'),
(46, '5ef7c3059e1d0', '5ef50da14b429', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-06-30 14:51:04', 225, 'N', 'Y', '6281'),
(52, '5ef8e2eb41bae', '5ef8274320841', '5ef826d6150b0', 'ew', NULL, NULL, NULL, NULL, '2020-07-07 08:10:03', 150, 'Y', 'Y', NULL),
(53, '5ef8e2eb41bae', '5ef50da14b429', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-07-07 08:10:11', 300, 'Y', 'Y', NULL),
(54, '5ef958315d1ac', '5ef50d8ca73a3', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-07-07 08:40:52', 200, 'Y', 'Y', NULL),
(55, '5efb502f671a4', '5ef50d7d87fcc', '5ef3a88101ae7', 'ew', NULL, NULL, NULL, NULL, '2020-07-07 09:06:29', 75, 'Y', 'Y', '6789'),
(58, '5f04308a10b84', '5f03183235dec', '5ef3a88101ae7', '5f03fa1f2fb69', NULL, NULL, NULL, NULL, '2020-07-07 08:22:11', 150, 'N', 'N', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `restaurant_name` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `passwords` varchar(100) DEFAULT NULL,
  `rating` float(2,2) DEFAULT NULL,
  `restaurant_unique_id` varchar(200) NOT NULL,
  `number_of_tables` int(5) DEFAULT NULL,
  `timings` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `contact` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `restaurant_name`, `user_name`, `address`, `passwords`, `rating`, `restaurant_unique_id`, `number_of_tables`, `timings`, `contact`) VALUES
(1, 'Dheeraj Bhai Restaurant', 'dr', 'nal', 'b4688aaaaf17fad03225929fe56ad458', NULL, '5ef3a88101ae7', 60, '2020-07-06 11:24:48', '9090'),
(2, 'India Restaurant', 'da', 'hifi', 'b4688aaaaf17fad03225929fe56ad458', NULL, '5ef826d6150b0', 80, '2020-07-06 11:25:06', '92103921'),
(3, 'Delhi Restaurant', 'delhi', 'Delhi', '76597d97e36fb7adda5d26b609a23452', NULL, '5f043b71b6c05', 48, '0000-00-00 00:00:00', '7878');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `total_supports` int(10) DEFAULT NULL,
  `support_unique_id` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`,`category_name`,`category_unique_id`),
  ADD UNIQUE KEY `category_name` (`category_name`),
  ADD UNIQUE KEY `category_unique_id` (`category_unique_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`,`coupon_unique_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`,`customer_unique_id`);

--
-- Indexes for table `delivery_person`
--
ALTER TABLE `delivery_person`
  ADD PRIMARY KEY (`id`,`unique_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`,`item_unique_id`);

--
-- Indexes for table `jokes`
--
ALTER TABLE `jokes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`,`order_reference`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`,`restaurant_unique_id`,`user_name`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `restaurant_unique_id` (`restaurant_unique_id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery_person`
--
ALTER TABLE `delivery_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jokes`
--
ALTER TABLE `jokes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
