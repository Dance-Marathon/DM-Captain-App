<?php
include_once("../../pageheader.php");

	$sql = mysql_query("SELECT * FROM teams");
	while($row = mysql_fetch_array($sql)) {
		$teamName = $row['team'];
		$id = $row['id'];
		echo "<tr id='teamRow".$id."'><td>
			".$teamName."
			</td><td>
			<a href='#' onClick='removeTeam(".$id.")'>
			Remove
			</a>
			</td></tr>";
	}
?>
