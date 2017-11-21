<?php

 function check()
{

if(!isset($_SESSION["user"]))
{

	header("location:index.php");
	exit();

}
}
?>