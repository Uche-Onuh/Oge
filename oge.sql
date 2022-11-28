-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 12:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oge`
--

-- --------------------------------------------------------

--
-- Table structure for table `alt_img`
--

CREATE TABLE `alt_img` (
  `id` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `item_id` int(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alt_img`
--

INSERT INTO `alt_img` (`id`, `image`, `item_id`, `created_at`) VALUES
(1, 'DSC_2824.jpg', 1, '2022-11-12 10:27:46'),
(2, 'DSC_2825.jpg', 1, '2022-11-12 10:27:46'),
(3, 'DSC_2840.jpg', 1, '2022-11-12 10:27:46'),
(4, 'DSC_2851.jpg', 2, '2022-11-12 10:39:26'),
(5, 'DSC_2858(1).jpg', 2, '2022-11-12 10:39:26'),
(6, 'DSC_2875.jpg', 2, '2022-11-12 10:39:26'),
(7, 'DSC_2888.jpg', 3, '2022-11-12 10:39:59'),
(8, 'DSC_2890.jpg', 3, '2022-11-12 10:39:59'),
(9, 'DSC_2898.jpg', 3, '2022-11-12 10:39:59'),
(10, 'DSC_2911.jpg', 4, '2022-11-12 10:40:44'),
(11, 'DSC_2923.jpg', 4, '2022-11-12 10:40:44'),
(12, 'DSC_2932.jpg', 4, '2022-11-12 10:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `size` varchar(200) NOT NULL DEFAULT 'size 6',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`, `qty`, `size`, `created_at`) VALUES
(20, 2, 2, 1, '', '2022-11-26 07:30:57'),
(21, 2, 4, 1, '', '2022-11-26 07:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(200) NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(1, 'Dresses', 'Dresses', 'dressDressesDressesDressesDresses', 0, 0, '1666519378.jpg', 'Dresses', 'DressesDresses', 'DressesDressesDresses', '2022-10-23 10:02:58'),
(2, 'Jumpsuits', 'Jumpsuits', 'JumpsuitJumpsuitJumpsuitJumpsuit', 0, 0, '1666520571.jpg', 'Jumpsuits', 'JumpsuitJumpsuitJumpsuit', 'JumpsuitJumpsuitJumpsuit', '2022-10-23 10:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `whatsapp` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `shipping_address` mediumtext NOT NULL,
  `pcode` int(200) NOT NULL,
  `total_price` int(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_id` varchar(255) NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `reference` varchar(200) NOT NULL,
  `shipping` int(200) NOT NULL,
  `comments` varchar(260) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `first_name`, `surname`, `email`, `phone`, `whatsapp`, `state`, `shipping_address`, `pcode`, `total_price`, `status`, `payment_id`, `payment_status`, `reference`, `shipping`, `comments`, `created_at`) VALUES
(1, 'EXOCHOS982334', 2, 'onuh', 'uche', 'john@gmail.com', '9876568', '765678987', 'Lagos', 'tyhjkuyg', 1234, 110027, 3, 'PAYMENT264076568', 'Pending', '', 27, '', '2022-11-12 10:47:09'),
(2, 'EXOCHOS175734', 2, 'Onuh', 'Uche', 'john@gmail.com', '9876568', '43622728', 'Lagos', 'fhcadgldjbchkcd', 1234, 90027, 3, 'PAYMENT867076568', 'Pending', '', 27, '', '2022-11-12 11:04:56'),
(3, 'BYOGE423634', 2, 'uche', 'onuh', 'john@gmail.com', '9876568', '43622728', 'Lagos', 'tyhjkuyg', 1234, 172000, 0, 'PAYMENT373876568', 'Successful', '486230435', 2000, '', '2022-11-24 12:26:25'),
(4, 'BYOGE968034', 2, 'onuh', 'uche', 'john@gmail.com', '9876568', '43622728', 'USA', 'fhcadgldjbchkcd', 1234, 132600, 3, 'PAYMENT728076568', 'Pending', '', 42600, '', '2022-11-24 19:45:15'),
(5, 'BYOGE758434', 2, 'Onuh', 'Uche', 'john@gmail.com', '9876568', '43622728', 'Ebonyi', 'fhcadgldjbchkcd', 1234, 53000, 0, 'PAYMENT274276568', 'Pending', '', 3000, '', '2022-11-25 13:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(200) NOT NULL,
  `item_id` int(200) NOT NULL,
  `qty` int(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `qty`, `size`, `price`, `created_at`) VALUES
(1, 1, 3, 1, '', 60000, '2022-11-12 10:47:09'),
(2, 1, 1, 2, '', 25000, '2022-11-12 10:47:09'),
(3, 2, 2, 3, '', 30000, '2022-11-12 11:04:56'),
(4, 3, 3, 2, '', 60000, '2022-11-24 12:26:25'),
(5, 3, 1, 2, '', 25000, '2022-11-24 12:26:25'),
(6, 4, 2, 1, '', 30000, '2022-11-24 19:45:15'),
(7, 4, 3, 1, '', 60000, '2022-11-24 19:45:15'),
(8, 5, 1, 2, 'Size 8', 25000, '2022-11-25 13:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `item_price` int(11) NOT NULL,
  `discount_price` int(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `meta_description` mediumtext NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0,
  `meta_title` varchar(200) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `item_tags` mediumtext NOT NULL,
  `item_image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `category_id`, `item_name`, `item_brand`, `slug`, `small_description`, `description`, `item_price`, `discount_price`, `qty`, `status`, `meta_description`, `trending`, `meta_title`, `meta_keywords`, `item_tags`, `item_image`, `created_at`) VALUES
(1, 1, 'Black Patterned Dress', 'Oge by Oge', '12345', 'Black Patterned DressBlack Patterned DressBlack Patterned Dress', 'Black Patterned DressBlack Patterned DressBlack Patterned Dress', 25000, 25000, 1, 0, 'Black Patterned DressBlack Patterned DressBlack Patterned Dress', 1, 'Black Patterned Dress', 'Black Patterned DressBlack Patterned DressBlack Patterned Dress', 'Black Patterned DressBlack Patterned Dress', '1668248194.jpg', '2022-11-12 10:16:34'),
(2, 1, 'Red Pattern Dress', 'Oge by Oge', '45678', 'Red Pattern DressRed Pattern DressRed Pattern Dress', 'Red Pattern DressRed Pattern DressRed Pattern DressRed Pattern Dress', 30000, 30000, 1, 0, 'Red Pattern DressRed Pattern DressRed Pattern DressRed Pattern Dress', 0, 'Red Pattern Dress', 'Red Pattern DressRed Pattern DressRed Pattern DressRed Pattern DressRed Pattern Dress', 'Red Pattern DressRed Pattern DressRed Pattern Dress', '1668249307.jpg', '2022-11-12 10:35:07'),
(3, 1, 'Black Dinner dress', 'Oge by Oge', '0987', 'Black Dinner dressBlack Dinner dressBlack Dinner dress', 'Black Dinner dressBlack Dinner dressBlack Dinner dress', 60000, 60000, 1, 0, 'Black Dinner dressBlack Dinner dressBlack Dinner dress', 1, 'Black Dinner dress', 'Black Dinner dressBlack Dinner dressBlack Dinner dress', 'Black Dinner dressBlack Dinner dressBlack Dinner dress', '1668249403.jpg', '2022-11-12 10:36:43'),
(4, 1, 'Fancy pink dress', 'Oge by Oge', '456544', 'Fancy pink dressFancy pink dressFancy pink dress', 'Fancy pink dressFancy pink dressFancy pink dressFancy pink dressFancy pink dress', 90000, 92000, 2, 0, 'Fancy pink dressFancy pink dressFancy pink dressFancy pink dressFancy pink dressFancy pink dressFancy pink dressFancy pink dress', 0, 'Fancy pink dress', 'Fancy pink dressFancy pink dressFancy pink dressFancy pink dressFancy pink dress', 'Fancy pink dressFancy pink dressFancy pink dress', '1668249510.jpg', '2022-11-12 10:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `sales_statistics`
--

CREATE TABLE `sales_statistics` (
  `id` int(200) NOT NULL,
  `total_sales` int(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `year` int(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `verified`, `password`, `role_as`, `token`, `created_at`) VALUES
(1, 'Uche', 'onuhblaze@gmail.com', 0, '$2y$10$gKxmxt6TWngYEMAGWa.oXeT997UazSxAoLeEBQLnPuXnKK25kwkKu', 0, '4fbcae77b07ffdcfe2d9db5baa7e79b620913354b410ae3c14dca6607cd5df84fab85d1472517c7f8416163d3e1f54c14e13', '2022-10-22 10:31:31'),
(2, 'John', 'john@gmail.com', 0, '$2y$10$OqK0ip02Sx/GCh9aIi.owelBISGVWWkeiBPGpslLh25Mxp5DT8yNy', 1, 'f9d173feb5260ea82ec8462ca64c51169282dbc4d7f942ce4079f105a59d1b59e458e437c6848ba17a906f80101486157039', '2022-10-22 10:52:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alt_img`
--
ALTER TABLE `alt_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `sales_statistics`
--
ALTER TABLE `sales_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alt_img`
--
ALTER TABLE `alt_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_statistics`
--
ALTER TABLE `sales_statistics`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
