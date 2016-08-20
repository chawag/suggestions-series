-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 20 Août 2016 à 18:04
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `suggestions-series`
--

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `ser_id` int(11) NOT NULL,
  `ser_imdbID` varchar(255) NOT NULL,
  `ser_title` varchar(255) NOT NULL,
  `ser_year` varchar(10) NOT NULL,
  `ser_runtime` varchar(255) NOT NULL,
  `ser_genre` varchar(255) NOT NULL,
  `ser_actors` varchar(500) NOT NULL,
  `ser_plot` text NOT NULL,
  `ser_country` varchar(255) NOT NULL,
  `ser_poster` text,
  `ser_pseudo` varchar(255) NOT NULL,
  `ser_comment` text,
  `ser_label` varchar(10) DEFAULT 'pas vu',
  `ser_points` int(11) DEFAULT '0',
  `ser_feedback` text,
  `ser_created` datetime NOT NULL,
  `ser_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`ser_id`),
  ADD UNIQUE KEY `ser_imdbID` (`ser_imdbID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
