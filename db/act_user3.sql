-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 28 oct. 2021 à 09:28
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `racine`
--

-- --------------------------------------------------------

--
-- Structure de la table `act_user3`
--

DROP TABLE IF EXISTS `act_user3`;
CREATE TABLE `act_user3` (
  `login` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `hashpass` varchar(40) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `nom` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `prenom` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `level` int(11) DEFAULT 1,
  `regime` int(11) DEFAULT 0,
  `solde` int(11) DEFAULT 0,
  `maj_solde` date DEFAULT '0000-00-00',
  `statut` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `dtcreation` date DEFAULT NULL,
  `dtexpiration` date DEFAULT '2033-12-31',
  `pt_conso` int(11) NOT NULL DEFAULT 0,
  `REM` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `libre` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `act_user3`
--

INSERT INTO `act_user3` (`login`, `hashpass`, `nom`, `prenom`, `email`, `level`, `regime`, `solde`, `maj_solde`, `statut`, `dtcreation`, `dtexpiration`, `pt_conso`, `REM`, `libre`, `ID`) VALUES
('sandrine', '6b40210f283be5e2cbdc48a50f7152e91acb3c75', 'Renevier Gonin', 'Sandrine', 'tenochtitlan77@hotmail.com', 9, 0, 0, '0000-00-00', 'N', NULL, '2033-12-31', 0, NULL, NULL, 1),
('fabienne', '0211d02672874efb9037f951a50dcc60ef18bb80', 'Volle', 'Fabienne', 'fabygenea07@free.fr', 9, 2, 10, '2015-11-28', 'N', '2015-11-28', '2033-12-31', 0, '', '', 2),
('pap', '6b40210f283be5e2cbdc48a50f7152e91acb3c75', 'Cool', 'Fanf', 'toto@yahoo.fr', 4, 2, 10, '2016-04-08', 'N', '2016-04-08', '2033-12-31', 0, '', '', 4),
('champ', '6b40210f283be5e2cbdc48a50f7152e91acb3c75', 'Mar', 'Suz', 'toto@orange.fr', 4, 0, 10, '2016-04-18', 'N', '2016-04-18', '2033-12-31', 0, '', '', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `act_user3`
--
ALTER TABLE `act_user3`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `act_user3`
--
ALTER TABLE `act_user3`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
