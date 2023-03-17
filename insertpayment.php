<?php
include ("link.php");
if(isset($_POST["addpay"]))
    $treid = $_POST["treid"];
    $paydate = $_POST["paydate"];
    $payamount = $_POST["payamount"];
    //checking if the fields are not left empty
    if(!empty($treid) || !empty($paydate) || 
    !empty($payamount)){
        if(mysqli_connect_error()){
            die('Connect Error(' .mysqli_connect_errno(). ')'. mysqli_connect_error());


        }else{
            $SELECT = "SELECT tid From treatment Where tid = ? Limit 1";
            $INSERT = "INSERT INTO `payment`(`tid`, `paydate`, `payamount`) 
            VALUES (?,?,?)";
            
            //prepare statement

            $stmnt = $conn->prepare($SELECT);
            $stmnt->bind_param("i", $treid);
            $stmnt->execute();
            $stmnt->bind_result($treid);
            $stmnt->store_result();
            $rnum = $stmnt->num_rows;

            if($rnum!==0){
                $stmnt->close();

                $stmnt = $conn->prepare($INSERT);
                $stmnt->bind_param("iss", $treid,$paydate,$payamount);
                $stmnt->execute();
                echo"<script> alert('Payment Record Saved!!');</script>";
                ?>
        <script type="text/javascript">
        window.location.href="Moneyrecord.php"</script>
        <?php
            }else{
                echo"<script> alert('Treatment Id Nod Found');</script>";

                ?>
        <script type="text/javascript">
        window.location.href="Moneyrecord.php"</script>
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