<?php
include"../../db.php";

if(isset($_POST['submit']) && isset($_FILES['image']))
{


	if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
	{
		echo "please choose image ";

	}
	else{
		$image = addslashes($_FILES['image']['tmp_name']);
		$name = addslashes($_FILES['image']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
		
}


$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];

if(!empty($_FILES['image']['name']))
{
$sql = "UPDATE promo SET name = '$name', image='$image', description='$description' WHERE id='$id'";
}
else {
	$sql = "UPDATE promo SET name = '$name',  description='$description' WHERE id='$id'";
}
$result = mysqli_query($dbConn,$sql);

header("location:index.php?remark=successfully change");

}

?>


<!DOCTYPE html>
<html>
<head>
<link href="../../css/admin.css" rel="stylesheet" type="text/css">
<link href="../../css/client.css" rel="stylesheet" type="text/css">
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
<li><a href="../home.php">HOME</a></li>
<li><a href="../clientinfo.php">CLIENT INFO</a></li>
<li><a href="../register.php">CLIENT REGISTERED</a></li>
<li><a href="index.php">PROMO</a></li>
<li><a href="">LATEST NEWS</a></li>
<li><a href="logoutpromo.php">LOG OUT</a></li>
</ul>
</nav>
</div>


</div>
<div id="promo">
<?php
include"../../db.php";

$id =$_GET['id'];
$sql = "SELECT * FROM promo WHERE id='$id'";
$query =mysqli_query($dbConn, $sql);

while ($row = mysqli_fetch_array ($query, MYSQLI_ASSOC)){
	$id = $row['id'];
      $image = $row['image'];
      $name = $row['name'];
      $description = $row['description'];


?>

<center><form class="form" method="POST" action="ed.php" enctype = "multipart/form-data">
<h2>Update Promo</h2>
<hr/>
<input class="input" type="hidden" name="id" value="<?php echo $row['id']; ?>" />
<br />
<input class="input" type="text" name="name" value="<?php echo $row['name']; ?>" />
<br><br><br>

<?php
 echo '<img src=data:image;base64,'.$row['image'].'  height="155" width="300" alt="" id="main-img";>
	'?>
<br/>
<br/>

<span style="margin-left:105px;"><input class="input" type="file" name="image"  /></span>
<br />
<br/>
<label>Description:</label><br />

<textarea id="de" name="description" /><?php echo $row['description']; ?></textarea>

<br/>
<br/>
<input class="submit" type="submit" name="submit" value="update" />
<input type="button" class="button" value="Cancel" onclick ="window.location.href='index.php';"
<br>
<br>
<br>
</form></center>
<?php
}
?>

</div>
<div id="footeredit"><p>all right reseve @ ISLAND SPOT 2017</p></div>
</body>
</html>





