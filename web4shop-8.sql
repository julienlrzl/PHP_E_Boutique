-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 14 jan. 2024 à 21:29
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web4shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'john', 'f18bd055eec95965ee175fa9badd35ae6dbeb98f');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'boissons'),
(2, 'biscuits'),
(3, 'fruits secs');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `forname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `add3` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `registered` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `forname`, `surname`, `add1`, `add2`, `add3`, `postcode`, `phone`, `email`, `registered`) VALUES
(1, 'Sarah', 'Hamidou', 'test', 'ligne add2', 'Hab', '74420', '0612345678', 's.hamidou@gmail.com', 1),
(2, 'Jean-Benoît', 'Delaroche', 'ligne add1', 'ligne add2', 'Lyon', '69009', '0796321458', 'jb.delaroche@gmx.fr', 1),
(74, 'Lazrak', 'SAlim', 'dbzekjfzjrfn', 'fjkberznfkjernf', 'fjnerfez', 'djezbj', 'ckjbenzc', 'sjcfnzeoc@gmail.com', 1),
(75, 'Lazrak', 'SAlim', 'dbzekjfzjrfn', 'fjkberznfkjernf', 'fjnerfez', '123', '12332323232', 'sjcfnzeoc@gmail.com', 1),
(76, 'Lazrak', 'Salim', 'dbzekjfzjrfn', 'fjkberznfkjernf', 'fjnerfez', '123', '12332323232', 'sjcfnzeoc@gmail.com', 1),
(77, 'Lazrak', 'Salim', 'dbzekjfzjrfn', 'fjkberznfkjernf', 'fjnerfez', '123', '12332323232', 'sjcfnzeoc@gmail.com', 1),
(78, 'Lazrak', 'Salim', 'dbzekjfzjrfn', 'fjkberznfkjernf', 'fjnerfez', '123', '12332323232', 'sjcfnzeoc@gmail.com', 1),
(79, 'csdvfv', 'sdvsdv', 'sdvsdv', '', 'vdsvfv', '23223', '1232232232', 'hvieubvner@gmail.com', 1),
(80, 'Lazrak', 'SALAM', 'ervefrver', 'ff', 'fezf', '09780', '0766667788', 'salmalads@gmail.com', 1),
(81, 'Lazrak', 'SALAM', 'ervefrver', 'ff', 'fezf', '09780', '0766667788', 'salmalads@gmail.com', 1),
(82, 'Lazrak', 'SALAM', 'ervefrver', 'ff', 'fezf', '09780', '0766667788', 'salmalads@gmail.com', 1),
(83, 'vf', 'vfdv', 'vfdv', 'vfdv', 'vfdv', 'vdfv', 'vdfvdf', 'sas@gmail.com', 1),
(84, 'dzdef', 'fzfzrf', 'frezfzef', 'freferzf', 'fzefzef', 'fzfzef', 'ezfzrefrezf', 'fezfzefg@gmail.com', 1),
(85, 'fzerferf', 'fgerfgerf', 'freferferf', 'vfegvergf', 'gfregfer', 'hguyvuybh', 'hviuyhbvu', 'saubderiuvb@gmail.com', 1),
(86, 'fqsfver', 'ergfzerf', 'gfzerfgzergf', '', 'ferfgezrfg', 'regfz', 'erzgverzgzerg', 'ergerzgvzerg@gmail.com', 1),
(87, 'dsvfdv', 'fevefz', 'fvevvef', 'vefrv', 'ervzev', 'fezf', 'evzefvze', 'ezgvezrvzerv@gmail.com', 1),
(88, 'fevzregvzerverv', 'vrezvrtgv', 'vgertg', '', 'vretzvertv', 'rtbv', 'vfdv', 'revzzervzer@gmail.com', 1),
(89, 'zeafzerf', 'ztgr', 'rgegrb', '', 'zrtbgret', 'zrtgz', 'gter', 'zrtber@gmail.com', 1),
(90, 'erves', 'zervze', 'zref', '', 'erfz', 'rfe', 'fvr', 'zserzf@gmail.com', 1),
(91, 'test5', 'test5', 'test5', '', 'test5', 'test5', 'test5', 'test5@gmail.com', 1),
(92, 'test6', 'test6', 'test6', '', 'test6', 'test6', 'test6', 'test6@gmail.com', 1),
(93, 'test7', 'test7', 'test7', '', 'test7', 'test7', 'test7', 'test7@gmail.com', 1),
(94, 'test9', 'test9', 'test9', '', 'test8', 'test9', 'test9', 'test9@gmail.com', 1),
(95, 'test9test9', 'test9', 'test9', '', 'test9', 'test9', 'test9', 'test9@gmail.com', 1),
(96, 'test10', 'test10', 'test10', '', 'test10', 'test10', 'test10', 'test10@gmail.com', 1),
(97, 'test11', 'test11', 'test11', '', 'test11', 'test11', 'test11', 'test11@gmail.com', 1),
(98, 'test12', 'test12', 'test12', '', 'test12', 'test12', 'test12', 'test12@gmail.com', 1),
(99, 'test12', 'test12', 'test12', '', 'test12', 'test12', 'test12', 'test12@gmail.com', 1),
(100, 'test12', 'test12', 'test12', '', 'test12', 'test12', 'test12', 'test12@gmail.com', 1),
(101, 'test13', 'test13', 'test13', '', 'test13', 'test13', 'test13', 'test13@gmail.com', 1),
(102, 'test14', 'test14', 'test14', '', 'test14', 'test14', 'test14', 'test14@gmail.com', 1),
(103, 'test15', 'test15', 'test15', '', 'test15', 'test15', 'test15', 'test15@gmail.com', 1),
(104, 'test17', 'test17', 'test17', '', 'test17', 'test17', 'test17', 'test17@gmail.com', 1),
(105, 'test20', 'test20', 'test20', '', 'test20', 'test20', 'test20', 'test20@gmail.com', 1),
(106, 'test21', 'test20', 'test20', '', 'test20', 'test20', 'test20', 'test20@gmail.com', 1),
(107, 'test21', 'test20', 'test20', '', 'test20', 'test20', 'test20', 'test20@gmail.com', 1),
(108, 'test22', 'test22', 'test22', '', 'test22', 'test22', 'test22', 'test22@gmail.com', 1),
(109, 'test23', 'test23', 'test23', '', 'test23', 'test23', 'test23', 'test23@gmail.com', 1),
(110, 'test24', 'test24', 'test24', '', 'test24', 'test24', 'test24', 'test24@gmail.com', 1),
(111, 'test25', 'test25', 'test25', '', 'test25', 'test25', 'test25', 'test25@gmail.com', 1),
(112, 'test26', 'test26', 'test26', '', 'test26', 'test26', 'test26', 'test26@gmail.com', 1),
(113, 'test27', 'test27', 'test27', '', 'test27', 'test27', 'test27', 'test27@gmail.com', 1),
(114, 'test28', 'test28', 'test28', '', 'test28', 'test28', 'test28', 'test28@gmail.com', 1),
(115, 'test29', 'test29', 'test29', '', 'test29', 'test29', 'test29 test29', 'test29test29@gmail.com', 1),
(116, 'test31', 'test31', 'test31', '', 'test31', 'test31', 'test31', 'test31test31@gmail.com', 1),
(117, 'evev', 'rgvretgv', 'rtvgrtvrtb', '', 'zertg', 'vzrt', 'rtbvzerbg', 'grtbvesrt@gmail.com', 1),
(118, 'test41', 'test41', 'test41', '', 'test41', 'test41', 'test41', 'test41@gmail.com', 1),
(119, 'Noémie', 'Larzul', '151 rue de la vie', '', 'Villard', '74420', '0699190332', 'julienlrzl@icloud.com', 1),
(120, 't', 't', 't', 't', 't', 't', 't', 'julienlrzl@icloud.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `firstname`, `lastname`, `add1`, `add2`, `city`, `postcode`, `phone`, `email`) VALUES
(46, 'Christian', 'Hamida', '15 Rue de la paix', '', 'Saint Etienne', '42000', '0477213145', 'chr.hamida@gmail.com'),
(47, 'Sarah', 'Hamida', 'ligne add1', 'ligne add2', 'Meximieux', '01800', '0612345678', 's.hamida@gmail.com'),
(48, 'Jean-Benoît', 'Delaroche', 'ligne add1', 'ligne add2', 'Lyon', '69009', '0796321458', 'jb.delaroche@gmx.fr'),
(49, 'Louise', 'Delaroche', '12 avenue condorcet', 'étage 2', 'Saint Priest', '45097', '0526117898', 'louise.delaroche@yahoo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(16000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `logins`
--

INSERT INTO `logins` (`id`, `customer_id`, `username`, `password`) VALUES
(1, '1', 'Hamidou', '$2y$10$0iqPju1YRYfFmtveRENDyeS8Ckh7cxIQBcgNjNGu4Vw/vOIj99o22'),
(2, '2', 'Delaroche', '56a5d2bd85e6c9956d122f59f79540ee0f75e5ad'),
(37, '74', 'fubnervrenvo', '123'),
(38, '79', 'saassasa', 'sasasa'),
(39, '80', 'sasasasasasa', '123'),
(40, '80', 'sasasasasasa', '123'),
(41, '83', 'vdfvfd', 'sas'),
(42, '84', 'referzf', '123'),
(43, '85', 'frebfiuvnreivn', '123'),
(44, '86', 'test', '123'),
(45, '87', 'evevvez', 'ezrfzerf'),
(46, '88', 'test1', '123'),
(47, '89', 'test3', '123'),
(48, '90', 'test4', '123'),
(49, '91', 'test5', 'test5'),
(50, '92', 'test6', 'test6'),
(51, '93', 'test7', 'test7'),
(52, '94', 'test9', 'test9'),
(53, '95', 'test9', 'test9'),
(54, '96', 'test10', 'test10'),
(55, '97', 'test11', 'test11'),
(56, '98', 'test12', 'test12'),
(57, '101', 'test13', 'test13'),
(58, '102', 'test14', 'test14'),
(59, '103', 'test15', 'test15test15'),
(60, '104', 'test17', 'test17'),
(61, '105', 'test20', 'test20'),
(62, '106', 'test20', 'test20'),
(63, '106', 'test20', 'test20'),
(64, '108', 'test22', 'test22'),
(65, '109', 'test23', 'test23'),
(66, '110', 'test24', 'test24'),
(67, '111', 'test25', 'test25'),
(68, '112', 'test26', 'test26'),
(69, '113', 'test27', 'test27'),
(70, '114', 'test28', 'test28'),
(71, '115', 'test29', 'test29'),
(72, '116', 'test31', 'test31'),
(73, '117', 'test40', '$2y$10$FUuKVB1nqk69X87pe5LV0OE17RQ7LcmL10TdlZR20tITyP78.XaSy'),
(74, '118', 'test41', '$2y$10$yzHMc5YMeoj94j3mZssZJeX3ljA4VunXnPTcYQ75Ns5IBSAO5I0H6'),
(75, '119', 'NoemieLrzl', '$2y$10$gwrhivi2S/gW15nnyeG70OibWrfOjgd.5DW7T5YAwOCkkwHPfqo.S'),
(76, '120', 'Jul', '$2y$10$AjjadyI7X667IZvKxjs22.LQy.HB61O8azd1sAUk.Dct2URqRYycW');

-- --------------------------------------------------------

--
-- Structure de la table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(235, 63, 14, 1),
(236, 63, 17, 2),
(237, 63, 19, 1),
(238, 63, 11, 3),
(239, 64, 10, 1),
(240, 64, 18, 1),
(241, 64, 20, 1),
(242, 65, 9, 1),
(243, 65, 15, 2),
(244, 65, 16, 1),
(245, 66, 23, 1),
(246, 66, 24, 1),
(247, 70, 7, 2),
(248, 70, 8, 1),
(249, 71, 7, 2),
(250, 71, 8, 1),
(251, 72, 8, 1),
(252, 73, 8, 1),
(253, 74, 25, 1),
(254, 75, 5, 1),
(255, 76, 9, 2);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `registered` int(11) NOT NULL,
  `delivery_add_id` int(11) DEFAULT NULL,
  `payment_type` varchar(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `session` varchar(100) NOT NULL,
  `total` float DEFAULT NULL,
  `confirmer` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `registered`, `delivery_add_id`, `payment_type`, `date`, `session`, `total`, `confirmer`) VALUES
(63, 1, 1, 47, 'cheque', '2020-01-23', 'da8bcdf51121d96c71673295b825a010', 86.2, 1),
(64, 1, 1, 47, 'paypal', '2020-01-23', 'da8bcdf51121d96c71673295b825a010', 87, 1),
(65, 2, 1, 49, 'cheque', '2020-01-23', 'da8bcdf51121d96c71673295b825a010', 51.2, 0),
(66, 2, 1, 49, 'cheque', '2020-01-23', 'da8bcdf51121d96c71673295b825a010', 42.3, 1),
(68, 1, 1, 11, 'cheque', '2024-01-13', 'ldp6k6v1uk3gjgihfd5dgnjbcm', 36.1, 0),
(69, 1, 1, 11, 'paypal', '2024-01-13', 'ldp6k6v1uk3gjgihfd5dgnjbcm', 13.5, 0),
(70, 1, 1, 11, 'cheque', '2024-01-14', '3dona9t286d3trgf571br3tq90', 31.3, 0),
(71, 1, 1, 11, 'paypal', '2024-01-14', '3dona9t286d3trgf571br3tq90', 31.3, 0),
(72, 1, 1, 11, 'cheque', '2024-01-14', '3dona9t286d3trgf571br3tq90', 15.5, 0),
(73, 1, 1, 11, 'cheque', '2024-01-14', '3dona9t286d3trgf571br3tq90', 15.5, 0),
(74, 1, 1, 11, 'cheque', '2024-01-14', '3dona9t286d3trgf571br3tq90', 10.8, 1),
(75, 1, 1, 11, 'cheque', '2024-01-14', '3dona9t286d3trgf571br3tq90', 10.5, 0),
(76, 1, 1, 11, 'paypal', '2024-01-14', '3dona9t286d3trgf571br3tq90', 64, 0);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(11) NOT NULL,
  `customer_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `customer_id`) VALUES
