-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 25 Août 2017 à 12:11
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
  `idProprio` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `nbCouchage` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  `numAppart` int(11) NOT NULL,
  `etage` int(11) NOT NULL,
  `numRue` int(11) NOT NULL,
  `nomRue` varchar(100) NOT NULL,
  `codepostal` int(11) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `dispo` tinyint(1) NOT NULL,
  `lienPhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `appartement`
--

INSERT INTO `appartement` (`id`, `idProprio`, `type`, `nbCouchage`, `prix`, `description`, `numAppart`, `etage`, `numRue`, `nomRue`, `codepostal`, `ville`, `pays`, `dispo`, `lienPhoto`) VALUES
(1, 4, 'appartement', 1, 250, ' belle appart', 20, 2, 12, 'de gaulle', 66000, 'perpignan', 'France', 0, ''),
(2, 1, 'mobilhome', 3, 200, ' belle idee pour les vacances', 25, 1, 14, 'de la garrigue', 66700, 'labas', 'France', 0, ''),
(3, 1, 'appartement', 8, 200, ' bel appart', 25, 1, 15, 'du verre', 66390, 'baixas', 'France', 0, ''),
(5, 1, 'appartement', 1, 200, ' bel appart', 2, 2, 25, 'de gaulle', 66000, 'perpignan', 'France', 0, 'image/image1.jpg'),
(6, 2, 'appartement', 2, 250, ' appart de luxe', 2, 3, 25, 'de gaulle', 66000, 'perpignan', 'France', 0, 'image/image2.jpg'),
(7, 4, 'appartement', 6, 360, 'bel appart', 25, 1, 10, 'rue monge', 66000, 'baixas', 'France', 0, 'image/image4.jpg');

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

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `idProprio` int(11) NOT NULL,
  `idAppart` int(11) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `date_inscription` date NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `telephone`, `date_inscription`, `password`) VALUES
(1, 'toto', 'toto', 'toto@to.to', '0025896314', '2021-08-17', 'toto'),
(2, 'titi', 'titi', 'titi@ti.fr', '01-25-36-98-52', '2021-08-17', 'titi'),
(3, 'tete', 'tete', 'tete@te.te', '01-25-36-98-52', '2021-08-17', 'tete'),
(4, 'soso', 'soso', 'soso@so.so', '0025896314', '2022-08-17', 'soso');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `appartement`
--
ALTER TABLE `appartement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proprio` (`id_proprio`),
  ADD KEY `loueur` (`id_loueur`),
  ADD KEY `appart` (`id_appart`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `appartement`
--
ALTER TABLE `appartement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `appart` FOREIGN KEY (`id_appart`) REFERENCES `appartement` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loueur` FOREIGN KEY (`id_loueur`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proprio` FOREIGN KEY (`id_proprio`) REFERENCES `user` (`id`) ON DELETE CASCADE;