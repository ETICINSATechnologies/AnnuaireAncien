-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2018 at 07:32 PM
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
(1, 'admin@etic-insa.com', '0cd599f7c2bae9f3414f63584bf4f24fbd64b627b199e37155836e58d3f955d843186db8dd5bd9aed4c438069fa2bae91d8de3f6d300444564dcc8f82816eaac');

-- --------------------------------------------------------

--
-- Table structure for table `ann_ca`
--

DROP TABLE IF EXISTS `ann_ca`;
CREATE TABLE IF NOT EXISTS `ann_ca` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ann_ca`
--

INSERT INTO `ann_ca` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11);

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

INSERT INTO `ann_membres` (`id`, `firstname`, `lastname`, `phone`, `email`, `company`, `etic_position`, `mandate_year`, `department`, `photo`, `password`) VALUES
(1, 'maïlys', 'pascail', '06 68 77 48 14', 'mailys.pascail@etic-insa.com', '', 'présidente', '2018', '', '1.jpg', ''),
(2, 'charlotte', 'diroux', '07 77 39 60 91', 'charlotte.diroux@etic-insa.com', '', 'vice-près', '2018', '', '2.jpg', ''),
(3, 'justine', 'lhuillier', '', 'justine.lhuillier@etic-insa.com', '', 'secrétaire générale', '2018', '', '3.jpg', ''),
(4, 'feriel', 'ben marzouk', '', 'feriel.ben-marzouk@etic-insa.com', '', 'trésorerie', '2018', '', '4.jpg', ''),
(5, 'héloïse', 'tourard', '06 27 17 05 63', 'heloise.tourard@etic-insa.com', '', 'trésorerie', '2018', '', '5.jpg', ''),
(6, 'alexandre', 'lang', '06 62 84 58 63', 'alexandre.lang@etic-insa.com', '', 'dsi', '2018', '', '6.jpg', ''),
(7, 'reda', 'souali', '', 'reda.souali@etic-insa.com', '', 'dev\' co', '2018', '', '7.jpg', ''),
(8, 'nour', 'mansour', '06 03 52 25 31', 'nour.mansour@etic-insa.com', '', 'ua', '2018', '', '8.jpg', ''),
(9, 'tom', 'richard', '06 46 76 73 68', 'tom.richard@etic-insa.com', '', 'ua', '2018', '', '9.jpg', ''),
(10, 'elliot', 'trabac', '', 'elliot.trabac@etic-insa.com', '', 'ua', '2018', '', '10.jpg', ''),
(11, 'louis', 'dupont', '06 05 20 32 14', 'louis.dupont@etic-insa.com', '', 'communication', '2018', '', '11.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `ann_position`
--

DROP TABLE IF EXISTS `ann_position`;
CREATE TABLE IF NOT EXISTS `ann_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_position_membre` (`membre`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ann_ca`
--
ALTER TABLE `ann_ca`
  ADD CONSTRAINT `FK_id_membre` FOREIGN KEY (`id`) REFERENCES `ann_membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ann_position`
--
ALTER TABLE `ann_position`
  ADD CONSTRAINT `fk_id_position_membre` FOREIGN KEY (`membre`) REFERENCES `ann_membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
