
<html>
<head>
<link href="../../css/admin.css" rel="stylesheet" type="text/css">
<link href="../../css/client.css" rel="stylesheet" type="text/css"><link href="../../css/client.css" rel="stylesheet" type="text/css">
</head>
<title>
	processPromo
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


</div>
<div id="promo">
<center><h2><p>Promo management</p></h2>
<form action="processpromo.php" id="add" method="post" enctype="multipart/form-data">
Name of Promo:<br>
<br>
<input type="text" id="name" name="name"><br><br>
<input type="file" id="file" name="image"><br><br>
Description:<br>
<textarea id="textarea" name="textarea"></textarea><br><br>
<input type="submit" id="submit" name="submit" value="add">&nbsp;
<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">
</form></center>
</div>
<div id="footeredit"><p>all right reseve @ ISLAND SPOT 2017</p></div>
</div>
</body>
</html>