-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2016 at 10:05 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cavis9g`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`password`) VALUES
('64c52f7b2bb3016f051d9f8471d98220');

-- --------------------------------------------------------

--
-- Table structure for table `cavis`
--

CREATE TABLE `cavis` (
  `nim` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cavis`
--

INSERT INTO `cavis` (`nim`, `nama`) VALUES
('1601215821', 'Dennis'),
('1701303535', 'Erwin'),
('1801397473', 'Jorvan'),
('1901459081', 'Nicholas'),
('1901459125', 'Indra');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `idLogin` int(10) NOT NULL,
  `nim` char(10) NOT NULL,
  `jamLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`idLogin`, `nim`, `jamLogin`) VALUES
(1, '1701303535', '2016-02-14 13:00:00'),
(2, '1701303535', '2016-02-14 15:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `logout`
--

CREATE TABLE `logout` (
  `idLogout` int(10) NOT NULL,
  `idLogin` int(10) NOT NULL,
  `jamLogout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logout`
--

INSERT INTO `logout` (`idLogout`, `idLogin`, `jamLogout`) VALUES
(1, 1, '2016-02-14 14:00:00'),
(2, 2, '2016-02-14 16:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`password`);

--
-- Indexes for table `cavis`
--
ALTER TABLE `cavis`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`);

--
-- Indexes for table `logout`
--
ALTER TABLE `logout`
  ADD PRIMARY KEY (`idLogout`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logout`
--
ALTER TABLE `logout`
  MODIFY `idLogout` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
