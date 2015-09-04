-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2015 at 09:52 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dvi`
--
CREATE DATABASE IF NOT EXISTS `dvi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dvi`;

-- --------------------------------------------------------

--
-- Table structure for table `m_county`
--

CREATE TABLE IF NOT EXISTS `m_county` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
  `county_name` varchar(255) NOT NULL,
  `region_id` varchar(255) NOT NULL,
  `county_headquater` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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
-- Table structure for table `m_depot`
--

CREATE TABLE IF NOT EXISTS `m_depot` (
  `id` int(14) NOT NULL,
  `depot_location` varchar(255) NOT NULL,
  `region_id` varchar(255) NOT NULL,
  `county_id` varchar(255) NOT NULL,
  `subcounty_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_depot`
--

INSERT INTO `m_depot` (`id`, `depot_location`, `region_id`, `county_id`, `subcounty_id`) VALUES
(0, 'Kajiado', 'Coast', 'Kikuyu', 'Kwale'),
(0, 'Kajiado', 'Coast', 'Kikuyu', 'Kwale'),
(0, 'Kajiado', 'Coast', 'Kikuyu', 'Kwale'),
(0, 'Kajiado', 'Coast', 'Kikuyu', 'Kwale');

-- --------------------------------------------------------

--
-- Table structure for table `m_fridge`
--

CREATE TABLE IF NOT EXISTS `m_fridge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(32) NOT NULL,
  `library_id` int(11) NOT NULL,
  `pqs` int(11) NOT NULL,
  `model_name` varchar(32) NOT NULL,
  `manufacturer` varchar(32) NOT NULL,
  `power_source` varchar(32) NOT NULL,
  `refrigerant_gas_type` varchar(32) NOT NULL,
  `positive_net_volume` int(11) NOT NULL,
  `negative_net_volume` int(11) NOT NULL,
  `positive_gross_volume` int(11) NOT NULL,
  `negative_gross_volume` int(11) NOT NULL,
  `freezing_capacity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `electricity` int(11) NOT NULL,
  `gas` int(11) NOT NULL,
  `kerosene` int(11) NOT NULL,
  `zone` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `m_fridge`
--

INSERT INTO `m_fridge` (`id`, `item_type`, `library_id`, `pqs`, `model_name`, `manufacturer`, `power_source`, `refrigerant_gas_type`, `positive_net_volume`, `negative_net_volume`, `positive_gross_volume`, `negative_gross_volume`, `freezing_capacity`, `price`, `electricity`, `gas`, `kerosene`, `zone`) VALUES
(6, 'IFAC', 1, 1, 'JH', 'Ramtons', 'E', 'R134A', 3000, 3000, 23, 21, 23, 23000, 23, 34, 21, 'Hot'),
(7, 'CFAC', 1, 1, '1', 'Samsung3', 'E', 'R134A', 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Hot');

-- --------------------------------------------------------

--
-- Table structure for table `m_inventory`
--

CREATE TABLE IF NOT EXISTS `m_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Vaccine_name` varchar(30) NOT NULL,
  `max_stock` int(11) NOT NULL,
  `min_stock` int(11) NOT NULL,
  `period_stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `m_inventory`
--

INSERT INTO `m_inventory` (`id`, `Vaccine_name`, `max_stock`, `min_stock`, `period_stock`) VALUES
(1, 'ROTA', 10000, 2000, 34700),
(2, 'BCG', 200993903, 23242, 324535),
(3, 'TT', 435252345, 32534253, 2147483647),
(4, 'PCV', 3453532, 23435, 342535);

-- --------------------------------------------------------

--
-- Table structure for table `m_region`
--

CREATE TABLE IF NOT EXISTS `m_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(255) NOT NULL,
  `region_headquater` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcounty_name` varchar(255) NOT NULL,
  `county_id` int(14) NOT NULL,
  `population` int(48) NOT NULL,
  `population_one` int(48) NOT NULL,
  `population_women` int(48) NOT NULL,
  `no_facilities` int(48) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `m_subcounty`
--

INSERT INTO `m_subcounty` (`id`, `subcounty_name`, `county_id`, `population`, `population_one`, `population_women`, `no_facilities`) VALUES
(1, 'Nairobi', 0, 4000000, 1000000, 2300000, 235),
(2, 'Kwale', 0, 2000000, 500000, 800000, 135);

-- --------------------------------------------------------

--
-- Table structure for table `m_vaccines`
--

