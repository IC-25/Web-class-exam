<?php
include ("link.php");
if(isset($_POST["record"]))
    $docid = $_POST['docid'];
    $pecid = $_POST['pecid'];
    $symptoms = $_POST['symptoms'];
    $desease = $_POST['desease'];
    $medecine = $_POST['medecine'];
    $doses = $_POST['doses'];
    //checking if the fields are not left empty
    if(!empty($docid) || !empty($pecid) || 
    !empty($symptoms) ||!empty($desease) ||!empty($medecine) || 
    !empty($doses)){
        if(mysqli_connect_error()){
            die('Connect Error(' .mysqli_connect_errno(). ')'. mysqli_connect_error());


        }else{
            $SELECT = "SELECT peid From treatment Where peid = ? Limit 1";
            $INSERT = "INSERT INTO `treatment`(`did`, `peid`, `tsymptom`, `tdeseases`,
            `medcine`,`doses`) 
            VALUES (?,?,?,?,?,?)";
            
            //prepare statement

            $stmnt = $conn->prepare($SELECT);
            $stmnt->bind_param("i", $pecid);
            $stmnt->execute();
            $stmnt->bind_result($pecid);
            $stmnt->store_result();
            $rnum = $stmnt->num_rows;

            if($rnum==0){
                $stmnt->close();

                $stmnt = $conn->prepare($INSERT);
                $stmnt->bind_param("iissss", $docid,$pecid,$symptoms,$desease,$medecine
                ,$doses);
                $stmnt->execute();
                echo"<script> alert('Treatment registered!!');</script>";
                ?>
        <script type="text/javascript">
        window.location.href="Treatmentrecord.php"</script>
        <?php
            }else{
                echo"<script> alert('National Id Already Registered!! Please Edite Instead');</script>";

                ?>
        <script type="text/javascript">
        window.location.href="Treatmentrecord.php"</script>
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