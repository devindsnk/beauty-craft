-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 06:54 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beautycraft_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE `bankdetails` (
  `staffID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `accountNo` varchar(255) NOT NULL,
  `bankName` varchar(255) NOT NULL,
  `holdersName` varchar(255) NOT NULL,
  `branchName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`staffID`, `accountNo`, `bankName`, `holdersName`, `branchName`) VALUES
(000033, '19054789563247', 'People\'s bank', 'R Madhubhashana', 'Galle'),
(000034, '992457812456', 'People\'s bank', 'RM Rajapaksha', 'Giriulla'),
(000035, '874520133056', 'Sampath Bank', 'D Dissanayake', 'Kottawa'),
(000036, '45698632788', 'Sampath Bank', 'R Munasinghe', 'Rathnapura'),
(000037, '1247856392456', 'NSB bank', 'D Wathsala', 'Kuliyapitiya'),
(000038, '874563245', 'People\'s bank', 'S Shanika', 'Pannala'),
(000039, '958632444785', 'Sampath Bank', 'K Senevirathne', 'Polgahawela'),
(000040, '1446822', 'Sampath Bank', 'D Perera', 'Homagama'),
(000041, '7892154652323', 'NSB bank', 'N Charuka', 'Narammala'),
(000042, '87452014578923', 'NDB bank', 'I Dhananjaja', 'Polgahawela'),
(000043, '98647531313466', 'Commercial bank', 'K Mendis', 'Mattegoda');

-- --------------------------------------------------------

--
-- Table structure for table `closeddates`
--

CREATE TABLE `closeddates` (
  `defKey` int(11) NOT NULL,
  `date` date NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closeddates`
--

INSERT INTO `closeddates` (`defKey`, `date`, `note`) VALUES
(13, '2022-02-10', 'Function for salon staff'),
(14, '2022-04-01', 'Power cut'),
(15, '2022-04-13', 'New Year Holiday'),
(16, '2022-04-14', 'New Year Holiday');

-- --------------------------------------------------------

--
-- Table structure for table `commissionrates`
--

CREATE TABLE `commissionrates` (
  `defKey` int(11) NOT NULL,
  `rate` double NOT NULL,
  `changedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commissionrates`
--

INSERT INTO `commissionrates` (`defKey`, `rate`, `changedDate`) VALUES
(0, 20, '2022-03-25 00:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `registeredDate` datetime NOT NULL DEFAULT current_timestamp(),
  `customerNote` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `imgPath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `fName`, `lName`, `mobileNo`, `gender`, `registeredDate`, `customerNote`, `status`, `imgPath`) VALUES
