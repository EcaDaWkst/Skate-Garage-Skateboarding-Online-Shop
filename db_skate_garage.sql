-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 10:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skate_garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Adult', 'For ages 18 and above.'),
(2, 'Teen', 'For ages below 18 and more than 12.'),
(3, 'Kids', 'For ages below 12.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(4, 'Arvin Dwight Corpuz', 'arvindwightcorpuz@gmail.com', 'corpuz', 'Philippines', 'Zamboanga City', '0987654321', 'Tugbungan', 'corpuz.jpg', '::1'),
(5, 'Joylyn Cubile', 'joylyncubile@gmail.com', 'cubile', 'Philippines', 'Zamboanga City', '0987654321', 'Tumaga', 'joylyn.png', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 4, 121, 616256572, 1, 'Small', '2019-01-03', 'Complete'),
(2, 4, 211, 616256572, 1, 'Small', '2019-01-03', 'pending'),
(3, 4, 99, 616256572, 1, 'Small', '2019-01-03', 'pending'),
(4, 5, 490, 1057592984, 5, 'Medium', '2019-01-04', 'pending'),
(5, 5, 450, 1057592984, 5, 'Medium', '2019-01-04', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(1, 616256572, 121, 'Western Union', 333321, 111232, '01/03/2019');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(1, 4, 616256572, '2', 1, 'Small', 'Complete'),
(2, 4, 616256572, '6', 1, 'Small', 'pending'),
(3, 4, 616256572, '16', 1, 'Small', 'pending'),
(4, 5, 1057592984, '14', 5, 'Medium', 'pending'),
(5, 5, 1057592984, '15', 5, 'Medium', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_keywords`, `product_desc`) VALUES
(1, 1, 1, '2022-03-31 20:24:52', 'Amo\'s Skateboard', 'product-1-a.jpg', 'product-1-b.jpg', 'product-1-c.jpg', 999, 'Blue', '<p>Amo\'s Skateboard is very cool with blue and black finish.</p>'),
(2, 1, 2, '2022-03-31 20:26:29', 'Aquila Favonia Skateboard', 'product-2-a.jpg', 'product-2-b.jpg', 'product-2-c.jpg', 999, 'White', '<p>Aquila Favonia Skateboard is very cool with white and black.</p>'),
(3, 1, 3, '2022-03-31 20:27:58', 'Engulfing Lightning Skateboard', 'product-3-a.jpg', 'product-3-b.jpg', 'product-3-c.jpg', 999, 'Green', '<p>Engulfing Lightning Skateboard is very cool with green and black finish.</p>'),
(4, 1, 1, '2022-03-31 20:29:20', 'Staff of Homa Skateboard', 'product-4-a.jpg', 'product-4-b.jpg', 'product-4-c.jpg', 999, 'White', '<p>Staff of Homa Skateboard is very cool with white and black finish.</p>'),
(5, 1, 2, '2022-03-31 20:30:35', 'Mistsplitter Reforged Skateboard', 'product-5-a.jpg', 'product-5-b.jpg', 'product-5-c.jpg', 999, 'Red', '<p>Mistsplitter Reforged Skateboard is very cool with red and black finish.</p>'),
(6, 1, 3, '2022-03-31 20:32:07', 'Song of Broken Pines Skateboard', 'product-6-a.jpg', 'product-6-b.jpg', 'product-6-c.jpg', 999, 'Brown', '<p>Song of Broken Pines Skateboard is very cool with brown and black finish.</p>'),
(7, 1, 1, '2022-03-31 20:33:59', 'Kagura\'s Verify Skateboard', 'product-7-a.jpg', 'product-7-b.jpg', 'product-7-c.jpg', 999, 'Yellow', '<p>Kagura\'s Verify Skateboard is very cool with yellow and black finish.</p>'),
(8, 1, 3, '2022-03-31 20:35:32', 'Wolf\'s Gravestone Skateboard', 'product-8-a.jpg', 'product-8-b.jpg', 'product-8-c.jpg', 999, 'Yellow', '<p>Wolf\'s Gravestone Skateboard is very cool with yellow and black finish.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Skateboards', 'a short narrow board with two small wheels fixed to the bottom of either end, on which (as a recreation or sport) a person can ride in a standing or crouching position, propelling themselves by occasionally pushing one foot against the ground.'),
(2, 'Helmets', 'a hard or padded protective hat, various types of which are worn by soldiers, police officers, firefighters, motorcyclists, athletes, and others..'),
(3, 'Accessories', 'This range of skate accessories includes safety helmets, elbow and knee protectors, skate gloves, wheels and more, so you are bound to find what you need. Make sure the young ones look the part too, in a pair of kid’s skate shoes.'),
(4, 'T-Shirts', 'a short-sleeved casual top, generally made of cotton, having the shape of a T when spread out flat.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'Slide number 1', 'slide-1.jpg'),
(2, 'Slide number 2', 'slide-2.jpg'),
(3, 'Slide number 3', 'slide-3.jpg'),
(4, 'Slide number 4', 'slide-4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
