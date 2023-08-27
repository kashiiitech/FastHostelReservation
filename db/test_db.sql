-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2023 at 05:48 PM
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
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `rollNo` varchar(8) NOT NULL,
  `complaint` text NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`rollNo`, `complaint`, `dt`) VALUES
('20K-1000', 'I have no issues', '2022-12-05 07:46:12'),
('20P-0108', 'I have added this complain', '2022-12-05 05:35:58'),
('20P-0109', 'this hostel is too good..', '2022-12-03 10:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `rollNo` varchar(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone number1` varchar(11) NOT NULL,
  `phone number2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_contacts`
--

INSERT INTO `emergency_contacts` (`rollNo`, `name`, `phone number1`, `phone number2`) VALUES
('20K-1000', 'dummy', '03003259341', '03088533000'),
('20K-1090', 'Bahadur Ali', '03003259341', '1234 '),
('20P-0108', 'Lalb Bux', '03123044u94', '238283293 '),
('20P-0109', 'dummy', '03003259341', '1234 ');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_info`
--

CREATE TABLE `hostel_info` (
  `rollNo` varchar(8) NOT NULL,
  `hostel_name` varchar(30) NOT NULL,
  `room_no` int(2) NOT NULL,
  `fees` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel_info`
--

INSERT INTO `hostel_info` (`rollNo`, `hostel_name`, `room_no`, `fees`) VALUES
('20K-1090', 'United Boys Hostel', 4, '20000'),
('20P-0109', 'United Boys Hostel', 2, '9000'),
('20P-0108', 'Al-Mehran Boys Hostel', 5, '20000'),
('20K-1000', 'Al-Mehran Boys Hostel', 1, '20000');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `rollNo` varchar(8) NOT NULL,
  `department` varchar(5) NOT NULL,
  `mobileNO` varchar(11) NOT NULL,
  `cnicNo` varchar(15) NOT NULL,
  `postalAddress` text NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `warden_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `email`, `rollNo`, `department`, `mobileNO`, `cnicNo`, `postalAddress`, `dt`, `warden_id`) VALUES
('Amin Sadiq', 'amin@gmail.com', '20K-1000', 'BS-CS', '03088533000', '412022903239321', 'dadu', '2022-12-05 07:42:00', 1),
('usama', 'kashiiitech@gmail.com', '20K-1090', 'BS-CS', '03088533000', '1234', 'dd', '2022-12-02 14:40:55', 2),
('Muzamil', 'muzamil@nu.edu.pk', '20P-0108', 'BS-CS', '03130827342', '41202-290323932', 'Hyderabad', '2022-12-05 05:17:47', 2),
('Amanullah', 'aman@gmail.com', '20P-0109', 'BS-CS', '03088533000', '4120333309221', 'ddd', '2022-12-03 10:31:43', 1);

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `add_join_date` BEFORE INSERT ON `students` FOR EACH ROW BEGIN
  SET NEW.dt = SYSDATE();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `students_login`
--

CREATE TABLE `students_login` (
  `rollNo` varchar(8) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_login`
--

INSERT INTO `students_login` (`rollNo`, `password`) VALUES
('20K-1000', 'amin'),
('20K-1090', 'usama'),
('20P-0108', 'Muzamil'),
('20P-0109', 'aman');

-- --------------------------------------------------------

--
-- Table structure for table `students_medical_info`
--

CREATE TABLE `students_medical_info` (
  `rollNo` varchar(8) NOT NULL,
  `bloodGroup` varchar(2) NOT NULL,
  `medicalConditions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_medical_info`
--

INSERT INTO `students_medical_info` (`rollNo`, `bloodGroup`, `medicalConditions`) VALUES
('20K-1000', 'A+', 'nothing'),
('20K-1090', 'A+', 'nothing'),
('20P-0108', '0+', 'Fine'),
('20P-0109', 'dd', 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'kashiiitech', 'kashif', 'kashif'),
(2, 'muzamil', 'muzamil', 'muzamil'),
(3, 'amanullah', 'amanullah', 'amanullah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`rollNo`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`rollNo`);

--
-- Indexes for table `hostel_info`
--
ALTER TABLE `hostel_info`
  ADD KEY `fk_from_students_rollno` (`rollNo`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`rollNo`),
  ADD KEY `warden_id_from_users` (`warden_id`);

--
-- Indexes for table `students_login`
--
ALTER TABLE `students_login`
  ADD PRIMARY KEY (`rollNo`);

--
-- Indexes for table `students_medical_info`
--
ALTER TABLE `students_medical_info`
  ADD PRIMARY KEY (`rollNo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `fk_from_contactus` FOREIGN KEY (`rollNo`) REFERENCES `students` (`rollNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD CONSTRAINT `emergency_contacts_ibfk_1` FOREIGN KEY (`rollNo`) REFERENCES `students` (`rollNo`) ON DELETE CASCADE;

--
-- Constraints for table `hostel_info`
--
ALTER TABLE `hostel_info`
  ADD CONSTRAINT `fk_from_students_rollno` FOREIGN KEY (`rollNo`) REFERENCES `students` (`rollNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `warden_id_from_users` FOREIGN KEY (`warden_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `students_login`
--
ALTER TABLE `students_login`
  ADD CONSTRAINT `fk_from_contactus_rollno` FOREIGN KEY (`rollNo`) REFERENCES `students` (`rollNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_medical_info`
--
ALTER TABLE `students_medical_info`
  ADD CONSTRAINT `fk_mc_rollno` FOREIGN KEY (`rollNo`) REFERENCES `students` (`rollNo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
