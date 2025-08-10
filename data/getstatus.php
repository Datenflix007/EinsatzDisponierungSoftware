<head>

  </head>
<body>
<?php
$usernr = fopen('user/admin/current.txt','r');
$nr = fread($usernr,'2');
fclose($usernr);
#echo $nr;

$sql = "SELECT * FROM user WHERE user_id = $nr";
include('ini.php');
foreach ($pdo->query($sql) as $user) {
  echo "<button type=\"button\" name=\"button\"><h3>".$user['user_username']."</h3></button>";
}
?>

 <br />
 <table>
   <tr><td>Sprechwunsch</td></tr></table>
 <details open>
   <summary>Notruf:</summary>

    <iframe src="funk/s5notruf.php" width="120px" style="height: 200px;" ></iframe>


</details>
<details open>
  <summary>Warten:</summary>

        <iframe src="funk/s5warten.php" width="120px" style="height: 200px;" /></iframe>
</details>
<details open>
  <summary>Normal:</summary>

<iframe src="funk/s5normal.php" width="120px" style="height: 200px;" /></iframe>

</details>
</body>
