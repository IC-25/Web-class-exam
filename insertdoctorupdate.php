<?php

  $docid = $_POST['docid'];
  $fullname = $_POST['fullname'];
  $phone = $_POST['phone'];
  $hosts ="localhost";
  $dbusename ="root";
  $dbpasword ="";
  $dbame ="ishimweinnocent_html_db221011634";


  //create connection

  $conn = mysqli_connect($hosts,$dbusename,$dbpasword,$dbame );
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
    $query = "UPDATE doctors SET dfullname='$fullname',dphone='$phone' WHERE did='$docid'";
      
      if ($conn->query($query) === TRUE) {
        echo"<script> alert('Record Updated!!');</script>";
        ?>
  <script type="text/javascript">
  window.location.href="doctorreg.php"</script>
  <?php
      }else{
        echo"<script> alert('There Was An Error!!');</script>" . $conn->erro;
        ?>
  <script type="text/javascript">
  window.location.href="doctorreg.php"</script>
  <?php
      }
      $stmnt->close();
      $conn->close();
?>