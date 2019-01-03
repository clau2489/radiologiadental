-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-12-2018 a las 12:49:14
-- Versión del servidor: 5.6.41-log
-- Versión de PHP: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `c1420230_radden`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Placa PanorÃ¡mica ATM'),
(3, 'Placa Seriada'),
(4, 'Placa PanorÃ¡mica'),
(5, 'PanorÃ¡mica Segmentada'),
(6, 'Senos Maxilares'),
(7, 'Fotos para ortodoncia'),
(8, 'Semi seriada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coverage`
--

CREATE TABLE IF NOT EXISTS `coverage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `coverage`
--

INSERT INTO `coverage` (`id`, `name`, `lastname`) VALUES
(1, 'ACCORD SALUD', 'Accord Salud'),
(2, 'OSDE', 'OrganizaciÃ³n de Servicios Directos Empresarios'),
(3, 'IOMA', 'Instituto de Obra MÃ©dico Asistencial'),
(4, 'OSECAC', 'Obra Social de los Empleados de Comercio y Actividades Civiles'),
(5, 'PARTICULAR', 'Particular en Efectivo'),
(7, 'SWISS MEDICAL', 'Swiss Medical ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medic`
--

CREATE TABLE IF NOT EXISTS `medic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `day_of_birth` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `matricula` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `medic`
--

INSERT INTO `medic` (`id`, `no`, `name`, `lastname`, `gender`, `day_of_birth`, `email`, `address`, `city`, `phone`, `matricula`, `image`, `is_active`, `created_at`, `category_id`) VALUES
(1, NULL, 'Eliana', 'Pellejero', NULL, NULL, 'eliana_pellejero@radiologiadental.com.ar', 'Marcos Paz', 'Arenales 540', '146546546', '12146', NULL, 1, '2018-11-14 20:18:04', NULL),
(2, NULL, 'Trinidad', 'Amaya', NULL, NULL, 'trinidad_amaya@radiologiadental.com.ar', 'Marcos Paz', 'San juan 2028', '112416412', '11124', NULL, 1, '2018-11-14 20:18:52', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacient`
--

CREATE TABLE IF NOT EXISTS `pacient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `document` varchar(255) NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `day_of_birth` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `coverage` varchar(1) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sick` varchar(255) DEFAULT NULL,
  `obra` varchar(255) DEFAULT NULL,
  `is_favorite` tinyint(1) NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `pacient`
--

INSERT INTO `pacient` (`id`, `name`, `lastname`, `document`, `gender`, `day_of_birth`, `email`, `address`, `city`, `phone`, `coverage`, `image`, `sick`, `obra`, `is_favorite`, `is_active`, `created_at`) VALUES
(11, 'de Prueba', 'Paciente', '1111111111', 'h', '1960-01-01', 'email@email.com', 'Aguero 211', 'Marcos Paz', '1162245412', 'p', NULL, '', '5', 1, 1, '2018-12-07 14:03:32'),
(12, 'Marcela', 'Tielve', '22415911', 'm', '0000-00-00', '', '', '', '', 'p', NULL, '', '', 1, 1, '2018-12-10 08:59:52'),
(13, 'Leonardo', 'Javier', '21941673', 'h', '0000-00-00', '', '', '', '', 'p', NULL, '', '', 1, 1, '2018-12-10 09:51:55'),
(14, 'Myrian', 'Medina', '', 'm', '0000-00-00', '', '', 'Marcos Paz', '', 'p', NULL, '', '', 1, 1, '2018-12-10 10:41:48'),
(15, 'Melissa ', 'Haba ', '34733494', 'm', '0000-00-00', '', 'Aguero 211', 'Marcos Paz', '', 'p', NULL, '', '', 1, 1, '2018-12-10 11:35:44'),
(16, 'Daniela', 'Carrizo', '30487902', 'm', '0000-00-00', '', 'Aguero 211', 'Marcos Paz', '', 'p', NULL, '', '', 1, 1, '2018-12-10 13:00:57'),
(17, 'Alicia', 'Garcia', '11111111', 'm', '0000-00-00', '', 'Aguero', 'Marcos Paz', '1159880697', 'p', NULL, '', '', 1, 1, '2018-12-10 15:56:56'),
(18, 'Carolina', 'Barrios', '33460043', 'm', '1987-01-13', '', 'Brandse 542', 'MERLO', '1130532570', 'p', NULL, '', '', 1, 1, '2018-12-10 17:54:24'),
(19, 'Manuel', 'Fernandez', '', 'h', '0000-00-00', '', '', 'Lobos', '', 'p', NULL, '', '', 1, 1, '2018-12-11 09:51:47'),
(20, 'Melani ', 'Algaray', '44488248', 'm', '0000-00-00', '', 'Aguero 211', 'Marcos Paz', '', 'p', NULL, '', '', 1, 1, '2018-12-11 10:13:02'),
(21, 'Camila ', 'Peralta ', '40717975', 'm', '0000-00-00', '', '', '', '', 'p', NULL, '', '', 1, 1, '2018-12-11 10:33:00'),
(22, 'Carla ', 'Oliveti', '37846225', 'm', '0000-00-00', '', '', '', '', 'p', NULL, '', '', 1, 1, '2018-12-11 10:36:01'),
(23, 'Alejo ', 'Norbedo', '42778807', 'h', '0000-00-00', '', '', '', '', 'p', NULL, '', '', 1, 1, '2018-12-11 10:37:13'),
(24, 'Analia ', 'Sarrulle ', '5411559', 'm', '0000-00-00', '', '', 'Marcos Paz', '', 'p', NULL, '', '', 1, 1, '2018-12-11 10:42:55'),
(25, 'Valeria', 'Mazza', '27684047', 'm', '0000-00-00', '', '', 'Marcos Paz', '', 'p', NULL, '', '', 1, 1, '2018-12-11 10:46:44'),
(26, 'Claudio', 'ALLENDE ', '18758927', 'h', '1967-07-19', '', 'Aguero 211', 'Marcos Paz', '', 'p', NULL, '', '', 1, 1, '2018-12-11 12:37:09'),
(27, 'Nahiara', 'Pavon ', '49535719', 'm', '0000-00-00', '', '', 'Marcos Paz', '1163083830', 'p', NULL, '', '', 1, 1, '2018-12-11 16:52:36'),
(28, 'Claudia', 'Ibarra', '40353673', 'm', '1995-11-22', '', 'las heras 3268', 'Marcos Paz', '1163680752', 'p', NULL, '', '', 1, 1, '2018-12-11 18:12:39'),
(29, 'Jennifer', 'Ruta', '39548920', 'm', '1995-09-20', '', 'Alemania 1773', 'Marcos Paz', '1168962893', 'p', NULL, '', '5', 1, 1, '2018-12-11 18:38:19'),
(30, 'cintia', 'Salvatierra', '33178557', 'm', '1987-10-09', '', 'Guemes 347', 'Marcos Paz', '1166131746', 'p', NULL, '', '5', 1, 1, '2018-12-11 18:52:35'),
(31, 'Elian', 'Salvatierra', '48496395', 'h', '2008-02-07', '', 'Republica 512', 'Marcos Paz', '1161520978', 'p', NULL, '', '', 1, 1, '2018-12-11 18:56:06'),
(32, 'Jorgelina', 'Marciano', '18214071', 'm', '0000-00-00', '', 'Mendoza', 'Marcos Paz', '1161751769', 'p', NULL, '', '5', 1, 1, '2018-12-12 09:45:08'),
(33, 'Cintia ', 'Correa', '29273490', 'm', '0000-00-00', '', 'Aguero 211', 'Marcos Paz', '1122415822', 'p', NULL, '', '', 1, 1, '2018-12-12 10:26:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`id`, `name`) VALUES
(1, 'Pendiente de pago'),
(2, 'Pagado'),
(3, 'Anulado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_type`
--

CREATE TABLE IF NOT EXISTS `payment_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `payment_type`
--

INSERT INTO `payment_type` (`id`, `name`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta de Credito'),
(3, 'Tarjeta de Debito'),
(4, 'Cobertura del 100%'),
(5, 'Con descuento de Obra Social'),
(6, 'Por reintegro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `date_at` varchar(50) DEFAULT NULL,
  `time_at` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `pacient_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `coverage_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `medic_id` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `info` text,
  `is_web` tinyint(1) NOT NULL DEFAULT '0',
  `payment_id` int(11) NOT NULL DEFAULT '1',
  `payment_type_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `payment_id` (`payment_id`),
  KEY `payment_type_id` (`payment_type_id`),
  KEY `status_id` (`status_id`),
  KEY `user_id` (`user_id`),
  KEY `pacient_id` (`pacient_id`),
  KEY `category_id` (`category_id`),
  KEY `coverage_id` (`coverage_id`),
  KEY `medic_id` (`medic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id`, `title`, `date_at`, `time_at`, `created_at`, `pacient_id`, `category_id`, `coverage_id`, `user_id`, `medic_id`, `price`, `info`, `is_web`, `payment_id`, `payment_type_id`, `status_id`) VALUES
(15, NULL, '2018-12-02', '10:00', '2018-12-07 14:04:05', 11, 2, 5, 2, 2, 400, NULL, 0, 1, 1, 1),
(18, NULL, '2018-12-13', '16:00', '2018-12-10 16:07:26', 17, 4, 5, 2, 1, 400, NULL, 0, 1, 1, 1),
(19, NULL, '2018-12-13', '10:30', '2018-12-10 16:08:43', 14, 4, 5, 2, 1, 400, NULL, 0, 1, 1, 1),
(20, NULL, '2018-12-11', '10:00', '2018-12-10 18:06:02', 18, 4, 5, 2, 1, 400, '', 0, 2, 1, 2),
(21, NULL, '2018-12-12', '10:30', '2018-12-11 10:02:19', 19, 4, 5, 2, 1, 400, '', 0, 2, 1, 2),
(22, NULL, '2018-12-07', '00:00', '2018-12-11 12:43:04', 20, 4, 5, 2, 1, 400, NULL, 0, 2, 1, 2),
(23, NULL, '2018-12-07', '10:00', '2018-12-11 12:44:02', 21, 4, 5, 2, 1, 400, NULL, 0, 2, 1, 2),
(24, NULL, '2018-12-07', '16:00', '2018-12-11 12:44:45', 22, 4, 5, 2, 1, 400, NULL, 0, 2, 1, 2),
(25, NULL, '2018-12-07', '18:00', '2018-12-11 12:45:32', 23, 4, 5, 2, 1, 400, NULL, 0, 2, 1, 2),
(26, NULL, '2018-12-10', '08:00', '2018-12-11 12:46:21', 12, 4, 5, 2, 1, 400, NULL, 0, 2, 1, 2),
(27, NULL, '2018-12-10', '10:00', '2018-12-11 12:47:09', 13, 4, 5, 2, 1, 400, NULL, 0, 2, 1, 2),
(28, NULL, '2018-12-10', '00:00', '2018-12-11 12:47:56', 15, 4, 5, 2, 1, 400, NULL, 0, 2, 1, 2),
(29, NULL, '2018-12-10', '16:00', '2018-12-11 12:48:42', 16, 4, 5, 2, 1, 400, NULL, 0, 2, 1, 2),
(30, NULL, '2018-12-10', '17:00', '2018-12-11 12:49:31', 24, 4, 5, 2, 1, 400, NULL, 0, 2, 1, 2),
(31, NULL, '2018-12-11', '10:00', '2018-12-11 12:50:32', 25, 4, 5, 2, 1, 400, NULL, 0, 2, 1, 2),
(32, NULL, '2018-12-11', '00:50', '2018-12-11 12:51:15', 26, 4, 5, 2, 1, 400, NULL, 0, 2, 1, 2),
(33, NULL, '2018-12-18', '16:00', '2018-12-11 16:54:05', 27, 4, 5, 2, 2, 400, NULL, 0, 1, 1, 1),
(34, NULL, '2018-12-11', '18:15', '2018-12-11 18:14:37', 28, 4, 5, 2, 2, 400, NULL, 0, 2, 1, 2),
(35, NULL, '2018-12-12', '10:30', '2018-12-11 18:39:02', 29, 4, 5, 2, 1, 400, '', 0, 2, 1, 2),
(36, NULL, '2018-12-12', '16:30', '2018-12-11 18:53:09', 30, 4, 5, 2, 1, 400, NULL, 0, 1, 1, 1),
(37, NULL, '2018-12-17', '17:30', '2018-12-11 18:56:49', 31, 4, 5, 2, 1, 400, NULL, 0, 1, 1, 1),
(38, NULL, '2018-12-12', '09:45', '2018-12-12 09:45:48', 32, 4, 5, 2, 1, 400, NULL, 0, 2, 1, 2),
(39, NULL, '2018-12-12', '11:00', '2018-12-12 11:00:09', 33, 4, 5, 2, 2, 400, NULL, 0, 2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Turno Pendiente'),
(2, 'Turno Aplicado'),
(3, 'Sin asistir'),
(4, 'Turno Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `lastname`, `email`, `password`, `is_active`, `is_admin`, `created_at`) VALUES
(2, 'triniamaya', 'Trinidad', 'Amaya', NULL, 'f250277be097d49d8f4cb1fbeace05e54589e52b', 1, 1, '2018-11-15 10:19:48'),
(3, 'elupellejero', 'Eliana', 'Pellejero', NULL, '34ca595fcc86efa66e63b3255e8b41565b1c5547', 1, 1, '2018-12-04 23:40:42');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medic`
--
ALTER TABLE `medic`
  ADD CONSTRAINT `medic_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`pacient_id`) REFERENCES `pacient` (`id`),
  ADD CONSTRAINT `reservation_ibfk_5` FOREIGN KEY (`medic_id`) REFERENCES `medic` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
