-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2025 at 10:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `przychodnia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `login`, `pass`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `gabinety`
--

CREATE TABLE `gabinety` (
  `id` int(11) NOT NULL,
  `numer` int(11) DEFAULT NULL,
  `piętro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `harmonogram`
--

CREATE TABLE `harmonogram` (
  `id` int(11) NOT NULL,
  `id_wizyty` int(11) DEFAULT NULL,
  `id_lekarza` int(11) DEFAULT NULL,
  `godzina` int(2) DEFAULT NULL,
  `minuty` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lekarze`
--

CREATE TABLE `lekarze` (
  `id` int(11) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `nr_tel` int(11) NOT NULL,
  `id_specjalizacja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pacjeci`
--

CREATE TABLE `pacjeci` (
  `id` int(11) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `nr_tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recepty`
--

CREATE TABLE `recepty` (
  `id` int(11) NOT NULL,
  `id_lekarz` int(11) DEFAULT NULL,
  `id_pacjent` int(11) DEFAULT NULL,
  `opis` text NOT NULL,
  `data_wystawienia` datetime NOT NULL,
  `data_wygaśnięcia` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specjalizacja`
--

CREATE TABLE `specjalizacja` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `specjalizacja`
--

INSERT INTO `specjalizacja` (`id`, `nazwa`) VALUES
(1, 'Chirurgia ogólna'),
(2, 'Choroby płuc');

-- --------------------------------------------------------

--
-- Table structure for table `Wizyty`
--

CREATE TABLE `Wizyty` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `typ_wizyty` text DEFAULT NULL,
  `id_lekarz` int(11) DEFAULT NULL,
  `id_pacjent` int(11) DEFAULT NULL,
  `id_gabinet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gabinety`
--
ALTER TABLE `gabinety`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harmonogram`
--
ALTER TABLE `harmonogram`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_wizyty_harmon` (`id_wizyty`),
  ADD KEY `fk_lekarz_harmon` (`id_lekarza`);

--
-- Indexes for table `lekarze`
--
ALTER TABLE `lekarze`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_spec_lek` (`id_specjalizacja`);

--
-- Indexes for table `pacjeci`
--
ALTER TABLE `pacjeci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recepty`
--
ALTER TABLE `recepty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lekarz_recept` (`id_lekarz`),
  ADD KEY `fk_pacjent_recpt` (`id_pacjent`);

--
-- Indexes for table `specjalizacja`
--
ALTER TABLE `specjalizacja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Wizyty`
--
ALTER TABLE `Wizyty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lekarz_wizyty` (`id_lekarz`),
  ADD KEY `fk_pacjent_wizyty` (`id_pacjent`),
  ADD KEY `fk_gabinet_wizyty` (`id_gabinet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gabinety`
--
ALTER TABLE `gabinety`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `harmonogram`
--
ALTER TABLE `harmonogram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lekarze`
--
ALTER TABLE `lekarze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pacjeci`
--
ALTER TABLE `pacjeci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recepty`
--
ALTER TABLE `recepty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specjalizacja`
--
ALTER TABLE `specjalizacja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Wizyty`
--
ALTER TABLE `Wizyty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `harmonogram`
--
ALTER TABLE `harmonogram`
  ADD CONSTRAINT `fk_lekarz_harmon` FOREIGN KEY (`id_lekarza`) REFERENCES `lekarze` (`id`),
  ADD CONSTRAINT `fk_wizyty_harmon` FOREIGN KEY (`id_wizyty`) REFERENCES `Wizyty` (`id`);

--
-- Constraints for table `lekarze`
--
ALTER TABLE `lekarze`
  ADD CONSTRAINT `fk_spec_lek` FOREIGN KEY (`id_specjalizacja`) REFERENCES `specjalizacja` (`id`);

--
-- Constraints for table `recepty`
--
ALTER TABLE `recepty`
  ADD CONSTRAINT `fk_lekarz_recept` FOREIGN KEY (`id_lekarz`) REFERENCES `lekarze` (`id`),
  ADD CONSTRAINT `fk_pacjent_recpt` FOREIGN KEY (`id_pacjent`) REFERENCES `pacjeci` (`id`);

--
-- Constraints for table `Wizyty`
--
ALTER TABLE `Wizyty`
  ADD CONSTRAINT `fk_gabinet_wizyty` FOREIGN KEY (`id_gabinet`) REFERENCES `gabinety` (`id`),
  ADD CONSTRAINT `fk_lekarz_wizyty` FOREIGN KEY (`id_lekarz`) REFERENCES `lekarze` (`id`),
  ADD CONSTRAINT `fk_pacjent_wizyty` FOREIGN KEY (`id_pacjent`) REFERENCES `pacjeci` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
