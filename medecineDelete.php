<?php
// create a new PDO object
$pdo = new PDO('mysql:host=localhost;dbname=ishimweinnocent_html_db221011634', 'root', '');

// prepare the DELETE statement
$statement = $pdo->prepare('DELETE FROM medecine WHERE mid = :mid');

// bind the parameter values
$statement->bindParam(':mid', $_POST['mid']);

// execute the statement
$statement->execute();
echo"<script> alert('Medecine Record Deleted!!');</script>";
                ?>
        <script type="text/javascript">
        window.location.href="Medecinestock.php"</script>
        <?php

?>