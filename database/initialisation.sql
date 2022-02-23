-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2022 at 04:40 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speed-cash`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
                          `id` int(11) NOT NULL,
                          `nom` varchar(255) NOT NULL,
                          `prénom` varchar(255) NOT NULL,
                          `email` varchar(255) NOT NULL,
                          `motDePasse` varchar(255) NOT NULL,
                          `age` int(11) NOT NULL,
                          `nationnalité` varchar(255) NOT NULL,
                          `confirmKey` varchar(255) NOT NULL DEFAULT '0',
                          `compteActif` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `nom`, `prénom`, `email`, `motDePasse`, `age`, `nationnalité`, `confirmKey`, `compteActif`) VALUES
                                                                                                                            (73, 'Macquaire', 'Liam', 'liamdu92@tefdsf.fr', 'ead3dbb0891832c7ab2f41c7fa3cf41a31d16cdc', 19, 'FR', '52593062281212', 1),
                                                                                                                            (74, 'Macquaire', 'Liam', 'liam.macquaire2002@gmail.com', 'ead3dbb0891832c7ab2f41c7fa3cf41a31d16cdc', 19, 'FR', '86556865002295', 1),
                                                                                                                            (75, 'Macquaire', 'Liam', 'liamdu92@gmail.com', 'ead3dbb0891832c7ab2f41c7fa3cf41a31d16cdc', 19, 'FR', '05438191735734', 1);

-- --------------------------------------------------------

--
-- Table structure for table `note_produits`
--

CREATE TABLE `note_produits` (
                                 `id` int(11) NOT NULL,
                                 `user_id` int(11) NOT NULL,
                                 `produit_id` int(11) NOT NULL,
                                 `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
                            `id` int(11) NOT NULL,
                            `prix` float NOT NULL,
                            `nom` varchar(255) NOT NULL,
                            `note` int(5) NOT NULL DEFAULT '0',
                            `description` varchar(510) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `prix`, `nom`, `note`, `description`) VALUES
                                                                        (3, 99, 'Souris Razer Basilisk V2', 5, 'Obtenez un avantage définitif sur vos adversaires avec le Razer Basilisk v2. Doté d\'un capteur optique Razer Focus de 20 000 dpi, il vous offre une précision d\'une netteté remarquable pour que vous ne manquiez plus jamais votre cible.'),
                                                                        (4, 69, 'Souris Razer DeathAdder V2 2013', 4, 'Avec le Razer DeathAdder v2, vous disposerez d\'une arme redoutable pour affronter les adversaires les plus coriaces. Le DeathAdder v2 est doté d\'un capteur optique Razer Focus de 20 000 ppp pour une précision inégalée.');

-- --------------------------------------------------------

--
-- Table structure for table `recuperation`
--

CREATE TABLE `recuperation` (
                                `id` int(11) NOT NULL,
                                `mail` varchar(255) NOT NULL,
                                `code` int(11) NOT NULL,
                                `confirme` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recuperation`
--

INSERT INTO `recuperation` (`id`, `mail`, `code`, `confirme`) VALUES
                                                                  (2, 'quentin.mahe92@gmail.com', 69316698, 0),
                                                                  (4, 'liam.macquaire2002@gmail.com', 23470154, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note_produits`
--
ALTER TABLE `note_produits`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recuperation`
--
ALTER TABLE `recuperation`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `note_produits`
--
ALTER TABLE `note_produits`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recuperation`
--
ALTER TABLE `recuperation`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
