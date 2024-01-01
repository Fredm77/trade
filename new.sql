-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 05:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `c_fname` varchar(20) NOT NULL,
  `c_lname` varchar(20) NOT NULL,
  `c_address` varchar(20) NOT NULL,
  `c_gender` varchar(10) NOT NULL,
  `c_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `c_fname`, `c_lname`, `c_address`, `c_gender`, `c_phone`) VALUES
(1, 'Cedrick', 'hakuzimana', 'huye', 'male', '0784366616'),
(98, 'fred', 'mukiza', 'ngoma', 'Male', '0784567656'),
(106, 'Ish', 'kevin', 'trappish', 'Male', '078456733'),
(107, 'Ish', 'kevin', 'trappish', 'Male', '078456733'),
(108, 'marina', 'france', 'kigali', 'female', '07867637'),
(109, 'japhet', 'mazy', 'kayonza', 'Male', '078654573'),
(110, 'japhet', 'mazy', 'kayonza', 'Male', '078654573'),
(113, 'mugabo', 'b-threy', 'kigali', 'Male', '0783443345'),
(114, 'kagabo', 'peter', 'Karongi', 'Male', '72334656');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `decription` varchar(100) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `vid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `decription`, `quantity`, `price`, `vid`) VALUES
(1, 'Printer', '                   printer with higth quality ', '34', '50000', 1),
(2, 'computer', '                    hp i7 8gb ram !', '100', '300000', 2),
(24, 'iphone', 'they are iphone14', '3', '3500', 2),
(25, 'iphone', 'they are iphone14', '3', '3500', 2),
(30, 'huawei', 'phones are of latest version', '1000', '1000000', 16),
(31, 'huawei', 'phones are of latest version', '1000', '1000000', 16),
(32, 'huawei', 'phones are of latest version', '1000', '1000000', 16),
(33, 'Tecno', 'Spark 20', '500', '2000000', 23);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `c_id`, `p_id`, `quantity`, `price`, `date`, `time`) VALUES
(1, 1, 1, 34, 50000, '2007-05-23', '07:07:26'),
(2, 1, 1, 0, 0, '0000-00-00', '00:00:00'),
(3, 1, 1, 5, 5000, '2023-08-01', '12:09:00'),
(4, 1, 1, 0, 0, '0000-00-00', '00:00:00'),
(5, 98, 24, 2000, 78567637, '2023-08-01', '12:48:00'),
(6, 98, 24, 2000, 78567637, '2023-08-01', '12:48:00'),
(9, 98, 25, 2000, 5677654, '2023-08-06', '10:40:00'),
(11, 98, 2, 100, 2000000, '2023-08-09', '08:52:00'),
(12, 98, 2, 100, 2000000, '2023-08-09', '08:52:00'),
(13, 98, 2, 100, 2000000, '2023-08-09', '08:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `venders`
--

CREATE TABLE `venders` (
  `v_id` int(11) NOT NULL,
  `v_fname` varchar(20) NOT NULL,
  `v_lname` varchar(20) NOT NULL,
  `v_phone` varchar(20) NOT NULL,
  `v_gender` varchar(10) NOT NULL,
  `addres` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venders`
--

INSERT INTO `venders` (`v_id`, `v_fname`, `v_lname`, `v_phone`, `v_gender`, `addres`) VALUES
(1, 'epiphani', 'epi', '078234566', 'female', 'huye'),
(2, 'Ruth', 'abimana', '0784565432', 'male', 'huye'),
(16, 'bruce', 'kim', '0784567656', 'Male', 'japan'),
(20, 'fred', 'mukiza', '0784567656', 'Male', 'ngoma'),
(22, 'mugisha', 'elio', '0784567623', 'Male', 'kigali'),
(23, 'mugisha', 'elio', '0784567623', 'Male', 'kigali'),
(27, 'kamali', 'kevin', '07834234', 'Male', 'kicukiro'),
(28, 'kamali', 'kevin', '07834234', 'Male', 'kicukiro'),
(29, 'kamali', 'kevin', '07834234', 'Male', 'kicukiro'),
(30, 'fred', 'mukiza', '0784567656', 'Male', 'ngoma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `FK_v` (`vid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cust` (`c_id`),
  ADD KEY `FK_prod` (`p_id`);

--
-- Indexes for table `venders`
--
ALTER TABLE `venders`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `venders`
--
ALTER TABLE `venders`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_v` FOREIGN KEY (`vid`) REFERENCES `venders` (`v_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `FK_cust` FOREIGN KEY (`c_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `FK_prod` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
