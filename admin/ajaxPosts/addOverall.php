<?php

	include_once("../../pageheader.php");
	$overallUFID = mysql_real_escape_string($_POST['ufid']);
	$team = mysql_real_escape_string($_POST['team']);
	$result = mysql_query("SELECT * FROM Overalls where ufid = '$overallUFID'") or die(mysql_error());
	$returnLine = $overallUFID;
	if(!mysql_num_rows($result)) {
		mysql_query("INSERT INTO Overalls(team, ufid) VALUES('$team', '$overallUFID')");
		$returnLine = $overallUFID;
	}else{
		$returnLine = "fail";
	}
	echo $returnLine;
	
?>