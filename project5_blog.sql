-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 05 juin 2018 à 11:56
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project5_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `author` varchar(100) NOT NULL,
  `article_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `chapo`, `content`, `author`, `article_date`) VALUES
(2, 'Mon premier article pour le blog', 'Passons désormais aux choses sérieuses.', 'Ce projet permet de développer une application web dans le but de se familiariser avec le langage PHP, l\'architecture MVC et la programmation orientée objet. Il s\'agit d\'un projet phare dans la formation de développeur d\'application PHP Symfony.', 'Paul', '2018-04-10 17:26:05'),
(3, 'Comment générer des fichiers Excel (XLSX, XLS) en PHP ?', 'Cet article liste les principales solutions pour écrire des fichiers Excel aux formats XLS et XLSX à partir d\'une application PHP.', 'Cet article liste les principales solutions pour écrire des fichiers Excel aux formats XLS et XLSX à partir d\'une application PHP. Il s\'agit d\'une option non négligeable permettant d\'intervenir directement au niveau de l\'application.', 'Angélique', '2018-05-02 13:35:36'),
(4, 'Les bons conseils pour choisir un mot de passe sécurisé', 'Vous avez peut être vu l’information sortir un peu partout sur les sites de news il y a quelques jours : les vrais conseils pour choisir un mot de passe sécurisé ont (enfin) été révélés !', 'la longueur du mot de passe est primordiale. C’est même la clef d’un mot de passe sécurisé et robuste. A l’instar des nombres premiers très longs qui permettent de sécuriser les transactions (et qui régissent la sécurité sur Internet, soit dit en passant),  il est nécessaire de choisir un mot de passe le plus long possible. Oubliez les 8 pauvres caractères et construisez des phrases ou des suites de mots. En toute logique « Z#!P4d9z » est moins sécurisé que « J’aime bien les mots de passe ! ». Et pourtant le second est beaucoup plus facile à retenir que le premier…', 'Yassine', '2018-04-11 08:13:59'),
(5, 'Quelques conseils pour sélectionner un langage de programmation', 'Si vous débutez dans ce domaine, vous avez besoin d’un accompagnement afin de sélectionner le langage de programmation le plus adapté.', 'Les étudiants qui se lancent le défi du développement doivent choisir la simplicité, ils progressent ainsi plus rapidement. Ceux qui optent immédiatement pour le langage de programmation complexe sont confrontés à des difficultés majeures. Ces dernières entachent sur le long terme la motivation et cette envie de continuer dans ce domaine. Ne basez pas votre carrière sur les préférences du Web ou les choix effectués par vos collègues, utilisez uniquement les informations en provenance de votre future carrière, vos besoins, vos aspirations, vos perspectives d’évolution…', 'Mathilde', '2018-04-11 08:13:59');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_date` datetime NOT NULL,
  `approuve` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `id_article`, `author`, `comment`, `comment_date`, `approuve`) VALUES
(1, 2, 'Paul', 'Il s\'agit en effet d\'un projet important et complet', '2018-04-10 17:29:53', 1),
(2, 3, 'Jean', 'Très bon article, merci pour les conseils.', '2018-04-11 08:21:41', 1),
(3, 4, 'Rachid', 'La sécurité est un point très important de nos jours.', '2018-04-11 08:21:41', 1),
(4, 5, 'Nicolas', 'Tous les langages ont leurs importances, il faut choisir celui avec lequel nous avons le plus d\'affinités', '2018-04-11 08:21:41', 1),
(9, 3, 'Thomas', 'Merci pour l\'article !', '2018-04-13 11:40:28', 1),
(34, 7, 'Céline', 'Bravo pour le test de réussite.', '2018-04-16 09:39:43', 1),
(28, 2, 'Nicole', 'Projet très enrichissant ! ', '2018-04-13 12:22:37', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `confirm`) VALUES
(1, 'projet', '169254c45fa4ed7ea11c00541ffb17b0cde39625', 1),
(6, 'Hassan', '375bb4d463383a11f9a6d493ca467c88c4c4ae4a', 0),
(25, 'test4', '1ff2b3704aede04eecb51e50ca698efd50a1379b', 0),
(24, 'openclassrooms2', 'e9d14d595a993cf07a919173eefb6d74b29a5290', 0),
(23, 'openclassrooms', 'e9d14d595a993cf07a919173eefb6d74b29a5290', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
