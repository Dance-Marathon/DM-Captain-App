<?php
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