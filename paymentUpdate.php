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
$stmt = $conn->prepare("SELECT * FROM payment WHERE payid = :payid");


// bind the parameter values
$stmt->bindParam(':payid', $_POST['payid']);

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
    <title>Money records</title>
    <link rel="stylesheet" href="./Userregistration.css" />
  </head>
  <body>
    <header>
      <img src="./Hospital logo.png" alt="" id="company-logo" />
      <nav class="navigation">
        <a href="./pharmacistlandingpage.php">Back</a>
      </nav>
    </header>

    <div class="wrapper">
      <div class="form-box register">
        <h2>Money records</h2>
        <form action="insertpaymentupdate.php" method="POST">
            <div class="input-box">
            <input type="text" required name="payid" readonly
            value="<?php echo $row['payid'];?>"/>
            <label>Treatment Id</label>
          </div>
          <div class="input-box">
            <input type="text" required name="treid" readonly
            value="<?php echo $row['tid'];?>"/>
            <label>Treatment Id</label>
          </div>
          <div class="input-box">
            <input type="date" required name="paydate"
            value="<?php echo $row['paydate'];?>"/>
            <label>Pay date</label>
          </div>
          <div class="input-box">
            <input type="number" required name="payamount"
            value="<?php echo $row['payamount'];?>"/>
            <label>Pay Amount</label>
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