<?php
include('ini.php');
include("read_dll.php");
$kenner_link = parse_ini_file($link_bos_kenner_link);

 if(isset($_POST['f_delete'])){
   $loe = "DELETE FROM prop_karte WHERE prop_id = ?";
   $del = $pdo->prepare($loe);
   $del->execute(array($_POST['f_delete']));
 }


  ?>
<div class="block" style="display: inline-block; width: 100%">

<div class="map_manuell"style="width: 33%; display: inline-block; float: left">//Formular
  <br />
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <table style="width: 300px;">
      <tr>
        <td><input type="text" name="titel" value="" placeholder="Titel" style="width: 150px;"></td>
        <td><select name="art" style="width: 150px;">
          <optgroup label="Einheiten" >
            <option value="drk_ee_trupp" title="Einsatz-Einheit des Deutschen Roten Kreuzes in Truppstärke">DRK - Trupp</option>
            <option value="drk_ee_gruppe"title="Einsatz-Einheit des Deutschen Roten Kreuzes in Gruppenstärke">DRK - Gruppe</option>
            <option value="drk_ee_zug"title="Einsatz-Einheit des Deutschen Roten Kreuzes in Zugstärke">DRK - Zug</option>

            <option value="juh_ee_trupp" title="Einsatz-Einheit der Johaniter-Unfall-Hilfe in Truppstärke">JUH - Trupp</option>
            <option value="juh_ee_gruppe"title="Einsatz-Einheit der Johaniter-Unfall-Hilfe in Gruppenstärke">JUH - Gruppe</option>
            <option value="juh_ee_zug"title="Einsatz-Einheit der Johaniter-Unfall-Hilfe in Zugstärke">JUH - Zug</option>

          </optgroup>

          <optgroup label="Bereitstellung">
            <option value="br" title="Bereitstellungsraum ohne Hilfs-Organisations-Spezialisierung">Bereitstellungsraum</option>
            <option value="br_drk" title="Bereitstellungsraum des Deutschen-Roten-Kreuzes">Bereitstellungsraum DRK</option>
            <option value="br_juh" title="Bereitstellungsraum der Johaniter-Unfall-Hilfe">Bereitstellungsraum JUH</option>
            <option value="br_mhd" title="Bereitstellungsraum des Malter-Hilfdienstes-Deutschland">Bereitstellungsraum MHD</option>
          </optgroup>

            <optgroup label="Statisch" >
              <option value="Bhp" title="ein Behandlungsplatz">Behandlungsplatz</option>
              <option value="TEL" title="der Technische-Einsatz-Leiter">Technische Einsatzleitung</option>
              <option value="EAL" title="die Einatz-Abschnittsleitung">Einsatz-Abschnittsleitung</option>
              <option value="UEAL" title="die Unter-Einatz-Abschnittsleitung">Unter-Einsatz-Abschnittsleitung</option>

            </optgroup>
            <optgroup label="Gebäude/umgebung" >
              <option value="B1" title="Brand im Rahmen der Kategorie 1 / Kleinbrand">Brand 1</option>
              <option value="B2" title="Brand im Rahmen der Kategorie 2 / Mittelbrand">Brand 2</option>
              <option value="B3" title="Brand im Rahmen der Kategorie 2 / Großbrand">Brand 3</option>
              <option value="Z1">Zerstörung Grad 1</option>
              <option value="Z2">Zerstörung Grad 2</option>
              <option value="SB1">Strasse blockiert</option>
              <option value="SB2">Strasse unpassierbar</option>
              <option value="Tankstelle">Tankstelle</option>


            </optgroup>
            <optgroup label="DRK">

                  <option value="00"> 00 - IuK Befehlsstellen FW/HVB</option>
                  <option value="01"> 01 - Kreisbrandmeister/Stel.V.</option>
                  <option value="02"> 02 - Abschnittsleiter/Stel.V.</option>
                  <option value="03"> 03 - Org.L. BOS, Wehrleiter</option>
                  <option value="04"> 04 - TEL</option>
                  <option value="05"> 05 - EAL</option>
                  <option value="06"> 06 - FD-Leiter KatS</option>
                  <option value="07"> 07 - EL FW</option>
                  <option value="08"> 08 - LNA</option>
                  <option value="09"> 09 - OrgL RD</option>
                  <option value="10"> 10 - Funkstelle Wache</option>
                  <option value="drk_kdow" > 11 - KdoW</option>
                  <option value="drk_elw_1" > 12 - ELW 1 / FuTrW</option>
                  <option value="drk_elw_kats" > 14 - ELW KatS</option>
                  <option value="drk_krad" > 15 - Krad</option>
                  <option value="drk_sonst" > 16 - Sonstige</option>
                  <option value="drk_pkw" > 17 - PKW</option>
                  <option value="drk_mzf" > 18 - Mehrzweck-Fahrzeug</option>
                  <option value="drk_mtf" > 19 - MTF</option>
                  <option value="drk_naw" > 81 - NAW</option>
                  <option value="drk_nef" > 82 - NEF</option>
                  <option value="drk_rtw" > 83 - RTW</option>
                  <option value="drk_ktwb" > 84 - KTW-B</option>
                  <option value="drk_ktw" > 85 - KTW</option>
                  <option value="drk_ktwc" > 86 - KTW-C</option>
                  <option value="drk_gktw" > 87 - GRTW</option>
                  <option value="drk_itw" > 88 - ITW</option>
                  <option value="drk_sktw" > 89 - Schwerlast-KTW</option>
                  <option value="drk_atkw" > 90 - Arzt TrKW</option>
                  <option value="drk_bhp_25" > 91 - BHP 25</option>
                  <option value="drk_bhp_50" > 92 - BHP 50</option>
                  <option value="drk_gw_san" > 93 - GW Sanität</option>
                  <option value="drk_gw_betr" > 94 - GW Betreuung</option>
                  <option value="drk_gw_tau" > 95 - GW Tauchen</option>
                  <option value="drk_ware" > 96 - GW Wasserrettung</option>
                  <option value="drk_lb" > 97 - Löschboot</option>
                  <option value="drk_rebo" > 98 - Rettungsboot</option>
                  <option value="drk_mzb" > 99 - Mehrzweckboot</option>
        </optgroup>
        <optgroup label="JUH">

                  <option value="00"> 00 - IuK Befehlsstellen FW/HVB</option>
                  <option value="01"> 01 - Kreisbrandmeister/Stel.V.</option>
                  <option value="02"> 02 - Abschnittsleiter/Stel.V.</option>
                  <option value="03"> 03 - Org.L. BOS, Wehrleiter</option>
                  <option value="04"> 04 - TEL</option>
                  <option value="05"> 05 - EAL</option>
                  <option value="06"> 06 - FD-Leiter KatS</option>
                  <option value="07"> 07 - EL FW</option>
                  <option value="08"> 08 - LNA</option>
                  <option value="09"> 09 - OrgL RD</option>
                  <option value="10"> 10 - Funkstelle Wache</option>
                  <option value="juh_kdow" > 11 - KdoW</option>
                  <option value="juh_elw_1" > 12 - ELW 1 / FuTrW</option>
                  <option value="juh_elw_kats" > 14 - ELW KatS</option>
                  <option value="juh_krad" > 15 - Krad</option>
                  <option value="juh_sonst" > 16 - Sonstige</option>
                  <option value="juh_pkw" > 17 - PKW</option>
                  <option value="juh_mzf" > 18 - Mehrzweck-Fahrzeug</option>
                  <option value="juh_mtf" > 19 - MTF</option>
                  <option value="juh_naw" > 81 - NAW</option>
                  <option value="juh_nef" > 82 - NEF</option>
                  <option value="juh_rtw" > 83 - RTW</option>
                  <option value="juh_ktwb" > 84 - KTW-B</option>
                  <option value="juh_ktw" > 85 - KTW</option>
                  <option value="juh_ktwc" > 86 - KTW-C</option>
                  <option value="juh_gktw" > 87 - GRTW</option>
                  <option value="juh_itw" > 88 - ITW</option>
                  <option value="juh_sktw" > 89 - Schwerlast-KTW</option>
                  <option value="juh_atkw" > 90 - Arzt TrKW</option>
                  <option value="juh_bhp_25" > 91 - BHP 25</option>
                  <option value="juh_bhp_50" > 92 - BHP 50</option>
                  <option value="juh_gw_san" > 93 - GW Sanität</option>
                  <option value="juh_gw_betr" > 94 - GW Betreuung</option>
                  <option value="juh_gw_tau" > 95 - GW Tauchen</option>
                  <option value="juh_ware" > 96 - GW Wasserrettung</option>
                  <option value="juh_lb" > 97 - Löschboot</option>
                  <option value="juh_rebo" > 98 - Rettungsboot</option>
                  <option value="juh_mzb" > 99 - Mehrzweckboot</option>
        </optgroup>
        <optgroup label="MHD">

                  <option value="00"> 00 - IuK Befehlsstellen FW/HVB</option>
                  <option value="01"> 01 - Kreisbrandmeister/Stel.V.</option>
                  <option value="02"> 02 - Abschnittsleiter/Stel.V.</option>
                  <option value="03"> 03 - Org.L. BOS, Wehrleiter</option>
                  <option value="04"> 04 - TEL</option>
                  <option value="05"> 05 - EAL</option>
                  <option value="06"> 06 - FD-Leiter KatS</option>
                  <option value="07"> 07 - EL FW</option>
                  <option value="08"> 08 - LNA</option>
                  <option value="09"> 09 - OrgL RD</option>
                  <option value="10"> 10 - Funkstelle Wache</option>
                  <option value="mhd_kdow" > 11 - KdoW</option>
                  <option value="mhd_elw_1" > 12 - ELW 1 / FuTrW</option>
                  <option value="mhd_elw_kats" > 14 - ELW KatS</option>
                  <option value="mhd_krad" > 15 - Krad</option>
                  <option value="mhd_sonst" > 16 - Sonstige</option>
                  <option value="mhd_pkw" > 17 - PKW</option>
                  <option value="mhd_mzf" > 18 - Mehrzweck-Fahrzeug</option>
                  <option value="mhd_mtf" > 19 - MTF</option>
                  <option value="mhd_naw" > 81 - NAW</option>
                  <option value="mhd_nef" > 82 - NEF</option>
                  <option value="mhd_rtw" > 83 - RTW</option>
                  <option value="mhd_ktwb" > 84 - KTW-B</option>
                  <option value="mhd_ktw" > 85 - KTW</option>
                  <option value="mhd_ktwc" > 86 - KTW-C</option>
                  <option value="mhd_gktw" > 87 - GRTW</option>
                  <option value="mhd_itw" > 88 - ITW</option>
                  <option value="mhd_sktw" > 89 - Schwerlast-KTW</option>
                  <option value="mhd_atkw" > 90 - Arzt TrKW</option>
                  <option value="mhd_bhp_25" > 91 - BHP 25</option>
                  <option value="mhd_bhp_50" > 92 - BHP 50</option>
                  <option value="mhd_gw_san" > 93 - GW Sanität</option>
                  <option value="mhd_gw_betr" > 94 - GW Betreuung</option>
                  <option value="mhd_gw_tau" > 95 - GW Tauchen</option>
                  <option value="mhd_ware" > 96 - GW Wasserrettung</option>
                  <option value="mhd_lb" > 97 - Löschboot</option>
                  <option value="mhd_rebo" > 98 - Rettungsboot</option>
                  <option value="mhd_mzb" > 99 - Mehrzweckboot</option>
        </optgroup>


        </select></td>
      </tr>
      <tr>
        <td><input type="text" name="laenge" value="" placeholder="Länge" style="width: 150px;"></td>
        <td><input type="text" name="breite" value="" placeholder="Breite" style="width: 150px;"></td>
      </tr>
      <tr>
        <td><input type="radio" name="status" value="s" />statisch</td>
        <td><input type="radio" name="status" value="d" />dynamisch</td>
      </tr>
    </table>
      <select name="adresse">
        <opiotn value="none">none</option>
        <optgroup label="Adressen">
          <?php
          $sql = "SELECT * FROM prop_stasse WHERE prop_art = 'Haus'";
          foreach ($pdo->query($sql) as $adr) {
            ?> <option value="<?php echo $adr['prop_id'] ?>"><?php echo $adr['prop_art'].": ".$adr['prop_title'] ?></option> <?php
          }
           ?>
        </optgroup>
        <optgroup label="Strassen">
          <?php
          $sql = "SELECT * FROM prop_stasse WHERE prop_art = 'OS'";
          foreach ($pdo->query($sql) as $adr) {
            ?> <option value="<?php echo $adr['prop_id'] ?>"><?php echo $adr['prop_art'].": ".$adr['prop_title'] ?></option> <?php
          }
          $sql = "SELECT * FROM prop_stasse WHERE prop_art = 'B'";
          foreach ($pdo->query($sql) as $adr) {
            ?> <option value="<?php echo $adr['prop_id'] ?>"><?php echo  "BS: ".$adr['prop_title'] ?></option> <?php
          }
           ?>
        </optgroup>
        <optgroup label="POI">
          <?php
          $sql = "SELECT * FROM prop_stasse WHERE prop_art = 'POI'";
          foreach ($pdo->query($sql) as $adr) {
            ?> <option value="<?php echo $adr['prop_id'] ?>"><?php echo $adr['prop_art'].": ".$adr['prop_title'] ?></option> <?php
          }
           ?>
        </optgroup>
        <optgroup label="POI-WeMe">
          <?php
          $sql = "SELECT * FROM prop_stasse WHERE prop_art = 'POI_WeMe'";
          foreach ($pdo->query($sql) as $adr) {
            ?> <option value="<?php echo $adr['prop_id'] ?>"><?php echo $adr['prop_art'].": ".$adr['prop_title'] ?></option> <?php
          }
           ?>
        </optgroup>

      </select>
        <input type="text" name="beschreibung" value="" placeholder="Freitext"  style="width: 310px; height: 100px;"><br />

      <input type="submit" name="go_manu" value="Mauelle Koor. Hinzuf&uuml;gen" title="Koordinaten einf&uuml;gen, Punkt bearbeiten, erstellen und die Seite neuladen">
      <input type="submit" name="go_auto" value="Auto.-Adresse Hinzuf&uuml;gen" title="Eine Adresse ausw&auml;hlen, diese bearbeiten, erstellen und die Seite neuladen">
  </form>
  <?php
  if(isset($_POST['go_auto'])){
    $status = "";
    $sql = "INSERT INTO prop_karte (`prop_id`, `prop_title`, `prop_art`, `prop_discribtion`, `prop_x`, `prop_y`, `prop_adresse`, `prop_gruppe_a`, `prop_gruppe_a_nr`,`prop_gruppe_b`, `prop_gruppe_b_nr`, `prop_group_count`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $insert = $pdo->prepare($sql);
    if(isset($_POST['status'])){
      $status = $_POST['status'];
    }
    else{
      $status = "s";
    }
    if($_POST['adresse'] == "none"){
      $x = $_POST['laenge'];
      $y = $_POST['breite'];
      $insert->execute([NULL, $_POST['titel'], $_POST['art'], $_POST['beschreibung'], $x, $y, '', '', '', '', '', '',$status]);
    }
    if($_POST['adresse'] != "none"){
      $adr = $_POST['adresse'];
      $sql = "SELECT * FROM prop_stasse WHERE prop_id =".$adr;
      foreach ($pdo->query($sql) as $adr) {
        $x = $adr['prop_x'];
        $y = $adr['prop_y'];
      }

      //Abgleich, ob Adresen Doublenten
      $double = "";
      foreach ($pdo->query("SELECT * FROM prop_karte") as $key) {
        if($key['prop_x'] == $x){
          if($key['prop_y'] == $y){
            $double = 1;
          }
        }
      }
      if($double == 1){
        //is group a1?
        ?>
        <span style="cursor: help;" title="Adresse wohl möglich vergeben">Eingabe ungültig</span>
        <?php
        }
      if($double == 0){
        $insert->execute([NULL, $_POST['titel'], $_POST['art'], $_POST['beschreibung'], $x, $y, '', '', '','', '', '',$status]);
      }


    }


  }

    if(isset($_POST['go_manu'])){
    $status = "";
    $sql = "INSERT INTO prop_karte (`prop_id`, `prop_title`, `prop_art`, `prop_discribtion`, `prop_x`, `prop_y`, `prop_adresse`, `prop_gruppe_a`, `prop_gruppe_a_nr`, `prop_group_count`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $insert = $pdo->prepare($sql);
    if(isset($_POST['status'])){
      $status = $_POST['status'];
    }
    else{
      $status = "s";
    }

      $x = $_POST['laenge'];
      $y = $_POST['breite'];
      $insert->execute([NULL, $_POST['titel'], $_POST['art'], $_POST['beschreibung'], $x, $y, '', '', '', '',$status]);




  }
