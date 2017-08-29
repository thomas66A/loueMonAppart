-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Mar 29 Août 2017 à 16:53
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
  `dispo` int(11) NOT NULL,
  `lienPhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `appartement`
--

INSERT INTO `appartement` (`id`, `idProprio`, `type`, `nbCouchage`, `prix`, `description`, `numAppart`, `etage`, `numRue`, `nomRue`, `codepostal`, `ville`, `pays`, `dispo`, `lienPhoto`) VALUES
(18, 1, 'appartement', 4, 300, ' Tres belle appartement en plein coeur de Perpignan. Commodité à proximité.', 1, 3, 25, 'Rue de castillet', 66000, 'perpignan', 'France', 1, '/loueMonAppart/image/image-1-1.jpg'),
(19, 1, 'villa', 6, 500, ' Villa en pleine nature. Calme garantie. Sans vis à vis. Piscine', 19, 1, 33, 'Chemin des vignes', 66300, 'Banuyls Dels Aspres', 'France', 1, '/loueMonAppart/image/image-19-1.jpg'),
(20, 4, 'chalet', 3, 400, ' Tres beaux chalet, en pleine montagne, mais avec vue sur mer. Proche des stations de sky.', 20, 1, 3, 'Avenue du mont-blanc', 66210, 'Font-Romeu', 'France', 1, '/loueMonAppart/image/image-20-4.jpg'),
(21, 3, 'mobilhome', 4, 200, ' Beau mobil-home neuf. En pleine campgne. Foret et randonnée à proximité.', 21, 0, 1, 'Le champs fleury', 66390, 'baixas', 'France', 1, '/loueMonAppart/image/image-21-3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `idProprio` int(11) NOT NULL,
  `idLoueur` int(11) NOT NULL,
  `idAppart` int(11) NOT NULL,
  `debutLoc` date NOT NULL,
  `finLoc` date NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `location`
--

INSERT INTO `location` (`id`, `idProprio`, `idLoueur`, `idAppart`, `debutLoc`, `finLoc`, `prix`) VALUES
(10, 4, 3, 20, '2017-09-01', '2017-09-12', 800),
(11, 1, 1, 19, '2017-09-21', '2017-09-30', 1000),
(12, 4, 2, 20, '2017-10-01', '2017-10-18', 1200),
(13, 1, 4, 18, '2017-09-01', '2017-08-17', -600),
(14, 1, 4, 19, '2017-12-02', '2017-12-31', 2500);

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
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proprio` (`idProprio`),
  ADD KEY `loueur` (`idLoueur`),
  ADD KEY `appart` (`idAppart`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;