-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 08, 2022 at 05:06 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(25) NOT NULL,
  `ref_id` int(25) NOT NULL,
  `regid` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `typeofpayment` varchar(250) NOT NULL,
  `Accholdername` varchar(250) NOT NULL,
  `Accholderno` varchar(250) NOT NULL,
  `Accholderemail` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `receipt` varchar(250) NOT NULL,
  `paidat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

CREATE TABLE `leave_details` (
  `sr_no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `reg_no` varchar(11) NOT NULL,
  `studname` varchar(250) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `outime` datetime NOT NULL,
  `intime` datetime NOT NULL,
  `reason` mediumtext NOT NULL,
  `mess` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mainbook`
--

CREATE TABLE `mainbook` (
  `id` int(25) NOT NULL,
  `ref_id` int(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `regid` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `details` varchar(250) NOT NULL DEFAULT 'Double occupancy with attached WC',
  `room` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'Available',
  `cancle` varchar(250) NOT NULL DEFAULT 'No',
  `booked_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mainbook`
--

INSERT INTO `mainbook` (`id`, `ref_id`, `year`, `gender`, `regid`, `name`, `city`, `details`, `room`, `status`, `cancle`, `booked_at`) VALUES
(1, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '101A', 'Available', 'No', '2022-01-22 19:08:18'),
(2, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '101B', 'Available', 'No', '2022-01-22 19:09:17'),
(3, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '102A', 'Available', 'No', '2022-01-22 19:09:23'),
(4, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '102B', 'Available', 'No', '2022-01-22 19:09:27'),
(5, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '103A', 'Available', 'No', '2022-01-22 19:09:31'),
(6, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '103B', 'Available', 'No', '2022-01-22 19:09:35'),
(7, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '104A', 'Available', 'No', '2022-01-22 19:09:39'),
(8, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '104B', 'Available', 'No', '2022-01-22 19:09:42'),
(9, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '105A', 'Available', 'No', '2022-01-22 19:09:46'),
(10, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '105B', 'Available', 'No', '2022-01-22 19:09:50'),
(11, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '106A', 'Available', 'No', '2022-01-22 19:09:53'),
(12, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '106B', 'Available', 'No', '2022-01-22 19:09:56'),
(13, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '107A', 'Available', 'No', '2022-01-22 19:10:00'),
(14, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '107B', 'Available', 'No', '2022-01-22 19:10:04'),
(15, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '108A', 'Available', 'No', '2022-01-22 19:10:07'),
(16, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '108B', 'Available', 'No', '2022-01-22 19:10:14'),
(17, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '109A', 'Available', 'No', '2022-01-22 19:10:35'),
(18, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '109B', 'Available', 'No', '2022-01-22 19:10:39'),
(19, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '110A', 'Available', 'No', '2022-01-22 19:10:44'),
(20, 0, 'FE', 'male', '', '', '', 'Double occupancy with attached WC', '110B', 'Available', 'No', '2022-01-22 19:10:48'),
(21, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '111A', 'Available', 'No', '2022-01-23 17:17:23'),
(22, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '111B', 'Available', 'No', '2022-01-23 17:17:27'),
(23, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '112A', 'Available', 'No', '2022-01-23 17:17:34'),
(24, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '112B', 'Available', 'No', '2022-01-23 17:18:04'),
(25, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '113A', 'Available', 'No', '2022-01-23 17:18:08'),
(26, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '113B', 'Available', 'No', '2022-01-23 17:18:13'),
(27, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '114A', 'Available', 'No', '2022-01-23 17:18:17'),
(28, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '114B', 'Available', 'No', '2022-01-23 17:18:20'),
(29, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '115A', 'Available', 'No', '2022-01-23 17:18:24'),
(30, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '115B', 'Available', 'No', '2022-01-23 17:18:29'),
(31, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '116A', 'Available', 'No', '2022-01-23 17:18:32'),
(32, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '116B', 'Available', 'No', '2022-01-23 17:18:37'),
(33, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '117A', 'Available', 'No', '2022-01-23 17:18:41'),
(34, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '117B', 'Available', 'No', '2022-01-23 17:18:45'),
(35, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '118A', 'Available', 'No', '2022-01-23 17:18:48'),
(36, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '118B', 'Available', 'No', '2022-01-23 17:18:51'),
(37, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '119A', 'Available', 'No', '2022-01-23 17:18:55'),
(38, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '119B', 'Available', 'No', '2022-01-23 17:19:00'),
(39, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '120A', 'Available', 'No', '2022-01-23 17:19:04'),
(40, 0, 'FE', 'female', '', '', '', 'Double occupancy with attached WC', '120B', 'Available', 'No', '2022-01-23 17:19:08'),
(41, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '201A', 'Available', 'No', '2022-01-23 17:21:31'),
(42, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '201B', 'Available', 'No', '2022-01-23 17:21:34'),
(43, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '202A', 'Available', 'No', '2022-01-23 17:21:38'),
(44, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '202B', 'Available', 'No', '2022-01-23 17:21:41'),
(45, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '203A', 'Available', 'No', '2022-01-23 17:21:45'),
(46, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '203B', 'Available', 'No', '2022-01-23 17:21:49'),
(47, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '204A', 'Available', 'No', '2022-01-23 17:21:52'),
(48, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '204B', 'Available', 'No', '2022-01-23 17:21:56'),
(49, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '205A', 'Available', 'No', '2022-01-23 17:21:59'),
(50, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '205B', 'Available', 'No', '2022-01-23 17:22:03'),
(51, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '206A', 'Available', 'No', '2022-01-23 17:22:09'),
(52, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '206B', 'Available', 'No', '2022-01-23 17:22:13'),
(53, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '207A', 'Available', 'No', '2022-01-23 17:22:17'),
(54, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '207B', 'Available', 'No', '2022-01-23 17:22:21'),
(55, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '208A', 'Available', 'No', '2022-01-23 17:22:28'),
(56, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '208B', 'Available', 'No', '2022-01-23 17:22:32'),
(57, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '209A', 'Available', 'No', '2022-01-23 17:22:35'),
(58, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '209B', 'Available', 'No', '2022-01-23 17:22:39'),
(59, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '210A', 'Available', 'No', '2022-01-23 17:22:43'),
(60, 0, 'SE', 'male', '', '', '', 'Double occupancy with attached WC', '210B', 'Available', 'No', '2022-01-23 17:22:46'),
(61, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '211A', 'Available', 'No', '2022-01-23 17:24:17'),
(62, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '211B', 'Available', 'No', '2022-01-23 17:24:23'),
(63, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '212A', 'Available', 'No', '2022-01-23 17:24:26'),
(64, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '212B', 'Available', 'No', '2022-01-23 17:24:29'),
(65, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '213A', 'Available', 'No', '2022-01-23 17:24:32'),
(66, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '213B', 'Available', 'No', '2022-01-23 17:24:37'),
(67, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '214A', 'Available', 'No', '2022-01-23 17:24:43'),
(68, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '214B', 'Available', 'No', '2022-01-23 17:24:46'),
(69, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '215A', 'Available', 'No', '2022-01-23 17:24:49'),
(70, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '215B', 'Available', 'No', '2022-01-23 17:25:26'),
(71, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '216A', 'Available', 'No', '2022-01-23 17:25:31'),
(72, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '216B', 'Available', 'No', '2022-01-23 17:25:34'),
(73, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '217A', 'Available', 'No', '2022-01-23 17:25:45'),
(74, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '217B', 'Available', 'No', '2022-01-23 17:25:49'),
(75, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '218A', 'Available', 'No', '2022-01-23 17:25:53'),
(76, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '218B', 'Available', 'No', '2022-01-23 17:25:58'),
(77, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '219A', 'Available', 'No', '2022-01-23 17:26:01'),
(78, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '219B', 'Available', 'No', '2022-01-23 17:26:23'),
(79, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '220A', 'Available', 'No', '2022-01-23 17:26:26'),
(80, 0, 'SE', 'female', '', '', '', 'Double occupancy with attached WC', '220B', 'Available', 'No', '2022-01-23 17:26:29'),
(81, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '301A', 'Available', 'No', '2022-01-23 17:27:05'),
(82, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '301B', 'Available', 'No', '2022-01-23 17:27:10'),
(83, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '302A', 'Available', 'No', '2022-01-23 17:27:14'),
(84, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '302B', 'Available', 'No', '2022-01-23 17:27:17'),
(85, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '303A', 'Available', 'No', '2022-01-23 17:27:20'),
(86, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '303B', 'Available', 'No', '2022-01-23 17:27:24'),
(87, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '304A', 'Available', 'No', '2022-01-23 17:27:27'),
(88, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '304B', 'Available', 'No', '2022-01-23 17:27:33'),
(89, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '305A', 'Available', 'No', '2022-01-23 17:27:38'),
(90, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '305B', 'Available', 'No', '2022-01-23 17:27:42'),
(91, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '306A', 'Available', 'No', '2022-01-23 17:27:48'),
(92, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '306B', 'Available', 'No', '2022-01-23 17:27:53'),
(93, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '307A', 'Available', 'No', '2022-01-23 17:27:57'),
(94, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '307B', 'Available', 'No', '2022-01-23 17:28:01'),
(95, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '308A', 'Available', 'No', '2022-01-23 17:28:06'),
(96, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '308B', 'Available', 'No', '2022-01-23 17:28:09'),
(97, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '309A', 'Available', 'No', '2022-01-23 17:28:13'),
(98, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '309B', 'Available', 'No', '2022-01-23 17:28:16'),
(99, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '310A', 'Available', 'No', '2022-01-23 17:28:20'),
(100, 0, 'TE', 'male', '', '', '', 'Double occupancy with attached WC', '310B', 'Available', 'No', '2022-01-23 17:28:27'),
(101, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '311A', 'Available', 'No', '2022-01-23 17:29:10'),
(102, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '311B', 'Available', 'No', '2022-01-23 17:29:13'),
(103, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '312A', 'Available', 'No', '2022-01-23 17:29:17'),
(104, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '312B', 'Available', 'No', '2022-01-23 17:29:21'),
(105, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '313A', 'Available', 'No', '2022-01-23 17:29:24'),
(106, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '313B', 'Available', 'No', '2022-01-23 17:29:28'),
(107, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '314A', 'Available', 'No', '2022-01-23 17:29:45'),
(108, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '314B', 'Available', 'No', '2022-01-23 17:29:49'),
(109, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '315A', 'Available', 'No', '2022-01-23 17:29:52'),
(110, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '315B', 'Available', 'No', '2022-01-23 17:29:55'),
(111, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '316A', 'Available', 'No', '2022-01-23 17:29:59'),
(112, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '316B', 'Available', 'No', '2022-01-23 17:30:02'),
(113, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '317A', 'Available', 'No', '2022-01-23 17:30:08'),
(114, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '317B', 'Available', 'No', '2022-01-23 17:30:12'),
(115, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '318A', 'Available', 'No', '2022-01-23 17:30:18'),
(116, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '318B', 'Available', 'No', '2022-01-23 17:30:22'),
(117, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '319A', 'Available', 'No', '2022-01-23 17:30:25'),
(118, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '319B', 'Available', 'No', '2022-01-23 17:30:28'),
(119, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '320A', 'Available', 'No', '2022-01-23 17:30:32'),
(120, 0, 'TE', 'female', '', '', '', 'Double occupancy with attached WC', '320B', 'Available', 'No', '2022-01-23 17:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(25) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`, `category`) VALUES
(1, 'idli sambhar', 'breakfast'),
(2, 'Misal', 'Lunch'),
(3, 'Paneer Tikka', 'Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `description`) VALUES
(1, 'Fees', 'Pay Fees ....'),
(3, 'Exam Form', 'Deadline is 13th of dec'),
(4, 'VACATIONS', 'FROM 10 JAN O 15 FEB');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(11) NOT NULL,
  `notification` varchar(250) NOT NULL,
  `category` varchar(255) NOT NULL,
  `gender` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pincode`
--

CREATE TABLE `pincode` (
  `id` int(11) NOT NULL,
  `pincode` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pincode`
--

INSERT INTO `pincode` (`id`, `pincode`) VALUES
(1, '111045'),
(2, '410038'),
(3, '411000'),
(4, '411001'),
(5, '411002'),
(6, '411003'),
(7, '411004'),
(8, '411005'),
(9, '411006'),
(10, '411007'),
(11, '411008'),
(12, '411009'),
(13, '411011'),
(14, '411012'),
(15, '411013'),
(16, '411014'),
(17, '411015'),
(18, '411016'),
(19, '411020'),
(20, '411021'),
(21, '411022'),
(22, '411023'),
(23, '411024'),
(24, '411025'),
(25, '411028'),
(26, '411029'),
(27, '411030'),
(28, '411031'),
(29, '411032'),
(30, '411036'),
(31, '411037'),
(32, '411038'),
(33, '411040'),
(34, '411041'),
(35, '411042'),
(36, '411043'),
(37, '411045'),
(38, '411046'),
(39, '411047'),
(40, '411048'),
(41, '411051'),
(42, '411052'),
(43, '411053'),
(44, '411055'),
(45, '411058'),
(46, '411060'),
(47, '411066'),
(48, '411067'),
(49, '411068'),
(50, '411078'),
(51, '411230'),
(52, '412029'),
(53, '412047'),
(54, '412047'),
(55, '412105'),
(56, '412115'),
(57, '412207'),
(58, '412307'),
(59, '412308'),
(60, '412337');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `F_name` varchar(250) NOT NULL,
  `L_name` varchar(250) NOT NULL,
  `reg_no` varchar(11) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `Father_name` varchar(255) NOT NULL,
  `Father_no` varchar(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `year` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `Nationality` varchar(250) NOT NULL,
  `State` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `pincode` int(11) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `valid` varchar(25) NOT NULL,
  `cat_id` int(25) NOT NULL,
  `token` varchar(25) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `typedoc` varchar(255) NOT NULL,
  `address_doc` varchar(250) NOT NULL,
  `fee_doc` varchar(255) NOT NULL,
  `hostel_fee` varchar(250) NOT NULL,
  `feespaid` varchar(10) NOT NULL DEFAULT 'No',
  `rooms_booked` varchar(250) NOT NULL,
  `roomtype` varchar(25) NOT NULL,
  `url` varchar(255) NOT NULL,
  `qrcode` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `F_name`, `L_name`, `reg_no`, `mobile_no`, `Father_name`, `Father_no`, `gender`, `email`, `year`, `branch`, `Nationality`, `State`, `city`, `pincode`, `pass`, `valid`, `cat_id`, `token`, `created_at`, `typedoc`, `address_doc`, `fee_doc`, `hostel_fee`, `feespaid`, `rooms_booked`, `roomtype`, `url`, `qrcode`) VALUES
(1, '', 'Sapkal', '', '', '', '', 'male', 'officer@pict.edu', '', '', '', '', '', 0, '11eabe874b5cc4af388b3b6f5444d120', 'Yes', 1, '679210', '2022-01-01 18:56:52', '', '', '', '', 'No', '', '', '', ''),
(44, '', 'Kadam', '', '', '', '', 'female', 'kadam@pict.edu', '', '', '', '', '', 0, '5495e94cdb9b777577bf96cf91783c18', 'Yes', 2, '335463', '2022-01-01 18:58:40', '', '', '', '', 'No', '', '', '', ''),
(45, '', 'Gaikwad', '', '', '', '', 'female', 'gaikwad@pict.edu', '', '', '', '', '', 0, 'c6449a83aa32873ef6632048f8b049e3', 'Yes', 2, '759790', '2022-01-01 18:59:30', '', '', '', '', 'No', '', '', '', ''),
(46, '', 'Barse', '', '', '', '', 'female', 'barse@pict.edu', '', '', '', '', '', 0, '9f409df01405d8c9c210ba8466cc51b5', 'Yes', 2, '269014', '2022-01-01 19:00:10', '', '', '', '', 'No', '', '', '', ''),
(47, '', 'Diwakar', '', '', '', '', 'male', 'diwakar@pict.edu', '', '', '', '', '', 0, 'b35685c07eed70ebfcb21c6ec8e4ca22', 'Yes', 2, '338104', '2022-01-01 19:01:45', '', '', '', '', 'No', '', '', '', ''),
(48, '', 'Aurange', '', '', '', '', 'male', 'aurange@oict.edu', '', '', '', '', '', 0, '25e2375e63f1b7982b4aac7a5752888c', 'Yes', 2, '321172', '2022-01-01 19:02:43', '', '', '', '', 'No', '', '', '', ''),
(49, '', 'Bahirat', '', '', '', '', 'male', 'bahirat@pict.edu', '', '', '', '', '', 0, '3831927d37915c7499dd18d393bb87d3', 'Yes', 2, '606638', '2022-01-01 19:03:57', '', '', '', '', 'No', '', '', '', ''),
(54, 'Urmi', 'Matade', 'C2k20209888', '9370330480', 'Changdeo', '9988776655', 'female', 'urmicm007@gmail.com', 'FE', 'COMP', 'Indian', 'MAHARASHTRA', 'Aurangabad', 423701, 'bb58171d73b97512d6a672298a8a5859', 'Yes', 3, '895606', '2022-01-06 14:37:46', 'Adhar card', 'js_report.pdf', 'js_report-1641460066.pdf', '', 'Yes', '', '', 'https://docs.google.com/forms/d/e/1FAIpQLSf8gYlhWTKFmoebiv6AH5HPoKpTyMfpd_UMgPm1Gyqmxwr8NQ/formResponse?entry.668025847=C2k20209888+Urmi+Matade', 0x234e414d453f),
(56, 'Sakshi', 'Kad', 'E2k19103676', '1234567890', 'Dipak', '1234567890', 'female', 'sakshikad51@gmail.com', 'FE', 'ENTC', 'Indian', 'Maharashtra', 'Pune', 440001, 'f08d753ba0ae5e4afbd83cd9a7b502e1', 'Yes', 3, '579939', '2022-01-11 18:12:51', 'Adhar card', 'SWOT.pdf', 'SWOT.pdf', 'SWOT.pdf', 'No', '', '', '', ''),
(59, 'mess', '', '', '', '', '', '', 'mess@gmail.com', '', '', '', '', '', 0, '3aec5b3bc2bc68ac1938d596f667381a', 'Yes', 4, '249588', '2022-01-13 15:40:54', '', '', '', '', 'No', '', '', '', ''),
(62, 'Dhananjay', 'Thosar', 'C2K19106306', '8390833406', 'Kamlakar', '9604029326', 'male', 'dhananjaythosar2002@gmail.com', 'FE', 'COMP', 'Indian', 'Maharashtra', 'Pune', 440001, '051ff33015a1bfa27aef002344e4410b', 'Yes', 3, '279045', '2022-01-22 14:07:44', 'Adhar card', 'generateReport.pdf', 'SY RESULT.pdf', 'SY RESULT.pdf', 'Yes', '', '', 'https://docs.google.com/forms/d/e/1FAIpQLSf8gYlhWTKFmoebiv6AH5HPoKpTyMfpd_UMgPm1Gyqmxwr8NQ/formResponse?entry.668025847=C2K19106306+Dhananjay+Thosar', 0x234e414d453f),
(64, 'urmi', 'matade', 'C2K20207772', '9370330480', 'changdeo', '9370339999', 'female', 'urmicm07@gmail.com', 'FE', 'COMP', 'Indian', 'Maharashtra', 'Aurangabad', 423701, '0d06e1506de3e5840aa42996627d553f', 'Yes', 3, '787345', '2022-01-25 16:14:31', 'Adhar card', '31341_AssB2.pdf', '31341_AssB2.pdf', '', 'No', '', '', '', ''),
(65, 'Rutuja', 'Banginwar', 'C2K20207388', '8975458575', 'Sudhir', '9637911539', 'female', 'rutujasb123@gmail.com', 'FE', 'COMP', 'Indian', 'Maharashtra', 'Amravati', 444603, '2ffe178f482245d38b5da70d31a78bd2', 'Yes', 3, '680294', '2022-02-04 16:22:10', 'Adhar card', '', '', '', 'No', '', '', '', ''),
(68, 'Rajesh', 'Verma', 'I2K20203456', '8546962355', 'Sudhir', '9637911539', 'male', 'banginwarrutuja@gmail.com', 'FE', 'IT', 'Indian', 'Maharashtra', 'Amravati', 444603, '10ae8642323251b47e9c501ac2ff3613', 'Yes', 3, '761549', '2022-02-04 20:07:32', '', '', '', '', 'No', '', '', '', ''),
(69, 'Rutu', 'Banginwar', 'C2K20207388', '8087300460', 'Sudhir', '9637911539', 'female', 'banginwarvarsha@gmail.com', 'FE', 'COMP', 'Indian', 'Maharashtra', 'Amravati', 444603, '2ffe178f482245d38b5da70d31a78bd2', 'No', 3, '446755', '2022-02-04 20:46:44', 'Adhar card', '31303_A6.pdf', '31303_LPA3.pdf', '', 'No', '', '', '', ''),
(70, 'Aarti', 'Kad', 'C2K12345678', '1234567890', 'Nitin', '1234567890', 'female', 'aartikad@gmail.com', 'SE', 'COMP', 'Indian', 'Maharashtra', 'Pune', 441007, '03a548507f404380a212886fd2ccf449', 'Yes', 3, '497362', '2022-02-06 19:14:57', 'Adhar card', 'SWOT.pdf', 'SWOT.pdf', '', 'Yes', '', '', '', ''),
(72, 'Jagruti', 'Kad', 'E2k19103676', '1234567890', 'Dipak', '1234567890', 'female', 'sakshikad25@gmail.com', 'SE', 'ENTC', 'Indian', 'Maharashtra', 'Nashik', 440001, 'd6b9f1424dbc3edb76f4bcd99965e0eb', 'Yes', 3, '974844', '2022-02-07 13:25:26', 'Adhar card', 'SWOT.pdf', 'SWOT.pdf', 'SWOT.pdf', 'Yes', '', '', '', ''),
(73, 'Anjali', 'Jagdale', 'C2K12345678', '1234567890', 'Dipak', '1234567890', 'female', 'anywheretraveles25@gmail.com', 'FE', 'COMP', 'Indian', 'Maharashtra', 'Pune', 441007, '8d5e3fa6d3e5c6c7e56b3ec1c37457d1', 'No', 3, '506788', '2022-02-07 19:23:42', 'Adhar card', 'SWOT.pdf', 'SWOT.pdf', '', 'No', '', '', '', ''),
(74, 'Mohini', 'Jagtap', 'E2k19103676', '1234567890', 'Vishal', '1234567890', 'female', 'thosardhanu2@gmail.com', 'SE', 'ENTC', 'Indian', 'Maharashtra', 'Pune', 440001, 'b5daf2160a11450d070974f9a9ce8d3b', 'Yes', 3, '199035', '2022-02-08 18:51:02', 'Adhar card', 'SWOT.pdf', 'SWOT.pdf', '', 'No', '', '', '', ''),
(76, 'Kirti', 'Kad', 'C2K12345678', '1234567890', 'Nitin', '1234567890', 'female', 'dipakkad16@gmail.com', 'SE', 'COMP', 'Indian', 'Maharashtra', 'Pune', 440001, '833cf64378e33ef9b000be0073d0437d', 'Yes', 3, '721135', '2022-02-08 19:24:09', 'Adhar card', 'SWOT.pdf', 'SWOT.pdf', 'SWOT.pdf', 'Yes', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `roomchange`
--

CREATE TABLE `roomchange` (
  `id` int(25) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `year` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `name` varchar(255) NOT NULL,
  `regid` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `cgpa` varchar(50) NOT NULL,
  `room1` varchar(50) NOT NULL,
  `room2` varchar(50) NOT NULL,
  `cgpafile` varchar(255) NOT NULL,
  `req_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_details`
--
ALTER TABLE `leave_details`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `fk2` (`id`);

--
-- Indexes for table `mainbook`
--
ALTER TABLE `mainbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pincode`
--
ALTER TABLE `pincode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomchange`
--
ALTER TABLE `roomchange`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_details`
--
ALTER TABLE `leave_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mainbook`
--
ALTER TABLE `mainbook`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pincode`
--
ALTER TABLE `pincode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `roomchange`
--
ALTER TABLE `roomchange`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leave_details`
--
ALTER TABLE `leave_details`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
