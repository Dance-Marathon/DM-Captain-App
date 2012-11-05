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

	$password = mysql_real_escape_string($_POST['old']);
	$plainPassword = mysql_real_escape_string($_POST['password']);
	$newPassword = md5($plainPassword);
	$ufid = mysql_real_escape_string($_POST['ufid']);
	$table = "Applicants";
	echo $ufid.' '. $plainPassword.' '.$password;

	$sql0 = mysql_query("SELECT * FROM $table WHERE ufid = '$ufid' AND password ='$password'");
	echo mysql_error();
	if (mysql_num_rows($sql0))
	{
		$result = mysql_query("UPDATE $table SET password='$newPassword' where ufid = '$ufid' AND password='$password'");

//get users account info for email		
		$result = mysql_query("SELECT * FROM $table WHERE ufid='$ufid'");
		$email = mysql_result($result, 0,"uflemail");							
		echo ' '.$email;
//email user with new password
		$subject = 'Password Reset';
		
//indentation here is important. if you include an indentation in the message it will show up in the email itself. Also HTML doesn't translate in the email.		
		$message = 'Hello,

	Your password has been changed to "'.$plainPassword.'". Your username is still "'.$ufid.'"
	

FTK!';

		$headers = 'From: applications@floridadm.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();
		mail($email, $subject, $message, $headers);		

//		setcookie('ufid', $ufid, 0, '/', '.mattgerstman.com');
	  	$_SESSION['ufid'] = $ufid;
	  	
		echo('<SCRIPT LANGUAGE="JavaScript">redirURL = "page1.php";	self.location.href = redirURL;</script>');
	}
	else
	{
		echo('<SCRIPT LANGUAGE="JavaScript">redirURL = "login.php";	self.location.href = redirURL;</script>');
	}
?>