
<head>
  <?php
  if(isset($_POST['f_stop'])){
    $run = fopen("../mods/fahrzeuge.ini", "w");
    fwrite($run, "1");
    fclose($run);
  }
  if(isset($_POST['f_run'])){
    $run = fopen("../mods/fahrzeuge.ini", "w");
    fwrite($run, "0");
    fclose($run);
  }



  $run_mode = "";
  $run = fopen("../mods/fahrzeuge.ini", "r");
  $run_mode = fread($run, 1);
  fclose($run);
  if($run_mode == 0){
    ?><meta http-equiv="refresh" content="2" /><?php
  }

  ?>
    <style media="screen">
      .f_fahrzeuge_id:hover ,button:hover{
        transform: scale(1.3);
      }
    </style>
  </head>
<body>
  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

  <h1>Einsatzmittelliste &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <?php if($run_mode == 0){ ?><button type="submit" name="f_stop" style="height: 50px; width: 50px;">STOP</button><?php } ?>
  <?php if($run_mode == 1){ ?><button type="submit" name="f_run" style="height: 50px; width: 50px;">RUN</button><?php } ?> </h1>
    </form>
<?php
include('../ini.php');
include('../read_dll.php');
?>
<form action="<?php echo $fahr_new ?>" method="post">
  <input type="submit" name="f_fahrzeuge_add" value=HINZUFÜGEN />
</form>
<br />

