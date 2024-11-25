-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-11-2024 a las 17:39:58
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `umerida`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `matricula` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombres`, `apellido_paterno`) VALUES
(1, 'Berenice', 'Gutierrez'),
(2, 'Alejandro', 'Rodriguez'),
(3, 'Maritza', 'Lopez'),
(4, 'Tania', 'Figueroa'),
(5, 'Alexander', 'Tuz'),
(6, 'Victor', 'Batun'),
(7, 'SHADANY', 'PEREZ'),
(8, 'Efrain ', 'Cetz'),
(9, 'Blanca', 'Leyva'),
(10, 'Aylin', 'Mendez'),
(11, 'Trinidad', 'Vazquez'),
(12, 'Elizabeth ', 'Montes'),
(13, 'Octavio ', 'Guerrero'),
(14, 'Elvira ', 'Zurita'),
(51, 'OMAR', 'RAMIREZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `clave_movimiento` int(11) NOT NULL,
  `matricula` int(11) DEFAULT NULL,
  `clave_materia` int(11) DEFAULT NULL,
  `clave_maestro` int(11) DEFAULT NULL,
  `promedio` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`clave_movimiento`, `matricula`, `clave_materia`, `clave_maestro`, `promedio`) VALUES
(6, 1, 1, 1, '7.00'),
(7, 2, 2, 3, '9.00'),
(8, 3, 3, 5, '10.00'),
(9, 4, 4, 7, '8.00'),
(10, 5, 5, 9, '8.00'),
(11, 6, 7, 11, '10.00'),
(12, 7, 8, 13, '7.00'),
(13, 8, 9, 15, '8.00'),
(14, 9, 57, 16, '9.00'),
(15, 10, 89, 18, '8.00'),
(16, 11, 1, 1, '10.00'),
(17, 12, 2, 3, '9.00'),
(18, 13, 3, 5, '9.00'),
(19, 14, 4, 7, '7.00'),
(20, 51, 5, 9, '10.00'),
(21, 1, 2, 3, '9.00'),
(22, 2, 3, 5, '9.00'),
(23, 4, 4, 7, '10.00'),
(24, 5, 5, 9, '8.00'),
(25, 6, 8, 13, '10.00'),
(26, 7, 9, 15, '8.00'),
(27, 8, 89, 18, '8.00'),
(28, 9, 4, 7, '8.00'),
(29, 10, 1, 1, '9.00'),
(30, 11, 2, 3, '8.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `clave_maestro` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `rfc` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`clave_maestro`, `nombres`, `rfc`) VALUES
(1, 'Jorge', '20'),
(3, 'Moises', '4'),
(5, 'Alan', '6'),
(7, 'Alvaro', '8'),
(9, 'Alma', '10'),
(11, 'Alvarado', '12'),
(13, 'Amber', '14'),
(15, 'Bruno', '16'),
(16, 'Brayan', '17'),
(18, 'Beyonce', '19'),
(57, 'tania', '41'),
(84, 'Jorge', '3789'),
(123, 'Alex', '123'),
(168, 'Berenice', '21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `clave_materia` int(11) NOT NULL,
  `nombre_materia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`clave_materia`, `nombre_materia`) VALUES
(0, ''),
(1, 'Ciencias'),
(2, 'Español'),
(3, 'Geografia'),
(4, 'Ingles'),
(5, 'Etica'),
(7, 'Programacion'),
(8, 'Quimica'),
(9, 'Frances'),
(57, 'Matematicas'),
(89, 'Fisica');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`clave_movimiento`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `clave_materia` (`clave_materia`),
  ADD KEY `clave_maestro` (`clave_maestro`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`clave_maestro`),
  ADD UNIQUE KEY `rfc` (`rfc`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`clave_materia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `clave_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`),
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`clave_materia`) REFERENCES `materias` (`clave_materia`),
  ADD CONSTRAINT `calificaciones_ibfk_3` FOREIGN KEY (`clave_maestro`) REFERENCES `maestros` (`clave_maestro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
