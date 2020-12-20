-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 10:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caterers`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `name`, `email`, `username`, `phone`, `password`) VALUES
(14, 'Priya ', 'p@gmail.com', '1927priya', 1234567890, '$2y$10$HGA8CzVgtlUpa1SL6NcjH.sAs3E/lKllnvhleHJzGOL/ie3qBeXgi'),
(18, 'smita', 's@gmail.com', 's12', 1111111111, '$2y$10$51i5adyB7vFtlWOB9WaX7u/RtHW/HYfb8EJiefrulzw.vwQrcWBHa'),
(22, 'krutika', 'k@gmail.com', 'kru', 2147483647, '$2y$10$IHwcCdng0qNoRZPDYXNo7e/lAYXMvAVRbfu9Gd4vik1uhyYm08nUm'),
(24, 'srushti', 'sru@gmail.com', 'sru', 5555555555, '$2y$10$uRU2lQMTT.stzynLS6Oyaevcizrpbz8Nmch4uKvF496c6SE3G3lKi'),
(25, 'divya', 'd@gmail.com', 'd123', 2222222222, '$2y$10$m4vRFCC1DVM6j6d28Js5uO57QpEiLEg.oVsWnH27dHWZkrkpdDjE2'),
(26, 'riya', 'r@gmail.com', 'riya1', 6666666666, '$2y$10$bv/.DEAn38akxXseF89kEea8FbjGMau6gg0y/EIkp6vBApYH.STTC'),
(27, 'gauri', 'g@gmail.com', 'g123', 7777777777, '$2y$10$ZXcUp5wnnjP47n0HviaNbOVdgW9f5yk8rHNWNkWn7dn2Sb9I42iZ.');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `dish_name` varchar(128) NOT NULL,
  `price` float NOT NULL,
  `category` varchar(128) NOT NULL,
  `is_veg` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`dish_name`, `price`, `category`, `is_veg`) VALUES
('Butter Chicken', 180, 'Main Course', 0),
('Chicken Fried Rice', 150, 'Main Course', 0),
('Chicken Manchurian', 180, 'Main Course', 0),
('Chicken Noodles', 150, 'Main Course', 0),
('Chocolate', 60, 'Ice Cream', 1),
('Coffee', 20, 'Beverages', 1),
('Gobi Manchurian', 150, 'Main Course', 1),
('Gulab Jamun', 50, 'Sweets', 1),
('Mango', 50, 'Ice Cream', 1),
('Orange Juice', 40, 'Beverages', 1),
('Paneer Masala', 150, 'Main Course', 1),
('Pineapple Juice', 50, 'Beverages', 1),
('Rasgulla', 50, 'Sweets', 1),
('Strawberry', 50, 'Ice Cream', 1),
('Tea', 15, 'Beverages', 1),
('Vanilla', 40, 'Ice Cream', 1),
('Veg Fried Rice', 120, 'Main Course', 1),
('Veg Noodles', 120, 'Main Course', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `is_veg` tinyint(1) NOT NULL,
  `image_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `is_veg`, `image_name`) VALUES
(1, 'Veg Fried Rice + Paneer + 1 Scoop of Ice-cream', 1, 'images/menu1.png'),
(2, 'Veg Noodles + Gobi Manchurian + 1 Scoop of Ice-cream', 1, 'images/menu2.png'),
(3, 'Chicken Fried Rice + Butter Chicken + 1 Scoop of Ice-cream', 0, 'images/menu3.png'),
(4, 'Chicken Noodles + Chicken Manchurian + 1 Scoop of Ice-cream', 0, 'images/menu4.png'),
(5, 'Veg Fried Rice + Chicken Manchurian + 1 Scoop of Ice-cream', 0, 'images/menu5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `menu_id` int(11) NOT NULL,
  `dish_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`menu_id`, `dish_name`) VALUES
(1, 'Paneer Masala'),
(1, 'Veg Fried Rice'),
(2, 'Gobi Manchurian'),
(2, 'Veg Noodles'),
(3, 'Butter Chicken'),
(3, 'Chicken Fried Rice'),
(4, 'Chicken Manchurian'),
(4, 'Chicken Noodles'),
(5, 'Chicken Manchurian'),
(5, 'Veg Fried Rice');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `venue` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `district` varchar(128) NOT NULL,
  `zip` int(11) NOT NULL,
  `payment_status` varchar(128) NOT NULL,
  `no_of_people` int(11) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `advance_amt` int(11) NOT NULL,
  `order_status` varchar(128) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `order_date`, `order_time`, `venue`, `city`, `district`, `zip`, `payment_status`, `no_of_people`, `total_amt`, `advance_amt`, `order_status`, `cust_id`) VALUES
(40, '2020-12-24', '11:00:00', 'Khorlim', 'Mapusa', 'North Goa', 403501, 'not paid', 20, 13800, 6900, 'not delivered', 18),
(41, '2020-12-22', '13:00:00', 'Socorro', 'porvorim', 'North Goa', 403501, 'not paid', 50, 37500, 18750, 'not delivered', 18);

-- --------------------------------------------------------

--
-- Table structure for table `selected_dishes`
--

CREATE TABLE `selected_dishes` (
  `order_id` int(11) NOT NULL,
  `dish_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `selected_dishes`
--

INSERT INTO `selected_dishes` (`order_id`, `dish_name`) VALUES
(40, 'Butter Chicken'),
(40, 'Chicken Fried Rice'),
(40, 'Gobi Manchurian'),
(40, 'Pineapple Juice'),
(40, 'Vanilla'),
(40, 'Veg Noodles'),
(41, 'Chicken Manchurian'),
(41, 'Chicken Noodles'),
(41, 'Gobi Manchurian'),
(41, 'Gulab Jamun'),
(41, 'Mango'),
(41, 'Pineapple Juice'),
(41, 'Veg Noodles');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`dish_name`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`menu_id`,`dish_name`),
  ADD KEY `fk_dishes` (`dish_name`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_cust_id` (`cust_id`);

--
-- Indexes for table `selected_dishes`
--
ALTER TABLE `selected_dishes`
  ADD PRIMARY KEY (`order_id`,`dish_name`),
  ADD KEY `dish_name` (`dish_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `fk_dishes` FOREIGN KEY (`dish_name`) REFERENCES `dishes` (`dish_name`),
  ADD CONSTRAINT `fk_menu` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_cust_id` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`);

--
-- Constraints for table `selected_dishes`
--
ALTER TABLE `selected_dishes`
  ADD CONSTRAINT `fk_selected_dishes` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`order_id`),
  ADD CONSTRAINT `selected_dishes_ibfk_1` FOREIGN KEY (`dish_name`) REFERENCES `dishes` (`dish_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
