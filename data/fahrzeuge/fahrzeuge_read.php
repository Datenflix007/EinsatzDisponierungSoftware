<style media="screen">
  select{ text-align: center;}
</style>


<div class="body">

<?php
include('../ini.php');
  if(isset($_POST['f_fahrzeug_safe_settings'])){
    ?><embed type="audio/mp3" src="../status.mp3" width="0" height="0"><?php
  #$fahrzeug = $_POST['f_fahrzuge_id'];
    #$status = $_POST['f_status'];

    $eintrag = $pdo->prepare($sql_insert_in_einsatztagebuch);
    $eintrag->execute([NULL,"Status", $time, $_POST['f_new_fahrzeug_funkkenner']."...Status geändert!(".$_POST['f_fahrzeug_status_alt']."->".$_POST['f_status'].")","EL","Disponent"]);


    $aktion = "";
    if($_POST['f_status'] == "1"){
      $aktion = "Frei ü. Funk";
    }
    if($_POST['f_status'] == "1"){
      $aktion = "Frei a. Wache";
    }
    if($_POST['f_status'] == "3"){
      $aktion = "Einsatzanfahrt";
    }
    if($_POST['f_status'] == "4"){
      $aktion = "Einsatzgebunden";
    }
    if($_POST['f_status'] == "6"){
      $aktion = "Einsatzanfahrt";
    }
    if($_POST['f_status'] == "7"){
      $aktion = "Einsatzanfahrt";
    }
    if($_POST['f_status'] == "8"){
      $aktion = "Einsatzanfahrt";
    }

    $sql = "UPDATE fahrzeuge SET fahrzeug_status = ?, fahrzeug_aktion = ? WHERE fahrzeug_id = ?";
    $status = $pdo->prepare($sql);
    $status->execute(array($_POST['f_status'], $aktion, $_POST['f_fahrzuge_id']));
  }


$fahrzeug_id = $_POST['f_fahrzeuge_id'];

$sql = "SELECT * FROM fahrzeuge WHERE fahrzeug_id = ".$fahrzeug_id;

