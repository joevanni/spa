<?php/*

include('db.php');


if (isset($_POST["submit"]))
{
	$secret = '6Lc_uxgUAAAAALRJC0eSrJ0-rLJ02lFzkNyVpU9Q';
	$response = $_POST['g-recaptcha-response'];
	$remoteip = $_SERVER['REMOTE_ADDR'];
	$url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");

	

	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];

$insert ="INSERT INTO cst_contact(name,email,message) VALUES ('$name','$email','$message') ";

$result=mysqli_query($dbConn,$insert)
      or die("Error in pushing".mysqli_error($dbConn));
      header('location:index.php?remarks=true');
    mysqli_close($dbConn);
}
*/

?>
<?php
$From = $_POST['email'];
$from_name = $_POST['name'];

$message = $_POST['message'];


require '../spa/PHPMailer/PHPMailer-master/PHPMailerAutoload.php';
require '../spa/PHPMailer/PHPMailer-master/class.phpmailer.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'gallantique@gmail.com';                 // SMTP username
$mail->Password = 'gallantiqueaccount';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$mail->SetFrom($From, $from_name);
//$mail->From = 'gallantique@gmail.com' ;
//$mail->FromName = $name;
//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$mail->addAddress('gallantique@gmail.com');   // Name is optional
$mail->AddReplyTo($From,$from_name);

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Gallantique";
$mail->Body    = $message;
$mail->AltBody = "$message";

if(!$mail->send()) {
  header('Location: contact.php?result=failed');
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  header('Location: contact.php?result=success'); 
    echo 'Message has been sent';
}

?>