?>
</div>
<div class="map_list"style="width: 33%; display: inline-block; text-align: center;">
  <details open style="background-color: #DF7401">
    <summary> <spans style="font-size:30; color: white;">dynamisch</span></summary>
      <?php

      $sql = "SELECT * FROM prop_karte WHERE status = 'd'";
      foreach ($pdo->query($sql) as $prop) {
        $src = "";
        switch ($prop['prop_art']) {
          case 'drk_ee_gruppe': $src = "geojson/drk_ee_gruppe.png"; break;
          case 'drk_ee_trupp': $src = "geojson/drk_ee_trupp.png"; break;
          case 'drk_ee_zug': $src = "geojson/drk_ee_zug.png"; break;

          case 'juh_ee_gruppe': $src = "geojson/juh_ee_gruppe.png"; break;
          case 'juh_ee_trupp': $src = "geojson/juh_ee_trupp.png"; break;
          case 'juh_ee_zug': $src = "geojson/juh_ee_zug.png"; break;

          case 'TEL': $src = $kenner_link['OPT']['TEL']; break;
          case 'EAL': $src = $kenner_link['OPT']['EAL']; break;
          case 'UEAL': $src = $kenner_link['OPT']['UEAL']; break;

          case 'Bhp': $src = $kenner_link['OPT']['BHP']; break;

            case 'B1': $src = $kenner_link['OPT']['b1']; break;
            case 'B2': $src = $kenner_link['OPT']['b2']; break;
            case 'B3': $src = $kenner_link['OPT']['b3']; break;
            case 'Z1': $src = $kenner_link['OPT']['z1']; break;
            case 'Z2': $src = $kenner_link['OPT']['z2']; break;
            case 'Z3': $src = $kenner_link['OPT']['z3']; break;
            case 'SB1': $src = $kenner_link['OPT']['sb1']; break;
            case 'SB2': $src = $kenner_link['OPT']['sb2']; break;
            case 'drk_ee_gruppe': $src = $kenner_link['OPT']['drK_ee_gr']; break;
            case 'drk_ee_trupp': $src = $kenner_link['OPT']['drk_ee_tr']; break;
            case 'drk_ee_zug': $src = $kenner_link['OPT']['drk_ee_zu']; break;

            case 'juh_ee_gruppe': $src = $kenner_link['OPT']['juh_ee_gr']; break;
            case 'juh_ee_trupp': $src = $kenner_link['OPT']['juh_ee_tr']; break;
            case 'juh_ee_zug': $src = $kenner_link['OPT']['juh_ee_zu']; break;

            case 'br': $src = $kenner_link['OPT']['br']; break;
            case 'br_drk': $src = $kenner_link['OPT']['br_drk'];   break;
            case 'br_juh': $src = $kenner_link['OPT']['br_juh']; break;
            case 'br_mhd': $src = $kenner_link['OPT']['br_mhd']; break;



            case 'drk_atrkw': $src = "fahrzeuge/".$kenner_link['drk']['90']; break;
            case 'drk_bhp_25': $src = "fahrzeuge/".$kenner_link['drk']['91']; break;
            case 'drk_bhp_50': $src = "fahrzeuge/".$kenner_link['drk']['92']; break;
            case 'drk_elw_1': $src = "fahrzeuge/".$kenner_link['drk']['12']; break;
            case 'drk_elw_kats': $src = "fahrzeuge/".$kenner_link['drk']['14']; break;
            case 'drk_gktw': $src = "fahrzeuge/".$kenner_link['drk']['87']; break;
            case 'drk_gw_san': $src = "fahrzeuge/".$kenner_link['drk']['93'];break;
            case 'drk_itw': $src = "fahrzeuge/".$kenner_link['drk']['88'];break;
            case 'drk_kdow': $src = "fahrzeuge/".$kenner_link['drk']['11'];break;
            case 'drk_krad': $src = "fahrzeuge/".$kenner_link['drk']['15'];break;
            case 'drk_ktw': $src = "fahrzeuge/".$kenner_link['drk']['85'];break;
            case 'drk_ktwb': $src = "fahrzeuge/".$kenner_link['drk']['84'];break;
            case 'drk_ktw_c': $src = "fahrzeuge/".$kenner_link['drk']['83'];break;
            case 'drk_mzf': $src = "fahrzeuge/".$kenner_link['drk']['18'];break;
            case 'drk_naw': $src = "fahrzeuge/".$kenner_link['drk']['81'];break;
            case 'drk_nef': $src = "fahrzeuge/".$kenner_link['drk']['82'];break;
            case 'drk_pkw': $src = "fahrzeuge/".$kenner_link['drk']['17'];break;
            case 'drk_rtw': $src = "fahrzeuge/".$kenner_link['drk']['83'];break;
            case 'drk_sktw': $src = "fahrzeuge/".$kenner_link['drk']['89'];break;
            case 'drk_sonst': $src = "fahrzeuge/".$kenner_link['drk']['16'];break;

            case 'AtrKw': $src = "fahrzeuge/".$kenner_link['drk']['90']; break;
            case 'ELW_1': $src = "fahrzeuge/".$kenner_link['drk']['12']; break;
            case 'ELW_KATS': $src = "fahrzeuge/".$kenner_link['drk']['14']; break;
            case 'GW_SAN': $src = "fahrzeuge/".$kenner_link['drk']['93'];break;
            case 'Kdow': $src = "fahrzeuge/".$kenner_link['drk']['11'];break;
            case 'Krad': $src = "fahrzeuge/".$kenner_link['drk']['15'];break;
            case 'KTW': $src = "fahrzeuge/".$kenner_link['drk']['85'];break;
            case 'KTWB': $src = "fahrzeuge/".$kenner_link['drk']['84'];break;
            case 'KTWC': $src = "fahrzeuge/".$kenner_link['drk']['83'];break;
            case 'MZF': $src = "fahrzeuge/".$kenner_link['drk']['18'];break;
            case 'NAW': $src = "fahrzeuge/".$kenner_link['drk']['81'];break;
            case 'NEF': $src = "fahrzeuge/".$kenner_link['drk']['82'];break;
            case 'PKW': $src = "fahrzeuge/".$kenner_link['drk']['17'];break;
            case 'RTW': $src = "fahrzeuge/".$kenner_link['drk']['83'];break;
            case 'Sonst': $src = "fahrzeuge/".$kenner_link['drk']['16'];break;


            case 'juh_bhp_25': $src = "fahrzeuge/".$kenner_link['juh']['91']; break;
            case 'juh_bhp_50': $src ="fahrzeuge/". $kenner_link['juh']['92']; break;
            case 'juh_elw_1': $src = "fahrzeuge/".$kenner_link['juh']['12']; break;
            case 'juh_elw_kats': $src = "fahrzeuge/".$kenner_link['juh']['14']; break;
            case 'juh_gktw': $src = "fahrzeuge/".$kenner_link['juh']['87']; break;
            case 'juh_gw_san': $src = "fahrzeuge/".$kenner_link['juh']['93'];break;
            case 'juh_itw': $src = "fahrzeuge/".$kenner_link['juh']['88'];break;
            case 'juh_kdow': $src = "fahrzeuge/".$kenner_link['juh']['11'];break;
            case 'juh_krad': $src = "fahrzeuge/".$kenner_link['juh']['15'];break;
            case 'juh_ktw': $src = "fahrzeuge/".$kenner_link['juh']['85'];break;
            case 'juh_ktwb': $src = "fahrzeuge/".$kenner_link['juh']['84'];break;
            case 'juh_ktw_c': $src = "fahrzeuge/".$kenner_link['juh']['83'];break;
            case 'juh_mzf': $src = "fahrzeuge/".$kenner_link['juh']['18'];break;
            case 'juh_naw': $src = "fahrzeuge/".$kenner_link['juh']['81'];break;
            case 'juh_nef': $src = "fahrzeuge/".$kenner_link['juh']['82'];break;
            case 'juh_pkw': $src = "fahrzeuge/".$kenner_link['juh']['17'];break;
            case 'juh_rtw': $src = "fahrzeuge/".$kenner_link['juh']['83'];break;
            case 'juh_sktw': $src = "fahrzeuge/".$kenner_link['juh']['89'];break;
            case 'juh_sonst': $src = "fahrzeuge/".$kenner_link['juh']['16'];break;

            case 'Tankstelle': $src = "fahrzeuge/".$kenner_link['OPT']['TANKE']; break;

            case 'mhd_bhp_25': $src = "fahrzeuge/".$kenner_link['mhd']['91']; break;
            case 'mhd_bhp_50': $src = "fahrzeuge/".$kenner_link['mhd']['92']; break;
            case 'mhd_elw_1': $src = "fahrzeuge/".$kenner_link['mhd']['12']; break;
            case 'mhd_elw_kats': $src = "fahrzeuge/".$kenner_link['mhd']['14']; break;
            case 'mhd_gktw': $src = "fahrzeuge/".$kenner_link['mhd']['87']; break;
            case 'mhd_gw_san': $src = "fahrzeuge/".$kenner_link['mhd']['93'];break;
            case 'mhd_itw': $src = "fahrzeuge/".$kenner_link['mhd']['88'];break;
            case 'mhd_kdow': $src = "fahrzeuge/".$kenner_link['mhd']['11'];break;
            case 'mhd_krad': $src = "fahrzeuge/".$kenner_link['mhd']['15'];break;
            case 'mhd_ktw': $src = "fahrzeuge/".$kenner_link['mhd']['85'];break;
            case 'mhd_ktwb': $src = "fahrzeuge/".$kenner_link['mhd']['84'];break;
            case 'mhd_ktw_c': $src = "fahrzeuge/".$kenner_link['mhd']['83'];break;
            case 'mhd_mzf': $src = "fahrzeuge/".$kenner_link['mhd']['18'];break;
            case 'mhd_naw': $src = "fahrzeuge/".$kenner_link['mhd']['91'];break;
            case 'mhd_nef': $src = "fahrzeuge/".$kenner_link['mhd']['82'];break;
            case 'mhd_pkw': $src = "fahrzeuge/".$kenner_link['mhd']['17'];break;
            case 'mhd_rtw': $src = "fahrzeuge/".$kenner_link['mhd']['83'];break;
            case 'mhd_sktw': $src = "fahrzeuge/".$kenner_link['mhd']['89'];break;
            case 'mhd_sonst': $src = "fahrzeuge/".$kenner_link['mhd']['16'];break;


        }
        if(($prop['prop_title'] != "weme") && $prop['prop_art'] != "mode"){

        ?>

       <center>

         <table >
           <tr>
             <td>

         <button type="button" name="button" style="width: 200px">
           <table>
             <tr>
               <td><img src="<?php echo $src ?>" width="20" height="20" alt="Dieser Inhalt ist leider nicht verf&uuml;gbar"></td>
               <td><?php echo $prop['prop_art'].":"?></button></td>
               <td><?php echo $prop['prop_title'] ?></td>
             </tr>
           </table></td><td>
           </button>
           <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
             <input type="submit" name="f_delete" value="<?php echo $prop['prop_id'] ?>">&nbspLÖSCHEN
           </form>   </td> </tr>
             </table>
           </center>
           <?php

         }
         }
          ?>
  </details><br />

  <details open style="background-color: #DF7401">
    <summary><span style="font-size: 30; color: white;">&nbsp &nbspstatisch &nbsp </span></summary>
    <?php
    $sql = "SELECT * FROM prop_karte WHERE status = 's'";
    foreach ($pdo->query($sql) as $prop) {
          $src = "";
          switch ($prop['prop_art']) {
            case 'Bhp': $src = "geojson/bhp.png"; break;

            case 'B1': $src = $kenner_link['OPT']['b1']; break;
            case 'B2': $src = $kenner_link['OPT']['b2']; break;
            case 'B3': $src = $kenner_link['OPT']['b3']; break;
            case 'Z1': $src = $kenner_link['OPT']['z1']; break;
            case 'Z2': $src = $kenner_link['OPT']['z2']; break;
            case 'SB1': $src = $kenner_link['OPT']['sb1']; break;
            case 'SB2': $src = $kenner_link['OPT']['sb2']; break;
            case 'drk_ee_gruppe': $src = $kenner_link['OPT']['drk_ee_gr']; break;
            case 'drk_ee_trupp': $src = $kenner_link['OPT']['drk_ee_tr']; break;
            case 'drk_ee_zug': $src = $kenner_link['OPT']['drk_ee_zu']; break;

            case 'juh_ee_gruppe': $src = $kenner_link['OPT']['juh_ee_gr']; break;
            case 'juh_ee_trupp': $src = $kenner_link['OPT']['juh_ee_tr']; break;
            case 'juh_ee_zug': $src = $kenner_link['OPT']['juh_ee_zu']; break;

            case 'TEL': $src = $kenner_link['OPT']['TEL']; break;
            case 'EAL': $src = $kenner_link['OPT']['EAL']; break;
            case 'UEAL': $src = $kenner_link['OPT']['UEAL']; break;

            case 'br': $src = $kenner_link['OPT']['br']; break;
            case 'br_drk': $src = $kenner_link['OPT']['br_drk']; break;
            case 'br_juh': $src = $kenner_link['OPT']['br_juh']; break;
            case 'br_mhd': $src = $kenner_link['OPT']['br_mhd']; break;

            case 'arztGru': $src = "fahrzeuge/".$kenner_link['drk']['90'];break;

            case 'drk_atrkw': $src ="fahrzeuge/".$kenner_link['drk']['90']; break;
            case 'drk_bhp_25': $src = "fahrzeuge/".$kenner_link['drk']['91']; break;
            case 'drk_bhp_50': $src = "fahrzeuge/".$kenner_link['drk']['92']; break;
            case 'drk_elw_1': $src ="fahrzeuge/".$kenner_link['drk']['12']; break;
            case 'drk_elw_kats': $src = "fahrzeuge/".$kenner_link['drk']['14']; break;
            case 'drk_gktw': $src = "fahrzeuge/".$kenner_link['drk']['87']; break;
            case 'drk_gw_san': $src = "fahrzeuge/".$kenner_link['drk']['93'];break;
            case 'drk_itw': $src = "fahrzeuge/".$kenner_link['drk']['89'];break;
            case 'drk_kdow': $src = "fahrzeuge/".$kenner_link['drk']['11'];break;
            case 'drk_krad': $src = "fahrzeuge/".$kenner_link['drk']['15'];break;
            case 'drk_ktw': $src = "fahrzeuge/".$kenner_link['drk']['85'];break;
            case 'drk_ktwb': $src = "fahrzeuge/".$kenner_link['drk']['84'];break;
            case 'drk_ktw_c': $src = "fahrzeuge/".$kenner_link['drk']['83'];break;
            case 'drk_mzf': $src = "fahrzeuge/".$kenner_link['drk']['18'];break;
            case 'drk_naw': $src = "fahrzeuge/".$kenner_link['drk']['81'];break;
            case 'drk_nef': $src = "fahrzeuge/".$kenner_link['drk']['82'];break;
            case 'drk_pkw': $src = "fahrzeuge/".$kenner_link['drk']['17'];break;
            case 'drk_rtw': $src = "fahrzeuge/".$kenner_link['drk']['83'];break;
            case 'drk_sktw': $src = "fahrzeuge/".$kenner_link['drk']['89'];break;
            case 'drk_sonst': $src = "fahrzeuge/".$kenner_link['drk']['16'];break;

            case 'AtrKw': $src = "fahrzeuge/".$kenner_link['drk']['90']; break;
            case 'ELW_1': $src = "fahrzeuge/".$kenner_link['drk']['12']; break;
            case 'ELW_KATS': $src = "fahrzeuge/".$kenner_link['drk']['14']; break;
            case 'GW_SAN': $src = "fahrzeuge/".$kenner_link['drk']['93'];break;
            case 'Kdow': $src = "fahrzeuge/".$kenner_link['drk']['11'];break;
            case 'Krad': $src = "fahrzeuge/".$kenner_link['drk']['15'];break;
            case 'KTW': $src = "fahrzeuge/".$kenner_link['drk']['85'];break;
            case 'KTWB': $src = "fahrzeuge/".$kenner_link['drk']['84'];break;
            case 'KTWC': $src = "fahrzeuge/".$kenner_link['drk']['83'];break;
            case 'MZF': $src = "fahrzeuge/".$kenner_link['drk']['18'];break;
            case 'NAW': $src = "fahrzeuge/".$kenner_link['drk']['81'];break;
            case 'NEF': $src = "fahrzeuge/".$kenner_link['drk']['82'];break;
            case 'PKW': $src = "fahrzeuge/".$kenner_link['drk']['17'];break;
            case 'RTW': $src = "fahrzeuge/".$kenner_link['drk']['83'];break;
            case 'Sonst': $src = "fahrzeuge/".$kenner_link['drk']['17'];break;


            case 'juh_bhp_25': $src = "fahrzeuge/".$kenner_link['juh']['91']; break;
            case 'juh_bhp_50': $src = "fahrzeuge/".$kenner_link['juh']['92']; break;
            case 'juh_elw_1': $src = "fahrzeuge/".$kenner_link['juh']['12']; break;
            case 'juh_elw_kats': $src = "fahrzeuge/".$kenner_link['juh']['14']; break;
            case 'juh_gktw': $src = "fahrzeuge/".$kenner_link['juh']['87']; break;
            case 'juh_gw_san': $src = "fahrzeuge/".$kenner_link['juh']['93'];break;
            case 'juh_itw': $src = "fahrzeuge/".$kenner_link['juh']['88'];break;
            case 'juh_kdow': $src = "fahrzeuge/".$kenner_link['juh']['11'];break;
            case 'juh_krad': $src = "fahrzeuge/".$kenner_link['juh']['15'];break;
            case 'juh_ktw': $src = "fahrzeuge/".$kenner_link['juh']['85'];break;
            case 'juh_ktwb': $src = "fahrzeuge/".$kenner_link['juh']['84'];break;
            case 'juh_ktw_c': $src = "fahrzeuge/".$kenner_link['juh']['83'];break;
            case 'juh_mzf': $src = "fahrzeuge/".$kenner_link['juh']['18'];break;
            case 'juh_naw': $src = "fahrzeuge/".$kenner_link['juh']['81'];break;
            case 'juh_nef': $src = "fahrzeuge/".$kenner_link['juh']['82'];break;
            case 'juh_pkw': $src = "fahrzeuge/".$kenner_link['juh']['17'];break;
            case 'juh_rtw': $src = "fahrzeuge/".$kenner_link['juh']['83'];break;
            case 'juh_sktw': $src = "fahrzeuge/".$kenner_link['juh']['89'];break;
            case 'juh_sonst': $src = "fahrzeuge/".$kenner_link['juh']['16'];break;

            case 'Tankstelle': $src = $kenner_link['OPT']['TANKE']; break;
          }
      ?>
    <center>

      <table >
        <tr>
          <td>

      <button type="button" name="button" style="width: 200px">
        <table>
          <tr>
            <td><img src="<?php echo $src ?>" width="20" height="20" alt="Dieser Inhalt ist leider nicht verf&uuml;gbar"></td>
            <td><?php echo $prop['prop_art'].":"?></button></td>
            <td><?php echo $prop['prop_title'] ?></td>

          </tr>
        </table></td><td>
        </button><br /><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">


          <input type="submit" name="f_delete" value="<?php echo $prop['prop_id'] ?>">&nbspLÖSCHEN
        </form>   </td> </tr>
          </table>
        </center>
      <?php
    }
     ?>
  </details>

