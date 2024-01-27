-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 11:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelclaim`
--

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`) VALUES
('ES', 'East'),
('NS', 'North'),
('SRHQ', 'Hydrabad');

-- --------------------------------------------------------

--
-- Table structure for table `travelclaim`
--

CREATE TABLE `travelclaim` (
  `id` int(11) NOT NULL,
  `claimId` varchar(225) NOT NULL,
  `empId` int(11) NOT NULL,
  `travelType` varchar(255) NOT NULL,
  `startDate` varchar(255) NOT NULL,
  `endDate` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `officeOrder` varchar(255) NOT NULL,
  `travelDetails` varchar(500) NOT NULL,
  `documents` varchar(500) NOT NULL,
  `approver` int(11) NOT NULL,
  `createdOn` date DEFAULT NULL,
  `approvedOn` date DEFAULT NULL,
  `asdf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travelclaim`
--

INSERT INTO `travelclaim` (`id`, `claimId`, `empId`, `travelType`, `startDate`, `endDate`, `source`, `destination`, `status`, `officeOrder`, `travelDetails`, `documents`, `approver`, `createdOn`, `approvedOn`, `asdf`) VALUES
(7, 'clm1', 123456, 'Domestic trip', '2024-01-15', '2024-01-20', 'sgsg', 'sdfgag', 0, 'officeOrder/InitiateSingleEntryPaymentSummary04-12-2023.pdf', '{\"train0\":\"45634\",\"train1\":\"5345\"}', 'travelDetail/Release Order_Group E.pdf;travelDetail/FA2D2D2D024E1EEEA3CEF7EC3943C745.pdf;', 0, NULL, NULL, ''),
(8, 'clm8', 123456, 'Foreign Trip', '2024-01-03', '2024-01-06', 'asgfs', 'kasjdgb', 0, 'officeOrder/Release Order_Group E.pdf', '{\"Auto0\":\"435\"}', 'travelDetail/FA2D3535FB201EEEA3A2044761F893A3.pdf;', 0, NULL, NULL, ''),
(9, 'clm9', 123456, 'Foreign Trip', '2024-01-05', '2024-01-10', 'ag', 'afg', 0, 'officeOrder/FA2D2D2D76A81EDEA29DD1B260918FC7.pdf', '{\"train0\":\"456\"}', 'travelDetail/FA2D2D2D024E1EEEA3CEF7EC3943C745.pdf;', 0, NULL, NULL, ''),
(10, 'clm10', 123456, 'Domestic trip', '2024-01-01', '2024-01-13', 'asdf', 'asdf', 0, 'officeOrder/FA2D2D2D024E1EEEA3CEF7EC3943C745.pdf', '{\"train0\":\"345\"}', 'travelDetail/Release Order_Group E.pdf;', 0, NULL, NULL, ''),
(11, 'clm11', 123456, 'Domestic trip', '2024-01-08', '2024-01-13', 'asdf', 'gsda', 0, 'officeOrder/InitiateSingleEntryPaymentSummary04-12-2023.pdf', '{\"Auto0\":\"234\"}', 'travelDetail/Release Order_Group E.pdf;', 123456, NULL, NULL, ''),
(12, 'clm12', 123456, 'Domestic trip', '2024-01-15', '2024-01-20', 'asd', 'asf', 1, 'officeOrder/FA2D2D2D024E1EEEA3CEF7EC3943C745.pdf', '{\"train0\":\"345\"}', 'travelDetail/FA2D2D2D024E1EEEA3CEF7EC3943C745.pdf;', 123456, '2024-01-27', '2024-01-27', '2024-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `empid` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `mobile` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `region` varchar(225) NOT NULL,
  `reportingofficer` varchar(225) NOT NULL,
  `isro` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`empid`, `name`, `gender`, `mobile`, `email`, `password`, `region`, `reportingofficer`, `isro`) VALUES
(159, 'Imelda Clements', 'F', 'Voluptas rerum qui i', 'safine@mailinator.com', 'Pa$$w0rd!', 'SRHQ', 'Anim consequuntur al', 0),
(4444, 'Reagan Cooke', 'F', 'Tempora dolorem mini', 'nylumidi@mailinator.com', 'Pa$$w0rd!', 'ES', 'Quo sit voluptate p', 1),
(123456, 'Farrah Luna', 'M', 'Vitae esse tempor vo', 'geqyjy@mailinator.com', '1', 'NS', 'Iure quae saepe nisi', 1),
(123465, 'Clementine Summers', 'M', 'Minus ut ad obcaecat', 'haruhe@mailinator.com', 'Pa$$w0rd!', 'ES', 'Voluptas corrupti e', 0),
(147852, 'Solomon Larsen', 'F', 'Ab aliqua Dolores f', 'koworyvit@mailinator.com', 'Pa$$w0rd!', 'NS', 'Eveniet a duis erro', 0),
(159864, 'Veda Vasquez', 'M', 'Sint est aut quia ', 'fobudyfobi@mailinator.com', 'Pa$$w0rd!', 'SRHQ', 'Anim consequuntur al', 1),
(456789, 'Trevor Foley', 'M', 'Sed sit eum quia adi', 'nuhamof@mailinator.com', 'Pa$$w0rd!', 'SRHQ', 'Eos rerum qui lauda', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travelclaim`
--
ALTER TABLE `travelclaim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `travelclaim`
--
ALTER TABLE `travelclaim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
