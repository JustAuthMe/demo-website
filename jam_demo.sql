SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `jam_demo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `jam_demo`;

CREATE TABLE `user` (
    `id` int NOT NULL,
    `jam_id` varchar(255) NOT NULL,
    `reg_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `fullname` varchar(255) NOT NULL,
    `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `user`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;
