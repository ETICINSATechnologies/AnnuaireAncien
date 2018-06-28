-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 28, 2018 at 08:46 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annuaire_ancien`
--

-- --------------------------------------------------------

--
-- Table structure for table `ann_admin`
--

DROP TABLE IF EXISTS `ann_admin`;
CREATE TABLE IF NOT EXISTS `ann_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ann_admin`
--

INSERT INTO `ann_admin` (`id`, `email`, `password`) VALUES
(1, 'admin@etic-insa.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86');

-- --------------------------------------------------------

--
-- Table structure for table `ann_ca`
--

DROP TABLE IF EXISTS `ann_ca`;
CREATE TABLE IF NOT EXISTS `ann_ca` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ann_membres`
--

DROP TABLE IF EXISTS `ann_membres`;
CREATE TABLE IF NOT EXISTS `ann_membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(64) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `lastname` varchar(64) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `phone` varchar(20) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `email` varchar(64) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `company` varchar(64) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `etic_position` varchar(64) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `mandate_year` varchar(4) DEFAULT NULL,
  `department` varchar(32) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `photo` varchar(64) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nnLastName` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ann_membres`
--

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ann_ca`
--
ALTER TABLE `ann_ca`
  ADD CONSTRAINT `FK_id_membre` FOREIGN KEY (`id`) REFERENCES `ann_membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
