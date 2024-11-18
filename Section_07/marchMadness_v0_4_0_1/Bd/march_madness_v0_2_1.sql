-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 18 avr. 2022 à 19:02
-- Version du serveur : 8.0.18
-- Version de PHP : 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `march_madness_v0_2_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rang` int(11) NOT NULL,
  `site` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO `equipes` (`id`, `nom`, `rang`, `site`) VALUES
(1, 'Baylor', 1, 'https://baylorbears.com/'),
(2, 'Hartford', 16, 'https://www.hartfordhawks.com/index.aspx?path=mbball'),
(3, 'North Carolina', 8, 'https://goheels.com/'),
(8, 'Wisconsin', 9, 'https://uwbadgers.com/sports/mens-basketball'),
(9, 'Villanova', 5, 'https://villanova.com/sports/mens-basketball'),
(10, 'Winthrop', 12, 'https://winthropeagles.com/sports/mens-basketball'),
(11, 'Marc', 23, 'https://www.nba.com/lakers/'),
(15, 'Flyers', 4, 'https://www.w3schools.com/php/phptryit.asp?filename=tryphp_func_validate_int'),
(16, 'Flyers', 12, 'https://www.w3schools.com/php/php_operators.asp');

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE `joueurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numeroJoeur` int(11) NOT NULL,
  `id_Equipe` int(11) NOT NULL,
  `Position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parties`
--

CREATE TABLE `parties` (
  `id` int(11) NOT NULL,
  `id_Equipe1` int(11) NOT NULL,
  `id_Equipe2` int(11) NOT NULL,
  `point_Equipe1` int(11) NOT NULL,
  `point_Equipe2` int(11) NOT NULL,
  `jour_de_la_partie` date NOT NULL,
  `Serie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Ville` enum('Portand, OR','Buffalo, NY','San Diego, CA','Greenville, SC','Fort Worth, TX','Milwaukee, WI','Indianapolis, IN','San Francisco, CA','Philadelphia, PA','Pittsburgh, PA','Chicago, IL','San Antonio, TX') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parties`
--

INSERT INTO `parties` (`id`, `id_Equipe1`, `id_Equipe2`, `point_Equipe1`, `point_Equipe2`, `jour_de_la_partie`, `Serie`, `Ville`) VALUES
(1, 1, 2, 79, 55, '2021-03-19', '2eme manche', 'Milwaukee, WI'),
(2, 3, 8, 62, 86, '2021-03-20', '1ere manche', 'Portand, OR'),
(9, 1, 3, 100, 99, '2021-03-17', '1ere manche', 'Milwaukee, WI');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `nomVille` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `nomVille`) VALUES
(1, 'Portand, OR'),
(2, 'Buffalo, NY'),
(3, 'San Diego, CA'),
(4, 'Greenville, SC'),
(5, 'Fort Worth, TX'),
(6, 'Milwaukee, WI'),
(7, 'Indianapolis, IN'),
(8, 'San Francisco, CA'),
(9, 'Philadelphia, PA'),
(10, 'Pittsburgh, PA'),
(11, 'Chicago, IL'),
(12, 'San Antonio, TX');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joueurs`
--
ALTER TABLE `joueurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Equipe` (`id_Equipe`);

--
-- Index pour la table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Equipe1` (`id_Equipe1`),
  ADD KEY `id_Equipe2` (`id_Equipe2`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `joueurs`
--
ALTER TABLE `joueurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `joueurs`
--
ALTER TABLE `joueurs`
  ADD CONSTRAINT `joueurs_ibfk_1` FOREIGN KEY (`id_Equipe`) REFERENCES `equipes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `parties`
--
ALTER TABLE `parties`
  ADD CONSTRAINT `parties_ibfk_1` FOREIGN KEY (`id_Equipe1`) REFERENCES `equipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parties_ibfk_2` FOREIGN KEY (`id_Equipe2`) REFERENCES `equipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
