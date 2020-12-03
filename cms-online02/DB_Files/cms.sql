-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 02 déc. 2020 à 20:40
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
-- Base de données :  `cms`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(25) NOT NULL,
  `cat_content` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=476 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_content`) VALUES
(475, '  Python ', 'usb_script.txt'),
(474, 'Python  ', 'usb_script.txt'),
(473, 'Maintenance ClÃ© USB', 'usb_script.txt');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(3) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment_author` varchar(250) NOT NULL,
  `comment_email` varchar(250) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(250) NOT NULL DEFAULT 'Approuve',
  `comment_date` date NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `username`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(77, 144, 'Benjamin ', 'Benjamin Kamano', 'kamanobenjamin87@gmail.com', '<p>nfnfngb</p>', 'Approuve', '2020-11-22'),
(78, 144, 'Benjamin ', 'Benjamin Kamano', 'kamanobenjamin87@gmail.com', '<p>2355mlklk</p><p>&nbsp;</p>', 'Approuve', '2020-11-21');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(76, 146, 144),
(75, 146, 144),
(74, 146, 144),
(73, 122, 124);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT 'Copie',
  `user_role` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL DEFAULT 'Aucun titre',
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_comment_count` int(11) NOT NULL DEFAULT '0',
  `post_status` varchar(255) NOT NULL DEFAULT 'Actif',
  `posts_views_count` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) DEFAULT '0',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `username`, `user_role`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_comment_count`, `post_status`, `posts_views_count`, `likes`) VALUES
(144, 'Jean Pierre KAMANO', 'user', 'hfghf', 'fdfdfdfv', '2020-11-21', 'Capture08.PNG', '<p>ggbbgg</p>', 2, 'Actif', 7, 3),
(145, 'Jean Pierre KAMANO', 'user', 'hfghf', '', '2020-11-21', 'Capture08.PNG', '<p>fvdfgv</p>', 0, 'Actif', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text,
  `user_role` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL DEFAULT 'valide',
  `token` text,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_status`, `token`) VALUES
(168, 'Benjamin Kamano', '$2y$12$KF38QaPLhUc5DX1dkuWLtuvRJ1knaBbBZNipjqVv4JfzlUSPNyGlS', NULL, NULL, 'kamanobenjamin87@gmail.com', NULL, 'admin', 'valide', NULL),
(169, 'Kamano', '$2y$12$QtMBYzrhjHb8qdYcDTu.KOJmb1nyhBbiCZubP5Z/Q8pBvPrmvyN5a', NULL, NULL, 'kamanobenjami@gmail.com', NULL, 'user', 'En Attente', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_online`
--

DROP TABLE IF EXISTS `users_online`;
CREATE TABLE IF NOT EXISTS `users_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) NOT NULL,
  `temps` int(11) NOT NULL,
  `utilisateur` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `temps`, `utilisateur`, `user_firstname`, `user_lastname`, `user_role`) VALUES
(90, 'kbauq5anvoclafp4tum19n9so2', 1600989614, 'Benjamin', '', '', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
