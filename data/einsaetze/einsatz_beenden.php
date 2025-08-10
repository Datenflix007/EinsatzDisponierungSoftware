<style media="screen">
  body{
    background-color: grey;
  }
</style>
<body>
<?php
include('../ini.php');
$einsatz_id = $_POST['f_einsatz_id'];
echo $einsatz_id;


$einsatz_name = "";
foreach($pdo->query("SELECT * FROM einsaetze WHERE einsatz_id = $einsatz_id") as $row){
  $einsatz_name = $row['einsatz_stichwort'];
}

$eintrag = $pdo->prepare($sql_insert_in_einsatztagebuch);
$eintrag->execute([NULL,"Einsatz beendet", $time, " Einsatz Nr.".$einsatz_id."wurde beendet!","EL","Disponent"]);


$i = "i";
$sql_einsatz_beenden_statement->execute([$i, $einsatz_id]);



$sql = "UPDATE fahrzeuge SET fahrzeug_einsatz = ?, fahrzeug_status = ? WHERE fahrzeuge. fahrzeug_einsatz = ? ";
$reset = $pdo->prepare($sql);
$reset->execute([0,1,$einsatz_id]);


$sql = "INSERT INTO einsatztagebuch(`eintrag_id`,`èintrag_uhrzeit`, `eintrag_string`) VALUES (?,?,?)";
$eintrag = $pdo->prepare($sql);
$einsatz_string = $einsatz_name."(".$einsatz_id.")"." wurde beendet!";
$eintrag->execute([NULL, $time, "einsatz_string"]);

echo"Einsatz beendet!";

 ?>
 <form action="einsaetze.php" method="post">
   <input type="submit" name="" value="ZURÜCK">
 </form>
</body>
