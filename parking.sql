-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 06:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` text NOT NULL,
  `contact` text NOT NULL,
  `addr` varchar(500) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `created_on` date NOT NULL,
  `updated_on` date NOT NULL,
  `role_id` int(11) NOT NULL,
  `last_login` date NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `fname`, `lname`, `gender`, `dob`, `contact`, `addr`, `notes`, `image`, `created_on`, `updated_on`, `role_id`, `last_login`, `delete_status`) VALUES
(1, 'admin', 'admin@gmail.com', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', 'admin', 'admin', 'Female', '2018-11-26', '9999999999', '<p>Kerala, India</p>\n', '<p>admin panel</p>\r\n', 'admin.jpg', '2024-03-23', '2024-03-23', 1, '0000-00-00', 0),
(3, 'sarath', 'sarathraju.tr@gmail.com', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', 'Sarath', 'Raju', 'Male', '2024-03-06', '9895828480', 'Kothamangalam\r\nCheruvattoor', 'Normal user', 'admin.jpg', '2024-03-29', '2024-03-29', 2, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `VehicleCat`, `CreationDate`) VALUES
(1, 'Four Wheeler Vehicle', '2019-07-05 11:06:50'),
(2, 'Two Wheeler Vehicle', '2019-07-05 11:07:09'),
(8, 'Bicycle', '2020-08-21 08:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicle`
--

CREATE TABLE `tblvehicle` (
  `ID` int(10) NOT NULL,
  `ParkingNumber` varchar(120) DEFAULT NULL,
  `VehicleCategory` varchar(120) NOT NULL,
  `VehicleCompanyname` varchar(120) DEFAULT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `OwnerName` varchar(120) DEFAULT NULL,
  `OwnerContactNumber` bigint(10) DEFAULT NULL,
  `InTime` timestamp NULL DEFAULT current_timestamp(),
  `OutTime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ParkingCharge` varchar(120) NOT NULL,
  `Remark` mediumtext NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicle`
--

INSERT INTO `tblvehicle` (`ID`, `ParkingNumber`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `InTime`, `OutTime`, `ParkingCharge`, `Remark`, `Status`) VALUES
(22, '330411097', 'Four Wheeler Vehicle', 'toyota', 'KL 10 B 2012', 'Sarath1', 9895828480, '2024-03-29 12:31:34', '2024-03-29 13:24:46', '', '', 'LOST'),
(23, '739516967', 'Four Wheeler Vehicle', 'toyota', 'KL 10 B 2011', 'Sarath2', 9895828480, '2024-03-29 13:27:57', '2024-03-29 13:28:14', '', '', 'LOST'),
(24, '282168174', 'Four Wheeler Vehicle', 'toyota', 'KL 10 B 2019', 'Sarath2', 9895828480, '2024-03-29 14:46:28', '2024-03-29 16:09:23', '20', 'test', 'Out'),
(25, '983368326', 'Four Wheeler Vehicle', 'toyota1', 'KL 10 B 2012_1', 'Sarath_1', 9895828480, '2024-04-06 15:05:26', '2024-04-06 15:17:57', '', '', 'IN'),
(26, '257504334', 'Four Wheeler Vehicle', 'toyota_2', 'KL 10 B 2019_2', 'Sarath2', 9895828480, '2024-04-06 15:06:06', NULL, '', '', 'Book');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `spot_id` int(11) NOT NULL,
  `category` varchar(45) NOT NULL,
  `parkingnumber` int(45) NOT NULL,
  `myemail` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `spot_id`, `category`, `parkingnumber`, `myemail`, `status`) VALUES
(4, 3, 'Four Wheeler Vehicle', 983368326, 'sarathraju.tr@gmail.com', 'IN'),
(5, 2, 'Four Wheeler Vehicle', 257504334, 'sarathraju.tr@gmail.com', 'Booked');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parking_spot`
--

CREATE TABLE `tbl_parking_spot` (
  `id` int(11) NOT NULL,
  `spot_name` varchar(45) NOT NULL,
  `spot_category` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_parking_spot`
--

INSERT INTO `tbl_parking_spot` (`id`, `spot_name`, `spot_category`, `status`) VALUES
(1, 'test', 2, 1),
(2, 'PS1', 1, 2),
(3, 'PS2', 1, 3),
(4, 'PS3', 1, 4),
(5, 'PS4', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_parking_spot`
--
ALTER TABLE `tbl_parking_spot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_parking_spot`
--
ALTER TABLE `tbl_parking_spot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
