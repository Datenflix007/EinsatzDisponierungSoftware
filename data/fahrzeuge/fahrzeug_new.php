<style media="screen">
  body{
    background-color: grey;
    font-size: 20;
    color: white;
  }
  select{
    background-color: grey;
    color: white;
    font-size: 20;
  }
</style>
<body>
<?php
if(isset($_POST['f_fahrzeuge_add'])){
  include('../ini.php');
  include('../read_dll.php')


  ?>
  <h1 style="color: white; text-decoration: overline underline;">HINZUFÜGEN</h1>
  <details open style="border: medium; border-color: white; background-color: #585858;" >
    <summary><span style="font-size: 40px;">Funk-Kenner</span></summary>

  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <!-- Manuell-->
    &nbsp &nbsp &nbsp<input type="text" name="f_new_fahrzeug_funkkenner" value="Funkkenner" /><br /><br />
    &nbsp &nbsp &nbsp <span style="background-color: orange;"><input type="checkbox" name="f_new_fahrzeug_funkkenner_modul" value="1"> Wachenmodul nutzen</span>
    <table style="margin-left: 30px;">
    <tr>
      <td style="background-color: orange;" title="Hilfs-Organisation">Hi.-Org.:</td>
      <td ><input type="text" name="f_new_fahrzeug_hiorg" placeholder="---" style="width: 30px;" /></td>
      <td>&nbsp oder &nbsp</td>
      <td><select name="f_new_fahrzeug_organisation_s"style="width: 350px;">
        <option value="--"> -- </option>
        <optgroup label="Rettung">
          <option value="rd_drk" title="Deutsches Rotes Kreuz">DRK</option>
          <option value="rd_juh" title="Johaniter Unfall Hilfe">JUH</option>
          <option value="rd_mhd" title="Malter Hilfsdienst">MHD</option>
          <option value="rd_asb" title="Arbeiter Samariter Bund">ASB</option>
          <option value="rd_rd" title="Falck Rettung/ Aischer Ambulance/ etc.">Private</option>
        </optgroup>
        <optgroup label="KatS/Bereitschaften">
          <option value="drk_bw" title="DRK Bereitschaft, spezialisiert für Rettung im Gelände">Bergwacht</option>
          <option value="drk_ww" title="DRK Bereitschaft, spezialisiert für Rettung im Gewässer">Wasserwacht</option>
          <option value="drk_rhs" title="DRK Bereitschaft, spezialisiert für Lokalisierung ">Rettungshundestaffel</option>
        </optgroup>
        <optgroup label="Sonst.BOS">
          <option value="thw">THW</option>
          <option value="bw_san">Bundeswehr Sanitätsdienst</option>
        </optgroup>

      </select></td>
    </tr>
    <tr>
      <td style="background-color: orange;">Standort:</td>
      <td><input type="text" name="f_new_fahrzeug_standort"  placeholder="---" style="width: 30px;" /></td>
      <td>&nbsp oder &nbsp</td>
      <td>
        <?php $sql = "SELECT * FROM prop_wachen";?>
        <select name="f_new_fahrzeug_standort_s" style="width: 350px;">
          <option value="--"> -- </option>
        <optgroup label="Burgenlandkreis">
        <?php
        foreach ($pdo->query("SELECT * FROM prop_wachen  WHERE prop_wachen_lk = 'BLK' ORDER BY prop_wachen_nr asc") as $row) {
          ?>
          <option value="<?php echo $row['prop_wachen_nr']; ?>">
              <?php echo $row['prop_wachen_hiorg']." ".$row['prop_wachen_standort_name'];?>
              <?php echo "(".$row['prop_wachen_nr'].")"; ?>
          </option>

        <?php
        }
        ?>
      </optgroup>
      <optgroup label="Sonstiges">
      <?php
      foreach ($pdo->query("SELECT * FROM prop_wachen  WHERE prop_wachen_lk != 'BLK'") as $row) {
        ?>
        <option value="<?php echo $row['prop_wachen_id']; ?>">
            <?php echo $row['prop_wachen_hiorg']." ".$row['prop_wachen_standort_name'];?>
            <?php echo "(".$row['prop_wachen_nr'].")"; ?>
        </option>

      <?php
      }
      ?>
    </optgroup>
      </select>

      </td>
    </tr>
    <tr>
      <td style="background-color: orange;">Kfz.-typ:</td>
      <td><input type="text" name="f_new_fahrzeug_fahrzeugtyp" placeholder="---" style="width: 30px;" /></td>
      <td>&nbsp oder &nbsp</td>
      <?php
            include("../read_dll.php");
            $bos = parse_ini_file($link_bos_kenner_art_abs);
            $bos_disc = parse_ini_file($link_bos_kenner_disc_abs);?>

      <td><select name="f_new_fahrzeug_fahrzeugtyp_s" style="width: 350px;">

        <option value="--"> -- </option>
        <optgroup label="Läufertrupps">
          <option value="LTru">Sanitätstrupp</option>
          <option value="LTru">Tragentrupp</option>
        </optgroup>
        <optgroup label="BOS FK">
          <option value="00" title="<?php echo $bos_disc['art'][0]; ?>"> 00 - <?php echo $bos['art'][0]; ?></option>
          <option value="01" title="<?php echo $bos_disc['art'][1]; ?>"> 01 - <?php echo $bos['art'][1] ?></option>
          <option value="02" title="<?php echo $bos_disc['art'][2]; ?>"> 02 - <?php echo $bos['art'][2] ?></option>
          <option value="03" title="<?php echo $bos_disc['art'][3]; ?>"> 03 - <?php echo $bos['art'][3] ?></option>
          <option value="04" title="<?php echo $bos_disc['art'][4]; ?>"> 04 - <?php echo $bos['art'][4] ?></option>
          <option value="05" title="<?php echo $bos_disc['art'][5]; ?>"> 05 - <?php echo $bos['art'][5] ?></option>
          <option value="06" title="<?php echo $bos_disc['art'][6]; ?>"> 06 - <?php echo $bos['art'][6] ?></option>
          <option value="07" title="<?php echo $bos_disc['art'][7]; ?>"> 07 - <?php echo $bos['art'][7] ?></option>
          <option value="08" title="<?php echo $bos_disc['art'][8]; ?>"> 08 - <?php echo $bos['art'][8] ?></option>
          <option value="09" title="<?php echo $bos_disc['art'][9]; ?>"> 09 - <?php echo $bos['art'][9] ?></option>
          <option value="10" title="<?php echo $bos_disc['art'][10]; ?>"> 10 - <?php echo $bos['art'][10] ?></option>
        </optgroup>
        <optgroup label="Führung">
          <option value="11" title="<?php echo $bos_disc['art'][11]; ?>" > 11 - <?php echo $bos['art'][11] ?></option>
          <option value="13" title="<?php echo $bos_disc['art'][13]; ?>" > 13 - <?php echo $bos['art'][13] ?></option>
          <option value="12" title="<?php echo $bos_disc['art'][12]; ?>" > 12 - <?php echo $bos['art'][12] ?></option>
          <option value="14" title="<?php echo $bos_disc['art'][14]; ?>" > 14 - <?php echo $bos['art'][14] ?></option>
          <option value="15" title="<?php echo $bos_disc['art'][15]; ?>" > 15 - <?php echo $bos['art'][15] ?></option>
          <option value="16" title="<?php echo $bos_disc['art'][16]; ?>" > 16 - <?php echo $bos['art'][16] ?></option>
          <option value="17" title="<?php echo $bos_disc['art'][17]; ?>" > 17 - <?php echo $bos['art'][17] ?></option>
          <option value="18" title="<?php echo $bos_disc['art'][18]; ?>" > 18 - <?php echo $bos['art'][18] ?></option>
          <option value="19" title="<?php echo $bos_disc['art'][19]; ?>" > 19 - <?php echo $bos['art'][19] ?></option>
        </optgroup>
        <optgroup label="Löschis">
          <option value="20" title="<?php echo $bos_disc['art'][20]; ?>"> 20er - <?php echo $bos['art'][20] ?></option>
          <option value="30" title="<?php echo $bos_disc['art'][30]; ?>"> 30er - <?php echo $bos['art'][30] ?></option>
          <option value="40" title="<?php echo $bos_disc['art'][40]; ?>"> 40er - <?php echo $bos['art'][40] ?></option>
          <option value="50" title="<?php echo $bos_disc['art'][50]; ?>"> 50er - <?php echo $bos['art'][50] ?></option>
          <option value="70" title="<?php echo $bos_disc['art'][70]; ?>"> 70er - <?php echo $bos['art'][70] ?></option>
          <option value="60" title="<?php echo $bos_disc['art'][60]; ?>"> 60er - <?php echo $bos['art'][60] ?></option>
        </optgroup>
        <optgroup label="Rettung">
          <option value="80" title="<?php echo $bos_disc['art'][80]; ?>" > 80 - <?php echo $bos['art'][80] ?></option>
          <option value="81" title="<?php echo $bos_disc['art'][81]; ?>" > 81 - <?php echo $bos['art'][81] ?></option>
          <option value="82" title="<?php echo $bos_disc['art'][82]; ?>" > 82 - <?php echo $bos['art'][82] ?></option>
          <option value="83" title="<?php echo $bos_disc['art'][83]; ?>" > 83 - <?php echo $bos['art'][83] ?></option>
          <option value="84" title="<?php echo $bos_disc['art'][84]; ?>" > 84 - <?php echo $bos['art'][84] ?></option>
          <option value="85" title="<?php echo $bos_disc['art'][85]; ?>" > 85 - <?php echo $bos['art'][85] ?></option>
          <option value="87" title="<?php echo $bos_disc['art'][87]; ?>" > 87 - <?php echo $bos['art'][87] ?></option>
          <option value="86" title="<?php echo $bos_disc['art'][86]; ?>" > 86 - <?php echo $bos['art'][86] ?></option>
          <option value="88" title="<?php echo $bos_disc['art'][88]; ?>" > 88 - <?php echo $bos['art'][88] ?></option>
          <option value="89" title="<?php echo $bos_disc['art'][89]; ?>" > 89 - <?php echo $bos['art'][89] ?></option>
        </optgroup>
        <optgroup label="Gerätewägen">
          <option value="90" title="<?php echo $bos_disc['art'][90]; ?>" > 90 - <?php echo $bos['art'][90] ?></option>
          <option value="91" title="<?php echo $bos_disc['art'][91]; ?>" > 91 - <?php echo $bos['art'][91] ?></option>
          <option value="92" title="<?php echo $bos_disc['art'][92]; ?>" > 92 - <?php echo $bos['art'][92] ?></option>
          <option value="94" title="<?php echo $bos_disc['art'][94]; ?>" > 94 - <?php echo $bos['art'][94] ?></option>
          <option value="93" title="<?php echo $bos_disc['art'][93]; ?>" > 93 - <?php echo $bos['art'][93] ?></option>
          <option value="95" title="<?php echo $bos_disc['art'][95]; ?>" > 95 - <?php echo $bos['art'][95] ?></option>
          <option value="96" title="<?php echo $bos_disc['art'][96]; ?>" > 96 - <?php echo $bos['art'][96] ?></option>
          <option value="97" title="<?php echo $bos_disc['art'][97]; ?>" > 97 - <?php echo $bos['art'][97] ?></option>
          <option value="98" title="<?php echo $bos_disc['art'][98]; ?>" > 98 - <?php echo $bos['art'][98] ?></option>
          <option value="99" title="<?php echo $bos_disc['art'][99]; ?>" > 99 - <?php echo $bos['art'][99] ?></option>
        </optgroup>
      </select>

</td>
    </tr>
    <tr>
      <td style="background-color: orange;">Kfz.-Nr.:</td>
      <td><input type="text" name="f_new_fahrzeug_fahrzeugnr"  placeholder="--" style="width: 30px;" /></td>
      <td>&nbsp oder &nbsp</td>
      <td><select name="f_new_fahrzeug_fahrzeugnr_s" style="width: 350px;">
        <option value="--"> -- </option>
        <option value="01">&nbsp01&nbsp</option>
        <option value="02">&nbsp02&nbsp</option>
        <option value="03">&nbsp03&nbsp</option>
        <option value="04">&nbsp04&nbsp</option>
        <option value="05">&nbsp05&nbsp</option>
        <option value="06">&nbsp06&nbsp</option>
        <option value="07">&nbsp07&nbsp</option>
        <option value="08">&nbsp08&nbsp</option>
        <option value="09">&nbsp09&nbsp</option>
        <option value="10">&nbsp10&nbsp</option>
        </select></td>
    </tr></table>
</details>




<details style="border: medium; border-color: white; background-color: #585858;" >
  <summary><span style="font-size: 40px;">Bereitschaft</span></summary>

    <select name="f_new_fahrzeug_status" style="text-align: center; width: 120px; margin-left: 30px;">

      <option value="1" style="background-color: blue;" title="<?php echo $fahr_status['tit']['1'] ?>" >&nbspStatus&nbsp1&nbsp</option>
      <option value="2" style="background-color: green;" title="<?php echo $fahr_status['tit'][2] ?>" >&nbspStatus&nbsp2&nbsp</option>
      <option value="3" style="background-color: yellow; color: black" title="<?php echo $fahr_status['tit']['3'] ?>" >&nbspStatus&nbsp3&nbsp</option>
      <option value="4" style="background-color: red;" title="<?php echo $fahr_status['tit']['4'] ?>" >&nbspStatus&nbsp4&nbsp</option>
      <option value="5" style="background-color: black; color: white;" title="<?php echo $fahr_status['tit']['5'] ?>" >&nbspStatus&nbsp5&nbsp</option>
      <option value="6" style="background-color: purple;" title="<?php echo $fahr_status['tit']['6'] ?>" >&nbspStatus&nbsp6&nbsp</option>
      <option value="7" style="background-color: orange;" title="<?php echo $fahr_status['tit']['7'] ?>" >&nbspStatus&nbsp7&nbsp</option>
      <option value="8" style="background-color: white; color: black;" title="<?php echo $fahr_status['tit']['8'] ?>">&nbspStatus&nbsp8&nbsp</option>
      <option value="9" style="background-color: purple;" title="<?php echo $fahr_status['tit']['9'] ?>" >&nbspStatus&nbsp9&nbsp</option>

    </select><br />


    <input type="text" name="f_new_fahrzeug_aktion" value="Aktion" style="width: 80px; margin-left: 30px;" /> oder
    <select class="" name="f_new_fahrzeug_aktion_s" >
      <option value="--">--</option>
      <optgroup label="Status 1">
        <option value="Einsatzbereit"> Einsatzbereit </option>
        <option value="Verlegung Standort"> Verlegung Standort </option>
        <option value="Rückverlegung"> Rückverlegung </option>
        <option value="Tanken"> Tanken </option>
      </optgroup>
      <optgroup label="Status 2">
        <option value="Einsatzbereit">Einsatzbereit</option>
      </optgroup>
      <optgroup label="Status 3">
        <option value="Einsatz übernommen">Einsatz übernommen</option>
        <option value="Einsatz übernommen">Einsatz Anfahrt</option>
      </optgroup>
      <optgroup label="Status 4">
        <option value="Einsatzort erreicht">Einsatzort erreicht</option>
      </optgroup>
      <optgroup label="Status 5">
        <option value="Sprechwunsch!">Sprechwunsch!</option>
      </optgroup>
      <optgroup label="Status 6">
        <option value="Defekt">Defekt</option>
        <option value="Schulungsfahrt">Schulungsfahrt</option>
        <option value="Desinfektion">Desinfektion</option>
      </optgroup>
      <optgroup label="Status 7">
        <option value="Patient übernommen">Patient übernommen</option>
        <option value="Patientienablage herstellen">Patientienablage herstellen</option>
        <option value="Behandlungsplatz herstellen">Behandlungsplatz herstellen</option>
      </optgroup>
      <optgroup label="Status 8">
        <option value="Patientienablage erreicht">Patientienablage erreicht</option>
        <option value="Behandlungsplatz erreicht">Behandlungsplatz erreicht</option>
        <option value="Klinikum erreicht">Klinikum erreicht</option>
      </optgroup>
      <optgroup label="Status 9">
        <option value="Fremdanmeldung">Fremdanmeldung</option>
        <option value="Notarzt an Bord">Notarzt an Bord</option>
      </optgroup>
    </select><br />
    <input type="text" name="f_new_fahrzeug_ziel" value="Ziel" style="width: 100px; margin-left: 30px;" /> oder <select class="" name="">

    </select><br />
    <input type="text" name="f_new_fahrzeug_ziel_koordinaten" value="Ziel-Koordinaten" style=" margin-left: 30px;" />

  </details>
  <details style="border: medium; border-color: white; background-color: #585858;" >
    <summary><span style="font-size: 40px;">Sonstiges</span></summary>
    <input type="text" name="f_new_fahrzeug_kennzeichen" placeholder="Kennzeichen" style=" margin-left: 30px;" /><br /><br />
    <table>
      <tr>
        <td><span title="Automatisch-Elektronische-Defibrillator">AED:&nbsp</span></td>
        <td><input type="hidden" name="f_e_aed" value="0"><input type="checkbox" name="f_e_aed" value="1"></td>
      </tr>
      <tr>
        <td><span title="Elektronisches Kardiogramm">EKG:&nbsp</span></td>
        <td><input type="hidden" name="f_e_ekg" value="0"><input type="checkbox" name="f_e_ekg" value="1"></td>
      </tr>
      <tr>
        <td><span title="Sauerstoff&nbsp-&nbspklein">O2k:&nbsp</span></td>
        <td><input type="hidden" name="f_e_o2k" value="0"><input type="checkbox" name="f_e_o2k" value="1"></td>
      </tr>
      <tr>
        <td><span title="Sauerstoff&nbsp-&nbspgross">O2g:&nbsp</span></td>
        <td><input type="hidden" name="f_e_o2g" value="0"><input type="checkbox" name="f_e_o2g" value="1"></td>
      </tr>
    </table>
    <table>
      <tr>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </table>




  </details>

  <details  style="border: medium; border-color: white; background-color: #585858;" >
    <summary><span style="font-size: 40px;">Besatzung:</span></summary>


    <br />
    <table style=" margin-left: 30px;">
      <tr>
        <td>1</td>
        <td><select name="f_new_fahrzeug_besatzung_1">
         <?php
         foreach ($pdo->query("SELECT * FROM personal") as $personal) {
           $hoe_dienstgrad = "";
           $hoe_fkgrad = "";

           if($personal['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
           if($peronal['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitäter"; }
           if($peronal['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
           if($peronal['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitäter"; }
           if($peronal['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

           if($personal['personal_tf'] == 1){ $hoe_fkgrad = "Truppführer"; }
           if($personal['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenführer"; }
           if($personal['personal_zf'] == 1){ $hoe_fkgrad = "Zugführer"; }
           if($personal['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsführer"; }
           ?>
           <option value="<?php echo $personal['personal_id']; ?>" style="marign-left: 30px;"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname']." (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option>
           <?php
         }

          ?>
       </select></td>
      </tr>
      <tr>
        <td>2</td>
        <td><select name="f_new_fahrzeug_besatzung_2">
          <?php
          foreach ($pdo->query("SELECT * FROM personal") as $personal) {
            $hoe_dienstgrad = "";
            $hoe_fkgrad = "";

            if($personal['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
            if($peronal['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitäter"; }
            if($peronal['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
            if($peronal['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitäter"; }
            if($peronal['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

            if($personal['personal_tf'] == 1){ $hoe_fkgrad = "Truppführer"; }
            if($personal['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenführer"; }
            if($personal['personal_zf'] == 1){ $hoe_fkgrad = "Zugführer"; }
            if($personal['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsführer"; }
            ?>
            <option value="<?php echo $personal['personal_id']; ?>" style="marign-left: 30px;"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname']." (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option>
            <?php
          }

           ?>
       </select></td>
      </tr>
      <tr>
        <td>3</td>
        <td><select name="f_new_fahrzeug_besatzung_3">
          <?php
          foreach ($pdo->query("SELECT * FROM personal") as $personal) {
            $hoe_dienstgrad = "";
            $hoe_fkgrad = "";

            if($personal['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
            if($peronal['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitäter"; }
            if($peronal['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
            if($peronal['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitäter"; }
            if($peronal['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

            if($personal['personal_tf'] == 1){ $hoe_fkgrad = "Truppführer"; }
            if($personal['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenführer"; }
            if($personal['personal_zf'] == 1){ $hoe_fkgrad = "Zugführer"; }
            if($personal['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsführer"; }
            ?>
            <option value="<?php echo $personal['personal_id']; ?>" style="marign-left: 30px;"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname']." (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option>
            <?php
          }

           ?>

       </select></td>
      </tr>
    </table>


     <br />
     <br />
     <br />



    <!--<input type="text" name="f_new_fahrzeug_besatzung_1" value="Besatzung.1" />
    <input type="text" name="f_new_fahrzeug_besatzung_2" value="besatzung.2" />
    <input type="text" name="f_new_fahrzeug_besatzung_3" value="besatzung.3" />
    <input type="text" name="f_new_fahrzeug_besatzung_4" value="besatzung.4" />
    <input type="text" name="f_new_fahrzeug_besatzung_5" value="besatzung.5" />
    <input type="text" name="f_new_fahrzeug_besatzung_6" value="besatzung.6" />-->
   </details>
   <center>
    <input type="submit" name="f_new_fahrzeug_generate" value="FAHRZEUG ERSTELLEN" style="text-align: center; width: 33%; height: 50px;">
  </center>
  </form>



  <?php
}
if(isset($_POST['f_new_fahrzeug_generate'])){
  include('../ini.php');
  $fkk = $_POST['f_new_fahrzeug_funkkenner'];
  $fkt = $_POST['f_new_fahrzeug_fahrzeugtyp'];
  $fkhi = $_POST['f_new_fahrzeug_hiorg'];
  $manuell_kenner = "";
  $wanu = "";
  $adresse= "";


  if($_POST['f_new_fahrzeug_standort'] == ""){
    $manuell_kenner = $_POST['f_new_fahrzeug_standort_s'];
    $wanu = $manuell_kenner;
  }
  if($_POST['f_new_fahrzeug_standort'] != ""){
    $manuell_kenner = $_POST['f_new_fahrzeug_standort'];
    $wanu = $manuell_kenner;
  }

  if($_POST['f_new_fahrzeug_fahrzeugtyp'] == ""){
    $manuell_kenner = $manuell_kenner."/".$_POST['f_new_fahrzeug_fahrzeugtyp_s'];
    $fkt = $_POST['f_new_fahrzeug_fahrzeugtyp_s'];
  }
  if($_POST['f_new_fahrzeug_fahrzeugtyp'] != ""){
    $manuell_kenner = $manuell_kenner."/".$_POST['f_new_fahrzeug_fahrzeugtyp'];
  }

  if($_POST['f_new_fahrzeug_fahrzeugnr'] == ""){
    $manuell_kenner = $manuell_kenner."/".$_POST['f_new_fahrzeug_fahrzeugnr_s'];
  }
  if($_POST['f_new_fahrzeug_fahrzeugnr'] != ""){
    $manuell_kenner = $manuell_kenner."/".$_POST['f_new_fahrzeug_fahrzeugnr'];
  }
  if(isset($_POST['f_new_fahrzeug_funkkenner_modul'])){
    echo"Module aktiviert";
    $fkk =  $manuell_kenner;
    $fkhi=  $_POST['f_new_fahrzeug_organisation_s'];
  }
  switch ($wanu) {
    case 'DGN': $adresse = 219; break;

    case '302': $adresse = 434; break;
    case '303': $adresse = 437; break;
    case '304': $adresse = 438; break;

    case '425': $adresse = 436; break;
    case '422': $adresse = 435; break;
    case '432': $adresse = 435; break;
    case '442': $adresse = 436; break;
    case '461': $adresse = 435; break;

  }



  #$entry_var  = "INSERT INTO `fahrzeuge`('fahrzeug_id', `fahrzeug_typ`,`fahrzeug_funkkennerr`,`fahrzeug_kennzeichen`,`fahrzeug_status`,`fahrzeug_aktion`,`fahrzeug_ziel`,`fahrzeug_ziel_koordinaten`,'fahrzeug_besatzung_1','fahrzeug_besatzung_2','fahrzeug_besatzung_3','fahrzeug_besatzung_4','fahrzeug_besatzung_5', 'fahrzeug_besatzung_6')  VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

#$entry_sql = "INSERT INTO fahrzeuge (`fahrzeug_funkkenner`,
#  `fahrzeug_status`,
#  `fahrzeug_kennzeichen`,
#  `fahrzeug_besatzung_1`,
#  `fahrzeug_besatzung_2`,
#  `fahrzeug_besatzung_3`,
  #`fahrzeug_besatzung_4`,
  #`fahrzeug_besatzung_5`,
  #`fahrzeug_besatzung_6`,
#  `fahrzeug_typ`,
#  `fahrzeug_ziel`,
#  `fahrzeug_ziel_koordinaten`,
#  `fahrzeug_aktion`, `fahrzeug_organisation` ) VALUES ( ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; #?,?, ?, ?, ?, ?,
$entry_sql = "INSERT INTO `fahrzeuge` (`fahrzeug_id`, `fahrzeug_einsatz`, `fahrzeug_funkkenner`, `fahrzeug_status`, `fahrzeug_kennzeichen`, `fahrzeug_besatzung_1`, `fahrzeug_besatzung_2`, `fahrzeug_besatzung_3`, `fahrzeug_besatzung_4`, `fahrzeug_besatzung_5`, `fahrzeug_besatzung_6`, `fahrzeug_typ`, `fahrzeug_ziel`, `fahrzeug_aktion`, `fahrzeug_organisation`, `fahrzeug_status_alt`, `fahrzeug_sprechaufforderung`, `aed`, `ekg`, `nfr_klein`, `nfr_gross`, `medikamente`, `liegendtrage`, `tragestuhl`, `sauer_klein`, `sauer_gross`, `fahrzeug_adresse_isset`, `fahrzeug_adresse`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$entry = $pdo->prepare($entry_sql);
$statement = [
  NULL, '', $fkk, $_POST['f_new_fahrzeug_status'], $_POST['f_new_fahrzeug_kennzeichen'], $_POST['f_new_fahrzeug_besatzung_1'],
  $_POST['f_new_fahrzeug_besatzung_2'],
  $_POST['f_new_fahrzeug_besatzung_3'],
  '1', '1', '1',
  $fkt, '', 'Bereitschaft', $fkhi, '', '0',
  $_POST['f_e_aed'], $_POST['f_e_ekg'],
  '0', '0', '0', '0', '0',
  $_POST['f_e_o2k'], $_POST['f_e_o2g'],
  '1', $adresse];
$entry->execute($statement);


$eintrag = $pdo->prepare($sql_insert_in_einsatztagebuch);
$eintrag->execute([NULL,"Fahrzeug generiert!", "00:00:00", $_POST['f_new_fahrzeug_funkkenner']."wurde hinzugefügt!","EL","Disponent"]);
}




 ?>
 <form action="fahrzeuge.php" method="post">
   <center>
   <input type="submit" name="" value="ZURÜCK" style="width: 33%; height: 50px;">
 </center>
 </form>
</body>
