<?php
include('db.php');

?>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<style>
#container 
{
	position: absolute;
	left:90px;
	top:100px;
	
	font-size: 22px;

}
#sizewidth
{
	width:700px;
	height:auto;

}
</style>
<title>Spa spahan</title>
</head>
<link href="css/table.css" rel="stylesheet" type="text/css">
<link href="css/header.css" rel="stylesheet" type="text/css">
<link href="css/content.css" rel="stylesheet" type="text/css">
<link href="css/pons.css" rel="stylesheet" media="only screen and (min-width:768px) and
  (max-width:1340px)" type="text/css">

  
<body>
<div id="background">
<div id="header"></div>
<div id="side">
	<img id="qwer" src="image/place.png" width="200" height="150">
<p><a href="index.php">Home</p></a>
<p><a href="promos.php">Promos</p></a>
<p><a href="">Home service</p></a>
<p><a href="">Latest News</p></a>
<p><a href="">Review</p></a>
<p><a href="">Marketing</p></a>
<p><a href="submit.php">Submit your spa</a></p>
<br>
<div id="maps">
<p><center>Find a spa anywhere in the Philippines?<br>Choose the navigation below. </p></center>
	<img id="mapadjust" src="image/mapa.png">

	<p id="text">Choose place here.</p><select id="filter">
<option value="lowHigh">Luzon</option>
<option value="highLow">Visayas</option>
<option value="highLow">Mindanao</option>
</select><br><br>
</div>	

</div>
<div id="content">
<div id="for">

<p><a href="about.php">About</p></a>
<p><a href="contact.php">Contact us</p></a>
</div><form id="adjuster" >
<input type="text" id="search" name="search" placeholder="Search spa...">
<input type="submit" id="submit" name="submit" value="">
</form>

<br><br><br><br><br><br>
<?php



$search = $_GET['search'];

$min_length = 3;

if(strlen($search) >= $min_length){

	$search = htmlspecialchars($search);

	$search = mysqli_real_escape_string($dbConn,$search);

	$search = explode (" ", $search);
	foreach ($search as $value) 
	$search =($value);
	$sql = "SELECT * FROM registered_cst WHERE spa_name LIKE '%".$search."%'";
	$query = mysqli_query($dbConn, $sql);

if(mysqli_num_rows($query)>0)
{
	echo '<table id="table2" width="160">';

	 	$it=3;
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){

		if ($it % 3 ==0){
            echo '<tr>';
        }
  $id = $row["id"];
  $image = $row["image"];
  $spa_name = $row["spa_name"];
 
  echo  '<td id="sizewidth">'.'<a href="spacontent.php?id='.$id.'"><img src="data:image;base64,'.$image.'"><p><center><div id="size">'.$spa_name.'</p></a></center></div>'.'</td>';
  if ($it % 12 == 0){
           
            echo '</tr>';
        }; 
        $it++; //$i = $i + 1 - counter + 1 
	}

	echo '</table>';

}

else
{
	 echo "<div id='container'>No result for <b>$search</b></div>";
}
}
else

{
	echo "<div id='container'>Minimum length for words is $min_length  </div>";

}




?>
</div>