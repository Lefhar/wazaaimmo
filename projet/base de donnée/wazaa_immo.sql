-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 02 avr. 2021 à 19:32
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wazaa_immo`
--
CREATE DATABASE IF NOT EXISTS `wazaa_immo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wazaa_immo`;

-- --------------------------------------------------------

--
-- Structure de la table `waz_annonces`
--

DROP TABLE IF EXISTS `waz_annonces`;
CREATE TABLE IF NOT EXISTS `waz_annonces` (
  `an_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant / Clé primaire',
  `an_offre` char(1) NOT NULL COMMENT 'Type d''offre. Lettres A, L ou V.',
  `an_type` int(10) UNSIGNED NOT NULL COMMENT 'Type de bien',
  `an_opt` int(10) NOT NULL COMMENT 'Option',
  `an_pieces` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Nombre de pièces (facultatif)',
  `an_ref` varchar(10) NOT NULL COMMENT 'Référence de l''annonce',
  `an_titre` varchar(200) NOT NULL COMMENT 'Titre',
  `an_description` mediumtext NOT NULL COMMENT 'Description',
  `an_local` varchar(100) NOT NULL,
  `an_surf_hab` smallint(6) DEFAULT NULL COMMENT 'Surface habitable (mètres carrés)',
  `an_surf_tot` int(11) NOT NULL COMMENT 'Surface totale/terrain (mètres carrés)',
  `an_prix` int(11) NOT NULL COMMENT 'Prix en euros',
  `an_diagnostic` char(1) NOT NULL COMMENT 'Lettre du diagnostic : A à G + V pour vierge ',
  `an_d_ajout` date NOT NULL COMMENT 'Date d''ajout',
  `an_d_modif` datetime DEFAULT NULL COMMENT 'Date de modification',
  `an_vues` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`an_id`),
  KEY `an_opt` (`an_opt`),
  KEY `an_type` (`an_type`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `waz_annonces`
--

INSERT INTO `waz_annonces` (`an_id`, `an_offre`, `an_type`, `an_opt`, `an_pieces`, `an_ref`, `an_titre`, `an_description`, `an_local`, `an_surf_hab`, `an_surf_tot`, `an_prix`, `an_diagnostic`, `an_d_ajout`, `an_d_modif`, `an_vues`) VALUES
(1, 'A', 2, 1, 5, '20A100', 'à 100 km de Paris, maison 85m2 avec jardin ', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80)', 85, 225, 197000, 'F', '2020-11-13', '2021-04-02 19:36:15', 14),
(2, 'L', 2, 1, 5, '20A100', '100 km de amiens, maison 45m2 avec jardin', 'Exclusivité :  maison d\'environ 45m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 45, 225, 19000, 'F', '2020-11-13', NULL, 1),
(3, 'L', 3, 1, 5, '20A200', 'Corbie, appartement 65m2 avec jardin', 'Exclusivité :  maison d\'environ 65m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), corbie', 65, 225, 205555, 'F', '2020-11-13', NULL, 1),
(4, 'L', 4, 1, 5, '20A300', 'Corbie, appartement 65m2 avec jardin', 'Exclusivité :  maison d\'environ 65m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), corbie', 65, 225, 67000, 'F', '2020-11-13', NULL, 0),
(5, 'L', 4, 1, 5, '20A300', 'Villers, appartement 65m2 avec jardin', 'Exclusivité :  maison d\'environ 65m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), Villers', 65, 225, 897000, 'F', '2020-11-13', NULL, 1),
(6, 'L', 5, 1, 5, '20A400', 'Camon, appartement 65m2 avec jardin', 'Exclusivité :  maison d\'environ 65m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), Camon', 65, 225, 267000, 'F', '2020-11-13', NULL, 0),
(7, 'L', 5, 1, 5, '20A400', 'Camon, appartement 65m2 avec jardin', 'Exclusivité :  maison d\'environ 65m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), Camon', 65, 225, 597000, 'F', '2020-11-13', NULL, 0),
(8, 'A', 3, 1, 5, '20A400', 'Camon, appartement 65m2 avec jardin', 'Exclusivité :  maison d\'environ 65m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), Camon', 65, 225, 397000, 'F', '2020-11-13', '2021-04-02 21:03:56', 1),
(9, 'L', 5, 1, 5, '20A400', 'Camon, appartement 65m2 avec jardin', 'Exclusivité :  maison d\'environ 65m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), Camon', 65, 225, 85000, 'F', '2020-11-13', NULL, 0),
(10, 'L', 5, 1, 5, '20A400', 'Camon, appartement 65m2 avec jardin', 'Exclusivité :  maison d\'environ 65m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), Camon', 65, 225, 70000, 'F', '2020-11-13', NULL, 0),
(23, 'V', 2, 8, 3, 'MSM001', 'à rénover située dans une rue pavillonnaire', 'La maison est actuellement composée :\r\nAu rdc d\'une entrée, un salon /séjour, une cuisine et 2 chambres, une salle de bains avec wc, une véranda donnant sur jardin, au 1er étage 2 chambres sous combles avec belle hauteur, un rez de jardin avec belle hauteur sous plafond et fenêtres, composé de 3 grandes pièces avec buanderie et accès jardin.\r\n\r\nSuite à la division de la parcelle réalisée dernièrement (la seconde parcelle créée qui jouxte étant revendue avec un PC pour une future maison neuve), certains travaux seront à réaliser obligatoirement (modification du débord de toiture sur un côté de la façade, avec une nouvelle entrée à créer sur le devant de la maison, ouverture du mur de clôture permettant un nouvel accès) le tout étant soumis à autorisation administrative un permis de construire a été déposé.\r\n\r\nLe permis de construire a été réalisé par un cabinet d\'architecte, déposé en mairie et accepté (accord définitif fin mai après recours des tiers).\r\n', 'A 12 km du centre de Paris', 200, 637, 750000, 'A', '2021-04-02', '2021-04-02 21:04:44', 1);

-- --------------------------------------------------------

--
-- Structure de la table `waz_categories`
--

DROP TABLE IF EXISTS `waz_categories`;
CREATE TABLE IF NOT EXISTS `waz_categories` (
  `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant / Clé primaire',
  `cat_libelle` varchar(100) NOT NULL COMMENT 'Libellé de l''option',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `waz_categories`
--

INSERT INTO `waz_categories` (`cat_id`, `cat_libelle`) VALUES
(1, 'Terrain'),
(2, 'Maison'),
(3, 'Appartement'),
(4, 'Studio'),
(5, 'Chambre');

-- --------------------------------------------------------

--
-- Structure de la table `waz_options`
--

DROP TABLE IF EXISTS `waz_options`;
CREATE TABLE IF NOT EXISTS `waz_options` (
  `opt_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant / Clé primaire',
  `opt_libelle` varchar(100) NOT NULL COMMENT 'Libellé de l''option',
  PRIMARY KEY (`opt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `waz_options`
--

INSERT INTO `waz_options` (`opt_id`, `opt_libelle`) VALUES
(1, 'Jardin'),
(2, 'Garage'),
(3, 'Parking'),
(4, 'Piscine'),
(5, 'Combles aménageables'),
(6, 'Cuisine ouverte'),
(7, 'Sans travaux'),
(8, 'Avec travaux'),
(9, 'Cave'),
(10, 'Plain-pied'),
(11, 'Ascenseur'),
(12, 'Terrasse/balcon'),
(13, 'Cheminée');

-- --------------------------------------------------------

--
-- Structure de la table `waz_picture`
--

DROP TABLE IF EXISTS `waz_picture`;
CREATE TABLE IF NOT EXISTS `waz_picture` (
  `pic_id` int(10) NOT NULL AUTO_INCREMENT,
  `pic_an_id` int(10) NOT NULL,
  `pic_ext` char(5) DEFAULT NULL,
  `pic_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`pic_id`),
  KEY `pic_an_id` (`pic_an_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `waz_picture`
--

INSERT INTO `waz_picture` (`pic_id`, `pic_an_id`, `pic_ext`, `pic_date`) VALUES
(1, 1, 'jpg', '2021-03-29 15:28:04'),
(2, 1, 'jpg', '2021-03-29 15:28:27'),
(3, 2, 'jpg', '2021-03-29 15:28:37'),
(4, 2, 'jpg', '2021-03-29 15:29:48'),
(5, 3, 'jpg', '2021-03-29 15:30:40'),
(6, 3, 'jpg', '2021-03-29 15:31:12'),
(7, 3, 'jpg', '2021-03-29 15:31:18'),
(8, 4, 'jpg', '2021-03-29 15:31:38'),
(9, 5, 'jpg', '2021-03-29 15:33:00'),
(10, 5, 'jpg', '2021-03-29 15:33:07'),
(11, 5, 'jpg', '2021-03-29 15:33:14'),
(12, 6, 'jpg', '2021-03-29 15:33:30'),
(13, 6, 'jpg', '2021-03-29 15:34:18'),
(14, 6, 'jpg', '2021-03-29 15:34:32'),
(16, 7, 'jpg', '2021-03-29 15:39:17'),
(17, 7, 'jpg', '2021-03-29 15:39:17'),
(18, 7, 'jpg', '2021-03-29 15:39:17'),
(19, 8, 'jpg', '2021-03-29 15:39:17'),
(20, 8, 'jpg', '2021-03-29 15:39:17'),
(21, 8, 'jpg', '2021-03-29 15:39:17'),
(22, 9, 'jpg', '2021-03-29 15:39:17'),
(23, 9, 'jpg', '2021-03-29 15:39:17'),
(24, 10, 'jpg', '2021-03-29 15:39:17'),
(25, 10, 'jpg', '2021-03-29 15:39:17'),
(26, 10, 'jpg', '2021-03-29 15:39:17'),
(27, 10, 'jpg', '2021-03-29 15:39:17'),
(28, 10, 'jpg', '2021-03-29 15:39:17'),
(62, 23, 'jpg', '2021-04-02 20:04:20'),
(63, 23, 'jpg', '2021-04-02 20:04:20'),
(64, 23, 'jpg', '2021-04-02 20:04:20');

-- --------------------------------------------------------

--
-- Structure de la table `waz_users`
--

DROP TABLE IF EXISTS `waz_users`;
CREATE TABLE IF NOT EXISTS `waz_users` (
  `wi_id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `wi_nom` varchar(10) NOT NULL COMMENT 'nom',
  `wi_prenom` varchar(10) NOT NULL COMMENT 'prénom',
  `wi_adresse` varchar(50) DEFAULT NULL COMMENT 'adresse postal',
  `wi_cp` int(5) DEFAULT NULL COMMENT 'code postal',
  `wi_city` varchar(10) DEFAULT NULL COMMENT 'ville',
  `wi_tel` int(10) DEFAULT NULL COMMENT 'téléphone',
  `wi_sexe` enum('h','f','null') DEFAULT NULL,
  `wi_mail` varchar(254) NOT NULL COMMENT 'email ',
  `wi_mail_hash` varchar(255) DEFAULT NULL,
  `wi_mail_confirm` int(1) NOT NULL DEFAULT 0,
  `wi_role` int(1) NOT NULL DEFAULT 0 COMMENT 'role 0 client 1 vendeur',
  `wi_password` varchar(60) NOT NULL COMMENT 'mot de passe',
  `wi_hash` varchar(255) NOT NULL COMMENT 'sel',
  `wi_jeton_connect` varchar(60) DEFAULT NULL COMMENT 'jeton de connexion',
  `wi_d_create` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'date de création du compte',
  `wi_d_connect` datetime DEFAULT NULL COMMENT 'date de connection',
  `wi_d_test_connect` datetime DEFAULT NULL COMMENT 'date de teste de connection si échoué',
  `wi_essai_connect` int(1) NOT NULL DEFAULT 0 COMMENT 'nombre essai connexion',
  `wi_d_reset` datetime DEFAULT NULL COMMENT 'date de reste password',
  `wi_reset_hash` char(12) DEFAULT NULL COMMENT 'hash reset  mot de passe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `waz_users`
--

INSERT INTO `waz_users` (`wi_id`, `wi_nom`, `wi_prenom`, `wi_adresse`, `wi_cp`, `wi_city`, `wi_tel`, `wi_sexe`, `wi_mail`, `wi_mail_hash`, `wi_mail_confirm`, `wi_role`, `wi_password`, `wi_hash`, `wi_jeton_connect`, `wi_d_create`, `wi_d_connect`, `wi_d_test_connect`, `wi_essai_connect`, `wi_d_reset`, `wi_reset_hash`) VALUES
(0, 'lefebvre', 'harold', '15 rue marcellin berthelot', 80000, '', 610012548, 'h', 's.lefebvre907@laposte.net', NULL, 1, 0, '$2y$10$AYQitKmzDxFCC4yxI0BxW.0.aSEZqrwkWwS68IU/SVAmqv0eWnx/W', '343830323861373761653866313334623332616136656635', '$2y$10$1BrSu1k.Mc6iqjn22hWlZ.M17qBX0aGYFbtm5vgsNpoXQuYjdHG7G', '2021-03-30 15:47:43', '2021-04-02 09:53:10', NULL, 0, NULL, '86718a6c5a8d');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `waz_annonces`
--
ALTER TABLE `waz_annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`an_opt`) REFERENCES `waz_options` (`opt_id`),
  ADD CONSTRAINT `annonces_ibfk_2` FOREIGN KEY (`an_type`) REFERENCES `waz_categories` (`cat_id`);

--
-- Contraintes pour la table `waz_picture`
--
ALTER TABLE `waz_picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`pic_an_id`) REFERENCES `waz_annonces` (`an_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
