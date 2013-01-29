<?php
if (isset($_COOKIE['sessionid'])) {
	$sessionid = $_COOKIE['sessionid'];
	$result = mysql_query("SELECT * FROM Applicants WHERE sessionid = '$sessionid'");
	$_SESSION['ufid'] = mysql_real_unescape_string(mysql_result($result, 0, "ufid"), 2);
}
?>