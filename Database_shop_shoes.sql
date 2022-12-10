-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 12:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_shoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `ID` int(11) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` text NOT NULL,
  `FullName` varchar(250) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `PhoneNumber` int(15) NOT NULL,
  `Gender` int(11) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`ID`, `Email`, `Password`, `FullName`, `Address`, `PhoneNumber`, `Gender`, `Role`) VALUES
(1, 'vuductien2908@gmail.com', '123456789', 'Vũ Đức Tiến', 'Tân Hiệp - Kiên Giang', 333669832, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `ID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `CreateAt` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdateAt` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`ID`, `Name`, `CreateAt`, `UpdateAt`, `status`) VALUES
(16, 'Adidas', '2022-12-10 11:19:26', NULL, 1),
(17, 'Shondo', '2022-12-10 11:19:31', NULL, 1),
(18, 'Nike', '2022-12-10 11:19:48', NULL, 1),
(19, 'Valentino', '2022-12-10 11:20:01', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `ParentID` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `CreateAt` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdateAt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `ParentID`, `status`, `CreateAt`, `UpdateAt`) VALUES
(50, 'Giày thời trang nam', 0, 1, '2022-12-10 11:04:30', NULL),
(51, 'Giày thời trang nữ', 0, 1, '2022-12-10 11:04:36', NULL),
(52, 'Giày mùa hè', 0, 1, '2022-12-10 11:04:51', NULL),
(53, 'Giày công sở', 0, 1, '2022-12-10 11:05:01', NULL),
(54, 'Giày thể thao', 0, 1, '2022-12-10 11:05:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` text NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Address` text NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `CreateAt` datetime NOT NULL DEFAULT current_timestamp(),
  `Status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `Quantity` int(11) NOT NULL,
  `Price` decimal(18,0) NOT NULL,
  `Size` varchar(100) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL DEFAULT current_timestamp(),
  `NameReceive` varchar(250) NOT NULL,
  `PhoneReceive` int(11) NOT NULL,
  `AddressReceive` text NOT NULL,
  `Note` text NOT NULL,
  `Total` decimal(18,0) NOT NULL DEFAULT 0,
  `StatusOrder` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `UpdateAt` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `CreateAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Price` decimal(18,0) NOT NULL,
  `PromotionPrice` decimal(18,0) NOT NULL,
  `Size` text NOT NULL,
  `Description` text NOT NULL,
  `Img` text NOT NULL,
  `Discount` int(11) DEFAULT NULL,
  `Hot` tinyint(1) DEFAULT NULL,
  `Detail` text NOT NULL,
  `ViewCount` int(11) NOT NULL DEFAULT 0,
  `CateID` int(11) NOT NULL,
  `SupplierID` int(11) NOT NULL,
  `BrandID` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `CreateAt` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdateAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Price`, `PromotionPrice`, `Size`, `Description`, `Img`, `Discount`, `Hot`, `Detail`, `ViewCount`, `CateID`, `SupplierID`, `BrandID`, `Status`, `CreateAt`, `UpdateAt`) VALUES
(31, 'Giày Converse Madison Mono', '450000', '400000', '38,39,40,42', '<p>- Chất liệu giày bằng da bò mềm với chi tiết mũi giày cap-toe<br>- Mắt xỏ dây âm với dây cột nylon<br>- Lót trong bằng da thoáng khí tự nhiên</p>', 'd9e3de998129611ef632a6cf91ecc7cd.jpg', 0, 1, '<p>Giày thể thao nam đẹp da màu nâu cao cấp, thanh lịch từ thương hiệu Converse®<br>Chất liệu giày bằng da bò mềm với chi tiết mũi giày cap-toe<br>Mắt xỏ dây âm với dây cột nylon<br>Lót trong bằng da thoáng khí tự nhiên<br>Đệm lót giày bằng da bọc thoải mái và hỗ trợ chân<br>Đế ngoài băng cao su hấp thụ sốc tốt và bám tốt trên mọi bề mặt</p>', 0, 51, 9, 19, 1, '2022-12-10 11:22:33', NULL),
(32, 'Giày Converse ', '350000', '299000', '38,39,40,42', '<p>- Chất liệu giày bằng da bò mềm với chi tiết mũi giày cap-toe<br>- Mắt xỏ dây âm với dây cột nylon<br>- Lót trong bằng da thoáng khí tự nhiên</p>', '4daec57d3b7fe7b2a15c611ab9b7b885.jpg', 20, 1, '<p>Giày thể thao nam đẹp da màu nâu cao cấp, thanh lịch từ thương hiệu Converse®<br>Chất liệu giày bằng da bò mềm với chi tiết mũi giày cap-toe<br>Mắt xỏ dây âm với dây cột nylon<br>Lót trong bằng da thoáng khí tự nhiên<br>Đệm lót giày bằng da bọc thoải mái và hỗ trợ chân<br>Đế ngoài băng cao su hấp thụ sốc tốt và bám tốt trên mọi bề mặt</p>', 0, 51, 11, 17, 1, '2022-12-10 11:25:37', '2022-12-10 11:41:19'),
(38, 'Giày Converse Star Denim', '160000', '560000', '38,39,40,42', '<p>- Chất liệu giày bằng da bò mềm với chi tiết mũi giày cap-toe<br>- Mắt xỏ dây âm với dây cột nylon<br>- Lót trong bằng da thoáng khí tự nhiên</p>', '7de1d17c7b9bd231edd1bdf3b8250af3.jpg', 12, 1, '<p>Giày thể thao nam đẹp da màu nâu cao cấp, thanh lịch từ thương hiệu Converse®<br>Chất liệu giày bằng da bò mềm với chi tiết mũi giày cap-toe<br>Mắt xỏ dây âm với dây cột nylon<br>Lót trong bằng da thoáng khí tự nhiên<br>Đệm lót giày bằng da bọc thoải mái và hỗ trợ chân<br>Đế ngoài băng cao su hấp thụ sốc tốt và bám tốt trên mọi bề mặt</p>', 0, 50, 11, 16, 1, '2022-12-10 12:46:00', '2022-12-10 12:53:54'),
(39, 'Giày Converse Madison Mono', '720000', '599000', '38,39,40,42', '<p>- Chất liệu giày bằng da bò mềm với chi tiết mũi giày cap-toe<br>- Mắt xỏ dây âm với dây cột nylon<br>- Lót trong bằng da thoáng khí tự nhiên<br>- Mắt xỏ dây âm với dây cột nylon<br>- Lót trong bằng da thoáng khí tự nhiên</p>', '8fdc558896e7b99b5340dd2649e22a64.jpg', 0, 0, '<p>Giày thể thao nam đẹp da màu nâu cao cấp, thanh lịch từ thương hiệu Converse®<br>Chất liệu giày bằng da bò mềm với chi tiết mũi giày cap-toe<br>Mắt xỏ dây âm với dây cột nylon<br>Lót trong bằng da thoáng khí tự nhiên<br>Đệm lót giày bằng da bọc thoải mái và hỗ trợ chân<br>Đế ngoài băng cao su hấp thụ sốc tốt và bám tốt trên mọi bề mặt</p>', 0, 52, 10, 19, 1, '2022-12-10 12:48:13', NULL),
(40, 'Giày lười mono', '420000', '300000', '38,39,40,42', '<p>- Chất liệu giày bằng da bò mềm với chi tiết mũi giày cap-toe<br>- Mắt xỏ dây âm với dây cột nylon<br>- Lót trong bằng da thoáng khí tự nhiên</p>', '9810c83e151706ea948cf7d82f0b9cc5.jpg', 0, 1, '<p>Giày thể thao nam đẹp da màu nâu cao cấp, thanh lịch từ thương hiệu Converse®<br>Chất liệu giày bằng da bò mềm với chi tiết mũi giày cap-toe<br>Mắt xỏ dây âm với dây cột nylon<br>Lót trong bằng da thoáng khí tự nhiên<br>Đệm lót giày bằng da bọc thoải mái và hỗ trợ chân<br>Đế ngoài băng cao su hấp thụ sốc tốt và bám tốt trên mọi bề mặt</p>', 0, 52, 10, 17, 1, '2022-12-10 12:49:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `ID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `CreateAt` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdateAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`ID`, `Name`, `Email`, `PhoneNumber`, `Address`, `Status`, `CreateAt`, `UpdateAt`) VALUES
(9, 'Công Ty TNHH Thương Mại Sản Xuất Hùng Huy', 'hunghuyfootwear@hunghuy.com.vn', '(028) 37621076', ' 907/19 Khu Phố 8, Hương Lộ 2, P. Bình Trị Đông A, Q. Bình Tân,Tp. Hồ Chí Minh (TPHCM)', 1, '2022-12-10 11:08:03', '2022-12-10 11:17:53'),
(10, 'Giày Dép Tân Hợp - Công Ty TNHH Sản Xuất Giày Dép Tân Hợp', 'sales@thshoes.com.vn', '(0251) 3971752', ' Ấp 1, CCN Thiện Tân, X. Thạnh Phú, H. Vĩnh Cửu,Đồng Nai', 1, '2022-12-10 11:10:54', '2022-12-10 11:18:10'),
(11, 'Công Ty TNHH Nhà Nước MTV Giầy Thượng Đình', 'tdfootwear@fpt.vn', '(024) 38544312', '277 Đường Nguyễn Trãi, Q. Thanh Xuân,Hà Nội', 1, '2022-12-10 11:19:01', NULL),
(12, 'demo', 'vuductien2908@gmail.com', '02513971752', '11', 0, '2022-12-10 11:19:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`ProductID`,`OrderID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BrandID` (`BrandID`),
  ADD KEY `CateID` (`CateID`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`BrandID`) REFERENCES `brands` (`ID`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`CateID`) REFERENCES `categories` (`ID`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`SupplierID`) REFERENCES `suppliers` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
