-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 02:59 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbackend`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `zipcode` varchar(7) NOT NULL,
  `residence` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `token` varchar(64) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID`, `firstname`, `lastname`, `street`, `zipcode`, `residence`, `email`, `password`, `token`, `role`) VALUES
(1, 'asdoij', 'houashdoiu', 'ohasdjoi', 'jioasjd', 'jioajsdoija', 'aojoijsoasjd@gmail.c', '$2y$10$kcgqU7dS1RvCs9MFCKgPVeCP3h3gAVYgPrIl/qe.jvTaGVtGF/76G', '', 0),
(2, 'Daphne', 'Bosch', 'Beugel', '8447 AK', 'Heerenveen', 'shayleys@hotmail.com', '$2y$10$/Dt6Nrymp9ONfdY5qrpTO.mO28WsFIP6hcTY7pbpxjP0r6aLX56GC', '', 1),
(3, 'Arnold', 'Hamstra', 'Beugel', '8447 AK', 'Heerenveen', 'a_hamstra@hotmail.co', '$2y$10$sB6kvDXg2aWipQIp1PgtwuPxL8M9cBJ8QjYoPDFC8.mvY5TxFfftK', '', 0),
(4, 'Test', 'test', 'test3', 'test 12', 'test', 'test@gmail.com', '$2y$10$ymHUsjuOcMJvdMNh0jQFx.CczzHjlz6m0LeL2O1pyWDAYOWl22Mrq', '', 0),
(5, 'Lauren', 'Cohan', 'New Jersey st.', '8314 HM', 'New Jersey', 'laurencohan@amc.com', '$2y$10$YBf3BKo1wqqXDg4MRHw9Ou4.8qkXOxYylIFGSlK8dqUudOh8Pu3Xy', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID` int(11) NOT NULL,
  `weborder_ID` int(11) NOT NULL,
  `client_ID` int(11) NOT NULL,
  `laptop_ID` int(11) NOT NULL,
  `price_unit` decimal(5,0) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ID`, `weborder_ID`, `client_ID`, `laptop_ID`, `price_unit`, `stock`) VALUES
(1, 13, 2, 1, '3', 5),
(2, 13, 2, 3, '3', 1),
(3, 14, 2, 1, '3', 3),
(4, 14, 2, 2, '5', 3),
(5, 14, 2, 3, '3', 3),
(6, 15, 2, 9, '16', 4),
(7, 16, 2, 8, '16', 2),
(8, 2, 2, 6, '1049', 2),
(9, 3, 2, 1, '940', 1),
(10, 3, 2, 6, '1049', 1),
(11, 3, 2, 7, '1699', 1),
(12, 4, 5, 6, '1049', 1),
(13, 4, 5, 7, '1699', 1),
(14, 5, 2, 2, '1049', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `ID` int(11) NOT NULL,
  `namelaptop` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `processor` varchar(20) NOT NULL,
  `yearlaptop` int(11) NOT NULL,
  `graphicscard` varchar(20) NOT NULL,
  `resolution` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `spacelaptop` varchar(20) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `cover` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`ID`, `namelaptop`, `brand`, `processor`, `yearlaptop`, `graphicscard`, `resolution`, `ram`, `spacelaptop`, `price`, `stock`, `cover`) VALUES
