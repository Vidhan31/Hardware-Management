-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 01:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmc_sanitaryware2`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(10) NOT NULL,
  `client_name` varchar(30) NOT NULL,
  `client_email` varchar(30) NOT NULL,
  `client_password` varchar(20) NOT NULL,
  `client_mobile` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_email`, `client_password`, `client_mobile`) VALUES
(1, 'shri', 'shri@gmail.com', '11111', 7972750887);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_name` varchar(20) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_mobile` bigint(20) NOT NULL,
  `emp_email` varchar(30) NOT NULL,
  `emp_address` varchar(50) NOT NULL,
  `emp_salary` varchar(10) NOT NULL,
  `emp_join_date` date NOT NULL DEFAULT current_timestamp(),
  `emp_designation` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_name`, `emp_id`, `emp_mobile`, `emp_email`, `emp_address`, `emp_salary`, `emp_join_date`, `emp_designation`) VALUES
('Suresh Prabhu', 1, 1234567890, 'suresh@yahoo.com', 'India', '1234567890', '2022-03-02', 'Manager'),
('Ajay Shelke', 2, 1243658791, 'itisajay@hotmail.com', 'Pune, India', '21000', '2022-03-02', 'company employee'),
('Rahul ', 3, 987362774, 'rahul21@gmail.com', 'India', '40000', '2022-03-02', 'Project Leader');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `SrNo` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `feedback_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`SrNo`, `name`, `subject`, `email`, `comment`, `feedback_date`) VALUES
(4, 'pankaj sunil jagtap', 'kj', 'pankajsjagtap2210@gmail.com', 'jjj', '2022-03-03 08:39:07'),
(5, 'shri', 'gfdsa', 'shri@gmail.com', 'sdfghjuytreertyuhgfdfgh', '2022-03-04 08:25:44'),
(6, 'shri', 'fdsa', 's@gmail.com', 'asdfghh', '2022-03-04 09:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(25) NOT NULL,
  `order_price` int(20) NOT NULL,
  `order_payment_status` varchar(30) NOT NULL,
  `order_status` varchar(30) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `order_price`, `order_payment_status`, `order_status`, `order_date`, `order_quantity`) VALUES
(127, 20, 8, 70240, 'Done', 'In Progress', '2022-03-04 13:22:05', 4),
(128, 20, 8, 70240, 'In Progress', 'Pending', '2022-03-04 13:22:10', 4),
(129, 23, 9, 53970, 'Pending', 'In Progress', '2022-03-04 13:23:57', 3),
(130, 23, 7, 4600, '', '', '2022-03-04 13:31:04', 2),
(131, 20, 10, 773500, '', '', '2022-03-04 14:44:13', 7);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(30) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `product_color` varchar(30) DEFAULT NULL,
  `product_img` varchar(30) NOT NULL,
  `quantity` bigint(50) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `product_dimension` varchar(100) DEFAULT NULL,
  `product_weight` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `supplier_name`, `product_price`, `product_color`, `product_img`, `quantity`, `category_name`, `product_dimension`, `product_weight`) VALUES
