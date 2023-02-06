-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server Betriebssystem:        Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Exportiere Datenbank Struktur für localgaming
CREATE DATABASE IF NOT EXISTS `localgaming` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `localgaming`;

-- Exportiere Struktur von Tabelle localgaming.bestand
CREATE TABLE IF NOT EXISTS `bestand` (
  `Bestand_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Produkt_ID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Bestand_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle localgaming.bestand: ~0 rows (ungefähr)
DELETE FROM `bestand`;
/*!40000 ALTER TABLE `bestand` DISABLE KEYS */;
/*!40000 ALTER TABLE `bestand` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle localgaming.endgeraet
CREATE TABLE IF NOT EXISTS `endgeraet` (
  `Konsole_ID` bigint(20) NOT NULL,
  `K_Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Konsole_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle localgaming.endgeraet: ~8 rows (ungefähr)
DELETE FROM `endgeraet`;
/*!40000 ALTER TABLE `endgeraet` DISABLE KEYS */;
INSERT INTO `endgeraet` (`Konsole_ID`, `K_Name`) VALUES
	(1, 'Playstation5'),
	(2, 'Playstation4'),
	(3, 'Playstation3'),
	(4, 'Playstation2'),
	(5, 'Playstation1'),
	(6, 'PSP'),
	(7, 'GameBoy'),
	(8, 'GameBoyColor');
/*!40000 ALTER TABLE `endgeraet` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle localgaming.produkt
CREATE TABLE IF NOT EXISTS `produkt` (
  `Produkt_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `P_Name` varchar(50) NOT NULL,
  `P_Zustand` varchar(50) NOT NULL,
  `P_Preis` double NOT NULL CHECK (`P_Preis` >= '0.00'),
  `Bestellung_ID` bigint(20) DEFAULT NULL,
  `Konsole_ID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Produkt_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle localgaming.produkt: ~6 rows (ungefähr)
DELETE FROM `produkt`;
/*!40000 ALTER TABLE `produkt` DISABLE KEYS */;
INSERT INTO `produkt` (`Produkt_ID`, `P_Name`, `P_Zustand`, `P_Preis`, `Bestellung_ID`, `Konsole_ID`) VALUES
	(8, 'Pokemon Rot', 'OK', 34.99, NULL, 7),
	(9, 'Pokemon Blau', 'Gut', 24.99, NULL, 7),
	(10, 'Pokemon Gelb', 'Gut', 34.99, NULL, 7),
	(11, 'Pokemon Silber', 'Gut', 44.99, NULL, 7),
	(12, 'Pokemon Gold', 'Gut', 44.99, NULL, 7),
	(13, 'Demon Souls', 'Sehr Gut', 49.99, NULL, 1);
/*!40000 ALTER TABLE `produkt` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle localgaming.warenkorb
CREATE TABLE IF NOT EXISTS `warenkorb` (
  `Bestellung_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Bestand_ID` char(1) DEFAULT NULL,
  PRIMARY KEY (`Bestellung_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle localgaming.warenkorb: ~0 rows (ungefähr)
DELETE FROM `warenkorb`;
/*!40000 ALTER TABLE `warenkorb` DISABLE KEYS */;
/*!40000 ALTER TABLE `warenkorb` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
