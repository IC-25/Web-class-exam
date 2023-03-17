<?php
// create a new PDO object
$pdo = new PDO('mysql:host=localhost;dbname=ishimweinnocent_html_db221011634', 'root', '');

// prepare the DELETE statement
$statement = $pdo->prepare('DELETE FROM releasedmedecine WHERE reid = :reid');

// bind the parameter values
$statement->bindParam(':reid', $_POST['reid']);

// execute the statement
$statement->execute();
echo"<script> alert('Release Record Deleted!!');</script>";
                ?>
        <script type="text/javascript">
        window.location.href="Releasemedecine.php"</script>
        <?php

?>