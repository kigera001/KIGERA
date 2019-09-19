-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2019 at 08:13 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `s.no` int(255) NOT NULL,
  `medicine company` varchar(255) NOT NULL,
  `medicine name` varchar(255) NOT NULL,
  `medicine batch number` varchar(255) NOT NULL,
  `mfg date` varchar(255) NOT NULL,
  `expiry date` varchar(255) NOT NULL,
  `date of entry` varchar(255) NOT NULL,
  `quantity(total units)` int(100) NOT NULL,
  `price per unit` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verificationcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `usertype`, `email`, `password`, `verificationcode`) VALUES
(0, 'samuel', 'kigera', 'sam', 'admin', 'samuelkigeramaina@gmail.com', '91d1180391e514690fdbc764e97943dc', 'd43ab110ab2489d6b9b2caa394bf920f'),
(0, 'Ian', 'Kamau', 'ian', 'user', 'mwangikamau317@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'd93591bdf7860e1e4ee2fca799911215'),
(0, 'martha', 'njoki', 'martha', 'user', 'marthanjoki@gmail.com', '6074c6aa3488f3c2dddff2a7ca821aab', '08f90c1a417155361a5c4b8d297e0d78'),
(0, 'mary', 'gathoni', 'nonnie', 'user', 'nonnie@gmail.com', 'ef8446f35513a8d6aa2308357a268a7e', '30056e1cab7a61d256fc8edd970d14f5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`s.no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `s.no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
