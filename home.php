<style media="screen">
  .login_bar{
  background-color: red;
  position: static;
  }
  input:focus{
    background-color: pink;
  }
</style>
<html lang="de" dir="ltr">
<head>
  <link rel="icon" href="data/einsaetze/styles/sonder.png">
  <title>LOGIN</title>


      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

      <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />

      <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
      <script type='text/javascript' src='http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js'></script>

      <?php
      include('data/ini.php');
       ?>



</head>
<body style="background-color: grey; color: white;">


 <div class="login_bar">
   <span style="color: white; font-size: 65px;"> &nbsp <span style="font-size: 75px;">E</span>insatz <span style="font-size: 75px;">D</span>isponierungs <span style="font-size: 75px;"  >S</span>oftware</span>
   <span>professionell</span>
   <div class="" style="text-align:right;">

   <form class="" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
     <input type="text" name="f_login_username" placeholder="username" required />
     <input type="password" name="f_login_password" placeholder="password" required />

     <input type="submit" name="f_login_submit" value="LOGIN">
   </form></div><br />


 </span>

 </div>
 <?php
 include('data/ini.php');


 $user = array("dispo1","Kaffee123","Disponent");

 if(isset($_POST['f_login_submit'])){

   #$sql = "SELECT * FROM user WHERE user_username = .$_POST['f_login_username']";
   $user_id = "";
   $username = "";
   $password = "";
   $role = "";
   foreach ($pdo->query("SELECT * FROM user") as $row) {
       if($_POST['f_login_username'] == $row['user_username']){
       $user_id = $row['user_id'];
       $username = $row['user_username'];
       $password = $row['user_password'];
       $role = $row['user_role'];}
   }
?><div class="continue" style="width: 200px; margin-top: 400px; text-align: center;z-index: 3; border-radius: 2;position: fixed; margin-left: 50%; color: black; margin-top: 50px;  background-color: orange;"><?php
   if($_POST['f_login_password'] == $password){

       if($role == "Disponent"){
           ?>
           <div style="height: 50px; color: white; text-align: center;   width: 200px;">

           </div>
             <?php echo"Hallo ".$username."<br /> "; ?>
             <form action="exec.php" method="post"><br />
               <input type="hidden" name="f_login_id" value="<?php echo $user_id; ?>" />
               <input type="submit" name="f_login_go" value="WEITER ZUR ANWENDUNG" />
             </form>
           </div>

           <?php
       }
       if($role == "EM"){
           ?><br />
           <div style="height: 50px; color: white; text-align: center;   width: 200px;">
           <form action="em.php" method="post">
             <input type="hidden" name="f_login_id" value="<?php echo $user_id; ?>" />
             <button type="button" name="button"> ALS </button>
             <select class="" name="f_em_id" style="background-color: grey; color: white;">
               <?php
               $sql = "SELECT * FROM fahrzeuge";
               foreach ($pdo->query($sql) as $em) {
                 ?>
                 <option value="<?php echo $em['fahrzeug_id']; ?>"><?php echo $em['fahrzeug_funkkenner'] ?></option>
                 <?php
               }?>
             </select>
             <input type="submit" name="f_login_go" value="FORTFAHREN" />
           </form></div>
           <?php
       }
   }?></div><?php
 }
  ?>


  <div id="map" style="height: 100%; width: 100%; border: 1px solid #AAA; color: black;"></div>
<style media="screen">
  .body{
    color: black;
  }
</style>
  <script type="text/javascript">


  var map = L.map( 'map', {
    center: [51.1520144166648, 11.794654823455096],

    zoom: 13

  });




  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);
  L.marker([51.1520144166648, 11.794654823455096]).addTo(map)
      .bindPopup('Naumburg(Saale)')
      .openPopup();


  <?php //Städte
  $sql = "SELECT * FROM prop_stadt";
  foreach ($pdo->query($sql) as $row) { ?>
    var x = <?php echo $row['prop_x'];?>;
    var y =  <?php echo $row['prop_y']; ?>;

    L.marker([x,y]).addTo(map)
        .bindPopup("stadt")
  <?php
  }
   ?>





  $.getJSON("data/geojson/blk.geojson",function(data){

  var datalayer = L.geoJson(data ,{
    onEachFeature: function(feature, featureLayer) {
    featureLayer.bindPopup(feature.properties.NAME_1);
  }
  }).addTo(map);
  newMap.fitBounds(datalayer.getBounds());
  });

  $.getJSON("data/geojson/home_view.geojson",function(data){

  var datalayer = L.geoJson(data ,{
    onEachFeature: function(feature, featureLayer) {
    featureLayer.bindPopup(feature.properties.NAME_1);  }
  }).addTo(map);
  newMap.fitBounds(datalayer.getBounds());
  });

  $.getJSON("data/geojson/naumburg/jaegerstrasse.geojson",function(data){
  var datalayer = L.geoJson(data ,{
    onEachFeature: function(feature, featureLayer) {
    featureLayer.bindPopup(feature.properties.NAME_1);
  }
  }).addTo(map);

  newMap.fitBounds(datalayer.getBounds());

  });


  var circle = L.circle([51.1520144166648, 11.794654823455096], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 15000
}).addTo(map);



  </script>

</body>
</html>
