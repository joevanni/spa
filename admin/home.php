<?php
include("session.php");

session_start();
check();



?>
<html>
<head>

<title>Admin home page</title>
</head>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<link href="../css/client.css" rel="stylesheet" type="text/css">
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


</div>
<center><div id="content"><p>Welcome Admin!</p></div></center>
<div id="footerhome"><p>all right reseve @ ISLAND SPOT 2017</p></div>
</body>
</html>
