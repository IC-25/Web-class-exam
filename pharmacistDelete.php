<?php
// create a new PDO object
$pdo = new PDO('mysql:host=localhost;dbname=ishimweinnocent_html_db221011634', 'root', '');

// prepare the DELETE statement
$statement = $pdo->prepare('DELETE FROM pharmacist WHERE pid = :pid');

// bind the parameter values
$statement->bindParam(':pid', $_POST['pid']);

// execute the statement
$statement->execute();
echo"<script> alert('Record Deleted!!');</script>";
                ?>
        <script type="text/javascript">
        window.location.href="pharmacistreg.php"</script>
        <?php

?>