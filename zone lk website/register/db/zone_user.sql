-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 09:31 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zone_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pon` int(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `email`, `pon`, `password`, `cpassword`) VALUES
(1, '', '', 0, '', ''),
(2, '', '', 0, '', ''),
(3, '', '', 0, '', ''),
(4, 'qq', 'qq', 12, '123', '123'),
(5, 'qq', 'qq', 12, '12', '123'),
(6, 'qqqqqqqqqqq', 'ff', 12, '456', '456'),
(7, 'kasun', 'kasun@gmail.com', 719032174, 'kasun12', 'kasun12'),
(8, 'lochana', 'lochan@gmail.com', 705106101, 'lochana1', 'lochana1'),
(9, 'qqqqqqqqq', 'www@aa', 123, '1234', '1234'),
(10, 'qqqqqqqqqqqq', 'wssa', 12, '12', '12'),
(11, 'anuradha', 'anu@gmail.com', 1199, 'anu', 'anu'),
(12, 'kamla', 'aa@aa', 1414, '147', '147'),
(13, 'aka', 'qq', 124, '78', '78'),
(14, 'supun', 'su@gmail.com', 1199, '987', '987');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
