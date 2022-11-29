-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 18 sep. 2022 à 13:16
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eupdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee_scolaire`
--

CREATE TABLE `annee_scolaire` (
  `id_annee_scolaire` int(11) NOT NULL,
  `nom_annee` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annee_scolaire`
--

INSERT INTO `annee_scolaire` (`id_annee_scolaire`, `nom_annee`, `description`) VALUES
(1, '2022-2023', 'l&#039;année scolaire 2022 à 2023'),
(2, '2023-2024', 'l&#039;année scolaire 2023 à 2024'),
(3, '2024-2025', 'lannee scolaire de 2024 a 2025'),
(4, '2025-2026', 'année scolaire 25 a 26'),
(5, '2026-2027', 'année scolaire 26 a 27');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `nomClasse` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `nbre_par_classe` int(11) NOT NULL,
  `montant_annuelle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id_classe`, `nomClasse`, `description`, `nbre_par_classe`, `montant_annuelle`) VALUES
(1, '1eme Année', 'la premiere classe', 52, 100000),
(5, '2eme Année', 'la classe de lannee 2', 45, 100000),
(6, '3eme Année', 'la classe de lannee 3', 55, 100000),
(7, '4eme Année', 'la classe de 3ere Année', 55, 120000),
(8, '5eme Année', '5 eme année', 55, 210000),
(9, '6eme Année', 'la classe de 6 eme', 55, 200000),
(10, '7eme Année', 'la classe de 7eme Année', 41, 200000),
(11, '8eme Année', 'la classe de 8eme Année', 25, 200000),
(12, '9eme Année', 'la classe de 9eme Année', 45, 200000);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id_eleve` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `adresse` varchar(100) NOT NULL,
  `np_mere` varchar(45) DEFAULT NULL,
  `np_pere` varchar(45) DEFAULT NULL,
  `tel_parent` varchar(45) NOT NULL,
  `lieuxtravailPere` varchar(45) DEFAULT NULL,
  `lieuxtravailMere` varchar(45) DEFAULT NULL,
  `date_nais` date NOT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `date_enregister` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id_eleve`, `nom`, `prenom`, `telephone`, `adresse`, `np_mere`, `np_pere`, `tel_parent`, `lieuxtravailPere`, `lieuxtravailMere`, `date_nais`, `sex`, `date_enregister`, `id_user`) VALUES
(10012, 'Diarra', 'Mohamed', '78858474', 'bamako totuba', 'traore Ousmane', 'Diarra adama', '99987878/78454578', 'sukala', 'croix rouge', '2003-02-28', 'Masculin', '0000-00-00 00:00:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id_inscription` int(11) NOT NULL,
  `frais_inscription` int(11) NOT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `id_eleve` int(10) UNSIGNED NOT NULL,
  `id_annee_scolaire` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id_inscription`, `frais_inscription`, `date_inscription`, `id_eleve`, `id_annee_scolaire`, `id_classe`, `id_user`) VALUES
(26, 5000, '2022-08-29 00:00:00', 10012, 1, 1, 3),
(27, 10000, '2022-08-19 00:00:00', 10012, 2, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` int(11) NOT NULL,
  `octobre` varchar(45) DEFAULT '0',
  `novembre` varchar(45) DEFAULT '0',
  `decembre` varchar(45) DEFAULT '0',
  `janvier` varchar(45) DEFAULT '0',
  `fevrier` varchar(45) DEFAULT '0',
  `mars` varchar(45) DEFAULT '0',
  `avril` varchar(45) DEFAULT '0',
  `mai` varchar(45) DEFAULT '0',
  `juin` varchar(45) DEFAULT '0',
  `juillet` varchar(45) DEFAULT '0',
  `coperative_cgs` int(11) DEFAULT 0,
  `id_inscription` int(11) NOT NULL,
  `id_eleve` int(10) UNSIGNED NOT NULL,
  `date_enregister` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`id_paiement`, `octobre`, `novembre`, `decembre`, `janvier`, `fevrier`, `mars`, `avril`, `mai`, `juin`, `juillet`, `coperative_cgs`, `id_inscription`, `id_eleve`, `date_enregister`, `id_user`) VALUES
(12, '10000', '', '', '', '', '', '', '', '', '', 1500, 26, 10012, '0000-00-00 00:00:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `password`) VALUES
(1, 'mohamed', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(3, 'Mohamed', '292959f6c7ab4f8b0761469ac1f11fc73f43b306'),
(4, 'oumar', 'e46fe04c2110182be955b4230f87e4767d7b8412');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annee_scolaire`
--
ALTER TABLE `annee_scolaire`
  ADD PRIMARY KEY (`id_annee_scolaire`),
  ADD UNIQUE KEY `nom_annee_UNIQUE` (`nom_annee`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`id_eleve`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id_inscription`,`id_eleve`,`id_annee_scolaire`,`id_classe`),
  ADD KEY `fk_inscription_eleve_idx` (`id_eleve`),
  ADD KEY `fk_inscription_annee_scolaire1_idx` (`id_annee_scolaire`),
  ADD KEY `fk_inscription_classe1_idx` (`id_classe`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_paiement`,`id_inscription`,`id_eleve`),
  ADD KEY `fk_paiement_inscription1_idx` (`id_inscription`,`id_eleve`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annee_scolaire`
--
ALTER TABLE `annee_scolaire`
  MODIFY `id_annee_scolaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `id_eleve` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10013;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`id_eleve`) REFERENCES `eleve` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscription_ibfk_3` FOREIGN KEY (`id_annee_scolaire`) REFERENCES `annee_scolaire` (`id_annee_scolaire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`id_inscription`) REFERENCES `inscription` (`id_inscription`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paiement_ibfk_2` FOREIGN KEY (`id_eleve`) REFERENCES `inscription` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
