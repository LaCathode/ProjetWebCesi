-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 22 mai 2018 à 15:36
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetwebcesi`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id_question` int(5) NOT NULL,
  `question` varchar(250) NOT NULL,
  `bool_pl` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id_question`, `question`, `bool_pl`) VALUES
(1, 'Parmi les animaux suivants, lequel peut se déplacer le plus rapidement ?', 0),
(2, 'Qui est le dieu de la guerre dans la mythologie grecque?', 0),
(3, 'Quel cinéaste a réalisé “Parle avec elle” et “Volver” ?', 0),
(4, 'Qui a dit “ Le sort en est jeté” (Alea jacta est)?', 0),
(5, 'Quel pays a remporté la coupe du monde de football en 2014 ?', 0),
(6, 'Dans quelle ville italienne se situe l’action de la pièce de Shakespeare “Roméo et Juliette” ?', 0),
(7, 'Par quel mot désigne-t-on une belle-mère cruelle ?', 0),
(8, 'Quel célèbre dictateur dirigea l’URSS du début des années 1920 à 1953 ?', 0),
(9, 'À qui doit-on la chanson “ I Shot the Sheriff” ?', 0),
(10, 'Quel est l’impératif du verbe feindre à la première personne du pluriel ?', 0),
(11, 'Quel acteur américain incarne le héros du film de Christopher Nolan de 2014 “Interstellar” ?', 0),
(12, 'Dans quel pays trouve t’on la Loire, la Meuse et le Rhin ?', 0),
(13, 'Quels sont les logiciels valident pour le développement informatique ?', 1),
(14, 'Quels joueurs de NBA ont déjà obtenus les titres de MVP ?', 1),
(15, 'Quels sont les pays qui utilisent une monnaie commune ? touvez la mauvaise réponse ', 0),
(16, 'Quels sont les synonymes de anticonstitutionnel ?', 1),
(17, 'Quels est l’affiche du premier match de la coupe du monde 2018 ?', 0),
(18, 'Quels sont les logiciels de la suite adobe ?', 1),
(19, 'quels sont les supports de développement informatique ?', 1),
(20, 'quelles fonctions de communication ?', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id_question` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
