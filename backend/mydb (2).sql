-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2018 a las 05:44:20
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbol`
--

CREATE TABLE `arbol` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arbol`
--

INSERT INTO `arbol` (`Id`, `Nombre`) VALUES
(0, 'Mi primer árbol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganaderia`
--

CREATE TABLE `ganaderia` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Ubicación` varchar(150) NOT NULL,
  `Divisa` varchar(45) NOT NULL,
  `Encastes` varchar(45) NOT NULL,
  `Lineas` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ganaderia`
--

INSERT INTO `ganaderia` (`Id`, `Nombre`, `Ubicación`, `Divisa`, `Encastes`, `Lineas`) VALUES
(0, 'Primera ganadería', 'Meta, Colombia', 'Oro', 'Santacoloma', 'Torrestrella - Domecq'),
(1, 'Mauricio Molina', 'Finca Iguazú, Puerto López, Meta', 'Azul blanco y verde', 'Murube- Santacoloma ', ''),
(2, 'Andrés Alvarez B E Hijos', 'Finca La Toma- vereda yopalosa Municipio de Nunchía ( Casanare)', 'Blanco y amarillo', 'Santacoloma', ''),
(3, 'El Manzanal', 'Finca El Manzanal- Coagua, Cundinamarca .\r\n\r\nFinca El Hático - san Cayetano, Cund.', 'Azul blanco y amarillo', 'Santacoloma', ''),
(4, 'Test', '', 'Oro', 'Asd', 'Perpendicular'),
(5, 'Test', '', 'Oro', 'Asd', 'Perpendicular'),
(6, 'Test', '', 'Oro', 'Asd', 'Perpendicular'),
(7, 'Test', '', 'Oro', 'Asd', 'Perpendicular'),
(8, 'Test', '', 'Oro', 'Asd', 'Perpendicular'),
(9, 'Test', 'Meta, cartagena', 'Oro', 'Asd', 'Perpendicular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SIGL` varchar(45) DEFAULT NULL,
  `#C` varchar(45) DEFAULT NULL,
  `#H` varchar(45) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  `Calificacion` varchar(45) DEFAULT NULL,
  `Vaca_Ejemplar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Ganaderia_Id` int(11) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Pass` varchar(45) NOT NULL,
  `Cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Nombre`, `Ganaderia_Id`, `Usuario`, `Pass`, `Cargo`) VALUES
(0, 'Andres Largo', 0, '123456', 'nicky246', 'Ganadero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vaca`
--

CREATE TABLE `vaca` (
  `Ejemplar` varchar(100) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) NOT NULL,
  `Destino` varchar(45) NOT NULL,
  `Edad` varchar(100) NOT NULL,
  `Nivel` int(2) NULL,
  `Herrado` varchar(45) DEFAULT NULL,
  `Destetado` varchar(45) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  `Encaste` varchar(45) NOT NULL,
  `Reseña` varchar(45) NOT NULL,
  `Arbol_Id` int(11) NOT NULL,
  `Ganaderia_Id` int(11) NOT NULL,
  `Criador_Id` int(11) NOT NULL,
  `Fenotipo` varchar(45) DEFAULT NULL,
  `Defectos` varchar(45) DEFAULT NULL,
  `Calificacion` varchar(45) DEFAULT NULL,
  `Comportamiento` varchar(200) DEFAULT NULL,
  `Observadores` varchar(200) DEFAULT NULL,
  `IdPadre` varchar(100) DEFAULT NULL,
  `IdPareja` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vaca`
--

INSERT INTO `vaca` (`Ejemplar`, `Nombre`, `Estado`, `Destino`, `Edad`, `Herrado`, `Destetado`, `Fecha_nacimiento`, `Encaste`, `Reseña`, `Arbol_Id`, `Ganaderia_Id`, `Criador_Id`, `Fenotipo`, `Defectos`, `Calificacion`, `Comportamiento`, `Observadores`, `IdPadre`, `IdPareja`) VALUES
('ASP-188-188-2014-H-SOSPECHOSA', NULL, 'Vivo', 'Tentar', '4 años, seis mese y 1 día', NULL, NULL, NULL, 'Baltasar Iban', '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  ADD KEY `fk_Vaca_Arbol_idx` (`Arbol_Id`),
  ADD KEY `fk_Vaca_Ganaderia1_idx` (`Ganaderia_Id`),
  ADD KEY `fk_Vaca_Criador1_idx` (`Criador_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ganaderia`
--
ALTER TABLE `ganaderia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Producto_Vaca1` FOREIGN KEY (`Vaca_Ejemplar`) REFERENCES `vaca` (`Ejemplar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Criador_Ganaderia1` FOREIGN KEY (`Ganaderia_Id`) REFERENCES `ganaderia` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vaca`
--
ALTER TABLE `vaca`
  ADD CONSTRAINT `fk_Vaca_Arbol` FOREIGN KEY (`Arbol_Id`) REFERENCES `arbol` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vaca_Criador1` FOREIGN KEY (`Criador_Id`) REFERENCES `usuario` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vaca_Ganaderia1` FOREIGN KEY (`Ganaderia_Id`) REFERENCES `ganaderia` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
