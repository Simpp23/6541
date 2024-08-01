-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 04:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_654230003`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_concert_tickets`
--

CREATE TABLE `tb_concert_tickets` (
  `concert_id` int(11) UNSIGNED NOT NULL,
  `concert_name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `uploadBy` varchar(100) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_concert_tickets`
--

INSERT INTO `tb_concert_tickets` (`concert_id`, `concert_name`, `price`, `uploadBy`, `reg_date`) VALUES
(1, 'Yew', 2800, 'Nattawat', '2024-08-01 13:55:39'),
(2, 'LandokmaiEIEI', 2100, 'antttttt', '2024-08-01 13:59:35'),
(3, 'Landokmai', 2100, 'antttttt', '2024-08-01 14:00:38'),
(4, 'Pun', 1200, 'iLove punpun', '2024-08-01 14:01:05'),
(5, 'Ploycat', 4000, 'JaoNay', '2024-08-01 14:01:26'),
(6, 'Safeplanet', 3360, 'dow', '2024-08-01 14:02:22'),
(7, 'Freehand', 6000, 'Ss', '2024-08-01 14:03:01'),
(8, 'The toy', 9000, 'Nont Tanont', '2024-08-01 14:04:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_concert_tickets`
--
ALTER TABLE `tb_concert_tickets`
  ADD PRIMARY KEY (`concert_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_concert_tickets`
--
ALTER TABLE `tb_concert_tickets`
  MODIFY `concert_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
