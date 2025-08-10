<?php
include('ini.php');
$time = date("G:i");
$in = "INSERT INTO chat(`id`, `time`, `user`, `message`) VALUES (?, ?, ?, ?)";
$insert = $pdo->prepare($in);

if(isset($_POST['message_go'])){ $insert->execute([NULL, $time, "1", $_POST['message_text'] ]); }
if(isset($_POST['message_verstanden'])){  $insert->execute([NULL, $time, "1", 'Verstanden!' ]); }
if(isset($_POST['message_positiv'])){  $insert->execute([NULL, $time, "1", 'Positiv!' ]); }
if(isset($_POST['message_negativ'])){  $insert->execute([NULL, $time, "1", 'Negativ!' ]); }
if(isset($_POST['message_wiederhole'])){  $insert->execute([NULL, $time, "1", 'Wiederhole!' ]); }
if(isset($_POST['message_per_funk'])){  $insert->execute([NULL, $time, "1", 'Komme per Funk!' ]); }
if(isset($_POST['message_per_draht'])){  $insert->execute([NULL, $time, "1", 'Komme per Draht!' ]); }

if(isset($_POST['message_warten'])){  $insert->execute([NULL, $time, "1", 'Warten!' ]); }
if(isset($_POST['message_zurück'])){  $insert->execute([NULL, $time, "1", 'Zurück!' ]); }
if(isset($_POST['message_frage_standort'])){  $insert->execute([NULL, $time, "1", 'Frage: Standort?' ]); }
if(isset($_POST['message_frage_kommunikation'])){  $insert->execute([NULL, $time, "1", 'Frage: Kommunikation?' ]); }
?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" >
  <iframe src="chat_list.php" width="480" height="500"></iframe><br /><br />

  <input type="submit" name="message_verstanden" value="Verstanden"  title="Verstanden!" />
  <input type="submit" name="message_positiv" value="Positiv!"  title="Positiv!" />
  <input type="submit" name="message_negativ" value="Negativ"  title="Negativ!" />
  <input type="submit" name="message_wiederhole" value="Wiederhole!"  title="Wiederhole!" />
  <input type="submit" name="message_per_draht" value="Per Draht!"  title="Komme per Draht!" />
  <input type="submit" name="message_per_funk" value="Per Funk!"  title="Komme per Funk!" />
  <br />
  <details>
    <summary><span style="font-size: 35;">Erweitert</span></summary>
    <input type="submit" name="message_warten" value="Warten!"  title="Warten!" />
    <input type="submit" name="message_zurück" value="ZURÜCK!"  title="ZURÜCK!" /><br />
    <input type="submit" name="message_frage_standort" value="Frage Standort?"  title="Frage Standort?" />
    <input type="submit" name="message_frage_kommunikation" value="Frage Kommunikation"  title="Frage Kommunikation?" />

  </details>


  </form><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" >

  <input type="text" name="message_text" placeholder="Nachricht" required>
  <input type="submit" name="message_go" value="SENDEN">
</form>
