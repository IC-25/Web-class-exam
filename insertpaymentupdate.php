<?php

  $treid = $_POST['treid'];
  $payid = $_POST['payid'];
  $paydate = $_POST['paydate'];
  $payamount = $_POST['payamount'];

  $hosts ="localhost";
  $dbusename ="root";
  $dbpasword ="";
  $dbame ="ishimweinnocent_html_db221011634";


  //create connection

  $conn = mysqli_connect($hosts,$dbusename,$dbpasword,$dbame );
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
    $query = "UPDATE payment SET paydate='$paydate',payamount='$payamount' WHERE payid='$payid'";
      
      if ($conn->query($query) === TRUE) {
        echo"<script> alert('Payment Record Updated!!');</script>";
        ?>
  <script type="text/javascript">
  window.location.href="Moneyrecord.php"</script>
  <?php
      }else{
        echo"<script> alert('There Was An Error!!');</script>" . $conn->erro;
        ?>
  <script type="text/javascript">
  window.location.href="Moneyrecord.php"</script>
  <?php
      }
      $stmnt->close();
      $conn->close();
?>