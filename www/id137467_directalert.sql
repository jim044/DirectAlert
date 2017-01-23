-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2017 at 08:18 AM
-- Server version: 10.1.20-MariaDB
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
('3uiej4hij2l2dg41hhrubme4b0', 'Week end Marseille', '2017-03-25 06:00:00', NULL, '48 Rue Belle de Mai, Marseille, France', 'jimmyvillossel@gmail.com', '60 jours 13 heures 40 minutes', '54 jours 9 heures 30 minutes', '59 jours 1 heures 1 minutes', '60 jours 4 heures 55 minutes'),
('6dgj4c356komab9o6tj6ab9k6oqm8bb26cr62b9p6ks3ce3371gmcp1l74', 'Rendez vous de santé du travail', '2017-01-30 09:00:00', NULL, '2 Rue de Margnolles, 69300 Caluire-et-Cuire, France', 'jimmyvillossel@gmail.com', '6 jours 19 heures 38 minutes', '3 jours 5 heures 5 minutes', '5 jours 22 heures 32 minutes', 'Non disponible'),
('8uq8p5fhsg6munglunoh5bnkh8', 'Supprimer commande sur serveur VPS', '2017-01-27 09:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('cpi32o9k75gm6b9nckpj4b9k74sm6bb171ijgbb471gm6d9h6dh6acho70', 'Contrôle BPM', '2017-01-23 16:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('dggd4v12a28d298gb0b55qlhr4', 'Devoir Pilotage des projets', '2017-01-25 13:30:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('fa8d2k4o74fcvef7k88e8jc7hc', 'Controle Gestion de projet', '2017-01-25 05:30:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('falctu51g5ufl76ookqqt6mieo', 'CHU Vaccins', '2017-02-20 14:20:00', NULL, '33 Cours André Philip, 69100 Villeurbanne, France', 'jimmyvillossel@gmail.com', '28 jours 57 minutes', '24 jours 9 heures 54 minutes', '27 jours 3 heures 41 minutes', 'Non disponible'),
('ibo5krki40366ui5so7jn7e3rg', 'Rendez-vous Ophtalmo Léa', '2017-01-24 17:00:00', NULL, '18 Rue Jacqueline Auriol, 69008 Lyon', 'jimmyvillossel@gmail.com', '1 jours 3 heures 34 minutes', 'En retard', ' 6 heures 5 minutes', 'Non disponible'),
('j281917eeo0ocvaf9hhonoi4js', 'Soutenance réalité augmentée', '2017-01-27 09:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('ngn8125ajda5e1rppn8amf1mss', 'Concert Renaud', '2017-01-28 20:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('q0b7camnnjuki06vsno3s7s000_20170426', 'Anniversaire Coline', '2017-04-26 01:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('q0b7camnnjuki06vsno3s7s000_20180426', 'Anniversaire Coline', '2018-04-26 01:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('q0b7camnnjuki06vsno3s7s000_20190426', 'Anniversaire Coline', '2019-04-26 01:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('q0b7camnnjuki06vsno3s7s000_20200426', 'Anniversaire Coline', '2020-04-26 01:00:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible'),
('qcto6d87dhqet4o14b8bq8s6mc', 'Passeport', '2017-02-20 10:30:00', NULL, '', 'jimmyvillossel@gmail.com', 'Non disponible', 'Non disponible', 'Non disponible', 'Non disponible');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `mail_user` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `date_position` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `mail_user`, `token`, `latitude`, `longitude`, `date_position`) VALUES
(11, 'jimmyvillossel@gmail.com', 'c2tDSkBtZ90:APA91bH2c2c7dZK3P6Ui08hW-eAjn2u1ZbHV3UvrEbNuJ5cX8u1gc5Onk6FZ-VwO8iPffrRWm2eiHw0T7L64i1ToOqlJ0ELKOeBBGyHzQDT9vy6Dk-eTyb0DgITN7QR43TnwD3T2Jshz', 45.771142953194, 4.8043408326039, '2017-01-23 08:02:15');

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
('c2tDSkBtZ90:APA91bH2c2c7dZK3P6Ui08hW-eAjn2u1ZbHV3UvrEbNuJ5cX8u1gc5Onk6FZ-VwO8iPffrRWm2eiHw0T7L64i1ToOqlJ0ELKOeBBGyHzQDT9vy6Dk-eTyb0DgITN7QR43TnwD3T2Jshz', '2017-01-23', 'jimmyvillossel@gmail.com');

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
('jimmyvillossel@gmail.com', '2017-01-23');

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
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
