-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2018 at 08:32 AM
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
(1, 'alexandre', 'lang', '0612356897', 'alex.lang@etic-insa.com', 'facebook', 'resp dsi', '2018', 'informatique', '1.gif', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86'),
(2, 'eline', 'achard', '0635896457', 'eline.achard@gmail.com', '', 'présidente', '2017', 'gi', '', ''),
(7, 'marah', 'galy adamn', '', 'mgaly@etic-insa.com', '', '', '', '', '', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86'),
(22, 'louis', 'dupont', '06 46 75 92 59', 'louisdupont@etic-insa.com', 'facebook', 'dsi', '2018', 'if', '22.jpg', 'mdp'),
(23, 'louis', 'dupont', NULL, 'ldupont@etic-insa.com', NULL, NULL, NULL, NULL, NULL, 'mdp'),
(28, 'justine', 'lhuillier', NULL, 'justine.lhuillier@etic-insa.com', NULL, NULL, NULL, NULL, NULL, ''),
(32, 'tainturier', 'laurent', '', 'laurent.tainturier@etic-insa.com', '', '', '', '', NULL, 'mdpduturfu'),
(41, 'laurent', 'tainturier', '0612356897', 'lolotainturier@gmail.com', 'facebook', 'dsi', '2018', 'informatique', NULL, 'ac8b918e05e2b48fed15e4387bbf2dddedca7f5b36c25efd3e8c44c7f2efbded13f3399ca6a4f3f10fd915ab90c92e0b3f3e9a703e8a07b2842b2e0649568878'),
(47, 'laurent', 'tainturier', '', 'lolotainturier1@gmail.com', '', '', '', '', NULL, '139aaa6e0f9c36fd71d69e855481ac4180ecae7fb8cec06b1c406611258ea649ca7fb1976a3991ce988fb51cccf8f0d9e7d7b169ae616ae143cd79e1d96d9291'),
(48, 'laurent', 'tainturier', '', 'l751147@nwytg.com', '', '', '', '', NULL, '60e216a4bf0db185275e20304d6e3d2c0d85b3f919aba62298c674ec37750cdad70bded0946daa380d1c6ebe5563180632dce0008b45f1f933e72dd2a07dad50'),
(49, 'laurent', 'tainturier', '', 'laurentainturier@gmail.com', '', '', '', '', NULL, '480423fe3cb724f1cd5b67d4d671e930c02bc2eaf9ebe6f7c3ef9e27f9083a9735ff5e256674ffbc299f5592ce155f81e78d0bd0c3d33be36b390f8491992344'),
(50, 'dskjsdkjdsk', 'kefhkfhdk', '', 'dslkhjfdhfsdfdls', '', '', '', '', NULL, 'd1692180a0c04597c545975ea62b1e1022515652de04ee584d9ef93c9e027dd61c22c0aebd218b59668fe5ad53a10ea35bb046ba74840e6ac5497392cdbf459a'),
(51, 'jsdksdk', 'skdjsk', '', 'sdhskhkshshkshjdhksdskdhkds', '', '', '', '', NULL, 'af3d4d9305dd29b6bda4150ce0d417fb0131a7a44dcbbc297f1f856fdd5436fc7e06ee4371cddda3f5fdcf48653bfba3d7aab45634a59ec447d37ad78e496bb0'),
(52, 'sjdkdjkdskdsjk', 'dzhshdksdhk', '', 'ssqdhjfdkfdhdfhkd', '', '', '', '', NULL, '504e04e690c8ebc4853a4ebfdd51ee9d05c5fe8068f422960e288c0bd065ec5486291ee821e3ddc92804b0c30b2b354f6a96af2b4f36ef8a568d4d1ee0c77828');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ann_position`
--

INSERT INTO `ann_position` (`id`, `membre`, `position`, `year`) VALUES
(3, 7, 'dsi', 2018),
(10, 1, 'président', 2019),
(11, 1, 'Responsable DSI', 2018);

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
