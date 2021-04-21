-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 13, 2021 at 04:47 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pineapple`
--

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(320) NOT NULL,
  `domain` varchar(252) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `domain`, `created_at`) VALUES
(1, 'ggwp.glhf@i.com', 'i', '2020-04-20 09:49:20'),
(2, 'ice333storm@love.lv', 'love', '2020-12-28 08:56:13'),
(3, 'patrik666@love.lv', 'love', '2020-12-26 14:56:13'),
(4, 'magebit@magebit.com', 'magebit', '2020-12-26 08:56:13'),
(5, 'composer@and.lv', 'and', '2020-12-14 08:56:13'),
(6, 'angrymen@it.com', 'it', '2020-12-03 08:53:55'),
(7, 'snatch34@is.com', 'is', '2020-11-27 08:47:52'),
(8, 'groot@not.im', 'not', '2020-11-23 17:14:33'),
(9, 'scarface@an.lv', 'an', '2020-11-12 09:50:57'),
(10, 'highnoon@accident.com', 'accident', '2000-05-25 09:49:20');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;