-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 14 sep. 2020 à 16:19
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbsitemvc`
--
CREATE DATABASE IF NOT EXISTS `dbsitemvc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbsitemvc`;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `content`) VALUES
(19, 'Paul', 'c&#39;est qui ?'),
(20, 'robin', 'labo !'),
(29, 'Lean', 'Pourquoi le ciel est-il bleu ?'),
(30, 'Pierre', 'j&#39;arrive Ã  l&#39;aÃ©roport !');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `user` text NOT NULL,
  `pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `user`, `pwd`) VALUES
(1, 'robin', '$2y$10$qpu1/SbkN8qSAK857py3qu7BShIXOntD5HDwwmg6fygC3ctcHqJ.i'),
(4, 'Admin', '$2y$10$wP3hdfMrprjz7jc1oClMdu/azTOWHmfRJwp0v74cOkLeRGaJ1yxHe'),
(32, 'jean', '$2y$10$5YdEJ0Tb76U1bEIFGkVzRuBalx0JCMC.EbxFYrPz9n40SXyUvSgXq'),
(41, 'Eric', '$2y$10$WKxHAofz.2xN33HUCe7jbe5xJrnvViZ0iFeic/xsrpZWcI/DYvbyy'),
(42, 'Lean', '$2y$10$90VBMoDeZ39oec83vmSLzOWzuZDXuJ4zYLNl9PiBmPszDFix74C3i');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
