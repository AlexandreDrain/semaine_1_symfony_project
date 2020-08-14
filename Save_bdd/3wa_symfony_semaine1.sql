-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 14 août 2020 à 13:02
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `3wa_symfony_semaine1`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `src_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `name`, `description`, `src_image`, `alt_image`) VALUES
(1, 'A300', 'Les avions volent', 'assets/images/article/A300.jpg', 'image d\'un A300 de Airbus'),
(2, 'Mercedes', 'Les mercedes sont belles', 'assets/images/article/mercedes_300SL.jpg', 'image de mercedes'),
(3, 'test', 'test', 'assets/images/test/test.jpg', 'image test');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'nourriture'),
(2, 'oiseau'),
(3, 'Console');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_article`
--

DROP TABLE IF EXISTS `commentaire_article`;
CREATE TABLE IF NOT EXISTS `commentaire_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_commentaire` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` datetime NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_71F29C357294869C` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaire_article`
--

INSERT INTO `commentaire_article` (`id`, `user_name`, `user_commentaire`, `published_at`, `article_id`) VALUES
(1, 'Will', 'J\'ai déjà pris cet avion, c\'est conford', '2020-08-04 00:00:00', 1),
(2, 'Tania', 'Mon père a deux Mercedes, bien sûr elles ne sont pas de cette époque mais elles valent bien plus cher !', '2020-08-04 00:00:00', 2),
(3, 'bob', 'bel avion', '2020-08-12 14:48:12', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_produit`
--

DROP TABLE IF EXISTS `commentaire_produit`;
CREATE TABLE IF NOT EXISTS `commentaire_produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_commentaire` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` datetime NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A6D7E744584665A` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaire_produit`
--

INSERT INTO `commentaire_produit` (`id`, `user_name`, `user_commentaire`, `published_at`, `product_id`) VALUES
(1, 'Ted', 'ouai bah c\'est trop bien les tomates sont mûres', '2020-08-12 00:00:00', 1),
(2, 'Marco', 'ouai bah c\'est trop bien les pigeon sont obéissant', '2020-08-12 00:00:00', 4),
(3, 'Fred', 'ouai bah c\'est trop bien les mangue son bonnes', '2020-08-12 00:00:00', 2),
(4, 'François', 'ouai bah c\'est trop bien les steaks sont tendre et je les mange avec de la moutarde c\'est excellent', '2020-08-12 00:00:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `telephone`, `email`) VALUES
(1, 'Jardiland', '01 60 60 84 48', 'jardilandLieusaint@entrepriseAnimauxEtc.com');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20200811134139', '2020-08-11 13:42:07', 447),
('DoctrineMigrations\\Version20200811141907', '2020-08-11 14:19:10', 60),
('DoctrineMigrations\\Version20200812074116', '2020-08-12 07:41:21', 339),
('DoctrineMigrations\\Version20200812095650', '2020-08-12 09:56:54', 33),
('DoctrineMigrations\\Version20200812132151', '2020-08-12 13:22:00', 350),
('DoctrineMigrations\\Version20200812132258', '2020-08-12 13:23:07', 76),
('DoctrineMigrations\\Version20200812133317', '2020-08-12 13:33:20', 71),
('DoctrineMigrations\\Version20200814123258', '2020-08-14 12:33:06', 360);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04ADA21214B7` (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `title`, `description`, `price`, `image`, `alt`) VALUES
(1, 1, 'Tomate', 'Voici une tomate de qualité  Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias voluptatibus odio animi sapiente facere numquam accusantium totam placeat eos inventore voluptate laudantium, quo, amet vitae libero aspernatur beatae ducimus unde.', '1', 'assets/images/produits/tomate.jpg', 'image qui illustre le produit'),
(2, 1, 'Mangue', 'Voici une mangue de qualité  Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias voluptatibus odio animi sapiente facere numquam accusantium totam placeat eos inventore voluptate laudantium, quo, amet vitae libero aspernatur beatae ducimus unde.\r\n', '2', 'assets/images/produits/mangue.jpg', 'image qui illustre le produit'),
(3, 1, 'Steaks', 'Voici des steaks de qualité Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias voluptatibus odio animi sapiente facere numquam accusantium totam placeat eos inventore voluptate laudantium, quo, amet vitae libero aspernatur beatae ducimus unde.', '5', 'assets/images/produits/steaks.jpg', 'image qui illustre le produit'),
(4, 2, 'Pigeon', 'Voici un pigeon de qualité parce que le saviez vous ? Les pigeons ne sont pas tous moche, ils y en a des plus jolie que d\'autre et Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus distinctio temporibus sequi eligendi consequatur odio officiis amet repudiandae dolor, aliquid a et, asperiores pariatur eveniet. Sed inventore quibusdam tenetur sint.', '100', 'assets/images/produits/pigeon.jpg', 'image qui illustre le produit'),
(5, 3, 'PS5', 'C\'est une console qui s\'annonce super ! oui', '500', 'assets/images/produit/ps5.jpg', 'image de la futur console de Sony la PS5');

