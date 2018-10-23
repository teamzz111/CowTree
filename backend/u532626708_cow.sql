-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2018 a las 00:23:34
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u532626708_cow`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbol`
--

CREATE TABLE `arbol` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arbol`
--

INSERT INTO `arbol` (`Id`, `Nombre`) VALUES
(33, 'Arbol de Vaca'),
(34, 'Arbol de Vaca'),
(35, 'Arbol de ,mm,nmn'),
(36, 'Arbol de ,mm,nmn'),
(37, 'Arbol de ,mm,nmn'),
(38, 'Arbol de '),
(39, 'Arbol de asfasf'),
(40, 'Arbol de asd'),
(41, 'Arbol de safsaf'),
(42, 'Arbol de safsaf'),
(43, 'Arbol de safsaf'),
(44, 'Arbol de safsaf'),
(45, 'Arbol de safsaf'),
(46, 'Arbol de safsaf2'),
(47, 'Arbol de safsaf2'),
(48, 'Arbol de safsaf2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganaderia`
--

CREATE TABLE `ganaderia` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Ubicacion` varchar(150) NOT NULL,
  `Divisa` varchar(45) NOT NULL,
  `Encastes` varchar(45) NOT NULL,
  `Lineas` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ganaderia`
--

INSERT INTO `ganaderia` (`Id`, `Nombre`, `Ubicacion`, `Divisa`, `Encastes`, `Lineas`) VALUES
(5, 'Primera ganadería', 'Meta, Colombia', 'Oro', 'Santacoloma', 'Torrestrella - Domecq'),
(1, 'Mauricio Molina', 'Finca Iguazú, Puerto López, Meta', 'Azul blanco y verde', 'Murube- Santacoloma ', ''),
(2, 'Andrés Alvarez B E Hijos', 'Finca La Toma- vereda yopalosa Municipio de Nunchía ( Casanare)', 'Blanco y amarillo', 'Santacoloma', ''),
(3, 'El Manzanal', 'Finca El Manzanal- Coagua, Cundinamarca .\r\n\r\nFinca El Hático - san Cayetano, Cund.', 'Azul blanco y amarillo', 'Santacoloma', ''),
(6, 'La Casita de la carne', 'Alaska', 'Yuanes', 'una re chimba', 'quejesto'),
(7, 'La Casita de la carne', 'Alaska', 'Yuanes', 'una re chimba', 'quejesto'),
(8, 'La Casita de la carne', 'Alaska', 'Yuanes', 'una re chimba', 'quejesto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id` int(11) NOT NULL,
  `SIGL` varchar(45) DEFAULT NULL,
  `#C` varchar(45) DEFAULT NULL,
  `#H` varchar(45) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  `Calificacion` varchar(45) DEFAULT NULL,
  `Vaca_Ejemplar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Ganaderia_Id` int(11) NOT NULL,
  `Pass` varchar(45) NOT NULL,
  `Cargo` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Nombre`, `Ganaderia_Id`, `Pass`, `Cargo`) VALUES
(0, 'Alberto vacaloca', 0, '000000', 'Dueno'),
(123456, 'Andres Largo', 1, 'nicky246', 'administrador'),
(1002145245, 'Lord Tocino', 0, '1002145245', 'ganadero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vaca`
--

CREATE TABLE `vaca` (
  `Ejemplar` varchar(100) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) NOT NULL,
  `Nivel` int(3) DEFAULT NULL,
  `Destino` varchar(45) NOT NULL,
  `Edad` varchar(100) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `Herrado` varchar(45) DEFAULT NULL,
  `Destetado` varchar(45) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  `Encaste` varchar(45) NOT NULL,
  `Reseña` varchar(45) NOT NULL,
  `Arbol_IdP` int(11) DEFAULT NULL,
  `Arbol_IdM` int(11) DEFAULT NULL,
  `Ganaderia_Id` int(11) NOT NULL,
  `Criador_Id` int(11) NOT NULL,
  `Fenotipo` varchar(45) DEFAULT NULL,
  `Defectos` varchar(45) DEFAULT NULL,
  `Calificacion` varchar(45) DEFAULT NULL,
  `Comportamiento` varchar(200) DEFAULT NULL,
  `Observadores` varchar(200) DEFAULT NULL,
  `IdPadre` varchar(100) DEFAULT NULL,
  `IdMadre` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vaca`
--

INSERT INTO `vaca` (`Ejemplar`, `Nombre`, `Estado`, `Nivel`, `Destino`, `Edad`, `Sexo`, `Herrado`, `Destetado`, `Fecha_nacimiento`, `Encaste`, `Reseña`, `Arbol_IdP`, `Arbol_IdM`, `Ganaderia_Id`, `Criador_Id`, `Fenotipo`, `Defectos`, `Calificacion`, `Comportamiento`, `Observadores`, `IdPadre`, `IdMadre`) VALUES
('ASP-188-188-2014-H-SOSPECHOSA', 'Prueba 1', 'Vivo', NULL, 'Tentar', '4 años, seis mese y 1 día', '', 'Sí', 'No', '2018-09-14', 'Baltasar Iban', 'En buen estado', 0, NULL, 0, 0, 'Test', 'Ninguni', '5', 'Normal', 'Andrés Largo', '0', NULL),
('asf', 'safsaf', 'dsf', 0, 'wer', '423', 'sí', 'sí', 'sí', '3432-02-04', 'sdf', 'sdf', 0, 0, 0, 0, 'wre', 'sdf', '324', 'sdfdsf', 'sdfsdf', '', ''),
('asfsdf', 'safsaf', 'dsf', 0, 'wer', '423', 'sí', 'sí', 'sí', '3432-02-04', 'sdf', 'sdf', 0, 0, 0, 0, 'wre', 'sdf', '324', 'sdfdsf', 'sdfsdf', '', ''),
('asfsdfqwe', 'safsaf2', 'dsf', 0, 'wer', '423', 'sí', 'sí', 'sí', '3432-02-04', 'sdf', 'sdf', 46, 46, 0, 0, 'wre', 'sdf', '324', 'sdfdsf', 'sdfsdf', '', ''),
('asfsdfqwea', 'safsaf2', 'dsf', 0, 'wer', '423', 'sí', 'sí', 'sí', '3432-02-04', 'sdf', 'sdf', 47, 47, 0, 0, 'wre', 'sdf', '324', 'sdfdsf', 'sdfsdf', '', ''),
('asfsdfqweaa', 'safsaf2', 'dsf', 0, 'wer', '423', 'sí', 'sí', 'sí', '3432-02-04', 'sdf', 'sdf', 48, 48, 0, 0, 'wre', 'sdf', '324', 'sdfdsf', 'sdfsdf', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arbol`
--
ALTER TABLE `arbol`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `ganaderia`
--
ALTER TABLE `ganaderia`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Producto_Vaca1_idx` (`Vaca_Ejemplar`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Criador_Ganaderia1_idx` (`Ganaderia_Id`);

--
-- Indices de la tabla `vaca`
--
ALTER TABLE `vaca`
  ADD PRIMARY KEY (`Ejemplar`),
  ADD KEY `fk_Vaca_Arbol_idx` (`Arbol_IdP`),
  ADD KEY `fk_Vaca_Ganaderia1_idx` (`Ganaderia_Id`),
  ADD KEY `fk_Vaca_Criador1_idx` (`Criador_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arbol`
--
ALTER TABLE `arbol`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `ganaderia`
--
ALTER TABLE `ganaderia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
