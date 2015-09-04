-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2015 at 09:27 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dvi`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_county`
--

CREATE TABLE IF NOT EXISTS `m_county` (
`id` int(14) NOT NULL,
  `county_name` varchar(255) NOT NULL,
  `region_id` varchar(255) NOT NULL,
  `county_headquater` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_county`
--

INSERT INTO `m_county` (`id`, `county_name`, `region_id`, `county_headquater`) VALUES
(1, 'Nairobi', 'Nairobi', 'Nairobi'),
(2, 'Mombasa', 'Coast', 'Mombasa'),
(3, 'Kisumu', 'Nyanza', 'Kisumu'),
(4, 'Uasin Gishu', 'Rift Valley', 'Eldoret'),
(5, 'Nakuru', 'Rift Valley', 'Nakuru'),
(6, 'Kirinyaga', 'Central', 'Kerugoya');

-- --------------------------------------------------------

--
-- Table structure for table `m_region`
--

CREATE TABLE IF NOT EXISTS `m_region` (
`id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `region_headquater` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_region`
--

INSERT INTO `m_region` (`id`, `region_name`, `region_headquater`) VALUES
(1, 'Nairobi', 'Nairobi'),
(2, 'Coast', 'Mombasa'),
(3, 'Central', 'Nyeri'),
(4, 'Nyanza', 'Kisumu'),
(5, 'Rift Valley', 'Eldoret'),
(6, 'Western', 'Kakamega'),
(7, 'North Eastern', 'Garisa');

-- --------------------------------------------------------

--
-- Table structure for table `m_subcounty`
--

CREATE TABLE IF NOT EXISTS `m_subcounty` (
`id` int(11) NOT NULL,
  `subcounty_name` varchar(255) NOT NULL,
  `county_id` int(14) NOT NULL,
  `population` int(48) NOT NULL,
  `population_one` int(48) NOT NULL,
  `population_women` int(48) NOT NULL,
  `no_facilities` int(48) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_subcounty`
--

INSERT INTO `m_subcounty` (`id`, `subcounty_name`, `county_id`, `population`, `population_one`, `population_women`, `no_facilities`) VALUES
(1, 'Nairobi', 0, 4000000, 1000000, 2300000, 235),
(2, 'Kwale', 0, 2000000, 500000, 800000, 135);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_county`
--
ALTER TABLE `m_county`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_region`
--
ALTER TABLE `m_region`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_subcounty`
--
ALTER TABLE `m_subcounty`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_county`
--
ALTER TABLE `m_county`
MODIFY `id` int(14) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_region`
--
ALTER TABLE `m_region`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `m_subcounty`
--
ALTER TABLE `m_subcounty`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
