<style media="screen">

    body{background-color: grey; }

</style>
<body style="color: white;">
  <h1>EINSATZ BEARBEITEN</h1>
<?php


$einsatz_id = $_POST['f_einsatz_id'];
include('../ini.php');

$freitext = "";
$sql = "SELECT * FROM einsaetze WHERE einsatz_id = ".$einsatz_id;
foreach ($pdo->query($sql) as $key) {
  ?> <button type="button" name="button" style="width: 100%;"><?php echo $key['einsatz_freitext']; ?></button> <?php

}

$sql_einsatz_bearbeiten_select = "SELECT * FROM einsaetze WHERE einsatz_id = $einsatz_id";

#$einsatz_id = "";
$pat_anzahl = "";
$pat_01_id = "";

if(isset($_POST['f_einsatz_add_car'])){
  $freifa = $_POST['f_freifa_id'];
  echo $freifa;
  $sql_freifa = "UPDATE fahrzeuge SET fahrzeug_einsatz = ? WHERE fahrzeuge. fahrzeug_id= ?";
  $add = $pdo->prepare($sql_freifa);
  $add->execute([$einsatz_id, $freifa]);
  #$sql_status =
}
if(isset($_POST['f_edit_einsatz_new_patient'])){

    $current_count_patienten = "";

    foreach($pdo->query($sql_einsatz_bearbeiten_select) as $row) {
      $current_count_patienten = $row['einsatz_anzahl_patienten'];
    }
    $current_count_patienten = $current_count_patienten + 1;
    #$sql = "UPDATE einsaetze SET einsatz_anzahl_patienten = ? WHERE einsatz_id = ?";
    $statement = $pdo->prepare("UPDATE einsaetze SET einsatz_anzahl_patienten = ? WHERE einsatz_id = ?");
    $statement->execute([$current_count_patienten, $einsatz_id]);
}


if(isset($_POST['f_edit_einsatz_go'])){
  $update_sql = "UPDATE einsaetze SET einsatz_stichwort = ?,  einsatz_adresse = ?, einsatz_adresse_isset = ?, einsatz_adresse_strasse = ?, einsatz_adresse_hausnummer = ?, einsatz_adresse_postleitzahl = ?, einsatz_adresse_ortschaft = ?, einsatz_adresse_ortsteil = ?, einsatz_melder_gender = ?, einsatz_melder_name_vor = ?, einsatz_melder_name_nach = ?, einsatz_melder_telefon = ?, einsatz_anzahl_patienten = ? WHERE einsatz_id = ?";
  $update = $pdo->prepare($update_sql);
  $adresse_isset = $_POST['adresse_isset'];

  if($adresse_isset == 0){
    $update->execute([
      $_POST['f_auto_einsatz_stichwort'],
      "0",
      $adresse_isset,
      $_POST['f_edit_einsatz_adresse_strasse'],
      $_POST['f_edit_einsatz_adresse_hausnummer'],
      $_POST['f_edit_einsatz_adresse_postleitzahl'],
      $_POST['f_edit_einsatz_adresse_ortschaft'],
      $_POST['f_edit_einsatz_adresse_ortsteil'],
      $_POST['f_edit_einsatz_melder_gender'],
      $_POST['f_edit_einsatz_melder_name_vor'],
      $_POST['f_edit_einsatz_melder_name_nach'],
      $_POST['f_edit_einsatz_melder_telefon'],
      $_POST['f_einsatz_anzahl_patienten'],

      $einsatz_id
    ]);
  }
  if($adresse_isset == 1){
    $adr = $_POST['f_ort_auto_adresse'];
    $update->execute(array(
      $_POST['f_auto_einsatz_stichwort'],
      $adr,
      $adresse_isset,
      "0",
      "0",
      "0",
      "0",
      "0",
      $_POST['f_edit_einsatz_melder_gender'],
      $_POST['f_edit_einsatz_melder_name_vor'],
      $_POST['f_edit_einsatz_melder_name_nach'],
      $_POST['f_edit_einsatz_melder_telefon'],
      $_POST['f_einsatz_anzahl_patienten'],
      $einsatz_id
    ));

    $x = ""; $y = "";
    $cors = "SELECT * FROM prop_stasse WHERE prop_id = ".$adr;
    foreach ($pdo->query($cors) as $cor) {
      $x = $cor['prop_x'];
      $y = $cor['prop_y'];
    }
    $sql = "UPDATE einsaetze SET prop_x = ?, prop_y = ? WHERE einsatz_id = ?";
    $update = $pdo->prepare($sql);
    $update->execute(array($x, $y, $einsatz_id));



  }



}


