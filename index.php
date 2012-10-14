<?php
include_once("pageheader.php");
?>
<?php
function ae_detect_ie()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && 
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        return true;
    else
        return false;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Kameron:700,400' rel='stylesheet' type='text/css'>
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script src="jquery-validation-1.9.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="livevalidation_standalone.compressed.js" type="text/javascript"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34432499-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<head>
<title>Captain Application</title>

</head>
<body>
<div class="container">


<h1>Dance Marathon Captain Application</h1>
<p>should work test test</p>
<?php  if (ae_detect_ie()) {  ?>

We apologize but Internet Explorer is not supported on this application. Please try <a href="http://www.google.com/Chrome">Google Chrome</a> or <a href="http://getfirefox.com">Mozilla Firefox</a>.

<?php } else { ?>
<div align="center">
<p>Welcome to the online Captain application for Dance Marathon 2013! Before you begin, you can <a href="http://floridadm.org/teams" target="_blank">click here</a> to review the team descriptions. After receiving your username and password, you can click save and resume your application at any time. In order to be eligible for your interview, you must pay the application fee and completely fill out every section of the application before September 13th. Can't wait to meet you!</p>
<p>Already have an account? <a href="login.php">Click here</a> to resume your application.</p>
<form method="post" action="register.php">
<table>
<tr><td>UFID</td><td><input name="ufid" id="ufid" type="text" /></td></tr>
<tr><td>School Email</td><td><input name="uflemail" id="uflemail" type="text" /></td></tr>
<tr><td>Password</td><td><input id="password" name="password" type="password" /></td></tr>
<tr><td>Confirm Password</td><td><input id="confirm" type="password" /></td></tr>
<tr><td></td><td><input type="submit" action="register.php" value="Register"/></td>
</table>
</form>
</div>
<?php } ?>


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
<?php  if (!(ae_detect_ie())) {  ?>

<script language="javascript">

//var uflemail = new LiveValidation('uflemail', {onlyOnSubmit: true, validMessage:" "});
//uflemail.add( Validate.Email, {failureMessage: "Must be a UFL Email"});
//uflemail.add( Validate.Format, { pattern: /@ufl.edu/ , failureMessage: "Must be a UFL Email"});

var password = new LiveValidation('password', {onlyOnSubmit: true, validMessage:" "});
password.add(Validate.Length, { minimum:4 } );

var confirm = new LiveValidation('confirm', {onlyOnSubmit: true, validMessage:" "});
confirm.add(Validate.Confirmation, { match: 'password', failureMessage: "Your passwords don't match!" } );

$(document).ready(function(){
	jQuery(function($){
	   $("#ufid").mask("9999-9999");
	}) });
<?php } ?>

</script>

</body>
</html>
