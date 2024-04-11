-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2024 at 05:13 PM
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
  `ISP_ENDPRICEKG` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ข้อมูลลงกุ้งแต่ละครั้ง';

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
  `ML_STAMP` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ML_AMOUNT` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'บ่อ 1', '2024-04-11 14:31:28', NULL, NULL);

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
  MODIFY `FT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shr_foodtypetran`
--
ALTER TABLE `shr_foodtypetran`
  MODIFY `FTT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shr_infoshrimp`
--
ALTER TABLE `shr_infoshrimp`
  MODIFY `ISP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shr_moneylist`
--
ALTER TABLE `shr_moneylist`
  MODIFY `ML_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shr_pond`
--
ALTER TABLE `shr_pond`
  MODIFY `PON_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shr_quality`
--
ALTER TABLE `shr_quality`
  MODIFY `QY_ID` int(11) NOT NULL AUTO_INCREMENT;

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
