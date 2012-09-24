<?php
include_once("pageheader.php");
?>
<?php

$table='Applicants';

$ufid = mysql_real_escape_string($_POST['ufid']);
$password = md5(mysql_real_escape_string($_POST['password']));
 
$result = mysql_query("SELECT * FROM $table WHERE ufid = '$ufid' AND password = '$password'");
if(mysql_num_rows($result))
{
  // Login
//	setcookie('ufid', $ufid, time()+60*60, '/', '.mattgerstman.com');
  	$_SESSION['ufid'] = $ufid;
  	echo('<SCRIPT LANGUAGE="JavaScript">redirURL = "page1.php";self.location.href = redirURL;</script>');
}
else
{
  // Invalid username/password

 echo('<script language="javascript">history.back();</script>');
}

?>