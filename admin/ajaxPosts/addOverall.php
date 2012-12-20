<?php

	include_once("../../pageheader.php");
	$overallUFID = mysql_real_escape_string($_POST['ufid']);
	$result = mysql_query("SELECT * FROM overalls where ufid = '$overallUFID'") or die(mysql_error());
	$returnLine = $overallUFID;
	if(!mysql_num_rows($result)) {
		mysql_query("INSERT INTO overalls(ufid) VALUES('$overallUFID')");
		$returnLine = $overallUFID;
	}else{
		$returnLine = "fail";
	}
	echo $returnLine;
	
?>