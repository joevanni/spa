
<link href="../css/content.css" rel="stylesheet" type="text/css">
<?php

session_start();

if(!isset($_SESSION["user"]))
{

  header("location:index.php");
  exit();

}

?>
<?php
include_once("../db.php");

$sql = "SELECT COUNT(id) FROM registered_cst";
$query = mysqli_query($dbConn, $sql);
// total row count

$row = mysqli_fetch_row($query);
$rows = $row[0];
// results displayed per page
$page_rows = 8;
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
$sql = "SELECT * FROM registered_cst ORDER BY id DESC $limit";
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




<html>
<head>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<link href="../css/client.css" rel="stylesheet" type="text/css">
</head>
<title>
	Registered Client
</title>
<body>
<div id="header">

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
<script type="text/javascript">
function confirm_delete() {
  return confirm('Do you want to delete this client?');
}
</script>

</div>
<div id="contentclient">
<!--<form id="client" name="client" method="post" action="clientinfo.php">
<table  border="0" cellpadding="5" cellspacing="0">
<tr id="tabled">
<td width="65">Name</td>
<td width="75">Email</td>
<td width="75">Spa name</td>
<td width="80">Spa description</td>
<td width="80">Landmark</td>
<td width="80">Address</td>
<td width="35">Landline</td>
<td width="35">Mobile</td>
<td width="20">Hours</td>
<td width="20">Membership</td>
<td width="35">Treatment area</td>
<td width="35">Therapist type</td>
<td width="15">Price</td>
<td width="55">Image</td>
<td width="10">ADD</td>
<td width="10">DELETE</td>
</tr>-->
<?php

if (mysqli_num_rows($query) > 0) {
	
	echo '<table  border="0" cellpadding="5">';
	echo '<tr id="tabled"><th>Name</th><th>Email</th><th>Spa name</th><th>Spa description</th><th>Landmark</th><th>Address</th><th>Landline</th><th>Mobile</th><th>No.Hours</th><th>Membership</th><th>Treatment Area</th><th>Therapist Type</th><th>Price</th><th>Image<th>ADD</th><th>DELETE</th></tr>';

while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
	{


	  $id = $row["id"];
      $fname = $row["f_name"];
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

 	echo '<tr id="baryo">';
 	echo '<td>'.''.$fname.'</td>';
 	echo '<td>'.''.$email.'</td>';
 	echo '<td>'.''.$spa_name.'</td>';
 	echo '<td>'.''.$description.'</td>';
 	echo '<td>'.''.$Landmark.'</td>';
 	echo '<td>'.''.$address.'</td>';
 	echo '<td>'.''.$landline.'</td>';
 	echo '<td>'.''.$mobile.'</td>';
 	echo '<td>'.''.$hours.'</td>';
 	echo '<td>'.''.$membership.'</td>';
 	echo '<td>'.''.$area.'</td>';
 	echo '<td>'.''.$Therapist.'</td>';
 	echo '<td>'.''.$price.'</td>';
 	 echo '<td>'.'<img src=data:image;base64,'.$image.'  height="45" width="60" alt="" ></td>
	';
 	echo '<td id="linkadjust">'.'<a href="est.php?id='.$id.'">EDIT</td>';
 	echo '<td id="linkadjust">'.'<a href="registerdelete.php?id='.$id.'"onclick="return confirm_delete()">DELETE</td>';

  echo '</tr>';

 
 
	}
	

// close your database connection






}
 mysqli_close($dbConn);
?>
</table>


<br><br>
<center><div id = "pagination_controls" style=""><?php echo $paginationCtrls; ?></center>
<br>
<div id="footerregister"><p>all right reseve @ ISLAND SPOT 2017</p></div>
</div>
</body>
</html>