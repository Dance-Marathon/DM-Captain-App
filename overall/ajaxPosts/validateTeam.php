<?php
	include_once("../../pageheader.php");
	$ufid = mysql_real_escape_string($_POST['ufid']);
	$team = mysql_real_escape_string($_POST['team']);
	$result = mysql_query("SELECT * FROM Overalls WHERE ufid = '$ufid' AND registered = '0' AND team = '$team'");
	$numRows = mysql_num_rows($result);
	
	if($numRows == 0) {
		echo "This UFID is not the overall of this team.";
	}else{
		echo "1";
	}
?>