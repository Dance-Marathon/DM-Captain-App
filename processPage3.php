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

include_once("connectToServer.php");	
connect();

if ($ufid)
{

//get user info from form
	if (isset($_POST["question1"]))
	{
		$question1 = mysql_real_escape_string($_POST["question1"]);
	}
	else
	{
		$question1="";
	}
	
	
	if (isset($_POST["question2"]))
	{
		$question2 = mysql_real_escape_string($_POST["question2"]);
	}
	else
	{
		$question2="";
	}
	
	
	if (isset($_POST["question3"]))
	{
		$question3 = mysql_real_escape_string($_POST["question3"]);
	}
	else
	{
		$question3="";
	}
	
	if (isset($_POST["question4"]))
		$question4 = mysql_real_escape_string($_POST["question4"]);
	else
		$question4 = "";

	if (isset($_POST["question5"]))
		$question5 = mysql_real_escape_string($_POST["question5"]);
	else
		$question5 = "";

	if (isset($_POST["question6"]))
		$question6 = mysql_real_escape_string($_POST["question6"]);
	else
		$question6 = "";

	$sql1 = "UPDATE Applicants SET question1 = '$question1', question2 = '$question2', question3 = '$question3', question4 = '$question4', question5 = '$question5', question6 = '$question6' WHERE ufid = '$ufid'";
	mysql_query($sql1);
	
	$email = $sql1;

    $subject = $ufid;
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
      
    mail('inprogress@floridadm.org', $subject, $email, $headers);  
	
	echo('<SCRIPT LANGUAGE="JavaScript">redirURL = "page4.php";self.location.href = redirURL;</script>');
}
else
{
echo('<SCRIPT LANGUAGE="JavaScript">history.back();</script>');
}
?>



</body>
</html>