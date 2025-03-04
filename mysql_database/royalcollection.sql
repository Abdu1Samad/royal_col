-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 01:27 PM
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
-- Database: `royalcollection`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qunatity` int(11) DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `qunatity`, `added_at`) VALUES
(3, 22, 19, 7, '2025-03-02 20:34:59'),
(4, 22, 17, 4, '2025-03-02 20:38:20'),
(8, 22, 18, 10, '2025-03-03 19:22:35'),
(9, 22, 22, 2, '2025-03-03 20:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `F_name` varchar(255) NOT NULL,
  `L_name` varchar(255) NOT NULL,
  `Company_name` varchar(255) DEFAULT NULL,
  `Adress` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Postcode` int(11) NOT NULL,
  `Phone_no` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `F_name`, `L_name`, `Company_name`, `Adress`, `City`, `Country`, `Postcode`, `Phone_no`, `Email`, `user_id`, `total_price`, `order_date`) VALUES
(25, '', '', '', '', '', '', 0, 0, '', 22, 1450, '2025-03-04 16:53:12'),
(26, '', '', '', '', '', '', 0, 0, '', 22, 2500, '2025-03-04 16:53:25'),
(27, '', '', '', '', '', '', 0, 0, '', 22, 2500, '2025-03-04 17:05:58'),
(28, '', '', '', '', '', '', 0, 0, '', 22, 2500, '2025-03-04 17:06:20'),
(29, '', '', '', '', '', '', 0, 0, '', 22, 2500, '2025-03-04 17:10:41'),
(30, '', '', '', '', '', '', 0, 0, '', 22, 2500, '2025-03-04 17:13:53'),
(31, 'sam', 'sam', 'sam', 'sam', 'sam', 'AZAD KASHMIR', 78974, 2147483647, 'sam@gmail.com', 22, 2500, '2025-03-04 17:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price`, `total_price`) VALUES
(28, 25, 19, 1, 1450.00, 1450.00),
(29, 26, 18, 1, 2500.00, 2500.00),
(30, 27, 18, 1, 2500.00, 2500.00),
(31, 28, 18, 1, 2500.00, 2500.00),
(32, 29, 18, 1, 2500.00, 2500.00),
(33, 30, 18, 1, 2500.00, 2500.00),
(34, 31, 18, 1, 2500.00, 2500.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_rating` varchar(255) DEFAULT NULL,
  `product_img` text DEFAULT NULL,
  `product-img-2` text NOT NULL,
  `product-img-3` text NOT NULL,
  `product-desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_rating`, `product_img`, `product-img-2`, `product-img-3`, `product-desc`) VALUES
(16, 'Mens Shalwar khameez', '3500', '4', 'uploads/male-shlawar-kurta-1.jpg', 'uploads/male-shlawar-kurta-1-type1.jpg', 'uploads/male-shlawar-kurta-1-type2.jpg', 'Men\'s salwar kameez is a traditional yet stylish outfit, ideal for any occasion. Its loose fit and breathable fabric ensure all-day comfort and elegance.'),
(17, 'Sport Shoes in men\'s', '4000', '5', 'uploads/shoes-1.jpg', 'uploads/shoes-1-type1.jpg', 'uploads/shoes-1-type2.jpg', 'Step into confidence with our premium shoes, designed for style, durability, and all-day comfort. Crafted from high-quality materials with expert craftsmanship, these shoes are perfect for any occasion—whether casual, formal, or sporty. Upgrade your footw'),
(18, 'Women\'s shalwar khameez', '2500', '4', 'uploads/female-shalwar-kurta-type2.jpg', 'uploads/female-shalwar-kurta-1.jpg', 'uploads/female-shalwar-kurta-type1.jpg', 'women\'s salwar kameez blends tradition with modern style. Made from high-quality fabrics with intricate designs, it\'s perfect for any occasion, from casual wear to festive celebrations.'),
(19, 'Stylish watch', '1450', '4', 'uploads/watch-1.jpg', 'uploads/watch-1-type1.jpg', 'uploads/watch-1-type2.jpg', 'This watch isn’t just for telling time; it’s a statement of your personality. With a stylish design and durable build, it’s the perfect choice for any occasion.'),
(20, 'ladies Stylish Bags', '2000', '4', 'uploads/purse-1.jpg', 'uploads/purse-1-type1.jpg', 'uploads/purse-1-type2.jpg', 'A stylish and practical purse that keeps your essentials organized while adding a touch of elegance to your look. Designed with high-quality materials, it\'s perfect for everyday use or special occasions.'),
(21, 'Yellow Shalwar Khameez', '3500', '4', 'uploads/male-shlawar-kurta-2.jpg', 'uploads/male-shlawar-kurta-2-type1.jpg', 'uploads/male-shlawar-kurta-2-type2.jpg', 'Yellow Shalwar kurta for men\'s in good quality'),
(22, 'Blue shalwar khameez', '4500', '5', 'uploads/female-shalwar-kurta-2.jpg', 'uploads/female-shalwar-kurta-2-type1.jpg', 'uploads/female-shalwar-kurta-2-type2.jpg', 'Female blue Shalwar khameez in eid Collection'),
(23, 'Sport shoes in black', '5000', '5', 'uploads/shoes-2.jpg', 'uploads/shoes-2-type1.jpg', 'uploads/shoes-2-type2.jpg', 'Soft material shoes for sports'),
(24, 'Every Ocassion bags for girls', '2800', '4', 'uploads/purse-2.jpg', 'uploads/purse-2-type1.jpg', 'uploads/purse-2-type2.jpg', 'Women\'s purse in multiple color design'),
(25, 'Brown color watch', '1200', '5', 'uploads/watch-2.jpg', 'uploads/watch-2-type1.jpg', 'uploads/watch-2-type2.jpg', 'Brown color watch for girls in eid collection');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `signup_id` int(11) NOT NULL,
  `signup_name` varchar(255) NOT NULL,
  `signup_email` varchar(255) NOT NULL,
  `signup_password` varchar(255) NOT NULL,
  `Confirm_password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`signup_id`, `signup_name`, `signup_email`, `signup_password`, `Confirm_password`, `role`) VALUES
(16, 'sam', 'sammadaltaf43@gmail.com', '123@', '123@', 'admin'),
(17, 'sam', 'sammadaltaf43@gmail.com', '123@', '123@', 'user'),
(18, 'sam', 'sammadaltaf43@gmail.com', '123@', '123@', 'user'),
(19, 'sam', 'sammadaltaf43@gmail.com', '123@', '123@', 'user'),
(20, 'sam', 'sammadaltaf43@gmail.com', '123@', '123@', 'user'),
(21, 'sam', 'sammadaltaf43@gmail.com', '123@', '123@', 'user'),
(22, 'sam', 'sam@gmail.com', '1111', '1111', 'user'),
(23, 'sam', 'sammadaltaf43@gmail.com', '123123123@', '123123123@', 'user'),
(24, 'sam', 'hey@gmail.com', '123123123@', '123123123@', 'user'),
(25, 'hh', 'hey@gmail.com', '123', '123', 'user'),
(26, 'hh', 'hey@gmail.com', '123', '123', 'user'),
(27, 'hh', 'hey@gmail.com', '123', '123', 'user'),
(28, 'hh', 'hey@gmail.com', '123', '123', 'user'),
(29, 'hh', 'hey@gmail.com', '123', '123', 'user'),
(30, 'hh', 'hey@gmail.com', '123', '123', 'user'),
(31, 'hh', 'hey@gmail.com', '123', '123', 'user'),
(32, 'hh', 'hey@gmail.com', '123', '123', 'user'),
(33, 'hh', 'hey@gmail.com', '123', '123', 'user'),
(34, 'hh', 'hey@gmail.com', '123', '123', 'user'),
(35, 'hh', 'hey@gmail.com', '11', '11', 'user'),
(36, 'hh', 'hey@gmail.com', '11', '11', 'user'),
(37, 'hh', 'hey@gmail.com', '11', '11', 'user'),
(38, 'hh', 'hey@gmail.com', '11', '11', 'user'),
(39, 'hh', 'hey@gmail.com', '11', '11', 'user'),
(40, 'sam', 'bismajawed30@gmail.com', '1234567@', '1234567@', 'user'),
(41, 'sam', 'bismajawed30@gmail.com', '1234567@', '1234567@', 'user'),
(42, 'sam', 'aaa@gmail.com', '12345678@', '12345678@', 'user'),
(43, 'sa', 'hey@gmail.com', '111', '111', 'user'),
(44, 'sa', 'hey@gmail.com', '111', '111', 'user'),
(45, 'sa', 'hey@gmail.com', '111', '111', 'user'),
(46, 'sa', 'hey@gmail.com', '111', '111', 'user'),
(47, 'sa', 'hey@gmail.com', '111', '111', 'user'),
(48, 'sa', 'hey@gmail.com', '111', '111', 'user'),
(49, 'sa', 'aaa@gmail.com', '123', '123', 'user'),
(50, 'sam', 'bismajawed30@gmail.com', '12345678@', '123456789@', 'user'),
(51, 'sam', 'bb@gmail.com', '12345678@', '12345678@', 'user'),
(52, 'sam', 'cc@gmail.com', '12345678@', '12345678@', 'user'),
(53, 'sam', 'dd@gmail.com', '1234567@', '1234567@', 'user'),
(54, 'sam', 'ff@gmail.com', '12345678@', '12345678@', 'user'),
(55, 'sa', 'bismajawed30@gmail.com', '123', '123', 'user'),
(56, 'sam', 'gg@gmail.com', '12345678', '1345678', 'user'),
(57, 'sam', 'gg@gmail.com', '12345678', '12345678', 'user'),
(58, 'sam', 'hh@gmail.com', '12345678', '12345678', 'user'),
(59, 'sam', 'jj@gmail.com', '12345678@', '12356778@', 'user'),
(60, 'sam', 'k@gmail.com', '12345678@', '12345678@', 'user'),
(61, 'sam', 'm@gmail.com', '11111111@', '11111111@', 'user'),
(62, 'sam', 'n@gmail.com', 'ssssssss@', 'ssssssss@', 'user'),
(63, 'sam', 'am@gmail.com', '11111111@', '11111111@', 'user'),
(64, 'Kaif', 'kaif@gmail.com', 'Hello123@', 'Hello123@', 'user'),
(65, 'Atiq', 'atiq@gmail.com', 'Atiq123@', 'Atiq123@', 'user'),
(66, 'Salman', 'salman@gmail.com', 'Salman123@', 'Salman123@', 'user'),
(67, 'Zarhan', 'zarhan@gmail.com', 'Zarhan123@', 'Zarhan123@', 'user'),
(68, 'Saad', 'saad@gmail.com', 'Saad123@', 'Saad123@', 'user'),
(69, 'wasay', 'wasay@gmail.com', 'Wasay123@', 'Wasay123@', 'user'),
(70, 'Abdul Samad', 'samadaltaf@gmail.com', 'Hello123@', 'Hello123@', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD UNIQUE KEY `order_id` (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`signup_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `signup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `signup` (`signup_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`Order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
