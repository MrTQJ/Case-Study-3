-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2021 at 01:53 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f32ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `javajam_prices`
--

CREATE TABLE IF NOT EXISTS `javajam_prices` (
  `id` int(11) NOT NULL,
  `product` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `javajam_prices`
--

INSERT INTO `javajam_prices` (`id`, `product`, `price`, `description`, `type`) VALUES
(1, 'Just Java', 1.00, 'Regular house blend, decaffeinated coffee, or flavour of the day.', 'Endless Cup'),
(2, 'Cafe au Lait', 2.00, 'House blended coffee infused into a smooth, steamed milk.', 'Single'),
(3, 'Cafe au Lait', 3.00, 'House blended coffee infused into a smooth, steamed milk.', 'Double'),
(4, 'Iced Cappuccino', 4.00, 'Sweetened expresso blended with icy-cold milk and served in a chilled glass.', 'Single'),
(5, 'Iced Cappuccino', 5.00, 'Sweetened expresso blended with icy-cold milk and served in a chilled glass.', 'Double');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
