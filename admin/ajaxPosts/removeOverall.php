<?php

	include_once("../../pageheader.php");
	$overallUFID = mysql_real_escape_string($_POST['ufid']);
	$result = mysql_query("DELETE FROM Overalls where ufid = '$overallUFID'") or die(mysql_error());
	
?>