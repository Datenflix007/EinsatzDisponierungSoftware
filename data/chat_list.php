<!DOCTYPE html>
<html>

<head>
    <title>Titel</title>

    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2">
</head>

<body style="color: white; background-color: #2E2EFE">

  <?php
  include('ini.php');
  $sec = "SELECT * FROM chat ORDER BY id DESC";
  ?><table>
    <tr>
      <td>Zeit</td>
      <td>User</td>
      <td>Nachricht</td>
    </tr>

    <?php
    foreach ($pdo->query($sec) as $message) {
      $user_name = "";

    if(gettype($message['user']) == 'string'){ $user_name = $message['user'];  }
    if(is_numeric($message['user']) == 1){
      $user = "SELECT * FROM user WHERE user_id = ".$message['user'];
      foreach ($pdo->query($user) as $us) {  $user_name = $us['user_username'];  }
    }

     ?>
    <tr>
      <td><?php echo $message['time'] ?></td>
      <td>[<?php echo $user_name ?>]</td>
      <td>"<?php echo $message['message'] ?>"</td>
    </tr>
  <?php } ?>
  </table>
</body>
</html>