foreach ($pdo->query($sql) as $row) {

  $status_alt = "";
  $status_neu = "";



  $status_alt = $row['fahrzeug_status'];



  echo "<center>";
  ?><div style="background-color: white;"><?php




  switch ($row['fahrzeug_organisation']) {
    case 'rd_drk':?><img src="styles/RD.png" title="Rettungsdienst" height="150" weigth="150"><?php break;
    case 'rd_juh':?><img src="styles/RD.png" title="Rettungsdienst" height="150" weigth="150"><?php break;
    case 'rd_mhd':?><img src="styles/RD.png" title="Rettungsdienst" height="150" weigth="150"><?php break;
    case 'rd_asb':?><img src="styles/RD.png" title="Rettungsdienst" height="150" weigth="150"><?php break;
    case 'rd_rd':?><img src="styles/RD.png" title="Rettungsdienst" height="150" weigth="150"><?php break;


  }
  include("../read_dll.php");
  $link =        parse_ini_file($link_bos_kenner_link_abs);
  $kenner_disc = parse_ini_file($link_bos_kenner_disc_abs);
  $kenner =      parse_ini_file($link_bos_kenner_art_abs);

  if($row['fahrzeug_typ'] == 'LTru'){?><img src="styles/LTru.png" alt="Läufertrupp" height="150" weigth="150"><?php }
  if($row['fahrzeug_typ'] == 'EAL-Sa'){?><img src="styles/EAL.png" alt="Läufertrupp" height="150" weigth="150"><?php }
  if($row['fahrzeug_typ'] == 'Bhp'){?><img src="styles/Bhp.png" alt="Läufertrupp" height="150" weigth="150"><?php }
  if(($row['fahrzeug_organisation'] == 'drk') OR $row['fahrzeug_organisation'] =='rd_drk'){

    if($row['fahrzeug_typ'] == '11'){?><img src="<?php echo $link['drk'][11] ?>" alt="<?php echo $link['drk'][11] ?>" title="<?php echo $kenner_disc['art'][11] ?>" height="150" weigth="150">
   <?php }
    if($row['fahrzeug_typ'] == '12'){?><img src="<?php echo $link['drk'][12] ?>" alt="<?php echo $link['drk'][12] ?>" title="<?php echo $kenner_disc['art'][12] ?>"  height="150" weigth="150">
  <?php } ?><?php
    if($row['fahrzeug_typ'] == '13'){?><img src="<?php echo $link['drk'][13] ?>" alt="<?php echo $link['drk'][13] ?>" title="<?php echo $kenner_disc['art'][13] ?>"  height="150" weigth="150">
  <?php } ?>
    <?php
    if($row['fahrzeug_typ'] == '14'){?><img src="<?php echo $link['drk'][14] ?>" alt="<?php echo $link['drk'][14] ?>" title="<?php echo $kenner_disc['art'][14] ?>"  height="150" weigth="150"> <?php } ?>
    <?php
    if($row['fahrzeug_typ'] == '15'){?><img src="<?php echo $link['drk'][15] ?>" alt="<?php echo $link['drk'][15] ?>" title="<?php echo $kenner_disc['art'][15] ?>"  height="150" weigth="150"> <?php } ?>
    <?php
    if($row['fahrzeug_typ'] == '16'){?><img src="<?php echo $link['drk'][16] ?>" alt="<?php echo $link['drk'][16] ?>" title="<?php echo $kenner_disc['art'][16] ?>" height="150" weigth="150"> <?php } ?>
    <?php
    if($row['fahrzeug_typ'] == '17'){?><img src="<?php echo $link['drk'][17] ?>" alt="<?php echo $link['drk'][17] ?>" title="<?php echo $kenner_disc['art'][17] ?>"  height="150" weigth="150"> <?php } ?>
    <?php
    if(($row['fahrzeug_typ'] == '18') AND ($row['fahrzeug_organisation'] == 'drk' OR 'rd_drk')){?><img src="<?php echo $link['drk'][18] ?>" alt="<?php echo $link['drk'][18] ?>" title="Mehrzweckkraftfahrzeug" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '19'){?><img src="<?php echo $link['drk'][19] ?>" alt="<?php echo $link['drk'][19] ?>" title="Manschafts Transport Fahrzeug" height="150" weigth="150"><?php }

    if($row['fahrzeug_typ'] == '81'){?><img src="<?php echo $link['drk'][81] ?>" alt="<?php echo $link['drk'][81] ?>" title="<?php echo $kenner_disc['art'][81] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '82'){?><img src="<?php echo $link['drk'][82] ?>" alt="<?php echo $link['drk'][82] ?>" title="<?php echo $kenner_disc['art'][82] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '83'){?><img src="<?php echo $link['drk'][83] ?>" alt="<?php echo $link['drk'][83] ?>" title="<?php echo $kenner_disc['art'][83] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '84'){?><img src="<?php echo $link['drk'][84] ?>" alt="<?php echo $link['drk'][84] ?>" title="<?php echo $kenner_disc['art'][84] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '85'){?><img src="<?php echo $link['drk'][85] ?>" alt="<?php echo $link['drk'][85] ?>" title="<?php echo $kenner_disc['art'][85] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '86'){?><img src="<?php echo $link['drk'][86] ?>" alt="<?php echo $link['drk'][86] ?>" title="<?php echo $kenner_disc['art'][86] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '87'){?><img src="<?php echo $link['drk'][87] ?>" alt="<?php echo $link['drk'][87] ?>" title="<?php echo $kenner_disc['art'][87] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '88'){?><img src="<?php echo $link['drk'][88] ?>" alt="<?php echo $link['drk'][88] ?>" title="<?php echo $kenner_disc['art'][88] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '89'){?><img src="<?php echo $link['drk'][89] ?>" alt="<?php echo $link['drk'][89] ?>" title="<?php echo $kenner_disc['art'][89] ?>" height="150" weigth="150"><?php }

    if($row['fahrzeug_typ'] == '90'){?><img src="<?php echo $link['drk'][90] ?>" alt="<?php echo $link['drk'][90] ?>" title="<?php echo $kenner_disc['art'][90] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '91'){?><img src="<?php echo $link['drk'][91] ?>" alt="<?php echo $link['drk'][91] ?>" title="<?php echo $kenner_disc['art'][91] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '92'){?><img src="<?php echo $link['drk'][92] ?>" alt="<?php echo $link['drk'][92] ?>" title="<?php echo $kenner_disc['art'][92] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '93'){?><img src="<?php echo $link['drk'][93] ?>" alt="<?php echo $link['drk'][93] ?>" title="<?php echo $kenner_disc['art'][93] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '94'){?><img src="<?php echo $link['drk'][94] ?>" alt="<?php echo $link['drk'][94] ?>" title="<?php echo $kenner_disc['art'][94] ?>" height="150" weigth="150"><?php }
  }
  if(($row['fahrzeug_organisation'] == 'juh') OR $row['fahrzeug_organisation'] =='rd_juh'){

    if($row['fahrzeug_typ'] == '11'){?><img src="<?php echo $link['juh'][11] ?>" alt="<?php echo $link['juh'][11] ?>" title="<?php echo $kenner_disc['art'][94] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '12'){?><img src="<?php echo $link['juh'][12] ?>" alt="<?php echo $link['juh'][12] ?>" title="<?php echo $kenner_disc['art'][94] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '13'){?><img src="<?php echo $link['juh'][13] ?>" alt="<?php echo $link['juh'][13] ?>" title="<?php echo $kenner_disc['art'][94] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '14'){?><img src="<?php echo $link['juh'][14] ?>" alt="<?php echo $link['juh'][14] ?>" title="<?php echo $kenner_disc['art'][94] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '15'){?><img src="<?php echo $link['juh'][15] ?>" alt="<?php echo $link['juh'][15] ?>" title="<?php echo $kenner_disc['art'][94] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '16'){?><img src="<?php echo $link['juh'][16] ?>" alt="<?php echo $link['juh'][16] ?>" title="<?php echo $kenner_disc['art'][94] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '17'){?><img src="<?php echo $link['juh'][17] ?>" alt="<?php echo $link['juh'][17] ?>" title="<?php echo $kenner_disc['art'][94] ?>" height="150" weigth="150"><?php }

    if(($row['fahrzeug_typ'] == '18') AND ($row['fahrzeug_organisation'] == 'juh' OR 'rd_juh')){?><img src="<?php echo $link['juh'][18] ?>" title="<?php echo $kenner_disc['art'][18] ?>" alt="<?php echo $link['juh'][18] ?>"  height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '19'){?><img src="<?php echo $link['juh'][19] ?>" alt="<?php echo $link['juh'][19] ?>" title="<?php echo $kenner_disc['art'][19] ?>" height="150" weigth="150"><?php }

    if($row['fahrzeug_typ'] == '81'){?><img src="<?php echo $link['juh'][81] ?>" alt="<?php echo $link['juh'][81] ?>" title="<?php echo $kenner_disc['art'][81] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '82'){?><img src="<?php echo $link['juh'][82] ?>" alt="<?php echo $link['juh'][82] ?>" title="<?php echo $kenner_disc['art'][82] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '83'){?><img src="<?php echo $link['juh'][83] ?>" alt="<?php echo $link['juh'][83] ?>" title="<?php echo $kenner_disc['art'][83] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '84'){?><img src="<?php echo $link['juh'][84] ?>" alt="<?php echo $link['juh'][84] ?>" title="<?php echo $kenner_disc['art'][84] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '85'){?><img src="<?php echo $link['juh'][85] ?>" alt="<?php echo $link['juh'][85] ?>" title="<?php echo $kenner_disc['art'][85] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '86'){?><img src="<?php echo $link['juh'][86] ?>" alt="<?php echo $link['juh'][86] ?>" title="<?php echo $kenner_disc['art'][86] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '87'){?><img src="<?php echo $link['juh'][87] ?>" alt="<?php echo $link['juh'][87] ?>" title="<?php echo $kenner_disc['art'][87] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '88'){?><img src="<?php echo $link['juh'][88] ?>" alt="<?php echo $link['juh'][88] ?>" title="<?php echo $kenner_disc['art'][88] ?>" height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '89'){?><img src="<?php echo $link['juh'][89] ?>" alt="<?php echo $link['juh'][89] ?>" title="<?php echo $kenner_disc['art'][89] ?>" height="150" weigth="150"><?php }

    if($row['fahrzeug_typ'] == '90'){?><img src="<?php echo $link['juh'][90] ?>" alt="<?php echo $link['juh'][90] ?>"  title="<?php echo $kenner_disc['art'][90] ?>"height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '91'){?><img src="<?php echo $link['juh'][91] ?>" alt="<?php echo $link['juh'][91] ?>"  title="<?php echo $kenner_disc['art'][91] ?>"height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '92'){?><img src="<?php echo $link['juh'][92] ?>" alt="<?php echo $link['juh'][92] ?>"  title="<?php echo $kenner_disc['art'][92] ?>"height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '93'){?><img src="<?php echo $link['juh'][93] ?>" alt="<?php echo $link['juh'][93] ?>"  title="<?php echo $kenner_disc['art'][93] ?>"height="150" weigth="150"><?php }
    if($row['fahrzeug_typ'] == '94'){?><img src="<?php echo $link['juh'][94] ?>" alt="<?php echo $link['juh'][94] ?>"  title="<?php echo $kenner_disc['art'][94] ?>"height="150" weigth="150"><?php }
  }



  echo "<br /><span style=\"font-size: 40; background-color: orange;\">".$row['fahrzeug_funkkenner']."</span><br />";

  $sql = "SELECT * FROM fahrzeuge WHERE fahrzeug_id = ".$fahrzeug_id;
  foreach ($pdo->query($sql) as $key) {
    if($key['aed'] == 1){?> <img src="styles/aed.png" alt="AED" width="40" height="40" title="AED"> <?php }
    if($key['ekg'] == 1){?> <img src="styles/ekg.png" alt="AED" width="40" height="40" title="EKG"> <?php }
    if($key['nfr_klein'] == 1){?> <img src="styles/nfr.png" alt="AED" width="40" height="40" title="kleiner NFR"> <?php}
    if($key['nfr_gross'] == 1){?> <img src="styles/nfr.png" alt="AED" width="80" height="80" title="großer NFR"> <?php }
    #if($key['medikamente'] == 1){}
    #if($key['liegendtrage'] == 1){}
    #if($key['tragestuhl'] == 1){}
    if($key['sauer_klein'] == 1){?> <img src="styles/o2k.png" alt="AED" width="40" height="60" title="kleiner Sauerstoff"> <?php }
    if($key['sauer_gross'] == 1){?> <img src="styles/o2g.png" alt="AED" width="40" height="80" title="grosser Sauerstoff"> <?php }
  }


  //status
  ?>
  </div>
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="hidden" name="f_fahrzeuge_id" value="<?php echo $fahrzeug_id; ?>">
  <center>
    <?php
    $bg = "";
    switch ($row['fahrzeug_status']) {
      case '1': $bg =  "background-color: blue;"; break;
      case '2': $bg =  "background-color: green;"; break;
      case '3': $bg =  "background-color: yellow;"; break;
      case '4': $bg =  "background-color: red;"; break;
      case '5': $bg =  "background-color: black; color: white;"; break;
      case '6': $bg =  "background-color: purple;"; break;
      case '7': $bg =  "background-color: orange;"; break;
      case '8': $bg =  "background-color: light-green;"; break;
      case '9': $bg =  "background-color: purple;"; break;
      case '0': $bg =  "background-color: black; color: black;"; break;
    } ?>
  <style media="screen">
    select{
      background-color: <?php echo $bg ?>;
    }
  </style>
  <select class="status" name="f_status" style="width: 80px; text-align: center; height: 50px; display: inline; float: center; background-color: <?php echo $bg ?>">
    	<!-- current status -->

      <option style="<?php echo $bg  ?>">
      <?php
      switch ($row['fahrzeug_status']) {
        case '1': echo "Status 1"; break;
        case '2': echo "Status 2"; break;
        case '3': echo "Status 3"; break;
        case '4': echo "Status 4"; break;
        case '5': echo "Status 5"; break;
        case '6': echo "Status 6"; break;
        case '7': echo "Status 7"; break;
        case '8': echo "Status 8"; break;
        case '9': echo "Status 9"; break;
        case '0': echo "Status 0"; break;
      } ?></option>
      <!-- Normale Stauts-->


        <option value="1" style="background-color: blue;" title="Frei über Funk" >Status 1 </option>
        <option value="2" style="background-color: green;" title="Frei auf Wache" >Status 2 </option>
        <option value="3" style="background-color: yellow; color: black" title="Einsatz übernommen" >Status 3 </option>
        <option value="4" style="background-color: red;" title="An Einsatzstelle" >Status 4 </option>
        <option value="5" style="background-color: black; color: white;" title="Sprechwunsch!" >Status 5 </option>
        <option value="6" style="background-color: purple;" title="Fahrzeug nicht einsatzbereit">Status 6 </option>
        <option value="7" style="background-color: orange;" title="Fahrzeug einsatzgebunden/Patient verlastet">Status 7 </option>
        <option value="8" style="background-color: white; color: black;" title="Verlegungsziel erreicht">Status 8 </option>
        <option value="9" style="background-color: purple;" title="Fremdanmeldung/ NEF->NA an Bord" >Status 9 </option>



  </select><br /></center>



  <?php

  echo $row['fahrzeug_kennzeichen'];
  ?>
  <table>
    <tr><td><?php echo $row['fahrzeug_aktion']; ?></td>
    <td><?php echo $row['fahrzeug_ziel']; ?></td></tr>
  </table>
  <table>
    <tr><td><?php echo "Maschinist &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp| ";
    $id = "fahrzeug_besatzung_1";
    $b = "SELECT * FROM personal WHERE personal_id = ".$row[$id];
    foreach ($pdo->query($b) as $personal) {

      $hoe_dienstgrad = "";
      $hoe_fkgrad = "";

      if($personal['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
      if($personal['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitäter"; }
      if($personal['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
      if($personal['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitäter"; }
      if($personal['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

      if($personal['personal_tf'] == 1){ $hoe_fkgrad = "Truppführer"; }
      if($personal['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenführer"; }
      if($personal['personal_zf'] == 1){ $hoe_fkgrad = "Zugführer"; }
      if($personal['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsführer"; }
      ?>
      <?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?><?php
    }//end foreach
     ?></td></tr>
    <tr><td><?php echo "Fahrzeugführer | ";
    $id = "fahrzeug_besatzung_2";
    $b = "SELECT * FROM personal WHERE personal_id = ".$row[$id];
    foreach ($pdo->query($b) as $personal) {

      $hoe_dienstgrad = "";
      $hoe_fkgrad = "";

      if($personal['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
      if($personal['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitäter"; }
      if($personal['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
      if($personal['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitäter"; }
      if($personal['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

      if($personal['personal_tf'] == 1){ $hoe_fkgrad = "Truppführer"; }
      if($personal['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenführer"; }
      if($personal['personal_zf'] == 1){ $hoe_fkgrad = "Zugführer"; }
      if($personal['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsführer"; }
      ?>
      <?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?><?php
    }//end foreach
     ?></td></tr>
    <tr><td><?php echo "dritter Mann &nbsp&nbsp&nbsp&nbsp&nbsp| ";
    $id = "fahrzeug_besatzung_3";
    $b = "SELECT * FROM personal WHERE personal_id = ".$row[$id];
    foreach ($pdo->query($b) as $personal) {

      $hoe_dienstgrad = "";
      $hoe_fkgrad = "";

      if($personal['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
      if($personal['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitäter"; }
      if($personal['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
      if($personal['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitäter"; }
      if($personal['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

      if($personal['personal_tf'] == 1){ $hoe_fkgrad = "Truppführer"; }
      if($personal['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenführer"; }
      if($personal['personal_zf'] == 1){ $hoe_fkgrad = "Zugführer"; }
      if($personal['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsführer"; }
      ?>
      <?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?><?php
    }//end foreach
     ?></td></tr>

    <?php switch ($row['fahrzeug_typ']) {
      case '93':
        ?>
        <tr><td><?php echo "vierter Mann &nbsp&nbsp&nbsp&nbsp| ";


                $id = "fahrzeug_besatzung_4";
                $b = "SELECT * FROM personal WHERE personal_id = ".$row[$id];
                foreach ($pdo->query($b) as $personal) {

                  $hoe_dienstgrad = "";
                  $hoe_fkgrad = "";

                  if($personal['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
                  if($personal['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitäter"; }
                  if($personal['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
                  if($personal['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitäter"; }
                  if($personal['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

                  if($personal['personal_tf'] == 1){ $hoe_fkgrad = "Truppführer"; }
                  if($personal['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenführer"; }
                  if($personal['personal_zf'] == 1){ $hoe_fkgrad = "Zugführer"; }
                  if($personal['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsführer"; }
                  ?>
                  <?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                  echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?><?php
                }//end foreach

         ?></td></tr>
        <tr><td><?php echo "fünfter Mann &nbsp&nbsp&nbsp&nbsp| ";
                  $id = "fahrzeug_besatzung_5";
                $b = "SELECT * FROM personal WHERE personal_id = ".$row[$id];
                foreach ($pdo->query($b) as $personal) {

                  $hoe_dienstgrad = "";
                  $hoe_fkgrad = "";

                  if($personal['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
                  if($personal['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitäter"; }
                  if($personal['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
                  if($personal['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitäter"; }
                  if($personal['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

                  if($personal['personal_tf'] == 1){ $hoe_fkgrad = "Truppführer"; }
                  if($personal['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenführer"; }
                  if($personal['personal_zf'] == 1){ $hoe_fkgrad = "Zugführer"; }
                  if($personal['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsführer"; }
                  ?>
                  <?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                  echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?><?php
                }//end foreach
?></td></tr>
        <tr><td><?php echo "sechster Mann &nbsp&nbsp&nbsp| ";
        $id = "fahrzeug_besatzung_6";
        $b = "SELECT * FROM personal WHERE personal_id = ".$row[$id];
        foreach ($pdo->query($b) as $personal) {

          $hoe_dienstgrad = "";
          $hoe_fkgrad = "";

          if($personal['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
          if($personal['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitäter"; }
          if($personal['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
          if($personal['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitäter"; }
          if($personal['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

          if($personal['personal_tf'] == 1){ $hoe_fkgrad = "Truppführer"; }
          if($personal['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenführer"; }
          if($personal['personal_zf'] == 1){ $hoe_fkgrad = "Zugführer"; }
          if($personal['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsführer"; }
          ?>
          <?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
          echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?><?php
        }//end foreach
?></td></tr>
        <?php
        break;
      default:
        break;
        ?>



        <?php
    } ?>


  </table>
  <input type="hidden" name="f_new_fahrzeug_funkkenner" value="<?php echo $row['fahrzeug_funkkenner']; ?>" />
  <input type="hidden" name="f_fahrzuge_id" value="<?php echo $row['fahrzeug_id'] ?>" />
  <input type="hidden" name="f_fahrzeug_status_alt" value="<?php echo $status_alt; ?>">


  <?php
  echo"</center>";
}



 ?>
<div style=" text-align: center; float: center; ">
  <center>
  <input type="submit" name="f_fahrzeug_safe_settings" value="SPEICHERN"style="width: 33%; height: 50px; float: center;"  />
</center>
</form><br />

<form action="fahrzeuge.php" method="post">
     <input type="submit" name="" value="ZURÜCK" style="width: 33%; height: 50px;">
   </form>
<form action="fahrzeuge_bearbeiten.php" method="post">

  <input type="submit" name="f_fahrzeug_bearbeiten" value="BEARBEITEN"style="width: 33%; height: 50px;">
  <input type="hidden" name="f_fahrzeuge_id" value="<?php echo $fahrzeug_id; ?>">
</form>

<form class="" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
  <select class="" name="f_loc" required>
    <?php
      foreach ($pdo->query("SELECT * FROM prop_stasse") as $key) {
        ?>
        <option value="<?php echo $key['prop_id'] ?>"><?php echo $key['prop_art'].": ".$key['prop_title']." (".$key['prop_id'].")" ?></option>
        <?php
      }

     ?>
  </select>
  <input type="hidden" name="f_fahrzeuge_id" value="<?php echo $fahrzeug_id ?>">
  <input type="submit" name="f_go" value="LOKATION AENDERN">
</form>
<?php
if(isset($_POST['f_go'])){
  $sql = "UPDATE fahrzeuge SET fahrzeug_adresse = ? WHERE fahrzeug_id = ?";
  $up = $pdo->prepare($sql);
  $up->execute([$_POST['f_loc'], $fahrzeug_id]);

}
 ?>

</div>

</div>
