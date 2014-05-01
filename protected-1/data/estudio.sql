-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2013 at 11:20 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `estudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `esto_answer`
--

CREATE TABLE IF NOT EXISTS `esto_answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `answer` text COLLATE utf8_bin NOT NULL,
  `score_item` decimal(7,2) NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `esto_banner`
--

CREATE TABLE IF NOT EXISTS `esto_banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(64) COLLATE utf8_bin NOT NULL,
  `title` varchar(128) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `link` varchar(255) COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=20 ;

--
-- Dumping data for table `esto_banner`
--

INSERT INTO `esto_banner` (`banner_id`, `group`, `title`, `description`, `link`, `image`, `sort_order`, `status`) VALUES
(7, 'Top', 'Top Banner 1', 'Top Banner 1', '#', 'uploaded_20130205052104.jpeg', 4, 1),
(9, 'Top', 'Top Banner 2', 'Top Banner 2', '#', 'uploaded_20130201045200.jpeg', 2, 1),
(10, 'Top', 'Top Banner 3', 'Top Banner 3', '', 'uploaded_20130131104813.jpeg', 3, 1),
(11, 'Top', 'Top Banner 4', 'Top Banner 4', '#', 'uploaded_20130201045216.jpeg', 1, 1),
(12, 'Bottom', 'Bottom Banner 1', 'Bottom Banner 1', '#', 'uploaded_20130131111340.jpeg', 0, 1),
(13, 'Bottom', 'Bottom Banner 2', 'Bottom Banner 2', '#', 'uploaded_20130131111409.jpeg', 0, 1),
(14, 'Bottom', 'Bottom Banner 3', 'Bottom Banner 3', '#', 'uploaded_20130131111430.jpeg', 0, 1),
(15, 'Bottom', 'Bottom Banner 5', 'Bottom Banner 5', '#', 'uploaded_20130131111449.jpeg', 0, 1),
(16, 'Bottom', 'Bottom Banner 6', 'Bottom Banner 6', '#', 'uploaded_20130131112258.jpeg', 0, 1),
(17, 'Bottom', 'Bottom Banner 7', 'Bottom Banner 7', '#', 'uploaded_20130131112350.jpeg', 0, 1),
(18, 'Bottom', 'Bottom Banner 8', 'Bottom Banner 8', '#', 'uploaded_20130131111644.jpeg', 0, 1),
(19, 'Bottom', 'Bottom Banner 4', 'Bottom Banner 4', '#', 'uploaded_20130131111714.jpeg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esto_exam`
--

