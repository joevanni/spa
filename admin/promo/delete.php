<?php
include"../../db.php";

$id =$_GET['id'];

$sql="DELETE FROM promo WHERE id = '$id'";

$result = mysqli_query($dbConn, $sql);

header("location:index.php?remark = successfully deleted");

?>