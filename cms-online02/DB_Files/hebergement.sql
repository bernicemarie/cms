-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 02 déc. 2020 à 20:39
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hebergement`
--

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` char(12) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `matela` date NOT NULL,
  `lit` date NOT NULL,
  `site` varchar(255) NOT NULL,
  `chambre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `matricule`, `nom`, `prenom`, `sexe`, `fonction`, `telephone`, `matela`, `lit`, `site`, `chambre`) VALUES
(54, 'AE026', 'Kamano', 'Benjamin', 'Masculin', 'Gestionnaire ST', 'dd', '2020-11-15', '2020-11-15', 'Site 1', 'dd'),
(55, '04596', 'Kamano', 'Benjamin', 'Masculin', 'Gestionnaire ST', 'dd', '2020-11-15', '2020-11-15', 'Site 2', 'dd'),
(56, 'AE026', 'Kamano', 'Benjamin', 'Feminin', 'Gestionnaire ST', 'dd', '2020-11-15', '2020-11-15', 'Site 1', 'fgfd');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `compte` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `compte`, `password`, `role`) VALUES
(11, 'Kamano', 'Benjamin', 'bernice', '$2y$12$okVWn6TnvwQdyjbZMxh9z.J9Yz6J1UbhFUUbmHX0d5Jy7gDY4vnuS', 'Admin'),
(14, 'Kamano', 'Pierre', 'Jean', '$2y$12$o/MDv3XjCEEk2MXW7ZGidegAY/AVxUoAk4uS7sSvDvCoKtJeOJs6i', 'User'),
(15, 'Kamano', 'Mohamed', 'margo', '$2y$12$r51tgFWLntevoc8a7TgqLON0TszmAdUR1m8uBwT76jKICq2BSvPPO', 'Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
