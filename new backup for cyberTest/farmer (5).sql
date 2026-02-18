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
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `idfarmer` int(11) NOT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `idBank` int(11) NOT NULL,
  `account_number` varchar(45) DEFAULT NULL,
  `limitPledge` int(11) DEFAULT NULL,
  `password` varchar(10) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `subdistrictId` int(11) DEFAULT NULL,
  `provinceId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`idfarmer`, `lastname`, `address`, `idBank`, `account_number`, `limitPledge`, `password`, `firstName`, `subdistrictId`, `provinceId`) VALUES
(1, 'ใจดี', '123 หมู่ 1', 1, '1233211234', 150000, 'pass1', 'สมชาย', 54, 18),
(2, 'รักธรรมชาติ', '45/2 ถ.กลาง', 2, '2345678901', 200000, 'pass2', 'สมหญิง', 54, 18),
(3, 'เกษตรไพศาล', '98 บ้านเหนือ', 3, '3456789012', 180000, 'pass3', 'มงคล', 54, 18),
(4, 'ชาวนา', '77 หมู่ 5', 1, '4567890123', 120000, 'pass4', 'สุดา', 54, 18),
(5, 'มีชัย', '11/1 ถ.ใหญ่', 2, '5678901234', 250000, 'pass5', 'ประเสริฐ', 54, 18),
(6, 'ชื่นใจ', '19/1 หมู่ 2', 3, '6655443322', 170000, 'pass6', 'สมพร', 54, 18),
(7, 'รุ่งเรือง', '345 หมู่ 8', 1, '6789012345', 160000, 'pass7', 'จินตนา', 141, 47),
(8, 'สุขสมบูรณ์', '222 ซ.เล็ก', 2, '7890123456', 300000, 'pass8', 'อำนวย', 141, 47),
(9, 'ปลูกฝัน', '60/3 บ้านใต้', 3, '8901234567', 100000, 'pass9', 'นารี', 141, 47),
(10, 'พืชผล', '15 ถ.มิตรภาพ', 1, '9012345678', 190000, 'pass10', 'พรชัย', 141, 47),
(11, 'ข้าวหอม', '88 หมู่ 10', 2, '1122334455', 220000, 'pass11', 'อารีรัตน์', 141, 47),
(12, 'เกษมสุข', '50/5 หมู่ 1', 3, '7766554433', 130000, 'pass12', 'มานะ', 141, 47),
(13, 'นาดี', '33/4 หมู่ 3', 1, '2233445566', 140000, 'pass13', 'บุญส่ง', 42, 14),
(14, 'มีนา', '101/9 หมู่ 2', 2, '3344556677', 175000, 'pass14', 'มานี', 42, 14),
(15, 'ขยันทำ', '20 หมู่ 7', 3, '4455667788', 280000, 'pass15', 'สมศักดิ์', 42, 14),
(16, 'ทุ่งทอง', '555 ซอย 1', 1, '5566778899', 110000, 'pass16', 'ประนอม', 42, 14),
(17, 'ปลูกเอง', '66 หมู่ 12', 2, '6677889900', 230000, 'pass17', 'ยุทธนา', 42, 14),
(18, 'รักแผ่นดิน', '44/4 หมู่ 5', 3, '9988776655', 205000, 'pass18', 'สุพจน์', 42, 14),
(19, 'แสงจันทร์', '99/9 หมู่ 4', 1, '7788990011', 195000, 'pass19', 'รัตนา', 89, 30),
(20, 'รวงข้าว', '888 บ้านใหม่', 2, '8899001122', 260000, 'pass20', 'เฉลิมชัย', 89, 30),
(21, 'ภาคภูมิ', '444 ถนนหลัก', 3, '9900112233', 135000, 'pass21', 'สุพรรณี', 89, 30),
(22, 'การเกษตร', '200 หมู่ 6', 1, '0011223344', 210000, 'pass22', 'บัญชา', 89, 30),
(23, 'พลอยงาม', '70/7 หมู่ 9', 2, '1029384756', 185000, 'pass23', 'อรุณี', 89, 30),
(24, 'พืชพันธุ์', '55/5 หมู่ 1', 3, '0099887766', 145000, 'pass24', 'พิชัย', 89, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`idfarmer`),
  ADD KEY `idBank` (`idBank`),
  ADD KEY `subdistrictId` (`subdistrictId`,`provinceId`),
  ADD KEY `subdistrictId_2` (`subdistrictId`,`provinceId`),
  ADD KEY `subdistrictId_3` (`subdistrictId`),
  ADD KEY `provinceId` (`provinceId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
