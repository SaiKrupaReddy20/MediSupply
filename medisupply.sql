-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 07:03 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medisupply`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ShopID` varchar(255) DEFAULT NULL,
  `MedicineName` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Expiry` date NOT NULL,
  `notifications` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ShopID`, `MedicineName`, `Quantity`, `Price`, `Expiry`, `notifications`) VALUES
('AP123', 'M2', 20, 10, '2019-09-20', 'true'),
('AP123', 'M3', 20, 10, '2020-03-20', 'true'),
('AP123', 'sat', 1, 1, '2022-03-12', 'true'),
('AP123', 'M1', 10, 1, '2019-07-15', 'true'),
('AP123', 'M3', 20, 12, '2020-03-20', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Name` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `PhoneNumber` varchar(10) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Name`, `Age`, `PhoneNumber`, `Address`, `Password`) VALUES
('krupa', 20, '1234567890', '1-2/3-iittp', 'krupa@123'),
('SaiKrupa', 19, '9603903390', '1-2/45,IITTP', 'login123');

-- --------------------------------------------------------

--
-- Table structure for table `medicinestock`
--

CREATE TABLE `medicinestock` (
  `ShopID` varchar(255) DEFAULT NULL,
  `MedicineName` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicinestock`
--

INSERT INTO `medicinestock` (`ShopID`, `MedicineName`, `Quantity`, `Price`, `Expiry`) VALUES
('AP123', 'M1', 20, 10, '2019-07-15'),
('KM123', 'M1', 40, 6, '2019-05-19'),
('AP123', 'M2', 30, 20, '2019-09-20'),
('AP123', 'M3', 40, 12, '2020-03-20'),
('AP123', 'M4', 33, 12, '2019-03-23'),
('AP123', 'sat', 34, 122, '2022-03-12'),
('NM123', 'M1', 23, 34, '2020-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `shopowner`
--

CREATE TABLE `shopowner` (
  `Name` varchar(255) DEFAULT NULL,
  `ShopName` varchar(255) DEFAULT NULL,
  `ShopID` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopowner`
--

INSERT INTO `shopowner` (`Name`, `ShopName`, `ShopID`, `Address`, `Password`) VALUES
('Vishal', 'Apollo', 'AP123', '1-2/4,ABC,XYZ', 'apollo@123'),
('Bhomik', 'KIMS', 'KM123', '234-567,abc,bvn', 'kims@123'),
('krupa', 'NIMS', 'NM123', '1-2/rty,uhg', 'nims@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `ShopID` (`ShopID`);

--
-- Indexes for table `medicinestock`
--
ALTER TABLE `medicinestock`
  ADD KEY `ShopID` (`ShopID`);

--
-- Indexes for table `shopowner`
--
ALTER TABLE `shopowner`
  ADD PRIMARY KEY (`ShopID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`ShopID`) REFERENCES `shopowner` (`ShopID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicinestock`
--
ALTER TABLE `medicinestock`
  ADD CONSTRAINT `medicinestock_ibfk_1` FOREIGN KEY (`ShopID`) REFERENCES `shopowner` (`ShopID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
