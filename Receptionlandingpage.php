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
    <title>Reception Landing page</title>
    <link rel="stylesheet" href="./Receptionlandingpage.css">
</head>
<body>
    <header>
      <img src="./Hospital logo.png" alt="" id="company-logo" />
      <nav class="navigation">
         <H3>WELCOME TO Receptionist PAGE</H3>
        <a href="./Patientregistration.php">PATIENT REGISTRATION</a>
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
</body>
</html>