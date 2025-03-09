-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 09 mars 2025 à 21:57
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `expertmove`
--

-- --------------------------------------------------------

--
-- Structure de la table `chauffeur`
--

CREATE TABLE `chauffeur` (
  `id` int(11) NOT NULL,
  `Nom` varchar(11) NOT NULL,
  `Prenom` varchar(11) NOT NULL,
  `telephone` int(11) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `passwordd` varchar(8) NOT NULL,
  `licence` varchar(60) NOT NULL,
  `vehicule` varchar(60) NOT NULL,
  `wilaya` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chauffeur`
--

INSERT INTO `chauffeur` (`id`, `Nom`, `Prenom`, `telephone`, `Email`, `passwordd`, `licence`, `vehicule`, `wilaya`) VALUES
(21, 'rayan', 'moussaoui', 541768051, 'COSA@GMAIL.COM', 'RTYTUFYG', 'jhjkbkn', 'AUDI', 'blida'),
(22, 'rayan', 'belbari', 541768051, 'COSA@GMAIL.COM', 'qzrestry', '2003', 'AUDI', 'blida'),
(23, 'rayan', 'belbari', 541768051, 'COSA@GMAIL.COM', 'qzrestry', '2003', 'AUDI', 'blida');

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `objet` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`id`, `nom`, `email`, `objet`, `message`) VALUES
(9, 'rayan', 'rayanms022@gmail.com', 'reclamation', 'klnpinqocn');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `Nom` varchar(60) NOT NULL,
  `Prenom` varchar(60) NOT NULL,
  `telephone` int(10) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `passwordd` text NOT NULL,
  `nom_entreprise` varchar(60) NOT NULL,
  `registre` int(60) NOT NULL,
  `wilaya` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `Nom`, `Prenom`, `telephone`, `Email`, `passwordd`, `nom_entreprise`, `registre`, `wilaya`) VALUES
(13, 'amar', 'fghjk;', 9137598, 'moomoommmo@gamil.com', '$2y$10$vmzgcMNA6sdkzcKR6bXlWu7AFGpFePmtav2jNpZpDB/UD6KkVIyZm', 'ygkjb', 9876, ''),
(14, 'bensalem', 'malek', 6539075, 'fares@gamil.com', '$2y$10$BKlAdPFWsKImVx.InAAkEOoe98LHYEvRX38Cu8sAz9hyj7y6JS0wW', 'fares job', 774992, '');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `chargement_dechargement` tinyint(1) DEFAULT 1,
  `protection_meubles` tinyint(1) DEFAULT 0,
  `emballage_fragile` tinyint(1) DEFAULT 0,
  `emballage_complet` tinyint(1) DEFAULT 0,
  `fourniture_cartons` tinyint(1) DEFAULT 0,
  `montage_meubles_simples` tinyint(1) DEFAULT 0,
  `duree_max` varchar(20) NOT NULL,
  `Contenu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id`, `nom`, `description`, `prix`, `chargement_dechargement`, `protection_meubles`, `emballage_fragile`, `emballage_complet`, `fourniture_cartons`, `montage_meubles_simples`, `duree_max`, `Contenu`) VALUES
(1, 'Economique', 'Déménagez à petit prix, sans stress !', 15.00, 1, 1, 0, 0, 0, 0, '7 jours min', ''),
(2, 'Confort', 'Simplifiez votre déménagement !', 25.00, 1, 1, 1, 0, 1, 1, '48h max', ''),
(3, 'Luxe', 'Le déménagement sans effort !', 45.00, 1, 1, 1, 0, 1, 1, '24h max', ''),
(6, 'rayan', '(srydtufyiguoihjm', 233.98, 0, 0, 0, 0, 0, 0, '1h', 'dxfcgjvhkbjlknml,lmkjhvcgb n,,;n:,ljihkugjfgcnb nbgjyftdfxnb,vjbkgujyfgch,vjb;khugjyfhgcn'),
(7, 'youssra', '\"q(\'s-(d-fèg_ohpjokpù', 123456.00, 1, 1, 1, 0, 0, 0, '12', ''),
(8, 'rayan', 'cctvyubinm', 1.00, 1, 0, 0, 0, 0, 0, '1', '');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `currentAddress` varchar(255) NOT NULL,
  `newAddress` varchar(255) NOT NULL,
  `tarif` enum('economique','confort','lux') NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `businessMove` tinyint(1) DEFAULT 0,
  `details` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `email`, `phone`, `currentAddress`, `newAddress`, `tarif`, `date`, `time`, `businessMove`, `details`, `message`, `created_at`) VALUES
(1, 'Rayan', 'rayanms022@gmail.com', '0541768051', 'city1', 'city2', 'economique', '2025-03-08', '06:31:00', 1, 'azqersetdytfuyguihijokpù', 'qezrtdyfugihi', '2025-03-08 05:39:59'),
(2, 'KOK', 'amara@gmail.com', '0541768054', 'city3', 'city4', 'lux', '2025-03-07', '12:47:00', 1, 'aqezresrdtfuyiuiopù', 'qaezrserdytfuyiui', '2025-03-08 05:41:49');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `passwordd` text NOT NULL,
  `wilaya` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `telephone`, `email`, `passwordd`, `wilaya`) VALUES
(36, 'rayan', 'moussaoui', 541768051, 'COSA@GMAIL.COM', 'RTYTUFYGULK', 'blida'),
(37, 'rayan', 'moussaoui', 541768051, 'COSA@GMAIL.COM', 'RTYTUFYGULK', 'blida'),
(38, 'amar', 'moussaoui', 0, 'rayanmssssssssss022@gmail.com', 'xtrytcuyviubl', 'blida'),
(39, 'amar', 'malek', 9876543, 'moomoommmo@gamil.com', 'lllllllllllll', 'blida');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
