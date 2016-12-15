-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2016 at 12:06 
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
('bildumak/iberriochoa001@ikasle.ehu.eus/GuttenMorgen/superman.png', 'Publikoa', 'iberriochoa001@ikasle.ehu.eus', 'GuttenMorgen', 'superman.png');

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
('GuttenMorgen', 'iberriochoa001@ikasle.ehu.eus'),
('Hello', 'iberriochoa001@ikasle.ehu.eus'),
('Kaixo', 'iberriochoa001@ikasle.ehu.eus');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
