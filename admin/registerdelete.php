<?php
include"../db.php";

$id =$_GET['id'];

$sql="DELETE FROM registered_cst WHERE id = '$id'";

$result = mysqli_query($dbConn, $sql);

header("location:register.php?remark = successfully deleted");

?>