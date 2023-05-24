--
-- Structure des tables de Comptes
--

CREATE DATABASE compte;

CREATE TABLE IF NOT EXISTS `Visiteur` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30)  DEFAULT NULL, 
  `login` char(20) DEFAULT NULL,
  `mdp` char(20) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `Comptable` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30)  DEFAULT NULL, 
  `login` char(20) DEFAULT NULL,
  `mdp` char(20) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Structure des tables de Infos
--

CREATE DATABASE Infos;

CREATE TABLE IF NOT EXISTS `Etat` (
  `id` char(2) NOT NULL,
  `libelle` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `FraisForfait` (   
  `id` char(3) NOT NULL,
  `libelle` char(20) DEFAULT NULL,
  `montant` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Structure des tables de Saisies
--

CREATE DATABASE Saisies;

CREATE TABLE IF NOT EXISTS `fichefrais` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `nbJustificatifs` int(11) DEFAULT NULL,
  `montantValide` decimal(10,2) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idEtat` char(2) DEFAULT 'CR',
  PRIMARY KEY (`idVisiteur`,`mois`),
  FOREIGN KEY (`idEtat`) REFERENCES Etat(`id`),
  FOREIGN KEY (`idVisiteur`) REFERENCES Visiteur(`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `SaisiesLigneFraisForfait` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `idFraisForfait` char(3) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`idVisiteur`,`mois`,`idFraisForfait`),
  FOREIGN KEY (`idVisiteur`, `mois`) REFERENCES FicheFrais(`idVisiteur`, `mois`),
  FOREIGN KEY (`idFraisForfait`) REFERENCES FraisForfait(`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `LigneFraisHorsForfait` (
  `id` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (`id`, `mois`) REFERENCES FicheFrais(`idVisiteur`, `mois`)
) ENGINE=InnoDB;

-- Edit de la table (ajout des UID)

ALTER TABLE compte.visiteur
ADD uid INT AUTO_INCREMENT,
ADD INDEX (uid);