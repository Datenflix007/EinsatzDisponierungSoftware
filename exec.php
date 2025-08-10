<!DOCTYPE html><html><head><title>Einsatzleitung</title>
  <link rel="stylesheet" href="data/styles/exec.css">
<link rel="icon" href="data/einsaetze/styles/sonder.png">

  <title>Einsatzleitung</title>
</head>
<body scrolling="yes">


  <?php

  include('data/ini.php');
  if(isset($_POST['f_login_go'])){

    $usernr = fopen('data/user/admin/current.txt','w');
    fwrite($usernr,$_POST['f_login_id']);
    fclose($usernr);
  }
     ?>
     <div style="transition: 0.1s; position: fixed; margin-top: 80px; border-right-color: black; border-width: medium;text-align: center; font-size: 40; width: 100px;margin-left: 1645px;z-index: 4; background-color: #F36521; height: 100%;">
       <span><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />C<br /><br />H<br /><br />A<br /><br />T</span>
     </div>
     <?php if(!isset($_POST['chat'])){
       ?>

     <div class="chat" style="transition: 0.1s; position: fixed; margin-top: 80px; border-right-color: black; border-width: medium;text-align: center; font-size: 40; width: 50px;margin-left: 1600px;z-index: 3; background-color: #F36521; height: 90%;">
       <span style="float: left;"><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><button type="submit" name="chat"style="height: 870px; width: 30px;background-color: #A4A4A4; color: white;"><<<br /><<</button></form></span>

     </div>
     <div class="leftbar" style="height: 100%;">

     <?php
   }
   if(isset($_POST['chat'])){
     ?>
     <div class="" style="position: fixed; margin-top: 80px; border-right-color: black; border-width: medium;text-align: center; font-size: 40; margin-left: 1100px;z-index: 3; background-color: #F36521; width: 600px; height: 90%;">
       <span style="float: left;"><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><button type="submit" name=""style="height: 870px; width: 30px; background-color: #A4A4A4; color: white;">>><br />>></button></form></span>
      <span ><iframe src="data/chat.php" width="500" height="700"></span>

      </div>
      <div class="leftbar2" style="height: 100%;">
     <?php
   }

   ?>


    <iframe src="data/getstatus.php" width="120" height="100%"></iframe>
     </div>



  <div class="body-background">



  <div class="bodylul">
    <iframe src="data\fahrzeuge\fahrzeuge.php"            width="500" height="700"></iframe>
    <iframe src="data\einsaetze\einsaetze.php"            width="500" height="700"></iframe>
    <iframe src="data\einsatztagebuch\read.php" width="500" height="700"></iframe>
    <iframe width="100%" height="530px" src="data/karte.php" allowfullscreen="yes "></iframe>
    <details  style="background-color: #FF8000; font-size: 30, color: white;" open>
      <summary><center><span style="font-size: 40px; text-align: center; color: white;" >
        <table style="width: 100%">
          <tr >
            <td style="text-align: center;">Karten-Steuerung</td>
          </tr>
        </table>

        </span></center></summary>
      <iframe src="data/map_control.php" width="100%" height="400px;"></iframe>
    </details>
    <details open style="background-color: #FF8000; font-size: 30, color: white; margin-top: 10px; ">
      <summary>Daten-Karten</summary>
      <iframe width="100%" height="800px" frameborder="0" allowfullscreen="yes" src="http://umap.openstreetmap.de/de/map/dgn_8265?scaleControl=true&miniMap=true&scrollWheelZoom=true&zoomControl=true&allowEdit=false&moreControl=true&searchControl=true&tilelayersControl=null&embedControl=null&datalayersControl=expanded&onLoadPanel=databrowser&captionBar=false&datalayers=43434%2C43438%2C43441%2C43443#11/51.1759/12.1548"></iframe>
      <!--<p><a href="//umap.openstreetmap.de/de/map/dgn_8265">Vollbildanzeige</a></p>-->
    </details>




</div>
<?php

?>
<div class="maske_static">
  <div class="headbar" style="float: none;" >




    <span style="font-size: 65px;">

     &nbsp
      <span style="font-size: 75px;">E</span>insatz <span style="font-size: 75px;">D</span>isponierungs <span style="font-size: 75px;"  >S</span>oftware</span>
    <span>professionell

      <span style="margin-left: 10px; float: right; display: inline-block;">
        <iframe src="data/headbar.php" width="450" height="50"></iframe>

        <span style="display: inline;">
        <form action="home.php" method="post"><input type="submit" value="LOGOUT" style="float: left;" /></form>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input style="float: left; margin-left: 275px; width: 70px; text-align: center;" name="settings" type="submit" value="Settings" /></form>
        </span></span>
    </span>


  </div>

</div>

