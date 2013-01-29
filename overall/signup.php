<?php
/* Dance Marathon Captain Application
    Copyright 2012 Dance Marathon at the University of Florida

This product includes software developed by the Dance Marathon at the University of Florida 2013 Technology Team.
The following developers contributed to this project:
	Matthew Gerstman
	Eric Smith

Dance Marathon at the University of Florida is a year-long effort that culminates in a 26.2-hour event where over 800 students stay awake and on their feet to symbolize the obstacles faced by children with serious illnesses or injuries. The event raises money for Shands Hospital for Children, your local Children’s Miracle Network Hospital, in Gainesville, FL. Our contributions are used where they are needed the most, including, but not limitied to, purchasing life-saving medial equipment, funding pediatric research, and purchasing diversionary activities for the kids.

For more information you can visit http://floridadm.org
   
This software includes the following open source plugins listed below:
	Title:		HTML5 Image Uploader
	Link:		http://tutorialzine.com/2011/09/html5-file-upload-jquery-php/
	Copyright: 	None, but we're nice and want to give credit.

	Title:		jQuery Validation Plugin 1.9.0
	Link:		http://bassistance.de/jquery-plugins/jquery-plugin-validation/
	Copyright:	Copyright (c) 2006 - 2011 Jörn Zaefferer
	License:	MIT License (http://www.opensource.org/licenses/mit-license.php)

	Title:		TableSorter 2.0 - Client-side table sorting with ease!
	Link:		http://tablesorter.com
	Copyright:	Copyright (c) 2007 Christian Bach
	License:	http://www.opensource.org/licenses/mit-license.php
	
	Title:		Masked Input plugin for jQuery
	Link:		http://digitalbush.com/projects/masked-input-plugin/
	Copyright:	Copyright (c) 2007-2011 Josh Bush (digitalbush.com)
	License:	MIT License (http://www.opensource.org/licenses/mit-license.php)*/
	
include_once("../pageheader.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link href="../styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Kameron:700,400' rel='stylesheet' type='text/css'>
<script src="../jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script src="../jquery-validation-1.9.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="../livevalidation_standalone.compressed.js" type="text/javascript"></script>

<head>
<title>Captain Application</title>
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
</head>
<body>
<div class="container">

<h1>Dance Marathon Overall Registration</h1>
<div align="center">
<form method="post" action="processSignup.php" id="myForm">
<table>
<tr><td>UFID</td><td><input id="ufid" name="ufid" type="input" /></td></tr>
<tr><td>Team</td><td>
	<select name="team" id="teamList" style = 'width:156px'>
	<?php
		$sql = mysql_query("SELECT *FROM Teams LIMIT 1,13");
		while($row = mysql_fetch_array($sql)) {
			$teamName = $row['team'];
			$id = $row['id'];
			echo "<option value = '".$id."'>".$teamName."</option>";
		}
	?>
	</select>
</td></tr>
<tr><td>UFL Email</td><td><input id="uflEmail" name="uflEmail" type="input" /></td></tr>
<tr><td>Choose Password </td><td><input id="password" name="password" type="password" /></td></tr>
<tr><td>Re-type Password </td><td><input id="confirm" name="confirm" type="password" /></td></tr>
<tr><td></td><td><input type="submit" name="submitme" value="Register" /></td>
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

var uflemail = new LiveValidation('uflEmail', {onlyOnSubmit: true, validMessage:" "});
uflemail.add( Validate.Email, {failureMessage: "Must be a UFL Email"});
uflemail.add( Validate.Format, { pattern: /@ufl.edu/ , failureMessage: " Must be a UFL Email"});

var password = new LiveValidation('password', {onlyOnSubmit: true, validMessage:" "});
password.add(Validate.Length, { minimum:4 } );

var confirm = new LiveValidation('confirm', {onlyOnSubmit: true, validMessage:" "});
confirm.add(Validate.Confirmation, { match: 'password', failureMessage: " Your passwords don't match!" } );

var ufid = new LiveValidation('ufid', {onlyOnSubmit: true, validMessage:" "});
ufid.add( Validate.Presence );
ufid.add( Validate.Custom, { against: function(value){ return isValidUfid(value) }, failureMessage: " UFID is not valid" } );

var team = new LiveValidation('teamList', {onlyOnSubmit: true, validMessage:" "});
team.add( Validate.Presence );
team.add( Validate.Custom, { against: function(value){ return isValidTeam(value) }, failureMessage: " This UFID is not registered for this team" } );

function isValidUfid(ufid) {
	returnType = false;
	$.ajax({
		type: "POST",
		url: "ajaxPosts/validateUFID.php",
		data: {ufid: ufid},
		async: false,
		success: function(data) {
			if (data == 1) {
				returnType = true;
			}else{
				returnType = false;
			}
		}	
	});
	return returnType;
};

function isValidTeam(team) {
	ufid = $("#ufid").val();
	returnType = false;
	$.ajax({
		type: "POST",
		url: "ajaxPosts/validateTeam.php",
		data: {ufid: ufid, team: team},
		async: false,
		success: function(data) {
			if (data == 1) {
				returnType = true;
			}else{
				returnType = false;
			}
		}	
	});
	return returnType;
};

$(document).ready(function(){
	jQuery(function($){
	   $("#ufid").mask("99999999");
	}) });


</script>

</body>
</html>