<?php
include 'link.php';
if(isset($_POST["login"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    

   
    

    $query = "SELECT * FROM users WHERE username = '".$username."' and password = '".$password."'
    and type = '".$role."'";
    $result = mysqli_query($conn, $query);
    

if($result){
    while($row=mysqli_fetch_array($result)){
        $_SESSION["username"] = $row ['username'];
        $_SESSION["password"] = $row ['password'];
        $_SESSION["rid"] = $row ['rid'];
        $_SESSION["pid"] = $row ['pid'];
        $_SESSION["did"] = $row ['did'];
        $_SESSION["uid"] = $row ['uid'];
        echo'<script type="text/javascript">alert(" ' .$row['type'].' Login Success")</script>';
        $role = $row['type'];
    
    if($role=="Admin"){
        ?>
        <script type="text/javascript">
        window.location.href="Admin.php"</script>
        <?php

    }
     
    else if($role=="Reception"){
        
        ?>
        <script type="text/javascript">
        window.location.href="Receptionlandingpage.php"</script>
        <?php
    }
    else if($role=="Pharmacist"){
        
        ?>
        <script type="text/javascript">
        window.location.href="pharmacistlandingpage.php"</script>
        <?php
    }
    else if($role=="Doctor"){
        
        ?>
        <script type="text/javascript">
        window.location.href="doctorlandingpage.php"</script>
        <?php
    }
    else{
        echo'<script type="text/javascript">alert("username and Password Donot Match")</script>';
    }
}
   
}
else{
    echo 'No Result';
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>HOSPITAL MANAGEMENT SYSTEM</title>
  </head>
  <body>
    <header>
      <img src="./Hospital logo.png" alt="" id="company-logo" />
      <nav class="navigation">
        <button class="btnLogin-popup">Login</button>
      </nav>
    </header>

    <div class="wrapper">
      <span class="icon-close">
        <ion-icon name="close"></ion-icon> 
      </span>

      <div class="form-box login">
        <h2>Login</h2>
        <form action="index.php" method ="POST" autocomplete="off">
          <div class="input-box" >
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="username" required />
            <label>Username</label>
          </div>
          <div class="input-box" >
            <span class="icon"><ion-icon name="lock-open"></ion-icon></span>
            <input type="password" name="password" required />
            <label>Password</label>
          </div>
          <div class="inputgroup">
            <label for="">Role</label>
            <select name="role" id="role">
              <option value="">-----</option>
              <option value="Admin">Admin</option>
              <option value="Pharmacist">Pharmacist</option>
              <option value="Doctor">Doctor</option>
              <option value="Reception">Reception</option>
            </select>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox" />Remember me</label>
            <a href="#">Forgot password?</a>
          </div>
          <button type="submit" class="btn" name="login">Login</button>
          <div class="login-register">
            <p>
          
              <a href="#" class="register-link"></a>
            </p>
          </div>
        </form>
      </div>

      <div class="form-box register">
        
          </div>
          
          <div class="login-register">
            <p>
            <a href="#" class="login-link"></a>
            </p>
          </div>
        </form>
      </div>
    </div>

    <div class="homecontent">
      <h1>
        Provide An Eceptional <br />
        Patient Experience
      </h1>
      <p>
        Better Quality of Care: E-health tools can improve <br />
        the quality of care by providing healthcare professionals <br />
        with access to patient information and medical records,<br />
        enabling them to make more informed decisions <br />
        and offer more personalized care.
      </p>

      <a href="./about.php"
        ><button type="submit" class="btn">READ MORE</button></a
      >
    </div>

    <!-- footer -->
    <script src="script.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
