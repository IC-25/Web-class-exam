<<?php
session_start();

if (!isset($_SESSION["username"])){
  header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=\, initial-scale=1.0" />
    <title>Release Medecine</title>
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
        <h2>Release Medecine</h2>
        <form action="insertrelease.php"method="POST">
          <div class="input-box">
            <input type="number" required name="pharid"
            value="<?php echo $_SESSION['pid']?>"readonly/>
            <label>Pharmacist Id</label>
          </div>
          <div class="input-box">
            <input type="number" required name="treid"/>
            <label>Treatment ID</label>
          </div>
          <div class="input-box">
            <input type="number" required name="medid"/>
            <label>Medecine ID</label>
          </div>
          <div class="input-box">
            <input type="text" required name="doses"/>
            <label>Doses</label>
          </div>
          <div class="remember-forgot">
            <label
              ><input type="checkbox" />I agree to the terms & conditions</label
            >
          </div>
          <button type="submit" class="btn" name="addrelese">Add</button>
          <div class="login-register"></div>
        </form>
      </div>

      <div class="doctorconte">
          <div class="search">
    <form action="Releasemedecine.php" method="POST">
    <input type="search" name="search" id="searchfield" placeholder="Search Medecine Id...">
    <button type="submit" class="mybutton" name="searchbtn">Search</button>
    </form>
</div>
      <div class="dashpicCard">
      
              <?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ishimweinnocent_html_db221011634";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);  
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<table>
          <tr class="first-low">
            <td>PATIENT.ID</td>
            <td>MEDECINE.ID</td>
            <td>DOSES</td>
            <td>Actions</td>
          </tr>

            <?php 
if(isset($_POST["searchbtn"])){
  $search = $_POST["search"];
$sql = "SELECT * FROM `releasedmedecine` WHERE pid LIKE '%$search%' OR mid LIKE '%$search%'  OR
doses LIKE '%$search%'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?php echo $row["pid"] ?></td>
        <td><?php echo $row["mid"] ?></td>
        <td><?php echo $row["doses"] ?></td>
        <td id="bttn">
        <form method="post" action="releaseDelete.php">
          <input type="hidden" name="reid" value="<?php echo $row['reid']?>">
          <input type="submit" id="updatebtn" value="Delete"></form>
      </td>
      </tr>
      <?php 
       }
    } else {
      echo "0 results";
    }
  }?>
</table>
       
      </div>
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
.inputgroup input,#gender {
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
.search form{
        display: flex;
        width: 100%;
        height: 100px;
        margin-left: 100px;
        margin-top: 10px;
        gap: 20px;
      }
      #searchfield{
        height: 50px;
        width: 300px;
        margin-top: 30px;
        border-radius: 10px;
        background: transparent;
        color: black;
      }
      .mybutton{
        height: 40px;
        width: 100px;
        margin-top: 30px;
        border-radius: 10px;
        background: blue;
        opacity: .8;
        color: white;
        border: none;
        cursor:pointer;
        outline:none;
        box-shadow: 0 3px white;
      }
    .doctorconte{
      display:flex;
      flex-direction:column;
    }
  #bttn{
    display:flex;
    flex-direction: row;
    gap:6px;
  }

  </style>
  </body>
</html>