(1, '120'),
(2, '2'),
(4, '74'),
(5, '79'),
(6, NULL),
(7, NULL),
(8, NULL),
(9, NULL),
(10, NULL),
(11, NULL),
(12, NULL),
(13, '80'),
(14, '80'),
(15, '83'),
(16, '84'),
(17, NULL),
(18, NULL),
(19, '85'),
(20, '86'),
(21, NULL),
(22, NULL),
(23, NULL),
(24, NULL),
(27, NULL),
(28, NULL),
(29, '88'),
(30, NULL),
(31, '89'),
(32, NULL),
(33, '90'),
(34, NULL),
(35, NULL),
(36, '91'),
(37, NULL),
(38, NULL),
(39, '92'),
(40, NULL),
(41, '93'),
(42, NULL),
(43, NULL),
(44, '94'),
(45, NULL),
(46, NULL),
(47, '95'),
(48, NULL),
(49, '96'),
(50, NULL),
(51, '97'),
(52, '98'),
(53, '101'),
(54, '102'),
(55, '103'),
(56, '104'),
(57, NULL),
(58, '105'),
(59, '106'),
(60, '106'),
(61, '108'),
(62, NULL),
(63, '109'),
(64, '110'),
(65, '111'),
(66, '112'),
(67, '113'),
(68, '114'),
(69, '116'),
(70, NULL),
(71, '117'),
(72, '118'),
(73, NULL),
(74, NULL),
(75, NULL),
(76, NULL),
(77, NULL),
(78, NULL),
(79, NULL),
(80, NULL),
(81, NULL),
(82, NULL),
(83, NULL),
(84, NULL),
(85, NULL),
(86, NULL),
(87, NULL),
(88, NULL),
(89, NULL),
(90, NULL),
(91, NULL),
(92, NULL),
(93, NULL),
(94, NULL),
(95, NULL),
(96, NULL),
(97, NULL),
(98, NULL),
(99, NULL),
(100, NULL),
(101, NULL),
(102, NULL),
(103, NULL),
(104, NULL),
(105, NULL),
(106, NULL),
(107, NULL),
(108, NULL),
(109, '119');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `description`, `image`, `price`, `quantity`) VALUES
(4, 2, 'Assortiment de biscuits secs', 'Boîte de 20 biscuits composée de galettes, cookies, crêpes dentelles et sablés', 'assortimentBiscuitsSecs.jpg', 12.90, 0),
(5, 2, 'Biscuits de Noël', 'De doux biscuits de Noël à la cannelle, au chocolat, et sablés pour assurer de belles et uniques fêtes de Noël', 'biscuitNoel.png', 10.50, 0),
(6, 2, 'Biscuits aux raisins ', 'De délicieux biscuits aux raisins secs pour éveiller les sens de toute la famille, des plus petits aux plus grands !', 'biscuitRaisin.jpeg', 6.90, 2),
(7, 3, 'Pruneaux secs bio ', 'Sachet de 500g. De délicieux pruneaux issus d agricultures biologiques et responsables ', 'pruneauxSecs.jpg', 7.90, 2),
(8, 3, 'Sachet d\'abricots secs ', 'Sachet d\'un kilogramme. Produit recommandé par de nombreux nutritionnistes. Authentique goût d\'abricot', 'abricotsSecs.jpg', 15.50, 13),
(9, 3, 'Plateau de fruits secs ', 'Plateau de 1kg composé d\'abricots secs, de noix de cajous, pruneaux secs, bananes sèches, copeaux de noix de coco...', 'plateauFruitsSecs.jpg', 32.00, 4),
(10, 3, 'Mélange de fruits secs', 'Composés de différents sachets de 250g : des marrons, des cacahouètes, des amandes grillés et des noisettes.', 'melangeMarrons.jpg', 25.00, 7),
(11, 3, 'Mélange de noisettes', 'Sachet de 500g composé de noisettes, noix et amandes grillées. Une fois goûtés, on ne peut plus s\'en passer', 'melangeNoisettes.png', 8.30, 4),
(12, 3, 'Sachet d\'amandes grillées', 'Sachet de 500g, grillées lentement au four pour plus de plaisir en bouche lors de la dégustation !', 'amandes.jpg', 9.90, 10),
(13, 1, 'Jus de citron', 'Bouteille d\'un litre de jus de citron frais issus d\'agricultures responsables et biologiques', 'jusCitron.jpg', 5.20, 3),
(14, 1, 'Jus de pommes', 'Pommes issues d\'agricultures biologiques.\r\nBouteille d\'un litre dans une bouteille en verre ', 'jusPomme.jpg', 3.20, 5),
(15, 1, 'Jus de pamplemousse', 'Bouteille d\'un litre et demi sans sucre et sans colorant ajoutés. 100% naturel au bon goût de pamplemousse', 'jusPamplemousse.jpg', 7.30, 7),
(16, 1, 'Jus d\'orange', 'Oranges provenant d\'agricultures locales et biologiques.\r\nCette bouteille d\'un litre permet de se réveiller en douceur le matin.', 'jusOrange.jpg', 4.60, 19),
(17, 1, 'Sachet de café en grain', 'sachet d\'un kilogramme de café en grain, pour garder l\'authentique goût du café pour bien commencer la journée', 'cafeGrain.jpg', 15.00, 5),
(18, 1, 'Capsules de café', 'Paquet de 50 capsules. Adaptable pour toute sortes de machines à café avec capsules', 'cafeCapsule.jpg', 45.00, 11),
(19, 1, 'Dosettes de café', 'Paquet de 30 dosettes de café. Longue date de conservation. Emballage recyclable respectant l\'environnement', 'dosetteCafe.png', 28.10, 20),
(20, 1, 'Sachets de thé à la canelle', '15 sachets à l\'authentique gout de thé à la cannelle. Nouveauté chez Web4Shop ! ', 'theCannelle.jpg', 10.50, 9),
(21, 1, 'Infusion à la verveine', 'Recommandé pour profiter de nuits calmes.\r\nVendus par paquet de 15 sachets.', 'infusionVerveine.jpg', 8.90, 4),
(22, 1, 'Thé vert', '20 sachets de thé vert. Les adeptes en raffolent et on comprend bien pourquoi ! ', 'theVert.jpg', 13.90, 13),
(23, 1, 'Infusion au citron', 'Paquet de 20 sachets d\'infusion au citron pour partager un moment unique avec les plus petits ou les plus grands', 'infusionCitron.jpg', 15.30, 15),
(24, 2, 'Macarons tout chocolat', 'Macarons uniques au chocolat. Vendus par 10 macarons dans une très belle boîte ', 'macaronChocolat.jpg', 20.50, 18),
(25, 2, 'Boules de neige', 'Boules aromatisées à la noix de coco.\r\nPlateau de 200g. Idée cadeau qui va plaire aux adeptes de la noix de coco !', 'bouleDeNeigeCoco.jpg', 10.80, 6),
(26, 2, 'Cookies au pépites de chocolat', 'Cookies croquants préparés avec de l\'avoine et des pépites de chocolat fondantes.\r\nPaquet de 15 cookies', 'cookiesChocolat.jpg', 12.30, 10),
(27, 2, 'Biscuits étoile à la cannelle', 'Biscuits secs pour noël à l\'authentique goût de la cannelle. L\'éveil des sens avec ces saveurs est assuré !', 'biscuitsCannelle.jpg', 13.50, 13),
(28, 2, 'Biscuits en forme de tortue', 'Paquet de 20 petits biscuits en forme de tortue. Goût chocolat vanille. Leur très jolie forme va séduire tout le monde !', 'biscuitsTortue.jpg', 25.30, 19);

