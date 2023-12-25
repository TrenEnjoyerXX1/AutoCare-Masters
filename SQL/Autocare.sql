-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 08:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autocare`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `F_Name` varchar(15) NOT NULL,
  `L_Name` varchar(15) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `C_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`F_Name`, `L_Name`, `UserName`, `Email`, `Password`, `C_ID`) VALUES
('Amr', 'Shaaban', 'Amr21', 'amrshaaban718@gmail.com', '881c7d6ba98678bcd96e253086c4048c3ea15306d0d13ff48341c6285ee71102a47b6f16e20e4d65c0c3d677be689dfda6d3', 1),
('', 'lname', '', '', 'a69f73cca23a9ac5c8b567dc185a756e97c982164fe25859e0d1dcc1475c80a615b2123af1f5f94c11e3e9402c3ac558f500', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `D_No` int(11) NOT NULL,
  `D_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_locations`
--

CREATE TABLE `department_locations` (
  `L_ID` int(11) NOT NULL,
  `L_D_No` int(11) NOT NULL,
  `Location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `R_ID` int(11) NOT NULL,
  `R_C_ID` int(11) NOT NULL,
  `R_D_No` int(11) NOT NULL,
  `R_V_ID` int(11) NOT NULL,
  `Service_Details` varchar(255) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `F_Name` varchar(15) NOT NULL,
  `L_Name` varchar(15) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` varchar(15) NOT NULL,
  `S_ID` int(11) NOT NULL,
  `S_D_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Plates` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Brand` varchar(25) NOT NULL,
  `Model` varchar(25) NOT NULL,
  `Year` int(4) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `C_C_ID` int(11) NOT NULL,
  `V_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`),
  ADD UNIQUE KEY `U_Name` (`UserName`),
  ADD UNIQUE KEY `UserName` (`UserName`,`Email`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`D_No`);

--
-- Indexes for table `department_locations`
--
ALTER TABLE `department_locations`
  ADD PRIMARY KEY (`L_ID`),
  ADD KEY `fk_L_D_No` (`L_D_No`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`R_ID`),
  ADD KEY `fk_R_V_Id` (`R_V_ID`),
  ADD KEY `fk_R_C_Id` (`R_C_ID`),
  ADD KEY `fk_R_DL_Id` (`R_D_No`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`S_ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `fk_S_D_No` (`S_D_No`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`V_ID`),
  ADD UNIQUE KEY `Plates` (`Plates`),
  ADD KEY `fk_Customer_Id` (`C_C_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `D_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department_locations`
--
ALTER TABLE `department_locations`
  MODIFY `L_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `V_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department_locations`
--
ALTER TABLE `department_locations`
  ADD CONSTRAINT `fk_L_D_No` FOREIGN KEY (`L_D_No`) REFERENCES `department` (`D_No`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fk_R_C_Id` FOREIGN KEY (`R_C_ID`) REFERENCES `customer` (`C_ID`),
  ADD CONSTRAINT `fk_R_DL_Id` FOREIGN KEY (`R_D_No`) REFERENCES `department_locations` (`L_ID`),
  ADD CONSTRAINT `fk_R_V_Id` FOREIGN KEY (`R_V_ID`) REFERENCES `vehicle` (`V_ID`),
  ADD CONSTRAINT `fk_Vehicle_id` FOREIGN KEY (`R_V_ID`) REFERENCES `vehicle` (`V_ID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_S_D_No` FOREIGN KEY (`S_D_No`) REFERENCES `department_locations` (`L_ID`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_Customer_Id` FOREIGN KEY (`C_C_ID`) REFERENCES `customer` (`C_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
