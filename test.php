
<style>


#contactform
{
	position: absolute!important;
	top:700px!important;
}

#g-recaptcha
{
	position: absolute!important;
	top:800px!important;

}
</style>



<script src='https://www.google.com/recaptcha/api.js'></script>
<div id="contactform">
<form method="POST" action="contactprocess.php" id="conta"  name="contact" enctype="multipart/form-data">

<p>Name:<br><input type="text" name="name" id="fname" required=""><br></p>
	<p>Email:<br><input type="email" name="email" id="email" required="" placeholder="Enter a valid email address" oninvalid="this.setCustomValidity('Please Enter valid email')" oninput="setCustomValidity('')"><br></p>
	<p>Message:<br><textarea  name="message" id="message" required=""></textarea><br></p>
	<div  class="g-recaptcha" data-sitekey ="6Lc_uxgUAAAAAKz_SQ72QVWkZZnN7MfrsMaHFEDY"   data-theme="light" data-size="normal" ></div><br>
	<span style="margin-left:20px;"><input type="submit" name="submit" value="submit"  id="submitlog">
	</span>
	</div>
	</div>




	MANILA TOUCH CODES RECAPTCHA

	<iframe src="https://www.google.com/recaptcha/api2/anchor?k=6LfURwwUAAAAAO0BvSXl-jOwts2D45zIChkWLPlX&amp;co=aHR0cHM6Ly93d3cubWFuaWxhdG91Y2guY29tOjQ0Mw..&amp;hl=en&amp;v=r20170919161736&amp;theme=light&amp;size=normal&amp;cb=ki4it3gb7dor" title="recaptcha widget" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox" width="304" height="78" frameborder="0"></iframe>