-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2023 at 07:46 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prodowork`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT COMMENT 'Auto incrementar user_id de cada usuario, índice único',
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `user_name` varchar(64) NOT NULL COMMENT 'Nombre de usuario, único',
  `user_password_hash` varchar(255) NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) NOT NULL COMMENT 'user''s email, unique',
  `id_tipo` int NOT NULL,
  `date_added` datetime NOT NULL,
  `intentos` int NOT NULL,
  `ultimo_ingreso` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=300 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `id_tipo`, `date_added`, `intentos`, `ultimo_ingreso`, `estado`) VALUES
(297, 'Estefa', 'NEA', 'estefa', '$2y$10$gVO8.XHtFu74hNiMGziQWOikNtoOPWMjyzA2K1KMHA6UWVV5KAH2e', 'estefa@mail.com', 1, '2023-04-13 00:00:00', 0, NULL, 'Activo'),
(298, 'Obed', 'Bustamante', 'obed', '$2y$10$/E9PYuUmqnGQC/CznoIR6OFc66CKbGcyd/.olPorl/WyUzR59LrgG', 'obed@mail.com', 1, '2023-04-13 00:00:00', 0, NULL, 'Activo'),
(299, 'Memo', 'Memin', 'memo', '$2y$10$HDqS.zfPwSwQ2SU9tUBSAeluWbNfXhJ102cgr3ELvY8yFRIkEtwSC', 'memo@mail.com', 1, '2023-04-13 00:00:00', 0, NULL, 'Activo');

-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
