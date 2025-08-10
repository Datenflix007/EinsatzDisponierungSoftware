
<html lang="de" dir="ltr">
<head >
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />

    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
    <script type='text/javascript' src='http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js'></script>

    <?php
    include('ini.php');
     include("read_dll.php");
         $map = parse_ini_file($link_settings);
         $icon = parse_ini_file($link_bos_kenner_link);
         $karte_ini = parse_ini_file($link_karte);
     ?>
    <style>
        .info{
            position: fixed;
            width: 300px;
            height: 150px;
            margin-right: 0px;
            margin-top: 20px;
            margin-left: 1150px;
            z-index: 2;
            background-color: #F7BE81;
            border-style: dotted;
            border-color: black;

        }
    </style>
 </head>

 <body>
   <?php



//Konsolen Eingabe
$x = "";//Fahrzeug
$y = "";
$x_e = "";//Fahrzeug-Einsatz
$y_e = "";
$e_id = "";
$x_z = "";//fahrzeug-Ziel
$y_z = "";
$z_id ="";
if(isset($_POST['console'])){
  $karte = fopen("mods/karte_console.cfg", 'w');
  fwrite($karte, $_POST['console']);
  fclose($karte);

  $str = $_POST['console'];

  $pattern = '/\/\/help/';
  if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
    ?><div class="info">//zoom_<br />
                            <table>
                              <tr>
                                <td style="width: 30px;">em_[ID]</td>
                                <td style="width: 30px;">&nbsp->&nbsp</td>
                                <td>Einsatzmittel von [ID] zoomen</td>
                              </tr>
                              <tr>
                                <td>einsatz_[ID]</td>
                                <td>&nbsp->&nbsp</td>
                                <td>Einsatz [ID] zoomen</td>
                              </tr>
                              <tr>
                                <td>adresse_[ID]</td>
                                <td>&nbsp->&nbsp</td>
                                <td>Adresse [ID] zoomen</td>
                              </tr>
                              <tr>
                                <td>karte_[ID]</td>
                                <td>&nbsp->&nbsp</td>
                                <td>Karten Element [ID] zoomen</td>
                              </tr>
                            </table>


                                  </div><?php
  }
  ##############################################################################
  $pattern = '/\/\/zoom_/';
  if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
    #echo "na hallo!";

    $pattern = '/adresse_/';
    if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
        ?>  <div class="info"><?php
      echo"Adresse:";

      $sql = "SELECT * FROM prop_stasse";
      foreach($pdo->query($sql) as $adr){
        $pattern = '/'.$adr['prop_id'].'/';
        if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
          $x = $adr['prop_x'];
          $y = $adr['prop_y'];


          echo $adr['prop_id'];


        }
      }?><br />Function coming soon!</div><?php
    }
    ############################################################################
    $pattern = '/einsatz_/';
    if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
        ?>  <?php


      $sql = "SELECT * FROM einsaetze";
      foreach($pdo->query($sql) as $adr){
        $pattern = '/'.$adr['einsatz_id'].'/';
        if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
          $x = $adr['einsatz_x'];
          $y = $adr['einsatz_y'];




          $karte = fopen($link_karte, 'w');
          fwrite($karte, "mode = 1");
          fclose($karte);

        $stich = "";
        $sql = "SELECT * FROM einsatz_stichwort WHERE einsatz_stichwort_id = ".$adr['einsatz_stichwort'];
        foreach ($pdo->query($sql) as $key) {
          $stich = $key['einsatz_stichwort_title'];
        }
        $adr_string = "";
        if($adr['einsatz_adresse_isset'] == 1){
          $sql = "SELECT * FROM prop_stasse WHERE prop_id = ".$adr['einsatz_adresse'];
          foreach ($pdo->query($sql) as $key) {
            $adr_string = $key['prop_title'];

          }
        }
        if($adr['einsatz_adresse_isset'] == 0){

            $adr_string = $adr['einsatz_adresse_strasse']."&nbsp".$adr['einsatz_adresse_hausnummer'].",<br />".$adr['einsatz_adresse_ortschaft']."-".$adr['einsatz_adresse_ortsteil']."&nbsp".$adr['einsatz_adresse_postleitzahl'];

        }

        ?><div class="info"><?php
        echo"Einsatz:";
        echo $adr['einsatz_id']."<br />";
        echo $stich."<br />";
        echo $adr_string;

        ?></div><?php
        }
      }
    }
    ############################################################################
    $pattern = '/em_/';
    if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
    ?>
        <div class="info">
        <?php
      echo"EM:";

      $sql = "SELECT * FROM fahrzeuge";
      foreach ($pdo->query($sql) as $key) {
      $pos ="";
      $ziel = "";
        $pattern = '/'.$key['fahrzeug_id'].'/';
        if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
        ?>
            <span style="font-size: x-large; ">
          <?php echo $key['fahrzeug_funkkenner']; ?>
                 </span>
          <?php
          if($key['fahrzeug_adresse_isset'] == 1){
            $ssl = "SELECT * FROM prop_stasse WHERE prop_id = ".$key['fahrzeug_adresse'];
            foreach ($pdo->query($ssl) as $row) {
              $x = $row['prop_x'];
              $y = $row['prop_y'];

              $pos = $row['prop_title'];

              $karte = fopen($link_karte, 'w');
              fwrite($karte, 'mode = 1');
              fclose($karte);
            }
        }//ENde EM Position
        if($key['fahrzeug_einsatz'] != 0){
          $ssl = "SELECT * FROM einsaetze WHERE einsatz_id = ".$key['fahrzeug_einsatz'];
          foreach ($pdo->query($ssl) as $row) {
            $x_e = $row['einsatz_x'];
            $y_e = $row['einsatz_y'];
            $e_id = $row['einsatz_id'];
          }
        }
        if($key['fahrzeug_ziel'] != 0){
          $ssl = "SELECT * FROM prop_stasse WHERE prop_id = ".$key['fahrzeug_ziel'];
          foreach ($pdo->query($ssl) as $row) {
            $x_z = $row['prop_x'];
            $y_z = $row['prop_y'];
            #$e_id = $row['prop_id'];
          }
        }



        ?>
        <br />
        Position: <?php echo $pos; ?>
        <br />Ziel:
        <?php
      }//Ende EM_ID

      }
    }
    $pattern = '/karte_/';
    if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
      echo"Karte:";

      $sql = "SELECT * FROM prop_karte";
      foreach ($pdo->query($sql) as $key) {
        $pattern = '/'.$key['prop_id'].'/';
        if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
          echo" hallo prop".$key['prop_title'];

            $x = $key['prop_x'];
            $y = $key['prop_y'];

            $karte = fopen($link_karte, 'w');
            fwrite($karte, "mode = 1");
            fclose($karte);

        }



      }

    }

  }
  $pattern = '/\/\/finish/';
  if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
    $karte = fopen($link_karte, 'w');
    fwrite($karte, 'mode = 0');
    fclose($karte);
  }


}
$string  = fopen("mods/karte_console.cfg", "r");
$string_string =  fread($string, "60");
fclose($string);

