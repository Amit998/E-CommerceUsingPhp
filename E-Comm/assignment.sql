-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 10:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `carttemp`
--

CREATE TABLE `carttemp` (
  `id` int(11) NOT NULL,
  `Pname` varchar(20) NOT NULL,
  `PPrice` varchar(100) NOT NULL,
  `Quantity` varchar(10) NOT NULL,
  `GST` varchar(10) NOT NULL,
  `Discount` varchar(10) NOT NULL,
  `TotalPrice` varchar(100) NOT NULL,
  `CoustomerName` varchar(10) NOT NULL,
  `ProductId` varchar(10) NOT NULL,
  `CustomerId` varchar(10) NOT NULL,
  `PurchaseId` varchar(10) NOT NULL,
  `image1` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carttemp`
--

INSERT INTO `carttemp` (`id`, `Pname`, `PPrice`, `Quantity`, `GST`, `Discount`, `TotalPrice`, `CoustomerName`, `ProductId`, `CustomerId`, `PurchaseId`, `image1`) VALUES
(79, 'T-Shirt Blue', '1999$', '3', '18', '0', '7076.46', 'Bratati', '1212', '109210', 'random', 'bl.jpg'),
(80, 'T-Shirt Blue', '1999$', '2', '18', '0', '4717.64', 'Bratati', '1212', '109210', 'random', 'bl.jpg'),
(81, 'T-Shirt Blue', '1999$', '1', '18', '0', '2358.82', 'ADMIN', '1212', '109210', 'random', 'bl.jpg'),
(82, 'T-Shirt Three', '500', '1', '18', '50', '295', 'ADMIN', '1414', '109210', 'random', 'bl1.jpg'),
(83, 'T-Shirt Two', '500', '1', '18', '10', '531', 'ADMIN', '1313', '109210', 'random', 'y1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `id` int(11) NOT NULL,
  `pName` varchar(100) NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `Availability` varchar(10) NOT NULL,
  `Condition` varchar(10) NOT NULL,
  `brand` varchar(11) NOT NULL,
  `Quantity` varchar(11) NOT NULL,
  `Description` varchar(11) NOT NULL,
  `ProductCode` varchar(11) NOT NULL,
  `ProductId` varchar(11) NOT NULL,
  `ProviderId` varchar(11) NOT NULL,
  `Discount` varchar(11) NOT NULL,
  `GST` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`id`, `pName`, `img1`, `img2`, `img3`, `price`, `Availability`, `Condition`, `brand`, `Quantity`, `Description`, `ProductCode`, `ProductId`, `ProviderId`, `Discount`, `GST`) VALUES
(1, 'T-Shirt Blue', 'bl.jpg', 'b2.jpg', 'b3.jpg', '1999$', 'In Stock', 'New', 'Puma', '10', 'Amit Dutta', '19HJUG12', '1212', '1000', '0', '18'),
(2, 'T-Shirt Two', 'y1.jpg', 'y2.jpg', 'y3.jpg', '500', 'In Stock', 'New', 'Nike', '100', 'Good Qualit', '12HG6GH', '1313', '12222', '10', '18'),
(3, 'T-Shirt Three', 'bl1.jpg', 'bl2.jpg', 'bl3.jpg', '500', 'In Stock', 'New', 'Apple', '1100', 'Good One ', '12HG6GH', '1414', '15422', '50', '18');

-- --------------------------------------------------------

--
-- Table structure for table `productlisting`
--

CREATE TABLE `productlisting` (
  `id` int(11) NOT NULL,
  `PName` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Provider` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `img` varchar(11) NOT NULL,
  `pId` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productlisting`
--

INSERT INTO `productlisting` (`id`, `PName`, `Status`, `Provider`, `Price`, `img`, `pId`) VALUES
(1, 'T-Shirt Blue', 'Available', 'Amit pvt ltd.', '1999$', 'bl.jpg', '1212'),
(2, 'T-Shirt Two', 'Available', 'Amit Pvt Ltd', '1000 $', 'y1.jpg', '1313'),
(3, 'T-Shirt Three', 'Available', 'Amit Pvt Ltd', '1100 $', 'bl1.jpg', '1414');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carttemp`
--
ALTER TABLE `carttemp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productlisting`
--
ALTER TABLE `productlisting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carttemp`
--
ALTER TABLE `carttemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productlisting`
--
ALTER TABLE `productlisting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
