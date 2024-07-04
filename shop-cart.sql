-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 11:51 PM
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
-- Database: `shop-cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cartId` int(11) NOT NULL,
  `totalQuanatity` int(5) DEFAULT NULL,
  `totalPrice` int(10) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `cartActive` int(1) DEFAULT 1,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `orderId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cartId`, `totalQuanatity`, `totalPrice`, `createdAt`, `cartActive`, `userId`, `productId`, `orderId`) VALUES
(1, 1, 5000, '2024-07-04', 1, 1, 1, 1),
(2, 1, 10000, '2024-07-04', 1, 1, 2, 2),
(3, 1, 15000, '2024-07-04', 1, 1, 3, 3),
(4, 1, 5000, '2024-07-04', 1, 1, 1, 4),
(5, 1, 10000, '2024-07-04', 1, 1, 2, 5),
(6, 1, 15000, '2024-07-04', 1, 1, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `orderPrice` int(5) DEFAULT NULL,
  `ordeActive` int(1) DEFAULT 1,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `address`, `name`, `contact`, `orderPrice`, `ordeActive`, `userId`, `productId`) VALUES
(1, NULL, NULL, NULL, 5000, 0, 1, 1),
(2, NULL, NULL, NULL, 10000, 0, 1, 2),
(3, NULL, NULL, NULL, 15000, 0, 1, 3),
(4, NULL, NULL, NULL, 5000, 0, 1, 1),
(5, NULL, NULL, NULL, 10000, 0, 1, 2),
(6, NULL, NULL, NULL, 15000, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `imagePath` varchar(150) DEFAULT NULL,
  `productName` varchar(150) DEFAULT NULL,
  `storageCapacity` varchar(150) DEFAULT NULL,
  `numberOfSim` varchar(150) DEFAULT NULL,
  `realComaraResaluation` varchar(150) DEFAULT NULL,
  `dualSize` varchar(150) DEFAULT NULL,
  `price` int(5) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `imagePath`, `productName`, `storageCapacity`, `numberOfSim`, `realComaraResaluation`, `dualSize`, `price`, `userId`) VALUES
(1, './uploads_files/labtop x10.jpg', 'Laptop X10', '10 MB', '15 KB', '10 GB', '1.5 Inch', 5000, 1),
(2, './uploads_files/labtop x15.jpg', 'Laptop X11', '50 MB', '14 KB', '50 GB', '2.5 Inch', 10000, 1),
(3, './uploads_files/Laptop X11.jpg', 'Laptop Y10', '11 MB', '55 KB', '50 GB', '4.5 Inch', 15000, 1),
(4, './uploads_files/Laptop Y5.jpg', 'Laptop Y5', '30 MB', '55 KB', '44 GB', '4.5 Inch', 20000, 1),
(5, './uploads_files/Mobile Y5.jpg', 'Mobile Y5', '22 MB', '10 KB', '20 GB', '10.5 Inch', 20000, 1),
(6, './uploads_files/Mobile Y15.jpg', 'Mobile Y15', '20 MB', '33 KB', '14 GB', '3.5 Inch', 25000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `userName` varchar(200) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `email`, `password`, `userName`, `contact`, `address`, `image`) VALUES
(1, 'www@ahmed.gmail.com', '12345', 'Ahmed Elmasry', '01064907346', 'Cairo', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `carts_users` (`userId`),
  ADD KEY `carts_products` (`productId`),
  ADD KEY `carts_orders` (`orderId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `orders_users` (`userId`),
  ADD KEY `orders_products` (`productId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `products_users` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_orders` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_products` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_users` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_products` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_users` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_users` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
