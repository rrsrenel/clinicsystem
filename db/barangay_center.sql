-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 08:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barangay_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `infant_detail`
--

CREATE TABLE `infant_detail` (
  `id` int(11) NOT NULL,
  `infant_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `last_checkup` datetime DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `height` double DEFAULT NULL,
  `vacinne` varchar(45) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `infant_tbl`
--

CREATE TABLE `infant_tbl` (
  `id` int(11) NOT NULL,
  `infant_id` varchar(12) DEFAULT NULL,
  `resident_id` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'PENDING',
  `number_of_months` double DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_receive_detail`
--

CREATE TABLE `medicine_receive_detail` (
  `id` int(11) NOT NULL,
  `medicine_receive_id` int(11) DEFAULT NULL,
  `medicine_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_receive_tbl`
--

CREATE TABLE `medicine_receive_tbl` (
  `id` int(11) NOT NULL,
  `medicine_receive_id` varchar(12) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `supplier_name` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_release_detail`
--

CREATE TABLE `medicine_release_detail` (
  `id` int(11) NOT NULL,
  `medicine_id` int(11) DEFAULT NULL,
  `medicine_release_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_release_tbl`
--

CREATE TABLE `medicine_release_tbl` (
  `id` int(11) NOT NULL,
  `medicine_release_id` varchar(12) DEFAULT NULL,
  `resident_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_tbl`
--

CREATE TABLE `medicine_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `brand` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_detail`
--

CREATE TABLE `patient_detail` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `blood_pressure` varchar(45) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `temperature` varchar(45) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_tbl`
--

CREATE TABLE `patient_tbl` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(12) DEFAULT NULL,
  `resident_id` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'PENDING',
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pregnancy_detail`
--

CREATE TABLE `pregnancy_detail` (
  `id` int(11) NOT NULL,
  `pregnancy_id` varchar(12) DEFAULT NULL,
  `pih` varchar(45) DEFAULT NULL,
  `lmp` varchar(45) DEFAULT NULL,
  `edc` varchar(45) DEFAULT NULL,
  `gp` varchar(45) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `checkup_date` date DEFAULT NULL,
  `last_checkup_date` date DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pregnancy_detail`
--

INSERT INTO `pregnancy_detail` (`id`, `pregnancy_id`, `pih`, `lmp`, `edc`, `gp`, `remarks`, `diagnosis`, `checkup_date`, `last_checkup_date`, `created_date`) VALUES
(1, 'OB211127001', '1', '1', '1', '1', 'qwe', 'qwe', '2021-11-28', '2021-11-26', '2021-11-26 21:08:59'),
(2, 'OB211127005', '1', '1', '1', '1', NULL, 'qwe', '2021-11-28', '2021-11-26', '2021-11-26 23:01:34'),
(3, 'OB211127006', '1', '1', '1', '1', NULL, 'qwe', '2021-11-11', '2021-11-15', '2021-11-26 23:06:47'),
(4, 'OB211127001', '1', '1', '1', '1', NULL, 'qwe', '2021-11-24', '2021-11-28', '2021-11-26 23:07:18'),
(5, 'OB211127001', '4', '5', '5', '5', NULL, 'qweqwe', '2021-12-01', '2021-11-28', '2021-11-26 23:13:23'),
(6, 'OB211127001', '2', '2', '3', '4', NULL, 'qwe', '2021-11-28', '2021-12-01', '2021-11-27 06:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `pregnancy_tbl`
--

CREATE TABLE `pregnancy_tbl` (
  `id` int(11) NOT NULL,
  `pregnancy_id` varchar(12) DEFAULT NULL,
  `resident_id` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'PENDING',
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pregnancy_tbl`
--

INSERT INTO `pregnancy_tbl` (`id`, `pregnancy_id`, `resident_id`, `status`, `created_date`, `updated_date`, `created_by`) VALUES
(1, 'OB211127001', '1', 'PENDING', '2021-11-26 21:08:59', '2021-11-26 21:08:59', NULL),
(5, 'OB211127005', '2', 'PENDING', '2021-11-26 23:01:34', '2021-11-26 23:01:34', NULL),
(6, 'OB211127006', '1', 'PENDING', '2021-11-26 23:06:47', '2021-11-26 23:06:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resident_tbl`
--

CREATE TABLE `resident_tbl` (
  `id` bigint(20) NOT NULL,
  `resident_type` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(45) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `civil_status` varchar(45) DEFAULT NULL,
  `educational_attainment` varchar(45) DEFAULT NULL,
  `occupation` varchar(45) DEFAULT NULL,
  `religion` varchar(45) DEFAULT NULL,
  `citizenship` varchar(45) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `house_number` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `municipality` varchar(45) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) DEFAULT NULL,
  `is_enable` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resident_tbl`
--

INSERT INTO `resident_tbl` (`id`, `resident_type`, `first_name`, `last_name`, `middle_name`, `birth_date`, `birth_place`, `gender`, `civil_status`, `educational_attainment`, `occupation`, `religion`, `citizenship`, `contact`, `house_number`, `street`, `municipality`, `created_date`, `updated_date`, `created_by`, `is_enable`) VALUES
(1, 'Normal Resident', 'Renel', 'Alinas', 'Apuntar', '1994-04-27', 'Carmona, Cavites', 'male', 'Single', 'BS Graduate', 'Developer', 'Catholic', 'Filipino', '09123456789', '1259', 'Milagrosa', 'Carmona', '2021-11-23 17:34:00', '2021-11-23 17:34:00', NULL, 1),
(2, 'Normal Resident', 'qwe', 'qwe', 'qwe', '2021-11-17', 'qwe', 'male', 'Single', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', '2021-11-23 18:01:11', '2021-11-23 18:01:11', NULL, 1),
(3, 'Normal Resident', 'Ronnvel', 'Alinas', 'Apuntar', '2001-06-01', 'Carmona, Cavite', 'male', 'Single', 'BS Graduate', 'Developer', 'Catholic', 'Filipino', '09123456789', '1259', 'Purok 5', 'Carmona', '2021-11-27 06:39:40', '2021-11-27 06:39:40', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_role_tbl`
--

CREATE TABLE `staff_role_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff_tbl`
--

CREATE TABLE `staff_tbl` (
  `id` int(11) NOT NULL,
  `staff_role_id` int(11) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `infant_detail`
--
ALTER TABLE `infant_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infant_tbl`
--
ALTER TABLE `infant_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_receive_detail`
--
ALTER TABLE `medicine_receive_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_receive_tbl`
--
ALTER TABLE `medicine_receive_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_release_detail`
--
ALTER TABLE `medicine_release_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_release_tbl`
--
ALTER TABLE `medicine_release_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_tbl`
--
ALTER TABLE `medicine_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_detail`
--
ALTER TABLE `patient_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_tbl`
--
ALTER TABLE `patient_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pregnancy_detail`
--
ALTER TABLE `pregnancy_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pregnancy_tbl`
--
ALTER TABLE `pregnancy_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident_tbl`
--
ALTER TABLE `resident_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_role_tbl`
--
ALTER TABLE `staff_role_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `infant_detail`
--
ALTER TABLE `infant_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infant_tbl`
--
ALTER TABLE `infant_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_receive_detail`
--
ALTER TABLE `medicine_receive_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_receive_tbl`
--
ALTER TABLE `medicine_receive_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_release_detail`
--
ALTER TABLE `medicine_release_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_release_tbl`
--
ALTER TABLE `medicine_release_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_tbl`
--
ALTER TABLE `medicine_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_detail`
--
ALTER TABLE `patient_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_tbl`
--
ALTER TABLE `patient_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pregnancy_detail`
--
ALTER TABLE `pregnancy_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pregnancy_tbl`
--
ALTER TABLE `pregnancy_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resident_tbl`
--
ALTER TABLE `resident_tbl`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff_role_tbl`
--
ALTER TABLE `staff_role_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
