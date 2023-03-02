-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 05:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `producttb`
--

CREATE TABLE `producttb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttb`
--

INSERT INTO `producttb` (`id`, `product_name`, `product_description`, `product_price`, `product_image`) VALUES
(1, 'AERONAUT 9000C COMBAT', 'Color : Blue/Red\r\nWeight : W3 (88±1G)\r\nBalance Point : 295 ±2MM.\r\nFlexibility : Medium', 5790, 'https://www.badmintonplaza.com/images/AYPP122-1D-A.jpg'),
(2, 'ASTROX 99 PRO ', 'ก้าน: แข็ง\r\nน้ำหนัก/ขนาดกริ๊ป: 3U (Ave.88g) G5 / 4U (Ave.83g) G5\r\nความตึงของเอ็น: 3U 21-29lbs / 4U 20-28lbs\r\nจุดสมดุล: หัวหนัก', 5365, 'https://www.badmintonplaza.com/images/AX99-PYX-CS-A.jpg'),
(3, 'ASTROX 88D PRO ', 'Flex: Stiff\r\nBalance : Head Heavy\r\nWeight/Grip Size : 4U (Ave.83g) G5, 3U (Ave.88g) G5\r\nString Tension : 3U: 21-29lbs, 4U: 20-28lbs', 5295, 'https://www.badmintonplaza.com/images/AX88D-PYX-CMGO-A.jpg'),
(4, 'THRUSTER K F CLAW LTD ', 'Length: 675 mm\r\nBalance: Head Heavy\r\nResponse Indicator:\r\nString tension: ≤31lbs(14kg)\r\nWeight / Grip Size : 4U/G5', 5390, 'https://www.badmintonplaza.com/images/TK-FC-A-A.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `producttb`
--
ALTER TABLE `producttb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `producttb`
--
ALTER TABLE `producttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
