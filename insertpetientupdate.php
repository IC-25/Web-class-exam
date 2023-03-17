<?php

  $peid = $_POST['peid'];
  $fullname = $_POST['fullname'];
  $age = $_POST['age'];
  $insurance = $_POST['insurance'];
  $nationalid = $_POST['nationalid'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  $hosts ="localhost";
  $dbusename ="root";
  $dbpasword ="";
  $dbame ="ishimweinnocent_html_db221011634";


  //create connection

  $conn = mysqli_connect($hosts,$dbusename,$dbpasword,$dbame );
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
    $query = "UPDATE petients SET pefullname='$fullname',peage='$age',
    peinsurance='$insurance',penationalid='$nationalid',pephone='$phone',
    peaddress='$address' WHERE peid='$peid'";
      
      if ($conn->query($query) === TRUE) {
        echo"<script> alert('Petient Record Updated!!');</script>";
        ?>
  <script type="text/javascript">
  window.location.href="Patientregistration.php"</script>
  <?php
      }else{
        echo"<script> alert('There Was An Error!!');</script>" . $conn->erro;
        ?>
  <script type="text/javascript">
  window.location.href="Patientregistration.php"</script>
  <?php
      }
      $stmnt->close();
      $conn->close();
?>