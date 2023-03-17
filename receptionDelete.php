<?php
// create a new PDO object
$pdo = new PDO('mysql:host=localhost;dbname=ishimweinnocent_html_db221011634', 'root', '');

// prepare the DELETE statement
$statement = $pdo->prepare('DELETE FROM reception WHERE rid = :rid');

// bind the parameter values
$statement->bindParam(':rid', $_POST['rid']);

// execute the statement
$statement->execute();
echo"<script> alert('Record Deleted!!');</script>";
                ?>
        <script type="text/javascript">
        window.location.href="receptionreg.php"</script>
        <?php

?>