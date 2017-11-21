
<?php
include"db.php";

if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = "SELECT * FROM promo WHERE id='$id'";
$result = mysqli_query($dbConn, $sql);

while($row = mysqli_fetch_array($result)){

  $name = $row['name'];
  $description = $row['description'];
  $image = $row['image'];


}




}

mysqli_close($dbConn);


?>












<title>Promo content</title>
<link href="css/header.css" rel="stylesheet" type="text/css">
<link href="css/content.css" rel="stylesheet" type="text/css">
<link href="css/promos.css" rel="stylesheet" type="text/css">
<link href="css/table.css" rel="stylesheet" type="text/css">
<link href="css/pons.css" rel="stylesheet" media="only screen and (min-width:768px) and
  (max-width:1340px)" type="text/css">
  <link href="css/phone.css" rel="stylesheet" media="only screen and (min-width:360px) and
  (max-width:690px)" type="text/css">
<script src="js/slideshow.js" type="text/javascript"></script>
<style>
.mySlides {display:none;}

.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}
#margin
{
  margin:2px;
}
#size

{
  text-align: center;
}
@-webkit-keyframes fade {
  from {opacity: .2} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .2} 
  to {opacity: 1}
}
</style>
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
<div id="promocontent">
<div id="for">
<p><a href="about.php">About</p></a>
<p><a href="contact.php">Contact us</p></a>

</div>
<form  action="search.php" method="GET" id="adjuster">
<input type="text" id="search" name="search" placeholder="Search spa...">
<input type="submit" id="submit" name="submit" value="">
</form>
<br><br><br><br>
<div id="cougther"><p><?php echo $name;?></p></div>
<br><br><br><br>
<div id="contentimage"><br><br>
<?php
 echo '<img src=data:image;base64,'.$image.'  height="280" width="360" alt="" ;>
  '?>
</div>

<div id="dis">
 <p><?php echo $description;?> </p>
</div>
<p id="Deals">Another Promo Deals</p>
<center>
<div id="anotherdeals">
  
<?php

require_once'fetchpromo.php';
?>

</div>

</div>
<div id="promofooter">
  <br>
<p style="color:#fff;text-align:left;margin-left:35px;">@ 2017 Island Spot Philippines. All rights reserved.</p>
<div id="facebookstyle">
<p>About</p>
<p><a href="termanduse.php">Term and Use</p></a>
<p >Follow us at &nbsp; &nbsp;<a href="#"><img id="facebook" src="image/book.png"></a></p></div>
  </div>

</div>