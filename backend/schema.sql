-- CowTree database schema (structure only; data rows removed)
-- Originally generated with phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2018 a las 04:39:16
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.0.32

CREATE DATABASE cowtree;
use cowtree;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cowtree`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbol`
--

CREATE TABLE `arbol` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Estructura de tabla para la tabla `rama`
--

CREATE TABLE `rama` (
  `IdArbol` int(3) NOT NULL,
  `IdVaca` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `Nivel` int(3) DEFAULT NULL,
  `posicion` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vaca`
--

CREATE TABLE `vaca` (
  `Ejemplar` varchar(100) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) NOT NULL,
  `Destino` varchar(45) NOT NULL,
  `Edad` tinyint(2) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `Herrado` varchar(45) DEFAULT NULL,
  `Destetado` varchar(45) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  `Encaste` varchar(45) NOT NULL,
  `Reseña` varchar(45) NOT NULL,
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
  ADD KEY `fk_Vaca_Ganaderia1_idx` (`Ganaderia_Id`),
  ADD KEY `fk_Vaca_Criador1_idx` (`Criador_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arbol`
--
ALTER TABLE `arbol`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `ganaderia`
--
ALTER TABLE `ganaderia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
