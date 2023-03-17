<?php
// create a new PDO object
$pdo = new PDO('mysql:host=localhost;dbname=ishimweinnocent_html_db221011634', 'root', '');

// prepare the DELETE statement
$statement = $pdo->prepare('DELETE FROM petients WHERE peid = :peid');

// bind the parameter values
$statement->bindParam(':peid', $_POST['peid']);

// execute the statement
$statement->execute();
echo"<script> alert('Patient Record Deleted!!');</script>";
                ?>
        <script type="text/javascript">
        window.location.href="Patientregistration.php"</script>
        <?php

?>