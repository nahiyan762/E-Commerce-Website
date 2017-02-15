-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2016 at 10:52 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Shirt'),
(2, 'Pant');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `product_id` (`product_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `product_id`, `user_id`, `description`, `rating`) VALUES
(1, 1, 12, 'sdnfkjsdnfls', 1),
(2, 5, 12, 'mbgdfkmb', 1),
(3, 1, 12, 'jdfskdbnk', 3),
(4, 12, 12, 'jndcisdnci', 1),
(5, 5, 12, 'jnfkjdnvk', 2),
(6, 12, 12, 'sdjbfsdjvb', 5),
(7, 12, 12, 'dsrxtxrt', 3);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `delivery_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `check` varchar(10) NOT NULL,
  PRIMARY KEY (`delivery_id`),
  KEY `place` (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `service_id`, `address`, `amount`, `date`, `check`) VALUES
(7, 2, 'boubazar h no 20', 1857.5, '2016-09-06', 'clear'),
(8, 1, 'javcjcvjabc', 606.25, '2016-09-07', 'clear'),
(9, 1, 'kalkal', 606.25, '2016-09-07', 'clear'),
(10, 1, 'house 134/4', 2915, '2016-09-10', 'clear'),
(11, 3, 'redwrtwf', 6730, '2016-09-07', ''),
(12, 2, 'hrghgr', 1429, '2016-09-07', ''),
(13, 1, 'ftvybgytrctv', 4720, '2016-09-05', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_pass`, `user_gender`, `user_type`) VALUES
(9, 'ali', 'ali@aiub.edu', '01670321824', '123', 'male', 'member'),
(11, 'heron', 'heron@aiub.edu', '0194871', '123', 'male', 'member'),
(12, 'mehedi', 'mehedi@aiub.edu', '5555', '12345', 'male', 'member'),
(14, 'nahiyan', 'nahiyan@aiub.edu', '123456', '123456', 'male', 'admin'),
(15, 'ibrahim', 'ibrahimduniya@gmail.com', '789486', '12345', 'male', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `product_id` (`product_id`,`purchase_id`),
  KEY `product_id_2` (`product_id`),
  KEY `purchase_id` (`purchase_id`),
  KEY `purchase_id_2` (`purchase_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `quantity`, `product_id`, `purchase_id`) VALUES
(21, 1, 1, 12),
(22, 2, 5, 12),
(23, 1, 24, 12),
(24, 1, 5, 13),
(25, 1, 1, 14),
(26, 2, 35, 14),
(27, 4, 1, 15),
(28, 4, 16, 15),
(29, 1, 1, 16),
(30, 1, 12, 16),
(31, 5, 36, 17),
(32, 1, 12, 18),
(33, 3, 5, 19);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(30) DEFAULT NULL,
  `price` double NOT NULL,
  `vat` double NOT NULL,
  `discount` double NOT NULL,
  `picture` varchar(150) NOT NULL,
  `details` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `sub-category_id` (`subcategory_id`,`size_id`),
  KEY `size_id` (`size_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `p_name`, `price`, `vat`, `discount`, `picture`, `details`, `quantity`, `subcategory_id`, `size_id`) VALUES
(1, 'black', 350, 10, 20, 'plainblackpolotshirt_1436012888.jpg', 'black color', 4, 2, 1),
(2, 'orange ', 250, 10, 5, 'orange.jpg', 'orange color', 4, 2, 2),
(4, 'white', 190, 2.5, 15, 'us-polo-white-plain-men-t-shirt-usts1508.jpg', 'white color', 8, 2, 2),
(5, 'green', 250, 2.5, 20, 'green.jpg', 'green color', 4, 2, 1),
(9, 'pants', 1500, 3, 0, '41SRHxLc5CL._AC_UL246_SR190,246_.jpg', 'BLACK', 5, 7, 2),
(10, 'Gray Gabadin pant', 1000, 40, 10, 'PZAR01W-2-1000x1000.jpg', 'puff, blow. Pant, ga', 3, 7, 3),
(11, 'Pant', 800, 20, 30, '115-home_default.jpg', 'puff, blow. Pant, ga', 4, 8, 4),
(12, 'Pant', 800, 20, 12, '1576_144241405655f97de866648_mgpzaa-2-500x500.jpg', 'puff, blow. Pant, ga', 3, 7, 1),
(13, 'Pant', 1000, 40, 0, 'R4238-27_2.jpeg', 'puff, blow. Pant, ga', 4, 7, 3),
(14, 'Pant', 800, 20, 10, '2016-summer-brand-of-japan-jeans-men-luxury-designer-mens-fit-jeans-pants-hip-hop-fashion.jpg', 'puff, blow. Pant, ga', 3, 9, 3),
(15, 'Pant', 1500, 20, 0, 'Free-shipping-2015-new-DSS-JEEP-jeans-men-luxury-brand-men-jeans-blue-denim-pants-.jpg', 'puff, blow. Pant, ga', 4, 9, 2),
(16, 'Pant', 1000, 40, 12, 'Men-Clothing-Dress-Blue-Jeans-Straight-Denim-Trousers-Business-Work-Office-Pants-Casual-Cotton-Brand-Boutique.jpg', 'puff, blow. Pant, ga', 3, 9, 1),
(17, 'Pant', 1000, 20, 2, 'file_978-copy.jpg', 'puff, blow. Pant, ga', 3, 7, 4),
(18, 'Pant', 800, 20, 0, 'Men-s-Dark-Blue-Washed-Jeans-Skinny-Pencil-Leg-Pants-Slim-Urban-Jeans-Cowboy-Knee-Patches.jpg', 'puff, blow. Pant, ga', 4, 9, 4),
(19, 'Pant', 1000, 40, 10, 'Mens-Slim-Fit-Jeans-Pants-Hip-Hop-Fashion-Casual-Blue-Men-font-b-Jens-b-font.jpg', 'puff, blow. Pant, ga', 3, 9, 1),
(20, 'shirt', 1000, 20, 10, '20_169_2652_112_f.jpg', 'puff, blow. Pant, ga', 5, 3, 2),
(21, 'shirt', 800, 20, 12, '116.jpg', 'puff, blow. Pant, ga', 3, 3, 3),
(22, 'shirt', 1000, 40, 12, 'Gant Large Windowpane Gingham Long Sleeve Shirt Blue - Men s Casual Shirts Weekly Specials - 101157.jpg', 'puff, blow. Pant, ga', 4, 3, 4),
(23, 'shirt', 1000, 20, 10, 'grant-fit-custom-078-wash-shirt-preppy-navy.jpg', 'puff, blow. Pant, ga', 4, 3, 3),
(24, 'shirt', 800, 20, 10, 'img-thing.jpg', 'puff, blow. Pant, ga', 3, 3, 1),
(25, 'shirt', 1500, 40, 30, '12456447-8.jpg', 'puff, blow. Pant, ga', 4, 4, 2),
(26, 'shirt', 1500, 23, 12, 'Formal-Shirts.jpg', 'puff, blow. Pant, ga', 4, 4, 1),
(27, 'shirt', 1500, 23, 10, 'mens-formal-shirts-1053273.jpg', 'puff, blow. Pant, ga', 3, 4, 1),
(28, 'shirt', 800, 40, 12, 'simon-carter-blue-long-sleeved-white-collar-formal-shirt-product-2-4068479-415551888.jpeg', 'puff, blow. Pant, ga', 3, 4, 4),
(29, 'shirt', 1000, 20, 30, 'shirt-collar1.jpg', 'puff, blow. Pant, ga', 3, 4, 2),
(30, 'Tshirt', 600, 20, 12, '15xorange_1441893235.jpg', 'puff, blow. Pant, ga', 4, 1, 1),
(31, 'Tshirt', 600, 20, 12, 'Baseball Tshirt 335 x 335.JPG', 'puff, blow. Pant, ga', 3, 1, 2),
(32, 'Tshirt', 600, 20, 30, 'nike.jpg', 'puff, blow. Pant, ga', 3, 1, 4),
(33, 'Tshirt', 1000, 0, 10, 'Scarlet-t-shirt.jpg', 'puff, blow. Pant, ga', 3, 1, 3),
(34, 'Tshirt', 600, 20, 0, 'W10710.jpg', 'puff, blow. Pant, ga', 3, 1, 2),
(35, 'shirt', 1000, 20, 10, 'simon-carter-blue-long-sleeved-white-collar-formal-shirt-product-2-4068479-415551888.jpeg', 'puff, blow. Pant, ga', 3, 4, 4),
(36, 'Tshirt', 800, 20, 12, 'W10710.jpg', 'puff, blow. Pant, ga', 3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `total` double NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `date`, `total`, `user_id`) VALUES
(12, '2016-08-30', 1607.5, 11),
(13, '2016-08-31', 206.25, 12),
(14, '2016-08-31', 2515, 12),
(15, '2016-08-31', 6380, 12),
(16, '2016-08-31', 1179, 15),
(17, '2016-08-31', 4320, 15),
(18, '2016-08-31', 864, 15),
(19, '2016-09-01', 618.75, 15);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(80) NOT NULL,
  `s_price` double NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `area`, `s_price`) VALUES
(1, 'Pollobi, Mirpur 11, dhaka', 400),
(2, 'Kochu khet, Mirpur 14,dhaka.', 250),
(3, 'Khilkhet, uttora', 350);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `size_id` int(11) NOT NULL AUTO_INCREMENT,
  `size_name` varchar(20) NOT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`) VALUES
(1, 'Small'),
(2, 'Medium'),
(3, 'Large'),
(4, 'Extra Large');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`subcategory_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `name`, `category_id`) VALUES
(1, 'T Shirts', 1),
(2, 'Polo Shirt', 1),
(3, 'Casual Shirt', 1),
(4, 'Formal Shirt', 1),
(5, 'Short Pant', 2),
(6, 'Casual Pant', 2),
(7, 'Formal Pant', 2),
(8, 'Track Pant', 2),
(9, 'Jeans Pant', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`);

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`purchase_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`subcategory_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
