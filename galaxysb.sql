-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 23 Janvier 2020 à 00:06
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `galaxysb`
--

-- --------------------------------------------------------

--
-- Structure de la table `compterendu`
--

CREATE TABLE `compterendu` (
  `idCR` int(5) NOT NULL,
  `dateCR` date NOT NULL,
  `visiteurCR` varchar(100) NOT NULL,
  `medecinCR` varchar(100) NOT NULL,
  `motifCR` varchar(100) NOT NULL,
  `bilanCR` varchar(1500) NOT NULL,
  `redigePar` int(5) NOT NULL,
  `modifierPar` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compterendu`
--

INSERT INTO `compterendu` (`idCR`, `dateCR`, `visiteurCR`, `medecinCR`, `motifCR`, `bilanCR`, `redigePar`, `modifierPar`) VALUES
(1, '2019-11-07', 'Alysson Blanc', 'Elizabeth Bertin', 'Presentation d\'un nouveau medicament', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet aliquam id diam maecenas ultricies mi eget. Diam quis enim lobortis scelerisque fermentum. Enim sit amet venenatis urna cursus eget nunc scelerisque viverra. Eget duis at tellus at urna condimentum mattis pellentesque. Arcu risus quis varius quam quisque. Pharetra sit amet aliquam id diam maecenas ultricies mi eget. Diam quis enim lobortis scelerisque fermentum dui faucibus in ornare. Enim sed faucibus turpis in. Pretium viverra suspendisse potenti nullam ac tortor vitae.\r\n\r\nUltricies integer quis auctor elit. Odio ut enim blandit volutpat maecenas. Malesuada fames ac turpis egestas integer eget. Condimentum vitae sapien pellentesque habitant morbi. Eget duis at tellus at urna condimentum mattis. Nibh praesent tristique magna sit amet purus gravida quis blandit. Dapibus ultrices in iaculis nunc sed augue lacus viverra. Pharetra diam sit amet nisl suscipit. Placerat vestibulum lectus mauris ultrices eros in cursus turpis massa. Ac ut consequat semper viverra nam. Urna neque viverra justo nec ultrices dui sapien. Nec tincidunt praesent semper feugiat nibh sed.\r\n\r\nSuspendisse interdum consectetur libero id. Risus ultricies tristique nulla aliquet enim tortor at. Id semper risus in hendrerit gravida rutrum quisque non tellus. Pharetra pharetra massa massa ultricies mi quis hendrerit dolor. Posuere morbi leo urna molestie at elementum. Quam viverra o', 1, NULL),
(4, '2019-11-07', 'Alysson Blanc', 'Elizabeth Bertin', 'Presentation d\'un nouveau medicament', 'kmjhgjbk', 1, NULL),
(7, '2019-10-10', 'Aleron Huot', 'Maslin Majory', 'Rendez-vous d\'affaire', 'Le medecin nous a visite.', 1, NULL),
(8, '2019-10-10', 'Aleron Huot', 'Maslin Majory', 'Presentation d\'un nouveau medicament', 'sfgg', 1, NULL),
(9, '2019-10-13', 'Alysson Blanc', 'Elizabeth Bertin', 'Presentation d\'un nouveau medicament', 'xc', 1, NULL),
(10, '2019-10-10', 'Aleron Huot', 'Elizabeth Bertin', 'Rendez-vous d\'affaire', 'lppioioioio', 1, NULL),
(11, '2019-10-10', 'Alysson Blanc', 'Elizabeth Bertin', 'Rendez-vous d\'affaire', 'wdwcwscwcwcwcw', 1, NULL),
(12, '2019-10-16', 'Alysson Blanc', 'Elizabeth Bertin', 'Presentation d\'un nouveau medicament', 'dqdq', 1, NULL),
(13, '2019-11-07', 'Alysson Blanc', 'Elizabeth Bertin', 'Presentation d\'un nouveau medicament', 'bfh', 1, NULL),
(14, '2019-11-07', 'root', 'Adre Karman', 'Presentation d\'un nouveau medicament', 'dfd', 1, NULL),
(15, '2020-01-15', 'root', 'Adre Karman', 'Presentation d\'un nouveau medicament', 'frfff', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `idMedecin` int(5) NOT NULL,
  `nomMedecin` varchar(50) NOT NULL,
  `prenomMedecin` varchar(50) NOT NULL,
  `specMedecin` varchar(300) NOT NULL,
  `adresseMedecin` varchar(150) NOT NULL,
  `villeMedecin` varchar(200) NOT NULL,
  `cpMedecin` int(10) NOT NULL,
  `telMedecin` varchar(15) NOT NULL,
  `depMedecin` int(5) NOT NULL,
  `ajouterPar` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `medecin`
--

INSERT INTO `medecin` (`idMedecin`, `nomMedecin`, `prenomMedecin`, `specMedecin`, `adresseMedecin`, `villeMedecin`, `cpMedecin`, `telMedecin`, `depMedecin`, `ajouterPar`) VALUES
(12, 'Adre', 'Karman', 'Generaliste', '7 rue pilet', 'paris', 75004, '0678554128', 0, 1),
(13, 'jean', 'jaures', 'Generaliste', '78 rue jean jaures', 'lyon', 69004, '0745887412', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtil` int(5) NOT NULL,
  `pseudoUtil` varchar(60) NOT NULL,
  `passUtil` varchar(100) NOT NULL,
  `gradeUtil` int(1) NOT NULL DEFAULT '0',
  `prenomUtil` varchar(50) DEFAULT NULL,
  `emailUtil` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtil`, `pseudoUtil`, `passUtil`, `gradeUtil`, `prenomUtil`, `emailUtil`) VALUES
(1, 'root', 'root', 0, 'root', 'root@gmail.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `compterendu`
--
ALTER TABLE `compterendu`
  ADD PRIMARY KEY (`idCR`),
  ADD KEY `redigePar` (`redigePar`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`idMedecin`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtil`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `compterendu`
--
ALTER TABLE `compterendu`
  MODIFY `idCR` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `idMedecin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
