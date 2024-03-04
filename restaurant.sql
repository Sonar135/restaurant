-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 07:10 PM
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
(3, 'hot and spicy wings', 16000, 43, 'KFC-Hot-and-Spicy-Wings-FT-BLOG0923-bcbfe79e54554f249c4bf246d09b1d98.jpg', 'food', 'fast foods ', 'kfc'),
(5, 'medium drumsticks', 10000, 52, 'kfc-chicken.jpg', 'food', 'fast foods ', 'kfc'),
(6, 'springroll bonanza', 5700, 28, '0dc9a70462f8bda4e5d0563ad97fcb66515a44174231ef8e977ecf8fe3d9ec68_uhsjeR.jpg', 'food', 'fast foods ', 'kubo'),
(7, 'large puff puff', 5000, 186, '360_F_479700407_WHyAvNdeG9yGIjlzHgVclkpGOZ41aevo.jpg', 'food', 'fast foods ', 'kubo'),
(8, 'plate of springroll', 6000, 40, '360_F_429004893_0Y3UYCrn4mf2iYi4ASKAa10LBvSl32pt.jpg', 'food', 'fast foods ', 'kubo'),
(9, 'amala and ewedu', 3000, 56, 'Amala-and-Ewedu.jpeg', 'food', 'local', 'bukka'),
(10, 'goat meat pepper soup', 3399, 46, 'atama_soup_40_3.1.1_326X580_40_3.1.1_326X580_40_3.1.1_326X580.jpg', 'food', 'local', 'bukka'),
(11, 'porridge yam', 3200, 55, 'Cold-weather.jpeg', 'food', 'local', 'bukka'),
(12, 'rice/turkey/plantain', 2500, 65, 'download.jpg', 'food', 'local', 'bukka'),
(13, 'ofada rice', 3000, 56, 'images-10.jpeg', 'food', 'local', 'bukka'),
(14, 'ewedu soup', 1400, 56, 'images-11-600x398.jpeg', 'food', 'local', 'bukka'),
(15, 'roasted plantain with sauce', 3000, 67, 'images-13-3.jpeg', 'food', 'local', 'bukka'),
(16, 'jollof rice large', 3400, 56, 'Jollof-Rice-with-Green-Onions.jpg', 'food', 'local', 'bukka'),
(17, 'roasted plantain with sauce', 3000, 67, 'images-13-3.jpeg', 'food', 'local', 'bukka'),
(18, 'amala and ewedu', 3000, 56, 'Amala-and-Ewedu.jpeg', 'food', 'local', 'bukka'),
(19, 'croquette (chin chin)', 2500, 76, 'pexels-keesha&#039;s-kitchen-13988870.jpg', 'food', 'local', 'bukka'),
(20, 'crab puff pastry', 2000, 45, 'Sausage-and-Chicken-Puffy-Pastry-Shells-2000-ac799f345d5a4820912ab13f51f693e8.webp', 'food', 'pastries ', 'bukka'),
(21, 'beef pot pies', 4300, 54, 'beef pot pies.webp', 'food', 'pastries ', 'takara'),
(22, 'Apricot Puff Pastry Galettes', 5000, 67, 'BF1E8A72-3F05-4788-B790-403F9B59FD9F_1_201_a.jpeg', 'food', 'pastries ', 'takara'),
(23, 'chicken caserole', 4580, 56, 'chicken caserole.webp', 'food', 'pastries ', 'takara'),
(24, 'chicken pot pie', 5400, 68, 'chicken pot pie.webp', 'food', '', 'takara'),
(25, 'cinamon rolls', 2000, 54, 'cinanamon rolls.webp', 'food', 'pastries ', 'takara'),
(26, 'puff christmas tree', 1200, 45, 'puff pastry christmas tree.webp', 'food', 'pastries ', 'takara'),
(27, 'puff pastry salmon', 3400, 65, 'puff pastry salmon.webp', 'food', 'pastries ', 'takara'),
(28, 'olive puffs', 2000, 54, 'olive puffs.webp', 'food', 'pastries ', 'takara'),
(29, 'parmesan stars', 3000, 78, 'parmesan stars.webp', 'food', 'pastries ', 'takara'),
(30, 'baceon/egg pastry', 4300, 65, 'puff-pastry-recipes-bacon-egg-cheese-pastry-65317651cfe7d.jpeg', 'food', 'pastries ', 'takara'),
(31, 'sausage and chicken puffs', 3000, 65, 'Sausage-and-Chicken-Puffy-Pastry-Shells-2000-ac799f345d5a4820912ab13f51f693e8.webp', 'food', 'pastries ', 'takara'),
(32, 'spinach rolls', 3580, 58, 'spinach rolls.webp', 'food', '', 'takara'),
(33, 'turkey a la king', 4890, 54, 'turkey a la king.webp', 'food', 'pastries ', 'takara');

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
(1, 'medium drumsticks', 10000, 1, 'kfc-chicken.jpg', 'kfc', 'vefidi13@gmail.com', '5', '2024-03-04 03:51:37', 'confirmed'),
(2, 'burger and fries', 12000, 2, 'istockphoto-495204032-612x612.jpg', 'kfc', 'vefidi13@gmail.com', '1', '2024-03-04 03:51:37', 'confirmed'),
(3, 'springroll bonanza', 5700, 3, '0dc9a70462f8bda4e5d0563ad97fcb66515a44174231ef8e977ecf8fe3d9ec68_uhsjeR.jpg', 'kubo', 'vefidi13@gmail.com', '6', '2024-03-04 03:51:37', 'pending confirmation'),
(4, 'hot and spicy wings', 16000, 1, 'KFC-Hot-and-Spicy-Wings-FT-BLOG0923-bcbfe79e54554f249c4bf246d09b1d98.jpg', 'kfc', 'vefidi13@gmail.com', '3', '2024-03-04 03:51:37', 'confirmed'),
(5, 'hot and spicy wings', 16000, 1, 'KFC-Hot-and-Spicy-Wings-FT-BLOG0923-bcbfe79e54554f249c4bf246d09b1d98.jpg', 'kfc', 'vefidi13@gmail.com', '3', '2024-03-04 09:37:43', 'pending confirmation');

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
(2, 'kubo', 'vefidi135@gmail.com', '$2y$10$3O6nYXAPXEwc7/MiP5e/d.fRw1F.Dvc0kPPpE3iOGs.WPQPe3UsnK', 'vefidi135@gmail.com', NULL, 'restaurant'),
(3, 'bukka', 'kfc', '$2y$10$Z6qk5wB9IAIc9vec2ddFg.ELg5YysmJdU5CM852chU7IyR5czI9lq', 'vefidi135@gmail.com', NULL, 'restaurant'),
(4, 'takara', 'vefidi13@gmail.com', '$2y$10$B/FabZ.1ZB2oc/zxaPz7SObnV3wpIy28maN8j.wrsRYjs/sDdwkpi', 'vefidi13@gmail.com', NULL, 'restaurant');

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
(1, 'Victor Efidi okechukwu', '08109495127', '$2y$10$s0u3UbQb8FjQYkzui/pReuFNBaEPny2ongwff88ikXJ2peV.HS9fi', 'vefidi13@gmail.com', 'samuel ajayi', 'user');

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
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `name`, `price`, `quantity`, `total`, `image`, `buyer`, `food_id`) VALUES
(15, 'burger and fries', 12000, NULL, NULL, 'istockphoto-495204032-612x612.jpg', 'vefidi13@gmail.com', '1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
