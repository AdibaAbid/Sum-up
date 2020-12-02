-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 14, 2017 at 05:13 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_prod`
--

CREATE TABLE `tb_prod` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` decimal(6,0) NOT NULL,
  `prod_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prod`
--

INSERT INTO `tb_prod` (`prod_id`, `prod_name`, `prod_price`, `prod_img`) VALUES
(1, 'iphone', '7000', 'iphone.jpg'),
(2, 'samsung', '500', 'samsung.jpg'),
(3, 'vivo', '5700', 'vivo.jpg'),
(4, 'oppo', '8300', 'oppo.jpg'),
(5, 'alcatel', '6350', 'alcatel.jpg'),
(6, 'vivo', '7250', 'vivo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_prod`
--
ALTER TABLE `tb_prod`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_prod`
--
ALTER TABLE `tb_prod`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
