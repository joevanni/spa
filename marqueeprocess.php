
<style>
#marqu 
{
	display:inline;
	text-decoration: none!important;
	margin-left: 15px;
	text-align: center;
	position: relative;
	height: 42px;
	
	
	

	
}
#marqu  a
{
	text-decoration: none;
	color:rgb(64,58,57);
	text-align: center;
}
#marqu  a:hover
{
	color:rgb(172,83,13);
}
</style>



<?php

include_once("db.php");


$sql = "SELECT * FROM registered_cst ORDER BY id DESC LIMIT 0,5 ";

$result = mysqli_query($dbConn,$sql);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{

	$id =$row["id"];
	$spa_name = $row["spa_name"];


	echo'<div id="marqu"><a href="spacontent.php?id='.$id.'">&#9658;'.$spa_name.'</a></div>';

}














?>