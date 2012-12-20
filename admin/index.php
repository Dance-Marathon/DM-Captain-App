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
	
include_once("adminFunctions.php");
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
if(isset($_POST['ufid']) && isset($_POST['password'])) {
	$ufid = mysql_real_escape_string($_POST['ufid']);
	$password = md5(mysql_real_escape_string($_POST['password']));
	$result = mysql_query("SELECT * FROM Admin WHERE ufid = '$ufid' AND password = '$password'");
	if(mysql_num_rows($result)) {
		$_SESSION['admin'] = $ufid;
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link href="../styles.css" rel="stylesheet" type="text/css" />
<link href="adminStyles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Kameron:700,400' rel='stylesheet' type='text/css'>
<link href="tablesorter/themes/blue/style.css" rel="stylesheet" type="text/css" />
<script src="../jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script src="../jquery-validation-1.9.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="../livevalidation_standalone.compressed.js" type="text/javascript"></script>
<script type="text/javascript" src="tablesorter/jquery.tablesorter.js"></script> 

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
<?php
if (isset($_SESSION['admin'])) {
?>
	<ul id="nav">
		<li><a href="#" onClick="displaySection('overall');return false">Overalls</a></li>
		<li><a href="#" onClick="displaySection('user');return false">Users</a></li>
		<li><a href="#" onClick="displaySection('interview');return false">Interview</a></li>
		<li><a href="#" onClick="displaySection('question');return false">Questions</a></li>
		<li><a href="#" onClick="displaySection('team');return false">Teams</a></li>
	</ul>

<div id = "secondaryContainer">

<div id = "overallSection" class = "pageSection" style="display: block">
	<?=overallPage();?>
</div>

<div id = "userSection" class = "pageSection">
	<?=userPage();?>
</div>

<div id = "interviewSection" class = "pageSection">
	<?=interviewPage();?>
</div>

<div id = "questionSection" class = "pageSection">
	<?=questionPage();?>
</div>

<div id = "teamSection" class = "pageSection">
	<?=teamPage();?>
</div>

</div>

<?php
}
?>

<!-- Log in section -->
<?php  
if (!isset($_SESSION['admin'])) {

	if (ae_detect_ie()) {  
?>

We apologize but Internet Explorer is not supported on this application. Please try <a href="http://www.google.com/Chrome">Google Chrome</a> or <a href="http://getfirefox.com">Mozilla Firefox</a>.

<?php } else { ?>
	<h1>DM Captain Admin Panel</h1>
	<div align="center">
	<p>Log in with administrator privileges</p>
	<form method="post" action="index.php">
	<table>
	<tr><td>UFID</td><td><input name="ufid" id="ufid" type="text" maxlength="8" /></td></tr>
	<tr><td>Password</td><td><input id="password" name="password" type="password" /></td></tr>
	<tr><td></td><td><input type="submit" value="Login"/></td>
	</table>
	</form>
	</div>
<?php 
	} 
}
?>
<!-- End log in section -->

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

function displaySection(identifier) {
	$("#secondaryContainer").children().hide();
	$("#"+identifier+"Section").fadeIn('slow');
}

function addOverall() {
	overallUFID = $("#overallUFID").val();
	$.post("ajaxPosts/addOverall.php", {ufid: overallUFID}, function(data) {
			$("#tableUpdateDiv").load('reloadOverallTable.php');
			
	});
}

function removeOverall(overallUFID) {
	rowName = overallUFID+"Row";
	$("#"+rowName).fadeOut('slow');
	$.post("ajaxPosts/removeOverall.php", {ufid: overallUFID}, function(data) {
			
	});
}

function addTeam() {
	teamName = $("#teamName").val();
	$.post("ajaxPosts/addTeam.php", {teamName: teamName}, function(data) {
			$("#teamTable").load('ajaxPosts/reloadTeamTable.php');
			$("#teamName").val("");
	});
}

function removeTeam(id) {
	$.post("ajaxPosts/removeTeam.php", {id: id}, function(data) {
			$("#teamTable").load('ajaxPosts/reloadTeamTable.php');
	});
}

$(document).ready(function() 
    { 
        $("#overallTable").tablesorter({
	        
   	        sortList: [[13,0]]
	        
        }); 
    } 
); 

</script>

<?php } ?>

</body>
</html>