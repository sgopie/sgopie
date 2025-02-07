-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 feb 2025 om 08:52
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phptoets`
--
CREATE DATABASE IF NOT EXISTS `phptoets` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phptoets`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `image`, `description`) VALUES
(1, 'Sudhir', 'ye.webp', 'hates Nick-hers :)'),
(2, 'Gabriel', 'monkey.jpg', 'beats woman'),
(3, 'Harmandeep', 'scemmer.jpg', 'likes novi'),
(4, 'Kimberly', 'thewoman.avif', 'kills the woman beater'),
(5, 'Novi', 'theman.jpg', 'likes harmandeep'),
(6, 'Saniya', 'theracer.jpg', 'very good racer...'),
(7, 'Wilson', 'wilson.jpg', 'Lo siento');
(8, 'Smurfcat', 'smurfcat.jpg', 'he in da forest');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
