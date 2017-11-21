<?php
if (!isset($_SESSION)) {
  session_start();
}


if (isset($_SESSION['user'])){

	$_SESSION['user'] = NULL;

	 unset($_SESSION['user']);

	header("location:../index.php");
	exit();

}
?>