-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 16 feb 2023 om 19:25
-- Serverversie: 5.7.36
-- PHP-versie: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attractiepark`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `achtbaan`
--

DROP TABLE IF EXISTS `achtbaan`;
CREATE TABLE IF NOT EXISTS `achtbaan` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `NaamAchtbaan` varchar(50) NOT NULL,
  `NaamPretpark` varchar(50) NOT NULL,
  `Land` varchar(50) NOT NULL,
  `Topsnelheid` int(11) NOT NULL,
  `Hoogte` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Cijfer` decimal(3,1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `achtbaan`
--

INSERT INTO `achtbaan` (`Id`, `NaamAchtbaan`, `NaamPretpark`, `Land`, `Topsnelheid`, `Hoogte`, `Datum`, `Cijfer`) VALUES
(1, 'Red Force', 'Ferrari Land', 'Spanje', 192, 112, '1968-03-02', '9.2'),
(2, 'Ring Racer', 'Circuit Nürnberg', 'Duitsland', 160, 110, '1974-08-01', '8.7'),
(3, 'Hyperion', 'EnergyLandia', 'Polen', 141, 77, '2009-09-09', '6.3'),
(4, 'Furios Baco', 'PortAventura', 'Spanje', 138, 23, '2018-06-06', '5.5'),
(5, 'Shambhala', 'PortAventura', 'Spanje', 134, 102, '2017-04-03', '9.7');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
