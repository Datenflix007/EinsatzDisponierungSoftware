<style media="screen">

    .body{background-color: grey; }

</style>
<div class="body">

<?php
include('../ini.php');


if(isset($_POST['f_fahrzeug_bearbeiten']) OR isset($_POST['f_fahrzeuge_bearbeiten_speichern'])){
  $fahrzeug_id = $_POST['f_fahrzeuge_id'];
  ?>
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <?php
    $fahrzeug_id_1 = $fahrzeug_id ;
    $value = "SELECT * FROM fahrzeuge WHERE fahrzeug_id = ".$fahrzeug_id;
    ?>


    <?php
    foreach ($pdo->query($value) as $row) {
      ?>
      <table>
      <tr>
        <td>Typ/Kenner:</td>
        <td><input type="text" name="f_fahrzeuge_bearbeiten_fahrzeug_typ" value="<?php echo $row['fahrzeug_typ'] ?>" placeholder="Fahrzeugtyp"><br /></td>
        <td><input type="text" name="f_fahrzeuge_bearbeiten_funkkenner" value="<?php echo $row['fahrzeug_funkkenner'] ?>" placeholder="Funkkenner"></td>
      </tr>
      <tr>
        <td>Sts/Kennzeichen</td>
        <td><input type="text" name="f_fahrzeuge_bearbeiten_status" value="<?php echo $row['fahrzeug_status'] ?>" placeholder="Status"></td>
        <td><input type="text" name="f_fahrzeuge_bearbeiten_kennzeichen" value="<?php echo $row['fahrzeug_kennzeichen'] ?>" placeholder="Kennzeichen"></td>
      </tr>
      </table>
      <br />
      <table>
      <tr><td>Fahrzeugbesatzung:</td>
      <?php
      switch ($row['fahrzeug_typ']) {
        case '93':
          ?>

          <td>
            <select name="f_fahrzeuge_bearbeiten_besatzung_1">
              <?php
              $b = "SELECT * FROM personal WHERE personal_id = ".$row['fahrzeug_besatzung_1'];
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
                                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
              }
               ?>
              <optgroup label="aktuelle Besatzung">

              <?php
              if(is_numeric($row['fahrzeug_besatzung_1'])){
                if(is_numeric($row['fahrzeug_besatzung_2'])){
                  if(is_numeric($row['fahrzeug_besatzung_3'])){
                    for ($i=1; $i < 4; $i++) {

                    $id = "fahrzeug_besatzung_".$i;
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
                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
                    }//end foreach
                    }

                  }
                }
              }


               ?>

              </optgroup>
              <optgroup label="Sonstiges Personal">
                <?php $b = "SELECT * FROM personal";
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
                  <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                  echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option>
                  <?php
                }


                 ?>
              </optgroup>
          </td>
      </tr><tr>
          <td></td>
          <td>
            <select name="f_fahrzeuge_bearbeiten_besatzung_2">
              <?php
              $b = "SELECT * FROM personal WHERE personal_id = ".$row['fahrzeug_besatzung_2'];
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
                                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
              }
               ?>
              <optgroup label="aktuelle Besatzung">

              <?php
              if(is_numeric($row['fahrzeug_besatzung_1'])){
                if(is_numeric($row['fahrzeug_besatzung_2'])){
                  if(is_numeric($row['fahrzeug_besatzung_3'])){
                    for ($i=1; $i < 4; $i++) {

                    $id = "fahrzeug_besatzung_".$i;
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
                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
                    }//end foreach
                    }

                  }
                }
              }


               ?>

              </optgroup>
              <optgroup label="Sonstiges Personal">
                <?php $b = "SELECT * FROM personal";
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
                  <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                  echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option>
                  <?php
                }


                 ?>
              </optgroup>
          </td>
      </tr><tr>
          <td></td>
          <td>
            <select name="f_fahrzeuge_bearbeiten_besatzung_3">
              <?php
              $b = "SELECT * FROM personal WHERE personal_id = ".$row['fahrzeug_besatzung_3'];
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
                                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
              }
               ?>
              <optgroup label="aktuelle Besatzung">

              <?php
              if(is_numeric($row['fahrzeug_besatzung_1'])){
                if(is_numeric($row['fahrzeug_besatzung_2'])){
                  if(is_numeric($row['fahrzeug_besatzung_3'])){
                    for ($i=1; $i < 4; $i++) {

                    $id = "fahrzeug_besatzung_".$i;
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
                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
                    }//end foreach
                    }

                  }
                }
              }


               ?>

              </optgroup>
              <optgroup label="Sonstiges Personal">
                <?php $b = "SELECT * FROM personal";
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
                  <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                  echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option>
                  <?php
                }


                 ?>
              </optgroup>
          </td>
      </tr><tr>
          <td></td>
          <td>
            <select name="f_fahrzeuge_bearbeiten_besatzung_4">
              <?php
              $b = "SELECT * FROM personal WHERE personal_id = ".$row['fahrzeug_besatzung_4'];
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
                                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
              }
               ?>
              <optgroup label="aktuelle Besatzung">

              <?php
              if(is_numeric($row['fahrzeug_besatzung_1'])){
                if(is_numeric($row['fahrzeug_besatzung_2'])){
                  if(is_numeric($row['fahrzeug_besatzung_3'])){
                    for ($i=1; $i < 4; $i++) {

                    $id = "fahrzeug_besatzung_".$i;
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
                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
                    }//end foreach
                    }

                  }
                }
              }


               ?>

              </optgroup>
              <optgroup label="Sonstiges Personal">
                <?php $b = "SELECT * FROM personal";
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
                  <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                  echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option>
                  <?php
                }


                 ?>
              </optgroup>
          </td>
      </tr><tr>
          <td></td>
          <td>
            <select name="f_fahrzeuge_bearbeiten_besatzung_5">
              <?php
              $b = "SELECT * FROM personal WHERE personal_id = ".$row['fahrzeug_besatzung_5'];
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
                                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
              }
               ?>
              <optgroup label="aktuelle Besatzung">

              <?php
              if(is_numeric($row['fahrzeug_besatzung_1'])){
                if(is_numeric($row['fahrzeug_besatzung_2'])){
                  if(is_numeric($row['fahrzeug_besatzung_3'])){
                    for ($i=1; $i < 4; $i++) {

                    $id = "fahrzeug_besatzung_".$i;
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
                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
                    }//end foreach
                    }

                  }
                }
              }


               ?>

              </optgroup>
              <optgroup label="Sonstiges Personal">
                <?php $b = "SELECT * FROM personal";
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
                  <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                  echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option>
                  <?php
                }


                 ?>
              </optgroup>
          </td>
      </tr><tr>
          <td></td>
          <td>
            <select name="f_fahrzeuge_bearbeiten_besatzung_6">
              <?php
              $b = "SELECT * FROM personal WHERE personal_id = ".$row['fahrzeug_besatzung_6'];
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
                                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
              }
               ?>
              <optgroup label="aktuelle Besatzung">

              <?php
              if(is_numeric($row['fahrzeug_besatzung_1'])){
                if(is_numeric($row['fahrzeug_besatzung_2'])){
                  if(is_numeric($row['fahrzeug_besatzung_3'])){
                    for ($i=1; $i < 4; $i++) {

                    $id = "fahrzeug_besatzung_".$i;
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
                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
                    }//end foreach
                    }

                  }
                }
              }


               ?>

              </optgroup>
              <optgroup label="Sonstiges Personal">
                <?php $b = "SELECT * FROM personal";
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
                  <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                  echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option>
                  <?php
                }


                 ?>
              </optgroup>
        </td></tr>

        </table>
          <?php
          break;

        default:
          ?>


          <td>
            <select name="f_fahrzeuge_bearbeiten_besatzung_1">
              <?php
              $b = "SELECT * FROM personal WHERE personal_id = ".$row['fahrzeug_besatzung_1'];
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
                                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
              }
               ?>
              <optgroup label="aktuelle Besatzung">

              <?php
              if(is_numeric($row['fahrzeug_besatzung_1'])){
                if(is_numeric($row['fahrzeug_besatzung_2'])){
                  if(is_numeric($row['fahrzeug_besatzung_3'])){
                    for ($i=1; $i < 4; $i++) {

                    $id = "fahrzeug_besatzung_".$i;
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
                      <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                      echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
                    }//end foreach
                    }

                  }
                }
              }


               ?>

              </optgroup>
              <optgroup label="Sonstiges Personal">
                <?php $b = "SELECT * FROM personal";
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
                  <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                  echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option>
                  <?php
                }


                 ?>
              </optgroup>
            </select>


            </td>
        </tr><tr>
          <td></td>
          <td><select name="f_fahrzeuge_bearbeiten_besatzung_2">
            <?php
            $b = "SELECT * FROM personal WHERE personal_id = ".$row['fahrzeug_besatzung_2'];
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
                                    <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                                    echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
            }
             ?>
            <optgroup label="aktuelle Besatzung">

            <?php
            if(is_numeric($row['fahrzeug_besatzung_1'])){
              if(is_numeric($row['fahrzeug_besatzung_2'])){
                if(is_numeric($row['fahrzeug_besatzung_3'])){
                  for ($i=1; $i < 4; $i++) {

                  $id = "fahrzeug_besatzung_".$i;
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
                    <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                    echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
                  }//end foreach
                  }

                }
              }
            }


             ?>

            </optgroup>
            <optgroup label="Sonstiges Personal">
              <?php $b = "SELECT * FROM personal";
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
                <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option>
                <?php
              }


               ?>
            </optgroup>
          </select></td>
        </tr><tr>
          <td></td>
          <td><select name="f_fahrzeuge_bearbeiten_besatzung_3">
            <?php
            $b = "SELECT * FROM personal WHERE personal_id = ".$row['fahrzeug_besatzung_3'];
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
                                    <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                                    echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
            }
             ?>
            <optgroup label="aktuelle Besatzung">

            <?php
            if(is_numeric($row['fahrzeug_besatzung_1'])){
              if(is_numeric($row['fahrzeug_besatzung_2'])){
                if(is_numeric($row['fahrzeug_besatzung_3'])){
                  for ($i=1; $i < 4; $i++) {

                  $id = "fahrzeug_besatzung_".$i;
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
                    <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                    echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option><?php
                  }//end foreach
                  }

                }
              }
            }


             ?>

            </optgroup>
            <optgroup label="Sonstiges Personal">
              <?php $b = "SELECT * FROM personal";
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
                <option value="<?php echo $personal['personal_id'] ?>"><?php echo $personal['personal_vorname']." ".$personal['personal_nachname'];
                echo " (".$hoe_dienstgrad.", ".$hoe_fkgrad.")"; ?></option>
                <?php
              }


               ?>
            </optgroup>
          </select></td>

        </tr>
        </table>
          <?php
          break;
      }


       ?>

       <br />
       <table>
         <tr>
           <td>Aktion/Ziel</td>
           <td>
             <select class="" name="f_fahrzeuge_bearbeiten_aktion" >
               <option value="--">--</option>

               <optgroup label="Läufertrupps">
                 <option value="Patienten Verlegung">Patienten Verlegung</option>
                 <option value="Behandlung vor Ort">Behandlung v.O.</option>
                 <option value="Übergabe RD">Übergabe RD</option>

               </optgroup>
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
             </select>
           </td>
           <td><select name="f_fahrzeuge_bearbeiten_ziel">
             <option value="">None</option>
             <optgroup label="UHS">
               <option value="UHS">UHS</option>
               <option value="Sichtung">Sichtung</option>
               <option value="Sichtung">Suchdienst</option>
               <option value="Grün">Triage: Grün Bhp</option>
               <option value="Gelb">Triage: Gelb Bhp</option>
               <option value="Rot">Triage: Rot Bhp</option>
               <option value="Pat.-Umschlagplatz">Patientenumschlagplatz</option>
             </optgroup>
           </select></td>
         </tr>
       </table>
       <table>

       </table>












      <input type="hidden" name="f_fahrzeuge_id" value="<?php echo $row['fahrzeug_id'] ?>">
      <input type="submit" name="f_fahrzeuge_bearbeiten_speichern" value="SPEICHERN">
      <input type="submit" name="f_fahrzeuge_bearbeiten_loeschen" value="LÖSCHEN">
      <?php

      }
     ?>

  </form>




  <?php

}



