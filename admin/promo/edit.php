<?php

require("../../db.php");

$id = $_REQUEST['id'];

$sql = "SELECT * FROM promo WHERE id = $id";

$query = mysqli_query($dbConn, $sql);
$row = mysqli_fetch_array($query , MYSQLI_ASSOC);
if(!$query)
{
die("error:no fetch");
}
  
      $image = $row['image'];
      $description = $row['description'];


if(isset($_POST['submit'])) 
{

	$id = $_POST['id'];
	$image = $_POST['image'];
	$description = $_POST['textarea'];

	$sql = "UPDATE promo SET image = '$image', description = '$description' WHERE id ='$id'";
	$result = mysqli_query($dbConn, $sql)
	or die(mysql_error());
	echo"save sucessfully!";

	header("Location:index.php");
	
	}
	mysqli_close($dbConn);
?>

<!DOCTYPE html>
<html>
<head>
<link href="../../css/admin.css" rel="stylesheet" type="text/css">
<link href="../../css/client.css" rel="stylesheet" type="text/css"><link href="../../css/client.css" rel="stylesheet" type="text/css">
</head>
<title>
	Edit Promo
</title>
<body>
<div id="header">

<img src="../image/adminlogo.png" id="admilogoadjust">
<div id="menuadjustment">
<nav class="menu">
<ul class="navigate">
<li><a href="home.php">HOME</a></li>
<li><a href="clientinfo.php">CLIENT INFO</a></li>
<li><a href="register.php">CLIENT REGISTERED</a></li>
<li><a href="">PROMO</a></li>
<li><a href="">LATEST NEWS</a></li>
<li><a href="logoutpromo.php">LOG OUT</a></li>
</ul>
</nav>
</div>


</div>
<div id="promo">
<center><h2><p>Edit Promo Information</p></h2>
<form  id="add" action="edit.php" method="POST" enctype="multipart/form-data">
<input type="file" id="file" name="image" value="<?php echo $image; ?>"><br><br>
Description:<br>
<textarea id="textarea" name="textarea" value="<?php echo $description; ?>"></textarea><br><br>
<input type="submit" id="submit" name="submit" value="submit">&nbsp;
<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">
</form></center>
</div>
</body>
</html>