-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2014 at 02:52 PM
-- Server version: 5.5.38
-- PHP Version: 5.4.4-14+deb7u14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hash` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `item_id` int(11) unsigned NOT NULL,
  `size` enum('XS','S','M','L','XL','XXL') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
  `amount` int(11) NOT NULL,
  `inscription` text COLLATE utf8_unicode_ci NOT NULL,
  `printpromolink` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `hash` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `announcement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `bestsellers` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `announcement`, `description`, `price`, `bestsellers`) VALUES
(1, 'Футболка 1', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 1».', 750.00, 1),
(2, 'Футболка 2', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 2».', 650.00, 1),
(3, 'Футболка 3', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 3».', 850.00, 1),
(4, 'Футболка 4', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 4».', 700.00, 1),
(5, 'Футболка 5', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 5».', 800.00, 1),
(6, 'Футболка 6', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 6».', 655.59, 0),
(7, 'Футболка 7', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 7».', 122.35, 0),
(8, 'Футболка 8', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 8».', 644.97, 0),
(9, 'Футболка 9', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 9».', 857.83, 0),
(10, 'Футболка 10', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 10».', 354.21, 0),
(11, 'Футболка 11', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 11».', 197.58, 0),
(12, 'Футболка 12', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 12».', 925.25, 0),
(13, 'Футболка 13', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 13».', 33.52, 0),
(14, 'Футболка 14', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 14».', 391.87, 0),
(15, 'Футболка 15', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 15».', 858.77, 0),
(16, 'Футболка 16', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 16».', 118.25, 0),
(17, 'Футболка 17', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 17».', 14.93, 0),
(18, 'Футболка 18', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 18».', 719.90, 0),
(19, 'Футболка 19', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 19».', 554.72, 0),
(20, 'Футболка 20', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 20».', 613.89, 0),
(21, 'Футболка 21', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 21».', 405.29, 0),
(22, 'Футболка 22', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 22».', 184.78, 0),
(23, 'Футболка 23', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 23».', 708.05, 0),
(24, 'Футболка 24', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 24».', 985.89, 0),
(25, 'Футболка 25', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 25».', 805.32, 0),
(26, 'Футболка 26', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 26».', 68.93, 0),
(27, 'Футболка 27', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 27».', 928.67, 0),
(28, 'Футболка 28', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 28».', 436.58, 0),
(29, 'Футболка 29', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 29».', 396.90, 0),
(30, 'Футболка 30', 'Это футболка вашей мечты', 'На этой футболке нарисован «Персонаж 30».', 674.75, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('NOT_PROCESSED','IN_PROCESSING','COMPLETED') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NOT_PROCESSED',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) unsigned NOT NULL,
  `item_id` int(11) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `announcement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` enum('XS','S','M','L','XL','XXL') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
  `amount` int(11) NOT NULL,
  `inscription` text COLLATE utf8_unicode_ci NOT NULL,
  `printpromolink` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order_items_ibfk_1` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `promocode`
--

DROP TABLE IF EXISTS `promocode`;
CREATE TABLE IF NOT EXISTS `promocode` (
  `id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `isused` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promocode`
--

INSERT INTO `promocode` (`id`, `isused`) VALUES
('01s463xy', 0),
('0fu0i9kj', 0),
('2ae7rmhq', 0),
('3a45vgq3', 0),
('3ltszh1r', 0),
('74y170ok', 0),
('7agtwmkt', 0),
('84k8bus0', 0),
('977bt8by', 0),
('a50rh142', 0),
('at0y0adr', 0),
('b1mhf6di', 0),
('bhgxc90d', 0),
('ebta1cgg', 0),
('eqbj8hwv', 0),
('gybt2p22', 0),
('hlol3cvo', 0),
('j5zhkc6u', 0),
('mgc3se62', 0),
('p5y5gmg4', 0),
('qqld6tgb', 0),
('rxhm8g2i', 0),
('svs6r2ui', 0),
('up6knr4k', 0),
('upxuolef', 0),
('wdujx3tn', 0),
('wtj38kq4', 0),
('wzke1ka8', 0),
('yug7g1t2', 0),
('yutc2wb8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `promocode_hash`
--

DROP TABLE IF EXISTS `promocode_hash`;
CREATE TABLE IF NOT EXISTS `promocode_hash` (
  `promocode_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `cart_hash` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`promocode_id`,`cart_hash`),
  KEY `cart_hash` (`cart_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
