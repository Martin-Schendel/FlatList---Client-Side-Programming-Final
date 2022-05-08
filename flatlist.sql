-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2022 at 06:03 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flatlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `TaskID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UserID` int NOT NULL,
  `Weight` double(8,6) DEFAULT NULL,
  `SurveyCount` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`TaskID`, `UserID`, `Weight`, `SurveyCount`) VALUES
('10', 1, 8.366667, 3),
('11', 1, 3.800000, 3),
('14', 1, 6.300000, 3),
('16', 1, 5.566667, 3),
('17', 1, 4.633333, 3),
('18', 1, 2.266667, 3),
('19', 1, 3.050000, 3),
('20', 1, 8.033333, 3),
('23', 1, 5.500000, 2),
('24', 1, 6.300000, 3),
('26', 1, 6.366667, 3),
('27', 1, 6.766667, 3),
('28', 1, 2.700000, 3),
('29', 1, 5.366667, 3),
('3', 1, 5.333333, 3),
('30', 1, 3.300000, 3),
('31', 1, 1.733333, 3),
('5', 1, 6.333333, 3),
('7', 1, 6.266667, 3),
('8', 1, 7.033333, 3),
('9', 1, 3.050000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int NOT NULL,
  `UserFirstName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `UserLastName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `UserEmail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `UserPassword` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserFirstName`, `UserLastName`, `UserEmail`, `UserPassword`) VALUES
(1, 'test', 'test', 'test@test.test', '$2y$10$RUCQHCVOXyj0eGc/u84YQedIfvMpcr5gXodFl2O0t3JCcKCKyBYZe'),
(2, 'Martin', 'Schendel', '13mschen@gmail.com', '$2y$10$BkXMYVbKOxbeCEGn6oo08.eqZo30uv3/eX2QtryJ4cKkMsqM42eme'),
(3, 'test2', 'test2', 'test2@test.test', '$2y$10$5.vb/NPR83BsB9CGEx/mi.TZIjpocKimRo8N7lUvX3YsNSqODYm2C'),
(4, 'test3', 'test3', 'test3@test.test', '$2y$10$nV3tEmRNI1AlohC7VTO19ey2iwfPGmLXNgFITb7wX7x9iB/gMyaNy'),
(5, 'test5', 'test5', 'test5@test.test', '$2y$10$vnMSr8u0c7y/igJY7CsiKOWy/qjyJHau/i0Zkor0Su5DQE3oryveS'),
(7, 'testasdf', 'testasdf', 'test@test.testasdf', '$2y$10$lWjtV/XLXqeaRUGBMYs/PeD0nQQRWcXzxh/B1Gux8Y1Pgx5YWBQSO'),
(8, 'Martin', 'Schendel', 'test@test.com', '$2y$10$jXLTxalSvPJYRscTnz4Cn.KjsrVCaKAPVEGuTesdQd1Rw050TtwdK'),
(9, 'Martin', 'test', 'test@martin.com', '$2y$10$RkjgosRXzn2sWiUjXZ2AcOadVxVYW0TCiJ3OdlJUp50Bs.eRdb5nS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`TaskID`,`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserEmail` (`UserEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
