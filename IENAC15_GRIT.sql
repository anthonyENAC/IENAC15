-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 29 Mai 2016 à 23:57
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.20

CREATE DATABASE IF NOT EXISTS IENAC15_GRIT;
USE IENAC15_GRIT;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `IENAC15_GRIT`
--

-- --------------------------------------------------------

--
-- Structure de la table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Administrateur`
--

INSERT INTO `Administrateur` (`id_user`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `Commentaires`
--

CREATE TABLE `Commentaires` (
  `Nom_Prenom` varchar(20) NOT NULL,
  `E_mail` varchar(30) NOT NULL,
  `Commentaire` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Etat`
--

CREATE TABLE `Etat` (
  `id_etat` int(11) NOT NULL,
  `etat` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Etat`
--

INSERT INTO `Etat` (`id_etat`, `etat`) VALUES
(1, 'En service'),
(2, 'En panne'),
(3, 'En maintenance');

-- --------------------------------------------------------

--
-- Structure de la table `Mode_Transport`
--

CREATE TABLE `Mode_Transport` (
  `id_transport` int(11) NOT NULL,
  `id_etat` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Mode_Transport`
--

INSERT INTO `Mode_Transport` (`id_transport`, `id_etat`, `id_type`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 2),
(6, 1, 2),
(7, 1, 2),
(8, 1, 2),
(9, 1, 2),
(10, 1, 2),
(11, 1, 2),
(12, 1, 2),
(13, 1, 2),
(14, 1, 2),
(15, 1, 2),
(16, 1, 2),
(17, 1, 2),
(18, 1, 2),
(19, 1, 2),
(20, 1, 2),
(21, 1, 2),
(22, 1, 2),
(23, 1, 2),
(24, 1, 2),
(25, 1, 3),
(26, 1, 3),
(27, 1, 3),
(28, 1, 3),
(29, 1, 3),
(30, 1, 4),
(31, 1, 4),
(32, 1, 4),
(33, 1, 4),
(34, 1, 4),
(35, 1, 4),
(36, 1, 4),
(37, 1, 4),
(38, 1, 5),
(39, 1, 5),
(40, 1, 5),
(41, 1, 5),
(42, 1, 5),
(43, 1, 7),
(44, 1, 7),
(45, 1, 7),
(46, 1, 7),
(47, 1, 7),
(48, 1, 7),
(49, 1, 7),
(50, 1, 7),
(51, 1, 7),
(52, 1, 7),
(53, 1, 7),
(54, 1, 7),
(55, 1, 7),
(56, 1, 7),
(57, 1, 7),
(58, 1, 7),
(59, 1, 7),
(60, 1, 7),
(61, 1, 7),
(62, 1, 7),
(63, 1, 7),
(64, 1, 7),
(65, 1, 7),
(66, 1, 7),
(67, 1, 7),
(68, 1, 7),
(69, 1, 7),
(70, 1, 7),
(71, 1, 7),
(72, 1, 7),
(73, 1, 7),
(74, 1, 7),
(75, 1, 7),
(76, 1, 7),
(77, 1, 7),
(78, 1, 7),
(79, 1, 7),
(80, 1, 7),
(81, 1, 7),
(82, 1, 7),
(83, 1, 7),
(84, 1, 7),
(85, 1, 7),
(86, 1, 7),
(87, 1, 7),
(88, 1, 7),
(89, 1, 7),
(90, 1, 7),
(91, 1, 7),
(92, 1, 7),
(93, 1, 7),
(94, 1, 7),
(95, 1, 7),
(96, 1, 7),
(97, 1, 7),
(98, 1, 7),
(99, 1, 7),
(100, 1, 7),
(101, 1, 7),
(102, 1, 7),
(103, 1, 8),
(104, 1, 8),
(105, 1, 8),
(106, 1, 8),
(107, 1, 8),
(108, 1, 8),
(109, 1, 8),
(110, 1, 8),
(111, 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `Mode_Type`
--

CREATE TABLE `Mode_Type` (
  `id_type` int(11) NOT NULL,
  `descr_type` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Mode_Type`
--

INSERT INTO `Mode_Type` (`id_type`, `descr_type`) VALUES
(1, 'Avion'),
(2, 'Bus'),
(3, 'Tramway'),
(4, 'Train'),
(5, 'Voiture'),
(6, 'Vélo'),
(7, 'Metro'),
(8, 'Piéton');

-- --------------------------------------------------------

--
-- Structure de la table `Station`
--

CREATE TABLE `Station` (
  `id_station` int(11) NOT NULL,
  `nom_station` char(50) DEFAULT NULL,
  `lat` char(15) DEFAULT NULL,
  `lng` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Station`
--

INSERT INTO `Station` (`id_station`, `nom_station`, `lat`, `lng`) VALUES
(1, 'ENAC - Toulouse', '43.565278', '1.481111'),
(2, 'Tour Ariane - La Défense', '48.889444', '2.243611'),
(3, 'Fac de Pharmacie', '43.568036', '1.464547'),
(4, 'Ramonvile', '43.555778', '1.476361'),
(5, 'Jean-Jaurès', '43.60595', '1.448989'),
(6, 'Marengo SNCF', '43.610925', '1.45505'),
(7, 'Gare routière Pierre Sémard', '43.612551', '1.452523'),
(8, 'Gare routière Paris-Bercy', '48.839039', '2.383081'),
(9, 'Station RER Paris-Lyon', '48.8448', '2.3735'),
(10, 'Station Grande Arche de la Défense', '48.891934', '2.237883'),
(11, 'Gare de Lyon', '48.844705', '2.374066'),
(12, 'Soljenitsyne - Vélo', '48.8844778', '2.2477194444444'),
(13, 'Esplanade de la Défense', '48.887843', '2.250442'),
(14, 'Gare Matabiau', '43.611322', '1.454112'),
(15, 'Gare Austerliz', '48.8416', '2.3661'),
(16, 'Gare Montparnasse', '48.841157', '2.320474'),
(17, 'Montparnasse Bienvenue', '48.843466', '2.323072'),
(18, 'Station Place Charles de Gaulle', '48.874408', '2.295763'),
(19, 'Station Gaité', '48.838654', '2.322637'),
(20, 'Station Champs Elysée Clémenceau', '48.867411', '2.313959'),
(21, 'Palais de Justice', '43.592217', '1.444594'),
(22, 'Aéroport de Blagnac', '43.635', '1.36778'),
(23, 'Orly Sud', '48.729027', '2.369972'),
(24, 'Antony RER', '48.754864', '2.300915'),
(25, 'Paris Chatelet/Les Halles', '45.8615', '2.3465'),
(26, 'Aéroport Orly', '48.72551', '2.359443');

-- --------------------------------------------------------

--
-- Structure de la table `Trajet_Utilisateur`
--

CREATE TABLE `Trajet_Utilisateur` (
  `id_trajet` int(11) NOT NULL,
  `liste_troncon` char(255) DEFAULT NULL,
  `mode_transport` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Transport_Troncon`
--

CREATE TABLE `Transport_Troncon` (
  `num` int(11) NOT NULL,
  `duree` int(11) DEFAULT NULL,
  `heure_passage` int(11) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `id_transport` int(11) DEFAULT NULL,
  `id_troncon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Transport_Troncon`
--

INSERT INTO `Transport_Troncon` (`num`, `duree`, `heure_passage`, `prix`, `id_transport`, `id_troncon`) VALUES
(1, 22500, 21600, 90, 38, 1),
(2, 300, 22020, 1.6, 5, 2),
(3, 300, 27540, 1.6, 6, 2),
(4, 300, 33300, 1.6, 7, 2),
(5, 300, 41280, 1.6, 8, 2),
(6, 300, 49440, 1.6, 9, 2),
(7, 300, 23700, 1.6, 10, 3),
(8, 300, 23700, 1.6, 11, 3),
(9, 300, 28800, 1.6, 12, 3),
(10, 300, 32400, 1.6, 13, 3),
(11, 300, 50400, 1.6, 14, 3),
(12, 300, 22980, 1.6, 15, 3),
(13, 300, 39660, 1.6, 16, 3),
(14, 300, 57720, 1.6, 17, 3),
(15, 300, 65280, 1.6, 18, 3),
(16, 780, 23400, NULL, 43, 4),
(17, 780, 27000, NULL, 44, 4),
(18, 780, 30600, NULL, 45, 4),
(19, 780, 34200, NULL, 46, 4),
(20, 780, 37800, NULL, 47, 4),
(21, 780, 55800, NULL, 48, 4),
(22, 120, 25200, NULL, 49, 6),
(23, 120, 28800, NULL, 50, 6),
(25, 120, 32400, NULL, 52, 6),
(26, 120, 57600, NULL, 53, 6),
(27, 600, NULL, NULL, 103, 7),
(28, 960, 23220, NULL, 54, 5),
(29, 960, 26820, NULL, 55, 5),
(30, 960, 30420, NULL, 56, 5),
(31, 960, 34020, NULL, 57, 5),
(32, 960, 37620, NULL, 58, 5),
(33, 960, 55620, NULL, 59, 5),
(34, 33180, 36780, 25, 19, 8),
(35, 33480, 72720, 25, 20, 8),
(36, 840, NULL, 24, 39, 9),
(38, 900, 29040, 2, 60, 36),
(39, 900, 32700, 2, 61, 36),
(40, 900, 39960, 2, 62, 36),
(41, 900, 43560, 2, 63, 36),
(42, 900, 36360, 2, 64, 36),
(43, 540, NULL, NULL, 105, 12),
(44, 900, NULL, NULL, 106, 13),
(45, 300, NULL, NULL, 107, 14),
(46, 23880, 21840, 70, 30, 15),
(47, 23080, 38640, 70, 31, 15),
(48, 20280, 59640, 70, 32, 15),
(49, 30120, 81000, 70, 33, 15),
(50, 960, NULL, 27, 40, 16),
(51, 840, NULL, NULL, 108, 17),
(52, 20160, 47040, 70, 34, 18),
(53, 20460, 21840, 70, 35, 18),
(54, 20160, 32640, 70, 36, 18),
(55, 20160, 57840, 70, 37, 18),
(56, 540, NULL, 17, 41, 19),
(57, 420, NULL, NULL, 109, 20),
(58, 660, 42900, 2, 65, 21),
(59, 660, 53700, 2, 66, 21),
(60, 660, 65700, 2, 67, 21),
(61, 660, 73200, 2, 68, 21),
(62, 180, 43140, 2, 69, 22),
(63, 180, 53940, 2, 70, 22),
(64, 180, 65940, 2, 71, 22),
(65, 180, 73440, 2, 72, 22),
(66, 300, NULL, NULL, 110, 23),
(67, 420, 43200, 2, 73, 24),
(68, 420, 68100, 2, 74, 24),
(69, 420, 54060, 2, 75, 24),
(70, 420, 79200, 2, 76, 24),
(71, 840, 43500, 2, 77, 25),
(72, 840, 68400, 2, 78, 25),
(73, 840, 54360, 2, 79, 25),
(74, 840, 79500, 2, 80, 25),
(75, 540, 21600, 1.6, 81, 26),
(76, 540, 25200, 1.6, 82, 26),
(77, 540, 28800, 1.6, 83, 26),
(78, 540, 32400, 1.6, 84, 26),
(79, 540, 36000, 1.6, 85, 26),
(80, 840, 21300, 1.6, 86, 27),
(81, 840, 24900, 1.6, 87, 27),
(82, 840, 28500, 1.6, 88, 27),
(83, 840, 32100, 1.6, 89, 27),
(84, 840, 35700, 1.6, 90, 27),
(85, 1860, 22440, NULL, 25, 28),
(86, 1860, 26040, NULL, 26, 28),
(87, 1860, 29640, NULL, 27, 28),
(88, 1860, 33240, NULL, 28, 28),
(89, 1860, 36840, NULL, 29, 28),
(90, 4200, 31200, 70, 1, 29),
(91, 4200, 37200, 70, 2, 29),
(92, 4200, 23100, 70, 3, 29),
(93, 4200, 26400, 70, 4, 29),
(94, 1260, NULL, 37, 42, 30),
(95, 600, NULL, NULL, 111, 31),
(96, 3600, 36000, 15, 21, 32),
(97, 3600, 42000, 15, 22, 32),
(98, 3600, 27600, 15, 23, 32),
(99, 3600, 31200, 15, 24, 32),
(100, 480, 36000, 2, 91, 33),
(101, 480, 42000, 2, 92, 33),
(102, 480, 27600, 2, 93, 33),
(103, 480, 31200, 2, 94, 33),
(104, 1200, 36180, 2, 95, 34),
(105, 1200, 42180, 2, 96, 34),
(106, 1200, 27780, 2, 97, 34),
(107, 1200, 31380, 2, 98, 34),
(108, 480, 37680, 2, 99, 35),
(109, 480, 43680, 2, 100, 35),
(110, 480, 29280, 2, 101, 35),
(111, 480, 32880, 2, 102, 35);

-- --------------------------------------------------------

--
-- Structure de la table `Troncon`
--

CREATE TABLE `Troncon` (
  `id_troncon` int(11) NOT NULL,
  `nom_troncon` char(150) DEFAULT NULL,
  `station_dep` int(11) DEFAULT NULL,
  `station_arr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Troncon`
--

INSERT INTO `Troncon` (`id_troncon`, `nom_troncon`, `station_dep`, `station_arr`) VALUES
(1, 'ENAC - Tour Ariane', 1, 2),
(2, 'ENAC - Fac de Pharma', 1, 3),
(3, 'ENAC - Ramonville', 1, 4),
(4, 'Fac de Pharma - Jean Jaurès', 3, 5),
(5, 'Ramonville - Jean Jaurès', 4, 5),
(6, 'Jean-Jaurès - Marengo SNCF', 5, 6),
(7, 'Marengo SNCF - Gare Routière Pierre Sémard', 6, 7),
(8, 'Gare Routière Pierre Sémard - Gare routière Paris-Bercy', 7, 8),
(9, 'Gare Routière Paris-Bercy - Tour Ariane', 8, 2),
(12, 'Station Grande Arche de la Défense - Tour Ariane', 10, 2),
(13, 'Gare Routière Paris-Bercy - Gare de Lyon', 8, 11),
(14, 'Marengo SNCF - Gare Matabiau', 6, 14),
(15, 'Gare Matabiau - Gare d''Austerlitz', 14, 15),
(16, 'Gare d''Austerlitz - Tour Ariane', 15, 2),
(17, 'Gare d''Austerlitz - Gare de Lyon', 15, 11),
(18, 'Gare Matabiau - Gare Montparnasse', 14, 16),
(19, 'Gare Montparnasse - Tour Ariane', 16, 2),
(20, 'Gare Montparnasse - Station Montparnasse-Bienvenue', 16, 17),
(21, 'Station Montparnasse-Bienvenue - Place Charles de Gaulle', 17, 18),
(22, 'Place Charles de Gaulle - Station La Défense Grande Arche', 18, 10),
(23, 'Gare Montparnasse - Station Gaité', 16, 19),
(24, 'Station Gaité - Champs Elysée Clémenceau', 19, 20),
(25, 'Champs Elysée Clémenceau - La Défense Grande Arche', 20, 10),
(26, 'Fac de Pharma - Palais de Justice', 3, 21),
(27, 'Ramonville - Palais de Justice', 4, 21),
(28, 'Palais de Justice - Aéroport de Blagnac', 21, 22),
(29, 'Toulouse Blagnac - Orly', 22, 26),
(30, 'Aéroport Orly - Ariane', 26, 2),
(31, 'Aéroport Orly - Orly Sud', 26, 23),
(32, 'Orly Sud - Place Charles de Gaulle', 23, 18),
(33, 'Orly Sud - Antony RER', 23, 24),
(34, 'Antony RER - Paris Chatelet/Les Halles', 24, 25),
(35, 'Paris Chatelet/Les Halles - La Défense Grande Arche', 25, 10),
(36, 'Gare de Lyon - La Défense Grande Arche', 11, 10);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id_user` int(11) NOT NULL,
  `nom` char(20) DEFAULT NULL,
  `prenom` char(20) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `email` char(20) DEFAULT NULL,
  `mdp` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id_user`, `nom`, `prenom`, `date_naiss`, `email`, `mdp`) VALUES
(1, 'Tyrion', 'Gyom', '1994-03-07', NULL, '007'),
(2, 'Bego', 'Grincheux', '1901-01-01', NULL, '666'),
(3, 'onizuka', 'eikichi', '0000-00-00', 'bob@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `Commentaires`
--
ALTER TABLE `Commentaires`
  ADD PRIMARY KEY (`E_mail`);

--
-- Index pour la table `Etat`
--
ALTER TABLE `Etat`
  ADD PRIMARY KEY (`id_etat`);

--
-- Index pour la table `Mode_Transport`
--
ALTER TABLE `Mode_Transport`
  ADD PRIMARY KEY (`id_transport`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_etat` (`id_etat`);

--
-- Index pour la table `Mode_Type`
--
ALTER TABLE `Mode_Type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `Station`
--
ALTER TABLE `Station`
  ADD PRIMARY KEY (`id_station`);

--
-- Index pour la table `Trajet_Utilisateur`
--
ALTER TABLE `Trajet_Utilisateur`
  ADD PRIMARY KEY (`id_trajet`);

--
-- Index pour la table `Transport_Troncon`
--
ALTER TABLE `Transport_Troncon`
  ADD PRIMARY KEY (`num`),
  ADD KEY `Transport_Troncon_ibfk_1` (`id_transport`),
  ADD KEY `Transport_Troncon_ibfk_2` (`id_troncon`);

--
-- Index pour la table `Troncon`
--
ALTER TABLE `Troncon`
  ADD PRIMARY KEY (`id_troncon`),
  ADD KEY `Troncon_ibfk_1` (`station_dep`),
  ADD KEY `Troncon_ibfk_2` (`station_arr`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Etat`
--
ALTER TABLE `Etat`
  MODIFY `id_etat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Mode_Transport`
--
ALTER TABLE `Mode_Transport`
  MODIFY `id_transport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT pour la table `Mode_Type`
--
ALTER TABLE `Mode_Type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `Station`
--
ALTER TABLE `Station`
  MODIFY `id_station` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `Trajet_Utilisateur`
--
ALTER TABLE `Trajet_Utilisateur`
  MODIFY `id_trajet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Transport_Troncon`
--
ALTER TABLE `Transport_Troncon`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT pour la table `Troncon`
--
ALTER TABLE `Troncon`
  MODIFY `id_troncon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD CONSTRAINT `Administrateur_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `Utilisateur` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Mode_Transport`
--
ALTER TABLE `Mode_Transport`
  ADD CONSTRAINT `Mode_Transport_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `Mode_Type` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Mode_Transport_ibfk_2` FOREIGN KEY (`id_etat`) REFERENCES `Etat` (`id_etat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Transport_Troncon`
--
ALTER TABLE `Transport_Troncon`
  ADD CONSTRAINT `Transport_Troncon_ibfk_1` FOREIGN KEY (`id_transport`) REFERENCES `Mode_Transport` (`id_transport`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Transport_Troncon_ibfk_2` FOREIGN KEY (`id_troncon`) REFERENCES `Troncon` (`id_troncon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Troncon`
--
ALTER TABLE `Troncon`
  ADD CONSTRAINT `Troncon_ibfk_1` FOREIGN KEY (`station_dep`) REFERENCES `Station` (`id_station`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Troncon_ibfk_2` FOREIGN KEY (`station_arr`) REFERENCES `Station` (`id_station`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