CREATE TABLE IF NOT EXISTS `m_vaccines` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Vaccine_name` varchar(45) DEFAULT NULL,
  `Doses_required` int(15) NOT NULL,
  `Wastage_factor` decimal(14,2) NOT NULL,
  `Tray_color` varchar(30) NOT NULL,
  `Vaccine_designation` varchar(30) NOT NULL,
  `Vaccine_formulation` varchar(30) NOT NULL,
  `Mode_administration` varchar(30) NOT NULL,
  `Vaccine_presentation` varchar(30) NOT NULL,
  `Fridge_compart` varchar(30) NOT NULL,
  `Vaccine_pck_vol` decimal(14,1) NOT NULL,
  `Diluents_pck_vol` decimal(14,1) NOT NULL,
  `Vaccine_price_vial` decimal(14,2) NOT NULL,
  `Vaccine_price_dose` decimal(14,2) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `m_vaccines`
--

INSERT INTO `m_vaccines` (`ID`, `Vaccine_name`, `Doses_required`, `Wastage_factor`, `Tray_color`, `Vaccine_designation`, `Vaccine_formulation`, `Mode_administration`, `Vaccine_presentation`, `Fridge_compart`, `Vaccine_pck_vol`, `Diluents_pck_vol`, `Vaccine_price_vial`, `Vaccine_price_dose`) VALUES
(11, 'ROTA', 28, '3.20', 'white', 'County', 'Liquid', 'Injection', '2.7', 'Fridge(4 deg)', '56.2', '23.8', '28763.00', '30050.00'),
(12, 'BCG', 45, '1.70', 'grey', 'Sub-county', 'Tablet', 'Oral', '9.8', 'Fridge(4 deg)', '56.2', '23.4', '2000.45', '30050.00'),
(13, 'TT', 21, '3.40', 'green', 'CVS', 'Semi-liquid', 'Oral/Injection', '9.8', '', '56.2', '23.4', '2000.45', '30050.00'),
(14, 'PCV', 20, '6.70', 'green', 'County', 'Liquid', 'Oral', '9.8', '', '56.2', '23.4', '28763.00', '30050.00');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_by` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_by`, `date_created`, `status`) VALUES
(1, 'Morris', '2015-08-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `vaccine_id` int(14) NOT NULL,
  `stock_on_hand` int(14) NOT NULL,
  `min_stock` int(14) NOT NULL,
  `max_stock` int(11) NOT NULL,
  `period_stock` int(14) NOT NULL,
  `first_expiry` date NOT NULL,
  `qty_order_doses` int(14) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`vaccine_id`, `stock_on_hand`, `min_stock`, `max_stock`, `period_stock`, `first_expiry`, `qty_order_doses`, `order_id`) VALUES
(11, 0, 0, 56, 0, '0000-00-00', 45, 1),
(12, 0, 0, 54, 0, '0000-00-00', 14, 0),
(13, 0, 0, 32, 0, '0000-00-00', 23, 0),
(11, 0, 0, 0, 0, '0000-00-00', 0, 1),
(12, 0, 0, 0, 0, '0000-00-00', 0, 0),
(13, 0, 0, 0, 0, '0000-00-00', 0, 0),
(11, 0, 0, 90, 0, '0000-00-00', 0, 1),
(12, 0, 0, 78, 0, '0000-00-00', 0, 0),
(13, 0, 0, 89, 0, '0000-00-00', 0, 0),
(11, 0, 0, 0, 0, '0000-00-00', 0, 1),
(12, 0, 0, 0, 0, '0000-00-00', 0, 0),
(13, 0, 0, 0, 0, '0000-00-00', 0, 0),
(11, 0, 0, 0, 0, '0000-00-00', 0, 0),
(12, 0, 0, 0, 0, '0000-00-00', 0, 0),
(13, 0, 0, 0, 0, '0000-00-00', 0, 0),
(11, 0, 0, 0, 0, '0000-00-00', 34, 0),
(12, 0, 0, 0, 0, '0000-00-00', 0, 0),
(13, 0, 0, 0, 0, '0000-00-00', 0, 0),
(14, 0, 0, 0, 0, '0000-00-00', 0, 0),
(11, 0, 0, 0, 0, '0000-00-00', 34, 0),
(12, 0, 0, 0, 0, '0000-00-00', 44, 0),
(13, 0, 0, 0, 0, '0000-00-00', 54, 0),
(14, 0, 0, 0, 0, '0000-00-00', 32, 0),
(11, 0, 0, 0, 0, '0000-00-00', 0, 0),
(12, 0, 0, 0, 0, '0000-00-00', 0, 0),
(13, 0, 0, 0, 0, '0000-00-00', 0, 0),
(14, 0, 0, 0, 0, '0000-00-00', 0, 0),
(11, 0, 0, 0, 0, '0000-00-00', 0, 0),
(12, 0, 0, 0, 0, '0000-00-00', 0, 0),
(13, 0, 0, 0, 0, '0000-00-00', 0, 0),
(14, 0, 0, 0, 0, '0000-00-00', 0, 0),
(11, 0, 0, 0, 0, '0000-00-00', 0, 0),
(12, 0, 0, 0, 0, '0000-00-00', 0, 0),
(13, 0, 0, 0, 0, '0000-00-00', 0, 0),
(14, 0, 0, 0, 0, '0000-00-00', 0, 0),
(11, 0, 0, 0, 0, '0000-00-00', 0, 0),
(12, 0, 0, 0, 0, '0000-00-00', 0, 0),
(13, 0, 0, 0, 0, '0000-00-00', 0, 0),
(14, 0, 0, 0, 0, '0000-00-00', 0, 0),
(11, 0, 0, 0, 0, '0000-00-00', 0, 0),
(12, 0, 0, 0, 0, '0000-00-00', 0, 0),
(13, 0, 0, 0, 0, '0000-00-00', 0, 0),
(14, 0, 0, 0, 0, '0000-00-00', 0, 0),
(11, 0, 0, 0, 0, '0000-00-00', 0, 0),
(12, 0, 0, 0, 0, '0000-00-00', 0, 0),
(13, 0, 0, 0, 0, '0000-00-00', 0, 0),
(14, 0, 0, 0, 0, '0000-00-00', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
