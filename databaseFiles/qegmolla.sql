-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2022 at 01:05 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qegmolla`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int(10) NOT NULL,
  `a_username` varchar(50) NOT NULL,
  `a_fullname` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_gender` varchar(10) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_phone` varchar(20) NOT NULL,
  `a_phonecode` int(10) NOT NULL,
  `a_country` varchar(50) NOT NULL,
  `a_vcode` int(10) NOT NULL,
  `a_vstatus` varchar(15) NOT NULL,
  `a_status` int(5) NOT NULL,
  `a_dateofbirth` varchar(50) NOT NULL,
  `a_createtime` varchar(50) NOT NULL,
  `a_updatetime` varchar(50) DEFAULT NULL,
  `a_address` longtext DEFAULT NULL,
  `a_profilepic` varchar(100) DEFAULT NULL,
  `a_signinmethod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `a_username`, `a_fullname`, `a_email`, `a_gender`, `a_password`, `a_phone`, `a_phonecode`, `a_country`, `a_vcode`, `a_vstatus`, `a_status`, `a_dateofbirth`, `a_createtime`, `a_updatetime`, `a_address`, `a_profilepic`, `a_signinmethod`) VALUES
(1, 'baaz421', 'Shahbaaz Hussain', 'baazdesigner@gmail.com', 'male', '$2y$10$yneXgDEdAM0NX/SW9Sb0VePEJVGrB6PU.Kqv5HOT/dRKX4FQ0zcAq', '66703387', 974, 'Qatar (‫قطر‬‎)', 287860, 'notverified', 1, '09-08-1994', '17-10-2021 01:39', '24-11-2021 04:49', NULL, 'A_1_1639054338.jpg', NULL),
(2, 'baazdesigner', 'Nadeem Hussain', 'shahbazhussain421@gmail.com', 'male', '$2y$10$q8zs67kiUpqexKtlZkfaHeEelT6bySgh8yEa2EqfckzrfmN/za90q', '55032608', 974, 'Qatar (‫قطر‬‎)', 671592, 'notverified', 1, '09-08-1994', '17-10-2021 03:02', '21-11-2021 21:12', NULL, 'A_2_1637109921.jpg', NULL),
(3, 'Nishajaan', 'Nisha Hussain', 'baaztest421@gmail.com', 'female', '$2y$10$rq3Jyo41S.a2tEcfGABSJOgcFPV4AX3s916irIUcK5m9P91PGx7zq', '44356667', 974, 'Qatar (‫قطر‬‎)', 340438, 'notverified', 1, '27-10-1996', '17-11-2021 03:52', '21-11-2021 21:13', NULL, 'A_3_1637115603.jpg', NULL),
(4, 'zahed1133', 'Syed Zahed', 'example@example.com', 'male', '$2y$10$SoNSESZ.6dJZ8QSEW28wK.riGuThggsLDvTWi//bMp4B4bPkkPDV.', '8987865643', 91, 'India (भारत)', 659668, 'notverified', 1, '01-12-1994', '17-11-2021 04:37', '24-11-2021 05:08', NULL, 'A_4_1637115951.jpg', NULL),
(200, 'jaan143', 'mere jaan', 'jaan@jaan.com', 'female', '$2y$10$LLDtXzeXmk2e2lyoEXoZFOLh/SYh7r7/q4kfHrPbO8Jn7Df4H68Z6', '912345786', 351, 'Portugal', 254792, 'notverified', 1, '19-01-1994', '24-11-2021 06:07', '', NULL, 'female-avatar.jpg', NULL),
(201, 'imh662', 'iyad', 'imh662@gmail.com', 'male', '$2y$10$XotTHu7FVM.tIQcyOeneiOHCx8BKiQrZlddklMF.a2AuGlvBRUVxW', '912665533', 351, 'Portugal', 531325, 'notverified', 1, '29-01-1976', '09-12-2021 16:00', '09-12-2021 16:32', NULL, 'A_201_1639054879.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `deal_id` int(15) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(10) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_name_arabic` varchar(250) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `time` datetime DEFAULT current_timestamp(),
  `us_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `cat_name`, `cat_name_arabic`, `status`, `time`, `us_id`) VALUES
(1, 'Electronic', 'إلكترونيات', 1, NULL, 36),
(2, 'Accessories', 'مستلزمات', 1, NULL, 37),
(4, 'clothes', 'clothes', 1, '2021-09-27 23:35:37', 38),
(10, 'mobile', 'mobile', 1, '2021-09-28 02:09:21', 36),
(12, 'perfumes', 'perfumes', 1, '2021-09-28 13:51:57', 37),
(13, 'gifts', 'gifts', 1, '2021-09-28 13:53:01', 38),
(16, 'basket', 'basket', 0, '2021-09-28 21:52:17', 37),
(17, 'cars', 'cars', 0, '2021-09-28 21:52:26', 38),
(18, 'bike', 'bike', 1, '2021-09-28 21:52:32', 36),
(19, 'tablets', 'tablets', 1, '2021-09-28 21:52:46', 37),
(20, 'flowers', 'flowers', 0, '2021-09-28 22:01:56', 38),
(21, 'home', 'home', 0, '2021-09-28 22:04:19', 36),
(22, 'furniture', 'furniture', 0, '2021-09-28 22:04:31', 37),
(23, 'sports', 'sports', 0, '2021-09-28 22:04:45', 38),
(24, 'fashion', 'fashion baby', 1, '2021-09-28 22:04:59', 36),
(25, 'kids', 'kids', 1, '2021-09-28 22:05:24', 37),
(26, 'pets', 'pets', 1, '2021-09-28 22:05:31', 38),
(29, 'kids ', 'kids', 0, '2021-10-13 15:02:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE `deal` (
  `DID` int(20) NOT NULL,
  `a_id` int(10) NOT NULL,
  `p_id` int(20) NOT NULL,
  `zone` varchar(10) DEFAULT NULL,
  `deal_status` int(2) DEFAULT NULL,
  `m_value` int(10) DEFAULT NULL,
  `e_value` int(10) DEFAULT NULL,
  `unit_price` int(10) DEFAULT NULL,
  `red_method` varchar(15) DEFAULT NULL,
  `s_time_red` varchar(20) DEFAULT NULL,
  `red_am` int(10) DEFAULT NULL,
  `e_time_red` varchar(20) DEFAULT NULL,
  `orange_method` varchar(15) DEFAULT NULL,
  `s_time_oran` varchar(20) DEFAULT NULL,
  `oran_am` int(10) DEFAULT NULL,
  `e_time_oran` varchar(20) DEFAULT NULL,
  `green_method` varchar(15) DEFAULT NULL,
  `s_time_green` varchar(20) DEFAULT NULL,
  `green_am` int(10) DEFAULT NULL,
  `e_time_green` varchar(20) DEFAULT NULL,
  `d_country` varchar(20) DEFAULT NULL,
  `winner_id` int(10) DEFAULT NULL,
  `create_time` varchar(20) DEFAULT NULL,
  `update_time` varchar(20) DEFAULT NULL,
  `total_m_red` int(20) DEFAULT NULL,
  `total_m_oran` int(20) DEFAULT NULL,
  `total_m_green` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deal`
--

INSERT INTO `deal` (`DID`, `a_id`, `p_id`, `zone`, `deal_status`, `m_value`, `e_value`, `unit_price`, `red_method`, `s_time_red`, `red_am`, `e_time_red`, `orange_method`, `s_time_oran`, `oran_am`, `e_time_oran`, `green_method`, `s_time_green`, `green_am`, `e_time_green`, `d_country`, `winner_id`, `create_time`, `update_time`, `total_m_red`, `total_m_oran`, `total_m_green`) VALUES
(2, 1, 6, 'red', 0, 150, 200, 10, 'time', '24-10-2021 02:19', NULL, '25-10-2021 02:19', 'percentage', '25-10-2021 02:19', NULL, NULL, 'time', NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 02:19', '06-11-2021 18:04', NULL, NULL, NULL),
(3, 1, 6, 'red', 0, 150, 200, 10, 'amount', '24-10-2021 02:22', NULL, '', 'percentage', '', NULL, NULL, 'time', NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 02:22', '06-11-2021 18:04', NULL, NULL, NULL),
(4, 1, 6, 'red', 0, 150, 200, 10, 'amount', '24-10-2021 02:51', NULL, '', 'percentage', '', NULL, NULL, 'time', NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', 0, '24-10-2021 02:51', '06-11-2021 18:04', NULL, NULL, NULL),
(5, 1, 7, 'red', 0, 200, 200, 5, 'time', '24-10-2021 02:56', NULL, '26-10-2021 02:56', 'percentage', '26-10-2021 02:56', NULL, NULL, 'time', NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 02:56', '06-11-2021 18:02', NULL, NULL, NULL),
(6, 1, 5, 'red', 0, 350, 500, 50, 'amount', '24-10-2021 03:00', NULL, '', 'percentage', '', NULL, NULL, 'time', NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 03:00', '06-11-2021 18:04', NULL, NULL, NULL),
(7, 1, 7, 'red', 0, 200, 300, 10, 'amount', '24-10-2021 12:48', NULL, '', 'percentage', '', NULL, NULL, 'time', NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 12:48', '06-11-2021 18:02', NULL, NULL, NULL),
(8, 1, 7, 'red', 0, 200, 300, 10, 'time', '24-10-2021 14:56', NULL, '25-10-2021 14:57', 'percentage', '25-10-2021 14:57', NULL, NULL, 'time', NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 14:56', '06-11-2021 18:02', NULL, NULL, NULL),
(9, 1, 7, 'red', 0, 200, 300, 5, 'amount', '24-10-2021 15:07', NULL, '', 'percentage', '', NULL, NULL, 'time', NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-10-2021 15:07', '06-11-2021 18:02', NULL, NULL, NULL),
(10, 1, 12, 'red', 0, 250, 500, 20, 'time', '09-11-2021 15:23', NULL, '11-11-2021 16:30', 'percentage', '11-11-2021 16:30', NULL, NULL, 'time', NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '09-11-2021 15:23', '09-11-2021 15:30', NULL, NULL, NULL),
(11, 1, 13, 'red', 0, 350, 500, 50, 'amount', '24-11-2021 05:15', NULL, '', 'time', '', NULL, NULL, 'percentage', NULL, NULL, NULL, 'Qatar (‫قطر‬‎)', NULL, '24-11-2021 05:15', '24-11-2021 05:16', NULL, NULL, NULL),
(12, 201, 23, 'red', 0, 210, 250, 15, 'amount', '09-12-2021 16:37', NULL, '', 'time', '', NULL, NULL, 'percentage', NULL, NULL, NULL, 'Portugal', NULL, '09-12-2021 16:37', '27-12-2021 19:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deal_setting`
--

CREATE TABLE `deal_setting` (
  `ID` int(10) NOT NULL,
  `zone` varchar(10) DEFAULT NULL,
  `d_percentage` int(10) DEFAULT 10,
  `d_time` int(10) DEFAULT 2,
  `d_method` varchar(2) DEFAULT 't'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deal_setting`
--

INSERT INTO `deal_setting` (`ID`, `zone`, `d_percentage`, `d_time`, `d_method`) VALUES
(8, 'orange', 10, 1, 't'),
(9, 'green', 10, 1, 't');

-- --------------------------------------------------------

--
-- Table structure for table `imges_upload_test`
--

CREATE TABLE `imges_upload_test` (
  `ID` int(10) NOT NULL,
  `image_0` varchar(255) DEFAULT NULL,
  `image_1` varchar(50) DEFAULT NULL,
  `image_2` varchar(50) DEFAULT NULL,
  `image_3` varchar(50) DEFAULT NULL,
  `image_4` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imges_upload_test`
--

INSERT INTO `imges_upload_test` (`ID`, `image_0`, `image_1`, `image_2`, `image_3`, `image_4`) VALUES
(47, 'p_2049978452.jpg', 'p_276495622.jpg', 'p_131740240.jpg', 'p_1145131325.jpg', 'p_2036285033.jpg'),
(48, 'p_1728629158.jpg', 'p_1964169562.jpg', 'p_458524713.jpg', 'p_654001628.jpg', 'p_1771497906.jpg'),
(49, 'p_1864302558.jpg', 'p_107484989.jpg', 'p_490225722.jpg', '', ''),
(50, 'p_1435392093.jpg', 'p_932627759.jpg', 'p_1943012916.jpg', 'p_200375271.jpg', 'p_691290262.jpg'),
(51, 'p_421763822.jpg', 'p_6391060.jpg', 'p_1464642064.jpg', '', ''),
(52, 'p_1833697587.jpg', 'p_1664475459.jpg', 'p_1919351699.jpg', 'p_1317674450.jpg', 'p_1373340488.jpg'),
(53, 'p_18720531.jpg', 'p_1202015871.jpg', 'p_976067442.jpg', '', ''),
(54, 'p_1707128676.jpg', '', '', '', ''),
(55, 'p_149039295.jpg', 'null', 'null', 'null', 'null'),
(56, 'p_1716840334.jpg', 'null', 'null', 'null', 'null'),
(57, 'p_687636270.jpg', 'p_1229612843.jpg', 'p_929238209.jpg', 'p_687499102.jpg', 'p_313768465.jpg'),
(58, 'p_304131724.jpg', 'p_516471179.jpg', 'p_118327688.jpg', 'p_1579681556.jpg', 'null'),
(59, 'p_1726832475.jpg', 'p_1141221782.jpg', 'p_2107792198.jpg', 'null', 'null'),
(60, 'p_1817081009.jpg', 'p_445783092.jpg', 'p_1982195487.jpg', 'p_1627370252.jpg', 'null'),
(61, 'p_1607200295.jpg', 'p_293355626.jpg', 'p_679896299.jpg', 'null', 'null'),
(62, 'p_361014639.jpg', 'p_725948647.jpg', 'null', 'null', 'null'),
(63, 'p_1886942423.jpg', 'p_949490661.jpg', 'p_94485791.jpg', 'null', 'null'),
(64, 'p_673898251.jpg', 'p_944324709.jpg', 'p_1811502623.jpg', 'null', 'null'),
(65, 'p_187379636.jpg', 'p_656723640.jpg', 'p_1959878460.jpg', 'p_1019089008.jpg', 'p_1378892330.jpg'),
(66, 'p_13847340.jpg', 'p_736412248.jpg', 'p_955786782.jpg', 'null', 'null'),
(67, 'p_398556765.jpg', 'p_1778833887.jpg', 'p_40032152.jpg', 'null', 'null'),
(68, 'p_2100848673.jpg', 'p_972580282.jpg', 'p_400930331.jpg', 'null', 'null'),
(69, 'p_1434422640.jpg', 'p_1841852134.jpg', 'p_738882042.jpg', 'p_197583690.jpg', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `m_admin`
--

CREATE TABLE `m_admin` (
  `AID` int(10) NOT NULL,
  `a_username` varchar(50) NOT NULL,
  `a_fullname` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_gender` varchar(10) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_phone` varchar(20) NOT NULL,
  `a_phonecode` int(10) NOT NULL,
  `a_country` varchar(50) NOT NULL,
  `a_vcode` int(10) NOT NULL,
  `a_vstatus` varchar(15) NOT NULL,
  `a_status` int(5) NOT NULL,
  `a_dateofbirth` varchar(50) NOT NULL,
  `a_createtime` varchar(50) NOT NULL,
  `a_updatetime` varchar(50) DEFAULT NULL,
  `a_address` longtext DEFAULT NULL,
  `a_profilepic` varchar(100) DEFAULT NULL,
  `a_signinmethod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_admin`
--

INSERT INTO `m_admin` (`AID`, `a_username`, `a_fullname`, `a_email`, `a_gender`, `a_password`, `a_phone`, `a_phonecode`, `a_country`, `a_vcode`, `a_vstatus`, `a_status`, `a_dateofbirth`, `a_createtime`, `a_updatetime`, `a_address`, `a_profilepic`, `a_signinmethod`) VALUES
(1, 'baaz421', 'Shahbaaz Hussain', 'baazdesigner@gmail.com', 'male', '$2y$10$.Yz3jdwAkjStfmXKZhPHqOlyEQJanBsi5IVwN2aCZIz69ash12aa.', '66703387', 974, 'Qatar (‫قطر‬‎)', 287860, 'notverified', 1, '09-08-1994', '17-10-2021 01:39', '24-11-2021 05:58', NULL, 'A_1_1637722606.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(15) NOT NULL,
  `admin_id` int(15) DEFAULT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `category_id` int(5) DEFAULT NULL,
  `p_status` int(2) DEFAULT NULL,
  `deal_check` int(5) DEFAULT NULL,
  `image_0` varchar(100) DEFAULT NULL,
  `image_1` varchar(100) DEFAULT NULL,
  `image_2` varchar(100) DEFAULT NULL,
  `image_3` varchar(100) DEFAULT NULL,
  `image_4` varchar(100) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `m_price` int(100) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `admin_id`, `product_name`, `category_id`, `p_status`, `deal_check`, `image_0`, `image_1`, `image_2`, `image_3`, `image_4`, `description`, `m_price`, `time`) VALUES
(4, 1, 'Brown Purse', 2, 1, 0, 'p_2010179415.jpg', 'p_1532524785.jpg', 'p_1809500759.jpg', 'p_429361133.jpg', 'null', 'Brown color purse -size 30 X 40- stylish bag with suitable with any dress and golden frame work ', 300, '2021-10-08 11:31:32'),
(5, 1, 'Hig heel Sandal', 2, 1, 0, 'p_1520952134.jpg', 'p_452067129.jpg', 'p_312907487.jpg', 'p_1983303985.jpg', 'null', 'golden color high heel sandal with cross belt , latest fashionable style , for any occasion  ', 350, '2021-10-08 12:22:12'),
(6, 1, 'Kurta style suit ', 4, 1, 0, 'p_1509947001.jpg', 'p_1133767679.jpg', 'p_1461108727.jpg', 'p_1267033111.jpg', 'null', 'Stylish short khute , with nice pattern\r\nlemon color ', 150, '2021-10-08 12:25:48'),
(7, 1, 'Brown night suit with pajamas', 4, 1, 0, 'p_1642215992.jpg', 'p_157135756.jpg', 'p_874271354.jpg', 'p_471678602.jpg', 'null', 'Brown night suit with pajamas with flower pattern', 200, '2021-10-08 12:44:12'),
(9, 1, 'Tiger Pattern Dress Suit', 4, 1, 0, 'p_1573713037.jpg', 'p_1043474764.jpg', 'null', 'null', 'null', 'Short skirt dress with Tiger pattern, and Black shirt', 250, '2021-10-08 13:11:15'),
(10, 1, 'circle shape purse ', 2, 1, 0, 'p_1767178315.jpg', 'p_1280782257.jpg', 'p_228573533.jpg', 'p_566498302.jpg', 'p_1237800811.jpg', 'circle shape purse with golden metal finish and chain', 350, '2021-10-08 15:12:47'),
(23, 201, 'Portugal clothes ', 24, 1, 0, 'p_1601329658.jpg', 'p_1957018183.jpg', 'p_159280421.jpg', 'null', 'null', '100% cotton', 210, '2021-12-09 13:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poll`
--

CREATE TABLE `tbl_poll` (
  `poll_id` int(11) NOT NULL,
  `php_framework` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_poll`
--

INSERT INTO `tbl_poll` (`poll_id`, `php_framework`) VALUES
(1, 'Laravel'),
(2, 'CakePHP'),
(3, 'Phalcon'),
(4, 'CodeIgniter'),
(5, 'Symfony'),
(6, 'CakePHP'),
(7, 'CakePHP'),
(8, 'CakePHP'),
(9, 'CakePHP'),
(10, 'CakePHP'),
(11, 'CakePHP'),
(12, 'CakePHP'),
(13, 'CakePHP'),
(14, 'CakePHP'),
(15, 'CakePHP'),
(16, 'Laravel'),
(17, 'Laravel'),
(18, 'Laravel'),
(19, 'Laravel'),
(20, 'Laravel'),
(21, 'Laravel');

-- --------------------------------------------------------

--
-- Table structure for table `test_product`
--

CREATE TABLE `test_product` (
  `ID` int(10) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_product`
--

INSERT INTO `test_product` (`ID`, `p_name`, `price`) VALUES
(1, 'box', 50),
(2, 'cap', 20),
(3, 'pen', 80),
(4, 'cufflink', 120),
(5, 'wallet', 150),
(6, 'cards', 70),
(7, 'car', 60),
(8, 'bag', 10),
(9, 'candle', 55),
(10, 'bottle', 33),
(11, 'cup', 24),
(12, 'glass', 66),
(13, 'table', 180),
(14, 'computers', 200),
(15, 'cable', 15),
(16, 'mat', 35),
(17, 'watch', 35),
(18, 'marker', 40),
(19, 'scissor', 20),
(20, 'mobile', 155),
(21, 'perfume', 110);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `countrycode` int(30) NOT NULL,
  `mobile` int(100) NOT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `vcode` varchar(100) NOT NULL,
  `vstatus` text NOT NULL,
  `createtime` varchar(50) DEFAULT NULL,
  `updatetime` varchar(50) DEFAULT NULL,
  `u_status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `country`, `countrycode`, `mobile`, `dob`, `vcode`, `vstatus`, `createtime`, `updatetime`, `u_status`) VALUES
(36, 'iyad', 'imh662@gmail.com', '$2y$10$ABE6tViBaANa7EONZGQWOuNBHqKvv5dddK3sgKmpAGpbC87vee4VO', 'Qatar (‫قطر‬‎)', 974, 55269182, '1976-01-30', '0', 'verified', '16 09 2021 04:42:38 PM', '16 09 2021 04:48:22 PM', 1),
(37, 'salman', 'example@example.com', '$2y$10$MDpZRB4MfD3mWmuakAXfiOJGS7AijOL3NQdcPP95Rxw7LIEBGsjaW', 'Qatar (‫قطر‬‎)', 974, 33314579, '1976-09-14', '0', 'verified', '16 09 2021 06:49:24 PM', '10 10 2021 01:55:41 AM', 1),
(38, 'Baaz Hussain', 'baazdesigner@gmail.com', '$2y$10$cNhv/2ru3Bhf07mANLyu3efSnARFdTiSJhtFCLpkmiJvQYWYYWEZu', 'India (भारत)', 91, 66703387, NULL, '0', 'notverified', NULL, '02 01 2022 01:03:18 AM', 1),
(39, 'Shahbaaz Hussain', 'shahbazhussain421@gmail.com', '$2y$10$m/7e5stwCI65ql2Cat0Eg.enispDXtf5aZt636qrwOhIQ9A0vSLYu', 'Qatar (‫قطر‬‎)', 974, 55032608, '1994-08-09', '0', 'verified', '10 10 2021 12:32:22 AM', '10 10 2021 03:17:35 PM', 1),
(40, 'Fazal Khan', 'examplefazal@example.com', '$2y$10$jOP5vXNhRZa3jRSuqEBEkeNRQg6lp9HZQMGlaMiMmxU4cWxR.0wgq', 'Qatar (‫قطر‬‎)', 974, 55678900, '1992-08-09', '778943', 'verified', '10 10 2021 02:00:30 AM', '24-11-2021 05:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `ID` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`DID`);

--
-- Indexes for table `deal_setting`
--
ALTER TABLE `deal_setting`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `imges_upload_test`
--
ALTER TABLE `imges_upload_test`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `m_admin`
--
ALTER TABLE `m_admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_poll`
--
ALTER TABLE `tbl_poll`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `test_product`
--
ALTER TABLE `test_product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `deal`
--
ALTER TABLE `deal`
  MODIFY `DID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `deal_setting`
--
ALTER TABLE `deal_setting`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `imges_upload_test`
--
ALTER TABLE `imges_upload_test`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `m_admin`
--
ALTER TABLE `m_admin`
  MODIFY `AID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_poll`
--
ALTER TABLE `tbl_poll`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `test_product`
--
ALTER TABLE `test_product`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
