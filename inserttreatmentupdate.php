<?php

  $treid = $_POST['treid'];
  $symptoms = $_POST['symptoms'];
  $desease = $_POST['desease'];
  $medecine = $_POST['medecine'];
  $doses = $_POST['doses'];

  $hosts ="localhost";
  $dbusename ="root";
  $dbpasword ="";
  $dbame ="ishimweinnocent_html_db221011634";


  //create connection

  $conn = mysqli_connect($hosts,$dbusename,$dbpasword,$dbame );
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
    $query = "UPDATE treatment SET tsymptom='$symptoms'
    ,tdeseases='$desease',medcine='$medecine',doses='$doses' WHERE tid='$treid'";
      
      if ($conn->query($query) === TRUE) {
        echo"<script> alert('Treatment Record Updated!!');</script>";
        ?>
  <script type="text/javascript">
  window.location.href="Treatmentrecord.php"</script>
  <?php
      }else{
        echo"<script> alert('There Was An Error!!');</script>" . $conn->erro;
        ?>
  <script type="text/javascript">
  window.location.href="Treatmentrecord.php"</script>
  <?php
      }
      $stmnt->close();
      $conn->close();
?>