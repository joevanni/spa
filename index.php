<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=0, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width,  target-densitydpi=medium-dpi" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">

<title>Negros Spa</title>
</head>
<link href="css/table.css" rel="stylesheet" type="text/css">
<link href="css/header.css" rel="stylesheet" type="text/css">
<link href="css/content.css" rel="stylesheet" type="text/css">
<link href="css/pons.css" rel="stylesheet" media="only screen and (min-width:768px) and
  (max-width:1340px)" type="text/css">
<link href="css/phone.css" rel="stylesheet" media="only screen and (min-width:320px) and
  (max-width:690px)" type="text/css">
  
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





</div><form  action="search.php" method="GET" id="adjuster">
<input type="text" id="search" name="search" placeholder="Search spa...">
<input type="submit" id="submit" name="submit" value="">
</form>

<br><br><br><br><br>

<div id="news"><div style="">Latest Update:<div style="color:rgb(64,58,57);"></div></div></div><div id="zis"><marquee scrollamount="2" onmouseover="this.setAttribute('scrollamount', 0, 0);this.stop();" onmouseout="this.setAttribute('scrollamount', 2, 0);this.start();"><p><?php
require_once 'marqueeprocess.php';
?></p> </marquee></div><br><br>
<div id="sizewidth" ><br>
<?php
require_once 'imagecategory.php';


	?>
</div>
	
	
	 <center><div id = "pagination_controls"><?php echo $paginationCtrls; ?></center><br>

	</div>
	
	<div id="footerspa">
<br>
<p id="island">@ 2017 Island Spot Philippines. All rights reserved.</p>
<div id="facebookstyle">
<p>About</p>
<p><a href="termanduse.php">Term and Use</p></a>
<p >Follow us at &nbsp; &nbsp;<a href="#"><img id="facebook" src="image/book.png"></a></p></div>
	</div>
</div>

</body>