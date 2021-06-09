-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 09 juin 2021 à 13:43
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
-- Base de données : `immo`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `surface` int(11) NOT NULL,
  `photos` json NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `cp` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `type` enum('0','1') NOT NULL COMMENT '0=vente\r\n1=location',
  `type_bien_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_bien_id` (`type_bien_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `descriptions`, `surface`, `photos`, `adresse`, `ville`, `cp`, `prix`, `type`, `type_bien_id`) VALUES
(1, 'Location Tourcoing', 'petit appartement', 73, '{\"2\": \"property-9.jpg\", \"photoP\": \"4slide-3.jpg\"}', '100 rue de calais', 'Tourcoing', 59200, 750, '1', 1),
(2, 'Roubaix pavillon', 'petite maison tranquille', 200, '{\"2\": \"tayi.jpg\", \"3\": \"zdfreg.jpg\", \"4\": \"adegrge - Copie.jpg\", \"6\": \"agent-3 - Copie (3) - Copie.jpg\", \"photoP\": \"slide-1.jpg\"}', '12 rue des bois', 'Roubaix', 59400, 150000, '0', 4),
(3, 'Immeuble vintage', 'immeuble de service', 900, '{\"2\": \"82agent-7.jpg\", \"photoP\": \"slide-3.jpg\"}', '14 avenue du general leclerc', 'lomme', 59478, 150000, '1', 5),
(5, 'mouvaux', 'houlaaa', 100, '{\"1\": \"agent-5.jpg\", \"photoP\": \"post-single-1.jpg\"}', '10 rue des marabout', 'mouvaux', 59700, 1500, '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `annonce_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`,`annonce_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`user_id`, `annonce_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(2, 5),
(3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `typebien`
--

DROP TABLE IF EXISTS `typebien`;
CREATE TABLE IF NOT EXISTS `typebien` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typebien`
--

INSERT INTO `typebien` (`id`, `libelle`) VALUES
(1, 'Appartement'),
(4, 'Maison Independante'),
(5, 'immeuble');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `role` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1=admin 0=lambda',
  `confirme` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=non confirmer \r\n1=confirmer',
  `actif` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=inactif\r\n1=actif',
  `token` varchar(255) NOT NULL COMMENT 'verif mail + redef mdp',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mail`, `pass`, `tel`, `role`, `confirme`, `actif`, `token`) VALUES
(1, 'mohamed', 'tayi', 'tayi@t.fr', '$2y$10$dGLF3CZRzgeQ8GVb6For4eqyjk0eJ35Ll4gq1ceIDVRjLwMQ26jQi', '0664659887', '0', '1', '1', '60b747cc8946f'),
(2, 'rayen', 'hidri', 'ray@ray.fr', '$2y$10$d519B9B/aXBvQ6ck9C3E6eJTu4lg7EBkEjVnhYkbeNsroXjN4YKF2', '0223154698', '1', '1', '1', '60a785c9c5e4a'),
(3, 'maryan', 'momo', 'maryan@tay.fr', '$2y$10$k1PQvYqdDwQ1S42mXAzbJOFIS2ZXdsroUxrEfrYprbRlo0eIJRVpO', '0665659878', '1', '1', '0', '60acaea60c490'),
(4, 'mirabel', 'tayi', 'mira@tay.fr', '$2y$10$MMFfmT3ymqxTj.HfPJqrVOgibfcXdgphBOH.YAwZp3hmFfofhTb8y', '4659598798', '1', '1', '1', '60acea75191d2');

-- --------------------------------------------------------

--
-- Structure de la table `user_annonce`
--

DROP TABLE IF EXISTS `user_annonce`;
CREATE TABLE IF NOT EXISTS `user_annonce` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `annonce_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`,`annonce_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_annonce`
--

INSERT INTO `user_annonce` (`user_id`, `annonce_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(3, 5);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`type_bien_id`) REFERENCES `typebien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
