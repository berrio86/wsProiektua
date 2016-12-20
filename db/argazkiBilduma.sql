-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2016 a las 00:08:13
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `argazkibilduma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `argazkia`
--

CREATE TABLE `argazkia` (
  `Helbidea` varchar(200) NOT NULL,
  `Jabea` varchar(30) NOT NULL,
  `BildumaIzena` varchar(50) NOT NULL,
  `ArgazkiIzena` varchar(30) NOT NULL,
  `Etiketak` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `argazkia`
--

INSERT INTO `argazkia` (`Helbidea`, `Jabea`, `BildumaIzena`, `ArgazkiIzena`, `Etiketak`) VALUES
('bildumak/iberriochoa001@ikasle.ehu.eus/EzabatzekoBil/SI2.png', 'iberriochoa001@ikasle.ehu.eus', 'EzabatzekoBil', 'SI2.png', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/EzabatzekoBil/superman.png', 'iberriochoa001@ikasle.ehu.eus', 'EzabatzekoBil', 'superman.png', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/EzabatzekoBilduma/Screenshot from 2016-12-17 12-10-46.png', 'iberriochoa001@ikasle.ehu.eus', 'EzabatzekoBilduma', 'Screenshot from 2016-12-17 12-', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/EzabatzekoBilduma/Screenshot from 2016-12-17 12-10-52.png', 'iberriochoa001@ikasle.ehu.eus', 'EzabatzekoBilduma', 'Screenshot from 2016-12-17 12-', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/autoa.jpg', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'autoa.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/bakardadea.jpg', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'bakardadea.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/errepidea.jpg', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'errepidea.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/faroa.jpg', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'faroa.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/gorria.jpg', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'gorria.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/hariak.jpg', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'hariak.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/ibaia.jpg', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'ibaia.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/ilunabarra.jpg', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'ilunabarra.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/itsasontzia.jpg', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'itsasontzia.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/kenia.jpg', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'kenia.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/kresala.jpg', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'kresala.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/lainoak.jpg', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'lainoak.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/lakua.jpg', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'lakua.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/lorea.jpg', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'lorea.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/tigrea.jpg', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'tigrea.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/udazkena.jpg', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'udazkena.jpg', ''),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/ura.jpg', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'ura.jpg', ''),
('bildumak/jarzelus001@ikasle.ehu.eus/Albumee/user-icon.png', 'jarzelus001@ikasle.ehu.eus', 'Albumee', 'user-icon.png', 0x613a373a7b693a303b733a313a2261223b693a313b733a313a2262223b693a323b733a313a2263223b693a333b733a313a2264223b693a343b733a313a2265223b693a353b733a313a2266223b693a363b733a313a2267223b7d),
('bildumak/jarzelus001@ikasle.ehu.eus/Albumee/wikipedia-icon.png', 'jarzelus001@ikasle.ehu.eus', 'Albumee', 'wikipedia-icon.png', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bilduma`
--

CREATE TABLE `bilduma` (
  `Izena` varchar(50) NOT NULL,
  `Jabea` varchar(30) NOT NULL,
  `atzipenMota` set('publikoa','atzipenMugatua','pribatua') NOT NULL DEFAULT 'pribatua'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bilduma`
--

INSERT INTO `bilduma` (`Izena`, `Jabea`, `atzipenMota`) VALUES
('Albumee', 'jarzelus001@ikasle.ehu.eus', 'atzipenMugatua'),
('EzabatzekoBil', 'iberriochoa001@ikasle.ehu.eus', 'publikoa'),
('EzabatzekoBilduma', 'iberriochoa001@ikasle.ehu.eus', 'atzipenMugatua'),
('FrogaBilduma', 'iberriochoa001@ikasle.ehu.eus', 'pribatua'),
('Photoshop', 'iberriochoa001@ikasle.ehu.eus', 'publikoa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erabiltzailea`
--

CREATE TABLE `erabiltzailea` (
  `Email` varchar(30) NOT NULL,
  `Izena` varchar(30) NOT NULL,
  `Pasahitza` varchar(30) NOT NULL,
  `Mota` varchar(30) NOT NULL,
  `Kontagailua` int(1) NOT NULL,
  `Argazkia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `erabiltzailea`
--

INSERT INTO `erabiltzailea` (`Email`, `Izena`, `Pasahitza`, `Mota`, `Kontagailua`, `Argazkia`) VALUES
('iberriochoa001@ikasle.ehu.eus', 'Inaki Berriotxoa Gabiria', '123456', 'Bazkidea', 0, ''),
('jarzelus001@ikasle.ehu.eus', 'Jon Arzelus', '123456', 'Bazkidea', 0, ''),
('webmaster@argazkiBilduma.com', 'Web Master', '123456', 'Administratzailea', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erabiltzaileberria`
--

CREATE TABLE `erabiltzaileberria` (
  `Izena` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Pasahitza` varchar(50) NOT NULL,
  `Mota` varchar(30) NOT NULL,
  `kontagailua` int(1) NOT NULL,
  `Argazkia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `erabiltzaileberria`
--

INSERT INTO `erabiltzaileberria` (`Izena`, `Email`, `Pasahitza`, `Mota`, `kontagailua`, `Argazkia`) VALUES
('Urtzi Otamendi', 'uotamendi002@ikasle.ehu.eus', '123456', 'Bazkidea', 0, 'erabiltzaileIrudiak/uotamendi002ikasleehueus');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `argazkia`
--
ALTER TABLE `argazkia`
  ADD PRIMARY KEY (`Helbidea`);

--
-- Indices de la tabla `bilduma`
--
ALTER TABLE `bilduma`
  ADD PRIMARY KEY (`Izena`,`Jabea`);

--
-- Indices de la tabla `erabiltzailea`
--
ALTER TABLE `erabiltzailea`
  ADD PRIMARY KEY (`Email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
