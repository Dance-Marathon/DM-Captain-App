<?php
include_once("../pageheader.php");
?>
<?php

$team = $_POST['team'];
$password = md5($_POST['password']);

if ($password == "1c7943b67b2c1a6f9b1468ee9e830509")
{
	$_SESSION['login'] = $password;
//	setcookie('login', $password, 0, '/', '.mattgerstman.com');
	if (isset($_SESSION['redirect']))
		$redirect = $_SESSION['redirect'];
	else
		$redirect = "list.php?team=$team";
	echo('<SCRIPT LANGUAGE="JavaScript">redirURL = "'.$redirect.'";self.location.href = redirURL;</script>');
}
else
{
  // Invalid username/password
echo('<script language="javascript">history.back();</script>');
}

?>