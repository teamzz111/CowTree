-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2018 a las 13:39:58
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
(96, 'Arbol de Junior'),
(95, 'Arbol de Lo que sea'),
(94, 'Arbol de Cj'),
(93, 'Arbol de Jesus de Nazaret'),
(92, 'Arbol de Harry Potter'),
(91, 'Arbol de Larry'),
(90, 'Arbol de Dios destructor'),
(89, 'Arbol de Charlie'),
(88, 'Arbol de Lord Tocino'),
(87, 'Arbol de Hamburguesito'),
(86, 'Arbol de Hamburguesito'),
(85, 'Arbol de Hamburguesito'),
(84, 'Arbol de Hamburguesito'),
(83, 'Arbol de Hambu');

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
-- Estructura de tabla para la tabla `rama`
--

CREATE TABLE `rama` (
  `IdArbol` int(3) NOT NULL,
  `IdVaca` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `Nivel` int(3) DEFAULT NULL,
  `posicion` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `rama`
--

INSERT INTO `rama` (`IdArbol`, `IdVaca`, `Nivel`, `posicion`) VALUES
(87, '1', 1, 1),
(88, '2', 1, 1),
(87, '2', 2, 2),
(89, '3', 1, 1),
(87, '3', 2, 3),
(90, '4', 1, 1),
(87, '4', 2, 1),
(91, '5', 1, 1),
(88, '5', 2, 0),
(87, '5', 3, 1),
(92, '6', 1, 1),
(88, '6', 2, 0),
(87, '6', 3, 2),
(93, '7', 1, 1),
(89, '7', 2, 0),
(87, '7', 3, 3),
(94, '8', 1, 1),
(90, '8', 2, 0),
(87, '8', 3, 4),
(96, '9', 1, 1),
(91, '9', 2, 0),
(88, '9', 3, 0),
(87, '9', 4, 1);

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
-- Volcado de datos para la tabla `vaca`
--

INSERT INTO `vaca` (`Ejemplar`, `Nombre`, `Estado`, `Destino`, `Edad`, `Sexo`, `Herrado`, `Destetado`, `Fecha_nacimiento`, `Encaste`, `Reseña`, `Ganaderia_Id`, `Criador_Id`, `Fenotipo`, `Defectos`, `Calificacion`, `Comportamiento`, `Observadores`, `IdPadre`, `IdMadre`) VALUES
('ASP-188-188-2014-H-SOSPECHOSA', 'Prueba 1', 'Vivo', 'Tentar', 4, '', 'Sí', 'No', '2018-09-14', 'Baltasar Iban', 'En buen estado', 0, 0, 'Test', 'Ninguni', '5', 'Normal', 'Andrés Largo', '0', NULL),
('4', 'Dios destructor', 'Vivo', 'Reinar el mundo', 6, 'sí', 'sí', 'sí', '4211-12-12', 'El mejor papu', '', 5, 0, 'No jé', 'Ninguno, es perfecto', '1000', 'Excelente', 'El universo entero', '1', ''),
('1', 'Hamburguesito', 'Vivo', 'Burguerking', 15, 'sí', 'sí', 'sí', '2111-02-11', 'NEL', 'Delicioso', 5, 0, 'Shido', 'no sirve para nada', '10', 'prron', 'Chewaca', '', ''),
('2', 'Lord Tocino', 'Deprimido', 'asda', 13, 'sí', 'sí', 'sí', '2027-11-15', '', 'w423', 5, 0, 'algo', 'Se va a morir', '45', 'Terrible', 'Diosito', '1', ''),
('3', 'Charlie', 'Activo', 'La muerte', 8, 'sí', 'sí', 'sí', '2019-02-03', '32', 'w423', 5, 0, 'khe', 'no sirve para nada', '10', 'increíble', 'Kratos', '1', ''),
('5', 'Larry', 'Activo', 'Burguerking', 12, 'sí', 'sí', 'sí', '4520-02-11', 'pos si', 'Not bad', 5, 0, 'ni idea', 'no hay ', '99', 'maravilloso', 'su mami', '2', ''),
('6', 'Harry Potter', 'Hechizado', 'Hogwarts', 20, 'sí', 'sí', 'sí', '2405-12-10', 'No tiene', 'Es un buen mago', 5, 0, 'no tiene nada ', 'Tiene una cicatriz en la frente ', '50', 'Rebelde', 'nadie, usa una capa invisible', '2', ''),
('7', 'Jesus de Nazaret', 'vivo en todos nosotros', 'El cielo', 33, 'sí', 'sí', 'sí', '0001-01-01', 'nel', 'Bueno', 5, 0, 'no tiene nada ', 'Ninguno', '80', 'Bueno', 'Diosito', '3', ''),
('8', 'Cj', 'Negro', 'las venturas', 24, 'sí', 'sí', 'sí', '2004-02-10', 'nada', 'prron', 5, 0, 'ni idea', 'Es negro', '12', 'Como todo un gangster', 'Ryder', '4', ''),
('9', 'Junior', 'Vivo', 'vivir feliz', 45, 'sí', 'sí', 'sí', '0042-02-11', '2', '21212', 5, 0, 'asd', 'hk', '21', 'Chingon', '12', '5', '');

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
