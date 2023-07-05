-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 12:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile`) VALUES
(1, 'ahmed', 'ahmed', 'upload/649da34c692131.80996145.jpg'),
(2, 'youssef', 'youssef', 'upload/649daf363b2391.14075997.jpg'),
(3, 'youssef', 'youssef', 'upload/649daf4288c249.44180001.jpg'),
(4, 'a', 'a', 'upload/649ee655029237.97283654.jpeg'),
(5, '', '', 'upload/64a192b9480bc0.71732532.');

-- --------------------------------------------------------

--
-- Table structure for table `allergies`
--

CREATE TABLE `allergies` (
  `allergie_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `file` varchar(100) NOT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allergies`
--

INSERT INTO `allergies` (`allergie_id`, `name`, `file`, `patient_id`) VALUES
(3, '\r\n                    nm', 'New Microsoft Word Document.docx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `name` varchar(30) DEFAULT NULL,
  `date` date NOT NULL,
  `time` varchar(25) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`name`, `date`, `time`, `phone`, `patient_id`, `doctor_id`, `id`) VALUES
('youssef', '2222-02-22', '03:33', '01208207501', 1, NULL, 10),
('yo', '4444-12-31', '12:21', '01208207501', 1, NULL, 11),
('you', '0022-02-12', '14:22', '01208207501', 1, 2, 12),
('you', '0022-02-12', '14:22', '01208207501', 1, 2, 13),
('you', '0022-02-12', '14:22', '01208207501', 1, 2, 14);

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `date` varchar(25) NOT NULL,
  `start_time` varchar(25) NOT NULL DEFAULT '00',
  `end_time` varchar(25) NOT NULL DEFAULT '00',
  `hospital_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`date`, `start_time`, `end_time`, `hospital_id`, `doctor_id`, `id`) VALUES
('Saturday', '12:22', '00:00', NULL, 2, 65);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(30) DEFAULT NULL,
  `e_mail` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `e_mail`, `message`, `file`, `hospital_id`, `patient_id`, `doctor_id`, `id`) VALUES
('hamada', 'youssef@gmail.com', '212', NULL, NULL, NULL, NULL, 6),
('youssef khaled', 'youssef@gmail.com', 'abcd', NULL, NULL, NULL, NULL, 12),
('youssef khaled', 'youssefaboseif72@gmail.com', 'cdvbnm,.sjbhjdnd', NULL, NULL, NULL, NULL, 13),
('hamada', 'enm@mr.jkk', 'ej', NULL, NULL, 1, NULL, 15),
('hamada', 'enm@mr.jkk', 'ej', NULL, NULL, 1, NULL, 16),
('hamada', 'enm@mr.jkk', 'ej', NULL, NULL, 1, NULL, 17),
('hamada', 'enm@mr.jkk', 'ej', NULL, NULL, 1, NULL, 18),
('hamada', 'youssef@gmail.com', '12q', '649885e861cb0.docx', NULL, 10, NULL, 22);

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `disease_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `file` varchar(100) NOT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`disease_id`, `name`, `file`, `patient_id`) VALUES
(4, '\r\n                    jdbsjfgb', 'cv abdelrhman.docx', NULL),
(5, '\r\n                    jdbsjfgb', 'cv abdelrhman.docx', NULL),
(6, '\r\n                    123456', '649884d71d3c4_cv abdelrhman.docx', 10);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `name` varchar(30) DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bloodtype` varchar(5) NOT NULL,
  `specialize` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `national_id` varchar(15) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`name`, `doctor_id`, `e_mail`, `password`, `phone`, `gender`, `bloodtype`, `specialize`, `location`, `hospital_id`, `national_id`, `address`, `image`) VALUES
