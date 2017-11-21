<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=0, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width,  target-densitydpi=medium-dpi" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<style>



    .failed_msg
    {
      color:red;
      border:1px solid red;
      width:630px;
      left:90px;
      position: absolute;
      font-size: 20px;
      top:408px;
    }
     .success_msg {
          
       color:green;
      border:1px solid green;
      width:630px;
      left:90px;
      position: absolute;
      font-size: 20px;
      top:420px;
     </style>
<title>Negros Spa</title>
</head>
<script src='https://www.google.com/recaptcha/api.js'></script>
<link href="css/table.css" rel="stylesheet" type="text/css">
<link href="css/header.css" rel="stylesheet" type="text/css">
<link href="css/content.css" rel="stylesheet" type="text/css">
<link href="css/contact.css" rel="stylesheet" type="text/css">
<link href="css/pons.css" rel="stylesheet" media="only screen and (min-width:768px) and
  (max-width:1340px)" type="text/css">
<link href="css/phone.css" rel="stylesheet" media="only screen and (min-width:360px) and
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
<div id="contactcontent">
  <?php 
if(isset($_GET['result']) && $_GET['result'] == 'success') {
      echo '<div class="success_msg" > Thank you for contacting us. We will get back to you as soon as possible. </div> ';
} 
else if(isset($_GET['result']) && $_GET['result'] == 'failed')
{
   echo '<div class="failed_msg" > Your message has not been sent. Please make sure you filled form correctly or you forgot to check the check box.  </div> ';
}


?>

<div id="for">

<p><a href="about.php">About</p></a>
<p><a href="contact.php">Contact us</p></a>


</div><form  action="search.php" method="GET" id="adjuster">
<input type="text" id="search" name="search" placeholder="Search spa...">
<input type="submit" id="submit" name="submit" value="">
</form>

<br><br><br><br><br>
<span style="margin-left:60px;font-size:19px;"><b>Contact Us</b></span>
<br>
<br>
<div id="submitcontainer" >
<br>
<div id="c"><p>Owner of a newly built spa and want to market it here?<a href="submit.php">Submit your spa here!</a></div></p>
<p style="text-align:justify;font-size:17px;margin-right:10px;">Kindly fill up the contact form below for the question and inquiries. Or You may contact our office.</p>
<p style="font-size:20px;text-align:justify;"><b>Island Spot</b></p>
<p style="text-align:justify;font-size:17px;margin-right:10px;" >Contact Number: +639506589321</p>
<p style="text-align:justify;font-size:17px;margin-right:10px;"><b>Important:</b> Our contact number IS NOT THE NUMBER OF THE SPA YOU MIGHT BE LOOKING FOR. It is our office number. WE ARE NOT A SPA ESTABLISHMENT.</p>
<br>
<p style="text-align:justify;font-size:17px;margin-right:10px;">*Please fill up the form*</p> 

<center><form method="POST" action="contactprocess.php" id="conta"  name="contact" enctype="multipart/form-data">

<p>Name:<br><input type="text" name="name" id="fname" required=""><br></p>
	<p>Email:<br><input type="email" name="email" id="email" required="" placeholder="Enter a valid email address" oninvalid="this.setCustomValidity('Please Enter valid email')" oninput="setCustomValidity('')"><br></p>
	<p>Message:<br><textarea  name="message" id="message" required=""></textarea><br></p>
	<br>
	<span style="margin-left:20px;"><input type="submit" name="submit" value="submit"  id="submitlog">
	<br></span></form></center><br>
	
</div>
</div>
</div>
</p></p></div>
<div id="contactfooterspa">
<br>
<p style="color:#fff;text-align:left;margin-left:35px;">@ 2017 Island Spot Philippines. All rights reserved.</p>
<div id="facebookstyle">
<p>About</p>
<p><a href="termanduse.php">Term and Use</p></a>
<p >Follow us at &nbsp; &nbsp;<a href="#"><img id="facebook" src="image/book.png"></a></p></div>