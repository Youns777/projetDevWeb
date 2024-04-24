-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 22 avr. 2024 à 16:30
-- Version du serveur : 8.0.36-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ShopTaSneakers`
--

-- --------------------------------------------------------

--
-- Structure de la table `Chaussures`
--

CREATE TABLE `Chaussures` (
  `id_chaussure` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `marque` varchar(100) DEFAULT NULL,
  `taille` int NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `section` enum('Homme','Femme','Enfant') NOT NULL,
  `Couleur` varchar(20) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `matiere` varchar(30) NOT NULL,
  `stock` int NOT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Chaussures`
--

INSERT INTO `Chaussures` (`id_chaussure`, `nom`, `marque`, `taille`, `prix`, `section`, `Couleur`, `Type`, `image`, `matiere`, `stock`, `description`) VALUES
(1, 'Nike Air Force 1', 'Nike', 40, '79.99', 'Homme', 'Blanche', 'Lifestyle', 'img/produit1.jpg', 'Cuir', 50, 'La Nike Air Force 1 est une chaussure emblématique qui allie style et confort. Parfaite pour toutes les occasions.'),
(2, 'Nike Air Force 1', 'Nike', 41, '79.99', 'Homme', 'Blanche', 'Lifestyle', 'img/produit1.jpg', 'Cuir', 50, 'La Nike Air Force 1 est une chaussure emblématique qui allie style et confort. Parfaite pour toutes les occasions.'),
(3, 'Nike Air Force 1', 'Nike', 42, '79.99', 'Homme', 'Blanche', 'Lifestyle', 'img/produit1.jpg', 'Cuir', 50, 'La Nike Air Force 1 est une chaussure emblématique qui allie style et confort. Parfaite pour toutes les occasions.'),
(4, 'Nike Air Force 1', 'Nike', 43, '79.99', 'Homme', 'Blanche', 'Lifestyle', 'img/produit1.jpg', 'Cuir', 50, 'La Nike Air Force 1 est une chaussure emblématique qui allie style et confort. Parfaite pour toutes les occasions.'),
(5, 'Nike Air Force 1', 'Nike', 44, '79.99', 'Homme', 'Blanche', 'Lifestyle', 'img/produit1.jpg', 'Cuir', 50, 'La Nike Air Force 1 est une chaussure emblématique qui allie style et confort. Parfaite pour toutes les occasions.'),
(6, 'Nike Air Force 1', 'Nike', 45, '79.99', 'Homme', 'Blanche', 'Lifestyle', 'img/produit1.jpg', 'Cuir', 50, 'La Nike Air Force 1 est une chaussure emblématique qui allie style et confort. Parfaite pour toutes les occasions.'),
(7, 'Nike Air Force 1', 'Nike', 46, '79.99', 'Homme', 'Blanche', 'Lifestyle', 'img/produit1.jpg', 'Cuir', 50, 'La Nike Air Force 1 est une chaussure emblématique qui allie style et confort. Parfaite pour toutes les occasions.'),
(8, 'Nike Air Force 1', 'Nike', 47, '79.99', 'Homme', 'Blanche', 'Lifestyle', 'img/produit1.jpg', 'Cuir', 50, 'La Nike Air Force 1 est une chaussure emblématique qui allie style et confort. Parfaite pour toutes les occasions.'),
(9, 'Nike Air Force 1', 'Nike', 48, '79.99', 'Homme', 'Blanche', 'Lifestyle', 'img/produit1.jpg', 'Cuir', 50, 'La Nike Air Force 1 est une chaussure emblématique qui allie style et confort. Parfaite pour toutes les occasions.'),
(10, 'Nike Air Force 1', 'Nike', 49, '79.99', 'Homme', 'Blanche', 'Lifestyle', 'img/produit1.jpg', 'Cuir', 50, 'La Nike Air Force 1 est une chaussure emblématique qui allie style et confort. Parfaite pour toutes les occasions.'),
(11, 'Nike Air Max Dn', 'Nike', 40, '159.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure2.jpg', 'Synthétique', 50, 'La Nike Air Max Dn est une chaussure de sport polyvalente avec un design moderne et une technologie d\'amorti exceptionnelle.'),
(12, 'Nike Air Max Dn', 'Nike', 41, '159.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure2.jpg', 'Synthétique', 50, 'La Nike Air Max Dn est une chaussure de sport polyvalente avec un design moderne et une technologie d\'amorti exceptionnelle.'),
(13, 'Nike Air Max Dn', 'Nike', 42, '159.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure2.jpg', 'Synthétique', 50, 'La Nike Air Max Dn est une chaussure de sport polyvalente avec un design moderne et une technologie d\'amorti exceptionnelle.'),
(14, 'Nike Air Max Dn', 'Nike', 43, '159.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure2.jpg', 'Synthétique', 50, 'La Nike Air Max Dn est une chaussure de sport polyvalente avec un design moderne et une technologie d\'amorti exceptionnelle.'),
(15, 'Nike Air Max Dn', 'Nike', 44, '159.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure2.jpg', 'Synthétique', 50, 'La Nike Air Max Dn est une chaussure de sport polyvalente avec un design moderne et une technologie d\'amorti exceptionnelle.'),
(16, 'Nike Air Max Dn', 'Nike', 45, '159.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure2.jpg', 'Synthétique', 50, 'La Nike Air Max Dn est une chaussure de sport polyvalente avec un design moderne et une technologie d\'amorti exceptionnelle.'),
(17, 'Nike Air Max Dn', 'Nike', 46, '159.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure2.jpg', 'Synthétique', 50, 'La Nike Air Max Dn est une chaussure de sport polyvalente avec un design moderne et une technologie d\'amorti exceptionnelle.'),
(18, 'Nike Air Max Dn', 'Nike', 47, '159.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure2.jpg', 'Synthétique', 50, 'La Nike Air Max Dn est une chaussure de sport polyvalente avec un design moderne et une technologie d\'amorti exceptionnelle.'),
(19, 'Nike Air Max Dn', 'Nike', 48, '159.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure2.jpg', 'Synthétique', 50, 'La Nike Air Max Dn est une chaussure de sport polyvalente avec un design moderne et une technologie d\'amorti exceptionnelle.'),
(20, 'Nike Air Max Dn', 'Nike', 49, '159.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure2.jpg', 'Synthétique', 50, 'La Nike Air Max Dn est une chaussure de sport polyvalente avec un design moderne et une technologie d\'amorti exceptionnelle.'),
(21, 'Nike Tuned 1 Utility', 'Nike', 40, '129.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure3.jpg', 'Textile', 50, 'La Nike Tuned 1 Utility est une chaussure robuste et résistante, idéale pour les aventures urbaines.'),
(22, 'Nike Tuned 1 Utility', 'Nike', 41, '129.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure3.jpg', 'Textile', 50, 'La Nike Tuned 1 Utility est une chaussure robuste et résistante, idéale pour les aventures urbaines.'),
(23, 'Nike Tuned 1 Utility', 'Nike', 42, '129.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure3.jpg', 'Textile', 50, 'La Nike Tuned 1 Utility est une chaussure robuste et résistante, idéale pour les aventures urbaines.'),
(24, 'Nike Tuned 1 Utility', 'Nike', 43, '129.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure3.jpg', 'Textile', 50, 'La Nike Tuned 1 Utility est une chaussure robuste et résistante, idéale pour les aventures urbaines.'),
(25, 'Nike Tuned 1 Utility', 'Nike', 44, '129.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure3.jpg', 'Textile', 50, 'La Nike Tuned 1 Utility est une chaussure robuste et résistante, idéale pour les aventures urbaines.'),
(26, 'Nike Tuned 1 Utility', 'Nike', 45, '129.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure3.jpg', 'Textile', 50, 'La Nike Tuned 1 Utility est une chaussure robuste et résistante, idéale pour les aventures urbaines.'),
(27, 'Nike Tuned 1 Utility', 'Nike', 46, '129.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure3.jpg', 'Textile', 50, 'La Nike Tuned 1 Utility est une chaussure robuste et résistante, idéale pour les aventures urbaines.'),
(28, 'Nike Tuned 1 Utility', 'Nike', 47, '129.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure3.jpg', 'Textile', 50, 'La Nike Tuned 1 Utility est une chaussure robuste et résistante, idéale pour les aventures urbaines.'),
(29, 'Nike Tuned 1 Utility', 'Nike', 48, '129.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure3.jpg', 'Textile', 50, 'La Nike Tuned 1 Utility est une chaussure robuste et résistante, idéale pour les aventures urbaines.'),
(30, 'Nike Tuned 1 Utility', 'Nike', 49, '129.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure3.jpg', 'Textile', 50, 'La Nike Tuned 1 Utility est une chaussure robuste et résistante, idéale pour les aventures urbaines.'),
(31, 'New Balance 9060', 'New Balance', 40, '119.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure4.jpg', 'Synthétique', 50, 'La New Balance 9060 est une chaussure de course légère et réactive, offrant un excellent soutien et un bon amorti.'),
(32, 'New Balance 9060', 'New Balance', 41, '119.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure4.jpg', 'Synthétique', 50, 'La New Balance 9060 est une chaussure de course légère et réactive, offrant un excellent soutien et un bon amorti.'),
(33, 'New Balance 9060', 'New Balance', 42, '119.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure4.jpg', 'Synthétique', 50, 'La New Balance 9060 est une chaussure de course légère et réactive, offrant un excellent soutien et un bon amorti.'),
(34, 'New Balance 9060', 'New Balance', 43, '119.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure4.jpg', 'Synthétique', 50, 'La New Balance 9060 est une chaussure de course légère et réactive, offrant un excellent soutien et un bon amorti.'),
(35, 'New Balance 9060', 'New Balance', 44, '119.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure4.jpg', 'Synthétique', 50, 'La New Balance 9060 est une chaussure de course légère et réactive, offrant un excellent soutien et un bon amorti.'),
(36, 'New Balance 9060', 'New Balance', 45, '119.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure4.jpg', 'Synthétique', 50, 'La New Balance 9060 est une chaussure de course légère et réactive, offrant un excellent soutien et un bon amorti.'),
(37, 'New Balance 9060', 'New Balance', 46, '119.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure4.jpg', 'Synthétique', 50, 'La New Balance 9060 est une chaussure de course légère et réactive, offrant un excellent soutien et un bon amorti.'),
(38, 'New Balance 9060', 'New Balance', 47, '119.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure4.jpg', 'Synthétique', 50, 'La New Balance 9060 est une chaussure de course légère et réactive, offrant un excellent soutien et un bon amorti.'),
(39, 'New Balance 9060', 'New Balance', 48, '119.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure4.jpg', 'Synthétique', 50, 'La New Balance 9060 est une chaussure de course légère et réactive, offrant un excellent soutien et un bon amorti.'),
(40, 'New Balance 9060', 'New Balance', 49, '119.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure4.jpg', 'Synthétique', 50, 'La New Balance 9060 est une chaussure de course légère et réactive, offrant un excellent soutien et un bon amorti.'),
(41, 'Adidas Ozelia', 'Adidas', 40, '89.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure5.jpg', 'Textile', 50, 'L\'adidas Ozelia est une chaussure élégante et confortable, parfaite pour compléter votre look décontracté.'),
(42, 'Adidas Ozelia', 'Adidas', 41, '89.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure5.jpg', 'Textile', 50, 'L\'adidas Ozelia est une chaussure élégante et confortable, parfaite pour compléter votre look décontracté.'),
(43, 'Adidas Ozelia', 'Adidas', 42, '89.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure5.jpg', 'Textile', 50, 'L\'adidas Ozelia est une chaussure élégante et confortable, parfaite pour compléter votre look décontracté.'),
(44, 'Adidas Ozelia', 'Adidas', 43, '89.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure5.jpg', 'Textile', 50, 'L\'adidas Ozelia est une chaussure élégante et confortable, parfaite pour compléter votre look décontracté.'),
(45, 'Adidas Ozelia', 'Adidas', 44, '89.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure5.jpg', 'Textile', 50, 'L\'adidas Ozelia est une chaussure élégante et confortable, parfaite pour compléter votre look décontracté.'),
(46, 'Adidas Ozelia', 'Adidas', 45, '89.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure5.jpg', 'Textile', 50, 'L\'adidas Ozelia est une chaussure élégante et confortable, parfaite pour compléter votre look décontracté.'),
(47, 'Adidas Ozelia', 'Adidas', 46, '89.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure5.jpg', 'Textile', 50, 'L\'adidas Ozelia est une chaussure élégante et confortable, parfaite pour compléter votre look décontracté.'),
(48, 'Adidas Ozelia', 'Adidas', 47, '89.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure5.jpg', 'Textile', 50, 'L\'adidas Ozelia est une chaussure élégante et confortable, parfaite pour compléter votre look décontracté.'),
(49, 'Adidas Ozelia', 'Adidas', 48, '89.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure5.jpg', 'Textile', 50, 'L\'adidas Ozelia est une chaussure élégante et confortable, parfaite pour compléter votre look décontracté.'),
(50, 'Adidas Ozelia', 'Adidas', 49, '89.99', 'Homme', 'Noir', 'Lifestyle', 'img/chaussure5.jpg', 'Textile', 50, 'L\'adidas Ozelia est une chaussure élégante et confortable, parfaite pour compléter votre look décontracté.'),
(51, 'Asics GEL-NYC', 'Asics', 40, '99.99', 'Homme', 'Beige', 'Lifestyle', 'img/chaussure6.jpg', 'Synthétique', 50, 'L\'Asics GEL-NYC est une chaussure de course polyvalente avec un amorti exceptionnel et une adhérence optimale.'),
(52, 'Asics GEL-NYC', 'Asics', 41, '99.99', 'Homme', 'Beige', 'Lifestyle', 'img/chaussure6.jpg', 'Synthétique', 50, 'L\'Asics GEL-NYC est une chaussure de course polyvalente avec un amorti exceptionnel et une adhérence optimale.'),
(53, 'Asics GEL-NYC', 'Asics', 42, '99.99', 'Homme', 'Beige', 'Lifestyle', 'img/chaussure6.jpg', 'Synthétique', 50, 'L\'Asics GEL-NYC est une chaussure de course polyvalente avec un amorti exceptionnel et une adhérence optimale.'),
(54, 'Asics GEL-NYC', 'Asics', 43, '99.99', 'Homme', 'Beige', 'Lifestyle', 'img/chaussure6.jpg', 'Synthétique', 50, 'L\'Asics GEL-NYC est une chaussure de course polyvalente avec un amorti exceptionnel et une adhérence optimale.'),
(55, 'Asics GEL-NYC', 'Asics', 44, '99.99', 'Homme', 'Beige', 'Lifestyle', 'img/chaussure6.jpg', 'Synthétique', 50, 'L\'Asics GEL-NYC est une chaussure de course polyvalente avec un amorti exceptionnel et une adhérence optimale.'),
(56, 'Asics GEL-NYC', 'Asics', 45, '99.99', 'Homme', 'Beige', 'Lifestyle', 'img/chaussure6.jpg', 'Synthétique', 50, 'L\'Asics GEL-NYC est une chaussure de course polyvalente avec un amorti exceptionnel et une adhérence optimale.'),
(57, 'Asics GEL-NYC', 'Asics', 46, '99.99', 'Homme', 'Beige', 'Lifestyle', 'img/chaussure6.jpg', 'Synthétique', 50, 'L\'Asics GEL-NYC est une chaussure de course polyvalente avec un amorti exceptionnel et une adhérence optimale.'),
(58, 'Asics GEL-NYC', 'Asics', 47, '99.99', 'Homme', 'Beige', 'Lifestyle', 'img/chaussure6.jpg', 'Synthétique', 50, 'L\'Asics GEL-NYC est une chaussure de course polyvalente avec un amorti exceptionnel et une adhérence optimale.'),
(59, 'Asics GEL-NYC', 'Asics', 48, '99.99', 'Homme', 'Beige', 'Lifestyle', 'img/chaussure6.jpg', 'Synthétique', 50, 'L\'Asics GEL-NYC est une chaussure de course polyvalente avec un amorti exceptionnel et une adhérence optimale.'),
(60, 'Asics GEL-NYC', 'Asics', 49, '99.99', 'Homme', 'Beige', 'Lifestyle', 'img/chaussure6.jpg', 'Synthétique', 50, 'L\'Asics GEL-NYC est une chaussure de course polyvalente avec un amorti exceptionnel et une adhérence optimale.'),
(61, 'Timberland Motion 6', 'Timberland', 40, '114.99', 'Homme', 'Beige', 'Classique', 'img/chaussure7.jpg', 'Cuir', 50, 'La Timberland Motion 6 est une chaussure résistante et durable, parfaite pour les activités de plein air.'),
(62, 'Timberland Motion 6', 'Timberland', 41, '114.99', 'Homme', 'Beige', 'Classique', 'img/chaussure7.jpg', 'Cuir', 50, 'La Timberland Motion 6 est une chaussure résistante et durable, parfaite pour les activités de plein air.'),
(63, 'Timberland Motion 6', 'Timberland', 42, '114.99', 'Homme', 'Beige', 'Classique', 'img/chaussure7.jpg', 'Cuir', 50, 'La Timberland Motion 6 est une chaussure résistante et durable, parfaite pour les activités de plein air.'),
(64, 'Timberland Motion 6', 'Timberland', 43, '114.99', 'Homme', 'Beige', 'Classique', 'img/chaussure7.jpg', 'Cuir', 50, 'La Timberland Motion 6 est une chaussure résistante et durable, parfaite pour les activités de plein air.'),
(65, 'Timberland Motion 6', 'Timberland', 44, '114.99', 'Homme', 'Beige', 'Classique', 'img/chaussure7.jpg', 'Cuir', 50, 'La Timberland Motion 6 est une chaussure résistante et durable, parfaite pour les activités de plein air.'),
(66, 'Timberland Motion 6', 'Timberland', 45, '114.99', 'Homme', 'Beige', 'Classique', 'img/chaussure7.jpg', 'Cuir', 50, 'La Timberland Motion 6 est une chaussure résistante et durable, parfaite pour les activités de plein air.'),
(67, 'Timberland Motion 6', 'Timberland', 46, '114.99', 'Homme', 'Beige', 'Classique', 'img/chaussure7.jpg', 'Cuir', 50, 'La Timberland Motion 6 est une chaussure résistante et durable, parfaite pour les activités de plein air.'),
(68, 'Timberland Motion 6', 'Timberland', 47, '114.99', 'Homme', 'Beige', 'Classique', 'img/chaussure7.jpg', 'Cuir', 50, 'La Timberland Motion 6 est une chaussure résistante et durable, parfaite pour les activités de plein air.'),
(69, 'Timberland Motion 6', 'Timberland', 48, '114.99', 'Homme', 'Beige', 'Classique', 'img/chaussure7.jpg', 'Cuir', 50, 'La Timberland Motion 6 est une chaussure résistante et durable, parfaite pour les activités de plein air.'),
(70, 'Timberland Motion 6', 'Timberland', 49, '114.99', 'Homme', 'Beige', 'Classique', 'img/chaussure7.jpg', 'Cuir', 50, 'La Timberland Motion 6 est une chaussure résistante et durable, parfaite pour les activités de plein air.'),
(71, 'Jordan Post Slide', 'Nike', 40, '34.99', 'Homme', 'Noir', 'Claquette', 'img/chaussure8.jpg', 'Synthétique', 50, 'Les Jordan Post Slide sont des sandales légères et confortables, idéales pour se détendre après l\'effort.'),
(72, 'Jordan Post Slide', 'Nike', 41, '34.99', 'Homme', 'Noir', 'Claquette', 'img/chaussure8.jpg', 'Synthétique', 50, 'Les Jordan Post Slide sont des sandales légères et confortables, idéales pour se détendre après l\'effort.'),
(73, 'Jordan Post Slide', 'Nike', 42, '34.99', 'Homme', 'Noir', 'Claquette', 'img/chaussure8.jpg', 'Synthétique', 50, 'Les Jordan Post Slide sont des sandales légères et confortables, idéales pour se détendre après l\'effort.'),
(74, 'Jordan Post Slide', 'Nike', 43, '34.99', 'Homme', 'Noir', 'Claquette', 'img/chaussure8.jpg', 'Synthétique', 50, 'Les Jordan Post Slide sont des sandales légères et confortables, idéales pour se détendre après l\'effort.'),
(75, 'Jordan Post Slide', 'Nike', 44, '34.99', 'Homme', 'Noir', 'Claquette', 'img/chaussure8.jpg', 'Synthétique', 50, 'Les Jordan Post Slide sont des sandales légères et confortables, idéales pour se détendre après l\'effort.'),
(76, 'Jordan Post Slide', 'Nike', 45, '34.99', 'Homme', 'Noir', 'Claquette', 'img/chaussure8.jpg', 'Synthétique', 50, 'Les Jordan Post Slide sont des sandales légères et confortables, idéales pour se détendre après l\'effort.'),
(77, 'Jordan Post Slide', 'Nike', 46, '34.99', 'Homme', 'Noir', 'Claquette', 'img/chaussure8.jpg', 'Synthétique', 50, 'Les Jordan Post Slide sont des sandales légères et confortables, idéales pour se détendre après l\'effort.'),
(78, 'Jordan Post Slide', 'Nike', 47, '34.99', 'Homme', 'Noir', 'Claquette', 'img/chaussure8.jpg', 'Synthétique', 50, 'Les Jordan Post Slide sont des sandales légères et confortables, idéales pour se détendre après l\'effort.'),
(79, 'Jordan Post Slide', 'Nike', 48, '34.99', 'Homme', 'Noir', 'Claquette', 'img/chaussure8.jpg', 'Synthétique', 50, 'Les Jordan Post Slide sont des sandales légères et confortables, idéales pour se détendre après l\'effort.'),
(80, 'Jordan Post Slide', 'Nike', 49, '34.99', 'Homme', 'Noir', 'Claquette', 'img/chaussure8.jpg', 'Synthétique', 50, 'Les Jordan Post Slide sont des sandales légères et confortables, idéales pour se détendre après l\'effort.'),
(81, 'Nike Air Max 97', 'Nike', 40, '129.99', 'Femme', 'Gris', 'Lifestyle', 'img/chaussure1f.jpg', 'Textile', 50, 'La Nike Air Max 97 est une chaussure emblématique avec un design futuriste.'),
(82, 'Nike Air Max 97', 'Nike', 41, '129.99', 'Femme', 'Gris', 'Lifestyle', 'img/chaussure1f.jpg', 'Textile', 50, 'La Nike Air Max 97 est une chaussure emblématique avec un design futuriste.'),
(83, 'Nike Air Max 97', 'Nike', 42, '129.99', 'Femme', 'Gris', 'Lifestyle', 'img/chaussure1f.jpg', 'Textile', 50, 'La Nike Air Max 97 est une chaussure emblématique avec un design futuriste.'),
(84, 'Nike Air Max 97', 'Nike', 43, '129.99', 'Femme', 'Gris', 'Lifestyle', 'img/chaussure1f.jpg', 'Textile', 50, 'La Nike Air Max 97 est une chaussure emblématique avec un design futuriste.'),
(85, 'Nike Air Max 97', 'Nike', 44, '129.99', 'Femme', 'Gris', 'Lifestyle', 'img/chaussure1f.jpg', 'Textile', 50, 'La Nike Air Max 97 est une chaussure emblématique avec un design futuriste.'),
(86, 'Nike Air Max 97', 'Nike', 45, '129.99', 'Femme', 'Gris', 'Lifestyle', 'img/chaussure1f.jpg', 'Textile', 50, 'La Nike Air Max 97 est une chaussure emblématique avec un design futuriste.'),
(87, 'Nike Air Max 97', 'Nike', 46, '129.99', 'Femme', 'Gris', 'Lifestyle', 'img/chaussure1f.jpg', 'Textile', 50, 'La Nike Air Max 97 est une chaussure emblématique avec un design futuriste.'),
(88, 'Nike Air Max 97', 'Nike', 47, '129.99', 'Femme', 'Gris', 'Lifestyle', 'img/chaussure1f.jpg', 'Textile', 50, 'La Nike Air Max 97 est une chaussure emblématique avec un design futuriste.'),
(89, 'Nike Air Max 97', 'Nike', 48, '129.99', 'Femme', 'Gris', 'Lifestyle', 'img/chaussure1f.jpg', 'Textile', 50, 'La Nike Air Max 97 est une chaussure emblématique avec un design futuriste.'),
(90, 'Nike Air Max 97', 'Nike', 49, '129.99', 'Femme', 'Gris', 'Lifestyle', 'img/chaussure1f.jpg', 'Textile', 50, 'La Nike Air Max 97 est une chaussure emblématique avec un design futuriste.'),
(91, 'adidas Superstar XLG', 'Adidas', 40, '79.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure2f.jpg', 'Cuir', 50, 'Les adidas Superstar XLG sont des chaussures classiques et intemporelles, parfaites pour compléter votre style urbain.'),
(92, 'adidas Superstar XLG', 'Adidas', 41, '79.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure2f.jpg', 'Cuir', 50, 'Les adidas Superstar XLG sont des chaussures classiques et intemporelles, parfaites pour compléter votre style urbain.'),
(93, 'adidas Superstar XLG', 'Adidas', 42, '79.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure2f.jpg', 'Cuir', 50, 'Les adidas Superstar XLG sont des chaussures classiques et intemporelles, parfaites pour compléter votre style urbain.'),
(94, 'adidas Superstar XLG', 'Adidas', 43, '79.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure2f.jpg', 'Cuir', 50, 'Les adidas Superstar XLG sont des chaussures classiques et intemporelles, parfaites pour compléter votre style urbain.'),
(95, 'adidas Superstar XLG', 'Adidas', 44, '79.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure2f.jpg', 'Cuir', 50, 'Les adidas Superstar XLG sont des chaussures classiques et intemporelles, parfaites pour compléter votre style urbain.'),
(96, 'adidas Superstar XLG', 'Adidas', 45, '79.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure2f.jpg', 'Cuir', 50, 'Les adidas Superstar XLG sont des chaussures classiques et intemporelles, parfaites pour compléter votre style urbain.'),
(97, 'adidas Superstar XLG', 'Adidas', 46, '79.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure2f.jpg', 'Cuir', 50, 'Les adidas Superstar XLG sont des chaussures classiques et intemporelles, parfaites pour compléter votre style urbain.'),
(98, 'adidas Superstar XLG', 'Adidas', 47, '79.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure2f.jpg', 'Cuir', 50, 'Les adidas Superstar XLG sont des chaussures classiques et intemporelles, parfaites pour compléter votre style urbain.'),
(99, 'adidas Superstar XLG', 'Adidas', 48, '79.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure2f.jpg', 'Cuir', 50, 'Les adidas Superstar XLG sont des chaussures classiques et intemporelles, parfaites pour compléter votre style urbain.'),
(100, 'adidas Superstar XLG', 'Adidas', 49, '79.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure2f.jpg', 'Cuir', 50, 'Les adidas Superstar XLG sont des chaussures classiques et intemporelles, parfaites pour compléter votre style urbain.'),
(101, 'Nike 1 Mid', 'Nike', 40, '104.99', 'Femme', 'Violet', 'Lifestyle', 'img/chaussure3f.jpg', 'Textile', 50, 'Les Nike 1 Mid sont des chaussures polyvalentes avec un design élégant et un confort exceptionnel pour une utilisation quotidienne.'),
(102, 'Nike 1 Mid', 'Nike', 41, '104.99', 'Femme', 'Violet', 'Lifestyle', 'img/chaussure3f.jpg', 'Textile', 50, 'Les Nike 1 Mid sont des chaussures polyvalentes avec un design élégant et un confort exceptionnel pour une utilisation quotidienne.'),
(103, 'Nike 1 Mid', 'Nike', 42, '104.99', 'Femme', 'Violet', 'Lifestyle', 'img/chaussure3f.jpg', 'Textile', 50, 'Les Nike 1 Mid sont des chaussures polyvalentes avec un design élégant et un confort exceptionnel pour une utilisation quotidienne.'),
(104, 'Nike 1 Mid', 'Nike', 43, '104.99', 'Femme', 'Violet', 'Lifestyle', 'img/chaussure3f.jpg', 'Textile', 50, 'Les Nike 1 Mid sont des chaussures polyvalentes avec un design élégant et un confort exceptionnel pour une utilisation quotidienne.'),
(105, 'Nike 1 Mid', 'Nike', 44, '104.99', 'Femme', 'Violet', 'Lifestyle', 'img/chaussure3f.jpg', 'Textile', 50, 'Les Nike 1 Mid sont des chaussures polyvalentes avec un design élégant et un confort exceptionnel pour une utilisation quotidienne.'),
(106, 'Nike 1 Mid', 'Nike', 45, '104.99', 'Femme', 'Violet', 'Lifestyle', 'img/chaussure3f.jpg', 'Textile', 50, 'Les Nike 1 Mid sont des chaussures polyvalentes avec un design élégant et un confort exceptionnel pour une utilisation quotidienne.'),
(107, 'Nike 1 Mid', 'Nike', 46, '104.99', 'Femme', 'Violet', 'Lifestyle', 'img/chaussure3f.jpg', 'Textile', 50, 'Les Nike 1 Mid sont des chaussures polyvalentes avec un design élégant et un confort exceptionnel pour une utilisation quotidienne.'),
(108, 'Nike 1 Mid', 'Nike', 47, '104.99', 'Femme', 'Violet', 'Lifestyle', 'img/chaussure3f.jpg', 'Textile', 50, 'Les Nike 1 Mid sont des chaussures polyvalentes avec un design élégant et un confort exceptionnel pour une utilisation quotidienne.'),
(109, 'Nike 1 Mid', 'Nike', 48, '104.99', 'Femme', 'Violet', 'Lifestyle', 'img/chaussure3f.jpg', 'Textile', 50, 'Les Nike 1 Mid sont des chaussures polyvalentes avec un design élégant et un confort exceptionnel pour une utilisation quotidienne.'),
(110, 'Nike 1 Mid', 'Nike', 49, '104.99', 'Femme', 'Violet', 'Lifestyle', 'img/chaussure3f.jpg', 'Textile', 50, 'Les Nike 1 Mid sont des chaussures polyvalentes avec un design élégant et un confort exceptionnel pour une utilisation quotidienne.'),
(111, 'New Balance 997', 'New Balance', 40, '109.99', 'Femme', 'Gris', 'Running', 'img/chaussure4f.jpg', 'Synthétique', 50, 'Les New Balance 997 sont des chaussures de course légères et réactives, offrant un excellent soutien et une grande durabilité.'),
(112, 'New Balance 997', 'New Balance', 41, '109.99', 'Femme', 'Gris', 'Running', 'img/chaussure4f.jpg', 'Synthétique', 50, 'Les New Balance 997 sont des chaussures de course légères et réactives, offrant un excellent soutien et une grande durabilité.'),
(113, 'New Balance 997', 'New Balance', 42, '109.99', 'Femme', 'Gris', 'Running', 'img/chaussure4f.jpg', 'Synthétique', 50, 'Les New Balance 997 sont des chaussures de course légères et réactives, offrant un excellent soutien et une grande durabilité.'),
(114, 'New Balance 997', 'New Balance', 43, '109.99', 'Femme', 'Gris', 'Running', 'img/chaussure4f.jpg', 'Synthétique', 50, 'Les New Balance 997 sont des chaussures de course légères et réactives, offrant un excellent soutien et une grande durabilité.'),
(115, 'New Balance 997', 'New Balance', 44, '109.99', 'Femme', 'Gris', 'Running', 'img/chaussure4f.jpg', 'Synthétique', 50, 'Les New Balance 997 sont des chaussures de course légères et réactives, offrant un excellent soutien et une grande durabilité.'),
(116, 'New Balance 997', 'New Balance', 45, '109.99', 'Femme', 'Gris', 'Running', 'img/chaussure4f.jpg', 'Synthétique', 50, 'Les New Balance 997 sont des chaussures de course légères et réactives, offrant un excellent soutien et une grande durabilité.'),
(117, 'New Balance 997', 'New Balance', 46, '109.99', 'Femme', 'Gris', 'Running', 'img/chaussure4f.jpg', 'Synthétique', 50, 'Les New Balance 997 sont des chaussures de course légères et réactives, offrant un excellent soutien et une grande durabilité.'),
(118, 'New Balance 997', 'New Balance', 47, '109.99', 'Femme', 'Gris', 'Running', 'img/chaussure4f.jpg', 'Synthétique', 50, 'Les New Balance 997 sont des chaussures de course légères et réactives, offrant un excellent soutien et une grande durabilité.'),
(119, 'New Balance 997', 'New Balance', 48, '109.99', 'Femme', 'Gris', 'Running', 'img/chaussure4f.jpg', 'Synthétique', 50, 'Les New Balance 997 sont des chaussures de course légères et réactives, offrant un excellent soutien et une grande durabilité.'),
(120, 'New Balance 997', 'New Balance', 49, '109.99', 'Femme', 'Gris', 'Running', 'img/chaussure4f.jpg', 'Synthétique', 50, 'Les New Balance 997 sont des chaussures de course légères et réactives, offrant un excellent soutien et une grande durabilité.'),
(121, 'Lacoste T-clip', 'Lacoste', 40, '84.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure5f.jpg', 'Cuir', 50, 'Les Lacoste T-clip sont des chaussures élégantes et confortables, parfaites pour un look décontracté et chic.'),
(122, 'Lacoste T-clip', 'Lacoste', 41, '84.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure5f.jpg', 'Cuir', 50, 'Les Lacoste T-clip sont des chaussures élégantes et confortables, parfaites pour un look décontracté et chic.'),
(123, 'Lacoste T-clip', 'Lacoste', 42, '84.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure5f.jpg', 'Cuir', 50, 'Les Lacoste T-clip sont des chaussures élégantes et confortables, parfaites pour un look décontracté et chic.'),
(124, 'Lacoste T-clip', 'Lacoste', 43, '84.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure5f.jpg', 'Cuir', 50, 'Les Lacoste T-clip sont des chaussures élégantes et confortables, parfaites pour un look décontracté et chic.'),
(125, 'Lacoste T-clip', 'Lacoste', 44, '84.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure5f.jpg', 'Cuir', 50, 'Les Lacoste T-clip sont des chaussures élégantes et confortables, parfaites pour un look décontracté et chic.'),
(126, 'Lacoste T-clip', 'Lacoste', 45, '84.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure5f.jpg', 'Cuir', 50, 'Les Lacoste T-clip sont des chaussures élégantes et confortables, parfaites pour un look décontracté et chic.'),
(127, 'Lacoste T-clip', 'Lacoste', 46, '84.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure5f.jpg', 'Cuir', 50, 'Les Lacoste T-clip sont des chaussures élégantes et confortables, parfaites pour un look décontracté et chic.'),
(128, 'Lacoste T-clip', 'Lacoste', 47, '84.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure5f.jpg', 'Cuir', 50, 'Les Lacoste T-clip sont des chaussures élégantes et confortables, parfaites pour un look décontracté et chic.'),
(129, 'Lacoste T-clip', 'Lacoste', 48, '84.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure5f.jpg', 'Cuir', 50, 'Les Lacoste T-clip sont des chaussures élégantes et confortables, parfaites pour un look décontracté et chic.'),
(130, 'Lacoste T-clip', 'Lacoste', 49, '84.99', 'Femme', 'Blanc', 'Classique', 'img/chaussure5f.jpg', 'Cuir', 50, 'Les Lacoste T-clip sont des chaussures élégantes et confortables, parfaites pour un look décontracté et chic.'),
(131, 'Timberland Adley Way', 'Timberland', 40, '69.99', 'Femme', 'Jaune', 'Classique', 'img/chaussure6f.jpg', 'Cuir', 50, 'Les Timberland Adley Way sont des chaussures polyvalentes et durables, idéales pour les aventures en plein air.'),
(132, 'Timberland Adley Way', 'Timberland', 41, '69.99', 'Femme', 'Jaune', 'Classique', 'img/chaussure6f.jpg', 'Cuir', 50, 'Les Timberland Adley Way sont des chaussures polyvalentes et durables, idéales pour les aventures en plein air.'),
(133, 'Timberland Adley Way', 'Timberland', 42, '69.99', 'Femme', 'Jaune', 'Classique', 'img/chaussure6f.jpg', 'Cuir', 50, 'Les Timberland Adley Way sont des chaussures polyvalentes et durables, idéales pour les aventures en plein air.'),
(134, 'Timberland Adley Way', 'Timberland', 43, '69.99', 'Femme', 'Jaune', 'Classique', 'img/chaussure6f.jpg', 'Cuir', 50, 'Les Timberland Adley Way sont des chaussures polyvalentes et durables, idéales pour les aventures en plein air.'),
(135, 'Timberland Adley Way', 'Timberland', 44, '69.99', 'Femme', 'Jaune', 'Classique', 'img/chaussure6f.jpg', 'Cuir', 50, 'Les Timberland Adley Way sont des chaussures polyvalentes et durables, idéales pour les aventures en plein air.'),
(136, 'Timberland Adley Way', 'Timberland', 45, '69.99', 'Femme', 'Jaune', 'Classique', 'img/chaussure6f.jpg', 'Cuir', 50, 'Les Timberland Adley Way sont des chaussures polyvalentes et durables, idéales pour les aventures en plein air.'),
(137, 'Timberland Adley Way', 'Timberland', 46, '69.99', 'Femme', 'Jaune', 'Classique', 'img/chaussure6f.jpg', 'Cuir', 50, 'Les Timberland Adley Way sont des chaussures polyvalentes et durables, idéales pour les aventures en plein air.'),
(138, 'Timberland Adley Way', 'Timberland', 47, '69.99', 'Femme', 'Jaune', 'Classique', 'img/chaussure6f.jpg', 'Cuir', 50, 'Les Timberland Adley Way sont des chaussures polyvalentes et durables, idéales pour les aventures en plein air.'),
(139, 'Timberland Adley Way', 'Timberland', 48, '69.99', 'Femme', 'Jaune', 'Classique', 'img/chaussure6f.jpg', 'Cuir', 50, 'Les Timberland Adley Way sont des chaussures polyvalentes et durables, idéales pour les aventures en plein air.'),
(140, 'Timberland Adley Way', 'Timberland', 49, '69.99', 'Femme', 'Jaune', 'Classique', 'img/chaussure6f.jpg', 'Cuir', 50, 'Les Timberland Adley Way sont des chaussures polyvalentes et durables, idéales pour les aventures en plein air.'),
(141, 'New Balance 530', 'New Balance', 40, '99.99', 'Femme', 'Blanc', 'Lifestyle', 'img/chaussure7f.jpg', 'Synthétique', 50, 'Les New Balance 530 sont des chaussures légères et confortables, parfaites pour une utilisation quotidienne et une activité sportive modérée.'),
(142, 'New Balance 530', 'New Balance', 41, '99.99', 'Femme', 'Blanc', 'Lifestyle', 'img/chaussure7f.jpg', 'Synthétique', 50, 'Les New Balance 530 sont des chaussures légères et confortables, parfaites pour une utilisation quotidienne et une activité sportive modérée.'),
(143, 'New Balance 530', 'New Balance', 42, '99.99', 'Femme', 'Blanc', 'Lifestyle', 'img/chaussure7f.jpg', 'Synthétique', 50, 'Les New Balance 530 sont des chaussures légères et confortables, parfaites pour une utilisation quotidienne et une activité sportive modérée.'),
(144, 'New Balance 530', 'New Balance', 43, '99.99', 'Femme', 'Blanc', 'Lifestyle', 'img/chaussure7f.jpg', 'Synthétique', 50, 'Les New Balance 530 sont des chaussures légères et confortables, parfaites pour une utilisation quotidienne et une activité sportive modérée.'),
(145, 'New Balance 530', 'New Balance', 44, '99.99', 'Femme', 'Blanc', 'Lifestyle', 'img/chaussure7f.jpg', 'Synthétique', 50, 'Les New Balance 530 sont des chaussures légères et confortables, parfaites pour une utilisation quotidienne et une activité sportive modérée.'),
(146, 'New Balance 530', 'New Balance', 45, '99.99', 'Femme', 'Blanc', 'Lifestyle', 'img/chaussure7f.jpg', 'Synthétique', 50, 'Les New Balance 530 sont des chaussures légères et confortables, parfaites pour une utilisation quotidienne et une activité sportive modérée.'),
(147, 'New Balance 530', 'New Balance', 46, '99.99', 'Femme', 'Blanc', 'Lifestyle', 'img/chaussure7f.jpg', 'Synthétique', 50, 'Les New Balance 530 sont des chaussures légères et confortables, parfaites pour une utilisation quotidienne et une activité sportive modérée.'),
(148, 'New Balance 530', 'New Balance', 47, '99.99', 'Femme', 'Blanc', 'Lifestyle', 'img/chaussure7f.jpg', 'Synthétique', 50, 'Les New Balance 530 sont des chaussures légères et confortables, parfaites pour une utilisation quotidienne et une activité sportive modérée.'),
(149, 'New Balance 530', 'New Balance', 48, '99.99', 'Femme', 'Blanc', 'Lifestyle', 'img/chaussure7f.jpg', 'Synthétique', 50, 'Les New Balance 530 sont des chaussures légères et confortables, parfaites pour une utilisation quotidienne et une activité sportive modérée.'),
(150, 'New Balance 530', 'New Balance', 49, '99.99', 'Femme', 'Blanc', 'Lifestyle', 'img/chaussure7f.jpg', 'Synthétique', 50, 'Les New Balance 530 sont des chaussures légères et confortables, parfaites pour une utilisation quotidienne et une activité sportive modérée.'),
(151, 'Crocs Classic Clog', 'Crocs', 40, '29.99', 'Femme', 'Rose', 'Claquette', 'img/chaussure8f.jpg', 'Synthétique', 50, 'Les Crocs Classic Clog sont des sabots légers et confortables, parfaits pour se détendre à la maison ou pour une promenade décontractée.'),
(152, 'Crocs Classic Clog', 'Crocs', 41, '29.99', 'Femme', 'Rose', 'Claquette', 'img/chaussure8f.jpg', 'Synthétique', 50, 'Les Crocs Classic Clog sont des sabots légers et confortables, parfaits pour se détendre à la maison ou pour une promenade décontractée.'),
(153, 'Crocs Classic Clog', 'Crocs', 42, '29.99', 'Femme', 'Rose', 'Claquette', 'img/chaussure8f.jpg', 'Synthétique', 50, 'Les Crocs Classic Clog sont des sabots légers et confortables, parfaits pour se détendre à la maison ou pour une promenade décontractée.'),
(154, 'Crocs Classic Clog', 'Crocs', 43, '29.99', 'Femme', 'Rose', 'Claquette', 'img/chaussure8f.jpg', 'Synthétique', 50, 'Les Crocs Classic Clog sont des sabots légers et confortables, parfaits pour se détendre à la maison ou pour une promenade décontractée.'),
(155, 'Crocs Classic Clog', 'Crocs', 44, '29.99', 'Femme', 'Rose', 'Claquette', 'img/chaussure8f.jpg', 'Synthétique', 50, 'Les Crocs Classic Clog sont des sabots légers et confortables, parfaits pour se détendre à la maison ou pour une promenade décontractée.'),
(156, 'Crocs Classic Clog', 'Crocs', 45, '29.99', 'Femme', 'Rose', 'Claquette', 'img/chaussure8f.jpg', 'Synthétique', 50, 'Les Crocs Classic Clog sont des sabots légers et confortables, parfaits pour se détendre à la maison ou pour une promenade décontractée.'),
(157, 'Crocs Classic Clog', 'Crocs', 46, '29.99', 'Femme', 'Rose', 'Claquette', 'img/chaussure8f.jpg', 'Synthétique', 50, 'Les Crocs Classic Clog sont des sabots légers et confortables, parfaits pour se détendre à la maison ou pour une promenade décontractée.'),
(158, 'Crocs Classic Clog', 'Crocs', 47, '29.99', 'Femme', 'Rose', 'Claquette', 'img/chaussure8f.jpg', 'Synthétique', 50, 'Les Crocs Classic Clog sont des sabots légers et confortables, parfaits pour se détendre à la maison ou pour une promenade décontractée.'),
(159, 'Crocs Classic Clog', 'Crocs', 48, '29.99', 'Femme', 'Rose', 'Claquette', 'img/chaussure8f.jpg', 'Synthétique', 50, 'Les Crocs Classic Clog sont des sabots légers et confortables, parfaits pour se détendre à la maison ou pour une promenade décontractée.'),
(160, 'Crocs Classic Clog', 'Crocs', 49, '29.99', 'Femme', 'Rose', 'Claquette', 'img/chaussure8f.jpg', 'Synthétique', 50, 'Les Crocs Classic Clog sont des sabots légers et confortables, parfaits pour se détendre à la maison ou pour une promenade décontractée.'),
(161, 'Asics JAPAN S', 'Asics', 35, '54.99', 'Enfant', 'Blanc', 'Lifestyle', 'img/chaussure1e.jpg', 'Textile', 50, 'Les Asics JAPAN S sont des chaussures de sport polyvalentes pour enfants, offrant un bon soutien et un confort optimal.'),
(162, 'Asics JAPAN S', 'Asics', 36, '54.99', 'Enfant', 'Blanc', 'Lifestyle', 'img/chaussure1e.jpg', 'Textile', 50, 'Les Asics JAPAN S sont des chaussures de sport polyvalentes pour enfants, offrant un bon soutien et un confort optimal.'),
(163, 'Asics JAPAN S', 'Asics', 37, '54.99', 'Enfant', 'Blanc', 'Lifestyle', 'img/chaussure1e.jpg', 'Textile', 50, 'Les Asics JAPAN S sont des chaussures de sport polyvalentes pour enfants, offrant un bon soutien et un confort optimal.'),
(164, 'Asics JAPAN S', 'Asics', 38, '54.99', 'Enfant', 'Blanc', 'Lifestyle', 'img/chaussure1e.jpg', 'Textile', 50, 'Les Asics JAPAN S sont des chaussures de sport polyvalentes pour enfants, offrant un bon soutien et un confort optimal.'),
(165, 'Asics JAPAN S', 'Asics', 39, '54.99', 'Enfant', 'Blanc', 'Lifestyle', 'img/chaussure1e.jpg', 'Textile', 50, 'Les Asics JAPAN S sont des chaussures de sport polyvalentes pour enfants, offrant un bon soutien et un confort optimal.'),
(166, 'Asics JAPAN S', 'Asics', 40, '54.99', 'Enfant', 'Blanc', 'Lifestyle', 'img/chaussure1e.jpg', 'Textile', 50, 'Les Asics JAPAN S sont des chaussures de sport polyvalentes pour enfants, offrant un bon soutien et un confort optimal.'),
(167, 'Converse 70 High', 'Converse', 35, '79.99', 'Enfant', 'Blanc', 'Lifestyle', 'img/chaussure2e.jpg', 'Textile', 50, 'Les Converse 70 High sont des chaussures classiques et intemporelles pour enfants, parfaites pour compléter leur style décontracté.'),
(168, 'Converse 70 High', 'Converse', 36, '79.99', 'Enfant', 'Blanc', 'Lifestyle', 'img/chaussure2e.jpg', 'Textile', 50, 'Les Converse 70 High sont des chaussures classiques et intemporelles pour enfants, parfaites pour compléter leur style décontracté.'),
(169, 'Converse 70 High', 'Converse', 37, '79.99', 'Enfant', 'Blanc', 'Lifestyle', 'img/chaussure2e.jpg', 'Textile', 50, 'Les Converse 70 High sont des chaussures classiques et intemporelles pour enfants, parfaites pour compléter leur style décontracté.'),
(170, 'Converse 70 High', 'Converse', 38, '79.99', 'Enfant', 'Blanc', 'Lifestyle', 'img/chaussure2e.jpg', 'Textile', 50, 'Les Converse 70 High sont des chaussures classiques et intemporelles pour enfants, parfaites pour compléter leur style décontracté.'),
(171, 'Converse 70 High', 'Converse', 39, '79.99', 'Enfant', 'Blanc', 'Lifestyle', 'img/chaussure2e.jpg', 'Textile', 50, 'Les Converse 70 High sont des chaussures classiques et intemporelles pour enfants, parfaites pour compléter leur style décontracté.'),
(172, 'Converse 70 High', 'Converse', 40, '79.99', 'Enfant', 'Blanc', 'Lifestyle', 'img/chaussure2e.jpg', 'Textile', 50, 'Les Converse 70 High sont des chaussures classiques et intemporelles pour enfants, parfaites pour compléter leur style décontracté.'),
(173, 'Nike Victori One Slide', 'Nike', 35, '29.99', 'Enfant', 'Noir', 'Claquette', 'img/chaussure3e.jpg', 'Synthétique', 50, 'Les Nike Victori One Slide sont des sandales légères et confortables pour enfants, idéales pour se détendre après l\'effort.'),
(174, 'Nike Victori One Slide', 'Nike', 36, '29.99', 'Enfant', 'Noir', 'Claquette', 'img/chaussure3e.jpg', 'Synthétique', 50, 'Les Nike Victori One Slide sont des sandales légères et confortables pour enfants, idéales pour se détendre après l\'effort.'),
(175, 'Nike Victori One Slide', 'Nike', 37, '29.99', 'Enfant', 'Noir', 'Claquette', 'img/chaussure3e.jpg', 'Synthétique', 50, 'Les Nike Victori One Slide sont des sandales légères et confortables pour enfants, idéales pour se détendre après l\'effort.'),
(176, 'Nike Victori One Slide', 'Nike', 38, '29.99', 'Enfant', 'Noir', 'Claquette', 'img/chaussure3e.jpg', 'Synthétique', 50, 'Les Nike Victori One Slide sont des sandales légères et confortables pour enfants, idéales pour se détendre après l\'effort.'),
(177, 'Nike Victori One Slide', 'Nike', 39, '29.99', 'Enfant', 'Noir', 'Claquette', 'img/chaussure3e.jpg', 'Synthétique', 50, 'Les Nike Victori One Slide sont des sandales légères et confortables pour enfants, idéales pour se détendre après l\'effort.'),
(178, 'Nike Victori One Slide', 'Nike', 40, '29.99', 'Enfant', 'Noir', 'Claquette', 'img/chaussure3e.jpg', 'Synthétique', 50, 'Les Nike Victori One Slide sont des sandales légères et confortables pour enfants, idéales pour se détendre après l\'effort.'),
(179, 'Nike Air Force 1 Low', 'Nike', 35, '69.99', 'Enfant', 'Jaune', 'Lifestyle', 'img/chaussure4e.jpg', 'Cuir', 50, 'Les Nike Air Force 1 Low sont des chaussures emblématiques pour enfants, offrant style et confort pour toutes les occasions.'),
(180, 'Nike Air Force 1 Low', 'Nike', 36, '69.99', 'Enfant', 'Jaune', 'Lifestyle', 'img/chaussure4e.jpg', 'Cuir', 50, 'Les Nike Air Force 1 Low sont des chaussures emblématiques pour enfants, offrant style et confort pour toutes les occasions.'),
(181, 'Nike Air Force 1 Low', 'Nike', 37, '69.99', 'Enfant', 'Jaune', 'Lifestyle', 'img/chaussure4e.jpg', 'Cuir', 50, 'Les Nike Air Force 1 Low sont des chaussures emblématiques pour enfants, offrant style et confort pour toutes les occasions.'),
(182, 'Nike Air Force 1 Low', 'Nike', 38, '69.99', 'Enfant', 'Jaune', 'Lifestyle', 'img/chaussure4e.jpg', 'Cuir', 50, 'Les Nike Air Force 1 Low sont des chaussures emblématiques pour enfants, offrant style et confort pour toutes les occasions.'),
(183, 'Nike Air Force 1 Low', 'Nike', 39, '69.99', 'Enfant', 'Jaune', 'Lifestyle', 'img/chaussure4e.jpg', 'Cuir', 50, 'Les Nike Air Force 1 Low sont des chaussures emblématiques pour enfants, offrant style et confort pour toutes les occasions.'),
(184, 'Nike Air Force 1 Low', 'Nike', 40, '69.99', 'Enfant', 'Jaune', 'Lifestyle', 'img/chaussure4e.jpg', 'Cuir', 50, 'Les Nike Air Force 1 Low sont des chaussures emblématiques pour enfants, offrant style et confort pour toutes les occasions.'),
(185, 'Jordan 1 Low', 'Nike', 35, '89.99', 'Enfant', 'Jaune', 'Lifestyle', 'img/chaussure5e.jpg', 'Synthétique', 50, 'Les Jordan 1 Low sont des chaussures polyvalentes pour enfants avec un design moderne et un confort exceptionnel.'),
(186, 'Jordan 1 Low', 'Nike', 36, '89.99', 'Enfant', 'Jaune', 'Lifestyle', 'img/chaussure5e.jpg', 'Synthétique', 50, 'Les Jordan 1 Low sont des chaussures polyvalentes pour enfants avec un design moderne et un confort exceptionnel.'),
(187, 'Jordan 1 Low', 'Nike', 37, '89.99', 'Enfant', 'Jaune', 'Lifestyle', 'img/chaussure5e.jpg', 'Synthétique', 50, 'Les Jordan 1 Low sont des chaussures polyvalentes pour enfants avec un design moderne et un confort exceptionnel.'),
(188, 'Jordan 1 Low', 'Nike', 38, '89.99', 'Enfant', 'Jaune', 'Lifestyle', 'img/chaussure5e.jpg', 'Synthétique', 50, 'Les Jordan 1 Low sont des chaussures polyvalentes pour enfants avec un design moderne et un confort exceptionnel.'),
(189, 'Jordan 1 Low', 'Nike', 39, '89.99', 'Enfant', 'Jaune', 'Lifestyle', 'img/chaussure5e.jpg', 'Synthétique', 50, 'Les Jordan 1 Low sont des chaussures polyvalentes pour enfants avec un design moderne et un confort exceptionnel.'),
(190, 'Jordan 1 Low', 'Nike', 40, '89.99', 'Enfant', 'Jaune', 'Lifestyle', 'img/chaussure5e.jpg', 'Synthétique', 50, 'Les Jordan 1 Low sont des chaussures polyvalentes pour enfants avec un design moderne et un confort exceptionnel.'),
(191, 'Lacoste Carnaby', 'Lacoste', 35, '49.99', 'Enfant', 'Blanc', 'Classique', 'img/chaussure6e.jpg', 'Textile', 50, 'Les Lacoste Carnaby sont des chaussures de course légères et respirantes pour enfants, offrant un excellent soutien et une grande durabilité.'),
(192, 'Lacoste Carnaby', 'Lacoste', 36, '49.99', 'Enfant', 'Blanc', 'Classique', 'img/chaussure6e.jpg', 'Textile', 50, 'Les Lacoste Carnaby sont des chaussures de course légères et respirantes pour enfants, offrant un excellent soutien et une grande durabilité.'),
(193, 'Lacoste Carnaby', 'Lacoste', 37, '49.99', 'Enfant', 'Blanc', 'Classique', 'img/chaussure6e.jpg', 'Textile', 50, 'Les Lacoste Carnaby sont des chaussures de course légères et respirantes pour enfants, offrant un excellent soutien et une grande durabilité.'),
(194, 'Lacoste Carnaby', 'Lacoste', 38, '49.99', 'Enfant', 'Blanc', 'Classique', 'img/chaussure6e.jpg', 'Textile', 50, 'Les Lacoste Carnaby sont des chaussures de course légères et respirantes pour enfants, offrant un excellent soutien et une grande durabilité.'),
(195, 'Lacoste Carnaby', 'Lacoste', 39, '49.99', 'Enfant', 'Blanc', 'Classique', 'img/chaussure6e.jpg', 'Textile', 50, 'Les Lacoste Carnaby sont des chaussures de course légères et respirantes pour enfants, offrant un excellent soutien et une grande durabilité.'),
(196, 'Lacoste Carnaby', 'Lacoste', 40, '49.99', 'Enfant', 'Blanc', 'Classique', 'img/chaussure6e.jpg', 'Textile', 50, 'Les Lacoste Carnaby sont des chaussures de course légères et respirantes pour enfants, offrant un excellent soutien et une grande durabilité.'),
(197, 'Lacoste Twin Serve', 'Lacoste', 35, '59.99', 'Enfant', 'Gris', 'Classique', 'img/chaussure7e.jpg', 'Synthétique', 50, 'Les Lacoste Twin Serve sont des chaussures de course polyvalentes pour enfants, offrant un bon amorti et une adhérence optimale.'),
(198, 'Lacoste Twin Serve', 'Lacoste', 36, '59.99', 'Enfant', 'Gris', 'Classique', 'img/chaussure7e.jpg', 'Synthétique', 50, 'Les Lacoste Twin Serve sont des chaussures de course polyvalentes pour enfants, offrant un bon amorti et une adhérence optimale.'),
(199, 'Lacoste Twin Serve', 'Lacoste', 37, '59.99', 'Enfant', 'Gris', 'Classique', 'img/chaussure7e.jpg', 'Synthétique', 50, 'Les Lacoste Twin Serve sont des chaussures de course polyvalentes pour enfants, offrant un bon amorti et une adhérence optimale.'),
(200, 'Lacoste Twin Serve', 'Lacoste', 38, '59.99', 'Enfant', 'Gris', 'Classique', 'img/chaussure7e.jpg', 'Synthétique', 50, 'Les Lacoste Twin Serve sont des chaussures de course polyvalentes pour enfants, offrant un bon amorti et une adhérence optimale.'),
(201, 'Lacoste Twin Serve', 'Lacoste', 39, '59.99', 'Enfant', 'Gris', 'Classique', 'img/chaussure7e.jpg', 'Synthétique', 50, 'Les Lacoste Twin Serve sont des chaussures de course polyvalentes pour enfants, offrant un bon amorti et une adhérence optimale.'),
(202, 'Lacoste Twin Serve', 'Lacoste', 40, '59.99', 'Enfant', 'Gris', 'Classique', 'img/chaussure7e.jpg', 'Synthétique', 50, 'Les Lacoste Twin Serve sont des chaussures de course polyvalentes pour enfants, offrant un bon amorti et une adhérence optimale.'),
(203, 'Jordan Aj11 Low', 'Nike', 35, '45.99', 'Enfant', 'Gris', 'Running', 'img/chaussure8e.jpg', 'Synthétique', 50, 'Les Jordan Aj11 Low sont des chaussures de course légères et réactives pour enfants, offrant un excellent soutien et une grande durabilité.'),
(204, 'Jordan Aj11 Low', 'Nike', 36, '45.99', 'Enfant', 'Gris', 'Running', 'img/chaussure8e.jpg', 'Synthétique', 50, 'Les Jordan Aj11 Low sont des chaussures de course légères et réactives pour enfants, offrant un excellent soutien et une grande durabilité.'),
(205, 'Jordan Aj11 Low', 'Nike', 37, '45.99', 'Enfant', 'Gris', 'Running', 'img/chaussure8e.jpg', 'Synthétique', 50, 'Les Jordan Aj11 Low sont des chaussures de course légères et réactives pour enfants, offrant un excellent soutien et une grande durabilité.'),
(206, 'Jordan Aj11 Low', 'Nike', 38, '45.99', 'Enfant', 'Gris', 'Running', 'img/chaussure8e.jpg', 'Synthétique', 50, 'Les Jordan Aj11 Low sont des chaussures de course légères et réactives pour enfants, offrant un excellent soutien et une grande durabilité.'),
(207, 'Jordan Aj11 Low', 'Nike', 39, '45.99', 'Enfant', 'Gris', 'Running', 'img/chaussure8e.jpg', 'Synthétique', 50, 'Les Jordan Aj11 Low sont des chaussures de course légères et réactives pour enfants, offrant un excellent soutien et une grande durabilité.'),
(208, 'Jordan Aj11 Low', 'Nike', 40, '45.99', 'Enfant', 'Gris', 'Running', 'img/chaussure8e.jpg', 'Synthétique', 50, 'Les Jordan Aj11 Low sont des chaussures de course légères et réactives pour enfants, offrant un excellent soutien et une grande durabilité.');

