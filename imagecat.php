<?php



?>
<?php
include_once("db.php");

$sql = "SELECT COUNT(id) FROM registered_cst";
$query = mysqli_query($dbConn, $sql);
// total row count

$row = mysqli_fetch_row($query);
$rows = $row[0];
// results displayed per page
$page_rows = 6;
// page number of last page
$last = ceil($rows/$page_rows);
// makes sure $last cannot be less than 1
if($last < 1){
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
echo '<table id="table2" width="160">';

	 	$it=2;
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
	{

		if ($it % 2 ==0){
            echo '<tr>';
        }
  $id = $row["id"];
  $image = $row["image"];
  $spa_name = $row["spa_name"];
 
  echo  '<td>'.'<a href="spacontent.php?id='.$id.'"><img src="data:image;base64,'.$image.'"><p><center><div id="size">'.$spa_name.'</p></a></center></div>'.'</td>';
  if ($it % 6 == 0){
           
            echo '</tr>';
        }; 
        $it++; //$i = $i + 1 - counter + 1 
	}
	echo '</table>';

// close your database connection
mysqli_close($dbConn);
 ?>