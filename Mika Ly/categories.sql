-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 10 nov. 2022 à 12:47
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `description` text DEFAULT NULL,
  `Nombre_de_page` int(11) UNSIGNED NOT NULL,
  `Code_barre` char(13) NOT NULL,
  `Nombre_de_photos` int(11) UNSIGNED NOT NULL,
  `Dimensions` varchar(50) NOT NULL COMMENT '(L x H x P en cm)',
  `Prix_par_page` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `titre`, `description`, `Nombre_de_page`, `Code_barre`, `Nombre_de_photos`, `Dimensions`, `Prix_par_page`) VALUES
(2, 'Timeo', 'le bg', 4, 'KJNJBN-yGHJKL', 4, '23x45x45', '400'),
(3, 'even', 'le gay', 2, 'MDJDNDJK-5TUD', 78, '56x45x66', '657'),
(12, 'fredy', 'le racst', 34, 'DFGHJKL67M', 68, '45x46x80', '5678'),
(14, 'joao', 'le renoi', 2, 'tout', 10, '34x56x78', '1100');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
