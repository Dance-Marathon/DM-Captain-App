<?php
	include_once("../../pageheader.php");
	$time = mysql_escape_string($_POST['time']);
	$date = mysql_escape_string($_POST['date']);
	$team = mysql_escape_string($_POST['team']);
	$value = mysql_escape_string($_POST['value']);
	if ($value == 0)
		$value = "";
	if (isset($time) && isset($team) && isset($date) && isset($value)) {
		mysql_query("UPDATE Interviews SET `$time` = '$value' WHERE Date = '$date' AND Team = '$team'") or die(mysql_error());
	}else{
		echo "Error";
	}
?>