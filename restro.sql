-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 05:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restro`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Hematology'),
(2, 'BioChemistry'),
(3, 'Cancer Diagnosis'),
(4, 'Fungal Detection'),
(5, 'Molecular Diagnostic'),
(6, 'Hilla Lo Bhaiya'),
(7, 'Jai Hind');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restro_id` int(11) NOT NULL,
  `restro_category_id` int(11) NOT NULL,
  `restro_name` varchar(200) NOT NULL,
  `restro_desc` text NOT NULL,
  `restro_image` varchar(200) NOT NULL,
  `restro_image_alt` varchar(200) NOT NULL,
  `restro_tab_avl` int(200) NOT NULL,
  `restro_email` varchar(200) NOT NULL,
  `restro_address` text NOT NULL,
  `restro_city_id` int(11) NOT NULL,
  `restro_pincode` int(7) NOT NULL,
  `restro_phone_no` varchar(13) NOT NULL,
  `restro_contact_no` varchar(13) NOT NULL,
  `restro_other_details` text NOT NULL,
  `restro_table` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restro_id`, `restro_category_id`, `restro_name`, `restro_desc`, `restro_image`, `restro_image_alt`, `restro_tab_avl`, `restro_email`, `restro_address`, `restro_city_id`, `restro_pincode`, `restro_phone_no`, `restro_contact_no`, `restro_other_details`, `restro_table`) VALUES
(8, 1, 'Product a', 'we are the best', 'chotku.jpg', 'chotku.jpg', 2, '', '', 1, 0, '0', '0', '', ''),
(9, 1, 'Chotki as as ad', 'a ds ', 'chotku2.jpg', 'chotku2.jpg', 3, '', '', 2, 0, '0', '0', '', ''),
(10, 4, 'Chotki as as ad', 'Batman ki photo hai ye', 'chotku3.jpg', 'chotku3.jpg', 7, '', '', 3, 0, '0', '0', '', ''),
(11, 0, 'Siddhi Ka Adda', 'Aao khao pio mauj kerro', 'chotku2.jpg', 'chotku2.jpg', 11, 'siddhi@gmail.com', 'Delhi Ki Hai Ye Bandi', 1, 202021, '10', '10', '', ''),
(13, 0, 'Chotku Ka Kamal', 'Tum toh bhad m hi jao', 'chotku.jpg', 'chotku.jpg', 0, 'chotku@gmail.com', 'Allahabad Ki Hai Ye Bandi', 2, 202022, '10 number ka ', '10 number ka ', '', ''),
(14, 0, 'Chotku Ka Kamal 2', 'Tum toh bhad m hi jao 2', 'chotku2.jpg', 'chotku2.jpg', 6, 'chotku2@gmail.com', 'Allahabad 2', 3, 202021, '10 number ka ', '10 number ka ', '', ''),
(15, 0, 'Chotku Ka Kamal 3', 'Tum toh bhad m hi jao 3', 'chotku3.jpg', 'chotku3.jpg', 5, 'chotku3@gmail.com', 'Allahabad 3', 3, 202023, '10 number ka ', '10 number ka ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `restro_locations`
--

CREATE TABLE `restro_locations` (
  `restro_loc_id` int(11) NOT NULL,
  `restro_loc_city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restro_locations`
--

INSERT INTO `restro_locations` (`restro_loc_id`, `restro_loc_city_name`) VALUES
(1, 'Lucknow'),
(2, 'Delhi'),
(3, 'Unnao');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(251) NOT NULL,
  `role` varchar(200) NOT NULL DEFAULT 'user',
  `phone_no` int(13) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pincode` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `username`, `password`, `role`, `phone_no`, `address`, `pincode`) VALUES
(1, '', 'restro_user', '$2y$10$qiPFZppwLHjYQEf2CAsxjOZ4xrTXH5l8Av/f5eVUDIKMGAmXgIg2G', 'user', 0, '', 0),
(2, 'rhvsingh004@gmail.com', 'rhvsingh', '$2y$10$6L/y9HGMh6G5HQy4d4aQJ.jJWKkO1Qln6gOmEv8wJ1gUiMA1vf/1C', 'user', 0, '', 0),
(3, 'singhrajaharshvardhan004@gmail.com', 'asd', '$2y$10$UUZ74n6EphZgfquqUW6LQOTeq1T76Aiti0s2jcKZiJWU4Lt3gjYtC', 'user', 0, '', 0),
(4, 'as@gmail.com', 'san', '$2y$10$bX.ZoC2B2nXIJ08JtJX7AOpbzeFgLLAkuNa3fEipJ4pk3F.UUSr3u', 'user', 0, '', 0),
(5, 'raj@gmail.com', 'raj', '$2y$10$vuNaeFkpdeFzMRG1aDUydup2CKZjVHpXkIQkhOv8j0H2eGRrk1euC', 'user', 0, '', 0),
(6, 'siddhi@gmail.com', 'siddhi', '$2y$10$pdzBUBZtwgPvmgN8LQXHf.Ol2PHxh7OV5JsJjvIG42WTxXsqxHhu6', 'user', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_book`
--

CREATE TABLE `user_book` (
  `user_book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_restaurant_id` int(11) NOT NULL,
  `user_time` varchar(256) NOT NULL,
  `user_date` date NOT NULL,
  `user_phone` varchar(256) NOT NULL,
  `user_guest` int(11) NOT NULL,
  `soft_delete` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_book`
--

INSERT INTO `user_book` (`user_book_id`, `user_id`, `user_restaurant_id`, `user_time`, `user_date`, `user_phone`, `user_guest`, `soft_delete`) VALUES
(1, 2, 11, '5', '2022-05-24', '7777777777', 10, 'yes'),
(2, 2, 13, '5', '2022-05-12', '7777777777', 6, 'yes'),
(3, 2, 8, '6', '2022-05-18', '7777777777', 6, 'yes'),
(4, 118, 11, '6', '2022-05-14', '7777777777', 6, 'no'),
(5, 118, 11, '5', '2022-05-19', '7777777777', 8, 'no'),
(6, 118, 11, '6', '2022-06-01', '7777777777', 8, 'no'),
(7, 118, 11, '3', '2022-05-23', '7777777777', 6, 'no'),
(8, 2, 11, '3', '2022-05-25', '7777777777', 4, 'yes'),
(9, 2, 13, '4', '2022-05-18', '7777777777', 6, 'yes'),
(10, 2, 13, '5', '2022-06-01', '7777777777', 6, 'yes'),
(11, 2, 13, '3', '2022-05-19', '7777777777', 6, 'yes'),
(12, 2, 13, '5', '2022-05-26', '7777777777', 6, 'no'),
(13, 2, 13, '4', '2022-05-18', '7777777777', 6, 'no'),
(14, 2, 13, '8', '2022-05-26', '7777777777', 8, 'no'),
(15, 2, 13, '6', '2022-05-19', '7777777777', 8, 'yes'),
(16, 2, 13, '6', '2022-05-20', '7777777777', 6, 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restro_id`);

--
-- Indexes for table `restro_locations`
--
ALTER TABLE `restro_locations`
  ADD PRIMARY KEY (`restro_loc_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_book`
--
ALTER TABLE `user_book`
  ADD PRIMARY KEY (`user_book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `restro_locations`
--
ALTER TABLE `restro_locations`
  MODIFY `restro_loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_book`
--
ALTER TABLE `user_book`
  MODIFY `user_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
