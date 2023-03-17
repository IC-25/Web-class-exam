<?php

  $medecid = $_POST['medecid'];
  $fullname = $_POST['fullname'];
  $price = $_POST['price'];
  $manidate = $_POST['manidate'];
  $expdate = $_POST['expdate'];
  $totalmed = $_POST['totalmed'];
  $hosts ="localhost";
  $dbusename ="root";
  $dbpasword ="";
  $dbame ="ishimweinnocent_html_db221011634";


  //create connection

  $conn = mysqli_connect($hosts,$dbusename,$dbpasword,$dbame );
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
    $query = "UPDATE medecine SET mname='$fullname',mprice_unit='$price'
    ,mmfgdate='$manidate',mexpdate='$expdate',total_dose='$totalmed' WHERE mid='$medecid'";
      
      if ($conn->query($query) === TRUE) {
        echo"<script> alert('Record Updated!!');</script>";
        ?>
  <script type="text/javascript">
  window.location.href="Medecinestock.php"</script>
  <?php
      }else{
        echo"<script> alert('There Was An Error!!');</script>" . $conn->erro;
        ?>
  <script type="text/javascript">
  window.location.href="Medecinestock.php"</script>
  <?php
      }
      $stmnt->close();
      $conn->close();
?>