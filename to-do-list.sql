-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 15 nov. 2022 à 22:06
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `to-do-list`
--

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `to_do_at` date NOT NULL,
  `is_done` tinyint(1) NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id`, `name`, `description`, `to_do_at`, `is_done`, `id_user`) VALUES
(13, 'DDDD', NULL, '2022-11-14', 0, 2),
(17, 'faire la vaiselle', NULL, '2022-11-24', 0, 16),
(14, 'EEEE', NULL, '2022-11-20', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `task_done`
--

DROP TABLE IF EXISTS `task_done`;
CREATE TABLE IF NOT EXISTS `task_done` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_task` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `done_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `task_done`
--

INSERT INTO `task_done` (`id`, `id_task`, `name`, `done_at`, `id_user`) VALUES
(3, 6, 'BBBB', '2022-11-15 17:23:24', 2),
(4, 12, 'CCCC', '2022-11-15 17:23:24', 2),
(5, 15, 'AAAA', '2022-11-15 18:22:33', 16),
(6, 18, 'monter a cheval', '2022-11-15 18:24:32', 16);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `last_name`, `first_name`, `email`, `password`) VALUES
(2, 'Wempe', 'Olwen', 'olwen.wempe@hotmail.fr', '$2y$10$ZJHL6ZLqwsL6MHGMEFiQJeaTgPunSYOtuY2diu9XpU7XaukIsIura'),
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
