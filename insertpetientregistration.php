<?php
include ("link.php");
if(isset($_POST["add"]))
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $insurance = $_POST['insurance'];
    $nationalid = $_POST['nationalid'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    //checking if the fields are not left empty
    if(!empty($fullname) || !empty($gender) || 
    !empty($phone) ||!empty($age) ||!empty($insurance) || 
    !empty($nationalid) ||!empty($address)){
        if(mysqli_connect_error()){
            die('Connect Error(' .mysqli_connect_errno(). ')'. mysqli_connect_error());


        }else{
            $SELECT = "SELECT penationalid From petients Where penationalid = ? Limit 1";
            $INSERT = "INSERT INTO `petients`(`pefullname`, `pegender`, `peage`, `peinsurance`,
            `penationalid`,`pephone`,`peaddress`) 
            VALUES (?,?,?,?,?,?,?)";
            
            //prepare statement

            $stmnt = $conn->prepare($SELECT);
            $stmnt->bind_param("s", $nationalid);
            $stmnt->execute();
            $stmnt->bind_result($nationalid);
            $stmnt->store_result();
            $rnum = $stmnt->num_rows;

            if($rnum==0){
                $stmnt->close();

                $stmnt = $conn->prepare($INSERT);
                $stmnt->bind_param("ssisiis", $fullname,$gender,$age,$insurance,$nationalid
                ,$phone,$address);
                $stmnt->execute();
                echo"<script> alert('Petient registered!!');</script>";
                ?>
        <script type="text/javascript">
        window.location.href="Patientregistration.php"</script>
        <?php
            }else{
                echo"<script> alert('National Id Already Registered!! Please Edite Instead');</script>";

                ?>
        <script type="text/javascript">
        window.location.href="Patientregistration.php"</script>
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