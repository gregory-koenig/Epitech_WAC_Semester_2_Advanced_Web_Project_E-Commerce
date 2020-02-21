-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 30, 2018 at 10:16 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `high-tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `user_id`, `address`, `zip_code`, `city`, `country`) VALUES
(1, 4, '9 rue du Test', '67000', 'TestVille', 'France'),
(2, 4, '9 Bis rue du Test', '69000', 'TestVille', 'France'),
(3, 7, 'ghsdfhgfh', 'dghdfghdfgh', 'gfdfghdfh', 'ghdfghdfgh'),
(4, 15, 'ghsdfhgfh', 'dghdfghdfgh', 'gfdfghdfh', 'ghdfghdfgh');

-- --------------------------------------------------------

--
-- Table structure for table `casing`
--

CREATE TABLE `casing` (
  `id` int(11) NOT NULL,
  `format` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `casing`
--

INSERT INTO `casing` (`id`, `format`, `color`, `material`) VALUES
(1, 'E-ATX / ATX / Micro ATX / Mini-ITX', 'Blanc', 'Acier'),
(2, 'E-ATX / ATX / Micro ATX / Mini-ITX', 'Noir', 'Acier'),
(3, 'E-ATX / ATX / Micro ATX / Mini-ITX', 'Noir', 'Acier'),
(4, 'E-ATX / ATX / Micro ATX / Mini-ITX', 'Noir', 'Acier'),
(5, 'Mini-ITX', 'Noir', 'Aluminium');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `background` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `background`) VALUES
(1, 'Casings', 0),
(2, 'Motherboards', 1),
(3, 'Cpu', 0),
(4, 'Gpu', 1),
(5, 'Ram', 0),
(6, 'Power Supply', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `last_name`, `first_name`, `phone`) VALUES
(4, 'Test', 'Johnny', '0611442255');

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `id` int(11) NOT NULL,
  `core_number` varchar(255) NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `cache` varchar(255) NOT NULL,
  `architecture` varchar(255) NOT NULL,
  `socket` varchar(255) NOT NULL,
  `thermal_dissipation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`id`, `core_number`, `frequency`, `cache`, `architecture`, `socket`, `thermal_dissipation`) VALUES
(21, '8 coeurs', '3,80 GHz', '20 Mo', 'Ryzen Threadripper', 'Socket TR4', '180 Watts'),
(22, '12 coeurs', '2,90 GHz', '28,5 Mo', 'Skylake-X', 'Socket 2066', '140 Watts'),
(23, '6 coeurs', '3 GHz', '9 Mo', 'Coffee Lake', 'Socket 1151', '65 Watts'),
(24, '4 coeurs', '4,20 GHz', '8 Mo', 'Kaby Lake', 'Socket 1151', '91 Watts'),
(25, '6 coeurs', '4 GHz', '12 Mo', 'Coffee Lake', 'Socket 1151', '95 Watts');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `user_id`, `address`, `zip_code`, `city`, `country`) VALUES
(1, 4, '9 rue du Test', '67000', 'TestVille', 'France'),
(2, 4, '9 Bis rue du Test', '69000', 'TestVille', 'France'),
(3, 7, 'sdrgrdg', 'sdfgsdfg', 'sdfgsdfg', 'sdfgsdfg'),
(4, 15, 'sdrgrdg', 'sdfgsdfg', 'sdfgsdfg', 'sdfgsdfg');

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(4, 'Testman', 'testman', 'test@test.com', 'test@test.com', 1, NULL, '$2y$13$Zh1sJDLgZN0pE/dT32AwEe49CywCJMtZs/ngLxth2QOBIegmN00YS', '2018-08-28 13:20:39', NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}');

-- --------------------------------------------------------

--
-- Table structure for table `gpu`
--

CREATE TABLE `gpu` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `interface` varchar(255) NOT NULL,
  `memory` varchar(255) NOT NULL,
  `memory_frequency` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `gpu`
--

