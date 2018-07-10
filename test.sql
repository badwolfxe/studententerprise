-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 09 juil. 2018 à 13:53
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `atelier-dc3`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`) VALUES
(3);

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`id`, `label`) VALUES
(1, 'stage'),
(2, 'alternance');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `label`, `code`) VALUES
(1, 'Ain', '01'),
(2, 'Aisne', '02'),
(3, 'Allier', '03'),
(4, 'Alpes de Hautes-Provence', '04'),
(5, 'Hautes-Alpes', '05'),
(6, 'Alpes-Maritimes', '06'),
(7, 'Ardèche', '07'),
(8, 'Ardennes', '08'),
(9, 'Ariège', '09'),
(10, 'Aube', '10'),
(11, 'Aude', '11'),
(12, 'Aveyron', '12'),
(13, 'Bouches-du-Rhône', '13'),
(14, 'Calvados', '14'),
(15, 'Cantal', '15'),
(16, 'Charente', '16'),
(17, 'Charente-Maritime', '17'),
(18, 'Cher', '18'),
(19, 'Corrèze', '19'),
(20, 'Corse (Sud - Haute Corse)', '20'),
(21, 'Côte-d\'Or', '21'),
(22, 'Côtes d\'Armor', '22'),
(23, 'Creuse', '23'),
(24, 'Dordogne', '24'),
(25, 'Doubs', '25'),
(26, 'Drôme', '26'),
(27, 'Eure', '27'),
(28, 'Eure-et-Loir', '28'),
(29, 'Finistère', '29'),
(30, 'Gard', '30'),
(31, 'Haute-Garonne', '31'),
(32, 'Gers', '32'),
(33, 'Gironde', '33'),
(34, 'Hérault', '34'),
(35, 'Ille-et-Vilaine', '35'),
(36, 'Indre', '36'),
(37, 'Indre-et-Loire', '37'),
(38, 'Isère', '38'),
(39, 'Jura', '39'),
(40, 'Landes', '40'),
(41, 'Loir-et-Cher', '41'),
(42, 'Loire', '42'),
(43, 'Haute-Loire', '43'),
(44, 'Loire-Atlantique', '44'),
(45, 'Loiret', '45'),
(46, 'Lot', '46'),
(47, 'Lot-et-Garonne', '47'),
(48, 'Lozère', '48'),
(49, 'Maine-et-Loire', '49'),
(50, 'Manche', '50'),
(51, 'Marne', '51'),
(52, 'Haute-Marne', '52'),
(53, 'Mayenne', '53'),
(54, 'Meurthe-et-Moselle', '54'),
(55, 'Meuse', '55'),
(56, 'Morbihan', '56'),
(57, 'Moselle', '57'),
(58, 'Nièvre', '58'),
(59, 'Nord', '59'),
(60, 'Oise', '60'),
(61, 'Orne', '61'),
(62, 'Pas-de-Calais', '62'),
(63, 'Puy-de-Dôme', '63'),
(64, 'Pyrénées-Atlantiques', '64'),
(65, 'Hautes-Pyrénées', '65'),
(66, 'Pyrénées-Orientales', '66'),
(67, 'Bas-Rhin', '67'),
(68, 'Haut-Rhin', '68'),
(69, 'Rhône', '69'),
(70, 'Haute-Saône', '70'),
(71, 'Saône-et-Loire', '71'),
(72, 'Sarthe', '72'),
(73, 'Savoie', '73'),
(74, 'Haute-Savoie', '74'),
(75, 'Paris', '75'),
(76, 'Seine-Maritime', '76'),
(77, 'Seine-et-Marne', '77'),
(78, 'Yvelines', '78'),
(79, 'Deux-Sèvres', '79'),
(80, 'Somme', '80'),
(81, 'Tarn', '81'),
(82, 'Tarn-et-Garonne', '82'),
(83, 'Var', '83'),
(84, 'Vaucluse', '84'),
(85, 'Vendée', '85'),
(86, 'Vienne', '86'),
(87, 'Haute-Vienne', '87'),
(88, 'Vosges', '88'),
(89, 'Yonne', '89'),
(90, 'Territoire-de-Belfort', '90'),
(91, 'Essonne', '91'),
(92, 'Hauts-de-Seine', '92'),
(93, 'Seine-Saint-Denis', '93'),
(94, 'Val-de-Marne', '94'),
(95, 'Val-d\'Oise ', '95');

-- --------------------------------------------------------

--
-- Structure de la table `departement_has_etudiant`
--

CREATE TABLE `departement_has_etudiant` (
  `departement_id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`) VALUES
(4, 'Entreprise1');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `numero_tel` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `lettre_motivation` varchar(255) DEFAULT NULL,
  `niveau_etude_id` int(11) NOT NULL,
  `contrat_id` int(11) NOT NULL,
  `actif` tinyint(4) NOT NULL DEFAULT '1',
  `date_debut_contrat` date NOT NULL,
  `date_fin_contrat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `date_naissance`, `numero_tel`, `cv`, `lettre_motivation`, `niveau_etude_id`, `contrat_id`, `actif`, `date_debut_contrat`, `date_fin_contrat`) VALUES
