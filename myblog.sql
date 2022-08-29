-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 15 juil. 2022 à 20:03
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `myblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'front-end'),
(2, 'back-end'),
(3, 'design'),
(4, 'network');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `creatorId` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `datePublished` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateUpdated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `frk_posts_users_idx` (`creatorId`),
  KEY `frk_posts_categories_idx` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `creatorId`, `title`, `content`, `datePublished`, `dateUpdated`, `cid`) VALUES
(1, 2, 'Vue vs. React — Which One To Choose in 2022?\r\n', 'Vue.js and React.js are JavaScript-based toolkit systems. They help build dynamic user interfaces. Regarding their concept, the whole UI is the data, and every change leads to new functions. These functions are refreshing certain page blocks, commonly known as UI components.\r\n\r\nIn Vue.js and React.js, components are the pieces of JavaScript and HTML code organised into one file. The components have similar hierarchy principles, with parents and children, who could pass the data to each other.\r\n\r\nTo find out the distinctive features between React and Vue.js, we should take these criteria into account:', '2022-06-23 02:33:20', '2022-06-23 02:33:53', 1),
(2, 1, '	\r\nPHP – Le design pattern Flyweight', 'Soyons honnêtes, si vous êtes un développeur web, les chances pour que vous ayez à utiliser le design pattern Flyweight en PHP sont assez minces, en raison du fait que Flyweight est surtout utile quand vous avez un très grand nombre d’objets en RAM et qu’il vous est important d’en économiser l’instanciation, ce qui arrive rarement lorsque vous développez (bien !) une application web. Vous le trouverez davantage dans des domaines comme les traitements de texte ou les jeux vidéo qui utilisent des environnements multi-tâches (multithreaded). En PHP, le multithreading est à ce jour utilisable seulement en ligne de commande, pas dans un environnement de serveur Web.\r\n\r\nCela ne signifie pas pour autant que ce design pattern n’est JAMAIS utilisé, il est par exemple implémenté dans l’ORM Doctrine, pour la gestion des types.', '2022-06-23 02:35:16', '2022-06-23 02:35:41', 2),
(3, 2, 'Learn JavaScript by building real-world apps', 'One of the best courses on Udemy. Clear teaching, good pacing, useful exercises and great attention to detail add up to an excellent experience. My only complaint is the last \"extra\" section on cutting edge javascript is confusing and really slowed my learning momentum with Javascript. In fact, I haven\'t finished the course because of that section. I realized it was added to give us more, but in this case \"more is less.\" It should be a different course.', '2022-06-23 15:33:57', '2022-06-23 15:33:57', 1),
(7, 2, 'blog3', 'back end blog2.', '2022-07-15 19:13:33', '2022-07-15 19:13:33', 3);

-- --------------------------------------------------------

--
-- Structure de la table `posts_tags`
--

DROP TABLE IF EXISTS `posts_tags`;
CREATE TABLE IF NOT EXISTS `posts_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(10) UNSIGNED NOT NULL,
  `tagId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_id__tag_id` (`postId`,`tagId`),
  KEY `frk_posts_tags_tagid_idx` (`tagId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts_tags`
--

INSERT INTO `posts_tags` (`id`, `postId`, `tagId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(4, 'Javascript'),
(3, 'PHP'),
(1, 'React'),
(5, 'UI'),
(6, 'UX'),
(2, 'Vue');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `userType` enum('public','author','admin') DEFAULT NULL,
  `dateAdded` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `userType`, `dateAdded`) VALUES
(1, 'victorcao', '$2y$10$pRNa9c2zpI.TIDttqjqAO.DB5UnW31Y4Ku77eQA36qw9kA7JgPDCe', 'victorcao@gmail.com', 'admin', '2022-06-23 02:19:37'),
(2, 'lisass', '$2y$10$UVg04crxt.qyDgqgbvy9PeCHI2H/O60ZQth5f/uYC7bBMe3SAquca', 'lisa@hotmail.com', 'author', '2022-06-23 02:21:00'),
(3, 'ericnode', '$2y$10$.1cj9RjAIKLiJXIJizLIgOYj.khcNqsZvP/xWUgm6pibg3S8FGgsa', 'eric@outlook.com', 'public', '2022-06-23 02:21:59');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `frk_posts_categories` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `frk_posts_users` FOREIGN KEY (`creatorId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD CONSTRAINT `frk_posts_tags_postid` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `frk_posts_tags_tagid` FOREIGN KEY (`tagId`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
