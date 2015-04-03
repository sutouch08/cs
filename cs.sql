-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- dump ตาราง `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('9bade4ec64050a16e6153f05128c9244', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:36.0) Gecko/20100101 Firefox/36.0', 1428035451, 'a:4:{s:9:"user_data";s:0:"";s:7:"id_user";s:1:"1";s:9:"user_name";s:5:"admin";s:10:"id_profile";s:1:"0";}'),
('61a92e25aeaa26185d4920a4a627e0cd', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:36.0) Gecko/20100101 Firefox/36.0', 1428048376, 'a:4:{s:9:"user_data";s:0:"";s:7:"id_user";s:1:"1";s:9:"user_name";s:5:"admin";s:10:"id_profile";s:1:"0";}');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_access`
--

CREATE TABLE IF NOT EXISTS `tbl_access` (
  `id_access` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `add` tinyint(1) NOT NULL DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `print` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_access`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- dump ตาราง `tbl_access`
--

INSERT INTO `tbl_access` (`id_access`, `id_menu`, `id_profile`, `view`, `add`, `edit`, `delete`, `print`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_attribute`
--

CREATE TABLE IF NOT EXISTS `tbl_attribute` (
  `id_attribute` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `attribute_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id_attribute`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- dump ตาราง `tbl_attribute`
--

INSERT INTO `tbl_attribute` (`id_attribute`, `attribute_code`, `attribute_name`, `position`) VALUES
(1, 'WOMEN', 'ผู้หญิง', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `category_name`, `id_parent`, `level`, `show`, `active`, `date_upd`) VALUES
(1, 'HOME', 0, 1, 1, 1, '2015-04-03 07:38:20');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_color`
--

CREATE TABLE IF NOT EXISTS `tbl_color` (
  `id_color` int(11) NOT NULL AUTO_INCREMENT,
  `color_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_color_group` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- dump ตาราง `tbl_color`
--

INSERT INTO `tbl_color` (`id_color`, `color_code`, `color_name`, `id_color_group`, `position`) VALUES
(1, 'AW', 'ดำ-ขาว', 2, 1),
(2, 'AG', 'ดำ-เขียว', 2, 2),
(3, 'AR', 'ดำ-แดง', 2, 3),
(4, 'AO', 'ดำ-เขียว', 2, 4);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_color_group`
--

CREATE TABLE IF NOT EXISTS `tbl_color_group` (
  `id_color_group` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_color_group`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- dump ตาราง `tbl_color_group`
--

INSERT INTO `tbl_color_group` (`id_color_group`, `group_name`, `active`, `date_upd`) VALUES
(1, 'ขาว', 1, '2015-03-23 04:35:33'),
(2, 'ดำ', 1, '2015-03-23 07:23:39'),
(3, 'แดง', 1, '2015-03-23 08:56:01'),
(5, 'เขียว', 1, '2015-03-23 08:55:54');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `id_employee` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(32) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `post_code` varchar(12) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `birthday` date NOT NULL,
  `start_date` date NOT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_employee`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `tbl_employee`
--

INSERT INTO `tbl_employee` (`id_employee`, `code`, `first_name`, `last_name`, `address1`, `address2`, `post_code`, `phone`, `email`, `birthday`, `start_date`, `date_add`, `date_upd`, `active`) VALUES
(1, 'KM001', 'สุทัศ', 'สังข์สวัสดิ์', '75/65 หมู่ 2 ต.ไร่ขิง อ.สามพราน', 'นครปฐม', '73210', '089 174 7597', 'admin@koolsport.co.th', '1983-04-18', '2009-03-01', '2015-03-19 12:29:29', '2015-03-19 09:41:51', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_size`
--

CREATE TABLE IF NOT EXISTS `tbl_size` (
  `id_size` int(11) NOT NULL AUTO_INCREMENT,
  `size_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `size_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id_size`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- dump ตาราง `tbl_size`
--

INSERT INTO `tbl_size` (`id_size`, `size_code`, `size_name`, `position`) VALUES
(2, 'S', 'S', 1),
(8, 'M', 'M', 2),
(4, 'L', 'L', 3),
(6, '2L', '2L', 4),
(7, '3L', '3L', 5);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_employee` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL DEFAULT '0',
  `id_shop` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_employee`, `id_profile`, `id_shop`, `user_name`, `password`, `date_add`, `date_upd`, `last_login`) VALUES
(1, 1, 0, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-03-19 00:00:00', '2015-03-19 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
