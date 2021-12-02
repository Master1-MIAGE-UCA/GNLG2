SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `act_mgrplg`;
CREATE TABLE `act_mgrplg` (
  `grp` char(2) COLLATE latin1_general_ci NOT NULL,
  `dtable` char(1) COLLATE latin1_general_ci NOT NULL,
  `lg` char(2) COLLATE latin1_general_ci NOT NULL,
  `sigle` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `getiq` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `act_mgrplg` (`grp`, `dtable`, `lg`, `sigle`, `getiq`) VALUES
('A0', 'N', 'fr', '', 'Clés'),
('A0', 'D', 'fr', '', 'Clés'),
('A0', 'M', 'fr', '', 'Clés'),
('A0', 'V', 'fr', '', 'Clés'),
('A1', 'N', 'fr', '', 'Acte de naissance'),
('A1', 'D', 'fr', '', 'Acte de décès'),
('A1', 'M', 'fr', '', 'Acte de mariage'),
('A1', 'V', 'fr', '', 'Acte divers'),
('D1', 'N', 'fr', '', 'Nouveau-né'),
('D1', 'D', 'fr', '', 'Défunt'),
('D1', 'M', 'fr', '', 'Epoux'),
('D1', 'V', 'fr', '', 'Intervenant 1'),
('D2', 'N', 'fr', '', 'Parents'),
('D2', 'D', 'fr', '', 'Parents'),
('D2', 'M', 'fr', '', 'Parents'),
('D2', 'V', 'fr', '', 'Parents'),
('F1', 'N', 'fr', '', 'x'),
('F1', 'D', 'fr', '', '(Ex-)Conjoint'),
('F1', 'M', 'fr', '', 'Epouse'),
('F1', 'V', 'fr', '', 'Intervenant 2'),
('F2', 'D', 'fr', '', 'Père'),
('F2', 'M', 'fr', '', 'Parents'),
('F2', 'V', 'fr', '', 'Parents'),
('T1', 'N', 'fr', '', 'Témoins'),
('T1', 'D', 'fr', '', 'Témoins'),
('T1', 'M', 'fr', '', 'Témoins'),
('T1', 'V', 'fr', '', 'Témoins'),
('V1', 'N', 'fr', '', 'Références'),
('V1', 'D', 'fr', '', 'Références'),
('V1', 'M', 'fr', '', 'Références'),
('V1', 'V', 'fr', '', 'Références'),
('W1', 'N', 'fr', '', 'Crédits'),
('W1', 'D', 'fr', '', 'Crédits'),
('W1', 'M', 'fr', '', 'Crédits'),
('W1', 'V', 'fr', '', 'Crédits'),
('X0', 'N', 'fr', '', 'Gestion'),
('X0', 'D', 'fr', '', 'Gestion'),
('X0', 'M', 'fr', '', 'Gestion'),
('X0', 'V', 'fr', '', 'Gestion');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