</div>
<?php
if(isset($_POST['settings'])){ ?>
  <center><div class="Settings" >

  <h1>Settings</h1>

  <form class="" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="hidden" name="settings" value="">
    <details open style="background-color: #DF7401;">
      <summary>OPT_Karte - Startposition</summary>
      <table>

  <?php
  $nmb_x = "51.15296005349677"; $nmb_y = "11.808929983372591";
  $wsf_x = "51.201689978737704"; $wsf_y = "11.966292391454074";
  $ztz_x = "51.047668566802116"; $ztz_y = "12.138046415045652";

  if(isset($_POST['f_set_safe'])){
    $settings = fopen('data/mods/settings.ini', 'w');
    fwrite($settings, '[vanilla Werte]'.PHP_EOL);
    #fwrite($settings, 'map[x] = "51.1520144166648"');
    #fwrite($settings, 'map[y] = "11.794654823455096"');
    fwrite($settings, '[map_start_position]'.PHP_EOL);

    if(isset($_POST['f_set_start'])){
      if($_POST['f_set_start'] == "nmb"){
        fwrite($settings, 'map[x] = '.$nmb_x.PHP_EOL);
        fwrite($settings, 'map[y] = '.$nmb_y.PHP_EOL);
      }
      if($_POST['f_set_start'] == "wsf"){
        fwrite($settings, 'map[x] = '.$wsf_x.PHP_EOL);
        fwrite($settings, 'map[y] = '.$wsf_y.PHP_EOL);
      }
      if($_POST['f_set_start'] == "ztz"){
        fwrite($settings, 'map[x] = '.$ztz_x.PHP_EOL);
        fwrite($settings, 'map[y] = '.$ztz_y.PHP_EOL);
      }
    }
    else {
      fwrite($settings, 'map[x] = '.$_POST['f_map_x'].PHP_EOL);
      fwrite($settings, 'map[y] = '.$_POST['f_map_y'].PHP_EOL);
    }


    fwrite($settings, '; wenn karte[default] den Wert 0 annimmnt-> map[manuell] nutzen'.PHP_EOL);
    fwrite($settings, 'map[default] = 1'.PHP_EOL);
    fwrite($settings, '[icon_size]'.PHP_EOL);
    if($_POST['f_set_vp_x'] == ""){ fwrite($settings, 'vp[x] = '.$_POST['f_vp_x'].PHP_EOL); }
    if($_POST['f_set_vp_x'] != ""){ fwrite($settings, 'vp[x] = '.$_POST['f_set_vp_x'].PHP_EOL); }
    if($_POST['f_set_vp_y'] == ""){ fwrite($settings, 'vp[y] = '.$_POST['f_vp_y'].PHP_EOL); }
    if($_POST['f_set_vp_y'] != ""){ fwrite($settings, 'vp[y] = '.$_POST['f_set_vp_y'].PHP_EOL); }
    if($_POST['f_set_klinik_x'] == ""){ fwrite($settings, 'klinik[x] = '.$_POST['f_klinik_x'].PHP_EOL); }
    if($_POST['f_set_klinik_x'] != ""){ fwrite($settings, 'klinik[x] = '.$_POST['f_set_klinik_x'].PHP_EOL); }
    if($_POST['f_set_klinik_y'] == ""){ fwrite($settings, 'klinik[y] = '.$_POST['f_klinik_y'].PHP_EOL); }
    if($_POST['f_set_klinik_y'] != ""){ fwrite($settings, 'klinik[y] = '.$_POST['f_set_klinik_y'].PHP_EOL); }
    if($_POST['f_set_verkauf_x'] == ""){ fwrite($settings, 'verkaufsstand[x] = '.$_POST['f_verkauf_x'].PHP_EOL); }
    if($_POST['f_set_verkauf_x'] != ""){ fwrite($settings, 'verkaufsstand[x] = '.$_POST['f_set_verkauf_x'].PHP_EOL); }
    if($_POST['f_set_verkauf_y'] == ""){ fwrite($settings, 'verkaufsstand[y] = '.$_POST['f_verkauf_y'].PHP_EOL); }
    if($_POST['f_set_verkauf_y'] != ""){ fwrite($settings, 'verkaufsstand[y] = '.$_POST['f_set_verkauf_y'].PHP_EOL); }
    if($_POST['f_set_bhp_x'] == ""){ fwrite($settings, 'bhp[x] = '.$_POST['f_bhp_x'].PHP_EOL); }
    if($_POST['f_set_bhp_x'] != ""){ fwrite($settings, 'bhp[x] = '.$_POST['f_set_bhp_x'].PHP_EOL); }
    if($_POST['f_set_bhp_y'] == ""){ fwrite($settings, 'bhp[y] = '.$_POST['f_bhp_y'].PHP_EOL); }
    if($_POST['f_set_bhp_y'] != ""){ fwrite($settings, 'bhp[y] = '.$_POST['f_set_bhp_y'].PHP_EOL); }
    if($_POST['f_set_tel_x'] == ""){ fwrite($settings, 'tel[x] = '.$_POST['f_tel_x'].PHP_EOL); }
    if($_POST['f_set_tel_x'] != ""){ fwrite($settings, 'tel[x] = '.$_POST['f_set_bhp_y'].PHP_EOL); }
    if($_POST['f_set_tel_y'] == ""){ fwrite($settings, 'tel[y] = '.$_POST['f_bhp_y'].PHP_EOL); }
    if($_POST['f_set_tel_y'] != ""){ fwrite($settings, 'tel[y] = '.$_POST['f_set_bhp_y'].PHP_EOL); }
    if($_POST['f_set_eal_x'] == ""){ fwrite($settings, 'eal[x] = '.$_POST['f_eal_x'].PHP_EOL); }
    if($_POST['f_set_eal_x'] != ""){ fwrite($settings, 'eal[x] = '.$_POST['f_set_eal_y'].PHP_EOL); }
    if($_POST['f_set_eal_y'] == ""){ fwrite($settings, 'eal[y] = '.$_POST['f_eal_x'].PHP_EOL); }
    if($_POST['f_set_eal_y'] != ""){ fwrite($settings, 'eal[y] = '.$_POST['f_set_eal_y'].PHP_EOL); }
    if($_POST['f_set_ueal_x'] == ""){ fwrite($settings, 'ueal[x] = '.$_POST['f_ueal_x'].PHP_EOL); }
    if($_POST['f_set_ueal_x'] != ""){ fwrite($settings, 'ueal[x] = '.$_POST['f_set_ueal_y'].PHP_EOL); }
    if($_POST['f_set_ueal_y'] == ""){ fwrite($settings, 'ueal[y] = '.$_POST['f_ueal_x'].PHP_EOL); }
    if($_POST['f_set_ueal_y'] != ""){ fwrite($settings, 'ueal[y ] = '.$_POST['f_set_ueal_y'].PHP_EOL); }

    if($_POST['f_set_b1_x'] != ""){ fwrite($settings, 'b1[x] = '.$_POST['f_set_b1_x'].PHP_EOL); }
    if($_POST['f_set_b1_x'] == ""){ fwrite($settings, 'b1[x] = '.$_POST['f_b1_x'].PHP_EOL); }
    if($_POST['f_set_b2_x'] != ""){ fwrite($settings, 'b2[x] = '.$_POST['f_set_b2_x'].PHP_EOL); }
    if($_POST['f_set_b2_x'] == ""){ fwrite($settings, 'b2[x] = '.$_POST['f_b2_x'].PHP_EOL); }
    if($_POST['f_set_b3_x'] != ""){ fwrite($settings, 'b3[x] = '.$_POST['f_set_b3_x'].PHP_EOL); }
    if($_POST['f_set_b3_x'] == ""){ fwrite($settings, 'b3[x] = '.$_POST['f_b3_x'].PHP_EOL); }
    if($_POST['f_set_b1_y'] != ""){ fwrite($settings, 'b1[y] = '.$_POST['f_set_b1_y'].PHP_EOL); }
    if($_POST['f_set_b1_y'] == ""){ fwrite($settings, 'b1[y] = '.$_POST['f_b1_y'].PHP_EOL); }
    if($_POST['f_set_b2_y'] != ""){ fwrite($settings, 'b2[y] = '.$_POST['f_set_b2_y'].PHP_EOL); }
    if($_POST['f_set_b2_y'] == ""){ fwrite($settings, 'b2[y] = '.$_POST['f_b2_y'].PHP_EOL); }
    if($_POST['f_set_b3_x'] != ""){ fwrite($settings, 'b3[x] = '.$_POST['f_set_b3_x'].PHP_EOL); }
    if($_POST['f_set_b3_x'] == ""){ fwrite($settings, 'b3[x] = '.$_POST['f_b3_x'].PHP_EOL); }
    if($_POST['f_set_b3_y'] != ""){ fwrite($settings, 'b3[y] = '.$_POST['f_set_b3_y'].PHP_EOL); }
    if($_POST['f_set_b3_y'] == ""){ fwrite($settings, 'b3[y] = '.$_POST['f_b3_y'].PHP_EOL); }

    if($_POST['f_set_z1_x'] != ""){ fwrite($settings, 'z1[x] = '.$_POST['f_set_z1_x'].PHP_EOL); }
    if($_POST['f_set_z1_x'] == ""){ fwrite($settings, 'z1[x] = '.$_POST['f_z1_x'].PHP_EOL); }
    if($_POST['f_set_z2_x'] != ""){ fwrite($settings, 'z2[x] = '.$_POST['f_set_z2_x'].PHP_EOL); }
    if($_POST['f_set_z2_x'] == ""){ fwrite($settings, 'z2[x] = '.$_POST['f_z2_x'].PHP_EOL); }
    if($_POST['f_set_z3_x'] != ""){ fwrite($settings, 'z3[x] = '.$_POST['f_set_z3_x'].PHP_EOL); }
    if($_POST['f_set_z3_x'] == ""){ fwrite($settings, 'z3[x] = '.$_POST['f_z3_x'].PHP_EOL); }
    if($_POST['f_set_z1_y'] != ""){ fwrite($settings, 'z1[y] = '.$_POST['f_set_z1_y'].PHP_EOL); }
    if($_POST['f_set_z1_y'] == ""){ fwrite($settings, 'z1[y] = '.$_POST['f_z1_y'].PHP_EOL); }
    if($_POST['f_set_z2_y'] != ""){ fwrite($settings, 'z2[y] = '.$_POST['f_set_z2_y'].PHP_EOL); }
    if($_POST['f_set_z2_y'] == ""){ fwrite($settings, 'z2[y] = '.$_POST['f_z2_y'].PHP_EOL); }
    if($_POST['f_set_z3_y'] != ""){ fwrite($settings, 'z3[y] = '.$_POST['f_set_z3_y'].PHP_EOL); }
    if($_POST['f_set_z3_y'] == ""){ fwrite($settings, 'z3[y] = '.$_POST['f_z3_y'].PHP_EOL); }

    if($_POST['f_set_br_x'] != ""){ fwrite($settings, 'br[x] = '.$_POST['f_set_br_x'].PHP_EOL); }
    if($_POST['f_set_br_x'] == ""){ fwrite($settings, 'br[x] = '.$_POST['f_br_x'].PHP_EOL); }
    if($_POST['f_set_br_y'] != ""){ fwrite($settings, 'br[y] = '.$_POST['f_set_br_y'].PHP_EOL); }
    if($_POST['f_set_br_y'] == ""){ fwrite($settings, 'br[y] = '.$_POST['f_br_y'].PHP_EOL); }
    if($_POST['f_set_br_drk_x'] != ""){ fwrite($settings, 'br_drk[x] = '.$_POST['f_set_br_drk_x'].PHP_EOL); }
    if($_POST['f_set_br_drk_x'] == ""){ fwrite($settings, 'br_drk[x] = '.$_POST['f_br_drk_x'].PHP_EOL); }
    if($_POST['f_set_br_juh_x'] != ""){ fwrite($settings, 'br_juh[x] = '.$_POST['f_set_br_juh_x'].PHP_EOL); }
    if($_POST['f_set_br_juh_x'] == ""){ fwrite($settings, 'br_juh[x] = '.$_POST['f_br_juh_x'].PHP_EOL); }
    if($_POST['f_set_br_mhd_x'] != ""){ fwrite($settings, 'br_mhd[x] = '.$_POST['f_set_br_mhd_x'].PHP_EOL); }
    if($_POST['f_set_br_mhd_x'] == ""){ fwrite($settings, 'br_mhd[x] = '.$_POST['f_br_mhd_x'].PHP_EOL); }
    if($_POST['f_set_br_drk_y'] != ""){ fwrite($settings, 'br_drk[y] = '.$_POST['f_set_br_drk_y'].PHP_EOL); }
    if($_POST['f_set_br_drk_y'] == ""){ fwrite($settings, 'br_drk[y] = '.$_POST['f_br_drk_y'].PHP_EOL); }
    if($_POST['f_set_br_juh_y'] != ""){ fwrite($settings, 'br_juh[y] = '.$_POST['f_set_br_juh_y'].PHP_EOL); }
    if($_POST['f_set_br_juh_y'] == ""){ fwrite($settings, 'br_juh[y] = '.$_POST['f_br_juh_y'].PHP_EOL); }
    if($_POST['f_set_br_mhd_y'] != ""){ fwrite($settings, 'br_mhd[y] = '.$_POST['f_set_br_mhd_y'].PHP_EOL); }
    if($_POST['f_set_br_mhd_y'] == ""){ fwrite($settings, 'br_mhd[y] = '.$_POST['f_br_mhd_y'].PHP_EOL); }

    #fwrite($settings, 'sb1[x] = '.$_POST['f_sb1_x']);
    #fwrite($settings, 'sb1[y] = '.$_POST['f_sb1_y']);

    if($_POST['f_set_drk_tr_x'] != ""){ fwrite($settings, 'drk_ee_tr[x] = '.$_POST['f_set_drk_tr_x'].PHP_EOL); }
    if($_POST['f_set_drk_tr_x'] == ""){ fwrite($settings, 'drk_ee_tr[x] = '.$_POST['f_tr_drk_x'].PHP_EOL); }
    if($_POST['f_set_drk_tr_y'] != ""){ fwrite($settings, 'drk_ee_tr[y] = '.$_POST['f_set_drk_tr_y'].PHP_EOL); }
    if($_POST['f_set_drk_tr_y'] == ""){ fwrite($settings, 'drk_ee_tr[y] = '.$_POST['f_tr_drk_y'].PHP_EOL); }
    if($_POST['f_set_drk_gr_x'] != ""){ fwrite($settings, 'drk_ee_gr[x] = '.$_POST['f_set_gr_drk_x'].PHP_EOL); }
    if($_POST['f_set_drk_gr_x'] == ""){ fwrite($settings, 'drk_ee_gr[x] = '.$_POST['f_gr_drk_x'].PHP_EOL); }
    if($_POST['f_set_drk_gr_y'] != ""){ fwrite($settings, 'drk_ee_gr[y] = '.$_POST['f_set_gr_drk_y'].PHP_EOL); }
    if($_POST['f_set_drk_gr_y'] == ""){ fwrite($settings, 'drk_ee_gr[y] = '.$_POST['f_gr_juh_y'].PHP_EOL); }
    if($_POST['f_set_drk_zu_x'] != ""){ fwrite($settings, 'drk_ee_zu[x] = '.$_POST['f_set_zu_mhd_x'].PHP_EOL); }
    if($_POST['f_set_drk_zu_x'] == ""){ fwrite($settings, 'drk_ee_zu[x] = '.$_POST['f_zu_drk_x'].PHP_EOL); }
    if($_POST['f_set_drk_zu_y'] != ""){ fwrite($settings, 'drk_ee_zu[y] = '.$_POST['f_set_zu_drk_y'].PHP_EOL); }
    if($_POST['f_set_drk_zu_y'] == ""){ fwrite($settings, 'drk_ee_zu[y] = '.$_POST['f_zu_drk_y'].PHP_EOL); }

    if($_POST['f_set_juh_tr_x'] != ""){ fwrite($settings, 'juh_ee_tr[x] = '.$_POST['f_set_juh_tr_x'].PHP_EOL); }
    if($_POST['f_set_juh_tr_x'] == ""){ fwrite($settings, 'juh_ee_tr[x] = '.$_POST['f_tr_juh_x'].PHP_EOL); }
    if($_POST['f_set_juh_tr_y'] != ""){ fwrite($settings, 'juh_ee_tr[y] = '.$_POST['f_set_juh_tr_y'].PHP_EOL); }
    if($_POST['f_set_juh_tr_y'] == ""){ fwrite($settings, 'juh_ee_tr[y] = '.$_POST['f_tr_juh_y'].PHP_EOL); }
    if($_POST['f_set_juh_gr_x'] != ""){ fwrite($settings, 'juh_ee_gr[x] = '.$_POST['f_set_gr_juh_x'].PHP_EOL); }
    if($_POST['f_set_juh_gr_x'] == ""){ fwrite($settings, 'juh_ee_gr[x] = '.$_POST['f_gr_juh_x'].PHP_EOL); }
    if($_POST['f_set_juh_gr_y'] != ""){ fwrite($settings, 'juh_ee_gr[y] = '.$_POST['f_set_gr_juh_y'].PHP_EOL); }
    if($_POST['f_set_juh_gr_y'] == ""){ fwrite($settings, 'juh_ee_gr[y] = '.$_POST['f_gr_juh_y'].PHP_EOL); }
    if($_POST['f_set_juh_zu_x'] != ""){ fwrite($settings, 'juh_ee_zu[x] = '.$_POST['f_set_zu_juh_x'].PHP_EOL); }
    if($_POST['f_set_juh_zu_x'] == ""){ fwrite($settings, 'juh_ee_zu[x] = '.$_POST['f_zu_juh_x'].PHP_EOL); }
    if($_POST['f_set_juh_zu_y'] != ""){ fwrite($settings, 'juh_ee_zu[y] = '.$_POST['f_set_zu_juh_y'].PHP_EOL); }
    if($_POST['f_set_juh_zu_y'] == ""){ fwrite($settings, 'juh_ee_zu[y] = '.$_POST['f_zu_juh_y'].PHP_EOL); }


    fclose($settings);
  }

  $cfg = parse_ini_file("data/settings.ini");
  $set['mapx'] = $cfg['map']['x'];
  $set['mapy'] = $cfg['map']['y'];

  #var_dump( $cfg);
  $map_x = $cfg['map']['x'];       $map_y = $cfg['map']['y'];
  $map_mx = $cfg['map']['mx'];     $map_my = $cfg['map']['my'];
  $vp_x = $cfg['vp']['x'];         $vp_y = $cfg['vp']['y'];
  $klinik_x = $cfg['klinik']['x']; $klinik_y = $cfg['klinik']['y'];
  $verkaufsstand_x = $cfg['verkaufsstand']['x']; $verkaufsstand_y = $cfg['verkaufsstand']['y'];
  $bhp_x = $cfg['bhp']['x'];       $bhp_y = $cfg['bhp']['y'];
  $tel_x = $cfg['tel']['x'];       $tel_y = $cfg['tel']['y'];
  $eal_x = $cfg['eal']['x'];       $eal_y = $cfg['eal']['y'];
  $ueal_x = $cfg['ueal']['x'];     $ueal_y = $cfg['ueal']['y'];
  #$sb1_x = $cfg['sb1']['x'];         $sb1_y = $cfg['sb1']['y'];

  $b1_x = $cfg['b1']['x'];         $b1_y = $cfg['b1']['y'];
  $b2_x = $cfg['b2']['x'];         $b2_y = $cfg['b2']['y'];
  $b3_x = $cfg['b3']['x'];         $b3_y = $cfg['b3']['y'];

  $z1_x = $cfg['z1']['x'];         $z1_y = $cfg['z1']['y'];
  $z2_x = $cfg['z2']['x'];         $z2_y = $cfg['z2']['y'];
  $z3_x = $cfg['z3']['x'];         $z3_y = $cfg['z3']['y'];

  $br_x = $cfg['br']['x'];         $br_y = $cfg['br']['y'];
  $br_drk_x = $cfg['br_drk']['x']; $br_drk_y = $cfg['br_drk']['y'];
  $br_juh_x = $cfg['br_juh']['x']; $br_juh_y = $cfg['br_juh']['y'];
  $br_mhd_x = $cfg['br_mhd']['x']; $br_mhd_y = $cfg['br_mhd']['y'];

  $tr_drk_x = $cfg['drk_ee_tr']['x']; $tr_drk_y = $cfg['drk_ee_tr']['y'];
  $gr_drk_x = $cfg['drk_ee_gr']['x']; $gr_drk_y = $cfg['drk_ee_gr']['y'];
  $zu_drk_x = $cfg['drk_ee_zu']['x']; $zu_drk_y = $cfg['drk_ee_zu']['y'];

  $tr_juh_x = $cfg['juh_ee_tr']['x']; $tr_juh_y = $cfg['juh_ee_tr']['y'];
  $gr_juh_x = $cfg['juh_ee_gr']['x']; $gr_juh_y = $cfg['juh_ee_gr']['y'];
  $zu_juh_x = $cfg['juh_ee_zu']['x']; $zu_juh_y = $cfg['juh_ee_zu']['y'];
    ?>

    <input type="hidden" name="f_map_x" value="<?php echo $map_x ?>">
    <input type="hidden" name="f_map_y" value="<?php echo $map_y ?>">
    <input type="hidden" name="f_map_mx" value="<?php echo $map_mx ?>">
    <input type="hidden" name="f_map_my" value="<?php echo $map_my ?>">

    <input type="hidden" name="f_vp_x" value="<?php echo $vp_x ?>">
    <input type="hidden" name="f_klinik_x" value="<?php echo $klinik_x ?>">
    <input type="hidden" name="f_vp_y" value="<?php echo $vp_y ?>">
    <input type="hidden" name="f_klinik_y" value="<?php echo $klinik_y ?>">

    <input type="hidden" name="f_verkauf_x" value="<?php echo $verkaufsstand_x ?>">
    <input type="hidden" name="f_verkauf_y" value="<?php echo $verkaufsstand_y ?>">
    <input type="hidden" name="f_bhp_x" value="<?php echo $bhp_x ?>">
    <input type="hidden" name="f_bhp_y" value="<?php echo $bhp_y ?>">

    <input type="hidden" name="f_tel_x" value="<?php echo $tel_x ?>">
    <input type="hidden" name="f_tel_y" value="<?php echo $tel_y ?>">
    <input type="hidden" name="f_eal_x" value="<?php echo $eal_x ?>">
    <input type="hidden" name="f_eal_y" value="<?php echo $eal_y ?>">
    <input type="hidden" name="f_ueal_x" value="<?php echo $ueal_x ?>">
    <input type="hidden" name="f_ueal_y" value="<?php echo $ueal_y ?>">
    <input type="hidden" name="f_sb1_x" value="<?php echo $sb1_x ?>">
    <input type="hidden" name="f_sb1_y" value="<?php echo $sb1_y ?>">

    <input type="hidden" name="f_b1_x" value="<?php echo $b1_x ?>">
    <input type="hidden" name="f_b1_y" value="<?php echo $b1_y ?>">
    <input type="hidden" name="f_b2_x" value="<?php echo $b2_x ?>">
    <input type="hidden" name="f_b2_y" value="<?php echo $b2_y ?>">
    <input type="hidden" name="f_b3_x" value="<?php echo $b3_x ?>">
    <input type="hidden" name="f_b3_y" value="<?php echo $b3_y ?>">

    <input type="hidden" name="f_z1_x" value="<?php echo $z1_x ?>">
    <input type="hidden" name="f_z1_y" value="<?php echo $z1_y ?>">
    <input type="hidden" name="f_z2_x" value="<?php echo $z2_x ?>">
    <input type="hidden" name="f_z2_y" value="<?php echo $z2_y ?>">
    <input type="hidden" name="f_z3_x" value="<?php echo $z3_x ?>">
    <input type="hidden" name="f_z3_y" value="<?php echo $z3_y ?>">

    <input type="hidden" name="f_br_x" value="<?php echo $br_x ?>">
    <input type="hidden" name="f_br_y" value="<?php echo $br_y ?>">
    <input type="hidden" name="f_br_drk_x" value="<?php echo $br_drk_x ?>">
    <input type="hidden" name="f_br_drk_y" value="<?php echo $br_drk_y ?>">
    <input type="hidden" name="f_br_juh_x" value="<?php echo $br_juh_x ?>">
    <input type="hidden" name="f_br_juh_y" value="<?php echo $br_juh_y ?>">
    <input type="hidden" name="f_br_mhd_x" value="<?php echo $br_mhd_x ?>">
    <input type="hidden" name="f_br_mhd_y" value="<?php echo $br_mhd_y ?>">

    <input type="hidden" name="f_tr_drk_x" value="<?php echo $tr_drk_x ?>">
    <input type="hidden" name="f_tr_drk_y" value="<?php echo $tr_drk_y ?>">
    <input type="hidden" name="f_gr_drk_x" value="<?php echo $gr_drk_x ?>">
    <input type="hidden" name="f_gr_drk_y" value="<?php echo $br_juh_y ?>">
    <input type="hidden" name="f_zu_drk_x" value="<?php echo $br_mhd_x ?>">
    <input type="hidden" name="f_zu_drk_y" value="<?php echo $br_mhd_y ?>">

    <input type="hidden" name="f_tr_juh_x" value="<?php echo $tr_juh_x ?>">
    <input type="hidden" name="f_tr_juh_y" value="<?php echo $tr_juh_y ?>">
    <input type="hidden" name="f_gr_juh_x" value="<?php echo $gr_juh_x ?>">
    <input type="hidden" name="f_gr_juh_y" value="<?php echo $gr_juh_y ?>">
    <input type="hidden" name="f_zu_juh_x" value="<?php echo $zu_juh_x ?>">
    <input type="hidden" name="f_zu_juh_y" value="<?php echo $zu_juh_y ?>">

          <tr>
            <td>Naumburg</td>
            <td><input type="radio" name="f_set_start" value="nmb" /></td>
          </tr>
          <tr>
            <td>Weißenfels</td>
            <td><input type="radio" name="f_set_start" value="wsf" /></td>
          </tr>
          <tr>
            <td>Zeitz</td>
            <td><input type="radio" name="f_set_start" value="ztz" /></td>
          </tr>


      <?php


     ?>    </table>
   </details><br />
      <details style="display: inline-block; background-color: #DF7401;">
          <summary>Icon-Konfiguration</summary>
          <div class="" style="float: left;">

          <table>
            <tr>
              <td>Icon-<br />Typ</td>
              <td>Icon-<br />Breite</td>
              <td>Icon-<br />Länge</td>
              <td>Standart-<br />Breite</td>
              <td>Standart-<br />Länge</td>
            </tr>
            <tr style="height: 20px">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>Verletzte Person</td>
              <td><input type="text" placeholder="Breite" name="f_set_vp_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_vp_y" style="width: 30px;" /></td>
              <td>20px</td>
              <td>20px</td>
            </tr>
            <tr>
              <td>Klinikum</td>
              <td><input type="text" placeholder="Breite" name="f_set_klinik_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_klinik_y" style="width: 30px;" /></td>
              <td>40px</td>
              <td>40px</td>
            </tr>
            <tr>
              <td>Verkaufsstand</td>
              <td><input type="text" placeholder="Breite" name="f_set_verkauf_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_verkauf_y" style="width: 30px;" /></td>
              <td>40px</td>
              <td>40px</td>
            </tr>
            <tr>
              <td>Behandlungsplatz</td>
              <td><input type="text" placeholder="Breite" name="f_set_bhp_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_bhp_y" style="width: 30px;" /></td>
              <td>35px</td>
              <td>35px</td>
            </tr>
            <tr>
              <td>TEL</td>
              <td><input type="text" placeholder="Breite" name="f_set_tel_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_tel_y" style="width: 30px;" /></td>
              <td>40px</td>
              <td>30px</td>
            </tr>
            <tr>
              <td>EAL</td>
              <td><input type="text" placeholder="Breite" name="f_set_eal_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_eal_y" style="width: 30px;" /></td>
              <td>40px</td>
              <td>30px</td>
            </tr>
            <tr>
              <td>UEAL</td>
              <td><input type="text" placeholder="Breite" name="f_set_ueal_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_ueal_y" style="width: 30px;" /></td>
              <td>40px</td>
              <td>30px</td>
            </tr>
            <tr>
              <td>Brand 1</td>
              <td><input type="text" placeholder="Breite" name="f_set_b1_x" style="width: 30px;"/></td>
              <td><input type="text" placeholder="Länge" name="f_set_b1_y" style="width: 30px;"/></td>
              <td>20px</td>
              <td>30px</td>
            </tr>
            <tr>
              <td>Brand 2</td>
              <td><input type="text" placeholder="Breite" name="f_set_b2_x" style="width: 30px;"/></td>
              <td><input type="text" placeholder="Länge" name="f_set_b2_y" style="width: 30px;"/></td>
              <td>20px</td>
              <td>30px</td>
            </tr>
            <tr>
              <td>Brand 3</td>
              <td><input type="text" placeholder="Breite" name="f_set_b3_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_b3_y" style="width: 30px;" /></td>
              <td>20px</td>
              <td>30px</td>
            </tr>
          </table>

        </div>
        <div class="" style="float: right;">

          <table>
            <tr>
              <td>Icon-<br />Typ</td>
              <td>Icon-<br />Breite</td>
              <td>Icon-<br />Länge</td>
              <td>Standart-<br />Breite</td>
              <td>Standart-<br />Länge</td>
            </tr>
            <tr style="height: 20px">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>Zerstörung 1</td>
              <td><input type="text" placeholder="Breite" name="f_set_z1_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_z1_y" style="width: 30px;"/></td>
              <td>40px</td>
              <td>30px</td>
            </tr>
            <tr>
              <td>Zerstörung 2</td>
              <td><input type="text" placeholder="Breite" name="f_set_z2_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_z2_y" style="width: 30px;" /></td>
              <td>40px</td>
              <td>30px</td>
            </tr>
            <tr>
              <td>Zerstörung 3</td>
              <td><input type="text" placeholder="Breite" name="f_set_z3_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_z3_y" style="width: 30px;" /></td>
              <td>40px</td>
              <td>30px</td>
            </tr>
            <tr>
              <td>Bereitstellungsraum(BR)</td>
              <td><input type="text" placeholder="Breite" name="f_set_br_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_br_y" style="width: 30px;" /></td>
              <td>40px</td>
              <td>30px</td>
            </tr>
            <tr>
              <td>BR DRK</td>
              <td><input type="text" placeholder="Breite" name="f_set_br_drk_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_br_drk_y" style="width: 30px;" /></td>
              <td>40px</td>
              <td>30px</td>
            </tr>
            <tr>
              <td>BR JUH</td>
              <td><input type="text" placeholder="Breite" name="f_set_br_juh_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_br_juh_y"style="width: 30px;" /></td>
              <td>40px</td>
              <td>30px</td>
            </tr>
            <tr>
              <td>BR MHD</td>
              <td><input type="text" placeholder="Breite" name="f_set_br_mhd_x" style="width: 30px;" /></td>
              <td><input type="text" placeholder="Länge" name="f_set_br_mhd_y" style="width: 30px;" /></td>
              <td>40px</td>
              <td>30px</td>
            </tr>
          </table>

        </div>

      </details><br />
      <details style="background-color: #DF7401;">
        <summary>Taktische Einheiten</summary>
        <div class="" style="float: center;">

        <table>
          <tr>
            <td>Icon-<br />Typ</td>
            <td>Icon-<br />Breite</td>
            <td>Icon-<br />Länge</td>
            <td>Standart-<br />Breite</td>
            <td>Standart-<br />Länge</td>
          </tr>
          <tr style="height: 20px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>DRK - Truppe</td>
            <td><input type="text" placeholder="Breite" name="f_set_drk_tr_x" style="width: 30px;" /></td>
            <td><input type="text" placeholder="Länge" name="f_set_drk_tr_y" style="width: 30px;" /></td>
            <td>25px</td>
            <td>35px</td>
          </tr>
          <tr>
            <td>DRK - Gruppe</td>
            <td><input type="text" placeholder="Breite" name="f_set_drk_gr_x" style="width: 30px;" /></td>
            <td><input type="text" placeholder="Länge" name="f_set_drk_gr_y" style="width: 30px;" /></td>
            <td>25px</td>
            <td>35px</td>
          </tr>
          <tr>
            <td>DRK - Zug</td>
            <td><input type="text" placeholder="Breite" name="f_set_drk_zu_x" style="width: 30px;" /></td>
            <td><input type="text" placeholder="Länge" name="f_set_drk_zu_y" style="width: 30px;" /></td>
            <td>25px</td>
            <td>35px</td>
          </tr>
          <tr style="height: 20px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>JUH - Trupp</td>
            <td><input type="text" placeholder="Breite" name="f_set_juh_tr_x" style="width: 30px;" /></td>
            <td><input type="text" placeholder="Länge" name="f_set_juh_tr_y" style="width: 30px;" /></td>
            <td>40px</td>
            <td>30px</td>
          </tr>
          <tr>
            <td>JUH - Gruppe</td>
            <td><input type="text" placeholder="Breite" name="f_set_juh_gr_x" style="width: 30px;" /></td>
            <td><input type="text" placeholder="Länge" name="f_set_juh_gr_y" style="width: 30px;" /></td>
            <td>25px</td>
            <td>35px</td>
          </tr>
          <tr>
            <td>JUH - Zug</td>
            <td><input type="text" placeholder="Breite" name="f_set_juh_zu_x" style="width: 30px;" /></td>
            <td><input type="text" placeholder="Länge" name="f_set_juh_zu_y" style="width: 30px;" /></td>
            <td>25px</td>
            <td>35px</td>
          </tr>

        </table>

      </div>
      </details>
      <input type="submit" name="f_set_safe" value="SPEICHERN" style="float: center;">
    </form>




  <form class="" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" name="" value="ABBRECHEN">
  </form>
<center></div>
<?php
} ?>
</body>
</html>
