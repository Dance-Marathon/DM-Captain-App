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

include_once("connectToServer.php");	
$connect = connect();

//get user info from form
	$uflemail = mysql_real_escape_string($_POST["uflemail"]);
	$plainpassword = mysql_real_escape_string($_POST["password"]);
	$password = md5(mysql_real_escape_string($plainpassword));
	$ufid =  mysql_real_escape_string($_POST["ufid"]);

//check to make sure user doesnt already exist
	$sql0 = "SELECT * FROM Applicants WHERE ufid = '$ufid'";
	$sql0 = mysql_query($sql0);


	if (mysql_num_rows($sql0)==0)
	{
	//add user
	    $sql1 = "INSERT INTO Applicants SET uflemail = '$uflemail', password = '$password', ufid = '$ufid', started =  CURRENT_TIMESTAMP";
		mysql_query($sql1);
	
		$sql0 = "SELECT * FROM Applicants WHERE ufid = '$ufid'";
		$sql0 = mysql_query($sql0);
		if (mysql_num_rows($sql0)!=0)
		{
//			setcookie('ufid', $ufid, 0, '/', '.mattgerstman.com');
		  	$_SESSION['ufid'] = $ufid;
			$subject = 'Dance Marathon Captain Application';
		
		//indentation here is important. if you include an indentation in the message it will show up in the email itself. Also HTML doesn't translate in the email.
			$message = "Hello,
			
			Thank you for registering on the Dance Marathon captain application system! At the end of the application, you will be directed to a separate website to pay your $25 application fee. You will not be admitted to your interview unless you have paid this fee. If you have any problems applying, please e-mail your issue to floridadm@floridadm.org.		

		Your account information is below:
		 	Login:		$ufid
			Password:	$plainpassword
		
		For The Kids";
			$headers = 'From: applications@floridadm.com' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();
		
			mail($uflemail, $subject, $message, $headers);
//			setcookie('ufid', $ufid, 0, '/', '.mattgerstman.com');		
		  	$_SESSION['ufid'] = $ufid;
			echo('<SCRIPT LANGUAGE="JavaScript">redirURL = "page1.php";self.location.href = redirURL;</script>');
		}
	
	
	
	}
	else
	{
		echo('<SCRIPT LANGUAGE="JavaScript">redirURL = "login.php";self.location.href = redirURL;</script>');

	}
	
?>