-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 11 mai 2022 à 07:22
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `speed-cash`
--

-- --------------------------------------------------------

--
-- Structure de la table `calcul_cotisation`
--

CREATE TABLE `calcul_cotisation` (
  `id` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` bigint(11) NOT NULL,
  `pourcentage_cotisation` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `calcul_cotisation`
--

INSERT INTO `calcul_cotisation` (`id`, `min`, `max`, `pourcentage_cotisation`) VALUES
(1, 0, 200000, 0),
(2, 200000, 800000, 0.8),
(3, 800000, 1500000, 0.6),
(4, 1500000, 3000000, 0.4),
(5, 3000000, 100000000000, 0.3);

-- --------------------------------------------------------

--
-- Structure de la table `cards_client`
--

CREATE TABLE `cards_client` (
  `id` int(11) NOT NULL,
  `number` text NOT NULL,
  `expiry_date` text NOT NULL,
  `delivry_date` text,
  `client_id` int(11) NOT NULL,
  `cvc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cards_client`
--

INSERT INTO `cards_client` (`id`, `number`, `expiry_date`, `delivry_date`, `client_id`, `cvc`) VALUES
(6, '4242424242424242', '2022-01', NULL, 91, 209);

-- --------------------------------------------------------

--
-- Structure de la table `code_promo`
--

CREATE TABLE `code_promo` (
  `id` int(11) NOT NULL,
  `code_name` varchar(255) NOT NULL,
  `reduction` float DEFAULT '1',
  `date_expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `code_promo`
--

INSERT INTO `code_promo` (`id`, `code_name`, `reduction`, `date_expiry`) VALUES
(4, 'LIAM2023', 0.8, '2023-09-30'),
(5, 'liam', 1, '2022-05-26');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `heureCommande` time DEFAULT NULL,
  `dateCommande` date DEFAULT NULL,
  `montant` double NOT NULL,
  `id_client` int(11) NOT NULL,
  `stripe_id` text NOT NULL,
  `num_commande` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `heureCommande`, `dateCommande`, `montant`, `id_client`, `stripe_id`, `num_commande`) VALUES
