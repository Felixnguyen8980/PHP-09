-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2017 at 10:02 AM
-- Server version: 5.5.55-0ubuntu0.14.04.1
-- PHP Version: 5.6.30-12~ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php09_basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Banh'),
(2, 'Trai cay ngon'),
(5, 'Hang dien tu tot'),
(6, 'Hang ao quan'),
(7, 'Do choi tre em');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `category_id`, `created`) VALUES
(1, 'Oi', 10, 'Oi Ha Noi', '1507986487avatar.jpg', 2, '0000-00-00 00:00:00'),
(2, 'J7', 100, 'SamSung', '15079865241490378673-3-25-2017-1-03-18-am-500.jpg', 5, '0000-00-00 00:00:00'),
(3, 'ipx', 123, 'apple', '1507986720avatar.jpg', 5, '2017-10-14 00:00:00'),
(4, 'Do choi tre em', 12, 'Do choi tre em', '1507986799responsive2.jpg', 7, '2017-10-14 09:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `avatar`) VALUES
(2, 'Taxi App edited', 'saigonzoo da edit', 'e10adc3949ba59abbe56e057f20f883e', '1507813690responsive.jpg'),
(5, 'Chad', 'hoaicanh', 'e10adc3949ba59abbe56e057f20f883e', '1507816517avatar.jpg'),
(7, 'Chad', 'ok', 'aaa42296669b958c3cee6c0475c8093e', '1507982981avatar.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
