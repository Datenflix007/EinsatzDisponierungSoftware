<style media="screen">
  body{
    background-color: grey;
  }
</style>
<body style="color: white;">
<h1 style="color: white; text-decoration: underline overline; font-size: 40px;">NEUER EINSATZ</h1>

<?php
/*
f_ort_manuell_isset

f_ort_auto_stadt
f_ort_auto_adresse
f_ort_auto_objekt

f_ort_manuell_ortschaft
f_ort_manuell_plz
f_ort_manuell_ortsteil
f_ort_manuell_strasse
f_ort_manuell_hausnummer

f_not_auto_einsatz_stichwort
f_not_signalanfahrt
f_not_manuell_isset
f_not_manuell_alarm_stichwort

f_melder_gender
f_melder_name_vor
f_melder_name_nach
f_melder_telfon

f_pat_gender
f_pat_name_vor
f_pat_name_nach
f_pat_meldebild



*/
 ?>
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

  <details style="border: medium; border-color: white; background-color: #585858;" >
    <summary><span style="font-size: 40px;">Lokation</span></summary>
    <table style="border-bottom-width: 1; border-bottom-color: white;">
      <tr>
        <td>&nbsp</td>
        <td>&nbsp</td>
      </tr>
      <tr>
        <td>&nbsp &nbsp &nbsp automatisch:</td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
          <input type="text" name="f_ort_auto_stadt" list="stadt" placeholder="Stadt" style="background-color: #BDBDBD;">
            <datalist id="stadt"> <?php
              include('../ini.php');
              $sql = "SELECT * FROM prop_stadt";
              foreach ($pdo->query($sql) as $row) {
                  ?>
                  <option value="<?php echo $row['prop_title']; ?>"><?php
              } ?>
            </datalist>
          </input>
        </td>
        <td>
          <input type="search" name="f_ort_auto_adresse" list="adresse"placeholder="Adresse" title="Adresse auswählen" >
          <optgroup label="">

           <datalist id="adresse" >

              <?php
              include('../ini.php');
              $sql = "SELECT * FROM prop_stasse";
              foreach ($pdo->query($sql) as $row) {
                  ?>
                <option value="<?php echo $row['prop_id']; ?>" title="<?php echo $row['prop_discribtion']; ?>" label="<?php echo $row['prop_gemeinde']."-".$row['prop_title']."-".$row['prop_discribtion'] ?>">huhu</option>
                <?php
              }
               ?>

            </datalist>
              </optgroup>
          </input>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </table>


      <details style="border: medium; border-color: white; background-color: #1C1C1C; margin-left: 20px;" ><table>
      <tr>
        <td>&nbsp  manuell:</td>
        <td><input type="checkbox" name="f_ort_manuell_isset" title="Manuell Arbeiten" ></td>
      </tr>
      <tr>
        <td>&nbsp &nbsp &nbsp  <input type="text" name="f_ort_manuell_ortschaft"  placeholder="Alarm-Ortschaft" /></td>
        <td><input type="text" name="f_ort_manuell_plz"  placeholder="Alarm-Postleitzahl"  /></td>
      </tr>
      <tr>
        <td>&nbsp &nbsp &nbsp  <input type="text" name="f_ort_manuell_ortsteil" placeholder="Alarm-Ortsteil" /></td>
        <td></td>
      </tr>
      <tr>
        <td>  &nbsp &nbsp &nbsp <input type="text" name="f_ort_manuell_strasse"  placeholder="Alarm-Strasse"  /></td>
        <td><input type="text" name="f_ort_manuell_hausnummer"  placeholder="Alarm-Hausnummer"  /></td>
      </tr>
      <tr>
        <td>&nbsp</td>
        <td>&nbsp</td>
      </tr>
        </table>
    </details></details>
    <details style="border: medium; border-color: white; background-color: #585858; margin-top:10px;" >
      <summary><span style="font-size: 40px;">Nofall</span></summary>
      Signalanfahrt: <input name="f_not_signalanfahrt" type="checkbox" title="Signalanfahrt" />
      <table>
        <tr>
          <td>&nbsp &nbsp &nbsp automatisch:</td>
          <td></td>
        </tr>
        <tr>
          <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            <select class="" name="f_auto_einsatz_stichwort">
                  <optgroup label="Allgemein">

                        <?php
                        $sql = "SELECT * FROM einsatz_stichwort WHERE einsatz_stichwort_obergruppe = 'RD' && einsatz_stichwort_untergruppe = 'Allgemein'";
                        foreach ($pdo->query($sql) as $einsatz) { ?>
                          <option value="<?php echo $einsatz['einsatz_stichwort_id'] ?>" title="<?php echo $einsatz['einsatz_stichwort_beschreibung'] ?>"><?php echo $einsatz['einsatz_stichwort_title'] ?></option>
                          <?php } ?>
                  </optgroup>
                  <optgroup label="Internistisch">
                        <?php
                        $sql = "SELECT * FROM einsatz_stichwort WHERE einsatz_stichwort_obergruppe = 'RD' && einsatz_stichwort_untergruppe = 'Internistisch'";
                        foreach ($pdo->query($sql) as $einsatz) { ?>
                          <option value="<?php echo $einsatz['einsatz_stichwort_id'] ?>" title="<?php echo $einsatz['einsatz_stichwort_beschreibung'] ?>"><?php echo $einsatz['einsatz_stichwort_title'] ?></option>
                          <?php } ?>
                  </optgroup>
                  <optgroup label="Chirogisch">
                        <?php
                        $sql = "SELECT * FROM einsatz_stichwort WHERE einsatz_stichwort_obergruppe = 'RD' && einsatz_stichwort_untergruppe = 'Chirogisch'";
                        foreach ($pdo->query($sql) as $einsatz) { ?>
                          <option value="<?php echo $einsatz['einsatz_stichwort_id'] ?>" title="<?php echo $einsatz['einsatz_stichwort_beschreibung'] ?>"><?php echo $einsatz['einsatz_stichwort_title'] ?></option>
                          <?php } ?>
                  </optgroup>
        </select>



      </td>

          <td></td>
        </tr>

      </table>



    </details>
    <details style="border: medium; border-color: white; background-color: #585858; margin-top:10px;" >
    <summary><span style="font-size: 40px;">Melder</span></summary>
      <table>

        <tr>
          <td>    <select style="width: 150px; margin-left:50px;" name="f_melder_gender">
             <option value="m">Männlich</option>
             <option value="w">Weiblich</option>
             <option value="d">Divers</option>
           </select>


             </td>
          <td><input placeholder="Vorname" title="Anrufer Vorname" name="f_melder_name_vor" ></td>
        </tr>
        <tr>
          <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" placeholder="Nachname" title="Anrufer Nachname" name="f_melder_name_nach" ></td>
          <td></td>
        </tr>
        <tr>
          <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="tel" placeholder="Telefonnummer" name="f_melder_telefon" ></td>
          <td></td>
        </tr>
      </table>
    </details>

    <details style="border: medium; border-color: white; background-color: #585858; margin-top:10px;" >
    <summary><span style="font-size: 40px;">Patient</span></summary>
      <table>
        <tr>
          <td>

              <select style="width: 150px; margin-left:50px;" name="f_pat_gender">
             <option value="m">Männlich</option>
             <option value="w">Weiblich</option>
             <option value="d">Divers</option>
           </select>


             </td>
          <td><input placeholder="Vorname" title="Patienten Vorname" name="f_pat_name_vor"></td>
        </tr>
        <tr>
          <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" placeholder="Nachname" title="Patienten Nachname" name="f_pat_name_nach"></td>
          <td></td>
        </tr>
        <tr>
          <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" placeholder="Meldebild" name="f_pat_meldebild" ></td>
          <td></td>
        </tr>
      </table>
    </details>
