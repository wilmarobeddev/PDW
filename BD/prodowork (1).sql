

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `oferts` (
  `ID` int(11) NOT NULL,
  `descripcion` varchar(5000) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `oferts` (`ID`, `descripcion`, `usuario`, `tipo`) VALUES
(45, 'limpiar la casa', '', 'Obras_Domesticas'),
(46, 'dsadad', 'Array', 'Diligencias Personales'),
(47, 'dsadad', 'LUIGI GM', 'Diligencias Personales'),
(48, 'limpiar', 'LUIGI GM', 'Oficios Varios'),
(49, 'sadsadad', 'LUIGI GM', 'Trabajos Informática'),
(50, 'dddddd', 'LUIGI GM', 'Trabajos Informática'),
(51, 'dddddd', 'LUIGI GM', 'Trabajos Informática'),
(52, 'dddddd', 'LUIGI GM', 'Trabajos Informática'),
(53, 'dddddd', 'LUIGI GM', 'Trabajos Informática'),
(54, 'dddddd', 'LUIGI GM', 'Trabajos Informática'),
(55, 'dddddd', 'LUIGI GM', 'Trabajos Informática'),
(56, 'dddddd', 'LUIGI GM', 'Trabajos Informática'),
(57, 'dddddd', 'LUIGI GM', 'Trabajos Informática'),
(58, 'dddddd', 'LUIGI GM', 'Trabajos Informática'),
(59, 'dddddd', 'LUIGI GM', 'Trabajos Informática'),
(60, 'dddddd', 'LUIGI GM', 'Trabajos Informática'),
(61, 'dddddd', 'LUIGI GM', 'Trabajos Informática'),
(62, 'dddddd', 'LUIGI GM', 'Trabajos Informática'),
(63, 'dddddd', 'LUIGI GM', 'Trabajos Informática');



CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_password_hash` varchar(255) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `intentos` int(11) NOT NULL,
  `ultimo_ingreso` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `id_tipo`, `date_added`, `intentos`, `ultimo_ingreso`, `estado`) VALUES
(297, 'Estefa', 'NEA', 'estefa', '$2y$10$gVO8.XHtFu74hNiMGziQWOikNtoOPWMjyzA2K1KMHA6UWVV5KAH2e', 'estefa@mail.com', 1, '2023-04-13 00:00:00', 0, NULL, 'Activo'),
(298, 'Obed', 'Bustamante', 'obed', '$2y$10$/E9PYuUmqnGQC/CznoIR6OFc66CKbGcyd/.olPorl/WyUzR59LrgG', 'obed@mail.com', 1, '2023-04-13 00:00:00', 0, NULL, 'Activo'),
(299, 'Memo', 'Memin', 'memo', '$2y$10$HDqS.zfPwSwQ2SU9tUBSAeluWbNfXhJ102cgr3ELvY8yFRIkEtwSC', 'memo@mail.com', 1, '2023-04-13 00:00:00', 0, NULL, 'Activo'),
(300, 'LUIGI', 'GM', 'LUIGI', '$2y$10$g.DzSzJ510Guyfw56drdvuyJuL9g5/N10oLDT8J3tR1L7OO2McX.6', 'LUIGIGM@GMAIL.COM', 1, '2023-05-25 00:00:00', 0, NULL, 'Activo'),
(301, 'LUIGIS', 'GMS', 'LUIGIGM', '$2y$10$tZ3iPS3v.7HoVK3qKwyG8.CRWZqaWOiCTJ4RjunCaVNGPVbq0LhD.', 'LUISMENDOZA12@GMAIL.COM', 1, '2023-05-25 00:00:00', 0, NULL, 'Inactivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `oferts`
--
ALTER TABLE `oferts`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `oferts`
--
ALTER TABLE `oferts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
