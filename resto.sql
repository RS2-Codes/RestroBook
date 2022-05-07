-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 11:57 PM
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
-- Database: `resto`
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

INSERT INTO `restaurant` (`restro_id`, `restro_category_id`, `restro_name`, `restro_desc`, `restro_image`, `restro_image_alt`, `restro_email`, `restro_address`, `restro_city_id`, `restro_pincode`, `restro_phone_no`, `restro_contact_no`, `restro_other_details`, `restro_table`) VALUES
(1, 1, 'Pancake 1', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'product_1.jpeg', 'First name', '', '', 0, 0, '0', '0', '', ''),
(2, 1, 'Janne Nahi denge tujhe', 'asdas \nasddasda\nsdasda\nsdasd', 'product_2.jpeg', 'asdasda adsd', '', '', 0, 0, '0', '0', '', ''),
(3, 2, 'ABC_123', 'Abc', 'abc.jpg', 'Working', '', '', 0, 0, '0', '0', '', ''),
(4, 2, '123', 'Kuch bhi keh raha', 'kuch_bhi.jpg', 'Jhooth bolta hai saala, jalta hai maderjaat', '', '', 0, 0, '0', '0', '', ''),
(5, 1, 'Chotki', 'Aukat ke baher', 'hero-bg.webp', 'Chotki Product', '', '', 0, 0, '0', '0', '', ''),
(6, 1, 'Product 2', 'asdasd as a', 'contact-bg.jpg', 'Chotki Product as', '', '', 0, 0, '0', '0', '', ''),
(7, 1, 'Chotki 2', 'asd adzxc cvfrg dfg', 'Product-Page.jpg', 'Chotki Product sd sa qw we er rt', '', '', 0, 0, '0', '0', '', ''),
(8, 1, 'Product a', 'we are the best', 'projected-openings_cover.png', 'Product 5', '', '', 0, 0, '0', '0', '', ''),
(9, 1, 'Chotki as as ad', 'a ds ', 'pic01.png', 'asd', '', '', 0, 0, '0', '0', '', ''),
(10, 4, 'Chotki as as ad', 'Batman ki photo hai ye', 'wallpapersden.com_76269-5120x2880.jpg', 'Batman', '', '', 0, 0, '0', '0', '', ''),
(11, 0, 'Siddhi Ka Adda', 'Aao khao pio mauj kerro', 'siddhi.jpg', 'Siddhi Restro', 'siddhi@gmail.com', 'Delhi Ki Hai Ye Bandi', 0, 202021, '10', '10', '', ''),
(13, 0, 'Chotku Ka Kamal', 'Tum toh bhad m hi jao', 'chotku.jpg', 'Chotku Restro', 'chotku@gmail.com', 'Allahabad Ki Hai Ye Bandi', 1, 202022, '10 number ka ', '10 number ka ', '', ''),
(14, 0, 'Chotku Ka Kamal 2', 'Tum toh bhad m hi jao 2', 'chotku2.jpg', 'Chotku Restro 2', 'chotku2@gmail.com', 'Allahabad 2', 1, 202021, '10 number ka ', '10 number ka ', '', ''),
(15, 0, 'Chotku Ka Kamal 3', 'Tum toh bhad m hi jao 3', 'chotku3.jpg', 'Chotku Restro 3', 'chotku3@gmail.com', 'Allahabad 3', 3, 202023, '10 number ka ', '10 number ka ', '', '');

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
(1, '', 'restro_user', '$2y$10$qiPFZppwLHjYQEf2CAsxjOZ4xrTXH5l8Av/f5eVUDIKMGAmXgIg2G', 'user', 0, '', 0);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
