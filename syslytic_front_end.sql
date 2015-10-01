-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2015 at 02:16 AM
-- Server version: 5.5.44-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syslytic_front_end`
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
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(84, 1442912131, '1.53.232.110', 'KZ1iw9HK'),
(85, 1442912175, '1.53.232.110', 'dXjRB1FM'),
(86, 1442912183, '1.53.232.110', '3tn760j6'),
(87, 1442912188, '1.53.232.110', 'k1Q575xf'),
(88, 1442912194, '1.53.232.110', 'tLbHVZer'),
(89, 1442912205, '1.53.232.110', '2oux1Xwx'),
(90, 1442912208, '1.53.232.110', 'hSWtGP67'),
(91, 1442912214, '1.53.232.110', 'HbDsfubY'),
(92, 1442912277, '1.53.232.110', 'V6F9Zd6f'),
(93, 1442912280, '1.53.232.110', 'V9eUarN7'),
(94, 1442912543, '210.245.98.210', 'mOKRD7eV'),
(95, 1442912559, '210.245.98.210', 'ymepZ4MB'),
(96, 1442912664, '1.53.232.110', 'XGqA9SMS'),
(97, 1442912668, '1.53.232.110', 'QLuWKG2g'),
(98, 1442912672, '210.245.98.210', 'TOWp0b2J'),
(99, 1442912674, '1.53.232.110', 'mCfNRyrg'),
(100, 1442912686, '1.53.232.110', 'k4UQ8WO3'),
(101, 1442912690, '210.245.98.210', 'fXGjWWRI'),
(102, 1442912707, '210.245.98.210', 'LYq4PD3o'),
(103, 1442912712, '1.53.232.110', 'pHa76eLW'),
(104, 1442912716, '1.53.232.110', 'hHtvpHoU'),
(105, 1442912725, '1.53.232.110', 'NOzgrxff'),
(106, 1442912744, '1.53.232.110', 'NaJu44pD'),
(107, 1442913124, '1.53.232.110', '4P0BbnL3'),
(108, 1442913128, '1.53.232.110', 'ZBVSoBnJ'),
(109, 1442913304, '1.53.232.110', '4DmKyu09'),
(110, 1442913304, '192.168.0.2', 'eN2IOqc7'),
(111, 1442913317, '1.53.232.110', 'g0A8NzKq'),
(112, 1442913321, '1.53.232.110', 'iYYHyeGV'),
(113, 1442913323, '1.53.232.110', 'JXnnnsro'),
(114, 1442913406, '192.168.0.2', 'IV6OhMh0'),
(115, 1442913474, '1.53.232.110', 'zGNsazaI'),
(116, 1442913481, '192.168.0.2', 'UrpswEyZ'),
(117, 1442913497, '1.53.232.110', 'w7yb3Sl0'),
(118, 1442913497, '192.168.0.2', 'hneQ9dtu'),
(119, 1442913504, '1.53.232.110', 'p4oast0O'),
(120, 1442913505, '192.168.0.2', 'uLiVHLTJ'),
(121, 1442913507, '1.53.232.110', 'KpqAlHo9'),
(122, 1442913514, '1.53.232.110', 'O0mw4Csh'),
(123, 1442913517, '192.168.0.2', '7hISGGbC'),
(124, 1442913532, '1.53.232.110', 'aRU3FM8U'),
(125, 1442913555, '1.53.232.110', 'FmDcAFYU'),
(126, 1442913584, '210.245.98.210', '82f613ZA'),
(127, 1442913593, '210.245.98.210', 'aEan7b16'),
(128, 1442913601, '210.245.98.210', '0bxvSiQS'),
(129, 1442913614, '1.53.232.110', 'gb56XNMw'),
(130, 1442913639, '1.53.232.110', 'kJuvyCk7'),
(131, 1442913647, '1.53.232.110', 'z3kYnrAq'),
(132, 1442913660, '1.53.232.110', 'iDf1GhTT'),
(133, 1442913758, '1.53.232.110', 'B7UQh8I2'),
(134, 1442913788, '1.53.232.110', '1vf986c4'),
(135, 1442913811, '1.53.232.110', 'rD06MONr'),
(136, 1442913813, '1.53.232.110', 'Xeq33fZZ'),
(137, 1442913821, '1.53.232.110', 'zCbCqvaC'),
(138, 1442913822, '1.53.232.110', 'vRk72bLV'),
(139, 1442913831, '1.53.232.110', 'gk3pYXjf'),
(140, 1442913869, '210.245.98.210', 'cEAitMQ3'),
(141, 1442913984, '1.53.232.110', 'LXbVbrIb'),
(142, 1442913998, '1.53.232.110', 'UXZFtuVf'),
(143, 1442914003, '1.53.232.110', 'ZRtfKdFV'),
(144, 1442914006, '1.53.232.110', 'ui6HHkOA'),
(145, 1442914011, '1.53.232.110', 'YBkQdDqN'),
(146, 1442914019, '1.53.232.110', 'tjYZ8qeK'),
(147, 1442914091, '1.53.232.110', '1nbD0v7s'),
(148, 1442914109, '1.53.232.110', 'zHcFwQ5P'),
(149, 1442914128, '192.168.0.2', 'yoTcbIdv'),
(150, 1442914186, '192.168.0.2', 'VKzS6VbK'),
(151, 1442914271, '1.53.232.110', 'eCNMt7BX'),
(152, 1442914418, '1.53.232.110', 'N1RfJnBn'),
(153, 1442914682, '210.245.98.210', 'TNkpy5tT'),
(154, 1442914810, '192.168.0.2', 'MrAArbik'),
(155, 1442917634, '1.53.232.110', 'fQBOt6nN'),
(156, 1442917640, '1.53.232.110', 'yqNqma6i'),
(157, 1442918817, '1.53.232.110', 'VI6d61F5'),
(158, 1442918875, '1.53.232.110', 'WPrC5Mdk'),
(159, 1442918880, '1.53.232.110', 'QgzjXRQl'),
(160, 1442918936, '1.53.232.110', 'vlQfZxLW'),
(161, 1442918956, '1.53.232.110', '8vg083W5'),
(162, 1442918977, '1.53.232.110', 'OE3m36ny'),
(163, 1442919604, '1.53.232.110', 'OuxyFjB3'),
(164, 1442932605, '100.92.7.211', 'wPI3wlmL'),
(165, 1442932623, '100.92.7.211', '7T9HtN2C'),
(166, 1442932630, '100.92.7.211', 'hFcDkjb6'),
(167, 1442932704, '100.92.7.211', 'rJHc6DJc'),
(168, 1442970887, '100.92.7.211', 'KRd35nzp'),
(169, 1442976210, '124.110.56.180', 'fwua7E4M'),
(170, 1442976220, '124.110.56.180', 'wZfPOzMD'),
(171, 1442976704, '100.92.7.211', 'DPkTtvvN'),
(172, 1442991129, '1.53.232.110', 'RZ1sZFL8'),
(173, 1443025523, '100.92.7.211', 'CB5vvHho'),
(174, 1443053712, '100.92.7.211', 'BzKTpMKh'),
(175, 1443054130, '100.92.7.211', 'KgAiu1ta'),
(176, 1443054535, '100.92.7.211', 'pp0qH1HS'),
(177, 1443062692, '210.245.98.210', 'Ra7uXgG9'),
(178, 1443062701, '210.245.98.210', 'xHWE1Kgt'),
(179, 1443062848, '210.245.98.210', 'z0y9g1rk'),
(180, 1443087041, '1.53.232.110', 'yk9Nhb57'),
(181, 1443087046, '1.53.232.110', 'yIioBMt0'),
(182, 1443087053, '1.53.232.110', 'RFyjG7VO'),
(183, 1443087100, '1.53.232.110', 'AncQ3ORx'),
(184, 1443090458, '1.53.232.110', 'Oxt8bLSj'),
(185, 1443113563, '116.106.16.164', '1ePI8KST');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`com_id`, `com_name`, `com_address`, `com_phone`, `com_fax`, `com_longi`, `com_lati`) VALUES
(4, 'Syslytic', '146 Cộng Hòa, TPHCM', '(083) 811-4457', '00', '106.6511549', '10.8019');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`con_id`, `con_email`, `con_phone`, `con_position`, `con_name`) VALUES
(5, 'support@syslytic.vn', '(083) 811-4457', 'aboutus', 'Support');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`j_id`, `po_id`, `j_des`, `j_stt`, `j_info`) VALUES
(6, 6, 'The back stage, the gears in the machine, the amazing behind-the-screen things. Tech-and-“people” skills and passion are required. The happiness of user when experiencing is priceless benefit.', 1, '<p>The back stage, the gears in the machine, the amazing behind-the-screen things. Tech-and-&ldquo;people&rdquo; skills and passion are required. The happiness of user when experiencing is priceless benefit.</p>'),
(7, 7, 'The lever for people to pull to make it work. Be the next John Ive with us. Good observation and listening to how people lives and passion are required.', 1, '<p>The lever for people to pull to make it work. Be the next John Ive with us. Good observation and listening to how people lives and passion are required.</p>'),
(8, 8, 'Fashionista-for-machine. Make-up artists. Possible to make the same friendly visual experience for 3-to-90-years-old. Visual sense, patience to customers and passionate are required.', 1, '<p>Fashionista-for-machine. Make-up artists. Possible to make the same friendly visual experience for 3-to-90-years-old. Visual sense, patience to customers and passionate are required.</p>'),
(9, 9, 'The captain of the ship. To find the undiscovered islands to land. To navigate whole team on the journey of bringing real value to people.   Requirement: no need to be an inventor, just be a good observer and a curious person and passionate to make real values.', 1, '<p>The captain of the ship. To find the undiscovered islands to land. To navigate whole team on the journey of bringing real value to people. &nbsp; Requirement: no need to be an inventor, just be a good observer and a curious person and passionate to make real values.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `legal_content`
--

CREATE TABLE IF NOT EXISTS `legal_content` (
  `lec_id` int(11) NOT NULL,
  `lec_title` varchar(200) DEFAULT NULL,
  `lec_content` text
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='Main Features';

--
-- Dumping data for table `main_features`
--

INSERT INTO `main_features` (`mf_id`, `mf_title`, `mf_des`, `mf_icon`, `pro_id`) VALUES
(11, 'Customer Management', 'Quick onsite checkout using a customer identity QR Code\r\nComprehensive consumer contact and profile records', 'Customer_Management_mf.png', 'eezz'),
(12, 'Finance Management', 'Flexible revenue reporting module according to different periods of time and different angles including staff salaries, purchased services, payment methods', 'Finance_Management_mf.png', 'eezz'),
(13, 'Personal Management', 'Automated payroll function\r\nSmart employee performance measurement using column charts', 'Personal_Management_mf.png', 'eezz'),
(14, 'News', 'An online networking news page connecting your customer and your salon provides a robust targeted advertising communication', 'News_mf.png', 'ivvy'),
(15, 'Reservation', 'Your customers can preset or cancel their appointments at home which is more convenient and time - saving', 'Reservation_mf.png', 'ivvy'),
(16, 'QR', 'Once QR – code is scanned by a customer, faster onsite check – out is delivered', 'QR_mf.png', 'ivvy'),
(17, 'Contact', 'Automated customer contact and profile list update for you to effective carry out effective customer – caring services', 'Contact_mf.png', 'ivvy');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `os`
--

INSERT INTO `os` (`os_id`, `pro_id`, `os_name`, `os_link`, `os_icon`) VALUES
(13, 'eezz', 'Google Play', 'https://play.google.com/store/apps/details?id=syslytic.eezzpos.activities', 'Google_Play_os.png'),
(14, 'ivvy', 'Google Play', 'https://play.google.com/store/apps/details?id=syslytic.ivvy.application', 'Google_Play_os.png'),
(15, 'ivvy', 'App Store', 'https://itunes.apple.com/us/app/purple-ivvy/id1027383348', 'App_Store_os.png'),
(16, 'eezz', 'App Store', 'https://itunes.apple.com/us/app/eezz/id1037938358', 'App_Store_os.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`po_id`, `po_name`) VALUES
(6, 'Software Engineer'),
(7, 'UX Designer'),
(8, 'UI designer'),
(9, 'Marketing');

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
('eezz', 'EEzZ', 0.00, '1.0', '2015-09-22 00:00:00', '<p>Touch-to-manage business. All under 1 nail.&nbsp;</p>\r\n\r\n<p>Keep your nail business smooth and engaging.</p>\r\n\r\n<p>Nail shop owners now have EEZZ as an effortless platform of managing everything. Everything:</p>\r\n\r\n<ul>\r\n	<li>Financial management</li>\r\n	<li>\r\n	<p>HR management</p>\r\n	</li>\r\n	<li>\r\n	<p>Customer management</p>\r\n	</li>\r\n	<li>\r\n	<p>Advertising</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>With EEZZ, you touch on how much you earn a day, how much you pay each personnel, how beautifully cool the nail you did is in your hand. You &ndash;nail shop owners, can also use EEZZ to replace all the mailing tasks to their customers. By one touch, the promotion information is touched by all potential and current customers.</p>\r\n\r\n<p>EEZZ Mobile (for employees) assures your shop be productive and professional. Your employees will love what they can do with EEZZ Mobile. They can check salary or reservation and get their cool nail masterpieces be checked by current and potential customers. Employees are satisfied and efficient. Either you are.</p>\r\n', 'eezz_icon.png', 'eezz_bg.jpg', 'eezz_bgdes.png'),
('ivvy', 'Purple-Ivvy', 0.00, '1.0', '2015-09-22 00:00:00', '<p>&ldquo;Nail&quot; your customer.</p>\r\n\r\n<p>Stimulate &ndash; follow and connect with customers and giving them the best nail experience in neighborhood. That&rsquo;s how Purple Ivvy helps you nail shop owners. Purple Ivvy is the last puzzle in the whole touch-to-manage ecosystem for nail shop owners &ndash; in customer service.</p>\r\n\r\n<p>Make your customers stimulated with new cool designs from employees. Make them satisfied by easy liquidation. Make them friends with email, messages and special offer that can be customized to single customers. Make customers engaged and nailed with your shop &ndash; make money.</p>\r\n', 'ivvy_icon.png', 'ivvy_bg.jpg', 'ivvy_bgdes.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

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
('fa-facebook-square', NULL, 'https://www.facebook.com/?_rdr=p');

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
  MODIFY `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=186;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `legal_content`
--
ALTER TABLE `legal_content`
  MODIFY `lec_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `main_features`
--
ALTER TABLE `main_features`
  MODIFY `mf_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `os_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `page_legal`
--
ALTER TABLE `page_legal`
  MODIFY `le_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=158;
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
