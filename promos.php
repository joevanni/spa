<?php
include"db.php";
$sql = "SELECT COUNT(id) FROM promo";
$query = mysqli_query($dbConn, $sql);
// total row count

$row = mysqli_fetch_row($query);
$rows = $row[0];
// results displayed per page
$page_rows = 6;
// page number of last page
$last = ceil($rows/$page_rows);
// makes sure $last cannot be less than 1
if($last < 1) {
  $last = 1;
}
// page num
$pagenum = 1;
// get pagenum from URL if it is present otherwise it is 1
if(isset($_GET['pn'])) {
  $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// makes sure the page number isn't below 1, or more then our $last page
if($pagenum < 1) {
  $pagenum = 1;
}
else if($pagenum > $last) {
  $pagenum = $last;
}
// set the rage of rows to query for the chosen $pagenum
$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
$sql = "SELECT * FROM promo ORDER BY id DESC $limit";
$query = mysqli_query($dbConn, $sql);
// shows the user what page they are on, and the total number of pages
$textline1 = "Image (<b>$rows</b>)";
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
// establish $paginationCtrls variable
$paginationCtrls = '';
// if more the 1 page
if($last != 1) {
  if($pagenum > 1) {
    $previous = $pagenum - 1;
    $paginationCtrls .= '<a href="'. $_SERVER['PHP_SELF'] .'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
    // Render clickable number links
    for($i = $pagenum - 4; $i < $pagenum; $i++) {
      if($i > 0) {
        $paginationCtrls .= '<a href="'. $_SERVER['PHP_SELF'] .'?pn='.$i.'">'.$i.'</a> &nbsp; ';
      }
    }
  }
  // render the target page number without a link
  $paginationCtrls .= ''. $pagenum . ' &nbsp; ';
  // render clickable number links that appear on the right
  for($i = $pagenum + 1; $i < $last; $i++) {
    $paginationCtrls .= '<a href="'. $_SERVER['PHP_SELF'] .'?pn='.$i.'">'.$i.'</a> &nbsp; ';
    // allows up to 4 pages
    if($i >= $pagenum + 4) {
      break;
    }
  }
  if($pagenum != $last) {
    $next = $pagenum + 1;
    $paginationCtrls .= ' &nbsp; &nbsp; <a href="'. $_SERVER['PHP_SELF'] .'?pn='. $next .'">Next</a> ';
  }
}
$list = '';

?>











<title>Promos</title>
<link href="css/header.css" rel="stylesheet" type="text/css">
<link href="css/promos.css" rel="stylesheet" type="text/css">
<link href="css/table.css" rel="stylesheet" type="text/css">
<link href="css/content.css" rel="stylesheet" type="text/css">
<script src="js/slideshow.js" type="text/javascript"></script>
<!--<link href="css/pons.css" rel="stylesheet" media="only screen and (min-width:768px) and
  (max-width:1340px)" type="text/css">-->
<link href="css/phone.css" rel="stylesheet" media="only screen and (min-width:300px) and
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

<div id="maps">
<p><center>Find a spa anywhere in the Philippines?<br>Choose the navigation below. </p></center>
  <img id="mapadjust" src="image/mapa.png">

<p id="text">Choose place here.</p>
<select id="filter">
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
<form action="search.php" method="GET" id="adjuster">
<input type="text" id="search" name="search" placeholder="Search spa...">
<input type="submit" id="submit" name="submit" value="">
</form>
<br><br>
<p style="float:left; font-size:22px;position:absolute;left:50px;">Promos</p></style>
<br><br><br><br><br>

<div style="" class="slideshow-container">

  <div class="mySlides fade">
    <div class="numbertext">1 / 4</div>
    <img src="image/1.png" style="" >
    <div class="text"></div>
  </div>
  
  <div class="mySlides fade">
    <div class="numbertext">2 / 4</div>
    <img src="image/2.png" style="" >
    <div class="text">here caption</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 4</div>
    <img src="image/3.png" style="">
    <div class="text"></div>
  </div>
 <div class="mySlides fade">
    <div class="numbertext">4 / 4</div>
    <img src="image/discount.png" style="">
    <div class="text"></div>
  </div>
  
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
</div>
</div>
<br>

<div class="dotcontainer">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
</div>
<br><br><br>

</div>
<p class="great" >Great Deals Promos</p>

<div id="anotherpromo">
<?php
echo'<table id="newtable" width="260" border="0">';
if (mysqli_num_rows($query) > 0) {
  $it=3;
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{

  if ($it % 3 ==0){
            echo '<tr>';
        }
  $id = $row['id'];
      $image = $row['image'];
      $name = $row['name'];
      $description = $row['description'];



 echo '<td>'.'<a href="promocontent.php?id='.$row['id'].'"><img src="data:image;base64,'.$row['image'].'"><p><center><div id="size">'.$name.'</p></center></div>'.'</td>';

if ($it % 12 == 0){
           
            echo '</tr>';
        }; 
        $it++; //$i = $i + 1 - counter + 1 
      }
  echo '</table>';

}
  ?>


</div>

</div>
<div id = "controls" style=""><?php echo $paginationCtrls; ?>
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
<script src="js/slider.js" type="text/javascript"></script>