-- --------------------------------------------------------

--
-- Structure de la table `Clients`
--

CREATE TABLE `Clients` (
  `id_client` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `role` int NOT NULL
) ;

-- --------------------------------------------------------

--
-- Structure de la table `Commandes`
--

CREATE TABLE `Commandes` (
  `id_commande` int NOT NULL,
  `id_client` int DEFAULT NULL,
  `date_commande` date DEFAULT NULL,
  `liste_article` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Formulaire`
--

CREATE TABLE `Formulaire` (
  `id_formulaire` int NOT NULL,
  `date_contact` date NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `genre` enum('Homme','Femme') DEFAULT NULL,
  `date_naissance` date NOT NULL,
  `fonction` varchar(100) NOT NULL,
  `sujet` varchar(80) NOT NULL,
  `contenu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Ligne_Commandes`
--

CREATE TABLE `Ligne_Commandes` (
  `id_ligne_commande` int NOT NULL,
  `id_commande` int NOT NULL,
  `id_chaussure` int NOT NULL,
  `quantite` int NOT NULL,
  `taille` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Panier`
--

CREATE TABLE `Panier` (
  `id_panier` int NOT NULL,
  `id_client` int NOT NULL,
  `id_chaussure` int DEFAULT NULL,
  `quantite` int NOT NULL,
  `stock` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Chaussures`
--
ALTER TABLE `Chaussures`
  ADD PRIMARY KEY (`id_chaussure`),
  ADD KEY `idx_taille` (`taille`);

--
-- Index pour la table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `Commandes`
--
ALTER TABLE `Commandes`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `Formulaire`
--
ALTER TABLE `Formulaire`
  ADD PRIMARY KEY (`id_formulaire`);

--
-- Index pour la table `Ligne_Commandes`
--
ALTER TABLE `Ligne_Commandes`
  ADD PRIMARY KEY (`id_ligne_commande`),
  ADD UNIQUE KEY `id_commande` (`id_commande`),
  ADD UNIQUE KEY `id_chaussure` (`id_chaussure`);

--
-- Index pour la table `Panier`
--
ALTER TABLE `Panier`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_chaussure` (`id_chaussure`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Chaussures`
--
ALTER TABLE `Chaussures`
  MODIFY `id_chaussure` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT pour la table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Ligne_Commandes`
--
ALTER TABLE `Ligne_Commandes`
  MODIFY `id_ligne_commande` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Panier`
--
ALTER TABLE `Panier`
  MODIFY `id_panier` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Commandes`
--
ALTER TABLE `Commandes`
  ADD CONSTRAINT `Commandes_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `Clients` (`id_client`);

--
-- Contraintes pour la table `Panier`
--
ALTER TABLE `Panier`
  ADD CONSTRAINT `Panier_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `Clients` (`id_client`),
  ADD CONSTRAINT `Panier_ibfk_2` FOREIGN KEY (`id_chaussure`) REFERENCES `Chaussures` (`id_chaussure`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