('12e22', 2, 'yk1@test.com', '2122001y', '01208207501', 'Male', '', 'Psychiatry', 'https://f.com', NULL, '02345678922341', 'cm 1', 'Inseration_Sort.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `fractions`
--

CREATE TABLE `fractions` (
  `fraction_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `file` varchar(100) NOT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fractions`
--

INSERT INTO `fractions` (`fraction_id`, `name`, `file`, `patient_id`) VALUES
(13, '\r\n                    hwn', 'cv abdelrhman.docx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `name` varchar(30) DEFAULT NULL,
  `hospital_id` int(11) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `national_id` varchar(15) DEFAULT NULL,
  `specialities` varchar(150) DEFAULT NULL,
  `phone_doctor` varchar(15) DEFAULT NULL,
  `manager_full_name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `medical_specialities` varchar(150) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`name`, `hospital_id`, `e_mail`, `password`, `phone`, `national_id`, `specialities`, `phone_doctor`, `manager_full_name`, `address`, `location`, `medical_specialities`, `image`) VALUES
('ykmw', 4, 'yk10@test.com', '2122001y', '01208207514', '02345678922340', NULL, '01234567790', NULL, NULL, NULL, NULL, NULL),
('ykmw', 5, 'yk10@test.com', '', '01208207514', '02345678922340', NULL, '01234567790', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `vedio` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `textt` varchar(50) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `vedio`, `image`, `textt`, `doctor_id`, `hospital_id`) VALUES
(14, '', '64a16a348679f.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `name` varchar(30) DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bloodtype` varchar(5) NOT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `national_id` varchar(15) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`name`, `patient_id`, `e_mail`, `password`, `phone`, `gender`, `bloodtype`, `hospital_id`, `doctor_id`, `national_id`, `image`) VALUES
('yk', 1, 'yk1@test.com', '2122001y', '01208207514', 'Male', 'A-', NULL, NULL, '02345678922340', '64a07007e3a02_aa.jpeg'),
('yk', 2, 'yk1@test.com', '2122001y', '01208207503', 'Male', 'O-', NULL, NULL, '02345678922344', '649722ae4459d.jpg'),
('ykmw', 10, 'yk1010@test.com', 'fccbe59f92f31a632c2e2c26cd6aba875faeb949cabe5b4b51', '01208207512', 'Male', 'B-', NULL, NULL, '12345678922345', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `polltext` varchar(150) DEFAULT NULL,
  `option1` varchar(150) DEFAULT NULL,
  `option2` varchar(150) DEFAULT NULL,
  `option1count` int(11) DEFAULT NULL,
  `option2count` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `polltext`, `option1`, `option2`, `option1count`, `option2count`, `doctor_id`, `hospital_id`) VALUES
(8, 'damn\r\n\r\n\r\n                                                ', 'yes', 'yes', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `text` varchar(200) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `hospital_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`text`, `doctor_id`, `id`, `hospital_id`) VALUES
('                    d nbm\r\n                                        ', NULL, 4, NULL),
('                    men\r\n                                        ', NULL, 5, NULL),
('                    dfsgyhujkl;\r\n                                        ', NULL, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `viruses`
--

CREATE TABLE `viruses` (
  `viruse_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `file` varchar(100) NOT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `viruses`
--

INSERT INTO `viruses` (`viruse_id`, `name`, `file`, `patient_id`) VALUES
(4, '\r\n                    kj', 'cv abdelrhman.docx', NULL),
(5, '\r\n                     n', 'New Microsoft Word Document (2).docx', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allergies`
--
ALTER TABLE `allergies`
  ADD PRIMARY KEY (`allergie_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`disease_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `fractions`
--
ALTER TABLE `fractions`
  ADD PRIMARY KEY (`fraction_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll_ibfk_1` (`doctor_id`),
  ADD KEY `poll_ibfk_2` (`hospital_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_hospital_id` (`hospital_id`),
  ADD KEY `fk_doctor_post_id` (`doctor_id`);

--
-- Indexes for table `viruses`
--
ALTER TABLE `viruses`
  ADD PRIMARY KEY (`viruse_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `allergies`
--
ALTER TABLE `allergies`
  MODIFY `allergie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fractions`
--
ALTER TABLE `fractions`
  MODIFY `fraction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `viruses`
--
ALTER TABLE `viruses`
  MODIFY `viruse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allergies`
--
ALTER TABLE `allergies`
  ADD CONSTRAINT `allergies_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE;

--
-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calendar_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `contact_ibfk_3` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE SET NULL;

--
-- Constraints for table `diseases`
--
ALTER TABLE `diseases`
  ADD CONSTRAINT `diseases_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE SET NULL;

--
-- Constraints for table `fractions`
--
ALTER TABLE `fractions`
  ADD CONSTRAINT `fractions_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `hospital_id` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE SET NULL;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE SET NULL;

--
-- Constraints for table `poll`
--
ALTER TABLE `poll`
  ADD CONSTRAINT `fk_doctor_poll_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_poll_hospital_id` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `poll_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `poll_ibfk_2` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE SET NULL;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_doctor_post_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_post_hospital_id` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE SET NULL;

--
-- Constraints for table `viruses`
--
ALTER TABLE `viruses`
  ADD CONSTRAINT `viruses_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
