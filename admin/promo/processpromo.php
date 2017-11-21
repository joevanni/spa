<?php
include('../../db.php');

?>
<?php	

if(isset($_POST['submit']) && isset($_FILES['image']))
{

	if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
	{
		echo "please choose image ";

	}
	else{
		$image = addslashes($_FILES['image']['tmp_name']);
		$name = addslashes($_FILES['image']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
		
}
$name = $_POST['name'];
$description = $_POST['textarea'];

move_uploaded_file($_FILES['image']['tmp_name']	,"../register_images/".$_FILES['image']['name']);

$insert = "INSERT INTO promo (name,image,description) VALUES ('$name','$image','$description')";

$query = mysqli_query($dbConn, $insert)
or die("Error in pushing".mysqli_error($dbConn));
      header("location:index.php?remark = successfull");
}

?>