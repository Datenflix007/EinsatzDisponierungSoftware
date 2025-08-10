<?php
include('ini.php');
$em_name = "";
$em_id = "";
$em_status = "";
if(isset($_POST['f_em_id'])){
  $em_id = $_POST['f_em_id'];
}
if(isset($_POST['f_login_go'])){
  $nr = fopen('user/em/em.txt', 'w');
  fwrite($nr,$em_id);
  fclose($nr  );
}
if(!isset($_POST['f_em_id'])){
  $nr = fopen('user/em/em.txt','r');
  $em_id = fread($nr,1000);
  fclose($nr  );
}


if(isset($_POST['f_em_status'])){
      echo "<embed type=\"audio/mp3\" src=\"status.mp3\" width=\"0\" height=\"0\">";
      $status_akt = "";
      $sql= "SELECT * FROM fahrzeuge WHERE fahrzeug_id = $em_id";
      foreach ($pdo->query($sql) as $row) {
        $status_akt = $row['fahrzeug_status'];
        #echo $row['fahrzeug_status'];
      }
      #echo $status_akt;
  $status = $_POST['f_em_status'];

  $sql  = "UPDATE fahrzeuge SET fahrzeug_status = ?, fahrzeug_status_alt = ? WHERE fahrzeug_id = ?";
  $new_status = $pdo->prepare($sql);
  $new_status->execute([$status, $status_akt, $em_id]);
  if(($_POST['f_em_status'] == 5) OR $_POST['f_em_status'] == 0){


    $sql = "INSERT INTO funk_schlange(`funk_id`,`funk_status`,`funk_richtung`,`funk_warten`,`funk_von`,`funk_neu`) VALUES (?,?,?,?,?,?)";
    $que = $pdo->prepare($sql);
    $que->execute([NULL, $_POST['f_em_status'], "e", "", $em_id,"1"]);


  }
  }



 ?>

<center>
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="hidden" name="f_em_id" value="<?php echo $em_id; ?>">
    <table>
      <tr>
        <td><input type="submit" value="1" name="f_em_status" /></td>
        <td><input type="submit" value="2" name="f_em_status" /></td>
        <td><input type="submit" value="3" name="f_em_status" /></td>
      </tr>
      <tr>
        <td><input type="submit" value="4" name="f_em_status" /></td>
        <td><input type="submit" value="5" name="f_em_status" /></td>
        <td><input type="submit" value="6" name="f_em_status" /></td>
      </tr>
      <tr>
        <td><input type="submit" value="7" name="f_em_status" /></td>
        <td><input type="submit" value="8" name="f_em_status" /></td>
        <td><input type="submit" value="9" name="f_em_status" /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="0" name="f_em_status" />  </td>
        <td></td>
      </tr>
    </table>
  </center>
