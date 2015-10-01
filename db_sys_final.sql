-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2015 at 07:19 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `ac_id` int(11) NOT NULL,
  `ac_email` varchar(400) NOT NULL,
  `ac_pass` varchar(400) NOT NULL,
  `ac_phone` varchar(20) DEFAULT NULL,
  `ac_address` varchar(300) DEFAULT NULL,
  `at_id` int(11) DEFAULT NULL,
  `ac_fullname` varchar(300) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ac_id`, `ac_email`, `ac_pass`, `ac_phone`, `ac_address`, `at_id`, `ac_fullname`) VALUES
(2, 'nhokgalai@gmail.com', '6e97123d7be0c38c111ff6d7d6b274cd', '0968980276', 'binh chanh', 1, 'Tran Thanh Nguyen');

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
  `at_id` int(11) NOT NULL,
  `at_name` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`at_id`, `at_name`) VALUES
(1, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `apply_job`
--

CREATE TABLE IF NOT EXISTS `apply_job` (
  `ap_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `ap_firstname` varchar(300) NOT NULL,
  `ap_lastname` varchar(300) NOT NULL,
  `ap_email` varchar(300) DEFAULT NULL,
  `ap_phone` varchar(20) DEFAULT NULL,
  `ap_date` datetime DEFAULT NULL,
  `ap_cv` varchar(300) DEFAULT NULL COMMENT 'link đến CV mà người dùng cung cấp.'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apply_job`
--

INSERT INTO `apply_job` (`ap_id`, `job_id`, `ap_firstname`, `ap_lastname`, `ap_email`, `ap_phone`, `ap_date`, `ap_cv`) VALUES
(7, 5, 'nguyen', 'tran', 'nhokgalai@gmail.com', '113', '2015-09-22 00:00:00', 'nhokgalai@gmail.com1442889018.docx'),
(8, 5, 'nguyen', 'tran', 'nhokgalai@gmail.com', '0909113113', '2015-09-22 00:00:00', 'nhokgalai@gmail.com1442890760.docx');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `ar_id` int(11) NOT NULL,
  `ar_tag` varchar(50) DEFAULT NULL,
  `ar_title` varchar(150) DEFAULT NULL,
  `ar_content` text,
  `ar_date` datetime DEFAULT NULL,
  `ar_stt` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(14, 1442892041, '::1', 'ClAPEfJg'),
(15, 1442892056, '::1', 'Qy44GDR7'),
(16, 1442892069, '::1', 'jUa15yns'),
(17, 1442892096, '::1', 'MsC8078s'),
(18, 1442892104, '::1', 'ab3qCp1q'),
(19, 1442892118, '::1', 'OTZ9wWrW'),
(20, 1442892162, '::1', '2vTCa7Od'),
(21, 1442892173, '::1', 'KFRGPufE'),
(22, 1442892175, '::1', 'eHGiplhS'),
(23, 1442892968, '::1', 'O6BdVfvE'),
(24, 1442893027, '::1', 'LQFat8mP'),
(25, 1442893085, '::1', 'gZ9fBnZv'),
(26, 1442893102, '::1', '0Vaj3ZBs'),
(27, 1442893238, '::1', 'b8AUkjQn'),
(28, 1442893293, '::1', 'Ve467vgq'),
(29, 1442893376, '::1', 'GM3LQ7RP'),
(30, 1442893403, '::1', 'goYpMmGW'),
(31, 1442893581, '::1', '7tpzvkVF'),
(32, 1442893610, '::1', 'eMf50VrU'),
(33, 1442893675, '::1', 'HHLfy9Gd'),
(34, 1442894906, '::1', 'yJ3UyKP9'),
(35, 1442894958, '::1', 'jBSjlAVF'),
(36, 1442894971, '::1', 'm7dIEHFy'),
(37, 1442895024, '::1', 'J7hoEoJR'),
(38, 1442895025, '::1', 'gIiAd6LT'),
(39, 1442895061, '::1', 'HGdaTtOa'),
(40, 1442895062, '::1', '4CR1LHS1'),
(41, 1442895244, '::1', 'Q32kZTgr'),
(42, 1442895385, '::1', 'Jmk70CvX'),
(43, 1442895388, '::1', 't9gdpKHL'),
(44, 1442895503, '::1', 'JAhMEjLd'),
(45, 1442895545, '::1', 'B7vcA296'),
(46, 1442895584, '::1', 'IAlO4CPi'),
(47, 1442895602, '::1', 'W6pnu6Z0'),
(48, 1442895625, '::1', 'yOSVza3o'),
(49, 1442895661, '::1', 'oWsRd87s'),
(50, 1442895713, '::1', 'psMWJ7K9'),
(51, 1442895931, '::1', 'aeyrwWEZ'),
(52, 1442896008, '::1', 'sLdDAhV6'),
(53, 1442896031, '::1', 'uOLTw9ag'),
(54, 1442896064, '::1', 'ZmtLp8dD'),
(55, 1442896088, '::1', '5W03ui88'),
(56, 1442896098, '::1', 'zMCWYthX'),
(57, 1442896102, '::1', 'RB4LWkEa'),
(58, 1442896109, '::1', '6CgvZmSP'),
(59, 1442896219, '::1', 'OBQH6psj'),
(60, 1442896223, '::1', 'WL4Qpk7g'),
(61, 1442896248, '::1', 'fMjnAbN8'),
(62, 1442896324, '::1', 'QT3baN3V'),
(63, 1442896520, '::1', 'DPbcTQ8v'),
(64, 1442896525, '::1', 'v3BGJvlp'),
(65, 1442896527, '::1', 'KEsboDeU'),
(66, 1442897161, '::1', 'eZNQZCs8'),
(67, 1442897174, '::1', 'kebmuajP'),
(68, 1442897181, '::1', '6DlIkcM2'),
(69, 1442897187, '::1', 'MvBQubxb'),
(70, 1442898236, '::1', 'AsRRMHlP'),
(71, 1442898240, '::1', 'hhFKASwk'),
(72, 1442898272, '::1', 'kUlZnltl'),
(73, 1442898274, '::1', 'wQ00o5OR'),
(74, 1442898483, '::1', '0J4LqZ6z'),
(75, 1442898486, '::1', '0eOCPgjK'),
(76, 1442898504, '::1', 'nhwEMV1Y'),
(77, 1442898507, '::1', 'UCvTqRuB'),
(78, 1442898530, '::1', 'kqeMg39n'),
(79, 1442898694, '::1', 'uMzWxJ5A'),
(80, 1442898723, '::1', 'fAzLFrTJ'),
(81, 1442898865, '::1', 'YXq0f50L'),
(82, 1442898950, '::1', 'c5ErLPcN'),
(83, 1442898960, '::1', 'LLuLeS2y');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(200) DEFAULT NULL,
  `com_address` varchar(300) DEFAULT NULL,
  `com_phone` varchar(30) DEFAULT NULL,
  `com_fax` varchar(30) DEFAULT NULL,
  `com_longi` varchar(300) DEFAULT NULL,
  `com_lati` varchar(300) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`com_id`, `com_name`, `com_address`, `com_phone`, `com_fax`, `com_longi`, `com_lati`) VALUES
(2, 'Syslytic', '146 cộng hòa', '(123) 123-1231', '1123123123123', '106.57150100000001', '10.8393439');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE IF NOT EXISTS `contact_info` (
  `con_id` int(11) NOT NULL,
  `con_email` varchar(300) NOT NULL,
  `con_phone` varchar(20) DEFAULT NULL,
  `con_position` varchar(200) DEFAULT NULL,
  `con_name` varchar(300) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`con_id`, `con_email`, `con_phone`, `con_position`, `con_name`) VALUES
(2, 'nhokgalai@gmail.com', '(092) 312-3123', 'support', 'Support'),
(3, 'sup1@gmail.com', '(084) 415-5454', 'aboutus', 'Support 1'),
(4, 'sup2@gmail.com', '(084) 444-4444', 'aboutus', 'Support 2');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `ct_id` int(11) NOT NULL,
  `ct_name` varchar(150) DEFAULT NULL,
  `ct_email` varchar(300) NOT NULL,
  `ct_phone` varchar(20) DEFAULT NULL,
  `ct_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_slider`
--

CREATE TABLE IF NOT EXISTS `item_slider` (
  `it_id` int(11) NOT NULL,
  `sl_id` int(11) DEFAULT NULL,
  `it_start_tag` varchar(400) NOT NULL,
  `it_attri` text NOT NULL,
  `it_text` text NOT NULL,
  `it_end_tag` varchar(200) NOT NULL,
  `it_left` float NOT NULL,
  `it_top` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='text hoac button của slide	';

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `j_id` int(11) NOT NULL,
  `po_id` int(11) DEFAULT NULL,
  `j_des` text,
  `j_stt` int(11) DEFAULT '0',
  `j_info` text
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`j_id`, `po_id`, `j_des`, `j_stt`, `j_info`) VALUES
(3, 3, 'aaaaaaaaaaaaaaaaaaaa', 0, '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>'),
(5, 5, 'aaaaa  a a a a a a a a a', 1, '<p>&nbsp;a a a aa a a</p>');

-- --------------------------------------------------------

--
-- Table structure for table `legal_content`
--

CREATE TABLE IF NOT EXISTS `legal_content` (
  `lec_id` int(11) NOT NULL,
  `lec_title` varchar(200) DEFAULT NULL,
  `lec_content` text
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `legal_content`
--

INSERT INTO `legal_content` (`lec_id`, `lec_title`, `lec_content`) VALUES
(3, 'Tesst dot 3', '<p>test lan 333333333333333333333331</p>\r\n'),
(4, 'Tesst dot 4', '<ul>\r\n	<li>sdasdasd</li>\r\n	<li>asdasdasd</li>\r\n	<li>asdasd</li>\r\n	<li>asdasd</li>\r\n	<li>asd</li>\r\n	<li>asd</li>\r\n	<li>as</li>\r\n	<li>das</li>\r\n	<li>d</li>\r\n	<li>\r\n	<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n		<tbody>\r\n			<tr>\r\n				<td>sadasd</td>\r\n				<td>sadasdasd</td>\r\n			</tr>\r\n			<tr>\r\n				<td>asdasd</td>\r\n				<td>asdasd</td>\r\n			</tr>\r\n			<tr>\r\n				<td>sadas</td>\r\n				<td>dasdasd</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n\r\n	<p>&nbsp;</p>\r\n	</li>\r\n</ul>\r\n'),
(5, 'test 5', '<p>sadasd</p>\r\n'),
(6, 'test 6', '<p>asdasdasd</p>\r\n'),
(7, 'test 7', '<p>aaaaaaaaaaaaaaa</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `main_features`
--

CREATE TABLE IF NOT EXISTS `main_features` (
  `mf_id` int(11) NOT NULL,
  `mf_title` varchar(300) DEFAULT NULL,
  `mf_des` text,
  `mf_icon` varchar(300) DEFAULT NULL,
  `pro_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='Main Features';

