-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 03:02 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luxury_bnbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `bk_id` varchar(15) NOT NULL,
  `cl_id` varchar(15) NOT NULL,
  `rm_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `bk_id`, `cl_id`, `rm_id`) VALUES
(6, 'LBNBS64277CFFDC', 'LBNBS641FA895EF', 'LBNBS6422E4857B'),
(7, 'LBNBS64278246F2', 'LBNBS641FA895EF', 'LBNBS64233A1E66'),
(8, 'LBNBS6427848ECB', 'LBNBS641FA895EF', 'LBNBS6422E4857B'),
(9, 'LBNBS6427868770', 'LBNBS641FA895EF', 'LBNBS6422E4857B'),
(10, 'LBNBS64278AB167', 'LBNBS641FA895EF', 'LBNBS6422E4857B'),
(11, 'LBNBS6427CBC6CD', 'LBNBS641FA895EF', 'LBNBS6422E4857B'),
(12, 'LBNBS6427D8EA07', 'LBNBS641FA895EF', 'LBNBS6422E4857B'),
(13, 'LBNBS6427DB027A', 'LBNBS641FA895EF', 'LBNBS6422E4857B'),
(14, 'LBNBS64280F5044', 'LBNBS64280DF9B2', 'LBNBS6422E4857B'),
(15, 'LBNBS64280FBA70', 'LBNBS64280DF9B2', 'LBNBS6422E4857B'),
(16, 'LBNBS642810A19B', 'LBNBS64280DF9B2', 'LBNBS64233A1E66'),
(17, 'LBNBS642827D38F', 'LBNBS6428279976', 'LBNBS6422E4857B'),
(18, 'LBNBS642829B48B', 'LBNBS6428279976', 'LBNBS64233A1E66');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int(11) NOT NULL,
  `bk_id` varchar(15) NOT NULL,
  `bkd_expected_checkin_date` varchar(30) NOT NULL,
  `bkd_stay_duration` varchar(15) NOT NULL,
  `bkd_no_of_people` int(11) NOT NULL,
  `bkd_status` varchar(30) NOT NULL,
  `bkd_expected_checkout_date` varchar(30) NOT NULL,
  `bkd_checkin_date` varchar(30) NOT NULL,
  `bkd_checkout_date` varchar(30) NOT NULL,
  `bkd_date_of_booking` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`bkd_date_of_booking`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `bk_id`, `bkd_expected_checkin_date`, `bkd_stay_duration`, `bkd_no_of_people`, `bkd_status`, `bkd_expected_checkout_date`, `bkd_checkin_date`, `bkd_checkout_date`, `bkd_date_of_booking`) VALUES
(8, 'LBNBS6427848ECB', '13/04/2023', '7 days', 10, 'complete', '20/04/2023', '', '', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"4:10AM\"}'),
(9, 'LBNBS6427868770', '04/04/2023', '1 days', 2, 'complete', '05/04/2023', '', '', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"4:19AM\"}'),
(10, 'LBNBS64278AB167', '05/04/2023', '2 days', 3, 'complete', '07/04/2023', '', '', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"4:36AM\"}'),
(11, 'LBNBS6427CBC6CD', '10/04/2023', '2 days', 1, 'complete', '12/04/2023', '', '', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"9:14AM\"}'),
(12, 'LBNBS6427D8EA07', '03/04/2023', '2 days', 1, 'complete', '05/04/2023', '', '', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"10:10AM\"}'),
(13, 'LBNBS6427DB027A', '03/04/2023', '2 days', 1, 'complete', '05/04/2023', '', '', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"10:19AM\"}'),
(14, 'LBNBS64280F5044', '05/04/2023', '1 days', 3, 'complete', '06/04/2023', '', '', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"2:02PM\"}'),
(15, 'LBNBS64280FBA70', '26/04/2023', '2 days', 1, 'complete', '28/04/2023', '', '', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"2:04PM\"}'),
(16, 'LBNBS642810A19B', '03/04/2023', '1 days', 1, 'complete', '04/04/2023', '', '', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"2:08PM\"}'),
(17, 'LBNBS642827D38F', '19/04/2023', '1 days', 1, 'complete', '20/04/2023', '', '', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"3:47PM\"}'),
(18, 'LBNBS642829B48B', '03/04/2023', '2 days', 3, 'complete', '05/04/2023', '', '', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"3:55PM\"}');

-- --------------------------------------------------------

--
-- Table structure for table `client_account_info`
--

CREATE TABLE `client_account_info` (
  `id` int(11) NOT NULL,
  `cl_id` varchar(15) NOT NULL,
  `cl_username` varchar(30) NOT NULL,
  `cl_password` varchar(100) NOT NULL,
  `cl_date_created` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`cl_date_created`)),
  `cl_last_login` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`cl_last_login`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_account_info`
