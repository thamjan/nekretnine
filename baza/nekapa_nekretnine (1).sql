-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2013 at 04:06 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nekapa_nekretnine`
--
CREATE DATABASE IF NOT EXISTS `nekapa_nekretnine` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `nekapa_nekretnine`;

-- --------------------------------------------------------

--
-- Table structure for table `atributi`
--

CREATE TABLE IF NOT EXISTS `atributi` (
  `id_atributa` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_atributa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tip` int(11) NOT NULL,
  PRIMARY KEY (`id_atributa`),
  KEY `tip` (`tip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `atributi`
--

INSERT INTO `atributi` (`id_atributa`, `naziv_atributa`, `tip`) VALUES
(11, 'Struktura', 2),
(12, 'Grejanje', 2),
(13, 'Tip objekta', 2),
(14, 'Stanje objekta', 2),
(15, 'Pravni status', 2),
(16, 'Sprat', 2),
(17, 'Lift', 1),
(18, 'Klima', 1),
(19, 'Katv', 1),
(20, 'Podrum', 1),
(21, 'Topla voda', 1),
(22, 'Telefon', 1),
(23, 'Interfon', 1),
(24, 'Garaza', 1),
(25, 'Parking mesto', 1),
(26, 'Terasa', 1),
(27, 'Lođa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gradovi`
--

CREATE TABLE IF NOT EXISTS `gradovi` (
  `id_grad` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_grad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gradovi`
--

INSERT INTO `gradovi` (`id_grad`, `naziv`) VALUES
(1, 'Beograd'),
(2, 'Smederevo');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE IF NOT EXISTS `kategorije` (
  `id_kategorije` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_kategorije` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kategorije`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id_kategorije`, `naziv_kategorije`) VALUES
(1, 'Stan'),
(2, 'Kuća'),
(4, 'Lokal'),
(5, 'Zemljište');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije_atributi`
--

CREATE TABLE IF NOT EXISTS `kategorije_atributi` (
  `id_ka` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategorije` int(11) NOT NULL,
  `id_atributa` int(11) NOT NULL,
  `sorting_index` int(11) NOT NULL,
  PRIMARY KEY (`id_ka`),
  UNIQUE KEY `kombo` (`id_kategorije`,`id_atributa`),
  KEY `id_atributa` (`id_atributa`),
  KEY `id_kategorije` (`id_kategorije`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=224 ;

--
-- Dumping data for table `kategorije_atributi`
--

INSERT INTO `kategorije_atributi` (`id_ka`, `id_kategorije`, `id_atributa`, `sorting_index`) VALUES
(186, 1, 11, 0),
(187, 1, 12, 1),
(188, 1, 13, 2),
(189, 1, 14, 3),
(190, 1, 15, 4),
(191, 1, 16, 5),
(192, 1, 17, 6),
(193, 1, 18, 7),
(194, 1, 19, 8),
(195, 1, 20, 9),
(196, 1, 21, 10),
(197, 1, 22, 11),
(198, 1, 23, 12),
(199, 1, 24, 13),
(200, 1, 25, 14),
(201, 1, 26, 15),
(202, 1, 27, 16),
(203, 4, 11, 0),
(204, 4, 21, 1),
(205, 4, 13, 2),
(206, 2, 14, 0),
(208, 2, 11, 6),
(210, 2, 18, 1),
(211, 2, 13, 3),
(216, 2, 16, 4),
(220, 2, 22, 2),
(223, 2, 17, 5);

-- --------------------------------------------------------

--
-- Table structure for table `mz`
--

CREATE TABLE IF NOT EXISTS `mz` (
  `id_mz` int(11) NOT NULL AUTO_INCREMENT,
  `id_opstine` int(11) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_mz`),
  KEY `id_opstine` (`id_opstine`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=278 ;

--
-- Dumping data for table `mz`
--

INSERT INTO `mz` (`id_mz`, `id_opstine`, `naziv`) VALUES
(1, 1, 'KALEMEGDAN'),
(2, 1, 'KNEZ MIHAILOVA'),
(3, 1, 'SABORNA CRKVA'),
(4, 1, 'KOSANCICEV VENAC'),
(5, 1, 'TOPLICIN VENAC'),
(6, 1, 'OBILICEV VENAC'),
(7, 1, 'STUDENTSKI TRG'),
(8, 1, 'TRG REPUBLIKE'),
(9, 1, 'GORNJI DORCOL'),
(10, 1, 'DONJI DORCOL'),
(11, 1, 'DUNAVSKI KEJ'),
(12, 1, 'GUNDULICEV VENAC'),
(13, 1, 'TERAZIJE'),
(14, 1, 'LONDON'),
(15, 1, 'ANDRICEV VENAC'),
(16, 1, 'SKUPSTINA'),
(17, 1, 'KOPITAREVA GRADINA'),
(35, 2, 'CVETNI TRG'),
(36, 2, 'SLAVIJA'),
(37, 2, 'BULEVAR KRALJA ALEKSANDRA'),
(38, 2, 'KRUNSKA'),
(39, 2, 'PRAVNI FAKULTET'),
(40, 2, 'KALENIC PIJACA'),
(41, 2, 'HRAM SVETOG SAVE'),
(42, 2, 'NEIMAR'),
(43, 2, 'JUZNI BULEVAR'),
(44, 2, 'KARADJORDJEV PARK'),
(45, 2, 'CRVENI KRST'),
(46, 2, 'SC VRACAR'),
(47, 3, 'CUKARICKA PADINA'),
(48, 3, 'BANOVO BRDO'),
(49, 3, 'GOLF'),
(50, 3, 'KOSUTNJAK'),
(51, 3, 'ZARKOVO'),
(52, 3, 'JULINO BRDO'),
(53, 3, 'FILMSKI GRAD'),
(54, 3, 'CERAK'),
(55, 3, 'CERAK VINOGRADI'),
(56, 3, 'BELE VODE'),
(57, 3, 'SREMCICA'),
(58, 3, 'ZELEZNIK'),
(60, 4, 'KANAREVO BRDO'),
(61, 4, 'STARI KOSUTNJAK'),
(62, 4, 'MILJAKOVAC'),
(63, 4, 'SKOJEVSKO NASELJE'),
(64, 4, 'NOVO SKOJEVSKO NASELJE'),
(65, 4, 'VIDIKOVAC'),
(66, 4, 'VIDIKOVACKA PADINA'),
(67, 4, 'LABUDOVO BRDO'),
(68, 4, 'PETLOVO BRDO'),
(69, 4, 'KIJEVO'),
(70, 4, 'KNEZEVAC'),
(71, 4, 'RESNIK'),
(72, 5, 'VUKOV SPOMENIK'),
(73, 5, 'DEPO'),
(74, 5, 'DJERAM PIJACA'),
(75, 5, 'LION'),
(76, 5, 'LIPOV LAD'),
(77, 5, 'GRADSKA BOLNICA'),
(78, 5, 'CVETKOVA PIJACA'),
(79, 5, 'OLIMP'),
(80, 5, 'UCITELJSKO NASELJE'),
(81, 5, 'DENKOVA BASTA'),
(82, 5, 'MIRIJEVO'),
(83, 5, 'RUDO'),
(84, 5, 'ZVEZDARSKA SUMA'),
(85, 5, 'KLUZ'),
(86, 5, 'SLAVUJEV VENAC'),
(87, 5, 'SVERNI BULEVAR'),
(88, 5, 'DIMITRIJA TUCOVICA'),
(89, 5, 'CVETANOVA CUPRIJA'),
(90, 5, 'MALI MOKRI LUG'),
(91, 5, 'VELIKI MOKRI LUG'),
(92, 6, 'CENTAR'),
(93, 6, 'PALATA PRAVDE'),
(94, 6, 'EKONOMSKI FAKULTET'),
(95, 6, 'KLINICKI CENTAR'),
(96, 6, 'MOSTARSKA PETLJA'),
(97, 6, 'SAVSKI TRG'),
(98, 6, 'PROKOP'),
(99, 6, 'SAJAM'),
(100, 6, 'STADION CRVENE ZVEZDE'),
(101, 6, 'DEDINJE'),
(102, 6, 'SENJAK'),
(103, 6, 'TOPCIDERSKO BRDO'),
(104, 6, 'LISICJI POTOK'),
(105, 6, 'DVOR'),
(106, 7, 'AUTOKOMANDA'),
(107, 7, 'DUSANOVAC'),
(108, 7, 'LEKINO BRDO'),
(109, 7, 'KONJARNIK'),
(110, 7, 'SUMICE'),
(111, 7, 'BANJICA'),
(112, 7, 'BRACE JERKOVIC'),
(113, 7, 'MEDAKOVIC'),
(114, 7, 'MEDAKOVIC PADINA'),
(115, 7, 'KUMODRASKA'),
(116, 7, 'VOZDOVACKA CRKVA'),
(117, 7, 'TROSARINA'),
(118, 7, 'SAOBRACAJNI FAKULTET'),
(119, 7, 'HOTEL M'),
(120, 7, 'FON'),
(121, 7, 'BIOSKOP VOZDOVAC'),
(122, 7, 'ZAPLANJSKA'),
(123, 7, 'KUMODRAZ'),
(124, 7, 'FARMACEUTSKI FAKULTET'),
(125, 7, 'MARINKOVA BARA'),
(126, 7, 'JAJINCI'),
(127, 7, 'ZUCE'),
(128, 7, 'PINOSAVA'),
(129, 7, 'BELI POTOK'),
(130, 7, 'RIPANJ'),
(131, 8, 'CENTAR'),
(132, 8, 'PROFESORSKA KOLONIJA'),
(133, 8, 'TASMAJDAN'),
(134, 8, 'POSTANSKA STEDIONICA'),
(135, 8, 'PALILUSKA PIJACA'),
(136, 8, '27.MARTA'),
(137, 8, 'CVIJICEVA'),
(138, 8, 'BULEVAR DESPOTA STEFANA'),
(139, 8, 'BOTANICKA BASTA'),
(140, 8, 'BOGOSLOVIJA'),
(141, 8, 'KARABURMA'),
(142, 8, 'VISNJICKA BANJA'),
(143, 8, 'VISNJICA'),
(144, 8, 'CALIJE'),
(145, 8, 'ROSPI CUPRIJA'),
(146, 8, 'SLANCI'),
(147, 8, 'KRNJACA'),
(148, 8, 'KOTEZ'),
(149, 8, 'OVCA'),
(150, 8, 'BORCA'),
(151, 8, 'BORCA GREDA'),
(152, 8, 'KOVILOVO'),
(153, 8, 'PADINSKA SKELA'),
(154, 8, 'VILINE VODE'),
(155, 8, 'VELIKO SELO'),
(156, 9, 'ALTINA'),
(157, 9, 'CUKOVAC'),
(158, 9, 'DONJI GRAD'),
(159, 9, 'GALENIKA'),
(160, 9, 'GARDOS'),
(161, 9, 'GORNJI GRAD'),
(162, 9, 'CENTAR'),
(163, 9, 'KALVARIJA'),
(164, 9, 'KEJ'),
(165, 9, 'KOLONIJA ZMAJ'),
(166, 9, 'MALA PRUGA'),
(167, 9, 'MARIJA BURSAC'),
(168, 9, 'MEANDRI'),
(169, 9, 'MUHAR'),
(170, 9, 'NOVA GALENIKA'),
(171, 9, 'NOVI GRAD'),
(172, 9, 'PLAVI HORIZONTI'),
(173, 9, 'RETENZIJA'),
(174, 9, 'SAVE KOVACEVIC'),
(175, 9, 'SUTJESKA'),
(176, 9, 'VOJNI PUT 1'),
(177, 9, 'VOJNI PUT 2'),
(178, 9, 'PREGREVICA'),
(179, 9, 'ZELEZNICKA'),
(180, 9, 'KOLONIJA'),
(181, 9, 'PRVOMAJSKA'),
(182, 9, 'ZEMUN POLJE'),
(183, 9, 'CARA DUSANA'),
(184, 9, 'UGRINOVACKA'),
(185, 9, 'BATAJNICA'),
(186, 9, 'DOBANOVCI'),
(187, 9, 'UGRINOVCI'),
(188, 10, 'FONTANA'),
(189, 10, 'OPSTINA'),
(190, 10, 'YUBC'),
(191, 10, 'STARO SAJMISTE'),
(192, 10, 'SAVA CENTAR'),
(193, 10, 'BLOK 19A'),
(194, 10, 'BLOK 2'),
(195, 10, 'BLOK 21'),
(196, 10, 'BLOK 22'),
(197, 10, 'BLOK 23'),
(198, 10, 'BLOK 24'),
(199, 10, 'ARENA'),
(200, 10, 'BLOK 28'),
(201, 10, 'BLOK 29'),
(202, 10, 'BLOK 29A'),
(203, 10, 'BLOK 3'),
(204, 10, 'BLOK 30'),
(205, 10, 'BLOK 32'),
(206, 10, 'BLOK 33'),
(207, 10, 'BLOK 34'),
(208, 10, 'BLOK 37'),
(209, 10, 'BLOK 37A'),
(210, 10, 'STUDENTSKI GRAD'),
(211, 10, 'BLOK 38'),
(212, 10, 'BLOK 4'),
(213, 10, 'BLOK 41'),
(214, 10, 'BLOK 41A GTC'),
(215, 10, 'BLOK 44'),
(216, 10, 'BLOK 45'),
(217, 10, 'BLOK 5'),
(218, 10, 'BLOK 60'),
(219, 10, 'BLOK 61'),
(220, 10, 'BLOK 62'),
(221, 10, 'BLOK 63'),
(222, 10, 'BLOK 64'),
(223, 10, 'BLOK 65'),
(224, 10, 'BLOK 67 BELVIL'),
(225, 10, 'BLOK 68'),
(226, 10, 'BLOK 70'),
(227, 10, 'BLOK 70A'),
(228, 10, 'BLOK 71'),
(229, 10, 'BLOK 72'),
(230, 10, 'BLOK 9'),
(231, 10, 'BLOK 9A'),
(232, 10, 'DR IVANA RIBARA'),
(233, 10, 'BEZANIJSKA KOSA I MZ'),
(234, 10, 'BEZANIJSKA KOSA II MZ'),
(235, 10, 'BEZANIJSKA KOSA III MZ'),
(236, 10, 'STARA BEZANIJA'),
(237, 10, 'HAJAT'),
(238, 10, 'LEDINE'),
(239, 10, 'PAVILJONI'),
(240, 10, 'STARI MERKATOR'),
(241, 10, 'TOSIN BUNAR'),
(242, 10, 'HOTEL YU'),
(243, 10, 'BLOK 35'),
(244, 10, 'BLOK 43'),
(245, 10, 'BLOK 53'),
(246, 10, 'BLOK 39'),
(247, 11, 'SURČIN'),
(248, 11, 'BEČMEN'),
(249, 11, 'BOLJEVCI'),
(250, 11, 'DOBANOVCI'),
(251, 11, 'JAKOVO'),
(252, 11, 'KLJUČ'),
(253, 11, 'PETROVČIĆ'),
(254, 11, 'PROGAR'),
(255, 11, 'RADIOFAR'),
(256, 11, 'STREMEN'),
(257, 12, 'MLADENOVAC'),
(258, 12, 'AMERIĆ'),
(259, 12, 'BELUĆE'),
(260, 12, 'CRKVINE'),
(261, 12, 'DUBONA'),
(262, 12, 'GRANICE'),
(263, 12, 'JAGNJILO'),
(264, 12, 'KORAĆICA'),
(265, 12, 'KOVAČEVAC'),
(266, 12, 'MALA VRBICA'),
(267, 12, 'MARKOVAC'),
(268, 12, 'MEĐULUŽJE'),
(269, 12, 'PRUŽATOVAC'),
(270, 12, 'RABROVAC'),
(271, 12, 'RAJKOVAC'),
(272, 12, 'SELTERS BANJA'),
(273, 12, 'SENAJA'),
(274, 12, 'ŠEPŠIN'),
(275, 12, 'VELIKA IVANČA'),
(276, 12, 'VELIKA KRSNA'),
(277, 12, 'VLAŠKA');

-- --------------------------------------------------------

--
-- Table structure for table `oglas`
--

CREATE TABLE IF NOT EXISTS `oglas` (
  `id_oglas` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `naziv` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `media` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `id_zemlja` int(11) NOT NULL,
  `id_grad` int(11) NOT NULL,
  `id_opstina` int(11) NOT NULL,
  `adresa` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_mz` int(11) NOT NULL,
  `latlon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kategorija` int(11) NOT NULL,
  `br_pregleda` int(11) NOT NULL,
  `datum_objave` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `cena` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kvadratura` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `agent` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `f_prodaja` int(11) NOT NULL COMMENT 'prodaja/iznamljivanje',
  PRIMARY KEY (`id_oglas`),
  KEY `id_user` (`id_user`,`id_zemlja`,`id_grad`,`id_opstina`,`id_mz`),
  KEY `kategorija` (`kategorija`),
  KEY `id_grad` (`id_grad`),
  KEY `id_mz` (`id_mz`),
  KEY `id_opstina` (`id_opstina`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `oglas`
--

INSERT INTO `oglas` (`id_oglas`, `id_user`, `naziv`, `opis`, `media`, `id_zemlja`, `id_grad`, `id_opstina`, `adresa`, `id_mz`, `latlon`, `kategorija`, `br_pregleda`, `datum_objave`, `status`, `cena`, `kvadratura`, `agent`, `f_prodaja`) VALUES
(4, 2, '12313', '', '', 0, 1, 1, NULL, 1, '', 1, 0, '0000-00-00 00:00:00', 0, '', '', '', 0),
(6, 2, 'oglas', 'mnogo lud oglas', '', 1, 1, 5, '', 79, '44.82079912445855,20.465097528064007', 1, 0, '2013-12-08 15:10:24', 1, '124', '12435', '', 2),
(11, 2, '', '', '', 1, 1, 7, '', 109, '0,0', 2, 0, '2013-12-08 15:47:19', 1, '', '', '', 2),
(12, 2, '', '', '', 1, 1, 7, '', 109, '0,0', 2, 0, '2013-12-08 15:47:21', 1, '', '', '', 2),
(13, 2, '', '', '', 1, 1, 3, '', 50, '44.82177321200684,20.464367967211956', 2, 0, '2013-12-08 15:50:47', 1, '', '', '', 2),
(14, 2, '', '', '', 1, 1, 5, '', 74, '0,0', 1, 0, '2013-12-08 15:54:34', 1, '', '', '', 1),
(15, 2, '', '', '', 1, 1, 5, '', 74, '0,0', 1, 0, '2013-12-08 15:55:20', 1, '', '', '', 1),
(16, 2, '', '', '', 1, 1, 5, '', 74, '0,0', 1, 0, '2013-12-08 15:55:23', 1, '', '', '', 1),
(25, 2, '', '', '', 1, 1, 3, '', 48, '0,0', 2, 0, '2013-12-08 16:03:33', 1, '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oglas_atributi`
--

CREATE TABLE IF NOT EXISTS `oglas_atributi` (
  `id_oa` int(11) NOT NULL AUTO_INCREMENT,
  `id_oglas` int(11) NOT NULL,
  `id_atribut` int(11) NOT NULL,
  `vrednost` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_oa`),
  KEY `id_oglas` (`id_oglas`,`id_atribut`),
  KEY `id_atribut` (`id_atribut`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `oglas_atributi`
--

INSERT INTO `oglas_atributi` (`id_oa`, `id_oglas`, `id_atribut`, `vrednost`) VALUES
(1, 25, 11, '12'),
(2, 25, 17, '0');

-- --------------------------------------------------------

--
-- Table structure for table `opstine`
--

CREATE TABLE IF NOT EXISTS `opstine` (
  `id_opstina` int(11) NOT NULL AUTO_INCREMENT,
  `id_grad` int(11) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_opstina`),
  KEY `id_grad` (`id_grad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `opstine`
--

INSERT INTO `opstine` (`id_opstina`, `id_grad`, `naziv`) VALUES
(1, 1, 'STARI GRAD'),
(2, 1, 'VRACAR'),
(3, 1, 'CUKARICA'),
(4, 1, 'RAKOVICA'),
(5, 1, 'ZVEZDARA'),
(6, 1, 'SAVSKI VENAC'),
(7, 1, 'VOZDOVAC'),
(8, 1, 'PALILULA'),
(9, 1, 'ZEMUN'),
(10, 1, 'NOVI BEOGRAD'),
(11, 1, 'SURČIN'),
(12, 1, 'MLADENOVAC'),
(13, 1, 'LAZAREVAC'),
(14, 1, 'SOPOT'),
(15, 1, 'BARAJEVO'),
(16, 1, 'OBRENOVAC'),
(17, 1, 'GROCKA'),
(18, 2, 'Lestar'),
(19, 2, 'Carina');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `naslov` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `datum_objave` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `tip` int(11) NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `id_user`, `naslov`, `text`, `datum_objave`, `status`, `tip`) VALUES
(1, 2, 'Test vest', '<p>Ovo je test vest.</p>\r\n<p><a href="http://www.blic.rs/" target="_blank">link</a></p>', '2013-10-20 17:41:52', 1, 1),
(2, 2, 'Test', '<p>Test</p>', '2013-10-20 17:42:18', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `ime`, `prezime`, `lozinka`, `salt`, `email`, `last_login`) VALUES
(2, 'uros', 'Uros', 'Avramovic', '3c954a6efeb609598cfca42187c00899be0ae33eb5fadefa36015b39d778ec0c', '680a56015d9081d8', 'avramovic.u@gmail.com', '2013-12-08 13:38:27');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategorije_atributi`
--
ALTER TABLE `kategorije_atributi`
  ADD CONSTRAINT `kategorije_atributi_ibfk_1` FOREIGN KEY (`id_kategorije`) REFERENCES `kategorije` (`id_kategorije`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategorije_atributi_ibfk_2` FOREIGN KEY (`id_atributa`) REFERENCES `atributi` (`id_atributa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mz`
--
ALTER TABLE `mz`
  ADD CONSTRAINT `mz_ibfk_1` FOREIGN KEY (`id_opstine`) REFERENCES `opstine` (`id_opstina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `oglas`
--
ALTER TABLE `oglas`
  ADD CONSTRAINT `oglas_ibfk_1` FOREIGN KEY (`kategorija`) REFERENCES `kategorije` (`id_kategorije`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oglas_ibfk_2` FOREIGN KEY (`id_grad`) REFERENCES `gradovi` (`id_grad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oglas_ibfk_3` FOREIGN KEY (`id_opstina`) REFERENCES `opstine` (`id_opstina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `oglas_atributi`
--
ALTER TABLE `oglas_atributi`
  ADD CONSTRAINT `oglas_atributi_ibfk_1` FOREIGN KEY (`id_oglas`) REFERENCES `oglas` (`id_oglas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oglas_atributi_ibfk_2` FOREIGN KEY (`id_atribut`) REFERENCES `atributi` (`id_atributa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opstine`
--
ALTER TABLE `opstine`
  ADD CONSTRAINT `opstine_ibfk_1` FOREIGN KEY (`id_grad`) REFERENCES `gradovi` (`id_grad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
