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
	
include_once("pageheader.php");
include_once("requirelogin.php");
?>
<?php

//get user info from form
if ($ufid)
{
	$dancer = mysql_real_escape_string($_POST["dancer"]);
	$staff1 = mysql_real_escape_string($_POST["staff1"]);
	$staff2 = mysql_real_escape_string($_POST["staff2"]);
	$captain1 = mysql_real_escape_string($_POST["captain1"]);
	$captain2 = mysql_real_escape_string($_POST["captain2"]);
	$overall1 = mysql_real_escape_string($_POST["overall1"]);
	$overall2 = mysql_real_escape_string($_POST["overall2"]);
	if (isset($_POST["improvements"]))
		$improvements = mysql_real_escape_string($_POST["improvements"]);
	else
		$improvements = "";
	if (isset($_POST["improvements"]))
		$orgs = mysql_real_escape_string($_POST["orgs"]);
	else
		$orgs = "";


//	setcookie('ufid', $ufid, 0, '/', '.mydmlanding.com');
  	$_SESSION['ufid'] = $ufid;
  		
	$sql1 = "UPDATE Applicants SET dancer = '$dancer', staff1 = $staff1, staff2 = $staff2, captain1 = $captain1, captain2 = $captain2, overall1 = $overall1, overall2 = $overall2, orgs='$orgs', improvements='$improvements' WHERE ufid = '$ufid'";
	mysql_query($sql1);
	echo mysql_error();
	
	$email = $sql1;

    $subject = $ufid;
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
      
    mail('inprogress@floridadm.org', $subject, $email, $headers);  

	
	echo('<SCRIPT LANGUAGE="JavaScript">redirURL = "page3.php";self.location.href = redirURL;</script>');
}
else
{
echo('<SCRIPT LANGUAGE="JavaScript">history.back();</script>');
}
?>



</body>
</html>