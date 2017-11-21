<?php
session_start();
if(isset($_SESSION["user"])){
	header("location:home.php");
	exit();

}
?>
<?php
include "../db.php";
if(isset($_POST["password"]) & isset($_POST["user"])){

	$username = $_POST["user"];
	$password = $_POST["password"];

	

	$sql ="SELECT id FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
	$query = mysqli_query($dbConn, $sql);
	$count = mysqli_num_rows($query);
	if($count == 1){
		while($row = mysqli_fetch_array($query)){
			$id =$row["id"];
		}
		$_SESSION["id"] =$id;
		$_SESSION["user"] = $username;
		$_SESSION["password"] = $password;
		header("location:home.php");
		exit();

	}
	else
	{
		echo 'no info <a href="index.php">here!</a>';
		exit();
	}
}

mysqli_close($dbConn);

?>
<style type="text/css">
	
#user
{
	font-size: 18px;
}
#password
{
	font-size: 18px;
}
#submit
{
	font-size: 18px;
}

</style>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<html>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<link  href="../css/responsive.css" rel="stylesheet" media="screen and(max-width:900px)">	
<body>
<div id="background">
	<center><div id = "logo">
	<form id="adminarea" method="post" action="index.php">
	<input type="text" id="user" name="user" value="" placeholder="Username"><br><br><br>
	<input type="password" id="password" name="password" value="" placeholder="Password"><br><br>
	<input type="submit" id="submit" name="submit" value="Login">

	</div></center>
	</form>

</div>


</body>
</html>