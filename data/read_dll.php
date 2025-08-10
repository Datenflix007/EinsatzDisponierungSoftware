<?php


$link_bos_kenner_link = "";
$link_bos_kenner_art = "";
$link_bos_kenner_disc = "";

$link_bos_kenner_link_abs = "";
$link_bos_kenner_art_abs = "";
$link_bos_kenner_disc_abs = "";

$link_db = "";
$link_karte = "";
$link_settings = "";
$link_headbar = "";

$fahr_default = "";
$fahr_new ="";
$fahr_bear = "";
$fahr_read = "";
$fahr_del = "";

$status = "";

$index   = parse_ini_file('dll.cfg');

    $link_db = $index['mod']['db'];
    $link_bos_kenner_art = $index['mod']['bos_art'];
    $link_bos_kenner_disc = $index['mod']['bos_disc'];
    $link_bos_kenner_link = $index['mod']['bos_link'];
    $link_bos_kenner_art_abs = $index['abs']['bos_art'];
    $link_bos_kenner_disc_abs = $index['abs']['bos_disc'];
    $link_bos_kenner_link_abs = $index['abs']['bos_link'];
    $link_karte = $index['mod']['karte'];
    $link_settings = $index['mod']['sett'];
    $link_headbar = $index['mod']['headbar_com'];

    $fahr_default = $index['fah']['def'];
    $fahr_new =$index['fah']['new'];
    $fahr_bear = $index['fah']['bea'];
    $fahr_read = $index['fah']['rea'];
    $fahr_del = $index['fah']['del'];

    $fahr_status = $index['abs']['sts'];

 ?>
