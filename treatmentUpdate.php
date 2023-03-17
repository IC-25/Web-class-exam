<?php
session_start();

if (!isset($_SESSION["username"])){
  header("location:index.php");
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ishimweinnocent_html_db221011634";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Prepare and execute SELECT query
$stmt = $conn->prepare("SELECT * FROM treatment WHERE tid = :tid");


// bind the parameter values
$stmt->bindParam(':tid', $_POST['tid']);

$stmt->execute();

// Populate input field with data
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=\, initial-scale=1.0" />
    <title>Treatment Record</title>
    <link rel="stylesheet" href="./Userregistration.css" />
  </head>
  <body>
    <header>
      <img src="./Hospital logo.png" alt="" id="company-logo" />
      <nav class="navigation">
        <a href="./Treatmentrecord.php">Back</a>
      </nav>
    </header>

    <div class="wrapper">
      <div class="form-box register">
        <h2>Record Treatment</h2>
        <form action="inserttreatmentupdate.php" method="POST">
            <div class="input-box">
            <input type="number" required name="treid"
            value="<?php echo $row['tid'];?>"readonly/>
            <label>Treatment ID</label>
          </div>
          <div class="input-box">
            <input type="number" required name="docid"
            value="<?php echo $row['did'];?>"readonly/>
            <label>Doctor ID</label>
          </div>
          <div class="input-box">
            <input type="number" required name="pecid" 
            value="<?php echo $row['peid'];?>"/>
            <label>Patient ID</label>
          </div>
          <div class="input-box">
            <input type="text" required name="symptoms"
             value="<?php echo $row['tsymptom'];?>"/>
            <label>Treatment Symptoms</label>
          </div>
          <div class="input-box">
            <input type="text" required name="desease"
            value="<?php echo $row['tdeseases'];?>"/>
            <label>Desease result</label>
          </div>
          <div class="input-box">
            <input type="text" required name="medecine"
            value="<?php echo $row['medcine'];?>"/>
            <label>Medecine</label>
          </div>
          <div class="input-box">
            <input type="text" required name="doses"
            value="<?php echo $row['doses'];?>"/>
            <label>Doses</label>
          </div>
          <div class="remember-forgot">
            <label
              ><input type="checkbox" />I agree to the terms & conditions</label
            >
          </div>
          <button type="submit" class="btn" name="update">Update</button>
          <div class="login-register"></div>
        </form>
      </div>