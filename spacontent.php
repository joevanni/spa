
<?php
include"db.php";

if(isset($_GET['id'])){
	$id =preg_replace('#[^0-9]#', '', $_GET['id']);

	$sql ="SELECT * FROM registered_cst WHERE id='$id' LIMIT 1";
	$query = mysqli_query($dbConn, $sql);
	$imagecount = mysqli_num_rows($query);
	if($imagecount >0){

		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){

			$image = $row["image"];
 			$spa_name = $row["spa_name"];
 			$email = $row["email"];
 			$description = $row["description"];
 			$Landmark = $row["landmark"];
 			$address = $row["address"];
 			$landline =$row["landline"];
 			$mobile= $row["mobile"];
 			$hours = $row["hours"];
 			$membership= $row["membership"];
 			$area = $row["area"];
 			$Therapist = $row["type"];
 			$price = $row["price"];

 			


		}	

	}
	else
	{
		echo "the image is not exist";
		exit();
	}
}
else
{
	echo "missing";
	exit();
}

mysqli_close($dbConn);
?>

<html>
<title>Spa Content</title>
<link href="css/header.css" rel="stylesheet" type="text/css">
<link href="css/promos.css" rel="stylesheet" type="text/css">
<link href="css/content.css" rel="stylesheet" type="text/css">
<link href="css/submit.css" rel="stylesheet" type="text/css">
<!--<link href="css/pons.css" rel="stylesheet" media="only screen and (min-width:768px) and
  (max-width:1340px)" type="text/css">
  <link href="css/phone.css" rel="stylesheet" media="only screen and (min-width:360px) and
  (max-width:690px)" type="text/css">-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/JavaScript">

// prepare the form when the DOM is ready 
$(document).ready(function() {
	$("#imagecon li img").hover(function(){
		$('#main-img').attr('src',$(this).attr('src').replace('thumb/', ''));
	});
	var imgSwap = [];
	 $("#imagecon li img").each(function(){
		imgUrl = this.src.replace('thumb/', '');
		imgSwap.push(imgUrl);
	});
	$(imgSwap).preload();
});
$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src = this;
    });
}
</script>

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

<div id="maps" class="anothermap">
<p><center>Find a spa anywhere in the Philippines?<br>Choose the navigation below. </p></center>
	<img id="mapadjust" src="image/mapa.png">

	<p id="text">Choose place here.</p>
	<select id="filter">
<option value="lowHigh">Luzon</option>
<option value="highLow">Visayas</option>
<option value="highLow">Mindanao</option>
</select><br><br>
</div>	
<?php
?>
</div>
<div id="spacontent">
<div id="for">
<p><a href="about.php">About</p></a>
<p><a href="contact.php">Contact us</p></a>

</div>
<form method="GET" action="search.php" id="adjuster">	
<input type="text" id="search" name="search" placeholder="Search spa...">
<input type="submit" id="submit" name="submit" value="">
</form><br><br>
<form id="formform" method="get" action="information.php">
<br><br>
<div id="spadexcription">
<p style="font-weight: bold;font-size:20px;">&nbsp; &nbsp;<?php echo $spa_name;?></p>
<p id="walak"> <?php echo $description;?></p>
</div>
<div id="imagecon">
<?php
 echo '<center><img src=data:image;base64,'.$image.'   alt="" id="main-img";></center>
	'?>


<p id="locate">Another featured Location</p>
<ul>
	  <li><?php
 echo '<img src=data:image;base64,'.$image.'  height="100" width="100" alt="";>
	'?></li>
	  <li><img src="image/thumb/img_2.jpg" alt="" /></li>
	  <li><img src="image/thumb/img_3.jpg" alt="" /></li>
	  <li><img src="image/thumb/img_4.jpg" alt="" /></li>
	  <li><img src="image/thumb/img_5.jpg" alt="" /></li>
	  
	</ul>
	


</div>
<div id="record">

	<table  style="border:2px solid #cccccc;background-color:rgba(255,128,0,1) ;" >
		<tr id="entrytable">
			<td colspan="2" height="40" style="text-align:center;">Spa Information</td>
		</tr>
		<tr>
		<td width="150" class="color"><p>Spa Name:</p></td>
		<td class="report"><p><?php echo $spa_name;?></p></td>
		</tr>
		<tr>
		<td width="150" class="color"><p>Operational:</p></td>
		<td class="report"><p>Open	</p></td>

		</tr>
		<tr>
		<td width="150" class="color"><p>Address:</p></td>
		<td class="report"><p><?php echo $address;?></p></td>
		</tr>
			<tr>
		<td width="150" class="color"><p>Landmark:</p></td>
		<td class="report"><p><?php echo $Landmark;?></p></td>
		</tr>
		<tr>
		<td width="150" class="color"><p>Operating Hours:</p></td>
		<td class="report"><p><?php echo $hours;?></p></td>

		</tr>
		<tr>
		<td width="150" class="color"><p>Landline Number:</p></td>
		<td class="report"><p><?php echo $landline;?></p></td>
		</tr>
		<tr>
		<td width="150" class="color"><p>Mobile Number:</p></td>
		<td class="report"><p><?php echo $mobile;?></p></td>
		</tr>
		<tr>
		<td width="150" class="color"><p>Membership:</p></td>
		<td class="report"><p><?php echo $membership;?></p></td>
		</tr>
			<tr>
		<td width="150" class="color"><p>Therapist:</p></td>
		<td class="report"><p><?php echo $Therapist;?></p></td>
		</tr>
			<tr>
		<td width="150" class="color"><p>Treatment Area:</p></td>
		<td class="report"><p><?php echo $area;?></p></td>
		</tr>
			<tr>
		<td width="150" class="color"><p>Price:</p></td>
		<td class="report"><p><?php echo $price;?></p></td>
		</tr>
	</table>
	</form>
	<br><br><br>
<div id="commentform">
<form id="comment" method="post"> 

Comment Here!<br><br><textarea id="commentbox" name="commentbox"></textarea>
<br><br>
<input type="submit" id="submitcomment" name="submitpost" value="Post Comment">







</form>
</div>
</div>
</div>

<div id="contentfooter">
<br>
	<p style="color:#fff;text-align:left;margin-left:35px;">@ 2017 Island Spot Philippines. All rights reserved.</p>
<div id="facebookstyle">
<p>About</p>
<p><a href="termanduse.php">Term and Use</p></a>
<p >Follow us at &nbsp; &nbsp;<a href="#"><img id="facebook" src="image/book.png"></a></p></div>
	</div>

</div>
