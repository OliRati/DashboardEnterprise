DROP DATABASE IF EXISTS `entreprise`;
CREATE DATABASE IF NOT EXISTS `entreprise`;
USE `entreprise`;

DROP TABLE IF EXISTS `employes`;
CREATE TABLE `employes` (
  `id_employes` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `sexe` enum('m','f') NOT NULL,
  `id_services` int NOT NULL,
  `date_embauche` date DEFAULT NULL,
  `salaire` float DEFAULT NULL,
  PRIMARY KEY (id_employes)
) ENGINE=InnoDB ;

INSERT INTO `employes` (`id_employes`, `prenom`, `nom`, `sexe`, `id_services`, `date_embauche`, `salaire`) VALUES
(350, 'Jean-pierre', 'Laborde', 'm', 1, '1999-12-09', 5000),
(388, 'Clement', 'Gallet', 'm', 3, '2000-01-15', 2300),
(415, 'Thomas', 'Winter', 'm', 3, '2000-05-03', 3550),
(417, 'Chloe', 'Dubar', 'f', 4, '2001-09-05', 1900),
(491, 'Elodie', 'Fellier', 'f', 2, '2002-02-22', 1600),
(509, 'Fabrice', 'Grand', 'm', 5, '2003-02-20', 1900),
(547, 'Melanie', 'Collier', 'f', 3, '2004-09-08', 3100),
(592, 'Laura', 'Blanchet', 'f', 1, '2005-06-09', 4500),
(627, 'Guillaume', 'Miller', 'm', 3, '2006-07-02', 1900),
(655, 'Celine', 'Perrin', 'f', 3, '2006-09-10', 2700),
(699, 'Julien', 'Cottet', 'm', 2, '2007-01-18', 1390),
(701, 'Mathieu', 'Vignal', 'm', 6, '2008-12-03', 2000),
(739, 'Thierry', 'Desprez', 'm', 2, '2009-11-17', 1500),
(780, 'Amandine', 'Thoyer', 'f', 9, '2010-01-23', 1500),
(802, 'Damien', 'Durand', 'm', 6, '2010-07-05', 2250),
(854, 'Daniel', 'Chevel', 'm', 6, '2011-09-28', 1700),
(876, 'Nathalie', 'Martin', 'f', 7, '2012-01-12', 3200),
(900, 'Benoit', 'Lagarde', 'm', 4, '2013-01-03', 2550),
(933, 'Emilie', 'Sennard', 'f', 3, '2014-09-11', 1800),
(990, 'Stephanie', 'Lafaye', 'f', 8, '2015-06-02', 1775);

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
    `id_services` int NOT NULL AUTO_INCREMENT,
    `service` varchar(30) DEFAULT NULL,
    PRIMARY KEY (id_services)
) ENGINE=InnoDB ;

INSERT INTO `services` (`id_services`, `service`) VALUES
(1, 'direction'),
(2, 'secretariat'),
(3, 'commercial'),
(4, 'production'),
(5, 'comptabilite'),
(6, 'informatique'),
(7, 'juridique'),
(8, 'assistant'),
(9, 'communication');
