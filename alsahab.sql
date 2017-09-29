-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- المزود: 127.0.0.1
-- أنشئ في: 29 سبتمبر 2017 الساعة 20:47
-- إصدارة المزود: 5.5.54-0ubuntu0.14.04.1
-- PHP إصدارة: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- قاعدة البيانات: `alsahab`
--

-- --------------------------------------------------------

--
-- بنية الجدول `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- إرجاع أو استيراد بيانات الجدول `contact`
--

INSERT INTO `contact` (`id`, `name`, `mail`, `mobile`, `message`, `created_at`) VALUES
(3, 'test', 'test', '6547', '44745', '2017-09-14 08:16:29'),
(5, 'test', 'dcgvdf@dfdf', '345345', '<p>sdgsdfg</p>\r\n', '2017-09-15 12:01:16'),
(6, 'سلطان', '', '123456789', '<p>رسالة اختبار تجريبية&nbsp;رسالة اختبار تجريبية&nbsp;رسالة اختبار تجريبية&nbsp;رسالة اختبار تجريبية&nbsp;</p>\r\n\r\n<blockquote>\r\n<p><strong>رسالة اختبار تجريبية&nbsp;</strong>رسالة اختبار تجريبية&nbsp;<s>&nbsp;رسالة اختبار تجريبية&nbsp;​​​​​​​&nbsp;</s></p>\r\n</blockquote>\r\n\r\n<h2 style="font-style:italic;">رسالة اختبار تجريبية &nbsp;</h2>\r\n\r\n<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;">رسالة اختبار تجريبية&nbsp;</div>\r\n\r\n<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;">رسالة اختبار تجريبية&nbsp;</div>\r\n\r\n<h3 style="color:#aaaaaa;font-style:italic;">رسالة اختبار تجريبية&nbsp;​​​​​​​</h3>', '2017-09-22 11:42:16');

-- --------------------------------------------------------

--
-- بنية الجدول `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `default` varchar(255) NOT NULL,
  `file_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- إرجاع أو استيراد بيانات الجدول `files`
--

INSERT INTO `files` (`f_id`, `worker_id`, `file`, `default`, `file_created_at`) VALUES
(4, 4, '7651.jpg', 'def', '2017-09-15 16:22:14'),
(5, 4, 'cropped-mywebsitelogo1.png', 'notdef', '2017-09-15 16:22:14'),
(14, 12, '7653.jpg', 'def', '2017-09-15 17:44:28'),
(15, 13, 'Unti9tled.png', 'def', '2017-09-15 18:33:28'),
(21, 15, 'noimage.jpg', 'noimg', '2017-09-16 11:28:20'),
(22, 13, 'blackedited.jpg', 'notdef', '2017-09-20 19:14:48'),
(23, 13, 'blackedited1.jpg', 'notdef', '2017-09-20 19:15:17'),
(24, 13, 'صورة.jpg', 'notdef', '2017-09-21 08:31:59'),
(25, 13, '444.jpg', 'notdef', '2017-09-21 10:14:01'),
(26, 13, '4441.jpg', 'notdef', '2017-09-21 10:14:13');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `username`, `mobile`, `is_admin`, `password`, `registered_at`) VALUES
(1, 'test', 'test@test', 'test1', '12345', 1, '202cb962ac59075b964b07152d234b70', '2017-09-16 12:08:17'),
(2, '123test', 'hgltest@r', 'test', '3215612315', 1, '202cb962ac59075b964b07152d234b70', '2017-09-16 18:00:53'),
(3, 'test', 'testr@test', 'testr', '1234213', 2, '202cb962ac59075b964b07152d234b70', '2017-09-17 13:17:08'),
(4, 'test', 'test@test1', '1test', '123456', 2, '25f9e794323b453885f5181f1b624d0b', '2017-09-21 10:27:53'),
(5, 'admin', 'admin@admin', 'Admin', '000000', 99, 'f7786a8fbcf2eb022914830bb06c0fb1', '2017-09-27 12:12:41');

-- --------------------------------------------------------

--
-- بنية الجدول `worker`
--

CREATE TABLE IF NOT EXISTS `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workerID` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `idDate` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- إرجاع أو استيراد بيانات الجدول `worker`
--

INSERT INTO `worker` (`id`, `workerID`, `name`, `mobile`, `idDate`, `created_at`) VALUES
(4, '', 'test', '', '2017-02-15', '2017-09-21 10:07:07'),
(12, '', 'uhjtgoiyhjg', '', '2016-05-21', '2017-09-16 11:02:01'),
(13, '12321542351', 'تجربة الاسم', '134512312', '2017-03-25', '2017-09-21 10:06:41'),
(15, '345346', 'test', '36346346', '2017-05-19', '2017-09-16 11:28:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
