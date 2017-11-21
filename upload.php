<body>
<form method="post" enctype="multipart/form-data">
<br>
<input type="file" name="image">
<br><br>
<input type="submit" name="submit" value="Upload">
</form>


<?php
if(isset($_POST['submit']))
{
	if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
	{
		echo "please ";

	}
	else{
		$image = addslashes($_FILES['image']['tmp_name']);
		$name = addslashes($_FILES['image']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
		saveimage($name,$image);
}
}
function saveimage( $name,$image)
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("test",$con);
	$qry = "insert into image(name,image)value('$name', '$image')";
	$result = mysql_query($qry,$con);
	if ($result)
	{
		echo "<br>image uploaded";


			}
			else
			{
				echo "<br> image not uploaded";
			}


}
display();
function display()
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("test",$con);
	$sql="SELECT  name, image FROM image  ";
	$result = mysql_query($sql,$con)
	or die("Error uploading".mysql_error());

	while ($row = mysql_fetch_array($result))
	{
		echo '<img height="300" width="300" src="data:image;base64,'.$row['image'].'">';
		echo "<p>".$row['name']."</p>";
	}
	

}
?>
</body>
