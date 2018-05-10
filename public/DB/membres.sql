-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 10 mai 2018 à 18:44
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
  `mandate_year` int(11) DEFAULT NULL,
  `department` varchar(32) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `photo` varchar(64) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `firstname`, `lastname`, `phone`, `email`, `company`, `etic_position`, `mandate_year`, `department`, `photo`) VALUES
(1, 'alexandre', 'lang', '0612356897', 'alex.lang@etic-insa.com', 'google', 'resp dsi', 2018, 'informatique', ''),
(2, 'eline', 'achard', '0635896457', 'eline.achard@gmail.com', '', 'présidente', 2017, 'gi', ''),
(3, 'Pauline', 'Geslin', '06 87 58 13 30', '', '', 'Secr?taire G?n?ral', 0, 'GI', ''),
(4, 'Benrighi', 'Linda', '07 83 24 83 33', '', '', 'Tr?sorier', 0, 'IF', ''),
(5, 'Luc', 'Cristol', '06 20 74 72 49', '', '', 'Vice-Tr?sorier', 0, 'IF', ''),
(6, 'Antoine', 'Lambert', '06 49 15 43 41', '', '', 'Ventes', 0, 'GI', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
