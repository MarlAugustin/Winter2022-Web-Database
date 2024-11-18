-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 14 mai 2022 à 17:28
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
-- Base de données : `march_madness_v1_0_2`
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
  `numeroJoueur` int(11) NOT NULL,
  `id_Equipe` int(11) NOT NULL,
  `Position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `identifiant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueurs` (`id`, `nom`, `prenom`, `numeroJoueur`, `id_Equipe`, `Position`, `mot_de_passe`, `identifiant`) VALUES
(1, 'Augustin', 'Marlond', 64, 16, 'Point guard', 'admin', 'admin'),
(2, 'Manek', 'Brady ', 45, 3, 'Forward ', 'B@ll_Is_Lif&', 'BradManek');

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
  `Ville` enum('Portand, OR','Buffalo, NY','San Diego, CA','Greenville, SC','Fort Worth, TX','Milwaukee, WI','Indianapolis, IN','San Francisco, CA','Philadelphia, PA','Pittsburgh, PA','Chicago, IL','San Antonio, TX') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `efface` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parties`
--

INSERT INTO `parties` (`id`, `id_Equipe1`, `id_Equipe2`, `point_Equipe1`, `point_Equipe2`, `jour_de_la_partie`, `Serie`, `Ville`, `efface`) VALUES
(1, 1, 2, 79, 55, '2021-03-19', '2eme manche', 'Milwaukee, WI', 0),
(2, 3, 8, 62, 86, '2021-03-20', '1ere manche', 'Portand, OR', 0),
(9, 1, 3, 100, 99, '2021-03-17', '1ere manche', 'Milwaukee, WI', 0),
(12, 1, 3, 98, 97, '2022-03-25', 'Champion', 'Pittsburgh, PA', 0);

--
-- Déclencheurs `parties`
--
DELIMITER $$
CREATE TRIGGER `parties_after_insert` AFTER INSERT ON `parties` FOR EACH ROW BEGIN
	
		IF NEW.efface THEN
			SET @changetype = 'Effacé';
		ELSE
			SET @changetype = 'Nouveau';
		END IF;
    
		INSERT INTO parties_audit (partie_id, changetype) VALUES (NEW.id, @changetype);
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `parties_after_update` AFTER UPDATE ON `parties` FOR EACH ROW BEGIN
	
		IF NEW.efface THEN
			SET @changetype = 'Effacé';
		ELSE
			SET @changetype = 'Modifié';
		END IF;
    
		INSERT INTO parties_audit (partie_id, changetype) VALUES (NEW.id, @changetype);
		
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `parties_archives`
--

CREATE TABLE `parties_archives` (
  `id` int(11) NOT NULL,
  `id_Equipe1` int(11) NOT NULL,
  `id_Equipe2` int(11) NOT NULL,
  `point_Equipe1` int(11) NOT NULL,
  `point_Equipe2` int(11) NOT NULL,
  `jour_de_la_partie` date NOT NULL,
  `Serie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Ville` enum('Portand, OR','Buffalo, NY','San Diego, CA','Greenville, SC','Fort Worth, TX','Milwaukee, WI','Indianapolis, IN','San Francisco, CA','Philadelphia, PA','Pittsburgh, PA','Chicago, IL','San Antonio, TX') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parties_archives`
--

INSERT INTO `parties_archives` (`id`, `id_Equipe1`, `id_Equipe2`, `point_Equipe1`, `point_Equipe2`, `jour_de_la_partie`, `Serie`, `Ville`) VALUES
(15, 1, 9, 78, 79, '2022-03-10', '1ere manche', 'Portand, OR');

-- --------------------------------------------------------

--
-- Structure de la table `parties_audit`
--

CREATE TABLE `parties_audit` (
  `id` int(11) NOT NULL,
  `partie_id` int(11) NOT NULL,
  `changeType` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `changetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parties_audit`
--

INSERT INTO `parties_audit` (`id`, `partie_id`, `changeType`, `changetime`) VALUES
(1, 12, 'Modifié', '2022-05-09 15:40:32'),
(2, 9, 'Effacé', '2022-05-09 15:41:50'),
(3, 9, 'Modifié', '2022-05-09 15:41:53');

-- --------------------------------------------------------

--
-- Structure de la table `parties_audit_archives`
--

CREATE TABLE `parties_audit_archives` (
  `id` int(11) NOT NULL,
  `partie_id` int(11) NOT NULL,
  `changeType` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `changetime` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parties_audit_archives`
--

INSERT INTO `parties_audit_archives` (`id`, `partie_id`, `changeType`, `changetime`) VALUES
(4, 15, 'Nouveau', '2022-05-09 18:19:47'),
(5, 15, 'Effacé', '2022-05-09 18:29:23');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `nomVille` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
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
-- Index pour la table `parties_archives`
--
ALTER TABLE `parties_archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Equipe1` (`id_Equipe1`),
  ADD KEY `id_Equipe2` (`id_Equipe2`);

--
-- Index pour la table `parties_audit`
--
ALTER TABLE `parties_audit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partie_id` (`partie_id`);

--
-- Index pour la table `parties_audit_archives`
--
ALTER TABLE `parties_audit_archives`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `parties_archives`
--
ALTER TABLE `parties_archives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `parties_audit`
--
ALTER TABLE `parties_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

--
-- Contraintes pour la table `parties_audit`
--
ALTER TABLE `parties_audit`
  ADD CONSTRAINT `parties_audit_ibfk_1` FOREIGN KEY (`partie_id`) REFERENCES `parties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Évènements
--
CREATE DEFINER=`root`@`localhost` EVENT `archive_parties` ON SCHEDULE EVERY 1 MINUTE STARTS '2018-03-26 15:30:15' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN	
		-- copy deleted posts
		INSERT INTO parties_archives (id, id_Equipe1, id_Equipe2,point_Equipe1,point_Equipe2,jour_de_la_partie,Serie,Ville) 
		SELECT id, id_Equipe1, id_Equipe2,point_Equipe1,point_Equipe2,jour_de_la_partie,Serie,Ville
		FROM parties
		WHERE efface = 1;
	    
		-- copy associated audit records
		INSERT INTO parties_audit_archives (id, partie_id, changetype, changetime) 
		SELECT parties_audit.id, parties_audit.partie_id, parties_audit.changetype, parties_audit.changetime 
		FROM parties_audit
		JOIN parties ON parties_audit.partie_id = parties.id
		WHERE parties.efface = 1;
		
		-- remove deleted blogs and audit entries
		DELETE FROM parties WHERE efface = 1;
	    
	END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
