<?php
include ("link.php");
if(isset($_POST["addrelese"]))
    $pharid = $_POST["pharid"];
    $treid = $_POST["treid"];
    $medid = $_POST["medid"];
    $doses = $_POST["doses"];
    //checking if the fields are not left empty
    if(!empty($treid) || !empty($pharid) || 
    !empty($doses)|| 
    !empty($medid)){
        if(mysqli_connect_error()){
            die('Connect Error(' .mysqli_connect_errno(). ')'. mysqli_connect_error());


        }else{
            $SELECT = "SELECT tid From payment Where tid = ? Limit 1";
            $INSERT = "INSERT INTO `releasedmedecine`(`pid`, `tid`, `mid`,`doses`) 
            VALUES (?,?,?,?)";
            
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
                $stmnt->bind_param("iiis", $pharid,$treid,$medid,$doses);
                $stmnt->execute();
                echo"<script> alert('Release Record Saved!!');</script>";
                ?>
        <script type="text/javascript">
        window.location.href="Releasemedecine.php"</script>
        <?php
            }else{
                echo"<script> alert('Treatment Id Nod Found');</script>";

                ?>
        <script type="text/javascript">
        window.location.href="Releasemedecine.php"</script>
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