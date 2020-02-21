-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 02:32 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_signup`
--

CREATE TABLE `employee_signup` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirmpassword` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_signup`
--

INSERT INTO `employee_signup` (`user_id`, `name`, `email`, `phone`, `password`, `confirmpassword`, `photo`) VALUES
(16, 'SK. Ahamadh', 'ap@gmail.com', '8964747475', '123456', '123456', ''),
(18, 'Arnab Pal', 'arnab@gmail.com', '9875474748', 'arnab@1234', 'arnab@1234', ''),
(19, 'Priyanka Das', 'priyanka@hotmail.com', '7894585848', 'priyanka@1234', 'priyanka@1234', ''),
(25, 'Avani Pal', 'avani@gmail.com', '8964747475', '123456', '123456', ''),
(39, 'Sanjana Saha', 'sg@gmail.com', '8565858548', '123456', '123456', ''),
(40, 'SanjanaSaha', 'sg@gmail.com', '7890252545', '789456', '789456', ''),
(43, 'PravinGupta', 'pravin@gmail.com', '9875484875', 'pravin@12345', 'pravin@12345', ''),
(44, 'AjaySharma', 'ajay@gmail.com', '8497958586', '884936bb149744d770352559b3fb3944', 'ajay@1234', ''),
(45, 'MaliniChopra', 'malini@gmail.com', '9875484758', 'f1aaabdc4d2ac7706640ae5e4f235c00', 'malini@1234', ''),
(47, 'NitaAmbani', 'nita@gmail.com', '6985748574', '1c914211953cab42ef1cd88e0f7afa4c', 'nita@1234', ''),
(48, 'ShobrajDutta', 'subha@gmail.com', '6458475847', 'c8abe846135d35413c47023d796aea1a', 'subha@gmail.com', ''),
(53, 'KinjalSingah', 'ajay@gmail.com', '7894585848', 'e10adc3949ba59abbe56e057f20f883e', '', ''),
(57, 'SanjanaSaha', 'sg@gmail.com', '8964747475', 'e10adc3949ba59abbe56e057f20f883e', '', ''),
(58, 'SanjanaSaha', 'sg@gmail.com', '8964747475', 'e10adc3949ba59abbe56e057f20f883e', '', ''),
(59, 'SanjanaSaha', 'sg@gmail.com', '8964747475', 'e10adc3949ba59abbe56e057f20f883e', '123456', ''),
(60, 'SrijitaGupta', 'srijita@gmail.com', '9875484758', 'dbaeca38206839261d98987191e36199', 'srijita@1234', ''),
(61, 'SanjanaSaha', 'sg@gmail.com', '8964747475', '2ff62b3c11a14bf5ec0790b82c11de8d', 'pass@1234', ''),
(62, 'SaumayaTandan', 'saumaya@yahoo.com', '9658584758', '9fee47e7723bd46671fc219b758ce846', 'saumaya@1234', ''),
(64, 'SK.Ahamadh', 'arnab@gmail.com', '9875484758', 'e10adc3949ba59abbe56e057f20f883e', '123456', ''),
(71, 'SanjanaSaha', 'sg@gmail.com', '8964747475', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'images/Sidewalk-Contractor-4.jpg'),
(72, 'SanjanaSaha', 'sg@gmail.com', '8964747475', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'images/Sidewalk-Contractor-5.jpg'),
(73, 'SanjanaSaha', 'sg@gmail.com', '8964747475', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Sidewalk-Contractor-2.jpg'),
(74, 'SugandhaSharma', 'sugandha@yahoo.com', '9875484875', '09933a15e7a17707fe68bbd27e4373f4', 'sugandha@1234', 'Sidewalk-Contractor-1.jpg'),
(75, 'SanjanaSaha', 'sg@gmail.com', '8964747475', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'womeninphilanthropy.jpg'),
(76, 'SanjanaSaha', 'sg@gmail.com', '8964747475', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'credit-client.png'),
(77, 'SK.Ahamadh', 'ap@gmail.com', '9875474748', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'client-manager.jpg'),
(78, 'KinjalSingah', 'pravin@gmail.com', '9875484875', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'images.jpg'),
(79, 'SanjanaSaha', 'arnab@gmail.com', '9875474748', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'womeninphilanthropy.jpg'),
(80, 'KinjalSingah', 'saumaya@yahoo.com', '7894585848', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Sidewalk-Contractor-1.jpg'),
(81, 'SanjanaSaha', 'arnab@gmail.com', '9875484758', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Sidewalk-Contractor-1.jpg'),
(82, 'Srijita', 'srijita@gmail.com', '8951457583', '0389d2640c2ccd275db66604f14d453f', 'sriji@123', 'credit-client.png'),
(83, 'Milan', 'milan@yahoo.com', '7894585848', '15c05acbe93db922855e5f0843b76d8b', 'milan@1234', 'client-manager.jpg'),
(84, 'Vishal', 'vishal@yahoo.com', '8965474758', '53c7812cd315994919c376c8c04e22c8', 'vishal@1234', 'admin.png.png'),
(85, 'Sujata', 'sujata@gmail.com', '9875484758', '5af79718257b3a7c4a21f1c77072570e', 'sujata@123', 'nat.jpg'),
(86, 'Rajiv', 'rajiv@gmail.com', '7890226655', '4bb59efefb49415cac0b19836889eaf0', 'rajiv1234', 'e10.jpg'),
(87, 'Amar', 'amar@gmail.com', '8975845847', '25f9e794323b453885f5181f1b624d0b', '123456789', '5d7f63aa2faf0.jpg'),
(88, 'Amar', 'amar@gmail.com', '8975845847', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(89, 'Amar', 'amar@gmail.com', '8975845847', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(90, 'Amar', 'amar@gmail.com', '7894585848', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(91, 'Amar', 'amar@gmail.com', '9875484875', 'e10adc3949ba59abbe56e057f20f883e', '123456', ''),
(92, 'Amar', 'amar@gmail.com', '9875474748', 'e10adc3949ba59abbe56e057f20f883e', '123456', '5d7f63aa2faf0.jpg'),
(93, 'SanjanaSaha', 'amar@gmail.com', '8964747475', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'e6.jpg'),
(94, 'ArnabPal', 'amar@gmail.com', '9875484758', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'e10.jpg'),
(95, 'SanjanaSaha', 'amar@gmail.com', '8964747475', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'e10.jpg'),
(96, 'SanjanaSaha', 'amar@gmail.com', '9875474748', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'e5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_signup`
--
ALTER TABLE `employee_signup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_signup`
--
ALTER TABLE `employee_signup`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
