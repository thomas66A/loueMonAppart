-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 04 Août 2017 à 14:02
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `locappart`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartement`
--

CREATE TABLE `appartement` (
  `id` int(11) NOT NULL,
  `id_proprio` int(11) NOT NULL,
  `id_appart` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  `num_rue` int(11) NOT NULL,
  `nom_rue` varchar(100) NOT NULL,
  `codepostal` int(11) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `dispo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bailleur`
--

CREATE TABLE `bailleur` (
  `id` int(11) NOT NULL,
  `id_bail` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `date_inscription` date NOT NULL,
  `nb_bien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `id_proprio` int(11) NOT NULL,
  `id_locataire` int(11) NOT NULL,
  `id_appart` int(11) NOT NULL,
  `id_commentaire` int(11) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `locataire`
--

CREATE TABLE `locataire` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `date_inscription` date NOT NULL,
  `deja_loc` tinyint(1) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `locataire`
--

INSERT INTO `locataire` (`id`, `nom`, `prenom`, `email`, `telephone`, `date_inscription`, `deja_loc`, `password`) VALUES
(1, 'ohare', 'thomas', 'toto@to.fr', '0681818239', '2017-08-03', 0, 'toto');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `id_proprio` int(11) NOT NULL,
  `id_loueur` int(11) NOT NULL,
  `id_appart` int(11) NOT NULL,
  `debut_loc` date NOT NULL,
  `fin_loc` date NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `appartement`
--
ALTER TABLE `appartement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bailleur`
--
ALTER TABLE `bailleur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `locataire`
--
ALTER TABLE `locataire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `appartement`
--
ALTER TABLE `appartement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `bailleur`
--
ALTER TABLE `bailleur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `locataire`
--
ALTER TABLE `locataire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;