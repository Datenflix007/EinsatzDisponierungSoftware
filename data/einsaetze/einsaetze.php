<style media="screen">

    body{background-color: grey; }
    input['type=submit']{
      cursor: pointer;
    }

    button:hover{
      transform: scale(1.3);

</style>
<head>
  <?php
  if(isset($_POST['f_stop'])){
    $run = fopen("../mods/einsaetze.ini", "w");
    fwrite($run, "1");
    fclose($run);
  }
  if(isset($_POST['f_run'])){
    $run = fopen("../mods/einsaetze.ini", "w");
    fwrite($run, "0");
    fclose($run);
  }



  $run_mode = "";
  $run = fopen("../mods/einsaetze.ini", "r");
  $run_mode = fread($run, 1);
  fclose($run);
  if($run_mode == 0){
    ?><meta http-equiv="refresh" content="2" /><?php
  }
   ?>

</head>
<body>

<?php include('../ini.php'); ?>

<form class="stop" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
  <h1 style="float: center;">Einsätze <?php  echo $einsatz_zahl['anzahl']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <?php if($run_mode == 0){ ?><button type="submit" name="f_stop" style="height: 50px; width: 50px;">STOP</button><?php } ?>
  <?php if($run_mode == 1){ ?><button type="submit" name="f_run" style="height: 50px; width: 50px;">RUN</button><?php } ?>
</form>
</h1>

<div class="">

<form action="einsatz_neu.php" method="post">
<input type="submit" name="f_einsatz_neu" value="HINZUFÜGEN">
</form>



<form action="einsatz_bearbeiten.php" method="post">

</div>
<details open style="background-color: #585858;">
<summary style="background-color: orange;">aktive Einsätze:<?php echo $einsatz_status_a_zahl['anzahl']; ?></summary>


<table align="center">

<?php

$row_id = "";

foreach($pdo->query($sql_select_einsatz_status_aktiv) as $row)
{
  $row_id = $row['einsatz_id'];
  $stichwort ="";
  $sql_select_einsatz_fahrzeug = "SELECT * FROM fahrzeuge WHERE fahrzeug_einsatz = $row_id";

  $s = "SELECT * FROM einsatz_stichwort WHERE einsatz_stichwort_id = ".$row['einsatz_stichwort'];

  foreach ($pdo->query($s) as $stich) {
    $stichwort = $stich['einsatz_stichwort_title'];
  }


    ?>

      <tr>

        <?php
        $triage = "";
        $sql = "SELECT * FROM patienten WHERE patient_id = ".$row['einsatz_patient_01'];
        foreach ($pdo->query($sql) as $key) {
          $triage = $key['patient_triage'];
        }
        $triage_color = ""; $color ="";
        switch ($triage) {
          case '0': $triage_color = "green"; $color = "white";  break;
          case '1': $triage_color = "yellow"; $color ="black"; break;
          case '2': $triage_color = "red"; $color="white"; break;
          case '3': $triage_color = "blue"; $color= "white"; break;
          case '4': $triage_color = "black"; $color= "white"; break;
        }
         ?>
         <td><input type="submit" name="f_einsatz_id" style="height: 60px; width: 50px; cursor: pointer; color: <?php echo $color ?>; background-color: <?php echo $triage_color ?>;" value="<?php echo $row['einsatz_id']; ?>" /> </td>
        <td><button style=" height: 60px; width: 300px; color: <?php echo $color ?>; background-color: <?php echo $triage_color ?>;"  ><?php  echo "<h3>".$stichwort."</h3><be />";  ?></button>
        </td><td>
          <?php if($row['einsatz_sondersignal_isset'] == 1){
          ?><img src="styles/sonder.png" title="Rettungsdienst" height="80" weigth="80"><?php
        } ?></td>
      </tr><tr>
        <td></td>
        <td>
          <?php
          #$sql_select_einsatz_fahrzeug = "SELECT * FROM fahrzeuge WHERE fahrzeug_einsatz = $row_id";
          foreach($pdo->query($sql_select_einsatz_fahrzeug) as $em)
          {
            ?>
            <button style= "<?php switch ($em['fahrzeug_status']) {
              case '1': echo "background-color: blue; color: white;"; break;
              case '2': echo "background-color: green; color: white;"; break;
              case '3': echo "background-color: yellow; color: black;"; break;
              case '4': echo "background-color: red; color: white;"; break;
              case '5': echo "background-color: black; color: white"; break;
              case '6': echo "background-color: purple; color: white;"; break;
              case '7': echo "background-color: orange; color: black;"; break;
              case '8': echo "background-color: white; color: black;"; break;
              case '9': echo "background-color: purple; color: white"; break;
            }
            ?>; width:300px;height: 20px; " >
            <?php echo $em['fahrzeug_funkkenner']; ?></button>
            <?php

          }
          ?>
</td><td></td></tr>
    <?php
}


 ?>
    </form>
</table>




</details>
  <details title="Beendete Einsätze werden hier angezeigt">
    <summary style="background-color: orange;">Abgeschlossene Einsätze: <?php echo $einsatz_status_i_zahl['anzahl']; ?></summary>

 <table>
 <?php


foreach($pdo->query($sql_select_einsatz_statis_inaktiv) as $row)
{
 ?>

   <tr>
     <td><button type="button" name="button" style=" height: 75px; width: 50px;"><?php echo $row['einsatz_id']; ?></button> </td>
     <td>


    <button style="width: 350px; height: 75px;">
    <?php

    foreach ($pdo->query("SELECT * FROM einsatz_stichwort WHERE einsatz_stichwort_id = ".$row['einsatz_stichwort']) as $key) {
      echo $key['einsatz_stichwort_title']."<br />";
    }

    if($row['einsatz_adresse_isset'] == 0){
      $ort = "";
      if($row['einsatz_adresse_ortsteil'] != $row['einsatz_adresse_ortschaft']){
        $ort = $row['einsatz_adresse_ortschaft']."-".$row['einsatz_adresse_ortsteil'];
      }
      if($row['einsatz_adresse_ortsteil'] == $row['einsatz_adresse_ortschaft']){
        $ort = $row['einsatz_adresse_ortschaft'];
      }
      echo $ort.", ".$row['einsatz_adresse_postleitzahl']."<br />";
    }


    $anrede_melder = "";
    switch($row['einsatz_melder_gender']){
        case 'm': $anrede_melder = "Fr. ";
        case 'w': $anrede_melder = "Hr. ";
        case 'd': $anrede_melder = "&nbsp &nbsp ";
    }
    $patient_string = "";
    $sql = "SELECT * FROM patienten WHERE patient_id = ".$row['einsatz_patient_01'];
    foreach ($pdo->query($sql ) as $key ) {
      $patient_string = $key['patient_nachname'].", ". $key['patient_vorname'];
    }

    echo "Anrufer_in: ".$anrede_melder.$row['einsatz_melder_name_vor']." ".$row['einsatz_melder_name_nach']."<br />";
    echo "Patient_in: ".$patient_string;

    ?>
  </button></td>
  <td></td>
</tr>
  <?php
}



  ?></table>

    </details>
 </form>
</body>
