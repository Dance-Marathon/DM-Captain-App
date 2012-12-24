<?php

	include_once("../../pageheader.php");
	$id = mysql_real_escape_string($_POST['id']);
	mysql_query("DELETE FROM Teams WHERE id = '$id'") or die(mysql_error());
	
	//Need to reset IDs if someone removes from middle
	$sql = mysql_query("SELECT * FROM Teams");
	$count = 0;
	while($row = mysql_fetch_array($sql)) {
		$id = $row['id'];
		mysql_query("UPDATE Teams SET id = '$count' WHERE id = '$id'");
		$count++;
	}
	
?>