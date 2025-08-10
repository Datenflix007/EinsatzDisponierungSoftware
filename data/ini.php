<?php
include("read_dll.php");
$ini = parse_ini_file($link_db);

$pdo = new PDO("mysql:host=".$ini['Port']."; dbname=".$ini['DatabaseName'], $ini['DatabaseUser'], $ini['DatabasePW']);
$sql_select_fahrzeuge = "SELECT * FROM fahrzeuge ";




//NÃ¶tig fÃ¼r data\einsaetze.php
$sql_select_einsatz_anzahl ="SELECT COUNT(*) AS anzahl FROM einsaetze ";
$sql_select_einsatz_status_aktiv = "SELECT * FROM `einsaetze` WHERE einsatz_status = 'a' ";
$sql_select_einsatz_statis_inaktiv = "SELECT * FROM `einsaetze` WHERE einsatz_status = 'i' ";

$sql_select_einsatz_anzahl_statement = $pdo->prepare($sql_select_einsatz_anzahl);
$sql_select_einsatz_anzahl_statement->execute(array());
$einsatz_zahl = $sql_select_einsatz_anzahl_statement->fetch();

$sqL_einsatz_status_a_statement = $pdo->prepare("SELECT COUNT(*) AS anzahl FROM einsaetze WHERE einsatz_status = ?");
$sqL_einsatz_status_a_statement->execute(array('a'));
$einsatz_status_a_zahl = $sqL_einsatz_status_a_statement->fetch();

$sqL_einsatz_status_i_statement = $pdo->prepare("SELECT COUNT(*) AS anzahl FROM einsaetze WHERE einsatz_status = ?");
$sqL_einsatz_status_i_statement->execute(array('i'));
$einsatz_status_i_zahl = $sqL_einsatz_status_i_statement->fetch();



//NÃ¶tig fÃ¼r date\einsaetze\einsatz_neu.php
#$sql_einsatz_neu_insert ="INSERT INTO einsaetze(`einsatz_stichwort`,`einsatz_adresse_strasse`,`einsatz_adresse_hausnummer`,`einsatz_adresse_postleitzahl`,`einsatz_adresse_ortschaft`,`einsatz_adresse_ortsteil`,`einsatz_anrufer`,`einsatz_anzahl_patienten`,`einsatz_status`) VALUES (?,?,?,?,?,?,?,?,?)";
$sql_einsatz_neu_insert = "INSERT INTO einsaetze (`einsatz_id`, `einsatz_stichwort`, `einsatz_adresse`, `einsatz_adresse_isset`, `einsatz_adresse_strasse`, `einsatz_adresse_hausnummer`, `einsatz_adresse_postleitzahl`, `einsatz_adresse_ortschaft`, `einsatz_adresse_ortsteil`, `einsatz_melder_gender`, `einsatz_melder_name_vor`, `einsatz_melder_name_nach`, `einsatz_melder_telefon`, `einsatz_anzahl_patienten`, `einsatz_x`, `einsatz_y`, `einsatz_patient_01`, `einsatz_status`,`einsatz_sondersignal_isset`, `einsatz_freitext`) VALUES (?,?,?, ?,?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

//NÃ¶tig fÃ¼r data/einsatz_bearbeiten.php

//NÃ¶tig fÃ¼r data/einsatz_beenden.php
$sql_einsatz_beenden_statement = $pdo->prepare("UPDATE einsaetze  SET einsatz_status = ? WHERE einsatz_id = ?");




#Nötig für einsaetze.php-> patietnen fremdschlüssel
$sql_einsatz_patienten_fremd = $pdo->prepare("SELECT * FROM patienten WHERE patient_id = ");

#Einsatztagebuch
$time = date("h:i:s");
$sql_insert_in_einsatztagebuch = "INSERT INTO `einsatztagebuch` (`eintrag_id`, `eintrag_titel`, `eintrag_uhrzeit`, `eintrag_string`, `eintrag_ea`, `eintrag_absender`) VALUES (?,?, ?, ?, ?, ?)";;



 ?>