-- --------------------------------------------------------

--
-- Structure de la table `product_image_relative`
--

DROP TABLE IF EXISTS `product_image_relative`;
CREATE TABLE IF NOT EXISTS `product_image_relative` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B2C2C75D4584665A` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_image_relative`
--

INSERT INTO `product_image_relative` (`id`, `product_id`, `name`, `src_image`, `alt_image`) VALUES
(1, 2, 'image_relative_mangue', 'assets/images/produits/mangue/mangue1.jpg', 'image de mangue'),
(2, 2, 'image_relative_mangue', 'assets/images/produits/mangue/mangue2.jpg', 'image de mangue'),
(3, 1, 'image_relative_tomate', 'assets/images/produits/tomate/tomate1.jpg', 'image de tomate'),
(4, 1, 'image_relative_tomate', 'assets/images/produits/tomate/tomate2.jpg', 'image de tomate'),
(5, 3, 'image_relative_steaks', 'assets/images/produits/steaks/steaks1.jpg', 'image de steaks'),
(6, 3, 'image_relative_steaks', 'assets/images/produits/steaks/steaks2.jpg', 'image de steaks'),
(7, 4, 'image_relative_pigeon', 'assets/images/produits/pigeon/pigeon1.jpg', 'image de pigeon'),
(8, 4, 'image_relative_pigeon', 'assets/images/produits/pigeon/pigeon2.jpg', 'image de pigeon');

-- --------------------------------------------------------

--
-- Structure de la table `qui_sommes_nous`
--

DROP TABLE IF EXISTS `qui_sommes_nous`;
CREATE TABLE IF NOT EXISTS `qui_sommes_nous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `qui_sommes_nous`
--

INSERT INTO `qui_sommes_nous` (`id`, `first_name`, `name`, `email`, `pdp`, `description`) VALUES
(1, 'Alexandra', 'Style', 'alexandraCestMoi@gmail.com', 'assets/images/moi/moi.jpg', 'Lorem ipsum dolor sit amet vive symfony adipisicing elit. Impedit vero expedita aliquam quas natus suscipit corporis earum labore! Nesciunt totam ab temporibus saepe, mollitia assumenda nemo qui ipsa id ullam?');

-- --------------------------------------------------------

--
-- Structure de la table `received_messages`
--

DROP TABLE IF EXISTS `received_messages`;
CREATE TABLE IF NOT EXISTS `received_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `received_messages`
--

INSERT INTO `received_messages` (`id`, `title`, `description`, `first_name`, `email`) VALUES
(1, 'jpp de ce que je comprends pas', 'Bah ouuai j\'ai crue que je pouvais enchaîner les paramètre mais non', 'Alexandre', 'alexandre@gmail.com'),
(2, 'bhfizefguzef', 'neofhpzoufhiuzhfizefzfzfezf', 'Alexandre', 'truc@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`id`, `name_image`, `src_image`, `alt_image`) VALUES
(1, 'forest', 'assets/images/image1.jpg', 'image d\'une forêt avec des oiseaux qui volent dans le ciel'),
(2, 'castle', 'assets/images/image2.jpg', 'Château dans la brume'),
(3, 'mountains', 'assets/images/image3.jpg', 'Des montagnes');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire_article`
--
ALTER TABLE `commentaire_article`
  ADD CONSTRAINT `FK_71F29C357294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

--
-- Contraintes pour la table `commentaire_produit`
--
ALTER TABLE `commentaire_produit`
  ADD CONSTRAINT `FK_5A6D7E744584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04ADA21214B7` FOREIGN KEY (`categories_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `product_image_relative`
--
ALTER TABLE `product_image_relative`
  ADD CONSTRAINT `FK_B2C2C75D4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
