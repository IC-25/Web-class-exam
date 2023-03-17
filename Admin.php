<?php
session_start();

if (!isset($_SESSION["username"])){
  header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Landing page</title>
    <link rel="stylesheet" href="./Adminlandingpage.css">
</head>
<body>
    <header>
      <img src="./Hospital logo.png" alt="" id="company-logo" />
      <nav class="navigation">
         <H3>WELCOME TO ADMIN PAGE</H3>
        <ul>
          <li><a href="#">USER REGISTRATION</a>
          <div class="dropdown">
            <ul>
              <li><a href="doctorreg.php">Doctor</a></li>
              <li><a href="pharmacistreg.php">Pharmacist</a></li>
              <li><a href="receptionreg.php">Receptionist</a></li>
            </ul>
          </div>
        </li>
        </ul>
        <a href="./logout.php">Logout</a>
      </nav>
    </header>



    <section id="footerland">
        <div class="container footer">
            <h1>HMS</h1>
          </Link>
        </div>
        <div class="container footer">
          <p>
            Quality Service Makes Different <br>
            Terms Of Service <br>
            Privacy Policy <br>
            <p>&copy;IC-25</p>
          </p>
        </div>
        <div class="container footer">
          <p>
            <b> NOT QUITE READY FOR SYSTEM</b> <br>
            Join our online HMS no-code community for free.No spam.Ever{" "}
            <br>
            <input
              id="footerinput"
              type="Email"
              placeholder="Enter your Email"
            />
            <button id="footerbutton">Subscribe</button> <br>
          </p>
        </div>
      </section>
      <style>
        .navigation{
        display: flex;
        margin-left: 130px;
    }
    .navigation ul li{
        list-style: none;
        position: relative;
        color: black;
       }
       .navigation ul li a{
        text-decoration: none;
        transition: all 0.3s;
        
       }
       .navigation ul li a:hover{
        color: #FF6600;
       }
       .dropdown{
        display: none;
       }
       .navigation ul li:hover .dropdown {
        display: block;
        position: absolute;
        right: -80px;
        top: 120%;

       }
      </style>
</body>
</html>