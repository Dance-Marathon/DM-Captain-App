<?php
include_once("pageheader.php");
include_once("requirelogin.php");
include_once("teamMatch.php");
?>
<?php

include_once("connectToServer.php");	
connect();

//get user info from form

if ($ufid)
{
	$sql0 = "Select * From Applicants WHERE ufid='$ufid'";
	$sql0 = mysql_query($sql0);
//	$sql0 = mysql_result($sql0, 0);
	$sql0 = mysql_fetch_assoc($sql0);
    $email = "<pre>" . print_r($sql0, true) . "</pre>";

    $subject = getTeam($sql0['teama']) . ' ' . getTeam($sql0['teamb']) . ' ' . getTeam($sql0['teamc']);
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
      
    mail('applicants@floridadm.org', $subject, $email, $headers);  


    $email = "Hello,
        
    Thank you for applying to be a captain for Dance Marathon 2013!  You should have been redirected to pay your application fee.  If you were not, please go to http://floridadm.org/captain-payments and pay there. You will not be admitted to your interview unless you have paid your application fee.
    
    We look forward to seeing you at your interview for ".getTeam($sql0['teama'])." on ".fixInterview($sql0['interview1d'],$sql0['interview1t']) ." and ".getTeam($sql0['teamb'])." on ".fixInterview($sql0['interview2d'],$sql0['interview2t']) .".  Please go to the Reitz Union, Room 285 to check in for your interview.  Attire for interviews is business casual.
    
For The Kids";

    $subject = "Captain Application Confirmation";
	$headers = 'From: applications@floridadm.com' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion(); 
      
    mail($sql0['uflemail'], $subject, $email, $headers); 

	$sql1 = "UPDATE Applicants SET confirm = true WHERE ufid = '$ufid'";
	mysql_query($sql1);
	
	
	echo('Redirecting you to <a href="http://floridadm.org/captain-payments" target="_blank">http://floridadm.org/captain-payments</a> this may take a few seconds while we process your application.<SCRIPT LANGUAGE="JavaScript">redirURL = "http://floridadm.org/captain-payments";self.location.href = redirURL;</script>');
}
?>



</body>
</html>