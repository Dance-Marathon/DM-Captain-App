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
?>
<?php

$table='Applicants';
$ufid = mysql_real_escape_string($_POST['ufid']);
$result = mysql_query("SELECT * FROM $table WHERE ufid='$ufid'");
//gets account info for email


if(mysql_num_rows($result))
{//if email is in system send them an email with a reset link		
		$password = mysql_result($result,0,"password");				
		$email = mysql_result($result, 0, 'uflemail');
		$subject = 'Password Reset';
		$message = "Hello,

	We have received a reset password request for your account. If this is an error please disregard this email. If not, you may reset your password using the following link: http://mattgerstman.com/application/reset.php?old=$password&ufid=$ufid

FTK!";

		$headers = 'From: applications@floridadm.com' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		mail($email, $subject, $message, $headers);
 echo('<script language="javascript">redirURL = "login.php";self.location.href = redirURL;</script>');	
	
}
else
{// if email is not in system redirect and give an error

 echo('<script language="javascript">redirURL = "index.php";self.location.href = redirURL;</script>');
 
}
//redirect when done

?>