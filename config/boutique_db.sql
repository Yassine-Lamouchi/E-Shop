-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2026 at 08:26 PM
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
-- Database: `boutique_db`
--
CREATE DATABASE IF NOT EXISTS `boutique_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `boutique_db`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cat`, `nom_cat`) VALUES
(1, 'Smartphones'),
(2, 'Ordinateurs'),
(3, 'Accessoires');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `quantite_stock` int(11) DEFAULT 0,
  `id_categorie` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `quantite_stock`, `id_categorie`, `image`, `date_creation`) VALUES
(1, 'iPhone 15 Pro Max 256Go Titane Naturel - APPLE', 'Écran 6,7\" OLED Super Retina XDR - Résolution: 1290 x 2796 pixels - Processeur: Apple A17 Pro bionic (3nm) Hexa-core (2x3,78 GHz + 4x2,11 GHz) - GPU Apple graphiques 6 cœurs - Système d\'exploitation: iOS 17 - Mémoire RAM: 8Go - Stockage: 256Go - Appareil photo Arrière: Trio Pixels: 48 MP, f/1,78, 24 mm + 12 MP, f/1.78, 48 mm + 12 MP, f/2.2, 13 mm - Appareil Avant: 12 MP,  f/2.8, 120mm , Zoom numérique jusqu\'à 25x - Video 4K à 24/25/30/60 ips, 1080p à 25/30/60/120 ips, gyro-EIS - Connectivité: 5G NR, Wi‑Fi 6, Bluetooth 5.3 et USB Type-C 3.2 Gen 2 - Streaming vidéo : jusqu’à 25 heures, Lecture Vidéo : jusqu’à 29 heures, Lecture Audio : jusqu’à 95 heures - Batterie: Lithium-ion 4441mAh - Charge rapide jusqu’à 50% en 30 min - 15W sans fil (MagSafe) - sans fil Qi jusqu’à 7,5 W -  Face ID - Apple Pay - Siri - NFC - Indice de protection IP68 - Détection des accidents - Appel d’urgence - Couleur: Titane Naturel - Garantie: 2 ans', 3900.00, 12, 1, '1.jpg', '2026-03-22 11:47:05'),
(2, 'Samsung S24 Ultra  5G / 12 Go / 256 Go / Violet\r\n', 'Double SIM - Écran 6.8\" AMOLED dynamique 2X - Résolution: Quad HD+ (3120 x 1440) - Taux de rafraîchissement: 120 Hz - Prise en charge du stylet S - Processeur: Qualcomm Snapdragon 8 Gen 3 Octa-Core - Mémoire: 12 Go - Stockage: 256 Go - Résolution caméra arrière (Multiple): 200.0 MP (f1.7) + 50.0 MP (f3.4) + 12.0 MP (f2.2) + 10.0 MP (f2.4) - Auto Focus - Digital Zoom up to 100x - Résolution caméra frontale: 12.0 MP (f/2.2) - Auto Focus caméra frontale - Flash - Réseau 5G - Connectivité: Interface USB-C USB 3.2 Gen 1 - Technologie de localisation GPS - Wi-Fi - Bluetooth 5.3 - NFC - Système d\'exploitation: Android 14 - Capacité de la batterie: 5000 mAh - Haut-parleurs stéréo - Poids: 232g - Couleur Violet - Garantie 1 an', 3650.00, 8, 1, '2.jpg', '2026-03-22 11:47:05'),
(3, 'MacBook Air M3 8Go 256Go Gris Sidéral', 'Processeur :Apple M1 (CPU 8 coeurs / GPU 7 coeurs / Neural Engine 16 coeurs) / Mémoire : 8GB DDR4 / Disque dur : 256GB SSD / Écran Retina 13.3\" LED haute résolution de 2560 x 1600 pixels / Caméra FaceTime HD 720p / Wi-Fi / Bluetooth / Thunderbolt 3 / USB-C 3.1 Gen2 / DisplayPort / Capteur Touch ID / macOS Big Sur 11.0 / Garantie 1an', 4200.00, 5, 2, '3.jpg', '2026-03-22 11:47:05'),
(4, 'Dell XPS 13 / i7 7è Gén / 8 Go', 'Ecran 13.3\" Full HD - Processeur Intel Core i7-7500U 7è Génération, up to 3.5 GHz, 4 Mo de mémoire cache - Mémoire 8 Go - Disque Dur 256 Go SSD M.2 - Carte Graphique Intel HD Graphics 620 - WiFi - Bluetooth - USB 3.0 - Lecteur de carte SD - Windows 10, 64 bits - Couleur Silver - Garantie 1 an', 3800.00, 3, 2, '4.jpg', '2026-03-22 11:47:05'),
(5, 'Clavier MX Keys', 'Frappe fluide et silencieuse.', 350.00, 25, 3, '5.jpg', '2026-03-22 11:47:05'),
(6, 'Souris MX Master 3S\r\n', 'Souris LOGITECH MX MASTER 3S - Technologie de Connectivité: Sans Fil - Interface avec l\'ordinateur: USB - Résolution: 200 - 8000 dpi - Batterie rechargeable Li-Po (500 mAh ) - 7 boutons (clic gauche/droit, avant/arrière, changement d\'application, changement de mode de défilement, clic central) - Roulette de défilement - Molette pour le pouce - Portée de la connexion sans fil: 10 m - Couleur: Graphite - Garantie: 1 an', 320.00, 30, 3, '6.jpg', '2026-03-22 11:47:05'),
(7, 'Casque Sony XM5', 'Sony WH-1000XM5 Noise-Canceling Wireless Over-Ear Headphones Black, 30 Hours Playback Time, Hands-Free Calling, Alexa Voice Control - Kit With Charging Cube And Portable Charger', 1200.00, 15, 3, '7.jpg', '2026-03-22 11:47:05'),
(8, 'Google Pixel 8 6.2″ OLED FHD – Android 14 – 8 Go – 3G – 4G – 5G – Dual sim – Stockage 128 Go', 'Le meilleur de l intelligence Google.', 2800.00, 10, 1, '8.jpg', '2026-03-22 11:47:05'),
(9, 'Ecran LG 27 pouces', 'Dalle 4K pour graphistes.', 1500.00, 0, 2, '9.jpg', '2026-03-22 11:47:05'),
(10, 'DISQUE DUR EXTERNE TWINMOS HDD 1TO PRO DRIVE UlTRA USB 3.0', 'Capacité de Stockage : 1 To - Interface : USB 3.0 - Vitesse RPM (Tours par minute) : 5400, 7200 RPM - Type de Disque : HDD - Systèmes d\'exploitation compatibles : Windows , Linux , Mac OS , Android - Résistant aux chocs - Dimensions : 114 × 79 × 14,8 mm - Couleur : Noir - Garantie 3 ans', 450.00, 40, 3, '10.jpg', '2026-03-22 11:47:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorie` (`id_categorie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_cat`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