-- --------------------------------------------------------

--
-- Structure de la table `produitspanier`
--

CREATE TABLE `produitspanier` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_panier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produitspanier`
--

INSERT INTO `produitspanier` (`id`, `id_product`, `id_panier`) VALUES
(18020, 13, NULL),
(18021, 4, NULL),
(18022, 7, NULL),
(18023, 8, 2),
(18027, 8, 2),
(18029, 8, 2),
(18045, 13, 2),
(18046, 5, 2),
(18047, 6, 2),
(18049, 13, 2),
(18051, 13, 2),
(18052, 13, 2),
(18053, 5, 2),
(18054, 6, 2),
(18058, 7, 2),
(18059, 13, 2),
(18060, 13, 2),
(18061, 14, 2),
(18070, 13, 2),
(18174, 20, 11),
(18176, 13, 11),
(18179, 13, 18),
(18180, 5, 18),
(18181, 5, 18),
(18182, 5, 18),
(18183, 5, 18),
(18184, 13, 18),
(18196, 16, 24),
(18197, 13, 24),
(18198, 13, 24),
(18199, 14, 24),
(18200, 7, 20),
(18201, 8, 20),
(18202, 9, 20),
(18203, 9, 20),
(18204, 13, 28),
(18205, 13, 29),
(18206, 13, 30),
(18207, 16, 32),
(18208, 17, 32),
(18209, 16, 34),
(18210, 13, 33),
(18211, 13, 35),
(18212, 4, 38),
(18213, 13, 39),
(18214, 13, 43),
(18215, 13, 43),
(18216, 13, 43),
(18217, 14, 48),
(18218, 15, 48),
(18219, 14, 50),
(18220, 13, 53),
(18221, 23, 53),
(18222, 7, 54),
(18223, 7, 55),
(18224, 7, 55),
(18225, 16, 56),
(18226, 20, 56),
(18227, 16, 57),
(18228, 16, 57),
(18229, 16, 57),
(18230, 16, 57),
(18231, 5, 58),
(18232, 22, 59),
(18233, 17, 59),
(18234, 14, 62),
(18235, 14, 64),
(18236, 16, 67),
(18237, 14, 67),
(18238, 13, 68),
(18239, 5, 69),
(18240, 4, 72),
(18241, 14, 109),
(18242, 17, 109),
(18248, 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id_product` int(2) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `photo_user` varchar(50) NOT NULL,
  `stars` int(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id_product`, `name_user`, `photo_user`, `stars`, `title`, `description`) VALUES
(28, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop beau et trop bon '),
(13, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(4, 'Charlène', 'femme.png', 5, 'Excellent !', 'Ils sont trop bons, je recommande vraiment ces biscuits secs, je ne peux plus m\'en passer ! '),
(24, 'Helène', 'femme.png', 4, 'Vraiment excellent ', 'Je recommande vivement ces macarons, ils ont un gout authentiques et en plus ils ne sont pas très chers '),
(26, 'Marc', 'homme.jpg', 4, 'Très bon rapport qualité prix', 'Ils sont vraiment excellents. Je ne sais pas cuisiner alors je les achète et on dirait vraiment des cookies faits maison !'),
(26, 'Sylvie', 'femme.png', 3, 'Je recommande !', 'Vraiment bons et très craquants, j\'en rachèterai '),
(16, 'Mélanie', 'femme.png', 5, 'Tellement bon ! ', 'Ce jus est incroyablement bon c\'est un plaisir de déjeuner le matin avec un jus d\'orange si frais '),
(23, 'Lilian', 'homme.jpg', 3, 'Je suis fan', 'Moi qui suis fan d\'infusion, c\'est vraiment de la qualité ! peut être un peu cher mais vraiment le prix a payer pour bénéficier de si bonnes infusions'),
(15, 'Elise', 'femme.png', 5, 'Tellement bon !!', 'Je recommande vivement, j\'achète toujours ce bon jus et il fait l\'unanimité à la maison'),
(25, 'Jean', 'homme.jpg', 4, 'Bon goût de noix de coco', 'Vraiment bon, pour les fêtes de Noël, chaque années elles sont très appréciées'),
(11, 'Christophe', 'homme.jpg', 4, 'Trop bon et livraison rapide', 'Ces fruits secs sont vraiment à croquer, et ils sont très vite virés à la maison '),
(12, 'Christine', 'femme.png', 3, 'Trop bon ! ', 'Les amandes sont vraiment bonnes, le paquet ne fait pas longtemps à la maison ! je recommande '),
(7, 'Marie', 'femme.png', 4, 'Une qualité inégalable', 'Les pruneaux sont vraiment excellents je recommande'),
(21, 'Léa', 'femme.png', 4, 'Des très bonnes infusions', 'Un goût intensément bon et une livraison rapide'),
(6, 'Liliane', 'femme.png', 3, 'De très bons biscuits ', 'Vraiment trop bon !! '),
(5, 'Christine', 'femme.png', 4, 'Original', 'Ces biscuits sont excellents; testés récemment! un délice!'),
(4, 'Florian', 'homme.jpg', 5, 'J\'adore', 'Ces biscuits secs sont très bons. ils sont variés et très parfumés; je recommande ce produit.'),
(6, 'Victor', 'homme.jpg', 4, 'une tuerie!', 'les biscuits sont vraiment très bons; très garnis; à tester sans modération!'),
(28, 'Sophie', 'femme.png', 5, 'original!', 'si vous voulez opter pour des biscuits Originaux, vous ne serez pas déçus! et en plus, ils sont bons!'),
(27, 'Bernard', 'homme.jpg', 5, 'un délice', 'des biscuits très parfumés qui rappellent les biscuits de mon enfance avec ce bon parfum de cannelle! Je vous le recommande...'),
(25, 'Huguette', 'femme.png', 3, 'bon', 'Des biscuits assez parfumés, tendre et sucrés juste ce qu\'il faut. bon produit'),
(18, 'Gilbert', 'homme.jpg', 5, 'très bien', 'des capsules de très bonne qualité; très bon rapport qualité prix; je recommande ce produit'),
(26, 'Juliette', 'femme.png', 5, 'comme à la maison', 'excellents biscuits; aussi bons que ceux que l\'on fait soi même!'),
(19, 'Corinne', 'femme.png', 5, 'très bon produit', 'des dosettes de très bonne qualité que je recommande'),
(23, 'Lila', 'femme.png', 5, 'bon produit', 'Une infusion excellente pour la digestion. Un gout acidulé et un très bon rapport qualité prix. Je recommande ce produit'),
(21, 'Julien', 'homme.jpg', 4, 'Parfumée', 'Une infusion très parfumée avec un gout authentique! très bon produit!'),
(16, 'Claudine', 'femme.png', 5, 'Bon produit', 'ce jus d\'orange est très parfumé. Peu c!alorique, et sans additif; naturel et sa pulpe est agréable. je vous le conseille'),
(13, 'Yvette', 'femme.png', 5, 'excellent', 'produit de qualité aussi bien en cuisine que pour désaltérer; je vous invite à l\'essayer!'),
(15, 'Sylvie', 'femme.png', 4, 'désaltérant', 'très bon produit; sans additif donc très naturel; à essayer sans hésiter!'),
(14, 'AHMED', 'homme.jpg', 5, 'excellent!', 'Un très bon produit; ce jus a un délicieux gout acidulé; parfait pour un gouter ou pour bien démarrer la journée!'),
(24, 'Claudette', 'femme.png', 4, 'savoureux', 'des macarons au top; un produit qui est de très bonne qualité; tendre et fondant dans la bouche; à consommer sans modération\r\n'),
(10, 'Hortense', 'femme.png', 4, 'à conseiller', 'un mélange idéal pour le petit déjeuner ou avant l\'effort; les amandes et les noisettes sont excellentes; je recommande'),
(11, 'LOUIS', 'homme.jpg', 4, 'exquis!', 'des fruits secs de bonne qualité; je recommande ce produit sans hésiter'),
(9, 'Catherine', 'femme.png', 5, 'idée cadeau', 'ce plateau très garni et excellent est une très bonne idée cadeau; à savourer sans modération ; je vous invite à essayer!'),
(7, 'Jules', 'homme.jpg', 5, 'avant l\'effort', 'des pruneaux d\'un gros calibre; idéal avant une activité sportive ou simplement en cas de petite faim! je recommande!'),
(8, 'Virginie', 'femme.png', 5, 'miam', 'Parfait pour commencer la journée: ces abricots sont excellents; le prix est raisonnable. Je recommande ce produit'),
(12, 'Severine', 'femme.png', 3, 'très bon produit', 'je recommande ces amandes grillées; elles sont grillées à point et complètent agréablement une recette; à essayer!'),
(17, 'sabrina', 'femme.png', 5, 'à essayer', 'un café doux et savoureux dans un emballage de qualité. le prix est raisonnable; je recommande!'),
(20, 'Dominique', 'homme.jpg', 3, 'bon', 'un produit de qualité; ce thé est parfumé et on apprécie le gout délicat de la cannelle; je vous le recommande.'),
(22, 'Sylvain', 'homme.jpg', 5, 'délicieux', 'une boisson très parfumée; idéale pour bien démarrer la journée; à essayer les yeux fermés.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produitspanier`
--
ALTER TABLE `produitspanier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_product` (`id_product`),
  ADD KEY `FK_id_panier` (`id_panier`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT pour la table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `produitspanier`
--
ALTER TABLE `produitspanier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18249;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produitspanier`
--
ALTER TABLE `produitspanier`
  ADD CONSTRAINT `FK_id_panier` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id_panier`),
  ADD CONSTRAINT `FK_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
