-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 22 mai 2018 à 15:34
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
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id_rep` int(5) NOT NULL,
  `id_q` int(5) NOT NULL,
  `rep` varchar(100) NOT NULL,
  `bool_rep` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`id_rep`, `id_q`, `rep`, `bool_rep`) VALUES
(1, 1, 'Le chevreuil', 0),
(2, 1, 'Le guépard', 1),
(3, 1, 'La gazelle', 0),
(4, 1, 'Le léopard', 0),
(5, 2, 'Ares', 1),
(6, 2, 'Hadés', 0),
(7, 2, 'Hermes', 0),
(8, 2, 'Apollon', 0),
(9, 3, 'Woody alen', 0),
(10, 3, 'Guillermo del torro', 0),
(11, 3, 'Pedro almodovar', 1),
(12, 3, 'Pablo trapero', 0),
(13, 4, 'Jules cesar', 1),
(14, 4, 'Napoleon', 0),
(15, 4, 'Hitler', 0),
(16, 4, 'Brutus', 0),
(17, 5, 'L’Allemagne', 1),
(18, 5, 'L’Italie', 0),
(19, 5, 'L’Espagne', 0),
(20, 5, 'Le bresil', 0),
(21, 6, 'Verone', 1),
(22, 6, 'Rome', 0),
(23, 6, 'Naples', 0),
(24, 6, 'Venise', 0),
(25, 7, 'Marâtre', 1),
(26, 7, 'Godiche', 0),
(27, 7, 'Jocrisse', 0),
(28, 7, 'Chenapan', 0),
(29, 8, 'Hitler', 0),
(30, 8, 'Staline', 1),
(31, 8, 'Lenine', 0),
(32, 8, 'Musolini', 0),
(33, 9, 'Bob marley', 1),
(34, 9, 'Eric clapton', 0),
(35, 9, 'Jim morrison', 0),
(36, 9, 'Ub40', 0),
(37, 10, 'Feignons', 1),
(38, 10, 'Feindre', 0),
(39, 10, 'Feindez', 0),
(40, 10, 'Feins', 0),
(41, 11, 'Christopher Nolan', 0),
(42, 11, 'Matheuw MacConaughey', 1),
(43, 11, 'Brad pit', 0),
(44, 11, 'Tom cruise', 0),
(45, 12, 'Le Portugal', 0),
(46, 12, 'L’Italie', 0),
(47, 12, 'L’Espagne', 0),
(48, 12, 'La France', 1),
(49, 13, 'Photoshop', 0),
(50, 13, 'Bracket ', 1),
(51, 13, 'Notepad', 1),
(52, 13, 'Sublime text', 1),
(53, 14, 'Gary Payton', 1),
(54, 14, 'Vince Carter', 1),
(55, 14, 'Kevin Durant', 1),
(56, 14, 'Kevin Durant', 1),
(57, 14, 'Jordan', 1),
(58, 15, 'La grece', 1),
(59, 15, 'L’Espagne', 1),
(60, 15, 'Le pays de Galle', 0),
(61, 15, 'La Turquie', 0),
(62, 16, 'Jurisprudence', 0),
(63, 16, 'Contraire à la constitution', 1),
(64, 16, 'Illégalement', 1),
(65, 16, 'Illicitement', 1),
(66, 17, 'France brésil', 0),
(67, 17, 'Espagne Allemagne', 0),
(68, 17, 'Russie Arabie saoudite', 1),
(69, 17, 'Turquie Arménie ', 0),
(70, 18, 'Publisher', 0),
(71, 18, 'Dreamweaver', 1),
(72, 18, 'Photoshop', 1),
(73, 18, 'InDesign', 1),
(74, 19, 'paint', 0),
(75, 19, 'Composer', 1),
(76, 19, 'Symfony', 1),
(77, 19, 'MySQL', 1),
(78, 20, 'conative', 1),
(79, 20, 'expressive', 1),
(80, 20, 'intuitive', 0),
(81, 20, 'phatique', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id_rep`,`id_q`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id_rep` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
