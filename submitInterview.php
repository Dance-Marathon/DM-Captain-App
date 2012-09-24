<?php
include_once("pageheader.php");
include_once("requirelogin.php");
?>
<?php
	$date = htmlspecialchars($_POST['date']);
	$time = htmlspecialchars($_POST['time']);
	if ($date && $time)
	{
		$interview = htmlspecialchars($_POST['interview']);
		$team = htmlspecialchars($_POST['team']);
	
		$sql0 = "SELECT * FROM Interviews WHERE Date = '$date' AND Team = $team";
		$sql0 = mysql_query($sql0);
		$taken = mysql_result($sql0, 0, "$time");
		
		if ($taken)
		{
			$return = false;
		}
		else
		{
			$return = true;
			$sql1 = "UPDATE Interviews SET `$time` = '$ufid' WHERE Date = '$date' AND Team = $team";
			$sql1 = mysql_query($sql1);
			
			$sql2 = "SELECT * FROM Applicants WHERE ufid = '$ufid'";
			$sql2 = mysql_query($sql2);
			$changet = mysql_result($sql2, 0, "$interview"."t");
			$changed = mysql_result($sql2, 0, "$interview"."d");			
			if ($changet)
			{
				$sql3 = "UPDATE Interviews SET `$changet` = '' WHERE Date = '$changed' AND Team = $team";
				$sql3 = mysql_query($sql3);	
			}
			
			$sql4 = "Update Applicants SET $interview".'t'." = $time, $interview".'d'." = '$date' WHERE ufid = '$ufid'";
			$sql4 = mysql_query($sql4);
		}
	echo json_encode($return);
	}
	
?>