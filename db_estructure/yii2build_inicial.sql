-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2020 a las 01:19:45
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yii2build`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gender`
--

INSERT INTO `gender` (`id`, `gender_name`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1585002125),
('m130524_201442_init', 1585002137),
('m190124_110200_add_verification_token_column_to_user_table', 1585002138);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `first_name` text,
  `last_name` text,
  `birhtdate` date DEFAULT NULL,
  `gender_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `first_name`, `last_name`, `birhtdate`, `gender_id`, `created_at`, `updated_at`) VALUES
(2, 2, 'Naleyi Germayoni', 'Paye Mamani', '2010-10-24', 2, '2020-03-23 20:29:35', '2020-03-30 12:35:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL,
  `role_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `role_name`, `role_value`) VALUES
(1, 'User', 10),
(2, 'Admin', 20),
(3, 'SuperAdmin', 30),
(5, 'Secretaria', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(45) NOT NULL,
  `status_value` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `status_name`, `status_value`) VALUES
(1, 'Active', 10),
(2, 'Pending', 5),
(3, 'Inactive', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` smallint(6) NOT NULL DEFAULT '10',
  `role_id` smallint(6) NOT NULL DEFAULT '10',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_type_id` smallint(6) NOT NULL DEFAULT '10',
  `foto` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `verification_token`, `email`, `status_id`, `role_id`, `created_at`, `updated_at`, `user_type_id`, `foto`) VALUES
(1, 'daniel', 'aIj717piuD_nfxZSGKCSnqYVbwdDyNpL', '$2y$13$dCO7samCOxqglmjNwA7GgO2vaHIAzxpgr7H4NrSMwZkI4zuVNz13e', NULL, 'UmZqybhUWWPBrEpW_Y5Axr-VJPGGaxp7_1585008916', 'danny@yahoo.es', 10, 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 30, NULL),
(2, 'nayelipaye', 'vcaF83QhQVBDpyPRm7xxY6rZfNwN1pg_', '$2y$13$H2vEiqQ/Z0/D617jS9VTsehTjc42XoceDDcQEoHgHqLx1VV1VgYEW', NULL, 'TPAqr1uMp6Xvf9lzZIzCuaoDmqi48sXu_1585008948', 'nayelipaye@hotmail.com', 10, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, NULL),
(3, 'cindellpaye', 'A7wPBPve5NBRxW__5RCUrRGlVTAxtaXc', '$2y$13$6EwJHGEpubrtMv0KRfwEEehQ1vLeMZhKxbh12oor5xp62DnoVlvyW', NULL, 'GJVvrRQBJBMEHFGh56xHGpoe_L0UtOpQ_1585009036', 'cindellpaye@yahoo.es', 10, 20, '2020-03-20 00:00:00', '2020-03-28 23:35:20', 10, NULL),
(4, 'leonelpaye', 'SuJSO8MItphgVctY9I3Hd2rHQXaCQ5_9', '$2y$13$IUfRZ7R6aDFHUn388grp3O.g9Z19Wdz1CjgIJ/K8FLj3Ox4Us0WrS', NULL, '4ZSEcB97lS6Yev1Dn9vfboYXAxDQ47b3_1585017178', 'leonelpaye@gmail.com', 10, 10, '0000-00-00 00:00:00', '2020-03-28 23:37:39', 30, NULL),
(5, 'pedromamani', 'crFdFqdb80diWYRHF7v9SQ65baQltm3d', '$2y$13$my6hp8vLdsj0QAY2Jcun/.bdFG9JM.OnZCI0hbh.a6QC5YcVYUnMS', NULL, 'qyLs4wHG5f1vXSofNDqc8EUOI9TzjLKl_1585616229', 'pedromamani@pedro.com', 10, 10, '2020-03-30 20:57:09', '2020-03-30 20:57:09', 10, NULL),
(6, 'rociomamani', '0QRJDY7Gtk-ShJAD9cohmplYIf4KhzyF', '$2y$13$JXzY7pK9oi4aHrg6xIYOOOxXp84LKU4dX0LV44rzeTP1SOIZvATPK', NULL, 'GKXUcxHs8Nthoi0mQuae2VpKFF2SJyhz_1585616300', 'rociomamani@gmail.com', 10, 10, '2020-03-30 20:58:20', '2020-03-30 20:58:20', 10, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_type_name` varchar(45) NOT NULL,
  `user_type_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_type`
--

INSERT INTO `user_type` (`id`, `user_type_name`, `user_type_value`) VALUES
(1, 'Free', 10),
(2, 'Paid', 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_profileGender` (`gender_id`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indices de la tabla `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profileGender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
