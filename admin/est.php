<?php
include"../db.php";

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

$fname= $_POST['fullname'];
$email=$_POST['email'];
$spaname=$_POST['spaname'];
$description=$_POST['description'];
$landmark=$_POST['landmark'];
$address=$_POST['address'];
$landline=$_POST['landline'];
$mobile=$_POST['mobile'];
$operating=$_POST['hours'];
$membership=$_POST['membership'];
$area=$_POST['area'];
$type=$_POST['type'];
$price=$_POST['price'];

move_uploaded_file($_FILES['image']['tmp_name']	,"../register_images/".$_FILES['image']['name']);

if(!empty($_FILES['image']['name']))
{


$sql = "UPDATE registered_cst SET f_name='$fname', email='$email', spa_name='$spaname',description='$description', landmark = '$landmark', address = '$address', landline = '$landline', mobile= '$mobile', hours = '$operating', membership = '$membership', area = '$area', type = '$type', price = '$price', image = '$image' WHERE id='$id'";
}
else{
	$sql = "UPDATE registered_cst SET f_name='$fname', email='$email', spa_name='$spaname',description='$description', landmark = '$landmark', address = '$address', landline = '$landline', mobile= '$mobile', hours = '$operating', membership = '$membership', area = '$area', type = '$type', price = '$price'  WHERE id='$id'";
}
$result = mysqli_query($dbConn,$sql);

header("location:register.php?remark=successfully change");

}

?>


<!DOCTYPE html>
<html>
<head>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<link href="../css/client.css" rel="stylesheet" type="text/css"><link href="../css/client.css" rel="stylesheet" type="text/css">
<link href="../css/promos.css" rel="stylesheet" type="text/css">
<link href="../css/submit.css" rel="stylesheet" type="text/css">
</head>
<title>
	Edit Promo
</title>
<body>
<div id="header">
<style>
#cho
{
	color:rgb(172,83,13)!important;
	background-color: red;
}
</style>
<img src="image/adminlogo.png" id="admilogoadjust">
<div id="menuadjustment">
<nav class="menu">
<ul class="navigate">
<li><a href="home.php">HOME</a></li>
<li><a href="clientinfo.php">CLIENT INFO</a></li>
<li><a href="register.php">CLIENT REGISTERED</a></li>
<li><a href="promo/index.php">PROMO</a></li>
<li><a href="">LATEST NEWS</a></li>
<li><a href="logout.php">LOG OUT</a></li>
</ul>
</nav>
</div>


</div>
<div id="promo">
<?php
include"../db.php";

$id =$_GET['id'];
$sql = "SELECT * FROM registered_cst WHERE id='$id'";
$query = mysqli_query($dbConn, $sql);

while ($row = mysqli_fetch_array ($query, MYSQLI_ASSOC)){
	
	$id = $row['id'];
      $fname = $row['f_name'];
      $image = $row['image'];
      $spa_name = $row['spa_name'];
      $email = $row['email'];
      $description = $row['description'];
      $Landmark = $row['landmark'];
      $address = $row['address'];
      $landline =$row['landline'];
      $mobile= $row['mobile'];
      $hours = $row['hours'];
      $membership= $row['membership'];
      $area = $row['area'];
      $Therapist = $row['type'];
      $price = $row['price'];


?>

<form method="POST" action="est.php"  id="formcontainer" enctype="multipart/form-data" ><br>
<center><h2 >Update Client</h2></center>
<hr/>
<input class="input" type="hidden" name="id" value="<?php echo $row['id']; ?>" />
	<p>Name:<br><input type="text" name="fullname" id="fname" value="<?php echo $row['f_name']; ?>" ><br></p>
	<p>Email:<br><input type="text" name="email" id="email" value ="<?php echo $row['email']; ?>"><br></p>
	<p>Spa Name:<br><input type="text" name="spaname" id="spaname" value="<?php echo $row['spa_name']; ?>"><br></p>
	<p>Spa Description:<br><textarea name="description" id="des"><?php echo $row['description']; ?></textarea><br></p>
	<p>Landmark:<br><input type="text" name="landmark" id="landmark" value="<?php echo $row['landmark']; ?>"><br></p>
	<p>Address:<br><textarea  name="address" id="address" ><?php echo $row['address']; ?></textarea><br></p>
	<p>Landline Number:<br><input type="text" name="landline" id="landline" value="<?php echo $row['landline']; ?>"><br></p>	
		<p>Mobile Number:<br><input type="text" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>"></p>
		<br>		
		<div id="editaccommodation"	>
	
		
			<p>OPerating Hour<br><input type="text" name="hours" id="hours" value="<?php echo $row['hours']; ?>"></p>
			<p>Membership:<br><select id="membership" name="membership"> 
<option value="<?php echo $row['membership'];?>"><?php echo $row['membership'];?>&nbsp;*Chosen* </option>	

<option value="none">none</option>
<option value="required">required</option>
<option value="optional">optional</option>
</select><br></p>
<p>Treatment area type:<br><select id="area" name="area" >
<option value="<?php echo $row['area']; ?>"><?php echo $row['area']; ?>&nbsp;*Chosen*</option>
<option value="Home and Hotel Services Only">Home and Hotel Services Only</option>
<option value="Cubicles Only">Cubicles Only</option>
<option value="Private and Couple Rooms">Private and Couple Rooms</option>
<option value="Private and VIP Rooms">Private and VIP Rooms</option>
</select>
	<p>Therapist Type:<br><select id="type" name="type">
	<option value = "<?php echo $row['type']; ?>"><?php echo $row['type']; ?>&nbsp;*Chosen*</option>
<option value="male">Male Only</option>
<option value="female">Female Only</option>
<option value="male and female">Male and Female</option>
</select><br><p>
<p>Price:(format P150.00 to P25.000)<br> <input type="text" name="price" id="price" value ="<?php echo $row['price']; ?>"></p>

<br>
<?php
 echo '<img src=data:image;base64,'.$row['image'].'  height="110" width="270" alt="" id="main-img";>
	'?>
	<br><br>
<p><input type="file" name="image"></p>
<br><br>


<input type="submit" name="submit" value="Update"  id="submitlog">
<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='register.php';" class="box">
<br>
<br>
<br>
<?php
}
?>

</div>
</div>
<div id="editregister"><p>all right reseve @ ISLAND SPOT 2017</p></div>
</body>
</html>