-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2025 at 07:32 PM
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
-- Database: `rrprojekt`
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
(1, 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441'),
(2, 'm', '*E8BEE713F0CBBB9F9B09623007E2826138710274');

-- --------------------------------------------------------

--
-- Table structure for table `dystrybucje`
--

CREATE TABLE `dystrybucje` (
  `id` int(11) NOT NULL,
  `id_produkt` int(11) DEFAULT NULL,
  `id_fabryka` int(11) DEFAULT NULL,
  `region` varchar(20) DEFAULT NULL,
  `sprzedane_sztuki` int(11) DEFAULT NULL,
  `rok` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dystrybucje`
--

INSERT INTO `dystrybucje` (`id`, `id_produkt`, `id_fabryka`, `region`, `sprzedane_sztuki`, `rok`) VALUES
(1, 1, 1, 'Praga', 500, '2024'),
(2, 2, 2, 'Białołęka', 1500, '2024');

-- --------------------------------------------------------

--
-- Table structure for table `fabryki`
--

CREATE TABLE `fabryki` (
  `id` int(11) NOT NULL,
  `adres` varchar(35) NOT NULL,
  `nazwa` text NOT NULL,
  `data_otwarcia` date NOT NULL,
  `wudajnosc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fabryki`
--

INSERT INTO `fabryki` (`id`, `adres`, `nazwa`, `data_otwarcia`, `wudajnosc`) VALUES
(1, 'Miodowa ', 'nazwa1', '2025-01-01', 100),
(2, 'Modlińska', 'nazwa2', '2025-01-01', 100);

-- --------------------------------------------------------

--
-- Table structure for table `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `id_war_odz` int(11) DEFAULT NULL,
  `id_sklad_prod` int(11) DEFAULT NULL,
  `nazwa` text NOT NULL,
  `koszt` int(11) DEFAULT NULL,
  `waga` int(11) DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `data_wprowadzenia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `id_war_odz`, `id_sklad_prod`, `nazwa`, `koszt`, `waga`, `opis`, `data_wprowadzenia`) VALUES
(1, 1, 2, 'nazwa1', 1, 1, 'opis1', '2025-01-01'),
(2, 2, 2, 'nazwa2', 2, 2, 'opis2', '2025-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `skladniki`
--

CREATE TABLE `skladniki` (
  `id` int(11) NOT NULL,
  `nazwa` text DEFAULT NULL,
  `opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skladniki`
--

INSERT INTO `skladniki` (`id`, `nazwa`, `opis`) VALUES
(1, 'nazwa1', 'opis1'),
(2, 'nazwa2', 'opis2');

-- --------------------------------------------------------

--
-- Table structure for table `skladniki_prod`
--

CREATE TABLE `skladniki_prod` (
  `id` int(11) NOT NULL,
  `id_skladniki` int(11) DEFAULT NULL,
  `ilsoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skladniki_prod`
--

INSERT INTO `skladniki_prod` (`id`, `id_skladniki`, `ilsoc`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `wartosci_odzywcze`
--

CREATE TABLE `wartosci_odzywcze` (
  `id` int(11) NOT NULL,
  `kalorie` int(11) DEFAULT NULL,
  `bialko` int(11) DEFAULT NULL,
  `tluszcze` int(11) DEFAULT NULL,
  `cukry` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wartosci_odzywcze`
--

INSERT INTO `wartosci_odzywcze` (`id`, `kalorie`, `bialko`, `tluszcze`, `cukry`) VALUES
(1, 12, 10, 30, 1),
(2, 5, 2, 3, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dystrybucje`
--
ALTER TABLE `dystrybucje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prod_dyst` (`id_produkt`),
  ADD KEY `fk_fab_dyst` (`id_fabryka`);

--
-- Indexes for table `fabryki`
--
ALTER TABLE `fabryki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_warodz_produkty` (`id_war_odz`),
  ADD KEY `fk_skladprod_produkty` (`id_sklad_prod`);

--
-- Indexes for table `skladniki`
--
ALTER TABLE `skladniki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skladniki_prod`
--
ALTER TABLE `skladniki_prod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sklad_skladprod` (`id_skladniki`);

--
-- Indexes for table `wartosci_odzywcze`
--
ALTER TABLE `wartosci_odzywcze`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dystrybucje`
--
ALTER TABLE `dystrybucje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fabryki`
--
ALTER TABLE `fabryki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skladniki`
--
ALTER TABLE `skladniki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skladniki_prod`
--
ALTER TABLE `skladniki_prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wartosci_odzywcze`
--
ALTER TABLE `wartosci_odzywcze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dystrybucje`
--
ALTER TABLE `dystrybucje`
  ADD CONSTRAINT `fk_fab_dyst` FOREIGN KEY (`id_fabryka`) REFERENCES `fabryki` (`id`),
  ADD CONSTRAINT `fk_prod_dyst` FOREIGN KEY (`id_produkt`) REFERENCES `produkty` (`id`);

--
-- Constraints for table `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `fk_skladprod_produkty` FOREIGN KEY (`id_sklad_prod`) REFERENCES `skladniki_prod` (`id`),
  ADD CONSTRAINT `fk_warodz_produkty` FOREIGN KEY (`id_war_odz`) REFERENCES `wartosci_odzywcze` (`id`);

--
-- Constraints for table `skladniki_prod`
--
ALTER TABLE `skladniki_prod`
  ADD CONSTRAINT `fk_sklad_skladprod` FOREIGN KEY (`id_skladniki`) REFERENCES `skladniki` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
