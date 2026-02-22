-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Generation Time: Dec 09, 2025 at 02:32 AM
-- Server version: 12.1.2-MariaDB-ubu2404
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address_no` varchar(50) DEFAULT NULL,
  `moo` varchar(10) DEFAULT NULL,
  `soi` varchar(100) DEFAULT NULL,
  `road` varchar(100) DEFAULT NULL,
  `subdistrict` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `nickname`, `phone`, `dob`, `address_no`, `moo`, `soi`, `road`, `subdistrict`, `district`, `province`, `zipcode`, `email`) VALUES
(1, 'สมชาย', 'ใจดี', 'ชาย', '0812345678', '1990-05-15', '123/4', '1', 'สุขุมวิท 10', 'สุขุมวิท', 'คลองเตย', 'คลองเตย', 'กรุงเทพมหานคร', '10110', 'somchai@example.com'),
(2, 'สมหญิง', 'รักดี', 'หญิง', '0898765432', '1992-08-20', '45/6', '2', 'ลาดพร้าว 12', 'ลาดพร้าว', 'จอมพล', 'จตุจักร', 'กรุงเทพมหานคร', '10900', 'somying@example.com'),
(3, 'วิชัย', 'รุ่งเรือง', 'ชัย', '0861112222', '1985-11-10', '789/1', '3', 'พหลโยธิน 24', 'พหลโยธิน', 'จันทรเกษม', 'จตุจักร', 'กรุงเทพมหานคร', '10900', 'wichai@example.com'),
(4, 'มานี', 'พาที', 'นี', '0813334444', '1988-03-25', '12/34', '4', 'สีลม 5', 'สีลม', 'สีลม', 'บางรัก', 'กรุงเทพมหานคร', '10500', 'manee@example.com'),
(5, 'ปิติ', 'ปีติ', 'ติ', '0895556666', '1995-12-05', '56/78', '5', 'สุขุมวิท 39', 'สุขุมวิท', 'คลองตันเหนือ', 'วัฒนา', 'กรุงเทพมหานคร', '10110', 'piti@example.com'),
(6, 'ชูใจ', 'จริงใจ', 'ใจ', '0867778888', '1990-09-15', '90/12', '6', 'อารีย์ 2', 'พหลโยธิน', 'สามเสนใน', 'พญาไท', 'กรุงเทพมหานคร', '10400', 'choojai@example.com'),
(7, 'วีระ', 'ศิริ', 'วี', '0819990000', '1982-07-22', '34/56', '7', 'ทองหล่อ 13', 'สุขุมวิท', 'คลองตันเหนือ', 'วัฒนา', 'กรุงเทพมหานคร', '10110', 'weera@example.com'),
(8, 'เพ็ญศรี', 'มีทรัพย์', 'เพ็ญ', '0891113333', '1987-01-30', '78/90', '8', 'เอกมัย 10', 'สุขุมวิท', 'คลองตันเหนือ', 'วัฒนา', 'กรุงเทพมหานคร', '10110', 'pensri@example.com'),
(9, 'บุญธรรม', 'ทำดี', 'ธรรม', '0862224444', '1993-04-18', '123/45', '9', 'นิมมาน 13', 'นิมมานเหมินท์', 'สุเทพ', 'เมืองเชียงใหม่', 'เชียงใหม่', '50200', 'boontham@example.com'),
(10, 'สุดา', 'งามตา', 'ดา', '0814446666', '1991-10-12', '67/89', '10', 'ข้าวสาร', 'ตานี', 'ตลาดยอด', 'พระนคร', 'กรุงเทพมหานคร', '10200', 'suda@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
