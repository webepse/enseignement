-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 09 sep. 2021 à 09:28
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `enseignement`
--
CREATE DATABASE IF NOT EXISTS `enseignement` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `enseignement`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$N3CDNXYLDiDuqYohmBo6yOyf2roCealrrolVL5D76nnc0P3t/MLze');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branche` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `etablissement` varchar(150) NOT NULL,
  `degre` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `branche`, `description`, `etablissement`, `degre`, `url`) VALUES
(1, 'Infographie', 'section infographie pour découvrir l\'univers de l\'infographie', 'athénée Royale de la Louvière', '3', 'www.athenee.be'),
(2, 'couture', 'Section de l\'enseignement destinée a parfaire les qualité d\'un étudiants et lui apprendre les savoir et savoir faire de la branche', 'www.athenee.be', '3', 'www.athenee.be'),
(3, 'Musique', 'Section de l\'enseignement destinée a parfaire les qualité d\'un étudiants et lui apprendre les savoir et savoir faire de la branche', 'saint luc', '3', 'www.athenee.be'),
(4, 'Webmaster', 'Section de l\'enseignement destinée a parfaire les qualité d\'un étudiants et lui apprendre les savoir et savoir faire de la branche', 'Saint Jean', '3', 'www.athenee.be'),
(5, 'legislation', 'Section de l\'enseignement destinée a parfaire les qualité d\'un étudiants et lui apprendre les savoir et savoir faire de la branche', 'Saint augustin', '3', 'www.athenee.be'),
(6, 'gastronomique', 'Section de l\'enseignement destinée a parfaire les qualité d\'un étudiants et lui apprendre les savoir et savoir faire de la branche', 'Saint Georges', '1', 'www.athenee.be'),
(7, 'infirmière', 'Section de l\'enseignement destinée a parfaire les qualité d\'un étudiants et lui apprendre les savoir et savoir faire de la branche', 'EPSE', '2', 'www.epse.be'),
(8, 'Sciences économiques', 'Section de l\'enseignement destinée a parfaire les qualité d\'un étudiants et lui apprendre les savoir et savoir faire de la branche', 'Sainte Marie', '1', 'www.ism.be'),
(9, 'Artistique', 'Section de l\'enseignement destinée a parfaire les qualité d\'un étudiants et lui apprendre les savoir et savoir faire de la branche', 'athenée provincial', '2', 'www.apll.be'),
(10, 'secrétariat', 'Section de l\'enseignement destinée a parfaire les qualité d\'un étudiants et lui apprendre les savoir et savoir faire de la branche', 'format 21', '2', 'www.format21.be');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
