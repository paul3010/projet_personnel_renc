-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 28 déc. 2022 à 20:29
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pp`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221219070230', '2022-12-19 07:03:05', 418),
('DoctrineMigrations\\Version20221227120537', '2022-12-27 12:06:03', 215),
('DoctrineMigrations\\Version20221227122150', '2022-12-27 12:22:41', 868),
('DoctrineMigrations\\Version20221228174004', '2022-12-28 17:40:15', 543);

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_id` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `children` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6F96648920E394C2` (`pseudo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `informations`
--

INSERT INTO `informations` (`id`, `pseudo_id`, `country`, `city`, `description`, `children`, `size`, `religion`, `weight`, `sign`, `liv`, `avatar`) VALUES
(1, 9, 'france', 'paris', 'juste  une petite description sur moi merci de votre compréhension,\r\nà nous revoir à tres bientôt.....\r\n', 'yes', 175, '', 70, 'scorpion', 'seule', ''),
(2, 11, 'usa', 'new york', 'bien', 'no', 200, 'np', 70, 'lion', 'alone', ''),
(3, 10, 'congo', 'pointe noire', 'bien', 'yes', 175, 'catholique', 70, 'cancer', 'may be alone', '');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `messages` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_DB021E96F624B39D` (`sender_id`),
  KEY `IDX_DB021E96E92F8F78` (`recipient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `recipient_id`, `messages`, `is_read`, `created_at`) VALUES
(5, 10, 9, 'messahe', '0', '2022-12-28 02:02:24'),
(6, 10, 9, 'hhhh', '0', '2022-12-28 02:03:24'),
(7, 9, 10, 'hhhhh', '0', '2022-12-28 02:04:51');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)',
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_connexion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`, `created_at`, `pseudo`, `ip_connexion`) VALUES
(9, 'paul5@h.com', '[]', '$2y$13$TJECW7Jye3EAsWLi9Kcry.50iQ5soUI8bHxs4Jcda2lSUfJ.72khe', '2022-12-21 22:42:28', 'paul', 12),
(10, 'pau6@h.com', '[]', '$2y$13$7EiT9FOimPwJ8TZGDVlgpOfrSpsnSHcDl31pWz1g978TM/jdFwDlS', '2022-12-21 23:46:43', 'pauline', 12),
(11, 'paul7@h.com', '[]', '$2y$13$/xnctznnNShn0OiKgxIOmO6IPI1OJSMrxhPDSV5yaQ.Ct./V0rc8.', '2022-12-21 22:47:54', 'paul', 12),
(12, 'paul4@h.com', '[]', '$2y$13$YXpdu.C9jWTtA/N6RJ8WweUZfX4O0MpZvtScG0H1sL.jgfd/o4VXm', '2022-12-25 18:55:39', 'paul', 12),
(13, 'paul6@h.com', '[]', '$2y$13$t2AJ4Y5JwTCxl7TnupZxu.R0D8Y06sz0dPXj18Uk13i9RDXuRmjcG', '2022-12-25 19:57:44', 'paul', 12);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `informations`
--
ALTER TABLE `informations`
  ADD CONSTRAINT `FK_6F96648920E394C2` FOREIGN KEY (`pseudo_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `FK_DB021E96E92F8F78` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_DB021E96F624B39D` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
