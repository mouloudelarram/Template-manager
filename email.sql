-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 juin 2022 à 20:52
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `email`
--
CREATE DATABASE IF NOT EXISTS `email` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `email`;

-- --------------------------------------------------------

--
-- Structure de la table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `too` varchar(300) NOT NULL,
  `fromm` varchar(300) NOT NULL,
  `objet` varchar(300) NOT NULL,
  `message` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `history`
--

INSERT INTO `history` (`id`, `iduser`, `too`, `fromm`, `objet`, `message`) VALUES
(31, 0, 'boujemaoui.ayoub654@gmail.com', 'acc8.afbl621@gmail.com', 'Réinitialiser votre mot de passe ?', 'Vous recevez beaucoup de emails de réinitialisation ?Vous pouvez changer vos paramètres de compte afin de demander des informations personnelles pour réinitialiser votre mot de passe.'),
(32, 0, 'boujemaoui.ayoub654@gmail.com', 'acc8.afbl621@gmail.com', 'test finale 001', 'soutenance'),
(33, 0, 'boujemaoui.ayoub654@gmail.com', 'acc8.afbl621@gmail.com', 'Réinitialiser votre mot de passe ?', 'Vous recevez beaucoup de emails de réinitialisation ?Vous pouvez changer vos paramètres de compte afin de demander des informations personnelles pour réinitialiser votre mot de passe.'),
(34, 3, 'boujemaoui.ayoub654@gmail.com', 'acc8.afbl621@gmail.com', 'zizo', 'dsndhfjhdjfhdjfhfjd'),
(35, 3, 'boujemaoui.ayoub654@gmail.com', 'acc8.afbl621@gmail.com', 'teste 001 ', 'lolo '),
(36, 3, 'boujemaoui.ayoub654@gmail.com', 'hamzakarkoouri89@gmail.com', 'teste 001 ', 'lolo '),
(37, 0, 'boujemaoui.ayoub654@gmail.com', 'acc8.afbl621@gmail.com', 'zizo', 'zizo s,ndndbfndbfndbfnd'),
(38, 0, 'boujemaoui.ayoub654@gmail.com', 'acc8.afbl621@gmail.com', 'zizo', 'zizo222222'),
(39, 0, 'boujemaoui.ayoub654@gmail.com', 'acc8.afbl621@gmail.com', 'zizo008', 'zizo008'),
(40, 3, 'boujemaoui.ayoub654@gmail.com', 'acc8.afbl621@gmail.com', 'zizo', 'zizo02'),
(41, 3, 'boujemaoui.ayoub654@gmail.com', 'acc8.afbl621@gmail.com', 'zizo', 'zizo00008'),
(42, 3, 'boujemaoui.ayoub654@gmail.com', 'acc8.afbl621@gmail.com', 'test finale 008', 'tttttttttteste fin '),
(43, 3, 'boujemaoui.ayoub654@gmail.com', 'acc8.afbl621@gmail.com', 'zizo', 'zizo'),
(44, 3, 'boujemaoui.ayoub654@gmail.com', 'acc8.afbl621@gmail.com', 'zizo', 'zizo');

-- --------------------------------------------------------

--
-- Structure de la table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `objet` varchar(300) NOT NULL,
  `message` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `template`
--

INSERT INTO `template` (`id`, `iduser`, `objet`, `message`) VALUES
(3, 0, 'Réinitialiser votre mot de passe ?', 'Vous recevez beaucoup d\'emails de réinitialisation ?\r\nVous pouvez changer vos paramètres de compte afin de demander des informations personnelles pour réinitialiser votre mot de passe.\r\n'),
(8, 10, 'd;s;ds; ', 'dsdsdsdsdsds111'),
(10, 3, 'Réinitialiser votre mot de passe ?', 'Vous recevez beaucoup de emails de réinitialisation ?Vous pouvez changer vos paramètres de compte afin de demander des informations personnelles pour réinitialiser votre mot de passe.'),
(11, 3, 'teste 001 ', 'lolo ');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(3, 'ayoub', 'ayoub', 'ayoub'),
(5, 'aya', 'aya', 'aya'),
(12, 'ayoub', 'boujemaoui', 'ayoub');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
