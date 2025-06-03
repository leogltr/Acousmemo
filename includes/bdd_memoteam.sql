-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 29 jan. 2024 à 09:09
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_memoteam`
--

--
-- Structure de la table `sound`
--

CREATE TABLE `sound` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `frequency` int(10) NOT NULL,
  `time` int(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) DEFAULT NULL,
  `genre` varchar(200) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `instrument` varchar(100) DEFAULT NULL,
  `solfege` varchar(100) DEFAULT NULL,
  `musique` varchar(100) DEFAULT NULL,
  `pathologie` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `nb_move` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `game_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pair`
--

CREATE TABLE `pair` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_sound` int(10) NOT NULL,
  `id_game` int(10) NOT NULL,
  `nb_error` int(10) NOT NULL,
  `found_order` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `pair_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `game` (`id`),
  CONSTRAINT `pair_ibfk_2` FOREIGN KEY (`id_sound`) REFERENCES `sound` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

CREATE TABLE `association` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_sound_first` int(10) NOT NULL,
  `id_sound_second` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `association_ibfk_2` FOREIGN KEY (`id_sound_first`) REFERENCES `sound` (`id`),
  CONSTRAINT `association_ibfk_3` FOREIGN KEY (`id_sound_second`) REFERENCES `sound` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------


-- Insertion de valeurs par défaut
-- INSERT INTO `sound` (`frequency`, `time`, `type`) VALUES
-- (349, 1200, 'sine'),
-- (349, 1200, 'sawtooth'),
-- (810, 1200, 'sine'),
-- (810, 1200, 'sawtooth'),
-- (440, 1200, 'sawtooth'),
-- (440, 1200, 'sine'),
-- (679, 1200, 'sine'),
-- (679, 1200, 'sawtooth'),
-- (523, 1200, 'sawtooth'),
-- (769, 1200, 'sawtooth'),
-- (769, 1200, 'sine'),
-- (523, 1200, 'sine');

INSERT INTO `sound` (`frequency`, `time`, `type`) VALUES
(349, 1200, 'sine'),
(349, 1200, 'sawtooth'),
(349, 1200, 'square'),
(440, 1200, 'sine'),
(440, 1200, 'sawtooth'),
(440, 1200, 'square'),
(523, 1200, 'sine'),
(523, 1200, 'sawtooth'),
(523, 1200, 'square'),
(587, 1200, 'sine'),
(587, 1200, 'sawtooth'),
(587, 1200, 'square');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;