<?php
// create a new PDO object
$pdo = new PDO('mysql:host=localhost;dbname=ishimweinnocent_html_db221011634', 'root', '');

// prepare the DELETE statement
$statement = $pdo->prepare('DELETE FROM payment WHERE payid = :payid');

// bind the parameter values
$statement->bindParam(':payid', $_POST['payid']);

// execute the statement
$statement->execute();
echo"<script> alert('Payment Record Deleted!!');</script>";
                ?>
        <script type="text/javascript">
        window.location.href="Moneyrecord.php"</script>
        <?php

?>