<?php
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
        <form action="Registerdoctor.php" method="POST" autocomplete="off">
          <div class="input-box">
            <input type="text" readonly/>
            <label>ID</label>
          </div>
          <div class="input-box">
            <input type="text" required name="fullname" />
            <label>Fullname</label>
          </div>
          <div class="inputgroup">
            <label for="">Gender</label>
            <select name="gender" id="gender">
              <option value="">-----</option>
              <option value="M">M</option>
              <option value="F">F</option>
            </select>
          </div>
          <div class="input-box">
            <input type="text" required name="phone"/>
            <label>Phone Number</label>
          </div>
          <div class="input-box">
            <input type="text" required name="username"/>
            <label>Username</label>
          </div>
          <div class="input-box">
            <input type="text" required name="password"/>
            <label>Password</label>
          </div>
          <div class="remember-forgot">
            <label
              ><input type="checkbox" />I agree to the terms & conditions</label
            >
          </div>
          <button type="submit" class="btn" name="doctor">Add Doctor</button>
          <div class="login-register"></div>
        </form>
      </div>
      <div class="doctorconte">
  <div class="search">
    <form action="doctorreg.php" method="POST">
    <input type="search" name="search" id="searchfield" placeholder="Search Doctor Name...">
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
            <th>ID</th>
            <th>Fullname</th>
            <th>Gender</th>
            <th>P.number</th>
            <th>Username</th>
            <th>Password</th>
            <th>Actions</th>
          </tr>

            <?php 
if(isset($_POST["searchbtn"])){
  $search = $_POST["search"];
$sql = "SELECT * FROM `doctors` WHERE dfullname LIKE '%$search%' OR dphone LIKE '%$search%'  OR
dusername LIKE '%$search%'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?php echo $row["did"] ?></td>
        <td><?php echo $row["dfullname"] ?></td>
        <td><?php echo $row["dgender"] ?></td>
        <td><?php echo $row["dphone"] ?></td>
        <td><?php echo $row["dusername"] ?></td>
        <td><?php echo $row["dpassword"] ?></td>
        <td id="bttn"><form method="post" action="doctorUpdate.php">
          <input type="hidden" name="did" value="<?php echo $row['did']?>">
        <input type="submit" id="updatebtn" value="Update"></form>
        <form method="post" action="doctorDelete.php">
          <input type="hidden" name="did" value="<?php echo $row['did']?>">
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
  </body>
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
  }

  </style>
  </body>
</html>  