-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2016 at 01:17 PM
-- Server version: 10.1.18-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id137467_directalert`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_user`
--

CREATE TABLE `event_user` (
  `id_event_user` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `libelle` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date_event` datetime NOT NULL,
  `date_modif` datetime DEFAULT NULL,
  `location` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_user_mail` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driving` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `walking` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bicycling` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transit` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_user`
--

INSERT INTO `event_user` (`id_event_user`, `libelle`, `date_event`, `date_modif`, `location`, `id_user_mail`, `driving`, `walking`, `bicycling`, `transit`) VALUES
('14iu2c60lto4cd2tfu2nsni2es', 'Test direct Alert', '2016-12-01 11:30:00', NULL, '38 Square des Hautes Chalais, 35200 Rennes, France', 'jimmyvillossel@gmail.com', ' 17 heures 57 minutes', 'En retard', 'En retard', ' 14 heures 46 minutes'),
('4kb2cmh7jpoj5sgshmj4gks7s0', 'Interro sur tout le cours réalité augmenté', '2016-12-01 09:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('60sm6cr274p34b9p6so64b9k60pmab9p6opjab9pcos34dho68s3ae1h6o', 'Réunion information soutenance I5', '2017-01-16 17:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('6dgj4c356komab9o6tj6ab9k6oqm8bb26cr62b9p6ks3ce3371gmcp1l74', 'Rendez vous de santé du travail', '2017-01-30 09:00:00', NULL, '2 Rue de Margnolles, 69300 Caluire-et-Cuire, France', 'jimmyvillossel@gmail.com', '60 jours 14 heures 26 minutes', '56 jours 23 heures 57 minutes', '59 jours 17 heures 18 minutes', 'Non disponible'),
('8uq8p5fhsg6munglunoh5bnkh8', 'Supprimer commande sur serveur VPS', '2017-01-27 09:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('fa8d2k4o74fcvef7k88e8jc7hc', 'Controle Gestion de projet', '2017-01-25 05:30:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('j281917eeo0ocvaf9hhonoi4js', 'Soutenance réalité augmentée', '2017-01-27 09:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('mod92n1c10fl6lo2nkrlijtsq8', 'test DIRECT ALERT', '2016-12-02 11:30:00', NULL, '48 Rue de Rivoli, 75004 Paris, France', 'jimmyvillossel@gmail.com', '1 jours 20 heures 16 minutes', '1 jours 20 heures 44 minutes', '1 jours 20 heures 6 minutes', '1 jours 20 heures 44 minutes'),
('ngn8125ajda5e1rppn8amf1mss', 'Concert Renaud', '2017-01-28 20:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('q0b7camnnjuki06vsno3s7s000_20170426', 'Anniversaire Coline', '2017-04-26 01:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('q0b7camnnjuki06vsno3s7s000_20180426', 'Anniversaire Coline', '2018-04-26 01:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('q0b7camnnjuki06vsno3s7s000_20190426', 'Anniversaire Coline', '2019-04-26 01:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('q0b7camnnjuki06vsno3s7s000_20200426', 'Anniversaire Coline', '2020-04-26 01:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('t83gdp4o10bngdvb7n3vlupc6k', 'Devoir compétence RH', '2016-12-07 07:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('ukmlmip7srfstuq5t10iod5v00', 'Contrôle continu Gestion de projet', '2017-01-19 06:30:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id_token` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date_creation` date NOT NULL,
  `id_user_mail` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id_token`, `date_creation`, `id_user_mail`) VALUES
('', '2016-11-30', 'jimmyvillossel@gmail.com'),
('cqm1CP3me-8:APA91bEebmwfJAxZ8xBv7ecnIe2SFCLFTR8Nfys6v5TUzo4WQzf_Y7JsM_y9cMD_jnNPNjCpmsaorjw3AvmaTs5NtL4U4Tm2NE24_LpQOH7k7TrUNangLmdMP6Y9JqmQOXrj9oG4h3uv', '2016-11-30', 'jimmyvillossel@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user_mail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `date_ajout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user_mail`, `date_ajout`) VALUES
('jimmyvillossel@gmail.com', '2016-11-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_user`
--
ALTER TABLE `event_user`
  ADD PRIMARY KEY (`id_event_user`),
  ADD UNIQUE KEY `id_event_user` (`id_event_user`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`),
  ADD UNIQUE KEY `id_token` (`id_token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user_mail`),
  ADD UNIQUE KEY `mail` (`id_user_mail`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
