<?php
include('ini.php');


foreach($pdo->query($sql_select_einsatz_statis_inaktiv) as $row)
{
?>

  <input type="hidden" name="f_einsatz_id" value="<?php echo $row['einsatz_id']; ?>" />
  <button style="width: 350px;">
  <?php

  $ort = "";
  if($row['einsatz_adresse_ortsteil'] != $row['einsatz_adresse_ortschaft']){
    $ort = $row['einsatz_adresse_ortschaft']."-".$row['einsatz_adresse_ortsteil'];
  }
  if($row['einsatz_adresse_ortsteil'] == $row['einsatz_adresse_ortschaft']){
    $ort = $row['einsatz_adresse_ortschaft'];
  }

  echo $row['einsatz_adresse_strasse']." ".$row['einsatz_adresse_hausnummer'].",";
  echo $ort.", ".$row['einsatz_adresse_postleitzahl']."<br />";
  echo $row['einsatz_anzahl_patienten']." Patient_in<br />";
  echo "Anrufer_in:".$row['einsatz_anrufer']."<br />";
  echo "--- --- ---<br />";
  ?>
</button>
<?php
}



?>