if((!isset($_POST['console'])) AND ($string != "")){
  $command = fopen("mods/karte_console.cfg", 'w');
  fwrite($command, $string_string);
  fclose($command);

  $str = $string_string;
  ##############################################################################
  $pattern = '/\/\/zoom_/';
  if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
    #echo "na hallo!";

    $pattern = '/adresse_/';
    if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
        ?>  <div class="info"><?php
      echo"Adresse:";

      $sql = "SELECT * FROM prop_stasse";
      foreach($pdo->query($sql) as $adr){
        $pattern = '/'.$adr['prop_id'].'/';
        if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
          $x = $adr['prop_x'];
          $y = $adr['prop_y'];


          echo $adr['prop_id'];


        }
      }?><br />Function coming soon!</div><?php
    }
    ############################################################################
    $pattern = '/einsatz_/';
    if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
        ?>  <?php


      $sql = "SELECT * FROM einsaetze";
      foreach($pdo->query($sql) as $adr){
        $pattern = '/'.$adr['einsatz_id'].'/';
        if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
          $x = $adr['einsatz_x'];
          $y = $adr['einsatz_y'];




          $karte = fopen($link_karte, 'w');
          fwrite($karte, "mode = 1");
          fclose($karte);
        }
        $stich = "";
        $sql = "SELECT * FROM einsatz_stichwort WHERE einsatz_stichwort_id = ".$adr['einsatz_stichwort'];
        foreach ($pdo->query($sql) as $key) {
          $stich = $key['einsatz_stichwort_title'];
        }
        $adr_string = "";
        if($adr['einsatz_adresse_isset'] == 1){
          $sql = "SELECT * FROM prop_stasse WHERE prop_id = ".$adr['einsatz_adresse'];
          foreach ($pdo->query($sql) as $key) {
            $adr_string = $key['prop_title'];

          }
        }
        if($adr['einsatz_adresse_isset'] == 0){

            $adr_string = $adr['einsatz_adresse_strasse']."&nbsp".$adr['einsatz_adresse_hausnummer'].",<br />".$adr['einsatz_adresse_ortschaft']."-".$adr['einsatz_adresse_ortsteil']."&nbsp".$adr['einsatz_adresse_postleitzahl'];

        }

        ?><div class="info"><?php
        echo"Einsatz:";
        echo $adr['einsatz_id']."<br />";
        echo $stich."<br />";
        echo $adr_string;

        ?></div><?php
      }
    }
    ############################################################################
    $pattern = '/em_/';
    if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
    ?>
        <div class="info">
        <?php
      echo"EM:";

      $sql = "SELECT * FROM fahrzeuge";
      foreach ($pdo->query($sql) as $key) {
      $pos ="";
      $ziel = "";
        $pattern = '/'.$key['fahrzeug_id'].'/';
        if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
        ?>
            <span style="font-size: x-large; ">
          <?php echo $key['fahrzeug_funkkenner']; ?>
                 </span>
          <?php
          if($key['fahrzeug_adresse_isset'] == 1){
            $ssl = "SELECT * FROM prop_stasse WHERE prop_id = ".$key['fahrzeug_adresse'];
            foreach ($pdo->query($ssl) as $row) {
              $x = $row['prop_x'];
              $y = $row['prop_y'];

              $pos = $row['prop_title'];

              $karte = fopen($link_karte, 'w');
              fwrite($karte, 'mode = 1');
              fclose($karte);
            }
        }//ENde EM Position
        if($key['fahrzeug_einsatz'] != 0){
          $ssl = "SELECT * FROM einsaetze WHERE einsatz_id = ".$key['fahrzeug_einsatz'];
          foreach ($pdo->query($ssl) as $row) {
            $x_e = $row['einsatz_x'];
            $y_e = $row['einsatz_y'];
            $e_id = $row['einsatz_id'];
          }
        }
        if($key['fahrzeug_ziel'] != 0){
          $ssl = "SELECT * FROM prop_stasse WHERE prop_id = ".$key['fahrzeug_ziel'];
          foreach ($pdo->query($ssl) as $row) {
            $x_z = $row['prop_x'];
            $y_z = $row['prop_y'];
            #$e_id = $row['prop_id'];
          }
        }



        ?>
        <br />
        Position: <?php echo $pos; ?>
        <br />Ziel:
        <?php
      }//Ende EM_ID

      }
    }
    $pattern = '/karte_/';
    if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
      echo"Karte:";

      $sql = "SELECT * FROM prop_karte";
      foreach ($pdo->query($sql) as $key) {
        $pattern = '/'.$key['prop_id'].'/';
        if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
          echo" hallo prop".$key['prop_title'];

            $x = $key['prop_x'];
            $y = $key['prop_y'];

            $karte = fopen($link_karte, 'w');
            fwrite($karte, "mode = 1");
            fclose($karte);

        }



      }

    }

  }
  $pattern = '/\/\/finish/';
  if(preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)){
    $karte = fopen($link_karte, 'w');
    fwrite($karte, 'mode = 0');
    fclose($karte);
  }


}




 ?>