(1, 'Bellamy', 'Céline', '1996-05-11', '0608197865', 'cv-celine.pdf', 'lettre-celine.pdf', 3, 2, 1, '2018-01-02', '2019-01-31'),
(2, 'Perrot', 'Coraline', '1997-01-28', '0605387956', 'cv-coraline.pdf', 'lettre-coraline.pdf', 4, 1, 0, '2018-05-01', '2018-07-31');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_has_specialite`
--

CREATE TABLE `etudiant_has_specialite` (
  `etudiant_id` int(11) NOT NULL,
  `specialite_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant_has_specialite`
--

INSERT INTO `etudiant_has_specialite` (`etudiant_id`, `specialite_id`) VALUES
(1, 1),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `niveau_etude`
--

CREATE TABLE `niveau_etude` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `niveau_etude`
--

INSERT INTO `niveau_etude` (`id`, `label`) VALUES
(1, 'bac +1'),
(2, 'bac +2'),
(3, 'bac +3'),
(4, 'bac +4'),
(5, 'bac +5');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id`, `label`) VALUES
(1, 'Webmarketing'),
(2, 'Webdesign'),
(3, 'Developpement');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `date_inscritpion` datetime NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `valide` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `mail`, `mdp`, `date_inscritpion`, `avatar`, `valide`) VALUES
(1, 'celine.bellamy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2017-01-01 00:00:00', 'celine.png', 1),
(2, 'coraline.perrot@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2017-02-01 00:00:00', 'coraline.png', 0),
(3, 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-02 00:00:00', NULL, 1),
(4, 'contact@entreprise.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-01-03 00:00:00', NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departement_has_etudiant`
--
ALTER TABLE `departement_has_etudiant`
  ADD PRIMARY KEY (`departement_id`,`etudiant_id`),
  ADD KEY `fk_departement_has_etudiant_etudiant1_idx` (`etudiant_id`),
  ADD KEY `fk_departement_has_etudiant_departement1_idx` (`departement_id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_etudiant_niveau_etude1_idx` (`niveau_etude_id`),
  ADD KEY `fk_etudiant_contrat1_idx` (`contrat_id`);

--
-- Index pour la table `etudiant_has_specialite`
--
ALTER TABLE `etudiant_has_specialite`
  ADD PRIMARY KEY (`etudiant_id`,`specialite_id`),
  ADD KEY `fk_etudiant_has_specialite_specialite1_idx` (`specialite_id`),
  ADD KEY `fk_etudiant_has_specialite_etudiant1_idx` (`etudiant_id`);

--
-- Index pour la table `niveau_etude`
--
ALTER TABLE `niveau_etude`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `niveau_etude`
--
ALTER TABLE `niveau_etude`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_utilisateur` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `departement_has_etudiant`
--
ALTER TABLE `departement_has_etudiant`
  ADD CONSTRAINT `fk_departement_has_etudiant_departement1` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_departement_has_etudiant_etudiant1` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `fk_entreprise_utilisateur1` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `fk_etudiant_contrat1` FOREIGN KEY (`contrat_id`) REFERENCES `contrat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_etudiant_niveau_etude1` FOREIGN KEY (`niveau_etude_id`) REFERENCES `niveau_etude` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_etudiant_utilisateur1` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `etudiant_has_specialite`
--
ALTER TABLE `etudiant_has_specialite`
  ADD CONSTRAINT `fk_etudiant_has_specialite_etudiant1` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_etudiant_has_specialite_specialite1` FOREIGN KEY (`specialite_id`) REFERENCES `specialite` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
