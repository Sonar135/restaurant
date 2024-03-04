-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 03:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `total` int(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `seller` varchar(255) DEFAULT NULL,
  `buyer` varchar(255) DEFAULT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `seller` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `price`, `quantity`, `image`, `description`, `category`, `seller`) VALUES
(1, 'burger and fries', 12000, 40, 'istockphoto-495204032-612x612.jpg', 'burger and fries', 'fast foods ', 'kfc'),
(2, 'burger and fries deluxe', 13500, 65, 'istockphoto-1154731746-612x612.jpg', 'food', '', 'kfc'),
(3, 'hot and spicy wings', 16000, 44, 'KFC-Hot-and-Spicy-Wings-FT-BLOG0923-bcbfe79e54554f249c4bf246d09b1d98.jpg', 'food', 'fast foods ', 'kfc'),
(4, 'plate of chicken', 6000, 33, 'kfc-chicken.jpg', 'food\r\n', '', 'kfc'),
(5, 'medium drumsticks', 10000, 52, 'kfc-chicken.jpg', 'food', 'fast foods ', 'kfc'),
(6, 'springroll bonanza', 5700, 28, '0dc9a70462f8bda4e5d0563ad97fcb66515a44174231ef8e977ecf8fe3d9ec68_uhsjeR.jpg', 'food', 'fast foods ', 'kubo'),
(7, 'large puff puff', 5000, 186, '360_F_479700407_WHyAvNdeG9yGIjlzHgVclkpGOZ41aevo.jpg', 'food', 'fast foods ', 'kubo'),
(8, 'plate of springroll', 6000, 40, '360_F_429004893_0Y3UYCrn4mf2iYi4ASKAa10LBvSl32pt.jpg', 'food', 'fast foods ', 'kubo');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `seller` varchar(255) DEFAULT NULL,
  `buyer` varchar(255) DEFAULT NULL,
  `food_id` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `price`, `quantity`, `image`, `seller`, `buyer`, `food_id`, `date`, `status`) VALUES
(1, 'medium drumsticks', 10000, 1, 'kfc-chicken.jpg', 'kfc', 'vefidi135@gmail.com', '5', '2024-03-04 03:51:37', 'pending confirmation'),
(2, 'burger and fries', 12000, 2, 'istockphoto-495204032-612x612.jpg', 'kfc', 'vefidi135@gmail.com', '1', '2024-03-04 03:51:37', 'pending confirmation'),
(3, 'springroll bonanza', 5700, 3, '0dc9a70462f8bda4e5d0563ad97fcb66515a44174231ef8e977ecf8fe3d9ec68_uhsjeR.jpg', 'kubo', 'vefidi135@gmail.com', '6', '2024-03-04 03:51:37', 'pending confirmation'),
(4, 'hot and spicy wings', 16000, 1, 'KFC-Hot-and-Spicy-Wings-FT-BLOG0923-bcbfe79e54554f249c4bf246d09b1d98.jpg', 'kfc', 'vefidi135@gmail.com', '3', '2024-03-04 03:51:37', 'pending confirmation');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `phone`, `password`, `email`, `address`, `user_type`) VALUES
(1, 'kfc', 'vefidi135@gmail.com', '$2y$10$oA38IuAooC6dDJQOsjJKyue0rGzCiB0wUP/YiRIdZXVvZ0fxTnChu', 'vefidi135@gmail.com', NULL, 'restaurant'),
(2, 'kubo', 'vefidi135@gmail.com', '$2y$10$3O6nYXAPXEwc7/MiP5e/d.fRw1F.Dvc0kPPpE3iOGs.WPQPe3UsnK', 'vefidi135@gmail.com', NULL, 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `password`, `email`, `address`, `user_type`) VALUES
(1, 'Victor Efidi okechukwu', 'vefidi135@gmail.com', '$2y$10$s0u3UbQb8FjQYkzui/pReuFNBaEPny2ongwff88ikXJ2peV.HS9fi', 'vefidi135@gmail.com', NULL, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `total` int(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `buyer` varchar(255) DEFAULT NULL,
  `food_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
