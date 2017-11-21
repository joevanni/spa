<?php

include "../db.php";

$id = $_GET["id"];


$insert ="INSERT INTO registered_cst(f_name,email,spa_name,description,landmark,address,landline,mobile,hours,membership,area,type,price,image) SELECT name,email,spa_name,spa_discription,landmark,address,landline,mobile,op_hours,membership,treatment_area,therapist_type,price,image FROM cst_record WHERE id=$id ";

$result=mysqli_query($dbConn,$insert)
      or die("Error in pushing".mysqli_error($dbConn));
      header("location:clientinfo.php?remarks=successfull");
    mysqli_close($dbConn);

		



?>
