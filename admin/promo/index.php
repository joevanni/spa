

<?php

include("../../db.php");

session_start();

if(!isset($_SESSION["user"]))
{

  header("location:../index.php");
  exit();

}

$sql = "SELECT COUNT(id) FROM promo";
$query = mysqli_query($dbConn, $sql);
// total row count

$row = mysqli_fetch_row($query);
$rows = $row[0];
// results displayed per page
$page_rows = 5;
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




<html>
<head>
<link href="../../css/admin.css" rel="stylesheet" type="text/css">
<link href="../../css/content.css" rel="stylesheet" type="text/css">
<link href="../../css/client.css" rel="stylesheet" type="text/css">
</head>
<title>
	index
</title>
<body>
<div id="header">

<img src="../image/adminlogo.png" id="admilogoadjust">
<div id="menuadjustment">
<nav class="menu">
<ul class="navigate">
<li><a href="../home.php">HOME</a></li>
<li><a href="../clientinfo.php">CLIENT INFO</a></li>
<li><a href="../register.php">CLIENT REGISTERED</a></li>
<li><a href="index.php">PROMO</a></li>
<li><a href="">LATEST NEWS</a></li>
<li><a href="logoutpromo.php">LOG OUT</a></li>
</ul>
</nav>
</div>
<script>
    function add(){
        window.location='add.php';
    }
</script>


<script type="text/javascript">
function confirm_delete() {
  return confirm('Do you want to delete this promo?');
}
</script>
</div>
<div id="promo">

<?php
if (mysqli_num_rows($query) > 0) {
	
	echo '<center><table  border="0" cellpadding="5">';
	echo '<tr id="tabled"><th width="200">Name</th><th width="350">Image</th><th width="300">Description</th><th width="90">Edit</th><th width="90">Delete</th></tr>';


	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
	{


	  $id = $row['id'];
    $name = $row['name'];
      $image = $row['image'];
      $description = $row['description'];
     

 	echo '<tr id="baryo">';
 	
 	echo '<td>'.''.$name.'</td>';
 	echo '<td>'.'<img src=data:image;base64,'.$image.'  height="200" width="250" alt="" ></td>
	';
	echo '<td>'.''.$description.'</td>';
 	echo '<td id="linkadjust">'.'<a href="ed.php?id='.$id.'">EDIT</a>';
 	echo '<td id="linkadjust">'.'<a href="delete.php?id='.$id.'"onclick="return confirm_delete()">DELETE</a>';
 	
 	echo '</tr>';

 
 
 	}
 	echo '</table>';
 	}
 	echo '</center>';
 	mysqli_close($dbConn);
?>
<br>
<br>
<input type="button" id="buttonpro" name="button" value="ADD PROMO" onclick="add();" >
<br>


<br><br>
<center><div id = "pagination_controls" style=""><?php echo $paginationCtrls; ?></center>
<br>
</div>
<br>
<div id="footerpromoedit"><p>all right reseve @ ISLAND SPOT 2017</p></div>
</div>
</body>
</html>