<head>
  <link rel="icon" href="data/einsaetze/styles/sonder.png">
</head>
<?php
include('data/ini.php');
$em_name = "";
$em_id = "";
$em_status = "";

if(isset($_POST['f_em_id'])){
  $em_id = $_POST['f_em_id'];
}
if(isset($_POST['f_login_go'])){
  $nr = fopen('data/user/em/em.txt', 'w');
  fwrite($nr,$em_id);
  fclose($nr  );
}
if(!isset($_POST['f_em_id'])){
  $nr = fopen('data/user/em/em.txt','r');
  $em_id = fread($nr); fclose($nr  );
}

  $sql = "SELECT * FROM fahrzeuge WHERE fahrzeug_id = $em_id";
  foreach ($pdo->query($sql) as $row) {
    $em_name = $row['fahrzeug_funkkenner'];
    $em_status = $row['fahrzeug_status'];
  }


  ?>



<head>
  <title>
    <?php echo "[".$em_status."] "; ?>Einsatzmittel &nbsp <?php echo $em_name; ?></title>
    <style media="screen">
      .leftbar{
        position: absolute;
        margin-left: 0px;
        margin-top: 50px;
        margin-bottom: 0px;
        top: 0px;
        left: 0px;
        bottom: 0px;
        border-style: solid;
        border-width: medium;
        border-color: #FF0040;
        background-color: #0404B4;
        transition: 0.5s;
        width: 100px;
        text-align: center;

      }
      .headbar{ top:0px; left: 0px; right:0px; position: absolute; margin-top: 0px;  margin-left: 0px;  margin-right:0px;
        border-style: solid;  border-width: medium;  border-color: #FF0040;  background-color: #0404B4;  height: 50px;
      }

      a{ color:white; text-decoration: none; display: block !important; }
      a:hover, .hover:hover, .head:hover{ background-color: #0080FF; }
      .leftbar:hover{ width: 200px; }
      .head:hover{ height: 75px; font-size: 40; }




      .status{
        position: absolute;
        display: inline-block;
        margin-top: 50px; margin-right: 0px; margin-bottom: 0px;
        right: 0px; top: 50; bottom: 0; width: 1%; height: 90%;
        color: white;
        border-color: red;
        transition: 0.5s;
        z-index: 2;
        display: inline-block;
        position: absolute;
        float: left;
        margin-left: 0px;

      }
      .status:hover{
        width:400px;
      }
      .em{
        background-color: #0080FF;
      }
      .em_head{
        color: #DF013A;
        transition: 0.5s;
        font-size: 20;
      }
      .em_head:hover{
        font-size: 30;
      }
      .rightbar{
        height: 95%; margin-right: 0px; margin-top: 50px; margin-bottom: 0px; position: absolute; background-color: #0404B4;
        width: 10%; margin-left: 95%; border-color: red; border-style: solid;
        border-width: medium;
        border-color: #FF0040;
      }

    </style>

</head>
<body style="background-color: #0101DF">


<div class="chat">
   <iframe style="position: fixed;  margin-top: 160px; margin-left: 200px;" src="data/chat_list.php" width="400" height="500"></iframe>


<?php
$time = date("G:i");
$in = "INSERT INTO chat(`id`, `time`, `user`, `message`) VALUES (?, ?, ?, ?)";
$insert = $pdo->prepare($in);

if(isset($_POST['message_verstanden'])){  $insert->execute([NULL, $time, $em_name, 'Verstanden!' ]); }
if(isset($_POST['message_positiv'])){  $insert->execute([NULL, $time, $em_name, 'Positiv!' ]); }
if(isset($_POST['message_negativ'])){  $insert->execute([NULL, $time, $em_name, 'Negativ!' ]); }
if(isset($_POST['message_wiederhole'])){  $insert->execute([NULL, $time, $em_name, 'Wiederhole!' ]); }
if(isset($_POST['message_per_funk'])){  $insert->execute([NULL, $time, $em_name, 'Komme per Funk!' ]); }
if(isset($_POST['message_per_draht'])){  $insert->execute([NULL, $time, $em_name, 'Komme per Draht!' ]); }
if(isset($_POST['message_senden'])){  $insert->execute([NULL, $time, $em_name, $_POST['message_text'] ]); }
?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" >
    <input type="hidden" name="f_em_id" value="<?php echo $em_id; ?>">
    <input type="hidden" name="f_login_go" value="">

  <input type="submit" name="message_verstanden" value="Verstanden" style=" position: fixed; margin-left: 200px; margin-top: 670px; z-index: 2;" title="Verstanden!" />
  <input type="submit" name="message_positiv" value="Positiv!" style=" position: fixed; margin-left: 280px; margin-top: 670px; z-index: 2;" title="Positiv!" />
  <input type="submit" name="message_negativ" value="Negativ" style=" position: fixed; margin-left: 335px; margin-top: 670px; z-index: 2;" title="Negativ!" />
  <input type="submit" name="message_wiederhole" value="Wiederhole!" style=" position: fixed; margin-left: 395px; margin-top: 670px; z-index: 2;" title="Wiederhole!" />
  <input type="submit" name="message_per_draht" value="Per Draht!" style=" position: fixed; margin-left: 480px; margin-top: 670px; z-index: 2;" title="Komme per Draht!" />
  <input type="submit" name="message_per_funk" value="Per Funk!" style=" position: fixed; margin-left: 530px; margin-top: 670px; z-index: 2;" title="Komme per Funk!" />

</form><form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
  <input type="hidden" name="f_em_id" value="<?php echo $em_id; ?>">
  <input type="hidden" name="f_login_go" value="">
  <input type="text" name="message_text" placeholder="Nachricht..."style=" position: fixed; margin-left: 200px; margin-top: 690px; z-index: 2; width: 200px;" required />
  <input type="submit" name="message_senden" value="SENEDN" style=" position: fixed; margin-left: 400px; margin-top: 690px; z-index: 2;" />
</form>

</div>


<div style="position: fixed; margin-top: 300px; margin-left: 1200px;">
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <input type="hidden" name="f_em_id" value="<?php echo $em_id; ?>">
                  <input type="hidden" name="f_login_go" value="">

    <button type="submit" name="button"><img src="data/styles/refresh.png" height="150" width="150" alt="REFRESH" style="background-color: #2E2EFE;" /></button>
    </form>
</div>




<div class="headbar">
<center><h1 style="color:white; text-decoration: underline overline; margin-top: 2px; position: fixed; transform: 0.75s; margin-left: 43%;">
  <div class="head">
Einsatzmittel
  </div>

</h1></center>
</div>
<div class="leftbar" onmouseover="lefthover" >

    <a href="home.php">LOGOUT</a>
    <br />
    <div class="em">
      <div class="em_head">

    <?php foreach ($pdo->query("SELECT * FROM fahrzeuge WHERE fahrzeug_id = $em_id") as $key) { ?><?php
      echo $key['fahrzeug_funkkenner']."<br /><br />"; ?></div><div class="em_head"><?php

      echo "Status: ".$key['fahrzeug_status']."<br /><br />"; ?></div>    <div class="em_head"><?php

      echo $key['fahrzeug_aktion']; ?></div>    <div class="em_head"><?php

      echo $key['fahrzeug_ziel'];

      ?><?php } ?>


            </div>
            <?php
            foreach ($pdo->query("SELECT * FROM fahrzeuge WHERE fahrzeug_id = $em_id") as $key) {
              if($key['fahrzeug_sprechaufforderung'] == "1"){
                ?>
                <div class="Sprech" style="background-color: orange;">
                  <br />Sprechaufforderung!!!<br />

                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                  <input type="hidden" name="f_em_id" value="<?php echo $em_id; ?>">
                  <input type="hidden" name="f_login_go" value="">
                  <input type="submit" name="f_funk_auflegen" value="AUFLEGEN">
                </form><br /></div>
                <?php

                if(isset($_POST['f_funk_auflegen'])){
                  $sql = "UPDATE fahrzeuge SET fahrzeug_sprechaufforderung = ? WHERE  fahrzeug_id = ?";
                  $auf = $pdo->prepare($sql);
                  $auf->execute(["0",$em_id]);

                }

              }

            }
             ?>
        </div>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        </select>

        <select name="f_location" style="width:100%;">
          <?php foreach ($pdo->query("SELECT * FROM fahrzeuge WHERE fahrzeug_id = ".$em_id) as $key){
            $string = "";
            if($key['fahrzeug_adresse_isset'] == 1){
              foreach ($pdo->query("SELECT * FROM prop_stasse WHERE prop_id = ".$key['fahrzeug_adresse']) as $row) {
                $string = $row['prop_title'];
              }
            }



            ?>
            <option value="<?php echo $key['fahrzeug_id'] ?>"><?php echo $string ?></option>
            <?php
          } ?>

          <?php foreach ($pdo->query("SELECT * FROM prop_stasse") as $row){
            ?>
            <option value="<?php echo $row['prop_id'] ?>"><?php echo $row['prop_title'] ?></option>
            <?php
          }?>
        </select>
        <input type="hidden" name="f_em_id" value="<?php echo $em_id; ?>">

      <select name="f_aktion" style="width: 100%;">
        <option value="">None</option>
        <optgroup label="Frei">
          <option value="Frei auf Streife">Frei auf Streife</option>
          <option value="Frei an UHS">Frei an UHS</option>
          <option value="Bedingt einsatzfähig">Bedingt einsatzfähig</option>
          <option value="Ausrueckverzoegerung">Ausrueckverzoegerung</option>
        </optgroup>
        <optgroup label="Einsatz-Uebernahme">
          <option value="Einsatz uebernommen">Einsatz-uebernommen</option>
          <option value="Einsatz-bestaetigung noch offen">Einsatz-bestaetigung noch offen</option>
        </optgroup>
        <optgroup label="Patientenverlegung">
          <option value="Patienten Verlegung">Patienten Verlegung</option>
        </optgroup>
        <optgroup label="Behandlung v. Ort">
          <option value="Behandlung vor Ort">Behandlung v.O.</option>
          <option value="Übergabe RD">Übergabe RD</option>
        </optgroup>
      </select>
      <select name="f_ziel" style="width: 100%;">
        <option value="">None</option>
        <option value="an Adresse">an Adresse</option>
        <optgroup label="UHS">
          <option value="UHS">UHS</option>
          <option value="Sichtung">Sichtung</option>
          <option value="Sichtung">Suchdienst</option>
          <option value="Grün">Triage: Grün Bhp</option>
          <option value="Gelb">Triage: Gelb Bhp</option>
          <option value="Rot">Triage: Rot Bhp</option>
          <option value="Pat.-Umschlagplatz">Patientenumschlagplatz</option>
        </optgroup>



        <input type="submit" name="f_go" value="SPEICHERN" style="width: 100%;">
      </form>
      <?php if(isset($_POST['f_go'])){
        $sql = "UPDATE fahrzeuge SET fahrzeug_aktion = ?, fahrzeug_ziel = ?, fahrzeug_adresse= ? WHERE fahrzeug_id = ? ";
        $up = $pdo->prepare($sql);
        $up->execute([$_POST['f_aktion'], $_POST['f_ziel'], $_POST['f_location'],$em_id]);



      } ?>

</div>
<div class="rightbar">
  &nbsp  &nbsp
</div>
<div class="status" >


  <div class="status_title" style="float: left; margin-right: 10px;">
    S &nbsp<br />T &nbsp<br />A &nbsp<br />T &nbsp<br />U &nbsp<br />S &nbsp
  </div>
  <div class="status_hover">
      <iframe src="data/status.php" width="150" height="150"></iframe>
  </div>

</div>


<?php


$einsatz_nr = "";
$sql = "SELECT * FROM fahrzeuge WHERE fahrzeug_id = $em_id";
foreach ($pdo->query($sql) as $row) {
  $einsatz_nr = $row['fahrzeug_einsatz'];

}
?><center><br /><br />
<div style="background-image: url(data/dme.png); height: 500px; width: 400px;background-repeat: no-repeat; position: fixed; margin-left: 37%; margin-top: 5%;">
<div style=" font-size: 20; text-align: left; background-color: #F2F5A9; width: 245px; height: 150px; position: fixed; margin-top: 100px; margin-left: 66px;">
  <?php

  $sql = "SELECT * FROM einsaetze WHERE einsatz_id = ".$einsatz_nr;
  foreach ($pdo->query($sql) as $row) {

    $ssl = "SELECT * FROM einsatz_stichwort WHERE einsatz_stichwort_id =".$row['einsatz_stichwort'];
    foreach ($pdo->query($ssl) as $key) {

      echo $key['einsatz_stichwort_title']."<br />";
    }
    echo $row['einsatz_freitext']."<br />";
    if($row['einsatz_adresse_isset'] == 1){
      $ssl = "SELECT * FROM prop_stasse WHERE prop_id =".$row['einsatz_adresse'];
      foreach ($pdo->query($ssl) as $key) {

        if($key['prop_art'] == "Haus"){
          echo $key['prop_title'];
        }
        if(($key['prop_art'] == "OS") OR $key['prop_art'] == "B"){
          echo "Straße: ".$key['prop_title'];
        }
      }
    }
    if($row['einsatz_adresse_isset'] == "0"){
      echo $row['einsatz_adresse_strasse']." ";
      echo $row['einsatz_adresse_hausnummer']."<br /><br />";

      if($row['einsatz_adresse_ortschaft'] == $row['einsatz_adresse_ortsteil']){
        echo $row['einsatz_adresse_ortschaft'];
      }
      if($row['einsatz_adresse_ortschaft'] != $row['einsatz_adresse_ortsteil']){
        echo $row['einsatz_adresse_ortschaft'] ."-". $row['einsatz_adresse_ortsteil'];
      }
    }







  }
?>
</div>
</div>



<br /><br />

</center>









</form>
</body>
