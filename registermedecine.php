<?php
include ("link.php");
if(isset($_POST["medecine"]))
    $fullname = $_POST["fullname"];
    $price = $_POST["price"];
    $manidate = $_POST["manidate"];
    $expdate = $_POST["expdate"];
    $totalmed = $_POST["totalmed"];
    //checking if the fields are not left empty
    if(!empty($fullname) || !empty($price) || 
    !empty($manidate) ||!empty($expdate) ||!empty($totalmed) ){
        if(mysqli_connect_error()){
            die('Connect Error(' .mysqli_connect_errno(). ')'. mysqli_connect_error());


        }else{
            $SELECT = "SELECT mname From medecine Where mname = ? Limit 1";
            $INSERT = "INSERT INTO `medecine`(`mname`, `mprice_unit`, `mmfgdate`, `mexpdate`, `total_dose`) 
            VALUES (?,?,?,?,?)";
            
            //prepare statement

            $stmnt = $conn->prepare($SELECT);
            $stmnt->bind_param("s", $fullname);
            $stmnt->execute();
            $stmnt->bind_result($fullname);
            $stmnt->store_result();
            $rnum = $stmnt->num_rows;

            if($rnum==0){
                $stmnt->close();

                $stmnt = $conn->prepare($INSERT);
                $stmnt->bind_param("sssss", $fullname,$price,$manidate,$expdate,$totalmed);
                $stmnt->execute();
                echo"<script> alert('Medecine have Registered!!');</script>";
                ?>
        <script type="text/javascript">
        window.location.href="Medecinestock.php"</script>
        <?php
            }else{
                echo"<script> alert('Medecine name Exists, Update Instead!!');</script>";

                ?>
        <script type="text/javascript">
        window.location.href="Medecinestock.php"</script>
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