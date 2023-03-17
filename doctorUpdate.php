<?php
session_start();

if (!isset($_SESSION["username"])){
  header("location:index.php");
}


// Connect to database

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
$stmt = $conn->prepare("SELECT * FROM doctors WHERE did = :did");


// bind the parameter values
$stmt->bindParam(':did', $_POST['did']);

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
    <title>User Registration</title>
    <link rel="stylesheet" href="./Userregistration.css" />
  </head>
  <body>
    <header>
      <img src="./Hospital logo.png" alt="" id="company-logo" />
      <nav class="navigation">
        <a href="./logout.php">Logout</a>
        <a href="./Admin.php">Back</a>
      </nav>
    </header>

    <div class="wrapper">
      <div class="form-box register">
        <h2>User Registration</h2>
        <form action="insertdoctorupdate.php" method="POST" autocomplete="off">
          <div class="input-box">
            <input type="text" readonly name="docid" value="<?php echo $row['did'];?>" />
            <label>ID</label>
          </div>
          <div class="input-box">
            <input
              type="text"
              required
              name="fullname"
              value="<?php echo $row['dfullname'];?>"
            />
            <label>Fullname</label>
          </div>
          
          <div class="input-box">
            <input
              type="text"
              required
              name="phone"
              value="<?php echo $row['dphone'];?>"
            />
            <label>Phone Number</label>
          </div>
          
          <div class="remember-forgot">
            <label
              ><input type="checkbox" />I agree to the terms & conditions</label
            >
          </div>
          <button type="submit" class="btn" name="doctor">Update</button>
          <div class="login-register"></div>
        </form>
      </div>
    </div>
    <style>
      .inputgroup {
        width: 90%;
        height: 50px;
        border-bottom: 2px solid#0062cc;
        margin: 30px 0;
      }
      .inputgroup label {
        transform: translateY(-50%);
        font-size: 1em;
        color: #0062cc;
        font-weight: 500;
        pointer-events: none;
        transition: 0.5s;
      }
      .inputgroup input,
      #gender {
        width: 100%;
        height: 100%;
        background: transparent;
        border: none;
        outline: none;
        font-size: 1em;
        font-weight: 600;
        padding: 0 35px 0 5px;
        color: #0062cc;
      }
    </style>
  </body>
</html>
