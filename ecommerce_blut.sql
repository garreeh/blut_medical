-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 03:52 PM
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
(8, 'Garry', 'Gajultos', 'garreeh', '1 Blk 3 Lot 21', 'gajultos.garry123@gmail.com', 2147483647, '$2y$10$6d9J8VNfQBEd/wLk.V2/R.17tuIfTuWIWmEDoeIdbgknZMTmhEarC', '1234', '2023-11-22 03:49:29'),
(9, 'Test', 'Sample', 'test', 'Sample address', 'test@sample.com', 2147483647, '$2y$10$TQ6v/JASaeaKWNF.qWl7cuwbsbR2eIUetghwmpkHgHC/MkZtvlGGC', 'test123', '2023-11-22 09:07:12'),
(10, 'Test', 'Sample', 'test', 'test address', 'test@gmail.com', 2147483647, '$2y$10$AhZyFCChYHwf8xUtxYVFr.IwLI0lgMADPJssBJ6RrHGZkdPoZeqpe', 'test123', '2023-11-24 08:46:26'),
(11, 'Garry', 'Gajultos', 'gaaars', '1 Blk 3 Lot 21', 'gajultos.garry123@gmail.com', 2147483647, '$2y$10$.Nwgf4.nGSujbX.R945AI.xf70ARPcMxGpBRVHHBz7iuR9RQRgFgu', '123', '2023-11-29 05:25:21'),
(12, 'Garry', 'Gajultos', 'admin', '1 Blk 3 Lot 21', 'gajultos.garry123@gmail.com', 2147483647, '$2y$10$8/gs.UXx3BeEsRglpyzvIubCYU5uN13qoUs6fSphDcwntnQd3spl.', '123', '2023-12-01 19:34:42'),
(13, 'dec2', 'dec2', 'december', '1 Blk 3 Lot 21', 'gajultos.garry123@gmail.com', 2147483647, '$2y$10$iM3m896nE86VOOIgY6gO0.PmglqAgNCBVrMPfuzLw6MUgud/MskyG', '123', '2023-12-01 19:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status` enum('on_cart','on_checkout','on_deliver') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `client_id`, `product_id`, `status`, `created_at`) VALUES
(50, 8, 44, 'on_cart', '2023-12-03 13:32:43'),
(51, 8, 44, 'on_cart', '2023-12-03 13:34:42'),
(52, 8, 45, 'on_cart', '2023-12-03 13:37:12'),
(53, 9, 45, 'on_cart', '2023-12-03 13:38:07');

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
  `product_qty` int(255) NOT NULL,
  `product_image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_description`, `product_price`, `product_qty`, `product_image_path`) VALUES
(44, '1', 'Hematology', 'Great Product', 50000.00, 96, './../../assets/img/products/d95c4hematology.png'),
(45, '2', 'Electronic Analyzer', 'Great Product Second', 60000.00, 11, './../../assets/img/products/f7668electronicanalyzer.png'),
(46, '3', 'Dry Serum Chem', 'Great', 40000.00, 5, './../../assets/img/products/d5672dryserumchem.png'),
(47, '4', 'Serum Chem', 'Just a Sample Product', 7000.00, 5, './../../assets/img/products/4c1d8serumchem.png'),
(48, '5', '4', '3', 2.00, 3, './../../assets/img/products/97558favicon.ico');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_registration`
--
ALTER TABLE `client_registration`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_registration`
--
ALTER TABLE `client_registration`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_registration` (`client_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