(1, '19:57:47', '2022-04-14', 49, 91, '0', '0'),
(2, '17:55:43', '2022-04-17', 99, 0, '0', '0'),
(3, '17:55:43', '2022-04-17', 189, 91, '0', '0'),
(22, '21:38:39', '2022-04-19', 237, 91, 'ch_3KqMskLvgKkU1KjF077p5zct', '0'),
(28, '21:53:31', '2022-04-19', 219, 92, 'ch_3KqN78LvgKkU1KjF1JDDLwIi', '0'),
(29, '23:22:06', '2022-04-19', 168, 92, 'ch_3KqOUrLvgKkU1KjF10eQ6cz3', 'RF#2839931'),
(30, '23:23:13', '2022-04-19', 168, 92, 'ch_3KqOUrLvgKkU1KjF10eQ6cz3', 'RF#8177581'),
(31, '23:23:21', '2022-04-19', 168, 92, 'ch_3KqOUrLvgKkU1KjF10eQ6cz3', 'RF#7532962'),
(32, '23:23:32', '2022-04-19', 168, 92, 'ch_3KqOUrLvgKkU1KjF10eQ6cz3', 'RF#2183655'),
(33, '01:54:40', '2022-04-21', 336, 100, 'ch_3KqnHWLvgKkU1KjF0f5QwWu7', 'RF#5477784'),
(34, '01:54:51', '2022-04-21', 336, 100, 'ch_3KqnHWLvgKkU1KjF0f5QwWu7', 'RF#9769390'),
(35, '01:54:52', '2022-04-21', 336, 100, 'ch_3KqnHWLvgKkU1KjF0f5QwWu7', 'RF#3872681'),
(36, '01:54:55', '2022-04-21', 336, 100, 'ch_3KqnHWLvgKkU1KjF0f5QwWu7', 'RF#1241122'),
(37, '15:49:29', '2022-05-01', 1572, 100, 'ch_3Kud9QLvgKkU1KjF19rNyMzt', 'RF#5505776'),
(38, '15:49:47', '2022-05-01', 1572, 100, 'ch_3Kud9QLvgKkU1KjF19rNyMzt', 'RF#9367291'),
(39, '15:56:48', '2022-05-01', 72, 100, 'ch_3KudGVLvgKkU1KjF1czrewc1', 'RF#7339356'),
(40, '15:33:36', '2022-05-08', 238, 100, 'ch_3KxAEtLvgKkU1KjF1vAI0z7M', 'RF#9800981'),
(41, '15:35:34', '2022-05-08', 17800, 100, 'ch_3KxAGnLvgKkU1KjF0smbmUzg', 'RF#2788271'),
(42, '23:30:29', '2022-05-09', 39600, 100, 'ch_3Kxe9wLvgKkU1KjF0il8W8RL', 'RF#1599742'),
(43, '23:30:44', '2022-05-09', 39600, 100, 'ch_3Kxe9wLvgKkU1KjF0il8W8RL', 'RF#6787587'),
(44, '02:23:31', '2022-05-11', 128800, 100, 'ch_3Ky3KwLvgKkU1KjF1tbKNVyK', 'RF#5474450'),
(45, '02:24:15', '2022-05-11', 128800, 100, 'ch_3Ky3KwLvgKkU1KjF1tbKNVyK', 'RF#7763396'),
(46, '02:30:31', '2022-05-11', 128800, 100, 'ch_3Ky3KwLvgKkU1KjF1tbKNVyK', 'RF#3619152'),
(47, '02:33:57', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#6354630'),
(48, '02:34:49', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#8222956'),
(49, '02:34:52', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#1664505'),
(50, '02:35:01', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#8117651'),
(51, '02:35:01', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#2000265'),
(52, '02:35:04', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#5814910'),
(53, '02:35:11', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#5168080'),
(54, '02:35:14', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#4057148'),
(55, '02:36:11', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#6550502'),
(56, '02:36:17', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#8250640'),
(57, '02:36:28', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#5034310'),
(58, '02:36:37', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#4734673'),
(59, '02:36:40', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#2806633'),
(60, '02:36:42', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#2291090'),
(61, '02:37:18', '2022-05-11', 30700, 100, 'ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'RF#7303390'),
(83, '03:12:10', '2022-05-11', 30700, 100, 'ch_3Ky44sLvgKkU1KjF0W65Na7e', 'RF#1828019'),
(84, '03:13:29', '2022-05-11', 30700, 100, 'ch_3Ky47ILvgKkU1KjF0CmPuxk1', 'RF#4222299'),
(85, '03:13:39', '2022-05-11', 30700, 100, 'ch_3Ky47ILvgKkU1KjF0CmPuxk1', 'RF#5727878'),
(86, '03:14:00', '2022-05-11', 30700, 100, 'ch_3Ky47ILvgKkU1KjF0CmPuxk1', 'RF#3843573'),
(87, '03:14:17', '2022-05-11', 30700, 100, 'ch_3Ky47ILvgKkU1KjF0CmPuxk1', 'RF#7119981'),
(88, '03:15:01', '2022-05-11', 30700, 100, 'ch_3Ky47ILvgKkU1KjF0CmPuxk1', 'RF#9772981'),
(89, '03:15:16', '2022-05-11', 30700, 100, 'ch_3Ky47ILvgKkU1KjF0CmPuxk1', 'RF#1664735'),
(90, '03:18:01', '2022-05-11', 30700, 100, 'ch_3Ky4BgLvgKkU1KjF0N1ofGBs', 'RF#4824754'),
(91, '03:19:08', '2022-05-11', 51600, 100, 'ch_3Ky4ClLvgKkU1KjF0lUZgSSa', 'RF#4784153');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `contenue` text NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(60) NOT NULL,
  `signaler` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `id_produit`, `contenue`, `date`, `user`, `signaler`) VALUES
(1, 4, 'Super cette souris est vraiment top, je la recommande vivement 5/5 !', '2022-05-06 20:56:05', 'Macquaire Liam', 0),
(2, 17, 'Rien à dire, un DisneyLand classique comme on connais...', '2022-05-06 20:57:07', 'Macquaire Liam', 0),
(3, 18, 'Super, je suis allé voir le tout dernier Spiderman grâce à cette réduction, Merci Speed-Cash !', '2022-05-06 20:58:01', 'Macquaire Liam', 0),
(4, 13, 'Super souris MSI pour débuter dans le gaming, niveau rapport qualité/prix, rien à dire je la recommande !', '2022-05-06 20:58:38', 'Macquaire Liam', 0),
(6, 13, 'J\'ai acheté cette souris pour mon fils il en est super content !', '2022-05-06 23:21:49', 'Igor DeSgore', 0),
(7, 13, 'Je suis super content de cette achat merci Speed-Cash !', '2022-05-06 23:21:49', 'Florence Magny', 0);

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `id` int(11) NOT NULL,
  `date_crea` text NOT NULL,
  `date_fin` text NOT NULL,
  `type` int(11) DEFAULT NULL,
  `path_contrat` text,
  `ref` text NOT NULL,
  `content` text NOT NULL,
  `mail` text NOT NULL,
  `id_entreprise_part` int(11) NOT NULL,
  `valid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`id`, `date_crea`, `date_fin`, `type`, `path_contrat`, `ref`, `content`, `mail`, `id_entreprise_part`, `valid`) VALUES
(1, '2022-04-30', '2023-04-30', 12, 'contrat/entreprise-disney.png', '', '', '', 1, NULL),
(2, '2022-04-28', '2023-04-28', 7, '../path/contrat', '', '', '', 2, NULL),
(3, '2022-05-06', '2023-05-06', 8, 'contrat/bowling-pdg', '162748724', 'yguegrehr', 'bowling-pdg@gmail.com', 3, 1),
(4, '2022-05-09', '2023-05-09', 7, 'contrat/aquaboulvard-pdg', '32683724', 'ezezrezfezf', 'aquaboulvard-pdg@gmail.com', 4, 1),
(7, '2022-05-11', '05/17/2022', NULL, NULL, '131312', 'sdfsdfdfsf', 'azerty@gmail.com', 1, NULL),
(8, '2022-05-11', '09/15/2023', NULL, NULL, '1431243', 'iuzedhzuierhrzrezeze', 'williamflorentin@outlook.com', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `created_at`) VALUES
('cus_LbqrJCmpo0J2dJ', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-01 15:49:29'),
('cus_Lbqy0otUjpbt8G', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-01 15:56:48'),
('cus_LeTBMreyZM1BeJ', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-08 15:33:36'),
('cus_LeTDT9ymocnXfN', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-08 15:35:34'),
('cus_Ley6nhAbeoistd', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-09 23:30:29'),
('cus_LfO7gXcPJzEZU1', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 02:23:31'),
('cus_LfOgoZRqFWjqKE', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 02:58:56'),
('cus_LfOh3CUiMqDq7a', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 02:59:45'),
('cus_LfOHdtAscACeAj', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 02:33:57'),
('cus_LfOig0k83YwfTU', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 03:01:15'),
('cus_LfOo9NLYCmg8PM', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 03:06:28'),
('cus_LfOoF2goNE2zVF', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 03:07:17'),
('cus_LfOonsz7amUFtP', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 03:06:47'),
('cus_LfOrD1VCoOMI4P', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 03:10:13'),
('cus_LfOs1ZiM4UQS7K', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 03:10:59'),
('cus_LfOsdSiC2zCPnP', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 03:10:31'),
('cus_LfOv2JJimtadeJ', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 03:13:29'),
('cus_LfOzla0kHf2duv', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 03:18:01'),
('cus_LfP0CBVk62UJaB', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-05-11 03:19:08'),
('cus_LPxkOn62qHQKA3', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-03-30 22:09:20'),
('cus_LQF3E7A0acAja0', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-03-31 16:02:15'),
('cus_LQF7sbnpBeldYb', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-03-31 16:05:26'),
('cus_LQFu6sT88WDAwz', '', '', '', '2022-03-31 16:54:37'),
('cus_LQFvERSeVB32uD', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-03-31 16:55:25'),
('cus_LQG2JoyiSegrMz', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-03-31 17:03:00'),
('cus_LQG5z4LpyMrALa', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-03-31 17:06:13'),
('cus_LXMsaDzzNkpOuN', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 16:35:04'),
('cus_LXMsBwhUmd5dZs', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 16:34:36'),
('cus_LXMtCuL27HFCbw', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 16:35:32'),
('cus_LXNm6zvqcXHIwr', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 17:30:22'),
('cus_LXNmeknSJK7Hr2', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 17:31:14'),
('cus_LXNneEnM54syE5', 'Liam', 'Macquaire', 'liam.macquaire2002@gmail.com', '2022-04-19 17:31:59'),
('cus_LXNovmTIC9xC6g', 'Liam', 'Macquaire', 'liam.macquaire2002@gmail.com', '2022-04-19 17:32:31'),
('cus_LXNpJSwSrfNOv2', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 17:34:12'),
('cus_LXNqpTmEThLETi', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 17:34:34'),
('cus_LXNrSF29ZRVrmX', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 17:36:20'),
('cus_LXNsCy7oYPqxQU', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 17:36:55'),
('cus_LXNuo9QFUOjRTM', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 17:39:12'),
('cus_LXNwKzwCvRHhoQ', 'Liam', 'Macquaire', 'liam.macquaire2002@gmail.com', '2022-04-19 17:41:04'),
('cus_LXNx89hgfxfplC', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 17:41:37'),
('cus_LXNy1aA5NuroON', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 17:42:58'),
('cus_LXNzsVPgMx6lKY', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 17:43:41'),
('cus_LXO0v1rvipRphL', 'Liam', 'Macquaire', 'liam.macquaire2002@gmail.com', '2022-04-19 17:44:34'),
('cus_LXO1Lej8tZhffB', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 17:46:17'),
('cus_LXO5LSwmk52eHS', 'Liam', 'Macquaire', 'liam.macquaire2002@gmail.com', '2022-04-19 17:49:49'),
('cus_LXO892TlgC8phQ', 'Liam', 'Macquaire', 'liam.macquaire2002@gmail.com', '2022-04-19 17:52:57'),
('cus_LXOagthVoNfLTt', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:21:18'),
('cus_LXOaX7pPjTSqw4', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:20:35'),
('cus_LXOBfoDeB2jADe', 'Liam', 'Macquaire', 'liam.macquaire2002@gmail.com', '2022-04-19 17:56:01'),
('cus_LXObHMGWn2K6CP', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:21:39'),
('cus_LXOc4yjMW738Kc', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:22:47'),
('cus_LXOd1XmPapslQl', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:24:05'),
('cus_LXOe3OUTkgWtKo', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:24:44'),
('cus_LXOgn5TcxmdHeL', 'Liam', 'Macquaire', 'liam.macquaire2002@gmail.com', '2022-04-19 18:26:57'),
('cus_LXOjvxlVSFeFqU', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:29:30'),
('cus_LXOObJtAPfTlnf', 'Liam', 'Macquaire', 'liam.macquaire2002@gmail.com', '2022-04-19 18:08:37'),
('cus_LXOOeGzTHdNn9U', 'Liam', 'Macquaire', 'liam.macquaire2002@gmail.com', '2022-04-19 18:09:12'),
('cus_LXOpDtUqb6BkTw', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:35:24'),
('cus_LXOqCkGIxxXXXS', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:36:44'),
('cus_LXOqcPBsK4tvsu', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:36:27'),
('cus_LXOSNm9LxrXxSn', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:12:54'),
('cus_LXOSUHmLXLdqTo', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:12:30'),
('cus_LXOTHHWDFnpQtf', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:13:38'),
('cus_LXOU2FBJwYwCaO', 'Liam', 'Macquaire', 'liam.macquaire2002@gmail.com', '2022-04-19 18:15:01'),
('cus_LXOUMSMnj0DrBt', 'Liam', 'Macquaire', 'liam.macquaire2002@gmail.com', '2022-04-19 18:15:20'),
('cus_LXOVCzEfijNz8d', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:15:44'),
('cus_LXOWHJPAf4JxFr', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:17:02'),
('cus_LXOY3v3EA9X5Df', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:19:04'),
('cus_LXOZriYkVlh9Yd', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 18:20:07'),
('cus_LXRAe7LfWaSpkY', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:01:00'),
('cus_LXREJiisTKGiTS', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:04:58'),
('cus_LXReUhQiSWbtFQ', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:30:37'),
('cus_LXRJWbK8zGKJTT', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:09:39'),
('cus_LXRKM05uRqi72O', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:10:27'),
('cus_LXRKrczyvjbQLw', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:10:58'),
('cus_LXRLRQjTcasDYj', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:11:48'),
('cus_LXRMBxLmzW1ymP', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:12:47'),
('cus_LXRmlBYnq66Soq', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:38:39'),
('cus_LXROpyihOC1S6S', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:14:43'),
('cus_LXRPKZesd6Wyye', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:15:35'),
('cus_LXRQ2zwB4ki2Ga', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:16:28'),
('cus_LXRSj75PjgdbC6', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:18:52'),
('cus_LXS1YpgPyZCYK6', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 21:53:31'),
('cus_LXt30uItD04zhD', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-21 01:49:59'),
('cus_LXTRfQdVYSUpyq', 'Liam', 'Macquaire', 'liamdu92@gmail.com', '2022-04-19 23:22:06');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `nb_siret` varchar(14) NOT NULL,
  `type_societe` varchar(10) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `adresse_entreprise` varchar(255) NOT NULL,
  `type_abonnement` varchar(55) NOT NULL DEFAULT 'annuel',
  `subscription_end` date DEFAULT NULL,
  `payer_id` varchar(255) DEFAULT NULL,
  `profile_id` varchar(255) DEFAULT NULL,
  `chiffre_affaire` bigint(20) NOT NULL,
  `montant_payé` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `id_client`, `nb_siret`, `type_societe`, `tel`, `nom_entreprise`, `adresse_entreprise`, `type_abonnement`, `subscription_end`, `payer_id`, `profile_id`, `chiffre_affaire`, `montant_payé`) VALUES
(21, 100, '623784623784', 'SAS', '07282932', 'MARAMCORP', '8 avenue leballeur', 'annuel', '2023-05-09', NULL, NULL, 150000000, 450000);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise_part`
--

CREATE TABLE `entreprise_part` (
  `id` int(11) NOT NULL,
  `id_user_part` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_contrat_part` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise_part`
--

INSERT INTO `entreprise_part` (`id`, `id_user_part`, `nom`, `id_contrat_part`) VALUES
(1, 101, 'Disney', 1),
(2, 102, 'Grand-Rex', 2),
(5, 105, 'Aquaboulvard PDG', 4),
(6, 106, 'Bowling PDG', 3);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
  `ref_article` varchar(30) NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `ref_article`, `id_commande`) VALUES
(1, 'RFFR100001', 22);

-- --------------------------------------------------------

--
-- Structure de la table `fich_tech`
--

CREATE TABLE `fich_tech` (
  `id` int(11) NOT NULL,
  `batterie` varchar(255) DEFAULT NULL,
  `id_produit` int(11) NOT NULL,
  `connexion` varchar(255) DEFAULT NULL,
  `poids` double DEFAULT NULL,
  `dimension` varchar(255) DEFAULT NULL,
  `couleur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note_produits`
--

CREATE TABLE `note_produits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note_produits`
--

INSERT INTO `note_produits` (`id`, `user_id`, `produit_id`, `note`) VALUES
(17, 74, 4, 4),
(20, 74, 3, 1),
(21, 75, 3, 4),
(22, 73, 3, 1),
(23, 73, 4, 2),
(24, 74, 5, 0),
(25, 74, 10, 2),
(26, 74, 13, 5),
(27, 74, 11, 5),
(28, 89, 4, 0),
(29, 100, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `prix` float NOT NULL,
  `nom` varchar(30) NOT NULL,
  `note` float DEFAULT '0',
  `description` varchar(300) NOT NULL,
  `categorie` text,
  `depot` int(11) DEFAULT NULL,
  `marque` text,
  `ref_fournisseur` text,
  `remise` float DEFAULT '0',
  `TVA` float DEFAULT NULL,
  `sous_categorie` text,
  `fournisseur` text,
  `modele` text,
  `date_enter` date DEFAULT NULL,
  `stock` int(11) DEFAULT '0',
  `id_fich_tech` int(11) DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `id_part` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `prix`, `nom`, `note`, `description`, `categorie`, `depot`, `marque`, `ref_fournisseur`, `remise`, `TVA`, `sous_categorie`, `fournisseur`, `modele`, `date_enter`, `stock`, `id_fich_tech`, `date_end`, `id_part`, `type`) VALUES
(3, 99, 'Souris Razer Basilisk V2', 1.5, 'Quel que soit le type de jeu ou encore votre style de jeu, la Razer Basilisk V2 répond toujours présente. Sans fil, cette souris dispose de deux modes de fonctionnement pour vous garantir une liberté incroyable.', 'Gamer', 1, 'Razer', NULL, 0, 1, 'PC', NULL, NULL, '2022-05-10', 999, 123, NULL, NULL, 'produit'),
(4, 109, 'Souris Razer DeathAdderV2', 2, 'Venez à bout des adversaires les plus coriaces avec la souris Razer DeathAdder v2 Pro et sa double connectivité sans fil RF 2.4 GHz/Bluetooth 5.0. Offrant une totale liberté de mouvement et de contrôle, elle intègre un capteur optique Razer Focus+ de 20000 dpi et 8 boutons programmables.', 'Gamer', 1, 'Razer', NULL, 0, 1.1, 'PC', NULL, NULL, '2022-05-07', 999, 121, NULL, NULL, 'produit'),
(5, 129, 'ASUS ROG Spatha X', 0, 'Pour vous mesurer à vos adversaires, la souris ASUS ROG Spatha X sera un allié de poids. Sans fil via la connectivité RF 2.4 GHz ou filaire, cette souris offre 12 boutons programmables, un capteur optique de 12000 DPI et un rétroéclairage RGB personnalisable. ', 'Gamer', 2, 'ASUS', NULL, 0, 1, 'PC', NULL, NULL, '2022-05-08', 999, 122, NULL, NULL, 'produit'),
(10, 179, 'Corsair Gaming Nightsword', 2, '8 boutons programmables, éclairage LED RGB  4 zones, poids ajustable de 119 gr à 141 gr et sensibilité réglable au DPI près, la Corsair Nightsword RGB vous permettra de relever tous les défis en s\'adaptant à votre style de jeu. ', 'Gamer', 2, 'Corsair', NULL, 0, 1, 'PC', NULL, NULL, '2022-05-09', 999, 119, NULL, NULL, 'produit'),
(11, 79, 'Logitech Pro X Superlight', 5, 'Foncez vers la victoire grâce à la souris Logitech Wireless Gaming Pro X Superlight. Nouvelle arme de prédilection des meilleurs athlètes professionnels d\'eSports, elle pèse moins de 63 grammes et offre un glissement sans l moindre friction.', 'Gamer', 2, 'Logitech', NULL, 0, 1, 'PC', NULL, NULL, '2022-05-01', 1000, 120, NULL, NULL, 'produit'),
(12, 89, 'LogitechG G502 Lightspeed', 0, 'Disposant d\'une conception sans fil avec technologie Lightspeed, la Logitech G502 Lightspeed fera de vous une machine redoutable et redoutée. En effet, elle est équipée d\'un capteur optique HERO de 16000 dpi pour une précision et une réactivité optimale.', 'Gamer', 3, 'Logitech', NULL, 0, 1, 'PC', NULL, NULL, '2022-05-02', 1000, 118, NULL, NULL, 'produit'),
(13, 59, 'MSI Clutch GM50', 5, 'Gardez la main sur votre jeu avec la souris gaming MSI Clutch GM50 ! Parfaite pour les FPS, elle s\'appuie sur une conception minutieuse pour vous offrir une nouvelle expérience de jeu. Son capteur optique PMW-3330 permet de réaliser des mouvements d\'une très grande précision.', 'Gamer', 4, 'MSI', NULL, 0, 1, 'PC', NULL, NULL, '2022-04-06', 1000, 117, NULL, NULL, 'produit'),
(14, 199, 'Razer Atheris (Mercury)', 0, 'Optimisée à la fois pour le travail et le jeu, la souris sans fil Razer Atheris vous permettra de tirer le meilleur de vous-même. Cette souris de poche vous sera utile pour jongler entre les réunions et le champ de bataille grâce notamment à une double connectivité et à une autonomie longue durée.', 'Gamer', 5, 'Razer', NULL, 0, 1, 'PC', NULL, NULL, '2022-04-06', 1000, 116, NULL, NULL, 'produit'),
(15, 159, 'Razer Basilisk v3', 0, 'Devenez imbattable grâce à la souris pour gamer Razer Basilisk v3. Embarquant un capteur optique Razer Focus+ de 26 000 dpi, elle vous offre une précision féroce afin que vous ne ratiez plus jamais votre cible. Et avec 11 boutons programmables, vous disposez d\'un arsenal de commandes à portée.', 'Gamer', 3, 'Razer', NULL, 0, 1, 'PC', NULL, NULL, '2022-04-06', 1000, 115, NULL, NULL, 'produit'),
(17, 62, 'Billet de DisneyLand', 0, 'Grâce à nous vous pouvez aller voyager dans l\'univers de Mickey', 'Parc Attraction', NULL, NULL, NULL, 0.8, 1.05, NULL, NULL, NULL, '2022-05-09', 10, NULL, '2022-05-11', 1, 'prestation'),
(18, 10, 'Billet cinéma Grand-Rex', 0, 'Vous pouvez obtenir des places au cinéma le Grand-rex à prix réduit !', 'Cinéma', NULL, NULL, NULL, 0.7, 1.1, NULL, NULL, NULL, '2022-05-08', 10, NULL, '2022-05-12', 2, 'prestation'),
(20, 5, 'Billet pour Bowling', 0, 'Passez un super moment avec vos amis en jouant au Bowling grâce à Bowling', 'Loisirs', NULL, NULL, NULL, 0.7, 1.05, NULL, NULL, NULL, '2022-05-11', 20, NULL, '2022-05-28', 3, 'prestation'),
(21, 12, 'Billet pour Aquaboulevard', 0, 'Passez un super moment à la piscine avec vos amis, parfait pour un anniversaire !', 'Loisirs', NULL, NULL, NULL, 0.8, 1.1, NULL, NULL, NULL, '2022-05-12', 100, NULL, '2022-05-28', 4, 'prestation');

-- --------------------------------------------------------

--
-- Structure de la table `produits_commandes`
--

CREATE TABLE `produits_commandes` (
  `id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits_commandes`
--

INSERT INTO `produits_commandes` (`id`, `produit_id`, `commande_id`) VALUES
(3, 3, 22),
(4, 4, 22),
(11, 14, 28),
(12, 15, 28),
(13, 13, 28),
(14, 3, 29),
(15, 4, 29),
(16, 3, 30),
(17, 4, 30),
(18, 3, 31),
(19, 4, 31),
(20, 3, 32),
(21, 4, 32),
(22, 3, 33),
(23, 4, 33),
(24, 3, 34),
(25, 4, 34),
(26, 3, 35),
(27, 4, 35),
(28, 3, 36),
(29, 4, 36),
(30, 17, 37),
(31, 18, 37),
(32, 3, 37),
(33, 17, 38),
(34, 18, 38),
(35, 3, 38),
(36, 17, 39),
(37, 18, 39),
(38, 5, 40),
(39, 4, 40),
(40, 12, 41),
(41, 12, 42),
(42, 5, 42),
(43, 3, 42),
(44, 11, 42),
(45, 12, 43),
(46, 5, 43),
(47, 3, 43),
(48, 11, 43),
(49, 3, 44),
(50, 4, 44),
(51, 3, 45),
(52, 4, 45),
(53, 3, 46),
(54, 4, 46),
(55, 4, 47),
(56, 3, 47),
(57, 4, 48),
(58, 3, 48),
(59, 4, 49),
(60, 3, 49),
(61, 4, 50),
(62, 3, 50),
(63, 4, 51),
(64, 3, 51),
(65, 4, 52),
(66, 3, 52),
(67, 4, 53),
(68, 3, 53),
(69, 4, 54),
(70, 3, 54),
(71, 4, 55),
(72, 3, 55),
(73, 4, 56),
(74, 3, 56),
(75, 4, 57),
(76, 3, 57),
(77, 4, 58),
(78, 3, 58),
(79, 4, 59),
(80, 3, 59),
(81, 4, 60),
(82, 3, 60),
(83, 4, 61),
(84, 3, 61),
(85, 3, 83),
(86, 4, 83),
(87, 3, 84),
(88, 4, 84),
(89, 3, 85),
(90, 4, 85),
(91, 3, 86),
(92, 4, 86),
(93, 3, 87),
(94, 4, 87),
(95, 3, 88),
(96, 4, 88),
(97, 3, 89),
(98, 4, 89),
(99, 3, 90),
(100, 4, 90),
(101, 3, 91),
(102, 4, 91),
(103, 10, 91),
(104, 5, 91);

-- --------------------------------------------------------

--
-- Structure de la table `qr_code`
--

CREATE TABLE `qr_code` (
  `id` int(11) NOT NULL,
  `path` text NOT NULL,
  `id_article` int(11) NOT NULL,
  `qr_table` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

CREATE TABLE `recuperation` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `confirme` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recuperation`
--

INSERT INTO `recuperation` (`id`, `mail`, `code`, `confirme`) VALUES
(2, 'quentin.mahe92@gmail.com', 69316698, 0),
(5, 'liamdu92@gmail.com', 77277731, 0),
(6, 'liam.macquaire2002@gmail.com', 98637061, 1);

-- --------------------------------------------------------

--
-- Structure de la table `request_card`
--

CREATE TABLE `request_card` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prénom` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `cvc` int(11) NOT NULL,
  `date_expiry` date DEFAULT NULL,
  `card_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `request_card`
--

INSERT INTO `request_card` (`id`, `client_id`, `nom`, `prénom`, `code`, `status`, `cvc`, `date_expiry`, `card_number`) VALUES
(7, 100, 'Liam', 'Macquaire', 2773, 1, 917, '2027-05-03', '9363 0508 3353 028');

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `product`, `amount`, `currency`, `status`, `created_at`) VALUES
('ch_3Kj7pTLvgKkU1KjF0VdMqiOT', 'cus_LPxkOn62qHQKA3', 'abonnement', 50, 'eur', 'succeeded', '2022-03-30 22:09:20'),
('ch_3KjOZnLvgKkU1KjF1BdvDehw', 'cus_LQF3E7A0acAja0', 'abonnement', 50, 'eur', 'succeeded', '2022-03-31 16:02:15'),
('ch_3KjOcrLvgKkU1KjF014jd11w', 'cus_LQF7sbnpBeldYb', 'abonnement', 50, 'eur', 'succeeded', '2022-03-31 16:05:26'),
('ch_3KjPOTLvgKkU1KjF0ixoJwDu', 'cus_LQFu6sT88WDAwz', 'panier d\'achat', 336, 'eur', 'succeeded', '2022-03-31 16:54:37'),
('ch_3KjPPELvgKkU1KjF1HD1HWYN', 'cus_LQFvERSeVB32uD', 'panier d\'achat', 336, 'eur', 'succeeded', '2022-03-31 16:55:25'),
('ch_3KjPWZLvgKkU1KjF0GVG0AIy', 'cus_LQG2JoyiSegrMz', 'panier d\'achat', 3360, 'eur', 'succeeded', '2022-03-31 17:03:00'),
('ch_3KjPZgLvgKkU1KjF18201vgY', 'cus_LQG5z4LpyMrALa', 'panier d\'achat', 40500, 'eur', 'succeeded', '2022-03-31 17:06:13'),
('ch_3KqI8VLvgKkU1KjF1jiMXi8R', 'cus_LXMsBwhUmd5dZs', 'panier d\'achat', 168, 'eur', 'succeeded', '2022-04-19 16:34:36'),
('ch_3KqI8xLvgKkU1KjF0Fzbaptr', 'cus_LXMsaDzzNkpOuN', 'panier d\'achat', 168, 'eur', 'succeeded', '2022-04-19 16:35:04'),
('ch_3KqI9PLvgKkU1KjF1FPF0CoX', 'cus_LXMtCuL27HFCbw', 'panier d\'achat', 168, 'eur', 'succeeded', '2022-04-19 16:35:32'),
('ch_3KqJ0TLvgKkU1KjF0sWAJOhO', 'cus_LXNm6zvqcXHIwr', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:30:22'),
('ch_3KqJ1JLvgKkU1KjF1OXE4YEV', 'cus_LXNmeknSJK7Hr2', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:31:14'),
('ch_3KqJ2YLvgKkU1KjF1ErSwGG6', 'cus_LXNovmTIC9xC6g', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:32:31'),
('ch_3KqJ4BLvgKkU1KjF1svhIPCB', 'cus_LXNpJSwSrfNOv2', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:34:12'),
('ch_3KqJ4XLvgKkU1KjF0O9grJw0', 'cus_LXNqpTmEThLETi', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:34:34'),
('ch_3KqJ6FLvgKkU1KjF0eu9QrM8', 'cus_LXNrSF29ZRVrmX', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:36:20'),
('ch_3KqJ6oLvgKkU1KjF0ME8oOUT', 'cus_LXNsCy7oYPqxQU', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:36:55'),
('ch_3KqJ91LvgKkU1KjF1mVtRTc2', 'cus_LXNuo9QFUOjRTM', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:39:12'),
('ch_3KqJApLvgKkU1KjF0ZxvtxXc', 'cus_LXNwKzwCvRHhoQ', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:41:04'),
('ch_3KqJBMLvgKkU1KjF12YWNoD2', 'cus_LXNx89hgfxfplC', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:41:37'),
('ch_3KqJEDLvgKkU1KjF09vxVQkV', 'cus_LXO0v1rvipRphL', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:44:34'),
('ch_3KqJFsLvgKkU1KjF0XhLlktM', 'cus_LXO1Lej8tZhffB', '4-3', 168, 'eur', 'succeeded', '2022-04-19 17:46:17'),
('ch_3KqJJILvgKkU1KjF01Q1mass', 'cus_LXO5LSwmk52eHS', '4/3', 168, 'eur', 'succeeded', '2022-04-19 17:49:49'),
('ch_3KqJPILvgKkU1KjF0RdjQIaC', 'cus_LXOBfoDeB2jADe', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:56:01'),
('ch_3KqJbULvgKkU1KjF1rcGcSfX', 'cus_LXOObJtAPfTlnf', '4,3', 168, 'eur', 'succeeded', '2022-04-19 18:08:37'),
('ch_3KqJfFLvgKkU1KjF1iWAfzjh', 'cus_LXOSUHmLXLdqTo', '3', 99, 'eur', 'succeeded', '2022-04-19 18:12:30'),
('ch_3KqJfdLvgKkU1KjF1BSUe1Kd', 'cus_LXOSNm9LxrXxSn', '3', 99, 'eur', 'succeeded', '2022-04-19 18:12:54'),
('ch_3KqJgMLvgKkU1KjF1Scsuqve', 'cus_LXOTHHWDFnpQtf', '3', 99, 'eur', 'succeeded', '2022-04-19 18:13:39'),
('ch_3KqJhzLvgKkU1KjF1KVlikdG', 'cus_LXOUMSMnj0DrBt', '3', 99, 'eur', 'succeeded', '2022-04-19 18:15:20'),
('ch_3KqJjdLvgKkU1KjF1cj0g7lp', 'cus_LXOWHJPAf4JxFr', '3', 99, 'eur', 'succeeded', '2022-04-19 18:17:02'),
('ch_3KqJlbLvgKkU1KjF0BGlupiL', 'cus_LXOY3v3EA9X5Df', '3', 99, 'eur', 'succeeded', '2022-04-19 18:19:04'),
('ch_3KqJn4LvgKkU1KjF0RyFkNbq', 'cus_LXOaX7pPjTSqw4', '3', 99, 'eur', 'succeeded', '2022-04-19 18:20:35'),
('ch_3KqJo6LvgKkU1KjF16t3p631', 'cus_LXObHMGWn2K6CP', '3', 99, 'eur', 'succeeded', '2022-04-19 18:21:39'),
('ch_3KqJpCLvgKkU1KjF1HrcgUYq', 'cus_LXOc4yjMW738Kc', '3', 99, 'eur', 'succeeded', '2022-04-19 18:22:47'),
('ch_3KqJtELvgKkU1KjF0mb47bNc', 'cus_LXOgn5TcxmdHeL', '3', 99, 'eur', 'succeeded', '2022-04-19 18:26:57'),
('ch_3KqJvhLvgKkU1KjF1KFHEu1d', 'cus_LXOjvxlVSFeFqU', '3', 99, 'eur', 'succeeded', '2022-04-19 18:29:30'),
('ch_3KqK1QLvgKkU1KjF145l8AS9', 'cus_LXOpDtUqb6BkTw', '3', 99, 'eur', 'succeeded', '2022-04-19 18:35:25'),
('ch_3KqK2QLvgKkU1KjF1mg2p3N9', 'cus_LXOqcPBsK4tvsu', '3', 99, 'eur', 'succeeded', '2022-04-19 18:36:27'),
('ch_3KqMIJLvgKkU1KjF0pI6ZMUb', 'cus_LXRAe7LfWaSpkY', '3', 99, 'eur', 'succeeded', '2022-04-19 21:01:00'),
('ch_3KqMM9LvgKkU1KjF0jO8Dv3s', 'cus_LXREJiisTKGiTS', '3', 99, 'eur', 'succeeded', '2022-04-19 21:04:58'),
('ch_3KqMQgLvgKkU1KjF1iBSTAhl', 'cus_LXRJWbK8zGKJTT', '3', 99, 'eur', 'succeeded', '2022-04-19 21:09:39'),
('ch_3KqMRxLvgKkU1KjF0FpvyB4F', 'cus_LXRKrczyvjbQLw', '3', 99, 'eur', 'succeeded', '2022-04-19 21:10:58'),
('ch_3KqMSlLvgKkU1KjF0UffTlLy', 'cus_LXRLRQjTcasDYj', '3', 99, 'eur', 'succeeded', '2022-04-19 21:11:48'),
('ch_3KqMTiLvgKkU1KjF1OeVNfPz', 'cus_LXRMBxLmzW1ymP', '3', 99, 'eur', 'succeeded', '2022-04-19 21:12:47'),
('ch_3KqMVaLvgKkU1KjF0OhmOiuS', 'cus_LXROpyihOC1S6S', '3,4', 168, 'eur', 'succeeded', '2022-04-19 21:14:43'),
('ch_3KqMWQLvgKkU1KjF1hwItedm', 'cus_LXRPKZesd6Wyye', '3,4', 168, 'eur', 'succeeded', '2022-04-19 21:15:35'),
('ch_3KqMXILvgKkU1KjF0yPiovQM', 'cus_LXRQ2zwB4ki2Ga', '3,4', 168, 'eur', 'succeeded', '2022-04-19 21:16:28'),
('ch_3KqMZbLvgKkU1KjF026QSD1F', 'cus_LXRSj75PjgdbC6', '3,4', 168, 'eur', 'succeeded', '2022-04-19 21:18:52'),
('ch_3KqMkyLvgKkU1KjF0DFIfYjZ', 'cus_LXReUhQiSWbtFQ', '3,4', 237, 'eur', 'succeeded', '2022-04-19 21:30:37'),
('ch_3KqMskLvgKkU1KjF077p5zct', 'cus_LXRmlBYnq66Soq', '3,4', 237, 'eur', 'succeeded', '2022-04-19 21:38:39'),
('ch_3KqN78LvgKkU1KjF1JDDLwIi', 'cus_LXS1YpgPyZCYK6', '14,15,13', 219, 'eur', 'succeeded', '2022-04-19 21:53:31'),
('ch_3KqOUrLvgKkU1KjF10eQ6cz3', 'cus_LXTRfQdVYSUpyq', '3,4', 168, 'eur', 'succeeded', '2022-04-19 23:22:06'),
('ch_3KqnHWLvgKkU1KjF0f5QwWu7', 'cus_LXt30uItD04zhD', '3,4', 336, 'eur', 'succeeded', '2022-04-21 01:49:59'),
('ch_3Kj7pTLvgKkU1KjF0VdMqiOT', 'cus_LPxkOn62qHQKA3', 'abonnement', 50, 'eur', 'succeeded', '2022-03-30 22:09:20'),
('ch_3KjOZnLvgKkU1KjF1BdvDehw', 'cus_LQF3E7A0acAja0', 'abonnement', 50, 'eur', 'succeeded', '2022-03-31 16:02:15'),
('ch_3KjOcrLvgKkU1KjF014jd11w', 'cus_LQF7sbnpBeldYb', 'abonnement', 50, 'eur', 'succeeded', '2022-03-31 16:05:26'),
('ch_3KjPOTLvgKkU1KjF0ixoJwDu', 'cus_LQFu6sT88WDAwz', 'panier d\'achat', 336, 'eur', 'succeeded', '2022-03-31 16:54:37'),
('ch_3KjPPELvgKkU1KjF1HD1HWYN', 'cus_LQFvERSeVB32uD', 'panier d\'achat', 336, 'eur', 'succeeded', '2022-03-31 16:55:25'),
('ch_3KjPWZLvgKkU1KjF0GVG0AIy', 'cus_LQG2JoyiSegrMz', 'panier d\'achat', 3360, 'eur', 'succeeded', '2022-03-31 17:03:00'),
('ch_3KjPZgLvgKkU1KjF18201vgY', 'cus_LQG5z4LpyMrALa', 'panier d\'achat', 40500, 'eur', 'succeeded', '2022-03-31 17:06:13'),
('ch_3KqI8VLvgKkU1KjF1jiMXi8R', 'cus_LXMsBwhUmd5dZs', 'panier d\'achat', 168, 'eur', 'succeeded', '2022-04-19 16:34:36'),
('ch_3KqI8xLvgKkU1KjF0Fzbaptr', 'cus_LXMsaDzzNkpOuN', 'panier d\'achat', 168, 'eur', 'succeeded', '2022-04-19 16:35:04'),
('ch_3KqI9PLvgKkU1KjF1FPF0CoX', 'cus_LXMtCuL27HFCbw', 'panier d\'achat', 168, 'eur', 'succeeded', '2022-04-19 16:35:32'),
('ch_3KqJ0TLvgKkU1KjF0sWAJOhO', 'cus_LXNm6zvqcXHIwr', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:30:22'),
('ch_3KqJ1JLvgKkU1KjF1OXE4YEV', 'cus_LXNmeknSJK7Hr2', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:31:14'),
('ch_3KqJ2YLvgKkU1KjF1ErSwGG6', 'cus_LXNovmTIC9xC6g', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:32:31'),
('ch_3KqJ4BLvgKkU1KjF1svhIPCB', 'cus_LXNpJSwSrfNOv2', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:34:12'),
('ch_3KqJ4XLvgKkU1KjF0O9grJw0', 'cus_LXNqpTmEThLETi', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:34:34'),
('ch_3KqJ6FLvgKkU1KjF0eu9QrM8', 'cus_LXNrSF29ZRVrmX', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:36:20'),
('ch_3KqJ6oLvgKkU1KjF0ME8oOUT', 'cus_LXNsCy7oYPqxQU', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:36:55'),
('ch_3KqJ91LvgKkU1KjF1mVtRTc2', 'cus_LXNuo9QFUOjRTM', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:39:12'),
('ch_3KqJApLvgKkU1KjF0ZxvtxXc', 'cus_LXNwKzwCvRHhoQ', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:41:04'),
('ch_3KqJBMLvgKkU1KjF12YWNoD2', 'cus_LXNx89hgfxfplC', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:41:37'),
('ch_3KqJEDLvgKkU1KjF09vxVQkV', 'cus_LXO0v1rvipRphL', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:44:34'),
('ch_3KqJFsLvgKkU1KjF0XhLlktM', 'cus_LXO1Lej8tZhffB', '4-3', 168, 'eur', 'succeeded', '2022-04-19 17:46:17'),
('ch_3KqJJILvgKkU1KjF01Q1mass', 'cus_LXO5LSwmk52eHS', '4/3', 168, 'eur', 'succeeded', '2022-04-19 17:49:49'),
('ch_3KqJPILvgKkU1KjF0RdjQIaC', 'cus_LXOBfoDeB2jADe', '4,3', 168, 'eur', 'succeeded', '2022-04-19 17:56:01'),
('ch_3KqJbULvgKkU1KjF1rcGcSfX', 'cus_LXOObJtAPfTlnf', '4,3', 168, 'eur', 'succeeded', '2022-04-19 18:08:37'),
('ch_3KqJfFLvgKkU1KjF1iWAfzjh', 'cus_LXOSUHmLXLdqTo', '3', 99, 'eur', 'succeeded', '2022-04-19 18:12:30'),
('ch_3KqJfdLvgKkU1KjF1BSUe1Kd', 'cus_LXOSNm9LxrXxSn', '3', 99, 'eur', 'succeeded', '2022-04-19 18:12:54'),
('ch_3KqJgMLvgKkU1KjF1Scsuqve', 'cus_LXOTHHWDFnpQtf', '3', 99, 'eur', 'succeeded', '2022-04-19 18:13:39'),
('ch_3KqJhzLvgKkU1KjF1KVlikdG', 'cus_LXOUMSMnj0DrBt', '3', 99, 'eur', 'succeeded', '2022-04-19 18:15:20'),
('ch_3KqJjdLvgKkU1KjF1cj0g7lp', 'cus_LXOWHJPAf4JxFr', '3', 99, 'eur', 'succeeded', '2022-04-19 18:17:02'),
('ch_3KqJlbLvgKkU1KjF0BGlupiL', 'cus_LXOY3v3EA9X5Df', '3', 99, 'eur', 'succeeded', '2022-04-19 18:19:04'),
('ch_3KqJn4LvgKkU1KjF0RyFkNbq', 'cus_LXOaX7pPjTSqw4', '3', 99, 'eur', 'succeeded', '2022-04-19 18:20:35'),
('ch_3KqJo6LvgKkU1KjF16t3p631', 'cus_LXObHMGWn2K6CP', '3', 99, 'eur', 'succeeded', '2022-04-19 18:21:39'),
('ch_3KqJpCLvgKkU1KjF1HrcgUYq', 'cus_LXOc4yjMW738Kc', '3', 99, 'eur', 'succeeded', '2022-04-19 18:22:47'),
('ch_3KqJtELvgKkU1KjF0mb47bNc', 'cus_LXOgn5TcxmdHeL', '3', 99, 'eur', 'succeeded', '2022-04-19 18:26:57'),
('ch_3KqJvhLvgKkU1KjF1KFHEu1d', 'cus_LXOjvxlVSFeFqU', '3', 99, 'eur', 'succeeded', '2022-04-19 18:29:30'),
('ch_3KqK1QLvgKkU1KjF145l8AS9', 'cus_LXOpDtUqb6BkTw', '3', 99, 'eur', 'succeeded', '2022-04-19 18:35:25'),
('ch_3KqK2QLvgKkU1KjF1mg2p3N9', 'cus_LXOqcPBsK4tvsu', '3', 99, 'eur', 'succeeded', '2022-04-19 18:36:27'),
('ch_3KqMIJLvgKkU1KjF0pI6ZMUb', 'cus_LXRAe7LfWaSpkY', '3', 99, 'eur', 'succeeded', '2022-04-19 21:01:00'),
('ch_3KqMM9LvgKkU1KjF0jO8Dv3s', 'cus_LXREJiisTKGiTS', '3', 99, 'eur', 'succeeded', '2022-04-19 21:04:58'),
('ch_3KqMQgLvgKkU1KjF1iBSTAhl', 'cus_LXRJWbK8zGKJTT', '3', 99, 'eur', 'succeeded', '2022-04-19 21:09:39'),
('ch_3KqMRxLvgKkU1KjF0FpvyB4F', 'cus_LXRKrczyvjbQLw', '3', 99, 'eur', 'succeeded', '2022-04-19 21:10:58'),
('ch_3KqMSlLvgKkU1KjF0UffTlLy', 'cus_LXRLRQjTcasDYj', '3', 99, 'eur', 'succeeded', '2022-04-19 21:11:48'),
('ch_3KqMTiLvgKkU1KjF1OeVNfPz', 'cus_LXRMBxLmzW1ymP', '3', 99, 'eur', 'succeeded', '2022-04-19 21:12:47'),
('ch_3KqMVaLvgKkU1KjF0OhmOiuS', 'cus_LXROpyihOC1S6S', '3,4', 168, 'eur', 'succeeded', '2022-04-19 21:14:43'),
('ch_3KqMWQLvgKkU1KjF1hwItedm', 'cus_LXRPKZesd6Wyye', '3,4', 168, 'eur', 'succeeded', '2022-04-19 21:15:35'),
('ch_3KqMXILvgKkU1KjF0yPiovQM', 'cus_LXRQ2zwB4ki2Ga', '3,4', 168, 'eur', 'succeeded', '2022-04-19 21:16:28'),
('ch_3KqMZbLvgKkU1KjF026QSD1F', 'cus_LXRSj75PjgdbC6', '3,4', 168, 'eur', 'succeeded', '2022-04-19 21:18:52'),
('ch_3KqMkyLvgKkU1KjF0DFIfYjZ', 'cus_LXReUhQiSWbtFQ', '3,4', 237, 'eur', 'succeeded', '2022-04-19 21:30:37'),
('ch_3KqMskLvgKkU1KjF077p5zct', 'cus_LXRmlBYnq66Soq', '3,4', 237, 'eur', 'succeeded', '2022-04-19 21:38:39'),
('ch_3KqN78LvgKkU1KjF1JDDLwIi', 'cus_LXS1YpgPyZCYK6', '14,15,13', 219, 'eur', 'succeeded', '2022-04-19 21:53:31'),
('ch_3KqOUrLvgKkU1KjF10eQ6cz3', 'cus_LXTRfQdVYSUpyq', '3,4', 168, 'eur', 'succeeded', '2022-04-19 23:22:06'),
('ch_3KqnHWLvgKkU1KjF0f5QwWu7', 'cus_LXt30uItD04zhD', '3,4', 336, 'eur', 'succeeded', '2022-04-21 01:49:59'),
('ch_3Kud9QLvgKkU1KjF19rNyMzt', 'cus_LbqrJCmpo0J2dJ', '17,18,3', 1572, 'eur', 'succeeded', '2022-05-01 15:49:29'),
('ch_3KudGVLvgKkU1KjF1czrewc1', 'cus_Lbqy0otUjpbt8G', '17,18', 72, 'eur', 'succeeded', '2022-05-01 15:56:48'),
('ch_3KxAEtLvgKkU1KjF1vAI0z7M', 'cus_LeTBMreyZM1BeJ', '5,4', 238, 'eur', 'succeeded', '2022-05-08 15:33:36'),
('ch_3KxAGnLvgKkU1KjF0smbmUzg', 'cus_LeTDT9ymocnXfN', '12', 17800, 'eur', 'succeeded', '2022-05-08 15:35:34'),
('ch_3Kxe9wLvgKkU1KjF0il8W8RL', 'cus_Ley6nhAbeoistd', '12,5,3,11', 39600, 'eur', 'succeeded', '2022-05-09 23:30:29'),
('ch_3Ky3KwLvgKkU1KjF1tbKNVyK', 'cus_LfO7gXcPJzEZU1', '3,4', 128800, 'eur', 'succeeded', '2022-05-11 02:23:31'),
('ch_3Ky3V2LvgKkU1KjF1bKUqVq6', 'cus_LfOHdtAscACeAj', '4,3', 30700, 'eur', 'succeeded', '2022-05-11 02:33:57'),
('ch_3Ky3tDLvgKkU1KjF0SgE7H8Y', 'cus_LfOgoZRqFWjqKE', '3,4', 30700, 'eur', 'succeeded', '2022-05-11 02:58:56'),
('ch_3Ky3u0LvgKkU1KjF12Jrk4Q5', 'cus_LfOh3CUiMqDq7a', '3,4', 30700, 'eur', 'succeeded', '2022-05-11 02:59:45'),
('ch_3Ky3vSLvgKkU1KjF1yVKuq2n', 'cus_LfOig0k83YwfTU', '3,4', 30700, 'eur', 'succeeded', '2022-05-11 03:01:15'),
('ch_3Ky40VLvgKkU1KjF1egx5jGg', 'cus_LfOo9NLYCmg8PM', '3,4', 30700, 'eur', 'succeeded', '2022-05-11 03:06:28'),
('ch_3Ky40oLvgKkU1KjF15bFXhJe', 'cus_LfOonsz7amUFtP', '3,4', 30700, 'eur', 'succeeded', '2022-05-11 03:06:47'),
('ch_3Ky41ILvgKkU1KjF1Z5Emcs6', 'cus_LfOoF2goNE2zVF', '3,4', 30700, 'eur', 'succeeded', '2022-05-11 03:07:17'),
('ch_3Ky448LvgKkU1KjF0Eo0G5mL', 'cus_LfOrD1VCoOMI4P', '3,4', 30700, 'eur', 'succeeded', '2022-05-11 03:10:13'),
('ch_3Ky44QLvgKkU1KjF0MJU1kOB', 'cus_LfOsdSiC2zCPnP', '3,4', 30700, 'eur', 'succeeded', '2022-05-11 03:10:31'),
('ch_3Ky44sLvgKkU1KjF0W65Na7e', 'cus_LfOs1ZiM4UQS7K', '3,4', 30700, 'eur', 'succeeded', '2022-05-11 03:10:59'),
('ch_3Ky47ILvgKkU1KjF0CmPuxk1', 'cus_LfOv2JJimtadeJ', '3,4', 30700, 'eur', 'succeeded', '2022-05-11 03:13:29'),
('ch_3Ky4BgLvgKkU1KjF0N1ofGBs', 'cus_LfOzla0kHf2duv', '3,4', 30700, 'eur', 'succeeded', '2022-05-11 03:18:01'),
('ch_3Ky4ClLvgKkU1KjF0lUZgSSa', 'cus_LfP0CBVk62UJaB', '3,4,10,5', 51600, 'eur', 'succeeded', '2022-05-11 03:19:08');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prénom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `nationalité` varchar(255) NOT NULL,
  `confirmKey` varchar(255) NOT NULL DEFAULT '0',
  `compteActif` int(1) NOT NULL DEFAULT '0',
  `point_fidelite` int(11) DEFAULT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prénom`, `email`, `motDePasse`, `age`, `nationalité`, `confirmKey`, `compteActif`, `point_fidelite`, `role`) VALUES
(76, 'Macquaire', 'Liam', 'liamdu92@gmail.comsdq', '9127f6312222c4eb70a02281ec830c4e9524a760', 19, 'FR', '82454797582150', 0, 0, 'client'),
(91, 'Florentin', 'William', 'liamdu92@hotmail.fr', '9127f6312222c4eb70a02281ec830c4e9524a760', 19, 'FR', '06655023069808', 0, 0, 'client'),
(100, 'Macquaire', 'Liam', 'liam.macquaire2002@gmail.com', '9127f6312222c4eb70a02281ec830c4e9524a760', 19, 'FR', '30477767638756', 1, 9446270, 'entreprise'),
(101, 'Deniro', 'Robert', 'patrondisney@disneyland.fr', '3feb1ce9764b33b4b72f25a3dda7c3484511ff41', 44, 'FR', '873732831209', 1, 0, 'partenaire'),
(102, 'Axel', 'Cazbar', 'patrongrand-rex@grandrex.fr', '818b13d171898e381c2d7e33ead0aec4557530d1', 56, 'FR', '1275894373', 1, 0, 'partenaire'),
(103, 'Admin', 'Admin', 'admin@speed-cash.fr', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 19, 'FR', '16749373292013', 1, NULL, 'administrateur'),
(104, 'Zitouni', 'Maram', 'mzitouni@myges.fr', 'e8b58582ca276f2a077a6b7d162849e0a922d68e', 21, 'TU', '89422762470331', 1, 10000, 'client'),
(105, 'PDG Aquaboulvard', 'PDG', 'AquaBoulvard', '7d63c13c50c384a52e9859d5e1129f0375de00b9', 57, 'SU', '75859039342', 1, NULL, 'partenaire'),
(106, 'PDG Bowling', 'PDG', 'Bowling', 'c3999cf1e9213dd16b93b170d098d6a9b800f7d9', 65, 'FR', '67480932930', 1, NULL, 'partenaire');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `calcul_cotisation`
--
ALTER TABLE `calcul_cotisation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cards_client`
--
ALTER TABLE `cards_client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `code_promo`
--
ALTER TABLE `code_promo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprise_part`
--
ALTER TABLE `entreprise_part`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user_part` (`id_user_part`),
  ADD UNIQUE KEY `id_contrat_part` (`id_contrat_part`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fich_tech`
--
ALTER TABLE `fich_tech`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note_produits`
--
ALTER TABLE `note_produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits_commandes`
--
ALTER TABLE `produits_commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produit_id` (`produit_id`),
  ADD KEY `commande_id` (`commande_id`);

--
-- Index pour la table `qr_code`
--
ALTER TABLE `qr_code`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recuperation`
--
ALTER TABLE `recuperation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `request_card`
--
ALTER TABLE `request_card`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `calcul_cotisation`
--
ALTER TABLE `calcul_cotisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cards_client`
--
ALTER TABLE `cards_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `code_promo`
--
ALTER TABLE `code_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `entreprise_part`
--
ALTER TABLE `entreprise_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `fich_tech`
--
ALTER TABLE `fich_tech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `note_produits`
--
ALTER TABLE `note_produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `produits_commandes`
--
ALTER TABLE `produits_commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT pour la table `qr_code`
--
ALTER TABLE `qr_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recuperation`
--
ALTER TABLE `recuperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `request_card`
--
ALTER TABLE `request_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits_commandes`
--
ALTER TABLE `produits_commandes`
  ADD CONSTRAINT `commande_id` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produit_id` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
