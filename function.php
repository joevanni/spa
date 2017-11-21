<?php
error_reporting(E_ALL | E_STRICT);
include('db.php');
session_start();

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
//$url = 'https://www.google.com/recaptcha/api/siteverify';
//$private="key";

//$response = file_get_contents($rul."?secret =".$private."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
//$data = json_decode($response);

//if (isset($data -> success) AND $data ->success==true){
//	header('location:submit.php?captcha=success');
//}
//else
//{
//	header('location:submit.php?captchafail=fail');
//}
//if(isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response']){
        
     //  $secret = "Your secey key";
        //$ip = $_SERVER['REMOTE_ADDR'];
        //$captcha = $_POST['g-recaptcha-response'];
       // $rsp  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
        
      //  $arr = json_decode($rsp,TRUE);
     //   if($arr['success']){
     ///       echo 'Done';
    //    }else{
    //        echo 'SPam';
    //    }
        
   // }﻿

$fname= $_POST['fullname'];
$email=$_POST['email'];
$spaname=$_POST['spaname'];
$description=$_POST['des'];
$landmark=$_POST['landmark'];
$address=$_POST['address'];
$landline=$_POST['landline'];
$mobile=$_POST['mobile'];
$operating=$_POST['hours'];
$membership=$_POST['membership'];
$area=$_POST['area'];
$type=$_POST['type'];
$price=$_POST['price'];




move_uploaded_file($_FILES['image']['tmp_name']	,"customer_images/".$_FILES['image']['name']);
$insert ="INSERT INTO cst_record(name,email,spa_name,spa_discription,landmark,address,landline,mobile,op_hours,membership,treatment_area,therapist_type,price,image) VALUES ('$fname','$email','$spaname','$description','$landmark','$address','$landline','$mobile','$operating','$membership','$area','$type','$price','$image')";



$result=mysqli_query($dbConn,$insert)
      or die("Error in pushing".mysqli_error($dbConn));
      header('location:submit.php?remarks=true');
    mysqli_close($dbConn);


}

?>