<input type="text" name="f_freitext" placeholder="Freitext" style="width: 100%; height: 10%;">

    <br />
    <br />
    <input type="submit" name="f_new_einsatz_go" value="ERSTELLEN" />

  </form>


  <?php

if(isset($_POST['f_new_einsatz_go'])){

  include('../ini.php');
  echo "Zugriff auf Datenbank...";
  $stichwort = "";
  $lokation = "";
  $adresse_id = "";
  $stadt_id = "";
$adresse_id= $_POST['f_ort_auto_adresse'];

  if(isset($_POST['f_not_manuell_isset'])){
    $stichwort = $_POST['f_not_manuell_alarm_stichwort']; $lokation = "m"; }
  if(!isset($_POST['f_not_manuell_isset'])){

    $stadt_id= $_POST['f_ort_auto_stadt'];
    $stichwort = $_POST['f_auto_einsatz_stichwort'];
  $lokation = $adresse_id;}

        $sql = "INSERT INTO patienten (`patient_id`,
          `patient_einsatz`,
          `patient_triage`,
          `patient_vorname`,
          `patient_nachname`,
          `patient_geburt_tag`,
           `patient_geburt_monat`,
           `patient_geburt_jahr`,
           `patient_stichwort`,
           `patient_lokation`,
           `patient_tod_tag`,
           `patient_tod_monat`,
           `patient_tod_jahr`,
           `patient_tod_stunde`,
           `patient_tod_minute`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

        $insert = $pdo->prepare($sql);
        $insert->execute([NULL,"","",
        $_POST['f_pat_name_vor'],
        $_POST['f_pat_name_nach'],
        "","","", $stichwort,
        $lokation, "","","","",""]);

    $pat_01 = $pdo->lastInsertId();

    $a = "a";
    $statement_inhalt = "";



    if(isset($_POST['f_ort_manuell_isset'])){
      $con = 0;
      if(isset($_POST['f_not_signalanfahrt'])){
        $con = 1;
      }
      $stichwort = $_POST['f_auto_einsatz_stichwort'];
      $statement_inhalt = [NULL,
                            $stichwort,
                            "0",
                            "0",
                            $_POST['f_ort_manuell_strasse'],
                            $_POST['f_ort_manuell_hausnummer'],
                            $_POST['f_ort_manuell_plz'],
                            $_POST['f_ort_manuell_ortschaft'],
                            $_POST['f_ort_manuell_ortsteil'],
                            $_POST['f_melder_gender'],
                            $_POST['f_melder_name_vor'],
                            $_POST['f_melder_name_nach'],
                            $_POST['f_melder_telefon'],
                            "0",
                            "0",
                            "1",
                            $pat_01,
                            $a,"",$_POST['f_freitext']];
    }
    if(!isset($_POST['f_ort_manuell_isset'])){








      $einsatz_x = "";
      $einsatz_y = "";



      $sql = "SELECT * FROM prop_stasse WHERE prop_id = ".$adresse_id;

      foreach ($pdo->query($sql) as $row) {
        $einsatz_x = $row['prop_x'];
        $einsatz_y = $row['prop_y'];
      }


      $con = 0;
      if(isset($_POST['f_not_signalanfahrt'])){
        $con = 1;
      }

      $statement_inhalt = [NULL,
                            $stichwort,
                            $adresse_id,
                            "1",
                            "0",
                            "0",
                            "0",
                            $stadt_id,
                            "0",
                            $_POST['f_melder_gender'],
                            $_POST['f_melder_name_vor'],
                            $_POST['f_melder_name_nach'],
                            $_POST['f_melder_telefon'],
                            "1",
                            $einsatz_x,
                            $einsatz_y,
                            $pat_01,
                            $a, $con, $_POST['f_freitext']];
    }






    $statement = $pdo->prepare($sql_einsatz_neu_insert);
    $statement->execute($statement_inhalt);







  echo "Der Einsatz wurde generiert...";

  $eintrag = $pdo->prepare($sql_insert_in_einsatztagebuch);
  $eintrag->execute([NULL,"Einsatz erstellt!", $time, $stichwort."...wird erzeugt!","EL","Disponent"]);

}

 ?>
 <form action="einsaetze.php" method="post">
   <input type="submit" name="" value="ZURÜCK">
 </form>
</body>
