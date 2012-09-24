<?php
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