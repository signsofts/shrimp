-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2024 at 04:01 PM
-- Server version: 11.4.0-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shrimp`
--

-- --------------------------------------------------------

--
-- Table structure for table `shr_admin`
--

CREATE TABLE `shr_admin` (
  `AD_ID` int(11) NOT NULL,
  `AD_USERNAME` varchar(50) NOT NULL,
  `AD_PASSWORD` varchar(50) NOT NULL,
  `AD_NAME` varchar(50) NOT NULL,
  `AD_STAMP` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shr_admin`
--

INSERT INTO `shr_admin` (`AD_ID`, `AD_USERNAME`, `AD_PASSWORD`, `AD_NAME`, `AD_STAMP`) VALUES
(1, 'admin', 'admin', 'admin', '2024-03-24 06:41:39'),
(2, 'user', 'user', 'user', '2024-04-02 13:59:28'),
(4, 'use2', 'use2', 'use1', '2024-04-02 14:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `shr_breed`
--

CREATE TABLE `shr_breed` (
  `BRE_ID` int(11) NOT NULL,
  `BRE_NAME` varchar(50) NOT NULL,
  `BRE_STATUS` varchar(3) DEFAULT NULL,
  `BRE_STAMP` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `BRE_IMG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='สายพันธุ์กุ้ง';

--
-- Dumping data for table `shr_breed`
--

INSERT INTO `shr_breed` (`BRE_ID`, `BRE_NAME`, `BRE_STATUS`, `BRE_STAMP`, `BRE_IMG`) VALUES
(1, 'กุ้งขาว หรือ กุ้งเกษตรขาว', NULL, '2024-03-24 06:26:27', '001.jpg'),
(2, 'กุ้งแชบ๊วย', '1', '2024-03-25 15:33:16', '002.jpg'),
(3, 'กุ้งโอคัก', '1', '2024-03-25 15:33:18', '003.jpg'),
(4, 'กุ้งกุลาดำ หรือ กุ้งลายเสือ', NULL, '2024-03-24 06:26:21', '004.jpg'),
(5, 'กุ้งก้ามกราม', '1', '2024-03-25 15:33:21', '005.jpg'),
(6, 'กุ้งแม่น้ำ', '1', '2024-03-25 15:33:25', '006.jpg'),
(7, 'กุ้งมังกร', '1', '2024-03-25 15:33:28', '007.jpg'),
(8, 'ล็อบสเตอร์ (Lobster)', '1', '2024-03-25 15:33:27', '008.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shr_foodtype`
--

CREATE TABLE `shr_foodtype` (
  `FT_ID` int(11) NOT NULL,
  `FT_NAME` varchar(100) NOT NULL,
  `FT_PRICE` decimal(5,2) DEFAULT NULL,
  `FT_STATUS` varchar(2) DEFAULT NULL,
  `FT_STAMP` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `FT_NUMBER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ข้อมูลอาหาร';

--
-- Dumping data for table `shr_foodtype`
--

INSERT INTO `shr_foodtype` (`FT_ID`, `FT_NAME`, `FT_PRICE`, `FT_STATUS`, `FT_STAMP`, `FT_NUMBER`) VALUES
(1, '1234', 4.00, NULL, '2024-04-06 11:40:58', 3);

-- --------------------------------------------------------

--
-- Table structure for table `shr_foodtypetran`
--

CREATE TABLE `shr_foodtypetran` (
  `FTT_ID` int(11) NOT NULL,
  `FTT_TYPE` enum('1','0') NOT NULL COMMENT '1 เพิล 0 ใช้ไป',
  `FTT_STAMP` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `FTT_DATE` date NOT NULL COMMENT 'วันที่ซื้อ',
  `FT_ID` int(11) NOT NULL,
  `FTT_ITEM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shr_foodtypetran`
--

INSERT INTO `shr_foodtypetran` (`FTT_ID`, `FTT_TYPE`, `FTT_STAMP`, `FTT_DATE`, `FT_ID`, `FTT_ITEM`) VALUES
(1, '1', '2024-04-06 13:12:09', '2024-04-24', 1, 2),
(2, '1', '2024-04-06 13:14:52', '2024-04-19', 1, 2),
(3, '1', '2024-04-06 13:27:34', '2024-04-03', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `shr_infoshrimp`
--

CREATE TABLE `shr_infoshrimp` (
  `ISP_ID` int(11) NOT NULL,
  `PON_ID` int(11) NOT NULL COMMENT 'บ่อ',
  `BRE_ID` int(11) NOT NULL COMMENT 'สายพันธุ์',
  `ISP_START` date DEFAULT NULL COMMENT 'วันที่เปิด',
  `ISP_END` date DEFAULT NULL COMMENT 'วันที่ปิด',
  `ISP_STAMP` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ISP_STATUS` varchar(3) NOT NULL COMMENT 'สถานะ',
  `ISP_NOTE` text NOT NULL,
  `ISP_ITEM` int(11) NOT NULL,
  `ISP_PRICE` decimal(5,2) NOT NULL COMMENT 'ราคากุ้งต่อตัว',
  `ISP_PRICE_OTH` int(11) NOT NULL DEFAULT 0,
  `ISP_ENDITEMKG` int(11) DEFAULT NULL,
  `ISP_ENDPRICEKG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ข้อมูลลงกุ้งแต่ละครั้ง';

--
-- Dumping data for table `shr_infoshrimp`
--

INSERT INTO `shr_infoshrimp` (`ISP_ID`, `PON_ID`, `BRE_ID`, `ISP_START`, `ISP_END`, `ISP_STAMP`, `ISP_STATUS`, `ISP_NOTE`, `ISP_ITEM`, `ISP_PRICE`, `ISP_PRICE_OTH`, `ISP_ENDITEMKG`, `ISP_ENDPRICEKG`) VALUES
(1, 1, 1, '2024-04-07', '2024-04-06', '2024-04-06 19:22:53', '1', '', 300, 2.00, 300, 0, 0),
(2, 1, 1, '2024-04-07', '2024-04-09', '2024-04-09 13:01:01', '1', '', 300, 2.00, 4000, 0, 0),
(3, 1, 1, '2024-04-09', NULL, '2024-04-09 13:03:38', '', '', 20, 1.00, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shr_moneylist`
--

CREATE TABLE `shr_moneylist` (
  `ML_ID` int(11) NOT NULL,
  `ISP_ID` int(11) NOT NULL,
  `ML_NAME` varchar(255) NOT NULL,
  `ML_TYPE` varchar(3) NOT NULL COMMENT 'รับ จ่าย',
  `ML_STATUS` varchar(3) DEFAULT NULL,
  `ML_AMOUNT` int(11) NOT NULL COMMENT 'ยอดเงิน',
  `ML_STAMP` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shr_moneylist`
--

INSERT INTO `shr_moneylist` (`ML_ID`, `ISP_ID`, `ML_NAME`, `ML_TYPE`, `ML_STATUS`, `ML_AMOUNT`, `ML_STAMP`) VALUES
(12, 1, 'ราคากุ้งเปิดบ่อ', '0', NULL, 600, '2024-04-06 19:21:57'),
(13, 1, 'ค่าใช้จ่ายอื่นๆ ไม่รวมราคากุ้ง', '0', NULL, 600, '2024-04-06 19:21:57'),
(14, 2, 'ราคากุ้งเปิดบ่อ', '0', NULL, 600, '2024-04-06 19:23:11'),
(15, 2, 'ค่าใช้จ่ายอื่นๆ ไม่รวมราคากุ้ง', '0', NULL, 4000, '2024-04-06 19:23:11'),
(16, 2, 'จับกุ้งได้ 50 Kg.', '1', NULL, 5000, '2024-04-09 13:01:01'),
(17, 3, 'ราคากุ้งเปิดบ่อ จำนวน 20 ตัว', '0', NULL, 20, '2024-04-09 13:03:38'),
(18, 3, 'ค่าใช้จ่ายอื่นๆ ไม่รวมราคากุ้ง', '0', NULL, 0, '2024-04-09 13:03:38'),
(19, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:38:33'),
(20, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:38:33'),
(21, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:38:35'),
(22, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:38:35'),
(23, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:38:41'),
(24, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:38:41'),
(25, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:40:43'),
(26, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:40:43'),
(27, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:41:21'),
(28, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:41:21'),
(29, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:41:21'),
(30, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:41:22'),
(31, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:41:22'),
(32, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:41:22'),
(33, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:41:22'),
(34, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:41:24'),
(35, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:41:24'),
(36, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:41:24'),
(37, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:41:24'),
(38, 3, 'อายุุกุ้ง 1 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:41:24'),
(39, 3, 'อายุุกุ้ง 2 อาหารมือ 1', '0', NULL, 0, '2024-04-09 13:44:17'),
(40, 3, 'อายุุกุ้ง 2 อาหารมือ 2', '0', NULL, 0, '2024-04-09 13:44:17'),
(41, 3, 'อายุุกุ้ง 2 อาหารมือ 3', '0', NULL, 0, '2024-04-09 13:44:17'),
(42, 3, 'อายุุกุ้ง 2 อาหารมือ 4', '0', NULL, 0, '2024-04-09 13:44:17'),
(43, 3, 'อายุุกุ้ง 2 อาหารมือ 5', '0', NULL, 0, '2024-04-09 13:44:17'),
(44, 3, 'อายุุกุ้ง 2 อาหารมือ 6', '0', NULL, 0, '2024-04-09 13:44:17'),
(45, 3, 'อายุุกุ้ง 3 อาหารมือ 4', '0', NULL, 4, '2024-04-09 13:49:37'),
(46, 3, 'อายุุกุ้ง 3 อาหารมือ 5', '0', NULL, 32, '2024-04-09 13:49:55'),
(47, 3, 'อายุุกุ้ง 4 อาหารมือ 6', '0', NULL, 24, '2024-04-09 13:53:13'),
(48, 3, 'อายุุกุ้ง 4 อาหารมือ 5', '0', NULL, 4, '2024-04-09 13:53:20'),
(49, 3, 'อายุุกุ้ง 4 อาหารมือ 3', '0', NULL, 12, '2024-04-09 13:53:30'),
(50, 3, 'อายุุกุ้ง 4 อาหารมือ 1', '0', NULL, 20, '2024-04-09 13:53:51'),
(51, 3, 'อายุุกุ้ง 4 อาหารมือ 4', '0', NULL, 4, '2024-04-09 13:58:39'),
(52, 3, 'อายุุกุ้ง 4 อาหารมือ 2', '0', NULL, 12, '2024-04-09 13:59:11'),
(53, 3, 'อายุุกุ้ง 4 อาหารมือ 2', '0', NULL, 12, '2024-04-09 13:59:50'),
(54, 3, 'อายุุกุ้ง 4 อาหารมือ 2', '0', NULL, 12, '2024-04-09 13:59:56'),
(55, 3, 'อายุุกุ้ง 1 อาหารมือ 6', '0', NULL, 200, '2024-04-09 14:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `shr_pond`
--

CREATE TABLE `shr_pond` (
  `PON_ID` int(11) NOT NULL,
  `PON_NAME` varchar(50) NOT NULL,
  `PON_STAMP` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `PON_STATUS` varchar(2) DEFAULT NULL,
  `PON_DELETE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ข้อมูลบ่อกุ้ง';

--
-- Dumping data for table `shr_pond`
--

INSERT INTO `shr_pond` (`PON_ID`, `PON_NAME`, `PON_STAMP`, `PON_STATUS`, `PON_DELETE`) VALUES
(1, 'ก', '2024-04-09 13:03:38', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shr_quality`
--

CREATE TABLE `shr_quality` (
  `QY_ID` int(11) NOT NULL,
  `ISP_ID` int(11) NOT NULL,
  `QY_DATE` date NOT NULL COMMENT 'วันที่',
  `QY_AGE` int(11) NOT NULL COMMENT 'อายุ',
  `FT_ID` int(11) NOT NULL COMMENT 'อาหาร',
  `QY_FY_NUM` int(11) DEFAULT NULL,
  `QY_FEED_1` varchar(11) DEFAULT NULL COMMENT 'มื้อ 1',
  `QY_FEED_2` varchar(11) DEFAULT NULL COMMENT 'มื้อ 2',
  `QY_FEED_3` varchar(11) DEFAULT NULL COMMENT 'มื้อ 3',
  `QY_FEED_4` varchar(11) DEFAULT NULL COMMENT 'มื้อ 4',
  `QY_FEED_5` varchar(11) DEFAULT NULL COMMENT 'มื้อ 5',
  `QY_FEED_6` varchar(11) DEFAULT NULL COMMENT 'มื้อ 6',
  `QY_SURPLUS_1` varchar(11) DEFAULT NULL COMMENT 'มื้อ 1',
  `QY_SURPLUS_2` varchar(11) DEFAULT NULL COMMENT 'มื้อ 2',
  `QY_SURPLUS_3` varchar(11) DEFAULT NULL COMMENT 'มื้อ 3',
  `QY_SURPLUS_4` varchar(11) DEFAULT NULL COMMENT 'มื้อ 4',
  `QY_SURPLUS_5` varchar(11) DEFAULT NULL COMMENT 'มื้อ 5',
  `QY_SURPLUS_6` varchar(11) DEFAULT NULL COMMENT 'มื้อ 6',
  `QY_W_SALTY` varchar(10) DEFAULT NULL COMMENT 'เค็ม',
  `QY_W_AMMONIA` varchar(10) DEFAULT NULL COMMENT 'แอมโมเนีย',
  `QY_W_NITRITE` varchar(10) DEFAULT NULL COMMENT 'ไนไตรท์',
  `QY_W_PH_1` varchar(10) DEFAULT NULL COMMENT 'เช้า',
  `QY_W_PH_2` varchar(10) DEFAULT NULL COMMENT 'เย็น',
  `QY_W_ACID_1` varchar(10) DEFAULT NULL COMMENT 'เช้า',
  `QY_W_PERA_1` varchar(10) DEFAULT NULL COMMENT 'เช้า',
  `QY_W_PERA_2` varchar(10) DEFAULT NULL COMMENT 'เย็น',
  `QY_W_COLOR` varchar(50) DEFAULT NULL COMMENT 'สีน้ำ',
  `QY_W_MOIST` varchar(10) DEFAULT NULL COMMENT 'ความชุ่ม',
  `QY_W_KALINE` varchar(10) DEFAULT NULL COMMENT 'คาไลน์',
  `QY_RDOM_GRAM` varchar(5) DEFAULT NULL COMMENT 'สุม กรัม',
  `QY_RDOM_KG` varchar(5) DEFAULT NULL COMMENT 'สุม กก',
  `QY_REMARK` text DEFAULT NULL,
  `QY_W_ACID_2` varchar(10) DEFAULT NULL,
  `QY_STATUS` varchar(3) DEFAULT NULL,
  `QY_STAMP` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shr_quality`
--

INSERT INTO `shr_quality` (`QY_ID`, `ISP_ID`, `QY_DATE`, `QY_AGE`, `FT_ID`, `QY_FY_NUM`, `QY_FEED_1`, `QY_FEED_2`, `QY_FEED_3`, `QY_FEED_4`, `QY_FEED_5`, `QY_FEED_6`, `QY_SURPLUS_1`, `QY_SURPLUS_2`, `QY_SURPLUS_3`, `QY_SURPLUS_4`, `QY_SURPLUS_5`, `QY_SURPLUS_6`, `QY_W_SALTY`, `QY_W_AMMONIA`, `QY_W_NITRITE`, `QY_W_PH_1`, `QY_W_PH_2`, `QY_W_ACID_1`, `QY_W_PERA_1`, `QY_W_PERA_2`, `QY_W_COLOR`, `QY_W_MOIST`, `QY_W_KALINE`, `QY_RDOM_GRAM`, `QY_RDOM_KG`, `QY_REMARK`, `QY_W_ACID_2`, `QY_STATUS`, `QY_STAMP`) VALUES
(1, 3, '2024-04-09', 1, 1, NULL, '2', '2', '1', '1', '1', '50', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '2024-04-09 14:00:02'),
(2, 3, '2024-04-10', 2, 1, NULL, '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '2024-04-09 13:44:17'),
(3, 3, '2024-04-11', 3, 1, NULL, '1', '8', '1', '1', '8', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '2024-04-09 13:49:55'),
(4, 3, '2024-04-12', 4, 1, NULL, '5', '3', '3', '1', '1', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '2024-04-09 13:59:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shr_admin`
--
ALTER TABLE `shr_admin`
  ADD PRIMARY KEY (`AD_ID`);

--
-- Indexes for table `shr_breed`
--
ALTER TABLE `shr_breed`
  ADD PRIMARY KEY (`BRE_ID`);

--
-- Indexes for table `shr_foodtype`
--
ALTER TABLE `shr_foodtype`
  ADD PRIMARY KEY (`FT_ID`);

--
-- Indexes for table `shr_foodtypetran`
--
ALTER TABLE `shr_foodtypetran`
  ADD PRIMARY KEY (`FTT_ID`),
  ADD KEY `cccf` (`FT_ID`);

--
-- Indexes for table `shr_infoshrimp`
--
ALTER TABLE `shr_infoshrimp`
  ADD PRIMARY KEY (`ISP_ID`),
  ADD KEY `a` (`PON_ID`),
  ADD KEY `b` (`BRE_ID`);

--
-- Indexes for table `shr_moneylist`
--
ALTER TABLE `shr_moneylist`
  ADD PRIMARY KEY (`ML_ID`);

--
-- Indexes for table `shr_pond`
--
ALTER TABLE `shr_pond`
  ADD PRIMARY KEY (`PON_ID`);

--
-- Indexes for table `shr_quality`
--
ALTER TABLE `shr_quality`
  ADD PRIMARY KEY (`QY_ID`),
  ADD KEY `bb` (`FT_ID`),
  ADD KEY `cc` (`ISP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shr_admin`
--
ALTER TABLE `shr_admin`
  MODIFY `AD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shr_breed`
--
ALTER TABLE `shr_breed`
  MODIFY `BRE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shr_foodtype`
--
ALTER TABLE `shr_foodtype`
  MODIFY `FT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shr_foodtypetran`
--
ALTER TABLE `shr_foodtypetran`
  MODIFY `FTT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shr_infoshrimp`
--
ALTER TABLE `shr_infoshrimp`
  MODIFY `ISP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shr_moneylist`
--
ALTER TABLE `shr_moneylist`
  MODIFY `ML_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `shr_pond`
--
ALTER TABLE `shr_pond`
  MODIFY `PON_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shr_quality`
--
ALTER TABLE `shr_quality`
  MODIFY `QY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shr_foodtypetran`
--
ALTER TABLE `shr_foodtypetran`
  ADD CONSTRAINT `cccf` FOREIGN KEY (`FT_ID`) REFERENCES `shr_foodtype` (`FT_ID`);

--
-- Constraints for table `shr_infoshrimp`
--
ALTER TABLE `shr_infoshrimp`
  ADD CONSTRAINT `a` FOREIGN KEY (`PON_ID`) REFERENCES `shr_pond` (`PON_ID`),
  ADD CONSTRAINT `b` FOREIGN KEY (`BRE_ID`) REFERENCES `shr_breed` (`BRE_ID`);

--
-- Constraints for table `shr_moneylist`
--
ALTER TABLE `shr_moneylist`
  ADD CONSTRAINT `vv` FOREIGN KEY (`ISP_ID`) REFERENCES `shr_infoshrimp` (`ISP_ID`);

--
-- Constraints for table `shr_quality`
--
ALTER TABLE `shr_quality`
  ADD CONSTRAINT `bb` FOREIGN KEY (`FT_ID`) REFERENCES `shr_foodtype` (`FT_ID`),
  ADD CONSTRAINT `cc` FOREIGN KEY (`ISP_ID`) REFERENCES `shr_infoshrimp` (`ISP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
