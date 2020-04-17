-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2020 at 02:44 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare_rpll`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appt_id` int(11) NOT NULL,
  `appt_date` date DEFAULT NULL,
  `appt_time` time DEFAULT NULL,
  `appt_status` tinyint(1) DEFAULT NULL,
  `patient_id` varchar(10) DEFAULT NULL,
  `medstaff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `disease_id` int(11) NOT NULL,
  `disease_type` varchar(50) DEFAULT NULL,
  `disease_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `electronics`
--

CREATE TABLE `electronics` (
  `electronic_id` int(11) NOT NULL,
  `electronic_name` varchar(50) DEFAULT NULL,
  `electronic_qty` int(11) DEFAULT NULL,
  `electronic_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_amount` int(11) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_method` varchar(50) DEFAULT NULL,
  `patient_id` varchar(10) DEFAULT NULL,
  `record_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `lab_id` int(11) NOT NULL,
  `lab_name` varchar(50) DEFAULT NULL,
  `lab_availability` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `record_id` int(11) NOT NULL,
  `patient_id` varchar(10) DEFAULT NULL,
  `medstaff_id` int(11) DEFAULT NULL,
  `disease_id` int(11) DEFAULT NULL,
  `medicine_id` int(11) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `anamnesia` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medical_staff`
--

CREATE TABLE `medical_staff` (
  `medstaff_id` int(11) NOT NULL,
  `medstaff_age` int(11) DEFAULT NULL,
  `medstaff_name` varchar(50) DEFAULT NULL,
  `medstaff_uname` varchar(50) DEFAULT NULL,
  `medstaff_pwd` varchar(20) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medical_utilities`
--

CREATE TABLE `medical_utilities` (
  `util_id` int(11) NOT NULL,
  `util_name` varchar(50) DEFAULT NULL,
  `util_type` varchar(50) DEFAULT NULL,
  `util_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_exp_date` date DEFAULT NULL,
  `medicine_level` int(11) DEFAULT NULL,
  `medicine_name` varchar(30) DEFAULT NULL,
  `medicine_price` int(11) DEFAULT NULL,
  `medicine_qty` int(11) DEFAULT NULL,
  `medicine_type` varchar(30) DEFAULT NULL,
  `medicine_vendor` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nonmedical_staff`
--

CREATE TABLE `nonmedical_staff` (
  `nonmed_id` int(11) NOT NULL,
  `nonmed_name` varchar(50) DEFAULT NULL,
  `nonmed_job` varchar(50) DEFAULT NULL,
  `nonmed_uname` varchar(50) DEFAULT NULL,
  `nonmed_pwd` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` varchar(10) NOT NULL,
  `patient_name` varchar(50) DEFAULT NULL,
  `patient_address` varchar(50) DEFAULT NULL,
  `patient_age` int(11) DEFAULT NULL,
  `patient_dob` date DEFAULT NULL,
  `patient_gender` char(1) DEFAULT NULL,
  `patient_uname` varchar(50) DEFAULT NULL,
  `patient_pwd` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_room`
--

CREATE TABLE `patient_room` (
  `room_no` int(11) NOT NULL,
  `room_capacity` int(11) DEFAULT NULL,
  `room_availability` tinyint(1) DEFAULT NULL,
  `patient_id` varchar(10) DEFAULT NULL,
  `electronic_id` int(11) DEFAULT NULL,
  `medstaff_id` int(11) DEFAULT NULL,
  `util_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referral_hospital`
--

CREATE TABLE `referral_hospital` (
  `hospital_id` int(11) NOT NULL,
  `hospital_address` varchar(50) DEFAULT NULL,
  `hospital_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` varchar(10) NOT NULL,
  `schedule_date` date DEFAULT NULL,
  `schedule_time` time DEFAULT NULL,
  `medstaff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `vehicle_availability` tinyint(1) DEFAULT NULL,
  `nonmed_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appt_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `medstaff_id` (`medstaff_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `electronics`
--
ALTER TABLE `electronics`
  ADD PRIMARY KEY (`electronic_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `record_id` (`record_id`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `medstaff_id` (`medstaff_id`),
  ADD KEY `disease_id` (`disease_id`),
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `medical_staff`
--
ALTER TABLE `medical_staff`
  ADD PRIMARY KEY (`medstaff_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `medical_utilities`
--
ALTER TABLE `medical_utilities`
  ADD PRIMARY KEY (`util_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `nonmedical_staff`
--
ALTER TABLE `nonmedical_staff`
  ADD PRIMARY KEY (`nonmed_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_room`
--
ALTER TABLE `patient_room`
  ADD PRIMARY KEY (`room_no`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `medstaff_id` (`medstaff_id`),
  ADD KEY `electronic_id` (`electronic_id`),
  ADD KEY `util_id` (`util_id`);

--
-- Indexes for table `referral_hospital`
--
ALTER TABLE `referral_hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `medstaff_id` (`medstaff_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `nonmed_id` (`nonmed_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`medstaff_id`) REFERENCES `medical_staff` (`medstaff_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`record_id`) REFERENCES `medical_record` (`record_id`);

--
-- Constraints for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD CONSTRAINT `medical_record_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `medical_record_ibfk_2` FOREIGN KEY (`medstaff_id`) REFERENCES `medical_staff` (`medstaff_id`),
  ADD CONSTRAINT `medical_record_ibfk_3` FOREIGN KEY (`disease_id`) REFERENCES `disease` (`disease_id`),
  ADD CONSTRAINT `medical_record_ibfk_4` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`),
  ADD CONSTRAINT `medical_record_ibfk_5` FOREIGN KEY (`hospital_id`) REFERENCES `referral_hospital` (`hospital_id`);

--
-- Constraints for table `medical_staff`
--
ALTER TABLE `medical_staff`
  ADD CONSTRAINT `medical_staff_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `patient_room`
--
ALTER TABLE `patient_room`
  ADD CONSTRAINT `patient_room_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `patient_room_ibfk_2` FOREIGN KEY (`medstaff_id`) REFERENCES `medical_staff` (`medstaff_id`),
  ADD CONSTRAINT `patient_room_ibfk_3` FOREIGN KEY (`electronic_id`) REFERENCES `electronics` (`electronic_id`),
  ADD CONSTRAINT `patient_room_ibfk_4` FOREIGN KEY (`util_id`) REFERENCES `medical_utilities` (`util_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`medstaff_id`) REFERENCES `medical_staff` (`medstaff_id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`nonmed_id`) REFERENCES `nonmedical_staff` (`nonmed_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
