<?php
include_once("pageheader.php");
include_once("requirelogin.php");
?>
<?php

	$team = htmlspecialchars($_POST['team']);	
	$date = htmlspecialchars($_POST['date']);

	if ($date)
	{
		$sql0 = "SELECT * FROM Interviews WHERE Date = '$date' and Team = $team";
		$sql0 = mysql_query($sql0);
		
		$return = array();
		$times = mysql_fetch_array($sql0, MYSQL_ASSOC);		
	
		foreach ($times as $military => $applicant)
		{
			if (!$applicant || $applicant == $ufid)
			{
				$temp = (string)((int)($military) - 1200);
				if (((int)$temp) < 1000)
					$temp = substr($temp, 0, 1) . ":" . substr($temp, 1, 2) . " PM";
				else
					$temp = substr($temp, 0, 2) . ":" . substr($temp, 2, 2) . " PM";
				$return[$military] = $temp;			
			}			
	
		}
	
		echo json_encode($return);
	}
?>