(4, 'Pedestal Lavatory', 'Memoirs', 30770, 'White', 'basin4', 1, 'Basin', '', ''),
(5, 'Semi-recessed Lavatory', 'Forefront', 17800, 'White', 'basin5', 1, 'Basin Basin_Faucets', '', ''),
(6, 'Bath Spout Without Diverter', 'Taut', 2320, 'Polished Chrome', 'fluset1', 1, 'Basin_Faucets', '', ''),
(7, 'Industrial Handles', 'Components', 2300, 'Polished Chrome', 'fluset2', 1, 'Basin_Faucets', '', ''),
(8, 'Single Control Lavatory Faucet', 'Refinia', 17560, 'Polished Chrome', 'fluset3', 1, 'Basin_Faucets', '', ''),
(9, 'Wall Mount Single-control Basin Faucet Trim+valve', 'Aleo+', 17990, 'Brushed Bronze', 'fluset5', 1, 'Basin_Faucets', '', ''),
(10, 'Wall Hung Toilet With C3-230 Cleansing Seat', 'Veil', 110500, 'White', 'toilet_seat1', 1, 'Toilet_Seats', '', ''),
(11, 'Wall Hung Toilet With Quiet-close™ Seat And Cover', 'Patio', 9540, 'White', 'toilet_seat2', 1, 'Toilet_Seats', '', ''),
(12, 'One-piece Skirted Toilet 305 With Seat Cover', 'Adair', 19610, 'White', 'toilet_seat3', 1, 'Toilet_Seats Commercial_Products', '', ''),
(13, 'Square With Toilet Without seat', 'Span', 11500, 'White', 'toilet_seat4', 1, 'Toilet_Seats', NULL, NULL),
(14, 'Intelligent One-piece Toilet', 'veil', 605000, 'White', 'toilet_seat5', 1, 'Toilet_Seats', '', NULL),
(15, '1.7m Drop-in Acrylic BathTub', 'Ove', 42988, 'White With Orange Bath Pillow', 'bathtub1', 1, 'BathTubs', NULL, NULL),
(16, 'Round Drop-in BathTub', 'Evok', 45320, 'Pure White', 'bathtub2', 1, 'BathTubs', NULL, NULL),
(17, 'Acrylic Drop-in Bathtub', 'Duo', 32395, 'Pure White', 'bathtub3', 1, 'BathTubs', NULL, NULL),
(18, 'Round Urinal With Rear Inlet', 'Span', 13780, 'White', 'commertial1', 1, 'Commercial_Products', NULL, NULL),
(19, 'Soft-press Auto Closing Faucet', 'July', 3570, 'Polished Chrome', 'commertial2', 1, 'Commercial_Products Basin_Faucets', NULL, NULL),
(20, 'Urinal With Rear Inlet 0.5l With Accuflush', 'Bardon', 32230, 'White', 'commertial3', 1, 'Commercial_Products', NULL, NULL),
(21, 'Wall Mount Showerhead', 'Beitou', 56100, 'Polished Chrome', 'Showering1', 1, 'Showering', NULL, NULL),
(22, 'Showerhead', 'Coralais', 1300, 'Polished Chrome', 'Showering2', 1, 'Showering', NULL, NULL),
(23, '2.0 Gpm Single-function Handshower', 'Artifacts', 7500, 'Polished Chrome', 'Showering3', 1, 'Showering', NULL, NULL),
(24, '254mm Rainhead', 'Awaken', 21850, 'Matte Black', 'Showering4', 1, 'Showering', NULL, NULL),
(25, 'Bath Spout With Diverter', 'Taut', 3240, 'Polished Chrome', 'Showering5', 1, 'Showering', NULL, NULL),
(46, 'Vessel Without Faucet Hole', 'Veil', 17500, 'inner White', 'basin2', 0, 'Basin', NULL, NULL),
(49, 'Vessel Basin Without Faucet Hole', 'kankara', 20000, 'White', 'basin1', 0, 'Basin', NULL, NULL),
(50, 'Vessel Basin Without Faucet Hole', 'kankara', 20000, 'White', 'basin1', 0, 'Basin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(30) NOT NULL,
  `user_id` int(7) NOT NULL,
  `user_mobile` bigint(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_address` varchar(150) NOT NULL,
  `user_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `user_id`, `user_mobile`, `user_email`, `user_address`, `user_password`) VALUES
('shri', 18, 7972750887, 'shree@gmail.com', 'asdfg', '111111'),
('shrikei', 19, 2345671111, 'krishna@gmail.com', 'vasantnagar sangli\r\nvasantnagar sangli', '111111'),
('ani', 20, 2345671111, 'a@gmail.com', 'vasantnagar sangli\r\nvasantnagar sangli', 'aaaaaa'),
('pranav', 21, 2345671111, 'p@gmail.com', 'vasantnagar sangli\r\nvasantnagar sangli', 'pppppp'),
('deepak', 22, 2345671111, 'd@gmail.com', 'vasantnagar sangli\r\nvasantnagar sangli', 'dddddd'),
('karan', 23, 7972750887, 'k@gmail.com', 'pune', 'kkkkkk'),
('shree', 24, 2345671111, 'g@gmail.com', 'sangli', 'gggggg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`SrNo`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `SrNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
