<?php
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