-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2016 a las 10:19:34
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
('1 Otamendi', '1uotamendi002@ikasle.ehu.eus', '123456', 'Bazkidea', 0, 'erabiltzaileIrudiak/uotamendi002ikasleehueus');
INSERT INTO `erabiltzaileberria` (`Izena`, `Email`, `Pasahitza`, `Mota`, `kontagailua`, `Argazkia`) VALUES
('2 Otamendi', '2uotamendi002@ikasle.ehu.eus', '123456', 'Bazkidea', 0, 'erabiltzaileIrudiak/uotamendi002ikasleehueus');
INSERT INTO `erabiltzaileberria` (`Izena`, `Email`, `Pasahitza`, `Mota`, `kontagailua`, `Argazkia`) VALUES
('3 Otamendi', '3uotamendi002@ikasle.ehu.eus', '123456', 'Bazkidea', 0, 'erabiltzaileIrudiak/uotamendi002ikasleehueus');
INSERT INTO `erabiltzaileberria` (`Izena`, `Email`, `Pasahitza`, `Mota`, `kontagailua`, `Argazkia`) VALUES
('4 Otamendi', '4uotamendi002@ikasle.ehu.eus', '123456', 'Bazkidea', 0, 'erabiltzaileIrudiak/uotamendi002ikasleehueus');
INSERT INTO `erabiltzaileberria` (`Izena`, `Email`, `Pasahitza`, `Mota`, `kontagailua`, `Argazkia`) VALUES
('5 Otamendi', '5uotamendi002@ikasle.ehu.eus', '123456', 'Bazkidea', 0, 'erabiltzaileIrudiak/uotamendi002ikasleehueus');
INSERT INTO `erabiltzaileberria` (`Izena`, `Email`, `Pasahitza`, `Mota`, `kontagailua`, `Argazkia`) VALUES
('6 Otamendi', '6uotamendi002@ikasle.ehu.eus', '123456', 'Bazkidea', 0, 'erabiltzaileIrudiak/uotamendi002ikasleehueus');
INSERT INTO `erabiltzaileberria` (`Izena`, `Email`, `Pasahitza`, `Mota`, `kontagailua`, `Argazkia`) VALUES
('7 Otamendi', '7uotamendi002@ikasle.ehu.eus', '123456', 'Bazkidea', 0, 'erabiltzaileIrudiak/uotamendi002ikasleehueus');
INSERT INTO `erabiltzaileberria` (`Izena`, `Email`, `Pasahitza`, `Mota`, `kontagailua`, `Argazkia`) VALUES
('8 Otamendi', '8uotamendi002@ikasle.ehu.eus', '123456', 'Bazkidea', 0, 'erabiltzaileIrudiak/uotamendi002ikasleehueus');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
