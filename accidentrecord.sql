-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 11:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accidentrecord`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(9) NOT NULL,
  `FName` varchar(100) NOT NULL,
  `LName` varchar(100) NOT NULL,
  `Sex` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Acc_Type` varchar(20) NOT NULL,
  `ad_username` varchar(200) NOT NULL,
  `ad_password` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `FName`, `LName`, `Sex`, `Phone`, `Email`, `Acc_Type`, `ad_username`, `ad_password`, `Status`) VALUES
(3, 'Tsegaw', 'Alemu', 'Male', '093200014', 'tse@gmail.com', 'Staff', 'Tse', 'tsi', 'active'),
(4, 'Zemzem', 'Dubale', 'female', '0986580190', 'zemu@gmail.com', 'Staff', 'Zem', 'zem', 'inactive'),
(6, 'Abebe', 'Alemu', 'Male', '0958102132', 'abe@gmail.com', 'Admin', 'Admin', 'admin', 'Active'),
(11, 'Gelila', 'Dubale', 'Female', '0956851020', 'yeshiwas2014@gmail.com', 'Staff', 'Geli', 'geli', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `name` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `id` int(100) NOT NULL,
  `email` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `mob` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `msg` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`name`, `id`, `email`, `mob`, `msg`) VALUES
('ayush', 1, 'ayush23@gmail.com', '155788945', 'send help on mg road'),
('dcdad', 5, 'xcsac', '51531513', 'hheellpp'),
('Ayenew', 8, 'dfuramo@gmail.com', '421215', 'ghfjhjbjn\r\ngfjhjk\r\nhfgj'),
('Dangerous Driving', 9, 'bunibun@gmail.com', '421215', 'bdfhgmbnmbmbn4hg\r\njhg\r\njhkhjkjhkjhk\r\ndvdgfghgfhgf\r\nwwqewe'),
('????? ??? ???? ?????? ???? ?????? ????Web Based Traffic Accident Management System for Hossana Town', 10, 'difufni@gmail.com', '421215', 'sgdhgfhnjbjnvmmbvmbvm\r\nkjmbnnmn\r\nkjhlkjl\r\nhkjkhjnbm'),
('Driving offences involving death', 11, 'cemo@gmail.com', '421215', 'ghtfgjjhmbnmnbkhhoiuty\r\nfdfhjkjk?\r\n'),
('', 12, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `r_id` int(9) NOT NULL,
  `type` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `place` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `dt` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `kill` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `wound` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `v_type` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `v_number` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `reason` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`r_id`, `type`, `place`, `dt`, `kill`, `wound`, `v_type`, `v_number`, `reason`) VALUES
(7, 'Major', 'Hossana', '2023-04-07', 'unknown', '10', 'Pickup', 'ET-87012', 'engine broken'),
(8, 'Minor', 'Awasa', '2023-04-07', 'sikar', '1', 'Truck', 'Et-71010', 'crossing the bridge'),
(9, 'Major', 'Gondar', '2023-04-08', 'unknown', '90', 'Truck', '745101', 'Flat Tire Bumb to electrict Post_1');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `t_id` int(9) NOT NULL,
  `type` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`t_id`, `type`) VALUES
(1, 'Major'),
(2, 'Minor');

-- --------------------------------------------------------

--
-- Table structure for table `v_type`
--

CREATE TABLE `v_type` (
  `v_id` int(9) NOT NULL,
  `v_type` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `v_type`
--

INSERT INTO `v_type` (`v_id`, `v_type`) VALUES
(1, 'Truck'),
(2, 'Bus'),
(3, 'Pickup'),
(4, 'Mini Van'),
(5, 'Car '),
(6, 'Auto'),
(7, 'Two Wheeler');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `v_type`
--
ALTER TABLE `v_type`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `r_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `t_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `v_type`
--
ALTER TABLE `v_type`
  MODIFY `v_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
