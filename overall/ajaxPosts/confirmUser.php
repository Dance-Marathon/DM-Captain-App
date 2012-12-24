<?php
	include_once("../../pageheader.php");
	$ufid = mysql_escape_string($_POST['ufid']);
	$team = $_SESSION['team'];
	if (isset($_SESSION['team'])) {
		$team = $_SESSION['team'];
	}else{
		$team = 0;
	}
	//Warning, if an overall not associated with a team confirms a user, their accepted team will be 0!
	if (isset($ufid) && isset($team)) {
		mysql_query("UPDATE Applicants SET confirm = 1, accepted = '$team' WHERE ufid = '$ufid' OR ufid2 = '$ufid'");
	}
?>