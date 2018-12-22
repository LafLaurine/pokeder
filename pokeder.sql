-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 22 déc. 2018 à 09:20
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pokeder`
--

-- --------------------------------------------------------

--
-- Structure de la table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE IF NOT EXISTS `favorite` (
  `id_user` int(11) NOT NULL,
  `id_user_liked` int(11) NOT NULL,
  PRIMARY KEY (`id_user_liked`),
  KEY `FK_UserLiked` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `favorite`
--

INSERT INTO `favorite` (`id_user`, `id_user_liked`) VALUES
(4, 1),
(4, 2),
(9, 8),
(12, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(32) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `pokeFav` varchar(64) NOT NULL,
  `pokeType` varchar(64) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `pwd`, `firstname`, `name`, `email`, `gender`, `birthdate`, `pokeFav`, `pokeType`) VALUES
(1, 'Bob', '9834876dcfb05cb167a5c24953eba58c4ac89b1adf57f28f2f9d09af107ee8f0', 'Bobby', 'Lulu', 'a@a.fr', 'female', '1997-06-25', 'charmander', 'fighting'),
(2, 'Akame', '9834876dcfb05cb167a5c24953eba58c4ac89b1adf57f28f2f9d09af107ee8f0', 'Opi', 'Lili', 'o@o.fr', 'male', '1999-04-24', 'pikachu', 'fighting'),
(3, 'Plop', '9834876dcfb05cb167a5c24953eba58c4ac89b1adf57f28f2f9d09af107ee8f0', 'A', 'B', 'l@a.fr', 'female', '1994-08-25', 'jigglypuff', 'flying'),
(4, 'Margaux', '1ec50f4c6079e842125a4c7f561b2f1ded46181a65aca246dd0acd761912aa24', 'Margaux', 'Vaillant', 'jdzodjzod@laposte.net', 'female', '1998-12-28', 'ponyta', 'fighting'),
(5, 'Juju', 'eef0c396c1a2c19d3119217a759fad0d6ab57465cb9241e80277378bfd970236', 'Julien', 'Wesh', 'laurine.lafontaine@outlook.fr', 'male', '1990-09-01', 'wartortle', 'electric'),
(6, 'Floflo', '494414ded24da13c451b13b424928821351c78fce49f93d9e1b55f102790c206', 'Flo', 'LLala', 'pokemon@pokemon.fr', 'female', '1842-12-15', 'vulpix', 'ground'),
(7, 'Claclicla', '8df830a849e93985f1f647c0b1089223273720b037af5ecbcf25563f99ea34e8', 'Clarishka', 'Lalila', 'claclicladu77@laposte.net', 'female', '1897-02-03', 'arcanine', 'water'),
(8, 'Zazar', 'a9556ef586ceb67948c507c04aa09ffa5cc2bb409090cfc6920ddf43f2f1829c', 'Zazar', 'Ouaouaron', 'orybaptiste@gmail.com', 'male', '1998-08-01', 'farfetchd', 'grass'),
(9, 'GavéPlante', '4a7745aaf8c1a0bd18056159cd94f2c85b2fc544a356c9cae4a5518faff2b9bc', 'Plante', 'Plante', 'plante@plante.plante', 'female', '1452-01-15', 'oddish', 'grass'),
(10, 'Lulu', 'c788cd1aa394b03ef75a74ed724aa55656f67b73401b5e222fae361c9c16f70e', 'Lulu', 'La tortue', 'lululatortue@mail.mail', 'female', '1212-12-12', 'ditto', 'ice'),
(11, 'Queen', '9834876dcfb05cb167a5c24953eba58c4ac89b1adf57f28f2f9d09af107ee8f0', 'Lafontaine', 'Laurine', 'c@o.fr', 'female', '1999-04-24', 'gengar', 'fire'),
(12, 'ninadc', '110812f67fa1e1f0117f6f3d70241c1a42a7b07711a93c2477cc516d9042f9db', 'yhyhd', 'chyh', 'dcnin@a.fr', 'female', '2018-12-03', 'jigglypuff', 'flying'),
(13, 'Mhite', 'ee4648b663a774abc90f73a31dde552c4c4a972523e72cbf9a87074e2a7908aa', 'Michel', 'YIP', 'wu.michel.yip@gmail.com', 'male', '1996-01-18', 'slowpoke', 'unknown');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
