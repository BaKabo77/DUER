-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2024 at 10:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duer`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `calculer_total_evaluation` (IN `p_id_risque` INT, IN `p_id_personne_exposees` INT, IN `p_id_gravite` INT, IN `p_id_probabilite` INT, IN `p_id_solution_de_la_situation` INT)   BEGIN
    DECLARE v_total INT;
    DECLARE v_personne_exposees INT;
    DECLARE v_gravite INT;
    DECLARE v_probabilite INT;
    DECLARE v_solution INT;

    -- Calculer la somme de toutes les colonnes de la ligne correspondant à l'ID dans la table 'personne_exposees'
    SELECT SUM(tous_les_personnels_EN + tous_les_ATTEE + tous_les_eleves)
    INTO v_personne_exposees
    FROM personne_exposees
    WHERE Id_personne_exposees = p_id_personne_exposees;

    -- Ajouter la somme des valeurs de la colonne 'valeur' de la table 'gravite'
    SELECT SUM(Blessure_graves_ou_deces + maladie_mortelle + penibilite_physique + penibilite_mentale)
    INTO v_gravite
    FROM gravite
    WHERE Id_Gravite = p_id_gravite;

    -- Ajouter la somme des valeurs de la colonne 'valeur' de la table 'probabilite'
    SELECT SUM(probabilite)
    INTO v_probabilite
    FROM probabilite
    WHERE Id_Probabilite = p_id_probabilite;

    -- Ajouter la somme des valeurs de la colonne 'valeur' de la table 'solution_de_la_situation'
    SELECT SUM(complexite_de_resolution + solution_onereuse)
    INTO v_solution
    FROM solution_de_la_situation
    WHERE Id_solution_de_la_situation = p_id_solution_de_la_situation;
	
    -- Somme -- 
    SET v_total = v_personne_exposees + v_gravite + v_probabilite + v_solution;
    
    -- Mettre à jour la colonne 'total_evaluation' de la table 'risques'
    UPDATE risques
    SET total_evaluation = v_total
    WHERE Id_Risques = p_id_risque;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comptes`
--

