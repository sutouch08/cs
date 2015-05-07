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
('adadc59a0d346d21acd5ad0e55133e7a', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0', 1430994527, 'a:4:{s:9:"user_data";s:0:"";s:7:"id_user";s:1:"1";s:9:"user_name";s:5:"admin";s:10:"id_profile";s:1:"1";}');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- dump ตาราง `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `category_name`, `id_parent`, `level`, `show`, `active`, `date_upd`) VALUES
(1, 'HOME', 0, 1, 1, 1, '2015-04-03 07:38:20'),
(2, 'เสื้อผ้า', 1, 2, 1, 1, '2015-04-06 07:50:54'),
(3, 'เสื้อ', 2, 3, 1, 1, '2015-04-06 10:06:24'),
(4, 'กางเกง', 2, 3, 1, 1, '2015-04-06 08:31:01'),
(5, 'อุปกรณ์', 1, 2, 1, 1, '2015-04-06 08:31:20'),
(6, 'รองเท้า', 1, 2, 1, 1, '2015-04-06 08:31:30'),
(9, 'รองเท้า Futsal', 6, 3, 1, 1, '2015-04-06 08:52:49');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_category_product`
--

CREATE TABLE IF NOT EXISTS `tbl_category_product` (
  `id_category_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  PRIMARY KEY (`id_category_product`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- dump ตาราง `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`id_category_product`, `id_category`, `id_product`) VALUES
(69, 6, 1),
(58, 6, 2),
(57, 3, 2),
(56, 2, 2),
(68, 3, 1),
(67, 2, 1),
(66, 1, 1),
(55, 1, 2),
(48, 1, 3),
(49, 2, 3),
(50, 3, 3),
(51, 2, 4),
(52, 3, 4),
(60, 3, 5),
(59, 2, 5),
(65, 2, 6);

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
-- โครงสร้างตาราง `tbl_config`
--

CREATE TABLE IF NOT EXISTS `tbl_config` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_config`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- dump ตาราง `tbl_config`
--

INSERT INTO `tbl_config` (`id_config`, `config_name`, `value`, `id_employee`, `date_upd`) VALUES
(1, 'ALLOW_UNDER_ZERO', '0', 1, '2015-04-08 08:54:16'),
(2, 'MULTI_LANG', '1', 1, '2015-04-21 02:24:07');

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
-- โครงสร้างตาราง `tbl_image`
--

CREATE TABLE IF NOT EXISTS `tbl_image` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `cover` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_image`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- dump ตาราง `tbl_image`
--

INSERT INTO `tbl_image` (`id_image`, `id_product`, `position`, `cover`) VALUES
(18, 3, 1, 1),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 1, 4, 0),
(5, 1, 5, 0),
(6, 1, 6, 0),
(7, 1, 7, 0),
(8, 1, 8, 1),
(19, 3, 2, 0),
(10, 6, 1, 1),
(11, 6, 2, 0),
(12, 6, 3, 0),
(13, 6, 4, 0),
(14, 6, 5, 0),
(15, 6, 6, 0),
(16, 6, 7, 0),
(17, 6, 8, 0),
(20, 3, 3, 0),
(21, 3, 4, 0),
(22, 3, 5, 0),
(23, 3, 6, 0),
(24, 5, 1, 1),
(25, 5, 2, 0),
(26, 5, 3, 0),
(27, 5, 4, 0),
(28, 5, 5, 0),
(29, 5, 6, 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_personal_config`
--

CREATE TABLE IF NOT EXISTS `tbl_personal_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `language` set('thai','english') NOT NULL DEFAULT 'thai',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `tbl_personal_config`
--

INSERT INTO `tbl_personal_config` (`id`, `id_user`, `id_employee`, `language`) VALUES
(1, 1, 1, 'thai');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_name_en` varchar(255) NOT NULL,
  `product_cost` decimal(17,2) NOT NULL DEFAULT '0.00',
  `product_price` decimal(17,2) NOT NULL DEFAULT '0.00',
  `product_weight` decimal(5,2) NOT NULL DEFAULT '0.00',
  `default_category_id` int(11) NOT NULL,
  `description` text,
  `description_en` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `show` tinyint(1) NOT NULL DEFAULT '1',
  `under_zero` set('default','yes','no','') NOT NULL DEFAULT 'default',
  `date_add` datetime NOT NULL,
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_product`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- dump ตาราง `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `product_code`, `product_name`, `product_name_en`, `product_cost`, `product_price`, `product_weight`, `default_category_id`, `description`, `description_en`, `active`, `show`, `under_zero`, `date_add`, `date_upd`) VALUES
(1, 'KFB-S021', 'เสื้อกีฬา', 'sport shirt', '120.00', '235.00', '0.32', 3, '', '', 1, 1, 'default', '2015-05-06 09:18:35', '2015-05-06 02:18:35'),
(2, 'KFB-S019', 'เสื้อกีฬาxx', 'sportxx', '100.00', '165.00', '0.00', 2, 'xxxxxxx', 'xxxxxxx', 0, 0, 'default', '2015-04-30 11:47:28', '2015-04-30 04:47:28'),
(3, 'KFB-S052', 'เสื้อกีฬาพิมพ์ลาย', '', '100.15', '365.00', '0.00', 3, '0', '0', 1, 1, 'default', '2015-04-28 14:09:52', '2015-04-28 07:09:52'),
(4, 'KFB-S020', 'เสื้อยืด', '', '100.00', '300.00', '0.00', 3, '0', '0', 1, 1, 'default', '2015-04-28 14:11:20', '2015-04-28 07:11:20'),
(5, 'KFB-S022', 'เสื้อเก่าพิมพ์ลาย', 'เสื้อเก่าพิมพ์ลาย', '90.00', '200.00', '0.00', 3, 'เสื้อเก่าคลาสสิค ราคาแพง', 'เสื้อเก่าคลาสสิค ราคาแพง', 1, 1, 'default', '2015-04-30 15:57:36', '2015-04-30 08:57:36'),
(6, 'KFB-S023', 'เสื้่อกีฬาพิมพ์ลายหน้าอก', 'เสื้่อกีฬาพิมพ์ลายหน้าอก', '120.00', '235.00', '0.30', 3, 'เสื้อกีฬาพิมพ์ลายหน้าอก', 'เสื้อกีฬาพิมพ์ลายหน้าอก', 1, 1, 'default', '2015-05-06 08:54:24', '2015-05-06 01:54:24');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_product_attribute`
--

CREATE TABLE IF NOT EXISTS `tbl_product_attribute` (
  `id_product_attribute` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `id_color` int(11) NOT NULL DEFAULT '0',
  `id_size` int(11) NOT NULL DEFAULT '0',
  `id_attribute` int(11) NOT NULL DEFAULT '0',
  `cost` decimal(17,2) NOT NULL DEFAULT '0.00',
  `price` decimal(17,2) NOT NULL DEFAULT '0.00',
  `weight` decimal(5,2) NOT NULL DEFAULT '0.00',
  `date_add` datetime NOT NULL,
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_product_attribute`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- dump ตาราง `tbl_product_attribute`
--

INSERT INTO `tbl_product_attribute` (`id_product_attribute`, `id_product`, `reference`, `barcode`, `id_color`, `id_size`, `id_attribute`, `cost`, `price`, `weight`, `date_add`, `date_upd`) VALUES
(11, 3, 'KFB-S052-AW-L', '', 1, 4, 0, '100.15', '365.00', '0.00', '2015-05-07 11:35:23', '2015-05-07 04:35:23'),
(4, 3, 'KFB-S052-AW-M', '8858797222324', 1, 8, 0, '100.15', '365.00', '0.00', '2015-04-30 17:08:09', '2015-05-07 04:34:33'),
(5, 1, 'KFB-S021-AR-M', '8858797212346', 3, 8, 0, '120.00', '235.00', '0.32', '2015-05-06 12:02:55', '2015-05-06 05:02:55'),
(6, 1, 'KFB-S021-AR-L', '', 3, 4, 0, '120.00', '235.00', '0.32', '2015-05-06 14:00:52', '2015-05-06 07:00:52'),
(7, 1, 'KFB-S021-AR-2L', '', 3, 6, 0, '120.00', '235.00', '0.32', '2015-05-06 14:01:48', '2015-05-06 09:31:53'),
(8, 1, 'KFB-S021-AR-3L', '', 3, 7, 0, '120.00', '235.00', '0.32', '2015-05-06 14:25:43', '2015-05-06 07:25:43');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_product_attribute_image`
--

CREATE TABLE IF NOT EXISTS `tbl_product_attribute_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product_attribute` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_image` (`id_image`),
  KEY `id_product_attribute` (`id_product_attribute`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- dump ตาราง `tbl_product_attribute_image`
--

INSERT INTO `tbl_product_attribute_image` (`id`, `id_product_attribute`, `id_image`) VALUES
(1, 8, 5),
(4, 5, 5),
(5, 6, 5),
(6, 7, 5);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_profile` (
  `id_profile` int(11) NOT NULL AUTO_INCREMENT,
  `profile_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_profile`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `tbl_profile`
--

INSERT INTO `tbl_profile` (`id_profile`, `profile_name`) VALUES
(1, 'Supper Admin');

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
(1, 1, 1, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-03-19 00:00:00', '2015-03-19 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_warehouse`
--

CREATE TABLE IF NOT EXISTS `tbl_warehouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `consign` tinyint(1) NOT NULL DEFAULT '0',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- dump ตาราง `tbl_warehouse`
--

INSERT INTO `tbl_warehouse` (`id`, `code`, `name`, `consign`, `default`) VALUES
(1, '01', 'คลังหลัก', 0, 1),
(2, '02', 'ฝากขาย1', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
