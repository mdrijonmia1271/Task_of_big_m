-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 04:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `big_m_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `university_name`, `created_at`, `updated_at`) VALUES
(1, 'DAKSHIN KATHALIA TAZEM ALI SECONDARY SCHOOL\r\n', NULL, NULL),
(2, 'JAFRAKHALI HIGH SCHOOL\r\n', NULL, NULL),
(3, 'LOCHA JUUNIOR HIGH SCHOOL\r\n', NULL, NULL),
(4, 'AMTALI A.K. PILOT HIGH SCHOOL\r\n', NULL, NULL),
(5, 'TARIKATA SECONDARY SCHOOL\r\n', NULL, NULL),
(6, 'CHUNAKHALI HIGH SCHOOL\r\n', NULL, NULL),
(7, 'MAFIZ UDDIN GIRLS PILOT HIGH SCHOOL\r\n', NULL, NULL),
(8, 'KEWABUNIA SECONDARY SCHOOL\r\n', NULL, NULL),
(9, 'KALAGACHIA YUNUS A K JUNIOR HIGH SCHOOL\r\n', NULL, NULL),
(10, 'HALIMA KHATUN G R GIRLS HIGH SCHOOL\r\n', NULL, NULL),
(11, 'K H AKOTA JUNIOR HIGH SCHOOL\r\n', NULL, NULL),
(12, 'MODDHO CHANDRA JUNIOR HIGH SCHOOL\r\n', NULL, NULL),
(13, 'UTTAR TIAKHALI JUNIOR GIRLS HIGH SCHOOL\r\n', NULL, NULL),
(14, 'CHAWRA CHANDRA JUNIOR HIGH SCHOOL\r\n', NULL, NULL),
(15, 'APATUNNESA JUNIOR ACADEMY\r\n', NULL, NULL),
(16, 'AMTALI MU. SECONDARY SCHOOL\r\n', NULL, NULL),
(17, 'SOUTH BENGAL IDEAL SCHOOL AND COLLEGE\r\n', NULL, NULL),
(18, 'Abdul Kadir Mollah City College', NULL, NULL),
(19, 'Gazipur Cantonment College', NULL, NULL),
(20, 'Adamjee Cantonment College', NULL, NULL),
(21, 'Aeronautical College of Bangladesh', NULL, NULL),
(22, 'Bangladesh Navy College Dhaka', NULL, NULL),
(23, 'Bangladesh Sweden Polytechnic Institute', NULL, NULL),
(24, 'Bhandaria Government College', NULL, NULL),
(25, 'Brindaban Government College', NULL, NULL),
(26, 'Carmichael College', NULL, NULL),
(27, 'Comilla Government College', NULL, NULL),
(28, 'Comilla Victoria Government College', NULL, NULL),
(29, 'Dhaka City College', NULL, NULL),
(30, 'Dhaka Commerce College', NULL, NULL),
(31, 'Dhaka Residential Model College', NULL, NULL),
(32, 'Dhaka Polytechnic Institute', NULL, NULL),
(33, 'Bangladesh Sweeden Polytechnic Institute', NULL, NULL),
(34, 'Rajshahi Polytechnic Institute', NULL, NULL),
(35, 'Chittagong Polytechnic Institute', NULL, NULL),
(36, 'Sylhet Polytechnic Institutee', NULL, NULL),
(37, 'Bogra Polytechnic Institute, Bogra', NULL, NULL),
(38, 'Abdul Kadir Mollah City College', NULL, NULL),
(39, 'University of Dhaka', NULL, NULL),
(40, 'Jahangirnagar University', NULL, NULL),
(41, 'Shahjalal University of Science and Technology', NULL, NULL),
(42, 'Chandpur Science and Technology University', NULL, NULL),
(43, 'Bogura Science and Technology University', NULL, NULL),
(44, 'Lakshmipur Science and Technology University', NULL, NULL),
(45, 'Habiganj Agricultural University', NULL, NULL),
(46, 'Islamic Arabic University', NULL, NULL),
(47, 'Manarat International University', NULL, NULL),
(48, 'Premier University, Chittagong', NULL, NULL),
(49, 'Green University of Bangladesh', NULL, NULL),
(50, 'Leading University', NULL, NULL),
(51, 'State University of Bangladesh[', NULL, NULL),
(52, 'Eastern University, Bangladesh[', NULL, NULL),
(53, 'Metropolitan University', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
