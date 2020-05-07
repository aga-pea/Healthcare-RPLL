-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2020 at 05:55 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

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
  `appt_id` int(10) UNSIGNED NOT NULL,
  `appt_date` date NOT NULL,
  `appt_time` timestamp NOT NULL,
  `appt_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `medstaff_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appt_id`, `appt_date`, `appt_time`, `appt_status`, `patient_id`, `medstaff_id`) VALUES
(1, '2020-05-03', '2020-05-03 12:00:00', 'Accepted', 1, 2),
(2, '2020-05-03', '2020-05-02 23:17:27', 'Accepted', 1, 1),
(3, '2020-05-03', '2020-05-02 23:17:27', 'Accepted', 1, 1),
(4, '2020-05-03', '2020-05-02 23:17:27', 'Rejected , Doctor sudah penuh', 1, 1),
(5, '2020-05-06', '2020-05-06 02:00:00', 'Accepted', 1, 1),
(6, '2020-05-06', '2020-05-06 02:00:00', 'Accepted', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Gigi'),
(2, 'Umum'),
(3, 'Dokter Otak');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `disease_id` int(10) UNSIGNED NOT NULL,
  `disease_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `electronics`
--

CREATE TABLE `electronics` (
  `electronic_id` int(10) UNSIGNED NOT NULL,
  `electronic_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `electronic_qty` int(11) NOT NULL,
  `electronic_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `invoice_amount` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `cost_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `lab_id` int(10) UNSIGNED NOT NULL,
  `lab_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `record_id` int(10) UNSIGNED NOT NULL,
  `anamnesia` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `disease_id` int(10) UNSIGNED NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `visit_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_staff`
--

CREATE TABLE `medical_staff` (
  `medstaff_id` int(10) UNSIGNED NOT NULL,
  `medstaff_age` int(11) NOT NULL,
  `medstaff_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medstaff_uname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medstaff_pwd` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_staff`
--

INSERT INTO `medical_staff` (`medstaff_id`, `medstaff_age`, `medstaff_name`, `medstaff_uname`, `medstaff_pwd`, `department_id`) VALUES
(1, 30, 'Tom', 'tom123', 'mazdarx8', 1),
(2, 35, 'Burch', 'burch123', 'mazdarx8', 2),
(3, 28, 'Brainly', 'brain123', 'mazdarx8', 3);

-- --------------------------------------------------------

--
-- Table structure for table `medical_utilities`
--

CREATE TABLE `medical_utilities` (
  `util_id` int(10) UNSIGNED NOT NULL,
  `util_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `util_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `util_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(10) UNSIGNED NOT NULL,
  `medicine_exp_date` date NOT NULL,
  `medicine_level` int(11) NOT NULL,
  `medicine_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_price` int(11) NOT NULL,
  `medicine_qty` int(11) NOT NULL,
  `medicine_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_vendor` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2019_08_19_000000_create_failed_jobs_table', 1),
(43, '2020_04_20_164811_create_patient_table', 1),
(44, '2020_04_20_164835_create_department_table', 1),
(45, '2020_04_20_164915_create_medical_staff_table', 1),
(46, '2020_04_20_171242_create_nonmedical_staff_table', 1),
(47, '2020_04_20_171407_create_medical_utilities_table', 1),
(48, '2020_04_20_171418_create_disease_table', 1),
(49, '2020_04_20_171433_create_referral_hospital_table', 1),
(50, '2020_04_20_171447_create_medicine_table', 1),
(51, '2020_04_20_173037_create_electronics_table', 1),
(52, '2020_04_20_173057_create_vehicles_table', 1),
(53, '2020_04_20_173110_create_appointment_table', 1),
(54, '2020_04_20_175006_create_laboratory_table', 1),
(55, '2020_04_20_175148_create_patient_room_table', 1),
(56, '2020_04_20_175441_create_visit_cost_table', 1),
(57, '2020_04_20_175454_create_visit_table', 1),
(58, '2020_04_20_175506_create_schedule_table', 1),
(59, '2020_05_02_144617_create_medical_record_table', 1),
(60, '2020_05_02_144634_create_invoice_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nonmedical_staff`
--

CREATE TABLE `nonmedical_staff` (
  `nonmed_id` int(10) UNSIGNED NOT NULL,
  `nonmed_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nonmed_job` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nonmed_uname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nonmed_pwd` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nonmedical_staff`
--

INSERT INTO `nonmedical_staff` (`nonmed_id`, `nonmed_name`, `nonmed_job`, `nonmed_uname`, `nonmed_pwd`) VALUES
(1, 'Matthew', 'Receiptionist', 'matthew24', 'mazdarx8'),
(2, 'Matthew', 'Warehouse', 'matthew23', 'mazdarx8');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `patient_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_dob` date NOT NULL,
  `patient_gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_uname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_pwd` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`, `patient_address`, `patient_age`, `patient_dob`, `patient_gender`, `patient_uname`, `patient_pwd`) VALUES
(1, 'Matthew', 'Taman cibaduyut indah', 21, '2020-04-07', 'L', 'matthew34', 'mazdarx8');

-- --------------------------------------------------------

--
-- Table structure for table `patient_room`
--

CREATE TABLE `patient_room` (
  `room_no` int(10) UNSIGNED NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `room_availability` tinyint(1) NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `electronic_id` int(10) UNSIGNED NOT NULL,
  `medstaff_id` int(10) UNSIGNED NOT NULL,
  `util_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral_hospital`
--

CREATE TABLE `referral_hospital` (
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `hospital_address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(10) UNSIGNED NOT NULL,
  `schedule_date` date NOT NULL,
  `schedule_time` timestamp NOT NULL,
  `total_patient` int(11) NOT NULL,
  `medstaff_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `schedule_date`, `schedule_time`, `total_patient`, `medstaff_id`, `department_id`) VALUES
(1, '2020-05-03', '2020-05-02 23:17:27', 0, 1, 1),
(2, '2020-05-03', '2020-05-03 04:00:00', 0, 1, 1),
(3, '2020-05-03', '2020-05-03 05:00:00', 0, 2, 2),
(4, '2020-05-03', '2020-05-03 12:00:00', 1, 2, 2),
(5, '2020-05-05', '2020-05-04 23:00:00', 0, 3, 3),
(6, '2020-05-06', '2020-05-06 02:00:00', 8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(10) UNSIGNED NOT NULL,
  `vehicle_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_availability` tinyint(1) NOT NULL,
  `nonmed_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `visit_id` int(10) UNSIGNED NOT NULL,
  `qty_medicine` int(11) NOT NULL,
  `medicine_id` int(10) UNSIGNED NOT NULL,
  `cost_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visit_cost`
--

CREATE TABLE `visit_cost` (
  `cost_id` int(10) UNSIGNED NOT NULL,
  `treatment` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `medstaff_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appt_id`),
  ADD KEY `appointment_patient_id_foreign` (`patient_id`),
  ADD KEY `appointment_medstaff_id_foreign` (`medstaff_id`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `invoice_patient_id_foreign` (`patient_id`),
  ADD KEY `invoice_cost_id_foreign` (`cost_id`);

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
  ADD KEY `medical_record_patient_id_foreign` (`patient_id`),
  ADD KEY `medical_record_disease_id_foreign` (`disease_id`),
  ADD KEY `medical_record_hospital_id_foreign` (`hospital_id`),
  ADD KEY `medical_record_visit_id_foreign` (`visit_id`);

--
-- Indexes for table `medical_staff`
--
ALTER TABLE `medical_staff`
  ADD PRIMARY KEY (`medstaff_id`),
  ADD KEY `medical_staff_department_id_foreign` (`department_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `patient_room_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_room_medstaff_id_foreign` (`medstaff_id`),
  ADD KEY `patient_room_electronic_id_foreign` (`electronic_id`),
  ADD KEY `patient_room_util_id_foreign` (`util_id`);

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
  ADD KEY `schedule_medstaff_id_foreign` (`medstaff_id`),
  ADD KEY `schedule_department_id_foreign` (`department_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `vehicles_nonmed_id_foreign` (`nonmed_id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`visit_id`),
  ADD KEY `visit_medicine_id_foreign` (`medicine_id`),
  ADD KEY `visit_cost_id_foreign` (`cost_id`);

--
-- Indexes for table `visit_cost`
--
ALTER TABLE `visit_cost`
  ADD PRIMARY KEY (`cost_id`),
  ADD KEY `visit_cost_medstaff_id_foreign` (`medstaff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `disease_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `electronics`
--
ALTER TABLE `electronics`
  MODIFY `electronic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `lab_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `record_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_staff`
--
ALTER TABLE `medical_staff`
  MODIFY `medstaff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medical_utilities`
--
ALTER TABLE `medical_utilities`
  MODIFY `util_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `nonmedical_staff`
--
ALTER TABLE `nonmedical_staff`
  MODIFY `nonmed_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_room`
--
ALTER TABLE `patient_room`
  MODIFY `room_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_hospital`
--
ALTER TABLE `referral_hospital`
  MODIFY `hospital_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `visit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visit_cost`
--
ALTER TABLE `visit_cost`
  MODIFY `cost_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_medstaff_id_foreign` FOREIGN KEY (`medstaff_id`) REFERENCES `medical_staff` (`medstaff_id`),
  ADD CONSTRAINT `appointment_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_cost_id_foreign` FOREIGN KEY (`cost_id`) REFERENCES `visit_cost` (`cost_id`),
  ADD CONSTRAINT `invoice_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD CONSTRAINT `medical_record_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `disease` (`disease_id`),
  ADD CONSTRAINT `medical_record_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `referral_hospital` (`hospital_id`),
  ADD CONSTRAINT `medical_record_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `medical_record_visit_id_foreign` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`visit_id`);

--
-- Constraints for table `medical_staff`
--
ALTER TABLE `medical_staff`
  ADD CONSTRAINT `medical_staff_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `patient_room`
--
ALTER TABLE `patient_room`
  ADD CONSTRAINT `patient_room_electronic_id_foreign` FOREIGN KEY (`electronic_id`) REFERENCES `electronics` (`electronic_id`),
  ADD CONSTRAINT `patient_room_medstaff_id_foreign` FOREIGN KEY (`medstaff_id`) REFERENCES `medical_staff` (`medstaff_id`),
  ADD CONSTRAINT `patient_room_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `patient_room_util_id_foreign` FOREIGN KEY (`util_id`) REFERENCES `medical_utilities` (`util_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `schedule_medstaff_id_foreign` FOREIGN KEY (`medstaff_id`) REFERENCES `medical_staff` (`medstaff_id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_nonmed_id_foreign` FOREIGN KEY (`nonmed_id`) REFERENCES `nonmedical_staff` (`nonmed_id`);

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_cost_id_foreign` FOREIGN KEY (`cost_id`) REFERENCES `visit_cost` (`cost_id`),
  ADD CONSTRAINT `visit_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`);

--
-- Constraints for table `visit_cost`
--
ALTER TABLE `visit_cost`
  ADD CONSTRAINT `visit_cost_medstaff_id_foreign` FOREIGN KEY (`medstaff_id`) REFERENCES `medical_staff` (`medstaff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
