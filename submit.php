
<head>
<title>Submit spa</title>
<link href="css/header.css" rel="stylesheet" type="text/css">
<link href="css/promos.css" rel="stylesheet" type="text/css">
<link href="css/submit.css" rel="stylesheet" type="text/css">
<link href="css/modal.css" rel="stylesheet" type="text/css">
<!--<link href="css/pons.css" rel="stylesheet" media="only screen and (min-width:768px) and
  (max-width:1340px)" type="text/css">
  <link href="css/phone.css" rel="stylesheet" media="only screen and (min-width:360px) and
  (max-width:690px)" type="text/css">-->
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div id="background">
<div id="header"></div>
<div id="side">
	<img id="qwer" src="image/place.png" width="200" height="150">
	<p><a href="index.php">Home</p></a>
<p><a href="promos.php">Promos</p></a>
<p><a href="">Home service</p></a>
<p><a href="latest.php">Latest News</p></a>
<p><a href="">Review</p></a>
<p><a href="">Marketing</p></a>
<p><a href="submit.php">Submit your spa</a></p>

<div id="maps" class="anothermap">
<p><center>Find a spa anywhere in the Philippines?<br>Choose the navigation below. </p></center>
	<img id="mapadjust" src="image/mapa.png">

	<p id="text">Choose place here.</p><select id="filter">
<option value="lowHigh">Luzon</option>
<option value="highLow">Visayas</option>
<option value="highLow">Mindanao</option>
</select><br><br>
</div>	
</div>
<div id="contentsubmit">
<div id="for">
<p><a href="about.php">About</p></a>
<p><a href="contact.php">Contact us</p></a>

</div>
<form action="search.php" method="GET" id="adjuster">
<input type="text" id="search" name="search" placeholder="Search spa...">
<input type="submit" id="submit" name="submit" value="">
</form>
<br><br><br>
<p id="na">Submit your spa</p>
<div id="submitcontainer" >
	<br>
<p style="">Are you an owner of a spa located in Bacolod City? Do you want to enlist your spa here at the newest spa directory in the Philippines for FREE?</p>
<p>You’re in the right place. Simply fill up the form below now! Just replace the fields with the appropriate information about your spa.</p>
<p>Do not forget to attach your spa brand logo. If you want to submit more pictures, email them at Islandspot [dot] com.</p>
<p>We’ll have you listed here at Island spot for FREE!</p>
<p>Comments or questions are welcome.</p>
<p>*kindly fill up the form below*</p>
<left><hr size="1" id="hr" ></left>

<style>
     .success_msg {
          
          color: green;
          border: 1px solid green; 
           width:510px;
      left:200px;
      position: absolute;
      top:80px;
      font-size: 22px;
      text-align: center;
      background-color: #fff;
     }
.eles
{
	color:red;
}
</style>
<?php
if(isset($_GET['remarks'])){ ?>
<div class="success_msg" > Thank you for signing us. Your sucessfully registered.. </div>
<?php
}
?>
<?php
if(isset($_GET['captchafail'])){ ?>
<div class="ele">Registration fail</div>
<?php
}
?>

<form method="post" action="function.php" onsubmit="return regvalidate()" name="regform" id="formcontainer" enctype="multipart/form-data" ><br>
	<p>Name:<br><input type="text" name="fullname" id="fname" ><br></p>
	<p>Email:<br><input type="text" name="email" id="email"><br></p>
	<p>Spa Name:<br><input type="text" name="spaname" id="spaname"><br></p>
	<p>Spa Description:<br><textarea name="des" id="des"></textarea><br></p>
	<p>Landmark:<br><input type="text" name="landmark" id="landmark"><br></p>
	<p>Address:<br><textarea  name="address" id="address" ></textarea><br></p>
	<p>Landline Number:<br><input type="text" name="landline" id="landline"><br></p>	
		<p>Mobile Number:<br><input type="text" name="mobile" id="mobile"></p>
		<br>		
		<div id="accommodation"	>
			<h2><p style="font-size:18px;">Spa accommodation</p></h2>
			<p>OPerating Hour<br><input type="text" name="hours" id="hours"></p>
			<p>Membership:<br><select id="membership" name="membership" >
<option value="none">none</option>
<option value="required">required</option>
<option value="optional">optional</option>
</select><br></p>
<p>Treatment area type:<br><select id="area" name="area">
<option value="Home and Hotel Services Only">Home and Hotel Services Only</option>
<option value="Cubicles Only">Cubicles Only</option>
<option value="Private and Couple Rooms">Private and Couple Rooms</option>
<option value="Private and VIP Rooms">Private and VIP Rooms</option>
</select>
	<p>Therapist Type:<br><select id="type" name="type">
<option value="male">Male Only</option>
<option value="female">Female Only</option>
<option value="male and female">Male and Female</option>
</select><br><p>
<p>Price:(format P150.00 to P25.000)<br> <input type="text" name="price" id="price"></p>

<br>
<p>Upload your Banner here!</p>
<p><input type="file" name="image"></p>
<br><br>


<span style="margin-left:20px;"><input type="submit" name="submit" value="submit"  id="submitlog">
	
<script src="js/validation.js" type="text/javascript"></script>
</form>

</div>
</div>
</div>
<div id="submitfooter">
	<br>
<p style="color:#fff;text-align:left;margin-left:35px;">@ 2017 Island Spot Philippines. All rights reserved.</p>
<div id="facebookstyle">
<p>About</p>
<p><a href="termanduse.php">Term and Use</p></a>
<p >Follow us at &nbsp; &nbsp;<a href="#"><img id="facebook" src="image/book.png"></a></p></div>
	</div></div>

