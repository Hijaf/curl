-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 27 Janvier 2013 à 03:03
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `codeigniter`
--

-- --------------------------------------------------------

--
-- Structure de la table `ci_curl`
--

CREATE TABLE IF NOT EXISTS `ci_curl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `urlSite` text NOT NULL,
  `temps` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Contenu de la table `ci_curl`
--

INSERT INTO `ci_curl` (`id`, `titre`, `description`, `image`, `urlSite`, `temps`) VALUES
(20, '   Bonjour Madame', ' Ici aussi il y a une description', 'http://25.media.tumblr.com/tumblr_mcrq75PHxF1qzy9ouo1_r2_500.jpg', '', 1351996326),
(22, 'Bonjour Madame', 'MADAME SEPTEMBRE La Madame de Jean-Briac, avec son sourire, son naturel, et sa Madamitude incroyable a tout emporté sur son passage. Découvrez Madame Septembre ! MADAME SEPTEMBER The Jean-Briac''s...', 'http://24.media.tumblr.com/tumblr_mcww8sMyTU1qzy9ouo1_500.jpg', '', 1351997589),
(23, 'Bonjour Madame: Archives', 'Pas de description pour Bonjour Madame: Archives', 'http://24.media.tumblr.com/tumblr_mb95m2OBJe1qzy9ouo1_r1_250.jpg', '', 1351997764),
(26, '  Bonjour Madame: Archives', ' Bah mnt il y a une description! =D', 'http://25.media.tumblr.com/tumblr_mb8dqf5nC91qzy9ouo1_250.jpg', '', 1351998084),
(32, 'Bonjour Madame', 'MADAME SEPTEMBRE La Madame de Jean-Briac, avec son sourire, son naturel, et sa Madamitude incroyable a tout emporté sur son passage. Découvrez Madame Septembre ! MADAME SEPTEMBER The Jean-Briac''s...', 'http://24.media.tumblr.com/tumblr_mcww9ruEld1qzy9ouo1_500.jpg', '', 1352066757),
(34, 'Kikk Festival - International Digital Festival - Accueil', 'Le KIKK est un festival international des cultures numériques et créatives qui explore les implications économiques et artistiques des nouvelles technologies.  A la croisée de la technologie, des arts visuels, de la musique, de l''architecture, du design et des médias interactifs, KIKK sonde le sujet en intégralité à travers des Konferences, disKussions, eKsperiences, worKshops, un Kontest et une soirée de Kocktail.  ', 'http://www.kikk.be/2012/files/library/speakers/espada-y-santa-cruz.png', '', 1352067044),
(35, ' Bonjour Madame', 'a change in the text', 'http://24.media.tumblr.com/tumblr_mcyzsbrvDH1qzy9ouo1_500.jpg', '', 1352157476),
(36, 'Bonjour Madame', 'QUI SERA MADAME DECEMBRE ? Dernière Madame de l''année, votez vite pour votre Madame DECEMBRE avant le fabuleux-fou-incroyable vote de Madame 2012 ! Vous avez jusqu''au 08/01 minuit ! >> CLICK WHO IS...', 'http://25.media.tumblr.com/a10115557777c0ffc51e4c91d27f145b/tumblr_mfwla2doM41qzy9ouo1_500.jpg', '', 1357580041),
(37, '      Bonjour Madame', ' Un petit text tranquille histoire de voir comment ca se met en page tac tac quoi', 'http://25.media.tumblr.com/860b93c093c31ebba2a1a858368b1f15/tumblr_mfwljx7lWu1qzy9ouo1_500.jpg', '', 1359153897),
(41, 'Bonjour Madame', 'L''ULTIME MADAME DE 2012 C''est le vote de l''année, l''événement que vous ne pouvez pas rater : il va falloir élire la MADAME DE L''ANNEE 2012. Cliquez ! THE ULTIMATE MADAME It''s the vote of the year, the...', 'http://24.media.tumblr.com/2781e473aa2fb1028797342cc0cca32b/tumblr_mfwllqfxLm1qzy9ouo1_500.jpg', '', 1359248616),
(42, 'Bonjour Mademoiselle', 'Un jour, une belle demoiselle', 'http://25.media.tumblr.com/tumblr_me1ttvqbVv1qmcbw0o1_500.jpg', '', 1359249451),
(45, 'JEUXVIDEO.COM - La Référence des Jeux Vidéo sur PC et Consoles !', 'le magazine online en français jeuxvideo.com est spécialisé en solution de jeux vidéo (pc et consoles) et dernières news. preview et test jeu PC, playstation PS3 et PS2, xbox 360, Nintendo Wii et DS, PSP, et iPhone ', 'http://image.jeuxvideo.com/images/ip/m/i/might-magic-clash-of-heroes-iphone-ipod-00z.jpg', '', 1359252455);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