</div>
<div class="map_legende"style="width: 33%;  float: right;">
    <span style="color: white; font-size: 30;">Legende</span>
    <details open>
      <summary><span style="font-size: 20; color: white;">Einheiten</span></summary>
    <details style="margin-left: 30px; color:white; background-color: #DF7401">
        <summary>DRK</summary>
        <table>
          <tr><td>&nbsp &nbsp &nbsp<img src="geojson/drk_ee_trupp.png" alt="Trupp" width="70" height="50"></td><td>&nbsp &nbspTrupp des DRk</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="geojson/drk_ee_gruppe.png"alt="Gruppe" width="70" height="50"></td><td>&nbsp &nbspGruppe des DRK</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="geojson/drk_ee_zug.png"alt="Zug" width="70" height="50"></td><td>&nbsp &nbspZug des DRK</td></tr>

          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_atrkw.png" alt="Arzttrupp-Kraft-Wagen des DRK" width="70" height="50"></td><td>&nbsp &nbspArzttrupp-Kraft-Wagen</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_bhp_25.png"alt="Behandlungsplatz 25 des DRK" width="70" height="50"></td><td>&nbsp &nbspBehandlungsplatz 25</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_bhp_50.png"alt="Behandlungsplatz 50 des DRK" width="70" height="50"></td><td>&nbsp &nbspBehandlungsplatz 50</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_elw_1.png"alt="Einsatzleitwagen 1 des DRK" width="70" height="50"></td><td>&nbsp &nbspEinsatzleitwagen 1</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_elw_kats.png"alt="Einsatzleitwagen Katastrophenschutz des DRK" width="70" height="50"></td><td>&nbsp &nbspEinsatzleitwagen KatS</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_gktw.png"alt="Großraum-KTW des DRK" width="70" height="50"></td><td>&nbsp &nbspGroßraum KTW</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_gw_san.png"alt="Gerätewagen sanität des DRK" width="70" height="50"></td><td>&nbsp &nbspGerätewagen Sanität</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_itw.png"alt="Intensivtransportwaggen des DRK" width="70" height="50"></td><td>&nbsp &nbspIntensivtransportwaggen</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_kdow.png"alt="Kommandowagen des DRK" width="70" height="50"></td><td>&nbsp &nbspKommandowagen</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_krad.png"alt="Krad des DRK" width="70" height="50"></td><td>&nbsp &nbspKrad</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_ktwb.png"alt="Krankentransportwagen Typ B des DRK / der MTF" width="70" height="50"></td><td>&nbsp &nbspKTW Typ B</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_ktwc.png"alt="Krankentransportwagen Typ C des DRK" width="70" height="50"></td><td>&nbsp &nbspKTW Typ C</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_mzf.png"alt="Mehrzweckfahrzeug des DRK" width="70" height="50"></td><td>&nbsp &nbspMehrzweckfahrzeug</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_naw.png"alt="Notarztwagen des DRK" width="70" height="50"></td><td>&nbsp &nbspNotarztwagen</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_nef.png"alt="Notarzteinsatz Fahrzeug des DRK" width="70" height="50"></td><td>&nbsp &nbspNotarzteinsatzfahrzeug</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_pkw.png"alt="Personenkraftwagen des DRK" width="70" height="50"></td><td>&nbsp &nbspPersonenkraftwagen</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_rtw.png"alt="Rettungstransportwagen des DRK" width="70" height="50"></td><td>&nbsp &nbspRTW</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_sktw.png"alt="Schwerlast Krankentransportwagen" width="70" height="50"></td><td>&nbsp &nbspSKTW</td></tr>
          <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/drk_sonst.png"alt="Sonstiges Einsatzfahrzeug des DRK" width="70" height="50"></td><td>&nbsp &nbspSonstiges</td></tr>

      </table></details>

      <details style="margin-left: 30px; color:white; background-color: #DF7401">
          <summary>JUH</summary>
          <table>
            <tr><td>&nbsp &nbsp &nbsp<img src="geojson/juh_ee_trupp.png" alt="Trupp" width="70" height="50"></td><td>&nbsp &nbspTrupp des DRk</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="geojson/juh_ee_gruppe.png"alt="Gruppe" width="70" height="50"></td><td>&nbsp &nbspGruppe des DRK</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="geojson/juh_ee_zug.png"alt="Zug" width="70" height="50"></td><td>&nbsp &nbspZug des DRK</td></tr>

            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_atrkw.png" alt="Arzttrupp-Kraft-Wagen der JUH" width="70" height="50"></td><td>&nbsp &nbspArzttrupp-Kraft-Wagen</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_bhp_25.png"alt="Behandlungsplatz 25 der JUH" width="70" height="50"></td><td>&nbsp &nbspBehandlungsplatz 25</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_bhp_50.png"alt="Behandlungsplatz 50 der JUH" width="70" height="50"></td><td>&nbsp &nbspBehandlungsplatz 50</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_elw_1.png"alt="Einsatzleitwagen 1 der JUH" width="70" height="50"></td><td>&nbsp &nbspEinsatzleitwagen 1</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_elw_kats.png"alt="Einsatzleitwagen Katastrophenschutz der JUH" width="70" height="50"></td><td>&nbsp &nbspEinsatzleitwagen KatS</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_gktw.png"alt="Großraum-KTW der JUH" width="70" height="50"></td><td>&nbsp &nbspGroßraum KTW</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_gw_san.png"alt="Gerätewagen Sanität der JUH" width="70" height="50"></td><td>&nbsp &nbspGerätewagen Sanität</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_itw.png"alt="Intensivtransportwaggen der JUH" width="70" height="50"></td><td>&nbsp &nbspIntensivtransportwaggen</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_kdow.png"alt="Kommandowagen der JUH" width="70" height="50"></td><td>&nbsp &nbspKommandowagen</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_krad.png"alt="Krad der JUH" width="70" height="50"></td><td>&nbsp &nbspKrad</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_ktwb.png"alt="Krankentransportwagen Typ B der JUH / der MTF" width="70" height="50"></td><td>&nbsp &nbspKTW Typ B</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_ktwc.png"alt="Krankentransportwagen Typ C der JUH" width="70" height="50"></td><td>&nbsp &nbspKTW Typ C</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_mzf.png"alt="Mehrzweckfahrzeug der JUH" width="70" height="50"></td><td>&nbsp &nbspMehrzweckfahrzeug</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_naw.png"alt="Notarztwagen der JUH" width="70" height="50"></td><td>&nbsp &nbspNotarztwagen</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_nef.png"alt="Notarzteinsatz Fahrzeug der JUH" width="70" height="50"></td><td>&nbsp &nbspNotarzteinsatzfahrzeug</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_pkw.png"alt="Personenkraftwagen der JUH" width="70" height="50"></td><td>&nbsp &nbspPersonenkraftwagen</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_rtw.png"alt="Rettungstransportwagen der JUH" width="70" height="50"></td><td>&nbsp &nbspRTW</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_sktw.png"alt="Schwerlast Krankentransportwagen der JUH" width="70" height="50"></td><td>&nbsp &nbspSKTW</td></tr>
            <tr><td>&nbsp &nbsp &nbsp<img src="fahrzeuge/styles/juh_sonst.png"alt="Sonstiges Einsatzfahrzeug der JUH" width="70" height="50"></td><td>&nbsp &nbspSonstiges</td></tr>

        </table></details>
      <table>
        <tr><td>&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp <img src="fahrzeuge/styles/ArztGru.png" alt="Arzt Gruppe" width="70" height="50"></td><td>&nbsp &nbspArztgruppe</td></tr>
        <tr><td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="fahrzeuge/styles/B.png" alt="Boot" width="70" height="50"> </td><td>&nbsp &nbspBoot</td></tr>
        <tr><td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="fahrzeuge/styles/LTru.png" alt="San-Trupp" width="70" height="50"></td><td>&nbsp &nbspLäufer-/Sanitätstrupp</td></tr>
      </table>


      </details>
    <details open>
      <summary><span style="font-size: 20; color: white;">Lage-Informationen</span></summary>
    </details>
    <details open>
      <summary><span style="font-size: 20; color: white;">Gebäude/Umgebung</span></summary>
    </details>
</div>

</div>