CREATE TABLE `comptes` (
  `Id_Comptes` int NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `name_user` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(50) DEFAULT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comptes`
--

INSERT INTO `comptes` (`Id_Comptes`, `email`, `name_user`, `mot_de_passe`, `role`) VALUES
(1, 'admin@admin.com', 'admin', 'admin', 'admin'),
(2, 'util1@util.com', 'util1', 'util1', 'util'),
(3, 'util2@util.com', 'util2', 'util2', 'util');

-- --------------------------------------------------------

--
-- Table structure for table `famille_de_risque`
--

CREATE TABLE `famille_de_risque` (
  `Id_Famille_de_risque` int NOT NULL,
  `famille` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `famille_de_risque`
--

INSERT INTO `famille_de_risque` (`Id_Famille_de_risque`, `famille`) VALUES
(34, 'Risque poussière de bois (R-PB)'),
(28, 'Risque lié au travail isolé (R-TI)'),
(23, 'Risque Amiante (R-A)'),
(20, 'Produits/Emissions de déchets (R-PE)'),
(21, 'Protection individuelle (R-PI)'),
(17, 'Manutention manuelle (R-Mma)'),
(16, 'Machines et outils de travail (R-MO)'),
(14, 'Hygiène (R-Hyg)'),
(12, 'Equipements sous pression (R-ESP)'),
(10, 'Effondrements (R-Eff)'),
(9, 'Circulations / Déplacements (R-CD)'),
(8, 'Chute de plain-pied (R-CPP)'),
(5, 'Chimique (R-Chim)'),
(2, 'Ambiance thermique (R-A-Th)'),
(3, 'Autre risque (R-Autre)'),
(31, 'Risque liés au COVID-19'),
(36, 'Risque routier (R-Rou)'),
(35, 'Risque psychosocial (R-RPS)'),
(33, 'Risque majeur (R-Maj)'),
(32, 'Risque liquides cryogéniques et gaz (R-Gaz)'),
(29, 'Risque lié au travail sur écran (R-TE)'),
(27, 'Risque lié au bruit (R-Bruit)'),
(24, 'Risque lié à l éclairage (R-Ecl)'),
(26, 'Risque lié à la sûreté de l établissement (R-Sûret'),
(25, 'Risque lié à la coactivité (R-Coa)'),
(22, 'Rayonnement ionisants(R-RI)'),
(18, 'Manutention mécanique (R-Mmé)'),
(19, 'Poussières / Fumées (R-PF)'),
(15, 'Incendie/Explosion (R-IE)'),
(13, 'Ergonomie (R-Ergo)'),
(11, 'Electrique (R-Elec)'),
(6, 'Chute d objets (R-CO)'),
(7, 'Chute de hauteur (R-CH)'),
(4, 'Biologique (R-Bio)'),
(1, 'Cassage de jambes');

-- --------------------------------------------------------

--
-- Table structure for table `gravite`
--

CREATE TABLE `gravite` (
  `Id_Gravite` int NOT NULL,
  `Blessure_graves_ou_deces` int DEFAULT NULL,
  `maladie_mortelle` int DEFAULT NULL,
  `penibilite_physique` int DEFAULT NULL,
  `penibilite_mentale` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gravite`
--

INSERT INTO `gravite` (`Id_Gravite`, `Blessure_graves_ou_deces`, `maladie_mortelle`, `penibilite_physique`, `penibilite_mentale`) VALUES
(1, 1, 0, 0, 0),
(2, 1, 2, 1, 0),
(3, 1, 2, 1, 0),
(4, 4, 2, 2, 3),
(5, 4, 2, 2, 3),
(6, 4, 2, 2, 3),
(7, 4, 2, 2, 3),
(8, 4, 2, 2, 3),
(9, 4, 2, 2, 3),
(10, 4, 2, 2, 3),
(999, 0, 0, 0, 0),
(992, 3, 4, 3, 2),
(605, 3, 3, 3, 3),
(83, 0, 0, 0, 0),
(338, 1, 1, 1, 1),
(193, 2, 1, 0, 1),
(649, 2, 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `localisation`
--

CREATE TABLE `localisation` (
  `Id_Localisation` int NOT NULL,
  `emplacement_precis` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `localisation`
--

INSERT INTO `localisation` (`Id_Localisation`, `emplacement_precis`) VALUES
(1, 'À droite en rentrant'),
(2, 'À droite de la porte'),
(3, 'À gauche de la porte'),
(4, 'rien'),
(5, 'rien'),
(6, 'rien'),
(7, 'rien'),
(8, 'rien'),
(9, 'rien'),
(10, 'rien'),
(11, 'rien'),
(12, 'rien'),
(13, 'rien'),
(14, 'rien'),
(15, 'rien'),
(999, 'rien'),
(1000, 'rien'),
(1001, 'rien'),
(1002, 'rien'),
(1003, 'erer'),
(83, 'erer'),
(338, 'rien'),
(193, 'rien'),
(649, 'par terre');

-- --------------------------------------------------------

--
-- Table structure for table `personne_exposees`
--

CREATE TABLE `personne_exposees` (
  `Id_personne_exposees` int NOT NULL,
  `tous_les_personnels_EN` int DEFAULT NULL,
  `tous_les_ATTEE` int DEFAULT NULL,
  `tous_les_eleves` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `personne_exposees`
--

INSERT INTO `personne_exposees` (`Id_personne_exposees`, `tous_les_personnels_EN`, `tous_les_ATTEE`, `tous_les_eleves`) VALUES
(1, 2, 2, 0),
(2, 1, 0, 1),
(3, 1, 1, 2),
(4, 2, 3, 2),
(5, 2, 3, 2),
(6, 2, 3, 2),
(7, 2, 3, 2),
(8, 2, 3, 2),
(9, 2, 3, 2),
(10, 2, 3, 2),
(11, 2, 3, 2),
(12, 0, 0, NULL),
(13, 0, 0, 0),
(14, 0, 0, 0),
(15, 0, 0, 0),
(16, 0, 0, 0),
(17, 0, 0, 0),
(18, 1, 1, 1),
(19, 0, 1, 2),
(20, 0, 1, 2),
(83, 0, 0, 0),
(338, 1, 1, 1),
(193, 0, 1, 3),
(649, 4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `Id_Photos` int NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `photos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`Id_Photos`, `nom`, `photos`) VALUES
(1, 'photo_risque_1.jpeg', '../images/photo_risque_1.jpeg'),
(2, 'ch.jpg', '../images/ch.jpg'),
(3, 'P.jpg', '../images/P.jpg'),
(4, 'gestion_contact.png', '../images/gestion_contact.png'),
(5, 'gestion_contact.png', '../images/gestion_contact.png'),
(6, 'gestion_contact.png', '../images/gestion_contact.png'),
(7, 'gestion_contact.png', '../images/gestion_contact.png'),
(8, 'gestion_contact.png', '../images/gestion_contact.png'),
(9, 'gestion_contact.png', '../images/gestion_contact.png'),
(10, 'gestion_contact.png', '../images/gestion_contact.png'),
(11, 'gestion_contact.png', '../images/gestion_contact.png'),
(12, 'new_portfolio.png', '../images/new_portfolio.png');

-- --------------------------------------------------------

--
-- Table structure for table `probabilite`
--

CREATE TABLE `probabilite` (
  `Id_Probabilite` int NOT NULL,
  `probabilite` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `probabilite`
--

INSERT INTO `probabilite` (`Id_Probabilite`, `probabilite`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(24, 2),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 1),
(19, 1),
(20, 0),
(21, 0),
(22, 1),
(23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `risques`
--

CREATE TABLE `risques` (
  `Id_Risques` int NOT NULL,
  `etat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_creation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_derniere_modification` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Id_Photos` int NOT NULL,
  `Id_Utilisateur` int NOT NULL,
  `Id_Situation_dangereuse` int NOT NULL,
  `Id_Probabilite` int NOT NULL,
  `Id_Famille_de_risque` int NOT NULL,
  `Id_Localisation` int NOT NULL,
  `Id_Unite_de_travail` int NOT NULL,
  `Id_personne_exposees` int NOT NULL,
  `Id_Gravite` int NOT NULL,
  `Id_solution_de_la_situation` int NOT NULL,
  `total_evaluation` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `risques`
--

INSERT INTO `risques` (`Id_Risques`, `etat`, `date_creation`, `date_derniere_modification`, `Id_Photos`, `Id_Utilisateur`, `Id_Situation_dangereuse`, `Id_Probabilite`, `Id_Famille_de_risque`, `Id_Localisation`, `Id_Unite_de_travail`, `Id_personne_exposees`, `Id_Gravite`, `Id_solution_de_la_situation`, `total_evaluation`) VALUES
(1, 'EN_COURS', '2024-03-14 12:20:58', '2024-03-14 12:20:58', 1, 1, 1, 1, 6, 1, 183, 1, 1, 1, 7),
(2, 'EN_COURS', '2024-03-14 12:56:00', '2024-03-14 12:56:00', 2, 2, 2, 2, 11, 2, 2, 2, 2, 2, 10),
(3, 'EN_COURS', '2024-03-14 13:03:02', '2024-03-14 13:03:02', 3, 3, 3, 3, 6, 3, 8, 3, 3, 3, 12),
(4, 'EN_COURS', '2024-05-28 15:18:13', '2024-05-28 15:18:13', 4, 4, 4, 4, 10, 4, 357, 4, 4, 4, 30),
(18, 'EN_COURS', '2024-06-11 15:03:16', '2024-06-11 15:03:16', 0, 9, 649, 24, 10, 649, 31, 649, 649, 24, 21),
(16, 'EN_COURS', '2024-06-07 17:50:16', '2024-06-07 17:50:16', 12, 5, 338, 22, 7, 338, 5, 338, 338, 22, 10);

-- --------------------------------------------------------

--
-- Table structure for table `situation_dangereuse`
--

CREATE TABLE `situation_dangereuse` (
  `Id_Situation_dangereuse` int NOT NULL,
  `precis` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `situation_dangereuse`
--

INSERT INTO `situation_dangereuse` (`Id_Situation_dangereuse`, `precis`) VALUES
(1, 'Cartons sur une armoire'),
(2, 'Prise ouverte'),
(3, 'Cartons sur une armoire'),
(4, 'Explosion'),
(5, 'Explosion'),
(6, 'Explosion'),
(7, 'Explosion'),
(8, 'Explosion'),
(9, 'Explosion'),
(10, 'Explosion'),
(11, 'Attaque nucléaire'),
(12, 'Explosion'),
(13, 'Explosion'),
(14, 'Explosion'),
(15, 'Explosion'),
(16, 'Explosion'),
(17, 'Explosion'),
(18, 'Explosion'),
(19, 'Explosion'),
(20, 'Attaque nucléaire'),
(83, 'Attaque nucléaire'),
(338, 'Attaque nucléaire'),
(193, 'Attaque nucléaire'),
(649, 'trou noir');

-- --------------------------------------------------------

--
-- Table structure for table `solution_de_la_situation`
--

CREATE TABLE `solution_de_la_situation` (
  `Id_solution_de_la_situation` int NOT NULL,
  `complexite_de_resolution` int DEFAULT NULL,
  `solution_onereuse` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `solution_de_la_situation`
--

INSERT INTO `solution_de_la_situation` (`Id_solution_de_la_situation`, `complexite_de_resolution`, `solution_onereuse`) VALUES
(1, 2, 3),
(2, 1, 2),
(3, 2, 1),
(4, 4, 4),
(5, 4, 4),
(6, 4, 4),
(7, 4, 4),
(8, 4, 4),
(9, 4, 4),
(10, 4, 4),
(24, 3, 2),
(13, 0, 0),
(14, 0, 0),
(15, 0, 0),
(16, 0, 0),
(17, 0, 0),
(18, 1, 1),
(19, 0, 1),
(20, 1, 1),
(21, 0, 0),
(22, 1, 1),
(23, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unite_de_travail`
--

CREATE TABLE `unite_de_travail` (
  `Id_Unite_de_travail` int NOT NULL,
  `salle` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `unite_de_travail`
--

INSERT INTO `unite_de_travail` (`Id_Unite_de_travail`, `salle`) VALUES
(1, '10'),
(2, 'Accueil/Loge'),
(3, 'A 100 OVE ang'),
(4, 'A 101 OVE ang'),
(5, 'A 102 OVE ang'),
(6, 'A 104 OVE hist geo'),
(7, 'A 106 OV hist geo'),
(8, 'A 107 OV'),
(9, 'A 109 OVE ang'),
(10, 'A 110 OVE ang'),
(11, 'A 111 OVE esp'),
(12, 'A 112 OVE ang'),
(13, 'A 113 OVE ang'),
(14, 'A 114 VE hist géo ( ang )'),
(15, 'A 115 OVE ang'),
(16, 'A 116 OVE all'),
(17, 'A 117 all'),
(18, 'A 200'),
(19, 'A 201'),
(20, 'A 202'),
(21, 'A 203 TVE'),
(22, 'A 20'),
(23, 'A 205'),
(24, 'A 206'),
(25, 'A 207 TVE'),
(26, 'A 208'),
(27, 'A 209'),
(28, 'A 210 TVE'),
(29, 'A 211'),
(30, 'A 212'),
(31, 'A 213'),
(32, 'A 214 ang'),
(33, 'A217 LABO MATHS'),
(34, 'Aire de stockage extérieur'),
(35, 'CDI LGT bât A'),
(36, 'CDI LP Bât A'),
(37, 'Chaufferie'),
(38, 'Circulations extérieures'),
(39, 'Circulations intérieures'),
(40, 'Compresseur'),
(41, 'Cour de récréation'),
(42, 'Cuisine / Plonge'),
(43, 'Déplacements, missions'),
(44, 'Espace de communication'),
(45, 'Espace de restauration'),
(46, 'Espaces couverts (préau, garage à vélo)'),
(47, 'Espaces livraisons'),
(48, 'Foyer élèves'),
(49, 'Garage ou Parking'),
(50, 'Grenier'),
(51, 'GYMNASES'),
(52, 'Hall 1'),
(53, 'Hall 2'),
(54, 'Hall 3'),
(55, 'Hall 4'),
(56, 'Internat'),
(57, 'Laboratoire de chimie'),
(58, 'Laboratoire de physique - physique appliquée'),
(59, 'Laboratoire de sciences de la vie et de la Terre -'),
(60, 'Lingerie ANCIEN B'),
(61, 'Local chaufferie'),
(62, 'Local réseau'),
(63, 'Local TGBT'),
(64, 'Local tranfo.'),
(65, 'Local tranfo. 2'),
(66, 'Locaux administratifs'),
(67, 'Locaux d entretien'),
(68, 'Locaux et équipements des techniciens et ouvriers '),
(69, 'Locaux médicaux et infirmiers'),
(70, 'Locaux vie scolaire'),
(71, 'Logements de fonction'),
(72, 'Préau'),
(73, 'Restauration élève'),
(74, 'Restauration invité'),
(75, 'Restauration prof'),
(76, 'SALLE A215'),
(77, 'Salle de reprographie'),
(78, 'Salle des professeurs'),
(79, 'SALLE DEVOIR A'),
(80, 'SALLE E'),
(81, 'Salle professeurs CRSA'),
(82, 'Salle professeurs STI2D'),
(83, 'Salle professeurs TSE'),
(84, 'SAlle TP'),
(85, 'SAlle Troisième'),
(86, 'Salle(s) de préparation et de stockage(s) des prod'),
(87, 'Option 219'),
(88, 'sanitaire Bâtiment A'),
(89, 'santaire Bâtiment B'),
(90, 'sanitaire Bâtiment C'),
(91, 'sanitaire Bâtiment D'),
(92, 'C1-006 Atelier MEI'),
(93, 'C1-014 Bureau professeurs MEI'),
(94, 'C1-013 Salle de ressources MEI'),
(95, 'C1-012 Salle banale - 12 élèves MEI'),
(96, 'C1-011 Salle banale - 24 élèves MEI'),
(97, 'C1-009 Salle info - 12 MEI'),
(98, 'C1-007 Réserve atelier MEI'),
(99, 'C1-120 salle TP 2nd SN'),
(100, 'C1-121 Réserve SN'),
(101, 'C1-122 Serveur pédago SN'),
(102, 'C1-119 salle TP 2nd SN'),
(104, 'C1-117 Salle TP réseaux SN'),
(105, 'C1-118 Réserve SN'),
(106, 'C1-116 Local serveur SN'),
(107, 'C1-114 Salle TP réseaux SN'),
(109, 'C1-115 Réserve SN'),
(110, 'C1-112 Salle TP réseaux SN'),
(111, 'C1-113 Réserve SN'),
(112, 'C1-111 Local serveur SN'),
(113, 'C1-109 Salle TP réseaux SN'),
(114, 'C1-110 Réserve SN'),
(115, 'B-011 Dépôt loge'),
(116, 'B-106 Salle de conception et experimentation de CP'),
(117, 'B-105 Salle de documentation et rangement'),
(118, 'B-104 Labo de conception analyseCPI'),
(119, 'B-103 Salle de préparation et rangement'),
(120, 'B-102 Salle de soutenance CPI'),
(121, 'B-101 Bureau PROF.COORDINATION'),
(122, 'C1-002 Salle banalisée'),
(123, 'C1-003 salle des profs LP'),
(124, 'C1-017 Vestiaires filles MEI'),
(125, 'C1-016 Vestiaires élèves MEI'),
(126, 'C1-015 Vestiaires élèves MEI'),
(127, 'C1-104 Salle de coordination prof SN'),
(128, 'C1-107 Arts plastiques'),
(129, 'C1-108 Dépôt arts appliquées'),
(130, 'C1-213 Bureau professeurs coordination STI2D'),
(131, 'C1-210 Laboratoire SIN'),
(132, 'C1-211 Rangement'),
(134, 'C1-208 Laboratoire EE'),
(135, 'C1-209 Rangement'),
(136, 'C1-206 Laboratoire ITEC'),
(137, 'C1-207 Rangement'),
(138, 'C1-205 Salle prototypage rapide partagée CRSA'),
(139, 'C1-204 Laboratoire tronc commun STI2D/ rangement'),
(140, 'C1-201 Laboratoire tronc commun STI2D'),
(141, 'C1-202 Rangement'),
(143, 'C2-002 Foyer des élèves'),
(144, 'C2-003 Salle radio'),
(145, 'C2-017 Salle de réunion'),
(146, 'C2-009 Bureau Proviseur adjoint LP'),
(147, 'C2-010 Laboratoire de construction'),
(148, 'C2-008 Laboratoire de construction'),
(149, 'C2-105 Salle banalisée'),
(150, 'C2-104 Salle banalisée'),
(151, 'C2-103 Salle banalisée'),
(152, 'C2-102 Salle banalisée'),
(153, 'C2-101 Salle banalisée'),
(154, 'C2-107 Stock.Adim informatique'),
(155, 'C2-106 Bureau coordin.informatiques'),
(156, 'C2-114 Espace magasin proto.'),
(157, 'C2-112 Salle de cours électrotechnique'),
(158, 'C2-111 Salle essais système'),
(159, 'C2-206 BUREAU professeurs BTS ELEC'),
(160, 'C2-205 Salle de cours EE CIT'),
(161, 'C2-204 Salle de cours EE SI'),
(163, 'C2-203 Zone TP / TPE'),
(164, 'C2-202 Rangement'),
(165, 'C2-201 Salle de cours CIT'),
(166, 'C3-004 Salle attente infirmerie'),
(167, 'C3-005 Bureau assistante sociale LP'),
(168, 'C3-006 Bureau assistante sociale LT'),
(169, 'C3-007 Stockage'),
(170, 'C3-008 Bureau infirmerie'),
(171, 'C3-009 Salle de soins'),
(172, 'C3-010 Salle de repos'),
(173, 'C3-012 coordination des professeurs CRSA'),
(174, 'C3-020 Vestiaires élèves CRSA'),
(175, 'C3-014 Rangement CRSA'),
(176, 'C3-102 Salle banalisée CRSA'),
(177, 'C3-101 Salle banalisée'),
(178, 'C3-111 Atelier MELEC TERTIAIRE'),
(179, 'C3-110 Atelier MELEC Habitat'),
(180, 'C3-112 Atelier MELEC INDUS'),
(181, 'C3-104 Vestiaire fille MELEC /SN'),
(182, 'C3-113 Vestiaire Garçon MELEC/SN'),
(183, 'B-019 Poste de livraison EDF'),
(184, 'B-018 Chaufferie'),
(185, 'B-012 Local vélo'),
(186, 'B-001 Entrée sas'),
(187, 'B-002 Accés hall'),
(188, 'B-017 Local SR'),
(189, 'B-016 TGBT'),
(190, 'B-015 Local eau'),
(191, 'B-014 Local compresseur'),
(192, 'B-013 CTA'),
(193, 'B-009 Accés loge'),
(194, 'B-003 Bureau CPE'),
(195, 'B-004 Bureau CNAM'),
(196, 'B-005 Secrétariat CNAM'),
(197, 'B-008 Local ménage central'),
(198, 'B-007 Accès blocs sanitaires'),
(199, 'B-006 Accès blocs sanitaires'),
(200, 'B-106 Salle de conception et experimentation de PI'),
(202, 'B-104 Labo de conception analyse PI'),
(204, 'B-102 Salle de soutenance accueil des ETPS'),
(206, 'C1-101 Sanitaires principaux H.'),
(207, 'C1-101 Cabine privatisable profs'),
(208, 'C1-010 Local poubelle répartie'),
(209, 'C1-007 Réseve atelier MEI'),
(210, 'C1-001 Bureau MLDS'),
(212, 'C1-004 Bureau CPE LP'),
(213, 'C1-005 Permanence'),
(214, 'Escalier sous-sol'),
(215, 'C1-010 Sas local poubelles'),
(216, 'C1-010 Local poubelles'),
(217, 'C1-009 Salle banale - 12 élèves EI'),
(218, 'ESC2 -BC Escalier 2'),
(219, 'C1-102 Sanitaire'),
(220, 'C1-102 Cabine privatisable profs'),
(221, 'C1-124 Local ménage réparti'),
(222, 'C1-123 Local SR'),
(223, 'C1-120 Salle seconde'),
(224, 'C1-121 Réserve'),
(225, 'C1-122 Serveur pédago'),
(226, 'C1-119 Salle seconde'),
(228, 'C1-117 Salle systhème'),
(229, 'C1-118 Réserve'),
(230, 'C1-116 Local serveur'),
(231, 'C1-114 Salle réseaux ETPS'),
(233, 'C1-115 Réserve'),
(234, 'C1-112 Salle systhème'),
(235, 'C1-113 Réserve'),
(236, 'C1-111 Local serveur'),
(237, 'C1-109 Salle réseaux ETPS'),
(238, 'C1-110 Réserve'),
(239, 'C1-106 Salle de cours techno.'),
(240, 'C1-105 Salle de cours techno.'),
(241, 'C1-103 Salle de réunion'),
(242, 'ASC1-C1 Ascenseur 1'),
(243, 'C1-208 Accés toiture'),
(244, 'C1-214 Rangement'),
(245, 'C1-212 Salle de cours tronc commun'),
(248, 'ASC-2 C Ascenseur 2 C2'),
(249, 'Passage couvert 1'),
(250, 'ESC 2 -BC Escalier 2'),
(251, 'C2-012 Local poubelle'),
(252, 'C2-011 Magasin général'),
(253, 'C2-001 Bureau CPE LT'),
(254, 'C2-004 Dépôt foyer'),
(255, 'C2-005 réserve pole numérique LP ( TIC+tablettes)'),
(256, 'C2-006 Local rangement'),
(257, 'C2-018 Reprographie'),
(258, 'C2-015 Assistant ctx LP/LGT'),
(259, 'C2-014 Chef des travaux LGT'),
(260, 'C2-016 Chef des travaux LP'),
(261, 'C2-012 Sas local poubelles'),
(262, 'C2-012 Local poubelles'),
(264, 'C2-007 Archives vivantes'),
(265, 'C2-115 Stockage'),
(266, 'C2-113 Salle de coordination prof / ressources'),
(267, 'C2-110 Labo modelisation essai sous système'),
(268, 'C2-109 Vestiaire'),
(269, 'C2-108 Local répartiteur principal'),
(270, 'C2-105 Salle banale'),
(271, 'C2-104 Salle banale'),
(272, 'C2-103 Salle banale'),
(273, 'C2-102 Salle banale'),
(274, 'C2-101 Salle banale'),
(275, 'ESC 1 -BC Escalier 1'),
(276, 'C2-207 Sanitaire'),
(277, 'C2-208 Local ménage réparti'),
(278, 'C2-209 Sanitaire'),
(279, 'ESC3- BC Escalier 3'),
(280, 'C3-017 Atelier de réalisation C3-017'),
(281, 'C3-016 Local poubelle réparti'),
(282, 'ESC E- BC Escalier E'),
(283, 'C3-001 Accès blocs sanitaires'),
(284, 'C3-002 Accès blocs sanitaires'),
(285, 'C3-003 Local ménage réparti'),
(286, 'C3-019 Laboratoire conception et similation numéri'),
(288, 'C3-018 Stockage atelier de réalisation'),
(289, 'C3-017 Atelier de réalisation'),
(291, 'C3-016 Sas local poubelles'),
(292, 'C3-016 Local poubelles'),
(293, 'C3-015 Salle de cours CRSA'),
(294, 'C3-013Laboratoire TP'),
(295, 'BAT- BC Escalier 3'),
(296, 'C3-109 Salle technolgie BTS ELEC/B MELEC'),
(297, 'C3-108 Salle TP sciences appliquées ELEC/SEN'),
(298, 'C3-107 Réserve'),
(299, 'C3-106 Local SR'),
(300, 'C3-105 Local ménage réparti.'),
(301, 'C3-103 salle info'),
(302, 'C3-103bis salle info'),
(303, 'C3-102 Salle banale'),
(305, 'A 304 COURS SCIENCES'),
(306, 'A 302 TP SCIENCES'),
(307, 'A 305 TP SCIENCES'),
(308, 'A 307 TP SCIENCES'),
(309, 'A 309 TP SCIENCES'),
(310, 'A 310 TP SCIENCES'),
(311, 'A 311 TP SCIENCES'),
(312, 'A 313 TP SCIENCES'),
(313, 'A 314 TP SCIENCES'),
(314, 'A 316 TP SCIENCES'),
(315, 'D001'),
(316, 'D002'),
(317, 'D003'),
(318, 'D004'),
(319, 'D005'),
(320, 'D006'),
(321, 'D007'),
(322, 'D008'),
(323, 'D009'),
(324, 'D010'),
(325, 'D011'),
(326, 'D013'),
(327, 'D014'),
(328, 'D015'),
(329, 'D016'),
(330, 'D017'),
(331, 'D018'),
(332, 'D019'),
(333, 'D020'),
(334, 'D101'),
(335, 'D103'),
(336, 'D104'),
(337, 'D105'),
(338, 'D106'),
(339, 'D107'),
(340, 'D108'),
(341, 'D109'),
(342, 'D110'),
(343, 'D111'),
(344, 'D112'),
(345, 'D113'),
(346, 'D114'),
(347, 'D201'),
(348, 'D202'),
(349, 'D203'),
(350, 'D204'),
(351, 'D205'),
(352, 'D206'),
(353, 'D207'),
(354, 'D208'),
(355, 'D209'),
(356, 'D210'),
(357, 'D211'),
(358, 'D212'),
(359, 'D213'),
(360, 'D214'),
(361, 'D215'),
(362, 'D216'),
(364, 'D302'),
(365, 'D303'),
(366, 'D304'),
(367, 'D305'),
(368, 'D306'),
(369, 'D307'),
(370, 'D308'),
(371, 'D309'),
(372, 'D310'),
(373, 'D311'),
(374, 'D312'),
(375, 'D313'),
(376, 'D314'),
(377, 'D315'),
(378, 'D401'),
(379, 'D402'),
(380, 'D403'),
(381, 'D404'),
(382, 'D405'),
(383, 'D406'),
(384, 'D407'),
(385, 'D408'),
(386, 'D409'),
(388, 'D410'),
(389, 'D411'),
(390, 'D412'),
(391, 'D413'),
(392, 'D414'),
(393, 'D415'),
(394, 'D416'),
(395, 'D417'),
(396, 'D418');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id_Utilisateur` int NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_Utilisateur`, `nom`, `prenom`, `email`) VALUES
(1, 'GAHETE', 'Djibril', 'djibril@gahete.com'),
(2, 'NIKOLIC', 'Aleksandar', 'aleksandar.nikolic.sio@gmail.com'),
(3, 'LIANA', 'Kamil', 'kamil@liana.com'),
(4, 'TRAORETRAORETRAORE', 'TRAORETRAORETRAORE', 'koko123@gmail.com'),
(5, 'TRAORE', 'Koba', 'traorekoba7@gmail.com'),
(6, 'ihukukbh', 'YOUSSEF', 'koba.traore.sio@gmail.com'),
(7, 'hadjaj', 'kokokokoo', 'koko123@gmail.com'),
(8, 'ZARZIS', 'yacine', 'koba@gmail.com'),
(9, 'mama', 'papa', 'mamapapa@popo.fr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`Id_Comptes`);

--
-- Indexes for table `famille_de_risque`
--
ALTER TABLE `famille_de_risque`
  ADD PRIMARY KEY (`Id_Famille_de_risque`);

--
-- Indexes for table `gravite`
--
ALTER TABLE `gravite`
  ADD PRIMARY KEY (`Id_Gravite`);

--
-- Indexes for table `localisation`
--
ALTER TABLE `localisation`
  ADD PRIMARY KEY (`Id_Localisation`);

--
-- Indexes for table `personne_exposees`
--
ALTER TABLE `personne_exposees`
  ADD PRIMARY KEY (`Id_personne_exposees`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`Id_Photos`);

--
-- Indexes for table `probabilite`
--
ALTER TABLE `probabilite`
  ADD PRIMARY KEY (`Id_Probabilite`);

--
-- Indexes for table `risques`
--
ALTER TABLE `risques`
  ADD PRIMARY KEY (`Id_Risques`),
  ADD KEY `Id_Photos` (`Id_Photos`),
  ADD KEY `Id_Utilisateur` (`Id_Utilisateur`),
  ADD KEY `Id_Situation_dangereuse` (`Id_Situation_dangereuse`),
  ADD KEY `Id_Probabilite` (`Id_Probabilite`),
  ADD KEY `Id_Famille_de_risque` (`Id_Famille_de_risque`),
  ADD KEY `Id_Localisation` (`Id_Localisation`),
  ADD KEY `Id_Unite_de_travail` (`Id_Unite_de_travail`),
  ADD KEY `Id_personne_exposees` (`Id_personne_exposees`) USING BTREE,
  ADD KEY `Id_Gravite` (`Id_Gravite`) USING BTREE,
  ADD KEY `Id_solution_de_la_situation` (`Id_solution_de_la_situation`) USING BTREE;

--
-- Indexes for table `situation_dangereuse`
--
ALTER TABLE `situation_dangereuse`
  ADD PRIMARY KEY (`Id_Situation_dangereuse`);

--
-- Indexes for table `solution_de_la_situation`
--
ALTER TABLE `solution_de_la_situation`
  ADD PRIMARY KEY (`Id_solution_de_la_situation`);

--
-- Indexes for table `unite_de_travail`
--
ALTER TABLE `unite_de_travail`
  ADD PRIMARY KEY (`Id_Unite_de_travail`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_Utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `Id_Comptes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `famille_de_risque`
--
ALTER TABLE `famille_de_risque`
  MODIFY `Id_Famille_de_risque` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=648;

--
-- AUTO_INCREMENT for table `gravite`
--
ALTER TABLE `gravite`
  MODIFY `Id_Gravite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `localisation`
--
ALTER TABLE `localisation`
  MODIFY `Id_Localisation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `personne_exposees`
--
ALTER TABLE `personne_exposees`
  MODIFY `Id_personne_exposees` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=650;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `Id_Photos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `probabilite`
--
ALTER TABLE `probabilite`
  MODIFY `Id_Probabilite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `risques`
--
ALTER TABLE `risques`
  MODIFY `Id_Risques` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `situation_dangereuse`
--
ALTER TABLE `situation_dangereuse`
  MODIFY `Id_Situation_dangereuse` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=650;

--
-- AUTO_INCREMENT for table `solution_de_la_situation`
--
ALTER TABLE `solution_de_la_situation`
  MODIFY `Id_solution_de_la_situation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `unite_de_travail`
--
ALTER TABLE `unite_de_travail`
  MODIFY `Id_Unite_de_travail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=980;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_Utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
