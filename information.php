<?php
include_once 'db.php';
function getDetail($id)
{
$_SESSION['id'] = $_SERVER['REQUEST_URI'];

$sql="SELECT * FROM cst_record WHERE id=$id";

$query = mysqli_query($sql,$dbConn);

$row = mysqli_fetch_array($query);
extract($row);
$row["spa_name"] = nl2br($row["spa_name"]);

}

?>