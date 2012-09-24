<?php
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