#if(!isset($_POST['f_edit_einsatz_go'])){

foreach ($pdo->query("SELECT * FROM einsaetze WHERE einsatz_id = ".$einsatz_id) as $key) {
  $gemeinde = "";
  $adresse = "";
  if($key['einsatz_adresse_isset'] == "1"){
    $adr_id = $key['einsatz_adresse'];
    $ssl = "SELECT * FROM prop_stasse WHERE prop_id = $adr_id";
    foreach ($pdo->query($ssl) as $value) {
      $gemeinde = $value['prop_gemeinde'];
      $adresse = $value['prop_title'];
    }

  }
  else {
    if($key['einsatz_adresse_ortschaft'] != $key['einsatz_adresse_ortsteil']){
      $gemeinde = $key['einsatz_adresse_ortschaft'].$key['einsatz_adresse_ortsteil'];
    }
    else {
      $gemeinde = $key['einsatz_adresse_ortschaft'];
    }

  }





 ?>

  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="hidden" name="f_einsatz_id" value="<?php echo $key['einsatz_id'] ?>">
    <input type="hidden" name="adresse_isset" value="<?php echo $key['einsatz_adresse_isset'] ?>">
    <details open  style="border: medium; border-color: white; background-color: #585858;" >
      <summary><span style="font-size: 40px;">Lokation</span></summary>
      <table>
        <tr>
          <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            <?php
            if($key['einsatz_adresse_isset'] == 1){
              ?>
              <input type="text" name="f_ort_auto_stadt" list="stadt" placeholder="<?php echo $gemeinde; ?>" style="background-color: #BDBDBD;" title="<?php echo $gemeinde; ?>">
                <datalist id="stadt">
                  <option label="<?php echo $gemeinde; ?>">
                  <?php
                  include('../ini.php');
                  $sql = "SELECT * FROM prop_stadt";
                  foreach ($pdo->query($sql) as $row) {
                      ?>
                      <option value="<?php echo $row['prop_title']; ?>"><?php
                  } ?>
                </datalist>
              </input>
              <?php
            }

             ?>

          </td>
          <td>
            <?php

            if($key['einsatz_adresse_isset'] == 1){
              //prop_stasse
              ?>
              <input type="search" name="f_ort_auto_adresse" list="adresse"placeholder="<?php echo $adresse ?>" title="<?php echo $adresse ?>" >
                <datalist id="adresse">
                  <optgroup label="Test">
                  <?php
                  $sql = "SELECT * FROM prop_stasse";
                  foreach ($pdo->query($sql) as $row) {
                      ?>
                      <option value="<?php echo $row['prop_id']; ?>" title="<?php echo $row['prop_discribtion']; ?>" label="<?php echo $row['prop_gemeinde']."-".$row['prop_title']."-".$row['prop_discribtion'] ?>">huhu</option>
                    <?php
                  }
                   ?> </optgroup>
                </datalist>
              </input>
              <?php
            }
          ?>
          </td>
          </tr>
          <?php

          if($key['einsatz_adresse_isset'] == 0){
            $ort = "";
            if($key['einsatz_adresse_ortsteil'] != $key['einsatz_adresse_ortschaft']){ $ort = $key['einsatz_adresse_ortschaft']."-".$key['einsatz_adresse_ortsteil']; }
            if($key['einsatz_adresse_ortsteil'] == $key['einsatz_adresse_ortschaft']){ $ort = $key['einsatz_adresse_ortschaft']; }?>
            <tr>
              <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                  <input type="text" name="f_edit_einsatz_adresse_strasse" value="<?php echo $key['einsatz_adresse_strasse'] ?>" />
                  <input type="text" name="f_edit_einsatz_adresse_hausnummer" value="<?php echo $key['einsatz_adresse_hausnummer'] ?>" /></td>

            </tr>
            <tr>
              <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                <input type="text" name="f_edit_einsatz_adresse_postleitzahl" value="<?php echo $key['einsatz_adresse_postleitzahl'] ?>" />
                <input type="text" name="f_edit_einsatz_adresse_ortschaft" value="<?php echo $ort ?>" />
              </td>

            </tr>
            <tr>
              <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="f_edit_einsatz_adresse_ortsteil" value="<?php echo $key['einsatz_adresse_ortsteil'] ?>" /></td>
            </tr>



            <?php



            }
           ?>
        </td>
          </tr>
</table>
    </details>
    <details style="border: medium; border-color: white; background-color: #585858;" >
      <summary><span style="font-size: 40px;">Notfall</span></summary>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
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


    </details>
    <details style="border: medium; border-color: white; background-color: #585858;" >
      <summary><span style="font-size: 40px;">Melder</span></summary>
      <table>
        <tr>
          <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <select name="f_edit_einsatz_melder_gender" title="Melder Geschlecht">

          <?php
          if($cow['einsatz_melder_gender'] == "w"){
            ?><option value="m">Herr</option><?php
          }
          if($cow['einsatz_melder_gender'] == "m"){
            ?><option value="w">Frau</option><?php
          }
          if($cow['einsatz_melder_gender'] == "d"){
            ?><option value="d">Divers</option><?php
          }
           ?>
           <option value="m" title="Männlicher Melder">Herr</option>
           <option value="w" title="Weiblicher Melder">Frau</option>
           <option value="d" title="Dierverser Melder">Divers</option>
          </select></td>
        </tr>
        <tr>
          <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="f_edit_einsatz_melder_name_vor" value="<?php echo $key['einsatz_melder_name_vor'] ?>" title="Vorname des Melders" />
          <input type="text" name="f_edit_einsatz_melder_name_nach" value="<?php echo $key['einsatz_melder_name_nach'] ?>" title="Nachname des Melder" /></td>
        </tr>
        <tr>
          <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="f_edit_einsatz_melder_telefon" value="<?php echo $key['einsatz_melder_telefon'] ?>" title="Telfon Nummer des Melders" /></td>
        </tr>

      </table>






    </details>
    <input type="submit" name="f_edit_einsatz_go" value="SPEICHERN" />

  </form>
    <details style="border: medium; border-color: white; background-color: #585858;" >
      <summary><span style="font-size: 40px;">Patient_in</span></summary>
      <?php
      #$patient = "SELECT * FROM patienten WHERE patient_id = ".;
       ?>
      <table>
        <?php
        foreach ($pdo->query("SELECT * FROM einsaetze WHERE einsatz_id = ".$einsatz_id) as $key) {
          foreach ($pdo->query("SELECT * FROM patienten WHERE patient_id =".$key['einsatz_patient_01']) as $row) {
            ?>

            <?php

              foreach ($pdo->query("SELECT * FROM einsatz_stichwort WHERE einsatz_stichwort_id = ".$row['patient_stichwort']) as $stich) {
                ?><tr><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspStichwort:</td><td><?php echo $stich['einsatz_stichwort_title'] ?></td></tr><?php
              }


           ?>
            <?php
            if($row['patient_vorname'] != ""){
              ?><tr><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspVorname:</td><td><?php echo $row['patient_vorname'] ?></td></tr><?php
            }
            if($row['patient_vorname'] == ""){
              ?><tr><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspVorname:</td><td>&nbsp?&nbsp</td></tr><?php
            }
            if($row['patient_nachname'] != ""){
              ?><tr><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNachname:</td><td><?php echo $row['patient_nachname'] ?></td></tr><?php
            }
            if($row['patient_nachname'] == ""){
              ?><tr><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNachname:</td><td>&nbsp?&nbsp</td></tr><?php
            }
            ?>



          <?php }
          } ?>

      </table>
      <form  action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

        <input type="hidden" name="f_einsatz_id" value="<?php echo $einsatz_id ?>" />
        <select name="f_triage">
          <option value="0">GRÜN</option>
          <option value="1">GELB</option>
          <option value="2">ROT</option>
          <option value="3">BLAU</option>
          <option value="4">SCHWARZ</option>
        </select>
        <input type="submit" name="f_triage_go" value="TRIAGIEREN"/>
      </form>
      <?php
      if(isset($_POST['f_triage_go'])){

        $pat_id = "";
        foreach ($pdo->query("SELECT * FROM einsaetze WHERE einsatz_id = ".$einsatz_id) as $key) {
          $pat_id = $key['einsatz_patient_01'];
        }

        $sql = "UPDATE patienten SET patient_triage = ? WHERE patient_id = ?";
        $up = $pdo->prepare($sql);
        $up->execute([$_POST['f_triage'], $pat_id]);

      }
       ?>


    </details>
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp





      <details style="border: medium; border-color: white; background-color: #585858;" style="text-align: center;" open >
        <?php
        $dist_array = array();
        $sql = "SELECT *
                FROM fahrzeuge
                WHERE (fahrzeug_einsatz != $einsatz_id AND fahrzeug_status = 1) OR (fahrzeug_einsatz != $einsatz_id AND fahrzeug_status = 2 )";
         ?>
        <summary><span style="font-size: 40px;">Einsatzmittel</span></summary>



        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><?php //Fahrzeuge zuweisen ?>
          <details open style="margin-left: 20px;">
            <summary>Freie Einsatzmittel</summary>

          <input type="hidden" name="f_einsatz_id" value="<?php echo $einsatz_id; ?>">
            <table >
              <tr>
                <td>&nbsp-&nbsp</td>
                <td>Fahrzeug-Info</td>
                <td>Sts</td>
                <td>Enfernung</td>
                <td>Aktion</td>
              </tr>
          <?php
          foreach ($pdo->query($sql) as $key) {


            $einsatz_x = "";
            $einsatz_y = "";
            $fahrzeug_x = "";
            $fahrzeug_y = "";
            $dist = "";

            //einsatz_coor auslesen
            $einsatz_coor = "SELECT * FROM einsaetze WHERE einsatz_id = ".$einsatz_id;
            foreach ($pdo->query($einsatz_coor) as $row) {
              $einsatz_x = $row['einsatz_x'];
              $einsatz_y = $row['einsatz_y'];
            }

            //fahrzeug_coor
            if($key['fahrzeug_adresse_isset'] == 1){
              $adresse_id = $key['fahrzeug_adresse'];
              $adresse_sql = "SELECT * FROM prop_stasse WHERE prop_id =".$adresse_id;
              foreach ($pdo->query($adresse_sql) as $row) {
                $fahrzeug_x = $row['prop_x'];
                $fahrzeug_y = $row['prop_y'];
              }

              //dist ausrechnen
              $dist = ($fahrzeug_x-$einsatz_x)/($fahrzeug_y-$einsatz_y);
              if($dist != 0){ $dist = $dist*10;}
              $dist = round($dist, 2);
            }
            else{
              $dist = "none";
            }
            //experimentell
            if($dist < 0 ){
              $dist = $dist/-1;
            }
            $dist_array[$key['fahrzeug_id']] = $dist;
          }
          asort($dist_array);
          #var_dump($dist_array);
          foreach ($dist_array as $key => $value) {
            if($value != "none"){
              $ein_kor_is ="";
              foreach ($pdo->query("SELECT * FROM einsaetze WHERE einsatz_id =".$einsatz_id) as $row) {
                $ein_kor_is = $row['einsatz_adresse_isset'];
              }
              if($ein_kor_is == 1){


            ?>
                 <tr style="background-color: #1C1C1C">
                   <td><?php //var_dump( $dist_array); ?><input type="radio" name="f_freifa_id" value="<?php echo $key ?>"></td>
                   <?php $sql = "SELECT * FROM fahrzeuge WHERE fahrzeug_id = ".$key;
                   foreach ($pdo->query($sql) as $row) {?>
                     <td><button type="button" name="button"> <span title="<?php echo $row['fahrzeug_typ'].":".$row['fahrzeug_funkkenner']?>"> <?php echo $row['fahrzeug_typ'].":".$row['fahrzeug_funkkenner'] ?></span></button></td>
                    <td><?php echo "&nbsp[".$row['fahrzeug_status']."]&nbsp" ?></td>
                     <td><?php echo $value; ?>&nbspkm</td>
                     <td><?php echo $row['fahrzeug_aktion'] ?></td>

                     <?php
                   }

                   ?>

                 </tr>
                 <?php
               }
               if($ein_kor_is == 0){


               ?>
                  <tr style="background-color: #1C1C1C">
                    <td><input type="radio" name="f_freifa_id" value="<?php echo $key ?>"></td>
                    <?php $sql = "SELECT * FROM fahrzeuge WHERE fahrzeug_id = ".$key;
                    foreach ($pdo->query($sql) as $row) {?>
                      <td><button type="button" name="button"> <span title="<?php echo $row['fahrzeug_typ'].":".$row['fahrzeug_funkkenner']?>"> <?php echo $row['fahrzeug_typ'].":".$row['fahrzeug_funkkenner'] ?></span></button></td>
                     <td><?php echo "&nbsp[".$row['fahrzeug_status']."]&nbsp" ?></td>
                      <td>&nbsp---&nbsp</td>
                      <td><?php echo $row['fahrzeug_aktion'] ?></td>

                      <?php
                    }

                    ?>

                  </tr>
                  <?php
                }

             }
                  ?>
                    <input type="hidden" name="f_einsatz_id" value="<?php echo $einsatz_id ?>"><?php } ?>
               </table>    </details>
<input type="submit" name="f_einsatz_add_car" value="ALRAMIEREN">
        <br /><br /></form>

        <details open>
          <summary>Zugeteilte Einsatzmittel</summary>
        <table>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

        <?php
        $free_car = "SELECT * FROM fahrzeuge WHERE fahrzeug_einsatz = ".$einsatz_id;
        foreach ($pdo->query($free_car) as $gefa) { ?>
          <tr>
            <td><input type="radio" name="f_gefa_id" value="<?php echo $gefa['fahrzeug_id'] ?>" ></td>
            <td><button title="<?php $gefa['fahrzeug_aktion'] ?>"><?php echo "[".$gefa['fahrzeug_status']."]_".$gefa['fahrzeug_typ']."_".$gefa['fahrzeug_funkkenner']."_".$gefa['fahrzeug_aktion'] ?></button><br /></td>
          </tr>

          <?php
        }

         ?>
  </table>
  <input type="hidden" name="f_einsatz_id" value="<?php echo $einsatz_id ?>">
        <input type="submit" name="f_reset_em" value="Anffahrtabbruch" title="Einsatzmittel zurückdisponieren">      </form>
          </details>

      </div>




      </details>


    <?php

}

