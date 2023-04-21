-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-04-2023 a las 01:18:58
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prodowork`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
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
) ENGINE=InnoDB AUTO_INCREMENT=311 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='user data';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `id_tipo`, `date_added`, `intentos`, `ultimo_ingreso`, `estado`) VALUES
(297, 'Estefa', 'NEA', 'estefa', '$2y$10$gVO8.XHtFu74hNiMGziQWOikNtoOPWMjyzA2K1KMHA6UWVV5KAH2e', 'estefa@mail.com', 1, '2023-04-13 00:00:00', 0, NULL, 'Activo'),
(298, 'Obed', 'Bustamante', 'obed', '$2y$10$IRXszppL7IHwDyVyIVXmsO8e9hYIFious.2OrX8nJFVq2aYwcwUEa', 'obed@mail.com', 1, '2023-04-13 00:00:00', 0, NULL, 'Activo'),
(300, 'richi', 'xx', 'richi', '$2y$10$qkwG.RnLmClO6Yji5mVE/e1HNENgrxMf9tMKknGc/u2X9mx5giiSm', 'richi@mail.com', 1, '2023-04-17 00:00:00', 0, NULL, 'Activo'),
(301, 'Prueba ', 'de prueb', 'kascinai', '$2y$10$Dwep8OGnYuk88najSh7Zq.4ukld5ou8giXIfzyEVBLtwyLii65foS', 'davila.cuartas@gmail.com', 1, '2023-04-17 00:00:00', 0, NULL, 'Activo'),
(302, 'carolina', 'morales', 'caro', '$2y$10$QuUEIB7YTyUORZ2GuBQRdu58xfzjKbrOTzGBl6NUcNs52XLHVCL9e', 'caro@mail.com', 3, '2023-04-19 00:00:00', 0, NULL, 'Activo'),
(303, 'pablo', 'jaramillo', 'pablo', '$2y$10$6x6dQAMpnbu47nFov7c19e/lb31e.Y.ENTXP47IgJ4rMlStfc3spy', 'pablo@mail.com', 3, '2023-04-19 00:00:00', 0, NULL, 'Activo'),
(304, 'memin', 'rodriguez', 'memin', '$2y$10$GQe09Wie6PaJG8K/Rvz6Lu/Omp3m8Ja6nmPBIgIR.80uIjlsPQnRe', 'memin@mail.com', 3, '2023-04-19 00:00:00', 0, NULL, 'Activo'),
(305, 'Jacobo', 'Grinberg', 'jacobo', '$2y$10$r6rWXAdmp0RAEbcMFhO9XO4kM3yWIDki6YFNI8kj3qWCMHvfReG5S', 'jacobo11@mail.com', 3, '2023-04-19 00:00:00', 0, NULL, 'Activo'),
(306, 'guillermo', 'Galeano', 'memoga', '$2y$10$F2YbXNhZuhj77oEokixTSOJ0MpbGYgG8Deo1PENw8GzwXIxux4Nj6', 'memoga@mail.com', 3, '2023-04-20 00:00:00', 0, NULL, 'Activo'),
(308, 'arepas', '11', 'arepas11', '$2y$10$aNwy6l3EVoh0NLz6rRt8eOIcmr9Jf3e/NDvoGdlXED7WYNP51mmjO', 'arepas11@mail.com', 3, '2023-04-20 00:00:00', 0, NULL, 'Activo'),
(309, 'usuario11', 'once', 'usuario11', '$2y$10$GT/.RjF3IwszwOyprZ7Zm.vOn3clITjwwNruLuEFmIEn.dgOVRUQS', 'usuario11@mail.com', 1, '2023-04-20 00:00:00', 0, NULL, 'Activo'),
(310, 'Wilmar ', 'Bustamante', 'wilmarbustamante', '$2y$10$AF1kc3/5ktH4h086f8OrKOjk3jxyKf5.tczqrHu0LAHRlU0afNBAK', 'wilmarbustamante@mail.com', 3, '2023-04-20 00:00:00', 0, NULL, 'Activo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
