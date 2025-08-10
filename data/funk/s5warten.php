<head>
    <meta http-equiv="refresh" content="2" />
  </head>
<body>
<?php
include('../ini.php');

if(isset($_POST['f_sprechwunsch_annehmen'])){
  $nr = $_POST['f_sprechwunsch_id'];

  $funk_von = "";//fahrzeug_id
  $sql = "SELECT * FROM funk_schlange WHERE funk_id = $nr";
  foreach ($pdo->query($sql) as $row) {
    $funk_von = $row['funk_von'];
  }


  $status_alt = "";
  $sql = "SELECT * FROM fahrzeuge WHERE fahrzeug_id = $funk_von";
  foreach ($pdo->query($sql) as $row) {
    $status_alt = $row['fahrzeug_status_alt'];

  }

    $sql = "UPDATE fahrzeuge SET fahrzeug_status = ?, fahrzeug_status_alt = ?, fahrzeug_sprechaufforderung = ? WHERE fahrzeug_id = ?";
    $new_status = $pdo->prepare($sql);
    $new_status->execute([$status_alt,"","1",$funk_von]);

  $sql = "DELETE FROM funk_schlange WHERE funk_id =".$nr;
  $annehmen = $pdo->prepare($sql);
  $annehmen->execute();



}
if(isset($_POST['f_sprechwunsch_warten'])){
  $nr = $_POST['f_sprechwunsch_id'];
  $sql = "UPDATE funk_schlange SET funk_warten = ? WHERE funk_id = ?";
  $warten = $pdo->prepare($sql);
  $warten->execute(["1",$nr]);
}



$sql = "SELECT * FROM funk_schlange";
 ?>



<table>


    <?php

     foreach ($pdo->query($sql) as $sprechwunsch) {
       if($sprechwunsch['funk_warten'] == 1){

       $nr = $sprechwunsch['funk_von'];
       $help = "SELECT * FROM fahrzeuge WHERE fahrzeug_id = ". $nr ;
       ?><tr style="background-color: yellow;"><td><?php
       foreach ($pdo->query($help) as $em) {
             echo $em['fahrzeug_funkkenner'];
       }
       echo " Status ".$sprechwunsch['funk_status']."<br />";
       ?>
       <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
         <input type="hidden" name="f_sprechwunsch_id" value="<?php echo $sprechwunsch['funk_id']; ?>">
         <input type="submit" name="f_sprechwunsch_annehmen" value="ANNEHMEN" /><br /><br />
       </form>
       <?php
     }
     ?>
     </td></tr>
     <?php
    }
     ?>

   </table>


 </table>


</body>
