-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : mamp_mysql:3306
-- Généré le : jeu. 30 juil. 2020 à 13:52
-- Version du serveur :  8.0.20
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `jam_demo`
--
CREATE DATABASE IF NOT EXISTS `jam_demo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `jam_demo`;

-- --------------------------------------------------------

--
-- Structure de la table `email_queue`
--

CREATE TABLE `email_queue` (
    `id` int NOT NULL,
    `sender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `recipient` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `template` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `params` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `bcc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `sent_at` timestamp NULL DEFAULT NULL,
    `error` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `passwd_reset`
--

CREATE TABLE `passwd_reset` (
    `id` int NOT NULL,
    `user_id` int NOT NULL,
    `token` varchar(255) NOT NULL,
    `requested_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `used_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
    `id` int NOT NULL,
    `email` varchar(255) NOT NULL,
    `passwd` varchar(255) NOT NULL,
    `jam_id` varchar(255) NOT NULL,
    `admin` tinyint(1) NOT NULL,
    `reg_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `activated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `email_queue`
--
ALTER TABLE `email_queue`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `passwd_reset`
--
ALTER TABLE `passwd_reset`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `token` (`token`),
    ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `email_queue`
--
ALTER TABLE `email_queue`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `passwd_reset`
--
ALTER TABLE `passwd_reset`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `passwd_reset`
--
ALTER TABLE `passwd_reset`
    ADD CONSTRAINT `passwd_reset_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
