SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `act_geoloc`;
CREATE TABLE `act_geoloc` (
  `ID` int(11) NOT NULL,
  `COMMUNE` varchar(40) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `DEPART` varchar(40) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `LON` float DEFAULT NULL,
  `LAT` float DEFAULT NULL,
  `STATUT` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `NOTE_N` text COLLATE latin1_general_ci,
  `NOTE_M` text COLLATE latin1_general_ci,
  `NOTE_D` text COLLATE latin1_general_ci,
  `NOTE_V` text COLLATE latin1_general_ci
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `act_geoloc` (`ID`, `COMMUNE`, `DEPART`, `LON`, `LAT`, `STATUT`, `NOTE_N`, `NOTE_M`, `NOTE_D`, `NOTE_V`) VALUES
(1, 'Accons', '07160 - Ardèche', 4.38643, 44.8863, 'A', NULL, NULL, NULL, NULL),
(2, 'Ajoux', '07000 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(3, 'Alissas', '07210 - Ardèche', 4.63316, 44.7141, 'A', NULL, NULL, NULL, NULL),
(4, 'Astet', '07330 - Ardèche', 4.06005, 44.6842, 'A', NULL, NULL, NULL, NULL),
(5, 'Aubignas', '07400 - Ardèche', 4.63239, 44.5887, 'A', NULL, NULL, NULL, NULL),
(6, 'Chauzon', '07120 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(7, 'Baix', '07210 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(8, 'Banne', '07460 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(9, 'Béage (Le)', '07630 - Ardèche', 4.11986, 44.8492, 'A', NULL, NULL, NULL, NULL),
(10, 'Bidon', '07700 - Ardèche', 4.53486, 44.3662, 'A', NULL, NULL, NULL, NULL),
(11, 'Boffres', '07440 -  Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(12, 'Chassiers', '07110 - Ardèche', 4.29644, 44.5521, 'A', NULL, NULL, NULL, NULL),
(13, 'Genestelle', '07530 - Ardèche', 4.39342, 44.719, 'A', NULL, NULL, NULL, NULL),
(14, 'Guilherand-Granges', '07500 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(15, 'Lachapelle-Graillouse', '07470 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(16, 'Joyeuse', '07260 - Ardèche', 4.24022, 44.4794, 'A', NULL, NULL, NULL, NULL),
(17, 'Lamastre', '07270 - Ardèche', 4.57914, 44.9851, 'A', NULL, NULL, NULL, NULL),
(18, 'Larnas', '07220 - Ardèche', 4.59823, 44.4488, 'A', NULL, NULL, NULL, NULL),
(19, 'Laurac-en-Vivarais', '07110 - Ardèche', 4.28929, 44.5089, 'A', NULL, NULL, NULL, NULL),
(20, 'Lavillatte', '07660 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(21, 'Marcols-les-Eaux', '07190 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(22, 'Mayres', '07330 - Ardèche', 4.11653, 44.6654, 'A', NULL, NULL, NULL, NULL),
(23, 'Mazan-l\'Abbaye', '07510 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(24, 'Meyras', '07380 - Ardèche', 4.26718, 44.681, 'A', NULL, NULL, NULL, NULL),
(25, 'Mézilhac', 'Ardèche', 4.35152, 44.8083, 'A', NULL, NULL, NULL, NULL),
(26, 'Montpezat-sous-Bauzon', '07560 - Ardèche', 4.20597, 44.7123, 'A', NULL, NULL, NULL, NULL),
(27, 'Planzolles', '07230 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(28, 'Plats', '07300 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(29, 'Roux (Le)', '07560 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(30, 'Sanilhac', '07110 - Ardèche', 4.25003, 44.5359, 'A', NULL, NULL, NULL, NULL),
(31, 'Thines', '07140 - Ardèche', 4.05119, 44.4935, 'A', NULL, NULL, NULL, NULL),
(32, 'Sagnes-et-Goudoulet', '07450 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(33, 'Veyras', '07000 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(34, 'Saint-Alban-d\'Ay', '07790 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(35, 'Saint-Alban-en-Montagne-Concoules', '07590 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(36, 'Saint-André-Lachamp', '07230 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(37, 'Saint-Barthélémy-le-Plain', '07300 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(38, 'Saint-Christol', '07160 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(39, 'Saint-Cirgues-en-Montagne', '07510 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(40, 'Saint-Etienne-de-Lugdares', '07590 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(41, 'Saint-Genest-Lachamp', '07160 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(42, 'Saint-Jean-le-Centenier', '07580 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(43, 'Saint-Julien-Labrousse', '07160 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(44, 'Saint-Julien-le-Roux', '07240 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(45, 'Saint-Martin-de-Valamas', '07310 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(46, 'Saint-Mélany', '07260 Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(47, 'Saint-Pierreville', '07190 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(48, 'Saint-Mélany', '07260 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(49, 'Saint-Prix', '07270 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(50, 'Vallon-Pont-d\'Arc', '07150 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(51, 'Vinezac', '07110 - Ardèche', 4.32477, 44.5399, 'A', NULL, NULL, NULL, NULL),
(52, 'Saint-Germain', '07170 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(53, 'Saint-Genest-de-Beauzon', '07230 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(54, 'Saint-Andéol-de-Vals', '07600 - Ardèche', 4.40148, 44.6921, 'A', NULL, NULL, NULL, NULL),
(55, 'Pouzin (Le)', '07250 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(56, 'Vernoux-en-Vivarais', '07240 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(57, 'Plagnal (Le)', '07590 - Ardèche', 3.96744, 44.6507, 'A', NULL, NULL, NULL, NULL),
(58, 'Gluiras', '07190 - Ardèche', 4.5232, 44.8472, 'A', NULL, NULL, NULL, NULL),
(59, 'Laveyrune', '48250 - Ardèche - Lozère', 0, 0, 'N', NULL, NULL, NULL, NULL),
(60, 'Lachapelle-sous-Chanéac', '07310 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(61, '', '', 0, 0, 'N', NULL, NULL, NULL, NULL),
(62, 'Lachamp-Raphael', '07530 - Ardèche', 4.29046, 44.8094, 'A', NULL, NULL, NULL, NULL),
(63, 'Arcens', '07310 - Ardèche', 4.32609, 44.9, 'A', NULL, NULL, NULL, NULL),
(64, 'Assions (Les)', '07140 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(65, 'Berrias', '07460 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(66, 'Chassiers', 'Ardèche', 4.29644, 44.5521, 'A', NULL, NULL, NULL, NULL),
(67, 'Chandolas', '07230 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(68, 'Jaujac', '07380 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(69, 'Silhac', '07240 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(70, 'Silhac', 'Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(71, 'Saint-Michel-de-Chabrillanoux', '07360 - Ardèche', 4.6025, 44.8383, 'A', NULL, NULL, NULL, NULL),
(72, 'Saint-Vincent-de-Durfort', '07360 - Ardèche', 4.64362, 44.8048, 'A', NULL, NULL, NULL, NULL),
(73, 'Beaulieu', '07460 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(74, 'Usclades-et-Rieutord', '07510 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(75, 'Glun', '07300 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(76, 'Glun', 'Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(77, 'Borée', '07310 - Ardèche', 4.23905, 44.8984, 'A', NULL, NULL, NULL, NULL),
(78, 'Chassagnes', '07140 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(79, 'Félines', '07340 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(80, 'Issarlès', '07470 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(81, 'Lafarre', '07520 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(82, 'Vals-les-Bains', '07600 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(83, 'Cros-de-Géorand', '07630 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(84, 'Dornas', '07160 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL),
(85, 'Balazuc', '07120 - Ardèche', 0, 0, 'N', NULL, NULL, NULL, NULL);


ALTER TABLE `act_geoloc`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `COMMUNE` (`COMMUNE`,`DEPART`);


ALTER TABLE `act_geoloc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
