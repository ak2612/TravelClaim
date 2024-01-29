-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 11:31 AM
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
-- Table structure for table `projectlist`
--

CREATE TABLE `projectlist` (
  `code` int(11) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projectlist`
--

INSERT INTO `projectlist` (`code`, `name`) VALUES
(410, 'ER-II HQs'),
(1000, 'Scope'),
(1001, 'EOC'),
(1003, 'NR HQ'),
(1004, 'Singrauli Super Thermal Power Plant'),
(1005, 'Rihand Super Thermal Power Project'),
(1006, 'Feroze Gandhi Unchahar Thermal Power Project'),
(1007, 'Tanda Thermal Power Station'),
(1008, 'DBF HQ'),
(1011, 'National Capital Power project, Dadri'),
(1012, 'Auraiya Gas Power Plant'),
(1013, 'Anta Gas Power Station'),
(1015, 'Faridabad Gas Power Plant'),
(1016, 'WR-I HQs'),
(1017, 'Korba Thermal Power Project'),
(1018, 'Vindhyachal'),
(1019, 'Sipat Super Thermal Power Project'),
(1020, 'Kawas Gas Power Project'),
(1021, 'Jhanor Gas Power Project'),
(1022, 'ER-I HQ'),
(1024, 'Farakka  Super Thermal Power Project'),
(1025, 'Kahalgaon Super Thermal Power Plant'),
(1026, 'Talcher  Super Thermal  Power Project'),
(1027, 'Talcher Thermal Power Project'),
(1028, 'Barh Super Thermal Power Project'),
(1029, 'North Karanpura Super Thermal Power Project'),
(1031, 'SR HQ'),
(1033, 'Ramagundam Super Thermal Power Project '),
(1034, 'Kayamkulam'),
(1035, 'Simhadri Thermal Power project'),
(1037, 'Koldam Hydro Power Plant'),
(1038, 'Tapovan Hydro Power Plant'),
(1040, 'Pakri Barwadih'),
(1041, 'WR-II HQ'),
(1042, 'Bongaigaon Thermal Power Station'),
(1043, 'Mouda Super Thermal Power Project'),
(1044, 'ER-II HQ'),
(1045, 'Solapur Super Thermal Power Project'),
(1046, 'Kudgi Super Thermal Power Project'),
(1047, 'Lara Super Thermal power project'),
(1049, 'Gadarwara Super Thermal project'),
(1051, 'Rammam Hydro Power project'),
(1053, 'Darlipali Super Thermal Power Project'),
(1054, 'Khargone Thermal Power Plant'),
(1056, 'Hydro HQ'),
(1057, 'Telangana Super Thermal  Power Project'),
(1070, 'Dulanga Coal Mining Project'),
(1071, 'Talaipalli Coal Mining Project'),
(1072, 'Barauni'),
(1111, 'NSPCL(JV)'),
(1628, 'NETRA'),
(2001, 'Kerandari Coal Mining'),
(2015, 'BRBCL Nabinagar'),
(2025, 'Patratu Vidyut Utpadan Nigam Limited'),
(2040, 'Kanti Thermal Power Plant'),
(7011, 'NSPCL Durgapur'),
(7012, 'NSPCL Bhilai'),
(7013, 'NSPCL Rourkela'),
(7031, 'RGPPL'),
(7040, 'NTECL Vallur Thermal Power Project'),
(7080, 'APCPL/IGSTPP Jhajjar '),
(7090, 'Meja Urja Nigam (P) Ltd'),
(7110, 'NPGCL Project'),
(9016, 'WR-I'),
(9017, 'CM HQ'),
(9999, 'Corporate');

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
(10, 'clm10', 123456, 'Domestic trip', '2024-01-01', '2024-01-13', 'asdf', 'asdf', 0, 'officeOrder/FA2D2D2D024E1EEEA3CEF7EC3943C745.pdf', '{\"train0\":\"345\",\"Auto1\":\"567\"}', 'travelDetail/Release Order_Group E.pdf;travelDetail/FA2D2D2D8EF01EDEA29DCC5F4EBF8FD9.pdf;Release Order_Group E.pdf', 123456, '2024-01-29', NULL, ''),
(11, 'clm11', 123456, 'Domestic trip', '2024-01-08', '2024-01-13', 'asdf', 'gsda', 1, 'officeOrder/InitiateSingleEntryPaymentSummary04-12-2023.pdf', '{\"Auto0\":\"234\"}', 'travelDetail/Release Order_Group E.pdf;', 123456, NULL, '2024-01-29', ''),
(12, 'clm12', 123456, 'Domestic trip', '2024-01-15', '2024-01-20', 'asd', 'asf', 1, 'officeOrder/FA2D2D2D024E1EEEA3CEF7EC3943C745.pdf', '{\"train0\":\"345\"}', 'travelDetail/FA2D2D2D024E1EEEA3CEF7EC3943C745.pdf;', 123456, '2024-01-27', '2024-01-27', '2024-01-27'),
(13, 'clm13', 123456, 'Foreign Trip', '2024-01-22', '2024-01-27', 'asdf', 'fdsa', 0, 'officeOrder/FA2D2D2D024E1EEEA3CEF7EC3943C745.pdf', '{\"Auto0\":\"123\",\"train1\":\"234\",\"airplane2\":\"345\"}', 'travelDetail/FA2D2D2D76A81EDEA29DD1B260918FC7.pdf;travelDetail/FA2D2D2D8EF01EDEA29DCC5F4EBF8FD9.pdf;travelDetail/Release Order_Group E.pdf;', 123456, '2024-01-29', NULL, ''),
(14, 'clm14', 123456, 'Medical', '2024-01-08', '2024-01-27', 'wert', 'qwer', 0, 'officeOrder/FA2D2D2D024E1EEEA3CEF7EC3943C745.pdf', '{\"Auto0\":\"1234\",\"airplane1\":\"4567\"}', 'travelDetail/FA2D2D2D8EF01EDEA29DCC5F4EBF8FD9.pdf;travelDetail/Release Order_Group E.pdf;', 123456, '2024-01-29', NULL, ''),
(15, 'clm15', 123456, 'Domestic trip', '2024-01-08', '2024-01-13', 'qwerty', 'poiuyt', 0, 'officeOrder/InitiateSingleEntryPaymentSummary04-12-2023.pdf', '{\"Auto0\":\"123\",\"airplane1\":\"456\"}', 'travelDetail/Release Order_Group E.pdf;travelDetail/FA2D2D2D024E1EEEA3CEF7EC3943C745.pdf;', 123456, '2024-01-29', NULL, ''),
(16, 'clm16', 123456, 'Foreign Trip', '2024-01-01', '2024-01-06', 'qwery', 'poiuyt', 0, 'officeOrder/Apache RTR310 Brochure.pdf', '{\"Auto0\":\"123\",\"airplane1\":\"5678\"}', ';travelDetail/Release Order_Group E.pdf;travelDetail/InitiateSingleEntryPaymentSummary04-12-2023.pdf', 123456, '2024-01-29', NULL, ''),
(17, 'clm17', 123456, 'Foreign Trip', '2024-01-08', '2024-01-13', 'qwert', 'mnbv', 0, 'officeOrder/Apache RTR310 Brochure.pdf', '{\"Auto0\":\"123\",\"airplane1\":\"456\"}', 'travelDetail/InitiateSingleEntryPaymentSummary04-12-2023.pdf;travelDetail/Release Order_Group E.pdf', 123456, '2024-01-29', NULL, ''),
(18, 'clm18', 123456, 'Domestic trip', '2024-01-15', '2024-01-20', 'Anta Gas Power Station', 'EOC', 0, 'officeOrder/0116-TA_Rules.pdf', '{\"train0\":\"345\"}', 'travelDetail/InitiateSingleEntryPaymentSummary04-12-2023.pdf', 123456, '2024-01-29', NULL, '');

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
(123456, 'Farrah Luna', 'M', 'Vitae esse tempor vo', 'geqyjy@mailinator.com', '123', 'NS', 'Iure quae saepe nisi', 1),
(123465, 'Clementine Summers', 'M', 'Minus ut ad obcaecat', 'haruhe@mailinator.com', 'Pa$$w0rd!', 'ES', 'Voluptas corrupti e', 0),
(147852, 'Solomon Larsen', 'F', 'Ab aliqua Dolores f', 'koworyvit@mailinator.com', 'Pa$$w0rd!', 'NS', 'Eveniet a duis erro', 0),
(159864, 'Veda Vasquez', 'M', 'Sint est aut quia ', 'fobudyfobi@mailinator.com', 'Pa$$w0rd!', 'SRHQ', 'Anim consequuntur al', 1),
(456789, 'Trevor Foley', 'M', 'Sed sit eum quia adi', 'nuhamof@mailinator.com', '123', 'SRHQ', 'Eos rerum qui lauda', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projectlist`
--
ALTER TABLE `projectlist`
  ADD PRIMARY KEY (`code`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
