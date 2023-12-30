-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 04:53 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_customer_and_requests` (IN `customer_id` INT)   BEGIN
    DECLARE success BOOLEAN DEFAULT TRUE;

    START TRANSACTION;

    DELETE FROM request WHERE R_C_ID = customer_id;
    DELETE FROM customer WHERE C_ID = customer_id;

    IF ROW_COUNT() > 0 THEN
        SET success = TRUE;
        COMMIT;
    ELSE
        SET success = FALSE;
        ROLLBACK;
    END IF;

    SELECT success AS 'Operation_Success';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `F_Name` varchar(15) NOT NULL,
  `L_Name` varchar(15) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `Car` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`F_Name`, `L_Name`, `UserName`, `Email`, `Password`, `C_ID`, `Car`) VALUES
('Amr', 'Shaaban', 'Amr21', 'amrshaaban718@gmail.com', 'Amr21Amr21', 1, 'Ford Mustang BOSS 302 1969'),
('Ahmed', 'Khedr', 'Ahmed12', 'ahmed@gmail.com', 'Ahmed12Ahmed12', 6, 'Toyota Supra MK4 1998'),
('Ahmed', 'Ehab', 'aehab1388', 'aehab1388@gmail.com', 'Aehab1388', 7, 'Audi RS7 SPORTBACK 2023'),
('Ziad', 'Mahmoud', 'Ziad2006', 'ziad@gmail.com', 'Ziad2006', 17, 'Mazda Rx-7');

-- --------------------------------------------------------

--
-- Table structure for table `department_locations`
--

CREATE TABLE `department_locations` (
  `L_ID` int(11) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `D_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department_locations`
--

INSERT INTO `department_locations` (`L_ID`, `Location`, `D_Name`) VALUES
(1, 'Maadi', 'Car Wrap'),
(2, 'Nasr City', 'Car Wrap'),
(3, 'Maadi', 'Wash'),
(4, 'Nasr City', 'Wash'),
(5, 'Nasr City', 'Wax'),
(6, 'Maadi', 'Repair'),
(7, 'Maadi', 'Tuning'),
(8, 'Maadi', 'Wax'),
(9, 'Nasr City', 'Repair'),
(10, 'Nasr City', 'Upgrade');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `R_ID` int(11) NOT NULL,
  `R_C_ID` int(11) NOT NULL,
  `R_D_No` int(11) NOT NULL,
  `Service_Details` varchar(255) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`R_ID`, `R_C_ID`, `R_D_No`, `Service_Details`, `Date`, `Status`) VALUES
(4, 1, 3, 'please wash it with water', '2023-12-29 14:37:57', 'pending'),
(6, 1, 7, 'unlock stage 2 and 500 hp', '2023-12-29 14:39:21', 'Approved'),
(7, 1, 10, 'i want a Big Single Turbo stutututuuuu', '2023-12-29 14:41:30', 'Approved'),
(8, 1, 5, 'i want  my car to be shiny 24/7', '2023-12-29 14:42:28', 'pending'),
(9, 7, 7, '1000hp+ please', '2023-12-29 15:21:11', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `F_Name` varchar(15) NOT NULL,
  `L_Name` varchar(15) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Role` varchar(15) NOT NULL,
  `S_ID` int(11) NOT NULL,
  `S_D_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`F_Name`, `L_Name`, `UserName`, `Email`, `Password`, `Role`, `S_ID`, `S_D_No`) VALUES
('ali', 'ahmed', 'Ali21', 'Ali@gmail.com', 'Ali21Ali21', 'wash', 1, 3),
('sameh', 'nashaat', 'sameh21', 'sameh@gmail.com', 'sameh21sameh21', 'wash', 2, 4),
('yahia', 'aazam', 'yaya21', 'yaya@gmail.com', 'yaya21yaya21', 'repair', 4, 6),
('Ziad', 'Mahmoud', 'Ziad2006', 'ziad@gmail.com', 'Ziad2111', 'repair', 25, 6),
('Omar', 'Ahmed', 'Omara211', 'Omarwash@gmail.com', 'Omara211', 'wash', 28, 4),
('Wael', 'Salah', 'WaelS21', 'Waelwrap@gmail.com', 'WaelS21ultra', 'car wrap', 29, 1),
('Mohamed', 'Salah', 'MoSalahUk21', 'liverpool@gmail.com', 'MoSalahUk21', 'wax', 30, 8),
('Chris', 'Bumsted', 'MrOlympia4X', 'Tren@gmail.com', 'MrOlympia4X', 'tuning', 31, 7),
('Hamada', 'Sheraton', 'HotPotatos21', 'Hamadaupgrade@gmail.com', 'HotPotatos21', 'upgrade', 32, 10);

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
-- Indexes for table `department_locations`
--
ALTER TABLE `department_locations`
  ADD PRIMARY KEY (`L_ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`R_ID`),
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `department_locations`
--
ALTER TABLE `department_locations`
  MODIFY `L_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fk_R_C_Id` FOREIGN KEY (`R_C_ID`) REFERENCES `customer` (`C_ID`),
  ADD CONSTRAINT `fk_R_DL_Id` FOREIGN KEY (`R_D_No`) REFERENCES `department_locations` (`L_ID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_S_D_No` FOREIGN KEY (`S_D_No`) REFERENCES `department_locations` (`L_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