(000001, 'Walk-In', 'Customer', 'N/A', '', '2022-03-25 11:26:29', NULL, '1', NULL),
(000067, 'Naveen', 'Dissanayake', '0717679714', 'M', '2022-02-02 13:12:03', NULL, '1', 'male.jpg'),
(000068, 'Sanduni', 'Nimasha', '0788810514', 'F', '2022-02-17 09:37:41', NULL, '1', 'female.jpg'),
(000069, 'Supun', 'Perera', '0718458477', 'M', '2022-01-20 09:39:48', NULL, '1', 'male.jpg'),
(000070, 'Hashini', 'Udara', '0777864212', 'F', '2022-03-25 09:42:11', NULL, '1', 'female.jpg'),
(000071, 'Senal', 'Karunarathne', '0770691535', 'M', '2022-03-25 09:43:40', NULL, '0', 'male.jpg'),
(000072, 'Risini', 'Piyathma', '0716458477', 'F', '2022-03-25 10:12:48', NULL, '1', 'female.jpg'),
(000073, 'Isuru', 'Nishadha', '0766699117', 'M', '2022-03-25 10:14:08', NULL, '1', 'male.jpg'),
(000074, 'Dilini', 'Kaushalya', '0717876591', 'F', '2022-03-25 10:15:43', NULL, '1', 'female.jpg'),
(000075, 'Sanduni', 'Sandeepa', '0704416390', 'F', '2022-03-25 10:16:35', NULL, '1', 'female.jpg'),
(000076, 'Dulaj', 'Tharindu', '0717338773', 'M', '2022-03-25 10:18:01', NULL, '1', 'male.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `reservationID` int(8) UNSIGNED ZEROFILL NOT NULL,
  `rating` double NOT NULL,
  `testimonial` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `generalleaves`
--

CREATE TABLE `generalleaves` (
  `staffID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `leaveDate` date NOT NULL,
  `respondedStaffID` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `requestedDate` date DEFAULT NULL,
  `reason` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `leaveType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generalleaves`
--

INSERT INTO `generalleaves` (`staffID`, `leaveDate`, `respondedStaffID`, `requestedDate`, `reason`, `status`, `leaveType`) VALUES
(000035, '2022-02-24', 000034, '2022-02-18', 'Religious observances', 1, 1),
(000035, '2022-03-22', NULL, '2022-02-17', 'Hospitalization', 3, 1),
(000035, '2022-03-26', NULL, '2022-03-25', 'Medical appointment', 2, 2),
(000035, '2022-04-14', NULL, '2022-03-17', 'Family function', 2, 1),
(000035, '2022-04-17', NULL, '2022-03-28', 'Family function', 2, 1),
(000036, '2022-03-29', 000034, '2022-03-25', 'For school function', 1, 1),
(000036, '2022-03-30', 000034, '2022-03-25', 'Home function', 0, 1),
(000036, '2022-04-13', NULL, '2022-02-16', 'Going to hospital', 2, 2),
(000037, '2022-03-15', 000034, '2022-03-01', 'Family Emergency', 1, 1),
(000037, '2022-03-31', NULL, '2022-02-26', 'Medical Appointment', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `intervals`
--

CREATE TABLE `intervals` (
  `serviceID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `slotNo` int(11) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intervals`
--

INSERT INTO `intervals` (`serviceID`, `slotNo`, `duration`) VALUES
(000041, 2, 20),
(000045, 2, 20),
(000047, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `leavelimits`
--

CREATE TABLE `leavelimits` (
  `defKey` int(11) NOT NULL,
  `generalLeave` int(11) NOT NULL,
  `medicalLeave` int(11) NOT NULL,
  `managerGeneralLeave` int(11) NOT NULL,
  `managerMedicalLeave` int(11) NOT NULL,
  `managerDailyLeave` int(11) NOT NULL,
  `evidenceLimit` int(11) NOT NULL,
  `changedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavelimits`
--

INSERT INTO `leavelimits` (`defKey`, `generalLeave`, `medicalLeave`, `managerGeneralLeave`, `managerMedicalLeave`, `managerDailyLeave`, `evidenceLimit`, `changedDate`) VALUES
(3, 2, 2, 2, 2, 2, 5, '2022-03-24 17:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `managerleaves`
--

CREATE TABLE `managerleaves` (
  `staffID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `leaveDate` date NOT NULL,
  `markedDate` date NOT NULL,
  `reason` text NOT NULL,
  `leaveType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managerleaves`
--

INSERT INTO `managerleaves` (`staffID`, `leaveDate`, `markedDate`, `reason`, `leaveType`) VALUES
(000034, '2022-02-22', '2022-02-08', 'Hospitalization', 2),
(000034, '2022-03-10', '2022-03-02', 'Home emergency', 1),
(000034, '2022-03-26', '2022-03-04', 'Medical Appointment', 2),
(000034, '2022-04-14', '2022-03-25', 'Religious observances', 1),
(000034, '2022-04-27', '2022-03-10', 'family function', 1);

-- --------------------------------------------------------

--
-- Table structure for table `otpverification`
--

CREATE TABLE `otpverification` (
  `mobileNo` varchar(10) NOT NULL,
  `OTP` varchar(6) NOT NULL,
  `timestamp` datetime NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymentinvoices`
--

CREATE TABLE `paymentinvoices` (
  `paymentInvoiceNo` int(8) UNSIGNED ZEROFILL NOT NULL,
  `reservationID` int(8) UNSIGNED ZEROFILL NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `datetime` datetime NOT NULL,
  `handledReceptID` varchar(255) NOT NULL,
  `voidDateTime` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchaserecords`
--

CREATE TABLE `purchaserecords` (
  `purchaseID` int(11) NOT NULL,
  `modelNo` varchar(11) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `purchaseDate` date DEFAULT NULL,
  `warrantyExpDate` date DEFAULT NULL,
  `resourceID` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaserecords`
--

INSERT INTO `purchaserecords` (`purchaseID`, `modelNo`, `manufacturer`, `price`, `purchaseDate`, `warrantyExpDate`, `resourceID`, `status`) VALUES
(10001, 'HG1200', 'Philips', 12000, '2022-03-26', '2023-03-26', 000010, 1),
(10002, 'HG1200', 'Philips', 12000, '2022-03-26', '2023-03-26', 000010, 1),
(10003, 'HG1200', 'Philips', 12000, '2022-03-26', '2023-03-26', 000010, 1),
(10004, 'HG1200', 'Philips', 12000, '2022-03-26', '2023-03-26', 000010, 1),
(10005, 'HG1200', 'Philips', 12000, '2022-03-26', '2023-03-26', 000010, 1),
(11001, 'SS200', 'Dyson', 6000, '2022-03-26', '2024-03-26', 000011, 1),
(11002, 'SS200', 'Dyson', 6000, '2022-03-26', '2024-03-26', 000011, 1),
(11003, 'SS200', 'Dyson', 6000, '2022-03-26', '2024-03-26', 000011, 1),
(11004, 'SS200', 'Dyson', 6000, '2022-03-26', '2024-03-26', 000011, 1),
(11005, 'SS200', 'Dyson', 6000, '2022-03-26', '2024-03-26', 000011, 1),
(11006, 'SS200', 'Dyson', 6000, '2022-03-26', '2024-03-26', 000011, 1),
(11007, 'SS200', 'Dyson', 6000, '2022-03-26', '2024-03-26', 000011, 1),
(11008, 'SS200', 'Dyson', 6000, '2022-03-26', '2024-03-26', 000011, 1),
(12001, 'CT3339', 'Collins', 14999, '2022-02-09', '2022-09-26', 000012, 1),
(12002, 'CT3339', 'Collins', 14999, '2022-02-09', '2022-09-26', 000012, 1),
(12003, 'CT3339', 'Collins', 14999, '2022-02-09', '2022-09-26', 000012, 1),
(12004, 'CT3339', 'Collins', 14999, '2022-02-09', '2022-09-26', 000012, 1),
(12005, 'CT3339', 'Collins', 14999, '2022-02-09', '2022-09-26', 000012, 1),
(12006, 'CT3339', 'Collins', 14999, '2022-02-09', '2022-09-26', 000012, 1),
(12007, 'CT3339', 'Collins', 14999, '2022-02-09', '2022-09-26', 000012, 1),
(12008, 'CT3339', 'Collins', 14999, '2022-02-09', '2022-09-26', 000012, 1),
(12009, 'CT3339', 'Collins', 14999, '2022-02-09', '2022-09-26', 000012, 1),
(12010, 'CT3339', 'Collins', 14999, '2022-02-09', '2022-09-26', 000012, 1),
(13001, 'SM525', 'GROHE', 20000, '2021-12-31', '0000-00-00', 000013, 1),
(13002, 'SM525', 'GROHE', 20000, '2021-12-31', '0000-00-00', 000013, 1),
(13003, 'SM525', 'GROHE', 20000, '2021-12-31', '0000-00-00', 000013, 1),
(13004, 'SM525', 'GROHE', 20000, '2021-12-31', '0000-00-00', 000013, 1),
(13005, 'SM525', 'GROHE', 20000, '2021-12-31', '0000-00-00', 000013, 1),
(13006, 'SM525', 'GROHE', 20000, '2021-12-31', '0000-00-00', 000013, 1),
(14001, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14002, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14003, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14004, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14005, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14006, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14007, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14008, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14009, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14010, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14011, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14012, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14013, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14014, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(14015, 'Q30', 'Matsui', 1000, '2022-02-28', '0000-00-00', 000014, 1),
(15001, 'HT99', 'Philips', 8800, '2022-02-02', '2023-03-26', 000015, 1),
(15002, 'HT99', 'Philips', 8800, '2022-02-02', '2023-03-26', 000015, 1),
(15003, 'HT99', 'Philips', 8800, '2022-02-02', '2023-03-26', 000015, 1),
(15004, 'HT99', 'Philips', 8800, '2022-02-02', '2023-03-26', 000015, 1),
(15005, 'HT99', 'Philips', 8800, '2022-02-02', '2023-03-26', 000015, 1),
(15006, 'HT99', 'Philips', 8800, '2022-02-02', '2023-03-26', 000015, 1),
(15007, 'HT99', 'Philips', 8800, '2022-02-02', '2023-03-26', 000015, 1),
(15008, 'HT99', 'Philips', 8800, '2022-02-02', '2023-03-26', 000015, 1);

--
-- Triggers `purchaserecords`
--
DELIMITER $$
CREATE TRIGGER `definePurchaseID` BEFORE INSERT ON `purchaserecords` FOR EACH ROW BEGIN
	SET @recCount = (SELECT COUNT(*) FROM purchaserecords AS PR WHERE PR.resourceID = NEW.resourceID);
    SET NEW.purchaseID = CONCAT(RIGHT(NEW.resourceID,3) , LPAD(@recCount+1,3,0));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `recallrequests`
--

CREATE TABLE `recallrequests` (
  `reservationID` int(8) UNSIGNED ZEROFILL NOT NULL,
  `reason` text NOT NULL,
  `requestedDate` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recallrequests`
--

INSERT INTO `recallrequests` (`reservationID`, `reason`, `requestedDate`, `status`) VALUES
(00000074, 'For delete the service', '2022-03-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `refundinvoices`
--

CREATE TABLE `refundinvoices` (
  `refundInvoiceNo` int(8) UNSIGNED ZEROFILL NOT NULL,
  `paymentInvoiceNo` int(8) UNSIGNED ZEROFILL NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `handledReceptID` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `voidDateTime` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationID` int(8) UNSIGNED ZEROFILL NOT NULL,
  `customerID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `serviceID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `staffID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `date` date NOT NULL,
  `startTime` int(11) NOT NULL,
  `endTime` int(11) NOT NULL,
  `remarks` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationID`, `customerID`, `serviceID`, `staffID`, `date`, `startTime`, `endTime`, `remarks`, `status`) VALUES
(00000074, 000067, 000041, 000036, '2022-04-29', 660, 0, NULL, 5),
(00000075, 000067, 000042, 000036, '2022-03-25', 540, 0, NULL, 1),
(00000076, 000069, 000043, 000037, '2022-01-11', 660, 0, NULL, 4),
(00000077, 000069, 000043, 000038, '2022-02-15', 570, 0, NULL, 0),
(00000078, 000068, 000048, 000038, '2022-03-09', 750, 0, NULL, 4),
(00000079, 000071, 000047, 000036, '2022-02-16', 540, 0, NULL, 4),
(00000080, 000070, 000045, 000037, '2022-02-18', 600, 0, NULL, 4),
(00000081, 000070, 000049, 000039, '2022-03-04', 960, 0, NULL, 4),
(00000085, 000001, 000044, 000037, '2022-02-02', 600, 0, NULL, 4),
(00000086, 000072, 000042, 000036, '2022-03-28', 540, 0, 'I\'ll bring my special shampoo', 0),
(00000088, 000069, 000046, 000037, '2022-03-28', 930, 0, NULL, 0),
(00000089, 000075, 000047, 000036, '2022-03-28', 720, 0, NULL, 0),
(00000090, 000068, 000047, 000037, '2022-04-21', 660, 0, NULL, 1),
(00000091, 000074, 000050, 000041, '2022-03-02', 570, 0, NULL, 4),
(00000092, 000069, 000051, 000039, '2022-03-28', 720, 0, NULL, 0),
(00000093, 000076, 000048, 000039, '2022-03-28', 600, 0, NULL, 0),
(00000094, 000073, 000050, 000041, '2022-03-28', 680, 0, NULL, 0),
(00000095, 000068, 000045, 000042, '2022-03-28', 670, 0, NULL, 0),
(00000096, 000073, 000050, 000043, '2022-03-28', 810, 0, NULL, 0),
(00000097, 000067, 000050, 000043, '2022-03-28', 620, 0, NULL, 0),
(00000098, 000074, 000049, 000037, '2022-03-28', 610, 0, NULL, 0),
(00000099, 000073, 000049, 000037, '2022-03-29', 600, 0, NULL, 1),
(00000100, 000068, 000048, 000039, '2022-03-29', 690, 0, NULL, 1),
(00000101, 000074, 000047, 000036, '2022-03-30', 960, 0, NULL, 1),
(00000102, 000076, 000052, 000041, '2022-03-30', 740, 0, NULL, 1),
(00000103, 000075, 000044, 000039, '2022-03-29', 900, 0, NULL, 1),
(00000104, 000074, 000045, 000042, '2022-02-15', 610, 0, NULL, 4),
(00000105, 000075, 000049, 000037, '2022-01-12', 1150, 0, NULL, 4),
(00000106, 000068, 000045, 000039, '2022-01-29', 540, 0, NULL, 4),
(00000107, 000070, 000045, 000042, '2022-03-04', 670, 0, NULL, 4),
(00000108, 000072, 000045, 000037, '2022-02-18', 540, 0, NULL, 4),
(00000109, 000076, 000050, 000041, '2022-02-20', 560, 0, NULL, 4),
(00000110, 000075, 000049, 000039, '2022-02-08', 1020, 0, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `resourceallocation`
--

CREATE TABLE `resourceallocation` (
  `serviceID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `slotNo` int(11) NOT NULL,
  `resourceID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `requiredQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resourceallocation`
--

INSERT INTO `resourceallocation` (`serviceID`, `slotNo`, `resourceID`, `requiredQuantity`) VALUES
(000041, 1, 000012, 1),
(000041, 1, 000013, 1),
(000041, 2, 000010, 1),
(000041, 2, 000011, 1),
(000041, 2, 000012, 1),
(000042, 1, 000011, 1),
(000042, 1, 000012, 1),
(000042, 1, 000013, 1),
(000043, 1, 000012, 1),
(000043, 1, 000014, 1),
(000044, 1, 000012, 1),
(000044, 1, 000013, 1),
(000045, 1, 000012, 1),
(000045, 1, 000013, 1),
(000045, 2, 000011, 1),
(000045, 2, 000012, 1),
(000046, 1, 000012, 1),
(000046, 1, 000014, 1),
(000047, 1, 000012, 1),
(000047, 1, 000013, 1),
(000047, 2, 000012, 1),
(000048, 1, 000010, 1),
(000048, 1, 000011, 1),
(000048, 1, 000012, 1),
(000049, 1, 000010, 1),
(000049, 1, 000011, 1),
(000049, 1, 000012, 1),
(000049, 1, 000013, 1),
(000050, 1, 000012, 1),
(000050, 1, 000014, 1),
(000050, 1, 000015, 1),
(000051, 1, 000012, 1),
(000051, 1, 000014, 1),
(000052, 1, 000012, 1),
(000052, 1, 000014, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resourceID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resourceID`, `name`, `quantity`, `status`) VALUES
(000010, 'Hair Irons', 5, 1),
(000011, 'Hair Dryer', 8, 1),
(000012, 'Adjustable Chair', 10, 1),
(000013, 'Wash Basins', 6, 1),
(000014, 'Scissors', 15, 1),
(000015, 'Hair Trimmers', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salarypayments`
--

CREATE TABLE `salarypayments` (
  `staffID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `month` date NOT NULL,
  `amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `paidDate` date NOT NULL,
  `additionalLeaveCount` int(11) NOT NULL,
  `servProCommission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salarypayments`
--

INSERT INTO `salarypayments` (`staffID`, `month`, `amount`, `status`, `paidDate`, `additionalLeaveCount`, `servProCommission`) VALUES
(000034, '2022-03-26', 65000, 0, '0000-00-00', 0, 0),
(000035, '2022-03-26', 41000, 0, '0000-00-00', 0, 0),
(000036, '2022-03-26', 30000, 0, '0000-00-00', 0, 0),
(000037, '2022-03-26', 30000, 0, '0000-00-00', 0, 0),
(000038, '2022-03-26', 30090, 0, '0000-00-00', 0, 90),
(000039, '2022-03-26', 30110, 0, '0000-00-00', 0, 110);

-- --------------------------------------------------------

--
-- Table structure for table `salaryrates`
--

CREATE TABLE `salaryrates` (
  `defKey` int(11) NOT NULL,
  `managerSalaryRate` double NOT NULL,
  `receptionistSalaryRate` double NOT NULL,
  `serviceProviderSalaryRate` double NOT NULL,
  `changedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaryrates`
--

INSERT INTO `salaryrates` (`defKey`, `managerSalaryRate`, `receptionistSalaryRate`, `serviceProviderSalaryRate`, `changedDate`) VALUES
(3, 65000, 41000, 30000, '2022-03-25 00:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `serviceproviders`
--

CREATE TABLE `serviceproviders` (
  `serviceID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `staffID` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceproviders`
--

INSERT INTO `serviceproviders` (`serviceID`, `staffID`) VALUES
(000041, 000036),
(000042, 000036),
(000043, 000038),
(000043, 000039),
(000044, 000037),
(000044, 000039),
(000045, 000036),
(000045, 000037),
(000045, 000039),
(000045, 000042),
(000046, 000037),
(000046, 000041),
(000047, 000036),
(000047, 000037),
(000047, 000038),
(000048, 000038),
(000048, 000039),
(000049, 000036),
(000049, 000037),
(000049, 000039),
(000050, 000039),
(000050, 000041),
(000050, 000043),
(000051, 000039),
(000052, 000037),
(000052, 000041),
(000052, 000042),
(000054, 000036),
(000054, 000037);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(255) NOT NULL,
  `customerCategory` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `noofTimeSlots` int(11) NOT NULL,
  `totalDuration` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `name`, `customerCategory`, `type`, `noofTimeSlots`, `totalDuration`, `price`, `status`) VALUES
(000041, 'Hair Coloring', 2, 'Hair Treatment', 2, 90, '890.00', 0),
(000042, 'Hair Wash', 2, 'Hair Treatment', 1, 40, '750.00', 1),
(000043, 'Hair Cut - Short', 1, 'Hair Cut', 1, 30, '300.00', 0),
(000044, 'Facial', 1, 'Face Treatment', 1, 50, '850.00', 1),
(000045, 'Keratin Treatment', 2, 'Hair Treatment', 2, 80, '1500.00', 1),
(000046, 'Child Hair Cutting', 3, 'Hair Cut', 1, 30, '250.00', 0),
(000047, 'Hot Oil Treatment', 3, 'Hair Treatment', 2, 60, '1250.00', 1),
(000048, 'Simple Iron', 2, 'Hair Styling', 1, 40, '450.00', 1),
(000049, 'Party Makeup', 2, 'Makeup', 1, 60, '550.00', 1),
(000050, 'Beard Trim', 1, 'Beard', 1, 30, '500.00', 1),
(000051, 'Hair Cut - Short', 1, 'Hair Cut', 1, 30, '400.00', 1),
(000052, 'Child Hair Cutting', 3, 'Hair Cut', 1, 20, '300.00', 1),
(000054, 'Nail Painting', 2, 'Nail Treatment', 1, 30, '850.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `staffType` int(11) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `gender` char(1) NOT NULL,
  `nic` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `imgPath` varchar(255) NOT NULL,
  `joinedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `fName`, `lName`, `staffType`, `mobileNo`, `gender`, `nic`, `address`, `email`, `dob`, `imgPath`, `joinedDate`, `status`) VALUES
(000029, 'Pasindu', 'Munasinghe', 1, '0762930963', 'M', '983400090V', 'Sample Address', 'pasindu@gmail.com', '1998-02-12', 'IMG-6231c2c5c77991.67617171.jpg', '2020-01-08 06:39:35', 1),
(000033, 'Ravindu', 'Madhubhashana', 2, '0766581992', 'M', '981351410V', 'No.415/3, Temple Road, Galle', 'ravindumadhu@gmail.com', '1998-05-14', 'IMG-61c2c18882dba6.18015999.jpg', '2020-03-18 11:47:27', 1),
(000034, 'Sanjana', 'Rajapaksha', 3, '0714665240', 'F', '199984212500', 'No.643/3, Bogahayaya,Giriulla', 'thashmisanjana@gmail.com', '1999-12-07', 'IMG-623c107b424ca6.39800240.jpg', '2021-02-18 12:02:27', 1),
(000035, 'Devin', 'Dissanayake', 4, '0768500228', 'M', '983300090V', 'No.65/3, School Road, Kottawa', 'devindissanayake@gmail.com', '1998-11-25', 'IMG-61cfaba71ac052.86263460.jpg', '2021-11-24 12:10:42', 1),
(000036, 'Ruwanthi', 'Munasinghe', 5, '0703807777', 'F', '978443320V', 'No.547/2, Kovil Road, Rathnapura', 'ruwanthimunasinghe@gmail.con', '1997-12-09', 'IMG-623c1328c7abd8.09484864.jpg', '2022-01-29 12:13:53', 1),
(000037, 'Piyumi', 'Wathsala', 5, '0763500214', 'F', '985648123V', 'No.125, Mahawewa, Kuliyapitiya', 'piyumiwathsala@gmail.com', '1998-03-04', 'female.jpg', '2021-03-03 09:47:56', 1),
(000038, 'Sumal', 'Shanka', 5, '0762540255', 'M', '981781410V', 'No.23/4, Narangoda, Giriulla', 'sumalishanika@gmail.com', '1998-06-26', 'male.jpg', '2022-03-02 09:51:24', 2),
(000039, 'Kelum', 'Senevirathne', 5, '0719010112', 'M', '981254290V', 'No.451, Station Road, Polgahawela', 'kelumsenevirathne@gmail.com', '1998-05-04', 'male.jpg', '2021-08-11 09:54:19', 1),
(000040, 'Dhanith', 'Perera', 3, '0717679717', 'M', '953300090V', '397/21, Bogahawila Road, Kottawa', 'dhanithperera@gmail.com', '1995-11-25', 'male.jpg', '2022-03-26 19:31:12', 1),
(000041, 'Nadun', 'Charuka', 5, '0772178529', 'M', '981355623V', 'No.65/3, Horagolla, Narammala', 'nadun@gmail.com', '1998-05-14', 'male.jpg', '2022-03-26 20:15:33', 1),
(000042, 'Induni', 'Dhanajana', 5, '0768418564', 'F', '199984214560', 'No.32, Temple Road, Polgahawela', 'dhananjana@gmail.com', '1999-12-07', 'female.jpg', '2022-03-26 20:23:49', 1),
(000043, 'Kasun', 'Mendis', 5, '0762540257', 'M', '992569623V', 'No.23, Araliya Uyana, Mattegoda', 'kasunmendis@gmail.com', '1999-09-12', 'male.jpg', '2022-03-26 20:26:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `serviceID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `slotNo` int(11) NOT NULL,
  `startingTime` int(11) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`serviceID`, `slotNo`, `startingTime`, `duration`) VALUES
(000041, 1, 0, 40),
(000042, 1, 0, 40),
(000043, 1, 0, 30),
(000044, 1, 0, 50),
(000045, 1, 0, 30),
(000046, 1, 0, 30),
(000047, 1, 0, 20),
(000048, 1, 0, 40),
(000049, 1, 0, 60),
(000050, 1, 0, 30),
(000051, 1, 0, 30),
(000052, 1, 0, 20),
(000054, 1, 0, 30),
(000041, 2, 60, 30),
(000045, 2, 50, 30),
(000047, 2, 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `mobileNo` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `failedAttempts` int(11) NOT NULL DEFAULT 0,
  `userType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`mobileNo`, `password`, `failedAttempts`, `userType`) VALUES
('0703807777', '$2y$10$0f2ZdqHdu6Xhy6X30/YPKOpMu2eKAPr3SOMTF7RFXpVJgumxvx2LO', 0, '5'),
('0704416390', '$2y$10$Xk8fy2mKvZWg3GLe9uwoGOfr/jRzvsP5KTj/dhWtbed2UOOKDRMfC', 0, '6'),
('0714665240', '$2y$10$abCdGcIYkwCL7hSOGhnY9u8H8fNFV8dZRD21GQz6MnuqQ5Ik8dJiy', 0, '3'),
('0716458477', '$2y$10$gq5fmWnWp8cXKdj0D5CfuO/w/HZLFI8UxhD3dbS7rTAze4X77yFOm', 0, '6'),
('0717338773', '$2y$10$TqY/BOalYNdc2PQhb/24Uuu/FHaiA0GN7pPmWBi6AfY.PVzdLSaUS', 0, '6'),
('0717679714', '$2y$10$9ln2lbZYQsV5hRpWyjoREuwrnydbsc.ve6AYypso2/YClrGwZy4fq', 0, '6'),
('0717679717', '$2y$10$wI8.5OXVByC5cl.HPNB8PORwh7/.ej5jMQz3q.ypCijsXAPZ.ocJm', 0, '3'),
('0717876591', '$2y$10$gIKWRGcI5f1F0rXR35TC0OJ/KwQzCZJfFzHOYIRdbvziCKhpvfzfO', 0, '6'),
('0718458477', '$2y$10$6tdESXLD6b8PZGwYoPpCIeNUz9.9P0aKaymdsw7hfrIhkHT.K7M.W', 0, '6'),
('0719010112', '$2y$10$gQENbyJLP1oBQLL1dNc/3eH9g7UpU2.1jL1WIIzxvNmUBFExTpL5K', 3, '5'),
('0762540257', '$2y$10$ZhcaqpGu5gei8n2.1YgfWuYPK4K4DI25CLtDj9T1emqWC5sxVIVaG', 0, '5'),
('0762930963', '$2y$10$U9tjZxUCGX46e9/pnVt9neLSLmn9PZ5Aj2KZyK/FQr4B2EVcG6vcW', 0, '1'),
('0763500214', '$2y$10$8TLME20KtP2tX/.E0LjsOeDns8yRU.IrOsvOLz9aRqmV.XIpuM3Ce', 0, '5'),
('0766581992', '$2y$10$g6fdkhMV8v53t2xErsAyAudzDHhtEY0L.wk2f9zogUBp72H0uFCuO', 0, '2'),
('0766699117', '$2y$10$ZCMbN35n7a1/PRUHYv5.buus4ohvByxN95yzc2x1T0OVQ5Jt16MXy', 0, '6'),
('0768418564', '$2y$10$PgQHCmDXJWWSLirOkFMY1uLqM/WoByN/EqUZhtccZtMb.811PEJsC', 1, '5'),
('0768500228', '$2y$10$0rHQurbK1S3wZ3f.QdMMueY2mDt638mbT9mgXRjSRqWigfVnWt1GW', 0, '4'),
('0772178529', '$2y$10$3.KvdMuV5FJdfLboMlc/De4pfR9KCE2cpqJLMWKQoSdTmE0tEiCP6', 1, '5'),
('0777864212', '$2y$10$2vTyzxIlXWo5kKioJymnjergV1ZnkEbBTP6BOAPIzkbBpDaxf6DUq', 0, '6'),
('0788810514', '$2y$10$b3O3W0t7LlW7EwEsAQHHyesp5MCAdmdm7yTj7OOavzdMWErsxo4L2', 0, '6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `closeddates`
--
ALTER TABLE `closeddates`
  ADD PRIMARY KEY (`defKey`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`reservationID`);

--
-- Indexes for table `generalleaves`
--
ALTER TABLE `generalleaves`
  ADD PRIMARY KEY (`staffID`,`leaveDate`),
  ADD KEY `fk2_to_staff_from_generalleaves` (`respondedStaffID`);

--
-- Indexes for table `intervals`
--
ALTER TABLE `intervals`
  ADD PRIMARY KEY (`serviceID`,`slotNo`);

--
-- Indexes for table `leavelimits`
--
ALTER TABLE `leavelimits`
  ADD PRIMARY KEY (`defKey`);

--
-- Indexes for table `managerleaves`
--
ALTER TABLE `managerleaves`
  ADD PRIMARY KEY (`staffID`,`leaveDate`);

--
-- Indexes for table `otpverification`
--
ALTER TABLE `otpverification`
  ADD PRIMARY KEY (`mobileNo`,`type`);

--
-- Indexes for table `paymentinvoices`
--
ALTER TABLE `paymentinvoices`
  ADD PRIMARY KEY (`paymentInvoiceNo`),
  ADD KEY `fk_to_reservations_from_paymentinvoice` (`reservationID`);

--
-- Indexes for table `purchaserecords`
--
ALTER TABLE `purchaserecords`
  ADD PRIMARY KEY (`purchaseID`);

--
-- Indexes for table `recallrequests`
--
ALTER TABLE `recallrequests`
  ADD PRIMARY KEY (`reservationID`);

--
-- Indexes for table `refundinvoices`
--
ALTER TABLE `refundinvoices`
  ADD PRIMARY KEY (`refundInvoiceNo`),
  ADD KEY `fk_to_paymentinvoices_from_refundinvoices` (`paymentInvoiceNo`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `fk_to_customers_from_reservations` (`customerID`),
  ADD KEY `fk_to_serviceproviders_from_reservations` (`serviceID`,`staffID`);

--
-- Indexes for table `resourceallocation`
--
ALTER TABLE `resourceallocation`
  ADD PRIMARY KEY (`serviceID`,`slotNo`,`resourceID`),
  ADD KEY `fk_to_resources_from_resourceallocation` (`resourceID`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resourceID`);

--
-- Indexes for table `salarypayments`
--
ALTER TABLE `salarypayments`
  ADD PRIMARY KEY (`staffID`,`month`);

--
-- Indexes for table `salaryrates`
--
ALTER TABLE `salaryrates`
  ADD PRIMARY KEY (`defKey`);

--
-- Indexes for table `serviceproviders`
--
ALTER TABLE `serviceproviders`
  ADD PRIMARY KEY (`serviceID`,`staffID`),
  ADD KEY `fk_to_staff_from_serviceproviders` (`staffID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`slotNo`,`serviceID`),
  ADD KEY `fk_to_services_from_timeslots` (`serviceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`mobileNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `closeddates`
--
ALTER TABLE `closeddates`
  MODIFY `defKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `leavelimits`
--
ALTER TABLE `leavelimits`
  MODIFY `defKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paymentinvoices`
--
ALTER TABLE `paymentinvoices`
  MODIFY `paymentInvoiceNo` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `refundinvoices`
--
ALTER TABLE `refundinvoices`
  MODIFY `refundInvoiceNo` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resourceID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `salaryrates`
--
ALTER TABLE `salaryrates`
  MODIFY `defKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD CONSTRAINT `fk_to_staff_from_bankdetails` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_to_reservations_from_feedback` FOREIGN KEY (`reservationID`) REFERENCES `reservations` (`reservationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `generalleaves`
--
ALTER TABLE `generalleaves`
  ADD CONSTRAINT `fk1_to_staff_from_generalleaves` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `intervals`
--
ALTER TABLE `intervals`
  ADD CONSTRAINT `fk_to_services_from_intervals` FOREIGN KEY (`serviceID`) REFERENCES `services` (`serviceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `managerleaves`
--
ALTER TABLE `managerleaves`
  ADD CONSTRAINT `fk_to_staff_from_managerleaves` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymentinvoices`
--
ALTER TABLE `paymentinvoices`
  ADD CONSTRAINT `fk_to_reservations_from_paymentinvoice` FOREIGN KEY (`reservationID`) REFERENCES `reservations` (`reservationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recallrequests`
--
ALTER TABLE `recallrequests`
  ADD CONSTRAINT `fk_to_reservations_from_recallrequests` FOREIGN KEY (`reservationID`) REFERENCES `reservations` (`reservationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `refundinvoices`
--
ALTER TABLE `refundinvoices`
  ADD CONSTRAINT `fk_to_paymentinvoices_from_refundinvoices` FOREIGN KEY (`paymentInvoiceNo`) REFERENCES `paymentinvoices` (`paymentInvoiceNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_to_customers_from_reservations` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON UPDATE CASCADE;

--
-- Constraints for table `resourceallocation`
--
ALTER TABLE `resourceallocation`
  ADD CONSTRAINT `fk_to_resources_from_resourceallocation` FOREIGN KEY (`resourceID`) REFERENCES `resources` (`resourceID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_to_timeslots_from_resourceallocation` FOREIGN KEY (`serviceID`,`slotNo`) REFERENCES `timeslots` (`serviceID`, `slotNo`) ON UPDATE CASCADE;

--
-- Constraints for table `serviceproviders`
--
ALTER TABLE `serviceproviders`
  ADD CONSTRAINT `fk_to_services_from_serviceproviders` FOREIGN KEY (`serviceID`) REFERENCES `services` (`serviceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_to_staff_from_serviceproviders` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD CONSTRAINT `fk_to_services_from_timeslots` FOREIGN KEY (`serviceID`) REFERENCES `services` (`serviceID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
