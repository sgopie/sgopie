-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 jan 2025 om 16:34
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
-- Database: `parts4u`
--
CREATE DATABASE IF NOT EXISTS `parts4u` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `parts4u`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `part`
--

CREATE TABLE `part` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `part`
--

INSERT INTO `part` (`id`, `name`, `description`, `price`, `image`, `vendor_id`) VALUES
(1, 'Intel Core I7', 'It\'s a CPU', 200.00, 'intel_core_i7.jpg', 1),
(2, 'Intel Core i5', 'It\'s a CPU', 150.00, 'intel_core_i5.jpg', 1),
(3, 'Intel Core i9', 'It\'s a CPU', 350.00, 'intel_core_i9.jpg', 1),
(4, 'AMD Ryzen 5', 'It\'s a CPU', 100.00, 'amd_ryzen_5.jpg', 2),
(5, 'AMD Ryzen 7', 'It\'s a CPU', 170.00, 'amd_ryzen_7.webp', 2),
(6, 'AMD Ryzen 9', 'It\'s a CPU', 320.00, 'amd_ryzen_9.jpg', 2),
(7, 'NVIDIA Geforce 5090', 'It\'s a GPU', 400.00, 'nvidia_geforce_5090.jpg', 3),
(8, 'NVIDIA Geforce 4070', 'It\'s a GPU', 350.00, 'nvidia_geforce_4070.jpg', 3),
(9, 'NVIDIA Geforce 256', 'It\'s an ancient GPU', 3.50, 'nvidia_geforce_256.jpg', 3),
(10, 'Corsair DDR5', 'DDR5 RAM memory', 75.00, 'corsair_ddr5.jpg', 4),
(11, 'Corsair DDR4', 'DDR4 RAM memory', 50.00, 'corsair_ddr4.jpg', 4),
(12, 'Corsair DDR1', 'DDR1 RAM memory', 0.99, 'corsair_ddr1.jpg', 4),
(13, 'Western Digital 4TB HDD', 'It\'s an HDD', 100.00, 'wd_4tb_hdd.png', 7),
(15, 'Western Digital 250GB SSD', 'It\'s an SSD ', 70.00, 'wd_250gb_ssd.png', 7),
(16, 'Western Digital 1TB SSD', 'It\'s an SSD', 85.00, 'wd_1tb_ssd.jpg', 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `purchase`
--

INSERT INTO `purchase` (`id`, `date`, `status`, `total_price`, `user_id`) VALUES
(1, '2025-01-09', 'Besteld', 600.00, 1),
(2, '2025-01-09', 'Besteld', 103.50, 1),
(3, '2025-01-09', 'Besteld', 640.00, 2),
(4, '2025-01-09', 'Besteld', 2424.49, 3),
(5, '2025-01-09', 'Besteld', 70.99, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `purchase_part`
--

CREATE TABLE `purchase_part` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `purchase_part`
--

INSERT INTO `purchase_part` (`id`, `purchase_id`, `part_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 1, 7, 1),
(3, 2, 9, 1),
(4, 2, 13, 1),
(5, 3, 6, 2),
(6, 4, 1, 1),
(7, 4, 2, 1),
(8, 4, 3, 1),
(9, 4, 4, 1),
(10, 4, 5, 1),
(11, 4, 6, 1),
(12, 4, 7, 1),
(13, 4, 8, 1),
(14, 4, 9, 1),
(15, 4, 10, 1),
(16, 4, 11, 1),
(17, 4, 12, 1),
(18, 4, 13, 1),
(20, 4, 15, 1),
(21, 4, 16, 1),
(22, 5, 15, 1),
(23, 5, 12, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin@example.com', '$2y$10$G6ZC1E9ZMv1HMXO4wGvBYeHldqIbPL1zIEVSqo5d.clXREUWWURYe', 'admin'),
(2, 'customer1@example.com', '$2y$10$G6ZC1E9ZMv1HMXO4wGvBYeHldqIbPL1zIEVSqo5d.clXREUWWURYe', 'user'),
(3, 'customer2@example.com', '$2y$10$G6ZC1E9ZMv1HMXO4wGvBYeHldqIbPL1zIEVSqo5d.clXREUWWURYe', 'user');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `description`, `image`) VALUES
(1, 'Intel', 'Intel is a CPU manufacturer', 'intel.png'),
(2, 'AMD', 'AMD is a CPU manufacturer', 'amd.png'),
(3, 'NVIDIA', 'NVIDIA is a GPU manufacturer', 'nvidia.png'),
(4, 'Corsair', 'Corsair is a computer part manufacturer', 'corsair.png'),
(5, 'Cooler Master', 'Cooler Master is a computer parts manufacturer', 'cooler_master.png'),
(6, 'Kingston', 'Kingston is a computer part manufacturer', 'kingston.png'),
(7, 'Western Digital', 'Western digital is an SSD/HDD manufacturer', 'western_digital.png');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexen voor tabel `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `purchase_part`
--
ALTER TABLE `purchase_part`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `part_id` (`part_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `part`
--
ALTER TABLE `part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `purchase_part`
--
ALTER TABLE `purchase_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `part`
--
ALTER TABLE `part`
  ADD CONSTRAINT `part_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);

--
-- Beperkingen voor tabel `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Beperkingen voor tabel `purchase_part`
--
ALTER TABLE `purchase_part`
  ADD CONSTRAINT `purchase_part_ibfk_1` FOREIGN KEY (`part_id`) REFERENCES `part` (`id`),
  ADD CONSTRAINT `purchase_part_ibfk_2` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
