
 <?php
  include('ini.php');
  include("read_dll.php");
  $com = parse_ini_file($link_headbar);
 if(isset($_POST['f_reset_db'])){


      $time = date('h-i-s-D');
      $bericht_titel = "Einsatzbericht_".$time;

      $path = "bericht/".$bericht_titel.".txt";
      $bericht = fopen($path, "w+");

      $header = "Einsatzbericht:";
      fwrite($bericht, $header."\n");
      $header = "Beteiligte Fahrzeuge:";
      fwrite($bericht, $header."\n\n");
      fwrite($bericht, "Fahrzeugtyp:_Funkkenner_Fahrzeug_ID\n____Besatzung 1, Besatzung, 2, Besatzung 3,\n____Besatzung 4, Besatzung 5, Besatzung, 6\n\n");
      foreach ($pdo->query("SELECT * FROM fahrzeuge") as $index) {
        fwrite($bericht, $index['fahrzeug_typ'].":_".$index['fahrzeug_funkkenner']."_".$index['fahrzeug_id']."\n");
        $bes1 = "";
        $bes2 = "";
        $bes3 = "";
        $bes4 = "";
        $bes5 = "";
        $bes6 = "";

        foreach ($pdo->query("SELECT * FROM personal WHERE personal_id = ".$index['fahrzeug_besatzung_1']) as $key) {

                $hoe_dienstgrad = "";
                $hoe_fkgrad = "";

                if($key['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
                if($key['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitaeter"; }
                if($key['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
                if($key['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitaeter"; }
                if($key['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

                if($key['personal_tf'] == 1){ $hoe_fkgrad = "Truppfuehrer"; }
                if($key['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenfuehrer"; }
                if($key['personal_zf'] == 1){ $hoe_fkgrad = "Zugfuehrer"; }
                if($key['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsfuehrer"; }


          $bes1 = $key['personal_nachname'].", ".$key['personal_vorname']." (".$hoe_dienstgrad.", ".$hoe_fkgrad.")";

        }
        foreach ($pdo->query("SELECT * FROM personal WHERE personal_id = ".$index['fahrzeug_besatzung_2']) as $key) {

                $hoe_dienstgrad = "";
                $hoe_fkgrad = "";

                if($key['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
                if($key['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitaeter"; }
                if($key['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
                if($key['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitaeter"; }
                if($key['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

                if($key['personal_tf'] == 1){ $hoe_fkgrad = "Truppfuehrer"; }
                if($key['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenfuehrer"; }
                if($key['personal_zf'] == 1){ $hoe_fkgrad = "Zugfuehrer"; }
                if($key['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsfuehrer"; }


          $bes2 = $key['personal_nachname'].", ".$key['personal_vorname']." (".$hoe_dienstgrad.", ".$hoe_fkgrad.")";

        }
        foreach ($pdo->query("SELECT * FROM personal WHERE personal_id = ".$index['fahrzeug_besatzung_3']) as $key) {

                $hoe_dienstgrad = "";
                $hoe_fkgrad = "";

                if($key['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
                if($key['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitaeter"; }
                if($key['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
                if($key['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitaeter"; }
                if($key['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

                if($key['personal_tf'] == 1){ $hoe_fkgrad = "Truppfuehrer"; }
                if($key['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenfuehrer"; }
                if($key['personal_zf'] == 1){ $hoe_fkgrad = "Zugfuehrer"; }
                if($key['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsfuehrer"; }

          $bes3 = $key['personal_nachname'].", ".$key['personal_vorname']." (".$hoe_dienstgrad.", ".$hoe_fkgrad.")";

        }
        foreach ($pdo->query("SELECT * FROM personal WHERE personal_id = ".$index['fahrzeug_besatzung_4']) as $key) {

                $hoe_dienstgrad = "";
                $hoe_fkgrad = "";

                if($key['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
                if($key['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitaeter"; }
                if($key['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
                if($key['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitaeter"; }
                if($key['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

                if($key['personal_tf'] == 1){ $hoe_fkgrad = "Truppfuehrer"; }
                if($key['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenfuehrer"; }
                if($key['personal_zf'] == 1){ $hoe_fkgrad = "Zugfuehrer"; }
                if($key['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsfuehrer"; }


          $bes4 = $key['personal_nachname'].", ".$key['personal_vorname']." (".$hoe_dienstgrad.", ".$hoe_fkgrad.")";

        }
        foreach ($pdo->query("SELECT * FROM personal WHERE personal_id = ".$index['fahrzeug_besatzung_5']) as $key) {

                $hoe_dienstgrad = "";
                $hoe_fkgrad = "";

                if($key['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
                if($key['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitaeter"; }
                if($key['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
                if($key['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitaeter"; }
                if($key['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

                if($key['personal_tf'] == 1){ $hoe_fkgrad = "Truppfuehrer"; }
                if($key['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenfuehrer"; }
                if($key['personal_zf'] == 1){ $hoe_fkgrad = "Zugfuehrer"; }
                if($key['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsfuehrer"; }


          $bes5 = $key['personal_nachname'].", ".$key['personal_vorname']." (".$hoe_dienstgrad.", ".$hoe_fkgrad.")";

        }
        foreach ($pdo->query("SELECT * FROM personal WHERE personal_id = ".$index['fahrzeug_besatzung_6']) as $key) {

                $hoe_dienstgrad = "";
                $hoe_fkgrad = "";

                if($key['personal_san'] == 1){ $hoe_dienstgrad = "San"; }
                if($key['personal_rs'] == 1){ $hoe_dienstgrad = "Rettugnssanitaeter"; }
                if($key['personal_ra'] == 1){ $hoe_dienstgrad = "Rettungsassistent"; }
                if($key['personal_nfs'] == 1){ $hoe_dienstgrad = "Notfallsanitaeter"; }
                if($key['personal_na'] == 1){ $hoe_dienstgrad = "Notarzt"; }

                if($key['personal_tf'] == 1){ $hoe_fkgrad = "Truppfuehrer"; }
                if($key['personal_gf'] == 1){ $hoe_fkgrad = "Gruppenfuehrer"; }
                if($key['personal_zf'] == 1){ $hoe_fkgrad = "Zugfuehrer"; }
                if($key['personal_vf'] == 1){ $hoe_fkgrad = "Verbandsfuehrer"; }


          $bes6 = $key['personal_nachname'].", ".$key['personal_vorname']." (".$hoe_dienstgrad.", ".$hoe_fkgrad.")";

        }

        fwrite($bericht, "____".$bes1.", ".$bes2.", ".$bes3.", \n");
        fwrite($bericht, "____".$bes4.", ".$bes5.", ".$bes6.", \n");
      }
      fwrite($bericht, "\n\nEinsÃ¤tze:\n");
      foreach ($pdo->query("SELECT * FROM einsaetze") as $index) {
        $stich = "";
        $adresse = "";
        foreach ($pdo->query("SELECT * FROM einsatz_stichwort WHERE einsatz_stichwort_id =".$index['einsatz_stichwort']) as $key) {
          $stich = $key['einsatz_stichwort_title'];
        }
        if($index['einsatz_adresse_isset'] ==1){
          foreach ($pdo->query("SELECT * FROM prop_stasse WHERE prop_id =".$index['einsatz_adresse']) as $key) {
            $adresse = $key['prop_art']."_".$key['prop_title']."-".$key['prop_gemeinde'];
          }
        }
        fwrite($bericht, "Einsatz:_".$index['einsatz_id']."_".$stich."\n");
        fwrite($bericht, "____".$adresse."\n");
      }


      fwrite($bericht, "Berichtende");
      fclose($bericht);





 $sql_clear_table_einsaetze = $com['del']['einsaetze'];
 $sql_clear_table_fahrzeuge = $com['del']['fahrzeuge'];
 $sql_clear_table_tagebuch = $com['del']['tage'];
 $sql_clear_table_karte = $com['del']['karte'];


   echo"lÃ¶schen...";
   $del_einsaetze = $pdo->prepare($sql_clear_table_einsaetze);
   $del_fahrzeuge = $pdo->prepare($sql_clear_table_fahrzeuge);

   $del_tagebuch = $pdo->prepare($sql_clear_table_tagebuch);
   $del_karte = $pdo->prepare($sql_clear_table_karte);
   $del_einsaetze->execute();
   $del_fahrzeuge->execute();

   $del_tagebuch->execute();
   $del_karte->execute();

   $del_pat = $pdo->prepare("DELETE  FROM patienten");
   $del_pat->execute();
 }

 if(isset($_POST['f_load_mask'])){
   #include('reset_db.php');

   //16 EintrÃ¤ge pro Fahrzeug
   switch ($_POST['f_load_action']) {
    case 'BOS_BLK_RuK':
      #$generate = $pdo->prepare("INSERT INTO fahrzeuge (`fahrzeug_id`, `fahrzeug_einsatz`, `fahrzeug_funkkenner`, `fahrzeug_status`, `fahrzeug_kennzeichen`, `fahrzeug_besatzung_1`, `fahrzeug_besatzung_2`, `fahrzeug_besatzung_3`, `fahrzeug_besatzung_4`, `fahrzeug_besatzung_5`, `fahrzeug_besatzung_6`, `fahrzeug_typ`, `fahrzeug_ziel`, `fahrzeug_ziel_koordinaten`, `fahrzeug_aktion`, `fahrzeug_organisation`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

      //Akkon Naumburg
      #$generate->execute([NULL, '', '302/83/01', '2', 'BLK JU 123',  '9', '9', '9', '9', '9', '9',  '83', '', '', 'Bereitschaft', 'juh']);
      #$generate->execute([NULL, '', '302/83/02', '2', 'BLK JU 124',  '9', '9', '9', '9', '9', '9',  '83', '', '', 'Bereitschaft', 'juh']);
      #$generate->execute([NULL, '', '302/83/03', '2', 'BLK JU 125',  '9', '9', '9', '9', '9', '9',  '83', '', '', 'Bereitschaft', 'juh']);
      #$generate->execute([NULL, '', '302/82/01', '2', 'BLK JU 126',  '9', '9', '9', '9', '9', '9',  '82', '', '', 'Bereitschaft', 'juh']);
      #$generate->execute([NULL, '', '302/82/02', '2', 'BLK JU 127',  '9', '9', '9', '9', '9', '9',  '82', '', '', 'Bereitschaft', 'juh']);
      //Johannes WeiÃŸenfels
      #$generate->execute([NULL, '', '303/83/01', '2', 'BLK MD 123',   '9', '9', '9', '9', '9', '9', '83', '', '', 'Bereitschaft', 'mhd']);
      #$generate->execute([NULL, '', '303/83/02', '2', 'BLK MD 124',  '9', '9', '9', '9', '9', '9',  '83', '', '', 'Bereitschaft', 'mhd']);
      #$generate->execute([NULL, '', '303/83/03', '2', 'BLK MD 125',  '9', '9', '9', '9', '9', '9',  '83', '', '', 'Bereitschaft', 'mhd']);
      #$generate->execute([NULL, '', '303/82/01', '2', 'BLK MD 126',  '9', '9', '9', '9', '9', '9',  '82', '', '', 'Bereitschaft', 'mhd']);
      //Rot kreuz Zeitz
      #$generate->execute([NULL, '', '304/83/01', '2', 'BLK RK 123',  '9', '9', '9', '9', '9', '9',  '83', '', '', 'Bereitschaft', 'drk']);
      #$generate->execute([NULL, '', '304/83/02', '2', 'BLK RK 123',  '9', '9', '9', '9', '9', '9',  '83', '', '', 'Bereitschaft', 'drk']);
      #$generate->execute([NULL, '', '304/83/03', '2', 'BLK RK 123',  '9', '9', '9', '9', '9', '9',  '84', '', '', 'Bereitschaft', 'drk']);
      #$generate->execute([NULL, '', '304/83/04', '2', 'BLK RK 123',  '9', '9', '9', '9', '9', '9',  '83', '', '', 'Bereitschaft', 'drk']);
      //Rot Kreuz Naumburg
      #$generate->execute([NULL, '', '461/11/01', '2', 'BLK RK 705',  '9', '9', '9', '9', '9', '9',  '11', '', '', 'Bereitschaft', 'drk']);
      #$generate->execute([NULL, '', '461/12/01', '2', 'BLK RK 706',  '9', '9', '9', '9', '9', '9',  '12', '', '', 'Bereitschaft', 'drk']);
      #$generate->execute([NULL, '', '461/83/01', '2', 'BLK RK 707',  '9', '9', '9', '9', '9', '9',  '83', '', '', 'Bereitschaft', 'drk']);
      #$generate->execute([NULL, '', '461/83/02', '2', 'BLK RK 708',  '9', '9', '9', '9', '9', '9',  '83', '', '', 'Bereitschaft', 'drk']);
      #$generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 709',  '9', '9', '9', '9', '9', '9',  '85', '', '', 'Bereitschaft', 'drk']);
      #$generate->execute([NULL, '', '461/85/02', '2', 'BLK RK 710',  '9', '9', '9', '9', '9', '9',  '85', '', '', 'Bereitschaft', 'drk']);
      #$generate->execute([NULL, '', '421/93/01', '2', 'BLK RK 711',  '9', '9', '9', '9', '9', '9',  '93', '', '', 'Bereitschaft', 'drk']);
      #$generate->execute([NULL, '', '421/84/01', '2', 'BLK RK 712',  '9', '9', '9', '9', '9', '9',  '84', '', '', 'Bereitschaft', 'drk']);

      $generate = $pdo->prepare($com['in']['fahrzeuge']);
      //Akkon Naumburg
      //NULL, '', '302/83/01/01', '2', '', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'dgn', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '219']
      $generate->execute([NULL, '', '302/83/01', '2', 'BLK JU 123', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'juh', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '434']);
      $generate->execute([NULL, '', '302/83/02', '2', 'BLK JU 124', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'juh', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '434']);
      $generate->execute([NULL, '', '302/83/03', '2', 'BLK JU 125', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'juh', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '434']);
      $generate->execute([NULL, '', '302/82/01', '2', 'BLK JU 126', '1', '1', '1', '1', '1', '1', '82', '', 'Bereitschaft', 'juh', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '434']);
      $generate->execute([NULL, '', '302/82/02', '2', 'BLK JU 127', '1', '1', '1', '1', '1', '1', '82', '', 'Bereitschaft', 'juh', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '434']);
      //Johannes WeiÃŸenfels
      $generate->execute([NULL, '', '303/83/01', '2', 'BLK MD 123', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'mhd', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '437']);
      $generate->execute([NULL, '', '303/83/02', '2', 'BLK MD 124', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'mhd', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '437']);
      $generate->execute([NULL, '', '303/83/03', '2', 'BLK MD 125', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'mhd', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '437']);
      $generate->execute([NULL, '', '303/82/01', '2', 'BLK MD 126', '1', '1', '1', '1', '1', '1', '82', '', 'Bereitschaft', 'mhd', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '437']);
      //Rot kreuz Zeitz
      $generate->execute([NULL, '', '304/83/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '438']);
      $generate->execute([NULL, '', '304/83/02', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '438']);
      $generate->execute([NULL, '', '304/83/03', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '438']);
      $generate->execute([NULL, '', '304/82/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '82', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '438']);
      //Rot Kreuz Naumburg

      $generate->execute([NULL, '', '422/14/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '82', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '436']);
      $generate->execute([NULL, '', '422/84/01', '2', 'BLK L 8002', '1', '1', '1', '1', '1', '1', '84', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '435']);
      $generate->execute([NULL, '', '422/84/02', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '436']);
      $generate->execute([NULL, '', '422/90/01', '2', 'BLK L 8010', '1', '1', '1', '1', '1', '1', '93', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '438']);
      $generate->execute([NULL, '', '422/93/01', '2', 'BLK L 8010', '1', '1', '1', '1', '1', '1', '93', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '435']);

      $generate->execute([NULL, '', '425/92/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '11', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '436']);
      $generate->execute([NULL, '', '425/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '12', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '436']);

      $generate->execute([NULL, '', '432/12/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '436']);
      $generate->execute([NULL, '', '432/19/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '19', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '435']);
      $generate->execute([NULL, '', '432/19/02', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '436']);
      $generate->execute([NULL, '', '432/94/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '436']);

      $generate->execute([NULL, '', '442/14/01', '2', 'BLK L 8002', '1', '1', '1', '1', '1', '1', '84', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '436']);
      $generate->execute([NULL, '', '442/95/01', '2', 'BLK L 8010', '1', '1', '1', '1', '1', '1', '93', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '436']);
      $generate->execute([NULL, '', '442/19/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '19', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '436']);

      $generate->execute([NULL, '', '461/11/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '11', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
      $generate->execute([NULL, '', '461/12/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '12', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
      $generate->execute([NULL, '', '461/82/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '82', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
      $generate->execute([NULL, '', '461/83/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
      $generate->execute([NULL, '', '461/83/02', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
      $generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
      $generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);


      break;

    case 'DGN(SSD)_RB':
      $generate = $pdo->prepare($com['in']['fahrzeuge']);

      //
      $generate->execute([NULL, '', 'DGN/10/01', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'dgn', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '219']);
      $generate->execute([NULL, '', 'DGN/10/02', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'dgn', '', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '219']);
      $generate->execute([NULL, '', 'DGN/100/01', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'dgn', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '219']);



      break;
    case 'DGN(SSD)_AS':
      $generate = $pdo->prepare($com['in']['fahrzeuge']);

      //
      $generate->execute([NULL, '', 'DGN/10/01', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'dgn', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '219']);
      $generate->execute([NULL, '', 'DGN/10/02', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'dgn', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '219']);
      $generate->execute([NULL, '', 'DGN/10/03', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'dgn', '', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '219']);
      $generate->execute([NULL, '', 'DGN/99/01', '2', '', '1', '1', '1', '1', '1', '1', 'Bhp', '', 'Bereitschaft', 'dgn', '', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '219']);
      $generate->execute([NULL, '', 'DGN/100/02', '2', '', '1', '1', '1', '1', '1', '1', 'EAL-Sa', '', 'Bereitschaft', 'dgn', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '219']);








      $gen = $pdo->prepare("INSERT INTO prop_karte (`prop_id`,`status`, `prop_title`, `prop_art`, `prop_discribtion`, `prop_x`, `prop_y`, `prop_adresse`, `prop_gruppe_a`, `prop_gruppe_a_nr`, `prop_group_count`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $gen->execute([NULL,'s', 'Bhp','Bhp','','51.15655006724605', '11.812439258185583','','1','1','2']);
      $gen->execute([NULL,'d','FK-DGN(SSD)','EAL','','51.15655006724605', '11.812439258185583','','1','2','2']);
      $gen->execute([NULL,'d','Schulleitung','TEL','','51.156357242585464', '11.81262595123428','','','','']);

      break;
    case 'DRK_NMB_AS_AiB':
    $generate = $pdo->prepare($com['in']['fahrzeuge']);
    $generate->execute([NULL, '', '461/11/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '11', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/12/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '12', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/82/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '82', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/83/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/83/02', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '422/84/01', '2', 'BLK L 8002', '1', '1', '1', '1', '1', '1', '84', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '432/19/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '19', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '435']);

      break;
    case 'DRK_NMB_AS_AiH':
    $generate = $pdo->prepare($com['in']['fahrzeuge']);
    $generate->execute([NULL, '', '461/11/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '11', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/12/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '12', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/82/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '82', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/83/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/83/02', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '422/84/01', '2', 'BLK L 8002', '1', '1', '1', '1', '1', '1', '84', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '432/19/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '19', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '435  ']);
      break;
    case 'DRK_NMB_AS_WeMe':
    $generate = $pdo->prepare($com['in']['fahrzeuge']);
    $generate->execute([NULL, '', 'San_01', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '439']);
    $generate->execute([NULL, '', 'San_02', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '439']);
    $generate->execute([NULL, '', 'San_03', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '1', '0', '1', '0', '1', '439']);

    $generate->execute([NULL, '', '461/11/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '11', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '439']);
    $generate->execute([NULL, '', '461/12/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '12', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '439']);
    $generate->execute([NULL, '', '461/82/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '82', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '439']);
    $generate->execute([NULL, '', '461/83/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '439']);
    $generate->execute([NULL, '', '461/83/02', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '419']);
    $generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '439']);
    $generate->execute([NULL, '', '461/85/02', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '439']);
    $generate->execute([NULL, '', '422/84/01', '2', 'BLK L 8002', '1', '1', '1', '1', '1', '1', '84', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '428']);
    $generate->execute([NULL, '', '422/93/01', '2', 'BLK L 8010', '1', '1', '1', '1', '1', '1', '93', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '411']);
    $generate->execute([NULL, '', '432/19/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '19', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '439  ']);

      $gen = $pdo->prepare("INSERT INTO `prop_karte` (`prop_id`,  `status`, `prop_title`, `prop_art`, `prop_discribtion`, `prop_x`, `prop_y`, `prop_adresse`, `prop_gruppe_a`, `prop_gruppe_a_nr`, `prop_group_count`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $gen->execute([NULL,'s', 'Bhp','Bhp','','51.168513370092164', '11.778384173730457','','0','0','0']);
      $gen->execute([NULL,'d','EAL SanitÃ¤t','EAL','','51.16870720069082', '11.778227264508148','','0','0','0']);
      $gen->execute([NULL,'d','421/93/01','GW_SAN','','51.168228803306924', '11.778977155506318','','0','0','0']);
      $gen->execute([NULL,'d','KTW Steinmeister','KTWB','','51.16028247867478', '11.768492481098622','KTW Steinmeister','0','0','0']);
      $gen->execute([NULL,'d','461/83/02','RTW','','51.170895676904074', '11.776131628779583','RTW Herzer','0','0','0']);
      $gen->execute([NULL,'d','Kater Weimar 5 / 11-01','Kdow','','51.16875988455632', '11.778211394668599','','0','0','0']);
      $gen->execute([NULL,'d','461/83/01','RTW','','51.16864499798948', ' 11.778367222051322','','0','0','0']);
      #$gen->execute([NULL,'461/82/01','NEF','','51.16847682378348', ' 11.778173138863297','','0','0','0']);
      $gen->execute([NULL,'d','weme','mode','','51.16864499798948', ' 11.778367222051322','','0','0','0']);



        break;
    case 'DRK_NMB_AS_WiFe':
    $generate = $pdo->prepare($com['in']['fahrzeuge']);
    $generate->execute([NULL, '', 'San_01', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '413']);
    $generate->execute([NULL, '', 'San_02', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '413']);
    $generate->execute([NULL, '', 'San_03', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '1', '0', '1', '0', '1', '413']);

    $generate->execute([NULL, '', '461/11/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '11', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '434']);
    $generate->execute([NULL, '', '461/12/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '12', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '433']);
    $generate->execute([NULL, '', '461/82/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '82', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '433']);
    $generate->execute([NULL, '', '461/83/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '433']);
    $generate->execute([NULL, '', '461/83/02', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '433']);
    $generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '433']);
    $generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '433']);
    $generate->execute([NULL, '', '422/84/01', '2', 'BLK L 8002', '1', '1', '1', '1', '1', '1', '84', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '429']);
    $generate->execute([NULL, '', '422/93/01', '2', 'BLK L 8010', '1', '1', '1', '1', '1', '1', '93', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '411']);
    $generate->execute([NULL, '', '432/19/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '19', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '413']);
        break;
    case 'DRK_NMB_AS_KiFe':
    $generate = $pdo->prepare($com['in']['fahrzeuge']);
    $generate->execute([NULL, '', 'San_01', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '219']);
    $generate->execute([NULL, '', 'San_02', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '219']);
    $generate->execute([NULL, '', 'San_03', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '1', '0', '1', '0', '1', '219']);
    $generate->execute([NULL, '', 'San_04', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '219']);
    $generate->execute([NULL, '', 'San_05', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '219']);
    $generate->execute([NULL, '', 'San_06', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '1', '0', '1', '0', '1', '219']);

    $generate->execute([NULL, '', '461/11/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '11', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/12/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '12', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/82/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '82', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/83/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/83/02', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '422/84/01', '2', 'BLK L 8002', '1', '1', '1', '1', '1', '1', '84', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '422/93/01', '2', 'BLK L 8010', '1', '1', '1', '1', '1', '1', '93', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '432/19/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '19', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '435  ']);
        break;
    case 'DRK_NMB_AS_WeFru':
    $generate = $pdo->prepare($com['in']['fahrzeuge']);
    $generate->execute([NULL, '', 'San_01', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '219']);
    $generate->execute([NULL, '', 'San_02', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '219']);
    #$generate->execute([NULL, '', 'San_03', '2', '', '1', '1', '1', '1', '1', '1', 'LTru', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '1', '0', '1', '0', '1', '219']);

    $generate->execute([NULL, '', '461/11/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '11', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/12/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '12', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/82/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '82', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/83/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/83/02', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '83', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '461/85/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '85', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '422/84/01', '2', 'BLK L 8002', '1', '1', '1', '1', '1', '1', '84', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '422/93/01', '2', 'BLK L 8010', '1', '1', '1', '1', '1', '1', '93', '', 'Bereitschaft', 'drk', '', '0', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '435']);
    $generate->execute([NULL, '', '432/19/01', '2', 'BLK RK 126', '1', '1', '1', '1', '1', '1', '19', '', 'Bereitschaft', 'drk', '', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '435  ']);
        break;

   }






 }
  ?>

<form  action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><?php //Masken Laden ?>
       <span class="loadmask" >
         <select name="f_load_action">
           <optgroup label="BOS_BLK">
             <option value="BOS_BLK_RuK">K_BLK & R_BLK</option>
           </optgroup>
           <optgroup label="DGN(SSD)">
             <option value="DGN(SSD)_RB">Regelbetrieb</option>
             <option value="DGN(SSD)_AS">Absicherung</option>
           </optgroup>
           <optgroup label="NMB(DRK)">
             <option value="DRK_NMB_AS">Sonst.</option>
             <option value="DRK_NMB_AS_WiFe">Winzerfest</option>
             <option value="DRK_NMB_AS_WeMe">Weinmeile</option>
             <option value="DRK_NMB_AS_WeFru">WeinfrÃ¼hling</option>
             <option value="DRK_NMB_AS_KiFe">Kirschfest</option>
             <option value="DRK_NMB_AS_AiH">Advent in den HÃ¶fen</option>
             <option value="DRK_NMB_AS_AiB">Advent in den Weinbergen</option>
           </optgroup>
         </select>

         <input type="submit" name="f_load_mask" value="Masken Laden" /></span>

         <input type="submit" name="f_reset_db" value="Maske leeren">

</form>
