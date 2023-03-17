<?php
include ("link.php");
if(isset($_POST["doctor"]))
    $fullname = $_POST["fullname"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    //checking if the fields are not left empty
    if(!empty($fullname) || !empty($gender) || 
    !empty($phone) ||!empty($username) ||!empty($password) ){
        if(mysqli_connect_error()){
            die('Connect Error(' .mysqli_connect_errno(). ')'. mysqli_connect_error());


        }else{
            $SELECT = "SELECT dusername From doctors Where dusername = ? Limit 1";
            $INSERT = "INSERT INTO `doctors`(`dfullname`, `dgender`, `dphone`, `dusername`, `dpassword`) 
            VALUES (?,?,?,?,?)";
            
            //prepare statement

            $stmnt = $conn->prepare($SELECT);
            $stmnt->bind_param("s", $username);
            $stmnt->execute();
            $stmnt->bind_result($username);
            $stmnt->store_result();
            $rnum = $stmnt->num_rows;

            if($rnum==0){
                $stmnt->close();

                $stmnt = $conn->prepare($INSERT);
                $stmnt->bind_param("ssiss", $fullname,$gender,$phone,$username,$password);
                $stmnt->execute();
                echo"<script> alert('Data have Saved!!');</script>";
                ?>
        <script type="text/javascript">
        window.location.href="doctorreg.php"</script>
        <?php
            }else{
                echo"<script> alert('Librarian Code Or Email Already Used!!');</script>";

                ?>
        <script type="text/javascript">
        window.location.href="doctorreg.php"</script>
        <?php
            }
            $stmnt->close();
            $conn->close();

        }
    }
        else{
            echo"All Fields Are Required";
            die();
        }
?>