CREATE TABLE IF NOT EXISTS `esto_exam` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `quiz_intro` text COLLATE utf8_bin NOT NULL,
  `credit_required` int(11) NOT NULL DEFAULT '0',
  `time_limited` int(11) NOT NULL DEFAULT '0',
  `exam_file` varchar(255) COLLATE utf8_bin NOT NULL,
  `score_total` decimal(7,2) NOT NULL DEFAULT '0.00',
  `score_avg` decimal(7,2) NOT NULL DEFAULT '0.00',
  `score_max` decimal(7,2) NOT NULL DEFAULT '0.00',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`exam_id`),
  KEY `type_id` (`type_id`),
  KEY `subject_id` (`subject_id`),
  KEY `level_id` (`level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `esto_exam`
--

INSERT INTO `esto_exam` (`exam_id`, `type_id`, `subject_id`, `level_id`, `name`, `quiz_intro`, `credit_required`, `time_limited`, `exam_file`, `score_total`, `score_avg`, `score_max`, `date_added`, `sort_order`, `status`) VALUES
(3, 2, 3, 12, 'test2', 'test2', 0, 90, 'uploaded_20130205053159.pdf', '0.00', '0.00', '0.00', '2013-02-04 11:57:48', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esto_information`
--

CREATE TABLE IF NOT EXISTS `esto_information` (
  `information_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`information_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `esto_information`
--

INSERT INTO `esto_information` (`information_id`, `user_id`, `title`, `description`, `image`, `date_added`, `sort_order`, `status`) VALUES
(1, 1, 'หัวข้อข่าว 1', 'แอสเซมบลีบลูทูทเซิร์ฟเวอร์ไอโฟนไฟร์วอลล์อินเทอร์เน็ต ริงโทนฟอรัม ชิปทรานแซ็กชั่น ไดรว์เลเยอร์ชิพคอมไพล์ไบต์ เน็ตเวิร์ก ไบนารีซอร์สกราฟิคคอมพิวติ้งสแต็ก เว็บพอร์ตอูบันตูเอาต์พุตทรานแซกชัน โน้ตบุ๊ก แอสเซมบลีบลูทูทเซิร์ฟเวอร์ไอโฟนไฟร์วอลล์อินเทอร์เน็ต ริงโทนฟอรัม ชิปทรานแซ็กชั่น ไดรว์เลเยอร์ชิพคอมไพล์ไบต์ เน็ตเวิร์ก ไบนารีซอร์สกราฟิคคอมพิวติ้งสแต็ก เว็บพอร์ตอูบันตูเอาต์พุตทรานแซกชัน โน้ตบุ๊ก แอสเซมบลีบลูทูทเซิร์ฟเวอร์ไอโฟนไฟร์วอลล์อินเทอร์เน็ต ริงโทนฟอรัม ชิปทรานแซ็กชั่น ไดรว์เลเยอร์ชิพคอมไพล์ไบต์ เน็ตเวิร์ก ไบนารีซอร์สกราฟิคคอมพิวติ้งสแต็ก เว็บพอร์ตอูบันตูเอาต์พุตทรานแซกชัน โน้ตบุ๊ก', 'info_20130201050416.jpeg', '2013-01-29 00:00:00', 0, 1),
(4, 1, 'หัวข้อข่าว 2', 'โทรจันซอฟต์แวร์ เน็ตเวิร์คมัลแวร์พาเนล คอนโซลแพกเก็ตโดเมนแอพพลิเคชั่นซัพพอร์ทคอนโซล มัลติเพล็กซ์อัปเดตเพจเจอร์เน็ตเฟิร์มแวร์อินเทอร์เฟซ ไลเซนส์เซิร์ฟเวอร์โกลบอลมัลแวร์พาเนล โทรจันซอฟต์แวร์ เน็ตเวิร์คมัลแวร์พาเนล คอนโซลแพกเก็ตโดเมนแอพพลิเคชั่นซัพพอร์ทคอนโซล มัลติเพล็กซ์อัปเดตเพจเจอร์เน็ตเฟิร์มแวร์อินเทอร์เฟซ ไลเซนส์เซิร์ฟเวอร์โกลบอลมัลแวร์พาเนล โทรจันซอฟต์แวร์ เน็ตเวิร์คมัลแวร์พาเนล คอนโซลแพกเก็ตโดเมนแอพพลิเคชั่นซัพพอร์ทคอนโซล มัลติเพล็กซ์อัปเดตเพจเจอร์เน็ตเฟิร์มแวร์อินเทอร์เฟซ ไลเซนส์เซิร์ฟเวอร์โกลบอลมัลแวร์พาเนล', 'info_20130201050425.jpeg', '2013-01-29 12:10:03', 0, 1),
(7, 1, 'หัวข้อข่าว 3', 'แอพพลิเคชันแพลตฟอร์มมาสเตอร์ไบต์ลีนุกซ์ซีเนอร์ เซิร์ฟเวอร์ยูนิกซ์เน็ตบุ๊ค เว็บไดรว์แอปพลิเคชั่นโมเด็มออฟไลน์ ฟอรัมมัลติเพล็กซ์ฟอร์เวิร์ดอัพเดต พอร์ตกูเกิลกราฟิคโปรเซส แอสเซมเบลอร์แท็บบั๊กซีดีรอม แอพพลิเคชันแพลตฟอร์มมาสเตอร์ไบต์ลีนุกซ์ซีเนอร์ เซิร์ฟเวอร์ยูนิกซ์เน็ตบุ๊ค เว็บไดรว์แอปพลิเคชั่นโมเด็มออฟไลน์ ฟอรัมมัลติเพล็กซ์ฟอร์เวิร์ดอัพเดต พอร์ตกูเกิลกราฟิคโปรเซส แอสเซมเบลอร์แท็บบั๊กซีดีรอม แอพพลิเคชันแพลตฟอร์มมาสเตอร์ไบต์ลีนุกซ์ซีเนอร์ เซิร์ฟเวอร์ยูนิกซ์เน็ตบุ๊ค เว็บไดรว์แอปพลิเคชั่นโมเด็มออฟไลน์ ฟอรัมมัลติเพล็กซ์ฟอร์เวิร์ดอัพเดต พอร์ตกูเกิลกราฟิคโปรเซส แอสเซมเบลอร์แท็บบั๊กซีดีรอม', 'info_20130201050430.jpeg', '2013-01-31 11:35:54', 0, 1),
(8, 1, 'หัวข้อข่าว 4', 'กิกะไบต์เพจเจอร์อูบันตูแฮกเกอร์ อินเทอร์เน็ต สเปซอินเทอร์เฟซทรานแซ็กชั่น ไซต์อัพเดต กราฟิกส์ แอสเซมบลีเดสก์ท็อปไมโครซอฟท์ไอซีแอปพลิเคชันไดโอด ไดรเวอร์พาร์ทิชันออฟไลน์เทอร์มินัล บลูทูธ กิกะไบต์เพจเจอร์อูบันตูแฮกเกอร์ อินเทอร์เน็ต สเปซอินเทอร์เฟซทรานแซ็กชั่น ไซต์อัพเดต กราฟิกส์ แอสเซมบลีเดสก์ท็อปไมโครซอฟท์ไอซีแอปพลิเคชันไดโอด ไดรเวอร์พาร์ทิชันออฟไลน์เทอร์มินัล บลูทูธ กิกะไบต์เพจเจอร์อูบันตูแฮกเกอร์ อินเทอร์เน็ต สเปซอินเทอร์เฟซทรานแซ็กชั่น ไซต์อัพเดต กราฟิกส์ แอสเซมบลีเดสก์ท็อปไมโครซอฟท์ไอซีแอปพลิเคชันไดโอด ไดรเวอร์พาร์ทิชันออฟไลน์เทอร์มินัล บลูทูธ', 'info_20130201050437.jpeg', '2013-01-31 11:36:16', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esto_level`
--

CREATE TABLE IF NOT EXISTS `esto_level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Dumping data for table `esto_level`
--

INSERT INTO `esto_level` (`level_id`, `name`, `sort_order`, `status`) VALUES
(11, 'ระดับประถม', 0, 1),
(12, 'ระดับ ม.ต้น', 0, 1),
(13, 'ระดับ ม.ปลาย', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esto_order`
--

CREATE TABLE IF NOT EXISTS `esto_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `firstname` varchar(42) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(42) COLLATE utf8_bin NOT NULL,
  `email` varchar(96) COLLATE utf8_bin NOT NULL,
  `payment_method` varchar(128) COLLATE utf8_bin NOT NULL,
  `total` decimal(15,2) NOT NULL DEFAULT '0.00',
  `order_status_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `student_id` (`student_id`),
  KEY `order_status_id` (`order_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `esto_order_status`
--

CREATE TABLE IF NOT EXISTS `esto_order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`order_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `esto_order_status`
--

INSERT INTO `esto_order_status` (`order_status_id`, `name`) VALUES
(1, 'Canceled'),
(2, 'Complete'),
(3, 'Pending'),
(4, 'Processing'),
(5, 'Processed'),
(6, 'Denied');

-- --------------------------------------------------------

--
-- Table structure for table `esto_session`
--

CREATE TABLE IF NOT EXISTS `esto_session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `answer_type` int(3) NOT NULL,
  `score_session` decimal(7,2) NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `exam_id` (`exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `esto_setting`
--

CREATE TABLE IF NOT EXISTS `esto_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_group` varchar(32) COLLATE utf8_bin NOT NULL,
  `key` varchar(64) COLLATE utf8_bin NOT NULL,
  `value` text COLLATE utf8_bin NOT NULL,
  `serialized` tinyint(1) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=174 ;

--
-- Dumping data for table `esto_setting`
--

INSERT INTO `esto_setting` (`setting_id`, `setting_group`, `key`, `value`, `serialized`) VALUES
(1, 'config', 'config_title', 'Title', 0),
(2, 'config', 'config_description', 'Description', 0),
(113, 'bank_transfer', 'bank_transfer_instructions', 'Bank Transfer', 0),
(114, 'bank_transfer', 'bank_transfer_total', '0', 0),
(115, 'bank_transfer', 'bank_transfer_order_status_id', '3', 0),
(116, 'bank_transfer', 'bank_transfer_status', '1', 0),
(117, 'bank_transfer', 'bank_transfer_sort_order', '0', 0),
(157, 'credit_point', 'credit_point_1', 'a:4:{s:5:"point";s:3:"500";s:5:"price";s:3:"400";s:6:"status";s:1:"1";s:10:"sort_order";s:1:"0";}', 1),
(172, 'coupon', 'coupon_1', 'a:3:{s:4:"code";s:0:"";s:5:"point";s:5:"asdfa";s:6:"status";s:1:"1";}', 1),
(173, 'coupon', 'coupon_2', 'a:3:{s:4:"code";s:0:"";s:5:"point";s:4:"asdf";s:6:"status";s:1:"1";}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `esto_student`
--

CREATE TABLE IF NOT EXISTS `esto_student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_number` varchar(13) COLLATE utf8_bin DEFAULT NULL,
  `firstname` varchar(42) COLLATE utf8_bin DEFAULT NULL,
  `lastname` varchar(42) COLLATE utf8_bin DEFAULT NULL,
  `school` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `email` varchar(96) COLLATE utf8_bin DEFAULT NULL,
  `address` text COLLATE utf8_bin,
  `birthday` date DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `faculty` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `credit` int(11) DEFAULT '0',
  `username` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `level_id` (`level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `esto_student`
--

INSERT INTO `esto_student` (`student_id`, `id_number`, `firstname`, `lastname`, `school`, `level_id`, `email`, `address`, `birthday`, `subject`, `faculty`, `phone`, `image`, `credit`, `username`, `password`) VALUES
(1, NULL, 'Kanokwan', 'Phunmi', 'AAA School', 11, 'kanokwan@khroton.com', NULL, NULL, NULL, NULL, '123456', NULL, 200, 'kanokwan', '1234'),
(2, NULL, 'aaa', 'bbb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'ccc', 'ccc'),
(3, NULL, 'sss', 'sss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'sss', 'sss');

-- --------------------------------------------------------

--
-- Table structure for table `esto_subject`
--

CREATE TABLE IF NOT EXISTS `esto_subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `esto_subject`
--

INSERT INTO `esto_subject` (`subject_id`, `name`, `sort_order`, `status`) VALUES
(1, 'ภาษาไทย', 0, 1),
(2, 'สังคมศึกษา', 0, 1),
(3, 'คณิตศาสตร์', 0, 1),
(4, 'สุขศึกษา', 0, 1),
(5, 'พลศึกษา', 0, 1),
(6, 'ภาษาอังกฤษ', 0, 1),
(7, 'วิทยาศาสตร์', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esto_testing`
--

CREATE TABLE IF NOT EXISTS `esto_testing` (
  `record_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `selected` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`record_id`,`answer_id`),
  KEY `answer_id` (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `esto_test_record`
--

CREATE TABLE IF NOT EXISTS `esto_test_record` (
  `test_record_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `score` decimal(7,2) NOT NULL DEFAULT '0.00',
  `date_attended` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `elapse_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`test_record_id`),
  KEY `exam_id` (`exam_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `esto_type`
--

CREATE TABLE IF NOT EXISTS `esto_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `esto_type`
--

INSERT INTO `esto_type` (`type_id`, `name`, `sort_order`, `status`) VALUES
(1, 'O-Net', 0, 1),
(2, 'GAT', 0, 1),
(3, 'PAT', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `esto_user`
--

CREATE TABLE IF NOT EXISTS `esto_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  `ip` varchar(15) COLLATE utf8_bin NOT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_group_id` (`user_group_id`),
  KEY `user_group_id_2` (`user_group_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `esto_user`
--

INSERT INTO `esto_user` (`user_id`, `user_group_id`, `student_id`, `username`, `password`, `ip`, `date_added`, `status`) VALUES
(1, 1, 0, 'admin', 'admin', '127.0.0.7', '2013-01-24 09:00:00', 1),
(3, 2, 0, 'eAdmin', 'admin', '::1', '2013-02-05 06:06:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `esto_user_group`
--

CREATE TABLE IF NOT EXISTS `esto_user_group` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  `role` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `esto_user_group`
--

INSERT INTO `esto_user_group` (`user_group_id`, `name`, `role`) VALUES
(1, 'Top Administrator', 'top_admin'),
(2, 'Administrator', 'admin'),
(3, 'Student', 'student');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `esto_answer`
--
ALTER TABLE `esto_answer`
  ADD CONSTRAINT `esto_answer_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `esto_session` (`session_id`);

--
-- Constraints for table `esto_exam`
--
ALTER TABLE `esto_exam`
  ADD CONSTRAINT `esto_exam_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `esto_type` (`type_id`),
  ADD CONSTRAINT `esto_exam_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `esto_subject` (`subject_id`),
  ADD CONSTRAINT `esto_exam_ibfk_3` FOREIGN KEY (`level_id`) REFERENCES `esto_level` (`level_id`);

--
-- Constraints for table `esto_information`
--
ALTER TABLE `esto_information`
  ADD CONSTRAINT `esto_information_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `esto_user` (`user_id`);

--
-- Constraints for table `esto_order`
--
ALTER TABLE `esto_order`
  ADD CONSTRAINT `esto_order_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `esto_student` (`student_id`),
  ADD CONSTRAINT `esto_order_ibfk_2` FOREIGN KEY (`order_status_id`) REFERENCES `esto_order_status` (`order_status_id`);

--
-- Constraints for table `esto_session`
--
ALTER TABLE `esto_session`
  ADD CONSTRAINT `esto_session_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `esto_exam` (`exam_id`);

--
-- Constraints for table `esto_student`
--
ALTER TABLE `esto_student`
  ADD CONSTRAINT `esto_student_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `esto_level` (`level_id`);

--
-- Constraints for table `esto_testing`
--
ALTER TABLE `esto_testing`
  ADD CONSTRAINT `esto_testing_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `esto_answer` (`answer_id`);

--
-- Constraints for table `esto_test_record`
--
ALTER TABLE `esto_test_record`
  ADD CONSTRAINT `esto_test_record_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `esto_exam` (`exam_id`),
  ADD CONSTRAINT `esto_test_record_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `esto_student` (`student_id`);

--
-- Constraints for table `esto_user`
--
ALTER TABLE `esto_user`
  ADD CONSTRAINT `esto_user_ibfk_1` FOREIGN KEY (`user_group_id`) REFERENCES `esto_user_group` (`user_group_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
