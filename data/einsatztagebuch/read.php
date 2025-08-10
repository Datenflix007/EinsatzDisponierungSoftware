<style media="screen">

    body{background-color: grey; }

</style>
<body>
  <h1>Einsatztagebuch:</h1>
  <?php
  include('../ini.php');
  if(!isset($_POST['f_diary_new_entry'])){
  ?>
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" name="f_diary_new_entry" value="NEUER EINTRAG" style="background-color: orange;" />
  </form><br />
<?php

}
if(isset($_POST['f_diary_new_entry'])){
  echo"Neuer Tagebucheintrag:";
  ?>
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="f_diary_absender" placeholder="Absender" required/>
    <input type="text" name="f_diary_ea" placeholder="EA" required/><br />
    <input type="text" name="f_diary_title" placeholder="Titel" required />
    <input type="text" name="f_diary_text" placeholder="Text" required/>

    <input type="submit" name="f_diary_go" placeholder="SPEICHERN" style="background-color: orange;"/>
  </form><?php
}
if(isset($_POST['f_diary_go'])){
  echo"SPEICHERN";
  $sql = "INSERT INTO `einsatztagebuch` (`eintrag_id`, `eintrag_titel`, `eintrag_uhrzeit`, `eintrag_string`, `eintrag_ea`, `eintrag_absender`) VALUES (?,?, ?, ?, ?, ?)";
  $prepare = $pdo->prepare($sql);
  $prepare->execute([NULL, $_POST['f_diary_title'],$time, $_POST['f_diary_text'],$_POST['f_diary_ea'],$_POST['f_diary_absender']]);
}

$sql_select_tagebuch_eintraege = "SELECT * FROM einsatztagebuch";
?>
<table border="0">
  <tr style="background-color: orange;">
    <td style="border-right: solid; border-width: 1px; ;">Nr.</td>
    <td style="border-right: solid; border-width: 1px; ;">Zeit</td>
    <td style="border-right: solid; border-width: 1px; ;">Absender</td>
    <td style="border-right: solid; border-width: 1px; ;">EA</td>
    <td>Text</td>
</tr>
<?php
foreach ($pdo->query($sql_select_tagebuch_eintraege) as $eintrag) {
  ?>

      <tr>
        <td style="border-right: solid; border-width: 1px; border-right-color: white;"><?php echo $eintrag['eintrag_id']; ?></td>
        <td style="border-right: solid; border-width: 1px; border-right-color: white;"><?php echo $eintrag['eintrag_uhrzeit'].": "; ?></td>
        <td style="border-right: solid; border-width: 1px; border-right-color: white;"><?php echo $eintrag['eintrag_absender']; ?></td>
        <td style="border-right: solid; border-width: 1px; border-right-color: white;"><?php echo $eintrag['eintrag_ea']; ?></td>
        <td style="  color: blue;"><?php echo $eintrag['eintrag_titel']; ?></td>
    </tr>
    <tr style="border-bottom: solid; border-width: 1px; border-bottom-color: white;">
        <td style="border-right: solid; border-width: 1px; border-right-color: white;border-bottom: solid; border-width: 1px; border-bottom-color: white;"></td>
        <td style="border-right: solid; border-width: 1px; border-right-color: white;border-bottom: solid; border-width: 1px; border-bottom-color: white;"></td>
        <td style="border-right: solid; border-width: 1px; border-right-color: white;border-bottom: solid; border-width: 1px; border-bottom-color: white;"></td>
        <td style="border-right: solid; border-width: 1px; border-right-color: white;border-bottom: solid; border-width: 1px; border-bottom-color: white;"></td>
        <td style="border-bottom: solid; border-width: 1px; border-bottom-color: white;"><?php echo $eintrag['eintrag_string'];?></td>
  </tr>

  <?php
}
 ?>
 </table>
</body>
