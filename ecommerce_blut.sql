-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 11:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_blut`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(255) NOT NULL,
  `password` varchar(12) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_registration`
--

CREATE TABLE `client_registration` (
  `client_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_registration`
--

INSERT INTO `client_registration` (`client_id`, `first_name`, `last_name`, `username`, `address`, `email`, `mobile`, `password`, `confirm_password`, `date_created`) VALUES
(1, 'Gars', '1', '2', '3', 'garry123@gmail.com', 5, '$2y$10$WAUaw4gVFkH2tlYeQx/Yx.WwaQN3MtESoBse.ZfyqohHKGiJrdUuC', '1', '2023-11-21 07:54:34'),
(2, 'Gars', '2', '3', 'Nayong Lourdes 213', 'garry123@gmail.com', 1, '$2y$10$dQF5CR2Jkh/lv9Kpe9u.G.PT7SPf4pNaX7Y6Yq4Til1mEIdfZIZB.', '2', '2023-11-23 05:53:25'),
(3, 'Garry', 'Gajultos', 'Garreeh', 'Nayong Lourdes 213', 'garry12333333@gmail.com', 123, '$2y$10$7eDEp6j1cNCbSCIYStN8WOAa7ngHtIY96hZAGAxX0T4aqI6V9Zm0y', '123', '2023-11-23 06:39:52'),
(4, 'Gars', '2', '3', '1', 'garry123@gmail.com', 1, '$2y$10$8g2cU19xmCccSTTh7/lQ8upOg7rw2Kazrh7J9fffQM4Xwk69mbWgu', '1', '2023-11-28 07:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_description`, `product_price`, `product_image_path`) VALUES
(1, '1', '23', '23', 44.00, './../../assets/img/products/f4283pvma 1.jpg'),
(2, '1', '1', '1', 1.00, './../../assets/img/products/c7881pvma 5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `client_registration`
--
ALTER TABLE `client_registration`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_registration`
--
ALTER TABLE `client_registration`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