--
-- Dumping data for table `main_features`
--

INSERT INTO `main_features` (`mf_id`, `mf_title`, `mf_des`, `mf_icon`, `pro_id`) VALUES
(3, 'Main Features 1', 'Rất nhiều tính năng hấp dẫn ghê gớm', 'Main_Features_1.png', 'eezz'),
(5, 'Main Features 3', 'Giá cả hợp lý vô cùng', 'Main_Features_3.png', 'eezz'),
(6, 'Main Features 4', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'Main_Features_4.png', 'eezz'),
(7, 'Main Features 5', 'aaaaaaaaaaaaaaaa', 'Main_Features_5.png', 'eezz'),
(8, 'Main Features 8', 'a', 'Main_Features_8.png', 'eezz'),
(9, 'Main Features  pirple 1', 'mo ta 1', 'Main_Features_pirple_1.png', 'ivvy'),
(10, 'Main Features  pirple 2', 'mo ta 2', 'Main_Features_pirple_2.png', 'ivvy');

-- --------------------------------------------------------

--
-- Table structure for table `os`
--

CREATE TABLE IF NOT EXISTS `os` (
  `os_id` int(11) NOT NULL,
  `pro_id` varchar(50) DEFAULT NULL,
  `os_name` varchar(200) DEFAULT NULL,
  `os_link` varchar(300) DEFAULT NULL,
  `os_icon` varchar(300) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `os`
--

INSERT INTO `os` (`os_id`, `pro_id`, `os_name`, `os_link`, `os_icon`) VALUES
(9, 'eezz', 'App Store', 'https://www.google.com.vn', 'App_Store.png'),
(10, 'eezz', 'Google Play', 'https://www.google.com.vn', 'Google_Play.png'),
(11, 'ivvy', 'App Store', 'https://www.google.com.vn', 'App_Store.png'),
(12, 'ivvy', 'Google Play', 'https://www.google.com.vn', 'Google_Play.png');

-- --------------------------------------------------------

--
-- Table structure for table `page_legal`
--

CREATE TABLE IF NOT EXISTS `page_legal` (
  `le_id` int(11) NOT NULL,
  `le_name` varchar(300) DEFAULT NULL,
  `le_des` varchar(200) DEFAULT NULL,
  `le_img` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `po_id` int(11) NOT NULL,
  `po_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`po_id`, `po_name`) VALUES
(3, 'Developer'),
(5, 'job2');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pro_id` varchar(50) NOT NULL,
  `pro_name` varchar(300) DEFAULT NULL,
  `pro_price` decimal(15,2) DEFAULT NULL,
  `pro_version` varchar(100) DEFAULT NULL,
  `pro_release` datetime DEFAULT NULL,
  `pro_des` text,
  `pro_icon` varchar(300) DEFAULT NULL,
  `pro_img_bg` varchar(300) DEFAULT NULL,
  `pro_img_des` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_price`, `pro_version`, `pro_release`, `pro_des`, `pro_icon`, `pro_img_bg`, `pro_img_des`) VALUES
('eezz', 'EEzZ', '9000000.00', '1.1', '2015-09-03 00:00:00', 'rat muốn viết j đó nhưng không biết viết gì hết trơn', 'new_icon.png', 'new_bg.jpg', 'new_bgdes.png'),
('ivvy', 'Purple-Ivvy', '2123.00', '1.1', '2015-09-01 00:00:00', '', 'new_icon.png', 'new_bg.jpg', 'new_bgdes.png');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `r_id` int(11) NOT NULL,
  `pro_id` varchar(50) DEFAULT NULL,
  `r_date` datetime DEFAULT NULL,
  `r_fname` varchar(300) NOT NULL,
  `r_lname` varchar(300) NOT NULL,
  `r_email` varchar(300) NOT NULL,
  `r_phone` varchar(20) NOT NULL,
  `r_address` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`r_id`, `pro_id`, `r_date`, `r_fname`, `r_lname`, `r_email`, `r_phone`, `r_address`) VALUES
(156, 'eezz', '2015-09-22 00:00:00', 'nguyen', 'tran', 'nhokgalai@gmail.com', '0909113113', 'binh chanh');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `sl_id` int(11) NOT NULL,
  `sl_img` varchar(400) NOT NULL,
  `sl_link` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `social_network`
--

CREATE TABLE IF NOT EXISTS `social_network` (
  `sn_id` varchar(50) NOT NULL,
  `sn_name` varchar(200) DEFAULT NULL,
  `sn_link` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_network`
--

INSERT INTO `social_network` (`sn_id`, `sn_name`, `sn_link`) VALUES
('fa-facebook-square', 'Facebook', 'https://www.google.com.vn/?gws_rd=ssl'),
('fa-google', 'Google', 'https://www.google.com.vn/?gws_rd=ssl'),
('fa-instagram', 'Instagram', 'https://www.google.com.vn/?gws_rd=ssl');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `st_id` varchar(50) NOT NULL,
  `po_id` int(11) DEFAULT NULL,
  `st_name` varchar(200) DEFAULT NULL,
  `st_des` text,
  `st_avt` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ac_id`),
  ADD KEY `fk_acc_po_idx` (`at_id`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `apply_job`
--
ALTER TABLE `apply_job`
  ADD PRIMARY KEY (`ap_id`),
  ADD KEY `fk_job_aj_idx` (`job_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ar_id`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `item_slider`
--
ALTER TABLE `item_slider`
  ADD PRIMARY KEY (`it_id`),
  ADD KEY `fk_sl_it_idx` (`sl_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`j_id`),
  ADD KEY `fk_job_po_idx` (`po_id`);

--
-- Indexes for table `legal_content`
--
ALTER TABLE `legal_content`
  ADD PRIMARY KEY (`lec_id`);

--
-- Indexes for table `main_features`
--
ALTER TABLE `main_features`
  ADD PRIMARY KEY (`mf_id`),
  ADD KEY `fk_mf_pro_idx` (`pro_id`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`os_id`),
  ADD KEY `fk_pro_os_idx` (`pro_id`);

--
-- Indexes for table `page_legal`
--
ALTER TABLE `page_legal`
  ADD PRIMARY KEY (`le_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `fk_pro_re_idx` (`pro_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `social_network`
--
ALTER TABLE `social_network`
  ADD PRIMARY KEY (`sn_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`st_id`),
  ADD KEY `fk_p_s_idx` (`po_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `apply_job`
--
ALTER TABLE `apply_job`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `ar_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_slider`
--
ALTER TABLE `item_slider`
  MODIFY `it_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `legal_content`
--
ALTER TABLE `legal_content`
  MODIFY `lec_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `main_features`
--
ALTER TABLE `main_features`
  MODIFY `mf_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `os_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `page_legal`
--
ALTER TABLE `page_legal`
  MODIFY `le_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_ac_at` FOREIGN KEY (`at_id`) REFERENCES `account_type` (`at_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `apply_job`
--
ALTER TABLE `apply_job`
  ADD CONSTRAINT `fk_job_aj` FOREIGN KEY (`job_id`) REFERENCES `job` (`j_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item_slider`
--
ALTER TABLE `item_slider`
  ADD CONSTRAINT `fk_sl_it` FOREIGN KEY (`sl_id`) REFERENCES `slider` (`sl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `fk_job_po` FOREIGN KEY (`po_id`) REFERENCES `position` (`po_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `main_features`
--
ALTER TABLE `main_features`
  ADD CONSTRAINT `fk_mf_pro` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `os`
--
ALTER TABLE `os`
  ADD CONSTRAINT `fk_pro_os` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fk_pro_re` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_p_s` FOREIGN KEY (`po_id`) REFERENCES `position` (`po_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
