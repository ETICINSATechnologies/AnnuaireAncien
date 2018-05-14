-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 14 mai 2018 à 22:12
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `annuaire_ancien`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(64) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `lastname` varchar(64) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `phone` varchar(20) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `email` varchar(64) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `company` varchar(64) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `etic_position` varchar(64) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `mandate_year` varchar(4) DEFAULT NULL,
  `department` varchar(32) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `photo` varchar(64) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `firstname`, `lastname`, `phone`, `email`, `company`, `etic_position`, `mandate_year`, `department`, `photo`, `password`) VALUES
(1, 'alex', 'lang', '0612356897', 'alex.lang@etic-insa.com', 'facebook', 'resp dsi', '2018', 'informatique', '1.jpg', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86'),
(2, 'eline', 'achard', '0635896457', 'eline.achard@gmail.com', '', 'présidente', '2017', 'gi', '', ''),
(3, 'pauline', 'geslin', '06 87 58 13 30', '', '', 'secrétaire général', '0', 'gi', '', ''),
(4, 'benrighi', 'linda', '07 83 24 83 33', '', '', 'trésorier', '0', 'if', '', ''),
(5, 'luc', 'cristol', '06 20 74 72 49', '', '', 'vice-trésorier', '0', 'IF', '', ''),
(6, 'antoine', 'lambert', '06 49 15 43 41', '', '', 'ventes', '0', 'gi', '', ''),
(7, 'marah', 'galy adamn', '06 23 56 98 45', 'mgaly@etic-insa.com', 'facebook', '', '2018', 'if', '', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86'),
(8, 'marah', 'galy adamn', '06 23 56 98 45', 'mgaly@etic-insa.com', 'facebook', 'dsi', '2018', 'if', '', ''),
(9, 'marah', 'galy adamn', '06 23 56 98 45', 'mgaly@etic-insa.com', 'facebook', 'dsi', '2018', 'if', '', ''),
(10, 'marah', 'galy adamn', '06 23 56 98 45', 'mgaly@etic-insa.com', 'facebook', 'dsi', '2018', 'if', '', ''),
(11, 'marah', 'galy adamn', '06 23 56 98 45', 'mgaly@etic-insa.com', 'facebook', 'dsi', '2018', 'if', '', ''),
(12, 'marah', 'galy adamn', '06 23 56 98 45', 'mgaly@etic-insa.com', 'facebook', 'dsi', '2018', 'if', '', ''),
(13, 'marah', 'galy adamn', '06 23 56 98 45', 'mgaly@etic-insa.com', 'facebook', 'dsi', '2018', 'if', '', ''),
(14, 'marah', 'galy adamn', '06 23 56 98 45', 'mgaly@etic-insa.com', 'facebook', 'dsi', '2018', 'if', '', ''),
(15, 'marah', 'galy adamn', '06 23 56 98 45', 'mgaly@etic-insa.com', 'facebook', 'dsi', '2018', 'if', '', ''),
(16, 'marah', 'galy adamn', '06 23 56 98 45', 'mgaly@etic-insa.com', 'facebook', 'dsi', '2018', 'if', '', ''),
(17, 'marah', 'galy adamn', '06 23 56 98 45', 'mgaly@etic-insa.com', 'facebook', 'dsi', '2018', 'if', '', ''),
(18, 'marah', 'galy adamn', '06 23 56 98 45', 'mgaly@etic-insa.com', 'facebook', 'dsi', '2018', 'if', '', ''),
(19, 'marah', 'galy adamn', '06 23 56 98 45', 'mgaly@etic-insa.com', 'facebook', 'dsi', '2018', 'if', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
