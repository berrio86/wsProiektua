-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2016 at 12:14 
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `argazkiBilduma`
--

-- --------------------------------------------------------

--
-- Table structure for table `Argazkia`
--

CREATE TABLE `Argazkia` (
  `Helbidea` varchar(200) NOT NULL,
  `AtzipenMota` varchar(30) NOT NULL,
  `Jabea` varchar(30) NOT NULL,
  `BildumaIzena` varchar(50) NOT NULL,
  `ArgazkiIzena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Argazkia`
--

INSERT INTO `Argazkia` (`Helbidea`, `AtzipenMota`, `Jabea`, `BildumaIzena`, `ArgazkiIzena`) VALUES
('bildumak/iberriochoa001@ikasle.ehu.eus/EzabatzekoBil/SI2.png', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'EzabatzekoBil', 'SI2.png'),
('bildumak/iberriochoa001@ikasle.ehu.eus/EzabatzekoBil/superman.png', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'EzabatzekoBil', 'superman.png'),
('bildumak/iberriochoa001@ikasle.ehu.eus/EzabatzekoBilduma/Screenshot from 2016-12-17 12-10-46.png', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'EzabatzekoBilduma', 'Screenshot from 2016-12-17 12-'),
('bildumak/iberriochoa001@ikasle.ehu.eus/EzabatzekoBilduma/Screenshot from 2016-12-17 12-10-52.png', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'EzabatzekoBilduma', 'Screenshot from 2016-12-17 12-'),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/autoa.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'autoa.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/bakardadea.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'bakardadea.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/errepidea.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'errepidea.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/faroa.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'faroa.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/gorria.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'gorria.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/hariak.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'hariak.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/ibaia.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'ibaia.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/ilunabarra.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'ilunabarra.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/FrogaBilduma/itsasontzia.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'FrogaBilduma', 'itsasontzia.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/kenia.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'kenia.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/kresala.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'kresala.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/lainoak.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'lainoak.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/lakua.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'lakua.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/lorea.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'lorea.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/tigrea.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'tigrea.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/udazkena.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'udazkena.jpg'),
('bildumak/iberriochoa001@ikasle.ehu.eus/Photoshop/ura.jpg', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'Photoshop', 'ura.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Bilduma`
--

CREATE TABLE `Bilduma` (
  `Izena` varchar(50) NOT NULL,
  `Jabea` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Bilduma`
--

INSERT INTO `Bilduma` (`Izena`, `Jabea`) VALUES
('EzabatzekoBil', 'iberriochoa001@ikasle.ehu.eus'),
('EzabatzekoBilduma', 'iberriochoa001@ikasle.ehu.eus'),
('FrogaBilduma', 'iberriochoa001@ikasle.ehu.eus'),
('Photoshop', 'iberriochoa001@ikasle.ehu.eus');

-- --------------------------------------------------------

--
-- Table structure for table `Erabiltzailea`
--

CREATE TABLE `Erabiltzailea` (
  `Email` varchar(30) NOT NULL,
  `Izena` varchar(30) NOT NULL,
  `Pasahitza` varchar(30) NOT NULL,
  `Mota` varchar(30) NOT NULL,
  `Kontagailua` int(1) NOT NULL,
  `Argazkia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Erabiltzailea`
--

INSERT INTO `Erabiltzailea` (`Email`, `Izena`, `Pasahitza`, `Mota`, `Kontagailua`, `Argazkia`) VALUES
('iberriochoa001@ikasle.ehu.eus', 'Inaki Berriotxoa Gabiria', '123456', 'Bazkidea', 0, ''),
('jarzelus001@ikasle.ehu.eus', 'Jon Arzelus', '123456', 'Bazkidea', 0, ''),
('webmaster@argazkiBilduma.com', 'Web Master', '123456', 'Administratzailea', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ErabiltzaileBerria`
--

CREATE TABLE `ErabiltzaileBerria` (
  `Izena` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Pasahitza` varchar(50) NOT NULL,
  `Mota` varchar(30) NOT NULL,
  `kontagailua` int(1) NOT NULL,
  `Argazkia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ErabiltzaileBerria`
--

INSERT INTO `ErabiltzaileBerria` (`Izena`, `Email`, `Pasahitza`, `Mota`, `kontagailua`, `Argazkia`) VALUES
('Urtzi Otamendi', 'uotamendi002@ikasle.ehu.eus', '123456', 'Bazkidea', 0, 'erabiltzaileIrudiak/uotamendi002ikasleehueus');

-- --------------------------------------------------------

--
-- Table structure for table `Etiketa`
--

CREATE TABLE `Etiketa` (
  `Helbidea` varchar(200) NOT NULL,
  `EtiketaIzena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Argazkia`
--
ALTER TABLE `Argazkia`
  ADD PRIMARY KEY (`Helbidea`);

--
-- Indexes for table `Bilduma`
--
ALTER TABLE `Bilduma`
  ADD PRIMARY KEY (`Izena`,`Jabea`);

--
-- Indexes for table `Erabiltzailea`
--
ALTER TABLE `Erabiltzailea`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `Etiketa`
--
ALTER TABLE `Etiketa`
  ADD PRIMARY KEY (`EtiketaIzena`,`Helbidea`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
