-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 02 月 06 日 02:12
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `car_sys`
--

-- --------------------------------------------------------

--
-- 表的结构 `car_info`
--

CREATE TABLE IF NOT EXISTS `car_info` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `vsp` varchar(32) NOT NULL,
  `vrpm` varchar(50) NOT NULL,
  `tmp` varchar(50) NOT NULL,
  `longi` varchar(50) NOT NULL,
  `lati` varchar(50) NOT NULL,
  `insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `car_info`
--

INSERT INTO `car_info` (`Id`, `vsp`, `vrpm`, `tmp`, `longi`, `lati`, `insert_date`) VALUES
(1, '2', '2', '3', '4', '5', '2016-02-05 11:04:43'),
(2, '2', '2', '3', '4', '5', '2016-02-05 11:10:17'),
(3, '2', '2', '3', '4', '5', '2016-02-05 11:10:19'),
(4, '2', '2', '3', '4', '5', '2016-02-05 11:10:20'),
(5, '2', '2', '3', '4', '5', '2016-02-05 11:15:01'),
(6, '1', '2', '3', '4', '5', '2016-02-05 11:15:06'),
(7, '1', '2', '3', '4', '5', '2016-02-05 11:15:08'),
(8, '1', '2', '3', '4', '5', '2016-02-05 11:15:10'),
(9, '1', '2', '3', '4', '5', '2016-02-05 11:15:12'),
(10, '1', '2', '3', '4', '5', '2016-02-05 11:15:56'),
(11, '1', '2', '3', '4', '5', '2016-02-05 11:15:58'),
(12, '1', '2', '3', '4', '5', '2016-02-05 11:16:31'),
(13, '1', '2', '3', '4', '5', '2016-02-05 11:16:33'),
(14, '1', '2', '3', '4', '5', '2016-02-05 11:16:34'),
(15, '1', '2', '3', '4', '5', '2016-02-05 11:16:36'),
(16, '1', '2', '3', '4', '5', '2016-02-05 11:16:37'),
(17, '1', '2', '3', '4', '5', '2016-02-05 11:16:38'),
(18, '1', '2', '3', '4', '5', '2016-02-05 11:17:17'),
(19, '1', '2', '3', '4', '5', '2016-02-05 11:17:19'),
(20, '1', '2', '3', '4', '5', '2016-02-05 11:17:20'),
(21, '1', '2', '3', '4', '5', '2016-02-05 11:17:21'),
(22, '1', '2', '3', '4', '5', '2016-02-05 11:17:23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