--

INSERT INTO `client_account_info` (`id`, `cl_id`, `cl_username`, `cl_password`, `cl_date_created`, `cl_last_login`) VALUES
(5, 'LBNBS6428279976', 'jkamah', '$2y$10$JHnG1ND1HC/PqWN9M/L/xeIldGQ.P3rBjKEwjk6Mc6vlBDMCv0.wu', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"3:46PM\"}', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"3:54PM\"}');

-- --------------------------------------------------------

--
-- Table structure for table `client_personal_info`
--

CREATE TABLE `client_personal_info` (
  `id` int(11) NOT NULL,
  `cl_id` varchar(15) NOT NULL,
  `cl_firstname` varchar(30) NOT NULL,
  `cl_lastname` varchar(30) NOT NULL,
  `cl_gender` varchar(30) NOT NULL,
  `cl_age` int(11) NOT NULL,
  `cl_national_id` int(11) NOT NULL,
  `cl_phone_number` varchar(20) NOT NULL,
  `cl_email` varchar(50) NOT NULL,
  `cl_nationality` varchar(30) NOT NULL,
  `cl_date_of_birth` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_personal_info`
--

INSERT INTO `client_personal_info` (`id`, `cl_id`, `cl_firstname`, `cl_lastname`, `cl_gender`, `cl_age`, `cl_national_id`, `cl_phone_number`, `cl_email`, `cl_nationality`, `cl_date_of_birth`) VALUES
(7, 'LBNBS6428279976', 'Joseph', 'Kamau', 'Male', 23, 37995566, '+254723465237', 'jkamah@gmail.com', 'Kenyan', '14/06/1996');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `d_id` varchar(15) NOT NULL,
  `cl_id` varchar(30) NOT NULL,
  `d_amount` int(11) NOT NULL,
  `d_date_generated` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`d_date_generated`)),
  `d_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `d_id`, `cl_id`, `d_amount`, `d_date_generated`, `d_status`) VALUES
(34, 'LBNBS64282808B0', 'LBNBS6428279976', 10, '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"3:48PM\"}', 'used'),
(35, 'LBNBS6428283FD0', 'LBNBS6428279976', 10, '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"3:49PM\"}', 'used'),
(36, 'LBNBS64282A92A9', 'LBNBS6428279976', 25, '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"3:58PM\"}', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `pm_id` varchar(15) NOT NULL,
  `bk_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `pm_id`, `bk_id`) VALUES
(42, 'LBNBS64282808B0', 'LBNBS642827D38F'),
(43, 'LBNBS64282A92A9', 'LBNBS642829B48B');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(11) NOT NULL,
  `pm_id` varchar(15) NOT NULL,
  `pmd_amount` int(11) NOT NULL,
  `pmd_mode` varchar(15) NOT NULL,
  `pmd_type` varchar(15) NOT NULL,
  `pmd_status` varchar(15) NOT NULL,
  `pmd_transaction_code` varchar(15) NOT NULL,
  `pmd_date` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`pmd_date`)),
  `pmd_balance` int(11) NOT NULL,
  `pmd_discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `pm_id`, `pmd_amount`, `pmd_mode`, `pmd_type`, `pmd_status`, `pmd_transaction_code`, `pmd_date`, `pmd_balance`, `pmd_discount`) VALUES
(14, 'LBNBS64282808B0', 600, 'Mpesa', 'Full payment', 'verified', 'QC45678RDF', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"3:49PM\"}', 0, 0),
(15, 'LBNBS64282A92A9', 1500, 'Mpesa', 'Deposit', 'pending', 'QC45678RDS', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"3:58PM\"}', 1490, 10);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `rm_id` varchar(15) NOT NULL,
  `rm_name` varchar(80) NOT NULL,
  `rm_type` varchar(20) NOT NULL,
  `rm_number` int(11) NOT NULL,
  `rm_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`rm_description`)),
  `rm_price` int(11) NOT NULL,
  `rm_status` varchar(20) NOT NULL,
  `rm_ratings` int(11) NOT NULL,
  `rm_reviews` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`rm_reviews`)),
  `rm_date_added` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`rm_date_added`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `rm_id`, `rm_name`, `rm_type`, `rm_number`, `rm_description`, `rm_price`, `rm_status`, `rm_ratings`, `rm_reviews`, `rm_date_added`) VALUES
(15, 'LBNBS6422E4857B', '2 Bedroomed Executive suite with living room bedroom and own kitchen', 'Single room', 1, '{\"description\":\"2 Bedroomed Executive suite with living room bedroom and own kitchen\",\"features\":\"2 Bedroomed Executive suite with living room bedroom and own kitchen\"}', 1200, 'Vaccant', 3, '[]', '{\"day\":\"Tuesday\",\"date\":\"28\\/03\\/2023\",\"time\":\"3:58PM\"}'),
(16, 'LBNBS64233A1E66', 'Comfortable single rooms with large sized bed', 'Single room', 2, '{\"description\":\"Comfortable single rooms with large sized bed\",\"features\":\"Comfortable single rooms with large sized bed\"}', 3000, 'Vaccant', 3, '[]', '{\"day\":\"Tuesday\",\"date\":\"28\\/03\\/2023\",\"time\":\"10:03PM\"}'),
(18, 'LBNBS64281475C9', 'Comfortable double room', 'Double room', 3, '{\"description\":\"Comfortable double room\",\"features\":\"Comfortable double room\"}', 1200, 'Available', 3, '[]', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"2:24PM\"}');

-- --------------------------------------------------------

--
-- Table structure for table `room_pictures`
--

CREATE TABLE `room_pictures` (
  `id` int(11) NOT NULL,
  `rm_id` varchar(15) NOT NULL,
  `rm_pictures` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_pictures`
--

INSERT INTO `room_pictures` (`id`, `rm_id`, `rm_pictures`) VALUES
(3, 'LBNBS6422E4857B', '82e49a6e-59cf-431b-a97f-73e9558fe448.jpg'),
(4, 'LBNBS64233A1E66', '8f87347a-3377-401e-8018-a2767ebd4195.jpg'),
(5, 'LBNBS64281475C9', 'c9846333-2129-411b-8d62-e114ef6fdf54.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff_account_info`
--

CREATE TABLE `staff_account_info` (
  `id` int(11) NOT NULL,
  `st_id` varchar(15) NOT NULL,
  `st_username` varchar(30) NOT NULL,
  `st_password` varchar(100) NOT NULL,
  `st_date_created` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`st_date_created`)),
  `st_last_login` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`st_last_login`)),
  `st_role` varchar(30) NOT NULL,
  `st_auth_level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_account_info`
--

INSERT INTO `staff_account_info` (`id`, `st_id`, `st_username`, `st_password`, `st_date_created`, `st_last_login`, `st_role`, `st_auth_level`) VALUES
(16, 'LBNBS641FBFD39D', 'admin', '$2y$10$lXordNYj1vOGLxVEHYqZHe/zOfWeN3p1d2hrZmZfoQTaguy0ZVINe', '{\"day\":\"Sunday\",\"date\":\"26\\/03\\/2023\",\"time\":\"6:45AM\"}', '{\"day\":\"Saturday\",\"date\":\"01\\/04\\/2023\",\"time\":\"3:49PM\"}', 'Manager', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `staff_personal_info`
--

CREATE TABLE `staff_personal_info` (
  `id` int(11) NOT NULL,
  `st_id` varchar(15) NOT NULL,
  `st_firstname` varchar(30) NOT NULL,
  `st_lastname` varchar(30) NOT NULL,
  `st_gender` varchar(15) NOT NULL,
  `st_date_of_birth` varchar(30) NOT NULL,
  `st_age` int(11) NOT NULL,
  `st_nationality` varchar(30) NOT NULL,
  `st_national_id` int(11) NOT NULL,
  `st_phone_number` varchar(15) NOT NULL,
  `st_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_personal_info`
--

INSERT INTO `staff_personal_info` (`id`, `st_id`, `st_firstname`, `st_lastname`, `st_gender`, `st_date_of_birth`, `st_age`, `st_nationality`, `st_national_id`, `st_phone_number`, `st_email`) VALUES
(23, 'LBNBS641FBFD39D', 'Caleb', 'Joesef', 'Male', '1999-09-12', 23, 'Kenyan', 37999165, '+254114923457', 'calebmwas@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`,`bk_id`),
  ADD UNIQUE KEY `bk_id` (`bk_id`),
  ADD KEY `cl_id` (`cl_id`),
  ADD KEY `rm_id` (`rm_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bk_id` (`bk_id`);

--
-- Indexes for table `client_account_info`
--
ALTER TABLE `client_account_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cl_id` (`cl_id`),
  ADD UNIQUE KEY `cl_username` (`cl_username`);

--
-- Indexes for table `client_personal_info`
--
ALTER TABLE `client_personal_info`
  ADD PRIMARY KEY (`id`,`cl_id`),
  ADD UNIQUE KEY `cl_id` (`cl_id`),
  ADD UNIQUE KEY `cl_national_id` (`cl_national_id`),
  ADD UNIQUE KEY `cl_phone_number` (`cl_phone_number`),
  ADD UNIQUE KEY `cl_email` (`cl_email`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`,`d_id`),
  ADD UNIQUE KEY `d_id` (`d_id`),
  ADD KEY `cl_id` (`cl_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`,`pm_id`),
  ADD UNIQUE KEY `pm_id` (`pm_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`,`pm_id`),
  ADD UNIQUE KEY `pm_id` (`pm_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`,`rm_id`),
  ADD UNIQUE KEY `rm_id` (`rm_id`),
  ADD UNIQUE KEY `rm_name` (`rm_name`),
  ADD UNIQUE KEY `rm_number` (`rm_number`);

--
-- Indexes for table `room_pictures`
--
ALTER TABLE `room_pictures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rm_id` (`rm_id`),
  ADD UNIQUE KEY `rm_pictures` (`rm_pictures`);

--
-- Indexes for table `staff_account_info`
--
ALTER TABLE `staff_account_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `st_id` (`st_id`),
  ADD UNIQUE KEY `st_username` (`st_username`);

--
-- Indexes for table `staff_personal_info`
--
ALTER TABLE `staff_personal_info`
  ADD PRIMARY KEY (`id`,`st_id`),
  ADD UNIQUE KEY `st_id` (`st_id`),
  ADD UNIQUE KEY `st_national_id` (`st_national_id`),
  ADD UNIQUE KEY `st_phone_number` (`st_phone_number`),
  ADD UNIQUE KEY `st_email` (`st_email`),
  ADD UNIQUE KEY `st_id_2` (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `client_account_info`
--
ALTER TABLE `client_account_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_personal_info`
--
ALTER TABLE `client_personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `room_pictures`
--
ALTER TABLE `room_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff_account_info`
--
ALTER TABLE `staff_account_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `staff_personal_info`
--
ALTER TABLE `staff_personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `client_personal_info` (`cl_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`rm_id`) REFERENCES `rooms` (`rm_id`);

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `fk_bookingId` FOREIGN KEY (`bk_id`) REFERENCES `bookings` (`bk_id`);

--
-- Constraints for table `client_account_info`
--
ALTER TABLE `client_account_info`
  ADD CONSTRAINT `fk_clientId` FOREIGN KEY (`cl_id`) REFERENCES `client_personal_info` (`cl_id`);

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `client_personal_info` (`cl_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`bk_id`) REFERENCES `bookings` (`bk_id`);

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`pm_id`) REFERENCES `payments` (`pm_id`);

--
-- Constraints for table `room_pictures`
--
ALTER TABLE `room_pictures`
  ADD CONSTRAINT `room_pictures_ibfk_1` FOREIGN KEY (`rm_id`) REFERENCES `rooms` (`rm_id`);

--
-- Constraints for table `staff_account_info`
--
ALTER TABLE `staff_account_info`
  ADD CONSTRAINT `fk_staffId` FOREIGN KEY (`st_id`) REFERENCES `staff_personal_info` (`st_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
