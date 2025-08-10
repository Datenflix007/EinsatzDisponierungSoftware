<style media="screen">
  body{
    background-color: grey;
    color: white;
  }
</style>
<body>
<?php
error_reporting(0);
include('../ini.php');
if(isset($_POST['f_fahrzeuge_del'])){

  $del_id = $_POST['f_fahrzeuge_primkey'];
  $del_sql = "DELETE FROM fahrzeuge WHERE fahrzeuge . fahrzeug_id = ?";
  $pdo = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
  $del = $pdo->prepare($del_sql);
  $del->execute(array($del_id));

  echo"Eintrag wurde gelöscht";
}


 ?>
<form action="fahrzeuge.php" method="post">
  <input type="submit" name="" value="ZURÜCK">
</form>
</body>