</div>
<div id="map" style="height: 440px; border: 1px solid #AAA;"></div>

<script type="text/javascript">

var icon_vp = L.icon({ iconURL: "geojson/VP1.png"});



var map_x = "<?php echo $map['map']['x'] ?>";
var map_y = "<?php echo $map['map']['y'] ?>";
var zoom_level = "";
<?php

//Abgleich karte.ini

$karte_ini = parse_ini_file('mods/karte.cfg');
switch ($karte_ini['mode']) {
  case '1':
      ?>
      map_x = "<?php echo $x ?>";
      map_y = "<?php echo $y ?>";
      zoom_level = 18;
      <?php
    break;

  default:
    ?> zoom_level = 13;<?php
    break;
}


 ?>

var map = L.map( 'map', { center: [map_x, map_y], draggable : true, zoom: zoom_level });

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' }).addTo(map);

function einsaetze(){
  <?php //Einsaetze
  $sql = "SELECT * FROM einsaetze WHERE einsatz_adresse_isset = '1'";
  foreach ($pdo->query($sql) as $row) { ?>
    var x = <?php if($row['einsatz_x'] == 0){echo "-54.459972841198585"; } else{ echo $row['einsatz_x']; } ?>;
    var y =  <?php if($row['einsatz_y'] == 0){ echo "-36.259203186675954"; } else{ echo $row['einsatz_y']; } ?>;
    <?php
    $stich = "";
    $sl = "SELECT * FROM einsatz_stichwort WHERE einsatz_stichwort_id = ".$row['einsatz_stichwort'];
    foreach ($pdo->query($sl) as $key ) { $stich = $key['einsatz_stichwort_title']; } ?>
    var icon_vp = new L.Icon({
         iconUrl: "./geojson/VP1.png", iconSize: [<?php echo $map['vp']['x'] ?>,<?php echo $map['vp']['y'] ?>]});
    var marker = L.marker([x,y], { title: "<?php echo "Einsatz Nr. ".$row['einsatz_id']."-".$stich; ?>",  //opacity: 0.6,
        icon: icon_vp

      }).addTo(map)

       <?php
       $einsatz_id = $row['einsatz_id'];
       $stich  = $row['einsatz_stichwort'];
       $ssl = "SELECT * FROM einsatz_stichwort WHERE einsatz_stichwort_id = $stich";
       $stichwort = "";
       foreach ($pdo->query($ssl) as $cow) {
         $stichwort  = $cow['einsatz_stichwort_title'];
       }
       $inaktiv = "";
       if($row['einsatz_status'] =="i"){
         $inaktiv = "<br />!!! BEENDET !!!<br />";
       }



        ?>

        .bindPopup(" <?php echo $inaktiv."<br />Einsatz ".$row['einsatz_id'].": ".$stichwort."<br />".$inaktiv;

        $sssl = "SELECT * FROM prop_stasse WHERE prop_id = ".$row['einsatz_adresse'];
        echo "<br />";
        foreach ($pdo->query($sssl) as $em) {
          echo $em['prop_title'];
        }

        $sssl = "SELECT * FROM fahrzeuge WHERE fahrzeug_einsatz = ".$einsatz_id;
        echo "<br /><br />";
        foreach ($pdo->query($sssl) as $em) {
          echo "[".$em['fahrzeug_status']."]_".$em['fahrzeug_funkkenner']."_".$em['fahrzeug_aktion']."<br />";
        }

        ?>")
  <?php
  }
  //--------------------------------------------------------------
   ?>
}


 function einsaetze1(){
   <?php //Einsaetze
   $adr = "";
   $sql = "SELECT * FROM einsaetze WHERE einsatz_adresse_isset = '1' ";
   foreach ($pdo->query($sql) as $row) {
     $adr = $row['einsatz_adresse'];
     $ssl = "SELECT * FROM prop_stasse WHERE prop_modell = '1'  AND prop_id = ".$adr;
     foreach ($pdo->query($ssl) as $cow) {
        $path = $cow['prop_modell_link']; ?>

         $.getJSON("<?php echo $path; ?>",function(data){
           var icon_vp = L.icon({iconURL: "geojson/VP1.png",
                 var datalayer = L.geoJson(data , {
                   onEachFeature: function(feature, featureLayer,) {featureLayer.bindPopup( feature.properties.NAME_1); }
         },{icon: icon_vp}).addTo(map);

         newMap.fitBounds(datalayer.getBounds());
         }); <?php

         }
   }
 ?>
 }

function kliniken(){
  <?php
  $sql = "SELECT * FROM prop_kliniken";
  foreach ($pdo->query($sql) as $key) {?>
    var x = "<?php echo $key['prop_x'] ?>";
    var y = "<?php echo $key['prop_y'] ?>";
    var title = "<?php echo "Klinikum: ".$key['prop_title'] ?>";
    var popup = "<?php echo "Klinikum: ".$key['prop_title']."<br />";
                       echo "Fachabteilungen: <br />";
                      if($key['allgemeine_inne'] == 1){ echo "&nbsp &nbsp Allgemeine Innere<br />";}
                      if($key['allgemeine_chirogie'] == 1){ echo "&nbsp &nbsp Allgemeine Chirogie<br />";}
                      if($key['gynaegologie'] == 1){ echo"&nbsp &nbsp Gynäkologie<br />";}
                      if($key['stroke'] == 1){ echo"&nbsp &nbsp Stroke Unit<br />";}
                      if($key['neurologie'] == 1){ echo"&nbsp &nbsp Neurologie<br />";}
                      if($key['karidlogie'] == 1){ echo"&nbsp &nbsp Kardiologie<br />";}
                      if($key['kardiochirogie'] == 1){ echo "&nbsp &nbsp kardiochirogie<br />";}
                      if($key['kreissaal'] == 1){echo"&nbsp &nbsp Kreissal<br />";}    ?>";
    var icon = new L.Icon({iconUrl: "./geojson/kkh.png", iconSize: [<?php echo $map['klinik']['x'] ?>,<?php echo $map['klinik']['y'] ?>]});

    L.marker([x, y], { title: title, icon: icon }).addTo(map).bindPopup(popup)

  <?php }?>

}

function weme_stand(){
  <?php
  $sql = "SELECT * FROM prop_stasse WHERE prop_art = 'POI_WeMe'";
  foreach ($pdo->query($sql) as $key) {?>
    var x = "<?php echo $key['prop_x'] ?>";
    var y = "<?php echo $key['prop_y'] ?>";
    var title = "<?php echo $key['prop_title'] ?>";
    var popup = "<?php echo $key['prop_title']."<br />" ?>";
    var icon = new L.Icon({iconUrl: "./weme.png", iconSize: [<?php echo $map['verkaufsstand']['x'] ?>,<?php echo $map['verkaufsstand']['y'] ?>]});

    L.marker([x, y], { title: title, icon: icon }).addTo(map).bindPopup(popup)

  <?php }?>

}

function prop_o_Doublent(){
  <?php
  //-------------------------Karten Icons OHNE Doublenten------------------------------------

  $sql = "SELECT * FROM prop_karte GROUP BY prop_x, prop_y HAVING COUNT(*) = 1 ";
  foreach ($pdo->query($sql) as $key) {?>
    var x = "<?php echo $key['prop_x']; ?>";
    var y = "<?php echo $key['prop_y']; ?>";
    var art = "<?php echo $key['prop_art']; ?>";
    var title = "<?php echo $key['prop_art']."-".$key['prop_title']; ?>";

    var drk_gw_san = new L.Icon({ iconUrl: "<?php echo "fahrzeuge/".  $icon['drk']['93'] ?>", iconSize: [35,25]});
    var popup_drk_gw_san = "<image src=<?php echo "fahrzeuge/".  $icon['drk']['93'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var drk_ktwb = new L.Icon({ iconUrl: "<?php echo "fahrzeuge/".  $icon['drk']['84'] ?>", iconSize: [35,25]});
    var popup_drk_ktwb = "<image src=<?php echo "fahrzeuge/".  $icon['drk']['84'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";

    var drk_rtw = new L.Icon({ iconUrl: "<?php echo "fahrzeuge/".  $icon['drk']['83'] ?>", iconSize: [35,25]});
    var popup_drk_rtw = "<image src=<?php echo "fahrzeuge/".  $icon['drk']['83'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var drk_kdow = new L.Icon({ iconUrl: "<?php echo "fahrzeuge/".  $icon['drk']['11'] ?>", iconSize: [35,25]});
    var popup_drk_kdow = "<image src=<?php echo "fahrzeuge/".  $icon['drk']['11'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";


    var bhp = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['BHP'] ?>", iconSize: [<?php echo $map['bhp']['x'] ?>,<?php echo $map['bhp']['y'] ?>]});
    var tel = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['TEL'] ?>", iconSize: [<?php echo $map['tel']['x'] ?>,<?php echo $map['tel']['y'] ?>]});
    var eal = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['EAL'] ?>", iconSize: [<?php echo $map['eal']['x'] ?>,<?php echo $map['eal']['y'] ?>]});
    var ueal = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['UEAL'] ?>", iconSize: [<?php echo $map['ueal']['x'] ?>,<?php echo $map['ueal']['y'] ?>]});
    var b1 = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['b1'] ?>", iconSize: [<?php echo $map['b1']['x'] ?>,<?php echo $map['b1']['y'] ?>]});
    var b2 = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['b2'] ?>", iconSize: [<?php echo $map['b2']['x'] ?>,<?php echo $map['b2']['y'] ?>]});
    var b3 = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['b3'] ?>", iconSize: [<?php echo $map['b3']['x'] ?>,<?php echo $map['b3']['y'] ?>]});

    var z1 = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['z1'] ?>", iconSize: [<?php echo $map['z1']['x'] ?>,<?php echo $map['z1']['y'] ?>]});
    var z2 = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['z2'] ?>", iconSize: [<?php echo $map['z2']['x'] ?>,<?php echo $map['z2']['y'] ?>]});
    var z3 = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['z3'] ?>", iconSize: [<?php echo $map['z3']['x'] ?>,<?php echo $map['z3']['y'] ?>]});

    var br = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['br'] ?>", iconSize: [40,30]});
    var br_drk = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['br_drk'] ?>", iconSize: [40,30]});
    var br_juh = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['br_juh'] ?>", iconSize: [40,30]});
    var br_mhd = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['br_mhd'] ?>", iconSize: [40,30]});

    var sb1 = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['sb1'] ?>", iconSize: [40,30]});
    var sb2 = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['sb2'] ?>", iconSize: [40,30]});

    var drk_ee_trupp = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['drk_ee_tr'] ?>", iconSize: [35,25]});
    var drK_ee_gruppe = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['drk_ee_gr'] ?>", iconSize: [35,25]});
    var drk_ee_zug = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['drk_ee_zu'] ?>", iconSize: [35,25]});

    var juh_ee_trupp = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['juh_ee_tr'] ?>", iconSize: [35,25]});
    var juh_ee_gruppe = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['juh_ee_gr'] ?>", iconSize: [35,25]});
    var juh_ee_zug = new L.Icon({ iconUrl: "<?php echo $icon['OPT']['juh_ee_zu'] ?>", iconSize: [35,25]});



    var popup_tel = "<image src=<?php echo $icon['OPT']['TEL'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_bhp = "<image src=<?php echo $icon['OPT']['BHP'] ?> weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_eal = "<image src=<?php echo $icon['OPT']['EAL'] ?> weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_ueal= "<image src=<?php echo $icon['OPT']['UEAL'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_b1 = "<image src=<?php echo $icon['OPT']['b1'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_b2 = "<image src=<?php echo $icon['OPT']['b2'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_b3 = "<image src=<?php echo $icon['OPT']['b3'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_z1 = "<image src=<?php echo $icon['OPT']['z1'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_z2 = "<image src=<?php echo $icon['OPT']['z2'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_z3 = "<image src=<?php echo $icon['OPT']['z3'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_sb1 = "<image src=<?php echo $icon['OPT']['sb1'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_sb2 = "<image src=<?php echo $icon['OPT']['sb2'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_drk_ee_trupp = "<image src=<?php echo $icon['OPT']['drk_ee_tr'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_drk_ee_gruppe = "<image src=<?php echo $icon['OPT']['drk_ee_gr'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_drk_ee_zug = "<image src=<?php echo $icon['OPT']['drk_ee_zu'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_juh_ee_trupp = "<image src=<?php echo $icon['OPT']['juh_ee_tr'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_juh_ee_gruppe = "<image src=<?php echo $icon['OPT']['juh_ee_gr'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_juh_ee_zug = "<image src=<?php echo $icon['OPT']['juh_ee_zu'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";

    var popup_br = "<image src=<?php echo $icon['OPT']['br'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_br_drk = "<image src=<?php echo $icon['OPT']['br_drk'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_br_juh = "<image src=<?php echo $icon['OPT']['br_juh'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
    var popup_br_mhd = "<image src=<?php echo $icon['OPT']['br_mhd'] ?> height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";




    var myicon = "";
    var popup = "";
    if (art == "Bhp") { myicon = bhp; popup = popup_bhp; }
    if (art == "TEL") { myicon = tel; popup = popup_tel; }
    if (art == "EAL") { myicon = eal; popup = popup_eal;}
    if (art == "UEAL") { myicon = ueal; popup = popup_ueal; }
    if (art == "B1") { myicon = b1; popup = popup_b1;}
    if (art == "B2") { myicon = b2; popup = popup_b2;}
    if (art == "B3") { myicon = b3; popup = popup_b3; }

    if (art == "Z1") { myicon = z1; popup = popup_z1; }
    if (art == "Z2") { myicon = z2; popup = popup_z2;  }
    if (art == "Z3") { myicon = z3; popup = popup_z3;  }

    if (art == "br") { myicon = br; popup = popup_br}
    if (art == "br_drk") { myicon = br_drk; popup = popup_br_drk; }
    if (art == "br_juh") { myicon = br_juh; popup = popup_br_juh; }
    if (art == "br_mhd") { myicon = br_mhd; popup = popup_br_mhd; }

    if (art == "SB1") { myicon = sb1; popup = popup_sb1; }
    if (art == "SB2") { myicon = sb2; popup = popup_sb2; }

    if (art == "drk_ee_gruppe") { myicon = drK_ee_gruppe; popup = popup_drk_ee_gruppe; }
    if (art == "drk_ee_trupp") { myicon = drk_ee_trupp; popup = popup_drk_ee_trupp; }
    if (art == "drk_ee_zug") { myicon = drk_zug; popup = popup_drk_ee_zug; }

    if (art == "juh_ee_gruppe") { myicon = juh_ee_gruppe; popup = popup_juh_ee_gruppe; }
    if (art == "juh_ee_trupp") { myicon = juh_ee_trupp; popup_juh_ee_trupp; }
    if (art == "juh_ee_zug") { myicon = juh_ee_zug; popup = popup_juh_ee_zug; }

    if (art == "GW_SAN") { myicon = drk_gw_san; popup = popup_drk_gw_san; }
    if (art == "KTWB") { myicon = drk_ktwb; popup = popup_drk_ktwb }
    if (art == "RTW") { myicon = drk_rtw; popup = popup_drk_rtw }
    if (art == "Kdow") { myicon = drk_kdow; popup = popup_drk_kdow }



    L.marker([x, y], {title: title, icon: myicon }).addTo(map).bindPopup(popup)
    <?php
  }
  ?>
}



//--------------Funktion Aufrufen-----------------------------------------------
var mode = "none";
<?php
$sql = "SELECT * FROM prop_karte";
foreach ($pdo->query($sql) as $mode) {
  if($mode['prop_art'] == "mode"){
    if($mode['prop_title'] == "weme"){
      ?>
      mode = "weme";
      <?php
    }
  }
}

 ?>

if(mode == "weme"){
  var mode = weme_stand();
}

var einsaetze = einsaetze();
var einsaetze1 = einsaetze1();
var klinken = kliniken();
var single = prop_o_Doublent();


<?php
//-------------------------Karten Icons OHNE Doublenten-------------------------
$sql = "SELECT * FROM prop_karte WHERE prop_gruppe_a = 1 ";
foreach ($pdo->query($sql) as $key) {
  ?>

  var group_a = "<?php echo $key['prop_gruppe_a'] ?>";
  var group_nr ="<?php echo $key['prop_gruppe_a_nr'] ?>";
  var group_count = "<?php echo $key['prop_group_count'] ?>";

  if(group_a == "1"){
    var x = "<?php echo $key['prop_x']; ?>";
    var y = "<?php echo $key['prop_y']; ?>";

    var icon_pos = new L.Icon({ iconUrl: "./geojson/pos.png", iconSize: [20,20]});
    L.marker([x, y], {title: "Position", icon: icon_pos }).addTo(map).bindPopup("Standort")

    //einzelne Taktische Zeichen anzeigen
    if (group_count = "2") {
      if (group_nr == "1") {
        var x = "<?php echo $key['prop_x']; ?>"-(-0.0001);
        var y = "<?php echo $key['prop_y']; ?>"-(-0.0005);
        var art = "<?php echo $key['prop_art']; ?>";
        var title = "<?php echo $key['prop_art']."-".$key['prop_title']; ?>";

        var bhp = new L.Icon({ iconUrl: "./geojson/bhp.png", iconSize: [35,35]});
        var tel = new L.Icon({ iconUrl: "./geojson/tel.png", iconSize: [40,30]});
        var eal = new L.Icon({ iconUrl: "./geojson/eal.png", iconSize: [40,30]});
        var ueal = new L.Icon({ iconUrl: "./geojson/ueal.png", iconSize: [40,30]});
        var b1 = new L.Icon({ iconUrl: "./geojson/B1.png", iconSize: [20,30]});
        var b2 = new L.Icon({ iconUrl: "./geojson/B2.png", iconSize: [40,30]});
        var b3 = new L.Icon({ iconUrl: "./geojson/B3.png", iconSize: [40,30]});

        var z1 = new L.Icon({ iconUrl: "./geojson/Z1.png", iconSize: [40,30]});
        var z2 = new L.Icon({ iconUrl: "./geojson/Z2.png", iconSize: [40,30]});
        var z3 = new L.Icon({ iconUrl: "./geojson/Z3.png", iconSize: [40,30]});

        var br = new L.Icon({ iconUrl: "./geojson/br.png", iconSize: [40,30]});
        var br_drk = new L.Icon({ iconUrl: "./geojson/br_drk.png", iconSize: [40,30]});
        var br_juh = new L.Icon({ iconUrl: "./geojson/br_juh.png", iconSize: [40,30]});
        var br_mhd = new L.Icon({ iconUrl: "./geojson/br_mhd.png", iconSize: [40,30]});

        var sb1 = new L.Icon({ iconUrl: "./geojson/SB1.png", iconSize: [40,30]});
        var sb2 = new L.Icon({ iconUrl: "./geojson/SB2.png", iconSize: [40,30]});

        var drk_ee_trupp = new L.Icon({ iconUrl: "./geojson/drk_ee_trupp.png", iconSize: [70,50]});
        var drK_ee_gruppe = new L.Icon({ iconUrl: "./geojson/drK_ee_gruppe.png", iconSize: [70,50]});
        var drk_ee_zug = new L.Icon({ iconUrl: "./geojson/drk_ee_zug.png", iconSize: [70,50]});

        var juh_ee_trupp = new L.Icon({ iconUrl: "./geojson/juh_ee_trupp.png", iconSize: [70,50]});
        var juh_ee_gruppe = new L.Icon({ iconUrl: "./geojson/juh_ee_gruppe.png", iconSize: [70,50]});
        var juh_ee_zug = new L.Icon({ iconUrl: "./geojson/juh_ee_zug.png", iconSize: [70,50]});



        var popup_tel = "<image src=\"geojson/tel.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_bhp = "<image src=\"geojson/bhp.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_eal = "<image src=\"geojson/eal.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_ueal = "<image src=\"geojson/ueal.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_b1 = "<image src=\"geojson/B1.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_b2 = "<image src=\"geojson/B2.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_b3 = "<image src=\"geojson/B3.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_z1 = "<image src=\"geojson/Z1.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_z2 = "<image src=\"geojson/Z2.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_z3 = "<image src=\"geojson/Z3.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_sb1 = "<image src=\"geojson/SB1.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_sb2 = "<image src=\"geojson/SB2.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_drk_ee_trupp = "<image src=\"geojson/drk_ee_trupp.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_drk_ee_gruppe = "<image src=\"geojson/drK_ee_gruppe.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_drk_ee_zug = "<image src=\"geojson/drk_ee_zug.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_juh_ee_trupp = "<image src=\"geojson/juh_ee_trupp.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_juh_ee_gruppe = "<image src=\"geojson/juh_ee_gruppe.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_juh_ee_zug = "<image src=\"geojson/juh_ee_zug.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";

        var popup_br = "<image src=\"geojson/br.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_br_drk = "<image src=\"geojson/br_drk.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_br_juh = "<image src=\"geojson/br_juh.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";
        var popup_br_mhd = "<image src=\"geojson/br_mhd.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";


        var myicon = "";
        var popup = "";
        if (art == "Bhp") { myicon = bhp; popup = popup_bhp; }
        if (art == "TEL") { myicon = tel; popup = popup_tel; }
        if (art == "EAL") { myicon = eal; popup = popup_eal;}
        if (art == "UEAL") { myicon = ueal; popup = popup_ueal; }
        if (art == "B1") { myicon = b1; popup = popup_b1;}
        if (art == "B2") { myicon = b2; popup = popup_b2;}
        if (art == "B3") { myicon = b3; popup = popup_b3; }

        if (art == "Z1") { myicon = z1; popup = popup_z1; }
        if (art == "Z2") { myicon = z2; popup = popup_z2;  }
        if (art == "Z3") { myicon = z3; popup = popup_z3;  }

        if (art == "br") { myicon = br; popup = popup_br}
        if (art == "br_drk") { myicon = br_drk; popup = popup_br_drk; }
        if (art == "br_juh") { myicon = br_juh; popup = popup_br_juh; }
        if (art == "br_mhd") { myicon = br_mhd; popup = popup_br_mhd; }

        if (art == "SB1") { myicon = sb1; popup = popup_sb1; }
        if (art == "SB2") { myicon = sb2; popup = popup_sb2; }

        if (art == "drk_ee_gruppe") { myicon = drk_ee_gruppe; popup = popup_drk_ee_gruppe; }
        if (art == "drk_ee_trupp") { myicon = drk_ee_trupp; popup = popup_drk_ee_trupp; }
        if (art == "drk_ee_zug") { myicon = drk_zug; popup = popup_drk_ee_zug; }

        if (art == "juh_ee_gruppe") { myicon = juh_ee_gruppe; popup = popup_juh_ee_gruppe; }
        if (art == "juh_ee_trupp") { myicon = juh_ee_trupp; popup_juh_ee_trupp; }
        if (art == "juh_ee_zug") { myicon = juh_ee_zug; popup = popup_juh_ee_zug; }


        L.marker([x, y], {title: title, icon: myicon }).addTo(map).bindPopup(popup)

      }
      if (group_nr == "2") {
        var x = "<?php echo $key['prop_x']; ?>"-0.0001;
        var y = "<?php echo $key['prop_y']; ?>"-(-0.0005);
        var art = "<?php echo $key['prop_art']; ?>";
        var title = "<?php echo $key['prop_art']."-".$key['prop_title']; ?>";

        var bhp = new L.Icon({ iconUrl: "./geojson/bhp.png", iconSize: [35,35]});
        var tel = new L.Icon({ iconUrl: "./geojson/tel.png", iconSize: [40,30]});
        var eal = new L.Icon({ iconUrl: "./geojson/eal.png", iconSize: [50,40]});


        var popup = "<image src=\"geojson/tel.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";

        var myicon = "";
        if (art == "Bhp") { myicon = bhp; }
        if (art == "TEL") { myicon = tel; }
        if (art == "EAL") { myicon = eal; }

        L.marker([x, y], {title: title, icon: myicon }).addTo(map).bindPopup(popup)

      }
      }

      if(group_count == "3"){
       if (group_nr == "1") {
        var x = "<?php echo $key['prop_x']; ?>"-(-0.0001);
        var y = "<?php echo $key['prop_y']; ?>"-(-0.0005);
        var art = "<?php echo $key['prop_art']; ?>";
        var title = "<?php echo $key['prop_art']."-".$key['prop_title']; ?>";

        var bhp = new L.Icon({ iconUrl: "./geojson/bhp.png", iconSize: [35,35]});
        var tel = new L.Icon({ iconUrl: "./geojson/tel.png", iconSize: [40,30]});
        var eal = new L.Icon({ iconUrl: "./geojson/eal.png", iconSize: [50,40]});


        var popup = "<image src=\"geojson/tel.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";

        var myicon = "";
        if (art == "Bhp") { myicon = bhp; }
        if (art == "TEL") { myicon = tel; }
        if (art == "EAL") { myicon = eal; }

        L.marker([x, y], {title: title, icon: myicon }).addTo(map).bindPopup(popup)


      }
      if (group_nr == "2") {
        var x = "<?php echo $key['prop_x']; ?>"-0.0001;
        var y = "<?php echo $key['prop_y']; ?>"-(-0.0005);
        var art = "<?php echo $key['prop_art']; ?>";
        var title = "<?php echo $key['prop_art']."-".$key['prop_title']; ?>";

        var bhp = new L.Icon({ iconUrl: "./geojson/bhp.png", iconSize: [35,35]});
        var tel = new L.Icon({ iconUrl: "./geojson/tel.png", iconSize: [40,30]});
        var eal = new L.Icon({ iconUrl: "./geojson/eal.png", iconSize: [50,40]});


        var popup = "<image src=\"geojson/tel.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";

        var myicon = "";
        if (art == "Bhp") { myicon = bhp; }
        if (art == "TEL") { myicon = tel; }
        if (art == "EAL") { myicon = eal; }

        L.marker([x, y], {title: title, icon: myicon }).addTo(map).bindPopup(popup)

      }
       if (group_nr == "2") {
        var x = "<?php echo $key['prop_x']; ?>"-0.0001;
        var y = "<?php echo $key['prop_y']; ?>"-(-0.0005);
        var art = "<?php echo $key['prop_art']; ?>";
        var title = "<?php echo $key['prop_art']."-".$key['prop_title']; ?>";

        var bhp = new L.Icon({ iconUrl: "./geojson/bhp.png", iconSize: [35,35]});
        var tel = new L.Icon({ iconUrl: "./geojson/tel.png", iconSize: [40,30]});
        var eal = new L.Icon({ iconUrl: "./geojson/eal.png", iconSize: [50,40]});


        var popup = "<image src=\"geojson/tel.png\" height=\"150px\" weight=\"100px\"><br /><?php echo $key['prop_art']."-".$key['prop_title'] ?>";

        var myicon = "";
        if (art == "Bhp") { myicon = bhp; }
        if (art == "TEL") { myicon = tel; }
        if (art == "EAL") { myicon = eal; }

        L.marker([x, y], {title: title, icon: myicon }).addTo(map).bindPopup(popup)

      }
      }

      //Verbindungslinien
      if (group_count = "2") {

        var end_x = "";
        var end_y = "";
        if (group_nr == "1") { var end_x = "<?php echo $key['prop_x']; ?>"-(-0.0001); var eny_y = "<?php echo $key['prop_y']; ?>"-(-0.0005); }
        if (group_nr == "2") { var end_x = "<?php echo $key['prop_x']; ?>"-0.0001; var end_y = "<?php echo $key['prop_y']; ?>"-(-0.0005); }

        var poses = [["<?php echo $key['prop_x']; ?>", "<?php echo $key['prop_y']; ?>"],
                     [end_x, end_y]];
        //var polyline = L.polyline(poses, { color: 'black'}).addTo(map);

      }
  } <?php
}
?>
</script>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
<input type="text" placeholder="//Konsole&nbsp(//help)" name="console" title="Kommandozeile" style="width: 100%; fonz-size: 40; height: 75px; margin-bottom: 0px; bottom: 0px;" />
</form>




 </body>


</html>