INSERT INTO `gpu` (`id`, `model`, `frequency`, `interface`, `memory`, `memory_frequency`, `details`) VALUES
(31, 'GeForce GTX 1070 Ti', '1607 MHz', 'PCI-Express 16x', '8 Go', '8008 MHz', 'Gaming'),
(32, 'GeForce GTX 1080 Ti', '1531 MHz', 'PCI-Express 16x', '11 Go', '11 000 MHz', 'Gaming'),
(33, 'NVIDIA Titan X (Pascal)', '1417 MHz', 'PCI-Express 16x', '12 Go', 'GDDR5X', 'Graphisme'),
(34, 'Radeon RX 580', '1366 MHz', 'PCI-Express 16x', '8 Go', '8000 MHz', 'Cheap gaming'),
(35, 'GeForce GTX 1060', '1569 MHz', 'PCI-Express 16x', '6 Go', '8008 MHz', 'Really cheap gaming');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `motherboard`
--

CREATE TABLE `motherboard` (
  `id` int(11) NOT NULL,
  `socket` varchar(255) NOT NULL,
  `chipset` varchar(255) NOT NULL,
  `ports` varchar(255) NOT NULL,
  `max_frequency` varchar(255) NOT NULL,
  `sata_controller` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `motherboard`
--

INSERT INTO `motherboard` (`id`, `socket`, `chipset`, `ports`, `max_frequency`, `sata_controller`) VALUES
(11, 'Socket 1151', 'Intel Z270', '3 ports PCI-Express 16x', '3733 MHz (DDR4) ', 'SATA Revision 3.0 (6 Gb/s)'),
(12, 'Socket 1151', 'Intel Z270', '3 ports PCI-Express 16x', '3866 MHz (DDR4)', 'SATA Revision 3.0 (6 Gb/s)'),
(13, 'Socket 1151', 'Intel Z370', '3 ports PCI-Express 16x', '4000 MHz (DDR4)', 'ATA Revision 3.0 (6 Gb/s)'),
(14, 'Socket TR4', 'AMD X399', '4 ports PCI-Express 16x', '3600 MHz (DDR4)', 'SATA Revision 3.0 (6 Gb/s)'),
(15, 'Socket 2066', 'Intel X299', '3 ports PCI-Express 16x', '4000 MHz (DDR4)', 'SATA Revision 3.0 (6 Gb/s)');

-- --------------------------------------------------------

--
-- Table structure for table `power_supply`
--

CREATE TABLE `power_supply` (
  `id` int(11) NOT NULL,
  `power` varchar(255) NOT NULL,
  `modularity` varchar(255) NOT NULL,
  `certification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `power_supply`
--

INSERT INTO `power_supply` (`id`, `power`, `modularity`, `certification`) VALUES
(51, '550W', 'Full modulaire', '80 PLUS Platinum'),
(52, '850W', 'Full modulaire', '80 PLUS Platinum'),
(53, '1000W', 'Full modulaire', '80 PLUS Platinum'),
(54, '1000W', 'Full modulaire', '80 PLUS Or'),
(55, '1700W', 'Full modulaire', '80 PLUS Platinum');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(6) NOT NULL,
  `category_id` int(6) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `dimensions` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `brand`, `price`, `stock`, `weight`, `dimensions`, `discount`) VALUES
(1, 1, 'NZXT H700i - Blanc', 'Le boîtier PC NZXT H700i incarne le nec-plus-ultra du savoir-faire de la marque : au format moyen tour, il embarque non seulement tout le nécessaire pour un montage facile.', 'case_h700i.jpg', '389.80', '10', '12kg', '494*230*516mm', '10%'),
(2, 1, 'Cooler Master MasterCase MC500M', 'Le boitier PC CoolerMaster MasterCase MC500M vous offre une maîtrise complète de l\'intérieur et la modularité de votre châssis tout en proposant une esthétique moderne.', 'case_MC500M.jpg', '169.90', '10', '10kg', '528.6*235*548mm', '10%'),
(3, 1, 'Cooler Master MasterCase MC600P', 'Le boitier PC CoolerMaster MasterCase MC600P vous offre une maîtrise complète de l\'intérieur et la modularité de votre châssis tout en proposant une esthétique moderne.', 'case_MC600P.jpg', '159.90', '10', '12kg', '544*235*548mm', '10%'),
(4, 1, 'Corsair Carbide Clear 600C', 'Le Corsair Carbide Serie Clear 600C est conçu pour conférer à votre PC une performance maximale, même dans les situations extrêmes. Il est pourvu d\'une imposante et sublime fenêtre transparente au style unique', 'case_600C.png', '149.90', '10', '10kg', '260*454*535mm', '10%'),
(5, 1, 'Phanteks Enthoo Evolv Shift Noir', 'Le Phanteks Enthoo Evolv Shift est un boîtier compact, tout en hauteur, et innovant confectionné pour extraire la meilleure performance d\'un PC au format mini ITX !', 'case_ENTHOO_EVOLVE.jpg', '109.90', '10', '6kg', '170*274*470mm', '10%'),
(11, 2, 'Asus PRIME Z270-A', 'La carte mère PRIME Z270-A est équipée de 6 ports SATA revision 3.0, de 2 ports USB 3.1 Gen2 (1 type C + 1 type A) et 4 ports USB 3.1 Gen1.', 'mobo_Z270-A.jpg', '143.90', '7', '300g', '305*244mm', '10%'),
(12, 2, 'Asus ROG - STRIX Z270H GAMING', 'La carte mère STRIX Z270H GAMING est équipée de 6 ports SATA revision 3.0, de 2 ports USB 3.1 Gen2 et 4 ports USB 3.1 Gen1.', 'mobo_Z270H.jpg', '159.90', '9', '300g', '300*234mm', '0%'),
(13, 2, 'Asus PRIME Z370-A', 'La carte mère PRIME Z370-A est équipée de 6 ports SATA revision 3.0, de 2 ports USB 3.1 Gen2 (1 type C + 1 type A) et 2 ports USB 3.1 Gen1.', 'mobo_Z370-A.jpg', '179.90', '12', '300g', '100x100cm', '0%'),
(14, 2, 'Asus Prime X299-A', 'Au Format ATX, la carte mère Asus PRIME X299-A destinée aux nouveaux processeurs INTEL X Series de 6ème (Skylake) et 7ème génération (Kaby Lake) est équipée de 8 ports SATA revision 3.0 et 3 PCIE 16x.', 'mobo_X299-A.jpg', '299.90', '0', '300g', '305*244mm', '15%'),
(15, 2, 'Asus PRIME X399-A', 'A même d\'exploiter au mieux votre processeur haut de gamme AMD Ryzen Threadripper basé sur l\'architecture de dernière génération Zen, la carte mère Asus Prime X399-A qui repose sur le dernier socket TR4 vous permettra d\'obtenir des performances en jeu.', 'mobo_X399-A.jpg', '179.90', '4', '300g', '305*269mm', '0%'),
(21, 3, 'AMD Ryzen Threadripper 1900X (3,8 GHz)', 'Les processeurs AMD Ryzen Threadripper débarquent et viennent représenter le haut de gamme avec 3 processeurs Threadripper dédiés aux performances gaming.', 'cpu_ryzen-1900X.jpg', '417.90', '14', '17g', 'unspecified', '10%'),
(22, 3, 'Intel Core i9 7920X', 'Avec la génération de processeurs Skylake X, Intel met à votre disposition une architecture ultra-moderne et puissante, de quoi se régaler avec des possibilités d\'overclocking.', 'cpu_i9-7920X.jpg', '1139.90', '17', '22g', 'unspecified', '10%'),
(23, 3, 'Intel Core i5 8500', 'Avec la 8ème génération de processeurs (Coffee Lake) et le Core i5 8500, Intel met à votre disposition une architecture ultra-moderne et encore plus puissante. ', 'cpu_i5-8500.jpg', '199.90', '6', '16g', 'unspecified', '10%'),
(24, 3, 'Core i7 7700K (4,2 GHz)', 'Avec la 7ème génération de processeurs, Intel met à votre disposition une architecture ultra-moderne et puissante.', 'cpu_i7-7700K.jpg', '329.90', '2', '19', 'unspecified', '10%'),
(25, 3, 'Intel Core i7 8086K (Edition limitée) 4 GHz', 'Avec la 8ème génération de processeurs (Coffee Lake), Intel frappe un grand coup pour son 50ème anniversaire et les 40 ans de l\'architecture x86 : voici le Core i7-8086K Edition limitée ! ', 'cpu_i7-8086K.jpg', '439.90', '6', '20g', 'unspecified', '10%'),
(31, 4, 'Asus GeForce GTX 1070 Ti STRIX A8G - 8 Go', 'GTX 1070 Ti : voici la dernière carte graphique proposée par NVIDIA et ASUS. Positionnée entre la GTX 1070 et la 1080, la GTX 1070 Ti exploitera la puissance de ses 2432 coeurs CUDA à merveille.', 'gpu_asus-1070ti.jpg', '589.90', '17', '1.1kg', '298*134*53*mm', '0%'),
(32, 4, 'PNY GeForce GTX 1080 Ti XLR8 OC Gaming - 11 Go', 'La marque gaming PNY nous propose sa nouvelle carte graphique haut de gamme NVIDIA : voici la GeForce GTX 1080 Ti XLR8 OC Gaming KF108IGTXXG11EPB !', 'gpu_pny-1080ti.jpg', '789.90', '4', '1.2kg', '314*126*42mm', '0%'),
(33, 4, 'NVIDIA Titan X - 12 Go (Pascal 2016)', 'NVIDIA nous présente son nouveau monstre de puissance, la carte graphique ultime : NVIDIA Titan X.', 'gpu_nvidia-titanx.jpg', '999.90', '1', '1.4kg', '254 x 102 mm', '0%'),
(34, 4, 'Sapphire Radeon RX 580 Pulse OC - 8 Go', 'Voici les nouvelles cartes graphiques AMD Radeon RX 580 (11265-05) ! Sapphire nous présente ici sa nouvelle Radeon RX 580 Pulse OC 8 Go !', 'gpu_sapphire-rx580.jpg', '309.90', '7', '900g', '230 x 125 x 40 mm', '10%'),
(35, 4, 'Asus GTX 1060 Expedition (EX-GTX1060-O6G)', 'Le constructeur Asus vous propose sa carte graphique gamer de nouvelle génération, la EX-GTX1060-O6G. Armée des dernières technologies NVIDIA et de puissantes caractéristiques techniques, la Nvidia GeForce GTX 1060 vient se positionner en milieu de gamme.', 'gpu_asus-1060.jpg', '364.90', '12', '1kg', '250 x 131 x 38 mm', '0%'),
(41, 5, 'DDR4 Corsair Vengeance LPX Black DDR4 4 x 4 Go 3200 MHz CAS 16', 'Corsair ne s\'est pas fait attendre avant de sortir ses premiers kits de mémoire DDR4 !', 'ram_vengeance-lpx-black.jpg', '209.90', '16', '120g', '33,5mm', '0%'),
(42, 5, 'DDR4 Corsair Vengeance RGB PRO DDR4 2 x 8 Go 3200 MHz CAS 16', 'La mémoire PC Corsair Vengeance RGB Pro Series propose une solution haut de gamme pour les PC de nouvelle génération à l\'ADN gaming et overclocling.', 'ram_vengeance-rgb-pro.jpg', '244.90', '17', '110g', '29mm', '0%'),
(43, 5, 'DDR4 G.Skill Ripjaws V Black DDR4 2 x 4 Go 3200 MHz CAS 16', 'G.Skill s’est taillé une réputation qui n’a rien à envier à celle de Corsair ou Crucial. Également garanties à vie, les modules de mémoire G.Skill DDR4 Ripjaws V offrent des performances de haute volée - en vitesse et en consommation.', 'ram_ripjaws-v-black.jpg', '117.90', '4', '105g', '29mm', '0%'),
(44, 5, 'DDR4 HyperX Predator DDR4 2 x 4 Go 3200 MHz CAS 16', 'Dominez la concurrence grâce la nouvelle mémoire haut de gamme Kingston HyperX Predator DDR4. Avec une latence CAS basse et les timings les plus agressifs sur des modules à haute vitesse, une nouvelle génération est arrivée.', 'ram_predator.jpg', '128.90', '19', '90g', '42,20mm', '0%'),
(45, 5, 'DDR4 G.Skill Sniper X Urban Camo DDR4 2 X 16 Go 3200 MHz CAS 16', 'G.Skill s’est taillé une réputation qui n’a rien à envier à celle de Corsair, Kingston, Jason ou Crucial. Marque renommée dans l\'univers du gaming, G.SKILL a développé des modules DDR4 Sniper X d\'une fiabilité incroyable.', 'ram_sniper-x-urban-camo.jpg', '404.90', '0', '130g', '43 mm', '0%'),
(51, 6, 'Seasonic FOCUS Plus 550 Platinum', 'Les alimentations FOCUS Plus Platinum sont disponibles de 550W à 850W. Maître mot chez Seasonic, l\'excellence du bloc FOCUS est à la hauteur de la réputation du constructeur !', 'psu_focus-plus.jpg', '114.90', '10', '1.5kg', '140 x 150 x 86 mm', '20%'),
(52, 6, 'Corsair HX850i - 850W', 'Corsair fait évoluer sa gamme d\'alimentations références vers la certification 80+ Platinum (la plus élevée du marché). Les blocs Corsair HX développent un rendement encore meilleur, dans une qualité de fabrication et une modularité maximale.', 'psu_hx850i.jpg', '189.90', '7', '1.7kg', '150*180*86mm', '30%'),
(53, 6, 'Corsair HX1000i - 1000W', 'Une performance éco-énergétique haut de gamme dédiée aux configurations avancées. Le plus de cette alimentation réside dans le réel contrôle des rails 12V et de son refroidissement.', 'psu_hx1000i.jpg', '199.90', '4', '1.3kg', '150*180*86mm', '10%'),
(54, 6, 'Seasonic PRIME Ultra 1000 Gold', 'Avec son alimentation Prime Ultra Gold 1000, Seasonic nous propose une alimentation haut de gamme 100% modulaire, 1000W et bénéficiant d\'une certification 80+ Or !', 'psu_prime-ultra.jpg', '214.90', '11', '1.5kg', '150*170*86mm', '0%'),
(55, 6, 'Enermax Platimax 1700W', 'Avec la Platimax Modulaire 1700XW vous bénéficiez d\'une certification \"80+ Platinum\" qui est la référence pour toute alimentation en terme d\'efficacité énergétique.', 'psu_platimax.jpg', '299.90', '13', '1.8kg', '150 x 180 x 86 mm', '0%');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product`
--

CREATE TABLE `purchase_product` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `products_number` int(255) NOT NULL,
  `total_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `timings` varchar(255) NOT NULL,
  `tension` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`id`, `type`, `capacity`, `frequency`, `timings`, `tension`) VALUES
(41, 'DDR4', '16 Go', '3200 MHz - PC25600', '16-18-18-36', '1,35 Volts'),
(42, 'DDR4', '16 Go', '3200 MHz - PC25600', '16-18-18-36\r\n', '1,35 Volts'),
(43, 'DDR4', '8 Go', '3200 MHz - PC25600', '16-16-16-36', '1,35 Volts'),
(44, 'DDR4', '8 Go', '3200 MHz - PC25600', '16-18-18', '1,35 Volts'),
(45, 'DDR4', '32 Go', '3200 MHz - PC25600', '16-18-18-38', '1,35 Volts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casing`
--
ALTER TABLE `casing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Indexes for table `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `power_supply`
--
ALTER TABLE `power_supply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `casing`
--
ALTER TABLE `casing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gpu`
--
ALTER TABLE `gpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `motherboard`
--
ALTER TABLE `motherboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `power_supply`
--
ALTER TABLE `power_supply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_product`
--
ALTER TABLE `purchase_product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
