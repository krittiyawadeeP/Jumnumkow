-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2026 at 04:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db25_049_ricepledging_07`
--

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `provinceId` int(11) NOT NULL,
  `provinceName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`provinceId`, `provinceName`) VALUES
(1, 'กรุงเทพมหานคร'),
(2, 'สมุทรปราการ'),
(3, 'นนทบุรี'),
(4, 'ปทุมธานี'),
(5, 'พระนครศรีอยุธยา'),
(6, 'อ่างทอง'),
(7, 'ลพบุรี'),
(8, 'สิงห์บุรี'),
(9, 'ชัยนาท'),
(10, 'สระบุรี'),
(11, 'ชลบุรี'),
(12, 'ระยอง'),
(13, 'จันทบุรี'),
(14, 'ตราด'),
(15, 'ฉะเชิงเทรา'),
(16, 'ปราจีนบุรี'),
(17, 'นครนายก'),
(18, 'สระแก้ว'),
(19, 'นครราชสีมา'),
(20, 'บุรีรัมย์'),
(21, 'สุรินทร์'),
(22, 'ศรีสะเกษ'),
(23, 'อุบลราชธานี'),
(24, 'ยโสธร'),
(25, 'ชัยภูมิ'),
(26, 'อำนาจเจริญ'),
(27, 'บึงกาฬ'),
(28, 'หนองบัวลำภู'),
(29, 'ขอนแก่น'),
(30, 'อุดรธานี'),
(31, 'เลย'),
(32, 'หนองคาย'),
(33, 'มหาสารคาม'),
(34, 'ร้อยเอ็ด'),
(35, 'กาฬสินธุ์'),
(36, 'สกลนคร'),
(37, 'นครพนม'),
(38, 'มุกดาหาร'),
(39, 'เชียงใหม่'),
(40, 'ลำพูน'),
(41, 'ลำปาง'),
(42, 'อุตรดิตถ์'),
(43, 'แพร่'),
(44, 'น่าน'),
(45, 'พะเยา'),
(46, 'เชียงราย'),
(47, 'แม่ฮ่องสอน'),
(48, 'นครสวรรค์'),
(49, 'อุทัยธานี'),
(50, 'กำแพงเพชร'),
(51, 'ตาก'),
(52, 'สุโขทัย'),
(53, 'พิษณุโลก'),
(54, 'พิจิตร'),
(55, 'เพชรบูรณ์'),
(56, 'ราชบุรี'),
(57, 'กาญจนบุรี'),
(58, 'สุพรรณบุรี'),
(59, 'นครปฐม'),
(60, 'สมุทรสาคร'),
(61, 'สมุทรสงคราม'),
(62, 'เพชรบุรี'),
(63, 'ประจวบคีรีขันธ์'),
(64, 'นครศรีธรรมราช'),
(65, 'กระบี่'),
(66, 'พังงา'),
(67, 'ภูเก็ต'),
(68, 'สุราษฎร์ธานี'),
(69, 'ระนอง'),
(70, 'ชุมพร'),
(71, 'สงขลา'),
(72, 'สตูล'),
(73, 'ตรัง'),
(74, 'พัทลุง'),
(75, 'ปัตตานี'),
(76, 'ยะลา'),
(77, 'นราธิวาส');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`provinceId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `provinceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
