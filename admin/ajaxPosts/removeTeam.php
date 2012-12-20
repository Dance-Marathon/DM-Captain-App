<?php

	include_once("../../pageheader.php");
	$id = mysql_real_escape_string($_POST['id']);
	mysql_query("DELETE FROM teams WHERE id = '$id'") or die(mysql_error());
	
	//Need to reset IDs if someone removes from middle
	$sql = mysql_query("SELECT * FROM teams");
	$count = 0;
	while($row = mysql_fetch_array($sql)) {
		$id = $row['id'];
		mysql_query("UPDATE teams SET id = '$count' WHERE id = '$id'");
		$count++;
	}
	
?>