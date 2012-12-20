<?php

	include_once("../../pageheader.php");
	$teamName = mysql_real_escape_string($_POST['teamName']);
	$result = mysql_query("SELECT * FROM teams");
	$num = mysql_num_rows($result);
	mysql_query("INSERT INTO teams (team, id) VALUES ('$teamName', '$num')") or die(mysql_error());
?>