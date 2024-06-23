-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 juin 2024 à 16:59
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
-- Base de données : `budget`
--

-- --------------------------------------------------------

--
-- Structure de la table `bankaccount`
--

CREATE TABLE `bankaccount` (
  `number` varchar(20) NOT NULL,
  `bankName` varchar(255) NOT NULL,
  `solde` decimal(10,2) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Déchargement des données de la table `bankaccount`
--

INSERT INTO `bankaccount` (`number`, `bankName`, `solde`, `email`) VALUES
('123123', 'baridBank', 2000.00, 'oumaima123@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `categoryspending`
--

CREATE TABLE `categoryspending` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `amounMax` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Déchargement des données de la table `categoryspending`
--

INSERT INTO `categoryspending` (`id`, `label`, `amounMax`) VALUES
(1, 'booking', 1000.00),
(2, 'food', 1200.00);

-- --------------------------------------------------------

--
-- Structure de la table `transactionspending`
--

CREATE TABLE `transactionspending` (
  `id` int(11) NOT NULL,
  `dateTransaction` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `number_BankAccount` varchar(20) NOT NULL,
  `id_CategorySpending` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Déchargement des données de la table `transactionspending`
--

INSERT INTO `transactionspending` (`id`, `dateTransaction`, `amount`, `number_BankAccount`, `id_CategorySpending`) VALUES
(1, '2024-06-07', 200.00, '123123', 1),
(2, '2024-06-07', 200.00, '123123', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `gender` enum('male','female','other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`email`, `password`, `name`, `surname`, `telephone`, `gender`) VALUES
('oumaima123@gmail.com', '2002', 'oumaimaty', 'outchakouchtty', '0621947059', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bankaccount`
--
ALTER TABLE `bankaccount`
  ADD PRIMARY KEY (`number`);

--
-- Index pour la table `categoryspending`
--
ALTER TABLE `categoryspending`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transactionspending`
--
ALTER TABLE `transactionspending`
  ADD PRIMARY KEY (`id`),
  ADD KEY `number_BankAccount` (`number_BankAccount`),
  ADD KEY `id_CategorySpending` (`id_CategorySpending`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categoryspending`
--
ALTER TABLE `categoryspending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `transactionspending`
--
ALTER TABLE `transactionspending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `transactionspending`
--
ALTER TABLE `transactionspending`
  ADD CONSTRAINT `transactionspending_ibfk_1` FOREIGN KEY (`number_BankAccount`) REFERENCES `bankaccount` (`number`),
  ADD CONSTRAINT `transactionspending_ibfk_2` FOREIGN KEY (`id_CategorySpending`) REFERENCES `categoryspending` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