if(isset($_POST['f_reset_em'])){
  //if(isset($_POST['f_gefa_id'])){
      $sql = "UPDATE fahrzeuge SET fahrzeug_status = ?, fahrzeug_einsatz = ? WHERE fahrzeug_id = ?";
      $up = $pdo->prepare($sql);
      $up->execute(["1","0",$_POST['f_gefa_id']]);
    //}
}


  if($pat_anzahl == 1){

          $sel_pat_1 = "SELECT * FROM patienten WHERE patient_id = 1";
          foreach($pdo->query($sel_pat_1) as $row){


                  echo $row['patient_vorname'].", ".$row['patient_nachname']."<br />";
                  echo "Triage: .".$row['patient_triage']."<br />";
                  echo "geboren: ".$row['patient_geburt_tag'].",".$row['patient_geburt_monat'].",".$row['patient_geburt_jahr']."<br />";
                  echo "verstorben: ".$row['patient_geburt_tag'].",".$row['patient_tod_monat'].",".$row['patient_tod_jahr'].";".$row['patient_tod_stunde'].":".$row['patient_tod_minute']."<br />";

           }

  }

?>
<form action="einsatz_beenden.php" method="post">
  <?php #echo $einsatz_id ?>
  <input type="hidden" name="f_einsatz_id" value="<?php echo $einsatz_id; ?>" />
<input type="submit" name="f_einsatz_beenden" value="BEENDEN"/>
</form>

<?php #} ?>

 <form action="einsaetze.php" method="post">
   <input type="submit" name="" value="ZURÜCK">
 </form>
</body>
