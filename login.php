<?php
include_once("pageheader.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Kameron:700,400' rel='stylesheet' type='text/css'>
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script src="jquery-validation-1.9.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="livevalidation_standalone.compressed.js" type="text/javascript"></script>

<head>
<title>Captain Application</title>

</head>
<body>
<div class="container">


<h1>Dance Marathon Captain Application</h1>

<div align="center">
<p>Don't have an account? <a href="index.php">Click here</a> to start your application.</p>
<form method="post" action="processLogin.php">
<table>
<tr><td>UFID</td><td><input name="ufid" id="ufid" type="text" /></td></tr>
<tr><td>Password</td><td><input id="password" name="password" type="password" /></td></tr>
<tr><td></td><td><input type="submit" action="processLogin.php" value="Login"/></td></tr>
<tr><td></td><td><a href="forgot.php">Forgot your password?</a></td></tr>
</table>
</form>

</div>
<div class="footer">
	<div class="footer_content">
		A COPY OF THE OFFICIAL REGISTRATION AND FINANCIAL INFORMATION MAY BE OBTAINED FROM THE DIVISION OF CONSUMER SERVICES BY CALLING TOLL FREE 1-800-435-7352 WITHIN THE STATE. REGISTRATION DOES NOT IMPLY ENDORSEMENT, APPROVAL, OR RECOMMENDATION BY THE STATE. SHANDS TEACHING HOSPITAL AND CLINICS REGISTRATION NUMBER WITH THE STATE OF FLORIDA: SC01801<br />
		<div class="footer_spacing">
			<a href="http://www.health.ufl.edu/disclaimer.shtml">Disclaimer & Permitted Use</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="http://www.ufl.edu/disability/">Disability Services</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="https://security.health.ufl.edu">Security Policies</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="http://privacy.ufl.edu/privacystatement.html">UF Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="http://www.shands.org/terms.asp">Shands Privacy Policy</a>
		</div>
	</div>
</div>


</div>
</div>
<script language="javascript">


$(document).ready(function(){
	jQuery(function($){
	   $("#ufid").mask("9999-9999");
	}) });


</script>

</body>
</html>