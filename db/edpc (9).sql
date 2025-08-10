-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Mrz 2021 um 19:39
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `edpc`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `chat`
--

CREATE TABLE `chat` (
  `id` int(5) NOT NULL,
  `time` varchar(8) COLLATE utf8mb4_german2_ci NOT NULL,
  `user` varchar(20) COLLATE utf8mb4_german2_ci NOT NULL,
  `message` varchar(100) COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `chat`
--

INSERT INTO `chat` (`id`, `time`, `user`, `message`) VALUES
(1, '17:49', '1', 'Hello World!!!'),
(3, '17:58', '1', 'Hellau'),
(4, '17:59', '1', 'Hallo, ich bin der übermotivierte dispo1. ICh wünsceh Gute Fahrt und ruhige Schicht'),
(5, '11:13', '0', 'Verstanden!'),
(6, '11:13', '', 'Verstanden!'),
(7, '11:14', '1', 'Gute Fahrt'),
(8, '11:14', 'DGN/10/01', 'Verstanden!'),
(9, '11:15', '1', 'ACHTUNG: ANfahrt Ã¼ber jÃ¤gerstraÃŸe'),
(10, '11:15', 'DGN/10/01', 'Verstanden!'),
(11, '13:19', '1', 'Negativ!'),
(12, '13:25', '1', 'Warten!'),
(13, '20:53', 'DGN/10/03', 'Verstanden!'),
(14, '23:05', '1', '@Sab:92 Abfgart über Herzer'),
(15, '23:05', 'San_03', 'Verstanden!'),
(16, '15:06', '1', 'Verstanden!');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einsaetze`
--

CREATE TABLE `einsaetze` (
  `einsatz_id` int(5) NOT NULL,
  `einsatz_stichwort` varchar(15) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_adresse` int(5) NOT NULL,
  `einsatz_adresse_isset` int(1) NOT NULL COMMENT '1, 0',
  `einsatz_adresse_strasse` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_adresse_hausnummer` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_adresse_postleitzahl` varchar(5) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_adresse_ortschaft` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_adresse_ortsteil` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_melder_gender` varchar(30) COLLATE utf8_german2_ci NOT NULL COMMENT 'name Anrufer',
  `einsatz_melder_name_vor` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_melder_name_nach` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_melder_telefon` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_anzahl_patienten` int(2) NOT NULL COMMENT 'Nummr Patienten, mx. 20',
  `einsatz_x` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_y` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_patient_01` varchar(30) COLLATE utf8_german2_ci NOT NULL COMMENT 'Verweis Patienten-Liste',
  `einsatz_status` varchar(1) COLLATE utf8_german2_ci NOT NULL COMMENT '"a"=aktiv,"i"=inaktiv',
  `einsatz_sondersignal_isset` int(1) NOT NULL,
  `einsatz_freitext` varchar(100) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `einsaetze`
--

INSERT INTO `einsaetze` (`einsatz_id`, `einsatz_stichwort`, `einsatz_adresse`, `einsatz_adresse_isset`, `einsatz_adresse_strasse`, `einsatz_adresse_hausnummer`, `einsatz_adresse_postleitzahl`, `einsatz_adresse_ortschaft`, `einsatz_adresse_ortsteil`, `einsatz_melder_gender`, `einsatz_melder_name_vor`, `einsatz_melder_name_nach`, `einsatz_melder_telefon`, `einsatz_anzahl_patienten`, `einsatz_x`, `einsatz_y`, `einsatz_patient_01`, `einsatz_status`, `einsatz_sondersignal_isset`, `einsatz_freitext`) VALUES
(216, '1', 33, 1, '0', '0', '0', '', '0', 'm', '', '', '', 1, '51.15697484508055', '11.812883473085863', '102', 'a', 0, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einsatztagebuch`
--

CREATE TABLE `einsatztagebuch` (
  `eintrag_id` int(5) NOT NULL,
  `eintrag_uhrzeit` varchar(8) COLLATE utf8_german2_ci NOT NULL COMMENT 'hh:mm:ss',
  `eintrag_string` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `eintrag_ea` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `eintrag_absender` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `eintrag_titel` varchar(20) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `einsatztagebuch`
--

INSERT INTO `einsatztagebuch` (`eintrag_id`, `eintrag_uhrzeit`, `eintrag_string`, `eintrag_ea`, `eintrag_absender`, `eintrag_titel`) VALUES
(574, '07:38:43', '1...wird erzeugt!', 'EL', 'Disponent', 'Einsatz erstellt!');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einsatz_stichwort`
--

CREATE TABLE `einsatz_stichwort` (
  `einsatz_stichwort_id` int(5) NOT NULL,
  `einsatz_stichwort_title` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_stichwort_obergruppe` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_stichwort_untergruppe` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `einsatz_stichwort_beschreibung` varchar(40) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `einsatz_stichwort`
--

INSERT INTO `einsatz_stichwort` (`einsatz_stichwort_id`, `einsatz_stichwort_title`, `einsatz_stichwort_obergruppe`, `einsatz_stichwort_untergruppe`, `einsatz_stichwort_beschreibung`) VALUES
(1, 'Schlechter AZ', 'RD', 'Allgemein', 'Schlechter Allgemeinzustand'),
(2, 'HiLoPe', 'RD', 'Allgemein', 'Hilflose Person'),
(3, 'Apoplex', 'RD', 'Internistisch', 'Schlaganfall, Apoplexia cerebri'),
(4, 'ACS', 'RD', 'Internistisch', 'Herzinfarkt'),
(5, 'Unklares Abdom', 'RD', 'Internistisch', 'Unklare abdomale Beschwerden'),
(6, 'Akutes Abdom', 'RD', 'Internistisch', 'Akute abdomale EInblutung'),
(7, 'Pneumathorax', 'RD', 'Internistisch', 'Lufteinströmung Thorax'),
(8, 'Fraktur', 'RD', 'Chirogisch', 'Bruch'),
(9, 'SHT', 'RD', 'Chirogisch', 'Schädel-Hirn-Trauma'),
(10, 'Hypoglykämie', 'RD', 'Internistisch', 'Unterzuckerung'),
(11, 'Hyperglykämie', 'RD', 'Internistisch', 'Überzuckerung'),
(12, 'Hypothemie', 'RD', 'Internistisch', 'Unterkühlung'),
(13, 'Polytrauma', 'RD', 'chirogisch', 'lebensgefährliche, überregionale Verletz'),
(14, 'Suizidale Person', 'RD', 'Allgemein', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrzeuge`
--

CREATE TABLE `fahrzeuge` (
  `fahrzeug_id` int(5) NOT NULL,
  `fahrzeug_einsatz` int(5) NOT NULL COMMENT 'einsatz_id',
  `fahrzeug_funkkenner` varchar(9) COLLATE utf8_german2_ci NOT NULL COMMENT '000/00/01',
  `fahrzeug_status` int(1) NOT NULL COMMENT '0-9',
  `fahrzeug_kennzeichen` varchar(10) COLLATE utf8_german2_ci NOT NULL COMMENT 'ABC RD 753',
  `fahrzeug_besatzung_1` varchar(20) COLLATE utf8_german2_ci NOT NULL COMMENT 'Name Maschinist',
  `fahrzeug_besatzung_2` varchar(20) COLLATE utf8_german2_ci NOT NULL COMMENT 'Name Fahrzeugführer',
  `fahrzeug_besatzung_3` varchar(20) COLLATE utf8_german2_ci NOT NULL COMMENT 'Name',
  `fahrzeug_besatzung_4` varchar(20) COLLATE utf8_german2_ci NOT NULL COMMENT 'Name',
  `fahrzeug_besatzung_5` varchar(20) COLLATE utf8_german2_ci NOT NULL COMMENT 'Name',
  `fahrzeug_besatzung_6` varchar(20) COLLATE utf8_german2_ci NOT NULL COMMENT 'Name',
  `fahrzeug_typ` varchar(10) COLLATE utf8_german2_ci NOT NULL COMMENT 'RTW, Kdow, GW-San',
  `fahrzeug_ziel` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `fahrzeug_aktion` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `fahrzeug_organisation` varchar(10) COLLATE utf8_german2_ci NOT NULL,
  `fahrzeug_status_alt` int(2) NOT NULL,
  `fahrzeug_sprechaufforderung` int(11) NOT NULL,
  `aed` tinyint(1) NOT NULL,
  `ekg` tinyint(1) NOT NULL,
  `nfr_klein` tinyint(1) NOT NULL,
  `nfr_gross` tinyint(1) NOT NULL,
  `medikamente` tinyint(1) NOT NULL,
  `liegendtrage` tinyint(1) NOT NULL,
  `tragestuhl` tinyint(1) NOT NULL,
  `sauer_klein` tinyint(1) NOT NULL,
  `sauer_gross` tinyint(1) NOT NULL,
  `fahrzeug_adresse_isset` int(1) NOT NULL,
  `fahrzeug_adresse` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `fahrzeuge`
--

INSERT INTO `fahrzeuge` (`fahrzeug_id`, `fahrzeug_einsatz`, `fahrzeug_funkkenner`, `fahrzeug_status`, `fahrzeug_kennzeichen`, `fahrzeug_besatzung_1`, `fahrzeug_besatzung_2`, `fahrzeug_besatzung_3`, `fahrzeug_besatzung_4`, `fahrzeug_besatzung_5`, `fahrzeug_besatzung_6`, `fahrzeug_typ`, `fahrzeug_ziel`, `fahrzeug_aktion`, `fahrzeug_organisation`, `fahrzeug_status_alt`, `fahrzeug_sprechaufforderung`, `aed`, `ekg`, `nfr_klein`, `nfr_gross`, `medikamente`, `liegendtrage`, `tragestuhl`, `sauer_klein`, `sauer_gross`, `fahrzeug_adresse_isset`, `fahrzeug_adresse`) VALUES
(1775, 0, 'DGN/10/01', 2, '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'dgn', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 219),
(1776, 0, 'DGN/10/02', 2, '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'dgn', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 219),
(1777, 0, 'DGN/10/03', 2, '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'dgn', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 219),
(1778, 0, 'DGN/99/01', 2, '', '1', '1', '1', '1', '1', '1', 'Bhp', '', 'Bereitschaft', 'dgn', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 219),
(1779, 0, 'DGN/100/0', 2, '', '1', '1', '1', '1', '1', '1', 'EAL-Sa', '', 'Bereitschaft', 'dgn', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 219);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `funk_schlange`
--

CREATE TABLE `funk_schlange` (
  `funk_id` int(5) NOT NULL,
  `funk_status` int(1) NOT NULL,
  `funk_richtung` text COLLATE utf8_german2_ci NOT NULL COMMENT '"e"=ein/"a"=aus',
  `funk_warten` text COLLATE utf8_german2_ci NOT NULL COMMENT 'default: "", warten="1"',
  `funk_von` varchar(10) COLLATE utf8_german2_ci NOT NULL COMMENT 'fahrzeug_id',
  `funk_neu` int(11) NOT NULL,
  `funk_an` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `patienten`
--

CREATE TABLE `patienten` (
  `patient_id` int(5) NOT NULL COMMENT 'Patienten-Nummer',
  `patient_einsatz` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `patient_triage` varchar(1) COLLATE utf8_german2_ci NOT NULL,
  `patient_vorname` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `patient_nachname` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `patient_geburt_tag` int(2) NOT NULL COMMENT '00',
  `patient_geburt_monat` int(2) NOT NULL COMMENT '00',
  `patient_geburt_jahr` int(2) NOT NULL COMMENT '0000',
  `patient_stichwort` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `patient_lokation` varchar(30) COLLATE utf8_german2_ci NOT NULL COMMENT 'UNfallstelle, UHS, BhP; KTWB, RTW',
  `patient_tod_tag` int(2) NOT NULL,
  `patient_tod_monat` int(2) NOT NULL,
  `patient_tod_jahr` int(3) NOT NULL,
  `patient_tod_stunde` int(2) NOT NULL,
  `patient_tod_minute` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `patienten`
--

INSERT INTO `patienten` (`patient_id`, `patient_einsatz`, `patient_triage`, `patient_vorname`, `patient_nachname`, `patient_geburt_tag`, `patient_geburt_monat`, `patient_geburt_jahr`, `patient_stichwort`, `patient_lokation`, `patient_tod_tag`, `patient_tod_monat`, `patient_tod_jahr`, `patient_tod_stunde`, `patient_tod_minute`) VALUES
(102, '', '', '', '', 0, 0, 0, '1', '33', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personal`
--

CREATE TABLE `personal` (
  `personal_id` int(5) NOT NULL,
  `personal_vorname` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `personal_nachname` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `personal_bos` int(1) NOT NULL COMMENT '0=nein, 1= ja',
  `personal_san` int(1) NOT NULL,
  `personal_rs` int(1) NOT NULL,
  `personal_ra` int(1) NOT NULL,
  `personal_nfs` int(1) NOT NULL,
  `personal_na` int(1) NOT NULL,
  `personal_tf` int(1) NOT NULL,
  `personal_gf` int(1) NOT NULL,
  `personal_zf` int(1) NOT NULL,
  `personal_vf` int(1) NOT NULL,
  `personal_lna` int(1) NOT NULL,
  `personal_ordlrd` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `personal`
--

INSERT INTO `personal` (`personal_id`, `personal_vorname`, `personal_nachname`, `personal_bos`, `personal_san`, `personal_rs`, `personal_ra`, `personal_nfs`, `personal_na`, `personal_tf`, `personal_gf`, `personal_zf`, `personal_vf`, `personal_lna`, `personal_ordlrd`) VALUES
(2, 'none', 'none', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Felix', 'Staacke', 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(4, 'Cedric', 'Pocher', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Hannah', 'Schöppel', 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 1, 0),
(6, 'Florian', 'Wabnitz', 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0),
(7, 'Paul', 'Stephan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Tom', 'Hofman', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(9, 'Erik', 'Hoffman', 1, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0, 0),
(10, 'Friedrich ', 'Katschinski', 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(11, 'Tom Marvin', 'Schmidke', 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `prop_karte`
--

CREATE TABLE `prop_karte` (
  `prop_id` int(5) NOT NULL,
  `prop_title` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `prop_art` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `prop_discribtion` varchar(40) COLLATE utf8_german2_ci NOT NULL,
  `prop_x` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `prop_y` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_german2_ci NOT NULL,
  `prop_adresse` int(5) NOT NULL,
  `prop_gruppe_a` int(5) NOT NULL,
  `prop_gruppe_a_nr` int(1) NOT NULL,
  `prop_gruppe_b` tinyint(1) NOT NULL,
  `prop_gruppe_b_nr` int(1) NOT NULL,
  `prop_group_count` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `prop_karte`
--

INSERT INTO `prop_karte` (`prop_id`, `prop_title`, `prop_art`, `prop_discribtion`, `prop_x`, `prop_y`, `status`, `prop_adresse`, `prop_gruppe_a`, `prop_gruppe_a_nr`, `prop_gruppe_b`, `prop_gruppe_b_nr`, `prop_group_count`) VALUES
(292, 'Bhp', 'Bhp', '', '51.15655006724605', '11.812439258185583', 's', 0, 1, 1, 0, 0, 2),
(293, 'FK-DGN(SSD)', 'EAL', '', '51.15655006724605', '11.812439258185583', 'd', 0, 1, 2, 0, 0, 2),
(294, 'Schulleitung', 'TEL', '', '51.156357242585464', '11.81262595123428', 'd', 0, 0, 0, 0, 0, 0),
(295, '', 'drk_ee_trupp', '', '51.15171418269119', '11.789943859134324', 's', 0, 0, 0, 0, 0, 0),
(296, '', 'drk_ee_gruppe', '', '51.15171418269119', '11.789943859134324', 's', 2, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `prop_kliniken`
--

CREATE TABLE `prop_kliniken` (
  `prop_id` int(5) NOT NULL,
  `prop_title` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `prop_x` varchar(40) COLLATE utf8_german2_ci NOT NULL,
  `prop_y` varchar(40) COLLATE utf8_german2_ci NOT NULL,
  `allgemeine_inne` tinyint(1) NOT NULL COMMENT 'Boolean',
  `allgemeine_chirogie` tinyint(1) NOT NULL,
  `gynaegologie` tinyint(1) NOT NULL,
  `stroke` tinyint(1) NOT NULL,
  `neurologie` tinyint(1) NOT NULL,
  `karidlogie` tinyint(1) NOT NULL,
  `kardiochirogie` tinyint(1) NOT NULL,
  `kreissaal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `prop_kliniken`
--

INSERT INTO `prop_kliniken` (`prop_id`, `prop_title`, `prop_x`, `prop_y`, `allgemeine_inne`, `allgemeine_chirogie`, `gynaegologie`, `stroke`, `neurologie`, `karidlogie`, `kardiochirogie`, `kreissaal`) VALUES
(1, 'SRH Klinikum Naumbur', '51.16101288796297', '11.814772492319573', 1, 1, 0, 1, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `prop_stadt`
--

CREATE TABLE `prop_stadt` (
  `prop_id` int(11) NOT NULL,
  `prop_title` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `prop_discribtion` varchar(40) COLLATE utf8_german2_ci NOT NULL,
  `prop_x` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `prop_y` varchar(20) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `prop_stadt`
--

INSERT INTO `prop_stadt` (`prop_id`, `prop_title`, `prop_discribtion`, `prop_x`, `prop_y`) VALUES
(1, 'Schönburg', 'Gemeinde', '51.1605194517233', '11.86830595789452'),
(2, 'Bad Kösen', 'Kleinstadt', '51.13590226664501', '11.723621683370753'),
(3, 'Naumburg', 'Stadt', '51.15114349426938', '11.815984782942452'),
(4, 'Saaleck', 'Dorf', '51.11211472686177', '11.700070201434457'),
(5, 'Weißenfels', 'Stadt', '51.198070014041356', '11.964012065372534'),
(6, 'Freyburg (Unstrut)', 'Stadt', '51.2111027567189', '11.777396609295295'),
(7, 'Zeitz', 'Stadt', '51.04402697001737', '12.13515057425094'),
(8, 'Bad Sulza', 'Kleinstadt', '51.089609588425546', '11.621242627579026'),
(9, 'Crölpa-Löbschütz', 'Gemeinde', '51.10812676618788', '11.739500630765589'),
(10, 'Leislau', 'Ortsteil', '51.0845373907841', '11.739908912594116');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `prop_stasse`
--

CREATE TABLE `prop_stasse` (
  `prop_id` int(5) NOT NULL,
  `prop_title` varchar(60) COLLATE utf8_german2_ci NOT NULL,
  `prop_art` varchar(20) COLLATE utf8_german2_ci NOT NULL COMMENT 'B=Bundesstraße, OS=Osrtsstraße',
  `prop_discribtion` varchar(100) COLLATE utf8_german2_ci NOT NULL,
  `prop_gemeinde` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `prop_strasse` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `haunu` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `prop_x` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `prop_y` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `prop_modell` varchar(1) COLLATE utf8_german2_ci NOT NULL COMMENT '1=true, 0=false',
  `prop_modell_link` varchar(60) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `prop_stasse`
--

INSERT INTO `prop_stasse` (`prop_id`, `prop_title`, `prop_art`, `prop_discribtion`, `prop_gemeinde`, `prop_strasse`, `haunu`, `prop_x`, `prop_y`, `prop_modell`, `prop_modell_link`) VALUES
(1, 'Koesener Strasse', 'B', 'B87', 'Naumburg', 'Koesener Strasse', '0', '51.15201441666483 ', '11.794654823455096', '0', ''),
(2, 'Koesener Strasse 52', 'Haus', 'Bundeswehrkadette', 'Naumburg', 'Koesener Strasse', '52', '51.15171418269119', '11.789943859134324', '0', ''),
(3, 'Koesener Strasse 30', 'Haus', 'Radiologie', 'Naumburg', 'Koesener Strasse', '30', '51.15174270167725', '11.793924573724329', '0', ''),
(4, 'Koesener Strasse 100', 'Discounter', 'Netto', 'Naumburg', 'Koesener Strasse', '100', '51.150810667161046', '11.781779205122808', '0', ''),
(6, 'Jenaer Strasse', 'B', 'B88', 'Naumburg', 'Jenaer Strasse', '0', '51.14850136396113 ', '11.821712947063196', '0', ''),
(7, 'Flemminger Weg', 'OS', '', 'Naumburg', 'Flemminger-Weg', '0', '51.14518042092916', '11.78704136045721', '0', ''),
(8, 'Hallesche Strasse ', 'OS', '', 'Naumburg', 'Hallesche Strasse', '0', '51.16016190319605', '11.818070779425254', '1', 'geojson/naumburg/hallesche_strasse.geojson'),
(9, 'Luisenstrasse', 'OS', '', 'Naumburg', 'Luisenstrasse', '', '51.1452444547064 ', '11.813273467940062', '0', ''),
(10, 'Lindenring ', 'OS', '', 'Naumburg', '', '', '51.15315194326559', '11.806638888226502', '0', ''),
(11, 'Neidschützer Strasse', 'OS', '', 'Naumburg', '', '', '51.13824592742706', '11.809118272813242', '0', ''),
(12, 'Jaegerstrasse', 'OS', '', 'Naumburg', 'Jaegerstrasse', '', '51.15807673849614', '11.808613049826466', '1', 'geojson/naumburg/jaegerstrasse.geojson'),
(13, 'Fischstrasse', 'OS', '', 'Naumburg', '', '', '51.152876998601016 ', '11.802732334460472', '0', ''),
(14, ' Moritzstrasse', 'OS', '', 'Naumburg', '', '', '51.15452936778016', '11.8108159022489', '0', ''),
(15, 'Parkstraße', 'OS', '', 'Naumburg', '', '', '51.147602602509274', '11.805799759737331', '0', ''),
(16, 'Claudiusstrasse', 'OS', '', 'Naumburg', '', '', '51.145949985293484', '11.807604127547249', '0', ''),
(17, 'Oststraße', 'OS', '', 'Naumburg', '', '', '51.15744916317023', '11.816734228665425', '0', ''),
(18, 'Georgenmauer', 'OS', '', 'Naumburg', '', '', '51.156724890073235', '11.803670605721631', '0', ''),
(19, 'Grochlitzer Straße', 'OS', '', 'Naumburg', '', '', '51.15296754091025', '11.817022927515012', '0', ''),
(20, 'August-Bebel-Straße', 'OS', '', 'Naumburg', '', '', '51.15409930478578', '11.816265093034847', '0', ''),
(21, 'Seminarstraße', 'OS', '', 'Naumburg', '', '', '51.14916461095848', '11.793493971273703', '0', ''),
(22, 'Teufelsgraben ', 'OS', '', 'Naumburg', '', '', '51.146742343397605', '11.796453134481965', '0', ''),
(23, 'Weißenfelser Strasse', 'B', 'B180', 'Naumburg', '', '', '51.14850136396113', '11.821712947063196', '0', ''),
(24, 'Thomas-Muentzer Strasse', 'OS', '', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15728928744106', '11.812690024240451', '1', 'geojson/naumburg/thomas-muenzer_strasse.geojson'),
(25, 'Thomas Muentzer Strasse 22/23', 'OS', 'Schule: Domgymnasium Naumburg', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15643827455868', '11.812626400052133', '0', ''),
(26, 'Thomas Muentzer Strasse./Hinter der Post', 'Kreuzung', 'Kreuzung', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15626874691434', '11.81283713239862', '0', ''),
(27, 'Thomas Muentzer Strasse / Hinter der Post', 'Kreuzung', '', 'Naumburg', '', '', '51.15624652127578', '11.812859565852042', '0', ''),
(28, 'Thomas Muentzer Strasse / Jägerstrasse', 'Kreuzung', '', 'Naumburg', '', '', '51.15823329234244', '11.81252694828149', '0', ''),
(29, 'Poststraße 5', 'OEPV', 'Straßenbahn Naumburg - Depot', 'Naumburg', '', '', '51.15568999380767', '11.812674273780079', '0', ''),
(30, 'Heinrich-Heine Platz 6', 'Post', 'post Filliale', 'Naumburg', '', '', '51.15573596913759', '11.813360405548543', '0', ''),
(31, 'Thomas-Muentzer Strasse 3', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15673077818116', '11.812929723180462', '0', ''),
(32, 'Thomas Muentzer Strasse 4', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15685081117746', '11.812907395547334', '0', ''),
(33, 'Thomas-Muentzer Strasse 5', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15697484508055', '11.812883473085863', '0', ''),
(34, 'Thomas Muentzer Strasse 6', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15709187706036', '11.812872309338124', '0', ''),
(35, 'Thomas-Muenzter Strasse 7', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.157201906543754', '11.812846791187804', '0', ''),
(36, 'Thomas Muentzer Strasse 7a', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.157308934980925', '11.812822868704846', '0', ''),
(37, 'Thomas-Muentzer Strasse 8', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.1574269665509', '11.81281010965462', '0', ''),
(38, 'Thomas Muentzer Strasse 9', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15769103494475', '11.812722393051402', '0', ''),
(39, 'Thomas-Muentzer Strasse 10', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15780471135133', '11.812710994188553', '0', ''),
(40, 'Thomas Muentzer Strasse 10a', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.1579967602307', '11.812693452687775', '0', ''),
(41, 'Thomas-Muentzer Strasse 11', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.158111789780165', '11.812671124371342', '0', ''),
(42, 'Thomas Muentzer Strasse 12', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15791273963673', '11.812431895536866', '0', ''),
(43, 'Thomas-Muentzer Strasse 13', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15779971106148', '11.812459008012038', '0', ''),
(44, 'Thomas Muentzer Strasse 14', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15771956522413', '11.812457828199344', '0', ''),
(45, 'Thomas-Muentzer Strasse 16', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15761190276329', '11.81247459199528', '0', ''),
(46, 'Thomas Muentzer Strasse 18', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.15753914630734', '11.812488673571387', '0', ''),
(47, 'Thomas-Muentzer Strasse17', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.157464707514336', '11.812500743661086', '0', ''),
(48, 'Thomas Muentzer Strasse 19', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.157366717269596', '11.81251415456908', '0', ''),
(49, 'Thomas-Muentzer Strasse 20', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.1571651001515', '11.812544532708522', '0', ''),
(50, 'Thomas Muentzer Strasse 21', 'Haus', 'Haus', 'Naumburg', 'Thomas-Muentzer Strasse', '', '51.157030713684705', '11.812568214842436', '0', ''),
(51, 'Humboldstrasse', 'OS', '', 'Naumburg', '', '', '51.159823020420724', '11.812610529690364', '1', 'geojson/naumburg/humboldtstrasse.geojson'),
(52, 'Humboldstrasse 8', 'Haus', 'Haus', 'Naumburg', '', '', '51.15865351568676', '11.812314016811388', '0', ''),
(53, 'Humboldtstrasse 5', 'Haus', 'Haus', 'Naumburg', '', '', '51.1588101550093', '11.813013737254925', '0', ''),
(54, 'Humboldstrasse 7', 'Haus', 'Mehrfamilienhaus', 'Naumburg', '', '', '51.15899809387996', '11.812926493370853', '0', ''),
(55, 'Humboldtstrasse 9', 'Haus', 'Mehrfamilienhaus', 'Naumburg', '', '', '51.159140831227866', '11.812939769985531', '0', ''),
(56, 'Humboldstrasse 10', 'Haus', 'Pflegeheim Luisenhaus', 'Naumburg', '', '', '51.159203286754156', '11.812325557281708', '0', ''),
(57, 'Humboldstrasse 12', 'Haus', 'Pflegeheim Luisenhaus', 'Naumburg', '', '', '51.15929580600901', '11.81233226286768', '0', ''),
(58, 'Humboldstrasse 14', 'Haus', 'Pflegeheim Luisenhaus', 'Naumburg', '', '', '51.15946065809849', '11.812337627112694', '0', ''),
(59, 'Humboldstrasse 16', 'Haus', 'Pflegeheim Luisenhaus', 'Naumburg', '', '', '51.15959312806791', '11.812334944897113', '0', ''),
(60, 'Humboldstrasse 11', 'Pflegeheim', 'Pflegeheim', 'Naumburg', '', '', '51.159687290029', '11.81332824090862', '0', ''),
(61, 'Humboldtstrasse 13', 'Haus', 'Haus', 'Naumburg', '', '', '51.15982237608639', '11.812913236259242', '0', ''),
(62, 'Humboldstrasse 15', 'Haus', 'Ferienwohnung \"Lehmwiese\"', 'Naumburg', '', '', '51.159996444499825', '11.812903433293629', '0', ''),
(63, 'Humboldstrasse 17', 'Haus', 'Haus', 'Naumburg', '', '', '51.160220170625514', '11.813141642671152', '0', ''),
(64, 'Albert-Schweizer Strasse 2', 'Mehrfamilienhaus', 'Mehrfamilienhaus', 'Naumburg', '', '', '51.15997665678082', '11.81216530796674', '0', ''),
(65, 'Albert-Schweizer Strasse 4', 'Mehrfamilienhaus', 'Mehrfamilienhaus', 'Naumburg', '', '', '51.16001828746376', '11.811975647920585', '0', ''),
(66, 'Albert-Schweizer Strasse 6', 'Mehrfamilienhaus', 'Mehrfamilienhaus', 'Naumburg', '', '', '51.16004386132092', '11.811787127975462', '0', ''),
(67, 'Albert-Schweizer Strasse 10', 'Mehrfamilienhaus', 'Mehrfamilienhaus', 'Naumburg', '', '', '51.16033992069131', '11.812407527387531', '0', ''),
(68, 'Albert-Schweizer Strasse 12', 'Mehrfamilienhaus', 'Mehrfamilienhaus', 'Naumburg', '', '', '51.16040993542556', '11.81197851153168', '0', ''),
(69, 'Albert-Schweizer Strasse 14', 'Mehrfamilienhaus', 'Mehrfamilienhaus', 'Naumburg', '', '', '51.16069599062219', '11.812675460086586', '0', ''),
(70, 'Albert-Schweizer Strasse 16', 'Mehrfamilienhaus', 'Mehrfamilienhaus', 'Naumburg', '', '', '51.16072399642278', '11.812493647020863', '0', ''),
(71, 'Albert-Schweizer Strasse 18', 'Mehrfamilienhaus', 'Mehrfamilienhaus', 'Naumburg', '', '', '51.16074600077108', '11.812260798444834', '0', ''),
(72, 'Albert-Schweizer Strasse 20', 'Mehrfamilienhaus', 'Mehrfamilienhaus', 'Naumburg', '', '', '51.16080101089407', '11.811975319150214', '0', ''),
(73, 'Albert-Schweizer Strasse 22', 'Mehrfamilienhaus', 'Mehrfamilienhaus', 'Naumburg', '', '', '51.16082301482481', '11.811817429252566', '0', ''),
(74, 'Albert-Schweizer Strasse 24', 'Mehrfamilienhaus', 'Mehrfamilienhaus', 'Naumburg', '', '', '51.16085902093132', '11.811621261643703', '0', ''),
(75, 'Jaegerstrasse 54', 'Haus', 'Haus', 'Naumburg', '', '', '51.1581498010217', '11.812387988542039', '0', ''),
(76, 'Jaegerstrasse 50', 'Haus', 'Haus', 'Naumburg', '', '', '51.1581022917087', '11.811956593518852', '0', ''),
(77, 'Jaegerstrasse 46', 'Haus', 'Haus', 'Naumburg', '', '', '51.15807753476163', '11.811776266580422', '0', ''),
(78, 'Jaegerstrasse 44', 'Haus', 'Haus', 'Naumburg', '', '', '51.15804893720431', '11.81146311854471', '0', ''),
(79, 'Jaegerstrasse 42', 'Haus', 'Haus', 'Naumburg', '', '', '51.158028750662105,', '11.811288774936921', '0', ''),
(80, 'Jaegerstrasse 57', 'Haus', 'Haus', 'Naumburg', '', '', '51.15815942678511', '11.810786926083164', '0', ''),
(81, 'Jaegerstrasse 57', 'Haus', 'Haus', 'Naumburg', '', '', '51.15817036112247', '11.810925059880107', '0', ''),
(82, 'Jaegerstrasse 61', 'Haus', 'Haus', 'Naumburg', '', '', '51.15818718311978', '11.81107660484094', '0', ''),
(83, 'Jaegerstrasse 63', 'Haus', 'Haus', 'Naumburg', '', '', '51.158203584705646', '11.811246924998386', '0', ''),
(84, 'Jaegerstrasse 65', 'Haus', 'Haus', 'Naumburg', '', '', '51.15821662167728', '11.811380365046631', '0', ''),
(85, 'Jaegerstrasse 67', 'Haus', 'Haus', 'Naumburg', '', '', '51.15823007944595', '11.811499052702217', '0', ''),
(86, 'Jaegerstrasse 69', 'Haus', 'Haus', 'Naumburg', '', '', '51.15824395744407', '11.811651938871497', '0', ''),
(87, 'Jaegerstrasse 71', 'Haus', 'Haus', 'Naumburg', '', '', '51.1582607797076', '11.81179342504801', '0', ''),
(88, 'Jaegerstrasse 73', 'Haus', 'Haus', 'Naumburg', '', '', '51.158270452336204', '11.811916136154247', '0', ''),
(89, 'Jaegerstrasse 77', 'Haus', 'Haus', 'Naumburg', '', '', '51.15829316213651', '11.812095844112614', '0', ''),
(90, 'Jaegerstrasse 79', 'Haus', 'Haus', 'Naumburg', '', '', '51.15835077737098', '11.812364735960239', '0', ''),
(91, 'Gartenstrasse 29', 'Haus', 'Haus', 'Naumburg', '', '', '51.15768081891436', '11.8104212540527', '0', ''),
(92, 'Gartenstrasse 27', 'Haus', 'Haus', 'Naumburg', '', '', '51.157594579315436', '11.810432633769912', '0', ''),
(93, 'Gartenstrasse 25', 'Haus', 'Haus', 'Naumburg', '', '', '51.15746119347279', '11.810437792178421', '0', ''),
(94, 'Gartenstrasse 23', 'Haus', 'Haus', 'Naumburg', '', '', '51.15737016954918', '11.81044576640689', '0', ''),
(95, 'Gartenstrasse 21', 'Haus', 'Haus', 'Naumburg', '', '', '51.15727264374469, 1', '11.810456930331013', '0', ''),
(96, 'Gartenstrasse 19', 'Haus', 'Haus', 'Naumburg', '', '', '51.15717261698653', '11.810467296730373', '0', ''),
(97, 'Gartenstrasse 17', 'Haus', 'Haus', 'Naumburg', '', '', '51.157082439576754', '11.810466280588717', '0', ''),
(98, 'Gartenstrasse 13', 'Haus', 'Restaurant Gartenlaube', 'Naumburg', '', '', '51.15688776183157', '11.810491658780423', '0', ''),
(99, 'Gartenstrasse 9', 'Haus', 'Haus', 'Naumburg', '', '', '51.15678062783372', '11.810491658840736', '0', ''),
(100, 'Gartenstrasse 7', 'Haus', 'Haus', 'Naumburg', '', '', '51.15651248501916', '11.810521917446188', '0', ''),
(101, 'Gartenstrasse 5', 'Haus', 'Haus', 'Naumburg', '', '', '51.156503301895214', '11.810521917432574', '0', ''),
(102, 'Gartenstrasse 3', 'Haus', 'Haus', 'Naumburg', '', '', '51.15639126912877', '11.810530702285332', '0', ''),
(103, 'Gartenstrasse 1', 'Haus', 'Haus', 'Naumburg', '', '', '51.15627984831016', '11.81053851094933', '1', ''),
(104, 'Gartenstrasse 30', 'Haus', 'Haus', 'Naumburg', '', '', '51.15764811612842', '11.810683927873391', '0', ''),
(105, 'Gartenstrasse 28', 'Haus', 'Haus', 'Naumburg', '', '', '51.15756154006739', '11.810695661255133', '0', ''),
(106, 'Gartenstrasse 26', 'Haus', 'Haus', 'Naumburg', '', '', '51.1574589471819', '11.810707394692397', '0', ''),
(107, 'Gartenstrasse 24', 'Haus', 'Haus', 'Naumburg', '', '', '51.15736631042521', '11.810712916284238', '0', ''),
(108, 'Gartenstrasse 22', 'Haus', 'Haus', 'Naumburg', '', '', '51.15724986484678', '11.810723269293407', '0', ''),
(109, 'Gartenstrasse 20', 'Haus', 'Haus', 'Naumburg', '', '', '51.157069784903825', '11.810734312414919', '0', ''),
(110, 'Gartenstrasse 18', 'Haus', 'Einzelhandel - Glasscheiben, Holz', 'Naumburg', '', '', '51.156937321618244', '11.810897890200497', '0', ''),
(111, 'Gartenstrasse 16', 'Haus', 'Haus', 'Naumburg', '', '', '51.15682390534682', '11.81075501855212', '0', ''),
(112, 'Gartenstrasse 14', 'Haus', 'Haus', 'Naumburg', '', '', '51.15671611604252', '11.810759849964986', '0', ''),
(113, 'Gartenstrasse 12', 'Haus', 'Haus', 'Naumburg', '', '', '51.15665161558031', '11.810768822570399', '0', ''),
(114, 'Gartenstrasse 10', 'Haus', 'Haus', 'Naumburg', '', '', '51.15654599045337', '11.810777104999312', '0', ''),
(115, 'Gartenstrasse 8', 'Haus', 'Haus', 'Naumburg', '', '', '51.156445559915944', '11.810788838454641', '0', ''),
(116, 'Gartenstrasse 6', 'Haus', 'Haus', 'Naumburg', '', '', '51.15628106079637', '11.810797120777513', '0', ''),
(117, 'Poststrasse 1', 'Schule', 'Domgymnasium Naumburg', 'Naumburg', '', '', '51.15569958061188', '11.811704173455123', '0', ''),
(118, 'Poststrasse 2', 'Haus', 'Haus', 'Naumburg', '', '', '51.15567437452137', '11.811583610535871', '0', ''),
(119, 'Poststrasse 3', 'Haus', 'Haus', 'Naumburg', '', '', '51.155744171862665', '11.811304515777454', '0', ''),
(120, 'Poststrasse 4', 'Haus', 'Haus', 'Naumburg', '', '', '51.155863924990385', '11.810929403146309', '0', ''),
(121, 'Poststrasse 5', 'Haus', 'Haus', 'Naumburg', '', '', '51.15606068708574', '11.809886222961877', '0', ''),
(122, 'Poststrasse 6', 'Haus', 'Haus', 'Naumburg', '', '', '51.15612118053523', '11.809822877654538', '0', ''),
(123, 'Poststrasse 7', 'Haus', 'Haus', 'Naumburg', '', '', '51.1562999227375', '11.809853723638762', '0', ''),
(124, 'Poststrasse 9', 'Haus', 'Haus', 'Naumburg', '', '', '51.156158142806596', '11.80935451315745', '0', ''),
(125, 'Poststrasse 11', 'Haus', 'Haus', 'Naumburg', '', '', '51.15618431299518', '11.809207525859415', '0', ''),
(126, 'Poststrasse 12', 'Haus', 'Haus', 'Naumburg', '', '', '51.156206914503905', '11.809074763067438', '0', ''),
(127, 'Poststrasse 14', 'Haus', 'Haus', 'Naumburg', '', '', '51.15629315708416', '11.80870871821821', '0', ''),
(128, 'Poststrasse 16', 'Haus', 'Haus', 'Naumburg', '', '', '51.15662671928235', '11.808089092815822', '0', ''),
(129, 'Poststrasse 17', 'Haus', 'Haus', 'Naumburg', '', '', '51.15673791503119', '11.80798895619659', '0', ''),
(130, 'Poststrasse 18', 'Haus', 'Haus', 'Naumburg', '', '', '51.15675953623456', '11.807818231717187', '0', ''),
(131, 'Poststrasse 19', 'Haus', 'Haus', 'Naumburg', '', '', '51.15682285559982', '11.807707424568422', '0', ''),
(132, 'Poststrasse 20', 'Haus', 'Haus', 'Naumburg', '', '', '51.156890293828425', '11.807583485072819', '0', ''),
(133, 'Poststrasse 21', 'Haus', 'Haus', 'Naumburg', '', '', '51.15696751244904', '11.807432459310906', '0', ''),
(134, 'Poststrasse 23', 'Haus', 'Taxi Mamo', 'Naumburg', '', '', '51.15705399748215', '11.807268300965724', '0', ''),
(135, 'Poststrasse 24', 'Haus', 'Haus', 'Naumburg', '', '', '51.15713739344254', '11.807123020493115', '0', ''),
(136, 'Poststrasse 25', 'Haus', 'Haus', 'Naumburg', '', '', '51.157192990576036', '11.807017959013539', '0', ''),
(137, 'Franz-Ludwig-Rasch-Strasse 2', 'Haus', 'Haus', 'Naumburg', '', '', '51.157517083185276', '11.806890366559035', '0', ''),
(138, 'Franz-Ludwig-Rasch-Strasse 4', 'Haus', 'Haus', 'Naumburg', '', '', '51.15766487031153', '11.806890366774788', '0', ''),
(139, 'Franz-Ludwig-Rasch-Strasse 6', 'Haus', 'Haus', 'Naumburg', '', '', '51.157818481056495', '11.806892688457873', '0', ''),
(140, 'Franz-Ludwig-Rasch-Strasse 8', 'Haus', 'Haus', 'Naumburg', '', '', '51.157905114559426', '11.806900814204287', '0', ''),
(141, 'Franz-Ludwig-Rasch-Strasse 12', 'Haus', 'Haus', 'Naumburg', '', '', '51.15804475158699', '11.806950349566902', '0', ''),
(142, 'Michaelstrasse', 'OS', 'Einbahnstrasse', 'Naumburg', '', '', '51.1519821259029', '11.802547511195918', '0', ''),
(143, 'Schulstrasse', 'OS', 'Strasse', 'Naumburg', '', '', '51.150658325545436', '11.80330586337707', '0', ''),
(144, 'Hospitalstrasse', 'OS', 'Strasse', 'Naumburg', '', '', '51.151414858188915', '11.801160173854349', '0', ''),
(145, 'Hospitalstrasse / Schulstrasse', 'Kreuzung', 'Kreuzung: Hospitalstrassse / Schulstrass', 'Naumburg', '', '', '51.1513057291749', '11.801785300343417', '0', ''),
(146, 'Lindenhof', 'OS', 'Strasse', 'Naumburg', '', '', '51.153677252309244', '11.802311081792727', '0', ''),
(147, 'Jaegerstrasse', 'OS', 'Strasse', 'Naumburg', '', '', '51.15807860946037', '11.809681552910087', '1', ''),
(148, 'Rosa-Luxemburg Strasse', 'OS', 'Strasse Graf v. Staufenberg', 'Naumburg', 'Rosa-Luxemburg Strasse', '0', '51.153713909010186', '11.819830391871887', '1', 'geojson/naumburg/rosa_luxemburg_strasse.geojson'),
(149, 'Linsenberg', 'OS', 'Strasse', 'Naumburg', 'Linsenberg', '0', '51.152357563133286', '11.825864215203962', '1', ''),
(150, 'Markt', 'POI', 'Marktplatz', 'Naumburg', 'Markt', '', '51.152583343100765', '11.810016454481104', '1', ''),
(151, 'Markt 1', 'Rathhaus', 'Rathaus Naumburg', 'Naumburg', 'Markt', '1', '51.15267251083614', '11.80936467779985', '', ''),
(152, 'Markt 11', 'Haus', 'Hotel Stadt Aachen', 'Naumburg', 'Markt', '11', '51.153001519840295', '11.810248597381579', '', ''),
(153, 'Markt 13', 'Haus', 'Uhrmacher Meister Carl Prcht', 'Naumburg', 'Markt', '13', '51.1529611144046', '11.809967647981898', '', ''),
(154, 'Markt 14', 'Haus', 'Haus', 'Naumburg', 'Markt', '14', '51.15296909527843', '11.80982418696905', '0', ''),
(155, 'Markt 15', 'Haus', 'Flielman Optiker', 'Naumburg', 'Markt ', '15', '51.15307854147137', '11.8095728871225', '0', ''),
(156, 'Markt 17', 'Haus', 'Schote Kosmetik Gewölbe', 'Naumburg', 'Markt', '17', '51.15304939574131', '11.809333914064563', '0', ''),
(157, 'Markt 18', 'Haus', 'Haus', 'Naumburg', 'Marjt', '18', '51.15311958405186', '11.80916321932159', '0', ''),
(158, 'Markt 19', 'Haus', 'M&N Moden Naumburg Gmbh', 'Naumburg', 'Markt', '19', '51.15300278438002', '11.809090799694413', '0', ''),
(159, 'Markt 2', 'Haus', 'Löwen Apotheke', 'Naumburg', 'Markt', '2', '51.15242506954998', '11.809425226043397', '0', ''),
(160, 'Markt 3', 'Haus', 'Haus', 'Naumburg', 'Markt', '3', '51.15225009786129', '11.809397733248248', '0', ''),
(161, 'Markt 4', 'Haus', 'Restorante', 'Naumburg', 'Markt', '4', '51.15214452565109', '11.809397733425191', '0', ''),
(162, 'Markt 5', 'Haus', 'Haus', 'Naumburg', 'Markt', '5', '51.15208227588227', '11.80938767515947', '0', ''),
(163, 'markt 6', 'Schloesschen', 'Touristen Information', 'Naumburg', 'Markt', '6', '51.15214704911408', '11.809851026770133', '0', ''),
(164, 'Markt 7', 'Haus', 'Amtsgericht Naumburg', 'Naumburg', 'Markt', '7', '51.15216531093162', '11.810192050748492', '0', ''),
(165, 'Markt 10', 'Haus', 'Haus', 'Naumburg', 'Markt', '10', '51.15253357931604', '11.810481662300123', '0', ''),
(166, 'Marienstrasse', 'OS', 'Strasse', 'Naumburg', 'Marientstrasse', '0', '51.15286884140451', '11.811975777326325', '0', ''),
(167, 'Mariengasse', 'Gasse', 'Gasse', 'Naumburg', 'Mariengasse', '0', '51.153157165451745', '11.810483484896595', '0', ''),
(168, 'Wendenplan', 'Gasse', 'Gasse', 'Naumburg', 'Wendenplan', '0', '51.15368080933097', '11.811467620353037', '0', ''),
(169, 'Fischgasse', 'Gasse', 'Gasse', 'Naumburg', 'Fischgasse', '0', '51.15403879716405', '11.810341429138504', '0', ''),
(170, 'Mühlgasse', 'Gasse', 'Gasse', 'Naumburg', 'Mühlgasse', '0', '51.153596233681704', '11.80937728032778', '0', ''),
(171, 'Rosengarten', 'Gasse', 'Gasse', 'Naumburg', 'Rosengarten', '0', '51.15384996788577', '11.808847069007834', '0', ''),
(172, 'Herrenstrasse', 'OS', 'Gasse', 'Naumburg', 'Herrenstrasse', '0', '51.15309310376757', '11.80826504650249', '0', ''),
(173, 'Reussenplatz', 'OS', 'Strasse', 'Naumburg', 'Reussenplatz', '0', '51.152630479610444', '11.807550101870044', '0', ''),
(174, 'Badergasse', 'Gasse', 'Gasse', 'Naumburg', 'Badergasse', '0', '51.15276654765619', '11.808241153594556', '0', ''),
(175, 'Engelgasse', 'Gasse', 'Gasse', 'Naumburg', 'Engelgasse', '0', '51.152426544033005', '11.8086501777408', '0', ''),
(176, 'Rittergasse', 'Gasse', 'Gasse', 'Naumburg', 'Rittergasse', '0', '51.15246777711078', '11.809062133125025', '0', ''),
(177, 'Schulgasse', 'Gasse', 'Gasse', 'Naumburg', 'Schulgasse', '0', '51.152746791210326', '11.809020497888843', '0', ''),
(178, 'Jakobsstrasse', 'Strasse', 'Strasse', 'naumburg', 'Jakobsstrasse', '0', '51.15225031712705', '11.811951483605547', '0', ''),
(179, 'Holzmarkt', 'POI', 'Marktplatz', 'Naumburg', 'Holzmarkt', '0', '51.151909151538675', '11.812744634468665', '0', ''),
(180, 'Stadtkirche St.Wenzel', 'POI', 'Kriche', 'Naumburg', 'Topfmarkt', '18', '51.15180470142134', '11.80969100326612', '0', ''),
(181, 'Kirchturm St.Wenzel', 'POI', 'Kirchturm der Stadkirche St.Wenzel', 'Naumburg', 'Topfmarkt', '18', '51.1519248075739', '11.809672015880862', '0', ''),
(182, 'Marienmauer', 'OS', 'Strasse', 'Naumburg', 'Marienmauer', '0', '51.15351628849167', '11.81350503315452', '0', ''),
(183, 'Curt-Becker Platz', 'POI', 'Platz/Theaterplatz', 'Naumburg', 'Weißenfelser Strasse', '4', '51.15182079653411', '11.81456263357868', '0', ''),
(184, 'Naumburger Strassenbahn - Depot', 'POI', 'Depot für Strassenbahnen', 'Naumburg', 'Poststrasse', '5', '51.1556895867039', '11.81267554573424', '0', ''),
(185, 'Naumburger Strassenbahn - Haltestelle Poststrasse', 'POI', 'Haltestelle der Naumburger Strassenbahn', 'Naumburg', 'Poststrasse', '3', '51.15554378933672', '11.8118064791084', '0', ''),
(186, 'Naumburger Strassenbahn - Haltestelle Friedrich-Rasch Str', 'POI', 'Haltestelle der Naumburger Strassenbahn ', 'Naumburg', 'Friedrich-Rasch Strasse', '0', '51.15762764142063', '11.80669947902055', '0', ''),
(187, 'Jaegerspielplatz', 'POI', 'Kinderspielplatz \"Jägerspielplatz\"', 'Naumburg', '', '', '51.15750158806464', '11.806379163867575', '0', ''),
(188, 'Naumburger Strassenbahn - Haltestelle Jaegerstrasse', 'POI', 'Haltestelle Jaegerstrasse der Naumburger Strassenbahn', 'Naumburg', 'Jaegerstrasse', '', '51.15846393893542', '11.804057925374359', '0', ''),
(189, 'Naumburger Strassenbahn - Haltestelle Bahnhofsstrasse', 'POI', 'Haltestelle Bahnhofstrasse der Naumburger Strassenbahn', 'Naumburg', 'Bahnhofsstrasse', '', '51.160819760204646', '11.800248133184791', '0', ''),
(190, 'Naumburger Strassenbahn - Haltestelle Aachener Platz', 'POI', 'Halteestelle Aachener Platz der Naumburger Strassenbahn', 'Naumburg', '', '', '51.16261338247344', '11.797304050088425', '0', ''),
(191, 'Hauptbahnhof Naumburg', 'POI', '', 'Naumburg', '', '', '51.16274299308417', '11.796756102004826', '0', ''),
(192, 'Hauptbahnhof Naumburg - Gleis 1', 'POI', '', 'Naumburg', '', '', '51.162817770616094', '11.796672439494472', '0', ''),
(193, 'Hauptbahnhof Naumburg - Gleis 2', 'POI', '', 'Naumburg', '', '', '51.162902782769095,', '11.79660864534311', '0', ''),
(194, 'Hauptbahnhof Naumburg - Gleis 3', 'POI', '', 'Naumburg', '', '', '51.16292778631735', '11.796576748243877', '0', ''),
(195, 'Hauptbahnhof Naumburg - Gleis 4', 'POI', '', '', '', '', '51.16298929496073', '11.796412478275316', '0', ''),
(196, 'Hauptbahnhof Naumburg - Gleis 5', 'POI', '', 'Naumburg', '', '', '51.16303730178906', '11.79637260665906', '0', ''),
(197, 'Busbahnhof Naumburg', 'POI', '', 'Naumburg', '', '', '51.15637413542872,', '11.815303053998228', '0', ''),
(198, 'Naumburger Strassenbahn - Haltestelle Marientor', 'POI', '', 'Naumburg', '', '', '51.15478642717004', '11.813579148712225', '0', ''),
(199, 'Naumburger Strassenbahn - Haltestelle Curt-Becker Platz', 'POI', '', 'Naumburg', '', '', '51.15203732497759', '11.81416466568351', '0', ''),
(200, 'Naumburger Strassenbahn - Haltestelle Vogelwiese', 'POI', '', 'Naumburg', '', '', '51.14960389286216', '11.813222195447947', '0', ''),
(201, 'Naumburger Strassenbahn - Haltestelle Salztor', 'POI', '', 'Naumburg', '', '', '51.149718700388306', '11.806638543276962', '0', ''),
(202, 'Salztor', 'POI', 'Kreuzung', 'Naumburg', '', '', '51.149969540948796', '11.804996534912982', '0', ''),
(203, 'Naumburger Dom - Kreuzgang', 'POI', 'Kirche', 'Naumburg', '', '', '51.15446125409267', '11.803888253007857', '0', ''),
(204, 'Naumburger Dom - Schatzkammer', 'POI', '', 'Naumburg', '', '', '51.15448143353467', '11.803529942280102', '0', ''),
(205, 'Naumburger Dom - Ostflügel', 'POI', '', 'Naumburg', '', '', '51.15471993229184', '11.80458732077926', '0', ''),
(206, 'Naumburger Dom - Westflügel', 'POI', '', 'Naumburg', '', '', '51.154765796899845', '11.80338954481972', '0', ''),
(207, 'Naumburger Dom - Nord-Ost Turm', 'POI', '', 'Naumburg', '', '', '51.15483273760648', '11.804243914424767', '0', ''),
(208, 'Naumburger Dom - Süd-Ost Turm', 'POI', '', 'Naumburg', '', '', '51.154649023988355', '11.804224283195044', '0', ''),
(209, 'Naumburger Dom - Nord-West Turm', 'POI', '', 'Naumburg', '', '', '51.15487348628562', '11.803583758239164', '0', ''),
(210, 'Naumburger Dom - Süd-Ost Turm', 'POI', '', 'Naumburg', '', '', '51.15465215599547', '11.803600009180249', '0', ''),
(211, 'Naumburger Dom - Marienkapelle', 'POI', '', 'Naumburg', '', '', '51.154275238773636', '11.803872509863996', '0', ''),
(212, 'Naumbuger Dom - Brunnen', 'POI', '', 'Naumburg', '', '', '51.15447758174172', '11.804686100133171', '0', ''),
(213, 'Domgymnasium Naumburg - Sekretariat', 'POI', '', 'Naumburg', 'Thomas Muentzer Strasse ', '', '51.1563334769646', '11.812457406949948', '0', ''),
(214, 'Domgymnasium Naumburg - Grünes Klassenzimmer', 'POI', '', 'Naumburg', 'Thomas Muentzer Strasse', '22/23', '51.156642773700455', '11.812284703196111', '0', ''),
(215, 'Domgymnasium Naumburg - Marienturnhalle', 'POI', '', 'Naumburg', 'Thomas Muentzer Strasse ', '22/23', '51.15675843444583', '11.811834125015134', '0', ''),
(216, 'Domgymnasium Naumburg - Weitsprunggrube', 'POI', '', 'Naumburg', 'Thomas Muentzer Strasse', '22/23', '51.15658953112967', '11.811950202558961', '0', ''),
(217, 'Domgymnasium Naumburg - Sprintstrecke', 'POI', '', 'Naumburg', 'Thomas Muentzer Strasse ', '22/23', '51.156344911696166', '11.81209413839437', '0', ''),
(218, 'Domgymnasium Naumburg - Lehrerzimmer', 'POI', '', 'Naumburg', 'Thomas Muentzer Strasse', '22/23', '51.15644683560535', '11.812556126535513', '0', ''),
(219, 'Domgymnasium Naumburg - 0.07', 'POI', '', 'Naumburg', 'Thomas Muentzer Strasse ', '22/23', '51.15645411654455', '11.812388974940303', '0', ''),
(220, 'Domgymnasium Naumburg - Lehrerzimmer Marienhaus', 'POI', '', 'Naumburg', 'Thomas Muentzer Strasse', '22/23', '51.1559474031562', '11.81193859427021', '0', ''),
(221, 'Domgymnasium Naumburg - Marienhaus', 'POI', '', 'Naumburg', 'Thomas Muentzer Strasse ', '22/23', '51.15577267409877', '11.812108066587259', '0', ''),
(222, 'Domgymnasium Naumburg - Fahrradstaender', 'POI', '', 'Naumburg', 'Thomas Muentzer Strasse', '22/23', '51.15647741381094', '11.811745905761192', '0', ''),
(223, 'Sekundarschule Humboldschule Naumburg', 'POI', '', 'Naumburg', 'Weissenfelser Strasse', '3', '51.15128718014744', '11.814916108210511', '0', ''),
(224, 'Grundschule Georgensschule Naumburg', 'POI', '', 'Naumburg', 'Georgenmauer', '16a', '51.15632017147166', '11.805424563673233', '0', ''),
(225, 'Almerstrasse', 'Strasse', 'Nähe Klingerplatz', 'Naumburg', 'Almerstrasse', '0', '51.1611980252887', '11.810140055949473', '1', 'geojson/naumburg/almerstrasse.geojson'),
(226, 'Barbarastrasse', 'Strasse', '', 'Naumburg', 'Barbarastrasse', '0', '51.158466439479554, ', '51.158466439479554', '1', 'geojson/naumburg/barbarastrasse.geojson'),
(227, 'Barbaraplatz', 'POI', '', 'Naumburg', '', '', '51.15774309056951, 1', '51.15774309056951, 1', '0', ''),
(228, 'Blumenstrasse', 'Strasse', '', 'Naumburg', 'Blumenstrasse', '0', '51.1572716073768', '11.80866442789187', '1', 'geojson/naumburg/blumenstrasse.geojson'),
(229, 'Burgstrasse', 'Strasse', '', 'Naumburg', 'Burgstrasse', '0', '51.15523382528523290', '11.816698906122909', '1', 'geojson/naumburg/burgstrasse.geojson'),
(230, 'Gartenstrasse', 'Strasse', '', 'naumburg', 'Gartenstrasse', '0', '51.156979608342496', '11.8106340581314', '1', 'geojson/naumburg/gartenstrasse.geojson'),
(231, 'Hinter der Post', 'OS', '', 'Naumburg', 'Hinter der Post', '0', '51.15625349456098', '11.813626569065459', '1', 'geojson/naumburg/hinter_der_post.geojson'),
(232, 'Kuglerstrasse', 'OS', '', 'Naumburg', 'Kuglerstrasse', '0', '51.16137798393388', '11.809220740401484', '1', 'geojson/naumburg/kuglerstrasse.geojson'),
(233, 'Kuglerstrasse', 'OS', 'Merhfamielnhaus', 'Naumburg', 'Kuglerstrasse', '0', '51.16029577796212', '11.80935152242458', '0', ''),
(234, 'Lerchenweg', 'OS', '', 'Namuburg', 'Lerchenweg', '0', '51.161225245010456', '11.806891446090198', '1', 'geojson/naumburg/lerchenweg.geojson'),
(235, 'Max-Klinger Platz', 'OS', '', 'Naumburg', 'Max-Klinger Platz', '0', '51.162003125852294', '11.809770493869655', '1', 'geojson/naumburg/max_klinger_platz.geojson'),
(236, 'Klingerplatz', 'POI', '', 'Naumburg', 'Max-Klinger Platz', '0', '51.16166269708955', '11.809857092326633', '0', ''),
(237, 'Nordstrasse', 'OS', 'FFW NMB, PR NMB', 'Naumburg', 'Nordstrasse', '0', '51.16002454458234', '11.80569652468741', '1', 'geojson/naumburg/nordstrasse.geojson'),
(238, 'Oststrasse', 'OS', '', 'Naumburg', 'oststrasse', '0', '51.15836998312332', '11.820285569072682', '1', 'geojson/naumburg/oststrasse.geojson'),
(239, 'Poststrasse', 'OS', '', 'Naumburg', 'Poststrasse', '0', '51.155571944232', '11.811974277481411', '1', 'geojson/naumburg/poststrasse.geojson'),
(240, 'Siedlungsstrasse', 'OS', '', 'Naumburg', 'Sieldungsstrasse', '0', '51.16213709835246', '11.81272385574493', '1', 'geojson/naumburg/siedlungsstrasse.geojson'),
(241, 'Spechsart', 'OS', '', 'Naumburg', 'Spechsart', '0', '51.16137513908029', '11.80615064092759', '1', 'geojson/naumburg/spechsart.geojson'),
(242, 'Taborer Strasse', 'OS', '', 'Naumburg', 'Taborer Strasse', '0', '51.159263253720994', '11.808788579635342', '1', 'geojson/naumburg/taborer_strasse.geojson'),
(243, 'Kuglerstrasse 3', 'Haus', '', 'Naumburg', 'Kuglerstrasse', '3', '51.16056320306902', '11.809584642408074', '0', '0'),
(244, 'Kuglerstrasse 5', 'Haus', '', 'Naumburg', 'Kuglerstrasse', '5', '51.16040720903496', '11.80951387395787', '0', '0'),
(245, 'Kuglerstrasse 7', 'Haus', '', 'Naumburg', 'Kuglerstrasse', '7', '51.16026338715926', '11.809452182879873', '0', '0'),
(246, 'Kuglerstrasse 1', 'Haus', '', 'Naumburg', 'Kuglerstrasse', '1', '51.16127436894384', '11.809252220013867', '0', '0'),
(247, 'Kuglerstrasse 2', 'Haus', '', 'Naumburg', 'Kuglerstrasse', '2', '51.161598988713266', '11.809216554942427', '0', '0'),
(248, 'Kuglerstrasse 4', 'Haus', '', 'Naumburg', 'Kulgerstrasse', '4', '51.16149361140379', '11.809146635678495', '0', '0'),
(249, 'Kuglerstrasse 6', 'Haus', '', 'Naumburg', 'Kuglerstrasse', '6', '51.161399551261404', '11.80905462801804', '0', '0'),
(250, 'Kuglerstrasse 8', 'Haus', '', 'Naumburg', 'Kuglerstrasse', '8', '51.16126372220099', '11.808980867350616', '0', '0'),
(251, 'Kuglerstrasse 9', 'Haus', '', 'Naumburg', 'Kuglerstrasse', '9', '51.16084843006715', '11.808797584494744', '0', '0'),
(252, 'Lerchenweg 1', 'Haus', '', 'Naumburg', 'Lerchenweg', '1', '51.16116129139952', '11.807044304207565', '0', '0'),
(253, 'Lerchenweg 2', 'Haus', '', 'Naumburg', 'Lerchenweg', '2', '51.16131056373766', '11.806897317072115', '0', '0'),
(254, 'Lerchenweg 4', 'Haus', '', 'Naumburg', 'Lerchenweg', '4', '51.16126477124509', '11.807114478726099', '0', '0'),
(255, 'Spechsart 1', 'Haus', '', 'Naumburg', 'Spechsart', '1', '51.158936259884385', '11.802657787627428', '0', '0'),
(256, 'Spechsart 3', 'Haus', '', 'Naumburg', 'Spechsart', '3', '51.15931016424617', '11.80265259364529', '0', '0'),
(257, 'Spechsart 4', 'Haus', '', 'Naumburg', 'Spechsart', '4', '51.159137005834644', '11.80181202842305', '0', '0'),
(258, 'Spechsart 5', 'Haus', '', 'Naumburg', 'Spechsart', '5', '51.15951612265738', '11.802801619316165', '0', '0'),
(259, 'Spechsart 6', 'Haus', '', 'Naumburg', 'Spechsart', '6', '51.15917804627495', '11.801678842683732', '0', '0'),
(260, 'Spechsart 7', 'Haus', '', 'Naumburg', 'Spechsart', '7', '51.159654752953465', '11.802731928932607', '0', '0'),
(261, 'Spechsart 9', 'Haus', '', 'Naumburg', 'Spechsart', '9', '51.15978083578954', '11.802684513627481', '0', '0'),
(262, 'Spechsart 10', 'Haus', '', 'Naumburg', 'Spechsart', '10', '51.15950539217615', '11.801412720749553', '0', '0'),
(263, 'Spechsart 14', 'Haus', '', 'Naumburg', 'Spechsart', '14', '51.15964988449129', '11.802225318632042', '0', '0'),
(264, 'Spechsart 16', 'Haus', '', 'Naumburg', 'Spechsart', '16', '51.15992859299441', '11.802182005667781', '0', '0'),
(265, 'Spechsart 18', 'Haus', '', 'Naumburg', 'Spechsart', '18', '51.1600396163582', '11.802234635609228', '0', '0'),
(266, 'Spechsart 18a', 'Haus', '', 'Naumburg', 'Spechsart', '18a', '51.16005561946394', '11.802051226951994', '0', '0'),
(267, 'Spechsart 16a', 'Haus', '', 'Naumburg', 'Spechsart', '16a', '51.1599455962126', '11.801997002574565', '0', '0'),
(268, 'Spechsart 20', 'Haus', '', 'Naumburg', 'Spechsart', '20', '51.160023612733234', '11.802521709103992', '0', '0'),
(269, 'Spechsart 22', 'Haus', '', 'Naumburg', 'Spechsart', '22', '51.160023612733234', '11.802521709103992', '0', '0'),
(270, 'Spechsart 11', 'Haus', '', 'Naumburg', 'Spechsart', '11', '51.16018664618333', '11.803244176561888', '0', '0'),
(271, 'Spechsart 12', 'Haus', '', 'Naumburg', 'Spechsart', '12', '51.160283665636335', '11.803397282578095', '0', '0'),
(272, 'Spechsart 13', 'Haus', '', 'Naumburg', 'Spechsart', '13', '51.160327674546835', '11.803464265803491', '0', '0'),
(273, 'Spechsart 14', 'Haus', '', 'Naumburg', 'Spechsart', '14', '51.16035367985595', '11.803523275321442', '0', '0'),
(274, 'Spechsart 15', 'Haus', '', 'Naumburg', 'Spechsart', '15', '51.160394688170314', ' 11.803610992293056', '0', '0'),
(275, 'Spechsart 24a', 'Haus', '', 'Naumburg', 'Spechsart', '24a', '51.16038255352653', '51.16038255352653', '0', '0'),
(276, 'Spechsart 28', 'Haus', '', 'Naumburg', 'Spechsart', '28', '51.16063649902925', '11.803428852126709', '0', '0'),
(277, 'Spechsart 19', 'Haus', '', 'Naumburg', 'Spechsart', '19', '51.16056206808291', '11.803773146148488', '0', '0'),
(278, 'Spechsart 21', 'Haus', '', 'Naumburg', 'Spechsart', '21', '51.16071305800213', '11.80396358264399', '0', '0'),
(279, 'Spechsart 23', 'Haus', '', 'Naumburg', 'Spechsart', '23', '51.16082904580283', '11.804119209237586', '0', '0'),
(280, 'Spechsart 25', 'Haus', '', 'Naumburg', 'Spechsart', '25', '51.160995323916296', '11.804314460629143', '0', '0'),
(281, 'Spechsart 27', 'Haus', '', 'Naumburg', 'Spechsart', '27', '51.16110213746757', '11.804491486452655', '0', '0'),
(282, 'Spechsart 29', 'Haus', '', 'Naumburg', 'Spechsart', '29', '51.161192550341596', '11.804604139353275', '0', '0'),
(283, 'Spechsart 31', 'Haus', '', 'Naumburg', 'Spechsart', '31', '51.16127843835187', '11.804706047049882', '0', '0'),
(284, 'Spechsart 33a', 'Haus', '', 'Naumburg', 'Spechsart', '33a', '51.161371793264045', '11.804815436866278', '0', '0'),
(285, 'Spechsart 33b', 'Haus', '', 'Naumburg', 'Spechsart', '33b', '51.1614877790924', '11.805114285247205', '0', '0'),
(286, 'Parkplatz Spechsart', 'POI', '', 'Naumbrug', 'Spechsart', '0', '51.16126116425123', '11.80566064648691', '0', '0'),
(287, 'Spechsart  26', 'Haus', '', 'Naumburg', 'Spechsart', '26', '51.160856946087094', '11.80372410696599', '0', '0'),
(288, 'Spechsart 34', 'Haus', '', 'Naumburg', 'Spechsart', '34', '51.16115662427299', '11.80403781242298', '0', '0'),
(289, 'Spechsart 34a', 'Haus', '', 'Naumburg', 'Spechsart', '34a', '51.16126764269742', '11.80419203934352', '0', '0'),
(290, 'Spechsart 36', 'Haus', '', 'Naumburg', 'Spechsart', '36', '51.161522885140066', '11.804546289593185', '0', '0'),
(291, 'Spechsart 38', 'Haus', 'Domglas Naumburg', 'Naumburg', 'Spechsart', '38', '51.161602784144655', '11.804658942395836', '0', '0'),
(292, 'Spechsart 40', 'Haus', '', 'Naumburg', 'Spechsart', '40', '51.16166670326184', '11.804909728913035', '0', '0'),
(293, 'Spechsart 42a', 'Haus', '', 'Naumburg', 'Spechsart', '42a', '51.1617407004771', '11.80519217869851', '0', '0'),
(294, 'Spechsart 42b', 'Haus', '', 'Naumburg', 'Spechsart ', '42b', '51.16176191725033', '11.805578990121694', '0', '0'),
(295, 'Spechsart 42', 'Haus', '', 'Naumburg', 'Spechsart', '42', '51.161771906379414', '11.805929653520288', '0', '0'),
(296, 'Spechsart 44', 'Haus', 'Droese Touristik GmbH', 'Naumburg', 'Spechsart', '44', '51.16205704552079', '11.806328578239244', '0', '0'),
(297, 'Spechsart 46', 'Haus', '', 'Naumburg', 'Spechsart', '46', '51.162441912290426', '11.806895400905955', '0', '0'),
(298, 'Spechsart 48', 'Haus', '', 'Naumbur', 'Spechsart', '48', '51.16263079614363', '11.80693392461517', '0', '0'),
(299, 'Spechsart 50', 'Haus', '', 'Naumburg', 'Spechsart', '50', '51.16279136296332', '11.806989874551288', '0', '0'),
(300, 'Spechsart 52', 'Haus', '', 'Naumburg', 'Spechsart', '52', '51.16309958873461', '11.806997057578112', '0', '0'),
(301, 'Spechsart 52a', 'Naumburg', '', 'Naumburg', 'Spechsart', '52a', '51.16322784317832', '11.807143908557876', '0', '0'),
(302, 'Spechsart 54', 'Haus', '', 'Naumburg', 'Spechsart', '54', '51.16334053863808', '11.807243820818009', '0', '0'),
(303, 'Spechsart 58', 'Haus', '', 'Naumburg', 'Spechsart', '58', '51.163575571526515', '11.807356684232442', '0', '0'),
(304, 'Spechsart 56', 'Haus', '', 'Naumburg', 'Spechsart', '56', '51.16365169046942', '11.807426858950043', '0', '0'),
(305, 'Spechsart 60', 'Haus', '', 'Naumburg', 'Spechsart', '60', '51.1638675255062', '11.80745312980219', '0', '0'),
(306, 'Spechsart 60a', 'Haus', '', 'Naumburg', 'Spechsart', '60a', '51.16394703521833', '11.807433194240014', '0', '0'),
(307, 'Spechsasrt 58a', 'Haus', '', 'Naumburg', 'Spechsart', '58a', '51.16428915598982', '11.806697881670273', '0', '0'),
(308, 'Spechsart 58b', 'Haus', '', 'Naumburg', 'Spechsart', '58b', '51.16421065808356', '11.806680965808894', '0', '0'),
(309, 'Spechsart 62', 'Haus', '', 'Naumburg', 'Spechsart', '62', '51.16426683240966', '11.807259424067063', '0', '0'),
(310, 'Spechsart 62a', 'Haus', '', 'Naumburg', 'Spechsart', '62a', '51.16445494411784', '11.807279723261091', '0', '0'),
(311, 'Spechsart 64', 'Haus', '', 'Naumburg', 'Spechsart', '64', '51.164606988617514', '11.8072278475607', '0', '0'),
(312, 'Spechsart 64a', 'Haus', '', 'Naumburg', 'Spechsart', '64a', '51.16477184282262', '11.807297656774974', '0', '0'),
(313, 'Spechsart 64b', 'Haus', '', 'Naumburg', 'Spechsart', '64b', '51.16486603291419', '11.807266811287567', '0', '0'),
(314, 'Spechsart 66', 'Haus', '', 'Naumburg', 'Spechsart', '66', '51.164946767088054', '11.80722791928088', '0', '0'),
(315, 'Spechsart 68', 'Haus', '', 'Naumburg', 'Spechsart', '68', '51.165045161715476', '11.807358006523923', '0', '0'),
(316, 'Spechsart 70', 'Haus', '', 'Naumburg', 'Spechsart', '70', '51.165225971726294', '11.807418356146163', '0', '0'),
(317, 'Spechsart 72', 'Haus', '', 'Naumburg', 'Spechsart', '72', '51.165389961674705', '11.80747334150624', '0', '0'),
(318, 'Spechsart 75', 'Haus', '', 'Naumburg', 'Spechsart', '75', '51.165359686584154', '11.80784616859345', '0', '0'),
(319, 'Spechsart 73', 'Haus', '', 'Naumburg', 'Spechsart', '73', '51.16529156778082', '11.807819346461354', '0', '0'),
(320, 'Spechsart 71', 'Haus', '', 'Naumburg', 'Spechsart', '71', '51.16502329628247', '11.807756314580725', '0', '0'),
(321, 'Spechsart 69', 'Haus', '', 'Naumburg', 'Spechsart', '69', '51.16495433594178', '11.807733516044125', '0', '0'),
(322, 'Spechsart 67', 'Haus', '', 'Naumburg', 'Spechsart', '67', '51.16474913627006', '11.807639638461945', '0', '0'),
(323, 'Spechsart 65', 'Haus', '', 'Naumburg', 'Spechsart', '65', '51.16449011252881', '11.807608793077044', '0', '0'),
(324, 'Spechsart 63', 'Haus', '', 'Naumburg', 'Spechsart', '63', '51.16442535633964', '11.807580629833767', '0', '0'),
(325, 'Spechsart 61', 'Haus', '', 'Naumburg', 'Spechsart', '61', '51.163718919136464', '11.807839463069524', '0', '0'),
(326, 'Spechsart 59', 'Haus', '', 'Naumburg', 'Spechsart', '59', '51.16360454276525', '11.80777508980676', '0', '0'),
(327, 'Spechsart 57', 'Haus', '', 'Naumburg', 'Spechsart', '57', '51.1633774708194', '11.80768121270087', '0', '0'),
(328, 'Spechsart 55', 'Haus', '', 'Naumburg', 'Spechsart', '55', '51.16325552439462', '11.807591358669002', '0', '0'),
(329, 'Spechsart 53', 'Haus', '', 'Naumburg', 'Spechsart', '53', '51.16313441859055', '11.807505528023851', '0', '0'),
(330, 'Spechsart 51', 'Haus', '', 'Naumburg', 'Spechsart', '51', '51.16278119156368', '11.807402262981778', '0', '0'),
(332, 'Spechsart 49', 'Haus', '', 'Naumburg', 'Spechsart', '49', '51.162636535969106', '11.807325820060107', '0', '0'),
(333, 'Spechsart 47', 'Haus', '', 'Naumburg', 'Spechsart', '47', '51.162395161789746', '11.8072373071118', '0', '0'),
(334, 'Spechsart 45', 'Haus', '', 'Naumburg', 'Spechsart', '45', '51.16228162300398', '11.807197074632636', '0', '0'),
(335, 'Spechsart 43', 'Haus', '', 'Naumburg', 'Spechsart', '43', '51.16215126323583', '11.807115266613163', '0', '0'),
(336, 'Spechsart 41', 'Haus', '', 'Naumburg', 'Spechsart', '41', '51.16205538557978', '11.807001272722113', '0', '0'),
(337, 'Spechsart 39', 'Haus', '', 'Naumburg', 'Spechsart', '39', '51.16192838950442', '11.806806812584417', '0', '0'),
(338, 'Spechsart 37', 'Haus', '', 'Naumburg', 'Spechsart', '37', '51.16170674744477', '11.806554375847073', '0', '0'),
(339, 'Spechsart 35', 'Haus', '', 'Naumburg', 'Spechsart', '35', '51.16160802647053', '11.806527823399144', '0', '0'),
(340, 'Spechsart 33', 'Haus', '', 'Naumburg', 'Spechsart', '33', '51.16141940887543', '11.806506658087594', '0', '0'),
(341, 'Peter-Paul Strasse 1', 'Haus', '', 'Naumburg', 'peter-Paul Strasse', '1', '51.159926815501535', '11.802823513362863', '0', '0'),
(342, 'Peter-Paul Strasse 2', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '2', '51.16006510413029', '11.803261987023676', '0', '0'),
(343, 'Peter-Paul Strasse 3', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '3', '51.159883019398166', '11.802999461966726', '0', '0'),
(344, 'Peter-Paul Strasse 4', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '4', '51.15997817555193', '11.8035912041724', '0', '0'),
(345, 'Peter-Paul Strasse 5', 'Haus', 'lagerhalle', 'Naumburg', 'Peter-Paul Strasse', '5', '51.15975693681831', '11.803623444889515', '0', '0'),
(346, 'Peter-Paul Strasse 6', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '6', '51.15998174381773', '11.803737242895451', '0', '0'),
(347, 'Peter-Paul Strasse 7', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '7', '51.159657021244605', '11.804171564875809', '0', '0'),
(348, 'Peter-Paul Strasse 8', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '8', '51.15998769167512', '11.803949662451956', '0', '0'),
(349, 'Peter-Paul Strasse 9', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '9', '51.160152576261225', '11.804265676120444', '0', '0'),
(350, 'Peter-Paul Strasse 10', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '10', '51.15994888764039', '11.804362659405752', '0', '0'),
(351, 'Peter-Paul Strasse 11', 'Haus', 'FFW Remise', 'Naumburg', 'Peter-Paul Strasse', '11', '51.16030534229594', '11.804619781939104', '0', '0'),
(352, 'Peter-Paul Strasse 12', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '12', '51.159888063789985', '11.80433108350731', '0', '0'),
(353, 'Peter-Paul Strasse 14', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '14', '51.159851145002996', '11.804503830599922', '0', '0'),
(354, 'Peter-Paul Strasse 16', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '16', '51.159824382108596', '11.804606247276281', '0', '0'),
(355, 'Peter-Paul Strasse 17', 'Haus', 'Namac Maschienenbau Gmbh & Co.\r\nDekra Automobil', 'Naumburg', 'Peter-Paul Strasse', '17', '51.1595301558904', '11.804653525247637', '0', '0'),
(356, 'Peter-Paul Strasse 18', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '18', '51.15978154138046', '11.804903286286672', '0', '0'),
(357, 'Peter-Paul Strasse 22', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '22', '51.159633154611484', '11.80603627067215', '0', '0'),
(358, 'Peter-Paul Strasse 24', 'Haus', '', 'Naumburg', 'Peter-Paul Strasse', '24', '51.1596161804874', '11.806305798085837', '0', '0'),
(359, 'Peter-Paul Strasse 26', 'Haus', 'Autoankauf Naumburg', 'Naumburg', 'Peter-Paul Strasse', '26', '51.15958699820002', '11.806583170303217', '0', '0'),
(360, 'Nordstrasse 1', 'Haus', '', 'Naumburg', 'Nordstrasse', '1', '51.158838067439504', '11.80507205181039', '0', '0'),
(361, 'Nordstrasse 2', 'Haus', '', 'Naumburg', 'Nordstrasse', '2', '51.15898887580033', '11.80519550689781', '0', '0'),
(362, 'Nordstrasse 4', 'Haus', '', 'Naumburg', 'Nordstrasse', '4', '51.15909566061911', '11.80528379560379', '0', '0'),
(363, 'Nordstrasse 6', 'Haus', '', 'Naumburg', 'Nordstrasse', '6', '51.1592096805429', '11.805378642855146', '0', '0'),
(364, 'Nordstrasse 8', 'Haus', '', 'Naumburg', 'Nordstrasse', '8', '51.159304911892995', '11.805487104191332', '0', '0'),
(365, 'Nordstrasse 10', 'Haus', '', 'Naumburg', 'Nordstrasse', '10', '51.159401114873184', '11.805553730601053', '0', '0'),
(366, 'Nordstrasse 14', 'Haus', '', 'Naumburg', 'Nordstrasse', '14', '51.15992978710758', '11.806007358840771', '0', '0'),
(367, 'Nordstrasse 16', 'Haus', '', 'Naumburg', 'Nordstrasse', '16', '51.1600108671868', '11.8060128370864', '0', '0'),
(368, 'Nordstrasse 18', 'Haus', 'Auto- und Motorradhandel Eichhorn', 'Naumburg', 'Nordstrasse', '18', '51.16017976739207', '11.806181658307098', '0', '0'),
(369, 'Nordstrasse 24', 'Haus', '', 'Naumburg', 'Nordstrasse', '24', '51.16063121950752', '11.806317094387849', '0', '0'),
(370, 'Nordstrasse 26', 'Haus', '', 'Naumburg', 'Nordstrasse', '26', '51.16087414879205', '11.80635428096851', '0', '0'),
(371, 'Nordstrasse 28', 'Haus', '', 'Naumburg', 'Nordstrasse', '28', '51.16116274685646', '11.80647513899298', '0', '0'),
(372, 'Nordstrasse 5', 'Haus', 'DEKRA Akademie Naumburg', 'Naumburg', 'Nordstrasse', '5', '51.15910275336161', '11.804845165010478', '0', '0'),
(373, 'Nordstrasse 7', 'Haus', '', 'Naumburg', 'Nordstrasse', '7', '51.159265082183005', '11.805098633513492', '0', '0'),
(374, 'Nordstrasse 9', 'Haus', 'FFW Nmb\r\nKreisfeuerwehrverband BLK eV', 'Naumburg', 'Nordstrasse', '9', '51.15966207240043', '11.805192511074361', '0', '0'),
(375, 'Nordstrasse 11', 'Haus', '', 'Naumburg', 'Nordstrasse', '11', '51.16021249031678', '11.805495493104399', '0', '0'),
(376, 'Nordstrasse 17', 'Haus', 'Polizei-Revier Naumburg', 'Naumburg', 'Nordstrasse', '17', '51.16064466679325', '11.80586055064771', '0', '0'),
(377, 'Taborer Strasse 1', 'Haus', '', 'Naumburg', 'Taborer Strasse', '1', '51.15918438580081', '11.808158235166454', '0', '0'),
(378, 'Taborer Strasse 3', 'Haus', '', 'Naumburg', 'Taborer Strasse', '3', '51.159159152762086', '11.808388904381458', '0', '0'),
(379, 'Taborer Strasse 5', 'Haus', '', 'Naumburg', 'Taborer Strasse', '5', '51.159149058952465', '11.808582022806895', '0', '0'),
(380, 'Taborer Strasse 7', 'Haus', '', 'Naumburg', 'Taborer Strasse', '7', '51.1591240631363', '11.808977258906738', '0', '0'),
(381, 'Taborer Strasse 9', 'Haus', '', 'Naumburg', 'Taborer Strasse', '9', '51.159103875975674', '11.809191834551232', '0', '0'),
(382, 'Taborer Strasse 11', 'Haus', '', 'Naumburg', 'Taborer Strasse', '11', '51.1590937819787', '11.809333990954961', '0', '0'),
(383, 'Taborer Strasse 13', 'Haus', '', 'Naumburg', 'Taborer Strasse', '13', '51.15905173062369', '11.809779241336196', '0', '0'),
(384, 'Taborer Strasse 15', 'Haus', '', 'Naumburg', 'Taborer Strasse', '15', '51.15903154419074', '11.810028685704156', '0', '0'),
(385, 'Taborer Strasse 17', 'Haus', '', 'Naumburg', 'Taborer Strasse', '17', '51.15901303967652', '11.810253993393365', '0', '0'),
(386, 'Taborer Strasse 19', 'Haus', '', 'Naumburg', 'Taborer Strasse', '19', '51.15895247878691', '11.811517310409972', '0', '0'),
(387, 'Taborer Strasse 19a', 'Haus', '', 'Naumburg', 'Taborer Strasse', '19a', '51.15863791368333', '11.811257139836126', '0', '0'),
(388, 'Taborer Strasse 21', 'Haus', '', 'Naumburg', 'Taborer Strasse', '21', '51.15892388623886', '11.81172384521188', '0', '0'),
(389, 'Taborer Strasse 21a', 'Haus', '', 'Naumburg', 'Taborer Strasse', '21a', '51.15863623102278', '11.811544135128354', '0', '0'),
(390, 'Taborer Strasse 23', 'Haus', '', 'Naumburg', 'Taborer Strasse', '23', '51.15892556760511', '11.811957198857616', '0', '0'),
(391, 'Taborer Strasse 23a', 'Haus', '', 'Naumburg', 'Taborer Strasse', '23a', '51.15860763334921', '11.811817720674986', '0', '0'),
(392, 'Taborer Strasse 10', 'Haus', '', 'Naumburg', 'Taborer Strasse', '10', '51.15950214285934', '11.808332742097482', '0', '0'),
(393, 'Taborer Strasse 12', 'Haus', '', 'Naumburg', 'Taborer Strasse', '12', '51.1597074553819', '11.808440271829511', '0', '0');
INSERT INTO `prop_stasse` (`prop_id`, `prop_title`, `prop_art`, `prop_discribtion`, `prop_gemeinde`, `prop_strasse`, `haunu`, `prop_x`, `prop_y`, `prop_modell`, `prop_modell_link`) VALUES
(394, 'Taborer Strasse 14', 'Haus', '', 'Naumburg', 'Taborer Strasse', '14', '51.15981086094548', '11.808514348518177', '0', '0'),
(395, 'Taborer Strasse 16', 'Haus', '', 'Naumburg', 'Taborer Strasse', '16', '51.15994873498156', '11.808574087928005', '0', '0'),
(396, 'Taborer Strasse  18', 'Haus', '', 'Naumburg', 'Taborer Strasse', '18', '51.1600611302179', '11.808631438180708', '0', '0'),
(397, 'Taborer Strasse 20', 'Haus', '', 'Naumburg', 'Taborer Strasse', '20', '51.16015404429766', '11.80866250079289', '0', '0'),
(398, 'Tabroer Strasse 22', 'Haus', '', 'Naumburg', 'Taborer Strasse', '22', '51.15949165312725', '11.809030497507525', '0', '0'),
(399, 'Taborer Strasse 24', 'Haus', '', 'Naumburg', 'Taborer Strasse', '24', '51.15961454057724', '11.809078289025242', '0', ''),
(400, 'Sulzaer Straße', 'OS', '', 'Naumburg', 'Sulzaer Straße', '', '51.11185403585247', '11.699756032561538', '0', '0'),
(401, 'Thüringer Straße', 'OS', '', 'Naumburg', 'Thüringer Straße', '', '51.11653816208966', '11.713262075680388', '0', '0'),
(402, 'Am Burgberg', 'OS', '', 'Saaleck', 'Am Burgberg', '', '51.10916570751302', '11.700552473695367', '0', '0'),
(403, 'Am Saaleck', 'OS', '', 'Saaleck', 'Am Saaleck', '', '51.11264343151306', '11.699271372550326', '0', '0'),
(404, 'Sulzaer Straße 8', 'Kirche', '', 'Saaleck', 'Sulzaer Straße', '8', '51.11215354356506', '11.70029030525849', '0', '0'),
(405, 'Am Saaleck 7', 'Gaststätte', '', 'Saaleck', 'Am Saaleck', '7', '51.11278698063926', '11.699164175844512', '0', '0'),
(406, 'Am Saaleck 18', 'Landhaus', '', 'Saaleck', 'Am Saaleck', '18', '51.11371841030984', '11.699294456696386', '0', '0'),
(407, 'Am Burgberg 2', 'Ferienhaus', '', 'Saaleck', 'Am Burgberg', '2', '51.111679582086566', '11.69963625554397', '0', '0'),
(408, 'Bergstraße', 'OS', '', 'Saaleck', 'Bergstraße', '', '51.121541679025', '11.704227535390132', '0', '0'),
(409, 'Bergstraße 6', 'Gaststätte', '', 'Saaleck', 'Bergstraße', '6', '51.11809797036546', '11.697516402674133', '0', '0'),
(410, 'Bahnhof Roßbach', 'POI', '', 'Naumburg-Roßbach', 'Weinstrasse', '', '51.17054842719457', '11.77953871055666', '0', ''),
(411, 'Parkplatz Weinmeile', 'POI', '', 'Naumburg-Roßbach', 'Weinstrasse', '', '51.16790174051776', '11.778769302597343', '0', ''),
(412, 'WeMe - Stand 37', 'POI_WeMe', '', 'Naumburg-Roßbach', 'Weinstrasse', '7', '51.16880609312954', '11.7799865409602', '0', ''),
(413, 'WeMe Stand 36', 'POI_WeMe', '', 'Naumburg-Roßbach', 'Dr:Friedrich-Röhr-Straße', '31', '51.16880373873044', '11.77837322463031', '0', ''),
(414, 'WeMe - Stand 35', 'POI_WeMe', '', 'Naumburg-Roßbach', 'Dr.Friedrich-Röhr Strasse', '30', '51.16913239866858', '11.778161319440276', '0', ''),
(415, 'WeMe Stand 34', 'POI_WeMe', '', 'Naumburg-Roßbach', 'Dr:Friedrich-Röhr-Straße', '23', '51.170195421005495', '11.777266631185675', '0', ''),
(416, 'WeMe - Stand 33', 'POI_WeMe', '', 'Naumburg-Roßbach', 'Dr.Friedrich-Röhr Strasse', '', '51.17040390929643', '11.777173081930918', '0', ''),
(417, 'WeMe Stand 31', 'POI_WeMe', '', 'Naumburg-Roßbach', 'Dr:Friedrich-Röhr-Straße', '', '51.170529305347905', '11.77707899362205', '0', ''),
(418, 'WeMe - Stand 32', 'POI_WeMe', '', 'Naumburg-Roßbach', 'Dr.Friedrich-Röhr Strasse', '', '51.170499606916266', '11.776781280179028', '0', ''),
(419, 'WeMe Stand 30', 'POI_WeMe', 'Herzer', 'Naumburg-Roßbach', 'Dr:Friedrich-Röhr-Straße', '', '51.170979504430974', '11.776796553473087', '0', ''),
(420, 'WeMe - Stand 29', 'POI_WeMe', '', 'Naumburg-Roßbach', 'Dr.Friedrich-Röhr Strasse', '', '51.17081900218641', '11.775738506003343', '0', ''),
(421, 'Kirche St.Elisabeth', 'POI', '', 'Naumburg-Roßbach', 'Am Leihdenberg', '8', '51.17131077154123', '11.776925630964538', '0', ''),
(422, 'WeMe - Stand 28', 'POI_WeMe', '', 'Naumburg-Roßbach', 'Weinberge', '', '51.168895096461966', '11.776009530004188', '0', ''),
(423, 'WeMe Stand 27', 'POI_WeMe', '', 'Naumburg-Roßbach', 'Weinberge', '', '51.16798136693185', '11.77483454101029', '0', ''),
(424, 'WeMe - Stand 26', 'POI_WeMe', 'Weinausschank Profes. Wartenberg & Sauer', 'Naumburg-Roßbach', 'Weinberge', '64', '51.16523503569492', '11.773834373969501', '0', ''),
(425, 'WeMe Stand 25', 'POI_WeMe', 'Weinhaus \"Luisemberg\" - Familie Weigel', 'Naumburg-Roßbach', 'Weinberge', '69', '51.163614206525835, ', '51.163614206525835, ', '0', ''),
(426, 'WeMe - Stand 24', 'POI_WeMe', 'Familie Dams', 'Naumburg-Roßbach', 'Weinberge', '71', '51.16286065334385', '11.771133833717743', '0', ''),
(427, 'WeMe - Stand 23', 'POI_WeMe', 'Weinausschank Eichhorn \"Zum Eulengeschrei\"', 'Naumburg-Roßbach', 'Weinberge', '72', '51.16250002559913', '11.77041835420031', '0', ''),
(428, 'WeMe - Stand 22', 'POI_WeMe', '\"Der Steinmeister\"', 'Naumburg-Roßbach', 'Weinberge', '75', '51.16057332959352', '11.768536813307787', '0', ''),
(429, 'WeMe - stand 21', 'POI_WeMe', 'Steinmeister Gästehaus', 'Naumburg-Roßbach', 'Weinberge', '1', '51.16020408387733', '11.767093717215705', '0', ''),
(430, 'WeMe - Stand 20', 'POI_WeMe', 'Weingut Hay', 'Naumburg-Roßbach', 'Weinberge', '14', '51.15660066033067', '11.759320358189811', '0', ''),
(431, 'WeMe - stand 9', 'POI_WeMe', 'Weingut Seeliger', 'Naumburg-Roßbach', 'Weinberge', '3', '51.158476955914765', '11.762820918088025', '0', ''),
(432, 'WeMe - Stand 18', 'POI_WeMe', 'Familie Durchstecher/Borkmann', 'Naumburg-Roßbach', 'Weinberge', '7c', '51.158476955914765', '11.762820918088025', '0', ''),
(433, '', '', '', '', '', '', '', '', '', ''),
(434, 'RW: Akkon Naumburg', 'Rettungswache', 'Regelrettungsdienst', 'Naumburg', '', '', '51.16028896555468', '11.796554824445785', '', ''),
(435, 'RW: Rot Kreuz Naumburg ', 'Rettungswache', '', 'Naumburg', '', '', '51.15800653431239', '11.809298125421108', '', ''),
(436, 'RW: Rot Kreuz Weißenfels', 'Katastropenschutz', '', 'Weißenfels', 'Leopold Kell Straße', '27', '51.20114325303936', '11.961155745629982', '', ''),
(437, 'RW: Johannes Weißenfels', 'Rettungsdienst', '', 'Weissenfels', 'Rudolf Diesel Straße', '22-24', '51.18699731174242', '11.981367523918204', '', ''),
(438, 'RW: Rot Kreuz Zeitz', 'Rettungswache', '', 'Zeitz', 'Greußnitzer Straße', '61', '51.04037065290725', '12.152886689326309', '', ''),
(439, 'UHS', 'POI_WEME', '', 'Naumburg-Roßbach', '', '', '51.16852202517496', '11.778262764971714', '0', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `prop_wachen`
--

CREATE TABLE `prop_wachen` (
  `prop_wachen_id` int(5) NOT NULL,
  `prop_wachen_hiorg` varchar(10) COLLATE utf8_german2_ci NOT NULL,
  `prop_wachen_standort_name` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `prop_wachen_lk` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `prop_wachen_nr` int(3) NOT NULL,
  `prop_wachen_koor_x` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `prop_wachen`
--

INSERT INTO `prop_wachen` (`prop_wachen_id`, `prop_wachen_hiorg`, `prop_wachen_standort_name`, `prop_wachen_lk`, `prop_wachen_nr`, `prop_wachen_koor_x`) VALUES
(1, 'Akkon', 'Naumburg', 'BLK', 302, 0),
(2, 'Johannes', 'Weißenfels', 'BLK', 303, 0),
(3, 'Rot Kreuz', 'Rot Kreuz Zeitz', 'BLK', 304, 0),
(4, 'Rot Kreuz', 'Naumburg', 'BLK', 461, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `user_username` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `user_password` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `user_role` varchar(20) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_role`) VALUES
(1, 'dispo1', 'Kaffee123', 'Disponent'),
(2, 'Einsatzmittel', 'EM9', 'EM');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `einsaetze`
--
ALTER TABLE `einsaetze`
  ADD PRIMARY KEY (`einsatz_id`),
  ADD KEY `einsatz_patient_01` (`einsatz_patient_01`);

--
-- Indizes für die Tabelle `einsatztagebuch`
--
ALTER TABLE `einsatztagebuch`
  ADD PRIMARY KEY (`eintrag_id`);

--
-- Indizes für die Tabelle `einsatz_stichwort`
--
ALTER TABLE `einsatz_stichwort`
  ADD PRIMARY KEY (`einsatz_stichwort_id`);

--
-- Indizes für die Tabelle `fahrzeuge`
--
ALTER TABLE `fahrzeuge`
  ADD PRIMARY KEY (`fahrzeug_id`);

--
-- Indizes für die Tabelle `funk_schlange`
--
ALTER TABLE `funk_schlange`
  ADD PRIMARY KEY (`funk_id`);

--
-- Indizes für die Tabelle `patienten`
--
ALTER TABLE `patienten`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indizes für die Tabelle `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`personal_id`);

--
-- Indizes für die Tabelle `prop_karte`
--
ALTER TABLE `prop_karte`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indizes für die Tabelle `prop_kliniken`
--
ALTER TABLE `prop_kliniken`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indizes für die Tabelle `prop_stadt`
--
ALTER TABLE `prop_stadt`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indizes für die Tabelle `prop_stasse`
--
ALTER TABLE `prop_stasse`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indizes für die Tabelle `prop_wachen`
--
ALTER TABLE `prop_wachen`
  ADD PRIMARY KEY (`prop_wachen_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT für Tabelle `einsaetze`
--
ALTER TABLE `einsaetze`
  MODIFY `einsatz_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT für Tabelle `einsatztagebuch`
--
ALTER TABLE `einsatztagebuch`
  MODIFY `eintrag_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=575;

--
-- AUTO_INCREMENT für Tabelle `einsatz_stichwort`
--
ALTER TABLE `einsatz_stichwort`
  MODIFY `einsatz_stichwort_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `fahrzeuge`
--
ALTER TABLE `fahrzeuge`
  MODIFY `fahrzeug_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1780;

--
-- AUTO_INCREMENT für Tabelle `funk_schlange`
--
ALTER TABLE `funk_schlange`
  MODIFY `funk_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT für Tabelle `patienten`
--
ALTER TABLE `patienten`
  MODIFY `patient_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Patienten-Nummer', AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT für Tabelle `personal`
--
ALTER TABLE `personal`
  MODIFY `personal_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `prop_karte`
--
ALTER TABLE `prop_karte`
  MODIFY `prop_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT für Tabelle `prop_kliniken`
--
ALTER TABLE `prop_kliniken`
  MODIFY `prop_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `prop_stadt`
--
ALTER TABLE `prop_stadt`
  MODIFY `prop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `prop_stasse`
--
ALTER TABLE `prop_stasse`
  MODIFY `prop_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440;

--
-- AUTO_INCREMENT für Tabelle `prop_wachen`
--
ALTER TABLE `prop_wachen`
  MODIFY `prop_wachen_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