(1, 'HP Pavilion 14-bf015', 'HP', 'Intel Core i5-7200U', 2017, 'GeForce 940MX', '1920x1080 (Full HD)', '8GB', '256GB', '940.00', 31, 'pavillion.jpg'),
(6, 'Apple MacBook Pro 15', 'Apple', 'Intel Core i7-4770HQ', 2015, 'Intel Iris Pro', '2880 x 1800', '16GB', '256GB', '1049.00', 67, 'macbookretina.png'),
(7, 'Dell XPS 15 9560-NGG', 'Dell', 'Intel Core i7-7700HQ', 2017, 'GeForce GTX 1050', '1920x1080 (Full HD)', '16GB', '512GB', '1699.00', 22, 'dell.jpeg'),
(8, 'Acer Swift 5 Pro SF5', 'Acer', 'Intel Core i5-8265U', 2019, 'Intel UHD Graphics 6', '1920x1080 (Full HD)', '8GB', '256GB', '1099.00', 666, 'acerswift.jpg'),
(9, 'MSI Prestige 14 A10S', 'MSI', 'Intel Core i7-10710U', 2019, 'GeForce GTX 1650 Max', '3840x2160 (4K)', '16GB', '1TB', '1799.00', 163, 'msiprestige.jpeg'),
(10, 'Lenovo ThinkBook 13s', 'Lenovo', 'Intel Core i7-8565U', 2019, 'Intel UHD Graphics 6', '1920x1080 (Full HD)', '16GB', '512GB', '979.00', 102, 'lenovothinkbook.jpeg'),
(11, 'HP Envy x360 15-ds07', 'HP', 'AMD Ryzen 7 3700U', 2019, 'Radeon RX Vega 10', '1920x1080 (Full HD)', '16GB', '512GB', '999.00', 155, 'hpenvy.jpeg'),
(12, 'HP Pavilion 14-bf105', 'HP', 'Intel Core i5-8250U', 2017, 'NVIDIA GeForce 940MX', '1920x1080 (full HD)', '8GB', '256GB', '622.00', 46, 'hppavillion.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `phoneitem`
--

CREATE TABLE `phoneitem` (
  `ID` int(11) NOT NULL,
  `weborder_ID` int(11) NOT NULL,
  `client_ID` int(11) NOT NULL,
  `phone_ID` int(11) NOT NULL,
  `price_unit` decimal(5,0) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phoneitem`
--

INSERT INTO `phoneitem` (`ID`, `weborder_ID`, `client_ID`, `phone_ID`, `price_unit`, `stock`) VALUES
(1, 8, 2, 2, '1146', 2),
(2, 10, 5, 2, '1146', 1),
(3, 11, 2, 1, '390', 1),
(4, 11, 2, 3, '653', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `ID` int(11) NOT NULL,
  `namephone` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `yearphone` int(11) NOT NULL,
  `os` varchar(30) NOT NULL,
  `processor` varchar(30) NOT NULL,
  `spacephone` varchar(30) NOT NULL,
  `camres` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `simtype` varchar(30) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `cover` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`ID`, `namephone`, `brand`, `yearphone`, `os`, `processor`, `spacephone`, `camres`, `color`, `simtype`, `price`, `stock`, `cover`) VALUES
(1, 'IPhone 7', 'Apple', 2016, 'IOS', 'Apple A10', '32GB', '12MP', 'Gold', 'Single', '390.00', 21, 'iphone7.jpeg'),
(2, 'IPhone 11 Pro', 'Apple', 2019, 'IOS', 'Apple A13 Bionic', '64GB', '12MP', 'Grey', 'Dual', '1145.99', 78, 'iphone11.png'),
(3, 'Samsung Galaxy S10', 'Samsung', 2019, 'Android', 'Samsung Exynos 9 Octa (9820)', '128GB', '12MP', 'Black', 'Dual', '653.00', 33, 'samsungs10.png'),
(4, 'Oppo Reno 10X Zoom Edition', 'Oppo', 2019, 'Android', 'Qualcomm Snapdragon 855', '256GB', '48MP', 'Green', 'Dual', '660.00', 41, 'opporeno.jpeg'),
(5, 'Xiaomi Mi 9T Pro', 'Xiaomi', 2019, 'Android', 'Qualcomm Snapdragon 855', '64GB', '48MP', 'Black', 'Dual', '369.90', 133, 'xiaomi.jpeg'),
(6, 'Apple iPhone XR', 'Apple', 2018, 'IOS', 'Apple A12 Bionic', '64GB', '12MP', 'Black', 'Dual', '632.00', 72, 'iphonexr.jpeg'),
(7, 'Google Pixel 3a', 'Google', 2019, 'Android', 'Qualcomm Snapdragon 670', '64GB', '12,2MP', 'Black', 'Dual', '437.00', 112, 'googlepixel.jpeg'),
(8, 'Huawei P30 Pro', 'Huawei', 2019, 'Android', 'Hisilicon Kirin 980', '128GB', '40MP', 'Black', 'Dual', '635.00', 92, 'huaweip30.png');

-- --------------------------------------------------------

--
-- Table structure for table `weborder`
--

CREATE TABLE `weborder` (
  `ID` int(11) NOT NULL,
  `client_ID` int(11) NOT NULL,
  `dat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weborder`
--

INSERT INTO `weborder` (`ID`, `client_ID`, `dat`) VALUES
(1, 2, '2019-11-15'),
(2, 2, '2019-11-15'),
(3, 2, '2019-11-15'),
(4, 5, '2019-11-18'),
(5, 2, '2019-11-18'),
(6, 2, '2019-11-19'),
(7, 2, '2019-11-19'),
(8, 2, '2019-11-19'),
(9, 2, '2019-11-19'),
(10, 5, '2019-11-19'),
(11, 2, '2019-11-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `phoneitem`
--
ALTER TABLE `phoneitem`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `weborder`
--
ALTER TABLE `weborder`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `phoneitem`
--
ALTER TABLE `phoneitem`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `weborder`
--
ALTER TABLE `weborder`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
