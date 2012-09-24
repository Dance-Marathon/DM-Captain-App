<?php
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