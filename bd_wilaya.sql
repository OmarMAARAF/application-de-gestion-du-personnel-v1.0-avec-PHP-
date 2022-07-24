-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 18 juil. 2022 à 18:48
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_wilaya`
--

-- --------------------------------------------------------

--
-- Structure de la table `annexe`
--

DROP TABLE IF EXISTS `annexe`;
CREATE TABLE IF NOT EXISTS `annexe` (
  `District` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `Nom_fr` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Nom_ar` varchar(255) NOT NULL,
  PRIMARY KEY (`Nom_fr`),
  KEY `my_key15` (`region`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annexe`
--

INSERT INTO `annexe` (`District`, `region`, `Nom_fr`, `Nom_ar`) VALUES
('Oujda-sidi-ziane', 'pachalik-oujda', '1er arrondissement urbain', 'الملحقة الإدارية الأولى'),
('Oujda-sidi-ziane\r\n', 'pachalik-oujda\r\n', '2eme arrondissement urbain\r\n', 'الملحقة الإدارية الثانية\r\n'),
('Oujda-sidi-ziane\r\n', 'pachalik-oujda\r\n', '3eme arrondissement urbain\r\n', 'الملحقة الإدارية الثالثة\r\n'),
('Oujda-sidi-ziane\r\n', 'pachalik-oujda\r\n', '4eme arrondissement urbain\r\n', 'الملحقة الإدارية الرابعة\r\n'),
('Sidi-driss-el-qadi\r\n', 'pachalik-oujda\r\n', '5eme arrondissement urbain\r\n', 'الملحقة الإدارية الخامسة\r\n'),
('Sidi-driss-el-qadi\r\n', 'pachalik-oujda\r\n', '6eme arrondissement urbain\r\n', 'الملحقة الإدارية السادسة\r\n'),
('Sidi-driss-el-qadi\r\n', 'pachalik-oujda\r\n', '7eme arrondissement urbain\r\n', 'الملحقة الإدارية السابعة'),
('Sidi-driss-el-qadi\r\n', 'pachalik-oujda\r\n', '8eme arrondissement urbain\r\n', 'الملحقة الإدارية الثامنة\r\n'),
('Ouad-ennachef-sidi-maafa\r\n', 'pachalik-oujda\r\n', '9eme arrondissement urbain\r\n', 'الملحقة الإدارية التاسعة\r\n'),
('Ouad-ennachef-sidi-maafa\r\n', 'pachalik-oujda\r\n', '10eme arrondissement urbain\r\n', 'الملحقة الإدارية العاشرة'),
('Ouad-ennachef-sidi-maafa\r\n', 'pachalik-oujda\r\n', '11eme arrondissement urbain\r\n', 'الملحقة الإدارية الحادية عشرة\r\n'),
('Ouad-ennachef-sidi-maafa\r\n', 'pachalik-oujda\r\n', '\r\n12eme arrondissement urbain', 'الملحقة الإدارية الثانية عشرة\r\n'),
('Ouad-ennachef-sidi-maafa\r\n', 'pachalik-oujda\r\n', '16eme arrondissement urbain\r\n', 'الملحقة الإدارية السادسة عشر \r\n'),
('Ouad-ennachef-sidi-maafa\r\n', 'pachalik-oujda\r\n', '17eme arrondissement urbain\r\n', 'الملحقة الإدارية السابعة عشر \r\n'),
('Sidi-yahia\r\n', 'pachalik-oujda\r\n', '13eme arrondissement urbain\r\n', 'الملحقة الإدارية الثالثة عشرة \r\n'),
('Sidi-yahia\r\n', 'pachalik-oujda\r\n', '\r\n\r\n15eme arrondissement urbain', 'الملحقة الإدارية الرابعة عشرة  \r\n'),
('Sidi-yahia\r\n', 'pachalik-oujda\r\n', '15eme arrondissement urbain', 'الملحقة الإدارية الخامسة عشرة  \r\n');

-- --------------------------------------------------------

--
-- Structure de la table `attestation`
--

DROP TABLE IF EXISTS `attestation`;
CREATE TABLE IF NOT EXISTS `attestation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cin` varchar(255) NOT NULL,
  `date_demande` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `VALIDATION` varchar(255) NOT NULL DEFAULT 'En attente',
  PRIMARY KEY (`id`),
  KEY `mykey7` (`Cin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `communaut_rur`
--

DROP TABLE IF EXISTS `communaut_rur`;
CREATE TABLE IF NOT EXISTS `communaut_rur` (
  `Direction` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Cercle` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Nom_fr` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Nom` varchar(255) NOT NULL,
  PRIMARY KEY (`Nom_fr`),
  KEY `Cercle` (`Cercle`),
  KEY `Nom` (`Nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `communaut_rur`
--

INSERT INTO `communaut_rur` (`Direction`, `Cercle`, `Nom_fr`, `Nom`) VALUES
('caidat ouad isly', 'cercle oujda banlieuse sud', 'CR-Mestferki', 'الجماعة القروية مستفركي'),
('caidat ouad isly', 'cercle oujda banlieuse sud', 'CR-Sidi-Boulenouar', 'الجماعة القروية سيدي بولنوار'),
('caidat ouad isly', 'cercle oujda banlieuse sud', 'CR-Sidi-Moussa-Lemhaya', 'الجماعة القروية سيدي موسى المهاية'),
('caidat isly bni oukil', 'cercle oujda banlieuse sud', 'CR-Isly', 'الجماعة القروية اسلي\r\n'),
('caidat angad', 'cercle oujda banlieuse nord', 'CR-Ahl-Angad', 'الجماعة القروية اهل انكاد'),
('caidat ain sfa', 'cercle oujda banlieuse nord', 'CR-Ain-Sfa', 'الجماعة القروية عين الصفا'),
('caidat ain sfa', 'cercle oujda banlieuse nord', 'CR-Bni-Khaled', 'الجماعة القروية بني خالد'),
('caidat ain sfa', 'cercle oujda banlieuse nord', 'CR-Labsara', 'الجماعة القروية لبصارة');

-- --------------------------------------------------------

--
-- Structure de la table `communaut_urbaine`
--

DROP TABLE IF EXISTS `communaut_urbaine`;
CREATE TABLE IF NOT EXISTS `communaut_urbaine` (
  `Nom_fr` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Pachalik` varchar(255) NOT NULL,
  PRIMARY KEY (`Nom_fr`),
  KEY `Pachalik` (`Pachalik`),
  KEY `Nom` (`Nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `communaut_urbaine`
--

INSERT INTO `communaut_urbaine` (`Nom_fr`, `Nom`, `Pachalik`) VALUES
('Cu-Neima', 'الجماعة الحضرية النعيمة', 'pachalik-neima'),
('Cu-Bni-Drar', 'الجماعة الحضرية بني درار', 'pachalik-bni-drar');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `cin` varchar(20) NOT NULL,
  `nb_jours` varchar(3) NOT NULL,
  `date_depart` varchar(20) NOT NULL,
  `type` varchar(80) NOT NULL,
  `date_prise` varchar(20) NOT NULL,
  `etat` varchar(20) NOT NULL DEFAULT 'En attente',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id`, `cin`, `nb_jours`, `date_depart`, `type`, `date_prise`, `etat`) VALUES
(19, 'Z636129', '5', '2022-07-29', '1', '2022-07-14 23:08:51', 'valide'),
(20, 'mjk6999', '4', '2022-07-14', '2', '2022-07-15 12:15:23', 'refuse'),
(21, 'Z56788', '12', '2022-07-29', '1', '2022-07-18 14:08:03', 'En attente');

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

DROP TABLE IF EXISTS `diplome`;
CREATE TABLE IF NOT EXISTS `diplome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_diplome` varchar(255) NOT NULL,
  `Specialite` varchar(255) NOT NULL,
  `Etablissement` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `diplome`
--

INSERT INTO `diplome` (`id`, `type_diplome`, `Specialite`, `Etablissement`) VALUES
(18, 'genie_mec', 'mecano', 'kabab'),
(12, 'fzefzfzef', 'dazddazda', 'adazdadaz'),
(19, 'genie-info', 'informa', 'ensao'),
(20, 'genie_mec', 'mecano', 'kabab');

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

DROP TABLE IF EXISTS `emploi`;
CREATE TABLE IF NOT EXISTS `emploi` (
  `Service` varchar(255) NOT NULL,
  `date_offic` date NOT NULL,
  `type_budget` varchar(255) NOT NULL,
  `Etat` varchar(255) NOT NULL,
  `Cin` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_emploi` date NOT NULL,
  `lieu_fr` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `my_key2` (`Cin`),
  KEY `lieu_fr` (`lieu_fr`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emploi`
--

INSERT INTO `emploi` (`Service`, `date_offic`, `type_budget`, `Etat`, `Cin`, `id`, `date_emploi`, `lieu_fr`) VALUES
('Rh', '1993-11-11', 'provincial', 'القيام بالعمل\r\n', 'F119095', 1, '1992-11-11', '6eme arrondissement urbain'),
('info', '1966-11-11', 'provincial', 'القيام بالعمل\r\n', 'Z636129', 2, '1960-11-11', '8eme arrondissement urbain'),
('RH', '1970-01-01', 'provincial', 'dzdzd', 'Z636363', 11, '2022-07-07', '2eme arrondissement urbain'),
('RH', '1970-01-01', 'provincial', 'dzdzd', 'dzadza', 12, '1970-01-01', '3eme arrondissement urbain');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Sexe` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '''''',
  `CMR` int(11) NOT NULL,
  `Situation` varchar(255) NOT NULL,
  `nb_enfant` int(11) DEFAULT '0',
  `num_carte` varchar(255) NOT NULL,
  `num_financier` int(11) NOT NULL,
  `Num_tel` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Matricule` int(11) NOT NULL,
  `type_employe` varchar(255) DEFAULT NULL,
  `nom_ar` varchar(255) NOT NULL,
  `prenom_ar` varchar(255) NOT NULL,
  PRIMARY KEY (`num_carte`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`Nom`, `Prenom`, `Sexe`, `date_naissance`, `lieu_naissance`, `email`, `CMR`, `Situation`, `nb_enfant`, `num_carte`, `num_financier`, `Num_tel`, `Adresse`, `Matricule`, `type_employe`, `nom_ar`, `prenom_ar`) VALUES
('SGHIOURI', 'Yahya', 'Male', '1960-02-08', 'Taza', 'yahyasgh9@gmail.com', 714322, 'divorced', 0, 'Z636129', 786333, '0653521729', 'N° 62 adoha 239 appart 10\r\n\r\n', 1025323225, 'cadre-admin', 'الصغيوري \r\n', 'يحيى \r\n'),
('ZERYOUH', 'MOSTAPHA', 'Male', '1960-02-08', 'جرادة\r\n', 'yahyasghiouri1998@gmail.com', 714323, 'celib', 12, 'F119095', 786387, '0653521789', 'NÂ° 62 lÃ´t ibn khaldoun mchiouer route ain bni mathar Oujda', 10258525, 'cadre-admin', 'زريوح\r\n', 'المصطفى\r\n'),
('lahlam', 'beddaz', 'male', '1970-01-01', 'taza', 'khkh@gmail.com', 23232, 'marie', 5, 'Z636363', 323232, '098987', 'hayllamal965', 3232, 'gerant', 'ججججج', 'ججججج'),
('adzda', 'dzadaz', 'male', '1970-01-01', 'taza', 'dzadza', 0, 'marie', 7, 'dzadza', 0, 'dazdzad', 'zdadzad', 0, 'gerant', 'dzdaz', 'dazdza');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
CREATE TABLE IF NOT EXISTS `etablissement` (
  `region` varchar(255) NOT NULL,
  `Nom_fr` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  PRIMARY KEY (`Nom_fr`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`region`, `Nom_fr`, `Nom`) VALUES
('pachalik-neima', 'Cu-Neima', 'الجماعة الحضرية النعيمة'),
('pachalik-bni-drar', 'Cu-Bni-Drar', 'الجماعة الحضرية بني درار'),
('cercle oujda banlieuse sud', 'CR-Mestferki', 'الجماعة القروية مستفركي'),
('cercle oujda banlieuse sud', 'CR-Sidi-Boulenouar', 'الجماعة القروية سيدي بولنوار'),
('cercle oujda banlieuse sud', 'CR-Sidi-Moussa-Lemhaya', 'الجماعة القروية سيدي موسى المهاية'),
('cercle oujda banlieuse sud', 'CR-Isly', 'الجماعة القروية اسلي\r\n'),
('cercle oujda banlieuse nord', 'CR-Ahl-Angad', 'الجماعة القروية اهل انكاد'),
('cercle oujda banlieuse nord', 'CR-Ain-Sfa', 'الجماعة القروية عين الصفا'),
('cercle oujda banlieuse nord', 'CR-Bni-Khaled', 'الجماعة القروية بني خالد'),
('cercle oujda banlieuse nord', 'CR-Labsara', 'الجماعة القروية لبصارة'),
('pachalik-oujda', '1er arrondissement urbain', 'الملحقة الإدارية الأولى'),
('pachalik-oujda', '2eme arrondissement urbain', 'الملحقة الإدارية الثانية\r\n'),
('pachalik-oujda', '3eme arrondissement urbain', 'الملحقة الإدارية الثالثة\r\n'),
('pachalik-oujda', '4eme arrondissement urbain', 'الملحقة الإدارية الرابعة'),
('pachalik-oujda\r\n', '5eme arrondissement urbain', 'الملحقة الإدارية الخامسة\r\n'),
('pachalik-oujda', '6eme arrondissement urbain', 'الملحقة الإدارية السادسة\r\n'),
('pachalik-oujda\r\n', '7eme arrondissement urbain\r\n', 'الملحقة الإدارية السابعة'),
('pachalik-oujda\r\n', '8eme arrondissement urbain', 'الملحقة الإدارية الثامنة\r\n'),
('pachalik-oujda\r\n', '9eme arrondissement urbain', 'الملحقة الإدارية التاسعة\r\n'),
('pachalik-oujda', '10eme arrondissement urbain', 'الملحقة الإدارية العاشرة'),
('pachalik-oujda\r\n', '11eme arrondissement urbain', 'الملحقة الإدارية الحادية عشرة\r\n'),
('pachalik-oujda\r\n', '12eme arrondissement urbain', 'الملحقة الإدارية الثانية عشرة\r\n'),
('pachalik-oujda\r\n', '16eme arrondissement urbain', 'الملحقة الإدارية السادسة عشر \r\n'),
('pachalik-oujda', '17eme arrondissement urbain', 'الملحقة الإدارية السابعة عشر'),
('pachalik-oujda\r\n', '13eme arrondissement urbain', 'الملحقة الإدارية الثالثة عشرة \r\n'),
('pachalik-oujda\r\n', '14eme arrondissement urbain\r\n\r\n', 'الملحقة الإدارية الرابعة عشرة  \r\n'),
('pachalik-oujda\r\n', '15eme arrondissement urbain\r\n\r\n\r\n', 'الملحقة الإدارية الخامسة عشرة  \r\n');

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Echelle` int(11) NOT NULL,
  `Echelon` int(11) NOT NULL DEFAULT '1',
  `derniere_sit_echelle` date NOT NULL,
  `id_emploi` int(11) NOT NULL,
  `type_grade` varchar(255) CHARACTER SET latin1 NOT NULL,
  `derniere_sit_echelon` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `grade`
--

INSERT INTO `grade` (`id`, `Echelle`, `Echelon`, `derniere_sit_echelle`, `id_emploi`, `type_grade`, `derniere_sit_echelon`) VALUES
(1, 11, 6, '2002-11-11', 2, 'Administrateur 1er grade', '2002-11-11'),
(6, 3, 3, '2022-02-08', 12, 'Architecte 1er grade', '1970-01-01'),
(5, 2, 3, '2022-12-07', 11, 'Ingenieur en chef 1er grade', '1970-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(20) NOT NULL DEFAULT 'user',
  `last_con` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `password`, `usertype`, `last_con`) VALUES
('J636129', '1234', 'user', '2022-07-14 23:25:34'),
('Z636129', '1234', 'admin', '2022-07-18 19:42:33');

-- --------------------------------------------------------

--
-- Structure de la table `tt_diplomes`
--

DROP TABLE IF EXISTS `tt_diplomes`;
CREATE TABLE IF NOT EXISTS `tt_diplomes` (
  `id` int(11) NOT NULL,
  `Cin` varchar(255) NOT NULL,
  `Annee` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Cin`),
  KEY `Cin` (`Cin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tt_diplomes`
--

INSERT INTO `tt_diplomes` (`id`, `Cin`, `Annee`) VALUES
(18, 'Z636363', 0),
(12, 'F119095', 1966),
(19, 'Z636129', 1234),
(20, 'dzadza', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