<form action="<?php echo $fahr_read ?>" method="post">
  <table>
    <tr style="text-align: center; background-color: orange;"><td>Nr.</td><td>Sts</td><td>Kenner.</td><td>Aktion</td><td>Standort</td><td>HiOrg</td></tr>
    <?php
        foreach(  $pdo->query($sql_select_fahrzeuge) as $row)
        {
        ?>
    <tr>
      <td>
        <input type="submit" class="f_fahrzeuge_id"  name="f_fahrzeuge_id" value="<?php echo $row['fahrzeug_id'] ?>" style=" cursor: pointer; height: 50; width: 50;
        <?php
        switch ($row['fahrzeug_status']) {

                      case '1': echo "background-color: blue; color: white; border-size:2";         break;
                      case '2': echo "background-color: green; color: white; border-size:2";        break;
                      case '3': echo "background-color: yellow; color: black; border-size:2";       break;
                      case '4': echo "background-color: red; color: white; border-size:2";          break;
                      case '5': echo "background-color: black; color: white; border-size:2";        break;
                      case '6': echo "background-color: purple; color: white; border-size:2";       break;
                      case '7': echo "background-color: orange; color: black; border-size:2";       break;
                      case '8': echo "background-color: light-green; color: black; border-size:2";  break;
                      case '9': echo "background-color: purple; color: white; border-size:2";       break;
                      case '0': echo "background-color: black; color: white; border-size:2";        break;

              } ?>" />
      </td><td>
          <button type="button" name="button" value="<?php echo $row['fahrzeug_id'] ?>"
            title="
Status 1&nbsp(blau)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-> Frei über Funk
Status 2&nbsp(grün)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-> Frei auf Wache
Status 3&nbsp(gelb)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-> Einsatz übernommen / Auf Anfahrt
Status 4&nbsp(rot)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-> am Einsatzort eingetroffen
Status 5&nbsp(schwarz)&nbsp-> Sprechwunsch(normal)
Status 6&nbsp(lila)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-> Nicht einsatzbereit
Status 7&nbsp(orange)&nbsp&nbsp-> Einsatzgebunden / Patient aufgenommen
Status 8&nbsp(weiß)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-> Am Krankenhaus eingetroffen
Status 9&nbsp(lila)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-> Fremdquitierung  / Desinfektion
Status 0&nbsp(schwarz)&nbsp-> Sprechwunsch(Priorität)
" style="cursor: help; height: 50; width: 20;
          <?php switch ($row['fahrzeug_status']) {

                    case '1': echo "background-color: blue; color: white; border-size:2";         break;
                    case '2': echo "background-color: green; color: white; border-size:2";        break;
                    case '3': echo "background-color: yellow; color: black; border-size:2";       break;
                    case '4': echo "background-color: red; color: white; border-size:2";          break;
                    case '5': echo "background-color: black; color: white; border-size:2";        break;
                    case '6': echo "background-color: purple; color: white; border-size:2";       break;
                    case '7': echo "background-color: orange; color: black; border-size:2";       break;
                    case '8': echo "background-color: light-green; color: black; border-size:2";  break;
                    case '9': echo "background-color: purple; color: white; border-size:2";       break;
                    case '0': echo "background-color: black; color: white; border-size:2";        break;

            } ?>" >
          <?php
          echo $row['fahrzeug_status'];

          ?>

          </button>


      </td><td>
  <button type="button" name="button" value="<?php echo $row['fahrzeug_id'] ?>" title="Funkkenner des Einsatzmittels" style="height: 50; width: 80;
  <?php switch ($row['fahrzeug_status']) {

                case '1': echo "background-color: blue; color: white; border-size:2";         break;
                case '2': echo "background-color: green; color: white; border-size:2";        break;
                case '3': echo "background-color: yellow; color: black; border-size:2";       break;
                case '4': echo "background-color: red; color: white; border-size:2";          break;
                case '5': echo "background-color: black; color: white; border-size:2";        break;
                case '6': echo "background-color: purple; color: white; border-size:2";       break;
                case '7': echo "background-color: orange; color: black; border-size:2";       break;
                case '8': echo "background-color: light-green; color: black; border-size:2";  break;
                case '9': echo "background-color: purple; color: white; border-size:2";       break;
                case '0': echo "background-color: black; color: white; border-size:2";        break;

        } ?>" >
    <?php
    echo $row['fahrzeug_funkkenner'];

    ?>

  </button>


</td><td>
<button type="button" name="button" value="<?php echo $row['fahrzeug_id'] ?>" title="Aktuelle Aktivität des Einsatzmittels" style="height: 50; width: 100;
<?php switch ($row['fahrzeug_status']) {

              case '1': echo "background-color: blue; color: white; border-size:2";         break;
              case '2': echo "background-color: green; color: white; border-size:2";        break;
              case '3': echo "background-color: yellow; color: black; border-size:2";       break;
              case '4': echo "background-color: red; color: white; border-size:2";          break;
              case '5': echo "background-color: black; color: white; border-size:2";        break;
              case '6': echo "background-color: purple; color: white; border-size:2";       break;
              case '7': echo "background-color: orange; color: black; border-size:2";       break;
              case '8': echo "background-color: light-green; color: black; border-size:2";  break;
              case '9': echo "background-color: purple; color: white; border-size:2";       break;
              case '0': echo "background-color: black; color: white; border-size:2";        break;

      } ?>" >
  <?php
  echo $row['fahrzeug_aktion'];

  ?>

</button>


</td><td>
<button type="button" name="button" value="<?php echo $row['fahrzeug_id'] ?>" style="height: 50; width: 100;
<?php switch ($row['fahrzeug_status']) {

              case '1': echo "background-color: blue; color: white; border-size:2";         break;
              case '2': echo "background-color: green; color: white; border-size:2";        break;
              case '3': echo "background-color: yellow; color: black; border-size:2";       break;
              case '4': echo "background-color: red; color: white; border-size:2";          break;
              case '5': echo "background-color: black; color: white; border-size:2";        break;
              case '6': echo "background-color: purple; color: white; border-size:2";       break;
              case '7': echo "background-color: orange; color: black; border-size:2";       break;
              case '8': echo "background-color: light-green; color: black; border-size:2";  break;
              case '9': echo "background-color: purple; color: white; border-size:2";       break;
              case '0': echo "background-color: black; color: white; border-size:2";        break;

      } ?>" >


      <?php
      $adress_title = $row['fahrzeug_adresse'];
      if($row['fahrzeug_adresse_isset'] == 1){
        $sql = "SELECT * FROM prop_stasse WHERE prop_id = ".$row['fahrzeug_adresse'];
        foreach ($pdo->query($sql) as $key) {
          $adress_title = $key['prop_title'];
        }
      }
       ?>
      <span title="<?php echo $adress_title ?>" style="cursor: help;">
        <?php if($row['fahrzeug_adresse_isset']){ echo $row['fahrzeug_adresse']; }  ?>
      </span>


</button>


</td>
<td>

  <?php #echo $row['fahrzeug_organisation'];
  $org = "";
  $alt = "";

switch ($row['fahrzeug_organisation']) {
  case 'rd_drk':    $org = "orgs/drk.jpg";     break;
  case 'drk_rhs':$org = "orgs/drk_rhs.jpg"; break;
  case 'rd_asb':    $org = "orgs/asb.jpg";     break;
  case 'fd_vpd': $org = "orgs/drk.jpg";     break;
  case 'rd_juh':    $org = "orgs/juh.png";     break;
  case 'rd_mhd':    $org = "orgs/mhd.jpg";     break;


  case 'drk':    $org = "orgs/drk.jpg";     break;
  case 'drk_ww': $org = "orgs/drk_ww.png";  break;
  case 'drk_bw': $org = "orgs/drk_bw.png";  break;
  case 'drk_rhs':$org = "orgs/drk_rhs.jpg"; break;
  case 'asb':    $org = "orgs/asb.jpg";     break;
  case 'bmfbs':  $org = "orgs/bmfbs.png";   break;
  case 'bw_san': $org = "orgs/bw_san.png";  break;
  case 'fd_vpd': $org = "orgs/drk.jpg";     break;
  case 'juh':    $org = "orgs/juh.png";     break;
  case 'mhd':    $org = "orgs/mhd.jpg";     break;
  case 'thw':    $org = "orgs/thw.gif";     break;

  default: $org = "orgs/rd.jpg"; break;
}

  ?>
  <button type="button" name="button" value="<?php echo $row['fahrzeug_id'] ?>">
  <img src="<?php echo $org ?>" alt="<?php
  switch ($row['fahrzeug_organisation']) {
    case 'drk':    $alt = "Deutsches Rotes Kreuz";     break;
    case 'drk_ww': $alt = "Wasserwacht";  break;
    case 'drk_bw': $alt = "Bergwacht";  break;
    case 'drk_rhs':$alt = "Rettungshundestaffel"; break;
    case 'asb':    $alt = "Areiter Samariter Bund";     break;
    case 'bmfbs':  $alt = "Bundsministerium für Katastrophen- und Bevölkerungsschutz";   break;
    case 'bw_san': $alt = "Bundeswehr: Sanitätsdienst";  break;
    case 'fd_vpd': $alt = "Verpflegungsdienst";     break;
    case 'juh':    $alt = "Johanniter Unfall Hilfe";     break;
    case 'mhd':    $alt = "Malteser Hilfs Dienst";     break;
    case 'thw':    $alt = "Technisches Hilfs Werk";     break;

    default: $org = "Private/ Sonstige Rettung/BOS"; break;
  }


   ?>" width="44" height="44"></button>
   </td>
  <tr>

  <?php
  #echo"----- ----- ----- ----- ----- ----- ----- ----- -----<br />";

}


?>

</table>
</form>
</body>
