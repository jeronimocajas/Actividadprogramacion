-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generaciÃ³n: 06-11-2023 a las 02:45:30
-- VersiÃ³n del servidor: 10.4.28-MariaDB
-- VersiÃ³n de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aeropuerto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asientos`
--

CREATE TABLE `asientos` (
  `idasientos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `asientos`
--

INSERT INTO `asientos` (`idasientos`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheking`
--

CREATE TABLE `cheking` (
  `idcheking` int(11) NOT NULL,
  `reserva_idreserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `vuelo_idvuelo` int(11) NOT NULL,
  `usuario_idUsuario` int(11) NOT NULL,
  `asientos_idasientos` int(11) NOT NULL,
  `maleta` varchar(250) NOT NULL,
  `fecha_reserva` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idreserva`, `vuelo_idvuelo`, `usuario_idUsuario`, `asientos_idasientos`, `maleta`, `fecha_reserva`) VALUES
(3, 2, 1102805930, 2, 'SI', '2023-11-22'),
(4, 3, 1102805930, 1, 'NO', '2023-11-21'),
(7, 3, 7896325, 1, 'SI', '2023-11-06'),
(8, 1, 7896325, 1, 'SI', '2023-11-05'),
(9, 3, 7896325, 1, 'SI', '2023-11-05'),
(14, 1, 7896325, 1, 'SI', '2023-11-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idroles` int(11) NOT NULL,
  `nombreRol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idroles`, `nombreRol`) VALUES
(1, 'Admin'),
(2, 'pasajero'),
(3, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `constraseÃ±a` varchar(45) NOT NULL,
  `roles_idroles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `email`, `constraseÃ±a`, `roles_idroles`) VALUES
(7896325, 'villami', 'Martinez', 'sebasjerorex89@gmail.com', '123456', 2),
(1102805930, 'jeronimo', 'cajas', 'jeronimo@gmail.com', '3053944667', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `idvuelo` int(11) NOT NULL,
  `numero_vuelo` varchar(45) NOT NULL,
  `origen` varchar(45) NOT NULL,
  `destino` varchar(45) NOT NULL,
  `fecha_de_salida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`idvuelo`, `numero_vuelo`, `origen`, `destino`, `fecha_de_salida`) VALUES
(1, 'VN001', 'BogotÃ¡', 'MedellÃ­n', '2023-11-06'),
(2, 'VN002', 'Cali', 'Cartagena', '2023-11-07'),
(3, 'VN003', 'MedellÃ­n', 'Barranquilla', '2023-11-08'),
(4, 'VN004', 'CÃºcuta', 'Santa Marta', '2023-11-09'),
(5, 'VN005', 'Barranquilla', 'Pereira', '2023-11-10');

--
-- Ãndices para tablas volcadas
--

--
-- Indices de la tabla `asientos`
--
ALTER TABLE `asientos`
  ADD PRIMARY KEY (`idasientos`);

--
-- Indices de la tabla `cheking`
--
ALTER TABLE `cheking`
  ADD PRIMARY KEY (`idcheking`),
  ADD KEY `fk_cheking_reserva1_idx` (`reserva_idreserva`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_reserva_vuelo1_idx` (`vuelo_idvuelo`),
  ADD KEY `fk_reserva_usuario1_idx` (`usuario_idUsuario`),
  ADD KEY `fk_reserva_asientos1_idx` (`asientos_idasientos`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idroles`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_usuario_roles1_idx` (`roles_idroles`);

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`idvuelo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cheking`
--
ALTER TABLE `cheking`
  ADD CONSTRAINT `fk_cheking_reserva1` FOREIGN KEY (`reserva_idreserva`) REFERENCES `reserva` (`idreserva`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_asientos1` FOREIGN KEY (`asientos_idasientos`) REFERENCES `asientos` (`idasientos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_usuario1` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_vuelo1` FOREIGN KEY (`vuelo_idvuelo`) REFERENCES `vuelo` (`idvuelo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_roles1` FOREIGN KEY (`roles_idroles`) REFERENCES `roles` (`idroles`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