if(isset($_POST['f_fahrzeuge_bearbeiten_speichern'])){

  if($_POST['f_fahrzeuge_bearbeiten_fahrzeug_typ'] == 93){


   $ubdate_string = "UPDATE fahrzeuge SET fahrzeug_funkkenner = ?, fahrzeug_status = ?, fahrzeug_kennzeichen = ?, fahrzeug_besatzung_1 = ?, fahrzeug_besatzung_2 = ?, fahrzeug_besatzung_3 = ?, fahrzeug_besatzung_4 = ?, fahrzeug_besatzung_5 = ?, fahrzeug_besatzung_6 = ?, fahrzeug_typ = ?, fahrzeug_ziel= ?, fahrzeug_ziel_koordinaten = ?, fahrzeug_aktion = ? WHERE fahrzeug_id = ?";
   $ubdate = $pdo->prepare($ubdate_string);
   $ubdate->execute(array(
                 $_POST['f_fahrzeuge_bearbeiten_funkkenner'],
                 $_POST['f_fahrzeuge_bearbeiten_status'],
                 $_POST['f_fahrzeuge_bearbeiten_kennzeichen'],
                 $_POST['f_fahrzeuge_bearbeiten_besatzung_1'],
                 $_POST['f_fahrzeuge_bearbeiten_besatzung_2'],
                 $_POST['f_fahrzeuge_bearbeiten_besatzung_3'],
                  $_POST['f_fahrzeuge_bearbeiten_besatzung_4'],
                  $_POST['f_fahrzeuge_bearbeiten_besatzung_5'],
                  $_POST['f_fahrzeuge_bearbeiten_besatzung_6'],
                  $_POST['f_fahrzeuge_bearbeiten_fahrzeug_typ'],
                  $_POST['f_fahrzeuge_bearbeiten_ziel'],

                  $_POST['f_fahrzeuge_bearbeiten_aktion'],
                  $_POST['f_fahrzeuge_id']));

                }
                if($_POST['f_fahrzeuge_bearbeiten_fahrzeug_typ'] != 93){


                 $ubdate_string = "UPDATE fahrzeuge SET fahrzeug_funkkenner = ?, fahrzeug_status = ?, fahrzeug_kennzeichen = ?, fahrzeug_besatzung_1 = ?, fahrzeug_besatzung_2 = ?, fahrzeug_besatzung_3 = ?,  fahrzeug_typ = ?, fahrzeug_ziel= ?,  fahrzeug_aktion = ? WHERE fahrzeug_id = ?";
                 $ubdate = $pdo->prepare($ubdate_string);
                 $ubdate->execute(array(
                               $_POST['f_fahrzeuge_bearbeiten_funkkenner'],
                               $_POST['f_fahrzeuge_bearbeiten_status'],
                               $_POST['f_fahrzeuge_bearbeiten_kennzeichen'],
                               $_POST['f_fahrzeuge_bearbeiten_besatzung_1'],
                               $_POST['f_fahrzeuge_bearbeiten_besatzung_2'],
                               $_POST['f_fahrzeuge_bearbeiten_besatzung_3'],

                                $_POST['f_fahrzeuge_bearbeiten_fahrzeug_typ'],
                                $_POST['f_fahrzeuge_bearbeiten_ziel'],

                                $_POST['f_fahrzeuge_bearbeiten_aktion'],
                                $_POST['f_fahrzeuge_id'])); }
$pat_zu = "";
if($_POST['f_fahrzeuge_bearbeiten_aktion'] == "Patienten Verlegung"){
  $pat_zu = "mit Patienten";
}

$eintrag = $pdo->prepare($sql_insert_in_einsatztagebuch);
$eintrag->execute([NULL,"Bearbeitet:", $time, $_POST['f_fahrzeuge_bearbeiten_funkkenner']."wurde bearbeitet!", "EL", "Disponent"]);
$eintrag->execute([NULL,"Verlegung:", $time, $_POST['f_fahrzeuge_bearbeiten_funkkenner']."verlegt sich nach!".$_POST['f_fahrzeuge_bearbeiten_ziel'].$pat_zu, "EL", "Disponent"]);

}
if(isset($_POST['f_fahrzeuge_bearbeiten_loeschen'])){
  include("../ini.php");
  $del_id = $_POST['f_fahrzeuge_id'];
  $del_sql = "DELETE FROM fahrzeuge WHERE  fahrzeug_id = ?";

  $del = $pdo->prepare($del_sql);
  $del->execute(array($del_id));

  echo"Eintrag wurde gelöscht";
}





 ?>
<form action="fahrzeuge.php" method="post">
  <input type="submit" name="f_fahrzeuge_zurueck" value="ZURÜCK">
</form>

</div>
